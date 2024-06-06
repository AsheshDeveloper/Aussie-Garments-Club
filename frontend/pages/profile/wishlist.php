<?php
session_start();
include_once("../../php/profile/wishlist/getWishlist.php");
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
            <h5 class="mb-3">
                Saved Items <span><i class="fa-solid fa-star text-warning"></i></span>
            </h5>
            <?php
            if (isset($_GET['success']) && $_GET['success'] == '1') {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                echo 'Item successfully deleted.';
                echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                echo '</div>';
            } elseif (isset($_GET['error']) && $_GET['error'] == '1') {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                echo 'Error: Failed to delete item.';
                echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                echo '</div>';
            }
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">SN.</th>
                        <th scope="col">Image</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Retrieve wishlist items from session
                    $wishlistItems = $_SESSION['wishlistItems'] ?? [];

                    if (!empty($wishlistItems)) {
                        $sn = 1;
                        foreach ($wishlistItems as $item) {
                            $itemID = $item['id'];
                            $product_id = $item['productID'];
                            echo "<tr>";
                            echo "<td>" . $sn++ . "</td>";
                            echo "<td><img class='class-table-image rounded' src='../../images/products/" .$item['ImageOne']."' alt='Image 1' class='img-fluid' /></td>";
                            echo "<td>" . htmlspecialchars($item['Name']) . "</td>";
                            echo "<td>
                                    <a href='../../pages/product/product_details.php?id=$product_id' type='button' class='btn btn-outline-success'><i class='fas fa-eye'></i></a>
                                    <a href='../../php/profile/wishlist/deleteWishlist.php?card_id=$itemID' type='button' class='btn btn-outline-danger delete-button'><i class='fas fa-trash-alt'></i></a>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No items found in your wishlist.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
        // Include footer
        include '../../includes/footer.php';
    ?>

    <script>
    document.querySelectorAll('.delete-button').forEach(button => {
        button.addEventListener('click', function(event) {
            if (!confirm('Are you sure you want to delete this item?')) {
                event.preventDefault(); // Prevent the default behavior (i.e., following the link)
            }
        });
    });
    </script>
</body>

</html>