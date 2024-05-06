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
            <h5 class="mb-3">
                Your Wishlist <span><i class="fa-solid fa-star text-warning"></i></span>
            </h5>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">SN.</th>
                        <th scope="col">Image</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><img class="class-table-image rounded" src="../../images/suggestions/suggestion2.png"
                                alt="product image" /></td>
                        <td>Air Jordan</td>
                        <td>Shoes</td>

                        <td>

                            <a href="../product_details.html" type="button" class="btn btn-outline-success"><i
                                    class="fas fa-eye"></i></a>
                            <a type="button" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td><img class="class-table-image rounded" src="../../images/suggestions/suggestion2.png"
                                alt="product image" /></td>
                        <td>Air Jordan</td>
                        <td>Shoes</td>

                        <td>

                            <a href="../product_details.html" type="button" class="btn btn-outline-success"><i
                                    class="fas fa-eye"></i></a>
                            <a type="button" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td><img class="class-table-image rounded" src="../../images/suggestions/suggestion2.png"
                                alt="product image" /></td>
                        <td>Air Jordan</td>
                        <td>Shoes</td>

                        <td>

                            <a href="../product_details.html" type="button" class="btn btn-outline-success"><i
                                    class="fas fa-eye"></i></a>
                            <a type="button" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
    </div>

    <?php
        // Include footer
        include '../../includes/footer.php';
    ?>
</body>

</html>