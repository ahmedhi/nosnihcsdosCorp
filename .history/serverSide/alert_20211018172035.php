<?php
    $python_print = "script_email/Test.py"; 
    $python_execution = "python ".$python_print; 
    $output= shell_exec($python_execution); 
    echo"Bien envoyé";
?>