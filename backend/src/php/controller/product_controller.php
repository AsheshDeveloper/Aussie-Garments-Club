<?php 
if(isset($_POST['create'])){    
    require_once("../../php/database_connect.php");        
    $product_name = mysqli_real_escape_string($connect, $_POST['product_name']);
    $description = mysqli_real_escape_string($connect, $_POST['description']);
    $price = mysqli_real_escape_string($connect, $_POST['price']);
    $stock = mysqli_real_escape_string($connect, $_POST['stock_quantity']);
    $main_category = mysqli_real_escape_string($connect, $_POST['main_category']);
    $category = mysqli_real_escape_string($connect, $_POST['category']);
    $brand = mysqli_real_escape_string($connect, $_POST['brand']);
    $size = mysqli_real_escape_string($connect, $_POST['size']);

    //processing images
    $image_one = addslashes(file_get_contents($_FILES['image_one']['tmp_name']));
    $image_two = addslashes(file_get_contents($_FILES['image_two']['tmp_name']));
    $image_three = addslashes(file_get_contents($_FILES['image_three']['tmp_name']));    

    $fetch_product = " SELECT * FROM product WHERE name = '$product_name' ";

    $result = mysqli_query($connect, $fetch_product);

    if($result){
        if(mysqli_num_rows($result) > 0){
            $errors[] = "product already exists!";
        }else{        
            $insert = "INSERT INTO product(name, description,price,quantityInStock,mainCategory,categoryID,brandID,sizeID,imageOne,imageTwo,imageThree) VALUES('$product_name', '$description', '$price', '$stock','$main_category' ,'$category', '$brand', '$size', '$image_one', '$image_two', '$image_three')";
            mysqli_query($connect, $insert);
            $success[] = "product created!";
            header("Location: product.php");     
        }
    }else{
        // Handle query execution failure
        echo "Error: " . mysqli_error($connect);
    }
} elseif(isset($_POST["update"])){   
    require_once("../../php/database_connect.php"); 
    $id = $_POST['id'];
    $product_name = mysqli_real_escape_string($connect, $_POST['product_name']);
    $description = mysqli_real_escape_string($connect, $_POST['description']);
    $price = mysqli_real_escape_string($connect, $_POST['price']);
    $stock = mysqli_real_escape_string($connect, $_POST['stock_quantity']);
    $main_category = mysqli_real_escape_string($connect, $_POST['main_category']);
    $category = mysqli_real_escape_string($connect, $_POST['category']);
    $brand = mysqli_real_escape_string($connect, $_POST['brand']);
    $size = mysqli_real_escape_string($connect, $_POST['size']);    

    // Check if new images are uploaded
    $image_one = '';
    $image_two = '';
    $image_three = '';
    if(!empty($_FILES['image_one']['tmp_name'])) {
        $image_one = addslashes(file_get_contents($_FILES['image_one']['tmp_name']));
    }
    if(!empty($_FILES['image_two']['tmp_name'])) {
        $image_two = addslashes(file_get_contents($_FILES['image_two']['tmp_name']));
    }
    if(!empty($_FILES['image_three']['tmp_name'])) {
        $image_three = addslashes(file_get_contents($_FILES['image_three']['tmp_name']));
    }

    // Fetch existing images from the database if not uploaded
    if(empty($image_one) && empty($image_two) && empty($image_three)) {
        $fetch_images_query = "SELECT imageOne, imageTwo, imageThree FROM product WHERE productID = $id";
        $result = mysqli_query($connect, $fetch_images_query);
        if($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $image_one = $row['imageOne'];
            $image_two = $row['imageTwo'];
            $image_three = $row['imageThree'];
        }
    }
    
    $update = "UPDATE product SET `name`='$product_name', `description`='$description',`price`='$price',`quantityInStock`='$stock',`mainCategory`='$main_category',`categoryID`='$category',`brandID`='$brand',`sizeID`='$size',`imageOne`='$image_one',`imageTwo`='$image_two',`imageThree`='$image_three' WHERE productID = $id"; 
    if(mysqli_query($connect, $update)){

        $success[] = "product updated!";     
    }else{
        $errors[] = "Something went wrong!";
    }
    
}


    
