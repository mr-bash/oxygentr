    <!-- Start Section Files Css And Header Html -->
    <?php require_once 'inc-front/top-header.php'; ?>
    <title><?php echo 'خدمات مجموعتنا' . $title; ?></title>
    <?php require_once 'inc-front/header.php'; ?>
    <!-- Start Section Header Page [Top Header, Navbar, Cover] -->
    <?php require_once 'inc-front/header-page.php'; ?>
    
    <!-- End Section Header Page -->

    <!-- Start Body Page -->
      <!-- Start About Section -->

      <section class="services">
        <div class="cover-global">
        <?php 
          $ob_ads = new ads();
          $ads = $ob_ads->select('*', 'ads', 'WHERE id = 2');
          $ads->execute(array());
          $res = $ads->fetch();
          
          if($res['display'] == 1) {
            require_once 'inc-front/banner-ads.php'; 
          } else {
            echo '<h1 class="title-section">خدمات أوكسجين</h1>';
          }
          
          ?>
        </div>
        <div class="container">
          <div class="container-items">
            <div class="row no-gutters">
            <?php 
            
            $ob_services = new services();
            $get_data = $ob_services->select('*', 'services');
            $get_data->execute(array());
            $all_data = $get_data->fetchAll();
            
            foreach ($all_data as $data) {

            ?>
              <div class="col-md-6 custom-margin">
                <div class="content-services">
                  <img src="<?php echo 'http://' . $_SERVER['SERVER_NAME'] . '/admin/uplodas/services_files/' . $data['img']; ?>" alt="<?php echo $data['title']; ?>" class="sc-small">
                  <h4><?php echo $data['title']; ?></h4>
                  <p><?php echo $data['content']; ?></p>
                  <a href="contact.php">اتصل بنا <i class="fas fa-phone"></i></a>
                </div>
              </div>
              <div class="col-md-6 custom-margin">
                <div class="image-services">
                  <div class="box-logo" style="width: 300px; height: 120px" class="sc-big">
                    <img src="<?php echo 'http://' . $_SERVER['SERVER_NAME'] . '/admin/uplodas/services_files/' . $data['img']; ?>" alt="<?php echo $data['title']; ?>" class="sc-big">
                  </div>
                </div>
              </div>

              <?php } ?>
            </div>
          </div>
        </div>
      </section>

      <!-- End About Section -->
    

      <!-- Start Clients Brands Section -->
      <?php require_once 'inc-front/upper-footer.php'; ?>
      <!-- Start Footer Section -->
      <?php require_once 'inc-front/footer.php'; ?>