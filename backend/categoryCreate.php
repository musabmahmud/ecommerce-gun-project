<?php
include('../classes/Category.php');
include('inc/header.php');

$category = new Category();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $categoryName = $_POST['categoryName'];

    $categoryInsert = $category->categoryAdd($categoryName);
}
?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">Create Category</span>
    </nav>

    <div class="sl-pagebody">

        <div class="sl-page-title text-center text-uppercase">
            <h5>Create Category Form</h5>
            <!-- <p>Category and more.</p> -->
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
            <form method="post" action="categoryCreate.php" data-parsley-validate>
                <div class="row">
                    <label class="col-sm-2 form-control-label">Category Name: <span class="tx-danger">*</span></label>
                    <div class="col-sm-10 mg-t-10 mg-sm-t-0">
                        <input type="text" class="form-control" placeholder="Enter Category Name" name="categoryName">
                    </div>
                </div><!-- row -->
                <?php if (isset($categoryInsert)) { ?>
                    <div class="alert alert-danger text-center mg-t-5" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <?= $categoryInsert ?>
                    </div>
                <?php } 
                else if(isset($_SESSION['categorySuccess'])) { ?>
                    <div class="alert alert-success text-center mg-t-5" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <?= $_SESSION['categorySuccess'] ?>
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