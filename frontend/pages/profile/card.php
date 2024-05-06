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
                Your Cards <span><i class="fa-solid fa-credit-card text-primary"></i></span>
            </h5>
            <a href="./add_card.php" class="btn btn-primary px-5 py-2 mb-3">Add a new card</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">SN.</th>
                        <th scope="col">Card Number</th>
                        <th scope="col">Name on Card</th>
                        <th scope="col">Expiration Date</th>
                        <th scope="col">Security code(CVV/CVC)</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Samir Samir</td>
                        <td>1234 4323 5678 5678</td>
                        <td>dd/mm/yyy</td>
                        <td>
                            <div class="mb-3">
                                <input class="password-label" type="password" id="password" value="345" readonly
                                    style="border: none" />
                                <a class="btn" id="showPassword"><i class="far fa-eye"></i></a>
                            </div>
                        </td>

                        <td>
                            <a href="" type="button" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Elon Stark</td>
                        <td>1234 4323 5678 5678</td>
                        <td>dd/mm/yyy</td>
                        <td>
                            <div class="mb-3">
                                <input class="password-label" type="password" id="password" value="345" readonly
                                    style="border: none" />
                                <a class="btn" id="showPassword"><i class="far fa-eye"></i></a>
                            </div>
                        </td>

                        <td>
                            <a href="" type="button" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <?php
        // Include footer
        include '../../includes/footer.php';
    ?>
    <!-- custom script -->

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