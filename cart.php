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
            background: linear-gradient(to bottom, #220132, #d305b2, #d305b2);
            font-family: "Times New Roman", Times, serif;
            color: #fff;
      
            background-size: cover;
        }

        .checkout-section form button {
            margin-top: 20px;
        }

        .container {
            width: 100%;
            margin: 0 auto;
            padding: 0px;
            max-width: 1200px;
            margin-bottom: 200px;
        }

        .cart-section,
        .checkout-section {
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
        }

        .cart-section {
            background: #fff;
            color: #000;
            margin-bottom: 20px;
        }

        .checkout-section {
            padding: 20px;
            background: #fff;
            color: #000;
        }

        .cart-section h2,
        .checkout-section h5 {
            margin-bottom: 20px;
        }

        .cart-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #fff;
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 10px;
        }

        .cart-item:not(:last-child) {
            border-bottom: 1px solid #e5e4e2;
        }

        .cart-item img {
            border-radius: 50%;
            width: 80px;
            height: 80px;
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
            margin: 5px 0;
        }

        .text-success {
            color: #28a745;
        }

        button {
            background-color: #d305b2;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-family: "Times New Roman", Times, serif;
        }

        button:hover {
            background-color: #a3048d;
        }

        .quantity-controls button {
            width: 30px;
            height: 30px;
            font-size: 18px;
            color: #fff;
            cursor: pointer;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            margin-top: 1px;
            margin: 10px;
        }

        .minus-button {
            background-color: #000;
            border: none;
        }

        .add-button {
            background-color: #7393b3;
            border: none;
        }

        .remove-button {
            background-color: #ff6b6b;
            border: none;
            padding: 10px;
            border-radius: 5px;
            margin: 10px;
        }
    </style>
</head>

<body>

    <?php require_once("inc/header.php"); ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <h1 class="text-uppercase" style="color: #fff;"><span style="border-bottom: 2px solid #fff;">THANK YOU FOR SHOPPING WITH US</span></h1>
                    <p class="text-uppercase mt-3" style="color: #fff;">Please Proceed To Check Out!</p>
                    <H1><BR></H1>
                    <hr class="my-4" style="border-top: 2px solid #fff;">
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
