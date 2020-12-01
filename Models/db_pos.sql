-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 01, 2020 at 11:14 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `PK_ID` int(11) NOT NULL,
  `CustomerName` varchar(50) NOT NULL,
  `Address` varchar(300) DEFAULT NULL,
  `PostalCode` varchar(50) DEFAULT NULL,
  `Landmark` varchar(50) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `Province` varchar(50) DEFAULT NULL,
  `Phone` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Fax` varchar(50) DEFAULT NULL,
  `Mobile` varchar(50) DEFAULT NULL,
  `Note` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`PK_ID`, `CustomerName`, `Address`, `PostalCode`, `Landmark`, `City`, `Province`, `Phone`, `Email`, `Fax`, `Mobile`, `Note`) VALUES
(1, 'Sultan Ali Sethi', '143/03', '75190', 'PAF Base', 'Karachi', 'Sindh', '03030303', 'ali@mail.com', '9292929923', '030300303', 'extra cheese'),
(2, 'Umar Qasim', '873/03', '8393', 'Qaid Mazar', 'Karachi', 'Sindh', '03030303', 'umar@mail.com', '9292929923', '030300303', 'extra buns'),
(10, 'Muhammad Harris Malik', '140/05  Main waterpump, Ibrahim haidri, Korangi Creek', '94942992', '', 'Karachi', 'Sindh', '1235467', 'harris@mail.com', '456897654678', '12345678', 'Examples and usage guidelines for form control styles, layout options, and custom components'),
(11, 'Abdulla Haroon', '143/03 Shaheen Apt, Gulshan-e-Iqbal', '79283', '', 'Karachi', 'Sindh', '0300303033', 'abdullah@mail.com', '6789678', '03030303003', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `PK_ID` int(11) NOT NULL,
  `ProductCode` varchar(50) NOT NULL,
  `ProductName` varchar(50) NOT NULL,
  `Price` int(11) DEFAULT 0,
  `FK_Category` int(11) DEFAULT NULL,
  `FK_Company` int(11) DEFAULT NULL,
  `Image` varchar(100) DEFAULT NULL,
  `Features` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`PK_ID`, `ProductCode`, `ProductName`, `Price`, `FK_Category`, `FK_Company`, `Image`, `Features`) VALUES
(1, 'ABCD12', 'iPhone', 30000, 6, 3, 'phone.jpg', 'iphone iphone hai');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_productcategory`
--

CREATE TABLE `tbl_productcategory` (
  `PK_ID` int(11) NOT NULL,
  `CategoryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_productcategory`
--

INSERT INTO `tbl_productcategory` (`PK_ID`, `CategoryName`) VALUES
(3, 'Stationary'),
(5, 'Toys'),
(6, 'Smartphones');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_productcompany`
--

CREATE TABLE `tbl_productcompany` (
  `PK_ID` int(11) NOT NULL,
  `CompanyName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_productcompany`
--

INSERT INTO `tbl_productcompany` (`PK_ID`, `CompanyName`) VALUES
(2, 'Casio'),
(3, 'Apple');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchased`
--

CREATE TABLE `tbl_purchased` (
  `PK_ID` int(11) NOT NULL,
  `FK_ProductPurchased` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `PK_ID` int(11) NOT NULL,
  `FK_Product` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `PK_ID` int(11) NOT NULL,
  `FullName` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `ContactNumber` varchar(50) DEFAULT NULL,
  `Password` varchar(500) NOT NULL,
  `FK_UserType` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`PK_ID`, `FullName`, `Email`, `ContactNumber`, `Password`, `FK_UserType`) VALUES
(1, 'Shehzad Ahmed', 'sh@mail.com', '030303030', '$2y$10$cq0iBIqWpGyA25TqFAbZiu22W6BsfLgs.qadOzTTZd36LPNRaM0pW', 1),
(2, 'Sarang Saif', 'sefi@mail.com', '030303030', '$2y$10$SFU35mV1CFHsfYOVBL/yXuYrbw6dO2pK39UZq47hHV1IYZbl2dyAy', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usertype`
--

CREATE TABLE `tbl_usertype` (
  `PK_ID` int(11) NOT NULL,
  `UserTypeName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_usertype`
--

INSERT INTO `tbl_usertype` (`PK_ID`, `UserTypeName`) VALUES
(1, 'Admin'),
(2, 'Manager'),
(3, 'Employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`PK_ID`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`PK_ID`),
  ADD KEY `FK_Category` (`FK_Category`),
  ADD KEY `FK_Company` (`FK_Company`);

--
-- Indexes for table `tbl_productcategory`
--
ALTER TABLE `tbl_productcategory`
  ADD PRIMARY KEY (`PK_ID`);

--
-- Indexes for table `tbl_productcompany`
--
ALTER TABLE `tbl_productcompany`
  ADD PRIMARY KEY (`PK_ID`);

--
-- Indexes for table `tbl_purchased`
--
ALTER TABLE `tbl_purchased`
  ADD PRIMARY KEY (`PK_ID`),
  ADD KEY `FK_ProductPurchased` (`FK_ProductPurchased`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`PK_ID`),
  ADD KEY `FK_Product` (`FK_Product`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`PK_ID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `FK_UserType` (`FK_UserType`);

--
-- Indexes for table `tbl_usertype`
--
ALTER TABLE `tbl_usertype`
  ADD PRIMARY KEY (`PK_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `PK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `PK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_productcategory`
--
ALTER TABLE `tbl_productcategory`
  MODIFY `PK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_productcompany`
--
ALTER TABLE `tbl_productcompany`
  MODIFY `PK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_purchased`
--
ALTER TABLE `tbl_purchased`
  MODIFY `PK_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `PK_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `PK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_usertype`
--
ALTER TABLE `tbl_usertype`
  MODIFY `PK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `FK_Category` FOREIGN KEY (`FK_Category`) REFERENCES `tbl_productcategory` (`PK_ID`),
  ADD CONSTRAINT `FK_Company` FOREIGN KEY (`FK_Company`) REFERENCES `tbl_productcompany` (`PK_ID`);

--
-- Constraints for table `tbl_purchased`
--
ALTER TABLE `tbl_purchased`
  ADD CONSTRAINT `FK_ProductPurchased` FOREIGN KEY (`FK_ProductPurchased`) REFERENCES `tbl_product` (`PK_ID`);

--
-- Constraints for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD CONSTRAINT `FK_Product` FOREIGN KEY (`FK_Product`) REFERENCES `tbl_product` (`PK_ID`);

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `FK_UserType` FOREIGN KEY (`FK_UserType`) REFERENCES `tbl_usertype` (`PK_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
