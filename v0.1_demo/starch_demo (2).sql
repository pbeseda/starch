-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 17, 2014 at 07:22 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `starch_demo`
--
CREATE DATABASE IF NOT EXISTS `starch_demo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `starch_demo`;

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE IF NOT EXISTS `links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `student_id`, `instructor_id`) VALUES
(1, 49, 26),
(2, 49, 30),
(3, 49, 17),
(4, 49, 18),
(5, 49, 24),
(6, 24, 46),
(7, 24, 36),
(8, 24, 48),
(9, 24, 38),
(10, 24, 37),
(11, 24, 47),
(12, 30, 39),
(13, 30, 40),
(14, 30, 41),
(15, 30, 17),
(16, 30, 23),
(17, 30, 31),
(18, 30, 45),
(19, 30, 8),
(20, 30, 44),
(21, 30, 43),
(22, 30, 42),
(23, 30, 50),
(24, 30, 52),
(25, 30, 51),
(26, 53, 1),
(27, 53, 26),
(28, 53, 30),
(29, 53, 11),
(30, 53, 17),
(31, 53, 24),
(32, 49, 1);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `first_name`, `last_name`, `email`) VALUES
(1, 'Barbara', 'Ambach', ''),
(2, 'Eric', 'Anderson', ''),
(3, 'Fred', 'Andreas', ''),
(4, 'Ken', 'Andrews', ''),
(5, 'Osman', 'Attman', ''),
(6, 'Phillip', 'Gallegos', ''),
(7, 'George', 'Hoover', ''),
(8, 'Michael', 'Jenson', ''),
(9, 'Christopher', 'Koziol', ''),
(10, 'Cameron', 'Kruger', ''),
(11, 'Keith', 'Loftin', ''),
(12, 'Taisto', 'Makel', ''),
(13, 'William', 'Moore', ''),
(14, 'Eric', 'Morris', ''),
(15, 'Ranko', 'Ruzic', ''),
(16, 'Peter', 'Schneider', ''),
(17, 'Erik', 'Sommerfeld', ''),
(18, 'Clark', 'Thenhaus', ''),
(19, 'Ekaterini', 'Vlahos', ''),
(20, 'David', 'Carnicelli', ''),
(21, 'Joseph', 'Colistra', ''),
(22, 'Wilson', 'Day', ''),
(23, 'Christopher', 'Nims', ''),
(24, 'Matthew', 'Shea', ''),
(25, 'Joan', 'Vandenburg', ''),
(26, 'Rachel', 'Brown', ''),
(27, 'Annicia', 'Streete', ''),
(28, 'Elizabeth', 'Thompson', ''),
(29, 'Maria', 'Cole', ''),
(30, 'Scott', 'Lawrence', ''),
(31, 'Amir', 'Ameri', ''),
(32, 'Christopher', 'Herr', ''),
(33, 'Jill', 'Kamas', ''),
(34, 'Alexander', 'Maller', ''),
(35, 'Brad', 'Tomecek', ''),
(36, 'Amanda', 'Olson', ''),
(37, 'Victor', 'Koulich', ''),
(38, 'Martha', 'Hutchinson', ''),
(39, 'Ed', 'Janke', ''),
(40, 'Glen', 'Rock', ''),
(41, 'Brit', 'Andresen', ''),
(42, 'Lindsay', 'Johnston', ''),
(43, 'Richard', 'Leplastrier', ''),
(44, 'Ian', 'Athfield', ''),
(45, 'Jade', 'Polizzi', ''),
(46, 'Eric', 'Olson', ''),
(47, 'Charles', 'MacBride', ''),
(48, 'Michael', 'Hughes', ''),
(49, 'Patrick', 'Beseda', ''),
(50, 'Peter', 'Stutchbury', ''),
(51, 'Michael', 'Lorimer', ''),
(52, 'Glenn', 'Murcutt', ''),
(53, 'Lacy', 'Williams', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
