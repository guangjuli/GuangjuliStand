-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 2016-10-18 12:00:24
-- 服务器版本： 5.5.47
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `viga`
--

-- --------------------------------------------------------

--
-- 表的结构 `facede`
--

CREATE TABLE `facede` (
  `id` int(11) NOT NULL,
  `chr` varchar(32) DEFAULT NULL,
  `keywords` varchar(256) DEFAULT NULL,
  `des` varchar(128) DEFAULT NULL,
  `type` varchar(32) DEFAULT NULL,
  `facede` varchar(32) DEFAULT NULL,
  `cache` tinyint(2) NOT NULL DEFAULT '0',
  `expire` int(11) NOT NULL DEFAULT '0',
  `params` varchar(128) DEFAULT NULL,
  `plike` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `facede`
--

INSERT INTO `facede` (`id`, `chr`, `keywords`, `des`, `type`, `facede`, `cache`, `expire`, `params`, `plike`) VALUES
(76, 'api/html/edit', NULL, '', 'Ads', '123', 1, 0, '', ''),
(78, 'test/home/demo', '用户信息;', '数据测试', 'Ads', 'afsd', 1, 1000, '用户id', '123'),
(82, 'USER_ALLOW_REGISTER', NULL, '', 'Config', 'USERALLOWREGISTER', 0, 0, '', ''),
(80, 'DOCUMENT_POSITION', NULL, '', 'Config', 'asdfasdfsadf', 0, 0, '', ''),
(79, 'COLOR_STYLE', NULL, '', 'Config', 'test', 0, 0, '', ''),
(81, 'adminguiconfig', NULL, '', 'Application', 't', 0, 0, '', '12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `facede`
--
ALTER TABLE `facede`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `facede`
--
ALTER TABLE `facede`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
