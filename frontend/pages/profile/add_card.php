<?php
session_start();
include_once("../../php/profile/card/addCard.php");
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
        <div class="container mt-5 mb-5">
            <h5 class="mb-3">
                Add New Card
                <span>
                    <i class="fa-solid fa-credit-card text-primary"></i>
                </span>
            </h5>

            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card p-2 mt-4 mb-5">
                        <div class="card-body">
                            <form class="" action="" method="post">
                                <!-- error message -->
                                <?php 
                                        if(isset($errors)) 
                                        { 
                                        foreach($errors as $error){ 
                                    ?>
                                <div class="alert alert-danger" role="alert">
                                    <?=$error ?>
                                </div>
                                <?php } 
                                    
                                    } 
                                    ?>

                                <!-- success message -->
                                <?php 
                                        if(isset($success)) 
                                        { 
                                        foreach($success as $success){ 
                                    ?>
                                <div class="alert alert-success" role="alert">
                                    <?=$success ?>
                                </div>
                                <?php } 
                                    
                                    } 
                                    ?>

                                <div class="mb-3">
                                    <label class="form-check-label mb-1" for="cardNumber"> Card Number</label>
                                    <input type="number" class="form-control" name="cardNumber" id="cardNumber"
                                        placeholder="eg: 4567 XXXX XXXX XXXX" required />
                                </div>
                                <div class="mb-3">
                                    <label class="form-check-label mb-1" for="nameOnCard"> Name on card</label>
                                    <input type="text" class="form-control" name="nameOnCard" id="nameOnCard"
                                        placeholder="eg: samir samir" required />
                                </div>
                                <div class="mb-3">
                                    <label class="form-check-label mb-1" for="expirationDate"> Expiration date</label>
                                    <input type="date" class="form-control" name="expirationDate" id="expirationDate"
                                        placeholder="eg: 4567 XXXX XXXX XXXX" required />
                                </div>

                                <div class="mb-3">
                                    <label class="form-check-label mb-1" for="securityCode">Security
                                        code(CVV/CVC)</label>
                                    <input type="number" class="form-control" name="securityCode" id="securityCode"
                                        placeholder="eg: see back of your debit card" required />
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="default" name="default" />
                                    <label class="form-check-label" for="default">Use as my default
                                        payment</label>
                                </div>

                                <button type="submit" name="submit" type="button"
                                    class="btn btn-primary w-100 p-2 mb-3 mt-4">Add
                                    Card</button>
                            </form>
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
</body>

</html>