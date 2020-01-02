<?php if(have_rows('percentage_cards')): ?>
</div></section><?php //close container and previous section ?>

<section id="color-facts" class="dots-bg<?php if(get_field('use_darker_background') == 1){ echo ' dots-bg-dark'; } ?>">
  <div class="container">
    <h2><?php the_field('percentage_cards_section_title'); ?></h2>
    <div class="card-deck">
      <?php while(have_rows('percentage_cards')): the_row(); ?>

        <div class="card">
          <div class="card-top">
            <span class="color-percentage"><?php the_sub_field('percentage_number'); ?><sup>%</sup></span>
          </div>
          <div class="card-body" data-aos="fade-up" data-aos-anchor="#color-facts" data-aos-offset="500">
            <p><?php the_sub_field('percentage_card_description'); ?></p>
          </div>
        </div>

      <?php endwhile; ?>
    </div><?php //.card-deck ?>
  </div>
</section>
<section class="main-content">
  <div class="container">
<?php endif; ?>