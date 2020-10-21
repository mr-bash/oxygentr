<?php 

class jops extends mysql_connect {
  private $title, $img, $content, $name_company, $address, $count, $email, $site, $phone, $jop_type, $salary, $last_date, $experience, $section, $status, $type_post, $get_id, $name_dir;

  public function get_input($title, $img, $content, $name_company, $address, $count, $email, $site, $phone, $jop_type, $salary, $last_date, $experience, $section, $status, $type_post, $get_id) {
    $this->title          = $this->input_string($title);
    $this->img            = $img;
    $this->content        = $this->input_string($content);
    $this->name_company   = $this->input_string($name_company);
    $this->address        = $this->input_string($address);
    $this->count          = $this->input_string($count);
    $this->email          = $this->input_string($email);
    $this->site           = $this->input_string($site);
    $this->phone          = $this->input_string($phone);
    $this->jop_type       = $this->input_string($jop_type);
    $this->salary         = $this->input_string($salary);
    $this->last_date      = $this->input_string($last_date);
    $this->experience     = $this->input_string($experience);
    $this->section        = $this->input_string($section);
    $this->status         = $this->input_string($status);
    $this->type_post      = $type_post;
    $this->get_id         = $get_id;
    $this->name_dir       = $this->section . '_' . rand(0, 10000);
    

    $this->check_type();
    

  }

  private function chek_input() { // Checked Data

    if($this->section == '0') {
      messages::set_msg('danger', 'خطأ', 'الرجاء أختيار القسم الخاص <strong>الوظيفة</strong>');
      echo messages::get_msg();
    } else if($this->img['size'] == 0 and $this->type_post == 'add') {
      messages::set_msg('danger', 'خطأ', 'الرجاء أضافة <strong>صورة حول الوظيفة</strong>');
      echo messages::$msg_alert;
    } else if($this->img['size'] > 1 * 1024 * 1024) { // 4mb
      messages::set_msg('danger', 'خطأ', ' حجم صورة الوظيفة كبير جداً يرجى اختيار صورة أصغر من <strong>1 ميغا</strong>');
      echo messages::$msg_alert;
    } else if(empty($this->title)) {
      messages::set_msg('danger', 'خطأ', 'الرجاء أضافة عنوان *  <strong>الوظيفة</strong>');
      echo messages::$msg_alert;
    } else if(empty($this->content)) {
      messages::set_msg('danger', 'خطأ', 'الرجاء أضافة معلومات الوظيفة *  <strong>الوظيفة</strong>');
      echo messages::$msg_alert;
    } else {
      return true;
    }
    return false;
  }

  private function check_type() {

    if($this->type_post == 'add' and $this->status == '1') {
      if($this->add_jops()) {
        messages::set_msg('success', 'رائع', 'تم الأضافة <strong> بنجاح</strong>');
        $this->redirecr_page(messages::$msg_alert, 'jops.php', 2);
        exit();
      }
      return false;
    } else if($this->type_post == 'add' and $this->status == '0') {
      if($this->add_jops()) {
        messages::set_msg('success', '', 'تم أرسال الطلب سيتم أضافته بعد مراجعته والموافقة عليه <strong> </strong>');
        $this->redirecr_page(messages::$msg_alert, 'index.php', 5);
        exit();
      }
      return false;
    } else {
      if($this->edit_jops()) {
        messages::set_msg('success', 'رائع', 'تم التحديث <strong> بنجاح</strong>');
        $this->redirecr_page(messages::$msg_alert, 'jops.php', 2);
        exit();
      }
    }
    
  }

  private function add_jops() {
    $upload   = new upload();
    $user_dir = NULL;
    if($this->status == '0') {
      $user_dir = true;
    }
    if($this->chek_input() and $upload->up($this->img, $this->type_post, $this->name_dir, $user_dir)) {
      $add = $this->insert('jops', 'jop_title, jop_img, jop_content, jop_company, jop_address, jop_count, jop_email, jop_site, jop_phone, jop_type, jop_salary, jop_lastdate, jop_experience, jop_date, jop_section, jop_dir, jop_status', ':xjop_title, :xjop_img, :xjop_content, :xjop_company, :xjop_address, :xjop_count, :xjop_email, :xjop_site, :xjop_phone, :xjop_type, :xjop_salary, :xjop_lastdate, :xjop_experience, now(), :xjop_section, :xjop_dir, :xjop_status');
      $add_array = array(
        ':xjop_title'       =>  $this->title,
        ':xjop_img'         =>  $upload->end_name_file,
        ':xjop_content'     =>  $this->content,
        ':xjop_company'     =>  $this->name_company,
        ':xjop_address'     =>  $this->address,
        ':xjop_count'       =>  $this->count,
        ':xjop_email'       =>  $this->email,
        ':xjop_site'        =>  $this->site,
        ':xjop_phone'       =>  $this->phone,
        ':xjop_type'        =>  $this->jop_type,
        ':xjop_salary'      =>  $this->salary,
        ':xjop_lastdate'    =>  $this->last_date,
        ':xjop_experience'  =>  $this->experience,
        ':xjop_section'     =>  $this->section,
        ':xjop_dir'         =>  $this->name_dir,
        ':xjop_status'      =>  $this->status
      
      );

      if($add->execute($add_array)) {
        return true;
      }
    }
    return false;
  }

  private function edit_jops() {
    $database = $this->select('*', 'jops', 'WHERE jop_id = ?');
    $database->execute(array($this->get_id));
    $data = $database->fetch();
    $upload   = new upload();
    $this->name_dir = $data['jop_dir'];
    if($this->chek_input() and $upload->up($this->img, $this->type_post, $this->name_dir)) {
      if($this->img['size']   == 0 ) { $upload->end_name_file   = $data['jop_img']; }
      $edit = $this->update('jops', 'jop_title = ?, jop_img = ?, jop_content = ?, jop_company = ?, jop_address = ?, jop_count = ?, jop_email = ?, jop_site = ?, jop_phone = ?, jop_type = ?, jop_salary = ?, jop_lastdate = ?, jop_experience = ?, jop_section = ?', 'WHERE jop_id = ?');

      $update_array = array($this->title, $upload->end_name_file, $this->content, $this->name_company, $this->address, $this->count, $this->email, $this->site, $this->phone, $this->jop_type, $this->salary, $this->last_date, $this->experience, $this->section, $this->get_id);

      if($edit->execute($update_array)) {
        return true;
      }
    }
    return false;
  }

}