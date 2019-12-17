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

  var servicePageHeight = $('.service-page').outerHeight();
  var contactHeight = $('#contact').outerHeight();
  var serviceLineContainerHeight = servicePageHeight - contactHeight;
  $(window).on('scroll', function(){
    var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    //var height = $('.service-page').outerHeight() - $('#contact').outerHeight();
    //var height = $('.service-page').outerHeight() - 275;
    var scrolled = (winScroll / serviceLineContainerHeight) * 100;
    $('.service-line').css('height', scrolled + '%');
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

  AOS.init();
}); //end jQuery