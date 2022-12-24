-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2022 at 11:40 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `infotech`
--

-- --------------------------------------------------------

--
-- Table structure for table `achat`
--

CREATE TABLE IF NOT EXISTS `achat` (
  `id_cmd` int(11) NOT NULL,
  `id_ar` int(11) NOT NULL,
  `pu_achat` decimal(10,0) NOT NULL,
  `qte_achat` int(11) NOT NULL,
  KEY `FK_achat_id_cmd` (`id_cmd`),
  KEY `FK_achat_id_ar` (`id_ar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id_ar` int(11) NOT NULL AUTO_INCREMENT,
  `disignation_ar` varchar(255) NOT NULL,
  `prix_ar` decimal(10,0) NOT NULL,
  `qte_ar` int(11) NOT NULL,
  `img_ar` varchar(255) NOT NULL,
  PRIMARY KEY (`id_ar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=95 ;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id_ar`, `disignation_ar`, `prix_ar`, `qte_ar`, `img_ar`) VALUES
(64, 'camera men', '150', 5, '2.jpg'),
(65, 'sasas', '58', 25, '10.jpg'),
(66, '225', '252', 25, 'c2.jpg'),
(90, 'new veste', '1452', 198, 'c3.jpg'),
(91, 'sasas', '57', 474, '10.jpg'),
(92, 'carte mere', '145', 14, 'laptop6.jpg'),
(93, 'ram 8GB NVME 1.9 GHE', '1478', 1455, 'clav3.jpg'),
(94, 'Processeur i5 7 g u 2015', '4788', 145, '10.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bon_commande`
--

CREATE TABLE IF NOT EXISTS `bon_commande` (
  `id_cmd` int(10) NOT NULL AUTO_INCREMENT,
  `code_cmd` char(10) NOT NULL,
  `date_cmd` date NOT NULL,
  `motant_cmd` decimal(50,0) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_four` int(10) NOT NULL,
  PRIMARY KEY (`id_cmd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  `nom_client` varchar(255) NOT NULL,
  `prenom_client` varchar(255) NOT NULL,
  `tele_client` varchar(20) NOT NULL,
  `email_client` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id_client`, `nom_client`, `prenom_client`, `tele_client`, `email_client`, `pass`) VALUES
(43, 'David', 'Mohaammed', '0657066542', 'mohadavid25@gmail.com', '123'),
(44, 'tttttt', 'omar', '0657066570', 'omar1@gmail.coxm', '123'),
(45, 'rafik', 'ramdane', '0657066542', 'rafikramdane5@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `facture`
--

CREATE TABLE IF NOT EXISTS `facture` (
  `id_fact` int(11) NOT NULL AUTO_INCREMENT,
  `code_fact` varchar(50) NOT NULL,
  `date_fact` date NOT NULL,
  `montant_fact` decimal(10,0) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_fact`),
  KEY `FK1` (`id_client`),
  KEY `FK2` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `facture`
--

INSERT INTO `facture` (`id_fact`, `code_fact`, `date_fact`, `montant_fact`, `id_client`, `id_user`) VALUES
(29, 'F0005', '2022-11-19', '1', 43, 10),
(30, 'F0001', '2022-11-17', '336', 43, 10),
(31, 'F0005', '2022-11-12', '1110', 44, 10),
(32, 'F0007', '2022-12-07', '35316', 43, 20);

-- --------------------------------------------------------

--
-- Table structure for table `fournisseur`
--

CREATE TABLE IF NOT EXISTS `fournisseur` (
  `id_four` int(11) NOT NULL AUTO_INCREMENT,
  `nom_four` varchar(100) NOT NULL,
  `prenom_four` varchar(100) NOT NULL,
  `tel_four` varchar(50) NOT NULL,
  PRIMARY KEY (`id_four`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `fournisseur`
--

INSERT INTO `fournisseur` (`id_four`, `nom_four`, `prenom_four`, `tel_four`) VALUES
(2, 'David', 'Moha', '1455'),
(3, 'omar', 'islam', '0557066542');

-- --------------------------------------------------------

--
-- Table structure for table `pannier`
--

CREATE TABLE IF NOT EXISTS `pannier` (
  `id_pannier` int(11) NOT NULL AUTO_INCREMENT,
  `date_pannier` date NOT NULL,
  `montant_pannier` decimal(10,0) NOT NULL,
  `id_client` int(11) NOT NULL,
  PRIMARY KEY (`id_pannier`),
  KEY `pannier_cl` (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username_user` varchar(50) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username_user`, `email_user`, `pass`, `telephone`) VALUES
(9, 'yacine_tahtah', 'yacine_tahtah@gmail.com', '1452\r\n', ''),
(10, 'sidah_boud', 'sidahed25@gmail.com', '1452', ''),
(11, 'Aziz_snipet', 'papino25@gmail.com', '155151', ''),
(12, 'mohammed_tacherounte', 'farouk25@gmail.com', '123', ''),
(13, 'mohammed.tacherounte', 'farouk25@gmail.com', '1452', '0657066542'),
(14, 'mohammed.tacherounte', 'farouk25@gmail.com', '1457', '0657066642'),
(15, 'mohammed.tacherounte', 'mohadavid25@gmail.com', '1452', '0657066542'),
(16, 'omartache', 'tahtah@gmail.com', '123', '0557185192'),
(17, 'mohammed.tacherounte', 'papino@gmzil.com', '14526', '0557185192'),
(18, 'rafik_hani', 'rafik_raouf@gmail.com', '123456', '0744858855'),
(19, 'brahimfacha', 'mohadavid25@gmail.com', '123', '0657066542'),
(20, 'youcef', 'omar_islam@gmail.com', '1452', 'islam');

-- --------------------------------------------------------

--
-- Table structure for table `vent`
--

CREATE TABLE IF NOT EXISTS `vent` (
  `id_ar` int(11) NOT NULL,
  `id_fact` int(11) NOT NULL,
  `pu_fact` decimal(10,0) NOT NULL,
  `qte_fact` int(11) NOT NULL,
  KEY `FK_vent_id_fact` (`id_fact`),
  KEY `FK_vent_id_ar` (`id_ar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vent`
--

INSERT INTO `vent` (`id_ar`, `id_fact`, `pu_fact`, `qte_fact`) VALUES
(64, 29, '1', 1),
(65, 30, '14', 14),
(65, 30, '10', 14),
(65, 31, '15', 74),
(93, 32, '147', 158),
(64, 32, '155', 78);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `achat`
--
ALTER TABLE `achat`
  ADD CONSTRAINT `FK_achat_id_ar` FOREIGN KEY (`id_ar`) REFERENCES `article` (`id_ar`),
  ADD CONSTRAINT `FK_achat_id_cmd` FOREIGN KEY (`id_cmd`) REFERENCES `bon_commande` (`id_cmd`);

--
-- Constraints for table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `FK1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pannier`
--
ALTER TABLE `pannier`
  ADD CONSTRAINT `pannier_cl` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vent`
--
ALTER TABLE `vent`
  ADD CONSTRAINT `FK_vent_id_ar` FOREIGN KEY (`id_ar`) REFERENCES `article` (`id_ar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_vent_id_fact` FOREIGN KEY (`id_fact`) REFERENCES `facture` (`id_fact`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
