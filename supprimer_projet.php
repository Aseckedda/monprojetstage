<?php
require("connexion.php");
if (isset($_GET['codesup']))
{
$supp=$_GET['codesup'];
$req1 = $pdo->prepare('DELETE FROM projet WHERE id_projet=:supp_code');
$req1->bindValue(':supp_code',$supp);
$req1->execute();
header("location:liste.php");
}
