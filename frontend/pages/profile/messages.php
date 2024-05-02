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
                Your Messages <span><i class="fa-solid fa-message text-primary"></i></span>
            </h5>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">SN.</th>
                        <th scope="col">Message ID</th>
                        <th scope="col">Message</th>
                        <th scope="col">Date</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>12331</td>
                        <td>you have added product to the cart</td>
                        <td>dd/mm/yyy</td>

                        <td>
                            <a href="" type="button" class="btn btn-outline-success"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td>12331</td>
                        <td>you have checkedout and bought the product</td>
                        <td>dd/mm/yyy</td>

                        <td>
                            <a href="" type="button" class="btn btn-outline-success"><i class="fas fa-eye"></i></a>
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