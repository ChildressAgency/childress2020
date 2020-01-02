<?php if(have_rows('flip_discs')): ?>
</div></section> <?php //close container and previous section ?>

<section class="info-dots dots-bg<?php if(get_field('use_darker_background') == 1){ echo ' dots-bg-dark'; } ?>">
  <div class="container">
    <h2><?php the_field('flip_discs_section_title'); ?></h2>
    <div class="flip-discs">

      <?php while(have_rows('flip_discs')): the_row(); ?>
        <div class="flip-disc">
          <div class="flip-disc-inner">
            <div class="flip-disc-title">
              <?php 
                if(get_sub_field('title_placement') == 'on-disc'){
                  echo '<h3>' . esc_html(get_sub_field('disc_title')) . '</h3>';
                }
                else{
                  if(get_sub_field('icon_file_type') == 'png'){
                    echo '<img src="' . esc_url(get_sub_field('icon')) . '" class="disc-icon" alt="" />';
                  }
                  else{
                    $icon_id = get_sub_field('icon_svg_sprite_id');
                    echo '<svg class="disc-icon"><use xlink:href="#' . $icon_id . '" /></svg>';
                  }
                }
              ?>
            </div>
            <div class="flip-disc-content">
              <h4><?php the_sub_field('disc_reverse_side_title'); ?></h4>
              <p><?php the_sub_field('disc_reverse_side_content'); ?></p>
            </div>
          </div>
          <?php if(get_sub_field('title_placement') == 'below-disc'): ?>
            <h4 class="flip-disc-caption"><?php the_sub_field('disc_title'); ?></h4>
          <?php endif; ?>
        </div>
      <?php endwhile; ?>

    </div><?php //.flip-discs ?>
  </div>
</section>
<section class="main-content">
  <div class="container">
<?php endif; ?>