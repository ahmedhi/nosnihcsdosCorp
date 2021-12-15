
<?php
$hostname = "135.148.9.103";
$username = "admin";
$password = "rod@2021";
$dbname = "Rod_Input";
$port = '3306';
// Create connection
    $conn = new mysqli($hostname, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if($_POST['action'] == 'edit')
    {
        $query = "
            UPDATE import_zoho_compte 
            SET `Province (BE)` =  '".$_POST['data']['B-P MANAGEMENT']['Province (BE)']."',
            SET `Account Name` =  '".$_POST['data']['B-P MANAGEMENT']['Account Name']."',
            SET `Account Number` =  '".$_POST['data']['B-P MANAGEMENT']['Account Number']. "',
            SET `Billing Street` = '".$_POST['data']['B-P MANAGEMENT']['Billing Street']. "',
            SET `Billing Code` =  '".$_POST['data']['B-P MANAGEMENT']['Billing Code']. "',
            SET `Billing City` =  '".$_POST['data']['B-P MANAGEMENT']['Billing City']. "',
            SET `Billing Province (BE)` = '".$_POST['data']['B-P MANAGEMENT']['Billing Province (BE)']. "', 
            SET `Phone (Account)` =  '".$_POST['data']['B-P MANAGEMENT']['Phone (Account)']. "',
            SET `Contact Owner` =  '".$_POST['data']['B-P MANAGEMENT']['Contact Owner']. "',
            WHERE  `Account Name` = '".$_POST['data']['B-P MANAGEMENT']['Account Name']. "',
";
        $statement = $conn->prepare($query);
        $statement->execute($data);
        echo json_encode($_POST);
    }

    if($_POST['action'] == 'delete')
    {
        $query = "
        DELETE FROM import_zoho_compte 
        WHERE Account Name = '".$_POST["Account Name"]."'
        ";
        $statement = $conn->prepare($query);
        $statement->execute();
        echo json_encode($_POST);
    }
?>