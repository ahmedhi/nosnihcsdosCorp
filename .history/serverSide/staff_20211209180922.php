<?php
 
/*
 * Example PHP implementation used for the index.html example
 */
include( "../js/demo/Editor-PHP-2.0.5/lib/DataTables.php" );
// DataTables PHP library
 
// Alias Editor classes so they are easy to use
use
    DataTables\Database,
    DataTables\Editor,
    DataTables\Editor\Field,
    DataTables\Editor\Format,
    DataTables\Editor\Mjoin,
    DataTables\Editor\Options,
    DataTables\Editor\Upload,
    DataTables\Editor\Validate,
    DataTables\Editor\ValidateOptions;
 
// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'import_zoho_compte' )
->debug(true)
->fields(
    Field::inst('Province_(BE)')
        ->validator( Validate::notEmpty( ValidateOptions::inst()
            ->message( 'Province is required' ) 
        ) ),
    Field::inst('Account_Name')
        ->validator( Validate::notEmpty( ValidateOptions::inst()
            ->message( 'Account name is required' )  
        ) ),
    Field::inst('Account_Number'),
    Field::inst('Billing_Street'),
    Field::inst('Billing_Code'),
    Field::inst('Billing_City'),
    Field::inst('Billing_Province_(BE)'),
    Field::inst('Phone_(Account)'),
    Field::inst('Contact_Owner')
)
    
    
    ->process( $_POST )
    ->json();
