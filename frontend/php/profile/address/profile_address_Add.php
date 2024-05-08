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

    // check if the address is default 
   

    if(mysqli_num_rows($result) > 0) {
        $errors[] = "Address already exists!";
    } else {
        // Insert new address if it doesn't exist
        $insert = "INSERT INTO address(country, aptUnitSuit, street, citySuburb, stateTerritory, Postcode, forUser, id, defaultAddress) 
        VALUES ('$country','$aptUnitSuit', '$street', '$citySuburb', '$stateTerritory', '$postcode', '$fullName', '$userID', '$defaultAddress')";

        mysqli_query($connect, $insert);
        $success[] = "Address added successfully";
    }
}
?>