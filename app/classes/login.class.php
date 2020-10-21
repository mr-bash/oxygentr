<?php

class login extends mysql_connect {

  private $username, $password, $info;
  
  public function get_input($user, $pass) {
    $this->username = $this->input_string($user);
    $this->password = $this->input_string($pass);

    if($this->chek_input()) {
      
      $_SESSION['loged']      = true;
      $_SESSION['info_user']  = [ // Register Info User in Session Array
                              'id'         =>  $this->info['id'],
                              'firstname'  =>  $this->info['first_name'],
                              'lastname'   =>  $this->info['last_name'],
                              'email'      =>  $this->info['email'],
                              'perm_user'  =>  $this->info['permissions']
      ];

      header('Location: index.php');
    }
  }

  private function chek_input() {
    if(empty($this->username)) {
      messages::set_msg('danger', 'خطأ', 'الرجاء أدخال <strong>أسم المستخدم</strong>');
      echo messages::$msg_alert;
    } elseif(empty($this->password)) {
      messages::set_msg('danger', 'خطأ', 'الرجاء أدخال <strong>كلمة المرور</strong>');
      echo messages::$msg_alert;
    }elseif(!$this->check_user()) {
      messages::set_msg('danger', 'خطأ', 'البيانات المدخلة  <strong>غير صحيحة</strong>');
      echo messages::$msg_alert;
    } else {
      return true;
    }
    return false;
  }

  private function check_user() {
      $user = $this->select('*', 'admins', 'WHERE username = ? AND password = ?');
      $user->execute(array($this->username, sha1($this->password)));
      $res = $user->rowCount();
      $this->info = $user->fetch();
      if($res > 0) {
        return true;
      }
      return false;
    }

  private function loged() {

  }

}