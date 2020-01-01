<?php
if(is_singular('post')):
  $previous_post = get_previous_post();
  $next_post = get_next_post(); ?>

  <nav class="blog-pagination">
    <a href="<?php echo esc_url(get_permalink($previous_post->ID)); ?>" class="btn-main">Previous</a>
    <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" class="btn-main">Next</a>
  </nav>

<?php endif; 