$(document).ready(function () {

  // Resolve baseUrl dynamically relative to the script location
  var scripts = document.getElementsByTagName('script');
  var scriptPath = "";
  for (var i = 0; i < scripts.length; i++) {
    if (scripts[i].src && scripts[i].src.indexOf('js/custom-slider.js') !== -1) {
      scriptPath = scripts[i].src;
      break;
    }
  }
  var baseUrl = scriptPath ? scriptPath.substring(0, scriptPath.indexOf('js/custom-slider.js')) : "";

  $('.top-slider').owlCarousel({
    loop: true,
    margin: 16,
    nav: false,
    rtl: true,
    dots: false,
    center: true,
    autoplay: true,
    autoplayTimeout: 3000,
    smartSpeed: 7000,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 1.5
      },
      600: {
        items: 2
      },
      1000: {
        items: 3
      },
      1500: {
        items: 4
      }
    }

  })

  $('.bottom-slider').owlCarousel({
    loop: true,
    margin: 16,
    nav: false,
    dots: false,
    center: true,
    autoplay: true,
    autoplayTimeout: 3000,
    smartSpeed: 7000,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 1.5
      },
      600: {
        items: 2
      },
      1000: {
        items: 3
      },
      1500: {
        items: 4
      }
    }

  })


  $('.treatment-slider').owlCarousel({
    loop: true,
    center: true,
    margin: 24,
    nav: true,
    navText: [
      '<span class="nav-btn prev"><img src="' + baseUrl + 'images/arrow-left.svg"></span>',
      '<span class="nav-btn next"><img src="' + baseUrl + 'images/arrow-right.svg"></span>',
    ],
    dots: false,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    mouseDrag: true,
    touchDrag: true,
    pullDrag: true,
    smartSpeed: 600,
    responsive: {
      0: {
        items: 1.25
      },
      600: {
        items: 3.5
      },
      1000: {
        items: 3.5
      },
      1500: {
        items: 5.5
      }
    }
  })

  $('.after-before-block').owlCarousel({
    loop: true,
    margin: 24,
    nav: true,
    dots: false,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    mouseDrag: true,
    touchDrag: true,
    pullDrag: true,
    smartSpeed: 600,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 2
      },
      1000: {
        items: 2
      }
    }
  })


   var thumbSwiper = new Swiper(".thumb-slider", {
    spaceBetween: 10,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesProgress: true,
  });

  var mainSwiper = new Swiper(".main-slider", {
    spaceBetween: 10,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    thumbs: {
      swiper: thumbSwiper,
    },
  });

  // Before & After Homepage Slider
  $('.before-after-slider').owlCarousel({
    loop: true,
    margin: 24,
    nav: true,
    navText: [
      '<span class="nav-btn prev"><img src="' + baseUrl + 'images/arrow-left.svg"></span>',
      '<span class="nav-btn next"><img src="' + baseUrl + 'images/arrow-right.svg"></span>',
    ],
    dots: true,
    autoplay: false, // Don't autoplay since users want to interact with twentytwenty handle
    mouseDrag: false, // Disable dragging on the carousel itself to prevent conflicts with the twentytwenty handle
    touchDrag: false,
    pullDrag: false,
    smartSpeed: 600,
    responsive: {
      0: {
        items: 1
      },
      992: {
        items: 3
      }
    },
    onInitialized: function() {
      // Initialize twentytwenty inside the slider once the carousel is initialized
      $(".before-after-slider .twentytwenty-container").twentytwenty({
        default_offset_pct: 0.5,
        orientation: 'horizontal'
      });
    },
    onTranslated: function() {
      // Re-trigger window resize to ensure twentytwenty recalculates correct dimensions of images in active slides
      $(window).trigger('resize');
    }
  });

  // Fallback direct initialization for non-slider pages
  if ($(".twentytwenty-container").length && !$(".before-after-slider").length) {
    $(".twentytwenty-container").twentytwenty({
      default_offset_pct: 0.5,
      orientation: 'horizontal'
    });
  }
});