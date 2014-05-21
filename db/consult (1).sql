-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 02, 2014 at 06:11 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `consult`
--
CREATE DATABASE IF NOT EXISTS `consult` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `consult`;

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE IF NOT EXISTS `cases` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `client` varchar(10) NOT NULL,
  `consultant` varchar(15) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`id`, `client`, `consultant`, `status`) VALUES
(1, 'client', 'karis', 'SOLVED');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `msgid` int(100) NOT NULL AUTO_INCREMENT,
  `sender` varchar(11) NOT NULL,
  `recipient` varchar(11) NOT NULL,
  `msg` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`msgid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`msgid`, `sender`, `recipient`, `msg`, `date`, `status`) VALUES
(1, 'client', 'karis', '', '2014-04-30 20:53:43', 'READ'),
(2, 'client', 'karis', 'sorrydggffgaf ;fhffgefgeehfgfftdtdsvbcs\r\nffagfeyfggygsydgyddsddsgdsydgysdss\r\ndfdhfgeyfydgadsvfhfvdfvfdhfvhfff\r\ndssfdsydgydsydgsydsds\r\nsdsbsdhsjdsdjsdhsjdsd\r\ndsjdsjds', '2014-04-30 22:20:01', 'READ'),
(3, 'karis', 'client', 'CANT CLEARLY UNDERSTAND', '2014-04-30 22:36:54', 'READ'),
(4, 'client', 'karis', 'haiya it has worked', '2014-04-30 22:44:48', 'READ'),
(5, 'karis', 'client', 'ehfbgffgffgffgfifgigfaa', '2014-04-30 22:56:08', 'READ'),
(6, 'client2', 'karis', 'AM CLIENT 2', '2014-04-30 22:53:01', 'READ'),
(7, 'karis', 'client2', 'AL talk to yu later', '2014-04-30 22:54:59', 'READ'),
(8, 'client', 'kariuki   k', 'SUBMITTED A QUERY', '2014-05-01 07:33:04', 'UNREAD'),
(9, 'client', 'karis', 'JUST TRIED QUERYING D-BASE', '2014-05-01 07:57:59', 'READ'),
(10, 'karis', 'client2', 'HI client 2', '2014-05-01 08:08:55', 'UNREAD'),
(11, 'client', 'karis', 'HELLOW', '2014-05-01 14:25:14', 'READ'),
(12, 'client', 'sam', 'i got a problem in .....', '2014-05-01 14:17:00', 'UNREAD'),
(13, 'karis', 'client', 'yes', '2014-05-01 17:24:30', 'READ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `category` tinyint(2) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `status` varchar(20) NOT NULL,
  `speciality` varchar(56) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `category`, `username`, `password`, `firstname`, `lastname`, `status`, `speciality`) VALUES
(1, 2, 'karis', 'f0f46d191b9de6626c7daebd35335278', 'kariuki', 'karis', 'active', 'webdesigner'),
(2, 1, 'client', '62608e08adc29a8d6dbc9754e659f125', 'client', 'client', 'active', ''),
(3, 3, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', 'active', ''),
(5, 1, 'client2', '2c66045d4e4a90814ce9280272e510ec', 'client2', 'client2', 'active', 'N/A'),
(6, 2, 'sam', '332532dcfaa1cbf61e2a266bd723612c', 'samson', 'johes', 'active', 'Software Developer');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
