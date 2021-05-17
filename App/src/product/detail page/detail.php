<?php
session_start();
require 'connect_detail.php';
include '/Users/aurelienc/Desktop/AFPA_Jarditou/DW 2021/Jarditou PHP V2/App/src/Include_/Header_A.php';
?>

                    <!-- Formulaire d'ajout ou suppression-->
                    <div class="container ">

                        <div class="row my-4">
                        <div class="col-6">
                        <h4>DÉTAIL DU PRODUIT:   <?= $produit->pro_libelle; ?></h4>
                        </div>
                        <div class="col-4">
                        <img style="width:35%" src="/DW 2021/Jarditou PHP V2/App/img/photo_produit/<?= $produit->pro_photo?>">
                        </div>
                        </div>
                        

                        <form action="" method="GET" name="detail">
                    
                    <!-- Implémentation du champs avec Isset afin de vérifier le champs (est il rempli ?) si oui le laisser rempli ou si non le laisser vide -->
                    <div class="row">
                        <div class="col" id="one">
                        <fieldset disabled>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Id </label>
                                    <input type="text" class="form-control" name="" placeholder="" value="<?= $produit->pro_id ?>" >
                                </div>
                            
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Références </label>
                                    <input type="text" class="form-control" name="Ref" placeholder="" value="<?= $produit->pro_ref; ?>" >
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Catégorie </label>
                                    <input type="text" class="form-control" name="Cat" placeholder="" value=" <?= $produit->pro_cat_id; ?>"  >
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Libellé </label>
                                    <input type="text" class="form-control" name="Lib" placeholder=" " value=" <?= $produit->pro_libelle; ?> " >
                                </div>
                        </fieldset>
                        </div>

                    <div class="col" id="two">
                    <fieldset disabled>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Prix </label>
                                <input type="text" class="form-control" name="Prix" placeholder=" " value=" <?= $produit->pro_prix; ?> "  >
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Stock </label>
                                <input type="text" class="form-control" name="Stk" placeholder=" " value=" <?= $produit->pro_stock; ?> " >
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Couleur </label>
                                <input type="text" class="form-control" name="color" placeholder=" " value=" <?= $produit->pro_couleur; ?> "  >
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Description</label>
                                <textarea class="form-control" rows="3" name="desc" value=" " ><?= $produit->pro_description; ?></textarea>
                            </div>
                    </fieldset>
                    </div>
                    </div>
                    <hr>

                    <div class="row" id="four">
                        <div class="col-sm">
                            <div class="form-group">
                                        <fieldset disabled>
                                <label>Produit bloqué</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="choix" id="inlineRadio1" value="1" <?= $produit->pro_bloque == 1 ? 'checked' : ''  ?>  >
                                            <label class="form-check-label" for="">Oui</label>
                                        <input class="form-check-input" type="radio" name="choix" id="inlineRadio2" value="0" <?= $produit->pro_bloque  == 0 ? 'checked' : '' ?> >
                                            <label class="form-check-label" for="">Non</label>
                                    </div>
                                        </fieldset>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="form-group">
                                <label >Date d'ajout : </label>
                                        <?= $produit->pro_d_ajout; ?> 
                            </div>
                        </div>

                        <div class="col-sm">
                            <label for="exampleFormControlInput1">Date de modification : </label> 
                                <?= $produit->pro_d_modif; ?> 
                        </div>
                    </div>

                    

                        <div class="form-check text-center">
                            <a class="btn btn-dark text-light" role="button"  href="/DW 2021/Jarditou PHP V2/App/src/product/product.php" > Retour </a>
                            <a class="btn btn-success text-light" role="button"  href="/DW 2021/Jarditou PHP V2/App/src/product/update page/update.php?id=<?= $produit->pro_id ?>"> Modifier </a>
                            <a class="btn btn-danger text-light" role="button"  href="/DW 2021/Jarditou PHP V2/App/src/product/delete page/delete.php?id=<?= $produit->pro_id ?>"> Suppression </a>
                        </div>
                        <br>
                    </form>
                </div>

<?php include '/Users/aurelienc/Desktop/AFPA_Jarditou/DW 2021/Jarditou PHP V2/App/src/Include_/Footer_B.php';?>