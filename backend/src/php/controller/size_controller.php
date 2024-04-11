<?php 
if(isset($_POST['create'])){
    require_once("../../php/database_connect.php");        
    $size_name = mysqli_real_escape_string($connect, $_POST['size_name']);

    $fetch_size = " SELECT * FROM size WHERE sizeName = '$size_name' ";

    $result = mysqli_query($connect, $fetch_size);

    if(mysqli_num_rows($result) > 0){
        $errors[] = "size already exists!";
    }else{        
        $insert = "INSERT INTO size(sizeName) VALUES('$size_name')";
        mysqli_query($connect, $insert);
        $success[] = "size created!";
        header("Location: size_index.php");     
    }
} elseif(isset($_POST["update"])){   
    require_once("../../php/database_connect.php"); 
    $id = $_POST['id'];
    $size_name = mysqli_real_escape_string($connect, $_POST['size_name']);  
    $update = "UPDATE size SET `sizeName`='$size_name' WHERE sizeID = $id"; 
    if(mysqli_query($connect, $update)){

        $success[] = "size updated!";     
    }else{
        $errors[] = "Something went wrong!";
    }
    
}


    
