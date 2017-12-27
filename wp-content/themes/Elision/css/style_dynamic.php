<?php

$root = dirname(dirname(dirname(dirname(dirname(__FILE__)))));
if ( file_exists( $root.'/wp-load.php' ) ) {
    require_once( $root.'/wp-load.php' );
} elseif ( file_exists( $root.'/wp-config.php' ) ) {
    require_once( $root.'/wp-config.php' );
}
header("Content-type: text/css; charset=utf-8");
?>
<?php if (!empty($qode_options_elision['selection_color'])) { ?>
/* Webkit */
::selection {
    background: <?php echo $qode_options_elision['selection_color'];  ?>;
}
<?php } ?>
<?php if (!empty($qode_options_elision['selection_color'])) { ?>
/* Gecko/Mozilla */
::-moz-selection {
    background: <?php echo $qode_options_elision['selection_color'];  ?>;
}
<?php } ?>
<?php if (!empty($qode_options_elision['first_color'])) { ?>
.title .title_on_bottom_wrap .title_on_bottom_holder .title_on_bottom_holder_inner,
.q_progress_bar .progress_content,
.q_progress_bars_vertical .progress_content_outer .progress_content,
.qbutton,
.load_more a,
#submit_comment,
.drop_down .wide .second ul li .qbutton,
.drop_down .wide .second ul li ul li .qbutton,
.portfolio_gallery a .gallery_text_holder,
.filter_holder ul li.active span,
.filter_holder ul li:hover span,
.q_tabs .tabs-nav li.active a,
.q_tabs .tabs-nav li a:hover,
.q_accordion_holder.accordion .ui-accordion-header.ui-state-hover .accordion_mark,
.highlight,
.testimonials .testimonial_nav li.active a,
.gallery_holder ul li .gallery_hover,
.q_progress_bars_icons_inner.square .bar.active .bar_noactive,
.q_progress_bars_icons_inner.square .bar.active .bar_active,
.social_share_dropdown ul li.share_title,
.widget.widget_search form input[type="submit"]:hover,
.widget .tagcloud a,
.q_steps_holder .circle_small span,
.vc_text_separator.full div,
.mejs-controls .mejs-time-rail .mejs-time-current,
.mejs-controls .mejs-time-rail .mejs-time-handle,
.mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current,
.q_pie_graf_legend ul li .color_holder,
.q_line_graf_legend ul li .color_holder,
.circle_item .circle:hover,
.single_tags a,
.pagination ul li span,
.pagination ul li a:hover,
.portfolio_navigation .portfolio_prev a:hover,
.portfolio_navigation .portfolio_next a:hover,
.single_links_pages span,
.single_links_pages a:hover span,
.q_box_holder.with_icon,
.title .title_on_bottom_wrap.show_title_on_bottom .title_on_bottom_holder .title_on_bottom_holder_inner,
.shopping_cart_header .header_cart span,
.woocommerce div.message, 
.woocommerce .woocommerce-message, 
.woocommerce .woocommerce-error,
.woocommerce .woocommerce-info,
.woocommerce .button,
.woocommerce-page .button,
.woocommerce-page input[type="submit"],
.woocommerce input[type="submit"],
.woocommerce ul.products li.product .added_to_cart,
.woocommerce .product .onsale,
.woocommerce .product .single-onsale,
.woocommerce-pagination ul.page-numbers li span.current,
.woocommerce-pagination ul.page-numbers li a:hover,
.woocommerce .quantity .minus:hover, 
.woocommerce #content .quantity .minus:hover, 
.woocommerce-page .quantity .minus:hover, 
.woocommerce-page #content .quantity .minus:hover,
.woocommerce .quantity .plus:hover, 
.woocommerce #content .quantity .plus:hover, 
.woocommerce-page .quantity .plus:hover, 
.woocommerce-page #content .quantity .plus:hover,
.woocommerce .quantity input[type="button"]:hover, 
.woocommerce #content .quantity input[type="button"]:hover, 
.woocommerce-page .quantity input[type="button"]:hover, 
.woocommerce-page #content .quantity input[type="button"]:hover,
.woocommerce .quantity input[type="button"]:active, 
.woocommerce #content .quantity input[type="button"]:active, 
.woocommerce-page .quantity input[type="button"]:active,
.woocommerce-page #content .quantity input[type="button"]:active,
.woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content, 
.woocommerce-page .widget_price_filter .price_slider_wrapper .ui-widget-content,
.woocommerce .widget_price_filter .ui-slider .ui-slider-handle, 
.woocommerce-page .widget_price_filter .ui-slider .ui-slider-handle{
	background-color: <?php echo $qode_options_elision['first_color'];?>;
}

<?php $gallery_f_hover = hex2rgb($qode_options_elision['first_color']); ?>

.portfolio_gallery a .gallery_text_holder,
.gallery_holder ul li .gallery_hover{
	background-color: rgba(<?php echo $gallery_f_hover[0]; ?>,<?php echo $gallery_f_hover[1]; ?>,<?php echo $gallery_f_hover[2]; ?>,0.9);
}

.q_icon_with_title.boxed .icon_holder .fa-stack:hover,
.q_social_icon_holder .fa-stack:hover{
	background-color: <?php echo $qode_options_elision['first_color'];?> !important;
}

a:hover,
p a:hover,
.box_image_holder .box_icon .fa-stack i.fa-stack-base,
.q_icon_list i,
.q_progress_bars_vertical .progress_number,
.q_counter_holder span.counter,
.box_holder_icon .fa-stack i,
.q_percentage_with_icon,
.portfolio_like a.liked i,
.portfolio_like a:hover i,
.portfolio_single .portfolio_like a.liked i,
.portfolio_single .portfolio_like a:hover i,
.q_tabs.boxed .tabs-nav li.active a,
.q_tabs.boxed .tabs-nav li a:hover,
.q_tabs.vertical .tabs-nav li.active a,
.q_tabs.vertical .tabs-nav li a:hover,
.q_accordion_holder.accordion.with_icon .ui-accordion-header i,
.q_accordion_holder.accordion .ui-accordion-header:hover span.tab-title,
.testimonial_text_inner .testimonial_name .author_desc,
.q_message.with_icon > i,
.q_icon_with_title .icon_holder i,
.q_font_awsome_icon_square i,
.q_font_awsome_icon_stack i,
.q_icon_with_title .icon_with_title_link,
.q_font_awsome_icon i,
.q_progress_bars_icons_inner.normal .bar.active i,
.q_progress_bars_icons_inner .bar.active i.fa-circle,
.q_list.number.circle_number ul>li:before,
.q_list.number ul>li:before,
.blog_holder article .post_description a:hover,
.blog_holder article .post_description .post_author:hover,
.blog_holder article .post_description .post_comments:hover,
.blog_like a:hover i,
.blog_like a.liked i,
.blog_like a:hover span,
.social_share_dropdown ul li:hover .share_text,
.social_share_dropdown ul li :hover i,
#back_to_top:hover,
aside .widget #lang_sel ul ul a:hover,
aside .widget #lang_sel_click ul ul a:hover,
aside .widget #lang_sel_list li a.lang_sel_sel,
aside .widget #lang_sel_list li a:hover,
.portfolio_navigation .portfolio_button a:hover i,
.q_dropcap,
.woocommerce del,
.woocommerce-page del,
.woocommerce del .amount, .woocommerce-page del .amount,
.woocommerce .select2-results li.select2-highlighted,
.woocommerce-page .select2-results li.select2-highlighted,
.woocommerce-checkout .chzn-container .chzn-results li.active-result.highlighted,
.woocommerce div.product p[itemprop='price'] span.amount,
.woocommerce ul.tabs li a:hover,
.woocommerce ul.tabs li.active a,
.woocommerce div.cart-collaterals div.cart_totals table tr.total strong span.amount,
.woocommerce-page div.cart-collaterals div.cart_totals table tr.total strong span.amount,
.woocommerce div.cart-collaterals div.cart_totals table tr.total strong,
.woocommerce .checkout-opener-text a,
.woocommerce form.checkout table.shop_table tfoot tr.total th strong,
.woocommerce form.checkout table.shop_table tfoot tr.total td span.amount,
.woocommerce aside .widget ul.product-categories a:hover,
.woocommerce-page aside .widget ul.product-categories a:hover{
	color: <?php echo $qode_options_elision['first_color'];?>;
}

.q_icon_with_title.circle .icon_holder .fa-stack:hover i.fa-circle, 
.q_font_awsome_icon_stack:hover .fa-circle{
	color: <?php echo $qode_options_elision['first_color'];?> !important;
}

.ajax_loader_html,
.box_image_with_border:hover,
.q_progress_bars_icons_inner.square .bar.active .bar_noactive,
.q_progress_bars_icons_inner.square .bar.active .bar_active,
.portfolio_slider .flex-control-paging li a:hover,
.qode_carousels.gray .flex-control-paging li a:hover,
.testimonials .testimonial_nav li.active a,
.portfolio_slider .flex-control-paging li a.flex-active, 
.qode_carousels.gray .flex-control-paging li a.flex-active,
.widget #searchform.form_focus,
.q_call_to_action.with_border,
.woocommerce .widget_price_filter .ui-slider .ui-slider-handle, 
.woocommerce-page .widget_price_filter .ui-slider .ui-slider-handle{
	border-color: <?php echo $qode_options_elision['first_color'];?>;
}
<?php } ?>
<?php if (!empty($qode_options_elision['second_color'])) { ?>
.title,
.q_icon_list i,
.q_progress_bar .progress_content_outer,
.q_progress_bars_vertical .progress_content_outer,
.q_box_holder,
.box_holder_icon_inner.square .fa-stack,
.q_call_to_action,
.filter_holder ul li span,
.q_tabs .tabs-nav li a,
.q_accordion_holder.accordion.with_icon .ui-accordion-header,
.q_accordion_holder.accordion .ui-accordion-header .accordion_mark,
.q_dropcap.circle,
.q_dropcap.square,
.q_message,
.price_table_inner ul,
.q_icon_with_title.boxed .icon_holder .fa-stack,
.q_font_awsome_icon_square,
.q_progress_bars_icons_inner.square .bar .bar_noactive,
.q_progress_bars_icons_inner.square .bar .bar_active,
.q_list.number.circle_number ul>li:before,
.q_social_icon_holder .fa-stack,
.social_share_dropdown ul li,
.comment_holder .comment,
#respond textarea,
#respond input[type='text'],
.contact_form input[type='text'],
.contact_form  textarea,
.blog_holder.masonry article .post_text,
.widget.widget_search form input[type="submit"],
.header_top .searchform input[type="submit"],
.widget.widget_search form input[type="text"],
.header_top .searchform input[type="text"],
.mejs-mediaelement,
.circle_item .circle,
.qode_call_to_action.container,
aside .widget #lang_sel > ul > li a,
aside .widget #lang_sel_click > ul > li a,
.portfolio_navigation .portfolio_prev a,
.portfolio_navigation .portfolio_next a,
.single_links_pages a span{
	background-color: <?php echo $qode_options_elision['second_color'];?>;
}

.box_holder_icon i,
.box_holder_icon .fa-stack i.fa-circle,
.q_icon_with_title.circle .icon_holder .fa-stack i.fa-circle, 
.q_font_awsome_icon_stack .fa-circle,
.q_icon_with_title.boxed .icon_holder .fa-stack, 
.q_font_awsome_icon_square,
.q_progress_bars_icons_inner.normal .bar i,
.q_progress_bars_icons_inner .bar i.fa-circle,
.q_social_icon_holder .fa-stack i.fa-circle{
	color: <?php echo $qode_options_elision['second_color'];?>;
}

.q_icon_with_title.with_border_line .icon_text_inner{
	border-color: <?php echo $qode_options_elision['second_color'];?>;
}
<?php } ?>
<?php if (!empty($qode_options_elision['third_color'])) { ?>


.projects_holder.circle .mix .image .circle_hover,
.projects_holder article .hover_feature_holder_title,
.portfolio_slider .hover_feature_holder_title,
.q_accordion_holder.accordion.with_icon .ui-accordion-header.ui-state-active,
.social_share_dropdown ul,
.comment_holder #respond textarea,
.comment_holder #respond input[type='text'],
.flex-direction-nav a,
.portfolio_slides .portfolio_slider_hover_holder{
	background-color: <?php echo $qode_options_elision['third_color'];?>;
}
header.sticky .header_bottom{
	background-color: <?php echo $qode_options_elision['third_color'];?> !important;
}
<?php $portfolio_t_slide = hex2rgb($qode_options_elision['third_color']); ?>

.projects_holder.circle .mix .image .circle_hover,
.portfolio_slides .portfolio_slider_hover_holder{
	background-color: rgba(<?php echo $portfolio_t_slide[0]; ?>,<?php echo $portfolio_t_slide[1]; ?>,<?php echo $portfolio_t_slide[2]; ?>,0.8);
}

<?php $flex_t_direction = hex2rgb($qode_options_elision['third_color']); ?>

.flex-direction-nav a{
	background-color: rgba(<?php echo $flex_t_direction[0]; ?>,<?php echo $flex_t_direction[1]; ?>,<?php echo $flex_t_direction[2]; ?>,0.2);
}


.title .title_on_bottom_holder h1,
.q_progress_bar .progress_number_wrapper,
.qbutton,
.load_more a,
#submit_comment,
.qbutton:hover,
.load_more a:hover,
#submit_comment:hover,
.portfolio_gallery a .gallery_text_inner h4,
.filter_holder ul li.active span,
.filter_holder ul li:hover span,
.q_tabs .tabs-nav li.active a,
.q_tabs .tabs-nav li a:hover,
.highlight,
.gallery_holder ul li .gallery_hover i,
.flexslider.widget_flexslider h3,
.q_progress_bars_icons_inner .bar i,
.blog_holder article.format-quote .date_holder .date,
.blog_holder article.format-link .date_holder .date,
.blog_holder article.format-quote .date_holder .month,
.blog_holder article.format-link .date_holder .month,
.social_share_dropdown ul li.share_title,
.blog_holder article.format-link .post_text .post_description,
.blog_holder article.format-link .post_text .post_description a,
.blog_holder article.format-link .post_text .post_description .post_author,
.blog_holder article.format-link .post_text .post_social .blog_like a i,
.blog_holder article.format-link .post_text .post_social .blog_like a span,
.blog_holder article.format-link .post_text h3,
.blog_holder article.format-link .post_text h3 a,
.blog_holder article.format-quote .post_text .post_description,
.blog_holder article.format-quote .post_text .post_description a,
.blog_holder article.format-quote .post_text .post_description .post_author,
.blog_holder article.format-quote .post_text .post_social .blog_like a i,
.blog_holder article.format-quote .post_text .post_social .blog_like a span,
.blog_holder article.format-quote .post_text h3,
.blog_holder article.format-quote .post_text h3 a,
.blog_holder article.format-quote .post_text i.qoute_mark,
.blog_holder article.format-link .post_text i.link_mark,
.blog_holder article.format-quote .post_text .quote_author,
.blog_holder article.format-link .post_text .post_icons_holder a.post_comments i,
.blog_holder article.format-quote .post_text .post_icons_holder a.post_comments i,
.blog_holder article.format-link .post_text .post_icons_holder a.post_comments,
.blog_holder article.format-quote .post_text .post_icons_holder a.post_comments,
.blog_holder article.format-quote .social_share_title,
.blog_holder article.format-link .social_share_title,
.single_tags  a:hover,
.side_menu .side_menu_title h4,
.side_menu h5,
.side_menu .widget #searchform input[type="text"],
.footer_top .widget.widget_search form input[type="text"],
.widget .tagcloud a,
footer,
.footer_top h6,
.footer_top a,
.footer_top p,
.footer_top span,
.footer_top li,
.footer_top a:hover,
.footer_top .widget_recent_entries > ul > li > a,
.footer_top .widget_recent_comments > ul > li > a,
.footer_bottom p,
.footer_bottom span,
#back_to_top span,
.q_steps_holder .circle_small span,
.vc_text_separator.full div,
.me-cannotplay a,
.q_image_with_text_over .text p,
.q_image_with_text_over .caption,
.q_image_with_text_over .icon_holder,
.circle_item .circle:hover,
.circle_item .circle:hover a,
.flex-direction-nav a div i,
.header_top #lang_sel ul li ul li a:hover,
.header_top #lang_sel_click ul li ul li a:hover,
.header_top #lang_sel_list ul li a,
.header_top #lang_sel_list ul li a:visited,
footer #lang_sel_list.lang_sel_list_horizontal a:hover,
footer #lang_sel_list.lang_sel_list_vertical a:hover,
.side_menu #lang_sel_list.lang_sel_list_horizontal a:hover,
.side_menu #lang_sel_list.lang_sel_list_vertical a:hover,
#lang_sel_footer a:hover,
.single_tags a,
.projects_holder article a.lightbox i,
.projects_holder article a.preview i,
.projects_holder article .portfolio_like a,
.portfolio_slider a.lightbox i,
.portfolio_slider a.preview i,
.portfolio_slider .portfolio_like a,
.pagination ul li span,
.pagination ul li a:hover,
.pagination ul li.next a:hover i,
.pagination ul li.prev a:hover i,
.pagination ul li.last a:hover i,
.pagination ul li.first a:hover i,
.portfolio_navigation .portfolio_prev a:hover i,
.portfolio_navigation .portfolio_next a:hover i,
.single_links_pages span,
.single_links_pages a:hover span,
.side_menu a:hover{
	color: <?php echo $qode_options_elision['third_color'];?>;
}

.q_icon_with_title.circle .icon_holder .fa-stack:hover i:last-child,
.q_font_awsome_icon_stack:hover i:last-child,
.q_icon_with_title.boxed .icon_holder .fa-stack:hover i,
.q_social_icon_holder .fa-stack:hover i,
.header_top #lang_sel > ul > li > a,
.header_top #lang_sel_click > ul > li> a,
footer #lang_sel_list li a:hover,
footer #lang_sel a.lang_sel_sel,
footer #lang_sel a.lang_sel_sel:hover,
footer #lang_sel ul ul a:hover,
footer #lang_sel_click a.lang_sel_sel,
footer #lang_sel_click ul ul a:hover,
footer #lang_sel_click ul ul a:hover span,
footer #lang_sel_list a.lang_sel_sel,
footer #lang_sel_list ul ul a:hover,
footer #lang_sel_list ul ul a:hover span,
section.side_menu a.lang_sel_sel,
section.side_menu #lang_sel ul li a.lang_sel_sel,
section.side_menu #lang_sel_click ul li a.lang_sel_sel,
section.side_menu #lang_sel_list li a:hover,
section.side_menu #lang_sel ul ul a:hover,
section.side_menu #lang_sel_click ul ul a:hover,
section.side_menu #lang_sel_click ul ul a:hover span{
	color: <?php echo $qode_options_elision['third_color'];?> !important;
}

.q_image_with_text_over .icon_holder,
.qode_carousels .flex-control-paging li a:hover,
.qode_carousels .flex-control-paging li a.flex-active,
.projects_holder article a.lightbox i,
.projects_holder article a.preview i,
.projects_holder article .portfolio_like a,
.portfolio_slider a.lightbox i,
.portfolio_slider a.preview i,
.portfolio_slider .portfolio_like a{
	border-color: <?php echo $qode_options_elision['third_color'];?>;
}

<?php $image_with_text_t = hex2rgb($qode_options_elision['third_color']); ?>

.q_image_with_text_over .icon_holder{
	border-color: rgba(<?php echo $image_with_text_t[0]; ?>,<?php echo $image_with_text_t[1]; ?>,<?php echo $image_with_text_t[2]; ?>,0.6);
}
<?php } ?>
<?php if (!empty($qode_options_elision['fourth_color'])) { ?>
h1,h2,h3,h4,h5,h6,
a, p a,
.title h1,
.q_icon_list p,
.q_percentage,
.q_call_to_action,
.testimonial_text_inner .testimonial_name,
.price_table_inner ul li.table_title,
.price_in_table .value,
.price_in_table .price,
.price_in_table .mark,
.q_list.circle ul>li,
.q_list.number ul>li,
.q_social_icon_holder .fa-stack i,
.latest_post_text .post_social .date_holder .date,
.blog_holder article .post_info .date,
.blog_holder article .date_holder .date,
.comment_number_holder .comment_number,
.comment_holder .comment_number span,
.widget.widget_rss li a.rsswidget,
#wp-calendar caption,
.mejs-container .mejs-controls .mejs-time,
.mejs-container .mejs-controls .mejs-time span,
.mejs-controls .mejs-time-rail .mejs-time-float,
aside .widget #lang_sel > ul li a,
aside .widget #lang_sel ul ul a,
aside .widget #lang_sel_click > ul li a,
aside .widget #lang_sel_click ul ul a,
aside .widget #lang_sel_list li a,
.circle_item .circle{
	color: <?php echo $qode_options_elision['fourth_color'];?>;
}

.separator.small,
.projects_holder article span.text_holder,
.projects_holder article .hover_feature_holder.start_ph_animation,
.portfolio_slider .hover_feature_holder.start_ph_animation,
#back_to_top:hover span{
	background-color: <?php echo $qode_options_elision['fourth_color'];?>;
}

<?php $portfolio_f_span = hex2rgb($qode_options_elision['fourth_color']); ?>

.projects_holder article span.text_holder{
	background-color: rgba(<?php echo $portfolio_f_span[0]; ?>,<?php echo $portfolio_f_span[1]; ?>,<?php echo $portfolio_f_span[2]; ?>,0.35);
}

<?php $hover_f_bg = hex2rgb($qode_options_elision['fourth_color']); ?>

.projects_holder article .hover_feature_holder.start_ph_animation,
.portfolio_slider .hover_feature_holder.start_ph_animation{
	background-color: rgba(<?php echo $hover_f_bg[0]; ?>,<?php echo $hover_f_bg[1]; ?>,<?php echo $hover_f_bg[2]; ?>,0.4);
}

.header_top #lang_sel > ul > li > a:hover,
.header_top #lang_sel_click > ul > li> a:hover,
.header_top #lang_sel > ul > li:hover > a,
.header_top #lang_sel_click > ul > li:hover > a,
.header_top #lang_sel ul ul,
.header_top #lang_sel_click ul ul{
	background-color: <?php echo $qode_options_elision['fourth_color'];?> !important;
}

<?php $wpml_f_bg = hex2rgb($qode_options_elision['fourth_color']); ?>

.header_top #lang_sel > ul > li > a:hover,
.header_top #lang_sel_click > ul > li> a:hover,
.header_top #lang_sel > ul > li:hover > a,
.header_top #lang_sel_click > ul > li:hover > a,
.header_top #lang_sel ul ul, 
.header_top #lang_sel_click ul ul{
	background-color: rgba(<?php echo $wpml_f_bg[0]; ?>,<?php echo $wpml_f_bg[1]; ?>,<?php echo $wpml_f_bg[2]; ?>,0.8);
}
<?php } ?>
<?php if (!empty($qode_options_elision['background_color']) || !empty($qode_options_elision['text_color']) || !empty($qode_options_elision['text_fontsize']) || !empty($qode_options_elision['text_fontweight']) || $qode_options_elision['google_fonts'] != "-1") { ?>
body{
	<?php if($qode_options_elision['google_fonts'] != "-1"){ ?>
	<?php $font = str_replace('+', ' ', $qode_options_elision['google_fonts']); ?>
	font-family: <?php echo $font; ?>, sans-serif;
	<?php } ?>
	<?php if (!empty($qode_options_elision['text_color'])) { ?> color: <?php echo $qode_options_elision['text_color'];  ?>; <?php } ?>
	<?php if (!empty($qode_options_elision['text_fontsize'])) { ?> font-size: <?php echo $qode_options_elision['text_fontsize']; ?>px; <?php } ?>
	<?php if (!empty($qode_options_elision['text_fontweight'])) { ?>font-weight: <?php echo $qode_options_elision['text_fontweight'];  ?>;<?php } ?>	
}
<?php if (!empty($qode_options_elision['background_color'])) { ?> 
body,
.content,
.full_width,
.content .container{
	background-color:<?php echo $qode_options_elision['background_color'];  ?>; 
}
<?php } ?>
<?php } ?>
<?php if (!empty($qode_options_elision['background_color_box'])) { ?>
.wrapper{
	<?php if (!empty($qode_options_elision['background_color_box'])) { ?> background-color:<?php echo $qode_options_elision['background_color_box'];  ?>; <?php } ?>
}
<?php } ?>
<?php
$boxed = "no";
if (isset($qode_options_elision['boxed']))
	$boxed = $qode_options_elision['boxed'];
?>
<?php if($boxed == "yes"){ ?>
body.boxed .wrapper{
	<?php if (!empty($qode_options_elision['background_color_box'])) { ?> background-color:<?php echo $qode_options_elision['background_color_box'];  ?>; <?php } ?>
	
	<?php if($qode_options_elision['pattern_background_image'] != ""){  ?>
		background-image: url('<?php echo $qode_options_elision['pattern_background_image'] ?>');
		background-position: 0px 0px;
		background-repeat: repeat;
	<?php } ?>
	
	<?php if($qode_options_elision['background_image'] != ""){  ?>
		background-image: url('<?php echo $qode_options_elision['background_image'] ?>');
		background-attachment: fixed;
		background-position: center 0px;
		background-repeat: no-repeat;
	<?php } ?>
}
body.boxed .content{
	<?php if (!empty($qode_options_elision['background_color'])) { ?> background-color:<?php echo $qode_options_elision['background_color'];  ?>; <?php } ?>
}

body.boxed .content .container{
	background-color: <?php echo $qode_options_elision['background_color'];  ?>; 
}

body.boxed .content .container{
	background-color: transparent;
}

<?php } ?>
<?php if (!empty($qode_options_elision['highlight_color'])) { ?>
span.highlight {
	background-color: <?php echo $qode_options_elision['highlight_color'];  ?>;
}
<?php } ?>

<?php if (!empty($qode_options_elision['header_background_color']) || $qode_options_elision['header_background_transparency_initial'] != "") { 
	if(!empty($qode_options_elision['header_background_color'])){
		$bg_color = hex2rgb($qode_options_elision['header_background_color']);
	}else{
		$bg_color = hex2rgb('#ffffff');
	}
	if ($qode_options_elision['header_background_transparency_initial'] != "") {
		$bg_color_transparency = $qode_options_elision['header_background_transparency_initial'];
	}else{
		$bg_color_transparency = 0;
	}
?>
.header_bottom{
	background-color: rgba(<?php echo $bg_color[0]; ?>,<?php echo $bg_color[1]; ?>,<?php echo $bg_color[2]; ?>,<?php echo $bg_color_transparency; ?>);
}
<?php } ?>
<?php
if (!empty($qode_options_elision['header_background_color_scroll']) || $qode_options_elision['header_background_transparency_scroll'] != "") {
	
	if(!empty($qode_options_elision['header_background_color_scroll'])){
		$bg_color_scroll = hex2rgb($qode_options_elision['header_background_color_scroll']);
	}else{
		$bg_color_scroll = hex2rgb('#ffffff');
	}
	
	if ($qode_options_elision['header_background_transparency_scroll'] != "") {
		$bg_color_scroll_transparency = $qode_options_elision['header_background_transparency_scroll'];
	}else{
		$bg_color_scroll_transparency = 1;
	}
?>
header.sticky .header_bottom{
	background-color: rgba(<?php echo $bg_color_scroll[0]; ?>,<?php echo $bg_color_scroll[1]; ?>,<?php echo $bg_color_scroll[2]; ?>,<?php echo $bg_color_scroll_transparency; ?>) !important;
}
<?php } ?>
<?php if (!empty($qode_options_elision['header_top_background_color']) || $qode_options_elision['header_background_transparency_initial'] != "") { 
	if(!empty($qode_options_elision['header_top_background_color'])){
		$bg_color_top = hex2rgb($qode_options_elision['header_top_background_color']);
	}else{
		$bg_color_top = hex2rgb('#1C1C1C');
	}
	if ($qode_options_elision['header_background_transparency_initial'] != "") {
		$bg_color_transparency = $qode_options_elision['header_background_transparency_initial'];
	}else{
		$bg_color_transparency = 1;
	}
	
?>
.header_top{
	background-color: rgba(<?php echo $bg_color_top[0]; ?>,<?php echo $bg_color_top[1]; ?>,<?php echo $bg_color_top[2]; ?>,<?php echo $bg_color_transparency; ?>);
}
<?php } ?>
<?php
if (!empty($qode_options_elision['header_top_background_color']) || $qode_options_elision['header_background_transparency_scroll'] != "") {
	
	if(!empty($qode_options_elision['header_top_background_color'])){
		$bg_color_scroll_top = hex2rgb($qode_options_elision['header_top_background_color']);
	}else{
		$bg_color_scroll_top = hex2rgb('#000000');
	}
	
	if ($qode_options_elision['header_background_transparency_scroll'] != "") {
		$bg_color_scroll_transparency = $qode_options_elision['header_background_transparency_scroll'];
	}else{
		$bg_color_scroll_transparency = 0.7;
	}
?>
header.sticky .header_top{
	background-color: rgba(<?php echo $bg_color_scroll_top[0]; ?>,<?php echo $bg_color_scroll_top[1]; ?>,<?php echo $bg_color_scroll_top[2]; ?>,<?php echo $bg_color_scroll_transparency; ?>);
}
<?php } ?>

<?php 
	$display_header_top = "yes";
	if(isset($qode_options_elision['header_top_area'])){
		$display_header_top = $qode_options_elision['header_top_area'];
	}
	if (!empty($_SESSION['qode_elision_header_top'])){
		$display_header_top = $_SESSION['qode_elision_header_top'];
	}
	
	if($display_header_top == "no"){
		$margin_top_add = 0;
	}else{
		$margin_top_add = 30;
	}
?>

<?php if ($qode_options_elision['header_background_transparency_initial'] != "1") {?>

	<?php if ($qode_options_elision['center_logo_image'] != "yes") {?>

		.content{
			margin-top: <?php echo '-'.(91 + $margin_top_add); ?>px;
		}
	<?php } else { ?>
		<?php if(isset($qode_options_elision['logo_image'])){ 
			if (!empty($qode_options_elision['logo_image'])) {
				$logo_url_obj = parse_url($qode_options_elision['logo_image']); 
				list($width, $height, $type, $attr) = getimagesize($_SERVER['DOCUMENT_ROOT'].$logo_url_obj['path']);  
			} 
		}?>

		.content{
			margin-top: <?php echo '-'.($height + 20 + 91 + $margin_top_add); ?>px;
		}
	<?php } ?>
<?php } else { ?>
	.content{
		margin-top: 0px;
	}
<?php } ?>

<?php if (!empty($qode_options_elision['header_height'])) { ?>
.logo_wrapper,
.side_menu_button,
.shopping_cart_inner
{
	height: <?php echo $qode_options_elision['header_height'];  ?>px;
}

<?php if ($qode_options_elision['header_background_transparency_initial'] != "1") { ?>

.content{
	<?php if ($qode_options_elision['center_logo_image'] != "yes") {?>
	margin-top: <?php echo '-'.($qode_options_elision['header_height'] + $margin_top_add);  ?>px;
	<?php }else{ ?>
	margin-top: <?php echo '-'.($qode_options_elision['header_height'] + $margin_top_add + $height + 20);  ?>px;
	<?php } ?>
}
.drop_down .second{
	top: <?php echo $qode_options_elision['header_height'];  ?>px;
}
<?php } ?>

<?php } ?>

<?php if (!empty($qode_options_elision['header_height_scroll'])) { ?>
header.sticky .logo_wrapper,
header.sticky .side_menu_button,
header.sticky .shopping_cart_inner{
	height: <?php echo $qode_options_elision['header_height_scroll'];  ?>px;
}

header.sticky nav.main_menu ul li a {
	line-height: <?php echo $qode_options_elision['header_height_scroll'];  ?>px;
}

header.sticky .drop_down .second{
	top: <?php echo $qode_options_elision['header_height_scroll'];  ?>px;
}
<?php } ?>

<?php
$parallax_onoff = "on";
if (isset($qode_options_elision['parallax_onoff']))
	$parallax_onoff = $qode_options_elision['parallax_onoff'];
if ($parallax_onoff == "off"){
?>
	.touch .parallax section{
		height: auto !important;
		min-height: 300px;  
		background-position: center top !important;  
		background-attachment: scroll;
	}
		
	.touch	.parallax section.no_background{
		padding: 0px;
	}
<?php } ?>
<?php if (!empty($qode_options_elision['header_height'])) { ?>
nav.main_menu > ul > li > a{
	line-height: <?php echo $qode_options_elision['header_height'];  ?>px;
}
<?php } ?>
<?php if (!empty($qode_options_elision['dropdown_background_color'])) { 
	$dropdown_bg_color_initial = hex2rgb($qode_options_elision['dropdown_background_color']);
	if (!empty($qode_options_elision['dropdown_background_transparency'])) {
		$dropdown_bg_transparency = $qode_options_elision['dropdown_background_transparency'];
	}else{
		$dropdown_bg_transparency = 0.8;
	}
?>
.drop_down .second .inner ul,
.drop_down .second .inner ul li ul,
nav.main_menu > ul > li:hover > a span,
header.sticky nav.main_menu > ul > li:hover > a span,
.shopping_cart_header .header_cart:hover, 
.shopping_cart_header:hover .header_cart,
.shopping_cart_dropdown
{
	background-color: <?php echo $qode_options_elision['dropdown_background_color'];  ?>;
	background-color: rgba(<?php echo $dropdown_bg_color_initial[0]; ?>,<?php echo $dropdown_bg_color_initial[1]; ?>,<?php echo $dropdown_bg_color_initial[2]; ?>,<?php echo $dropdown_bg_transparency; ?>);
}
<?php } else {
	$dropdown_bg_color_initial = hex2rgb("#000");
	if (!empty($qode_options_elision['dropdown_background_transparency'])) {
		$dropdown_bg_transparency = $qode_options_elision['dropdown_background_transparency'];
	}else{
		$dropdown_bg_transparency = 0.8;
	}
?>
.drop_down .second .inner ul,
.drop_down .second .inner ul li ul,
nav.main_menu > ul > li:hover > a span,
header.sticky nav.main_menu > ul > li:hover > a span,
.shopping_cart_header .header_cart:hover, 
.shopping_cart_header:hover .header_cart,
.shopping_cart_dropdown
{
	background-color: rgba(<?php echo $dropdown_bg_color_initial[0]; ?>,<?php echo $dropdown_bg_color_initial[1]; ?>,<?php echo $dropdown_bg_color_initial[2]; ?>,<?php echo $dropdown_bg_transparency; ?>);
}
<?php } ?>
<?php if (!empty($qode_options_elision['menu_color']) || !empty($qode_options_elision['menu_fontsize']) || !empty($qode_options_elision['menu_fontstyle']) || !empty($qode_options_elision['menu_fontweight']) || !empty($qode_options_elision['menu_letter_spacing']) || $qode_options_elision['menu_google_fonts'] != "-1") { ?>
nav.main_menu > ul > li > a{
	<?php if (!empty($qode_options_elision['menu_color'])) { ?> color: <?php echo $qode_options_elision['menu_color'];  ?>; <?php } ?>
	<?php if($qode_options_elision['menu_google_fonts'] != "-1"){ ?>
	font-family: <?php echo str_replace('+', ' ', $qode_options_elision['menu_google_fonts']); ?>, sans-serif;
	<?php } ?>
	<?php if (!empty($qode_options_elision['menu_fontsize'])) { ?> font-size: <?php echo $qode_options_elision['menu_fontsize'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_elision['menu_fontstyle'])) { ?> font-style: <?php echo $qode_options_elision['menu_fontstyle'];  ?>; <?php } ?>
	<?php if (!empty($qode_options_elision['menu_fontweight'])) { ?> font-weight: <?php echo $qode_options_elision['menu_fontweight'];  ?>; <?php } ?>
}

<?php if (!empty($qode_options_elision['menu_color'])) { ?>
.side_menu_button a,
.side_menu_button a:hover,
.shopping_cart_header .header_cart i{
	color: <?php echo $qode_options_elision['menu_color'];  ?>;
}
<?php } ?>

<?php } ?>
<?php if (!empty($qode_options_elision['menu_hovercolor'])) { ?>
nav.main_menu ul li:hover a,
nav.main_menu ul li.active a,
.shopping_cart_header .header_cart:hover i,
.shopping_cart_header:hover .header_cart i{
	color: <?php echo $qode_options_elision['menu_hovercolor'];  ?>;
}

<?php } ?>
<?php if(!empty($qode_options_elision['dropdown_color']) || !empty($qode_options_elision['dropdown_fontsize']) || !empty($qode_options_elision['dropdown_lineheight']) || !empty($qode_options_elision['dropdown_fontstyle']) || !empty($qode_options_elision['dropdown_fontweight']) || $qode_options_elision['dropdown_google_fonts'] != "-1"){ ?>
.drop_down .second .inner > ul > li > a,
.drop_down .second .inner > ul > li > h3,
.drop_down .wide .second .inner > ul > li > h3,
.drop_down .wide .second .inner > ul > li > a,
.drop_down .wide .second .inner > ul li.sub .flexslider ul li  h5 a,
.drop_down .wide .second .inner > ul li .flexslider ul li  h5 a,
.drop_down .wide .second .inner > ul li.sub .flexslider ul li  h5,
.drop_down .wide .second .inner > ul li .flexslider ul li  h5,
.shopping_cart_dropdown ul li a,
.shopping_cart_dropdown span.total,
.shopping_cart_dropdown span.total span{
	<?php if (!empty($qode_options_elision['dropdown_color'])) { ?> color: <?php echo $qode_options_elision['dropdown_color']; ?>; <?php } ?>
	<?php if($qode_options_elision['dropdown_google_fonts'] != "-1"){ ?>
	font-family: <?php echo str_replace('+', ' ', $qode_options_elision['dropdown_google_fonts']) ?>, sans-serif !important;
	<?php } ?>
	<?php if (!empty($qode_options_elision['dropdown_fontsize'])) { ?> font-size: <?php echo $qode_options_elision['dropdown_fontsize'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_elision['dropdown_lineheight'])) { ?> line-height: <?php echo $qode_options_elision['dropdown_lineheight'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_elision['dropdown_fontstyle'])) { ?> font-style: <?php echo $qode_options_elision['dropdown_fontstyle'];  ?>;  <?php } ?>
	<?php if (!empty($qode_options_elision['dropdown_fontweight'])) { ?>font-weight: <?php echo $qode_options_elision['dropdown_fontweight'];  ?>; <?php } ?>
}

<?php } ?>
<?php if (!empty($qode_options_elision['dropdown_hovercolor'])) { ?>
.drop_down .second .inner > ul > li:hover > a,
.shopping_cart_dropdown ul li a:hover{
	color: <?php echo $qode_options_elision['dropdown_hovercolor'];  ?> !important;
}
<?php } ?>
<?php if(!empty($qode_options_elision['dropdown_color_thirdlvl']) || !empty($qode_options_elision['dropdown_fontsize_thirdlvl']) || !empty($qode_options_elision['dropdown_lineheight_thirdlvl']) || !empty($qode_options_elision['dropdown_fontstyle_thirdlvl']) || !empty($qode_options_elision['dropdown_fontweight_thirdlvl']) || $qode_options_elision['dropdown_google_fonts_thirdlvl'] != "-1"){ ?>
.drop_down .wide .second .inner ul li.sub ul li a,
.drop_down .wide .second ul li ul li a,
.drop_down .second .inner ul li.sub ul li a,
.drop_down .wide .second ul li ul li a,
.drop_down .wide .second .inner ul li.sub .flexslider ul li .menu_recent_post,
.drop_down .wide .second .inner ul li .flexslider ul li .menu_recent_post a,
.drop_down .wide .second .inner ul li .flexslider ul li .menu_recent_post,
.drop_down .wide .second .inner ul li .flexslider ul li .menu_recent_post a,
.drop_down .wide.icons .second i
{
	<?php if (!empty($qode_options_elision['dropdown_color_thirdlvl'])) { ?> color: <?php echo $qode_options_elision['dropdown_color_thirdlvl'];  ?> !important;  <?php } ?>
	<?php if($qode_options_elision['dropdown_google_fonts_thirdlvl'] != "-1"){ ?>
	font-family: <?php echo str_replace('+', ' ', $qode_options_elision['dropdown_google_fonts_thirdlvl']) ?>, sans-serif !important;
	<?php } ?>
	<?php if (!empty($qode_options_elision['dropdown_fontsize_thirdlvl'])) { ?> font-size: <?php echo $qode_options_elision['dropdown_fontsize_thirdlvl'];  ?>px !important;  <?php } ?>
	<?php if (!empty($qode_options_elision['dropdown_lineheight_thirdlvl'])) { ?> line-height: <?php echo $qode_options_elision['dropdown_lineheight_thirdlvl'];  ?>px !important;  <?php } ?>
	<?php if (!empty($qode_options_elision['dropdown_fontstyle_thirdlvl'])) { ?> font-style: <?php echo $qode_options_elision['dropdown_fontstyle_thirdlvl'];  ?> !important;   <?php } ?>
	<?php if (!empty($qode_options_elision['dropdown_fontweight_thirdlvl'])) { ?> font-weight: <?php echo $qode_options_elision['dropdown_fontweight_thirdlvl'];  ?> !important;  <?php } ?>
}
<?php } ?>
<?php if (!empty($qode_options_elision['dropdown_hovercolor_thirdlvl'])) { ?>
.drop_down .second .inner ul li.sub ul li:hover a,
.drop_down .second .inner ul li ul li:hover a,
.drop_down .wide.icons .second a:hover i
{
	color: <?php echo $qode_options_elision['dropdown_hovercolor_thirdlvl'];  ?> !important;
}
<?php } ?>

<?php if(!empty($qode_options_elision['sticky_color']) || !empty($qode_options_elision['sticky_fontsize']) || !empty($qode_options_elision['sticky_lineheight']) || !empty($qode_options_elision['sticky_fontstyle']) || !empty($qode_options_elision['sticky_fontweight']) || $qode_options_elision['sticky_google_fonts'] != "-1"){ ?>
header.sticky nav.main_menu > ul > li > a, 
header.light.sticky nav.main_menu > ul > li > a, 
header.dark.sticky nav.main_menu > ul > li > a{
	<?php if (!empty($qode_options_elision['sticky_color'])) { ?> color: <?php echo $qode_options_elision['sticky_color']; ?>; <?php } ?>
	<?php if($qode_options_elision['sticky_google_fonts'] != "-1"){ ?>
	font-family: <?php echo str_replace('+', ' ', $qode_options_elision['sticky_google_fonts']) ?>, sans-serif !important;
	<?php } ?>
	<?php if (!empty($qode_options_elision['sticky_fontsize'])) { ?> font-size: <?php echo $qode_options_elision['sticky_fontsize'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_elision['sticky_lineheight'])) { ?> line-height: <?php echo $qode_options_elision['sticky_lineheight'];  ?>px !important; <?php } ?>
	<?php if (!empty($qode_options_elision['sticky_fontstyle'])) { ?> font-style: <?php echo $qode_options_elision['sticky_fontstyle'];  ?>;  <?php } ?>
	<?php if (!empty($qode_options_elision['sticky_fontweight'])) { ?>font-weight: <?php echo $qode_options_elision['sticky_fontweight'];  ?>; <?php } ?>
}

<?php if (!empty($qode_options_elision['sticky_color'])) { ?> 
header.sticky .side_menu_button a, header.sticky.light .side_menu_button a,
header.sticky .shopping_cart_header .header_cart i, header.sticky.light .shopping_cart_header .header_cart i{
	color: <?php echo $qode_options_elision['sticky_color']; ?>; 
}
<?php } ?>

<?php } ?>
<?php if (!empty($qode_options_elision['sticky_hovercolor'])) { ?>
header.sticky nav.main_menu > ul > li > a:hover, 
header.sticky nav.main_menu > ul > li:hover > a,
header.sticky nav.main_menu > ul > li.active > a,
.light.sticky nav.main_menu > ul > li > a:hover, 
.light.sticky nav.main_menu > ul > li.active > a, 
.dark.sticky nav.main_menu > ul > li > a:hover, 
.dark.sticky nav.main_menu > ul > li.active > a,
header.sticky .shopping_cart_header .header_cart:hover i,
header.sticky .shopping_cart_header:hover .header_cart i{
	color: <?php echo $qode_options_elision['sticky_hovercolor'];  ?> !important;
}
<?php } ?>

<?php if (!empty($qode_options_elision['mobile_color']) || !empty($qode_options_elision['mobile_fontsize']) || !empty($qode_options_elision['mobile_lineheight']) || !empty($qode_options_elision['mobile_fontstyle']) || !empty($qode_options_elision['mobile_fontweight']) || !empty($qode_options_elision['mobile_letter_spacing']) || $qode_options_elision['mobile_google_fonts'] != "-1") { ?>
nav.mobile_menu ul li a,
nav.mobile_menu ul li h3{
	<?php if (!empty($qode_options_elision['mobile_color'])) { ?> color: <?php echo $qode_options_elision['mobile_color'];  ?>; <?php } ?>
	<?php if($qode_options_elision['mobile_google_fonts'] != "-1"){ ?>
	font-family: <?php echo str_replace('+', ' ', $qode_options_elision['mobile_google_fonts']); ?>, sans-serif;
	<?php } ?>
	<?php if (!empty($qode_options_elision['mobile_fontsize'])) { ?> font-size: <?php echo $qode_options_elision['mobile_fontsize'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_elision['mobile_lineheight'])) { ?> line-height: <?php echo $qode_options_elision['mobile_lineheight'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_elision['mobile_fontstyle'])) { ?> font-style: <?php echo $qode_options_elision['mobile_fontstyle'];  ?>; <?php } ?>
	<?php if (!empty($qode_options_elision['mobile_fontweight'])) { ?> font-weight: <?php echo $qode_options_elision['mobile_fontweight'];  ?>; <?php } ?>
	<?php if(!empty($qode_options_elision['mobile_letter_spacing'])){ ?>
	letter-spacing: <?php echo $qode_options_elision['mobile_letter_spacing'];  ?>px;
	<?php } ?>
}

<?php if (!empty($qode_options_elision['mobile_color'])) { ?>
@media only screen and (max-width: 1000px){
	header .side_menu_button a:hover,
	header .side_menu_button a,
	header .mobile_menu_button span,
	header .shopping_cart_header .header_cart i,
	header .shopping_cart_header .header_cart:hover i,
	header .shopping_cart_header:hover .header_cart i,
	header.dark .side_menu_button a,
	header.dark .side_menu_button a:hover,
	header.light .side_menu_button a,
	header.light .side_menu_button a:hover,
	header.dark .mobile_menu_button span,
	header.dark .shopping_cart_header .header_cart i,
	header.dark .shopping_cart_header .header_cart:hover i,
	header.dark .shopping_cart_header:hover .header_cart i{
		color: <?php echo $qode_options_elision['mobile_color'];  ?>;
	}
}
<?php } ?>
<?php } ?>
<?php if (!empty($qode_options_elision['mobile_hovercolor'])) { ?>
nav.mobile_menu ul li a:hover,
nav.mobile_menu ul li.active > a,
nav.mobile_menu ul li.current-menu-item > a{
	color: <?php echo $qode_options_elision['mobile_hovercolor'];  ?>;
}
<?php } ?>
<?php if (!empty($qode_options_elision['mobile_separator_color'])) { ?>
	nav.mobile_menu ul li a,
	nav.mobile_menu ul li h3,
	nav.mobile_menu ul li ul li a,
	nav.mobile_menu ul li.open_sub > a:first-child{
		border-color: <?php echo $qode_options_elision['mobile_separator_color'];  ?>;
	}
<?php } ?>

<?php if (!empty($qode_options_elision['mobile_top_background_color'])) { ?>
	@media only screen and (max-width: 1000px){
		.header_top{
			background-color: <?php echo $qode_options_elision['mobile_top_background_color'];  ?> !important;
		}
	}
<?php } ?>

<?php if (!empty($qode_options_elision['mobile_bottom_background_color'])) { ?>
	@media only screen and (max-width: 1000px){
		.header_bottom,
		nav.mobile_menu{
			background-color: <?php echo $qode_options_elision['mobile_bottom_background_color'];  ?> !important;
		}
	}
<?php } ?>

<?php if (!empty($qode_options_elision['smooth_background_color'])) { ?>
#ascrail2000{
	background-color: <?php echo $qode_options_elision['smooth_background_color'];  ?>; 
}
<?php } ?>
<?php if (!empty($qode_options_elision['smooth_bar_color'])) { 
?>
#ascrail2000 div{
	background-color: <?php echo $qode_options_elision['smooth_bar_color'];  ?> !important;
}
<?php } ?>
<?php if (!empty($qode_options_elision['h1_color']) || !empty($qode_options_elision['h1_fontsize']) || !empty($qode_options_elision['h1_lineheight']) || !empty($qode_options_elision['h1_fontstyle']) || !empty($qode_options_elision['h1_fontweight']) || $qode_options_elision['h1_google_fonts'] != "-1") { ?>
h1{
	<?php if (!empty($qode_options_elision['h1_color'])) { ?>	color: <?php echo $qode_options_elision['h1_color'];  ?>; <?php } ?>
	<?php if($qode_options_elision['h1_google_fonts'] != "-1"){ ?>
	font-family: <?php echo str_replace('+', ' ', $qode_options_elision['h1_google_fonts']); ?>, sans-serif;
	<?php } ?>
	<?php if (!empty($qode_options_elision['h1_fontsize'])) { ?>font-size: <?php echo $qode_options_elision['h1_fontsize'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_elision['h1_lineheight'])) { ?>line-height: <?php echo $qode_options_elision['h1_lineheight'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_elision['h1_fontstyle'])) { ?>font-style: <?php echo $qode_options_elision['h1_fontstyle'];  ?>; <?php } ?>
	<?php if (!empty($qode_options_elision['h1_fontweight'])) { ?>font-weight: <?php echo $qode_options_elision['h1_fontweight'];  ?>; <?php } ?>
}
<?php } ?>
<?php if (!empty($qode_options_elision['page_title_color']) || !empty($qode_options_elision['page_title_fontsize']) || !empty($qode_options_elision['page_title_lineheight']) || !empty($qode_options_elision['page_title_fontstyle']) || !empty($qode_options_elision['page_title_fontweight']) || $qode_options_elision['page_title_position'] != "0" || $qode_options_elision['page_title_google_fonts'] != "-1") { ?>
.title h1{
	<?php if (!empty($qode_options_elision['page_title_color'])) { ?>color: <?php echo $qode_options_elision['page_title_color'];  ?>; <?php } ?>
	<?php if($qode_options_elision['page_title_google_fonts'] != "-1"){ ?>
	font-family: <?php echo str_replace('+', ' ', $qode_options_elision['page_title_google_fonts']); ?>, sans-serif;
	<?php } ?>
	<?php if (!empty($qode_options_elision['page_title_fontsize'])) { ?>font-size: <?php echo $qode_options_elision['page_title_fontsize'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_elision['page_title_lineheight'])) { ?>line-height: <?php echo $qode_options_elision['page_title_lineheight'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_elision['page_title_fontstyle'])) { ?>font-style: <?php echo $qode_options_elision['page_title_fontstyle'];  ?>; <?php } ?>
	<?php if (!empty($qode_options_elision['page_title_fontweight'])) { ?>font-weight: <?php echo $qode_options_elision['page_title_fontweight'];  ?>; <?php } ?>
	<?php if($qode_options_elision['page_title_position'] != "0"){ ?>
		text-align: <?php if($qode_options_elision['page_title_position'] == "1"){echo "left";} if($qode_options_elision['page_title_position'] == "2"){echo "center";} if($qode_options_elision['page_title_position'] == "3"){echo "right";}  ?>;
	<?php } ?>
}
<?php if($qode_options_elision['page_title_position'] != "0"){ ?>
.title .separator{
	text-align: <?php if($qode_options_elision['page_title_position'] == "1"){echo "left";} if($qode_options_elision['page_title_position'] == "2"){echo "center";} if($qode_options_elision['page_title_position'] == "3"){echo "right";}  ?>;
	<?php if($qode_options_elision['page_title_position'] == "1" || $qode_options_elision['page_title_position'] == "3"){?> 
		margin-left:0;
		margin-right:0;
		display: inline-block;
	<?php } ?>
}
<?php } ?>
<?php if($qode_options_elision['page_title_position'] != "0"){ ?>
.title h6,
.title
{
	text-align: <?php if($qode_options_elision['page_title_position'] == "1"){echo "left";} if($qode_options_elision['page_title_position'] == "2"){echo "center";} if($qode_options_elision['page_title_position'] == "3"){echo "right";}  ?>;
}
<?php } ?>
<?php } ?>
<?php if (!empty($qode_options_elision['h2_color']) || !empty($qode_options_elision['h2_fontsize']) || !empty($qode_options_elision['h2_lineheight']) || !empty($qode_options_elision['h2_fontstyle']) || !empty($qode_options_elision['h2_fontweight']) || $qode_options_elision['h2_google_fonts'] != "-1") { ?>
h2,
h2 a{
	<?php if (!empty($qode_options_elision['h2_color'])) { ?>color: <?php echo $qode_options_elision['h2_color'];  ?>; <?php } ?>
	<?php if($qode_options_elision['h2_google_fonts'] != "-1"){ ?>
		font-family: <?php echo str_replace('+', ' ', $qode_options_elision['h2_google_fonts']); ?>, sans-serif;
	<?php } ?>
	<?php if (!empty($qode_options_elision['h2_fontsize'])) { ?>font-size: <?php echo $qode_options_elision['h2_fontsize'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_elision['h2_lineheight'])) { ?>line-height: <?php echo $qode_options_elision['h2_lineheight'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_elision['h2_fontstyle'])) { ?>font-style: <?php echo $qode_options_elision['h2_fontstyle'];  ?>; <?php } ?>
	<?php if (!empty($qode_options_elision['h2_fontweight'])) { ?>font-weight: <?php echo $qode_options_elision['h2_fontweight'];  ?>; <?php } ?>
}
<?php } ?>
<?php if (!empty($qode_options_elision['h3_color']) || !empty($qode_options_elision['h3_fontsize']) || !empty($qode_options_elision['h3_lineheight']) || !empty($qode_options_elision['h3_fontstyle']) || !empty($qode_options_elision['h3_fontweight']) || $qode_options_elision['h3_google_fonts'] != "-1") { ?>
h3,h3 a{
	<?php if (!empty($qode_options_elision['h3_color'])) { ?>color: <?php echo $qode_options_elision['h3_color'];  ?>; <?php } ?>
	<?php if($qode_options_elision['h3_google_fonts'] != "-1"){ ?>
	font-family: <?php echo str_replace('+', ' ', $qode_options_elision['h3_google_fonts']); ?>, sans-serif;
	<?php } ?>
	<?php if (!empty($qode_options_elision['h3_fontsize'])) { ?>font-size: <?php echo $qode_options_elision['h3_fontsize'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_elision['h3_lineheight'])) { ?>line-height: <?php echo $qode_options_elision['h3_lineheight'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_elision['h3_fontstyle'])) { ?>font-style: <?php echo $qode_options_elision['h3_fontstyle'];?>; <?php } ?>
	<?php if (!empty($qode_options_elision['h3_fontweight'])) { ?>font-weight: <?php echo $qode_options_elision['h3_fontweight'];  ?>; <?php } ?>
}
<?php } ?>
<?php if (!empty($qode_options_elision['h4_color']) || !empty($qode_options_elision['h4_fontsize']) || !empty($qode_options_elision['h4_lineheight']) || !empty($qode_options_elision['h4_fontstyle']) || !empty($qode_options_elision['h4_fontweight']) || $qode_options_elision['h4_google_fonts'] != "-1") { ?>
h4,
h4 a{
	<?php if (!empty($qode_options_elision['h4_color'])) { ?>color: <?php echo $qode_options_elision['h4_color'];  ?>; <?php } ?>
	<?php if($qode_options_elision['h4_google_fonts'] != "-1"){ ?>
		font-family: <?php echo str_replace('+', ' ', $qode_options_elision['h4_google_fonts']); ?>, sans-serif;
	<?php } ?>
	<?php if (!empty($qode_options_elision['h4_fontsize'])) { ?>font-size: <?php echo $qode_options_elision['h4_fontsize'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_elision['h4_lineheight'])) { ?>line-height: <?php echo $qode_options_elision['h4_lineheight'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_elision['h4_fontstyle'])) { ?>font-style: <?php echo $qode_options_elision['h4_fontstyle'];  ?>; <?php } ?>
	<?php if (!empty($qode_options_elision['h4_fontweight'])) { ?>font-weight: <?php echo $qode_options_elision['h4_fontweight'];  ?>; <?php } ?>
}
<?php } ?>
<?php if (!empty($qode_options_elision['h5_color']) || !empty($qode_options_elision['h5_fontsize']) || !empty($qode_options_elision['h5_lineheight']) || !empty($qode_options_elision['h5_fontstyle']) || !empty($qode_options_elision['h5_fontweight']) || $qode_options_elision['h5_google_fonts'] != "-1") { ?>
h5,
h5 a{
	<?php if (!empty($qode_options_elision['h5_color'])) { ?>color: <?php echo $qode_options_elision['h5_color'];  ?>; <?php } ?>
	<?php if($qode_options_elision['h5_google_fonts'] != "-1"){ ?>
	font-family: <?php echo str_replace('+', ' ', $qode_options_elision['h5_google_fonts']); ?>, sans-serif;
	<?php } ?>
	<?php if (!empty($qode_options_elision['h5_fontsize'])) { ?>font-size: <?php echo $qode_options_elision['h5_fontsize'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_elision['h5_lineheight'])) { ?>line-height: <?php echo $qode_options_elision['h5_lineheight'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_elision['h5_fontstyle'])) { ?>font-style: <?php echo $qode_options_elision['h5_fontstyle'];  ?>; <?php } ?>
	<?php if (!empty($qode_options_elision['h5_fontweight'])) { ?>font-weight: <?php echo $qode_options_elision['h5_fontweight'];  ?>; <?php } ?>
}
<?php } ?>
<?php if (!empty($qode_options_elision['h6_color']) || !empty($qode_options_elision['h6_fontsize']) || !empty($qode_options_elision['h6_lineheight']) || !empty($qode_options_elision['h6_fontstyle']) || !empty($qode_options_elision['h6_fontweight']) || !empty($qode_options_elision['h6_letterspacing']) || $qode_options_elision['h6_google_fonts'] != "-1") { ?>
h6{
	<?php if (!empty($qode_options_elision['h6_color'])) { ?>color: <?php echo $qode_options_elision['h6_color'];  ?>; <?php } ?>
	<?php if($qode_options_elision['h6_google_fonts'] != "-1"){ ?>
	font-family: <?php echo str_replace('+', ' ', $qode_options_elision['h6_google_fonts']); ?>, sans-serif;
	<?php } ?>
	<?php if (!empty($qode_options_elision['h6_fontsize'])) { ?>font-size: <?php echo $qode_options_elision['h6_fontsize'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_elision['h6_lineheight'])) { ?>line-height: <?php echo $qode_options_elision['h6_lineheight'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_elision['h6_fontstyle'])) { ?>font-style: <?php echo $qode_options_elision['h6_fontstyle'];  ?>;  <?php } ?>
	<?php if (!empty($qode_options_elision['h6_fontweight'])) { ?>font-weight: <?php echo $qode_options_elision['h6_fontweight'];  ?>; <?php } ?>
	<?php if (!empty($qode_options_elision['h6_letterspacing'])) { ?>letter-spacing: <?php echo $qode_options_elision['h6_letterspacing'];  ?>px; <?php } ?>
}

.q_icon_list p,
.q_list.circle ul>li,
.q_list.number ul>li{
	<?php if (!empty($qode_options_elision['h6_color'])) { ?>color: <?php echo $qode_options_elision['h6_color'];  ?>; <?php } ?>
	<?php if($qode_options_elision['h6_google_fonts'] != "-1"){ ?>
	font-family: <?php echo str_replace('+', ' ', $qode_options_elision['h6_google_fonts']); ?>, sans-serif;
	<?php } ?>
	<?php if (!empty($qode_options_elision['h6_fontsize'])) { ?>font-size: <?php echo $qode_options_elision['h6_fontsize'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_elision['h6_fontweight'])) { ?>font-weight: <?php echo $qode_options_elision['h6_fontweight'];  ?>; <?php } ?>
}		
<?php } ?>

<?php if (!empty($qode_options_elision['text_color']) || !empty($qode_options_elision['text_fontsize']) || !empty($qode_options_elision['text_lineheight']) || !empty($qode_options_elision['text_fontstyle']) || !empty($qode_options_elision['text_fontweight']) || $qode_options_elision['text_google_fonts'] != "-1" || !empty($qode_options_elision['text_margin'])) { ?>
p{
	<?php if (!empty($qode_options_elision['text_color'])) { ?>color: <?php echo $qode_options_elision['text_color'];  ?>;<?php } ?>
	<?php if($qode_options_elision['text_google_fonts'] != "-1"){ ?>
		font-family: <?php echo str_replace('+', ' ', $qode_options_elision['text_google_fonts']); ?>, sans-serif;
	<?php } ?>
	<?php if (!empty($qode_options_elision['text_fontsize'])) { ?>font-size: <?php echo $qode_options_elision['text_fontsize'];  ?>px;<?php } ?>
	<?php if (!empty($qode_options_elision['text_lineheight'])) { ?>line-height: <?php echo $qode_options_elision['text_lineheight'];  ?>px;<?php } ?>
	<?php if (!empty($qode_options_elision['text_fontstyle'])) { ?>font-style: <?php echo $qode_options_elision['text_fontstyle'];  ?>;<?php } ?>
	<?php if (!empty($qode_options_elision['text_fontweight'])) { ?>font-weight: <?php echo $qode_options_elision['text_fontweight'];  ?>;<?php } ?>
	<?php if (!empty($qode_options_elision['text_margin'])) { ?>margin-top: <?php echo $qode_options_elision['text_margin'];  ?>px;<?php } ?>
	<?php if (!empty($qode_options_elision['text_margin'])) { ?>margin-bottom: <?php echo $qode_options_elision['text_margin'];  ?>px;<?php } ?>
}
.portfolio_navigation .portfolio_prev a i,
.portfolio_navigation .portfolio_next a i,
.portfolio_navigation .portfolio_button a i,
.portfolio_like span,
.portfolio_single .portfolio_like span,
.filter_holder ul li span,
.blog_like span,
.social_share_dropdown ul li a,
.social_share_dropdown ul li i,
.single_links_pages a span,
#respond textarea,
#respond input[type='text'],
.contact_form input[type='text'],
.contact_form  textarea,
.pagination ul li a,
.pagination ul li.next a i,
.pagination ul li.prev a i,
.pagination ul li.last a i,
.pagination ul li.first a i,
.side_menu a,
.side_menu li,
.side_menu span,
.side_menu p,
.side_menu .widget.widget_rss li a.rsswidget,
.side_menu #wp-calendar caption,
.side_menu #wp-calendar th, 
.side_menu #wp-calendar td,
.widget.widget_archive select,
.widget.widget_categories select,
.widget.widget_text select,
.footer_top .widget_recent_entries > ul > li > span,
.header_top #lang_sel ul li ul li a,
.header_top #lang_sel ul li ul li a:visited,
.header_top #lang_sel_click ul li ul li a,
.header_top #lang_sel_click ul li ul li a:visited,
footer #lang_sel_list.lang_sel_list_horizontal a,
footer #lang_sel_list.lang_sel_list_vertical a,
.side_menu #lang_sel_list.lang_sel_list_horizontal a,
.side_menu #lang_sel_list.lang_sel_list_vertical a,
#lang_sel_footer a{
	<?php if (!empty($qode_options_elision['text_color'])) { ?>color: <?php echo $qode_options_elision['text_color'];  ?>;<?php } ?>
}
footer #lang_sel ul li a,
footer #lang_sel ul ul a,
footer #lang_sel_click ul li a,
footer #lang_sel_click ul ul a,
footer #lang_sel_click ul ul a span,
section.side_menu #lang_sel ul li a,
section.side_menu #lang_sel ul ul a,
section.side_menu #lang_sel ul ul a:visited,
section.side_menu #lang_sel_click > ul > li > a,
section.side_menu #lang_sel_click ul ul a,
section.side_menu #lang_sel_click ul ul a:visited{
	<?php if (!empty($qode_options_elision['text_color'])) { ?>color: <?php echo $qode_options_elision['text_color'];  ?> !important;<?php } ?>
}
<?php } ?>
<?php if (!empty($qode_options_elision['link_color']) || !empty($qode_options_elision['link_fontstyle']) || !empty($qode_options_elision['link_fontweight']) || !empty($qode_options_elision['link_fontdecoration'])) { ?>
a, p a{
	<?php if (!empty($qode_options_elision['link_color'])) { ?>color: <?php echo $qode_options_elision['link_color'];  ?>;<?php } ?>
	<?php if (!empty($qode_options_elision['link_fontstyle'])) { ?>font-style: <?php echo $qode_options_elision['link_fontstyle'];  ?>;<?php } ?>
	<?php if (!empty($qode_options_elision['link_fontweight'])) { ?>font-weight: <?php echo $qode_options_elision['link_fontweight'];  ?>;<?php } ?>
	<?php if (!empty($qode_options_elision['link_fontdecoration'])) { ?>text-decoration: <?php echo $qode_options_elision['link_fontdecoration'];  ?>;<?php } ?>
}
<?php } ?>
<?php if (!empty($qode_options_elision['link_hovercolor']) || !empty($qode_options_elision['link_fontdecoration'])) { ?>
a:hover,
p a:hover{
	<?php if (!empty($qode_options_elision['link_hovercolor'])) { ?>color: <?php echo $qode_options_elision['link_hovercolor'];  ?>;<?php } ?>
	<?php if (!empty($qode_options_elision['link_fontdecoration'])) { ?>text-decoration: <?php echo $qode_options_elision['link_fontdecoration'];  ?>;<?php } ?>
}
<?php } ?>
<?php if (!empty($qode_options_elision['blockquote_font_color'])) { ?>
	blockquote h5{
		color: <?php echo $qode_options_elision['blockquote_font_color'];  ?>;  
	}
<?php } ?>
<?php if (!empty($qode_options_elision['blockquote_background_color']) && !empty($qode_options_elision['blockquote_border_color'])) { ?>
	blockquote{
		border-color: <?php echo $qode_options_elision['blockquote_border_color'];  ?>; 
		background-color: <?php echo $qode_options_elision['blockquote_background_color'];  ?>;  
	}
<?php } ?>
<?php if (!empty($qode_options_elision['separator_thickness']) || !empty($qode_options_elision['separator_topmargin']) || !empty($qode_options_elision['separator_bottommargin']) || !empty($qode_options_elision['separator_color'])) { ?>
.separator{
<?php if (!empty($qode_options_elision['separator_thickness'])) { ?>	height: <?php echo $qode_options_elision['separator_thickness'];  ?>px; <?php } ?>
<?php if (!empty($qode_options_elision['separator_topmargin'])) { ?>	margin-top: <?php echo $qode_options_elision['separator_topmargin'];  ?>px; <?php } ?>
<?php if (!empty($qode_options_elision['separator_bottommargin'])) { ?>	margin-bottom: <?php echo $qode_options_elision['separator_bottommargin'];  ?>px; <?php } ?>
<?php if (!empty($qode_options_elision['separator_color'])) { ?>	background-color: <?php echo $qode_options_elision['separator_color'];  ?>; <?php } ?>
}
<?php } ?>
<?php if (!empty($qode_options_elision['separator_color'])) { ?>
.separator.small{
<?php if (!empty($qode_options_elision['separator_color'])) { ?>	background-color: <?php echo $qode_options_elision['separator_color'];  ?>; <?php } ?>
}
<?php } ?>
<?php if (!empty($qode_options_elision['separator_color'])) { ?>
	.blog_holder article,
	.author_description,
	aside .widget,
	section.section	{
		border-color:<?php echo $qode_options_satellite['separator_color'];  ?>;
	}
<?php } ?>
<?php if (!empty($qode_options_elision['message_backgroundcolor']) || (isset($qode_options_elision['message_bordercolor']) && !empty($qode_options_elision['message_bordercolor']))) { ?>
.q_message{
	<?php if (!empty($qode_options_elision['message_backgroundcolor'])) { ?>background-color: <?php echo $qode_options_elision['message_backgroundcolor'];  ?><?php } ?>;
	<?php if (isset($qode_options_elision['message_bordercolor']) && !empty($qode_options_elision['message_bordercolor'])) { ?>border-color: <?php echo $qode_options_elision['message_bordercolor'];  ?> <?php } ?>; 
}
<?php } ?>
<?php if (!empty($qode_options_elision['message_title_color']) || !empty($qode_options_elision['message_title_fontsize']) || !empty($qode_options_elision['message_title_lineheight']) || !empty($qode_options_elision['message_title_fontstyle']) || !empty($qode_options_elision['message_title_fontweight']) || $qode_options_elision['message_title_google_fonts'] != "-1") { ?>
.q_message .message_text{
<?php if (!empty($qode_options_elision['message_title_color'])) { ?>	color: <?php echo $qode_options_elision['message_title_color'];  ?>; <?php } ?>
	<?php if($qode_options_elision['message_title_google_fonts'] != "-1"){ ?>
	font-family: <?php echo str_replace('+', ' ', $qode_options_elision['message_title_google_fonts']); ?>, sans-serif;
	<?php } ?>
<?php if (!empty($qode_options_elision['message_title_fontsize'])) { ?>	font-size: <?php echo $qode_options_elision['message_title_fontsize'];  ?>px; <?php } ?>
<?php if (!empty($qode_options_elision['message_title_lineheight'])) { ?>	line-height: <?php echo $qode_options_elision['message_title_lineheight'];  ?>px; <?php } ?>
<?php if (!empty($qode_options_elision['message_title_fontstyle'])) { ?>	font-style: <?php echo $qode_options_elision['message_title_fontstyle'];  ?>; <?php } ?>
<?php if (!empty($qode_options_elision['message_title_fontweight'])) { ?>	font-weight: <?php echo $qode_options_elision['message_title_fontweight'];  ?>; <?php } ?>
}
<?php } ?>
<?php if (!empty($qode_options_elision['message_icon_fontsize']) && !empty($qode_options_elision['message_icon_color'])) { ?>
.q_message.with_icon > i {
   <?php if (!empty($qode_options_elision['message_icon_color'])) { ?> color:  <?php echo $qode_options_elision['message_icon_color'];  ?>; <?php } ?>
   <?php if (!empty($qode_options_elision['message_icon_fontsize'])) { ?> font-size: <?php echo $qode_options_elision['message_icon_fontsize'];  ?>px; <?php } ?>
}
<?php } ?>
<?php if (!empty($qode_options_elision['social_icon_backgroundcolor'])) { ?>
	.q_social_icon_holder .fa-stack{
		background-color: <?php echo $qode_options_elision['social_icon_backgroundcolor'];  ?>;  
	}
<?php } ?>
<?php if (!empty($qode_options_elision['button_title_color']) || !empty($qode_options_elision['button_title_fontsize']) || !empty($qode_options_elision['button_title_lineheight']) || !empty($qode_options_elision['button_title_fontstyle']) || !empty($qode_options_elision['button_title_fontweight']) || !empty($qode_options_elision['button_backgroundcolor']) || $qode_options_elision['button_title_google_fonts'] != "-1") { ?>
.qbutton, #submit_comment, .load_more a{
<?php if (!empty($qode_options_elision['button_title_color'])) { ?>	color: <?php echo $qode_options_elision['button_title_color'];  ?>; <?php } ?>
	<?php if($qode_options_elision['button_title_google_fonts'] != "-1"){ ?>
	font-family: <?php echo str_replace('+', ' ', $qode_options_elision['button_title_google_fonts']); ?>, sans-serif;
	<?php } ?>
	<?php if (!empty($qode_options_elision['button_title_fontsize'])) { ?>	font-size: <?php echo $qode_options_elision['button_title_fontsize'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_elision['button_title_lineheight'])) { ?>	line-height: <?php echo $qode_options_elision['button_title_lineheight'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_elision['button_title_lineheight'])) { ?>	height: <?php echo $qode_options_elision['button_title_lineheight'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_elision['button_title_fontstyle'])) { ?>	font-style: <?php echo $qode_options_elision['button_title_fontstyle'];  ?>; <?php } ?>
	<?php if (!empty($qode_options_elision['button_title_fontweight'])) { ?>	font-weight: <?php echo $qode_options_elision['button_title_fontweight'];  ?>; <?php } ?>
	<?php if (!empty($qode_options_elision['button_backgroundcolor'])) { ?>	background-color: <?php echo $qode_options_elision['button_backgroundcolor'];  ?>; <?php } ?>
}
<?php } ?>
<?php if (!empty($qode_options_elision['button_title_hovercolor']) || (isset($qode_options_elision['button_backgroundhovercolor']) && !empty($qode_options_elision['button_backgroundhovercolor']))) { ?>
	.qbutton:hover,
	#submit_comment:hover,
	.load_more a:hover{
		<?php if (!empty($qode_options_elision['button_title_hovercolor'])) { ?> color: <?php echo $qode_options_elision['button_title_hovercolor'];?> !important; <?php } ?>
			}
<?php } ?>
<?php if (!empty($qode_options_elision['button_title_hovercolor'])) { ?>
	.qbutton:hover,
	#submit_comment:hover,
	.load_more a:hover{
		<?php if (!empty($qode_options_elision['button_title_hovercolor'])) { ?> background-color: <?php echo $qode_options_elision['button_backgroundcolor_hover'];?> !important; <?php } ?>
			}
<?php } ?>
<?php
if(isset($qode_options_elision['google_maps_height'])){
	if (intval($qode_options_elision['google_maps_height']) > 0) {
?>
.google_map{
	height: <?php echo intval($qode_options_elision['google_maps_height']); ?>px;
	width: 81%;
	margin: 0 auto;
}
<?php
	}
}
?>
<?php if (!empty($qode_options_elision['footer_top_background_color'])) { ?>
	.footer_top_holder,	footer #lang_sel > ul > li > a,	footer #lang_sel_click > ul > li > a{
		background-color: <?php echo $qode_options_elision['footer_top_background_color']; ?>;
	}
	footer #lang_sel ul ul a,footer #lang_sel_click ul ul a,footer #lang_sel ul ul a:visited,footer #lang_sel_click ul ul a:visited{
		background-color: <?php echo $qode_options_elision['footer_top_background_color']; ?> !important;
	}
<?php } ?>
<?php if (!empty($qode_options_elision['footer_top_title_color'])) { ?>
.footer_top .column_inner > div h4 { 
	color:<?php echo $qode_options_elision['footer_top_title_color'];  ?>;
}
<?php } ?>
<?php if (!empty($qode_options_elision['footer_top_text_color'])) { ?>
	footer,
	.footer_top,
	.footer_top p,
	.footer_top ul li a
	{
		color: <?php echo $qode_options_elision['footer_top_text_color'];  ?>;
	}
<?php } ?>
<?php if (!empty($qode_options_elision['footer_bottom_background_color'])) { ?>
	.footer_bottom_holder, #lang_sel_footer{
		background-color:<?php echo $qode_options_elision['footer_bottom_background_color'];  ?>;
	}
<?php } ?>
<?php if (!empty($qode_options_elision['footer_bottom_text_color'])) { ?>
.footer_bottom, .footer_bottom p, .footer_bottom p a, #lang_sel_footer ul li a,
footer #lang_sel > ul > li > a,
footer #lang_sel_click > ul > li > a,
footer #lang_sel a.lang_sel_sel,
footer #lang_sel_click a.lang_sel_sel,
footer #lang_sel ul ul a,
footer #lang_sel_click ul ul a,
footer #lang_sel ul ul a:visited,
footer #lang_sel_click ul ul a:visited,
footer #lang_sel_list.lang_sel_list_horizontal a,
footer #lang_sel_list.lang_sel_list_vertical a,
#lang_sel_footer a{
	color:<?php echo $qode_options_elision['footer_bottom_text_color'];  ?>;
}
<?php } ?>
<?php if (isset($qode_options_elision['content_bottom_background_color'])) { ?>
	.qode_call_to_action.container{
		background-color:<?php echo $qode_options_elision['content_bottom_background_color'];  ?>;
	}
<?php } ?>
<?php if (isset($qode_options_elision['side_area_background_color']) && !empty($qode_options_elision['side_area_background_color'])) { ?>
	.side_menu,
	.side_menu #lang_sel,
	.side_menu #lang_sel_click,
	.side_menu #lang_sel ul ul,
	.side_menu #lang_sel_click ul ul{
		background-color:<?php echo $qode_options_elision['side_area_background_color'];  ?>;
	}
<?php } ?>
<?php if (isset($qode_options_elision['side_area_text_color']) && !empty($qode_options_elision['side_area_text_color'])) { ?>
	.side_menu .widget,
	.side_menu .widget.widget_search form,
	.side_menu .widget.widget_search form input[type="text"],
	.side_menu .widget.widget_search form input[type="submit"],
	.side_menu .widget h6,
	.side_menu .widget h6 a,
	.side_menu .widget p,
	.side_menu .widget li a,
	.side_menu .widget.widget_rss li a.rsswidget,
	.side_menu #wp-calendar caption,
	.side_menu .widget li,
	.side_menu_title h3,
	.side_menu .widget.widget_archive select, 
	.side_menu .widget.widget_categories select,
	.side_menu .widget.widget_text select,
	.side_menu .widget.widget_search form input[type="submit"],
	.side_menu #wp-calendar th, 
	.side_menu #wp-calendar td{
		color: <?php echo $qode_options_elision['side_area_text_color'];  ?>;
	}
<?php } ?>
<?php if (isset($qode_options_elision['side_area_title_color']) && !empty($qode_options_elision['side_area_title_color'])) { ?>
	.side_menu .side_menu_title h4,
	.side_menu h5{
		color: <?php echo $qode_options_elision['side_area_title_color'];  ?>;
	}
<?php } ?>

<?php if (isset($qode_options_elision['blog_quote_link_box_color']) && !empty($qode_options_elision['blog_quote_link_box_color'])) { ?>
	.blog_holder article.format-link .post_text .post_text_holder,
	.blog_holder article.format-quote .post_text .post_text_holder{
		background-color: <?php echo $qode_options_elision['blog_quote_link_box_color'];  ?>;
	}
<?php } ?>