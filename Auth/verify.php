<?php

include_once('../config.php');

if(isset($_REQUEST['token']) && isset($_REQUEST['uuid'])){
  $antiForgeryToken = $_REQUEST['token'];
  $uuid = $_REQUEST['uuid'];
  $fetched = fetchDataById(
    "tbl_user",
    "PK_ID",
    $uuid,
    connect()
  );
  $user = mysqli_fetch_array($fetched);
  $token = $user[6];
  if(!($token == $antiForgeryToken)){
    redirectWindow("$_HTMLROOTURI/Auth/expired");
  }
}
else{
  redirectWindow("$_HTMLROOTURI/Auth/expired");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="../assets/template/assets/img/favicon.png">

  <title>Set New Password - Point Of Sale</title>

  <!-- vendor css -->
  <link href="../assets/template/lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="../assets/template/lib/ionicons/css/ionicons.min.css" rel="stylesheet">

  <!-- DashForge CSS -->
  <link rel="stylesheet" href="../assets/template/assets/css/dashforge.css">
  <link rel="stylesheet" href="../assets/template/assets/css/dashforge.auth.css">
</head>

<body>

  <header class="navbar navbar-header navbar-header-fixed">
    <a href="page-forgot#" id="mainMenuOpen" class="burger-menu"><i data-feather="menu"></i></a>
    <div class="navbar-brand">
      <a href="index" class="df-logo">PointOf<span>Sale</span></a>
    </div><!-- navbar-brand -->
    <div id="navbarMenu" class="navbar-menu-wrapper">
      <div class="navbar-menu-header">
        <a href="index" class="df-logo">PoinOf<span>Sale</span></a>
        <a id="mainMenuClose" href="page-forgot#"><i data-feather="x"></i></a>
      </div><!-- navbar-menu-header -->
    </div><!-- navbar-menu-wrapper -->
  </header><!-- navbar -->

<style>
  .form-control, .resetBtn{
    width:30%;
    margin:6px;
  }
</style>


  <form method="post" action="auth" id="savepas">
    <div class="content content-fixed content-auth-alt">
      <div class="container ht-100p">
        <div class="ht-100p d-flex flex-column align-items-center justify-content-center">
          <div class="wd-150 wd-sm-250 mg-b-30"><img src="../../assets/img/img17.png" class="img-fluid" alt=""></div>
          <h4 class="tx-20 tx-sm-24">Create New Password</h4>
          <p class="tx-color-03 mg-b-40">Please reset your password and please do not use your old password</p>
          <input type="hidden" value="<?= $_REQUEST['token'] ?>" name="token">
          <input type="hidden" value="<?= $_REQUEST['uuid'] ?>" name="uuid">
        
          <input name="NewPassword" type="password" class="form-control" placeholder="Choose your password">

          <input name="RepeatPassword" type="password" class="form-control" placeholder="Repeat your password">

          <button name="SavePassword" class="resetBtn btn btn-primary" type="submit">Submit</button>

          </div>
      </div><!-- container -->
    </div><!-- content -->
  </form>
  <footer class="footer">
    <div>
      <span>&copy; <span id="year"></span> PointOfSale All Rights Reserved </span>
    </div>
  </footer>


  <script src="../assets/template/lib/jquery/jquery.min.js"></script>

  <script src="../assets/template/lib/jquery/jquery.min.js"></script>
  <script src="../assets/template/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/template/lib/feather-icons/feather.min.js"></script>
  <script src="../assets/template/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>

  <script src="../assets/template/assets/js/dashforge.js"></script>

  <!-- append theme customizer -->
  <script src="../assets/template/lib/js-cookie/js.cookie.js"></script>
  <script src="../assets/template/assets/js/dashforge.settings.js"></script>
  <script>
    var d = new Date();
    var n = d.getFullYear();
    document.getElementById("year").innerHTML = n;

    var form = $()
    
  </script>

</body>

</html>