<?php 
session_start();

include __DIR__ .'../../php/auth/auth_login.php'; 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Fontawesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- custom font -->
    <style>
    @import url("https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap");
    </style>

    <!-- Bootstrap CSS -->
    <!-- <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"
    /> -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
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
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-custom-top">
            <div class="container">
                <!-- Left side content -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <span class="nav-link phone-number">+610403876990 | </span>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link">info@aussiegarments.com.au</span>
                    </li>
                </ul>

                <!-- Right side content -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="login.php">Login | </a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="signup.php">Signup |</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Guest</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- main nav bar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-none navbar-custom-main">
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
        </nav>
    </nav>

    <!-- modal for search -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Search</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="enter to search...."
                                id="recipient-name" />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary modalButton">Search</button>
                </div>
            </div>
        </div>
    </div>

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
                                <small class="">Try another way? <a href="./verification.html">CLick Me</a></small>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-light py-5 mt-5">
        <div class="container">
            <div class="row">
                <!-- Column 1 -->
                <div class="col-md-3">
                    <h5>Contact</h5>
                    <small>
                        Acropolis Avenue<br />Rooty Hill, NSW 2766<br />P.O. Box: 19327<br />Phone No:
                        +719087645243<br />Email:
                        info@aussiegarments.com.au
                    </small>
                </div>
                <!-- Column 2 -->
                <div class="col-md-3">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <small>
                            <li><a href="#">HOME</a></li>
                            <li><a href="#">PRODUCTS</a></li>
                            <li><a href="#">ABOUT</a></li>
                            <li><a href="#">CATALOG</a></li>
                            <li><a href="#">SITE MAP</a></li>
                        </small>
                    </ul>
                </div>
                <!-- Column 3 -->
                <div class="col-md-3">
                    <h5>We Support</h5>
                    <img src="../../images/footer/pngimg.svg" alt="Support Image 1" />
                    <img src="../../images/footer/mastercard-og-image.svg" alt="Support Image 2" />
                </div>
                <!-- Column 4 -->
                <div class="col-md-3">
                    <img src="../../images/footer/Group 87.svg" alt="Main Image" class="img-fluid" />
                </div>
            </div>
            <!-- lower section -->
            <div class="row mt-3">
                <!-- Horizontal Line -->
                <hr class="mt-4 mb-0" />
                <div class="row mt-3">
                    <div class="col-md-6">
                        <!-- Left Content -->
                        <p>
                            <small>Aussie Garments Club | © Copyright 2024. All rights reserved.</small>
                            <a href=""><i class="fab fa-facebook me-1"></i> </a>
                            <a href=""><i class="fab fa-twitter me-1"></i> </a>
                            <a href=""><i class="fab fa-youtube me-1"></i> </a>
                            <a href=""><i class="fab fa-whatsapp me-1"></i> </a>
                            <a href=""><i class="fab fa-instagram me-1"></i> </a>
                        </p>
                    </div>
                    <div class="col-md-6 text-end">
                        <!-- Right Content -->
                        <a href=""><small>Feedback</small> </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>