#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------
CREATE DATABASE IF NOT EXISTS `platpicardie` CHARACTER SET 'utf8';
USE `platpicardie`;

#------------------------------------------------------------
# Table: user
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `user`(
        `id`        Int  Auto_increment  NOT NULL ,
        `name`      Varchar (50) NOT NULL ,
        `firstname` Varchar (50) NOT NULL ,
        `birthday`  Date ,
        `mail`      Varchar (255) NOT NULL ,
        `pseudo`    Varchar (30) NOT NULL ,
        `password`  Char (60) NOT NULL ,
        `statut`    Int NOT NULL
	,CONSTRAINT user_PK PRIMARY KEY (`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ingredient
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `ingredient`(
        `id`          Int  Auto_increment  NOT NULL ,
        `name`        Varchar (50) NOT NULL ,
        `unit_mesure` Varchar (10) NOT NULL
	,CONSTRAINT ingredient_PK PRIMARY KEY (`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table:  category
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `category`(
        `id`          Int  Auto_increment  NOT NULL ,
        `description` Varchar (30) NOT NULL
	,CONSTRAINT category_PK PRIMARY KEY (`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: cooking
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `cooking`(
        `id`           Int  Auto_increment  NOT NULL ,
        `name`         Varchar (50) NOT NULL ,
        `description`  Text NOT NULL ,
        `step`         Text NOT NULL ,
        `id__category` Int NOT NULL ,
        `id_user`     Int NOT NULL
	,CONSTRAINT cooking_PK PRIMARY KEY (`id`)

	,CONSTRAINT cooking_category_FK FOREIGN KEY (`id__category`) REFERENCES category(id)
	,CONSTRAINT cooking_user0_FK FOREIGN KEY (`id_user`) REFERENCES user(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: comment
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `comment`(
        `id`         Int  Auto_increment  NOT NULL ,
        `comment`    Varchar (200) ,
        `id_cooking` Int NOT NULL ,
        `id_user`    Int NOT NULL
	,CONSTRAINT comment_PK PRIMARY KEY (`id`)

	,CONSTRAINT comment_cooking_FK FOREIGN KEY (`id_cooking`) REFERENCES cooking(id)
	,CONSTRAINT comment_user0_FK FOREIGN KEY (`id_user`) REFERENCES user(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: image
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `image`(
        `id`         Int  Auto_increment  NOT NULL ,
        `name`       Varchar (50) NOT NULL ,
        `id_cooking` Int NOT NULL
	,CONSTRAINT image_PK PRIMARY KEY (`id`)

	,CONSTRAINT image_cooking_FK FOREIGN KEY (`id_cooking`) REFERENCES cooking(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: contains
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `contains`(
        `id`            Int NOT NULL ,
        `id_ingredient` Int NOT NULL ,
        `quantity`      Varchar (5) NOT NULL
	,CONSTRAINT contains_PK PRIMARY KEY (`id`,`id_ingredient`)

	,CONSTRAINT contains_cooking_FK FOREIGN KEY (`id`) REFERENCES cooking(id)
	,CONSTRAINT contains_ingredient0_FK FOREIGN KEY (`id_ingredient`) REFERENCES ingredient(id)
)ENGINE=InnoDB;

