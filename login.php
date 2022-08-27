<?php include('inc/header.php'); 
Session::checkUserLogin();
?>
<?php

$shippingList = $shipping->shippingList();


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $customerRegister = $customer->customerRegister($_POST);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $customerLogin = $customer->customerLogin($_POST['email'],$_POST['password']);
}

?>

<!--Breadcumb area start here-->
<section class="breadcumb-area jarallax bg-img af">
    <div class="breadcumb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="content">
                        <h2>PRODUCT details</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><a href="javascript:void(0)">PRODUCT</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Breadcumb area end here-->
<!--Login area start here-->
<div class="container">
    <div class="row section2">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="section-heading">
                <h2>Login / Register</h2>
                <p>All modern weaponts can appreciate our broad services akshay handge pharetra, eratd fermentum feugiat, gun are best velit mauris aks egestasut aliquam.</p>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="pro-details login-details contact-area">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#con1" role="tab" data-toggle="tab">Login</a></li>
                    <li role="presentation"><a href="#con2" role="tab" data-toggle="tab">Register</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="con1">
                        <div class="form-area">
                            <h2 class="text-center">Login on Ecom</h2>
                            <?php if (isset($customerRegister)) { ?>
                                <div class="alert alert-danger text-center mg-t-5" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <?= $customerRegister ?>
                                </div>
                            <?php unset($customerRegister);
                            } ?>
                            <?php if (isset($_SESSION['CustomerSuccess'])) { ?>
                                <div class="alert alert-success text-center mg-t-5" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <?= $_SESSION['CustomerSuccess'] ?>
                                </div>
                            <?php unset($_SESSION['CustomerSuccess']);
                            } ?>
                            <form action="login.php" method="post">
                                <fieldset>
                                    <div class="row g-4">
                                        <div class="col-sm-12 pd-b-10 mg-b-10 feld login-input">
                                            <input type="email" name="email" placeholder="Email *">
                                            <span><i class="fa fa-envelope"></i></span>
                                        </div>
                                        <div class="col-sm-12 feld login-input">
                                            <input type="password" name="password" placeholder="password">
                                            <span><i class="fa fa-lock"></i></span>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="btn-area text-center">
                                    <button type="submit" name="login" class="btn1"><span>Log In</span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="con2">
                        <div class="form-area">
                            <h2 class="text-center">Register on Ecom</h2>

                            <form method="post" accept="login.php">
                                <fieldset>
                                    <div class="row">
                                        <div class="col-sm-12 feld login-input">
                                            <input type="text" placeholder="Full Name *" name="name" require>
                                            <span><i class="fa fa-user"></i></span>
                                        </div>
                                        <div class="col-sm-12 pd-b-10 mg-b-10 feld login-input">
                                            <input type="email" placeholder="Email *" name="email" require>
                                            <span><i class="fa fa-envelope"></i></span>
                                        </div>
                                        <div class="col-sm-12 col-md-6 feld login-input">
                                            <input type="password" placeholder="password" name="password" require>
                                            <span><i class="fa fa-lock"></i></span>
                                        </div>
                                        <div class="col-sm-12 col-md-6 feld login-input">
                                            <input type="password" placeholder="confirm password" require>
                                            <span><i class="fa fa-lock"></i></span>
                                        </div>
                                        <div class="col-sm-12 feld login-input">
                                            <input type="text" placeholder="address" name="address" require>
                                            <span><i class="fa fa-address-book"></i></span>
                                        </div>
                                        <div class="col-sm-12 feld login-input">
                                            <select data-placeholder="Choose Shipping" name="shippingId" required>
                                                <option label="Choose Shipping"></option>
                                                <?php if ($shippingList) {
                                                    $i = 0;
                                                    foreach ($shippingList as $shipping) {
                                                        $i++;
                                                ?>
                                                        <option value="<?= $shipping['shippingId'] ?>"><?= $shipping['city'] ?></option>
                                                <?php }
                                                } ?>
                                            </select>
                                            <span><i class="fa fa-building"></i></span>
                                        </div>
                                        <div class="col-sm-12 col-md-6 feld login-input">
                                            <input type="text" placeholder="phone" name="phone" require>
                                            <span><i class="fa fa-phone"></i></span>
                                        </div>
                                        <div class="col-sm-12 col-md-6 feld login-input">
                                            <input type="text" placeholder="zip-code" name="zipcode" require>
                                            <span><i class="fa fa-star"></i></span>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="btn-area text-center">
                                    <button type="submit" name="register" class="btn1"><span>Sign Up</span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('inc/footer.php'); ?>