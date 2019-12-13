/*!
 * theme custom scripts
*/

jQuery(document).ready(function($){
  var testimonials = new Swiper('#testimonials .swiper-container',{
    //autoplay: true,
    loop: true,
    navigation:{
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev'
    },
    slidesPerView: 1,
    spaceBetween: 25,
    breakpoints: {
      1200: {
        slidesPerView: 3,
      },
      992: {
        slidesPerView: 2
      }
    }
  });

  var team = new Swiper('#our-team .swiper-container', {
    //autoplay: true,
    loop: true,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev'
    },
    slidesPerView: 1,
    spaceBetween: 25,
    centeredSlides: true,
    //autoHeight: true,
    breakpoints: {
      1200: {
        slidesPerView: 5
      },
      992: { 
        slidesPerView: 3
      }
    }
  });

  $(window).on('scroll', function(){
    if(document.body.scrollTop > 50 || document.documentElement.scrollTop > 50){
      $('#header').addClass('slim');
    }
    else{
      $('#header').removeClass('slim');
    }
  });

  $('.contact-service input[type="checkbox"]').on('click', function(){
    var $serviceIconBg = $(this).closest('.service').siblings('.service-icon-bg');

    if($(this).prop("checked") == true){
      $serviceIconBg.addClass('service-checked');
    }
    else{
      $serviceIconBg.removeClass('service-checked');
    }
  });
}); //end jQuery