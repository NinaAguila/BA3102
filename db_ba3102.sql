-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 27, 2023 at 01:07 PM
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
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(7, 'Zymon', 'Maquinto', 'CICS');

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
('21-33827', 0x89504e470d0a1a0a0000000d4948445200000063000000630103000000b5f52cd600000006504c5445ffffff00000055c2d37e000000097048597300000ec400000ec401952b0e1b000000e049444154388dd5d3bd0d85201000e0331474b800096bd0b99213a02c802bd1b186090b585a10ef9d26ef69c33b5aafe23339e57e04784bf4883e8a6dc0839302b1a475b474e034648fa02c86062d49bb36cd96bed02010c19ae3be5955545fb039dcd55675c5aa9e8daba8c78c7b99921e59edba8b62065e4a5227d0efda71ea224c68280f38f531fb549c341b2b5cfb9d16e15b435d4a1a1f6914796665c1d17110072f4a2a1316c7e91a6f0e5014a773b6f2cc0e9c685f7ca4d717c56aa065d1bf9bfd174d6c96263428c8758a0d3aff3f7aa081d3591f68f7e8444def880f8809472b625bc3410000000049454e44ae426082),
('21-35459', 0x89504e470d0a1a0a0000000d4948445200000063000000630103000000b5f52cd600000006504c5445ffffff00000055c2d37e000000097048597300000ec400000ec401952b0e1b000000ea49444154388dd5d3b10dc3201005d08b28e8600124af41c74ace024ebc005e898e35905820ee281017ec58891b7cb44114bc02c1e70e807f1912d1f2200c164a02d892f2a4eb8292894f138b46db23adc63e2da8448f80590ef0bb59535b3e1ded296d4bfb21f9f46c4dc9342c89ad18264ac2c03d0d4f0da4c0d45b0fc57cf25d49fafc70acc091ef4275dfece3ea0250baa51a2ece89154a355fd1113d7b5102a3269ea5572325e970750cf1c877a1bdbc43816f299aaab59db77e39aa72a1ad5fb69981948933e282d1f6c885910374c86a7c713591aaff0fc3c3074169ef6b5cd3a9cb1bfa8ff10629275295ba0d045c0000000049454e44ae426082),
('21-35608', 0x89504e470d0a1a0a0000000d4948445200000063000000630103000000b5f52cd600000006504c5445ffffff00000055c2d37e000000097048597300000ec400000ec401952b0e1b000000e549444154388dd5d3b10dc3201005d08b28e8f0029658838e95c802c42c70ace4ce6b20b100e928502ea02849e51c6da87834fcaf03807f590bd12693b7f4e0a440203467fa8693cd08e00ce184c291fc9c5026372310f1d0db37d9a97a3f3419bf6d4f350eaa786f7f693944b16b4f5438815915e840ab622545ac3950f29c165a9dccc536c5e9527bb33edee6585153463ccc2bcb2f29a022d3ad52e174a93d0b5c77b1715a28c7aae3a7dfb9c6252348034e63b6b6799391537f2f61070fb9b0b2799370a38c138abbbef796130a3bdd0f81acfaffb31a3f7338d7e80714ab404effb19e62c249e0490f719c0000000049454e44ae426082),
('21-34693', 0x89504e470d0a1a0a0000000d4948445200000063000000630103000000b5f52cd600000006504c5445ffffff00000055c2d37e000000097048597300000ec400000ec401952b0e1b000000e349444154388dd5d3b11183300c05507114746601df790d755e0916706001b1923bd6e0ce0b5052f850947009691cd1a273c12b30d2c706b84bb5cc03a6d5f3aec9404d081dca83269f06580c325dd0b4e5704d63942f5c10d4d32c8d7f3b2b4ae6234c744e5b9454c5f627b6a25a4e3ce7c76c3b551b189430741974032e0036a8821c64e1d1ce3f55db3bddc6ad9aa4973e4ac0b52a036ef56e071e74d920e9366ed7c5e4ed8373d074044c904893fcdb694e84d96892f33246d93e912a2f2fd9f6d399a226ed8d35173445dbc7f33e1425f7ef1d06687acd17e5b09cd396748f7a0232444725d5bc6a160000000049454e44ae426082),
('21-38479', 0x89504e470d0a1a0a0000000d4948445200000063000000630103000000b5f52cd600000006504c5445ffffff00000055c2d37e000000097048597300000ec400000ec401952b0e1b000000e549444154388dd5d2311284200c05d0381676780166b8463aaee4095cbd005cc98e6b30c305b4a370cc665777ad34b452f10a48c207e029ab251a9ad85bda2429a85d6336e48d249b1c9a19c915882b746572b64c50fb50cf676797e2f91cf2d1ffb497fa1659fbf3d92ed5f2f556834db324405d4d6621ad24b5216da03b8e429242cd45c61095288ecb72bc344b028c3d1a87bfceaeb5e700b87692aafce9c54f1a24b5d96c603c1dd3de681f51010d923ed97262189524fe2f63861e8e77b9934d6380174555209f8dcfba2bd038d1129213c5ff9a8c0fab92c4f3f9ccd9d64ed233d61bae46434af732b58e0000000049454e44ae426082);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
