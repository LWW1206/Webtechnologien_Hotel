-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2023 at 06:47 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `semesterprojecthana`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `file_path` varchar(255) NOT NULL COMMENT 'Location of physical file',
  `file_name` varchar(255) NOT NULL COMMENT 'Name of the file',
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `textfile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `file_path`, `file_name`, `uploaded_at`, `user_id`, `textfile`) VALUES
(91, 'uploads/thumbnails/89609717_p0_master1200.jpg', '89609717_p0_master1200.jpg', '2023-01-15 11:45:20', 14, 'hello its me'),
(92, 'uploads/thumbnails/93425255_p0_master1200.jpg', '93425255_p0_master1200.jpg', '2023-01-15 11:46:26', 14, 'this is a picture'),
(94, 'uploads/thumbnails/Landscape4.jpg', 'Landscape4.jpg', '2023-01-15 11:51:49', 14, 'Google Translate is a multilingual neural machine translation service developed by Google to translate text, documents and websites from one language into another. It offers a website interface, a mobile app for Android and iOS, and an API that helps deve'),
(95, 'uploads/thumbnails/67190100_p0_master1200 (1).jpg', '67190100_p0_master1200 (1).jpg', '2023-01-15 17:44:48', 14, 'blubblub');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `room` varchar(100) NOT NULL,
  `sdate` varchar(100) NOT NULL,
  `edate` varchar(100) NOT NULL,
  `extra1` int(11) DEFAULT NULL,
  `extra2` int(11) DEFAULT NULL,
  `extra3` int(11) DEFAULT NULL,
  `cost` int(250) NOT NULL,
  `userId` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(250) NOT NULL DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `name`, `room`, `sdate`, `edate`, `extra1`, `extra2`, `extra3`, `cost`, `userId`, `date`, `status`) VALUES
(46, 'asp272', 'Regular', '01/14/2023', '01/16/2023', 30, 20, NULL, 350, 0, '2023-01-14', 'new'),
(47, 'itsme', 'VIP Suite', '01/20/2023', '01/24/2023', 30, 20, NULL, 2714, 14, '2023-01-14', 'cancelled'),
(48, 'itsme', 'Deluxe', '01/21/2023', '01/25/2023', NULL, 20, 50, 1270, 17, '2023-01-14', 'new'),
(49, 'itsme', 'Regular', '01/26/2023', '02/04/2023', 30, 20, NULL, 1400, 17, '2023-01-14', 'confirmed'),
(54, 'itsme', 'Regular', '01/30/2023', '02/01/2023', NULL, NULL, 50, 350, 14, '2023-01-14', 'cancelled'),
(55, 'heh', 'Regular', '01/26/2023', '01/28/2023', 30, 20, 50, 400, 15, '2023-01-14', 'new');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usersId` int(11) NOT NULL,
  `usersAnrede` varchar(128) DEFAULT NULL,
  `usersName` varchar(128) NOT NULL,
  `usersEmail` varchar(128) NOT NULL,
  `usersUid` varchar(128) NOT NULL,
  `usersPwd` varchar(128) NOT NULL,
  `user_type` varchar(11) NOT NULL DEFAULT 'user',
  `user_status` varchar(128) NOT NULL DEFAULT 'active',
  `filename` varchar(125) DEFAULT 'notset'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersId`, `usersAnrede`, `usersName`, `usersEmail`, `usersUid`, `usersPwd`, `user_type`, `user_status`, `filename`) VALUES
(14, 'smt', 'admin', 'admin2@gmail.com', 'adminLi', '$2y$10$GIon94iOGmuwOO1Etnq11egx4/46B9PDzihN3kU1kV5oGEi0rbABe', 'admin', 'active', '366feafff5a84e678e0bb82d7398aef4!400x400.jpeg'),
(15, 'Herr', 'minecraft1', 'spider1@gmail.com', 'minecraftspider', '$2y$10$Vnv90yKr3nM1A5m78GyZguiDXn9f2HIpXYsDs6Y4ELShmP5R8wpVm', 'user', 'active', 'notset'),
(16, 'Frau', 'user1', 'user1@gmail.com', 'user1', '$2y$10$XVpgoEjRHUnAvIvbGPZzy.am6W9PNhGHhzAG/7iVv.NbbfxztXY8.', 'user', 'deactivated', 'notset'),
(17, 'Frau', 'Li Wen Wang', 'reedomlie@gmail.com', 'liwen', '$2y$10$yji7QNm/vg4Jg.SmB.1MUOKWeQQ4.quIN9elV0LDOigBLKw1LyA32', 'user', 'active', '1b5f25bc9732490cb1348cfda5e75082!400x400.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
