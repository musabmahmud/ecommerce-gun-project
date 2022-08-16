<?php
include('../classes/brandSystem.php');
include('inc/header.php');

if (!isset($_GET['brandId']) || $_GET['brandId'] == NULL) {
    echo "<script>window.location = 'brand.php';</script>";
    // header("Location : brand.php");
} else {
    $brandId = $_GET['brandId'];
}
//database object creation
$brand = new brand();

//request to database
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $brandId = $_POST['brandId'];
    $brandName = $_POST['brandName'];
    $brandUpdate = $brand->brandUpdate($brandId, $brandName);
}

// fetch data
$getbrand = $brand->getByID($brandId);
?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">Edit brand <?= $getbrand['brandName'] ?></span>
    </nav>

    <div class="sl-pagebody">

        <div class="sl-page-title text-center text-uppercase">
            <h5>Update brand Form</h5>
            <!-- <p>brand and more.</p> -->
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
            <form method="post" action="brandUpdate.php" data-parsley-validate>

                <input type="number" name="brandId" value="<?= $getbrand['brandId'] ? $getbrand['brandId'] : ''; ?>">
                <div class="row">
                    <label class="col-sm-2 form-control-label">brand Name: <span class="tx-danger">*</span></label>
                    <div class="col-sm-10 mg-t-10 mg-sm-t-0">
                        <input type="text" class="form-control" placeholder="Enter brand Name" name="brandName" value="<?= $getbrand['brandName'] ? $getbrand['brandName'] : ''; ?>">
                    </div>
                </div><!-- row -->
                <?php if (isset($brandUpdate)) { ?>
                    <div class="alert alert-danger text-center mg-t-5" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <?= $brandUpdate ?>
                    </div>
                <?php } else if (isset($_SESSION['brandUpdated'])) { ?>
                    <div class="alert alert-success text-center mg-t-5" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <?= $_SESSION['brandUpdated'] ?>
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