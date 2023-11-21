-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 21, 2023 at 07:24 AM
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
-- Database: `e`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `SP_DeleteAppeal`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_DeleteAppeal` (IN `inputAppeal` INT)   BEGIN
    DELETE FROM tbappeal WHERE appealid = inputAppeal;
END$$

DROP PROCEDURE IF EXISTS `SP_DeleteViolationReport`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_DeleteViolationReport` (IN `inputViolationID` INT)   BEGIN
    DELETE FROM tbviolationreport WHERE violationid = inputViolationID;
END$$

DROP PROCEDURE IF EXISTS `SP_GetAdminAccount`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_GetAdminAccount` (IN `inputAdminUsername` VARCHAR(255))   BEGIN
SELECT tbadminaccount.adminid, tbadminaccount.empid, tbadminaccount.username, tbempinfo.firstname, tbempinfo.lastname, tbadminaccount.passwordencrypted FROM tbadminaccount INNER JOIN tbempinfo ON tbadminaccount.empid = tbempinfo.empid
WHERE tbadminaccount.username = inputAdminUsername;
END$$

DROP PROCEDURE IF EXISTS `SP_GetAppeals`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_GetAppeals` (IN `sortOption` VARCHAR(255))   BEGIN
SELECT tbappeal.appealid,  tbviolationreport.violationid, tb_studinfo.studid, CONCAT(tb_studinfo.firstname, ' ',  tb_studinfo.lastname) AS name, tbviolationtypes.violationame, tbstudentdepartment.department, tb_studinfo.course, tbappeal.date AS appealdate, tbviolationtypes.violationame, tbviolationreport.violationdate, tbviolationreport.violationtime, CONCAT(tbempinfo.firstname, ' ', tbempinfo.lastname) AS staffname, tbviolationreport.remarks, tbappeal.appeal, tbviolationreport.evidence, tbviolationreport.status
    FROM tbappeal
    INNER JOIN tbviolationreport ON tbappeal.violationid = tbviolationreport.violationid
    INNER JOIN tb_studinfo ON tbviolationreport.studid = tb_studinfo.studid
    INNER JOIN tbviolationtypes ON tbviolationreport.violationtypeid = tbviolationtypes.violationtypeid
    INNER JOIN tbstudentdepartment ON tb_studinfo.course = tbstudentdepartment.course
    INNER JOIN tbempinfo ON tbviolationreport.empid = tbempinfo.empid
    ORDER BY
        CASE
            WHEN sortOption = 'option1' THEN tbviolationtypes.violationame
            WHEN sortOption = 'option2' THEN name
            ELSE tbappeal.appealid
        END;
END$$

DROP PROCEDURE IF EXISTS `SP_GetFirstOffense`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_GetFirstOffense` (IN `p_ViolationTypeID` INT)   BEGIN
    SELECT tbviolationtypes.firstoffense
    FROM tbviolationtypes
    WHERE tbviolationtypes.violationtypeid = p_ViolationTypeID;
END$$

DROP PROCEDURE IF EXISTS `SP_GetSecondOffense`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_GetSecondOffense` (IN `p_ViolationTypeID` INT)   BEGIN
    SELECT tbviolationtypes.secondoffense
    FROM tbviolationtypes
    WHERE tbviolationtypes.violationtypeid = p_ViolationTypeID;
END$$

DROP PROCEDURE IF EXISTS `SP_GetStudentAccount`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_GetStudentAccount` (IN `id` INT)   BEGIN
    SELECT 
       tbstudentaccount.userid,
       tbstudentaccount.studid,
       tbstudentaccount.passwordencrypted,
       tb_studinfo.firstname,
       tb_studinfo.lastname,
       tbstudentdepartment.course,
       tbstudentdepartment.department
    FROM tbstudentaccount
    INNER JOIN tb_studinfo ON tbstudentaccount.studid = tb_studinfo.studid
    INNER JOIN tbstudentdepartment ON tb_studinfo.course = tbstudentdepartment.course
    WHERE tbstudentaccount.studid = id;
END$$

DROP PROCEDURE IF EXISTS `SP_GetStudentData`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_GetStudentData` (IN `srCodeParam` INT)   BEGIN
    SELECT CONCAT(tb_studinfo.firstname, ' ', tb_studinfo.lastname) AS name, tb_studinfo.course, tbstudentdepartment.department
    FROM tb_studinfo
    INNER JOIN tbstudentdepartment ON tb_studinfo.course = tbstudentdepartment.course
    WHERE tb_studinfo.studid = srCodeParam;
END$$

DROP PROCEDURE IF EXISTS `SP_GetStudentInfoByStudID`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_GetStudentInfoByStudID` (IN `inStudId` INT)   BEGIN
    SELECT CONCAT(tb_studinfo.firstname, ' ', tb_studinfo.lastname) AS name, tb_studinfo.course, tbstudentdepartment.department
    FROM tb_studinfo
    INNER JOIN tbstudentdepartment ON tb_studinfo.course = tbstudentdepartment.course
    WHERE tb_studinfo.studid = inStudId;
END$$

DROP PROCEDURE IF EXISTS `SP_GetThirdOffense`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_GetThirdOffense` (IN `p_ViolationTypeID` INT)   BEGIN
    SELECT tbviolationtypes.thirdoffense
    FROM tbviolationtypes
    WHERE tbviolationtypes.violationtypeid = p_ViolationTypeID;
END$$

DROP PROCEDURE IF EXISTS `SP_GetViolationReport`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_GetViolationReport` (IN `p_SRCode` INT, IN `p_ViolationTypeID` INT)   BEGIN
    SELECT *
    FROM tbviolationreport
    WHERE tbviolationreport.studid = p_SRCode AND tbviolationreport.violationtypeid = p_ViolationTypeID;
END$$

DROP PROCEDURE IF EXISTS `SP_GetViolationTypes`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_GetViolationTypes` ()   BEGIN
    SELECT tbviolationtypes.violationtypeid, tbviolationtypes.violationame FROM tbviolationtypes;
END$$

DROP PROCEDURE IF EXISTS `SP_InsertViolationReport`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_InsertViolationReport` (IN `p_SRCode` INT, IN `p_StaffID` INT, IN `p_ViolationTypeID` INT, IN `p_ViolationDate` DATE, IN `p_ViolationTime` TIME, IN `p_Remarks` VARCHAR(255), IN `p_Evidence` VARCHAR(255), IN `p_Status` VARCHAR(255))   BEGIN
    INSERT INTO tbviolationreport (tbviolationreport.studid, tbviolationreport.empid, tbviolationreport.violationtypeid, tbviolationreport.violationdate, tbviolationreport.violationtime, tbviolationreport.remarks, tbviolationreport.evidence, tbviolationreport.status)
    VALUES (p_SRCode, p_StaffID, p_ViolationTypeID, p_ViolationDate, p_ViolationTime, p_Remarks, p_Evidence, p_Status);
END$$

DROP PROCEDURE IF EXISTS `SP_StudentAppeal`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_StudentAppeal` (IN `id` INT, IN `date` DATE, IN `message` VARCHAR(255))   INSERT INTO tbappeal (violationid, date, appeal)
VALUES (id, date, message)$$

DROP PROCEDURE IF EXISTS `SP_StudentViolationCarousel`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_StudentViolationCarousel` (IN `id` INT)   SELECT 
	tbviolationreport.violationid,
    tbviolationtypes.violationame,
    tbviolationtypes.violationlevel,
    tbviolationreport.violationdate,
    tbviolationreport.violationtime,
    tbviolationreport.remarks,
    tbviolationreport.status,
    tbviolationreport.evidence
   
FROM tbviolationreport
INNER JOIN tbviolationtypes ON tbviolationreport.violationtypeid = tbviolationtypes.violationtypeid
INNER JOIN tb_studinfo ON tbviolationreport.studid = tb_studinfo.studid

WHERE tb_studinfo.studid = id$$

DROP PROCEDURE IF EXISTS `SP_StudentViolationTypeCounter`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_StudentViolationTypeCounter` (IN `id` INT)   SELECT
	SUM(CASE WHEN ViolationLevel = 'Minor' THEN 1 ELSE 0 END) AS MinorViolations,
	SUM(CASE WHEN ViolationLevel = 'Major' THEN 1 ELSE 0 END) AS MajorViolations
FROM
	tbviolationtypes
INNER JOIN tbviolationreport ON tbviolationtypes.violationtypeid = tbviolationreport.violationtypeid
INNER JOIN tb_studinfo ON tbviolationreport.studid = tb_studinfo.studid

WHERE
	tb_studinfo.studid = id$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbadminaccount`
--

DROP TABLE IF EXISTS `tbadminaccount`;
CREATE TABLE IF NOT EXISTS `tbadminaccount` (
  `adminid` int NOT NULL AUTO_INCREMENT,
  `empid` int NOT NULL,
  `passwordencrypted` varchar(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  PRIMARY KEY (`adminid`),
  KEY `empid_fk_adminaccount` (`empid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbadminaccount`
--

INSERT INTO `tbadminaccount` (`adminid`, `empid`, `passwordencrypted`, `username`) VALUES
(1, 1, '$2y$10$n0pZWJxXGQUkTZpOevB5/u48DIBglIqgp3zJk7CREuGtZ7fyjS3MO', 'aguila');

-- --------------------------------------------------------

--
-- Table structure for table `tbappeal`
--

DROP TABLE IF EXISTS `tbappeal`;
CREATE TABLE IF NOT EXISTS `tbappeal` (
  `appealid` int NOT NULL AUTO_INCREMENT,
  `violationid` int NOT NULL,
  `date` date NOT NULL,
  `appeal` varchar(255) NOT NULL,
  PRIMARY KEY (`appealid`),
  KEY `violationid_fk_appeal` (`violationid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbappeal`
--

INSERT INTO `tbappeal` (`appealid`, `violationid`, `date`, `appeal`) VALUES
(1, 1, '2023-11-20', 'Hi');

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
-- Table structure for table `tbstudentaccount`
--

DROP TABLE IF EXISTS `tbstudentaccount`;
CREATE TABLE IF NOT EXISTS `tbstudentaccount` (
  `userid` int NOT NULL AUTO_INCREMENT,
  `studid` int NOT NULL,
  `passwordencrypted` varchar(255) NOT NULL,
  PRIMARY KEY (`userid`),
  KEY `studid_fk_studentaccount` (`studid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbstudentaccount`
--

INSERT INTO `tbstudentaccount` (`userid`, `studid`, `passwordencrypted`) VALUES
(3, 14, '$2y$10$n0pZWJxXGQUkTZpOevB5/u48DIBglIqgp3zJk7CREuGtZ7fyjS3MO'),
(6, 13, '$2y$10$n0pZWJxXGQUkTZpOevB5/u48DIBglIqgp3zJk7CREuGtZ7fyjS3MO');

-- --------------------------------------------------------

--
-- Table structure for table `tbstudentdepartment`
--

DROP TABLE IF EXISTS `tbstudentdepartment`;
CREATE TABLE IF NOT EXISTS `tbstudentdepartment` (
  `course` varchar(255) NOT NULL,
  `department` varchar(100) NOT NULL,
  PRIMARY KEY (`course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbstudentdepartment`
--

INSERT INTO `tbstudentdepartment` (`course`, `department`) VALUES
('BA Communication', 'College of Arts and Sciences'),
('BS Computer Science', 'College of Informatics and Computing Sciences'),
('BS Information Techonlogy', 'College of Informatics and Computing Sciences');

-- --------------------------------------------------------

--
-- Table structure for table `tbviolationreport`
--

DROP TABLE IF EXISTS `tbviolationreport`;
CREATE TABLE IF NOT EXISTS `tbviolationreport` (
  `violationid` int NOT NULL AUTO_INCREMENT,
  `studid` int NOT NULL,
  `empid` int NOT NULL,
  `violationtypeid` int NOT NULL,
  `violationdate` date NOT NULL,
  `violationtime` time NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `evidence` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`violationid`),
  KEY `studid_fk_violationreport` (`studid`),
  KEY `empid_fk_violationreport` (`empid`),
  KEY `violationtypeid_fk_violationreport` (`violationtypeid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbviolationreport`
--

INSERT INTO `tbviolationreport` (`violationid`, `studid`, `empid`, `violationtypeid`, `violationdate`, `violationtime`, `remarks`, `evidence`, `status`) VALUES
(1, 14, 1, 2, '2023-11-07', '08:04:10', 'Three- to five-day suspension (3-5)', '6550d16d20d71.jpg', 'Done'),
(3, 14, 1, 6, '2023-11-21', '10:15:00', 'Written Reprimand', '655c12b8d3ec9.jpg', 'Done');

-- --------------------------------------------------------

--
-- Table structure for table `tbviolationtypes`
--

DROP TABLE IF EXISTS `tbviolationtypes`;
CREATE TABLE IF NOT EXISTS `tbviolationtypes` (
  `violationtypeid` int NOT NULL AUTO_INCREMENT,
  `violationame` varchar(100) NOT NULL,
  `violationlevel` varchar(20) NOT NULL,
  `firstoffense` varchar(255) NOT NULL,
  `secondoffense` varchar(255) NOT NULL,
  `thirdoffense` varchar(255) NOT NULL,
  PRIMARY KEY (`violationtypeid`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbviolationtypes`
--

INSERT INTO `tbviolationtypes` (`violationtypeid`, `violationame`, `violationlevel`, `firstoffense`, `secondoffense`, `thirdoffense`) VALUES
(1, 'Intoxication of Alcohol', 'Major', 'Three- to five-day suspension (3-5)', 'Five- to seven-day suspension (5-7), may include Re-admission Probation', 'Seven- to nine-day suspension (7-9), may include Non-readmission'),
(2, 'Smoking', 'Major', 'Three- to five-day suspension (3-5)\r\n', 'Five- to seven-day suspension (5-7), may include Re-admission Probation', 'Seven- to nine-day suspension (7-9), may include Non-readmission '),
(3, 'Gambling', 'Major', 'Three- to five-day suspension (3-5)', 'Five- to seven-day suspension (5-7), may include Re-admission Probation', 'Seven- to nine-day suspension (7-9), may include Non-readmission '),
(4, 'Cutting Class', 'Minor', 'Written Warning', 'Written Reprimand', 'One-day suspension'),
(5, 'Public Display of Affection', 'Minor', 'Written Reprimand', 'Written Reprimand to One-day suspension', 'Two-day suspension may include Disciplinary Probation\r\n'),
(6, 'Improper Uniform / Dress Code', 'Minor', 'Written Reprimand', 'Written Reprimand to One-day suspension', 'Two-day suspension, may include Disciplinary Probation\r\n'),
(7, 'Misbehavior', 'Minor', 'Written Reprimand', 'Written Reprimand to One-day suspension', 'Two-day suspension, may include Disciplinary Probation\r\n'),
(8, 'Provocation to a fight ', 'Minor', 'Written Reprimand', 'Written Reprimand to One-day suspension', 'Two-day suspension, may include Disciplinary Probation\r\n'),
(9, 'Disturbance', 'Minor', 'Written Reprimand', 'Written Reprimand to One-day suspension', 'Two-day suspension, may include Disciplinary Probation\r\n'),
(10, 'Unauthorized removals', 'Minor', 'Written Reprimand', 'Written Reprimand to One-day suspension', 'Two-day suspension, may include Disciplinary Probation\r\n'),
(11, 'Breaking into a class', 'Minor', 'Written Reprimand', 'Written Reprimand to One-day suspension', 'Two-day suspension, may include Disciplinary Probation\r\n'),
(12, 'Membership to unrecognized organization', 'Major', 'Three- to six-day suspension (3-6)', 'Six- to eight-day suspension (6-8), may include \r\nRe-admission Probation', 'Eight- to ten-day suspension (8-10), may \r\ninclude Non-readmission'),
(13, 'Destructive acts', 'Major', 'Four- to eight-day suspension (4-8)', 'Eight- to ten-day suspension (8-10), may include Re-admission Probation', 'Ten- to twelve-day suspension (10-12), may include Non-readmission'),
(14, 'Bringing bladed objects', 'Major', 'Four- to eight-day suspension (4-8)', 'Eight- to ten-day suspension (8-10), may include Re-admission Probation', 'Ten- to twelve-day suspension (10-12), may include Non-readmission'),
(15, 'Acts with slight physical injury', 'Major', 'Four- to eight-day suspension (4-8)', 'Eight- to ten-day suspension (8-10), may include Re-admission Probation', 'Ten- to twelve-day suspension (10-12), may include Non-readmission'),
(16, 'Bribery', 'Major', 'Six- to ten-day suspension (6-10), may include Non-readmission', 'Ten- to twelve-day suspension (10-12), may include Non-readmission', 'Twelve- to fourteen-day suspension (12-14), may include Non-readmission\r\n'),
(17, 'Acts with serious physical injury', 'Major', 'Eight- to twelve-day suspension (8-12), may include Non-readmission', 'Twelve- fourteen-day suspension (12-14), may include Non-readmission', 'Fourteen- to sixteen-day suspension (14-16), may include Non-readmission'),
(18, 'Obstructive Protesting', 'Major', 'Ten to fourteen day suspension (10 -14), may \r\ninclude Non-readmission', 'Fifteen to seventeen day suspension (15-17), may include Non-readmission', 'Eighteen to twenty day suspension (18-20), may include Non-readmission '),
(19, 'Academic dishonesty', 'Major', 'Grade of zero (0) in the test/exam/requirement and one-day (1) suspension', 'Grade of zero (0) in the test/exam/requirement and one-day (1) suspension', 'Grade of zero (0) in the test/exam/requirement and one-day (1) suspension');

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
-- Constraints for table `tbadminaccount`
--
ALTER TABLE `tbadminaccount`
  ADD CONSTRAINT `empid_fk_adminaccount` FOREIGN KEY (`empid`) REFERENCES `tbempinfo` (`empid`);

--
-- Constraints for table `tbappeal`
--
ALTER TABLE `tbappeal`
  ADD CONSTRAINT `violationid_fk_appeal` FOREIGN KEY (`violationid`) REFERENCES `tbviolationreport` (`violationid`);

--
-- Constraints for table `tbstudentaccount`
--
ALTER TABLE `tbstudentaccount`
  ADD CONSTRAINT `studid_fk_studentaccount` FOREIGN KEY (`studid`) REFERENCES `tb_studinfo` (`studid`);

--
-- Constraints for table `tbviolationreport`
--
ALTER TABLE `tbviolationreport`
  ADD CONSTRAINT `empid_fk_violationreport` FOREIGN KEY (`empid`) REFERENCES `tbempinfo` (`empid`),
  ADD CONSTRAINT `studid_fk_violationreport` FOREIGN KEY (`studid`) REFERENCES `tb_studinfo` (`studid`),
  ADD CONSTRAINT `violationtypeid_fk_violationreport` FOREIGN KEY (`violationtypeid`) REFERENCES `tbviolationtypes` (`violationtypeid`);

--
-- Constraints for table `tb_studinfo`
--
ALTER TABLE `tb_studinfo`
  ADD CONSTRAINT `course_fk_studinfo` FOREIGN KEY (`course`) REFERENCES `tbstudentdepartment` (`course`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
