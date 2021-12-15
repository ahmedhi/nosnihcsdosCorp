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
  echo ("ff");
 }
 sqlsrv_free_stmt($getResults);

?>