<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../assets/template/assets/img/favicon.png">

    <title>Login - Financo</title>

    <!-- vendor css -->
    <link href="../assets/template/lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../assets/template/lib/ionicons/css/ionicons.min.css" rel="stylesheet">

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="../assets/template/assets/css/dashforge.css">
    <link rel="stylesheet" href="../assets/template/assets/css/dashforge.auth.css">
  </head>
  <body>

    <header class="navbar navbar-header navbar-header-fixed">
      <a href="page-signin.html#" id="mainMenuOpen" class="burger-menu"><i data-feather="menu"></i></a>
      <div class="navbar-brand">
        <a href="../index" class="df-logo">Fin<span>anco</span></a>
      </div><!-- navbar-brand -->
      <div id="navbarMenu" class="navbar-menu-wrapper">
        <div class="navbar-menu-header">
          <a href="../index" class="df-logo">Fin<span>anco</span></a>
          <a id="mainMenuClose" href="page-signin.html"><i data-feather="x"></i></a>
        </div><!-- navbar-menu-header -->
      </div><!-- navbar-menu-wrapper -->
      <div class="navbar-right">
        <a href="../Purchase" class="btn btn-buy"><i data-feather="shopping-bag"></i> <span>Purchase</span></a>
      </div><!-- navbar-right -->
    </header><!-- navbar -->

    <div class="content content-fixed content-auth">
      <div class="container">
        <div class="media align-items-stretch justify-content-center ht-100p pos-relative">
          <div class="media-body align-items-center d-none d-lg-flex">
            <div class="mx-wd-600">
              <img src="../assets/template/assets/img/img15.png" class="img-fluid" alt="">
            </div>
          </div><!-- media-body -->
          <div class="sign-wrapper mg-lg-l-50 mg-xl-l-60">
            <div class="wd-100p">
              <h3 class="tx-color-01 mg-b-5">Sign In</h3>
              <p class="tx-color-03 tx-16 mg-b-40">Welcome back! Please signin to continue.</p>
            
            
            
              <form method="post" action="auth">
              <div class="form-group">
                <label>Email address</label>
                <input type="email" name="email" class="form-control" placeholder="yourname@yourmail.com">
              </div>
              <div class="form-group">
                <div class="d-flex justify-content-between mg-b-5">
                  <label class="mg-b-0-f">Password</label>
                  <a href="forgotPassword" class="tx-13">Forgot password?</a>
                </div>
                <input type="password" name="password" class="form-control" placeholder="Enter your password">
              </div>
              <input name="login" type="submit" class="btn btn-brand-02 btn-block" value="Sign In" />
              </form>





              <div class="divider-text">or</div>
              <div class="tx-13 mg-t-20 tx-center">Don't have an account? <a href="../Purchase">Purchase now</a></div>
            </div>
          </div><!-- sign-wrapper -->
        </div><!-- media -->
      </div><!-- container -->
    </div><!-- content -->

    <footer class="footer">
      <div>
        <span>&copy; 2019 Financo All Rights Reserved </span>
        <span>Created by <a href="muxad.com">Muxad.com</a></span>
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

  </body>
</html>
