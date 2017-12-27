<?php
// Removing shortcodes
vc_remove_element("vc_widget_sidebar");
vc_remove_element("vc_wp_search");
vc_remove_element("vc_wp_meta");
vc_remove_element("vc_wp_recentcomments");
vc_remove_element("vc_wp_calendar");
vc_remove_element("vc_wp_pages");
vc_remove_element("vc_wp_tagcloud");
vc_remove_element("vc_wp_custommenu");
vc_remove_element("vc_wp_text");
vc_remove_element("vc_wp_posts");
vc_remove_element("vc_wp_links");
vc_remove_element("vc_wp_categories");
vc_remove_element("vc_wp_archives");
vc_remove_element("vc_wp_rss");
vc_remove_element("vc_teaser_grid");
vc_remove_element("vc_button");
vc_remove_element("vc_cta_button");
vc_remove_element("vc_message");
vc_remove_element("vc_tour");
vc_remove_element("vc_progress_bar");
vc_remove_element("vc_pie");
vc_remove_element("vc_posts_slider");
vc_remove_element("vc_toggle");
$fa_icons = getFontAwesomeIconArray();
$icons = array();
$icons[""] = "";
foreach ($fa_icons as $key => $value) { 
	$icons[$key] = $key;
}

$carousel_sliders = getCarouselSliderArray();

$animations = array(
	"" => "",
	"Elements Shows From Left Side" => "element_from_left",
	"Elements Shows From Right Side" => "element_from_right",
	"Elements Shows From Top Side" => "element_from_top",
	"Elements Shows From Bottom Side" => "element_from_bottom",
	"Elements Shows From Fade" => "element_from_fade"
);
// Accordion
vc_add_param("vc_accordion", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => __("Style", "js_composer"),
	"param_name" => "style",
	"value" => array(
		"Accordion" => "accordion",
		"Toggle" => "toggle",
		"Accordion with icon" => "accordion_with_icon",
		"Toggle with icon" => "toggle_with_icon"
	),
	"description" => ""
));

vc_add_param("vc_accordion_tab", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => __("Icon", "js_composer"),
	"param_name" => "icon",
	"value" => $icons,
	"description" => ""
));

vc_add_param("vc_accordion_tab", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => __("Icon Color", "js_composer"),
	"param_name" => "icon_color",
	"value" => "",
	"description" => ""
));

vc_add_param("vc_accordion_tab", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => __("Title Color", "js_composer"),
	"param_name" => "title_color",
	"value" => "",
	"description" => ""
));

vc_add_param("vc_accordion_tab", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => __("Background Color", "js_composer"),
	"param_name" => "background_color",
	"value" => "",
	"description" => ""
));

vc_add_param("vc_accordion_tab", array(
	"type" => "dropdown",
    "class" => "",
    "heading" => __("Title Tag", "js_composer"),
    "param_name" => "title_tag",
    "value" => array(
        ""   => "",
        "h2" => "h2",
        "h3" => "h3",
        "h4" => "h4",	
        "h5" => "h5",	
        "h6" => "h6",	
    ),
    "description" => ""
));

// Tabs
vc_add_param("vc_tabs", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => __("Style", "js_composer"),
	"param_name" => "style",
	"value" => array(
		"Horizontal Center" => "horizontal",
		"Boxed" => "boxed",
		"Vertical Left" => "vertical",
		"Vertical Right" => "vertical_right"
	),
	"description" => ""
));

// Gallery
vc_add_param("vc_gallery", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => __("Column Number", "js_composer"),
	"param_name" => "column_number",
	 "value" => array(2, 3, 4, 5, __("Disable", "js_composer") => 0),
	 "dependency" => Array('element' => "type", 'value' => array('image_grid'))
));

// Row
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"show_settings_on_create"=>true,
	"heading" => __("Row Type", "js_composer"),
	"param_name" => "row_type",
	"value" => array(
		"Row" => "row",
		"Section" => "section",
		"Expandable" => "expandable"
	)
	
));
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => __("Type", "js_composer"),
	"param_name" => "type",
	"value" => array(
		"In Grid" => "grid",
		"Full Width" => "full_width"	
	),
	"dependency" => Array('element' => "row_type", 'value' => array('section'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => __("Anchor ID", "js_composer"),
	"param_name" => "anchor",
	"value" => ""
));
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => __("Text Align", "js_composer"),
	"param_name" => "text_align",
	"value" => array(
		"Left" => "left",
		"Center" => "center",
		"Right" => "right"
	)
));
vc_add_param("vc_row", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => __("Video background", "js_composer"),
	"value" => array(__("Use video background?", "js_composer") => "show_video" ),
	"param_name" => "video",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('section'))
));
vc_add_param("vc_row", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => __("Video overlay", "js_composer"),
	"value" => array(__("Use transparent overlay over video?", "js_composer") => "show_video_overlay" ),
	"param_name" => "video_overlay",
	"description" => "",
	"dependency" => Array('element' => "video", 'value' => array('show_video'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => __("Video background (webm) file url", "js_composer"),
	"value" => "",
	"param_name" => "video_webm",
	"description" => "",
	"dependency" => Array('element' => "video", 'value' => array('show_video'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => __("Video background (mp4) file url", "js_composer"),
	"value" => "",
	"param_name" => "video_mp4",
	"description" => "",
	"dependency" => Array('element' => "video", 'value' => array('show_video'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => __("Video background (ogv) file url", "js_composer"),
	"value" => "",
	"param_name" => "video_ogv",
	"description" => "",
	"dependency" => Array('element' => "video", 'value' => array('show_video'))
));
vc_add_param("vc_row", array(
	"type" => "attach_image",
	"class" => "",
	"heading" => __("Video preview image", "js_composer"),
	"value" => "",
	"param_name" => "video_image",
	"description" => "",
	"dependency" => Array('element' => "video", 'value' => array('show_video'))
));
vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => __("Background color", "js_composer"),
	"param_name" => "background_color",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('section','expandable'))
));
vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => __("Border bottom color", "js_composer"),
	"param_name" => "border_color",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('section','expandable'))
));

vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => __("Padding", "js_composer"),
	"value" => "",
	"param_name" => "padding",
	"description" => __("Padding (left/right in % - full width only)", "js_composer"),
	"dependency" => Array('element' => "type", 'value' => array('full_width'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => __("Padding Top", "js_composer"),
	"value" => "",
	"param_name" => "padding_top",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('section'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => __("Padding Bottom", "js_composer"),
	"value" => "",
	"param_name" => "padding_bottom",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('section'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => __("More Button Label", "js_composer"),
	"param_name" => "more_button_label",
	"value" =>  "",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => __("Less Button Label", "js_composer"),
	"param_name" => "less_button_label",
	"value" =>  "",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => __("Button Position", "js_composer"),
	"param_name" => "button_position",
	"value" => array(
		"" => "",
		"Left" => "left",
		"Right" => "right",
		"Center" => "center"	
	),
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));
vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => __("Color", "js_composer"),
	"param_name" => "color",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));
vc_add_param("vc_row",  array(
  "type" => "dropdown",
  "heading" => __("CSS Animation", "js_composer"),
  "param_name" => "css_animation",
  "admin_label" => true,
  "value" => $animations,
  "description" => "",
  "dependency" => Array('element' => "row_type", 'value' => array('row'))
  
));
vc_add_param("vc_row",  array(
  "type" => "textfield",
  "heading" => __("Transition delay (s)", "js_composer"),
  "param_name" => "transition_delay",
  "admin_label" => true,
  "value" => "",
  "description" => "",
  "dependency" => Array('element' => "row_type", 'value' => array('row'))
  
));
// Row Inner
vc_add_param("vc_row_inner", array(
	"type" => "dropdown",
	"class" => "",
	"show_settings_on_create"=>true,
	"heading" => __("Row Type", "js_composer"),
	"param_name" => "row_type",
	"value" => array(
		"Row" => "row",
		"Section" => "section",
		"Box" => "box",
		"Expandable" => "expandable"
	)
	
));
vc_add_param("vc_row_inner", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => __("Type", "js_composer"),
	"param_name" => "type",
	"value" => array(
		"In Grid" => "grid",
		"Full Width" => "full_width"	
	),
	"dependency" => Array('element' => "row_type", 'value' => array('section'))
));
vc_add_param("vc_row_inner", array(
	"type" => "textfield",
	"class" => "",
	"heading" => __("Anchor ID", "js_composer"),
	"param_name" => "anchor",
	"value" => ""
));
vc_add_param("vc_row_inner", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => __("Text Align", "js_composer"),
	"param_name" => "text_align",
	"value" => array(
		"Left" => "left",
		"Center" => "center",
		"Right" => "right"
	)
	
));
vc_add_param("vc_row_inner", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => __("Background color", "js_composer"),
	"param_name" => "background_color",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('section','expandable','box'))
));
vc_add_param("vc_row_inner", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => __("Border color", "js_composer"),
	"param_name" => "border_color",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('section','expandable','box'))
));

vc_add_param("vc_row_inner", array(
	"type" => "textfield",
	"class" => "",
	"heading" => __("Padding", "js_composer"),
	"value" => "",
	"param_name" => "padding",
	"description" => __("Padding (left/right in % - full width only)", "js_composer"),
	"dependency" => Array('element' => "type", 'value' => array('full_width'))
));

vc_add_param("vc_row_inner", array(
	"type" => "textfield",
	"class" => "",
	"heading" => __("Padding Top", "js_composer"),
	"value" => "",
	"param_name" => "padding_top",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('section'))
));
vc_add_param("vc_row_inner", array(
	"type" => "textfield",
	"class" => "",
	"heading" => __("Padding Bottom", "js_composer"),
	"value" => "",
	"param_name" => "padding_bottom",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('section'))
));
vc_add_param("vc_row_inner", array(
	"type" => "textfield",
	"class" => "",
	"heading" => __("More Button Label", "js_composer"),
	"param_name" => "more_button_label",
	"value" =>  "",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));
vc_add_param("vc_row_inner", array(
	"type" => "textfield",
	"class" => "",
	"heading" => __("Less Button Label", "js_composer"),
	"param_name" => "less_button_label",
	"value" =>  "",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));
vc_add_param("vc_row_inner", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => __("Button Position", "js_composer"),
	"param_name" => "button_position",
	"value" => array(
		"" => "",
		"Left" => "left",
		"Right" => "right",
		"Center" => "center"	
	),
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));
vc_add_param("vc_row_inner", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => __("Color", "js_composer"),
	"param_name" => "color",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('expandable'))
));
vc_add_param("vc_row_inner",  array(
	"type" => "dropdown",
	"heading" => __("CSS Animation", "js_composer"),
	"param_name" => "css_animation",
	"admin_label" => true,
	"value" => $animations,
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
  
));
vc_add_param("vc_row_inner",  array(
  "type" => "textfield",
  "heading" => __("Transition delay", "js_composer"),
  "param_name" => "transition_delay",
  "admin_label" => true,
  "value" => "",
  "description" => "",
  "dependency" => Array('element' => "row_type", 'value' => array('row'))
  
));
// Separator
vc_add_param("vc_separator", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => __("Type", "js_composer"),
	"param_name" => "type",
	"value" => array(
		"Normal" => "normal",
		"Transparent" => "transparent",
		"Full width" => "full_width",
                "Small"      => "small"
	),
	"description" => ""
));

vc_add_param("vc_separator", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => __("Position", "js_composer"),
	"param_name" => "position",
	"value" => array(
		"Center" => "center",
		"Left" => "left",
		"Right" => "right"
	),
    "dependency" => array("element" => "type", "value" => array("small")),
	"description" => ""
));

vc_add_param("vc_separator", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => __("Color", "js_composer"),
	"param_name" => "color",
	"value" => "",
	"description" => ""
));

vc_add_param("vc_separator", array(
	"type" => "textfield",
	"class" => "",
	"heading" => __("Thickness", "js_composer"),
	"param_name" => "thickness",
	"value" => "",
	"description" => ""
));
vc_add_param("vc_separator", array(
	"type" => "textfield",
	"class" => "",
	"heading" => __("Top Margin", "js_composer"),
	"param_name" => "up",
	"value" => "",
	"description" => ""
));
vc_add_param("vc_separator", array(
	"type" => "textfield",
	"class" => "",
	"heading" => __("Bottom Margin", "js_composer"),
	"param_name" => "down",
	"value" => "",
	"description" => ""
));

// Separator With Text
vc_add_param("vc_text_separator", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => __("Border", "js_composer"),
	"param_name" => "border",
	"value" => array(
		"No" => "no",
		"Yes" => "yes"
	),
));
vc_add_param("vc_text_separator", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => __("Border Color", "js_composer"),
	"param_name" => "border_color",
	"dependency" => Array('element' => "border", 'value' => array('yes'))
	
));
vc_add_param("vc_text_separator", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => __("Background Color", "js_composer"),
	"param_name" => "background_color",
	
));
vc_add_param("vc_text_separator", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => __("Title Color", "js_composer"),
	"param_name" => "title_color",
));
vc_add_param("vc_parallax_section", array(
	"type" => "textfield",
	"class" => "",
	"heading" => __("Anchor", "js_composer"),
	"param_name" => "anchor",
	"value" => "",
	"description" => ""
));

//Testimonials
vc_map( array(
		"name" => __("Testimonials", "js_composer"),
		"base" => "testimonials",
		"category" => __('by QODE', 'js_composer'),
		"icon" => "icon-wpb-testimonials",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Type", "js_composer"),
				"param_name" => "type",
				"value" => array(
					"Normal" => "normal",
					"Transparent" => "transparent"	
				),
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Category", "js_composer"),
				"param_name" => "category",
				"value" => "",
				"description" => __("Category Slug (leave empty for all)", "js_composer")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Number", "js_composer"),
				"param_name" => "number",
				"value" => "",
				"description" => __("Number of Testimonials", "js_composer")
			),
            array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Text Color", "js_composer"),
				"param_name" => "text_color",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Background Color", "js_composer"),
				"param_name" => "background_color",
				"description" => __("Only for normal type", "js_composer"),
                "dependency" => Array('element' => "type", 'value' => array('normal'))
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Border Color", "js_composer"),
				"param_name" => "border_color",
				"description" => __("Only for normal type", "js_composer"),
                "dependency" => Array('element' => "type", 'value' => array('normal'))
			)
		)
) );
//Portfolio
vc_map( array(
		"name" => __("Portfolio List", "js_composer"),
		"base" => "portfolio_list",
		"category" => __('by QODE', 'js_composer'),
		"icon" => "icon-wpb-portfolio",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Type", "js_composer"),
				"param_name" => "type",
				"value" => array(
					"Standard" => "standard",
					"Standard No Space" => "standard_no_space",
					"Hover Text" => "hover_text",
					"Hover Text No Space" => "hover_text_no_space"				
				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Columns", "js_composer"),
				"param_name" => "columns",
				"value" => array(
					"" => "",
					"2" => "2",
					"3" => "3",	
					"4" => "4",	
					"5" => "5",	
					"6" => "6"	
				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Order By", "js_composer"),
				"param_name" => "order_by",
				"value" => array(
					"" => "",
					"Menu Order" => "menu_order",
					"Title" => "title",	
					"Date" => "date"
				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Order", "js_composer"),
				"param_name" => "order",
				"value" => array(
					"" => "",
					"ASC" => "ASC",
					"DESC" => "DESC",	
				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Filter", "js_composer"),
				"param_name" => "filter",
				"value" => array(
					"" => "",
					"Yes" => "yes",
					"No" => "no"	
				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Lightbox", "js_composer"),
				"param_name" => "lightbox",
				"value" => array(
					"" => "",
					"Yes" => "yes",
					"No" => "no"	
				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Show Load More", "js_composer"),
				"param_name" => "show_load_more",
				"value" => array(
					"" => "",
					"Yes" => "yes",
					"No" => "no"	
				),
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Number", "js_composer"),
				"param_name" => "number",
				"value" => "-1",
				"description" => __("Number of portolios on page (-1 is all)", "js_composer")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Category", "js_composer"),
				"param_name" => "category",
				"value" => "",
				"description" => __("Category Slug (leave empty for all)", "js_composer")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Selected Projects", "js_composer"),
				"param_name" => "selected_projects",
				"value" => "",
				"description" => __("Selected Projects (leave empty for all, delimit by comma)", "js_composer")
			),
            array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Title Tag", "js_composer"),
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",	
					"h5" => "h5",	
					"h6" => "h6",	
				),
				"description" => ""
            )
		)
) );

//Portfolio Slider
vc_map( array(
		"name" => __("Portfolio Slider", "js_composer"),
		"base" => "portfolio_slider",
		"category" => __('by QODE', 'js_composer'),
		"icon" => "icon-wpb-portfolio_slider",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Order By", "js_composer"),
				"param_name" => "order_by",
				"value" => array(
					"" => "",
					"Menu Order" => "menu_order",
					"Title" => "title",	
					"Date" => "date"
				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Order", "js_composer"),
				"param_name" => "order",
				"value" => array(
					"" => "",
					"ASC" => "ASC",
					"DESC" => "DESC",	
				),
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Number", "js_composer"),
				"param_name" => "number",
				"value" => "-1",
				"description" => __("Number of portolios on page (-1 is all)", "js_composer")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Category", "js_composer"),
				"param_name" => "category",
				"value" => "",
				"description" => __("Category Slug (leave empty for all)", "js_composer")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Selected Projects", "js_composer"),
				"param_name" => "selected_projects",
				"value" => "",
				"description" => __("Selected Projects (leave empty for all, delimit by comma)", "js_composer")
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Lightbox", "js_composer"),
				"param_name" => "lightbox",
				"value" => array(
					"" => "",
					"Yes" => "yes",
					"No" => "no"	
				),
				"description" => ""
			)
		)
) );

//Qode Carousel
vc_map( array(
		"name" => __("Qode Carousel", "js_composer"),
		"base" => "qode_carousel",
		"category" => __('by QODE', 'js_composer'),
		"icon" => "icon-wpb-qode_carousel",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Carousel Slider", "js_composer"),
				"param_name" => "carousel",
				"value" => $carousel_sliders,
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Order By", "js_composer"),
				"param_name" => "order_by",
				"value" => array(
					"" => "",
					"Menu Order" => "menu_order",
					"Title" => "title",	
					"Date" => "date"
				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Order", "js_composer"),
				"param_name" => "order",
				"value" => array(
					"" => "",
					"ASC" => "ASC",
					"DESC" => "DESC",	
				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Control Pagination Style", "js_composer"),
				"param_name" => "control_style",
				"value" => array(
					"Light" => "light",
					"Gray" => "gray",	
				),
				"description" => ""
			)
		)
) );

//Counter
vc_map( array(
		"name" => __("Counter", "js_composer"),
		"base" => "counter",
		"category" => __('by QODE', 'js_composer'),
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-counter",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Type", "js_composer"),
				"param_name" => "type",
				"value" => array(
					"Zero Counter" => "zero",
					"Random Counter" => "random"	
				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Position", "js_composer"),
				"param_name" => "position",
				"value" => array(
					"Left" => "left",
					"Right" => "right",	
					"Center" => "center"	
				),
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Digit", "js_composer"),
				"param_name" => "digit",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Font size (px)", "js_composer"),
				"param_name" => "font_size",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Font Color", "js_composer"),
				"param_name" => "font_color",
				"description" => ""
			)
		)
) );

//Icon List Item
vc_map( array(
		"name" => __("Icon List Item", "js_composer"),
		"base" => "icon_list_item",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-icon_list_item",
		"category" => __('by QODE', 'js_composer'),
		"params" => array(
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Icon", "js_composer"),
				"param_name" => "icon",
				"value" => $icons,
				"description" => ""
				),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Icon Color", "js_composer"),
				"param_name" => "icon_color",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Icon Background Color", "js_composer"),
				"param_name" => "icon_background_color",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Icon Border Color", "js_composer"),
				"param_name" => "icon_border_color",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Title", "js_composer"),
				"param_name" => "title",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Title Color", "js_composer"),
				"param_name" => "title_color",
				"description" => ""
			),
		)
) );

// Call to action
vc_map( array(
		"name" => __("Action", "js_composer"),
		"base" => "action",
		"category" => __('by QODE', 'js_composer'),
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-action",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Type", "js_composer"),
				"param_name" => "type",
				"value" => array(
					"Normal" => "normal",
					"With Border" => "with_border"
				),
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Background Color", "js_composer"),
				"param_name" => "background_color",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Border Color", "js_composer"),
				"param_name" => "border_color",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Link", "js_composer"),
				"param_name" => "link",
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Link Target", "js_composer"),
				"param_name" => "target",
				"value" => array(
					"" => "",
					"Self" => "_self",
					"Blank" => "_blank",	
					"Parent" => "_parent"	
				),
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Link Text", "js_composer"),
				"param_name" => "link_text",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Link Text Color", "js_composer"),
				"param_name" => "link_text_color",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Link Background Color", "js_composer"),
				"param_name" => "link_background_color",
				"description" => ""
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => __("Content", "js_composer"),
				"param_name" => "content",
				"value" => "<p>".__("I am test text for Call to action.", "js_composer")."</p>",
				"description" => ""
			)
		)
) );

// Blockquote 
vc_map( array(
		"name" => __("Blockquote", "js_composer"),
		"base" => "blockquote",
		"category" => __('by QODE', 'js_composer'),
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-blockquote",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => __("Text", "js_composer"),
				"param_name" => "text",
				"value" => __("Blockquote text", "js_composer")
			),
            array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Text Color", "js_composer"),
				"param_name" => "text_color",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Width", "js_composer"),
				"param_name" => "width",
				"description" => __("Width (%)", "js_composer")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Line Height", "js_composer"),
				"param_name" => "line_height",
				"description" => __("Line Height (px)", "js_composer")
			),
            array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Background Color", "js_composer"),
				"param_name" => "background_color",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Border Color", "js_composer"),
				"param_name" => "border_color",
				"description" => ""
			)
		)
) );

// Button 
vc_map( array(
		"name" => __("Button", "js_composer"),
		"base" => "button",
		"category" => __('by QODE', 'js_composer'),
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-button",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Size", "js_composer"),
				"param_name" => "size",
				"value" => array(
					"Default" => "",
					"Tiny" => "tiny",
					"Small" => "small",	
					"Medium" => "medium",	
					"Large" => "large",
					"Big Large" => "big_large"
				),
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Text", "js_composer"),
				"param_name" => "text",
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Icon", "js_composer"),
				"param_name" => "icon",
				"value" => $icons,
				"description" => ""
				),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Icon Size", "js_composer"),
				"param_name" => "icon_size",
				"value" => array(
					"Tiny" => "fa-lg",
					"Small" => "fa-2x",
					"Medium" => "fa-3x",	
					"Large" => "fa-4x",
					"Very Large" => "fa-5x"	
				),
				"dependency" => Array('element' => "icon", 'not_empty' => true),
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Icon Color", "js_composer"),
				"param_name" => "icon_color",
				"dependency" => Array('element' => "icon", 'not_empty' => true),
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Link", "js_composer"),
				"param_name" => "link",
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Link Target", "js_composer"),
				"param_name" => "target",
				"value" => array(
					"Self" => "_self",
					"Blank" => "_blank",	
					"Parent" => "_parent",
					"Top" => "_top"	
				),
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Color", "js_composer"),
				"param_name" => "color",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Background Color", "js_composer"),
				"param_name" => "background_color",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Border Color", "js_composer"),
				"param_name" => "border_color",
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Font Style", "js_composer"),
				"param_name" => "font_style",
				"value" => array(
					"" => "",
					"Normal" => "normal",	
					"Italic" => "italic"
				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Font Weight", "js_composer"),
				"param_name" => "font_weight",
				"value" => array(
					"" => "",
					"100" => "100",	
					"200" => "200",
					"300" => "300",
					"400" => "400",
					"500" => "500",
					"600" => "600",
					"700" => "700",
					"800" => "800",
					"900" => "900"
				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Text Align", "js_composer"),
				"param_name" => "text_align",
				"value" => array(
					"" => "",
					"Left" => "left",	
					"Right" => "right",
					"Center" => "center"
				),
				"description" => ""
			)
		)
) );

// Image with text 
vc_map( array(
		"name" => __("Image With Text", "js_composer"),
		"base" => "image_with_text",
		"category" => __('by QODE', 'js_composer'),
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-image_with_text",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => __("Image", "js_composer"),
				"param_name" => "image"
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Title", "js_composer"),
				"param_name" => "title",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Title Color", "js_composer"),
				"param_name" => "title_color",
				"description" => ""
			),
            array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Title Tag", "js_composer"),
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",	
					"h5" => "h5",	
					"h6" => "h6",	
				),
				"description" => ""
            ),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => __("Content", "js_composer"),
				"param_name" => "content",
				"value" => "<p>".__("I am test text for Image with text shortcode.", "js_composer")."</p>",
				"description" => ""
			)
		)
) );

//Message
vc_map( array(
		"name" => __("Message", "js_composer"),
		"base" => "message",
		"category" => __('by QODE', 'js_composer'),
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-message",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Type", "js_composer"),
				"param_name" => "type",
				"value" => array(
					"Normal" => "normal",
					"With Icon" => "with_icon"	
				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Icon", "js_composer"),
				"param_name" => "icon",
				"value" => $icons,
				"description" => "",
				"dependency" => Array('element' => "type", 'value' => array('with_icon'))
				),
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __("Icon Color", "js_composer"),
				"param_name" => "icon_color",
				"description" => "",
				"dependency" => Array('element' => "type", 'value' => array('with_icon'))
				),
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __("Icon Background Color", "js_composer"),
				"param_name" => "icon_background_color",
				"description" => "",
				"dependency" => Array('element' => "type", 'value' => array('with_icon'))
				),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Icon Type", "js_composer"),
				"param_name" => "icon_type",
				"value" => array(
					"" => "",
					"Square" => "square",
					"Circle" => "circle"	
				),
				"description" => "",
				"dependency" => Array('element' => "type", 'value' => array('with_icon'))
			),
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => __("Custom Icon", "js_composer"),
				"param_name" => "custom_icon",
				"dependency" => Array('element' => "type", 'value' => array('with_icon'))
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Background Color", "js_composer"),
				"param_name" => "background_color",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Border Color", "js_composer"),
				"param_name" => "border_color",
				"description" => ""
			),
                        array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Close Button Style", "js_composer"),
				"param_name" => "close_button_style",
				"value" => array(
					"Dark" => "dark",
					"Light" => "light"	
				),
				"description" => ""
                        ),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => __("Content", "js_composer"),
				"param_name" => "content",
				"value" => "<p>".__("I am test text for Message shortcode.", "js_composer")."</p>",
				"description" => ""
			)
		)
) );

// Pie Chart
vc_map( array(
		"name" => __("Pie Chart", "js_composer"),
		"base" => "pie_chart",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-pie_chart",
		"category" => __('by QODE', 'js_composer'),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Percentage", "js_composer"),
				"param_name" => "percent",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Percentage Color", "js_composer"),
				"param_name" => "percentage_color",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Bar Active Color", "js_composer"),
				"param_name" => "active_color",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Bar Noactive Color", "js_composer"),
				"param_name" => "noactive_color",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Pie Chart Line Width (px)", "js_composer"),
				"param_name" => "line_width",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Title", "js_composer"),
				"param_name" => "title",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Title Color", "js_composer"),
				"param_name" => "title_color",
				"description" => ""
			),
            array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Title Tag", "js_composer"),
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",	
					"h5" => "h5",	
					"h6" => "h6",	
				),
				"description" => ""
            ),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Text", "js_composer"),
				"param_name" => "text",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Text Color", "js_composer"),
				"param_name" => "text_color",
				"description" => ""
			)
		)
) );

// Pie Chart With Icon
vc_map( array(
		"name" => __("Pie Chart With Icon", "js_composer"),
		"base" => "pie_chart_with_icon",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-pie_chart_with_icon",
		"category" => __('by QODE', 'js_composer'),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Percentage", "js_composer"),
				"param_name" => "percent",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Bar Active Color", "js_composer"),
				"param_name" => "active_color",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Bar Noactive Color", "js_composer"),
				"param_name" => "noactive_color",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Pie Chart Line Width (px)", "js_composer"),
				"param_name" => "line_width",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Title", "js_composer"),
				"param_name" => "title",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Title Color", "js_composer"),
				"param_name" => "title_color",
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Icon", "js_composer"),
				"param_name" => "icon",
				"value" => $icons,
				"description" => ""
				),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Icon Size", "js_composer"),
				"param_name" => "icon_size",
				"value" => array(
					"Tiny" => "fa-lg",
					"Small" => "fa-2x",
					"Medium" => "fa-3x",	
					"Large" => "fa-4x",
					"Very Large" => "fa-5x"	
				),
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Icon Color", "js_composer"),
				"param_name" => "icon_color",
				"description" => ""
			),
            array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Title Tag", "js_composer"),
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",	
					"h5" => "h5",	
					"h6" => "h6",	
				),
				"description" => ""
            ),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Text", "js_composer"),
				"param_name" => "text",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Text Color", "js_composer"),
				"param_name" => "text_color",
				"description" => ""
			)
		)
) );

// Pie Chart 2 (Pie)
vc_map( array(
		"name" => __("Pie Chart 2 (Pie)", "js_composer"),
		"base" => "pie_chart2",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-pie_chart2",
		"category" => __('by QODE', 'js_composer'),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Width", "js_composer"),
				"param_name" => "width",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Height", "js_composer"),
				"param_name" => "height",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Legend Text Color", "js_composer"),
				"param_name" => "color",
				"description" => ""
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => __("Content", "js_composer"),
				"param_name" => "content",
				"value" => "15,#eb005d,Legend One; 35,#f57fae,Legend Two; 50,#fbccdf,Legend Three",
				"description" => ""
			)

		)
) );
// Pie Chart 3 (Doughnut)
vc_map( array(
		"name" => __("Pie Chart 3 (Doughnut)", "js_composer"),
		"base" => "pie_chart3",
		"category" => __('by QODE', 'js_composer'),
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-pie_chart3",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Width", "js_composer"),
				"param_name" => "width",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Height", "js_composer"),
				"param_name" => "height",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Legend Text Color", "js_composer"),
				"param_name" => "color",
				"description" => ""
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => __("Content", "js_composer"),
				"param_name" => "content",
				"value" => "15,#eb005d,Legend One; 35,#f57fae,Legend Two; 50,#fbccdf,Legend Three",
				"description" => ""
			)

		)
) );

// Horizontal progress bar shortcode
vc_map( array(
		"name" => __("Progress Bar - Horizontal", "js_composer"),
		"base" => "progress_bar",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-progress_bar",
		"category" => __('by QODE', 'js_composer'),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Title", "js_composer"),
				"param_name" => "title",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Title Color", "js_composer"),
				"param_name" => "title_color",
				"description" => ""
			),
            array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Title Tag", "js_composer"),
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",	
					"h5" => "h5",	
					"h6" => "h6",	
				),
				"description" => ""
            ),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Percentage", "js_composer"),
				"param_name" => "percent",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Percentage Color", "js_composer"),
				"param_name" => "percent_color",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Active Background Color", "js_composer"),
				"param_name" => "active_background_color",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("No active Background Color", "js_composer"),
				"param_name" => "noactive_background_color",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Progress Bar Height (px)", "js_composer"),
				"param_name" => "height",
				"description" => ""
			)
		)
) );

// Vertical progress bar shortcode
vc_map( array(
		"name" => __("Progress Bar - Vertical", "js_composer"),
		"base" => "progress_bar_vertical",
		"icon" => "icon-wpb-vertical_progress_bar",
		"category" => __('by QODE', 'js_composer'),
		"allowed_container_element" => 'vc_row',
		"params" => array(
            array (
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Title", "js_composer"),
				"param_name" => "title",
				"description" => ""
			),
            array (
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Title Color", "js_composer"),
				"param_name" => "title_color",
				"description" => ""
			),
            array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Title Tag", "js_composer"),
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",	
					"h5" => "h5",	
					"h6" => "h6",	
				),
				"description" => ""
            ),
            array (
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Title Size", "js_composer"),
				"param_name" => "title_size",
				"description" => ""
			),
			array (
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Background Color", "js_composer"),
				"param_name" => "background_color",
				"description" => ""
			),
            array (
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Percent", "js_composer"),
				"param_name" => "percent",
				"description" => ""
			),
            array (
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Percentage Text Size", "js_composer"),
				"param_name" => "percentage_text_size",
				"description" => ""
			),
            array (
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Percentage Color", "js_composer"),
				"param_name" => "percent_color",
				"description" => ""
			),
            array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => __("Text", "js_composer"),
				"param_name" => "text",
				"value" => __("Put some content here", "js_composer"),
				"description" => ""
			)
		)
) );

// Icon Progress Bar
vc_map( array(
		"name" => __("Progress Bar - Icon", "js_composer"),
		"base" => "progress_bar_icon",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-progress_bar_icon",
		"category" => __('by QODE', 'js_composer'),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Number of Icons", "js_composer"),
				"param_name" => "icons_number",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Number of Active Icons", "js_composer"),
				"param_name" => "active_number",
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Type", "js_composer"),
				"param_name" => "type",
				"value" => array(
					"Normal" => "normal",
					"Circle" => "circle",
					"Square" => "square"	
				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Icon", "js_composer"),
				"param_name" => "icon",
				"value" => $icons,
				"description" => ""
				),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Size", "js_composer"),
				"param_name" => "size",
				"value" => array(
					"Tiny" => "tiny",
					"Small" => "small",
					"Medium" => "medium",	
					"Large" => "large",
					"Very Large" => "very_large",
				),
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Custom Size (px)", "js_composer"),
				"param_name" => "custom_size",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Icon Color", "js_composer"),
				"param_name" => "icon_color",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Icon Active Color", "js_composer"),
				"param_name" => "icon_active_color",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Background Color", "js_composer"),
				"param_name" => "background_color",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Background Active Color", "js_composer"),
				"param_name" => "background_active_color",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Border Color", "js_composer"),
				"param_name" => "border_color",
				"description" => __("Only for Square type", "js_composer"),
				"dependency" => Array('element' => "type", 'value' => array('square'))
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Border Active Color", "js_composer"),
				"param_name" => "border_active_color",
				"description" => __("Only for Square type", "js_composer"),
				"dependency" => Array('element' => "type", 'value' => array('square'))
			)
		)
) );

// Line Graph shortcode
vc_map( array(
		"name" => __("Line Graph", "js_composer"),
		"base" => "line_graph",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-line_graph",
		"category" => __('by QODE', 'js_composer'),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Type", "js_composer"),
				"param_name" => "type",
				"value" => array(
					"" => "",
					"Rounded edges" => "rounded",
					"Sharp edges" => "sharp"	
				),
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Width", "js_composer"),
				"param_name" => "width",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Height", "js_composer"),
				"param_name" => "height",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Custom Color", "js_composer"),
				"param_name" => "custom_color",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Scale steps", "js_composer"),
				"param_name" => "scalesteps",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Scale step width", "js_composer"),
				"param_name" => "scalestepwidth",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Labels", "js_composer"),
				"param_name" => "labels",
				"value" => __("Label 1, Label 2, Label 3", "js_composer")
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => __("Content", "js_composer"),
				"param_name" => "content",
				"value" => "#eb005d,Legend One,1,5,10;#f57fae,Legend Two,3,7,20;#fbccdf,Legend Three,10,2,34",
				"description" => ""
			)
		)
) );

// Pricing table shortcode
vc_map( array(
		"name" => __("Pricing Table", "js_composer"),
		"base" => "pricing_column",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-pricing_column",
		"category" => __('by QODE', 'js_composer'),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Title", "js_composer"),
				"param_name" => "title",
				"value" => __("Basic Plan", "js_composer"),
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Price", "js_composer"),
				"param_name" => "price",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Currency", "js_composer"),
				"param_name" => "currency",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Price Period", "js_composer"),
				"param_name" => "price_period",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Link", "js_composer"),
				"param_name" => "link",
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Target", "js_composer"),
				"param_name" => "target",
				"value" => array(
					"" => "",
					"Self" => "_self",
					"Blank" => "_blank",	
					"Parent" => "_parent"
				),
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Button Text", "js_composer"),
				"param_name" => "button_text",
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Active", "js_composer"),
				"param_name" => "active",
				"value" => array(
					"No" => "no",
					"Yes" => "yes"	
				),
				"description" => ""
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => __("Content", "js_composer"),
				"param_name" => "content",
				"value" => "<li>content content content</li><li>content content content</li><li>content content content</li>",
				"description" => ""
			)
		)
) );

// Social Share
vc_map( array(
		"name" => __("Social Share", "js_composer"),
		"base" => "social_share",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-social_share",
		"category" => __('by QODE', 'js_composer'),
		"allowed_container_element" => 'vc_row',
		"show_settings_on_create" => false
) );

// Custom Font
vc_map( array(
		"name" => __("Custom Font", "js_composer"),
		"base" => "custom_font",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-custom_font",
		"category" => __('by QODE', 'js_composer'),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Font family", "js_composer"),
				"param_name" => "font_family",
				"value" => __("Oswald", "js_composer")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Font size", "js_composer"),
				"param_name" => "font_size",
				"value" => "15"
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Line height", "js_composer"),
				"param_name" => "line_height",
				"value" => "26"
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Font Style", "js_composer"),
				"param_name" => "font_style",
				"value" => array(
					"Normal" => "normal",
					"Italic" => "italic"	
				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Text Align", "js_composer"),
				"param_name" => "text_align",
				"value" => array(
					"Left" => "left",
					"Center" => "center",
					"Right" => "right"	
				),
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Font weight", "js_composer"),
				"param_name" => "font_weight",
				"value" => "300"
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Color", "js_composer"),
				"param_name" => "color",
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Text decoration", "js_composer"),
				"param_name" => "text_decoration",
				"value" => array(
					"None" => "none",
					"Underline" => "underline",
					"Overline" => "overline",
					"Line Through" => "line-through"	
				),
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Background Color", "js_composer"),
				"param_name" => "background_color",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Padding (px)", "js_composer"),
				"param_name" => "padding",
				"value" => "0"
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Margin (px)", "js_composer"),
				"param_name" => "margin",
				"value" => "0"
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => __("Content", "js_composer"),
				"param_name" => "content",
				"value" => "<p>content content content</p>",
				"description" => ""
			)
		)
) );

// Ordered List
vc_map( array(
		"name" => __("List - Ordered", "js_composer"),
		"base" => "ordered_list",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-ordered_list",
		"category" => __('by QODE', 'js_composer'),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => __("Content", "js_composer"),
				"param_name" => "content",
				"value" => "<ol><li>Lorem Ipsum</li><li>Lorem Ipsum</li><li>Lorem Ipsum</li></ol>",
				"description" => ""
			)

		)
) );

// Unordered List
vc_map( array(
		"name" => __("List - Unordered", "js_composer"),
		"base" => "unordered_list",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-unordered_list",
		"category" => __('by QODE', 'js_composer'),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Style", "js_composer"),
				"param_name" => "style",
				"value" => array(
					"Circle" => "circle",
					"Number" => "number"
				),
				"description" => ""
			),
            array(
                    "type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Number Type", "js_composer"),
				"param_name" => "number_type",
				"value" => array(
					"Circle" => "circle_number",
					"Transparent" => "transparent_number"
				),
				"description" => "",
                                "dependency" => array('element' => "style", 'value' => array('number'))
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Animate List", "js_composer"),
				"param_name" => "animate",
				"value" => array(
					"No" => "no",
					"Yes" => "yes"
				),
				"description" => ""
			),
            array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Font Weight", "js_composer"),
				"param_name" => "font_weight",
				"value" => array(
                    "Default" => "",
					"Light" => "light",
					"Normal" => "normal",
                    "Bold" => "bold"
				),
				"description" => ""
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => __("Content", "js_composer"),
				"param_name" => "content",
				"value" => "<ul><li>Lorem Ipsum</li><li>Lorem Ipsum</li><li>Lorem Ipsum</li></ul>",
				"description" => ""
			)
		)
) );

// Icon
vc_map( array(
		"name" => __("Icon", "js_composer"),
		"base" => "icons",
		"category" => __('by QODE', 'js_composer'),
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-icons",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Size", "js_composer"),
				"param_name" => "size",
				"value" => array(
					"Tiny" => "fa-lg",
					"Small" => "fa-2x",
					"Medium" => "fa-3x",	
					"Large" => "fa-4x",
					"Very Large" => "fa-5x"	
				),
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Custom Size (px)", "js_composer"),
				"param_name" => "custom_size",
				"value" => ""
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Icon", "js_composer"),
				"param_name" => "icon",
				"value" => $icons,
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Type", "js_composer"),
				"param_name" => "type",
				"value" => array(
					"Normal" => "normal",
					"Circle" => "circle",
					"Square" => "square"	
				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Position", "js_composer"),
				"param_name" => "position",
				"value" => array(
					"Normal" => "",
					"Left" => "left",
					"Center" => "center",
					"Right" => "right"	
				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Border", "js_composer"),
				"param_name" => "border",
				"value" => array(
					"Yes" => "yes",
					"No" => "no"	
				),
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Border Color", "js_composer"),
				"param_name" => "border_color",
				"description" => __("Only for Square type", "js_composer"),
				"dependency" => Array('element' => "type", 'value' => array('square'))
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Icon Color", "js_composer"),
				"param_name" => "icon_color",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Background Color", "js_composer"),
				"param_name" => "background_color",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Margin", "js_composer"),
				"param_name" => "margin",
				"description" => __("Margin (top right bottom left)", "js_composer")
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Icon Animation", "js_composer"),
				"param_name" => "icon_animation",
				"value" => array(
					"No" => "",
					"Yes" => "q_icon_animation"
				),
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Icon Animation Delay (ms)", "js_composer"),
				"param_name" => "icon_animation_delay",
				"value" => "",
                "description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Link", "js_composer"),
				"param_name" => "link",
				"value" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Target", "js_composer"),
				"param_name" => "target",
				"value" => array(
					"Self" => "_self",
					"Blank" => "_blank",
					"Parent" => "_parent"	
				),
				"description" => ""
			)
		)
) );

// Social Icon 
vc_map( array(
		"name" => __("Social Icons", "js_composer"),
		"base" => "social_icons",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-social_icons",
		"category" => __('by QODE', 'js_composer'),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Icon", "js_composer"),
				"param_name" => "icon",
				"value" => array(
					"ADN" => "fa-adn",
					"Android" => "fa-android",
					"Apple" => "fa-apple",
					"Bitbucket" => "fa-bitbucket",	
					"Bitbucket-Sign" => "fa-bitbucket-sign",	
					"Bitcoin" => "fa-bitcoin",	
					"BTC" => "fa-btc",	
					"CSS3" => "fa-css3",	
					"Dribbble" => "fa-dribbble",	
					"Dropbox" => "fa-dropbox",	
					"Facebook" => "fa-facebook",	
					"Facebook-Sign" => "fa-facebook-sign",	
					"Flickr" => "fa-flickr",	
					"Foursquare" => "fa-foursquare",	
					"GitHub" => "fa-github",	
					"GitHub-Alt" => "fa-github-alt",	
					"GitHub-Sign" => "fa-github-sign",	
					"Gittip" => "fa-gittip",	
					"Google Plus" => "fa-google-plus",	
					"Google Plus-Sign" => "fa-google-plus-sign",	
					"HTML5" => "fa-html5",	
					"Instagram" => "fa-instagram",	
					"LinkedIn" => "fa-linkedin",	
					"LinkedIn-Sign" => "fa-linkedin-sign",	
					"Linux" => "fa-linux",	
					"MaxCDN" => "fa-maxcdn",	
					"Pinterest" => "fa-pinterest",	
					"Pinterest-Sign" => "fa-pinterest-sign",	
					"Renren" => "fa-renren",	
					"Skype" => "fa-skype",	
					"StackExchange" => "fa-stackexchange",	
					"Trello" => "fa-trello",	
					"Tumblr" => "fa-tumblr",	
					"Tumblr-Sign" => "fa-tumblr-sign",	
					"Twitter" => "fa-twitter",	
					"Twitter-Sign" => "fa-twitter-sign",	
					"VK" => "fa-vk",	
					"Weibo" => "fa-weibo",	
					"Windows" => "fa-windows",	
					"Xing" => "fa-xing",	
					"Xing-Sign" => "fa-xing-sign",	
					"YouTube" => "fa-youtube",	
					"YouTube Play" => "fa-youtube-play",	
					"YouTube-Sign" => "fa-youtube-sign",	
				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Size", "js_composer"),
				"param_name" => "size",
				"value" => array(
					"Small" => "fa-lg",
					"Normal" => "fa-2x",	
					"Large" => "fa-3x"	
				),
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Link", "js_composer"),
				"param_name" => "link",
				"value" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Target", "js_composer"),
				"param_name" => "target",
				"value" => array(
					"Self" => "_self",
					"Blank" => "_blank",
					"Parent" => "_parent"	
				),
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Icon Color", "js_composer"),
				"param_name" => "icon_color",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Background Color", "js_composer"),
				"param_name" => "background_color",
				"description" => ""
			)
		)
) );

// Icon with Text
vc_map( array(
		"name" => __("Icon With Text", "js_composer"),
		"base" => "icon_text",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-icon_text",
		"category" => __('by QODE', 'js_composer'),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Box type", "js_composer"),
				"param_name" => "box_type",
				"value" => array(
					"Normal" => "normal",
					"Icon in a box" => "icon_in_a_box"
				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Box Border", "js_composer"),
				"param_name" => "box_border",
				"value" => array(
					"Yes" => "yes",
					"No" => "no"	
				),
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Box Border Color", "js_composer"),
				"param_name" => "box_border_color",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Box Background Color", "js_composer"),
				"param_name" => "box_background_color",
				"description" => "",
				"dependency" => Array('element' => "box_type", 'value' => array('icon_in_a_box'))
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Icon", "js_composer"),
				"param_name" => "icon",
				"value" => $icons,
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Icon Type", "js_composer"),
				"param_name" => "icon_type",
				"value" => array(
					"Normal" => "normal",
					"Circle" => "circle",
					"Square" => "square"	
				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Icon Size", "js_composer"),
				"param_name" => "icon_size",
				"value" => array(
					"Tiny" => "fa-lg",
					"Small" => "fa-2x",
					"Medium" => "fa-3x",	
					"Large" => "fa-4x",
					"Very Large" => "fa-5x"	
				),
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Custom Icon Size (px)", "js_composer"),
				"param_name" => "custom_icon_size",
				"value" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Icon Animation", "js_composer"),
				"param_name" => "icon_animation",
				"value" => array(
					"No" => "",
					"Yes" => "q_icon_animation"
				),
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Icon Animation Delay (ms)", "js_composer"),
				"param_name" => "icon_animation_delay",
				"value" => "",
                "description" => ""
			),
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => __("Image", "js_composer"),
				"param_name" => "image"
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Icon Position", "js_composer"),
				"param_name" => "icon_position",
				"value" => array(
					"Top" => "top",
					"Left" => "left"	
				),
				"description" => __("Icon Position (only for normal box type)", "js_composer"),
				"dependency" => Array('element' => "box_type", 'value' => array('normal'))
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Icon Margin", "js_composer"),
				"param_name" => "icon_margin",
				"value" => "",
                "description" => "Margin should be set in a top right bottom left format"
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Icon Border Color", "js_composer"),
				"param_name" => "border_color",
				"description" => __("Only for Square type", "js_composer"),
				"dependency" => Array('element' => "icon_type", 'value' => array('square'))
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Icon Color", "js_composer"),
				"param_name" => "icon_color",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Icon Background Color", "js_composer"),
				"param_name" => "icon_background_color",
				"description" => __("Icon Background Color (only for square and circle icon type)", "js_composer"),
				"dependency" => Array('element' => "icon_type", 'value' => array('square','circle'))
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Title", "js_composer"),
				"param_name" => "title",
				"value" => ""
			),
            array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Title Tag", "js_composer"),
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",	
					"h5" => "h5",	
					"h6" => "h6",	
				),
				"description" => ""
            ),
            array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Title Color", "js_composer"),
				"param_name" => "title_color",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Text", "js_composer"),
				"param_name" => "text",
				"value" => ""
			),
            array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Text Color", "js_composer"),
				"param_name" => "text_color",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Link", "js_composer"),
				"param_name" => "link",
				"value" => "",
				"dependency" => Array('element' => "box_type", 'value' => array('normal'))
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Link Text", "js_composer"),
				"param_name" => "link_text",
				"value" => "",
				"dependency" => Array('element' => "box_type", 'value' => array('normal'))
			),
            array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Link Color", "js_composer"),
				"param_name" => "link_color",
				"description" => "",
				"dependency" => Array('element' => "box_type", 'value' => array('normal'))
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Target", "js_composer"),
				"param_name" => "target",
				"value" => array(
                    ""   => "",
					"Self" => "_self",
					"Blank" => "_blank",
					"Parent" => "_parent",
				),
				"description" => "",
				"dependency" => Array('element' => "box_type", 'value' => array('normal'))
            )
		)
) );

// Latest Posts 

vc_map( array(
		"name" => __("Latest Posts", "js_composer"),
		"base" => "latest_post",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-latest_post",
		"category" => __('by QODE', 'js_composer'),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Number of Posts per Row", "js_composer"),
				"param_name" => "post_number_per_row",
				"value" => array(
					"2" => "2",
					"3" => "3",
					"4" => "4"
				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Number of Rows", "js_composer"),
				"param_name" => "rows",
				"value" => array(
					"1" => "1",
					"2" => "2",
					"3" => "3"
				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Order By", "js_composer"),
				"param_name" => "order_by",
				"value" => array(
					"Menu Order" => "menu_order",
					"Title" => "title",
					"Date" => "date"
				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Order", "js_composer"),
				"param_name" => "order",
				"value" => array(
					"ASC" => "ASC",
					"DESC" => "DESC"
				),
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Category Slug", "js_composer"),
				"param_name" => "category",
				"description" => __("Leave empty for all or use comma for list", "js_composer")
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Text length", "js_composer"),
				"param_name" => "text_length",
				"description" => __("Number of caracters", "js_composer")
			),
            array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Title Tag", "js_composer"),
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",	
					"h5" => "h5",	
					"h6" => "h6",	
				),
				"description" => ""
            )
		)
) );

// Steps
vc_map( array(
		"name" => __("Steps", "js_composer"),
		"base" => "steps",
		"category" => __('by QODE', 'js_composer'),
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-steps",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Number Of Steps", "js_composer"),
				"param_name" => "number_of_steps",
				"value" => array(
                    "Deafult"   => "",
					"2" => "2",
					"3" => "3",
					"4" => "4"	
				),
				"description" => __("Number of steps in the process", "js_composer")
            ),
            array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Number Color", "js_composer"),
				"param_name" => "number_color",
				"description" => ""
            ),
            array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Number Background Color", "js_composer"),
				"param_name" => "number_background_color",
				"description" => ""
            ),
            
            //first step config
            array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => __("Image 1", "js_composer"),
				"param_name" => "image1"
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Step Number 1", "js_composer"),
				"param_name" => "step_number_1",
				"description" => ""
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Step Link 1", "js_composer"),
				"param_name" => "step_link_1",
				"description" => ""
			),
            array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Step Link Target 1", "js_composer"),
				"param_name" => "step_link_target_1",
				"value" => array(
					"Blank" => "_blank",
                    "Self"   => "_self",
					"Parent" => "_parent",
					"Top" => "_top"
				),
				"description" => ""
            ),
            
            //second step config
            array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => __("Image 2", "js_composer"),
				"param_name" => "image2"
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Step Number 2", "js_composer"),
				"param_name" => "step_number_2",
				"description" => ""
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Step Link 2", "js_composer"),
				"param_name" => "step_link_2",
				"description" => ""
			),
            array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Step Link Target 2", "js_composer"),
				"param_name" => "step_link_target_2",
				"value" => array(
					"Blank" => "_blank",
                    "Self"   => "_self",
					"Parent" => "_parent",
					"Top" => "_top"
				),
				"description" => ""
            ),
            
            
            //third step config
            array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => __("Image 3", "js_composer"),
				"param_name" => "image3"
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Step Number 3", "js_composer"),
				"param_name" => "step_number_3",
				"description" => "",
                "dependency" => array('element' => "number_of_steps", 'value' => array('' ,'3', '4'))
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Step Link 3", "js_composer"),
				"param_name" => "step_link_3",
				"description" => "",
                "dependency" => array('element' => "number_of_steps", 'value' => array('' ,'3', '4'))
			),
            array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Step Link Target 3", "js_composer"),
				"param_name" => "step_link_target_3",
				"value" => array(
					"Blank" => "_blank",
                    "Self"   => "_self",
					"Parent" => "_parent",
					"Top" => "_top"
				),
				"description" => ""
            ),
            
            //fourth step config
            array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => __("Image 4", "js_composer"),
				"param_name" => "image4"
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Step Number 4", "js_composer"),
				"param_name" => "step_number_4",
				"description" => "",
                "dependency" => array('element' => "number_of_steps", 'value' => array('' , '4'))
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Step Link 4", "js_composer"),
				"param_name" => "step_link_4",
				"description" => "",
                "dependency" => array('element' => "number_of_steps", 'value' => array('' , '4'))
			),
            array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Step Link Target 4", "js_composer"),
				"param_name" => "step_link_target_4",
				"value" => array(
					"Blank" => "_blank",
                    "Self"   => "_self",
					"Parent" => "_parent",
					"Top" => "_top"
				),
				"description" => ""
            )
		)
) );

// Image with text over
vc_map( array(
		"name" => __("Image With Text Over", "js_composer"),
		"base" => "image_with_text_over",
		"category" => __('by QODE', 'js_composer'),
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-image_with_text_over",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Width", "js_composer"),
				"param_name" => "width",
				"value" => array(
                    ""   => "",
                    "1/2" => "one_half",
					"1/3" => "one_third",
					"1/4" => "one_fourth",
				),
				"description" => ""
            ),
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => __("Image", "js_composer"),
				"param_name" => "image"
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Icon", "js_composer"),
				"param_name" => "icon",
				"value" => $icons,
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Icon Size", "js_composer"),
				"param_name" => "icon_size",
				"value" => array(
					"Tiny" => "fa-lg",
					"Small" => "fa-2x",
					"Medium" => "fa-3x",	
					"Large" => "fa-4x",
					"Very Large" => "fa-5x"
				),
				"description" => ""
            ),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Icon Color", "js_composer"),
				"param_name" => "icon_color",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Title", "js_composer"),
				"param_name" => "title",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Title Color", "js_composer"),
				"param_name" => "title_color",
				"description" => ""
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Title Size (px)", "js_composer"),
				"param_name" => "title_size",
				"description" => ""
			),
            array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Title Tag", "js_composer"),
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",	
					"h5" => "h5",	
					"h6" => "h6",	
				),
				"description" => ""
            ),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => __("Content", "js_composer"),
				"param_name" => "content",
				"value" => "<p>".__("I am test text for Image with text shortcode.", "js_composer")."</p>",
				"description" => ""
			)
		)
) );

/**
 * Service shortcode
 */
vc_map( array(
		"name" => __("Service", "js_composer"),
		"base" => "service",
		"category" => __('by QODE', 'js_composer'),
		"icon" => "icon-wpb-service",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Type", "js_composer"),
				"param_name" => "type",
                                "value" => array(
					"" => "",
					"Top" => "top",
					"Left" => "left"
				)
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Title", "js_composer"),
				"param_name" => "title",
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => __("Title Color", "js_composer"),
				"param_name" => "color",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Link", "js_composer"),
				"param_name" => "link",
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Target", "js_composer"),
				"param_name" => "target",
				"description" => "",
                                "value" => array(
					"" => "",
					"Self" => "_self",
					"Blank" => "_blank"
				)
			),
            array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Animate", "js_composer"),
				"param_name" => "animate",
				"description" => "",
                "value" => array(
					"" => "",
					"Yes" => "yes",
					"No" => "no"
				)
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => __("Content", "js_composer"),
				"param_name" => "content",
				"value" => "<p>I am test text for service shortcode.</p>",
				"description" => ""
			)
		)
) );

// Image hover
vc_map( array(
		"name" => __("Image Hover", "js_composer"),
		"base" => "image_hover",
		"category" => __('by QODE', 'js_composer'),
		"icon" => "icon-wpb-image_hover",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => __("Image", "js_composer"),
				"param_name" => "image"
			),
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => __("Hover Image", "js_composer"),
				"param_name" => "hover_image"
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Link", "js_composer"),
				"param_name" => "link",
				"description" => ""
			),
            array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Animation", "js_composer"),
				"param_name" => "animation",
				"description" => "",
                "value" => array(
                    "" => "",
                    "Yes" => "yes",
                    "No" => "no"
                )
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Transition delay", "js_composer"),
				"param_name" => "transition_delay",
				"description" => "",
                "dependency" => array('element' => "animation", 'value' => array("yes"))
			)
		)
) );

/***************** Woocommerce Shortcodes *********************/

if(function_exists("is_woocommerce")){

/**** Order Tracking ***/

vc_map( array(
		"name" => __("Order Tracking", "js_composer"),
		"base" => "woocommerce_order_tracking",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-woocommerce_order_tracking",
		"category" => __('Woocommerce', 'js_composer'),
		"allowed_container_element" => 'vc_row',
		 "show_settings_on_create" => false
));

/*** Product price/cart button ***/
	
vc_map( array(
		"name" => __("Product price/cart button", "js_composer"),
		"base" => "add_to_cart",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-add_to_cart",
		"category" => __('Woocommerce', 'js_composer'),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("ID", "js_composer"),
				"param_name" => "id",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("SKU", "js_composer"),
				"param_name" => "sku",
				"description" => ""
			)
		)
) );

/*** Product by SKU/ID ***/
	
vc_map( array(
		"name" => __("Product by SKU/ID", "js_composer"),
		"base" => "product",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-product",
		"category" => __('Woocommerce', 'js_composer'),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("ID", "js_composer"),
				"param_name" => "id",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("SKU", "js_composer"),
				"param_name" => "sku",
				"description" => ""
			)
		)
) );


/*** Products by SKU/ID ***/
	
vc_map( array(
		"name" => __("Products by SKU/ID", "js_composer"),
		"base" => "products",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-products",
		"category" => __('Woocommerce', 'js_composer'),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("IDS", "js_composer"),
				"param_name" => "ids",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("SKUS", "js_composer"),
				"param_name" => "skus",
				"description" => ""
			)
		)
) );

/*** Product categories ***/
	
vc_map( array(
		"name" => __("Product categories", "js_composer"),
		"base" => "product_categories",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-product_categories",
		"category" => __('Woocommerce', 'js_composer'),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Number", "js_composer"),
				"param_name" => "number",
				"description" => ""
			)
		)
) );

/*** Products by category slug ***/
	
vc_map( array(
		"name" => __("Products by category slug", "js_composer"),
		"base" => "product_category",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-product_category",
		"category" => __('Woocommerce', 'js_composer'),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Category", "js_composer"),
				"param_name" => "category",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Per Page", "js_composer"),
				"param_name" => "per_page",
				"value" => "12"
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Columns", "js_composer"),
				"param_name" => "columns",
				"value" => "4"
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Order By", "js_composer"),
				"param_name" => "order_by",
				"value" => array(
					"Date" => "date",
					"Title" => "title",
				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Order", "js_composer"),
				"param_name" => "order",
				"value" => array(
					"DESC" => "desc",
					"ASC" => "asc"
				),
				"description" => ""
			),
		)
) );

/*** Recent products ***/
	
vc_map( array(
		"name" => __("Recent products", "js_composer"),
		"base" => "recent_products",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-recent_products",
		"category" => __('Woocommerce', 'js_composer'),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Per Page", "js_composer"),
				"param_name" => "per_page",
				"value" => "12"
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Columns", "js_composer"),
				"param_name" => "columns",
				"value" => "4"
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Order By", "js_composer"),
				"param_name" => "order_by",
				"value" => array(
					"Date" => "date",
					"Title" => "title",
				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Order", "js_composer"),
				"param_name" => "order",
				"value" => array(
					"DESC" => "desc",
					"ASC" => "asc"
				),
				"description" => ""
			),
		)
) );

/*** Featured products ***/
	
vc_map( array(
		"name" => __("Featured products", "js_composer"),
		"base" => "featured_products",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-featured_products",
		"category" => __('Woocommerce', 'js_composer'),
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Per Page", "js_composer"),
				"param_name" => "per_page",
				"value" => "12"
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Columns", "js_composer"),
				"param_name" => "columns",
				"value" => "4"
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Order By", "js_composer"),
				"param_name" => "order_by",
				"value" => array(
					"Date" => "date",
					"Title" => "title",
				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __("Order", "js_composer"),
				"param_name" => "order",
				"value" => array(
					"DESC" => "desc",
					"ASC" => "asc"
				),
				"description" => ""
			),
		)
) );

/**** Shop Messages ***/

vc_map( array(
		"name" => __("Shop Messages", "js_composer"),
		"base" => "woocommerce_messages",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-woocommerce_messages",
		"category" => __('Woocommerce', 'js_composer'),
		"allowed_container_element" => 'vc_row',
		 "show_settings_on_create" => false
));

/**** Cart ***/

vc_map( array(
		"name" => __("Pages - Cart", "js_composer"),
		"base" => "woocommerce_cart",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-woocommerce_cart",
		"category" => __('Woocommerce', 'js_composer'),
		"allowed_container_element" => 'vc_row',
		 "show_settings_on_create" => false
));

/**** Checkout ***/

vc_map( array(
		"name" => __("Pages - Checkout", "js_composer"),
		"base" => "woocommerce_checkout",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-woocommerce_checkout",
		"category" => __('Woocommerce', 'js_composer'),
		"allowed_container_element" => 'vc_row',
		 "show_settings_on_create" => false
));

/**** My Account ***/

vc_map( array(
		"name" => __("Pages - My Account", "js_composer"),
		"base" => "woocommerce_my_account",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-woocommerce_my_account",
		"category" => __('Woocommerce', 'js_composer'),
		"allowed_container_element" => 'vc_row',
		 "show_settings_on_create" => false
));

/**** Edit Address ***/

vc_map( array(
		"name" => __("Pages - Edit Address", "js_composer"),
		"base" => "woocommerce_edit_address",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-woocommerce_edit_address",
		"category" => __('Woocommerce', 'js_composer'),
		"allowed_container_element" => 'vc_row',
		 "show_settings_on_create" => false
));

/**** Change Password ***/

vc_map( array(
		"name" => __("Pages - Change Password", "js_composer"),
		"base" => "woocommerce_change_password",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-woocommerce_change_password",
		"category" => __('Woocommerce', 'js_composer'),
		"allowed_container_element" => 'vc_row',
		 "show_settings_on_create" => false
));

/**** View Order ***/

vc_map( array(
		"name" => __("Pages - View Order", "js_composer"),
		"base" => "woocommerce_view_order",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-woocommerce_view_order",
		"category" => __('Woocommerce', 'js_composer'),
		"allowed_container_element" => 'vc_row',
		 "show_settings_on_create" => false
));

/**** Pay ***/

vc_map( array(
		"name" => __("Pages - Pay", "js_composer"),
		"base" => "woocommerce_pay",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-woocommerce_pay",
		"category" => __('Woocommerce', 'js_composer'),
		"allowed_container_element" => 'vc_row',
		 "show_settings_on_create" => false
));

/**** Thankyou ***/

vc_map( array(
		"name" => __("Pages - Thankyou", "js_composer"),
		"base" => "woocommerce_thankyou",
		'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
		"icon" => "icon-wpb-woocommerce_thankyou",
		"category" => __('Woocommerce', 'js_composer'),
		"allowed_container_element" => 'vc_row',
		 "show_settings_on_create" => false
));

}
?>