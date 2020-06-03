<?php get_header(); ?>
  <main id="main" class="service-page services-main">
    <div class="container-fluid clearfix">
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cloud-four-circles.png" class="service-page-header-img" alt="" />
      <h1 class="page-title">Our Services</h1>
      <div class="service-line"></div>
    </div>
    <!--<div class="clearfix"></div>-->
    <?php if(have_rows('services')): $i = 1; while(have_rows('services')): the_row(); ?>
      <div class="row no-gutters<?php echo ($i % 2 == 0) ? ' text-right' : ' text-left'; ?>">
        <div class="col-md-6 d-none d-md-block image-side<?php if($i % 2 == 0){ echo ' order-md-last'; } ?>" style="background-image:url(<?php the_sub_field('service_image'); ?>); <?php the_sub_field('service_image_css'); ?>">
          <div class="blue-overlay"></div>
        </div>
        <div class="col-md-6 text-side<?php if($i % 2 == 0){ echo ' order-md-first'; } ?>">
          <div class="mobile-background d-block d-md-none" style="background-image:url(<?php the_sub_field('service_image'); ?>); <?php the_sub_field('service_image_css'); ?>"></div>
          <div class="blue-overlay d-block d-md-none"></div>
          <div class="service-desc" data-aos="fade-up" data-aos-offset="250">
            <div class="disc-icon-bg"data-aos="zoom-in" data-aos-offset="250" data-aos-delay="500">
              <?php
                if(get_sub_field('icon_file_type') == 'png'){
                  echo '<img src="' . esc_url(get_sub_field('icon')) . '" class="disc-icon" alt="" />';
                }
                else{
                  $icon_id = get_sub_field('icon_svg_sprite_id');
                  echo '<svg class="disc-icon"><use xlink:href="#' . $icon_id . '" /></svg>';
                }
              ?>
            </div>
            <h2><?php the_sub_field('service_title'); ?></h2>
            <?php the_sub_field('service_description'); ?>
            <?php 
              $service_link = get_sub_field('service_link');
              if($service_link): ?>
                <a href="<?php echo esc_url($service_link['url']); ?>" class="btn-main"><?php echo esc_html($service_link['title']); ?></a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    <?php $i++; endwhile; endif; ?>
  </main>
<?php get_footer();