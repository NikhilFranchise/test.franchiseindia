<?php
$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibm';
if (!isset($_POST['__token']) || $_POST['__token'] != $token) {
echo 'You are not authorized to perform this action';
exit;
}

function connectToDb($bdUser, $dbPassword, $dbName)
{
$link = mysqli_connect('localhost', $bdUser, $dbPassword, $dbName);
if (!$link) {
die('Network Problem.... Kindly try after 15 mins!');
}
return $link;
}

$link = connectToDb('root', '$Z|d!$1:Dvsl>8E9n;c!', 'franchis_franchisnewcopy');
//$link = connectToDb('root', 'root', 'franchiseindia');
$offset = $_POST['offset'];
$limit = $_POST['limit'];
$date  = $_POST['date'];



function replaceChar($string)
{
    $string = preg_replace('/[^^a-zA-Z0-9#@&-+:_(),.!@"\/ ]/','',$string);
    $string = preg_replace('!\s+!', ' ', $string);
    return $string;
}
