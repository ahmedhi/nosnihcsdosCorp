let editor;
$(document).ready(function() {
    // EDIT OT DELETE
    editor = new $.fn.dataTable.Editor({
      
      //ajax: "serverSide/ActionEditDelete.php",
      ajax: "serverSide/staff.php",
      table: "#Confirm_mail",
      idSrc:  'DT_RowId', 
      fields: [{
            label: "DT_RowId",
            name: "DT_RowId",
            type:"hidden"
          },{                                             
            label: "Nom",
            name: "nom"
          }
          ,{                                             
            label: "Prenom",
            name: "prenom"
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
        url: "serverSide/ConnectionValidateMail.php",
       //url: "serverSide/staff.php",
        dataSrc: "",
      },
      order: [[ 1, 'asc' ]], //added 
      //select: true,
      columns: [
        {
          data: null,
          defaultContent: "",
          className: "select-checkbox",
          orderable: false,
        },
          { data: "nom" },
          { data: "prenom" },
          { data: "telephone" }, 
          { data: "adresse" },
          { data: "ville" },
          { data: "code_postal" },
          { data: "statut" },
          { data: "agent" }, 
          { data: "campagne" },
          { data: "liste_appel" },
          { data: "date_appel" },
          { data: "forme_juridique" },
          { data: "nace_code" },
          { data: "nace_description" },
          { data: "contact_position" },
          { data: "numero_entreprise" },
          { data: "province" },
          { data: "website" },
          { data: "sexe" },
          { data: "mail_direct" },
          { data: "mail_general" },
          { data: "gsm" },
          { data: "tel_direct" },
          { data: "commentaire_appel" },
          { data: "prenom2" },
          { data: "nom2" }
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