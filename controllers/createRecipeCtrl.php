<?php
session_start();

require_once(dirname(__FILE__) . '/../utils/regex.php');

require_once(dirname(__FILE__) . '/../models/cooking.php');


// Initialisation du tableau d'erreurs
$errorsArray = array();
/*************************************/

//On ne controle que s'il y a des données envoyées 
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    // On verifie l'existance et on nettoie
    $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

    //On test si le champ n'est pas vide
    if(!empty($name)){
        // On test la valeur
        $testRegex = preg_match(REGEX_STR_NO_NUMBER,$name);

        if($testRegex == false){
            $errorsArray['name_error'] = 'Merci de choisir un nom valide';
        }
    }else{
        $errorsArray['name_error'] = 'Le champ est obligatoire';
    }

    // ***************************************************************

       // On verifie l'existance et on nettoie
       $categorie = trim(filter_input(INPUT_POST, 'categorie', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

       //On test si le champ n'est pas vide
       if(!empty($categorie)){
           // On test la valeur
           $testRegex = preg_match(REGEX_STR_NO_NUMBER,$categorie);
   
           if($testRegex == false){
               $errorsArray['categorie_error'] = 'Merci de choisir un nom valide';
           }
       }else{
           $errorsArray['categorie_error'] = 'Le champ est obligatoire';
       }

        // ***************************************************************

    //On ne controle que s'il y a des données envoyées 
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    // On verifie l'existance et on nettoie
    $ingredient = trim(filter_input(INPUT_POST, 'ingredient', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

    //On test si le champ n'est pas vide
    if(!empty($ingredient)){
        // On test la valeur
        $testRegex = preg_match(REGEX_STR_NO_NUMBER,$ingredient);

        if($testRegex == false){
            $errorsArray['ingredient_error'] = 'Merci de choisir un nom valide';
        }
    }else{
        $errorsArray['ingredient_error'] = 'Le champ est obligatoire';
    }

    // ***************************************************************

    
    // On verifie l'existance et on nettoie
    $description = trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

    //On test si le champ n'est pas vide
    if(!empty($description)){
        // On test la valeur
        $testRegex = preg_match(REGEX_STR_NO_NUMBER,$description);

        if($testRegex == false){
            $errorsArray['description_error'] = 'La description n\'est pas valide';
        }
    }else{
        $errorsArray['description_error'] = 'Le champ est obligatoire';
    }


    // ***************************************************************

    // On verifie l'existance et on nettoie
    $step = trim(filter_input(INPUT_POST, 'step', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

    //On test si le champ n'est pas vide
    if(!empty($step)){
        // On test la valeur
        $testRegex = preg_match(REGEXP_PSEUDO,$step);

        if($testRegex == false){
            $errorsArray['step_error'] = 'une erreur de syntaxe est dans le texte';
        }
    }else{
        $errorsArray['step_error'] = 'Le champ est obligatoire';
        

       // Si il n'y a pas d'erreurs, on enregistre la nouvelle recette.

       $cooking = new Cooking($name, $ingredient, $description, $step, $categorie);
       if(empty($errorsArray) ){
           $result = $cooking->createCook();
           if($result===true){
               header('location: /controllers/list-patientCtrl.php?msgCode=1');
           } else {
               // Si l'enregistrement s'est mal passé, on affiche à nouveau le formulaire de création avec un message d'erreur.
               $msgCode = $result;
           }
       }
   
   }




//affichage des vues//


include(dirname(__FILE__) . '/../views/templates/headerLight.php');

include(dirname(__FILE__) . '/../views/recipes/createRecipe.php');
  
include(dirname(__FILE__) . '/../views/templates/footer.php');