<?php get_header();?>
<main id="main">
  <section is="main-content">
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

  <?php if(have_rows('stats_slides')): ?>
    <section id="study-stats">
      <div class="swiper-container">
        <div class="swiper-wrapper">
          <?php while(have_rows('stats_slides')): the_row(); ?>

            <div class="swiper-slide">
              <div class="container">
                <div class="row">
                  <div class="col-md-5">
                    <div class="study-description">
                      <?php the_sub_field('stats_slide_content'); ?>
                    </div>

                    <?php if(have_rows('stats')): ?>
                      <div class="study-stats odo">
                        <div class="row">
                          <?php while(have_rows('stats')): the_row(); ?>

                            <div class="col-md-6">
                              <span class="count-plus">&plus;&nbsp;</span><span class="count odometer" data-top_number="<?php the_sub_field('stat_number'); ?>"></span>
                              <span class="stat-description"><?php the_sub_field('stat_title'); ?></span>
                            </div>

                          <?php endwhile; ?>
                        </div>
                      </div>
                    <?php endif; ?>

                  </div>
                  <div class="col-md-7 d-none d-md-flex align-items-center">
                    <?php $stats_slide_image = get_sub_field('stats_slide_image'); ?>
                    <img src="<?php echo esc_url($stats_slide_image['url']); ?>" class="img-fluid d-block mx-auto" alt="<?php echo esc_attr($stats_slide_image['alt']); ?>" />
                  </div>
                </div>
              </div>
            </div>

          <?php endwhile; ?>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div>
    </section>

    <?php
      $colors = get_field('color_bar_colors');
      $colors_count = count($colors);
      $color_width = 100 / $colors_count;
    ?>
    <section id="color-bar">
      <?php 
        foreach($colors as $color){
          echo '<span style="background-color:' . $color['color'] . '; width:' . $color_width . '%"></span>';
        }
      ?>
    </section>

  <?php if(have_rows('website_slides')): ?>
    <section id="case-slides">
      <div class="container-fluid">
        <div class="swiper-container">
          <div class="swiper-wrapper">
            <?php while(have_rows('website_slides')): the_row(); ?>

              <div class="swiper-slide">
                <?php $website_slide_image = get_sub_field('website_slide_image'); ?>
                <img src="<?php echo esc_url($website_slide_image['url']); ?>" class="img-fluid d-block mx-auto" alt="<?php echo esc_attr($website_slide_image['alt']); ?>" />
              </div>

            <?php endwhile; ?>
          </div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <?php
    $testimonial = get_field('client_testimonial');
    if($testimonial): ?>
      <section id="case-study-testimonial">
        <div class="container">
          <div class="testimonial-bubble">
            <blockquote>
              <div class="row">
                <div class="col-sm-2">
                  <?php 
                    $testimonial_image = get_field('testimonial_image');
                    if($testimonial_image): ?>
                      <img src="<?php echo esc_url($testimonial_image['url']); ?>" class="img-fluid d-block mx-auto rounded-circle" alt="<?php echo esc_url($testimonial_image['alt']); ?>" />
                  <?php endif; ?>
                </div>
                <div class="col-sm-10">
                  <?php echo wp_kses_post($testimonial); ?>
                  <cite>&mdash; <?php the_field('testimonial_author'); ?></cite>
                </div>
              </div>
            </blockquote>
          </div>
        </div>
      </section>
    <?php endif; ?>

  <?php get_template_part('partials/featured-case-studies'); ?>
</main>
<?php get_footer();