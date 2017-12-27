<?php 
global $qode_options_elision;
$blog_hide_comments = "";
if (isset($qode_options_elision['blog_hide_comments'])) {
	$blog_hide_comments = $qode_options_elision['blog_hide_comments'];
}
$qode_like = "on";
if (isset($qode_options_elision['qode_like'])) {
	$qode_like = $qode_options_elision['qode_like'];
}
?>
<?php
$_post_format = get_post_format();
?>
<?php
	switch ($_post_format) {
		case "video":
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_info">
				<div class="inner">
					<div class="post_date">
						<span class="date"><?php the_time('d'); ?></span>
						<span class="month"><?php the_time('F'); ?></span>
					</div>
					<?php if( $qode_like == "on" ) { ?>
						<div class="blog_like">
							<?php if( function_exists('qode_like') ) qode_like(); ?>
						</div>
					<?php } ?>
					<?php echo do_shortcode('[social_share]'); ?>
				</div>
			</div>
			<div class="post_content_holder">
				<div class="post_image">
					<?php $_video_type = get_post_meta(get_the_ID(), "video_format_choose", true);?>
					<?php if($_video_type == "youtube") { ?>
						<iframe  src="http://www.youtube.com/embed/<?php echo get_post_meta(get_the_ID(), "video_format_link", true);  ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>
					<?php } elseif ($_video_type == "vimeo"){ ?>
						<iframe src="http://player.vimeo.com/video/<?php echo get_post_meta(get_the_ID(), "video_format_link", true);  ?>?title=0&amp;byline=0&amp;portrait=0" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
					<?php } ?>
				</div>
				<div class="post_text">
					<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					<div class="post_description">
						<a class="post_author" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" target="_self"><?php the_author_meta('display_name'); ?></a>
						<?php echo '&nbsp;&nbsp;|&nbsp;&nbsp;  '; ?><?php the_category(', '); ?>
						<?php if($blog_hide_comments != "yes"){ ?><?php echo '&nbsp;&nbsp;|&nbsp;&nbsp;  '; ?><a class="post_comments" href="<?php comments_link(); ?>" target="_self"><?php comments_number( __('No comment','qode'), '1 '.__('Comment','qode'), '% '.__('Comments','qode') ); ?></a><?php } ?>
					</div>	
					<?php qode_excerpt(); ?>
					<a href="<?php the_permalink(); ?>" class="qbutton tiny"><?php _e('Read More','qode'); ?></a>
				</div>
			</div>
		</article>
<?php
		break;
		case "audio":
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_info">
				<div class="inner">
					<div class="post_date">
						<span class="date"><?php the_time('d'); ?></span>
						<span class="month"><?php the_time('F'); ?></span>
					</div>
					<?php if( $qode_like == "on" ) { ?>
						<div class="blog_like">
							<?php if( function_exists('qode_like') ) qode_like(); ?>
						</div>
					<?php } ?>
					<?php echo do_shortcode('[social_share]'); ?>
				</div>
			</div>
			<div class="post_content_holder">
				<div class="post_image">
					<audio src="<?php echo get_post_meta(get_the_ID(), "audio_link", true) ?>" controls="controls">
						<?php _e("Your browser don't support audio player","qode"); ?>
					</audio>
				</div>
				<div class="post_text">
					<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					<div class="post_description">
						<a class="post_author" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" target="_self"><?php the_author_meta('display_name'); ?></a>
						<?php echo '&nbsp;&nbsp;|&nbsp;&nbsp;  '; ?><?php the_category(', '); ?>
						<?php if($blog_hide_comments != "yes"){ ?><?php echo '&nbsp;&nbsp;|&nbsp;&nbsp;  '; ?><a class="post_comments" href="<?php comments_link(); ?>" target="_self"><?php comments_number( __('No comment','qode'), '1 '.__('Comment','qode'), '% '.__('Comments','qode') ); ?></a><?php } ?>
					</div>	
					<?php qode_excerpt(); ?>
					<a href="<?php the_permalink(); ?>" class="qbutton tiny"><?php _e('Read More','qode'); ?></a>
				</div>
			</div>
		</article>
<?php
		break;
		case "link":
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_info">
				<div class="inner">
					<div class="post_date">
						<span class="date"><?php the_time('d'); ?></span>
						<span class="month"><?php the_time('F'); ?></span>
					</div>
					<?php if( $qode_like == "on" ) { ?>
						<div class="blog_like">
							<?php if( function_exists('qode_like') ) qode_like(); ?>
						</div>
					<?php } ?>
					<?php echo do_shortcode('[social_share]'); ?>
				</div>
			</div>
			<div class="post_content_holder">
				<div class="post_text">
					<div class="post_text_holder">
						<i class="link_mark fa fa-link pull-left"></i>
						<div class="post_title">
							<h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
						</div>
					</div>	
				</div>
			</div>
		</article>
<?php
		break;
		case "gallery":
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_info">
				<div class="inner">
					<div class="post_date">
						<span class="date"><?php the_time('d'); ?></span>
						<span class="month"><?php the_time('F'); ?></span>
					</div>
					<?php if( $qode_like == "on" ) { ?>
						<div class="blog_like">
							<?php if( function_exists('qode_like') ) qode_like(); ?>
						</div>
					<?php } ?>
					<?php echo do_shortcode('[social_share]'); ?>
				</div>
			</div>
			<div class="post_content_holder">
				<div class="post_image">
					<div class="flexslider">
						<ul class="slides">
							<?php
								$post_content = get_the_content();
								preg_match('/\[gallery.*ids=.(.*).\]/', $post_content, $ids);
								$array_id = explode(",", $ids[1]);
								
								foreach($array_id as $img_id){ ?>
									<li><a href="<?php the_permalink(); ?>"><?php echo wp_get_attachment_image( $img_id, 'full' ); ?></a></li>
								<?php } ?>
						</ul>
					</div>
				</div>
				<div class="post_content_holder">
					<div class="post_text">
						<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						<div class="post_description">
							<a class="post_author" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" target="_self"><?php the_author_meta('display_name'); ?></a>
							<?php echo '&nbsp;&nbsp;|&nbsp;&nbsp;  '; ?><?php the_category(', '); ?>
							<?php if($blog_hide_comments != "yes"){ ?><?php echo '&nbsp;&nbsp;|&nbsp;&nbsp;  '; ?><a class="post_comments" href="<?php comments_link(); ?>" target="_self"><?php comments_number( __('No comment','qode'), '1 '.__('Comment','qode'), '% '.__('Comments','qode') ); ?></a><?php } ?>
						</div>	
						<?php qode_excerpt(); ?>
						<a href="<?php the_permalink(); ?>" class="qbutton tiny"><?php _e('Read More','qode'); ?></a>
					</div>
				</div>
			</div>
		</article>
<?php
		break;
		case "quote":
?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="post_info">
					<div class="inner">
						<div class="post_date">
							<span class="date"><?php the_time('d'); ?></span>
							<span class="month"><?php the_time('F'); ?></span>
						</div>
						<?php if( $qode_like == "on" ) { ?>
							<div class="blog_like">
								<?php if( function_exists('qode_like') ) qode_like(); ?>
							</div>
						<?php } ?>
						<?php echo do_shortcode('[social_share]'); ?>
					</div>
				</div>
				<div class="post_content_holder">
					<div class="post_text">
						<div class="post_text_holder">	
							<i class="qoute_mark fa fa-quote-right pull-left"></i>
							<div class="post_title">
								<h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo get_post_meta(get_the_ID(), "quote_format", true); ?></a></h3>
								<span class="quote_author">&mdash; <?php the_title(); ?></span>
							</div>
						</div>	
					</div>
				</div>
			</article>
<?php
		break;
		default:
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_info">
				<div class="inner">
					<div class="post_date">
						<span class="date"><?php the_time('d'); ?></span>
						<span class="month"><?php the_time('F'); ?></span>
					</div>
					<?php if( $qode_like == "on" ) { ?>
						<div class="blog_like">
							<?php if( function_exists('qode_like') ) qode_like(); ?>
						</div>
					<?php } ?>
					<?php echo do_shortcode('[social_share]'); ?>
				</div>
			</div>
			<div class="post_content_holder">
				<?php if ( has_post_thumbnail() ) { ?>
					<div class="post_image">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php the_post_thumbnail('full'); ?>
						</a>
					</div>
				<?php } ?>
				<div class="post_text">
					<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					<div class="post_description">
						<a class="post_author" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" target="_self"><?php the_author_meta('display_name'); ?></a>
						<?php echo '&nbsp;&nbsp;|&nbsp;&nbsp;  '; ?><?php the_category(', '); ?>
						<?php if($blog_hide_comments != "yes"){ ?><?php echo '&nbsp;&nbsp;|&nbsp;&nbsp;  '; ?><a class="post_comments" href="<?php comments_link(); ?>" target="_self"><?php comments_number( __('No comment','qode'), '1 '.__('Comment','qode'), '% '.__('Comments','qode') ); ?></a><?php } ?>
					</div>	
					<?php qode_excerpt(); ?>
					<a href="<?php the_permalink(); ?>" class="qbutton tiny"><?php _e('Read More','qode'); ?></a>
				</div>
			</div>
		</article>
<?php
}
?>		

