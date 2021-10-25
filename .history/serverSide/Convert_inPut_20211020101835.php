<?php
    $python_print = "tstAlert.py"; 
    $python_execution = "python ".$python_print; 
    $output= shell_exec($python_execution); 
     echo"Bien envoyé"; 
   /* header('Location: index.html');*/
?>