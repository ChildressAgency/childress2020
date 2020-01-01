<section id="seo-analysis">
  <div class="row">
    <div class="col-md-7 col-lg-8">
      <?php the_field('seo_analysis_section_content'); ?>
    </div>
    <div class="col-md-5 col-lg-4">
      <?php
        $seo_analysis_image = get_field('seo_analysis_section_image');
        $seo_analysis_image_url = $seo_analysis_image['url'];
        $seo_analysis_image_alt = $seo_analysis_image['alt'];
      ?>
      <img src="<?php echo esc_url($seo_analysis_image_url); ?>" class="img-fluid d-block mx-auto mt-5 mt-md-0" alt="<?php echo esc_attr($seo_analysis_image_alt); ?>" />
    </div>
  </div>
</section>
