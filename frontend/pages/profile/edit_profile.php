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
                <div class="col-md-7">
                    <h5 class="mb-3">Edit Your Profile</h5>

                    <form class="mb-5" action="" method="post">
                        <div class="mb-3">
                            <div class="d-flex">
                                <label class="form-check-label mb-1" for="address">Address</label>
                            </div>
                            <div class="input-group">
                                <input type="text" class="form-control" name="address" id="address"
                                    placeholder="Unit 58 28 Durmoyne street, Lidcombe NSW 2234" disabled />
                            </div>
                            <span class="text-info">you can update your address in address section(go back)</span>
                        </div>

                        <div class="mb-3">
                            <div class="d-flex">
                                <label class="form-check-label mb-1" for="email">Email</label>
                            </div>
                            <div class="input-group">
                                <input type="text" class="form-control" name="email" id="email"
                                    placeholder="enter your email" />
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="d-flex">
                                <label class="form-check-label mb-1" for="dob">Date of Birth</label>
                            </div>
                            <div class="input-group">
                                <input type="date" class="form-control" name="dob" id="dob" placeholder="" />
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="d-flex">
                                <label class="form-check-label mb-1" for="phone">Phone</label>
                            </div>
                            <div class="input-group">
                                <input type="number" class="form-control" name="phone" id="phone"
                                    placeholder="enter your phone number" />
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="d-flex">
                                <label class="form-check-label mb-1" for="dob">Gender</label>
                            </div>
                            <div class="input-group">
                                <input type="date" class="form-control" name="dob" id="dob" placeholder="Female"
                                    disabled />
                            </div>
                        </div>

                        <button type="submit" type="name" class="btn btn-primary p-2">Update Your Profile</button>
                    </form>
                </div>

                <!-- Total Section -->
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mt-3">Update Your Password</h6>

                            <form class="mt-5 mb-5" action="" method="post">
                                <div class="mb-3">
                                    <div class="d-flex">
                                        <label class="form-check-label mb-1" for="oldPassword">Old Password <span
                                                class="text-danger">*</span></label>
                                    </div>
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="oldPassword" id="oldPassword"
                                            placeholder="**********" required />
                                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex">
                                        <label class="form-check-label mb-1" for="newPassword">New Password <span
                                                class="text-danger">*</span></label>
                                    </div>
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="newPassword" id="newPassword"
                                            placeholder="new password" required />
                                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="d-flex">
                                        <label class="form-check-label mb-1" for="confirmPassword">Confirm Password
                                            <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="confirmPassword"
                                            id="confirmPassword" placeholder="confirm new pasword" required />
                                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                    </div>
                                </div>

                                <button type="submit" type="name" class="btn btn-primary w-100 p-2">Update Your
                                    Pasword</button>
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
    <!-- custom script -->

</body>

</html>