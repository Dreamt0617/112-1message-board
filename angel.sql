-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-12-20 08:51:14
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `angel`
--

-- --------------------------------------------------------

--
-- 資料表結構 `article`
--

CREATE TABLE `article` (
  `article_id` int(13) NOT NULL,
  `acc` varchar(30) NOT NULL,
  `title` varchar(500) NOT NULL,
  `content` varchar(3000) NOT NULL,
  `ctime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `article`
--

INSERT INTO `article` (`article_id`, `acc`, `title`, `content`, `ctime`) VALUES
(1, 'abc', '測試', '測試測試測試測試測試測試測試', '2023-07-10 09:57:30'),
(12, 'a', '終於完成啦', '哈哈哈哈哈哈哈哈', '2023-12-15 14:57:01');

-- --------------------------------------------------------

--
-- 資料表結構 `article_reply`
--

CREATE TABLE `article_reply` (
  `article_id` int(11) NOT NULL,
  `acc` varchar(30) NOT NULL,
  `content` varchar(3000) NOT NULL,
  `ctime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `article_reply`
--

INSERT INTO `article_reply` (`article_id`, `acc`, `content`, `ctime`) VALUES
(12, 'angel', '真的！！！', '2023-12-15 15:00:15'),
(12, 'a', '天哪！太不容易了！', '2023-12-20 15:10:20'),
(12, 'b', 'Oh my god！Ending~~~', '2023-12-20 15:11:30');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `acc` varchar(30) NOT NULL,
  `pass` varchar(60) NOT NULL,
  `prio` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`acc`, `pass`, `prio`) VALUES
('angel', 'dreamt0617', 0),
('a', '555', 1),
('b', '666', 2);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `article`
--
ALTER TABLE `article`
  MODIFY `article_id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
