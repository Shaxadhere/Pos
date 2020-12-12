<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../assets/template/assets/img/favicon.png">

    <title>Forgot Password - Point Of Sale</title>

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
    <form method="post" action="auth">
    <div class="content content-fixed content-auth-alt">
      <div class="container d-flex justify-content-center ht-100p">
        <div class="mx-wd-300 wd-sm-450 ht-100p d-flex flex-column align-items-center justify-content-center">
          <div class="wd-80p wd-sm-300 mg-b-15"><img src="../assets/template/assets/img/img18.png" class="img-fluid" alt=""></div>
          <h4 class="tx-20 tx-sm-24">Reset your password</h4>
          <p class="tx-color-03 mg-b-30 tx-center">Enter your email address and we will send you a link to reset your password.</p>
          <div class="wd-100p d-flex flex-column flex-sm-row mg-b-40">
            <input type="email" class="form-control wd-sm-250 flex-fill" placeholder="abc@example.com" name="email">
            <input type="submit" class="btn btn-brand-02 mg-sm-l-10 mg-t-10 mg-sm-t-0" value="Reset Password" name="forgot">
          </div>
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
    </script>

  </body>
</html>
