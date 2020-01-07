-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 07, 2020 at 05:13 PM
-- Server version: 5.7.24
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medical`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id_contact` int(11) NOT NULL AUTO_INCREMENT,
  `date_de_creation` date NOT NULL,
  `nom_c` varchar(255) NOT NULL,
  `email_c` varchar(255) NOT NULL,
  `message` varchar(20000) NOT NULL,
  PRIMARY KEY (`id_contact`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `diagnostique`
--

DROP TABLE IF EXISTS `diagnostique`;
CREATE TABLE IF NOT EXISTS `diagnostique` (
  `id_diagnostique` int(11) NOT NULL AUTO_INCREMENT,
  `id_dossier` int(11) NOT NULL,
  `date_de_creation` date NOT NULL,
  `id_medecin` int(11) NOT NULL,
  `diagnostique` varchar(20000) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_diagnostique`),
  KEY `id_dossier` (`id_dossier`),
  KEY `id_medecin` (`id_medecin`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnostique`
--

INSERT INTO `diagnostique` (`id_diagnostique`, `id_dossier`, `date_de_creation`, `id_medecin`, `diagnostique`) VALUES
(4, 3, '2019-09-09', 1, 'rtyvjbu'),
(3, 2, '2019-09-09', 3, 'azertyuiopdfg\r\ndfghjk\r\nhjklm'),
(2, 4, '2019-09-09', 1, 'gpf,ezf'),
(1, 1, '2019-09-21', 1, 'grippe legére'),
(5, 2, '2019-09-09', 3, 'azazaza'),
(6, 6, '2019-09-14', 3, 'test'),
(7, 3, '2019-09-21', 1, 'test'),
(8, 2, '2019-09-30', 1, 'test'),
(9, 2, '2019-09-30', 1, 'test'),
(10, 8, '2019-09-30', 1, 'test'),
(11, 8, '2019-09-30', 1, 's'),
(12, 8, '2019-09-30', 1, 's'),
(13, 8, '2019-09-30', 1, 'sa'),
(14, 8, '2019-09-30', 1, 'aa'),
(15, 8, '2019-09-30', 1, 'test1'),
(16, 8, '2019-09-30', 1, 'testmed'),
(17, 8, '2019-09-30', 1, 'testac'),
(18, 2, '2019-10-01', 1, 'sa'),
(19, 9, '2019-10-03', 1, 'testaz'),
(20, 3, '2019-10-03', 1, 'lmklho'),
(21, 8, '2019-11-11', 1, 'jhgxdjkzcgsjd');

-- --------------------------------------------------------

--
-- Table structure for table `dossier`
--

DROP TABLE IF EXISTS `dossier`;
CREATE TABLE IF NOT EXISTS `dossier` (
  `id_dossier` int(11) NOT NULL AUTO_INCREMENT,
  `id_patient` int(11) NOT NULL,
  `nom_dossier` varchar(255) CHARACTER SET utf8 NOT NULL,
  `date_de_creation_dossier` date NOT NULL,
  PRIMARY KEY (`id_dossier`),
  KEY `id_patient` (`id_patient`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dossier`
--

INSERT INTO `dossier` (`id_dossier`, `id_patient`, `nom_dossier`, `date_de_creation_dossier`) VALUES
(4, 1, 'engine', '2019-09-09'),
(2, 18, 'fracture du bra', '2019-09-14'),
(3, 13, 'test', '2019-09-27'),
(7, 1, 'test', '2019-09-20'),
(6, 1, 'colon', '2019-09-13'),
(8, 2, 'test', '2019-09-21'),
(9, 2, 'test2', '2019-09-21'),
(10, 1, 'xs', '2019-09-21'),
(11, 1, 'a', '2019-09-21'),
(13, 1, '', '2019-10-02'),
(15, 1, 's', '2019-10-03'),
(16, 1, 'a', '2019-10-03'),
(17, 1, 'sa', '2019-10-03'),
(18, 1, 'dz', '2019-10-03');

-- --------------------------------------------------------

--
-- Table structure for table `medecin`
--

DROP TABLE IF EXISTS `medecin`;
CREATE TABLE IF NOT EXISTS `medecin` (
  `id_medecin` int(11) NOT NULL AUTO_INCREMENT,
  `nom_medecin` varchar(30) DEFAULT NULL,
  `prenom_medecin` varchar(30) DEFAULT NULL,
  `specialite` varchar(30) DEFAULT NULL,
  `date_de_naissance` date NOT NULL,
  `sexe` varchar(30) NOT NULL,
  `telephone` varchar(30) DEFAULT NULL,
  `image` varchar(60000) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_medecin`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medecin`
--

INSERT INTO `medecin` (`id_medecin`, `nom_medecin`, `prenom_medecin`, `specialite`, `date_de_naissance`, `sexe`, `telephone`, `image`, `email`, `pass`) VALUES
(1, 'Mederbel', 'Sofiane', 'neuro', '1995-12-17', 'Homme', '098765437', '../uploads/doc2.jpg', 'sofiane@gmail.com', 'Sofiane123'),
(3, 'Manel', 'Basma', 'pediatre', '1997-01-25', 'Femme', '0999999999', '../uploads/doc3.jpg', 'root@basma.bs', 'Basma123'),
(17, 'ssss', 'xxwwwww', 'kjbkjk,bn', '2019-10-09', 'Homme', '23456789', '../uploads/patient.PNG', 'sofiane@gmail.comc', 'Basma123456789-'),
(21, 'benarbia', 'malek', 'neuro', '1998-11-23', 'Homme', '071451783', '../uploads/cust1.jpeg', 'malek@gmail.com', 'Malek123456789-'),
(19, 'test2', 'vzdmnz', 'lvkn k', '2019-10-24', 'Femme', 'nlknlkn', '../uploads/Health-symbol-medicine.jpg', 'sofiane@gmail.comx', 'Basma123456789-'),
(20, 'Benhamou', 'Hichem', 'Chirurgien', '1998-08-06', 'Homme', '06493264892', '../uploads/doc4.jpg', 'hichem@gmail.com', 'Basma123456789-');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `id_patient` int(11) NOT NULL AUTO_INCREMENT,
  `nom_patient` varchar(30) DEFAULT NULL,
  `prenom_patient` varchar(30) DEFAULT NULL,
  `date_de_naissance` date DEFAULT NULL,
  `sexe` varchar(30) DEFAULT NULL,
  `telephone` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_patient`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id_patient`, `nom_patient`, `prenom_patient`, `date_de_naissance`, `sexe`, `telephone`, `email`, `pass`) VALUES
(1, 'test', 'test', '1999-05-19', 'Homme', '14131413', 'test@test.ts', 'passtest'),
(18, 'mederbel', 'sofiane', '1995-12-17', 'Homme', '0659653241', 'sofiane@gmail.com', 'Sofiane123');

-- --------------------------------------------------------

--
-- Table structure for table `rendez_vous`
--

DROP TABLE IF EXISTS `rendez_vous`;
CREATE TABLE IF NOT EXISTS `rendez_vous` (
  `id_rendez_vous` int(11) NOT NULL AUTO_INCREMENT,
  `id_patient` int(11) NOT NULL,
  `date_rendez_vous` date DEFAULT NULL,
  `heure_d` time DEFAULT NULL,
  `heure_fin` time DEFAULT NULL,
  PRIMARY KEY (`id_rendez_vous`),
  KEY `id_patient` (`id_patient`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rendez_vous`
--

INSERT INTO `rendez_vous` (`id_rendez_vous`, `id_patient`, `date_rendez_vous`, `heure_d`, `heure_fin`) VALUES
(40, 1, '2019-10-17', '07:00:00', '09:00:00'),
(39, 13, '2019-09-28', '11:00:00', '12:00:00'),
(36, 18, '2019-09-29', '12:00:00', '13:00:00'),
(34, 18, '2019-09-29', '14:44:00', '15:44:00'),
(31, 2, '2019-09-30', '12:09:00', '13:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `secretaire`
--

DROP TABLE IF EXISTS `secretaire`;
CREATE TABLE IF NOT EXISTS `secretaire` (
  `id_secretaire` int(11) NOT NULL AUTO_INCREMENT,
  `nom_secretaire` varchar(30) NOT NULL,
  `prenom_secretaire` varchar(30) NOT NULL,
  `username` varchar(255) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `sexe` varchar(30) NOT NULL,
  `telephone` varchar(30) DEFAULT NULL,
  `image` longblob NOT NULL,
  `email` varchar(100) NOT NULL,
  `hashed_password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_secretaire`),
  KEY `index_username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `secretaire`
--

INSERT INTO `secretaire` (`id_secretaire`, `nom_secretaire`, `prenom_secretaire`, `username`, `date_de_naissance`, `sexe`, `telephone`, `image`, `email`, `hashed_password`) VALUES
(3, 'mederbel', 'Sofiane', 'sofiane12345', '1995-12-17', 'Homme', '067575786856', 0x617a2e706e67, 'sofiane123@gmail.com', '$2y$10$wRCTL5NZ108Qb040teSa1uKtQCt.Kg5ObHt5HeULlbNCyxfurS.5m');

-- --------------------------------------------------------

--
-- Table structure for table `urgence`
--

DROP TABLE IF EXISTS `urgence`;
CREATE TABLE IF NOT EXISTS `urgence` (
  `id_urgence` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `sexe` varchar(30) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `adress_urgence` varchar(300) NOT NULL,
  `type_urgence` varchar(50) NOT NULL,
  `description_urgence` varchar(50000) NOT NULL,
  PRIMARY KEY (`id_urgence`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `urgence`
--

INSERT INTO `urgence` (`id_urgence`, `nom`, `prenom`, `sexe`, `date_de_naissance`, `adress_urgence`, `type_urgence`, `description_urgence`) VALUES
(2, 'une ', 'personne', 'Homme', '1993-12-19', 'blida-algerie', 'Accident de voiture', 'quelques fractures aux niveau de la tÃªte le bras gauche ainsi que le tibia droite cassÃ©e, aussi des blessures sur le torse');

DELIMITER $$
--
-- Events
--
DROP EVENT `dateexpiré`$$
CREATE DEFINER=`root`@`localhost` EVENT `dateexpiré` ON SCHEDULE EVERY 1 MINUTE STARTS '2019-09-16 18:18:06' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM `rendez_vous` WHERE `date_rendez_vous` < NOW()$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
