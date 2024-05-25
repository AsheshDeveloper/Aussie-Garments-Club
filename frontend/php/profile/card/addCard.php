<?php
if(isset($_POST['submit'])) {
    // Establish database connection
    $connect = mysqli_connect('localhost', 'root', '', 'the_garments_club');

    if (!$connect) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Check if the user is logged in and if the session variable exists
    if (!isset($_SESSION['userId'])) {
        header('Location: ../../login.php');
        exit();
    }

    // Retrieve the user ID from the session
    $userID = $_SESSION['userId'];

    // User inputs
    $cardNumber = mysqli_real_escape_string($connect, $_POST['cardNumber']);
    $nameOnCard = mysqli_real_escape_string($connect, $_POST['nameOnCard']);
    $expirationDate = mysqli_real_escape_string($connect, $_POST['expirationDate']);
    $securityCode = mysqli_real_escape_string($connect, $_POST['securityCode']);
    $defaultCard = isset($_POST['default']) ? 1 : 0;

    // Check if the card already exists
    $fetch_card = "SELECT * FROM cards WHERE userID = $userID AND cardNumber = '$cardNumber'";
    $result = mysqli_query($connect, $fetch_card);

    if (mysqli_num_rows($result) > 0) {
        $errors[] = "Card already exists!";
    } else {
        // If user chooses to make the new card default
        if ($defaultCard == 1) {
            // Check if there are other default cards in db
            $check_default_query = "SELECT * FROM cards WHERE userID = $userID AND defaultCard = 1";
            $check_default_result = mysqli_query($connect, $check_default_query);

            if (mysqli_num_rows($check_default_result) > 0) {
                // Set previous default card to 0
                $update_previous_default_query = "UPDATE cards SET defaultCard = 0 WHERE userID = $userID AND defaultCard = 1";
                mysqli_query($connect, $update_previous_default_query);
            }
        }

        // Insert new card
        $insert = "INSERT INTO cards (cardNumber, expirationDate, securityCode, userID, defaultCard, nameOnCard) 
        VALUES ('$cardNumber', '$expirationDate', '$securityCode', '$userID', '$defaultCard', '$nameOnCard')";

        if (mysqli_query($connect, $insert)) {
            $success[] = "Card added successfully";
          echo '<script>
                    setTimeout(function() {
                        window.location.href = "../../pages/profile/card.php";
                    }, 1000); // 3000 milliseconds = 3 seconds
                  </script>';

        } else {
            $errors[] = "Error: " . mysqli_error($connect);
            header("Refresh:1; url=" . $_SERVER['REQUEST_URI']);

        }
    }

    mysqli_close($connect);
}
?>