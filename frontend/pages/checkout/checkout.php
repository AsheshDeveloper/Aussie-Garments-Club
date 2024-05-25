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

// fetch default address
// SQL query
$getDefaultAddress = "SELECT * FROM `address` WHERE id = '{$_SESSION['userId']}' AND defaultAddress = 1";
$getDefault = mysqli_query($connect, $getDefaultAddress);
$defAddress = null;
// Fetch result
if (mysqli_num_rows($getDefault) > 0) {
    // Output data of each row
    $defAddress = mysqli_fetch_array($getDefault);
    $aptUnitSuit = $defAddress['aptUnitSuit']; // Adjust this to match your column name
    $street = $defAddress['street']; // Adjust this to match your column name
    $citySuburb = $defAddress['citySuburb']; // Adjust this to match your column name
    $stateTerritory = $defAddress['stateTerritory']; // Adjust this to match your column name
    $Postcode = $defAddress['Postcode']; // Adjust this to match your column name
} 

// Fetch user ID from session and sanitize
$userId = $_SESSION['userId'] ?? '';
$userId = filter_var($userId, FILTER_SANITIZE_STRING);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addressID'])) {
    // Sanitize the address ID
    $addressId = filter_var($_POST['addressID'], FILTER_SANITIZE_STRING);
    
    // Reset all addresses to defaultAddress = 0 for this user
    $resetQuery = "UPDATE `address` SET defaultAddress = 0 WHERE id = ?";
    $resetStmt = $connect->prepare($resetQuery);
    $resetStmt->bind_param("s", $userId);
    if (!$resetStmt->execute()) {
        die("Reset query failed: " . $connect->error);
    }

    // Set the selected address as the default
    $updateQuery = "UPDATE `address` SET defaultAddress = 1 WHERE id = ? AND addressID = ?";
    $updateStmt = $connect->prepare($updateQuery);
    $updateStmt->bind_param("ss", $userId, $addressId);
    if (!$updateStmt->execute()) {
        die("Update query failed: " . $connect->error);
    }

    // Redirect to avoid resubmission on page refresh
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Fetch all addresses of the user
$allAddressQuery = "SELECT * FROM `address` WHERE id = ?";
$allAddressStmt = $connect->prepare($allAddressQuery);
$allAddressStmt->bind_param("s", $userId);
$allAddressStmt->execute();
$result = $allAddressStmt->get_result();

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
                <?php 
                $count = 0;
                $grand_total = 0;
                if ($cartData && $cartData > 0) { 
                    foreach($cartData as $row) {
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
                <h5 class="mb-2">Checkout (<span
                        class="text-primary"><?php echo ($count > 1) ? $count.' Items' : $count.' Item'  ?> </span>)
                </h5>

                <div class="accordion" id="checkoutAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <strong>Delivery</strong>
                            </button>
                        </h2>

                        <div id="collapseOne" class="accordion-collapse collapse show"
                            data-bs-parent="#checkoutAccordion">
                            <div class="accordion-body">
                                <!-- Radio buttons for Shipment and Pick up -->
                                <div class="mb-1 p-3 checkout-delivery-radio">
                                    <input type="radio" id="shipment" name="delivery_type" value="shipment" checked>
                                    <label for="shipment">Shipment</label>
                                </div>
                                <div class="mb-3 p-3 checkout-delivery-radio">
                                    <input type="radio" id="pickup" name="delivery_type" value="pickup">
                                    <label for="pickup">Pick up</label>
                                </div>

                                <!-- Div for Shipment -->
                                <div id="shipmentDiv">
                                    <div class="d-flex justify-content-between">
                                        <p class="align-self-start">
                                            <?php 
                                            if(!empty($_SESSION['userId'])){

                                                echo $_SESSION['username'];
                                            }
                                        ?>
                                        </p>
                                        <p class="align-self-end">
                                            <!-- address modal trigger  -->
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#addressEditModal">
                                                Change </a>
                                        </p>
                                    </div>

                                    <span><?php echo 'Unit '. $aptUnitSuit; ?> <?php echo $street; ?><br />
                                        <?php echo $citySuburb . ', ' . $stateTerritory . ' ' . $Postcode; ?></span>
                                </div>

                                <!-- Div for Pick up -->
                                <div id="pickupDiv" style="display: none;">
                                    <div class="click-and-collect mt-4 p-3">
                                        <h5 class="">Click and Collect</h5>
                                        <div class="mb-2">
                                            <div style="float: right">Closes 10pm</div>
                                            shopping at
                                            <span>
                                                <span class="text-success">Lidcombe</span>
                                                <div class="mb-3 mt-2">
                                                    <label class="form-check-label mb-1" for="email"> Cloose your store
                                                    </label>

                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected>Choose ypur pickup store</option>
                                                        <option value="1">One (in stock)</option>
                                                        <option value="2">Two (in stock)</option>
                                                        <option value="3">Three (in stock)</option>
                                                    </select>
                                                </div>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <strong> Payment Method </strong>
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse show"
                            data-bs-parent="#checkoutAccordion">
                            <div class="accordion-body">
                                <div class="d-flex justify-content-between">
                                    <p class="align-self-start"><strong> Paying with Master Card 4456</strong></p>
                                    <p class="align-self-end">
                                        <!-- payment edit modal trigger  -->
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#paymentEditModal"> Chage
                                        </a>
                                    </p>
                                </div>
                                <p>Billing Address:</p>
                                <span>Unit 50 6 east street <br />
                                    Lidcombe, NSW 2142</span>
                                <hr />
                                <a href="">setup paypal <i class="fa-brands fa-paypal"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <strong> Offers </strong>
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse show"
                            data-bs-parent="#checkoutAccordion">
                            <div class="accordion-body">
                                <p>15% off for boxing day sale</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <strong> Review items and delivery </strong>
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse show"
                            data-bs-parent="#checkoutAccordion">
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
                                        <?php                                               
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
                                            <td>
                                                <img src="data:image/jpeg;base64,<?php echo base64_encode($imageOne); ?>" alt="Product Image"
                                                    class="class-table-image rounded" />
                                            </td>
                                            <td>
                                                <h5><?php echo $product_name; ?></h6>
                                                    <p>Size:</p>
                                                    <p>Color:</p>
                                            </td>
                                            <td class="text-success">Price: $ <?php echo $price; ?></td>
                                            <td class="text-success">Total Price: $ <?php echo $total_amount ?></td>
                                        </tr>
                                        <?php
                                            } 
                                        ?>

                                    </tbody>
                                </table>

                                <?php /**  ?>
                                <div class="row">
                                    <div class="col-4">
                                        <a href="./congrats.html" class="btn btn-primary px-5 py-2">Place
                                            your order</a>
                                    </div>
                                    <div class="col-8">
                                        <ul style="list-style: none">
                                            <li><span class="text-primary">Quantity</span> <span
                                                    class="text-muted"><?php echo $count  ?> Item(s)</span> <span
                                                    class="text-primary">$ <?php echo $grand_total  ?></span></li>
                                            <li>
                                                <small class="mt-2 text-justify">
                                                    By placing your order, you agree to Aussie's garment Conditions of
                                                    Use & Sale, and Return Policy. Please read
                                                    our
                                                    <a href="#" style="text-decoration: none"> Privacy Notice </a> and
                                                    our Interest Based Ads Notice.
                                                </small>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <?php */ ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                    $paypalUrl='https://www.sandbox.paypal.com/cgi-bin/webscr';
                $paypalId='sb-6azpk30044866@business.example.com';
            ?>
            <!-- Total Section -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-grid col">
                            <?php 
                                $count = 0;
                                $grand_total = 0;
                                if ($cartData && $cartData > 0) { 
                                    foreach($cartData as $row) {
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
                            <div class="panel price panel-red">
                                <form action="<?php echo $paypalUrl; ?>" method="post">
                                    <input type="hidden" name="business" value="<?php echo $paypalId; ?>">
                                    <input type="hidden" name="cmd" value="_xclick">
                                    <input type="hidden" name="item_name" value="Aussie-Garments-Club">
                                    <input type="hidden" name="item_number" value="<?php echo $count; ?>">
                                    <input type="hidden" name="amount" value="<?php echo $grand_total; ?>">
                                    <input type="hidden" name="no_shipping" value="1">
                                    <input type="hidden" name="currency_code" value="AUD">
                                    <input type="hidden" name="cancel_return"
                                        value="http://localhost/aussie-garments-club/frontend/index.php">
                                    <input type="hidden" name="return"
                                        value="http://localhost/aussie-garments-club/frontend/payment_integration/success.php">
                                    <button class="btn btn-primary px-5 w-100 py-2 mb-1">Place your order</button>
                                </form>
                                <div class="panel-footer">
                                    <small class="mt-2 text-justify">
                                        By placing your order, you agree to Aussie's garment Conditions of Use &
                                        Sale, and Return Policy. Please read our
                                        <a href="#" style="text-decoration: none"> Privacy Notice </a> and our
                                        Interest Based Ads Notice.
                                    </small>
                                    <hr />
                                    <h6>Order Summary</h6>
                                    <div class="description-container">
                                        <ul style="list-style: none">
                                            <li><span class="">Style</span> <span class="text-muted">Casual</span>
                                            </li>
                                            <li><span class="">Weight</span> <span class="text-muted">200gm</span>
                                            </li>
                                            <li><span class="">Country</span> <span class="text-muted">Australia</span>
                                            </li>
                                            <hr />
                                            <li><span class="">Quantity</span> <span
                                                    class="text-muted"><?php echo $count  ?> Item(s)</span>
                                            </li>
                                            <li><span class="text-primary">Order Total:</span> <span
                                                    class="text-primary">$ <?php echo $grand_total  ?></span></li>
                                        </ul>
                                    </div>
                                    <div class="bg-light mt-3 rounded p-2">
                                        <h6 class="label">Quallifying Offers</h6>
                                        <p class="text-muted">Free Shippling</p>
                                        <p class="text-muted">10% promotion Code</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <!-- Address edit modal -->
    <div class="modal modal-lg fade checkout-modal-add-payment" id="addressEditModal" tabindex="-1"
        aria-labelledby="addressEditModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addressEditModalLabel">Change Delivery Address</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3 ml-5">
                        <h6 class="mb-3">Select form your list of address</h6>
                        <form method="POST" action="">
                            <div id="addressList">
                                <?php if ($result->num_rows > 0): ?>
                                <?php while ($row = $result->fetch_assoc()): ?>
                                <?php
                                        // Sanitize address data
                                        $aptUnitSuit = htmlspecialchars($row['aptUnitSuit']);
                                        $street = htmlspecialchars($row['street']);
                                        $citySuburb = htmlspecialchars($row['citySuburb']);
                                        $stateTerritory = htmlspecialchars($row['stateTerritory']);
                                        $Postcode = htmlspecialchars($row['Postcode']);
                                        $isDefault = $row['defaultAddress'] == 1 ? 'checked' : '';

                                        // Generate the full address string
                                        $fullAddress = "$aptUnitSuit $street, $citySuburb, $stateTerritory $Postcode";
                                        ?>
                                <div class="form-check">
                                    <input class="form-check-input radio-design" type="radio" name="addressID"
                                        id="address<?php echo $row['addressID']; ?>"
                                        value="<?php echo $row['addressID']; ?>" <?php echo $isDefault; ?> />
                                    <label class="form-check-label" for="address<?php echo $row['addressID']; ?>">
                                        <?php echo $fullAddress; ?>
                                    </label>
                                </div>
                                <?php endwhile; ?>
                                <?php else: ?>
                                <p>No addresses found.</p>
                                <?php endif; ?>
                            </div>
                            <hr>

                            <div class="">
                                <button class="btn btn-primary mr-2" type="submit">Update Default Address</button>
                                <a href="../profile/add_address.php" class="btn btn-outline-primary">Add New Address
                                    <span> <i class="fas fa-address-card"></i></span>
                                </a>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- payment method edit modal -->
    <div class="modal modal-lg fade checkout-modal-add-payment" id="paymentEditModal" tabindex="-1"
        aria-labelledby="paymentEditModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="paymentEditModalLabel">Add Payment Method</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <h6 class="mb-3">Select form your list of payment options</h6>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Name on card</th>
                                    <th scope="col">Expires on</th>

                                    <!-- <th scope="col">Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="">
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault1" />
                                            <label class="form-check-label" for="flexRadioDefault1"> Paying with
                                                Master Card 4456</label>
                                        </div>
                                    </td>

                                    <td>Samir Samir</td>
                                    <td>08/2025</td>

                                    2
                                </tr>
                                <tr class="">
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault1" />
                                            <label class="form-check-label" for="flexRadioDefault1"> Paying with
                                                Master Card 4456</label>
                                        </div>
                                    </td>

                                    <td>Samir Samir</td>
                                    <td>08/2025</td>


                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr />

                    <h6>Add New Card</h6>
                    <form class="" action="" method="post">
                        <div class="mb-3">
                            <label class="form-check-label mb-1" for="fullName"> Card Number</label>
                            <input type="number" class="form-control" name="fullName" id="fullName"
                                placeholder="eg: 4567 XXXX XXXX XXXX" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-check-label mb-1" for="fullName"> Name on card</label>
                            <input type="text" class="form-control" name="fullName" id="fullName"
                                placeholder="eg: samir samir" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-check-label mb-1" for="fullName"> Expiration date</label>
                            <input type="date" class="form-control" name="fullName" id="fullName"
                                placeholder="eg: 4567 XXXX XXXX XXXX" required />
                        </div>

                        <div class="mb-3">
                            <label class="form-check-label mb-1" for="fullName">Security code(CVV/CVC)</label>
                            <input type="number" class="form-control" name="fullName" id="fullName"
                                placeholder="eg: 4567 XXXX XXXX XXXX" required />
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="defaultAddress" />
                            <label class="form-check-label" for="defaultAddress">Use as my default
                                payment</label>
                        </div>

                        <a href="./checkout.html" type="submit" type="button" class="btn btn-primary p-2 mb-3 mt-4">
                            Use this payment method</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
        // Include footer
        include '../../includes/footer.php';
    ?>
    <!-- Optional JavaScript -->

    <script>
    // Get the radio buttons
    const shipmentRadio = document.getElementById('shipment');
    const pickupRadio = document.getElementById('pickup');

    // Get the divs
    const shipmentDiv = document.getElementById('shipmentDiv');
    const pickupDiv = document.getElementById('pickupDiv');

    // Add event listener to shipment radio button
    shipmentRadio.addEventListener('change', function() {
        if (this.checked) {
            shipmentDiv.style.display = 'block';
            pickupDiv.style.display = 'none';
        }
    });

    // Add event listener to pickup radio button
    pickupRadio.addEventListener('change', function() {
        if (this.checked) {
            pickupDiv.style.display = 'block';
            shipmentDiv.style.display = 'none';
        }
    });
    </script>

</body>


</html>