-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: May 22, 2021 at 07:13 AM
-- Server version: 5.7.28
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 1;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moj_dizajn_DB`
--

CREATE DATABASE IF NOT EXISTS `moj_dizajn_DB` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `moj_dizajn_DB`;
-- --------------------------------------------------------

--
-- Table structure for table `Korisnik`
--

DROP TABLE IF EXISTS `Korisnik`;
CREATE TABLE IF NOT EXISTS `Korisnik` (
  `korime` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sifra` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `imePrezime` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL, /*statusi mogu biti: regkor, mod, admin, diz*/
  `stanje` tinyint(1) NOT NULL DEFAULT '0', /*--stanja su: nije blokiran=0, blokiran=1*/
  `broj` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`korime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Korisnik`
--

INSERT INTO `Korisnik` (`korime`, `sifra`, `imePrezime`, `email`, `status`, `stanje`, `broj`) VALUES
('admin', 'admin123', 'Admin', 'anammilosevic1@gmail.com', 'admin', 0, '1234567'),
('aca', 'aca123', 'Aleksandar Vasilic', 'va180623d@student.etf.bg.ac.rs', 'regkor', 0, '1234567'),
('zeksi', 'zeksi123', 'Zeljko Milicevic', 'mz180611d@student.etf.bg.ac.rs', 'regkor', 0, '1234567'),
('anchy', 'ana123', 'Ana Milosevic', 'ma180624d@student.etf.bg.ac.rs', 'diz', 0, '1234567'),
('tica', 'tica123', 'Tijana Jovanovic', 'ma180624d@student.etf.bg.ac.rs', 'mod', 0, '1234567');


-- --------------------------------------------------------

--
-- Table structure for table `Modeli`
--

DROP TABLE IF EXISTS `Modeli`;
CREATE TABLE IF NOT EXISTS `Modeli` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `korime` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `slika` varbinary(max) NOT NULL,
  PRIMARY KEY (`id`),
  KEY Korisnik (`korime`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Modeli`
--

INSERT INTO `Modeli` (`id`, `slika`, `korime`) VALUES
(1, load_file('C:\Users\Ana\Desktop\modeli\fotelja.png'), 'tica'), /*posto nemamo id korisnika povezala sam preko korime trenutno sa koirnikom TREBA POSLE ISPRAVITI NA DIZAJNERA*/
(2, load_file('C:\Users\Ana\Desktop\modeli\orman.png'), 'tica'),
(3, load_file('C:\Users\Ana\Desktop\modeli\sto.png'), 'tica');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Modeli`
--
ALTER TABLE `Modeli`
  ADD CONSTRAINT Modeli FOREIGN KEY (`korime`) REFERENCES Korisnik (`korime`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;