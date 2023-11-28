-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 28, 2023 at 07:40 AM
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
-- Database: `aa`
--

-- --------------------------------------------------------

--
-- Table structure for table `instocks_details`
--

DROP TABLE IF EXISTS `instocks_details`;
CREATE TABLE IF NOT EXISTS `instocks_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `empid` int NOT NULL,
  `product_id` int NOT NULL,
  `added_qnt` int DEFAULT NULL,
  `received_date` date DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instocks_details`
--

INSERT INTO `instocks_details` (`id`, `empid`, `product_id`, `added_qnt`, `received_date`) VALUES
(1, 0, 3, 2, '2023-11-28'),
(2, 0, 4, 5, '2023-11-28'),
(3, 0, 5, 10, '2023-11-28');

-- --------------------------------------------------------

--
-- Table structure for table `in_stocks`
--

DROP TABLE IF EXISTS `in_stocks`;
CREATE TABLE IF NOT EXISTS `in_stocks` (
  `product_id` int NOT NULL,
  `stocks_qnt` int NOT NULL DEFAULT '0',
  KEY `FK_Products_Stocks` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `in_stocks`
--

INSERT INTO `in_stocks` (`product_id`, `stocks_qnt`) VALUES
(3, 750),
(4, 182),
(5, 10),
(6, 25),
(7, 90),
(8, 100),
(9, 40),
(10, 55),
(11, 75),
(12, 25),
(13, 60),
(14, 85),
(15, 95),
(16, 105),
(17, 45),
(18, 60),
(19, 0),
(20, 0),
(21, 0);

-- --------------------------------------------------------

--
-- Table structure for table `outstocks_details`
--

DROP TABLE IF EXISTS `outstocks_details`;
CREATE TABLE IF NOT EXISTS `outstocks_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `empid` int NOT NULL,
  `product_id` int NOT NULL,
  `out_qnt` int DEFAULT NULL,
  `received_date` date DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `outstocks_details`
--

INSERT INTO `outstocks_details` (`id`, `empid`, `product_id`, `out_qnt`, `received_date`) VALUES
(4, 0, 3, 30, '2023-11-28'),
(1, 0, 6, 5, '2023-11-28'),
(2, 0, 8, 10, '2023-11-28'),
(3, 0, 13, 5, '2023-11-28');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int NOT NULL,
  `product_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `price` decimal(10,2) NOT NULL,
  `image` mediumblob,
  KEY `idx_product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `description`, `price`, `image`) VALUES
(3, 'Product C', 'Description for Product Caaaaaaaaaaaaaaaat', '30.00', NULL),
(4, 'Product D', 'Description for Product D', '35.00', NULL),
(5, 'Product E', 'Description for Product E', '40.00', NULL),
(6, 'Product F', 'Description for Product F', '45.00', NULL),
(7, 'Product G', 'Description for Product G', '50.00', NULL),
(8, 'Product H', 'Description for Product H', '55.00', NULL),
(9, 'Product I', 'Description for Product I', '60.00', NULL),
(10, 'Product J', 'Description for Product J', '65.00', NULL),
(11, 'Product K', 'Description for Product K', '70.00', NULL),
(12, 'Product L', 'Description for Product L', '75.00', NULL),
(13, 'Product M', 'Description for Product M', '80.00', NULL),
(14, 'Product N', 'Description for Product N', '85.00', NULL),
(15, 'Product O', 'Description for Product O', '90.00', NULL),
(16, 'Product P', 'Description for Product P', '95.00', NULL),
(17, 'Product Q', 'Description for Product Q', '100.00', NULL),
(18, 'Product R', 'Description for Product R', '105.00', NULL),
(19, 'GGs', 'GGs', '123.00', NULL),
(20, 'GGG', 'GGG', '123.00', NULL),
(21, 'GGG', 'GG', '3.00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rgouser`
--

DROP TABLE IF EXISTS `rgouser`;
CREATE TABLE IF NOT EXISTS `rgouser` (
  `id` int NOT NULL,
  `empid` int NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','employee','client','') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rgouser`
--

INSERT INTO `rgouser` (`id`, `empid`, `username`, `password`, `role`) VALUES
(1, 1, 'admin', 'admRGO', 'admin'),
(2, 2, 'employee', 'empRGO', 'employee'),
(3, 0, 'client', 'RGO', 'client');

-- --------------------------------------------------------

--
-- Table structure for table `tbempinfo`
--

DROP TABLE IF EXISTS `tbempinfo`;
CREATE TABLE IF NOT EXISTS `tbempinfo` (
  `empid` int NOT NULL,
  `lastname` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `firstname` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `department` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbempinfo`
--

INSERT INTO `tbempinfo` (`empid`, `lastname`, `firstname`, `department`) VALUES
(1, 'aguila', 'nina', 'cics'),
(2, 'mayo', 'john', 'cics');

-- --------------------------------------------------------

--
-- Table structure for table `tb_studinfo`
--

DROP TABLE IF EXISTS `tb_studinfo`;
CREATE TABLE IF NOT EXISTS `tb_studinfo` (
  `studid` int NOT NULL,
  `lastname` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `firstname` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `course` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_studinfo`
--

INSERT INTO `tb_studinfo` (`studid`, `lastname`, `firstname`, `course`) VALUES
(1, 'parker', 'peter', 'bsit'),
(2, 'kent', 'clark', 'bscs');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `instocks_details`
--
ALTER TABLE `instocks_details`
  ADD CONSTRAINT `instocks_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `in_stocks`
--
ALTER TABLE `in_stocks`
  ADD CONSTRAINT `in_stocks_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `outstocks_details`
--
ALTER TABLE `outstocks_details`
  ADD CONSTRAINT `outstocks_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
