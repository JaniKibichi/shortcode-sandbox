<?php
$data  = json_decode(file_get_contents('php://input'), true);
print_r($data);
// Process the data...
$category = $data["category"];
if ( $category == "MobileCheckout" ) {
   // We have been paid by one of our customers!!
   $phoneNumber = $data["source"];
   $value       = $data["value"];
   $account     = $data["clientAccount"];
   // manipulate the data as required by your business logic
   // Perhaps send an SMS to confirm the payment using our APIs...
   echo $account;
   echo $phoneNumber;
   echo $value;
} else { .... some more logic ...}

