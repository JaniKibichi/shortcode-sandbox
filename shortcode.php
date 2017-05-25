<?php

 $from = $_POST['from'];
 $to = $_POST['to'];
 $text = $_POST['text'];
 $date = $_POST['date'];
 $id = $_POST['id'];
 $linkId = $_POST['linkId']; //This works for onDemand subscription products
//Sending Messages using sender id/short code

if(!empty($_POST['from'])){
require_once('AfricasTalkingGateway.php');

$username   = "jani";
$apikey     = "d46192b5e6c1bdf6e24ae3760f5d49cde42e8b09d53f01fc929eec205996f5ce";

$recipients = "+254708415904";

$message    = "Thanks for coming. Far too kind. I'm a lumberjack and its ok, I sleep all night and I work all day";

// Specify your AfricasTalking shortCode or sender id
$from = "88000";

$gateway    = new AfricasTalkingGateway($username, $apikey, "sandbox");

try 
{
   
   $results = $gateway->sendMessage($recipients, $message, $from);
			
  foreach($results as $result) {
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

}

?>