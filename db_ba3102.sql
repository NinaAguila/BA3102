-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 21, 2023 at 08:23 AM
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
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `archived_equipment`
--

INSERT INTO `archived_equipment` (`archivedId`, `equipmentId`, `archivedDate`, `equipmentName`, `brand`, `quantity`, `description`, `purchaseDate`, `equipmentImage`) VALUES
(28, 126, '2023-11-20 22:10:39', 'sad', 'Adidas', 80, 'sfgdsfg', '2023-11-20 22:09:00', 'images/spalding.jpeg'),
(27, 126, '2023-11-20 22:10:12', 'sad', 'Adidas', 5, 'sfgdsfg', '2023-11-20 22:09:00', 'images/spalding.jpeg'),
(26, 125, '2023-11-20 22:05:50', 'sad', 'Nike', 85, 'dg', '1970-01-01 00:00:00', 'images/spalding.jpeg'),
(25, 123, '2023-11-20 22:01:00', 'sad', 'Wilson', 247, 'sdfsdf', '2023-11-20 21:56:00', 'images/SEISlogo.png'),
(24, 123, '2023-11-20 21:59:46', 'sad', 'Wilson', 2, 'sdfsdf', '2023-11-20 21:56:00', 'images/SEISlogo.png'),
(23, 123, '2023-11-20 21:58:01', 'sad', 'Wilson', 2, 'sdfsdf', '2023-11-20 21:56:00', 'images/SEISlogo.png'),
(22, 122, '2023-11-20 21:53:56', 'sad', 'Wilson', 83, 'asd', '2023-11-19 21:52:00', 'images/spalding.jpeg'),
(21, 122, '2023-11-20 21:53:32', 'sad', 'Wilson', 2, 'asd', '2023-11-19 21:52:00', 'images/spalding.jpeg'),
(29, 127, '2023-11-20 22:35:10', 'sad', 'Adidas', 5, 'vgjm', '1970-01-01 00:00:00', 'images/spalding.jpeg'),
(30, 127, '2023-11-20 23:05:41', 'sad', 'Adidas', 5, 'vgjm', '1970-01-01 00:00:00', 'images/spalding.jpeg'),
(31, 127, '2023-11-20 23:05:59', 'sad', 'Adidas', 5, 'vgjm', '1970-01-01 00:00:00', 'images/spalding.jpeg'),
(32, 127, '2023-11-20 23:09:01', 'sad', 'Adidas', 5, 'vgjm', '1970-01-01 00:00:00', 'images/spalding.jpeg'),
(33, 127, '2023-11-20 23:18:47', 'sad', 'Adidas', 5, 'vgjm', '1970-01-01 00:00:00', 'images/spalding.jpeg');

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
) ENGINE=MyISAM AUTO_INCREMENT=128 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`equipmentId`, `equipmentName`, `equipmentCategoryId`, `brand`, `quantity`, `description`, `purchaseDate`, `equipmentCondition`, `locationId`, `equipmentImage`) VALUES
(1, 'Soccer Ball', 1, 'Brand A', 12, 'Description for Soccer Ball', '2023-10-30 12:00:00', 'New', 1, 0x2f5349412f696d616765732f736f636365725f62616c6c2e6a7067),
(2, 'Basketball', 2, 'Brand B', 5, 'Description for Basketball', '2023-10-30 12:00:00', 'Used', 2, 0x2f5349412f696d616765732f6261736b657462616c6c2e6a7067),
(3, 'Tennis Racket', 3, 'Brand C', 8, 'Description for Tennis Racket', '2023-10-30 12:00:00', 'Good', 3, 0x2f5349412f696d616765732f74656e6e69735f7261636b65742e6a7067),
(4, 'Baseball Bat', 4, 'Brand D', 3, 'Description for Baseball Bat', '2023-10-30 12:00:00', 'Excellent', 4, 0x2f5349412f696d616765732f6261736562616c6c5f6261742e6a706567),
(5, 'Volleyball', 5, 'Brand E', 12, 'Description for Volleyball', '2023-10-30 12:00:00', 'Fair', 5, 0x2f5349412f696d616765732f766f6c6c657962616c6c2e6a706567),
(127, 'sad', 5, 'Adidas', 60, 'vgjm', '1970-01-01 00:00:00', '0', 2, 0x696d616765732f7370616c64696e672e6a706567),
(116, 'ring', 2, 'Rawlings', 12, 'bilog', '2023-11-20 15:20:00', '0', 3, 0x696d616765732f72696e672e6a7067);

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `equipmentremovalrequests`
--

INSERT INTO `equipmentremovalrequests` (`requestId`, `equipmentId`, `requestDate`, `removalReason`, `quantityToRemove`) VALUES
(9, 127, '2023-11-20 23:18:00', 'Good', 5);

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
) ENGINE=MyISAM AUTO_INCREMENT=419 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `login_logout_log`
--

INSERT INTO `login_logout_log` (`id`, `username`, `userRole`, `event_type`, `timestamp`) VALUES
(418, 'admin', 'admin', 'login', '2023-11-21 16:03:35'),
(417, 'adder', 'equipment adder', 'logout', '2023-11-21 16:03:27'),
(416, 'adder', 'equipment adder', 'login', '2023-11-21 16:02:34'),
(415, 'admin', 'admin', 'logout', '2023-11-21 16:02:28'),
(414, 'admin', 'admin', 'login', '2023-11-20 23:10:33'),
(413, 'adder', 'equipment adder', 'logout', '2023-11-20 23:10:29'),
(412, 'adder', 'equipment adder', 'login', '2023-11-20 23:09:47'),
(411, 'remover', 'equipment remover', 'logout', '2023-11-20 23:09:38'),
(410, 'remover', 'equipment remover', 'login', '2023-11-20 20:48:40'),
(409, 'admin', 'admin', 'logout', '2023-11-20 20:48:34'),
(408, 'admin', 'admin', 'login', '2023-11-20 20:47:41'),
(407, 'adder', 'equipment adder', 'logout', '2023-11-20 20:47:36'),
(406, 'adder', 'equipment adder', 'login', '2023-11-20 19:30:15'),
(405, 'admin', 'admin', 'logout', '2023-11-20 19:30:09'),
(403, 'adder', 'equipment adder', 'logout', '2023-11-20 19:29:29'),
(404, 'admin', 'admin', 'login', '2023-11-20 19:29:34'),
(402, 'adder', 'equipment adder', 'login', '2023-11-20 19:20:55'),
(401, 'admin', 'admin', 'logout', '2023-11-20 19:20:51'),
(400, 'admin', 'admin', 'login', '2023-11-20 19:20:06'),
(399, 'adder', 'equipment adder', 'logout', '2023-11-20 19:20:00'),
(398, 'adder', 'equipment adder', 'login', '2023-11-20 19:18:56'),
(397, 'admin', 'admin', 'logout', '2023-11-20 19:18:52'),
(396, 'admin', 'admin', 'login', '2023-11-20 19:15:44'),
(395, 'adder', 'equipment adder', 'logout', '2023-11-20 19:15:36'),
(394, 'adder', 'equipment adder', 'login', '2023-11-20 15:38:44'),
(393, 'remover', 'equipment remover', 'logout', '2023-11-20 15:38:39'),
(392, 'remover', 'equipment remover', 'login', '2023-11-20 15:30:28'),
(391, 'adder', 'equipment adder', 'logout', '2023-11-20 15:30:23'),
(390, 'adder', 'equipment adder', 'login', '2023-11-20 15:29:31'),
(389, 'admin', 'admin', 'logout', '2023-11-20 15:21:24'),
(388, 'admin', 'admin', 'login', '2023-11-20 15:20:06'),
(387, 'adder', 'equipment adder', 'logout', '2023-11-20 15:20:02'),
(386, 'adder', 'equipment adder', 'login', '2023-11-20 14:57:43'),
(385, 'admin', 'admin', 'logout', '2023-11-20 14:57:39'),
(384, 'admin', 'admin', 'login', '2023-11-20 14:53:44'),
(383, 'adder', 'equipment adder', 'logout', '2023-11-20 14:53:36'),
(382, 'adder', 'equipment adder', 'login', '2023-11-20 11:49:32'),
(381, 'admin', 'admin', 'logout', '2023-11-20 11:49:27'),
(380, 'admin', 'admin', 'login', '2023-11-20 11:48:37'),
(379, 'adder', 'equipment adder', 'logout', '2023-11-20 11:48:33'),
(378, 'adder', 'equipment adder', 'login', '2023-11-20 11:17:43'),
(377, 'admin', 'admin', 'logout', '2023-11-20 11:17:37');

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
(2, 'Doe', 'John', 'HR'),
(3, 'Smith', 'Alice', 'IT'),
(4, 'Johnson', 'Bob', 'Finance'),
(5, 'Williams', 'Emily', 'Marketing');

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
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userRole`, `passwordHash`, `firstName`, `lastName`, `userImage`, `empid`) VALUES
(23, 'remover', 'equipment remover', '$2y$10$9nm/c/UWrWGX6DwtOimiH.GpZgPihFFKNQtTpoax2EdYeOZT0Q6.u', 'Edbert', 'Plopenio', 'user_images/ed_img (1).png', NULL),
(22, 'adder', 'equipment adder', '$2y$10$3Pw3UFlhHGSXECAt5/xsJecZJngwDXKsQa3LRPw9FvWt9M0jtX72K', 'Andrea', 'Bernardo', 'user_images/13.webp', NULL),
(21, 'admin', 'admin', '$2y$10$YsmBAIuqRtkrh9d5UN3/feONys9EF00Of8M8nlORvYYRLtc8cLDOK', 'Kath', 'Brillantes', 'user_images/9.webp', NULL),
(24, 'user1', 'admin', 'hash1', 'John', 'Doe', 'image1.jpg', 2),
(25, 'user2', 'equipment adder', 'hash2', 'Alice', 'Smith', 'image2.jpg', 3),
(26, 'user3', 'equipment remover', 'hash3', 'Bob', 'Johnson', 'image3.jpg', 4);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
