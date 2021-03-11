<?php 
session_start();

require_once dirname(__FILE__).'/../models/User.php';
require_once dirname(__FILE__).'/../utils/regex.php';

$errorsArray = array();
//On ne controle que s'il y a des données envoyées 
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    

    // PSEUDO
    // On verifie l'existance et on nettoie
    $pseudo = trim(filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

    

    //On test si le champ n'est pas vide
    if(!empty($pseudo)){
        // On test la valeur
        $testRegex = preg_match(REGEXP_PSEUDO,$pseudo);

        if($testRegex == false){
            $errorsArray['pseudo_error'] = 'Merci de choisir un pseudo valide';
        }
    }else{
        $errorsArray['pseudo_error'] = 'Le champ est obligatoire';
    }

    // ***************************************************************
     // EMAIL
    // On verifie l'existance et on nettoie
    $mail = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL));

    //On test si le champ n'est pas vide
    if(!empty($mail)){
        // On test la valeur
        $testMail = filter_var($mail, FILTER_VALIDATE_EMAIL);

        if($testMail == false){
            $errorsArray['mail_error'] = 'Le mail n\'est pas valide';
        }
    }else{
        $errorsArray['mail_error'] = 'Le champ est obligatoire';
    }
   

    // PASSWORD et CONFIRM_PASSWORD
    //On test si les champ ne sont pas vides
    if(!empty($_POST['password']) && !empty($_POST['confirm_password'])){
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        if($password != $confirm_password){
            $errorsArray['password_error'] = 'Les passwords ne correspondent pas '; 
        }
         //else {
        //     $testRegex = preg_match(REGEXP_PASS,$password);
        //     if($testRegex == false){
        //         $errorsArray['password_error'] = 'Merci de choisir un mdp valide répondant aux critères suivants (Au moins 8 car, 1 Maj, 1 min, 1chiffre, 1 special Char)';
        //     }
        // }
    } else {
        $errorsArray['password_error'] = 'Les champs password sont obligatoires';
    }
    
    if(empty($errorsArray)){
        $user = new User();
        $user->setPseudo($pseudo);
        $user->setMail($mail);
        $user->setPassword($password);
        $resultCreatedUser = $user->create();

       
        if($resultCreatedUser===false){
            $errorsArray['register_error'] = 'Enregistrement impossible (le mail existe déjà ?)';
        }
        
        if(empty($errorsArray)){
            // Mail d'envoi de vérification du compte
            // mail();
            // Ici on authentifie directement l'utilisateur enregistré
            $_SESSION['id'] = $resultCreatedUser;
            $_SESSION['pseudo'] = $pseudo;
            header('location: /../controllers/personnalViewCtrl.php');
        }
    }
}

include(dirname(__FILE__) . '/../views/templates/headerLight.php');

include(dirname(__FILE__) . '/../views/usersLog/register.php');

include(dirname(__FILE__) . '/../views/templates/footer.php');