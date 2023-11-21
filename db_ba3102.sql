-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 21, 2023 at 07:04 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ba3102`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbaccount`
--

DROP TABLE IF EXISTS `tbaccount`;
CREATE TABLE IF NOT EXISTS `tbaccount` (
  `accid` int NOT NULL AUTO_INCREMENT,
  `empid` int DEFAULT NULL,
  `passwordencrypted` varchar(255) NOT NULL,
  PRIMARY KEY (`accid`),
  KEY `empid` (`empid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbaccount`
--

INSERT INTO `tbaccount` (`accid`, `empid`, `passwordencrypted`) VALUES
(1, NULL, 'hashed_password1'),
(2, NULL, 'hashed_password2');

-- --------------------------------------------------------

--
-- Table structure for table `tbadminfo`
--

DROP TABLE IF EXISTS `tbadminfo`;
CREATE TABLE IF NOT EXISTS `tbadminfo` (
  `admid` int NOT NULL AUTO_INCREMENT,
  `firstname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lastname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`admid`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbadminfo`
--

INSERT INTO `tbadminfo` (`admid`, `firstname`, `lastname`, `password`) VALUES
(11, 'Queenie', 'Manigbas', 'mina97'),
(12, 'Maria', 'De Leon', 'ganda34');

-- --------------------------------------------------------

--
-- Table structure for table `tbattendance`
--

DROP TABLE IF EXISTS `tbattendance`;
CREATE TABLE IF NOT EXISTS `tbattendance` (
  `attendanceid` int NOT NULL,
  `studid` varchar(10) DEFAULT NULL,
  `empid` int DEFAULT NULL,
  `facilityid` int DEFAULT NULL,
  `subjectid` int DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  PRIMARY KEY (`attendanceid`),
  KEY `studid` (`studid`),
  KEY `empid` (`empid`),
  KEY `facilityid` (`facilityid`),
  KEY `subjectid` (`subjectid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbempinfo`
--

DROP TABLE IF EXISTS `tbempinfo`;
CREATE TABLE IF NOT EXISTS `tbempinfo` (
  `empid` int NOT NULL AUTO_INCREMENT,
  `firstname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lastname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `department` text NOT NULL,
  PRIMARY KEY (`empid`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbempinfo`
--

INSERT INTO `tbempinfo` (`empid`, `firstname`, `lastname`, `department`) VALUES
(1, 'Elenor', 'Labiaga', 'CICS'),
(2, 'Daryl', 'Tiquio', 'CICS'),
(3, 'Dioneces', 'Alimoren', 'CICS'),
(4, 'Christopher', 'Reyes', 'CICS'),
(5, 'Arvin', 'Almario', 'CICS'),
(6, 'Nina', 'Aguila', 'CICS'),
(7, 'Zymon', 'Maquinto', 'CICS');

-- --------------------------------------------------------

--
-- Table structure for table `tbfacility`
--

DROP TABLE IF EXISTS `tbfacility`;
CREATE TABLE IF NOT EXISTS `tbfacility` (
  `facilityid` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `buildingname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `roomnumber` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `seatnumber` int NOT NULL,
  PRIMARY KEY (`facilityid`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbfacility`
--

INSERT INTO `tbfacility` (`facilityid`, `buildingname`, `roomnumber`, `seatnumber`) VALUES
('HC2003', 'HEB', 'Comlab 2', 3),
('CC1008', 'CECS', 'Comlab 1', 8),
('CC1007', 'CECS', 'Comlab 1', 7),
('CC1006', 'CECS', 'Comlab 1', 6),
('CC1005', 'CECS', 'Comlab 1', 5),
('CC1004', 'CECS', 'Comlab 1', 4),
('CC1003', 'CECS', 'Comlab 1', 3),
('CC1002', 'CECS', 'Comlab 1', 2),
('CC1001', 'CECS', 'Comlab 1', 1),
('HC2002', 'HEB', 'Comlab 2', 2),
('HC2001', 'HEB', 'Comlab 2', 1),
('HC1010', 'HEB', 'Comlab 1', 10),
('HC1009', 'HEB', 'Comlab 1', 9),
('HC1008', 'HEB', 'Comlab 1', 8),
('HC1007', 'HEB', 'Comlab 1', 7),
('HC1006', 'HEB', 'Comlab 1', 6),
('HC1005', 'HEB', 'Comlab 1', 5),
('HC1004', 'HEB', 'Comlab 1', 4),
('HC1003', 'HEB', 'Comlab 1', 3),
('HC1002', 'HEB', 'Comlab 1', 2),
('HC1001', 'HEB', 'Comlab 1', 1),
('CC2010', 'CECS', 'Comlab 2', 10),
('CC2009', 'CECS', 'Comlab 2', 9),
('CC2008', 'CECS', 'Comlab 2', 8),
('CC2007', 'CECS', 'Comlab 2', 7),
('CC2006', 'CECS', 'Comlab 2', 6),
('CC2005', 'CECS', 'Comlab 2', 5),
('CC2004', 'CECS', 'Comlab 2', 4),
('CC2003', 'CECS', 'Comlab 2', 3),
('CC2002', 'CECS', 'Comlab 2', 2),
('CC2001', 'CECS', 'Comlab 2', 1),
('CC1010', 'CECS', 'Comlab 1', 10),
('CC1009', 'CECS', 'Comlab 1', 9),
('HC2004', 'HEB', 'Comlab 2', 4),
('HC2005', 'HEB', 'Comlab 2', 5),
('HC2006', 'HEB', 'Comlab 2', 6),
('HC2007', 'HEB', 'Comlab 2', 7),
('HC2008', 'HEB', 'Comlab 2', 8),
('HC2009', 'HEB', 'Comlab 2', 9),
('HC2010', 'HEB', 'Comlab 2', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbstudinfo`
--

DROP TABLE IF EXISTS `tbstudinfo`;
CREATE TABLE IF NOT EXISTS `tbstudinfo` (
  `studid` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `firstname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lastname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `course` text NOT NULL,
  PRIMARY KEY (`studid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbstudinfo`
--

INSERT INTO `tbstudinfo` (`studid`, `firstname`, `lastname`, `course`) VALUES
('21-35608', 'Maria Andrea', 'De Leon', 'BSIT'),
('21-34693', 'Queenie', 'Manigbas', 'BSIT BA'),
('21-38479', 'Simone Louis', 'De Villa', 'BSIT'),
('21-35459', 'Irish', 'Suarez', 'BSIT'),
('21-33827', 'Maureen', 'Lozares', 'BSIT');

-- --------------------------------------------------------

--
-- Table structure for table `tbsubject`
--

DROP TABLE IF EXISTS `tbsubject`;
CREATE TABLE IF NOT EXISTS `tbsubject` (
  `subjectid` int NOT NULL,
  `subjectcode` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `subjectname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`subjectid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbsubject`
--

INSERT INTO `tbsubject` (`subjectid`, `subjectcode`, `subjectname`) VALUES
(1, 'BAT 401', 'Fundamentals of Business Analytics'),
(2, 'BAT 402', 'Fundamentals of Analytics Modeling'),
(3, 'IT 311', 'Administration and Maintenance'),
(4, 'IT 312', 'Systems Integration and Architecture'),
(5, 'IT 313', 'System Analysis and Design'),
(6, 'GED 107', 'Ethics'),
(7, 'IT 314', 'Web Systems and Technologies');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
