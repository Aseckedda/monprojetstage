<?php
require_once("connexion.php");
if(isset($_POST['nom_projet'])){
    try{
        $nom_marque=$_POST['nom_projet'];
        $req=$pdo->prepare("INSERT INTO projet VALUES(NULL,:nom_projet,:description,:date_debut,:date_fin)");
        $req->bindValue(':nom_projet',$nom_projet, PDO::PARAM_STR);
        $req->bindValue(':description',$description, PDO::PARAM_STR);
        $req->bindValue(':date_debut',$date_debut, PDO::PARAM_STR);
        $req->bindValue(':date_fin',$date_fin, PDO::PARAM_STR);
        $isok=$req->execute();
    }
    catch(PDOException $e)
    {
        header("Location:liste_agent.php?erreur=Probleme d'insertion risque de doublon");
    }
}
header("Location:ajouter_agent.php");
?>

<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projet_stage_2023";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupération des données du formulaire
$nom_projet = $_POST['nom_projet'];
$description = $_POST['description'];
$date_debut = $_POST['date_debut'];
$date_fin = $_POST['date_fin'];

// Requête d'insertion
$sql = "INSERT INTO projet (nom_projet, description, date_debut, date_fin) VALUES ('$nom_projet', '$description', '$date_debut', '$date_fin' )";

if ($conn->query($sql) === TRUE) {
    header("Location:tableau_bord_admin.php");
} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>