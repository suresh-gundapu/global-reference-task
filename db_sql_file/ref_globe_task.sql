-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2024 at 09:55 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ref_globe_task`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `disignation` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `doj` varchar(255) NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `disignation`, `dob`, `doj`, `blood_group`, `email`, `mobile`, `address`) VALUES
(1, 'suresh', 'sfsf', '20/12/1991', '20/12/1995', 'cdg', 'dfgdfg@sfsdf', 54646546464, 'dfgdsfsfs');

-- --------------------------------------------------------

--
-- Table structure for table `file_manage`
--

CREATE TABLE `file_manage` (
  `id` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `added_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `file_manage`
--

INSERT INTO `file_manage` (`id`, `file`, `user_id`, `added_date`) VALUES
(1, '1', 0, '2024-05-16 12:06:53'),
(2, 'database/uploads/96481564745339.jpeg', 1, '2024-05-16 13:12:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `user_image` varchar(255) NOT NULL DEFAULT 'assets/uploads/user_profiles/noimage.png',
  `signature` varchar(250) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `auth_level` int(5) NOT NULL COMMENT '1=superadmin,2=admin,3=users ',
  `role` varchar(200) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=>inactive,1=>active',
  `register_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `mobile_no`, `user_image`, `signature`, `gender`, `dob`, `auth_level`, `role`, `address`, `status`, `register_date`) VALUES
(1, 'suresh user', 'suresh@yopmail.com', '123456', '9603212151', 'database/uploads/20220218-122006_p0.jpg', 'database/uploads/96481564745339.jpeg', 'male', '2024-05-09', 3, 'user', 'hyd', 1, '0000-00-00 00:00:00'),
(6, 'Raju', 'raju@yopmail.com', '123456', '9603212151', 'database/uploads/20220218-122006_p0.jpg', 'database/uploads/image_1.jfif', 'male', '2024-05-07', 1, 'superadmin', 'hyd', 1, '2024-05-11 13:42:01'),
(7, 'Murali', 'murali@yopmail.com', '123456', '9603212151', 'database/uploads/image_1.jfif', 'database/uploads/image_1.jfif', 'male', '2024-05-07', 2, 'admin', 'hyd', 1, '2024-05-11 13:45:15'),
(8, 'suresh user 2', 'suresh2@yopmail.com', '123456', '09603212151', 'database/uploads/image_1.jfif', 'database/uploads/logo.png', 'male', '2024-05-15', 3, 'user', 'wgl2', 1, '2024-05-11 19:26:41'),
(9, 'mani', 'mani@yopmail.com', '123456', '09603212151', 'database/uploads/20220218-122006_p0.jpg', 'database/uploads/logo.png', 'female', '2024-05-17', 3, 'user', 'wgl', 1, '2024-05-11 19:41:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_manage`
--
ALTER TABLE `file_manage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `file_manage`
--
ALTER TABLE `file_manage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
