<?php 

class clients extends mysql_connect {
  private $brand, $name, $link_video, $description, $image_1, $image_2, $image_3, $image_4, $image_5, $section, $address, $type, $number_branches, $web_site, $phone_1, $phone_2, $email, $facebook, $twetter, $insta, $youtube, $whatsapp, $type_post, $get_id, $name_dir, $brand_footer;

  public function get_input($brand, $name, $link_video, $description, $image_1, $image_2, $image_3, $image_4, $image_5, $section, $address, $type, $number_branches, $web_site, $phone_1, $phone_2, $email, $facebook, $twetter, $insta, $youtube, $whatsapp, $type_post, $get_id, $brand_footer) {
    $this->brand           = $brand;
    $this->name            = $this->input_string($name);
    $this->link_video      = $this->input_string($link_video);
    $this->description     = $this->input_string($description);
    $this->image_1         = $image_1;
    $this->image_2         = $image_2;
    $this->image_3         = $image_3;
    $this->image_4         = $image_4;
    $this->image_5         = $image_5;
    $this->section         = $this->input_string($section);
    $this->address         = $this->input_string($address);
    $this->type            = $this->input_string($type);
    $this->number_branches = $this->input_string($number_branches);
    $this->web_site        = $this->input_string($web_site);
    $this->phone_1         = $this->input_string($phone_1);
    $this->phone_2         = $this->input_string($phone_2);
    $this->email           = $this->input_string($email);
    $this->facebook        = $this->input_string($facebook);
    $this->twetter         = $this->input_string($twetter);
    $this->insta           = $this->input_string($insta);
    $this->youtube         = $this->input_string($youtube);
    $this->whatsapp        = $this->input_string($whatsapp);
    $this->type_post       = $type_post;
    $this->get_id          = $get_id;
    $this->name_dir        = $this->section . '_' . rand(0, 10000);
    $this->brand_footer    = $this->input_string($brand_footer);

    $this->check_type();
    

  }

  private function chek_input() { // Checked Data

    $res_imgs = $this->select('*', 'clients_company', 'WHERE id = ?');
    $res_imgs->execute(array($this->get_id));
    $res_img = $res_imgs->fetch();

    if($this->section == '0') {
      messages::set_msg('danger', 'خطأ', 'الرجاء أختيار القسم الخاص <strong>بالشركة</strong>');
      echo messages::get_msg();
    } else if($this->brand['size'] == 0 and $this->type_post == 'add') {
      messages::set_msg('danger', 'خطأ', 'الرجاء أضافة <strong>صورة الشعار</strong>');
      echo messages::$msg_alert;
    } else if($this->brand['size'] > 1 * 1024 * 1024) { // 4mb
      messages::set_msg('danger', 'خطأ', ' حجم صورة الشعار كبير جداً يرجى اختيار صورة أصغر من <strong>1 ميغا</strong>');
      echo messages::$msg_alert;
    } else if($this->image_1['size'] == 0 and $this->type_post == 'add') {
      messages::set_msg('danger', 'خطأ', 'الرجاء أضافة الصورة الأساسية في حقل *  <strong>صور حول الشركة</strong>');
      echo messages::$msg_alert;
    } else if($this->image_1['size'] > 1 * 1024 * 1024 or $this->image_2['size'] > 1 * 1024 * 1024 or $this->image_3['size'] > 1 * 1024 * 1024 or $this->image_4['size'] > 1 * 1024 * 1024 or $this->image_5['size'] > 1 * 1024 * 1024) { // 4mb
      messages::set_msg('danger', 'خطأ', ' حجم صور حول الشركة كبير جداً يرجى اختيار صورة أصغر من <strong>1 ميغا</strong>');
      echo messages::$msg_alert;
    } else {
      return true;
    }
    return false;
  }

  private function check_type() {

    if($this->type_post == 'add') {
      if($this->add_clients()) {
        messages::set_msg('success', 'رائع', 'تم الأضافة <strong> بنجاح</strong>');
        $this->redirecr_page(messages::$msg_alert, 'clients.php', 2);
        exit();
      }
      return false;
    } else {
      if($this->edit_clients()) {
        messages::set_msg('success', 'رائع', 'تم التحديث <strong> بنجاح</strong>');
        $this->redirecr_page(messages::$msg_alert, 'clients.php', 2);
        exit();
      }
    }
    
  }

  private function add_clients() {
    $upload   = new upload();
    $image__1 = new upload();
    $image__2 = new upload();
    $image__3 = new upload();
    $image__4 = new upload();
    $image__5 = new upload();

    if($this->chek_input() and $upload->up($this->brand, $this->type_post, $this->name_dir) and $image__1->up($this->image_1, $this->type_post, $this->name_dir) and $image__2->up($this->image_2, $this->type_post, $this->name_dir) and $image__3->up($this->image_3, $this->type_post, $this->name_dir) and $image__4->up($this->image_4, $this->type_post, $this->name_dir) and $image__5->up($this->image_5, $this->type_post, $this->name_dir)) {
      if($this->image_1['size'] == 0 ) { $image__1->end_name_file = '0'; }
      if($this->image_2['size'] == 0 ) { $image__2->end_name_file = '0'; }
      if($this->image_3['size'] == 0 ) { $image__3->end_name_file = '0'; }
      if($this->image_4['size'] == 0 ) { $image__4->end_name_file = '0'; }
      if($this->image_5['size'] == 0 ) { $image__5->end_name_file = '0'; }
      $add = $this->insert('clients_company', 'brand, name, link_video, description, image_1, image_2, image_3, image_4, image_5, section, address, type, number_branches, web_site, phone_1, phone_2, email, facebook, twetter, insta, youtube, whatsapp, dir, section_id, brand_footer', ':xbrand, :xname, :xlink_video, :xdescription, :ximage_1, :ximage_2, :ximage_3, :ximage_4, :ximage_5, :xsection, :xaddress, :xtype, :xnumber_branches, :xweb_site, :xphone_1, :xphone_2, :xemail, :xfacebook, :xtwetter, :xinsta, :xyoutube, :xwhatsapp, :xdir, :xsection_id, :xbrand_footer');
      $add_array = array(

        ':xbrand'            =>  $upload->end_name_file,
        ':xname'             =>  $this->name,
        ':xlink_video'       =>  $this->link_video,
        ':xdescription'      =>  $this->description,
        ':ximage_1'          =>  $image__1->end_name_file,
        ':ximage_2'          =>  $image__2->end_name_file,
        ':ximage_3'          =>  $image__3->end_name_file,
        ':ximage_4'          =>  $image__4->end_name_file,
        ':ximage_5'          =>  $image__5->end_name_file,
        ':xsection'          =>  $this->section,
        ':xaddress'          =>  $this->address,
        ':xtype'             =>  $this->type,
        ':xnumber_branches'  =>  $this->number_branches,
        ':xweb_site'         =>  $this->web_site,
        ':xphone_1'          =>  $this->phone_1,
        ':xphone_2'          =>  $this->phone_2,
        ':xemail'            =>  $this->email,
        ':xfacebook'         =>  $this->facebook,
        ':xtwetter'          =>  $this->twetter,
        ':xinsta'            =>  $this->insta,
        ':xyoutube'          =>  $this->youtube,
        ':xwhatsapp'         =>  $this->whatsapp,
        ':xdir'              =>  $this->name_dir,
        ':xsection_id'       =>  $this->section,
        ':xbrand_footer'     =>  $this->brand_footer
      );

      if($add->execute($add_array)) {
        return true;
      }
    }
    return false;
  }

  private function edit_clients() {
    $database = $this->select('*', 'clients_company', 'WHERE id = ?');
    $database->execute(array($this->get_id));
    $data = $database->fetch();
    $upload   = new upload();
    $image__1 = new upload();
    $image__2 = new upload();
    $image__3 = new upload();
    $image__4 = new upload();
    $image__5 = new upload();
    $this->name_dir = $data['dir'];
    if($this->chek_input() and $upload->up($this->brand, $this->type_post, $this->name_dir) and $image__1->up($this->image_1, $this->type_post, $this->name_dir) and $image__2->up($this->image_2, $this->type_post, $this->name_dir) and $image__3->up($this->image_3, $this->type_post, $this->name_dir) and $image__4->up($this->image_4, $this->type_post, $this->name_dir) and $image__5->up($this->image_5, $this->type_post, $this->name_dir)) {
      if($this->brand['size']   == 0 ) { $upload->end_name_file   = $data['brand']; }
      if($this->image_1['size'] == 0 ) { $image__1->end_name_file = $data['image_1']; }
      if($this->image_2['size'] == 0 ) { $image__2->end_name_file = $data['image_2']; }
      if($this->image_3['size'] == 0 ) { $image__3->end_name_file = $data['image_3']; }
      if($this->image_4['size'] == 0 ) { $image__4->end_name_file = $data['image_4']; }
      if($this->image_5['size'] == 0 ) { $image__5->end_name_file = $data['image_5']; }
      $edit = $this->update('clients_company', 'brand = ?, name = ?, link_video = ?, description = ?, image_1 = ?, image_2 = ?, image_3 = ?, image_4 = ?, image_5 = ?, section = ?, address = ?, type = ?, number_branches = ?, web_site = ?, phone_1 = ?, phone_2 = ?, email = ?, facebook = ?, twetter = ?, insta = ?, youtube = ?, whatsapp = ?, section_id = ?, brand_footer = ?', 'WHERE id = ?');
      $update_array = array($upload->end_name_file, $this->name, $this->link_video, $this->description, $image__1->end_name_file, $image__2->end_name_file, $image__3->end_name_file, $image__4->end_name_file, $image__5->end_name_file, $this->section, $this->address, $this->type, $this->number_branches, $this->web_site, $this->phone_1, $this->phone_2, $this->email, $this->facebook, $this->twetter, $this->insta, $this->youtube, $this->whatsapp, $this->section, $this->brand_footer, $this->get_id);

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