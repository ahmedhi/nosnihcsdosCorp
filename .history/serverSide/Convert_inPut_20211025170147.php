<?php
    $python_print = "tstAlert.py"; 
    $python_execution = "python3".$python_print; 
    $output= shell_exec($python_execution); 
     echo"Bien envoyé"; 
     echo $output;
   /* header('Location: index.html');*/
?>