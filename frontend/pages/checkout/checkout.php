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
                <h5 class="mb-2">Checkout (<span class="text-primary">2 items</span>)</h5>

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
                                        <p class="align-self-start">Jack Ma</p>
                                        <p class="align-self-end">
                                            <!-- address modal trigger  -->
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#addressEditModal"> Chage
                                            </a>
                                        </p>
                                    </div>

                                    <span>Unit 50 6 east street <br />
                                        Lidcombe, NSW 2142</span>
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
                                        <tr class="">
                                            <td>
                                                <img src="../../images/suggestions/suggestion3.png" alt="Product Image"
                                                    class="class-table-image rounded" />
                                            </td>
                                            <td>
                                                <h6>
                                                    Men's Sneakers Outdoor Sports Running Casual Shoes Breathable
                                                    Lightweight Traning Jogging Non-Slip Gym Sneakers
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
                                                <img src="../../images/suggestions/suggestion3.png" alt="Product Image"
                                                    class="class-table-image rounded" />
                                            </td>
                                            <td>
                                                <h6>
                                                    Men's Sneakers Outdoor Sports Running Casual Shoes Breathable
                                                    Lightweight Traning Jogging Non-Slip Gym Sneakers
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
                                    <div class="col-4">
                                        <a href="./congrats.html" class="btn btn-primary px-5 py-2">Place
                                            your order</a>
                                    </div>
                                    <div class="col-8">
                                        <ul style="list-style: none">
                                            <li><span class="text-primary">Order Toatal:</span> <span
                                                    class="text-primary">$80</span></li>
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
                                            <ul style="list-style: none">
                                                <li><span class="">Style</span> <span class="text-muted">Casual</span>
                                                </li>
                                                <li><span class="">Weight</span> <span class="text-muted">200gm</span>
                                                </li>
                                                <li><span class="">Country</span> <span
                                                        class="text-muted">Australia</span>
                                                </li>
                                                <hr />
                                                <li><span class="">Quantity</span> <span class="text-muted">2</span>
                                                </li>
                                                <li><span class="text-primary">Order Toatal:</span> <span
                                                        class="text-primary">$59.00</span></li>
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
                    <div class="row mb-3">
                        <h6 class="mb-3">Select form your list of address</h6>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                id="flexRadioDefault1" />
                            <label class="form-check-label" for="flexRadioDefault1"> Unit 50 6 east street
                                Hurstville, NSW 2144</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                                checked />
                            <label class="form-check-label" for="flexRadioDefault2"> Unit 50 6 east street
                                Lidcombe, NSW 2142 </label>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <h6>Add new address</h6>
                        <div class="row">
                            <div class="col-12">
                                <div class="card p-2 mt-4 mb-5">
                                    <div class="card-body">
                                        <form class="" action="" method="post">
                                            <div class="mb-3">
                                                <label class="form-check-label mb-1" for="email"> Country/Region
                                                </label>

                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>Choose County or Region</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-check-label mb-1" for="fullName"> Full name
                                                    (Address For)</label>

                                                <input type="name" class="form-control" name="fullName" id="fullName"
                                                    placeholder="eg: harry kane" required />
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-check-label mb-1" for="phoneNumber">Phone
                                                    number</label>

                                                <input type="number" class="form-control" name="phoneNumber"
                                                    id="phoneNumber" placeholder="eg: 0978482453" required />
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-check-label mb-1" for="address">Address</label>

                                                <input type="name" class="form-control mb-2" name="address" id="address"
                                                    placeholder="eg: Apt, Unit, Suite, Building, Floor" required />

                                                <input type="name" class="form-control" name="address1" id="address1"
                                                    placeholder="eg: Street, PO Box, Company, c/o" required />
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-check-label mb-1" for="Postcode">Postcode</label>

                                                <input type="number" class="form-control" name="Postcode" id="Postcode"
                                                    placeholder="eg: 2245" required />
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-check-label mb-1" for="citySuburb">
                                                    City/Suburb </label>

                                                <select class="form-select" aria-label="citySuburb">
                                                    <option selected>Choose City or Suburb</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-check-label mb-1" for="countryRegion">
                                                    State/Territory </label>

                                                <select class="form-select" aria-label="countryRegion">
                                                    <option selected>Choose state or Territory</option>
                                                    <option value="">New South Wales(NSW)</option>
                                                    <option value="">Victoria(VCT)</option>
                                                    <option value="">Queensland(QLD)</option>
                                                    <option value="">Western Australia(WA)</option>
                                                    <option value="">South Australia(SA)</option>
                                                    <option value="">Tasmania(Tas)</option>
                                                    <option value="">Northern Territory(NT)</option>
                                                    <option value="">Australian Capital Territory(ACT)</option>
                                                </select>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="defaultAddress" />
                                                <label class="form-check-label" for="defaultAddress">Make
                                                    Default Address ?</label>
                                            </div>

                                            <a href="./checkout.html" type="submit" type="button"
                                                class="btn btn-primary w-100 p-2 mb-3 mt-4">Add Address</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Deliver to this address</button>
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