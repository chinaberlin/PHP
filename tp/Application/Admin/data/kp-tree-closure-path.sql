-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2014 年 07 月 09 日 04:26
-- 服务器版本: 5.5.27
-- PHP 版本: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `zf2cms`
--

-- --------------------------------------------------------

--
-- 表的结构 `kp-tree-closure-path`
--

CREATE TABLE IF NOT EXISTS `kp-tree-closure-path` (
  `p` int(11) NOT NULL,
  `c` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `kp-tree-closure-path`
--

INSERT INTO `kp-tree-closure-path` (`p`, `c`) VALUES
(1, 1),
(1, 6),
(6, 6),
(1, 7),
(7, 7),
(1, 8),
(9, 8),
(5, 8),
(8, 8),
(1, 9),
(9, 9),
(1, 10),
(9, 10),
(10, 10),
(1, 5),
(9, 5),
(5, 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
