<?php
session_start(); 
require 'connect_update.php'; 
// connect_update fait le pont pour récupérer le ID de l'article
include '/Users/aurelienc/Desktop/AFPA_Jarditou/DW 2021/Jarditou PHP V2/App/src/Include_/Header_A.php';
?>

                    <?php if(array_key_exists('error', $_SESSION)): ?>
                            <div class="alert alert-danger">
                                    <?= implode('<br>', $_SESSION['error']); ?>
                            </div>
                    <?php endif; ?>
                <!-- Alert d'envoi du message si tous les champs sont saisies. Message de success. -->
                    <?php if(array_key_exists('success', $_SESSION)): ?>
                            <div class="alert alert-success">
                                     Modifications validées
                            </div>
                    <?php endif; ?>  

<!-- Formulaire d'ajout ou suppression-->
<!-- Formulaire d'ajout ou suppression-->
<div class="container ">

                    <div class="row my-4">
                        <div class="col-6">
                            <h4>MODIFICATION :   <?= $produit->pro_libelle; ?></h4>
                        </div>
                            <div class="col-4">
                                <img style="width:35%" src="/DW 2021/Jarditou PHP V2/App/img/photo_produit/<?= $produit->pro_photo?>" alt="photo produit"  />
                            </div>
                        </div>
                        

    <form action="control_update.php" method="post" name="update">

    <div class="row">
        <div class="col" id="one">

        <div class="form-group">
            <label for="exampleFormControlInput1">Id </label>
            <input type="text" class="form-control" name="id" placeholder="" value="<?= $produit->pro_id ?> "><br>
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Références </label>
            <input type="text" class="form-control" name="ref" placeholder="" value="<?= $produit->pro_ref; ?>"><br>
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Catégorie </label>
            <input type="text" class="form-control" name="cat" placeholder="" value=" <?= $produit->pro_cat_id; ?>"><br>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Libellé </label>
            <input type="text" class="form-control" name="lib" placeholder=" " value=" <?= $produit->pro_libelle; ?> "><br>
        </div>
        </div>

        <div class="col" id="two">
        
        <div class="form-group">
            <label for="exampleFormControlInput1">Prix </label>
            <input type="text" class="form-control" name="price" placeholder=" " value=" <?= $produit->pro_prix; ?> "><br>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Stock </label>
            <input type="text" class="form-control" name="stock" placeholder=" " value=" <?= $produit->pro_stock; ?> "><br>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Couleur </label>
            <input type="text" class="form-control" name="color" placeholder=" " value=" <?= $produit->pro_couleur; ?> "><br>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" rows="3" name="desc" value=" "><?= $produit->pro_description; ?></textarea>
        </div>

        </div>
        </div>
        <hr>

        <div class="row" id="four">
                <div class="col-sm">
                <div class="form-group">
                <label for="exampleFormControlInput1">Produit bloqué </label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="bloc" id="inlineRadio1" value="1" <?= $produit->pro_bloque == 1 ? 'checked' : ''  ?>>
                    <label class="form-check-label" for="">Oui</label>
                    <input class="form-check-input" type="radio" name="bloc" id="inlineRadio2" value="0" <?= $produit->pro_bloque == 0 ? 'checked' : '' ?>>
                    <label class="form-check-label" for="">Non</label>
                </div>
                </div>
                </div>

                <div class="col-sm">
            <div class="form-group">
                <label for="exampleFormControlInput1">Date d'ajout : </label>
                <?= $produit->pro_d_ajout; ?> 
            </div>
            </div>

           <div class="col-sm">
                <label for="exampleFormControlInput1">Date de modification : </label>
                <?= $produit->pro_d_modif; ?>
            </div>
            </div>

            <div class="form-check text-center">
                <a class="btn btn-dark text-light" role="btn" href="/DW 2021/Jarditou PHP V2/App/src/product/product.php"> Retour </a>
                <input class="btn btn-success" type="submit" value="Modification">
            </div>
            <br>
    </form>
</div>

<?php
unset($_SESSION['inputs']);
unset($_SESSION['success']);
unset($_SESSION['error']);
?>
<?php include '/Users/aurelienc/Desktop/AFPA_Jarditou/DW 2021/Jarditou PHP V2/App/src/Include_/Footer_B.php'; ?>