
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
        $json = json_encode($_POST, true);
        //echo(var_dump($json));
        
        
        $text = 'ignore everything except this "text"';
        preg_match_all('#\"(.*?)\"#', $json, $match);
        //$key = print_r($match[0][1]);;
        //print $match[1];
        //echo($match[1]);
        //print_r($match[0][1]);
        $text = print_r($$match[0][1], true);
        //echo('Hi');
        echo($text);
        //$key =  $_POST['id'];
        //throw new Exception(json_encode($_POST));
        throw new Exception("Stop");
        //throw new Exception(json_encode($_POST['data']['SCHILDERWERKEN EDDIE PEETERS']['Province (BE)']));
        

        $query = "
            UPDATE rod_output.import_zoho_compte 
            SET `Province (BE)` =  '".$_POST['data'][$key]['Province (BE)']."',
            `Account Name` =  '".$_POST['data'][$key]['Account Name']."',
            `Account Number` =  '".$_POST['data'][$key]['Account Number']. "',
            `Billing Street` = '".$_POST['data'][$key]['Billing Street']. "',
            `Billing Code` =  '".$_POST['data'][$key]['Billing Code']. "',
            `Billing City` =  '".$_POST['data'][$key]['Billing City']. "',
            `Billing Province (BE)` = '".$_POST['data'][$key]['Billing Province (BE)']. "', 
            `Phone (Account)` =  '".$_POST['data'][$key]['Phone (Account)']. "',
            `Contact Owner` =  '".$_POST['data'][$key]['Contact Owner']. "'
            WHERE  `Account Name` = '".$_POST['data'][$key]['Account Name']. "'";
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