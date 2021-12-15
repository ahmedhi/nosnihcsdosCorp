<?php
$servername = "135.148.9.103";
$username = "admin";
$password = "rod@2021";
$db = "rod_output";

$conn = new \MySQLi($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
error_log("Connection failed: " . $conn->connect_error, 3, "/var/tmp/succ-errors.log");
  die("Connection failed: " . $conn->connect_error); 
}
?>