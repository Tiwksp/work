<?php
session_start();
if ($_SESSION['id'] != '') {
	include '../connect.php';
	$sql = "SELECT * FROM tb_member WHERE id_member = '{$_SESSION['id']}' ";
	$rs = $conn->query($sql)->fetch_assoc();
}
?>
<!DOCTYPE html>
<html class="no-js">

<head>
  
    <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="icon" href="favicon.ico">
        <title>Timer Agency Template</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content=""> -->
   
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Template CSS Files
        ================================================== -->
    <!-- Twitter Bootstrs CSS -->
    <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
    <!-- Ionicons Fonts Css -->
    <link rel="stylesheet" href="plugins/ionicons/ionicons.min.css">
    <!-- animate css -->
    <link rel="stylesheet" href="lugins/animate-css/animate.css">
    <!-- Hero area slider css-->
    <link rel="stylesheet" href="plugins/slider/slider.css">
    <!-- slick slider -->
    <link rel="stylesheet" href="plugins/slick/slick.css">
    <!-- Fancybox -->
    <link rel="stylesheet" href="plugins/facncybox/jquery.fancybox.css">
    <!-- hover -->
    <link rel="stylesheet" href="plugins/hover/hover-min.css">
    <!-- template main css file -->
    <link rel="stylesheet" href="../vsss.css">

    <!-- <link rel="stylesheet" href="../backend/assets/css/nav.css" /> -->

</head>

<body>

    <!--
        ==================================================
        Header Section Start
        ================================================== -->
<header>
    <?php include 'navbar.php' ?> 
   
</header>
    </section>

    <body>
        <!--
==================================================
Slider Section Start
================================================== -->
        <section id="hero-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="block wow fadeInUp" data-wow-delay=".3s">

                            <!-- Slider -->
                            <section class="cd-intro">
                                <h1 class="wow fadeInUp animated cd-headline slide" data-wow-delay=".4s">
                                    <span>เทศบาลตำบลบางเลน </span><br>
                                    <span class="cd-words-wrapper">
                                        <b class="is-visible">เว็บไซต์</b>
                                        <b>เเนะนำสถานที่ท่องเที่ยว</b>
                                        <b>เทศบาลตำบลบางเลน</b>
                                    </span>
                                </h1>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="works" class="works">
            <div class="container">
                <div class="section-heading">
                    <h1 class="title wow fadeInDown" data-wow-delay=".3s">สถานที่ท่องเที่ยวเเนะนำ</h1>
                    <!-- <p class="wow fadeInDown" data-wow-delay=".5s">
                Aliquam lobortis. Maecenas vestibulum mollis diam. Pellentesque auctor neque nec urna. Nulla sit amet est. Aenean posuere <br> tortor sed cursus feugiat, nunc augue blandit nunc, eu sollicitudin urna dolor sagittis lacus.
            </p> -->
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <figure class="wow fadeInLeft animated portfolio-item" data-wow-duration="500ms" data-wow-delay="0ms">
                            <div class="img-wrapper">
                                <img src="images/portfolio/item-1.jpg" class="img-fluid" alt="this is a title">
                                <div class="overlay">
                                    <div class="buttons">
                                        <a rel="gallery" class="fancybox" href="images/portfolio/item-1.jpg">Demo</a>
                                        <a target="_blank" href="single-portfolio.html">Details</a>
                                    </div>
                                </div>
                            </div>
                            <figcaption>
                                <h4>
                                    <a href="#">
                                        Dew Drop
                                    </a>
                                </h4>
                                <p>
                                    Redesigne UI Concept
                                </p>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <figure class="wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="300ms">
                            <div class="img-wrapper">
                                <img src="images/portfolio/item-2.jpg" class="img-fluid" alt="this is a title">
                                <div class="overlay">
                                    <div class="buttons">
                                        <a rel="gallery" class="fancybox" href="images/portfolio/item-2.jpg">Demo</a>
                                        <a target="_blank" href="single-portfolio.html">Details</a>
                                    </div>
                                </div>
                            </div>
                            <figcaption>
                                <h4>
                                    <a href="#">
                                        Bottle Mockup
                                    </a>
                                </h4>
                                <p>
                                    Lorem ipsum dolor sit.
                                </p>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <figure class="wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="300ms">
                            <div class="img-wrapper">
                                <img src="images/portfolio/item-3.jpg" class="img-fluid" alt="">
                                <div class="overlay">
                                    <div class="buttons">
                                        <a rel="gallery" class="fancybox" href="images/portfolio/item-3.jpg">Demo</a>
                                        <a target="_blank" href="single-portfolio.html">Details</a>
                                    </div>
                                </div>
                            </div>
                            <figcaption>
                                <h4>
                                    <a href="#">
                                        Table Design
                                    </a>
                                </h4>
                                <p>
                                    Lorem ipsum dolor sit amet.
                                </p>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <figure class="wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="600ms">
                            <div class="img-wrapper">
                                <img src="images/portfolio/item-4.jpg" class="img-fluid" alt="">
                                <div class="overlay">
                                    <div class="buttons">
                                        <a rel="gallery" class="fancybox" href="images/portfolio/item-4.jpg">Demo</a>
                                        <a target="_blank" href="single-portfolio.html">Details</a>
                                    </div>
                                </div>
                            </div>
                            <figcaption>
                                <h4>
                                    <a href="#">
                                        Make Up elements
                                    </a>
                                </h4>
                                <p>
                                    Lorem ipsum dolor.
                                </p>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <figure class="wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="900ms">
                            <div class="img-wrapper">
                                <img src="images/portfolio/item-5.jpg" class="img-fluid" alt="">
                                <div class="overlay">
                                    <div class="buttons">
                                        <a rel="gallery" class="fancybox" href="images/portfolio/item-5.jpg">Demo</a>
                                        <a target="_blank" href="single-portfolio.html">Details</a>
                                    </div>
                                </div>
                            </div>
                            <figcaption>
                                <h4>
                                    <a href="#">
                                        Shoping Bag Concept
                                    </a>
                                </h4>
                                <p>
                                    Lorem ipsum dolor.
                                </p>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <figure class="wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="1200ms">
                            <div class="img-wrapper">
                                <img src="images/portfolio/item-6.jpg" class="img-fluid" alt="">
                                <div class="overlay">
                                    <div class="buttons">
                                        <a rel="gallery" class="fancybox" href="images/portfolio/item-6.jpg">Demo</a>
                                        <a target="_blank" href="single-portfolio.html">Details</a>
                                    </div>
                                </div>
                            </div>
                            <figcaption>
                                <h4>
                                    <a href="#">
                                        Caramel Bottle
                                    </a>
                                </h4>
                                <p>
                                    Lorem ipsum dolor.
                                </p>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
        </section>
        <footer id="footer">
            <div class="container">
                <div class="row content-justify-between">
                    <div class="col-md-8 col-12 text-center text-lg-left text-md-left">

                    </div>
                    <div class="col-md-4 col-12">
                        <!-- Social Media -->
                        <ul class="social text-center text-md-right text-lg-right">
                            <li>
                                <a href="http://wwww.fb.com/themefisher" class="Facebook">
                                    <i class="ion-social-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="http://wwww.twitter.com/themefisher" class="Twitter">
                                    <i class="ion-social-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="Linkedin">
                                    <i class="ion-social-linkedin"></i>
                                </a>
                            </li>
                            <li>
                                <a href="http://wwww.fb.com/themefisher" class="Google Plus">
                                    <i class="ion-social-googleplus"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!-- jquery -->
        <script src="plugins/jQurey/jquery.min.js"></script>
        <!-- Form Validation -->
        <script src="plugins/form-validation/jquery.form.js"></script>
        <script src="plugins/form-validation/jquery.validate.min.js"></script>
        <!-- slick slider -->
        <script src="plugins/slick/slick.min.js"></script>
        <!-- bootstrap js -->
        <script src="plugins/bootstrap/bootstrap.min.js"></script>
        <!-- wow js -->
        <script src="plugins/wow-js/wow.min.js"></script>
        <!-- slider js -->
        <script src="plugins/slider/slider.js"></script>
        <!-- Fancybox -->
        <script src="plugins/facncybox/jquery.fancybox.js"></script>
        <!-- template main js -->
        <script src="js/main.js"></script>
    </body>

</html>