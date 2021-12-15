
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
        throw new Exception(json_encode($_POST));
        //throw new Exception(json_encode($_POST['data']['SCHILDERWERKEN EDDIE PEETERS']['Province (BE)']));
         
        $query = "
            UPDATE rod_output.import_zoho_compte 
            SET `Province (BE)` =  '".$_POST['data']['SCHILDERWERKEN EDDIE PEETERS']['Province (BE)']."',
            `Account Name` =  '".$_POST['data']['SCHILDERWERKEN EDDIE PEETERS']['Account Name']."',
            `Account Number` =  '".$_POST['data']['SCHILDERWERKEN EDDIE PEETERS']['Account Number']. "',
            `Billing Street` = '".$_POST['data']['SCHILDERWERKEN EDDIE PEETERS']['Billing Street']. "',
            `Billing Code` =  '".$_POST['data']['SCHILDERWERKEN EDDIE PEETERS']['Billing Code']. "',
            `Billing City` =  '".$_POST['data']['SCHILDERWERKEN EDDIE PEETERS']['Billing City']. "',
            `Billing Province (BE)` = '".$_POST['data']['SCHILDERWERKEN EDDIE PEETERS']['Billing Province (BE)']. "', 
            `Phone (Account)` =  '".$_POST['data']['SCHILDERWERKEN EDDIE PEETERS']['Phone (Account)']. "',
            `Contact Owner` =  '".$_POST['data']['SCHILDERWERKEN EDDIE PEETERS']['Contact Owner']. "'
            WHERE  `Account Name` = '".$_POST['data']['SCHILDERWERKEN EDDIE PEETERS']['Account Name']. "'";
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