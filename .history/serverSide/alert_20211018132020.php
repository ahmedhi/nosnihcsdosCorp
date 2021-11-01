<?php
$command = escapeshellcmd('script_email/alert.py');
    $output = shell_exec($command);
    echo $output;
?>