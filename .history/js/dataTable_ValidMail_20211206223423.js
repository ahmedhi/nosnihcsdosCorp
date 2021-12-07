let editor;
$(document).ready(function() {
    // editor = new $.fn.dataTable.Editor( {
    //     ajax: "../php/staff.php",
    //     table: "#example",
    //     fields: [ {
    //             label: "First name:",
    //             name: "first_name"
    //         }, {
    //             label: "Last name:",
    //             name: "last_name"
    //         }, {
    //             label: "Position:",
    //             name: "position"
    //         }, {
    //             label: "Office:",
    //             name: "office"
    //         }, {
    //             label: "Extension:",
    //             name: "extn"
    //         }, {
    //             label: "Start date:",
    //             name: "start_date",
    //             type: "datetime"
    //         }, {
    //             label: "Salary:",
    //             name: "salary"
    //         }
    //     ]
    // } );

    $('#Confirm_mail').on( 'click', 'tbody td:not(:first-child)', function (e) {
        editor.inline( this );
    } );
   
	 $("#Confirm_mail").DataTable({
     scrollX: true,
     processing: true,
     ajax: {
       url: "serverSide/import_zoho_compte.php",
       dataSrc: "",
     },
     columns: [
       {
         data: null,
         defaultContent: "",
         className: "select-checkbox",
         orderable: false,
       },
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
     select: {
       style: "os",
       selector: "td:first-child",
     },
     dom: "Bfrtip",
     buttons: [
       {
         extend: "excel",
         title: "",
         filename: "import zoho compte",
         text: "EXCEL Import_Zoho_Compte",
       },
       {
         extend: "csv",
         title: "import zoho compte",
         text: "CSV Import_Zoho_Compte",
         fieldSeparator: ";",
       },
     ],
   });
} );