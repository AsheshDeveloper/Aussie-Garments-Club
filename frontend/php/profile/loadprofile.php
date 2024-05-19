<?php
    // Establish database connection
    $connect = mysqli_connect('localhost', 'root', '', 'the_garments_club');

    $userID = $_SESSION['userId'];
    
    // Query section
    $query = "SELECT u.id, u.first_name, u.middle_name, u.last_name, u.contact, u.email,u.user_image, u.gender, u.birthday, u.password, a.aptUnitSuit, a.street, a.citySuburb, a.stateTerritory, a.Postcode FROM users u INNER JOIN address a ON u.id = a.id WHERE u.id = $userID and a.defaultAddress = 1";
    $result = mysqli_query($connect, $query);

    // Check if query execution was successful
    if (!$result) {
        header('HTTP/1.1 500 Internal Server Error');
        die("Query failed: " . mysqli_error($connect));
    } else {
        $row= mysqli_fetch_array($result);
    }    
?>