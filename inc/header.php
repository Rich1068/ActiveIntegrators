<?php session_start(); 

$count = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $quantity) {
        $count += $quantity;
    }
}

echo json_encode(['count' => $count]);
?>
<header id="header" style="background: #1a1a1a; padding: 5px 10px; width:100%">
    <link rel="stylesheet" href="style.css">
    <style>
    #header {
        background: #1a1a1a;
        padding: 5px 10px 0; /* Adjusted padding */
        position: fixed; top: 0; z-index: 1000;
        border-bottom: 2px solid rgba(255, 255, 0, 0.5); /* Added yellow bottom border */
    }
    .cart-container,
    .about-container,
    .main-shop-container {
        display: flex;
        align-items: center;
        margin-right: 30px;
        position: relative;
    }

    .cart-icon,
    .about-icon,
    .main-shop-icon {
        position: relative;
        display: inline-block;
        transition: color 0.3s ease;
    }

    #cart_count {
        position: absolute;
        top: -10px;
        right: -10px;
        width: 20px;
        height: 20px;
        background-color: #dc3545;
        color: #fff;
        text-align: center;
        font-size: 1.2em; /* Increased font size */
        font-weight: bold; /* Added bold font weight */
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
    }

    .view-cart-text,
    .about-text,
    .main-shop-text {
        margin-right: 10px;
        display: block;
        margin-bottom: 3px; /* Reduced bottom margin */
        color: white;
        font-size: 1.2em; /* Increased font size */
        font-weight: lighter; /* Changed to lighter font weight */
    }

    .cart-icon i,
    .about-icon i,
    .main-shop-icon i {
        border: none;
        outline: none;
        color: white;
    }

    .container-left {
        flex: 1;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        font-size: 1.5em; /* Increased font size */
        font-weight: lighter; /* Changed to lighter font weight */
    }

    .cart-container:hover .view-cart-text,
    .about-container:hover .about-text,
    .main-shop-container:hover .main-shop-text,
    .cart-container:hover .cart-icon i,
    .about-container:hover .about-icon i,
    .main-shop-container:hover .main-shop-icon i {
        color: yellow;
    }

    /* Add lighter yellow lines */
    .nav-item.nav-link {
        position: relative;
    }

    .nav-item.nav-link::before {
        content: '';
        position: absolute;
        top: 0;
        left: -10px;
        width: 2px;
        height: 100%;
        background-color: rgba(255, 255, 0, 0.5); /* Adjusted color */
    }
</style>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <a href="index.php" class="navbar-brand">
            <h3 class="px-5 container-left">
                <img src="upload/Logo.png" width="100" height="100" style="background: transparent;"> Scholar's Secret
            </h3>   
        </a>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="mr-auto"></div>
            <div class="navbar-nav">
                <a href="index.php" class="nav-item nav-link <?php echo ($currentPage == 'index') ? 'active' : ''; ?>">
                    <div class="main-shop-container container-right">
                        <span class="main-shop-text">Main Shop</span>
                        <div class="main-shop-icon">
                            <i class="fas fa-store"></i>
                        </div>
                    </div>
                </a>
                <a href="cart.php" class="nav-item nav-link <?php echo ($currentPage == 'cart') ? 'active' : ''; ?>">
                    <div class="cart-container container-right">
                        <span class="view-cart-text">View My Cart</span>
                        <div class="cart-icon">
                            <i class="fas fa-shopping-cart"></i>
                            <span id="cart_count" class="text-light bg-danger rounded-circle">
                                <?php
                                $count = 0;
                                if (isset($_SESSION['cart'])) {
                                    foreach ($_SESSION['cart'] as $v) {
                                        $count += $v;
                                    }
                                }
                                echo $count;
                        
                                ?>
                            </span>
                        </div>
                    </div>
                </a>
                <a href="about_us.php" class="nav-item nav-link <?php echo ($currentPage == 'about') ? 'active' : ''; ?>">
                    <div class="about-container container-right">
                        <span class="about-text">About Us</span>
                        <div class="about-icon">
                            <i class="fas fa-info-circle"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </nav>
</header>
