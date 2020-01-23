<?php if(have_rows('clients')): ?>
  <section id="clients">
    <div class="container">
      <ul class="client-list">
        <?php while(have_rows('clients')): the_row(); ?>
          <li>
            <a href="<?php the_sub_field('client_link'); ?>" class="client-logo" target="_blank">
              <?php $client_image = get_sub_field('client_logo'); ?>
              <img src="<?php echo esc_url($client_image['url']); ?>" class="img-fluid d-block mx-auto" alt="<?php echo esc_attr($client_image['alt']); ?>" />
            </a>
          </li>
        <?php endwhile; ?>
      </ul>
      <?php if(is_front_page()): ?>
        <a href="<?php echo esc_url(home_url('clients')); ?>" class="btn-main">Discover our clients</a>
      <?php endif; ?>
    </div>
  </section>
<?php endif; ?>
