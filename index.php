<?php include 'header.php' ;?>

<!-- Main Content Start  -->

<main>

<!-- Intro Video Preloader -->
<div id="intro-preloader">
  <div class="preloader-video-wrapper">
    <video id="intro-video" autoplay muted playsinline>
      <source src="video/logo animation.mp4" type="video/mp4">
    </video>
  </div>
  <button id="skip-intro-btn" type="button">Skip Intro</button>
</div>

<!-- Three.js Canvas Container -->
<div id="three-container">
  <canvas id="three-bg-canvas"></canvas>
</div>


<!-- Scroll progress dots navigation -->
<div class="scroll-progress">
  <button type="button" class="progress-dot active" data-step="0" aria-label="Hero"></button>
  <button type="button" class="progress-dot" data-step="1" aria-label="About"></button>
  <button type="button" class="progress-dot" data-step="2" aria-label="Ethos"></button>
</div>

<div class="home-cinematic-wrapper">
  <!-- Fixed video background Layer -->
  <div class="cinematic-video-container" id="video-bg-layer">
    <video class="video-sequence active" data-index="0" autoplay loop muted playsinline>
      <source src="video/jajini.mp4" type="video/mp4">
    </video>
    <video class="video-sequence" data-index="1" loop muted playsinline>
      <source src="video/breast-cancer-surgery.mp4" type="video/mp4">
    </video>
    <video class="video-sequence" data-index="2" loop muted playsinline>
      <source src="video/surgery.mp4" type="video/mp4">
    </video>
    <div class="video-overlay"></div>
  </div>
  <!-- Section 0: Hero -->
 <!-- Added p-0 and w-100 to the main section -->
<section class="content-section" id="section-0" style="min-height: 100vh; display: flex; align-items: stretch; width: 100%;">
    <div class="container-fluid p-0 content-fade-in d-flex justify-content-start align-items-end pb-5 w-100">
      <div class="d-flex flex-column align-items-start text-start" style="padding-left: 0; margin-left: 0;">
        <!-- Increased heading size scope using clamp (starts larger, scales higher) -->
        <h1 class="mb-2" style="font-family: var(--font-display); font-size: clamp(3rem, 6vw, 72px); font-weight: 700; letter-spacing: -0.02em; text-align: left; line-height: 1.1; color: #fff;">
          Ms Jajini Susan Varghese
        </h1>
        
        <!-- Increased qualifications text size to 20px -->
        <div class="mb-4 label-caps" style="font-size: 20px; opacity: 0.9; color: #fff; letter-spacing: 0.05em;">
          MBBS, MPhil, PhD(Cantab) FRCS(Plast)
        </div>
        
        <!-- Increased description paragraph size to 18px and max-width to 680px -->
        <p class="mb-4" style="font-family: var(--font-body); font-size: 18px; line-height: 1.6; color: var(--color-text-muted); max-width: 680px; text-align: left; white-space: pre-line;">
          Consultant Plastic Surgeon and Breast Oncology Surgeon
          Clinical Lead Breast Surgery Services, Royal Free London NHS Trust
          Associate Professor, University College London
        </p>

        <!-- Added Book Consultation Link Button -->
        <div class="text-start">
          <a href="contact.php" class="btn btn-outline-premium">
            Book Consultation
          </a>
        </div>
      </div>
    </div>
    
    <!-- Centered scroll hint container -->
    <div class="position-absolute bottom-0 start-50 translate-middle-x mb-4 d-flex flex-column align-items-center gap-2 d-none d-lg-flex" style="z-index: 15;">
      <div class="scroll-hint-track" style="height: 32px;">
        <div class="scroll-hint-fill"></div>
      </div>
    </div>
</section>

  <!-- Section 1: Intro -->
 <section class="content-section" id="section-1" style="min-height: 100vh; display: flex; align-items: stretch; width: 100%;">
    <div class="container-fluid p-0 content-fade-in d-flex justify-content-start align-items-end pb-5 w-100">
      <div class="d-flex flex-column align-items-start text-start" style="padding-left: 0; margin-left: 0;">
        <p class="mb-4" style="font-family: var(--font-body); font-size: 18px; line-height: 1.65; color: var(--color-text); max-width: 740px; font-weight: 400; text-align: left;">
          Ms. Jajini Varghese is an award-winning, London-based plastic surgeon specialising in breast oncology surgery, oncoplastic breast surgery, breast reconstruction and aesthetic body surgery. She offers a discreet, highly personalised surgical service defined by precision and clinical excellence.
        </p>
        <a href="about.php" class="btn btn-outline-premium scroll-link">
          Discover Her Journey
        </a>
      </div>
    </div>
</section>

  <!-- Section 2: Ethos -->
<section class="content-section" id="section-2" style="min-height: 100vh; display: flex; align-items: stretch; width: 100%;">
    <div class="container-fluid p-0 content-fade-in d-flex justify-content-start align-items-end pb-5 w-100">
      <div class="d-flex flex-column align-items-start text-start" style="padding-left: 0; margin-left: 0;">
        <p class="mb-4" style="font-family: var(--font-body); font-size: 18px; line-height: 1.65; color: var(--color-text-muted); max-width: 740px; text-align: left;">
          Dual-qualified in both plastic surgery and breast cancer surgery, she seamlessly combines oncological safety with advanced reconstructive expertise. Ms Varghese delivers seamless breast care, reconstruction, and aesthetic refinement in a discreet, all-female setting.
        </p>
        <div class="d-flex align-items-center gap-3 mt-4">
          <span style="font-family: var(--font-body); font-size: 1rem; font-weight: 700; color: #fff;">HARLEY STREET &amp; LONDON</span>
          <span style="width: 3rem; height: 1px; background: #fff;"></span>
          <a href="procedures/breast-cancer/therapeutic-mammoplasty.php" class="label-caps text-white" style="font-size: 0.85rem;">VIEW SPECIALITIES</a>
        </div>
      </div>
    </div>
</section>





<section class="container-fluid mainContent home-about-section" id="section-4" style="padding-top: 30px;">
        <div class="container custom-container" id="section-4-content">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 m-auto">
                    <div class="section-title">
                        <p>Our One-Stop Breast Clinic is designed to provide rapid assessment, reassurance, and, where needed, timely onward care. During a single visit, you will have a consultation, expert clinical examination, state-of-the-art breast imaging, and, if required, a biopsy — all carried out in one place to minimise waiting and uncertainty.</p>
                        <div class="button-box d-flex mt-5">
                            <a href="diagnosis-and-prevention.php" class="link">
                                Diagnosis and prevention  <i class="fas fa-caret-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>






    <!-- section 5 -->
    <section class="container-fluid mainContent video-block">

        <div class="container custom-container">

            <div class="row">

                <div class="col-12">

                    <video src="video/about-in.mp4" autoplay="" playsinline="" muted="" loop=""></video>

                </div>

            </div>

        </div>

    </section>







    <!-- section 6 -->
    <section class="container-fluid mainContent gallery-section "  >

        <div class="container custom-container">

            <div class="row">

                <div class="col-12">

                    <div class="section-title">

                        <h2 class="title" data-aos="fade-up">“I offer care that is centred on compassion, clarity, and personalised treatment. I believe every patient should feel listened to, supported, and fully informed, with care tailored to their individual needs.”</h2>

                    </div>

                </div>

            </div>

        </div>



        <div class="dual-directional-image-sliders-with-lightbox">

            <!-- Top Slider -->

            <div class="owl-carousel owl-theme top-slider gallery-slider popup-gallery" data-aos="fade-up">

                <div class="slider-item"><a href="images/gallery-01.jpg"><img src="images/gallery-01.jpg"

                            alt="gallery"></a></div>

                <div class="slider-item"><a href="images/gallery-02.jpg"><img src="images/gallery-02.jpg"

                            alt="gallery"></a></div>

                <div class="slider-item"><a href="images/gallery-03.jpg"><img src="images/gallery-03.jpg"

                            alt="gallery"></a></div>

                <div class="slider-item"><a href="images/gallery-04.jpg"><img src="images/gallery-04.jpg"

                            alt="gallery"></a></div>

                <div class="slider-item"><a href="images/gallery-05.jpg"><img src="images/gallery-05.jpg"

                            alt="gallery"></a></div>

                <div class="slider-item"><a href="images/gallery-06.jpg"><img src="images/gallery-06.jpg"

                            alt="gallery"></a></div>

            </div>



            <!-- Bottom Slider -->

            <div class="owl-carousel owl-theme bottom-slider gallery-slider" data-aos="fade-up">

                <div class="slider-item">

                    <div class="text-block">

                        <a href="https://www.topdoctors.co.uk/doctor/jajini-varghese/all-reviews/" target="_blank"><p>"Ms Varghese was very professional, understanding and explained my illness well. She made me feel very valued as a patient and always allowed me the space to ask everything that I was worried about."<br>- Verified patient, Doctify 

                        </p></a>

                    </div>

                </div>

                <div class="slider-item"><a href="images/gallery-08.jpg"><img src="images/gallery-08.jpg"

                            alt="gallery"></a></div>

                <div class="slider-item">

                    <div class="text-block">

                        <a href="https://www.topdoctors.co.uk/doctor/jajini-varghese/all-reviews/" target="_blank"><p>"Dr Varghese was very kind and patient with me on top of being very knowledgeable and explaining everything in great detail. I would definitely recommend seeing her."- Verified patient, Doctify 

                        </p></a>

                    </div>

                </div>

                <div class="slider-item"><a href="images/gallery-09.jpg"><img src="images/gallery-09.jpg"

                            alt="gallery"></a></div>

                <div class="slider-item">

                    <div class="text-block">

                        <a href="https://www.topdoctors.co.uk/doctor/jajini-varghese/all-reviews/" target="_blank"><p>"Amazing doctor, her brilliant work aside, she is very cheerful and kind every time I see her... Super accommodating as well, I’m grateful to Dr Varghese for coming in to do my surgery during her time off."- Verified patient, Doctify 

                        </p></a>

                    </div>

                </div>

                <div class="slider-item"><a href="images/offer-sc.jpg"><img src="images/offer-sc.jpg"

                            alt="gallery"></a></div>



            </div>

        </div>





        <div class="content-block">

            <h3 class="title" data-aos="fade-up">“A cosmetic surgery operation should be a very positive and

                life-enhancing event. It is however a very personal choice and understandably, there are a number of

                questions that arise. It is also critical that patients are made fully aware of the expected outcome,

                recovery and risks.”</h3>



            <div class="button-box d-flex mt-5">

                <a href="https://jajini.digibeat.in/conditions/benign-breast-disease.php" class="link">

                    Conditions <i class="fas fa-caret-right"></i>

                </a>

            </div>

        </div>

    </section>





    <!-- section 7 -->
    <section class="container-fluid mainContent cta-section cta-sc-home" data-aos="fade-up">

        <div class="cta-wrap">

            <div class="bg-img">

                <img src="images/cta-background.jpg" alt="footer background">

            </div>

            <div class="cta-content">

                <div class="meta-block">

                    <div class="section-title">

                        <h2 class="title">Book a <br> Consultation</h2>

                    </div>

                    <p>Treat yourself to a beautiful appearance and <br>the self-confidence to match.</p>



                    <a class="cta-btn" href="#">Book a consultation <i><img src="images/btn-icon.svg" class="svg"

                                alt="call"></i></a>

                </div>



                <div class="meta-connect">

                    <h3>Send us a message or give us a call. <br> we're eager to help however we can!</h3>

                </div>

            </div>

        </div>

    </section>





    <!-- section 8 -->
    <section class="container-fluid mainContent offer-section" data-aos="fade-up">

        <div class="container custom-container">

            <div class="row align-center">

                <div class="col-12 col-sm-12 col-md-12 col-lg-6">

                    <div class="content-block">

                        <!-- <p>I offer care that is centred on compassion, clarity, and personalised treatment. I believe

                            every patient should feel listened to, supported, and fully informed, with care tailored to

                            their individual needs.</p> -->

                       <!--  <p>“As a female surgeon trained in both breast cancer and plastic surgery, I understand how

                            personal decisions around breast health and body image can be. I take time to explain all

                            surgical and reconstructive options clearly, so patients can make confident, informed

                            choices.”</p> -->

                      <!--   <p>Whether surgery is for medical or cosmetic reasons, I try and provide honest guidance,

                            realistic expectations, and thoughtful care, always focused on the wellbeing of the whole

                            person.</p> -->
                            <h3 class="title" data-aos="fade-up">“I understand how personal, decisions around breast health and body image can be. I take time to explain all surgical and reconstructive options clearly, so patients can make confident, informed choices.”</h3>
                             <div class="button-box d-flex mt-5">

                                <a href="#" class="link">

                                    Procedures <i class="fas fa-caret-right"></i>

                                </a>

                            </div>

                    </div>

                </div>

                <div class="col-12 col-sm-12 col-md-12 col-lg-6">

                    <div class="img-block">

                        <img src="images/offer-sc.jpg" alt="">

                    </div>

                </div>

            </div>

        </div>

    </section>









    <!-- section 9 -->
    <section class="container-fluid mainContent treatment-section" data-aos="fade-up">

        <div class="section-title text-center">

            <h2 class="title">Excellent outcomes with state-of-the <br> art techniques</h2>

        </div>

        <div class="treatment-slider-wrapper">

            <div class="owl-carousel owl-theme treatment-slider">

                <div class="slider-item">

                    <div class="treament-box">

                        <div class="treatment-bg-img"><img src="images/treatments/t1.png?v=<?php echo time(); ?>" alt=""></div>

                        <div class="text-block">Abscess incision and drainage</div>

                        <div class="icon"><img src="images/btn-icon.svg?v=<?php echo time(); ?>" class="svg" alt="links"></div>



                        <a href="#" class="anchor-link"></a>

                    </div>

                </div>

                <div class="slider-item">

                    <div class="treament-box">

                        <div class="treatment-bg-img"><img src="images/treatments/t2.png?v=<?php echo time(); ?>" alt=""></div>

                        <div class="text-block">Acellular dermal matrix</div>

                        <div class="icon"><img src="images/btn-icon.svg?v=<?php echo time(); ?>" class="svg" alt="links"></div>



                        <a href="#" class="anchor-link"></a>

                    </div>

                </div>

                <div class="slider-item">

                    <div class="treament-box">

                        <div class="treatment-bg-img"><img src="images/treatments/t3.png?v=<?php echo time(); ?>" alt=""></div>

                        <div class="text-block">Axillary clearance</div>

                        <div class="icon"><img src="images/btn-icon.svg?v=<?php echo time(); ?>" class="svg" alt="links"></div>



                        <a href="#" class="anchor-link"></a>

                    </div>

                </div>

                <div class="slider-item">

                    <div class="treament-box">

                        <div class="treatment-bg-img"><img src="images/treatments/t4.png?v=<?php echo time(); ?>" alt=""></div>

                        <div class="text-block">Breast augmentation (enlargement)</div>

                        <div class="icon"><img src="images/btn-icon.svg?v=<?php echo time(); ?>" class="svg" alt="links"></div>



                        <a href="#" class="anchor-link"></a>

                    </div>

                </div>

                <div class="slider-item">

                    <div class="treament-box">

                        <div class="treatment-bg-img"><img src="images/treatments/t5.png?v=<?php echo time(); ?>" alt=""></div>

                        <div class="text-block">Breast consultation</div>

                        <div class="icon"><img src="images/btn-icon.svg?v=<?php echo time(); ?>" class="svg" alt="links"></div>



                        <a href="#" class="anchor-link"></a>

                    </div>

                </div>

                <div class="slider-item">

                    <div class="treament-box">

                        <div class="treatment-bg-img"><img src="images/treatments/t6.png?v=<?php echo time(); ?>" alt=""></div>

                        <div class="text-block">Abscess incision and drainage</div>

                        <div class="icon"><img src="images/btn-icon.svg?v=<?php echo time(); ?>" class="svg" alt="links"></div>



                        <a href="#" class="anchor-link"></a>

                    </div>

                </div>

            </div>

        </div>



        <div class="button-box d-flex mt-5">

            <a href="#" class="link">

                View all treatments <i class="fas fa-caret-right"></i>

            </a>

        </div>

    </section>










    <!-- section 10 -->
    <section class="clients-say-section testimonial-parallax-root">

        <div class="content-container">

            <div class="section-title">

                <h2 class="title" data-aos="fade-up">Hear What Our Patients <br> Are Saying About Us</h2>

            </div>

            <div class="button-box d-flex">

                <a href="https://www.doctify.com/uk/specialist/jajini-varghese#reviews" class="link" target="_blank">

                    What Patients Share About Us <i class="fas fa-caret-right"></i>

                </a>

            </div>

            <div class="testimonial-block" data-aos="fade-up">

                <div class="testimonial">

                    <div class="icon"><img src="images/quotes.svg" class="svg" alt="quotes"></div>

                    <div class="quote">

                        It was an absolute pleasure being treated by Ms Varghese. After a previous botched breast

                        augmentation surgery . I am ecstatic with my new appearance . Not only is she an Incredibly

                        skilled surgeon. My results are beyond my wildest dreams . She is incredibly personable .

                    </div>

                    <div class="bottom-container">

                        <label class="name">J.G.</label>

                        <img src="images/logo-icon-color.svg" class="svg" alt="logo icon">

                    </div>

                </div>

            </div>

        </div>

        <div class="video-container" data-aos="fade-up">

            <div class="video-wrapper" style="position: relative; width: 100%; height: 100%;">

                <iframe id="testimonial-youtube-iframe" width="100%" height="100%" src="https://www.youtube.com/embed/rGlNQ9N92Lk?si=ZwZMxGXElbr2l78S&amp;start=148&amp;vq=hd1080&amp;enablejsapi=1&amp;" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: none;"></iframe>

            </div>

        </div>

    </section>







    <!-- section 11 -->
    <section class="container-fluid mainContent research-section">

        <div class="container custom-container">

            <div class="row">

                <div class="col-12">

                    <div class="section-title text-center">

                        <h2 class="title" data-aos="fade-up">Research & Publications</h2>

                    </div>

                </div>

            </div>



            <div class="row g-3">

                <div class="col-6 col-sm-6 col-md-3">

                    <a class="img-box" href="#"><img src="images/Pubmed-NCBI.svg" alt=""></a>

                </div>

                <div class="col-6 col-sm-6 col-md-3">

                    <a class="img-box" href="#"><img src="images/Google-Scholar.png" alt=""></a>

                </div>

                <div class="col-6 col-sm-6 col-md-3">

                    <a class="img-box" href="#"><img src="images/ORCHID.svg" alt=""></a>

                </div>

                <div class="col-6 col-sm-6 col-md-3">

                    <a class="img-box" href="#"><img src="images/ResearchGate.svg" alt=""></a>

                </div>

            </div>

        </div>

    </section>

</div>



<!-- CDNs for Three.js and Lenis -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@studio-freight/lenis@1.0.42/dist/lenis.min.js"></script>
<!-- Main Cinematic & Overhaul Controller -->
<script src="js/home-cinematic-v2.js?v=<?php echo time(); ?>"></script>


</main>

<!-- Main Content End  -->

<?php include 'footer.php' ;?>






