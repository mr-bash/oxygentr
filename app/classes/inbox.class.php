<?php 

class inbox extends mysql_connect {
  private $name, $subject, $email, $phone, $content, $date, $type_read, $id;

  public function get_input($name, $email, $phone, $subject, $content, $id) {
    $this->name       = $this->input_string($name);
    $this->subject    = $this->input_string($subject);
    $this->email      = $this->input_string($email);
    $this->phone      = $this->input_string($phone);
    $this->content    = $this->input_string($content);
    $this->id         = $this->input_string($id);

    if($this->send_message()) {
      messages::set_msg('success', ':)', 'تم أرسال الرسالة بنجاح سنقوم بالأطلاع بأقرب <strong>وقت</strong>');
      $this->redirecr_page(messages::$msg_alert, 'contact.php', 2);
      exit();
    }
  }



  private function chek_input() { // Checked Data
    if(empty($this->name)) {
      messages::set_msg('danger', 'خطأ', 'الرجاء عدم ترك خانة الأسم <strong>فارغة</strong>');
      echo messages::get_msg();
    } elseif(empty($this->email)) {
      messages::set_msg('danger', 'خطأ', 'الرجاء عدم ترك خانة الأيميل <strong>فارغة</strong>');
      echo messages::get_msg();
    } elseif(empty($this->content)) {
      messages::set_msg('danger', 'خطأ', 'الرجاء عدم ترك الرسالة <strong>فارغة</strong>');
      echo messages::get_msg();
    } else {
      return true;
    }
    return false;
  }

  private function send_message() { // Function Send Message To Database
    if($this->chek_input()) {
        $send = $this->insert('messages', 'name, subject, email, phone, content, date', ':xname, :xsubject, :xemail, :xphone, :xcontent, now()');
        $values = array(
          ':xname'    =>   $this->name,
          ':xsubject' =>   $this->subject,
          ':xemail'   =>   $this->email,
          ':xphone'   =>   $this->phone,
          ':xcontent' =>   $this->content
        );
        if($send->execute($values)) {
          return true;
        }

    }
    return false;
  }
  
}