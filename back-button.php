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

add_filter('genesis_before_content', 'dj_back_button');
function dj_back_button() {
	if (empty($_SERVER['HTTP_REFERER'])) {
		return;
	} else {
		  $backbuttonurl = htmlspecialchars($_SERVER['HTTP_REFERER']);
	}

	if ( is_front_page() ) {
		return;
	} else if (isset($backbuttonurl)) {
  		echo "<div class=\"back-button\"> <p class=\"back-button-txt\"><a href='$backbuttonurl' onclick=\"if (document.referrer.indexOf(window.location.host) !== -1) { history.go(-1); return false; } else { window.location.href = 'www.discerningjourneys.com'; }\">&#171;</a></p></div>";
	}

	if (is_woocommerce()) {
		  		echo "<div class=\"back-button\"> <p class=\"back-button-txt\"><a href='$backbuttonurl' onclick=\"if (document.referrer.indexOf(window.location.host) !== -1) { history.go(-1); return false; } else { window.location.href = 'www.discerningjourneys.com'; }\">&#171;</a></p></div>";
	} else {
		return;
	}

};
?>