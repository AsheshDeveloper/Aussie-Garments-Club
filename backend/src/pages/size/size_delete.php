<?php 
require_once "../../php/database_connect.php";
$id = $_GET["id"];
$delete = "DELETE FROM size WHERE sizeID = '$id'";
if (mysqli_query($connect, $delete)) {
    session_start();
    $_SESSION['message'] = 'size deleted successfully!';
    header("Location: size_index.php");

} else {
    $error[] = "Something went wrong. Please try again later.";
}
