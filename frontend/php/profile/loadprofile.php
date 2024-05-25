<?php
// Establish database connection
$connect = mysqli_connect('localhost', 'root', '', 'the_garments_club');

// Retrieve the user ID from the session
$userID = $_SESSION['userId'];

// Check if the user is logged in and if the session variable exists
if (!isset($_SESSION['userId'])) {
    header('Location: ../../login.php');
    exit();
}

// Prepare the SQL query with parameterized query to prevent SQL injection
$query = "SELECT u.id, u.first_name, u.middle_name, u.last_name, u.contact, u.email, u.user_image, u.gender, u.birthday, u.password, a.aptUnitSuit, a.street, a.citySuburb, a.stateTerritory, a.Postcode 
    FROM users u 
    LEFT JOIN address a ON u.id = a.id AND a.defaultAddress = 1 
    WHERE u.id = ?";
$stmt = mysqli_prepare($connect, $query);
mysqli_stmt_bind_param($stmt, "i", $userID);

// Execute the prepared statement
mysqli_stmt_execute($stmt);

// Store the result
$result = mysqli_stmt_get_result($stmt);

// Check if there are rows returned
if (!$result) {
    // Query failed, return 500 error
    header('HTTP/1.1 500 Internal Server Error');
    die("Query failed: " . mysqli_error($connect));
} else {
    // Fetch the row
    $row = mysqli_fetch_array($result);
}
?>