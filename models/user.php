<?php
require_once dirname(__FILE__).'/../utils/Database.php';

// Déclaration de mon model User
class User{

    private $_mail;
    private $_pseudo;
    private $_password;

    private $_pdo;

    // Méthode magique construct, appellée auto à l'instanciation de la classe 
    public function __construct(){
        $this->_pdo = Database::getInstance();
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
    public function get($id){
        $sql = 'SELECT * from `user` WHERE `id` = :id;';
        $stmt = $this->_pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return ($stmt->fetch());
    }

    // Récupération de toutes les infos de tous les user
    public function getAll($id){
        $sql = 'SELECT * from `user`;';
        $stmt = $this->_pdo->query($sql);
        return ($stmt->fetchAll());
    }

    // Mise à jour d'un user selon un id
    public function update($id){
        try {
            $sql = 'UPDATE `user` 
                SET `pseudo` = :pseudo, `mail` = :mail, `password` = :password 
                WHERE `user`.`id` = :id;';
            $stmt = $this->_pdo->prepare($sql);
            $stmt->bindValue(':pseudo', $this->_pseudo, PDO::PARAM_STR);
            $stmt->bindValue(':mail', $this->_mail, PDO::PARAM_STR);
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

}