  <?php 
    $featured_case_studies = get_field('featured_case_studies', 'option');
    if($featured_case_studies): ?>
      <section id="case-studies">
        <div class="container-fluid">
          <div class="swiper-container">
            <div class="swiper-wrapper">

              <?php
                foreach($featured_case_studies as $case_study):
                  $case_study_link = get_permalink($case_study->ID);
                  $case_study_link_image = get_field('case_study_link_image', $case_study->ID);
                  $case_study_logo = get_field('case_study_white_logo', $case_study->ID); ?>
              
                  <div class="swiper-slide">
                    <a href="<?php echo esc_url($case_study_link); ?>" style="background-image: url(<?php echo esc_url($case_study_link_image['url']); ?>);">
                      <img src="<?php echo esc_url($case_study_logo['url']); ?>" class="img-fluid d-block mx-auto" alt="<?php echo esc_attr($case_study_logo['alt']); ?>" />
                    </a>
                  </div>
              <?php endforeach; ?>

            </div>
          </div>

          <p class="text-center mt-5">
            <a href="<?php echo esc_url(home_url('case-studies')); ?>" class="btn-main">See More Customers</a>
          </p>
        </div>
      </section>
  <?php endif; ?>
