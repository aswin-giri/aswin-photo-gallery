<div class="wrap">
<h1><?php _e('Photo Gallery - Shortcode Generator','aswin-photo-gallery'); ?> </h1>
<form method="post" action="">
		
	<table class="form-table">
		<tbody>
			
		<tr>
		<th scope="row"><label for="apg_cover_image"><?php _e('Layout','aswin-photo-gallery'); ?></label></th>
		<td>
			<select name="apg_album-layout">
				<option value="album_view"><?php _e('Album View','aswin-photo-gallery'); ?></option>
				<option value="image_view"><?php _e('Image View','aswin-photo-gallery'); ?></option>
				<option value="carousel_view"><?php _e('Carousel','aswin-photo-gallery'); ?></option>
				<option value="portfolio"><?php _e('Portfolio','aswin-photo-gallery'); ?></option>
			</select>	
		</td>
		</tr>
		<tr>
		<th scope="row"><label for="apg_cover_image"><?php _e('Albums','aswin-photo-gallery'); ?></label></th>
		<td>
			<select name="apg_album-layout">
				<option value="all"><?php _e('All Albums','aswin-photo-gallery'); ?></option>
				<option value="except_selected"><?php _e('Except Selected','aswin-photo-gallery'); ?></option>
				<option value="only_selected"><?php _e('Only Selected','aswin-photo-gallery'); ?></option>
			</select>	
		</td>
		</tr>
		
			
		</tbody>
	</table>
	<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e('Generate Shortcode','aswin-photo-gallery'); ?>"></p>
	<?php wp_nonce_field('apg_save_settings'); ?>
</form>
</div>