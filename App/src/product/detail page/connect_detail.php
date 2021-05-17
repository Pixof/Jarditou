<?php
require '/Users/aurelienc/Desktop/AFPA_Jarditou/DW 2021/Jarditou PHP V2/App/src/config BDD/connect_base.php';
// Pour récupérer la variable passée dans l'URL, il faut utiliser le tableau associatif $_GET.

if(isset($_GET['id']) && !empty($_GET['id']))
{
    // on nettoie
    $id= strip_tags($_GET['id']);
    
// preparation de la requete
$sql= "SELECT * FROM `produits` WHERE `pro_id` = :id";

$query = $db->prepare($sql);

// On attache les valeurs
$query->bindValue(':id', $id, PDO::PARAM_INT);

 // On exécute la requête
$query->execute();

// On stocke le résultat dans un tableau associatif
$produit = $query->fetch(PDO::FETCH_OBJ);


if(!$produit){
    header('Location: PAsbon.php');
}

}
else
{
    header('Location: index.php');
}

?>