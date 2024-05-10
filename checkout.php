<?php
include 'cart.php';
require __DIR__ . "/vendor/autoload.php";

$stripe_secret_key = "sk_test_51PEkiIA4wquW7B6tG3RjpeX34sHaIoXfJN8IJvdqJCO6uwHdBjekdyIuaNeYVqcodFHmC1uvVWS29PV6bolUPy3900mgtOHJt8";

\Stripe\Stripe::setApiKey($stripe_secret_key);

$checkout_session = \Stripe\Checkout\Session::create([
    "mode" => "payment",
    "success_url" => "http://localhost/stripe/ActiveIntegrators/success.php",
    "line_items" => [
        [
            "quantity" => 1,  //variable maybe
            "price_data" => [
                "currency" => "usd",
                "unit_amount" => $total . "00", //use variable
                "product_data" => [
                    "name" => "Cart" //use query maybe or variable
                ]
            ]
        ]
    ]
]);
http_response_code(303);
echo '<script>window.location.href = "' . $checkout_session->url . '";</script>';
