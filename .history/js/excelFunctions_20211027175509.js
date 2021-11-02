    const displayHeaderData = (sheet_data) => {
        const nbr_col = sheet_data[0].length;
        let header = '';
        for(let cell = 0; cell < nbr_col; cell++) {
            header += '<th>'+sheet_data[0][cell]+'</th>';
        }
        return header;
    }

const initiateTableDisplay = (sheet_data) => {
    let table_output = '<div id="imported_table" class="table-responsive">\n' +
                            '<form id="data_import"> \n' +
                                '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
    table_output += '<thead> \n';
    table_output += displayHeaderData(sheet_data);
    table_output += '</thead> \n' +
                    '<tbody> \n' +
                    '</tbody> \n' +
                '</table>\n ' +
            '</form>\n' +
        '</div>\n' +
        '<div class="card-footer">\n' +
            '<div style="display: flex; justify-content: flex-end; align-items: center">\n' +
                '<div>\n' +
                    '<button id="submit" class="btn btn-success" >Enregistrer</button>\n' +
                    '<button id="btn_convert" class="btn btn-success" >Convertir Zoho</button>\n' +    
                    '<button id="btn_validerMail" class="btn btn-success" >Valider mail</button>\n' + 
                '</div>\n' +
            '</div>\n' +
        '</div>';
    document.getElementById('excel_data').innerHTML = table_output;
}

const displayContentData = (sheet_data) => {
    const nbr_col = sheet_data[0].length;
    let tableRows = '';
    for(let row = 1; row < sheet_data.length; row++) {
        tableRows += '<tr>';
        for(let cell = 0; cell < nbr_col; cell++) {
            if(sheet_data[row][cell] == null){
                tableRows += `<td> <input value="" name="${sheet_data[0][cell]}[]"></td>`;
                continue;
            }
            tableRows += `<td> <input value="${sheet_data[row][cell]}" name="${sheet_data[0][cell]}[]"></td>`;
        }
        tableRows += '</tr>'; 
    }
    return tableRows;
}

const onSubmit = () => {
    $('#submit').click(function (e) {
        e.preventDefault();
        alert('Enregistrement en cours');
        
        $.ajax({
            type: 'post',
            url: 'serverSide/insertDataBrut.php',
            data: $('#data_import').serialize(),
            success: () => {
                alert('form was submitted');
            }
        });
    });
}

const onConvert = () => {
    $('#btn_convert').click(function (e) {
        e.preventDefault();
        alert('Enregistrement en cours');
       location.href = "serverSide/Convert_inPut.php"; 
    });
}

const addRowsToExistingTable = (sheet_data) => {
    const nbr_col = sheet_data[0].length;
    const table = $('#dataTable').DataTable();

    for(let row = 1; row < sheet_data.length; row++) {
        const tableRow = [];
        for(let cell = 0; cell < nbr_col; cell++) {
            if(sheet_data[row][cell] == null){
                tableRow.push(`<input value="" name="${sheet_data[0][cell]}[]">`);
                continue;
            }
            tableRow.push(`<input value="${sheet_data[row][cell]}" name="${sheet_data[0][cell]}[]">`);
        }
        table.row.add(tableRow).draw();
    }
}

$(document).ready(function() {
    const excel_file = document.getElementById('excel_file');
    excel_file.addEventListener('change', (event) => {
        if(!['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.ms-excel'].includes(event.target.files[0].type))
        {
            document.getElementById('excel_data').innerHTML = '<div class="alert alert-danger">Only .xlsx or .xls file format are allowed</div>';
            excel_file.value = '';
            return false;
        }

        var reader = new FileReader();
        reader.readAsArrayBuffer(event.target.files[0]);
        reader.onload = function() {
            var data = new Uint8Array(reader.result);
            var work_book = XLSX.read(data, {type:'array'});
            var sheet_name = work_book.SheetNames;
            var sheet_data = XLSX.utils.sheet_to_json(work_book.Sheets[sheet_name[0]], {header:1});
            const doesTableExist = $('#imported_table').length;

            if (sheet_data.length > 0) {
                // Create table rows
                const tableRows = displayContentData(sheet_data);
                
                if (!doesTableExist) {
                    // We draw table and display header
                    initiateTableDisplay(sheet_data);

                    // Display rows if initiate table for first time
                    $("#imported_table tbody").append(tableRows);
                    $('#dataTable').DataTable({
                        scrollX: true,
                    });
                    // Declare click evenlistener
                    onSubmit();
                    // Add convert enetlistener
                    onConvert();
                } else {
                    // Display rows if table already exists
                    addRowsToExistingTable(sheet_data);
                }
            }
        }
    });
});

