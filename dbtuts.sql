-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2015 at 09:03 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbtuts`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `projectName` varchar(85) NOT NULL,
  `projectType` varchar(25) NOT NULL,
  `cost` int(45) NOT NULL,
  `duration` int(50) NOT NULL,
  `issues` int(50) NOT NULL,
  `completed` varchar(50) NOT NULL,
  `objective` varchar(2000) NOT NULL,
  `description` varchar(2000) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `projectName`, `projectType`, `cost`, `duration`, `issues`, `completed`, `objective`, `description`) VALUES
(2, 'Maintainance Portal', 'Current', 8000, 12, 4, 'true', 'To implement a data-driven approach that delivers quality on-demand and scheduled maintenance service while lowering overall costs.', 'Facilities Maintenance Portal is a web application for a multi-site facilities maintenance and repair specialist company that partners with clients in industries ranging from restaurant and retail to transportation and logistics. The goal is to implement a data-driven approach that delivers quality on-demand and scheduled maintenance service while lowering overall costs. The application is a module under the customer, partner and employee web portal and is a proprietary web based application developed using the J2EE platform.'),
(4, 'Project Tracker', 'Past', 4000, 13, 5, 'true', 'To build an application allows a client company to track and monitor information on all projects from a central location.', 'This application allows a client company to track and monitor information on all projects from a central location. It houses the complete list of all current and past projects. Other useful information like detailed description, project category, estimated duration, estimated cost, business objective, resource allocation, project tasks, any issues, how the project supports the organizationâ€™s overall strategies, and so on can then be added. It also has functionality to track and monitor the status of each individual project in the system with details concerning task, resource assignment, issues and timeline. Also included are reporting features so management gets a snapshot of the companyâ€™s project portfolio and will be able to review or reevaluate project priorities, identify and address conflicts or issues, track success failure criteria and see what projects provide the greatest value add to the company. '),
(16, 'Article Repository', 'Past', 6000, 20, 2, 'false', 'To build an application that allows registered users to perform custom searches for articles, and also allows librarians to add and delete articles.', 'TAR is an application for managing repository of technical articles written by company employees. This application is built on Java/J2EE with Oracle as a database. This project allows registered users to perform custom searches for articles, and also allows librarians to add and delete articles. The system retains publication data including online references for each article in a database and file system.'),
(17, 'ScotBoard', 'Past', 5000, 18, 1, 'true', 'k', 'k'),
(30, 'Proj1', 'Current', 5000, 12, 4, 'true', 'To build a database drive solution', 'Just some random project that never does anything'),
(31, 'dome', 'Current', 8000, 20, 5, 'false', 'To build a database drive solution', 'I need a mechanic for hire'),
(32, 'random', 'Current', 9000, 10, 7, 'false', 'To build a database drive solution', 'XYZ'),
(36, 'Facilities Maintainance Po', 'Current', 50000, 12, 5, 'true', 'To build a database drive solution', 'I need a plumber in fairfax'),
(37, 'somejnn', 'Current', 50000, 14, 2, 'true', 'skjdfnkjkfjsn', 'I need a plumberax in fairf'),
(38, 'somebjhbjhbj', 'Past', 40000, 4, 2, 'false', 'skjdfnkjkfjsn', 'some rhdflskdmf');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
