<?php include 'header.php' ;?>

<!DOCTYPE html>
<html class="scroll-smooth" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Meet the Team | Stellar Medical</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&amp;family=Source+Serif+4:opsz,wght@8..60,400;600&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "primary": "#b06080", 
                        "background": "#fdf8f4", 
                        "surface": "#ffffff",
                        "on-background": "#1a1a1a",
                        "secondary": "#9c8449", 
                        "surface-variant": "#f4ede6",
                        "outline": "#d1c7bc",
                        "on-primary": "#ffffff",
                        "primary-container": "#fcebef",
                        "secondary-container": "#f1e9db"
                    },
                    "borderRadius": {
                        "DEFAULT": "0px", 
                        "lg": "0px",
                        "xl": "12px",
                        "2xl": "24px",
                        "full": "9999px"
                    },
                    "spacing": {
                        "unit": "8px",
                        "container-max-width": "1280px",
                        "margin-mobile": "24px",
                        "section-gap": "120px",
                        "gutter": "32px",
                        "margin-desktop": "64px"
                    },
                    "fontFamily": {
                        "body-lg": ["Manrope"],
                        "display-lg-mobile": ["Manrope"],
                        "display-lg": ["Manrope"],
                        "body-md": ["Manrope"],
                        "testimonial-quote": ["\"Source Serif 4\""],
                        "headline-md": ["Manrope"],
                        "label-sm": ["Manrope"]
                    },
                    "fontSize": {
                        "body-lg": ["20px", {"lineHeight": "32px", "fontWeight": "400"}],
                        "display-lg-mobile": ["40px", {"lineHeight": "48px", "letterSpacing": "-0.01em", "fontWeight": "700"}],
                        "display-lg": ["72px", {"lineHeight": "80px", "letterSpacing": "-0.04em", "fontWeight": "800"}],
                        "body-md": ["16px", {"lineHeight": "28px", "fontWeight": "400"}],
                        "testimonial-quote": ["28px", {"lineHeight": "42px", "fontWeight": "400"}],
                        "headline-md": ["32px", {"lineHeight": "40px", "fontWeight": "700"}],
                        "label-sm": ["14px", {"lineHeight": "18px", "letterSpacing": "0.1em", "fontWeight": "600"}]
                    }
                }
            }
        }
    </script>
    <style>
        .text-primary {
            color: #b06080 !important;
        }
        .border-primary {
            border-color: #b06080 !important;
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
            display: inline-block;
            vertical-align: middle;
        }
        .editorial-image-mask {
            clip-path: polygon(0 0, 100% 0, 100% 90%, 0 100%);
        }
        .text-overlap {
            text-shadow: 0 4px 12px rgba(253, 248, 244, 0.8);
        }
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;  
            overflow: hidden;
        }
    </style>
</head>
<body class="bg-background text-on-background font-body-md selection:bg-secondary/30 selection:text-primary">

    <main class="w-full overflow-hidden">
        
        <section class="relative pt-36 md:pt-48 pb-16 md:pb-24 px-6 md:px-12 max-w-[1280px] mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-0 items-center">
                <div class="col-span-12 lg:col-span-6 relative z-20">
                    <span class="font-label-sm text-label-sm text-secondary uppercase mb-4 md:mb-6 block">Meet Our Professionals</span>
                    <h1 class="font-display-lg text-4xl md:text-5xl lg:text-7xl text-primary mb-6 md:mb-10 leading-[1.05] lg:leading-[0.9] text-overlap font-extrabold">
                        Our Multi-Disciplinary <br class="hidden md:inline"/> Team
                    </h1>
                    <p class="font-body-lg text-base md:text-lg text-on-background/80 max-w-lg mb-8 md:mb-12 border-l-4 border-secondary pl-6 md:pl-8">
                        Leading experts committed to personalized, compassionate clinical care. We combine advanced research with human-centric empathy to redefine your healthcare journey.
                    </p>
                    <div class="flex gap-8 md:gap-12 border-t border-outline/30 pt-6 md:pt-8">
                        <div>
                            <span class="text-primary font-extrabold text-3xl md:text-[40px] block leading-none">15+</span>
                            <span class="text-xs md:text-label-sm font-label-sm text-secondary uppercase tracking-wider mt-1 block">Specialties</span>
                        </div>
                        <div>
                            <span class="text-primary font-extrabold text-3xl md:text-[40px] block leading-none">40+</span>
                            <span class="text-xs md:text-label-sm font-label-sm text-secondary uppercase tracking-wider mt-1 block">Expert Clinicians</span>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-6 mt-6 lg:mt-0 relative z-10">
                    <div class="editorial-image-mask overflow-hidden bg-surface-variant shadow-2xl rounded-2xl aspect-[4/3] lg:aspect-auto">
                        <img alt="Our medical leadership team posing in a bright clinical office setting" class="w-full h-full object-cover" src="images/gallery-08.jpg"/>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-16 md:py-32 bg-background px-6 md:px-12">
            <div class="max-w-[1280px] mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
                    <div class="col-span-12 lg:col-span-7 relative">
                        <div class="h-[300px] md:h-[500px] overflow-hidden shadow-xl rounded-2xl">
                            <img alt="Diverse medical staff members interacting in a modern hospital hallway" class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-700" src="images/philosophy-of-care-image.jpg"/>
                        </div>
                    </div>
                    <div class="col-span-12 lg:col-span-5 lg:-ml-20 z-20 bg-surface p-6 md:p-12 shadow-2xl border-t-8 border-secondary rounded-2xl">
                        <h2 class="font-headline-md text-2xl md:text-3xl text-primary font-bold mb-4 md:mb-6">Collaborative Medicine</h2>
                        <p class="font-body-md text-lg md:text-[22px] text-on-background/80 leading-relaxed mb-6">
                            Our One-Stop Breast Clinic is designed to provide rapid assessment, reassurance, and, where needed, timely onward care. During a single visit, you will have a consultation, expert clinical examination, state-of-the-art breast imaging, and, if required, a biopsy — all carried out in one place to minimise waiting and uncertainty.
                        </p>
                        <div class="flex flex-col gap-4">
                           
                            <div class="mt-4 pt-4 border-t border-outline/20">
                                <p class="font-label-sm text-xs md:text-label-sm text-secondary uppercase font-bold tracking-[0.2em]">Ms. Jajini Susan Varghese</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-16 md:py-32 px-6 md:px-12 bg-white">
            <div class="max-w-[1280px] mx-auto text-center mb-16 md:mb-24">
                <h2 class="font-headline-md text-2xl md:text-3xl font-bold text-primary uppercase tracking-tight mb-3">Practice Leadership</h2>
                <div class="w-24 h-1 bg-secondary mx-auto mb-4"></div>
                <p class="text-on-background/60 text-sm md:text-base max-w-xl mx-auto">The visionaries steering Stellar Medical's clinical excellence toward a new horizon of patient-centric care.</p>
            </div>
            
            <div class="max-w-[1280px] mx-auto grid grid-cols-1 md:grid-cols-3 gap-12 lg:gap-16">
                <div class="flex flex-col items-center text-center group">
                    <div class="w-48 h-48 md:w-64 md:h-64 rounded-full overflow-hidden mb-6 md:mb-10 border-[8px] md:border-[12px] border-surface-variant shadow-lg group-hover:border-secondary/20 transition-colors duration-500">
                        <img class="w-full h-full object-cover" src="images/about-main-02.jpg" alt="Dr. Elena Rodriguez"/>
                    </div>
                    <h3 class="font-headline-md text-xl md:text-[24px] text-primary font-bold mb-1">Dr. Elena Rodriguez</h3>
                    <p class="text-secondary font-bold text-xs md:text-label-sm uppercase tracking-widest mb-4">Chief Medical Officer</p>
                    <p class="font-body-md text-sm md:text-base text-on-background/60 mb-6 max-w-[280px] leading-relaxed">Expert in Health Systems Management and Internal Medicine with 20 years of clinical experience.</p>
                    <div class="flex gap-2">
                        <span class="text-[10px] font-bold uppercase px-3 py-1 bg-background text-primary tracking-wider rounded">MD, PhD</span>
                        <span class="text-[10px] font-bold uppercase px-3 py-1 bg-background text-primary tracking-wider rounded">FAHA</span>
                    </div>
                </div>
                
                <div class="flex flex-col items-center text-center group">
                    <div class="w-48 h-48 md:w-64 md:h-64 rounded-full overflow-hidden mb-6 md:mb-10 border-[8px] md:border-[12px] border-surface-variant shadow-lg group-hover:border-secondary/20 transition-colors duration-500">
                        <img class="w-full h-full object-cover" src="images/about-main-02.jpg" alt="Jameson Thorne"/>
                    </div>
                    <h3 class="font-headline-md text-xl md:text-[24px] text-primary font-bold mb-1">Jameson Thorne</h3>
                    <p class="text-secondary font-bold text-xs md:text-label-sm uppercase tracking-widest mb-4">Operations Director</p>
                    <p class="font-body-md text-sm md:text-base text-on-background/60 mb-6 max-w-[280px] leading-relaxed">Specializing in patient-centric workflow optimization and clinical technology implementation.</p>
                    <div class="flex gap-2">
                        <span class="text-[10px] font-bold uppercase px-3 py-1 bg-background text-primary tracking-wider rounded">MBA</span>
                        <span class="text-[10px] font-bold uppercase px-3 py-1 bg-background text-primary tracking-wider rounded">MHA</span>
                    </div>
                </div>
                
                <div class="flex flex-col items-center text-center group">
                    <div class="w-48 h-48 md:w-64 md:h-64 rounded-full overflow-hidden mb-6 md:mb-10 border-[8px] md:border-[12px] border-surface-variant shadow-lg group-hover:border-secondary/20 transition-colors duration-500">
                        <img class="w-full h-full object-cover" src="images/about-main-02.jpg" alt="Dr. Sarah Chen"/>
                    </div>
                    <h3 class="font-headline-md text-xl md:text-[24px] text-primary font-bold mb-1">Dr. Sarah Chen</h3>
                    <p class="text-secondary font-bold text-xs md:text-label-sm uppercase tracking-widest mb-4">Head of Clinical Research</p>
                    <p class="font-body-md text-sm md:text-base text-on-background/60 mb-6 max-w-[280px] leading-relaxed">Leading our integrative medicine research initiatives and evidence-based practice protocols.</p>
                    <div class="flex gap-2">
                        <span class="text-[10px] font-bold uppercase px-3 py-1 bg-background text-primary tracking-wider rounded">PhD</span>
                        <span class="text-[10px] font-bold uppercase px-3 py-1 bg-background text-primary tracking-wider rounded">INTEGRATIVE MED</span>
                    </div>
                </div>
            </div>
            
            <div class="mt-16 text-center">
                <a class="text-primary font-bold inline-flex items-center gap-3 hover:gap-5 transition-all group text-sm tracking-widest uppercase" href="#">
                    <span>View Organizational Chart</span>
                    <span class="material-symbols-outlined text-secondary">arrow_forward</span>
                </a>
            </div>
        </section>

        




    


    </main>

    <?php include 'footer.php' ;?>

    
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const thumbs = document.querySelectorAll('.video-thumb-btn');
            const player = document.getElementById('testimonial-youtube-iframe');
            const authOut = document.getElementById('main-video-author');
            const dateOut = document.getElementById('main-video-date');
            const quoteOut = document.getElementById('main-video-quote');
            const descOut = document.getElementById('main-video-desc');

            if (!thumbs.length || !player) return;

            thumbs.forEach(btn => {
                btn.addEventListener('click', function () {
                    thumbs.forEach(t => {
                        t.classList.remove('border-primary', 'border-2', 'active');
                        t.classList.add('border-outline/30');
                    });

                    this.classList.remove('border-outline/30');
                    this.classList.add('border-primary', 'border-2', 'active');

                    player.setAttribute('src', this.getAttribute('data-video-url'));
                    authOut.textContent = this.getAttribute('data-author');
                    dateOut.textContent = this.getAttribute('data-date');
                    quoteOut.textContent = this.getAttribute('data-quote');
                    descOut.textContent = this.getAttribute('data-desc');
                });
            });
        });
    </script>
</body>
</html>

