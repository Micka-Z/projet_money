-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 29, 2023 at 08:57 AM
-- Server version: 10.3.27-MariaDB-0+deb10u1
-- PHP Version: 7.3.19-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projets_examen_mzimmermann`
--

-- --------------------------------------------------------

--
-- Table structure for table `projet`
--

CREATE TABLE `projet` (
  `id` int(11) NOT NULL,
  `titre` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `montant` decimal(10,0) DEFAULT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `adresse` varchar(150) DEFAULT NULL,
  `code_postal` varchar(5) DEFAULT NULL,
  `ville` varchar(100) DEFAULT NULL,
  `tel` varchar(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `date_creation` date DEFAULT NULL,
  `statut` varchar(3) DEFAULT NULL,
  `motif` text DEFAULT NULL,
  `cle` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projet`
--

INSERT INTO `projet` (`id`, `titre`, `description`, `montant`, `nom`, `prenom`, `adresse`, `code_postal`, `ville`, `tel`, `email`, `date_creation`, `statut`, `motif`, `cle`) VALUES
(1, 'Toilettes écolos', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. \r\n\r\nUt enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. \r\nDuis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. ', '32000', 'Doe', 'John', '', '21120', 'Néant', '0600000000', 'mzimmermann@mywebecom.ovh', '2023-05-25', 'REF', 'NOus ne prenons pas de toilettes écolos', ''),
(2, 'Navette spatiale jupiterienne', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. \r\n\r\nUt enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. \r\nDuis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. \r\n\r\nProjet génial !', '10999000', 'Dupont', 'Jean', '', '01000', 'Jupiter', '0600000000', 'mzimmermann@mywebecom.ovh', '2023-05-25', 'FIN', '', 'iVCbxLEdWpU2'),
(3, 'Jeu de société inclusif', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. \r\n\r\nUt enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. \r\n\r\n\r\nProjet accepté !', '22550', 'Braesch', 'Inaya', '', '52000', 'Essen', '0600000000', 'mzimmermann@mywebecom.ovh', '2023-05-25', 'FIN', '', 'Y3XUjkCTwxa4'),
(4, 'Voiture à eau', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. \r\n\r\nUt enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. \r\nDuis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. ', '5888333', 'Revault', 'Marcel', '7 rue des Engins', '12600', 'Usines', '0600000000', 'mzimmermann@mywebecom.ovh', '2023-05-25', 'ATT', '', NULL),
(5, 'Nouvelles toilettes écolos', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. \r\n\r\nUt enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. \r\nDuis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. ', '45000', 'Durand', 'Benjamin', '', '67000', 'Strasbourg', '0600000000', 'mzimmermann@mywebecom.ovh', '2023-05-26', 'REF', 'Ce n\'est pas une bonne idée !', ''),
(6, 'Livres pour enfants', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. \r\nUt enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. \r\nDuis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. \r\n\r\nProjet accepté !', '10000', 'Grandsir', 'Didier', '', '67500', 'Haguenau', '0600000000', 'mzimmermann@mywebecom.ovh', '2023-05-26', 'ATT', '', NULL),
(7, 'test', 'grand test', '10000', 'test', 'test', 'test', '65000', 'test', '0600000000', 'test@test.com', '2023-05-27', 'REF', 'test', ''),
(8, 'test', 'grand test terminé', '10000', 'test', 'test', 'test', '65000', 'test', '0600000000', 'test@test.com', '2023-05-27', 'VAL', '', 'K1P3nmlT0TSy'),
(9, 'test', 'test', '50000', 'test', 'test', 'test', '01000', 'test', '0600000000', 'test@test.com', '2023-05-28', 'VAL', '', 'p3V0W4Ol6ZO9'),
(10, 'test', 'test', '50000', 'test', 'test', 'test', '01000', 'test', '0600000000', 'mzimmermann@mywebecom.ovh', '2023-05-28', 'VAL', '', '9Ka1vJr3TGf4');

-- --------------------------------------------------------

--
-- Table structure for table `promesse`
--

CREATE TABLE `promesse` (
  `id` int(11) NOT NULL,
  `utilisateur` int(11) DEFAULT NULL,
  `projet` int(11) DEFAULT NULL,
  `montant_promis` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `promesse`
--

INSERT INTO `promesse` (`id`, `utilisateur`, `projet`, `montant_promis`) VALUES
(1, 7, 2, 1222000),
(2, 1, 2, 765000),
(3, 1, 3, 3100),
(4, 5, 3, 7000),
(13, 5, 3, 2450),
(14, 5, 3, 5000),
(15, 5, 3, 2000),
(27, 5, 3, 3000),
(28, 7, 2, 10000000),
(29, 5, 9, 100),
(30, 5, 9, 900),
(31, 5, 9, 1000),
(32, 5, 9, 2000),
(33, 5, 9, 2000),
(34, 5, 9, 2000),
(35, 5, 9, 2000),
(36, 5, 10, 500),
(37, 5, 10, 5000),
(38, 5, 10, 10),
(39, 5, 10, 50),
(40, 5, 10, 40),
(41, 5, 10, 50),
(42, 5, 10, 30),
(43, 5, 10, 20),
(44, 5, 10, 20),
(45, 5, 10, 20),
(46, 5, 9, 15000);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `login` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `type` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `login`, `password`, `email`, `nom`, `type`) VALUES
(1, 'arenard', '$2y$10$vXC0Nw35JFp2hudQFiAQO.FIBIKzvUuzc6uGq0fbBRpwbwDfvyBoe', 'albert.renard@email.com', 'Albert Renard', 'INVE'),
(2, 'bgirard', '$2y$10$lBoX//gqycAYiUgi34KHN.XibT9fQqDUKaVUTDjkdBtPW4Y0LEwuW', 'beatrice.girard@email.com', 'Béatrice Grirard', 'GEST'),
(3, 'cdestruc', '$2y$10$8EOzZa2rT81tT4M.QWQqJe1xpfoFgebSHEtGvDK3U9Ah7lCaKzkYG', 'cedric.destcuc@email.com', 'Cédric Destruc', 'GEST'),
(4, 'dsigneux', '$2y$10$0S/fJnKOhQ/3/b98JBhYneUAs/9Q.LEoxSEHdmdt7YayWpO6IlyAW', 'danielle.signeux@email.com', 'Danielle Signeux', 'GEST'),
(5, 'eserin', '$2y$10$cLHqBGOgUvZ3OGoF1jP3cO1P.YrhH.iOaa7HMYiqWHjQz3wncCGDm', 'elsa.serin@email.com', 'Elsa Serin', 'INVE'),
(6, 'fmonnet', '$2y$10$adm7EkG4rgLJgNWiSFDAneLx7Ng0L9yl7.j8cDO/dWFKeWdvcoi6C', 'fanny.monnet@email.com', 'Fanny Monnet', 'DESA'),
(7, 'glagaffe', '$2y$10$jNxdrsCS/GyEaZukxjfnceoStdSVbl0Rz6ilyPsIaWGaPw1qrq3pS', 'gaston.lagaffe@email.com', 'Gaston Lagaffe', 'INVE'),
(8, 'hbernard', '$2y$10$MPXwVjmLBtci27p7FzZQN.okCQrRyGvq8bN9vJnAYXK1DnPnzg3xe', 'henry.bernard@email.com', 'Henry Bernard', 'INVE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promesse`
--
ALTER TABLE `promesse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projet`
--
ALTER TABLE `projet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `promesse`
--
ALTER TABLE `promesse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
