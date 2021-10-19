<?php

$hostname = "135.148.9.103";
$username = "admin";
$password = "rod2021";
$dbname = "Rod_Input";
$port = '3306';

// TEST 1

// Create connection
$conn = new mysqli($hostname, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    error_log("Connection failed: " . $conn->connect_error, 3, "/var/tmp/succ-errors.log");
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM init_data";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo json_encode($row) . '\n';
    }
} else {
    echo "0 results";
}

$conn->close();
