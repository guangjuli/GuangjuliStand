-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 �?08 �?31 �?19:29
-- 服务器版本: 5.5.47
-- PHP 版本: 5.5.30

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `viga`
--

-- --------------------------------------------------------

--
-- 表的结构 `api`
--

CREATE TABLE IF NOT EXISTS `api` (
  `apiId` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) DEFAULT NULL,
  `v` varchar(32) DEFAULT NULL,
  `api` varchar(128) DEFAULT NULL,
  `dis` text,
  `request` text,
  `response` text,
  `type` varchar(16) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`apiId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- 转存表中的数据 `api`
--

INSERT INTO `api` (`apiId`, `title`, `v`, `api`, `dis`, `request`, `response`, `type`, `active`) VALUES
(4, '注册', 'v', 'passport/register', '模块 :通行证\r\n说明 :用户注册\r\n参数 :\r\nphone   \r\npassword\r\ntype:\r\n1手机号,2邮箱\r\n成功 :"code":200\r\n失败 :"code":-200\r\n\r\n返回值:\r\nresult:ture表示注册成功,flase表示失败', '{\r\n"login_name":"15010578750",\r\n"password":"qqqqqq",\r\n"type":1\r\n}', '{\r\n"code":200,\r\n"msg":"注册成功",\r\n"data":{\r\n                  "result":ture\r\n               }\r\n}', 'POST', 1),
(2, '用户信息', 'v', 'user/userinformation', '模块 :用户信息\r\n说明 :用户详情\r\n参数 :phone\r\n成功 :\r\n失败 :', '{\r\n"phone":"15010578750"\r\n}', '{\r\n"code":1,\r\n"msg":"succeed",\r\n"user_name":"jack"\r\n}', 'GET', 1),
(3, '账号密码校验', 'v', 'passport/login', '模块 :校验用户名密码\r\n说明 :校验成功后获取token\r\n参数 :\r\nphone   \r\npassword  \r\ntype(1手机号,2邮箱)\r\n\r\n成功 :"code":200\r\n失败 :"code":-200\r\n\r\n返回值:\r\nresult:ture表示校验通过,flase表示校验不通过', '{\r\n"login_name":"15010578750",\r\n"password":"qqqqqq",\r\n"type":1\r\n}', '{\r\n"code":200,\r\n"msg":"账号密码校验通过",\r\n"data":{\r\n                    "relsult":"ture"\r\n               }\r\n}', 'POST', 1),
(5, '返回验证码', 'v', 'sys/regvcode', '模块 :注册验证码模块\r\n说明 :验证码 规定60秒 还需要判断验证码是否在60时秒内发送成功，发送成功的话 需要返回信息来表明验证码已发送成功，如果在60秒内发送失败，也需要返回信息来表明发送失败\r\n参数 :phone注册手机号,state状态码\r\n\r\nstate : zhuce / fpassword', '{\r\n    "phone":"13673764379",\r\n    "state":"zhuce"\r\n}', '{\r\n    "code":200,\r\n    "msg":"succeed",\r\n    "data":12234\r\n}', 'POST', 1),
(6, '返回内部版本号', 'v', 'sys/version', '模块 :监测版本\r\n说明 :如果该版本的版本号小于服务器的的版本号，强制更新', '{}', '{\r\n"code":200,\r\n"msg":"succeed",\r\n "data":1\r\n}', 'POST', 1),
(7, '获取token', 'v', 'sys/accessToken', '模块 : 获取用户令牌\r\n\r\n传入\r\n1 : deviceid设备编码,唯一值\r\n2 : login用户的登录id (手机号/Email)\r\n3 : time : 当前的时间戳\r\n4 : verify校验值\r\nverify= hash(deviceid.clientSecret.login.time)\r\nclientSecret由服务器端和手机端进行统一定义\r\n\r\n返回\r\n验证 : verify= hash(deviceid.clientSecret.login.time)\r\n用户名密码可以为空，用户名密码空，则用UID为设备id\r\nUID为用户标识 可以为 设备id,用户名,手机号\r\nUID 可以根据token获取到', '{\r\n    "deviceid":"915028670-2147483648",\r\n    "login":"",\r\n    "time":-2147483648,\r\n    "verify":"a90132602625e7acd813d44d7a41c88e"\r\n}', '{\r\n"code":200,\r\n"msg":"succeed",\r\n"data": {\r\n        "token": "123123wsrdqwedq",\r\n        "expires": 7200\r\n    }\r\n}', 'POST', 1),
(10, '重置密码', 'v', 'passport/resetpassword', '模块 :用户忘记密码时重置密码\r\n说明 :调用接口,服务器会向用户发送验证码\r\n参数 :\r\nlogin_name:\r\n (手机号或邮箱)\r\ntype:\r\n1手机号,2邮箱\r\npassword:\r\n密码\r\nconfirm_password:\r\n确认密码\r\n\r\n成功 :"code":200\r\n失败 :"code":-200\r\n\r\n返回值:\r\nresult:1成功,0失败', '{\r\n"login_name":"18888888888",\r\n"type":1,\r\n"password":"qqqqqq",\r\n"confirm_password":"qqqqqq"\r\n}', '{\r\n"code":200,\r\n"msg":"密码重置成功",\r\n"data":{\r\n                   "result":1\r\n               }\r\n}', 'POST', 1),
(11, '修改密码', 'v', 'passport/password', '模块 :用户修改密码\r\n说明 :用户修改密码\r\n参数 :\r\nuser_id  \r\npassword\r\nconfirm_passwprd (确认密码)\r\nold_password\r\n\r\n成功 :"code":200\r\n失败 :"code":-200\r\n\r\n返回值:\r\nresult:1表示修改成功,0表示失败', '{\r\n"user_id":@"10086",\r\n"password":"hahaha",\r\n"confirm_passwprd":"hahaha",\r\n"old_password":"qwerty"\r\n}', '{\r\n"code":200,\r\n"msg":"密码修改成功",\r\n"relust":1\r\n}', 'POST', 1),
(12, '第三方登录', 'v', 'passport/oauthlogin', '模块 :第三方登录\r\n说明 :用户使用第三方登录\r\n参数 :\r\nnick_name:\r\n用户在第三方平台的昵称\r\nthird_user_id:\r\n第三方平台返回的用户ID\r\nsource:\r\n第三方平台类型\r\nsource_key:\r\n用户在第三方平台申请的app应用标识\r\n\r\n成功 :"code":200\r\n失败 :"code":-200\r\n\r\n返回值:\r\nuser_id:\r\n用户id\r\nnew_user:\r\n是否是新用户,如果是,需要补全个人信息\r\nmobile:\r\n手机号', '{\r\n"nick_name":"jack",\r\n"third_user_id":"dadsaadasw3213121wq",\r\n"source":"1",\r\n"source_key":"SASDAS"\r\n}', '{\r\n"code":200,\r\n"msg":"第三方登录成功",\r\n"data":{\r\n                  "result":1,\r\n                  "user_id":"20",\r\n                  "new_user":1,\r\n                  "mobile":"1321"\r\n               }\r\n}', 'POST', 1),
(13, '应用设置', 'v', 'settings/dynamicSettings', '模块 :用户的设置信息\r\n说明 :账号密码校验通过之后,获取用户的设置信息\r\n\r\n参数 :无需传参数\r\n\r\n成功 :"code":200\r\n失败 :"code":-200', '', '{\r\n"code":200,\r\n"msg":"获取应用设置成功",\r\n"data":[\r\n    {\r\n        "isDynamic": "0"\r\n    },\r\n    {\r\n        "setting": [\r\n            {\r\n                "interval": "30",\r\n                "time": "4"\r\n            },\r\n            {\r\n                "interval": "45",\r\n                "time": "8"\r\n            },\r\n            {\r\n                "interval": "10",\r\n                "time": "18"\r\n            },\r\n            {\r\n                "interval": "8",\r\n                "time": "20"\r\n            }\r\n        ]\r\n    }\r\n]\r\n}', 'GET', 1),
(14, '获取测量历史记录', 'v', 'story/getMeasureStory', '模块 :历史记录\r\n说明 :获取测量历史记录\r\n\r\n参数 :\r\ncreate_day 生成的时间; \r\ntype 0单次测量,1动态测量\r\n\r\n成功 :"code":200\r\n失败 :"code":-200', '{\r\n"create_day":"2016621",\r\n"type":1\r\n}', '{\r\n"code":200,\r\n"msg":"获取测量历史记录成功",\r\n"data":[\r\n{\r\n     "time":"1466495302",\r\n     "shrink":"120",\r\n     "diastole":"87",\r\n     "bpm":"75",\r\n     "create_day":"2016621"\r\n},\r\n{\r\n     "time":"1466495302",\r\n     "shrink":"120",\r\n     "diastole":"87",\r\n     "bpm":"75",\r\n     "create_day":"2016621"\r\n},\r\n      {\r\n     "time":"1466495302",\r\n     "shrink":"120",\r\n     "diastole":"87",\r\n     "bpm":"75",\r\n     "create_day":"2016621"\r\n}         \r\n]\r\n}', 'GET', 1),
(16, '上传测量历史记录', 'v', 'story/uploadMeasureStory', '模块 :历史记录\r\n说明 :上传测量历史记录\r\n\r\n参数 :\r\ncreate_day:生成时间\r\ntype:0单次测量记录,1动态测量记录\r\n\r\n成功 :"code":200\r\n失败 :"code":-200', '{\r\n"create_day":"2016621",\r\n"type":1,\r\n"story":[\r\n{\r\n     "time":"1466495302",\r\n     "shrink":"120",\r\n     "diastole":"87",\r\n     "bpm":"75",\r\n     "create_day":"2016621"\r\n},\r\n{\r\n     "time":"1466495302",\r\n     "shrink":"120",\r\n     "diastole":"87",\r\n     "bpm":"75",\r\n     "create_day":"2016621"\r\n},\r\n      {\r\n     "time":"1466495302",\r\n     "shrink":"120",\r\n     "diastole":"87",\r\n     "bpm":"75",\r\n     "create_day":"2016621"\r\n}         \r\n]\r\n}', '{\r\n"code":200,\r\n"msg":"上传历史记录成功"\r\n}', 'POST', 1),
(17, '删除单条历史记录', 'v', 'story/delete', '模块 :历史记录\r\n说明 :删除单条历史记录\r\n\r\n参数 :\r\ncreate_time:该条记录的时间戳\r\ntype:0是单次测量,1是动态测量\r\n\r\n成功 :"code":200\r\n失败 :"code":-200', '{\r\n"create_time":"1466559959",\r\n"type":1\r\n}', '{\r\n"code":200,\r\n"msg":"删除单条历史记录成功"\r\n}', 'POST', 1),
(18, '删除某日所有动态历史记录', 'v', 'story/deleteAll', '模块 :历史记录\r\n说明 :删除某日所有历史记录\r\n\r\n参数 :\r\ncreate_day:日期\r\n\r\n成功 :"code":200\r\n失败 :"code":-200', '{\r\n"create_day":"2016622"\r\n}', '{\r\n"code":200,\r\n"msg":"删除该日所有历史记录成功"\r\n}', 'POST', 1),
(19, '获取饼状图分析', 'v', 'story/getPieChart', '模块 :历史记录\r\n说明 :获取饼状图分析\r\n\r\n参数 :\r\ncreate_day:日期\r\n\r\n成功 :"code":200\r\n失败 :"code":-200', '{\r\n"create_day":"2016622"\r\n}', '{\r\n"code":200,\r\n"msg":"获取饼状图成功",\r\n"data":{\r\n              "shrink":{\r\n                                  "acceptable":40.00,\r\n                                  "normal":34.55,  \r\n                                  "exception":25.45\r\n                                 },\r\n               "diastole":{\r\n                                  "acceptable":30.00,\r\n                                  "normal":44.55,  \r\n                                  "exception":25.45\r\n                                 }\r\n              }\r\n}', 'GET', 1),
(20, '获取柱形图分析', 'v', 'story/getBarChart', '模块 :历史记录\r\n说明 :获取柱形图分析\r\n\r\n参数 :\r\ncreate_day:日期\r\n\r\n成功 :"code":200\r\n失败 :"code":-200', '{\r\n"create_day":"2016622"\r\n}', '{\r\n"code":200,\r\n"msg":"获取柱状图成功",\r\n"data":{\r\n"shrink":["24","45","30","92","76","32","50","89","85","93","19","43","60","32","56"],\r\n"diastole":["24","45","34","62","46","32","52","85","15","53","1","43","67","32","56"],\r\n"bpm":["64","45","84","69","96","37","59","75","19","73","82","43","60","32","96"]\r\n}\r\n}', 'GET', 1),
(21, '获取折线图分析', 'v', 'story/getLineChart', '模块 :历史记录\r\n说明 :获取折线图分析\r\n\r\n参数 :\r\ncreate_day:日期\r\n\r\n成功 :"code":200\r\n失败 :"code":-200', '{\r\n"create_day":"2016622"\r\n}', '{\r\n"code":200,\r\n"msg":"获取折线图成功",\r\n"data":{\r\n"shrink":["221","246","201","238","235","239","256","230","236","221","219","231","239","236","207","229 ","232","230","261","256","230","238","231","231"],\r\n"diastole":["124","143","102","131","134","132","156","130","139","121","117","136","135","138","108","121","138","136","161","156","130","137","132","133"],\r\n"bpm":["22","46","7","33","36","37","53","30","39","24","15","31","38","38","7","23","36","30","66","56","37","38","36","36"]\r\n}\r\n}', 'GET', 1),
(22, '获取检查报告', 'v', 'story/getCheckReport', '模块 :历史记录\r\n说明 :获取检查报告\r\n\r\n参数 :\r\ncreate_day:日期\r\n\r\n成功 :"code":200\r\n失败 :"code":-200', '{\r\n"create_day":"2016622"\r\n}', '{\r\n"code":200,\r\n"msg":"获取检查报告成功",\r\n"data":""\r\n}', 'POST', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `api_log`
--

INSERT INTO `api_log` (`id`, `api`, `code`, `msg`, `data`, `time`, `_GET`, `_POST`, `_FILE`) VALUES
(1, 'home/demo/asdf/asdf', '', '', 'null', '2016-08-24 02:45:53', '{"params":"","c":"home","a":"demo","asdf":"asdf","asdfasdf":"asdf","\\/home\\/demo\\/asdf\\/asdf":""}', '[]', '[]'),
(2, 'home/demo/asdf/asdf', '', '', 'null', '2016-08-24 03:05:45', '{"params":"","c":"home","a":"demo","asdf":"asdf","asdfasdf":"asdf","\\/home\\/demo\\/asdf\\/asdf":""}', '[]', '[]');

-- --------------------------------------------------------

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
  `sort` int(11) NOT NULL DEFAULT '0',
  `active` int(2) NOT NULL DEFAULT '0',
  `des` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`bloodpressId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chr` varchar(32) NOT NULL COMMENT '获取标识',
  `type` varchar(8) NOT NULL COMMENT '类型 define/ads/ot',
  `source` text COMMENT '内容',
  `sim` text,
  `des` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `device`
--

CREATE TABLE IF NOT EXISTS `device` (
  `deviceId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `device` varchar(128) NOT NULL,
  PRIMARY KEY (`deviceId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `haoyou`
--

CREATE TABLE IF NOT EXISTS `haoyou` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `tm` int(11) NOT NULL COMMENT '请求和回复',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `fid` (`fid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- 表的结构 `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `menuId` int(11) NOT NULL AUTO_INCREMENT,
  `package` varchar(16) DEFAULT NULL,
  `title` varchar(32) DEFAULT NULL,
  `des` varchar(64) DEFAULT NULL,
  `ads` varchar(32) DEFAULT NULL,
  `icon` varchar(32) DEFAULT NULL,
  `parentId` varchar(11) NOT NULL DEFAULT '0',
  `hidden` tinyint(1) NOT NULL DEFAULT '0',
  `sort` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否选中根据uri计算获取',
  PRIMARY KEY (`menuId`),
  KEY `package` (`package`),
  KEY `ads` (`ads`),
  KEY `parendId` (`parentId`),
  KEY `sort` (`sort`),
  KEY `active` (`active`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- 转存表中的数据 `menu`
--

INSERT INTO `menu` (`menuId`, `package`, `title`, `des`, `ads`, `icon`, `parentId`, `hidden`, `sort`, `active`) VALUES
(27, '', '添加', '', 'config/html/add', '', '6', 0, 0, 0),
(3, 'menu', '列表', '列表相关', 'menu/html/list', 'glyphicon glyphicon-home', '10', 0, 10, 0),
(4, 'menu', '添加', '列表相关', 'menu/html/add', 'glyphicon glyphicon-home', '10', 0, 0, 0),
(28, '', '列表', '', 'config/html/list', '', '6', 0, 9, 0),
(6, 'mce1', '配置', '列表相关', 'config/html/index', 'glyphicon glyphicon-home', '30', 0, 0, 0),
(7, 'menu', '编辑', '列表相关', 'menu/html/edit', 'glyphicon glyphicon-home', '10', 1, 0, 0),
(23, 'Package', 'Package', '', 'Package/home/index', '', '0', 0, 9, 0),
(29, '', '编辑', '', 'config/html/edit', '', '6', 1, 0, 0),
(30, '', 'Test', '', 'test/home/index', '', '0', 0, -1, 0),
(10, 'menu', '菜单', '列表相关', 'menu/html/indexc', 'glyphicon glyphicon-home', '23', 0, 0, 0),
(25, '', '列表', '', 'pm/home/list', '', '24', 0, 0, 0),
(12, 'usergroup', '修改', '系统管理', 'usergroup/html/edit', 'glyphicon glyphicon-home', '13', 1, 0, 0),
(13, 'usergroup', '用户组', '菜单管理', 'usergroup/html/indexc', 'glyphicon glyphicon-home', '23', 0, 0, 0),
(14, 'usergroup', '列表', '列表相关', 'usergroup/html/list', 'glyphicon glyphicon-home', '13', 0, 10, 0),
(15, 'usergroup', '添加', '列表相关', 'usergroup/html/add', 'glyphicon glyphicon-home', '13', 0, 0, 0),
(24, '', 'Pm', '', 'pm/html/index', 'glyphicon glyphicon-home', '23', 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `system_config`
--

CREATE TABLE IF NOT EXISTS `system_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '配置ID',
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '配置名称',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '配置类型',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '配置说明',
  `group` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '配置分组',
  `extra` varchar(255) NOT NULL DEFAULT '' COMMENT '配置值',
  `remark` varchar(100) NOT NULL COMMENT '配置说明',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态',
  `value` text NOT NULL COMMENT '配置值',
  `sort` smallint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='系统配置表' AUTO_INCREMENT=66 ;

--
-- 转存表中的数据 `system_config`
--

INSERT INTO `system_config` (`id`, `name`, `type`, `title`, `group`, `extra`, `remark`, `create_time`, `update_time`, `status`, `value`, `sort`) VALUES
(1, 'WEB_SITE_TITLE', 1, '网站标题', 1, '', '网站标题前台显示标题', 1378898976, 1430825115, 1, 'weiphp3.0', 0),
(2, 'WEB_SITE_DESCRIPTION', 2, '网站描述', 1, '', '网站搜索引擎描述', 1378898976, 1379235841, 1, 'weiphp是互联网+的IT综合解决方案', 1),
(3, 'WEB_SITE_KEYWORD', 2, '网站关键字', 1, '', '网站搜索引擎关键字', 1378898976, 1381390100, 1, 'weiphp,互联网+,微信开源开发框架', 8),
(4, 'WEB_SITE_CLOSE', 4, '关闭站点', 1, '0:关闭\r\n1:开启', '站点关闭后其他用户不能访问，管理员可以正常访问', 1378898976, 1406859591, 1, '1', 1),
(9, 'CONFIG_TYPE_LIST', 3, '配置类型列表', 4, '', '主要用于数据解析和页面表单的生成', 1378898976, 1379235348, 1, '0:数字\r\n1:字符\r\n2:文本\r\n3:数组\r\n4:枚举', 2),
(10, 'WEB_SITE_ICP', 1, '网站备案号', 1, '', '设置在网站底部显示的备案号，如“沪ICP备12007941号-2', 1378900335, 1379235859, 1, '', 9),
(11, 'DOCUMENT_POSITION', 3, '文档推荐位', 2, '', '文档推荐位，推荐到多个位置KEY值相加即可', 1379053380, 1379235329, 1, '1:列表页推荐\r\n2:频道页推荐\r\n4:网站首页推荐', 3),
(12, 'DOCUMENT_DISPLAY', 3, '文档可见性', 2, '', '文章可见性仅影响前台显示，后台不收影响', 1379056370, 1379235322, 1, '0:所有人可见\r\n1:仅注册会员可见\r\n2:仅管理员可见', 4),
(13, 'COLOR_STYLE', 4, '后台色系', 1, 'default_color:默认\r\nblue_color:紫罗兰', '后台颜色风格', 1379122533, 1379235904, 1, 'default_color', 10),
(20, 'CONFIG_GROUP_LIST', 3, '配置分组', 4, '', '配置分组', 1379228036, 1384418383, 1, '1:基本\r\n3:用户\r\n4:系统\r\n5:站点', 4),
(21, 'HOOKS_TYPE', 3, '钩子的类型', 4, '', '类型 1-用于扩展显示内容，2-用于扩展业务处理', 1379313397, 1379313407, 1, '1:视图\r\n2:控制器', 6),
(22, 'AUTH_CONFIG', 3, 'Auth配置', 4, '', '自定义Auth.class.php类配置', 1379409310, 1379409564, 1, 'AUTH_ON:1\r\nAUTH_TYPE:2', 8),
(23, 'OPEN_DRAFTBOX', 4, '是否开启草稿功能', 2, '0:关闭草稿功能\r\n1:开启草稿功能\r\n', '新增文章时的草稿功能配置', 1379484332, 1379484591, 1, '1', 1),
(24, 'DRAFT_AOTOSAVE_INTERVAL', 0, '自动保存草稿时间', 2, '', '自动保存草稿的时间间隔，单位：秒', 1379484574, 1386143323, 1, '60', 2),
(25, 'LIST_ROWS', 0, '后台每页记录数', 4, '', '后台数据每页显示记录数', 1379503896, 1391938052, 1, '20', 10),
(26, 'USER_ALLOW_REGISTER', 4, '是否允许用户注册', 3, '0:关闭注册\r\n1:允许注册', '是否开放用户注册', 1379504487, 1379504580, 1, '1', 0),
(27, 'CODEMIRROR_THEME', 4, '预览插件的CodeMirror主题', 4, '3024-day:3024 day\n3024-night:3024 night\nambiance:ambiance\nbase16-dark:base16 dark\nbase16-light:base16 light\nblackboard:blackboard\ncobalt:cobalt\neclipse:eclipse\nelegant:elegant\nerlang-dark:erlang-dark\nlesser-dark:lesser-dark\nmidnight:midnight', '详情见CodeMirror官网', 1379814385, 1384740813, 1, 'ambiance', 3),
(28, 'DATA_BACKUP_PATH', 1, '数据库备份根路径', 4, '', '路径必须以 / 结尾', 1381482411, 1381482411, 1, './Data/', 5),
(29, 'DATA_BACKUP_PART_SIZE', 0, '数据库备份卷大小', 4, '', '该值用于限制压缩后的分卷最大长度。单位：B；建议设置20M', 1381482488, 1381729564, 1, '20971520', 7),
(30, 'DATA_BACKUP_COMPRESS', 4, '数据库备份文件是否启用压缩', 4, '0:不压缩\r\n1:启用压缩', '压缩备份文件需要PHP环境支持gzopen,gzwrite函数', 1381713345, 1381729544, 1, '1', 9),
(31, 'DATA_BACKUP_COMPRESS_LEVEL', 4, '数据库备份文件压缩级别', 4, '1:普通\r\n4:一般\r\n9:最高', '数据库备份文件的压缩级别，该配置在开启压缩时生效', 1381713408, 1381713408, 1, '9', 10),
(32, 'DEVELOP_MODE', 4, '开启开发者模式', 4, '0:关闭\r\n1:开启', '是否开启开发者模式', 1383105995, 1440555973, 1, '0', 0),
(33, 'ALLOW_VISIT', 3, '不受限控制器方法', 0, '', '', 1386644047, 1386644741, 1, '0:article/draftbox\r\n1:article/mydocument\r\n2:Category/tree\r\n3:Index/verify\r\n4:file/upload\r\n5:file/download\r\n6:user/updatePassword\r\n7:user/updateNickname\r\n8:user/submitPassword\r\n9:user/submitNickname', 0),
(34, 'DENY_VISIT', 3, '超管专限控制器方法', 0, '', '仅超级管理员可访问的控制器方法', 1386644141, 1386644659, 1, '0:Addons/addhook\r\n1:Addons/edithook\r\n2:Addons/delhook\r\n3:Addons/updateHook\r\n4:Admin/getMenus\r\n5:Admin/recordList\r\n6:AuthManager/updateRules\r\n7:AuthManager/tree', 0),
(35, 'REPLY_LIST_ROWS', 0, '回复列表每页条数', 2, '', '', 1386645376, 1387178083, 1, '20', 0),
(36, 'ADMIN_ALLOW_IP', 2, '后台允许访问IP', 4, '', '多个用逗号分隔，如果不配置表示不限制IP访问', 1387165454, 1387165553, 1, '', 12),
(37, 'SHOW_PAGE_TRACE', 4, '是否显示页面Trace', 4, '0:关闭\r\n1:开启', '是否显示页面Trace信息', 1387165685, 1387165685, 1, '0', 1),
(38, 'WEB_SITE_VERIFY', 4, '登录验证码', 1, '0:关闭\r\n1:开启', '登录时是否需要验证码', 1378898976, 1406859544, 1, '1', 2),
(42, 'ACCESS', 2, '未登录时可访问的页面', 4, '', '不区分大小写', 1390656601, 1390664079, 1, 'Home/User/*\r\nHome/Index/*\r\nhome/weixin/*\r\nadmin/File/*\r\nhome/File/*\r\nhome/Forum/*\r\nHome/Material/detail', 0),
(44, 'DEFAULT_PUBLIC_GROUP_ID', 0, '公众号默认等级ID', 3, '', '前台新增加的公众号的默认等级，值为0表示不做权限控制，公众号拥有全部插件的权限', 1393759885, 1393759981, 1, '0', 2),
(45, 'SYSTEM_UPDATE_REMIND', 4, '系统升级提醒', 4, '0:关闭\r\n1:开启', '开启后官方有新升级信息会及时在后台的网站设置页面头部显示升级提醒', 1393764263, 1393764263, 1, '0', 5),
(46, 'SYSTEM_UPDATRE_VERSION', 0, '系统升级最新版本号', 4, '', '记录当前系统的版本号，这是与官方比较是否有升级包的唯一标识，不熟悉者只勿改变其数值', 1393764702, 1394337646, 1, '20150826', 0),
(47, 'FOLLOW_YOUKE_UID', 0, '粉丝游客ID', 0, '', '', 1398927704, 1398927704, 1, '-11878', 0),
(48, 'DEFAULT_PUBLIC', 0, '注册后默认可管理的公众号ID', 3, '', '可为空。配置用户注册后即可管理的公众号ID，多个时用英文逗号分割', 1398928794, 1398929088, 1, '', 3),
(49, 'DEFAULT_PUBLIC_CREATE_MAX_NUMB', 0, '默认用户最多可创建的公众号数', 3, '', '注册用户最多的创建数，也可以在用户管理里对每个用户设置不同的值', 1398949652, 1398950115, 1, '5', 4),
(50, 'COPYRIGHT', 1, '版权信息', 1, '', '', 1401018910, 1401018910, 1, '版本由圆梦云科技有限公司所有', 3),
(51, 'WEIPHP_STORE_LICENSE', 1, '应用商店授权许可证', 1, '', '要与 应用商店》网站信息 里的授权许可证保持一致', 1402972720, 1402977473, 1, '', 0),
(52, 'SYSTEM_LOGO', 1, '网站LOGO', 5, '', '填写LOGO的网址，为空时默认显示weiphp的logo', 1403566699, 1403566746, 1, '', 0),
(53, 'SYSTEM_CLOSE_REGISTER', 4, '前台注册开关', 5, '0:不关闭\r\n1:关闭', '关闭后在登录页面不再显示注册链接', 1403568006, 1403568006, 1, '0', 0),
(54, 'SYSTEM_CLOSE_ADMIN', 4, '后台管理开关', 5, '0:不关闭\r\n1:关闭', '关闭后在登录页面不再显示后台登录链接', 1403568006, 1403568006, 1, '0', 0),
(55, 'SYSTEM_CLOSE_WIKI', 4, '二次开发开关', 5, '0:不关闭\r\n1:关闭', '关闭后在登录页面不再显示二次开发链接', 1403568006, 1403568006, 1, '0', 0),
(56, 'SYSTEM_CLOSE_BBS', 4, '官方论坛开关', 5, '0:不关闭\r\n1:关闭', '关闭后在登录页面不再显示官方论坛链接', 1403568006, 1403568006, 1, '0', 0),
(57, 'LOGIN_BACKGROUP', 1, '登录界面背景图', 5, '', '请输入图片网址，为空时默认使用自带的背景图', 1403568006, 1403570059, 1, '', 0),
(60, 'TONGJI_CODE', 2, '第三方统计JS代码', 5, '', '', 1428634717, 1428634717, 1, '', 0),
(61, 'SENSITIVE_WORDS', 1, '敏感词', 0, '', '当出现有敏感词的地方，会用*号代替, (多个敏感词用 , 隔开 )', 1433125977, 1435062628, 1, 'bitch,shit', 0),
(63, 'PUBLIC_BIND', 4, '公众号第三方平台', 5, '0:关闭\r\n1:开启', '申请审核通过微信开放平台里的公众号第三方平台账号后，就可以开启体验了', 1434542818, 1434542818, 1, '0', 0),
(64, 'COMPONENT_APPID', 1, '公众号开放平台的AppID', 5, '', '公众号第三方平台开启后必填的参数', 1434542891, 1434542975, 1, '', 0),
(65, 'COMPONENT_APPSECRET', 1, '公众号开放平台的AppSecret', 5, '', '公众号第三方平台开启后必填的参数', 1434542936, 1434542984, 1, '', 0),
(62, 'REG_AUDIT', 4, '注册审核', 3, '0:需要审核\r\n1:不需要审核', '', 1439811099, 1439811099, 1, '1', 1);

-- --------------------------------------------------------

--
-- 表的结构 `token`
--

CREATE TABLE IF NOT EXISTS `token` (
  `tokenId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` varchar(16) DEFAULT '',
  `accessToken` varchar(128) DEFAULT NULL,
  `type` varchar(8) NOT NULL,
  `createAt` int(11) NOT NULL DEFAULT '0',
  `ExpireIn` int(11) NOT NULL DEFAULT '3600',
  PRIMARY KEY (`tokenId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=168 ;

--
-- 转存表中的数据 `token`
--

INSERT INTO `token` (`tokenId`, `userId`, `accessToken`, `type`, `createAt`, `ExpireIn`) VALUES
(167, '58', '4fe073e1ebc828d51f9145e290126ca8', 'android', 1474560000, 3600);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `groupId` int(11) NOT NULL DEFAULT '1',
  `login` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(64) DEFAULT NULL,
  `mobile` varchar(64) DEFAULT NULL,
  `QQ` varchar(64) DEFAULT NULL,
  `weixin` varchar(64) DEFAULT NULL,
  `weibo` varchar(64) DEFAULT NULL,
  `accessToken` varchar(64) NOT NULL DEFAULT 'accessToken',
  `createAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` int(11) DEFAULT NULL,
  `expire` int(11) NOT NULL DEFAULT '0',
  `nickName` varchar(128) DEFAULT NULL,
  `trueName` varchar(128) DEFAULT NULL,
  `birthday` varchar(128) DEFAULT NULL,
  `gender` varchar(128) DEFAULT NULL,
  `signer` varchar(128) DEFAULT NULL,
  `zone` varchar(128) DEFAULT NULL,
  `addr` varchar(128) DEFAULT NULL,
  `gravatar` varchar(128) DEFAULT NULL,
  `height` varchar(16) DEFAULT NULL,
  `bloodpress` int(2) NOT NULL DEFAULT '0',
  `ecg` int(2) NOT NULL DEFAULT '0',
  `watch` int(2) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '0',
  `des` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- 转存表中的数据 `user_group`
--

INSERT INTO `user_group` (`groupId`, `groupName`, `groupChr`, `active`, `sort`, `des`) VALUES
(1, '系统管理员', 'system', 1, 0, '测试'),
(11, '机构管理员', 'organization', 1, 0, '机构'),
(10, '科室管理员', 'department', 1, 0, '科室'),
(21, 'IOS1', 'IOS12', 1, 14, 'APP ios用户13'),
(2, '系统管理员2', 'system2', 1, 0, '对整个系统进行设置和配置'),
(20, 'Android', 'Android', 1, 0, 'Android 用户'),
(12, '医生', 'doctor', 0, 0, '医生用户');

-- --------------------------------------------------------

--
-- 表的结构 `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `groupId` int(11) NOT NULL DEFAULT '1',
  `login` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(64) DEFAULT NULL,
  `mobile` varchar(64) DEFAULT NULL,
  `QQ` varchar(64) DEFAULT NULL,
  `weixin` varchar(64) DEFAULT NULL,
  `weibo` varchar(64) DEFAULT NULL,
  `accessToken` varchar(64) NOT NULL DEFAULT 'accessToken',
  `createAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` int(11) DEFAULT NULL,
  `expire` int(11) NOT NULL DEFAULT '0',
  `nickName` varchar(128) DEFAULT NULL,
  `trueName` varchar(128) DEFAULT NULL,
  `birthday` varchar(128) DEFAULT NULL,
  `gender` varchar(128) DEFAULT NULL,
  `signer` varchar(128) DEFAULT NULL,
  `zone` varchar(128) DEFAULT NULL,
  `addr` varchar(128) DEFAULT NULL,
  `gravatar` varchar(128) DEFAULT NULL,
  `height` varchar(16) DEFAULT NULL,
  `bloodpress` int(2) NOT NULL DEFAULT '0',
  `ecg` int(2) NOT NULL DEFAULT '0',
  `watch` int(2) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '0',
  `des` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
