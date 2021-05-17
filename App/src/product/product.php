<?php 
session_start();
$title = "Jarditou - Page produits";
include '../Include_/Header_A.php';
require 'connect_product.php';
?>
    <!-- Espace : En tete du tableau --> 

    

    <section>
      <div class="container">
      <div class="row">
    
          <div class="col"> 
            <h1>NOS PRODUITS</h1>
          </div>
          <div class="col-1"> 
            <a class="btn btn-success text-light" role="button" href="/DW 2021/Jarditou PHP V2/App/src/product/add page/add.php"> + </a>
          </div>
    
         
      </div>
      
      <hr>

        <table class="table table-striped text-center align-items-center ">
          <thead>
            <tr class="table-primary">
                <th scope="col">Photo</th>
                <th scope="col">ID</th>
                <th scope="col">Référence</th>
                <th scope="col">Libéllé</th>
                <th scope="col">Prix(€)</th>
                <th scope="col">Stock</th>
                <th scope="col">Couleur</th>
                <th scope="col">Ajout</th>
                <th scope="col">Modif</th>
                <th scope="col">Bloqué</th>
            </tr>
          </thead>
          <tbody>
          <!-- Espace : Injection des données de la BDD --> 
                <?php
          // On stocke le résultat dans un tableau associatif
                while($row = $articles->fetch(PDO::FETCH_OBJ)){
                ?>
                <tr class="table text-center align-items-center"> 
                  <td>  <img style="width:35%" src="/DW 2021/Jarditou PHP V2/App/img/photo_produit/<?= $row->pro_photo?>"></td>
                  <td>  <?= $row->pro_id ?></td>
                  <td>  <?= $row->pro_ref ?></td>                     
                  <td><a href="/DW 2021/Jarditou PHP V2/App/src/product/detail page/detail.php?id=<?= $row->pro_id ?>"> <?=$row->pro_libelle?></a>
                  <td>  <?= $row->pro_prix ?></td>
                  <td>  <?= $row->pro_stock ?></td>
                  <td>  <?= $row->pro_couleur ?></td>
                  <td>  <?= $row->pro_d_ajout ?></td>
                  <td>  <?= $row->pro_d_modif ?></td>
                  <td>  <?= $row->pro_bloque ?></td>
                </tr>
                <?php
                  }
                ?>
            </tbody>
        </table> 

         <nav>
                    <ul class="pagination pagination-sm">
                        <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                        <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                            <a href="./product.php//?page=<?= $currentPage - 1 ?>" class="page-link">Préc.</a>
                        </li>
                        <?php for($page = 1; $page <= $pages; $page++): ?>
                          <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                          <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                                <a href="./product.php/?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                            </li>
                        <?php endfor ?>
                          <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                          <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                            <a href="./product.php/?page=<?= $currentPage + 1 ?>" class="page-link">Suiv.</a>
                        </li>
                    </ul>
                </nav> 
      </div>         
    </section>

               

      
                    
<?php include '../Include_/Footer_B.php';  ?>
 