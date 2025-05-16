<?php

$servername = 'localhost';
$username = 'root';
$password = '$Z|d!$1:Dvsl>8E9n;c!';
$dbname = 'franchis_franchisnewcopy'; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(['status' => 'failure', 'message' => 'Database connection failed: ' . $conn->connect_error]));
}

?>