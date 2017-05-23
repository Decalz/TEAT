-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2016 at 06:57 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teat`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `Id` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Price` varchar(11) NOT NULL,
  `Image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Price` varchar(10) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Type` varchar(20) NOT NULL,
  `Tags` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Id`, `Name`, `Description`, `Price`, `Image`, `Type`, `Tags`) VALUES
(16, 'Ruffles - BBQ', 'BBQ Taste', '2.97', 'img/rufflesbbq.jpg', 'Food', 'Chips, Ruffles'),
(17, '7 Days - Cocoa', 'Cocoa Taste', '1.95', 'img/7cocoa.jpg', 'Food', 'Croissant, 7Days'),
(15, 'Ruffles - Salt', 'Salt taste', '2.97', 'img/rufflessalt.jpg', 'Food', 'Chips, Ruffles'),
(14, 'Lays - Cheese', 'Cheese Taste', '2.99', 'img/layscheese.jpg', 'Food', 'Chips, Lays'),
(1, 'Lays - Classic', 'Classic taste', '2.99', 'img/laysclassic.jpg', 'Food', 'Chips, Lays'),
(12, 'Lays - Olive Oil', 'Olive Oil taste', '2.99', 'img/laysolive.jpg', 'Food', 'Chips, Lays'),
(13, 'Lays - Barbeque', 'Barbeque Taste', '2.99', 'img/laysbbq.jpg', 'Food', 'Chips, Lays'),
(18, 'Coca Cola', 'Classic Cola', '1.98', 'img/cola.jpg', 'Drink', 'Cola, Soda'),
(19, 'Pepsi', 'Classic Pepsi', '1.79', 'img/pepsi.jpg', 'Drink', 'Pepsi, Soda'),
(20, 'Devin', 'Normal Water', '0.99', 'img/devin.jpg', 'Drink', 'Water, Devin'),
(21, 'Zagorka', 'Beer', '2.99', 'img/zagorka.jpg', 'Drink', 'Alcoholic, Beer, Zagorka'),
(22, 'Cottonelle', 'Toilet Paper', '3.95', 'img/cottonelle.jpg', 'Other', 'Toilet, Cottonelle'),
(23, 'Dove - Classic', 'Classic soap bar', '1.39', 'img/dove.jpg', 'Other', 'Soap, Washing, Dove'),
(24, 'Clorox', 'Bleach', '2.39', 'img/bleach.jpg', 'Other', 'Clorox, Bleach, Cleaning'),
(25, 'Head & Shoulders - Classic', 'Classic Head & Shoulders', '2.69', 'img/head.jpg', 'Other', 'Head, Shoulders, Washing');

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `PromoID` int(11) NOT NULL,
  `P_Name` varchar(20) NOT NULL,
  `P_Tags` varchar(255) NOT NULL,
  `P_Function` varchar(255) NOT NULL,
  `P_Description` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Settings` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Password`, `Email`, `Settings`) VALUES
(1, 'admin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'teatadmin@gmail.com', 'root, read, write');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Id` (`Id`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`PromoID`),
  ADD UNIQUE KEY `P_Name` (`P_Name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `UserID` (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `PromoID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
