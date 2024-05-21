<?php 
if(isset($_POST['submit'])){
    // Connect to the database 
    $connect = mysqli_connect('localhost', 'root', '', 'the_garments_club');
    
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $password = md5($_POST['password']);

    $fetch_user = " SELECT * FROM users WHERE email = '$email' && password='$password' ";

    $result = mysqli_query($connect, $fetch_user);
// fetch user
    //check if verified. or verifiy page verify.php
    if(mysqli_num_rows($result) > 0){
        $row= mysqli_fetch_array($result);
        $_SESSION['userId'] = $row['id'];
        $_SESSION['username'] = $row['first_name'];
        $_SESSION['email'] = $row['email'];
        if($row['verified']) {
            header('Location: ../../index.php');
        } else {
            header('Location: ../../pages/authentication/verification.php');
        }
    }else{
        $errors[] = 'Incorrect email or password!';
    }
}
?>