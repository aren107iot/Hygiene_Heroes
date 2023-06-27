-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-05-25 16:27:37
-- 伺服器版本： 10.4.27-MariaDB
-- PHP 版本： 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `1113cleaning`
--

-- --------------------------------------------------------

--
-- 資料表結構 `members`
--

CREATE TABLE `members` (
  `id` int(2) UNSIGNED NOT NULL,
  `name` varchar(3) NOT NULL,
  `seat_id` int(2) UNSIGNED NOT NULL,
  `vote_state` tinyint(1) NOT NULL,
  `vote_result` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `members`
--

INSERT INTO `members` (`id`, `name`, `seat_id`, `vote_state`, `vote_result`) VALUES
(1, '文翰', 1, 1, ''),
(2, '淑敏', 2, 0, ''),
(3, '博宏', 3, 0, ''),
(4, '聆韻', 4, 0, ''),
(5, '品君', 5, 0, ''),
(6, '仕庭', 6, 0, ''),
(7, '', 7, 0, ''),
(8, '威安', 8, 0, ''),
(9, '可瑞', 9, 0, ''),
(10, '育成', 10, 0, ''),
(11, '家茜', 11, 0, ''),
(12, '亮均', 12, 0, ''),
(13, '劉錠', 13, 0, ''),
(14, '承昉', 14, 0, ''),
(15, '凱迪', 15, 0, ''),
(16, '勝皇', 16, 0, ''),
(17, '嘉慶', 17, 0, ''),
(18, '厚任', 18, 1, ''),
(19, '郁國', 19, 0, ''),
(20, '靖雅', 20, 0, ''),
(21, '有志', 21, 0, ''),
(22, '展志', 22, 0, ''),
(23, '哲源', 23, 0, '');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `members`
--
ALTER TABLE `members`
  MODIFY `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
