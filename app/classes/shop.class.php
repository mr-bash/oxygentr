<?php 

class shop extends mysql_connect {
  private $name, $code, $section, $content, $description, $image_1, $image_2, $image_3, $image_4, $image_5, $image_6, $image_7, $image_8, $type_post, $get_id, $name_dir;

  public function get_input($name, $code, $section, $content, $image_1, $image_2, $image_3, $image_4, $image_5, $image_6, $image_7, $image_8, $type_post, $get_id) {
    $this->name            = $this->input_string($name);
    $this->code            = $this->input_string($code);
    $this->section         = $this->input_string($section);
    $this->content         = $this->input_string($content);
    $this->image_1         = $image_1;
    $this->image_2         = $image_2;
    $this->image_3         = $image_3;
    $this->image_4         = $image_4;
    $this->image_5         = $image_5;
    $this->image_6         = $image_6;
    $this->image_7         = $image_7;
    $this->image_8         = $image_8;
    $this->type_post       = $type_post;
    $this->get_id          = $get_id;
    $this->name_dir        = 'products_' . rand(0, 10000);

    $this->check_type();
    
  }

  public function update_secription($description) {

      $this->description = $description;
      $update_desc = $this->update('section_shop', 'description = ?', 'WHERE id = 1');
      $update_array = array($this->description);
      if($update_desc->execute($update_array)) {
        messages::set_msg('success', 'رائع', 'تم التحديث <strong> بنجاح</strong>');
        $this->redirecr_page(messages::$msg_alert, 'shop.php', 2);
        exit();
      }
  }

  private function chek_input() { // Checked Data

    if(empty($this->name)) {
      messages::set_msg('danger', 'خطأ', 'الرجاء أدخال <strong>أسم المنتج</strong>');
      echo messages::get_msg();
    } else if($this->section == '0') {
      messages::set_msg('danger', 'خطأ', 'الرجاء أختيار القسم الخاص <strong>بالمنتج</strong>');
      echo messages::get_msg();
    } else if(isset($this->image_1['size']) and $this->image_1['size'] == 0 and $this->type_post == 'add') {
      messages::set_msg('danger', 'خطأ', 'الرجاء أضافة <strong>صورة المنتج الأساسية</strong>');
      echo messages::get_msg();
    } else if(isset($this->image_1['size']) and $this->image_1['size'] > 1 * 1024 * 1024) { // 4mb
      messages::set_msg('danger', 'خطأ', ' حجم الصورة المنتج الأساسية كبير جداً يرجى اختيار صورة أصغر من <strong>1 ميغا</strong>');
      echo messages::get_msg();
    } else if(isset($this->image_2['size']) and $this->image_2['size'] > 1 * 1024 * 1024 or isset($this->image_3['size']) and $this->image_3['size'] > 1 * 1024 * 1024 or isset($this->image_4['size']) and $this->image_4['size'] > 1 * 1024 * 1024 or isset($this->image_5['size']) and $this->image_5['size'] > 1 * 1024 * 1024 or isset($this->image_6['size']) and $this->image_6['size'] > 1 * 1024 * 1024 or isset($this->image_7['size']) and $this->image_7['size'] > 1 * 1024 * 1024 or isset($this->image_8['size']) and $this->image_8['size'] > 1 * 1024 * 1024) { // 4mb
      messages::set_msg('danger', 'خطأ', ' يوجد صورة ذات حجم كبير جداً في "صور منوعة حول المنتج" يرجى اختيار صورة أصغر من <strong>1 ميغا</strong>');
      echo messages::get_msg();
    } else {
      return true;
    }
    return false;
  }

  private function check_type() {

    if($this->type_post == 'add') {
      if($this->add_product()) {
        messages::set_msg('success', 'رائع', 'تم الأضافة <strong> بنجاح</strong>');
        $this->redirecr_page(messages::$msg_alert, 'shop.php', 2);
        exit();
      }
      return false;
    } else {
      if($this->edit_product()) {
        messages::set_msg('success', 'رائع', 'تم التحديث <strong> بنجاح</strong>');
        $this->redirecr_page(messages::$msg_alert, 'shop.php', 2);
        exit();
      }
    }
    
  }

  private function add_product() {
    $image__1   = new upload();
    $image__2  = new upload();
    $image__3  = new upload();
    $image__4  = new upload();
    $image__5  = new upload();
    $image__6  = new upload();
    $image__7  = new upload();
    $image__8  = new upload();

    if($this->chek_input() and $image__1->up($this->image_1, $this->type_post, $this->name_dir) and $image__2->up($this->image_2, $this->type_post, $this->name_dir) and $image__3->up($this->image_3, $this->type_post, $this->name_dir) and $image__4->up($this->image_4, $this->type_post, $this->name_dir) and $image__5->up($this->image_5, $this->type_post, $this->name_dir) and $image__6->up($this->image_6, $this->type_post, $this->name_dir) and $image__7->up($this->image_7, $this->type_post, $this->name_dir) and $image__8->up($this->image_8, $this->type_post, $this->name_dir)) {
      if($this->image_2['size'] == 0 ) { $image__2->end_name_file = '0'; }
      if($this->image_3['size'] == 0 ) { $image__3->end_name_file = '0'; }
      if($this->image_4['size'] == 0 ) { $image__4->end_name_file = '0'; }
      if($this->image_5['size'] == 0 ) { $image__5->end_name_file = '0'; }
      if($this->image_6['size'] == 0 ) { $image__6->end_name_file = '0'; }
      if($this->image_7['size'] == 0 ) { $image__7->end_name_file = '0'; }
      if($this->image_8['size'] == 0 ) { $image__8->end_name_file = '0'; }
      $add = $this->insert('shop', 'name, code, content, img_1, img_2, img_3, img_4, img_5, img_6, img_7, img_8, dir, cat_id', ':xname, :xcode, :xcontent, :ximage_1, :ximage_2, :ximage_3, :ximage_4, :ximage_5, :ximage_6, :ximage_7, :ximage_8, :xdir, :xcat_id');
      $add_array = array(
        ':xname'     =>  $this->name,
        ':xcode'     =>  $this->code,
        ':xcontent'  =>  $this->content,
        ':ximage_1'  =>  $image__1->end_name_file,
        ':ximage_2'  =>  $image__2->end_name_file,
        ':ximage_3'  =>  $image__3->end_name_file,
        ':ximage_4'  =>  $image__4->end_name_file,
        ':ximage_5'  =>  $image__5->end_name_file,
        ':ximage_6'  =>  $image__6->end_name_file,
        ':ximage_7'  =>  $image__7->end_name_file,
        ':ximage_8'  =>  $image__8->end_name_file,
        ':xdir'      =>  $this->name_dir,
        ':xcat_id'   =>  $this->section
      ); 
      if($add->execute($add_array)) {
        return true;
      }
    }
    return false;
  }

  private function edit_product() {
    $database = $this->select('*', 'shop', 'WHERE id = ?');
    $database->execute(array($this->get_id));
    $data = $database->fetch();
    $image__1  = new upload();
    $image__2  = new upload();
    $image__3  = new upload();
    $image__4  = new upload();
    $image__5  = new upload();
    $image__6  = new upload();
    $image__7  = new upload();
    $image__8  = new upload();
    $this->name_dir = $data['dir'];

    if($this->chek_input() and $image__1->up($this->image_1, $this->type_post, $this->name_dir) and $image__2->up($this->image_2, $this->type_post, $this->name_dir) and $image__3->up($this->image_3, $this->type_post, $this->name_dir) and $image__4->up($this->image_4, $this->type_post, $this->name_dir) and $image__5->up($this->image_5, $this->type_post, $this->name_dir) and $image__6->up($this->image_6, $this->type_post, $this->name_dir) and $image__7->up($this->image_7, $this->type_post, $this->name_dir) and $image__8->up($this->image_8, $this->type_post, $this->name_dir)) {
      if($this->image_1['size'] == 0 ) { $image__1->end_name_file   = $data['img_1']; }
      if($this->image_2['size'] == 0 ) { $image__2->end_name_file   = $data['img_2']; }
      if($this->image_3['size'] == 0 ) { $image__3->end_name_file   = $data['img_3']; }
      if($this->image_4['size'] == 0 ) { $image__4->end_name_file   = $data['img_4']; }
      if($this->image_5['size'] == 0 ) { $image__5->end_name_file   = $data['img_5']; }
      if($this->image_6['size'] == 0 ) { $image__6->end_name_file   = $data['img_6']; }
      if($this->image_7['size'] == 0 ) { $image__7->end_name_file   = $data['img_7']; }
      if($this->image_8['size'] == 0 ) { $image__8->end_name_file   = $data['img_8']; }
      $edit = $this->update('shop', 'name = ?, code = ?, content = ?, img_1 = ?, img_2 = ?, img_3 = ?, img_4 = ?, img_5 = ?, img_6 = ?, img_7 = ?, img_8 = ?, dir = ?, cat_id = ?', 'WHERE id = ?');
      $update_array = array($this->name, $this->code, $this->content, $image__1->end_name_file, $image__2->end_name_file, $image__3->end_name_file, $image__4->end_name_file, $image__5->end_name_file, $image__6->end_name_file, $image__7->end_name_file, $image__8->end_name_file, $this->name_dir, $this->section, $this->get_id);
      if($edit->execute($update_array)) {
        return true;
      }
    }
    return false;
  }

}