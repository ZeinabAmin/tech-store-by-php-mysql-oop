<?php require_once "../app.php" ?>
<?php
if (!$session->has("adminId")) {
  $request->aredirect("login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>TechStore</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= AURL ?>/assets/vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="<?= AURL ?>/assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="<?= AURL ?>/assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="<?= AURL ?>/assets/vendors/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?= AURL ?>/assets/vendors/chartist/chartist.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="<?= AURL ?>/assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="<?= AURL ?>/assets/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex align-items-center">
        <a class="navbar-brand brand-logo" href="index.php">
          <img src="<?= AURL ?>/assets/images/logo.svg" alt="logo" class="logo-dark" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="index.php"><img src="<?= AURL ?>/assets/images/logo-mini.svg" alt="logo" /></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
        <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Welcome <?= $session->get("adminName") ?> dashboard!</h5>
        <ul class="navbar-nav navbar-nav-right ml-auto">
          <form class="search-form d-none d-md-block" action="#">
            <i class="icon-magnifier"></i>
            <input type="search" class="form-control" placeholder="Search Here" title="Search here">
          </form>
          <li class="nav-item"><a href="<?= AURL . "/orders.php" ?>" class="nav-link"><i class="icon-basket-loaded"></i></a></li>

          <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <img class="img-xs rounded-circle ml-2" src="<?= AURL ?>/assets/images/faces/face1.jpg" alt="Profile image"> <span class="font-weight-normal"> <?= $session->get("adminName") ?> </span></a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <div class="dropdown-header text-center">
                <img class="img-md rounded-circle" src="<?= AURL ?>/assets/images/faces/face1.jpg" alt="Profile image">
                <p class="mb-1 mt-3"><?= $session->get("adminName") ?></p>
                <p class="font-weight-light text-muted mb-0"><?= $session->get("adminEmail") ?></p>
              </div>
              <a href="<?= AURL ?>/profile.php" class="dropdown-item"><i class="dropdown-item-icon icon-user text-primary"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>
              <a href="<?= AURL ?>/handlers/handle-logout.php" class="dropdown-item"><i class="dropdown-item-icon icon-power text-primary"></i>Sign Out</a>
              <!-- <a class="dropdown-item"><i class="dropdown-item-icon icon-speech text-primary"></i> Messages</a>
              <a class="dropdown-item"><i class="dropdown-item-icon icon-energy text-primary"></i> Activity</a>
              <a class="dropdown-item"><i class="dropdown-item-icon icon-question text-primary"></i> FAQ</a> -->
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
              <div class="profile-image">
                <img class="img-xs rounded-circle" src="<?= AURL ?>/assets/images/faces/face1.jpg" alt="profile image">
                <div class="dot-indicator bg-success"></div>
              </div>
              <div class="text-wrapper">
                <p class="profile-name"><?= $session->get("adminName") ?></p>
                <p class="designation">Administrator</p>
              </div>
            </a>
          </li>
          <li class="nav-item">

            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?= AURL . "/add-product.php" ?>">Add Products</a></li>
                <li class=" nav-item"> <a class="nav-link" href="<?= AURL . "/add-category.php" ?>">Add Categoey</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= AURL . "/product.php" ?>">
              <span class="menu-title">Products</span>
              <i class="icon-globe menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= AURL . "/orders.php" ?>">
              <span class="menu-title">Orders</span>
              <i class="icon-book-open menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= AURL . "/category.php" ?>">
              <span class="menu-title">Category</span>
              <i class="icon-book-open menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= AURL . "/admins.php" ?>">
              <span class="menu-title">Admins</span>
              <i class="icon-book-open menu-icon"></i>
            </a>
          </li>

        </ul>
      </nav>

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">