
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
        throw new Exception("My message ".$_POST['Province (BE)']);
         
        $query = "
            UPDATE rod_output.import_zoho_compte 
            SET `Province (BE)` =  '".$_POST['data']['B-P MANAGEMENT']['Province (BE)']."',
            `Account Name` =  '".$_POST['data']['B-P MANAGEMENT']['Account Name']."',
            `Account Number` =  '".$_POST['data']['B-P MANAGEMENT']['Account Number']. "',
            `Billing Street` = '".$_POST['data']['B-P MANAGEMENT']['Billing Street']. "',
            `Billing Code` =  '".$_POST['data']['B-P MANAGEMENT']['Billing Code']. "',
            `Billing City` =  '".$_POST['data']['B-P MANAGEMENT']['Billing City']. "',
            `Billing Province (BE)` = '".$_POST['data']['B-P MANAGEMENT']['Billing Province (BE)']. "', 
            `Phone (Account)` =  '".$_POST['data']['B-P MANAGEMENT']['Phone (Account)']. "',
            `Contact Owner` =  '".$_POST['data']['B-P MANAGEMENT']['Contact Owner']. "'
            WHERE  `Account Name` = '".$_POST['data']['B-P MANAGEMENT']['Account Name']. "'";
        if ($conn->query($query) === TRUE) {
            echo "New records created successfully";
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }
        echo json_encode("SUCCESS");
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