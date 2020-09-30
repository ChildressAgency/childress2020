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
      'taxonomy' => 'state',
      'hide_empty' => true
    ));

    if($states){
	    echo '<section id="ca-locations"><div class="container">';
      echo  '<h3>' . esc_html(get_field('locations_list_section_title')) . '</h3>';
      echo '<ul class="ca-locations">';
		
      foreach($states as $state){
        $locations = new WP_Query(array(
          'post_type' => 'location',
          'post_status' => 'publish',
		      'posts_per_page' => -1,
		      'orderby' => 'name',
		      'order' => 'ASC',
          'tax_query' => array(
            array(
              'taxonomy' => 'state',
              'field' => 'slug',
              'terms' => $state->slug
            )
          )
        ));

        $city_states = array();
        
        if($locations->have_posts()){
		      $i = 0;
          while($locations->have_posts()){
            $locations->the_post();

            $city_states[$i]['city'] = get_the_title();
            $city_states[$i]['state'] = $state->name;
            $city_states[$i]['location_link'] = get_the_permalink();
			      $i++;
          }
        } wp_reset_postdata();
		  
		    //var_dump($city_states);
      	if(!empty($city_states)){
		      for($s = 0; $s < count($city_states); $s++){
            echo '<li><a href="' . $city_states[$s]['location_link'] . '" class="ca-location">' . $city_states[$s]['city'] . ', ' . $city_states[$s]['state'] . '</a></li>';
          }
      	}
      }

	    echo '</ul>';
      echo '</div></section>';
    }
  ?>
</main>
<?php get_footer();