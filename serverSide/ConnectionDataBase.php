<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "test";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM tbltest";
$result = $conn->query($sql);
$result = mysqli_query($conn, "SELECT * FROM tbltest");
$rows = array();
    while($row = mysqli_fetch_array($result))
    {
        $rows[] = $row;
    }
    echo json_encode($rows);
  /*   if ($result->num_rows > 0) { */
        // output data of each row
        /* while($row = $result->fetch_assoc()) { */
            /* echo "<br> id: ". $row["id"]. " - Name: ". $row["name"]. "<br>"; */
           /*  $rows[] = $row;
        }
        echo json_encode($rows);
    } else {
        echo "0 results";
    } */
    $conn->close();
?>