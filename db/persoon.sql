-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 28 jan 2023 om 19:36
-- Serverversie: 5.7.36
-- PHP-versie: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php-pdo-crud-2209b-j1-p2`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `persoon`
--

DROP TABLE IF EXISTS `persoon`;
CREATE TABLE IF NOT EXISTS `persoon` (
  `Id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Firstname` varchar(255) NOT NULL,
  `Infix` varchar(20) DEFAULT NULL,
  `Lastname` varchar(255) NOT NULL,
  `Phone_number` varchar(20) NOT NULL,
  `Street_name` varchar(30) NOT NULL,
  `House_number` varchar(10) NOT NULL,
  `Residence` varchar(30) NOT NULL,
  `Post_code` varchar(10) NOT NULL,
  `Land_name` varchar(40) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `persoon`
--

INSERT INTO `persoon` (`Id`, `Firstname`, `Infix`, `Lastname`, `Phone_number`, `Street_name`, `House_number`, `Residence`, `Post_code`, `Land_name`) VALUES
(1, 'Vincent', 'van de', 'Merwe', '', '', '', '', '', ''),
(2, 'Piet', NULL, 'Jan', '', '', '', '', '', ''),
(3, 'Jan', 'de', 'Piet', '', '', '', '', '', ''),
(4, 'Angelino', 'de', 'Kip', '', '', '', '', '', ''),
(5, 'Angela', 'de', 'Boer', '', '', '', '', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
