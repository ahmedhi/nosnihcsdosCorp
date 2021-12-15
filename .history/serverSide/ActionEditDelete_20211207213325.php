
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
    $data = array(
    ':Province (BE)'  => $_POST['Province (BE)'],
    ':Account Name'  => $_POST['Account Name'],
    ':Account Number'   => $_POST['Account Number'],
    ':Billing Street'    => $_POST['Billing Street'],
    ':Billing Code'    => $_POST['Billing Code'],
    ':Billing City'    => $_POST['Billing City'],
    ':Billing Province (BE)'    => $_POST['Billing Province (BE)'],
    ':Phone (Account)'    => $_POST['Phone (Account)'],
    ':Contact Owner'    => $_POST['Contact Owner'],
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