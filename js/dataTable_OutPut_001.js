
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

//Fonction ajax fichier php
$(document).ready(function() {
	$('#outPutdata-detail').DataTable( {
		"scrollX": true,


		"ajax" : {
			"url":"serverSide/ConnectionDataBase_001.php",
			"dataSrc" : ""
		},
	

		"columns" : [
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
			{"data":"FAX"},
			{"data":"Account Name"},
			{"data":"Account Number"},
			{"data":"Identifiant Source"},
			{"data":"Pays"},
			{"data":"Billing Code"},
			{"data":"Région"},	
			{"data":"Billing City"},
			{"data":"Billing Province"},
			{"data":"Billing Street"},
			{"data":"Trading Name"},
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
			{"data":"Bénéfice avant impôts"},
			{"data":"Total des immobilisations"},
			{"data":"Total des actifs courants"},
			{"data":"Total des passifs courants"},
			{"data":"Total des passifs à long terme"},
			{"data":"Fonds d'actionnaires"},
			{"data":"Fonds de roulement"},
			{"data":"Ratio de liquidité général"},
			{"data":"Marge bénéficiaire avant impôt"},
			{"data":"Return on Total Assets Employed"},
			{"data":"Ratio d'endettement total"},
			{"data":"Ratio d'endettement"},
			{"data":"Capital social"},
			{"data":"Forme juridique"},
			{"data":"Dirigeant 1 Nom"},
			{"data":"Dirigeant 1 Prénom"},
			{"data":"Dirigeant 1 date de naissance"},
			{"data":"Dirigeant 1 Fonction"},
			{"data":"Dirigeant 1 Date de fonction"},

			{"data":"Dirigeant 2 Nom"},
			{"data":"Dirigeant 2 Prénom"},
			{"data":"Dirigeant 2 date de naissance"},
			{"data":"Dirigeant 2 Fonction"},
			{"data":"Dirigeant 2 Date de fonction"},

			{"data":"Dirigeant 3 Nom"},
			{"data":"Dirigeant 3 Prénom"},
			{"data":"Dirigeant 3 Fonction"},
			{"data":"Dirigeant 3 Date de fonction"},
			
			
			

			{"data":"Dirigeant 4 Nom"},
			{"data":"Dirigeant 4 Prénom"},
			{"data":"Dirigeant 3 date de naissance"},
			{"data":"Dirigeant 4 date de naissance"},
			{"data":"Dirigeant 4 Fonction"},
			{"data":"Dirigeant 4 Date de fonction"},

			{"data":"Dirigeant 5 Nom"},
			{"data":"Dirigeant 5 Prénom"},
			{"data":"Dirigeant 5 date de naissance"},
			{"data":"Dirigeant 5 Fonction"},
			{"data":"Dirigeant 5 Date de fonction"},

			{"data":"Dirigeant 6 Nom"},
			{"data":"Dirigeant 6 Prénom"},
			{"data":"Dirigeant 6 date de naissance"},
			{"data":"Dirigeant 6 Fonction"},
			{"data":"Dirigeant 6 Date de fonction"},

			{"data":"Dirigeant 7 Nom"},
			{"data":"Dirigeant 7 Prénom"},
			{"data":"Dirigeant 7 date de naissance"},
			{"data":"Dirigeant 7 Fonction"},
			{"data":"Dirigeant 7 Date de fonction"},

			{"data":"Dirigeant 8 Nom"},
			{"data":"Dirigeant 8 Prénom"},
			{"data":"Dirigeant 8 date de naissance"},
			{"data":"Dirigeant 8 Fonction"},
			{"data":"Dirigeant 8 Date de fonction"},

			{"data":"Dirigeant 9 Nom"},
			{"data":"Dirigeant 9 Prénom"},
			{"data":"Dirigeant 9 date de naissance"},
			{"data":"Dirigeant 9 Fonction"},
			{"data":"Dirigeant 9 Date de fonction"},

			{"data":"Dirigeant 10 Nom"},
			{"data":"Dirigeant 10 Prénom"},
			{"data":"Dirigeant 10 date de naissance"},
			{"data":"Dirigeant 10 Fonction"},
			{"data":"Dirigeant 10 Date de fonction"},


			{"data":"Nom Fichier"},
			{"data":"Date du Ficher"},
			{"data":"Lien Vers le Fichier"},
		],
		dom: 'Bfrtip',
		buttons: [
			{
				extend: 'excel',
				text: 'EXCEL Import',
			},
			{
				extend: 'csv',
				text: 'CSV Import',
			},

		],
		
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