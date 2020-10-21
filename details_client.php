    <!-- Start Section Files Css And Header Html -->
    <?php require_once __DIR__ .'/app/core/init.php'; ?>
    <?php 
        

    $title = ' - مجموعة أوكسجين';
    $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 
    "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .  
    $_SERVER['REQUEST_URI']; 

    $id = 0;
    if(isset($_GET['id']) and is_numeric($_GET['id'])) {
      $id = $_GET['id'];
    } else {
      $id = 0;
    }
    $show_clients = new clients();
    $meta_info = $show_clients->select('*', 'clients_company', 'WHERE id = ?');
    $meta_info->execute(array($_GET['id']));
    $meta = $meta_info->fetch();

    ?>
    <!DOCTYPE html>
    <html lang="ar">
      <head>
    <meta charset="UTF-8">
    <meta name="viewport"                  content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible"     content="ie=edge">
    <meta property="og:url"                content="<?php echo $link; ?> "/>
    <meta property="og:type"               content="website" />
    <meta property="og:description"        content="<?php echo $meta['description']; ?>" />
    <meta property="og:image"              content="http://oxygen-turkey.com/admin/uplodas/<?php echo $meta['dir'] . '/' .$meta['image_1']; ?>" />
    <?php 
    
    if($meta['image_2'] != 0) { ?>
      <meta property="og:image"              content="http://oxygen-turkey.com/admin/uplodas/<?php echo $meta['dir'] . '/' .$meta['image_2']; ?>" />  
      <?php } 
      if($meta['image_3'] != 0) { ?>
      <meta property="og:image"              content="http://oxygen-turkey.com/admin/uplodas/<?php echo $meta['dir'] . '/' .$meta['image_3']; ?>" />  
      <?php } 
      if($meta['image_4'] != 0) { ?>
      <meta property="og:image"              content="http://oxygen-turkey.com/admin/uplodas/<?php echo $meta['dir'] . '/' .$meta['image_4']; ?>" />  
      <?php } 
      if($meta['image_5'] != 0) { ?>
      <meta property="og:image"              content="http://oxygen-turkey.com/admin/uplodas/<?php echo $meta['dir'] . '/' .$meta['image_5']; ?>" />  
      <?php } ?>
      
    <title><?php echo 'دليل الشركات في تركيا' . $title; ?></title>
    <?php require_once 'inc-front/header.php'; ?>
    <!-- Start Section Header Page [Top Header, Navbar, Cover] -->
    <?php require_once 'inc-front/header-nav.php'; ?>
    
    <!-- End Section Header Page -->

    <!-- Start Body Page -->
      <!-- Start Details Company Section -->
      <?php 

      $client_found = false;

      $res = $show_clients->select('*', 'clients_company', 'WHERE id = ?');
      $res->execute(array($id));
      if($res->rowCount() > 0) {
        $client_found = true;
      }
      if(!$client_found) {
        messages::set_msg('danger', 'عذراً', 'الصفحة غير <strong> موجودة</strong>');
        $contact_data->redirecr_page(messages::$msg_alert, './', 0);
      }
      $video_info = $show_clients->select('*', 'clients_company', 'WHERE id = ?');
      $video_info->execute(array($_GET['id']));
      $video = $video_info->fetch();
      if(!empty($video['link_video'])) {
        $link = parse_url($video['link_video'], PHP_URL_QUERY);
        parse_str($link, $res_video);
      }
      ?>
      <div class="show-video">
        <input type="hidden" id="data-iframe" value="<iframe src='https://www.youtube.com/embed/<?php echo $res_video['v']; ?>' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>">      </div>
      <section class="details-company">
        <div class="cover-global" style="top: 20px;">
        <?php 
          $ob_ads = new ads();
          $ads = $ob_ads->select('*', 'ads', 'WHERE id = 6');
          $ads->execute(array());
          $res = $ads->fetch();
          
          if($res['display'] == 1) {
            require_once 'inc-front/banner-ads.php'; 
          } else {
            echo '<h1 class="title-section">دليل الشركات في تركيا</h1>';
          }
          
          ?>
        </div>
        <div class="container">
          <div class="container-items">
          <?php
          
          if($client_found and isset($_GET['id']) and is_numeric($_GET['id'])) {
            $client_info = $show_clients->select('*', 'clients_company', 'WHERE id = ?');
            $client_info->execute(array($_GET['id']));
            $data = $client_info->fetch();
          ?>
            <div class="logo-company">
                <img src="<?php echo 'admin/uplodas/' . $data['dir'] . '/' .$data['brand']; ?>" >
            </div>
            <div class="slider">
              
              <ul class="pgwSlider">
                <li><img src="<?php echo 'admin/uplodas/' . $data['dir'] . '/' .$data['image_1']; ?>" ></li>
                <?php
                if($data['image_2'] != 0) {
                  ?>
                  <li><img src="<?php echo 'admin/uplodas/' . $data['dir'] . '/' .$data['image_2']; ?>" ></li>
                  <?php
                }
                ?>
                <?php
                if($data['image_3'] != 0) {
                  ?>
                  <li><img src="<?php echo 'admin/uplodas/' . $data['dir'] . '/' .$data['image_3']; ?>" ></li>
                  <?php
                }
                ?>
                <?php
                if($data['image_4'] != 0) {
                  ?>
                  <li><img src="<?php echo 'admin/uplodas/' . $data['dir'] . '/' .$data['image_4']; ?>"></li>
                  <?php
                }
                ?>
                <?php
                if($data['image_5'] != 0) {
                  ?>
                  <li><img src="<?php echo 'admin/uplodas/' . $data['dir'] . '/' .$data['image_5']; ?>"></li>
                  <?php
                }
                ?>
              </ul>

            </div>
            <div class="details">
              <div class="row">
                <div class="col-md-7 col-sm-12">
                  <h2><?php echo $data['name']; ?></h2>
                  <p><?php echo $data['description']; ?></p>
                </div>
                <div class="col-md-5 col-sm-12">
                  <div class="box-video">
                    <div class="loading">
                      <div></div>
                      <div></div>
                      <div></div>
                    </div>
                    <img src="<?php echo 'admin/uplodas/' . $data['dir'] . '/' .$data['image_1']; ?>" alt="<?php echo $data['name']; ?>">
                    <div class="opc"></div>
                    <span><?php if(!empty($data['link_video'])) { echo '<img src="image/icons/icons_company/play-button.svg">'; } ?></span>
                  </div>
                  
                </div>
                
              </div>
            </div>
            <div class="info-contact">
              <div class="row">
                  <div class="col-md-4 col-sm-12 info">
                    <div><img src="images/icon/location-1.svg" alt=""> <span><?php echo $data['name']; ?>‎‏</span></div>
                    <div><img src="images/icon/business-number.svg" alt=""> <span>تصنيف الشركة : <?php echo $data['type']; ?></span></div>
                    <div><img src="images/icon/type-company.svg" alt=""> <span>عدد الفروع : <?php echo $data['number_branches']; ?></span></div>
                  </div>
                  <div class="col-md-4 col-sm-12 info">
                    <div><img src="images/icon/website.svg" alt=""> <a href="#" style="font-family: 'Raleway'"><?php echo $data['web_site']; ?></a></div>
                    <div><img src="images/icon/smartphone.svg" alt=""> <span><bdi><?php echo $data['phone_1'] . ' / ' . $data['phone_2']; ?></bdi></span></div>
                    <div><img src="images/icon/email.svg" alt=""> <span style="font-family: 'Raleway'"><?php echo $data['email']; ?></span></div>
                  </div>
                  <div class="col-md-4 col-sm-12 icon-contact">
                    <?php
                    if(!empty($data['whatsapp'])) {
                    ?>
                    <a href="<?php echo 'https://wa.me/+' . $data['whatsapp']; ?>" target="_blank"><img src="image/icons/icons_company/WhatsApp.svg"></a>
                    <?php
                    }
                    if(!empty($data['whatsapp'])) {
                    ?>
                    <a href="<?php echo $data['facebook']; ?>" target="_blank"><img src="image/icons/icons_company/Facebook.svg" alt=""></a>
                    <?php
                    }
                    if(!empty($data['insta'])) {
                    ?>
                    <a href="<?php echo $data['insta']; ?>" target="_blank"><img src="image/icons/icons_company/Instagram.svg" alt=""></a>
                    <?php
                    }
                    if(!empty($data['twetter'])) {
                    ?>
                    <a href="<?php echo $data['twetter']; ?>" target="_blank"><img src="image/icons/icons_company/Twitter.svg" alt=""></a>
                    <?php
                    }
                    if(!empty($data['youtube'])) {
                    ?>
                    <a href="<?php echo $data['youtube']; ?>" target="_blank"><img src="image/icons/icons_company/YouTube.svg" alt=""></a>
                    <?php
                    }
                    ?>
                  </div>
              </div>
            </div>
            <?php
      }  else {
        echo '<span style="display:block;width:100%;height:300px;text-align:center;padding:20px">Error !!</span>';
      }
          ?>
          </div>

        </div>
      </section>
      <!-- End Details Company Section -->
    

      <!-- Start Clients Brands Section -->
      <?php require_once 'inc-front/upper-footer.php'; ?>
      <!-- Start Footer Section -->
      <?php require_once 'inc-front/footer.php'; ?>