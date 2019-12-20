<?php get_header(); ?>
  <main id="main">
    <section class="main-content">
      <div class="container">
        <?php get_template_part('partials/loop'); ?>
      </div>
    </section>

    <section id="clients">
      <div class="container">
        <ul class="client-list">
          <li>
            <a href="#">
              <img src="../wp-theme-files/images/client-logo-placeholder.jpg" class="img-fluid d-block mx-auto" alt="" />
            </a>
          </li>
          <li>
            <a href="#">
              <img src="../wp-theme-files/images/client-logo-placeholder.jpg" class="img-fluid d-block mx-auto" alt="" />
            </a>
          </li>
          <li>
            <a href="#">
              <img src="../wp-theme-files/images/client-logo-placeholder.jpg" class="img-fluid d-block mx-auto" alt="" />
            </a>
          </li>
        </ul>
        <a href="#" class="btn-main">Discover our clients</a>
      </div>
    </section>

  <?php if(have_rows('testimonials')): ?>
    <section id="testimonials">
      <div class="container-fluid">
      <div class="swiper-container">
        <div class="swiper-wrapper">

          <div class="testimonial swiper-slide">
            <div class="testimonial-bubble">
              <blockquote>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed adola.</p>
                <cite>&mdash; Gabby Elle</cite>
              </blockquote>
            </div>
          </div>

          <div class="testimonial swiper-slide">
            <div class="testimonial-bubble">
              <blockquote>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed adola.</p>
                <cite>&mdash; Gabby Elle</cite>
              </blockquote>
            </div>
          </div>

          <div class="testimonial swiper-slide">
            <div class="testimonial-bubble">
              <blockquote>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed adola.</p>
                <cite>&mdash; Gabby Elle</cite>
              </blockquote>
            </div>
          </div>

          <div class="testimonial swiper-slide">
            <div class="testimonial-bubble">
              <blockquote>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed adola.</p>
                <cite>&mdash; Gabby Elle</cite>
              </blockquote>
            </div>
          </div>

          <div class="testimonial swiper-slide">
            <div class="testimonial-bubble">
              <blockquote>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed adola.</p>
                <cite>&mdash; Gabby Elle</cite>
              </blockquote>
            </div>
          </div>

        </div>

        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        
      </div>
      <a href="#" class="btn-main">More testimonials</a>
      </div>
    </section>

    <section id="stats">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="stat-counter">
              <div class="counter-wrapper">
                <!--<ul class="flip-counter default" id="experience-counter"></ul>-->
                <span class="count years-count">20</span>
                <span class="counter-plus">+</span>
              </div>
              <p>Years of Digital Marketing Experience</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="stat-counter">
              <div class="counter-wrapper">
                <!--<ul class="flip-counter default" id="clients-counter"></ul>-->
                <span class="count clients-count">500</span>
              </div>
              <p>Clients & Growing</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="stat-counter">
              <div class="counter-wrapper">
                <!--<ul class="flip-counter default" id="industries-counter"></ul>-->
                <span class="count industries-count">30</span>
                <span class="counter-plus">+</span>
              </div>
              <p>Industries we have worked with</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="news-chats">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 d-flex">
            <div class="promo-block" style="background-image:url(../wp-theme-files/images/news-bg.jpg); background-position:center center;">
              <div class="promo-block-caption">
                <img src="../wp-theme-files/images/news-events-graphic.png" class="img-fluid d-block mx-auto" alt="" />
                <a href="#" class="btn-main">Click Here</a>
              </div>
              <div class="blue-overlay"></div>
            </div>
          </div>
          <div class="col-lg-6 d-flex">
            <div class="promo-block" style="background-image:url(../wp-theme-files/images/man-talking-to-group.jpg); background-position:center center;">
              <div class="promo-block-caption">
                <img src="../wp-theme-files/images/chats-logo.png" class="img-fluid d-block mx-auto" alt="" />
                <a href="#" class="childress-chats-register"><span>Register</span>for our next chat</a>
              </div>
              <div class="blue-overlay"></div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
<?php get_footer(); 