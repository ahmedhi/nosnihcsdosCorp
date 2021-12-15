<?php
 
/*
 * Example PHP implementation used for the index.html example
 */
include( "../js/demo/Editor-PHP-2.0.5/lib/DataTables.php" );
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
Editor::inst( $db, 'data_input_test', 'ID' )
->fields(
        /* Field::inst('nom')
        ->validator( Validate::notEmpty( ValidateOptions::inst()
            ->message( 'Province is required' ) 
        ) ), */
        
        Field::inst('nom'),
        Field::inst('prenom'),
        Field::inst('telephone'),
        Field::inst('adresse'),
        Field::inst('ville'),
        Field::inst('code_postal'),
        Field::inst('statut'),
        Field::inst('agent'),
        Field::inst('campagne'),
        Field::inst('liste_appel'),
        Field::inst('date_appel'),
        Field::inst('forme_juridique'),      
        Field::inst('nace_code'),
        Field::inst('nace_description'),
        Field::inst('contact_position'),
        Field::inst('numero_entreprise'),
        Field::inst('province'),
        Field::inst('website'),
        Field::inst('sexe'),
        Field::inst('mail_direct'),
        Field::inst('mail_general'),
        Field::inst('gsm'),
        Field::inst('tel_direct'),
        Field::inst('commentaire_appel'),
        Field::inst('prenom2'),
        Field::inst('nom2'),
        )
        ->debug(true)
        ->process( $_POST )
        ->json();
        