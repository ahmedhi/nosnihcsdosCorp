<?php
$hostname = "135.148.9.103";
$username = "root";
$password = "rod2021";
$dbname = "Rod_Input";
$port = '3306';

// Create connection
$conn = new mysqli($hostname, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO init_data data(
                      'Nom',
                      'Prénom',
                      'Téléphone',
                      'Adresse',
                      'Ville',
                      'Code postal',
                      'Statut',
                      'agent',
                      'Campagne',
                      'Liste dappel',
                      'Date dappel'
                      'forme_juridique',
                      'nace_code',
                      'nace_description',
                      'contact_position',
                      'numero_entreprise',
                      'province',
                      'website',
                      'sexe',
                      'mail_direct',
                      'mail_general',
                      'gsm',
                      'tel_direct',
                      'commentaire_appel',
                      'prenom inter',
                      'nom inter',
                      )
            VALUES (
                    " + $_POST['Nom'][$key] + ",
                    " + $_POST['Prénom'][$key] + ",
                    " + $_POST['Téléphone'][$key] + ",
                    " + $_POST['Adresse'][$key] + ",
                    " + $_POST['Ville'][$key] + ",
                    " + $_POST['Code postal'][$key] + ",
                    " + $_POST['Statut'][$key] + ",
                    " + $_POST['agent'][$key] + ",
                    " + $_POST['Campagne'][$key] + ",
                    " + $_POST['Liste dappel'][$key] + ",
                    " + $_POST['Date dappel'][$key] + ",
                    " + $_POST['forme_juridique'][$key] + ",
                    " + $_POST['nace_code'][$key] + ",
                    " + $_POST['nace_description'][$key] + ",
                    " + $_POST['contact_position'][$key] + ",
                    " + $_POST['numero_entreprise'][$key] + ",
                    " + $_POST['province'][$key] + ",
                    " + $_POST['website'][$key] + ",
                    " + $_POST['sexe'][$key] + ",
                    " + $_POST['mail_direct'][$key] + ",
                    " + $_POST['mail_general'][$key] + ",
                    " + $_POST['gsm'][$key] + ",
                    " + $_POST['tel_direct'][$key] + ",
                    " + $_POST['commentaire_appel'][$key] + ",
                    " + $_POST['prenom inter'][$key] + ",
                    " + $_POST['nom inter'][$key] + ",
                    )";
if ($conn->query($sql) === TRUE) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

foreach($_POST['Nom'] as $key => $row) {

    // Get name of field Code postal | Liste d'appel
    // NEED TO CHANGE THE SECOND PRENOM & NOM
    $sql = "INSERT INTO init_data data(
                      'Nom',
                      'Prénom',
                      'Téléphone',
                      'Adresse',
                      'Ville',
                      'Code postal',
                      'Statut',
                      'agent',
                      'Campagne',
                      'Liste dappel',
                      'Date dappel'
                      'forme_juridique',
                      'nace_code',
                      'nace_description',
                      'contact_position',
                      'numero_entreprise',
                      'province',
                      'website',
                      'sexe',
                      'mail_direct',
                      'mail_general',
                      'gsm',
                      'tel_direct',
                      'commentaire_appel',
                      'prenom inter',
                      'nom inter',
                      )
            VALUES (
                    " + $_POST['Nom'][$key] + ",
                    " + $_POST['Prénom'][$key] + ",
                    " + $_POST['Téléphone'][$key] + ",
                    " + $_POST['Adresse'][$key] + ",
                    " + $_POST['Ville'][$key] + ",
                    " + $_POST['Code postal'][$key] + ",
                    " + $_POST['Statut'][$key] + ",
                    " + $_POST['agent'][$key] + ",
                    " + $_POST['Campagne'][$key] + ",
                    " + $_POST['Liste dappel'][$key] + ",
                    " + $_POST['Date dappel'][$key] + ",
                    " + $_POST['forme_juridique'][$key] + ",
                    " + $_POST['nace_code'][$key] + ",
                    " + $_POST['nace_description'][$key] + ",
                    " + $_POST['contact_position'][$key] + ",
                    " + $_POST['numero_entreprise'][$key] + ",
                    " + $_POST['province'][$key] + ",
                    " + $_POST['website'][$key] + ",
                    " + $_POST['sexe'][$key] + ",
                    " + $_POST['mail_direct'][$key] + ",
                    " + $_POST['mail_general'][$key] + ",
                    " + $_POST['gsm'][$key] + ",
                    " + $_POST['tel_direct'][$key] + ",
                    " + $_POST['commentaire_appel'][$key] + ",
                    " + $_POST['prenom inter'][$key] + ",
                    " + $_POST['nom inter'][$key] + ",
                    )";
    if ($conn->query($sql) === TRUE) {
        echo "New records created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}

$conn->close();
