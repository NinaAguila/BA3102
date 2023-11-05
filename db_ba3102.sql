-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 05, 2023 at 11:51 PM
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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userId` int NOT NULL AUTO_INCREMENT,
  `userName` varchar(255) NOT NULL,
  `userRole` varchar(255) NOT NULL,
  `passwordHash` varchar(255) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
