<?php 

if(comments_open()) {
  ?>

<div class="comments">
  <div class="title-sec custom-title">
    <span></span><span></span>
    <h4>التعلقيات</h4>
  </div>
  <?php 
  
  foreach($comments as $comment) {

  
  ?>
  <div class="show-comment">
  <div class="box-avatar"><?php echo get_avatar(get_comment_author_email()); ?></div>

    <div class="comment-by">
      <?php 
      
      // $month = lang(comment_date('F')); 
      // comment_date('F');
      
      ?>
      <h6><?php comment_author(); ?>
      <span class="data-art"><i class="far fa-calendar-alt"></i> <span><?php comment_date('j'); ?></span> <span><?php echo lang(get_comment_date('F')); ?></span>  <span><?php comment_date('Y'); ?></span>  </span>

    </div>
    <p><?php echo comment_text(); ?></p>
  </div>
  <?php } ?>
  <div class="title-sec custom-title">
    <span></span><span></span>
    <h4>أترك تعليقاً</h4>
  </div>
  <p class="note">لن يتم نشر عنوان بريدك الإلكتروني , الحقول الإلزامية مشار إليها بـ <span>*</span></p>
  <div class="add-comment">
    
  <?php 
  
  $fields =  array(

    'author' =>
      '<div class="row"> <div class="col-md-6 col-sm-12 container-input"><label for="name">الأسم <span>*</span></label>' .
      '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
      '" size="30"' . $aria_req . ' /></div>',
  
    'email' =>
      '<div class="col-md-6 col-sm-12 container-input"><label for="name">البريد الألكتروني <span>*</span></label>' .
      '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
      '" size="30"' . $aria_req . ' /></div> </div>',

  );
  
  ?>
  <?php
  $opt_form = array(
    'fields'                => $fields,
    'comment_field'         => '<p class="comment-form-comment"><label for="comment">' . _x( '', 'noun' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
    'title_reply'           => '',
    'comment_notes_before'  =>  '',
    'label_submit'      => __( 'أرسال التعليق' ),
  );
  comment_form($opt_form, get_the_ID());
  ?>
  </div>
</div>

<?php

} else {

  echo '<div style="font-size: 22px; text-align: center; color: red;">Sorry Comments Are Disabled</div>';

}

?>