<?php 
namespace apg\admin;

if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists('apg\admin\Admincolumn')){

	class Admincolumn {


		function __construct(){

			add_filter( 'manage_apg_posts_columns', array( $this, 'album_admin_columns' ) );

			add_filter( 'manage_apg_shortcode_posts_columns', array( $this, 'shortcode_admin_columns' ) );

			add_action( 'manage_apg_posts_custom_column', array( $this, 'populate_apg_custom_column'), 10, 2);

			add_action( 'manage_apg_shortcode_posts_custom_column', array( $this, 'populate_apg_shortcode_custom_column'), 10, 2);

		}


		public function album_admin_columns( $columns )
		{
			unset($columns['title']);
			unset($columns['date']);
			$columns['album_cover'] = __( 'Cover Image', 'aswin-photo-gallery' );
			$columns['title'] = __( 'Album Title', 'aswin-photo-gallery' );
			$columns['date'] = __( 'Album Created On', 'aswin-photo-gallery' );
			$columns['num_of_photos'] = __( 'No. of photos', 'aswin-photo-gallery' );
			return $columns;
		}



		public function populate_apg_custom_column( $column, $post_id )
		{
			if ( 'album_cover' == $column ) {
				$thumbnail_id = $thumbnail_id = get_post_thumbnail_id( $post_id );
				if( $thumbnail_id ){
					$image = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail' );
					echo '<img src="'.$image[0].'" width="80"/>';
				}else{
					echo 'NA';
				}
			}

			if ( 'num_of_photos' === $column ) {
				$images = get_post_meta($post_id, 'apg_gallery', true );
				echo count( $images );
			}

		}


		public function shortcode_admin_columns( $columns )
		{
			unset($columns['date']);
			$columns['title'] = __( 'Title', 'aswin-photo-gallery' );
			$columns['layout'] = __( 'Layout', 'aswin-photo-gallery' );
			$columns['shortcode'] = __( 'Shortcode', 'aswin-photo-gallery' );
			return $columns;
		}


		public function populate_apg_shortcode_custom_column( $column, $post_id )
		{
			if ( 'shortcode' == $column ) {
				echo '<code>[photo_album id="'.$post_id.'"]</code>';
			}
		}



	}

}