<?php
    $servername = 'localhost'; 
    $bdd='projet_stage_2023';      
    $username = 'root';  
    $password = '';     
try
{
$pdo = new PDO("mysql:host=$servername;dbname=$bdd;charset=utf8", $username, $password);
  //On définit le mode d'erreur de PDO sur Exception
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
}
    /*On capture les exceptions si une exception est lancée et on affiche
    *les informations relatives à celle-ci*/
    catch(PDOException $e)
        {
           echo "Erreur : " . $e->getMessage();
        }	
?>
