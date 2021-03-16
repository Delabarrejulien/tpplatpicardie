#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------
CREATE DATABASE IF NOT EXISTS `platpicardie` CHARACTER SET 'utf8';
USE `platpicardie`;


#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: user
#------------------------------------------------------------

CREATE TABLE user(
        id        Int  Auto_increment  NOT NULL ,
        name      Varchar (50) NOT NULL ,
        firstname Varchar (50) NOT NULL ,
        birthday  Date ,
        mail      Varchar (255) NOT NULL ,
        pseudo    Varchar (30) NOT NULL ,
        password  Char (60) NOT NULL ,
        statut    Int NOT NULL
	,CONSTRAINT user_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: cooking
#------------------------------------------------------------

CREATE TABLE cooking(
        id          Int  Auto_increment  NOT NULL ,
        name        Varchar (50) NOT NULL ,
        ingredient  Text NOT NULL ,
        description Text NOT NULL ,
        step        Text NOT NULL ,
        categorie   Varchar (20) NOT NULL ,
        id_user     Int NOT NULL
	,CONSTRAINT cooking_PK PRIMARY KEY (id)

	,CONSTRAINT cooking_user_FK FOREIGN KEY (id_user) REFERENCES user(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: comment
#------------------------------------------------------------

CREATE TABLE comment(
        id         Int  Auto_increment  NOT NULL ,
        comment    Varchar (200) ,
        id_cooking Int NOT NULL ,
        id_user    Int NOT NULL
	,CONSTRAINT comment_PK PRIMARY KEY (id)

	,CONSTRAINT comment_cooking_FK FOREIGN KEY (id_cooking) REFERENCES cooking(id)
	,CONSTRAINT comment_user0_FK FOREIGN KEY (id_user) REFERENCES user(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: image
#------------------------------------------------------------

CREATE TABLE image(
        id         Int  Auto_increment  NOT NULL ,
        name       Varchar (50) NOT NULL ,
        id_cooking Int NOT NULL
	,CONSTRAINT image_PK PRIMARY KEY (id)

	,CONSTRAINT image_cooking_FK FOREIGN KEY (id_cooking) REFERENCES cooking(id)
)ENGINE=InnoDB;

