const breakLine = (colNumber) => ({
	"exportOptions": {
		format: {
			body: (data, row, column, node) => {
				if (column === colNumber) {
					return data.replace(/\n/g, "\r\n");
				}
				return data;
			}
		},
	}
});

$(document).ready(function() {
	$('#outPut-detail').DataTable( {
		"scrollX": true,
		"processing": true,
		"ajax" : {
			"url":"serverSide/ConnectionDataBase.php",
			"dataSrc" : ""
		},
		"columns" : [
			{"data":"Salutation"},
			{"data":"Salutation Emails"},
			{"data":"First Name"},
			{"data":"Last Name"},
			{"data":"Preferred Language"},
			{"data":"Mobile"},
			{"data":"Phone"},
			{"data":"Email"},
			{"data":"Other Street"},
			{"data":"Other Zip"},
			{"data":"Other City"},
			{"data":"Province (BE)"},
			{"data":"Account Name"},
			{"data":"Account Number"},
			{"data":"Billing Street"},
			{"data":"Billing Code"},
			{"data":"Billing City"},
			{"data":"Billing Province (BE)"},
			{"data":"Phone (Account)"},
			{"data":"Lead Status"},
			{"data":"Acheteur"},
			{"data":"Vendeur"},
			{"data":"Prospect Source"},
			{"data":"Converting Agent"},
			{"data":"Source list name"},
			{"data":"Vendor Assessment Notes"},
			{"data":"New Import"},
			{"data":"Contact Owner"},
			{"data":"Business Finder Name"},
			{"data":"Home Phone"},
			{"data":"Secondary Email"},
			{"data":"Mandataire"},
			{"data":"Mail du commentaire"},
			{"data":"Description"},
		],
		dom: 'Bfrtip',
		buttons: [
			$.extend( true, {}, breakLine(33), {
				extend: 'excel',
				title: '',
				filename: 'import zoho all',
				text: 'EXCEL Import_Zoho_All',
				
            }),
			$.extend( true, {}, breakLine(33), {
				extend: 'csv',
				title: 'import zoho all',
				text: 'CSV Import_Zoho_All',
				fieldSeparator: ';'
				
            }),
		],
	} );
} );
//*******************************import_zoho_compte************************************* */

$(document).ready(function() {
	$('#import_zoho_compte').DataTable( {
		"scrollX": true,
		"processing": true,
		select: true,
		"ajax" : {
			"url":"serverSide/import_zoho_compte.php",
			"dataSrc" : ""
		},
		"columns" : [
			{"data":"Province (BE)"},
			{"data":"Account Name"},
			{"data":"Account Number"},
			{"data":"Billing Street"},
			{"data":"Billing Code"},
			{"data":"Billing City"},
			{"data":"Billing Province (BE)"},
			{"data":"Phone (Account)"},
			{"data":"Contact Owner"},
		],
		dom: 'Bfrtip',
		buttons: [
			{
				extend: 'excel',
				title: '',
				filename: 'import zoho compte',
				text: 'EXCEL Import_Zoho_Compte',
			},
			{
				extend: 'csv',
				title: 'import zoho compte',
				text: 'CSV Import_Zoho_Compte',
				fieldSeparator: ';'
			},
		],
	} );
} );

//*****************************************import_zoho_contact*************************** */
$(document).ready(function() {
	$('#import_zoho_contact').DataTable( {
		"scrollX": true,
		"processing": true,
		"ajax" : {
			"url":"serverSide/import_zoho_contact.php",
			"dataSrc" : ""
		},
		"columns" : [
			{"data":"Salutation"},
			{"data":"Salutation Emails"},
			{"data":"First Name"},
			{"data":"Last Name"},
			{"data":"Preferred Language"},
			{"data":"Mobile"},
			{"data":"Phone"},
			{"data":"Email"},
			{"data":"Other Street"},
			{"data":"Other Zip"},
			{"data":"Other City"},
			{"data":"Province (BE)"},
			{"data":"Account Name"},
			{"data":"Lead Status"},
			{"data":"Acheteur"},
			{"data":"Vendeur"},
			{"data":"Prospect Source"},
			{"data":"Converting Agent"},
			{"data":"Source list name"},
			{"data":"Vendor Assessment Notes"},
			{"data":"New Import"},
			{"data":"Contact Owner"},
			{"data":"Business Finder Name"},
			{"data":"Home Phone"},
			{"data":"Secondary Email"},
			{"data":"Mandataire"},
			{"data":"Mail du commentaire"},
			{"data":"Description"},
		],
		dom: 'Bfrtip',
		buttons: [
			$.extend( true, {}, breakLine(27), {
				extend: 'excel',
				title: '',
				filename: 'import zoho contact',
				text: 'EXCEL Import_Zoho_Contact',
            }),
			$.extend( true, {}, breakLine(27), {
				extend: 'csv',
				title: 'import zoho contact',
				text: 'CSV Import_Zoho_Contact',
				fieldSeparator: ';'
            }),
		],
	} );
} );

/*****************************************************       ************************************************/


$(document).ready(function() {
	$('#outPut-Phingoo').DataTable( {
		"scrollX": true,
		"processing": true,
		"ajax" : {
			"url":"serverSide/ConnectionDataBase.php",
			"dataSrc" : ""
		},
		"columns" : [
			{"data":"last_name"},
			{"data":"Forme juridique"},
			{"data":"nace_code"},
			{"data":"nace_description"},
			{"data":"first_name"},
			{"data":"numero_entreprise"},
			{"data":"contact_position"},
			{"data":"rue"},
			{"data":"code_postal"},
			{"data":"Commune"},
			{"data":"province"},
			{"data":"website"},
			{"data":"telephone"},
			{"data":"telephone supplémentaire"},
			{"data":"Preferred Language"},
			{"data":"Nom Fichier"},
			{"data":"Date du Ficher"},
			{"data":"Lien Vers le Fichier"},
		],
		dom: 'Bfrtip',
		buttons: [
			$.extend( true, {}, breakLine(33), {
				extend: 'excel',
				title: '',
				filename: 'import Phingoo',
				text: 'EXCEL Phingoo',
            }),
			$.extend( true, {}, breakLine(33), {
				extend: 'csv',
				title: 'import Phingoo',
				text: 'CSV Phingoo',
				fieldSeparator: ';'
				
            }),
		],
	} );
} );

/********************************************* OutPutCompte *******************************************************/

$(document).ready(function() {
	$('#Edit_zoho_compte').DataTable( {
		"scrollX": true,
		"processing": true,
		select: true,
		"ajax" : {
			"url":"serverSide/import_zoho_compte.php",
			"dataSrc" : ""
		},
		"columns" : [
			{"data":"Province (BE)"},
			{"data":"Account Name"},
			{"data":"Account Number"},
			{"data":"Billing Street"},
			{"data":"Billing Code"},
			{"data":"Billing City"},
			{"data":"Billing Province (BE)"},
			{"data":"Phone (Account)"},
			{"data":"Contact Owner"},
		],
		dom: 'Bfrtip',
		buttons: [
			{
				extend: 'excel',
				title: '',
				filename: 'import zoho compte',
				text: 'EXCEL Import_Zoho_Compte',
			},
			{
				extend: 'csv',
				title: 'import zoho compte',
				text: 'CSV Import_Zoho_Compte',
				fieldSeparator: ';'
			},
			
		],
	} );
} );

























