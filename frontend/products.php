<?php include('inc/header.php'); ?>
<?php
if (isset($_GET['product-name'])) {
    $slug = $_GET['product-name'];
} else {
    echo "<script>window.location = 'shop.php';</script>";
}

$pdD = $front->productDetails($slug);
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
<!--Product Details area start here-->
<section class="product-details section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="products-photo">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="img1">
                            <img src="assets/images/products/<?= $pdD['productImage'] ?>" alt="<?= $pdD['productName'] ?>" />
                        </div>
                        <div role="tabpanel" class="tab-pane" id="img2">
                            <img src="assets/images/products/2.jpg" alt="" />
                        </div>
                        <div role="tabpanel" class="tab-pane" id="img3">
                            <img src="assets/images/products/3.jpg" alt="" />
                        </div>
                        <div role="tabpanel" class="tab-pane" id="img4">
                            <img src="assets/images/products/4.jpg" alt="" />
                        </div>
                    </div>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#img1" role="tab" data-toggle="tab"><img src="assets/images/products/<?= $pdD['productImage'] ?>" alt="<?= $pdD['productName'] ?>" /></a>
                        </li>
                        <li role="presentation">
                            <a href="#img2" role="tab" data-toggle="tab"><img src="assets/images/products/2.jpg" alt="" /></a>
                        </li>
                        <li role="presentation">
                            <a href="#img3" role="tab" data-toggle="tab"><img src="assets/images/products/3.jpg" alt="" /></a>
                        </li>
                        <li role="presentation">
                            <a href="#img4" role="tab" data-toggle="tab"><img src="assets/images/products/4.jpg" alt="" /></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="single-product-content">
                    <h2><?= $pdD['productName'] ?></h2>
                    <div class="product-review">
                        <ul>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                        <span>10 Reviews</span>
                        <a href="#"> Add Your Review</a>
                    </div>
                    <div class="con">
                        <p><?= $pdD['productShortDes'] ?></p>
                        <!-- <ul>
                            <li><i class="fa fa-angle-double-right"></i>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin</li>
                            <li><i class="fa fa-angle-double-right"></i>Lorem quis bibendum auctor, nisi elit consequat ipsum.</li>
                            <li><i class="fa fa-angle-double-right"></i>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin</li>
                            <li><i class="fa fa-angle-double-right"></i>Lorem quis bibendum auctor, nisi elit consequat ipsum.</li>
                        </ul> -->
                    </div>
                    <form action="products.php" method="post">
                        <input type="hidden" value="<?= session_id();?>" name="sId">
                        <input type="hidden" value="<?= $pdD['productId'];?>" name="productId">
                        <input type="hidden" value="<?= $pdD['slug'];?>" name="slug">
                        <div class="select-pro">
                            <div class="input-group">
                                <input class="vertical-spin" type="text" data-bts-button-down-class="btn btn-default" data-bts-button-up-class="btn btn-default" value="1" name="quantity" name="vertical-spin">
                            </div>
                        </div>
                        <div class="price">
                            <?php if ($pdD['productPrice'] != $pdD['productOfferPrice']) {  ?>
                                <strong>$<?= $pdD['productPrice'] ?></strong>
                                <s>$<?= $pdD['productOfferPrice'] ?></s>
                                <span>(<?= ceil(100 - $pdD['productOfferPrice'] * 100 / $pdD['productPrice']) ?>% OFF)</span>
                            <?php } else { ?>
                                <strong>$<?= $pdD['productPrice'] ?></strong>
                            <?php } ?>
                        </div>
                        <div class="buttons">
                            <button type="submit" name="addToCart" class="btn1">add to cart</button>
                            <button type="submit" name="cart" class="btn4">Buy now!</button>
                            <a href="#" class="heart"><i class="fa fa-heart"></i></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row section5">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="pro-details">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#con1" role="tab" data-toggle="tab">Description</a></li>
                        <li role="presentation"><a href="#con3" role="tab" data-toggle="tab">Reviews </a></li>
                        <li role="presentation"><a href="#con4" role="tab" data-toggle="tab"> Faq.</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="con1">
                            <div class="con">
                                <figure><img src="assets/images/products/<?= $pdD['productImage'] ?>" alt="<?= $pdD['productName'] ?>" /></figure>
                                <p><?= $pdD['productShortDes'] ?></p>
                                <p><?= $pdD['productLongDes'] ?></p>
                                <!-- <ul>
                                    <li><i class="fas fa-long-arrow-alt-right"></i>This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. lorem quis bibendum auctor. </li>
                                    <li><i class="fas fa-long-arrow-alt-right"></i>Nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.</li>
                                </ul> -->
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="con3">
                            <div class="con">
                                <figure><img src="assets/images/products/3.jpg" alt="" /></figure>
                                <p>This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velittor aliquet. Aenean sollicitudin, lorem quis endum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat consequat auctor eu in elit.</p>
                                <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat stoamet. This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. </p>
                                <p>This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velittor aliquet. Aenean sollicitudin, lorem quis endum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat consequat auctor eu in elit.</p>
                                <ul>
                                    <li><i class="fas fa-long-arrow-alt-right"></i>This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. lorem quis bibendum auctor. </li>
                                    <li><i class="fas fa-long-arrow-alt-right"></i>Nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.</li>
                                </ul>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="con4">
                            <div class="con">
                                <figure><img src="assets/images/products/<?= $pdD['productImage'] ?>" alt="<?= $pdD['productName'] ?>" /></figure>
                                <p><?= $pdD['productLongDes'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Product Details area End here-->
<!--Products area start here-->
<section class="products-area section4 bg-img jarallax">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="section-heading">
                    <h2>Our Products</h2>
                    <p>All modern weaponts can appreciate our broad services akshay handge pharetra, eratd fermentum feugiat, gun are best velit mauris aks egestasut aliquam.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 pd-0">
                <div class="pro-sliders">
                    <div class="col-sm-12">
                        <div class="products">
                            <figure><img src="assets/images/products/1.jpg" alt="" /></figure>
                            <div class="contents">
                                <h3>MC5 Carbine</h3>
                                <span>$1,499.00</span>
                                <a href="#" class="btn4">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="products">
                            <figure><img src="assets/images/products/2.jpg" alt="" /></figure>
                            <div class="contents">
                                <h3>MC5 Carbine</h3>
                                <span>$1,499.00</span>
                                <a href="#" class="btn4">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="products">
                            <figure><img src="assets/images/products/3.jpg" alt="" /></figure>
                            <div class="contents">
                                <h3>MC5 Carbine</h3>
                                <span>$1,499.00</span>
                                <a href="#" class="btn4">Add To Cart</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="products">
                            <figure><img src="assets/images/products/4.jpg" alt="" /></figure>
                            <div class="contents">
                                <h3>MC5 Carbine</h3>
                                <span>$1,499.00</span>
                                <a href="#" class="btn4">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="products">
                            <figure><img src="assets/images/products/1.jpg" alt="" /></figure>
                            <div class="contents">
                                <h3>MC5 Carbine</h3>
                                <span>$1,499.00</span>
                                <a href="#" class="btn4">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="products">
                            <figure><img src="assets/images/products/2.jpg" alt="" /></figure>
                            <div class="contents">
                                <h3>MC5 Carbine</h3>
                                <span>$1,499.00</span>
                                <a href="#" class="btn4">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="products">
                            <figure><img src="assets/images/products/3.jpg" alt="" /></figure>
                            <div class="contents">
                                <h3>MC5 Carbine</h3>
                                <span>$1,499.00</span>
                                <a href="#" class="btn4">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Products area end here-->

<!--Products area end here-->
<?php include('inc/footer.php'); ?>