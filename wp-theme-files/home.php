<?php get_header(); ?>
  <main id="main">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8 col-lg-9">
          <section class="main-content">
            <h1 class="page-title">Blog</h1>
            <?php
              $most_recent_post_id = '';
              $video_category = get_category_by_slug('videos');
              $video_category_id = $video_category->term_id;

              $most_recent = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 1,
                'post_status' => 'publish',
                'category__not_in' => array($video_category_id)
              ));
              if($most_recent->have_posts()): while($most_recent->have_posts()): $most_recent->the_post(); ?>
                <?php $most_recent_post_id = get_the_ID(); ?>
                <article class="most-recent">
                  <div class="row">
                    <div class="col-lg-5 image-side">
                      <?php
                        $bg_image_url = '';
                        $bg_image_css = '';

                        if(has_post_thumbnail()){
                          $bg_image_url = get_the_post_thumbnail_url($most_recent_post_id, 'large');
                        }
                        else{
                          $blog_page = get_page_by_path('news-events');
                          $blog_page_id = $blog_page->ID;

                          $bg_image_url = get_field('default_featured_image', $blog_page_id);
                          $bg_image_css = 'background-size:contain;';
                        }
                      ?>
                      <div class="post-image" style="background-image:url(<?php echo esc_url($bg_image_url); ?>);<?php echo esc_attr($bg_image_css); ?>"></div>
                    </div>
                    <div class="col-lg-7 text-side">
                      <h2><?php the_title(); ?></h2>
                      <?php the_excerpt(); ?>
                      <a href="<?php the_permalink(); ?>" class="btn-main">Read More</a>
                    </div>
                  </div>
                </article>
            <?php endwhile; endif; ?>

            <div id="recent-posts">
              <?php //echo do_shortcode('[ajax_load_more container_type="div" transition_container_classes="row" posts_per_page="6" scroll="false" post_type="post" button_label="View More" post__not_in="' . $most_recent_post_id . '" category__not_in="' . $video_category .'"]'); ?>
              <div class="row recent-posts">
                <?php
                  $recent_posts = new WP_Query(array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => 6,
                    'post__not_in' => array($most_recent_post_id),
                    'category__not_in' => array($video_category_id),
                    'paged' => 1
                  ));

                  if($recent_posts->have_posts()){
                    while($recent_posts->have_posts()){
                      $recent_posts->the_post();

                      get_template_part('partials/loop', 'recent_posts');
                    }
                  }
                ?>
              </div>
              <p class="text-center mt-5">
                <a href="#" class="loadmore" data-video="no">Load More</a>
              </p>
            </div>

            <?php

            <div class="videos">
              <h1 class="page-title">Videos</h1>
              <div class="most-recent-video">
                <a href="#"><img src="../wp-theme-files/images/clapping-audience.jpg" class="img-fluid d-block mx-auto" alt="" /></a>
              </div>

              <div class="row text-center">
                <div class="col-md-6 col-lg-4">
                  <a href="#" class="video">
                    <img src="../wp-theme-files/images/clapping-audience.jpg" class="img-fluid d-block mx-auto" alt="" />
                    <span class="video-title"><h3>Title</h3></span>
                  </a>
                </div>
                <div class="col-md-6 col-lg-4">
                  <a href="#" class="video">
                    <img src="../wp-theme-files/images/clapping-audience.jpg" class="img-fluid d-block mx-auto" alt="" />
                    <span class="video-title"><h3>Video Title</h3></span>
                  </a>
                </div>
                <div class="col-md-6 col-lg-4">
                  <a href="#" class="video">
                    <img src="../wp-theme-files/images/clapping-audience.jpg" class="img-fluid d-block mx-auto" alt="" />
                    <span class="video-title"><h3>Video Title</h3></span>
                  </a>
                </div>
                <div class="col-md-6 col-lg-4">
                  <a href="#" class="video">
                    <img src="../wp-theme-files/images/clapping-audience.jpg" class="img-fluid d-block mx-auto" alt="" />
                    <span class="video-title"><h3>Video Title</h3></span>
                  </a>
                </div>
                <div class="col-md-6 col-lg-4">
                  <a href="#" class="video">
                    <img src="../wp-theme-files/images/clapping-audience.jpg" class="img-fluid d-block mx-auto" alt="" />
                    <span class="video-title"><h3>Video Title</h3></span>
                  </a>
                </div>
                <div class="col-md-6 col-lg-4">
                  <a href="#" class="video">
                    <img src="../wp-theme-files/images/clapping-audience.jpg" class="img-fluid d-block mx-auto" alt="" />
                    <span class="video-title"><h3>Video Title</h3></span>
                  </a>
                </div>
              </div>
            </div>
          </section>
        </div>
        <div class="col-md-4 col-lg-3">
          <section class="sidebar">
            <div class="sidebar-widget">
              <form action="" method="get">
                <div class="input-group sidebar-search">
                  <input type="text" id="search" class="form-control" name="s" placeholder="Search" />
                  <div class="input-group-append">
                    <button type="submit" class="btn-search" aria-label="Search"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </form>
            </div>

            <div class="sidebar-widget">
              <h3>latest</h3>
            </div>

            <div class="sidebar-widget">
              <h3>events</h3>
            </div>

            <div class="sidebar-widget">
              <h3>categories</h3>
              <ul class="list-unstyled">
                <li><a href="#">brand identity</a></li>
                <li><a href="#">graphic design</a></li>
                <li><a href="#">web design</a></li>
                <li><a href="#">seo</a></li>
                <li><a href="#">digital marketing</a></li>
                <li><a href="#">social media</a></li>
              </ul>
            </div>

            <div class="sidebar-widget">
              <h3>archived articles</h3>
            </div>
          </section>
        </div>
      </div>

      <section id="seo-analysis">
        <div class="row">
          <div class="col-md-7 col-lg-8">
            <h2>SEO ANALYSIS</h2>
            <p>Receive an in-depth analysis of your website and get a grade on how well your site is ranked for its searchable qualities. Based on your grade you can see the pain points of your website and what you can do to help correct the problem.</p>
            <p><a href="#">Visit our page now to learn more and get started.</a></p>
            <a href="#" class="btn-main">Learn More</a>
          </div>
          <div class="col-md-5 col-lg-4">
            <img src="../wp-theme-files/images/seo-monitor.png" class="img-fluid d-block mx-auto mt-5 mt-md-0" alt="" />
          </div>
        </div>
      </section>
    </div>
  </main>
<?php get_footer();