-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: 2017 年 7 月 12 日 09:59
-- サーバのバージョン： 5.6.35
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_reizo-ko`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `item_table`
--

CREATE TABLE `item_table` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  `indate` datetime NOT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `item_table`
--

INSERT INTO `item_table` (`id`, `name`, `item_name`, `url`, `indate`, `end_date`) VALUES
(0, '', '1', '1', '2017-07-12 15:19:10', '2017-07-19'),
(0, '', '1', '1', '2017-07-12 15:21:29', '2017-07-19'),
(0, '', '2', '2', '2017-07-12 15:50:00', '2017-07-19'),
(0, '', '2', '2', '2017-07-12 15:52:36', '2017-07-19'),
(0, '', '2', '2', '2017-07-12 15:55:51', '2017-07-19'),
(0, '', '2', '2', '2017-07-12 16:01:01', '2017-07-19'),
(0, '', 'noro9', 'noro9', '2017-07-12 16:05:09', '2017-07-19'),
(0, 'bao', 'bao', 'bao', '2017-07-12 16:15:07', '2017-07-19'),
(0, 'bao', 'bao', 'bao', '2017-07-12 16:16:38', '2017-07-19'),
(0, 'bao', 'bao', 'bao', '2017-07-12 16:20:08', '2017-07-19'),
(0, 'bao', 'bao', 'bao', '2017-07-12 16:21:03', '2017-07-19'),
(0, 'bao', 'bao', 'bao', '2017-07-12 16:21:19', '2017-07-19'),
(0, 'bao', 'bao', 'bao', '2017-07-12 16:29:46', '2017-07-19'),
(0, 'r', 'r', 'r', '2017-07-12 16:52:52', '2017-07-19');

-- --------------------------------------------------------

--
-- テーブルの構造 `user_table`
--

CREATE TABLE `user_table` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `item_count` int(3) DEFAULT NULL,
  `kanri_flg` int(1) DEFAULT NULL,
  `life_flg` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `user_table`
--

INSERT INTO `user_table` (`id`, `name`, `email`, `item_count`, `kanri_flg`, `life_flg`) VALUES
(1, '1', '1', NULL, NULL, NULL),
(2, '1', '1', NULL, NULL, NULL),
(3, '1', '1', NULL, NULL, NULL),
(4, '2', '2', NULL, NULL, NULL),
(5, '2', '2', NULL, NULL, NULL),
(6, '2', '2', NULL, NULL, NULL),
(7, '2', '2', NULL, NULL, NULL),
(8, 'noro9', 'noro9', NULL, NULL, NULL),
(9, 'bao', 'bao', NULL, NULL, NULL),
(10, 'bao', 'bao', NULL, NULL, NULL),
(11, 'bao', 'bao', NULL, NULL, NULL),
(12, 'bao', 'bao', NULL, NULL, NULL),
(13, 'bao', 'bao', NULL, NULL, NULL),
(14, 'bao', 'bao', NULL, NULL, NULL),
(15, 'a', 'a', NULL, NULL, NULL),
(16, 'r', 'r', NULL, NULL, NULL),
(17, 'r', 'r', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
