<?php
include('../classes/Category.php');
include('inc/header.php');

if (!isset($_GET['categoryId']) || $_GET['categoryId'] == NULL) {
    echo "<script>window.location = 'category.php';</script>";
    // header("Location : category.php");
} else {
    $categoryId = $_GET['categoryId'];
}
//database object creation
$category = new Category();

//request to database
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $categoryId = $_POST['categoryId'];
    $categoryName = $_POST['categoryName'];
    $categoryUpdate = $category->categoryUpdate($categoryId, $categoryName);
}

// fetch data
$getCategory = $category->getByID($categoryId);
?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">Edit Category <?= $getCategory['categoryName'] ?></span>
    </nav>

    <div class="sl-pagebody">

        <div class="sl-page-title text-center text-uppercase">
            <h5>Update Category Form</h5>
            <!-- <p>Category and more.</p> -->
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
            <form method="post" action="categoryUpdate.php" data-parsley-validate>

                <input type="number" name="categoryId" value="<?= $getCategory['categoryId'] ? $getCategory['categoryId'] : ''; ?>">
                <div class="row">
                    <label class="col-sm-2 form-control-label">Category Name: <span class="tx-danger">*</span></label>
                    <div class="col-sm-10 mg-t-10 mg-sm-t-0">
                        <input type="text" class="form-control" placeholder="Enter Category Name" name="categoryName" value="<?= $getCategory['categoryName'] ? $getCategory['categoryName'] : ''; ?>">
                    </div>
                </div><!-- row -->
                <?php if (isset($categoryUpdate)) { ?>
                    <div class="alert alert-danger text-center mg-t-5" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <?= $categoryUpdate ?>
                    </div>
                <?php } else if (isset($_SESSION['categoryUpdated'])) { ?>
                    <div class="alert alert-success text-center mg-t-5" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <?= $_SESSION['categoryUpdated'] ?>
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