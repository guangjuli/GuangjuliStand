# 数据库

表名

## app

    api         api表
    api_log     api日志表

## Addons

    device       设备表
    user         用户表
    user_group   用户组表
    token        token表
    ecg          心电表
    bloodpress   血压表


--
-- 数据库: `viga`
--

-- --------------------------------------------------------

--
-- 表的结构 `api_log`
--

CREATE TABLE IF NOT EXISTS `api_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `api` varchar(64) DEFAULT NULL,
  `code` varchar(16) DEFAULT '0',
  `msg` varchar(64) DEFAULT NULL,
  `data` text,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `_GET` text,
  `_POST` text,
  `_FILE` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

--
-- 转存表中的数据 `api_log`
--

INSERT INTO `api_log` (`id`, `api`, `code`, `msg`, `data`, `time`, `_GET`, `_POST`, `_FILE`) VALUES
(1, '0', '0', NULL, NULL, '2016-06-13 08:18:03', '{"m":"v","c":"user","a":"login","e":"","_param":""}', '{"phone":"15010578750","password":"qqqqqq","type_cv1":"javascript_debug"}', '[]'),
(2, '0', '0', NULL, NULL, '2016-06-13 09:06:50', '{"m":"v","c":"userinfo","a":null,"e":"","_param":"","phone":"15010578750","type_cv1":"javascript_debug","_":"1465808895908"}', '[]', '[]'),
(3, '0', '0', NULL, NULL, '2016-06-13 09:06:58', '{"m":"v","c":"userinfo","a":null,"e":"","_param":"","phone":"15010578750","type_cv1":"javascript_debug","_":"1465808906367"}', '[]', '[]'),
(4, '0', '0', NULL, NULL, '2016-06-13 09:07:09', '{"m":"v","c":"userinfo","a":null,"e":"","_param":"","phone":"15010578750","type_cv1":"javascript_debug","_":"1465808916378"}', '[]', '[]'),
(5, '0', '0', NULL, NULL, '2016-06-13 09:07:41', '{"m":"v","c":"user","a":"userinfo","e":"","_param":"","phone":"15010578750","type_cv1":"javascript_debug","_":"1465808948762"}', '[]', '[]'),
(6, '0', '0', NULL, NULL, '2016-06-13 09:08:53', '{"m":"v","c":"user","a":"userinfo","e":"","_param":"","phone":"15010578750","type_cv1":"javascript_debug","_":"1465808948763"}', '[]', '[]'),
(7, '0', '0', NULL, NULL, '2016-06-13 09:09:34', '{"m":"v","c":"user","a":"userinfo","e":"","_param":"","phone":"15010578750","type_cv1":"javascript_debug","_":"1465808948764"}', '[]', '[]'),
(8, '0', '0', NULL, NULL, '2016-06-13 09:10:37', '{"m":"v","c":"user","a":"userinfo","e":"","_param":"","phone":"15010578750","type_cv1":"javascript_debug","_":"1465808948765"}', '[]', '[]');

--
-- 表的结构 `bloodpress`
--

CREATE TABLE IF NOT EXISTS `bloodpress` (
  `bloodpressId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `shrink` int(5) NOT NULL,
  `diastole` int(5) NOT NULL,
  `bpm` int(5) NOT NULL,
  `type` int(2) NOT NULL DEFAULT '0',
  `time` int(11) NOT NULL,
  `createDay` int(11) NOT NULL,
  `day` int(1) NOT NULL COMMENT '1:day,0:night',
  `sort` int(11) NOT NULL DEFAULT '0',
  `active` int(2) NOT NULL DEFAULT '0',
  `des` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`bloodpressId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


--
-- 表的结构 `device`
--

CREATE TABLE IF NOT EXISTS `device` (
  `deviceId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `device` varchar(128) NOT NULL,
  `deviceTypeId` int(11) NOT NULL,
  PRIMARY KEY (`deviceId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 数据库: `viga`
--

-- --------------------------------------------------------

--
-- 表的结构 `device_type`
--

CREATE TABLE IF NOT EXISTS `device_type` (
  `deviceTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `type` char(11) NOT NULL,
  `des` text NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`deviceTypeId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `device_type`
--

INSERT INTO `device_type` (`deviceTypeId`, `type`, `des`, `sort`, `active`) VALUES
(1, 'bloodpress', '血压', 0, 1),
(2, 'ecg', '心电', 0, 1),
(3, 'watch', '腕表', 0, 1);


--
-- 表的结构 `token`
--

CREATE TABLE `token` (
  `tokenId` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(64) DEFAULT NULL,
  `userId` varchar(16) DEFAULT '',
  `accessToken` varchar(128) DEFAULT NULL,
  `type` varchar(8) NOT NULL,
  `createAt` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tokenId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `groupId` int(11) NOT NULL DEFAULT '1',
  `login` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nickName` varchar(164) NOT NULL,
  `createAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '0',
  `des` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


--
-- 表的结构 `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `userInfoId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `email` varchar(64) DEFAULT NULL,
  `mobile` varchar(64) DEFAULT NULL,
  `QQ` varchar(64) DEFAULT NULL,
  `weixin` varchar(64) DEFAULT NULL,
  `weibo` varchar(64) DEFAULT NULL,
  `accessToken` varchar(64) NOT NULL DEFAULT 'accessToken',
  `trueName` varchar(128) DEFAULT NULL,
  `birthday` varchar(128) DEFAULT NULL,
  `gender` varchar(128) DEFAULT NULL,
  `signer` varchar(128) DEFAULT NULL,
  `zone` varchar(128) DEFAULT NULL,
  `addr` varchar(128) DEFAULT NULL,
  `gravatar` varchar(128) DEFAULT NULL,
  `height` varchar(16) DEFAULT NULL,
  `bloodpress` tinyint(1) NOT NULL DEFAULT '0',
  `ecg` tinyint(1) NOT NULL DEFAULT '0',
  `watch` tinyint(1) NOT NULL DEFAULT '0',
  `expire` int(11) NOT NULL DEFAULT '0',
  `createAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '0',
  `des` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`userInfoId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


--
-- 表的结构 `user_group`
--

CREATE TABLE `user_group` (
  `groupId` int(11) NOT NULL AUTO_INCREMENT,
  `groupName` varchar(32) NOT NULL,
  `groupChr` varchar(32) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `sort` int(11) NOT NULL DEFAULT '0',
  `des` text,
  PRIMARY KEY (`groupId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 表的结构 `user_group`
--

CREATE TABLE IF NOT EXISTS `user_group` (
  `groupId` int(11) NOT NULL AUTO_INCREMENT,
  `groupName` varchar(32) NOT NULL,
  `groupChr` varchar(32) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `sort` int(11) NOT NULL DEFAULT '0',
  `des` text,
  PRIMARY KEY (`groupId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- 转存表中的数据 `user_group`
--

INSERT INTO `user_group` (`groupId`, `groupName`, `groupChr`, `active`, `sort`, `des`) VALUES
(1, '系统管理员', 'system', 1, 0, '测试'),
(11, '机构管理员', 'organization', 1, 0, '机构'),
(10, '科室管理员', 'department', 1, 0, '科室'),
(21, 'IOS', 'IOS', 1, 0, 'APP ios用户'),
(2, '系统管理员2', 'system2', 1, 0, '对整个系统进行设置和配置'),
(20, 'Android', 'Android', 1, 0, 'Android 用户'),
(12, '医生', 'doctor', 0, 0, '医生用户');
