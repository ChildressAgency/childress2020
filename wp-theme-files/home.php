<?php get_header(); ?>
  <main id="main">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8 col-lg-9">
          <section class="main-content">
            <h1 class="page-title">Blog</h1>
            <?php
              $most_recent_post_id = '';
              $most_recent_video_id = '';
              $video_category = get_category_by_slug('videos');
              $video_category_id = $video_category->term_id;
              $blog_page = get_page_by_path('news-events');
              $blog_page_id = $blog_page->ID;

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
                          $bg_image_url = get_field('post_default_featured_image', $blog_page_id);
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
              <?php if($recent_posts->found_posts > 6):?>
                <p class="text-center mt-5">
                  <a href="#" class="btn-main loadmore" data-video="no">Load More</a>
                </p>
              <?php endif; ?>
            </div>

            <?php
              $most_recent_video = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 1,
                'post_status' => 'publish',
                'cat' => $video_category_id
              ));

              if($most_recent_video->have_posts()): ?>
                <div id="videos">
                  <h1 class="page-title">Videos</h1>
                  <?php while($most_recent_video->have_posts()): $most_recent_video->the_post(); ?>
                    <?php $most_recent_video_id = get_the_ID(); ?>
                    <div class="most-recent-video">
                      <?php 
                        $vid_image_url = '';
                        $vid_image_css = '';
                        $vid_image_alt = '';

                        if(has_post_thumbnail()){
                          $video_post_id = get_the_ID();
                          $vid_image_url = get_the_post_thumbnail_url($video_post_id, 'large');
                          $vid_image_id = get_post_thumbnail_id($video_post_id);
                          $vid_image_alt = get_post_meta($vid_image_id, '_wp_attachment_image_alt', true);
                        }
                        else{
                          $default_vid_image = get_field('video_default_featured_image', $blog_page_id);
                          $vid_image_url = $default_vid_image['url'];
                          $vid_image_alt = $default_vid_image['alt'];
                        }
                      ?>
                      <a href="#"><img src="<?php echo esc_url($vid_image_url); ?>" class="img-fluid d-block mx-auto" alt="<?php echo esc_attr($vid_image_alt); ?>" /></a>
                    </div>
                  <?php endwhile; ?>

                  <div class="row text-center recent-videos">
                    <?php
                      $recent_vids = new WP_Query(array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'posts_per_page' => 6,
                        'post__not_in' => array($most_recent_video_id),
                        'cat' => $video_category_id,
                        'paged' => 1
                      ));

                      if($recent_vids->have_posts()){
                        while($recent_vids->have_posts()){
                          $recent_vids->the_post();

                          get_template_part('partials/loop', 'recent_videos');
                        }
                      }
                    ?>
                  </div>
                  <?php if($recent_vids->found_posts > 6): ?>
                    <p class="text-center mt-5">
                      <a href="#" class="btn-main loadmore" data-video="yes">Load More</a>
                    </p>
                  <?php endif; ?>
                </div>
            <?php endif; ?>
          </section>
        </div>

        <div class="col-md-4 col-lg-3">
          <?php get_sidebar('blog'); ?>
        </div>
      </div>

      <?php get_template_part('partials/section', 'seo_analysis'); ?>
    </div>
  </main>
<?php get_footer();