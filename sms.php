<?php
// Be sure to include the file you've just downloaded
require_once('AfricasTalkingGateway.php');

// Specify your login credentials
$username   = "jani";
$apikey     = "d46192b5e6c1bdf6e24ae3760f5d49cde42e8b09d53f01fc929eec205996f5ce";
//"680fdfa9eae83b8649c7d3884ad0679b827c7393140bc68b85e0e5b0a31dcb68";

// NOTE: If connecting to the sandbox, please use your sandbox login credentials

// Specify the numbers that you want to send to in a comma-separated list
// Please ensure you include the country code (+254 for Kenya in this case)
$recipients = "+254787235065";

// And of course we want our recipients to know what we really do
$message    = "I'm a lumberjack and its ok, I sleep all night and I work all day";

// Create a new instance of our awesome gateway class
$gateway    = new AfricasTalkingGateway($username, $apikey, "sandbox");

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

