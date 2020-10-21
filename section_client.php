    <!-- Start Section Files Css And Header Html -->
    <?php require_once __DIR__ .'/app/core/init.php'; ?>
    <?php 
        

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
    <meta property="og:description"        content="تعرف على دليل نشاط وخدمات الشركات العربية والأجنبية المتواجدة داخل تركيا" />
    <meta property="og:image"              content="http://oxygen-turkey.com/company.jpg" />
    <?php
    
    $id = 0;
    if(isset($_GET['id']) and is_numeric($_GET['id'])) {
      $id = $_GET['id'];
    } else {
      $id = 0;
    }
    $check_sec = false;
    $contact_data = new clients();
    $ch = $contact_data->select("*", "clients_sections", "WHERE sec_id = ?");
    $ch->execute(array($id));
    $info = $ch->rowCount();
    $dat_id = $ch->fetch();
    
    ?>
    <title><?php echo $dat_id['sec_name'] . $title; ?></title>
    <?php require_once 'inc-front/header.php'; ?>
    <!-- Start Section Header Page [Top Header, Navbar, Cover] -->
    <?php require_once 'inc-front/header-nav.php'; ?>
    
    <!-- End Section Header Page -->

    <!-- Start Body Page -->
      <!-- Start Company Guide Section -->

      <section class="company-guide">
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
              <div class="row no-gutters">
                <div class="col-md-3 sc-big">
                  <aside class="company-jops">
                    <?php

                    
                    if($info > 0) {
                      $check_sec = true;
                    }
                    if(!$check_sec) {
                      messages::set_msg('danger', 'عذراً', 'الصفحة غير <strong> موجودة</strong>');
                      $contact_data->redirecr_page(messages::$msg_alert, './', 0);
                    }
                    $data_by_id = $contact_data->select('*', 'clients_sections', 'WHERE sec_id = ?');
                    $data_by_id->execute(array($id));
                    $data_id = $data_by_id->fetch();
                    ?>
                    <a href="section_client.php?id=<?php echo $data_id['sec_id']; ?>" class="<?php if($data_id['sec_id'] == $id) { echo 'active'; } ?>" <?php echo $data_id['sec_name']; ?>"><img src="admin/uplodas/<?php echo $data_id['dir'] . '/' . $data_id['icon_white']; ?>" alt=""> <?php echo $data_id['sec_name']; ?></a>
                    <?php 
                    $sections = $contact_data->select('*', 'clients_sections', 'WHERE sec_id != ?');
                    $sections->execute(array($id));
                    $all_sec = $sections->fetchAll();
                    foreach ($all_sec as $sec) {
                    
                    ?>
                    <a href="section_client.php?id=<?php echo $sec['sec_id']; ?>" data-in="admin/uplodas/<?php echo $sec['dir'] . '/' . $sec['icon_white']; ?>" data-out="admin/uplodas/<?php echo $sec['dir'] . '/' . $sec['icon_dark']; ?>"><img src="admin/uplodas/<?php echo $sec['dir'] . '/' . $sec['icon_dark']; ?>" alt=""> <?php echo $sec['sec_name']; ?></a>
                    <img src="admin/uplodas/<?php echo $sec['dir'] . '/' . $sec['icon_white']; ?>" style="display: block;" width="0" height="0">
                    <?php } ?>
                  </aside>
                </div>
                <div class="col-md-9">
                <div class="box-company">
                    <?php
                    
                    ?>
                    <h2><?php echo $data_id['sec_name']; ?></h2>
                    <div class="row no-gutters">
                      <?php
                      
                      $show_clients = new clients();
                      $hair = $show_clients->select('*', 'clients_company', 'WHERE section_id = ? ORDER BY id DESC');
                      $hair->execute(array($id));
                      $clents = $hair->fetchAll();
                      
                      foreach($clents as $clent) {
                      ?>
                      <div class="col-md-6 col-sm-12">
                        <div class="container-company">
                          <div class="box-img">
                            <img src="<?php echo 'admin/uplodas/' . $clent['dir'] . '/' .$clent['brand']; ?>" alt="">
                          </div>
                          <a href="details_client.php?id=<?php echo $clent['id']; ?>"  style="font-family: 'Raleway'"><h4><?php echo $clent['name']; ?></h4></a>
                          <p><?php echo mb_substr($clent['description'], 0, 200); ?></p>
                          <div class="info-company">
                            <div><img src="image/icons/location-1.svg" alt=""> <span style="font-family: 'Raleway';direction: ltr"><?php echo $clent['address']; ?></span></div>
                            <div><img src="image/icons/phone-call.svg" alt=""> <bdi><?php echo $clent['phone_1'] . ' / ' . $clent['phone_2']; ?></bdi></div>
                            <div style="font-family: 'Raleway'"><img src="image/icons/email.svg" alt=""><?php echo $clent['email']; ?></div>
                            <a href="details_client.php?id=<?php echo $clent['id']; ?>" class="btn-more">تفاصيل أكثر</a>
                          </div>
                        </div>
                      </div>
                      <?php } ?>
                    </div>
                  </div>
                <div class="col-md-3 sc-small">
                  <aside class="company-jops">
                    <a href="section_client.php?id=<?php echo $data_id['sec_id']; ?>" class="<?php if($data_id['sec_id'] == $id) { echo 'active'; } ?>" <?php echo $data_id['sec_name']; ?>"><img src="admin/uplodas/<?php echo $data_id['dir'] . '/' . $data_id['icon_white']; ?>" alt=""> <?php echo $data_id['sec_name']; ?></a>
                    <?php
                      foreach ($all_sec as $sec) {
                    
                    ?>
                    <a href="section_client.php?id=<?php echo $sec['sec_id']; ?>" data-in="admin/uplodas/<?php echo $sec['dir'] . '/' . $sec['icon_white']; ?>" data-out="admin/uplodas/<?php echo $sec['dir'] . '/' . $sec['icon_dark']; ?>"><img src="admin/uplodas/<?php echo $sec['dir'] . '/' . $sec['icon_dark']; ?>" alt=""> <?php echo $sec['sec_name']; ?></a>
                    <?php } ?>
                  </aside>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- End Company Guide Section -->
    

      <!-- Start Clients Brands Section -->
      <?php require_once 'inc-front/upper-footer.php'; ?>
      <!-- Start Footer Section -->
      <?php require_once 'inc-front/footer.php'; ?>