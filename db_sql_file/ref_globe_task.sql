-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2024 at 04:31 PM
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
(1, 'suresh user', 'suresh@yopmail.com', '12', '9603212151', 'database/uploads/20220218-122006_p0.jpg', 'database/uploads/96481564745339.jpeg', 'male', '2024-05-09', 3, 'user', 'hyd', 1, '0000-00-00 00:00:00'),
(6, 'Raju', 'raju@yopmail.com', '123456', '9603212151', 'database/uploads/20220218-122006_p0.jpg', 'database/uploads/image_1.jfif', 'male', '2024-05-07', 1, 'superadmin', 'hyd', 1, '2024-05-11 13:42:01'),
(7, 'Murali', 'murali@yopmail.com', '123456', '9603212151', 'database/uploads/image_1.jfif', 'database/uploads/image_1.jfif', 'male', '2024-05-07', 2, 'admin', 'hyd', 1, '2024-05-11 13:45:15'),
(8, 'suresh user 2', 'suresh2@yopmail.com', '123456', '09603212151', 'database/uploads/image_1.jfif', 'database/uploads/logo.png', 'male', '2024-05-15', 3, 'user', 'wgl2', 1, '2024-05-11 19:26:41'),
(9, 'mani', 'mani@yopmail.com', '123456', '09603212151', 'database/uploads/20220218-122006_p0.jpg', 'database/uploads/logo.png', 'female', '2024-05-17', 3, 'user', 'wgl', 1, '2024-05-11 19:41:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
