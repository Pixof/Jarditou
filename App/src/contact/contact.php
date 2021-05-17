<?php
session_start();
$title = "Jarditou - Page de contact";
include '../Include_/Header_A.php'; 
?>

                    
                
                <!-- Manque à optimiser : - Ne garde pas en visu le bouton radio et la séection des sujets -->
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

                <!-- Partie formulaire : -->
                    
                    <h2 class="text-center text-uppercase"> Vos Coordonnées </h2>
                    <p style="font-size: 10px;">* Ces zones sont obligatoire</p> 
                        <hr>
                    <form action="control_contact.php" method="POST" name="inscription">
                    

                <!-- Implémentation du champs avec Isset afin de vérifier le champs (est il rempli ?) si oui le laisser rempli ou si non le laisser vide -->
                        
                <div class="row">

                    <div class="one col">
                            <div class="form-group">
                                <label class="col-form-label "> Civilité* :</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="gender">
                                        <option  selected disabled > Votre civilité </option>
                                        <option value = "F" <?= $_SESSION['inputs']['gender'] == "F" ? 'selected' : '' ?> >  Mme   </option>
                                        <option value = "M" <?= $_SESSION['inputs']['gender'] ==  "M" ? 'selected' : '' ?> > M. </option>
                                    </select>
                            </div>
                             <div class="form-group">
                                <label for="exampleFormControlInput1" class="col-form-label "> Nom*</label>
                                    <input type="text" class="form-control" name="firstname" placeholder="Veuillez saisir votre nom" required pattern="^[A-Za-z '-]+$" maxlength="20" value="<?= isset($_SESSION['inputs']['firstname']) ? $_SESSION['inputs']['firstname']: '' ?>"  >
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1" class="col-form-label ">Prénom*</label>
                                    <input type="text" class="form-control" name="lastname" placeholder="Veuillez saisir votre prénom" required pattern="^[A-Za-z '-]+$" maxlength="20" value="<?= isset($_SESSION['inputs']['lastname']) ? $_SESSION['inputs']['lastname']: '' ?>" >
                            </div>
                            <div class="form-group">
                                <label for="Bdate" class="col-form-label "> Date de naissance*</label>
                                    <input type="date" class="form-control"  id="start" name="birthday" value="<?= isset($_SESSION['inputs']['birthday']) ? $_SESSION['inputs']['birthday']: '' ?>"  min="1900-01-01" max="2030-12-31" >
                            </div>
                    </div>

                        <div class="seconde col">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1" class="col-form-label">Code postal*</label>
                                        <input type="text" class="form-control" id="Codeposatal" name="postalCode" placeholder="Veuillez saisir votre Code postale" maxlength="6" value="<?= isset($_SESSION['inputs']['postalCode']) ? $_SESSION['inputs']['postalCode']: '' ?>" >  
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlInput1" class="col-form-label">Adresse</label>
                                        <input type="text" class="form-control" id="adresse" name="address" placeholder="Veuillez saisir votre Adresse" required pattern="^[A-Za-z '-]+$" maxlength="35" value="<?= isset($_SESSION['inputs']['address']) ? $_SESSION['inputs']['address']: '' ?>">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlInput1" class="col-form-label">Ville</label>
                                        <input type="text" class="form-control" id="ville"  name="city" placeholder="Veuillez saisir votre Ville" required pattern="^[A-Za-z '-]+$" maxlength="20" value="<?= isset($_SESSION['inputs']['city']) ? $_SESSION['inputs']['city']: '' ?>">
                                </div>

                                 <div class="form-group">
                                    <label for="exampleFormControlInput1" class="col-form-label">Email*</label>
                                         <input type="email" class="form-control" name="email" placeholder="Roger.Love@gmail.com" placeholder="Veuillez saisir votre Email" id="email" required pattern="^[A-Za-z]+@{1}[A-Za-z]+\.{1}[A-Za-z]{2,}$" value="<?= isset($_SESSION['inputs']['email']) ? $_SESSION['inputs']['email']: '' ?>" >
                                </div>
                        </div>     
                </div>


                    <hr>
                         
                    <h2 class="text-center text-uppercase ">Votre demande</h2> 
                        <div >
                            <label for="exampleFormControlSelect1">Pour quel sujet :</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="select">
                                <option  selected disabled > Veuillez sélectionner un sujet </option>
                                    <option value = "order" <?= $_SESSION['inputs']['select'] == "order" ? 'selected' : '' ?> >  Mes commandes   </option>
                                    <option value = "product" <?= $_SESSION['inputs']['select'] ==  "product" ? 'selected' : '' ?> > Question sur un produit  </option>
                                    <option value = "claim" <?= $_SESSION['inputs']['select'] == "claim" ? 'selected' : '' ?> > Réclamation  </option>
                            </select>
                        </div>

                        <div >
                            <label for="exampleFormControlTextarea1">Posez votre question*:</label>
                            <textarea class="form-control" id="commentaire" rows="2" name="comment" required pattern="^[A-Za-z '-]+$"> <?= isset($_SESSION['inputs']['comment']) ? $_SESSION['inputs']['comment'] : '' ?></textarea>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value=" " id="cgu" required >
                            <label class="form-check-label" for="cgu">J'accepte les conditions générales d'utilisation et de vente </label>
                            <div class="invalid-feedback">Vous devez accepter les CGU pour continuer</div>
                        </div>
                        <br>

                        <div class="form-check text-center">
                            <input class="btn btn-dark" type="submit" value="Envoyer votre demande">
                        </div>
                        <br>

                    </form>
                     
                <!-- Espace : Pide de page --> 

<?php include '../Include_/Footer_B.php'; ?>


 <!-- Nettoyagede la session php Lors du rafraichissement de la page : 
Les inputs sont effacé après l'envoi du formulaire complet.
Les erreurs sont effacées à chaque fois qu'un champs est rempli après avoir appuyé sur 'envoyer'-->

<?php
unset($_SESSION['inputs']);
unset($_SESSION['success']);
unset($_SESSION['error']);
?>