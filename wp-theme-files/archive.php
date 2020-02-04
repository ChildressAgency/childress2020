<?php get_header(); ?>
<main id="main">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 col-lg-9">
        <section class="main-content">
          <article class="entry-content">
            <div class="row">
            <?php
              if(have_posts()){
                while(have_posts()){
                  the_post();
                  get_template_part('partials/loop', 'recent_posts');
                }
                //wp_pagenavi();
              }
              else{
                get_template_part('partials/loop', 'no_content');
              }
            ?>
            </div>
            <?php wp_pagenavi(); ?>
          </article>
        </section>
      </div>

      <div class="col-md-4 col-lg-3">
        <?php get_sidebar('blog'); ?>
      </div>
    </div>
  </div>
</main>
<?php get_footer();