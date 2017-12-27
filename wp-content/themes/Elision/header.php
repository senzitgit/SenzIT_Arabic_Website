<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php 
global $qode_options_elision;
global $wp_query;
$disable_qode_seo = "";
$seo_title = "";
if (isset($qode_options_elision['disable_qode_seo'])) $disable_qode_seo = $qode_options_elision['disable_qode_seo'];
if ($disable_qode_seo != "yes") {
	$seo_title = get_post_meta($wp_query->get_queried_object_id(), "qode_seo_title", true);
	$seo_description = get_post_meta($wp_query->get_queried_object_id(), "qode_seo_description", true);
	$seo_keywords = get_post_meta($wp_query->get_queried_object_id(), "qode_seo_keywords", true);
}
?>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<?php
	if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false))
	echo('<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">');
	
	$responsiveness = "yes";
	if (isset($qode_options_elision['responsiveness'])) $responsiveness = $qode_options_elision['responsiveness'];
	if($responsiveness != "no"){
	?>
	<meta name=viewport content="width=device-width,initial-scale=1,user-scalable=no">
	<?php 
	}else{
	?>
	<meta name=viewport content="width=1200,user-scalable=no">
	<?php } ?>
	<title><?php if($seo_title) { ?><?php bloginfo('name'); ?> | <?php echo $seo_title; ?><?php } else {?><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?><?php } ?></title>
	
	<?php if ($disable_qode_seo != "yes") { ?>
		<?php if($seo_description) { ?>
			<meta name="description" content="<?php echo $seo_description; ?>">
		<?php } else if($qode_options_elision['meta_description']){ ?>
			<meta name="description" content="<?php echo $qode_options_elision['meta_description'] ?>">
		<?php } ?>

		<?php if($seo_keywords) { ?>
			<meta name="keywords" content="<?php echo $seo_keywords; ?>">
		<?php } else if($qode_options_elision['meta_keywords']){ ?>
			<meta name="keywords" content="<?php echo $qode_options_elision['meta_keywords'] ?>">
		<?php } ?>
	<?php } ?>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $qode_options_elision['favicon_image']; ?>">
	<link rel="apple-touch-icon" href="<?php echo $qode_options_elision['favicon_image']; ?>"/>
	<!--[if gte IE 9]>
		<style type="text/css">
			.gradient {
				 filter: none;
			}
		</style>
	<![endif]-->

	<?php wp_head(); ?>
	
	
	
	
	
	
	
	

</head>

<body <?php body_class(); ?>>
	
	<?php
		$loading_animation = true;
		if (isset($qode_options_elision['loading_animation'])){ if($qode_options_elision['loading_animation'] == "off") { $loading_animation = false; }};
	
		if (isset($qode_options_elision['loading_image']) && $qode_options_elision['loading_image'] != ""){ $loading_image = $qode_options_elision['loading_image'];}else{ $loading_image =  ""; }
	?>
	<?php if($loading_animation){ ?>
		<div class="ajax_loader"><div class="ajax_loader_1"><?php if($loading_image != ""){ ?><div class="ajax_loader_2"><img src="<?php echo $loading_image; ?>" alt="" /></div><?php } else{ ?><div class="ajax_loader_html"></div><?php } ?></div></div>
	<?php } ?>
	<?php 
		$enable_side_area = "yes";
		if (isset($qode_options_elision['enable_side_area'])){ if($qode_options_elision['enable_side_area'] == "no") { $enable_side_area = "no"; }};
	?>
	<?php if($enable_side_area != "no") { ?>
		<section class="side_menu right">
			<div class="side_menu_title">
				<?php if(isset($qode_options_elision['side_area_title']) && $qode_options_elision['side_area_title'] != "") { echo '<h4>'.$qode_options_elision['side_area_title'].'</h4>'; } ?>
			</div>
			<?php dynamic_sidebar('sidearea'); ?>
		</section>
	<?php } ?>
	<div class="wrapper">
	<div class="wrapper_inner">
	<!-- Google Analytics start -->
	<?php if (isset($qode_options_elision['google_analytics_code'])){
				if($qode_options_elision['google_analytics_code'] != "") { 
	?>
		<script>
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', '<?php echo $qode_options_elision['google_analytics_code']; ?>']);
			_gaq.push(['_trackPageview']);

			(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script>
	<?php }
		}
	?>
	<!-- Google Analytics end -->
	
<?php
	$header_in_grid = true;
	if(isset($qode_options_elision['header_in_grid'])){if ($qode_options_elision['header_in_grid'] == "no") $header_in_grid = false;}
	
	$menu_in_center = false;
	if(isset($qode_options_elision['menu_in_center'])){if ($qode_options_elision['menu_in_center'] == "yes") $menu_in_center = true;}
	
	$centered_logo = false;
	if (isset($qode_options_elision['center_logo_image'])){ if($qode_options_elision['center_logo_image'] == "yes") { $centered_logo = true; }};

	$display_header_top = "yes";
	if(isset($qode_options_elision['header_top_area'])){
		$display_header_top = $qode_options_elision['header_top_area'];
	}
	if (!empty($_SESSION['qode_elision_header_top'])){
		$display_header_top = $_SESSION['qode_elision_header_top'];
	}

	if (!empty($_SESSION['qode_header_top'])) {
		if ($_SESSION['qode_header_top'] == "no")
			$header_top_area_scroll = "no";
		if ($_SESSION['qode_header_top'] == "yes")
			$header_top_area_scroll = "yes";
	}

	global $wp_query;
	$id = $wp_query->get_queried_object_id();
	$is_woocommerce=false;
	if(function_exists("is_woocommerce")){
		$is_woocommerce = is_woocommerce();
		if($is_woocommerce){
			$id = get_option('woocommerce_shop_page_id');
		}
	}
	
	$header_style = "";
	if(get_post_meta($id, "qode_header-style", true) != ""){
		$header_style = get_post_meta($id, "qode_header-style", true);
	}else if(isset($qode_options_elision['header_style'])){
		$header_style = $qode_options_elision['header_style'];
	}
	
	$header_color_transparency_per_page = "";
	if(get_post_meta($id, "qode_header_color_per_page", true) != ""){
		$header_color_transparency_per_page = get_post_meta($id, "qode_header_color_transparency_per_page", true);
	}
	
	$header_color_per_page = "";
	if(get_post_meta($id, "qode_header_color_per_page", true) != ""){
		if($header_color_transparency_per_page != ""){
			$header_background_color = hex2rgb(get_post_meta($id, "qode_header_color_per_page", true));
			$header_color_per_page = " style='background-color:rgba(" . $header_background_color[0] . ", " . $header_background_color[1] . ", " . $header_background_color[2] . ", " . $header_color_transparency_per_page . ")'";
		}else{
			$header_color_per_page = " style='background-color:" . get_post_meta($id, "qode_header_color_per_page", true) . "'";
		}
	}
	
	$header_sticky = true;
	if(isset($qode_options_elision['header_sticky']) && $qode_options_elision['header_sticky'] == "no"){
		$header_sticky = false;
	}
?>

<header class="<?php if($display_header_top == "yes"){ echo 'has_top'; }?> <?php if($centered_logo){ echo " centered_logo"; } ?> <?php if(!$header_sticky){ echo " no_sticky"; } ?>  <?php echo $header_style; ?>">
	<div class="header_inner clearfix">
	
	<?php if($display_header_top == "yes"){ ?>
		<div class="header_top clearfix">
			<?php if($header_in_grid){ ?>
				<div class="container">
					<div class="container_inner clearfix">
			<?php } ?>
					<div class="left">
						<div class="inner">
						<?php	
							dynamic_sidebar('header_left'); 
						?>
						</div>
					</div>
					<div class="right">
						<div class="inner">
						<?php	
							dynamic_sidebar('header_right'); 
						?>
						</div>
					</div>
				<?php if($header_in_grid){ ?>
					</div>
				</div>
			<?php } ?>
		</div>
	<?php } ?>
	<div class="header_bottom clearfix" <?php echo $header_color_per_page; ?>>
		<?php if($header_in_grid){ ?>
				<div class="container">
					<div class="container_inner clearfix">
			<?php } ?>
					<div class="header_inner_left">
						<div class="mobile_menu_button"><span><i class="fa fa-bars"></i></span></div>
						<div class="logo_wrapper">
							<?php
							if (isset($qode_options_elision['logo_image']) && $qode_options_elision['logo_image'] != ""){ $logo_image = $qode_options_elision['logo_image'];}else( $logo_image =  get_template_directory_uri().'/img/logo.png' );
							if (isset($qode_options_elision['logo_image_dark']) && $qode_options_elision['logo_image_dark'] != ""){ $logo_image_dark = $qode_options_elision['logo_image_dark'];}else( $logo_image_dark =  get_template_directory_uri().'/img/logo_black.png' );
							if (isset($qode_options_elision['logo_image_sticky']) && $qode_options_elision['logo_image_sticky'] != ""){ $logo_image_sticky = $qode_options_elision['logo_image_sticky'];}else( $logo_image_sticky =  get_template_directory_uri().'/img/logo_black.png' );
							?>
							<div class="q_logo"><a href="<?php echo home_url(); ?>/"><img class="normal" src="<?php echo $logo_image; ?>" alt="Logo"/><img class="dark" src="<?php echo $logo_image_dark; ?>" alt="Logo"/><img class="sticky" src="<?php echo $logo_image_sticky; ?>" alt="Logo"/></a></div>
							
						</div>
					</div>
					<?php if(!$centered_logo) { ?>
						<div class="header_inner_right">
								<?php
								dynamic_sidebar( 'woocommerce_dropdown_cart' );
								?>
								<div class="side_menu_button_wrapper right"><div class="side_menu_button"><?php if($enable_side_area != "no"){ ?><a href="javascript:void(0)"><i class="fa fa-bars"></i></a><?php } ?></div></div>
						</div>
					<?php } ?>
					<nav class="main_menu drop_down <?php if(!$menu_in_center){ echo 'right';} ?>">
					<?php
						
						wp_nav_menu( array( 'theme_location' => 'top-navigation' , 
																'container'  => '', 
																'container_class' => '', 
																'menu_class' => '', 
																'menu_id' => '',
																'fallback_cb' => 'top_navigation_fallback',
																'link_before' => '<span>',
																'link_after' => '</span>',
																'walker' => new qode_type1_walker_nav_menu()
					 ));
					?>
					</nav>
					<?php if($centered_logo) { ?>
						<div class="header_inner_right">
							<?php
							dynamic_sidebar( 'woocommerce_dropdown_cart' );
							?>
								<div class="side_menu_button_wrapper right"><div class="side_menu_button"><?php if($enable_side_area != "no"){ ?><a href="javascript:void(0)"><i class="fa fa-bars"></i></a><?php } ?></div></div>
						</div>
					<?php } ?>
					<nav class="mobile_menu">
						<?php			
							wp_nav_menu( array( 'theme_location' => 'top-navigation' , 
																	'container'  => '', 
																	'container_class' => '', 
																	'menu_class' => '', 
																	'menu_id' => '',
																	'fallback_cb' => 'top_navigation_fallback',
																	'link_before' => '<span>',
																	'link_after' => '</span>',
																	'walker' => new qode_type2_walker_nav_menu()
						 ));
						?>
					</nav>
			<?php if($header_in_grid){ ?>
					</div>
				</div>
			<?php } ?>
	</div>
	</div>
</header>
	<div class="content">
<?php 
$animation = get_post_meta($id, "qode_show-animation", true);
if (!empty($_SESSION['qode_animation']) && $animation == "")
	$animation = $_SESSION['qode_animation'];

?>
			<?php if($qode_options_elision['page_transitions'] == "1" || $qode_options_elision['page_transitions'] == "2" || $qode_options_elision['page_transitions'] == "3" || $qode_options_elision['page_transitions'] == "4" || ($animation == "updown") || ($animation == "fade") || ($animation == "updown_fade") || ($animation == "leftright")){ ?>
				<div class="meta">				
					<?php if($seo_title){ ?>
						<div class="seo_title"><?php bloginfo('name'); ?> | <?php echo $seo_title; ?></div>
					<?php } else{ ?>
						<div class="seo_title"><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></div>
					<?php } ?>
					<?php if($seo_description){ ?>
						<div class="seo_description"><?php echo $seo_description; ?></div>
					<?php } else if($qode_options_elision['meta_description']){?>
						<div class="seo_description"><?php echo $qode_options_elision['meta_description']; ?></div>
					<?php } ?>
					<?php if($seo_keywords){ ?>
						<div class="seo_keywords"><?php echo $seo_keywords; ?></div>
					<?php }else if($qode_options_elision['meta_keywords']){?>
						<div class="seo_keywords"><?php echo $qode_options_elision['meta_keywords']; ?></div>
					<?php }?>
					<span id="qode_page_id"><?php echo $wp_query->get_queried_object_id(); ?></span>
					<div class="body_classes"><?php echo implode( ',', get_body_class()); ?></div>
				</div>
			<?php } ?>
			<div class="content_inner <?php echo $animation;?> ">
				
			