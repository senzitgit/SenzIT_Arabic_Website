<?php get_header(); ?>
<?php 
global $wp_query;
$id = $wp_query->get_queried_object_id();

if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
else { $paged = 1; }

if(get_post_meta($id, "qode_show-sidebar", true) == ''){
		$sidebar = $qode_options_elision['category_blog_sidebar'];
}
else{
	$sidebar = get_post_meta($id, "qode_show-sidebar", true);
}
$title = "";
$subtitle = ""; 

if(get_post_meta($id, "qode_responsive-title-image", true) != ""){
 $responsive_title_image = get_post_meta($id, "qode_responsive-title-image", true);
}else{
	$responsive_title_image = $qode_options_elision['responsive_title_image'];
}

if(get_post_meta($id, "qode_fixed-title-image", true) != ""){
 $fixed_title_image = get_post_meta($id, "qode_fixed-title-image", true);
}else{
	$fixed_title_image = $qode_options_elision['fixed_title_image'];
}

if(get_post_meta($id, "qode_title-image", true) != ""){
 $title_image = get_post_meta($id, "qode_title-image", true);
}else{
	$title_image = $qode_options_elision['title_image'];
}
$title_image_height = "";
$title_image_width = "";
if(!empty($title_image)){
	$title_image_url_obj = parse_url($title_image);
  if (file_exists($_SERVER['DOCUMENT_ROOT'].$title_image_url_obj['path']))
		list($title_image_width, $title_image_height, $title_image_type, $title_image_attr) = getimagesize($_SERVER['DOCUMENT_ROOT'].$title_image_url_obj['path']);
}

$blog_hide_comments = "";
if (isset($qode_options_elision['blog_hide_comments'])) 
	$blog_hide_comments = $qode_options_elision['blog_hide_comments'];

if(get_post_meta($id, "qode_title-height", true) != ""){
 $title_height = get_post_meta($id, "qode_title-height", true);
}else{
	$title_height = $qode_options_elision['title_height'];
}

$title_background_color = '';
if(get_post_meta($id, "qode_page-title-background-color", true) != ""){
 $title_background_color = get_post_meta($id, "qode_page-title-background-color", true);
}else{
	$title_background_color = $qode_options_elision['title_background_color'];
}

$show_title_image = true;
if(get_post_meta($id, "qode_show-page-title-image", true)) {
	$show_title_image = false;
}

if(isset($qode_options_elision['blog_page_range']) && $qode_options_elision['blog_page_range'] != ""){
	$blog_page_range = $qode_options_elision['blog_page_range'];
} else{
	$blog_page_range = $wp_query->max_num_pages;
}

$qode_page_title_style = "standard";
if(get_post_meta($id, "qode_page_title_style", true) != ""){
	$qode_page_title_style = get_post_meta($id, "qode_page_title_style", true);
}else{
	if(isset($qode_options_elision['title_style'])) {
		$qode_page_title_style = $qode_options_elision['title_style'];
	} else {
		$qode_page_title_style = "standard";
	}
}
$height_class = "";
if($qode_page_title_style == "title_on_bottom") {
	$height_class = " title_on_bottom";
}

?>
	
	<?php
		if (is_home()){
			$title = get_option('blogname');
		}else{
			$title = get_the_title($id);
		}
		if(get_post_meta($id, "qode_page-subtitle", true)) { $subtitle = '/ '.get_post_meta($id, "qode_page-subtitle", true); }
	?>
	<?php if(get_post_meta($id, "qode_page_scroll_amount_for_sticky", true)) { ?>
		<script>
		var page_scroll_amount_for_sticky = <?php echo get_post_meta($id, "qode_page_scroll_amount_for_sticky", true); ?>;
		</script>
	<?php } ?>
	<?php if(!get_post_meta($id, "qode_show-page-title", true)) { ?>
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
											<h1<?php if(get_post_meta($id, "qode_page-title-color", true)) { ?> style="color:<?php echo get_post_meta($id, "qode_page-title-color", true) ?>" <?php } ?>><span><?php the_title(); ?></span></h1>
										</div>
									</div>
								</div>
							<?php } else { ?>
								<h1<?php if(get_post_meta($id, "qode_page-title-color", true)) { ?> style="color:<?php echo get_post_meta($id, "qode_page-title-color", true) ?>" <?php } ?>><span><?php the_title(); ?></span></h1>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	<?php } ?>
	<?php if($qode_options_elision['show_back_button'] == "yes") { ?>
		<a id='back_to_top' href='#'>
			<span class="fa-stack">
				<i class="fa fa-angle-up " style=""></i>
			</span>
		</a>
	<?php } ?>
	
	<?php
	$revslider = get_post_meta($id, "qode_revolution-slider", true);
	if (!empty($revslider)){ ?>
		<div class="q_slider"><div class="q_slider_inner">
		<?php echo do_shortcode($revslider); ?>
		</div></div>
	<?php
	}
	?>
	<div class="container">
		<div class="container_inner clearfix">
			<?php if(($sidebar == "default")||($sidebar == "")) : ?>
				<?php switch ($qode_options_elision['blog_style']) {
					case 1: ?>
						<div class="blog_holder blog_large_image">
							<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
									<?php 
										get_template_part('blog_large_image', 'loop');
									?>
							<?php endwhile; ?>
							<?php if($qode_options_elision['pagination'] != "0") : ?>
								<?php pagination($wp_query->max_num_pages, $blog_page_range, $paged); ?>
							<?php endif; ?>
							<?php else: ?>
								<div class="entry">                        
									<p><?php _e('No posts were found.', 'qode'); ?></p>    
								</div>
							<?php endif; ?>
						</div>
					<?php
					break;
					case 2: ?>
						<div class="blog_holder masonry">
							<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
								<?php 
									get_template_part('blog_masonry', 'loop');
								?>

							<?php endwhile; ?>
							<?php else: //If no posts are present ?>
								<div class="entry">                        
										<p><?php _e('No posts were found.', 'qode'); ?></p>    
								</div>
							<?php endif; ?>
						</div>
						<?php if($qode_options_elision['pagination'] != "0") : ?>
							<?php pagination($wp_query->max_num_pages, $blog_page_range, $paged); ?>
						<?php endif; ?>
					<?php
					break;
					case 3: ?>
						<div class="blog_holder">
							<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
									<?php 
										get_template_part('blog_large_image_whole_post', 'loop');
									?>
							
						
							<?php endwhile; ?>
							<?php if($qode_options_elision['pagination'] != "0") : ?>
								<?php pagination($wp_query->max_num_pages, $blog_page_range, $paged); ?>
							<?php endif; ?>
							<?php else: //If no posts are present ?>
									<div class="entry">                        
											<p><?php _e('No posts were found.', 'qode'); ?></p>    
									</div>
							<?php endif; ?>
						</div>	
					<?php	break;
						
				} ?>
			<?php elseif($sidebar == "1" || $sidebar == "2"): ?>
				<div class="<?php if($sidebar == "1"):?>two_columns_66_33<?php elseif($sidebar == "2") : ?>two_columns_75_25<?php endif; ?> background_color_sidebar grid2 clearfix">
					<div class="column1">
						<div class="column_inner">
							<?php switch ($qode_options_elision['blog_style']) {
								case 1: ?>
									<div class="blog_holder blog_large_image">
										<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
												<?php 
													get_template_part('blog_large_image', 'loop');
												?>
										<?php endwhile; ?>
										<?php if($qode_options_elision['pagination'] != "0") : ?>
											<?php pagination($wp_query->max_num_pages, $blog_page_range, $paged); ?>
										<?php endif; ?>
										<?php else: ?>
											<div class="entry">                        
												<p><?php _e('No posts were found.', 'qode'); ?></p>    
											</div>
										<?php endif; ?>
									</div>
								<?php
								break;
								case 2: ?>
									<div class="blog_holder masonry">
										<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
											<?php 
												get_template_part('blog_masonry', 'loop');
											?>

										<?php endwhile; ?>
										<?php else: //If no posts are present ?>
											<div class="entry">                        
													<p><?php _e('No posts were found.', 'qode'); ?></p>    
											</div>
										<?php endif; ?>
									</div>
									<?php if($qode_options_elision['pagination'] != "0") : ?>
										<?php pagination($wp_query->max_num_pages, $blog_page_range, $paged); ?>
									<?php endif; ?>
								<?php
								break;
								case 3: ?>
									<div class="blog_holder">
										<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
												<?php 
													get_template_part('blog_large_image_whole_post', 'loop');
												?>
										
									
										<?php endwhile; ?>
										<?php if($qode_options_elision['pagination'] != "0") : ?>
											<?php pagination($wp_query->max_num_pages, $blog_page_range, $paged); ?>
										<?php endif; ?>
										<?php else: //If no posts are present ?>
												<div class="entry">                        
														<p><?php _e('No posts were found.', 'qode'); ?></p>    
												</div>
										<?php endif; ?>
									</div>	
								<?php	break;
									
				} ?>
						</div>
					</div>
					<div class="column2">
						<?php get_sidebar(); ?>	
					</div>
				</div>
		<?php elseif($sidebar == "3" || $sidebar == "4"): ?>
				<div class="<?php if($sidebar == "3"):?>two_columns_33_66<?php elseif($sidebar == "4") : ?>two_columns_25_75<?php endif; ?> background_color_sidebar grid2 clearfix">
					<div class="column1">
					<?php get_sidebar(); ?>	
					</div>
					<div class="column2">
						<div class="column_inner">
							<?php switch ($qode_options_elision['blog_style']) {
								case 1: ?>
									<div class="blog_holder blog_large_image">
										<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
												<?php 
													get_template_part('blog_large_image', 'loop');
												?>
										<?php endwhile; ?>
										<?php if($qode_options_elision['pagination'] != "0") : ?>
											<?php pagination($wp_query->max_num_pages, $blog_page_range, $paged); ?>
										<?php endif; ?>
										<?php else: ?>
											<div class="entry">                        
												<p><?php _e('No posts were found.', 'qode'); ?></p>    
											</div>
										<?php endif; ?>
									</div>
								<?php
								break;
								case 2: ?>
									<div class="blog_holder masonry">
										<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
											<?php 
												get_template_part('blog_masonry', 'loop');
											?>

										<?php endwhile; ?>
										<?php else: //If no posts are present ?>
											<div class="entry">                        
													<p><?php _e('No posts were found.', 'qode'); ?></p>    
											</div>
										<?php endif; ?>
									</div>
									<?php if($qode_options_elision['pagination'] != "0") : ?>
										<?php pagination($wp_query->max_num_pages, $blog_page_range, $paged); ?>
									<?php endif; ?>
								<?php
								break;
								case 3: ?>
									<div class="blog_holder">
										<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
												<?php 
													get_template_part('blog_large_image_whole_post', 'loop');
												?>
										<?php endwhile; ?>
										<?php if($qode_options_elision['pagination'] != "0") : ?>
											<?php pagination($wp_query->max_num_pages, $blog_page_range, $paged); ?>
										<?php endif; ?>
										<?php else: ?>
											<div class="entry">                        
													<p><?php _e('No posts were found.', 'qode'); ?></p>    
											</div>
										<?php endif; ?>
									</div>	
								<?php	break;
									
							} ?>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
<?php get_footer(); ?>