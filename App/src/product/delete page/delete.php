<?php
session_start(); 
require 'connect_delete.php';
include '/Users/aurelienc/Desktop/AFPA_Jarditou/DW 2021/Jarditou PHP V2/App/src/Include_/Header_A.php';
?>

    <div class="container text-center">

    <img style="width:35%" src="/DW 2021/Jarditou PHP V2/App/img/photo_produit/<?= $produit->pro_photo?>">
        <br>
            <p> Êtes-vous sûr de vouloir <B> SUPPRIMER </B> le produit "<?= $produit->pro_libelle ?>"" de la base de données ? </p>
    </div>
        <br>
    

    <div class="form-check text-center">
        <a role="button" class="btn btn-dark" href="/DW 2021/Jarditou PHP V2/App/src/product/product.php"> Retour </a>
        <a role="button" class="btn btn-danger" href="/DW 2021/Jarditou PHP V2/App/src/product/delete page/control_delete.php?id=<?= $produit->pro_id ?>"> Suppression </a>
    </div>
        <br>

<!--Espace : Pied de page -->
<?php include '/Users/aurelienc/Desktop/AFPA_Jarditou/DW 2021/Jarditou PHP V2/App/src/Include_/Footer_B.php'; ?>

