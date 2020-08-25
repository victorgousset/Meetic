-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Dim 16 Février 2020 à 22:47
-- Version du serveur :  5.7.29-0ubuntu0.18.04.1
-- Version de PHP :  7.2.24-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `meetic`
--

-- --------------------------------------------------------

--
-- Structure de la table `loisir`
--

CREATE TABLE `loisir` (
  `id_loisir` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `loisir`
--

INSERT INTO `loisir` (`id_loisir`, `nom`) VALUES
(1, 'sport'),
(2, 'cinema'),
(3, 'voyage'),
(4, 'cuisine'),
(5, 'sortie');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id` int(11) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `date_naissance` datetime NOT NULL,
  `age` int(11) DEFAULT NULL,
  `genre` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `loisir` varchar(255) NOT NULL,
  `loisir2` varchar(255) DEFAULT NULL,
  `loisir3` varchar(255) DEFAULT NULL,
  `date_inscription` datetime DEFAULT NULL,
  `logo` varchar(255) NOT NULL DEFAULT 'base.jpeg',
  `active` int(11) NOT NULL DEFAULT '0',
  `admin` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`id`, `prenom`, `nom`, `date_naissance`, `age`, `genre`, `ville`, `mail`, `mdp`, `loisir`, `loisir2`, `loisir3`, `date_inscription`, `logo`, `active`, `admin`) VALUES
(1, 'Victor', 'Gousset', '2001-02-27 00:00:00', 18, 'homme', 'Rennes', 'victor.gousset@epitech.eu', '22ee0097135072451429b5ac45630d52779cd49b', 'sport', 'voyage', 'cuisine', '2020-02-04 17:02:02', '1.jpeg', 0, 1),
(2, 'Jean', 'Michel', '1995-02-15 00:00:00', 22, 'homme', 'Rennes', 'cc@gmail.com', '4dc7c9ec434ed06502767136789763ec11d2c4b7', 'sport', NULL, NULL, '2020-02-04 18:03:23', 'base.jpeg', 0, 0),
(3, 'a', 'a', '1997-02-13 00:00:00', NULL, 'homme', 'a', 'ccee@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'sport', NULL, NULL, '2020-02-05 19:38:45', 'base.jpeg', 0, 0),
(4, 'a', 'a', '1999-02-13 00:00:00', NULL, 'homme', 'a', 'ff@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'sport', NULL, NULL, '2020-02-05 19:46:04', 'base.jpeg', 0, 0),
(5, 'a', 'a', '1999-02-13 00:00:00', NULL, 'homme', 'a', 'qff@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'sport', NULL, NULL, '2020-02-05 19:49:42', 'base.jpeg', 0, 0),
(6, 'a', 'a', '2020-02-22 00:00:00', NULL, 'homme', 'a', 'test2@test.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'sport', NULL, NULL, '2020-02-05 19:57:27', 'base.jpeg', 0, 0),
(7, 'a', 'a', '1965-02-22 00:00:00', NULL, 'homme', 'r', 'victor.gousset@epib.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'sport', NULL, NULL, '2020-02-06 10:23:04', 'base.jpeg', 0, 0),
(8, 'a', 'a', '1965-02-22 00:00:00', NULL, 'homme', 'r', 'victor.gousset@eepib.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'sport', NULL, NULL, '2020-02-06 10:24:36', 'base.jpeg', 0, 0),
(9, 'a', 'a', '1955-02-01 00:00:00', NULL, 'homme', 'a', 'bbbbb@g.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'sport', NULL, NULL, '2020-02-06 14:53:23', 'base.jpeg', 0, 0),
(10, 'a', 'a', '1955-02-01 00:00:00', NULL, 'homme', 'a', 'bbeeebbb@g.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'sport', NULL, NULL, '2020-02-06 14:54:42', 'base.jpeg', 0, 0),
(11, 'a', 'a', '2020-02-26 00:00:00', NULL, 'homme', 'e', 'eeeeeee@g.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'sport', NULL, NULL, '2020-02-06 14:54:57', 'base.jpeg', 0, 0),
(12, 'q', 'q', '2020-03-03 00:00:00', NULL, 'homme', 'q', 'qqqqqqqqqqqqqq@g.con', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'sport', NULL, NULL, '2020-02-06 14:56:09', 'base.jpeg', 0, 0),
(13, 'q', 'q', '2020-03-03 00:00:00', NULL, 'homme', 'q', 'eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee@g.con', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'sport', NULL, NULL, '2020-02-06 14:56:28', 'base.jpeg', 0, 0),
(14, 'a', 'a', '2020-03-21 00:00:00', NULL, 'homme', 'r', 'victor.gousset@epieeeeeb.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'sport', NULL, NULL, '2020-02-06 15:00:24', 'base.jpeg', 0, 0),
(15, 'e', 'e', '2020-03-21 00:00:00', NULL, 'homme', 'e', 'tuyhioio@a.come', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'sport', NULL, NULL, '2020-02-06 15:05:02', 'base.jpeg', 0, 0),
(16, 'r', 'r', '1983-01-11 00:00:00', NULL, 'homme', 'r', 'UUUUUUUUU@l.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'sport', NULL, NULL, '2020-02-06 15:15:31', 'base.jpeg', 0, 0),
(27, 'age', 'age', '1970-03-29 00:00:00', 49, 'homme', 'Rennes', 'viceeeeetor.gouseeeeset@eeeepiteceeeeh.eu', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'sport', NULL, NULL, '2020-02-14 09:46:23', 'base.jpeg', 0, 0),
(28, 'Last', 'Test', '1997-02-12 00:00:00', 23, 'homme', 'Rennes', 'victor.geeeeeeeeeeeeeeeeeeeeeeeousset@epitech.eueeeeeeeeeeeeeeeeeeee', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'sport', NULL, NULL, '2020-02-16 22:06:23', 'base.jpeg', 0, 0),
(29, 'a', 'a', '1985-02-04 00:00:00', 35, 'homme', 'e', 'eeeeaaaaaeeeaaa@eeeiohuogiyguygg.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'sport', NULL, NULL, '2020-02-16 22:10:21', 'base.jpeg', 0, 0),
(31, 'aa', 'e', '1999-01-28 00:00:00', 21, 'homme', 'e', 'eeeeaaaaaeeeaaa@eeeiohuogeeeeiyguygg.com', 'e0c9035898dd52fc65c41454cec9c4d2611bfb37', 'sport', NULL, NULL, '2020-02-16 22:28:35', 'base.jpeg', 0, 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `loisir`
--
ALTER TABLE `loisir`
  ADD PRIMARY KEY (`id_loisir`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `loisir`
--
ALTER TABLE `loisir`
  MODIFY `id_loisir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
