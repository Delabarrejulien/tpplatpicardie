<?php
session_start();

require_once(dirname(__FILE__) . '/../models/User.php');

// Nettoyage de l'id passé en GET dans l'url

$idprofil = $_SESSION['id'];

/*************************************************************/

// Appel à la méthode statique permettant de récupérer toutes les infos d'un patient

$user = User::get($idprofil);

/*************************************************************/

$select= new User();
$selectuser=$select->select($_SESSION['id']);


/* ************* AFFICHAGE DES VUES **************************/

include(dirname(__FILE__) . '/../views/templates/headerLight.php');
    include(dirname(__FILE__) . '/../views/usersLog/viewProfil.php');
include(dirname(__FILE__) . '/../views/templates/footer.php');

