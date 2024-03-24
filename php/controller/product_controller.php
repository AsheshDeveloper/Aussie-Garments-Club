<?php 
if(isset($_POST['create'])){
    require_once("../../php/database_connect.php");        
    $product_name = mysqli_real_escape_string($connect, $_POST['product_name']);
    $description = mysqli_real_escape_string($connect, $_POST['description']);
    $price = mysqli_real_escape_string($connect, $_POST['price']);
    $stock = mysqli_real_escape_string($connect, $_POST['stock_quantity']);
    $category = mysqli_real_escape_string($connect, $_POST['category']);
    $brand = mysqli_real_escape_string($connect, $_POST['brand']);
    $size = mysqli_real_escape_string($connect, $_POST['size']);

    $fetch_product = " SELECT * FROM product WHERE productName = '$product_name' ";

    $result = mysqli_query($connect, $fetch_product);

    if(mysqli_num_rows($result) > 0){
        $errors[] = "product already exists!";
    }else{        
        echo "Dead";
        $insert = "INSERT INTO product(name, description,price,quantityInStock,categoryID,brandID,sizeID) VALUES('$product_name', '$description', '$price', '$stock', '$category', '$brand', '$size')";
        mysqli_query($connect, $insert);
        $success[] = "product created!";
        header("Location: product_index.php");     
    }
} elseif(isset($_POST["update"])){   
    require_once("../../php/database_connect.php"); 
    $id = $_POST['id'];
    $product_name = mysqli_real_escape_string($connect, $_POST['product_name']);
    $description = mysqli_real_escape_string($connect, $_POST['description']);
    $price = mysqli_real_escape_string($connect, $_POST['price']);
    $stock = mysqli_real_escape_string($connect, $_POST['stock_quantity']);
    $category = mysqli_real_escape_string($connect, $_POST['category']);
    $brand = mysqli_real_escape_string($connect, $_POST['brand']);
    $size = mysqli_real_escape_string($connect, $_POST['size']);    
    $update = "UPDATE product SET `productName`='$product_name', `description`='$description',`price`='$price',`quntityInStock`='$stock',`categoryID`='$category',`brandID`='$brand',`sizeID`='$size', WHERE productID = $id"; 
    if(mysqli_query($connect, $update)){

        $success[] = "product updated!";     
    }else{
        $errors[] = "Something went wrong!";
    }
    
}


    
