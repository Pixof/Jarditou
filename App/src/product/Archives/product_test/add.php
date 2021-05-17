<?php
session_start();
include 'Header_A.php';
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
                                Well DONE ! - Votre messages est bien envoyé.
                            </div>
                        <?php endif; ?>
                    
        
                    <!-- Formulaire d'ajout ou suppression-->
                    <div class="container ">

                        <form action="control_add.php" method="POST" name="add" enctype="multipart/form-data" >
                    
                    <!-- Implémentation du champs avec Isset afin de vérifier le champs (est il rempli ?) si oui le laisser rempli ou si non le laisser vide -->
                 
                        <div  >
                        <label class="form-label" for="customFile">Photo du produit : </label>
                            <input type="hidden" name="MAX_FILE_SIZE" value="100000" > 
                            <input type="file" class="form-control"  name="ficher" > 
                        </div><br>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Références : </label>
                            <input type="text" class="form-control" name="ref" placeholder="Veuillez saisir la référence" value="<?= isset($_SESSION['inputs']['ref']) ? $_SESSION['inputs']['ref']: '' ?>"  ><br>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Catégorie : </label>
                            <input type="text" class="form-control" name="cat" placeholder="Veuillez saisir la catégorie " value="<?= isset($_SESSION['inputs']['cat']) ? $_SESSION['inputs']['cat']: '' ?>"  ><br>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Libellé : </label>
                            <input type="text" class="form-control" name="lib" placeholder="Veuillez saisir le libellé " value="<?= isset($_SESSION['inputs']['lib']) ? $_SESSION['inputs']['lib']: '' ?>"  ><br>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description :</label>
                            <textarea class="form-control" rows="2" name="desc" placeholder="Veuillez saisir une description"  ><?= isset($_SESSION['inputs']['desc']) ? $_SESSION['inputs']['desc'] : '' ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Prix : </label>
                            <input type="text" class="form-control" name="price" placeholder="Veuillez saisir le prix " value="<?= isset($_SESSION['inputs']['price']) ? $_SESSION['inputs']['price']: '' ?>"  ><br>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Stock : </label>
                            <input type="text" class="form-control" name="stock" placeholder="Veuillez saisir le stock " value="<?= isset($_SESSION['inputs']['stock']) ? $_SESSION['inputs']['stock']: '' ?>"  ><br>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Couleur : </label>
                            <input type="text" class="form-control" name="color" placeholder="Veuillez saisir la couleur " value="<?= isset($_SESSION['inputs']['color']) ? $_SESSION['inputs']['color']: '' ?>"  ><br>
                        </div>

                             <div class="form-group">
                                <label class="col-form-label "> Produit bloqué : </label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="block">
                                        <option  selected disabled > Déclarer la disponibilité </option>
                                        <option value = "1" <?= $_SESSION['inputs']['block'] == "1" ? selected : '' ?> >  OUI </option>
                                        <option value = "0" <?= $_SESSION['inputs']['block'] == "0" ? selected : '' ?> > NON </option>
                                    </select>
                            </div>


                        <div class="form-group">
                            <label for="Bdate" class="col-form-label "> Date d'ajout : </label>
                            <input type="date" class="form-control"  id="start" name="dateOfAdd" value="<?= isset($_SESSION['inputs']['dateOfAdd']) ? $_SESSION['inputs']['dateOfAdd']: '' ?>"  min="1900-01-01" max="2030-12-31" >
                        </div>

                        <div class="form-group">
                            <label for="Bdate" class="col-form-label "> Date de modification : </label>
                            <input type="date" class="form-control"  id="start" name="dateOfMod" value="<?= isset($_SESSION['inputs']['dateOfMod']) ? $_SESSION['inputs']['dateOfMod']: '' ?>"  min="1900-01-01" max="2030-12-31" >
                        </div>



                        <div class="form-check text-center">
                        
                            <button type="button" class="btn btn-dark"><a class="text-light" href="product.php"> Retour </a></button>
                            <input class="btn btn-dark" type="submit" value="Ajouter">
                        </div>

                        <br>
                    </form>
                </div>
                    
                <!-- Espace : Pide de page --> 
                <?php include '../Include_/Footer_B.php';  ?>
 <!-- Nettoyagede la session php Lors du rafraichissement de la page : 
Les inputs sont effacé après l'envoi du formulaire complet.
Les erreurs sont effacées à chaque fois qu'un champs est rempli après avoir appuyé sur 'envoyer'-->
<?php
unset($_SESSION['inputs']);
unset($_SESSION['success']);
unset($_SESSION['error']);
?>