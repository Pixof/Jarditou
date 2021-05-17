<?php
session_start();
$title = "Jarditou - Page d'ajout"; 
include '/Users/aurelienc/Desktop/AFPA_Jarditou/DW 2021/Jarditou PHP V2/App/src/Include_/Header_A.php';
include 'connect_add_product.php';
//Débug 
ini_set('display_errors', TRUE); 
ini_set('display_startup_errors', TRUE);  
?>


                    <!-- Regroupe les champ manquant en alerte dans la page HTML : Si une info saisie dans la session est manquante alors message d'erreur-->
                        <?php if(array_key_exists('error', $_SESSION)): ?>
                            <div class="alert alert-danger">
                                <?= implode('<br>', $_SESSION['error']); ?>
                            </div>
                        <?php endif; ?>
                    <!-- Alert d'envoi du message si tous les champs sont saisies. Message de success. -->
                        <?php if(array_key_exists('success', $_SESSION)): ?>
                            <div class="alert alert-success">
                                Well DONE ! - Votre produit à bien été enregistré.
                            </div>
                        <?php endif; ?>
                    
        
                    <!-- Formulaire d'ajout ou suppression-->  
                    <div class="container">

                    <div class="row my-4">
                        <div class="col">
                            <h3>CRÉATION DE PRODUIT</h3><hr>
                        </div>
                    </div>

                        <form action="control_add.php" method="POST" name="add" enctype="multipart/form-data" > 
                  
                    <!-- Controle de champs actif  -->
            <div class="row">
                    <div class="col" id="one">

                        <div class="form-group">
                                <label for="exampleFormControlInput1">Références </label>
                                    <input type="text" class="form-control" name="ref" placeholder="Veuillez saisir la référence" value="<?= isset($_SESSION['inputs']['ref']) ? $_SESSION['inputs']['ref']: '' ?>"  >
                            </div>

                            <div class="form-group">
                                    <label class="col-form-label "> Catégorie </label>
                                        <select class="form-control" name="cat">
                                            <option  selected disabled > Catégorie du produit </option>
                                                <?php  while($row = $result->fetch(PDO::FETCH_OBJ)){  ?>
                                                    <option value= "<?= $row->cat_id ?>" <?= (isset($_SESSION['inputs']['cat']) && $_SESSION['inputs']['cat'] ==  $row->cat_id) ? 'selected' : '' ?> > <?= $row->cat_nom?> </option>
                                                <?php } ?>
                                        </select>  
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Libellé </label>
                                    <input type="text" class="form-control" name="lib" placeholder="Veuillez saisir le libellé " value="<?= isset($_SESSION['inputs']['lib']) ? $_SESSION['inputs']['lib']: '' ?>"  >
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Description</label>
                                    <textarea class="form-control" rows="2" name="desc" placeholder="Veuillez saisir une description"  ><?= isset($_SESSION['inputs']['desc']) ? $_SESSION['inputs']['desc'] : '' ?></textarea>
                            </div>
                    
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Prix </label>
                                    <input type="text" class="form-control" name="price" placeholder="Veuillez saisir le prix " value="<?= isset($_SESSION['inputs']['price']) ? $_SESSION['inputs']['price']: '' ?>"  >
                            </div>
                    </div>

                    <div class="col " id="two">

                            <div class="form-group">
                                <label for="nombre">Stock </label>
                                    <input type="number" class="form-control" name="stock" placeholder="Veuillez saisir le stock " value="<?= isset($_SESSION['inputs']['stock']) ? $_SESSION['inputs']['stock']: '' ?>"  >
                            </div>

                            <div class="form-group pt-2">
                                <label for="exampleFormControlInput1">Couleur </label>
                                    <input type="text" class="form-control" name="color" placeholder="Veuillez saisir la couleur " value="<?= isset($_SESSION['inputs']['color']) ? $_SESSION['inputs']['color']: '' ?>"  >
                            </div>

                            <div class="form-group" >
                                <label for="exampleFormControlInput1">Photo </label>
                                    <input type="file" name="photo"  >   
                            </div>
                           
                            <div class="form-group">
                                <label class="col-form-label "> Produit bloqué </label>
                                    <select class="form-control" name="bloc">
                                        <option  selected disabled > Déclarer la disponibilité </option>
                                        <option value= "1" <?= (isset($_SESSION['inputs']['bloc']) && $_SESSION['inputs']['bloc'] == "1") ? 'selected' : '' ?> > OUI </option>
                                        <option value= "0"  <?= (isset($_SESSION['inputs']['bloc']) && $_SESSION['inputs']['bloc'] == "0") ? 'selected' : '' ?> > NON </option> 
                                    </select>
                            </div>

                            <div class="form-group pt-2">
                                <label for="" class="col-form-label "> Date d'ajout </label>
                                    <input  type="text" class="form-control" name="dateOfAdd" value="<?php echo date('d-m-Y'); ?>" />
                            </div>
                    </div>
                </div>
                <hr>
                        <div class="form-check text-center">
                            <a role="button" class="btn btn-dark" href="/DW 2021/Jarditou PHP V2/App/src/product/product.php"> Retour </a>
                            <input class="btn btn-success" type="submit" value="Ajouter">
                        </div>
                            </form>
                        </div>
                        <br>
                    
                <!-- Espace : Pide de page --> 
                <?php include '/Users/aurelienc/Desktop/AFPA_Jarditou/DW 2021/Jarditou PHP V2/App/src/Include_/Footer_B.php';  ?>
 <!-- Nettoyagede la session php Lors du rafraichissement de la page : 
Les inputs sont effacé après l'envoi du formulaire complet.
Les erreurs sont effacées à chaque fois qu'un champs est rempli après avoir appuyé sur 'envoyer'-->
<?php
unset($_SESSION['inputs']);
unset($_SESSION['success']);
unset($_SESSION['error']);
?>