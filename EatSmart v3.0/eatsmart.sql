-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 04 déc. 2024 à 17:59
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
-- Base de données : `eatsmart`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prix` int(10) NOT NULL,
  `descr` varchar(150) NOT NULL,
  `taille` varchar(10) DEFAULT NULL,
  `idCatérogie` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idArtCat` (`idCatérogie`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `nom`, `prix`, `descr`, `taille`, `idCatérogie`) VALUES
(1, '5Tet8HW', 7, '5 Tenders et 8 Hot Wings', NULL, 1),
(2, 'T10et16HW', 15, '10 Tenders et 16 Hot Wings', NULL, 1),
(3, 'T20et32HW', 23, '20 Tenders et 32 Hot Wings', NULL, 1),
(4, 'DoubleKrunch', 5, 'Un burger croustillant avec du fromage, sans tomate', NULL, 2),
(5, 'ColonelOriginal', 6, 'Burger avec filet de poulet croustillant et fromage', NULL, 2),
(6, 'DoubleStacker', 7, 'Burger au poulet avec fromage et bacon', NULL, 2),
(7, 'MauN', 2, 'Muffin moelleux au Nutella.', NULL, 3),
(8, 'KreamBall', 2, 'Crème glacée en coupe.', NULL, 3),
(9, 'Pom\'Potes Bio', 2, 'Compote de pommes bio.', NULL, 3);

-- --------------------------------------------------------

--
-- Structure de la table `assoarticlecommande`
--

DROP TABLE IF EXISTS `assoarticlecommande`;
CREATE TABLE IF NOT EXISTS `assoarticlecommande` (
  `IdACommande` int(11) NOT NULL,
  `IdArticle` int(11) NOT NULL,
  PRIMARY KEY (`IdACommande`,`IdArticle`),
  KEY `AssoArt` (`IdArticle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `catégorie`
--

DROP TABLE IF EXISTS `catégorie`;
CREATE TABLE IF NOT EXISTS `catégorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `catégorie`
--

INSERT INTO `catégorie` (`id`, `nom`) VALUES
(1, 'Poulet & Bucket'),
(2, 'Burgers'),
(3, 'Desserts');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL,
  `total` int(11) DEFAULT NULL,
  `qteArticle` varchar(50) DEFAULT NULL,
  `statut` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `taille` varchar(50) DEFAULT NULL,
  `Description` varchar(150) DEFAULT NULL,
  `idArticle` int(11) NOT NULL,
  `idCat` int(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IdMenuArt` (`idArticle`),
  KEY `idMenuCat` (`idCat`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`id`, `nom`, `prix`, `taille`, `Description`, `idArticle`, `idCat`) VALUES
(1, 'MenuS', 8, 'S', 'Comprend 5 Tenders et 8 Hot Wings avec une boisson.', 1, 1),
(2, 'BucketM', 16, 'M', 'Comprend 10 Tenders et 16 Hot Wings avec une boisson.\r\n\r\n', 2, 1),
(3, 'BucketL', 24, 'L', 'Comprend 20 Tenders et 32 Hot Wings avec une boisson.', 3, 1),
(4, 'Double Krunch®', 6, 'M', 'Un burger croustillant avec du fromage, sans tomate, inclus avec boisson et frites.\r\n\r\n', 4, 2),
(5, 'Colonel Original®', 7, 'M', 'Burger avec filet de poulet croustillant et fromage, avec option bacon (+0,50 €), inclus avec boisson et frites.\r\n\r\n', 5, 2),
(6, 'Double Stacker', 8, 'M', 'Burger au poulet avec fromage et bacon, inclus avec boisson et frites.\r\n\r\n', 6, 2),
(7, 'Muffin au Nutella', 2, 'S', 'Muffin moelleux au Nutella.\r\n\r\n', 7, 3),
(8, 'Kream Ball®', 2, 'S', 'Crème glacée en coupe.\r\n\r\n', 8, 3),
(9, 'Pom\'Potes® Bio', 2, 'S', 'Compote de pommes bio.\r\n\r\n', 9, 3);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `idArtCat` FOREIGN KEY (`idCatérogie`) REFERENCES `catégorie` (`id`);

--
-- Contraintes pour la table `assoarticlecommande`
--
ALTER TABLE `assoarticlecommande`
  ADD CONSTRAINT `AssoArt` FOREIGN KEY (`IdArticle`) REFERENCES `article` (`id`),
  ADD CONSTRAINT `AssoCom` FOREIGN KEY (`IdACommande`) REFERENCES `commande` (`id`);

--
-- Contraintes pour la table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `IdMenuArt` FOREIGN KEY (`idArticle`) REFERENCES `article` (`id`),
  ADD CONSTRAINT `idMenuCat` FOREIGN KEY (`idCat`) REFERENCES `catégorie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
