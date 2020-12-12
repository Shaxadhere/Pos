<?php

session_start();

if (isset($_SESSION['USER'])) {
  if ($_SESSION['USER']['FK_UserType'] != 2) {
    http_response_code(401);
  }
} else {
  redirectWindow("../../auth");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="../..//assets/template/assets/img/favicon.png">

  <title></title>

  <!-- vendor css -->
  <link href="../..//assets/template/lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="../..//assets/template/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="../..//assets/template/lib/jqvmap/jqvmap.min.css" rel="stylesheet">
  <link href="../..//assets/template/lib/select2/css/select2.min.css" rel="stylesheet">
  <link href="../..//assets/searchbox.css" rel="stylesheet">

  <!-- DashForge CSS -->
  <link rel="stylesheet" href="../..//assets/template/assets/css/dashforge.css">
  <link rel="stylesheet" href="../..//assets/template/assets/css/dashforge.dashboard.css">

  <!--datatables-->
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.jqueryui.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.jqueryui.min.css">

</head>

<body>

  <aside class="aside aside-fixed">
    <div class="aside-header">
      <a href="index" class="aside-logo">PointOf<span>Sale</span></a>
      <a href="index" class="aside-menu-link">
        <i data-feather="menu"></i>
        <i data-feather="x"></i>
      </a>
    </div>
    <div class="aside-body">
      <div class="aside-loggedin">
        <div class="d-flex align-items-center justify-content-start">
          <a href="#loggedinMenu" data-toggle="collapse" class="avatar"><img src="../..//Uploads/avatar.jpg" class="rounded-circle" alt=""></a>
        </div>
        <div class="aside-loggedin-user">
          <a href="#loggedinMenu" class="d-flex align-items-center justify-content-between mg-b-2" data-toggle="collapse">
            <h6 class="tx-semibold mg-b-0"><?= $_SESSION['USER']['FullName'] ?></h6>
            <i data-feather="chevron-down"></i>
          </a>
          <p class="tx-color-03 tx-12 mg-b-0">Manager</p>
        </div>
        <div class="collapse" id="loggedinMenu">
          <ul class="nav nav-aside mg-b-0">
            <li class="nav-item"><a href="#" class="nav-link"><i data-feather="edit"></i> <span>Edit Profile</span></a></li>
            <li class="nav-item"><a href="logout" class="nav-link"><i data-feather="log-out"></i> <span>Sign Out</span></a></li>
          </ul>
        </div>
      </div><!-- aside-loggedin -->
      <ul class="nav nav-aside">
        <li class="nav-item"><a href="index" class="nav-link"><i data-feather="home"></i> <span>Dashboard</span></a></li>

        <li class="nav-label mg-t-25">Features</li>
        <li class="nav-item"><a href="Customers" class="nav-link"><i data-feather="package"></i> <span>Customers</span></a></li>
        <li class="nav-item"><a href="Sales" class="nav-link"><i data-feather="activity"></i> <span>Sales</span></a></li>

        <li class="nav-label mg-t-25">Manage Products</li>
        <li class="nav-item"><a href="Products" class="nav-link"><i data-feather="package"></i> <span>Products</span></a></li>
        <li class="nav-item"><a href="Stocks" class="nav-link"><i data-feather="package"></i> <span>Stocks</span></a></li>
        <li class="nav-item"><a href="Company" class="nav-link"><i data-feather="package"></i> <span>Companies</span></a></li>
        <li class="nav-item"><a href="Category" class="nav-link"><i data-feather="activity"></i> <span>Categories</span></a></li>
      </ul>
    </div>
  </aside>

  <div class="content ht-100v pd-0">
    <div class="content-header">
      <div class="content-search">
        <i data-feather="search"></i>
        <input type="search" class="form-control" placeholder="Search...">
      </div>
      <nav class="nav">
        <a href="#" class="nav-link"><i data-feather="help-circle"></i></a>
        <a href="#" class="nav-link"><i data-feather="grid"></i></a>
        <a href="#" class="nav-link"><i data-feather="align-left"></i></a>
      </nav>
    </div><!-- content-header -->

    <div class="content-body">
      <div class="container pd-x-0">