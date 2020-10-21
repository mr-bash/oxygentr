<?php 

class services extends mysql_connect {
  private $title, $content,$image, $type_post, $get_id, $name_dir;

  public function get_input($title, $content, $image, $type_post, $get_id) {
    $this->title        = $this->input_string($title);
    $this->content      = $this->input_string($content);
    $this->image        = $image;
    $this->type_post    = $type_post;
    $this->get_id       = $get_id;
    $this->name_dir     = "services_files";

    $this->check_type();
    

  }

  private function chek_input() { // Checked Data

    if(empty($this->title)) {
      messages::set_msg('danger', 'خطأ', 'الرجاء أدخال <strong>العنوان</strong>');
      echo messages::get_msg();
    } else if($this->image['size'] == 0 and $this->type_post == 'add') {
      messages::set_msg('danger', 'خطأ', 'الرجاء أضافة <strong>صورة القسم</strong>');
      echo messages::$msg_alert;
    } else if($this->image['size'] > 1 * 1024 * 1024) { // 4mb
      messages::set_msg('danger', 'خطأ', ' حجم صورة الشعار كبير جداً يرجى اختيار صورة أصغر من <strong>1 ميغا</strong>');
      echo messages::$msg_alert;
    } else {
      return true;
    }
    return false;
  }

  private function check_type() {

    if($this->type_post == 'add') {
      if($this->add_service()) {
        messages::set_msg('success', 'رائع', 'تم الأضافة <strong> بنجاح</strong>');
        $this->redirecr_page(messages::$msg_alert, 'services.php', 2);
        exit();
      }
      return false;
    } else {
      if($this->edit_service()) {
        messages::set_msg('success', 'رائع', 'تم التحديث <strong> بنجاح</strong>');
        $this->redirecr_page(messages::$msg_alert, 'services.php', 2);
        exit();
      }
    }
    
  }

  private function add_service() {
    $upload   = new upload();

    if($this->chek_input() and $upload->up($this->image, $this->type_post, $this->name_dir)) {
      $add = $this->insert('services', 'title, content, img', ':xtitle, :xcontent, :ximg');
      $add_array = array(

        ':xtitle'     =>  $this->title,
        ':xcontent'   =>  $this->content,
        ':ximg'       =>  $upload->end_name_file,
      );

      if($add->execute($add_array)) {
        return true;
      }
    }
    return false;
  }

  private function edit_service() {
    $database = $this->select('*', 'services', 'WHERE id = ?');
    $database->execute(array($this->get_id));
    $data = $database->fetch();
    $upload   = new upload();
    if($this->chek_input() and $upload->up($this->image, $this->type_post, $this->name_dir)) {
      if($this->image['size']   == 0 ) { $upload->end_name_file   = $data['img']; }
      $edit = $this->update('services', 'title = ?, content = ?, img = ?', 'WHERE id = ?');
      $update_array = array($this->title, $this->content, $upload->end_name_file, $this->get_id);

      if($edit->execute($update_array)) {
        return true;
      }
    }
    return false;
  }

}