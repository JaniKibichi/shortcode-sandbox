<?php
require_once "AfricasTalkingGateway.php";

//Specify your credentials
$username = "JANI";
$apiKey   = "d46192b5e6c1bdf6e24ae3760f5d49cde42e8b09d53f01fc929eec205996f5ce";

// NOTE: If connecting to the sandbox, please use your sandbox login credentials	

// Specify the number that you want to subscribe
// Please ensure you include the country code (+254 for Kenya in this case)
$phoneNumber   = "+254708415904";

//Specify your Africa's Talking short code and keyword
$shortCode = "77000";
$keyword   = "hello";
	
//Create an instance of our awesome gateway class and pass your credentials
$gateway = new AfricasTalkingGateway($username,$apiKey,"sandbox");

try {
$result = $gateway->createSubscription($phoneNumber, $shortCode, $keyword);

//Only status Success signifies the subscription was successfully
echo $result->status;
echo $result->description;
}
catch(AfricasTalkingGatewayException $e){
	echo $e->getMessage();
}

 ?>
   

