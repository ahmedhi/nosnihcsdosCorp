<?php
    $python_print = "Test.py"; 
    $python_execution = "python ".$python_print; 
    $output= shell_exec($python_execution); 
    header('Location: nosnihcsdosCorp/index.html');
?>