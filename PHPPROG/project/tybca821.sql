-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2023 at 06:17 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tybca821`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL,
  `cname` varchar(20) NOT NULL,
  `cimage` varchar(400) NOT NULL,
  `cdesc` varchar(30) NOT NULL,
  `cprice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `cname`, `cimage`, `cdesc`, `cprice`) VALUES
(13, 'Burger', 'image/b3.png', ' Burger with Ham, Pineapple', 120),
(15, 'Momos', 'image/img4.jpg', 'Steamed Momos have lesser', 120),
(16, 'Pizza', 'image/img2.png', 'Pizza with chicken, Ham.', 200),
(18, 'Dosha', 'image/dosha.png', 'It is the most popular dish', 120),
(19, 'Gujrati Thali', 'image/Gujrati Thali.png', 'This is Gujrati Thali', 150),
(20, 'Pani', 'image/panipuri.png', '  PaniPuri is best', 30);

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE `tblorder` (
  `id` int(11) NOT NULL,
  `uemail_order_find` varchar(225) NOT NULL,
  `quantity` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `phno` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `address` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`id`, `uemail_order_find`, `quantity`, `fname`, `phno`, `email`, `address`) VALUES
(16, 'hello@gmail.com', 5, 'tirth', '1234567890', 'hello12@gmail.com', 'katargam'),
(17, 'rt123@gmail.com', 1, 'Rutvik Dhola', '4563791280', 'hello@gmail.com', 'kapodra'),
(18, 'rt123@gmail.com', 1, 'tirth', '6549138027', 'rk404@gmail.com', 'katargam'),
(19, 'jackTheemployee@gmai', 1, 'Rutvik Dhola', '0123456789', 'rk404@gmail.com', 'kapodra');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `username` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `conformpassword` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`username`, `email`, `conformpassword`, `password`) VALUES
('Mayank Busa', 'busamayank111@gmail.', 'mayank@123', 'mayank@123'),
('Tirth Patel', 'tirthpatel321@gmail.', 'tirth@12', 'tirth@12'),
('Jenil Vekariya', 'jenil123@gmail.com', 'jenil#123', 'jenil#123'),
('Rutvik Bhaliya', 'rt123@gmail.com', 'rutvik@12', 'rutvik@12'),
('tirth', 'hello@gmail.com', '123456', '123456'),
('jack', 'jackTheemployee@gmai', '7894561230', '7894561230');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tblorder`
--
ALTER TABLE `tblorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
