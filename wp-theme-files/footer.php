  <section id="contact"
    style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/images/contact-section-bg.jpg); background-position:center center;<?php if(is_page('contact')){ echo ' padding-top:135px;'; } ?>">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4 marketing-easy">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-large.png" class="img-fluid d-block" alt="Childress Agency Logo" />
          <h2>We Make Marketing Easy</h2>
        </div>
        <div class="col-lg-8">
          <?php echo do_shortcode(get_field('contact_form_shortcode', 'option')); ?>
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
    <section id="upper-footer">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="row">
              <div class="col-sm-8">
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
                    <a href="<?php echo esc_url($facebook); ?>" id="facebook" aria-label="Facebook"><span class="sr-only">Facebook</span></a>
                  <?php endif; if($instagram): ?>
                    <a href="<?php echo esc_url($instagram); ?>" id="instagram" aria-label="Instagram"><span class="sr-only">Instagram</span></a>
                  <?php endif; if($twitter): ?>
                    <a href="<?php echo esc_url($twitter); ?>" id="twitter" aria-label="Twitter"><span class="sr-only">Twitter</span></a>
                  <?php endif; if($linkedin): ?>
                    <a href="<?php echo esc_url($linkedin); ?>" id="linkedin" aria-label="LinkedIn"><span class="sr-only">LinkedIn</span></a>
                  <?php endif; if($youtube): ?>
                    <a href="<?php echo esc_url($youtube); ?>" id="youtube" aria-label="YouTube"><span class="sr-only">YouTube</span></a>
                  <?php endif; ?>
                </div>
                <p class="mt-5">Keep up to date with our weekly newsletter.</p>
                <?php echo do_shortcode(get_field('newsletter_form_shortcode', 'option')); ?>
              </div>
              <div class="col-sm-4">
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
                    'items_wrap' => '<nav id="%1$s" class="%2$s">%3$s</nav>',
                    'depth' => 1,
                  );
                  wp_nav_menu($services_footer_nav_args);
                ?>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-sm-7">
                <?php if(have_rows('locations_phone_numbers', 'option')): ?>
                  <h3>Contact</h3>
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
                <?php endif; ?>
              </div>
              <div class="col-md-5">
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
                <p class="mt-5"><a href="<?php echo esc_url(home_url('careers')); ?>">Careers</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="lower-footer">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-color.png" class="img-fluid d-block" alt="Childress Agency Logo" />
          </div>
          <div class="col-md-9">
            <div class="row">
              <div class="col-sm-4">
                <p class="text-right">&copy; <?php echo date('Y'); ?> The Childress Agency, Inc.<br />All Rights Reserved</p>
              </div>
              <div class="col-sm-8">
                <div class="affiliations">
                  <div class="affiliate-code">
                    <!-- google partner code -->
                    <script src="https://apis.google.com/js/platform.js" async defer></script>
				            <div class="g-partnersbadge" data-agency-id="3546559613"></div>
                    <!-- Add the code snippet above to the sites listed to display your badge: http://www.childressagency.com -->
                    <!-- end google partner code -->
                  </div>

                  <div class="affiliate-code">
                    <!-- sharpspring partner code -->
                    <style>
                      .ss-partner-certification-badge img{
                        max-width: 100% !important;
                        height: auto !important;
                      }
                    </style>
                    <div class="ss-partner-certification-badge" data-badge-shape="ribbon" data-badge-width="300"></div>
                    <script type="text/javascript">
                      var ss_cid = 'MzawMDG3MDMzBgA';
                      var ss_domain = 'https://koi-3QNKNGNIX6.marketingautomation.services/';
                    </script>
                    <script type="text/javascript" src="https://koi-3QNKNGNIX6.marketingautomation.services/client/partner-cert.js" async></script>
                    <noscript>
                      <a href="https://sharpspring.com" target="_blank"></a>
                    </noscript>
                    <!-- end sharpspring partner code -->
                  </div>

                  <div class="affiliate-code">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sdvosb.jpg" class="img-fluid d-block mx-auto" alt="Service Disabled Veteran Owned Small Business" />
                  </div>

                  <div class="affiliate-code">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/swam.jpg" class="img-fluid d-block mx-auto" alt="SWaM Certified" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </footer>
    <?php get_template_part('partials/sprites.svg'); ?>
  <?php wp_footer(); ?>
</body>
</html>