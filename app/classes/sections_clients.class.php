<?php 

class sections_clients extends mysql_connect {
  private $name, $unique, $description, $img_cover, $img_cover768, $img_cover576, $icon_dark, $icon_white, $type_post, $name_dir,$get_id;

  public function get_input($name, $unique, $description, $img_cover, $img_cover768, $img_cover576, $icon_dark, $icon_white, $get_id, $type_post) {
    $this->name          = $this->input_string($name);
    $this->unique        = $this->input_string($unique);
    $this->description   = $this->input_string($description);
    $this->img_cover     = $img_cover;
    $this->img_cover768  = $img_cover768;
    $this->img_cover576  = $img_cover576;
    $this->icon_dark     = $icon_dark;
    $this->icon_white    = $icon_white;
    $this->get_id        = $get_id;
    $this->type_post     = $type_post;

    $this->name_dir        = 'sec_' . rand(0, 10000);

    $this->check_type();
    
  }

  private function check_section() { // Function For Check Found Like Name Username In Database
    $cond = NULL;
    if($this->type_post != 'add') {
      $cond = "AND sec_id != {$this->get_id}";
    }
    $ch = $this->select("*", "clients_sections", "WHERE sec_unique = ? {$cond}");
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
    } else if($this->img_cover['size'] == 0 and $this->type_post == 'add') {
      messages::set_msg('danger', 'خطأ', 'الرجاء أضافة <strong>صورة العرض</strong>');
      echo messages::$msg_alert;
    } else if($this->img_cover['size'] > 1 * 1024 * 1024) { // 4mb
      messages::set_msg('danger', 'خطأ', ' حجم صورة العرض كبير جداً يرجى اختيار صورة أصغر من <strong>1 ميغا</strong>');
      echo messages::$msg_alert;
    } else {
      return true;
    }
    return false;
  }
  
  private function check_type() {

    if($this->type_post == 'add') {
      if($this->add_section()) {
        messages::set_msg('success', 'رائع', 'تم الأضافة <strong> بنجاح</strong>');
        $this->redirecr_page(messages::$msg_alert, 'sections_clients.php', 2);
        exit();
      }
      return false;
    } else {
      if($this->edit_section()) {
        messages::set_msg('success', 'رائع', 'تم التحديث <strong> بنجاح</strong>');
        $this->redirecr_page(messages::$msg_alert, 'sections_clients.php', 2);
        exit();
      }
    }
    
  }

  private function add_section() {
    $up_cover   = new upload();
    $up_cover2  = new upload();
    $up_cover3  = new upload();
    $up_iconD   = new upload();
    $up_iconW   = new upload();

    if($this->chek_input() and $up_cover->up($this->img_cover, $this->type_post, $this->name_dir) and $up_iconD->up($this->icon_dark, $this->type_post, $this->name_dir) and $up_iconW->up($this->icon_white, $this->type_post, $this->name_dir) and $up_cover2->up($this->img_cover768, $this->type_post, $this->name_dir) and $up_cover3->up($this->img_cover576, $this->type_post, $this->name_dir)) {
      if($this->icon_dark['size'] == 0 ) { $up_iconD->end_name_file = '0'; }
      if($this->icon_white['size'] == 0 ) { $up_iconW->end_name_file = '0'; }
      if($this->img_cover768['size'] == 0 ) { $up_cover2->end_name_file = '0'; }
      if($this->img_cover576['size'] == 0 ) { $up_cover3->end_name_file = '0'; }
      $add = $this->insert('clients_sections', 'sec_name, sec_unique, sec_description, sec_cover, sec_cover768, sec_cover576, icon_dark, icon_white, dir', ':xname, :xunique, :xdesc, :xcover, :xcover768, :xcover576, :xiconD, :xiconW, :xdir');
      $add_array = array(

        ':xname'      =>  $this->name,
        ':xunique'    =>  $this->unique,
        ':xdesc'      =>  $this->description,
        ':xcover'     =>  $up_cover->end_name_file,
        ':xcover768'  =>  $up_cover2->end_name_file,
        ':xcover576'  =>  $up_cover3->end_name_file,
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
    $database = $this->select('*', 'clients_sections', 'WHERE sec_id = ?');
    $database->execute(array($this->get_id));
    $data = $database->fetch();
    $up_cover   = new upload();
    $up_cover2  = new upload();
    $up_cover3  = new upload();
    $up_iconD   = new upload();
    $up_iconW   = new upload();
    $this->name_dir = $data['dir'];
    if($this->chek_input() and $up_cover->up($this->img_cover, $this->type_post, $this->name_dir) and $up_iconD->up($this->icon_dark, $this->type_post, $this->name_dir) and $up_iconW->up($this->icon_white, $this->type_post, $this->name_dir) and $up_cover2->up($this->img_cover768, $this->type_post, $this->name_dir) and $up_cover3->up($this->img_cover576, $this->type_post, $this->name_dir)) {
      if($this->img_cover['size']   == 0 ) { $up_cover->end_name_file   = $data['sec_cover']; }
      if($this->img_cover768['size']   == 0 ) { $up_cover2->end_name_file  = $data['sec_cover768']; }
      if($this->img_cover576['size']   == 0 ) { $up_cover3->end_name_file  = $data['sec_cover576']; }
      if($this->icon_dark['size'] == 0 )   { $up_iconD->end_name_file   = $data['icon_dark']; }
      if($this->icon_white['size'] == 0 )  { $up_iconW->end_name_file   = $data['icon_white']; }
      $edit = $this->update('clients_sections', 'sec_name = ?, sec_unique = ?, sec_description = ?, sec_cover = ?, sec_cover768 = ?, sec_cover576 = ?, icon_dark = ?, icon_white = ?', 'WHERE sec_id = ?');
      $update_array = array($this->name, $this->unique, $this->description, $up_cover->end_name_file, $up_cover2->end_name_file, $up_cover3->end_name_file, $up_iconD->end_name_file, $up_iconW->end_name_file, $this->get_id);

      if($edit->execute($update_array)) {
        return true;
      }
    }
    return false;
  }

  public function lang($word) {
    
    static $my_words = array(
    
        'hair-transplant' => 'زراعة الشعر',
        'real-estate' => 'العقارات',
        'beauty' => 'التجميل والعناية',
        'cars' => 'السيارات',
        'shipping' => 'شركات الشحن',
        'schools' => 'المدارس العربية',
        'restaurants' => 'المطاعم',
        'apparel' => 'شركات الألبسة',
        'leathers' => 'جلديات',
        'textiles' => 'المنسوجات',
        'food' => 'المواد الغذائية',
        'services' => 'خدمات'
        
    );
    
    return $my_words[$word];
    
}

}