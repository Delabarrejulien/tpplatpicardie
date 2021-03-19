<?php
require_once dirname(__FILE__).'/../utils/Database.php';

// Déclaration de mon model User
class User{

    private $_name;
    private $_firstname;
    private $_birthday;
    private $_mail;
    private $_pseudo;
    private $_password;

    private $_pdo;

    // Méthode magique construct, appellée automatiquemment à l'instanciation de la classe 
    public function __construct($name=NULL, $firstname=NULL, $birthday=NULL, $mail=NULL, $pseudo=NULL, $password=NULL){

        $this->_name = $name;
        $this->_firstname = $firstname;
        $this->_birthday = $birthday;
        $this->_mail = $mail;
        $this->_pseudo = $pseudo;
        $this->_password = $password;

        $this->_pdo = Database::getInstance();
    }

    public function setname($name){
        $this->_name = $name;
    }

    public function setfirstname($firstname){
        $this->_firstname = $firstname;
    }

    public function setbirthday($birthday){
        $this->_birthday = $birthday;
    }

    public function setMail($mail){
        $this->_mail = $mail;
    }

    public function setPseudo($pseudo){
        $this->_pseudo = $pseudo;
    }

    public function setPassword($password){
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $this->_password = $password_hash;
    }

    public function getUserLogin($mail, $password){

        $sql = "SELECT *  FROM `user` WHERE `mail` = :mail ;";
        $stmt = $this->_pdo->prepare($sql);

        // association des paramètres  
        $stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
        if($stmt->execute()){ // envoie de la requête
            $user = $stmt->fetch();
            if($user){
                // retourne l'id user si le mot de passe est vérifié
                if(password_verify($password, $user->password)){
                    return $user;
                } 
            }
        }
        return false;
    }
    
    // création d'un nouvel utilisateur
    public function create(){
        try{
            $sql = 'INSERT INTO `user` 
                    (`pseudo`, `mail`, `password`)
                    VALUES (:pseudo, :mail, :password);';
            $stmt = $this->_pdo->prepare($sql);
            $stmt->bindValue(':mail', $this->_mail, PDO::PARAM_STR);
            $stmt->bindValue(':pseudo', $this->_pseudo, PDO::PARAM_STR);
            $stmt->bindValue(':password', $this->_password, PDO::PARAM_STR);
            if($stmt->execute()){
                return $this->_pdo->lastInsertId();
            } else {
                return false;
            }
        } catch(PDOException $e){
            echo $e;
            return false;
        }
    }

    // Récupération de toutes les infos d'un user selon un id
    public static function get($id){

        $pdo = Database::getInstance();
        
        $sql = 'SELECT * from `user` WHERE `id` = :id;';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return ($stmt->fetch());
    }

    // Récupération de toutes les infos de tous les users
    public function getAll($id){
        $sql = 'SELECT * from `user`;';
        $stmt = $this->_pdo->query($sql);
        return ($stmt->fetchAll());
    }

    // Mise à jour d'un user selon un id
    public function update($id){
        try {
            $sql = 'UPDATE `user` 
                SET  `name` = :name,  `firstname` = :firstname, `birthday` = :birthday, `mail` = :mail, `pseudo` = :pseudo, `password` = :password 
                WHERE `user`.`id` = :id;';
            $stmt = $this->_pdo->prepare($sql);
            $stmt->bindValue(':name',$this->_name,PDO::PARAM_STR);
            $stmt->bindValue(':firstname',$this->_firstname,PDO::PARAM_STR);
            $stmt->bindValue(':birthday',$this->_birthday,PDO::PARAM_STR);
            $stmt->bindValue(':mail', $this->_mail, PDO::PARAM_STR);
            $stmt->bindValue(':pseudo', $this->_pseudo, PDO::PARAM_STR);
            $stmt->bindValue(':password', $this->_password, PDO::PARAM_STR);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            return ($stmt->execute());
        } catch (PDOException $e) {
            return false;
        }
        
    }

    // Suppression d'un user selon un id
    public function delete($id){
        $sql = 'DELETE from `user` WHERE `id` = :id;';
        $stmt = $this->_pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return ($stmt->execute());
    }

      // selection d'un user selon un id
      
      public function select($id){
        $sql = 'SELECT `id` from `user` WHERE `id` = :id;';
        $stmt = $this->_pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return ($stmt->fetch());
    }

}