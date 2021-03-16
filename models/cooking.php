<?php

require_once(dirname(__FILE__).'/../utils/database.php');


class Cooking{

    private $_name;
    Private $_ingredient;
    private $_description;
    private $_step;
    private $_categorie;
    private $_id_user;
    private $_pdo;
    
   // * Méthode magique qui permet d'hydrater notre objet 'cooking'//

   public function __construct($name=NULL, $ingredient=NULL, $description=NULL, $step=NULL,  $categorie=NULL, $id_user=NULL){

    // Hydratation de l'objet contenant la connexion à la BDD //

    $this->_name = $name;
    $this->_ingredient = $ingredient;
    $this->_description = $description;
    $this->_step = $step;
    $this->_categorie = $categorie;
    $this->_id_user = $id_user;
  
    $this->_pdo = Database::getInstance();

}

// Méthode qui permet de créer une recette //

public function createCooking($id_user){

    try{
        $sql = 'INSERT INTO `cooking` (`name`, `ingredient`, `description`, `step`, `categorie`, `id_user`) 
                VALUES (:name, :ingredient, :description, :step, :categorie, :id_user);';
        $sth = $this->_pdo->prepare($sql);

        $sth->bindValue(':name',$this->_name,PDO::PARAM_STR);
        $sth->bindValue(':ingredient',$this->_ingredient,PDO::PARAM_STR);
        $sth->bindValue(':description',$this->_description,PDO::PARAM_STR);
        $sth->bindValue(':step',$this->_step,PDO::PARAM_STR);
        $sth->bindValue(':categorie',$this->_categorie,PDO::PARAM_STR);
        $sth->bindValue(':id_user',$id_user,PDO::PARAM_INT);

      
        return $sth->execute();
    }
    catch(PDOException $e){
       

        echo $e;
    }

}

}