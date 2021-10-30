<?php
    /* $python_print = "OpenMail.py"; 
    $python_execution = "python ".$python_print; 
    $output= shell_exec($python_execution); 
     echo"Bien envoyé"; 
     echo $output; */
     include 'PHPExcel/IOFactory.php';
  $inputFileType = 'Excel5';
  $inputFileName = 'MyExcelFile.xls';

  $objReader = PHPExcel_IOFactory::createReader($inputFileType);
  $objPHPExcel = $objReader->load($inputFileName);

  $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'HTML');
  $objWriter->save('php://output');
  exit;
   /* header('Location: index.html');*/
?>