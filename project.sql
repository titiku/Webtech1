-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2018 at 01:38 PM
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
(1, 'admin', '$2y$10$yj9270arIiwz2MDSnwn9vuSBoW/r3Kpl4t2QFjGlU6LIj3CNpzVR2', 'Tanya', 'Panichtrakul', 22, 'm', 'tanya.pa@ku.th', '0886886999', '322/12', '1221324324235', 'admin', '/project/picture/user/19.jpg', 'y'),
(53, 'ball', '$2y$10$1dDEPgZC.6WAl3FAqxar8.tme3f2AtnKqlWqWet5kZB8EoIAc5aPe', 'ball', 'step', 23, 'm', 'tanya.pa@ku.th', '0897665745', '123/111', '1212312421421', 'attendant', '/project/picture/user/2.png', 'b'),
(54, 'jude', '$2y$10$KeeNwQeCilEg/nLqpjKh1.duc6kq2c1pJkmB6jo7egduaDyywyU8G', 'jude', 'jane', 21, 'm', 'tanya.pa@ku.th', '0932143432', '132/111', '1435435454534', 'attendant', '/project/picture/user/panda.jpg', 'y'),
(55, 'kanoon', '$2y$10$DkfyyIVHApqDKJ1yYQ3ude54VW0wO68cJ4bMLvKSuYWKHdtE.twzK', 'kanoon', 'pud', 21, 'f', 'tanya.pa@ku.th', '0897654756', '231/111', '1123243243242', 'organizer', '/project/picture/user/tiger.jpg', 'y'),
(56, 'surat', '$2y$10$iyLQ0rADQ6sJQ3ugcJsTjegde2sOJjUbXGnckToFc5rDTrESBInVC', 'surat', 'aloha', 21, 'm', 'tanya.pa@ku.th', '0978675754', '231/122', '1243242342342', 'organizer', '/project/picture/user/horse.jpg', 'y');

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
(8, 22, 1, '/project/picture/attendant/S__258072578.jpg', '/project/picture/attendant/card5.jpg', 2, 'r'),
(9, 21, 1, '/project/picture/attendant/card5.jpg', '/project/picture/attendant/S__258072578.jpg', 1, 'c'),
(10, 22, 1, '/project/picture/img/icon.png', '/project/picture/img/icon.png', 2, 'y');

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
  `google_form_url` text NOT NULL,
  `payment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id_ev`, `id_ac`, `name_event`, `detail`, `image`, `teaser_VDO`, `date`, `time`, `location`, `map`, `current_capacity`, `capacity`, `free`, `type`, `precondition`, `create_time`, `status`, `google_form_url`, `payment`) VALUES
(17, 1, 'งานสอนหนังสือ', 'สอนวิชา rov ศึกษา', '/project/picture/event/myhc_44243.jpg,/project/picture/event/T25.jpg', '/project/picture/video/Should I (บอก) - Garena RoV.mp4', '2018-03-19', '19:00', 'R.E.A.D. Cafe, ถนน งามวงศ์วาน แขวง ลาดยาว เขต จตุจักร กรุงเทพมหานคร ประเทศไทย', '13.841278129731574,100.57172910764609', 0, 10, 0, 'education', 'คนติด rov', '2018-03-13 18:37:12', 'y', 'https://docs.google.com/forms/d/1Kro9I0vVQD-UFSpQO89lWoBkUwpgy8KeAlRB_yFZu3E/edit', 'เลขที่บัญชี 111-393-5263 ธนาคารไทยพาณิชย์ จำกัด (มหาชน) สาขารัชโยธิน'),
(18, 1, 'สามแยกปากหวาน 3+1 ', 'การกลับมาสู่สังเวียนคอนเสิร์ตแห่งความฮา 3 แยกปากหวานนำโดย 3 บุรุษผู้ฉุดกราฟวงการเพลงไทยอ๊อฟ ปองศักดิ์, ป๊อป ปองกูล และ ว่าน ธนกฤต\r\n+โอ๊ต ปราโมทย์ !!ความสนุกแบบโคตร ๆ จึงเกิดขึ้น', '/project/picture/event/aHR0cDovL3AxLmlzYW5vb2suY29tL2pvLzAvdWQvNDc4LzIzOTQ2ODkvMjM5NDY4OS10aHVtYm5haWwtMjAxODAxMjAwMzAwMDIuanBn.jpg,/project/picture/event/aHR0cDovL3AxLmlzYW5vb2suY29tL2pvLzAvdWQvNDc4LzIzOTQ0NDEvcG9vLmpwZw==.jpg,/project/picture/event/111.jpg', '/project/picture/video/สามแยกปากหวาน 3   1 จำหน่ายบัตรแล้ววันนี้ ! เพิ่มรอบวันศุกร์ 23 มี.ค. (youtubemp4.to).mp4', '2018-03-24', '19:00', 'รอยัล พารากอน ฮอลล์, กรุงเทพมหานคร, ไทย', '13.74682616342151,100.53505182266235', 0, 250, 1000, 'entertainment', 'อายุ 18+', '2018-03-13 18:43:51', 'y', 'https://docs.google.com/forms/d/1Kro9I0vVQD-UFSpQO89lWoBkUwpgy8KeAlRB_yFZu3E/edit', 'เลขที่บัญชี 111-393-5263  ธนาคารไทยพาณิชย์ จำกัด (มหาชน) สาขารัชโยธิน '),
(19, 55, 'งาน commart 2018', 'ศูนย์รวมอุปกรณ์ it ', '/project/picture/event/event_15042_type50_p2_20180125094759.jpg,/project/picture/event/แถลงข่าวการจัดงาน-COMMART-CONNECT-2018_2.jpg', '/project/picture/video/งาน Commart Work 2017.mp4', '2018-03-21', '11:00', 'ศูนย์การประชุมแห่งชาติสิริกิติ์', '13.724062955899392,100.56027600844868', 0, 2000, 0, 'Technology', '', '2018-03-13 18:50:55', 'y', 'https://docs.google.com/forms/d/1Kro9I0vVQD-UFSpQO89lWoBkUwpgy8KeAlRB_yFZu3E/edit', 'ธนาคารไทยพาณิชย์ จำกัด (มหาชน) สาขารัชโยธิน เลขที่บัญชี 111-393-5263'),
(20, 55, 'งาน rov proleague', 'งานจัดหาทีมอับดับ1ของประเทศไทย', '/project/picture/event/9d9f3d289028971a8ec9faf8588a0ce0.jpg,/project/picture/event/attach-1517556479294.jpg', '/project/picture/video/Garena RoV  Pro League Season 1 Presented by True Move H.mp4', '2018-03-13', '19:00', 'WORKPOINT ENTERTAINMENT, หมู่ 2 ตำบล บางพูน อำเภอเมืองปทุมธานี ปทุมธานี ประเทศไทย', '13.99342898276711,100.59758313039993', 0, 50, 0, 'sport', 'สมาชิกทีมที่แข่ง', '2018-03-13 18:56:00', 'y', 'https://docs.google.com/forms/d/1Kro9I0vVQD-UFSpQO89lWoBkUwpgy8KeAlRB_yFZu3E/edit', 'ธนาคารไทยพาณิชย์ จำกัด (มหาชน) สาขารัชโยธิน เลขที่บัญชี 111-393-5263'),
(21, 56, 'the toy X  MARC ', 'งานเปิดตัวเพลงใหม่ของ ศิลปินมาแรงแห่งปี', '/project/picture/event/maxresdefault.jpg,/project/picture/event/4hylVtAs.jpg,/project/picture/img/icon.png', '/project/picture/video/ที่ปรึกษา - [ Re-produced by TheTOYS ].mp4', '2018-03-18', '19:30', 'Siam Paragon, ถนน พระรามที่ 1 แขวง ปทุมวัน เขต ปทุมวัน กรุงเทพมหานคร ประเทศไทย', '13.746918564437607,100.53463855260293', 1, 200, 200, 'party', '', '2018-03-13 19:01:15', 'n', 'https://docs.google.com/forms/d/1Kro9I0vVQD-UFSpQO89lWoBkUwpgy8KeAlRB_yFZu3E/edit', 'ธนาคารไทยพาณิชย์ จำกัด (มหาชน) สาขารัชโยธิน เลขที่บัญชี 111-393-5263'),
(22, 56, 'งาน show case BNK in KING CAB', 'งานเปิดตัวเพลงใหม่ของ BNK48', '/project/picture/event/BNK48.jpg,/project/picture/event/ดาวน์โหลด.jpg', '/project/picture/video/สกู๊ปกีฬา  เจอกันที่คิงส์คัพ! 16 สาว BNK48 ร่วมเชียร์ทีมชาติไทย.mp4', '2018-03-27', '19:00', 'ราชมังคลากีฬาสถาน (สนามกีฬาแห่งชาติ) กรุงเทพมหานคร จังหวัด กรุงเทพมหานคร ประเทศไทย', '13.75541978804121,100.62241128807216', 2, 2000, 3000, 'sport', '', '2018-03-13 19:05:09', 'y', 'https://docs.google.com/forms/d/1Kro9I0vVQD-UFSpQO89lWoBkUwpgy8KeAlRB_yFZu3E/edit', 'ธนาคารไทยพาณิชย์ จำกัด (มหาชน) สาขารัชโยธิน เลขที่บัญชี 111-393-5263');

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
  MODIFY `id_ac` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `attendants`
--
ALTER TABLE `attendants`
  MODIFY `id_at` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id_co` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id_ev` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
