-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2022 at 02:51 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gladiator`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_fname` varchar(100) NOT NULL,
  `customer_lname` varchar(100) NOT NULL,
  `customer_mname` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_contact` char(9) NOT NULL,
  `customer_age` int(11) NOT NULL,
  `customer_gender` varchar(20) NOT NULL,
  `customer_address` varchar(50) NOT NULL,
  `customer_weight` float NOT NULL,
  `customer_height` float NOT NULL,
  `customer_bmi` float NOT NULL,
  `customer_health` text NOT NULL,
  `customer_datecreated` datetime NOT NULL,
  `customer_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_fname`, `customer_lname`, `customer_mname`, `customer_email`, `customer_contact`, `customer_age`, `customer_gender`, `customer_address`, `customer_weight`, `customer_height`, `customer_bmi`, `customer_health`, `customer_datecreated`, `customer_type`) VALUES
(1, 'RA', 'Codoy', 'G', 'roeannkim@gmail.com', '091457896', 21, 'F', 'Minoza St., Tigbao, Talamban, Cebu City', 68, 165, 0, 'NULL', '0000-00-00 00:00:00', 'Guest'),
(2, 'Marvin', 'Navarro', 'S', 'marvin_714@yahoo.com', '094537482', 21, 'M', 'Cebu', 68, 170, 0, 'NULL', '0000-00-00 00:00:00', 'Guest');

-- --------------------------------------------------------

--
-- Table structure for table `package_plan`
--

CREATE TABLE `package_plan` (
  `package_plan_id` int(11) NOT NULL,
  `package_plan_type` varchar(30) NOT NULL,
  `package_plan_desc` text NOT NULL,
  `package_plan_amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package_plan`
--

INSERT INTO `package_plan` (`package_plan_id`, `package_plan_type`, `package_plan_desc`, `package_plan_amount`) VALUES
(1, '1 Year Plan', '1 year usage', 12000),
(2, '2 Year Plan', '2 years gym usage', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `reg_id` int(30) NOT NULL,
  `payment_amount` int(30) NOT NULL,
  `payment_type` tinyint(4) NOT NULL,
  `remarks` text NOT NULL,
  `date_issued` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `reg_id`, `payment_amount`, `payment_type`, `remarks`, `date_issued`) VALUES
(1, 1, 22000, 0, 'paid', '2005-05-22 09:28:04'),
(2, 0, 27500, 0, 'Paid', '2008-05-22 02:33:22');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `reg_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `package_plan_id` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_issued` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`reg_id`, `customer_id`, `package_plan_id`, `trainer_id`, `start_date`, `end_date`, `status`, `date_issued`) VALUES
(2, 1, 2, 2, '2022-05-03', '2024-05-03', 0, '0000-00-00'),
(5, 2, 1, 2, '2022-05-08', '2022-05-08', 1, '0000-00-00'),
(6, 1, 2, 1, '2022-05-08', '2022-05-08', 0, '0000-00-00'),
(7, 1, 2, 1, '2022-05-10', '2022-05-10', 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `trainer_id` int(11) NOT NULL,
  `trainer_name` text NOT NULL,
  `trainer_contact` char(9) NOT NULL,
  `trainer_email` varchar(100) NOT NULL,
  `trainer_rate` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`trainer_id`, `trainer_name`, `trainer_contact`, `trainer_email`, `trainer_rate`) VALUES
(1, 'Wendel Mejaran', '091234567', 'wendel@email.com', 10000),
(2, 'John Doe', '091234557', 'jon@email.com', 7500);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `user_username` varchar(200) NOT NULL,
  `user_password` text NOT NULL,
  `user_type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_username`, `user_password`, `user_type`) VALUES
(1, 'Admin', 'admin', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `package_plan`
--
ALTER TABLE `package_plan`
  ADD PRIMARY KEY (`package_plan_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`reg_id`),
  ADD KEY `conn_customer` (`customer_id`),
  ADD KEY `conn_package_plan` (`package_plan_id`),
  ADD KEY `conn_trainer` (`trainer_id`);

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`trainer_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `package_plan`
--
ALTER TABLE `package_plan`
  MODIFY `package_plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `trainer`
--
ALTER TABLE `trainer`
  MODIFY `trainer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `registration`
--
ALTER TABLE `registration`
  ADD CONSTRAINT `conn_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `conn_package_plan` FOREIGN KEY (`package_plan_id`) REFERENCES `package_plan` (`package_plan_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `conn_trainer` FOREIGN KEY (`trainer_id`) REFERENCES `trainer` (`trainer_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
