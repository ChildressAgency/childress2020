  <section class="main-content">
    <div class="container">
      
      <?php if(!is_front_page()): ?>
        <h1 class="page-title"><?php the_title(); ?></h1>
      <?php endif; ?>

      <?php the_content(); ?>
    </div>
  </section>
