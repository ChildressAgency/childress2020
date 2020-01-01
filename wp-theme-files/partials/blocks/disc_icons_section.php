<?php if(have_rows('disc_icons')): ?>
</div></section><?php //close container and previous section ?>

<section class="disc-icon-section">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div class="disc-icon-section-icons">

          <?php while(have_rows('disc_icons')): the_row(); ?>

            <div class="disc-icon-wrapper">
              <?php 
                $link = get_sub_field('disc_icon_link');
                if($link){
                  echo '<a href="' . esc_url($link['url']) . '" class="disc-icon-card">';
                }
                else{
                  echo '<div class="disc-icon-card">';
                }
              ?>

                <div class="disc-icon-bg">
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
                <?php
                  $disc_icon_title = get_sub_field('disc_icon_title');
                  $disc_icon_description = get_sub_field('disc_icon_description');
                ?>
                <h4><?php echo esc_html($disc_icon_title); ?></h4>
                <p><?php echo esc_html($disc_icon_description); ?></p>

              <?php
                if($link){
                  echo '</a>';
                }
                else{
                  echo '</div>';
                }
              ?>
            </div>

          <?php endwhile; ?>
        </div>
      </div>

      <div class="col-md-4">
        <div class="disc-icon-section-caption">
          <?php the_field('disc-icon-section-caption'); ?>
        </div>
      </div>
    </div><?php //.row ?>
<?php //this container and section will be closed by previous section's opening section and container ?>
<?php endif; ?>