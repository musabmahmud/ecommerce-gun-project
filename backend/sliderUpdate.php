<?php
include('../classes/Slider.php');
include('../classes/Category.php');
include('../classes/Brand.php');
include('inc/header.php');

if (!isset($_GET['productId']) || $_GET['productId'] == NULL) {
    echo "<script>window.location = 'product.php';</script>";
} else {
    $productId = $_GET['productId'];
}

$product = new Product();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productUpdate = $product->productUpdate($_POST, $_FILES);
}

$pd = $product->getProductInfo($productId);

$category = new Category();
$categoryList = $category->categoryList();

$brand = new Brand();
$brandList = $brand->brandList();


?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">Create Slider</span>
    </nav>

    <div class="sl-pagebody">

        <div class="sl-page-title text-center text-uppercase">
            <h5>Slider product update Form</h5>
            <!-- <p>product and more.</p> -->
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40 form-layout form-layout-4">

            <!-- err alert -->
            <?php if (isset($productUpdate)) { ?>
                <div class="alert alert-danger text-center mg-t-5" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?= $productUpdate ?>
                </div>
            <?php } ?>

            <form method="post" action="sliderUpdate.php" enctype="multipart/form-data" data-parsley-validate>
                <input type="hidden" class="form-control" name="productId" value="<?= $pd['productId'] ?>" required>
                <!-- Input  -->
                <div class="row">
                    <div class="col-md-4 mg-b-10">
                        <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Product Name" name="productName" value="<?= $pd['productName'] ?>" required>

                    </div><!-- col end-->

                    <div class="col-md-4 mg-b-10">
                        <label class="form-control-label">Product code: <span class="tx-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Product Name" name="productCode" value="<?= $pd['productCode'] ?>" required>

                    </div><!-- col end-->

                    <div class="col-md-4 mg-b-10">
                        <label class="form-control-label">Product In Stock: <span class="tx-danger">*</span></label>
                        <input type="number" min="0" class="form-control" placeholder="Enter Product In Stock" name="productInStock" value="<?= $pd['productInStock'] ?>" required>

                    </div><!-- col end-->
                    <div class="col-md-4 mg-b-10">
                        <div class="form-group">
                            <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                            <select class="form-control" data-placeholder="Choose Category" name="categoryId" required>
                                <option label="Choose Category"></option>
                                <?php if ($categoryList) {
                                    $i = 0;
                                    foreach ($categoryList as $catList) {
                                        $i++;
                                ?>
                                        <option value="<?= $catList['categoryId'] ?>" <?= $catList['categoryId'] == $pd['categoryId'] ? "selected" : "" ?>><?= $catList['categoryName'] ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>

                    </div><!-- col end-->
                    <div class="col-md-4 mg-b-10">
                        <div class="form-group">
                            <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                            <select class="form-control" data-placeholder="Choose Brand" name="brandId" required>
                                <option label="Choose Brand"></option>
                                <?php if ($brandList) {
                                    $i = 0;
                                    foreach ($brandList as $brandL) {
                                        $i++;
                                ?>
                                        <option value="<?= $brandL['brandId'] ?>" <?= $brandL['brandId'] == $pd['brandId'] ? "selected" : "" ?>><?= $brandL['brandName'] ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                    </div><!-- col end-->

                    <div class="col-md-4 mg-b-10">
                        <label class="form-control-label">Product Regular Price: <span class="tx-danger">*</span></label>
                        <input type="number" min="0" class="form-control" placeholder="Enter Product  Regular Price" name="productPrice" value="<?= $pd['productPrice'] ?>" required>
                    </div><!-- col end-->

                    <div class="col-md-4 mg-b-10">
                        <label class="form-control-label">Product Offer Price: <span class="tx-danger">*</span></label>
                        <input type="number" min="0" class="form-control" placeholder="Enter Product Offer Price" name="productOfferPrice" value="<?= $pd['productOfferPrice'] ?>" required>
                    </div><!-- col end-->

                    <div class="col-md-4 mg-b-10">
                        <label class="form-control-label">Product Image: <span class="tx-danger">*</span></label>
                        <label class="custom-file">
                            <input type="file" id="file2" class="custom-file-input" name="productImage" onchange="document.getElementById('image').src= window.URL.createObjectURL(this.files[0])">
                            <span class="custom-file-control custom-file-control-primary"></span>
                        </label>
                    </div><!-- col end-->

                    <div class="col-md-4 mg-b-10">
                        <img id="image" src="../frontend/assets/images/products/<?= $pd['productImage'] ?>" width="100" height="100">
                    </div>

                    <div class="col-md-6 mg-b-10">
                        <label class="form-control-label">Product Short Description: <span class="tx-danger">*</span></label>
                        <textarea type="text" class="form-control" placeholder="Enter Product Short Description" rows="10" name="productShortDes" required><?= $pd['productShortDes'] ?></textarea>


                    </div><!-- col end-->

                    <div class="col-md-6 mg-b-10">
                        <label class="form-control-label">Product Long Description: <span class="tx-danger">*</span></label>
                        <textarea type="text" class="form-control" placeholder="Enter Product Long Description" rows="10" name="productLongDes" required><?= $pd['productLongDes'] ?></textarea>


                    </div><!-- col end-->

                </div><!-- row end-->
                <div class="form-layout-footer mg-t-30 text-center">
                    <input type="reset" class="btn btn-secondary mg-r-10" value="Clear" />
                    <input type="submit" class="btn btn-info mg-r-5" value="Submit" />
                </div><!-- form-layout-footer -->
            </form>
        </div>

    </div><!-- sl-pagebody -->
    <?php include('inc/footer.php'); ?>