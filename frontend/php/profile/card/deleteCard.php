<?php
// Check if the user is logged in
$userID = $_SESSION['userId'];

// Check if card_id is provided and valid
if (isset($_GET['card_id']) && is_numeric($_GET['card_id'])) {
    // Sanitize input
    $cardID = $_GET['card_id'];

    // Establish database connection
    $connect = mysqli_connect('localhost', 'root', '', 'the_garments_club');

    // Check connection
    if (!$connect) {
        header('HTTP/1.1 500 Internal Server Error');
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Prepare and execute query to delete the card
    $query = "DELETE FROM cards WHERE cardID = ?";
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt, "i", $cardID);
    mysqli_stmt_execute($stmt);

    // Check if deletion was successful
    if (mysqli_affected_rows($connect) > 0) {
        // Redirect back to the page where the delete button was clicked
        header('Location: ' . $_SERVER['HTTP_REFERER']. '?success=1'); // Redirect back to the referring page
        $success[] = "Card deleted successfully";
        exit();
    } else {
        header('Location: ' . $_SERVER['HTTP_REFERER'] . '?error=1');
    }

    // Close database connection
    mysqli_stmt_close($stmt);
    mysqli_close($connect);
} else {
    echo "Error: Invalid card ID.";
}
?>