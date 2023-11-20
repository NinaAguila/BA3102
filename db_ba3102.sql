-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 20, 2023 at 05:45 AM
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
  `purchaseDate` datetime DEFAULT NULL,
  `equipmentImage` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`archivedId`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `archived_equipment`
--

INSERT INTO `archived_equipment` (`archivedId`, `equipmentId`, `archivedDate`, `equipmentName`, `brand`, `quantity`, `description`, `purchaseDate`, `equipmentImage`) VALUES
(7, 98, '2023-11-17 22:41:04', 'first', 'Adidas', 2, 'iop', '1970-01-01 00:00:00', 'images/ring.jpg'),
(8, 98, '2023-11-17 22:42:34', 'first', 'Adidas', 2, 'iop', '1970-01-01 00:00:00', 'images/ring.jpg'),
(9, 99, '2023-11-17 22:49:51', 'first', 'Adidas', 2, 'dvdfg', '2023-11-07 22:45:00', 'images/ring.jpg'),
(10, 100, '2023-11-17 22:53:34', 'first', 'Adidas', 2, 'sdfsdf', '2023-11-17 22:52:00', 'images/spalding.jpeg'),
(11, 101, '2023-11-17 22:55:49', 'first', 'Adidas', 2, 'ewtgesdgf', '1970-01-01 00:00:00', 'images/ed_img (1).png'),
(12, 101, '2023-11-17 22:56:05', 'first', 'Adidas', 52, 'ewtgesdgf', '1970-01-01 00:00:00', 'images/ed_img (1).png'),
(13, 102, '2023-11-17 23:10:55', 'first', 'Adidas', 54, 'fghfgh', '1970-01-01 00:00:00', 'images/ring.jpg');

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
) ENGINE=MyISAM AUTO_INCREMENT=116 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`equipmentId`, `equipmentName`, `equipmentCategoryId`, `brand`, `quantity`, `description`, `purchaseDate`, `equipmentCondition`, `locationId`, `equipmentImage`) VALUES
(1, 'Soccer Ball', 1, 'Brand A', 12, 'Description for Soccer Ball', '2023-10-30 12:00:00', 'New', 1, 0x2f5349412f696d616765732f736f636365725f62616c6c2e6a7067),
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
  `removalReason` text,
  `quantityToRemove` int DEFAULT NULL,
  PRIMARY KEY (`requestId`),
  KEY `equipmentId` (`equipmentId`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `equipmentremovalrequests`
--

INSERT INTO `equipmentremovalrequests` (`requestId`, `equipmentId`, `requestDate`, `removalReason`, `quantityToRemove`) VALUES
(1, 94, '2023-11-17 21:34:00', 'Good', 1),
(2, 94, '2023-11-17 21:36:00', 'New', 1),
(3, 94, '2023-11-17 21:41:00', 'New', 1),
(4, 94, '2023-11-17 21:42:00', 'New', 42),
(5, 96, '2023-11-17 21:45:00', 'Like New', 1),
(6, 97, '2023-11-17 22:00:00', 'Like New', 2),
(7, 98, '0000-00-00 00:00:00', '', 2),
(8, 98, '0000-00-00 00:00:00', 'Good', 2);

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
  PRIMARY KEY (`updateId`),
  KEY `equipmentId` (`equipmentId`)
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
) ENGINE=MyISAM AUTO_INCREMENT=383 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `login_logout_log`
--

INSERT INTO `login_logout_log` (`id`, `username`, `userRole`, `event_type`, `timestamp`) VALUES
(382, 'adder', 'equipment adder', 'login', '2023-11-20 11:49:32'),
(381, 'admin', 'admin', 'logout', '2023-11-20 11:49:27'),
(380, 'admin', 'admin', 'login', '2023-11-20 11:48:37'),
(379, 'adder', 'equipment adder', 'logout', '2023-11-20 11:48:33'),
(378, 'adder', 'equipment adder', 'login', '2023-11-20 11:17:43'),
(377, 'admin', 'admin', 'logout', '2023-11-20 11:17:37');

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
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userRole`, `passwordHash`, `firstName`, `lastName`, `userImage`) VALUES
(23, 'remover', 'equipment remover', '$2y$10$9nm/c/UWrWGX6DwtOimiH.GpZgPihFFKNQtTpoax2EdYeOZT0Q6.u', 'Edbert', 'Plopenio', 'user_images/ed_img (1).png'),
(22, 'adder', 'equipment adder', '$2y$10$3Pw3UFlhHGSXECAt5/xsJecZJngwDXKsQa3LRPw9FvWt9M0jtX72K', 'Andrea', 'Bernardo', 'user_images/13.webp'),
(21, 'admin', 'admin', '$2y$10$YsmBAIuqRtkrh9d5UN3/feONys9EF00Of8M8nlORvYYRLtc8cLDOK', 'Kath', 'Brillantes', 'user_images/9.webp');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
