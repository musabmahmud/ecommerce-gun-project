<?php
//set headers to NOT cache a page
header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
header("Pragma: no-cache"); //HTTP 1.0
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
// Date in the past
//or, if you DO want a file to cache, use:
header("Cache-Control: max-age=2592000");
//30days (60sec * 60min * 24hours * 30days)
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Theme Title-->
    <title>Gun Shop HTML Template By MD Musab Mahmud</title>
    <meta name="description" content="">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/icon" href="favicon.png" />

    <!-- All css Here -->
    <!-- All plugins css -->
    <link rel="stylesheet" href="assets/css/allplugins.css">
    <!-- Style css -->
    <link rel="stylesheet" href="assets/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="assets/css/responsive.css">

    <!-- Customization css -->
    <!--If u need any change then use this css file-->
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Modernizr JavaScript -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
</head>

<body>
    <div id="preloader">
        <div id="status"><img src="assets/images/logo/preloader.gif" id="preloader_image" alt="loader">
        </div>
    </div>
    <!--Preloader area End-->

    <!--Header area start here-->
    <header>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-12">
                    <div class="logo-area">
                        <a href="index.html"><img src="assets/images/logo/logo.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-md-10 col-sm-10 hidden-xs">
                    <div class="main-header">
                        <div class="main-menus">
                            <nav>
                                <ul class="mamnu">
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="about.html">About</a></li>
                                    <li><a href="services.html">services</a></li>
                                    <li>
                                        <a href="#">pages</a>
                                        <ul>
                                            <li><a href="about.html">about</a></li>
                                            <li><a href="shop.html">shop</a></li>
                                            <li><a href="product-single.html">shop single</a></li>
                                            <li><a href="event.html">event</a></li>
                                            <li><a href="event-single.html">event-single</a></li>
                                            <li><a href="gallery.html">gallery</a></li>
                                            <li><a href="blog.html">blog</a></li>
                                            <li><a href="blog-single.html">blog single</a></li>
                                            <li><a href="contact.html">contact</a></li>

                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">shop</a>
                                        <ul>
                                            <li><a href="shop.html">shop page</a></li>
                                            <li><a href="product-single.html">shop single</a></li>

                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">blog</a>
                                        <ul>
                                            <li><a href="blog.html">blog page</a></li>
                                            <li><a href="blog-single.html">blog single</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="serach-header">
                            <button class="searchd"><i class="fas fa-search"></i></button>
                            <div class="searchbox">
                                <button class="close">×</button>
                                <form>
                                    <input type="search" placeholder="Search …">
                                    <button type="submit"><i class="fas fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="cart-head">
                            <button><i class="fas fa-shopping-cart"></i></button>
                            <div class="nav-shop-cart">
                                <div class="widget_shopping_cart_content">
                                    <ul class="product_list_widget ">
                                        <li class="mini_cart_item">

                                            <a href="#">
                                                <img src="assets/images/products/5.jpg" alt="" />
                                                <p class="product-name">Shop Item 01</p>
                                            </a>

                                            <p class="quantity">1 x
                                                <strong class="Price-amount">$200.00</strong>
                                            </p>

                                            <a href="#" class="remove" title="Remove this item">x</a>
                                        </li>
                                        <li class="mini_cart_item">

                                            <a href="#">
                                                <img src="assets/images/products/6.jpg" alt="" />
                                                <p class="product-name">Shop Item 01</p>
                                            </a>

                                            <p class="quantity">1 x
                                                <strong class="Price-amount">$200.00</strong>
                                            </p>

                                            <a href="#" class="remove" title="Remove this item">x</a>
                                        </li>
                                        <li class="mini_cart_item">

                                            <a href="#">
                                                <img src="assets/images/products/7.jpg" alt="" />
                                                <p class="product-name">Shop Item 01</p>
                                            </a>

                                            <p class="quantity">1 x
                                                <strong class="Price-amount">$200.00</strong>
                                            </p>

                                            <a href="#" class="remove" title="Remove this item">x</a>
                                        </li>
                                    </ul>
                                    <!-- /.product_list_widget -->

                                    <p class="total">
                                        <strong>Subtotal:</strong>
                                        <span class="amount">$300.00
                                        </span>
                                    </p>

                                    <p class="buttons">
                                        <a href="" class="btn1">View Cart</a>
                                        <a href="" class="btn2">Checkout</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="sing-in-btn">
                            <a href="#" class="btn1">Sign in</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Responsive Menu area-->
        <div class="mobilemenu">
            <div class="mobile-menu visible-xs">
                <nav>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="services.html">services</a></li>
                        <li>
                            <a href="javascript:void(0)">pages</a>
                            <ul>
                                <li><a href="about.html">about</a></li>
                                <li><a href="shop.html">shop</a></li>
                                <li><a href="product-single.html">shop single</a></li>
                                <li><a href="event.html">event</a></li>
                                <li><a href="event-single.html">event-single</a></li>
                                <li><a href="gallery.html">gallery</a></li>
                                <li><a href="blog.html">blog</a></li>
                                <li><a href="blog-single.html">blog single</a></li>
                                <li><a href="contact.html">contact</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">shop</a>
                            <ul>
                                <li><a href="shop.html">shop page</a></li>
                                <li><a href="product-single.html">shop single</a></li>

                            </ul>
                        </li>
                        <li>
                            <a href="#">blog</a>
                            <ul>
                                <li><a href="blog.html">blog page</a></li>
                                <li><a href="blog-single.html">blog single</a></li>
                            </ul>
                        </li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <!--Responsive Menu area End-->
    </header>
    <!--Header area end here-->