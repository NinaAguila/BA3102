-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 28, 2023 at 07:28 AM
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
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `bookID` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `author` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `genre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ISBN` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `quantity` int NOT NULL,
  `publication_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`bookID`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookID`, `title`, `author`, `genre`, `ISBN`, `description`, `quantity`, `publication_date`) VALUES
(4, 'Book 1', 'Author 1', 'Genre 1', 'ISBN10101', 'Description of Book 1', 10, '2023-01-15 00:00:00'),
(5, 'Book 2', 'Author 2', 'Genre 2', 'ISBN99999', 'Description of Book 2', 15, '2023-02-20 00:00:00'),
(6, 'Book 3', 'Author 3', 'Genre 3', 'ISBN88888', 'Description of Book 3', 8, '2023-03-25 00:00:00'),
(7, 'Book 4', 'Author 1', 'Genre 4', 'ISBN77777', 'Description of Book 4', 20, '2023-04-10 00:00:00'),
(8, 'Book 5', 'Author 1', 'Genre 1', 'ISBN66666', 'Description of Book 5', 0, '2023-05-05 00:00:00'),
(9, 'Book 6', 'Author 1', 'Genre 1', 'ISBN55555', 'Description of Book 6', 15, '2023-06-15 00:00:00'),
(10, 'Book 7', 'Author 2', 'Genre 2', 'ISBN44444', 'Description of Book 7', 12, '2023-07-20 00:00:00'),
(11, 'Book 8', 'Author 2', 'Genre 2', 'ISBN33333', 'Description of Book 8', 18, '2023-08-25 00:00:00'),
(12, 'Book 9', 'Author 2', 'Genre 2', 'ISBN022222', 'Description of Book 9', 25, '2023-09-10 00:00:00'),
(13, 'Book 10', 'Author 3', 'Genre 3', 'ISBN11111', 'Description of Book 10', 0, '2022-10-05 00:00:00'),
(14, 'Book 11', 'Author 3', 'Genre 4', 'ISBN12345', 'Description of Book 11', 8, '2023-11-15 00:00:00'),
(15, 'Book 12', 'Author 4', 'Genre 5', 'ISBN67890', 'Description of Book 12', 15, '2023-12-20 00:00:00'),
(16, 'Book 13', 'Author 4', 'Genre 5', 'ISBN13579', 'Description of Book 13', 20, '2023-01-25 00:00:00'),
(17, 'Book 14', 'Author 5', 'Genre 6', 'ISBN24680', 'Description of Book 14', 10, '2023-02-10 00:00:00'),
(18, 'Book 15', 'Author 6', 'Genre 7', 'ISBN98765', 'Description of Book 15', 0, '2023-03-05 00:00:00'),
(19, 'Book 16', 'Author 6', 'Genre 7', 'ISBN11223', 'Description of Book 16', 18, '2023-04-15 00:00:00'),
(20, 'Book 17', 'Author 7', 'Genre 8', 'ISBN44556', 'Description of Book 17', 12, '2023-05-20 00:00:00'),
(21, 'Book 18', 'Author 7', 'Genre 8', 'ISBN77889', 'Description of Book 18', 22, '2023-06-25 00:00:00'),
(22, 'Book 19', 'Author 8', 'Genre 9', 'ISBN99000', 'Description of Book 19', 0, '2023-07-10 00:00:00'),
(23, 'Book 20', 'Author 8', 'Genre 9', 'ISBN11222', 'Description of Book 20', 30, '2023-08-05 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_transactions`
--

INSERT INTO `book_transactions` (`transactionID`, `userID`, `bookID`, `inQuantity`, `outQuantity`, `date`) VALUES
(3, 2, 6, 2, 0, '2023-11-19 09:20:17'),
(4, 2, 7, 0, 1, '2023-11-19 09:20:23'),
(5, 2, 8, 1, 0, '2023-11-20 09:20:29'),
(6, 2, 9, 0, 3, '2023-11-20 04:20:00'),
(7, 2, 10, 2, 0, '2023-11-21 06:05:00'),
(8, 1, 11, 4, 0, '2023-11-21 03:14:51'),
(9, 1, 12, 0, 5, '2023-11-23 03:20:58'),
(10, 1, 13, 0, 5, '2023-11-23 04:53:56'),
(11, 1, 14, 1, 0, '2023-11-24 05:08:34'),
(12, 1, 15, 0, 1, '2023-11-25 05:08:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbaccount`
--

DROP TABLE IF EXISTS `tbaccount`;
CREATE TABLE IF NOT EXISTS `tbaccount` (
  `accid` int NOT NULL AUTO_INCREMENT,
  `empid` int DEFAULT NULL,
  `passwordencrypted` varchar(255) NOT NULL,
  PRIMARY KEY (`accid`),
  KEY `empid` (`empid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbaccount`
--

INSERT INTO `tbaccount` (`accid`, `empid`, `passwordencrypted`) VALUES
(1, NULL, 'hashed_password1'),
(2, NULL, 'hashed_password2');

-- --------------------------------------------------------

--
-- Table structure for table `tbadminfo`
--

DROP TABLE IF EXISTS `tbadminfo`;
CREATE TABLE IF NOT EXISTS `tbadminfo` (
  `admid` int NOT NULL AUTO_INCREMENT,
  `firstname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lastname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`admid`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbadminfo`
--

INSERT INTO `tbadminfo` (`admid`, `firstname`, `lastname`, `password`) VALUES
(11, 'Queenie', 'Manigbas', 'mina97'),
(12, 'Maria', 'De Leon', 'ganda34');

-- --------------------------------------------------------

--
-- Table structure for table `tbattendance`
--

DROP TABLE IF EXISTS `tbattendance`;
CREATE TABLE IF NOT EXISTS `tbattendance` (
  `attendanceid` int NOT NULL,
  `studid` varchar(10) DEFAULT NULL,
  `empid` int DEFAULT NULL,
  `subjectid` int DEFAULT NULL,
  `facilityid` varchar(10) DEFAULT NULL,
  `timein` datetime DEFAULT NULL,
  `timeout` datetime DEFAULT NULL,
  PRIMARY KEY (`attendanceid`),
  KEY `studid` (`studid`),
  KEY `empid` (`empid`),
  KEY `subjectid` (`subjectid`),
  KEY `facilityid` (`facilityid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbattendance`
--

INSERT INTO `tbattendance` (`attendanceid`, `studid`, `empid`, `subjectid`, `facilityid`, `timein`, `timeout`) VALUES
(0, NULL, NULL, NULL, NULL, '2023-11-28 14:08:18', '2023-11-28 14:08:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbempinfo`
--

DROP TABLE IF EXISTS `tbempinfo`;
CREATE TABLE IF NOT EXISTS `tbempinfo` (
  `empid` int NOT NULL AUTO_INCREMENT,
  `firstname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lastname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `department` text NOT NULL,
  PRIMARY KEY (`empid`)
) ENGINE=MyISAM AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbempinfo`
--

INSERT INTO `tbempinfo` (`empid`, `firstname`, `lastname`, `department`) VALUES
(1, 'Elenor', 'Labiaga', 'CICS'),
(2, 'Daryl', 'Tiquio', 'CICS'),
(3, 'Dioneces', 'Alimoren', 'CICS'),
(4, 'Christopher', 'Reyes', 'CICS'),
(5, 'Arvin', 'Almario', 'CICS'),
(6, 'Nina', 'Aguila', 'CICS'),
(7, 'Zymon', 'Maquinto', 'CICS'),
(67, 'nina', 'aguila', 'cics'),
(68, 'CHRISTOPHER', 'REYES', 'cics'),
(69, 'JONNAH ', 'RAYOS', 'cics'),
(70, 'CARL ', 'AUSTRIA', 'cics'),
(71, 'TRISTAN ', 'LEYRIT', 'cics'),
(72, 'JOSEPH', 'PABLO', 'cabe'),
(73, 'ANGELENE ', 'LIBUNAO', 'cabe'),
(74, 'KRYSTEL ', 'SAMBITAN', 'cabe'),
(75, 'ANGELICA ', 'MACALINGA', 'cabe'),
(76, 'FRANCIS ', 'BALAZON', 'cabe'),
(77, 'nina', 'aguila', 'cics'),
(78, 'CHRISTOPHER', 'REYES', 'cics'),
(79, 'JONNAH ', 'RAYOS', 'cics'),
(80, 'CARL ', 'AUSTRIA', 'cics'),
(81, 'TRISTAN ', 'LEYRIT', 'cics'),
(82, 'JOSEPH', 'PABLO', 'cabe'),
(83, 'ANGELENE ', 'LIBUNAO', 'cabe'),
(84, 'KRYSTEL ', 'SAMBITAN', 'cabe'),
(85, 'ANGELICA ', 'MACALINGA', 'cabe'),
(86, 'FRANCIS ', 'BALAZON', 'cabe');

-- --------------------------------------------------------

--
-- Table structure for table `tbfacility`
--

DROP TABLE IF EXISTS `tbfacility`;
CREATE TABLE IF NOT EXISTS `tbfacility` (
  `facilityid` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `buildingname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `roomnumber` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `seatnumber` int NOT NULL,
  PRIMARY KEY (`facilityid`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbfacility`
--

INSERT INTO `tbfacility` (`facilityid`, `buildingname`, `roomnumber`, `seatnumber`) VALUES
('HC2003', 'HEB', 'Comlab 2', 3),
('CC1008', 'CECS', 'Comlab 1', 8),
('CC1007', 'CECS', 'Comlab 1', 7),
('CC1006', 'CECS', 'Comlab 1', 6),
('CC1005', 'CECS', 'Comlab 1', 5),
('CC1004', 'CECS', 'Comlab 1', 4),
('CC1003', 'CECS', 'Comlab 1', 3),
('CC1002', 'CECS', 'Comlab 1', 2),
('CC1001', 'CECS', 'Comlab 1', 1),
('HC2002', 'HEB', 'Comlab 2', 2),
('HC2001', 'HEB', 'Comlab 2', 1),
('HC1010', 'HEB', 'Comlab 1', 10),
('HC1009', 'HEB', 'Comlab 1', 9),
('HC1008', 'HEB', 'Comlab 1', 8),
('HC1007', 'HEB', 'Comlab 1', 7),
('HC1006', 'HEB', 'Comlab 1', 6),
('HC1005', 'HEB', 'Comlab 1', 5),
('HC1004', 'HEB', 'Comlab 1', 4),
('HC1003', 'HEB', 'Comlab 1', 3),
('HC1002', 'HEB', 'Comlab 1', 2),
('HC1001', 'HEB', 'Comlab 1', 1),
('CC2010', 'CECS', 'Comlab 2', 10),
('CC2009', 'CECS', 'Comlab 2', 9),
('CC2008', 'CECS', 'Comlab 2', 8),
('CC2007', 'CECS', 'Comlab 2', 7),
('CC2006', 'CECS', 'Comlab 2', 6),
('CC2005', 'CECS', 'Comlab 2', 5),
('CC2004', 'CECS', 'Comlab 2', 4),
('CC2003', 'CECS', 'Comlab 2', 3),
('CC2002', 'CECS', 'Comlab 2', 2),
('CC2001', 'CECS', 'Comlab 2', 1),
('CC1010', 'CECS', 'Comlab 1', 10),
('CC1009', 'CECS', 'Comlab 1', 9),
('HC2004', 'HEB', 'Comlab 2', 4),
('HC2005', 'HEB', 'Comlab 2', 5),
('HC2006', 'HEB', 'Comlab 2', 6),
('HC2007', 'HEB', 'Comlab 2', 7),
('HC2008', 'HEB', 'Comlab 2', 8),
('HC2009', 'HEB', 'Comlab 2', 9),
('HC2010', 'HEB', 'Comlab 2', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tblempsubject`
--

DROP TABLE IF EXISTS `tblempsubject`;
CREATE TABLE IF NOT EXISTS `tblempsubject` (
  `empid` int NOT NULL,
  `subjectid` int NOT NULL,
  PRIMARY KEY (`empid`,`subjectid`),
  KEY `subjectid` (`subjectid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblempsubject`
--

INSERT INTO `tblempsubject` (`empid`, `subjectid`) VALUES
(1, 1),
(1, 3),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudentqrcode`
--

DROP TABLE IF EXISTS `tblstudentqrcode`;
CREATE TABLE IF NOT EXISTS `tblstudentqrcode` (
  `studid` varchar(10) NOT NULL,
  `qrcode_img` blob,
  PRIMARY KEY (`studid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblstudentqrcode`
--

INSERT INTO `tblstudentqrcode` (`studid`, `qrcode_img`) VALUES
('21-33827', 0x89504e470d0a1a0a0000000d494844520000006f0000006f0103000000d80b0c2300000006504c5445ffffff00000055c2d37e000000097048597300000ec400000ec401952b0e1b0000011e49444154388dd5d431ae84201006e0df50d8c90548b8061d57d20bb87a01bd121dd720e1026b47419c37abfb2c817689cd4722cc8c3302bfb824d19ec2e42251a87280d8937e9bb8a081366e56ef89379bb87b35223672413321b63e4b124f900572be9b89fc3ce917c8ab736146788a59a074b4f49112a6fba822bb0499f2e4684d0df4f1ecf5e1f38b1a4819567189a881b082935d2ca6842a3b9f3b9747d0fabdb7481247c26cf491ea44af66a897cf638f2abba44f0eccc6e35bc912a553a3c9e0a87c9d30745a4d8e4f4003b95bc4ea14ee062852262eb8de89ee77cbbc02cb3061307572c72e96c8c5ad0f557e66c1f2756168e135bfc77f54552ec8134f996923d7c763b4a1ce2baad18af7f5f5cbfcfccd48af9f29aef3f7d61ff04ff7476cd985680000000049454e44ae426082),
('21-38479', 0x89504e470d0a1a0a0000000d494844520000006f0000006f0103000000d80b0c2300000006504c5445ffffff00000055c2d37e000000097048597300000ec400000ec401952b0e1b0000011f49444154388dd5d3b18dc5200c0050471474b00052d670c74ac90249582059898e3590bc40aea340f1917f97fbba2281f62384f40a641b63804f5c9a7995b405628e552a108ba4ddd2020db4e47c1e90b6d4c4c58a2d8966c62e51134b5696ff2579cfb35ea4b2dfe5dff3759d4bacbfc77ca00ee492d1e90af448b079f4719219640391be021d368e1eea9471f6a030ab9f408fd4dc3b16cca6e3161a00de815da813807680097f1bfa4c1de2c8a5ad7942a8b2f3fd61cb2ee162959a417b5ead192434909de703fb2d34b064e5f304c2710b694718998feb333cf0fc57362a1975aaf3cc2a9537a77792f72cb3e0bc5118d5351a4fb4b44ab1db527213b7100729168416ba94672f368e758258d10c584ea8f29cdfd27dcc33d7f979eb1b6bf5f813378728c60000000049454e44ae426082),
('21-35608', 0x89504e470d0a1a0a0000000d494844520000006f0000006f0103000000d80b0c2300000006504c5445ffffff00000055c2d37e000000097048597300000ec400000ec401952b0e1b0000012549444154388dd5d3b1adc3201006e0b328e8600124af41c74af10289bd80bd121d6b20b180dd5120ffefe24479af79401b8490be027177dc117de3d2c02ccb23242036a948cc34ce96cf0ebab4f8482e6db98bab13c8a29736f1435de4a8649cf027c8ffc9f9f25dde9ff42be435f8a8ec6f312bd47e3c829972d4be4db2856c3a6551b287802f1af4086d6a6f14a50534e40e8611101bccf04abf4ab271f2d8e5c8f56c5239ae64bcdba2ae18ebd43e72fcca72abb4496edcad9980fdfad03a7528374abb33247bc8b3204e89e355c92a953337bee8e82e3bc84d45e691f9a7da7cbe05fefaa8aff6ae933b760bdcde3c3ed424cfc2e681fc6eda06797e217687d3c61ecebc651c3cf570414218df51d5496295e20862b56d3ef3cd5cc9a2439bdfb77e0026d3df321252fa430000000049454e44ae426082),
('21-35459', 0x89504e470d0a1a0a0000000d494844520000006f0000006f0103000000d80b0c2300000006504c5445ffffff00000055c2d37e000000097048597300000ec400000ec401952b0e1b0000011249444154388dd5d3b10d84300c0550a314e992059058235d560a0b405800564a97352c65812b539cf09914e89ac3692fa2e015087f3b06f8c76389b6a42228221469401d1987542274d0978d46e3ca51bb78e471f1bd8cae44adba086a77d3cbabbbc80772dedd157eeef80f6ca79cfebb9d3f69a950c5b5bee72c133cccdc76aecaa1486e38652e8c8ef6adc4712608006b17cb96afd42fddc10a6be599aa23a1489ba7b305592b881c0803f0bd1a878c226dbb7e5727934cc349eb14af1975d013655c34bff41082e766b62032d5e9913b4949664b411ba1d132f92bde8295caee65f22e6c9577074d0f791913067f172992a2e619757177c803ba7ff444de5f8dc1bd8d469157de0c8b1b6d0691ff773e4d32de369616de5e0000000049454e44ae426082),
('21-34693', 0x89504e470d0a1a0a0000000d494844520000006f0000006f0103000000d80b0c2300000006504c5445ffffff00000055c2d37e000000097048597300000ec400000ec401952b0e1b0000011b49444154388dd5d3b1adc4200c0660471474648148ac41c74ac902776481b0923bd64062814b97223a3f73772f7acd03b78792e24342f16f1c806f5c23d18a2a684594bb34a062ca03a90002fa12e05cb0c443c4487939a40c0037ad447c5535bbf2b7c8ffc8793757f8b9e237c86b40f5d0f96a66832315c27c3fce2509887003fbd46a7d7fb74db2c1e7d94fe0a1cb01f908c5c36e027273d6da737ae83ec1f17b8e8937739703da9db8aaab512d8e298f486b2a9fbc4d1ab03b8271d30c02baf34e65d3bf13dba1da53a9c7bd84e7705070d33b42879e875005474f015f914fa3b3f17dd689f5aa0ead80f542d16e2e1b2da0e71fa1a620143162be39be2619896b539faada04aedf6e7ae2c85dd6bc307155314197dfb77e00622fcc48e05c6e0f0000000049454e44ae426082);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudentyearsection`
--

DROP TABLE IF EXISTS `tblstudentyearsection`;
CREATE TABLE IF NOT EXISTS `tblstudentyearsection` (
  `studid` varchar(10) NOT NULL,
  `yearid` int DEFAULT NULL,
  `sectionid` int DEFAULT NULL,
  PRIMARY KEY (`studid`),
  KEY `yearid` (`yearid`),
  KEY `sectionid` (`sectionid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblstudentyearsection`
--

INSERT INTO `tblstudentyearsection` (`studid`, `yearid`, `sectionid`) VALUES
('21-35608', 1, 1),
('21-34693', 1, 2),
('21-38479', 1, 3),
('21-35459', 1, 4),
('21-33827', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudsubject`
--

DROP TABLE IF EXISTS `tblstudsubject`;
CREATE TABLE IF NOT EXISTS `tblstudsubject` (
  `studid` int NOT NULL,
  `subjectid` int NOT NULL,
  PRIMARY KEY (`studid`,`subjectid`),
  KEY `subjectid` (`subjectid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblyear`
--

DROP TABLE IF EXISTS `tblyear`;
CREATE TABLE IF NOT EXISTS `tblyear` (
  `yearid` int NOT NULL AUTO_INCREMENT,
  `year` varchar(10) NOT NULL,
  PRIMARY KEY (`yearid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblyear`
--

INSERT INTO `tblyear` (`yearid`, `year`) VALUES
(1, 'Freshman'),
(2, 'Sophomore'),
(3, 'Junior'),
(4, 'Senior');

-- --------------------------------------------------------

--
-- Table structure for table `tbsection`
--

DROP TABLE IF EXISTS `tbsection`;
CREATE TABLE IF NOT EXISTS `tbsection` (
  `sectionid` int NOT NULL AUTO_INCREMENT,
  `section` varchar(20) NOT NULL,
  PRIMARY KEY (`sectionid`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbsection`
--

INSERT INTO `tbsection` (`sectionid`, `section`) VALUES
(1, '1201'),
(2, '1202'),
(3, '1203'),
(4, '1204'),
(5, '1205'),
(6, '2201'),
(7, '2202'),
(8, '2203'),
(9, '2204'),
(10, '2205'),
(11, '3201'),
(12, '3202'),
(13, '3203'),
(14, '3204'),
(15, '3205'),
(16, '4201');

-- --------------------------------------------------------

--
-- Table structure for table `tbstudinfo`
--

DROP TABLE IF EXISTS `tbstudinfo`;
CREATE TABLE IF NOT EXISTS `tbstudinfo` (
  `studid` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `firstname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lastname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `course` text NOT NULL,
  PRIMARY KEY (`studid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbstudinfo`
--

INSERT INTO `tbstudinfo` (`studid`, `firstname`, `lastname`, `course`) VALUES
('21-35608', 'Maria Andrea', 'De Leon', 'BSIT'),
('21-34693', 'Queenie', 'Manigbas', 'BSIT BA'),
('21-38479', 'Simone Louis', 'De Villa', 'BSIT'),
('21-35459', 'Irish', 'Suarez', 'BSIT'),
('21-33827', 'Maureen', 'Lozares', 'BSIT');

-- --------------------------------------------------------

--
-- Table structure for table `tbsubject`
--

DROP TABLE IF EXISTS `tbsubject`;
CREATE TABLE IF NOT EXISTS `tbsubject` (
  `subjectid` int NOT NULL,
  `subjectcode` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `subjectname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`subjectid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbsubject`
--

INSERT INTO `tbsubject` (`subjectid`, `subjectcode`, `subjectname`) VALUES
(1, 'BAT 401', 'Fundamentals of Business Analytics'),
(2, 'BAT 402', 'Fundamentals of Analytics Modeling'),
(3, 'IT 311', 'Administration and Maintenance'),
(4, 'IT 312', 'Systems Integration and Architecture'),
(5, 'IT 313', 'System Analysis and Design'),
(6, 'GED 107', 'Ethics'),
(7, 'IT 314', 'Web Systems and Technologies');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

DROP TABLE IF EXISTS `tb_admin`;
CREATE TABLE IF NOT EXISTS `tb_admin` (
  `adminID` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('Admin') COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`adminID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`adminID`, `fullname`, `email`, `password`, `role`) VALUES
(1, 'Medrano, Ivan D.', 'admin@g', '$2y$10$7WBXttrmFnqyZgP/w3hQCuj1UFGktv.zrkE7vVALTOhiOQa.LSSFq', 'Admin'),
(2, 'Admin name', 'admin2@g', '$2y$10$7WBXttrmFnqyZgP/w3hQCuj1UFGktv.zrkE7vVALTOhiOQa.LSSFq', 'Admin'),
(3, 'Bautista, Chris John L.', 'bautista@g', '$2y$10$7WBXttrmFnqyZgP/w3hQCuj1UFGktv.zrkE7vVALTOhiOQa.LSSFq', 'Admin'),
(4, 'Panaligan, Jomari M.', 'panaligan@g', '$2y$10$7WBXttrmFnqyZgP/w3hQCuj1UFGktv.zrkE7vVALTOhiOQa.LSSFq', 'Admin'),
(5, 'Hernandez, Marc Andrei L.', 'hernandez@g', '$2y$10$7WBXttrmFnqyZgP/w3hQCuj1UFGktv.zrkE7vVALTOhiOQa.LSSFq', 'Admin'),
(6, 'Mendoza, Harvey L.', 'mendoza@g', '$2y$10$7WBXttrmFnqyZgP/w3hQCuj1UFGktv.zrkE7vVALTOhiOQa.LSSFq', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_client`
--

DROP TABLE IF EXISTS `tb_client`;
CREATE TABLE IF NOT EXISTS `tb_client` (
  `clientID` int NOT NULL AUTO_INCREMENT,
  `studid` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('Client') COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`clientID`),
  KEY `studid` (`studid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_client`
--

INSERT INTO `tb_client` (`clientID`, `studid`, `email`, `password`, `role`) VALUES
(1, 1, 'parker@g', '$2y$10$7WBXttrmFnqyZgP/w3hQCuj1UFGktv.zrkE7vVALTOhiOQa.LSSFq', 'Client'),
(2, 2, 'kent@g', '$2y$10$7WBXttrmFnqyZgP/w3hQCuj1UFGktv.zrkE7vVALTOhiOQa.LSSFq', 'Client'),
(3, 3, 'Maur@g', '$2y$10$7WBXttrmFnqyZgP/w3hQCuj1UFGktv.zrkE7vVALTOhiOQa.LSSFq', 'Client'),
(4, 4, 'Queen@g', '$2y$10$7WBXttrmFnqyZgP/w3hQCuj1UFGktv.zrkE7vVALTOhiOQa.LSSFq', 'Client'),
(5, 5, 'Mayo@g', '$2y$10$7WBXttrmFnqyZgP/w3hQCuj1UFGktv.zrkE7vVALTOhiOQa.LSSFq', 'Client'),
(6, 6, 'Lean@g', '$2y$10$7WBXttrmFnqyZgP/w3hQCuj1UFGktv.zrkE7vVALTOhiOQa.LSSFq', 'Client'),
(7, 7, 'Maria@g', '$2y$10$7WBXttrmFnqyZgP/w3hQCuj1UFGktv.zrkE7vVALTOhiOQa.LSSFq', 'Client'),
(8, 8, 'Dex@g', '$2y$10$7WBXttrmFnqyZgP/w3hQCuj1UFGktv.zrkE7vVALTOhiOQa.LSSFq', 'Client'),
(9, 9, 'Ara@g', '$2y$10$7WBXttrmFnqyZgP/w3hQCuj1UFGktv.zrkE7vVALTOhiOQa.LSSFq', 'Client'),
(10, 10, 'Client@g', '$2y$10$7WBXttrmFnqyZgP/w3hQCuj1UFGktv.zrkE7vVALTOhiOQa.LSSFq', 'Client');

-- --------------------------------------------------------

--
-- Table structure for table `tb_librarian`
--

DROP TABLE IF EXISTS `tb_librarian`;
CREATE TABLE IF NOT EXISTS `tb_librarian` (
  `librarianID` int NOT NULL AUTO_INCREMENT,
  `empid` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('Librarian') COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`librarianID`),
  KEY `empid` (`empid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_librarian`
--

INSERT INTO `tb_librarian` (`librarianID`, `empid`, `email`, `password`, `role`) VALUES
(1, 1, 'aguila@g', '$2y$10$7WBXttrmFnqyZgP/w3hQCuj1UFGktv.zrkE7vVALTOhiOQa.LSSFq', 'Librarian'),
(2, 2, 'reyes@g', '$2y$10$7WBXttrmFnqyZgP/w3hQCuj1UFGktv.zrkE7vVALTOhiOQa.LSSFq', 'Librarian');

-- --------------------------------------------------------

--
-- Table structure for table `tb_studinfo`
--

DROP TABLE IF EXISTS `tb_studinfo`;
CREATE TABLE IF NOT EXISTS `tb_studinfo` (
  `studid` int NOT NULL AUTO_INCREMENT,
  `lastname` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `firstname` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `course` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`studid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_studinfo`
--

INSERT INTO `tb_studinfo` (`studid`, `lastname`, `firstname`, `course`) VALUES
(1, 'Parker', 'Peter', 'BSIT'),
(2, 'Kent', 'Clark', 'BSCS'),
(3, 'Lozares', 'Maur', 'BSMA'),
(4, 'Angelou', 'Queen', 'BSMA'),
(5, 'Mayo', 'Man', 'BSMA'),
(6, 'Irish', 'Lean', 'BSIT'),
(7, 'Maria', 'Andrea', 'BSIT'),
(8, 'Valencia', 'Dex', 'BSIT'),
(9, 'Bela', 'Ara', 'BSIT'),
(10, 'Client', 'Name', 'BSIT');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_client`
--
ALTER TABLE `tb_client`
  ADD CONSTRAINT `tb_client_ibfk_1` FOREIGN KEY (`studid`) REFERENCES `tb_studinfo` (`studid`);

--
-- Constraints for table `tb_librarian`
--
ALTER TABLE `tb_librarian`
  ADD CONSTRAINT `tb_librarian_ibfk_1` FOREIGN KEY (`empid`) REFERENCES `tbempinfo` (`empid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
