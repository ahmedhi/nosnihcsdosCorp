$(document).ready(function() {
    var editor; 
	 editor = $('#Confirm_mail').DataTable( {
	 editor = new $.fn.dataTable.Editor( {
		"scrollX": true,
		"processing": true,
		"ajax" : {
			"url":"serverSide/ConnectionValidateMail.php",
			"dataSrc" : ""
		},
		"columns" : [
			{"data":"nom"},
			{"data":"prenom"},
			{"data":"telephone"},
			{"data":"adresse"},
			{"data":"ville"},
			{"data":"code_postal"},
			{"data":"statut"},
			{"data":"agent"},
			{"data":"campagne"},
			{"data":"liste_appel"},
			{"data":"date_appel"},
			{"data":"forme_juridique"},
			{"data":"nace_code"},
			{"data":"nace_description"},
			{"data":"contact_position"},
			{"data":"numero_entreprise"},
			{"data":"province"},
			{"data":"website"},
			{"data":"sexe"},
			{"data":"mail_direct"},
			{"data":"mail_general"},
			{"data":"gsm"},
			{"data":"tel_direct"},
			{"data":"commentaire_appel"},
			{"data":"prenom2"},
			{"data":"nom2"},
			{"data":"mail_statut"},
		],
    "aaSorting": [
      [26, "asc"]
    ],
    "fnRowCallback": function(row, aData, iDisplayIndex, iDisplayIndexFull) {
      if (aData[26] == "Non valid") {
        $('td', row).css('background-color', '#E6C3C3');
      } else if (aData[26] == "Valid") {
        $('td', row).css('background-color', '#69E495');
      }
    },
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
        { extend: "edit",
           editor: editor },
    ],
	}),
     });
} );