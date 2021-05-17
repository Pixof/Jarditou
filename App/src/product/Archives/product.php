<?php 
$title = "Jarditou - Page produits";
include '../Include_/Header_A.php'; ?>

                    <!-- Espace : Text 
                  
                  Erreur : ne garde pas en stock la date de naissance ; le genre
                 la sélection, le commentaire--> 

                    <section>
                    <div class="container">
                        <table class="table table-striped text-center align-items-center ">
                            <thead>
                              <tr class="table-active text-monospace">
                                <th scope="col">Photo</th>
                                <th scope="col">ID</th>
                                <th scope="col">Catégorie</th>
                                <th scope="col">Libéllé</th>
                                <th scope="col">Prix</th>
                                <th scope="col">Couleur</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr class="table-warning"> 
                                <th scope="row" ><img class=" shadow mb-1" src="/DW 2021/Jarditou PHP V2/App/img/7.jpg" alt="Photo 7" width="100" /></th>
                                <td >7</td>
                                <td>Barbecues</td>
                                <td> <a href="/DW 2021/Jarditou PHP V2/App/src/product/ref.php"> Aramis</a></td>
                                <td>110.000€</td>
                                <td>Brun</td>
                              </tr>

                              <tr>
                                <th scope="row"><img class="img-fluid shadow mb-1" src="/DW 2021/Jarditou PHP V2/App/img/8.jpg" alt="Photo 8" width="100"/></th>
                                <td>8</td>
                                <td>Barbecues</td>
                                <td> <a href="#">Athos</a></td>
                                <td>249.99€</td>
                                <td>Noir</td>
                              </tr>

                              <tr class="table-warning">
                                <th scope="row"><img  class="img-fluid shadow mb-1" src="/DW 2021/Jarditou PHP V2/App/img/11.jpg" alt="Photo 11" width="100"/></th>
                                <td >11</td>
                                <td>Barbecues</td>
                                <td> <a href="#">Clatronic </a></td>
                                <td>135.90€</td>
                                <td>Chrome</td>
                              </tr>


                              <tr>
                                <th scope="row"><img class="img-fluid shadow mb-1" src="/DW 2021/Jarditou PHP V2/App/img/12.jpg" alt="Photo 12" width="100"/> </th>
                                <td>12</td>
                                <td>Barbecues</td>
                                <td> <a href="#">Camping </a></td>
                                <td>88.00€</td>
                                <td>Noir</td>
                              </tr>

                              <tr class="table-warning">
                                <th scope="row"><img  class="img-fluid shadow mb-1" src="/DW 2021/Jarditou PHP V2/App/img/13.jpg" alt="Photo 13" width="100"/></th>
                                <td>13</td>
                                <td>La brouette</td>
                                <td> <a href="#">Green </a></td>
                                <td>49.00€</td>
                                <td>Vert</td>
                              </tr>
                            </tbody>
                          </table>  
                      </div>         
                    </section>
                    
<?php include '../Include_/Footer_B.php';  ?>
 