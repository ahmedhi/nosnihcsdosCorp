$(document).ready(function(){

    // DataTable
    var userDataTable = $('#userTable').DataTable({
       'processing': true,
       'serverSide': true,
       'serverMethod': 'post',
       'ajax': {
          'url':'serverSide/ConnectionValidateMail.php'
       },
       'columns': [
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
       ]
    });
  
    // Update record
    $('#userTable').on('click','.updateUser',function(){
       var id = $(this).data('id');
  
       $('#txt_userid').val(id);
  
       // AJAX request
       $.ajax({
          url: 'serverSide/ConnectionValidateMail.php',
          type: 'post',
          data: {request: 2, id: id},
          dataType: 'json',
          success: function(response){
             if(response.status == 1){
  
               $('#name').val(response.data.name);
               $('#email').val(response.data.email);
               $('#gender').val(response.data.gender);
               $('#city').val(response.data.city);
  
               userDataTable.ajax.reload();
             }else{
               alert("Invalid ID.");
             }
          }
       });
  
    });
  
    // Save user 
    $('#btn_save').click(function(){
       var id = $('#txt_userid').val();
  
       var name = $('#name').val().trim();
       var email = $('#email').val().trim();
       var gender = $('#gender').val().trim();
       var city = $('#city').val().trim();
  
       if(name !='' && email != '' && city != ''){
  
         // AJAX request
         $.ajax({
           url: 'serverSide/ConnectionValidateMail.php',
           type: 'post',
           data: {request: 3, id: id,name: name, email: email, gender: gender, city: city},
           dataType: 'json',
           success: function(response){
              if(response.status == 1){
                 alert(response.message);
  
                 // Empty and reset the values
                 $('#name','#email','#city').val('');
                 $('#gender').val('male');
                 $('#txt_userid').val(0);
  
                 // Reload DataTable
                 userDataTable.ajax.reload();
  
                 // Close modal
                 $('#updateModal').modal('toggle');
              }else{
                 alert(response.message);
              }
           }
        });
  
      }else{
         alert('Please fill all fields.');
      }
    });
  
    // Delete record
    $('#userTable').on('click','.deleteUser',function(){
       var id = $(this).data('id');
  
       var deleteConfirm = confirm("Are you sure?");
       if (deleteConfirm == true) {
          // AJAX request
          $.ajax({
            url: 'serverSide/ConnectionValidateMail.php',
            type: 'post',
            data: {request: 4, id: id},
            success: function(response){
               if(response == 1){
                  alert("Record deleted.");
  
                  // Reload DataTable
                  userDataTable.ajax.reload();
               }else{
                  alert("Invalid ID.");
               }
            }
          });
       } 
  
    });
  });