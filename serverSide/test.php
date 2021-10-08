<?php

$hostname = "localhost:8012";
$username = "root";
$password = "";
$dbname = "";
$port = '';

// Create connection
$conn = new mysqli($hostname, $username, $password, $dbname);
                                                                    
// Check connection
if ($conn->connect_error) {
   
    die("Connection failed: " . $conn->connect_error);
}
 
 else {
    echo "Connection Success";
    } 

$conn->close();