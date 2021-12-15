<?php
 $serverName = "rods-data-server-01.database.windows.net"; // update me
 $connectionOptions = array(
     "Database" => "Data-Rod-Input", // update me
     "Uid" => "admin-rods", // update me
     "PWD" => "roods-pwd@1" // update me
 );
 //Establishes the connection
 $conn = sqlsrv_connect($serverName, $connectionOptions);
// Check connection
if( $conn === false){
    die( print_r( sqlsrv_errors(), true));
}     
foreach($_POST['nom'] as $key => $row) {

$nom = $_POST['nom'][$key];
$prenom = $_POST['prenom'][$key];
$telephone = $_POST['telephone'][$key];
$adresse = $_POST['adresse'][$key];
$ville = $_POST['ville'][$key];
$code_postal = $_POST['code_postal'][$key];
$statut = $_POST['statut'][$key];
$agent = $_POST['agent'][$key];
$campagne = $_POST['campagne'][$key];
$liste_appel = $_POST['liste_appel'][$key];
$date_appel = $_POST['date_appel'][$key];
$forme_juridique = $_POST['forme_juridique'][$key];
$nace_code = $_POST['nace_code'][$key];
$nace_description = $_POST['nace_description'][$key];
$contact_position = $_POST['contact_position'][$key];
$numero_entreprise = $_POST['numero_entreprise'][$key];
$province = $_POST['province'][$key];
$website = $_POST['website'][$key];
$sexe = $_POST['sexe'][$key];
$mail_direct = $_POST['mail_direct'][$key];
$mail_general = $_POST['mail_general'][$key];
$gsm = $_POST['gsm'][$key];
$tel_direct = $_POST['tel_direct'][$key];
$commentaire_appel = $_POST['commentaire_appel'][$key];
$prenom2 = $_POST['prenom2'][$key];
$nom2 = $_POST['nom2'][$key];
     $sql = "INSERT INTO data_input_test (
                      [nom],
                      [prenom],
                      [telephone],
                      [adresse],
                      [ville],
                      [code_postal],
                      [statut],
                      [agent],
                      [campagne],
                      [liste_appel],
                      [date_appel],
                      [forme_juridique],
                      [nace_code],
                      [nace_description],
                      [contact_position],
                      [numero_entreprise],
                      [province],
                      [website],
                      [sexe],
                      [mail_direct],
                      [mail_general],
                      [gsm],
                      [tel_direct],
                      [commentaire_appel],
                      [prenom2],
                      [nom2]
                      )
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"; 

    $params = array($nom,$prenom,$telephone,$adresse,$ville,$code_postal,$statut,$agent,$campagne,$liste_appel,$date_appel,$forme_juridique,$nace_code,$nace_description,$contact_position,$numero_entreprise,$province,$website,$sexe,$mail_direct,$mail_general,$gsm,$tel_direct,$commentaire_appel,$prenom2,$nom2);    
    $result = sqlsrv_query($conn,$sql,$params);
    
   
}
if( $result === false ) {
    die( print_r( sqlsrv_errors(), true));
}
else{
    echo('New Records Created Successfully');
}
sqlsrv_close($conn);

?>