<?php 
require_once "../../php/database_connect.php";
$id = $_GET["id"];
$delete = "DELETE FROM category WHERE categoryID = '$id'";
if (mysqli_query($connect, $delete)) {
    session_start();
    $_SESSION['message'] = 'category deleted successfully!';
    header("Location: category_index.php");

} else {
    $error[] = "Something went wrong. Please try again later.";
}
