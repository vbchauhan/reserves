<?php

echo '<h1>Your request has been successfully sent to the Library Staff.</h1><br><br>
	You will receive an email a week before your iPad is available

	Thank you for using the iPad request System';

$to = "vchauhan@umd.edu";
$subject = 'Priddy Reserves - Book Request Details';

$body = 'Dear Patron '.$fname.' '.$lname.',

	Thank you for making a request for the Equipment. Your Details are as follows:


	Thank You,
	Priddy Reserves

	NOTE: This is an auto-generated email. Please contact Madhu Singh at madhus@umd.edu for any further assistance. You might be requested to provide your Request # for faster processing of your queries.';

$from = 'From: Priddy Reserves';
mail($to, $subject, $body, $from);

?>