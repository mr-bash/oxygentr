<?php
require_once __DIR__ .'/../app/core/session.php';

if(isset($_GET['id']) and is_numeric($_GET['id'])) {
  $id = $_GET['id'];
} else {
  $id = 0;
}

$ob_jops = new jops();
$sec_jops = $ob_jops->select('*', 'jops', 'WHERE jop_id = ?');
$sec_jops->execute(array($id));
$info = $sec_jops->fetch();
$check = $sec_jops->rowCount();

if($check == 0 and $id != 0 or isset($_GET['id']) and $_GET['id'] == 0) {
  messages::set_msg('danger', 'خطأ', ' الصفحة المطلوبة غير <strong> موجودة</strong>');
  $ob_jops->redirecr_page(messages::$msg_alert, 'jops.php', 1);
  exit();
}

$update_array = array($id);
if($info['jop_status'] == '0') {
  $approve = $ob_jops->update('jops', 'jop_status = 1', 'WHERE jop_id = ?');
} else {
  $approve = $ob_jops->update('jops', 'jop_status = 0', 'WHERE jop_id = ?');
}
if($approve->execute($update_array)) {
  
  $ob_jops->redirecr_page('', 'jops.php', 0);
}


