<?php
require_once('AfricasTalkingGateway.php');
//Specify your credentials
$username = "jani";
$apiKey   = "d46192b5e6c1bdf6e24ae3760f5d49cde42e8b09d53f01fc929eec205996f5ce";
//"680fdfa9eae83b8649c7d3884ad0679b827c7393140bc68b85e0e5b0a31dcb68";
        
//Create an instance of our awesome gateway class and pass your credentials
$gateway = new AfricasTalkingGateway($username, $apiKey, "sandbox");
// NOTE: If connecting to the sandbox, please add the sandbox flag to the constructor:
// $gateway = new AfricasTalkingGateway($username, $apiKey, "sandbox");
// Specify the name of your Africa's Talking payment product
$productName  ="Good Morning";
// The phone number of the customer checking out
$phoneNumber  = "+254708415904";
// The 3-Letter ISO currency code for the checkout amount
$currencyCode = "KES";
// The checkout amount
$amount       = 10.50;

try {
  // Initiate the checkout. If successful, you will get back a transactionId
  $transactionId = $gateway->initiateMobilePaymentCheckout($productName,
                               $phoneNumber,
                               $currencyCode,
                               $amount);
  echo "The id here is ".$transactionId;
}
catch(AfricasTalkingGatewayException $e){
  echo "Received error response: ".$e->getMessage();
}
?>