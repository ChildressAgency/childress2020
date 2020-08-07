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
        <div class="col-md-6">
          <?php $state_image = get_field('state_image'); ?>
          <img src="<?php echo esc_url($state_image['url']); ?>" class="img-fluid d-block mx-auto" alt="<?php echo esc_url($state_image['alt']); ?>" />
        </div>
        <div class="col-md-6">
          <h2><?php the_field('work_with_section_title'); ?></h2>
          <?php the_field('work_with_section_content'); ?>
          <?php $work_with_section_link = get_field('work_with_section_link'); ?>
          <?php if($work_with_section_link): ?>
            <a href="<?php echo esc_url($work_with_section_link['url']); ?>" class="btn-main"><?php echo esc_html($work_with_section_link['title']); ?></a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>

  <section id="location-services">
    <div class="container">
      <h2 style="font-size: 68px;"><b>Our Services</b></h2>
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
              <?php $web_design_service_link = get_field('web_design_service_link'); ?>
              <?php if($web_design_service_link): ?>
                <a href="<?php echo esc_url($web_design_service_link['url']); ?>" class="btn-main"><?php echo esc_html($web_design_service_link['title']); ?></a>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="media">
            <div class="disc-icon-bg">
              <svg class="disc-icon">
                <use xlink:href="#icon-devices-circle" />
              </svg>
            </div>
            <div class="media-body">
              <h3><?php the_field('digital_marketing_service_title'); ?></h3>
              <?php the_field('digital_marketing_service_description'); ?>
              <?php $digital_marketing_service_link = get_field('digital_marketing_service_link'); ?>
              <?php if($digital_marketing_service_link): ?>
                <a href="<?php echo esc_url($digital_marketing_service_link['url']); ?>" class="btn-main"><?php echo esc_html($digital_marketing_service_link['title']); ?></a>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="media">
            <div class="disc-icon-bg">
              <svg class="disc-icon">
                <use xlink:href="#icon-graph" />
              </svg>
            </div>
            <div class="media-body">
              <h3><?php the_field('seo_service_title'); ?></h3>
              <?php the_field('seo_service_description'); ?>
              <?php $seo_service_link = get_field('seo_service_link'); ?>
              <?php if($seo_service_link): ?>
                <a href="<?php echo esc_url($seo_service_link['url']); ?>" class="btn-main"><?php echo esc_html($seo_service_link['title']); ?></a>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="media">
            <div class="disc-icon-bg">
              <svg class="disc-icon">
                <use xlink:href="#icon-social-circle" />
              </svg>
            </div>
            <div class="media-body">
              <h3><?php the_field('social_media_service_title'); ?></h3>
              <?php the_field('social_media_service_description'); ?>
              <?php $social_media_service_link = get_field('social_media_service_link'); ?>
              <?php if($social_media_service_link): ?>
                <a href="<?php echo esc_url($social_media_service_link['url']); ?>" class="btn-main"><?php echo esc_html($social_media_service_link['title']); ?></a>
              <?php endif; ?>
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