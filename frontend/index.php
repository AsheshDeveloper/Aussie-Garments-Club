<?php 
session_start();
require_once("php/database_connect.php"); 
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
    <link rel="icon" href="./images/favicon.png" />
    <!-- custom css -->
    <link rel="stylesheet" href="./assets/style.css" />

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
                <?php if(empty($_SESSION['username'])){ ?>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="./pages/login.php">Login | </a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="./pages/signup.php">Signup |</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./pages/profile/user_profile.html">Guest</a>
                    </li>
                </ul>
                <?php } ?>
                <?php if(!empty($_SESSION['username'])){ ?>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <p>Welcome</p>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="./pages/profile/user_profile.html">Log out</a>
                    </li>
                </ul>
                <?php } ?>
            </div>
        </nav>

        <!-- main nav bar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-none navbar-custom-main">
            <div class="container">
                <a class="navbar-brand" href="index.html"><img src="./images/AussieGarmentsLogo.svg" alt="Logo" /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="./pages/products.html">Product</a>
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
                        <li class="nav-item">
                            <div class="dropdown">
                                <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown" aria-expanded="false" href="#">
                                    <i class="fas fa-user"></i>
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <a class="dropdown-item" href="./Pages/login.html">Login</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="./Pages/profile/user_profile.html">Profile</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Logout</a></li>
                                </ul>
                            </div>
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
        <!-- slider area -->
        <div class="container mt-3">
            <div class="row">
                <!-- Left Side Content -->
                <div class="col-md-6 left-content-slider">
                    <h2 class="quote-text mb-4 mt-5">Where style meets convenience, and savings meet satisfaction</h2>
                    <button class="btn btn-primary me-4 px-5 py-2">Get Started</button>
                    <a class="btn btn-outline-primary px-4 py-2" href="./pages/products.html">View Products</a>
                    <p class="mt-2 contacts-info">
                        +610403876990 |
                        <a href=""><i class="fab fa-facebook me-1"></i> </a>
                        <a href=""><i class="fab fa-twitter me-1"></i> </a>
                        <a href=""><i class="fab fa-youtube me-1"></i> </a>
                        <a href=""><i class="fab fa-whatsapp me-1"></i> </a>
                        <a href=""><i class="fab fa-instagram me-1"></i> </a>
                    </p>
                </div>
                <!-- Right Side Content -->
                <div class="col-md-6 right-content-slider mb-4">
                    <!-- Bootstrap Carousel -->
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="./images/slider/clark-street-mercantile-qnKhZJPKFD8-unsplash.jpg"
                                    class="d-block w-100" alt="First slide" />
                            </div>
                            <div class="carousel-item">
                                <img src="./images/slider/clark-street-mercantile-P3pI6xzovu0-unsplash.jpg"
                                    class="d-block w-100" alt="Second slide" />
                            </div>
                            <div class="carousel-item">
                                <img src="./images/slider/francis-duval-IFMbJCtKTjc-unsplash.jpg" class="d-block w-100"
                                    alt="Third slide" />
                            </div>
                            <div class="carousel-item">
                                <img src="./images/slider/francis-duval-IFMbJCtKTjc-unsplash.jpg" class="d-block w-100"
                                    alt="Third slide" />
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- suggestion for you -->
        <div class="container mt-5 mb-5 suggestion-container">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="mb-4">Suggestion for you <img src="./images/assets/refresh 1.png" alt="Suggestion" />
                    </h5>

                    <div class="row-suggestion-items">
                        <div class="row">
                            <?php
                $fetch_product = "Select * from product";
                $results = mysqli_query($connect, $fetch_product);
                while($row=mysqli_fetch_assoc($results) ){                  
                  $imageOne = $row['ImageOne'];
                  $imageTwo = $row['ImageTwo'];
                  echo "<div class='col'>
                  <img src='../backend/src/pages/products/images/$imageOne' alt='Image 1' class='img-fluid' />
                </div>";
                }
              ?>

                        </div>
                        <div class="row mt-3">
                            <?php 
                $fetch_product = "Select * from product Limit 2";
                $results = mysqli_query($connect, $fetch_product);
                while($row=mysqli_fetch_assoc($results) ){                  
                  $imageOne = $row['ImageOne'];
                  $imageTwo = $row['ImageTwo'];
                  echo "<div class='col'>
                          <img src='../backend/src/pages/products/images/$imageOne' alt='Image 3' class='img-fluid' />
                        </div>";
                }
                ?>
                        </div>
                        <p class="mt-3"><a href="#more-suggestions">More in suggestions</a></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <h5 class="mb-4">Purchase again <img src="./images/assets/clock 1.png" alt="Purchase" /></h5>
                    <div class="row-suggestion-items">
                        <div class="row">
                            <?php 
                $fetch_product = "Select * from product";
                $results = mysqli_query($connect, $fetch_product);
                while($row=mysqli_fetch_assoc($results) ){                  
                  $imageOne = $row['ImageOne'];
                  $imageTwo = $row['ImageTwo'];
                  echo "<div class='col'>
                  <img src='../backend/src/pages/products/images/$imageOne' alt='Image 1' class='img-fluid' />
                </div>";
                }
              ?>
                        </div>
                        <div class="row mt-3">
                            <?php 
                $fetch_product = "Select * from product Limit 2";
                $results = mysqli_query($connect, $fetch_product);
                while($row=mysqli_fetch_assoc($results) ){                  
                  $imageOne = $row['ImageOne'];
                  $imageTwo = $row['ImageTwo'];
                  echo "<div class='col'>
                          <img src='../backend/src/pages/products/images/$imageOne' alt='Image 3' class='img-fluid' />
                        </div>";
                }
                ?>
                        </div>
                        <p class="mt-3"><a href="#more-purchases">More in purchase again</a></p>
                    </div>
                </div>
            </div>
        </div>



        <!-- for men section -->
        <div class="container mb-5 section-for-men">
            <h5 class="for-men-heading mb-4">For Men<img src="./images/assets/bussiness-man.png" alt="Heading" /></h5>
            <div class="row section-for-men-row">
                <?php 
                $fetch_product = "Select * from product Limit 4";
                $results = mysqli_query($connect, $fetch_product);
                while($row=mysqli_fetch_assoc($results) ){  
                  $product_name = $row['Name']; 
                  $price = $row['Price'];              
                  $imageOne = $row['ImageOne'];
                  $imageTwo = $row['ImageTwo'];
                  
                  echo "<div class='col' style='position: relative'>
                            <a href='./Pages/product_details.html'>
                                <img src='../backend/src/pages/products/images/$imageOne' alt='Image 1' class='img-fluid mb-3' />
                                <div class='badge text-bg-success badge-floating-stock'>50/100</div>
                            </a>
                            <h5>Suit Set</h5>
                            <p class='text-muted'>$product_name</p>
                            <p class='text-muted'><span>$</span>$price</p>
                            <p>
                                <a href='./pages/product_details.html' class='btn btn-outline-primary'><i class='fas fa-arrow-right'></i></a>
                            </p>
                        </div>";
        }
        ?>
            </div>
        </div>

        <!-- for women section -->
        <div class="container mb-5 section-for-men">
            <h5 class="for-men-heading mb-4">For Women<img src="./images/assets/businesswoman.png" alt="Heading" /></h5>
            <div class="row section-for-men-row">
                <?php 
                $fetch_product = "Select * from product Limit 4";
                $results = mysqli_query($connect, $fetch_product);
                while($row=mysqli_fetch_assoc($results) ){  
                  $product_name = $row['Name']; 
                  $price = $row['Price'];              
                  $imageOne = $row['ImageOne'];
                  $imageTwo = $row['ImageTwo'];
                  echo "<div class='col'>
                          <img src='../backend/src/pages/products/images/$imageOne' alt='Image 1' class='img-fluid mb-3' />
                          <h5>Suit Set</h5>
                          <p class='text-muted'>$product_name</p>
                          <p class='text-muted'><span>$</span>$price</p>
                          <p>
                            <a href='./pages/product_details.html' class='btn btn-outline-primary'><i class='fas fa-arrow-right'></i></a>
                          </p>
                        </div>";
        }
        ?>
            </div>
        </div>
        <!-- for kids section -->
        <div class="container mb-5 section-for-men">
            <h5 class="for-men-heading mb-4">For Kids<img src="./images/assets/boy 1.png" alt="Heading" /></h5>
            <div class="row section-for-men-row">
                <?php 
                $fetch_product = "Select * from product Limit 4";
                $results = mysqli_query($connect, $fetch_product);
                while($row=mysqli_fetch_assoc($results) ){  
                  $product_name = $row['Name']; 
                  $price = $row['Price'];              
                  $imageOne = $row['ImageOne'];
                  $imageTwo = $row['ImageTwo'];
                  echo "<div class='col'>
                          <img src='../backend/src/pages/products/images/$imageOne' alt='Image 1' class='img-fluid mb-3' />
                          <h5>Suit Set</h5>
                          <p class='text-muted'>$product_name</p>
                          <p class='text-muted'><span>$</span>$price</p>
                          <p>
                            <a href='./pages/product_details.html' class='btn btn-outline-primary'><i class='fas fa-arrow-right'></i></a>
                          </p>
                        </div>";
        }
        ?>
            </div>
        </div>
        <!-- for baby section -->
        <div class="container mb-5 section-for-men">
            <h5 class="for-men-heading mb-4">For Baby<img src="./images/assets/baby-boy 1.png" alt="Heading" /></h5>
            <div class="row section-for-men-row">
                <?php 
                $fetch_product = "Select * from product Limit 4";
                $results = mysqli_query($connect, $fetch_product);
                while($row=mysqli_fetch_assoc($results) ){  
                  $product_name = $row['Name']; 
                  $price = $row['Price'];              
                  $imageOne = $row['ImageOne'];
                  $imageTwo = $row['ImageTwo'];
                  echo "<div class='col'>
                          <img src='../backend/src/pages/products/images/$imageOne' alt='Image 1' class='img-fluid mb-3' />
                          <h5>Suit Set</h5>
                          <p class='text-muted'>$product_name</p>
                          <p class='text-muted'><span>$</span>$price</p>
                          <p>
                            <a href='./pages/product_details.html' class='btn btn-outline-primary'><i class='fas fa-arrow-right'></i></a>
                          </p>
                        </div>";
        }
        ?>

            </div>
        </div>

        <?php
        // Include footer
        include 'footer.php';
    ?>
</body>

</html>