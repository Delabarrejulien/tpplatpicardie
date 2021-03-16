
<div id="navbar" class="col-12 m-auto ">

<nav class=" navbar navbar-expand-md navbar-black bg-black">
    <a id="navbarAccueil" class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">Recettes</a>
                <div id="dropMenu" class="dropdown-menu">
                    <a class="dropdown-item" href="../../controllers/viewRecipesCtrl.php">Pour chaque saison</a>
                    <a class="dropdown-item" href="#">Spécialité Baie de Somme</a>
                    <a class="dropdown-item" href="#">Viande, poisson ou légumes</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">Découverte</a>
                <div id="dropMenu" class="dropdown-menu">
                    <a class="dropdown-item" href="#">Coté terre</a>
                    <a class="dropdown-item" href="#">Coté mer</a>

                </div>
            </li>
            <li class="nav-item"><a class="nav-link " href="../../controllers/viewRecipesCtrl.php">Annuaire</a></li>
            <li class="nav-item"><a class="nav-link " href="#">Contact</a></li>
            
            <?php
                if(!empty($_SESSION['pseudo'])){
                    echo '
                    <li class="nav-item"><a class="nav-link " href="/../controllers/viewProfilCtrl.php">'.$_SESSION['pseudo'].'</a></li>
                    <li class="nav-item" class="important"><a class="nav-link " href="/../controllers/signoutCtrl.php">Déconnexion</a></li>';
                } else {
                    echo '<li class="nav-item"><a class="nav-link " href="/../controllers/loginCtrl.php">Connexion/inscription</a></li>';
                }
                ?>
            
            <li class="nav-item"><a class="nav-link " href="/../controllers/createRecipeFirstCtrl.php">créer une recette</a></li>
        </ul>

    </div>
</nav>
</div>

