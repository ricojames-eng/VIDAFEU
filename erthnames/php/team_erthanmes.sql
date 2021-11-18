-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2018 at 12:45 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `team_erthanmes`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(1) NOT NULL,
  `Fname` char(20) DEFAULT NULL,
  `Lname` char(20) DEFAULT NULL,
  `age` int(20) DEFAULT NULL,
  `branch_location` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `Fname`, `Lname`, `age`, `branch_location`) VALUES
(1, 'Rico', 'Quirante', 20, ' Candon City'),
(2, 'Nathan', 'Sabas', 20, ' San Fernando City'),
(3, 'Erwin', 'Flores', 19, ' San Fernando City'),
(4, 'Rayan', 'Dacumos', 21, ' Bacnotan La union'),
(5, 'Jio', 'almojera', 22, ' Bacnotan La union');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `brand`, `description`, `price`, `picture`) VALUES
(1, 'Honda underbone', 'RS150', 98000, '../images/rs150.png'),
(2, 'Kawasaki Sports Bike', 'Kawasaki Z1000', 999800, '../images/ninja.jpg'),
(3, 'Honda Sports Bike', 'Cbr 1000rr', 998000, '../images/cbr.jpg'),
(4, 'Yamaha', 'Mio 115', 76000, '../images/mios.jpg'),
(9, 'Yamaha Sports Bike', 'R1-YZF M 2018', 1080000, '../images/123.jpg'),
(10, 'Yamaha Sports Bike', 'R15 V3 ', 166000, '../images/1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(11) NOT NULL,
  `itemid` varchar(255) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `price` varchar(11) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `customerid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `cartid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `cartid`) VALUES
(1, '12'),
(2, '13'),
(3, '14'),
(7, '16'),
(9, '19'),
(10, '39'),
(11, '42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_picture`
--

CREATE TABLE `tbl_picture` (
  `id` int(11) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `pathpicture` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_picture`
--

INSERT INTO `tbl_picture` (`id`, `userid`, `pathpicture`) VALUES
(1, '1', '../images/rs150.png'),
(2, '4', '../images/ninja.jpg'),
(3, '3', '../images/cbr.jpg'),
(4, '8', '../images/mios.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `civilstatus` varchar(20) NOT NULL,
  `userlevel` varchar(50) NOT NULL,
  `birthdate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `fullname`, `address`, `contact`, `gender`, `civilstatus`, `userlevel`, `birthdate`) VALUES
(1, 'admin', 'admin', 'Rico James Quirante', 'Candon City', '09275474429', 'Male', 'Single', 'Administrator', '1998-07-20'),
(2, 'admin1', 'admin1', 'Jio Almojera', 'Bacnotan  La union', '09275474429', 'Male', 'Married', 'Administrator', '2017-11-21'),
(3, 'admin2', 'admin2', 'Erwin Flores', 'San Fernando City', '09275474429', 'Male', 'Married', 'Administrator', '2017-11-21'),
(9, 'admin3', 'admin3', 'Nathaniel Sabas', 'San Fernando City', '09178680239', 'Male', 'Widowed', 'Administrator', '2018-12-10'),
(10, 'admin4', 'admin4', 'Rayan Dacumos', 'Bacnotan La union', '09178680239', 'Male', 'Single', 'Administrator', '2018-12-18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_picture`
--
ALTER TABLE `tbl_picture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_picture`
--
ALTER TABLE `tbl_picture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
