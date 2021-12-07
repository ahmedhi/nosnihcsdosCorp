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

// Create connection
/* $conn = new mysqli($servername, $username, $password,$db); */
$conn = new \MySQLi($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
error_log("Connection failed: " . $conn->connect_error, 3, "/var/tmp/succ-errors.log");
  die("Connection failed: " . $conn->connect_error); 
}
/* $sql = "SELECT `Phone (Account)`,`Lead Status`,`Acheteur`,`Vendeur`,`Prospect Source`,`Converting Agent`,`Source list name`,`Vendor Assessment Notes`,`New Import`,`Contact Owner`,`Business Finder Name`,`Home Phone`,`Secondary Email`,`Mail du commentaire`,`Description` from  rod_output.import_zoho_all";
$result = $conn->query($sql);  */
//Salutation,`Salutation Emails`,`First Name`, `Last Name`,`Preferred Language`,`Mobile`,`Phone`,`Email`,`Other Street`,`Other Zip`,`Other City`,`Province (BE)`,`Account Name`,`Account Number`,`Billing Street`,`Billing Code`,`Billing City`,`Billing Province (BE)`,`Phone (Account)`,`Lead Status`,`Acheteur`,`Vendeur`,`Prospect Source`,`Converting Agent`,`Source list name`,`Vendor Assessment Notes`,`New Import`,`Contact Owner`,`Business Finder Name`,`Home Phone`,`Secondary Email`,`Mandataire`,`Mail du commentaire`,`Description`
$result = mysqli_query($conn, "SELECT * from  rod_input.data_test");

$rows = array();

while($row = mysqli_fetch_array($result))
{
    $rows[] = $row;
}
echo json_encode($rows);


$conn->close();
?>