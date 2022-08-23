<?php include('inc/header.php'); ?>
<?php

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
                        unset($_SESSION['cartDelSuccess']); } ?>
                    <?php if (isset($_SESSION['cartUpSuccess'])) { ?>
                        <div class="alert alert-success text-center mg-t-5" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <?= $_SESSION['cartUpSuccess'] ?>
                        </div>
                    <?php unset($_SESSION['cartUpSuccess']); } ?>
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
                            if ($carts) {
                                $i = 0;
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
                                            <td>$<?= $totali = $pricei * $cartPd['quantity']; ?></td>
                                            <td>
                                                <button type="submit" class="btn btn-info text-white" name="updateCart">Update</button>
                                            </td>
                                        </form> 
                                        <td>
                                            <form action="cart.php" method="post">
                                                <input type="hidden" value="<?= $cartPd['cartId']; ?>" name="cartId">
                                                <button class="btn btn-danger text-white" name="deleteCart">x</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php }
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
        </div>
    </div>
</section>
<!--Cart area end here-->

<!--Products area end here-->
<?php include('inc/footer.php'); ?>