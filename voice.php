<?php
// Be sure to include our gateway class
require_once "AfricasTalkingGateway.php";
require_once "config.php";   

// Specify your Africa's Talking phone number in international format
$from = "+254722000000";

// Specify the numbers that you want to call to in a comma-separated list
// Please ensure you include the country code (+254 for Kenya in this case)
$to   = "+254708415904";

// Create a new instance of our awesome gateway class
$gateway = new AfricasTalkingGateway($username, $apiKey, "sandbox");

// Any gateway errors will be captured by our custom Exception class below, 
// so wrap the call in a try-catch block
try 
{
  // Make the call
  $results = $gateway->call($from, $to);

  //This will loop through all the numbers you requested to be called
  foreach($results as $result) {
	//Only status "Queued" means the call was successfully placed
	echo $result->status;
	echo $result->phoneNumber;
	echo "<br/>";
  }
		
}
catch ( AfricasTalkingGatewayException $e )
{
  echo "Encountered an error while making the call: ".$e->getMessage();
}

// DONE!!! 

