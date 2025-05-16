<?php
include('./../sparkpostphpcurl/sparkpost-api.php');
 
 $subjectText = 'Hello Bob';
 $msgText     = 'Hello World! Happy Birthday!!';
 $toText      = 'vasanth.m@businessex.com';

 $mail = new sparkPostApi('https://api.sparkpost.com/api/v1/transmissions','956f17baeb7e6df436023df847cba38802f93e14');

 $mail-> from(array('email' => 'feedback@franchiseindia.com','name' => 'FranchiseIndia Support'));
 $mail-> subject($subjectText);
 $mail-> html($msgText);
 
 $mail-> setTo(array($toText, 'mr.gulshan2014@gmail.com', 'vasanthmuthusamy@gmail.com'));
 $mail->setReplyTo('mr.gulshan2014@gmail.com');
 
 /* CC emails as array same as "seTo" */
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