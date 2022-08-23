<?php include('inc/header.php'); ?>

<?php
$categories = $front->getCat();
$brands = $front->getBrand();
?>


<?php
$per_page = 6;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$start_from = ($page - 1) * $per_page;

$shopProducts = $front->shopProduct($start_from, $per_page);
$total_rows = $front->paginationshop();

// if (isset($_GET['categoryId'])) {
//     $catId = $_GET['categoryId'];
//     $shopProducts = $front->getProductsByCat($start_from, $per_page, $catId);
//     $total_rows = $front->paginationshopbyCategory($catId);
// } else {
//     $shopProducts = $front->shopProduct($start_from, $per_page);
//     $total_rows = $front->paginationshop();
// }
?>

<!-- rows count -->
<?php
$total_pages = ceil($total_rows / $per_page);
?>
<!-- product item start -->
<!--Breadcumb area start here-->
<section class="breadcumb-area jarallax bg-img af">
    <div class="breadcumb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="content">
                        <h2>Our products</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><a href="javascript:void(0)">shop</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Breadcumb area end here-->
<!--Products area start here-->
<section class="shop-page section">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="sibebar">
                    <div class="wighet search">
                        <form>
                            <input type="search" placeholder="Search here">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div class="wighet categories">
                        <h3>categ<span>ories</span></h3>
                        <ul>
                            <?php
                            if ($categories) {
                                foreach ($categories as $category) {
                            ?>
                                    <li><a href="shop.php?categoryId=<?= $category['categoryId'] ?>"><i class="fa fa-angle-double-right"></i><?= $category['categoryName'] ?><span><?= $category['productCount']; ?></span></a></li>
                            <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="wighet filter">
                        <h3>Filter by <span>Price</span></h3>
                        <div class="price-range">
                            <div class="range">
                                <div id="range-price" class="range-box"></div>
                                <!-- range price highest value  -->
                                <input type="hidden" id="highest-range" value="1500" placeholder="Highest Range of Price">
                                <span>Form :</span>
                                <input type="text" id="price" class="price-box" readonly />
                            </div>
                            <button type="submit" class="btn1">FILTER</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-9 pd-0">
                <div class="col-sm-12">
                    <div class="filter-area">
                        <select>
                            <option>short by</option>
                            <option>lowest Price</option>
                            <option>highest Price</option>
                            <option>oldest products</option>
                            <option>newest product</option>
                        </select>
                        <div class="list-grid">
                            <ul class="list-inline">
                                <li><a href="#" id="gridview"><i class="fa fa-th"></i></a></li>
                                <li><a href="#" id="listview"><i class="fa fa-list"></i></a></li>
                            </ul>
                        </div>
                        <div class="showpro">
                            <p><span>Showing <?= (($page - 1) * $per_page) + 1 ?>-<?= $page * $per_page ?></span> of <?= $total_rows; ?> Results</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 pd-0">

                    <?php
                    if (isset($shopProducts)) {
                        foreach ($shopProducts as $shopPd) {
                    ?>
                            <div class="col-sm-4 products">
                                <a href="products.php?product-name=<?= $shopPd['slug']; ?>">
                                    <figure><img src="assets/images/products/<?= $shopPd['productImage']; ?>" alt="<?= $shopPd['productName']; ?>" /></figure>
                                </a>
                                <div class="contents">
                                    <a href="products.php?product-name=<?= $shopPd['slug']; ?>">
                                        <h3><?= $shopPd['productName']; ?></h3>
                                        <p><?= $fm->textShorten($shopPd['productShortDes']) ?> <span class="btn3">Read More<i class="fas fa-arrow-right"></i></span></p>
                                        <span>$<?= $shopPd['productPrice']; ?></span>
                                    </a>
                                    <a href="#" class="btn4">Add To Cart</a>
                                </div>
                            </div>
                    <?php }
                    } ?>
                </div>
                <div class="col-sm-12">
                    <div class="paginations">
                        <ul>
                            <li class="<?php if ($page == 1) {
                                            echo 'active';
                                        } ?>"><a href='shop.php?page=1'>First Page</a></li>
                            <?php
                            if ($page >= 2) {
                                echo "<li><a href='shop.php?page=" . ($page - 1) . "'>  Prev </a></li>";
                            }
                            for ($i = 2; $i < $total_pages; $i++) {
                                echo "<li class='";
                                if ($page == $i) {
                                    echo "active";
                                }
                                echo "'><a href='shop.php?page=$i'>" . $i . " </a>";
                            }
                            if ($total_pages > $page && $page >= 2) {
                                echo "<li><a href='shop.php?page=" . ($page + 1) . "'>  Next </a></li>";
                            }
                            ?>
                            <li class="<?= $page == $total_pages ? 'active' : '' ?>"><a href='shop.php?page=<?= $total_pages ?>'>Last Page</a></span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Products area end here-->
<?php include('inc/footer.php'); ?>