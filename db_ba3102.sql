-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 11, 2023 at 10:55 AM
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
-- Table structure for table `equipment`
--

DROP TABLE IF EXISTS `equipment`;
CREATE TABLE IF NOT EXISTS `equipment` (
  `equipmentId` int NOT NULL AUTO_INCREMENT,
  `equipmentName` varchar(255) NOT NULL,
  `equipmentCategoryId` int NOT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `description` text,
  `purchaseDate` datetime DEFAULT NULL,
  `equipmentCondition` varchar(255) DEFAULT NULL,
  `locationId` int DEFAULT NULL,
  `equipmentImage` blob,
  PRIMARY KEY (`equipmentId`),
  KEY `equipmentCategoryId` (`equipmentCategoryId`),
  KEY `locationId` (`locationId`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`equipmentId`, `equipmentName`, `equipmentCategoryId`, `brand`, `quantity`, `description`, `purchaseDate`, `equipmentCondition`, `locationId`, `equipmentImage`) VALUES
(1, 'Soccer Ball', 1, 'Brand A', 10, 'Description for Soccer Ball', '2023-10-30 12:00:00', 'New', 1, 0x2f5349412f696d616765732f736f636365725f62616c6c2e6a7067),
(2, 'Basketball', 2, 'Brand B', 5, 'Description for Basketball', '2023-10-30 12:00:00', 'Used', 2, 0x2f5349412f696d616765732f6261736b657462616c6c2e6a7067),
(3, 'Tennis Racket', 3, 'Brand C', 8, 'Description for Tennis Racket', '2023-10-30 12:00:00', 'Good', 3, 0x2f5349412f696d616765732f74656e6e69735f7261636b65742e6a7067),
(4, 'Baseball Bat', 4, 'Brand D', 3, 'Description for Baseball Bat', '2023-10-30 12:00:00', 'Excellent', 4, 0x2f5349412f696d616765732f6261736562616c6c5f6261742e6a706567),
(5, 'Volleyball', 5, 'Brand E', 12, 'Description for Volleyball', '2023-10-30 12:00:00', 'Fair', 5, 0x2f5349412f696d616765732f766f6c6c657962616c6c2e6a706567);

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
  `requestedByUserId` int DEFAULT NULL,
  `removalReason` text,
  `quantityToRemove` int DEFAULT NULL,
  `removalMethod` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`requestId`),
  KEY `equipmentId` (`equipmentId`),
  KEY `requestedByUserId` (`requestedByUserId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `equipmentupdates`
--

DROP TABLE IF EXISTS `equipmentupdates`;
CREATE TABLE IF NOT EXISTS `equipmentupdates` (
  `updateId` int NOT NULL AUTO_INCREMENT,
  `equipmentId` int NOT NULL,
  `updateDate` datetime DEFAULT NULL,
  `updatedByUserId` int DEFAULT NULL,
  `fieldUpdated` varchar(255) DEFAULT NULL,
  `originalValue` text,
  `newValue` text,
  `reasonForUpdate` text,
  PRIMARY KEY (`updateId`),
  KEY `equipmentId` (`equipmentId`),
  KEY `updatedByUserId` (`updatedByUserId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `login_logout_log`
--

INSERT INTO `login_logout_log` (`id`, `username`, `userRole`, `event_type`, `timestamp`) VALUES
(1, 'admin', 'admin', 'login', '2023-11-06 13:59:09'),
(2, 'admin', 'admin', 'login', '2023-11-06 14:01:11'),
(3, 'admin', 'admin', 'logout', '2023-11-06 14:01:12'),
(4, 'Equipment adder', 'equipment adder', 'login', '2023-11-06 14:01:22'),
(5, 'Equipment adder', 'equipment adder', 'logout', '2023-11-06 14:01:24'),
(6, 'admin', 'admin', 'login', '2023-11-06 14:01:28'),
(7, 'admin', 'admin', 'logout', '2023-11-06 14:16:23'),
(8, 'admin', 'admin', 'login', '2023-11-06 14:16:31'),
(9, 'admin', 'admin', 'logout', '2023-11-06 14:18:28'),
(10, 'admin', 'admin', 'login', '2023-11-06 14:18:33'),
(11, 'admin', 'admin', 'logout', '2023-11-06 14:18:59'),
(12, 'equipment adder', 'equipment adder', 'login', '2023-11-06 14:19:06'),
(13, 'equipment adder', 'equipment adder', 'logout', '2023-11-06 14:19:09'),
(14, 'admin', 'admin', 'login', '2023-11-06 14:19:14'),
(15, 'admin', 'admin', 'login', '2023-11-06 02:22:00'),
(16, 'admin', 'admin', 'logout', '2023-11-06 02:23:00'),
(17, 'admin', 'admin', 'login', '2023-11-06 02:23:00'),
(18, 'admin', 'admin', 'login', '2023-11-06 22:26:50'),
(19, 'admin', 'admin', 'logout', '2023-11-06 22:27:09'),
(20, 'admin', 'admin', 'login', '2023-11-06 22:28:06'),
(21, 'admin', 'admin', 'login', '2023-11-06 22:40:30'),
(22, 'admin', 'admin', 'logout', '2023-11-07 09:45:27'),
(23, 'equipment remover', 'equipment remover', 'login', '2023-11-07 09:45:36'),
(24, 'equipment remover', 'equipment remover', 'logout', '2023-11-07 09:47:29'),
(25, 'equipment adder', 'equipment adder', 'login', '2023-11-07 09:47:37'),
(26, 'equipment adder', 'equipment adder', 'logout', '2023-11-07 09:53:44'),
(27, 'admin', 'admin', 'login', '2023-11-07 09:53:50'),
(28, 'admin', 'admin', 'logout', '2023-11-07 14:02:09'),
(29, 'equipment remover', 'equipment remover', 'login', '2023-11-07 14:02:29'),
(30, 'equipment remover', 'equipment remover', 'logout', '2023-11-07 14:02:55'),
(31, 'equipment adder', 'equipment adder', 'login', '2023-11-07 14:03:03'),
(32, 'equipment adder', 'equipment adder', 'logout', '2023-11-07 14:04:35'),
(33, 'equipment adder', 'equipment adder', 'login', '2023-11-07 14:04:45'),
(34, 'equipment adder', 'equipment adder', 'logout', '2023-11-07 14:04:54'),
(35, 'equipment remover', 'equipment remover', 'login', '2023-11-07 14:05:04'),
(36, 'equipment remover', 'equipment remover', 'logout', '2023-11-07 14:08:22'),
(37, 'admin', 'admin', 'login', '2023-11-07 14:08:27'),
(38, 'admin', 'admin', 'login', '2023-11-07 15:16:47'),
(39, 'admin', 'admin', 'logout', '2023-11-07 15:18:40'),
(40, 'equipment adder', 'equipment adder', 'login', '2023-11-07 15:18:50'),
(41, 'equipment adder', 'equipment adder', 'logout', '2023-11-07 15:19:11'),
(42, 'equipment remover', 'equipment remover', 'login', '2023-11-07 15:19:21'),
(43, 'admin', 'admin', 'login', '2023-11-07 19:17:22'),
(44, 'admin', 'admin', 'login', '2023-11-07 19:29:07'),
(45, 'admin', 'admin', 'logout', '2023-11-07 20:19:28'),
(46, 'admin', 'admin', 'login', '2023-11-07 20:19:55'),
(47, 'admin', 'admin', 'login', '2023-11-09 15:24:12');

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
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userRole`, `passwordHash`) VALUES
(1, 'Admin', 'admin', 'admin'),
(2, 'Equipment Adder', 'equipment adder', 'adder'),
(3, 'Equipment Remover', 'equipment remover', 'remover');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
