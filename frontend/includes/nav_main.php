<nav class="navbar navbar-expand-lg navbar-light bg-none navbar-custom-main">
    <div class="container">
        <a class="navbar-brand" href=<?php 
                    echo basename($_SERVER['PHP_SELF']) == 'index.php' ? '
                    index.php
                    ' : '../../index.php';
                    
                    ?>>
            <img <?php 
                    echo basename($_SERVER['PHP_SELF']) == 'index.php' ? '
                    src="./images/AussieGarmentsLogo.svg"
                    ' : '
                    src="../../images/AussieGarmentsLogo.svg"
                    ';
                    
                    ?> alt="Logo" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link " href=<?php 
                    echo basename($_SERVER['PHP_SELF']) == 'index.php' ? '
                  ./pages/product/products.php
                    ' : '../product/products.php';
                    
                    ?>>Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Catalog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Site Map</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">
                        <i class="fas fa-search"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=<?php 
                    echo basename($_SERVER['PHP_SELF']) == 'index.php' ? '
                    ./pages/checkout/cart.php
                    ' : '../checkout/cart.php';
                    
                    ?>><i class="fas fa-shopping-cart"></i></a>
                </li>
                <?php if(!empty($_SESSION['username'])){ ?>
                <li class="nav-item">
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false" href="#">
                            <i class="fas fa-user"></i>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li>
                                <a class="dropdown-item" href=<?php 
                    echo basename($_SERVER['PHP_SELF']) == 'index.php' ? '
                    ./Pages/profile/user_profile.php
                    ' : '../profile/user_profile.php';
                    
                    ?>>Profile</a>
                            </li>
                            <li><a class="dropdown-item" href=<?php 
                            echo basename($_SERVER['PHP_SELF']) == 'index.php' ?
                            './pages/authentication/logout.php' : '../authentication/logout.php';
                            ?>>Logout</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <?php } else {

                 ?>
                <li class="nav-item">
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false" href="#">
                            <i class="fas fa-user"></i>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li>
                                <a class="dropdown-item" href=<?php 
                            echo basename($_SERVER['PHP_SELF']) == 'index.php' ?
                            './pages/authentication/login.php' : '../authentication/login.php';
                            ?>>Login</a>
                            </li>
                            <li><a class="dropdown-item" href=<?php 
                            echo basename($_SERVER['PHP_SELF']) == 'index.php' ?
                            './pages/authentication/signup.php' : '../authentication/signup.php';
                            ?>>Signup</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <?php }?>
            </ul>
        </div>
    </div>
</nav>

<!-- modal for search -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Search</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="enter to search...." id="recipient-name" />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary modalButton">Search</button>
            </div>
        </div>
    </div>
</div>