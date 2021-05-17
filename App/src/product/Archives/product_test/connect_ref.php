<?php
require 'connect_base.php';

// Pour récupérer la variable passée dans l'URL, il faut utiliser le tableau associatif $_GET.

try 
{
    $db = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch (Exception $e) 
{
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die('Fin du script');
} 

if(isset($_GET['pro_id']))
{
// id dans l'url

$prod = $_GET['pro_id'];

$requete = "SELECT * FROM produits WHERE pro_id =".$prod;
$result = $db->query($requete); 
$produit = $result->fetch(PDO::FETCH_OBJ);
$result->closeCursor();

}
else
{
// pas de id dans l'url
}





?>