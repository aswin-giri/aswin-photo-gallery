<div class="apg-postbox-container">
<div class="apg-album-tab">

  <div class="apg-album-tab-nav">
      <ul>
          <li class="active"><a class="apg-album-tab-nav-item" href="#album-cover"><?php _e( 'Album Cover','aswin-photo-gallery'); ?></a></li>
          <li class=""><a class="apg-album-tab-nav-item" href="#album-images"><?php _e( 'Images','aswin-photo-gallery'); ?></a></li>
          <li class=""><a class="apg-album-tab-nav-item" href="#album-description"><?php _e( 'Description','aswin-photo-gallery'); ?></a></li>
      </ul>
      <div class="clear"></div>
  </div>

  <div class="apg-album-tab-content">

      <div class="tab-content active" id="album-cover">
        <?php
        $thumbnail_id = null;
        $image_url = null;
        $btn_text = __('Add Album Cover', 'aswin-photo-gallery');
        if(has_post_thumbnail($post->ID)):
          $thumbnail_id = get_post_thumbnail_id($post->ID);
          $image = wp_get_attachment_image_src($thumbnail_id,'large');
          $image_url = $image[0];
          $btn_text = 'Change album cover';
        endif;
          aswin_photo_gallery()->get_template_part( 'admin/metabox/tabs/cover',[
            'thumbnail_id' => $thumbnail_id,
            'image_url' => $image_url,
            'btn_text'  => $btn_text
          ]);
         ?>
      </div>

      <div class="tab-content" id="album-images">
          <?php
            $ids = get_post_meta($post->ID, 'apg_gallery', true);
            aswin_photo_gallery()->get_template_part( 'admin/metabox/tabs/photos', [
                'ids' => $ids
              ]);
           ?>
      </div>

      <div class="tab-content" id="album-description">
          <?php
          aswin_photo_gallery()->get_template_part( 'admin/metabox/tabs/description',[
            'description' => get_post_meta($post->ID, 'apg_description', true)
          ]);
           ?>
      </div>

  </div>
<div>
</div>

<script src="<?php echo APG_URL.'assets/js/admin/gallery-metabox.js'; ?>"></script>
