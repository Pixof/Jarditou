<?php
require '/Users/aurelienc/Desktop/AFPA_Jarditou/DW 2021/Jarditou PHP V2/App/src/config BDD/connect_base.php'; 
//Débug 
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);  
session_start();


// on définit les variables

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

    //initialisation du formatage de la photo pour copier le chemin dans la BDD et vérifier si elle est au bon format
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];
    

                // Vérifie l'extension du fichier
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if(!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

                // Vérifie la taille du fichier - 5Mo maximum
                $maxsize = 5 * 1024 * 1024;
                if($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");

                // Vérifie le type MIME du fichier
                if(in_array($filetype, $allowed)){

                    //Vérifie si le fichier existe avant de le télécharger.
                    if(file_exists("/Users/aurelienc/Desktop/AFPA_Jarditou/DW 2021/Jarditou PHP V2/App/src/config BDD/miniature" . $_FILES["photo"]["name"])){
                        //echo $_FILES["photo"]["name"] . " existe déjà.";

                        }else{
                            //on crée un dossier pour copier le fichier photo en local et ensuite on l'appelle pour le lire
                            move_uploaded_file($_FILES["photo"]["tmp_name"], "/Users/aurelienc/Desktop/AFPA_Jarditou/DW 2021/Jarditou PHP V2/App/img/photo_produit/" . $_FILES["photo"]["name"]);
                            //initialise la variable pour l'upload dans la BDD
                            $blob = $_FILES["photo"]["name"];
                                echo "Votre fichier a été téléchargé avec succès.";
                            }
                            }
                            else
                                {
                                    echo "Error: " . $_FILES["photo"]["error"];
                                }
                        }
                    
 
    try
    {
      //On se connecte à la BDD via connect_base.php
  
      //On insère les données reçues si les champs sont remplis
    if(isset($ref) && isset($cat) && isset($lib) && isset($desc) && isset($price) && isset($stock) 
    && isset($color) && isset($blob) && isset($date) && isset($bloc))
    {
    // Pour inserer les données : Listé les colonnes le INTO = Values dans l'ordre)
    $sth = $db->prepare("
        INSERT INTO produits(pro_cat_id, pro_ref, pro_libelle, pro_description, pro_prix, pro_stock, pro_couleur, pro_photo, pro_d_ajout, pro_bloque)
        VALUES(:cat, :ref , :lib, :desc, :price, :stock, :color, :photo, :dateOfAdd, :bloc)");
    $sth->bindParam(':cat',$cat);
    $sth->bindParam(':ref',$ref);
    $sth->bindValue(':lib',$lib);
    $sth->bindValue(':desc',$desc);
    $sth->bindParam(':price',$price);
    $sth->bindParam(':stock',$stock);
    $sth->bindParam(':color',$color);
    $sth->bindParam(':photo',$blob);
    $sth->bindParam(':dateOfAdd',$date);
    $sth->bindParam(':bloc',$bloc);
    $sth->execute();
    }
    echo '<br>';
    }   

    catch(PDOException $e)
    {
    echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
        die("fin");
    }
  

?>