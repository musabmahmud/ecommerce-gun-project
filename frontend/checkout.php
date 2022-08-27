<?php include('inc/header.php');
    SESSION::checkUserSession();
?>

<?php

$shippingList = $shipping->shippingList();

?>

<!--Breadcumb area start here-->
<section class="breadcumb-area jarallax bg-img af">
    <div class="breadcumb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="content">
                        <h2>Checkout</h2>
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
    <div class="row section2 contact-area">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="section-heading">
                <h2>Checkout</h2>
                <p>All modern weaponts can appreciate our broad services akshay handge pharetra, eratd fermentum feugiat, gun are best velit mauris aks egestasut aliquam.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-area">
                <form method="post" accept="login.php">
                    <fieldset>
                        <div class="row">
                            <div class="col-sm-12 feld login-input">
                                <input type="text" placeholder="Full Name *" name="name" value="<?= $_SESSION['name'] ? $_SESSION['name'] : ''?>" require>
                                <span><i class="fa fa-user"></i></span>
                            </div>
                            <div class="col-sm-12 pd-b-10 mg-b-10 feld login-input">
                                <input type="email" placeholder="Email *"  value="<?= $_SESSION['email'] ? $_SESSION['email'] : ''?>"  name="email" require>
                                <span><i class="fa fa-envelope"></i></span>
                            </div>
                            <div class="col-sm-12 feld login-input">
                                <input type="text" placeholder="address" name="address" value="<?= $_SESSION['address'] ? $_SESSION['address'] : ''?>"  require>
                                <span><i class="fa fa-address-book"></i></span>
                            </div>
                            <div class="col-sm-12 feld login-input">
                                <select data-placeholder="Choose Shipping" name="shippingId" id="shippingId" required  onchange="getVal()">
                                    <option label="Choose Shipping"></option>
                                    <?php if ($shippingList) {
                                        $i = 0;
                                        foreach ($shippingList as $shipping) {
                                            $i++;
                                    ?>
                                            <option value="<?=$shipping['shippingId']?>" <?= $shipping['shippingId'] == $_SESSION['shippingId'] ? 'selected' : '' ?>><?= $shipping['city'] ?></option>
                                    <?php }
                                    } ?>
                                </select>
                                <span><i class="fa fa-building"></i></span>
                            </div>
                            <div class="col-sm-12 col-md-6 feld login-input">
                                <input type="text" value="<?= $_SESSION['phone'] ? $_SESSION['phone'] : ''?>" placeholder="phone" name="phone" require>
                                <span><i class="fa fa-phone"></i></span>
                            </div>
                            <div class="col-sm-12 col-md-6 feld login-input">
                                <input type="text" placeholder="zip-code" name="zipcode" value="<?= $_SESSION['zipcode'] ? $_SESSION['zipcode'] : ''?>"  require>
                                <span><i class="fa fa-star"></i></span>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
                <div class="cart-index">
                    <div class="cart-card">
                        <div class="cart-content">
                            <p>subtotal</p>
                            <p>$</p>
                        </div>
                        <div class="cart-content">
                            <p>Delivery Charge</p>
                            <p>$<span id="delivery">100</span></p>
                        </div>
                        <div class="cart-content">
                            <p>sales taxes</p>
                            <p>$100</p>
                        </div>
                        <div class="cart-content">
                            <p>Grand total</p>
                            <p>$</p>
                        </div>
                        <div class="text-right">
                            <a href="checkout.php" class="btn btn-primary btn1">Confirm</a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
<?php include('inc/footer.php'); ?>