<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the database and execute the delete query
    $connect = mysqli_connect('localhost', 'root', '', 'the_garments_club');
    if (!$connect) {
        header('HTTP/1.1 500 Internal Server Error');
        die("Database connection failed: " . mysqli_connect_error());
    }
    
    // Get the row ID from the request
    $id = isset($_POST["addressID"]) ? $_POST["addressID"] : null; // Correctly access addressID
    if ($id === null) {
        header('HTTP/1.1 400 Bad Request');
        die("Row ID is missing");
    }

    // Sanitize the ID to prevent SQL injection
    $id = mysqli_real_escape_string($connect, $id);
    
    // Log received ID for debugging
    error_log("Received ID: " . $id);

    $query = "DELETE FROM `address` WHERE addressID = '$id'";
    $result = mysqli_query($connect, $query);
    if (!$result) {
        header('HTTP/1.1 500 Internal Server Error');
        die("Query failed: " . mysqli_error($connect));
    } 
    $success[] = "Address added successfully";
    

    mysqli_close($connect);

    echo "Row deleted successfully"; // Response sent back to AJAX call
    exit; // Make sure to exit after sending the response
} else {
    header('HTTP/1.1 400 Bad Request');
    echo "Invalid request method";
}
?>