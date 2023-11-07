-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2023 at 01:41 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28
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
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bookID` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `ISBN` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`title`, `author`, `genre`, `ISBN`, `description`, `quantity`) VALUES
('Book 1', 'Author 1', 'Genre 1', 'ISBN123456', 'Description of Book 1', 10),
('Book 2', 'Author 2', 'Genre 2', 'ISBN234567', 'Description of Book 2', 15),
('Book 3', 'Author 3', 'Genre 3', 'ISBN345678', 'Description of Book 3', 8),
('Book 4', 'Author 4', 'Genre 4', 'ISBN456789', 'Description of Book 4', 20),
('Book 5', 'Author 5', 'Genre 5', 'ISBN101112', 'Description of Book 5', 20);

-- --------------------------------------------------------

--
-- Table structure for table `book_transactions`
--

CREATE TABLE `book_transactions` (
  `transactionID` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `userID` int(11) NOT NULL,
  `bookID` int(11) NOT NULL,
  `inQuantity` int(11) NOT NULL,
  `outQuantity` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_transactions`
--

INSERT INTO `book_transactions` (`transactionID`, `userID`, `bookID`, `inQuantity`, `outQuantity`, `date`) VALUES
(23, 3, 1, 2, 0, '2023-10-22 09:20:17'),
(24, 3, 2, 0, 1, '2023-10-22 09:20:23'),
(25, 3, 3, 1, 0, '2023-10-22 09:20:29'),
(26, 3, 4, 0, 3, '2023-10-23 04:20:00'),
(27, 2, 5, 2, 0, '2023-10-23 06:05:00'),
(28, 3, 1, 4, 0, '2023-10-23 03:14:51'),
(29, 2, 1, 0, 5, '2023-10-23 03:20:58'),
(30, 3, 2, 0, 5, '2023-10-23 04:53:56'),
(31, 3, 1, 1, 0, '2023-10-23 05:08:34'),
(32, 3, 1, 0, 1, '2023-10-23 05:08:45'),
(33, 3, 1, 1, 0, '2023-10-23 05:10:03'),
(34, 3, 1, 0, 1, '2023-10-23 05:12:50'),
(35, 3, 1, 1, 0, '2023-10-23 05:18:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('Admin','Client','Librarian') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`fullname`, `email`, `password`, `role`) VALUES
('Admin User', 'admin@g', '$2y$10$7WBXttrmFnqyZgP/w3hQCuj1UFGktv.zrkE7vVALTOhiOQa.LSSFq', 'Admin'),
('Client User', 'client@g', '$2y$10$7WBXttrmFnqyZgP/w3hQCuj1UFGktv.zrkE7vVALTOhiOQa.LSSFq', 'Client'),
('Librarian User', 'librarian@g', '$2y$10$7WBXttrmFnqyZgP/w3hQCuj1UFGktv.zrkE7vVALTOhiOQa.LSSFq', 'Librarian');
