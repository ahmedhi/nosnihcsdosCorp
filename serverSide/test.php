<?php

$servername = "135.148.9.103";
$username = "admin";
$password = "rod2021";
$db = "rod_output";

// Create connection
/* $conn = new mysqli($servername, $username, $password,$db);
 */                $conn = new \MySQLi($servername, $username, $password,$db);
                                                    
// Check connection

            if ($conn->connect_error) {
                echo "Failed";
        }
        else {
         /*    echo "Connection Success"; */
            print "Connection Success";
            }



$conn->close();