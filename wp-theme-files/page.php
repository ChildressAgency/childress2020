<?php get_header(); ?>
<main id="main">
  <?php
    if(have_posts()){
      while(have_posts()){
        the_post();

        get_template_part('partials/loop', 'page');
      }
    }
    else{
      get_template_part('partials/loop', 'no_content');
    }
  ?>
</main>
<?php get_footer();