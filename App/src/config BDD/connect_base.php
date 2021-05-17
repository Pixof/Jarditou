<?php
$serveur = "localhost";
$dbname = "jarditouBase";
$user = "root"; 
$pass = "root";

$db = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Appel de la fonction de connexion

//Débug
ini_set('display_errors',1); 
error_reporting(E_ALL);

