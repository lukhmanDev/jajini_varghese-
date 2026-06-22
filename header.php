<?php
// This ensures all links and assets point to the absolute root dynamically
$protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https' : 'http';
$doc_root = rtrim(str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']), '/');
$dir_path = rtrim(str_replace('\\', '/', __DIR__), '/');
$base_dir = '';
if (stripos($dir_path, $doc_root) === 0) {
    $base_dir = substr($dir_path, strlen($doc_root));
}
$base_url = $protocol . '://' . $_SERVER['HTTP_HOST'] . '/' . ltrim($base_dir, '/') . '/';
$base_url = preg_replace('/([^:])\/{2,}/', '$1/', $base_url);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ms Jajini Varghese</title>
    <link rel="shortcut icon" href="<?php echo $base_url; ?>images/favicon.ico" type="image/x-icon">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300..700;1,300..700&family=Google+Sans:ital,opsz,wght@0,17..18,400..700;1,17..18,400..700&family=Inter:wght@300..700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="<?php echo $base_url; ?>plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>plugins/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>plugins/aos/aos.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>plugins/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>plugins/twentytwenty/css/twentytwenty.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>plugins/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="<?php echo $base_url; ?>css/theme-style.min.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="<?php echo $base_url; ?>style.css?v=<?php echo time(); ?>">
    <?php if (basename($_SERVER['SCRIPT_NAME']) == 'index.php' || basename($_SERVER['PHP_SELF']) == 'index.php'): ?>
        <link rel="stylesheet" href="<?php echo $base_url; ?>css/home-cinematic.css?v=<?php echo time(); ?>">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
    <?php endif; ?>
    
    <script src="<?php echo $base_url; ?>js/jquery-3.6.1.min.js"></script>
</head>
<body>
    <header class="<?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'main-header' : 'inner-header'; ?>">
        <nav class="navbar">
            <div class="custom-container">
                <div class="header-row">
                    <div class="logo">
                        <a href="<?php echo $base_url; ?>index.php">
                            <img src="<?php echo $base_url; ?>images/logo.svg" alt="Site Logo">
                        </a>
                    </div>
                    <div class="main-menu">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a class="nav-link" href="<?php echo $base_url; ?>index.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo $base_url; ?>about.php">About</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo $base_url; ?>diagnosis-and-prevention.php">Diagnosis</a></li>
                            
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#">Conditions <i><img class="svg" src="<?php echo $base_url; ?>images/menu-down-arrow.svg" alt="Down Arrow"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="<?php echo $base_url; ?>conditions/benign-breast-disease.php">Benign Breast Disease</a></li>
                                    <li><a class="dropdown-item" href="<?php echo $base_url; ?>conditions/breast-cancer.php">Breast Cancer</a></li>
                                    <li><a class="dropdown-item" href="<?php echo $base_url; ?>conditions/fibroadenoma.php">Fibroadenoma</a></li>
                                    <li><a class="dropdown-item" href="<?php echo $base_url; ?>conditions/capsular-contracture.php">Capsular Contracture</a></li>
                                    <li><a class="dropdown-item" href="<?php echo $base_url; ?>conditions/breast-cysts.php">Breast Cysts</a></li>
                                    <li><a class="dropdown-item" href="<?php echo $base_url; ?>conditions/mastalgia.php">Mastalgia</a></li>
                                    <li><a class="dropdown-item" href="<?php echo $base_url; ?>conditions/mastitis.php">Mastitis</a></li>
                                    <li><a class="dropdown-item" href="<?php echo $base_url; ?>conditions/dense-breasts.php">Dense Breasts</a></li>
                                    <li><a class="dropdown-item" href="<?php echo $base_url; ?>conditions/breast-asymmetry.php">Breast Asymmetry</a></li>
                                    <li><a class="dropdown-item" href="<?php echo $base_url; ?>conditions/tuberous-breasts.php">Tuberous Breasts</a></li>
                                </ul>
                            </li>
                            
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#">Procedures <i><img class="svg" src="<?php echo $base_url; ?>images/menu-down-arrow.svg" alt="Down Arrow"></i></a>
                                <ul class="dropdown-menu">
                                    <li class="sub-dropdown">
                                        <a class="dropdown-item" href="#">Breast Cancer</a>
                                        <ul class="sub-dropdown-menu">
                                            <li><a class="dropdown-item" href="<?php echo $base_url; ?>procedures/breast-cancer/therapeutic-mammoplasty.php">Therapeutic Mammoplasty</a></li>
                                            <li><a class="dropdown-item" href="<?php echo $base_url; ?>procedures/breast-cancer/breast-conserving-surgery.php">Breast Conserving Surgery</a></li>
                                            <li><a class="dropdown-item" href="<?php echo $base_url; ?>procedures/breast-cancer/mastectomy-reconstructive-options.php">Mastectomy and Reconstructive Options</a></li>
                                            <li><a class="dropdown-item" href="<?php echo $base_url; ?>procedures/breast-cancer/chest-wall-perforator-flaps.php">Chest Wall Perforator Flaps</a></li>
                                        </ul>
                                    </li>
                                    <li class="sub-dropdown">
                                        <a class="dropdown-item" href="#">Breast Cosmetic</a>
                                        <ul class="sub-dropdown-menu">
                                            <li><a class="dropdown-item" href="<?php echo $base_url; ?>procedures/breast-cosmetic/fat-transfer-lipomodelling.php">Fat Transfer or Lipomodelling</a></li>
                                            <li><a class="dropdown-item" href="<?php echo $base_url; ?>procedures/breast-cosmetic/breast-augmentation.php">Breast Augmentation</a></li>
                                            <li><a class="dropdown-item" href="<?php echo $base_url; ?>procedures/breast-cosmetic/mastopexy-breast-lift.php">Mastopexy - Breast Lift</a></li>
                                            <li><a class="dropdown-item" href="<?php echo $base_url; ?>procedures/breast-cosmetic/breast-implant-removal.php">Breast Implant Removal</a></li>
                                            <li><a class="dropdown-item" href="<?php echo $base_url; ?>procedures/breast-cosmetic/breast-reduction.php">Breast Reduction</a></li>
                                        </ul>
                                    </li>
                                    <li><a class="dropdown-item" href="<?php echo $base_url; ?>procedures/implant-exchange.php">Implant Exchange</a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo $base_url; ?>faq.php">FAQ</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo $base_url; ?>gallery.php">Gallery</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo $base_url; ?>contact.php">Contact</a></li>
                        </ul>
                    </div>
                    <div class="other-menu">
                        <a href="<?php echo $base_url; ?>contact.php" class="cta-btn">Schedule a Consult <i><img src="<?php echo $base_url; ?>images/btn-icon.svg" class="svg" alt="call"></i></a>
                        <a class="navbar-toggler" data-bs-toggle="offcanvas" href="#navbarOffcanvas" role="button" aria-controls="navbarOffcanvas">
                            <span class="burger-menu">
                                <span class="top-bar"></span>
                                <span class="middle-bar"></span>
                                <span class="bottom-bar"></span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="responsive-menu offcanvas offcanvas-end" tabindex="-1" id="navbarOffcanvas">
        <div class="offcanvas-header mobile-menu-header">
            <div class="mobile-logo">
                <a href="<?php echo $base_url; ?>index.php"><img src="<?php echo $base_url; ?>images/logo.svg" alt="Site Logo"></a>
            </div>
            <button type="button" class="close-btn" data-bs-dismiss="offcanvas">
                <img src="<?php echo $base_url; ?>images/close.svg" class="svg" alt="Close Button">
            </button>
        </div>
        <div class="offcanvas-body main-menu">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="<?php echo $base_url; ?>index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo $base_url; ?>about.php">About</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo $base_url; ?>diagnosis-and-prevention.php">Diagnosis</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link menu-toggle" href="#">Conditions <i><img class="svg" src="<?php echo $base_url; ?>images/menu-down-arrow.svg" alt="Down Arrow"></i></a>
                    <ul class="dropdown-menu" style="display: none">
                        <li><a class="dropdown-item" href="<?php echo $base_url; ?>conditions/benign-breast-disease.php">Benign breast disease</a></li>
                        <li><a class="dropdown-item" href="<?php echo $base_url; ?>conditions/breast-cancer.php">Breast cancer</a></li>
                        </ul>
                </li>
            </ul>
        </div>
        <a href="<?php echo $base_url; ?>contact.php" class="cta-btn">Schedule a Consult <i><img src="<?php echo $base_url; ?>images/btn-icon.svg" class="svg" alt="call"></i></a>
    </div>