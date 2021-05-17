<?php
session_start();
require '/Users/aurelienc/Desktop/AFPA_Jarditou/DW 2021/Jarditou PHP V2/App/src/config BDD/connect_base.php';
//Débug
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

try {
    //On se connecte à la BDD via connect_base.php

    // Gestion de l'update

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }
    if (isset($_POST['ref'])) {
        $ref = $_POST['ref'];
    }
    if (isset($_POST['cat'])) {
        $cat = $_POST['cat'];
    }
    if (isset($_POST['lib'])) {
        $lib = $_POST['lib'];
    }
    if (isset($_POST['desc'])) {
        $desc = $_POST['desc'];
    }
    if (isset($_POST['price'])) {
        $price = $_POST['price'];
    }
    if (isset($_POST['stock'])) {
        $stock = $_POST['stock'];
    }
    if (isset($_POST['color'])) {
        $color = $_POST['color']; 
    }
    if (isset($_POST['bloc'])) {
        $bloc = $_POST['bloc'];
    }
    $date = date('y-m-d');

    //On insère les données reçues si les champs sont remplis

    if (isset($id) && isset($ref) && isset($cat) && isset($lib) && isset($desc) && isset($price) && isset($stock) && isset($color) && isset($bloc)) {
        $sth = $db->prepare(
            "UPDATE `produits` SET `pro_cat_id`=:cat, `pro_ref`=:ref, `pro_libelle`=:lib, `pro_description`=:desc, `pro_prix`=:price, `pro_stock`=:stock,
        `pro_couleur`=:color, `pro_d_modif`=:dateOfMod, `pro_bloque`=:bloc WHERE `pro_id`=:id;"
        );
        $sth->bindParam(':cat', $cat, PDO::PARAM_INT);
        $sth->bindParam(':ref', $ref, PDO::PARAM_STR);
        $sth->bindValue(':lib', $lib, PDO::PARAM_STR);
        $sth->bindParam(':desc', $desc, PDO::PARAM_STR);
        $sth->bindParam(':price', $price, PDO::PARAM_INT);
        $sth->bindParam(':stock', $stock, PDO::PARAM_INT);
        $sth->bindParam(':color', $color, PDO::PARAM_STR);
        $sth->bindParam(':dateOfMod', $date, PDO::PARAM_STR);
        $sth->bindParam(':bloc', $bloc, PDO::PARAM_INT);
        $sth->bindParam(':id', $id, PDO::PARAM_INT);
        $sth->execute();
    }

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        // on nettoie
        $id = strip_tags($_GET['id']); 

        // preparation de la requete
        $sql = "SELECT * FROM `produits` WHERE `pro_id` = :id";

        $query = $db->prepare($sql);

        // On attache les valeurs
        $query->bindValue(':id', $id, PDO::PARAM_INT);

        // On exécute la requête
        $query->execute();

        // On stocke le résultat dans un tableau associatif
        $produit = $query->fetch(PDO::FETCH_OBJ);
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die('Fin du script');
}
?>