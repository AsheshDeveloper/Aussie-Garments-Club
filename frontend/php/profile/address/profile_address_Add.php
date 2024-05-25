<?php
// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Get user ID from session
    $userID = $_SESSION['userId'];

    // Database connection
    $connect = mysqli_connect('localhost', 'root', '', 'the_garments_club');

    // user inputs
    $country = mysqli_real_escape_string($connect, $_POST['countryRegion']);
    $aptUnitSuit = mysqli_real_escape_string($connect, $_POST['address']);
    $street = mysqli_real_escape_string($connect, $_POST['address1']);
    $fullName = mysqli_real_escape_string($connect, $_POST['full_name']);
    $postcode = mysqli_real_escape_string($connect, $_POST['Postcode']);
    $stateTerritory = mysqli_real_escape_string($connect, $_POST['stateTerritory']);
    $citySuburb = mysqli_real_escape_string($connect, $_POST['citySuburb']);
    $defaultAddress = isset($_POST['defaultAddress']) ? 1 : 0;

    // Check if the address already exists
    $fetch_address = "SELECT * FROM address WHERE aptUnitSuit = '$aptUnitSuit' AND street = '$street' AND citySuburb = '$citySuburb' AND stateTerritory = '$stateTerritory' AND Postcode = '$postcode'";
    $result = mysqli_query($connect, $fetch_address);

     if(mysqli_num_rows($result) > 0) {
        $errors[] = "Address already exists!";
    } else {
        // If user chooses to make new address default
        if ($defaultAddress == 1) {
            // Check if there are other default addresses in db
            $check_default_query = "SELECT * FROM address WHERE defaultAddress = 1";
            $check_default_result = mysqli_query($connect, $check_default_query);

            if (mysqli_num_rows($check_default_result) > 0) {
                // Set previous default address to 0
                $update_previous_default_query = "UPDATE address SET defaultAddress = 0 WHERE defaultAddress = 1";
                mysqli_query($connect, $update_previous_default_query);
            }
        }

        // Insert new address
        $insert = "INSERT INTO address(country, aptUnitSuit, street, citySuburb, stateTerritory, Postcode, forUser, id, defaultAddress) 
        VALUES ('$country','$aptUnitSuit', '$street', '$citySuburb', '$stateTerritory', '$postcode', '$fullName', '$userID', '$defaultAddress')";

        mysqli_query($connect, $insert);
        $success[] = "Address added successfully";
         echo '<script>
                    setTimeout(function() {
                        window.location.href = "../../pages/profile/address.php";
                    }, 1000); // 3000 milliseconds = 3 seconds
                  </script>';
    }
}
?>