<?php 

class sections_shop extends mysql_connect {
  private $name, $description, $unique, $type_post, $get_id;

  public function get_input($name, $description, $unique, $get_id, $type_post) {
    $this->name          = $this->input_string($name);
    $this->unique        = $this->input_string($unique);
    $this->description   = $this->input_string($description);

    $this->get_id        = $get_id;
    $this->type_post     = $type_post;


    $this->check_type();
    
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
    } else {
      return true;
    }
    return false;
  }
  
  private function check_type() {

    if($this->type_post == 'add') {
      if($this->add_section()) {
        messages::set_msg('success', 'رائع', 'تم الأضافة <strong> بنجاح</strong>');
        $this->redirecr_page(messages::$msg_alert, 'sections_shop.php', 2);
        exit();
      }
      return false;
    } else {
      if($this->edit_section()) {
        messages::set_msg('success', 'رائع', 'تم التحديث <strong> بنجاح</strong>');
        $this->redirecr_page(messages::$msg_alert, 'sections_shop.php', 2);
        exit();
      }
    }
    
  }

  private function add_section() {

    if($this->chek_input()) {
      $add = $this->insert('shop_section', 'section_name, section_description, section_uniq', ':xname, :xdesc, :xunique');
      $add_array = array(

        ':xname'    =>  $this->name,
        ':xdesc'    =>  $this->description,
        ':xunique'  =>  $this->unique

      );

      if($add->execute($add_array)) {
        return true;
      }
    }
    return false;
  }

  private function edit_section() {
    if($this->chek_input()) {
      $edit = $this->update('shop_section', 'section_name = ?, section_description = ?, section_uniq = ?', 'WHERE section_id = ?');
      $update_array = array($this->name, $this->description, $this->unique, $this->get_id);

      if($edit->execute($update_array)) {
        return true;
      }
    }
    return false;
  }

}