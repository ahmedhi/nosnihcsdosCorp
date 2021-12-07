
<html>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="css/style001.css" media="screen" type="text/css" />
        <div>
        <img src="img/RODSCHINSON_LOGO_Big_Positif_1500x818px.png" style="width: 17rem; padding: 1rem"/>
    </div>
    </head>
    <body>
        <div id="container" display: flex; justify-content: center; flex-direction: column; align-items: center; background: #ffffff40>
            <!-- zone de connexion -->
            <body style="background-image: url('/img/HOME.jpeg'); background-size: cover; display: flex; flex-direction: column;">
    
            <form action="serverSide/verification.php" method="POST" >
                <h1>Connexion</h1>
                
                
                <label><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>
                
                
                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>
                

                <input type="submit" id='submit' value='LOGIN' >
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>
            </form>
        </div>
    </body>
</html>