
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

	$(document).ready(function() {
		$('#outPut-detail').DataTable( {
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
			]
			 
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
		]
		 
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
		{"data":"Phone (Account)"},
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