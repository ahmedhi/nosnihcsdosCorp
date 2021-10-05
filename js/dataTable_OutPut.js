
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
			"processing": true,
			"serverSide": true,
			"ajax": "..serverSide/ConnectionDataBase.php",
			"columns" : [
				{"data":"id"},
				{"data":"name"},
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