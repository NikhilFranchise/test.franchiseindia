<?php
// Localhost Database connectivity & DB Name
define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASS", '$Z|d!$1:Dvsl>8E9n;c!');
define("DBNAME", "franchis_franchisnewcopy");

$link = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
if (!$link) {
    die('Not connected : ' . mysqli_error());
}
$Charges = array("OPTCRDC" => "2.06", "OPTDBCRD" => "0", "OPTNBK" => "2.12", "OPTCASHC" => "0", "OPTMOBP" => "0", "OPTEMI" => "2.12", "OPTWLT" => "0", "Paytm" => "2.36",  "OPTUPI" => "0");
?>