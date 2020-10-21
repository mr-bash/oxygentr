    <!-- Start Section Files Css And Header Html -->
    <!-- Start Section Files Css And Header Html -->
    <?php 
$x = require_once __DIR__ .'/app/core/init.php';

$jops = new jops();
$id = 0;
if(isset($_GET['id']) and is_numeric($_GET['id'])) {
  $id = $_GET['id'];
} else {
  $id = 0;
}

$all_jops = $jops->select('*', 'jops', 'WHERE jop_id = ? AND jop_status = 1');
$all_jops->execute(array($id));
$data_jops = $all_jops->fetch();

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
<meta property="og:description"        content="<?php echo $data_jops['jop_content']; ?>" />
<meta property="og:image"              content="http://oxygen-turkey.com/admin/uplodas/<?php echo $data_jops['jop_dir'] . '/' . $data_jops['jop_img']; ?>" />

    <title><?php echo $data_jops['jop_title'] . $title; ?></title>
    <?php require_once 'inc-front/header.php'; ?>
    <!-- Start Section Header Page [Top Header, Navbar, Cover] -->
    <?php require_once 'inc-front/header-nav.php'; ?>
    
    <!-- End Section Header Page -->

    <!-- Start Body Page -->
      <!-- Start Show Jops Turkey Section -->

      <section class="jops-turkey show-jop">
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
                  
                  // $jops = new jops();
                  // $id = 0;
                  // if(isset($_GET['id']) and is_numeric($_GET['id'])) {
                  //   $id = $_GET['id'];
                  // } else {
                  //   $id = 0;
                  // }

                  // $all_jops = $jops->select('*', 'jops', 'WHERE jop_id = ? AND jop_status = 1');
                  // $all_jops->execute(array($id));
                  // $data_jops = $all_jops->fetch();

                  $check_sec = false;
                  $ch = $jops->select("*", "jops_sections", "WHERE sec_id = ?");
                  $ch->execute(array($data_jops['jop_section']));
                  $info = $ch->rowCount();
                  $data_id = $ch->fetch();
                  if($info > 0) {
                    $check_sec = true;
                  }
                  if(!$check_sec) {
                    messages::set_msg('danger', 'عذراً', 'الصفحة غير <strong> موجودة</strong>');
                    $jops->redirecr_page(messages::$msg_alert, './', 0);
                  }
                  
                  ?>
                  <a href="jops_cat.php?id=<?php echo $data_id['sec_id']; ?>" class="<?php if($data_id['sec_id'] == $data_jops['jop_section']) { echo 'active'; } ?>" ><img src="admin/uplodas/<?php echo $data_id['dir'] . '/' . $data_id['icon_white']; ?>" alt=""> <?php echo $data_id['sec_name']; ?></a>

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
                <div class="row no-gutters">
                  <div class="col-md-6 col-sm-12">
                    <div class="details-header">
                      <div>
                        <img src="image/icons/factory.svg" alt=""> <span>أسم الشركة : <span style="font-family: 'Raleway'"><?php echo $data_jops['jop_company']; ?></span></span>
                      </div>
                      <div>
                        <img src="image/icons/placeholder-2.svg" alt=""> <span>العنوان : <span><?php echo $data_jops['jop_address']; ?></span></span>
                      </div>
                      <div>
                        <img src="image/icons/collaboration.svg" alt=""> <span >العدد المطلوب : <span style="font-family: 'Raleway'"><?php echo $data_jops['jop_count']; ?></span></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                    <div class="details-header">
                      <div>
                        <img src="image/icons/email-2.svg" alt=""> <span>البريد الألكتروني : <span style="font-family: 'Raleway'"><?php echo $data_jops['jop_email']; ?></span></span>
                      </div>
                      <div>
                        <img src="image/icons/domain.svg" alt=""> <span>الموقع الألكتروني : <a href="<?php echo $data_jops['jop_site']; ?>" style="font-family: 'Raleway'" target="_blank"><?php echo $data_jops['jop_site']; ?></a></span>
                      </div>
                      <div>
                        <img src="image/icons/smartphone-2.svg" alt=""> <span>رقم الهاتف : <span><bdi><?php echo $data_jops['jop_phone']; ?></bdi></span></span>
                      </div>
                    </div>
                  </div>
                  <div class="row no-gutters">
                    <div class ="col-md-8 col-sm-12">
                      <div class="container-content">
                        <div class="about-content">
                          <div class="box-img"><img src="admin/uplodas/<?php echo $data_jops['jop_dir'] . '/' . $data_jops['jop_img']; ?>" alt="<?php echo $data_jops['jop_title'] ?>"></div>
                          <h3><?php echo $data_jops['jop_title']; ?></h3>
                          <div class="about-post">
                            <div><img src="image/icons/price-tag.svg" alt=""> <a href="jops_cat.php?id=<?php echo $data_id['sec_id']; ?>"><?php echo $data_id['sec_name']; ?></a></div>
                            <div><img src="image/icons/calendar-2.svg" alt=""> <span class="date"><?php echo $data_jops['jop_date']; ?></span> <img src="image/icons/timer.svg" alt=""> <span class="time"> 12:30 ص</span></div>
                          </div>
                        </div>
                        <div class="text-content">
                          <p>
                            <?php echo $data_jops['jop_content']; ?>
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                      <aside>
                        <div>
                          <h5>نوع الدوام</h5>
                          <span><?php echo $data_jops['jop_type']; ?></span>
                        </div>
                        <div>
                          <h5>الراتب</h5>
                          <span>- <?php echo $data_jops['jop_salary']; ?> -</span>
                        </div>
                        <div>
                          <h5>آخر موعد للتقديم</h5>
                          <span><?php echo $data_jops['jop_lastdate']; ?></span>
                        </div>
                        <div>
                          <h5>عدد سنوات الخبرة</h5>
                          <span><?php echo $data_jops['jop_experience']; ?></span>
                        </div>
                        <div class="share">
                          <a href="#">مشاركة <img src="image/icons/share.svg" alt=""></a>
                        </div>
                      </aside>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="title">
                        <span class="title-section">وظائف مشابهة</span>
                      </div>
                    </div>
                    <?php 
                    
                    $like_jops = $jops->select('*', 'jops', 'WHERE jop_section = ? AND jop_status = 1 AND jop_id != ?');
                    $like_jops->execute(array($data_id['sec_id'], $id));
                    $like_data = $like_jops->fetchAll();

                    foreach ($like_data as $like) {
                      
                    ?>
                    <div class="col-md-6 col-sm-12">
                      <div class="container-jop">
                        <div class="box-img">
                          <a href="details_jop.php?id=<?php echo $like['jop_id']; ?>"><img src="admin/uplodas/<?php echo $like['jop_dir'] . '/' . $like['jop_img']; ?>"></a>
                        </div>
                        <a href="details_jop.php?id=<?php echo $like['jop_id']; ?>"><h4><?php echo $like['jop_title'] ?></h4></a>
                        <div class="loaction"><img src="image/icons/placeholder.svg" alt=""> <span><?php echo $like['jop_address'] ?></span></div>
                        <div class="date-jop"><img src="image/icons/calendar-1.svg" alt=""> <span><?php echo $like['jop_date'] ?></span></div>
                      </div>
                    </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
              <div class="col-md-3 sc-small">
                <aside class="sections-jops">
                <a href="jops_cat.php?id=<?php echo $data_id['sec_id']; ?>" class="<?php if($data_id['sec_id'] == $data_jops['jop_section']) { echo 'active'; } ?>" ><img src="admin/uplodas/<?php echo $data_id['dir'] . '/' . $data_id['icon_white']; ?>" alt=""> <?php echo $data_id['sec_name']; ?></a>

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
            </div>
          </div>
        </div>
      </section>
      <!-- End Show Jops Turkey Section -->
    

      <!-- Start Clients Brands Section -->
      <?php require_once 'inc-front/upper-footer.php'; ?>
      <!-- Start Footer Section -->
      <?php require_once 'inc-front/footer.php'; ?>