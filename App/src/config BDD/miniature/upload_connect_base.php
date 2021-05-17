<?php
include 'connect_base.php';

// preparation de la requete
$requete = "SELECT * FROM photo"; 
 // On exécute la requête
$result = $db->query($requete);

if (!$result) 
{
$tableauErreurs = $db->errorInfo();
echo $tableauErreur[2]; 
die("Erreur dans la requête");
}

if ($result->rowCount() == 0) 
{ 
// Pas d'enregistrement
die("La table est vide");
}