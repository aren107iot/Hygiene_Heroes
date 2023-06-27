-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-06-27 16:10:59
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
(1, '文翰', 1, 1, '教室_後方磁磚地板 掃地+拖地\r\n'),
(2, '淑敏', 2, 1, '選手室_拖地+拖低\r\n	'),
(3, '博宏', 3, 1, '教師休息室_拖地+掃地\r\n	'),
(4, '聆韻', 4, 1, '教室_各位同學的桌面&螢幕 清潔灰塵'),
(5, '品君', 5, 1, '教室_各位同學的桌面&螢幕 清潔灰塵'),
(6, '仕庭', 6, 1, '餐廳_桌面與櫥櫃平台擦拭整理\r\n	'),
(7, '', 7, 0, ''),
(8, '威安', 8, 1, '教室_高架地板掃地\r\n'),
(9, '可瑞', 9, 1, '餐廳_掃地&拖地(椅子需收折)\r\n	'),
(10, '育誠', 10, 1, '白板、板溝清潔\r\n	'),
(11, '家茜', 11, 1, '教室_教師桌面&印表機桌面(含印表機)\r\n	'),
(12, '亮均', 12, 1, '教室_後方櫥櫃平台清潔灰塵及櫥櫃整理\r\n	'),
(13, '劉錠', 13, 1, '餐廳_掃地&拖地(椅子需收折)\r\n	'),
(14, '承昉', 14, 1, '教室_高架地板掃地\r\n'),
(15, '凱迪', 15, 1, '鞋櫃清潔\r\n'),
(16, '勝皇', 16, 1, '餐廳_掃地&拖地(椅子需收折)\r\n	'),
(17, '嘉慶', 17, 1, '教室_玻璃、包含大門，作重點髒汙清潔\r\n	'),
(18, '厚任', 18, 1, '冷氣 清潔濾網'),
(19, '郁國', 19, 1, '餐廳_桌面與櫥櫃平台擦拭整理\r\n	'),
(20, '靖雅', 20, 1, '教室_玻璃、包含大門，作重點髒汙清潔\r\n	'),
(21, '有志', 21, 1, '餐廳_桌面與櫥櫃平台擦拭整理\r\n	'),
(22, '展志', 22, 1, '餐廳_窗戶+洗手台整理\r\n	'),
(23, '哲源', 23, 1, '教室_後方磁磚地板 掃地+拖地\r\n');

-- --------------------------------------------------------

--
-- 資料表結構 `options`
--

CREATE TABLE `options` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `total` int(1) UNSIGNED NOT NULL,
  `def` int(1) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `options`
--

INSERT INTO `options` (`id`, `description`, `total`, `def`, `subject_id`) VALUES
(1, '冷氣 清潔濾網', 0, 1, 0),
(2, '教室_各位同學的桌面&螢幕 清潔灰塵', 0, 2, 0),
(3, '白板、板溝清潔\r\n	', 0, 1, 0),
(4, '教室_教師桌面&印表機桌面(含印表機)\r\n	', 0, 1, 0),
(5, '教室_後方櫥櫃平台清潔灰塵及櫥櫃整理\r\n	', 0, 1, 0),
(6, '教室_玻璃、包含大門，作重點髒汙清潔\r\n	', 0, 2, 0),
(7, '鞋櫃清潔\r\n', 0, 1, 0),
(8, '教室_高架地板掃地\r\n', 0, 2, 0),
(9, '教室_後方磁磚地板 掃地+拖地\r\n', 0, 2, 0),
(10, '餐廳_掃地&拖地(椅子需收折)\r\n	', 0, 3, 0),
(11, '餐廳_窗戶+洗手台整理\r\n	', 0, 1, 0),
(12, '餐廳_桌面與櫥櫃平台擦拭整理\r\n	', 0, 3, 0),
(13, '教師休息室_拖地+掃地\r\n	', 0, 1, 0),
(14, '選手室_拖地+拖低\r\n	', 0, 1, 0);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `members`
--
ALTER TABLE `members`
  MODIFY `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `options`
--
ALTER TABLE `options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
