let editor;
$(document).ready(function() {
    // EDIT OT DELETE
    editor = new $.fn.dataTable.Editor({
      ajax: {
        url: "serverSide/ActionEditDelete.php",
      },
      //ajax: "serverSide/ActionEditDelete.php",
      table: "#Confirm_mail",
      serverSide:true,			
	  	serverMethod: 'post',	
      idSrc:  'id',
      fields: [
          {
            label: "id",
            name: "id",
            type:"hidden",
          },
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
          label: "Billing Province (BE)",
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

    // GET DATA
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
    /* $('#sample_data').on('draw.dt', function(){
        $('#sample_data').Tabledit({
         url:'action.php',
         dataType:'json',
         columns:{
          identifier : [0, 'id'],
          editable:[[1, 'first_name'], [2, 'last_name'], [3, 'gender', '{"1":"Male","2":"Female"}']]
         },
         restoreButton:false,
         onSuccess:function(data, textStatus, jqXHR)
         {
          if(data.action == 'delete')
          {
           $('#' + data.id).remove();
           $('#sample_data').DataTable().ajax.reload();
          }
         }
        });
       }); */
} );