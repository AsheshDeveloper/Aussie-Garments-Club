<?php

// Function to log user activity
function logActivity($userId, $action, $actionDetails) {
    // logics for cart
    require_once "../../php/database_connect.php";
    $insert = "INSERT INTO log (userId,action,details) VALUES ('$userId', '$action','$actionDetails')";
    mysqli_query($connect, $insert);
}
