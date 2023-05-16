-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2023 at 11:06 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trafficmanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `lostvehicle`
--

CREATE TABLE `lostvehicle` (
  `id` int(11) NOT NULL DEFAULT 1,
  `Type` varchar(25) NOT NULL,
  `Model` varchar(50) NOT NULL,
  `VehicleNumber` varchar(30) NOT NULL,
  `EngineNumber` varchar(50) NOT NULL,
  `ChassisNumber` varchar(50) NOT NULL,
  `Dealer` varchar(50) NOT NULL,
  `registered_owner` varchar(25) NOT NULL,
  `registered_address` varchar(100) NOT NULL,
  `color` varchar(20) NOT NULL,
  `cc` int(11) NOT NULL,
  `lostDate` datetime NOT NULL,
  `lostAddress` varchar(60) NOT NULL,
  `reportDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lostvehicle`
--

INSERT INTO `lostvehicle` (`id`, `Type`, `Model`, `VehicleNumber`, `EngineNumber`, `ChassisNumber`, `Dealer`, `registered_owner`, `registered_address`, `color`, `cc`, `lostDate`, `lostAddress`, `reportDate`) VALUES
(1, 'Fourwheelers', '2015', 'pra 3 pa 4445', 'philox4x32x10', 'JH4DB7540SS801338', 'Yamaha pvt. ltd', 'Adarsh Thapa', 'Chakrapath-Kathmandu', 'Blue', 1999, '2023-05-11 13:41:00', 'Dhangadhi-1, Kailali', '2023-05-10 13:41:23');

-- --------------------------------------------------------

--
-- Table structure for table `lost_document`
--

CREATE TABLE `lost_document` (
  `id` int(11) NOT NULL,
  `DocumentType` varchar(25) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Date` date NOT NULL,
  `Location` varchar(25) NOT NULL,
  `reportDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lost_document`
--

INSERT INTO `lost_document` (`id`, `DocumentType`, `Description`, `Date`, `Location`, `reportDate`) VALUES
(10, 'License', 'I lost my license near chabhil.', '2023-05-04', 'chabail', '2023-05-10 13:38:55');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Message` text NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `offense`
--

CREATE TABLE `offense` (
  `ID` int(11) NOT NULL,
  `ticket_no` int(11) NOT NULL,
  `violator_name` varchar(30) NOT NULL,
  `officer_name` varchar(30) NOT NULL,
  `officer_id` varchar(30) NOT NULL,
  `vehicles_no` varchar(50) NOT NULL,
  `OffenseType` varchar(30) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `Date` datetime NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offense`
--

INSERT INTO `offense` (`ID`, `ticket_no`, `violator_name`, `officer_name`, `officer_id`, `vehicles_no`, `OffenseType`, `total_amount`, `status`, `Date`, `remarks`) VALUES
(4, 777777, 'Rajat Singh', 'Rabindra Mahat', '222222', 'pra 03 kha 2345', '', 3, 'paid', '2023-05-09 13:34:00', 'Test data'),
(25, 1, 'Kaustuv Shah', 'Rabindra Mahat', '012', 'pra 3 ta 4578', '', 650, 'paid', '2023-05-10 15:57:00', 'chandan'),
(26, 1112478, 'Adarsh Thapa', 'Rabindra Mahat', '789565', 'pra 3 ta 4578', '', 3000, 'Pending', '2023-05-10 16:09:00', 'test'),
(27, 12, 'Kaustuv Shah', 'Chandan Bam', '12', 'ba70 pa 8005', '', 3000, 'Pending', '2023-05-10 16:50:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `offenses`
--

CREATE TABLE `offenses` (
  `id` int(30) NOT NULL,
  `code` varchar(50) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `fine` float NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Inactive, 1=Active',
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offenses`
--

INSERT INTO `offenses` (`id`, `code`, `name`, `description`, `fine`, `status`, `date_created`, `date_updated`) VALUES
(1, 'OT-1001', 'Driving without License', 'This is a traffic offense for driving without License', 650, 1, '2021-08-19 09:14:43', '2021-08-19 09:17:50'),
(2, 'TO-1002', 'Running Over Speed Limit', '&lt;p&gt;Sample Traffic offense or violation for over speed limit.&lt;/p&gt;', 1000, 1, '2021-08-19 13:54:51', NULL),
(5, '012', 'drunk and drive', '', 3000, 1, '2023-05-10 13:47:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `offense_items`
--

CREATE TABLE `offense_items` (
  `driver_offense_id` int(30) NOT NULL,
  `offense_id` int(30) DEFAULT NULL,
  `fine` float NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=pending, 1=paid',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offense_items`
--

INSERT INTO `offense_items` (`driver_offense_id`, `offense_id`, `fine`, `status`, `date_created`) VALUES
(1, 1, 650, 1, '2021-08-18 15:00:00'),
(1, 2, 1000, 1, '2021-08-18 15:00:00'),
(3, 2, 1000, 0, '2023-05-06 14:22:00'),
(18, 2, 1000, 0, '2023-05-07 00:00:00'),
(18, 1, 650, 0, '2023-05-07 00:00:00'),
(19, 2, 1000, 0, '2023-05-07 00:00:00'),
(19, 1, 650, 0, '2023-05-07 00:00:00'),
(19, 1, 650, 1, '2023-05-07 00:00:00'),
(19, 2, 1000, 1, '2023-05-07 00:00:00'),
(0, 1, 650, 0, '2023-05-08 15:02:00'),
(0, 1, 650, 0, '2023-05-08 15:04:00'),
(4, 3, 5000, 0, '0000-00-00 00:00:00'),
(6, 2, 1000, 0, '0000-00-00 00:00:00'),
(7, 2, 1000, 0, '2023-05-09 22:30:00'),
(8, 2, 1000, 1, '0000-00-00 00:00:00'),
(9, 2, 1000, 1, '2023-05-10 01:08:00'),
(10, 2, 1000, 0, '2023-05-10 02:07:00'),
(11, 2, 1000, 0, '2023-05-10 02:09:00'),
(12, 2, 1000, 0, '2023-05-10 02:11:00'),
(13, 1, 650, 0, '2023-05-10 13:50:00'),
(14, 1, 650, 0, '2023-05-10 13:58:00'),
(15, 1, 650, 0, '2023-05-10 14:14:00'),
(16, 1, 650, 0, '2023-05-10 14:16:00'),
(17, 1, 650, 0, '2023-05-10 14:17:00'),
(18, 1, 650, 0, '2023-05-10 14:17:00'),
(19, 2, 1000, 0, '2023-05-10 14:19:00'),
(20, 1, 650, 0, '2023-05-10 14:20:00'),
(21, 2, 1000, 0, '2023-05-10 14:23:00'),
(22, 2, 1000, 0, '2023-05-10 14:25:00'),
(23, 2, 1000, 0, '2023-05-10 14:26:00'),
(24, 1, 650, 0, '2023-05-10 14:27:00'),
(25, 1, 650, 0, '2023-05-10 15:57:00'),
(26, 5, 3000, 0, '2023-05-10 16:09:00'),
(27, 5, 3000, 0, '2023-05-10 16:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `offense_list`
--

CREATE TABLE `offense_list` (
  `id` int(30) NOT NULL,
  `violator_name` varchar(30) NOT NULL,
  `vehicles_no` varchar(50) NOT NULL,
  `officer_name` text NOT NULL,
  `officer_id` text NOT NULL,
  `ticket_no` text NOT NULL,
  `total_amount` float NOT NULL,
  `remarks` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=pending, 1=paid',
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offense_list`
--

INSERT INTO `offense_list` (`id`, `violator_name`, `vehicles_no`, `officer_name`, `officer_id`, `ticket_no`, `total_amount`, `remarks`, `status`, `date_created`, `date_updated`) VALUES
(1, 'Aasish Dhungana', '0', 'George Wilson', 'OFC-789456123', '123456789', 1650, 'Sample Traffic Offense Record Only.', 1, '2021-08-18 15:00:00', '2023-05-06 12:31:07'),
(3, 'Ravi Shrestha', '0', 'Chandan Bam', '789565', '784586', 1000, 'hehe', 0, '2023-05-06 14:22:00', '2023-05-06 12:31:29');

-- --------------------------------------------------------

--
-- Table structure for table `registered_vehicle`
--

CREATE TABLE `registered_vehicle` (
  `Type` varchar(25) NOT NULL,
  `Classification` varchar(20) NOT NULL,
  `Model` varchar(50) NOT NULL,
  `Vehicle_Number` varchar(50) NOT NULL,
  `Brand` varchar(25) NOT NULL,
  `Engine_Number` varchar(100) NOT NULL,
  `ChassisNumber` varchar(100) NOT NULL,
  `CC` int(11) NOT NULL,
  `DealerAddress` varchar(100) NOT NULL,
  `Reg_Owner` varchar(50) NOT NULL,
  `Seat_Capacity` int(11) NOT NULL,
  `Color` varchar(25) NOT NULL,
  `CylinderNumber` varchar(50) NOT NULL,
  `EngineType` varchar(50) NOT NULL,
  `RegisteredDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registered_vehicle`
--

INSERT INTO `registered_vehicle` (`Type`, `Classification`, `Model`, `Vehicle_Number`, `Brand`, `Engine_Number`, `ChassisNumber`, `CC`, `DealerAddress`, `Reg_Owner`, `Seat_Capacity`, `Color`, `CylinderNumber`, `EngineType`, `RegisteredDate`) VALUES
('Twowheelers', 'Twowheelers', 'Kawasaki Ninja h2r', 'pra 3 pa 4477', 'Kawasaki', '5f5d5tt6756', 'JH4DB7540SS801338', 998, 'R R Building, Kathmandu 44600', 'Chandan Bam', 2, 'Black', '112', 'Petrol', '2023-04-28 18:13:11'),
('Twowheelers', 'Twowheelers', 'Hyundai Tucson', 'pra 3 pa 4445', 'Hyundai', 'philox4x32x10', 'JH4DB7540SR8034556', 1999, ' Bhagawati Bahal, Kathmandu 44611', 'Koshish Khadka', 5, 'Red', '4', 'Diesel', '2023-04-28 18:28:40'),
('Fourwheelers', 'Fourwheelers', 'Elantra', 'Ba 2 kha 4466', 'Hyundai', '45HJ78IO55', 'JI78TY54554845', 1999, ' Bhagawati Bahal, Kathmandu 44611', 'Ravi Shrestha', 5, 'Blue', '4', 'Diesel', '2023-04-28 18:33:52'),
('Twowheelers', 'Public', 'Yamaha', 'pra 03 kha 4578', 'Yamaha', 'philox4x32x10', 'JH4DB7540SS801338', 200, 'R R Building, Kathmandu 44600', 'Chandan Bam', 5, 'Black', '4', 'Petrol', '2023-05-10 10:01:42'),
('Twowheelers', 'Private', 'Kawasaki Ninja h2r', 'pra 3 pa 44490', 'Kawasaki', '45HJ78IO55', 'zsdxfcvbn ,m.', 200, 'R R Building, Kathmandu 44600', 'kaustuv', 2, 'Red', '4', 'Diesel', '2023-05-10 13:03:48'),
('Twowheelers', 'Private', '2015', 'ba70pa8004', 'Yamaha', 'WET6DEERT4EFG', 'WET 54SX4S4ZX', 150, 'GANAPATI', 'KAUSTUV', 2, 'BLACK', '1', 'Petrol', '2023-05-10 13:40:16');

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'Smart Traffic Optimization and Planning System'),
(6, 'short_name', 'STOPS'),
(11, 'logo', 'uploads/1683554940_full-logo.png'),
(13, 'user_avatar', 'uploads/user_avatar.jpg'),
(14, 'cover', 'uploads/1629334140_traffic_bg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `traffic`
--

CREATE TABLE `traffic` (
  `id` int(11) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone` bigint(20) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `traffic`
--

INSERT INTO `traffic` (`id`, `firstName`, `lastName`, `Email`, `Phone`, `Password`, `type`) VALUES
(0, 'Chandan ', 'Bam', 'tickettt@gmail.com', 9878458565, 'hello', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Name` varchar(25) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone` bigint(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Name`, `Email`, `Phone`, `Password`) VALUES
('Ravi Shrestha', 'underdogravi331@gmail.com', 9878459565, 'underdogravi331'),
('Ravi Shrestha', 'underdogravi331@gmail.com', 9878459565, 'underdogravi331'),
('Nishchal Shrestha', 'nishchal@gmail.com', 9842887809, 'hello'),
('Nishchal Shrestha', 'nishchal@gmail.com', 9842887809, 'hello'),
('Ravi Shrestha', 'ravi@gmail.com', 9878459565, 'hello'),
('Koshish Khadka', 'Koshish11@gmail.com', 9878459565, '$2y$10$Fk/3VAuh5D43gedPjF4NB.18dvvqP/uXlK4T7zN5VyX'),
('Kaustuv jung shah', 'kaustuv@gmail.com', 9840503336, '$2y$10$GK1pxY6LVoQBg2YCxaVPsuSeZMWeb154l6agIPbwKqk'),
('Chandan Bam', 'chandan@gmail.com', 9875486895, '$2y$10$4zuNNON30mxUIAJY4HmTQ.hgsMUn0HouUs7wGfQ1El6'),
('Chandan Bam', 'collabproject@gmail.com', 7898456587, '$2y$10$juVj.Sr4HpMiT9vN2vUcHO2cEueNoUKllrg6dwdG8XX'),
('Jamie Lannister', 'kingslayer@gmail.com', 9875486895, '$2y$10$uff60FNHUsh0q3e8gGxYxupcgsLpAOOfGDq5sveYLbP'),
('notadmin', 'notadmin@gmail.com', 9840503336, '$2y$10$uMRrmVueIpAm4U8PgBYQO.70kzOJcBTyeNkRVcTJZ25NvlbiZfate'),
('Chandan Bam', 'user@gmail.com', 9840503336, '$2y$10$I9w8G1tq0H1se5JuE4dkge9p6tJ4CyTmt.gL3rDldWNhNdF5AR5YK'),
('kaustuv', 'kaustuvjung@gmail.com', 9875486895, '$2y$10$gzE/M2JPRerrAl6IAxC5qenzSwrmwBxEoCy6gmrKHtIMfwIhT4wAi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `avatar`, `last_login`, `type`, `date_added`, `date_updated`) VALUES
(1, 'Cool', 'Admin', 'admin', '0192023a7bbd73250516f069df18b500', 'uploads/1683554880_cool admin.webp', NULL, 1, '2021-01-20 14:02:37', '2023-05-08 19:53:56'),
(9, 'John', 'Smith', 'jsmith', '1254737c076cf867dc53d60a0364f38e', 'uploads/1629336240_avatar.jpg', NULL, 2, '2021-08-19 09:24:25', NULL),
(10, 'Chandan', 'Bam', 'notadmin', '5d41402abc4b2a76b9719d911017c592', 'uploads/1683554340_IMG_7332.JPG', NULL, 2, '2023-05-08 19:44:40', NULL),
(11, 'james', 'james', 'james', 'acca09a892d1772e148a6d173ee06f15', 'uploads/1683705420_image.png', NULL, 2, '2023-05-10 13:42:12', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lostvehicle`
--
ALTER TABLE `lostvehicle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lost_document`
--
ALTER TABLE `lost_document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offense`
--
ALTER TABLE `offense`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD UNIQUE KEY `ticket_no` (`ticket_no`);

--
-- Indexes for table `offenses`
--
ALTER TABLE `offenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offense_items`
--
ALTER TABLE `offense_items`
  ADD KEY `driver_offense_id` (`driver_offense_id`),
  ADD KEY `offense_id` (`offense_id`);

--
-- Indexes for table `offense_list`
--
ALTER TABLE `offense_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `traffic`
--
ALTER TABLE `traffic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lost_document`
--
ALTER TABLE `lost_document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `offense`
--
ALTER TABLE `offense`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `offenses`
--
ALTER TABLE `offenses`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `offense_list`
--
ALTER TABLE `offense_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
