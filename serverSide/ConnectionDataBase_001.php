<?php
<<<<<<< HEAD
$servername = "135.148.9.103";
$username = "root";
$password = "rod2021";
$db = "db_rod_all";
=======
/* $servername = "localhost";
$username = "root";
$password = "";
$db = "test";
 */
$servername = "135.148.9.103";
$username = "root";
$password = "rod2021";
$db = "rod_output";
>>>>>>> ahmedhi

// Create connection
$conn = new mysqli($servername, $username, $password,$db);


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
<<<<<<< HEAD
$result = mysqli_query($conn, "SELECT 'DIVISION' From  rod_all_data");
=======
/* $sql = "SELECT `Phone (Account)`,`Lead Status`,`Acheteur`,`Vendeur`,`Prospect Source`,`Converting Agent`,`Source list name`,`Vendor Assessment Notes`,`New Import`,`Contact Owner`,`Business Finder Name`,`Home Phone`,`Secondary Email`,`Mail du commentaire`,`Description` from  rod_output.import_zoho_all";
$result = $conn->query($sql);  */
//Salutation,`Salutation Emails`,`First Name`, `Last Name`,`Preferred Language`,`Mobile`,`Phone`,`Email`,`Other Street`,`Other Zip`,`Other City`,`Province (BE)`,`Account Name`,`Account Number`,`Billing Street`,`Billing Code`,`Billing City`,`Billing Province (BE)`,`Phone (Account)`,`Lead Status`,`Acheteur`,`Vendeur`,`Prospect Source`,`Converting Agent`,`Source list name`,`Vendor Assessment Notes`,`New Import`,`Contact Owner`,`Business Finder Name`,`Home Phone`,`Secondary Email`,`Mandataire`,`Mail du commentaire`,`Description`

$result = mysqli_query($conn, "SELECT * from  rod_output.import_zoho_all"); 


>>>>>>> ahmedhi
$rows = array();

          while($row = mysqli_fetch_array($result))
    {
        $rows[] = $row;
    }
    echo json_encode($rows);
    
<<<<<<< HEAD



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
=======
   
 
>>>>>>> ahmedhi
    $conn->close();
?>