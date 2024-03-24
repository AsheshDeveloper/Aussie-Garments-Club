<?php 
if(isset($_POST['create'])){
    require_once("../../php/database_connect.php");        
    $brand_name = mysqli_real_escape_string($connect, $_POST['brand_name']);
    $description = mysqli_real_escape_string($connect, $_POST['description']);

    $fetch_brand = " SELECT * FROM brand WHERE brandName = '$brand_name' ";

    $result = mysqli_query($connect, $fetch_brand);

    if(mysqli_num_rows($result) > 0){
        $errors[] = "Brand already exists!";
    }else{        
        $insert = "INSERT INTO brand(brandName, description) VALUES('$brand_name', '$description')";
        mysqli_query($connect, $insert);
        $success[] = "Brand created!";
        header("Location: brand_index.php");     
    }
} elseif(isset($_POST["update"])){   
    require_once("../../php/database_connect.php"); 
    $id = $_POST['id'];
    $brand_name = mysqli_real_escape_string($connect, $_POST['brand_name']);
    $description = mysqli_real_escape_string($connect, $_POST['description']);    
    $update = "UPDATE brand SET `brandName`='$brand_name', `description`='$description' WHERE brandID = $id"; 
    if(mysqli_query($connect, $update)){

        $success[] = "Brand updated!";     
    }else{
        $errors[] = "Something went wrong!";
    }
    
}


    
