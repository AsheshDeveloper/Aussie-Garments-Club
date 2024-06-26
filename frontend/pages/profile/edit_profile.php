<?php
session_start();
require_once("../../php/profile/editprofile.php");  
// require_once("../../php/profile/loadprofile.php");
// require_once("../../php/profile/editpassword.php");
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

        <div class="container mt-5 mb-3">
            <h5 class="mb-3">Edit Your Profile</h5>
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
        </div>

        <div class="container cart-item-container mb-5">
            <div class="row">
                <div class="col-md-7">

                    <!-- <form class="mb-5" action="" method="post" enctype="multipart/form-data">
                        <?php if (!empty($row['user_image'])): ?>
                        <div class="mb-3">
                            <div class="d-flex">
                                <label class="form-check-label mb-1">Current Profile Image</label>
                            </div>
                            <img class="class-table-image" src="../../images/uploads/<?php echo $row['user_image']; ?>"
                                alt="Profile Image" style="max-width: 150px; max-height: 150px;">
                        </div>
                        <?php endif; ?>

                        <div class="mb-3">
                            <div class="d-flex">
                                <label class="form-check-label mb-1" for="user_image">Profile Image</label>
                            </div>

                            <div class="input-group">
                                <input type="file" class="form-control" name="user_image" id="user_image">
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="d-flex">
                                <label class="form-check-label mb-1" for="address">Address</label>
                            </div>
                            <div class="input-group">
                                <?php
                                    if (isset($row['aptUnitSuit'], $row['street'], $row['citySuburb'], $row['stateTerritory'], $row['Postcode'])) {
                                        echo '<input type="text" class="form-control" name="address" id="address" value="' . $row['aptUnitSuit'] . ' ' . $row['street'] . ' ' . $row['citySuburb'] . ' ' . $row['stateTerritory'] . ' ' . $row['Postcode'] . '" disabled />';
                                    } else {
                                        echo '<input type="text" class="form-control" name="address" id="address" value="Address Not Available" disabled />';
                                    }
                                ?>
                            </div>
                            <span class="text-info">you can update your address in address section(go back)</span>
                        </div>

                        <div class="mb-3">
                            <div class="d-flex">
                                <label class="form-check-label mb-1" for="email">Email</label>
                            </div>
                            <div class="input-group">
                                <input type="text" class="form-control" name="email" id="email"
                                    placeholder="enter your email" value="<?php echo $row['email']; ?>" />
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="d-flex">
                                <label class="form-check-label mb-1" for="dob">Date of Birth</label>
                            </div>
                            <div class="input-group">
                                <input type="date" class="form-control" name="birthday" id="dob"
                                    value="<?php echo !empty($row['birthday']) ? $row['birthday'] : ''; ?>" />
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="d-flex">
                                <label class="form-check-label mb-1" for="phone">Phone</label>
                            </div>
                            <div class="input-group">
                                <input type="number" class="form-control" name="phone" id="phone"
                                    placeholder="enter your phone number" value="<?php echo $row['contact']; ?>" />
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-check-label mb-1" for="gender">Gender</label>

                            <select name="gender" class="form-select" id="gender" aria-label="gender">
                                <option selected>
                                    <?php echo !empty($row['gender']) ? $row['gender'] : "Choose Gender"; ?>
                                </option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary p-2">Update Your Profile</button>
                    </form> -->

                    <form class="mb-5" action="" method="post" enctype="multipart/form-data">
                        <?php if (!empty($row['user_image'])): ?>
                        <div class="mb-3">
                            <div class="d-flex">
                                <label class="form-check-label mb-1">Current Profile Image</label>
                            </div>
                            <img class="class-table-image" src="../../images/uploads/<?php echo $row['user_image']; ?>"
                                alt="Profile Image" style="max-width: 150px; max-height: 150px;">
                        </div>
                        <?php endif; ?>
                        <div class="mb-3">
                            <label class="form-check-label mb-1" for="user_image">Profile Image</label>
                            <div class="input-group">
                                <input type="file" class="form-control" name="user_image" id="user_image">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-check-label mb-1" for="email">Email Address</label>
                            <input type="email" class="form-control" name="email" id="email"
                                value="<?php echo isset($row['email']) ? htmlspecialchars($row['email']) : ''; ?>"
                                required>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex">
                                <label class="form-check-label mb-1" for="address">Address</label>
                            </div>
                            <div class="input-group">
                                <?php
                                    if (isset($row['aptUnitSuit'], $row['street'], $row['citySuburb'], $row['stateTerritory'], $row['Postcode'])) {
                                        echo '<input type="text" class="form-control" name="address" id="address" value="' . $row['aptUnitSuit'] . ' ' . $row['street'] . ' ' . $row['citySuburb'] . ' ' . $row['stateTerritory'] . ' ' . $row['Postcode'] . '" disabled />';
                                    } else {
                                        echo '<input type="text" class="form-control" name="address" id="address" value="Address Not Available" disabled />';
                                    }
                                ?>
                            </div>
                            <a href="./address.php" class="text-info">you can update your address in address
                                section(click here)</a>
                        </div>
                        <div class="mb-3">
                            <label class="form-check-label mb-1" for="birthday">Date of Birth</label>
                            <input type="date" class="form-control" name="birthday" id="birthday"
                                value="<?php echo isset($row['birthday']) ? htmlspecialchars($row['birthday']) : ''; ?>"
                                required>
                        </div>
                        <div class="mb-3">
                            <label class="form-check-label mb-1" for="phone">Phone Number</label>
                            <input type="text" class="form-control" name="phone" id="phone"
                                value="<?php echo isset($row['contact']) ? htmlspecialchars($row['contact']) : ''; ?>"
                                required>
                        </div>
                        <!-- Add other user information fields similarly -->
                        <div class="mb-3">
                            <label class="form-check-label mb-1" for="gender">Gender</label>
                            <select class="form-control" name="gender" id="gender">
                                <option value="Male"
                                    <?php echo (isset($row['gender']) && $row['gender'] === 'Male') ? 'selected' : ''; ?>>
                                    Male</option>
                                <option value="Female"
                                    <?php echo (isset($row['gender']) && $row['gender'] === 'Female') ? 'selected' : ''; ?>>
                                    Female</option>
                            </select>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Update Profile</button>
                    </form>
                </div>

                <!-- password update  Section -->
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
                                        <input type="password" class="form-control" name="oldPassword" id="password1"
                                            placeholder="enter your old password" required />
                                        <button class="btn btn-outline-secondary" type="button" id="showPassword">
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
                                        <input type="password" class="form-control" name="newPassword" id="password2"
                                            placeholder="new password" required />
                                        <button class="btn btn-outline-secondary" type="button" id="showPassword1">
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
                                            id="password3" placeholder="confirm new pasword" required />
                                        <button class="btn btn-outline-secondary" type="button" id="showPassword2">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                    </div>
                                </div>

                                <button type="submit" name="submitPwd" class="btn btn-primary w-100 p-2">Update Your
                                    Password</button>
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
    <!-- password button visible -->
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const showPasswordButton = document.getElementById("showPassword");
        const showPasswordButton1 = document.getElementById("showPassword1");
        const showPasswordButton2 = document.getElementById("showPassword2");

        showPasswordButton.addEventListener("click", function() {
            togglePasswordVisibility("password1", this);
        });

        showPasswordButton1.addEventListener("click", function() {
            togglePasswordVisibility("password2", this);
        });

        showPasswordButton2.addEventListener("click", function() {
            togglePasswordVisibility("password3", this);
        });

        function togglePasswordVisibility(inputId, button) {
            const input = document.getElementById(inputId);

            if (input.type === "password") {
                input.type = "text";
                button.innerHTML = '<i class="far fa-eye-slash"></i>';
            } else {
                input.type = "password";
                button.innerHTML = '<i class="far fa-eye"></i>';
            }
        }
    });
    </script>


</body>

</html>