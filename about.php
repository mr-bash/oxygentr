    <!-- Start Section Files Css And Header Html -->
    <?php require_once 'inc-front/top-header.php'; ?>
    <title><?php echo 'حول مجموعة أوكسجين' . $title; ?></title>
    <?php require_once 'inc-front/header.php'; ?>
    <!-- Start Section Header Page [Top Header, Navbar, Cover] -->
    <?php require_once 'inc-front/header-page.php'; ?>
    
    <!-- End Section Header Page -->

    <!-- Start Body Page -->
      <!-- Start About Section -->

      <section class="about">
        <div class="cover-global">
          <?php 
          $ob_ads = new ads();
          $ads = $ob_ads->select('*', 'ads', 'WHERE id = 1');
          $ads->execute(array());
          $res = $ads->fetch();
          
          if($res['display'] == 1) {
            require_once 'inc-front/banner-ads.php'; 
          } else {
            echo '<h1 class="title-section">حول مجموعة أوكسجين</h1>';
          }
          
          ?>
        </div>
        <div class="container">
          <div class="container-items">
            <div class="row no-gutters">
            <?php 
            
            $ob_about = new about();
            $get_data1 = $ob_about->select('*', 'about', 'WHERE id = ?');
            $get_data1->execute(array(1));
            $data1 = $get_data1->fetch();
            
            ?>
              <div class="col-lg-6 col-md-12">
                <div class="content">
                  <h3><?php echo $data1['title']; ?></h3>
                  <p><?php echo $data1['content']; ?></p>
                </div>
              </div>
              <div class="col-lg-6 col-md-12">
                <div class="image-about">
                  <div class="opc"></div>
                  <img src="<?php echo 'http://' . $_SERVER['SERVER_NAME'] . '/admin/uplodas/about_files/' . $data1['img']; ?>" alt="<?php echo $data1['title'] ;?>">
                </div>
              </div>
              <?php
              
              $get_data2 = $ob_about->select('*', 'about', 'WHERE id = ?');
              $get_data2->execute(array(2));
              $data2 = $get_data2->fetch();
              
              ?>
              <div class="col-lg-6 col-md-12 sc-small-normal">
                <div class="content">
                  <h3><?php echo $data2['title']; ?></h3>
                  <p><?php echo $data2['content']; ?></p>
                </div>
              </div>

              <div class="col-lg-6 col-md-12">
                <div class="image-about">
                    <div class="opc"></div>
                  <img src="<?php echo 'http://' . $_SERVER['SERVER_NAME'] . '/admin/uplodas/about_files/' . $data2['img']; ?>" alt="<?php echo $data2['title'] ;?>">
                </div>
              </div>

              <div class="col-lg-6 col-md-12 sc-big-normal">
                <div class="content">
                  <h3><?php echo $data2['title']; ?></h3>
                  <p><?php echo $data2['content']; ?></p>
                </div>
              </div>
              <?php
              
              $get_data3 = $ob_about->select('*', 'about', 'WHERE id = ?');
              $get_data3->execute(array(3));
              $data3 = $get_data3->fetch();
              
              ?>
              <div class="col-lg-6 col-md-12">
                <div class="content">
                  <h3><?php echo $data3['title']; ?></h3>
                  <p><?php echo $data3['content']; ?></p>
                </div>
              </div>
              <div class="col-lg-6 col-md-12">
                <div class="image-about">
                    <div class="opc"></div>
                  <img src="<?php echo 'http://' . $_SERVER['SERVER_NAME'] . '/admin/uplodas/about_files/' . $data3['img']; ?>" alt="<?php echo $data3['title'] ;?>">
                </div>
              </div>

            </div>
          </div>
        </div>
      </section>

      <!-- End About Section -->
    

      <!-- Start Clients Brands Section -->
      <?php require_once 'inc-front/upper-footer.php'; ?>
      <!-- Start Footer Section -->
      <?php require_once 'inc-front/footer.php'; ?>