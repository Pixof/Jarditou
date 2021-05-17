<?php
session_start();
include '../Include_/Header_A.php';
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
                        <div class="row-fluid text-center align-items-center">
                            <img class=" img-fluid shadow mb-1 " src="/DW 2021/Jarditou PHP V2/App/img/7.jpg" alt="Photo 7" width="15%" />
                        </div>

                        <form action="Ctrl_prod.php" method="GET" name="inscription">
                    
                    <!-- Implémentation du champs avec Isset afin de vérifier le champs (est il rempli ?) si oui le laisser rempli ou si non le laisser vide -->
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Références : </label>
                            <input type="text" class="form-control" name="Ref" placeholder="ref" value="<?= isset($_SESSION['inputs']['ref']) ? $_SESSION['inputs']['ref']: '' ?>"  ><br>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Catégorie : </label>
                            <input type="text" class="form-control" name="Cat" placeholder=" " value="<?= isset($_SESSION['inputs']['cat']) ? $_SESSION['inputs']['cat']: '' ?>"  ><br>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Libellé : </label>
                            <input type="text" class="form-control" name="Lib" placeholder=" " value="<?= isset($_SESSION['inputs']['Lib']) ? $_SESSION['inputs']['Lib']: '' ?>"  ><br>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description :</label>
                            <textarea class="form-control" id="commentaire" rows="2" name="Desc"  ><?= isset($_SESSION['inputs']['commentaire']) ? $_SESSION['inputs']['commentaire'] : '' ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Prix : </label>
                            <input type="text" class="form-control" name="Prix" placeholder=" " value="<?= isset($_SESSION['inputs']['prix']) ? $_SESSION['inputs']['prix']: '' ?>"  ><br>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Stock : </label>
                            <input type="text" class="form-control" name="Stk" placeholder=" " value="<?= isset($_SESSION['inputs']['Stk']) ? $_SESSION['inputs']['Stk']: '' ?>"  ><br>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Couleur : </label>
                            <input type="text" class="form-control" name="color" placeholder=" " value="<?= isset($_SESSION['inputs']['color']) ? $_SESSION['inputs']['color']: '' ?>"  ><br>
                        </div>


                        <div class="form-group">
                            <label for="exampleFormControlInput1">Produit bloqué ? :</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="choix" id="inlineRadio1" value="Y"  >
                                <label class="form-check-label" for="">Oui</label>
                                <input class="form-check-input" type="radio" name="choix" id="inlineRadio2" value="N" >
                                <label class="form-check-label" for="">Non</label>
                             </div>


                        <div class="form-group">
                            <label for="Bdate" class="col-form-label "> Date d'ajout : </label>
                            <input type="date" class="form-control"  id="start" name="trip-start_1" value="<?= isset($_SESSION['inputs']['trip-start_1']) ? $_SESSION['inputs']['trip-start_1']: '' ?>"  min="1900-01-01" max="2030-12-31" >
                        </div>

                        <div class="form-group">
                            <label for="Bdate" class="col-form-label "> Date de modification : </label>
                            <input type="date" class="form-control"  id="start" name="trip-start_2" value="<?= isset($_SESSION['inputs']['trip-start_2']) ? $_SESSION['inputs']['trip-start_2']: '' ?>"  min="1900-01-01" max="2030-12-31" >
                        </div>


                        <div class="form-check text-center">
                            <input class="btn btn-dark" type="reset" value="Retour">
                            <input class="btn btn-success" type="submit" value="Modifier">
                            <input class="btn btn-dark" type="reset" value="Supprimer">
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