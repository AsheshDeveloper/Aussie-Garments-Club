<?php 
include '../../php/database_connect.php';
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
                    <li class="nav-item"><a class="nav-link" href="../Pages/login.html">Login | </a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Pages/signup.html">Signup |</a>
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
        <div class="container mt-5">
            <?php 
            require_once "../../php/database_connect.php";
            $sql_query = "SELECT * FROM product WHERE productID = ".$_GET["id"];
            if ($result = $connect ->query($sql_query)) {
                while ($row = $result -> fetch_assoc()) { 
                    $product_id = $row['ProductID'];
                    $product_name = $row['Name'];
                    $description = $row['Description'];
                    $price = $row['Price'];
                    $stock = $row['QuantityInStock'];
                    $category = $row['CategoryID'];
                    $brand = $row['BrandID'];
                    $size = $row['SizeID'];
                    $imageOne = $row['ImageOne'];
                    $imageTwo = $row['ImageTwo'];
                    $imageThree = $row['ImageThree'];
        ?>
            <div class="row">
                <div class="col-md-6">
                    <!-- Image Slider -->
                    <d iv id="imageSlider" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner product-carousel">
                            <div class="carousel-item active">
                                <img src="../../../backend/src/pages/products/images/<?php echo $imageOne ?>"
                                    class="d-block w-100 product-image" alt="Product Image 1" />
                            </div>
                            <div class="carousel-item">
                                <img src="../../../backend/src/pages/products/images/<?php echo $imageTwo ?>"
                                    class="d-block w-100 product-image" alt="Product Image 2" />
                            </div>
                            <div class="carousel-item">
                                <img src="../../../backend/src/pages/products/images/<?php echo $imageThree ?>"
                                    class="d-block w-100 product-image" alt="Product Image 3" />
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#imageSlider"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#imageSlider"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </d>
                    <!-- Image Selector -->
                    <div class="mt-3 image-selector-container">
                        <img src="../../../backend/src/pages/products/images/<?php echo $imageOne ?>"
                            class="d-inline-block image-selector" alt="Image Selector 1" />
                        <img src="../../../backend/src/pages/products/images/<?php echo $imageTwo ?>"
                            class="d-inline-block image-selector mx-2" alt="Image Selector 2" />
                        <img src="../../../backend/src/pages/products/images/<?php echo $imageThree ?>"
                            class="d-inline-block image-selector mx-2" alt="Image Selector 2" />
                        <img src="../../images/product_details/mohamad-khosravi-5KyzZbonwqQ-unsplash.png"
                            class="d-inline-block image-selector mx-2" alt="Image Selector 2" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="description-container">
                        <!-- Right Column (Empty for now) -->
                        <!-- Right Column -->
                        <h3 class="mt-3 text-primary">
                            <?php echo $product_name ?> <a class="button-fav" href=""> <i class="fas fa-heart"></i></a>
                        </h3>
                        <h5 class="text-primary"><?php echo $price ?></h5>
                        <div class="badge text-bg-success badge-floating-stock mb-1">stock: <?php echo $stock ?></div>
                        <p class="text-muted">
                            <?php echo $description ?>
                        </p>
                        <h5 class="mt-4">Colors</h5>
                        <p>
                            <a href="" class="color-circle" style="background-color: #2e2e2e"></a>
                            <a href="" class="color-circle" style="background-color: #979ca2"></a>
                            <a href="" class="color-circle" style="background-color: #096dd9"></a>
                            <a href="" class="color-circle" style="background-color: #d89761"></a>
                        </p>
                        <h5 class="mt-4">Size</h5>
                        <p>
                            <a href="" class="size-circle btn btn-outline-primary">S</a>
                            <a href="" class="size-circle btn btn-outline-primary">M</a>
                            <a href="" class="size-circle btn btn-outline-primary">L</a>
                            <a href="" class="size-circle btn btn-outline-primary">XL</a>
                        </p>

                        <div class="button-group mt-4">
                            <button type="button" class="btn btn-primary me-3 px-4 py-2">Buy Now</button>
                            <button type="button" data-id="<?php echo $product_id ?>" name="submit"
                                class="btn btn-outline-primary me-4 px-4 py-2 addToCart">Add to Cart</button>
                            </a>
                        </div>
                        <!-- add to cart placeholder -->
                        <div id="popoverContent" class="custom-popover-content">
                            <a href="./cart.html">View cart</a>
                        </div>

                        <div class="click-and-collect mt-4 p-3">
                            <div class="">
                                <div style="float: right">Closes 10pm</div>
                                shopping at
                                <span>
                                    <a href="#" id="openModal" data-bs-toggle="modal"
                                        data-bs-target="#locationModal">Lidcombe</a>
                                </span>
                            </div>

                            <div class="accordion mt-3" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            Click and Collect
                                        </button>
                                    </h2>

                                    <div id="collapseOne" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <span>Collect win 2 - 7 days</span>

                                            Items unavailable at this store are transferred from another store. Please
                                            wait for an email confirming the item is
                                            ready to collect.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h5 class="mt-4">Information</h5>
                        <ul style="list-style: none">
                            <li><span class="text-primary">Style</span> <span class="text-muted">Casual</span></li>
                            <li><span class="text-primary">Weight</span> <span class="text-muted">200gm</span></li>
                            <li><span class="text-primary">Country</span> <span class="text-muted">Neapl</span></li>
                        </ul>

                        <h5 class="mt-4">Features</h5>
                        <ul style="list-style: none">
                            <li><span class="text-primary">Style</span> <span class="text-muted">Casual</span></li>
                            <li><span class="text-primary">Weight</span> <span class="text-muted">200gm</span></li>
                            <li><span class="text-primary">Country</span> <span class="text-muted">Neapl</span></li>
                        </ul>

                        <h5 class="mt-4">Internal construction</h5>
                        <p class="text-muted">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia, molestiae quas vel
                            sint commodi repudiandae
                            consequuntur voluptatum laborum numquam blanditiis harum quisquam eius sed odit fugiat iusto
                            fuga praesentium optio, eaque
                            rerum! Provident similique accusantium nemo autem.
                        </p>
                    </div>
                </div>
            </div>
            <?php 
                }
            }
        ?>
        </div>
        <div class="container mt-5">
            <div class="row product-review-container">
                <div class="col-md-6">
                    <h5 class="mt-4">Internal construction</h5>
                    <p class="text-muted">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia, molestiae quas vel
                        sint commodi repudiandae
                        consequuntur voluptatum laborum numquam blanditiis harum quisquam eius sed odit fugiat iusto
                        fuga praesentium optio, eaque
                        rerum! Provident similique accusantium nemo autem.
                    </p>
                </div>
                <div class="col-md-6">
                    <h5 class="mt-4">Internal construction</h5>
                    <p class="text-muted">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia, molestiae quas vel
                        sint commodi repudiandae
                        consequuntur voluptatum laborum numquam blanditiis harum quisquam eius sed odit fugiat iusto
                        fuga praesentium optio, eaque
                        rerum! Provident similique accusantium nemo autem.
                    </p>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <div class="row product-review-container">
                <div class="col-md-6">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4>Product Reviews</h4>

                        <div class="d-flex align-items-center">
                            <button class="btn btn-primary me-4 py-2" data-bs-toggle="modal"
                                data-bs-target="#writeReviewModal">Write a Review</button>
                            <div class="dropdown">
                                <button class="btn btn-outline-primary dropdown-toggle py-2" type="button"
                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    Sort By
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="#">Most Recent</a></li>
                                    <li><a class="dropdown-item" href="#">Highest Rating</a></li>
                                    <li><a class="dropdown-item" href="#">Lowest Rating</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="stars me-2">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                    <p>4.0 (500 reviews)</p>

                    <!-- Review -->

                    <div class="review">
                        <div class="d-flex align-items-center">
                            <img src="../../images/profile/stefan-stefancik-QXevDflbl8A-unsplash.jpg" alt="User Image"
                                class="user-image me-2" />
                            <div class="mt-3">
                                <h6>Someone Jonson</h6>
                                <p class="text-muted">someone@gmail.com</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="stars me-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <span class="text-muted">April 2, 2024</span>
                        </div>
                        <p class="mt-2 text-muted">
                            Request dry cleaning at specialist cleaners only, do not bleach. Do not tumble dry, this is
                            the random text iron at low
                            temperature.
                        </p>
                    </div>
                    <div class="review">
                        <div class="d-flex align-items-center">
                            <img src="../../images/profile/stefan-stefancik-QXevDflbl8A-unsplash.jpg" alt="User Image"
                                class="user-image me-2" />
                            <div class="mt-3">
                                <h6>Someone Jonson</h6>
                                <p class="text-muted">someone@gmail.com</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="stars me-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <span class="text-muted">April 2, 2024</span>
                        </div>
                        <p class="mt-2 text-muted">
                            Request dry cleaning at specialist cleaners only, do not bleach. Do not tumble dry, this is
                            the random text iron at low
                            temperature.
                        </p>
                    </div>
                    <div class="view-more-reviews">
                        <a href="#" class="">View more reviews</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- suggestion for you -->
    <div class="container mt-5 mb-5 suggestion-container">
        <div class="row">
            <div class="col-md-6">
                <h5 class="mb-4">Suggestion for you <img src="../../images/assets/refresh 1.png" alt="Suggestion" />
                </h5>

                <div class="row-suggestion-items">
                    <div class="row">
                        <div class="col">
                            <a href="">
                                <img src="../../images/suggestions/suggestion1.png" alt="Image 1" class="img-fluid" />
                            </a>
                        </div>
                        <div class="col">
                            <a href="">
                                <img src="../../images/suggestions/suggestion2.png" alt="Image 2" class="img-fluid" />
                            </a>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <a href="">
                                <img src="../../images/suggestions/suggestion3.png" alt="Image 3" class="img-fluid" />
                            </a>
                        </div>
                        <div class="col">
                            <a href="">
                                <img src="../../images/suggestions/suggedtion3.1.png" alt="Image 4" class="img-fluid" />
                            </a>
                        </div>
                    </div>
                    <p class="mt-3"><a href="#more-suggestions">More in suggestions</a></p>
                </div>
            </div>
            <div class="col-md-6">
                <h5 class="mb-4">Purchase again <img src="../../images/assets/clock 1.png" alt="Purchase" /></h5>
                <div class="row-suggestion-items">
                    <div class="row">
                        <div class="col">
                            <a href="">
                                <img src="../../images/suggestions/suggestion3.png" alt="Image 3" class="img-fluid" />
                            </a>
                        </div>
                        <div class="col">
                            <a href="">
                                <img src="../../images/suggestions/suggedtion3.1.png" alt="Image 4" class="img-fluid" />
                            </a>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <a href="">
                                <img src="../../images/suggestions/suggestion1.png" alt="Image 1" class="img-fluid" />
                            </a>
                        </div>
                        <div class="col">
                            <a href="">
                                <img src="../../images/suggestions/suggestion2.png" alt="Image 2" class="img-fluid" />
                            </a>
                        </div>
                    </div>
                    <p class="mt-3"><a href="#more-purchases">More in purchase again</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- click and collect location Modal -->

    <div class="modal fade" id="locationModal" tabindex="-1" aria-labelledby="locationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="locationModalLabel">Change your store</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">location change</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Write Review Modal -->
    <div class="modal fade" id="writeReviewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Write a Review</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="reviewTitle" class="form-label">Review Title</label>
                            <input type="text" class="form-control" id="reviewTitle" />
                        </div>
                        <div class="mb-3">
                            <label for="reviewText" class="form-label">Your Review</label>
                            <textarea class="form-control" id="reviewText" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Review</button>
                    </form>
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
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <!-- <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
      integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
      crossorigin="anonymous"
    ></script> -->

    <script>
    // JavaScript to change main product image when an image selector is clicked
    const imageSelectors = document.querySelectorAll(".image-selector");
    const productImages = document.querySelectorAll(".product-image");

    imageSelectors.forEach((selector, index) => {
        selector.addEventListener("click", () => {
            // Remove 'active' class from all product images
            productImages.forEach((image) => {
                image.classList.remove("active");
            });
            // Add 'active' class to the corresponding product image
            productImages[index].classList.add("active");
        });
    });
    // placeholder
    // Initialize popover
    var popover = new bootstrap.Popover(document.getElementById("popoverButton"), {
        container: "body",
        placement: "bottom",
        trigger: "click",
        html: true,
        content: function() {
            return document.getElementById("popoverContent").innerHTML;
        },
    });

    // expandable click and collect
    document.addEventListener("DOMContentLoaded", function() {
        const clickableDiv = document.querySelector(".clickable-div");
        const description = clickableDiv.querySelector(".description");

        clickableDiv.addEventListener("click", function() {
            if (description.style.display === "none") {
                description.style.display = "block";
            } else {
                description.style.display = "none";
            }
        });
    });
    </script>

    <!---Cart Script--->
    <script type="text/javascript">
    $(document).on('click', '.addToCart', function(e) {
        e.preventDefault();
        let $error = $('#error');
        var product_id = parseInt($(this).data('id'));
        if (isNaN(product_id)) {
            return;
        } else {
            $.ajax({
                url: "../../php/function/functions.php",
                method: "POST",
                data: {
                    action: 'insert', // Set action to 'insert'
                    product_id: product_id,
                    _token: $('[name="csrf-token"]').attr('content'),
                },
                success: function(response) {
                    // Check if response contains an error message
                    if (response.error) {
                        // Product already exists in the cart, show error message
                        //$error.text(response.error);
                        $('.addToCart').text(response.error).removeClass('btn-outline-primary')
                            .addClass('btn-danger');
                    } else {
                        // Product added to cart successfully, update button text and color
                        $('.addToCart').text(response.success).removeClass('btn-outline-primary')
                            .addClass('btn-success');
                    }
                }
            });
        }
        return;
    });
    </script>
</body>

</html>