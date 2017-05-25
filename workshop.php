<?php
require_once('AfricasTalkingGateway.php');

$username   = "jani";
$apikey     = "d46192b5e6c1bdf6e24ae3760f5d49cde42e8b09d53f01fc929eec205996f5ce";
$recipients = "+254708415904,+254715761632";

$message    = "I'm a lumberjack and its ok, I sleep all night and I work all day";

$gateway    = new AfricasTalkingGateway($username, $apikey,"sandbox");

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
