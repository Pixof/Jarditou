<?php

$error =[];


if (!array_key_exists('ref', $_GET) || $_GET['ref'] == '' ){
    $error['ref'] = "Vous n'avez pas renseingé votre référence";    
}
if (!array_key_exists('cat', $_GET) || $_GET['cat'] == '' ){
    $error['cat'] = "Vous n'avez pas renseingé votre catégorie";    
}
if (!array_key_exists('Lib', $_GET) || $_GET['Lib'] == '' ){
    $error['Lib'] = "Vous n'avez pas renseingé votre Libellé";    
}

if (!array_key_exists('Desc', $_GET) || $_GET['Desc'] == '' ){
    $error['Desc'] = "Vous n'avez pas renseingé votre Description";    
}
   
if (!array_key_exists('Prix', $_GET) || $_GET['Prix'] == '' ){
    $error['Prix'] = "Vous n'avez pas renseingé votre Prix";    
}

if (!array_key_exists('Stk', $_GET) || $_GET['Stk'] == '' ){
    $error['Stk'] = "Vous n'avez pas renseingé votre stock";    
}

if (!array_key_exists('color', $_GET) || $_GET['color'] == '' ){
    $error['color'] = "Vous n'avez pas renseingé votre couleur";    
}

/*vérifie du radio*/



if (!array_key_exists('trip-start_1', $_GET) || $_GET['trip-start_1'] == '' ){
    $error['trip-start_1'] = "Vous n'avez pas renseingé votre date d'ajout";    
}

if (!array_key_exists('trip-start_2', $_GET) || $_GET['trip-start_2'] == '' ){
    $error['trip-start_2'] = "Vous n'avez pas renseingé votre date de modification";    
}


session_start();

if (!empty($error)){
  
    $_SESSION['error'] = $error;
    $_SESSION['inputs'] = $_GET;
    header('Location: http://localhost/Jarditou%20Boot%20PHP/PHP/Page_Prod_T1.php');
}else{
    $_SESSION['success'] = 1;
    header('Location: http://localhost/Jarditou%20Boot%20PHP/PHP/Page_Prod_T1.php');
}


