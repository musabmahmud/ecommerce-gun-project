<?php
include('../classes/brandSystem.php');
include('inc/header.php');

$brand = new brand();

//request to database
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $brandId = $_POST['brandId'];
    $brandTrash = $brand->brandRestore($brandId);
}

if (isset($_GET['brandId']) || $_GET['brandId'] != NULL) {
    $brandDeleteId = $_GET['brandId'];
    $brandDelete = $brand->brandDelete($brandDeleteId);
}

$brandList = $brand->brandTrashList();
?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">brand List</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title text-center text-uppercase">
            <h5>brand List</h5>
            <!-- <p>brand and more.</p> -->
        </div><!-- sl-page-title -->

        <div class="card pd-20">
            <h6 class="card-body-title">brand DataTable</h6>
            <p class="mg-b-20 mg-sm-b-30">Searching, ordering and paging goodness will be immediately added to the table</p>

            <?php if (isset($_SESSION['brandRestore'])) { ?>
                <div class="alert alert-success text-center mg-t-5" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?= $_SESSION['brandRestore'] ?>
                </div>
            <?php  } ?>

            <?php if (isset($_SESSION['brandDelete'])) { ?>
                <div class="alert alert-success text-center mg-t-5" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?= $_SESSION['brandDelete'] ?>
                </div>
            <?php  } ?>

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive wrap">
                    <thead>
                        <tr>
                            <th>brand ID</th>
                            <th>brand Name</th>
                            <th>Restore</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($brandList) {
                            $i = 0;
                            foreach ($brandList as $brand) {
                                $i++;
                        ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $brand['brandName'] ?></td>
                                    <td>
                                        <form action="brandTrash.php" method="post">
                                            <input type="hidden" name="brandId" value="<?= $brand['brandId']; ?>">
                                            <button type="submit" class="btn btn-warning">Restore</button>
                                        </form>
                                    </td>
                                    <td><a href="brandTrash.php?brandId=<?= $brand['brandId']; ?>" class="btn btn-danger">Delete</a></td>
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