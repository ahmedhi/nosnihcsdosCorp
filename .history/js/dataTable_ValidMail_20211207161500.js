let editor;
$(document).ready(function() {

	let myTable = $("#Confirm_mail").DataTable({
     scrollX: true,
     processing: true,
     ajax: {
       url: "serverSide/import_zoho_compte.php",
       dataSrc: "",
     },
     columns: [
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