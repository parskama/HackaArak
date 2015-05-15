-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2015 at 03:54 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hacka`
--
CREATE DATABASE IF NOT EXISTS `hacka` DEFAULT CHARACTER SET utf8 COLLATE utf8_persian_ci;
USE `hacka`;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `city`) VALUES
(1, 'اراک'),
(2, 'تهران'),
(3, 'هاکا گلوبال');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datestart` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `dateend` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `timestart` int(11) NOT NULL,
  `timeend` int(11) NOT NULL,
  `timestartpm` tinyint(4) NOT NULL,
  `timeendpm` tinyint(4) NOT NULL,
  `tags` text COLLATE utf8_persian_ci NOT NULL,
  `map` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `city` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `location` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `status` int(11) NOT NULL,
  `nameevent` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `datestart`, `dateend`, `timestart`, `timeend`, `timestartpm`, `timeendpm`, `tags`, `map`, `city`, `location`, `status`, `nameevent`) VALUES
(5, '1393/2/4', '1393/2/5', 10, 12, 2, 2, 'تگ', '5:3:7:22', 'تهران', '', 0, 'asd'),
(6, '1393/2/4', '1393/2/5', 10, 12, 2, 2, 'تگ', '5:3:7:22', 'تهران', 'آدرس            ', 0, 'asd'),
(7, '1393/2/4', '1393/2/5', 10, 12, 2, 2, 'تگ', '5:3:7:22', 'تهران', 'آدرس            ', 0, 'asd'),
(8, '1393/2/4', '1393/2/5', 10, 12, 2, 2, 'تگ', '5:3:7:22', 'تهران', 'آدرس            ', 0, 'asd'),
(9, '', '', 0, 0, 1, 1, '            ', '', 'اراک', '            ', 0, 'هاکا گلوبال');

-- --------------------------------------------------------

--
-- Table structure for table `hacka`
--

CREATE TABLE IF NOT EXISTS `hacka` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text COLLATE utf8_persian_ci NOT NULL,
  `fb` text COLLATE utf8_persian_ci NOT NULL,
  `twitter` text COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `hacka`
--

INSERT INTO `hacka` (`id`, `text`, `fb`, `twitter`) VALUES
(2, '            asd', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text COLLATE utf8_persian_ci NOT NULL,
  `password` text COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `email`) VALUES
(1, 'asd', 'asdasd', 'hamid.zarghami1@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `organizer`
--

CREATE TABLE IF NOT EXISTS `organizer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varbinary(300) NOT NULL,
  `linkimg` text COLLATE utf8_persian_ci NOT NULL,
  `about` text COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `linktweet` text COLLATE utf8_persian_ci NOT NULL,
  `linkfb` text COLLATE utf8_persian_ci NOT NULL,
  `linkdin` text COLLATE utf8_persian_ci NOT NULL,
  `lastname` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE IF NOT EXISTS `signup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `lastname` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `password` text COLLATE utf8_persian_ci NOT NULL,
  `img` text COLLATE utf8_persian_ci NOT NULL,
  `linkfb` text COLLATE utf8_persian_ci NOT NULL,
  `linklinkdin` text COLLATE utf8_persian_ci NOT NULL,
  `email` text COLLATE utf8_persian_ci NOT NULL,
  `linktwitter` text COLLATE utf8_persian_ci NOT NULL,
  `mobile` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `submitevent`
--

CREATE TABLE IF NOT EXISTS `submitevent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_event` int(11) NOT NULL,
  `id_signnup` int(11) NOT NULL,
  `nameevent` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `namefamily` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `typeevent`
--

CREATE TABLE IF NOT EXISTS `typeevent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `typeevent`
--

INSERT INTO `typeevent` (`id`, `name`) VALUES
(1, 'هاکا'),
(2, 'هاکا گلوبال');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
