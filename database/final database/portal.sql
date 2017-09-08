-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 06, 2017 at 05:31 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `portal`
--
CREATE DATABASE IF NOT EXISTS `portal` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `portal`;

-- --------------------------------------------------------

--
-- Table structure for table `rss`
--

CREATE TABLE IF NOT EXISTS `rss` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `rss_url` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `rss`
--

INSERT INTO `rss` (`id`, `email`, `rss_url`) VALUES
(2, 'test2@gmail.com', 'http://rss.cnn.com/rss/edition_football.xml\r\n'),
(3, 'test2@gmail.com', 'http://rss.cnn.com/rss/money_news_international.xml'),
(4, 'naqvi.dastan@gmail.com', 'http://feeds.bbci.co.uk/news/rss.xml'),
(5, 'test2@gmail.com', 'http://rss.cnn.com/rss/edition_us.xml'),
(9, 'test7@gmail.com', 'http://rss.cnn.com/rss/money_markets.xml'),
(10, 'test6@gmail.com', 'http://rss.cnn.com/rss/money_latest.xml'),
(14, 'test5@gmail.com', 'http://rss.cnn.com/rss/money_markets.xml'),
(15, 'naqvi.dastan@gmail.com', 'http://rss.cnn.com/rss/edition_technology.xml'),
(17, 'test8@gmail.com', 'http://rss.cnn.com/rss/cnn_latest.xml'),
(18, 'bhavya.shah.i13@aesics.ahduni.edu.in', 'http://rss.cnn.com/rss/edition_africa.xml'),
(19, 'lifi@gmail.com', 'http://rss.cnn.com/rss/money_news_international.xml'),
(20, 'lifi@gmail.com', 'http://rss.cnn.com/rss/edition_space.xml'),
(21, 'lifi@gmail.com', 'http://rss.cnn.com/rss/edition_space.xml'),
(22, 'lifi@gmail.com', 'http://rss.cnn.com/rss/edition_sport.xml');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `fullname` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(80) NOT NULL,
  `fileupload` varchar(50) NOT NULL,
  `isdelete` int(1) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`fullname`, `email`, `password`, `fileupload`, `isdelete`) VALUES
('abc', 'abc@gmail.com', 'c6f057b86584942e415435ffb1fa93d4', '11.png', 1),
('hifi', 'hifi@gmail.com', 'a01610228fe998f515a72dd730294d87', 'Mario-Transparent-Background.png', 0),
('lifi', 'lifi@gmail.com', '149815eb972b3c370dee3b89d645ae14', 'jaguar-wallpaper-19.jpg', 0),
('Dastan', 'naqvi.dastan@gmail.com', '', '', 1),
('priyanka', 'pri@gmail.com', '202cb962ac59075b964b07152d234b70', 'jaguar-wallpaper-19.jpg', 1),
('ragheeb naqvi', 'ragheeb@gmail.com', 'b706835de79a2b4e80506f582af3676a', 'Penguins.jpg', 1),
('sanjana modi', 'sanjana@gmail.com', '01cfcd4f6b8770febfb40cb906715822', 'pensil.png', 1),
('sarfaraz naqvi', 'sar@gmail.com', '202cb962ac59075b964b07152d234b70', 'IMG_4676.JPG', 0),
('aaaaa', 'test10@gmail.com', 'a01610228fe998f515a72dd730294d87', '34.jpg', 0),
('test2', 'test2@gmail.com', '6512bd43d9caa6e02c990b0a82652dca', '11.png', 0),
('test4', 'test4@gmail.com', 'b59c67bf196a4758191e42f76670ceba', '11.png', 0),
('test5', 'test5@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', 'pensil.png', 0),
('test6', 'test6@gmail.com', '38f629170ac3ab74b9d6d2cc411c2f3c', '11.png', 0),
('test7', 'test7@gmail.com', 'fa246d0262c3925617b0c72bb20eeb1d', 'pensil.png', 0),
('test8', 'test8@gmail.com', '38f629170ac3ab74b9d6d2cc411c2f3c', 'smiley-face.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oauth_provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `oauth_provider`, `oauth_uid`, `first_name`, `last_name`, `email`, `gender`, `locale`, `picture`, `link`, `created`, `modified`) VALUES
(3, 'google', '107716893799306615252', 'Dastan', 'naqvi', 'naqvi.dastan@gmail.com', 'male', 'en', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg', 'https://plus.google.com/107716893799306615252', '2017-03-11 19:25:00', '2017-03-30 08:40:48');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
