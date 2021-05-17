<?php
session_start(); 
$title = "Jarditou - Page d'inscription";
include '../Include_/Header_A.php';
echo var_dump($user);
echo var_dump($sth);
echo var_dump($_POST);
echo var_dump( $error['email']);
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
                                     Votre inscription a bien été prise en compte. Un mail de confirmation va vous êtres envoyer.
                            </div>
                    <?php endif; ?> 
                  
            <!-- Espace : Formulaire -->
                    <!-- Regroupe les champ manquant en alerte dans la page HTML : Si une info saisie dans la session est manquante alors message d'erreur-->  
                    <h1 class="text-center">Bienvenue sur l'espace client</h1>
                    <hr>
                    <div class="container col-9">
                    <form action="control_register.php" method="post">
            <!-- Implémentation du champs avec Isset afin de vérifier le champs (est il rempli ?) si oui le laisser rempli ou si non le laisser vide -->
                    <h4 class="">Mes coordonnées</h4><br>
                
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nom*</label>
                            <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Veuillez saisir votre nom" required pattern="^[A-Za-z '-]+$" value="<?= isset($_SESSION['inputs']['firstname']) ? $_SESSION['inputs']['firstname']: '' ?>"/> 
                        </div>
                    
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Prénom*</label>
                            <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Veuillez saisir votre prénom" required pattern="^[A-Za-z '-]+$" value="<?= isset($_SESSION['inputs']['lastname']) ? $_SESSION['inputs']['lastname']: '' ?>" >
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Date de naissannce*</label>
                            <input type="date" class="form-control" name="dateBirthday" placeholder="" min="1900-01-01" max="2030-12-31" value="<?= isset($_SESSION['inputs']['dateBirthday']) ? $_SESSION['inputs']['dateBirthday']: '' ?>" ><br>
                        </div>

                        <hr>

                        <h4 class="">Mes identifiants</h4>

                        <div class="form-group">
                            <label for="exampleFormControlInput1" class="col-form-label">Email*</label>
                            <input type="email" class="form-control" name="email" placeholder="Roger.Love@gmail.com" id="email" required pattern="^[A-Za-z]+@{1}[A-Za-z]+\.{1}[A-Za-z]{2,}$" value="<?= isset($_SESSION['inputs']['email']) ? $_SESSION['inputs']['email']: '' ?>" >
                            <p class="formMessage small"> (cet email sera votre identifiant)</p>
                        </div>

                        

                        <div class="form-group">
                        <label for="exampleFormControlInput1">Mot de passe*</label>
                            <input type="password" class="form-control" name="password" placeholder="Veuillez saisir un mot de passe" maxlength="25" minlength="6" value="<?= isset($_SESSION['inputs']['password']) ? $_SESSION['inputs']['password']: '' ?>" >
                            <p class="formMessage small"> (6 caractères minimum, une majuscule, un chiffre) </p>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1"> Confirmer le Mot de passe*</label>
                            <input type="password" class="form-control" name="passwordConfirmation" placeholder="Veuillez confirmer votre mot de passe" maxlength="25" minlength="6" value="<?= isset($_SESSION['inputs']['passwordConfirmation']) ? $_SESSION['inputs']['passwordConfirmation']: '' ?>" ><br>

                        </div>

                        </div>
                        
                        <hr>
                        <div class="form-check text-center">
                            <input class="btn btn-dark" type="submit" value="Valider et poursuivre">
                        </div>
                        <br>

                    </form>

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