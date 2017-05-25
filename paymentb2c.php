<?php
require_once "AfricasTalkingGateway.php";
//Specify your credentials
$username = "jani";
$apiKey   = "d46192b5e6c1bdf6e24ae3760f5d49cde42e8b09d53f01fc929eec205996f5ce";        
        
//Create an instance of our awesome gateway class and pass your credentials
$gateway = new AfricasTalkingGateway($username, $apiKey,'sandbox');
// NOTE: If connecting to the sandbox, please add the sandbox flag to the constructor:
// $gateway = new AfricasTalkingGateway($username, $apiKey, "sandbox");
// Specify the name of your Africa's Talking payment product
$productName  = "Hallo Hallo";
// The 3-Letter ISO currency code for the checkout amount
$currencyCode = "KES";
// Provide the details of a mobile money recipient
$recipient1   = array("phoneNumber" => "+254708415904",
              "currencyCode" => "KES",
              "amount"       => 10.50,
              "metadata"     => array("name"   => "Clerk",
                          "reason" => "May Salary")
              );
// You can provide up to 10 recipients at a time
$recipient2   = array("phoneNumber"  => "+254701435178",
              "currencyCode" => "KES",
              "amount"       => 50.10,
              "metadata"     => array("name"   => "Accountant",
                          "reason" => "May Salary")
              );
// You can provide up to 10 recipients at a time
$recipient3   = array("phoneNumber"  => "+254716688609",
              "currencyCode" => "KES",
              "amount"       => 50.10,
              "metadata"     => array("name"   => "Accountant",
                          "reason" => "May Salary")
              );
// Put the recipients into an array
$recipients  = array($recipient1, $recipient2, $recipient3);
try {
  $responses = $gateway->mobilePaymentB2CRequest($productName,$recipients);
  foreach($responses as $response) {
    // Parse the responses and print them out
    echo "phoneNumber=".$response->phoneNumber;
    echo ";status=".$response->status;
    if ($response->status == "Queued") {
      echo ";transactionId=".$response->transactionId;
      echo ";provider=".$response->provider;
      echo ";providerChannel=".$response->providerChannelCode;
      echo ";value=".$response->value;
      echo ";transactionFee=".$response->transactionFee."\n";
    } else {
      echo ";errorMessage=".$response->errorMessage."\n";
    }
  }
  
}
catch(AfricasTalkingGatewayException $e){
  echo "Received error response: ".$e->getMessage();
}
?>