<?php get_header(); ?>

<div class="blog">
  <div class="container">
    <div class="body-art">
      <div class="container-articls">
        <div class="row no-gutters">
        <?php
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        $info_cat = get_category(get_query_var('cat'));
        $oxygen_art = array(

          'orderby '        =>  'date',
          'post_status'   	=>	'publish',
          'paged'           =>  $paged,
          'cat'					    =>	$info_cat->cat_ID,

        );

        $latest_posts = new WP_Query($oxygen_art);
        if ($latest_posts->have_posts()) {
          while ($latest_posts->have_posts()) {

            $latest_posts->the_post();
            $GLOBALS["read_more"] = '... <a href="' . get_the_permalink() . '">قراءة المزيد <i class="fas fa-angle-double-left"></i></a>';
          
          
        ?>
          <div class="col-md-4 col-sm-12">
            <div class="art">
              <div class="box-img">
              <?php $GLOBALS["custom_excerpt"] = 200; ?>
              <?php the_post_thumbnail(); ?> 
              <a href="<?php echo get_category_link($info_cat->term_id); ?>"><?php echo $info_cat->name; ?></a>
              </div>
              <div class="tags-art">
              <?php the_tags( '', ' ', '' ); ?>
              </div>
              <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
              <p class="par-ex"><?php the_excerpt(); ?> <a href="<?php the_permalink(); ?>"></a></p>
              <?php
              $count_comm = array(
                'post_id' => get_the_ID(),
                'count' 	=> true,
              );
              
              ?>
              <div class="info-art">
              <span class="by-art"><i class="fas fa-user-edit"></i> <?php echo get_the_author_meta('first_name') . ' ' . get_the_author_meta('last_name'); ?></span>
              <span class="data-art"><i class="far fa-calendar-alt"></i> <span><?php the_time('j') ?></span> <span><?php echo lang(get_the_time('F')) ?></span> <span><?php the_time('Y') ?></span></span>
              <span class="views-art"><i class="fas fa-eye"></i> <?php if(function_exists('the_views')) { the_views(); } ?> </span>
              <span class="comment-art"><i class="fas fa-comments"></i> <?php echo get_comments($count_comm); ?></span>
              </div>
            </div>
          </div>
          <?php
            }

          }
          wp_reset_postdata();
          wp_reset_query();
          ?>
          
        </div>
        <?php if(paginate_links()) {

?>
<div class="pagination">
<?php my_pagination(); ?>
</div>
<?php } ?>
      </div>
    </div>
  </div>
</div>
<?php get_footer() ?>