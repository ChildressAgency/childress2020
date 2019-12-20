<?php
  if(have_posts()){
    while(have_posts()){
      the_post();

      if(is_singular()){
        the_content();
      }
      else{
        echo '<h3><a href="' . esc_url(get_permalink()) . '">' . esc_html(get_the_title()) . '</a></h3>';
        the_excerpt();
      }
    }
  }
  else{
    echo '<p>' . esc_html__('Sorry, we could not find what you were looking for.' , 'cai') . '</p>';
  }