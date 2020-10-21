              <div class="container-aside">
                
              <div class="categories-blog">
                  <div class="title-sec">
                    <span></span><span></span>
                    <h4>أقسام الموقع</h4>
                  </div>
                  <div class="cats">
									<?php add_mynavbar_custom_header(); ?>
                  </div>
                </div>
                
                <div class="most-views">
                  <div class="title-sec">
                    <span></span><span></span>
                    <h4>الأكثر مشاهدة</h4>
									</div>
									<?php
										//	News Most Views
										$all_posts = wp_most_popular_get_popular(
                      array( 
                        'limit'     =>	'8', 
                        'post_type' => 'post',
                        'range'     => 'all_time' 
                        )
                    );
										// global $post;
										if ( count( $all_posts ) > 0 ): foreach ( $all_posts as $post ):
												setup_postdata( $post );
												?> 
													<div class="box-art">
														<div class="box-img">
                            <?php $GLOBALS["custom_excerpt"] = 50; ?>
															<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
														</div>
														<h6><a href="<?php the_permalink(); ?>"><?php echo mb_substr(the_title('', '', false), 0, 44); ?></a></h6>
														<p><a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a></p>
													</div>
												<?php
                    endforeach;
                    endif;
                    wp_reset_postdata();
                    wp_reset_query();
										?>
                </div>
                <div class="space-ads">
                  <img src="<?php bloginfo('url') ?>/images/123.jpg" alt="">
                  <div class="text-ads">
                    <span>مساحة أعلانية</span>
                    <span>400 <bdi>x</bdi> 400</span>
                  </div>
                  <div class="opc"></div>
                </div>
                <div class="follow-us">
                  <div class="title-sec">
                    <span></span><span></span>
                    <h4>تابعنا على</h4>
                  </div>
                  <div class="btns-follow">
                    <a href="https://www.facebook.com/OxygenReklam"> <i class="fab fa-facebook-f"></i></a>
                    <a href="https://twitter.com/OxgenG"> <i class="fab fa-twitter"></i></a>
                    <a href="https://www.youtube.com/channel/UCJkLo4-i7SdeJBEVJp9SGLA"> <i class="fab fa-youtube"></i></a>
                    <a href="https://www.instagram.com/oxygen113"> <i class="fab fa-instagram"></i></a>
                  </div>
                </div>



                <div class="tags">
                  <div class="title-sec">
                    <span></span><span></span>
										<h4>الكلمات المفتاحية</h4>
									</div>
									<?php 
									


									?>
									
										
										<div class="row no-gutters">
										<?php
												$tags_opt = array(

													'smallest'                  => 12, 
													'largest'                   => 12,
													'unit'                      => 'px', 
													'number'                    => 8,
													'order'                     => 'RAND',
												);
                        wp_tag_cloud( $tags_opt );
                        
												?>
                  </div>
                </div>
              </div>