<?php 
if(isset($_POST['create'])){
    require_once("../../php/database_connect.php");        
    $category_name = mysqli_real_escape_string($connect, $_POST['category_name']);
    $description = mysqli_real_escape_string($connect, $_POST['description']);

    $fetch_category = " SELECT * FROM category WHERE categoryName = '$category_name' ";

    $result = mysqli_query($connect, $fetch_category);

    if(mysqli_num_rows($result) > 0){
        $errors[] = "category already exists!";
    }else{        
        $insert = "INSERT INTO category(categoryName, description) VALUES('$category_name', '$description')";
        mysqli_query($connect, $insert);
        $success[] = "category created!";
        header("Location: category.php");     
    }
} elseif(isset($_POST["update"])){   
    require_once("../../php/database_connect.php"); 
    $id = $_POST['id'];
    $category_name = mysqli_real_escape_string($connect, $_POST['category_name']);
    $description = mysqli_real_escape_string($connect, $_POST['description']);    
    $update = "UPDATE category SET `categoryName`='$category_name', `description`='$description' WHERE categoryID = $id"; 
    if(mysqli_query($connect, $update)){

        $success[] = "category updated!";     
    }else{
        $errors[] = "Something went wrong!";
    }
    
}


    
