<?php
/* $servername = "localhost";
$username = "root";
$password = "";
$db = "test";
 */
$servername = "135.148.9.103";
$username = "root";
$password = "rod2021";
$db = "rod_output";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);


// Check connection
if ($conn->connect_error) {
  /* die("Connection failed: " . $conn->connect_error); */
  echo "Failed";
}
//Salutation,`Salutation Emails`,`First Name`, `Last Name`,`Preferred Language`,`Mobile`,`Phone`,`Email`,`Other Street`,`Other Zip`,`Other City`,`Province (BE)`,`Account Name`,`Lead Status`,`Acheteur`,`Vendeur`,`Prospect Source`,`Converting Agent`,`Source list name`,`Vendor Assessment Notes`,`New Import`,`Contact Owner`,`Business Finder Name`,`Home Phone`,`Secondary Email`,`Mandataire`,`Mail du commentaire`,`Description`
echo "Success";
/* $result = mysqli_query($conn, "SELECT * from  rod_output.import_zoho_contact"); 
$rows = array();

          while($row = mysqli_fetch_array($result))
    {
        $rows[] = $row;
    }
    echo json_encode($rows);
     */
  
 
    $conn->close();
?>