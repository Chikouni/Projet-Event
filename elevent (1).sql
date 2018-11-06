-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 06 Novembre 2018 à 09:50
-- Version du serveur :  5.6.37
-- Version de PHP :  7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE IF NOT EXISTS `articles` (
  `articleId` int(11) NOT NULL,
  `authorId` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `programLang` varchar(100) NOT NULL,
  `publishedDate` datetime NOT NULL,
  `private` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `eventId` int(11) NOT NULL,
  `eventName` varchar(100) NOT NULL,
  `eventStartTime` datetime NOT NULL,
  `eventEndTime` datetime NOT NULL,
  `enventLocation` varchar(150) DEFAULT NULL,
  `memberId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `memberId` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `dateCreated` datetime NOT NULL,
  `comment_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `member`
--

INSERT INTO `member` (`memberId`, `pseudo`, `name`, `email`, `password`, `dateCreated`, `comment_id`) VALUES
(1, 'TestUsername', 'NomTest', 'test@test.com', '$2y$10$KT7NTrI4C3G/MNTeVNfxnu4BwzegEdk9z0UNwWoIpUEdd2shyvIiK', '2018-11-02 17:33:46', NULL),
(2, 'TestUsername', 'NomTest', 'test@test.com', '$2y$10$krN1Y8dYSankHk1DQyIRj.SQC8cqcsHC/F3UbPWEktupkqxEm/t/.', '2018-11-02 17:33:50', NULL),
(3, 'TestUsername', 'testName', 'test@test.com', '$2y$10$/UMbKVGuurG27dbjduFXr.UP1n34KnIERAOCqYTJqRNHkf3sUtfju', '2018-11-02 17:35:24', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `visitor`
--

CREATE TABLE IF NOT EXISTS `visitor` (
  `visitorId` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `commentId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`articleId`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eventId`);

--
-- Index pour la table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`memberId`);

--
-- Index pour la table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`visitorId`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `articleId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `event`
--
ALTER TABLE `event`
  MODIFY `eventId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `member`
--
ALTER TABLE `member`
  MODIFY `memberId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `visitorId` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
