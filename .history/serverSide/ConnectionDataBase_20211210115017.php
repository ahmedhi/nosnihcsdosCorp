<?php
/* $servername = "localhost";
$username = "root";
$password = "";
$db = "test";
 */
include("serverSide/config.php");
/* $sql = "SELECT `Phone (Account)`,`Lead Status`,`Acheteur`,`Vendeur`,`Prospect Source`,`Converting Agent`,`Source list name`,`Vendor Assessment Notes`,`New Import`,`Contact Owner`,`Business Finder Name`,`Home Phone`,`Secondary Email`,`Mail du commentaire`,`Description` from  rod_output.import_zoho_all";
$result = $conn->query($sql);  */
//Salutation,`Salutation Emails`,`First Name`, `Last Name`,`Preferred Language`,`Mobile`,`Phone`,`Email`,`Other Street`,`Other Zip`,`Other City`,`Province (BE)`,`Account Name`,`Account Number`,`Billing Street`,`Billing Code`,`Billing City`,`Billing Province (BE)`,`Phone (Account)`,`Lead Status`,`Acheteur`,`Vendeur`,`Prospect Source`,`Converting Agent`,`Source list name`,`Vendor Assessment Notes`,`New Import`,`Contact Owner`,`Business Finder Name`,`Home Phone`,`Secondary Email`,`Mandataire`,`Mail du commentaire`,`Description`
$result = mysqli_query($conn, "SELECT * from  rod_output.import_zoho_all");

$rows = array();

while($row = mysqli_fetch_array($result))
{
    $rows[] = $row;
}
echo json_encode($rows);


$conn->close();
?>