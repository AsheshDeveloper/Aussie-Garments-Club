<!-- navigation  -->
<!-- top navigation -->
<nav class="nav-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-custom-top">
        <div class="container">

            <div>
                <?php
                if(isset($_SESSION['success'])) {
                    echo "VERIFIED";
                }
                ?>
            </div>
            <!-- Left side content -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <span class="nav-link phone-number">+610403876990 | </span>
                </li>
                <li class="nav-item">
                    <span class="nav-link">info@aussiegarments.com.au</span>
                </li>
            </ul>

            <!-- Right side content -->
            <?php if(empty($_SESSION['username'])){ ?>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href=<?php 
                    echo basename($_SERVER['PHP_SELF']) == 'index.php' ?
                    './pages/authentication/login.php' : '../authentication/login.php';
                    ?>>Login | </a></li>
                <li class="nav-item">
                    <a class="nav-link" href=<?php 
                        echo basename($_SERVER['PHP_SELF']) == 'index.php' ?
                        './pages/authentication/thirdPartySignup.php' : '../authentication/signup.php';
                    ?>>Signup |</a>
                </li>
                <li class="nav-item">
                    <?php
                    if(empty($_SESSION['userId'])){
                        echo '  <span class="nav-link text-primary" href="#">
                        Browsing as Guest              
                        </span>';
                    }
                    ?>
                </li>
            </ul>
            <?php } ?>
            <?php if(!empty($_SESSION['username'])){ ?>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <span class="nav-link">Welcome <span class="text-primary">
                            <?php echo $_SESSION['username'] ?></span>
                        </strong>
                </li>
            </ul>
            <?php } ?>
        </div>
    </nav>