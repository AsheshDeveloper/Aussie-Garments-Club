<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
$errors = [];
$success = [];

// Query to fetch user data
$query = "SELECT u.id, u.first_name, u.middle_name, u.last_name, u.contact, u.email, u.user_image, u.gender, u.birthday, u.password, a.aptUnitSuit, a.street, a.citySuburb, a.stateTerritory, a.Postcode 
    FROM users u 
    LEFT JOIN address a ON u.id = a.id AND a.defaultAddress = 1 
    WHERE u.id = $userID";

$result = mysqli_query($connect, $query);

// Check if query execution was successful
if (!$result) {
    header('HTTP/1.1 500 Internal Server Error');
    die("Query failed: " . mysqli_error($connect));
} else {
    $row = mysqli_fetch_array($result);
}

// Handle profile update form submission
if (isset($_POST['submit'])) {
    // Sanitize user input
    $email = isset($_POST['email']) ? mysqli_real_escape_string($connect, $_POST['email']) : '';
    $birthday = isset($_POST['birthday']) ? mysqli_real_escape_string($connect, $_POST['birthday']) : '';
    $phone = isset($_POST['phone']) ? mysqli_real_escape_string($connect, $_POST['phone']) : '';
    $gender = isset($_POST['gender']) ? mysqli_real_escape_string($connect, $_POST['gender']) : '';

    // Improved email validation regex pattern
    $emailPattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    // Validate email
    if (!preg_match($emailPattern, $email)) {
        $errors[] = "Invalid email format.";
    }

    // birthday validation
    if (strtotime($birthday) > time()) {
        $errors[] = "Date of birth cannot be a future date.";
    }

    // Validate contact (10-digit number)
    if (!preg_match('/^\d{10}$/', $phone)) {
        $errors[] = "Invalid contact number. Please enter a 10-digit number.";
    }

    $profileImage = '';
    if (!empty($_FILES['user_image']['name'])) {
        $profileImage = mysqli_real_escape_string($connect, $_FILES['user_image']['name']);
        $tmp_image_one = $_FILES['user_image']['tmp_name'];
        $targetDir = "../../images/uploads/";
        $targetFile = $targetDir . basename($profileImage);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if file is an actual image
        $check = getimagesize($tmp_image_one);
        if ($check === false) {
            $uploadOk = 0;
            $errors[] = "File is not an image.";
            header("Refresh:1; url=" . $_SERVER['REQUEST_URI']);
        }

        // Check file size (limit to 500KB)
        if ($_FILES['user_image']['size'] > 11000000) {
            $uploadOk = 0;
            $errors[] = "Sorry, your file is too large.";
            header("Refresh:1; url=" . $_SERVER['REQUEST_URI']);

        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $uploadOk = 0;
            $errors[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            header("Refresh:1; url=" . $_SERVER['REQUEST_URI']);

        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $errors[] = "Sorry, your file was not uploaded.";
        } else {
            if (!move_uploaded_file($tmp_image_one, $targetFile)) {
                $errors[] = "Sorry, there was an error uploading your file.";
                header("Refresh:1; url=" . $_SERVER['REQUEST_URI']);

            }
        }
    }

    if (empty($errors)) {
        // Update query
        // if (!empty($profileImage)) {
        //     $updateProfile = "UPDATE users SET email='$email', birthday='$birthday', contact='$phone', gender='$gender', user_image='$profileImage' WHERE id=$userID";
        // } else {
        //     $updateProfile = "UPDATE users SET email='$email', birthday='$birthday', contact='$phone', gender='$gender' WHERE id=$userID";
        // }

        // Execute query
        // if (mysqli_query($connect, $updateProfile)) {
        //     $success[] = "Profile updated!";
        //     /// Set a time interval for message display (in milliseconds)
        //     $reloadDelay = 3000; // 5 seconds (5000 milliseconds)
        //     // Redirect with JavaScript after a delay
        //     echo "<script>
        //         setTimeout(function() {
        //             window.location.href = '" . $_SERVER['REQUEST_URI'] . "';
        //         }, $reloadDelay);
        //     </script>";
        // } else {
        //     $errors[] = "Error updating profile: " . mysqli_error($connect);
        // }
        $updateProfile = "UPDATE users SET email='$email', birthday='$birthday', contact='$phone', gender='$gender'" .
            (!empty($profileImage) ? ", user_image='$profileImage'" : "") . " WHERE id=$userID";

        if (mysqli_query($connect, $updateProfile)) {
            $success[] = "Profile updated!";
            header("Refresh:1; url=" . $_SERVER['REQUEST_URI']);
        } else {
            $errors[] = "Error updating profile: " . mysqli_error($connect);
        }
    }
}


// Check if the form for updating password is submitted
if (isset($_POST['submitPwd'])) {
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
                    $success[] = "Password updated successfully!";
                    header("Refresh:1; url=" . $_SERVER['REQUEST_URI']);
                } else {
                    $errors[] = "Error updating password: " . mysqli_error($connect);
                }
            } else {
                $errors[] = "New passwords do not match!";
            header("Refresh:1; url=" . $_SERVER['REQUEST_URI']);
            }
        } else {
            $errors[] = "Incorrect old password!";
            header("Refresh:1; url=" . $_SERVER['REQUEST_URI']);

        }
    } else {
        $errors[] = "User not found!";
        header("Refresh:1; url=" . $_SERVER['REQUEST_URI']);

    }
}

// Close connection
mysqli_close($connect);

// Store messages in session and redirect
if (!empty($success)) {
    $_SESSION['success'] = $success;
}
if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
}

// Redirect to appropriate page after processing form submission
// if (isset($_POST['submit'])) {
//     header("Location: ../../pages/profile/user_profile.php");
// } elseif (isset($_POST['submitPwd'])) {
//     header("Location: ../../pages/profile/edit_profile.php");
// }
?>