<?php
session_start();
require_once("../php/database_connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .success-message {
            margin-top: 100px;
            font-size: 24px;
            color: green;
        }
        .home-button {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 18px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .home-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php
        $checkExistingOrderQuery = "SELECT * FROM `order` WHERE customerEmail = ?";
        $result = mysqli_prepare($connect, $checkExistingOrderQuery);
        mysqli_stmt_bind_param($result, "s", $_SESSION['email']);
        mysqli_stmt_execute($result);
        $checkExistingOrderResult = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($checkExistingOrderResult) > 0) {
            // Update order status in the database
            $order_status = "Complete"; 
            $updateOrder = "UPDATE `order` SET OrderStatus = ? WHERE CustomerEmail = ?";
            $stmt = mysqli_prepare($connect, $updateOrder);
            mysqli_stmt_bind_param($stmt, "ss", $order_status, $_SESSION['email']);
            if (mysqli_stmt_execute($stmt)) {
                echo "<div class='success-message'>
                        <p>Congratulations! Your payment was successful.</p>
                    </div>
                    <a href='../index.php' class='home-button'>Go back to Aussie Garment Website</a>";
            } else {
                echo "<div class='success-message'>
                        <p>Error: " . mysqli_error($connect) . "</p>
                    </div>
                    <a href='../index.php' class='home-button'>Go back to Aussie Garment Website</a>";
            }
    } else {
        echo "<div class='success-message'>
                        <p>Error: " . mysqli_error($connect) . "</p>
                    </div>
                    <a href='../index.php' class='home-button'>Go back to Aussie Garment Website</a>";
    }
?>
    
</body>
</html>
