
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
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$experience = $_POST['experience'];
$projet = $_POST['projet'];
$competence = $_POST['competence'];

// Requête d'insertion
$sql = "INSERT INTO agent (nom, prenom, email, experience, projet, competence) VALUES ('$nom', '$prenom', '$email', '$experience', '$projet', '$competence' )";
if ($conn->query($sql) === TRUE) {
    header("Location:tableau_bord_admin.php");
} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>