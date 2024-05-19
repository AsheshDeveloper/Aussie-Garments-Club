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
        <div class="container mt-3 mb-4">
            <div class="container my-5">
                <h4 class="text-center mb-4 text-muted">How to Reach Us</h4>
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="map-container">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3309.7464091302935!2d150.84107301526308!3d-33.77053598068465!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b12a4d6e1e2a1e1%3A0x6342d35a0c8f1a7a!2s99%20Acropolis%20Ave%2C%20Rooty%20Hill%20NSW%202766%2C%20Australia!5e0!3m2!1sen!2sus!4v1650323341188!5m2!1sen!2sus"
                                allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                    <div class="col-md-6 pl-4">
                        <h5>Directions and Guide</h5>
                        <p class="text-muted">
                            <strong>By Car:</strong> From Sydney CBD, take the M4 motorway west towards Rooty Hill. Exit
                            at the Rooty Hill Road North and continue straight. Turn right onto Acropolis Avenue. The
                            store is located at 99 Acropolis Avenue, Rooty Hill, NSW 2766.
                        </p>
                        <p class="text-muted">
                            <strong>By Train:</strong> Take the T1 Western Line towards Emu Plains. Get off at Rooty
                            Hill Station. From the station, it’s a 10-minute walk to the store. Head west on Rooty Hill
                            Road North and turn right onto Acropolis Avenue.
                        </p>
                        <p class="text-muted">
                            <strong>By Bus:</strong> Several bus routes service the Rooty Hill area. Check the local bus
                            schedules for the most convenient route. The nearest bus stop is on Rooty Hill Road North, a
                            short walk from Acropolis Avenue.
                        </p>
                        <p class="text-muted">
                            <strong>Parking:</strong> There is ample parking available on-site and nearby. Customers can
                            use the parking lot adjacent to the store for convenience.
                        </p>
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