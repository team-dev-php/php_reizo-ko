-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 18, 2017 at 03:39 AM
-- Server version: 5.6.33
-- PHP Version: 7.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `shoheikoya_gs_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_nickname` varchar(535) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `item_count` int(3) DEFAULT NULL,
  `favorite_dish` varchar(535) COLLATE utf8_unicode_ci DEFAULT NULL,
  `belong_to` varchar(535) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(535) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(535) COLLATE utf8_unicode_ci DEFAULT NULL,
  `friends` varchar(535) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '友達の数が多くなってきたら対象が必要',
  `kanri_flg` int(1) DEFAULT NULL,
  `life_flg` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`id`, `name`, `user_nickname`, `email`, `item_count`, `favorite_dish`, `belong_to`, `address`, `icon`, `friends`, `kanri_flg`, `life_flg`) VALUES
(1, 'テスト太郎', 'テスト太郎', ' test@test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '小山将平', '変更', 's.koyama1011@gmail.com', 46, '大馬鹿やろう', 'G\'s', '124', 'https://lh6.googleusercontent.com/-O-QaQblCeQY/AAAAAAAAAAI/AAAAAAAAOuA/vTND7fkPhIM/s96-c/photo.jpg', NULL, NULL, 1),
(12, '武田龍', '武田龍', 'mutarone@gmail.com', 2, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(14, 'Gohei Kusumi', 'Gohei Kusumi', 'gkusumi11@gmail.com', 1, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(28, 'Asa Sho', 'Asa Sho', 'asa871007@gmail.com', 5, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(29, 'Go Ku', 'Go Ku', 'goku0127210@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 'Akio Yonekura', 'Akio Yonekura', 'yonekura907@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=503;