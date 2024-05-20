<?php
session_start();
// if (!isset($_SESSION["username"])) {
//     $_SESSION["error"] = 'Please login!!';
//     header("Location: ../authentication/login.php", true, 301); // Redirect to login page
//     exit();
// }
require_once("../../php/database_connect.php"); 
// find authenticated user details
$findUser = "SELECT * FROM users WHERE email = '{$_SESSION['email']}'";
$fetchUser = mysqli_query($connect, $findUser);
$user = null; // Initialize user variable
if(mysqli_num_rows($fetchUser) > 0){
    $user = mysqli_fetch_array($fetchUser);
    $userID = $user['id'];
}

// Fetch cart data
$getCart = "SELECT c.*, p.* FROM Cart c INNER JOIN Product p ON c.ProductID = p.ProductID WHERE c.UserID='$userID'";
$cartData = array(); // Initialize cart data array
if ($cart = $connect->query($getCart)) {
    while ($row = $cart->fetch_assoc()) { 
        $cartData[] = $row;
    }
}

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
                        if($cartData && $cartData >0){      
                            foreach($cartData as $row) { 
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
                                $user_id = $row['UserID'];

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
                                    <input type="text" name="request" value="<?php echo $user_id ?>" hidden>
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
                        if ($cartData && count($cartData) > 0) { 
                            foreach($cartData as $row) {
                                $price = $row['TotalAmount']; 
                                $count++; 
                                // Calculate total price
                                $total = $price;
                                $grand_total += $total;
                            }
                            echo '<p>Total Items: <span class="item-count">' . $count . '</span></p>';
                            echo '<p>Total Price: $<span class="grand-total">' . $grand_total . '</span></p>';
                            echo '<div class="d-grid col">';
                            echo '<a href="./checkout.php" class="btn btn-primary px-5 py-2">Proceed to Checkout</a>';
                            echo '</div>';
                        } else {
                            // Handle case where no rows are returned
                            echo '<p>No items in the cart.</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>

        </div>
    </div>

<!-- modal for search -->
<div class="modal fade" id="guestModal" tabindex="-1" aria-labelledby="guestModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="guestModalLabel">Search</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="guestForm" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter First Name" name="guest_first_name"  />
                        <input type="text" class="form-control" placeholder="Enter Middle Name" name="guest_middle_name"  />
                        <input type="text" class="form-control" placeholder="Enter Last Name" name="guest_last_name"  />
                        <input type="text" class="form-control" placeholder="Enter Email" name="guest_email"  />
                        <input type="text" class="form-control" placeholder="Enter Contact Number" name="guest_contact"  />
                        <input type="text" class="form-control" placeholder="Enter Address" name="guest_address"  />                        
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary modalButton" id="guestButton">Search</button>
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
        const userId = parentElement.querySelector('[name="request"]').value;

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
                quantity: newQuantity,
                user: userId,
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
        const userId = parentElement.querySelector('[name="request"]').value;

        $.ajax({
            url: '../../php/function/functions.php',
            method: 'POST',
            data: {
                action: 'delete', // Set action to 'delete'
                product_id: productId,
                user: userId,
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