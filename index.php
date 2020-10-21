<?php 
define('WP_USE_THEMES', false);
// require_once('blog/wp-blog-header.php');
// $animate_load = true;
require_once('blog/wp-load.php' );
wp();
// require_once('blog/template-loader.php');
?>
    <?php require_once 'inc-front/top-header.php'; ?>
    
    <title><?php echo 'الصفحة الرئيسية' . $title; ?></title>
    <?php require_once 'inc-front/header.php'; ?>
    <!-- Start Section Header Page [Top Header, Navbar, Cover] -->
    <?php require_once 'inc-front/header-cover.php'; ?>
    <!-- End Section Header Page -->

    <!-- Start Body Page -->
      <!-- Start Jops Section -->
    <section class="jops-turkey">
      <div class="container">
        <h1>فرص العمل في تركيا</h1>
        <div class="row">
          <div class="col-md-8 col-sm-12">
            <div class="type-jops">
              <div class="row no-gutters">
                <?php 
                $con_db = new inbox();
                $get_sections = $con_db->select('*', 'jops_sections');
                $get_sections->execute(array());
                $sections = $get_sections->fetchAll();

                foreach ($sections as $section) {
                ?>
                <div class="col-md-4 col-sm-6 custom-div">
                    <a href="jops_cat.php?id=<?php echo $section['sec_id']; ?>" data-in="admin/uplodas/<?php echo $section['dir'] . '/' . $section['icon_white']; ?>" data-out="admin/uplodas/<?php echo $section['dir'] . '/' . $section['icon_dark']; ?>" ><img src="admin/uplodas/<?php echo $section['dir'] . '/' . $section['icon_dark']; ?>" alt="" width="18px"> <?php echo $section['sec_name']; ?></a>
                    <img src="admin/uplodas/<?php echo $section['dir'] . '/' . $section['icon_white']; ?>" style="display: none;" width="0" height="0">
                </div>
                <?php } ?>
              </div>
              <a href="add_jops.php" class="add-Jop">أضافة وظيفة <i class="fas fa-plus-circle"></i></a>
            </div>

          </div>
          <div class="col-md-4 col-sm-12">
            <div class="ads-space">
              <div class="text">
              <?php 
              $ads = $con_db->select('*', 'ads', 'WHERE id = 8');
              $ads->execute(array());
              $res = $ads->fetch();
              
              if($res['display'] == 1) {
              ?>
                <div class="banner-ads">
                  <img src="admin/uplodas/ads/<?php echo $res['image'];?>" width="100%" height="100%">
                </div>
              <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Jops Section -->

    <!-- Start Latset Products -->
    <section class="latest-product">
      <div class="container">
        <h1>منتجات أوكسجين</h1>
        <div class="container-product">
          <div class="row no-gutters">
            <?php
            $get_products = $con_db->custom_query("SELECT shop.*,
                              shop_section.section_name AS section_name,
                              shop_section.section_id AS section_id
                              FROM 
                              shop
                              INNER JOIN
                              shop_section
                              ON
                              shop_section.section_id = shop.cat_id
                              ORDER BY id DESC LIMIT 4");
            $get_products->execute(array());
            $products = $get_products->fetchAll();

            foreach($products as $product) {


            ?>
            <div class="col-md-3 col-sm-6">
              <div class="box-product">
                <div class="box-img">
                  <a href="details_product.php?id=<?php echo $product['id']; ?>"><img src="admin/uplodas/<?php echo $product['dir'] . '/' . $product['img_1']; ?>" alt=""></a>
                  <a href="products.php?id=<?php echo $product['section_id']; ?>" class="code"><?php echo $product['section_name']; ?></a>
                </div>
                <a href="details_product.php?id=<?php echo $product['id']; ?>"><h3><?php echo $product['name']; ?></h3></a>
                <?php if(!empty($product['code'])) { echo '<span><span>#</span>' . $product['code'] . '</span>'; } ?>
                <a href="details_product.php?id=<?php echo $product['id']; ?>"><p><?php echo mb_substr($product['content'], 0, 120) . ' ...'; ?></p></a>
              </div>
            </div>
            <?php } ?>
          </div>
          <a href="products.php?id=1" class="btn-shop">شاهد المزيد <i class="fas fa-shopping-bag"></i></a>
        </div>
      </div>
    </section>
    <!-- End Latset Products -->

    <!-- Start Blog Home Section -->
    <section class="latest-blog">
      <div class="container">
        <h1>آخر مقالات أوكسجين</h1>
        <div class="custom-container">
          <div class="items">
          <?php
          $posts_last = array(
            'posts_per_page'  => 6,
            'order'					=>	'DESC',
            'post_status'	=>	'publish'
          );
          $my_post = new WP_Query($posts_last);
          if ($my_post->have_posts()) {
            while ($my_post->have_posts()) {
              $my_post->the_post();
          ?>
            <div class="item">
              <div class="box-img">
                <?php $GLOBALS["custom_excerpt"] = 180; ?>
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
              </div>
              <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
              <a href="<?php the_permalink(); ?>"><p class="cust-p"><?php the_excerpt(); ?></p></a>
            </div>
            <?php 
            }
          } else {
            echo 'Not Found Posts In This Section';
          }
          wp_reset_postdata();
            ?>
            
          </div>
          <div class="selector">
            <span class="active" id="prev-art"></span>
            <span id="next-art"></span>
          </div>
        </div>
      </div>
    </section>

    <!-- End Blog Home Section -->

    <!-- Start Chart -->
    <section class="chart">
      <div class="container">
        <h1>زوار الموقع الآن</h1>
        <div class="contet-chart">
          <div id="chartContainer" style="height: 370px; width: 100%; margin: 0px auto;direction: ltr"></div>
          <div class="info-chart">
            <h5>معدل الزيارات اليومية</h5>
            <span>2000</span> - <span>7000</span>
          </div>
        </div>
      </div>
    </section>
    <!-- End Chart -->

    <!-- Start Animation Lodaing -->
    <!-- <div class="loader">
      <div class="shadow-load"></div>
      <div class="box-load"></div>
    </div> -->
    <!-- End Animation Lodaing -->


    <!-- Start Clients Brands Section -->
    <?php require_once 'inc-front/upper-footer.php'; ?>
    <!-- Start Footer Section -->
    <?php require_once 'inc-front/footer.php'; ?>