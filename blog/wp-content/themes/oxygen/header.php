<?php 
global $opt_data;
$GLOBALS["xx"] = 20;
?>
<!DOCTYPE html>
<html lang='ar'>
  <head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php 

  $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 
  "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .  
  $_SERVER['REQUEST_URI']; 

  if($link == 'http://oxygen-turkey.com/blog/') {
  
  ?>
  <meta property="og:url"                content="<?php echo $link; ?> "/>
  <meta property="og:type"               content="website" />
  <meta property="og:title"              content="<?php bloginfo('name'); ?>" />
  <meta property="og:description"        content="<?php bloginfo('description'); ?>" />
  <meta property="og:image"              content="http://oxygen-turkey.com/blog.jpg" />
  <?php } else { ?>
  <meta property="og:url"                content="<?php echo $link; ?> "/>
  <meta property="og:type"               content="article" />
  <meta property="og:title"              content="<?php the_title(); ?>" />
  <meta property="og:description"        content="<?php the_excerpt() ?>" />
  <meta property="og:image"              content="<?php the_post_thumbnail_url(); ?>" />
  <?php }?>
  <title>
		<?php wp_title('|', true, 'right'); ?>
		<?php echo ' المدونة ' . bloginfo('name'); ?>
	</title>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
  <?php wp_head(); ?>
  </head>
  <!-- Start Section Header Page -->

  <header>
      <!-- Start Top Header -->
      <div class="top-header">
        <div class="container">
          <div class="saying-oxygen sc-big">
            <span>شو ما تعمل بدددك أوكسجين</span>
          </div>
          <div class="search-oxygen">
            <form action="">
              <input type="search" placeholder="أبحث في موقع اوكسجين">
              <input type="submit" value="بحث" class="btn-sub">
              <img src="<?php bloginfo('url') ?>/../image/icons/search.svg" alt="icon search">
            </form>
          </div>
          <div class="social-media">
            <a href="https://www.youtube.com/channel/UCJkLo4-i7SdeJBEVJp9SGLA" class="tube" target="_blank"><i class="fab fa-youtube"></i></a>
            <a href="https://twitter.com/OxgenG" class="twt" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="https://www.instagram.com/oxygen113" class="insta" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://www.facebook.com/OxygenReklam" class="face" target="_blank"><i class="fab fa-facebook-f"></i></a> 
          </div>
          <div class="brand-top-header">
            <a href="../index.php"><img src="<?php bloginfo('url') ?>/../image/oxygen.png" alt="brand oxygen"></a>
          </div>
          <div class="saying-oxygen sc-small">
            <span>شو ما تعمل بدددك أوكسجين</span>
          </div>
        </div>
      </div>
      <!-- End Top Header -->
      <!-- Start Group Oxygen -->
      <div class="group-oxygen">
        <div class="container">
          <div class="big-brand">
            <span>مجموعة أوكسجين</span>
            <a href="../index.php"><img src="<?php bloginfo('url') ?>/../image/brands/1.png" alt="brand oxygen"></a>
          </div>
          <div class="brands">
            <a href="#"><img src="<?php bloginfo('url') ?>/../image/brands/5.png" alt="oxygen code me"></a>
            <a href="#"><img src="<?php bloginfo('url') ?>/../image/brands/6.png" alt="design and printing"></a>
            <a href="#"><img src="<?php bloginfo('url') ?>/../image/brands/3.png" alt="oxygen creative"></a>
            <a href="#"><img src="<?php bloginfo('url') ?>/../image/brands/2.png" alt="oxygen marketing"></a>
            <a href="#"><img src="<?php bloginfo('url') ?>/../image/brands/4.png" alt="oxygen turkey in"></a>
          </div>
        </div>
      </div>
      <!-- End Group Oxygen -->
      
      <!-- Start Navbar -->
      <nav class="sc-big">
        <div class="container">
          <ul>
            <li><a href="<?php bloginfo('url') ?>/../index.php">الرئيسية <img src="<?php bloginfo('url') ?>/../image/icons/home-white.svg" alt="about oxygen" width="17px"></a></li>
            <li><a href="<?php bloginfo('url') ?>/../about.php" class="">من نحن <img src="<?php bloginfo('url') ?>/../image/icons/about-white.svg" alt="about oxygen" width="17px"></a></li>
            <li><a href="<?php bloginfo('url') ?>/../services.php">خدماتنا <img src="<?php bloginfo('url') ?>/../image/icons/services-white.svg" alt="services oxygen" width="16px"></a></li>
            <li><a href="<?php bloginfo('url') ?>/../works.php">أنجازاتنا <img src="<?php bloginfo('url') ?>/../image/icons/badge-white.svg" alt="achievements oxygen" width="17px"></a></li>
            <li><a href="<?php bloginfo('url') ?>/index.php" class="active">المدونة <img src="<?php bloginfo('url') ?>/../image/icons/star-blue.svg" alt="for You" width="17px" style="top: 60%"></a></li>
            <li><a href="<?php bloginfo('url') ?>/../products.php" class="">متجر أوكسجين <img src="<?php bloginfo('url') ?>/../image/icons/shopping4-white.svg" alt="متجر أوكسجين" width="16px" style="top: 60%"></a></li>
            <li><a href="<?php bloginfo('url') ?>/../contact.php">مركز المساعدة <img src="<?php bloginfo('url') ?>/../image/icons/support-white.svg" alt="oxygen customer service" width="17.5px"></a></li>
          </ul>
        </div>
      </nav>
      <nav class="sc-small">
        <div class="container">
          <div class="menu-bar">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
          </div>
          <ul>
            <li><a href="<?php bloginfo('url') ?>/../index.php">الرئيسية <img src="<?php bloginfo('url') ?>/../image/icons/home-blue.svg" alt="about oxygen" width="17px"></a></li>
            <li><a href="<?php bloginfo('url') ?>/../about.html">من نحن <img src="<?php bloginfo('url') ?>/../image/icons/about-blue.svg" alt="about oxygen" width="17px"></a></li>
            <li><a href="<?php bloginfo('url') ?>/../services.html">خدماتنا <img src="<?php bloginfo('url') ?>/../image/icons/services-blue.svg" alt="services oxygen" width="16px"></a></li>
            <li><a href="<?php bloginfo('url') ?>/../works.html">أنجازاتنا <img src="<?php bloginfo('url') ?>/../image/icons/badge-blue.svg" alt="achievements oxygen" width="17px"></a></li>
            <li><a href="<?php bloginfo('url') ?>/index.php" class="active">المدونة <img src="<?php bloginfo('url') ?>/../image/icons/star-white.svg" alt="for You" width="17px" style="top: 60%"></a></li>
            <li><a href="<?php bloginfo('url') ?>/../products.php" class="">متجر أوكسجين <img src="<?php bloginfo('url') ?>/../image/icons/shopping4-blue.svg" alt="متجر أوكسجين" width="16px" style="top: 60%"></a></li>
            <li><a href="<?php bloginfo('url') ?>/../contact.php">مركز المساعدة <img src="<?php bloginfo('url') ?>/../image/icons/support-blue.svg" alt="oxygen customer service" width="17.5px"></a></li>
          </ul>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="call-direct">
        <a href="https://wa.me/+<?php echo $conn_data['whatsapp']; ?>" target="_blank"><i class="fab fa-whatsapp"></i></a>
      </div>
    </header>
    <div class="clear"></div>
    <!-- End Section Header Page -->

    <!-- Start Body Page -->
    <section class="blog">
      <div class="fixed-art" style="transform: translateY(0)">
        <div class="container">
          <div class="row no-gutters">
            <div class="col-md-6 col-sm-12 tow-art">
              <div class="row no-gutters">
                <?php

                  $fixed_1 = get_post($opt_data['select_art1']);
                  $fixed_2 = get_post($opt_data['select_art2']);
                  $fixed_3 = get_post($opt_data['select_art3']);
                  $fixed_4 = get_post($opt_data['select_art4']);
                  $fixed_5 = get_post($opt_data['select_art5']);
                ?>
                <div class="col-md-6 col-sm-12">
                  <div class="box-art">
                    <a href="<?php echo get_category_link(get_the_category($fixed_1->ID)['0']->cat_ID); ?>"><?php echo get_the_post_thumbnail($fixed_1->ID); ?></a>
                    <div class="items-art">
                      <a href="<?php echo get_category_link(get_the_category($fixed_1->ID)['0']->cat_ID); ?>" class="name-section"><?php echo get_the_category($fixed_1->ID)['0']->name; ?></a>
                      <h3><a href="<?php echo get_permalink($fixed_1->ID); ?>"><?php echo $fixed_1->post_title; ?></a></h3>
                      <div class="info-art">
                      <span class="by-art"><i class="fas fa-user-edit"></i> <?php echo get_the_author_meta('first_name', $fixed_1->post_author) . ' ' . get_the_author_meta('last_name', $fixed_1->post_author); ?></span>
                        <span class="data-art"><i class="far fa-calendar-alt"></i> <?php echo get_the_time('j', $fixed_1->ID) . ' ' . lang(get_the_time('F', $fixed_1->ID)) . ' ' . get_the_time('Y', $fixed_1->ID) ?></span>
                        <span class="views-art"><i class="fas fa-eye"></i> <?php echo do_shortcode("[views id = {$fixed_1->ID}]"); ?> </span>
                        <span class="comment-art"><i class="fas fa-comments"></i> <?php echo get_comments(array('post_id' => $fixed_1->ID, 'count' 	=> true)); ?></span>
                      </div>
                      <div class="opc"><a href="<?php echo get_permalink($fixed_1->ID); ?>"></a></div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-sm-12">
                  <div class="box-art">
                    <a href="<?php echo get_category_link(get_the_category($fixed_2->ID)['0']->cat_ID); ?>"><?php echo get_the_post_thumbnail($fixed_2->ID); ?></a>
                    <div class="items-art">
                      <a href="<?php echo get_category_link(get_the_category($fixed_2->ID)['0']->cat_ID); ?>" class="name-section"><?php echo get_the_category($fixed_2->ID)['0']->name; ?></a>
                      <h3><a href="<?php echo get_permalink($fixed_2->ID); ?>"><?php echo $fixed_2->post_title; ?></a></h3>
                      <div class="info-art">
                      <span class="by-art"><i class="fas fa-user-edit"></i> <?php echo get_the_author_meta('first_name', $fixed_2->post_author) . ' ' . get_the_author_meta('last_name', $fixed_2->post_author); ?></span>
                        <span class="data-art"><i class="far fa-calendar-alt"></i> <?php echo get_the_time('j', $fixed_2->ID) . ' ' . lang(get_the_time('F', $fixed_2->ID)) . ' ' . get_the_time('Y', $fixed_2->ID) ?></span>
                        <span class="views-art"><i class="fas fa-eye"></i> <?php echo do_shortcode("[views id = {$fixed_2->ID}]"); ?> </span>
                        <span class="comment-art"><i class="fas fa-comments"></i> <?php echo get_comments(array('post_id' => $fixed_2->ID, 'count' 	=> true)); ?></span>
                      </div>
                      <div class="opc"><a href="<?php echo get_permalink($fixed_2->ID); ?>"></a></div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-sm-12">
                  <div class="box-art">
                    <a href="<?php echo get_category_link(get_the_category($fixed_3->ID)['0']->cat_ID); ?>"><?php echo get_the_post_thumbnail($fixed_3->ID); ?></a>
                    <div class="items-art">
                      <a href="<?php echo get_category_link(get_the_category($fixed_3->ID)['0']->cat_ID); ?>" class="name-section"><?php echo get_the_category($fixed_3->ID)['0']->name; ?></a>
                      <h3><a href="<?php echo get_permalink($fixed_3->ID); ?>"><?php echo $fixed_3->post_title; ?></a></h3>
                      <div class="info-art">
                      <span class="by-art"><i class="fas fa-user-edit"></i> <?php echo get_the_author_meta('first_name', $fixed_3->post_author) . ' ' . get_the_author_meta('last_name', $fixed_3->post_author); ?></span>
                        <span class="data-art"><i class="far fa-calendar-alt"></i> <?php echo get_the_time('j', $fixed_3->ID) . ' ' . lang(get_the_time('F', $fixed_3->ID)) . ' ' . get_the_time('Y', $fixed_3->ID) ?></span>
                        <span class="views-art"><i class="fas fa-eye"></i> <?php echo do_shortcode("[views id = {$fixed_3->ID}]"); ?> </span>
                        <span class="comment-art"><i class="fas fa-comments"></i> <?php echo get_comments(array('post_id' => $fixed_3->ID, 'count' 	=> true)); ?></span>
                      </div>
                      <div class="opc"><a href="<?php echo get_permalink($fixed_3->ID); ?>"></a></div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 col-sm-12">
                  <div class="box-art">
                    <a href="<?php echo get_category_link(get_the_category($fixed_4->ID)['0']->cat_ID); ?>"><?php echo get_the_post_thumbnail($fixed_4->ID); ?></a>
                    <div class="items-art">
                      <a href="<?php echo get_category_link(get_the_category($fixed_4->ID)['0']->cat_ID); ?>" class="name-section"><?php echo get_the_category($fixed_4->ID)['0']->name; ?></a>
                      <h3><a href="<?php echo get_permalink($fixed_4->ID); ?>"><?php echo $fixed_4->post_title; ?></a></h3>
                      <div class="info-art">
                        <span class="by-art"><i class="fas fa-user-edit"></i> <?php echo get_the_author_meta('first_name', $fixed_4->post_author) . ' ' . get_the_author_meta('last_name', $fixed_4->post_author); ?></span>
                        <span class="data-art"><i class="far fa-calendar-alt"></i> <?php echo get_the_time('j', $fixed_4->ID) . ' ' . lang(get_the_time('F', $fixed_4->ID)) . ' ' . get_the_time('Y', $fixed_4->ID) ?></span>
                        <span class="views-art"><i class="fas fa-eye"></i> <?php echo do_shortcode("[views id = {$fixed_4->ID}]"); ?> </span>
                        <span class="comment-art"><i class="fas fa-comments"></i> <?php echo get_comments(array('post_id' => $fixed_4->ID, 'count' 	=> true)); ?></span>
                      </div>
                      <div class="opc"><a href="<?php echo get_permalink($fixed_4->ID); ?>"></a></div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <div class="col-md-6 col-sm-12 single-art">
              <div class="box-art">
              <a href="<?php echo get_category_link(get_the_category($fixed_5->ID)['0']->cat_ID); ?>"><?php echo get_the_post_thumbnail($fixed_5->ID); ?></a>
                <div class="items-art">
                <a href="<?php echo get_category_link(get_the_category($fixed_5->ID)['0']->cat_ID); ?>" class="name-section"><?php echo get_the_category($fixed_5->ID)['0']->name; ?></a>
                  <h3><a href="<?php echo get_permalink($fixed_5->ID); ?>"><?php echo $fixed_5->post_title; ?></a></h3>
                  <div class="info-art">
                    <span class="by-art"><i class="fas fa-user-edit"></i> <?php echo get_the_author_meta('first_name', $fixed_5->post_author) . ' ' . get_the_author_meta('last_name', $fixed_5->post_author); ?></span>
                    <span class="data-art"><i class="far fa-calendar-alt"></i> <?php echo get_the_time('j', $fixed_5->ID) . ' ' . lang(get_the_time('F', $fixed_5->ID)) . ' ' . get_the_time('Y', $fixed_5->ID) ?></span>
                    <span class="views-art"><i class="fas fa-eye"></i> <?php echo do_shortcode("[views id = {$fixed_5->ID}]"); ?> </span>
                    <span class="comment-art"><i class="fas fa-comments"></i> <?php echo get_comments(array('post_id' => $fixed_5->ID, 'count' 	=> true)); ?></span>
                  </div>
                  <div class="opc"><a href="<?php echo get_permalink($fixed_5->ID); ?>"></a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

