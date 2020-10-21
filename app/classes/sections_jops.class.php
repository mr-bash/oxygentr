<?php 

class sections_jops extends mysql_connect {
  private $name, $unique, $icon_dark, $icon_white, $type_post, $name_dir,$get_id;

  public function get_input($name, $unique, $icon_dark, $icon_white, $get_id, $type_post) {
    $this->name          = $this->input_string($name);
    $this->unique        = $this->input_string($unique);
    $this->icon_dark     = $icon_dark;
    $this->icon_white    = $icon_white;
    $this->get_id        = $get_id;
    $this->type_post     = $type_post;

    $this->name_dir        = 'sec_jops_' . rand(0, 10000);

    $this->check_type();
    
  }

  private function check_section() { // Function For Check Found Like Name Username In Database
    $cond = NULL;
    if($this->type_post != 'add') {
      $cond = "AND sec_id != {$this->get_id}";
    }
    $ch = $this->select("*", "jops_sections", "WHERE sec_unique = ? {$cond}");
    $ch->execute(array($this->unique));
    $info = $ch->rowCount();
    if($info > 0) {
      return true;
    }
    return false;
  }

  private function chek_input() { // Checked Data

    if(empty($this->name) and $this->type_post == 'add') {
      messages::set_msg('danger', 'خطأ', 'الرجاء أدخال أسم <strong>القسم</strong>');
      echo messages::get_msg();
    }else if(empty($this->name) and $this->type_post != 'add') {
      messages::set_msg('danger', 'خطأ', 'الرجاء أدخال أسم <strong>القسم</strong>');
      $this->redirecr_page(messages::get_msg(), $_SERVER['HTTP_REFERER'], 1);
      die();
    } else if(empty($this->unique) and $this->type_post == 'add') {
      messages::set_msg('danger', 'خطأ', 'الرجاء أدخال الأسم <strong>الفريد</strong>');
      echo messages::get_msg();
    } else if(empty($this->unique) and $this->type_post != 'add') {
      messages::set_msg('danger', 'خطأ', 'الرجاء أدخال الأسم <strong>الفريد</strong>');
      $this->redirecr_page(messages::get_msg(), $_SERVER['HTTP_REFERER'], 1);
      die();
    } else if($this->check_section() and $this->type_post == 'add') {
      messages::set_msg('danger', 'خطأ', 'الأسم الفريد المدخل <strong>مسجل</strong>');
      echo messages::$msg_alert;
    } else if($this->check_section() and $this->type_post != 'add') {
      messages::set_msg('danger', 'خطأ', 'الأسم الفريد المدخل <strong>مسجل</strong>');
      $this->redirecr_page(messages::get_msg(), $_SERVER['HTTP_REFERER'], 1);
      die();
    } else {
      return true;
    }
    return false;
  }
  
  private function check_type() {

    if($this->type_post == 'add') {
      if($this->add_section()) {
        messages::set_msg('success', 'رائع', 'تم الأضافة <strong> بنجاح</strong>');
        $this->redirecr_page(messages::$msg_alert, 'sections_jops.php', 2);
        exit();
      }
      return false;
    } else {
      if($this->edit_section()) {
        messages::set_msg('success', 'رائع', 'تم التحديث <strong> بنجاح</strong>');
        $this->redirecr_page(messages::$msg_alert, 'sections_jops.php', 2);
        exit();
      }
    }
    
  }

  private function add_section() {
    $up_iconD   = new upload();
    $up_iconW   = new upload();

    if($this->chek_input() and $up_iconD->up($this->icon_dark, $this->type_post, $this->name_dir) and $up_iconW->up($this->icon_white, $this->type_post, $this->name_dir)) {
      if($this->icon_dark['size'] == 0 ) { $up_iconD->end_name_file = '0'; }
      if($this->icon_white['size'] == 0 ) { $up_iconW->end_name_file = '0'; }
      $add = $this->insert('jops_sections', 'sec_name, sec_unique, icon_dark, icon_white, dir', ':xname, :xunique, :xiconD, :xiconW, :xdir');
      $add_array = array(

        ':xname'      =>  $this->name,
        ':xunique'    =>  $this->unique,
        ':xiconD'     =>  $up_iconD->end_name_file,
        ':xiconW'     =>  $up_iconW->end_name_file,
        ':xdir'       =>  $this->name_dir

      );

      if($add->execute($add_array)) {
        return true;
      }
    }
    return false;
  }

  private function edit_section() {
    $database = $this->select('*', 'jops_sections', 'WHERE sec_id = ?');
    $database->execute(array($this->get_id));
    $data = $database->fetch();
    $up_iconD   = new upload();
    $up_iconW   = new upload();
    $this->name_dir = $data['dir'];
    if($this->chek_input() and $up_iconD->up($this->icon_dark, $this->type_post, $this->name_dir) and $up_iconW->up($this->icon_white, $this->type_post, $this->name_dir)) {
      if($this->icon_dark['size'] == 0 )   { $up_iconD->end_name_file   = $data['icon_dark']; }
      if($this->icon_white['size'] == 0 )  { $up_iconW->end_name_file   = $data['icon_white']; }
      $edit = $this->update('jops_sections', 'sec_name = ?, sec_unique = ?, icon_dark = ?, icon_white = ?', 'WHERE sec_id = ?');
      $update_array = array($this->name, $this->unique, $up_iconD->end_name_file, $up_iconW->end_name_file, $this->get_id);

      if($edit->execute($update_array)) {
        return true;
      }
    }
    return false;
  }

}