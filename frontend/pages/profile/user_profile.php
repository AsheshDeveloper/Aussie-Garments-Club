<?php 
session_start();
require_once("../../php/profile/loadprofile.php"); 
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
        <div class="container cart-item-container mt-5 mb-5">
            <div class="row">
                <div class="col-md-8">
                    <h5 class="mb-2">Your Profile</h5>
                    <div class="row">
                        <!-- First Column -->
                        <div class="col-md-4">
                            <a href="./wishlist.php" class="card profile-card text-center pt-3 pb-3">
                                <div class="card-body profile-details">
                                    <img src="../../images/profile/wishlist.png" alt="Profile Picture"
                                        class="card-img-top profile-img" />
                                    <h5 class="card-title text-muted mt-3">Wishlist</h5>
                                </div>
                            </a>
                        </div>
                        <!-- Second Column -->
                        <div class="col-md-4">
                            <a href="./track_order.php" class="card profile-card text-center pt-3 pb-3">
                                <div class="card-body profile-details">
                                    <img src="../../images/profile/delivery-truck.png" alt="Profile Picture"
                                        class="card-img-top profile-img" />
                                    <h5 class="card-title text-muted mt-3">Track Orders</h5>
                                </div>
                            </a>
                        </div>
                        <!-- Third Column -->
                        <div class="col-md-4">
                            <a href="./purchase_history.php" class="card profile-card text-center pt-3 pb-3">
                                <div class="card-body profile-details">
                                    <img src="../../images/profile/history.png" alt="Profile Picture"
                                        class="card-img-top profile-img" />
                                    <h5 class="card-title text-muted mt-3">Purchase History</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Fourth Column -->
                        <div class="col-md-4">
                            <a href="./invoice.php" class="card profile-card text-center pt-3 pb-3">
                                <div class="card-body profile-details">
                                    <img src="../../images/profile/invoice.png" alt="Profile Picture"
                                        class="card-img-top profile-img" />
                                    <h5 class="card-title text-muted mt-3">Invoice</h5>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4">
                            <a href="./address.php" class="card profile-card text-center pt-3 pb-3">
                                <div class="card-body profile-details">
                                    <img src="../../images/profile/location-pin.png" alt="Profile Picture"
                                        class="card-img-top profile-img" />
                                    <h5 class="card-title text-muted mt-3">Address</h5>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4">
                            <a href="./messages.php" class="card profile-card text-center pt-3 pb-3">
                                <div class="card-body profile-details">
                                    <img src="../../images/profile/mail.png" alt="Profile Picture"
                                        class="card-img-top profile-img" />
                                    <h5 class="card-title text-muted mt-3">Your Messages</h5>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Fourth Column -->
                        <div class="col-md-4">
                            <a href="./card.php" class="card profile-card text-center pt-3 pb-3">
                                <div class="card-body profile-details">
                                    <img src="../../images/profile/atm-card.png"" alt=" Profile Picture"
                                        class="card-img-top profile-img" />
                                    <h5 class="card-title text-muted mt-3">Your Card</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Profile Section -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body user-profile-info">


                            <div class="text-center">
                                <?php if (!empty($row['user_image'])): ?>
                                <img class="profile-image" src="../../images/uploads/<?php echo $row['user_image']; ?>"
                                    alt="Profile Image" />
                                <?php else: ?>
                                <!-- If image is null-->
                                <img class="profile-image" src="../../images/profile/user.png" alt="Logo" />
                                <?php endif; ?>

                                <h5 class="text-primary font-weight-bold mt-3">
                                    <?php echo $row['first_name'] . " " . $row['middle_name'] . " " . $row['last_name']; ?>
                                </h5>
                            </div>

                            <div class="d-grid col mt-3 mb-3">
                                <div class="mb-3">
                                    <span class="label text-primary">Address</span>
                                    <?php if (!empty($row['aptUnitSuit']) || !empty($row['street']) || !empty($row['citySuburb']) || !empty($row['stateTerritory']) || !empty($row['Postcode'])): ?>
                                    <p class="text-muted">
                                        <?php echo (!empty($row['aptUnitSuit']) ? $row['aptUnitSuit'] . " " : "") . (!empty($row['street']) ? $row['street'] . ", " : "") . (!empty($row['citySuburb']) ? $row['citySuburb'] . " " : "") . (!empty($row['stateTerritory']) ? $row['stateTerritory'] . " " : "") . (!empty($row['Postcode']) ? $row['Postcode'] : ""); ?>
                                    </p>
                                    <?php else: ?>
                                    <p class="text-muted">Address not specify</p>
                                    <?php endif; ?>
                                </div>
                                <div class="mb-3">
                                    <span class="label text-primary">Email</span>
                                    <p class="text-muted"><?php echo $row['email']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <span class="label text-primary">Birth Day</span>
                                    <p class="text-muted">
                                        <?php echo !empty($row['birthday']) ? $row['birthday'] : "edit to specify"; ?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <span class="label text-primary">Phone</span>
                                    <p class="text-muted"><?php echo $row['contact']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <span class="label text-primary">Gender</span>
                                    <p class="text-muted">
                                        <?php echo !empty($row['gender']) ? $row['gender'] : "edit to specify"; ?>
                                    </p>
                                </div>


                                <a href="./edit_profile.php" class="btn btn-primary px-5 py-2">Edit Your Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- suggestion for you -->
        <div class="container mt-5 mb-5 suggestion-container">
            <div class="row">
                <h5 class="mb-4">Your Items</h5>

                <div class="col-md-6">
                    <h6 class="mb-4">Saved for later <img src="../../images/assets/refresh 1.png" alt="Suggestion" />
                    </h6>

                    <div class="row-suggestion-items">
                        <div class="row">
                            <div class="col">
                                <a href="">
                                    <img src="../../images/suggestions/suggestion1.png" alt="Image 1"
                                        class="img-fluid" />
                                </a>
                            </div>
                            <div class="col">
                                <a href="">
                                    <img src="../../images/suggestions/suggestion2.png" alt="Image 2"
                                        class="img-fluid" />
                                </a>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <a href="">
                                    <img src="../../images/suggestions/suggestion3.png" alt="Image 3"
                                        class="img-fluid" />
                                </a>
                            </div>
                            <div class="col">
                                <a href="">
                                    <img src="../../images/suggestions/suggedtion3.1.png" alt="Image 4"
                                        class="img-fluid" />
                                </a>
                            </div>
                        </div>
                        <p class="mt-3"><a href="#more-suggestions">More saved Items</a></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <h6 class="mb-4">Purchase again <img src="../../images/assets/clock 1.png" alt="Purchase" /></h6>
                    <div class="row-suggestion-items">
                        <div class="row">
                            <div class="col">
                                <a href="">
                                    <img src="../../images/suggestions/suggestion5.png" alt="Image 1"
                                        class="img-fluid" />
                                </a>
                            </div>
                            <div class="col">
                                <a href="">
                                    <img src="../../images/suggestions/suggestion1.png" alt="Image 2"
                                        class="img-fluid" />
                                </a>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <a href="">
                                    <img src="../../images/suggestions/suggestion3.png" alt="Image 3"
                                        class="img-fluid" />
                                </a>
                            </div>
                            <div class="col">
                                <a href="">
                                    <img src="../../images/suggestions/suggestion2.png" alt="Image 4"
                                        class="img-fluid" />
                                </a>
                            </div>
                        </div>
                        <p class="mt-3"><a href="#more-purchases">More in purchase again</a></p>
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

    <script>
    const passwordInput = document.getElementById("password");
    const showPasswordButton = document.getElementById("showPassword");

    showPasswordButton.addEventListener("click", () => {
        const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
        passwordInput.setAttribute("type", type);
        showPasswordButton.querySelector("i").classList.toggle("fa-eye-slash");
    });
    </script>
</body>

</html>