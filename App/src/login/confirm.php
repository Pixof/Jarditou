<?php
        // connexion à la BDD
require '../config BDD/connect_base.php';
        //debut de session
session_start();

    if (isset($_POST['email'])) 
        {
            $email = $_POST['email'];
        }
    if (isset($_POST['password'])) 
        {
            $pw = $_POST['password'];
        }

        // Controle de l'authentification
    $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
    $sth = $dbco->prepare("SELECT * FROM user WHERE email = :email" );
    $sth->execute( [ ":email" => $_POST['email']] );
    $row = $sth->fetch();

    if( $row !== FALSE && password_verify( $_POST['password'], $row['password']) )
        {
        //mise en session des données utilisateurs telles que le login, le nom... 
        //puis on redirige l'utilisateur vers une page protegée
        echo "vous êtes authentifié";
        header('Location: http://localhost/DW%202021/Jarditou%20PHP%20V2/App/index.php');
    }else{
         echo "Idenfiant ou mdp incorrect";
         //renvoyer sur une page d'erreur ou mettre un message derreur de connxion : A faire
         //header('Location: http://localhost/DW%202021/Jarditou%20PHP%20V2/App/index.php');
        }