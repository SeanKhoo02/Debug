-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2022 at 11:14 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart _scheduling_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `buzytime`
--

CREATE TABLE `buzytime` (
  `buzytime_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `free_time_start` time NOT NULL,
  `free_time_end` time NOT NULL,
  `day` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buzytime`
--

INSERT INTO `buzytime` (`buzytime_id`, `user_id`, `free_time_start`, `free_time_end`, `day`) VALUES
(5, 9, '12:00:00', '14:00:00', 'mon'),
(8, 9, '18:00:00', '21:00:00', 'mon'),
(88, 1, '19:00:00', '20:00:00', 'mon'),
(103, 2, '09:00:00', '10:00:00', 'mon'),
(104, 2, '12:00:00', '14:00:00', 'mon'),
(106, 2, '14:30:00', '15:00:00', 'mon'),
(108, 2, '11:00:00', '11:30:00', 'mon'),
(114, 14, '08:00:00', '18:30:00', 'mon'),
(119, 1, '02:30:00', '04:30:00', 'mon'),
(124, 1, '16:00:00', '17:00:00', 'mon'),
(125, 2, '12:00:00', '14:30:00', 'tue'),
(126, 2, '17:00:00', '18:30:00', 'tue'),
(127, 9, '14:00:00', '16:30:00', 'tue'),
(128, 9, '18:00:00', '20:00:00', 'tue'),
(129, 1, '12:00:00', '14:30:00', 'tue'),
(130, 1, '17:00:00', '18:30:00', 'tue'),
(131, 1, '12:00:00', '14:30:00', 'wed'),
(132, 1, '17:00:00', '18:30:00', 'wed'),
(133, 9, '14:30:00', '16:30:00', 'wed'),
(134, 9, '19:00:00', '20:00:00', 'wed'),
(135, 1, '08:00:00', '17:00:00', 'thu'),
(136, 9, '12:00:00', '20:00:00', 'thu'),
(137, 15, '00:00:00', '00:00:00', 'mon'),
(138, 16, '00:00:00', '00:00:00', 'mon'),
(139, 1, '08:00:00', '17:00:00', 'fri'),
(140, 9, '11:00:00', '19:00:00', 'fri');

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--

CREATE TABLE `friend` (
  `friend_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `user_friend_id` int(20) NOT NULL,
  `friend_name` varchar(50) NOT NULL,
  `friend_email` varchar(50) NOT NULL,
  `friend_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friend`
--

INSERT INTO `friend` (`friend_id`, `user_id`, `user_friend_id`, `friend_name`, `friend_email`, `friend_img`) VALUES
(26, 2, 1, 'niama', 'niama@gmail.com', 'user.png'),
(27, 14, 1, 'niama', 'niama@gmail.com', 'user.png'),
(29, 1, 9, 'niama123', 'niama123@gmail.com', 'user.png');

-- --------------------------------------------------------

--
-- Table structure for table `friend_request`
--

CREATE TABLE `friend_request` (
  `user_add_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_img` varchar(255) NOT NULL,
  `friend_target_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `meet_details`
--

CREATE TABLE `meet_details` (
  `room_id` int(20) NOT NULL,
  `host_id` int(20) NOT NULL,
  `host_name` varchar(50) NOT NULL,
  `host_img` varchar(255) NOT NULL,
  `member_id` int(20) NOT NULL,
  `member_name` varchar(50) NOT NULL,
  `member_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `scheduling`
--

CREATE TABLE `scheduling` (
  `scheduling_id` int(20) NOT NULL,
  `host_id` int(20) NOT NULL,
  `meet_time` datetime(6) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(20) NOT NULL,
  `user_code` varchar(40) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_pass` varchar(40) NOT NULL,
  `user_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_code`, `user_name`, `user_email`, `user_pass`, `user_img`) VALUES
(1, 'F1001', 'niama', 'niama@gmail.com', 'niama123', 'user.png'),
(2, 'F1002', 'walaowei', 'walaowei@gmail.com', 'walaowei123', 'user.png'),
(9, 'F1003', 'niama123', 'niama123@gmail.com', 'niama123', 'user.png'),
(13, 'F1010', 'dqdqwfdq', 'qnmdiwqendi@gmail.com', 'qnfquwedfq', 'user.png'),
(14, 'F1014', 'test', 'test@gmail.com', 'test123', '1652335146_Jay_Chou.png'),
(15, 'F1015', 'test2', 'test2@gmail.com', 'test2', 'user.png'),
(16, 'F1016', 'test3', 'test3@gmail.com', 'test3', 'user.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buzytime`
--
ALTER TABLE `buzytime`
  ADD PRIMARY KEY (`buzytime_id`);

--
-- Indexes for table `friend`
--
ALTER TABLE `friend`
  ADD PRIMARY KEY (`friend_id`);

--
-- Indexes for table `friend_request`
--
ALTER TABLE `friend_request`
  ADD PRIMARY KEY (`user_add_id`);

--
-- Indexes for table `meet_details`
--
ALTER TABLE `meet_details`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `scheduling`
--
ALTER TABLE `scheduling`
  ADD PRIMARY KEY (`scheduling_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buzytime`
--
ALTER TABLE `buzytime`
  MODIFY `buzytime_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `friend`
--
ALTER TABLE `friend`
  MODIFY `friend_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `friend_request`
--
ALTER TABLE `friend_request`
  MODIFY `user_add_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `meet_details`
--
ALTER TABLE `meet_details`
  MODIFY `room_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scheduling`
--
ALTER TABLE `scheduling`
  MODIFY `scheduling_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
