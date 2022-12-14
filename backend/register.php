<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Starlight Responsive Bootstrap 4 Admin Template</title>

  <!-- vendor css -->
  <link href="assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
  <link href="assets/lib/Ionicons/css/ionicons.css" rel="stylesheet">
  <link href="assets/lib/select2/css/select2.min.css" rel="stylesheet">


  <!-- Starlight CSS -->
  <link rel="stylesheet" href="assets/css/starlight.css">
</head>

<body>

  <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-md-100v">

    <div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white">
      <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">starlight <span class="tx-info tx-normal">admin</span></div>
      <div class="tx-center mg-b-60">Professional Admin Template Design</div>
      <div class="form-group">
        <input type="password" class="form-control" placeholder="Enter your fullname">
      </div><!-- form-group -->
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Enter your username">
      </div><!-- form-group -->
      <div class="form-group">
        <input type="password" class="form-control" placeholder="Enter your password">
      </div><!-- form-group -->
      <div class="form-group">
        <label class="d-block tx-11 tx-uppercase tx-medium tx-spacing-1">Birthday</label>
        <div class="row row-xs">
          <div class="col-sm-4">
            <select class="form-control select2" data-placeholder="Month">
              <option label="Month"></option>
              <option value="1">January</option>
              <option value="2">February</option>
              <option value="3">March</option>
              <option value="4">April</option>
              <option value="5">May</option>
            </select>
          </div><!-- col-4 -->
          <div class="col-sm-4 mg-t-20 mg-sm-t-0">
            <select class="form-control select2" data-placeholder="Day">
              <option label="Day"></option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
          </div><!-- col-4 -->
          <div class="col-sm-4 mg-t-20 mg-sm-t-0">
            <select class="form-control select2" data-placeholder="Year">
              <option label="Year"></option>
              <option value="1">2010</option>
              <option value="2">2011</option>
              <option value="3">2012</option>
              <option value="4">2013</option>
              <option value="5">2014</option>
            </select>
          </div><!-- col-4 -->
        </div><!-- row -->
      </div><!-- form-group -->
      <div class="form-group tx-12">By clicking the Sign Up button below, you agreed to our privacy policy and terms of use of our website.</div>
      <button type="submit" class="btn btn-info btn-block">Sign Up</button>

      <div class="mg-t-40 tx-center">Already have an account? <a href="login.php" class="tx-info">Sign In</a></div>
    </div><!-- login-wrapper -->
  </div><!-- d-flex -->

  <script src="assets/lib/jquery/jquery.js"></script>
  <script src="assets/lib/popper.js/popper.js"></script>
  <script src="assets/lib/bootstrap/bootstrap.js"></script>
  <script src="assets/lib/select2/js/select2.min.js"></script>
  <script>
    $(function() {
      'use strict';

      $('.select2').select2({
        minimumResultsForSearch: Infinity
      });
    });
  </script>

</body>

</html>