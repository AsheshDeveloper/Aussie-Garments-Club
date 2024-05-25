<?php 
session_start();

include '../../php/auth/auth_login.php'; 
$displayMessage = '';
$errorMessage = '';
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];
    if($newPassword == $confirmPassword) {
        $displayMessage = "Password has been successfully changed. Please <a href='../../index.php'>login</a> with your new password.";
    } else {
        $errorMessage = "Password does not match";
    }
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
                            <h4 class="mt-3 text-primary">New Password</h4>
                            <small class="text-muted">Enter a new password to continue.</small>
                            <?php if ($errorMessage): ?>
                                <div class="alert alert-danger mt-3">
                                    <?php echo $errorMessage; ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($displayMessage): ?>
                                <div class="alert alert-success mt-3">
                                    <?php echo $displayMessage; ?>
                                </div>
                            <?php endif; ?>
                            <form class="mt-5 mb-5" action="" method="post">
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <div class="d-flex">
                                            <label class="form-check-label mb-1" for="newPassword">New Password <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="newPassword"
                                                id="password2" placeholder="new password" required />
                                            <button class="btn btn-outline-secondary" type="button" id="showPassword1">
                                                <i class="fa-solid fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <div class="d-flex">
                                            <label class="form-check-label mb-1" for="confirmPassword">Confirm Password
                                                <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="confirmPassword"
                                                id="password3" placeholder="confirm new pasword" required />
                                            <button class="btn btn-outline-secondary" type="button" id="showPassword2">
                                                <i class="fa-solid fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit"
                                    class="btn btn-primary w-100 p-2 mt-4 mb-2">Change Password</>

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

    <!-- custom script -->
    <!-- password button visible -->
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const showPasswordButton1 = document.getElementById("showPassword1");
        const showPasswordButton2 = document.getElementById("showPassword2");

        showPasswordButton1.addEventListener("click", function() {
            togglePasswordVisibility("password2", this);
        });

        showPasswordButton2.addEventListener("click", function() {
            togglePasswordVisibility("password3", this);
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