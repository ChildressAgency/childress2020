<?php get_header(); ?>
<main id="main">
  <section class="main-content">
    <div class="container">
      <?php
        if(is_user_logged_in()){
          if(have_posts()){
            while(have_posts()){
              the_post();
              echo '<section class="main-content"><div class="container">';
                the_content();
              echo '</div></section>';
            }
          }
          else{
            get_template_part('partials/loop', 'no_content');
          }
        }
        else{
          wp_login_form();
        }
      ?>
    </div>
  </section>
</main>
<?php get_footer();