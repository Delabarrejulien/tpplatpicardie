<?php
session_start();

require_once(dirname(__FILE__) . '/../models/User.php');

// definition de l'id par session

$idprofil = $_SESSION['id'];

if(!$idprofil){
    header('location:/../views/templates/badHeader.php');
}
/*************************************************************/

// Appel à la méthode statique permettant de récupérer toutes les infos d'un user

$user = User::get($idprofil);

/*************************************************************/

$select= new User();
$selectuser=$select->select($_SESSION['id']);


/* ************* AFFICHAGE DES VUES **************************/

include(dirname(__FILE__) . '/../views/templates/headerLight.php');
    include(dirname(__FILE__) . '/../views/usersLog/viewProfil.php');
include(dirname(__FILE__) . '/../views/templates/footer.php');

