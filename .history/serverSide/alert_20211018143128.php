<?php
    $python_print = "Test.py"; 
    $python_execution = "python ".$python_print; 
    $output= shell_exec($python_execution); 
    echo"Bien envoyé";
    location.href = "index.html"; 
    header('Location: index.html');
?>