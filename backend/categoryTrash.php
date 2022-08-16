<?php
include('../classes/categorySystem.php');
include('inc/header.php');

$category = new Category();

//request to database
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $categoryId = $_POST['categoryId'];
    $categoryTrash = $category->categoryRestore($categoryId);
}

if (isset($_GET['categoryId']) || $_GET['categoryId'] != NULL) {
    $categoryDeleteId = $_GET['categoryId'];
    $categoryDelete = $category->categoryDelete($categoryDeleteId);
}

$categoryList = $category->categoryTrashList();
?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">Category List</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title text-center text-uppercase">
            <h5>Category List</h5>
            <!-- <p>Category and more.</p> -->
        </div><!-- sl-page-title -->

        <div class="card pd-20">
            <h6 class="card-body-title">Category DataTable</h6>
            <p class="mg-b-20 mg-sm-b-30">Searching, ordering and paging goodness will be immediately added to the table</p>

            <?php if (isset($_SESSION['categoryRestore'])) { ?>
                <div class="alert alert-success text-center mg-t-5" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?= $_SESSION['categoryRestore'] ?>
                </div>
            <?php  } ?>

            <?php if (isset($_SESSION['categoryDelete'])) { ?>
                <div class="alert alert-success text-center mg-t-5" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?= $_SESSION['categoryDelete'] ?>
                </div>
            <?php  } ?>

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive wrap">
                    <thead>
                        <tr>
                            <th>Category ID</th>
                            <th>Category Name</th>
                            <th>Restore</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($categoryList) {
                            $i = 0;
                            foreach ($categoryList as $category) {
                                $i++;
                        ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $category['categoryName'] ?></td>
                                    <td>
                                        <form action="categoryTrash.php" method="post">
                                            <input type="hidden" name="categoryId" value="<?= $category['categoryId']; ?>">
                                            <button type="submit" class="btn btn-warning">Restore</button>
                                        </form>
                                    </td>
                                    <td><a href="categoryTrash.php?categoryId=<?= $category['categoryId']; ?>" class="btn btn-danger">Delete</a></td>
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