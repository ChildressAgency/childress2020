<?php get_header(); ?>
<main id="main">
  <section id="main-content">
    <div class="container">
      <?php
        if(have_posts()){
          while(have_posts()){
            the_post();
            the_content();
          }
        }
      ?>
    </div>
  </section>

  <?php
    $states = get_terms(array(
      'taxonomy' => 'states',
      'hide_empty' => true
    ));

    if($states){
      $city_states = array();

      foreach($states as $state){
        $locations = new WP_Query(array(
          'post_type' => 'location',
          'post_status' => 'publish',
          'tax_query' => array(
            array(
              'taxonomy' => 'states',
              'field' => 'slug',
              'terms' => $state->slug
            )
          )
        ));

        if($locations->have_posts()){
          while($locations->have_posts()){
            $locations->the_post();

            $city_states['city'] = get_the_title();
            $city_states['state'] = $state->name;
            $city_states['location_link'] = get_the_permalink();
          }
        } wp_reset_postdata();
      }

      if(!empty($city_states)){
        echo '<section id="ca-locations"><div class="container">';
          echo  '<h3>' . esc_html(get_field('locations_list_section_title')) . '</h3>';
          echo '<ul class="ca-locations">';
            foreach($city_states as $location){
              echo '<li><a href="' . $location['location_link'] . '" class="ca-location">' . $location['city'] . ', ' . $location['state'] . '</a></li>';
            }
          echo '</ul>';
        echo '</div></section>';
      }
    }
  ?>
</main>
<?php get_footer();