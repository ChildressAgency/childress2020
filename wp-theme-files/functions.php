<?php
/*
add_action('wp_footer', 'show_template');
function show_template() {
	global $template;
	print_r($template);
}*/

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

  wp_localize_script('cai-scripts',
    'cai_ajax_loadmore',
    array(
      'ajaxurl' => admin_url('admin-ajax.php'),
      'security' => wp_create_nonce('cai_ajax_load_more_posts'),
      'page' => 2
    )
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
  //wp_register_style(
  //  'fontawesome',
  //  'https://use.fontawesome.com/releases/v5.12.0/css/all.css'
  //);

  wp_register_style(
    'cai-css',
    get_stylesheet_directory_uri() . '/style.css'
  );

  //wp_enqueue_style('fontawesome');
  wp_enqueue_style('cai-css');
}

//add_filter('style_loader_tag', 'cai_add_css_meta', 10, 2);
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
require_once dirname(__FILE__) . '/includes/cai-fallback-menus.php';
require_once dirname(__FILE__) . '/includes/cai-post-types.php';

add_action('init', 'cai_create_post_types');

add_action('widgets_init', 'cai_register_sidebars');
function cai_register_sidebars(){
  register_sidebar(array(
    'name' => 'Blog Sidebar',
    'id' => 'sidebar-blog',
    'description' => 'Add widgets here to appear in your sidebar on blog posts and archive pages.',
    'before_widget' => '<div class="sidebar-section">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>'
  ));

  register_sidebar(array(
    'name' => 'Case Studies Sidebar',
    'id' => 'sidebar-casestudies',
    'description' => 'Add widgets here to appear in your sidebar on Case Study archive pages.',
    'before_widget' => '<div class="sidebar-section">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>'
  ));
}

add_action('acf/init', 'cai_acf_options_page');
function cai_acf_options_page(){
  acf_add_options_page(array(
    'page_title' => esc_html__('General Settings', 'cai'),
    'menu_title' => esc_html__('General Settings', 'cai'),
    'menu_slug' => 'general-settings',
    'capability' => 'edit_posts',
    'redirect' => false
  ));
}

add_filter('block_categories', 'cai_custom_block_category', 10, 2);
function cai_custom_block_category($categories, $post){
  return array_merge(
    $categories,
    array(
      array(
        'slug' => 'custom-blocks',
        'title' => esc_html__('Custom Blocks', 'cai'),
        'icon' => 'wordpress'
      )
    )
  );
}

add_action('acf/init', 'cai_register_blocks');
function cai_register_blocks(){
  if(function_exists('acf_register_block_type')){
    acf_register_block_type(array(
      'name' => 'prestyled_button',
      'title' => esc_html__('Pre-Styled button', 'cai'),
      'description' => esc_html__('Add a pre-styled button', 'cai'),
      'category' => 'custom-blocks',
      'mode' => 'auto',
      'align' => 'full',
      'render_template' => get_stylesheet_directory() . '/partials/blocks/prestyled_button.php',
      'enqueue_style' => get_stylesheet_directory_uri() . '/partials/blocks/prestyled_button.css'
    ));

    acf_register_block_type(array(
      'name' => 'image_svg',
      'title' => esc_html__('Image SVG', 'cai'),
      'description' => esc_html__('Add a regular image or SVG', 'cai'),
      'category' => 'custom-blocks',
      'mode' => 'auto',
      'align' => 'full',
      'render_template' => get_stylesheet_directory() . '/partials/blocks/image_svg.php'
    ));

    acf_register_block_type(array(
      'name' => 'disc_icons_section',
      'title' => esc_html__('Disc Icons Section', 'cai'),
      'description' => esc_html__('Add a section with disc icons on the left and text on the right.', 'cai'),
      'category' => 'custom-blocks',
      'mode' => 'auto',
      'align' => 'full',
      'render_template' => get_stylesheet_directory() . '/partials/blocks/disc_icons_section.php',
      'enqueue_style' => get_stylesheet_directory_uri() . '/partials/blocks/disc_icons_section.css'
    ));

    acf_register_block_type(array(
      'name' => 'flip_discs_section',
      'title' => esc_html__('Flip Discs Section' , 'cai'),
      'description' => esc_html__('Add a section with flipping discs.', 'cai'),
      'category' => 'custom-blocks',
      'mode' => 'auto',
      'align' => 'full',
      'render_template' => get_stylesheet_directory() . '/partials/blocks/flip_discs_section.php',
      'enqueue_style' => get_stylesheet_directory_uri() . '/partials/blocks/flip_discs_section.css'
    ));

    acf_register_block_type(array(
      'name' => 'info_cards_section',
      'title' => esc_html__('Info Cards Section', 'cai'),
      'description' => esc_html__('Add a section of info cards.', 'cai'),
      'category' => 'custom-blocks',
      'mode' => 'auto',
      'align' => 'full',
      'render_template' => get_stylesheet_directory() . '/partials/blocks/info_cards_section.php',
      'enqueue_style' => get_stylesheet_directory_uri() . '/partials/blocks/info_cards_section.css'
    ));

    acf_register_block_type(array(
      'name' => 'percentage_cards_section',
      'title' => esc_html__('Percentage Cards Section', 'cai'),
      'description' => esc_html__('Add a section of percentage cards.', 'cai'),
      'category' => 'custom-blocks',
      'mode' => 'auto',
      'align' => 'full',
      'render_template' => get_stylesheet_directory() . '/partials/blocks/percentage_cards_section.php',
      'enqueue_style' => get_stylesheet_directory_uri() . '/partials/blocks/info_cards_section.css'
    ));
  }
}

function cai_testimonial_excerpt($testimonial){
  $testimonial = strip_shortcodes($testimonial);
  $testimonial = apply_filters('the_content', $testimonial);
  $testimonial = str_replace(']]>', ']]>', $testimonial);
  $excerpt_length = apply_filters('excerpt_length', 25);
  $excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
  
  return wp_trim_words($testimonial, $excerpt_length, $excerpt_more);
}

add_filter('posts_where', 'cai_posts_where');
function cai_posts_where($where){
  $where = str_replace("meta_key = 'testimonials_$", "meta_key LIKE 'testimonials_%", $where);

  return $where;
}

add_action('wp_ajax_cai_ajax_load_more_posts', 'cai_ajax_load_more_posts');
add_action('wp_ajax_nopriv_cai_ajax_load_more_posts', 'cai_ajax_load_more_posts');
function cai_ajax_load_more_posts(){
  //https://artisansweb.net/load-wordpress-post-ajax/
  //https://rudrastyh.com/wordpress/load-more-posts-ajax.html
  check_ajax_referer('cai_ajax_load_more_posts', 'security');

  $paged = $_POST['page'];
  $video = $_POST['video'];
  $video_category = get_category_by_slug('videos');
  $video_category_id = $video_category->term_id;
  $more_posts_args = '';
  $template_part = '';

  if($video == 'no'){
    $more_posts_args = array(
      'post_type' => 'post',
      'post_status' => 'publish',
      'posts_per_page' => 6,
      'category__not_in' => array($video_category_id),
      'paged' => $paged
    );

    $template_part = 'recent_posts';
  }
  else{
    $more_posts_args = array(
      'post_type' => 'post',
      'post_status' => 'publish',
      'posts_per_page' => 6,
      'cat' => $video_category_id,
      'paged' => $paged
    );

    $template_part = 'recent_videos';
  }

  $more_posts = new WP_Query($more_posts_args);
  if($more_posts->have_posts()){
    while($more_posts->have_posts()){
      $more_posts->the_post();

      get_template_part('partials/loop', $template_part);
    }
  }

  wp_die();
}

add_action('wp_ajax_cai_ajax_load_more_case_studies', 'cai_ajax_load_more_case_studies');
add_action('wp_ajax_nopriv_cai_ajax_load_more_case_studies', 'cai_ajax_load_more_case_studies');
function cai_load_more_case_studies(){
  check_ajax_referrer('cai_ajax_load_more_posts', 'security');

  $paged = $_POST['page'];
  $more_case_studies = new WP_Query(array(
    'post_type' => 'case_studies',
    'post_status' => 'publish',
    'posts_per_page' => 12,
    'paged' => $paged
  ));
  if($more_case_studies->have_posts()){
    while($more_case_studies->have_posts()){
      $more_case_studies->the_post();

      $case_study_link = get_permalink();
      $case_study_image = get_field('case_study_link_image');
      $case_study_logo = get_field('case_study_white_logo');

      echo '<a href="' . esc_url($case_study_link) . '" style="background-image: url(' . esc_url($case_study_image['url']) . ');">';
        echo '<img src="' . esc_url($case_study_logo['url']) . '" class="img-fluid d-block mx-auto" alt="' . esc_attr($case_study_logo['alt']) . '" />';
      echo '</a>';
    }
  }

  wp_die();
}

add_action('frm_after_create_entry', 'cai_submit_sharpspring', 30, 2);
function cai_submit_sharspring($entry, $form_id){
  if($form_id == 0001){
    $baseURI = 'https://app-3QNKNGNIX6.marketingautomation.services/webforms/receivePostback/MzawMDG3MDMzBgA/';
    $endpoint = 'd041986f-fd8f-42cb-8c07-92a3c3d8fd61';
    $post_url = $baseURI . $endpoint;

    $body = array(
      'Name' => $_POST['item_meta'][1],
      'Email' => $_POST['item_meta'][3],
      'Phone' => $_POST['item_meta'][4],
      'How can we help you?' => $_POST['item_meta'][5],
      'trackingid__sb' => $_COOKIE['__ss_tk']
    );

    $request = new WP_Http();
    $response = $request->post( $post_url, array( 'body' => $body ) );
  }
}