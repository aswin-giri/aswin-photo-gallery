<div id="" class="apg-wrapper album_view" col="4">
	<div class="apg-container">
		<div class="apg-row">
			<?php while( $data->have_posts()):$data->the_post(); 
				$cover_img = '';
				if(has_post_thumbnail()){
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_id()), 'medium' );
					$cover_img = $image[0];
				}
				$images_count = 0;
				$title = get_the_title();
			?>
			<div class="apg-album-block">
				<a href="" data-album_id="">
					<div class="apg-album-cover" style="background-image:url(<?php echo $cover_img; ?>); "></div>
					<div class="agp-album-overlay">
						<h3 class="apg-album-title"><?php echo $title; ?> (<?php echo $images_count; ?>)</h3>
					</div>
				</a>
			</div>
			<?php endwhile; ?>
		</div>
	</div>
</div>