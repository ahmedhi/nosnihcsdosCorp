let editor;
$(document).ready(function() {
    // EDIT OT DELETE
    editor = new $.fn.dataTable.Editor({
      
      //ajax: "serverSide/ActionEditDelete.php",
      ajax: "serverSide/staff.php",
      table: "#Confirm_mail",
      idSrc:  'id', 
      fields: [{
            label: "id",
            name: "id",
            type:"hidden"
          },{                                             
            label: "Salutation",
            name: "Salutation"
          },{
            label: "Salutation Emails",
            name: "Salutation Emails"
          },{
            label: "First Name",
            name: "First Name"
          },{
            label: "Last Name",
            name: "Last Name"
          },{
            label: "Preferred Language",
            name: "Preferred Language"
          },{
            label: "Mobile",
            name: "Mobile"
          },{
            label: "Phone",
            name: "Phone"
          },{
            label: "Email",
            name: "Email"
          },{
            label: "Other Street",
            name: "Other Street"
          },{
            label: "Other Zip",
            name: "Other Zip"
          },{
            label: "Other City",
            name: "Other City"
          },{
            label: "Province (BE)",
            name: "Province (BE)"
          },{
            label: "Account Name",
            name: "Account Name"
          },{
            label: "Account Number",
            name: "Account Number"
          },{
            label: "Billing Street",
            name: "Billing Street"
          },{
            label: "Billing Code",
            name: "Billing Code"
          },{
            label: "Billing City",
            name: "Billing City"
          },{
            label: "Billing Province (BE)",
            name: "Billing Province (BE)"
          },{
            label: "Phone (Account)",
            name: "Phone (Account)"
          },{
            label: "Lead Status",
            name: "Lead Status"
          },{
            label: "Acheteur",
            name: "Acheteur"
          },{
            label: "Vendeur",
            name: "Vendeur"
          },{
            label: "Prospect Source",
            name: "Prospect Source"
          },{
            label: "Converting Agent",
            name: "Converting Agent"
          },{
            label: "Source list name",
            name: "Source list name"
          },{
            label: "Vendor Assessment Notes",
            name: "Vendor Assessment Notes"
          },{
            label: "New Import",
            name: "New Import"
          },{
            label: "Contact Owner",
            name: "Contact Owner"
          },{
            label: "Business Finder Name",
            name: "Business Finder Name"
          },{
            label: "Home Phone",
            name: "Home Phone"
          },{
            label: "Secondary Email",
            name: "Secondary Email"
          },{
            label: "Mandataire",
            name: "Mandataire"
          },{
            label: "Mail du commentaire",
            name: "Mail du commentaire"
          },{
            label: "Description",
            name: "Description"
          }
        ]
      });
      // GET DATA
      let myTable = $("#Confirm_mail").DataTable({
      scrollX: true,
      processing: true,
      ajax: {
        url: "serverSide/Import_Zoho_Compte.php",
       //url: "serverSide/staff.php",
        dataSrc: "",
      },
      columns: [
        {
          data: null,
          defaultContent: "",
          className: "select-checkbox",
          orderable: false,
        },
        { data: "Province_BE" },
        { data: "Account_Name" },
        { data: "Account_Number" },
        { data: "Billing_Street" },
        { data: "Billing_Code" },
        { data: "Billing_City" },
        { data: "Billing_Province_BE" },
        { data: "Phone_Account" },
        { data: "Contact_Owner" }
      ],
      select: {
        style: "os",
        selector: "td:first-child",
      },
      //select: true,
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
        {
          extend: "edit",
          editor: editor,
          text: "Modifier",
          formTitle: "Modifier l'enregistrementfier ",
          formButtons: ["Modifier"],
        },
        {
          extend: "remove",
          editor: editor,
          text: "Supprimer",
          formTitle: "Supprimer l'enregistrement",
          formButtons: ["Supprimer"],
          formMessage: "Etes-vous sûr de vouloir supprimer la ligne",
        },
      ],
    });
} );