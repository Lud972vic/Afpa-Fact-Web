-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           10.4.13-MariaDB-log - mariadb.org binary distribution
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.0.0.6054
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour bdd_factures
CREATE DATABASE IF NOT EXISTS `bdd_factures` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `bdd_factures`;

-- Listage de la structure de la table bdd_factures. facture
CREATE TABLE IF NOT EXISTS `facture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num` varchar(30) DEFAULT NULL,
  `numtva` varchar(20) NOT NULL,
  `client` text DEFAULT NULL,
  `mailclient` varchar(30) NOT NULL,
  `datefacture` varchar(10) DEFAULT NULL,
  `facturede` text DEFAULT NULL,
  `designation` text DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `prixht` decimal(10,0) DEFAULT NULL,
  `taxe` decimal(10,0) NOT NULL,
  `conditions` text DEFAULT NULL,
  `id_membre` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `num` (`num`),
  KEY `id_membre` (`id_membre`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table bdd_factures. membres
CREATE TABLE IF NOT EXISTS `membres` (
  `id_membre` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(255) DEFAULT NULL,
  `pseudo` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_membre`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
