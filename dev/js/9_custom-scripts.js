/*!
 * theme custom scripts
 */

jQuery(document).ready(function ($) {
  var $window = $(window);

  AOS.init();

  // slim header
  $window.on("scroll", function () {
    if (
      document.body.scrollTop > 50 ||
      document.documentElement.scrollTop > 50
    ) {
      $("#header").addClass("slim");
    } else {
      $("#header").removeClass("slim");
    }
  });

  // stats (using odometer)
  $window.on("scroll", function () {
    if (isInViewport($(".odo"), 100)) {
      $(".count").each(function (index) {
        var topNumber = $(this).data("top_number");
        $(this).text(topNumber);
      });
    }
  });

  // service page center line
  var servicePageHeight = $(".services-page").outerHeight();
  var windowHeight = $window.height() - 250; //250 = distance from line start to top of doc
  var serviceLineContainerHeight = servicePageHeight - windowHeight;
  var $serviceLine = $(".service-line");

  $window.on("scroll", function () {
    var winScroll =
      document.body.scrollTop || document.documentElement.scrollTop;
    var scrolled = (winScroll / serviceLineContainerHeight) * 100;
    $serviceLine.css("height", scrolled + "%");
  });

  // swiper events //
  var testimonials = new Swiper("#testimonials .swiper-container", {
    autoplay: true,
    loop: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    slidesPerView: 1,
    spaceBetween: 25,
    breakpoints: {
      1200: {
        slidesPerView: 3,
      },
      992: {
        slidesPerView: 2,
      },
    },
  });

  var team = new Swiper("#our-team .swiper-container", {
    //autoplay: true,
    loop: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    slidesPerView: 1,
    spaceBetween: 25,
    centeredSlides: true,
    //autoHeight: true,
    breakpoints: {
      1200: {
        slidesPerView: 5,
      },
      992: {
        slidesPerView: 3,
      },
    },
  });

  /* step slider */
  var $progressBar = $('.step-slider .progress-bar');

  var stepSlider = new Swiper('.step-slider .swiper-container', {
    autoplay: false,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    },
    spaceBetween: 50,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
      type: 'bullets',
      renderBullet: function (index, className) {
        var thisSlide = this.slides[index];
        var thisSlideTitle = $(thisSlide).find('.slide-title').html();

        return '<span class="' + className + '">' + (index + 1) + '<span class="slide-title">' + thisSlideTitle + '</span></span>';
      }
    },
    on:{
      init: function(){
        var curIndex = this.activeIndex;
        var numSlides = this.slides.length;
        set_progress_bar_width(curIndex, numSlides);
      }
    }
  });

  stepSlider.on('slideChange', function(){
    var curIndex = stepSlider.activeIndex;
    var numSlides = stepSlider.slides.length;
    set_progress_bar_width(curIndex, numSlides);
  });

  function set_progress_bar_width(curIndex, numSlides){
    var barWidth = ((curIndex + 1) / numSlides) * 100;
    $($progressBar).css('width', barWidth + '%');
  }
  /* end step slider */

  var caseStudies = new Swiper('#case-studies .swiper-container', {
    autoplay: true,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev'
    },
    slidesPerView: 1,
    spaceBetween: 50,
    grabCursor: true,
    breakpoints: {
      768: {
        slidesPerView: 2,
        spaceBetween: 50
      },
      992: {
        slidesPerView: 4,
        spaceBetween: 20
      }
    }
  });

  var newsChats = new Swiper('#news-chats .swiper-container', {
    autoplay: true,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev'
    },
    slidesPerView: 1,
    spaceBetween: 50,
    grabCursor: true,
    breakpoints: {
      768: {
        slidesPerView: 2,
        spaceBetween: 50
      },
      992: {
        slidesPerView: 4,
        spaceBetween: 20
      }
    }
  });

  var studyStats = new Swiper('#study-stats .swiper-container', {
    autoplay: true,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev'
    },
    grabCursor: true
  });

  var caseSlides = new Swiper('#case-slides .swiper-container', {
    autoplay: false,
    slidesPerView: 1,
    centeredSlides: true,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev'
    },
    breakpoints: {
      768: {
        slidesPerView: 3,
        spaceBetween: -200
      }
    }
  });

  // contact form custom checkboxes //
  $('.disc-icon-checkbox input[type="checkbox"]').on("click", function () {
    var $serviceIconBg = $(this).closest(".service").siblings(".disc-icon-bg");

    if ($(this).prop("checked") == true) {
      $serviceIconBg.addClass("service-checked");
    } else {
      $serviceIconBg.removeClass("service-checked");
    }
  });

  // ajax loadmore
  $("body").on("click", ".loadmore", function (e) {
    e.preventDefault();
    var $clickedButton = $(this);
    $clickedButton.text("Loading...");
    var video = $clickedButton.data("video");

    var $loadMoreSection;
    if (video == "no") {
      $loadMoreSection = $(".recent-posts");
    } else {
      $loadMoreSection = $(".recent-videos");
    }

    var data = {
      action: "cai_ajax_load_more_posts",
      page: cai_ajax_loadmore.page,
      video: video,
      security: cai_ajax_loadmore.security,
    };

    $.post(cai_ajax_loadmore.ajaxurl, data, function (response) {
      if (response != "") {
        $loadMoreSection.append(response);
        cai_ajax_loadmore.page++;
        $clickedButton.text("Load More");
      } else {
        $clickedButton.hide();
      }
    });
  });

  $('body').on('click', '.loadmore-casestudies', function(e){
    e.preventDefault();
    var $clickedButton = $(this);
    $clickedButton.text('Loading...');

    var data = {
      action: 'cai_ajax_load_more_case_studies',
      page: cai_ajax_loadmore.page,
      security: cai_ajax_loadmore.security
    };

    $.post(cai_ajax_loadmore.ajaxurl, data, function(response){
      if(response != ''){
        $('.case-studies-loop').append(response);
        cai_ajax_loadmore.page++;
        $clickedButton.text('Load More');
      }
      else{
        $clickedButton.hide();
      }
    });
  });

  var $caiIcon = $('#cai-icon');
  $('.cai-state').hover(function(){
    var caiState = $(this).attr('id');
    $caiIcon.addClass(caiState);
  }, function(){
    var caiState = $(this).attr('id');
    $caiIcon.removeClass(caiState);
  });
}); //end jQuery

function isInViewport(element, offset) {
  if (element.length == 0) {
    return;
  }

  var $window = $(window);
  var viewportTop = $window.scrollTop();
  var viewportHeight = $window.height();
  var viewportBottom = viewportTop + viewportHeight - offset;
  var $element = $(element);
  var top = $element.offset().top;
  var height = $element.height();
  var bottom = top + height;

  return bottom > viewportTop && top < viewportBottom;
}

