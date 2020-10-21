<?php 



/* =========================== Start Add Files Css & Js  =========================== */
/*
**=> function Add Style Css
**=> Add By @BaSh
**=> wp_enqueue_style('Name Unique', 'Src File');
*/
function add_styles_css() {

  wp_enqueue_style('custom-fonts', get_template_directory_uri() . '/webfonts/custom-fonts.css');
  wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css');
  wp_enqueue_style('fontawesome', get_template_directory_uri() . '/css/fontawesome-all.min.css');
  wp_enqueue_style('style-css', get_template_directory_uri() . '/css/style.css');

}

/*
**=> function Add Scripts Js
**=> Add By @BaSh
**=> wp_enqueue_script('Name Unique', 'Src File', 'array()', false, false);
*/
function add_script_js() {

  //wp_enqueue_script('jquery'); // Add Jquery 1.12.4 Rgestered In Wordpress
  // wp_enqueue_script('jquery-js', get_template_directory_uri() . '/js/jquery-3.3.1.min.js', array(), false, true); Add Jquery From Any File
  wp_deregister_script('jquery'); // Deregister Jquery In Wordpress For Moved To Footer
  wp_register_script('jquery', includes_url('/js/jquery/jquery.js'), array(), '', true); // RE Register Jquery In Footer
  wp_enqueue_script('jquery'); // Executing
  wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), false, true);
  wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js', array(), false, true);
  // get_template_directory_uri() => Show Directory Src File Now;
}

/*
**=> Run Or Executing Function
**=> add_action('Type Action', 'Name Function');
*/
  add_action('wp_enqueue_scripts', 'add_styles_css');
  add_action('wp_enqueue_scripts', 'add_script_js');
  // get_template_directory_uri() => Show Directory Src File Now;
/* =========================== End Add Files Css & Js  =========================== */

/*
**=> function Create Or Enabled Navbar Menu
**=> Add By @BaSh
**=> register_nav_menu('Name Navbar', __('Descrption'));
*/
function enabled_navbar_menu() {

  register_nav_menus(array(

    'cats' => 'Header Navbar'


  ));

}


add_action('init', 'enabled_navbar_menu'); // Run Or Executing Function enabled_navbar_menu

/*
**=> Function Create Option Navbar Menu
**=> Add By @BaSh
*/
function add_mynavbar_custom_header() {
  
  wp_nav_menu(array(

    'theme_location' => 'cats',
    'container'      => 'false',
    'menu_class'     => 'parent-menu',
    'link_before'          => '<i class="fas fa-angle-left"></i>'

  ));

}


/*
**=> Function For Add Count Posts In Category
**=> Add By @BaSh
*/
add_filter('the_title', 'generate_category_post_count_title', 10, 2);
function generate_category_post_count_title($title, $post_ID)
{
    if( 'nav_menu_item' == get_post_type($post_ID) )
    {
        if( 'taxonomy' == get_post_meta($post_ID, '_menu_item_type', true) && 'category' == get_post_meta($post_ID, '_menu_item_object', true) )
        {
            $category = get_category( get_post_meta($post_ID, '_menu_item_object_id', true) );
            $title .= sprintf('<span>(%d)</span>', $category->count);
        }
    }
    return $title;
}



/* =========================== End Spaces Navbar  =========================== */

/* =========================== Start Spaces Posts  =========================== */
/*
**=> function Enabled Post Thumbnails (Cover Post)
**=> Add By @BaSh
**=> add_theme_support('Featuread');
*/
add_theme_support('post-thumbnails');


/*
**=> function Select Count Word When Use Function the_excerpt()
**=> Add By @BaSh
*/
$GLOBALS["custom_excerpt"];
// function custom_excerpt($num) {

//   if($num == 220) {
//     $GLOBALS["xx"] = 220;
//   } else{
//     $GLOBALS["xx"] = $num;
//   } 

// }

// custom_excerpt(220);

// function part_content($count) {

//   return $GLOBALS["xx"];

// }

function custom_short_excerpt($excerpt){

  return mb_substr($excerpt, 0, $GLOBALS["custom_excerpt"], "utf-8") . ' ... ';
  
}
add_filter('the_excerpt', 'custom_short_excerpt');

/*
**=> add_filter('Name Filter', 'Name Function');
*/
// add_filter('excerpt_length', 'part_content');


/*
**=> Function Add End Content The Excerpt Contetn EX[Read More]
**=> Add By @BaSh
*/

$GLOBALS["read_more"];
function end_content($par) {
  if(!$GLOBALS["read_more"]) {
    return ' ...';
  } else {
    return $GLOBALS["read_more"];
  }
  

}
/*
**=> add_filter('Name Filter', 'Name Function');
*/
add_filter('excerpt_more', 'end_content');


/*
**=> Remove More 1 Paragraph In Content
**=> Add By @BaSh
*/
function remove_page_from_query_string($query_string)
{ 
    if ($query_string['name'] == 'page' && isset($query_string['page'])) {
        unset($query_string['name']);
        $query_string['paged'] = $query_string['page'];
    }      
    return $query_string;
}
add_filter('request', 'remove_page_from_query_string');
/* =========================== End Spaces Posts  =========================== */

/*
**=> Function Sel Word By English Return By Arabic
*/
function lang($word) {
    
  static $my_words = array(
  

      'Sunday'    => 'الأحد',
      'Monday'    => 'الأثنين',
      'Tuesday'   => 'الثلاثاء',
      'Wednesday' => 'الأربعاء',
      'Thursday'  => 'الخميس',
      'Friday'   => 'الجمعة',
      'Saturday' => 'السبت',
      
      'January'   => 'يناير',
      'February'  => 'فبراير',
      'March'     => 'مارس',
      'April'     => 'أبريل',
      'May'       => 'مايو',
      'June'      => 'يونيو',
      'July'      => 'يوليو',
      'August'    => 'أغسطس',
      'september' => 'سبتمبر',
      'October'   => 'أكتوبر',
      'November'  => 'نوفمبر',
      'December'  => 'ديسمبر',

      'AM'   => 'ص',
      'PM'   => 'م',

  );
  
  return $my_words[$word];
  
};


function my_pagination() {


  global $wp_query;
  
    echo paginate_links(array(
        'current'   =>  max(1, get_query_var('paged')),
        'format'    =>  '?paged=%#%',
        'next_text' =>  '<i class="fas fa-caret-left"></i>',
        'prev_text' =>  '<i class="fas fa-caret-right"></i>',
        'before_page_number'  =>  '<span class="col">',
        'after_page_number'  =>  '</span>',
        'mid_size'  =>  2,
        'end_size'  =>  1,
    ));

}

/*
**=> Run Plugin "Redux"
**=> Add By @BaSh
*/
/* ==== Run Plugin "Redux" , Get Codes From File "simple-config.php" ==== */
if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/redux/ReduxCore/framework.php' ) ) {
  require_once( dirname( __FILE__ ) . '/redux/ReduxCore/framework.php' );
}
if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/redux/sample/sample-config.php' ) ) {
  require_once( dirname( __FILE__ ) . '/redux/sample/sample-config.php' );
  
}

/**
 * Remove empty paragraphs created by wpautop()
 * @author Ryan Hamilton
 * @link https://gist.github.com/Fantikerz/5557617
 */
function remove_empty_p( $content ) {
	$content = force_balance_tags( $content );
	$content = preg_replace( '#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content );
	$content = preg_replace( '~\s?<p>(\s|&nbsp;)+</p>\s?~', '', $content );
	return $content;
}
add_filter('the_content', 'remove_empty_p', 20, 1);


