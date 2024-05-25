<?php 
    session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Establish database connection
    $connect = mysqli_connect('localhost', 'root', '', 'the_garments_club');

    $userID = $_SESSION['userId'];
    if (!isset($_SESSION['userId'])) {
        die("User ID not found in session.");
    }
    
    // Check connection
    if (!$connect) {
        header('HTTP/1.1 500 Internal Server Error');
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Query section
    $query = "SELECT * FROM `address` WHERE id =  $userID";
    $result = mysqli_query($connect, $query);

    // Check if query execution was successful
    if (!$result) {
        header('HTTP/1.1 500 Internal Server Error');
        die("Query failed: " . mysqli_error($connect));
    }

    // Fetch data and store in array
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    // Close database connection
    mysqli_close($connect);
    
    // Set response header to JSON
    header('Content-Type: application/json');

    // Encode data as JSON and output
    echo json_encode($data);
?>