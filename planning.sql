-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 13 juin 2021 à 19:06
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `planning`
--

-- --------------------------------------------------------

--
-- Structure de la table `jeudi_aprem`
--

DROP TABLE IF EXISTS `jeudi_aprem`;
CREATE TABLE IF NOT EXISTS `jeudi_aprem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `jeudi_aprem`
--

INSERT INTO `jeudi_aprem` (`id`, `nom`) VALUES
(2, 'Benoit'),
(3, 'Audrey'),
(4, 'Babeth'),
(5, 'Sylvie'),
(6, 'Manon');

-- --------------------------------------------------------

--
-- Structure de la table `jeudi_matin`
--

DROP TABLE IF EXISTS `jeudi_matin`;
CREATE TABLE IF NOT EXISTS `jeudi_matin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `jeudi_matin`
--

INSERT INTO `jeudi_matin` (`id`, `nom`) VALUES
(3, 'Laeticia'),
(4, 'Audrey'),
(5, 'Sylvie'),
(10, 'Manon'),
(8, 'Babeth');

-- --------------------------------------------------------

--
-- Structure de la table `lundi_aprem`
--

DROP TABLE IF EXISTS `lundi_aprem`;
CREATE TABLE IF NOT EXISTS `lundi_aprem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lundi_aprem`
--

INSERT INTO `lundi_aprem` (`id`, `nom`) VALUES
(6, 'Benoit'),
(7, 'Monique'),
(8, 'Laeticia'),
(15, 'Audrey'),
(16, 'Sylvie');

-- --------------------------------------------------------

--
-- Structure de la table `lundi_matin`
--

DROP TABLE IF EXISTS `lundi_matin`;
CREATE TABLE IF NOT EXISTS `lundi_matin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lundi_matin`
--

INSERT INTO `lundi_matin` (`id`, `nom`) VALUES
(13, 'Benoit'),
(14, 'Monique'),
(15, 'Laeticia'),
(16, 'Audrey'),
(17, 'Sylvie');

-- --------------------------------------------------------

--
-- Structure de la table `mardi_aprem`
--

DROP TABLE IF EXISTS `mardi_aprem`;
CREATE TABLE IF NOT EXISTS `mardi_aprem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `mardi_aprem`
--

INSERT INTO `mardi_aprem` (`id`, `nom`) VALUES
(2, 'Benoit'),
(3, 'Laeticia'),
(4, 'Audrey'),
(5, 'Babeth'),
(6, 'Manon');

-- --------------------------------------------------------

--
-- Structure de la table `mardi_matin`
--

DROP TABLE IF EXISTS `mardi_matin`;
CREATE TABLE IF NOT EXISTS `mardi_matin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `mardi_matin`
--

INSERT INTO `mardi_matin` (`id`, `nom`) VALUES
(65, 'Benoit'),
(66, 'Laeticia'),
(67, 'Audrey'),
(68, 'Babeth'),
(69, 'Manon');

-- --------------------------------------------------------

--
-- Structure de la table `mercredi_aprem`
--

DROP TABLE IF EXISTS `mercredi_aprem`;
CREATE TABLE IF NOT EXISTS `mercredi_aprem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `mercredi_aprem`
--

INSERT INTO `mercredi_aprem` (`id`, `nom`) VALUES
(2, 'Benoit'),
(3, 'Laeticia'),
(4, 'Sylvie'),
(5, 'Babeth'),
(6, 'Manon');

-- --------------------------------------------------------

--
-- Structure de la table `mercredi_matin`
--

DROP TABLE IF EXISTS `mercredi_matin`;
CREATE TABLE IF NOT EXISTS `mercredi_matin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `mercredi_matin`
--

INSERT INTO `mercredi_matin` (`id`, `nom`) VALUES
(2, 'Benoit'),
(3, 'Laeticia'),
(4, 'Sylvie'),
(5, 'Babeth'),
(6, 'Manon');

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

DROP TABLE IF EXISTS `personnes`;
CREATE TABLE IF NOT EXISTS `personnes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `hexa` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `personnes`
--

INSERT INTO `personnes` (`id`, `nom`, `hexa`) VALUES
(10, 'Benoit', '#4fff14'),
(11, 'Monique', '#32c41b'),
(12, 'Laeticia', '#9da1a1'),
(13, 'Audrey', '#e8b600'),
(14, 'Sylvie', '#f6ff00'),
(15, 'Babeth', '#fca9d1'),
(16, 'Manon', '#ff2612'),
(17, 'Brigitte', '#2436ff');

-- --------------------------------------------------------

--
-- Structure de la table `samedi_aprem`
--

DROP TABLE IF EXISTS `samedi_aprem`;
CREATE TABLE IF NOT EXISTS `samedi_aprem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `samedi_matin`
--

DROP TABLE IF EXISTS `samedi_matin`;
CREATE TABLE IF NOT EXISTS `samedi_matin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `samedi_matin`
--

INSERT INTO `samedi_matin` (`id`, `nom`) VALUES
(2, 'Benoit'),
(3, 'Monique'),
(4, 'Audrey'),
(5, 'Babeth');

-- --------------------------------------------------------

--
-- Structure de la table `vendredi_aprem`
--

DROP TABLE IF EXISTS `vendredi_aprem`;
CREATE TABLE IF NOT EXISTS `vendredi_aprem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vendredi_aprem`
--

INSERT INTO `vendredi_aprem` (`id`, `nom`) VALUES
(2, 'Benoit'),
(3, 'Laeticia'),
(4, 'Audrey'),
(5, 'Babeth'),
(6, 'Manon');

-- --------------------------------------------------------

--
-- Structure de la table `vendredi_matin`
--

DROP TABLE IF EXISTS `vendredi_matin`;
CREATE TABLE IF NOT EXISTS `vendredi_matin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vendredi_matin`
--

INSERT INTO `vendredi_matin` (`id`, `nom`) VALUES
(2, 'Benoit'),
(3, 'Laeticia'),
(4, 'Audrey'),
(5, 'Babeth'),
(6, 'Manon');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
