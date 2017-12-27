<?php
if (!function_exists('register_button')){
function register_button( $buttons ){
   array_push( $buttons, "|", "qode_shortcodes" );
   return $buttons;
}
}

if (!function_exists('add_plugin')){
function add_plugin( $plugin_array ) {
   $plugin_array['qode_shortcodes'] = get_template_directory_uri() . '/includes/shortcodes/qode_shortcodes.js';
   return $plugin_array;
}
}

if (!function_exists('qode_shortcodes_button')){
function qode_shortcodes_button(){
   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
      return;
   }

   if ( get_user_option('rich_editing') == 'true' ) {
      add_filter( 'mce_external_plugins', 'add_plugin' );
      add_filter( 'mce_buttons', 'register_button' );
   }
}
}
add_action('init', 'qode_shortcodes_button');


if (!function_exists('num_shortcodes')){
function num_shortcodes($content){ 
    $columns = substr_count( $content, '[pricing_cell' );
	return $columns;
}
}

/* Action shortcode */

if (!function_exists('action')) {
function action($atts, $content = null) {
	extract(shortcode_atts(array("type"=>"","background_color"=>"","border_color" => "","link" => "","target" => "","link_text" => "","link_text_color" => "","link_background_color" => ""), $atts));
	$html =  "<div class='q_call_to_action ".$type."'";
	if($background_color != "" || $border_color != ""){
		$html .= " style='";
		if($background_color != ""){
			$html .= "background-color: $background_color;";
		}
		if($border_color != ""){
			$html .= "border-color: $border_color;";
		}
		$html .= "'";
	}
	$html .= ">";

    $html .= "<div class='two_columns_75_25 clearfix'><div class='column1'><div class='column_inner'>".$content."</div></div>";
    $html .= "<div class='column2'><div class='column_inner'><a class='qbutton tiny' href='".$link."' target='".$target."' style='";
    if($link_text_color != "" || $link_background_color != ""){
        if($link_text_color != ""){
            $html .= "color: $link_text_color;";
        }
        if($link_background_color != ""){
            $html .= " background-color: $link_background_color;";
        }
    }
    $html .= "'>".$link_text."</a></div></div>";

	$html .= "</div>";
  return $html;
}
}
add_shortcode('action', 'action');

/* Accordion shortcode */

if (!function_exists('accordion')) {
function accordion($atts, $content = null) {
    extract(shortcode_atts(array("accordion_type"=>""), $atts));
    return "<div class='q_accordion_holder $accordion_type clearfix'>" . $content . "</div>";
}
}
add_shortcode('accordion', 'accordion');

/* Accordion item shortcode */

if (!function_exists('accordion_item')) {
function accordion_item($atts, $content = null) {
    extract(shortcode_atts(array("caption"=>"","title_color"=>"","icon"=>"","icon_color"=>"","background_color"=>""), $atts));
    $html           = '';
    $heading_styles = '';
    $no_icon        = '';

    if($icon == "") {
        $no_icon = 'no_icon';
    }

    if($title_color != "") {
        $heading_styles .= "color: ".$title_color.";";
    }

    if($background_color != "") {
        $heading_styles .= " background-color: ".$background_color.";";
    }

    $html .= "<h5 style='".$heading_styles."'>";
    if($icon != "") {
        $html .= '<div class="icon-wrapper"><i class="fa '.$icon.'" style="color: '.$icon_color.';"></i></div>';
    }
    $html .= "<div class='accordion_mark'></div><span class='tab-title'>".$caption."</span><span class='accordion_icon_mark'></span></h5><div class='accordion_content ".$no_icon."'><div class='accordion_content_inner'>" . $content . "</div></div>";

    return $html;
}
}
add_shortcode('accordion_item', 'accordion_item');

/* Blockquote item shortcode */

if (!function_exists('blockquote')) {
function blockquote($atts, $content = null) {
    $args = array(
        "text"              => "",
        "text_color"        => "",
        "width"             => "",
        "line_height"       => "", 
        "background_color"  => "",
        "border_color"      => ""
    );
    
    extract(shortcode_atts($args, $atts));
    
    //init variables
    $html               = "";
    $blockquote_styles  = "";
    $heading_styles     = "";

    if($width != "") {
        $blockquote_styles .= "width: ".$width."%;";
    }

    if($border_color != "") {
        $blockquote_styles .= "border-left-color: ".$border_color.";";
    }
    
    if($background_color != "") {
        $blockquote_styles .= "background-color: ".$background_color.";";
    }
    
    if($text_color != "") {
        $heading_styles .= "color: ".$text_color.";";
    }

    if($line_height != "") {
        $heading_styles .= " line-height: ".$line_height."px;";
    }

    $html .= "<blockquote style='".$blockquote_styles."'>"; //open blockquote
    $html .= "<h4 style='".$heading_styles."'>".$text."</h4>";
    $html .= "</blockquote>"; //close blockquote
    return $html;
}
}
add_shortcode('blockquote', 'blockquote');

/* Bordered box shortcode */

if (!function_exists('bordered_box')) {
function bordered_box($atts, $content = null) {
    extract(shortcode_atts(array("background_color"=>"","border_color"=>""), $atts));
    $html = '';
    $html .= '<div class="q_box_holder" ';
    if($background_color != "" || $border_color != ""){
        $html .= 'style="';
        if($background_color != ""){
            $html .= 'background-color:'.$background_color.';';
        }
        if($border_color != ""){
            $html .= 'border-color:'.$border_color.';';
        }
        $html .= '"';
    }
    $html .= '><div class="box_holder_inner center">';
    $html .= $content;
    $html .= '</div></div>';
    return $html;
}
}
add_shortcode('bordered_box', 'bordered_box');

/* Buttons shortcode */

if (!function_exists('button')) {
function button($atts, $content = null) {
	global $qode_options_elision;
        
        $args = array(
            "size"              => "", 
            "text"              => "",
            "icon"              => "",
            "icon_size"         => "",
            "icon_color"        => "",
            "link"              => "",
            "target"            => "",
            "color"             => "",
            "background_color"  => "",
            "border_color"      => "",
            "font_style"        => "",
            "font_weight"       => "",
            "text_align"        => ""
        );
        
	extract(shortcode_atts($args, $atts));
        
	if($target == ""){
		$target = "_self";
	}
        
    //init variables
    $html  = "";
    $button_classes = "qbutton ";
    $button_styles  = "";
    $add_icon       = "";
    
    if($size != "") {
        $button_classes .= " {$size}";
    }

    if($text_align != "") {
        $button_classes .= " {$text_align}";
    }
    
    if($color != ""){
        $button_styles .= 'color: '.$color.'; ';
    }
    
    if($background_color != ""){
        $button_styles .= 'background-color: '.$background_color.'; ';
    }
    
    if($border_color != ""){
        $button_styles .= 'border: 1px solid '.$border_color.'; ';
    }
    
    if($font_style != ""){
        $button_styles .= 'font-style: '.$font_style.'; ';
    }

    if($font_weight != ""){
        $button_styles .= 'font-weight: '.$font_weight.'; ';
    }

    if($icon != ""){
        $icon_style = "";
        if($icon_color != ""){
            $icon_style .= 'color: '.$icon_color.';';
        }
        $add_icon .= '<i class="fa '.$icon.' '.$icon_size.'" style="'.$icon_style.'"></i>';
    }
            
    $html .=  '<a href="'.$link.'" target="'.$target.'" class="'.$button_classes.'" style="'.$button_styles.'">'.$text.$add_icon.'</a>';

    return $html;
}
}
add_shortcode('button', 'button');

/* Counter shortcode */

if (!function_exists('counter')) {
function counter($atts, $content = null) {
	extract(shortcode_atts(array("type"=>"","position"=>"","digit"=>"","font_size"=>"","font_color"=>""), $atts));
    $html = "";  
		$html .=  '<div class="q_counter_holder '.$position.'"><span class="counter '.$type.'"';
		if($font_color != "" || $font_size != ""){
			$html .= ' style="color:'.$font_color.'; font-size:'.$font_size.'px; height:'.$font_size.'px; line-height:'.$font_size.'px;"';
		} 
		$html .= '>'.$digit.'</span>'.$content.'</div>';
    return $html;
}
}
add_shortcode('counter', 'counter');

/* Custom font shortcode */

if (!function_exists('custom_font')) {
function custom_font($atts, $content = null) {
	extract(shortcode_atts(array("font_family"=>"","font_size"=>"","line_height"=>"","font_style"=>"","font_weight"=>"","color"=>"","text_decoration"=>"","background_color"=>"","padding"=>"","margin"=>"","text_align"=>"left"), $atts));
    $html = '';  
	$html .= '<span class="custom_font_holder" style="';
	if($font_family != ""){
		$html .= 'font-family: '.$font_family.';';
	}
	if($font_size != ""){
		$html .= ' font-size: '.$font_size.'px;';
	}
	if($line_height != ""){
		$html .= ' line-height: '.$line_height.'px;';
	}
	if($font_style != ""){
		$html .= ' font-style: '.$font_style.';';
	}
	if($font_weight != ""){
		$html .= ' font-weight: '.$font_weight.';';
	}
	if($color != ""){
		$html .= ' color: '.$color.';';
	}
	if($text_decoration != ""){
		$html .= ' text-decoration: '.$text_decoration.';';
	}
	if($background_color != ""){
		$html .= ' background-color: '.$background_color.';';
	}
	if($padding != ""){
		$html .= ' padding: '.$padding.';';
	}
	if($margin != ""){
		$html .= ' margin: '.$margin.';';
	}
	$html .= ' text-align: ' . $text_align . ';';
	$html .= '">'.$content.'</span>';
    return $html;
}
}
add_shortcode('custom_font', 'custom_font');

/* Dropcaps shortcode */

if (!function_exists('dropcaps')) {
    function dropcaps($atts, $content = null) {
        $args = array(
            "color"             => "",
            "background_color"  => "",
            "border_color"      => "",
            "type"              => ""
        );
        extract(shortcode_atts($args, $atts));

        $html = "<span class='q_dropcap ".$type."' style='";
        if($background_color != ""){
                $html .= "background-color: $background_color;";
        }
        if($color != ""){
                $html .= " color: $color;";
        }
        if($border_color != ""){
                $html .= " border-color: $border_color;";
        }
        $html .= "'>" . $content  . "</span>";

        return $html;
    }
}
add_shortcode('dropcaps', 'dropcaps');

/* Highlights shortcode */

if (!function_exists('highlight')) {
function highlight($atts, $content = null) {
	extract(shortcode_atts(array("color"=>"","background_color"=>""), $atts));
	$html =  "<span class='highlight'";
	if($color != "" || $background_color != ""){
		$html .= " style='color: ".$color."; background-color:".$background_color.";'";
	}
	$html .= ">" . $content . "</span>";  
    return $html;
}
}
add_shortcode('highlight', 'highlight');

//Icon shortcode
if(!function_exists('icons')) {
    function icons($atts, $content = null) {
        $default_atts = array(
            "size"                 => "", 
            "custom_size"          => "", 
            "icon"                 => "", 
            "type"                 => "", 
            "position"             => "",
            "border"               => "", 
            "border_color"         => "", 
            "border_color"         => "", 
            "icon_color"           => "", 
            "background_color"     => "",
            "margin"               => "",
            "icon_animation"       => "",
            "icon_animation_delay" => "",
            "link"                 => "",
            "target"               => ""
        );
        
        extract(shortcode_atts($default_atts, $atts));
        
        $html = "";
        if($icon != "") {
        
            //generate inline icon styles
            $style = '';
            $style_normal = '';
            $icon_stack_classes = '';
            $animation_delay_style = '';
            
            //generate icon stack styles
            $icon_stack_style = '';
            $icon_stack_base_style = '';
            $icon_stack_circle_styles = '';
            $icon_stack_square_styles = '';
            $icon_stack_normal_style  = '';

            if($custom_size != "") {
                $style .= 'font-size: '.$custom_size;
                $icon_stack_circle_styles .= 'font-size: '.$custom_size;
                $icon_stack_square_styles .= 'font-size: '.$custom_size;
                
                if(!strstr($custom_size, 'px')) {
                    $style .= 'px;';
                    $icon_stack_circle_styles .= 'px;';
                    $icon_stack_square_styles .= 'px;';
                }
            }

            if($icon_color != "") {
                $style .= 'color: '.$icon_color.';';
            }

            if($position != "") {
                $icon_stack_classes .= 'pull-'.$position;
            }   

            if($background_color != "") {
                $icon_stack_base_style .= 'color: '.$background_color.';';
                $icon_stack_style .= 'background-color: '.$background_color.';';
                $icon_stack_square_styles .= 'background-color: '.$background_color.';';
            }

            if($border == 'yes' && $border_color != "") {
                $icon_stack_style .= 'border: 1px solid '.$border_color.';';
            }

            if($icon_animation_delay != ""){
                $animation_delay_style .= 'transition-delay: '.$icon_animation_delay.'ms; -webkit-transition-delay: '.$icon_animation_delay.'ms; -moz-transition-delay: '.$icon_animation_delay.'ms; -o-transition-delay: '.$icon_animation_delay.'ms;';
            }
            
            if($margin != "") {
                $icon_stack_style .= 'margin: '.$margin.';';
                $icon_stack_circle_styles .= 'margin: '.$margin.';';
                $icon_stack_normal_style .= 'margin: '.$margin.';';
            }

            switch ($type) {
                case 'circle':
                    $html = '<span class="fa-stack q_font_awsome_icon_stack '.$size.' '.$icon_stack_classes.' '.$icon_animation.'" style="'.$icon_stack_circle_styles.' '.$animation_delay_style.'">';
                    if($link != ""){
                        $html .= '<a href="'.$link.'" target="'.$target.'">';
                    }
                    $html .= '<i class="fa fa-circle fa-stack-base fa-stack-2x" style="'.$icon_stack_base_style.'"></i>';
                    $html .= '<i class="fa '.$icon.' fa-stack-1x" style="'.$style.'"></i>';
                    break;
                case 'square':
                    $html = '<span class="fa-stack q_font_awsome_icon_square '.$size.' '.$icon_stack_classes.' '.$icon_animation.'" style="'.$icon_stack_style.$icon_stack_square_styles.' '.$animation_delay_style.'">';
                    if($link != ""){
                        $html .= '<a href="'.$link.'" target="'.$target.'">';
                    }
                    $html .= '<i class="fa '.$icon.'" style="'.$style.'"></i>';
                    break;
                default:
                    $html = '<span class="q_font_awsome_icon '.$size.' '.$icon_stack_classes.' '.$icon_animation.'" style="'.$icon_stack_normal_style.' '.$animation_delay_style.'">';
                    if($link != ""){
                        $html .= '<a href="'.$link.'" target="'.$target.'">';
                    }
                    $html .= '<i class="fa '.$icon.'" style="'.$style.'"></i>';
                    break;
            }

            if($link != ""){
                $html .= '</a>';
            }

            $html.= '</span>';
        }
        return $html;
    }
}
add_shortcode('icons', 'icons');

/* Icon text */

if(!function_exists('icon_text')) {
    function icon_text($atts, $content = null) {
        $default_atts = array(
            "icon_size"             => "", 
            "custom_icon_size"      => "", 
            "icon"                  => "",
            "icon_animation"        => "",
            "icon_animation_delay"  => "",
            "image"                 => "",
            "icon_type"             => "", 
            "icon_position"         => "",
            "icon_border"           => "", 
            "icon_border_color"     => "", 
            "icon_margin"           => "",
            "border_color"          => "", 
            "icon_color"            => "", 
            "icon_background_color" => "",
            "box_type"              => "",
            "box_border"            => "",
            "box_border_color"      => "",
            "box_background_color"  => "",
            "title"                 => "",
            "title_tag"             => "h4",
            "title_color"           => "",
            "text"                  => "",
            "text_color"            => "",
            "link"                  => "",
            "link_text"             => "",
            "link_color"            => "",
            "target"                => ""
        );
        
        extract(shortcode_atts($default_atts, $atts));
        
        $headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');
                
        //get correct heading value. If provided heading isn't valid get the default one
        $title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];
                                
        //init icon styles
        $style = '';
        $icon_stack_classes = '';
        
        
        //init icon stack styles
        $icon_margin_style       = '';
        $icon_stack_square_style = '';
        $icon_stack_base_style   = '';
        $icon_stack_style   = '';
        $img_styles              = '';
        $animation_delay_style   = '';

        //generate inline icon styles
        if($custom_icon_size != "") {
            $icon_stack_style .= 'font-size: '.$custom_icon_size.'px;';
        } 

        if($icon_color != "") {
            $style .= 'color: '.$icon_color.';';
        }

        //generate icon stack styles
        if($icon_background_color != "") {
            $icon_stack_base_style .= 'color: '.$icon_background_color.';';
            $icon_stack_square_style .= 'background-color: '.$icon_background_color.';';
        } 

        if($icon_border == 'yes' && $icon_border_color != "") {
            $icon_stack_style .= 'border: 1px solid '.$icon_border_color.';';
        }
        
        if($icon_margin != "") {
            $icon_margin_style .= "margin: ".$icon_margin.";";
            $img_styles       .= "margin: ".$icon_margin.";";
        }

        if($icon_animation_delay != ""){
            $animation_delay_style .= 'transition-delay: '.$icon_animation_delay.'ms; -webkit-transition-delay: '.$icon_animation_delay.'ms; -moz-transition-delay: '.$icon_animation_delay.'ms; -o-transition-delay: '.$icon_animation_delay.'ms;';
        }
                
        $box_size = '';
        //generate icon text holder styles and classes
        
        //map value of the field to the actual class value
        switch ($icon_size) {
            case 'large': //smallest icon size
                $box_size = 'tiny';
                break;
            case 'fa-2x':
                $box_size = 'small';
                break;
            case 'fa-3x':
                $box_size = 'medium';
                break;
            case 'fa-4x':
                $box_size = 'large';
                break;
            case 'fa-5x':
                $box_size = 'very_large';
                break;    
            default:
                $box_size = 'tiny';
        }
        
        if($image != "") {
            $icon_type = 'image';
        }
        
        $box_icon_type = '';
        switch ($icon_type) {
            case 'square':
                $box_icon_type = ' square';
                break;
            case 'circle':
                $box_icon_type = ' circle';
                break;
            case 'image':
                if($box_type == 'normal') {
                    $box_icon_type = ' icon_image';
                } else {
                    $box_icon_type = ' image';
                }
                break;
        }
        
        $html = "";
        $html_icon = "";
        
        if($image == "") {
            //genererate icon html
            switch ($icon_type) {
                case 'circle':
                    //if custom icon size is set and if it is larger than large icon size
                    if($custom_icon_size != "" && $custom_icon_size > 52) {
                        //add custom font class that has smaller inner icon font
                        $icon_stack_classes .= ' custom-font';
                    } 
                    
                    $html_icon .= '<span class="fa-stack '.$icon_size.' '.$icon_stack_classes.'" style="'.$icon_stack_style.'">';
                    $html_icon .= '<i class="fa fa-circle fa-stack-base fa-stack-2x" style="'.$icon_stack_base_style.'"></i>';
                    $html_icon .= '<i class="fa '.$icon.' fa-stack-1x" style="'.$style.'"></i>';
                    $html_icon .= '</span>';
                    break;
                case 'square':
                    //if custom icon size is set and if it is larget than large icon size
                    if($custom_icon_size != "" && $custom_icon_size > 52) {
                        //add custom font class that has smaller inner icon font
                        $icon_stack_classes .= ' custom-font';
                    } 
                    
                    $html_icon .= '<span class="fa-stack '.$icon_size.' '.$icon_stack_classes.'" style="'.$icon_stack_style.$icon_stack_square_style.'">';
                    $html_icon .= '<i class="fa '.$icon.'" style="'.$style.'"></i>';
                    $html_icon .= '</span>';
                    break;
                default:
                    $html_icon .= '<span style="'.$icon_stack_style.'" class="font_awsome_icon '.$icon_size.' '.$icon_stack_classes.'">';
                    $html_icon .= '<i class="fa '.$icon.'" style="'.$style.'"></i>';
                    $html_icon .= '</span>';
                    break;
            }    
        } else {
            if(is_numeric($image)) {
                $image_src = wp_get_attachment_url( $image ); 
            }else {
                $image_src = $image; 
            }
            $html_icon = '<img style="'.$img_styles.'" src="'.$image_src.'" alt="">';
        }
        
        $title_style = "";
        if($title_color != "") {
            $title_style .= "color: ".$title_color;
        }
        
        $text_style = "";
        if($text_color != "") {
            $text_style .= "color: ".$text_color;
        }
        
        //generate normal type of a box html
        if($box_type == "normal") {   
            
            //init icon text wrapper styles
            $icon_with_text_clasess = '';
            $icon_with_text_style   = '';
            $icon_text_inner_style = '';
            
            $icon_with_text_clasess .= $box_size;
            $icon_with_text_clasess .= ' '.$box_icon_type;
            
            if($box_border == "yes") {
                $icon_with_text_clasess .= ' with_border_line';
            }
            
            if($box_border == "yes" && $box_border_color != "") {
                $icon_text_inner_style .= 'border-color: '.$box_border_color;
            }         

            if($icon_position == "" || $icon_position == "top") {
                $icon_with_text_clasess .= " center";
            }
            
            $html .= "<div class='q_icon_with_title ".$icon_with_text_clasess."'>";
            
            //generate icon holder html part with icon
            $html .= '<div class="icon_holder '.$icon_animation.'" style="'.$icon_margin_style.' '.$animation_delay_style.'">';
            $html .= $html_icon;
            $html .= '</div>'; //close icon_holder

            //generate text html
            $html .= '<div class="icon_text_holder">';
            $html .= '<div class="icon_text_inner" style="'.$icon_text_inner_style.'">';
            $html .= '<'.$title_tag.' class="icon_title" style="'.$title_style.'">'.$title.'</'.$title_tag.'>';
            $html .= "<p style='".$text_style."'>".$text."</p>";
            if($link != ""){
                if($target == ""){
                    $target = "_self";
                }

                if($link_text == ""){
                    $link_text = "Read More";
                }

                $html .= "<a class='icon_with_title_link' href='".$link."' target='".$target."' style='color: ".$link_color.";'>".$link_text."</a>";
            }
            $html .= '</div>';  //close icon_text_inner
            $html .= '</div>'; //close icon_text_holder

            $html.= '</div>'; //close icon_with_title     
        } else {
            //init icon text wrapper styles
            $icon_with_text_clasess = '';
            $box_holder_styles = '';
            
            if($box_border_color != "") {
                $box_holder_styles .= 'border-color: '.$box_border_color.';';
            } 
            
            if($box_background_color != "") {
                $box_holder_styles .= 'background-color: '.$box_background_color.';';
            }
            
            $icon_with_text_clasess .= $box_size;
            $icon_with_text_clasess .= ' '.$box_icon_type;
            
            $html .= '<div class="q_box_holder with_icon" style="'.$box_holder_styles.'">';
            
            $html .= '<div class="box_holder_icon">';
            $html .= '<div class="box_holder_icon_inner '.$icon_with_text_clasess.' '.$icon_animation.'" style="'.$animation_delay_style.'">';
            $html .= $html_icon;
            $html .= '</div>'; //close box_holder_icon_inner
            $html .= '</div>'; //close box_holder_icon
            
            //generate text html
            $html .= '<div class="box_holder_inner center">';
            $html .= '<'.$title_tag.' class="icon_title" style="'.$title_style.'">'.$title.'</'.$title_tag.'>';
            $html .= '<span class="separator transparent" style="margin: 8px 0;"></span>';
            $html .= '<p style="'.$text_style.'">'.$text.'</p>';
            $html .= '</div>'; //close box_holder_inner
                        
            $html .= '</div>'; //close box_holder
        }
        
        return $html;
        
    }
}
add_shortcode('icon_text', 'icon_text');

/* Image hover shortcode */

if (!function_exists('image_hover')) {

    function image_hover($atts, $content = null) {
        $args = array(
            "image"             => "",
            "hover_image"       => "",
            "link"              => "",
            "animation"         => "",
            "transition_delay"  => ""
        );

        extract(shortcode_atts($args, $atts));
                
        //init variables
        $html               = "";
        $image_classes      = "";
        $image_src          = $image;
        $hover_image_src    = $hover_image;
        $images_styles      = "";
                                        
        if (is_numeric($image)) {
            $image_src = wp_get_attachment_url($image);
        }
                        
        if (is_numeric($hover_image)) {
            $hover_image_src = wp_get_attachment_url($hover_image);
        }
        
        if($hover_image_src != "") {
            $image_classes .= "active_image ";
        }
        
        $css_transition_delay = ($transition_delay != "" && $transition_delay > 0) ? $transition_delay / 1000 . "s" : "";
        
        $animate_class = ($animation == "yes") ? "hovered" : "";
        
        //generate output
        $html .= "<div class='image_hover {$animate_class}' style='' data-transition-delay='{$transition_delay}'>";
        $html .= "<div class='images_holder'>";
        
        if($link != "") {
            $html .= "<a href='{$link}'>";
        }
        
        $html .= "<img class='{$image_classes}' src='{$image_src}' alt='' style='{$images_styles}' />";
        $html .= "<img class='hover_image' src='{$hover_image_src}' alt='' style='{$images_styles}' />";
        
        if($link != "") {
            $html .= "</a>";
        }
        
        $html .= "</div>"; //close image_hover
        $html .= "</div>"; //close images_holder

        return $html;
    }
    
    add_shortcode('image_hover', 'image_hover');
}

/* Icon List Item shortcode */

if (!function_exists('icon_list_item')) {
function icon_list_item($atts, $content = null) {
    extract(shortcode_atts(array("icon"=>"", "icon_color"=>"", "icon_background_color"=>"", "icon_border_color"=>"", "title"=>"","title_color"=>""), $atts));
    $html = '';
    $html .= '<div class="q_icon_list">';
    $html .= '<i class="fa '.$icon.' pull-left fa-border" ';
    if($icon_color != "" || $icon_background_color != "" || $icon_border_color != ""){
        $html .= 'style="';
        if($icon_color != ""){
            $html .= 'color:'.$icon_color.';';
        }
        if($icon_background_color != ""){
            $html .= 'background-color:'.$icon_background_color.';';
        }
        if($icon_border_color != ""){
            $html .= 'border-color:'.$icon_border_color.';';
        }
        $html .= '"';
    }
    $html .= '></i>';
    $html .= '<p';
    if($title_color != ""){
        $html .= ' style="color:'.$title_color.';"';
    }
    $html .= '>'.$title.'</p>';
    $html .= '</div>';
    return $html;
}
}
add_shortcode('icon_list_item', 'icon_list_item');

/* Image with text shortcode */

if (!function_exists('image_with_text')) {

    function image_with_text($atts, $content = null) {
        $args = array(
            "image" => "",
            "title" => "",
            "title_color" => "",
            "title_tag" => "h3"
        );
        extract(shortcode_atts($args, $atts));

        $headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

        //get correct heading value. If provided heading isn't valid get the default one
        $title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];
        
        $html = '';
        $html .= '<div class="image_with_text">';
        if (is_numeric($image)) {
            $image_src = wp_get_attachment_url($image);
        } else {
            $image_src = $image;
        }
        $html .= '<img src="' . $image_src . '" alt="' . $title . '" />';
        $html .= '<'.$title_tag.' ';
        if ($title_color != "") {
            $html .= 'style="color:' . $title_color . ';"';
        }
        $html .= '>' . $title . '</'.$title_tag.'>';
        $html .= '<span style="margin: 6px 0px;" class="separator transparent"></span>';
        $html .= do_shortcode($content);
        $html .= '</div>';

        return $html;
    }

    add_shortcode('image_with_text', 'image_with_text');
}

/* Image with text over shortcode */

if (!function_exists('image_with_text_over')) {

    function image_with_text_over($atts, $content = null) {
        $args = array(
            "width"         => "",
            "image"         => "",
            "icon"          => "",
            "icon_size"     => "",
            "icon_color"    => "",
            "title"         => "",
            "title_color"   => "",
            "title_size"    => "",
            "title_tag"     => "h2"
        );

        extract(shortcode_atts($args, $atts));

        $headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

        //get correct heading value. If provided heading isn't valid get the default one
        $title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];
        
        //init variables
        $html            = "";
        $title_styles    = "";
        $subtitle_styles = "";
        $line_styles     = "";
        $no_icon         = "";
        $icon_styles     = "";
        
        //generate styles
        if($title_color != "") {
            $title_styles .= "color: ".$title_color.";";
        }
        
        if($title_size != "") {
            $valid_title_size = (strstr($title_size, 'px', true)) ? $title_size : $title_size.'px';
            $title_styles .= "font-size: ".$valid_title_size.";";
        }
        
        if($icon_color != "") {
            $bcolor = hex2rgb($icon_color);
            $icon_styles .= "style='color: ".$icon_color."; border-color: rgba(".$bcolor[0].",".$bcolor[1].",".$bcolor[2].",0.6);'";
        }
        
        if (is_numeric($image)) {
            $image_src = wp_get_attachment_url($image);
        } else {
            $image_src = $image;
        }

        if($icon == ""){
            $no_icon = "no_icon";
        }
        
        //generate output
        $html .= '<div class="q_image_with_text_over '.$width.'">';
        $html .= '<div class="shader"></div>';
        
        $html .= '<img src="' . $image_src . '" alt="' . $title . '" />';
        $html .= '<div class="text">';
        
        //title and subtitle table html
        $html .= '<table>';
        $html .= '<tr>';
        $html .= '<td>';
        if($icon != ""){
            $html .= '<i class="icon_holder fa '.$icon.' '.$icon_size.' fa-border" '.$icon_styles .'></i>';
        }
        $html .= '<'.$title_tag.' class="caption '.$no_icon.'" style="'.$title_styles.'">'.$title.'</'.$title_tag.'>';
        $html .= '</td>';
        $html .= '</tr>';
        $html .= '</table>';
        
        //image description table html which appears on mouse hover
        $html .= '<table>';
        $html .= '<tr>';
        $html .= '<td>';
        $html .= '<div class="desc">' . do_shortcode($content) . '</div>';
        $html .= '</td>';
        $html .= '</tr>';
        $html .= '</table>';
        
        $html .= '</div>'; //close text div
        $html .= '</div>'; //close image_with_text_over

        return $html;
    }
    
    add_shortcode('image_with_text_over', 'image_with_text_over');
}

/* Latest post shortcode */

if (!function_exists('latest_post')) {
    function latest_post($atts, $content = null) {
        $blog_hide_comments = "";
        if (isset($qode_options_elision['blog_hide_comments'])) {
            $blog_hide_comments = $qode_options_elision['blog_hide_comments'];
        }

        $qode_like = "on";
        if (isset($qode_options_elision['qode_like'])) {
            $qode_like = $qode_options_elision['qode_like'];
        }

        $args = array(
            "post_number_per_row"   => "",
            "rows"                  => "",
            "order_by"              => "",
            "order"                 => "",
            "category"              => "",
            "text_length"           => "",
            "title_tag"             => "h4"
        );

        extract(shortcode_atts($args, $atts));

        $headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

        //get correct heading value. If provided heading isn't valid get the default one
        $title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];

        $q = new WP_Query(
                array('orderby' => $order_by, 'order' => $order, 'posts_per_page' => $post_number_per_row * $rows, 'category_name' => $category)
        );

        $html = "";
        $html .= "<div class='latest_post_holder'>";
        $html .= "<ul>";
        $postCount = 0;

        while ($q->have_posts()) : $q->the_post();

            $postCount++;
            
            $li_classes = "";

            $cat = get_the_category();

            if ($post_number_per_row == 2) {
                $li_classes .= 'two ';
            } else if ($post_number_per_row == 3) {
                $li_classes .= 'three';
            } else if ($post_number_per_row == 4) {
                $li_classes .= 'four';
            }

            $html .= '<li class="' . $li_classes . '">';
            $html .= '<div class="latest_post">';
            $html .= '<a href="' . get_permalink() . '" class="latest_post_wrapper">' . get_the_post_thumbnail(get_the_id(), 'full') . '</a>'; //get post thumbnail
            $html .= '<div class="latest_post_text">';
            $html .= '<div class="latest_post_inner">';

            $html .= '<span class="post_infos">';
            $html .= '<span class="date_holder"><span class="date">' . get_post_time('d', true, get_the_ID(), true) . ' </span><span class="month">' . get_post_time('F', true, get_the_ID(), true) . '</span></span>';
            $html .= '<span class="latest-vert-separator">  |  </span>';
            $html .= '<a class="post_author" href="' . get_author_posts_url(get_the_author_meta('ID')) . '">' . get_the_author_meta('display_name') . ' </a>';
            $html .= '<span class="latest-vert-separator">  |  </span>';
            foreach ($cat as $categ) {
                $html .=' <a href="' . get_category_link($categ->term_id) . '">' . $categ->cat_name . ' </a> ';
            }
            $html .= '<span class="latest-vert-separator">  |  </span>';

            //generate comments part of description
            if ($blog_hide_comments != "yes") {
                $comments_count = get_comments_number();

                switch ($comments_count) {
                    case 0:
                        $comments_count_text = __('No comment', 'qode');
                        break;
                    case 1:
                        $comments_count_text = $comments_count . ' ' . __('Comment', 'qode');
                        break;
                    default:
                        $comments_count_text = $comments_count . ' ' . __('Comments', 'qode');
                        break;
                }
                $html .= '<a class="post_comments" href="' . get_comments_link() . '">' . $comments_count_text . '</a>';
            }

            $html .= '</span>'; //close post_infos span

            $html .= '<'.$title_tag.' class="latest_post_title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></'.$title_tag.'>';
            $html .= '</div>'; //close latest_post_inner div

            if ($text_length > 0) {
                $html .= '<p>' . substr(get_the_excerpt(), 0, intval($text_length)) . '...</p>';
            }

            $html .= '</div>'; //close latest_post_text div
            $html .= '</div>'; //close latest_post div	
            $html .= '</li>';

            if ($post_number_per_row == 2) {
                if($postCount == 2 || $postCount == 4 || $postCount == 6){
                    $html .= '<span class="latest_post_clear"></span>';
                }
            } else if ($post_number_per_row == 3) {
                if($postCount == 3 || $postCount == 6 || $postCount == 9){
                    $html .= '<span class="latest_post_clear"></span>';
                }
            } else if ($post_number_per_row == 4) {
                if($postCount == 4 || $postCount == 8 || $postCount == 12){
                    $html .= '<span class="latest_post_clear"></span>';
                }
            }
        endwhile;
        wp_reset_query();

        $html .= "</ul></div>";
        return $html;
    }

}
add_shortcode('latest_post', 'latest_post');

/* Line graph shortcode */

if (!function_exists('line_graph')) {
function line_graph($atts, $content = null) {
	global $qode_options_elision;
	extract(shortcode_atts(array("type" => "rounded", "custom_color" => "", "labels" => "", "width" => "750", "height" => "350", "scale_steps" => "6", "scale_step_width" => "20"), $atts));
	$id = mt_rand(1000, 9999);
	if($type == "rounded"){
		$bezierCurve = "true";
	}else{
		$bezierCurve = "false";
	}
	
	$id = mt_rand(1000, 9999);
	$html = "<div class='q_line_graf_holder'><div class='q_line_graf'><canvas id='lineGraph".$id."' height='".$height."' width='".$width."'></canvas></div><div class='q_line_graf_legend'><ul>";
	$line_graph_array = explode(";", $content);
	for ($i = 0 ; $i < count($line_graph_array) ; $i = $i + 1){
		$line_graph_el = explode(",", $line_graph_array[$i]);
		$html .=  "<li><div class='color_holder' style='background-color: ".trim($line_graph_el[0]).";'></div><p style='color: ".$custom_color.";'>".trim($line_graph_el[1])."</p></li>";   
	}
	$html .=  "</ul></div></div><script>var lineGraph".$id." = {labels : [";
	$line_graph_labels_array = explode(",", $labels);
	for ($i = 0 ; $i < count($line_graph_labels_array) ; $i = $i + 1){
		if ($i > 0) $html .= ",";
		$html .=  '"'.$line_graph_labels_array[$i].'"';
	}
	$html .= "],";
	$html .= "datasets : [";
	$line_graph_array = explode(";", $content);
	for ($i = 0 ; $i < count($line_graph_array) ; $i = $i + 1){
		$line_graph_el = explode(",", $line_graph_array[$i]);
		if ($i > 0) $html .= ",";
		$values = "";
		for ($j = 2 ; $j < count($line_graph_el) ; $j = $j + 1){
			if ($j > 2) $values .= ",";
			$values .= $line_graph_el[$j];
		}
		$color = hex2rgb(trim($line_graph_el[0]));
		$html .=  "{fillColor: 'rgba(".$color[0].",".$color[1].",".$color[2].",0.7)',data:[".$values."]}";   
	}
	if(!empty($qode_options_elision['text_fontsize'])){
		$text_fontsize = $qode_options_elision['text_fontsize'];
	}else{
		$text_fontsize = 15;
	}
	if(!empty($qode_options_elision['text_color']) && $custom_color == ""){
		$text_color = $qode_options_elision['text_color'];
	} else if(empty($qode_options_elision['text_color']) && $custom_color != ""){
		$text_color = $custom_color;
	} else if(!empty($qode_options_elision['text_color']) && $custom_color != ""){
		$text_color = $custom_color;
	}else{
		$text_color = '#626262';
	}
	$html .= "]};
			var \$j = jQuery.noConflict();
			\$j(document).ready(function() {
				if(\$j('.touch .no_delay').length){
					new Chart(document.getElementById('lineGraph".$id."').getContext('2d')).Line(lineGraph".$id.",{scaleOverride : true,
					scaleStepWidth : ".$scale_step_width.",
					scaleSteps : ".$scale_steps.",
					bezierCurve : ".$bezierCurve.",
					pointDot : false,
					scaleLineColor: '#000000',
					scaleFontColor : '".$text_color."',
					scaleFontSize : ".$text_fontsize.",
					scaleGridLineColor : '#e1e1e1',
					datasetStroke : false,
					datasetStrokeWidth : 0,
					animationSteps : 120,});
				}else{
					\$j('#lineGraph".$id."').appear(function() {
						new Chart(document.getElementById('lineGraph".$id."').getContext('2d')).Line(lineGraph".$id.",{scaleOverride : true,
						scaleStepWidth : ".$scale_step_width.",
						scaleSteps : ".$scale_steps.",
						bezierCurve : ".$bezierCurve.",
						pointDot : false,
						scaleLineColor: '#000000',
						scaleFontColor : '".$text_color."',
						scaleFontSize : ".$text_fontsize.",
						scaleGridLineColor : '#e1e1e1',
						datasetStroke : false,
						datasetStrokeWidth : 0,
						animationSteps : 120,});
					},{accX: 0, accY: -200});
				}						
			});
		</script>";
	return $html;
}
}
add_shortcode('line_graph', 'line_graph');

/* Message shortcode */

if (!function_exists('message')) {
function message($atts, $content = null) {
	global $qode_options_elision;
        
        $args = array(
            "type"                  => "", 
            "background_color"      => "",
            "border_color"          => "", 
            "icon"                  => "", 
            "icon_color"            => "",
            "icon_background_color" => "",
            "icon_type"             => "",
            "custom_icon"           => "",
            "close_button_style"    => ""
        );
        extract(shortcode_atts($args, $atts));
        
        //init variables
	$html               = ""; 
        $icon_html          = "";
        $message_classes    = "";
        $message_styles     = "";
        $icon_styles        = "";
        
	if($type == "with_icon"){
        $message_classes .= " with_icon";
	}
        
    if($background_color != "") {
        $message_styles .= "background-color: ".$background_color.";";
    }
    
    if($border_color != "") {
        $message_styles .= "border-color: ".$border_color.";";
    }
    
    if($icon_color != "") {
        $icon_styles .= "color: ".$icon_color;
    }

    if($icon_background_color != "") {
        $icon_styles .= " background-color: ".$icon_background_color;
    }
    
    $html .= "<div class='q_message ".$message_classes."' style='".$message_styles."'>";
        
	if($type == "with_icon"){
        if($custom_icon != "") {
            if(is_numeric($custom_icon)) {
                    $custom_icon_src = wp_get_attachment_url( $custom_icon ); 
            } else {
                    $custom_icon_src = $custom_icon; 
            }
            
            $icon_html .= '<img src="' . $custom_icon_src . '" alt="">';
        } else {
            $icon_html .= "<i class='fa ".$icon." ".$icon_type." pull-left' style='".$icon_styles."'></i>";
        }
	}
        
    $html .= $icon_html;
        
	$html .= "<a href='#' class='close'>";
        $html .= "<i class='remove-icon ".$close_button_style."'></i>";
        $html .= "</a>"; //close a.close
        $html .= "<div class='message_text'>".do_shortcode($content)."</div>";
        
        $html .= "</div>"; //close message text div
	return $html;
}
}
add_shortcode('message', 'message');

/* More/Less Facts shortcode */

if (!function_exists('more_less_facts')) {
function more_less_facts($atts, $content = null) {
	extract(shortcode_atts(array("more_button_label" =>"","less_button_label"=>"","button_position"=>"","background_color"=>"","color"=>"","border_color"=>""), $atts));
	$html =  "<div class='more_facts_holder'><div class='more_facts_outer'><div class='more_facts_inner'>".$content."</div></div><div class='more_facts_button_holder ".$button_position."'><span class='qbutton more_facts_button' data-morefacts='".$more_button_label."' data-lessfacts='".$less_button_label."'";
	if($background_color != "" || $color != "" || $border_color != ""){
		$html .= " style='";
		if($background_color != ""){
			$html .= "background-color: ".$background_color.";";
		}
		if($color != ""){
			$html .= " color: ".$color.";";
		}
		if($border_color != ""){
			$html .= " border-color: ".$border_color.";";
		}
		$html .= "'";
	}
	$html .=">".$more_button_label."</span></div></div>";	
	return $html;
}
}
add_shortcode('more_less_facts', 'more_less_facts');

/* Ordered List shortcode */

if (!function_exists('ordered_list')) {
function ordered_list($atts, $content = null) {
    $html =  "<div class=ordered>" . $content . "</div>";  
    return $html;
}
}
add_shortcode('ordered_list', 'ordered_list');

/* Pie Chart shortcode */

if (!function_exists('pie_chart')) {

    function pie_chart($atts, $content = null) {
        $args = array(
            "title" => "",
            "title_color" => "",
            "title_tag" => "h3",
            "percent" => "",
            "percentage_color" => "",
            "active_color" => "",
            "noactive_color" => "",
            "line_width" => "",
            "text" => "",
            "text_color" => ""
        );

        extract(shortcode_atts($args, $atts));

        $headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

        //get correct heading value. If provided heading isn't valid get the default one
        $title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];

        $html = '';
        $html .= '<div class="q_pie_chart_holder"><div class="q_percentage" data-percent="' . $percent . '" data-linewidth="' . $line_width . '" data-active="' . $active_color . '" data-noactive="' . $noactive_color . '"';
        if ($percentage_color != "") {
            $html .= ' style="color: ' . $percentage_color . ';"';
        }
        $html .= '><span class="tocounter">' . $percent . '</span> %';
        $html .= '</div><div class="pie_chart_text">';
        if ($title != "") {
            $html .= '<'.$title_tag.' class="pie_title"';
            if ($title_color != "") {
                $html .= ' style="color: ' . $title_color . ';"';
            }
            $html .= '>' . $title . '</'.$title_tag.'>';
        }
        if ($text != "") {
            $html .= '<p';
            if($text_color != ""){
                $html .= ' style="color: '.$text_color.';"';
            }
            $html .= '>' . $text . '</p>';
        }
        $html .= "</div></div>";
        return $html;
    }

}
add_shortcode('pie_chart', 'pie_chart');

/* Pie Chart With Icon shortcode */

if (!function_exists('pie_chart_with_icon')) {

    function pie_chart_with_icon($atts, $content = null) {
        $args = array(
            "percent" => "",
            "active_color" => "",
            "noactive_color" => "",
            "line_width" => "",
            "icon" => "",
            "icon_size" => "",
            "icon_color" => "",
            "title" => "",
            "title_color" => "",
            "title_tag" => "h3",
            "text" => "",
            "text_color" => ""
        );

        extract(shortcode_atts($args, $atts));

        $headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

        //get correct heading value. If provided heading isn't valid get the default one
        $title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];
        
        $html = '';
        $html .= '<div class="q_pie_chart_with_icon_holder"><div class="q_percentage_with_icon" data-percent="' . $percent . '" data-linewidth="' . $line_width . '" data-active="' . $active_color . '" data-noactive="' . $noactive_color . '">';
        $html .= '<i class="fa '.$icon.' '.$icon_size.'"';
        if ($icon_color != "") {
            $html .= ' style="color: ' . $icon_color . ';"';
        }
        $html .= '></i>';
        $html .= '</div><div class="pie_chart_text">';
        if ($title != "") {
            $html .= '<'.$title_tag.' class="pie_title"';
            if ($title_color != "") {
                $html .= ' style="color: ' . $title_color . ';"';
            }
            $html .= '>' . $title . '</'.$title_tag.'>';
        }
        if ($text != "") {
            $html .= '<p ';
            if ($text_color != "") {
                $html .= ' style="color: ' . $text_color . ';"';
            }
            $html .= '>' . $text . '</p>';
        }
        $html .= "</div></div>";
        return $html;
    }
}
add_shortcode('pie_chart_with_icon', 'pie_chart_with_icon');

/* Pie Chart Full shortcode */

if (!function_exists('pie_chart2')) {
function pie_chart2($atts, $content = null) {
	extract(shortcode_atts(array("width" => "120", "height" => "120", "color" => ""), $atts));
    $id = mt_rand(1000, 9999);
    $html = "<div class='q_pie_graf_holder'><div class='q_pie_graf'><canvas id='pie".$id."' height='".$height."' width='".$width."'></canvas></div><div class='q_pie_graf_legend'><ul>";
    $pie_chart_array = explode(";", $content);
    for ($i = 0 ; $i < count($pie_chart_array) ; $i = $i + 1){
    	$pie_chart_el = explode(",", $pie_chart_array[$i]);
		$html .= "<li><div class='color_holder' style='background-color: ".trim($pie_chart_el[1]).";'></div><p style='color: ".$color.";'>".trim($pie_chart_el[2])."</p></li>";   
    }
    $html .= "</ul></div></div><script>var pie".$id." = [";
    $pie_chart_array = explode(";", $content);
    for ($i = 0 ; $i < count($pie_chart_array) ; $i = $i + 1){
    	$pie_chart_el = explode(",", $pie_chart_array[$i]);
    	if ($i > 0) $html .= ",";
		$html .= "{value: ".trim($pie_chart_el[0]).",color:'".trim($pie_chart_el[1])."'}";   
    }
    $html .= "];
		var \$j = jQuery.noConflict();
		\$j(document).ready(function() {
			if(\$j('.touch .no_delay').length){
				new Chart(document.getElementById('pie".$id."').getContext('2d')).Pie(pie".$id.",{segmentStrokeColor : 'transparent',});
			}else{
				\$j('#pie".$id."').appear(function() {
					new Chart(document.getElementById('pie".$id."').getContext('2d')).Pie(pie".$id.",{segmentStrokeColor : 'transparent',});
				},{accX: 0, accY: -200});
			}
		});
	</script>";
    return $html;
}
}
add_shortcode('pie_chart2', 'pie_chart2');


/* Pie Chart Doughnut shortcode */

if (!function_exists('pie_chart3')) {
function pie_chart3($atts, $content = null) {
    extract(shortcode_atts(array("width" => "120", "height" => "120", "color" => ""), $atts));
    $id = mt_rand(1000, 9999);
    $html = "<div class='q_pie_graf_holder'><div class='q_pie_graf'><canvas id='pie".$id."' height='".$height."' width='".$width."'></canvas></div><div class='q_pie_graf_legend'><ul>";
    $pie_chart_array = explode(";", $content);
    for ($i = 0 ; $i < count($pie_chart_array) ; $i = $i + 1){
    	$pie_chart_el = explode(",", $pie_chart_array[$i]);
		$html .= "<li><div class='color_holder' style='background-color: ".trim($pie_chart_el[1]).";'></div><p style='color: ".$color.";'>".trim($pie_chart_el[2])."</p></li>";   
    }
    $html .= "</ul></div></div><script>var pie".$id." = [";
    $pie_chart_array = explode(";", $content);
    for ($i = 0 ; $i < count($pie_chart_array) ; $i = $i + 1){
    	$pie_chart_el = explode(",", $pie_chart_array[$i]);
    	if ($i > 0) $html .= ",";
			$html .= "{value: ".trim($pie_chart_el[0]).",color:'".trim($pie_chart_el[1])."'}";   
    }
    $html .= "];
		var \$j = jQuery.noConflict();
		\$j(document).ready(function() {
			if(\$j('.touch .no_delay').length){
				new Chart(document.getElementById('pie".$id."').getContext('2d')).Doughnut(pie".$id.",{segmentStrokeColor : 'transparent',});
			}else{
				\$j('#pie".$id."').appear(function() {
					new Chart(document.getElementById('pie".$id."').getContext('2d')).Doughnut(pie".$id.",{segmentStrokeColor : 'transparent',});
				},{accX: 0, accY: -200});
			}							
		});
	</script>";
    return $html;
}
}
add_shortcode('pie_chart3', 'pie_chart3');

/* Portfolio shortcode */

if (!function_exists('portfolio_list')) {

    function portfolio_list($atts, $content = null) {

        global $wp_query;
        global $portfolio_project_id;
        global $qode_options_elision;
        $portfolio_qode_like = "on";
        if (isset($qode_options_elision['portfolio_qode_like'])) {
            $portfolio_qode_like = $qode_options_elision['portfolio_qode_like'];
        }
        
        $args = array(
            "type"                  => "standard", 
            "columns"               => "3", 
            "order_by"              => "menu_order", 
            "order"                 => "ASC", 
            "number"                => "-1", 
            "filter"                => "no", 
            "lightbox"              => "yes", 
            "category"              => "", 
            "selected_projects"     => "", 
            "show_load_more"        => "yes",
            "title_tag"             => "h4"
        );
        
        extract(shortcode_atts($args, $atts));

        $headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

        //get correct heading value. If provided heading isn't valid get the default one
        $title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];
        
        $html = "";

        $html .= "<div class='projects_holder_outer v$columns'>";
        if ($filter == "yes") {
            $html .= "<div class='filter_outer'><div class='filter_holder'>
						<ul>
					
						<li class='filter' data-filter='all'><span>" . __('All', 'qode') . "</span></li>";
            if ($category == "") {
                $args = array(
                    'parent' => 0
                );
                $portfolio_categories = get_terms('portfolio_category', $args);
            } else {
                $top_category = get_term_by('slug', $category, 'portfolio_category');
                $term_id = '';
                if (isset($top_category->term_id))
                    $term_id = $top_category->term_id;
                $args = array(
                    'parent' => $term_id
                );
                $portfolio_categories = get_terms('portfolio_category', $args);
            }
            foreach ($portfolio_categories as $portfolio_category) {
                $html .= "<li class='filter' data-filter='$portfolio_category->slug'><span>$portfolio_category->name</span>";
                $args = array(
                    'child_of' => $portfolio_category->term_id
                );
                $html .= '</li>';
            }
            $html .= "</ul></div></div>";
        }
        $_type_class = '';
        if ($type == "hover_text") {
            $_type_class = " hover_text";
        } elseif ($type == "standard"){
            $_type_class = " standard";
        } elseif ($type == "circle"){
			$_type_class = " circle";
		} elseif ($type == "standard_no_space"){
            $_type_class = " standard_no_space";
        } elseif ($type == "hover_text_no_space"){
            $_type_class = " hover_text no_space";
        }
        $html .= "<div class='projects_holder clearfix v$columns$_type_class'>\n";
        if (get_query_var('paged')) {
            $paged = get_query_var('paged');
        } elseif (get_query_var('page')) {
            $paged = get_query_var('page');
        } else {
            $paged = 1;
        }
        if ($category == "") {
            $args = array(
                'post_type' => 'portfolio_page',
                'orderby' => $order_by,
                'order' => $order,
                'posts_per_page' => $number,
                'paged' => $paged
            );
        } else {
            $args = array(
                'post_type' => 'portfolio_page',
                'portfolio_category' => $category,
                'orderby' => $order_by,
                'order' => $order,
                'posts_per_page' => $number,
                'paged' => $paged
            );
        }
        $project_ids = null;
        if ($selected_projects != "") {
            $project_ids = explode(",", $selected_projects);
            $args['post__in'] = $project_ids;
        }
        query_posts($args);
        if (have_posts()) : while (have_posts()) : the_post();
                $terms = wp_get_post_terms(get_the_ID(), 'portfolio_category');
                $html .= "<article class='mix ";
                foreach ($terms as $term) {
                    $html .= "$term->slug ";
                }

                $title = get_the_title();
                $featured_image_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'single-post-thumbnail'); //original size  
                $large_image = $featured_image_array[0];
                $slug_list_ = "pretty_photo_gallery";

                $html .="'>";

                $html .= "<div class='image_holder'>";
                    $html .= "<span class='image'>";
    				if($type == "circle") {
    					$html .= "<span class='circle_hover'></span>";
    					$html .= get_the_post_thumbnail(get_the_ID(), 'portfolio-square');
    				} else {
    					$html .= get_the_post_thumbnail(get_the_ID(), 'full');
    				}
                    $html .= "</span>";

                    if ($type == "standard" || $type == "standard_no_space") {
                        $html .= "<span class='text_holder'>";
                        $html .= "<span class='text_outer'>";
                        $html .= "<span class='text_inner'><span class='feature_holder'>";
                            $html .= '<span class="feature_holder_icons">';
                            if ($lightbox == "yes") {
                                $html .= "<a class='lightbox' title='" . $title . "' href='" . $large_image . "' data-rel='prettyPhoto[" . $slug_list_ . "]'><i class='fa fa-search fa-2x'></i></a>";
                            }
                            $html .= "<a class='preview' href='" . get_permalink() . "'><i class='fa fa-link fa-2x'></i></a>";
                            if ($portfolio_qode_like == "on") {
                                $html .= "<span class='portfolio_like'>";
                                $portfolio_project_id = get_the_ID();

                                if (function_exists('qode_like_portfolio_list')) {
                                    $html .= qode_like_portfolio_list();
                                }
                                $html .= "</span>";
                            }
                            $html .= "</span>";
                        $html .= "</span></span></span></span>";

                    } else if ($type == "hover_text" || $type == "hover_text_no_space") {
                        $html .= "<div class='hover_feature_holder'>";
                            $html .= '<span class="hover_feature_holder_icons"><span class="hover_feature_holder_icons_outer"><span class="hover_feature_holder_icons_inner">';
                            if ($lightbox == "yes") {
                                $html .= "<a class='lightbox' title='" . $title . "' href='" . $large_image . "' data-rel='prettyPhoto[" . $slug_list_ . "]'><i class='fa fa-search fa-2x'></i></a>";
                            }
                            $html .= "<a class='preview' href='" . get_permalink() . "'><i class='fa fa-link fa-2x'></i></a>";
                            if ($portfolio_qode_like == "on") {
                                $html .= "<span class='portfolio_like'>";
                                $portfolio_project_id = get_the_ID();

                                if (function_exists('qode_like_portfolio_list')) {
                                    $html .= qode_like_portfolio_list();
                                }
                                $html .= "</span>";
                            }
                            $html .= "</span></span></span>";

                            $html .= '<div class="hover_feature_holder_title"><div class="hover_feature_holder_title_inner">';
                            $html .= '<'.$title_tag.' class="portfolio_title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></'.$title_tag.'>';

                            $html .= '<span class="project_category">';
                            $k = 1;
                            foreach ($terms as $term) {
                                $html .= "$term->name";
                                if (count($terms) != $k) {
                                    $html .= ', ';
                                }
                                $k++;
                            }
                            $html .= '</span></div></div>';
                        $html .= "</div>";    
                    }

                $html .= "</div>";

                if ($type == "standard" || $type == "standard_no_space") {
                    $html .= "<div class='portfolio_description'>";
                    $html .= '<'.$title_tag.' class="portfolio_title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></'.$title_tag.'>';
                    $html .= '<span class="project_category">';
                    $k = 1;
                    foreach ($terms as $term) {
                        $html .= "$term->name";
                        if (count($terms) != $k) {
                            $html .= ', ';
                        }
                        $k++;
                    }
                    $html .= '</span></div>';
                }
                $html .= "</article>\n";

            endwhile;

            $i = 1;
            while ($i <= $columns) {
                $i++;
                if ($columns != 1) {
                    $html .= "<div class='filler'></div>\n";
                }
            }

        else:
?>
            <p><?php _e('Sorry, no posts matched your criteria.', 'qode'); ?></p>
        <?php
        endif;


        $html .= "</div>";
        if (get_next_posts_link()) {
            if ($show_load_more == "yes" || $show_load_more == "") {
                $html .= '<div class="portfolio_paging"><span rel="' . $wp_query->max_num_pages . '" class="load_more tiny">' . get_next_posts_link(__('SHOW MORE', 'qode')) . '</span></div>';
            }
        }
        $html .= "</div>";
        wp_reset_query();
        return $html;
    }

}
add_shortcode('portfolio_list', 'portfolio_list');

/* Portfolio Slider shortcode */

if (!function_exists('portfolio_slider')) {
function portfolio_slider( $atts, $content = null ) {

    global $portfolio_project_id;
    global $qode_options_elision;
    $portfolio_qode_like = "on";
    if (isset($qode_options_elision['portfolio_qode_like'])) {
        $portfolio_qode_like = $qode_options_elision['portfolio_qode_like'];
    }

    $args = array(
            "order_by" => "menu_order",
            "order" => "ASC",
            "number" => "-1",
            "category" => "",
            "selected_projects" => "",
            "lightbox" => ""
        );
    extract(shortcode_atts($args, $atts));

    $html = "";
    
    $html .= "<div class='portfolio_slider_holder clearfix'><div class='portfolio_slider'><ul class='portfolio_slides'>";

    if ($category == "") {
        $q = array(
            'post_type' => 'portfolio_page',
            'orderby' => $order_by,
            'order' => $order,
            'posts_per_page' => $number
        );
    } else {
        $q = array(
            'post_type' => 'portfolio_page',
            'portfolio_category' => $category,
            'orderby' => $order_by,
            'order' => $order,
            'posts_per_page' => $number
        );
    }

    $project_ids = null;
    if ($selected_projects != "") {
        $project_ids = explode(",", $selected_projects);
        $q['post__in'] = $project_ids;
    }

    query_posts($q);

    if ( have_posts() ) : $postCount = 0; while ( have_posts() ) : the_post(); 

        $title = get_the_title();
        $terms = wp_get_post_terms(get_the_ID(), 'portfolio_category');
        $featured_image_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'portfolio_slider');
        $large_image = $featured_image_array[0];

        $html .= "<li>";

            $html .= "<div class='image_holder'>";
                $html .= "<span class='image'>";
                    $html .= "<img src='".$large_image."' alt='".$title."'>";
                $html .= "</span>";

                $html .= "<div class='hover_feature_holder'>";
                    $html .= '<span class="hover_feature_holder_icons"><span class="hover_feature_holder_icons_outer"><span class="hover_feature_holder_icons_inner">';
                    if ($lightbox == "yes") {
                        $html .= "<a class='lightbox' title='" . $title . "' href='" . $large_image . "' data-rel='prettyPhoto[portfolio_slider]'><i class='fa fa-search fa-2x fa-border'></i></a>";
                    }
                    $html .= "<a class='preview' href='" . get_permalink() . "'><i class='fa fa-link fa-2x fa-border'></i></a>";
                    if ($portfolio_qode_like == "on") {
                        $html .= "<span class='portfolio_like'>";
                        $portfolio_project_id = get_the_ID();

                        if (function_exists('qode_like_portfolio_list')) {
                            $html .= qode_like_portfolio_list();
                        }
                        $html .= "</span>";
                    }
                    $html .= "</span></span></span>";

                    $html .= '<div class="hover_feature_holder_title"><div class="hover_feature_holder_title_inner">';
                    $html .= '<h4 class="portfolio_title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h4>';

                    $html .= '<span class="project_category">';
                    $k = 1;
                    foreach ($terms as $term) {
                        $html .= "$term->name";
                        if (count($terms) != $k) {
                            $html .= ', ';
                        }
                        $k++;
                    }
                    $html .= '</span></div></div>';
                $html .= "</div>";
            $html .= "</div>";

        $html .= "</li>";

        $postCount++;

    endwhile;

    else:
        $html .= __('Sorry, no posts matched your criteria.','qode');
    endif;

    wp_reset_query();

    $html .= "</ul></div></div>";
    
    return $html;
}
}
add_shortcode('portfolio_slider', 'portfolio_slider');

/* Pricing table column shortcode */

if (!function_exists('pricing_column')) {
	function pricing_column($atts, $content = null) {
        $args = array(
            "title"         => "",
            "price"         => "0",
            "currency"      => "$",
            "price_period"  => "/mo",
            "link"          => "",
            "target"        => "",
            "button_text"   => "Buy Now",
            "active"        => ""
        );
	        
		extract(shortcode_atts($args, $atts));
	        
	    $html = ""; 
	        
        if($target == ""){
                $target = "_self";
        }
        $html .= "<div class='q_price_table'>";
        
        if($active == "yes"){
            $html .= "<div class='price_table_inner acitve_price'>";
        } else {
            $html .= "<div class='price_table_inner'>";
        }

        $html .= "<ul>";
        $html .= "<li class='prices'>";
        $html .= "<div class='price_in_table'>";
        $html .= "<sup class='value'>".$currency."</sup>";
        $html .= "<span class='price'>".$price."</span>";
        $html .= "<sub class='mark'>".$price_period."</sub>";
        $html .= "</div>";
        $html .= "</li>"; //close price li wrapper
	    $html .= "<li class='cell table_title'>".$title."</li>";
	    
	    $html .= $content; //append pricing table content 
	    
	    $html .="<li class='price_button'>";
	    $html .= "<a class='qbutton normal' href='$link' target='$target'>".$button_text."</a>";
	    $html .= "</li>"; //close button li wrapper
	    
	    $html .= "</ul>";
	    $html .= "</div>"; //close price_table_inner
	    $html .="</div>"; //close price_table
	    
	    return $html;
	}
}
add_shortcode('pricing_column', 'pricing_column');

/* Progress bar horizontal shortcode */

if (!function_exists('progress_bar')) {

    function progress_bar($atts, $content = null) {
        $args = array(
            "title" => "",
            "title_color" => "",
            "title_tag" => "h5",
            "percent" => "",
            "percent_color" => "",
            "active_background_color" => "",
            "noactive_background_color" => "",
            "height" => ""
        );

        extract(shortcode_atts($args, $atts));
        
        $headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');
                
        //get correct heading value. If provided heading isn't valid get the default one
        $title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];

        //init variables
        $html = "";
        $title_styles = "";
        $number_styles = "";
        $outer_progress_styles = "";
        $percentage_styles = "";

        //generate styles
        if ($title_color != "") {
            $title_styles .= "color: " . $title_color . ";";
        }

        if ($percent_color != "") {
            $number_styles .= "color: " . $percent_color . ";";
        }

        if ($height != "") {
            $valid_height = (strstr($height, 'px', true)) ? $height : $height . "px";
            $outer_progress_styles .= "height: " . $valid_height . ";";
            $percentage_styles .= "height: " . $valid_height . ";";
        }

        if ($noactive_background_color != "") {
            $outer_progress_styles .= "background-color: " . $noactive_background_color . ";";
        }

        if ($active_background_color != "") {
            $percentage_styles .= "background-color: " . $active_background_color . ";";
        }

        $html .= "<div class='q_progress_bar'>";
        $html .= "<div class='progress_title_holder clearfix'>";
        $html .= "<span class='progress_title'>";
        $html .= "<{$title_tag} style='{$title_styles}'>$title</{$title_tag}>";
        $html .= "</span>"; //close progress_title

        $html .= "<span class='progress_number_wrapper'>";
        $html .= "<span class='progress_number' style='{$number_styles}'>";
        $html .= "<span>" . $percent . "</span>%</span>";
        $html .= "</span>"; //close progress_number_wrapper
        $html .= "</div>"; //close progress_title_holder
        
        $html .= "<div class='progress_content_outer' style='{$outer_progress_styles}'>";
        $html .= "<div data-percentage='" . $percent . "' class='progress_content' style='{$percentage_styles}'>";
        $html .="</div>"; //close progress_content
        $html .= "</div>"; //close progress_content_outer

        $html .= "</div>"; //close progress_bar
        return $html;
    }
    
    add_shortcode('progress_bar', 'progress_bar');
}

/* Progress bar vertical shortcode */

if (!function_exists('progress_bar_vertical')) {

    function progress_bar_vertical($atts, $content = null) {
        $args = array(
            "title"                     => "",
            "title_color"               => "",
            "title_tag"                 => "h4",
            "title_size"                => "",
            "percent"                   => "100",
            "percentage_text_size"      => "",
            "percentage_color"          => "",
            "background_color"          => "",
            "text"                      => ""
        );
        
        extract(shortcode_atts($args, $atts));
        
        $headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');
                
        //get correct heading value. If provided heading isn't valid get the default one
        $title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];
                        
        //init variables
        $html               = "";
        $title_styles       = "";
        $bar_styles         = "";
        $percentage_styles  = "";
        
        //generate styles
        if($title_color != "") {
            $title_styles .= "color:".$title_color.";";
        }
        
        if($title_size != "") {
            $title_styles .= "font-size:".$title_size."px;";
        }
        
        if($background_color != "") {
            $bar_styles .= "background-color: ".$background_color.";";
        }
        
        if($percentage_color != "") {
            $percentage_styles .= "color: ".$percentage_color.";";
        }
        
        if($percentage_text_size != "") {
            $percentage_styles .= "font-size: ".$percentage_text_size."px;";
        }

        $html .= "<div class='q_progress_bars_vertical'>";
        $html .= "<div class='progress_content_outer'>";
        $html .= "<div data-percentage='$percent' class='progress_content' style='".$bar_styles."'></div>";
        $html .= "</div>"; //close progress_content_outer
        $html .= "<span class='progress_number' style='".$percentage_styles."'>";
        $html .= "<span>$percent</span>%";
        $html .= "</span>"; //close progress_number
        $html .= "<{$title_tag} class='progress_title' style='".$title_styles."'>$title</{$title_tag}>";
        $html .= "<span class='progress_text'>" . $text . "</span>";
        $html .= "</div>"; //close progress_bars_vertical

        return $html;
    }

}
add_shortcode('progress_bar_vertical', 'progress_bar_vertical');

/* Progress bars icon shortcode */

if (!function_exists('progress_bar_icon')) {
function progress_bar_icon($atts, $content = null) {
	extract(shortcode_atts(array("icons_number" => "","active_number" => "","type"=>"","icon" => "","size" => "","custom_size" => "","icon_color"=>"","icon_active_color"=>"","background_color"=>"","background_active_color"=>"","border_color"=>"","border_active_color"=>""), $atts));
    $html =  "<div class='q_progress_bars_icons_holder'><div class='q_progress_bars_icons'><div class='q_progress_bars_icons_inner $type ";
    if($custom_size != ""){
    	$html .= "custom_size";
    } else {
    	$html .= "$size";
    }
    $html .= " clearfix' data-number='".$active_number."'";
    if($custom_size != ""){
    	$html .= " data-size='".$custom_size."'";
    }
    $html .= ">";
	$i = 0;
	while ($i < $icons_number) {
		$html .= "<div class='bar'><span class='bar_noactive fa-stack ";
		if($size != ""){
			if($size == "tiny"){
				$html .= "fa-lg";
			} else if($size == "small"){
				$html .= "fa-2x";
			} else if($size == "medium"){
				$html .= "fa-3x";
			} else if($size == "large"){
				$html .= "fa-4x";
			} else if($size == "very_large"){
                $html .= "fa-5x";
            }
		}
		$html .= "'";
		if($type == "normal" || $type == "square"){
			if($background_active_color != "" || $border_active_color != ""){
				$html .= " style='";
				if($background_active_color != ""){
					$html .= "background-color: ".$background_active_color.";";
				}
				if($border_active_color != ""){
					$html .= " border-color: ".$border_active_color.";";	
				}
				$html .= "'";
			}
		}
		$html .= ">";
		if($type == "circle"){
			$html .= "<i class='fa fa-circle fa-stack-base fa-stack-2x'";
			if($background_active_color != ""){
				$html .= " style='color: ".$background_active_color.";'";
			}
			$html .= "></i>";
		}
		$html .= "<i class='fa fa-stack-1x ".$icon."'";
		if($icon_active_color != ""){
			$html .= " style='color: ".$icon_active_color.";'";
		}
		$html .= "></i></span><span class='bar_active fa-stack ";
		if($size != ""){
			if($size == "tiny"){
				$html .= "fa-lg";
			} else if($size == "small"){
				$html .= "fa-2x";
			} else if($size == "medium"){
				$html .= "fa-3x";
			} else if($size == "large"){
				$html .= "fa-4x";
			} else if($size == "very_large"){
                $html .= "fa-5x";
            }
		}
		$html .= "'";
		if($type == "normal" || $type == "square"){
			if($background_color != "" || $border_color != ""){
				$html .= " style='";
				if($background_color != ""){
					$html .= "background-color: ".$background_color.";";
				}
				if($border_color != ""){
					$html .= " border-color: ".$border_color.";";	
				}
				$html .= "'";
			}
		}
		$html .= ">";
		if($type == "circle"){
			$html .= "<i class='fa fa-circle fa-stack-base fa-stack-2x'";
			if($background_color != ""){
				$html .= " style='color: ".$background_color.";'";
			}
			$html .= "></i>";
		}
		$html .= "<i class='fa ".$icon." fa-stack-1x'";
		if($icon_color != ""){
			$html .= " style='color: ".$icon_color.";'";
		}
		$html .= "></i></span></div>";
		$i++;
	}
    $html .= "</div></div></div>";
    return $html;
}
}
add_shortcode('progress_bar_icon', 'progress_bar_icon');

/* Services shortcode */

if (!function_exists('service')) {

    function service($atts, $content = null) {
        $args = array(
            "type"      => "top", 
            "title"     => "", 
            "color"     => "", 
            "link"      => "", 
            "target"    => "",
            "animate"   => ""
        );
        
        extract(shortcode_atts($args, $atts));
        
        //init variables
        $html            = "";
        $service_classes = "circle_item circle_{$type}";
        $service_styles  = "";
        
        //generate service classes
        if($animate == "yes") {
            $service_classes .= " fade_in_circle_holder";
        }
        
        //generate service styles
        if($color != "") {
            $service_styles .= "color: ".$color.";";
        }
        
        //generate output
        $html .= '<div class="'.$service_classes.'">'; //open service div
        
        if ($link == "") {
            $html .= '<div class="circle fade_in_circle" style="'.$service_styles.'">'; //open circle div
            $html .= '<div>' . $title . '</div>';
            $html .= '</div>'; //close circle div
        } else {
            $html .= '<div class="circle hover fade_in_circle">'; //open circle div
            $html .= '<a href="' . $link . '" target="' . $target . '" style="'.$service_styles.'">';
            $html .= '<div>' . $title . '</div>';
            $html .= '</a>'; //close circle link
            $html .= '</div>'; //close circle div
        }
        
        $html .= '<div class="text">';
        $html .= $content;
        $html .= '</div>'; //close text div
        $html .= '</div>'; //close service div

        return $html;
    }

    add_shortcode('service', 'service');
}

/* Social Icons shortcode */

if (!function_exists('social_icons')) {
function social_icons($atts, $content = null) {
    extract(shortcode_atts(array("icon"=>"","link"=>"","target"=>"","size"=>"","icon_color"=>"","background_color"=>""), $atts));
    $html = ""; 
    $html .= "<span class='q_social_icon_holder'>";
    if($link != ""){
    	$html .= "<a href='".$link."' target='".$target."'>";
    }
    $html .= "<span class='fa-stack ".$size."'";
	if($background_color != ""){
    	$html .= " style='background-color: ".$background_color.";'";
    }
    $html .= "><i class='fa ".$icon."'";
    if($icon_color != ""){
    	$html .= " style='color: ".$icon_color.";'";
    }
    $html .= "></i></span>";
    if($link != ""){
    	$html .= "</a>";
    }
    $html .= "</span>";
    return $html;
}
}
add_shortcode('social_icons', 'social_icons');

/* Social Share shortcode */

if (!function_exists('social_share')) {
function social_share($atts, $content = null) {
	global $qode_options_elision;
	if(isset($qode_options_elision['twitter_via']) && !empty($qode_options_elision['twitter_via'])) {
		$twitter_via = " via " . $qode_options_elision['twitter_via'];
	} else {
		$twitter_via = 	"";
	}
    $html = "";  
	if(isset($qode_options_elision['enable_social_share']) && $qode_options_elision['enable_social_share'] == "yes") { 
		$post_type = get_post_type();
		if(isset($qode_options_elision["post_types_names_$post_type"])) {
			if($qode_options_elision["post_types_names_$post_type"] == $post_type) {
			if($post_type == "portfolio_page") {
				$html .= '<div class="portfolio_share">';
			} elseif($post_type == "post") {
				$html .= '<div class="blog_share">';
			} elseif($post_type == "page") {
				$html .= '<div class="page_share">';
			}
				$html .= '<span class="social_share_holder">';
				$html .= '<span class="social_share_icon"></span>';
                    if($post_type == "post") {
                        $html .= '<span class="social_share_title">'.  __('Share','qode') .'</span>';
                    }
					$html .= '<div class="social_share_dropdown"><ul>';
					$html .= '<li class="share_title"><span>'.  __('Share on','qode') .'</span></li>';
					if(isset($qode_options_elision['enable_facebook_share']) &&  $qode_options_elision['enable_facebook_share'] == "yes") { 
						$html .= '<li class="facebook_share">';
						$html .= '<a href="#" onclick="window.open(\'http://www.facebook.com/sharer.php?s=100&amp;p[title]=' . get_the_title() . '&amp;p[summary]=' . get_the_excerpt() . '&amp;p[url]=' . urlencode(get_permalink()) . '&amp;&p[images][0]=';
						if(function_exists('the_post_thumbnail')) {
							$html .=  wp_get_attachment_url(get_post_thumbnail_id());
						}
						$html .='\', \'sharer\', \'toolbar=0,status=0,width=620,height=280\');" href="javascript: void(0)">';
						if(!empty($qode_options_elision['facebook_icon'])) {
							$html .= '<img src="' . $qode_options_elision["facebook_icon"] . '" />';
						} else { 
							$html .= '<i class="fa fa-facebook"></i>';
						} 
						$html .= "<span class='share_text'>" . __('Share','qode') . "</span>";
						$html .= "</a>";
						$html .= "</li>";
						} 
						
						if($qode_options_elision['enable_twitter_share'] == "yes") { 
							$html .= '<li class="twitter_share">';
							$html .= '<a href="#" onclick="popUp=window.open(\'http://twitter.com/share?url=' . urlencode(get_permalink()) . '&text=' . urlencode(the_excerpt_max_charlength(mb_strlen(get_permalink())) . $twitter_via) . '&count=horiztonal\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false;" target="_blank" rel="nofollow">';
									if(!empty($qode_options_elision['twitter_icon'])) { 
										$html .= '<img src="' . $qode_options_elision["twitter_icon"] . '" />';
									 } else { 
										$html .= '<i class="fa fa-twitter"></i>';
									 }
									$html .= "<span class='share_text'>" . __('Tweet','qode') . "</span>";
								$html .= "</a>";
							$html .= "</li>";
						 } 
						 if($qode_options_elision['enable_google_plus'] == "yes") { 
							$html .= '<li  class="google_share">';
							$html .= '<a href="#" onclick="popUp=window.open(\'https://plus.google.com/share?url=' . urlencode(get_permalink()) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false">';
									if(!empty($qode_options_elision['google_plus_icon'])) { 
										$html .= '<img src="' . $qode_options_elision['google_plus_icon'] . '" />';
									} else { 
										$html .= '<i class="fa fa-google-plus"></i>';
									 } 
									$html .= "<span class='share_text'>" . __('Share','qode') . "</span>";
								$html .= "</a>";
							$html .= "</li>";
						 }
						$html .= "</ul></div>";
				$html .= "</span>";
				if($post_type == "portfolio_page" || $post_type == "post" || $post_type == "page") {
					$html .= '</div>';
				}
			} 
		}  
	}
    return $html;
}
}
add_shortcode('social_share', 'social_share');

/* Steps shortcode */

if (!function_exists('steps')) {

    function steps($atts, $content = null) {
        $args = array(
            "number_of_steps"   => "4",
            "number_color" => "",
            "number_background_color" => "",
            
            "image1" => "",
            "step_number_1" => "",
            "step_link_1" => "",
            "step_link_target_1" => "_blank",
            
            "image2" => "",
            "step_number_2" => "",
            "step_link_2" => "",
            "step_link_target_2" => "_self",
            
            "image3" => "",
            "step_number_3" => "",
            "step_link_3" => "",
            "step_link_target_3" => "_self",
            
            "image4" => "",
            "step_number_4" => "",
            "step_link_4" => "",
            "step_link_target_4" => "_self"
        );

        extract(shortcode_atts($args, $atts));

        $steps_array = array();
        
        //for the number of steps
        for ($i = 1; $i <= $number_of_steps; $i++) {
            //generate object for each step that  holds that steps data
            $step_object = new stdClass();
            
            $step_object->step_number = ${"step_number_".$i};
            $step_object->step_link = ${"step_link_".$i};
            $step_object->step_link_target = ${"step_link_target_".$i};
            $step_object->step_image = ${"image".$i};

            //push object to steps array
            $steps_array[] = $step_object;
        }
                
        //init variables
        $html           = "";
        $number_styles  = "";
        
        if($number_color != "") {
            $number_styles .= "color: ".$number_color.";";
        }
        
        if($number_background_color != "") {
            $number_styles .= " background-color: ".$number_background_color.";";
        }
        
        if(is_array($steps_array) && count($steps_array)) {
            $html .= "<div class='q_steps_holder'>";
            $html .= "<div class='steps_holder_inner'>";
            
            
            for($i = 1; $i <= count($steps_array); $i++) {
                $step = $steps_array[$i - 1];
                $simage = $steps_array[$i-1];
                
                $html .= "<div class='circle_small_holder step{$i}'>";
                $html .= "<div class='circle_small_holder_inner'>";
                $html .= "<div class='arrow_holder'></div>";
                $html .= "<div class='circle_small'>";
                
                if($step->step_link != "") {
                    $html .= "<a href='{$step->step_link}' target='{$step->step_link_target}' class='circle_small_inner'>";
                    
                    $html .= '<div class="image_holder">';

                        if(is_numeric($simage->step_image)) {
                            $image_src = wp_get_attachment_url( $simage->step_image); 
                        }else {
                            $image_src = $simage->step_image; 
                        }

                        $html .= '<img src="'.$image_src.'" alt="" />';

                    $html .= '</div>';

                    if($step->step_number != "") {
                        $html .= "<span style='{$number_styles}'>{$step->step_number}</span>";
                    }
                    
                    $html .= "</a>"; //close circle_small_inner
                } else {
                    $html .= "<div class='circle_small_inner'>";

                    $html .= '<div class="image_holder">';

                        if(is_numeric($simage->step_image)) {
                            $image_src = wp_get_attachment_url( $simage->step_image); 
                        }else {
                            $image_src = $simage->step_image; 
                        }

                        $html .= '<img src="'.$image_src.'" alt="" />';
                        
                    $html .= '</div>';
                    
                    if($step->step_number != "") {
                        $html .= "<span style='{$number_styles}'>{$step->step_number}</span>";
                    }
                    
                    $html .= "</div>"; //close circle_small_inner
                }
                
                $html .= "</div>"; //close circle_small
                
                $html .= "</div>"; //close circle_small_holder_inner
                $html .= "</div>"; //close circle_small_holder
            }
            
            $html .= "</div>"; //close steps_holder_inner
            $html .= "</div>"; //close steps_holder
        }
        
        return $html; 
    }
}
add_shortcode('steps', 'steps');

/* Testimonials shortcode */

if (!function_exists('testimonials')) {

    function testimonials($atts, $content = null) {
        $deafult_args = array(
            "type"                  => "normal", 
            "number"                => "-1", 
            "category"              => "",
            "text_color"            => "",
            "background_color"      => "", 
            "border_color"          => ""
        );
        
        extract(shortcode_atts($deafult_args, $atts));
        
        $html                           = "";
        $testimonial_text_inner_styles  = "";
        $testimonial_name_styles        = "";
        
        if($background_color != "") {
            $testimonial_text_inner_styles .= "background-color: ".$background_color.";";
        }
        
        if($border_color != "") {
            $testimonial_text_inner_styles .= "border-color: ".$border_color.";";
        }
        
        if($text_color != "") {
            $testimonial_text_inner_styles  .= "color: ".$text_color.";";
            $testimonial_name_styles        .= "color: ".$text_color.";";
        }
        
        if ($category == "") {
            $args = array(
                'post_type' => 'testimonials',
                'orderby' => "date",
                'order' => "DESC",
                'posts_per_page' => $number
            );
        } else {
            $args = array(
                'post_type' => 'testimonials',
                'testimonials_category' => $category,
                'orderby' => "date",
                'order' => "DESC",
                'posts_per_page' => $number
            );
        }

        if ($type == "transparent") {
            $type_class = " transparent";
        } else {
            $type_class = "";
        }
        
        $html .= '<div class="testimonials_holder clearfix">';
        $html .= '<div class="testimonials' . $type_class . '">';
        $html .= '<div class="testimonial_container">';
        
        query_posts($args);
        if (have_posts()) : while (have_posts()) : the_post();
                $author = get_post_meta(get_the_ID(), "qode_testimonial-author", true);
								$author_desc = "";
								if (strpos($author, ',') !== FALSE)
                list($author, $author_desc) = explode(',', $author);

                $author = ($author_desc != "") ? $author . ', ' : $author;
                $text = get_post_meta(get_the_ID(), "qode_testimonial-text", true);
                $html .= '<div id="testimonials' . get_the_ID() . '" class="testimonial_content">';
                $html .= '<div class="testimonial_text_holder">';
                $html .= '<div class="testimonial_text_inner" style="'.$testimonial_text_inner_styles.'">';

                $html .= '<p>"' . trim($text) . '"</p>';
                $html .= '<span class="testimonial_name" style="'.$testimonial_name_styles.'">' . $author . '<span class="author_desc" style="'.$testimonial_name_styles.'">' . $author_desc . '</span></span>';
                $html .= '</div>';
                $html .= '</div>';
                $html .= '</div>';
            endwhile;
        else:
            $html .= __('Sorry, no posts matched your criteria.', 'qode');
        endif;

        wp_reset_query();
        $html .= '</div>';
        $html .= '<ul class="testimonial_nav">';
        query_posts($args);
        if (have_posts()) : while (have_posts()) : the_post();

                $html .='<li><a href="#testimonials' . get_the_ID() . '">';
                $html .='</a>';
                $html .='</li>';
            endwhile;
        else:
            $html .= __('Sorry, no posts matched your criteria.', 'qode');
        endif;

        wp_reset_query();
        $html .= '</ul>';
        $html .= '</div>';
        $html .= '</div>';
        return $html;
    }

}
add_shortcode('testimonials', 'testimonials');

/* Unordered List shortcode */

if (!function_exists('unordered_list')) {
function unordered_list($atts, $content = null) {
    $args = array(
        "style"         => "",
        "animate"       => "",
        'number_type'   => "",
        "font_weight"   => ""
    );
        
    extract(shortcode_atts($args, $atts));
        
    $list_item_classes = "";
    
    if($style != "") {
        $list_item_classes .= "{$style}";
    }
    
    if($number_type != "") {
        $list_item_classes .= " {$number_type}";
    }    
    
    if($font_weight != "") {
        $list_item_classes .= " {$font_weight}";
    }
    
    $html =  "<div class='q_list $list_item_classes";
    if($animate == "yes"){
    	$html .= " animate_list'>" . $content . "</div>";	
    } else {
    	$html .= "'>" . $content . "</div>";
   	}
    return $html;
}
}
add_shortcode('unordered_list', 'unordered_list');

/* Qode Slider shortcode */

if (!function_exists('qode_slider')) {
function qode_slider( $atts, $content = null ) {
	extract(shortcode_atts(array("slider"=>"", "height"=>"", "background_color"=>"", "auto_start"=>"", "slide_animation"=>"6000"), $atts));
	$html = ""; 
	
	if ($slider != "") {
		$args = array(
			'post_type'=> 'slides',
			'slides_category' => $slider,
			'orderby' => "date",
			'order' => "ASC",
			'posts_per_page' => -1
		);
		
		if($height == "" || $height == "0"){ 
			$full_screen_class = "full_screen";
			$slide_height = "";
		}else{
			$full_screen_class = "";
			$slide_height = "height: ".$height."px;";
		}
		
		if($background_color != ""){
			$background_color = 'background-color:'.$background_color.';';
		}
		
		$auto = "true";
		if($auto_start != ""){
			$auto = $auto_start;
		}
		
		if($auto == "true"){
				$auto_start_class = "q_auto_start";
		} else {
				$auto_start_class = "";
		}

		if($slide_animation != ""){
				$slide_animation = 'data-slide_animation="'.$slide_animation.'"';
		} else {
				$slide_animation = 'data-slide_animation=""';
		}
		
		$html .= '<div id="qode-'.$slider.'" class="carousel slide '.$full_screen_class.' '.$auto_start_class.'" '.$slide_animation.' style="'.$slide_height.' '.$background_color.'"><div class="qode_slider_preloader"><div class="ajax_loader_slider"><div class="ajax_loader_1"><div class="ajax_loader_html"></div></div></div></div>';
		$html .= '<div class="carousel-inner" data-start="transform: translateY(0px);" data-1440="transform: translateY(-500px);">';
			query_posts( $args );
			if ( have_posts() ) : $postCount = 0; while ( have_posts() ) : the_post(); 
				$active_class = '';
				if($postCount == 0){
					$active_class = 'active';
				}else{
					$active_class = 'inactive';
				}
				
				$slide_type = get_post_meta(get_the_ID(), "qode_slide-background-type", true);
				
				$image = get_post_meta(get_the_ID(), "qode_slide-image", true);
				$thumbnail = get_post_meta(get_the_ID(), "qode_slide-thumbnail", true);
				
				$video_webm = get_post_meta(get_the_ID(), "qode_slide-video-webm", true);
				$video_mp4 = get_post_meta(get_the_ID(), "qode_slide-video-mp4", true);
				$video_ogv = get_post_meta(get_the_ID(), "qode_slide-video-ogv", true);
				$video_image = get_post_meta(get_the_ID(), "qode_slide-video-image", true);
				$video_overlay = get_post_meta(get_the_ID(), "qode_slide-video-overlay", true);
				
				$content_alignment = get_post_meta(get_the_ID(), "qode_slide-content-alignment", true);
				
				if(get_post_meta(get_the_ID(), "qode_slide-content-left", true) != ""){
					$width = "width:".get_post_meta(get_the_ID(), "qode_slide-content-width", true)."%;";
				}else{
					$width = "width:50%;";
				}
				
				if(get_post_meta(get_the_ID(), "qode_slide-content-left", true) != "" && get_post_meta(get_the_ID(), "qode_slide-content-left", true) != "0"){
					$xaxis= "left:".get_post_meta(get_the_ID(), "qode_slide-content-left", true)."%;";
				}else{
					if(get_post_meta(get_the_ID(), "qode_slide-content-right", true) != "" && get_post_meta(get_the_ID(), "qode_slide-content-right", true) != "0"){
						$xaxis = "right:".get_post_meta(get_the_ID(), "qode_slide-content-right", true)."%;";
					}else{
						$xaxis = "left: 25%;";
					}
				}
				
				if(get_post_meta(get_the_ID(), "qode_slide-content-top", true) != "" && get_post_meta(get_the_ID(), "qode_slide-content-top", true) != "0"){
					$yaxis_start = "top:".get_post_meta(get_the_ID(), "qode_slide-content-top", true)."%;";
					$yaxis_end = "top:".(get_post_meta(get_the_ID(), "qode_slide-content-top", true)-10)."%;";
				}else{
					if(get_post_meta(get_the_ID(), "qode_slide-content-bottom", true) != "" && get_post_meta(get_the_ID(), "qode_slide-content-bottom", true) != "0"){
						$yaxis_start = "bottom:".get_post_meta(get_the_ID(), "qode_slide-content-bottom", true)."%;";
						$yaxis_end = "bottom:".(get_post_meta(get_the_ID(), "qode_slide-content-bottom", true)+10)."%;";
					}else{
						$yaxis_start = "top: 20%;";
						$yaxis_end = "top: 10%;";
					}
				}
				
				$header_style = "";
				if(get_post_meta(get_the_ID(), "qode_slide-header-style", true) != ""){
					$header_style = get_post_meta(get_the_ID(), "qode_slide-header-style", true);
				}

                $title = get_the_title();
				
				$html .= '<div class="item '.$header_style.'"  style="'.$slide_height.'">';
				if($slide_type == 'video'){
				
					$html .= '<div class="video"><div class="mobile-video-image" style="background-image: url('.$video_image.')"></div><div class="video-overlay';
								if($video_overlay == "yes"){
									$html .= ' active';
								}
								$html .= '"></div><div class="video-wrap">
									
									<video class="video" width="1920" height="800" poster="'.$video_image.'" controls="controls" preload="auto" loop="true" autoplay="true">';
											if(!empty($video_webm)) { $html .= '<source type="video/webm" src="'.$video_webm.'">'; }
											if(!empty($video_mp4)) { $html .= '<source type="video/mp4" src="'.$video_mp4.'">'; }
											if(!empty($video_ogv)) { $html .= '<source type="video/ogg" src="'. $video_ogv.'">'; }
										 $html .='<object width="320" height="240" type="application/x-shockwave-flash" data="'.get_template_directory_uri().'/js/flashmediaelement.swf">
													<param name="movie" value="'.get_template_directory_uri().'/js/flashmediaelement.swf" />
													<param name="flashvars" value="controls=true&file='.$video_mp4.'" />
													<img src="'.$video_image.'" width="1920" height="800" title="No video playback capabilities" alt="Video thumb" />
											</object>
									</video>		
							</div></div>';
				}else{
					$html .= '<div class="image" style="background-image:url('.$image.');"><img src="'.$image.'" alt="'.$title.'"></div>';
				}
				$html .= '<div class="slider_content_outer"><div class="slider_content '.$content_alignment.'" data-start="'.$width.' opacity:1; '.$xaxis.' '.$yaxis_start.'" data-300="opacity: 0; '.$xaxis.' '.$yaxis_end.'">';
				if($thumbnail != ""){
					$html .= '<div class="thumb">';
					$html .= '<img src="'.$thumbnail.'" alt="'.$title.'">';
					$html .= '</div>';
				}
				$html .= '<div class="text">';
				if(get_the_title() != ""){
					$html .= '<h2><span>'.get_the_title().'</span></h2>';
				}
				if(get_post_meta(get_the_ID(), "qode_slide-text", true) != ""){
					$html .= '<p><span>'.get_post_meta(get_the_ID(), "qode_slide-text", true).'</span></p>';
				}
				if(get_post_meta(get_the_ID(), "qode_slide-button-label", true) != "" && get_post_meta(get_the_ID(), "qode_slide-button-link", true) != ""){
					$html .= '<a class="qbutton tiny" href="'.get_post_meta(get_the_ID(), "qode_slide-button-link", true).'">'.get_post_meta(get_the_ID(), "qode_slide-button-label", true).' <i style="" class="fa fa-angle-right fa-lg"></i></a>';
				}
				$html .= '</div>';
				$html .= '</div></div>';
				$html .= '</div>';
				
				$postCount++;
			endwhile;
			else:
				$html .= __('Sorry, no slides matched your criteria.','qode');
			endif;
			wp_reset_query();
			
		$html .= '</div>';
		$html .= '<ol class="carousel-indicators" data-start="opacity: 1;" data-300="opacity:0;">';
			query_posts( $args );
			if ( have_posts() ) : $postCount = 0; while ( have_posts() ) : the_post();
				
				$html .= '<li data-target="#qode-'.$slider.'" data-slide-to="'.$postCount.'"></li>';
				
				$postCount++;
			endwhile;
			else:
				$html .= __('Sorry, no posts matched your criteria.','qode');
			endif;
			
			wp_reset_query();
		$html .= '</ol>';
		$html .= '<a class="left carousel-control" href="#qode-'.$slider.'" data-slide="prev" data-start="opacity: 1; top: 50%;" data-300="opacity:0; top: 40%;"></a>';
		$html .= '<a class="right carousel-control" href="#qode-'.$slider.'" data-slide="next" data-start="opacity: 1; top: 50%;" data-300="opacity:0; top: 40%;"></a>';
		$html .= '</div>';
	}
  	
	
	return $html;
}
}
add_shortcode('qode_slider', 'qode_slider');

/* Qode Carousel shortcode */

if (!function_exists('qode_carousel')) {
function qode_carousel( $atts, $content = null ) {
    $args = array(
            "carousel" => "",
            "orderby"  => "date",
            "order"    => "ASC",
            "control_style" => "control_style"
        );
    extract(shortcode_atts($args, $atts));

    $html = "";
    
    if ($carousel != "") {

        $html .= "<div class='qode_carousels_holder clearfix'><div class='qode_carousels ".$control_style."'><ul class='slides'>";

        $q = array('post_type'=> 'carousels', 'carousels_category' => $carousel, 'orderby' => $orderby, 'order' => $order, 'posts_per_page' => '-1');

        query_posts($q);

        if ( have_posts() ) : $postCount = 0; while ( have_posts() ) : the_post(); 

            if(get_post_meta(get_the_ID(), "qode_carousel-image", true) != ""){
                $image = get_post_meta(get_the_ID(), "qode_carousel-image", true);
            } else {
                $image = "";
            }

            if(get_post_meta(get_the_ID(), "qode_carousel-hover-image", true) != ""){
                $hover_image = get_post_meta(get_the_ID(), "qode_carousel-hover-image", true);
                $has_hover_image = "has_hover_image";
            } else {
                $hover_image = "";
                $has_hover_image = "";
            }

            if(get_post_meta(get_the_ID(), "qode_carousel-item-link", true) != ""){
                $link = get_post_meta(get_the_ID(), "qode_carousel-item-link", true);
            } else {
                $link = "";
            }

            if(get_post_meta(get_the_ID(), "qode_carousel-item-target", true) != ""){
                $target = get_post_meta(get_the_ID(), "qode_carousel-item-target", true);
            } else {
                $target = "_self";
            }

            $title = get_the_title();

            $html .= "<li>";

            if($link != ""){
                $html .= "<a href='".$link."' target='".$target."'>";
            }

            if($image != ""){
                $html .= "<span class='first_image_holder ".$has_hover_image."'><img src='".$image."' alt='".$title."'></span>";
            }

            if($hover_image != ""){
                $html .= "<span class='second_image_holder ".$has_hover_image."'><img src='".$hover_image."' alt='".$title."'></span>";
            }
            
            if($link != ""){
                $html .= "</a>";
            }

            $html .= "</li>";

            $postCount++;

        endwhile;

        else:
            $html .= __('Sorry, no posts matched your criteria.','qode');
        endif;

        wp_reset_query();

        $html .= "</ul></div></div>";
        
    }
    
    return $html;
}
}
add_shortcode('qode_carousel', 'qode_carousel');