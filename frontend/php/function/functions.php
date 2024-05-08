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
            $getProductID = mysqli_real_escape_string($connect, $_POST['product_id']);
            $getPrice = mysqli_real_escape_string($connect, $_POST['price']);
            $getRequest = mysqli_real_escape_string($connect, $_POST['user_request']);            
            $ip = getIPAddress();
            $fetchUser = "SELECT * FROM users WHERE email= '$getRequest' ";
            $userResult = mysqli_query($connect, $fetchUser);

            if (!$userResult) {
                // Handle query error
                $error = mysqli_error($connect);
                // Handle the error appropriately,
                $result = array("error" => "Database error: $error");
                header("Content-Type: application/json");
                echo json_encode($result);
                exit;
            }

            if(mysqli_num_rows($userResult) > 0) {
                $user = mysqli_fetch_array($userResult);
                $getId = $user['id'];
                $fetchData = "SELECT * FROM cart WHERE userID='$getId' AND ProductID='$getProductID' ";
                $result = mysqli_query($connect, $fetchData);

                if (!$result) {
                    // Handle query error
                    $error = mysqli_error($connect);
                    // Handle the error appropriately, for example:
                    $result = array("error" => "Database error: $error");
                    header("Content-Type: application/json");
                    echo json_encode($result);
                    exit;
                }

                if(mysqli_num_rows($result) == 0) {
                    $insert = "INSERT INTO cart(IpAddress, UserID, GuestID, ProductID, Quantity, Price, TotalAmount) VALUES ('$ip','$getId',NULL,'$getProductID', 1,'$getPrice','$getPrice')";
                    mysqli_query($connect, $insert);
                    $result = array("success" => "Product added to cart!!");
                    header("Content-Type: application/json");
                    echo json_encode($result);
                } else {
                    $result = array("error" => "Product exists in the cart!!");
                    header("Content-Type: application/json");
                    echo json_encode($result);
                }
            } else {
                $result = array("error" => "No user found with the provided email!!");
                header("Content-Type: application/json");
                echo json_encode($result);
            }            
        break;

        case 'update':
            // Check if the quantity parameter is provided
            if (isset($_POST['quantity'])) {
                $quantity = intval($_POST['quantity']);                
                $product_id = $_POST['product_id'];
                $user = $_POST['user'];
                // Update cart item quantity
                $update_query = "UPDATE cart 
                                    INNER JOIN product ON cart.ProductID = product.ProductID 
                                    SET cart.Quantity = $quantity,
                                        cart.TotalAmount = cart.Price * $quantity
                                    WHERE cart.ProductID = '$product_id' AND cart.UserID = '$user'";
                $result = mysqli_query($connect, $update_query);

                if ($result) {
                    // Calculate total amount for all items in the cart
                    $total_amount_query = "SELECT SUM(TotalAmount) AS total_amount, totalAmount FROM cart WHERE UserID = '$user'";
                    $total_amount_result = mysqli_query($connect, $total_amount_query);
                    $total_amount_row = mysqli_fetch_assoc($total_amount_result);
                    $single_total = $total_amount_row['totalAmount'];
                    $total_amount = $total_amount_row['total_amount'];
                    // Cart item updated successfully
                    echo json_encode(array("success" => "Cart updated successfully","singleTotal" => $single_total ,"grandTotal" => $total_amount));
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
            $product_id = $_POST['product_id'];
            $user = $_POST['user'];
            $delete_query = "DELETE FROM cart WHERE ProductID = '$product_id' AND UserID = '$user'";
            $result = mysqli_query($connect, $delete_query);

            if ($result) {
                // Cart item deleted successfully
                // Calculate total amount after deleting the cart item
                $total_amount_query = "SELECT SUM(Price * Quantity) AS total_amount FROM cart WHERE UserID = '$user'";
                $total_amount_result = mysqli_query($connect, $total_amount_query);
                $total_amount_row = mysqli_fetch_assoc($total_amount_result);
                $total_amount = $total_amount_row['total_amount'];
                // Cart item deleted successfully
                echo json_encode(array("success" => "Cart item deleted successfully", "grandTotal" => $total_amount));
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
}else if (isset($_GET['search_query'])){      
     $search_query = $_GET['search_query'];
     // Prepare SQL statement
     $search = "SELECT * FROM product WHERE name LIKE '%$search_query%'"; 
     // Execute SQL statement
     $result = $connect->query($search);
 
     // Check if there are any results
     if ($result->num_rows > 0) {
        echo "<ul>";
        while($row = $result->fetch_assoc()) {
            // Output each search result as a list item
            echo "<li><a href='./pages/product/product_details.php?id=" . $row['ProductID'] . "'>"  . $row['Name'] . "</a></li>";
        }
        echo "</ul>"; 
     } else {
         echo "No result found";
     } 
     // Close database connection
     $connect->close(); 

}  else {
    // Missing or invalid parameters
    echo json_encode(array("error" => "Missing or invalid parameters"));
}

