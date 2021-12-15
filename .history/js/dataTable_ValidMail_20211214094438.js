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
            label: "nom",
            name: "nom"
          },{
            label: "telephone",
            name: "telephone"
          },{
            label: "adresse",
            name: "adresse"
          },{
            label: "ville",
            name: "ville"
          },{
            label: "code_postal",
            name: "code_postal"
          },{
            label: "statut",
            name: "statut"
          },{
            label: "agent",
            name: "agent"
          },{
            label: "campagne",
            name: "campagne"
          },{
            label: "campagne",
            name: "campagne"
          },{
          label: "liste_appel",
          name: "liste_appel"
        },{
          label: "date_appel",
          name: "date_appel"
        },{
          label: "forme_juridique",
          name: "forme_juridique"
        },{
          label: "nace_code",
            name: "nace_code"
          },{
            label: "nace_description",
            name: "nace_description"
          },{
            label: "contact_position",
            name: "contact_position"
          },{
            label: "numero_entreprise",
            name: "numero_entreprise"
          },{
            label: "province",
            name: "province"
          },{
            label: "website",
            name: "website"
          },{
            label: "sexe",
            name: "sexe"
          },{
            label: "mail_direct",
            name: "mail_direct"
          },{
            label: "mail_general",
            name: "mail_general"
          },{
            label: "gsm",
            name: "gsm"
          },{
            label: "tel_direct",
            name: "tel_direct"
          },{
            label: "commentaire_appel",
            name: "commentaire_appel"
          },{
            label: "prenom2",
            name: "prenom2"
          },{
            label: "nom2",
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