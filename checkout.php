<?php


require __DIR__."/vendor/autoload.php";

$sk = "sk_test_51NqCvMSFUB8hRccu7R1yLWaRLnuI3LDvfsfw7k7B8bQz6m9WFhAZ2SX9A8WVk26cskglAXwhChbky4LpiL1yYd2000KB2NWcuV";

\Stripe\Stripe::setApiKey($sk);

$ckout = Stripe\Checkout\Session::create([
    "mode" => "payment",
    "success_url" => "http://localhost:3309/success.php",
    "line_items"=>[
        [
            "quantity"=>1,
            "price_data"=>[
                "currency"=>"usd",
                "unit_amount" => 2000,
                "product_data" => [
                    "name" => "T-shirt"
                ]
            ]
        ]
    ]
]);
http_response_code(303);
header("Location:" .$ckout->url);

?>