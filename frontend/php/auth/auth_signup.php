
<?php 
if(isset($_POST['submit'])){
    // Connect to the database 
    $connect = mysqli_connect('localhost', 'root', '', 'the_garments_club');
    
    $first_name = mysqli_real_escape_string($connect, $_POST['first_name']);
    $middle_name = mysqli_real_escape_string($connect, $_POST['middle_name']);
    $last_name = mysqli_real_escape_string($connect, $_POST['last_name']);
    $contact = mysqli_real_escape_string($connect, $_POST['contact']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $password = md5($_POST['password']);
    $confirm_password = md5($_POST['confirm_password']);

    $fetch_user = " SELECT * FROM users WHERE contact= '$contact' && email = '$email' ";

    $result = mysqli_query($connect, $fetch_user);

    if(mysqli_num_rows($result) > 0){
        $errors[] = "User already exists!";
    }else{
        if($password != $confirm_password) {
            $errors[] = "Password does not match!";
        }else{
            $insert = "INSERT INTO users(first_name, middle_name,last_name,contact,email,password) VALUES('$first_name', '$middle_name', '$last_name', '$contact', '$email', '$password')";
            mysqli_query($connect, $insert);
            $_SESSION['username'] = $first_name;
            header("Location: ../../index.php");
        }
    }
}

?>
