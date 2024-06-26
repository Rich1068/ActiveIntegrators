<?php
include 'cart.php';
require_once ("inc/dynamic_elements.php");
require __DIR__ . "/vendor/autoload.php";

$stripe_secret_key = "sk_test_51PEkiIA4wquW7B6tG3RjpeX34sHaIoXfJN8IJvdqJCO6uwHdBjekdyIuaNeYVqcodFHmC1uvVWS29PV6bolUPy3900mgtOHJt8";

\Stripe\Stripe::setApiKey($stripe_secret_key);


$pids = array_keys($_SESSION['cart']);

// Fetch product data from the database
$result = $db->getData($pids);

$line_items = [];
$total = 0;
$description = "";
date_default_timezone_set('Asia/Manila');
$currentDateTime = (new DateTime())->format('F j, Y, g:i:s A');

// Loop through the fetched product data
while ($row = $result->fetch_assoc()) {
    $quantity = intval($_SESSION['cart'][$row['id']]);
    $unit_amount = floatval($row['current_price']) * 100; // Convert to cents
    $unit_total = floatval($row['current_price']) * $quantity;
    // Add item to the Stripe line items array
    $line_items[] = [
        "quantity" => $quantity,
        "price_data" => [
            "currency" => "php",
            "unit_amount" => $unit_amount,
            "product_data" => [
                "name" => $row['name']
            ]
        ]
    ];
    
    // Calculate the total
    $total += $unit_amount * $quantity;
    
    $Cart .= "<div style='font-size:18px;'> 
    {$quantity} x <span style='display:inline-block; width:200px;'>{$row['name']}</span> ₱{$unit_total}.00 
    </div>";
}

$desc1 .= "<div style='font-size: 22px;'><fieldset style='border: 0; border-top: 1px solid black;'><legend><b>PURCHASE SUMMARY</b></legend></fieldset></div>";

$checkout_session = \Stripe\Checkout\Session::create([
    "mode" => "payment",
    "success_url" => "https://scholarssecret.000webhostapp.com/success.php",
    "cancel_url" => "https://scholarssecret.000webhostapp.com/cart.php",
    "line_items" => $line_items,
    "payment_intent_data" => [
        "metadata" => [
            "receipt" => $desc1 . $Cart,
            "date" => $currentDateTime,
        ],
    ]
]);


http_response_code(303);
echo '<script>window.location.href = "' . $checkout_session->url . '";</script>';
