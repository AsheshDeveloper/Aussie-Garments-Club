<?php 
require_once "../../php/database_connect.php";
$id = $_GET["id"];
$delete = "DELETE FROM address WHERE addressID = '$id'";
if (mysqli_query($connect, $delete)) {
    session_start();
    $_SESSION['message'] = 'address deleted successfully!';
    header("Location: address.php");

} else {
    $error[] = "Something went wrong. Please try again later.";
}
