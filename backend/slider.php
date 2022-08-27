<?php
include('../classes/Slider.php');
include_once '../lib/format.php';
include('inc/header.php');

$product = new Product();
$format = new Format();

// request to database
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productId = $_POST['productId'];
    $productTrash = $product->productTrash($productId);
}

$productList = $product->productList();
?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">Slider List</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title text-center text-uppercase">
            <h5>Slider List</h5>
            <!-- <p>product and more.</p> -->
        </div><!-- sl-page-title -->

        <div class="card pd-20">
            <h6 class="card-body-title">Slider DataTable</h6>
            <p class="mg-b-20 mg-sm-b-30">Searching, ordering and paging goodness will be immediately added to the table</p>


            <!--success alert -->
            <?php if (isset($_SESSION['productUpdate'])) { ?>
                <div class="alert alert-success text-center mg-t-5" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?= $_SESSION['productUpdate'] ?>
                </div>
            <?php  } ?>
            
            <!--success alert -->
            <?php if (isset($_SESSION['productTrash'])) { ?>
                <div class="alert alert-success text-center mg-t-5" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?= $_SESSION['productTrash'] ?>
                </div>
            <?php  } ?>

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive dataTable dtr-inline collapsed wrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>In Stock</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Image</th>
                            <th>Regular Price</th>
                            <th>Offer Price</th>
                            <th>Shorts Des</th>
                            <th>Long Des</th>
                            <th>Created</th>
                            <th>Gallery</th>
                            <th>Modify</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($productList) {
                            $i = 0;
                            foreach ($productList as $product) {
                                $i++;
                        ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $product['productName'] ?></td>
                                    <td><?= $product['productCode'] ?></td>
                                    <td><?= $product['productInStock'] ?></td>
                                    <td><?= $product['categoryName'] ?></td>
                                    <td><?= $product['brandName'] ?></td>
                                    <td><img src="../frontend/assets/images/products/<?= $product['productImage'] ?>" alt="<?= $product['productName'] ?>" width="100" height="100"></td>
                                    <td><?= $product['productPrice'] ?></td>
                                    <td><?= $product['productOfferPrice'] ?></td>
                                    <td><?= $format->textShorten($product['productShortDes']) ?></td>
                                    <td><?= $format->textShorten($product['productLongDes']) ?></td>
                                    <td><?= $format->formatDate($product['productRegistered']); ?>
                                        <br>
                                        ------
                                        <br>
                                        <?php
                                            $date = new DateTime($product['productRegistered']);
                                            $now = new DateTime();
                                            echo $date->diff($now)->format("%i minuts, %h hours, %d days and %y years ago");
                                        ?>
                                    </td>
                                    <td><a href="?productId=<?= $product['productId']; ?>" class="btn btn-info">View</a></td>
                                    <td><a href="sliderUpdate.php?productId=<?= $product['productId']; ?>" class="btn btn-warning mg-b-10">Edit</a>
                                        <br>
                                    <a data-id="<?= $product['productId']; ?>" class="btn btn-danger delete-button text-white" data-toggle="modal" data-target="#modaldemo2">Trash</a>
                                    </td>
                                </tr>
                        <?php

                            }
                        } ?>
                    </tbody>
                </table>
            </div><!-- table-wrapper -->
        </div><!-- card -->
    </div><!-- sl-pagebody -->
    <!-- SMALL MODAL -->
    <div id="modaldemo2" class="modal fade rounded">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content bd-0 tx-14">
                <div class="modal-header pd-x-20">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Notice</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-20">
                    <p class="mg-b-5">Wanted it into Trash </p>
                </div>

                <form action="slider.php" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="productId" value="" id="trash_id">
                        <div class="modal-footer justify-content-center">
                            <button type="submit" class="btn btn-danger pd-x-20">Confirm Trash</button>
                            <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div><!-- modal-dialog -->
        </div><!-- modal -->


    </div><!-- card -->


    <?php include('inc/footer.php'); ?>