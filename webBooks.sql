-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 20, 2012 at 09:37 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `webbooks`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE IF NOT EXISTS `authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `authorName` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `authorName`) VALUES
(1, 'Stephen Lawhead'),
(2, 'Winston Churchill'),
(3, 'Michael Howard'),
(4, 'Joe Smith'),
(5, 'Louis Lamour'),
(6, 'Arthur Conan Doyle'),
(7, 'Billy "the Kid" Hintz'),
(8, 'Mr C'),
(9, 'Sir Hacksalot'),
(10, 'Stephen King'),
(11, 'Alfred Hitchkok'),
(12, 'Marie Antoinette'),
(13, 'Frank Castle - The Punisher');

-- --------------------------------------------------------

--
-- Table structure for table `bookstuff`
--

CREATE TABLE IF NOT EXISTS `bookstuff` (
  `bookCode` int(11) NOT NULL AUTO_INCREMENT,
  `bookTitle` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `authorId` int(11) NOT NULL,
  PRIMARY KEY (`bookCode`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `bookstuff`
--

INSERT INTO `bookstuff` (`bookCode`, `bookTitle`, `catId`, `authorId`) VALUES
(1, 'Taliesin', 1, 1),
(2, 'Grail', 1, 1),
(3, 'Merlin', 1, 1),
(4, 'Arthur', 1, 1),
(5, 'Pendragon', 1, 1),
(6, 'History of the Ancient World', 2, 2),
(7, 'The Franco-Prussian War of 1870', 2, 3),
(8, 'Cherynobyl', 2, 4),
(9, 'Shalako', 3, 5),
(10, 'Guns of the Timberlands', 3, 5),
(11, 'Under the Sweetwater Rim', 3, 5),
(12, 'Sackett', 3, 5),
(13, 'Bendigo Shafter', 3, 5),
(14, 'O'' Reilly''s Luck', 3, 5),
(15, 'Last Stand at Papago Wells', 3, 5),
(16, 'Hondo', 3, 5),
(17, 'The Hound of the Baskervilles', 4, 6),
(18, 'A Study in Scarlet', 4, 6),
(19, 'The Sign of Four', 4, 6),
(20, 'The Valley of Fear', 4, 6),
(21, 'The Six Napoleons', 4, 6),
(22, 'Five Orange Pips', 4, 6),
(23, 'Warsaw', 5, 7),
(24, 'The Man Who Knew too Little', 5, 8),
(25, 'The Gates of Stalingrad', 5, 9),
(26, 'The Gunslinger', 6, 10),
(27, 'The Birds', 6, 11),
(28, 'Children of the Corn', 6, 10),
(29, 'Vertigo', 6, 11),
(30, 'Rear Window', 6, 11),
(31, 'Midnight Grafitti', 6, 12),
(32, 'Lonesome Dove', 3, 13);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Celtic Novel'),
(2, 'History'),
(3, 'Western'),
(4, 'Mystery'),
(5, 'Historical Novel'),
(6, 'Horror');