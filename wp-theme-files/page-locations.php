<?php get_header(); ?>
<main id="main">
  <section id="main-content">
    <div class="container">
      <?php
        if(have_posts()){
          while(have_posts()){
            the_post();
            the_content();
          }
        }
      ?>
    </div>
  </section>
</main>
<?php get_footer();