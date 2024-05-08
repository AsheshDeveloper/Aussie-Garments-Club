    <?php 
    session_start();
    require_once("../../php/profile/address/profile_address_Add.php"); 
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- header section include -->
        <?php
    include '../../includes/head_section.html';
    ?>
        <script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initialize" async defer></script>
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
                                <input type="text" class="form-control" placeholder="enter to search...."
                                    id="recipient-name" />
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary modalButton">Search</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="container mt-5 mb-5">
                <h5 class="mb-3">
                    Add New Address
                    <span>
                        <i class="fas fa-address-card"></i>
                    </span>
                </h5>

                <div class="row">
                    <div class="col-md-6 mx-auto">
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
                                        <label class="form-check-label mb-1" for="countryRegion"> Country/Region
                                        </label>
                                        <select name="countryRegion" class="form-select" id="countryRegion"
                                            aria-label="countryRegion">
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
                                        <label class="form-check-label mb-1" for="address">Address</label>

                                        <input type="text" class="form-control mb-2" name="address" id="address"
                                            placeholder="eg: Apt, Unit, Suite, Building, Floor" required />

                                        <input type="text" class="form-control" name="address1" id="address1"
                                            placeholder="eg: Street, PO Box, Company, c/o" required />
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-check-label mb-1" for="Postcode">Postcode</label>
                                        <input type="number" class="form-control" name="Postcode" id="Postcode"
                                            placeholder="eg: 2245" required />
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-check-label mb-1" for="citySuburb">City/Suburb</label>
                                        <select name="citySuburb" class="form-select" id="citySuburb"
                                            aria-label="citySuburb" disabled>
                                            <option selected>Choose City or Suburb</option>
                                        </select>
                                        <small class="text-info">enter postcode to select city or suburb</small>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-check-label mb-1"
                                            for="stateTerritory">State/Territory</label>

                                        <select name="stateTerritory" class="form-select" id="stateTerritory"
                                            aria-label="stateTerritory">
                                            <option selected>Choose state or Territory</option>
                                            <option value="NSW">New South Wales (NSW)</option>
                                            <option value="VCT">Victoria (VCT)</option>
                                            <option value="QLD">Queensland (QLD)</option>
                                            <option value="WA">Western Australia (WA)</option>
                                            <option value="SA">South Australia (SA)</option>
                                            <option value="Tas">Tasmania (Tas)</option>
                                            <option value="NT">Northern Territory (NT)</option>
                                            <option value="ACT">Australian Capital Territory (ACT)</option>
                                        </select>

                                    </div>

                                    <div class="mb-3">
                                        <label class="form-check-label mb-1" for="fullName"> Full name (Address
                                            For)</label>

                                        <input type="text" class="form-control" name="full_name" id="fullName"
                                            placeholder="eg: harry kane" required />
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="defaultAddress"
                                            name="defaultAddress" />
                                        <label class="form-check-label" for="defaultAddress">Make Default Address
                                            ?</label>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary p-2 mb-3 mt-4">Add
                                        Address</button>
                                </form>
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
                        <h6 class="mb-4">Saved for later <img src="../../images/assets/refresh 1.png"
                                alt="Suggestion" />
                        </h6>

                        <div class="row-suggestion-items">
                            <div class="row">
                                <div class="col">
                                    <a href="">
                                        <img src="../../images/suggestions/suggestion1.png" alt="Image 1"
                                            class="img-fluid" />
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="">
                                        <img src="../../images/suggestions/suggestion2.png" alt="Image 2"
                                            class="img-fluid" />
                                    </a>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <a href="">
                                        <img src="../../images/suggestions/suggestion3.png" alt="Image 3"
                                            class="img-fluid" />
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="">
                                        <img src="../../images/suggestions/suggedtion3.1.png" alt="Image 4"
                                            class="img-fluid" />
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
                                        <img src="../../images/suggestions/suggestion5.png" alt="Image 1"
                                            class="img-fluid" />
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="">
                                        <img src="../../images/suggestions/suggestion1.png" alt="Image 2"
                                            class="img-fluid" />
                                    </a>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <a href="">
                                        <img src="../../images/suggestions/suggestion3.png" alt="Image 3"
                                            class="img-fluid" />
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="">
                                        <img src="../../images/suggestions/suggestion2.png" alt="Image 4"
                                            class="img-fluid" />
                                    </a>
                                </div>
                            </div>
                            <p class="mt-3"><a href="#more-purchases">More in purchase again</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initialize" async defer></script>
        <?php
        // Include footer
        include '../../includes/footer.php';
    ?>

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