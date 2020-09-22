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

  <section id="value-proposition" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/bg-value-prop.jpg);">
    <div class="container">
      <h2><?php the_field('value_proposition_section_header'); ?></h2>
      <div class="row">
        <div class="col-md-4">
          <div class="value-prop">
            <div class="disc-icon-wrapper">
              <div class="disc-icon-card">
                <div class="disc-icon-bg">
                  <svg class="disc-icon">
                    <use xlink:href="#icon-monitor" />
                  </svg>
                </div>
                <p><?php the_field('value_prop_1_title'); ?></p>
              </div>
            </div>
            <p><?php the_field('value_prop_1_subtitle'); ?></p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="value-prop">
            <div class="disc-icon-wrapper">
              <div class="disc-icon-card">
                <div class="disc-icon-bg">
                  <svg class="disc-icon">
                    <use xlink:href="#icon-social-circle" />
                  </svg>
                </div>
                <p><?php the_field('value_prop_2_title'); ?></p>
              </div>
            </div>
            <p><?php the_field('value_prop_2_subtitle'); ?></p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="value-prop">
            <div class="disc-icon-wrapper">
              <div class="disc-icon-card">
                <div class="disc-icon-bg">
                  <svg class="disc-icon">
                    <use xlink:href="#icon-graph" />
                  </svg>
                </div>
                <p><?php the_field('value_prop_3_title'); ?></p>
              </div>
            </div>
            <p><?php the_field('value_prop_3_subtitle'); ?></p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="location-services">
    <div class="container">
      <h2><?php the_field('locations_services_section_title'); ?></h2>
      <div class="row">
        <?php if(have_rows('location_services')): while(have_rows('location_services')): the_row(); ?>
          <div class="col-md-6 d-flex">
            <div class="post-summary">
              <?php $service_image = get_sub_field('service_image'); ?>
              <div class="post-image" style="background-image:url(<?php echo esc_url($service_image['url']); ?>);"></div>
              <div class="post-body">
                <h3 class="post-title"><?php the_sub_field('service_title'); ?></h3>
                <?php the_sub_field('service_description'); ?>
              </div>
              <div class="post-footer">
                <?php $service_link = get_sub_field('service_link'); ?>
                <a href="<?php echo esc_url($service_link['url']); ?>" class="btn-main">Read More</a>
              </div>
            </div>
          </div>
        <?php endwhile; endif; ?>
      </div>
    </div>
  </section>

  <?php get_template_part('partials/process-steps-slider'); ?>
</main>
<?php get_footer();