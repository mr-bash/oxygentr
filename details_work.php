    <!-- Start Section Files Css And Header Html -->
    <?php require_once __DIR__ .'/app/core/init.php'; ?>
    <?php 
    $contact_data = new inbox();
    $d = $contact_data->select('*', 'contact');
    $d->execute(array());
    $conn_data = $d->fetch();    

    $title = ' - مجموعة أوكسجين';
    $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 
    "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .  
    $_SERVER['REQUEST_URI']; 

    $work = new works();
    if(isset($_GET['id']) and is_numeric($_GET['id'])) {
      $id = $_GET['id'];
    } else {
      $id = 0;
    }
    $data_works0 = $work->select('*', ' works', 'WHERE work_id = ?');
    $data_works0->execute(array($id));
    $data0 = $data_works0->fetch();

    ?>
    <!DOCTYPE html>
    <html lang="ar">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport"                  content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible"     content="ie=edge">
    <meta property="og:url"                content="<?php echo $link; ?> "/>
    <meta property="og:type"               content="website" />
    <meta property="og:description"        content="<?php $data0['work_content']; ?>" />
    <meta property="og:image"              content="http://oxygen-turkey.com/admin/uplodas/<?php echo $data0['dir'] . '/' . $data0['work_image_main']; ?>" />
    <?php 
    
    if($data0['work_image1'] != 0) { ?>
      <meta property="og:image"              content="http://oxygen-turkey.com/admin/uplodas/<?php echo $data0['dir'] . '/' .$data0['work_image1']; ?>" />  
      <?php } 
      if($data0['work_image2'] != 0) { ?>
      <meta property="og:image"              content="http://oxygen-turkey.com/admin/uplodas/<?php echo $data0['dir'] . '/' .$data0['work_image2']; ?>" />  
      <?php } 
      if($data0['work_image3'] != 0) { ?>
      <meta property="og:image"              content="http://oxygen-turkey.com/admin/uplodas/<?php echo $data0['dir'] . '/' .$data0['work_image3']; ?>" />  
      <?php } 
      if($data0['work_image4'] != 0) { ?>
      <meta property="og:image"              content="http://oxygen-turkey.com/admin/uplodas/<?php echo $data0['dir'] . '/' .$data0['work_image4']; ?>" />  
      <?php } 
      if($data0['work_image5'] != 0) { ?>
      <meta property="og:image"              content="http://oxygen-turkey.com/admin/uplodas/<?php echo $data0['dir'] . '/' .$data0['work_image5']; ?>" />  
      <?php } 
      if($data0['work_image6'] != 0) { ?>
      <meta property="og:image"              content="http://oxygen-turkey.com/admin/uplodas/<?php echo $data0['dir'] . '/' .$data0['work_image6']; ?>" />  
      <?php } 
      if($data0['work_image7'] != 0) { ?>
      <meta property="og:image"              content="http://oxygen-turkey.com/admin/uplodas/<?php echo $data0['dir'] . '/' .$data0['work_image7']; ?>" />  
      <?php } 
      if($data0['work_image8'] != 0) { ?>
        <meta property="og:image"              content="http://oxygen-turkey.com/admin/uplodas/<?php echo $data0['dir'] . '/' .$data0['work_image8']; ?>" />  
      <?php } ?>
    
    ?>
    <title><?php echo $data0['work_name'] . $title; ?></title>
    <?php require_once 'inc-front/header.php'; ?>
    <!-- Start Section Header Page [Top Header, Navbar, Cover] -->
    <?php require_once 'inc-front/header-page.php'; ?>
    
    <!-- End Section Header Page -->

    <!-- Start Body Page -->

    <!-- Start Body Page -->
      <!-- Start Jops Turkey Section -->
      <section class="show-work">
      <div class="cover-global">
        <?php 
          $ob_ads = new ads();
          $ads = $ob_ads->select('*', 'ads', 'WHERE id = 3');
          $ads->execute(array());
          $res = $ads->fetch();
          
          if($res['display'] == 1) {
            require_once 'inc-front/banner-ads.php'; 
          } else {
            echo '<h1 class="title-section">أعمال وفعاليات مجموعة أوكسجين</h1>';
          }
          
          ?>
        </div>
        <div class="container">
      <?php 


      $sec_works = $work->select('*', ' works', 'WHERE work_id = ?');
      $sec_works->execute(array($id));
      $info = $sec_works->fetch();
      $check = $sec_works->rowCount();

      if($check == 0 or $id == 0 or !isset($_GET['id'])) {
        messages::set_msg('danger', 'خطأ', ' الصفحة المطلوبة غير <strong> موجودة</strong>');
        $work->redirecr_page(messages::$msg_alert, 'works.php', 1);
        exit();
      }
      
      if(isset($_GET['id']) and $id != 0) {
        $data_works = $work->select('*', ' works', 'WHERE work_id = ?');
        $data_works->execute(array($id));
        $data = $data_works->fetch();

        if($data['section_id'] == 1 or $data['section_id'] ==7) { // Id Section Grphic Design And Events
      ?>
          <div class="container-items">
            <div class="slider">
              <ul class="pgwSlider">
                <!-- <li><img src="<?php echo 'http://' . $_SERVER['SERVER_NAME'] . '/admin/uplodas/' . $data['dir'] . '/' . $data['work_image_main']; ?>"></li> -->
                <?php
                  if($data['work_image1']  != 0) {
                    echo '<li><img src="http://' . $_SERVER['SERVER_NAME'] . '/admin/uplodas/' . $data['dir'] . '/' . $data['work_image1'] . '" alt=""></li>';
                  } 
                ?>
                <?php
                  if($data['work_image2'] != 0) {
                    echo '<li><img src="http://' . $_SERVER['SERVER_NAME'] . '/admin/uplodas/' . $data['dir'] . '/' . $data['work_image2'] . '" alt=""></li>';
                  } 
                ?>
                <?php
                  if($data['work_image3'] != 0) {
                    echo '<li><img src="http://' . $_SERVER['SERVER_NAME'] . '/admin/uplodas/' . $data['dir'] . '/' . $data['work_image3'] . '" alt=""></li>';
                  } 
                ?>
                <?php
                  if($data['work_image4'] != 0) {
                    echo '<li><img src="http://' . $_SERVER['SERVER_NAME'] . '/admin/uplodas/' . $data['dir'] . '/' . $data['work_image4'] . '" alt=""></li>';
                  } 
                ?>
                <?php
                  if($data['work_image5'] != 0) {
                    echo '<li><img src="http://' . $_SERVER['SERVER_NAME'] . '/admin/uplodas/' . $data['dir'] . '/' . $data['work_image5'] . '" alt=""></li>';
                  } 
                ?>
                <?php
                  if($data['work_image6'] != 0) {
                    echo '<li><img src="http://' . $_SERVER['SERVER_NAME'] . '/admin/uplodas/' . $data['dir'] . '/' . $data['work_image6'] . '" alt=""></li>';
                  } 
                ?>
                <?php
                  if($data['work_image7'] != 0) {
                    echo '<li><img src="http://' . $_SERVER['SERVER_NAME'] . '/admin/uplodas/' . $data['dir'] . '/' . $data['work_image7'] . '" alt=""></li>';
                  } 
                ?>
                <?php
                  if($data['work_image8'] != 0) {
                    echo '<li><img src="http://' . $_SERVER['SERVER_NAME'] . '/admin/uplodas/' . $data['dir'] . '/' . $data['work_image8'] . '" alt=""></li>';
                  } 
                ?>
              </ul>
            </div>
            <div class="details">
              <div>
                <h2 style="margin-top: 70px;"><?php echo $data['work_name']; ?></h2>
                <p><?php echo $data['work_content']; ?></p>
              </div>
            </div>
          </div>

      <?php  } else if($data['section_id'] == 4) { // Id Section Motion Grphic
      ?>

          <div class="container-items">
            <div class="slider motion">
              <div class="big-img">
              <?php 
              if(!empty($data['link_video'])) {
                $link = parse_url($data['link_video'], PHP_URL_QUERY);
                parse_str($link, $res_video);
              }
              ?>
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?php echo $res_video['v']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
            </div>
            <div class="details">
              <div>
                <h2><?php echo $data['work_name']; ?></h2>
                <p><?php echo $data['work_content']; ?></p>
              </div>
            </div>
          </div>

      <?php 
      } else if($data['section_id'] == 6) { // Id Section E-Marketing
      ?>
      
      <div class="container-items">
            <div class="slider">
            <ul class="pgwSlider">
                <!-- <li><img src="<?php echo 'http://' . $_SERVER['SERVER_NAME'] . '/admin/uplodas/' . $data['dir'] . '/' . $data['work_image_main']; ?>"></li> -->
                <?php
                  if($data['work_image1']  != 0) {
                    echo '<li><img src="http://' . $_SERVER['SERVER_NAME'] . '/admin/uplodas/' . $data['dir'] . '/' . $data['work_image1'] . '" alt=""></li>';
                  } 
                ?>
                <?php
                  if($data['work_image2'] != 0) {
                    echo '<li><img src="http://' . $_SERVER['SERVER_NAME'] . '/admin/uplodas/' . $data['dir'] . '/' . $data['work_image2'] . '" alt=""></li>';
                  } 
                ?>
                <?php
                  if($data['work_image3'] != 0) {
                    echo '<li><img src="http://' . $_SERVER['SERVER_NAME'] . '/admin/uplodas/' . $data['dir'] . '/' . $data['work_image3'] . '" alt=""></li>';
                  } 
                ?>
                <?php
                  if($data['work_image4'] != 0) {
                    echo '<li><img src="http://' . $_SERVER['SERVER_NAME'] . '/admin/uplodas/' . $data['dir'] . '/' . $data['work_image4'] . '" alt=""></li>';
                  } 
                ?>
                <?php
                  if($data['work_image5'] != 0) {
                    echo '<li><img src="http://' . $_SERVER['SERVER_NAME'] . '/admin/uplodas/' . $data['dir'] . '/' . $data['work_image5'] . '" alt=""></li>';
                  } 
                ?>
                <?php
                  if($data['work_image6'] != 0) {
                    echo '<li><img src="http://' . $_SERVER['SERVER_NAME'] . '/admin/uplodas/' . $data['dir'] . '/' . $data['work_image6'] . '" alt=""></li>';
                  } 
                ?>
                <?php
                  if($data['work_image7'] != 0) {
                    echo '<li><img src="http://' . $_SERVER['SERVER_NAME'] . '/admin/uplodas/' . $data['dir'] . '/' . $data['work_image7'] . '" alt=""></li>';
                  } 
                ?>
                <?php
                  if($data['work_image8'] != 0) {
                    echo '<li><img src="http://' . $_SERVER['SERVER_NAME'] . '/admin/uplodas/' . $data['dir'] . '/' . $data['work_image8'] . '" alt=""></li>';
                  } 
                ?>
              </ul>
            </div>
            <div class="details">
              <div>
              <h2 style="margin-top: 70px;"><?php echo $data['work_name']; ?></h2>
                <p><?php echo $data['work_content']; ?></p>
              </div>
            </div>
            <div class="info-contact">
              <div class="icon-contact">
                <?php if($data['whatsapp'] != '0') { ?>
                  <a href="https://wa.me/+<?php echo $data['whatsapp']; ?>" target="_blank"><img src="icons/WhatsApp.svg" alt="oxygen Group"></a>
                <?php } ?>
                <?php if($data['facebook'] != '0') {?>
                  <a href="<?php echo $data['facebook']; ?>" target="_blank"><img src="icons/Facebook.svg" alt="oxygen Group"></a>
                <?php } ?>
                <?php if($data['instagram'] != '0') {?>
                  <a href="<?php echo $data['instagram']; ?>" target="_blank"><img src="icons/Instagram.svg" alt="oxygen Group"></a>
                <?php } ?>
                <?php if($data['twitter'] != '0') {?>
                  <a href="<?php echo $data['twitter']; ?>" target="_blank"><img src="icons/Twitter.svg" alt="oxygen Group"></a>
                <?php } ?>
                <?php if($data['youtube'] != '0') {?>
                  <a href="<?php echo $data['youtube']; ?>" target="_blank"><img src="icons/YouTube.svg" alt="oxygen Group"></a>
                <?php } ?>
              </div>
            </div>
          </div>

      <?php } else if($data['section_id'] == 5) { // Id Section Web Design
      ?>

          <div class="container-items">
            <div class="slider web">
            <ul class="pgwSlider">
                <!-- <li><img src="<?php //echo 'http://' . $_SERVER['SERVER_NAME'] . '/admin/uplodas/' . $data['dir'] . '/' . $data['work_image_main']; ?>"></li> -->
                <?php
                  if($data['work_image1']  != 0) {
                    echo '<li><img src="http://' . $_SERVER['SERVER_NAME'] . '/admin/uplodas/' . $data['dir'] . '/' . $data['work_image1'] . '" alt=""></li>';
                  } 
                ?>
                <?php
                  if($data['work_image2'] != 0) {
                    echo '<li><img src="http://' . $_SERVER['SERVER_NAME'] . '/admin/uplodas/' . $data['dir'] . '/' . $data['work_image2'] . '" alt=""></li>';
                  } 
                ?>
                <?php
                  if($data['work_image3'] != 0) {
                    echo '<li><img src="http://' . $_SERVER['SERVER_NAME'] . '/admin/uplodas/' . $data['dir'] . '/' . $data['work_image3'] . '" alt=""></li>';
                  } 
                ?>
                <?php
                  if($data['work_image4'] != 0) {
                    echo '<li><img src="http://' . $_SERVER['SERVER_NAME'] . '/admin/uplodas/' . $data['dir'] . '/' . $data['work_image4'] . '" alt=""></li>';
                  } 
                ?>
                <?php
                  if($data['work_image5'] != 0) {
                    echo '<li><img src="http://' . $_SERVER['SERVER_NAME'] . '/admin/uplodas/' . $data['dir'] . '/' . $data['work_image5'] . '" alt=""></li>';
                  } 
                ?>
                <?php
                  if($data['work_image6'] != 0) {
                    echo '<li><img src="http://' . $_SERVER['SERVER_NAME'] . '/admin/uplodas/' . $data['dir'] . '/' . $data['work_image6'] . '" alt=""></li>';
                  } 
                ?>
                <?php
                  if($data['work_image7'] != 0) {
                    echo '<li><img src="http://' . $_SERVER['SERVER_NAME'] . '/admin/uplodas/' . $data['dir'] . '/' . $data['work_image7'] . '" alt=""></li>';
                  } 
                ?>
                <?php
                  if($data['work_image8'] != 0) {
                    echo '<li><img src="http://' . $_SERVER['SERVER_NAME'] . '/admin/uplodas/' . $data['dir'] . '/' . $data['work_image8'] . '" alt=""></li>';
                  } 
                ?>
              </ul>
            </div>
            <div class="details">
              <div>
              <h2 style="margin-top: 70px;"><?php echo $data['work_name']; ?></h2>
                <p><?php echo $data['work_content']; ?></p>
              </div>
            </div>
            <div class="info-contact">
              <a href="<?php echo $data['link_project']; ?>" target="_blank"><i class="fas fa-sync"></i> مشاهدة مباشرة</a>
            </div>
          </div>

      <?php }?>

                <?php } ?>
      
        </div>
      </section>

      <!-- Start Clients Brands Section -->
      <?php require_once 'inc-front/upper-footer.php'; ?>
      <!-- Start Footer Section -->
      <?php require_once 'inc-front/footer.php'; ?>