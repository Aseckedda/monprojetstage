<?php 
 //Nous allons démarrer la session avant toute chose
   session_start() ;
  if(isset($_POST['boutton-valider'])){ // Si on clique sur le boutton , alors :
    //Nous allons verifiér les informations du formulaire
    if(isset($_POST['login']) && isset($_POST['pass'])) { //On verifie ici si l'utilisateur a rentré des informations
      //Nous allons mettres l'email et le mot de passe dans des variables
      $login = $_POST['login'] ;
      $pass = $_POST['pass'] ;
      $erreur = "" ;
       //Nous allons verifier si les informations entrée sont correctes
       //Connexion a la base de données
       $nom_serveur = "localhost";
       $utilisateur = "root";
       $mot_de_passe ="";
       $nom_base_données ="projet_stage_2023" ;
       $con = mysqli_connect($nom_serveur , $utilisateur ,$mot_de_passe , $nom_base_données);
       //requete pour selectionner  l'utilisateur qui a pour email et mot de passe les identifiants qui ont été entrées
        $req = mysqli_query($con , "SELECT * FROM utilisateurs WHERE login = '$login' AND pass ='$pass' ") ;
        $num_ligne = mysqli_num_rows($req) ;//Compter le nombre de ligne ayant rapport a la requette SQL
        if($num_ligne > 0){
            header("Location:tableau_bord_admin.php") ;//Si le nombre de ligne est > 0 , on sera redirigé vers la page bienvenu
            // Nous allons créer une variable de type session qui vas contenir l'email de l'utilisateur
            $_SESSION['login'] = $login ;
        }else {//si non
            $erreur = "Login ou Mots de passe incorrectes !";
        }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de connexion</title>
    <link rel="stylesheet" href="style_login.css">
</head>
<body>
       <?php 
       if(isset($erreur)){// si la variable $erreur existe , on affiche le contenu ;
           echo "<p class= 'Erreur'>".$erreur."</p>"  ;
       }
       ?>
          <div id="form">
            <img src="asset/img/images_adm.png" alt="adm" width=50% height=50% />
            <form name="form" action="" onsubmit="return isvalid()" method="POST">  <!--on ne mets plus rien au niveau de l'action , pour pouvoir envoyé les données  dans la même page -->
           <label>Username: </label>
           <input type="text" name="login"></br></br>
           <label >Password: </label>
           <input type="password" name="pass"></br></br>
           <input type="submit" id="btn" value="Login" name="boutton-valider">
       </form>
      </div> 
</body>
</html>