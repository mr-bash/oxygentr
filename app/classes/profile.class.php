<?php 

class profile extends mysql_connect {
  private $fname, $lname, $mail, $user, $old_pass, $hidd_pass, $new_pass, $conirm_pass, $id;

  public function get_input($fname, $lname, $mail, $user, $old_pass, $hidd_pass, $new_pass, $conirm_pass, $id) {
    $this->id          = $this->input_string($id);
    $this->fname       = $this->input_string($fname);
    $this->lname       = $this->input_string($lname);
    $this->mail        = $this->input_string($mail);
    $this->user        = $this->input_string($user);
    $this->old_pass    = $this->input_string($old_pass);
    $this->hidd_pass   = $this->input_string($hidd_pass);
    $this->new_pass    = $this->input_string($new_pass);
    $this->conirm_pass = $this->input_string($conirm_pass);

    if($this->save_info()) { // Save Updated Whene Display All Error
      messages::set_msg('success', 'رائع', 'تم تحديث المعلومات <strong>بنجاح</strong>');
      $this->redirecr_page(messages::$msg_alert, $_SERVER['HTTP_REFERER'], 2);
    }
  }

  private function check_user() { // Function For Check Found Like Name Username In Database
    $ch = $this->select('*', 'admins', 'WHERE username = ? AND id != ?');
    $ch->execute(array($this->user, $this->id));
    $info = $ch->rowCount();
    if($info > 0) {
      return true;
    }
    return false;
  }

  private function chek_input() { // Checked Data
    if(empty($this->fname)) {
      messages::set_msg('danger', 'خطأ', 'الرجاء أدخال <strong>الأسم الأول</strong>');
      $this->redirecr_page(messages::$msg_alert, $_SERVER['HTTP_REFERER'], 2);
    } elseif(empty($this->lname)) {
      messages::set_msg('danger', 'خطأ', 'الرجاء أدخال <strong>الأسم الأخير</strong>');
      $this->redirecr_page(messages::$msg_alert, $_SERVER['HTTP_REFERER'], 2);
    } elseif(empty($this->mail)) {
      messages::set_msg('danger', 'خطأ', 'الرجاء أدخال <strong>البريد الألكتروني</strong>');
      $this->redirecr_page(messages::$msg_alert, $_SERVER['HTTP_REFERER'], 2);
    } elseif($this->check_user()) {
      messages::set_msg('danger', 'خطأ', 'هذا الأسم مسجل <strong>من قبل</strong>');
      $this->redirecr_page(messages::$msg_alert, $_SERVER['HTTP_REFERER'], 2);
    } elseif(!empty($this->old_pass) and sha1($this->old_pass) != $this->hidd_pass) {
      messages::set_msg('danger', 'خطأ', 'كلمة المرور الحالية غير <strong>صحيحة</strong>');
      $this->redirecr_page(messages::$msg_alert, $_SERVER['HTTP_REFERER'], 2);
    } elseif(empty($this->old_pass) and !empty($this->new_pass) and !empty($this->conirm_pass) and $this->new_pass != $this->conirm_pass or empty($this->old_pass) and !empty($this->new_pass) and !empty($this->conirm_pass) and $this->new_pass == $this->conirm_pass) {
      messages::set_msg('danger', 'خطأ', 'الرجاء أدخال كلمة المرور <strong>الحالية</strong>');
      $this->redirecr_page(messages::$msg_alert, $_SERVER['HTTP_REFERER'], 2);
    } elseif($this->new_pass != $this->conirm_pass or $this->conirm_pass != $this->new_pass) {
      messages::set_msg('danger', 'خطأ', 'الرجاء أدخال <strong>كلمة مرور متطابقة</strong>');
      $this->redirecr_page(messages::$msg_alert, $_SERVER['HTTP_REFERER'], 2);
    } elseif(sha1($this->old_pass) == $this->hidd_pass and empty($this->conirm_pass) and empty($this->new_pass)) {
      messages::set_msg('danger', 'خطأ', 'الرجاء أدخال <strong>كلمة المرور الجديدة</strong>');
      $this->redirecr_page(messages::$msg_alert, $_SERVER['HTTP_REFERER'], 2);
    } else {
      return true;
    }
    return false;
  }

  private function save_info() { // Run Function Update Data In Database
    if($this->chek_input()) {
      if(empty($this->old_pass) and empty($this->new_pass) and empty($this->conirm_pass)) { // if Changed All Data But Not Password
        $update = $this->update('admins', 'first_name = ?, last_name = ?, email = ?, username = ?', 'WHERE id = ?');
        if($update->execute(array($this->fname, $this->lname, $this->mail, $this->user, $this->id))) {
          return true;
        }
      } else { // if Changed All Data With Password
        $update2 = $this->update('admins', 'first_name = ?, last_name = ?, email = ?, username = ?, password = ?', 'WHERE id = ?');
        if($update2->execute(array($this->fname, $this->lname, $this->mail, $this->user, sha1($this->new_pass), $this->id))) {
          return true;
        }
      }

    }
    return false;
  }



}