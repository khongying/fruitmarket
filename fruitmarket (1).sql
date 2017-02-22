-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2017 at 01:32 PM
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
-- Table structure for table `backend`
--

CREATE TABLE `backend` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `backend`
--

INSERT INTO `backend` (`id`, `username`, `password`) VALUES
(1, 'khongying', '230b267878ae0ea6a6852621e249fea5');

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
-- Table structure for table `laborcost`
--

CREATE TABLE `laborcost` (
  `price` int(11) NOT NULL COMMENT 'บาท/กิโลกรัม'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `laborcost`
--

INSERT INTO `laborcost` (`price`) VALUES
(10);

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
  `date_save` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `code`, `name`, `detail`, `price`, `img`, `num`, `date_save`) VALUES
(2, 'D-0001', 'Durian Freezedried', '  ทุเรียนหมอนทองอบกรอบ freezedied\r\nอบกรอบ ละลายในปาก หอมทุเรียนหมอนทอง (110กรัม)    ', 170, '7f4a5fbbe9ae3e47706c75a3effe9717.jpg', 1, '2017-02-21 11:56:53');

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
  `id` int(11) NOT NULL,
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
(1, 'kongying_99_kunket@hotmail.com', '53e186ab093989da517ec0813c84fadd', 'คงยิ่ง คุณเขต', '1994-08-21', '15/10 ม.5 ต.พลิ้ว อ.แหลมสิงห์', '0922723107', 'M', 'T', '๊U');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `product`
--
ALTER TABLE `product`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `travel`
--
ALTER TABLE `travel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
