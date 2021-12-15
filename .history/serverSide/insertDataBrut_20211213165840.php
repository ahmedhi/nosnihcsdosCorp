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

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$telephone = $_POST['telephone'];
$adresse = $_POST['adresse'];
$ville = $_POST['ville'];
$code_postal = $_POST['code_postal'];
$statut = $_POST['statut'];
$agent = $_POST['agent'];
$campagne = $_POST['campagne'];
$liste_appel = $_POST['liste_appel'];
$date_appel = $_POST['date_appel'];
$forme_juridique = $_POST['forme_juridique'];
$nace_code = $_POST['nace_code'];
$nace_description = $_POST['nace_description'];
$contact_position = $_POST['contact_position'];
$numero_entreprise = $_POST['numero_entreprise'];
$province = $_POST['province'];
$website = $_POST['website'];
$sexe = $_POST['sexe'];
$mail_direct = $_POST['mail_direct'];
$mail_general = $_POST['mail_general'];
$gsm = $_POST['gsm'];
$tel_direct = $_POST['tel_direct'];
$commentaire_appel = $_POST['commentaire_appel'];
$prenom2 = $_POST['prenom2'];
$nom2 = $_POST['nom2'];
foreach($_POST['nom'] as $key => $row) {
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
    echo('Bien Enregistrer');
}
sqlsrv_close($conn);

?>