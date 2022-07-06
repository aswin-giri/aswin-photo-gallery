<table class="form-table">
      <tr><td>
        <a class="gallery-add" href="#" data-uploader-title="Add image(s) to gallery" data-uploader-button-text="Add image(s)"><span class="dashicons dashicons-plus-alt2"></span> Add Images</a>

        <ul id="gallery-metabox-list">
        <?php if ($ids) : foreach ($ids as $key => $value) : 
                $image = wp_get_attachment_image_src($value);
          ?>

          <li>
            <input type="hidden" name="apg_gallery[<?php echo $key; ?>]" value="<?php echo $value; ?>">
            <img class="image-preview" src="<?php echo $image[0]; ?>">
            <span class="controls"><a class="remove-image" href="#">&times;</a></span> 
          </li>

        <?php endforeach; endif; ?>
        </ul>

      </td></tr>
</table>