-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 21, 2023 at 08:00 AM
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
-- Table structure for table `tbappstatus`
--

DROP TABLE IF EXISTS `tbappstatus`;
CREATE TABLE IF NOT EXISTS `tbappstatus` (
  `statusid` varchar(10) NOT NULL,
  `statusname` varchar(200) NOT NULL,
  PRIMARY KEY (`statusname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbappstatus`
--

INSERT INTO `tbappstatus` (`statusid`, `statusname`) VALUES
('SI0004', 'Congratulions! You are hired. We are looking forward to work with you!'),
('SI0005', 'Sorry, your application was rejected.'),
('SI0003', 'We are pleased to inform you that you have been selected as one of the candidates for a FACE-TO-FACE INTERVIEW.'),
('SI0001', 'We have successfully RECEIVED your application.'),
('SI0002', 'Your application is UNDER REVIEW. Please wait for the next update.');

-- --------------------------------------------------------

--
-- Table structure for table `tbdepartment`
--

DROP TABLE IF EXISTS `tbdepartment`;
CREATE TABLE IF NOT EXISTS `tbdepartment` (
  `deptid` varchar(10) NOT NULL,
  `deptname` varchar(50) NOT NULL,
  PRIMARY KEY (`deptname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbdepartment`
--

INSERT INTO `tbdepartment` (`deptid`, `deptname`) VALUES
('DI0010', 'Accounting Office'),
('DI0003', 'College of Accountancy, Business and Economics'),
('DI0009', 'College of Agriculture and Forestry'),
('DI0001', 'College of Arts and Sciences'),
('DI0005', 'College of Engineering, Architecture and Fine Arts'),
('DI0008', 'College of Industrial Technology'),
('DI0002', 'College of Informatics and Computing Sciences'),
('DI0006', 'College of Nursing'),
('DI0007', 'College of Nutrition and Dietetics'),
('DI0004', 'College of Teacher Education'),
('DI0016', 'External Affairs Office'),
('DI0018', 'Health Services'),
('DI0015', 'Human Resource Management Office'),
('DI0017', 'ICT Services'),
('DI0011', 'Library Services'),
('DI0014', 'Office of the Guidance and Counseling'),
('DI0012', 'Registrar Office'),
('DI0013', 'Testing and Admission Office');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbempinfo`
--

INSERT INTO `tbempinfo` (`empid`, `lastname`, `firstname`, `department`) VALUES
(1, 'aguila', 'nina', 'cics');

-- --------------------------------------------------------

--
-- Table structure for table `tbhrstaff`
--

DROP TABLE IF EXISTS `tbhrstaff`;
CREATE TABLE IF NOT EXISTS `tbhrstaff` (
  `hrid` int NOT NULL AUTO_INCREMENT,
  `empid` int NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `username` varchar(20) NOT NULL,
  PRIMARY KEY (`hrid`),
  KEY `empid_fk_adminaccount` (`empid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbhrstaff`
--

INSERT INTO `tbhrstaff` (`hrid`, `empid`, `password`, `username`) VALUES
(1, 1, 'admin1234', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbjobapplication`
--

DROP TABLE IF EXISTS `tbjobapplication`;
CREATE TABLE IF NOT EXISTS `tbjobapplication` (
  `appno` varchar(15) NOT NULL,
  `jobtitle` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `contactno` varchar(12) NOT NULL,
  `emailadd` varchar(255) NOT NULL,
  `appadd` varchar(255) NOT NULL,
  `appeducation` varchar(255) NOT NULL,
  `appeligibility` text NOT NULL,
  `appworkexp` text NOT NULL,
  `fileresume` varchar(90) NOT NULL,
  `fileletter` varchar(90) NOT NULL,
  `filediploma` varchar(90) NOT NULL,
  `filecert` varchar(90) NOT NULL,
  `appdate` date NOT NULL,
  `appstatus` varchar(200) DEFAULT NULL,
  `statusdate` date DEFAULT NULL,
  PRIMARY KEY (`appno`),
  KEY `title` (`jobtitle`),
  KEY `status` (`appstatus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbjobapplication`
--

INSERT INTO `tbjobapplication` (`appno`, `jobtitle`, `fname`, `mname`, `lname`, `birthday`, `gender`, `contactno`, `emailadd`, `appadd`, `appeducation`, `appeligibility`, `appworkexp`, `fileresume`, `fileletter`, `filediploma`, `filecert`, `appdate`, `appstatus`, `statusdate`) VALUES
('CV20232300', 'IT Lecturer', 'Carla Eliza', 'Magcawas', 'Villanueva', '2003-06-29', 'Female', '0987654321', 'carlaeliza@gmail.com', 'Sabang', 'College', 'None Required', 'Virtual Assistant', 'attachments/Activity-4_UI.pdf', 'attachments/Activity-4_UI.pdf', 'attachments/Activity-4_UI.pdf', 'attachments/Activity-4_UI.pdf', '2023-11-19', 'Your application is UNDER REVIEW. Please wait for the next update.', '2023-11-20'),
('KA20239178', 'Medical Services Assistant', 'Kate', 'Rosal', 'Atienza', '2003-09-04', 'Female', '09655820186', 'karatienza@gmail.com', 'lumbang', 'College', 'BSIT', 'lazada', 'attachments/1x1 and posters.pdf', 'attachments/id sy 2023-2024.pdf', 'attachments/Kate_2ndyr_2ndsem-grades.pdf', 'attachments/Kate_3rd year_COR.pdf', '2023-11-13', 'We are pleased to inform you that you have been selected as one of the candidates for a FACE-TO-FACE INTERVIEW.', '2023-11-20');

-- --------------------------------------------------------

--
-- Table structure for table `tbjobs`
--

DROP TABLE IF EXISTS `tbjobs`;
CREATE TABLE IF NOT EXISTS `tbjobs` (
  `jobid` varchar(255) NOT NULL,
  `jobtitle` varchar(255) NOT NULL,
  `departmentname` varchar(50) NOT NULL,
  `quantity` int NOT NULL,
  `dateposted` date NOT NULL,
  `education` varchar(255) DEFAULT NULL,
  `experience` text NOT NULL,
  `expertise` text NOT NULL,
  `competency` text NOT NULL,
  `eligibility` text NOT NULL,
  `dutres` text,
  `hiringstatus` enum('Full','Active') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`jobtitle`),
  KEY `Jobs` (`departmentname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbjobs`
--

INSERT INTO `tbjobs` (`jobid`, `jobtitle`, `departmentname`, `quantity`, `dateposted`, `education`, `experience`, `expertise`, `competency`, `eligibility`, `dutres`, `hiringstatus`) VALUES
('JI0001', 'Guidance Counselor III', 'Office of the Guidance and Counseling', 3, '2023-08-27', 'Graduate of Master in Guidance and Counseling', 'At least 1-year relevant experience', 'Counseling Skills; Intervention Planning and Development Skills; Stress Management Skills; Psychological Report Writing; Group and Activity Facilitation; Problem Solving and Decision Making; Communication Skills; Interpersonal Skills; Technology Skills; Professional Integrity; and Records and Data Management', 'Counseling Skills; Intervention Planning and Development Skills; Stress Management Skills; Psychological Report Writing; Group and Activity Facilitation; Problem Solving and Decision Making; Communication Skills; Interpersonal Skills; Technology Skills; Professional Integrity; and Records and Data Management', 'Registered Guidance Counselor', 'true', 'Full'),
('JI0002', 'IT Lecturer', 'College of Informatics and Computing Sciences', 5, '2023-02-22', 'Candidates should have at least master’s degree and/or units and possess an undergraduate degree in IT/CS or any allied field', 'With at least experience in working IT industry, or handles project related to IT', 'Possesses competent knowledge in the field of IT/CS, can handle system administration and maintenance and system integration and Object-Oriented Programming', 'Possesses competent knowledge in the field of IT/CS, can handle system administration and maintenance and system integration and Object-Oriented Programming', 'None Required', 'True', 'Active'),
('JI0009', 'Librarian', 'Library Services', 1, '2023-11-19', 'Librarian', 'At least 1-year relevant experience', 'Librarian', 'Librarian', 'None Required', 'true', 'Active'),
('JI0004', 'Management Accounting Lecturer', 'College of Accountancy, Business and Economics', 1, '2023-06-29', 'Bachelor of Science in Management Accounting with knowledge in Business Analytics', 'At least one (1) year experience in the Academe or in the industry', 'Business Analytics', 'Business Analytics', 'None Required', 'True', 'Active'),
('JI0003', 'Medical Services Assistant', 'Health Services', 2, '2023-09-04', 'Graduate of Bachelor of Science in Nursing (BSN)', 'Two (2) years of relevant experience', 'With Basic Life Support(BLS) / Advance Cardiovascular Life Support(ACLS) Training', 'With Basic Life Support(BLS) / Advance Cardiovascular Life Support(ACLS) Training', 'None Required', 'True', 'Active'),
('JI0005', 'Psychology Instructor', 'College of Arts and Sciences', 3, '2023-01-30', 'Bachelor of Science in Psychology or other related Bachelor’s Degree with Relevant Master’s Degree', 'None Required', 'Proficient in the field of Psycholgy; possess critical thinking skills, communication skills and interpersonal skills', 'Proficient in the field of Psycholgy; possess critical thinking skills, communication skills and interpersonal skills', 'RA 1080', 'Terms and conditions of employment will be discussed during interview', 'Active'),
('JI0008', 'School Dentist', 'Health Services', 1, '2023-11-19', 'Graduate of BS Dentistry', 'At least 1-year relevant experience', 'Dentistry', 'Dentistry', 'None Required', 'false', 'Full'),
('JI0006', 'Social Science Lecturers', 'College of Teacher Education', 3, '2023-01-01', 'Bachelor of Arts in Social Science or any related Bachelor\'s Degree with relevant Master\'s Degree', 'Two (2) years of relevant experience', 'None Required', 'Possess competent knowledge in the field of Social Science; good at communication, listening, collaboration, and adaptability', 'None Required', 'Terms and conditions of employment will be discussed during interview', 'Active'),
('JI0007', 'System Admin', 'ICT Services', 2, '2023-11-19', 'Graduate of Bachelor of Science in Information Technology or Computer Science', 'With at least experience in working IT industry, or handles project related to IT', 'IT', 'IT', 'None Required', 'true', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tb_studinfo`
--

DROP TABLE IF EXISTS `tb_studinfo`;
CREATE TABLE IF NOT EXISTS `tb_studinfo` (
  `studid` int NOT NULL AUTO_INCREMENT,
  `lastname` varchar(25) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `course` varchar(255) NOT NULL,
  PRIMARY KEY (`studid`),
  KEY `course_fk_studinfo` (`course`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_studinfo`
--

INSERT INTO `tb_studinfo` (`studid`, `lastname`, `firstname`, `course`) VALUES
(13, 'parker', 'peter', 'BS Information Techonlogy'),
(14, 'kent', 'clark', 'BS Computer Science');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbhrstaff`
--
ALTER TABLE `tbhrstaff`
  ADD CONSTRAINT `empid_fk_hrstaff` FOREIGN KEY (`empid`) REFERENCES `tbempinfo` (`empid`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tbjobapplication`
--
ALTER TABLE `tbjobapplication`
  ADD CONSTRAINT `appstatus_fk_jobapplication` FOREIGN KEY (`appstatus`) REFERENCES `tbappstatus` (`statusname`),
  ADD CONSTRAINT `jobtitle_fk_jobapplication` FOREIGN KEY (`jobtitle`) REFERENCES `tbjobs` (`jobtitle`);

--
-- Constraints for table `tbjobs`
--
ALTER TABLE `tbjobs`
  ADD CONSTRAINT `departmentname_fk_jobs` FOREIGN KEY (`departmentname`) REFERENCES `tbdepartment` (`deptname`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
