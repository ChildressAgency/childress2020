<?php get_header(); ?>
<main id="main">
  <div class="container-fluid">
    <h1>CASE STUDIES</h1>
    <div class="row">
      <div class="col-md-8 col-lg-9">
        <section id="case-studies">
          <div class="case-studies-loop">
            <?php
              if(have_posts()){
                while(have_posts()){
                  the_post();
                  $case_study_link = get_permalink();
                  $case_study_image = get_field('case_study_link_image');
                  $case_study_logo = get_field('case_study_white_logo');

                  echo '<a href="' . esc_url($case_study_link) . '" style="background-image: url(' . esc_url($case_study_image['url']) . ');">';
                    echo '<img src="' . esc_url($case_study_logo['url']) . '" class="img-fluid d-block mx-auto" alt="' . esc_attr($case_study_logo['alt']) . '" />';
                  echo '</a>';
                }
              }
              else{
                get_template_part('partials/loop', 'no_content');
              }
            ?>
          </div>
          <?php wp_pagenavi(); ?>
        </section>
      </div>
      <div class="col-md-4 col-lg-3">
        <?php get_sidebar('casestudies'); ?>
      </div>
    </div>
  </div>
</main>
<?php get_footer();