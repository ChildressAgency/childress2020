<?php
/**
 * Template Name: Services Template
 * Description: Template for Services pages
 */
get_header(); ?>
<main id="main" class="service-page">
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