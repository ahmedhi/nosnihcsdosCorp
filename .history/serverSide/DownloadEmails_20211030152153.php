<?php
    $file = "data_input.xlsx";
    // define file $mime type here
    $mime = "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet";
    ob_end_clean(); // this is solution
    header('Content-Description: File Transfer');
    header('Content-Type: ' . $mime);
    header("Content-Transfer-Encoding: Binary");
    header("Content-disposition: attachment; filename=\"" . basename($file) . "\"");
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    readfile($file);
?>