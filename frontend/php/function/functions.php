<?php  
// logics for cart
require_once "../../php/database_connect.php";
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


// check ajax request to update or delete cart items
if (isset($_POST['action']) && isset($_POST['product_id'])) {
    $action = $_POST['action'];
    $product_id = $_POST['product_id'];

    // Sanitize inputs
    $product_id = mysqli_real_escape_string($connect, $product_id);

    // Perform action based on the value of 'action'
    switch ($action) {
        case 'insert':
            // Add Items to cart
            $getProductID =  mysqli_real_escape_string($connect, $_POST['product_id']);
            $ip = getIPAddress();
            $fetchData = "SELECT * FROM cart WHERE IpAddress='$ip' AND ProductID='$getProductID' ";
            $result = mysqli_query($connect, $fetchData);
            $rows = mysqli_num_rows($result);
            if($rows){
                $result = array("error" => "Product exists in the cart!!");
                header("Content-Type: application/json");
                echo json_encode($result);
            }else{
                $insert = "INSERT INTO cart(ProductID, IpAddress, Quantity) VALUES ('$getProductID', '$ip',0) " ;
                mysqli_query($connect, $insert);
                $result = array("success" => "Product added to cart!!");
                header("Content-Type: application/json");
                echo json_encode($result);
            }
        break;

        case 'update':
            // Check if the quantity parameter is provided
            if (isset($_POST['quantity'])) {
                $quantity = intval($_POST['quantity']);

                // Update cart item quantity
                $update_query = "UPDATE cart SET Quantity = $quantity WHERE ProductID = '$product_id'";
                $result = mysqli_query($connect, $update_query);

                if ($result) {
                    // Cart item updated successfully
                    echo json_encode(array("success" => "Cart updated successfully"));
                } else {
                    // Error updating cart item
                    echo json_encode(array("error" => "Failed to update cart"));
                }
            } else {
                // Quantity parameter missing
                echo json_encode(array("error" => "Quantity parameter missing"));
            }
            break;
        
        case 'delete':
            // Delete cart item
            $delete_query = "DELETE FROM cart WHERE ProductID = '$product_id'";
            $result = mysqli_query($connect, $delete_query);

            if ($result) {
                // Cart item deleted successfully
                echo json_encode(array("success" => "Cart item deleted successfully"));
            } else {
                // Error deleting cart item
                echo json_encode(array("error" => "Failed to delete cart item"));
            }
            break;
        
        default:
            // Invalid action parameter
            echo json_encode(array("error" => "Invalid action parameter"));
            break;
    }
} else {
    // Missing or invalid parameters
    echo json_encode(array("error" => "Missing or invalid parameters"));
}

