<?php
require 'connect_add.php';
//Débug
ini_set('display_errors',1);   
error_reporting(E_ALL); 


$error =[]; 


if (!array_key_exists('ref', $_POST) || $_POST['ref'] == '' ){
    $error['ref'] = "Vous n'avez pas renseingé votre référence";    
}
if (!array_key_exists('cat', $_POST) || $_POST['cat'] == '' ){
    $error['cat'] = "Vous n'avez pas renseingé votre catégorie";    
}
if (!array_key_exists('lib', $_POST) || $_POST['lib'] == '' ){
    $error['lib'] = "Vous n'avez pas renseingé votre Libellé";    
}

if (!array_key_exists('desc', $_POST) || $_POST['desc'] == '' ){
    $error['desc'] = "Vous n'avez pas renseingé votre description";    
}
   
if (!array_key_exists('price', $_POST) || $_POST['price'] == '' ){
    $error['price'] = "Vous n'avez pas renseingé votre prix";    
}

if (!array_key_exists('stock', $_POST) || $_POST['stock'] == '' ){
    $error['stock'] = "Vous n'avez pas renseingé votre stock";    
}

if (!array_key_exists('color', $_POST) || $_POST['color'] == '' ){
    $error['color'] = "Vous n'avez pas renseingé votre couleur";    
}

if (is_array($_FILES["photo"]) && !empty($_FILES["photo"]["error"])){
    $error['photo'] = "Vous n'avez pas renseigné la photo";  
      
}

// On met les types autorisés dans un tableau (ici pour une image)
//$aMimeTypes = array("image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/x-png", "image/tiff");

// On ouvre l'extension FILE_INFO
//$finfo = finfo_open(FILEINFO_MIME_TYPE);

// On extrait le type MIME du fichier via l'extension FILE_INFO 
//$mimetype = finfo_file($finfo, $_FILES["photo"]["tmp_name"]);

// On ferme l'utilisation de FILE_INFO 
//finfo_close($finfo);

//if (in_array($mimetype, $aMimeTypes))
//{
    /* Le type est parmi ceux autorisés, donc OK, on va pouvoir 
       déplacer et renommer le fichier */          
//} 
//else 
//{
   // Le type n'est pas autorisé, donc ERREUR

//   echo "Type de fichier non autorisé";    
//   exit;
//}   

//move_uploaded_file($_FILES["photo"]["tmp_name"], "photos_deco/pro_photo.jpg"); 

//$extension = pathinfo($_POST["photo"]["tmp_name"], PATHINFO_EXTENSION);     



if (!array_key_exists('bloc', $_POST) || $_POST['bloc'] == '' ){
    $error['block'] = "Vous n'avez pas renseigné la disponibilité";    
}


session_start();

if (!empty($error)){
  
    $_SESSION['error'] = $error;
    $_SESSION['inputs'] = $_POST;
    header('Location: http://localhost/DW%202021/Jarditou%20PHP%20V2/App/src/product/add%20page/add.php');
}else{
    $_SESSION['success'] = 1;
    header('Location: http://localhost/DW%202021/Jarditou%20PHP%20V2/App/src/product/add%20page/add.php');
}

