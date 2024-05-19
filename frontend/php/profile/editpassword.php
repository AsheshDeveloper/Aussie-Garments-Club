<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if the form is submitted
if (isset($_POST['submitPwd'])) {
    // Establish database connection
    $connect = mysqli_connect('localhost', 'root', '', 'the_garments_club');
    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (!isset($_SESSION['userId'])) {
        die("User ID is not set in session");
    }

    // Get user ID from session
    $userID = $_SESSION['userId'];

    // Sanitize user input
    $oldPassword = mysqli_real_escape_string($connect, md5($_POST['oldPassword']));
    $newPassword = mysqli_real_escape_string($connect, md5($_POST['newPassword']));
    $confirmPassword = mysqli_real_escape_string($connect, md5($_POST['confirmPassword']));

    // Check if old password matches the one in the database
    $query = "SELECT password FROM users WHERE id = $userID";
    $result = mysqli_query($connect, $query);
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $storedPassword = $row['password'];
        // Verify old password
        if ($oldPassword === $storedPassword) {
            // Check if new passwords match
            if ($newPassword === $confirmPassword) {
                // Update password
                // Perform the update query
                $updateQuery = "UPDATE users SET password='$newPassword' WHERE id=$userID";
                $updateResult = mysqli_query($connect, $updateQuery);

                if ($updateResult) {
                    echo "Password updated successfully!";
                    $success[] = "Password updated successfully!";
                } else {
                    echo "Error updating password: " . mysqli_error($connect);
                    $errors[] = "Error updating password";
                }
            } else {
                echo "New passwords do not match!";
                $errors[] = "New passwords do not match!";

            }
        } else {
            echo "Incorrect old password!";
            $errors[] = "Incorrect old password!";

        }
    } else {
        echo "User not found!";
        $errors[] = "User Not Found";
    
    }
    
    // Close connection
    mysqli_close($connect);
}
?>