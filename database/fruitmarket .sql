-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2017 at 04:43 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fruitmarket`
--

-- --------------------------------------------------------

--
-- Table structure for table `ask`
--

CREATE TABLE `ask` (
  `id_ask` int(4) UNSIGNED ZEROFILL NOT NULL,
  `create_date` datetime DEFAULT NULL,
  `q_ask` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `detail` text COLLATE utf8_unicode_ci,
  `user_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ask`
--

INSERT INTO `ask` (`id_ask`, `create_date`, `q_ask`, `detail`, `user_id`) VALUES
(0001, '2017-03-16 01:00:22', 'รู้จักกับ Front-end Framework', 'ก่อนอื่นต้องเข้าใจก่อนครับ ว่า Bootstrap นี้มันคือ Front-end Framework ตัวหนึ่ง คำว่า front-end หมายถึง ส่วนที่แสดงผลให้ Users ทั่วไปเห็น พูดง่ายๆ ก็คือหน้าเว็บไซต์ของเรานั่นเอง ส่วนคำว่า framework นั้นจะหมายถึง สิ่งที่เข้ามาช่วยกำหนดกรอบของการทำงานให้เป็นไปในทางเดียวกันครับ ในสมัยก่อน เรายังไม่มี framework ปัญหาที่เราพบเป็นประจำในการทำงานร่วมกันก็คือ ต่างคนต่างทำ คนหนึ่งเขียนแบบหนึ่ง ส่วนอีกคนก็เขียนอีกแบบหนึ่ง พอใครจะมาแก้งานต่อ หรือพัฒนาต่อ ก็จะไม่เข้าใจกัน เพราะไม่ได้มีการกำหนดข้อตกลงกันไว้ล่วงหน้า ทำให้เสียเวลาโดยใช่เหตุ framework จะเข้ามาแก้ปัญหาตรงนี้ครับ โดยมันจะเป็นตัวกำหนดให้สมาชิกในทีมเข้าใจตรงกัน ปฏิบัติไปในแนวทางเดียวกัน สมมติ ว่าโจทย์ของเราคือการสร้างกล่องสี่เหลี่ยมสีน้ำเงินขึ้นมาสักกล่องหนึ่ง ถ้าเราใช้ framework แล้วล่ะก็ พนักงานแต่ละคนจะใช้วิธีเดียวกันในการสร้างกล่องนี้ขึ้นมา แม้ว่าพวกเค้าจะไม่ได้คุยกันเลยก็ตาม และพนักงานคนอื่นๆ ที่ไม่เคยทราบโจทย์มาก่อน ก็จะสามารถรู้ได้ทันทีว่าโค้ดที่พวกเค้าเขียนขึ้นมามันคือการสร้างกล่องสีน้ำเงิน', 2),
(0002, '2017-03-16 01:56:25', 'asdsad', 'asdasd', 2);

-- --------------------------------------------------------

--
-- Table structure for table `backend`
--

CREATE TABLE `backend` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `backend`
--

INSERT INTO `backend` (`id`, `username`, `password`, `full_name`, `role`) VALUES
(1, 'test', '827ccb0eea8a706c4c34a16891f84e7b', 'Khongying Khunkhet', 'power_admin'),
(2, 'lottae', '827ccb0eea8a706c4c34a16891f84e7b', 'Lottae Khongying', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `text`) VALUES
(1, '<h3><span style="color: #0000ff;">Fruit Market ยินดีต้อนรับ</span></h3>\r\n<hr />\r\n<p>มีสินค้าให้ลูกค้าเลือกซื้อ เลือกช็อปกันได้ตามสบายเลย ทั้งผลไม้และผลไม้แปลรูป</p>\r\n<h3><span style="color: #0000ff;">สำหรับคนที่ชอบท่องเที่ยว</span></h3>\r\n<ul>\r\n<li>เรามีสวนผลไม้มาแนะนำ</li>\r\n</ul>');

-- --------------------------------------------------------

--
-- Table structure for table `list_order`
--

CREATE TABLE `list_order` (
  `id` int(11) NOT NULL,
  `product_id` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `sum` int(11) NOT NULL,
  `qt_order_id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `list_order`
--

INSERT INTO `list_order` (`id`, `product_id`, `sum`, `qt_order_id`, `create_date`) VALUES
(5, 'M-0001', 4, 0003, '2017-03-26 23:40:55'),
(6, 'L-0001', 1, 0003, '2017-03-26 23:40:55'),
(7, 'D-0001', 1, 0003, '2017-03-26 23:40:55'),
(8, 'D-0002', 1, 0003, '2017-03-26 23:40:55'),
(9, 'M-0001', 1, 0004, '2017-03-27 01:45:31'),
(10, 'L-0001', 1, 0004, '2017-03-27 01:45:31'),
(11, 'D-0002', 1, 0004, '2017-03-27 01:45:31'),
(12, 'M-0001', 1, 0005, '2017-03-28 12:54:30'),
(13, 'L-0001', 3, 0005, '2017-03-28 12:54:30');

-- --------------------------------------------------------

--
-- Table structure for table `pay_qt`
--

CREATE TABLE `pay_qt` (
  `id` int(11) NOT NULL,
  `user_id` int(7) NOT NULL,
  `qt_id` int(5) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pay_qt`
--

INSERT INTO `pay_qt` (`id`, `user_id`, `qt_id`, `name`, `total`, `img`, `date_time`) VALUES
(6, 1, 3, 'คงยิ่ง คุณเขต', 384, '169f1fb5907014bec9c764cde95f6f0b.jpg', '2017-03-27 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `id` int(5) NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`id`, `full_name`, `address`, `phone`, `status`) VALUES
(1, 'สมน้อย มีมาก', '15/10 ม.5 ต.พลิ้ว อ.แหลมสิงห์ จ.จันทบุรี 22190', '0922723107', 'A'),
(2, 'คงยิ่ง คุณเขต', '20/6 ม.12 ต.พลิ้ว อ.แหลมสิงห์ จ.จันทบุรี 22190', '0870060160', 'A'),
(3, 'สมพร สามารถ', '99/1 ม.1 ต.พลิ้ว อ.แหลมสิงห์ จ.จันทบุรี 22190', '0975412306', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `person_worker`
--

CREATE TABLE `person_worker` (
  `id` int(11) NOT NULL,
  `id_worker` int(11) NOT NULL,
  `person_id` int(5) NOT NULL,
  `labor_cost` text COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `status` varchar(11) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `person_worker`
--

INSERT INTO `person_worker` (`id`, `id_worker`, `person_id`, `labor_cost`, `date`, `status`) VALUES
(1, 1, 1, '275', '2017-03-23', 'A'),
(2, 2, 2, '300', '2017-03-23', 'A'),
(3, 3, 3, '450', '2017-03-23', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `post_qt`
--

CREATE TABLE `post_qt` (
  `id` int(3) NOT NULL,
  `user_id` int(11) NOT NULL,
  `qt_id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post_qt`
--

INSERT INTO `post_qt` (`id`, `user_id`, `qt_id`, `address`, `phone`) VALUES
(3, 1, 0003, '15/10 ม.5 ต.พลิ้ว อ.แหลมสิงห์ จ.จันทบุรึ 22190', '092-272-3107'),
(4, 1, 0004, '15/10 ม.5 ต.พลิ้ว อ.แหลมสิงห์', '092-272-3107'),
(5, 1, 0005, '15/10 ม.5 ต.พลิ้ว อ.แหลมสิงห์', '092-272-3107');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `code` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `detail` text COLLATE utf8_unicode_ci,
  `price` float DEFAULT NULL,
  `img` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `num` int(11) NOT NULL,
  `id_tag` int(2) NOT NULL DEFAULT '1',
  `date_save` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `code`, `name`, `detail`, `price`, `img`, `num`, `id_tag`, `date_save`) VALUES
(1, 'M-0001', 'มังคุด(สด)', '  รสหวานชื่นใจ สด ๆ จากสวนผลไม้ รับรองความอร่อย  (1 กิโลกรัม)          ', 30, 'ce594a8366b5a368a557910b6ca834d2.jpg', 5, 2, '2017-03-28 06:24:29'),
(2, 'L-0001', 'ลองกอง', ' ผลเป็นช่อแน่นติดก้านทรงกลมมีรสชาติหวาน อร่อยแน่นอน  (1 กิโลกรัม)', 35, '7603bf0aabbd9a6810f4914f83dd990a.jpg', 10, 1, '2017-03-23 07:17:00'),
(3, 'R-0001', 'เงาะ (โรงเรียน) ', 'เงาะ พันธุ์ "เงาะโรงเรียน" รสหวานชื่นใจ อร่อยสมราคา (1 กิโลกรัม)', 35, '64984218ed0b92fd35815049d147d208.jpg', 10, 1, '2017-03-23 07:16:38'),
(4, 'D-0001', 'Durian Freezedried(ถุงเล็ก)', ' ทุเรียนหมอนทอง 100% หอม กรอบ ละลายในปาก ลองรับรองติดใจ ของอร่อยคุณภาพ\r\n(ถุงเล็ก35กรัม) ', 59, '72334507a0802c697e2978242688241e.jpg', 10, 3, '2017-03-28 06:39:39'),
(5, 'D-0002', 'Durian Freezedried(ถุงใหญ่)', ' ทุเรียนหมอนทอง 100% หอม กรอบ ละลายในปาก ลองรับรองติดใจ ของอร่อยคุณภาพ\r\n(ถุงเล็ก110กรัม) ', 170, '1498d9ac54cacee71d581e37ae9a204c.jpg', 10, 3, '2017-03-28 06:39:46');

-- --------------------------------------------------------

--
-- Table structure for table `qt_order`
--

CREATE TABLE `qt_order` (
  `id_qt` int(4) UNSIGNED ZEROFILL NOT NULL,
  `user_id` int(11) NOT NULL,
  `status_qt_id` int(2) NOT NULL DEFAULT '1',
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `qt_order`
--

INSERT INTO `qt_order` (`id_qt`, `user_id`, `status_qt_id`, `create_date`) VALUES
(0003, 1, 2, '2017-03-26 23:40:55'),
(0004, 1, 1, '2017-03-27 01:45:31'),
(0005, 1, 1, '2017-03-28 12:54:30');

-- --------------------------------------------------------

--
-- Table structure for table `qt_status`
--

CREATE TABLE `qt_status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `qt_status`
--

INSERT INTO `qt_status` (`id`, `name`) VALUES
(1, 'รอแจ้งชำระ'),
(2, 'รอตรวจสอบ'),
(3, 'เตรียมจัดส่ง');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `id_reply` int(4) UNSIGNED ZEROFILL NOT NULL,
  `id_ask` int(4) NOT NULL,
  `create_date` datetime NOT NULL,
  `user_id` int(255) NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`id_reply`, `id_ask`, `create_date`, `user_id`, `detail`) VALUES
(0001, 1, '2017-03-16 01:00:55', 1, 'ขอบคุณครับ'),
(0002, 1, '2017-03-16 01:20:51', 2, 'gggggggggadasdas'),
(0005, 1, '2017-03-23 16:48:48', 1, 'echo 555;'),
(0007, 1, '2017-03-23 16:50:22', 1, '5555; ?>'),
(0008, 1, '2017-03-23 16:51:27', 1, '<script> alert("aaa") </script>');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `tag` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `tag`) VALUES
(1, 'มาใหม่'),
(2, 'ขายดี'),
(3, 'แนะนำ');

-- --------------------------------------------------------

--
-- Table structure for table `travel`
--

CREATE TABLE `travel` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `img_pro` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `img_1` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `img_2` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `img_3` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `img_4` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `lat` text COLLATE utf8_unicode_ci NOT NULL,
  `lng` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `travel`
--

INSERT INTO `travel` (`id`, `name`, `img_pro`, `detail`, `img_1`, `img_2`, `img_3`, `img_4`, `lat`, `lng`, `status`) VALUES
(1, 'สวนสาวสุดใจ ', '1305258357.jpg', 'สวนสาวสุดใจ คิดค่าเข้า รายคน คนละ 99 บาท พาชมสวน กินผลไม้ได้ไม่อั้น เช่น ทุเรียน มังคุด ลองกอง และอีกมากมาย รับรองอิ่มท้องกายและใจกันเลยที่เดียว หากใครอยากซื้อผลไม้กลับบ้านก้อซื้อได้ค่ะ ราคาไม่แพง สวนสาวสุดใจตั้ง อยู่ที่ หมู่ที่1 ตำบลพลิ้ว อำเภอแหลมสิงห์ จังหวัดจันทบุรี โทร 081-3773190 , 087-5144949  , 039-434092', '1305258382.jpg', '1305258643.jpg', '1305258916.jpg', '1305259003.jpg', '12.518323', '102.155395', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sex` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `news` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'F',
  `status` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '๊U'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `fullname`, `birthday`, `address`, `phone`, `sex`, `news`, `status`) VALUES
(000001, 'kongying_99_kunket@hotmail.com', '53e186ab093989da517ec0813c84fadd', 'คงยิ่ง คุณเขต', '1994-08-21', '15/10 ม.5 ต.พลิ้ว อ.แหลมสิงห์', '092-272-3107', 'M', 'T', 'U'),
(000002, 'a@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Lottae', '1996-02-14', '20/6 ม.12 ต.พลิ้ว อ.แหลมสิงห์ จ.จันทบุรี 22190', '0870060160', 'F', 'F', '๊U'),
(000003, 'test@gmail.com', '587ad9bc956aa4cec2a63f35aa04e6d9', 'Khongying Khunkhet', '2017-03-11', '15/10 ม.5 ต.พลิ้ว อ.แหลมสิงห์', '0870060160', 'F', 'F', '๊U');

-- --------------------------------------------------------

--
-- Table structure for table `worker`
--

CREATE TABLE `worker` (
  `id` int(11) NOT NULL,
  `product` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `worker`
--

INSERT INTO `worker` (`id`, `product`, `kg`) VALUES
(1, 'ทุเรียน', 55),
(2, 'มังคุด', 20),
(3, 'ลองกอง', 45),
(4, 'เงาะ', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ask`
--
ALTER TABLE `ask`
  ADD PRIMARY KEY (`id_ask`);

--
-- Indexes for table `backend`
--
ALTER TABLE `backend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_order`
--
ALTER TABLE `list_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay_qt`
--
ALTER TABLE `pay_qt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `person_worker`
--
ALTER TABLE `person_worker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_qt`
--
ALTER TABLE `post_qt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qt_order`
--
ALTER TABLE `qt_order`
  ADD PRIMARY KEY (`id_qt`);

--
-- Indexes for table `qt_status`
--
ALTER TABLE `qt_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id_reply`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `travel`
--
ALTER TABLE `travel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`,`email`);

--
-- Indexes for table `worker`
--
ALTER TABLE `worker`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ask`
--
ALTER TABLE `ask`
  MODIFY `id_ask` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `backend`
--
ALTER TABLE `backend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `list_order`
--
ALTER TABLE `list_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `pay_qt`
--
ALTER TABLE `pay_qt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `person_worker`
--
ALTER TABLE `person_worker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `post_qt`
--
ALTER TABLE `post_qt`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `qt_order`
--
ALTER TABLE `qt_order`
  MODIFY `id_qt` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `qt_status`
--
ALTER TABLE `qt_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `id_reply` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `travel`
--
ALTER TABLE `travel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `worker`
--
ALTER TABLE `worker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
