<?php 
session_start();

include __DIR__ .'../../php/auth/auth_login.php'; 

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
                            <h4 class="mt-3 text-primary">Verify Your account</h4>
                            <small class="text-muted">how would like to verify your account?</small>
                            <form class="mt-5 mb-5">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadio" id="radio1"
                                        value="option1" checked />
                                    <div class="d-flex align-items-left">
                                        <label class="form-check-label" for="radio1"> By Phone
                                            <strong>+610987654325</strong> </label>
                                    </div>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadio" id="radio1"
                                        value="option1" checked />
                                    <div class="d-flex align-items-left">
                                        <label class="form-check-label" for="radio1"> By email
                                            <strong>someone@someone.com</strong> </label>
                                    </div>
                                </div>

                                <a href="./verify.php" type="submit" class="btn btn-primary w-100 p-2 mt-4">Send
                                    Verification Code</a>
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