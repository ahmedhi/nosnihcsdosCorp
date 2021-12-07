let editor;
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor({
      ajax: "serverSide/import_zoho_compte.php",
      table: "#Confirm_mail",
      idSrc:  'Account Name',
      fields: [
        {
          label: "Province (BE)",
          name: "Province (BE)",
        },
        {
          label: "Account Name",
          name: "Account Name",
        },
        {
          label: "Account Number",
          name: "Account Number",
        },
        {
          label: "Billing Street",
          name: "Billing Street",
        },
        {
          label: "Billing Code",
          name: "Billing Code",
        },
        {
          label: "Billing City",
          name: "Billing City",
        },
        {
          data: "Billing Province (BE)",
          name: "Billing Province (BE)",
        },
        {
          label: "Phone (Account)",
          name: "Phone (Account)",
        },
        {
          label: "Contact Owner",
          name: "Contact Owner",
        },
      ],
    });

   /*  $('#Confirm_mail').on( 'click', 'tbody td:not(:first-child)', function (e) {
        editor.inline( this );
    } ); */
   
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
       { data: "Province (BE)" },
       { data: "Account Name" },
       { data: "Account Number" },
       { data: "Billing Street" },
       { data: "Billing Code" },
       { data: "Billing City" },
       { data: "Billing Province (BE)" },
       { data: "Phone (Account)" },
       { data: "Contact Owner" },
     ],
     select: {
       style: "os",
       selector: "td:first-child",
     },
     select: true,
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
       { extend: "edit", editor: editor, text: 'Modifier' },
       { extend: "remove", editor: editor },
     ],
   });
} );