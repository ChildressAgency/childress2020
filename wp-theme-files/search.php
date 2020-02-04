<?php get_header(); ?>
<main id="main">
  <div class="container">
    <section class="main-content">
      <article class="entry-content">
        <?php
          if(have_posts()){
            echo '<h1 class="page-title">Showing results for ' . get_search_query() . '</h1>';

            while(have_posts()){
              the_post();
              get_template_part('partials/loop', 'generic');
            }

            wp_pagenavi();
          }
          else{
            get_template_part('partials/loop', 'no_content');
          }
        ?>
      </article>
    </section>
  </div>
</main>
<?php get_footer();