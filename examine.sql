-- phpMyAdmin SQL Dump
-- version 4.2.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015-05-31 13:11:05
-- 服务器版本： 5.6.24
-- PHP Version: 5.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `examine`
--

-- --------------------------------------------------------

--
-- 表的结构 `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `name` varchar(32) NOT NULL,
`content_id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `type` varchar(32) NOT NULL,
  `content` text NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `content`
--

INSERT INTO `content` (`name`, `content_id`, `title`, `type`, `content`, `time`) VALUES
('Lee', 33, '探月跟', '覅刚', '冯根唐峰新扥更', 2015),
('Lee', 34, 'hello', 'world', '你好啊啊啊', 2015);

-- --------------------------------------------------------

--
-- 表的结构 `discuss`
--

CREATE TABLE IF NOT EXISTS `discuss` (
`discuss_id` int(11) NOT NULL,
  `user_name` varchar(10) NOT NULL,
  `friend_name` varchar(10) NOT NULL,
  `friend_mail` varchar(225) NOT NULL,
  `content_id` int(11) NOT NULL,
  `discuss` text NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `discuss`
--

INSERT INTO `discuss` (`discuss_id`, `user_name`, `friend_name`, `friend_mail`, `content_id`, `discuss`, `time`) VALUES
(10, 'Lee', '花花', '10002@xx.com', 0, '', 2015),
(11, 'Lee', '花花', '10002@xx.com', 0, '', 2015),
(12, 'Lee', '花花00', 'ooo10002@xx.com', 0, '', 2015),
(13, 'Lee', '花花00', 'ooo10002@xx.com', 0, '', 2015),
(14, 'Lee', '亮亮', '345435@xx.cn', 0, '岑瑞段峰', 2015),
(15, 'Lee', '亮亮', '345435@xx.cn', 0, '岑瑞段峰', 2015);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `name` varchar(32) NOT NULL,
  `psw` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`name`, `psw`) VALUES
('skila', 'dab41438242e964331b027a2c4679180'),
('Lee', '5f81d152647cb95fd95bd235c3e7b131');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `content`
--
ALTER TABLE `content`
 ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `discuss`
--
ALTER TABLE `discuss`
 ADD PRIMARY KEY (`discuss_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `discuss`
--
ALTER TABLE `discuss`
MODIFY `discuss_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
