<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Alfa Poly Plast </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Global site tag (gtag.js) - Google Analytics -->

        <link rel="apple-touch-icon" href="<?php echo site_url("assets/images/favicon.png"); ?>">
        <link rel="shortcut icon" href="<?php echo site_url("assets/images/favicon.png"); ?>">

        <!-- CSS FILES HERE -->
        <!-- inject:css -->
        <link rel="stylesheet" href="<?php echo site_url("assets/css/vendors/plugins.min.css"); ?>">
        <link rel="stylesheet" href="<?php echo site_url("assets/css/style.css"); ?>">
        <!-- endinject -->
        
    </head>

    <body>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Preloader -->
        <div class="tm-preloader">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="tm-preloader-logo">
                            <img src="<?php echo site_url("assets/images/alfalogoloader.png"); ?>" alt="logo">
                        </div>
                        <span class="tm-preloader-progress"></span>
                    </div>
                </div>
            </div>
            <!--<button class="tm-button tm-button-small">Cancel Preloader</button>-->
        </div>
        <!--// Preloader -->

        <!-- Wrapper -->
        <div id="wrapper" class="wrapper">

            <!-- Header -->
            <header id="header">
                <div class="tm-header tm-header-sticky">

                    <div class="tm-header-toparea">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-8 col-12">
                                    <ul class="tm-header-info">
                                        <!--<li>FREE shipping over $50 </li>-->
                                        <li><a href="tel:022 23414800"><i class="ion-ios-telephone"></i>022 23414800</a></li>
                                        <li><a href="mailto:contact@example.com"><i
                                                    class="ion-android-mail"></i>info@alfapolyplast.com</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <ul class="tm-header-icons">
                                        <li><a data-toggle="modal" data-target="#exampleModal" href="#">Quick Quote</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tm-header-bottomarea">
                        <div class="container">
                            <div class="tm-header-inner">
                                <a href="index.php" class="tm-header-logo">
                                    <img src="<?php echo site_url("assets/images/alfalogonormal.png"); ?>" alt="malic">
                                </a>
                                <nav class="tm-header-nav">
                                    <ul>
                                        <li><a href="index.php">Home</a></li>
                                        <li class="tm-header-nav-dropdown"><a href="#">Categories</a>
                                            <ul>  
                                            <?php foreach($allCategories as $category): ?>
                                                <li><a href="<?php echo site_url("category/".$category['slug']); ?>"><?php echo $category['title']; ?></a></li>
                                            <?php endforeach; ?> 
                                            </ul>
                                        </li>
                                        <?php $session = session(); if ($session->get("role")=="customer"): ?>
                                        <li><a href="<?php echo site_url("my-account"); ?>">My Account</a></li>
                                        <?php else: ?>
                                        <li><a href="<?php echo site_url("login"); ?>">Login</a></li>
                                        <?php endif; ?>
                                        <li><a href="<?php echo site_url("cart"); ?>">Cart</a></li>
                                    </ul>
                                </nav>
                                <!--<ul class="tm-header-utils">
                                    <li>
                                        <button class="tm-header-searchtrigger"><i class="ion-android-search"></i></button>
                                        <form class="tm-header-searchform" action="#">
                                            <input type="text" placeholder="Search">
                                            <button type="submit"><i class="ion-android-search"></i></button>
                                        </form>
                                    </li>
                                    <li><a href="cart.html"><i class="ion-android-cart"></i></a></li>
                                </ul>-->
                                <div class="tm-mobilenav"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </header>
            <!--// Header -->