-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 24, 2023 at 07:43 AM
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
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `Admin ID` int NOT NULL,
  `First Name` text NOT NULL,
  `Last Name` text NOT NULL,
  `Password` varchar(20) NOT NULL,
  PRIMARY KEY (`Admin ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendance`
--

DROP TABLE IF EXISTS `tbl_attendance`;
CREATE TABLE IF NOT EXISTS `tbl_attendance` (
  `SR-Code` varchar(10) NOT NULL,
  `Subject Code` varchar(10) NOT NULL,
  `Building Name` text NOT NULL,
  `Room No` int NOT NULL,
  `Unit / Chair` text NOT NULL,
  `Unit / Chair Number` int NOT NULL,
  `Faculty Name` text NOT NULL,
  PRIMARY KEY (`SR-Code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_facility`
--

DROP TABLE IF EXISTS `tbl_facility`;
CREATE TABLE IF NOT EXISTS `tbl_facility` (
  `Facility ID` int NOT NULL,
  `Building Name` text NOT NULL,
  `Room No` int NOT NULL,
  `Unit No` int NOT NULL,
  `Chair No` int NOT NULL,
  PRIMARY KEY (`Facility ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faculty`
--

DROP TABLE IF EXISTS `tbl_faculty`;
CREATE TABLE IF NOT EXISTS `tbl_faculty` (
  `Faculty ID` int NOT NULL,
  `First Name` text NOT NULL,
  `Last Name` text NOT NULL,
  `Password` varchar(20) NOT NULL,
  PRIMARY KEY (`Faculty ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

DROP TABLE IF EXISTS `tbl_student`;
CREATE TABLE IF NOT EXISTS `tbl_student` (
  `SR-Code` int NOT NULL,
  `First Name` text NOT NULL,
  `Last Name` text NOT NULL,
  `Year and Section` varchar(20) NOT NULL,
  PRIMARY KEY (`SR-Code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

DROP TABLE IF EXISTS `tbl_subject`;
CREATE TABLE IF NOT EXISTS `tbl_subject` (
  `Subject ID` int NOT NULL,
  `Subject Code` varchar(10) NOT NULL,
  `Subject Name` text NOT NULL,
  PRIMARY KEY (`Subject ID`,`Subject Code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
