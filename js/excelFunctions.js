




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

                            if( cell >= sheet_data[row].length ){
                                table_output += '<td> <input value="" name="' + sheet_data[0][cell] + '[]"></td>';
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
                    '           <button type="button" class="btn btn-success">Enregistrer</button>\n' +
                    '         </div>\n' +
                    '                            </div>\n' +
                    '                        </div>';

                document.getElementById('excel_data').innerHTML = table_output;
            }


            excel_file.value = '';


            //alert("START DATATABLE");

            var table = $('#dataTable').DataTable({
                "scrollX": true,
            });

            //alert("END");
        }

    });

    $('#data_import').on('submit', function (e) {

        e.preventDefault();

        alert('Enregistrement en cours');

        $.ajax({
            type: 'post',
            url: 'XXX',
            data: $('#data_import').serialize(),
            success: function () {
                alert('form was submitted');
            }
        });

    });

});