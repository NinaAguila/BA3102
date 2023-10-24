-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 24, 2023 at 09:01 AM
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
-- Database: `db_ba3102_gr4`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_applicant`
--

DROP TABLE IF EXISTS `tbl_applicant`;
CREATE TABLE IF NOT EXISTS `tbl_applicant` (
  `userID` varchar(10) NOT NULL,
  `statusID` varchar(10) NOT NULL,
  `loginID` varchar(10) NOT NULL,
  `websiteID` varchar(10) NOT NULL,
  `applicantName` varchar(255) NOT NULL,
  PRIMARY KEY (`userID`),
  KEY `statusID` (`statusID`),
  KEY `loginID` (`loginID`),
  KEY `websiteID` (`websiteID`),
  KEY `applicantName` (`applicantName`(250))
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_applicant`
--

INSERT INTO `tbl_applicant` (`userID`, `statusID`, `loginID`, `websiteID`, `applicantName`) VALUES
(' UI0001', 'STI0001', 'LI0001', 'SI0001', 'WE0001'),
('UI0002', 'STI0002', 'LI0002', 'SI0002', 'WE0002'),
('UI0003', 'STI0003', 'LI0003', 'SI0003', 'WE0003'),
('UI0004', 'STI0004', ' LI0004', 'SI0004', 'WE0004'),
('UI0005', 'STI0005', 'LI0005', 'SI0005', 'WE0005');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_applicant_sign_up`
--

DROP TABLE IF EXISTS `tbl_applicant_sign_up`;
CREATE TABLE IF NOT EXISTS `tbl_applicant_sign_up` (
  `signUpID` varchar(10) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `applicantName` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `contactNumber` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `emailAddress` varchar(255) NOT NULL,
  PRIMARY KEY (`signUpID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_applicant_sign_up`
--

INSERT INTO `tbl_applicant_sign_up` (`signUpID`, `userName`, `userPassword`, `applicantName`, `gender`, `address`, `birthdate`, `contactNumber`, `emailAddress`) VALUES
('SI0001', 'jpanaligan85', 'P@ssw0rdJP', 'John Panaligan', 'Male', '123 Main Street, Manila', '2013-01-15', '+63 912 345 6789', 'john.panaligan@gmail.com'),
('SI0002', 'mgarcia90', 'Maria123!', 'Maria Garcia', 'Female', '456 Oak Avenue, Cebu City\r\n', '2003-07-02', '', 'maria.garcia@gmail.com\r\n'),
('SI0003', 'dmendoza88', 'MyP@ssw0rd', 'David Mendoza', 'Male', '789 Palm Road, Quezon City', '1993-11-05', ' +63 999 555 4321', 'david.mendoza@gmail.com'),
('SI0004', 's.magno93', 'Sarah123', 'Sarah Magno', 'Female', '101 Pine Lane, Davao City', '1993-03-12', '+63 922 888 9999', 'sarah.magno@gmail.com'),
('SI0005', 'j.cruz80', '1SecureP@ss\r\n', 'Juan Cruz', ' Male', '222 Cedar Street, Baguio City\r\n', '1980-09-20', '+63 966 111 7777', 'juan.cruz@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_apply`
--

DROP TABLE IF EXISTS `tbl_apply`;
CREATE TABLE IF NOT EXISTS `tbl_apply` (
  `applyID` varchar(10) NOT NULL,
  `jobTitle` varchar(255) NOT NULL,
  `applicantName` varchar(255) NOT NULL,
  `applicantResume` longblob NOT NULL,
  `applicantPicture` longblob NOT NULL,
  `applicantEmail` varchar(255) NOT NULL,
  `applicationNumber` varchar(10) NOT NULL,
  `applicationDate` date NOT NULL,
  `applicationStatus` varchar(255) NOT NULL,
  PRIMARY KEY (`applyID`),
  KEY `jobTitle` (`jobTitle`(250)),
  KEY `applicantName` (`applicantName`(250)),
  KEY `applicantEmail` (`applicantEmail`(250))
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

DROP TABLE IF EXISTS `tbl_department`;
CREATE TABLE IF NOT EXISTS `tbl_department` (
  `departmentID` varchar(10) NOT NULL,
  `departmentName` varchar(255) NOT NULL,
  PRIMARY KEY (`departmentID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`departmentID`, `departmentName`) VALUES
('DI0001', 'CAS'),
('DI0002', 'CICS'),
('DI0003', 'Accounting Office'),
('DI0004', 'CABE'),
('DI0005', 'Library Services Office');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hr`
--

DROP TABLE IF EXISTS `tbl_hr`;
CREATE TABLE IF NOT EXISTS `tbl_hr` (
  `hrID` varchar(10) NOT NULL,
  `userID` varchar(10) NOT NULL,
  `loginID` varchar(10) NOT NULL,
  `departmentID` varchar(10) NOT NULL,
  `jobID` varchar(10) NOT NULL,
  `applyID` varchar(10) NOT NULL,
  KEY `hrID` (`hrID`),
  KEY `userID` (`userID`),
  KEY `loginID` (`loginID`),
  KEY `departmentID` (`departmentID`),
  KEY `jobID` (`jobID`),
  KEY `applyID` (`applyID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_hr`
--

INSERT INTO `tbl_hr` (`hrID`, `userID`, `loginID`, `departmentID`, `jobID`, `applyID`) VALUES
('HR0001', 'UI0001', 'LI0001', 'DI0001', ' JI0001', 'APP001'),
('HR0002', 'UI0002', 'LI0002', 'DI0002', 'JI0002', 'APP002'),
('HR0003', 'UI0003', 'LI0003', 'DI0003', 'JI0003', 'APP003'),
('HR0004', 'UI0004', 'LI0004', 'DI0004', 'JI0004', 'APP004'),
('HR0005', 'UI0005', 'LI0005', 'DI0005', 'JI0005', 'APP005');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hr_account`
--

DROP TABLE IF EXISTS `tbl_hr_account`;
CREATE TABLE IF NOT EXISTS `tbl_hr_account` (
  `hrID` varchar(10) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  PRIMARY KEY (`hrID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_hr_account`
--

INSERT INTO `tbl_hr_account` (`hrID`, `userName`, `userPassword`) VALUES
('HR0001', 'HRUser0001', 'P@ssw0rd#HR0001'),
('HR0002', 'HRUser0002\r\n', 'S3cureHR#2023'),
('HR0003', 'HRUser0003\r\n', 'HRAcc3ss$123!'),
('HR0004', 'HRUser0004', 'DirHR2023@Acct!\r\n\r\n'),
('HR0005', 'HRUser0005', 'AdminHRAcct$2023*');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobs`
--

DROP TABLE IF EXISTS `tbl_jobs`;
CREATE TABLE IF NOT EXISTS `tbl_jobs` (
  `jobID` varchar(10) NOT NULL,
  `jobTitle` varchar(255) NOT NULL,
  `jobDescription` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`jobID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_jobs`
--

INSERT INTO `tbl_jobs` (`jobID`, `jobTitle`, `jobDescription`) VALUES
('JI0001', 'Chemistry Instructor', 'EDUCATION:\r\nBachelor of Science in Chemistry or any related Bachelor\'s Degree with Relevant Master\'s Degree\r\n\r\nEXPERIENCE:\r\nTwo (2) years of relevant experience\r\n\r\nEXPERTISE:\r\nChemistry courses\r\n\r\nCOMPETENCY:\r\nPossess competent knowledge in the field of Chemistry\r\nGood at communication, listening, collaboration, and adaptability\r\n\r\nELIGIBILITY:\r\nRA 1080\r\n\r\nDUTIES AND RESPONSIBILITY:\r\nTerms and conditions of employment will be discussed during interview'),
('JI0002', 'IT Specialist', 'EDUCATION:\r\nBachelor of Science in Computer Science or related Bachelor\'s Degree with a relevant Master\'s Degree\r\n\r\nEXPERIENCE:\r\nTwo (2) years of relevant experience in IT field\r\n\r\nEXPERTISE:\r\nInformation technology courses\r\n\r\nCOMPETENCY:\r\nProficiency in programming, data analysis, and problem-solving\r\n\r\nELIGIBILITY:\r\nRelevant certifications and qualifications\r\n\r\nDUTIES AND RESPONSIBILITY:\r\nSpecific responsibilities for the College of Informatics and Computing Sciences will be discussed during the interview\r\n'),
('JI0003', 'Accountant', 'EDUCATION:\r\nBachelor\'s degree in Accounting or Finance\r\n\r\nEXPERIENCE:\r\nMinimum of three (3) years of accounting experience\r\n\r\nEXPERTISE:\r\nAccounting principles and financial management\r\n\r\nCOMPETENCY:\r\nStrong analytical and organizational skills\r\n\r\nELIGIBILITY:\r\nRelevant certifications and qualifications\r\n\r\nDUTIES AND RESPONSIBILITY:\r\nSpecific responsibilities for the Accounting Office will be discussed during the interview\r\n\r\n'),
('JI0004', 'Academic Coordinator', 'EDUCATION:\r\nA Bachelor\'s or Master\'s degree in Accounting, Finance, or a related field is required.\r\nAdditional qualifications such as CPA certification may be necessary for certain positions.\r\n\r\nEXPERIENCE:\r\nA minimum of 3 years of relevant experience in accounting, finance, or a related field.\r\nPrior experience in teaching or academic administration, if applicable.\r\n\r\nEXPERTISE:\r\nSpecialized knowledge in accounting principles, financial management, and related subjects.\r\nSkills in curriculum development and academic leadership.\r\n\r\nCOMPETENCY:\r\nCompetencies such as financial analysis, financial reporting, and curriculum design.\r\nStrong leadership, communication, and teamwork skills.\r\n\r\nELIGIBILITY:\r\nEligibility may include meeting the educational and professional requirements set by the institution.\r\n\r\nDUTIES AND RESPONSIBILITY:\r\nSpecific duties and responsibilities for positions within CABE will vary based on roles such as academic staff, instructors, or administrative positions. These will be discussed during the interview to ensure alignment with the department\'s objectives and expectations.\r\n'),
('JI0005', 'Library Services Specialist', 'EDUCATION:\r\nBachelor\'s or Master\'s degree in Library Science or a related field.\r\nProficiency in library cataloging systems and digital library management.\r\n\r\nEXPERIENCE:\r\nMinimum of 2 years of experience in library management and services.\r\nFamiliarity with library software and technology.\r\n\r\nEXPERTISE:\r\nStrong organizational and classification skills for library materials.\r\nKnowledge of library information systems and digital archiving.\r\n\r\nCOMPETENCY:\r\nExcellent customer service and interpersonal skills.\r\nAbility to work collaboratively in a team and assist patrons effectively.\r\nELIGIBILITY:\r\nEligibility may include a valid professional library certification.\r\n\r\nDUTIES AND RESPONSIBILITY:\r\nSpecific duties and responsibilities for Library Services Office will be discussed during the interview to ensure alignment with the department\'s goals and objectives.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

DROP TABLE IF EXISTS `tbl_login`;
CREATE TABLE IF NOT EXISTS `tbl_login` (
  `loginID` varchar(10) NOT NULL,
  `signUpID` varchar(10) NOT NULL,
  `hrID` varchar(10) NOT NULL,
  `levelID` varchar(10) NOT NULL,
  PRIMARY KEY (`loginID`),
  KEY `signUpID` (`signUpID`),
  KEY `hrID` (`hrID`),
  KEY `levelID` (`levelID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`loginID`, `signUpID`, `hrID`, `levelID`) VALUES
('LI0001', 'SI0001', 'HR0001', '2'),
('LI0002', 'SI0002', 'HR0002', '2'),
('LI0003', 'SI0003', 'HR0003', '2'),
('LI0004', 'SI0004', 'HR0004', '2'),
('LI0005', 'SI0005', 'HR0005', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_security_level`
--

DROP TABLE IF EXISTS `tbl_security_level`;
CREATE TABLE IF NOT EXISTS `tbl_security_level` (
  `levelID` varchar(10) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`levelID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_security_level`
--

INSERT INTO `tbl_security_level` (`levelID`, `description`) VALUES
('1', 'Admin'),
('2', 'HR'),
('3', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_website`
--

DROP TABLE IF EXISTS `tbl_website`;
CREATE TABLE IF NOT EXISTS `tbl_website` (
  `websiteID` varchar(10) NOT NULL,
  `departmentID` varchar(10) NOT NULL,
  `jobID` varchar(10) NOT NULL,
  `applyID` varchar(10) NOT NULL,
  PRIMARY KEY (`websiteID`),
  KEY `departmentID` (`departmentID`),
  KEY `jobID` (`jobID`),
  KEY `applyID` (`applyID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_website`
--

INSERT INTO `tbl_website` (`websiteID`, `departmentID`, `jobID`, `applyID`) VALUES
('WE0001', ' DI0001', 'JI0001', 'APP001'),
('WE0002', 'DI0002', 'JI0002', 'APP002'),
('WE0003', 'DI0003', 'JI0003', 'APP003'),
('WE0004', 'DI0004', 'JI0004', 'APP004'),
('WE0005', 'DI0005', ' JI0005', 'APP005');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
