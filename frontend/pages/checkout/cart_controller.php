<?php 
require_once "../../php/database_connect.php";
$id = $_GET["id"];
$delete = "DELETE FROM cart WHERE productID = '$id'";
if (mysqli_query($connect, $delete)) {
    $_SESSION['message'] = 'product deleted from cart!';
    header("Location: ../../product_details.php");

} else {
    $error[] = "Something went wrong. Please try again later.";
}
