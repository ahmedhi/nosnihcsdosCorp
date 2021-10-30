<?php
    try {
        if (file_exists($file)) {
            // define file $mime type here
            $file = "data_input.xlsx";
            // define file $mime type here
            $mime = "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet";
            ob_clean(); // this is solution
            header('Content-Description: File Transfer');
            header('Content-Type: ' . $mime);
            header("Content-Transfer-Encoding: Binary");
            header("Content-disposition: attachment; filename=\"" . basename($file) . "\"");
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            readfile($file);
            return;
        }
        throw new Exception("File not found a Mouhcine");
    } catch (Exception $e) {
        if ($e->getMessage() == "File not found a Mouhcine") {
            http_response_code(404); // This is for an exception thrown in 'other code' (not displayed)
            header("Content-Type: application/json");
            echo json_encode(array("data" => $e->getMessage(), "success" => false));
        }
    }
?>