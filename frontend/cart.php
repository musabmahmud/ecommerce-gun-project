<?php include('inc/header.php'); ?>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['emptyCart'])) {
    $cartEmpty = $cart->emptyCart();
}

?>

<!--Breadcumb area start here-->
<section class="breadcumb-area jarallax bg-img af">
    <div class="breadcumb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="content">
                        <h2>Cart Products details</h2>
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
<!--Cart area start here-->

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="event-schedule" id="cart">
                    <div class="section-heading2">
                        <h2>Cart</h2>
                    </div>
                    <?php if (isset($_SESSION['cartDelSuccess'])) { ?>
                        <div class="alert alert-success text-center mg-t-5" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <?= $_SESSION['cartDelSuccess'] ?>
                        </div>
                    <?php
                        unset($_SESSION['cartDelSuccess']);
                    } ?>
                    <?php if (isset($_SESSION['cartEmpty'])) { ?>
                        <div class="alert alert-success text-center mg-t-5" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <?= $_SESSION['cartEmpty'] ?>
                        </div>
                    <?php unset($_SESSION['cartEmpty']);
                    } ?>
                    <?php if (isset($_SESSION['cartUpSuccess'])) { ?>
                        <div class="alert alert-success text-center mg-t-5" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <?= $_SESSION['cartUpSuccess'] ?>
                        </div>
                    <?php unset($_SESSION['cartUpSuccess']);
                    } ?>
                    <table class="table table-hover cart-table">
                        <thead>
                            <tr class="cart-head">
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Product Image</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $i = 0;
                            $sum = 0;
                            $total = 0;
                            if ($carts) {
                                foreach ($carts as $cartPd) {
                                    $i++;
                            ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $cartPd['productName']; ?></td>
                                        <td><img class="img-rounded" src="assets/images/products/<?= $cartPd['productImage']; ?>" alt="<?= $cartPd['productName']; ?>" width="50" height="50" /></td>
                                        <td>$<?= $pricei = ($cartPd['productPrice'] != $cartPd['productOfferPrice'] ? $cartPd['productOfferPrice'] : $cartPd['productPrice']); ?></td>
                                        <form action="cart.php" method="post">
                                            <td>
                                                <input type="hidden" value="<?= $cartPd['cartId']; ?>" name="cartId">
                                                <div class="select-pro">
                                                    <div class="input-group">
                                                        <input class="vertical-spin" type="text" data-bts-button-down-class="btn btn-default" data-bts-button-up-class="btn btn-default" value="<?= $cartPd['quantity']; ?>" name="quantity" name="vertical-spin">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>$<?= $sum = $pricei * $cartPd['quantity']; ?></td>
                                            <td>
                                                <button type="submit" class="btn btn-secondary text-white" name="updateCart">Update</button>
                                            </td>
                                        </form>
                                        <td>
                                            <form action="cart.php" method="post">
                                                <input type="hidden" value="<?= $cartPd['cartId']; ?>" name="cartId">
                                                <button class="btn btn-danger text-white" name="deleteCart">x</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php
                                    $total = $sum + $total;
                                }
                            } else {
                                ?>
                                <tr>
                                    <td class="text-center" colspan="50">No Data Found!! <a href="shop.php" class=" text-success">Start To Shopping</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-sm-6">
                <a href="shop.php" class="btn2 mg-b-20"><i class="fas fa-arrow-left"></i> Back To shop</a>
            </div>
            <div class="col-sm-6 text-right">
                <form action="cart.php" method="post">
                    <?php
                    if ($carts) { ?><button type="submit" name="emptyCart" class="btn1">Empty Cart</button>
                    <?php } ?>
                </form>
            </div>
            <div class="col-sm-6">
                <div class="cart-index">
                    <div class="cart-card">
                        <div class="cart-content">
                            <p>subtotal</p>
                            <p>$<?= $total ? $total : '' ?></p>
                        </div>
                        <div class="cart-content">
                            <p>sales taxes</p>
                            <p>$<?= $tax = $total*.1?></p>
                        </div>
                        <div class="cart-content">
                            <p>Grand total</p>
                            <p>$<?= $total + $tax ?></p>
                        </div>
                        <div class="text-right">
                            <a href="checkout.php" class="btn btn-primary btn1">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Cart area end here-->

<!--Products area end here-->
<?php include('inc/footer.php'); ?>