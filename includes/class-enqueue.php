<?php 
namespace apg;

if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists('apg\Enqueue')){

	class Enqueue {


		function __construct(){


			add_action( 'wp_enqueue_scripts', array( $this, 'frontend_assets' ) );

			add_action( 'admin_enqueue_scripts', array( $this, 'admin_assets' ) );

		}


		function frontend_assets(){



			wp_enqueue_style( 'aswin-photo-gallery_styles', APG_URL.'assets/css/aswin-photo-gallery.css' );

			wp_enqueue_script( 'jquery' );

			wp_enqueue_script( 'aswin-photo-gallery_scripts', APG_URL.'assets/js/aswin-photo-gallery.js', array( 'jquery' ),'1.0',true );

			wp_register_script( 'aswin-photo-gallery_ajax_scripts', APG_URL.'assets/js/aswin-photo-gallery-ajax.js', array( 'jquery' ),'1.0',true );

			wp_localize_script( 'aswin-photo-gallery_ajax_scripts', 'apg_ajax_data', array(
				'ajax_url' => admin_url('admin-ajax.php')
			) );

			wp_enqueue_script( 'aswin-photo-gallery_ajax_scripts' );

		}


		function admin_assets(){
			wp_enqueue_style( 'aswin-photo-gallery_admin_styles', APG_URL.'assets/css/aswin-photo-gallery-admin-style.css' );
			wp_enqueue_script( 'jquery' );
			
			wp_enqueue_script( 'aswin-photo-gallery_main_scripts', APG_URL.'assets/js/aswin-photo-gallery-admin-script.js', array( 'jquery' ),'1.0',true );

		}

	}

}