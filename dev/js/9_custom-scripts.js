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
  var windowHeight = $(window).height() - 250; //250 = distance from line start to top of doc
  var serviceLineContainerHeight = servicePageHeight - windowHeight;
  var $serviceLine = $('.service-line');
  $(window).on('scroll', function(){
    var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    var scrolled = (winScroll / serviceLineContainerHeight) * 100;
    $serviceLine.css('height', scrolled + '%');
  });

  $('.disc-icon-checkbox input[type="checkbox"]').on('click', function(){
    var $serviceIconBg = $(this).closest('.service').siblings('.disc-icon-bg');

    if($(this).prop("checked") == true){
      $serviceIconBg.addClass('service-checked');
    }
    else{
      $serviceIconBg.removeClass('service-checked');
    }
  });

  AOS.init();

  $(window).on('scroll', function(){
    if(isInViewport($('#stats'), 200)){
      //$('.count').each(function(index){
      //  var topNumber = $(this).data('top_number');
      //  var elementId = $(this).attr('id');
      //  countUp(elementId, topNumber);
      //});

      $('.count').each(function(index){
        var topNumber = $(this).data('top_number');
        $(this).text(topNumber);
      });
    }
  });

}); //end jQuery


function isInViewport(element, offset){
  if(element.length == 0){ return; }

  var $window = $(window);
  var viewportTop = $window.scrollTop();
  var viewportHeight = $window.height();
  var viewportBottom = viewportTop + viewportHeight -100;
  var $element = $(element);
  var top = $element.offset().top;
  var height = $element.height();
  var bottom = top + height;

  return (bottom > viewportTop) && (top < viewportBottom);
}

function countUp(elementId, topNumber){
  var current = 0;
  var duration = 5000;
  var stepTime = Math.abs(Math.floor(duration / topNumber));
  var $element = $(elementId);
  var timer = setInterval(function(){
    current += 1;
    $element.html(current);
    if(current == topNumber){
      clearInterval(timer);
    }
  }, stepTime);
}