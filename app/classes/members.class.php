<?php 

class members extends mysql_connect {
  private $fname, $lname, $mail, $user, $pass, $conirm_pass, $type, $id;

  public function get_input($fname, $lname, $mail, $user, $pass, $conirm_pass, $type, $id) {
    $this->fname       = $this->input_string($fname);
    $this->lname       = $this->input_string($lname);
    $this->mail        = $this->input_string($mail);
    $this->user        = $this->input_string($user);
    $this->pass        = $this->input_string($pass);
    $this->conirm_pass = $this->input_string($conirm_pass);
    $this->type        = $this->input_string($type);
    $this->id          = $this->input_string($id);

    $this->check_type();
  }

  private function check_user() { // Function For Check Found Like Name Username In Database
    $cond = NULL;
    if($this->type != 'add') {
      $cond = "AND id != {$this->id}";
    }
    $ch = $this->select("*", "admins", "WHERE username = ? {$cond}");
    $ch->execute(array($this->user));
    $info = $ch->rowCount();
    if($info > 0) {
      return true;
    }
    return false;
  }

  private function chek_input() { // Checked Data
    if(empty($this->fname)) {
      messages::set_msg('danger', 'خطأ', 'الرجاء أدخال <strong>الأسم الأول</strong>');
      echo messages::get_msg();
    } elseif(empty($this->lname)) {
      messages::set_msg('danger', 'خطأ', 'الرجاء أدخال <strong>الأسم الأخير</strong>');
      echo messages::get_msg();
    } elseif(empty($this->user)) {
      messages::set_msg('danger', 'خطأ', 'الرجاء أدخال <strong>أسم المستخدم</strong>');
      echo messages::get_msg();
    } elseif($this->check_user()) {
      messages::set_msg('danger', 'خطأ', 'هذا الأسم مسجل <strong>من قبل</strong>');
      echo messages::get_msg();
    } elseif($this->conirm_pass != $this->pass) {
      messages::set_msg('danger', 'خطأ', 'الرجاء أدخال <strong>كلمة مرور متطابقة</strong>');
      echo messages::get_msg();
    } elseif(empty($this->conirm_pass) and empty($this->pass) and $this->type == 'add') {
      messages::set_msg('danger', 'خطأ', 'الرجاء أدخال <strong>كلمة مرور</strong>');
      echo messages::get_msg();
    } else {
      return true;
    }
    return false;
  }

  private function check_type() {

    if($this->type == 'add') {
      if($this->add_member()) {
        messages::set_msg('success', ':)', 'تم <strong>الأضافة</strong>');
        $this->redirecr_page(messages::$msg_alert, 'members.php', 2);
        exit();
      }
      return false;
    } else {
      if($this->edit_member()) {
        messages::set_msg('success', ':)', 'تم <strong>التعديل</strong>');
        $this->redirecr_page(messages::$msg_alert, 'members.php', 2);
        exit();
      }
    }
    
  }

  private function add_member() { // Function Add Member In Database
    if($this->chek_input()) {
        $add = $this->insert('admins', 'first_name, last_name, email, username, password', ':xfirst_name, :xlast_name, :xemail, :xusername, :xpassword');
        $values = array(
          ':xfirst_name' =>   $this->fname,
          ':xlast_name'  =>   $this->lname,
          ':xemail'      =>   $this->mail,
          ':xusername'   =>   $this->user,
          ':xpassword'   =>   sha1($this->pass)
        );
        if($add->execute($values)) {
          return true;
        }

    }
    return false;
  }

  private function edit_member() { // Function Add Member In Database
    if($this->chek_input()) {
        if(empty($this->pass) and empty($this->conirm_pass)) {
          $update = $this->update('admins', 'first_name = ?, last_name = ?, email = ?, username = ?', 'WHERE id = ?');
          $update_val = array($this->fname, $this->lname, $this->mail, $this->user, $this->id);
          if($update->execute($update_val)) {
            return true;
          }
        } else {
          $update = $this->update('admins', 'first_name = ?, last_name = ?, email = ?, username = ?, password = ?', 'WHERE id = ?');
          $update_val = array($this->fname, $this->lname, $this->mail, $this->user, sha1($this->pass), $this->id);
          if($update->execute($update_val)) {
            return true;
          }
        }

    }
    return false;
  }



}