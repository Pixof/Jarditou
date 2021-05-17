<!doctype html>
<html lang="en">
        <head>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <title>
                <?php if (isset($title)): ?>
                    <?= $title?>
                    <?php else: ?>
                    Jarditou
                <?php endif ?>
            </title>
        </head>
 
    <body>
            
            <div class="container-fluid " >
                    <header>
                        <div class="row align-items-center">
                            <div id="block1" class=" col-lg-8 bg-white d-none d-lg-block "><img src="/DW 2021/Jarditou PHP V2/App/img/jarditou_logo.jpg" style="width:25%; height:auto; padding: 5px;"  alt="Photo" ></div>
                            <div id="block2" class=" col-lg-4 bg-white text-black d-none d-lg-block "><h3 class="text-center">Tout pour le jardin </h3></div>
                        </div>
                        <!-- deuxième partie de la mise en page : navigation -->
                            <nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded py-1 my-1">

                                <a class="navbar-brand" href="#">Jarditou.com</a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                                </button>
                                
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent"> 
                                            <ul class="navbar-nav mr-auto">
                                                <li class="nav-item ">
                                                    <a class="nav-link" href="/DW 2021/Jarditou PHP V2/App/index.php">Accueil</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link" href="/DW 2021/Jarditou PHP V2/App/src/product/product.php">Nos produits</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link" href="/DW 2021/Jarditou PHP V2/App/src/contact/contact.php">Nous contacter</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link" href="/DW 2021/Jarditou PHP V2/App/src/login/auth.php">Se connecter</a>
                                                </li>
                                            </ul>

                                            <form class="form-inline">
                                                <input class="form-control mr-sm-2" type="search" placeholder="Recherche un produit" aria-label="Search">
                                                    <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Trouver</button>
                                            </form>
                                    </div>
                            </nav>
                    </header>
                    <!-- Espace : promotion -->
                    <div class="row">
                        <img class="img-fluid col-12 shadow mb-1 bg-white" src="/DW 2021/Jarditou PHP V2/App/img/promotion.jpg" alt="responsive photo promo" >
                    </div>
            
                    <a href="http://localhost/DW%202021/Jarditou%20PHP V2/"> ICI </a>