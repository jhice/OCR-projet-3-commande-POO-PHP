-- Adminer 5.4.2 MySQL 8.0.45-0ubuntu0.24.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

-- création de la table

DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(320) NOT NULL,
  `phone_number` char(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ajout de données par défaut

INSERT INTO `contact` (`id`, `name`, `email`, `phone_number`) VALUES
(3,	'Gandalf le gris',	'gandalf@istari.com',	'01013021'),
(4,	'Buffy Summer',	'buffy@sunnydale.com',	'01091901'),
(5,	'Hermione Granger',	'hermione@magie.com',	'19091979');

-- 2026-05-08 12:16:35 UTC