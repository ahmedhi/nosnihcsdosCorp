
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
        throw new Exception("My message ".serialize($_POST['data']));
        $data = array(
        ':Province (BE)'  => $_POST['data']['Province (BE)'],
        ':Account Name'  => $_POST['data']['Account Name'],
        ':Account Number'   => $_POST['data']['Account Number'],
        ':Billing Street'    => $_POST['data']['Billing Street'],
        ':Billing Code'    => $_POST['data']['Billing Code'],
        ':Billing City'    => $_POST['data']['Billing City'],
        ':Billing Province (BE)'    => $_POST['data']['Billing Province (BE)'],
        ':Phone (Account)'    => $_POST['data']['Phone (Account)'],
        ':Contact Owner'    => $_POST['data']['Contact Owner'],
        );

        $query = "
            UPDATE import_zoho_compte 
            SET `Province (BE)` = ':Province (BE)', 
            SET `Account Name` = ':Account Name', 
            SET `Account Number` = ':Account Number', 
            SET `Billing Street` = ':Billing Street', 
            SET `Billing Code` = ':Billing Code', 
            SET `Billing City` = ':Billing City', 
            SET `Billing Province (BE)` = ':Billing Province (BE)', 
            SET `Phone (Account)` = ':Phone (Account)', 
            SET `Contact Owner` = ':Contact Owner', 
            WHERE  `Account Name` = ':Account Name'
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