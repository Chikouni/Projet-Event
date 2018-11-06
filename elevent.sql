-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 06 nov. 2018 à 13:10
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `elevent`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `articleId` int(11) NOT NULL AUTO_INCREMENT,
  `authorId` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `programLang` varchar(100) NOT NULL,
  `publishedDate` datetime NOT NULL,
  `private` tinyint(1) NOT NULL,
  PRIMARY KEY (`articleId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `eventId` int(11) NOT NULL AUTO_INCREMENT,
  `eventName` varchar(100) NOT NULL,
  `eventStartTime` datetime NOT NULL,
  `eventEndTime` datetime NOT NULL,
  `eventLocation` varchar(150) DEFAULT NULL,
  `memberId` int(11) NOT NULL,
  PRIMARY KEY (`eventId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `event`
--

INSERT INTO `event` (`eventId`, `eventName`, `eventStartTime`, `eventEndTime`, `eventLocation`, `memberId`) VALUES
(1, 'Salon de l\'étudiant', '2018-12-30 09:00:00', '2019-01-01 18:00:00', 'Nantes', 3),
(2, 'Portes ouvertes HEP Nantes', '2019-03-21 16:00:00', '2019-03-21 20:00:00', '16 boulevard Général de Gaulle, 44200 Nantes', 3);

-- --------------------------------------------------------

--
-- Structure de la table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `memberId` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `dateCreated` datetime NOT NULL,
  `comment_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`memberId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `member`
--

INSERT INTO `member` (`memberId`, `pseudo`, `name`, `email`, `password`, `dateCreated`, `comment_id`) VALUES
(1, 'TestUsername', 'NomTest', 'test@test.com', '$2y$10$KT7NTrI4C3G/MNTeVNfxnu4BwzegEdk9z0UNwWoIpUEdd2shyvIiK', '2018-11-02 17:33:46', NULL),
(2, 'TestUsername', 'NomTest', 'test@test.com', '$2y$10$krN1Y8dYSankHk1DQyIRj.SQC8cqcsHC/F3UbPWEktupkqxEm/t/.', '2018-11-02 17:33:50', NULL),
(3, 'TestUsername', 'testName', 'test@test.com', '$2y$10$/UMbKVGuurG27dbjduFXr.UP1n34KnIERAOCqYTJqRNHkf3sUtfju', '2018-11-02 17:35:24', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `visitor`
--

DROP TABLE IF EXISTS `visitor`;
CREATE TABLE IF NOT EXISTS `visitor` (
  `visitorId` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `commentId` int(11) NOT NULL,
  PRIMARY KEY (`visitorId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
