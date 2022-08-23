<?php
include('../classes/shipping.php');
include('inc/header.php');

$shipping = new Shipping();

//request to database
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $shippingId = $_POST['shippingId'];
    $shippingTrash = $shipping->shippingRestore($shippingId);
}

if (isset($_GET['shippingId']) || $_GET['shippingId'] != NULL) {
    $shippingDeleteId = $_GET['shippingId'];
    $shippingDelete = $shipping->shippingDelete($shippingDeleteId);
}

$shippingList = $shipping->shippingTrashList();
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

            <?php if (isset($_SESSION['shippingRestore'])) { ?>
                <div class="alert alert-success text-center mg-t-5" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?= $_SESSION['shippingRestore'] ?>
                </div>
            <?php  } ?>

            <?php if (isset($_SESSION['shippingDelete'])) { ?>
                <div class="alert alert-success text-center mg-t-5" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?= $_SESSION['shippingDelete'] ?>
                </div>
            <?php  } ?>

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive wrap">
                    <thead>
                        <tr>
                            <th>shipping ID</th>
                            <th>shipping City Name</th>
                            <th>shipping Cost</th>
                            <th>Restore</th>
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
                                    <td>
                                        <form action="shippingTrash.php" method="post">
                                            <input type="hidden" name="shippingId" value="<?= $shipping['shippingId']; ?>">
                                            <button type="submit" class="btn btn-warning">Restore</button>
                                        </form>
                                    </td>
                                    <td><a href="shippingTrash.php?shippingId=<?= $shipping['shippingId']; ?>" class="btn btn-danger">Delete</a></td>
                                </tr>
                        <?php
                            }
                        } ?>
                    </tbody>
                </table>
            </div><!-- table-wrapper -->
        </div><!-- card -->
    </div><!-- sl-pagebody -->

</div><!-- card -->


<?php include('inc/footer.php'); ?>