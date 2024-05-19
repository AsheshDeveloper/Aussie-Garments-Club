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
            <div class="container">
                <div class="row mt-5">
                    <div class="col-md-6 text-center">
                        <img src="../../images/about/aboutmain.jpg" class="img-fluid rounded-circle"
                            alt="About Us Image" />
                    </div>
                    <div class="col-md-6 container-about-info">
                        <h3>About Us</h3>
                        <p>
                            Welcome to the Aussie Garments Club, your go-to destination for affordable and trendy
                            fashion. Located in Rooty Hill,
                            Sydney, we offer a vast selection of clothing, accessories, and shoes for women, men, kids,
                            and babies.
                        </p>
                        <p class="mb-5">
                            Our mission is to deliver exceptional customer service and a seamless online shopping
                            experience. With a large warehouse
                            ensuring consistent stock availability and weekly deals, we aim to make quality fashion
                            accessible to all Australians.
                        </p>
                        <div class="mt-3 container-contact">
                            <h6>Contact Us:</h6>
                            <i class="text-muted mb-3 fas fa-map-marker-alt"></i>
                            <a href="https://www.google.com/maps/search/?api=1&query=99+Acropolis+Avenue,+Rooty+Hill,+NSW+2766"
                                target="_blank">99 Acropolis Avenue, Rooty Hill, NSW 2766</a><br />
                            <i class="text-muted mb-3 fas fa-envelope"></i> <a
                                href="mailto:Garmentsclub99@gmail.com">Garmentsclub99@gmail.com</a><br />
                            <i class="text-muted mb-3 fas fa-envelope"></i> <a
                                href="mailto:adnanpost@hotmail.com">adnanpost@hotmail.com</a><br />
                            <i class="text-muted mb-3 fas fa-phone"></i> +61 2 1234 5678
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col text-center">
                        <h4>Our Team</h4>
                    </div>
                </div>
                <div class="row mt-3 container-our-team">
                    <div class="col-md-3 mb-3">
                        <div class="card card-caontainer">
                            <img src="../../images/about/man1.jpg" class="card-img-top" alt="Team Member 1" />
                            <div class="card-body">
                                <h5 class="card-title">John Doe</h5>
                                <p class="card-text text-muted">CEO</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="card card-caontainer">
                            <img src="../../images/about/women1.jpg" class="card-img-top" alt="Team Member 1" />
                            <div class="card-body">
                                <h5 class="card-title">Rita Doe</h5>
                                <p class="card-text text-muted">CFO</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="card card-caontainer">
                            <img src="../../images/about/man2.jpg" class="card-img-top" alt="Team Member 1" />
                            <div class="card-body">
                                <h5 class="card-title">Jean Doe</h5>
                                <p class="card-text text-muted">CTO</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="card card-caontainer">
                            <img src="../../images/about/women2.jpg" class="card-img-top" alt="Team Member 1" />
                            <div class="card-body">
                                <h5 class="card-title">Jean Doe</h5>
                                <p class="card-text text-muted">COO</p>
                            </div>
                        </div>
                    </div>
                    <!-- Repeat the above card structure for each team member -->
                </div>
                <div class="row mt-5">
                    <div class="col text-center">
                        <h4>Testimonials</h4>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <div id="testimonialCarousel" class="carousel slide testimonial" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <p class="text-center fst-italic">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor
                                        incididunt ut labore et dolore magna
                                        aliqua.
                                    </p>
                                    <p class="text-center text-warning">&#9733;&#9733;&#9733;&#9733;&#9733;</p>
                                </div>
                                <div class="carousel-item">
                                    <p class="text-center fst-italic">
                                        Another ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor
                                        incididunt ut labore et dolore magna
                                        aliqua.
                                    </p>
                                    <p class="text-center text-warning">&#9733;&#9733;&#9733;&#9733;&#9733;</p>
                                </div>
                                <!-- Add more carousel items as needed -->
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col text-center">
                        <h4>Why Our Service?</h4>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <p class="text-center">Here are the reasons to use our service.</p>
                    </div>
                </div>

                <div class="row mt-5 container-ourservice">
                    <div class="col-md-3 mb-3">
                        <div class="card container-os-card">
                            <img src="../../images/about/os1.svg" class="card-img-top" alt="Service 1" />
                            <div class="mt-2">
                                <h6 class="card-title">Good quality materials</h6>
                                <p class="card-text text-muted">Description of Service 1.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="card container-os-card">
                            <img src="../../images/about/os2.svg" class="card-img-top" alt="Service 1" />
                            <div class="mt-2">
                                <h6 class="card-title">Well maintained machines</h6>
                                <p class="card-text text-muted">Description of Service 1.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="card container-os-card">
                            <img src="../../images/about/os3.svg" class="card-img-top" alt="Service 1" />
                            <div class="mt-2">
                                <h6 class="card-title">Perfect precision</h6>
                                <p class="card-text text-muted">Description of Service 1.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="card container-os-card">
                            <img src="../../images/about/os4.svg" class="card-img-top" alt="Service 1" />
                            <div class="mt-2">
                                <h6 class="card-title">Modern design</h6>
                                <p class="card-text text-muted">Description of Service 1.</p>
                            </div>
                        </div>
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