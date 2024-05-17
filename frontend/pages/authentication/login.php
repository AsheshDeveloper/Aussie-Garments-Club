<?php 
session_start();

include '../../php/auth/auth_login.php'; 

if (isset($_SESSION["error"])) {
    echo '<script>alert("' . $_SESSION["error"] . '");</script>'; // Display alert
    unset($_SESSION["error"]); // Clear the error message from session
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
    <!-- custom css  -->
    <link rel="stylesheet" href="../../assets/style.css" />


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
                            <img src="../../images/AussieGarmentsLogo.svg" alt="Logo" />
                            <h4 class="mt-3 text-primary">Hello Again!</h4>
                            <small class="text-muted">Please login to get a stylish products.</small>
                            <form class="mt-5 mb-5" action="" method="post">

                                <?php if(isset($errors)) { 
                      foreach($errors as $error){ ?>
                                <div class="alert alert-danger" role="alert">
                                    <?=$error ?>
                                </div>
                                <?php } } ?>
                                <div class="mb-4">
                                    <div class="d-flex align-items-left">
                                        <label class="form-check-label mb-1" for="email">Email or Phone <span
                                                class="text-danger">*</span></label>
                                    </div>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="eg: someone@somthing.com" required />
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex align-items-left">
                                        <label class="form-check-label mb-1" for="password">Password<span
                                                class="text-danger">*</span></label>
                                    </div>
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="password" id="password"
                                            placeholder="**********" required />
                                        <a class="btn btn-outline-secondary" class="btn" id="showPassword"><i
                                                class="far fa-eye"></i></a>
                                    </div>
                                </div>
                                <small class="mb-5 d-flex align-items-center justify-content-between">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="rememberMe" />
                                        <label class="form-check-label" for="rememberMe">Remember me</label>
                                    </div>
                                    <a href="#" class="">Forgot Password?</a>
                                </small>
                                <button type="submit" name="submit" type="name"
                                    class="btn btn-primary w-100 p-2 mb-3">Login</button>
                                <a href="facebook_oauth.php" class="mb-5 mt-5 google-login">
                                    <img class="google-icon" src="../../images/assets/facebook-logo.png"
                                        alt="Google Logo" />
                                    Login with Facebook
                                </a><br>
                                <a href="google-oauth.php" class="mb-5 mt-5 google-login">
                                    <img class="google-icon" src="../../images/assets/google ICon.png"
                                         alt="Google Logo" />
                                    Login with Google
                                </a>
                            </form>
                            <small class="mt-5">Don't have an account yet? <a href="./thirdPartySignup.php">Sign
                                    Up</a></small>
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

    <!-- password button visible -->

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const showPasswordButton = document.getElementById("showPassword");
        const showPasswordButton1 = document.getElementById("showPassword1");

        showPasswordButton.addEventListener("click", function() {
            togglePasswordVisibility("password", this);
        });

        function togglePasswordVisibility(inputId, button) {
            const input = document.getElementById(inputId);

            if (input.type === "password") {
                input.type = "text";
                button.innerHTML = '<i class="far fa-eye-slash"></i>';
            } else {
                input.type = "password";
                button.innerHTML = '<i class="far fa-eye"></i>';
            }
        }
    });
    </script>

</body>

</html>