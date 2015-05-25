-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2015 at 07:18 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hacka`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL,
  `city` varchar(200) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `city`) VALUES
(1, 'اراک'),
(2, 'تهران'),
(3, 'هاکا گلوبال'),
(4, 'ایلام');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL,
  `datestart` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `dateend` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `timestart` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `timeend` int(11) NOT NULL,
  `timestartpm` tinyint(4) NOT NULL,
  `timeendpm` tinyint(4) NOT NULL,
  `tags` text COLLATE utf8_persian_ci NOT NULL,
  `map` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `city` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `location` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `status` int(11) NOT NULL,
  `nameevent` varchar(300) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `datestart`, `dateend`, `timestart`, `timeend`, `timestartpm`, `timeendpm`, `tags`, `map`, `city`, `location`, `status`, `nameevent`) VALUES
(5, '1394/2/5', '1393/2/5', '7:00', 12, 1, 2, 'تگ', '34.1020765,49.7123926', 'اراک', 'اراک، دانشگاه اراک ساختمان فنی', 0, 'هاکا گلوبال'),
(6, '1394/5/15', '1393/2/5', '9:00', 12, 1, 2, 'تگ', '36.2820213,59.5938348', 'مشهد', 'مشهد، دانشگاه مشهد ساختمان فنی', 0, 'هاکا گلوبال'),
(7, '1394/9/21', '1393/2/5', '12:00', 12, 2, 2, 'تگ', '32.6543956,51.6770667', 'اصفهان', 'اصفهان، دانشگاه اصفهان ساختمان فنی', 0, 'هاکا گلوبال'),
(8, '1393/11/1', '1393/2/5', '8:15', 12, 2, 2, 'تگ', '31.3146917,48.6786785', 'اهواز', 'اهواز، دانشگاه اهوازساختمان فنی	', 0, 'هاکا گلوبال'),
(9, '1394/5/17', '1394/9/9', '11:30', 0, 1, 1, '            ', '29.5956688,52.5882912', 'شیراز', 'شیراز، دانشگاه شیراز ساختمان فنی', 0, 'هاکا گلوبال'),
(10, '1394/10/14', '1394/2/19', '8:00', 0, 2, 2, '            asd', '35.6973978,51.4191054', 'تهران', 'تهران، دانشگاه تهران ساختمان فنی', 0, 'هاکا گلوبال'),
(14, '1394/03/11', '1394/03/11', '9:45', 11, 1, 2, '            ', '35.6973978,51.4191054', 'تهران', '       تهران، دانشگاه صنعتی شریف     ', 0, 'هاکا'),
(15, '1394/03/23', '1394/03/24', '11:11', 12, 1, 2, '            ', '35.6973978,51.4191054', 'تهران', 'تهران، دانشگاه علامه طباطبایی', 0, 'هاکا'),
(16, '1394/03/18', '1394/03/19', '11:15', 11, 1, 1, '            ', '34.1020765,49.7123926', 'اراک', 'اراک، دانشگاه اراک ساختمان فنی و مهندسی', 0, 'هاکا گلوبال'),
(17, '1394/04/23', '1394/04/24', '4:30', 2, 2, 2, '', '34.1020765,49.7123926', 'اراک', 'اراک، دانشگاه اراک ساختمان فنی', 0, 'هاکا');

-- --------------------------------------------------------

--
-- Table structure for table `hacka`
--

CREATE TABLE IF NOT EXISTS `hacka` (
  `id` int(11) NOT NULL,
  `text` text COLLATE utf8_persian_ci NOT NULL,
  `fb` text COLLATE utf8_persian_ci NOT NULL,
  `twitter` text COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

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
  `id` int(11) NOT NULL,
  `username` text COLLATE utf8_persian_ci NOT NULL,
  `password` text COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', '0c7540eb7e65b553ec1ba6b20de79608', 'mostafa.zeinivand@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `organizer`
--

CREATE TABLE IF NOT EXISTS `organizer` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `linkimg` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `about` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `linktweet` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `linkfb` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `linkdin` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `lastname` varchar(200) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `organizer`
--

INSERT INTO `organizer` (`id`, `firstname`, `linkimg`, `about`, `email`, `linktweet`, `linkfb`, `linkdin`, `lastname`) VALUES
(1, 'asd', '', '', '', '', '', '', ''),
(2, 'مصطفی', '0', '0', '0', '0', '0', '0', 'زینی وند'),
(3, 'asd', 'asd', 'asd', '', '', '', '', ''),
(4, 'فرهود', '0', 'برنامه نویس موبایل', 'mostafa.zeinivand@gmail.com', 'https://twitter.com', 'https://facebook.com', 'https://linkedin.com', 'علیمحمدی'),
(5, 'حمید', '0', 'توسعه دهنده', 'mostafa.zeinivand@gmail.com', 'https://twitter.com', 'https://facebook.com', 'https://linkedin.com', 'ضرغامی'),
(6, 'مصطفی ', 'img', 'توسعه دهنده', 'mostafa.zeinivand@gmail.com', 'https://twitter.com', 'https://facebook.com', 'https://linkedin.com', 'زینی وند');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE IF NOT EXISTS `signup` (
  `id` int(11) NOT NULL,
  `firstname` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `lastname` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `password` text COLLATE utf8_persian_ci NOT NULL,
  `img` text COLLATE utf8_persian_ci NOT NULL,
  `linkfb` text COLLATE utf8_persian_ci NOT NULL,
  `linklinkdin` text COLLATE utf8_persian_ci NOT NULL,
  `email` text COLLATE utf8_persian_ci NOT NULL,
  `linktwitter` text COLLATE utf8_persian_ci NOT NULL,
  `mobile` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `skill` tinyint(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `firstname`, `lastname`, `password`, `img`, `linkfb`, `linklinkdin`, `email`, `linktwitter`, `mobile`, `skill`) VALUES
(1, 'مصطفی', 'زینی وند', 'e9fd363bedc114628fe2cdce1493db15', '', '', '', 'mostafa.zeinivand@gmail.com', '', '09371208646', 0),
(2, 'مصطفی', 'زینی وند', '78eabacc196cc749b50852128ae27687', '', '', '', 'mostafa.zeinivand@hotmail.com', '', '09371208646', 0),
(3, 'mehrdad_m', 'mehrdad_m', 'a9ed463e431065cb6fb01d49e4ceeda8', '', '', '', 'mehrdad_m@mail.com', '', '09371208646', 0),
(4, 'admin', 'admin', '9a9746d53945a4962910b17a572e68fd', '', '', '', 'admin@me.com', '', '09371208646', 0),
(5, 'محسن', 'مسلمان', 'bc940aabf66d633ec1650fbf80cc9ad0', '', '', '', 'mohsen@me.com', '', '09371208646', 0);

-- --------------------------------------------------------

--
-- Table structure for table `submitevent`
--

CREATE TABLE IF NOT EXISTS `submitevent` (
  `id` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `id_signnup` int(11) NOT NULL,
  `nameevent` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `namefamily` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `submitevent`
--

INSERT INTO `submitevent` (`id`, `id_event`, `id_signnup`, `nameevent`, `namefamily`, `email`) VALUES
(1, 6, 6, '6', '6', '6'),
(2, 7, 7, '7', '7', '7'),
(3, 15, 15, '15', '15', '15'),
(4, 5, 5, '5', '5', '5'),
(5, 5, 5, '5', '5', '5'),
(6, 16, 16, '16', '16', '16');

-- --------------------------------------------------------

--
-- Table structure for table `typeevent`
--

CREATE TABLE IF NOT EXISTS `typeevent` (
  `id` int(11) NOT NULL,
  `name` varchar(300) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `typeevent`
--

INSERT INTO `typeevent` (`id`, `name`) VALUES
(1, 'هاکا'),
(2, 'هاکا گلوبال');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hacka`
--
ALTER TABLE `hacka`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizer`
--
ALTER TABLE `organizer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submitevent`
--
ALTER TABLE `submitevent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `typeevent`
--
ALTER TABLE `typeevent`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `hacka`
--
ALTER TABLE `hacka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `organizer`
--
ALTER TABLE `organizer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `submitevent`
--
ALTER TABLE `submitevent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `typeevent`
--
ALTER TABLE `typeevent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
