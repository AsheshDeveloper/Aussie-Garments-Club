<?php
session_start();
$connect = mysqli_connect('localhost', 'root', '', 'the_garments_club');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the verification code is correct
    if (isset($_POST['code']) && isset($_SESSION['verification_code'])) {
        $enteredCode = $_POST['code'];
        $storedCode = $_SESSION['verification_code'];
        if ($enteredCode == $storedCode) {
            echo "SUCCESS";
            // Verification successful
            $_SESSION['success'] = "VERIFIED";
            $email = $_SESSION['email'];
            $fetch_user = " SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($connect, $fetch_user);
            if(mysqli_num_rows($result) > 0) {
                echo "updating user";
                $update_user = " UPDATE users SET verified = 1 where email = '$email'";
                echo $update_user;
                mysqli_query($connect, $update_user);
                header('Location: ../../index.php');
            } else {
                header('Location: verify_code.php');
            }
            exit;
        } else {
            echo "FAILED";
            // Verification failed
            $_SESSION['error'] = "Incorrect verification code. Please try again.";
            header('Location: verify_code.php');
            exit;
        }
    } else {
        echo "F";
        // Verification code not provided or session expired
        $_SESSION['error'] = "Verification code not provided. Please try again.";
        header('Location: verify_code.php');
        exit;
    }
} else {
    echo "end";
    header('Location: verify_code.php');
    exit;
}
?>
