let editor;
$(document).ready(function() {
    // EDIT OT DELETE
    editor = new $.fn.dataTable.Editor({
      
      //ajax: "serverSide/ActionEditDelete.php",
      ajax: "serverSide/staff.php",
      table: "#Confirm_mail",
      idSrc:  'ID', 
      fields: [{
            label: "ID",
            name: "ID",
            type:"hidden"
          },{                                             
            label: "Nom",
            name: "nom"
          },{
            label: "Telephone",
            name: "telephone"
          },{
            label: "Adresse",
            name: "adresse"
          },{
            label: "Ville",
            name: "ville"
          },{
            label: "Code Postal",
            name: "code_postal"
          },{
            label: "Statut",
            name: "statut"
          },{
            label: "Agent",
            name: "agent"
          },{
            label: "Campagne",
            name: "campagne"
          },{
          label: "Liste Appel",
          name: "liste_appel"
        },{
          label: "Date Appel",
          name: "date_appel"
        },{
          label: "Forme Juridique",
          name: "forme_juridique"
        },{
          label: "Nace Code",
            name: "nace_code"
          },{
            label: "Nace Description",
            name: "nace_description"
          },{
            label: "Contact Position",
            name: "contact_position"
          },{
            label: "Numero Entreprise",
            name: "numero_entreprise"
          },{
            label: "Province",
            name: "province"
          },{
            label: "Website",
            name: "website"
          },{
            label: "Sexe",
            name: "sexe"
          },{
            label: "Mail Direct",
            name: "mail_direct"
          },{
            label: "Mail General",
            name: "mail_general"
          },{
            label: "Gsm",
            name: "gsm"
          },{
            label: "Tel Direct",
            name: "tel_direct"
          },{
            label: "Commentaire Appel",
            name: "commentaire_appel"
          },{
            label: "Prenom Inter",
            name: "prenom2"
          },{
            label: "Nom Inter",
            name: "nom2"
          }
        ]
      });
      // GET DATA
      let myTable = $("#Confirm_mail").DataTable({
      scrollX: true,
      processing: true,
      ajax: {
        url: "serverSide/ConnectionDataBase.php",
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
        { data: "Contact_Owner" },
        { data: "Contact_Owner" },
        { data: "Contact_Owner" },
        { data: "Contact_Owner" },
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