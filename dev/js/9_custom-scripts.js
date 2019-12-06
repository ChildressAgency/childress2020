/*!
 * theme custom scripts
*/

jQuery(document).ready(function($){
  var testimonials = new Swiper('.swiper-container',{
    autoplay: true,
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

  $(window).on('scroll', function(){
    if(document.body.scrollTop > 50 || document.documentElement.scrollTop > 50){
      $('#header').addClass('slim');
    }
    else{
      $('#header').removeClass('slim');
    }
  });
}); //end jQuery