<?php get_header(); ?>
<main id="main">
  <section class="testimonials">
    <div class="container">
      <?php if(have_rows('testimonials')): while(have_rows('testimonials')): the_row(); ?>
        <blockquote class="blockquote mb-5">
          <?php the_sub_field('testimonial'); ?>
          <footer class="blockquote-footer"><cite><?php the_sub_field('testimonial_author'); ?></cite></footer>
        </blockquote>
      <?php endwhile; endif; ?>
    </div>
  </section>
</main>
<?php get_footer();