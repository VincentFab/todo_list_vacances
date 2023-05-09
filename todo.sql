START TRANSACTION;

-- Supprimer une bdd si elle existe, utile pour repartir de 0
DROP DATABASE IF EXISTS `todo`;


-- Créer une bdd
CREATE DATABASE IF NOT EXISTS `todo`;

-- Utiliser une bdd
USE `todo`;


-- Créer une table si elle n'existe pas
CREATE TABLE IF NOT EXISTS `Todo_list`(
    id INTEGER NOT NULL AUTO_INCREMENT,
    title VARCHAR(50) NOT NULL,
    description VARCHAR(150) NOT NULL,
    important BOOLEAN NOT NULL default false,
    PRIMARY KEY (id)
);


INSERT INTO `Todo_list` (`title`, `description`, `important`) VALUES
('Linge', 'Lancer la machine a linge', 0),
('vaisselle', 'faire la vaisselle', 0),
('balade', 'sortir faire une balde', 0);


COMMIT;