<?php
$hostname = "135.148.9.103";
$username = "admin";
$password = "rod2021";
$dbname = "Rod_Input";
$port = '3306';

// Create connection
$conn = new mysqli($hostname, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

foreach($_POST['Nom'] as $key => $row) {
    $sql = "INSERT INTO data_input (
                      `nom`,
                      `prenom`,
                      `telephone`,
                      `adresse`,
                      `ville`,
                      `code_postal`,
                      `statut`,
                      `agent`,
                      `campagne`,
                      `liste_appel`,
                      `date_appel`,
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
                      `prenom2`,
                      `nom2`
                      )
            VALUES (
                    '" . $_POST['nom'][$key] . "',
                    '" . $_POST['prenom'][$key] . "',
                    '" . $_POST['telephone'][$key] . "',
                    '" . $_POST['adresse'][$key] . "',
                    '" . $_POST['ville'][$key] . "',
                    '" . $_POST['code_postal'][$key] . "',
                    '" . $_POST['statut'][$key] . "',
                    '" . $_POST['agent'][$key] . "',
                    '" . $_POST['campagne'][$key] . "',
                    '" . $_POST['liste_appel'][$key] . "',
                    '" . $_POST['date_appel'][$key] . "',
                    '" . $_POST['forme_juridique'][$key] . "',
                    '" . $_POST['nace_code'][$key] . "',
                    '" . $_POST['nace_description'][$key] . "',
                    '" . $_POST['contact_position'][$key] . "',
                    '" . $_POST['numero_entreprise'][$key] . "',
                    '" . $_POST['province'][$key] . "',
                    '" . $_POST['website'][$key] . "',
                    '" . $_POST['sexe'][$key] . "',
                    '" . $_POST['mail_general'][$key] . "',
                    '" . $_POST['Mail général'][$key] . "',
                    '" . $_POST['gsm'][$key] . "',
                    '" . $_POST['tel_direct'][$key] . "',
                    '" . mysqli_real_escape_string($conn, $_POST['commentaire_appel'][$key]) . "',
                    '" . $_POST['prenom2'][$key] . "',
                    '" . $_POST['nom2'][$key] . "'
                    )";

    if ($conn->query($sql) === TRUE) {
        echo "New records created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $content = ob_get_contents();
}

$conn->close();