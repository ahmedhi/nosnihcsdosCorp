<?php
//ob_start();

//error_log("\n\nSTART !!!", 3, "/var/tmp/succ-errors.log");
//error_log("json " . json_encode($_POST), 3, "/var/tmp/succ-errors.log");

$hostname = "135.148.9.103";
$username = "admin";
$password = "rod2021";
$dbname = "Rod_Input";
$port = '3306';

// Create connection
$conn = new mysqli($hostname, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    //error_log("Connection failed: " . $conn->connect_error, 3, "/var/tmp/succ-errors.log");
    die("Connection failed: " . $conn->connect_error);
}

//error_log("\nNo error in connection ", 3, "/var/tmp/succ-errors.log");

foreach($_POST['Nom'] as $key => $row) {

    //error_log("\nIN FOREACH in key : " . $key, 3, "/var/tmp/succ-errors.log");
    //error_log("\nPrenom : " . $_POST['Prénom'][$key], 3, "/var/tmp/succ-errors.log");


    $output =  "Nom : " . $_POST['Nom'][$key] . " prenom : " . $_POST['Prénom'][$key] . " tel : " . $_POST['Téléphone'][$key]
        . " \nadresse " . $_POST['Adresse'][$key] . " Ville : " . $_POST['Ville'][$key] . " Code postal : " . $_POST['Code_postal'][$key]
        . " \nstatut : " . $_POST['Statut'][$key] . " agent : " . $_POST['agent_'][$key] . " Campagne : " . $_POST['Campagne'][$key]
        . " \nListe d'appel : " . $_POST['Liste_d\'appel'][$key] . " Date d'appel : " . $_POST['Date_d\'appel'][$key]
        . " \nForme juridique : " . $_POST['forme_juridique'][$key] . " nace_code : " . $_POST['nace_code'][$key]
        . " \ncontact_position : " . $_POST['contact_position'][$key] . " nace_description : " . $_POST['nace_description'][$key]
        . " \nnumero_entreprise : " . $_POST['numero_entreprise'][$key] . " province : " . $_POST['province'][$key]
        . " \nwebsite : " . $_POST['website'][$key] . " sexe : " . $_POST['sexe'][$key]
        . " \nmail_direct : " . $_POST['mail_direct'][$key] . " mail_general : " . $_POST['mail_general'][$key]
        . " \ngsm : " . $_POST['gsm'][$key] . " tel_direct : " . $_POST['tel_direct'][$key]
        . " \ncommentaire_appel : " . $_POST['commentaire_appel'][$key] . " prenom inter : " . $_POST['prenom'][$key]
        . " \nnom inter : " . $_POST['nom2'][$key] . "\n\n\n\n";


        /*
        . ",
                    " + $_POST['commentaire_appel'][$key] + ",
                    " + $_POST['prenom inter'][$key] + ",
                    " + $_POST['nom inter'][$key] + "
        */
    //error_log($output, 3, "/var/tmp/succ-errors.log");
    
    // Get name of field Code postal | Liste d'appel
    // NEED TO CHANGE THE SECOND PRENOM & NOM
    $sql = "INSERT INTO data_input (
                      `Nom`,
                      `Prénom`,
                      `Telephone`,
                      `Adresse`,
                      `Ville`,
                      `Code Postal`,
                      `Statut`,
                      `agent`,
                      `Campagne`,
                      `Liste d'appel`,
                      `Date d'appel`,
                      `forme_juridique`,
                      `nace_code`,
                      `nace_description`,
                      `contact_position`,
                      `numero_entreprise`,
                      `province`,
                      `website`,
                      `sexe`,
                      `mail_direct`,
                      `mail_general`,
                      `gsm`,
                      `tel_direct`,
                      `commentaire_appel`,
                      `prenom`,
                      `nom2`
                      )
            VALUES (
                    '" . $_POST['Nom'][$key] . "',
                    '" . $_POST['Prénom'][$key] . "',
                    '" . $_POST['Téléphone'][$key] . "',
                    '" . $_POST['Adresse'][$key] . "',
                    '" . $_POST['Ville'][$key] . "',
                    '" . $_POST['Code_postal'][$key] . "',
                    '" . $_POST['Statut'][$key] . "',
                    '" . $_POST['agent_'][$key] . "',
                    '" . $_POST['Campagne'][$key] . "',
                    '" . $_POST['Liste_d\'appel'][$key] . "',
                    '" . $_POST['Date_d\'appel'][$key] . "',
                    '" . $_POST['forme_juridique'][$key] . "',
                    '" . $_POST['nace_code'][$key] . "',
                    '" . $_POST['nace_description'][$key] . "',
                    '" . $_POST['contact_position'][$key] . "',
                    '" . $_POST['numero_entreprise'][$key] . "',
                    '" . $_POST['province'][$key] . "',
                    '" . $_POST['website'][$key] . "',
                    '" . $_POST['sexe'][$key] . "',
                    '" . $_POST['mail_direct'][$key] . "',
                    '" . $_POST['mail_general'][$key] . "',
                    '" . $_POST['gsm'][$key] . "',
                    '" . $_POST['tel_direct'][$key] . "',
                    '" . $_POST['commentaire_appel'][$key] . "',
                    '" . $_POST['prenom'][$key] . "',
                    '" . $_POST['nom2'][$key] . "'
                    )";


    //error_log("\nEND query " , 3, "/var/tmp/succ-errors.log");

    if ($conn->query($sql) === TRUE) {
        echo "New records created successfully";
        //error_log("New records created successfully", 3, "/var/tmp/succ-errors.log");

    } else {
        //error_log("Error: " . $sql . "<br>" . $conn->error, 3, "/var/tmp/new-errors.log");
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $content = ob_get_contents();
    //ob_end_clean();
    //file_put_contents('/var/tmp/succ-errors.txt', $content, FILE_APPEND);

}

$conn->close();