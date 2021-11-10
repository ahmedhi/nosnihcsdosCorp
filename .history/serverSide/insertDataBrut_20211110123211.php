<?php
$hostname = "135.148.9.103";
$username = "admin";
$password = "rod2021";
$dbname = "Rod_Input";
$port = '3306';

// Create connection
$conn = new mysqli($hostname, $username, $password, $dbname);

$output =  "Nom : " . $_POST['Nom'][$key] . " prenom : " . $_POST['Prénom'][$key] . " tel : " . $_POST['Téléphone'][$key]
        . " \nadresse " . $_POST['Adresse'][$key] . " Ville : " . $_POST['Ville'][$key] . " Code postal : " . $_POST['Code postal'][$key]
        . " \nstatut : " . $_POST['Statut'][$key] . " agent : " . $_POST['agent_'][$key] . " Campagne : " . $_POST['Campagne'][$key]
        . " \nListe d'appel : " . $_POST['Liste_d\'appel'][$key] . " Date d'appel : " . $_POST['Date_d\'appel'][$key]
        . " \nForme juridique : " . $_POST['forme_juridique'][$key] . " nace_code : " . $_POST['nace_code'][$key]
        . " \ncontact_position : " . $_POST['contact_position'][$key] . " nace_description : " . $_POST['nace_description'][$key]
        . " \nnumero_entreprise : " . $_POST['numero_entreprise'][$key] . " province : " . $_POST['province'][$key]
        . " \nwebsite : " . $_POST['website'][$key] . " sexe : " . $_POST['sexe'][$key]
        . " \nmail_direct : " . $_POST['mail_direct'][$key] . " mail_general : " . $_POST['mail_general'][$key]
        . " \ngsm : " . $_POST['gsm'][$key] . " tel_direct : " . $_POST['tel_direct'][$key]
        . " \ncommentaire_appel : " . $_POST['commentaire_appel'][$key] . " prenom inter : " . $_POST['Prénom inter'][$key]
        . " \nnom inter : " . $_POST['Nom inter'][$key] . "\n\n\n\n";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

foreach($_POST['Nom'] as $key => $row) {
    $sql = "INSERT INTO data_input (
                      `Nom`,
                      `Prénom`,
                      `Téléphone`,
                      `Adresse`,
                      `Ville`,
                      `Code postal`,
                      `Statut`,
                      `Agent`,
                      `Campagne`,
                      `Liste d'appel`,
                      `Date d'appel`,
                      `Forme juridique`,
                      `Code Nace`,
                      `Description Nace`,
                      `Position contact`,
                      `Numéro entreprise`,
                      `Province`,
                      `Website`,
                      `Sexe`,
                      `Mail direct`,
                      `Mail général`,
                      `GSM`,
                      `Téléphone direct`,
                      `Commentaire appel`,
                      `Prénom inter`,
                      `Nom inter`
                      )
            VALUES (
                    '" . $_POST['Nom'][$key] . "',
                    '" . $_POST['Prénom'][$key] . "',
                    '" . $_POST['Téléphone'][$key] . "',
                    '" . $_POST['Adresse'][$key] . "',
                    '" . $_POST['Ville'][$key] . "',
                    '" . $_POST['Code postal'][$key] . "',
                    '" . $_POST['Statut'][$key] . "',
                    '" . $_POST['agent_'][$key] . "',
                    '" . $_POST['Campagne'][$key] . "',
                    '" . $_POST['Liste_d\'appel'][$key] . "',
                    '" . $_POST['Date_d\'appel'][$key] . "',
                    '" . $_POST['Forme juridique'][$key] . "',
                    '" . $_POST['Code Nace'][$key] . "',
                    '" . $_POST['Description Nace'][$key] . "',
                    '" . $_POST['Position contact'][$key] . "',
                    '" . $_POST['Numéro entreprise'][$key] . "',
                    '" . $_POST['Province'][$key] . "',
                    '" . $_POST['Website'][$key] . "',
                    '" . $_POST['Sexe'][$key] . "',
                    '" . $_POST['Mail direct'][$key] . "',
                    '" . $_POST['Mail général'][$key] . "',
                    '" . $_POST['GSM'][$key] . "',
                    '" . $_POST['Téléphone direct'][$key] . "',
                    '" . mysqli_real_escape_string($conn, $_POST['Commentaire appel'][$key]) . "',
                    '" . $_POST['Prénom inter'][$key] . "',
                    '" . $_POST['Nom inter'][$key] . "'
                    )";

    if ($conn->query($sql) === TRUE) {
        echo "New records created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $content = ob_get_contents();
}

$conn->close();