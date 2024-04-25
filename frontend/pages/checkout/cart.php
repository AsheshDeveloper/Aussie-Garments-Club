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
                <a class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">
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
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Search</h5>
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
          <h5>Your Cart</h5>
          <a href="#" class="unselect-all">Unselect All Items</a>
          <table class="table">
            <thead>
              <tr>
                <th></th>
                <th></th>
                <th></th>
                <th>Price</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
            <?php 
              require_once "../../php/database_connect.php";
              $getCart = "SELECT * FROM Cart";                     
              if ($cart = $connect->query($getCart)) {
                  $productIDs = array(); // Initialize an array to store product IDs                        
                  while ($r = $cart->fetch_assoc()) {
                      $productIDs[] = $r['ProductID']; // Store the ProductID from each row
                  }                        
                  // Construct the IN clause for the query
                  $inClause = implode(',', $productIDs);                    
                  // Build the query to fetch products based on the retrieved IDs
                  $fetch = "SELECT * FROM Product WHERE ProductID IN ($inClause)"; 
                  $result = $connect ->query($fetch);
                  if($result){                    
                  while ($row = $result -> fetch_assoc()) { 
                      $product_id = $row['ProductID'];
                      $product_name = $row['Name'];
                      $description = $row['Description'];
                      $price = $row['Price'];
                      $stock = $row['QuantityInStock'];
                      $category = $row['CategoryID'];
                      $brand = $row['BrandID'];
                      $size = $row['SizeID'];
                      $imageOne = $row['ImageOne'];

            ?>                 
              <tr class="">
                <td><input type="checkbox" /></td>
                <td>
                  <img src="../../../backend/src/pages/products/images/<?php echo $imageOne ?>" alt="Product Image" class="class-table-image rounded" />
                </td>
                <td>
                  <h6><?php echo $product_name; ?></h6>
                  <p class="text-success"><?php echo $stock; ?></p>
                  <p><?php echo $description; ?></p>
                  <p>Size:</p>
                  <p>Color:</p>
                  <div class="col-auto">
                    <input type="text" name="product_id" value="<?php echo $product_id ?>" hidden>
                    <button class="btn btn-sm btn-outline-secondary decrease-quantity">-</button>
                    <span class="vertical-line quantity">1</span>
                    <button class="btn btn-sm btn-outline-secondary increase-quantity">+</button>
                    <span class="vertical-line"> | </span>
                    <a href="">Save for Later</a>
                    <span class="vertical-line"> | </span>
                    <a class="text-danger delete-item" href="#" data-id="<?php echo $product_id ?>" >Remove</a>
                  </div>
                </td>
                <td>$ <?php echo $price; ?></td>
                <td>$60</td>
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
          }
            ?>
            </tbody>
          </table>
        </div>

        <!-- Total Section -->
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Total</h5>
              <?php 
                require_once "../../php/database_connect.php";
                $count = 0;
                $grand_total = 0;
                $getCart = "SELECT * FROM Cart";     
                if ($cart = $connect->query($getCart)) {
                  $productIDs = array(); // Initialize an array to store product IDs                        
                  while ($r = $cart->fetch_assoc()) {
                      $productIDs[] = $r['ProductID']; // Store the ProductID from each row
                  }  
                }  
                  // Construct the IN clause for the query
                  $inClause = implode(',', $productIDs);                    
                  // Build the query to fetch products based on the retrieved IDs
                  $fetch = "SELECT * FROM Product WHERE ProductID IN ($inClause)"; 
                  $result = $connect->query($fetch);
                  if ($result && $result->num_rows > 0) { 
                      while ($row = $result->fetch_array()) {
                          $price = array($row['Price']); 
                          $count++; 
                          // Calculate total price
                          $total = array_sum($price);
                          $grand_total += $total;
                      }                      
                  } else {
                      // Handle case where no rows are returned
                      $grand_total = 0;
                  }

              ?>
              <p>Total Items: <?php echo $count  ?>  </p>
              <p>Total Price: $ <?php echo $grand_total  ?></p>
              <div class="d-grid col">
                <a href="./checkout.html" class="btn btn-primary px-5 py-2">Proceed to Checkout</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- suggestion for you -->
    <div class="container mt-5 mb-5 suggestion-container">
      <div class="row">
        <h5 class="mb-4">Your Items</h5>

        <div class="col-md-6">
          <h6 class="mb-4">Saved for later <img src="../../images/assets/refresh 1.png" alt="Suggestion" /></h6>

          <div class="row-suggestion-items">
            <div class="row">
              <div class="col">
                <a href="">
                  <img src="../../images/suggestions/suggestion1.png" alt="Image 1" class="img-fluid" />
                </a>
              </div>
              <div class="col">
                <a href="">
                  <img src="../../images/suggestions/suggestion2.png" alt="Image 2" class="img-fluid" />
                </a>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col">
                <a href="">
                  <img src="../../images/suggestions/suggestion3.png" alt="Image 3" class="img-fluid" />
                </a>
              </div>
              <div class="col">
                <a href="">
                  <img src="../../images/suggestions/suggedtion3.1.png" alt="Image 4" class="img-fluid" />
                </a>
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
                <a href="">
                  <img src="../../images/suggestions/suggestion5.png" alt="Image 1" class="img-fluid" />
                </a>
              </div>
              <div class="col">
                <a href="">
                  <img src="../../images/suggestions/suggestion1.png" alt="Image 2" class="img-fluid" />
                </a>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col">
                <a href="">
                  <img src="../../images/suggestions/suggestion3.png" alt="Image 3" class="img-fluid" />
                </a>
              </div>
              <div class="col">
                <a href="">
                  <img src="../../images/suggestions/suggestion2.png" alt="Image 4" class="img-fluid" />
                </a>
              </div>
            </div>
            <p class="mt-3"><a href="#more-purchases">More in purchase again</a></p>
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
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
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

    <!---Ajax to handle cart CRUD---->
    <script>
        $(document).on('click', '.decrease-quantity, .increase-quantity', function () {
          updateQuantity(this.parentElement);
        });

        $(document).on('click', '.delete-item', function () {
            deleteItem(this.parentElement);
        });

        function updateQuantity(parentElement) {
            const quantityElement = parentElement.querySelector('.quantity');
            let currentQuantity = parseInt(quantityElement.textContent);
            const productId = parentElement.querySelector('[name="product_id"]').value;

            if (parentElement.contains(event.target) && event.target.classList.contains('decrease-quantity')) {
              // Check if the current quantity is already 1
              if (currentQuantity > 1) {  
                  currentQuantity -= 1;
              }
            } else if (parentElement.contains(event.target) && event.target.classList.contains('increase-quantity')) {
                currentQuantity += 1;
            }
            quantityElement.textContent = currentQuantity;
            // AJAX request to update cart item
            const newQuantity = currentQuantity;
            $.ajax({
                url: '../../php/function/functions.php',
                method: 'POST',
                data: {
                    action: 'update', // Set action to 'update'
                    product_id: productId,
                    quantity: newQuantity
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        // Update successful, you can handle the response as needed
                        console.log(response.success);
                    } else {
                        // Handle error
                        console.error(response.error);
                    }
                },
                error: function(xhr, status, error) {
                    // Handle AJAX error
                    console.error(error);
                }
            });
        }


        function deleteItem(parentElement) {
            const productId = parentElement.querySelector('[name="product_id"]').value;
            $.ajax({
                url: '../../php/function/functions.php',
                method: 'POST',
                data: {
                    action: 'delete', // Set action to 'delete'
                    product_id: productId
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        // Item deleted successfully, you can handle the response as needed
                        console.log(response.success);
                        // Optionally, you can remove the HTML element corresponding to the deleted item from the DOM
                        parentElement.remove();
                    } else {
                        // Handle error
                        console.error(response.error);
                    }
                },
                error: function(xhr, status, error) {
                    // Handle AJAX error
                    console.error(error);
                }
            });
        }
    </script>
    <!-- <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
      integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
      crossorigin="anonymous"
    ></script> -->
  </body>
</html>
