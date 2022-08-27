<?php
include '../lib/session.php';
Session::checkSession();
//set headers to NOT cache a page
header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
header("Pragma: no-cache"); //HTTP 1.0
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
// Date in the past
//or, if you DO want a file to cache, use:
header("Cache-Control: max-age=2592000");
//30days (60sec * 60min * 24hours * 30days)
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Twitter -->
  <meta name="twitter:site" content="@themepixels">
  <meta name="twitter:creator" content="@themepixels">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Starlight">
  <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
  <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

  <!-- Facebook -->
  <meta property="og:url" content="http://themepixels.me/starlight">
  <meta property="og:title" content="Starlight">
  <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

  <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
  <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
  <meta property="og:image:type" content="image/png">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="600">

  <!-- Meta -->
  <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
  <meta name="author" content="ThemePixels">

  <title>Starlight Responsive Bootstrap 4 Admin Template</title>

  <!-- vendor css -->
  <link href="assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
  <link href="assets/lib/Ionicons/css/ionicons.css" rel="stylesheet">
  <link href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
  <link href="assets/lib/highlightjs/github.css" rel="stylesheet">
  <link href="assets/lib/datatables/jquery.dataTables.css" rel="stylesheet">
  <link href="assets/lib/select2/css/select2.min.css" rel="stylesheet">
  <link href="assets/lib/rickshaw/rickshaw.min.css" rel="stylesheet">

  <!-- Starlight CSS -->
  <link rel="stylesheet" href="assets/css/starlight.css">
</head>

<body>

  <!-- ########## START: LEFT PANEL ########## -->
  <div class="sl-logo"><a href=""><i class="icon ion-android-star-outline"></i> starlight</a></div>
  <div class="sl-sideleft">
    <div class="input-group input-group-search">
      <input type="search" name="search" class="form-control" placeholder="Search">
      <span class="input-group-btn">
        <button class="btn"><i class="fa fa-search"></i></button>
      </span><!-- input-group-btn -->
    </div><!-- input-group -->

    <?php $activePage = basename($_SERVER['PHP_SELF'], ".php"); ?>

    <label class="sidebar-label">Navigation</label>
    <div class="sl-sideleft-menu">
      <a href="dashboard.php" class="sl-menu-link <?= ($activePage == 'dashboard') ? 'active' : ''; ?>">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
          <span class="menu-item-label">Dashboard</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->


      <a href="#" class="sl-menu-link <?= ($activePage == 'product' || $activePage == 'productCreate' || $activePage == 'productEdit' || $activePage == 'productUpdate' || $activePage == 'productTrash') ? 'active show-sub' : ''; ?>">
        <div class="sl-menu-item">
          <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
          <span class="menu-item-label">Products</span>
          <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="product.php" class="nav-link <?= ($activePage == 'product') ? 'active' : ''; ?>">Products</a></li>
        <li class="nav-item"><a href="productCreate.php" class="nav-link <?= ($activePage == 'productCreate') ? 'active' : ''; ?>">Product Create</a></li>
        <li class="nav-item"><a href="productTrash.php" class="nav-link <?= ($activePage == 'productTrash') ? 'active' : ''; ?>">Product Trash</a></li>
      </ul>

      <a href="#" class="sl-menu-link <?= ($activePage == 'slider' || $activePage == 'sliderCreate' || $activePage == 'sliderEdit' || $activePage == 'sliderUpdate' || $activePage == 'sliderTrash') ? 'active show-sub' : ''; ?>">
        <div class="sl-menu-item">
          <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
          <span class="menu-item-label">Slider</span>
          <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="slider.php" class="nav-link <?= ($activePage == 'slider') ? 'active' : ''; ?>">Slider</a></li>
        <li class="nav-item"><a href="sliderCreate.php" class="nav-link <?= ($activePage == 'sliderCreate') ? 'active' : ''; ?>">Slider Create</a></li>
        <li class="nav-item"><a href="sliderTrash.php" class="nav-link <?= ($activePage == 'sliderTrash') ? 'active' : ''; ?>">Slider Trash</a></li>
      </ul>
      
      <a href="#" class="sl-menu-link <?= ($activePage == 'shipping' || $activePage == 'shippingCreate' || $activePage == 'shippingEdit' || $activePage == 'shippingUpdate' || $activePage == 'shippingTrash') ? 'active show-sub' : ''; ?>">
        <div class="sl-menu-item">
          <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
          <span class="menu-item-label">Shipping</span>
          <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="shipping.php" class="nav-link <?= ($activePage == 'shipping') ? 'active' : ''; ?>">Shipping</a></li>
        <li class="nav-item"><a href="shippingCreate.php" class="nav-link <?= ($activePage == 'shippingCreate') ? 'active' : ''; ?>">Shipping Create</a></li>
        <li class="nav-item"><a href="shippingTrash.php" class="nav-link <?= ($activePage == 'shippingTrash') ? 'active' : ''; ?>">Shipping Trash</a></li>
      </ul>


      <a href="#" class="sl-menu-link <?= ($activePage == 'brand' || $activePage == 'brandCreate' || $activePage == 'brandEdit' || $activePage == 'brandUpdate' || $activePage == 'brandTrash') ? 'active show-sub' : ''; ?>">
        <div class="sl-menu-item">
          <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
          <span class="menu-item-label">Brands</span>
          <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="brand.php" class="nav-link <?= ($activePage == 'brand') ? 'active' : ''; ?>">Brands</a></li>
        <li class="nav-item"><a href="brandCreate.php" class="nav-link <?= ($activePage == 'brandCreate') ? 'active' : ''; ?>">Brand Create</a></li>
        <li class="nav-item"><a href="brandTrash.php" class="nav-link <?= ($activePage == 'brandTrash') ? 'active' : ''; ?>">Brand Trash</a></li>
      </ul>


      <a href="#" class="sl-menu-link <?= ($activePage == 'category' || $activePage == 'categoryCreate' || $activePage == 'categoryEdit' || $activePage == 'categoryUpdate' || $activePage == 'categoryTrash') ? 'active show-sub' : ''; ?>">
        <div class="sl-menu-item">
          <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
          <span class="menu-item-label">Categories</span>
          <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="category.php" class="nav-link <?= ($activePage == 'category') ? 'active' : ''; ?>">Categories</a></li>
        <li class="nav-item"><a href="categoryCreate.php" class="nav-link <?= ($activePage == 'categoryCreate') ? 'active' : ''; ?>">Category Create</a></li>
        <li class="nav-item"><a href="categoryTrash.php" class="nav-link <?= ($activePage == 'categoryTrash') ? 'active' : ''; ?>">Category Trash</a></li>
      </ul>
      <a href="mailbox.php" class="sl-menu-link">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
          <span class="menu-item-label">Mailbox</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <a href="#" class="sl-menu-link">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon ion-ios-paper-outline tx-22"></i>
          <span class="menu-item-label">Pages</span>
          <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="blank.php" class="nav-link">Blank Page</a></li>
        <li class="nav-item"><a href="page-signin.php" class="nav-link">Signin Page</a></li>
        <li class="nav-item"><a href="page-signup.php" class="nav-link">Signup Page</a></li>
        <li class="nav-item"><a href="page-notfound.php" class="nav-link">404 Page Not Found</a></li>
      </ul>
    </div><!-- sl-sideleft-menu -->

    <br>
  </div><!-- sl-sideleft -->
  <!-- ########## END: LEFT PANEL ########## -->

  <!-- ########## START: HEAD PANEL ########## -->
  <div class="sl-header">
    <div class="sl-header-left">
      <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
      <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
    </div><!-- sl-header-left -->
    <div class="sl-header-right">
      <nav class="nav">
        <div class="dropdown">
          <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
            <span class="logged-name"><?= $_SESSION['adminUser'] ?><span class="hidden-md-down"> </span></span>
            <img src="assets/img/img3.jpg" class="wd-32 rounded-circle" alt="">
          </a>
          <div class="dropdown-menu dropdown-menu-header wd-200">
            <ul class="list-unstyled user-profile-nav">
              <li><a href=""><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
              <li><a href=""><i class="icon ion-ios-gear-outline"></i> Settings</a></li>
              <li><a href=""><i class="icon ion-ios-download-outline"></i> Downloads</a></li>
              <li><a href=""><i class="icon ion-ios-star-outline"></i> Favorites</a></li>
              <li><a href=""><i class="icon ion-ios-folder-outline"></i> Collections</a></li>
              <?php
              if (isset($_GET['action']) && $_GET['action'] == 'logout') {
                session_destroy();
                echo "<script>window.location = 'login.php';</script>";
              }
              ?>
              <li><a href="?action=logout"><i class="icon ion-power"></i> Sign Out</a></li>
            </ul>
          </div><!-- dropdown-menu -->
        </div><!-- dropdown -->
      </nav>
      <div class="navicon-right">
        <a id="btnRightMenu" href="" class="pos-relative">
          <i class="icon ion-ios-bell-outline"></i>
          <!-- start: if statement -->
          <span class="square-8 bg-danger"></span>
          <!-- end: if statement -->
        </a>
      </div><!-- navicon-right -->
    </div><!-- sl-header-right -->
  </div><!-- sl-header -->
  <!-- ########## END: HEAD PANEL ########## -->

  <!-- ########## START: RIGHT PANEL ########## -->
  <div class="sl-sideright">
    <ul class="nav nav-tabs nav-fill sidebar-tabs" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" role="tab" href="#messages">Messages (2)</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" role="tab" href="#notifications">Notifications (8)</a>
      </li>
    </ul><!-- sidebar-tabs -->

    <!-- Tab panes -->
    <div class="tab-content">
      <div class="tab-pane pos-absolute a-0 mg-t-60 active" id="messages" role="tabpanel">
        <div class="media-list">
          <!-- loop starts here -->
          <a href="" class="media-list-link">
            <div class="media">
              <img src="assets/img/img3.jpg" class="wd-40 rounded-circle" alt="">
              <div class="media-body">
                <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Donna Seay</p>
                <span class="d-block tx-11 tx-gray-500">2 minutes ago</span>
                <p class="tx-13 mg-t-10 mg-b-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
              </div>
            </div><!-- media -->
          </a>
          <!-- loop ends here -->
          <a href="" class="media-list-link">
            <div class="media">
              <img src="assets/img/img4.jpg" class="wd-40 rounded-circle" alt="">
              <div class="media-body">
                <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Samantha Francis</p>
                <span class="d-block tx-11 tx-gray-500">3 hours ago</span>
                <p class="tx-13 mg-t-10 mg-b-0">My entire soul, like these sweet mornings of spring.</p>
              </div>
            </div><!-- media -->
          </a>
          <a href="" class="media-list-link">
            <div class="media">
              <img src="assets/img/img7.jpg" class="wd-40 rounded-circle" alt="">
              <div class="media-body">
                <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Robert Walker</p>
                <span class="d-block tx-11 tx-gray-500">5 hours ago</span>
                <p class="tx-13 mg-t-10 mg-b-0">I should be incapable of drawing a single stroke at the present moment...</p>
              </div>
            </div><!-- media -->
          </a>
          <a href="" class="media-list-link">
            <div class="media">
              <img src="assets/img/img5.jpg" class="wd-40 rounded-circle" alt="">
              <div class="media-body">
                <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Larry Smith</p>
                <span class="d-block tx-11 tx-gray-500">Yesterday, 8:34pm</span>

                <p class="tx-13 mg-t-10 mg-b-0">When, while the lovely valley teems with vapour around me, and the meridian sun strikes...</p>
              </div>
            </div><!-- media -->
          </a>
          <a href="" class="media-list-link">
            <div class="media">
              <img src="assets/img/img3.jpg" class="wd-40 rounded-circle" alt="">
              <div class="media-body">
                <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Donna Seay</p>
                <span class="d-block tx-11 tx-gray-500">Jan 23, 2:32am</span>
                <p class="tx-13 mg-t-10 mg-b-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
              </div>
            </div><!-- media -->
          </a>
        </div><!-- media-list -->
        <div class="pd-15">
          <a href="" class="btn btn-secondary btn-block bd-0 rounded-0 tx-10 tx-uppercase tx-mont tx-medium tx-spacing-2">View More Messages</a>
        </div>
      </div><!-- #messages -->

      <div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto" id="notifications" role="tabpanel">
        <div class="media-list">
          <!-- loop starts here -->
          <a href="" class="media-list-link read">
            <div class="media pd-x-20 pd-y-15">
              <img src="assets/img/img8.jpg" class="wd-40 rounded-circle" alt="">
              <div class="media-body">
                <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 18 others in a post.</p>
                <span class="tx-12">October 03, 2017 8:45am</span>
              </div>
            </div><!-- media -->
          </a>
          <!-- loop ends here -->
          <a href="" class="media-list-link read">
            <div class="media pd-x-20 pd-y-15">
              <img src="assets/img/img9.jpg" class="wd-40 rounded-circle" alt="">
              <div class="media-body">
                <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Mellisa Brown</strong> appreciated your work <strong class="tx-medium tx-gray-800">The Social Network</strong></p>
                <span class="tx-12">October 02, 2017 12:44am</span>
              </div>
            </div><!-- media -->
          </a>
          <a href="" class="media-list-link read">
            <div class="media pd-x-20 pd-y-15">
              <img src="assets/img/img10.jpg" class="wd-40 rounded-circle" alt="">
              <div class="media-body">
                <p class="tx-13 mg-b-0 tx-gray-700">20+ new items added are for sale in your <strong class="tx-medium tx-gray-800">Sale Group</strong></p>
                <span class="tx-12">October 01, 2017 10:20pm</span>
              </div>
            </div><!-- media -->
          </a>
          <a href="" class="media-list-link read">
            <div class="media pd-x-20 pd-y-15">
              <img src="assets/img/img5.jpg" class="wd-40 rounded-circle" alt="">
              <div class="media-body">
                <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Julius Erving</strong> wants to connect with you on your conversation with <strong class="tx-medium tx-gray-800">Ronnie Mara</strong></p>
                <span class="tx-12">October 01, 2017 6:08pm</span>
              </div>
            </div><!-- media -->
          </a>
          <a href="" class="media-list-link read">
            <div class="media pd-x-20 pd-y-15">
              <img src="assets/img/img8.jpg" class="wd-40 rounded-circle" alt="">
              <div class="media-body">
                <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 12 others in a post.</p>
                <span class="tx-12">September 27, 2017 6:45am</span>
              </div>
            </div><!-- media -->
          </a>
          <a href="" class="media-list-link read">
            <div class="media pd-x-20 pd-y-15">
              <img src="assets/img/img10.jpg" class="wd-40 rounded-circle" alt="">
              <div class="media-body">
                <p class="tx-13 mg-b-0 tx-gray-700">10+ new items added are for sale in your <strong class="tx-medium tx-gray-800">Sale Group</strong></p>
                <span class="tx-12">September 28, 2017 11:30pm</span>
              </div>
            </div><!-- media -->
          </a>
          <a href="" class="media-list-link read">
            <div class="media pd-x-20 pd-y-15">
              <img src="assets/img/img9.jpg" class="wd-40 rounded-circle" alt="">
              <div class="media-body">
                <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Mellisa Brown</strong> appreciated your work <strong class="tx-medium tx-gray-800">The Great Pyramid</strong></p>
                <span class="tx-12">September 26, 2017 11:01am</span>
              </div>
            </div><!-- media -->
          </a>
          <a href="" class="media-list-link read">
            <div class="media pd-x-20 pd-y-15">
              <img src="assets/img/img5.jpg" class="wd-40 rounded-circle" alt="">
              <div class="media-body">
                <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Julius Erving</strong> wants to connect with you on your conversation with <strong class="tx-medium tx-gray-800">Ronnie Mara</strong></p>
                <span class="tx-12">September 23, 2017 9:19pm</span>
              </div>
            </div><!-- media -->
          </a>
        </div><!-- media-list -->
      </div><!-- #notifications -->

    </div><!-- tab-content -->
  </div><!-- sl-sideright -->
  <!-- ########## END: RIGHT PANEL ########## --->