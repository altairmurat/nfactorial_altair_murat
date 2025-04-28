<?php
$servername = "localhost";
$username = "c778043d_grat";
$password = "Hello123";
$dbname = "c778043d_grat";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
