<?php
include('../classes/shipping.php');
include('inc/header.php');

$shipping = new Shipping();

//request to database
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $shippingId = $_POST['shippingId'];
    $shippingTrash = $shipping->shippingTrash($shippingId);
}


$shippingList = $shipping->shippingList();
?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">shipping List</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title text-center text-uppercase">
            <h5>shipping List</h5>
            <!-- <p>shipping and more.</p> -->
        </div><!-- sl-page-title -->

        <div class="card pd-20">
            <h6 class="card-body-title">shipping DataTable</h6>
            <p class="mg-b-20 mg-sm-b-30">Searching, ordering and paging goodness will be immediately added to the table</p>

            <?php if (isset($_SESSION['shippingUpdated'])) { ?>
                <div class="alert alert-success text-center mg-t-5" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?= $_SESSION['shippingUpdated'] ?>
                </div>
            <?php  } ?>
            <?php if (isset($_SESSION['shippingTrash'])) { ?>
                <div class="alert alert-success text-center mg-t-5" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?= $_SESSION['shippingTrash'] ?>
                </div>
            <?php  } ?>

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive wrap">
                    <thead>
                        <tr>
                            <th>shipping ID</th>
                            <th>shipping City</th>
                            <th>shipping Cost</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($shippingList) {
                            $i = 0;
                            foreach ($shippingList as $shipping) {
                                $i++;
                        ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $shipping['city'] ?></td>
                                    <td><?= $shipping['shippingCost'] ?></td>
                                    <td><a href="shippingUpdate.php?shippingId=<?= $shipping['shippingId']; ?>" class="btn btn-warning">Edit</a></td>
                                    <td>
                                        <a data-id="<?= $shipping['shippingId']; ?>" class="btn btn-danger delete-button text-white" data-toggle="modal" data-target="#modaldemo2">Trash</a>
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

                <form action="shipping.php" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="shippingId" value="" id="trash_id">
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