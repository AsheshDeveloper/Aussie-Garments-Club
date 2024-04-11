<?php 
if(isset($_POST['create'])){
    require_once("../../php/database_connect.php");        
    $street_address = mysqli_real_escape_string($connect, $_POST['street_address']);
    $city = mysqli_real_escape_string($connect, $_POST['city']);
    $state = mysqli_real_escape_string($connect, $_POST['state']);
    $postal_code = mysqli_real_escape_string($connect, $_POST['postal_code']);

    $fetch_address = " SELECT * FROM address WHERE addressName = '$street_address' ";

    $result = mysqli_query($connect, $fetch_address);

    if(mysqli_num_rows($result) > 0){
        $errors[] = "address already exists!";
    }else{        
        $insert = "INSERT INTO address(streetAddress, city, state, postalCode) VALUES('$street_address', '$city', '$state', '$postal_code')";
        mysqli_query($connect, $insert);
        $success[] = "address created!";
        header("Location: address.php");     
    }
} elseif(isset($_POST["update"])){   
    require_once("../../php/database_connect.php"); 
    $id = $_POST['id'];
    $street_address = mysqli_real_escape_string($connect, $_POST['street_address']);
    $city = mysqli_real_escape_string($connect, $_POST['city']);
    $state = mysqli_real_escape_string($connect, $_POST['state']);
    $postal_code = mysqli_real_escape_string($connect, $_POST['postal_code']);    
    $update = "UPDATE address SET `streetAddress`='$street_address', `city`='$city', `state`='$state', `postalCode`='$postal_code'  WHERE addressID = $id"; 
    if(mysqli_query($connect, $update)){

        $success[] = "address updated!";     
    }else{
        $errors[] = "Something went wrong!";
    }
    
}


    
