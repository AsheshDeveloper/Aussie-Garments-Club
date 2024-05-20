<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the verification code is correct
    if (isset($_POST['code']) && isset($_SESSION['verification_code'])) {
        $enteredCode = $_POST['code'];
        $storedCode = $_SESSION['verification_code'];
        if ($enteredCode == $storedCode) {
            echo "SUCCESS";
            // Verification successful
            $_SESSION['success'] = "VERIFIED";
            header('Location: ../../index.php');
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
