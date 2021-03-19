<?php
session_start();

require_once(dirname(__FILE__) . '/../models/user.php');
require_once(dirname(__FILE__) . '/../models/cooking.php');



// Nettoyage de l'id passé en GET dans l'url
$id = intval(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));

if(!$id){
    header('location:/../views/templates/badHeader.php');
}
/*************************************************************/

// Appel à la méthode statique permettant de récupérer toutes les infos d'une recette
$cooking = Cooking::get($id);







include(dirname(__FILE__) . '/../views/templates/header.php');

include(dirname(__FILE__) . '/../views/recipes/viewRecipes.php');
  
include(dirname(__FILE__) . '/../views/templates/footer.php');