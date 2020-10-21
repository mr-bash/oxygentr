<?php get_header(); ?>

<!-- Start Body Page -->
<section class="blog">
      
      <div class="body-art">
        <div class="container">
          <div class="row">
          <aside class="col-md-4 col-sm-12 sc-big">
            <!-- Space For Sidebar -->
            <?php get_sidebar(); ?>
            <!-- Space For Sidebar -->
          </aside>
            <?php 
            if (have_posts()) {

              while (have_posts()) {

                the_post();

            ?>
            <div class="col-sm-8 col-xs-12">
              <div class="content-articls">
                <div class="box-img">
                <?php the_post_thumbnail(); ?>
                </div>
                <h1><?php the_title(); ?></h1>
                <?php
                
                $count_comm = array(
                  'post_id' => get_the_ID(),
                  'count' 	=> true,
                );
                
                ?>

                <div class="info-art">
                  <div class="avatar">
                    <img src="<?php echo get_wp_user_avatar_src(get_the_author_meta('ID'), 'medium'); ?>" >
                  </div>
                  <span class="by-art"><i class="fas fa-user-edit"></i> <?php echo get_the_author_meta('first_name') . ' ' . get_the_author_meta('last_name'); ?></span>
                  <span class="data-art"><i class="far fa-calendar-alt"></i> <?php the_time('j') ?> <?php echo lang(get_the_time('F')) ?> <?php the_time('Y') ?></span>
                  <span class="views-art"><i class="fas fa-eye"></i> <?php if(function_exists('the_views')) { the_views(); } ?> </span>
                  <span class="comment-art"><i class="fas fa-comments"></i> <?php echo get_comments($count_comm); ?></span>
                </div>
              <p><?php the_content() ?></p>
                <div class="share-art">
                  <!-- <span><i class="fas fa-share"></i></span> -->
                  <span><i class="fas fa-share-alt"></i></span>
                  <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink() ?>" style="background-color: #597ebe"><i class="fab fa-facebook-f"></i></a>
                  <a href="https://twitter.com/share?url=<?php the_permalink() ?>" style="background-color: #6ac0ec"><i class="fab fa-twitter"></i></a>
                  <a href="#/" style="background-color: #b2b1b1" id="zoom-in"><i class="fas fa-search-plus"></i></a>
                  <a href="#/" style="background-color: #b2b1b1" id="zoom-out"><i class="fas fa-search-minus"></i></a>
                </div>
              </div>
                <?php comments_template(); ?>
            </div>
            <?php
                }

              }
              wp_reset_postdata();
              wp_reset_query();
            ?>
            <aside class="col-md-4 col-sm-12 sc-small">
              <!-- Space For Sidebar -->
              <?php get_sidebar(); ?>
              <!-- Space For Sidebar -->
            </aside>
          </div>
        </div>
      </div>
    </section>
    <!-- End Body Page -->


<?php get_footer() ?>