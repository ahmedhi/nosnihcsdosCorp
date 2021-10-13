<?php
$servername = "135.148.9.103";
$username = "admin";
$password = "rod2021";
$db = "rod_all";

// Create connection
/* $conn = new mysqli($servername, $username, $password,$db);
 */$conn = new \MySQLi($servername, $username, $password,$db);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$result = mysqli_query($conn, "select * from rod_all.rod_all_data  limit 1000 ");
$rows = array();

while($row = mysqli_fetch_array($result))
{
    $rows[] = $row;
}
echo json_encode($rows);

$conn->close();
?>