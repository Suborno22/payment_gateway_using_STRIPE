<?php
require __DIR__ . "/vendor/autoload.php";

$sk = "sk_test_51NqCvMSFUB8hRccu7R1yLWaRLnuI3LDvfsfw7k7B8bQz6m9WFhAZ2SX9A8WVk26cskglAXwhChbky4LpiL1yYd2000KB2NWcuV";

\Stripe\Stripe::setApiKey($sk);

// Get data from the URL parameters
$id = $_GET['id'];
$productName = $_GET['productName'];
$price = $_GET['price'];

// Create the checkout session
$checkout_session = \Stripe\Checkout\Session::create([
    "mode" => "payment",
    "success_url" => "http://localhost:3309/success.php",
    "line_items" => [
        [
            "quantity" => 1,
            "price_data" => [
                "currency" => "usd",
                "unit_amount" => $price * 100, // Convert price to cents
                "product_data" => [
                    "name" => $productName,
                ],
            ],
        ],
    ],
]);

// Redirect to checkout page
http_response_code(303);
header("Location:" . $checkout_session->url);
?>
