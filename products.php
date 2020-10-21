    <!-- Start Section Files Css And Header Html -->
    <?php require_once 'inc-front/top-header.php'; ?>
    <title><?php echo 'متجر أوكسجين' . $title; ?></title>
    <?php require_once 'inc-front/header.php'; ?>
    <!-- Start Section Header Page [Top Header, Navbar, Cover] -->
    <?php require_once 'inc-front/header-nav.php'; ?>
    
    <!-- End Section Header Page -->

    <!-- Start Body Page -->
      <!-- Start Gallery Section -->

      <section class="shop">
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
        <?php
        $shop = new shop();
        $id = 0;
        if(isset($_GET['id']) and is_numeric($_GET['id'])) {
          $id = $_GET['id'];
        } else {
          $id = 0;
        }

        $get_sections = $shop->select('*', 'shop_section');
        $get_sections->execute();
        $sections = $get_sections->fetchAll();

        if($_SERVER['REQUEST_METHOD'] == 'GET' AND isset($_GET['id'])) {
          $product_found = false;
    
          $res = $shop->select('*', 'shop_section', 'WHERE section_id = ?');
          $res->execute(array($id));
          if($res->rowCount() > 0) {
            $product_found = true;
          }
          if(!$product_found) {
            messages::set_msg('danger', 'عذراً', 'الصفحة غير <strong> موجودة</strong>');
            $contact_data->redirecr_page(messages::$msg_alert, 'products.php', 0);
          } else {
            $query = "WHERE cat_id = {$id} ORDER BY id DESC";
          }
          
        } else {
          $query = 'ORDER BY id DESC';
        }
        $get_products = $shop->select('*', 'shop', $query);
        $get_products->execute();
        $products = $get_products->fetchAll();
        ?>
          <div class="container-items">
            <div class="section-products">
            <?php
            
            foreach($sections as $section) {

            ?>
              <a href="?id=<?php echo $section['section_id']; ?>" class=""><?php echo $section['section_name']; ?></a>
            <?php } ?>
            </div>
            <?php 
            
            $get_section_by_id = $shop->select('*', 'shop_section', 'WHERE section_id = ?');
            $get_section_by_id->execute(array($id));
            $sec_by_id = $get_section_by_id->fetch();

            ?>
            <p><?php echo $sec_by_id['section_description']; ?></p>
            <div class="row no-gutters">
            <?php
            
            foreach ($products as $product) {
            

            ?>
              <div class="col-md-6 col-sm-12">
                <div class="box-item">
                  <div class="box-img">
                  <?php if(!empty($product['code'])) { echo '<span><span>#</span>' . $product['code'] . '</span>'; } ?>
                  <a href="details_product.php?id=<?php echo $product['id']; ?>"><img src="admin/uplodas/<?php echo $product['dir'] . '/' . $product['img_1']; ?>" alt=""></a>
                  <a href="details_product.php?id=<?php echo $product['id']; ?>"><i class="far fa-eye"></i></a>
                  </div>
                  <div class="content">
                    <a href="details_product.php?id=<?php echo $product['id']; ?>"><h5><?php echo $product['name']; ?></h5></a>
                    <a href="details_product.php?id=<?php echo $product['id']; ?>"><p class="desc"><?php echo mb_substr($product['content'], 0, 150, "utf-8") . ' ...'; ?></p></a>
                  </div>
                </div>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </section>

      <!-- End Gallery Section -->



    

      <!-- Start Clients Brands Section -->
      <?php require_once 'inc-front/upper-footer.php'; ?>
      <!-- Start Footer Section -->
      <?php require_once 'inc-front/footer.php'; ?>