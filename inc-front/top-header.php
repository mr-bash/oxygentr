<?php 
$x = require_once __DIR__ .'/../app/core/init.php';
$contact_data = new inbox();
$d = $contact_data->select('*', 'contact');
$d->execute(array());
$conn_data = $d->fetch();

$title = ' - مجموعة أوكسجين';
$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 
"https" : "http") . "://" . $_SERVER['HTTP_HOST'] .  
$_SERVER['REQUEST_URI']; 


?>
<!DOCTYPE html>
<html lang="ar">
  <head>
<meta charset="UTF-8">
<meta name="viewport"                  content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible"     content="ie=edge">
<meta property="og:url"                content="<?php echo $link; ?> "/>
<meta property="og:type"               content="website" />
<!-- <meta property="og:title"              content="When Great Minds Don’t Think Alike" /> -->
<meta property="og:description"        content="تأسست شركة مجموعة أوكسجين في مدينة غازي عنتاب التركية في آذار من عام 2014 لتقديم الخدمات الإعلانية والإعلامية والبرمجية للمؤسسات والشركات والمنظمات والمنشآت العربية والأجنبية الموجودة في تركيا وبعد عمل متواصل لأكثر من ثلاث سنوات تم فتح فرع اسطنبول في نيسان 2017 لتوسيع مركز الخدمة في كل من اسطنبول وبورصة بالإضافة إلى غازي عينتاب والوصول إلى جميع العملاء العرب والأجانب" />
<meta property="og:image"              content="http://oxygen-turkey.com/admin/uplodas/about_files/9470_2.jpg" />