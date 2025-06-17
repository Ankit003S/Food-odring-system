-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2024 at 04:54 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fos`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `AdminUserName` varchar(50) NOT NULL,
  `AdminEmail` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `AdminUserName`, `AdminEmail`, `password`) VALUES
(1, 'Neha Sahu', 'neha@gmail.com', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartID` int(11) NOT NULL,
  `userEmail` varchar(50) NOT NULL,
  `array` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartID`, `userEmail`, `array`) VALUES
(7, 'as@gmail.com', ''),
(8, 'ankit@gmail.com', '12');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `CustomerID` int(11) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CustomerID`, `FirstName`, `Email`, `Password`) VALUES
(31, 'as', 'as@gmail.com', '$2y$10$B6B/ZdVKQyk/Kiq0hZgHzuP62QXflC3u7tXAB1atPi264pTrgoNHO'),
(32, 'Ankit', 'ankit@gmail.com', '$2y$10$4aqP8ziJic5YR4ziW.v/uutlVR5jPdies9fdQoAsN9fH0xbHFT.MK');

-- --------------------------------------------------------

--
-- Table structure for table `menuitems`
--

CREATE TABLE `menuitems` (
  `MenuItemID` int(11) NOT NULL,
  `RestaurantID` int(11) DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `Price` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menuitems`
--

INSERT INTO `menuitems` (`MenuItemID`, `RestaurantID`, `Name`, `Description`, `Price`) VALUES
(4, 1, 'Noodles', 'Noodles', 700),
(6, 1, 'Pancake', 'soma thing', 220),
(8, 1, 'Momo', 'Meda ki barfi', 100),
(9, 1, 'burger', 'Pavroti with salad', 44),
(10, 2, 'Egg Sandwich', 'Anda ka bana huva Sandwich', 20),
(12, 2, 'Cartun Sandwich', 'Loks like Cartun', 30),
(13, 2, 'Flying Sandwich', 'It Can Fly', 0),
(14, 2, 'veg Burger', 'You can\'t tall what is this Bager or Sandwich', 1),
(30, 3, 'Normal Momo', 'This is a normal momo', 50),
(31, 3, 'Tripal Momo', 'In this you will get three types of moo', 30),
(32, 3, 'noodles momo', 'This is not a momo', 2),
(33, 3, 'Chopal momo', '4 types of momo', 4),
(34, 4, 'Only kulcha', 'In this you will get Only kulcha', 7),
(35, 4, 'Thali kulcha', 'In this you will get full thali with kulcha', 80),
(36, 4, 'chola kulcha', 'You will have to cook your own chola kulcha', 10),
(37, 7, 'Paneer', 'Paneer', 85),
(38, 7, 'Paneer', 'paneer', 45);

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `OrderItemID` int(11) NOT NULL,
  `OrderID` int(11) DEFAULT NULL,
  `MenuItemID` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`OrderItemID`, `OrderID`, `MenuItemID`, `Quantity`) VALUES
(1, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `OrderDate` date NOT NULL,
  `TotalAmount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `CustomerID`, `OrderDate`, `TotalAmount`) VALUES
(1, 1, '0000-00-00', 222),
(2, 1, '2024-01-12', 10000000),
(3, 4, '2024-01-12', 0),
(4, 4, '2024-01-12', 20),
(5, 4, '2024-01-12', 100),
(6, 4, '2024-01-12', 100),
(7, 4, '2024-01-12', 30),
(8, 4, '0000-00-00', 20),
(9, 4, '2024-01-13', 320),
(10, 4, '2024-01-13', 30),
(11, 31, '2024-01-13', 0),
(12, 31, '2024-01-13', 144),
(13, 31, '2024-01-13', 244),
(14, 31, '2024-01-13', 100),
(15, 31, '2024-01-13', 100),
(16, 31, '2024-01-13', 100),
(17, 31, '2024-01-13', 100),
(18, 32, '2024-01-13', 10);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `ReportId` int(11) NOT NULL,
  `ReportDate` date NOT NULL,
  `sells` varchar(100) NOT NULL,
  `RestaurantId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`ReportId`, `ReportDate`, `sells`, `RestaurantId`) VALUES
(1, '2023-10-08', '4 momos', 1);

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `RestaurantID` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Address` text DEFAULT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`RestaurantID`, `Name`, `Address`, `Phone`, `Description`) VALUES
(1, 'Sahu Hotel', 'haldibadi chirimiri', '7845123697', 'Nestled in the heart of our bustling city, our restaurant offers a culinary experience that transcends         the ordinary. As you step through our welcoming doors'),
(2, 'Soni Sonar sandwiches (SSS)', 'saraipal, suni junction', '9988776655', 'Woldes best sandwiche on the raipur by one and only Piyoush soni.\r\n'),
(3, 'BCA Momo Vala', 'Lodi para granud', '9192', 'The grate Aman himself make momo for you!'),
(4, 'Mishra Kulche', 'Palloty collage ke samne ', '63636363', 'Best misras in the wold'),
(7, 'Rohan Panir vala', 'Lodi para kapa', '8969896989', 'Panir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartID`),
  ADD KEY `userID` (`userEmail`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustomerID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `menuitems`
--
ALTER TABLE `menuitems`
  ADD PRIMARY KEY (`MenuItemID`),
  ADD KEY `RestaurantID` (`RestaurantID`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`OrderItemID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`ReportId`),
  ADD KEY `RestaurantId` (`RestaurantId`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`RestaurantID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `menuitems`
--
ALTER TABLE `menuitems`
  MODIFY `MenuItemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `OrderItemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `ReportId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `RestaurantID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menuitems`
--
ALTER TABLE `menuitems`
  ADD CONSTRAINT `menuitems_ibfk_1` FOREIGN KEY (`RestaurantID`) REFERENCES `restaurants` (`RestaurantID`);

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`RestaurantId`) REFERENCES `restaurants` (`RestaurantID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
