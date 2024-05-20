<?php 
session_start();
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
        <div class="container">
            <div class="container mt-5 mb-5">
                <h5 class="mb-3">
                    Your Address
                    <span>
                        <i class="fas fa-address-card"></i>
                    </span>
                </h5>
                <a href="./add_address.php" class="btn btn-primary px-5 py-2">Add a new address</a>
                <div class="mt-3" id="deleteSuccessAlert">

                </div>
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
                    <tbody id="address_table_body">

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
    // Fetch data from profile_address_get.php using AJAX
    window.onload = function() {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "../../php/profile/address/profile_address_Get.php", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var data = JSON.parse(xhr.responseText);
                var tableBody = document.getElementById("address_table_body");
                tableBody.innerHTML = ""; // Clear existing table rows
                for (var i = 0; i < data.length; i++) {
                    var row = "<tr>";

                    row += "<td>" + (i + 1) + "<span class='ml-2 badge text-bg-warning'>" + (data[i]
                            .defaultAddress == 1 ? 'Default' : '') +
                        "</span>  </td>"; // Use index + 1 as serial number
                    row += "<td>" + data[i].country + "</td>";
                    row += "<td>" + data[i].aptUnitSuit + "</td>";
                    row += "<td>" + data[i].street + "</td>";
                    row += "<td>" + data[i].citySuburb + "</td>";
                    row += "<td>" + data[i].stateTerritory + "</td>";
                    row += "<td>" + data[i].Postcode + "</td>";
                    row += "<td> <span class='badge text-bg-primary'>" + data[i].forUser + "</span> </td>";
                    row += "<td>";
                    row += "<div class='btn-group' role='group'>";
                    row +=
                        "<div class='mr-4 custom-margin'><button href='' type='button' class='btn btn-outline-success'><i class='fa-solid fa-pen'></i></button></div>";
                    row += "<button type='button' class='btn btn-outline-danger' data-row-id='" +
                        data[i].addressID +
                        "' onclick='deleteRow(this, event)'><i class='fas fa-trash-alt'></i></button>";

                    row += "</div>";
                    row += "</td>";
                    row += "</tr>";
                    tableBody.innerHTML += row;
                }
            }
        };
        xhr.send();
    };
    </script>
    <script>
    function deleteRow(button) {
        event.preventDefault();

        if (confirm("Are you sure you want to delete this row?")) {
            var rowId = button.getAttribute('data-row-id');
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../../php/profile/address/profile_delete_address.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4) {
                    if (xhr.status == 200) {
                        // Show success alert
                        document.getElementById("deleteSuccessAlert").innerHTML =
                            '<div class="alert alert-success" role="alert">Row deleted successfully</div>';
                        // Reload the page after a short delay (optional)
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000); // 2 seconds delay before reloading
                    } else {
                        console.error("Error deleting row: " + xhr.responseText);
                    }
                }
            };
            // Ensure that the parameter name is "addressID"
            xhr.send("addressID=" + encodeURIComponent(rowId)); // Send addressID 
        }
    }
    </script>

</body>

</html>