<?php
session_start();
include_once("../../php/profile/card/getCard.php");
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
                Your Cards <span><i class="fa-solid fa-credit-card text-primary"></i></span>
            </h5>
            <a href="./add_card.php" class="btn btn-primary px-5 py-2 mb-3">Add a new card</a>
            <?php
            if (isset($_GET['success']) && $_GET['success'] == '1') {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                echo 'Card successfully deleted.';
                echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                echo '</div>';
            } elseif (isset($_GET['error']) && $_GET['error'] == '1') {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                echo 'Error: Failed to delete card.';
                echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                echo '</div>';
            }
            ?>
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
                    <?php
                    // $sn = 1;
                    // while ($row = mysqli_fetch_assoc($result)) {
                        // $cardNumber = $row['cardNumber']; 
                        // $expirationDate = $row['expirationDate']; 
                        // $securityCode = $row['securityCode'];
                        // $cardID = $row['cardID']; 
                        // $nameOnCard = $row['nameOnCard']; 
                    //      echo "<tr>";
                    //         echo "<td>" . $sn++ . "</td>";
                    //         echo "<td>" . $cardNumber . "</td>";
                    //         echo "<td>" . $nameOnCard . "</td>";
                    //         echo "<td>" . $expirationDate . "</td>";
                    //         echo "<td><div class='mb-3'><input class='password-label' type='password' id='password" . $sn . "' value='" . $securityCode . "' readonly style='border: none' /><a class='showPassword btn' id='showPassword" . $sn . "'><i class='far fa-eye'></i></a></div></td>";
                    //         echo "<td><a href='delete_card.php?card_id=" . $cardID . "' class='btn btn-outline-danger'><i class='fas fa-trash-alt'></i></a></td>";
                    //         echo "</tr>";
                    // }
                    if ($result->num_rows > 0) {
                        $sn = 1;
                        while($row = $result->fetch_assoc()) {
                            
                            echo "<tr>";
                            echo "<td>" . $sn++;
                            echo "<br/><span class='ml-2 badge text-bg-warning'>" . ($row['defaultCard'] == 1 ? 'Default' : '') . "</span>";
                            echo "</td>";
                            echo "<td>" . htmlspecialchars($row['cardNumber']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['nameOnCard']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['expirationDate']) . "</td>";
                            echo "<td><div class='mb-3'><input class='password-label' type='password' id='password" . $sn . "' value='" . htmlspecialchars($row['securityCode']) . "' readonly style='border: none' /><a class='showPassword btn' id='showPassword" . $sn . "'><i class='far fa-eye'></i></a></div></td>";
                            echo "<td><a href='../../php/profile/card/deleteCard.php?card_id=" . htmlspecialchars($row['cardID']) . "' class='btn btn-outline-danger delete-button'><i class='fas fa-trash-alt'></i></a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No cards found.</td></tr>";
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
    <!-- custom script -->

    <script>
    document.querySelectorAll(".showPassword").forEach(button => {
        button.addEventListener("click", (event) => {
            const input = event.target.closest("td").querySelector(".password-label");
            const type = input.getAttribute("type") === "password" ? "text" : "password";
            input.setAttribute("type", type);
            event.target.classList.toggle("fa-eye-slash");
        });
    });
    </script>

    <script>
    document.querySelectorAll('.delete-button').forEach(button => {
        button.addEventListener('click', function(event) {
            if (!confirm('Are you sure you want to delete this card?')) {
                event.preventDefault(); // Prevent the default behavior (i.e., following the link)
            }
        });
    });
    </script>
</body>

</html>