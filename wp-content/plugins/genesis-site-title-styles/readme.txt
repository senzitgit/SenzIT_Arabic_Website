===Genesis Site Title Styles===

Contributors: JDELIA, txgspice, cdils
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=GNJE45UUSUDB6
Tags: genesis, css, site title, logo, span, custom, font, color, styles, fancy, genesis framework, genesiswp, studiopress
Requires at least: 3.8.0
Tested up to: 4.3.0
Stable tag: 1.10
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==

This plugin adds a span tag around each word in the Genesis site title for separate styling with css. Styling is done with the nth-child() selector. 

Style each word separately:

Style the first word:

.site-title span:nth-child(1) { 
	add your styles here 
}

Style the second word:

.site-title span:nth-child(2) { 
	add your styles here 
}

Style the third word:

.site-title span:nth-child(3) { 
	add your styles here 
}


Read more about why we created the plugin here along with examples of how to style them: `http://savvyjackiedesigns.com/genesis-site-title-styles-plugin/`.

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload the entire `genesis-site-title-styles` folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. That's it! There is no settings panel for this plugin.

== Frequently Asked Questions ==

= Do this plugin require the Genesis Framework? =

This plugin is designed for sites running on the Genesis Framework. While you could successfully activate the plugin on a non-Genesis site, it is useless as the code relies on Genesis-specific actions.

= How do I know if the plugin is working? =

After activating the plugin, each word in your site title should be wrapped in a span tag.

= How can I style the title span tags? =

Add this your style.css in the section for your site title. Your class name may be different than .site-title so substitute as needed. 

.site-title span:nth-child(1) {
   add your styles here
}

Above example would target the first word in the site title. Change the number in parenthesis to target another word, span:nth-child(2) would target the second word, and so on.

.site-title span:nth-child(2) {
    color: #99d7da;
    font-weight: 600;
}

Above example would change the color and font weight of the second word.


== Changelog ==
= 1.10 =
Replaced logic to recognize words that contain special characters, diacritical marks and symbols. The plugin now will wrap a span tag around everything separated by a space. Any extra spaces are removed.

For example: “BLANCO PRÍBAR®&nbsp;&nbsp;&nbsp;INC.”
 
will become “BLANCO PRÍBAR® INC.” and then each word is wrapped in a span tag. 

= 1.01 =
Edited instructions.
= 1.0 =
Released.
= 0.4 =
Added lower priority to filter to be sure it loads last.
= 0.3 =
Updated code to correct for h1/p tags. See https://gist.github.com/cdils/9002451#file-genesis-site-title-php
= 0.2 =
Changed description. Removed Genesis activation requirement.
= 0.1 =
* Initial release.
