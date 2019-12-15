-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 15, 2019 at 10:21 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `reseau`
--

-- --------------------------------------------------------

--
-- Table structure for table `ecrit`
--

CREATE TABLE `ecrit` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text,
  `dateEcrit` datetime NOT NULL,
  `idAuteur` int(11) NOT NULL,
  `idAmi` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ecrit`
--

INSERT INTO `ecrit` (`id`, `titre`, `contenu`, `dateEcrit`, `idAuteur`, `idAmi`) VALUES
(35, 'Hello', 'heyyyyy', '2019-12-13 16:43:18', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `lien`
--

CREATE TABLE `lien` (
  `id` int(11) NOT NULL,
  `idUtilisateur1` int(11) NOT NULL,
  `idUtilisateur2` int(11) NOT NULL,
  `etat` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lien`
--

INSERT INTO `lien` (`id`, `idUtilisateur1`, `idUtilisateur2`, `etat`) VALUES
(1, 2, 3, 'ami'),
(5, 2, 6, 'ami'),
(4, 7, 2, 'ami'),
(6, 3, 5, 'banni'),
(7, 3, 7, 'en attente'),
(8, 2, 9, 'en attente');

-- --------------------------------------------------------

--
-- Table structure for table `recherche`
--

CREATE TABLE `recherche` (
  `login` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `champs` varchar(500) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `remember` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `login`, `mdp`, `email`, `remember`, `avatar`, `prenom`, `nom`) VALUES
(3, 'math', '*C6A5B617CFEFDBF995141D9365B1241026955D59', 'mathildemichel886@gmail.com', NULL, NULL, 'Mathilde', 'M.'),
(2, 'Kami', '*74C221DA61DA7142560438CBDCE15769349C70DA', 'camille.gcn@outlook.com', NULL, '2/header.jpg', 'Camille', 'Gcn'),
(7, 'luc', '*F2760C132757F8044C1E9F5ABF41933BE5F534C1', 'luc@bubul.fr', NULL, NULL, 'Luc', 'Bullet'),
(5, 'victor', '*37FD309A6DAE1032F071431A9575C49191A67CBF', 'victorcango@aol.com', NULL, NULL, 'Brie', 'Cantal'),
(6, 'y', '*2D0C64FFBB952AB985492396ED5E275F989B35EE', 'y@y.fr', NULL, NULL, 'Valentyn', 'Paris'),
(8, 'Noluene', '*3E9D20A4C776408DDD496961ECB584AA9CB38CFD', 'noluene@gmail.com', NULL, NULL, 'Noluene', 'Baillet'),
(9, 'romuald', '*D9CF376AB44B638426AC4D7093CA1AC14082FC07', 'romu.ald@gmail.com', NULL, NULL, 'Romuald', 'Tyffers');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ecrit`
--
ALTER TABLE `ecrit`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `lien`
--
ALTER TABLE `lien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ecrit`
--
ALTER TABLE `ecrit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `lien`
--
ALTER TABLE `lien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
