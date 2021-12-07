<?php
/* $servername = "localhost";
$username = "root";
$password = "";
$db = "test";
 */
$servername = "135.148.9.103";
$username = "admin";
$password = "rod@2021";
$db = "rod_output";
include( "/js/demo/Editor-PHP-2.0.5/lib/DataTables.php" );
// Create connection
$conn = new mysqli($servername, $username, $password,$db);

use
	DataTables\Editor,
	DataTables\Editor\Field,
	DataTables\Editor\Format,
	DataTables\Editor\Mjoin,
	DataTables\Editor\Options,
	DataTables\Editor\Upload,
	DataTables\Editor\Validate,
	DataTables\Editor\ValidateOptions;
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//`Province (BE)`,`Account Name`,`Account Number`,`Billing Street`,`Billing Code`,`Billing City`,`Billing Province (BE)`,`Phone (Account)`,`Contact Owner`
$result = mysqli_query($conn, "SELECT * from  rod_output.import_zoho_compte"); 
$rows = array();

    while($row = mysqli_fetch_array($result))
    {
        $rows[] = $row;
    }
    echo json_encode($rows);
    
 
    $conn->close();
?>