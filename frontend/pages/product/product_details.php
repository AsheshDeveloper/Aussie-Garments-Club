<?php 
session_start();
include '../../php/database_connect.php';
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
                    <div id="imageSlider" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner product-carousel">
                            <div class="carousel-item active">
                                <img src="../../images/products/<?php echo $imageOne; ?>" alt='Image 1'
                                    class='d-block w-100 product-image' />
                            </div>
                            <div class="carousel-item">
                                <img src="../../images/products/<?php echo $imageTwo; ?>" alt='Image 1'
                                    class='d-block w-100 product-image' />
                            </div>
                            <div class="carousel-item">
                                <img src="../../images/products/<?php echo $imageThree; ?>" alt='Image 1'
                                    class='d-block w-100 product-image' />
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
                    </div>
                    <!-- Image Selector -->
                    <div class="mt-3 image-selector-container">
                        <img src="../../images/products/<?php echo $imageOne; ?>" class="d-inline-block image-selector"
                            alt="Image Selector 1" />
                        <img src="../../images/products/<?php echo $imageTwo; ?>"
                            class="d-inline-block image-selector mx-2" alt="Image Selector 2" />
                        <img src="../../images/products/<?php echo $imageThree; ?>"
                            class="d-inline-block image-selector mx-2" alt="Image Selector 2" />
                    </div>
                </div>
                <div class="col-md-6">
                    <p id="response-container"></p>
                    <div class="description-container">
                        <!-- userID and productID here -->
                        <?php 
                        if(!empty($_SESSION['userId'])){
                           echo" <input type='hidden' id='userID' value='{$_SESSION['userId']}'>
                                <input type='hidden' id='productID' value='{$_GET['id']}'> ";
                        }
                    ?>
                        <?php
                        require_once "../../php/database_connect.php";
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $action = $_POST['action'];
                            $userID = $_SESSION['userId'];
                            $productID = $_POST['productID'];

                            if ($action == 'add') {
                                $sql = "INSERT INTO wishlist (userID, productID) VALUES (?, ?)";
                                $stmt = $connect->prepare($sql);
                                $stmt->bind_param("ii", $userID, $productID);

                                if ($stmt->execute()) {
                                    echo "success";
                                } else {
                                    echo "error";
                                }
                                $stmt->close();
                            } elseif ($action == 'remove') {
                                $sql = "DELETE FROM wishlist WHERE userID = ? AND productID = ?";
                                $stmt = $connect->prepare($sql);
                                $stmt->bind_param("ii", $userID, $productID);

                                if ($stmt->execute()) {
                                    echo "success";
                                } else {
                                    echo "error";
                                }
                                $stmt->close();
                            }

                            $connect->close();
                            exit;
                        }
                        ?>

                        <!-- Right Column -->
                        <h3 class="mt-3">
                            <span class="text-primary"> <?php echo $product_name ?> </span>
                            <a class="button-fav" name="addFav" type="submit" id="fav-add"> <i
                                    class="fas fa-heart"></i></a>

                            <a class="button-remove-fav" name="addDel" type="submit" id="fav-remove"> <i
                                    class="fas fa-heart"></i></a>
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
                            <button type="button" data-id="<?php echo $product_id ?>" data-price="<?php echo $price ?>"
                                data-request="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : 'guest'; ?>"
                                name="submit" class="btn btn-outline-primary me-4 px-4 py-2 addToCart">Add to
                                Cart</button>
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
                        <?php
                                $fetch_product = "Select * from product Limit 2";
                                $results = mysqli_query($connect, $fetch_product);
                                while($row=mysqli_fetch_assoc($results) ){   
                                    $product_id = $row['ProductID'];               
                                $imageOne = $row['ImageOne'];
                                $imageTwo = $row['ImageTwo'];
                                echo "<div class='col'>
                                        <a href='./product_details.php?id=$product_id'>                                        
                                         <img src='../../images/products/$imageOne' alt='Image 1' class='img-fluid mb-3' />
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
                                <a href='./product_details.php?id=$product_id'>                                        
                                 <img src='../../images/products/$imageOne' alt='Image 1' class='img-fluid mb-3' />
                                </a> </div>";
                        }
                    ?>
                    </div>
                    <p class="mt-3"><a href="#more-suggestions">More in suggestions</a></p>
                </div>
            </div>
            <div class="col-md-6">
                <h5 class="mb-4">Purchase again <img src="../../images/assets/clock 1.png" alt="Purchase" /></h5>
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
                                <a href='./product_details.php?id=$product_id'>                                        
                                 <img src='../../images/products/$imageOne' alt='Image 1' class='img-fluid mb-3' />
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
                                <a href='./product_details.php?id=$product_id'>                                        
                                 <img src='../../images/products/$imageOne' alt='Image 1' class='img-fluid mb-3' />
                                </a> </div>";
                        }
                    ?>
                    </div>
                    <p class="mt-3"><a href="./products.php">More in purchase again</a></p>
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

    <?php
        // Include footer
        include '../../includes/footer.php';
    ?>

    <!-- Optional JavaScript -->
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
        var price = parseInt($(this).data('price'));
        var user_request = $(this).data('request');
        if (isNaN(product_id)) {
            return;
        } else {
            $.ajax({
                url: "../../php/function/functions.php",
                method: "POST",
                data: {
                    action: 'insert', // Set action to 'insert'
                    product_id: product_id,
                    price: price,
                    user_request: user_request,
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

    <script>
    document.getElementById('fav-add').addEventListener('click', function() {
        document.getElementById('fav-add').style.display = 'none';
        document.getElementById('fav-remove').style.display = 'inline';
    });

    document.getElementById('fav-remove').addEventListener('click', function() {
        document.getElementById('fav-remove').style.display = 'none';
        document.getElementById('fav-add').style.display = 'inline';
    });
    </script>

    <script>
    document.getElementById('fav-add').addEventListener('click', function() {
        const userID = <?php echo json_encode($_SESSION['userId']); ?>;
        const productID = document.getElementById('productID').value;

        fetch('', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `action=add&userID=${userID}&productID=${productID}`
            })
            .then(response => {
                if (response.ok) {
                    showAlert('Added to wishlist successfully!', 'success');
                    document.getElementById('fav-add').style.display = 'none';
                    document.getElementById('fav-remove').style.display = 'inline';
                } else {
                    showAlert('Failed to add to wishlist.', 'error');
                }
            });
    });

    document.getElementById('fav-remove').addEventListener('click', function() {
        const userID = <?php echo json_encode($_SESSION['userId']); ?>;
        const productID = document.getElementById('productID').value;

        fetch('', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `action=remove&userID=${userID}&productID=${productID}`
            })
            .then(response => {
                if (response.ok) {
                    showAlert('Removed from wishlist successfully!', 'success');
                    document.getElementById('fav-remove').style.display = 'none';
                    document.getElementById('fav-add').style.display = 'inline';
                } else {
                    showAlert('Failed to remove from wishlist.', 'error');
                }
            });
    });

    function showAlert(message, type) {
        alert(message); // Basic HTML alert
    }
    </script>
</body>

</html>