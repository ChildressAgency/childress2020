<?php if(get_field('show_quick_link_slider')): ?>
  <?php if(have_rows('quick_links', 'option')): ?>
    <section id="news-chats">
      <div class="container-fluid">
        <div class="swiper-container">
          <div class="swiper-wrapper">
            <?php while(have_rows('quick_links', 'option')): the_row(); ?>
              <div class="swiper-slide">
                <?php
                  $quick_link_bg_image = get_sub_field('quick_link_background_image');
                  $quick_link_caption = get_sub_field('quick_link_caption');
                  $quick_link_link = get_sub_field('quick_link_link');
                ?>
                <div class="promo-block" style="background-image:url(<?php echo esc_url($quick_link_bg_image['url']); ?>);">
                  <div class="promo-block-caption">
                    <?php echo apply_filters('the_content', $quick_link_caption); ?>

                    <a href="<?php echo esc_url($quick_link_link['url']); ?>" class="btn-main"><?php echo esc_url($quick_link_link['title']); ?></a>
                  </div>
                  <div class="blue-overlay"></div>
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
<?php endif; ?>

  <section id="contact" style="<?php if(is_page('contact')){ echo 'padding-bottom:0; padding-top:200px;'; } ?>">
    <div class="contact-top">
      <div class="container">
        <div class="row">
          <div class="col-md-6 d-flex flex-column justify-content-center">
            <h2>READY TO<br />GET STARTED?</h2>
            <p>Leave us some information so we can get started TODAY.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="contact-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-6 d-flex align-items-center">
            <h3 class="call">CALL TODAY<br />
              <a href="tel:8664022002">866-402-2002</a>
            </h3>
          </div>
          <div class="col-md-6">
            <div class="contact-form">
              <?php echo do_shortcode(get_field('contact_form_shortcode', 'option')); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php if(is_page('contact')): ?>
  <?php
    //$contact_page = get_page_by_path('contact');
    //$contact_page_id = $contact_page->ID;
    $contact_page_id = get_the_ID();
  ?>
  <section id="contact-info" style="background-image:url(<?php the_field('map_section_background_image', $contact_page_id); ?>); <?php the_field('map_section_background_image_css', $contact_page_id); ?>">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-7">
          <?php the_field('map_section_intro'); ?>
          <div class="row mt-5">
            <div class="col-md-7">
              <h4>CORPORATE HEADQUARTERS</h4>
              <p class="loc-city">FREDERICKSBURG</p>
              <div itemscope itemtype="https://schema.org/LocalBusiness">
                <p>
                  <a href="tel:5404125199"><span itemprop="telephone">(540) 412-5199</span></a>
                </p>
                <p>
                  <a href="mailto:info@childressagency.com"><span itemprop="email">info@childressagency.com</span></a>
                </p>
                <div itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
                  <p>
                    <span itemprop="streetAddress">417 Wolfe Street</span><br />
                    <span itemprop="addressLocality">Fredericksburg</span>, 
                    <span itemprop="addressRegion">VA</span> 
                    <span itemprop="postalCode">22401</span>
                  </p>
                </div>
              </div>
            </div>

            <?php if(have_rows('other_locations', $contact_page_id)): ?>
              <div class="col-md-5">
                <h4>OTHER LOCATIONS</h4>
                <?php while(have_rows('other_locations', $contact_page_id)): the_row(); ?>
                  <div itemscope itemtype="https://schema.org/LocalBusiness">
                    <p class="loc-city">
                      <span itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
                        <span itemprop="addressLocality"><?php the_sub_field('location_city'); ?></span>
                      </span><br />
                      <a href="<?php the_sub_field('location_phone'); ?>"><span itemprop="telephone"><?php the_sub_field('location_phone'); ?></span></a>
                    </p>
                  </div>
                <?php endwhile; ?>
              </div>
            <?php endif; ?>

          </div>
        </div>
        <div class="col-lg-5">
          <div class="embed-responsive embed-responsive-4by3">
            <?php the_field('map_iframe', $contact_page_id); ?>
          </div>
        </div>
      </div>
    </div>
    <div class="blue-overlay"></div>
  </section>
<?php endif; ?>

  <footer id="footer">
    <section class="footer">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-3 mt-5 text-center text-xl-left">
            <svg class="logo-color-name">
              <use xlink:href="#logo-color-name" />
            </svg>
            <p class="mt-2">&copy;<?php echo date('Y'); ?> Childress Agency, Inc.<br />All Rights Reserved</p>
          </div>
          <div class="col-xl-9 mt-5 text-center text-xl-left">
            <div class="row">
              <div class="col-md-6 col-xl-2 mt-4">
                <h3>Services</h3>
                <?php
                  $services_footer_nav_args = array(
                    'theme_location' => 'services-nav', 
                    'menu' => '',
                    'container' => '',
                    'container_id' => '',
                    'container_class' => '',
                    'menu_id' => '',
                    'menu_class' => 'services-nav list-unstyled',
                    'echo' => true,
                    'fallback_cb' => 'cai_services_footer_nav_fallback_menu',
                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth' => 1,
                  );
                  wp_nav_menu($services_footer_nav_args);
                ?>
              </div>
              <div class="col-md-6 col-xl-4 mt-4">
                <?php if(have_rows('locations_phone_numbers', 'option')): ?>
                  <h3>Local numbers</h3>
                  <div class="phone-numbers">
                    <?php while(have_rows('locations_phone_numbers', 'option')): the_row(); ?>
                      <div itemscope itemtype="https://schema.org/LocalBusiness">
                        <p>
                          <span itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
                            <span itemprop="addressLocality"><?php the_sub_field('location_city'); ?></span>, 
                            <span itemprop="addressRegion"><?php the_sub_field('location_state'); ?></span>:
                          </span> 
                            <a href="tel:<?php the_sub_field('location_phone'); ?>"><span itemprop="telephone"><?php the_sub_field('location_phone'); ?></span></a>
                        </p>
                      </div>
                    <?php endwhile; ?>
                  </div>
                <?php endif; ?>
              </div>
              <div class="col-md-6 col-xl-3 mt-4">
                <h3>Headquarters</h3>
                <div itemscope itemtype="https://schema.org/LocalBusiness">
                  <div itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
                    <p>
                      <span itemprop="streetAddress">417 Wolfe Street</span><br />
                      <span itemprop="addressLocality">Fredericksburg</span>, 
                      <span itemprop="addressRegion">VA</span> 
                      <span itemprop="postalCode">22401</span>
                    </p>
                  </div>
                </div>
                <p><a href="<?php echo esc_url(home_url('careers')); ?>">Careers</a></p>
              </div>
              <div class="col-md-6 col-xl-3 mt-4">
                <?php
                  $facebook = get_field('facebook', 'option');
                  $instagram = get_field('instagram', 'option');
                  $twitter = get_field('twitter', 'option');
                  $linkedin = get_field('linkedin', 'option');
                  $youtube = get_field('youtube', 'option');
                ?>
                <h3>Stay Connected</h3>
                <div class="social">
                  <?php if($facebook): ?>
                    <a href="<?php echo esc_url($facebook); ?>" id="facebook" aria-label="Facebook" target="_blank"><span class="sr-only">Facebook</span></a>
                  <?php endif; if($instagram): ?>
                    <a href="<?php echo esc_url($instagram); ?>" id="instagram" aria-label="Instagram" target="_blank"><span class="sr-only">Instagram</span></a>
                  <?php endif; if($twitter): ?>
                    <a href="<?php echo esc_url($twitter); ?>" id="twitter" aria-label="Twitter" target="_blank"><span class="sr-only">Twitter</span></a>
                  <?php endif; if($linkedin): ?>
                    <a href="<?php echo esc_url($linkedin); ?>" id="linkedin" aria-label="LinkedIn" target="_blank"><span class="sr-only">LinkedIn</span></a>
                  <?php endif; if($youtube): ?>
                    <a href="<?php echo esc_url($youtube); ?>" id="youtube" aria-label="YouTube" target="_blank"><span class="sr-only">YouTube</span></a>
                  <?php endif; ?>
                </div>
                <div class="social mt-2">
                  <!-- google partner code -->
                  <script src="https://apis.google.com/js/platform.js" async defer></script>
                  <div class="g-partnersbadge" data-agency-id="3546559613"></div>
                  <!-- Add the code snippet above to the sites listed to display your badge: http://www.childressagency.com -->
                  <!-- end google partner code -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </footer>

    <div id="call-chat">
      <a href="tel:5404125199" class="call-chat_call">
        <div class="black-circle"></div>
        <div class="button"></div>
        <div class="front-circle"></div>
        <svg class="phone">
          <use xlink:href="#icon-phone" />
        </svg>
        </i>
      </a>
    </div>
    <?php get_template_part('partials/sprites.svg'); ?>
  <?php wp_footer(); ?>
</body>
</html>