<?php
if(get_field('image_file_type') == 'svg'){
  the_field('svg_image_file');
}
else{
  $image = get_field('standard_image_file');
  echo '<img src="' . esc_url($image['url']) . '" class="img-fluid d-block mx-auto" alt="' . esc_attr($image['alt']) . '" />'
}