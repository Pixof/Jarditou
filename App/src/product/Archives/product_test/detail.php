<?php
session_start();
require 'connect_base.php';
include 'Header_A.php';

// Pour récupérer la variable passée dans l'URL, il faut utiliser le tableau associatif $_GET.

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


if(isset($_GET['id']) && !empty($_GET['id']))
{

    // on nettoie
    $id= strip_tags($_GET['id']);
    
// preparation de la requete
$sql= "SELECT * FROM `produits` WHERE `pro_id` = :id";

$query = $db->prepare($sql);

// On attache les valeurs
$query->bindValue(':id', $id, PDO::PARAM_INT);

 // On exécute la requête
$query->execute();

// On stocke le résultat dans un tableau associatif
$produit = $query->fetch(PDO::FETCH_OBJ);


if(!$produit){
    header('Location: PAsbon.php');
}

}
else
{
    header('Location: index.php');
}
?>


      
                    <!-- Formulaire d'ajout ou suppression-->
                    <div class="container ">
                        <div class="row-fluid text-center align-items-center">
                            <img class=" img-fluid shadow mb-1 " src="<?= $produit->pro_photo; ?>" alt="Photo 7" width="15%" />
                        </div>

        

                        <form action="Ctrl_prod.php" method="GET" name="detail">
                    
                    <!-- Implémentation du champs avec Isset afin de vérifier le champs (est il rempli ?) si oui le laisser rempli ou si non le laisser vide -->
                       
                    <div class="form-group">
                            <label for="exampleFormControlInput1">Id : </label>
                            <input type="text" class="form-control" name="" placeholder="" value="<?= $produit->pro_id ?>" ><br>
                        </div>
                       
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Références : </label>
                            <input type="text" class="form-control" name="Ref" placeholder="" value="<?= $produit->pro_ref; ?>" ><br>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Catégorie : </label>
                            <input type="text" class="form-control" name="Cat" placeholder="" value=" <?= $produit->pro_cat_id; ?>"  ><br>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Libellé : </label>
                            <input type="text" class="form-control" name="Lib" placeholder=" " value=" <?= $produit->pro_libelle; ?> "  ><br>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description :</label>
                            <textarea class="form-control" rows="3" name="desc" value=" " ><?= $produit->pro_description; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Prix : </label>
                            <input type="text" class="form-control" name="Prix" placeholder=" " value=" <?= $produit->pro_prix; ?> "  ><br>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Stock : </label>
                            <input type="text" class="form-control" name="Stk" placeholder=" " value=" <?= $produit->pro_stock; ?> " ><br>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Couleur : </label>
                            <input type="text" class="form-control" name="color" placeholder=" " value=" <?= $produit->pro_couleur; ?> "  ><br>
                        </div>


                        <div class="form-group">
                            <label for="exampleFormControlInput1">Produit bloqué ? :</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="choix" id="inlineRadio1" value="1" <?= $_GET['id'] == 1 ? selected : '';  ?>  >
                                <label class="form-check-label" for="">Oui</label>
                                <input class="form-check-input" type="radio" name="choix" id="inlineRadio2" value="NULL" <?= $_GET['id'] == 0 ? selected : ''; ?> >
                                <label class="form-check-label" for="">Non</label>
                             </div>
                            <br><br>


                             <div class="form-group">
                            <label for="exampleFormControlInput1">Date d'ajout : </label>
                            <input type="text" class="form-control" name="color" placeholder=" " value=" <?= $produit->pro_d_ajout; ?> "  ><br>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Date de modification : </label>
                            <input type="text" class="form-control" name="color" placeholder=" " value=" <?= $produit->pro_d_modif; ?> "  ><br>
                        </div>


                        <div class="form-check text-center">
                        
                            <button type="button" class="btn btn-dark"><a class="text-light"  href="product.php" > Retour </a></button>
                            <button type="button" class="btn btn-success"><a class="text-light" href="update.php?id=<?= $produit->pro_id ?>"> Modifier </a></button>
                            <button type="button" class="btn btn-danger"><a class="text-light"  href="delete.php?id=<?= $produit->pro_id ?>"> Suppression </a></button>

                        </div>
                        <br>
                    </form>
                </div>

<?php include 'Footer_B.php'; ?>