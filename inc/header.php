
<header id="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="index.php" class="navbar-brand">
            <h3 class="px-5">
                <img src="upload/1.jpg" width="100" height="100"></img> Scholar's Secret
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
                        <i class="fas fa-shopping-cart"></i>
                        <?php
                        if (isset($_SESSION['cart'])){
                            $count = 0;
                            foreach($_SESSION['cart'] as $v){
                                $count += $v;
                            }
                            echo "<span id=\"cart_count\" class=\"text-light bg-danger rounded-0\">$count</span>";
                        }else{
                            echo "<span id=\"cart_count\" class=\"text-light bg-danger rounded-0\">0</span>";
                        }
                        ?>
                        Cart
                    </h5>
                </a>
            </div>
        </div>

    </nav>
</header>






