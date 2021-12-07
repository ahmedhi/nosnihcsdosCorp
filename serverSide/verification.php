<?php
   $servername = "135.148.9.103";
   $nomUser = "admin";
   $password = "rod@2021";
   $db = "rod_output";
   session_start();
   if (isset($_POST['username']) && isset($_POST['password'])) {
      // connexi */on à la base de données


      // Create connection
      /* $conn = new mysqli($servername, $username, $password,$db); */
      $conn = new \MySQLi($servername, $nomUser, $password, $db);

      if ($conn->connect_error) {
         error_log("Connection failed: " . $conn->connect_error, 3, "/var/tmp/succ-errors.log");
         die("Connection failed: " . $conn->connect_error);
      }

      // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
      // pour éliminer toute attaque de type injection SQL et XSS
      $username = mysqli_real_escape_string($conn, htmlspecialchars($_POST['username']));
      $password = mysqli_real_escape_string($conn, htmlspecialchars($_POST['password']));

      if ($username !== "" && $password !== "") {
         $result = mysqli_query($conn, "SELECT  count(*) FROM rod_all.utilisateur where 
         nom_utilisateur = '".$username."' and mot_de_passe = '".$password."'");
         //$rows = array();

         $row = mysqli_fetch_array($result);
         $count = $row[0];
         if ($count != 0) // nom d'utilisateur et mot de passe correctes
         {
            $_SESSION['username'] = $username;
            header('Location: /index001.php');
            // print("MainPage");
         } else {
            header('Location: /index.php');
            // print("err1"); // utilisateur ou mot de passe incorrect
         }
      } else {
         header('Location: /index.php');
         //print("err2"); // utilisateur ou mot de passe vide
      }
   } else {
      header('Location: /index.php');
      //print("Login");
   }
   $conn->close();// fermer la connexion
?>