<?php
add_action('wp_footer', 'show_template');
function show_template() {
	global $template;
	print_r($template);
}

add_action('wp_enqueue_scripts', 'jquery_cdn');
function jquery_cdn(){
  if(!is_admin()){
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.3.1.min.js', false, null, true);
    wp_enqueue_script('jquery');
  }
}

add_action('wp_enqueue_scripts', 'cai_scripts');
function cai_scripts(){
  wp_register_script(
    'bootstrap-popper',
    'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js',
    array('jquery'),
    '',
    true
  );

  wp_register_script(
    'bootstrap-scripts',
    'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js',
    array('jquery', 'bootstrap-popper'),
    '',
    true
  );

  wp_register_script(
    'cai-scripts',
    get_stylesheet_directory_uri() . '/js/custom-scripts.min.js',
    array('jquery', 'bootstrap-scripts'),
    '',
    true
  );

  wp_enqueue_script('bootstrap-popper');
  wp_enqueue_script('bootstrap-scripts');
  wp_enqueue_script('cai-scripts');
}

add_filter('script_loader_tag', 'cai_add_script_meta', 10, 2);
function cai_add_script_meta($tag, $handle){
  switch($handle){
    case 'jquery':
      $tag = str_replace('></script>', ' integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>', $tag);
      break;

    case 'bootstrap-popper':
      $tag = str_replace('></script>', ' integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>', $tag);
      break;

    case 'bootstrap-scripts':
      $tag = str_replace('></script>', ' integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>', $tag);
      break;
  }

  return $tag;
}

add_action('wp_enqueue_scripts', 'cai_styles');
function cai_styles(){
  wp_register_style(
    'fontawesome',
    'https://use.fontawesome.com/releases/v5.6.3/css/all.css'
  );

  wp_register_style(
    'cai-css',
    get_stylesheet_directory_uri() . '/style.css'
  );

  wp_enqueue_style('fontawesome');
  wp_enqueue_style('cai-css');
}

add_filter('style_loader_tag', 'cai_add_css_meta', 10, 2);
function cai_add_css_meta($link, $handle){
  switch($handle){
    case 'fontawesome':
      $link = str_replace('/>', ' integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">', $link);
      break;
  }

  return $link;
}

add_action('after_setup_theme', 'cai_setup');
function cai_setup(){
  add_theme_support('post-thumbnails');
  //set_post_thumbnail_size(320, 320);

  add_theme_support(
    'html5',
    array(
      'comment-form',
      'comment-list',
      'gallery',
      'caption'
    )
  );

  add_theme_support('editor-styles');
  add_editor_style('style-editor.css');

  add_theme_support('wp-block-styles');
  add_theme_support('responsive-embeds');

  register_nav_menus(array(
    'header-nav' => 'Header Navigation',
    'services-sub-nav' => 'Services Sub Navigation',
    'services-nav' => 'Services Footer Navigation'
  ));

  load_theme_textdomain('cai', get_stylesheet_directory_uri() . '/languages');
}

require_once dirname(__FILE__) . '/includes/class-wp-bootstrap-navwalker.php';

function cai_header_fallback_menu(){ ?>
  <div id="header-nav" class="collapse navbar-collapse">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item<?php if(is_front_page()){ echo ' active'; } ?>">
        <a href="<?php echo esc_url(home_url()); ?>" class="nav-link" title="<?php echo esc_attr__('Home', 'cai'); ?>"><?php echo esc_html__('Home', 'cai'); ?></a>
      </li>
      <li class="nav-item<?php if(is_page('about-us')); ?>">
        <a href="<?php echo esc_url(home_url('about-us')); ?>" class="nav-link" title="<?php echo esc_attr__('About Us', 'cai'); ?>"><?php echo esc_html__('About Us', 'cai'); ?></a>
      </li>
      <li class="nav-item<?php if(is_page('services') || is_singular('service')){ echo ' active'; } ?>">
        <a href="<?php echo esc_url(home_url('services')); ?>" class="nav-link" title="<?php echo esc_attr__('Services', 'cai'); ?>"><?php echo esc_html__('Services', 'cai'); ?></a>
      </li>
      <li class="nav-item<?php if(is_page('case-studies') || is_singular('case-study')){ echo ' active'; } ?>">
        <a href="<?php echo esc_url(home_url('case-studies')); ?>" class="nav-link" title="<?php echo esc_attr__('Case Studies', 'cai'); ?>"><?php echo esc_html__('Case Studies', 'cai'); ?></a>
      </li>
      <li class="nav-item<?php if(is_home() || is_singular('post')){ echo ' active'; } ?>">
        <a href="<?php echo esc_url(home_url('news-events')); ?>" class="nav-link" title="<?php echo esc_attr__('News/Events', 'cai'); ?>"><?php echo esc_html__('News/Events', 'cai'); ?></a>
      </li>
      <li class="nav-item<?php if(is_page('contact')){ echo ' active'; } ?>">
        <a href="<?php echo esc_url(home_url('contact')); ?>" class="nav-link" title="<?php echo esc_attr__('Contact', 'cai'); ?>"><?php echo esc_html__('Contact', 'cai'); ?></a>
      </li>
    </ul>
  </div>
<?php }

function cai_services_sub_nav_fallback_menu(){ ?>
  <div id="services-nav">
    <nav class="nav services-nav">
      <a href="<?php echo esc_url(home_url('brand-identity')); ?>" title="<?php echo esc_attr__('Brand Identity', 'cai'); ?>"><?php echo esc_html__('Brand Identity', 'cai'); ?></a>
      <a href="<?php echo esc_url(home_url('graphic-design')); ?>" title="<?php echo esc_attr__('Graphic Design', 'cai'); ?>"><?php echo esc_html__('Graphic Design', 'cai'); ?></a>
      <a href="<?php echo esc_url(home_url('web-design')); ?>" title="<?php echo esc_attr__('Web Design', 'cai'); ?>"><?php echo esc_html__('Web Design', 'cai'); ?></a>
      <a href="<?php echo esc_url(home_url('seo')); ?>" title="<?php echo esc_attr__('SEO', 'cai'); ?>"><?php echo esc_html__('SEO', 'cai'); ?></a>
      <a href="<?php echo esc_url(home_url('digital-marketing')); ?>" title="<?php echo esc_attr_('Digital Marketing', 'cai'); ?>"><?php echo esc_html__'Digital Marketing', 'cai'); ?></a>
      <a href="<?php echo esc_url(home_url('social-media')); ?>" title="<?php echo esc_attr__('Social Media', 'cai'); ?>"><?php echo esc_html__('Social Media', 'cai'); ?></a>
    </nav>
  </div>
<?php }

function cai_services_footer_nav_fallback_menu(){ ?>
  <ul class="services-nav list-unstyled">
    <li><a href="<?php echo esc_url(home_url('brand-identity')); ?>"><?php echo esc_html__('brand identity', 'cai'); ?></a></li>
    <li><a href="<?php echo esc_url(home_url('graphic-design')); ?>"><?php echo esc_html__('graphic design', 'cai'); ?></a></li>
    <li><a href="<?php echo esc_url(home_url('web-design')); ?>"><?php echo esc_html__('web design', 'cai'); ?></a></li>
    <li><a href="<?php echo esc_url(home_url('seo')); ?>"><?php echo esc_html__('seo', 'cai'); ?></a></li>
    <li><a href="<?php echo esc_url(home_url('digital-marketing')); ?>"><?php echo esc_html__('digital marketing', 'cai'); ?></a></li>
    <li><a href="<?php echo esc_url(home_url('social-media')); ?>"><?php echo esc_html__('social media', 'cai'); ?></a></li>
  </ul>
<?php }