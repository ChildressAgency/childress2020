/*!
 * theme custom scripts
*/

jQuery(document).ready(function($){
  var testimonials = new Swiper('.swiper-container',{
    loop: true,
    navigation:{
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev'
    },
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