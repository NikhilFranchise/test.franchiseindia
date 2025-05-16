<?php
	
	include('sparkpost-api.php');
	
	
	$mail = new sparkPostApi('https://api.sparkpost.com/api/v1/transmissions','a2096c16967684a975952eaeef3c046a653ec3c9');

	$mail-> from(array('email' => 'noreply@franchiseindia.com','name' => 'FranchiseIndia Support'));
	$mail-> subject('My First Sparkpost Mail');
	$mail-> html('
		<h1>Mandrill is over</h1>
		<p>Mandrill is now a paid service, let\'s move to sparkpost!</p>
	');
	
	$mail-> setTo(array('dsy2002in@gmail.com'));
	$mail->setReplyTo('dsy2002in@gmail.com');
	
	/* CC emails as array same as "seTo"
	//$mail->setCc(array('person1@yourdomain.com','person2@yourdomain.com'));

	/* BCC emails as array same as "seTo" */
	//$mail->setBcc(array('person1@yourdomain.com','person2@yourdomain.com'));
	try{
		$mail->send();
		print "Message Sent";
	} 
	catch (Exception $e) {
		print $e;	
	}


	$mail->close();

?>
