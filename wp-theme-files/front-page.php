<?php get_header(); ?>
  <main id="main">
    <section class="main-content">
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

    <section id="clients">
      <div class="container">
        <ul class="client-list">
          <li>
            <a href="#">
              <img src="../wp-theme-files/images/client-logo-placeholder.jpg" class="img-fluid d-block mx-auto" alt="" />
            </a>
          </li>
          <li>
            <a href="#">
              <img src="../wp-theme-files/images/client-logo-placeholder.jpg" class="img-fluid d-block mx-auto" alt="" />
            </a>
          </li>
          <li>
            <a href="#">
              <img src="../wp-theme-files/images/client-logo-placeholder.jpg" class="img-fluid d-block mx-auto" alt="" />
            </a>
          </li>
        </ul>
        <a href="#" class="btn-main">Discover our clients</a>
      </div>
    </section>

  <?php 
    //$testimonials_page = get_page_by_path('testimonials');
    //$testimonials_page_id = $testimonials_page->ID;
    //if(have_rows('testimonials', $testimonials_page_id)): 

    $testimonials = new WP_Query(array(
      'post_type' => 'page',
      'posts_per_page' => -1,
      'meta_query' => array(
        array(
          'key' => 'testimonials_$_feature_on_homepage',
          'compare' => '=',
          'value' => 1
        )
      )
    ));

    if($testimonials): ?>

      <section id="testimonials">
        <div class="container-fluid">
        <div class="swiper-container">
          <div class="swiper-wrapper">

            <?php foreach($testimonials as $testimonial): ?>
              <div class="testimonial swiper-slide">
                <div class="testimonial-bubble">
                  <blockquote>
                    <?php echo cai_testimonial_excerpt($testimonial['testimonial']); ?>
                    <cite>&mdash; <?php echo esc_html__($testimonial['testimonial_author']); ?></cite>
                  </blockquote>
                </div>
              </div>
            <?php endforeach; ?>

          </div>

          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>

        </div>
        <a href="<?php echo esc_url(home_url('testimonials')); ?>" class="btn-main">More testimonials</a>
        </div>
      </section>
  <?php endif; ?>

  <?php if(have_rows('stats')): ?>
    <section id="stats">
      <div class="container">
        <div class="row">
          <?php while(have_rows('stats')): the_row(); ?>

            <div class="col-lg-4">
              <div class="stat-counter">
                <div class="counter-wrapper">
                  <span class="count odometer" data-top_number="<?php the_sub_field('stat_number'); ?>"></span>
                  <?php if(get_sub_field('show_plus_sign') == 1): ?>
                    <span class="counter-plus">+</span>
                  <?php endif; ?>
                </div>
                <p><?php the_sub_field('stat'); ?></p>
              </div>
            </div>

          <?php endwhile; ?>

        </div>
      </div>
    </section>
  <?php endif; ?>

    <section id="news-chats">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 d-flex">
            <div class="promo-block" style="background-image:url(<?php the_field('promo_block_1_background_image'); ?>); <?php the_field('promo_block_1_background_image_css'); ?>">
              <div class="promo-block-caption">
                <?php the_field('promo_block_1_content'); ?>
              </div>
              <div class="blue-overlay"></div>
            </div>
          </div>
          <div class="col-lg-6 d-flex">
            <div class="promo-block" style="background-image:url(<?php the_field('promo_block_2_background_image'); ?>); <?php the_field('promo_block_2_background_image_css'); ?>">
              <div class="promo-block-caption">
                <?php the_field('promo_block_2_content'); ?>
              </div>
              <div class="blue-overlay"></div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
<?php get_footer(); 