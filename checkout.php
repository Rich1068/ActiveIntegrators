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

    $description .= "
    <div style='display: flex; justify-content: space-between; padding: 5px 0;'>
        <span>{$quantity}x {$row['name']}</span>
        <span> ₱ {$unit_total}</span>
    </div>";
}
$desc1 .= "<div style='font-size: 18px; margin: 20px 0;'>
<h3 style='color: #4d004d; border-bottom: 1px solid #4d004d; padding-bottom: 5px; margin: 0;'>PURCHASE SUMMARY</h3>";

$checkout_session = \Stripe\Checkout\Session::create([
    "mode" => "payment",
    "success_url" => "http://localhost/stripe/ActiveIntegrators/success.php",
    "cancel_url" => "http://localhost/stripe/ActiveIntegrators/cart.php",
    "line_items" => $line_items,
    "payment_intent_data" => [
        "description" =>$desc1 . $description,
    ]
]);


http_response_code(303);
echo '<script>window.location.href = "' . $checkout_session->url . '";</script>';
