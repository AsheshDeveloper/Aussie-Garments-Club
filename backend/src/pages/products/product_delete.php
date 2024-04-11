<?php 
require_once "../../php/database_connect.php";
$id = $_GET["id"];
$delete = "DELETE FROM product WHERE productID = '$id'";
if (mysqli_query($connect, $delete)) {
    session_start();
    $_SESSION['message'] = 'product deleted successfully!';
    header("Location: product.php");

} else {
    $error[] = "Something went wrong. Please try again later.";
}
