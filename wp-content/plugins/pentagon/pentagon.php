<?php
/*
    Plugin Name: Pentagon Post
    Description: View as Pentagon style
    Author: Karthik
    Version: 1.0
*/




add_theme_support( 'post-thumbnails' );




add_action('init', 'p_init');

function p_init() {


add_shortcode('p-shortcode', 'p_function');
    $args = array(
        'public' => true,
        'label' => 'Pentagon',
        'supports' => array(
            'title',
            'thumbnail',
		'editor'
        )
    );
    register_post_type('p_images', $args);

}




/*-------------- Register Style and script ------------------------*/




add_action('wp_print_scripts', 'p_register_scripts');
add_action('wp_print_styles', 'p_register_styles');







function p_register_scripts() {
    if (!is_admin()) {
        // register
   wp_register_script('p_script', plugins_url('js/animation.js', __FILE__));
  
 
        // enqueue

        wp_enqueue_script('p_script');
    }
}
 
function p_register_styles() {
    // register
	
wp_register_style('p_styles', plugins_url('style.css', __FILE__));
     

    // enqueue
    wp_enqueue_style('p_styles');

}


/*------------------------------Main Function --------------------------------------*/



function p_function($type='p_function') {
  /*  $args = array(
        'post_type' => 'News',
    );*/
    $result = '<div class="portfolio">';
 
    //the loop
    /*$loop = new WP_Query($args);*/
    
    global $post;
 	$pagename = $post->post_name;


	if($pagename=="evidencer")
	{    
     		$loop = new WP_Query('cat=39');
     	}
     	if($pagename=="cyberclaz")
	{    
     		$loop = new WP_Query('cat=40');
     	}
     	
     	
     	
     	
    while ($loop->have_posts()) {
        $loop->the_post();
 
        $the_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $type);
        $postlink= get_permalink($post->ID);
       
        
        $result .=' <div class="pentagon">
      <a href="'.$postlink.'">
  	    <span class="mask"></span><img  src="' . $the_url[0] . '" data-thumb="' . $the_url[0] . '" alt="" width="130px" height="140px"/>
		</a>
  	  <div class="portfolio-title"><h4>'.get_the_title().'<span>Read More</span></h4>  	   
  	  </div>
    </div>';
    }
  
    $result .='<div class="clearfix"></div></div>';
    return $result;
}



?>