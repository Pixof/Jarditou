
<?php
require '../config BDD/connect_base.php';
include '../Include_/Header_A.php';
?>

<?php
// Pour récupérer la variable passée dans l'URL, il faut utiliser le tableau associatif $_GET.
$pro_id = $_GET["pro_id"];

try 
{
    $db = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch (Exception $e) 
{
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die('Fin du script');
} 

$requete = "SELECT * FROM produits WHERE pro_id=".$pro_id;
$result = $db->query($requete); 
$produit = $result->fetch(PDO::FETCH_OBJ);
$result->closeCursor();
?>



    <div> <?php echo $produit->pro_id; ?> </div>
    <div> <?php echo $produit->pro_cat_id; ?> </div>
    <div> <?php echo $produit->pro_ref; ?> </div>
    <div> <?php echo $produit->pro_libelle; ?> </div>
    <div> <?php echo $produit->pro_description; ?> </div>
    <div> <?php echo $produit->pro_prix; ?> </div>
    <div> <?php echo $produit->pro_stock; ?> </div>
    <div> <?php echo $produit->pro_couleur; ?> </div>
    <div> <?php echo $produit->pro_photo; ?> </div>
    <div> <?php echo $produit->pro_d_ajout; ?> </div>
    <div> <?php echo $produit->pro_d_modif; ?> </div>
    <div> <?php echo $produit->pro_d_bloque; ?> </div>

</html>