<?php
require_once "../../php/database_connect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- header section include -->
    <?php
    include '../../includes/head_section.html';
    ?>
    <!-- app icon -->
    <link rel="icon" href="../../images/favicon.png" />
    <!-- custom css -->
    <link rel="stylesheet" href="../../assets/style.css" />

    <title>Aussie Garments</title>
</head>

<body>
    <!-- navigation  -->

    <nav class="nav-wrapper">
        <!-- top navigation -->
        <?php 
        include '../../includes/nav_top.php';
    ?>
        <!-- main nav bar -->
        <?php 
        include '../../includes/nav_main.php';
    ?>
    </nav>


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
              $getCart = "SELECT c.*, p.* FROM Cart c INNER JOIN Product p ON c.ProductID = p.ProductID";                     
              if ($cart = $connect->query($getCart)) {

                /**
                  $productIDs = array(); // Initialize an array to store product IDs                        
                  while ($r = $cart->fetch_assoc()) {
                      $productIDs[] = $r['ProductID']; // Store the ProductID from each row
                  }                        
                  // Construct the IN clause for the query
                  $inClause = implode(',', $productIDs);                    
                  // Build the query to fetch products based on the retrieved IDs
                  $fetch = "SELECT * FROM Product WHERE ProductID IN ($inClause)"; 
                  $result = $connect ->query($fetch);
                */

                                      
                  while ($row = $cart -> fetch_assoc()) { 
                      //product data
                      $product_id = $row['ProductID'];
                      $product_name = $row['Name'];
                      $description = $row['Description'];
                      $price = $row['Price'];
                      $stock = $row['QuantityInStock'];
                      $category = $row['CategoryID'];
                      $brand = $row['BrandID'];
                      $size = $row['SizeID'];
                      $imageOne = $row['ImageOne'];
                      //cart data
                      $quantity = $row['Quantity'];
                      $total_amount = $row['TotalAmount'];

            ?>
                        <tr class="">
                            <td><input type="checkbox" /></td>
                            <td>
                                <img src="../../../backend/src/pages/products/images/<?php echo $imageOne ?>"
                                    alt="Product Image" class="class-table-image rounded" />
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
                                    <span class="vertical-line quantity"><?php echo $quantity ?></span>
                                    <button class="btn btn-sm btn-outline-secondary increase-quantity">+</button>
                                    <span class="vertical-line"> | </span>
                                    <a href="">Save for Later</a>
                                    <span class="vertical-line"> | </span>
                                    <a class="text-danger delete-item" href="#"
                                        data-id="<?php echo $product_id ?>">Remove</a>
                                </div>
                            </td>
                            <td>$ <?php echo $price; ?></td>
                            <td>$ <?php echo $total_amount ?></td>
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

            <!-- Total Section -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total</h5>
                        <?php 
                $count = 0;
                $grand_total = 0;
                $getCart = "SELECT c.*, p.* FROM Cart c INNER JOIN Product p ON c.ProductID = p.ProductID";
                $result = $connect->query($getCart);
                if ($result && $result->num_rows > 0) { 
                    while ($row = $result->fetch_array()) {
                        $price = array($row['TotalAmount']); 
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
                        <p> Total Items:<span class=""> <?php echo $count  ?> </span> </p>
                        <p> Total Price: $ <span class="grand-total"> <?php echo $grand_total  ?> </span></p>
                        <div class="d-grid col">
                            <a href="./checkout.php" class="btn btn-primary px-5 py-2">Proceed to Checkout</a>
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

    <?php
        // Include footer
        include '../../includes/footer.php';
    ?>

    <!-- Optional JavaScript -->
    <!---Ajax to handle cart CRUD---->
    <script>
    $(document).on('click', '.decrease-quantity, .increase-quantity', function() {
        updateQuantity(this.parentElement);
    });

    $(document).on('click', '.delete-item', function() {
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
                    updateCartCounts(response.singleTotal, response.grandTotal);
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
                    updateCartCounts(response.cartCount, response.grandTotal);
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

    function updateCartCounts(singleTotal, grandTotal) {
        // Update cart product count and grand total in the HTML
        $('.cart-count').text(singleTotal);
        $('.grand-total').text(grandTotal);
    }
    </script>

</body>

</html>