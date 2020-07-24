<?php
/**
 * fallback menus
 */
if(!defined('ABSPATH')){ exit; }

function cai_header_fallback_menu(){ ?>
  <div id="header-nav" class="collapse navbar-collapse">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item<?php if(is_front_page()){ echo ' active'; } ?>">
        <a href="<?php echo esc_url(home_url()); ?>" class="nav-link" title="<?php echo esc_attr__('Home', 'cai'); ?>"><?php echo esc_html__('Home', 'cai'); ?></a>
      </li>
      <li class="nav-item<?php if(is_page('about-us')); ?>">
        <a href="<?php echo esc_url(home_url('about-us')); ?>" class="nav-link" title="<?php echo esc_attr__('About Us', 'cai'); ?>"><?php echo esc_html__('About Us', 'cai'); ?></a>
      </li>
      <li class="nav-item<?php if(is_page('services') || is_page_template('templates/services.php')){ echo ' active'; } ?>">
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
      <a href="<?php echo esc_url(home_url('digital-marketing')); ?>" title="<?php echo esc_attr_('Digital Marketing', 'cai'); ?>"><?php echo esc_html__('Digital Marketing', 'cai'); ?></a>
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