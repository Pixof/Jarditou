<?php
require 'connect.php';
echo var_dump($user);
var_dump($sth);

// récupérer les erreurs de champs vides:
$error =[];
 
// vérification des champs si vide ou non :
    if (!array_key_exists('firstname', $_POST) || $_POST['firstname'] == '' ){
    $error['firstname'] = "Vous n'avez pas renseigné votre Nom";    
    }
    if (!array_key_exists('lastname', $_POST) ||  $_POST['lastname'] == '' ){
    $error['lastname'] = "Vous n'avez pas renseigné votre Prénom";    
    }
    if (!array_key_exists('dateBirthday', $_POST) || $_POST['dateBirthday'] == '' ){
    $error['dateBirthday'] = "Vous n'avez pas renseigné votre Date de naissance";    
    }
    if (!array_key_exists('email', $_POST) || $_POST['email'] == '' || filter_var('email', FILTER_VALIDATE_EMAIL)){
    $error['email'] = "Vous n'avez pas renseigné votre Email";    
        }else{
            //Controle de l'email avant envoi dans la BDD pour éviter les doublons
                $sth = $dbco->prepare(" SELECT * FROM user WHERE email = :email " );
                $sth->execute( [ ':email' => $_POST['email'] ] );
                $user = $sth->fetch();
                    if ($user !== TRUE){
                    $error['email'] = "Cet email existe déjà, veuillez entrer un email valide";
                    }   
                }

    if (!array_key_exists('password', $_POST) || $_POST['password'] == '' ){
    $error['password'] = "Vous n'avez pas renseigné un Mot de passe";    
    }

    if (!array_key_exists('passwordConfirmation', $_POST) || $_POST['passwordConfirmation'] == '' ){
    $error['passwordConfirmation'] = "Vous n'avez pas renseigné la confirmation du Mot de passe";    
    }

    if ($_POST['password'] != $_POST['passwordConfirmation']){
    $error['password'] = "Vous n'avez pas renseigné le même mot de passe";    
    }

    //Création d'une session 
    session_start(); 

    if (!empty($error)){
        $_SESSION['error'] = $error;
        $_SESSION['inputs'] = $_POST;
                header('Location: http://localhost/DW%202021/Jarditou%20PHP%20V2/App/src/register/register.php');
    }else{
        $_SESSION['success'] = 1;
            header('Location: http://localhost/DW%202021/Jarditou%20PHP%20V2/App/src/register/register.php');  
        }

?>






