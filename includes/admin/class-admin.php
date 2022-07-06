<?php 
namespace apg\admin;

if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists('apg\admin\Admin')){

	class Admin {


		function __construct(){

			add_filter( 'enter_title_here', array( $this , 'change_title_placeholder') );

			add_action( 'admin_menu', array( $this,'add_settings_submenu_page' ) );

		}

		public function change_title_placeholder( $title )
		{
			$screen = get_current_screen();
    
		    if  ( 'apg' == $screen->post_type ) {
		          $title = __( 'Album Title', 'aswin-photo-gallery' );
		     }

		     return $title;
		}


		public function add_settings_submenu_page($value='')
		{
			add_submenu_page( 'edit.php?post_type=apg', __( 'Settings', 'aswin-photo-gallery'), __( 'Settings', 'aswin-photo-gallery'), 'manage_options', 'aswin-photo-gallery-settings', array($this,'settings_page_view') );

			add_submenu_page( 'edit.php?post_type=apg', __( 'Shortcode Generator', 'aswin-photo-gallery'), __( 'Shortcode Generator', 'aswin-photo-gallery'), 'manage_options', 'edit.php?post_type=apg_shortcode');
		}


		public function settings_page_view($value='')
		{
			aswin_photo_gallery()->get_template_part( 'admin/settings' );
		}


		public function shortcode_page_view($value='')
		{
			aswin_photo_gallery()->get_template_part( 'admin/shortcode-generator' );
		}



	}

}