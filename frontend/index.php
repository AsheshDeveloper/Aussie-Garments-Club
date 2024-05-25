<?php 
session_start();
require_once("php/database_connect.php"); 

// find authenticated user details
if (isset($_SESSION["email"])) {
    $findUser = "SELECT * FROM users WHERE email = '{$_SESSION['email']}'";
    $fetchUser = mysqli_query($connect, $findUser);
    $user = null; // Initialize user variable
    if(mysqli_num_rows($fetchUser) > 0){
        $user = mysqli_fetch_array($fetchUser);
        $userID = $user['id'];
    }
    $getData = "SELECT c.*, p.* FROM Cart c INNER JOIN Product p ON c.ProductID = p.ProductID WHERE c.UserID='$userID'";
}else{
    $getData = "SELECT c.*, p.* FROM Cart c INNER JOIN Product p ON c.ProductID = p.ProductID ";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- header section include -->
    <?php 
        include './includes/head_section.html';
    ?>
    <!-- app icon -->
    <link rel="icon" href="./images/favicon.png" />
    <!-- custom css -->
    <link rel="stylesheet" href="./assets/style.css" />
</head>

<body>
    <!-- navigation  -->
    <nav class="nav-wrapper">
        <!-- top navigation -->
        <?php 
        include './includes/nav_top.php';
    ?>
        <!-- main nav bar -->
        <?php 
        include './includes/nav_main.php';
    ?>

    </nav>


    <div class="container-fluid">
        <!-- slider area -->
        <div class="container mt-3">
            <div class="row">
                <!-- Left Side Content -->
                <div class="col-md-6 left-content-slider">
                    <h2 class="quote-text mb-4 mt-5">Where style meets convenience, and savings meet satisfaction</h2>
                    <?php
                    if(empty($_SESSION['userId'])){

                       echo' <a href="./pages/authentication/thirdPartySignup.php" class="btn btn-primary me-4 px-5 py-2">Get
                            Started</a>';
                    }
                    ?>
                    <?php
                    if(!empty($_SESSION['userId'])){

                       echo' 
                     <a class="btn btn-primary px-4 py-2" href="./pages/product/products.php">View Products</a>';

                    } else {
                          echo' 
                     <a class="btn btn-outline-primary px-4 py-2" href="./pages/product/products.php">View Products</a>';
                    }
                    ?>
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
                                $fetch_product = "Select * from product Limit 2";
                                $results = mysqli_query($connect, $fetch_product);
                                while($row=mysqli_fetch_assoc($results) ){   
                                    $product_id = $row['ProductID'];               
                                $imageOne = $row['ImageOne'];
                                $imageTwo = $row['ImageTwo'];
                                echo "<div class='col'>
                                        <a href='./pages/product/product_details.php?id=$product_id'>                                        
                                        <img src='data:image/jpeg;base64," .base64_encode($imageOne)."' alt='Image 1' class='img-fluid' />
                                        </a> </div>";
                                }
                            ?>

                        </div>
                        <div class="row mt-3">
                            <?php 
                                $fetch_product = "Select * from product Limit 2";
                                $results = mysqli_query($connect, $fetch_product);
                                while($row=mysqli_fetch_assoc($results) ){         
                                    $product_id = $row['ProductID'];         
                                $imageOne = $row['ImageOne'];
                                $imageTwo = $row['ImageTwo'];
                                echo "<div class='col'>
                                        <a href='./pages/product/product_details.php?id=$product_id'>                                        
                                        <img src='data:image/jpeg;base64," .base64_encode($imageTwo)."' alt='Image 1' class='img-fluid' />
                                        </a> </div>";
                                }
                            ?>
                        </div>
                        <p class="mt-3"><a href="./pages/product/products.php">More in suggestions</a></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <h5 class="mb-4">Purchase again <img src="./images/assets/clock 1.png" alt="Purchase" /></h5>
                    <div class="row-suggestion-items">
                        <div class="row">
                            <?php 
                                $fetch_product = "Select * from product Limit 2";
                                $results = mysqli_query($connect, $fetch_product);
                                while($row=mysqli_fetch_assoc($results) ){            
                                    $product_id = $row['ProductID'];      
                                $imageOne = $row['ImageOne'];
                                $imageTwo = $row['ImageTwo'];
                                echo "<div class='col'>
                                        <a href='./pages/product/product_details.php?id=$product_id'>                                        
                                        <img src='data:image/jpeg;base64," .base64_encode($imageOne)."' alt='Image 1' class='img-fluid' />
                                        </a> </div>";
                                }
                            ?>
                        </div>
                        <div class="row mt-3">
                            <?php 
                                $fetch_product = "Select * from product Limit 2";
                                $results = mysqli_query($connect, $fetch_product);
                                while($row=mysqli_fetch_assoc($results) ){       
                                    $product_id = $row['ProductID'];           
                                $imageOne = $row['ImageOne'];
                                $imageTwo = $row['ImageTwo'];
                                echo "<div class='col'>
                                        <a href='./pages/product/product_details.php?id=$product_id'>                                        
                                        <img src='data:image/jpeg;base64," .base64_encode($imageTwo)."' alt='Image 1' class='img-fluid' />
                                        </a> </div>";
                                }
                            ?>
                        </div>
                        <p class="mt-3"><a href="./pages/product/products.php">More in purchase again</a></p>
                    </div>
                </div>
            </div>
        </div>



        <!-- for men section -->
        <div class="container mb-5 section-for-men">
            <h5 class="for-men-heading mb-4">For Men<img src="./images/assets/bussiness-man.png" alt="Heading" /></h5>
            <div class="row section-for-men-row">
                <?php 
                $fetch_product = "SELECT * FROM product WHERE mainCategory = 'men' LIMIT 4";
                $results = mysqli_query($connect, $fetch_product);
                while($row=mysqli_fetch_assoc($results) ){  
                    $product_id = $row['ProductID'];
                  $product_name = $row['Name']; 
                  $product_category = $row['MainCategory'];
                  $price = $row['Price'];              
                  $imageOne = $row['ImageOne'];
                  $imageTwo = $row['ImageTwo'];
                  
                  echo "<div class='col' style='position: relative'>
                            <a href='./pages/product/product_details.php?id=$product_id'>
                                <img src='data:image/jpeg;base64," .base64_encode($imageOne)."' alt='Image 1' class='img-fluid mb-3' />
                                <div class='badge text-bg-success badge-floating-stock'>50/100</div>
                            </a>
                            <h5>$product_name</h5>
                            <p class='text-muted'>$product_category</p>
                            <p class='text-muted'><span>$</span>$price</p>
                            <p>
                                <a href='./pages/product/product_details.php?id=$product_id' class='btn btn-outline-primary'><i class='fas fa-arrow-right'></i></a>
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
                $fetch_product = "SELECT * FROM product WHERE mainCategory = 'women' LIMIT 4";
                $results = mysqli_query($connect, $fetch_product);
                while($row=mysqli_fetch_assoc($results) ){  
                    $product_id = $row['ProductID'];
                  $product_name = $row['Name']; 
                  $product_category = $row['MainCategory'];
                  $price = $row['Price'];              
                  $imageOne = $row['ImageOne'];
                  $imageTwo = $row['ImageTwo'];
                  echo "<div class='col'>
                          <img src='data:image/jpeg;base64," .base64_encode($imageOne)."' alt='Image 1' class='img-fluid mb-3' />
                          <h5>$product_name</h5>
                          <p class='text-muted'>$product_category</p>
                          <p class='text-muted'><span>$</span>$price</p>
                          <p>
                            <a href='./pages/product/product_details.php?id=$product_id' class='btn btn-outline-primary'><i class='fas fa-arrow-right'></i></a>
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
                $fetch_product = "SELECT * FROM product WHERE mainCategory = 'kids' LIMIT 4";
                $results = mysqli_query($connect, $fetch_product);
                while($row=mysqli_fetch_assoc($results) ){  
                    $product_id = $row['ProductID'];
                  $product_name = $row['Name']; 
                  $product_category = $row['MainCategory'];
                  $price = $row['Price'];              
                  $imageOne = $row['ImageOne'];
                  $imageTwo = $row['ImageTwo'];
                  echo "<div class='col'>
                          <img src='data:image/jpeg;base64," .base64_encode($imageOne)."' alt='Image 1' class='img-fluid mb-3' />
                          <h5>$product_name</h5>
                          <p class='text-muted'>$product_category</p>
                          <p class='text-muted'><span>$</span>$price</p>
                          <p>
                            <a href='./pages/product/product_details.php?id=$product_id' class='btn btn-outline-primary'><i class='fas fa-arrow-right'></i></a>
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
                $fetch_product = "SELECT * FROM product WHERE mainCategory = 'baby' LIMIT 4";
                $results = mysqli_query($connect, $fetch_product);
                while($row=mysqli_fetch_assoc($results) ){  
                    $product_id = $row['ProductID'];
                  $product_name = $row['Name']; 
                  $product_category = $row['MainCategory'];
                  $price = $row['Price'];              
                  $imageOne = $row['ImageOne'];
                  $imageTwo = $row['ImageTwo'];
                  echo "<div class='col'>
                          <img src='data:image/jpeg;base64," .base64_encode($imageOne)."' alt='Image 1' class='img-fluid mb-3' />
                          <h5>$product_name</h5>
                          <p class='text-muted'>$product_category</p>
                          <p class='text-muted'><span>$</span>$price</p>
                          <p>
                            <a href='./pages/product/product_details.php?id=$product_id' class='btn btn-outline-primary'><i class='fas fa-arrow-right'></i></a>
                          </p>
                        </div>";
        }
        ?>

            </div>
        </div>

        <?php
        // Include footer
        include './includes/footer.php';
    ?>
</body>

</html>