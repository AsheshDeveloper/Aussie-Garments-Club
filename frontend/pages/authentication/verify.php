<?php 
session_start();

include '../../php/auth/auth_login.php'; 

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
                            <small class="text-muted">Enter your Verification Code.</small>
                            <form class="mt-5 mb-5">
                                <div class="mb-3">
                                    <div class="d-flex align-items-left">
                                        <label class="form-check-label mb-1" for="code"> Verification Code<span
                                                class="text-danger">*</span></label>
                                    </div>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="code" id="code"
                                            placeholder="eg - 1232141" required />
                                        <button class="btn btn-outline-secondary" type="button"
                                            id="toggleConfirmPassword">
                                            <i class="fa fa-refresh"></i>
                                        </button>
                                    </div>
                                    <div class="d-flex align-items-left mt-1">
                                        <small class=" ">click the button the the side to send the code again</small>
                                    </div>
                                </div>

                                <a href="../../index.php" type="submit"
                                    class="btn btn-primary w-100 p-2 mt-4 mb-2">Verify Code</a>
                                <small class="">Try another way? <a href="./verification.php">CLick Me</a></small>
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