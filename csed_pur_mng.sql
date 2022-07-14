-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2022 at 08:24 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csed_pur_mng`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(255) NOT NULL,
  `e_mail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `csed_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `e_mail`, `password`, `csed_id`) VALUES
(1, 'admin@nitc.ac.in', '81dc9bdb52d04dc20036dbd8313ed055', 'csed07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` int(250) NOT NULL,
  `e_mail` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `csed_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `e_mail`, `password`, `csed_id`) VALUES
(1, 'mohd_m200703ca@nitc.ac.in', '827ccb0eea8a706c4c34a16891f84e7b', 'm200703ca'),
(2, 'sourav_m200722ca@nitc.ac.in', 'd91e449fd48f96737ce7f2a6f266f792', 'm200703ca'),
(4, 'khan@nitc.ac.in', '827ccb0eea8a706c4c34a16891f84e7b', 'm200703ca'),
(5, 'aman@gmail.com', 'f0775e39aeb4c103fb9be02f4164f81d', 'M200679CA'),
(11, 'nafees@nitc.ac.in', '827ccb0eea8a706c4c34a16891f84e7b', 'M200703CA'),
(13, 'nitin123@nitc.ac.in', '81dc9bdb52d04dc20036dbd8313ed055', 'njknkjsd12'),
(17, 'bc@nitc.ac.in', 'e10adc3949ba59abbe56e057f20f883e', 'a'),
(18, 'a@nitc.ac.in', '912e79cd13c64069d91da65d62fbb78c', 'lhnlyhnygbgbgbg'),
(19, 'nafees123@nitc.ac.in', '38f629170ac3ab74b9d6d2cc411c2f3c', 'M200708CA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request`
--

CREATE TABLE `tbl_request` (
  `id` int(255) NOT NULL,
  `req_item` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `e_mail` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `admin_reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_request`
--

INSERT INTO `tbl_request` (`id`, `req_item`, `location`, `reason`, `status`, `e_mail`, `date`, `admin_reason`) VALUES
(8, 'mjmjmj', 'mja', 'ertyui', 'hold', 'nitin123@nitc.ac.in', '0000-00-00', 'dfgsdgfdsfdgs'),
(9, 'Bottel', 'Calicut', 'drinking', 'approved', 'nitin123@nitc.ac.in', '0000-00-00', ''),
(10, 'Dexk', 'HCL', 'jnji', 'approved', 'nitin123@nitc.ac.in', '0000-00-00', ''),
(22, 'wire', 'CSED', 'shorted', 'reject', 'nitin123@nitc.ac.in', '2022-04-28', ''),
(23, 'AC', 'CNC', 'Current AC not workin', 'pending', 'nitin123@nitc.ac.in', '2030-06-20', ''),
(24, 'Key Board', 'Lab 01', 'Broken', 'pending', 'nitin123@nitc.ac.in', '2022-04-02', ''),
(26, 'Fan', 'CSED room no 203', 'Coil burn', 'approved', 'nitin123@nitc.ac.in', '2022-04-03', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_request`
--
ALTER TABLE `tbl_request`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_request`
--
ALTER TABLE `tbl_request`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
