<?php
    $python_print = "test.py"; 
    $python_execution = "python ".$python_print; 
    $output= shell_exec($python_execution); 
    echo $output; 
?>