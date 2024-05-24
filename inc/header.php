<header id="header" style="background: linear-gradient(to bottom, rgba(0,0,0,1), rgba(0,0,0,0)); padding: 10px 0;">
    <style>
        #header .navbar-brand h3,
        #header .cart {
            font-family: 'Times New Roman', Times, serif;
        }

        .cart-icon {
            position: relative;
            display: inline-block;
        }

        #cart_count {
            position: absolute;
            top: -10px; /* Adjust the vertical position as needed */
            right: -10px; /* Keep it on the right side */
            width: 20px;
            height: 20px;
            line-height: 20px;
            border-radius: 50%;
            background-color: #dc3545; /* Adjust the background color as needed */
            color: #fff;
            text-align: center;
            font-size: 0.6em; /* Adjust the font size as needed */
            font-weight: normal; /* Ensure normal font weight */
        }

        /* Adjust the position of "View My Cart" text */
        .view-cart-text {
            margin-right: 10px; /* Add some space between the text and the cart icon */
            color: white; /* Ensure text color is white */
        }

        /* Remove any border or outline from the cart icon */
        .cart-icon i {
            border: none; /* Remove border */
            outline: none; /* Remove outline */
        }
    
    </style>
                
    <nav class="navbar navbar-expand-lg navbar-dark   ">
        <a href="index.php" class="navbar-brand">
            <h3 class="px-5">
                <img src="upload/Logo.png" width="100" height="100" style="background: transparent;"></img> Scholar's Secret
            </h3>   
        </a>
        <button class="navbar-toggler"
            type="button"
                data-toggle="collapse"
                data-target = "#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup"
                aria-expanded="false"
                aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="mr-auto"></div>
            <div class="navbar-nav">
                <a href="cart.php" class="nav-item nav-link active">
                    <h5 class="px-5 cart">
                        <span class="view-cart-text">View My Cart</span>
                        <div class="cart-icon">
                            <i class="fas fa-shopping-cart"></i>
                            <span id="cart_count" class="text-light bg-danger rounded-circle">
                                <?php
                                if (isset($_SESSION['cart'])){
                                    $count = 0;
                                    foreach($_SESSION['cart'] as $v){
                                        $count += $v;
                                    }
                                    echo $count;
                                } else {
                                    echo "0";
                                }
                                ?>
                            </span>
                        </div>
                    </h5>
                </a>
            </div>
        </div>

    </nav>
</header>
