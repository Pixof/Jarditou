<?php

// Variable de récupération des erreurs générées :
    $error =[];

//controle des champs avec condition :
    if (!array_key_exists('firstname', $_POST) || $_POST['firstname'] == '' ){
        $error['firstname'] = "Vous n'avez pas saisie votre Nom";    
    }
    if (!array_key_exists('lastname', $_POST) ||  $_POST['lastname'] == '' ){
        $error['lastname'] = "Vous n'avez pas saisie votre Prénom";    
    }
    if (!array_key_exists('gender', $_POST) || $_POST['gender'] == '' ){
        $error['gender'] = "Vous n'avez pas saisie votre Genre";    
    }
    if (!array_key_exists('birthday', $_POST) || $_POST['birthday'] == '' ){
        $error['birthday'] = "Vous n'avez pas saisie votre Date de naissance";    
    }
    if (!array_key_exists('postalCode', $_POST) || $_POST['postalCode'] == '' ){
        $error['postalCode'] = "Vous n'avez pas saisie votre CP";    
    }
    if (!array_key_exists('address', $_POST) || $_POST['address'] == '' ){
        $error['address'] = "Vous n'avez pas saisie votre Adresse";    
    }
    if (!array_key_exists('city', $_POST) || $_POST['city'] == '' ){
        $error['city'] = "Vous n'avez pas saisie votre Ville";    
    }

// Mise en place d'un filte php pour la vérification de l'email
    if (!array_key_exists('email', $_POST) || $_POST['email'] == '' || filter_var('email', FILTER_VALIDATE_EMAIL)){
        $error['email'] = "Vous n'avez pas saisie votre Email";    
    }

    if (!array_key_exists('select', $_POST) || $_POST['select'] == '' ){
        $error['select'] = "Vous n'avez pas saisie votre Sélection";    
    }

    if (!array_key_exists('comment', $_POST) || $_POST['comment'] == '' ){
        $error['comment'] = "Vous n'avez pas saisie votre Message";    
    }

// Début de la session de stockage des informations du formulaire
    session_start();

// Confiditon de récupération des erreurs : si erreur remonter dans la super variable SESSION alors 
// le signifer à l'usager par un message en le renvoyer sur la page d'inscription
// Si aucun erreur envoyer un message de réussite en le redirigeant sur la page de formulaire

    if (!empty($error)){
  
        $_SESSION['error'] = $error;
        $_SESSION['inputs'] = $_POST;
            header('Location: http://localhost/DW%202021/Jarditou%20PHP%20V2/App/src/contact/contact.php');
    }else{
        $_SESSION['success'] = 1;
        $message = $_SESSION['inputs'];
        $header = 'FROM: Jarditou';
            mail('pixof.photographie@gmail.com', 'Formulaire de contact', $message, $header);
            header('Location: http://localhost/DW%202021/Jarditou%20PHP%20V2/App/src/contact/contact.php');
        }



