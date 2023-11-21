CREATE DATABASE IF NOT EXISTS db_ba3102;
USE db_ba3102;

-- Set SQL mode and other configurations
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `tb_empinfo`
--
-- Create the employee information table
CREATE TABLE IF NOT EXISTS `tb_empinfo` (
  `empid` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(25) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `department` varchar(30) NOT NULL,
  PRIMARY KEY (`empid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Insert data into the employee information table
INSERT INTO `tb_empinfo` (`empid`, `lastname`, `firstname`, `department`) VALUES
(1, 'aguila', 'nina', 'cics');

-- Create the admin table with a foreign key reference to tb_empinfo
CREATE TABLE admin (
  id int(10) NOT NULL AUTO_INCREMENT,
  username varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  password varchar(50) NOT NULL,
  empid int(11),
  PRIMARY KEY (id),
  FOREIGN KEY (`empid`) REFERENCES `tb_empinfo` (`empid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Insert data into the admin table
INSERT INTO admin (id, username, email, password, empid) VALUES
(1, 'admin', 'admin123@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1);

-- Commit the transaction
COMMIT;

-- --------------------------------------------------------

--
-- Table structure for table `tb_studinfo`
--

CREATE TABLE IF NOT EXISTS `tb_studinfo` (
  `studid` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(25) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `course` varchar(20) NOT NULL,
  PRIMARY KEY (`studid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_studinfo`
--

INSERT INTO `tb_studinfo` (`studid`, `lastname`, `firstname`, `course`) VALUES
(1, 'parker', 'peter', 'bsit'),
(2, 'kent', 'clark', 'bscs');



-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE menu (
  food_id int(11) NOT NULL AUTO_INCREMENT,
  available_menu varchar(100) NOT NULL,
  food_desc varchar(100) DEFAULT NULL,
  price decimal(4,2) DEFAULT NULL,
  image varchar(100) NOT NULL,
  PRIMARY KEY (food_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO menu (food_id, available_menu, food_desc, price, image) VALUES
(20, 'Pancit Guisado', 'Regular', '60.00', '64649f7f74d36.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order_manager`
--

CREATE TABLE order_manager (
  Order_Id int(100) NOT NULL AUTO_INCREMENT,
  Full_Name varchar(100) NOT NULL,
  Phone_No bigint(100) NOT NULL,
  Address varchar(100) NOT NULL,
  Pay_Mode varchar(100) NOT NULL,
  status varchar(50) DEFAULT NULL,
  PRIMARY KEY (Order_Id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_manager`
--

INSERT INTO order_manager (Order_Id, Full_Name, Phone_No, Address, Pay_Mode, status) VALUES
(7, 'new customer', 123456, 'new address', 'COD', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE order_table (
  Order_Id int(100) NOT NULL,
  ordered_menu varchar(100) NOT NULL,
  price int(100) NOT NULL,
  quantity int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_table`
--

INSERT INTO order_table (Order_Id, ordered_menu, price, quantity) VALUES
(3, 'Pancit Guisado', 60, 1),
(3, 'Lomi', 60, 1),
(1, 'Pancit Guisado', 60, 1),
(1, 'Lomi', 60, 1),
(3, 'Pancit Guisado', 60, 1),
(4, 'Pancit Guisado', 60, 1),
(5, 'Pancit Guisado', 60, 2),
(6, 'Pancit Guisado', 60, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE users (
  id int(10) NOT NULL AUTO_INCREMENT,
  username varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  password varchar(100) NOT NULL,
  studid int(11),
  PRIMARY KEY (id),
  FOREIGN KEY (`studid`) REFERENCES `tb_studinfo` (`studid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO users (id, username, email, password, studid) VALUES
(1, 'user', 'user123@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 2);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
