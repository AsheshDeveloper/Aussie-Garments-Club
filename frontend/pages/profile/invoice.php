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
                Your Invoice <span><i class="fa-solid fa-file-invoice text-primary"></i></span>
            </h5>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">SN.</th>
                        <th scope="col">Invoice Numbae</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Issued Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>12331</td>
                        <td>$400</td>
                        <td>dd/mm/yyy</td>
                        <td><span class="badge text-bg-success">Paid</span></td>

                        <td>
                            <a href="../product_details.html" type="button" class="btn btn-outline-success"><i
                                    class="fas fa-eye"></i></a>
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
</body>

</html>