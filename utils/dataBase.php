<?php

require_once dirname(__FILE__).'/../config/config.php';

class Database{

    private static $_pdo;

    public static function getInstance(){ // va pouvoir etre appellée par Database::getInstance();

        try{
            $pdo = new PDO(DSN, LOGIN, PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            return $pdo;
        }
        catch(PDOException $e){
           echo 'erreur de connexion à la BDD : '. $e->getMessage();
        }
        return self::$_pdo;

    }
}