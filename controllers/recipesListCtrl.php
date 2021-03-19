<?php
session_start();

require_once(dirname(__FILE__).'/../models/cooking.php');
require_once(dirname(__FILE__).'/../models/user.php');


// Nettoyage de l'id passé en GET dans l'url
$id = intval(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));

// Appel à la méthode statique permettant de récupérer toutes les infos d'une recette
$cooking = Cooking::get($id);

if(!$Cooking){
    header('location:/../views/templates/badHeader.php');
}


// Récupération de la valeur recherchée et on nettoie
$s = trim(filter_input(INPUT_GET, 'search', FILTER_SANITIZE_STRING));

// On définit le nombre d'éléments par page grâce à une constante déclarée dans config.php
$limit = 5;

// Compte le nombre d'éléments au total selon la recherche
$countItems = Cooking::count($s);

// Calcule le nombre de pages à afficher dans la pagination
$nbPages = ceil($countItems / $limit);

// A recuperer depuis paramètre d'url. Si aucune valeur, alors vaut 1
$currentPage = intval(trim(filter_input(INPUT_GET, 'currentPage', FILTER_SANITIZE_NUMBER_INT)));

if($currentPage <= 0 || $currentPage > $nbPages){
    $currentPage = 1;
}

//Définit à partir de quel enregistrement positionner le curseur (l'offset) dans la requête
$offset = $limit*($currentPage-1);

// Appel à la méthode statique permettant de récupérer les patients selon la recherche et la pagination
$allCook = Cooking::getAllcook($s,$limit,$offset);






include(dirname(__FILE__) . '/../views/templates/header.php');

include(dirname(__FILE__) . '/../views/recipes/recipesList.php');
  
include(dirname(__FILE__) . '/../views/templates/footer.php');