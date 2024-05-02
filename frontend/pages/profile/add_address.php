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


    <!-- modal for search -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Search</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="enter to search...."
                                id="recipient-name" />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary modalButton">Search</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="container mt-5 mb-5">
            <h5 class="mb-3">
                Add New Address
                <span>
                    <i class="fas fa-address-card"></i>
                </span>
            </h5>

            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card p-2 mt-4 mb-5">
                        <div class="card-body">
                            <form class="" action="" method="post">
                                <div class="mb-3">
                                    <label class="form-check-label mb-1" for="email"> Country/Region </label>

                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Choose County or Region</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <small> just example guys: generate all country via api </small>
                                </div>

                                <div class="mb-3">
                                    <label class="form-check-label mb-1" for="fullName"> Full name (Address For)</label>

                                    <input type="name" class="form-control" name="fullName" id="fullName"
                                        placeholder="eg: harry kane" required />
                                </div>

                                <div class="mb-3">
                                    <label class="form-check-label mb-1" for="phoneNumber">Phone number</label>

                                    <input type="number" class="form-control" name="phoneNumber" id="phoneNumber"
                                        placeholder="eg: 0978482453" required />
                                    <small>printed on level to assist delivery.</small>
                                </div>

                                <div class="mb-3">
                                    <label class="form-check-label mb-1" for="address">Address</label>

                                    <input type="name" class="form-control mb-2" name="address" id="address"
                                        placeholder="eg: Apt, Unit, Suite, Building, Floor" required />

                                    <input type="name" class="form-control" name="address1" id="address1"
                                        placeholder="eg: Street, PO Box, Company, c/o" required />
                                </div>

                                <div class="mb-3">
                                    <label class="form-check-label mb-1" for="Postcode">Postcode</label>

                                    <input type="number" class="form-control" name="Postcode" id="Postcode"
                                        placeholder="eg: 2245" required />
                                </div>

                                <div class="mb-3">
                                    <label class="form-check-label mb-1" for="citySuburb"> City/Suburb </label>

                                    <select class="form-select" aria-label="citySuburb">
                                        <option selected>Choose City or Suburb</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <small> just example guys: generate all city and suburb via api </small>
                                </div>

                                <div class="mb-3">
                                    <label class="form-check-label mb-1" for="countryRegion"> State/Territory </label>

                                    <select class="form-select" aria-label="countryRegion">
                                        <option selected>Choose state or Territory</option>
                                        <option value="">New South Wales(NSW)</option>
                                        <option value="">Victoria(VCT)</option>
                                        <option value="">Queensland(QLD)</option>
                                        <option value="">Western Australia(WA)</option>
                                        <option value="">South Australia(SA)</option>
                                        <option value="">Tasmania(Tas)</option>
                                        <option value="">Northern Territory(NT)</option>
                                        <option value="">Australian Capital Territory(ACT)</option>
                                    </select>
                                    <small> just example guys: generate all country via api </small>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="defaultAddress" />
                                    <label class="form-check-label" for="defaultAddress">Make Default Address ?</label>
                                </div>

                                <a href="./address.html" type="submit" type="button"
                                    class="btn btn-primary w-100 p-2 mb-3 mt-4">Add Address</a>
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