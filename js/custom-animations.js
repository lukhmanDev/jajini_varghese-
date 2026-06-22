document.addEventListener("DOMContentLoaded", function () {

  // ----------------------------
  // Only run animations on desktop/tablet >= 768px
  // ----------------------------
  if (window.innerWidth < 768) return;

  // ----------------------------
  // Initialize Locomotive Scroll
  // ----------------------------
  const scroll = new LocomotiveScroll({
    el: document.querySelector('[data-scroll-container]'),
    smooth: true,
    lerp: 0.08,
    tablet: {
      smooth: false
    },
    smartphone: {
      smooth: false
    },
  });

  // Restore saved scroll position (if any)
  const savedScroll = sessionStorage.getItem("scroll-position");
  if (savedScroll) {
    scroll.scrollTo(parseFloat(savedScroll), {
      duration: 0,
      disableLerp: true
    });
  }

  // Save scroll position before refresh or navigation
  window.addEventListener("beforeunload", () => {
    const currentScroll = scroll.scroll.instance.scroll.y;
    sessionStorage.setItem("scroll-position", currentScroll);
  });

  // Update after all images/videos loaded
  window.addEventListener("load", () => scroll.update());

  // ----------------------------
  // Scroll-triggered text animation (fade in + move up)
  // ----------------------------
  scroll.on('call', (func, dir, obj) => {
    if (func === 'text-animate') {
      const title = obj.el.querySelector('.animate-e');
      if (!title) return;

      anime({
        targets: title,
        opacity: [0, 1],
        translateY: [150, 0],
        easing: 'easeOutExpo',
        duration: 1200
      });
    }
  });

  // ----------------------------
  // Video scroll transform
  // ----------------------------
  scroll.on('scroll', (obj) => {
    const videoSection = document.querySelector('.clients-say-section');
    if (!videoSection) return;

    const video = videoSection.querySelector('.inner-video');
    if (!video) return;

    const rect = videoSection.getBoundingClientRect();
    const windowHeight = window.innerHeight;

    if (rect.top < windowHeight && rect.bottom > 0) {
      const progress = (windowHeight - rect.top) / (windowHeight + rect.height);
      const zValue = -50 + (150 + 150) * progress; // starts at -175
      video.style.transform = `matrix3d(1,0,0,0, 0,1,0,0, 0,0,1,0, 0,${zValue},0,1)`;
    } else {
      video.style.transform = 'matrix3d(1,0,0,0, 0,1,0,0, 0,0,1,0, 0,-50,0,1)'; // reset
    }
  });

  // ----------------------------
  // Counter animation
  // ----------------------------
  function animateCounter(element, endValue) {
    anime({
      targets: element,
      innerHTML: [0, endValue],
      duration: 2000,
      easing: 'easeOutExpo',
      round: 1,
      update: function (anim) {
        const val = Math.floor(anim.animations[0].currentValue);
        element.innerHTML = val.toLocaleString();
      }
    });
  }

  let counterPlayed = false;

  scroll.on('scroll', (args) => {
    const aboutBlock = document.querySelector('.about-content-block');
    if (!aboutBlock || counterPlayed) return;

    const scrollY = args.scroll.y;
    const blockTop = aboutBlock.getBoundingClientRect().top + scrollY - window.innerHeight * 0.8;

    if (scrollY > blockTop) {
      counterPlayed = true;
      document.querySelectorAll('.count.digits').forEach(counter => {
        const text = counter.textContent.replace(/[^\d]/g, '');
        const suffix = counter.textContent.replace(/\d|,/g, '');
        animateCounter(counter, parseInt(text));
        setTimeout(() => counter.innerHTML += suffix, 2200);
      });
    }
  });

  // ----------------------------
  // Reset transforms and text on window resize below 768px
  // ----------------------------
  window.addEventListener('resize', () => {
    if (window.innerWidth < 768) {
      const video = document.querySelector('.clients-say-section .inner-video');
      if (video) video.style.transform = 'matrix3d(1,0,0,0, 0,1,0,0, 0,0,1,0, 0,-175,0,1)';
      document.querySelectorAll('.section-title .title').forEach(t => {
        t.style.opacity = 1;
        t.style.transform = 'translateY(0)';
      });
    }
  });

});