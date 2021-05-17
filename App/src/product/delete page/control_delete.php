<?php
require '/Users/aurelienc/Desktop/AFPA_Jarditou/DW 2021/Jarditou PHP V2/App/src/config BDD/connect_base.php';
//Débug
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

//espace suppression du document

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
    header('Location: /DW 2021/Jarditou PHP V2/App/src/product/product.php');
    }
    $sql = "DELETE FROM `produits` WHERE `pro_id`=:id;";

    $query = $db->prepare($sql);

    $query->bindValue(':id', $id, PDO::PARAM_INT);

    $query->execute();

    header('Location: /DW 2021/Jarditou PHP V2/App/src/product/product.php');
}else{
    echo 'ça ne marche pas';
}



