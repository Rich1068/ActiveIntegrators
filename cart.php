<?php
require_once("inc/header.php"); 
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
    background-color :#2c2c2c;
    font-family: "Times New Roman", Times, serif;
    color: #fff;
}

.checkout-section form button {
    margin-top: 20px;
}

.container {
    width: 90%;
    margin: 0 auto;
    padding: 0;
    max-width: 1200px;
    margin-bottom: 200px;
}

.cart-section,
.checkout-section {
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 12px 20px rgba(0, 0, 0, 0.5);
    margin-bottom: 30px;
    background-color: #333;
    color: #ffffff;
    position: relative;
}

.checkout-section h5 {
    margin-bottom: 50px;
}


.cart-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: #444;
    margin-bottom: 20px; /* Add spacing between items */
    padding: 10px;
    border-radius: 10px;
    position: relative;
}

.cart-item img {
    width: 100px;
    height: 100px;
    padding: 0; /* Remove padding */
    background-color: #fff;
    border-radius: 20px;
    object-fit: cover; /* Make image cover the whole container */
}

.cart-item-details {
    flex: 1;
    margin-left: 20px;
}

.cart-item-details h5 {
    margin: 0;
}

.cart-item-details small {
    color: #ccc;
}

.quantity-controls {
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
}

.quantity-controls button {
    width: 30px;
    height: 30px;
    font-size: 18px;
    cursor: pointer;
    margin: 0 10px; 
    background-color: #333; 
    color: #fff;
    border: 1px solid #fff; /* White outline */
    display: flex;
    align-items: center;
    justify-content: center;
}

.remove-button {
    background-color: #FF4949;
    color: #ffffff;
    padding: 5px 10px;
    border-radius: 5px;
    margin-right: 10px; 
    position: absolute;
    right: 150px; /* Adjust as needed */
    top: 43px; /* Adjust to align with plus and minus buttons */
}

.price-details {
    font-size: 1rem;
}

.price-details h6 {
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
    border-radius: 10px;
    cursor: pointer;
    font-family: "Times New Roman", Times, serif;
    margin-bottom: 20px;
}

.container-divider {
    width: 100%;
    border-bottom: 2px solid #f0e68c;
    margin: 10px 0; /* Adjust margin to add spacing between sections */
    position: relative;
}

.banner-container {
    display: none;
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

.checkout-section {
    padding-bottom: 40px;
}

.checkout-section hr {
    border-top: 2px solid #f0e68c; /* Yellow divider in checkout container */
}

/* Additional Styles for New Requirements */
.cart-item {
    position: relative;
}

.quantity-controls {
    position: absolute;
    right: 10px; /* Move to the very right */
    top: 50%;
    transform: translateY(-50%); /* Center vertically */
    display: flex;
    justify-content: center;
    align-items: center;
}

.quantity-controls button {
    margin: 0 10px; /* Add spacing between buttons and number */
}

.cart-section {
    padding-bottom: 20px; /* Add padding to the bottom */
}

.cart-section h2 {
    position: relative;
    top: -20px; /* Adjust position as needed */
    left: 0;
    margin-left: 20px;
}
.banner-line-text2 {

padding: 30px 0; 

}

.cart-heading {
    margin-bottom: 30px; 
}


.container-style {
    background-color: #1a1a1a;
    padding: 20px; 
    margin-bottom: 50px; 
    max-width: 1300px; 
    margin: 0 auto;
    position: relative;
    box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.5); /* Darker shadow */
    border-radius: 70px;
    overflow: hidden;
    margin-top: 50px;
    border: 2px solid #ffff99;
    
}

.banner-text {
    color: #ffff99;
    font-size: 18px; 
    font-family: "Times New Roman", Times, serif;
    text-transform: uppercase;
    letter-spacing: 1px; 
    line-height: 1.2;
    text-align: center;
    padding: 15px; /* Adjusted padding */

}

.banner-text h1 {
    color: white;
    margin-top: 0;
    font-size: 28px; /* Adjusted font size */
}

.banner-text p {
    color: #ffff99;
    font-size: 14px; /* Adjusted font size */
    font-style: italic;
}

</style>

</head>
<body>
<div class="banner-line-text2">
 
 <span></span></div>

<div class="banner-line-text2">
 
 <span></span></div>
 <div class="banner-line-text2">
 
 
 <span></span></div>
 <div class="container-style">
    <div class="banner-text">
        <h1>Thank You For Shopping With Us!</h1>
        <p>Please Review all items carefully! Thank You Very Much!</p>
    </div>
</div>

  
</div>



    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <div class="description-divider"></div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-8">
            <div class="cart-heading">
    <h2>My Shopping Cart</h2>
                    </div>
                <div class="cart-section">
             
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
                                echo '<div class="quantity-controls">';
                                echo '<button class="minus-button" data-id="' . $row['id'] . '">&minus;</button>';
                                echo '<span class="quantity">' . $_SESSION['cart'][$row['id']] . '</span>';
                                echo '<button class="add-button" data-id="' . $row['id'] . '">&plus;</button>';
                                echo '</div>';
                                echo '<img src="' . $row['img_path'] . '" alt="' . $row['name'] . '">';
                                echo '<div class="cart-item-details">';
                                echo '<h5>' . $row['name'] . '</h5>';
                                echo '<small>₱' . number_format($row['current_price'], 2) . '</small>';
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
                <div class="checkout-section">
                    <div class="pt-4">
                        <h5>Total</h5>
                        <hr>
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
                                <hr>
                                <h6>Delivery Charges</h6>
                                <h6 class="text-success">FREE</h6>
                                <hr>
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
