<?php
//$qode_toolbar = true;

load_theme_textdomain( 'qode', get_template_directory().'/languages' );

if(isset($qode_toolbar)):
		
add_action('after_setup_theme', 'myStartSession', 1);
add_action('wp_logout', 'myEndSession');
add_action('wp_login', 'myEndSession');

/* Start session */
if (!function_exists('myStartSession')) {
function myStartSession() {
    if(!session_id()) {
        session_start();
    }
		if (!empty($_GET['animation']))
			$_SESSION['qode_animation'] = $_GET['animation'];
		if (isset($_SESSION['qode_animation']))
		if ($_SESSION['qode_animation'] == "off")
			$_SESSION['qode_animation'] = "";
}}

/* End session */

if (!function_exists('myEndSession')) {
function myEndSession() {
    session_destroy ();
}
}

endif;

add_filter('widget_text', 'do_shortcode');
//add_filter( 'the_excerpt', 'do_shortcode');

define('QODE_ROOT', get_template_directory_uri());
define('QODE_VAR_PREFIX', 'qode_'); 
include_once('includes/shortcodes/shortcodes.php');
include_once('includes/qode-options.php');
include_once('includes/import/qode-import.php');
//include_once('export/qode-export.php');
include_once('includes/custom-fields.php');
include_once('includes/custom-fields-post-formats.php');
include_once('includes/navmenu/qode-menu.php');
include_once('includes/qode-custom-sidebar.php');
include_once('includes/qode-custom-post-types.php');
include_once('includes/qode-like.php' );
include_once('widgets/relate_posts_widget.php');
include_once('widgets/latest_posts_menu.php');
include_once('widgets/call_to_action_widget.php');
require_once( 'woocommerce/woocommerce_configuration.php' );
if(function_exists("is_woocommerce")){
	include_once('widgets/woocommerce-dropdown-cart.php');
}

add_filter( 'call_to_action_widget', 'do_shortcode');

/* Add css */

if (!function_exists('qode_styles')) {
function qode_styles() {
	global $qode_options_elision;
	global $wp_styles;
	global $qode_toolbar;
	global $woocommerce;
        
        wp_enqueue_style("default_style", QODE_ROOT . "/style.css");
        wp_enqueue_style("font-awesome", QODE_ROOT . "/css/font-awesome/css/font-awesome.min.css");
        wp_enqueue_style("stylesheet", QODE_ROOT . "/css/stylesheet.min.css");

        if ($woocommerce) {
            wp_enqueue_style("woocommerce", QODE_ROOT . "/css/woocommerce.min.css");
            wp_enqueue_style("woocommerce_responsive", QODE_ROOT . "/css/woocommerce_responsive.min.css");
        }

        wp_enqueue_style("style_dynamic", QODE_ROOT . "/css/style_dynamic.php");

        $responsiveness = "yes";
        if (isset($qode_options_elision['responsiveness']))
            $responsiveness = $qode_options_elision['responsiveness'];
        if ($responsiveness != "no"):
            wp_enqueue_style("responsive", QODE_ROOT . "/css/responsive.min.css");
            wp_enqueue_style("style_dynamic_responsive", QODE_ROOT . "/css/style_dynamic_responsive.php");
        endif;
        if (isset($qode_toolbar)):
            wp_enqueue_style("toolbar", QODE_ROOT . "/css/toolbar.css");
        endif;
				wp_enqueue_style( 'js_composer_front' );
        wp_enqueue_style("custom_css", QODE_ROOT . "/css/custom_css.php");
	
	$fonts_array  = array(
		$qode_options_elision['google_fonts'].':200,300,400,600,800',
		$qode_options_elision['page_title_google_fonts'].':200,300,400,600,800',
		$qode_options_elision['h1_google_fonts'].':200,300,400,600,800',
		$qode_options_elision['h2_google_fonts'].':200,300,400,600,800',
		$qode_options_elision['h3_google_fonts'].':200,300,400,600,800',
		$qode_options_elision['h4_google_fonts'].':200,300,400,600,800',
		$qode_options_elision['h5_google_fonts'].':200,300,400,600,800',
		$qode_options_elision['h6_google_fonts'].':200,300,400,600,800',
		$qode_options_elision['text_google_fonts'].':200,300,400,600,800',
		$qode_options_elision['menu_google_fonts'].':200,300,400,600,800',
		$qode_options_elision['dropdown_google_fonts'].':200,300,400,600,800',
		$qode_options_elision['dropdown_google_fonts_thirdlvl'].':200,300,400,600,800',
		$qode_options_elision['sticky_google_fonts'].':200,300,400,600,800',
		$qode_options_elision['mobile_google_fonts'].':200,300,400,600,800',
		$qode_options_elision['button_title_google_fonts'].':200,300,400,600,800',
		$qode_options_elision['message_title_google_fonts'].':200,300,400,600,800'
	);
	
	$fonts_array=array_diff($fonts_array, array("-1:200,300,400,600,800"));
	$google_fonts_string = implode( '|', $fonts_array);
	if(count($fonts_array) > 0) :
		printf("<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,600italic,600,400italic,300italic,300|%s&subset=latin,latin-ext' rel='stylesheet' type='text/css'>\r\n", str_replace(' ', '+', $google_fonts_string));
	else :
		printf("<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,600italic,600,400italic,300italic,300&subset=latin,latin-ext' rel='stylesheet' type='text/css'>\r\n");
	endif;
}
}

/* Add js */

if (!function_exists('qode_scripts')) {
function qode_scripts() {
	global $qode_options_elision;
	global $is_IE;
	global $qode_toolbar;
	global $woocommerce;

	wp_enqueue_script("jquery");
	wp_enqueue_script("plugins", QODE_ROOT."/js/plugins.js",array(),false,true);

	if ( $is_IE ) {
		wp_enqueue_script("html5", QODE_ROOT."/js/html5.js",array(),false,false);
	}
	if($qode_options_elision['enable_google_map'] == "yes") :
		wp_enqueue_script("google_map_api", "https://maps.googleapis.com/maps/api/js?sensor=false",array(),false,true);
	endif;
	wp_enqueue_script("default_dynamic", QODE_ROOT."/js/default_dynamic.php",array(),false,true);
	wp_enqueue_script("default", QODE_ROOT."/js/default.min.js",array(),false,true);
	wp_enqueue_script("custom_js", QODE_ROOT."/js/custom_js.php",array(),false,true);
	global $wp_scripts;
	$wp_scripts->add_data('comment-reply', 'group', 1 );
	if ( is_singular() ) wp_enqueue_script( "comment-reply");
		
	$has_ajax = false;
	$qode_animation = "";
	if (isset($_SESSION['qode_animation']))
		$qode_animation = $_SESSION['qode_animation'];
	if (($qode_options_elision['page_transitions'] != "0") && (empty($qode_animation) || ($qode_animation != "no")))
		$has_ajax = true;
	elseif (!empty($qode_animation) && ($qode_animation != "no"))
		$has_ajax = true;
		
	if ($has_ajax) :
		wp_enqueue_script("ajax", QODE_ROOT."/js/ajax.min.js",array(),false,true);
	endif;
	wp_enqueue_script( 'wpb_composer_front_js' );
	
	if($qode_options_elision['use_recaptcha'] == "yes") :
	wp_enqueue_script("recaptcha_ajax", "http://www.google.com/recaptcha/api/js/recaptcha_ajax.js",array(),false,true);
	endif;
	
	if(isset($qode_toolbar)):
		wp_enqueue_script("toolbar", QODE_ROOT."/js/toolbar.js",array(),false,true);
	endif;

	if($woocommerce) {
        wp_enqueue_script("woocommerce-qode", QODE_ROOT."/js/woocommerce.js",array(),false,true);
        wp_enqueue_script("select2", QODE_ROOT."/js/select2.min.js",array(),false,true);
    }
}
}

add_action('wp_enqueue_scripts', 'qode_styles'); 
add_action('wp_enqueue_scripts', 'qode_scripts');

/* Add admin js and css */

if (!function_exists('qode_admin_jquery')) {
function qode_admin_jquery() {
	wp_enqueue_script('jquery'); 
	wp_enqueue_style('style', QODE_ROOT.'/css/admin/admin-style.css', false, '1.0', 'screen');
	wp_enqueue_style('colorstyle', QODE_ROOT.'/css/admin/colorpicker.css', false, '1.0', 'screen');
	wp_register_script('colorpickerss', QODE_ROOT.'/js/admin/colorpicker.js', array('jquery'), '1.0.0', false );
	wp_enqueue_script('colorpickerss'); 
	wp_enqueue_style('thickbox');
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_script('jquery-ui-datepicker');
	wp_enqueue_script('jquery-ui-accordion');
	wp_register_script('default', QODE_ROOT.'/js/admin/default.js', array('jquery'), '1.0.0', false );
	wp_enqueue_script('default'); 
	wp_enqueue_script('common');
	wp_enqueue_script('wp-lists');
	wp_enqueue_script('postbox');
}
}
add_action('admin_enqueue_scripts', 'qode_admin_jquery');

if (!isset( $content_width )) $content_width = 1060;

/* Remove Generator from head */

remove_action('wp_head', 'wp_generator'); 

/* Register Menus */

if (!function_exists('qode_register_menus')) {
function qode_register_menus() {
    register_nav_menus(
        array('top-navigation' => __( 'Top Navigation', 'qode')
		)
    );
}
}
add_action( 'after_setup_theme', 'qode_register_menus' ); 

/* Add post thumbnails */

if ( function_exists( 'add_theme_support' ) ) { 
add_theme_support( 'post-thumbnails' );
add_image_size( 'portfolio-square', 520, 520, true );
add_image_size( 'menu-featured-post', 345, 198, true );
add_image_size( 'qode-carousel_slider', 400, 260, true );
add_image_size( 'portfolio_slider', 480, 320, true );
}

/* Add post formats */

if ( function_exists( 'add_theme_support' ) ) { 
add_theme_support('post-formats', array('gallery', 'link', 'quote', 'video', 'audio'));
}

/* Add feedlinks */

add_theme_support( 'automatic-feed-links' );

/* Add class on body for ajax */

if (!function_exists('ajax_classes')) {
function ajax_classes($classes) {
	global $qode_options_elision;
	$qode_animation="";
	if (isset($_SESSION['qode_animation'])) $qode_animation = $_SESSION['qode_animation'];
	if(($qode_options_elision['page_transitions'] === "0") && ($qode_animation == "no")) :
		$classes[] = '';
	elseif($qode_options_elision['page_transitions'] === "1" && (empty($qode_animation) || ($qode_animation != "no"))) :
		$classes[] = 'ajax_updown';
		$classes[] = 'page_not_loaded';
	elseif($qode_options_elision['page_transitions'] === "2" && (empty($qode_animation) || ($qode_animation != "no"))) :
		$classes[] = 'ajax_fade';
		$classes[] = 'page_not_loaded';
	elseif($qode_options_elision['page_transitions'] === "3" && (empty($qode_animation) || ($qode_animation != "no"))) :
		$classes[] = 'ajax_updown_fade';
		$classes[] = 'page_not_loaded';
	elseif($qode_options_elision['page_transitions'] === "4" && (empty($qode_animation) || ($qode_animation != "no"))) :
		$classes[] = 'ajax_leftright';
		$classes[] = 'page_not_loaded';
	elseif(!empty($qode_animation) && $qode_animation != "no") :
		$classes[] = 'page_not_loaded';
	else:
	$classes[] ="";
	endif;

	return $classes;
}
}
add_filter('body_class','ajax_classes');

/* Add class on body for smooth scroll */

if (!function_exists('smooth_class')) {
function smooth_class($classes) {
	global $qode_options_elision;
	
	$iPod    = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
	$iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
	$iPad    = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
	$mac    = stripos($_SERVER['HTTP_USER_AGENT'],"Mac");
	$android    = stripos($_SERVER['HTTP_USER_AGENT'],"Android");
	$isMobile = (bool)preg_match('#\b(ip(hone|od|ad)|android|opera m(ob|in)i|windows (phone|ce)|blackberry|tablet'.
									'|s(ymbian|eries60|amsung)|p(laybook|alm|rofile/midp|laystation portable)|nokia|fennec|htc[\-_]'.
									'|mobile|up\.browser|[1-4][0-9]{2}x[1-4][0-9]{2})\b#i', $_SERVER['HTTP_USER_AGENT'] );
	
	$smooth_scroll = false;
	if(!$isMobile){
		if(isset($qode_options_elision['smooth_scroll']) && $qode_options_elision['smooth_scroll'] == "yes"){
				$smooth_scroll = true;
		}else if(isset($qode_options_elision['smooth_scroll']) && $qode_options_elision['smooth_scroll'] == "yes_not_ios"){
				if(!$mac){
					$smooth_scroll = true;
				}
		}
	}
	if (isset($_SESSION['qode_elision_smooth'])) {
		if ($_SESSION['qode_elision_smooth'] == "yes") $smooth_scroll = true;
		else $smooth_scroll = false;
	}
	
	if($smooth_scroll) :
		$classes[] = 'smooth_scroll';
	else:
	$classes[] ="";
	endif;
	
	if($mac):
		$classes[] = 'mac';
	endif;
	
	return $classes;
}
}
add_filter('body_class','smooth_class');

/* Add class on body boxed layout */

if (!function_exists('boxed_class')) {
function boxed_class($classes) {
	global $qode_options_elision;
	
	
	if(isset($qode_options_elision['boxed']) && $qode_options_elision['boxed'] == "yes") :
		$classes[] = 'boxed';
	else:
	$classes[] ="";
	endif;

	return $classes;
}
}
add_filter('body_class','boxed_class');


/* Add class on body for no elements animation on touch devices */

if (!function_exists('elements_animation_on_touch_class')) {
function elements_animation_on_touch_class($classes) {
	global $qode_options_elision;
	
	$isMobile = (bool)preg_match('#\b(ip(hone|od|ad)|android|opera m(ob|in)i|windows (phone|ce)|blackberry|tablet'.
									'|s(ymbian|eries60|amsung)|p(laybook|alm|rofile/midp|laystation portable)|nokia|fennec|htc[\-_]'.
									'|mobile|up\.browser|[1-4][0-9]{2}x[1-4][0-9]{2})\b#i', $_SERVER['HTTP_USER_AGENT'] );
	
	if(isset($qode_options_elision['elements_animation_on_touch']) && $qode_options_elision['elements_animation_on_touch'] == "no" && $isMobile == true) :
		$classes[] = 'no_animation_on_touch';
	else:
	$classes[] ="";
	endif;

	return $classes;
}
}
add_filter('body_class','elements_animation_on_touch_class');

/* Excerpt more */

if (!function_exists('qode_excerpt_more')) {
function qode_excerpt_more( $more ) {
    return '...';
}
}
add_filter('excerpt_more', 'qode_excerpt_more');

/* Excerpt lenght */

if (!function_exists('qode_excerpt_length')) {
function qode_excerpt_length( $length ) {
	global $qode_options_elision;
	if($qode_options_elision['number_of_chars']){
		 return $qode_options_elision['number_of_chars'];
	} else {
		return 45;
	}
}
}
add_filter( 'excerpt_length', 'qode_excerpt_length', 999 );

/* Social excerpt lenght */

if (!function_exists('the_excerpt_max_charlength')) {
function the_excerpt_max_charlength($charlength) {
	global $qode_options_elision;
	$via = $qode_options_elision['twitter_via'];
	$excerpt = get_the_excerpt();
	$charlength = 136 - (mb_strlen($via) + $charlength);

	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			return mb_substr( $subex, 0, $excut );
		} else {
			return $subex;
		}
	} else {
		return $excerpt;
	}
}
}

if(!function_exists('qode_excerpt')) {
	/**
	* Function that cuts post excerpt to the number of word based on previosly set global
	* variable $word_count, which is defined in qode_set_blog_word_count function
	*/
	function qode_excerpt() {
		global $qode_options_elision, $word_count, $post;

		$word_count = isset($word_count) && $word_count != "" ? $word_count : $qode_options_elision['number_of_chars'];
		$post_excerpt = $post->post_excerpt != "" ? $post->post_excerpt : strip_tags($post->post_content);
		$clean_excerpt = strpos($post_excerpt, '...') ? strstr($post_excerpt, '...', true) : $post_excerpt;

		$excerpt_word_array = explode (' ', $clean_excerpt);
  		$excerpt_word_array = array_slice ($excerpt_word_array, 0, $word_count);
  		$excerpt = implode (' ', $excerpt_word_array).'...';
		
		echo '<p>'.$excerpt.'</p>';
	}
}

if(!function_exists('qode_set_blog_word_count')) {
	/**
	* Function that sets global blog word count variable used by qode_excerpt function 
	*/
	function qode_set_blog_word_count($word_count_param) {
		global $word_count;

		$word_count = $word_count_param;
	}
}

add_filter('the_content', 'shortcode_empty_paragraph_fix');

/* Empty paragraph fix in shortcode */

if (!function_exists('shortcode_empty_paragraph_fix')) {
function shortcode_empty_paragraph_fix($content){   
    $array = array (
        '<p>[' => '[', 
        ']</p>' => ']', 
        ']<br />' => ']'
    );

    $content = strtr($content, $array);
    return $content;
}
}

/* Use slider instead of image for post */

if (!function_exists('slider_blog')) {
function slider_blog($post_id) {
	$sliders = get_post_meta($post_id, "qode_sliders", true);		
	$slider = $sliders[1];
	if($slider) {
		$html .= '<div class="flexslider"><ul class="slides">';
		$i=0;
		while (isset($slider[$i])){
			$slide = $slider[$i];
			
			$href = $slide[link];
			$baseurl = home_url();
			$baseurl = str_replace('http://', '', $baseurl);
			$baseurl = str_replace('www', '', $baseurl);
			$host = parse_url($href, PHP_URL_HOST);
			if($host != $baseurl) {
				$target = 'target="_blank"';
			}
			else {
				$target = 'target="_self"';
			}
			
			$html .= '<li class="slide ' . $slide[imgsize] . '">';
			$html .= '<div class="image"><img src="' . $slide[img] . '" alt="' . $slide[title] . '" /></div>';
			
			$html .= '</li>';
			$i++; 
		}
		$html .= '</ul></div>';
	}
	return $html;
}
}

if (!function_exists('compareSlides')) {
function compareSlides($a, $b){
	if (isset($a['ordernumber']) && isset($b['ordernumber'])) {
    if ($a['ordernumber'] == $b['ordernumber']) {
        return 0;
    }
    return ($a['ordernumber'] < $b['ordernumber']) ? -1 : 1;
  }
  return 0;
}
}

if (!function_exists('comparePortfolioImages')) {
function comparePortfolioImages($a, $b){
	if (isset($a['portfolioimgordernumber']) && isset($b['portfolioimgordernumber'])) {
    if ($a['portfolioimgordernumber'] == $b['portfolioimgordernumber']) {
        return 0;
    }
    return ($a['portfolioimgordernumber'] < $b['portfolioimgordernumber']) ? -1 : 1;
  }
  return 0;
}
}

if (!function_exists('comparePortfolioOptions')){
function comparePortfolioOptions($a, $b){
	if (isset($a['optionlabelordernumber']) && isset($b['optionlabelordernumber'])) {
    if ($a['optionlabelordernumber'] == $b['optionlabelordernumber']) {
        return 0;
    }
    return ($a['optionlabelordernumber'] < $b['optionlabelordernumber']) ? -1 : 1;
  }
  return 0;
}
}

if (!function_exists('hex2rgb')) {
function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}
}

function rewrite_rules_on_theme_activation() {
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'rewrite_rules_on_theme_activation' );

// QODE PAGINATION


if (!function_exists('pagination')) {
function pagination($pages = '', $range = 4, $paged = 1){  
	global $qode_options_elision;
    $showitems = $range+1;  
 
    if($pages == ''){
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages){
            $pages = 1;
        }
    }   
 
    if(1 != $pages){
        echo "<div class='pagination'><ul>";
        if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li class='first'><a href='".get_pagenum_link(1)."'><i class='fa fa-angle-double-left'></i></a></li>";
		echo "<li class='prev";
		if($paged > 2 && $paged > $range+1 && $showitems < $pages) {
			echo " prev_first";
		}
		echo "'><a href='".get_pagenum_link($paged - 1)."'><i class='fa fa-angle-left'></i></a></li>";
 
        for ($i=1; $i <= $pages; $i++){
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
                echo ($paged == $i)? "<li class='active'><span>".$i."</span></li>":"<li><a href='".get_pagenum_link($i)."' class='inactive'>".$i."</a></li>";
            }
        }
		
        echo "<li class='next";
		if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages){
			echo " next_last";
		}
		echo "'><a href=\"";
		if($pages > $paged){
			echo get_pagenum_link($paged + 1);
		} else {
			echo get_pagenum_link($paged);
		}
		echo "\"><i class='fa fa-angle-right'></i></a></li>";  
		 
        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li class='last'><a href='".get_pagenum_link($pages)."'><i class='fa fa-angle-double-right'></i></a></li>";
        echo "</ul></div>\n";
    }
}
}

// QODE CAROUSEL


if (!function_exists('getCarouselSliderArray')){
	function getCarouselSliderArray() {
		$carousel_output = array("" => ""); 
    $terms = get_terms('carousels_category');
    $count = count($terms);
    if ( $count > 0 ):
        foreach ( $terms as $term ):
            $carousel_output[$term->name] = $term->slug;
        endforeach;
    endif;
		
    return $carousel_output;
	}
}
add_action('init', 'getCarouselSliderArray',1);

// QODE SIDEBARS

if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
        'name' => 'Sidebar',
				'id' => 'sidebar',
        'description' => 'Default Sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s posts_holder">',
        'after_widget' => '</div>',
        'before_title' => '<h5>',
        'after_title' => '</h5>'
    ));
		register_sidebar(array(
				'name' => 'Sidebar Page',
				'id' => 'sidebar_page',
        'description' => 'Sidebar for Page',
        'before_widget' => '<div id="%1$s" class="widget %2$s posts_holder">',
        'after_widget' => '</div>',
        'before_title' => '<h5>',
        'after_title' => '</h5>'
    ));
		register_sidebar(array(
        'name' => 'Header Left',
				'id' => 'header_left',
				'description' => 'Header Left',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '',
        'after_title' => ''
    ));
		register_sidebar(array(
        'name' => 'Header Right',
				'id' => 'header_right',
				'description' => 'Header Right',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '',
        'after_title' => ''
    ));
		register_sidebar(array(
        'name' => 'WooCommerce Drop Down Cart',
				'id' => 'woocommerce_dropdown_cart',
				'description' => 'Use this area only for woocommerce dropdown cart widget',
        'before_widget' => '<div class="shopping_cart_outer"><div class="shopping_cart_inner">',
        'after_widget' => '</div></div>',
        'before_title' => '',
        'after_title' => ''
    ));
		register_sidebar(array(
				'name' => 'Side Area',
				'id' => 'sidearea',
				'description' => 'Side Area',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h5>',
        'after_title' => '</h5>'
    ));
		register_sidebar(array(
				'name' => 'Footer Column 1',
				'id' => 'footer_column_1',
        'description' => 'Footer Column 1',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h6>',
        'after_title' => '</h6>'
    ));
		register_sidebar(array(
				'name' => 'Footer Column 2',
				'id' => 'footer_column_2',
        'description' => 'Footer Column 2',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h6>',
        'after_title' => '</h6>'
    ));
		register_sidebar(array(
				'name' => 'Footer column 3',
				'id' => 'footer_column_3',
        'description' => 'Footer Column 3',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h6>',
        'after_title' => '</h6>'
    ));
		register_sidebar(array(
				'name' => 'Footer column 4',
				'id' => 'footer_column_4',
        'description' => 'Footer Column 4',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h6>',
        'after_title' => '</h6>'
    ));
		register_sidebar(array(
        'name' => 'Footer text',
				'id' => 'footer_text',
        'description' => 'Footer Text',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => ''
    ));
}

// register custom sidebars to theme
add_theme_support('qode_sidebar');
if(get_theme_support( 'qode_sidebar' )) new qode_sidebar();

if (!function_exists('isUserMadeSidebar')) {
function isUserMadeSidebar($name){
    
    //this have to be changed depending on theme
    if($name == 'Sidebar'){
        return false;
    }else if($name == 'Sidebar Page'){
        return false;
		}else if($name == 'WooCommerce Drop Down Cart'){
        return false;		
    }else if($name == 'Header Left'){
        return false;   
    }else if($name == 'Header Right'){
        return false;
    }else if($name == 'Side Area'){
        return false;
    }else if($name == 'Footer Column 1'){
        return false;
    }else if($name == 'Footer Column 2'){
        return false;
    }else if($name == 'Footer Column 3'){
        return false;
    }else if($name == 'Footer Column 4'){
        return false;
    }else if($name == 'Footer Text'){
        return false;
    }else{
        return true;
    }
}
}

// QODE CUSTOM TAXONOMY FIELD

function slides_category_taxonomy_custom_fields($tag) {  
    $t_id = $tag->term_id; // Get the ID of the term you're editing  
    $term_meta = get_option( "taxonomy_term_$t_id" );
?>  
  
<tr class="form-field">  
    <th scope="row" valign="top">  
        <label for="shortcode"><?php _e('Slider shortcode', 'qode'); ?></label>  
    </th>  
    <td>  
        <input type="text" name="term_meta[shortcode]" id="term_meta[shortcode]" size="25" style="width:60%;" value="<?php echo $tag->slug ? "[qode_slider slider='".$tag->slug."' height='' background_color='']" : ""; ?>" readonly><br />  
        <span class="description"><?php _e('Use this shortcode to insert it on page', 'qode'); ?></span>  
    </td>  
</tr>  
  
<?php  
}  

function save_taxonomy_custom_fields( $term_id ) {  
    if ( isset( $_POST['term_meta'] ) ) {  
        $t_id = $term_id;  
        $term_meta = get_option( "taxonomy_term_$t_id" );  
        $cat_keys = array_keys( $_POST['term_meta'] );  
            foreach ( $cat_keys as $key ){  
            if ( isset( $_POST['term_meta'][$key] ) ){  
                $term_meta[$key] = $_POST['term_meta'][$key];  
            }  
        }  
        update_option( "taxonomy_term_$t_id", $term_meta );  
    }  
}

add_action( 'slides_category_edit_form_fields', 'slides_category_taxonomy_custom_fields', 10, 2 );    
add_action( 'edited_slides_category', 'save_taxonomy_custom_fields', 10, 2 );



add_filter("manage_edit-slides_category_columns", 'theme_columns'); 
function theme_columns($theme_columns) {
    $new_columns = array(
        'cb' => '<input type="checkbox" />',
        'name' => __('Name', 'qode'),
        'shortcode' => __('Shortcode', 'qode'),
				//'description' => __('Description', 'qode'),
        'slug' => __('Slug', 'qode'),
        'posts' => __('Posts', 'qode')
        );
    return $new_columns;
}

add_filter("manage_slides_category_custom_column", 'manage_theme_columns', 10, 3);
function manage_theme_columns($out, $column_name, $theme_id) {
    $theme = get_term($theme_id, 'slides_category');
		switch ($column_name) {
        case 'shortcode':
            $data = maybe_unserialize($theme->description);
            $out .= "[qode_slider slider='".$theme->slug."' auto_start='true' slide_animation='6000' height='' background_color='']";
            break;
 
        default:
            break;
    }
    return $out;   
}

// QODE COMMENTS

if (!function_exists('qode_comment')) {
function qode_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>

<li>                        
	<div class="comment">
		<div class="image"> <?php echo get_avatar($comment, 90); ?> </div>
		<div class="text">
			<h4 class="name"><?php echo get_comment_author_link(); ?> <span class="comment_date"> | <?php echo get_comment_date('M j, Y') . " at " . get_comment_time(); ?></span></h4>
			<div class="text_holder" id="comment-<?php echo comment_ID(); ?>">
				<?php comment_text(); ?>
			</div>
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text'=>'<i class="fa fa-reply"></i>' ) ) ); ?>
		</div>
	</div>                          
                
<?php if ($comment->comment_approved == '0') : ?>
<p><em><?php _e('Your comment is awaiting moderation.', 'qode'); ?></em></p>
<?php endif; ?>
<?php 
}
}

// FONT AWESOME

if (!function_exists('getFontAwesomeIconArray')){
	function getFontAwesomeIconArray(){
		
		$icons = array (
			'fa-adjust' => '\f042',
			'fa-adn' => '\f170',
			'fa-align-center' => '\f037',
			'fa-align-justify' => '\f039',
			'fa-align-left' => '\f036',
			'fa-align-right' => '\f038',
			'fa-ambulance' => '\f0f9',
			'fa-anchor' => '\f13d',
			'fa-android' => '\f17b',
			'fa-angle-double-down' => '\f103',
			'fa-angle-double-left' => '\f100',
			'fa-angle-double-right' => '\f101',
			'fa-angle-double-up' => '\f102',
			'fa-angle-down' => '\f107',
			'fa-angle-left' => '\f104',
			'fa-angle-right' => '\f105',
			'fa-angle-up' => '\f106',
			'fa-apple' => '\f179',
			'fa-archive' => '\f187',
			'fa-arrow-circle-down' => '\f0ab',
			'fa-arrow-circle-left' => '\f0a8',
			'fa-arrow-circle-o-down' => '\f01a',
			'fa-arrow-circle-o-left' => '\f190',
			'fa-arrow-circle-o-right' => '\f18e',
			'fa-arrow-circle-o-up' => '\f01b',
			'fa-arrow-circle-right' => '\f0a9',
			'fa-arrow-circle-up' => '\f0aa',
			'fa-arrow-down' => '\f063',
			'fa-arrow-left' => '\f060',
			'fa-arrow-right' => '\f061',
			'fa-arrow-up' => '\f062',
			'fa-arrows' => '\f047',
			'fa-arrows-alt' => '\f0b2',
			'fa-arrows-h' => '\f07e',
			'fa-arrows-v' => '\f07d',
			'fa-asterisk' => '\f069',
			'fa-backward' => '\f04a',
			'fa-ban' => '\f05e',
			'fa-bar-chart-o' => '\f080',
			'fa-barcode' => '\f02a',
			'fa-bars' => '\f0c9',
			'fa-beer' => '\f0fc',
			'fa-bell' => '\f0f3',
			'fa-bell-o' => '\f0a2',
			'fa-bitbucket' => '\f171',
			'fa-bitbucket-square' => '\f172',
			'fa-bold' => '\f032',
			'fa-bolt' => '\f0e7',
			'fa-book' => '\f02d',
			'fa-bookmark' => '\f02e',
			'fa-bookmark-o' => '\f097',
			'fa-briefcase' => '\f0b1',
			'fa-btc' => '\f15a',
			'fa-bug' => '\f188',
			'fa-building-o' => '\f0f7',
			'fa-bullhorn' => '\f0a1',
			'fa-bullseye' => '\f140',
			'fa-calendar' => '\f073',
			'fa-calendar-o' => '\f133',
			'fa-camera' => '\f030',
			'fa-camera-retro' => '\f083',
			'fa-caret-down' => '\f0d7',
			'fa-caret-left' => '\f0d9',
			'fa-caret-right' => '\f0da',
			'fa-caret-square-o-down' => '\f150',
			'fa-caret-square-o-left' => '\f191',
			'fa-caret-square-o-right' => '\f152',
			'fa-caret-square-o-up' => '\f151',
			'fa-caret-up' => '\f0d8',
			'fa-certificate' => '\f0a3',
			'fa-chain-broken' => '\f127',
			'fa-check' => '\f00c',
			'fa-check-circle' => '\f058',
			'fa-check-circle-o' => '\f05d',
			'fa-check-square' => '\f14a',
			'fa-check-square-o' => '\f046',
			'fa-chevron-circle-down' => '\f13a',
			'fa-chevron-circle-left' => '\f137',
			'fa-chevron-circle-right' => '\f138',
			'fa-chevron-circle-up' => '\f139',
			'fa-chevron-down' => '\f078',
			'fa-chevron-left' => '\f053',
			'fa-chevron-right' => '\f054',
			'fa-chevron-up' => '\f077',
			'fa-circle' => '\f111',
			'fa-circle-o' => '\f10c',
			'fa-clipboard' => '\f0ea',
			'fa-clock-o' => '\f017',
			'fa-cloud' => '\f0c2',
			'fa-cloud-download' => '\f0ed',
			'fa-cloud-upload' => '\f0ee',
			'fa-code' => '\f121',
			'fa-code-fork' => '\f126',
			'fa-coffee' => '\f0f4',
			'fa-cog' => '\f013',
			'fa-cogs' => '\f085',
			'fa-columns' => '\f0db',
			'fa-comment' => '\f075',
			'fa-comment-o' => '\f0e5',
			'fa-comments' => '\f086',
			'fa-comments-o' => '\f0e6',
			'fa-compass' => '\f14e',
			'fa-compress' => '\f066',
			'fa-credit-card' => '\f09d',
			'fa-crop' => '\f125',
			'fa-crosshairs' => '\f05b',
			'fa-css3' => '\f13c',
			'fa-cutlery' => '\f0f5',
			'fa-desktop' => '\f108',
			'fa-dot-circle-o' => '\f192',
			'fa-download' => '\f019',
			'fa-dribbble' => '\f17d',
			'fa-dropbox' => '\f16b',
			'fa-eject' => '\f052',
			'fa-ellipsis-h' => '\f141',
			'fa-ellipsis-v' => '\f142',
			'fa-envelope' => '\f0e0',
			'fa-envelope-o' => '\f003',
			'fa-eraser' => '\f12d',
			'fa-eur' => '\f153',
			'fa-exchange' => '\f0ec',
			'fa-exclamation' => '\f12a',
			'fa-exclamation-circle' => '\f06a',
			'fa-exclamation-triangle' => '\f071',
			'fa-expand' => '\f065',
			'fa-external-link' => '\f08e',
			'fa-external-link-square' => '\f14c',
			'fa-eye' => '\f06e',
			'fa-eye-slash' => '\f070',
			'fa-facebook' => '\f09a',
			'fa-facebook-square' => '\f082',
			'fa-fast-backward' => '\f049',
			'fa-fast-forward' => '\f050',
			'fa-female' => '\f182',
			'fa-fighter-jet' => '\f0fb',
			'fa-file' => '\f15b',
			'fa-file-o' => '\f016',
			'fa-file-text' => '\f15c',
			'fa-file-text-o' => '\f0f6',
			'fa-files-o' => '\f0c5',
			'fa-film' => '\f008',
			'fa-filter' => '\f0b0',
			'fa-fire' => '\f06d',
			'fa-fire-extinguisher' => '\f134',
			'fa-flag' => '\f024',
			'fa-flag-checkered' => '\f11e',
			'fa-flag-o' => '\f11d',
			'fa-flask' => '\f0c3',
			'fa-flickr' => '\f16e',
			'fa-floppy-o' => '\f0c7',
			'fa-folder' => '\f07b',
			'fa-folder-o' => '\f114',
			'fa-folder-open' => '\f07c',
			'fa-folder-open-o' => '\f115',
			'fa-font' => '\f031',
			'fa-forward' => '\f04e',
			'fa-foursquare' => '\f180',
			'fa-frown-o' => '\f119',
			'fa-gamepad' => '\f11b',
			'fa-gavel' => '\f0e3',
			'fa-gbp' => '\f154',
			'fa-gift' => '\f06b',
			'fa-github' => '\f09b',
			'fa-github-alt' => '\f113',
			'fa-github-square' => '\f092',
			'fa-gittip' => '\f184',
			'fa-glass' => '\f000',
			'fa-globe' => '\f0ac',
			'fa-google-plus' => '\f0d5',
			'fa-google-plus-square' => '\f0d4',
			'fa-h-square' => '\f0fd',
			'fa-hand-o-down' => '\f0a7',
			'fa-hand-o-left' => '\f0a5',
			'fa-hand-o-right' => '\f0a4',
			'fa-hand-o-up' => '\f0a6',
			'fa-hdd-o' => '\f0a0',
			'fa-headphones' => '\f025',
			'fa-heart' => '\f004',
			'fa-heart-o' => '\f08a',
			'fa-home' => '\f015',
			'fa-hospital-o' => '\f0f8',
			'fa-html5' => '\f13b',
			'fa-inbox' => '\f01c',
			'fa-indent' => '\f03c',
			'fa-info' => '\f129',
			'fa-info-circle' => '\f05a',
			'fa-inr' => '\f156',
			'fa-instagram' => '\f16d',
			'fa-italic' => '\f033',
			'fa-jpy' => '\f157',
			'fa-key' => '\f084',
			'fa-keyboard-o' => '\f11c',
			'fa-krw' => '\f159',
			'fa-laptop' => '\f109',
			'fa-leaf' => '\f06c',
			'fa-lemon-o' => '\f094',
			'fa-level-down' => '\f149',
			'fa-level-up' => '\f148',
			'fa-lightbulb-o' => '\f0eb',
			'fa-link' => '\f0c1',
			'fa-linkedin' => '\f0e1',
			'fa-linkedin-square' => '\f08c',
			'fa-linux' => '\f17c',
			'fa-list' => '\f03a',
			'fa-list-alt' => '\f022',
			'fa-list-ol' => '\f0cb',
			'fa-list-ul' => '\f0ca',
			'fa-location-arrow' => '\f124',
			'fa-lock' => '\f023',
			'fa-long-arrow-down' => '\f175',
			'fa-long-arrow-left' => '\f177',
			'fa-long-arrow-right' => '\f178',
			'fa-long-arrow-up' => '\f176',
			'fa-magic' => '\f0d0',
			'fa-magnet' => '\f076',
			'fa-mail-reply-all' => '\f122',
			'fa-male' => '\f183',
			'fa-map-marker' => '\f041',
			'fa-maxcdn' => '\f136',
			'fa-medkit' => '\f0fa',
			'fa-meh-o' => '\f11a',
			'fa-microphone' => '\f130',
			'fa-microphone-slash' => '\f131',
			'fa-minus' => '\f068',
			'fa-minus-circle' => '\f056',
			'fa-minus-square' => '\f146',
			'fa-minus-square-o' => '\f147',
			'fa-mobile' => '\f10b',
			'fa-money' => '\f0d6',
			'fa-moon-o' => '\f186',
			'fa-music' => '\f001',
			'fa-outdent' => '\f03b',
			'fa-pagelines' => '\f18c',
			'fa-paperclip' => '\f0c6',
			'fa-pause' => '\f04c',
			'fa-pencil' => '\f040',
			'fa-pencil-square' => '\f14b',
			'fa-pencil-square-o' => '\f044',
			'fa-phone' => '\f095',
			'fa-phone-square' => '\f098',
			'fa-picture-o' => '\f03e',
			'fa-pinterest' => '\f0d2',
			'fa-pinterest-square' => '\f0d3',
			'fa-plane' => '\f072',
			'fa-play' => '\f04b',
			'fa-play-circle' => '\f144',
			'fa-play-circle-o' => '\f01d',
			'fa-plus' => '\f067',
			'fa-plus-circle' => '\f055',
			'fa-plus-square' => '\f0fe',
			'fa-plus-square-o' => '\f196',
			'fa-power-off' => '\f011',
			'fa-print' => '\f02f',
			'fa-puzzle-piece' => '\f12e',
			'fa-qrcode' => '\f029',
			'fa-question' => '\f128',
			'fa-question-circle' => '\f059',
			'fa-quote-left' => '\f10d',
			'fa-quote-right' => '\f10e',
			'fa-random' => '\f074',
			'fa-refresh' => '\f021',
			'fa-renren' => '\f18b',
			'fa-repeat' => '\f01e',
			'fa-reply' => '\f112',
			'fa-reply-all' => '\f122',
			'fa-retweet' => '\f079',
			'fa-road' => '\f018',
			'fa-rocket' => '\f135',
			'fa-rss' => '\f09e',
			'fa-rss-square' => '\f143',
			'fa-rub' => '\f158',
			'fa-scissors' => '\f0c4',
			'fa-search' => '\f002',
			'fa-search-minus' => '\f010',
			'fa-search-plus' => '\f00e',
			'fa-share' => '\f064',
			'fa-share-square' => '\f14d',
			'fa-share-square-o' => '\f045',
			'fa-shield' => '\f132',
			'fa-shopping-cart' => '\f07a',
			'fa-sign-in' => '\f090',
			'fa-sign-out' => '\f08b',
			'fa-signal' => '\f012',
			'fa-sitemap' => '\f0e8',
			'fa-skype' => '\f17e',
			'fa-smile-o' => '\f118',
			'fa-sort' => '\f0dc',
			'fa-sort-alpha-asc' => '\f15d',
			'fa-sort-alpha-desc' => '\f15e',
			'fa-sort-amount-asc' => '\f160',
			'fa-sort-amount-desc' => '\f161',
			'fa-sort-asc' => '\f0dd',
			'fa-sort-desc' => '\f0de',
			'fa-sort-numeric-asc' => '\f162',
			'fa-sort-numeric-desc' => '\f163',
			'fa-spinner' => '\f110',
			'fa-square' => '\f0c8',
			'fa-square-o' => '\f096', 
			'fa-stack-exchange' => '\f18d',
			'fa-stack-overflow' => '\f16c',
			'fa-star' => '\f005',
			'fa-star-half' => '\f089',
			'fa-star-half-o' => '\f123',
			'fa-star-o' => '\f006',
			'fa-step-backward' => '\f048',
			'fa-step-forward' => '\f051',
			'fa-stethoscope' => '\f0f1',
			'fa-stop' => '\f04d',
			'fa-strikethrough' => '\f0cc',
			'fa-subscript' => '\f12c',
			'fa-suitcase' => '\f0f2',
			'fa-sun-o' => '\f185',
			'fa-superscript' => '\f12b',
			'fa-table' => '\f0ce',
			'fa-tablet' => '\f10a',
			'fa-tachometer' => '\f0e4',
			'fa-tag' => '\f02b',
			'fa-tags' => '\f02c',
			'fa-tasks' => '\f0ae',
			'fa-terminal' => '\f120',
			'fa-text-height' => '\f034',
			'fa-text-width' => '\f035',
			'fa-th' => '\f00a',
			'fa-th-large' => '\f009',
			'fa-th-list' => '\f00b',
			'fa-thumb-tack' => '\f08d',
			'fa-thumbs-down' => '\f165',
			'fa-thumbs-o-down' => '\f088',
			'fa-thumbs-o-up' => '\f087',
			'fa-thumbs-up' => '\f164',
			'fa-ticket' => '\f145',
			'fa-times' => '\f00d',
			'fa-times-circle' => '\f057',
			'fa-times-circle-o' => '\f05c',
			'fa-tint' => '\f043',
			'fa-trash-o' => '\f014',
			'fa-trello' => '\f181',
			'fa-trophy' => '\f091',
			'fa-truck' => '\f0d1',
			'fa-try' => '\f195',
			'fa-tumblr' => '\f173',
			'fa-tumblr-square' => '\f174',
			'fa-twitter' => '\f099',
			'fa-twitter-square' => '\f081',
			'fa-umbrella' => '\f0e9',
			'fa-underline' => '\f0cd',
			'fa-undo' => '\f0e2',
			'fa-unlock' => '\f09c',
			'fa-unlock-alt' => '\f13e',
			'fa-upload' => '\f093',
			'fa-usd' => '\f155',
			'fa-user' => '\f007',
			'fa-user-md' => '\f0f0',
			'fa-users' => '\f0c0',
			'fa-video-camera' => '\f03d',
			'fa-vimeo-square' => '\f194',
			'fa-vk' => '\f189',
			'fa-volume-down' => '\f027',
			'fa-volume-off' => '\f026',
			'fa-volume-up' => '\f028',
			'fa-weibo' => '\f18a',
			'fa-wheelchair' => '\f193',
			'fa-windows' => '\f17a',
			'fa-wrench' => '\f0ad',
			'fa-xing' => '\f168',
			'fa-xing-square' => '\f169',
			'fa-youtube' => '\f167',
			'fa-youtube-play' => '\f16a',
			'fa-youtube-square' => '\f166',
		);

		return $icons;
	}
}

// TGM ACTIVACION & PLUGINS

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/includes/class-tgm-plugin-activation.php';


add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
if (!function_exists('my_theme_register_required_plugins')) {
function my_theme_register_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin pre-packaged with a theme
		array(
			'name'     				=> 'LayerSlider WP', // The plugin name
			'slug'     				=> 'LayerSlider', // The plugin slug (typically the folder name)
			'source'   				=> get_stylesheet_directory() . '/plugins/layersliderwp-4.6.6.installable.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),

		// This is an example of how to include a plugin from the WordPress Plugin Repository
		// array(
			// 'name' 		=> 'BuddyPress',
			// 'slug' 		=> 'buddypress',
			// 'required' 	=> false,
		// ),

	);

	// Change this to your theme text domain, used for internationalising strings
	$theme_text_domain = 'elision';

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'       		=> $theme_text_domain,         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
		'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> false,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'page_title'                       			=> __( 'Install Required Plugins', $theme_text_domain ),
			'menu_title'                       			=> __( 'Install Plugins', $theme_text_domain ),
			'installing'                       			=> __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
			'oops'                             			=> __( 'Something went wrong with the plugin API.', $theme_text_domain ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                           			=> __( 'Return to Required Plugins Installer', $theme_text_domain ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', $theme_text_domain ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', $theme_text_domain ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );
}
}


if (!class_exists('WPBakeryVisualComposerAbstract')) {
  $dir = dirname(__FILE__) . '/wpbakery/';
  $composer_settings = Array(
      'APP_ROOT'      => $dir . '/js_composer',
      'WP_ROOT'       => dirname( dirname( dirname( dirname($dir ) ) ) ). '/',
      'APP_DIR'       => basename( $dir ) . '/js_composer/',
      'CONFIG'        => $dir . '/js_composer/config/',
      'ASSETS_DIR'    => 'assets/',
      'COMPOSER'      => $dir . '/js_composer/composer/',
      'COMPOSER_LIB'  => $dir . '/js_composer/composer/lib/',
      'SHORTCODES_LIB'  => $dir . '/js_composer/composer/lib/shortcodes/',
      'USER_DIR_NAME'  => 'extendvc/vc_templates', /* Path relative to your current theme, where VC should look for new shortcode templates */
 
      //for which content types Visual Composer should be enabled by default
      'default_post_types' => Array('page','post','portfolio_page')
  );
  require_once locate_template('/wpbakery/js_composer/js_composer.php');
	$wpVC_setup->init($composer_settings);
}

// Initialising Shortcodes
if (class_exists('WPBakeryVisualComposerAbstract')) {
	function requireVcExtend(){
		require_once locate_template('/extendvc/extend-vc.php');
	}
	add_action('init', 'requireVcExtend',2);
}
?>