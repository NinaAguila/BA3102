-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 24, 2023 at 07:25 AM
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
-- Table structure for table `tbempinfo`
--

DROP TABLE IF EXISTS `tbempinfo`;
CREATE TABLE IF NOT EXISTS `tbempinfo` (
  `empid` int NOT NULL AUTO_INCREMENT,
  `lastname` varchar(25) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `department` varchar(30) NOT NULL,
  PRIMARY KEY (`empid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbempinfo`
--

INSERT INTO `tbempinfo` (`empid`, `lastname`, `firstname`, `department`) VALUES
(1, 'aguila', 'nina', 'cics');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_studentreports`
--

DROP TABLE IF EXISTS `tbl_studentreports`;
CREATE TABLE IF NOT EXISTS `tbl_studentreports` (
  `StudentReportID` int NOT NULL AUTO_INCREMENT,
  `SrCode` varchar(20) NOT NULL,
  `LogDate` date NOT NULL,
  `TimeIN` datetime(6) NOT NULL,
  `TImeOut` datetime(6) NOT NULL,
  PRIMARY KEY (`StudentReportID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_students`
--

DROP TABLE IF EXISTS `tbl_students`;
CREATE TABLE IF NOT EXISTS `tbl_students` (
  `SrCode` varchar(20) NOT NULL,
  `StudentName` varchar(100) NOT NULL,
  `StudentAdress` varchar(100) NOT NULL,
  `StudentContactNo` varchar(100) NOT NULL,
  `StudentDepartment` varchar(100) NOT NULL,
  PRIMARY KEY (`SrCode`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_students`
--

INSERT INTO `tbl_students` (`SrCode`, `StudentName`, `StudentAdress`, `StudentContactNo`, `StudentDepartment`) VALUES
('21-38207', 'Jhonathan T. Punzalan', 'San Sebastian Lipa City', '09977906459', 'CICS'),
('21-32683', 'Jhon Matthew Evangelista', 'Pangao Lipa City', '0953556588655', 'CAS'),
('21-67811', 'Zam Matthew Magbojos', 'Mataas Na Kahoy Batangas', '09785469874', 'CABE'),
('21-98745', 'Jed Enrique', 'Ibaan Batangas', '09785462585', 'CIT'),
('21-98754', 'John Victor Mamiit', 'BanayBanay Lipa City', '09785347852', 'CICS');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_useradmin`
--

DROP TABLE IF EXISTS `tbl_useradmin`;
CREATE TABLE IF NOT EXISTS `tbl_useradmin` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_useradmin`
--

INSERT INTO `tbl_useradmin` (`ID`, `Username`, `Password`) VALUES
(1, 'Jhonathan', 'qwerty123'),
(2, 'Matt', 'qwerty456'),
(3, 'Zam', 'qwerty789'),
(4, 'JV', '123456'),
(5, 'Jed', '987654');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_visitor`
--

DROP TABLE IF EXISTS `tbl_visitor`;
CREATE TABLE IF NOT EXISTS `tbl_visitor` (
  `VisitorIDNo` varchar(100) NOT NULL,
  `VisitorIDType` varchar(100) NOT NULL,
  `VisitorName` varchar(100) NOT NULL,
  `VisitorAdress` varchar(100) NOT NULL,
  `VisitorContactNo` varchar(100) NOT NULL,
  `VisitorSchool` varchar(100) NOT NULL,
  PRIMARY KEY (`VisitorIDNo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_visitor`
--

INSERT INTO `tbl_visitor` (`VisitorIDNo`, `VisitorIDType`, `VisitorName`, `VisitorAdress`, `VisitorContactNo`, `VisitorSchool`) VALUES
('7895454', 'Passport', 'Peter Parker', 'Lodlod Lipa City', '09784525874', 'Lodlod Integrated National High School'),
('985656656256565', 'School ID', 'Lawrence Magsino', 'Bolbok Lipa City', '09874546857', 'Bolbok Integrated National High School'),
('62765264124', 'School ID', 'Matteo De Leon', 'Lumbang Lipa City', '09785458458', 'Lumbang National High School'),
('655165165165156', 'Passport', 'Lesley Marasigan', 'Marawoy Lipa City', '09875254788', 'Inosluban Marawoy Integrated National High School'),
('5645164984865', 'School ID', 'Heime Batumbakal', 'Calingatan Mataas na Kahoy', '09852348756', 'Bikas Integrated School');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_visitorreport`
--

DROP TABLE IF EXISTS `tbl_visitorreport`;
CREATE TABLE IF NOT EXISTS `tbl_visitorreport` (
  `VisitorReportID` varchar(100) NOT NULL,
  `VisitorIDNo` varchar(100) NOT NULL,
  `LogDate` date NOT NULL,
  `TimeIN` datetime(6) NOT NULL,
  `TImeOut` datetime(6) NOT NULL,
  PRIMARY KEY (`VisitorReportID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_studinfo`
--

DROP TABLE IF EXISTS `tb_studinfo`;
CREATE TABLE IF NOT EXISTS `tb_studinfo` (
  `studid` int NOT NULL AUTO_INCREMENT,
  `lastname` varchar(25) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `course` varchar(20) NOT NULL,
  PRIMARY KEY (`studid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_studinfo`
--

INSERT INTO `tb_studinfo` (`studid`, `lastname`, `firstname`, `course`) VALUES
(1, 'parker', 'peter', 'bsit'),
(2, 'kent', 'clark', 'bscs');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
