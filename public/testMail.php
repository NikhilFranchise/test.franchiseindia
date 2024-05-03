<?php
$msg = "First line of text\nSecond line of text";
$headers = "From: no-reply@franchiseindia.com";

try {
#  mail("vasanthmuthusamy@gmail.com","My subject",$msg, $headers);
mail("dharmendra@franchiseindia.net","My subject",$msg, $headers);
} catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}
?>
