<?php 

class works extends mysql_connect {
  private $name, $content, $image_main, $image_1, $image_2, $image_3, $image_4, $image_5, $image_6, $image_7, $image_8, $link_project, $link_video, $whats, $face, $insta, $twt, $tube, $section_id, $type_work, $type_post, $get_id, $name_dir;

  public function get_input($name, $content, $image_main, $image_1, $image_2, $image_3, $image_4, $image_5, $image_6, $image_7, $image_8, $link_project, $link_video,$whats, $face, $insta, $twt, $tube, $section_id, $type_work, $type_post, $get_id) {
    $this->name            = $this->input_string($name);
    $this->content         = $this->input_string($content);
    $this->image_main      = $image_main;
    $this->image_1         = $image_1;
    $this->image_2         = $image_2;
    $this->image_3         = $image_3;
    $this->image_4         = $image_4;
    $this->image_5         = $image_5;
    $this->image_6         = $image_6;
    $this->image_7         = $image_7;
    $this->image_8         = $image_8;
    $this->link_project    = $this->input_string($link_project);
    $this->link_video      = $this->input_string($link_video);
    $this->whats           = $this->input_string($whats);
    $this->face            = $this->input_string($face);
    $this->insta           = $this->input_string($insta);
    $this->twt             = $this->input_string($twt);
    $this->tube            = $this->input_string($tube);
    $this->section_id      = $this->input_string($section_id);
    $this->type_work       = $this->input_string($type_work);
    $this->type_post       = $type_post;
    $this->get_id          = $get_id;
    $this->name_dir        = 'works_' . rand(0, 10000);

    $this->check_type();
    

  }

  private function chek_input() { // Checked Data

    if(empty($this->name)) {
      messages::set_msg('danger', 'خطأ', 'الرجاء أدخال <strong>أسم المشروع</strong>');
      $this->redirecr_page(messages::get_msg(), $_SERVER['HTTP_REFERER'], 2);
      die();
    } else if(empty($this->link_video) and $this->type_work == 'video') {
      messages::set_msg('danger', 'خطأ', 'الرجاء أدخال  <strong>رابط الفيديو</strong>');
      $this->redirecr_page(messages::get_msg(), $_SERVER['HTTP_REFERER'], 2);
      die();
    } else if(isset($this->image_main['size']) and $this->image_main['size'] == 0 and $this->type_post == 'add') {
      messages::set_msg('danger', 'خطأ', 'الرجاء أضافة <strong>صورة الغلاف المصغرة</strong>');
      $this->redirecr_page(messages::get_msg(), $_SERVER['HTTP_REFERER'], 2);
      die();
    } else if(isset($this->image_1['size']) and $this->image_1['size'] == 0 and isset($this->image_2['size']) and $this->image_2['size'] == 0 and isset($this->image_3['size']) and $this->image_3['size'] == 0 and isset($this->image_4['size']) and $this->image_4['size'] == 0 and isset($this->image_5['size']) and $this->image_5['size'] == 0 and isset($this->image_6['size']) and $this->image_6['size'] == 0 and isset($this->image_7['size']) and $this->image_7['size'] == 0 and isset($this->image_8['size']) and $this->image_8['size'] == 0 and $this->type_post == 'add') {
      messages::set_msg('danger', 'خطأ', 'الرجاء أضافة <strong>صورة عرض واحد للمشروع واحدة على الأقل</strong>');
      $this->redirecr_page(messages::get_msg(), $_SERVER['HTTP_REFERER'], 2);
      die();
    } else if(isset($this->image_main['size']) and $this->image_main['size'] > 1 * 1024 * 1024) { // 4mb
      messages::set_msg('danger', 'خطأ', ' حجم الصورة الأساسية كبير جداً يرجى اختيار صورة أصغر من <strong>1 ميغا</strong>');
      $this->redirecr_page(messages::get_msg(), $_SERVER['HTTP_REFERER'], 2);
      die();
    } else if(isset($this->image_1['size']) and $this->image_1['size'] > 1 * 1024 * 1024 or isset($this->image_2['size']) and $this->image_2['size'] > 1 * 1024 * 1024 or isset($this->image_3['size']) and $this->image_3['size'] > 1 * 1024 * 1024 or isset($this->image_4['size']) and $this->image_4['size'] > 1 * 1024 * 1024 or isset($this->image_5['size']) and $this->image_5['size'] > 1 * 1024 * 1024 or isset($this->image_6['size']) and $this->image_6['size'] > 1 * 1024 * 1024 or isset($this->image_7['size']) and $this->image_7['size'] > 1 * 1024 * 1024 or isset($this->image_8['size']) and $this->image_8['size'] > 1 * 1024 * 1024) { // 4mb
      messages::set_msg('danger', 'خطأ', ' يوجد صورة ذات حجم كبير جداً في "صور منوعة حول الشركة" يرجى اختيار صورة أصغر من <strong>1 ميغا</strong>');
      $this->redirecr_page(messages::get_msg(), $_SERVER['HTTP_REFERER'], 2);
      die();
    } else {
      return true;
    }
    return false;
  }

  private function check_type() {

    if($this->type_post == 'add') {
      if($this->add_works()) {
        messages::set_msg('success', 'رائع', 'تم الأضافة <strong> بنجاح</strong>');
        $this->redirecr_page(messages::$msg_alert, 'works.php', 2);
        exit();
      }
      return false;
    } else {
      if($this->edit_works()) {
        messages::set_msg('success', 'رائع', 'تم التحديث <strong> بنجاح</strong>');
        $this->redirecr_page(messages::$msg_alert, 'works.php', 2);
        exit();
      }
    }
    
  }

  private function add_works() {
    $image_m   = new upload();
    $image__1  = new upload();
    $image__2  = new upload();
    $image__3  = new upload();
    $image__4  = new upload();
    $image__5  = new upload();
    $image__6  = new upload();
    $image__7  = new upload();
    $image__8  = new upload();

    if($this->chek_input() and $image_m->up($this->image_main, $this->type_post, $this->name_dir) and $image__1->up($this->image_1, $this->type_post, $this->name_dir) and $image__2->up($this->image_2, $this->type_post, $this->name_dir) and $image__3->up($this->image_3, $this->type_post, $this->name_dir) and $image__4->up($this->image_4, $this->type_post, $this->name_dir) and $image__5->up($this->image_5, $this->type_post, $this->name_dir) and $image__6->up($this->image_6, $this->type_post, $this->name_dir) and $image__7->up($this->image_7, $this->type_post, $this->name_dir) and $image__8->up($this->image_8, $this->type_post, $this->name_dir)) {
      if($this->image_1['size'] == 0 ) { $image__1->end_name_file = '0'; }
      if($this->image_2['size'] == 0 ) { $image__2->end_name_file = '0'; }
      if($this->image_3['size'] == 0 ) { $image__3->end_name_file = '0'; }
      if($this->image_4['size'] == 0 ) { $image__4->end_name_file = '0'; }
      if($this->image_5['size'] == 0 ) { $image__5->end_name_file = '0'; }
      if($this->image_6['size'] == 0 ) { $image__6->end_name_file = '0'; }
      if($this->image_7['size'] == 0 ) { $image__7->end_name_file = '0'; }
      if($this->image_8['size'] == 0 ) { $image__8->end_name_file = '0'; }
      if($this->type_work == 'video' ) {
        $image__1->end_name_file = '0';
        $image__2->end_name_file = '0';
        $image__3->end_name_file = '0';
        $image__4->end_name_file = '0';
        $image__5->end_name_file = '0';
        $image__6->end_name_file = '0';
        $image__7->end_name_file = '0';
        $image__8->end_name_file = '0';
      }
      $add = $this->insert('works', 'work_name, work_content, work_image_main, work_image1, work_image2, work_image3, work_image4, work_image5, work_image6, work_image7, work_image8, link_project, link_video, whatsapp, facebook, instagram, twitter, youtube, section_id, work_type, dir', ':xwork_name, :xwork_content, :xwork_image_main, :xwork_image1, :xwork_image2, :xwork_image3, :xwork_image4, :xwork_image5, :xwork_image6, :xwork_image7, :xwork_image8, :xlink_project, :xlink_video, :xwhatsapp, :xfacebook, :xinstagram, :xtwitter, :xyoutube, :xsection_id, :xwork_type, :xdir');
      $add_array = array(
        ':xwork_name'        =>  $this->name,
        ':xwork_content'     =>  $this->content,
        ':xwork_image_main'  =>  $image_m->end_name_file,
        ':xwork_image1'      =>  $image__1->end_name_file,
        ':xwork_image2'      =>  $image__2->end_name_file,
        ':xwork_image3'      =>  $image__3->end_name_file,
        ':xwork_image4'      =>  $image__4->end_name_file,
        ':xwork_image5'      =>  $image__5->end_name_file,
        ':xwork_image6'      =>  $image__6->end_name_file,
        ':xwork_image7'      =>  $image__7->end_name_file,
        ':xwork_image8'      =>  $image__8->end_name_file,
        ':xlink_project'     =>  $this->link_project,
        ':xlink_video'       =>  $this->link_video,
        ':xwhatsapp'         =>  $this->whats,
        ':xfacebook'         =>  $this->face,
        ':xinstagram'        =>  $this->insta,
        ':xtwitter'          =>  $this->twt,
        ':xyoutube'          =>  $this->tube,
        ':xsection_id'       =>  $this->section_id,
        ':xwork_type'        =>  $this->type_work,
        ':xdir'              =>  $this->name_dir
      ); 
      if($add->execute($add_array)) {
        return true;
      }
    }
    return false;
  }

  private function edit_works() {
    $database = $this->select('*', 'works', 'WHERE work_id = ?');
    $database->execute(array($this->get_id));
    $data = $database->fetch();
    $image_m   = new upload();
    $image__1  = new upload();
    $image__2  = new upload();
    $image__3  = new upload();
    $image__4  = new upload();
    $image__5  = new upload();
    $image__6  = new upload();
    $image__7  = new upload();
    $image__8  = new upload();
    $this->name_dir = $data['dir'];

    if($this->chek_input() and $image_m->up($this->image_main, $this->type_post, $this->name_dir) and $image__1->up($this->image_1, $this->type_post, $this->name_dir) and $image__2->up($this->image_2, $this->type_post, $this->name_dir) and $image__3->up($this->image_3, $this->type_post, $this->name_dir) and $image__4->up($this->image_4, $this->type_post, $this->name_dir) and $image__5->up($this->image_5, $this->type_post, $this->name_dir) and $image__6->up($this->image_6, $this->type_post, $this->name_dir) and $image__7->up($this->image_7, $this->type_post, $this->name_dir) and $image__8->up($this->image_8, $this->type_post, $this->name_dir)) {
      if($this->image_main['size'] == 0 ) { $image_m->end_name_file = $data['work_image_main']; }
      if($this->image_1['size'] == 0 ) { $image__1->end_name_file   = $data['work_image1']; }
      if($this->image_2['size'] == 0 ) { $image__2->end_name_file   = $data['work_image2']; }
      if($this->image_3['size'] == 0 ) { $image__3->end_name_file   = $data['work_image3']; }
      if($this->image_4['size'] == 0 ) { $image__4->end_name_file   = $data['work_image4']; }
      if($this->image_5['size'] == 0 ) { $image__5->end_name_file   = $data['work_image5']; }
      if($this->image_6['size'] == 0 ) { $image__6->end_name_file   = $data['work_image6']; }
      if($this->image_7['size'] == 0 ) { $image__7->end_name_file   = $data['work_image7']; }
      if($this->image_8['size'] == 0 ) { $image__8->end_name_file   = $data['work_image8']; }
      $edit = $this->update('works', 'work_name = ?, work_content = ?, work_image_main = ?, work_image1 = ?, work_image2 = ?, work_image3 = ?, work_image4 = ?, work_image5 = ?, work_image6 = ?, work_image7 = ?, work_image8 = ?, link_project = ?, link_video = ?, whatsapp = ?, facebook = ?, instagram = ?, twitter = ?, youtube = ?, dir = ?', 'WHERE work_id = ?');
      $update_array = array($this->name, $this->content, $image_m->end_name_file, $image__1->end_name_file, $image__2->end_name_file, $image__3->end_name_file, $image__4->end_name_file, $image__5->end_name_file, $image__6->end_name_file, $image__7->end_name_file, $image__8->end_name_file, $this->link_project, $this->link_video, $this->whats, $this->face, $this->insta, $this->twt, $this->tube, $this->name_dir, $this->get_id);
      if($edit->execute($update_array)) {
        return true;
      }
    }
    return false;
  }

}