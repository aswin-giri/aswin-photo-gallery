<?php 
namespace apg;

if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists('apg\Action')){

	class Action {


		function __construct(){

			add_action( 'plugins_loaded', array( $this, 'plugin_i18n' ) );

			register_activation_hook( APG_PLUGIN, array( $this, 'activation_hook' ) );

			register_deactivation_hook( APG_PLUGIN, array( $this, 'deactivation_hook' ) );

		}


		function plugin_i18n(){

			load_plugin_textdomain('aswin-photo-gallery', false, dirname( plugin_basename( APG_PLUGIN ) ).'/languages/');

		}


		function activation_hook(){
			/* Add default options */
		}



		function deactivation_hook(){


		}



	}

}