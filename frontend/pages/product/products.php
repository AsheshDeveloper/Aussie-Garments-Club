<?php 
session_start();
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
                                    <li><a class="dropdown-item" href="#">Price Low to High</a></li>
                                    <li><a class="dropdown-item" href="#">Price High to Low</a></li>
                                    <li><a class="dropdown-item" href="#">Highest Rating</a></li>
                                    <li><a class="dropdown-item" href="#">Lowest Rating</a></li>
                                    <li><a class="dropdown-item" href="#">Men</a></li>
                                    x
                                    <li><a class="dropdown-item" href="#">Women</a></li>
                                    <li><a class="dropdown-item" href="#">Kids</a></li>
                                    <li><a class="dropdown-item" href="#">Baby</a></li>
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

        <div class="container mt-4 mb-4 section-for-men">
            <div class="row section-for-men-row mb-4">
                <p>Showing results for <strong>all</strong> items</p>
                <div class="col" style="position: relative">
                    <a href="./product_details.html">
                        <img src="../../images/products/purepng 2.png" alt="Image 1" class="img-fluid mb-3" />
                        <div class="badge text-bg-success badge-floating-stock">50/100</div>
                    </a>
                    <h5>Suit Set</h5>
                    <p class="text-muted">Raymond Collection</p>
                    <p class="text-muted"><span>$</span>250</p>
                    <p>
                        <a href="./product_details.php" class="btn btn-outline-primary"><i
                                class="fas fa-arrow-right"></i></a>
                    </p>
                </div>
                <div class="col" style="position: relative">
                    <a href="../../pages/product_details.html">
                        <img src="../../images/products/irene-kredenets-dwKiHoqqxk8-unsplash 1.png" alt="Image 2"
                            class="img-fluid mb-3" />
                        <div class="badge text-bg-danger badge-floating-stock">0/100</div>
                    </a>
                    <h5>Suit Set</h5>
                    <p class="text-muted">Raymond Collection</p>
                    <p class="text-muted"><span>$</span>250</p>
                    <p>
                        <button class="btn btn-outline-primary"><i class="fas fa-arrow-right"></i></button>
                    </p>
                </div>
                <div class="col">
                    <img src="../../images/products/nimble-made-hMMXhKSZk7k-unsplash.png" alt="Image 3"
                        class="img-fluid mb-3" />
                    <h5>Suit Set</h5>
                    <p class="text-muted">Raymond Collection</p>
                    <p class="text-muted"><span>$</span>250</p>
                    <p>
                        <button class="btn btn-outline-primary"><i class="fas fa-arrow-right"></i></button>
                    </p>
                </div>
                <div class="col">
                    <img src="../../images/products/tobias-tullius-Fg15LdqpWrs-unsplash 1.png" alt="Image 4"
                        class="img-fluid mb-3" />
                    <h5>Suit Set</h5>
                    <p class="text-muted">Raymond Collection</p>
                    <p class="text-muted"><span>$</span>250</p>
                    <p>
                        <button class="btn btn-outline-primary"><i class="fas fa-arrow-right"></i></button>
                    </p>
                </div>
            </div>

            <div class="row section-for-men-row">
                <div class="col">
                    <img src="../../images/products/purepng 2.png" alt="Image 1" class="img-fluid mb-3" />
                    <h5>Suit Set</h5>
                    <p class="text-muted">Raymond Collection</p>
                    <p class="text-muted"><span>$</span>250</p>
                    <p>
                        <button class="btn btn-outline-primary"><i class="fas fa-arrow-right"></i></button>
                    </p>
                </div>
                <div class="col">
                    <img src="../../images/products/irene-kredenets-dwKiHoqqxk8-unsplash 1.png" alt="Image 2"
                        class="img-fluid mb-3" />
                    <h5>Suit Set</h5>
                    <p class="text-muted">Raymond Collection</p>
                    <p class="text-muted"><span>$</span>250</p>
                    <p>
                        <button class="btn btn-outline-primary"><i class="fas fa-arrow-right"></i></button>
                    </p>
                </div>
                <div class="col">
                    <img src="../../images/products/nimble-made-hMMXhKSZk7k-unsplash.png" alt="Image 3"
                        class="img-fluid mb-3" />
                    <h5>Suit Set</h5>
                    <p class="text-muted">Raymond Collection</p>
                    <p class="text-muted"><span>$</span>250</p>
                    <p>
                        <button class="btn btn-outline-primary"><i class="fas fa-arrow-right"></i></button>
                    </p>
                </div>
                <div class="col">
                    <img src="../../images/products/tobias-tullius-Fg15LdqpWrs-unsplash 1.png" alt="Image 4"
                        class="img-fluid mb-3" />
                    <h5>Suit Set</h5>
                    <p class="text-muted">Raymond Collection</p>
                    <p class="text-muted"><span>$</span>250</p>
                    <p>
                        <button class="btn btn-outline-primary"><i class="fas fa-arrow-right"></i></button>
                    </p>
                </div>
            </div>

            <div class="row section-for-men-row mb-4">
                <div class="col">
                    <img src="../../images/products/purepng 2.png" alt="Image 1" class="img-fluid mb-3" />
                    <h5>Suit Set</h5>
                    <p class="text-muted">Raymond Collection</p>
                    <p class="text-muted"><span>$</span>250</p>
                    <p>
                        <a href="../../Pages/product_details.html" class="btn btn-outline-primary"><i
                                class="fas fa-arrow-right"></i></a>
                    </p>
                </div>
                <div class="col">
                    <img src="../../images/products/irene-kredenets-dwKiHoqqxk8-unsplash 1.png" alt="Image 2"
                        class="img-fluid mb-3" />
                    <h5>Suit Set</h5>
                    <p class="text-muted">Raymond Collection</p>
                    <p class="text-muted"><span>$</span>250</p>
                    <p>
                        <button class="btn btn-outline-primary"><i class="fas fa-arrow-right"></i></button>
                    </p>
                </div>
                <div class="col">
                    <img src="../../images/products/nimble-made-hMMXhKSZk7k-unsplash.png" alt="Image 3"
                        class="img-fluid mb-3" />
                    <h5>Suit Set</h5>
                    <p class="text-muted">Raymond Collection</p>
                    <p class="text-muted"><span>$</span>250</p>
                    <p>
                        <button class="btn btn-outline-primary"><i class="fas fa-arrow-right"></i></button>
                    </p>
                </div>
                <div class="col">
                    <img src="../../images/products/tobias-tullius-Fg15LdqpWrs-unsplash 1.png" alt="Image 4"
                        class="img-fluid mb-3" />
                    <h5>Suit Set</h5>
                    <p class="text-muted">Raymond Collection</p>
                    <p class="text-muted"><span>$</span>250</p>
                    <p>
                        <button class="btn btn-outline-primary"><i class="fas fa-arrow-right"></i></button>
                    </p>
                </div>
            </div>

            <div class="row section-for-men-row">
                <div class="col">
                    <img src="../../images/products/purepng 2.png" alt="Image 1" class="img-fluid mb-3" />
                    <h5>Suit Set</h5>
                    <p class="text-muted">Raymond Collection</p>
                    <p class="text-muted"><span>$</span>250</p>
                    <p>
                        <button class="btn btn-outline-primary"><i class="fas fa-arrow-right"></i></button>
                    </p>
                </div>
                <div class="col">
                    <img src="../../images/products/irene-kredenets-dwKiHoqqxk8-unsplash 1.png" alt="Image 2"
                        class="img-fluid mb-3" />
                    <h5>Suit Set</h5>
                    <p class="text-muted">Raymond Collection</p>
                    <p class="text-muted"><span>$</span>250</p>
                    <p>
                        <button class="btn btn-outline-primary"><i class="fas fa-arrow-right"></i></button>
                    </p>
                </div>
                <div class="col">
                    <img src="../../images/products/nimble-made-hMMXhKSZk7k-unsplash.png" alt="Image 3"
                        class="img-fluid mb-3" />
                    <h5>Suit Set</h5>
                    <p class="text-muted">Raymond Collection</p>
                    <p class="text-muted"><span>$</span>250</p>
                    <p>
                        <button class="btn btn-outline-primary"><i class="fas fa-arrow-right"></i></button>
                    </p>
                </div>
                <div class="col">
                    <img src="../../images/products/tobias-tullius-Fg15LdqpWrs-unsplash 1.png" alt="Image 4"
                        class="img-fluid mb-3" />
                    <h5>Suit Set</h5>
                    <p class="text-muted">Raymond Collection</p>
                    <p class="text-muted"><span>$</span>250</p>
                    <p>
                        <button class="btn btn-outline-primary"><i class="fas fa-arrow-right"></i></button>
                    </p>
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

    <!-- Filter Modal -->
    <div class="modal fade product-filter-modal" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-end">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="filterModalLabel">Filter Options</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
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
                                            <select class="form-select">
                                                <option selected>Select</option>
                                                <option value="1">Men</option>
                                                <option value="2">Women</option>
                                                <option value="3">Kids</option>
                                                <option value="4">Baby</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Filter by price -->
                                    <div class="mb-3">
                                        <label class="form-label">Filter by price:</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" placeholder="Min" />

                                            <input type="number" class="form-control" placeholder="Max" />
                                        </div>
                                    </div>

                                    <!-- Categories -->
                                    <div class="mb-3">
                                        <label class="form-label">Categories:</label>
                                        <select class="form-select">
                                            <option selected>Select Category</option>
                                            <option value="1">Category 1</option>
                                            <option value="2">Category 2</option>
                                        </select>
                                    </div>

                                    <!-- By Brands -->
                                    <div class="mb-3">
                                        <label class="form-label">By Brands:</label>
                                        <select class="form-select">
                                            <option selected>Select Brand</option>
                                            <option value="1">Brand 1</option>
                                            <option value="2">Brand 2</option>
                                        </select>
                                    </div>

                                    <!-- By Size -->
                                    <div class="mb-3">
                                        <label class="form-label">By Size:</label>
                                        <select class="form-select">
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
                    <button type="button" class="btn btn-primary">Apply Filter</button>
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