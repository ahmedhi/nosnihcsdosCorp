<?php
    $file = "data_input.xlsx";
    try {
        if (file_exists($file)) {
            // define file $mime type here
            $mime = "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet";
            ob_end_clean(); // this is solution
            header('Content-Description: File Transfer');
            header('Content-Type: ' . 'application/json; charset=utf-8');
            header("Content-Transfer-Encoding: Binary");
            header("Content-disposition: attachment; filename=\"" . basename($file) . "\"");
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            $processedFile = readfile($file);
            echo json_encode(array("data" => $processedFile, "success" => true, "status" => "200"));
            return;
        }
        throw new Exception("File not found a Mouhcine");
    } catch (Exception $e) {
        if ($e->getMessage() == "File not found a Mouhcine") {
            http_response_code(404); // This is for an exception thrown in 'other code' (not displayed)
            header("Content-Type: application/json");
            echo json_encode(array("data" => $e->getMessage(), "success" => false, "status" => ));
        }
    }
?>