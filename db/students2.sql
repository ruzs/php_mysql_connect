-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-11-10 02:02:38
-- 伺服器版本： 10.4.24-MariaDB
-- PHP 版本： 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `school`
--

-- --------------------------------------------------------

--
-- 資料表結構 `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Code',
  `name` varchar(32) COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT 'Fullname',
  `school_num` varchar(6) COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT 'Number',
  `gender` tinyint(1) UNSIGNED NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `tel` varchar(10) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `birthday` date NOT NULL,
  `classroom` varchar(6) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `students`
--

INSERT INTO `students` (`id`, `name`, `school_num`, `gender`, `email`, `tel`, `birthday`, `classroom`, `created_at`, `updated_at`) VALUES
(1, 'Asuna', '111001', 2, 'asuna0930@mgail.com', '0930200709', '2007-09-30', '101', '2022-11-07 03:18:41', '2022-11-07 03:18:41'),
(2, 'Kirito', '111002', 1, 'kirito1007@gmail.com', '0907200810', '2008-10-07', '101', '2022-11-07 03:18:41', '2022-11-07 03:18:41'),
(3, 'Yui', '111003', 2, 'yui0801@gmail.com', '0901202208', '2022-08-01', '101', '2022-11-07 03:20:46', '2022-11-07 03:20:46'),
(4, 'Leafa', '111004', 2, 'leafa0419@gmail.com', '0919200904', '2009-04-19', '101', '2022-11-07 03:22:35', '2022-11-07 03:22:35'),
(5, 'Eugeo', '111005', 1, 'Eugeo0410@gmail.com', '0910200804', '2008-04-10', '101', '2022-11-07 03:25:24', '2022-11-07 03:25:24'),
(6, 'Sinon', '111006', 2, 'sinon0821@gmail.com', '0921200908', '2009-08-21', '101', '2022-11-07 03:36:17', '2022-11-07 03:36:17'),
(7, 'ruzs', '111007', 1, 'eddie10913@gmail.com', '0933754317', '1994-09-13', '101', '2022-11-10 00:58:00', '2022-11-10 01:00:20');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Code', AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
