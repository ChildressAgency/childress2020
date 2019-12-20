<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta http-equiv="cache-control" content="public">
  <meta http-equiv="cache-control" content="private">

  <title><?php echo esc_html(bloginfo('name')); ?></title>

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php get_template_part('partials/sprites.svg'); ?>
  <header id="header">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="brand">
        <a href="<?php echo esc_url(home_url()); ?>" class="logo">
          <svg>
            <use xlink:href="#logo" />
          </svg>
        </a>
        <a href="<?php echo esc_url(home_url()); ?>" class="brand-name">Childress Agency</a>
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
          'menu_class' => 'nav services-nav',
          'echo' => true,
          'fallback_cb' => 'cai_services_sub_nav_fallback_menu',
          'items_wrap' => '<nav id="%1$s" class="%2$s">%3$s</nav>',
          'depth' => 1,
        );
        wp_nav_menu($services_sub_nav_args);
      }
    ?>
  </header>

  <?php if(!is_page('services')): ?>
    <?php
      if(is_home()){
        $blog_page = get_page_by_path('news-events');
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
        <div class="hero-caption">
          <?php if(is_front_page()): ?>
            <h1><span class="brand">Childress Agency</span>Digital Marketing Made Easy</h1>
            <a href="<?php echo esc_url(home_url('contact')); ?>" class="btn-main btn-lrg">We're ready when you are.</a>
          <?php else: ?>
            <h2><?php echo echo_html($hero_caption); ?></h2>
          <?php endif; ?>
        </div>
      </div>
      <a href="#contact-page" class="contact-phone"></a>
      <div class="blue-overlay"></div>
      <div class="angle-left"></div>
      <div class="angle-right"></div>
    </section>
  <?php endif; ?>