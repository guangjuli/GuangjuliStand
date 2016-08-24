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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2362 ;

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