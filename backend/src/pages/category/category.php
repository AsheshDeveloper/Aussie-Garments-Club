<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Aussie Garment - Admin</title>
    <!-- plugins:css -->

    <link rel="stylesheet" href="../../assets/vendors/feather/feather.css" />
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="../../assets/vendors/ti-icons/css/themify-icons.css" />
    <link rel="stylesheet" href="../../assets/vendors/typicons/typicons.css" />
    <link rel="stylesheet" href="../../assets/vendors/simple-line-icons/css/simple-line-icons.css" />
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css" />
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css" />
    <link rel="stylesheet" type="text/css" href="../../assets/js/select.dataTables.min.css" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../assets/css/vertical-layout-light/style.css" />
    <!-- endinject -->
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
  </head>

  <body class="with-welcome-text">
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
          <div class="me-3">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
              <span class="icon-menu"></span>
            </button>
          </div>
          <div>
            <a class="navbar-brand brand-logo" href="../../index.html">
              <img src="../../assets/images/AussieGarmentsLogo.svg" alt="logo" />
            </a>
            <a class="navbar-brand brand-logo-mini" href="../../index.html">
              <img src="../../assets/images/logo-mini.svg" alt="logo" />
            </a>
          </div>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-top">
          <ul class="navbar-nav">
            <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
              <h1 class="welcome-text">Hello, <span class="text-black fw-bold">Admin</span></h1>
            </li>
          </ul>
          <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown d-none d-lg-block">
              <a
                class="nav-link dropdown-bordered dropdown-toggle dropdown-toggle-split"
                id="messageDropdown"
                href="#"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Select Category
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="messageDropdown">
                <a class="dropdown-item py-3">
                  <p class="mb-0 font-weight-medium float-left">Select category</p>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item"> Product </a>
                <a class="dropdown-item preview-item"> category </a>
                <a class="dropdown-item preview-item"> user </a>
                <a class="dropdown-item preview-item"> product type </a>
              </div>
            </li>

            <li class="nav-item d-none d-lg-block"></li>
            <li class="nav-item">
              <form class="search-form" action="#">
                <i class="icon-search"></i>
                <input type="search" class="form-control" placeholder="Search Here" title="Search here" />
              </form>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                <i class="icon-bell"></i>
                <span class="count"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="notificationDropdown">
                <a class="dropdown-item py-3 border-bottom">
                  <p class="mb-0 font-weight-medium float-left">You have 4 new notifications</p>
                  <span class="badge badge-pill badge-primary float-right">View all</span>
                </a>
                <a class="dropdown-item preview-item py-3">
                  <div class="preview-thumbnail">
                    <i class="mdi mdi-alert m-auto text-primary"></i>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject fw-normal text-dark mb-1">Application Error</h6>
                    <p class="fw-light small-text mb-0">Just now</p>
                  </div>
                </a>
                <a class="dropdown-item preview-item py-3">
                  <div class="preview-thumbnail">
                    <i class="mdi mdi-settings m-auto text-primary"></i>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject fw-normal text-dark mb-1">Settings</h6>
                    <p class="fw-light small-text mb-0">Private message</p>
                  </div>
                </a>
                <a class="dropdown-item preview-item py-3">
                  <div class="preview-thumbnail">
                    <i class="mdi mdi-airballoon m-auto text-primary"></i>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject fw-normal text-dark mb-1">New user registration</h6>
                    <p class="fw-light small-text mb-0">2 days ago</p>
                  </div>
                </a>
              </div>
            </li>

            <li class="nav-item dropdown d-none d-lg-block user-dropdown">
              <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle" src="../../assets/images/faces/profile.png" alt="Profile image" />
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" src="../../assets/images/faces/face8.jpg" alt="Profile image" />
                  <p class="mb-1 mt-3 font-weight-semibold">Allen Moreno</p>
                  <p class="fw-light text-muted mb-0">allenmoreno@gmail.com</p>
                </div>
                <a class="dropdown-item"
                  ><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile
                  <span class="badge badge-pill badge-danger">1</span></a
                >
                <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-message-text-outline text-primary me-2"></i> Messages</a>
                <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-calendar-check-outline text-primary me-2"></i> Activity</a>
                <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-help-circle-outline text-primary me-2"></i> FAQ</a>
                <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="../../index.php">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>

            <!-- pages side links -->
            <li class="nav-item nav-category">Pages and More</li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#pages" aria-expanded="false" aria-controls="pages">
                <i class="menu-icon mdi mdi-text-box-multiple"></i>
                <span class="menu-title">Pages</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="pages">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><a class="nav-link" href="../address/address.html">Address</a></li>
                  <li class="nav-item"><a class="nav-link" href="../brands/brands.html">Brands</a></li>
                  <li class="nav-item"><a class="nav-link" href="../category/category.html">Category</a></li>
                  <li class="nav-item"><a class="nav-link" href="../products/product.html">Product</a></li>
                  <li class="nav-item"><a class="nav-link" href="../size/size.html">Size</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item nav-category">Admin To Do</li>
            <li class="nav-item nav-category">Product Info</li>

            <!-- template menus -->
            <li class="nav-item nav-category">Forms</li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                <i class="menu-icon mdi mdi-card-text-outline"></i>
                <span class="menu-title">Form elements</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><a class="nav-link" href="../forms/basic_elements.html">Basic Elements</a></li>
                </ul>
              </div>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-sm-12">
                <div class="card card-rounded">
                  <div class="card-body">
                    <div class="d-sm-flex justify-content-between align-items-start">
                      <div>
                        <h4 class="card-title card-title-dash">Category</h4>
                        <p class="card-subtitle card-subtitle-dash">List of all category</p>
                        <?php
                        if(!empty($_SESSION['message'])) { ?>                                    
                            <div class="alert alert-success" role="alert">
                                    <?=$_SESSION['message'] ?>
                            </div>                    
                        <?php } ?> 
                      </div>
                      <div>
                        <a href="../category/category_create.php" class="btn btn-primary text-white mb-0 me-0" type="button"
                          ><i class="mdi mdi-plus me-1"></i>New Category</a
                        >
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Description</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                    require_once "../../php/database_connect.php";
                    $fetch = "SELECT * FROM category";
                    if ($result = $connect ->query($fetch)) {
                        while ($row = $result -> fetch_assoc()) { 
                            //print_r($row);
                            $category_id = $row['CategoryID'];
                            $category_name = $row['CategoryName'];
                            $description = $row['Description'];
                ?>   
                          <tr>
                          <td><?php echo $category_id; ?></td>
                          <td><?php echo $category_name; ?></td>
                          <td><?php echo $description; ?></td>
                            <td>
                              <a class="btn btn-inverse-dark btn-rounded btn-icon" href="../category/category_edit.php?id=<?php echo $category_id; ?>"><i class="mdi mdi-pencil"></i></a>
                              <a class="btn btn-inverse-danger btn-rounded btn-icon" href="../category/category_delete.php?id=<?php echo $category_id; ?>"><i class="mdi mdi-delete"></i></a>
                            </td>
                          </tr>                          
                          <?php
                    } 
                    ?>
            <?php } else{  ?>
                <tr class="trow">
                    <td colspan="5">No data found!</td>
                </tr>
                    
            <?php
            }
            ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Aussie Garment admin pannel </span>
              <span class="float-none float-sm-end d-block mt-1 mt-sm-0 text-center">Copyright © 2024. All rights reserved.</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../../assets/vendors/progressbar.js/progressbar.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/template.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../../assets/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="../../assets/js/dashboard.js"></script>
    <script src="../../assets/js/proBanner.js"></script>
    <!-- <script src="./../assets/js/Chart.roundedBarCharts.js"></script> -->
    <!-- End custom js for this page-->
  </body>
</html>
