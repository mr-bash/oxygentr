<?php 

class ads extends mysql_connect {
  private $image, $get_id, $name_dir, $type_post;

  public function get_input($image, $type_post, $get_id) {
    $this->image        = $image;
    $this->type_post    = $type_post;
    $this->get_id       = $get_id;
    $this->name_dir     = "ads";

    // $this->check_type();

    if($this->update_ads()) {
      messages::set_msg('success', 'رائع', 'تم التحديث <strong> بنجاح</strong>');
      $this->redirecr_page(messages::$msg_alert, 'ads.php', 2);
      exit();
    }
    

  }

  private function chek_input() { // Checked Data

    if($this->image['size'] > 1 * 1024 * 1024) { // 4mb
      messages::set_msg('danger', 'خطأ', ' حجم الصورة كبير جداً يرجى اختيار صورة أصغر من <strong>1 ميغا</strong>');
      $this->redirecr_page(messages::$msg_alert, $_SERVER['HTTP_REFERER'], 3);
      die();
    } else {
      return true;
    }
    return false;
  }

  private function update_ads() {
    $database = $this->select('*', 'ads', 'WHERE id = ?');
    $database->execute(array($this->get_id));
    $data = $database->fetch();
    $upload   = new upload();
    if($this->chek_input() and $upload->up($this->image, $this->type_post, $this->name_dir)) {
      if($this->image['size']   == 0 ) { $upload->end_name_file   = $data['img']; }
      $edit = $this->update('ads', 'image = ?', 'WHERE id = ?');
      $update_array = array($upload->end_name_file, $this->get_id);

      if($edit->execute($update_array)) {
        return true;
      }
    }
    return false;
  }

}