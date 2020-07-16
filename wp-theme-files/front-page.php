<?php get_header(); ?>
<main id="main">
  <?php
    if(have_posts()){
      while(have_posts()){
        the_post();

        get_template_part('partials/loop', 'page');
      }
    }
  ?>
    
  <section id="design-marketing">
    <div class="container">
      <div class="row">

        <div class="col-lg-4">
          <div class="design-side">
            <h3 class="design-marketing-title"><?php the_field('web_design_side_title'); ?></h3>
            <p><?php the_field('web_design_side_content'); ?></p>
            <div class="disc-icon-wrapper">
              <?php $web_design_link = get_field('web_design_side_link'); ?>
              <a href="<?php echo esc_url($web_design_link['url']); ?>" class="disc-icon-card">
                <div class="disc-icon-bg">
                  <svg class="disc-icon">
                    <use xlink:href="#icon-monitor" />
                  </svg>
                </div>
                <p><?php echo esc_html($web_design_link['title']); ?></p>
              </a>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <?php $phone_image = get_field('phone_image'); ?>
          <img src="<?php echo esc_url($phone_image['url']); ?>" class="img-fluid d-block mx-auto bump-phone" alt="<?php echo esc_attr($phone_image['alt']); ?>" />
        </div>

        <div class="col-lg-4">
          <div class="marketing-side">
            <h3 class="design-marketing-title"><?php the_field('marketing_side_title'); ?></h3>
            <p><?php the_field('marketing_side_content'); ?></p>
            <div class="disc-icon-wrapper">
              <?php $marketing_link = get_field('marketing_side_link'); ?>
              <a href="<?php echo esc_url($marketing_link['url']); ?>" class="disc-icon-card">
                <div class="disc-icon-bg">
                  <svg class="disc-icon">
                    <use xlink:href="#icon-graph" />
                  </svg>
                </div>
                <p><?php echo esc_html($marketing_link['title']); ?></p>
              </a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <section id="our-customers">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <?php $customers_served_image = get_field('customers_served_section_image'); ?>
          <img src="<?php echo esc_url($customers_served_image['url']); ?>" class="img-fluid d-block mx-auto mt-4"
            alt="<?php echo esc_attr($customers_served_image['alt']); ?>" />
        </div>
        <div class="col-md-6">
          <?php the_field('customers_served_content'); ?>
        </div>
      </div>
    </div>
  </section>

  <?php get_template_part('partials/featured-case-studies'); ?>

  <?php if(have_rows('process_steps')): ?>
    <section id="learn_more" class="step-slider">
      <div class="d-none d-md-block bubbles top-left-bubbles">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/top-left bubbles.png" class="img-fluid d-block" alt="" />
      </div>
      <div class="d-none d-md-block bubbles top-right-bubbles">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/top-right bubbles.png" class="img-fluid d-block" alt="" />
      </div>
      <div class="d-none d-md-block bubbles bottom-left-bubbles">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/bottom-left bubbles.png" class="img-fluid d-block" alt="" />
      </div>
      <div class="d-none d-md-block bubbles bottom-right-bubbles">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/bottom-right bubbles.png" class="img-fluid d-block" alt="" />
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
  
</main>
<?php get_footer(); 