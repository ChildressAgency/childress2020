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
                <?php
                  $web_design_link_text = get_field('web_design_side_link_text');
                  if(!$web_design_link_text){
                    $web_design_link_text = $web_design_link['title'];
                  }
                 ?>
                <p><?php echo wp_kses_post($web_design_link_text); ?></p>
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
                <?php
                  $marketing_link_text = get_field('marketing_side_link_text');
                  if(!$marketing_link_text){
                    $marketing_link_text = $marketing_link['title'];
                  }
                ?>
                <p><?php echo wp_kses_post($marketing_link_text); ?></p>
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

  <?php get_template_part('partials/process-steps-slider'); ?>
  
</main>
<?php get_footer(); 