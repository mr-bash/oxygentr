<?php

  class upload extends mysql_connect {

    private $file, $name_file, $size_file, $url_file, $type_file, $name_dir, $custom;
    public $end_name_file;
    protected $extension_file = array('jpg', 'jpeg', 'png', 'gif', 'svg');

    
    public function up($file, $type_post, $name_dir, $custom = NULL) {
      $this->file = $file;
      $this->name_file  =   $this->file['name'];
      $this->size_file  =   $this->file['size'];
      $this->url_file   =   $this->file['tmp_name'];
      $this->type_file  =   $this->file['type'];
      $this->name_dir   =   $name_dir;
      $this->custom     =   $custom;

      $tmp = explode('.' ,$this->name_file);
      $res_end = end($tmp);
      $exte_my_file = strtolower($res_end);
      if($this->show_errors($exte_my_file, $type_post)) {
        if($this->custom == true) {
          $dir = 'admin/uplodas/' . $this->name_dir . "\\";
        } else {
          $dir = 'uplodas/' . $this->name_dir . "\\";
        }
        if(!file_exists($dir)) {
          mkdir($dir, 0777, true);
        }
        $the_file = rand(0, 10000) . '_' . $this->name_file;
        move_uploaded_file($this->url_file, $dir . $the_file);
        $this->end_name_file = $the_file;
        return true;
      }
    }

    private function show_errors($my_file, $type_post) {
      if(!empty($this->name_file) and !in_array($my_file, $this->extension_file)) {
        messages::set_msg('danger', 'خطأ', 'الرجاء أختيار صورة ذات أمتداد صحيح <strong>(jpg, jpeg, png, svg)</strong>');
        echo messages::$msg_alert;
      } else {
        return true;
      }

      return false;
    }


  }