<?php
/**
 * Template Name: Services Template
 * Description: Template for Services pages
 */
get_header(); ?>
<main id="main" class="service-page">
  <?php
    if(have_posts()){
      while(have_posts()){
        the_post();

        get_template_part('partials/loop', 'page');
      }
    }
  ?>

  <?php get_template_part('partials/process-steps-slider'); ?>

  <?php if(have_rows('sub_services')): ?>
    <section id="sub-services">
      <div class="container">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/bubble-set-1.png" class="bubbles center-left-bubbles" alt="" />
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/bubble-set-2.png" class="bubbles top-right-bubbles" alt="" style="top:0;" />
        <h2 class="text-center"><?php the_field('sub_services_section_title'); ?></h2>
        <div class="sub-services">
          <?php while(have_rows('sub_services')): the_row(); ?>

            <div class="sub-service">
              <div class="sub-service-body">
                <h3><?php the_sub_field('sub_service_title'); ?></h3>
                <p><?php the_sub_field('sub_service_description'); ?></p>
              </div>
              <?php $sub_service_link = get_sub_field('sub_service_link'); ?>
              <a href="<?php echo esc_url($sub_service_link['url']); ?>" class="btn-main"><?php echo esc_html($sub_service_link['title']); ?></a>
            </div>

          <?php endwhile; ?>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <?php if(have_rows('service_faqs')): ?>
    <section id="faqs">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <h2>FREQUENTLY ASKED QUESTIONS</h2>
            <div id="faq-questions" class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">

              <?php $q = 0; while(have_rows('service_faqs')): the_row(); ?>
                <a href="#answer-<?php echo $q; ?>" id="question-<?php echo $q; ?>" class="nav-link<?php if($q == 0){ echo ' active'; } ?>" data-toggle="pill" role="tab" aria-controls="answer-<?php echo $q; ?>" aria-selected="<?php ($q == 0) ? 'true' : 'false'; ?>"><?php the_sub_field('question'); ?></a>
              <?php $q++; endwhile; ?>

            </div>
          </div>
          <div class="col-md-6">
            <div id="faq-answers" class="tab-content">

              <?php $a = 0; while(have_rows('service_faqs')): the_row(); ?>
                <div id="answer-<?php echo $a; ?>" class="tab-pane fade<?php if($a == 0){ echo ' show active'; } ?>" role="tabpanel" aria-labelledby="question-<?php echo $a; ?>">
                  <h3><?php the_sub_field('question'); ?></h3>
                  <?php the_sub_field('answer'); ?>
                </div>
              <?php $a++; endwhile; ?>

            </div>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>
</main>
<?php get_footer();