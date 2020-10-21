<?php 

class sections_works extends mysql_connect {
  private $name, $name_unique, $type, $type_post, $get_id;

  public function get_input($name, $name_unique, $type, $type_post, $get_id) {
    $this->name        = $this->input_string($name);
    $this->name_unique = $this->input_string($name_unique);
    $this->type        = $this->input_string($type);
    $this->type_post   = $this->input_string($type_post);
    $this->get_id      = $this->input_string($get_id);

    $this->check_type();
    
  }

  private function check_section() { // Function For Check Found Like Name Username In Database
    $cond = NULL;
    if($this->type_post != 'add') {
      $cond = "AND sec_id != {$this->get_id}";
    }
    $ch = $this->select("*", "works_sections", "WHERE sec_unique = ? {$cond}");
    $ch->execute(array($this->name_unique));
    $info = $ch->rowCount();
    if($info > 0) {
      return true;
    }
    return false;
  }

  private function chek_input() { // Checked Data

    if(empty($this->name)) {
      messages::set_msg('danger', 'خطأ', 'الرجاء أدخال أسم <strong>القسم</strong>');
      echo messages::get_msg();
    } else if(empty($this->name_unique) and $this->type_post == 'add') {
      messages::set_msg('danger', 'خطأ', 'الرجاء أدخال الأسم <strong>الفريد</strong>');
      echo messages::get_msg();
    } else if(empty($this->name_unique) and $this->type_post != 'add') {
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
        $this->redirecr_page(messages::$msg_alert, 'sections_works.php', 2);
        exit();
      }
      return false;
    } else {
      if($this->edit_section()) {
        messages::set_msg('success', 'رائع', 'تم التحديث <strong> بنجاح</strong>');
        $this->redirecr_page(messages::$msg_alert, 'sections_works.php', 2);
        exit();
      }
    }
    
  }

  private function add_section() {

    if($this->chek_input()) {
      $add = $this->insert('works_sections', 'sec_name, sec_unique, sec_type', ':xname, :xname_unique, :xtype');
      $add_array = array(

        ':xname'          =>  $this->name,
        ':xname_unique'   =>  $this->name_unique,
        ':xtype'          =>  $this->type
        

      );

      if($add->execute($add_array)) {
        return true;
      }
    }
    return false;
  }

  private function edit_section() {
    if($this->chek_input()) {
      $edit = $this->update('works_sections', 'sec_name = ?, sec_unique = ?, sec_type = ?', 'WHERE sec_id = ?');
      $update_array = array($this->name, $this->name_unique, $this->type, $this->get_id);

      if($edit->execute($update_array)) {
        return true;
      }
    }
    return false;
  }

}