<?php

session_start();

require_once("inc/Database.php");

$db = new Database();

if (isset($_GET['action']) && $_GET['action'] == 'removeItem') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        unset($_SESSION['cart'][$id]);
        echo "<script>alert('Product has been Removed from Shopping Cart')</script>";
        echo "<script>window.location = 'cart.php'</script>";
    }
}

if (isset($_GET['action']) && $_GET['action'] == "update_qty") {
    if (isset($_GET['pid']) && isset($_GET['operation'])) {
        $pid = $_GET['pid'];
        $operation = $_GET['operation'];
        if ($operation == "add") {
            $_SESSION['cart'][$pid] = isset($_SESSION['cart'][$pid]) ? $_SESSION['cart'][$pid] + 1 : 1;
        } else {
            if (isset($_SESSION['cart'][$pid]) && $_SESSION['cart'][$pid] > 1) {
                $_SESSION['cart'][$pid] -= 1;
            }
        }
        header('location: ./cart.php');
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
    <link rel="stylesheet" href="style.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const removeButtons = document.querySelectorAll('.remove-button');

            removeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const productId = button.getAttribute('data-id');
                    showConfirmation(productId);
                });
            });

            function showConfirmation(productId) {
                if (confirm("Are you sure you want to remove this item from the cart?")) {
                    removeItem(productId);
                }
            }

            function removeItem(productId) {
                window.location.href = `cart.php?action=removeItem&id=${productId}`;
            }
        });
    </script>

    <style>
     body {
    background-color: #2c2c2c;
    font-family: "Times New Roman", Times, serif;
    color: #fff;
}

.checkout-section form button {
    margin-top: 20px;
    
}

.container {
    width: 100%;
    margin: 0 auto;
    padding: 0px;
    max-width: 1800px;
    margin-bottom: 200px; /* Added bottom margin */
    
    
}

.cart-section,
.checkout-section {
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
    margin-bottom: 40px; /* Increased bottom margin */
    background-color: #5a5a5a;
    outline: 3px solid rgba(253,253,150,0.5); 
}

.cart-section {
    background-color: #5a5a5a;
    color: #ffffff; /* Updated text color */
}

.checkout-section {
    padding: 20px;
    background: #5a5a5a;
    color: #ffffff; /* Updated text color */
    border-radius: 20px;
    outline: 3px solid rgba(253,253,150,0.5); 
}


.cart-section h2,
.checkout-section h5 {
    margin-bottom: 30px; /* Increased bottom margin */
    
}

.cart-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: #5a5a5a;
    margin-bottom: 30px; 
    padding: 20px; 
}

.cart-item:not(:last-child) {
    border-bottom: 1px solid #f0e68c; /* Updated border color */
}

.cart-item img {
    border-radius: 50%;
    width: 100px;
    height: 100px;
    
}

.cart-item-details {
    flex: 1;
    margin-left: 20px;
}

.cart-item-details h5 {
    margin: 0;
}

.cart-item-details small {
    color: #666;
}

.checkout-section .price-details {
    font-size: 1rem;
}

.checkout-section .price-details h6 {
    margin: 10px 0; 
}

.text-success {
    color: #28a745;
}

button {
    background-color: #FFFF8F; 
    color: #000000;
    border: none;
    padding: 10px 20px;
    border-radius: 50px;
    cursor: pointer;
    font-family: "Times New Roman", Times, serif;
    margin-bottom: 20px; 
}



.quantity-controls button {
    width: 40px;
    height: 30px;
    font-size: 18px;

    cursor: pointer;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    margin-top: 10px;
    margin-bottom: 20px; 
    margin-right: 10px; 
    
}

.minus-button
{
    background-color:#FF4949;
    color: #ffffff;
    padding: 10px;
    border-radius: 50px;
    margin-bottom: 30px; 
    margin-right: 10px;
    margin-left: 10px;
    margin-top: 10px;
    padding-top: 10px;
}

.add-button
{
    background-color: #000249;
    color: #ffffff;
    padding: 10px;
    border-radius: 50px;
    margin-bottom: 30px; 
    margin-right: 10px;
    margin-left: 10px;
    margin-top: 10px;
    padding-top: 10px;
}
.remove-button {
       color: #000000;
    padding: 10px;
    border-radius: 50px;
    margin-bottom: 30px; 

    margin-left: 11px;
    margin-top: 10px;
    padding-top: 10px;
}

.contact-us {
            font-size: 20px;
            color: white; 
            background-color: black; 
            padding: 10px; 
        
        }
        .contact-us .email {
            color: yellow; 
        }

        .container-divider {
    padding-top: 30px;
    width: 100%;
    border-bottom: 2px solid #f0e68c; /* Yellow color */
    margin-bottom: 10px;
    position: relative;
}

.banner-container {
    background-color: #1a1a1a; 
    padding: 200px; 
    max-width: 1800px;
    margin: 0 auto;
    position: relative;
    box-shadow: 8px 8px 20px rgba(0, 0, 0, 0.5); 
    border-radius: 20px; 
    overflow: hidden; 
}

.banner-image {
    position: absolute;
    top: 0;
    right: 0;
    height: 100%;
    width: 20%; /* Covering the whole right side */
    background-image: url('upload/Banner3.JPG'); /* Image URL from the upload folder */
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center right 20%; /* Adjust background position */
    border-top-right-radius: 20px; /* Apply border-radius */
}

.banner-text {
    color: #ffff99; /* Light yellow color */
    font-size: 80px; /* Increase font size */
    font-family: "Times New Roman", Times, serif; 
    text-transform: uppercase; 
    letter-spacing: 2px; 
    line-height: 1.2; 
    position: absolute;
    top: 50%;
    left: 5%; /* Adjust left position */
    transform: translateY(-50%);
}

.banner-text h1 {
    color: white; /* Change h1 color to white */
    margin-top: 0;
}

.banner-text p {
    color: #ffff99;
    font-size: 24px;
    font-style: italic;
}
.description-divider {
    padding-top: 40px;
    width: 100%;
    border-bottom: 2px solid #f0e68c;
    position: relative;
}

.banner-line-text2 {

padding: 30px 0; 

}
    </style>
</head>

<body>

    <?php require_once("inc/header.php"); ?>

    <div class="banner-line-text2">
 
 <span></span></div>

    <div class="banner-container">
    <div class="banner-text">
        <h1>Thank You For Shopping With Us!</h1>
        <p>Please Proceed to check out and check all items carefuly! Thank You Very Much!</p>
    </div>
    <div class="banner-image"></div>
</div>


    </div>

    
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <H1><BR></H1>
                    <div class="description-divider"></div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-8">
                <div class="cart-section">
                    <h2>My Shopping Cart</h2>
          
                    <hr>

                    <?php
                    // Check if cart is empty
                    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                        $total = 0;
                        $pids = array_keys($_SESSION['cart']);
                        $result = $db->getData($pids);
                        if ($result && $result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<div class="cart-item">';
                                echo '<img src="' . $row['img_path'] . '" alt="' . $row['name'] . '">';
                                echo '<div class="cart-item-details">';
                                echo '<h5>' . $row['name'] . '</h5>';
                                echo '<small>₱' . number_format($row['current_price'], 2) . '</small>';
                                echo '<div class="quantity-controls">';
                                echo '<button class="minus-button" data-id="' . $row['id'] . '">&minus;</button>';
                                echo '<span class="quantity">' . $_SESSION['cart'][$row['id']] . '</span>';
                                echo '<button class="add-button" data-id="' . $row['id'] . '">&plus;</button>';
                                echo '</div>';
                                echo '<button class="remove-button" data-id="' . $row['id'] . '">Remove Item</button>';
                                echo '</div>';
                                echo '</div>';
                                $total += (floatval($row['current_price']) * intval($_SESSION['cart'][$row['id']]));
                            }
                        }
                    } else {
                        echo "<h5>Cart is Empty</h5>";
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-4">
    <div class="checkout-section" style="background-color: #a1a1a; color: #ffffff; border-radius: 20px; padding: 40px; box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2); margin-bottom: 40px;">
        <div class="pt-4">
            <h5>Total</h5>
            <hr style="border-color: #f0e68c;">
            <div class="price-details">
                <div>
                    <?php
                    $total = 0; // Initialize $total variable
                    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                        $count = count($_SESSION['cart']);
                        echo "<h6>Price ($count items)</h6>";
                    }
                    ?>
                </div>
                <div>
                    <?php
                    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $pid => $quantity) {
                            $product = $db->getData([$pid])->fetch_assoc(); // Fetch product data by ID
                            if ($product) {
                                $total += (floatval($product['current_price']) * intval($quantity));
                            }
                        }
                        echo "<h6>₱" . number_format($total, 2) . "</h6>";
                    }
                    ?>
                    <hr style="border-color: #f0e68c;"> <!-- Adjust border color to match other container -->
                    <h6>Delivery Charges</h6>
                    <h6 class="text-success">FREE</h6>
                    <hr style="border-color: #f0e68c;"> <!-- Adjust border color to match other container -->
                    <h6>Amount Payable</h6>
                    <?php
                    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                        echo "<h6>₱" . number_format($total, 2) . "</h6>";
                    }
                    ?>
                    <form method="post" action="checkout.php">
                        <button <?php if (empty($_SESSION['cart'])) echo "disabled"; ?>>Pay</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

            </div>

        </div>
        
    </div>
    <div class="contact-us">
        Contact Us At <span class="email">skolarsekrets@gmail.com</span>
    </div>

</body>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const minusButtons = document.querySelectorAll('.minus-button');
        const addButtons = document.querySelectorAll('.add-button');

        minusButtons.forEach(button => {
            button.addEventListener('click', function() {
                const productId = button.getAttribute('data-id');
                updateQuantity(productId, 'subtract');
            });
        });

        addButtons.forEach(button => {
            button.addEventListener('click', function() {
                const productId = button.getAttribute('data-id');
                updateQuantity(productId, 'add');
            });
        });

        function updateQuantity(productId, operation) {
            window.location.href = `cart.php?action=update_qty&pid=${productId}&operation=${operation}`;
        }
    });
</script>
</html>
