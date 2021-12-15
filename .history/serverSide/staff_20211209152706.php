<?php
 
/*
 * Example PHP implementation used for the index.html example
 */
include( "js\demo\Editor-PHP-2.0.5\lib\DataTables.php" );
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
// DataTables PHP library
 
// Alias Editor classes so they are easy to use
use
    DataTables\Editor,
    DataTables\Editor\Field,
    DataTables\Editor\Format,
    DataTables\Editor\Mjoin,
    DataTables\Editor\Options,
    DataTables\Editor\Upload,
    DataTables\Editor\Validate,
    DataTables\Editor\ValidateOptions;
 
// Build our Editor instance and process the data coming from _POST
Editor::inst( $conn, 'import_zoho_compte', 'id')
    ->fields(
        Field::inst( 'id' ),
        Field::inst( 'Province (BE)' ),
        Field::inst( 'Account Name' ),
        Field::inst( 'Account Number' ),
        Field::inst( 'Billing Street' ),
        Field::inst( 'Billing Code' ),
        Field::inst( 'Billing City' ),
        Field::inst( 'Billing Province (BE)' ),
        Field::inst( 'Phone (Account)' ),
        Field::inst( 'Contact Owner' ),
    )
    ->process( $_POST )
    ->json();

    ?>