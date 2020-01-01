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


    <section id="our-team">
      <div class="container-fluid">
        <h2>OUR TEAM</h2>
        <div class="swiper-container">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="team">
                <div class="team-inner">
                  <div class="team-image">
                    <img src="../wp-theme-files/images/team-placeholder.jpg" class="img-fluid d-block" alt="" />
                  </div>
                  <div class="team-bio">
                    <h4>Team Name</h4>
                    <p>Short bio of team member or maybe just their job title depending on how much space is available</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="team">
                <div class="team-inner">
                  <div class="team-image">
                    <img src="../wp-theme-files/images/team-placeholder.jpg" class="img-fluid d-block" alt="" />
                  </div>
                  <div class="team-bio">
                    <h4>Team Name</h4>
                    <p>Short bio of team member or maybe just their job title depending on how much space is available</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="team">
                <div class="team-inner">
                  <div class="team-image">
                    <img src="../wp-theme-files/images/team-placeholder.jpg" class="img-fluid d-block" alt="" />
                  </div>
                  <div class="team-bio">
                    <h4>Team Name</h4>
                    <p>Short bio of team member or maybe just their job title depending on how much space is available</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="team">
                <div class="team-inner">
                  <div class="team-image">
                    <img src="../wp-theme-files/images/team-placeholder.jpg" class="img-fluid d-block" alt="" />
                  </div>
                  <div class="team-bio">
                    <h4>Team Name</h4>
                    <p>Short bio of team member or maybe just their job title depending on how much space is available</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="team">
                <div class="team-inner">
                  <div class="team-image">
                    <img src="../wp-theme-files/images/team-placeholder.jpg" class="img-fluid d-block" alt="" />
                  </div>
                  <div class="team-bio">
                    <h4>Team Name</h4>
                    <p>Short bio of team member or maybe just their job title depending on how much space is available</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="team">
                <div class="team-inner">
                  <div class="team-image">
                    <img src="../wp-theme-files/images/team-placeholder.jpg" class="img-fluid d-block" alt="" />
                  </div>
                  <div class="team-bio">
                    <h4>Team Name</h4>
                    <p>Short bio of team member or maybe just their job title depending on how much space is available</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="team">
                <div class="team-inner">
                  <div class="team-image">
                    <img src="../wp-theme-files/images/team-placeholder.jpg" class="img-fluid d-block" alt="" />
                  </div>
                  <div class="team-bio">
                    <h4>Team Name</h4>
                    <p>Short bio of team member or maybe just their job title depending on how much space is available</p>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
        </div>
      </div>
    </section>

    <section id="affiliates">
      <div class="container-fluid">
        <article class="half-width mb-5">
          <h2>LET'S GET STARTED</h2>
          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
        </article>
        <div class="affiliations">
          <img src="../wp-theme-files/images/affiliate-icons/fred-chamber.png" class="img-fluid d-block mx-auto" alt="" />
          <img src="../wp-theme-files/images/affiliate-icons/sdvosb.png" class="img-fluid d-block mx-auto" alt="" />
          <img src="../wp-theme-files/images/affiliate-icons/orlando-chamber.png" class="img-fluid d-block mx-auto" alt="" />
          <img src="../wp-theme-files/images/affiliate-icons/faba.png" class="img-fluid d-block mx-auto" alt="" />
          <img src="../wp-theme-files/images/affiliate-icons/swam.png" class="img-fluid d-block mx-auto" alt="" />
          <img src="../wp-theme-files/images/affiliate-icons/google-partner.png" class="img-fluid d-block mx-auto" alt="" />
          <img src="../wp-theme-files/images/affiliate-icons/sharpspring.png" class="img-fluid d-block mx-auto" alt="" />
          <img src="../wp-theme-files/images/affiliate-icons/tysons-chamber.png" class="img-fluid d-block mx-auto" alt="" />
        </div>
      </div>
    </section>
  </main>
<?php get_footer();