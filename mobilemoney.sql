-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 17, 2024 at 11:03 AM
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
-- Database: `mobilemoney`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `clientId` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `clientName` varchar(20) NOT NULL,
  `openDate` date NOT NULL,
  `Amountugx` int DEFAULT NULL,
  `Amountusd` int DEFAULT NULL,
  PRIMARY KEY (`clientId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`clientId`, `clientName`, `openDate`, `Amountugx`, `Amountusd`) VALUES
('0789567892', 'Walugembe', '2024-06-17', NULL, 500),
('0777046792', 'Jesca', '2024-04-09', NULL, 30000),
('0701132838', 'Wallzray', '2024-06-17', 100000, NULL),
('0709231916', 'Kalembe', '2024-04-16', NULL, 12000);

-- --------------------------------------------------------

--
-- Table structure for table `clientstxn`
--

DROP TABLE IF EXISTS `clientstxn`;
CREATE TABLE IF NOT EXISTS `clientstxn` (
  `Txndate` date NOT NULL,
  `clientName` varchar(40) NOT NULL,
  `Currency` varchar(20) NOT NULL,
  `Services` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Amountugx` int NOT NULL,
  `Amountusd` int NOT NULL,
  `Timein` time(2) NOT NULL,
  `Outtime` time(2) NOT NULL,
  `Profit` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `clientstxn`
--

INSERT INTO `clientstxn` (`Txndate`, `clientName`, `Currency`, `Services`, `Amountugx`, `Amountusd`, `Timein`, `Outtime`, `Profit`) VALUES
('2024-06-17', '', 'Dollar', 'Deposit', 0, 20, '00:00:00.00', '00:00:00.00', 0),
('2024-06-17', '', 'Dollar', 'Deposit', 0, 20, '00:00:00.00', '00:00:00.00', 0),
('2024-06-17', '', 'Dollar', 'Deposit', 0, 20, '00:00:00.00', '00:00:00.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `Txndate` date DEFAULT NULL,
  `customerNo` varchar(20) NOT NULL,
  `Customername` varchar(100) NOT NULL,
  `Provider` varchar(20) NOT NULL,
  `Service` varchar(20) NOT NULL,
  `Currency` varchar(20) NOT NULL,
  `Amount` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`Txndate`, `customerNo`, `Customername`, `Provider`, `Service`, `Currency`, `Amount`) VALUES
('2024-06-17', '0701132838', '', 'Airtel', 'Deposit', 'UGX', 10000),
('2024-06-17', '0765870450', '', 'Zaad', 'Deposit', 'UGX', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `Userid` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Userpassword` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`Userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Userid`, `Username`, `Userpassword`) VALUES
('$Admin', 'Admin', 'Admin124'),
('0789435782', 'Meyers', 'Forever22'),
('0702360242', 'joseph', '123'),
('702360242', 'josepher', '123'),
('0702789437', 'jose12', 'Jacewallz21');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
