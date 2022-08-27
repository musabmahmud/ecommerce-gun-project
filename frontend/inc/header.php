<?php


//set headers to NOT cache a page
header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
header("Pragma: no-cache"); //HTTP 1.0
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
// Date in the past
//or, if you DO want a file to cache, use:
header("Cache-Control: max-age=2592000");
//30days (60sec * 60min * 24hours * 30days)


include '../lib/session.php';
Session::init();

include_once '../lib/database.php';
include_once '../lib/format.php';

$db = new Database();
$fm = new Format();

spl_autoload_register(function ($class) {
    include_once '../classes/' . $class . '.php';
});

$cat = new Category();
$brand = new Brand();
$front = new Frontend();
$cart = new Cart();
$shipping = new Shipping();
$customer = new Customer();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addToCart'])) {
    $insertCart = $cart->addToCart($_POST);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['deleteCart'])) {
    $deleteCart = $cart->deleteCart($_POST);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updateCart'])) {
    $deleteCart = $cart->updateCart($_POST);
}

$sId = session_id();
$carts = $cart->getCart($sId);

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
    <!--[if lt IE 9]-->
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <!--[endif]-->
</head>

<body>
    <!-- <div id="preloader">
        <div id="status"><img src="assets/images/logo/preloader.gif" id="preloader_image" alt="loader">
        </div>
    </div> -->
    <!--Preloader area End-->

    <!--Header area start here-->
    <header>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-12">
                    <div class="logo-area">
                        <a href="index.php"><img src="assets/images/logo/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-md-10 col-sm-10 hidden-xs">
                    <div class="main-header">
                        <div class="main-menus">
                            <nav>
                                <ul class="mamnu">
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="about.php">About</a></li>
                                    <li><a href="services.php">services</a></li>
                                    <li>
                                        <a href="#">pages</a>
                                        <ul>
                                            <li><a href="about.php">about</a></li>
                                            <li><a href="shop.php">shop</a></li>
                                            <li><a href="product-single.php">shop single</a></li>
                                            <li><a href="event.php">event</a></li>
                                            <li><a href="event-single.php">event-single</a></li>
                                            <li><a href="gallery.php">gallery</a></li>
                                            <li><a href="blog.php">blog</a></li>
                                            <li><a href="blog-single.php">blog single</a></li>
                                            <li><a href="contact.php">contact</a></li>

                                        </ul>
                                    </li>
                                    <li>
                                        <a href="shop.php">shop</a>
                                    </li>
                                    <li>
                                        <a href="blog.php">blog page</a>
                                    </li>
                                    <li><a href="contact.php">Contact</a></li>
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
                            <button><i class="fas fa-shopping-cart"></i> <span><?= $carts ? mysqli_num_rows($carts) : '0'; ?></span></button>
                            <div class="nav-shop-cart">
                                <div class="widget_shopping_cart_content">
                                    <?php
                                    if ($carts) {
                                        $i = 0;
                                        $perprice = 0;
                                        $subtotal = 0;
                                    ?>
                                        <ul class="product_list_widget">
                                            <?php
                                            foreach ($carts as $cartPd) {
                                                $i++;
                                            ?>
                                                <li class="cart_item">
                                                    <div class="mini_cart_item">
                                                        <a href="products.php?product-name=<?= $cartPd['slug']; ?>">
                                                            <img src="assets/images/products/<?= $cartPd['productImage']; ?>" alt="<?= $cartPd['productName']; ?>">
                                                            <p class="product-name"><?= $cartPd['productName']; ?></p>
                                                        </a>
                                                        <p class="quantity"><?= $cartPd['quantity']; ?> x
                                                            <strong class="Price-amount">$<?= $pricei = ($cartPd['productPrice'] != $cartPd['productOfferPrice'] ? $cartPd['productOfferPrice'] : $cartPd['productPrice']); ?></strong>
                                                        </p>
                                                    </div>
                                                    <form action="" method="post">
                                                        <input type="hidden" value="<?= $cartPd['cartId']; ?>" name="cartId">
                                                        <button type="submit" class="remove" title="Remove this item" name="deleteCart">x</button>
                                                    </form>
                                                </li>

                                            <?php
                                                $perprice = $pricei * $cartPd['quantity'];
                                                $subtotal = $perprice + $subtotal;
                                            } ?>
                                        </ul>
                                        <!-- /.product_list_widget -->
                                        <p class="total">
                                            <strong>Subtotal:</strong>
                                            <span class="amount">$<?= $subtotal; ?>
                                            </span>
                                        </p>
                                    <?php } ?>

                                    <p class="buttons">
                                        <a href="cart.php" class="btn1">View Cart</a>
                                        <a href="checkout.php" class="btn2">Checkout</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php
                        if (isset($_GET['action']) && $_GET['action'] == 'logout') {
                            session_destroy();
                            echo "<script>window.location = 'login.php';</script>";
                        }
                        ?>
                        <div class="sing-in-btn">
                            <?php if (isset($_SESSION['userLogin']) == false) { ?>
                                <a href="login.php" class="btn1">log in</a>
                            <?php
                            } else {
                            ?>
                                <a href="?action=logout" class="btn1">Logout</a>
                            <?php } ?>
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
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="services.php">services</a></li>
                        <li>
                            <a href="javascript:void(0)">pages</a>
                            <ul>
                                <li><a href="about.php">about</a></li>
                                <li><a href="shop.php">shop</a></li>
                                <li><a href="product-single.php">shop single</a></li>
                                <li><a href="event.php">event</a></li>
                                <li><a href="event-single.php">event-single</a></li>
                                <li><a href="gallery.php">gallery</a></li>
                                <li><a href="blog.php">blog</a></li>
                                <li><a href="blog-single.php">blog single</a></li>
                                <li><a href="contact.php">contact</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="shop.php">shop</a>
                        </li>
                        <li>
                            <a href="#">blog</a>
                            <ul>
                                <li><a href="blog.php">blog page</a></li>
                                <li><a href="blog-single.php">blog single</a></li>
                            </ul>
                        </li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <!--Responsive Menu area End-->
    </header>
    <!--Header area end here-->