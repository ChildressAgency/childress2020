<?php get_header(); ?>
  <main id="main">
    <section id="main-content">
      <div class="container">
        <?php 
          if(have_posts()){
            while(have_posts()){
              the_post();

              the_content();
            }
          }
        ?>
      </div>
    </section>

  <?php if(have_rows('team_members')): ?>
    <section id="our-team">
      <div class="container-fluid">
        <h2>OUR TEAM</h2>
        <div class="swiper-container">
          <div class="swiper-wrapper">

            <?php while(have_rows('team_members')): the_row(); ?>
              <div class="swiper-slide">
                <div class="team">
                  <div class="team-inner">
                    <div class="team-image">
                      <?php 
                        $member_image = get_sub_field('team_member_image');
                        if(!$member_image){
                          $member_image = get_field('default_team_member_image');
                        }
                      ?>
                      <img src="<?php echo esc_url($member_image['url']); ?>" class="img-fluid d-block" alt="<?php echo esc_attr($member_image['alt']); ?>" />
                    </div>
                    <div class="team-bio">
                      <h4><?php the_sub_field('team_member_name'); ?></h4>
                      <p><?php the_sub_field('team_member_bio'); ?></p>
                    </div>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>

          </div>

          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
        </div>
      </div>
    </section>
  <?php endif; ?>

    <section id="affiliates">
      <div class="container-fluid">
        <article class="half-width mb-5">
          <?php the_field('affiliates_section_content'); ?>
        </article>

        <?php if(have_rows('affiliations')): ?>
          <div class="affiliations">

            <?php while(have_rows('affiliations')): the_row(); ?>
              <?php $affiliate_image = get_sub_field('affiliate_image'); ?>
              <img src="<?php echo esc_url($affiliate_image['url']); ?>" class="img-fluid d-block mx-auto" alt="<?php echo esc_attr($affiliate_image['alt']); ?>" />
            <?php endwhile; ?>
            
          </div>
        <?php endif; ?>

      </div>
    </section>
  </main>
<?php get_footer();