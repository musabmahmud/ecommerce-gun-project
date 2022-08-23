<?php include '../classes/AdminLogin.php';

$adminLogin = new AdminLogin();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $adminUser = $_POST['adminUser'];
  $adminPass = $_POST['adminPass'];

  $loginCheck = $adminLogin->adminLogin($adminUser, $adminPass);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Meta -->
  <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
  <meta name="author" content="ThemePixels">

  <title>Starlight Responsive Bootstrap 4 Admin Template</title>

  <!-- Starlight CSS -->
  <link rel="stylesheet" href="assets/css/starlight.css">
</head>

<body>

  <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

    <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
      <div class="signin-logo tx-center tx-24 tx-bold tx-inverse mg-b-10">Gun Shop <span class="tx-info tx-normal">Admin</span></div>

      <form action="login.php" method="post">
        <div class="form-group">
          <label>User: <span class="tx-danger">*</span></label>
          <input type="text" class="form-control" placeholder="Enter your username" name="adminUser">
        </div><!-- form-group -->
        <div class="form-group">
          <label>Password: <span class="tx-danger">*</span></label>
          <input type="password" class="form-control" placeholder="Enter your password" name="adminPass">
        </div><!-- form-group -->

        <?php if (isset($loginCheck)) { ?>
          <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <?= $loginCheck ?>
          </div>
        <?php } ?>
        <a href="" class="tx-info tx-12 d-block mg-t-10 mg-b-10">Forgot password?</a>
        <button type="submit" class="btn btn-info btn-block">Sign In</button>
      </form>

      <!-- <div class="mg-t-60 tx-center">Not yet a member? <a href="register.php" class="tx-info">Sign Up</a></div> -->
    </div><!-- login-wrapper -->
  </div><!-- d-flex -->

  <script src="assets/lib/jquery/jquery.js"></script>
  <script src="assets/lib/popper.js/popper.js"></script>
  <script src="assets/lib/bootstrap/bootstrap.js"></script>

</body>

</html>