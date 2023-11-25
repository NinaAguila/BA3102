-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 25, 2023 at 05:25 AM
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
  PRIMARY KEY (`equipmentId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `addquantity`
--

INSERT INTO `addquantity` (`equipmentId`, `quantity`, `purchaseDate`, `equipmentCondition`) VALUES
(1, 2, '2023-11-23 17:47:00', 'Like New');

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
  PRIMARY KEY (`archivedId`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  PRIMARY KEY (`equipmentId`),
  KEY `equipmentCategoryId` (`equipmentCategoryId`),
  KEY `locationId` (`locationId`)
) ENGINE=MyISAM AUTO_INCREMENT=137 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`equipmentId`, `equipmentName`, `equipmentCategoryId`, `brand`, `description`, `locationId`, `equipmentImage`) VALUES
(1, 'Soccer Ball', 1, 'Brand A', 'Description for Soccer Ball', 1, 0x2f5349412f696d616765732f736f636365725f62616c6c2e6a7067),
(2, 'Basketball', 2, 'Brand B', 'Description for Basketball', 2, 0x2f5349412f696d616765732f6261736b657462616c6c2e6a7067),
(3, 'Tennis Racket', 3, 'Brand C', 'Description for Tennis Racket', 3, 0x2f5349412f696d616765732f74656e6e69735f7261636b65742e6a7067),
(4, 'Baseball Bat', 4, 'Brand D', 'Description for Baseball Bat', 4, 0x2f5349412f696d616765732f6261736562616c6c5f6261742e6a706567),
(5, 'Volleyball', 5, 'Brand E', 'Description for Volleyball', 5, 0x2f5349412f696d616765732f766f6c6c657962616c6c2e6a706567);

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
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `equipmentupdates`
--

INSERT INTO `equipmentupdates` (`updateId`, `equipmentId`, `updateDate`, `originalValue`, `valueToAdd`) VALUES
(1, 132, '2023-11-21 21:47:00', '13', '1'),
(2, 132, '2023-11-21 21:48:00', '14', '1'),
(3, 132, '2023-11-21 22:05:00', '15', '1'),
(4, 134, '2023-11-23 09:19:00', '2', '3');

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
) ENGINE=MyISAM AUTO_INCREMENT=541 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `login_logout_log`
--

INSERT INTO `login_logout_log` (`id`, `username`, `userRole`, `event_type`, `timestamp`) VALUES
(540, 'remover', 'equipment remover', 'logout', '2023-11-25 13:21:26'),
(539, 'remover', 'equipment remover', 'login', '2023-11-25 13:15:03'),
(538, 'adder', 'equipment adder', 'logout', '2023-11-25 13:14:47'),
(537, 'adder', 'equipment adder', 'login', '2023-11-25 13:13:53'),
(536, 'admin', 'admin', 'logout', '2023-11-25 13:13:45'),
(535, 'admin', 'admin', 'login', '2023-11-25 13:09:20'),
(534, 'admin', 'admin', 'login', '2023-11-23 18:07:45'),
(533, 'admin', 'Admin', 'logout', '2023-11-23 18:07:40'),
(532, 'admin', 'Admin', 'login', '2023-11-23 18:06:35'),
(531, 'adder', 'equipment adder', 'logout', '2023-11-23 18:06:31'),
(530, 'adder', 'equipment adder', 'login', '2023-11-23 18:06:27'),
(529, 'remover', 'equipment remover', 'logout', '2023-11-23 18:06:22'),
(528, 'remover', 'equipment remover', 'login', '2023-11-23 18:06:17'),
(527, 'admin', 'Admin', 'logout', '2023-11-23 18:06:09'),
(526, 'admin', 'Admin', 'login', '2023-11-23 18:05:58'),
(525, 'admin', 'admin', 'logout', '2023-11-23 18:05:52'),
(524, 'admin', 'admin', 'login', '2023-11-23 17:46:47'),
(523, 'remover', 'equipment remover', 'logout', '2023-11-23 17:46:40'),
(522, 'remover', 'equipment remover', 'login', '2023-11-23 17:46:31'),
(521, 'remover', 'equipment remover', 'logout', '2023-11-23 17:45:45'),
(520, 'remover', 'equipment remover', 'login', '2023-11-23 17:39:51'),
(518, 'admin', 'admin', 'login', '2023-11-23 17:35:58'),
(519, 'admin', 'admin', 'logout', '2023-11-23 17:39:45');

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
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userRole`, `passwordHash`, `firstName`, `lastName`, `userImage`, `empid`) VALUES
(34, 'remover', 'equipment remover', '$2y$10$I5CyGkUXdvjpGWk/MAeODeVxMtSMwOQ5bWqWDEkP5JFRtfzFXgWba', 'John', 'Doe', 'user_images/655f239e71b87_mig_img.png', 2),
(35, 'admin', 'admin', '$2y$10$43cS8hPoNaep2SMy0XC8I.19LXlnowvFU1GktEtuKDajsSICZAp8q', 'Alice', 'Smith', 'user_images/655f23d653aa7_ed_img (1).png', 3),
(36, 'adder', 'equipment adder', '$2y$10$DyN5bQ9H7mhx1zR/eqjvmuw7VSo/tn5Sq/MSkQEdghZ202jBSSCu.', 'nina', 'aguila', 'user_images/655f23f7e8550_tiffa_img.png', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
