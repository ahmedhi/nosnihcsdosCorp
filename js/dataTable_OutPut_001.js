
/* $(document).ready(function() {
    $('#outPut-detail').DataTable({
		
		"ajax" : {
			"url":"serverSide/ConnectionDataBase.php",
			"dataSrc" : ""
		},
    	"columns" : [
		{"data":"id"},
		{"data":"name"},
		]
	  })
	}); */

<<<<<<< HEAD
//Fonction ajax fichier php
	$(document).ready(function() {
		$('#outPutdata-detail').DataTable( {
			"scrollX": true,
			
			
=======
	$(document).ready(function() {
		$('#outPut-detail').DataTable( {
			"scrollX": true,
>>>>>>> ahmedhi
				"ajax" : {
				"url":"serverSide/ConnectionDataBase.php",
				"dataSrc" : ""
			},
			"columns" : [
<<<<<<< HEAD
			{"data":"DIVISION"},
			{"data":"Salutation"},
			{"data":"Salutaion email"},
			{"data":"First Name"},
			{"data":"Last Name"},
			{"data":"Sexe"},
			{"data":"EMAIL"},
			{"data":"Preferred Language"},
			{"data":"Phone Account"},
			{"data":"Mobile"},
			{"data":"Fax"},
			{"data":"Account Name"},
			{"data":"Account Number"},
			{"data":"Identifiant Source"},
			{"data":"Pays"},
			{"data":"Billing Code"},
			{"data":"Région"},
			{"data":"Billing City"},
			{"data":"Billing Province"},
			{"data":"Billing Street"},
			{"data":"Tranding Name"},
			{"data":"Code d'activité"},
			{"data":"RSZ1"},
			{"data":"RSZ2"},
			{"data":"RSZ3"},
			{"data":"SECTION"},
			{"data":"Description"},
			{"data":"VAT Number"},
			{"data":"Date d'immatriculation"},
			{"data":"Site Internet"},
			{"data":"Score de solvabilité"},
			{"data":"Definition du score"},
			{"data":"Score international"},
			{"data":"Limite de crédit"},
			{"data":"Catégorie juridique"},
			{"data":"Employés"},
			{"data":"Devise"},
			{"data":"Chiffres d'affaires"},
			{"data":"Bénéfices"},
			{"data":"Bénéfice avant impôts "},
			{"data":"Total des immobilisations"},
			{"data":"Total des actifs courants"},
			{"data":"Total des passifs courants"},
			{"data":"Total des passifs a long terme"},
			{"data":"Fonds d'actionnaires"},
			{"data":"Fond de roulement"},
			{"data":"Ratio de liquidité général"},
			{"data":"Marge bénéficiaire avant impôt"},
			{"data":"Return on total Assests Employed"},
			{"data":"Ratio d'endettement total"},
			{"data":"Ratio d'endettement"},
			{"data":"Capital social"},
			{"data":"Forme juridique"},
			{"data":"Dirigeant 1 Nom"},
			{"data":"Dirigeant 1 Prénom"},
			{"data":"Dirigeant 1 date de naissance"},
			{"data":"Dirigeant 1 Fonction"},
			{"data":"Dirigeant 1 Date de Fonction"},
			{"data":"Dirigeant 2 Nom"},
			{"data":"Dirigeant 2 Prénom"},
			{"data":"Dirigeant 2 Date de naissance"},
			{"data":"Dirigeant 2 Fonction"},
			{"data":"Dirigeant 2 Date de Fonction"},
			{"data":"Dirigeant 3 Nom"},
			{"data":"Dirigeant 3 Prénom"},
			{"data":"Dirigeant 3 Fonction"},
			{"data":"Dirigeant 3 Date Fonction"},
			{"data":"Dirigeant 4 Nom"},
			{"data":"Dirigeant 4 Prénom"},
			{"data":"Dirigeant 3 date de naissance"},
			{"data":"Dirigeant 4 date de naissance"},
			{"data":"Dirigeant 4 Fonction"},
			{"data":"Dirigeant 4 Date de Fonction"},
			{"data":"Dirigeant 5 Nom"},
			{"data":"Dirigeant 5 Prénom"},
			{"data":"Dirigeant 5 Date de naissance"},
			{"data":"Dirigeant 5 Fonction"},
			{"data":"Dirigeant 5 Date de Fonction"},
			{"data":"Dirigeant 6 Nom"},
			{"data":"Dirigeant 6 Prénom"},
			{"data":"Dirigeant 6 Date Fonction"},
			{"data":"Dirigeant 6 Date de naissance"},
			{"data":"Dirigeant 6  Fonction"},
			{"data":"Dirigeant 6 Date de Fonction"},
			{"data":"Dirigeant 7 Nom"},
			{"data":"Dirigeant 7 Prénom"},
			{"data":"Dirigeant 7 Date Fonction"},
			{"data":"Dirigeant 7 Date de naissance"},
			{"data":"Dirigeant 7 Fonction"},
			{"data":"Dirigeant 7 Date de Fonction"},
			{"data":"Dirigeant 8 Nom"},
			{"data":"Dirigeant 8 Prénom"},
			{"data":"Dirigeant 8 Date Fonction"},
			{"data":"Dirigeant 8 Date de naissance"},
			{"data":"Dirigeant 8 Fonction"},
			{"data":"Dirigeant 8 Date de Fonction"},
			{"data":"Dirigeant 9 Nom"},
			{"data":"Dirigeant 9 Prénom"},
			{"data":"Dirigeant 9 Date Fonction"},
			{"data":"Dirigeant 9 Date de naissance"},
			{"data":"Dirigeant 9 Fonction"},
			{"data":"Dirigeant 9 Date de Fonction"},
			{"data":"Dirigeant 10 Nom"},
			{"data":"Dirigeant 10 Prénom"},
			{"data":"Dirigeant 10 Date de naissance"},
			{"data":"Dirigeant 10 Fonction"},
			{"data":"Dirigeant 10 Date Fonction"},
			{"data":"Nom du Fichier"},
			{"data":"Date du Fichier"},
			{"data":"Lien vers Le fichier"},
			]
			 
		} );
	} );
/* 
$('#submit').click(function (e) {

	e.preventDefault();

	alert('Enregistrement en cours');

	$.ajax({
		type: 'get',
		url: 'serverSide/ConnectionDataBase.php',
		"columns" : [
			{"data":"id"},
			{"data":"name"},
			],
		success: function () {
			alert('form was submitted');
		}
	});

}); */
=======
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
					{
						extend: 'excel',
						text: 'EXCEL Import_Zoho_All',
					},
					{
						extend: 'csv',
						text: 'CSV Import_Zoho_All',
					},
			],
			filename:'Import Zoho'
			
		} );
	} );
//*******************************import_zoho_compte************************************* */

$(document).ready(function() {
	$('#import_zoho_compte').DataTable( {
		"scrollX": true,
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
				text: 'EXCEL Import_Zoho_Compte',
			},
			{
				extend: 'csv',
				text: 'CSV Import_Zoho_Compte',
			},
			
		],
	} );
} );

//*****************************************import_zoho_contact*************************** */
$(document).ready(function() {
	$('#import_zoho_contact').DataTable( {
		"scrollX": true,
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
			{
				extend: 'excel',
				text: 'EXCEL Import_Zoho_Contact',
			},
			{
				extend: 'csv',
				text: 'CSV Import_Zoho_Contact',
			},
		],
	} );
} );















>>>>>>> ahmedhi
