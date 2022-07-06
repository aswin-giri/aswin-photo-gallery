<?php 
namespace apg;

if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists('apg\Shortcode')){

	class Shortcode {


		function __construct(){

			  add_shortcode('apg_gallery',array($this,'all_in_one'));

		      add_shortcode('apg_album',array( $this,'gallery_album' ) );

		      add_shortcode('apg_filterable',array($this,'filterable_gallery'));

		      add_action('wp_footer',array($this,'modal_html'));

		      add_shortcode( 'photo_album',array( $this,'all_in_one' ) );

		}

		public function modal_html($value='')
		{
			# code...
		}


		public function gallery_album( $atts= [])
		{
			return do_shortcode('[photo_album mode="image_view" album_id="'.$atts['album_id'].'"]'); 
		}

		public function filterable_gallery( $atts =[])
		{
			return do_shortcode('[photo_album mode="portfolio" filter_type="'.$atts['filter'].'" albums="1,2,3"]'); 
		}


		public function all_in_one( $atts = [] )
		{
			$mode = 'album_view';
			$col = 4;
			$per_page = 10;

			$args = [
				'post_type' => 'apg',
				'posts_per_page' => $per_page
			];

			$query = new \WP_Query( $args );
			ob_start();
			if( $query->have_posts() ):
				aswin_photo_gallery()->get_template_part('album-view', ['data' => $query ]);
			else:
				_e( 'There is nothing to display.', 'aswin-photo-gallery' );
			endif;
			$contents = ob_get_contents();
			ob_end_clean();
			return $contents;
		}


		


	}

}