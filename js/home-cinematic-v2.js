(function() {
  'use strict';

  // -------------------------------------------------------------
  // 1. INTRO PRELOADER & SESSION TRACKING
  // -------------------------------------------------------------
  const preloader = document.getElementById('intro-preloader');
  const video = document.getElementById('intro-video');
  const skipBtn = document.getElementById('skip-intro-btn');

  function initSite() {
    // Show the Three.js container
    const threeContainer = document.getElementById('three-container');
    if (threeContainer) {
      threeContainer.style.opacity = '1';
    }

    // Initialize all smooth scroll and scroll animations
    initSmoothScroll();
    initThreeBackground();
    initScrollAnimations();
    init3DTilt();
    initTestimonialVideo();

    // Trigger header fade-in and Section 0 staggered entrance
    gsap.timeline()
      .to('header.main-header', { opacity: 1, y: 0, duration: 1, ease: 'power3.out' })
      .to('#section-0 .content-fade-in', { opacity: 1, y: 0, duration: 1.2, ease: 'power3.out' }, '-=0.5');
  }

  function fadeOutPreloader() {
    if (!preloader) return;
    
    // Fade out preloader and scale it up slightly for organic feel
    gsap.to(preloader, {
      opacity: 0,
      scale: 1.05,
      duration: 1,
      ease: 'power3.inOut',
      onComplete: () => {
        preloader.style.display = 'none';
        preloader.remove();
        initSite();
      }
    });
  }

  if (preloader && video) {
    // Check if the user has already watched the intro in this browser session
    if (sessionStorage.getItem('intro_seen') === 'true') {
      preloader.style.display = 'none';
      preloader.remove();
      // Ensure header starts visible
      document.querySelector('header.main-header').style.opacity = '1';
      document.querySelector('header.main-header').style.transform = 'translateY(0)';
      
      // Delay initialization slightly to let document settle
      setTimeout(initSite, 100);
    } else {
      // Mark as seen so they don't get forced on reload
      sessionStorage.setItem('intro_seen', 'true');

      // Hide main header initially to focus on intro
      gsap.set('header.main-header', { opacity: 0, y: -20 });

      // Start playing preloader video
      video.play().catch(err => {
        console.warn('Auto-play blocked, skipping preloader', err);
        fadeOutPreloader();
      });

      // Reveal the "Skip Intro" button after a short delay
      setTimeout(() => {
        if (skipBtn) {
          skipBtn.classList.add('visible');
        }
      }, 1200);

      // Listen for video end or click on skip
      video.addEventListener('ended', fadeOutPreloader);
      if (skipBtn) {
        skipBtn.addEventListener('click', () => {
          video.pause();
          fadeOutPreloader();
        });
      }
    }
  } else {
    // Hide main header initially so it can fade in nicely
    const mainHeader = document.querySelector('header.main-header');
    if (mainHeader) {
      gsap.set(mainHeader, { opacity: 0, y: -20 });
    }
    // If elements don't exist, execute site functions immediately
    setTimeout(initSite, 100);
  }

  // -------------------------------------------------------------
  // 2. LENIS SMOOTH SCROLLING
  // -------------------------------------------------------------
  let lenis;
  let currentScrollY = 0;
  let scrollVelocity = 0;
  let currentVelocity = 0;

  function initSmoothScroll() {
    // Only initialize Lenis on screens larger than mobile for optimal performance
    if (window.innerWidth >= 992) {
      lenis = new Lenis({
        duration: 1.4,
        easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)), // smooth exponential out
        direction: 'vertical',
        gestureDirection: 'vertical',
        smooth: true,
        mouseMultiplier: 1,
        smoothTouch: false,
        touchMultiplier: 2,
        infinite: false,
      });

      // Synchronize scroll events with ScrollTrigger
      lenis.on('scroll', (e) => {
        currentScrollY = e.scroll;
        scrollVelocity = e.velocity || 0;
        ScrollTrigger.update();
      });

      gsap.ticker.add((time) => {
        lenis.raf(time * 1000);
      });
      gsap.ticker.lagSmoothing(0);

      // Add helper class to HTML
      document.documentElement.classList.add('lenis-smooth');
    }
      
    // Fallback scroll tracker for scroll velocity when Lenis is disabled (e.g. mobile)
    let lastScrollTime = Date.now();
    let lastScrollPosition = window.scrollY;
    window.addEventListener('scroll', () => {
      const now = Date.now();
      const pos = window.scrollY;
      const dt = Math.max(now - lastScrollTime, 1);
      const dy = pos - lastScrollPosition;
      
      if (!lenis) {
        currentScrollY = pos;
        scrollVelocity = (dy / dt) * 30; // approximate scroll velocity
      }
      
      lastScrollTime = now;
      lastScrollPosition = pos;
    }, { passive: true });
  }

  // -------------------------------------------------------------
  // 3. THREE.JS INTERACTIVE 3D PARTICLE SPHERE
  // -------------------------------------------------------------
  let scene, camera, renderer, particleSystem, originalPositions;
  let mouseX = 0, mouseY = 0, targetMouseX = 0, targetMouseY = 0;

  function initThreeBackground() {
    const canvas = document.getElementById('three-bg-canvas');
    const container = document.getElementById('three-container');
    if (!canvas || !container) return;

    // A. Setup Scene and Camera
    scene = new THREE.Scene();
    camera = new THREE.PerspectiveCamera(60, window.innerWidth / window.innerHeight, 0.1, 100);
    camera.position.z = 6;

    // B. Setup Renderer
    renderer = new THREE.WebGLRenderer({
      canvas: canvas,
      alpha: true,         // transparent background to show video layer
      antialias: true
    });
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    renderer.setSize(window.innerWidth, window.innerHeight);

    // C. Generate Glow Texture programmatically to avoid external asset dependency
    function createGlowTexture() {
      const textureCanvas = document.createElement('canvas');
      textureCanvas.width = 64;
      textureCanvas.height = 64;
      const ctx = textureCanvas.getContext('2d');
      
      const gradient = ctx.createRadialGradient(32, 32, 0, 32, 32, 32);
      gradient.addColorStop(0, 'rgba(255, 255, 255, 1)');
      gradient.addColorStop(0.3, 'rgba(248, 200, 220, 0.85)');
      gradient.addColorStop(0.7, 'rgba(248, 200, 220, 0.25)');
      gradient.addColorStop(1, 'rgba(0, 0, 0, 0)');
      
      ctx.fillStyle = gradient;
      ctx.fillRect(0, 0, 64, 64);
      return new THREE.CanvasTexture(textureCanvas);
    }

    // D. Build Particle Sphere
    const particleCount = window.innerWidth < 768 ? 1500 : 3500;
    const geometry = new THREE.BufferGeometry();
    const positions = new Float32Array(particleCount * 3);
    originalPositions = new Float32Array(particleCount * 3);

    const radius = 2.8;
    for (let i = 0; i < particleCount; i++) {
      // Golden spiral distribution for perfectly uniform sphere spacing
      const phi = Math.acos(-1 + (2 * i) / particleCount);
      const theta = Math.sqrt(particleCount * Math.PI) * phi;

      const x = radius * Math.cos(theta) * Math.sin(phi);
      const y = radius * Math.sin(theta) * Math.sin(phi);
      const z = radius * Math.cos(phi);

      // Randomize initial positions slightly for organic depth
      const offset = (Math.random() - 0.5) * 0.15;
      positions[i * 3] = x + offset;
      positions[i * 3 + 1] = y + offset;
      positions[i * 3 + 2] = z + offset;

      originalPositions[i * 3] = positions[i * 3];
      originalPositions[i * 3 + 1] = positions[i * 3 + 1];
      originalPositions[i * 3 + 2] = positions[i * 3 + 2];
    }

    geometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));

    // E. Material settings with dynamic soft glow
    const material = new THREE.PointsMaterial({
      size: window.innerWidth < 768 ? 0.05 : 0.07,
      map: createGlowTexture(),
      transparent: true,
      opacity: 0.8,
      blending: THREE.AdditiveBlending,
      depthWrite: false
    });

    particleSystem = new THREE.Points(geometry, material);
    scene.add(particleSystem);

    // D2. Build structural 3D wireframe sphere overlapping the particles
    const meshGeometry = new THREE.IcosahedronGeometry(2.78, window.innerWidth < 768 ? 3 : 4);
    const originalMeshPositions = meshGeometry.attributes.position.array.slice();
    const meshMaterial = new THREE.MeshBasicMaterial({
      color: 0xf8c8dc,
      wireframe: true,
      transparent: true,
      opacity: window.innerWidth < 768 ? 0.03 : 0.05,
      blending: THREE.AdditiveBlending,
      depthWrite: false
    });
    const wireframeMesh = new THREE.Mesh(meshGeometry, meshMaterial);
    particleSystem.add(wireframeMesh); // add to particleSystem so it rotates and moves in sync

    // F. Listeners
    document.addEventListener('mousemove', (e) => {
      targetMouseX = (e.clientX / window.innerWidth) * 2 - 1;
      targetMouseY = -(e.clientY / window.innerHeight) * 2 + 1;
    });

    window.addEventListener('resize', onWindowResize);

    // G. Animation loop
    const clock = new THREE.Clock();

    function animate() {
      requestAnimationFrame(animate);

      const time = clock.getElapsedTime();

      // Decay velocity smoothly
      currentVelocity += (Math.abs(scrollVelocity) - currentVelocity) * 0.08;
      scrollVelocity *= 0.92; // damp it

      // 1. Slow default rotation + scroll velocity rotation boost
      particleSystem.rotation.y += 0.0015 + currentVelocity * 0.008;
      particleSystem.rotation.x += 0.0003 + currentVelocity * 0.002;

      // 2. Smoothly lerp rotation to tilt towards the mouse coordinate
      mouseX += (targetMouseX - mouseX) * 0.05;
      mouseY += (targetMouseY - mouseY) * 0.05;
      
      particleSystem.rotation.y += mouseX * 0.005;
      particleSystem.rotation.x -= mouseY * 0.003;

      // 3. Dynamic Organic Morphing: displace particle positions mathematically
      const posAttr = particleSystem.geometry.attributes.position;
      const arr = posAttr.array;

      // Morph speed and wave amplitude boosted by current scroll speed
      const morphSpeed = 1.2 + currentVelocity * 2.0;
      const amplitude = 0.35 + currentVelocity * 0.55;

      for (let i = 0; i < particleCount; i++) {
        const x = originalPositions[i * 3];
        const y = originalPositions[i * 3 + 1];
        const z = originalPositions[i * 3 + 2];

        // Normalize direction
        const d = Math.sqrt(x*x + y*y + z*z);
        const nx = x / d;
        const ny = y / d;
        const nz = z / d;

        // Wave formula blending sine frequencies (creates organic "cell" breathing)
        const wave = Math.sin(nx * 3.5 + time * morphSpeed) * 
                     Math.cos(ny * 3.2 + time * morphSpeed) * 
                     Math.sin(nz * 2.8 + time * morphSpeed) * amplitude;

        // Scale coordinates along normal direction
        const currentRadius = radius + wave + Math.sin(time * 0.6 + i * 0.01) * 0.05;
        arr[i * 3] = nx * currentRadius;
        arr[i * 3 + 1] = ny * currentRadius;
        arr[i * 3 + 2] = nz * currentRadius;
      }
      posAttr.needsUpdate = true;

      // Morph wireframe mesh in sync
      const meshPosAttr = wireframeMesh.geometry.attributes.position;
      const meshArr = meshPosAttr.array;
      for (let i = 0; i < meshArr.length / 3; i++) {
        const x = originalMeshPositions[i * 3];
        const y = originalMeshPositions[i * 3 + 1];
        const z = originalMeshPositions[i * 3 + 2];
        const d = Math.sqrt(x*x + y*y + z*z);
        const nx = x / d;
        const ny = y / d;
        const nz = z / d;

        const wave = Math.sin(nx * 3.5 + time * morphSpeed) * 
                     Math.cos(ny * 3.2 + time * morphSpeed) * 
                     Math.sin(nz * 2.8 + time * morphSpeed) * amplitude;

        const currentRadius = 2.78 + wave + Math.sin(time * 0.6 + i * 0.05) * 0.04;
        meshArr[i * 3] = nx * currentRadius;
        meshArr[i * 3 + 1] = ny * currentRadius;
        meshArr[i * 3 + 2] = nz * currentRadius;
      }
      meshPosAttr.needsUpdate = true;

      // 4. Scroll responsive zoom: push camera into particles as the page scrolls
      if (window.innerWidth >= 992) {
        const targetZ = 6 - (currentScrollY * 0.0022);
        camera.position.z += (targetZ - camera.position.z) * 0.08;
      }

      renderer.render(scene, camera);
    }

    animate();
  }

  function onWindowResize() {
    if (!camera || !renderer) return;
    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
    renderer.setSize(window.innerWidth, window.innerHeight);
  }

  // -------------------------------------------------------------
  // 4. GSAP SCROLLTRIGGER ANIMATIONS
  // -------------------------------------------------------------
  function initScrollAnimations() {
    gsap.registerPlugin(ScrollTrigger);

    const sections = gsap.utils.toArray('.content-section');
    const videos = gsap.utils.toArray('.video-sequence');
    const dots = gsap.utils.toArray('.progress-dot');
    const videoBg = document.getElementById('video-bg-layer');

    let activeIndex = -1;

    // A. Cross-fade background videos based on current section
    function activateSection(index) {
      if (index === activeIndex) return;
      
      // Update videos opacity
      videos.forEach((vid, i) => {
        if (i === index) {
          vid.classList.add('active');
          vid.play().catch(() => {});
        } else {
          vid.classList.remove('active');
          setTimeout(() => {
            if (!vid.classList.contains('active')) vid.pause();
          }, 1500);
        }
      });

      // Update dots active class
      dots.forEach((dot, i) => {
        dot.classList.toggle('active', parseInt(dot.dataset.step, 10) === index);
      });

      // Trigger text visibility transition in sync with video transitions
      sections.forEach((sec, i) => {
        const content = sec.querySelector('.content-fade-in');
        if (content) {
          if (i === index) {
            gsap.to(content, {
              opacity: 1,
              y: 0,
              duration: 1,
              ease: 'power2.out',
              overwrite: 'auto'
            });
          } else {
            gsap.to(content, {
              opacity: 0,
              y: i < index ? -20 : 20,
              duration: 1,
              ease: 'power2.out',
              overwrite: 'auto'
            });
          }
        }
      });

      activeIndex = index;
    }

    // Setup intersection indicators for sections
    sections.forEach((section, i) => {
      ScrollTrigger.create({
        trigger: section,
        start: 'top 50%',
        end: 'bottom 50%',
        onEnter: () => activateSection(i),
        onEnterBack: () => activateSection(i),
      });
    });

    // B. Staggered Text Reveals for section text content on initial scroll
    sections.forEach((sec) => {
      const content = sec.querySelector('.content-fade-in');
      const wrapper = content ? content.firstElementChild : null;
      if (!wrapper) return;

      const header = wrapper.querySelector('h1, h2');
      // Safely select only top-level direct child text/button elements within the content wrapper
      const paragraphs = Array.from(wrapper.children).filter(el => el.tagName !== 'H1' && el.tagName !== 'H2');

      if (header || paragraphs.length) {
        const tl = gsap.timeline({
          scrollTrigger: {
            trigger: sec,
            start: 'top 75%',
            toggleActions: 'play none none none'
          }
        });

        if (header) {
          tl.from(header, { opacity: 0, y: 30, duration: 0.8, ease: 'power2.out' });
        }
        if (paragraphs.length) {
          tl.from(paragraphs, { opacity: 0, y: 20, duration: 0.6, stagger: 0.12, ease: 'power2.out' }, '-=0.4');
        }
      }
    });

    // C. Pinning Section 2 & Transitioning to Section 4 (White page)
    const section2 = document.getElementById('section-2');
    const section4 = document.getElementById('section-4');
    const section4Content = document.getElementById('section-4-content');

    if (section2 && section4 && videoBg) {
      const pinTimeline = gsap.timeline({
        scrollTrigger: {
          trigger: '#section-2',
          start: 'bottom bottom',
          end: '+=100%',
          scrub: 1,
          pin: true,
          pinSpacing: false,
          onEnter: () => {
            gsap.set(videoBg, { className: 'cinematic-video-container gsap-active' });
            gsap.to('#three-container', { opacity: 1, duration: 0.3 });
          },
          onLeave: () => {
            // Hide cinematic assets once we leave dark area
            gsap.to([videoBg, '#three-container'], { opacity: 0, visibility: 'hidden', duration: 0.4 });
            // Pause videos
            videos.forEach(v => v.pause());
          },
          onEnterBack: () => {
            // Re-show cinematic assets
            gsap.to([videoBg, '#three-container'], { opacity: 1, visibility: 'visible', duration: 0.4 });
            // Play active index video
            if (videos[activeIndex]) {
              videos[activeIndex].play().catch(() => {});
            }
          },
          onLeaveBack: () => {
            gsap.set(videoBg, { className: 'cinematic-video-container' });
          }
        }
      });

      // Animate Section 2 text out
      pinTimeline.to('#section-2 .content-fade-in', {
        opacity: 0,
        yPercent: -100,
        ease: 'power1.inOut'
      }, 0);

      // Scale, blur and dissolve the background videos + Three.js sphere
      pinTimeline.to([videoBg, '#three-container'], {
        scale: 1.06,
        filter: 'blur(25px)',
        opacity: 0,
        ease: 'power1.inOut'
      }, 0);

      // Hide progress dots
      pinTimeline.to('.scroll-progress', {
        opacity: 0,
        pointerEvents: 'none',
        ease: 'power1.inOut'
      }, 0);

      // Slide in Section 4 content smoothly
      pinTimeline.fromTo(section4Content,
        { opacity: 0, yPercent: 25 },
        { opacity: 1, yPercent: 0, ease: 'power2.out' },
        0
      );
    }

    // D. Zoom Parallax for Section 5 Video Card
    const videoBlock = document.querySelector('.video-block');
    const innerVideo = document.querySelector('.video-block video');
    if (videoBlock && innerVideo) {
      gsap.fromTo(innerVideo,
        { scale: 0.94, filter: 'brightness(0.8)' },
        {
          scale: 1,
          filter: 'brightness(1.05)',
          ease: 'power1.out',
          scrollTrigger: {
            trigger: videoBlock,
            start: 'top 85%',
            end: 'bottom 20%',
            scrub: true
          }
        }
      );
    }

    // E. Treatment Slider Reveal
    const treatmentSlider = document.querySelector('.treatment-slider');
    if (treatmentSlider) {
      gsap.from(treatmentSlider, {
        opacity: 0,
        y: 45,
        duration: 0.8,
        ease: 'power2.out',
        scrollTrigger: {
          trigger: '.treatment-section',
          start: 'top 80%'
        }
      });
    }

    // F. Research publication cards reveal
    const researchLogos = gsap.utils.toArray('.research-section .img-box');
    if (researchLogos.length) {
      gsap.from(researchLogos, {
        opacity: 0,
        scale: 0.85,
        duration: 0.7,
        stagger: 0.15,
        ease: 'back.out(1.4)',
        scrollTrigger: {
          trigger: '.research-section',
          start: 'top 95%'
        }
      });
    }

    // G. Dots click navigation (Lenis-aware scroll target)
    dots.forEach(dot => {
      dot.addEventListener('click', () => {
        const step = dot.dataset.step;
        const target = document.getElementById(`section-${step}`);
        if (target) {
          if (lenis) {
            lenis.scrollTo(target, { offset: 0, duration: 1.5 });
          } else {
            target.scrollIntoView({ behavior: 'smooth' });
          }
        }
      });
    });

    // Clean up internal links smooth scrolling
    document.querySelectorAll('a[href^="#"]').forEach(link => {
      link.addEventListener('click', (e) => {
        const targetId = link.getAttribute('href');
        if (targetId === '#') return;
        const target = document.querySelector(targetId);
        if (target) {
          e.preventDefault();
          if (lenis) {
            lenis.scrollTo(target, { offset: -80, duration: 1.5 });
          } else {
            target.scrollIntoView({ behavior: 'smooth' });
          }
        }
      });
    });
  }

  // -------------------------------------------------------------
  // 5. CUSTOM CURSOR DISABLED (Standard browser mouse pointer restored)
  // -------------------------------------------------------------

  // -------------------------------------------------------------
  // 6. 3D INTERACTIVE TILT FOR CARDS
  // -------------------------------------------------------------
  function init3DTilt() {
    // Only run 3D hover-tilt effect on screens larger than mobile/tablets for performance
    if (window.innerWidth < 992) return;

    // 1. Delegate for dynamically cloned treatment boxes inside the slider
    const treatmentSlider = document.querySelector('.treatment-slider');
    if (treatmentSlider) {
      treatmentSlider.addEventListener('mousemove', (e) => {
        const card = e.target.closest('.treament-box');
        if (!card) return;

        // Ensure perspective is set
        if (card.style.transformStyle !== 'preserve-3d') {
          card.style.transformStyle = 'preserve-3d';
          card.parentNode.style.perspective = '1000px';
        }

        const rect = card.getBoundingClientRect();
        const x = e.clientX - rect.left; // mouse position relative to element
        const y = e.clientY - rect.top;
        const xc = rect.width / 2;      // element center
        const yc = rect.height / 2;
        
        const rotateX = ((yc - y) / yc) * 12; 
        const rotateY = ((x - xc) / xc) * 12;

        gsap.to(card, {
          rotationX: rotateX,
          rotationY: rotateY,
          scale: 1.04,
          boxShadow: '0 25px 50px rgba(0,0,0,0.3)',
          duration: 0.3,
          ease: 'power2.out',
          overwrite: 'auto'
        });

        // Add visual parallax depth to inner text block or image
        const inner = card.querySelector('.text-block, img');
        if (inner) {
          gsap.to(inner, {
            transform: 'translateZ(30px)',
            duration: 0.3,
            overwrite: 'auto'
          });
        }
      });

      treatmentSlider.addEventListener('mouseout', (e) => {
        const card = e.target.closest('.treament-box');
        if (!card) return;

        // Check if the mouse is moving to a child element within the same card
        const relatedTarget = e.relatedTarget;
        if (relatedTarget && card.contains(relatedTarget)) return;

        // Smoothly return card to default state
        gsap.to(card, {
          rotationX: 0,
          rotationY: 0,
          scale: 1,
          boxShadow: '0 10px 30px rgba(0,0,0,0.1)',
          duration: 0.5,
          ease: 'power2.out',
          overwrite: 'auto'
        });

        const inner = card.querySelector('.text-block, img');
        if (inner) {
          gsap.to(inner, {
            transform: 'translateZ(0)',
            duration: 0.5,
            overwrite: 'auto'
          });
        }
      });
    }

    // 2. Static bindings for static research boxes
    const staticCards = document.querySelectorAll('.research-section .img-box');
    staticCards.forEach(card => {
      // Set container perspective
      card.style.transformStyle = 'preserve-3d';
      card.parentNode.style.perspective = '1000px';

      card.addEventListener('mousemove', (e) => {
        const rect = card.getBoundingClientRect();
        const x = e.clientX - rect.left; // mouse position relative to element
        const y = e.clientY - rect.top;
        const xc = rect.width / 2;      // element center
        const yc = rect.height / 2;
        
        // Calculate rotational angle based on cursor distance from center
        // limit rotation to 12 degrees max
        const rotateX = ((yc - y) / yc) * 12; 
        const rotateY = ((x - xc) / xc) * 12;

        gsap.to(card, {
          rotationX: rotateX,
          rotationY: rotateY,
          scale: 1.04,
          boxShadow: '0 25px 50px rgba(0,0,0,0.3)',
          duration: 0.3,
          ease: 'power2.out',
          overwrite: 'auto'
        });

        // Add visual parallax depth to inner text block or image
        const inner = card.querySelector('.text-block, img');
        if (inner) {
          gsap.to(inner, {
            transform: 'translateZ(30px)',
            duration: 0.3,
            overwrite: 'auto'
          });
        }
      });

      card.addEventListener('mouseleave', () => {
        // Smoothly return card to default state
        gsap.to(card, {
          rotationX: 0,
          rotationY: 0,
          scale: 1,
          boxShadow: '0 10px 30px rgba(0,0,0,0.1)',
          duration: 0.5,
          ease: 'power2.out',
          overwrite: 'auto'
        });

        const inner = card.querySelector('.text-block, img');
        if (inner) {
          gsap.to(inner, {
            transform: 'translateZ(0)',
            duration: 0.5,
            overwrite: 'auto'
          });
        }
      });
    });
  }

  // -------------------------------------------------------------
  // 7. TESTIMONIAL YOUTUBE VIDEO HOVER PLAY/PAUSE
  // -------------------------------------------------------------
  function initTestimonialVideo() {
    const videoContainer = document.querySelector('.testimonial-parallax-root .video-container');
    const iframe = document.getElementById('testimonial-youtube-iframe');
    if (!videoContainer || !iframe) return;

    videoContainer.addEventListener('mouseenter', () => {
      iframe.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
    });

    videoContainer.addEventListener('mouseleave', () => {
      iframe.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
    });
  }

})();
