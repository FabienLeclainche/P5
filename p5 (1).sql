-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 13 déc. 2019 à 15:43
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `p5`
--

-- --------------------------------------------------------

--
-- Structure de la table `budgets`
--

DROP TABLE IF EXISTS `budgets`;
CREATE TABLE IF NOT EXISTS `budgets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valeur` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `budgets`
--

INSERT INTO `budgets` (`id`, `valeur`) VALUES
(1, 'Les fins de mois sont chauds, je veux dépenser le moins possible'),
(2, 'Mon père n\'est pas Rothschild mais ça va j\'ai un peu d\'économie'),
(3, 'Je veux me faire plaisir');

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `customers`
--

INSERT INTO `customers` (`id`, `prenom`, `nom`, `email`) VALUES
(2, 'fab', 'le', 'a@gmail.com'),
(3, 'Robert', 'dupont', 'r@outlook.r');

-- --------------------------------------------------------

--
-- Structure de la table `niveaux`
--

DROP TABLE IF EXISTS `niveaux`;
CREATE TABLE IF NOT EXISTS `niveaux` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valeur` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `niveaux`
--

INSERT INTO `niveaux` (`id`, `valeur`) VALUES
(1, 'Débutant'),
(2, 'Intermédiaire'),
(3, 'Expert');

-- --------------------------------------------------------

--
-- Structure de la table `saisons`
--

DROP TABLE IF EXISTS `saisons`;
CREATE TABLE IF NOT EXISTS `saisons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mois` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `saisons`
--

INSERT INTO `saisons` (`id`, `mois`) VALUES
(1, 'Janvier'),
(2, 'Février'),
(3, 'Mars'),
(4, 'Avril'),
(5, 'Mai'),
(6, 'Juin'),
(7, 'Juillet'),
(8, 'Août'),
(9, 'Septembre'),
(10, 'Octobre'),
(11, 'Novembre'),
(12, 'Décembre');

-- --------------------------------------------------------

--
-- Structure de la table `spots`
--

DROP TABLE IF EXISTS `spots`;
CREATE TABLE IF NOT EXISTS `spots` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `localisation` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `spots`
--

INSERT INTO `spots` (`id`, `localisation`, `latitude`, `longitude`) VALUES
(1, 'Bali', '-8.80507876834652', '115.11340369779452'),
(2, 'Australie', '-28.162557', '153.55002880000006'),
(3, 'Hawaii', '21.6648658', '-158.05296090000002'),
(4, 'Costa Rica\r\n', '9.6268684', '-85.14823790000002'),
(5, 'Nicaragua', '11.4700989', '-86.12492450000002'),
(6, 'Californie', '33.6594835', '-117.99880259999997'),
(7, 'Pérou', '-7.7001724', '-79.43381879999998'),
(8, 'Chili', '-34.3867245', '-72.00477309999996'),
(9, 'Mexique', '15.8456607', '-97.05224720000001'),
(10, 'Afrique du sud', '-34.0506714', '24.91015440000001'),
(11, 'Maroc', '30.5453374', '-9.708985799999936'),
(12, 'Portugal', '38.9664933', '-9.417616899999984'),
(13, 'Sri Lanka', '5.964726199999999', '80.39086109999994');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(1, 'root', '$2y$10$ff3jEoksrWCwzXRlLREmiehKZQt7BQej7.M3.vVYKZn2DEEBdd0GS');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
