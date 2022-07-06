<?php 
namespace apg\admin;

if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists('apg\admin\Metabox')){

	class Metabox {


		function __construct(){

			add_action('add_meta_boxes', array( $this,'gallery_metabox' ) );

		    add_action('do_meta_boxes', array( $this, 'remove_thumbnail_box' ) );

		    add_action('save_post', array( $this , 'meta_save' ) );

		}


		public function gallery_metabox( $atts=[] )
		{
			add_meta_box( 'apg-single-album-tabs', __( 'Album Details', 'aswin-photo-galley' ), array( $this,'tabs_metabox_view' ), 'apg', 'normal', 'high' );

			add_meta_box( 'apg-single-album-tabs', __( 'Shortcode Settings', 'aswin-photo-galley' ), array( $this,'shortcode_settings_view' ), 'apg_shortcode', 'normal', 'high' );
		}


		public function tabs_metabox_view( $post )
		{
			aswin_photo_gallery()->get_template_part( 'admin/metabox/tabs',['post' => $post] );
		}


		public function shortcode_settings_view( $post )
		{
			aswin_photo_gallery()->get_template_part( 'admin/metabox/shortcode-settings',['post' => $post] );
		}



		public function remove_thumbnail_box()
		{
			remove_meta_box( 'postimagediv','apg','side' );
		}


		public function meta_save( $post_id )
		{
			 
			// save images
            if( isset( $_POST['apg_gallery'] ) ){

              $post_apg_gallery = $_POST['apg_gallery'];

              if( ! is_array($post_apg_gallery)) return;

	              foreach($post_apg_gallery as $key => $image_id):

	                if(! is_numeric($image_id)) return;

	               endforeach;

              update_post_meta($post_id, 'apg_gallery',$post_apg_gallery);

            }else {
              delete_post_meta($post_id, 'apg_gallery');
            }


            // save description
            if(isset($_POST['apg_description'])) {
              $post_description = esc_attr( $_POST['apg_description'] );
              update_post_meta($post_id, 'apg_description',$post_description);
            } else {
              delete_post_meta($post_id, 'apg_description');
            }

           
		} // end meta_save

		



	}

}