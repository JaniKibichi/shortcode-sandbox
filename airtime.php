<?php

		require_once "AfricasTalkingGateway.php";
		
		//Specify your credentials
		$username = "jani";
		$apiKey   = "68c993a2f1780b4bcd60323b9941675349cda487ba54109367f82532541636e9";
		
		//Specify the phone number/s and amount in the format shown
		//Example shown assumes we want to send KES 100 to two numbers
		// Please ensure you include the country code for phone numbers (+254 for Kenya in this case)
        // Please ensure you include the country code for phone numbers (KES for Kenya in this case)
		
		$recipients = array(
		                array("phoneNumber"=>"+254716688609", "amount"=>"KES 100"),
					             array("phoneNumber"=>"+254708415904", "amount"=>"KES 100")
					           );
		
		//Convert the recipient array into a string. The json string produced will have the format:
		// [{"amount":"KES 100", "phoneNumber":"+254711XXXYYY"},{"amount":"KES 100", "phoneNumber":"+254733YYYZZZ"}]
		//A json string with the shown format may be created directly and skip the above steps
		$recipientStringFormat = json_encode($recipients);
		
		//Create an instance of our awesome gateway class and pass your credentials
		$gateway = new AfricasTalkingGateway($username, $apiKey, "sandbox");
		
		// Thats it, hit send and we'll take care of the rest. Any errors will
   // be captured in the Exception class as shown below
   
   try {
   	$results = $gateway->sendAirtime($recipientStringFormat);

   	foreach($results as $result) {
   	 echo $result->status;
   	 echo $result->amount;
   	 echo $result->phoneNumber;
   	 echo $result->discount;
   	 echo $result->requestId;
   	 
   	 //Error message is important when the status is not Success
   	 echo $result->errorMessage;
   	}
   }
   catch(AfricasTalkingGatewayException $e){
   	echo $e->getMessage();
   }
  
  //Done