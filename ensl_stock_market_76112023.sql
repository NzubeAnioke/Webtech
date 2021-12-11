-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2021 at 10:16 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ensl_stock_market_76112023`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE DATABASE `ensl_stock_market_76112023`;

USE ensl_stock_market_76112023;

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `person_id` int(11) DEFAULT NULL,
  `StockID` int(11) NOT NULL,
  `companyname` varchar(20) DEFAULT NULL,
  `stock_name` varchar(20) DEFAULT NULL,
  `Quantity_bought` int(11) DEFAULT NULL,
  `Price` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `person_id`, `StockID`, `companyname`, `stock_name`, `Quantity_bought`, `Price`) VALUES
(672, NULL, 1, 'Microsoft', 'MSFT', 40, '120');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `person_id` int(11) NOT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `Tel` varchar(20) DEFAULT NULL,
  `p_password` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`person_id`, `fname`, `lname`, `email`, `Tel`, `p_password`) VALUES
(1, 'Mary', 'Richard', 'mary@wes.com', '024502387', '1234ab'),
(2, 'John', 'Michael', 'John@wes.com', '053265105', '345we'),
(3, 'Ames', 'Robert', 'ames@wes.com', '093601719', '568ok'),
(4, 'Patricia', 'David', 'Pat@wes.com', '10560897', '1209er'),
(5, 'Linda', 'Micheal', 'linda@wes.com', '091448409', '478wr'),
(6, 'Barbara', 'Daniel', 'babs@wes.com', '091448409', '368ty'),
(7, 'Thomas', 'Bob', 'Tom@wes.com', '071045519', 'T7y55'),
(8, 'Lisa', 'Karen', 'lisa@wes.com', '098534728', 't567ll'),
(9, 'Joseph', 'Charles', 'Josh@wes.com', '09965003', 'tryu89'),
(10, 'Ryan', 'Jacob', 'Ryan@wes.com', '01045519', 'gtui90'),
(11, 'Nzube', 'Anioke', 'nzube.anioke@ashesi.edu.gh', '234567', '827ccb0eea8a706c4c34');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `StockID` int(11) NOT NULL,
  `companyname` varchar(20) DEFAULT NULL,
  `stock_name` varchar(20) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Price` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`StockID`, `companyname`, `stock_name`, `Quantity`, `Price`) VALUES
(1, 'Microsoft', 'MSFT', 400, '120'),
(2, 'Google', ' GOOG', 540, '230'),
(3, 'Libra', 'LIB', 320, '45'),
(4, 'MasterCard', 'MCF', 800, '9'),
(5, 'Cisco', 'CIS', 230, '481'),
(6, 'Meta', 'META', 1000, '340'),
(7, 'ALU', 'ALUX', 2300, '39'),
(8, 'BOSCO', 'BOS', 509, '25'),
(9, 'Dangote', 'DANG', 340, '13'),
(10, 'Chevrolet', 'CHEV', 560, '45'),
(11, 'Compaq', 'COQ', 2457, '120'),
(12, 'Delta', 'DEL', 23480, '87'),
(13, 'ESPN', 'EX', 1278, '890'),
(14, 'Firestone', 'FSE', 2560, '25'),
(15, 'LG', 'LG', 7600, '99'),
(16, 'Lufthansa', 'LH', 1790, '89'),
(17, 'Mustek', 'MST', 1479, '46'),
(18, 'Nintendo', 'NTO', 29000, '13'),
(19, 'Hyundai', 'HYN', 36910, '159');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `TransactionID` int(11) NOT NULL,
  `TransactionDate` date DEFAULT NULL,
  `TransactionTime` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`TransactionID`, `TransactionDate`, `TransactionTime`) VALUES
(1, '2020-12-09', '08:00:00'),
(2, '2021-11-07', '08:05:00'),
(3, '2019-10-09', '10:40:00'),
(4, '2021-12-05', '08:23:00'),
(5, '2020-08-08', '11:10:00'),
(6, '2021-02-06', '13:10:00'),
(7, '2019-01-17', '15:40:00'),
(8, '2021-01-06', '15:40:00'),
(9, '2020-02-18', '16:05:00'),
(10, '2021-04-02', '16:55:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `person_id` (`person_id`),
  ADD KEY `StockID` (`StockID`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`person_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`StockID`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`TransactionID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1465;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `person_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `StockID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `TransactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `person` (`person_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`StockID`) REFERENCES `stock` (`StockID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
