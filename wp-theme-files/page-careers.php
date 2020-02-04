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

<section id="careers">
  <div class="container">
    <?php if(have_rows('positions')): ?>
      <?php
        $c = 0;
        while(have_rows('positions')){
          the_row();
          if(get_sub_field('display_position')){
            $c++;
          }
        }
      ?>

      <?php if($c > 0): ?>
        <h2>Available Openings</h2>
        <div id="positions-accordion" class="accordion">

          <?php $i = 0; while(have_rows('positions')): the_row(); ?>
            <?php if(get_sub_field('display_position')): ?>

              <div class="card">
                <div id="position-<?php echo $i; ?>-title" class="card-header">
                  <h3><?php the_sub_field('position_title'); ?></h3>
                  <p><?php the_sub_field('position_location'); ?></p>
                  <a href="#position-<?php echo $i; ?>-description" class="collapsed view-more" data-toggle="collapse" aria-expanded="false" aria-controls="position-<?php echo $i; ?>-description">view more<svg class="view-more-caret"><use xlink:href="#icon-caret" /></svg></a>
                </div>
                <div id="position-<?php echo $i; ?>-description" class="collapse" aria-labelledby="position-<?php echo $i; ?>-title" data-parent="#positions-accordion">
                  <div class="card-body">
                    <?php the_sub_field('position_details'); ?>
                    <p class="mt-5 text-center"><a href="<?php echo esc_url(add_query_arg('position-title', get_sub_field('position_title'), home_url('apply-now'))); ?>" class="btn-main">APPLY NOW</a></p>
                  </div>
                </div>
              </div>

            <?php endif; ?>
          <?php $i++; endwhile; ?>

        </div>
      <?php else: ?>
        <h3>We currently don't have any openings.</h3>
      <?php endif; ?>
    <?php else: ?>
      <h3>We currently don't have any openings.</h3>
    <?php endif; ?>
  </div>
</section>

<?php if(get_field('after_positions_content')): ?>
  <section id="after-positions">
    <div class="container">
      <?php the_field('after_position_content'); ?>
    </div>
  </section>
<?php endif; ?>
</main>
<?php get_footer();