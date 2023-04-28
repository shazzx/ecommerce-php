<?php 
require_once '../../../vendor/autoload.php';

$stripe = new \Stripe\StripeClient('sk_test_51LrjrtECRX9FYJu00k5xspm3taSIeXUWlM27T30WIRLLxOAOY2ntN4bleSEQ7FnpfwlixeuQiWblradxDv9MP6yb0040R2HWL1');
$customer = $stripe->customers->create([
    'description' => 'example customer',
    'email' => 'email@example.com',
    'payment_method' => 'pm_card_visa',
]);
echo $customer;

?>