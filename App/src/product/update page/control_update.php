<?php
require 'connect_update.php'; 
// Variable de récupération des erreurs générées :
    $error =[];
 
//controle des champs avec condition : 
    if (!array_key_exists('id', $_POST) || $_POST['id'] == '' ){
        $error['id'] = "Vous n'avez pas saisie votre id";    
    }
    if (!array_key_exists('ref', $_POST) ||  $_POST['ref'] == '' ){
        $error['ref'] = "Vous n'avez pas saisie votre référence";    
    }
    if (!array_key_exists('cat', $_POST) || $_POST['cat'] == '' ){
        $error['cat'] = "Vous n'avez pas saisie votre catégorie";    
    }
    if (!array_key_exists('lib', $_POST) || $_POST['lib'] == '' ){
        $error['lib'] = "Vous n'avez pas saisie votre libellé";    
    }
    if (!array_key_exists('price', $_POST) || $_POST['price'] == '' ){
        $error['price'] = "Vous n'avez pas saisie votre prix";    
    }
    if (!array_key_exists('stock', $_POST) || $_POST['stock'] == '' ){
        $error['stock'] = "Vous n'avez pas saisie votre stock";    
    }
    if (!array_key_exists('color', $_POST) || $_POST['color'] == '' ){
        $error['color'] = "Vous n'avez pas saisie votre couleur";    
    }
    if (!array_key_exists('desc', $_POST) || $_POST['desc'] == '' ){
        $error['desc'] = "Vous n'avez pas saisie votre description";    
    }

// Début de la session de stockage des informations du formulaire
   

// Confiditon de récupération des erreurs : si erreur remonter dans la super variable SESSION alors 
// le signifer à l'usager par un message en le renvoyer sur la page d'inscription
// Si aucun erreur envoyer un message de réussite en le redirigeant sur la page de formulaire

    if (!empty($error)){
  
        $_SESSION['error'] = $error;
        $_SESSION['inputs'] = $_POST;
        header( 'Location: http://localhost/DW%202021/Jarditou%20PHP%20V2/App/src/product/update%20page/update.php?id='.$_POST['id']);
        
    }else{
        $_SESSION['success'] = 1;
        $message = $_SESSION['inputs'];
            header('Location: http://localhost/DW%202021/Jarditou%20PHP%20V2/App/src/product/update%20page/update.php?id='.$_POST['id']);
        }

