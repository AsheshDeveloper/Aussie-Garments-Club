<?php
session_start();
// Check if user is already logged in
if (!isset($_SESSION["username"])) {
    $_SESSION["error"] = 'Please login!!';
    header("Location: ../../frontend/pages/authentication/login.php", true, 301); // Redirect to login page
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Aussie Garment - Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/feather/feather.css" />
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css" />
    <link rel="stylesheet" href="assets/vendors/typicons/typicons.css" />
    <link rel="stylesheet" href="assets/vendors/simple-line-icons/css/simple-line-icons.css" />
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css" />
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/select.dataTables.min.css" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/vertical-layout-light/style.css" />
    <!-- endinject -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
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
            <a class="navbar-brand brand-logo" href="./index.php">
              <img src="./assets/images/AussieGarmentsLogo.svg" alt="logo" />
            </a>
            <a class="navbar-brand brand-logo-mini" href="./index.php">
              <img src="./assets/images/logo-mini.svg" alt="logo" />
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
                <img class="img-xs rounded-circle" src="./assets/images/faces/profile.png" alt="Profile image" />
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" src="./assets/images/faces/face8.jpg" alt="Profile image" />
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
              <a class="nav-link" href="./index.php">
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
                  <li class="nav-item"><a class="nav-link" href="./pages/address/address.php">Address</a></li>
                  <li class="nav-item"><a class="nav-link" href="./pages/brands/brands.php">Brands</a></li>
                  <li class="nav-item"><a class="nav-link" href="./pages/category/category.php">Category</a></li>
                  <li class="nav-item"><a class="nav-link" href="./pages/products/product.php">Product</a></li>
                  <li class="nav-item"><a class="nav-link" href="./pages/size/size.php">Size</a></li>
                  <li class="nav-item"><a class="nav-link" href="./pages/order/order.php">Customer Order</a></li>
                </ul>
              </div>
            </li>
            <!-- template menus -->            
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-sm-12">
                <div class="home-tab">
                  <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <!-- home list -->
                      <li class="nav-item" role="presentation">
                        <button
                          class="nav-link active"
                          id="home-tab"
                          data-bs-toggle="tab"
                          data-bs-target="#home"
                          type="button"
                          role="tab"
                          aria-controls="home"
                          aria-selected="true"
                        >
                          Home
                        </button>
                      </li>
                      <!-- men list -->
                      <li class="nav-item" role="presentation">
                        <button
                          class="nav-link"
                          id="men-tab"
                          data-bs-toggle="tab"
                          data-bs-target="#men"
                          type="button"
                          role="tab"
                          aria-controls="men"
                          aria-selected="false"
                        >
                          Men
                        </button>
                      </li>
                      <!-- women list -->
                      <li class="nav-item" role="presentation">
                        <button
                          class="nav-link"
                          id="women-tab"
                          data-bs-toggle="tab"
                          data-bs-target="#women"
                          type="button"
                          role="tab"
                          aria-controls="women"
                          aria-selected="false"
                        >
                          Women
                        </button>
                      </li>
                      <!-- kids list -->
                      <li class="nav-item" role="presentation">
                        <button
                          class="nav-link"
                          id="kids-tab"
                          data-bs-toggle="tab"
                          data-bs-target="#kids"
                          type="button"
                          role="tab"
                          aria-controls="kids"
                          aria-selected="false"
                        >
                          Kids
                        </button>
                      </li>
                      <!-- baby list -->
                      <li class="nav-item" role="presentation">
                        <button
                          class="nav-link"
                          id="baby-tab"
                          data-bs-toggle="tab"
                          data-bs-target="#baby"
                          type="button"
                          role="tab"
                          aria-controls="baby"
                          aria-selected="false"
                        >
                          Baby
                        </button>
                      </li>
                    </ul>

                    <div>
                      <div class="btn-wrapper">
                        <a href="#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i> Share</a>
                        <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                        <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Export</a>
                      </div>
                    </div>
                  </div>

                  <!-- tab contents -->
                  <div class="tab-content" id="myTabContent">
                    <!-- home -->
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="statistics-details d-flex align-items-center justify-content-between">
                            <div>
                              <p class="statistics-title">Page Views<span>/day</span></p>
                              <h3 class="rate-percentage">7,682</h3>
                              <p>
                                <a href="#" class="fw-bold text-primary">Show all <i class="mdi mdi-arrow-right ms-2"></i></a>
                              </p>
                            </div>
                            <div>
                              <p class="statistics-title">New User Sessions/day</p>
                              <h3 class="rate-percentage">68</h3>
                              <p>
                                <a href="#" class="fw-bold text-primary">Show all <i class="mdi mdi-arrow-right ms-2"></i></a>
                              </p>
                            </div>
                            <div class="d-none d-md-block">
                              <p class="statistics-title">Guest Sessions/day</p>
                              <h3 class="rate-percentage">68.8</h3>
                              <p>
                                <a href="#" class="fw-bold text-primary">Show all <i class="mdi mdi-arrow-right ms-2"></i></a>
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- total sales and total stock -->
                      <div class="row">
                        <div class="col">
                          <div class="stretch-card">
                            <div class="card">
                              <div class="card-body">
                                <div>
                                  <p class="statistics-title">Total Sales</p>
                                  <h3 class="rate-percentage">32,0000</h3>
                                  <p>
                                    <a href="#" class="fw-bold text-primary">Show all <i class="mdi mdi-arrow-right ms-2"></i></a>
                                  </p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col">
                          <div class="stretch-card">
                            <div class="card">
                              <div class="card-body">
                                <div>
                                  <p class="statistics-title">Total Stock</p>
                                  <h3 class="rate-percentage">32,0000</h3>
                                  <p>
                                    <a href="#" class="fw-bold text-primary">Show all <i class="mdi mdi-arrow-right ms-2"></i></a>
                                  </p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- to do list -->
                      <div class="row-sm mt-4">
                        <div class="col">
                          <div class="card">
                            <div class="card-body">
                              <div class="d-flex justify-content-between align-items-center">
                                <h4 class="card-title card-title-dash">Todo list</h4>
                                <div class="add-items d-flex mb-0">
                                  <button class="add btn btn-icons btn-rounded btn-primary todo-list-add-btn text-white me-0 pl-12p">
                                    <i class="mdi mdi-plus"></i>
                                  </button>
                                </div>
                              </div>
                              <div class="list-wrapper">
                                <ul class="todo-list todo-list-rounded">
                                  <li class="d-block">
                                    <div class="form-check w-100">
                                      <label class="form-check-label">
                                        <input class="checkbox" type="checkbox" /> Lorem Ipsum is simply dummy text of the printing
                                        <i class="input-helper rounded"></i>
                                      </label>
                                      <div class="d-flex mt-2">
                                        <div class="ps-4 text-small me-3">24 June 2020</div>
                                        <div class="badge badge-opacity-warning me-3">Due tomorrow</div>
                                        <i class="mdi mdi-flag ms-2 flag-color"></i>
                                      </div>
                                    </div>
                                  </li>
                                  <li class="d-block">
                                    <div class="form-check w-100">
                                      <label class="form-check-label">
                                        <input class="checkbox" type="checkbox" /> Lorem Ipsum is simply dummy text of the printing
                                        <i class="input-helper rounded"></i>
                                      </label>
                                      <div class="d-flex mt-2">
                                        <div class="ps-4 text-small me-3">23 June 2020</div>
                                        <div class="badge badge-opacity-success me-3">Done</div>
                                      </div>
                                    </div>
                                  </li>
                                  <li>
                                    <div class="form-check w-100">
                                      <label class="form-check-label">
                                        <input class="checkbox" type="checkbox" /> Lorem Ipsum is simply dummy text of the printing
                                        <i class="input-helper rounded"></i>
                                      </label>
                                      <div class="d-flex mt-2">
                                        <div class="ps-4 text-small me-3">24 June 2020</div>
                                        <div class="badge badge-opacity-success me-3">Done</div>
                                      </div>
                                    </div>
                                  </li>
                                  <li class="border-bottom-0">
                                    <div class="form-check w-100">
                                      <label class="form-check-label">
                                        <input class="checkbox" type="checkbox" /> Lorem Ipsum is simply dummy text of the printing
                                        <i class="input-helper rounded"></i>
                                      </label>
                                      <div class="d-flex mt-2">
                                        <div class="ps-4 text-small me-3">24 June 2020</div>
                                        <div class="badge badge-opacity-danger me-3">Expired</div>
                                      </div>
                                    </div>
                                  </li>
                                </ul>
                              </div>
                              <p class="mt-3">
                                <a href="#" class="fw-bold text-primary">Show all <i class="mdi mdi-arrow-right ms-2"></i></a>
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- men women kids and baby total stock -->
                      <div class="row mt-4">
                        <div class="col">
                          <div class="stretch-card">
                            <div class="card">
                              <div class="card-body">
                                <div>
                                  <p class="statistics-title">Total Sales</p>
                                  <h3 class="rate-percentage">32,0000</h3>
                                  <p>
                                    <a href="#" class="fw-bold text-primary">Show all <i class="mdi mdi-arrow-right ms-2"></i></a>
                                  </p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col">
                          <div class="stretch-card">
                            <div class="card">
                              <div class="card-body">
                                <div>
                                  <p class="statistics-title">Total Stock</p>
                                  <h3 class="rate-percentage">32,0000</h3>
                                  <p>
                                    <a href="#" class="fw-bold text-primary">Show all <i class="mdi mdi-arrow-right ms-2"></i></a>
                                  </p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col">
                          <div class="stretch-card">
                            <div class="card">
                              <div class="card-body">
                                <div>
                                  <p class="statistics-title">Total Stock</p>
                                  <h3 class="rate-percentage">32,0000</h3>
                                  <p>
                                    <a href="#" class="fw-bold text-primary">Show all <i class="mdi mdi-arrow-right ms-2"></i></a>
                                  </p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col">
                          <div class="stretch-card">
                            <div class="card">
                              <div class="card-body">
                                <div>
                                  <p class="statistics-title">Total Stock</p>
                                  <h3 class="rate-percentage">32,0000</h3>
                                  <p>
                                    <a href="#" class="fw-bold text-primary">Show all <i class="mdi mdi-arrow-right ms-2"></i></a>
                                  </p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- men -->
                    <div class="tab-pane fade" id="men" role="tabpanel" aria-labelledby="men-tab">...men</div>
                    <!-- women -->
                    <div class="tab-pane fade" id="women" role="tabpanel" aria-labelledby="women-tab">...women</div>
                    <!-- kids -->
                    <div class="tab-pane fade" id="kids" role="tabpanel" aria-labelledby="kids-tab">...kids</div>
                    <!-- baby -->
                    <div class="tab-pane fade" id="baby" role="tabpanel" aria-labelledby="baby-tab">...baby</div>
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
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/template.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/proBanner.js"></script>
    <!-- <script src="./../assets/js/Chart.roundedBarCharts.js"></script> -->
    <!-- End custom js for this page-->
  </body>
</html>
