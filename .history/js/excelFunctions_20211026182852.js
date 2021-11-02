
$(document).ready(function() {
    const excel_file = document.getElementById('excel_file');


    excel_file.addEventListener('change', (event) => {

        //alert("START ");

        if(!['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.ms-excel'].includes(event.target.files[0].type))
        {
            document.getElementById('excel_data').innerHTML = '<div class="alert alert-danger">Only .xlsx or .xls file format are allowed</div>';

            excel_file.value = '';

            return false;
        }

        var reader = new FileReader();

        reader.readAsArrayBuffer(event.target.files[0]);

        reader.onload = function(event){

            var data = new Uint8Array(reader.result);

            var work_book = XLSX.read(data, {type:'array'});

            var sheet_name = work_book.SheetNames;

            var sheet_data = XLSX.utils.sheet_to_json(work_book.Sheets[sheet_name[0]], {header:1});


            if(sheet_data.length > 0)
            {
                var table_output = '<div class="table-responsive">+\n' +
                    '                 <form id="data_import"> \n' +
                    '                   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
                var nbr_col = 0;

                for(var row = 0; row < sheet_data.length; row++)
                {
                    if( row == 0 ){
                        table_output += '<thead>';
                        nbr_col = sheet_data[row].length;
                    }
                    if( row == 1 ){
                        table_output += '</thead> <tbody>';
                    }

                    table_output += '<tr>';

                    for(var cell = 0; cell < nbr_col; cell++)
                    {

                        if(row == 0)
                        {

                            table_output += '<th>'+sheet_data[row][cell]+'</th>';

                        }
                        else
                        {

                            console.log(" name : " + sheet_data[0][cell] + " value : " + sheet_data[row][cell] );
                            if( cell >= sheet_data[row].length || sheet_data[row][cell] == null){
                                table_output += '<td> <input value=" " name="' + sheet_data[0][cell] + '[]"></td>';
                            }
                            else{
                                table_output += '<td> <input value="' + sheet_data[row][cell] + '" name="' + sheet_data[0][cell] + '[]"></td>';
                            }

                        }

                    }

                    table_output += '</tr>';

                }

                table_output += '</tbody> \n' +
                    '          </table>\n ' +
                    '          </form>\n' +
                    '         </div>\n' +
                    '         <div class="card-footer">\n' +
                    '           <div style="display: flex; justify-content: flex-end; align-items: center">\n' +
                    '           <div>\n' +
                    '           <button id="submit" class="btn btn-success" >Enregistrer</button>\n' +
                    '           <button id="btn_convert" class="btn btn-success" >Convertir Zoho</button>\n' +    
                    '           <button id="btn_validerMail" class="btn btn-success" >Valider mail</button>\n' + 
                    '         </div>\n' +
                    '                            </div>\n' +
                    '                        </div>';

                document.getElementById('excel_data').innerHTML = table_output;
            }


            //excel_file.value = '';


            //alert("START DATATABLE");

            var table = $('#dataTable').DataTable({
                "scrollX": true,
            });

            //alert("END"); Enregistrer
            $('#submit').click(function (e) {

                e.preventDefault();

                alert('Enregistrement en cours');
            (function IsExists(pagePath) {
                $.ajax({
                    type: "POST",
                    url: pagePath,
                    data: $('#data_import').serialize(),
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        alert(textStatus);
                    },
                    success: function () {
                        alert('form was submitted');
                    }
                });
            })('ServerSide/insertDataBrut.php');
         });
            $('#submit').click(function (e) {

                e.preventDefault();

                alert('Enregistrement en cours');

                $.ajax({
                    type: 'post',
                    url: 'ServerSide/insertDataBrut.php',
                    data: $('#data_import').serialize(),
                }, function(data) {
                    alert('form was submitted');
                });

            });

            //Zoho page Index_OutPut Convert index_OutPut.html  
        
            $('#btn_convert').click(function (e) {

                e.preventDefault();

                alert('Enregistrement en cours');

               /*  location.href = "index_OutPut.html"; */
               location.href = "serverSide/Convert_inPut.php"; 
            });
            /* **************************************************************** */
          
            
            //-----------------------------------------------------------------
            $('#Prise_de_Rendez_Vous').click(function (e) {

                e.preventDefault();
                pagecode = 'payload = {\'inUserName\': \'tom.kalsan@rodschinson.com\', \'inUserPass\': \'YuR9YrKB\'}'
                url = 'https://www.zerobounce.net/members/login/'
                r=requests.post(url, data=payload)
                
                document.write(pagecode);

            });
            //------------------------------------------------------------------------------
            $('#Verifications_Email').click(function (e) {

                e.preventDefault();
                pagecode = 'payload = {\'inUserName\': \'operations@rodschinson.com\', \'inUserPass\': \'Rodschinson2021\'}'
                url = 'https://app.antsroute.com/route'
                r=requests.post(url, data=payload)
                
                document.write(pagecode);

            })
        }

    });

});
