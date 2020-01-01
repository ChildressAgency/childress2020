<?php get_header(); ?>
<main id="main">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 col-lg-9">
        <?php get_template_part('partials/loop'); ?>
      </div>

      <div class="col-md-4 col-lg-3">
        <?php get_sidebar('blog'); ?>
      </div>
    </div>
  </div>
</main>
<?php get_footer();