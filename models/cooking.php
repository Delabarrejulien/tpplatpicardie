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
       
        return $e->getCode();

    }
  
    }

    // Méthode qui permet de recuperer une recette selon un id


    public static function get($id){

     
        
        $pdo = Database::getInstance();

        try{
            $sql = 'SELECT * FROM `cooking` 
                    WHERE `id` = :id;';
            $sth = $pdo->prepare($sql);

            $sth->bindValue(':id',$id,PDO::PARAM_INT);
            $sth->execute();
            return($sth->fetch());
        }
        catch(PDOException $e){
            
            return $e->getCode();
        }

    }

  

    // Méthode qui permet de lister toutes les recettes 

    public static function getAllcook($search='', $limit=null, $offset=0){
        
        $pdo = Database::getInstance();

        try{
            if(!is_null($limit)){
            $sql = 'SELECT * FROM `cooking`
            WHERE `name`LIKE :search
            OR `categorie` LIKE :search
            LIMIT :limit OFFSET :offset;';
            }else{
                $sql = 'SELECT * FROM `cooking`
                WHERE `name` LIKE :search
                OR `categorie` LIKE :search;';
            }

            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':search','%'.$search.'%',PDO::PARAM_STR);

            if(!is_null($limit)){
                $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
                $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
            }

            $stmt->execute();
            return($stmt->fetchAll());
        }
        catch(PDOException $e){
            return false;
        }

    }

    
      //Méthode qui permet de récupérer les recettes d'un utilisateur
      public static function getAllMyCook($id){

        $pdo = Database::getInstance();

        try{
            $sql = '    SELECT `cooking`.`id` as `CookingId`, `user`.`id` as `userId`, `user`.*, `cooking`.* 
                        FROM `cooking` 
                        INNER JOIN `user`
                        ON `cooking`.`id_user` = `user`.`id`
                    
                        WHERE `user`.`id` = :id;';
            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(':id',$id,PDO::PARAM_INT);
            $stmt->execute() ;

            return $stmt->fetchAll();
        }
        catch(PDOException $e){

        
            return false;
        }

    }

    //Méthode qui permet de supprimer une recette


    public static function delete($id){

        $pdo = Database::getInstance();

        try{
            $sql = 'DELETE FROM `cooking`
                    WHERE `id` = :id;';
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':id',$id,PDO::PARAM_INT);
            $sth->execute();
    
        }
        catch(PDOException $e){

            return $e->getCode();
        }
    }


    

    //Méthode  pour compter les recettes

    public static function count($s){
        $pdo = Database::getInstance();
        try{
            $sql = 'SELECT * FROM `cooking`
                WHERE `name` LIKE :search 
                OR `categorie` LIKE :search;';

            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':search','%'.$s.'%',PDO::PARAM_STR);
            $stmt->execute();
            return($stmt->rowCount());
        }
        catch(PDOException $e){
            return 0;
        }
    }
    

}