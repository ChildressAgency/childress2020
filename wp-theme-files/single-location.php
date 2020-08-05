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

  <section id="work-with">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <?php $state_image = get_field('state_image'); ?>
          <img src="<?php echo esc_url($state_image['url']); ?>" class="img-fluid d-block mx-auto" alt="<?php echo esc_url($state_image['alt']); ?>" />
        </div>
        <div class="col-md-8">
          <h2><?php the_field('work_with_section_title'); ?></h2>
          <?php the_field('work_with_section_content'); ?>
        </div>
      </div>
    </div>
  </section>

  <section id="location-services">
    <div class="container">
      <h2>Our Services</h2>
      <div class="row">
        <div class="col-md-6">
          <div class="media">
            <div class="disc-icon-bg">
              <svg class="disc-icon">
                <use xlink:href="#icon-monitor" />
              </svg>
            </div>
            <div class="media-body">
              <h3><?php the_field('web_design_service_title'); ?></h3>
              <?php the_field('web_design_service_description'); ?>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="media">
            <div class="disc-icon-bg">
              <svg class="disc-icon">
                <use xlink:href="#icon-monitor" />
              </svg>
            </div>
            <div class="media-body">
              <h3><?php the_field('digital_marketing_service_title'); ?></h3>
              <?php the_field('digital_marketing_service_description'); ?>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="media">
            <div class="disc-icon-bg">
              <svg class="disc-icon">
                <use xlink:href="#icon-monitor" />
              </svg>
            </div>
            <div class="media-body">
              <h3><?php the_field('seo_service_title'); ?></h3>
              <?php the_field('seo_service_description'); ?>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="media">
            <div class="disc-icon-bg">
              <svg class="disc-icon">
                <use xlink:href="#icon-monitor" />
              </svg>
            </div>
            <div class="media-body">
              <h3><?php the_field('social_media_service_title'); ?></h3>
              <?php the_field('social_media_service_description'); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php get_template_part('partials/featured-case-studies'); ?>

  <?php get_template_part('partials/process-steps-slider'); ?>
</main>
<?php get_footer();