<?php


require_once(dirname(__FILE__).'/../utils/regex.php');
require_once(dirname(__FILE__).'/../models/user.php');  

$errorarray= array();

        
$id = intval(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));



$user = new User();
$profil = $user->get($id);



if($_SERVER['REQUEST_METHOD'] == 'POST'){



    $name=trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

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


    



    $mail=trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL, FILTER_FLAG_NO_ENCODE_QUOTES));

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
    
    


    if(empty($errorarray)){

        $user = new User($name, $firstname, $birthday, $pseudo, $mail, $password);

        $update = $user->update($id);


      

        if($update===true){
            header('location:updateProfilCtrl.php?msgCode=2');
        }

    }else{

        $msgCode=$update;

    }
}else{

    $user= User::get($id);



    if($user){

        $id = $user->id;
        $lastname = $user->name;
        $firstname = $user->firstname;
        $birthdate = $user->birthday;
        $phone = $user->phone;
        $mail = $user->mail;
    }else{
        header('location:/index.php?');
    }
}





include(dirname(__FILE__) . '/../views/templates/headerLight.php');

include(dirname(__FILE__) . '/../views/updateProfil.php');

include(dirname(__FILE__) . '/../views/templates/footer.php');

?>