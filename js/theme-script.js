$(document).ready(function () {
  "use strict";

  // Page Loader
  $("#page_loader").delay().fadeOut("slow");

  /*--------------------------
      Header Fixed on Scroll
  ---------------------------*/
  var lastScrollTop = 0;
  function updateHeader() {
    var $mainHeader   = $("header.main-header");
    var $heroSection  = $(".hero-video-section");
    var $innerHeader  = $("header.inner-header");
    var scrollTop     = $(window).scrollTop();

    // ── Home page: transparent until past hero section ──
    if ($mainHeader.length && $heroSection.length) {
      var heroBottom = $heroSection.offset().top + $heroSection.outerHeight(true);
      if (scrollTop >= heroBottom - 80) {
        $mainHeader.addClass("fixed");
      } else {
        $mainHeader.removeClass("fixed");
      }
    } else if ($mainHeader.length) {
      var $lastCinematicSection = $("#section-2");
      if ($lastCinematicSection.length) {
        var triggerPoint = $lastCinematicSection.offset().top + $lastCinematicSection.outerHeight(true);
        if (scrollTop >= triggerPoint - 80) {
          $mainHeader.addClass("fixed");
        } else {
          $mainHeader.removeClass("fixed");
        }
      } else {
        if (scrollTop >= 100) {
          $mainHeader.addClass("fixed");
        } else {
          $mainHeader.removeClass("fixed");
        }
      }
    }

    // ── Smart Header: show on scroll up, hide on scroll down ──
    if ($mainHeader.length) {
      if (scrollTop > lastScrollTop && scrollTop > 150) {
        $mainHeader.addClass("nav-hidden");
      } else {
        $mainHeader.removeClass("nav-hidden");
      }
    }

    // ── Inner pages: standard 100px threshold ──
    if ($innerHeader.length) {
      if (scrollTop >= 100) {
        $innerHeader.addClass("fixed");
      } else {
        $innerHeader.removeClass("fixed");
      }
    }

    lastScrollTop = scrollTop;
  }

  // Run on scroll and also immediately on load
  $(window).on("scroll", updateHeader);
  updateHeader();

  /*--------------------------
      Menu functions
  ---------------------------*/
 $(document).ready(function () {

  // Main dropdown
  $(".menu-toggle").on("click", function (e) {
    e.preventDefault();
    var $dropdown = $(this).next(".dropdown-menu");

    $(".dropdown-menu").not($dropdown).slideUp(200);
    $dropdown.stop(true, true).slideToggle(200);

    $(this).parent().toggleClass("open");
  });

  // Sub dropdown (NEW)
  $(".sub-dropdown > a").on("click", function (e) {
    e.preventDefault();

    var $subMenu = $(this).next(".sub-dropdown-menu");

    // Close other submenus
    $(".sub-dropdown-menu").not($subMenu).slideUp(200);

    // Toggle current
    $subMenu.stop(true, true).slideToggle(200);

    $(this).parent().toggleClass("open");
  });

});

  $(document).ready(function () {
    $(".navbar-nav li a").each(function () {
      var pageUrl = window.location.href.split(/[?#]/)[0];
      if (this.href == pageUrl) {
        $(this).addClass("active");
        $(this).parent().addClass("active"); // add active to li of the current link
        $(this).parent().parent().prev().addClass("active"); // add active class to an anchor
        $(this).parent().parent().prev().click(); // click the item to make it drop
      }
    });
  });

  AOS.init({
    disable: window.innerWidth < 992,
    startEvent: 'DOMContentLoaded',
    easing: "ease-out-back",
    duration: 1000,
    once: true,
    mirror: true,
  });


  $('.popup-gallery').magnificPopup({
    delegate: 'a',
    type: 'image',
    tLoading: 'Loading image #%curr%...',
    mainClass: 'mfp-img-mobile',
    gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
    },
  });

  // Window Resize Actions
  $(window).on("load resize", function () {
    if ($(window).width() > 767) {
      // Responsive actions if needed
    }
  });

  // Convert IMG to SVG
  $("img.svg").each(function () {
    const $this = $(this);
    if (!$this.data("svg-loaded")) {
      $.get($this.attr("src"), function (data) {
        const $svg = $(data).find("svg");
        $svg.attr("class", $this.attr("class") + " replaced-svg");
        $this.replaceWith($svg);
        $svg.data("svg-loaded", true);
      }, "xml");
    }
  });

  // Background Images & Colors
  $("[data-bg-image]").each(function () {
    var $this = $(this);
    $this.css("background-image", "url(" + $this.data("bg-image") + ")");
  });

  $("[data-bg-color]").each(function () {
    $(this).css("background-color", $(this).data("bg-color"));
  });

  // Convert .bg-img <img> to CSS background
  $(".bg-img").each(function () {
    var $this = $(this);
    var imgSrc = $this.children("img").attr("src");

    if (imgSrc) {
      $this.parent().css({
        "background-image": "url(" + imgSrc + ")",
        "background-size": "cover",
        "background-position": "center",
      }).addClass("bg-img");

      if ($this.hasClass("background-size-auto")) {
        $this.parent().addClass("background-size-auto");
      }

      $this.remove();
    }
  });

});