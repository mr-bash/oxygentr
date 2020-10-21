<?php

class Messages {

  public static $msg_alert;

  public static function set_msg($type, $title, $msg) {

    self::$msg_alert = '<div class="alert alert-'. $type . ' alert-dismissible show" role="alert">
                          <strong> ' . $title . ' </strong>' . $msg . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>';

  }

  public static function get_msg() {
    echo messages::$msg_alert;
  }

}