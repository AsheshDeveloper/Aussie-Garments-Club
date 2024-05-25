<?php
session_start();
require_once("../../php/database_connect.php"); 

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
                <h5 class="mb-2">Checkout</h5>

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

                                <div class="row mb-3">
                                    <h6 class="mb-3">Select address(guys this comes after adding address </h6>
                                    <div class="pr-3 pl-3 pb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault1" />
                                            <label class="form-check-label" for="flexRadioDefault1"> Unit 50 6 east
                                                street
                                                Hurstville, NSW 2144</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault2" checked />
                                            <label class="form-check-label" for="flexRadioDefault2"> Unit 50 6 east
                                                street
                                                Lidcombe, NSW 2142 </label>
                                        </div>
                                    </div>

                                </div>

                                <!-- Div for Shipment -->
                                <div id="shipmentDiv">
                                    <div class="col mx-auto">
                                        <div class="card p-2 mt-4 mb-5">

                                            <div class="card-body">
                                                <form class="" action="" method="post">

                                                    <!-- error message -->
                                                    <?php 
                                                        if(isset($errors)) 
                                                        { 
                                                        foreach($errors as $error){ 
                                                    ?>
                                                    <div class="alert alert-danger" role="alert">
                                                        <?=$error ?>
                                                    </div>
                                                    <?php } 
                                                    
                                                    } 
                                                    ?>

                                                    <!-- success message -->
                                                    <?php 
                                                        if(isset($success)) 
                                                        { 
                                                        foreach($success as $success){ 
                                                    ?>
                                                    <div class="alert alert-success" role="alert">
                                                        <?=$success ?>
                                                    </div>
                                                    <?php } 
                                                    
                                                    } 
                                                    ?>
                                                    <div class="mb-3">
                                                        <label class="form-check-label mb-1" for="countryRegion">
                                                            Country/Region
                                                        </label>
                                                        <select name="countryRegion" class="form-select"
                                                            id="countryRegion" aria-label="countryRegion">
                                                            <option selected>Choose Country or Region</option>
                                                            <?php
                                                                // Fetching country data from the API
                                                                $api_url = 'https://restcountries.com/v3.1/all';
                                                                $response = file_get_contents($api_url);
                                                                $countries = json_decode($response, true);

                                                                // Sorting countries by name
                                                                usort($countries, function($a, $b) {
                                                                    return strcmp($a['name']['common'], $b['name']['common']);
                                                                });

                                                                // Loop through the sorted countries and populate the select dropdown
                                                                foreach ($countries as $country) {
                                                                    $name = $country['name']['common'];
                                                                    // $code = $country['cca2'];
                                                                    echo "<option value='$name'>$name</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-check-label mb-1"
                                                            for="address">Address</label>

                                                        <input type="text" class="form-control mb-2" name="address"
                                                            id="address" placeholder="eg: unit 1105" required />

                                                        <input type="text" class="form-control" name="address1"
                                                            id="addressAutoComplete" placeholder="eg: 30 example street"
                                                            required />
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-check-label mb-1"
                                                            for="Postcode">Postcode</label>
                                                        <input type="number" class="form-control" name="Postcode"
                                                            id="Postcode" placeholder="eg: 2245" required />
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-check-label mb-1"
                                                            for="citySuburb">City/Suburb</label>
                                                        <select name="citySuburb" class="form-select" id="citySuburb"
                                                            aria-label="citySuburb" disabled required>
                                                            <option selected>Choose City or Suburb</option>
                                                        </select>
                                                        <small class="text-info">enter postcode to select city or
                                                            suburb</small>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-check-label mb-1"
                                                            for="stateTerritory">State/Territory</label>

                                                        <select name="stateTerritory" class="form-select"
                                                            id="stateTerritory" aria-label="stateTerritory">
                                                            <option selected>Choose state or Territory</option>
                                                            <option value="NSW">New South Wales (NSW)</option>
                                                            <option value="VCT">Victoria (VCT)</option>
                                                            <option value="QLD">Queensland (QLD)</option>
                                                            <option value="WA">Western Australia (WA)</option>
                                                            <option value="SA">South Australia (SA)</option>
                                                            <option value="Tas">Tasmania (Tas)</option>
                                                            <option value="NT">Northern Territory (NT)</option>
                                                            <option value="ACT">Australian Capital Territory (ACT)
                                                            </option>
                                                        </select>

                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-check-label mb-1" for="fullName"> Full name
                                                            (Address
                                                            For)</label>

                                                        <input type="text" class="form-control" name="full_name"
                                                            id="fullName" placeholder="eg: harry kane" required />
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="defaultAddress" name="defaultAddress" />
                                                        <label class="form-check-label" for="defaultAddress">Make
                                                            Default Address
                                                            ?</label>
                                                    </div>
                                                    <button type="submit" name="submit"
                                                        class="btn btn-primary p-2 mb-3 mt-4">Deliver Here
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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
                                <div class="col mx-auto">
                                    <div class="card p-2 mt-4 mb-5">
                                        <div class="card-body">
                                            <form class="" action="" method="post">
                                                <div class="mb-3">
                                                    <label class="form-check-label mb-1" for="fullName"> Card
                                                        Number</label>
                                                    <input type="number" class="form-control" name="fullName"
                                                        id="fullName" placeholder="eg: 4567 XXXX XXXX XXXX" required />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-check-label mb-1" for="fullName"> Name on
                                                        card</label>
                                                    <input type="text" class="form-control" name="fullName"
                                                        id="fullName" placeholder="eg: samir samir" required />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-check-label mb-1" for="fullName"> Expiration
                                                        date</label>
                                                    <input type="date" class="form-control" name="fullName"
                                                        id="fullName" placeholder="eg: 4567 XXXX XXXX XXXX" required />
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-check-label mb-1" for="fullName">Security
                                                        code(CVV/CVC)</label>
                                                    <input type="number" class="form-control" name="fullName"
                                                        id="fullName" placeholder="eg: see back of your debit card"
                                                        required />
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="defaultAddress" />
                                                    <label class="form-check-label" for="defaultAddress">Use as my
                                                        default
                                                        payment</label>
                                                </div>

                                                <a href="./card.html" type="submit" type="button"
                                                    class="btn btn-primary p-2 mb-3 mt-4">Pay with this card</a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <a href="">Pay with paypal <i class="fa-brands fa-paypal"></i></a>
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
                                                <img src="../../images/suggestions/suggestion3.png" alt="Product Image"
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
                                    <input type="hidden" name="cancel_return"
                                        value="http://localhost/Aussie-Garments-Club/frontend/index.php">
                                    <input type="hidden" name="return"
                                        value="http://localhost/Aussie-Garments-Club/frontend/payment_integration/success.php">
                                    <div class="panel-footer">
                                        <button class="btn btn-primary px-5 w-100 py-2 mb-1">Place your order</button>
                                        <small class="mt-2 text-justify">
                                            By placing your order, you agree to Aussie's garment Conditions of Use &
                                            Sale, and Return Policy. Please read our
                                            <a href="#" style="text-decoration: none"> Privacy Notice </a> and our
                                            Interest Based Ads Notice.
                                        </small>
                                        <hr />
                                        <h6>Order Summary</h6>
                                        <div class="description-container">
                                            <?php 
                                            $count = 0;
                                            $grand_total = 0;
                                            if (isset($cartData) && $cartData > 0) { 
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
                                            <ul style="list-style: none">
                                                <li><span class="">Style</span> <span class="text-muted">Casual</span>
                                                </li>
                                                <li><span class="">Weight</span> <span class="text-muted">200gm</span>
                                                </li>
                                                <li><span class="">Country</span> <span
                                                        class="text-muted">Australia</span>
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

    <!-- suggestion for you -->
    <div class="container mt-5 mb-5 suggestion-container">
        <div class="row">
            <h5 class="mb-4">Your Items</h5>

            <div class="col-md-6">
                <h6 class="mb-4">Saved for later <img src="../../images/assets/refresh 1.png" alt="Suggestion" />
                </h6>

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
                <h6 class="mb-4">Purchase again <img src="../../images/assets/clock 1.png" alt="Purchase" />
                </h6>
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

    <script>
    // Initialize address autocomplete
    function initAutocomplete() {
        var input = document.getElementById('addressAutoComplete');
        var options = {
            types: ['geocode'], // Limit search to geographic addresses
            componentRestrictions: {
                country: 'AU'
            } // Bias predictions towards Australia
        };

        var autocomplete = new google.maps.places.Autocomplete(input, options);
    }

    // Load the Google Places API
    google.maps.event.addDomListener(window, 'load', initAutocomplete);
    </script>


    <!-- disabeling the city/ suburb select field -->
    <script>
    var postcodeInput = document.getElementById('Postcode');
    var citySuburbSelect = document.getElementById('citySuburb');

    // Add event listener to the postcode input field
    postcodeInput.addEventListener('input', function() {
        // Check if the input field has a value
        if (postcodeInput.value.trim() !== '') {
            // Enable the select element
            citySuburbSelect.disabled = false;
        } else {
            // Disable the select element
            citySuburbSelect.disabled = true;
        }
    });
    </script>


    <!-- city/suburb api generation -->
    <script>
    document.getElementById('Postcode').addEventListener('input', function() {
        var postcode = this.value;
        var url = '../../php/profile/address/addressFetch/getCityState.php';

        // Send POST request to PHP file
        fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: 'Postcode=' + encodeURIComponent(postcode)
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error: ' + response.statusText);
                }
                return response.json();
            })
            .then(data => {
                var select = document.getElementById('citySuburb');
                select.innerHTML = ''; // Clear existing options

                if (data.error) {
                    // Handle error response
                    select.innerHTML = '<option>' + data.error + '</option>';
                } else {
                    // Populate select options with suburbs/cities
                    data.forEach(function(item) {
                        var option = document.createElement('option');
                        option.textContent = item.name;
                        select.appendChild(option);
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
    </script>
</body>


</html>