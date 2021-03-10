<?php


session_start();

require_once(dirname(__FILE__) . '/../../models/User.php');

$select= new User();
$selectuser=$select->select($_SESSION['id']);
echo $selectuser->id ;



    include(dirname(__FILE__) . '/../templates/navbar.php');
?>

    <div class="container my-5">

    <div id="main" class="container-fluid ">
        <div class="row">

            <div id="title" class="col-12 mb-0 mx-15 px-0 py-3">
                <img src="../../assets/img/logobienvenue.jpg" class="img-fluid" alt="bienvenue picardie acceuil">


            </div>