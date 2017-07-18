-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 18, 2017 at 03:37 AM
-- Server version: 5.6.33
-- PHP Version: 7.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `shoheikoya_gs_db`
--

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
(6, '小山将平', 'クーリッシュ バニラ', NULL, 'http://www.matsukiyo.co.jp/medias/49386288-1.jpg?context=bWFzdGVyfGltYWdlc3wyOTQ0M3xpbWFnZS9qcGVnfHN5cy1tYXN0ZXIvaW1hZ2VzL2hmMC9oYTkvODgzNjUwNDUxODY4Ni80OTM4NjI4OF8xLmpwZ3wzMWM0M2ZjYjZmODc3NDcyNGQ4MDZjZGVhMWNlNTlkYjEwYjBmN2NkN2E0ZjA5YzJiZDJiNmQ5OThhNTI4NDA2', '2017-07-11 18:54:48', '2017-07-14'),
(9, '小山将平', 'ソフトサラダ 20枚', NULL, 'https://shop.r10s.jp/auc-kanbi/cabinet/4901313037508.gif', '2017-07-12 20:27:27', '2017-07-15'),
(10, '小山将平', 'ソフトサラダ 20枚', NULL, 'https://shop.r10s.jp/auc-kanbi/cabinet/4901313037508.gif', '2017-07-12 20:30:53', '2017-07-19'),
(11, '小山将平', 'ソフトサラダ 20枚', NULL, 'https://shop.r10s.jp/auc-kanbi/cabinet/4901313037508.gif', '2017-07-12 20:35:39', '2017-07-19'),
(12, '小山将平', 'ソフトサラダ 20枚', NULL, 'https://shop.r10s.jp/auc-kanbi/cabinet/4901313037508.gif', '2017-07-12 20:35:57', '2017-07-19'),
(13, '小山将平', 'ソフトサラダ 20枚', NULL, 'https://shop.r10s.jp/auc-kanbi/cabinet/4901313037508.gif', '2017-07-12 20:37:10', '2017-07-19'),
(14, '小山将平', 'ソフトサラダ 20枚', NULL, 'https://shop.r10s.jp/auc-kanbi/cabinet/4901313037508.gif', '2017-07-12 20:39:45', '2017-07-19'),
(15, '小山将平', 'ICレコーダー', NULL, 'https://www.bestgate.net/graph/icrecorder_olympusv62slv.png', '2017-07-12 20:43:35', '2017-07-19'),
(16, '小山将平', 'ICレコーダー', NULL, 'https://www.bestgate.net/graph/icrecorder_olympusv62slv.png', '2017-07-12 20:49:56', '2017-07-19'),
(17, '小山将平', 'ICレコーダー', NULL, 'https://www.bestgate.net/graph/icrecorder_olympusv62slv.png', '2017-07-12 20:52:04', '2017-07-19'),
(18, '小山将平', 'ICレコーダー', NULL, 'https://www.bestgate.net/graph/icrecorder_olympusv62slv.png', '2017-07-12 20:52:21', '2017-07-19'),
(19, '小山将平', 'ICレコーダー', NULL, 'https://www.bestgate.net/graph/icrecorder_olympusv62slv.png', '2017-07-12 20:52:55', '2017-07-19'),
(20, '小山将平', 'ソフトサラダ 20枚', NULL, 'https://shop.r10s.jp/auc-kanbi/cabinet/4901313037508.gif', '2017-07-12 20:57:22', '2017-07-16'),
(25, '小山将平', 'ICレコーダー', NULL, 'https://www.bestgate.net/graph/icrecorder_olympusv62slv.png', '2017-07-12 21:05:44', '2017-07-19'),
(27, '武田龍', 'キリン メッツ コーラ 270ml', NULL, 'https://thumbnail.image.rakuten.co.jp/@0_mall/nakae/cabinet/d/4909411073152.jpg?_ex=200x200&s=2&r=1', '2017-07-12 21:06:37', '2017-07-19'),
(29, 'Gohei Kusumi', '共立素焼きアーモンド', NULL, 'https://thumbnail.image.rakuten.co.jp/@0_mall/soukai/cabinet/67/4901325201867.jpg', '2017-07-12 21:47:43', '2017-07-19'),
(31, '小山将平', 'ソフトサラダ 20枚', NULL, 'https://shop.r10s.jp/auc-kanbi/cabinet/4901313037508.gif', '2017-07-13 00:10:56', '2017-07-20'),
(32, '小山将平', 'ソフトサラダ 20枚', NULL, 'https://shop.r10s.jp/auc-kanbi/cabinet/4901313037508.gif', '2017-07-13 00:25:42', '2017-07-20'),
(34, '武田龍', 'マイルドカフェオーレ 500ml', NULL, 'https://www.aeonnetshop.com/img/goods/0105/00000000000000/PC/L/4971666404449.jpg', '2017-07-13 15:35:16', '2017-07-20'),
(35, '小山将平', 'ICレコーダー', NULL, 'https://www.bestgate.net/graph/icrecorder_olympusv62slv.png', '2017-07-14 09:31:09', '2017-07-21'),
(37, 'Asa Sho', 'noro test', NULL, 'http://image.rakuten.co.jp/tuhan-ya/cabinet/t_simple5434/1074798-01.jpg', '2017-07-14 10:59:47', '2017-07-21'),
(38, 'Go Ku', 'ジャスミン茶', NULL, 'https://www.aeonnetshop.com/img/goods/0105/00000000000000/PC/L/4901277234807.jpg', '2017-07-14 11:00:35', '2017-07-21'),
(39, 'Go Ku', 'ジャスミン茶', NULL, 'https://www.aeonnetshop.com/img/goods/0105/00000000000000/PC/L/4901277234807.jpg', '2017-07-14 11:14:02', '2017-07-21'),
(40, '小山将平', 'KOKUYOノート', NULL, 'https://cdn.hands.net/images/4901480311623-3.jpg', '2017-07-14 11:16:57', '2017-07-21'),
(41, 'Akio Yonekura', 'みつや', NULL, 'https://item-shopping.c.yimg.jp/i/l/f-folio_asd-4514603347814', '2017-07-14 11:19:52', '2017-07-21'),
(42, '小山将平', 'まちのお菓子屋さん サクサクしっとりチョコ', NULL, 'http://barcord.up.n.seesaa.net/barcord/image/4901958071691.jpg?d=a0', '2017-07-14 12:04:12', '2017-07-21'),
(43, 'Asa Sho', 'noro test', NULL, 'http://image.rakuten.co.jp/tuhan-ya/cabinet/t_simple5434/1074798-01.jpg', '2017-07-14 12:04:58', '2017-07-21'),
(44, 'Asa Sho', 'noro test', NULL, 'http://image.rakuten.co.jp/tuhan-ya/cabinet/t_simple5434/1074798-01.jpg', '2017-07-14 12:05:06', '2017-07-21'),
(45, 'Asa Sho', 'noro test', NULL, 'http://image.rakuten.co.jp/tuhan-ya/cabinet/t_simple5434/1074798-01.jpg', '2017-07-14 12:05:18', '2017-07-21'),
(46, 'Asa Sho', 'noro test', NULL, 'http://image.rakuten.co.jp/tuhan-ya/cabinet/t_simple5434/1074798-01.jpg', '2017-07-14 12:05:47', '2017-07-21'),
(47, '小山将平', 'まちのお菓子屋さん サクサクしっとりチョコ', NULL, 'http://barcord.up.n.seesaa.net/barcord/image/4901958071691.jpg?d=a0', '2017-07-14 12:10:20', '2017-07-21'),
(48, '小山将平', 'まちのお菓子屋さん サクサクしっとりチョコ', NULL, 'http://barcord.up.n.seesaa.net/barcord/image/4901958071691.jpg?d=a0', '2017-07-14 12:19:34', '2017-07-21'),
(49, '', 'まちのお菓子屋さん サクサクしっとりチョコ', NULL, 'http://barcord.up.n.seesaa.net/barcord/image/4901958071691.jpg?d=a0', '2017-07-14 17:31:13', '2017-07-21'),
(50, '', 'まちのお菓子屋さん サクサクしっとりチョコ', NULL, 'http://barcord.up.n.seesaa.net/barcord/image/4901958071691.jpg?d=a0', '2017-07-14 17:33:39', '2017-07-21'),
(51, '小山将平', 'まちのお菓子屋さん サクサクしっとりチョコ', NULL, 'http://barcord.up.n.seesaa.net/barcord/image/4901958071691.jpg?d=a0', '2017-07-14 17:33:59', '2017-07-21'),
(52, '小山将平', 'ICレコーダー', NULL, 'https://www.bestgate.net/graph/icrecorder_olympusv62slv.png', '2017-07-14 18:03:04', '2017-07-21'),
(53, '小山将平', 'ICレコーダー', NULL, 'https://www.bestgate.net/graph/icrecorder_olympusv62slv.png', '2017-07-14 18:06:18', '2017-07-21'),
(54, '小山将平', 'ICレコーダー', NULL, 'https://www.bestgate.net/graph/icrecorder_olympusv62slv.png', '2017-07-14 18:07:16', '2017-07-21'),
(55, '小山将平', 'ICレコーダー', NULL, 'https://www.bestgate.net/graph/icrecorder_olympusv62slv.png', '2017-07-14 18:11:14', '2017-07-21'),
(56, '小山将平', 'まちのお菓子屋さん サクサクしっとりチョコ', NULL, 'http://barcord.up.n.seesaa.net/barcord/image/4901958071691.jpg?d=a0', '2017-07-14 18:11:30', '2017-07-21'),
(57, '小山将平', 'ICレコーダー', NULL, 'https://www.bestgate.net/graph/icrecorder_olympusv62slv.png', '2017-07-14 18:11:42', '2017-07-21'),
(58, '小山将平', 'ICレコーダー', NULL, 'https://www.bestgate.net/graph/icrecorder_olympusv62slv.png', '2017-07-14 18:13:08', '2017-07-21'),
(59, '小山将平', 'ICレコーダー', NULL, 'https://www.bestgate.net/graph/icrecorder_olympusv62slv.png', '2017-07-14 18:14:17', '2017-07-21'),
(60, '小山将平', 'アイスティー', NULL, 'https://www.bestgate.net/graph/icrecorder_olympusv62slv.png', '2017-07-14 19:37:20', '2017-07-21'),
(61, '小山将平', 'アイスティー', NULL, 'https://item-shopping.c.yimg.jp/i/j/09shop_a102-4582409183813', '2017-07-14 19:39:20', '2017-07-21'),
(62, '小山将平', 'ビックリマン', NULL, 'https://pwrappsdps.blob.core.windows.net/media/powerapps.microsoft.com/ja-jp/documentation/articles/working-with-forms/20170630082844/view-form-select-coconut.png', '2017-07-14 19:41:52', '2017-07-21'),
(63, '小山将平', 'アイスティー', NULL, 'https://www.bestgate.net/graph/icrecorder_olympusv62slv.png', '2017-07-14 19:46:33', '2017-07-21'),
(66, '小山将平', 'まちのお菓子屋さん サクサクしっとりチョコ', NULL, 'http://barcord.up.n.seesaa.net/barcord/image/4901958071691.jpg?d=a0', '2017-07-15 18:16:15', '2017-07-22'),
(67, '小山将平', 'まちのお菓子屋さん サクサクしっとりチョコ', NULL, 'http://barcord.up.n.seesaa.net/barcord/image/4901958071691.jpg?d=a0', '2017-07-15 18:29:36', '2017-07-22'),
(68, '小山将平', 'まちのお菓子屋さん サクサクしっとりチョコ', NULL, 'http://barcord.up.n.seesaa.net/barcord/image/4901958071691.jpg?d=a0', '2017-07-15 18:29:48', '2017-07-22'),
(69, '小山将平', 'まちのお菓子屋さん サクサクしっとりチョコ', NULL, 'http://barcord.up.n.seesaa.net/barcord/image/4901958071691.jpg?d=a0', '2017-07-15 18:31:04', '2017-07-22'),
(70, '小山将平', 'まちのお菓子屋さん サクサクしっとりチョコ', NULL, 'http://barcord.up.n.seesaa.net/barcord/image/4901958071691.jpg?d=a0', '2017-07-15 18:31:15', '2017-07-22'),
(71, '小山将平', 'まちのお菓子屋さん サクサクしっとりチョコ', NULL, 'http://barcord.up.n.seesaa.net/barcord/image/4901958071691.jpg?d=a0', '2017-07-15 18:32:26', '2017-07-22'),
(72, '小山将平', 'まちのお菓子屋さん サクサクしっとりチョコ', NULL, 'http://barcord.up.n.seesaa.net/barcord/image/4901958071691.jpg?d=a0', '2017-07-15 18:32:41', '2017-07-22'),
(73, '小山将平', 'まちのお菓子屋さん サクサクしっとりチョコ', NULL, 'http://barcord.up.n.seesaa.net/barcord/image/4901958071691.jpg?d=a0', '2017-07-15 18:34:17', '2017-07-22'),
(74, '小山将平', 'ほうれん草', NULL, 'http://barcord.up.n.seesaa.net/barcord/image/4901958071691.jpg?d=a0', '2017-07-15 18:34:34', '2017-07-22'),
(75, '小山将平', 'ほうれん草', NULL, 'http://barcord.up.n.seesaa.net/barcord/image/4901958071691.jpg?d=a0', '2017-07-15 18:35:58', '2017-07-22'),
(76, '小山将平', 'ニンジン', NULL, 'http://barcord.up.n.seesaa.net/barcord/image/4901958071691.jpg?d=a0', '2017-07-15 18:36:19', '2017-07-22'),
(77, '小山将平', 'ニンジン', NULL, 'http://barcord.up.n.seesaa.net/barcord/image/4901958071691.jpg?d=a0', '2017-07-15 18:48:56', '2017-07-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item_table`
--
ALTER TABLE `item_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item_table`
--
ALTER TABLE `item_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;