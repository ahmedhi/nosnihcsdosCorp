<?php
    $python_print = "script.py"; 
    $python_execution = "python3 ".$python_print; 
    $output= shell_exec($python_execution);
     echo $output;
?>