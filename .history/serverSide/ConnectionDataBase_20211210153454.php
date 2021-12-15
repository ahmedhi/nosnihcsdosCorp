<?php
 $serverName = "rods-data-server-01.database.windows.net"; // update me
 $connectionOptions = array(
     "Database" => "Data-Rod-Input", // update me
     "Uid" => "admin-rods", // update me
     "PWD" => "roods-pwd@1" // update me
 );
 //Establishes the connection
 $conn = sqlsrv_connect($serverName, $connectionOptions);
 $tsql= "SELECT TOP (10) [Salutation]
 ,[Salutation Emails]
 ,[First Name]
 ,[Last Name]
 ,[Preferred Language]
 ,[Mobile]
 ,[Phone]
 ,[Email]
 ,[Other Street]
 ,[Other Zip]
 ,[Other City]
 ,[Province (BE)]
 ,[Account Name]
 ,[Account Number]
 ,[Billing Street]
 ,[Billing Code]
 ,[Billing City]
 ,[Billing Province (BE)]
 ,[Phone (Account)]
 ,[Lead status]
 ,[Acheteur]
 ,[Vendeur]
 ,[Prospect Source]
 ,[Converting Agent]
 ,[Source list name]
 ,[Vendor Assessment Notes]
 ,[New Import]
 ,[Contact Owner]
 ,[Business Finder Name]
 ,[Home Phone]
 ,[Secondary Email]
 ,[Telephone]
 ,[Mandataire]
 ,[Mail du commentaire]
 ,[Description]
FROM [dbo].[Import_Zoho_all]";
 $getResults= sqlsrv_query($conn, $tsql);
 echo ("Reading data from table");
 if ($getResults == FALSE)
     echo (sqlsrv_errors());
 while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
  echo ("Your rows");
 }
 sqlsrv_free_stmt($getResults);

$servername = "rods-data-server-01.database.windows.net";
$username = "'admin-rods";
$password = "roods-pwd@1";
$db = "Data-Rod-Input";
/* $servername = "135.148.9.103";
$username = "admin";
$password = "rod@2021";
$db = "rod_output"; */

// Create connection
/* $conn = new \MySQLi($servername, $username, $password,$db); */
$conn = new sqlsrv_connect($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
error_log("Connection failed: " . $conn->connect_error, 3, "/var/tmp/succ-errors.log");
  die("Connection failed: " . $conn->connect_error); 
}
/* $sql = "SELECT `Phone (Account)`,`Lead Status`,`Acheteur`,`Vendeur`,`Prospect Source`,`Converting Agent`,`Source list name`,`Vendor Assessment Notes`,`New Import`,`Contact Owner`,`Business Finder Name`,`Home Phone`,`Secondary Email`,`Mail du commentaire`,`Description` from  rod_output.import_zoho_all";
$result = $conn->query($sql);  */
//Salutation,`Salutation Emails`,`First Name`, `Last Name`,`Preferred Language`,`Mobile`,`Phone`,`Email`,`Other Street`,`Other Zip`,`Other City`,`Province (BE)`,`Account Name`,`Account Number`,`Billing Street`,`Billing Code`,`Billing City`,`Billing Province (BE)`,`Phone (Account)`,`Lead Status`,`Acheteur`,`Vendeur`,`Prospect Source`,`Converting Agent`,`Source list name`,`Vendor Assessment Notes`,`New Import`,`Contact Owner`,`Business Finder Name`,`Home Phone`,`Secondary Email`,`Mandataire`,`Mail du commentaire`,`Description`
$result = sqlsrv_query($conn, "SELECT * from  dbo.Import_Zoho_all");

$rows = array();

while($row = mysqli_fetch_array($result))
{
    $rows[] = $row;
}
echo json_encode($rows);


$conn->close();
?>