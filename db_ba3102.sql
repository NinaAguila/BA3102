-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 28, 2023 at 03:29 PM
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
-- Table structure for table `addquantity`
--

DROP TABLE IF EXISTS `addquantity`;
CREATE TABLE IF NOT EXISTS `addquantity` (
  `equipmentId` int NOT NULL,
  `quantity` int DEFAULT NULL,
  `purchaseDate` datetime DEFAULT NULL,
  `equipmentCondition` varchar(255) DEFAULT NULL,
  `empid` int DEFAULT NULL,
  PRIMARY KEY (`equipmentId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `addquantity`
--

INSERT INTO `addquantity` (`equipmentId`, `quantity`, `purchaseDate`, `equipmentCondition`, `empid`) VALUES
(3, 2, '2023-11-28 21:16:00', 'Poor', 3),
(2, 3, '2023-11-28 21:15:00', 'Good', 1);

-- --------------------------------------------------------

--
-- Table structure for table `archived_equipment`
--

DROP TABLE IF EXISTS `archived_equipment`;
CREATE TABLE IF NOT EXISTS `archived_equipment` (
  `archivedId` int NOT NULL AUTO_INCREMENT,
  `equipmentId` int NOT NULL,
  `archivedDate` datetime DEFAULT NULL,
  `equipmentName` varchar(255) NOT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `description` text,
  `equipmentImage` varchar(255) DEFAULT NULL,
  `empid` int DEFAULT NULL,
  `removalReason` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  PRIMARY KEY (`archivedId`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `archived_equipment`
--

INSERT INTO `archived_equipment` (`archivedId`, `equipmentId`, `archivedDate`, `equipmentName`, `brand`, `quantity`, `description`, `equipmentImage`, `empid`, `removalReason`) VALUES
(48, 1, '2023-11-28 20:50:21', 'Soccer Ball', 'Brand A', 100, 'Description for Soccer Ball', '/SIA/images/soccer_ball.jpg', 2, 'Obsolete');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

DROP TABLE IF EXISTS `equipment`;
CREATE TABLE IF NOT EXISTS `equipment` (
  `equipmentId` int NOT NULL AUTO_INCREMENT,
  `equipmentName` varchar(255) NOT NULL,
  `equipmentCategoryId` int NOT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `description` text,
  `locationId` int DEFAULT NULL,
  `equipmentImage` blob,
  `empid` int DEFAULT NULL,
  PRIMARY KEY (`equipmentId`),
  KEY `equipmentCategoryId` (`equipmentCategoryId`),
  KEY `locationId` (`locationId`),
  KEY `fk_empid` (`empid`)
) ENGINE=MyISAM AUTO_INCREMENT=143 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`equipmentId`, `equipmentName`, `equipmentCategoryId`, `brand`, `description`, `locationId`, `equipmentImage`, `empid`) VALUES
(1, 'Soccer Ball', 1, 'Brand A', 'Description for Soccer Ball', 1, 0x2f5349412f696d616765732f736f636365725f62616c6c2e6a7067, 1),
(2, 'Basketball', 2, 'Brand B', 'Description for Basketball', 2, 0x2f5349412f696d616765732f6261736b657462616c6c2e6a7067, 2);

-- --------------------------------------------------------

--
-- Table structure for table `equipmentcategories`
--

DROP TABLE IF EXISTS `equipmentcategories`;
CREATE TABLE IF NOT EXISTS `equipmentcategories` (
  `categoryId` int NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(255) NOT NULL,
  PRIMARY KEY (`categoryId`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `equipmentcategories`
--

INSERT INTO `equipmentcategories` (`categoryId`, `categoryName`) VALUES
(1, 'Soccer'),
(2, 'Basketball'),
(3, 'Tennis'),
(4, 'Baseball'),
(5, 'Volleyball');

-- --------------------------------------------------------

--
-- Table structure for table `equipmentremovalrequests`
--

DROP TABLE IF EXISTS `equipmentremovalrequests`;
CREATE TABLE IF NOT EXISTS `equipmentremovalrequests` (
  `requestId` int NOT NULL AUTO_INCREMENT,
  `equipmentId` int NOT NULL,
  `requestDate` datetime DEFAULT NULL,
  `removalReason` text,
  `quantityToRemove` int DEFAULT NULL,
  `empid` int DEFAULT NULL,
  PRIMARY KEY (`requestId`),
  KEY `equipmentId` (`equipmentId`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `equipmentremovalrequests`
--

INSERT INTO `equipmentremovalrequests` (`requestId`, `equipmentId`, `requestDate`, `removalReason`, `quantityToRemove`, `empid`) VALUES
(34, 1, '2023-11-28 20:50:00', 'Obsolete', 100, 2);

-- --------------------------------------------------------

--
-- Table structure for table `equipmentupdates`
--

DROP TABLE IF EXISTS `equipmentupdates`;
CREATE TABLE IF NOT EXISTS `equipmentupdates` (
  `updateId` int NOT NULL AUTO_INCREMENT,
  `equipmentId` int NOT NULL,
  `updateDate` datetime DEFAULT NULL,
  `originalValue` text,
  `valueToAdd` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `empid` int DEFAULT NULL,
  PRIMARY KEY (`updateId`),
  KEY `equipmentId` (`equipmentId`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
CREATE TABLE IF NOT EXISTS `locations` (
  `locationId` int NOT NULL AUTO_INCREMENT,
  `locationName` varchar(255) NOT NULL,
  `locationDescription` text,
  PRIMARY KEY (`locationId`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`locationId`, `locationName`, `locationDescription`) VALUES
(1, 'Equipment Room 1', 'Description for Equipment Room 1'),
(2, 'Equipment Room 2', 'Description for Equipment Room 2'),
(3, 'Storage Area A', 'Description for Storage Area A'),
(4, 'Storage Area B', 'Description for Storage Area B'),
(5, 'Gymnasium', 'Description for Gymnasium');

-- --------------------------------------------------------

--
-- Table structure for table `login_logout_log`
--

DROP TABLE IF EXISTS `login_logout_log`;
CREATE TABLE IF NOT EXISTS `login_logout_log` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `userRole` varchar(255) NOT NULL,
  `event_type` enum('login','logout') NOT NULL,
  `timestamp` datetime NOT NULL,
  `empid` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=634 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `login_logout_log`
--

INSERT INTO `login_logout_log` (`id`, `username`, `userRole`, `event_type`, `timestamp`, `empid`) VALUES
(633, 'remover', 'equipment remover', 'login', '2023-11-28 23:27:28', NULL),
(632, 'admin', 'admin', 'logout', '2023-11-28 23:27:23', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbempinfo`
--

INSERT INTO `tbempinfo` (`empid`, `lastname`, `firstname`, `department`) VALUES
(1, 'aguila', 'nina', 'cics'),
(2, 'Doe', 'John', 'cabe'),
(3, 'Smith', 'Alice', 'cas'),
(4, 'Johnson', 'Bob', 'cit'),
(5, 'Williams', 'Emily', 'cte');

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userId` int NOT NULL AUTO_INCREMENT,
  `userName` varchar(255) NOT NULL,
  `userRole` varchar(255) NOT NULL,
  `passwordHash` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `userImage` varchar(255) DEFAULT NULL,
  `empid` int DEFAULT NULL,
  PRIMARY KEY (`userId`),
  KEY `fk_empid` (`empid`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userRole`, `passwordHash`, `firstName`, `lastName`, `userImage`, `empid`) VALUES
(45, 'remover', 'equipment remover', '$2y$10$ORIaWsSqMhOwv0FP3ChLc.2hS2.BUi44BW00x1tjTOIdcN/.jhR3O', 'John', 'Doe', 'user_images/6565faa6208f1_ericka_img.png', 2),
(40, 'admin', 'admin', '$2y$10$8Qtz/TaSGCMmcfI1lQLd4uGQCzI4QKesE5uDFbSDGW3pgMAUd/xe2', 'nina', 'aguila', 'user_images/6565e57919e43_mig_img.png', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
