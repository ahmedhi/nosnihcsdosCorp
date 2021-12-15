<?php

$serverName = "rods-data-server-01.database.windows.net"; // update me
$connectionOptions = array(
    "Database" => "Data-Rod-Input", // update me
    "Uid" => "admin-rods", // update me
    "PWD" => "roods-pwd@1" // update me
);
//Establishes the connection
   $conn = sqlsrv_connect($serverName, $connectionOptions);
   if( $conn === false){
       die( print_r( sqlsrv_errors(), true));
   }     

$sql = "SELECT * FROM select * from rod_input.data_input";
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
