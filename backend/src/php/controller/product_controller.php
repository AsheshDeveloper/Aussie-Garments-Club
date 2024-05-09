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

    //accessing images
    $image_one = mysqli_real_escape_string($connect, $_FILES['image_one']['name']);
    $image_two = mysqli_real_escape_string($connect, $_FILES['image_two']['name']);
    $image_three = mysqli_real_escape_string($connect, $_FILES['image_three']['name']);

    //access image tmp name
    $tmp_image_one = $_FILES['image_one']['tmp_name'];
    $tmp_image_two = $_FILES['image_two']['tmp_name'];
    $tmp_image_three = $_FILES['image_three']['tmp_name'];

    $fetch_product = " SELECT * FROM product WHERE productName = '$product_name' ";

    $result = mysqli_query($connect, $fetch_product);

    if(mysqli_num_rows($result) > 0){
        $errors[] = "product already exists!";
    }else{        
        move_uploaded_file($tmp_image_one,"./images/$image_one");
        move_uploaded_file($tmp_image_two,"./images/$image_two");
        move_uploaded_file($tmp_image_three,"./images/$image_three");

        $insert = "INSERT INTO product(name, description,price,quantityInStock,mainCategory,categoryID,brandID,sizeID,imageOne,imageTwo,imageThree) VALUES('$product_name', '$description', '$price', '$stock','$main_category' ,'$category', '$brand', '$size', '$image_one', '$image_two', '$image_three')";
        mysqli_query($connect, $insert);
        $success[] = "product created!";
        header("Location: product.php");     
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
    $update = "UPDATE product SET `productName`='$product_name', `description`='$description',`price`='$price',`quntityInStock`='$stock',`mainCategory`='$main_category',`categoryID`='$category',`brandID`='$brand',`sizeID`='$size', WHERE productID = $id"; 
    if(mysqli_query($connect, $update)){

        $success[] = "product updated!";     
    }else{
        $errors[] = "Something went wrong!";
    }
    
}


    
