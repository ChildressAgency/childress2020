<?php get_header(); ?>
<main id="main">
  <div class="container-fluid">
    <h2 style="color:#1277d6; font-family:'Avenir LT W01_55 Roman1475520', sans-serif">CASE STUDIES</h2>
    <div class="row">
      <div class="col-md-8 col-lg-9">
        <section id="case-studies">
          <div class="case-studies-loop">
            <?php
              $case_studies = new WP_Query(array(
                'post_type' => 'case_studies',
                'post_status' => 'publish',
                'posts_per_page' => 12,
                'paged' => 1
              ));

              if($case_studies->have_posts()){
                while($case_studies->have_posts()){
                  $case_studies->the_post();

                  $case_study_link = get_permalink();
                  $case_study_image = get_field('case_study_link_image');
                  $case_study_logo = get_field('case_study_white_logo');

                  echo '<a href="' . esc_url($case_study_link) . '" class="case-study-link" style="background-image: url(' . esc_url($case_study_image['url']) . ');">';
                    echo '<img src="' . esc_url($case_study_logo['url']) . '" class="img-fluid d-block mx-auto" alt="' . esc_attr($case_study_logo['alt']) . '" />';
                  echo '</a>';
                }
              }
              else{
                get_template_part('partials/loop', 'no_content');
              }
            ?>
          </div>
          <?php if($case_studies->found_posts > 12): ?>
            <p class="text-center mt-5">
              <a href="#" class="btn-main loadmore-casestudies">Load More</a>
            </p>
          <?php endif; ?>

        </section>
      </div>
      <div class="col-md-4 col-lg-3">
        <?php get_sidebar('casestudies'); ?>
      </div>
    </div>
  </div>
</main>
<?php get_footer();