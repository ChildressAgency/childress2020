/*!
 * theme custom scripts
*/

jQuery(document).ready(function($){
  var $window = $(window);

  AOS.init();

  // slim header
  $window.on('scroll', function () {
    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
      $('#header').addClass('slim');
    }
    else {
      $('#header').removeClass('slim');
    }
  });

  // stats (using odometer)
  $window.on('scroll', function () {
    if (isInViewport($('#stats'), 100)) {
      $('.count').each(function (index) {
        var topNumber = $(this).data('top_number');
        $(this).text(topNumber);
      });
    }
  });

  // service page center line
  var servicePageHeight = $('.service-page').outerHeight();
  var windowHeight = $window.height() - 250; //250 = distance from line start to top of doc
  var serviceLineContainerHeight = servicePageHeight - windowHeight;
  var $serviceLine = $('.service-line');

  $window.on('scroll', function () {
    var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    var scrolled = (winScroll / serviceLineContainerHeight) * 100;
    $serviceLine.css('height', scrolled + '%');
  });

  // swiper events //
  var testimonials = new Swiper('#testimonials .swiper-container',{
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

  // contact form custom checkboxes //
  $('.disc-icon-checkbox input[type="checkbox"]').on('click', function(){
    var $serviceIconBg = $(this).closest('.service').siblings('.disc-icon-bg');

    if($(this).prop("checked") == true){
      $serviceIconBg.addClass('service-checked');
    }
    else{
      $serviceIconBg.removeClass('service-checked');
    }
  });

  // ajax loadmore
  $('body').on('click', '.loadmore', function(){
    var $this = $(this);
    $this.text('Loading...');
    var video = $this.data('video');
    var data = {
      'action': 'cai_ajax_load_more_posts',
      'page': cai_ajax_loadmore.page,
      'video': video,
      'nonce': cai_ajax_loadmore.nonce
    };

    $.post(cai_ajax_loadmore.ajaxurl, data, function(response){
      if(response != ''){
        $('.recent-posts').append(response);
        cai_ajax_loadmore.page++;
        $this.text('Load More');
      }
      else{
        $('.loadmore').hide();
      }
    });
  });
}); //end jQuery


function isInViewport(element, offset){
  if(element.length == 0){ return; }

  var $window = $(window);
  var viewportTop = $window.scrollTop();
  var viewportHeight = $window.height();
  var viewportBottom = viewportTop + viewportHeight - offset;
  var $element = $(element);
  var top = $element.offset().top;
  var height = $element.height();
  var bottom = top + height;

  return (bottom > viewportTop) && (top < viewportBottom);
}