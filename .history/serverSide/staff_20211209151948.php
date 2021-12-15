<?php
 
/*
 * Example PHP implementation used for the index.html example
 */
 
// DataTables PHP library
include( "js\demo\Editor-PHP-2.0.5\lib\DataTables.php" );
 
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
Editor::inst( $db, 'details', 'iddetailscol' )
    ->fields(
        Field::inst( 'id' ),
        Field::inst( 'Province (BE)' ),
        Field::inst( 'Account Name' ),
        Field::inst( 'Account Number' )
        Field::inst( 'Billing Street' )
        Field::inst( 'Billing Code' )
        Field::inst( 'Billing City' )
        Field::inst( 'Billing Province (BE)' )
        Field::inst( 'Phone (Account)' )
        Field::inst( 'Contact Owner' )
    )
    ->process( $_POST )
    ->json();