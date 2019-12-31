<div class="col-md-6 col-lg-4 d-flex">
  <div class="post-summary">
    <?php
      $bg_image_url = '';
      $bg_image_css = '';

      if(has_post_thumbnail()){
        $blog_post_id = get_the_ID();
        $bg_image_url = get_the_post_thumbnail_url($blog_post_id, 'large');
      }
      else{
        $blog_page = get_page_by_path('news-event');
        $blog_page_id = $blog_page->ID;

        $bg_image_url = get_field('default_featured_image', $blog_page_id);
        $bg_image_css = 'background-size:contain;';
      }
    ?>
    <div class="post-image" style="background-image:url(<?php echo esc_url($bg_image_url); ?>); <?php echo esc_attr($bg_image_css); ?>"></div>
    <div class="post-body">
      <h3 class="post-title"><?php the_title(); ?></h3>
      <?php the_excerpt(); ?>
    </div>
    <div class="post-footer">
      <a href="<?php the_permalink(); ?>" class="btn-main">Read More</a>
    </div>
  </div>
</div>
