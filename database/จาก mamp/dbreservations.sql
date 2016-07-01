-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Feb 09, 2015 at 03:36 AM
-- Server version: 5.6.17-debug-log
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbreservations`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
`id` int(2) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`) VALUES
(1, 'หน่วยงานอื่นๆ'),
(2, 'คณะวิทยาศาสตร์และเทคโนโลยี'),
(3, 'คณะบริหารธุรกิจ'),
(4, 'หน่วยงานทรัพยากรวาสุกรี'),
(5, 'งานบริการอาคารสถานที่'),
(6, 'งานบริการยานพาหนะ');

-- --------------------------------------------------------

--
-- Table structure for table `janitors`
--

CREATE TABLE IF NOT EXISTS `janitors` (
`id` int(5) NOT NULL,
  `title` char(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `phone` char(15) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `janitors`
--

INSERT INTO `janitors` (`id`, `title`, `name`, `lastname`, `phone`) VALUES
(1, 'นาง', 'นพภา', 'จันภู', '(000)000-0000'),
(2, 'นาง', 'บุญสม', 'กาญชำนาญ', '(000)000-0000'),
(3, 'นาง', 'เฉลียว', 'ม่วงหวาน', '(000)000-0000'),
(4, 'นาง', 'ศิริพร', 'ใหญ่ยิ่ง', '(000)000-0000'),
(5, 'นาง', 'สมทรง', 'อยู่ยืด', '(000)000-0000'),
(6, 'นาง', 'รจนา', 'เชิดชู', '(000)000-0000'),
(7, 'นาง', 'สุวัชรี', 'สุขสวัสดิ์', '(000)000-0000'),
(8, 'นาง', 'ดวงจันทร์', 'นวลสวาทดิ์', '(000)000-0000'),
(9, 'นาง', 'นันทพร', 'สินธุเดช', '(000)000-0000'),
(10, 'นาง', 'สมบูรณ์', 'จำปามา', '(000)000-0000'),
(11, 'นาง', 'สังวาลย์', 'วงษ์วิหล', '(000)000-0000'),
(12, 'นาง', 'สุกัญญา', 'จุลกะทัพพะ', '(000)000-0000'),
(13, 'นาง', 'อุดม', 'มากคุณ', '(000)000-0000'),
(14, 'นางสาว', 'ใจยา', 'มีราชน', '(000)000-0000'),
(15, 'นางสาว', 'รัชนี', 'เจือมณี', '(000)000-0000');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
`id` int(5) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(2) NOT NULL,
  `building` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `size` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `volumn` int(2) NOT NULL,
  `computer` int(2) DEFAULT NULL,
  `projector` int(2) DEFAULT NULL,
  `visualizer` int(2) DEFAULT NULL,
  `microphone` int(2) DEFAULT NULL,
  `television` int(2) DEFAULT NULL,
  `air` int(2) DEFAULT NULL,
  `fan` int(2) DEFAULT NULL,
  `other` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `picture` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `janitor_id` int(11) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `type`, `building`, `size`, `volumn`, `computer`, `projector`, `visualizer`, `microphone`, `television`, `air`, `fan`, `other`, `status`, `picture`, `janitor_id`) VALUES
(1, 'ห้องประชุมเจ้าพระยา', 1, 'ห้อง 8301 อาคาร 8 ชั้น 2', '30x40 เมตร', 200, 2, 4, 4, 10, 4, 4, 10, 'สำหรับงานสัมนา, ประชุม, สนามสอบ', 1, '/upload/LocationPicture/1421860815.jpg', 4),
(2, 'ห้องประชุมกลาโหม', 1, 'ห้อง 7203 อาคาร 7 ชั้น 1', '11x16 เมตร', 20, 1, 1, 1, 2, 1, 1, 0, 'สำหรับประชุมย่อย, ติว', 1, '/upload/LocationPicture/1421924173.jpg', 3),
(3, 'ห้องประชุมอู่ทอง', 1, 'ห้อง 7207 อาคาร 7 ชั้น 1', '11x16 เมตร', 20, 1, 1, 1, 2, 1, 1, 0, 'สำหรับประชุมย่อย, ประชุมทางไกล', 1, '/upload/LocationPicture/1421924197.jpg', 6),
(4, 'ห้องประชุมนเรศวร', 1, 'ห้อง 8302 อาคาร 8 ชั้น 2', '11x16 เมตร', 100, 3, 3, 1, 5, 3, 3, 4, 'สำหรับประชุมทางไกล, อบรม', 1, '/upload/LocationPicture/1421924251.jpg', 1),
(5, 'ห้องโปรเจค', 2, 'ห้อง 4203 อาคาร 4 ชั้น 2', '11x16 เมตร', 20, 20, 1, 1, 1, 0, 1, 4, 'สำหรับนักศึกษาทำโปรเจคและโครงการ', 1, '/upload/LocationPicture/1421924317.jpg', 11),
(6, 'สนามฟุตบอล', 3, 'สนามหญ้า บริเวรทางเข้าออกมหาวิทยาลัย', '1000x1000', 500, 0, 0, 0, 10, 0, 0, 0, 'สำหรับนักกีฬา และ การจัดกีฬาสี, กีฬามหาวิทยาลัย', 1, '/upload/LocationPicture/1421924340.jpg', 9),
(7, 'บ้านเรือนไทย', 4, 'ศูนย์วัฒนธรรมวาสุกรี', '500x300 เม', 300, 1, 2, 0, 5, 0, 0, 0, 'สำหรับจัดงานอำลารุ่น, งานเลี้ยงรุ่น', 1, '/upload/LocationPicture/1421924354.jpg', 13);

-- --------------------------------------------------------

--
-- Table structure for table `locationsgallery`
--

CREATE TABLE IF NOT EXISTS `locationsgallery` (
`id` int(10) NOT NULL,
  `picture` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `location_id` int(5) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `locationsgallery`
--

INSERT INTO `locationsgallery` (`id`, `picture`, `location_id`) VALUES
(1, '/upload/LocationPicture/1421989697.jpg', 1),
(2, '/upload/LocationPicture/1421989714.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `locationtypes`
--

CREATE TABLE IF NOT EXISTS `locationtypes` (
`id` int(2) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `locationtypes`
--

INSERT INTO `locationtypes` (`id`, `name`) VALUES
(1, 'ห้องประชุม'),
(2, 'ห้องเรียน'),
(3, 'สนามฟุตบอล'),
(4, 'เรือนไทย');

-- --------------------------------------------------------

--
-- Table structure for table `navigationbar`
--

CREATE TABLE IF NOT EXISTS `navigationbar` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dropdown` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=32 ;

--
-- Dumping data for table `navigationbar`
--

INSERT INTO `navigationbar` (`id`, `name`, `icon`, `dropdown`, `url`) VALUES
(1, 'หน้าแรก', 'fa-home', 0, 'site/index'),
(2, 'โปรไฟล์ส่วนตัว', '-', 999, 'users/profile'),
(3, 'จัดการเมนู', '-', 999, 'navigationBar/admin'),
(21, 'จัดการข้อมูลประเภทอาคารสถานที่', '-', 999, 'locationtypes/admin'),
(5, 'จัดการข้อมูลอาคารสถานที่', '-', 999, 'locations/admin'),
(4, 'จัดการข้อมูลหน่วยงานภายใน', '-', 999, 'departments/admin'),
(6, 'จัดการข้อมูลผู้ดูแลอาคารสถานที่', '-', 999, 'janitors/admin'),
(23, 'กำหนดสิทธิ์ผู้ใช้งาน', '-', 999, 'users/admin'),
(24, 'จัดการข้อมูลคำร้องขอใช้บริการ', '-', 999, 'reservations/admin'),
(25, 'ข้อมูลอาคารสถานที่', 'fa-building', 0, 'locations/index'),
(26, 'รายการคำร้องขอใช้บริการ', 'fa-th-list', 0, 'reservations/index'),
(27, 'เพิ่มรูปภาพอาคารสถานที่', '-', 999, 'locationsgallery/admin'),
(31, 'สถิติการใช้งานอาคารสถานที่', '-', 999, 'reservations/graph');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE IF NOT EXISTS `reservations` (
`id` int(10) NOT NULL,
  `location_id` int(10) NOT NULL,
  `title` char(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `code` char(20) NOT NULL,
  `status_id` int(2) NOT NULL,
  `position` varchar(50) NOT NULL,
  `department` varchar(50) DEFAULT '0',
  `create` datetime NOT NULL,
  `datestart` date NOT NULL,
  `dateend` date NOT NULL,
  `timestart` varchar(20) NOT NULL,
  `timeend` varchar(20) NOT NULL,
  `volumn` int(3) NOT NULL,
  `detail` text NOT NULL,
  `comment` text,
  `status` int(1) NOT NULL,
  `phone` char(20) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `location_id`, `title`, `name`, `lastname`, `code`, `status_id`, `position`, `department`, `create`, `datestart`, `dateend`, `timestart`, `timeend`, `volumn`, `detail`, `comment`, `status`, `phone`) VALUES
(1, 5, 'นางสาว', 'ปิยมาศ', 'มาติ๊บ', '2-3456-78909-87-6', 1, '-', '2', '2015-01-23 12:00:54', '2015-01-01', '2015-01-01', '07:00', '12:00', 10, 'ทำโปรเจคจบ', '', 3, '(093)919-8808'),
(2, 7, 'นางสาว', 'ประภาพร', 'น่วมโพธิ์', '3-4567-89088-67-5', 1, '-', '2', '2015-01-23 14:47:22', '2015-01-28', '2015-01-29', '17:00', '23:00', 200, 'จัดงานกู้ดบายซีเนียร์', 'ขอโต๊ะ เก้าอี้ และสปอร์ตไลท์ด้วย', 2, '(099)999-9999'),
(3, 2, 'นาย', 'อิศรา', 'คงสระบุตร์', '3-4567-89087-56-4', 1, '-', '2', '2015-01-23 14:48:41', '2015-01-27', '2015-01-27', '08:00', '12:00', 1, 'ติวหนังสือให้รุ่นน้อง', '', 0, '(087)777-7777'),
(4, 3, 'นางสาว', 'กิตติยา', 'รื่นสุข', '3-4567-89098-76-5', 2, 'เจ้าหน้าที่การเงิน', '4', '2015-01-23 14:51:01', '2015-01-29', '2015-01-29', '10:00', '11:00', 1, 'บันทึกรายการสั่งซื้อ', '', 1, '(000)000-0000'),
(5, 5, 'นาย', 'ศราวุธ', 'คำพุ่ม', '2-3456-78900-98-7', 1, '-', '2', '2015-02-08 13:32:47', '2015-02-11', '2015-02-11', '08:00', '17:00', 10, 'ทำโปรเจคจบ', 'ไม่มี', 0, '(083)456-7890'),
(6, 1, 'นางสาว', 'ภัทราภรณ์', 'เกตุปราชญ์', '2-3456-78908-76-5', 1, '-', '2', '2015-02-08 13:33:44', '2015-02-12', '2015-02-12', '08:00', '17:00', 10, 'ทำโปรเจคจบ', '', 0, '(083)456-7898'),
(7, 3, 'นางสาว', 'ไอยดา', 'สูตรสุข', '2-1345-67898-76-5', 1, '-', '2', '2015-02-08 13:35:01', '2015-02-19', '2015-02-19', '08:00', '12:00', 20, 'สัมนา', 'ไม่มี', 0, '(089)456-7890'),
(8, 4, 'นางสาว', 'วรรณภา', 'พันธ์แย้ม', '2-3456-78909-87-6', 2, 'อาจารย์', '3', '2015-02-08 13:36:43', '2015-02-19', '2015-02-19', '09:00', '12:00', 10, 'ติวเข้ม', '', 0, '(098)324-5678'),
(9, 7, 'นางสาว', 'กมลชนก', 'เอมสุข', '3-2456-78909-87-6', 1, 'นักศึกษาชั้นปีที่ 4', '3', '2015-02-08 13:37:43', '2015-02-20', '2015-02-20', '17:00', '23:00', 300, 'จัดงานกู้ดบายซีเนียร์', '', 0, '(089)456-7897'),
(10, 4, 'นางสาว', 'ศุภลักษณ์', 'วิจิตรหงษ์', '3-4567-89087-65-4', 2, '-', '2', '2015-02-08 13:38:43', '2015-02-28', '2015-02-28', '07:00', '12:00', 10, 'ประชุม', '', 0, '(093)456-7890'),
(11, 6, 'นาย', 'ชนานันท์', 'โพธิ์ทอง', '2-3456-78908-76-5', 1, '-', '2', '2015-02-08 13:39:55', '2015-02-13', '2015-02-13', '08:00', '12:00', 1, 'กีฬาสัมพันธ์', '', 0, '(097)678-9876'),
(12, 4, 'นางสาว', 'ญาณีพร', 'เหลืองอ่อน', '2-3456-78908-97-6', 1, '-', '3', '2015-02-08 13:40:36', '2015-02-14', '2015-02-14', '09:00', '12:00', 9, 'ติวหนังสือให้รุ่นน้อง', '', 0, '(056)789-8765'),
(13, 1, 'นางสาว', 'การ์ด', 'จันสายทอง', '2-3456-78909-87-6', 4, '-', '1', '2015-02-08 13:41:44', '2015-02-18', '2015-02-18', '13:00', '17:00', 20, 'สัมนา', '', 0, '(093)456-8798'),
(14, 5, 'นางสาว', 'พิรญาร์', 'วงศ์ประเสริฐ', '4-5678-90987-65-4', 1, '-', '1', '2015-02-08 13:42:32', '2015-02-17', '2015-02-17', '07:00', '10:00', 7, 'ทำโปรเจคจบ', '', 0, '(098)765-6789');

-- --------------------------------------------------------

--
-- Table structure for table `reservationstatus`
--

CREATE TABLE IF NOT EXISTS `reservationstatus` (
`id` int(2) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `reservationstatus`
--

INSERT INTO `reservationstatus` (`id`, `name`, `status`) VALUES
(1, 'นักศึกษา', 0),
(2, 'อาจารย์/เจ้าหน้าที่', 0),
(3, 'สถานศึกษาภายนอก', 1),
(4, 'บริษัท/ห้างหุ้นส่วนจำกัด', 1);

-- --------------------------------------------------------

--
-- Table structure for table `translate`
--

CREATE TABLE IF NOT EXISTS `translate` (
`translate_id` int(11) NOT NULL,
  `language` varchar(5) CHARACTER SET utf8 NOT NULL,
  `name_key` text CHARACTER SET utf8 NOT NULL,
  `message` text CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `count_login` int(11) DEFAULT '1',
  `level_user` int(11) DEFAULT '1'
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `display_name`, `telephone`, `password`, `email`, `picture`, `create_date`, `last_login`, `count_login`, `level_user`) VALUES
(1, 'admin', 'นางสุดารัตน์ สงสังวรณ์', '(093)919-8808', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', '/upload/ProfilePicture/admin.jpg', '2014-03-29 20:59:49', '2015-02-08 17:02:56', 153, 4),
(3, 'member', 'member', '(000)000-0000', 'aa08769cdcb26674c6706093503ff0a3', 'member@Gmail.com', NULL, '2014-12-24 15:44:33', '2014-12-26 10:52:41', 3, 1),
(4, 'manager', 'นายธนโชติ ทองนพคุณ', '(000)000-0000', '1d0258c2440a8d19e716292b231e3190', 'manager@gmail.com', NULL, '2014-12-25 11:38:38', '2015-01-23 16:13:14', 42, 2),
(5, 'exclusive', 'นายประเสริฐ ปุระชาติ', '(000)000-0000', 'a4293995cfbfa9ce60ce71ade2ff75f7', 'exclusive@gmail.com', NULL, '2014-12-25 11:39:18', '2015-02-08 16:16:15', 36, 3);

-- --------------------------------------------------------

--
-- Table structure for table `userslevel`
--

CREATE TABLE IF NOT EXISTS `userslevel` (
`id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `userslevel`
--

INSERT INTO `userslevel` (`id`, `name`) VALUES
(1, 'Member'),
(2, 'Manager'),
(3, 'Exclusive'),
(4, 'Administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `janitors`
--
ALTER TABLE `janitors`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locationsgallery`
--
ALTER TABLE `locationsgallery`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locationtypes`
--
ALTER TABLE `locationtypes`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navigationbar`
--
ALTER TABLE `navigationbar`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservationstatus`
--
ALTER TABLE `reservationstatus`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `translate`
--
ALTER TABLE `translate`
 ADD PRIMARY KEY (`translate_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userslevel`
--
ALTER TABLE `userslevel`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
MODIFY `id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `janitors`
--
ALTER TABLE `janitors`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `locationsgallery`
--
ALTER TABLE `locationsgallery`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `locationtypes`
--
ALTER TABLE `locationtypes`
MODIFY `id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `navigationbar`
--
ALTER TABLE `navigationbar`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `reservationstatus`
--
ALTER TABLE `reservationstatus`
MODIFY `id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `translate`
--
ALTER TABLE `translate`
MODIFY `translate_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `userslevel`
--
ALTER TABLE `userslevel`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
