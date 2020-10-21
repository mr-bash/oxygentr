    <!-- Start Section Files Css And Header Html -->
<?php 
$x = require_once __DIR__ .'/app/core/init.php';

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
<meta property="og:description"        content="فرص العمل في تركيا" />
<meta property="og:image"              content="http://oxygen-turkey.com/jops.jpg" />
    <?php
    
    $jops = new jops();
    $id = 0;
    if(isset($_GET['id']) and is_numeric($_GET['id'])) {
      $id = $_GET['id'];
    } else {
      $id = 0;
    }

    $check_sec = false;
    $ch = $jops->select("*", "jops_sections", "WHERE sec_id = ?");
    $ch->execute(array($id));
    $info = $ch->rowCount();
    $data_id = $ch->fetch();
    
    ?>
    <title><?php echo $data_id['sec_name'] . $title; ?></title>
    <?php require_once 'inc-front/header.php'; ?>
    <!-- Start Section Header Page [Top Header, Navbar, Cover] -->
    <?php require_once 'inc-front/header-nav.php'; ?>
    
    <!-- End Section Header Page -->

    <!-- Start Body Page -->
      <!-- Start Jops Turkey Section -->

      <section class="jops-turkey">
        <div class="cover-global">
        <?php 
          $ob_ads = new ads();
          $ads = $ob_ads->select('*', 'ads', 'WHERE id = 7');
          $ads->execute(array());
          $res = $ads->fetch();
          
          if($res['display'] == 1) {
            require_once 'inc-front/banner-ads.php'; 
          } else {
            echo '<h1 class="title-section">فرص العمل في تركيا</h1>';
          }
          
          ?>
        </div>
        <div class="container">
          <div class="container-items">
            <div class="row no-gutters">
              <div class="col-md-3 sc-big">
                <aside class="sections-jops">
                  <?php 
                  
                  
                  if($info > 0) {
                    $check_sec = true;
                  }
                  if(!$check_sec) {
                    messages::set_msg('danger', 'عذراً', 'الصفحة غير <strong> موجودة</strong>');
                    $jops->redirecr_page(messages::$msg_alert, './', 0);
                  }
                  ?>
                  <a href="jops_cat.php?id=<?php echo $data_id['sec_id']; ?>" class="<?php if($data_id['sec_id'] == $id) { echo 'active'; } ?>" ><img src="admin/uplodas/<?php echo $data_id['dir'] . '/' . $data_id['icon_white']; ?>" alt=""> <?php echo $data_id['sec_name']; ?></a>
                  <?php 
                  $sections_jop = $jops->select('*', 'jops_sections', 'WHERE sec_id != ?');
                  $sections_jop->execute(array($id));
                  $all_sec = $sections_jop->fetchAll();
                  foreach ($all_sec as $sec) {
                  
                  ?>
                  <a href="jops_cat.php?id=<?php echo $sec['sec_id']; ?>" data-in="admin/uplodas/<?php echo $sec['dir'] . '/' . $sec['icon_white']; ?>" data-out="admin/uplodas/<?php echo $sec['dir'] . '/' . $sec['icon_dark']; ?>" ><img src="admin/uplodas/<?php echo $sec['dir'] . '/' . $sec['icon_dark']; ?>" alt=""> <?php echo $sec['sec_name']; ?></a>
                  <?php  }?>
                </aside>
              </div>
              <div class="col-md-9">
                <div class="box-jops">
                  <h2><?php echo $data_id['sec_name']; ?></h2>
                  <div class="row no-gutters">
                    <?php 
                    
                    $all_jops = $jops->select('*', 'jops', 'WHERE jop_section = ? AND jop_status = 1');
                    $all_jops->execute(array($id));
                    $data_jops = $all_jops->fetchAll();

                    foreach ($data_jops as $data_jop) {
                    
                    ?>
                    <div class="col-md-6 col-sm-12">
                      <div class="container-jop">
                        <div class="box-img">
                          <a href="details_jop.php?id=<?php echo $data_jop['jop_id']; ?>"><img src="admin/uplodas/<?php echo $data_jop['jop_dir'] . '/' . $data_jop['jop_img']; ?>" alt=""></a>
                        </div>
                        <a href="details_jop.php?id=<?php echo $data_jop['jop_id']; ?>"><h4><?php echo $data_jop['jop_title']; ?></h4></a>
                        <div class="loaction"><img src="image/icons/placeholder.svg" alt=""> <span><?php echo $data_jop['jop_address']; ?></span></div>
                        <div class="date-jop"><img src="image/icons/calendar-1.svg" alt=""> <span><?php echo $data_jop['jop_date']; ?></span></div>
                      </div>
                    </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
              <div class="col-md-3 sc-small">
                <aside class="sections-jops">
                  <a href="jops_cat.php?id=<?php echo $data_id['sec_id']; ?>" class="<?php if($data_id['sec_id'] == $id) { echo 'active'; } ?>" ><img src="admin/uplodas/<?php echo $data_id['dir'] . '/' . $data_id['icon_white']; ?>" alt=""> <?php echo $data_id['sec_name']; ?></a>
                  <?php 
                  foreach ($all_sec as $sec2) {
                  
                  ?>
                  <a href="jops_cat.php?id=<?php echo $sec2['sec_id']; ?>" data-in="admin/uplodas/<?php echo $sec2['dir'] . '/' . $sec2['icon_white']; ?>" data-out="admin/uplodas/<?php echo $sec2['dir'] . '/' . $sec2['icon_dark']; ?>" ><img src="admin/uplodas/<?php echo $sec2['dir'] . '/' . $sec2['icon_dark']; ?>" alt=""> <?php echo $sec2['sec_name']; ?></a>
                  <?php  }?>
                </aside>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End Jops Turkey Section -->
    

      <!-- Start Clients Brands Section -->
      <?php require_once 'inc-front/upper-footer.php'; ?>
      <!-- Start Footer Section -->
      <?php require_once 'inc-front/footer.php'; ?>