<?php
require_once "AfricasTalkingGateway.php";
require_once "config.php";   

$recipients = "+254708415904";
$message    = "I'm a lumberjack and its ok, I sleep all night and I work all day";
$gateway    = new AfricasTalkingGateway($username, $apiKey,"sandbox");

try 
{ 
  // Thats it, hit send and we'll take care of the rest. 
  $results = $gateway->sendMessage($recipients, $message);		
  foreach($results as $result) {
    // status is either "Success" or "error message"
    echo " Number: " .$result->number;
    echo " Status: " .$result->status;
    echo " MessageId: " .$result->messageId;
    echo " Cost: "   .$result->cost."\n";
  }
}
catch ( AfricasTalkingGatewayException $e )
{
  echo "Encountered an error while sending: ".$e->getMessage();
}

// DONE!!! 
