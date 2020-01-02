<?php if(have_rows('info_cards')): ?>
</div></section><?php //close container and previous section ?>

<section class="digital-marketing dots-bg<?php if(get_field('use_darker_background') ==1){ echo ' dots-bg-dark'; } ?>">
  <div class="container">
    <h2><?php the_field('info_cards_section_title'); ?></h2>
    <div class="card-deck">
      <?php while(have_rows('info_cards')): the_row(); ?>

        <div class="card">
          <div class="card-top">
            <?php
              if(get_sub_field('image_file_type') == 'svg'){
                the_sub_field('svg_image_file');
              }
              else{
                $image = get_sub_field('standard_image_file');
                echo '<img src="' . esc_url($image['url']) . '" class="img-fluid d-block mx-auto" alt="' . esc_attr($image['alt']) . '" />';
              }

              $info_card_top_text = get_sub_field('info_card_top_text');
              if($info_card_top_text){
                echo '<h3 class="card-title">' . esc_html($info_card_top_text) . '</h3>';
              }
            ?>
          </div>
          <div class="card-body" data-aos="fade-up" data-aos-anchor=".dots-bg" data-aos-offset="500">
            <p><?php the_sub_field('info_card_description'); ?></p>
          </div>          
        </div>

      <?php endwhile; ?>
    </div><?php // .card-deck ?>

<?php //this container and section will be closed by previous section's opening section and container ?>
<?php endif; ?>