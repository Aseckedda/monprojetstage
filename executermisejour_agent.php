<?php
session_start();
require("connexion.php");
if (isset($_POST['t1']))
{
    $id_agent=$_POST['t1'];
    $nom=$_POST['t2'];
    $prenom=$_POST['t3'];
    $email=$_POST['t4'];
    $experience=$_POST['t5'];
    $projet=$_POST['t6'];
    $competence=$_POST['t7'];
    $req1 = $pdo->prepare("UPDATE agent SET id_agent=:id_agent, nom= :nom, prenom= :prenom, email= :email, experience= :experience, projet= :projet, competence= :competence WHERE id_agent= :coderech");
    $req1->bindValue(':id_agent',$id_agent);
    $req1->bindValue(':nom',$nom);
    $req1->bindValue(':prenom',$prenom);
    $req1->bindValue(':email',$email);
    $req1->bindValue(':experience',$experience);
    $req1->bindValue(':projet',$projet);
    $req1->bindValue(':competence',$competence);
    $req1->bindValue(':coderech',$_SESSION['id_agent']);
    $req1->execute();
    header("location:liste_agent.php");

}