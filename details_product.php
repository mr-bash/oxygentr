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
    $shop = new shop();
    $product_found = false;

    $res = $shop->select('*', 'shop', 'WHERE id = ?');
    $res->execute(array($id));
    if($res->rowCount() > 0) {
      $product_found = true;
    }
    if(!$product_found) {
      messages::set_msg('danger', 'عذراً', 'الصفحة غير <strong> موجودة</strong>');
      $contact_data->redirecr_page(messages::$msg_alert, 'shop.php', 0);
    }
    $products_info = $shop->select('*', 'shop', 'WHERE id = ?');
    $products_info->execute(array($_GET['id']));
    $product = $products_info->fetch();
    
    ?>
    <!DOCTYPE html>
    <html lang="ar">
      <head>
    <meta charset="UTF-8">
    <meta name="viewport"                  content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible"     content="ie=edge">
    <meta property="og:url"                content="<?php echo $link; ?> "/>
    <meta property="og:type"               content="website" />
    <meta property="og:description"        content="<?php echo $product['content']; ?>" />
    <meta property="og:image"              content="http://oxygen-turkey.com/admin/uplodas/<?php echo $product['dir'] . '/' .$product['img_1']; ?>" />
    <?php 
    
    if($product['img_2'] != 0) { ?>
    <meta property="og:image"              content="http://oxygen-turkey.com/admin/uplodas/<?php echo $product['dir'] . '/' .$product['img_2']; ?>" />  
    <?php } 
    if($product['img_3'] != 0) { ?>
    <meta property="og:image"              content="http://oxygen-turkey.com/admin/uplodas/<?php echo $product['dir'] . '/' .$product['img_3']; ?>" />  
    <?php } 
    if($product['img_4'] != 0) { ?>
    <meta property="og:image"              content="http://oxygen-turkey.com/admin/uplodas/<?php echo $product['dir'] . '/' .$product['img_4']; ?>" />  
    <?php } 
    if($product['img_5'] != 0) { ?>
    <meta property="og:image"              content="http://oxygen-turkey.com/admin/uplodas/<?php echo $product['dir'] . '/' .$product['img_5']; ?>" />  
    <?php } 
    if($product['img_6'] != 0) { ?>
    <meta property="og:image"              content="http://oxygen-turkey.com/admin/uplodas/<?php echo $product['dir'] . '/' .$product['img_6']; ?>" />  
    <?php } 
    if($product['img_7'] != 0) { ?>
    <meta property="og:image"              content="http://oxygen-turkey.com/admin/uplodas/<?php echo $product['dir'] . '/' .$product['img_7']; ?>" />  
    <?php } 
    if($product['img_8'] != 0) { ?>
    <meta property="og:image"              content="http://oxygen-turkey.com/admin/uplodas/<?php echo $product['dir'] . '/' .$product['img_8']; ?>" />  
    <?php } ?>


    <title><?php echo $product['name'] . $title; ?></title>
    <?php require_once 'inc-front/header.php'; ?>
    <!-- Start Section Header Page [Top Header, Navbar, Cover] -->
    <?php require_once 'inc-front/header-nav.php'; ?>
    
    <!-- End Section Header Page -->

    <!-- Start Body Page -->
      <!-- Start Gallery Section -->

      <section class="details-shop">
        <div class="cover-global" style="top: 20px;">
        <?php 
          $ob_ads = new ads();
          $ads = $ob_ads->select('*', 'ads', 'WHERE id = 4');
          $ads->execute(array());
          $res = $ads->fetch();
          
          if($res['display'] == 1) {
            require_once 'inc-front/banner-ads.php'; 
          } else {
            echo '<h1 class="title-section">متجر أوكسجين</h1>';
          }
          
          ?>
        </div>
        <div class="container">
          <div class="container-items container-details">
            <div class="row">
              <div class="col-md-6 col-sm-12 sc-small" style="background-color: #f3f3f3;">
                <div class="images-product">
                  <div class="show-img">
                    <span class="count-img">01</span>
                    <img src="admin/uplodas/<?php echo $product['dir'] . '/' . $product['img_1']; ?>" alt="<?php echo $product['name']; ?>">
                  </div>
                  <div class="slider-thumbnails">
                    <span class="to-right"><i class="fas fa-chevron-right"></i></span>
                    <span class="to-left"><i class="fas fa-chevron-left"></i></span>
                    <div class="container-big">
                      <div class="container-img">
                        <div class="box-thumbnail active" data-count="01">
                          <img src="admin/uplodas/<?php echo $product['dir'] . '/' . $product['img_1']; ?>" alt="<?php echo $product['name']; ?>">
                        </div>
                        <?php if(isset($product['img_2']) AND $product['img_2'] != 0) { ?>
                        <div class="box-thumbnail" data-count="">
                          <img src="admin/uplodas/<?php echo $product['dir'] . '/' . $product['img_2']; ?>" alt="<?php echo $product['name']; ?>">
                        </div>
                        <?php } ?>
                        <?php if(isset($product['img_3']) AND $product['img_3'] != 0) { ?>
                        <div class="box-thumbnail" data-count="">
                          <img src="admin/uplodas/<?php echo $product['dir'] . '/' . $product['img_3']; ?>" alt="<?php echo $product['name']; ?>">
                        </div>
                        <?php } ?>
                        <?php if(isset($product['img_4']) AND $product['img_4'] != 0) { ?>
                        <div class="box-thumbnail" data-count="">
                          <img src="admin/uplodas/<?php echo $product['dir'] . '/' . $product['img_4']; ?>" alt="<?php echo $product['name']; ?>">
                        </div>
                        <?php } ?>
                        <?php if(isset($product['img_5']) AND $product['img_5'] != 0) { ?>
                        <div class="box-thumbnail" data-count="">
                          <img src="admin/uplodas/<?php echo $product['dir'] . '/' . $product['img_5']; ?>" alt="<?php echo $product['name']; ?>">
                        </div>
                        <?php } ?>
                        <?php if(isset($product['img_6']) AND $product['img_6'] != 0) { ?>
                        <div class="box-thumbnail" data-count="">
                          <img src="admin/uplodas/<?php echo $product['dir'] . '/' . $product['img_6']; ?>" alt="<?php echo $product['name']; ?>">
                        </div>
                        <?php } ?>
                        <?php if(isset($product['img_7']) AND $product['img_7'] != 0) { ?>
                        <div class="box-thumbnail" data-count="">
                          <img src="admin/uplodas/<?php echo $product['dir'] . '/' . $product['img_7']; ?>" alt="<?php echo $product['name']; ?>">
                        </div>
                        <?php } ?>
                        <?php if(isset($product['img_8']) AND $product['img_8'] != 0) { ?>
                        <div class="box-thumbnail" data-count="">
                          <img src="admin/uplodas/<?php echo $product['dir'] . '/' . $product['img_8']; ?>" alt="<?php echo $product['name']; ?>">
                        </div>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="details-product">
                  <h2><?php echo $product['name']; ?></h2>
                  <?php if(!empty($product['code'])) { echo '<span><span>#</span>' . $product['code'] . '</span>'; } ?>
                  <p><?php echo $product['content']; ?></p>
                  <a href="contact.php">طلب المنتج</a>
                </div>
              </div>
              <div class="col-md-6 col-sm-12 sc-big" style="background-color: #f3f3f3;">
              <div class="images-product">
                  <div class="show-img">
                    <span class="count-img">01</span>
                    <img src="admin/uplodas/<?php echo $product['dir'] . '/' . $product['img_1']; ?>" alt="<?php echo $product['name']; ?>">
                  </div>
                  <div class="slider-thumbnails">
                    <span class="to-right"><i class="fas fa-chevron-right"></i></span>
                    <span class="to-left"><i class="fas fa-chevron-left"></i></span>
                    <div class="container-big">
                      <div class="container-img">
                        <div class="box-thumbnail active" data-count="01">
                          <img src="admin/uplodas/<?php echo $product['dir'] . '/' . $product['img_1']; ?>" alt="<?php echo $product['name']; ?>">
                        </div>
                        <?php if(isset($product['img_2']) AND $product['img_2'] != 0) { ?>
                        <div class="box-thumbnail" data-count="">
                          <img src="admin/uplodas/<?php echo $product['dir'] . '/' . $product['img_2']; ?>" alt="<?php echo $product['name']; ?>">
                        </div>
                        <?php } ?>
                        <?php if(isset($product['img_3']) AND $product['img_3'] != 0) { ?>
                        <div class="box-thumbnail" data-count="">
                          <img src="admin/uplodas/<?php echo $product['dir'] . '/' . $product['img_3']; ?>" alt="<?php echo $product['name']; ?>">
                        </div>
                        <?php } ?>
                        <?php if(isset($product['img_4']) AND $product['img_4'] != 0) { ?>
                        <div class="box-thumbnail" data-count="">
                          <img src="admin/uplodas/<?php echo $product['dir'] . '/' . $product['img_4']; ?>" alt="<?php echo $product['name']; ?>">
                        </div>
                        <?php } ?>
                        <?php if(isset($product['img_5']) AND $product['img_5'] != 0) { ?>
                        <div class="box-thumbnail" data-count="">
                          <img src="admin/uplodas/<?php echo $product['dir'] . '/' . $product['img_5']; ?>" alt="<?php echo $product['name']; ?>">
                        </div>
                        <?php } ?>
                        <?php if(isset($product['img_6']) AND $product['img_6'] != 0) { ?>
                        <div class="box-thumbnail" data-count="">
                          <img src="admin/uplodas/<?php echo $product['dir'] . '/' . $product['img_6']; ?>" alt="<?php echo $product['name']; ?>">
                        </div>
                        <?php } ?>
                        <?php if(isset($product['img_7']) AND $product['img_7'] != 0) { ?>
                        <div class="box-thumbnail" data-count="">
                          <img src="admin/uplodas/<?php echo $product['dir'] . '/' . $product['img_7']; ?>" alt="<?php echo $product['name']; ?>">
                        </div>
                        <?php } ?>
                        <?php if(isset($product['img_8']) AND $product['img_8'] != 0) { ?>
                        <div class="box-thumbnail" data-count="">
                          <img src="admin/uplodas/<?php echo $product['dir'] . '/' . $product['img_8']; ?>" alt="<?php echo $product['name']; ?>">
                        </div>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <a href="products.php?id=<?php echo $product['cat_id']; ?>" class="btn-back">رجوع <i class="fas fa-undo"></i></a>
        </div>
      </section>

      <!-- End Gallery Section -->



    

      <!-- Start Clients Brands Section -->
      <?php require_once 'inc-front/upper-footer.php'; ?>
      <!-- Start Footer Section -->
      <?php require_once 'inc-front/footer.php'; ?>