<div class="col-md-6 col-lg-4">
  <a href="<?php the_permalink(); ?>" class="video">
    <?php
      $vid_image_url = '';
      $vid_image_css = '';
      $vid_image_alt = '';

      if(has_post_thumbnail()){
        $video_post_id = get_the_ID();
        $vid_image_url = get_the_post_thumbnail_url($video_post_id, 'large');
        $vid_image_id = get_post_thumbnail_id($video_post_id);
        $vid_image_alt = get_post_meta($vid_image_id, '_wp_attachment_image_alt', true);
      }
      else{
        $blog_page = get_page_by_path('news-events');
        $blog_page_id = $blog_page->ID;

        $default_vid_image = get_field('video_default_featured_image', $blog_page_id);
        $vid_image_url = $default_vid_image['url'];
        $vid_image_alt = $default_vid_image['alt'];
      }
    ?>

    <img src="<?php echo esc_url($vid_image_url); ?>" class="img-fluid d-block mx-auto" alt="<?php echo esc_attr($vid_image_alt); ?>" />
    <span class="video-title"><h3><?php the_title(); ?></h3></span>
  </a>
</div>