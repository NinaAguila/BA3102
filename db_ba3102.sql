-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 20, 2023 at 07:07 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

CREATE DATABASE IF NOT EXISTS db_ba3102;
USE db_ba3102;

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
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `bookID` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `genre` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `ISBN` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `quantity` int NOT NULL,
  `publication_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`bookID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`title`, `author`, `genre`, `ISBN`, `description`, `quantity`, `publication_date`) VALUES
('Book 1', 'Author 1', 'Genre 1', 'ISBN10101', 'Description of Book 1', 10, '2023-01-15'),
('Book 2', 'Author 2', 'Genre 2', 'ISBN99999', 'Description of Book 2', 15, '2023-02-20'),
('Book 3', 'Author 3', 'Genre 3', 'ISBN88888', 'Description of Book 3', 8, '2023-03-25'),
('Book 4', 'Author 1', 'Genre 4', 'ISBN77777', 'Description of Book 4', 20, '2023-04-10'),
('Book 5', 'Author 1', 'Genre 1', 'ISBN66666', 'Description of Book 5', 0, '2023-05-05'),
('Book 6', 'Author 1', 'Genre 1', 'ISBN55555', 'Description of Book 6', 15, '2023-06-15'),
('Book 7', 'Author 2', 'Genre 2', 'ISBN44444', 'Description of Book 7', 12, '2023-07-20'),
('Book 8', 'Author 2', 'Genre 2', 'ISBN33333', 'Description of Book 8', 18, '2023-08-25'),
('Book 9', 'Author 2', 'Genre 2', 'ISBN022222', 'Description of Book 9', 25, '2023-09-10'),
('Book 10', 'Author 3', 'Genre 3', 'ISBN11111', 'Description of Book 10', 0, '2022-10-05'),
('Book 11', 'Author 3', 'Genre 4', 'ISBN12345', 'Description of Book 11', 8, '2023-11-15'),
('Book 12', 'Author 4', 'Genre 5', 'ISBN67890', 'Description of Book 12', 15, '2023-12-20'),
('Book 13', 'Author 4', 'Genre 5', 'ISBN13579', 'Description of Book 13', 20, '2023-01-25'),
('Book 14', 'Author 5', 'Genre 6', 'ISBN24680', 'Description of Book 14', 10, '2023-02-10'),
('Book 15', 'Author 6', 'Genre 7', 'ISBN98765', 'Description of Book 15', 0, '2023-03-05'),
('Book 16', 'Author 6', 'Genre 7', 'ISBN11223', 'Description of Book 16', 18, '2023-04-15'),
('Book 17', 'Author 7', 'Genre 8', 'ISBN44556', 'Description of Book 17', 12, '2023-05-20'),
('Book 18', 'Author 7', 'Genre 8', 'ISBN77889', 'Description of Book 18', 22, '2023-06-25'),
('Book 19', 'Author 8', 'Genre 9', 'ISBN99000', 'Description of Book 19', 0, '2023-07-10'),
('Book 20', 'Author 8', 'Genre 9', 'ISBN11222', 'Description of Book 20', 30, '2023-08-05');

-- --------------------------------------------------------

--
-- Table structure for table `book_transactions`
--

DROP TABLE IF EXISTS `book_transactions`;
CREATE TABLE IF NOT EXISTS `book_transactions` (
  `transactionID` int NOT NULL AUTO_INCREMENT,
  `userID` int NOT NULL,
  `bookID` int NOT NULL,
  `inQuantity` int NOT NULL,
  `outQuantity` int NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`transactionID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_transactions`
--

INSERT INTO `book_transactions` (`userID`, `bookID`, `inQuantity`, `outQuantity`, `date`) VALUES
(2, 6, 2, 0, '2023-11-19 09:20:17'),
(2, 7, 0, 1, '2023-11-19 09:20:23'),
(2, 8, 1, 0, '2023-11-20 09:20:29'),
(2, 9, 0, 3, '2023-11-20 04:20:00'),
(2, 10, 2, 0, '2023-11-21 06:05:00'),
(3, 11, 4, 0, '2023-11-21 03:14:51'),
(3, 12, 0, 5, '2023-11-23 03:20:58'),
(3, 13, 0, 5, '2023-11-23 04:53:56'),
(3, 14, 1, 0, '2023-11-24 05:08:34'),
(3, 15, 0, 1, '2023-11-25 05:08:45');


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userID` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('Admin','Client','Librarian') COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `fullname`, `email`, `password`, `role`) VALUES
(1, 'Admin Name', 'admin@g', '$2y$10$7WBXttrmFnqyZgP/w3hQCuj1UFGktv.zrkE7vVALTOhiOQa.LSSFq', 'Admin'),
(2, 'Ivan D. Librarian', 'librarian@g', '$2y$10$7WBXttrmFnqyZgP/w3hQCuj1UFGktv.zrkE7vVALTOhiOQa.LSSFq', 'Librarian'),
(3, 'Librarian Name', 'librarian2@g', '$2y$10$7WBXttrmFnqyZgP/w3hQCuj1UFGktv.zrkE7vVALTOhiOQa.LSSFq', 'Librarian'),
(4, 'Medrano, Ivan D.', 'medrano@g', '$2y$10$7WBXttrmFnqyZgP/w3hQCuj1UFGktv.zrkE7vVALTOhiOQa.LSSFq', 'Client'),
(5, 'Bautista, Chris John L.', 'bautista@g', '$2y$10$7WBXttrmFnqyZgP/w3hQCuj1UFGktv.zrkE7vVALTOhiOQa.LSSFq', 'Client'),
(6, 'Panaligan, Jomari M.', 'panaligan@g', '$2y$10$7WBXttrmFnqyZgP/w3hQCuj1UFGktv.zrkE7vVALTOhiOQa.LSSFq', 'Client'),
(7, 'Hernandez, Marc Andrei L.', 'hernandez@g', '$2y$10$7WBXttrmFnqyZgP/w3hQCuj1UFGktv.zrkE7vVALTOhiOQa.LSSFq', 'Client'),
(8, 'Mendoza, Harvey L.', 'mendoza@g', '$2y$10$7WBXttrmFnqyZgP/w3hQCuj1UFGktv.zrkE7vVALTOhiOQa.LSSFq', 'Client');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
