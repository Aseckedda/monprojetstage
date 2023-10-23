<?php
session_start();
require("connexion.php");
if (isset($_POST['t1']))
{
    $id_projet=$_POST['t1'];
    $nom_projet=$_POST['t2'];
    $description=$_POST['t3'];
    $date_debut=$_POST['t4'];
    $date_fin=$_POST['t5'];
    $req1 = $pdo->prepare("UPDATE projet SET id_projet=:id_projet, nom_projet= :nom_projet, description= :description, date_debut= :date_debut, date_fin= :date_fin WHERE id_projet= :coderech");
    $req1->bindValue(':id_projet',$id_projet);
    $req1->bindValue(':nom_projet',$nom_projet);
    $req1->bindValue(':description',$description);
    $req1->bindValue(':date_debut',$date_debut);
    $req1->bindValue(':date_fin',$date_fin);
    $req1->bindValue(':coderech',$_SESSION['id_projet']);
    $req1->execute();
    header("location:liste.php");

}