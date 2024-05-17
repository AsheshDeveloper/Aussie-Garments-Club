<?php
session_start();
require_once("../../php/database_connect.php");

// Default sorting option
$sort_option = "Name"; // Default sorting by name

// Check if a sorting option is selected from the dropdown
if (isset($_GET['sort'])) {
    $sort_option = $_GET['sort'];
}

// Initialize the base SQL query
$fetch_product = "SELECT p.*, b.BrandName, c.CategoryName, ps.SizeName
                  FROM product p
                  LEFT JOIN brand b ON p.BrandID = b.BrandID
                  LEFT JOIN category c ON p.CategoryID = c.CategoryID
                  LEFT JOIN size ps ON p.SizeID = ps.SizeID";
// Handle filters
$filter_conditions = array();

if (isset($_POST['apply_filter'])) {
    // Handle Product For filter
    if (isset($_POST['product_for']) && $_POST['product_for'] != '0') {
        $product_for = $_POST['product_for'];
        $filter_conditions[] = "MainCategory = '$product_for'";
    }

    // Handle Price filter
    if (isset($_POST['min_price']) && isset($_POST['max_price']) && $_POST['min_price'] !== "" && $_POST['max_price'] !== "") {
        $min_price = $_POST['min_price'];
        $max_price = $_POST['max_price'];
        $filter_conditions[] = "Price BETWEEN $min_price AND $max_price";
    }
    // Handle Category filter
    if (isset($_POST['category']) && $_POST['category'] != 'Select Category') {
        $category = $_POST['category'];
        $filter_conditions[] = "c.CategoryName = '$category'";
    }

    // Handle Brand filter
    if (isset($_POST['brand']) && $_POST['brand'] != 'Select Brand') {
        $brand = $_POST['brand'];
        $filter_conditions[] = "b.BrandName = '$brand'";
    }

    // Handle Size filter
    if (isset($_POST['size']) && $_POST['size'] != 'Select Size') {
        $size = $_POST['size'];
        $filter_conditions[] = "ps.SizeName = '$size'";
    }

    // Construct the WHERE clause for SQL query
    if (!empty($filter_conditions)) {
        $fetch_product .= " WHERE " . implode(' AND ', $filter_conditions);
    }
}

// Add sorting option to the SQL query
$fetch_product .= " ORDER BY $sort_option";

// Execute the updated query
$results = mysqli_query($connect, $fetch_product);


// Initialize variable to track if products are found
$products_found = false;

// Check if any results were returned
if ($results && mysqli_num_rows($results) > 0) {
    $products_found = true;
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
    <div class="container product-filter-container mt-4 bg-light py-3">
        <div class="row">
            <div class="col text-end">
                <div class="d-flex align-items-center justify-content-between">
                    <h5>Our Products</h5>

                    <div class="d-flex align-items-center">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle me-2 py-2" type="button"
                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                Sort By
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="?sort=Price ASC">Price Low to High</a></li>
                                <li><a class="dropdown-item" href="?sort=Price DESC">Price High to Low</a></li>
                                <li><a class="dropdown-item" href="?sort=Rating DESC">Highest Rating</a></li>
                                <li><a class="dropdown-item" href="?sort=Rating ASC">Lowest Rating</a></li>
                                <li><a class="dropdown-item" href="?sort=MainCategory&MainCategory='Men'">Men</a></li>
                                <li><a class="dropdown-item" href="?sort=MainCategory&MainCategory='Women'">Women</a></li>
                                <li><a class="dropdown-item" href="?sort=MainCategory&MainCategory='Kids'">Kids</a></li>
                                <li><a class="dropdown-item" href="?sort=MainCategory&MainCategory='Baby'">Baby</a></li>
                            </ul>
                        </div>

                        <button class="btn btn-outline-primary py-2" data-bs-toggle="modal"
                                data-bs-target="#filterModal">
                            <i class="fas fa-filter"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if ($products_found) { ?>
        <div class="container mt-4 mb-4 section-for-men">

            <div class="row section-for-men-row mb-4">

                <div class="col" style="position: relative">

                    <div class="container mb-5 section-for-men">
                        <h5 class="for-men-heading mb-4">Showing results for all items</h5>
                        <div class="row section-for-men-row">
                            <?php
                            $sort_option = "Name"; // Default sorting by name
                            $fetch_product = "SELECT * FROM product";
                            $count = 0;
                            while($row=mysqli_fetch_assoc($results)) {
                                $product_id = $row['ProductID'];
                                $product_name = $row['Name'];
                                $price = $row['Price'];
                                $imageOne = $row['ImageOne'];
                                $imageTwo = $row['ImageTwo'];

                                if ($count % 4 == 0) {
                                    echo '<div class="row">';
                                }

                                echo "<div class='col-md-3' style='position: relative'>
                      <a href='./pages/product/product_details.php?id=$product_id'>
                      <img src='../../images/products/$imageOne' alt='Image 1' class='img-fluid mb-3' />
                          <div class='badge text-bg-success badge-floating-stock'>50/100</div>
                      </a>
                      <h5>Suit Set</h5>
                      <p class='text-muted'>$product_name</p>
                      <p class='text-muted'><span>$</span>$price</p>
                      <p>
                          <a href='./pages/product/product_details.php?id=$product_id' class='btn btn-outline-primary'><i class='fas fa-arrow-right'></i></a>
                      </p>
                  </div>";

                                $count++;

                                if ($count % 4 == 0) {
                                    echo '</div>';
                                }
                            }

                            // Close the row if the total number of products is not a multiple of 4
                            if ($count % 4 != 0) {
                                echo '</div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <!-- pagination -->
                <div class="container mt-5">
                    <div class="row">
                        <div class="col">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="text-primary">Page 1</div>
                                <div class="flex-fill"></div>
                                <!-- Space in between -->
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>

                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="container mt-4 mb-4 section-for-men">
            <h5 class="for-men-heading mb-4">No products found.</h5>
        </div>
    <?php } ?>

    <!-- Filter Modal -->
    <div class="modal fade product-filter-modal" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-end">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="filterModalLabel">Filter Options</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="">
                    <div class="modal-body">
                        <div class="container">
                            <!-- Filter Options -->
                            <div class="row">
                                <div class="col">
                                    <div class="mt-3">
                                        <!-- Product for -->
                                        <div class="mb-3">
                                            <div class="mb-3">
                                                <label class="form-label">Product For:</label>
                                                <select class="form-select" name="product_for">
                                                    <option selected value="0">Select</option>
                                                    <option value="Men">Men</option>
                                                    <option value="Women">Women</option>
                                                    <option value="Kids">Kids</option>
                                                    <option value="Baby">Baby</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Filter by price -->
                                        <div class="mb-3">
                                            <label class="form-label">Filter by price:</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Min" name="min_price" />

                                                <input type="number" class="form-control" placeholder="Max" name="max_price" />
                                            </div>
                                        </div>

                                        <!-- Categories -->
                                        <div class="mb-3">
                                            <label class="form-label">Categories:</label>
                                            <select class="form-select" name ="category">
                                                <option selected>Select Category</option>
                                                <option value="1">Category 1</option>
                                                <option value="2">Category 2</option>
                                            </select>
                                        </div>

                                        <!-- By Brands -->
                                        <div class="mb-3">
                                            <label class="form-label">By Brands:</label>
                                            <select class="form-select" name = "brand">
                                                <option selected>Select Brand</option>
                                                <option value="1">Brand 1</option>
                                                <option value="2">Brand 2</option>
                                            </select>
                                        </div>

                                        <!-- By Size -->
                                        <div class="mb-3">
                                            <label class="form-label">By Size:</label>
                                            <select class="form-select" name = "size">
                                                <option selected>Select Size</option>
                                                <option value="1">X</option>
                                                <option value="2">XL</option>
                                                <option value="2">XXL</option>
                                                <option value="2">XXL</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name = "apply_filter">Apply Filter</button>
                    </div>
                </form>
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
