-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 10, 2013 at 05:04 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `calendar_sys`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(25) DEFAULT NULL,
  `body` text,
  `created` varchar(19) DEFAULT NULL,
  `modified` varchar(19) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `start_time` char(5) DEFAULT NULL,
  `end_time` char(5) DEFAULT NULL,
  `date` date DEFAULT '0000-01-01',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `body`, `created`, `modified`, `location`, `start_time`, `end_time`, `date`) VALUES
(1, 'Madiba function', 'The celebration of Nelson Mandela''s legacy.', NULL, '2013-10-08', 'Sandton City', '10:00', '11:00', '2013-10-07'),
(2, 'test', 'This is the first event.', NULL, '2013-10-08', 'here', '23', '34', '2013-10-08'),
(5, 'Test', 'Some text goes here', '2013-10-08', NULL, 'where ever', '13:00', '14:00', '2013-10-09');
