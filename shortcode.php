<?php

 $Sender = $_POST['from'];
 $to = $_POST['to'];
 $text = $_POST['text'];
 $date = $_POST['date'];
 $id = $_POST['id'];
 $linkId = $_POST['linkId']; //This works for onDemand subscription products
//Sending Messages using sender id/short code

if(!empty($_POST['from'])){
	require_once "AfricasTalkingGateway.php";

	$recipients = $Sender; //this is the client who has just send in the SMS and you are Autoreplying.

	$message    = "Thanks for coming. Far too kind. I'm a lumberjack and its ok, I sleep all night and I work all day";

	// Specify your AfricasTalking shortCode or sender id
	$from = "88000";

	$gateway    = new AfricasTalkingGateway($username, $apiKey, "sandbox");

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