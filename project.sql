-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2018 at 03:06 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

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
(1, 'admin', '$2y$10$Yy3GFiJuHys6CmuA9hHIs.IGX3k1KsflhX2tNEQgE5B0vJljAvRye', 'Tanya', 'Panichtrakul', 22, 'm', 'tanya.pa@ku.th', '0886886999', '322/12', '1320910222034', 'admin', '/project/picture/user/19.jpg', 'y'),
(48, 'ballstep', '$2y$10$BzuoU/pC9eqSqjVeiSrpH.Ur03p5NXPiBNMdnSZdNAIVRlS14M6ne', 'ball', 'thuntiyanukul', 23, 'm', 'titi.t@ku.th', '0891992339', '121/433', '1324234254253', 'organizer', '/project/picture/user/2.png', 'y'),
(49, 'jude', '$2y$10$JI7i817iWulXJvYsG2hB/.Y85vD/9C/HMf63QV7Wak0AX9wsMyPaq', 'jude', 'bnk', 22, 'm', 'titi.t@ku.th', '0832324234', '456/322', '1213232343454', 'organizer', '/project/picture/user/19.jpg', 'y'),
(50, 'kanoon', '$2y$10$M5BB54IHY5ZZgApMPp.AZOIjcklJ3WQ0r3al0L/jq/bS1H/whJ7Ny', 'kanoon', 'pug', 21, 'f', 'titi.t@ku.th', '0834734832', '123/111', '1313454634644', 'attendant', '/project/picture/img/icon.png', 'n'),
(51, 'surat', '$2y$10$A5dZ1rDJqqCtlZtwVJsuOu82Rwk7Cz3857QyDoseTCKFMkv8rPB3O', 'surat', 'aloha', 22, 'm', 'titi.t@ku.th', '0844542352', '132/111', '1234354465465', 'attendant', '/project/picture/user/eye.png', 'y');

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

--
-- Dumping data for table `attendants`
--

INSERT INTO `attendants` (`id_at`, `id_ev`, `id_ac`, `image1`, `image2`, `num`, `status`) VALUES
(1, 13, 51, '/project/picture/attendant/S__258072578.jpg', '/project/picture/attendant/card5.jpg', 10, 'r'),
(2, 12, 51, '/project/picture/attendant/S__258072578.jpg', '/project/picture/attendant/card5.jpg', 1, 'c'),
(3, 11, 51, '/project/picture/attendant/S__258072578.jpg', '/project/picture/attendant/card5.jpg', 1, 'y');

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

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id_co`, `id_ac`, `id_ev`, `message`, `date`, `time`) VALUES
(2, 51, 13, 'อยากเจอ BNK จังครับ', '2018-03-13', '03:42:33'),
(5, 51, 11, 'อยากได้ note book ใหม่ครับ เพื่อนชอบเตะปลั๊ก', '2018-03-13', '04:13:15');

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
(7, 1, 'วันเปิด web Surat event', 'วันเปิด web รวม event', '/project/picture/event/T25.jpg,/project/picture/event/myhc_44243.jpg', '/project/picture/video/Should I (บอก) - Garena RoV.mp4', '2018-03-13', '08:00', 'sc-45 709', '13.847417206387103,100.57186961364414', 0, 50, 0, 'education', '', '2018-03-12 23:19:35', 'y', 'https://docs.google.com/forms/d/1Kro9I0vVQD-UFSpQO89lWoBkUwpgy8KeAlRB_yFZu3E/edit'),
(8, 1, 'งานวันเกิดบอย', 'งานวันเกิดครบรอบ22', '/project/picture/event/IMG_0017jpeg.jpg,/project/picture/event/luk (7).jpg', '/project/picture/video/ที่ปรึกษา - [ Re-produced by TheTOYS ].mp4', '2018-03-16', '18:00', 'ปากเกร็ด', '13.907559631671141,100.50296245548225', 0, 10, 0, 'party', 'เพื่อนบอย', '2018-03-12 23:28:55', 'y', 'https://docs.google.com/forms/d/1Kro9I0vVQD-UFSpQO89lWoBkUwpgy8KeAlRB_yFZu3E/edit'),
(9, 1, 'CONCER TMARC TATCHAPON', 'งานดนตรีแรกของ มา', '/project/picture/event/4hylVtAs.jpg,/project/picture/event/maxresdefault.jpg', '/project/picture/video/ที่เก่า - MARC TATCHAPON [ Official MV ].mp4', '2018-03-11', '20:00', 'บางเขน', '13.858147646331092,100.62399486620552', 0, 50, 100, 'entertainment', '', '2018-03-12 23:33:49', 'y', 'https://docs.google.com/forms/d/1Kro9I0vVQD-UFSpQO89lWoBkUwpgy8KeAlRB_yFZu3E/edit'),
(10, 48, 'ดาร์บี้แมตช์ แมนเชสเตอร์', 'ศึกตัดสินแชมป์ประจำปี 2018', '/project/picture/event/056550-01-02.jpg,/project/picture/event/1.1.jpg', '/project/picture/video/The Manchester Derby 2017-18 by @aditya_reds.mp4', '2018-07-04', '11:30', 'Manchester, แมนเชสเตอร์ สหราชอาณาจักร', '53.46178179998393,-2.2476885618225424', 0, 72300, 1000, 'sport', '', '2018-03-13 01:18:40', 'y', 'https://docs.google.com/forms/d/1Kro9I0vVQD-UFSpQO89lWoBkUwpgy8KeAlRB_yFZu3E/edit'),
(11, 48, 'งาน commart 2018', 'งานรวมอุปกรณ์ it', '/project/picture/event/event_15042_type50_p2_20180125094759.jpg,/project/picture/event/แถลงข่าวการจัดงาน-COMMART-CONNECT-2018_2.jpg', '/project/picture/video/งาน Commart Work 2017.mp4', '2018-03-22', '10:00', 'ศูนย์การประชุมแห่งชาติสิริกิติ์', '13.723622603883019,100.55980393966206', 1, 20000, 0, 'sport', '', '2018-03-13 02:06:25', 'y', 'https://docs.google.com/forms/d/1Kro9I0vVQD-UFSpQO89lWoBkUwpgy8KeAlRB_yFZu3E/edit'),
(12, 49, 'rov pro league', 'ศึกชิงหาแชมป์ลีกประเทศไทย', '/project/picture/event/9d9f3d289028971a8ec9faf8588a0ce0.jpg,/project/picture/event/attach-1517556479294.jpg', '/project/picture/video/Garena RoV  Pro League Season 1 Presented by True Move H.mp4', '2018-03-19', '19:30', 'WORKPOINT ENTERTAINMENT, หมู่ 2 ตำบล บางพูน อำเภอเมืองปทุมธานี ปทุมธานี ประเทศไทย', '13.99350966367365,100.59744365553115', 1, 30, 0, 'sport', '', '2018-03-13 02:20:37', 'y', 'https://docs.google.com/forms/d/1Kro9I0vVQD-UFSpQO89lWoBkUwpgy8KeAlRB_yFZu3E/edit'),
(13, 49, 'BNK 48 on kingcup', 'งานแสดงสดของ bnk', '/project/picture/event/ดาวน์โหลด.jpg,/project/picture/event/BNK48.jpg', '/project/picture/video/สกู๊ปกีฬา  เจอกันที่คิงส์คัพ! 16 สาว BNK48 ร่วมเชียร์ทีมชาติไทย.mp4', '2018-03-22', '18:00', 'สนามราชมังคลากีฬาสถาน กรุงเทพมหานคร จังหวัด กรุงเทพมหานคร ประเทศไทย', '13.756459293306289,100.62192849044948', 0, 1000, 3000, 'sport', 'แฟนbnk,แฟนบอลไทย', '2018-03-13 03:05:12', 'y', 'https://docs.google.com/forms/d/1Kro9I0vVQD-UFSpQO89lWoBkUwpgy8KeAlRB_yFZu3E/edit');

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
  MODIFY `id_ac` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `attendants`
--
ALTER TABLE `attendants`
  MODIFY `id_at` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id_co` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id_ev` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
