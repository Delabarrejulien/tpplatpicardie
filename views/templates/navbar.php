
<div id="navbar" class="col-12 m-auto ">

<nav class=" navbar navbar-expand-md navbar-black bg-black">
    <a id="navbarAccueil" class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link " href="../../controllers/recipesListCtrl.php">les recettes</a></li>
            
            
            <?php
                if(!empty($_SESSION['pseudo'])){
                    echo '
                   
                    
                    <li class="nav-item"><a class="nav-link " href="/../controllers/createRecipeFirstCtrl.php">créer une recette</a></li>
                    <li class="nav-item"><a class="nav-link " href="/../controllers/viewMyRecipesCtrl.php">Mes recettes</a></li>
                    <li class="nav-item"><a class="nav-link " href="/../controllers/viewProfilCtrl.php">'.$_SESSION['pseudo'].'</a></li>
                    <li class="nav-item" class="important"><a class="nav-link " href="/../controllers/signoutCtrl.php">Déconnexion</a></li>';
                    
                } else {
                    echo '<li class="nav-item"><a class="nav-link " href="/../controllers/loginCtrl.php">Connexion/inscription</a></li>';
                }
                ?>
                <li class="nav-item"><a class="nav-link " href="#">Contact</a></li>
            
            
        </ul>

    </div>
</nav>
</div>

