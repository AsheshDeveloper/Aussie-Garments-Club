<?php
    // Error reporting
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Establish database connection
    $connect = mysqli_connect('localhost', 'root', '', 'the_garments_club');

    // Check connection
    if (!$connect) {
        header('HTTP/1.1 500 Internal Server Error');
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Validate session data
    if (!isset($_SESSION['userId'])) {
        header('HTTP/1.1 400 Bad Request');
        die("User ID not found in session.");
    }
    
    // Retrieve user ID from session
    $userID = $_SESSION['userId'];

    //  $query = "SELECT * FROM cards WHERE userID =  $userID";
    // $result = mysqli_query($connect, $query);
    // Prepare and execute query
    $query = "SELECT * FROM cards WHERE userID = ?";
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt, "i", $userID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Check if query execution was successful
    if (!$result) {
        header('HTTP/1.1 500 Internal Server Error');
        die("Query failed: " . mysqli_error($connect));
    }


    // Close database connection

    mysqli_close($connect);
?>