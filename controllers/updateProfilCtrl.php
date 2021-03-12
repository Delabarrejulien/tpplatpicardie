<?php

session_start();

require_once(dirname(__FILE__).'/../utils/regex.php');
require_once(dirname(__FILE__).'/../models/user.php');  

// Initialisation du tableau d'erreurs

$errorarray= array();

        
$id = $_SESSION['id'];

$user = new User();
$profil = $user->get($id);


//On ne controle que s'il y a des données envoyées 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
var_dump($_POST);

// On verifie l'existance et on nettoie
    $name=trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

 //On test si le champ n'est pas vide
    if(!empty($name)){

        $testRegex= preg_match(REGEX_STR_NO_NUMBER,$name);

        if($testRegex == false){
            $errorarray['name_error'] = 'not valid';
        }
    }else{
        $errorarray['name_error'] = 'request';
    }



    $firstname=trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

    if(!empty($firstname)){

        $testRegex= preg_match(REGEX_STR_NO_NUMBER,$firstname);
        if($testRegex == false){
            $errorarray['firstname_error'] = 'not valid';
        }
    }else{
        $errorarray['firstname_error'] = 'request';
    }



    $birthday=trim(filter_input(INPUT_POST, 'birthday', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

    if(!empty($birthday)){
       
        $testRegex= preg_match(REGEX_DATE,$birthday);
        if($testRegex == false){
            $errorarray['birthday_error'] = 'not valid';
        }
    }else{
        $errorarray['birthday_error'] = 'request';
    }


    



    $mail=trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL));

    if(!empty($mail)){

        $testRegex= preg_match(REGEX_MAIL,$mail);
        if($testRegex == false){
            $errorarray['mail_error'] = 'not valid';
        }
    }else{
        $errorarray['mail_error'] = 'request';
    }
    


    $pseudo=trim(filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

    if(!empty($pseudo)){

        $testRegex= preg_match(REGEXP_PSEUDO,$pseudo);
        if($testRegex == false){
            $errorarray['pseudo_error'] = 'not valid';
        }
    }else{
        $errorarray['pseudo_error'] = 'request';
    }

    $password=trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

    if(!empty($password)){

        $testRegex= preg_match(REGEXP_PASS,$password);
        if($testRegex == false){
            $errorarray['password_error'] = 'not valid';
        }
    }else{
        $errorarray['password_error'] = 'request';
    }

    
    
    

 // ***************************************************************

    // Si il n'y a pas d'erreurs, on met à jour le patient.
    if(empty($errorsArray) ){    
        $user = new User($name, $firstname, $birthday, $mail, $pseudo, $password);

        
        $result = $user->update($id);
        if($result===true){
            header('location:/../views/templates/greatHeader.php');
        } else {
            // Si l'enregistrement s'est mal passé, on affiche à nouveau le formulaire de création avec un message d'erreur.
            $msgCode=$result;
        }
    }
} else {
    $user= user::get($id);
    // Si le patient n'existe pas, on redirige vers la liste complète avec un code erreur
    if($user){
        $id = $user->id;
        $name = $user->name;
        $firstname = $user->firstname;
        $birthday = $user->birthday;
        $mail = $user->mail;
        $pseudo = $user->pseudo;
        $password = $user->password;
        
    } else {
        header('location: /controllers/list-patientCtrl.php?msgCode=3');
    }
    
}





include(dirname(__FILE__) . '/../views/templates/headerLight.php');

include(dirname(__FILE__) . '/../views/usersLog/updateProfil.php');

include(dirname(__FILE__) . '/../views/templates/footer.php');

?>