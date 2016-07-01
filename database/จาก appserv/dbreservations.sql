-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- โฮสต์: localhost
-- เวลาในการสร้าง: 
-- รุ่นของเซิร์ฟเวอร์: 5.0.51
-- รุ่นของ PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- ฐานข้อมูล: `dbreservations`
-- 

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `departments`
-- 

CREATE TABLE `departments` (
  `id` int(2) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- 
-- dump ตาราง `departments`
-- 

INSERT INTO `departments` VALUES (1, 'หน่วยงานอื่นๆ');
INSERT INTO `departments` VALUES (2, 'คณะวิทยาศาสตร์และเทคโนโลยี');
INSERT INTO `departments` VALUES (3, 'คณะบริหารธุรกิจ');
INSERT INTO `departments` VALUES (4, 'หน่วยงานทรัพยากรวาสุกรี');
INSERT INTO `departments` VALUES (5, 'งานบริการอาคารสถานที่');
INSERT INTO `departments` VALUES (6, 'งานบริการยานพาหนะ');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `janitors`
-- 

CREATE TABLE `janitors` (
  `id` int(5) NOT NULL auto_increment,
  `title` char(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `phone` char(15) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

-- 
-- dump ตาราง `janitors`
-- 

INSERT INTO `janitors` VALUES (1, 'นาง', 'นพภา', 'จันภู', '(000)000-0000');
INSERT INTO `janitors` VALUES (2, 'นาง', 'บุญสม', 'กาญชำนาญ', '(000)000-0000');
INSERT INTO `janitors` VALUES (3, 'นาง', 'เฉลียว', 'ม่วงหวาน', '(000)000-0000');
INSERT INTO `janitors` VALUES (4, 'นาง', 'ศิริพร', 'ใหญ่ยิ่ง', '(000)000-0000');
INSERT INTO `janitors` VALUES (5, 'นาง', 'สมทรง', 'อยู่ยืด', '(000)000-0000');
INSERT INTO `janitors` VALUES (6, 'นาง', 'รจนา', 'เชิดชู', '(000)000-0000');
INSERT INTO `janitors` VALUES (7, 'นาง', 'สุวัชรี', 'สุขสวัสดิ์', '(000)000-0000');
INSERT INTO `janitors` VALUES (8, 'นาง', 'ดวงจันทร์', 'นวลสวาทดิ์', '(000)000-0000');
INSERT INTO `janitors` VALUES (9, 'นาง', 'นันทพร', 'สินธุเดช', '(000)000-0000');
INSERT INTO `janitors` VALUES (10, 'นาง', 'สมบูรณ์', 'จำปามา', '(000)000-0000');
INSERT INTO `janitors` VALUES (11, 'นาง', 'สังวาลย์', 'วงษ์วิหล', '(000)000-0000');
INSERT INTO `janitors` VALUES (12, 'นาง', 'สุกัญญา', 'จุลกะทัพพะ', '(000)000-0000');
INSERT INTO `janitors` VALUES (13, 'นาง', 'อุดม', 'มากคุณ', '(000)000-0000');
INSERT INTO `janitors` VALUES (14, 'นางสาว', 'ใจยา', 'มีราชน', '(000)000-0000');
INSERT INTO `janitors` VALUES (15, 'นางสาว', 'รัชนี', 'เจือมณี', '(000)000-0000');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `locations`
-- 

CREATE TABLE `locations` (
  `id` int(5) NOT NULL auto_increment,
  `name` varchar(20) collate utf8_unicode_ci NOT NULL,
  `type` int(2) NOT NULL,
  `building` char(50) collate utf8_unicode_ci NOT NULL,
  `size` char(10) collate utf8_unicode_ci NOT NULL,
  `volumn` int(2) NOT NULL,
  `computer` int(2) default NULL,
  `projector` int(2) default NULL,
  `visualizer` int(2) default NULL,
  `microphone` int(2) default NULL,
  `television` int(2) default NULL,
  `air` int(2) default NULL,
  `fan` int(2) default NULL,
  `other` varchar(100) collate utf8_unicode_ci default NULL,
  `status` int(1) default NULL,
  `picture` varchar(250) collate utf8_unicode_ci default NULL,
  `janitor_id` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

-- 
-- dump ตาราง `locations`
-- 

INSERT INTO `locations` VALUES (1, 'ห้องประชุมเจ้าพระยา', 1, 'ห้อง 8301 อาคาร 8 ชั้น 2', '30x40 เมตร', 200, 2, 4, 4, 10, 4, 4, 10, 'สำหรับงานสัมนา, ประชุม, สนามสอบ', 1, '/upload/LocationPicture/1421860815.jpg', 4);
INSERT INTO `locations` VALUES (2, 'ห้องประชุมกลาโหม', 1, 'ห้อง 7203 อาคาร 7 ชั้น 1', '11x16 เมตร', 20, 1, 1, 1, 2, 1, 1, 0, 'สำหรับประชุมย่อย, ติว', 1, '/upload/LocationPicture/1421924173.jpg', 3);
INSERT INTO `locations` VALUES (3, 'ห้องประชุมอู่ทอง', 1, 'ห้อง 7207 อาคาร 7 ชั้น 1', '11x16 เมตร', 20, 1, 1, 1, 2, 1, 1, 0, 'สำหรับประชุมย่อย, ประชุมทางไกล', 1, '/upload/LocationPicture/1421924197.jpg', 6);
INSERT INTO `locations` VALUES (4, 'ห้องประชุมนเรศวร', 1, 'ห้อง 8302 อาคาร 8 ชั้น 2', '11x16 เมตร', 100, 3, 3, 1, 5, 3, 3, 4, 'สำหรับประชุมทางไกล, อบรม', 1, '/upload/LocationPicture/1421924251.jpg', 1);
INSERT INTO `locations` VALUES (5, 'ห้องโปรเจค', 2, 'ห้อง 4203 อาคาร 4 ชั้น 2', '11x16 เมตร', 20, 20, 1, 1, 1, 0, 1, 4, 'สำหรับนักศึกษาทำโปรเจคและโครงการ', 1, '/upload/LocationPicture/1421924317.jpg', 11);
INSERT INTO `locations` VALUES (6, 'สนามฟุตบอล', 3, 'สนามหญ้า บริเวรทางเข้าออกมหาวิทยาลัย', '1000x1000', 500, 0, 0, 0, 10, 0, 0, 0, 'สำหรับนักกีฬา และ การจัดกีฬาสี, กีฬามหาวิทยาลัย', 1, '/upload/LocationPicture/1421924340.jpg', 9);
INSERT INTO `locations` VALUES (7, 'บ้านเรือนไทย', 4, 'ศูนย์วัฒนธรรมวาสุกรี', '500x300 เม', 300, 1, 2, 0, 5, 0, 0, 0, 'สำหรับจัดงานอำลารุ่น, งานเลี้ยงรุ่น', 1, '/upload/LocationPicture/1421924354.jpg', 13);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `locationsgallery`
-- 

CREATE TABLE `locationsgallery` (
  `id` int(10) NOT NULL auto_increment,
  `picture` varchar(250) collate utf8_unicode_ci NOT NULL,
  `location_id` int(5) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- 
-- dump ตาราง `locationsgallery`
-- 

INSERT INTO `locationsgallery` VALUES (1, '/upload/LocationPicture/1421989697.jpg', 1);
INSERT INTO `locationsgallery` VALUES (2, '/upload/LocationPicture/1421989714.jpg', 4);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `locationtypes`
-- 

CREATE TABLE `locationtypes` (
  `id` int(2) NOT NULL auto_increment,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- 
-- dump ตาราง `locationtypes`
-- 

INSERT INTO `locationtypes` VALUES (1, 'ห้องประชุม');
INSERT INTO `locationtypes` VALUES (2, 'ห้องเรียน');
INSERT INTO `locationtypes` VALUES (3, 'สนามฟุตบอล');
INSERT INTO `locationtypes` VALUES (4, 'เรือนไทย');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `navigationbar`
-- 

CREATE TABLE `navigationbar` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) collate utf8_unicode_ci NOT NULL,
  `icon` varchar(255) collate utf8_unicode_ci NOT NULL,
  `dropdown` int(11) NOT NULL,
  `url` varchar(255) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=33 ;

-- 
-- dump ตาราง `navigationbar`
-- 

INSERT INTO `navigationbar` VALUES (1, 'หน้าแรก', 'fa-home', 0, 'site/index');
INSERT INTO `navigationbar` VALUES (2, 'โปรไฟล์ส่วนตัว', '-', 999, 'users/profile');
INSERT INTO `navigationbar` VALUES (3, 'จัดการเมนู', '-', 999, 'navigationBar/admin');
INSERT INTO `navigationbar` VALUES (21, 'จัดการข้อมูลประเภทอาคารสถานที่', '-', 999, 'locationtypes/admin');
INSERT INTO `navigationbar` VALUES (5, 'จัดการข้อมูลอาคารสถานที่', '-', 999, 'locations/admin');
INSERT INTO `navigationbar` VALUES (4, 'จัดการข้อมูลหน่วยงานภายใน', '-', 999, 'departments/admin');
INSERT INTO `navigationbar` VALUES (6, 'จัดการข้อมูลผู้ดูแลอาคารสถานที่', '-', 999, 'janitors/admin');
INSERT INTO `navigationbar` VALUES (23, 'กำหนดสิทธิ์ผู้ใช้งาน', '-', 999, 'users/admin');
INSERT INTO `navigationbar` VALUES (24, 'จัดการข้อมูลคำร้องขอใช้บริการ', '-', 999, 'reservations/admin');
INSERT INTO `navigationbar` VALUES (25, 'ข้อมูลอาคารสถานที่', 'fa-building', 0, 'locations/index');
INSERT INTO `navigationbar` VALUES (26, 'รายการคำร้องขอใช้บริการ', 'fa-th-list', 0, 'reservations/index');
INSERT INTO `navigationbar` VALUES (27, 'เพิ่มรูปภาพอาคารสถานที่', '-', 999, 'locationsgallery/admin');
INSERT INTO `navigationbar` VALUES (31, 'รายงานสถิติ', '-', 999, 'reservations/reportuse');
INSERT INTO `navigationbar` VALUES (32, 'กราฟสถิติโดยรวม', '-', 999, 'reservations/graph');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `reservations`
-- 

CREATE TABLE `reservations` (
  `id` int(10) NOT NULL auto_increment,
  `location_id` int(10) NOT NULL,
  `title` char(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `code` char(20) NOT NULL,
  `status_id` int(2) NOT NULL,
  `position` varchar(50) NOT NULL,
  `department` varchar(50) default '0',
  `create` datetime NOT NULL,
  `datestart` date NOT NULL,
  `dateend` date NOT NULL,
  `timestart` varchar(20) NOT NULL,
  `timeend` varchar(20) NOT NULL,
  `volumn` int(3) NOT NULL,
  `detail` text NOT NULL,
  `comment` text,
  `status` int(1) NOT NULL,
  `phone` char(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

-- 
-- dump ตาราง `reservations`
-- 

INSERT INTO `reservations` VALUES (1, 5, 'นางสาว', 'ปิยมาศ', 'มาติ๊บ', '2-3456-78909-87-6', 1, '-', '2', '2015-01-23 12:00:54', '2015-01-01', '2015-01-01', '07:00', '12:00', 10, 'ทำโปรเจคจบ', '', 3, '(093)919-8808');
INSERT INTO `reservations` VALUES (2, 7, 'นางสาว', 'ประภาพร', 'น่วมโพธิ์', '3-4567-89088-67-5', 1, '-', '2', '2015-01-23 14:47:22', '2015-01-28', '2015-01-29', '17:00', '23:00', 200, 'จัดงานกู้ดบายซีเนียร์', 'ขอโต๊ะ เก้าอี้ และสปอร์ตไลท์ด้วย', 2, '(099)999-9999');
INSERT INTO `reservations` VALUES (3, 2, 'นาย', 'อิศรา', 'คงสระบุตร์', '3-4567-89087-56-4', 1, '-', '2', '2015-01-23 14:48:41', '2015-01-27', '2015-01-27', '08:00', '12:00', 1, 'ติวหนังสือให้รุ่นน้อง', '', 0, '(087)777-7777');
INSERT INTO `reservations` VALUES (4, 3, 'นางสาว', 'กิตติยา', 'รื่นสุข', '3-4567-89098-76-5', 2, 'เจ้าหน้าที่การเงิน', '4', '2015-01-23 14:51:01', '2015-01-29', '2015-01-29', '10:00', '11:00', 1, 'บันทึกรายการสั่งซื้อ', '', 1, '(000)000-0000');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `reservationstatus`
-- 

CREATE TABLE `reservationstatus` (
  `id` int(2) NOT NULL auto_increment,
  `name` varchar(50) collate utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

-- 
-- dump ตาราง `reservationstatus`
-- 

INSERT INTO `reservationstatus` VALUES (1, 'นักศึกษา', 0);
INSERT INTO `reservationstatus` VALUES (2, 'อาจารย์/เจ้าหน้าที่', 0);
INSERT INTO `reservationstatus` VALUES (3, 'สถานศึกษาภายนอก', 1);
INSERT INTO `reservationstatus` VALUES (4, 'บริษัท/ห้างหุ้นส่วนจำกัด', 1);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `translate`
-- 

CREATE TABLE `translate` (
  `translate_id` int(11) NOT NULL auto_increment,
  `language` varchar(5) character set utf8 NOT NULL,
  `name_key` text character set utf8 NOT NULL,
  `message` text character set utf8 NOT NULL,
  PRIMARY KEY  (`translate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- dump ตาราง `translate`
-- 


-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `users`
-- 

CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(32) collate utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) collate utf8_unicode_ci NOT NULL,
  `telephone` varchar(255) collate utf8_unicode_ci NOT NULL,
  `password` varchar(32) collate utf8_unicode_ci NOT NULL,
  `email` varchar(100) collate utf8_unicode_ci NOT NULL,
  `picture` varchar(255) collate utf8_unicode_ci default NULL,
  `create_date` datetime default NULL,
  `last_login` datetime default NULL,
  `count_login` int(11) default '1',
  `level_user` int(11) default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

-- 
-- dump ตาราง `users`
-- 

INSERT INTO `users` VALUES (1, 'admin', 'นางสุดารัตน์ สงสังวรณ์', '(093)919-8808', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', '/upload/ProfilePicture/admin.jpg', '2014-03-29 20:59:49', '2015-02-08 09:39:14', 156, 4);
INSERT INTO `users` VALUES (3, 'member', 'member', '(000)000-0000', 'aa08769cdcb26674c6706093503ff0a3', 'member@Gmail.com', NULL, '2014-12-24 15:44:33', '2014-12-26 10:52:41', 3, 1);
INSERT INTO `users` VALUES (4, 'manager', 'นายธนโชติ ทองนพคุณ', '(000)000-0000', '1d0258c2440a8d19e716292b231e3190', 'manager@gmail.com', NULL, '2014-12-25 11:38:38', '2015-02-09 09:37:15', 46, 2);
INSERT INTO `users` VALUES (5, 'exclusive', 'นายประเสริฐ ปุระชาติ', '(000)000-0000', 'a4293995cfbfa9ce60ce71ade2ff75f7', 'exclusive@gmail.com', NULL, '2014-12-25 11:39:18', '2015-02-08 09:39:56', 36, 3);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `userslevel`
-- 

CREATE TABLE `userslevel` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

-- 
-- dump ตาราง `userslevel`
-- 

INSERT INTO `userslevel` VALUES (1, 'Member');
INSERT INTO `userslevel` VALUES (2, 'Manager');
INSERT INTO `userslevel` VALUES (3, 'Exclusive');
INSERT INTO `userslevel` VALUES (4, 'Administrator');
