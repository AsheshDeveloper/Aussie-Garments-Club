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
        <div class="container">
            <div class="container mt-5 mb-5">
                <h5 class="mb-3">
                    Your Address
                    <span>
                        <i class="fas fa-address-card"></i>
                    </span>
                </h5>
                <a href="./add_address.php" class="btn btn-primary px-5 py-2">Add a new address</a>
                <table class="table mt-4">
                    <thead>
                        <tr>
                            <th scope="col">SN.</th>
                            <th scope="col">Country</th>
                            <th scope="col">Apt, Unit, Suite, Building, Floor</th>
                            <th scope="col">Street, PO Box, Company, c/o</th>
                            <th scope="col">City/Suburb</th>
                            <th scope="col">State/Territory</th>
                            <th scope="col">Postcode</th>
                            <th scope="col">User</th>

                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="">
                            <td>1 <span class="ml-2 badge text-bg-warning">Default</span></td>
                            <td>Australia</td>
                            <td>Unit 58</td>
                            <td>28 Durmoyne street</td>
                            <td>Lidcombe</td>
                            <td>NSW</td>
                            <td>2234</td>
                            <td><span class="ml-2 badge text-bg-primary">Someone</span></td>

                            <td>
                                <!-- <button type="button" class="btn btn-primary"><i class="fas fa-edit"></i></button> -->
                                <a href="" type="button" class="btn btn-outline-success">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <a href="" type="button" class="btn btn-outline-danger"><i
                                        class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Australia</td>
                            <td>Unit 58</td>
                            <td>28 Durmoyne street</td>
                            <td>Lidcombe</td>
                            <td>NSW</td>
                            <td>2234</td>
                            <td><span class="ml-2 badge text-bg-primary">Jack</span></td>

                            <td>
                                <!-- <button type="button" class="btn btn-primary"><i class="fas fa-edit"></i></button> -->
                                <a href="" type="button" class="btn btn-outline-success">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <a href="" type="button" class="btn btn-outline-danger"><i
                                        class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
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
    const editPasswordButton = document.getElementById("editPassword");

    showPasswordButton.addEventListener("click", () => {
        const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
        passwordInput.setAttribute("type", type);
        showPasswordButton.querySelector("i").classList.toggle("fa-eye-slash");
    });
    </script>
</body>

</html>