<?php
/**
 * @package   Back_Button_to_Previous_Page
 * @author    Vagish Vela <web@vagish.com>
 * @license   GPL-2.0+
 * @link      http://vagish.com
 * @copyright 2014 Vagish Vela
 *
 * @wordpress-plugin
 * Plugin Name:       Back Button to Previous Page
 * Plugin URI:        http://www.velaseo.com
 * Description:       Creates a back button to the previous page
 * Version:           0.1.0-beta
 * Author:            Vagish Vela
 * Author URI:        http://vagish.com
 * Text Domain:       back-button-to-previous-pageen-GB
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/VagishVela/
 */

// Queue Stylesheet
function vv_back_button() {
	wp_register_style( 'vv_back_button_css', plugins_url('inc/css/back-button.css', __FILE__), false, '1.0.0', true );
	
	wp_enqueue_style( 'vv_back_button_css' );
}
add_action( 'wp_enqueue_scripts', 'vv_back_button' );

// Find referrer then create back button if it is the same server.
add_filter('wp_footer', 'back_button_prev_page');
function back_button_prev_page() {
	if (empty($_SERVER['HTTP_REFERER']) || is_front_page() ) {
		return;
	} else {
		  $backbuttonurl = htmlspecialchars($_SERVER['HTTP_REFERER']);
		  echo "<div class=\"back-button\"> <p class=\"back-button-txt\"><a href='$backbuttonurl' onclick=\"if (document.referrer.indexOf(window.location.host) !== -1) { history.go(-1); return false; } else { window.location.href = ' . get_site_url(); . '; }\">&#171;</a></p></div>";
	}
};
?>