-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 12, 2017 at 01:22 PM
-- Server version: 5.6.33
-- PHP Version: 7.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `shoheikoya_gs_db`
--

-- --------------------------------------------------------


-- --------------------------------------------------------


-- --------------------------------------------------------

--
-- Table structure for table `item_table`
--

CREATE TABLE `item_table` (
  `id` int(12) NOT NULL,
  `name` varchar(535) COLLATE utf8_unicode_ci NOT NULL,
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(535) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  `indate` datetime NOT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `item_table`
--

INSERT INTO `item_table` (`id`, `name`, `item_name`, `category`, `url`, `indate`, `end_date`) VALUES
(2, '小山将平', 'test1', 'category1', '0', '2017-07-11 14:01:10', '2017-07-11'),
(3, '小山将平', 'test2', 'category2', '0', '2017-07-11 14:36:18', '2017-07-11'),
(4, '', 'test3', 'category3', 'teest3', '2017-07-11 14:37:53', '2017-07-11'),
(5, '', 'クーリッシュ バニラ', NULL, 'http://www.matsukiyo.co.jp/medias/49386288-1.jpg?context=bWFzdGVyfGltYWdlc3wyOTQ0M3xpbWFnZS9qcGVnfHN5cy1tYXN0ZXIvaW1hZ2VzL2hmMC9oYTkvODgzNjUwNDUxODY4Ni80OTM4NjI4OF8xLmpwZ3wzMWM0M2ZjYjZmODc3NDcyNGQ4MDZjZGVhMWNlNTlkYjEwYjBmN2NkN2E0ZjA5YzJiZDJiNmQ5OThhNTI4NDA2', '2017-07-11 18:45:46', '2017-07-18'),
(6, '小山将平', 'クーリッシュ バニラ', NULL, 'http://www.matsukiyo.co.jp/medias/49386288-1.jpg?context=bWFzdGVyfGltYWdlc3wyOTQ0M3xpbWFnZS9qcGVnfHN5cy1tYXN0ZXIvaW1hZ2VzL2hmMC9oYTkvODgzNjUwNDUxODY4Ni80OTM4NjI4OF8xLmpwZ3wzMWM0M2ZjYjZmODc3NDcyNGQ4MDZjZGVhMWNlNTlkYjEwYjBmN2NkN2E0ZjA5YzJiZDJiNmQ5OThhNTI4NDA2', '2017-07-11 18:54:48', '2017-07-18'),
(7, '', 'クーリッシュ バニラ', NULL, 'http://www.matsukiyo.co.jp/medias/49386288-1.jpg?context=bWFzdGVyfGltYWdlc3wyOTQ0M3xpbWFnZS9qcGVnfHN5cy1tYXN0ZXIvaW1hZ2VzL2hmMC9oYTkvODgzNjUwNDUxODY4Ni80OTM4NjI4OF8xLmpwZ3wzMWM0M2ZjYjZmODc3NDcyNGQ4MDZjZGVhMWNlNTlkYjEwYjBmN2NkN2E0ZjA5YzJiZDJiNmQ5OThhNTI4NDA2', '2017-07-11 18:59:05', '2017-07-18'),
(8, '', 'クーリッシュ バニラ', NULL, 'http://www.matsukiyo.co.jp/medias/49386288-1.jpg?context=bWFzdGVyfGltYWdlc3wyOTQ0M3xpbWFnZS9qcGVnfHN5cy1tYXN0ZXIvaW1hZ2VzL2hmMC9oYTkvODgzNjUwNDUxODY4Ni80OTM4NjI4OF8xLmpwZ3wzMWM0M2ZjYjZmODc3NDcyNGQ4MDZjZGVhMWNlNTlkYjEwYjBmN2NkN2E0ZjA5YzJiZDJiNmQ5OThhNTI4NDA2', '2017-07-11 21:24:27', '2017-07-18');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `item_count` int(3) NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item_table`
--
ALTER TABLE `item_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

-- AUTO_INCREMENT for table `item_table`
--
ALTER TABLE `item_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;