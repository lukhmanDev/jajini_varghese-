<?php include $_SERVER['DOCUMENT_ROOT'] . '/header.php'; ?>
<main>
    <nav class="pageTitle" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo $base_url; ?>index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Conditions</a></li>
            <li class="breadcrumb-item active" aria-current="page">Benign Breast Disease</li>
        </ol>
    </nav>

    <section class="container-fluid page-title-section conditions-single-page-title" data-bg-image="/images/conditions/benign-breast-disease.webp">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="title-block text-center">
                        <h1>Benign Breast Disease</h1>
                        <p>Understanding causes, symptoms, and treatment options</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container-fluid mainContent conditions-single-page-content treatment-page-content">
        <div class="container ">
            <div class="row">
                <div class="col-12">
                    <div class="content-block">
                        <h2>Benign Breast Disease</h2>
                        
                        <p>Benign breast disease refers to a group of non-cancerous conditions affecting the breast, such as lumps, cysts, breast pain, or nipple discharge. These conditions are very common and many women will experience some form of benign breast change during their lifetime.</p>
                        <p>Although these changes are not cancerous, symptoms such as discovering a breast lump or noticing unusual discharge can understandably cause significant anxiety. For this reason, prompt assessment and accurate diagnosis are important. Early evaluation allows patients either to receive reassurance quickly or, if necessary, to access further treatment without delay.</p>
                        <p>Many benign breast conditions require no treatment at all, while others may benefit from monitoring, medication, or minor procedures depending on the diagnosis and symptoms.</p>
                        <p>At the clinic, patients are assessed using a “triple assessment” approach, which combines clinical examination, breast imaging, and—where needed—a biopsy. This allows for a reliable and efficient diagnosis in a single visit wherever possible.</p>
                    </div>
                </div>
                    <div class="col-12">
                    <div class="faq-block">
                        <span class="sub-title">Clear answers to your most common questions</span>
                        <h3 class="title">Frequently Asked Question</h3>
                        <div class="accordion" id="faqAccordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-Q1" aria-expanded="true" aria-controls="faq-Q1">What symptoms should I get checked?</button>
                                </h2>
                                <div id="faq-Q1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p>You should seek medical advice if you notice:</p>
                                        <ul>
                                            <li>A new lump in the breast or armpit</li>
                                            <li>Breast pain that persists</li>
                                            <li>Changes in breast shape or size</li>
                                            <li>Skin changes on the breast</li>
                                            <li>Nipple discharge</li>
                                            <li>Nipple inversion or changes</li>
                                        </ul>
                                        <p>Most breast changes are benign, but <b>any new or unusual symptom should be assessed.</b></p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-Q2" aria-expanded="false" aria-controls="faq-Q2">How is benign breast disease diagnosed?</button>
                                </h2>
                                <div id="faq-Q2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p>If you have noticed a change in your breast, the clinic can offer a One-Stop breast assessment, allowing several tests to be carried out during the same visit.</p>
                                        <p>First, Ms Varghese will discuss your symptoms, medical history, and any concerns to gain a clear understanding of your situation. A clinical breast examination will then be performed.</p>
                                        <p>You may also have access to state-of-the-art imaging tests, including:</p>
                                        <ul>
                                            <li>Bilateral mammogram</li>
                                            <li>Breast ultrasound</li>
                                        </ul>
                                        <p>If necessary, a core biopsy may be performed during the same appointment. In many cases, this can provide a provisional diagnosis within minutes, significantly reducing waiting times and anxiety.</p>
                                        <p>This comprehensive approach allows results to be discussed with you as quickly as possible, and Ms Varghese will take the time to explain the findings and answer any questions you may have.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-Q3" aria-expanded="false" aria-controls="faq-Q3">What happens after the diagnosis?</button>
                                </h2>
                                <div id="faq-Q3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p>For most patients, a diagnosis of a <b>benign breast condition provides immediate reassurance and peace of mind</b>. Many benign conditions require no treatment and can simply be monitored.</p>
                                        <p>In some cases, treatment or follow-up may be recommended depending on the specific condition and your symptoms.</p>
                                        <p>Occasionally, investigations may identify breast cancer. While this can be unexpected, receiving a clear diagnosis quickly allows patients to access specialist care and treatment without delay, which often helps reduce uncertainty and anxiety.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container-fluid mainContent cta-section cta-sc-inner" data-aos="fade-up">
        <div class="cta-wrap">
            <div class="bg-img">
                <img src="/images/cta-background.jpg" alt="footer background">
            </div>
            <div class="cta-content">
                <div class="meta-block">
                    <div class="section-title">
                        <h2 class="title">Book a <br> Consultation</h2>
                    </div>
                    <p>Treat yourself to a beautiful appearance and <br>the self-confidence to match.</p>
                    <a class="cta-btn" href="<?php echo $base_url; ?>contact.php">Book a consultation <i><img src="/images/btn-icon.svg" class="svg" alt="call"></i></a>
                </div>
                <div class="meta-connect">
                    <h3>Send us a message or give us a call. <br> we're eager to help however we can!</h3>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/footer.php' ;?>