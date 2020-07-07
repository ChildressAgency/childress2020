<!doctype html>
<html lang="en">

<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-30535612-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-30535612-1');
  </script>

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
  <script type="text/javascript">
      var _ss = _ss || [];
      _ss.push(['_setDomain', 'https://koi-3QNKNGNIX6.marketingautomation.services/net']);
      _ss.push(['_setAccount', 'KOI-461EIL3BMQ']);
      _ss.push(['_trackPageView']);
    (function() {
      var ss = document.createElement('script');
      ss.type = 'text/javascript'; ss.async = true;
      ss.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'koi-3QNKNGNIX6.marketingautomation.services/client/ss.js?ver=2.2.1';
      var scr = document.getElementsByTagName('script')[0];
      scr.parentNode.insertBefore(ss, scr);
    })();
  </script>
</head>

<body <?php body_class(); ?>>
  	<!-- Hotjar Tracking Code for http://childressagency.com/ --> <script> (function(h,o,t,j,a,r){ h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)}; h._hjSettings={hjid:1199441,hjsv:6}; a=o.getElementsByTagName('head')[0]; r=o.createElement('script');r.async=1; r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv; a.appendChild(r); })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv='); </script>

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

  <?php if(!is_page('services') && !is_page('contact')): ?>
    <?php
      if(is_home() || is_singular('post')){
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
        <div class="hero-caption" data-aos-easing="ease-out" data-aos-duration="1000" <?php echo is_front_page() ? 'data-aos="fade-down"' : 'data-aos="fade-right"'; ?>>
          <?php if(is_front_page()): ?>
            <h1>Let's grow<br />your business</h1>
            <h3>through powerful websites & <br />
            digital marketing strategies.</h3>
            <a href="<?php echo esc_url(home_url('contact')); ?>" class="btn-main btn-lrg">We're ready when you are.</a>
          <?php else: ?>
            <h2><?php echo wp_kses_post($hero_caption); ?></h2>
          <?php endif; ?>
        </div>
      </div>
      <a href="#contact-page" class="contact-phone"></a>
      <div class="blue-overlay"></div>
      <div class="angle-left"></div>
      <div class="angle-right"></div>
    </section>
  <?php endif; ?>