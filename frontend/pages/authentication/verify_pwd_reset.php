<?php 
session_start();

include '../../php/auth/auth_login.php'; 

if($_SERVER['REQUEST_METHOD']=="POST"){
    $code_sent = $_SESSION['verification_code'];
    $code_eneterd = $_POST['code'];
    if($code_sent == $code_eneterd){
        header('Location:forgotpwdreset.php');
    }else{
        $_SESSION['error_message'] = 'Verification code does not match. Please try again.';
        header('Location:verify_pwd_reset.php');
        exit();
    }
   
}
$error_message = '';
if(isset($_SESSION['error_message'])) {
    $error_message = $_SESSION['error_message'];
    unset($_SESSION['error_message']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- header section include -->
    <?php
    include '../../includes/head_section.html';
    ?>
    <!-- app icon -->
    <link rel="icon" href="../../images/favicon.png" />
    <!-- custom css -->
    <link rel="stylesheet" href="../../assets/style.css" />

    <title>Aussie Garments</title>
</head>

<body>
    <!-- navigation  -->
    <nav class="nav-wrapper">
        <!-- top navigation -->
        <?php 
        include '../../includes/nav_top.php';
    ?>
        <!-- main nav bar -->
        <?php 
        include '../../includes/nav_main.php';
    ?>
    </nav>

    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mx-auto">
                    <div class="card shadowed-card p-4 mt-5 mb-5">
                        <div class="card-body text-center">
                            <h4 class="mt-3 text-primary">Verification Code</h4>
                            <small class="text-muted">A verification code has been sent to your email.</small>
                            <?php if ($error_message): ?>
                                <div class="alert alert-danger mt-3">
                                    <?php echo $error_message; ?>
                                </div>
                            <?php endif; ?>
                            <form class="mt-5 mb-5" method="post" action="">
                                <div class="mb-3">
                                    <div class="d-flex align-items-left">
                                        <label class="form-check-label mb-1" for="code"> Verification Code<span
                                                class="text-danger">*</span></label>
                                    </div>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="code" id="code"
                                            placeholder="enter the verification code" required />
                                        <button class="btn btn-outline-secondary" type="submit"
                                            id="toggleConfirmPassword">
                                            <i class="fa fa-refresh"></i>
                                        </button>
                                    </div>
                                    <div class="d-flex align-items-left mt-1">
                                        <small class=" ">click the button on the side to send the code again</small>
                                    </div>
                                </div>

                                <button type="submit"
                                    class="btn btn-primary w-100 p-2 mt-4 mb-2">Verify Code</>
                                <!-- <small class="">Try another way? <a href="./verification.php">CLick Me</a></small> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
        // Include footer
        include '../../includes/footer.php';
    ?>
    <!-- Optional JavaScript -->

</body>

</html>
