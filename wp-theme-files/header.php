<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta http-equiv="cache-control" content="public">
  <meta http-equiv="cache-control" content="private">

  <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">

  <title><?php echo esc_html(bloginfo('name')); ?></title>

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header id="header">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container-fluid">
        <div class="brand">
          <a href="<?php echo esc_url(home_url()); ?>" class="logo">
            <svg>
              <use xlink:href="#logo" />
            </svg>
          </a>
          <div class="brand-name-phone">
            <a href="<?php echo esc_url(home_url()); ?>" class="brand-name">Childress Agency</a>
            <a href="tel:5404125199" class="brand-phone">540-412-5199</a>
          </div>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header-nav" aria-controls="header-nav" aria-expanded="false" aria-label="Toggle Navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <?php
          $header_nav_args = array(
            'theme_location' => 'header-nav',
            'menu' => '',
            'container' => 'div',
            'container_id' => 'header-nav',
            'container_class' => 'collapse navbar-collapse',
            'menu_id' => '',
            'menu_class' => 'navbar-nav ml-auto',
            'echo' => true,
            'fallback_cb' => 'cai_header_fallback_menu',
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth' => 2,
            'walker' => new WP_Bootstrap_NavWalker()
          );
          wp_nav_menu($header_nav_args);
        ?>
      </div>
    </nav>

    <?php 
      if(is_page('services') || is_page_template('templates/services.php')){
        $services_sub_nav_args = array(
          'theme_location' => 'services-sub-nav', 
          'menu' => '',
          'container' => 'div',
          'container_id' => 'services-nav',
          'container_class' => '',
          'menu_id' => '',
          'menu_class' => 'nav header-services-nav',
          'echo' => true,
          'fallback_cb' => 'cai_services_sub_nav_fallback_menu',
          'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
          'depth' => 1,
        );
        wp_nav_menu($services_sub_nav_args);
      }
    ?>
  </header>

  <?php if(!is_page('services') && !is_page('contact') && !is_singular('case_studies')): ?>
    <?php
      if(is_home() || is_singular('post')){
        $blog_page = get_page_by_path('blog');
        $blog_page_id = $blog_page->ID;

        $hero_image = get_field('hero_background_image', $blog_page_id);
        $hero_image_css = get_field('hero_background_image_css', $blog_page_id);
        $hero_caption = get_field('hero_caption', $blog_page_id);
      }
      else{
        $hero_image = get_field('hero_background_image');
        $hero_image_css = get_field('hero_background_image_css');
        $hero_caption = get_field('hero_caption');
      }

      if(!$hero_image){
        $hero_image = get_field('default_hero_background_image', 'option');
        $hero_image_css = get_field('default_hero_background_image_css', 'option');
      }
    ?>
    <section id="<?php echo is_front_page() ? 'hp-hero' : 'hero'; ?>" class="hero" style="background-image:url(<?php echo esc_url($hero_image); ?>);<?php echo esc_attr($hero_image_css); ?>">
      <div class="container">
        <div class="hero-caption" data-aos-easing="ease-out" data-aos-duration="1000" <?php echo is_front_page() ? 'data-aos="fade-down"' : 'data-aos="fade-right"'; ?>>
            <?php echo apply_filters('the_content', $hero_caption); ?>
            <?php
              $hero_link_1 = get_field('hero_link_1');
              $hero_link_2 = get_field('hero_link_2');
            ?>

            <?php if($hero_link_1): ?>
              <a href="<?php esc_url($hero_link_1['url']); ?>" class="btn-main btn-alt"><?php echo esc_html($hero_link_1['title']); ?></a>
            <?php endif; if($hero_link_2): ?>
              <a href="<?php echo esc_url($hero_link_2['url']); ?>" class="btn-main"><?php echo esc_html($hero_link_2['title']); ?></a>
            <?php endif; ?>
        </div>
      </div>
      <a href="#contact-page" class="contact-phone"></a>
      <div class="blue-overlay"></div>
      <div class="angle-left"></div>
      <div class="angle-right"></div>
    </section>
  <?php else: ?>
    <?php if(is_singular('case_studies')): ?>
      <?php $client_logo = get_field('client_color_logo'); ?>

      <section id="hero" class="hero case-study-hero">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <img src="<?php echo esc_url($client_logo['url']); ?>" class="img-fluid d-block mx-auto" alt="Client Logo" />
            </div>
            <div class="col-md-6">
              <h1><?php echo esc_html(get_the_title()); ?></h1>
            </div>
          </div>
        </div>
        <a href="#contact-page" class="contact-phone"></a>
        <div class="blue-overlay"></div>
        <div class="angle-left"></div>
        <div class="angle-right"></div>
      </section>

      <?php
        $laptop_image_type = get_field('laptop_image_type');
        $laptop_image = get_field('laptop_image');
        if($laptop_image): ?>
          <section id="laptop-icons">
            <div class="container">
              <div class="laptop<?php if($laptop_image_type == 'image'){ echo ' laptop-image'; } ?>">
                <div class="embed-responsive embed-responsive-16by9">
                  <?php if($laptop_image_type == 'iframe'): ?>
                    <iframe src="<?php echo esc_url($laptop_image); ?>" class="embed-responsive-item"></iframe>
                  <?php else: ?>
                    <img src="<?php echo esc_url($laptop_image); ?>" class="embed-responsive-item" alt="Client Website image" />
                  <?php endif; ?>
                </div>
              </div>

              <?php 
                $service_icons = get_field('service_icons');
                if($service_icons): ?>
                  <div class="case-icons">
                    <?php foreach($service_icons as $icon): ?>
                      <div class="case-icon">
                        <?php
                          switch($icon){
                            case 'website': ?>
                              <svg class="case-study-icon">
                                <use xlink:href="#icon-monitor" />
                              </svg>
                              <span>WEBSITE</span>
                            <?php break;

                            case 'graphic-design': ?>
                              <svg class="case-study-icon">
                                <use xlink:href="#icon-pen" />
                              </svg>
                              <span>GRAPHIC DESIGN</span>
                            <?php break;

                            case 'social-media': ?>
                              <svg class="case-study-icon">
                                <use xlink:href="#icon-social-circle" />
                              </svg>
                              <span>SOCIAL MEDIA</span>
                            <?php break;
                          }
                        ?>
                      </div>
                    <?php endforeach; ?>
                  </div>
              <?php endif; ?>
            </div>
          </section>
      <?php endif; ?>
    <?php endif; ?>
  <?php endif; ?>