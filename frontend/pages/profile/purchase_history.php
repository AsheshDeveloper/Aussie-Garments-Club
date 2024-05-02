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
                Your Purchase History <span><i class="fa-solid fa-arrow-rotate-right text-success"></i></span>
            </h5>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">SN.</th>
                        <th scope="col">Order Number</th>
                        <th scope="col">Tracking ID</th>
                        <th scope="col">Image</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>123647</td>
                        <td>1KDJALHKJDSA2</td>
                        <td><img class="class-table-image rounded" src="../../images/suggestions/suggestion2.png"
                                alt="product image" /></td>
                        <td>Air Jordan</td>
                        <td>Shoes</td>

                        <td>
                            <!-- <button type="button" class="btn btn-primary"><i class="fas fa-edit"></i></button> -->
                            <a type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                                data-bs-target="#purchaseHistoryModal"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>123647</td>
                        <td>1KDJALHKJDSA2</td>
                        <td><img class="class-table-image rounded" src="../../images/suggestions/suggestion2.png"
                                alt="product image" /></td>
                        <td>Air Jordan</td>
                        <td>Shoes</td>

                        <td>
                            <!-- <button type="button" class="btn btn-primary"><i class="fas fa-edit"></i></button> -->
                            <a type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                                data-bs-target="#purchaseHistoryModal"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Filter Modal -->
    <div class="modal modal-lg fade product-filter-modal" id="purchaseHistoryModal" tabindex="-1"
        aria-labelledby="purchaseHistoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-end">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="purchaseHistoryModalLabel">Purchase History Informations</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row mb-3">
                            <div class="col">
                                <span class="label text-primary">Order Number</span>
                                <p class="text-muted">213131</p>
                            </div>
                            <div class="col">
                                <span class="label text-primary">Tracking ID</span>
                                <p class="text-muted">12KJDLSJALKD</p>
                            </div>
                            <div class="col">
                                <span class="label text-primary">Order Carier</span>
                                <p class="text-muted">DHL</p>
                            </div>
                            <div class="col">
                                <span class="label text-primary">To</span>
                                <p class="text-muted">6 east street 1107</p>
                            </div>
                        </div>
                        <div class="row"></div>
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