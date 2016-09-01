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
