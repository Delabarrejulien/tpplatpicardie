<?php
session_start();

require_once(dirname(__FILE__) . '/../models/User.php');

// Nettoyage de l'id passé en GET dans l'url
$idprofil = intval(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));
/*************************************************************/

// Appel à la méthode statique permettant de récupérer toutes les infos d'un patient
$user = User::get($idprofil);
/*************************************************************/

$select= new User();
$selectuser=$select->select($_SESSION['id']);

var_dump($selectuser);

// Si le patient n'existe pas, on redirige vers la liste complète avec un code erreur
// if(!$user){
//     header('location: /index.php?msgCode=3');
// }
/*************************************************************/


/* ************* AFFICHAGE DES VUES **************************/

include(dirname(__FILE__) . '/../views/templates/headerLight.php');
    include(dirname(__FILE__) . '/../views/usersLog/viewProfil.php');
include(dirname(__FILE__) . '/../views/templates/footer.php');

