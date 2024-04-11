<?php 
require_once "../../php/database_connect.php";
$id = $_GET["id"];
$delete = "DELETE FROM brand WHERE brandID = '$id'";
if (mysqli_query($connect, $delete)) {
    session_start();
    $_SESSION['message'] = 'Brand deleted successfully!';
    header("Location: brand.php");

} else {
    $error[] = "Something went wrong. Please try again later.";
}
