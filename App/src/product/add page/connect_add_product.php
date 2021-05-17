<?php
require '/Users/aurelienc/Desktop/AFPA_Jarditou/DW 2021/Jarditou PHP V2/App/src/config BDD/connect_base.php';   

// preparation de la requete
$requete = "SELECT * FROM categories"; 
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
?>


