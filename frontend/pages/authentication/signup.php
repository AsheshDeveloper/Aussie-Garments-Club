<?php 
session_start();
include '../../php/auth/auth_signup.php'; 
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
    <!-- top navigation -->
    <nav class="nav-wrapper">
        <!-- top navigation -->
        <?php 
        include '../../includes/nav_top.php';
    ?>
        <!-- main nav bar -->
        <?php 
        include '../../includes/nav_main.php';
    ?>
        <!-- <nav class="navbar navbar-expand-lg navbar-light bg-none navbar-custom-main">
            <div class="container">
                <a class="navbar-brand" href="../../index.php"><img src="../../images/AussieGarmentsLogo.svg"
                        alt="Logo" /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Catalog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Site Map</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">
                                <i class="fas fa-search"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav> -->
    </nav>

    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mx-auto">
                    <div class="card shadowed-card p-4 mt-5 mb-5">
                        <div class="card-body text-center">
                            <img src="../../images/AussieGarmentsLogo.svg" alt="Logo" />
                            <h4 class="mt-3 text-primary">Finally Here!</h4>
                            <small class="text-muted">Create a account to get a stylish product.</small>
                            <form class="mt-5 mb-5" action="" method="post">
                                <?php if(isset($errors)) { 
                    foreach($errors as $error){ ?>
                                <div class="alert alert-danger" role="alert">
                                    <?=$error ?>
                                </div>
                                <?php } } ?>
                                <div class="mb-4">
                                    <div class="d-flex align-items-left">
                                        <label class="form-check-label mb-1" for="first_name">First Name <span
                                                class="text-danger">*</span></label>
                                    </div>
                                    <input type="text" class="form-control" name="first_name" id="first_name"
                                        placeholder="eg: Harry" required />
                                </div>
                                <div class="mb-4">
                                    <div class="d-flex align-items-left">
                                        <label class="form-check-label mb-1" for="middle_name">Middle Name</label>
                                    </div>
                                    <input type="text" class="form-control" name="middle_name" id="middle_name"
                                        placeholder="eg: Harry" />
                                </div>
                                <div class="mb-4">
                                    <div class="d-flex align-items-left">
                                        <label class="form-check-label mb-1" for="last_name">Last Name <span
                                                class="text-danger">*</span></label>
                                    </div>
                                    <input type="text" class="form-control" name="last_name" id="last_name"
                                        placeholder="eg: jaggard" required />
                                </div>
                                <div class="mb-4">
                                    <div class="d-flex align-items-left">
                                        <label class="form-check-label mb-1" for="contact">Contact Number<span
                                                class="text-danger">*</span></label>
                                    </div>
                                    <input type="text" class="form-control" name="contact" id="contact"
                                        placeholder="eg: +6189876756" required />
                                </div>
                                <div class="mb-4">
                                    <div class="d-flex align-items-left">
                                        <label class="form-check-label mb-1" for="email"> Email <span
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

                                <div class="mb-3">
                                    <div class="d-flex align-items-left">
                                        <label class="form-check-label mb-1" for="password">Confirm Password<span
                                                class="text-danger">*</span></label>
                                    </div>
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="confirm_password"
                                            id="password1" placeholder="**********" required />
                                        <a class="btn btn-outline-secondary" class="btn" id="showPassword1"><i
                                                class="far fa-eye"></i></a>
                                    </div>
                                </div>


                                <small class="mb-5 d-flex align-items-center justify-content-between"> </small>
                                <button type="submit" name="submit"
                                    class="btn btn-primary w-100 p-2 mb-3">Signup</button>

                            </form>
                            <small class="mt-5">Already Have an account? <a href="login.php">Log
                                    In</a></small>
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

        showPasswordButton1.addEventListener("click", function() {
            togglePasswordVisibility("password1", this);
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