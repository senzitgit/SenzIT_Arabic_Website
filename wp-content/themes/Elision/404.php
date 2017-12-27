<?php 
global $qode_options_elision; 

$responsive_title_image = "";
$fixed_title_image = "";
$title_image = "";
$title_height = "";
$title_background_color = "";

if(isset($qode_options_elision['responsive_title_image'])){
	$responsive_title_image = $qode_options_elision['responsive_title_image'];
}

if(isset($qode_options_elision['fixed_title_image'])){
	$fixed_title_image = $qode_options_elision['fixed_title_image'];
}

if(isset($qode_options_elision['title_image'])){
	$title_image = $qode_options_elision['title_image'];
}

$title_image_height = "";
$title_image_width = "";
if(!empty($title_image)){
	$title_image_url_obj = parse_url($title_image);
  if (file_exists($_SERVER['DOCUMENT_ROOT'].$title_image_url_obj['path']))
		list($title_image_width, $title_image_height, $title_image_type, $title_image_attr) = getimagesize($_SERVER['DOCUMENT_ROOT'].$title_image_url_obj['path']);
}

if(isset($qode_options_elision['title_height'])){
	$title_height = $qode_options_elision['title_height'];
}

if(isset($qode_options_elision['title_background_color'])){
	$title_background_color = $qode_options_elision['title_background_color'];
}

$show_title_image = true;

$qode_page_title_style = "standard";
if(isset($qode_options_elision['title_style'])) {
	$qode_page_title_style = $qode_options_elision['title_style'];
} else {
	$qode_page_title_style = "standard";
}
$height_class = "";
if($qode_page_title_style == "title_on_bottom") {
	$height_class = " title_on_bottom";
}

?>

<?php get_header(); ?>

			<div class="title<?php echo $height_class; ?> <?php if($responsive_title_image == 'no' && $title_image != "" && ($fixed_title_image == "yes" || $fixed_title_image == "yes_zoom") && $show_title_image == true){ echo 'has_fixed_background '; if($fixed_title_image == "yes_zoom"){ echo 'zoom_out '; } } if($responsive_title_image == 'no' && $title_image != "" && $fixed_title_image == "no" && $show_title_image == true){ echo 'has_background'; } if($responsive_title_image == 'yes' && $show_title_image == true){ echo 'with_image'; } ?>" style="<?php if($responsive_title_image == 'no' && $title_image != "" && $show_title_image == true){ if($title_image_width != ''){ echo 'background-size:'.$title_image_width.'px auto;'; } echo 'background-image:url('.$title_image.');';  } if($title_height != ''){ echo 'height:'.$title_height.'px;'; } if($title_background_color != ''){ echo 'background-color:'.$title_background_color.';'; } ?>">
				<div class="image <?php if($responsive_title_image == 'yes' && $title_image != "" && $show_title_image == true){ echo "responive"; }else{ echo "not_responsive"; } ?>"><?php if($title_image != ""){ ?><img src="<?php echo $title_image; ?>" alt="&nbsp;" /> <?php } ?></div>
				<?php if(!get_post_meta($id, "qode_show-page-title-text", true)) { ?>
					<div class="title_holder">
						<div class="container">
							<div class="container_inner clearfix">
								<?php if($qode_page_title_style == "title_on_bottom") {  ?>
									<div class="title_on_bottom_wrap">
										<div class="title_on_bottom_holder">
											<div class="title_on_bottom_holder_inner">
												<h1><span><?php if($qode_options_elision['404_title'] != ""): echo $qode_options_elision['404_title']; else: ?> <?php _e('404', 'qode'); ?> <?php endif;?></span></h1>
											</div>
										</div>
									</div>
								<?php } else { ?>
									<h1><span><?php if($qode_options_elision['404_title'] != ""): echo $qode_options_elision['404_title']; else: ?> <?php _e('404', 'qode'); ?> <?php endif;?></span></h1>
									<h6><?php if(isset($qode_options_elision['404_subtitle']) && $qode_options_elision['404_subtitle'] != "") { ?> <?php echo $qode_options_elision['404_subtitle']; ?><?php } else { ?><?php _e('Page not found', 'qode'); ?><?php } ?></h6>
								<?php } ?>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>

			<div class="container">
				<div class="container_inner">
					<div class="page_not_found">
						<h2><?php if($qode_options_elision['404_text'] != ""): echo $qode_options_elision['404_text']; else: ?> <?php _e('The page you requested does not exist', 'qode'); ?> <?php endif;?></h2>
						<p><a class="qbutton with-shadow" href="<?php echo home_url(); ?>/"><?php if($qode_options_elision['404_backlabel'] != ""): echo $qode_options_elision['404_backlabel']; else: ?> <?php _e('Back to homepage', 'qode'); ?> <?php endif;?></a></p>
					</div>
				</div>
			</div>
			
<?php get_footer(); ?>	