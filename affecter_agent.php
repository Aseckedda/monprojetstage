<?php
// Inclure la configuration de la base de données
require_once('connexion.php'); 

// Récupérer les valeurs saisies pour id_agent et id_projet
$id_agent = $_POST['id_agent'];
$id_projet = $_POST['id_projet'];

// Requête SQL pour mettre à jour l'affectation
$sqlUpdateAffectation = "UPDATE affectation SET id_agent = :id_agent, id_projet = :id_projet WHERE id_affectation = :id_affectation";

// Préparation de la requête SQL
$stmt = $pdo->prepare($sqlUpdateAffectation);

// Liaison des valeurs
$stmt->bindValue(':id_agent', $id_agent, PDO::PARAM_INT);
$stmt->bindValue(':id_projet', $id_projet, PDO::PARAM_INT);
$stmt->bindValue(':id_affectation', $id_affectation, PDO::PARAM_INT); 

// Exécution de la requête
if ($stmt->execute()) {
    echo "L'affectation a été mise à jour avec succès.";

    // Mettre à jour la table AGENT 
    $sqlUpdateAgent = "UPDATE agent SET projet = :projet WHERE id_agent = :id_agent";
    $stmt = $pdo->prepare($sqlUpdateAgent);
    $stmt->bindValue(':id_agent', $id_agent, PDO::PARAM_INT);
    $stmt->bindValue(':projet', $projet, PDO::PARAM_STR);
    if ($stmt->execute()) {
        header("location:tableau_bord_admin.php");
    } else {
        echo "Erreur lors de la mise à jour de la table Agent.";
    }
} else {
    echo "Erreur lors de la mise à jour de l'affectation.";
}

// Fermer la connexion PDO
$pdo = null;
?>
