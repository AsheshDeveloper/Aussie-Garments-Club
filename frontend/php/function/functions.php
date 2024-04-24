<?php  
function getIPAddress() {  
//whether ip is from the share internet  
    if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
            $ip = $_SERVER['HTTP_CLIENT_IP'];  
    }  
//whether ip is from the proxy  
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
    }  
//whether ip is from the remote address  
else{  
            $ip = $_SERVER['REMOTE_ADDR'];  
    }  
    return $ip;  
}  
// $ip = getIPAddress();
// echo 'User Real IP Address = '. $ip;

// logics for cart
require_once "../../php/database_connect.php";
$getProductID =  mysqli_real_escape_string($connect, $_POST['product_id']);
$ip = getIPAddress();
$fetchData = "SELECT * FROM cart WHERE IpAddress='$ip' AND ProductID='$getProductID' ";
$result = mysqli_query($connect, $fetchData);
$rows = mysqli_num_rows($result);
if($rows){
    $result = array("error" => "Product exists");
    header("Content-Type: application/json");
    echo json_encode($result);
}else{
    $insert = "INSERT INTO cart(ProductID, IpAddress, Quantity) VALUES ('$getProductID', '$ip',0) " ;
    mysqli_query($connect, $insert);
    $result = array("success" => "Product added to cart!!");
    header("Content-Type: application/json");
    echo json_encode($result);
}

