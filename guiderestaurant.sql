 CREATE TABLE IF NOT EXISTS `restaurants` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `commentaire` text,
  `prix` decimal(8,2) NOT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `note` double DEFAULT NULL,
  `visite` date DEFAULT NULL,
  PRIMARY KEY (`id`),


