<footer class="bg-light py-5 mt-5">
    <div class="container">
        <div class="row">
            <!-- Column 1 -->
            <div class="col-md-3">
                <h5>Contact</h5>
                <small>
                    Acropolis Avenue<br />Rooty Hill, NSW 2766<br />P.O. Box: 19327<br />Phone No:
                    +719087645243<br />Email:
                    info@aussiegarments.com.au
                </small>
            </div>
            <!-- Column 2 -->
            <div class="col-md-3">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <small>
                        <li><a href="#">HOME</a></li>
                        <li><a href="#">PRODUCTS</a></li>
                        <li><a href="#">ABOUT</a></li>
                        <li><a href="#">CATALOG</a></li>
                        <li><a href="#">SITE MAP</a></li>
                    </small>
                </ul>
            </div>
            <!-- Column 3 -->
            <div class="col-md-3">
                <h5>We Support</h5>
                <img src=<?php 
                    echo basename($_SERVER['PHP_SELF']) == 'index.php' ? '
                    ./images/footer/pngimg.svg
                    ' : '
                    ../../images/footer/pngimg.svg
                    ';
                    
                    ?> alt="Support Image 1" />
                <img src=<?php 
                    echo basename($_SERVER['PHP_SELF']) == 'index.php' ? '
                    ./images/footer/mastercard-og-image.svg
                    ' : '
                    ../../images/footer/mastercard-og-image.svg
                    ';
                    ?> alt="Support Image 2" />
            </div>
            <!-- Column 4 -->
            <div class="col-md-3">
                <img src=<?php 
                    echo basename($_SERVER['PHP_SELF']) == 'index.php' ? '
                    ./images/footer/Group87.svg
                    ' : '
                    ../../images/footer/Group87.svg
                    ';
                    ?> "" alt="Main Image" class="img-fluid" />
            </div>
        </div>
        <!-- lower section -->
        <div class="row mt-3">
            <!-- Horizontal Line -->
            <hr class="mt-4 mb-0" />
            <div class="row mt-3">
                <div class="col-md-6">
                    <!-- Left Content -->
                    <p>
                        <small>Aussie Garments Club | © Copyright 2024. All rights reserved.</small>
                        <a href=""><i class="fab fa-facebook me-1"></i> </a>
                        <a href=""><i class="fab fa-twitter me-1"></i> </a>
                        <a href=""><i class="fab fa-youtube me-1"></i> </a>
                        <a href=""><i class="fab fa-whatsapp me-1"></i> </a>
                        <a href=""><i class="fab fa-instagram me-1"></i> </a>
                    </p>
                </div>
                <div class="col-md-6 text-end">
                    <!-- Right Content -->
                    <a href=""><small>Feedback</small> </a>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

<!---Search Query-->
<script>
    $(document).ready(function() {
        $('#searchButton').click(function() {
            console.log('hi');
            var formData = $('#searchForm').serialize(); // Serialize form data
            
            // AJAX request to handle search
            $.ajax({
                type: 'GET',
                action: 'search',
                url: './php/function/functions.php',
                data: formData,
                success: function(response) {
                    $('#searchResults').html(response); // Display search results
                }
            });
        });
    });
</script>