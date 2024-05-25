<header id="header" style="background: linear-gradient(to bottom, rgba(0,0,0,1), rgba(0,0,0,0)); padding: 10px 0;">
    <style>
        #header .navbar-brand h3,
        #header .cart {
            font-family: 'Times New Roman', Times, serif;
        }

        .cart-container {
            display: flex;
            align-items: center;
            border-radius: 5px;
            padding: 10px 60px; /* Adjust padding to make the container wider */
            color: white;
            text-align: center;
            margin-right: 50px; /* Add margin to the right to separate from the right edge */
            box-shadow: 0 0 0 2px rgba(255, 255, 255, 1); /* Make the outline skinnier and pure white */
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

        .view-cart-text {
            margin-right: 10px;
            color: white;
        }

        .cart-icon i {
            border: none;
            outline: none;
        }

        .container-left {
            flex: 1; /* Take up remaining space */
            overflow: hidden; /* Hide overflow */
            text-overflow: ellipsis; /* Add ellipsis for overflow text */
            white-space: nowrap; /* Prevent text wrapping */
        }

        .container-right {
            margin-left: auto; /* Push the right container to the right edge */
            flex: 1; /* Take up remaining space */
            text-align: right; /* Align content to the right */
        }
    </style>
                
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a href="index.php" class="navbar-brand">
            <h3 class="px-5 container-left">
                <img src="upload/Logo.png" width="100" height="100" style="background: transparent;"> Scholar's Secret
            </h3>   
        </a>
        <button class="navbar-toggler"
            type="button"
                data-toggle="collapse"
                data-target="#navbarNavAltMarkup"
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
                    <div class="cart-container container-right" style="border-color: white;">
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
                    </div>
                </a>
            </div>
        </div>
    </nav>
</header>
