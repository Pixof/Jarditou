<?php 
session_start();
$title = "Jarditou - Page produits";
include 'Header_A.php'; 
require "connect_base.php"; // Inclusion de notre bibliothèque de fonctions


      $db = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Appel de la fonction de connexion

      // preparation de la requete
      $requete = "SELECT * FROM produits ";

       // On exécute la requête
      $result = $db->query($requete);

if (!$result) 
{
    $tableauErreurs = $db->errorInfo();
    echo $tableauErreur[2]; 
    die("Erreur dans la requête");
}

if ($result->rowCount() == 0) 
{
   // Pas d'enregistrement
   die("La table est vide");
}
?>

                    <!-- Espace : Text --> 

                    <section>
                    <div class="container">

                        <table class="table table-striped text-center align-items-center ">
                            <thead>
                              <tr class="table-active text-monospace">
                                <th scope="col">Photo</th>
                                <th scope="col">ID</th>
                                <th scope="col">Référence</th>
                                <th scope="col">Libéllé</th>
                                <th scope="col">Prix</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Couleur</th>
                                <th scope="col">Ajout</th>
                                <th scope="col">Modif</th>
                                <th scope="col">Bloqué</th>
                              </tr>
                              </thead>
                              <tbody>

                              <?php
                              // On stocke le résultat dans un tableau associatif
                              while($row = $result->fetch(PDO::FETCH_OBJ))
                              {
                                ?>
                                <tr class="table-warning"> 
                                <th>  <?= $row->pro_photo ?></th>
                                <td>  <?= $row->pro_id ?></td>
                                <td>  <?= $row->pro_ref ?></td>                     
                                <td><a href="/DW 2021/Jarditou PHP V2/product_test/detail.php?id=<?= $row->pro_id ?>"> <?=$row->pro_libelle?></a>
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
                      </div>         
                    </section>

                    <div class="form-check text-center">
                            <button type="button" class="btn btn-success"><a class="text-light" href="add.php"> Ajout article </a></button>
                        </div>
                    
<?php include 'Footer_B.php';  ?>
 