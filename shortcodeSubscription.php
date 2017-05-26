<?php
require_once "AfricasTalkingGateway.php";
require_once "config.php";   
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
   

