  <?php if(have_rows('process_steps')): ?>
    <section id="learn_more" class="step-slider">
      <div class="d-none d-md-block bubbles top-left-bubbles">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/top-left-bubbles.png" class="img-fluid d-block" alt="" />
      </div>
      <div class="d-none d-md-block bubbles top-right-bubbles">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/top-right-bubbles.png" class="img-fluid d-block" alt="" />
      </div>
      <div class="d-none d-md-block bubbles bottom-left-bubbles">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/bottom-left-bubbles.png" class="img-fluid d-block" alt="" />
      </div>
      <div class="d-none d-md-block bubbles bottom-right-bubbles">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/bottom-right-bubbles.png" class="img-fluid d-block" alt="" />
      </div>

      <div class="container">
        <h2><?php the_field('process_steps_section_title'); ?></h2>

        <div class="swiper-container">
          <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <div class="swiper-pagination d-none d-md-flex"></div>
          <div class="swiper-wrapper">

            <?php while(have_rows('process_steps')): the_row(); ?>
              <div class="swiper-slide">
                <div class="row">
                  <div class="col-md-6">
                    <h3 class="slide-title"><?php the_sub_field('slide_title'); ?></h3>
                    <?php the_sub_field('slide_content'); ?>
                  </div>
                  <div class="col-md-6">
                    <?php $slide_image = get_sub_field('slide_image'); ?>
                    <img src="<?php echo esc_url($slide_image['url']); ?>" class="img-fluid d-block mx-auto" alt="<?php echo esc_attr($slide_image['alt']); ?>" />
                  </div>
                </div>
              </div>
            <?php endwhile; ?>

          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>
