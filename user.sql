-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2021 at 05:04 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `userid` varchar(80) NOT NULL,
  `productname` varchar(70) NOT NULL,
  `quantity` float NOT NULL,
  `totalprice` decimal(50,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `userid` varchar(80) NOT NULL,
  `productname` varchar(80) NOT NULL,
  `quantity` float NOT NULL,
  `totalprice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `userid`, `productname`, `quantity`, `totalprice`) VALUES
(1, 'Vivek Ughade', 'mango', 1, 100);

-- --------------------------------------------------------

--
-- Table structure for table `fila`
--

CREATE TABLE `fila` (
  `Name` varchar(50) NOT NULL,
  `Address` varchar(80) NOT NULL,
  `mobile` bigint(60) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fila`
--

INSERT INTO `fila` (`Name`, `Address`, `mobile`, `email`, `password`) VALUES
('Vidhya Ughade', 'House No.12, Second Floor, Senior LIG Harshwardhan Nagar Near Manit,Mata Mandir,', 919174075206, 'vivekrughade@gmail.com', '12345'),
('Vivek Ughade', 'E-1,13,Bhansali Nagar, (Satnoor)m.p.', 6265101368, 'vivekughade11@gmail.com', 'vivek@123'),
('baban', 'bepl satnoor', 6266461973, 'vidyatrinity95@gmail.com', '5566');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productname` varchar(50) NOT NULL,
  `productprice` float NOT NULL,
  `productquantity` bigint(20) NOT NULL,
  `productimage` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productname`, `productprice`, `productquantity`, `productimage`) VALUES
('apple', 100, 150, 'uploads/eco3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productid` int(11) NOT NULL,
  `productname` varchar(80) NOT NULL,
  `productprice` float NOT NULL,
  `quantity` float NOT NULL,
  `productimage` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productid`, `productname`, `productprice`, `quantity`, `productimage`) VALUES
(1, 'mango', 100, 3, 'uploads/eco2.jpg'),
(2, 'apple', 100, 4, 'uploads/apple.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productid`),
  ADD UNIQUE KEY `productid` (`productname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
