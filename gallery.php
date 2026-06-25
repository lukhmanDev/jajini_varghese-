<?php include 'header.php' ;?>
<!-- Main Content Start  -->
<main>
    <nav class="pageTitle" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Gallery</li>
        </ol>
    </nav>

    <section class="container-fluid page-title-section">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="title-block text-center">
                        <h1>Before & After Gallery </h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container-fluid mainContent faq-page-content">
        <div class="container">
            <div class="row g-4">
                <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="before-after-item">
                        <div class="twentytwenty-container">
                            <img src="images/treatments/therapeutic-mammoplasty/client-1-before.jpg" loading="lazy" width="550" height="550" />
                            <img src="images/treatments/therapeutic-mammoplasty/client-1-after.jpg" loading="lazy" width="550" height="550" />
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="before-after-item">
                        <div class="twentytwenty-container">
                            <img src="images/treatments/therapeutic-mammoplasty/client-2-before.jpg" loading="lazy" width="550" height="550" />
                            <img src="images/treatments/therapeutic-mammoplasty/client-2-after.jpg" loading="lazy" width="550" height="550" />
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="before-after-item">
                        <div class="twentytwenty-container">
                            <img src="images/treatments/therapeutic-mammoplasty/client-1-before.jpg" loading="lazy" width="550" height="550" />
                            <img src="images/treatments/therapeutic-mammoplasty/client-1-after.jpg" loading="lazy" width="550" height="550" />
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="before-after-item">
                        <div class="twentytwenty-container">
                            <img src="images/treatments/therapeutic-mammoplasty/client-2-before.jpg" loading="lazy" width="550" height="550" />
                            <img src="images/treatments/therapeutic-mammoplasty/client-2-after.jpg" loading="lazy" width="550" height="550" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
<!-- Main Content End  -->

<!-- event.move plugin -->
<script src="plugins/twentytwenty/js/jquery.event.move.js"></script>

<!-- twentytwenty plugin -->
<script src="plugins/twentytwenty/js/jquery.twentytwenty.js"></script>
<script>
$(function(){
  $(".twentytwenty-container").twentytwenty({
    default_offset_pct: 0.5,
  });
});
</script>
<?php include 'footer.php' ;?>