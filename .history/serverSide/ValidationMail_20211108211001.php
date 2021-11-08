<?php
    $python_print = "verificationVF.py"; 
    $python_execution = "python ".$python_print; 
    $output= shell_exec($python_execution);
     //echo"Bien envoyé"; 
     echo $output;
   /* header('Location: index.html');*/
?>