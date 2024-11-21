-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 21 nov. 2024 à 23:50
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bddamcorp`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(60) NOT NULL,
  `prix` int(255) NOT NULL,
  `descr` varchar(225) NOT NULL,
  `taille` int(100) NOT NULL,
  `idCat` int(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idCat` (`idCat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `assoarticlecommande`
--

DROP TABLE IF EXISTS `assoarticlecommande`;
CREATE TABLE IF NOT EXISTS `assoarticlecommande` (
  `idCommande` int(255) NOT NULL,
  `idArticle` int(255) NOT NULL,
  KEY `assoArticleCommande` (`idArticle`),
  KEY `assoCommandeArticle` (`idCommande`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total` int(100) NOT NULL,
  `qteArticle` int(100) NOT NULL,
  `statut` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(60) NOT NULL,
  `prix` int(100) NOT NULL,
  `taille` int(100) NOT NULL,
  `descr` varchar(255) NOT NULL,
  `idArticle` int(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idMenu` (`idArticle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `idCat` FOREIGN KEY (`idCat`) REFERENCES `categorie` (`id`);

--
-- Contraintes pour la table `assoarticlecommande`
--
ALTER TABLE `assoarticlecommande`
  ADD CONSTRAINT `assoArticleCommande` FOREIGN KEY (`idArticle`) REFERENCES `articles` (`id`),
  ADD CONSTRAINT `assoCommandeArticle` FOREIGN KEY (`idCommande`) REFERENCES `commande` (`id`);

--
-- Contraintes pour la table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `idMenu` FOREIGN KEY (`idArticle`) REFERENCES `articles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
