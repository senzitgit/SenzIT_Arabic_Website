<?php
/**
 * Genesis Site Title Styles
 *
 * Read more about why we created this plugin at http://savvyjackiedesigns.com/genesis-site-title-styles-plugin/
 *
 * @package           Genesis_Site_Title_Styles
 * @author            Jackie D'Elia and Ginger Coolidge
 * @license           GPL-2.0+
 * @link              http://www.savvyjackiedesigns.com
 * @copyright         2015 Jackie D'Elia and Ginger Coolidge
 *
 * Plugin Name:       Genesis Site Title Styles
 * Plugin URI:        https://github.com/savvyjackie/genesis-site-title-styles
 * Description:       Adds a span tag to each word in the site title for separate styling with css using the nth-child() selector.
 * Version:           1.10
 * Author:            Jackie D'Elia and Ginger Coolidge
 * Author URI:        http://www.savvyjackiedesigns.com
 * Text Domain:       genesis-site-title-styles
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/savvyjackie/genesis-site-title-styles
 * GitHub Branch:     master
 */

/*  
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
    die;
}

// Filter the site title
add_filter( 'genesis_seo_title', 'sjd_genesis_site_title', 15 );

/**
 * Add additional markup to site title.
 * 
 * Wrap each word of the title in a span tag, so that users can target that word specifically
 * via CSS by utilizing the nth-of-type() selector.
 *
 * @since 0.1
 */
function sjd_genesis_site_title( $title ) {
    // old code removed
    // Assign site title to a variable
    //$custom_title = esc_attr( get_bloginfo( 'name' ) );
    //$custom_title = preg_replace( "([a-zA-Z.,!?0-9&#;'']+(?![^<]*>))", '<span>$0</span>', $custom_title );
    
    // first lets remove any extra spaces found in the site title
    // this will also be the title used for the title attribute without the spans
    $clean_title = preg_replace('/\s+/', ' ',esc_attr( get_bloginfo( 'name' ) ));

    // wrap the spaces in a span followed by a space 
    // adding opening and closing span tag for the whole string
    // $custom_title is the variable which will now contain spans
    $custom_title = "<span>" . str_replace(" ", "</span> <span>", $clean_title) . "</span>";
    
    // Don't change the rest of this
    // If we're on the front page or home page, use `h1` heading, otherwise us a `p` tag
    $tag = ( is_home() || is_front_page() ) ? 'h1' : 'p';
    $inside = sprintf( '<a href="%s" title="%s">%s</a>', trailingslashit( home_url() ), esc_attr( $clean_title ), $custom_title );

    // Wrap link and title in semantic markup
    $title = sprintf ( '<%s class="site-title" itemprop="headline">%s</%s>', $tag, $inside, $tag );
    return $title;
}

?>
