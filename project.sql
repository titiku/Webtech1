-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2018 at 05:53 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id_ac` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `ID` varchar(13) NOT NULL,
  `type` varchar(10) NOT NULL,
  `image` text NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id_ac`, `username`, `password`, `first_name`, `last_name`, `age`, `gender`, `email`, `phone`, `address`, `ID`, `type`, `image`, `status`) VALUES
(1, 'admin', '$2y$10$kP7SGqpwzWCsNHKxqjAOte60znAUTIhUDigFrMTOn4LTCKgMOz6Em', 'Tanya', 'Panichtrakul', 22, 'm', 'tanya.pa@ku.th', '0886886999', '322/12', '1320910222034', 'admin', '/project/picture/user/19.jpg', 'y'),
(47, 'boylnwza', '$2y$10$zi11GiCgxd/.OwnDbq/GqOzk1lW/wzV.dy8ouMpqmwchkkroVQ4s6', 'Tanya', 'Panichtrakul', 23, 'm', 'Titi.t@ku.th', '0832143437', '121/181', '1123489086444', 'organizer', '/project/picture/img/icon.png', 'n');

-- --------------------------------------------------------

--
-- Table structure for table `attendants`
--

CREATE TABLE `attendants` (
  `id_at` int(11) NOT NULL,
  `id_ev` int(11) NOT NULL,
  `id_ac` int(11) NOT NULL,
  `image1` text NOT NULL,
  `image2` text NOT NULL,
  `num` int(11) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id_co` int(11) NOT NULL,
  `id_ac` int(11) NOT NULL,
  `id_ev` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` varchar(15) NOT NULL,
  `time` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id_ev` int(11) NOT NULL,
  `id_ac` int(11) NOT NULL,
  `name_event` text NOT NULL,
  `detail` text NOT NULL,
  `image` text NOT NULL,
  `teaser_VDO` text NOT NULL,
  `date` varchar(15) NOT NULL,
  `time` varchar(10) NOT NULL,
  `location` text NOT NULL,
  `map` text NOT NULL,
  `current_capacity` int(11) DEFAULT '0',
  `capacity` int(11) NOT NULL,
  `free` int(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  `precondition` text NOT NULL,
  `create_time` varchar(20) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'y',
  `google_form_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id_ev`, `id_ac`, `name_event`, `detail`, `image`, `teaser_VDO`, `date`, `time`, `location`, `map`, `current_capacity`, `capacity`, `free`, `type`, `precondition`, `create_time`, `status`, `google_form_url`) VALUES
(7, 1, 'วันเปิด web Surat event', 'วันเปิด web รวม event', '/project/picture/event/T25.jpg,/project/picture/event/myhc_44243.jpg', '/project/picture/video/Should I (บอก) - Garena RoV.mp4', '2018-03-13', '08:00', 'sc-45 708', '13.847417206387103,100.57186961364414', 0, 50, 0, 'education', '', '2018-03-12 23:19:35', 'y', 'https://www.google.com/intl/th_th/forms/about/'),
(8, 1, 'งานวันเกิดบอย', 'งานวันเกิดครบรอบ22', '/project/picture/event/download.jpg,/project/picture/event/luk (7).jpg', '/project/picture/video/ที่ปรึกษา - [ Re-produced by TheTOYS ].mp4', '2018-03-16', '18:00', 'ปากเกร็ด', '13.907559631671141,100.50296245548225', 0, 10, 0, 'sport', 'เพื่อนบอย', '2018-03-12 23:28:55', 'y', 'https://www.google.com/forms/about/'),
(9, 1, 'งานรวมคนเหงา', 'งานรวมคนอกหัก', '/project/picture/event/IMG_0017jpeg.jpg,/project/picture/event/luk (7).jpg', '/project/picture/video/ที่เก่า - MARC TATCHAPON [ Official MV ].mp4', '2018-03-11', '20:00', 'บางเขน', '13.858147646331092,100.62399486620552', 0, 50, 100, 'party', 'คนโสด', '2018-03-12 23:33:49', 'y', 'https://www.google.com/forms/about/');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id_lo` int(11) NOT NULL,
  `id_ac` int(11) NOT NULL,
  `event` text NOT NULL,
  `date` varchar(15) NOT NULL,
  `time` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id_ac`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `attendants`
--
ALTER TABLE `attendants`
  ADD PRIMARY KEY (`id_at`),
  ADD KEY `id_ev` (`id_ev`),
  ADD KEY `id_ac` (`id_ac`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_co`),
  ADD KEY `id_ac` (`id_ac`),
  ADD KEY `id_ev` (`id_ev`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id_ev`),
  ADD KEY `id_ac` (`id_ac`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id_lo`),
  ADD KEY `id_ac` (`id_ac`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id_ac` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `attendants`
--
ALTER TABLE `attendants`
  MODIFY `id_at` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id_co` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id_ev` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id_lo` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendants`
--
ALTER TABLE `attendants`
  ADD CONSTRAINT `attendants_ibfk_1` FOREIGN KEY (`id_ac`) REFERENCES `accounts` (`id_ac`),
  ADD CONSTRAINT `attendants_ibfk_2` FOREIGN KEY (`id_ev`) REFERENCES `events` (`id_ev`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_ac`) REFERENCES `accounts` (`id_ac`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_ev`) REFERENCES `events` (`id_ev`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`id_ac`) REFERENCES `accounts` (`id_ac`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
