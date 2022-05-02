-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2022 at 02:30 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_PK` int(2) NOT NULL,
  `SKU` varchar(5) NOT NULL,
  `unit_price` int(10) NOT NULL,
  `sp_on_SKU` int(2) NOT NULL,
  `discount_by_percentage` float NOT NULL,
  `discount_by_item` varchar(10) NOT NULL,
  `publish_item` int(2) NOT NULL DEFAULT 0,
  `tax_included` int(2) NOT NULL DEFAULT 0,
  `inStockQuantity` int(10) NOT NULL,
  `createdBy` timestamp NOT NULL DEFAULT current_timestamp(),
  `LastModifiedBy` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_PK`, `SKU`, `unit_price`, `sp_on_SKU`, `discount_by_percentage`, `discount_by_item`, `publish_item`, `tax_included`, `inStockQuantity`, `createdBy`, `LastModifiedBy`) VALUES
(1, 'A', 50, 3, 13.33, '0', 0, 0, 12, '2022-05-02 12:29:34', '2022-05-02 12:29:34'),
(2, 'B', 30, 2, 25, '0', 0, 0, 56, '2022-05-02 12:29:34', '2022-05-02 12:29:34'),
(3, 'C', 20, 2, 5, '0', 0, 0, 77, '2022-05-02 12:29:34', '2022-05-02 12:29:34'),
(4, 'D', 15, 0, 0, '1', 0, 0, 70, '2022-05-02 12:29:34', '2022-05-02 12:29:34'),
(5, 'E', 5, 0, 0, '0', 0, 0, 0, '2022-05-02 12:29:34', '2022-05-02 12:29:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_PK`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_PK` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
