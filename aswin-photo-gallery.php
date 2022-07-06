<?php
/*
 Plugin Name: Aswin Photo Gallery
 Plugin URI: https://wordpress.org/plugins/aswin-photo-gallery/
 Description: Full featured , easy to use photo gallery with multiple layouts and carasoul.
 Version: 4.0
 Requires at least: 3.0
 Requires PHP: 7.0
 Author: Aswin Giri
 Author URI: https://aswin.com.np
 License: GPL v2 or later
 License URI: https://www.gnu.org/licenses/gpl-2.0.html
 Text Domain: aswin-photo-gallery
 Domain Path: /languages
 */

if( ! defined( 'APG_PLUGIN' )){
	define( 'APG_PLUGIN', __FILE__  );
}

if( ! defined( 'APG_URL' )){
	define( 'APG_URL', trailingslashit( plugin_dir_url( __FILE__ ) ) );
}


if( ! defined( 'APG_PATH' )){
	define( 'APG_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );
}


include APG_PATH.'includes/init.php';
include APG_PATH.'includes/functions.php';