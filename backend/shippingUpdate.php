<?php
include('../classes/shipping.php');
include('inc/header.php');

if (!isset($_GET['shippingId']) || $_GET['shippingId'] == NULL) {
    echo "<script>window.location = 'shipping.php';</script>";
    // header("Location : shipping.php");
} else {
    $shippingId = $_GET['shippingId'];
}
//database object creation
$shipping = new Shipping();

//request to database
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $shippingId = $_POST['shippingId'];
    $shippingCost = $_POST['shippingCost'];
    $city = $_POST['city'];
    $shippingUpdate = $shipping->shippingUpdate($shippingId, $shippingCost, $city);
}

// fetch data
$getshipping = $shipping->getByID($shippingId);
?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">Edit shipping</span>
    </nav>

    <div class="sl-pagebody">

        <div class="sl-page-title text-center text-uppercase">
            <h5>Update shipping Form</h5>
            <!-- <p>shipping and more.</p> -->
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
            <form method="post" action="shippingUpdate.php" data-parsley-validate>

                <input type="hidden" name="shippingId" value="<?= $getshipping['shippingId'] ? $getshipping['shippingId'] : ''; ?>">
                <div class="row">
                    <label class="col-sm-2 form-control-label">shipping City Name: <span class="tx-danger">*</span></label>
                    <div class="col-sm-10 mg-t-10 mg-sm-t-0">
                        <input type="text" class="form-control" placeholder="Enter shipping city Name" name="city" value="<?= $getshipping['city'] ? $getshipping['city'] : ''; ?>">
                    </div>
                </div><!-- row -->
                <div class="row">
                    <label class="col-sm-2 form-control-label">shipping Name: <span class="tx-danger">*</span></label>
                    <div class="col-sm-10 mg-t-10 mg-sm-t-0">
                        <input type="text" class="form-control" placeholder="Enter shipping Cost" name="shippingCost" value="<?= $getshipping['shippingCost'] ? $getshipping['shippingCost'] : ''; ?>">
                    </div>
                </div><!-- row -->
                <?php if (isset($shippingUpdate)) { ?>
                    <div class="alert alert-danger text-center mg-t-5" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <?= $shippingUpdate ?>
                    </div>
                <?php } else if (isset($_SESSION['shippingUpdated'])) { ?>
                    <div class="alert alert-success text-center mg-t-5" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <?= $_SESSION['shippingUpdated'] ?>
                    </div>
                <?php  } ?>
                <div class="form-layout-footer mg-t-30 text-center">
                    <input type="reset" class="btn btn-secondary mg-r-10" value="Clear" />
                    <input type="submit" class="btn btn-info mg-r-5" value="Submit" />
                </div><!-- form-layout-footer -->
            </form>
        </div>

    </div><!-- sl-pagebody -->
    <?php include('inc/footer.php'); ?>