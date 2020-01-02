<?php
/**
 * Template Name: Services Template
 * Description: Template for Services pages
 */
get_header(); ?>
<main id="main" class="service-page">
  <section id="main-content">
    <div class="container">
      <?php
        if(have_posts()){
          while(have_posts()){
            the_post();

            echo '<h1 class="page-title">' . esc_html(get_the_title()) . '</h1>';
            the_content();
          }
        }
        else{
          get_template_part('partials/loop', 'no_content');?>
        }
    </div>
  </section>
</main>
<?php get_footer();