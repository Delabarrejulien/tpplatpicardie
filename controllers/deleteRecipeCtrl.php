<?php

session_start();

require_once(dirname(__FILE__) . '/../models/cooking.php');
require_once(dirname(__FILE__) . '/../models/user.php');

$errorArray = [];

// Nettoyage de l'id passé en GET dans l'url
$id = intval(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));

$cooking = intval(Cooking::delete($id));



header('location: /../views/templates/greatHeader.php');
