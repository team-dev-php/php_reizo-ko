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
-- Table structure for table `frigo_itemlog_table`
--

CREATE TABLE `frigo_itemlog_table` (
  `id` int(11) NOT NULL,
  `name` varchar(535) NOT NULL,
  `item_name` varchar(535) NOT NULL,
  `indate` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `category` varchar(535) DEFAULT NULL,
  `finish_flg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `frigo_itemlog_table`
--

INSERT INTO `frigo_itemlog_table` (`id`, `name`, `item_name`, `indate`, `end_date`, `category`, `finish_flg`) VALUES
(1, '小山将平', 'ほうれん草', '2017-07-15', NULL, NULL, 0),
(2, '小山将平', 'ニンジン', '2017-07-15', NULL, NULL, 0),
(3, '小山将平', 'ニンジン', '2017-07-15', NULL, NULL, 0),
(4, '武田龍', 'J', '2017-07-16', NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `frigo_itemlog_table`
--
ALTER TABLE `frigo_itemlog_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `frigo_itemlog_table`
--
ALTER TABLE `frigo_itemlog_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;