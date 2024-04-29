<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Fontawesome icons -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <!-- custom font -->
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap");
    </style>

    <!-- Bootstrap CSS -->
    <!-- <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"
    /> -->

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <!-- app icon -->
    <link rel="icon" href="../../images/favicon.png" />
    <!-- custom css -->
    <link rel="stylesheet" href="../../assets/style.css" />

    <title>Aussie Garments</title>
  </head>
  <body>
    <!-- navigation  -->
    <!-- top navigation -->
    <nav class="nav-wrapper">
      <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-custom-top">
        <div class="container">
          <!-- Left side content -->
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <span class="nav-link phone-number">+610403876990 | </span>
            </li>
            <li class="nav-item">
              <span class="nav-link">info@aussiegarments.com.au</span>
            </li>
          </ul>

          <!-- Right side content -->
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="../../Pages/login.html">Login | </a></li>
            <li class="nav-item">
              <a class="nav-link" href="../../Pages/signup.html">Signup |</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Guest</a>
            </li>
          </ul>
        </div>
      </nav>

      <!-- main nav bar -->
      <nav class="navbar navbar-expand-lg navbar-light bg-none navbar-custom-main">
        <div class="container">
          <a class="navbar-brand" href="../index.html"><img src="../../images/AussieGarmentsLogo.svg" alt="Logo" /></a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link" href="#">Product</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Catalog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Site Map</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="modal" data-bs-target="#searchModal" href="#">
                  <i class="fas fa-search"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </nav>

    <!-- modal for search -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="searchModalLabel">Search</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="enter to search...." id="recipient-name" />
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary modalButton">Search</button>
          </div>
        </div>
      </div>
    </div>
    <!-- cart -->
    <div class="container cart-item-container mt-5 mb-5">
      <div class="row">
        <div class="col-md-8">
          <h5 class="mb-2">Checkout (<span class="text-primary">2 items</span>)</h5>

          <div class="accordion" id="checkoutAccordion">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button
                  class="accordion-button"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseOne"
                  aria-expanded="true"
                  aria-controls="collapseOne"
                >
                  <strong>Delivery Address</strong>
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#checkoutAccordion">
                <div class="accordion-body">
                  <div class="d-flex justify-content-between">
                    <p class="align-self-start">Someone Someone</p>
                    <p class="align-self-end">
                      <!-- address modal trigger  -->
                      <a href="#" data-bs-toggle="modal" data-bs-target="#addressEditModal"> Edit Address </a>
                    </p>
                  </div>

                  <span
                    >Unit 50 6 east street <br />
                    Lidcombe, NSW 2142</span
                  >
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button
                  class="accordion-button collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseTwo"
                  aria-expanded="false"
                  aria-controls="collapseTwo"
                >
                  <strong> Payment Method </strong>
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse show" data-bs-parent="#checkoutAccordion">
                <div class="accordion-body">
                  <div class="d-flex justify-content-between">
                    <p class="align-self-start"><strong> Paying with Master Card 4456</strong></p>
                    <p class="align-self-end">
                      <!-- payment edit modal trigger  -->
                      <a href="#" data-bs-toggle="modal" data-bs-target="#paymentEditModal"> Edit Payment </a>
                    </p>
                  </div>
                  <p>Billing Address:</p>
                  <span
                    >Unit 50 6 east street <br />
                    Lidcombe, NSW 2142</span
                  >
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button
                  class="accordion-button collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseThree"
                  aria-expanded="false"
                  aria-controls="collapseThree"
                >
                  <strong> Offers </strong>
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse show" data-bs-parent="#checkoutAccordion">
                <div class="accordion-body">
                  <p>15% off for boxing day sale</p>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button
                  class="accordion-button collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseThree"
                  aria-expanded="false"
                  aria-controls="collapseThree"
                >
                  <strong> Review items and delivery </strong>
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse show" data-bs-parent="#checkoutAccordion">
                <div class="accordion-body">
                  <strong>Arriving 22 Apr 2024 </strong>
                  <table class="table">
                    <thead>
                      <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="">
                        <td>
                          <img src="../../images/suggestions/suggestion3.png" alt="Product Image" class="class-table-image rounded" />
                        </td>
                        <td>
                          <h6>
                            Men's Sneakers Outdoor Sports Running Casual Shoes Breathable Lightweight Traning Jogging Non-Slip Gym Sneakers
                            (Black, Numeric_9_Point_5)
                          </h6>
                          <p class="text-success">$40</p>

                          <div class="col-auto">
                            <button class="btn btn-sm btn-outline-secondary">-</button>
                            <span class="vertical-line">2</span>
                            <button class="btn btn-sm btn-outline-secondary">+</button>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <img src="../../images/suggestions/suggestion3.png" alt="Product Image" class="class-table-image rounded" />
                        </td>
                        <td>
                          <h6>
                            Men's Sneakers Outdoor Sports Running Casual Shoes Breathable Lightweight Traning Jogging Non-Slip Gym Sneakers
                            (Black, Numeric_9_Point_5)
                          </h6>
                          <p class="text-success">$40</p>

                          <div class="col-auto">
                            <button class="btn btn-sm btn-outline-secondary">-</button>
                            <span class="vertical-line">2</span>
                            <button class="btn btn-sm btn-outline-secondary">+</button>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>

                  <div class="row">
                    <div class="col-4"><a href="./congrats.html" class="btn btn-primary px-5 py-2">Place your order</a></div>
                    <div class="col-8">
                      <ul style="list-style: none">
                        <li><span class="text-primary">Order Toatal:</span> <span class="text-primary">$80</span></li>
                        <li>
                          <small class="mt-2 text-justify">
                            By placing your order, you agree to Aussie's garment Conditions of Use & Sale, and Return Policy. Please read
                            our
                            <a href="#" style="text-decoration: none"> Privacy Notice </a> and our Interest Based Ads Notice.
                          </small>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
        $paypalUrl='https://www.sandbox.paypal.com/cgi-bin/webscr';
	$paypalId='sb-x2ojv29990908@personal.example.com';
?>
        <!-- Total Section -->
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <div class="d-grid col">
                <form action="<?php echo $paypalUrl; ?>" method="post" name="frmPayPal1">
                  <div class="panel price panel-red">
                        <input type="hidden" name="business" value="<?php echo $paypalId; ?>">
                        <input type="hidden" name="cmd" value="_xclick">
                        <input type="hidden" name="item_name" value="Aussie-Garments-Club">
                        <input type="hidden" name="item_number" value="2">
                        <input type="hidden" name="amount" value="20">
                        <input type="hidden" name="no_shipping" value="1">
                        <input type="hidden" name="currency_code" value="USD">
                        <input type="hidden" name="cancel_return" value="http://localhost/Aussie-Garments-Club/frontend/index.php">
                        <input type="hidden" name="return" value="http://localhost/Aussie-Garments-Club/frontend/payment_integration/success.php">  
                    <div class="panel-footer">
                      <button class="btn btn-primary px-5 py-2">Place your order</button>
                      <small class="mt-2 text-justify">
                        By placing your order, you agree to Aussie's garment Conditions of Use & Sale, and Return Policy. Please read our
                        <a href="#" style="text-decoration: none"> Privacy Notice </a> and our Interest Based Ads Notice.
                      </small>
                      <hr />
                      <h6>Order Summary</h6>
                      <div class="description-container">
                        <ul style="list-style: none">
                          <li><span class="">Style</span> <span class="text-muted">Casual</span></li>
                          <li><span class="">Weight</span> <span class="text-muted">200gm</span></li>
                          <li><span class="">Country</span> <span class="text-muted">Neapl</span></li>
                          <hr />
                          <li><span class="text-primary">Order Toatal:</span> <span class="text-primary">$59.00</span></li>
                        </ul>
                      </div>
                      <div class="bg-light mt-3 rounded p-2">
                        <h6 class="label">Quallifying Offers</h6>
                        <p class="text-muted">Free Shippling</p>
                        <p class="text-muted">10% promotion Code</p>
                      </div>
                    </div>
                  </div>
                  </form>

                <!-- <a href="./congrats.html" class="btn btn-primary px-5 py-2">Place your order</a>
                <small class="mt-2 text-justify">
                  By placing your order, you agree to Aussie's garment Conditions of Use & Sale, and Return Policy. Please read our
                  <a href="#" style="text-decoration: none"> Privacy Notice </a> and our Interest Based Ads Notice.
                </small>
                <hr />
                <h6>Order Summary</h6>
                <div class="description-container">
                  <ul style="list-style: none">
                    <li><span class="">Style</span> <span class="text-muted">Casual</span></li>
                    <li><span class="">Weight</span> <span class="text-muted">200gm</span></li>
                    <li><span class="">Country</span> <span class="text-muted">Neapl</span></li>
                    <hr />
                    <li><span class="text-primary">Order Toatal:</span> <span class="text-primary">$59.00</span></li>
                  </ul>
                </div>
                <div class="bg-light mt-3 rounded p-2">
                  <h6 class="label">Quallifying Offers</h6>
                  <p class="text-muted">Free Shippling</p>
                  <p class="text-muted">10% promotion Code</p>
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- suggestion for you -->
    <div class="container mt-5 mb-5 suggestion-container">
      <div class="row">
        <div class="col-md-6">
          <h6 class="mb-4">Saved for later <img src="../../images/assets/refresh 1.png" alt="Suggestion" /></h6>

          <div class="row-suggestion-items">
            <div class="row">
              <div class="col">
                <img src="../../images/suggestions/suggestion1.png" alt="Image 1" class="img-fluid" />
              </div>
              <div class="col">
                <img src="../../images/suggestions/suggestion2.png" alt="Image 2" class="img-fluid" />
              </div>
            </div>
            <div class="row mt-3">
              <div class="col">
                <img src="../../images/suggestions/suggestion3.png" alt="Image 3" class="img-fluid" />
              </div>
              <div class="col">
                <img src="../../images/suggestions/suggedtion3.1.png" alt="Image 4" class="img-fluid" />
              </div>
            </div>
            <p class="mt-3"><a href="#more-suggestions">More saved Items</a></p>
          </div>
        </div>
        <div class="col-md-6">
          <h6 class="mb-4">Purchase again <img src="../../images/assets/clock 1.png" alt="Purchase" /></h6>
          <div class="row-suggestion-items">
            <div class="row">
              <div class="col">
                <img src="../../images/suggestions/suggestion5.png" alt="Image 1" class="img-fluid" />
              </div>
              <div class="col">
                <img src="../../images/suggestions/suggestion1.png" alt="Image 2" class="img-fluid" />
              </div>
            </div>
            <div class="row mt-3">
              <div class="col">
                <img src="../../images/suggestions/suggestion3.png" alt="Image 3" class="img-fluid" />
              </div>
              <div class="col">
                <img src="../../images/suggestions/suggestion2.png" alt="Image 4" class="img-fluid" />
              </div>
            </div>
            <p class="mt-3"><a href="#more-purchases">More in purchase again</a></p>
          </div>
        </div>
      </div>
    </div>

    <!-- Address edit modal -->
    <div class="modal fade" id="addressEditModal" tabindex="-1" aria-labelledby="addressEditModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="addressEditModalLabel">Add Delivery Address</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">...</div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>

    <!-- payment method edit modal -->
    <div class="modal fade" id="paymentEditModal" tabindex="-1" aria-labelledby="paymentEditModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="paymentEditModalLabel">Add Payment Method</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">...</div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>

    <footer class="bg-light py-5 mt-5">
      <div class="container">
        <div class="row">
          <!-- Column 1 -->
          <div class="col-md-3">
            <h5>Contact</h5>
            <small>
              Acropolis Avenue<br />Rooty Hill, NSW 2766<br />P.O. Box: 19327<br />Phone No: +719087645243<br />Email:
              info@aussiegarments.com.au
            </small>
          </div>
          <!-- Column 2 -->
          <div class="col-md-3">
            <h5>Quick Links</h5>
            <ul class="list-unstyled">
              <small>
                <li><a href="#">HOME</a></li>
                <li><a href="#">PRODUCTS</a></li>
                <li><a href="#">ABOUT</a></li>
                <li><a href="#">CATALOG</a></li>
                <li><a href="#">SITE MAP</a></li>
              </small>
            </ul>
          </div>
          <!-- Column 3 -->
          <div class="col-md-3">
            <h5>We Support</h5>
            <img src="../../images/footer/pngimg.svg" alt="Support Image 1" />
            <img src="../../images/footer/mastercard-og-image.svg" alt="Support Image 2" />
          </div>
          <!-- Column 4 -->
          <div class="col-md-3">
            <img src="../../images/footer/Group 87.svg" alt="Main Image" class="img-fluid" />
          </div>
        </div>
        <!-- lower section -->
        <div class="row mt-3">
          <!-- Horizontal Line -->
          <hr class="mt-4 mb-0" />
          <div class="row mt-3">
            <div class="col-md-6">
              <!-- Left Content -->
              <p>
                <small>Aussie Garments Club | © Copyright 2024. All rights reserved.</small>
                <a href=""><i class="fab fa-facebook me-1"></i> </a>
                <a href=""><i class="fab fa-twitter me-1"></i> </a>
                <a href=""><i class="fab fa-youtube me-1"></i> </a>
                <a href=""><i class="fab fa-whatsapp me-1"></i> </a>
                <a href=""><i class="fab fa-instagram me-1"></i> </a>
              </p>
            </div>
            <div class="col-md-6 text-end">
              <!-- Right Content -->
              <a href=""><small>Feedback</small> </a>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script
      src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
      integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <!-- <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
      integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
      crossorigin="anonymous"
    ></script> -->
  </body>
</html>