# Aijiacms V6.6 R20150619 http://www.aijiacms.com
# 2015-11-13 17:29:22
# --------------------------------------------------------


DROP TABLE IF EXISTS `aijiacms_404`;
CREATE TABLE `aijiacms_404` (
  `itemid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL DEFAULT '',
  `robot` varchar(20) NOT NULL DEFAULT '',
  `username` varchar(30) NOT NULL DEFAULT '',
  `ip` varchar(50) NOT NULL DEFAULT '',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='404日志';


DROP TABLE IF EXISTS `aijiacms_ad`;
CREATE TABLE `aijiacms_ad` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '',
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `typeid` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `areaid` int(10) unsigned NOT NULL DEFAULT '0',
  `amount` float NOT NULL DEFAULT '0',
  `currency` varchar(20) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `introduce` varchar(255) NOT NULL DEFAULT '',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `username` varchar(30) NOT NULL DEFAULT '',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `editor` varchar(30) NOT NULL DEFAULT '',
  `edittime` int(10) unsigned NOT NULL DEFAULT '0',
  `fromtime` int(10) unsigned NOT NULL DEFAULT '0',
  `totime` int(10) unsigned NOT NULL DEFAULT '0',
  `stat` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `note` text NOT NULL,
  `code` text NOT NULL,
  `text_name` varchar(100) NOT NULL DEFAULT '',
  `text_url` varchar(255) NOT NULL DEFAULT '',
  `text_title` varchar(100) NOT NULL DEFAULT '',
  `text_style` varchar(50) NOT NULL DEFAULT '',
  `image_src` varchar(255) NOT NULL DEFAULT '',
  `image_url` varchar(255) NOT NULL DEFAULT '',
  `image_alt` varchar(100) NOT NULL DEFAULT '',
  `flash_src` varchar(255) NOT NULL DEFAULT '',
  `flash_url` varchar(255) NOT NULL DEFAULT '',
  `flash_loop` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `key_moduleid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `key_catid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `key_word` varchar(100) NOT NULL DEFAULT '',
  `key_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `listorder` smallint(4) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`aid`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='广告';

INSERT INTO `aijiacms_ad` VALUES('1','歪歪分享论坛','6','5','0','0','','','','0','admin','1442318376','admin','1442318602','1442246400','1788278399','0','','','','','','','http://yiti.15115.cn/file/upload/201509/15/20-03-19-28-1.jpg','','','','','1','0','0','','0','0','3');

DROP TABLE IF EXISTS `aijiacms_address`;
CREATE TABLE `aijiacms_address` (
  `itemid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `truename` varchar(30) NOT NULL DEFAULT '',
  `address` varchar(255) NOT NULL DEFAULT '',
  `postcode` varchar(10) NOT NULL DEFAULT '',
  `telephone` varchar(30) NOT NULL DEFAULT '',
  `mobile` varchar(30) NOT NULL DEFAULT '',
  `username` varchar(30) DEFAULT '',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `editor` varchar(30) NOT NULL DEFAULT '',
  `edittime` int(10) unsigned NOT NULL DEFAULT '0',
  `listorder` smallint(4) unsigned NOT NULL DEFAULT '0',
  `note` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`itemid`),
  KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='收货地址';


DROP TABLE IF EXISTS `aijiacms_admin`;
CREATE TABLE `aijiacms_admin` (
  `adminid` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(10) unsigned NOT NULL DEFAULT '0',
  `listorder` smallint(4) unsigned NOT NULL DEFAULT '0',
  `title` varchar(30) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `style` varchar(50) NOT NULL DEFAULT '',
  `moduleid` smallint(6) NOT NULL DEFAULT '0',
  `file` varchar(20) NOT NULL DEFAULT '',
  `action` varchar(255) NOT NULL DEFAULT '',
  `catid` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`adminid`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='管理员';

INSERT INTO `aijiacms_admin` VALUES('2','1','0','更新缓存','?action=cache','','0','','','');
INSERT INTO `aijiacms_admin` VALUES('3','1','0','网站设置','?file=setting','','0','','','');
INSERT INTO `aijiacms_admin` VALUES('4','1','0','模块管理','?file=module','','0','','','');
INSERT INTO `aijiacms_admin` VALUES('5','1','0','数据维护','?file=database','','0','','','');
INSERT INTO `aijiacms_admin` VALUES('6','1','0','模板管理','?file=template','','0','','','');
INSERT INTO `aijiacms_admin` VALUES('7','1','0','会员管理','?moduleid=2','','0','','','');
INSERT INTO `aijiacms_admin` VALUES('8','1','0','单页管理','?moduleid=3&file=webpage','','0','','','');
INSERT INTO `aijiacms_admin` VALUES('9','1','0','排名推广','?moduleid=3&file=spread','','0','','','');
INSERT INTO `aijiacms_admin` VALUES('10','1','0','广告管理','?moduleid=3&file=ad','','0','','','');
INSERT INTO `aijiacms_admin` VALUES('11','1','0','采集配置','?file=collectset','','0','','','');
INSERT INTO `aijiacms_admin` VALUES('12','1','0','批量采集','?file=collectbatch','','0','','','');
INSERT INTO `aijiacms_admin` VALUES('13','1','0','数据管理','?file=collectdata','','0','','','');

DROP TABLE IF EXISTS `aijiacms_admin_log`;
CREATE TABLE `aijiacms_admin_log` (
  `logid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `qstring` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(30) NOT NULL DEFAULT '',
  `ip` varchar(50) NOT NULL DEFAULT '',
  `logtime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`logid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='管理日志';


DROP TABLE IF EXISTS `aijiacms_admin_online`;
CREATE TABLE `aijiacms_admin_online` (
  `sid` varchar(32) NOT NULL DEFAULT '',
  `username` varchar(30) NOT NULL DEFAULT '',
  `ip` varchar(50) NOT NULL DEFAULT '',
  `moduleid` int(10) unsigned NOT NULL DEFAULT '0',
  `qstring` varchar(255) NOT NULL DEFAULT '',
  `lasttime` int(10) unsigned NOT NULL DEFAULT '0',
  UNIQUE KEY `sid` (`sid`)
) ENGINE=MEMORY DEFAULT CHARSET=utf8 COMMENT='在线管理员';


DROP TABLE IF EXISTS `aijiacms_ad_place`;
CREATE TABLE `aijiacms_ad_place` (
  `pid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `moduleid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `typeid` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `open` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `name` varchar(255) NOT NULL DEFAULT '',
  `thumb` varchar(255) NOT NULL DEFAULT '',
  `style` varchar(50) NOT NULL DEFAULT '',
  `introduce` varchar(255) NOT NULL DEFAULT '',
  `code` text NOT NULL,
  `width` smallint(5) unsigned NOT NULL DEFAULT '0',
  `height` smallint(5) unsigned NOT NULL DEFAULT '0',
  `price` float unsigned NOT NULL DEFAULT '0',
  `ads` smallint(4) unsigned NOT NULL DEFAULT '0',
  `listorder` smallint(4) unsigned NOT NULL DEFAULT '0',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `editor` varchar(30) NOT NULL DEFAULT '',
  `edittime` int(10) unsigned NOT NULL DEFAULT '0',
  `template` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COMMENT='广告位';

INSERT INTO `aijiacms_ad_place` VALUES('1','6','6','1','新房排名','','','','','0','0','0','1','0','1435899956','admin','1435899956','');
INSERT INTO `aijiacms_ad_place` VALUES('2','5','6','1','二手房排名','','','','','0','0','0','0','0','1435899956','admin','1435899956','');
INSERT INTO `aijiacms_ad_place` VALUES('3','7','6','1','租房排名','','','','','0','0','0','0','0','1435899956','admin','1435899956','');
INSERT INTO `aijiacms_ad_place` VALUES('4','4','6','1','公司排名','','','','','0','0','0','0','0','1435899956','admin','1435899956','');
INSERT INTO `aijiacms_ad_place` VALUES('5','0','3','1','横幅广告','','','','','468','60','0','0','0','1435899956','admin','1435899956','');
INSERT INTO `aijiacms_ad_place` VALUES('6','0','5','1','首页图片轮播','','','','','400','160','0','1','0','1435899956','admin','1435899956','');
INSERT INTO `aijiacms_ad_place` VALUES('7','6','7','1','新房赞助商链接','','','','','0','0','0','0','0','1435899956','admin','1435899956','');
INSERT INTO `aijiacms_ad_place` VALUES('8','4','7','1','公司赞助商链接','','','','','0','0','0','0','0','1435899956','admin','1435899956','');
INSERT INTO `aijiacms_ad_place` VALUES('9','5','7','1','二手房赞助商链接','','','','','0','0','0','0','0','1435899956','admin','1435899956','');
INSERT INTO `aijiacms_ad_place` VALUES('10','7','7','1','租房赞助商链接','','','','','0','0','0','0','0','1435899956','admin','1435899956','');
INSERT INTO `aijiacms_ad_place` VALUES('11','0','3','1','首页A区横幅第一位A1','','','首页A区横幅第一位A1','','1200','60','0','0','0','1435899956','admin','1435899956','');
INSERT INTO `aijiacms_ad_place` VALUES('12','0','3','1','首页A区横幅第二位A2','','','首页A区横幅第二位A2','','1200','60','0','0','0','1435899956','admin','1435899956','');
INSERT INTO `aijiacms_ad_place` VALUES('13','0','4','1','首页A区横幅第三位A3','','','首页A区横幅第三位A3','','1200','60','0','0','0','1435899956','admin','1435899956','');
INSERT INTO `aijiacms_ad_place` VALUES('14','0','3','1','首页B区横幅第一位B1','','','首页B区横幅第一位B1','','1200','60','0','0','0','1435899956','admin','1435899956','');
INSERT INTO `aijiacms_ad_place` VALUES('15','0','3','1','首页B区横幅第二位B2','','','首页B区横幅第三位B2','','1200','60','0','0','0','1435899956','admin','1435899956','');
INSERT INTO `aijiacms_ad_place` VALUES('16','0','3','1','首页B区横幅第三位B3','','','首页B区横幅第三位B3','','1200','60','0','0','0','1435899956','admin','1435899956','');
INSERT INTO `aijiacms_ad_place` VALUES('17','0','3','1','首页C区横幅第一位C1','','','首页C区横幅第一位C1','','1200','60','0','0','0','1435899956','admin','1435899956','');
INSERT INTO `aijiacms_ad_place` VALUES('18','0','3','1','首页C区横幅第二位C2','','','首页C区横幅第二位C2','','1200','60','0','0','0','1435899956','admin','1435899956','');
INSERT INTO `aijiacms_ad_place` VALUES('19','0','3','1','首页C区横幅第三位C3','','','首页C区横幅第三位C3','','1200','60','0','0','0','1435899956','admin','1435899956','');
INSERT INTO `aijiacms_ad_place` VALUES('20','0','3','1','首页D区横幅第一位D1','','','首页D区横幅第一位D1','','1200','60','0','0','0','1435899956','admin','1435899956','');
INSERT INTO `aijiacms_ad_place` VALUES('21','0','3','1','首页D区横幅第二位D2','','','首页D区横幅第二位D2','','1200','60','0','0','0','1435899956','admin','1435899956','');
INSERT INTO `aijiacms_ad_place` VALUES('22','0','3','1','首页E区横幅第一位E1','','','首页E区横幅第一位E1','','1200','60','0','0','0','1435899956','admin','1435899956','');

DROP TABLE IF EXISTS `aijiacms_alert`;
CREATE TABLE `aijiacms_alert` (
  `itemid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `mid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `areaid` int(10) unsigned NOT NULL DEFAULT '0',
  `word` varchar(100) NOT NULL DEFAULT '',
  `rate` smallint(4) unsigned NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL DEFAULT '',
  `username` varchar(30) NOT NULL DEFAULT '',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `editor` varchar(30) NOT NULL DEFAULT '0',
  `edittime` int(10) unsigned NOT NULL DEFAULT '0',
  `sendtime` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`itemid`),
  KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='房源提醒';


DROP TABLE IF EXISTS `aijiacms_announce`;
CREATE TABLE `aijiacms_announce` (
  `itemid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `typeid` int(10) unsigned NOT NULL DEFAULT '0',
  `areaid` int(10) unsigned NOT NULL DEFAULT '0',
  `level` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `style` varchar(50) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `fromtime` int(10) unsigned NOT NULL DEFAULT '0',
  `totime` int(10) unsigned NOT NULL DEFAULT '0',
  `editor` varchar(30) NOT NULL DEFAULT '',
  `edittime` int(10) unsigned NOT NULL DEFAULT '0',
  `islink` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `linkurl` varchar(255) NOT NULL DEFAULT '',
  `listorder` smallint(4) unsigned NOT NULL DEFAULT '0',
  `template` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`itemid`),
  KEY `addtime` (`addtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='公告';


DROP TABLE IF EXISTS `aijiacms_area`;
CREATE TABLE `aijiacms_area` (
  `areaid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `areaname` varchar(50) NOT NULL DEFAULT '',
  `parentid` int(10) unsigned NOT NULL DEFAULT '0',
  `arrparentid` varchar(255) NOT NULL DEFAULT '',
  `child` tinyint(1) NOT NULL DEFAULT '0',
  `arrchildid` text NOT NULL,
  `listorder` smallint(4) unsigned NOT NULL DEFAULT '0',
  `map` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`areaid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='地区';

INSERT INTO `aijiacms_area` VALUES('1','山东','0','0','0','1','1','');
INSERT INTO `aijiacms_area` VALUES('2','北京','0','0','0','2','2','');
INSERT INTO `aijiacms_area` VALUES('3','上海','0','0','0','3','3','');
INSERT INTO `aijiacms_area` VALUES('4','广州','0','0','0','4','4','');
INSERT INTO `aijiacms_area` VALUES('5','天津','0','0','0','5','5','');

DROP TABLE IF EXISTS `aijiacms_article_8`;
CREATE TABLE `aijiacms_article_8` (
  `itemid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `areaid` int(10) unsigned NOT NULL DEFAULT '0',
  `level` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `style` varchar(50) NOT NULL DEFAULT '',
  `fee` float NOT NULL DEFAULT '0',
  `subtitle` text NOT NULL,
  `introduce` varchar(255) NOT NULL DEFAULT '',
  `tag` varchar(100) NOT NULL DEFAULT '',
  `keyword` varchar(255) NOT NULL DEFAULT '',
  `pptword` varchar(255) NOT NULL DEFAULT '',
  `author` varchar(50) NOT NULL DEFAULT '',
  `copyfrom` varchar(30) NOT NULL DEFAULT '',
  `fromurl` varchar(255) NOT NULL DEFAULT '',
  `voteid` varchar(100) NOT NULL DEFAULT '',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `thumb` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(30) NOT NULL DEFAULT '',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `editor` varchar(30) NOT NULL DEFAULT '',
  `edittime` int(10) unsigned NOT NULL DEFAULT '0',
  `ip` varchar(50) NOT NULL DEFAULT '',
  `template` varchar(30) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `islink` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `linkurl` varchar(255) NOT NULL DEFAULT '',
  `filepath` varchar(255) NOT NULL DEFAULT '',
  `note` varchar(255) NOT NULL DEFAULT '',
  `houseid` int(10) DEFAULT NULL,
  `housename` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`itemid`),
  KEY `addtime` (`addtime`),
  KEY `catid` (`catid`),
  KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='资讯';

INSERT INTO `aijiacms_article_8` VALUES('1','28','1','2','歪歪分享论坛资讯栏目文章测试','','0','','歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目','','歪歪分享论坛资讯栏目文章测试,本地楼市','','','','','','1','http://yiti.15115.cn/file/upload/201509/15/22-36-01-84-1.jpg','admin','1442327627','souho','1442328245','127.0.0.1','','3','0','show-1.html','','','0','歪歪分享论坛');
INSERT INTO `aijiacms_article_8` VALUES('2','28','0','2','歪歪分享论坛资讯栏目文章测试','','0','','歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目','','歪歪分享论坛资讯栏目文章测试,本地楼市','','','','','','0','http://yiti.15115.cn/file/upload/201509/15/22-51-52-89-1.jpg','admin','1442328502','souho','1442328864','127.0.0.1','','3','0','show-2.html','','','0','歪歪分享论坛');
INSERT INTO `aijiacms_article_8` VALUES('3','29','0','0','歪歪分享论坛资讯栏目文章测试','','0','','歪歪分享论坛资讯栏目文章测试','','歪歪分享论坛资讯栏目文章测试,国内楼市','','','','','','0','','admin','1442333982','souho','1442333998','127.0.0.1','','3','0','show-3.html','','','2','海上明月');
INSERT INTO `aijiacms_article_8` VALUES('4','32','0','1','海上明月','','0','','海上明月','','海上明月,新房导购','','','','','','0','','admin','1442387916','admin','1442387945','127.0.0.1','','3','0','show-4.html','','','0','海上明月');
INSERT INTO `aijiacms_article_8` VALUES('5','33','0','3','海上明月海上明月海上明月海上明月','','0','','海上明月','','海上明月海上明月海上明月海上明月,优惠信息','','','','','','0','http://yiti.15115.cn/file/upload/201509/16/15-23-35-56-1.jpg','admin','1442387945','admin','1442388224','127.0.0.1','','3','0','show-5.html','','','2','海上明月');
INSERT INTO `aijiacms_article_8` VALUES('6','60','0','3','歪歪分享论坛资讯栏目文章测试','','0','','歪歪分享论坛资讯栏目文章测试','','歪歪分享论坛资讯栏目文章测试,装修','','','','','','5','http://yiti.15115.cn/file/upload/201509/16/21-47-17-54-1.jpg','admin','1442411202','admin','1442411762','127.0.0.1','','3','0','show-6.html','','','2','海上明月');
INSERT INTO `aijiacms_article_8` VALUES('7','60','0','3','装修大学栏目测试','','0','','装修大学栏目测试装修大学栏目测试装修大学','','装修大学栏目测试,装修','','','','','','100','http://yiti.15115.cn/file/upload/201509/16/21-59-08-46-1.jpg','admin','1442411919','admin','1442412418','127.0.0.1','','3','0','show-7.html','','','2','海上明月');
INSERT INTO `aijiacms_article_8` VALUES('8','60','0','3','装修大学栏目继续测试 歪歪分享论坛','','0','','装修大学栏目继续测试 歪歪分享论坛装修大学栏','','装修大学栏目继续测试 歪歪分享论坛,装修','','','','','','0','http://yiti.15115.cn/file/upload/201509/16/22-08-01-36-1.jpg','admin','1442411969','admin','1442412484','127.0.0.1','','3','0','show-8.html','','','2','海上明月');

DROP TABLE IF EXISTS `aijiacms_article_data_8`;
CREATE TABLE `aijiacms_article_data_8` (
  `itemid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `content` longtext NOT NULL,
  PRIMARY KEY (`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='资讯内容';

INSERT INTO `aijiacms_article_data_8` VALUES('1','<p>\r\n	<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span>\r\n</p>\r\n<p>\r\n	<span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span>\r\n</p>\r\n<p>\r\n	<span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试<span>歪歪分享论坛资讯栏目文章测试</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span>\r\n</p>');
INSERT INTO `aijiacms_article_data_8` VALUES('2','<p>\r\n	歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试\r\n</p>\r\n<p>\r\n	<br />\r\n</p>');
INSERT INTO `aijiacms_article_data_8` VALUES('3','歪歪分享论坛资讯栏目文章测试');
INSERT INTO `aijiacms_article_data_8` VALUES('4','海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月');
INSERT INTO `aijiacms_article_data_8` VALUES('5','海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月');
INSERT INTO `aijiacms_article_data_8` VALUES('6','<p>\r\n	歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试歪歪分享论坛资讯栏目文章测试\r\n</p>\r\n<p>\r\n	<img src=\"/file/upload/image/20150916/20150916215113_90982.jpg\" alt=\"\" /> \r\n</p>');
INSERT INTO `aijiacms_article_data_8` VALUES('7','装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试装修大学栏目测试<img src=\"/file/upload/image/20150916/20150916215927_88568.jpg\" alt=\"\" />');
INSERT INTO `aijiacms_article_data_8` VALUES('8','装修大学栏目继续测试 歪歪分享论坛装修大学栏目继续测试 歪歪分享论坛装修大学栏目继续测试 歪歪分享论坛装修大学栏目继续测试 歪歪分享论坛装修大学栏目继续测试 歪歪分享论坛装修大学栏目继续测试 歪歪分享论坛装修大学栏目继续测试 歪歪分享论坛装修大学栏目继续测试 歪歪分享论坛装修大学栏目继续测试 歪歪分享论坛装修大学栏目继续测试 歪歪分享论坛装修大学栏目继续测试 歪歪分享论坛装修大学栏目继续测试 歪歪分享论坛装修大学栏目继续测试 歪歪分享论坛装修大学栏目继续测试 歪歪分享论坛装修大学栏目继续测试 歪歪分享论坛装修大学栏目继续测试 歪歪分享论坛装修大学栏目继续测试 歪歪分享论坛装修大学栏目继续测试 歪歪分享论坛装修大学栏目继续测试 歪歪分享论坛装修大学栏目继续测试 歪歪分享论坛装修大学栏目继续测试 歪歪分享论坛装修大学栏目继续测试 歪歪分享论坛装修大学栏目继续测试 歪歪分享论坛装修大学栏目继续测试 歪歪分享论坛装修大学栏目继续测试 歪歪分享论坛装修大学栏目继续测试 歪歪分享论坛装修大学栏目继续测试 歪歪分享论坛装修大学栏目继续测试 歪歪分享论坛装修大学栏目继续测试 歪歪分享论坛装修大学栏目继续测试 歪歪分享论坛装修大学栏目继续测试 歪歪分享论坛装修大学栏目继续测试 歪歪分享论坛装修大学栏目继续测试 歪歪分享论坛装修大学栏目继续测试 歪歪分享论坛装修大学栏目继续测试 歪歪分享论坛<img src=\"/file/upload/image/20150916/20150916220002_64928.jpg\" alt=\"\" />');

DROP TABLE IF EXISTS `aijiacms_ask`;
CREATE TABLE `aijiacms_ask` (
  `itemid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `typeid` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `username` varchar(30) NOT NULL DEFAULT '',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `admin` varchar(30) NOT NULL DEFAULT '',
  `admintime` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `reply` text NOT NULL,
  `star` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `houseid` int(10) NOT NULL,
  `tousername` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`itemid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='客服中心';

INSERT INTO `aijiacms_ask` VALUES('1','1','歪歪分享论坛问题测试','歪歪分享论坛问题测试歪歪分享论坛问题测试歪歪分享论坛问题测试歪歪分享论坛问题测试歪歪分享论坛问题测试歪歪分享论坛问题测试歪歪分享论坛问题测试歪歪分享论坛问题测试歪歪分享论坛问题测试歪歪分享论坛问题测试歪歪分享论坛问题测试歪歪分享论坛问题测试歪歪分享论坛问题测试歪歪分享论坛问题测试歪歪分享论坛问题测试歪歪分享论坛问题测试歪歪分享论坛问题测试歪歪分享论坛问题测试','admin','1442383022','admin','1442383074','2','歪歪分享论坛问题测试','0','0','');

DROP TABLE IF EXISTS `aijiacms_banip`;
CREATE TABLE `aijiacms_banip` (
  `itemid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(50) NOT NULL DEFAULT '',
  `editor` varchar(30) NOT NULL DEFAULT '',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `totime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='IP禁止';


DROP TABLE IF EXISTS `aijiacms_banword`;
CREATE TABLE `aijiacms_banword` (
  `bid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `replacefrom` varchar(255) NOT NULL DEFAULT '',
  `replaceto` varchar(255) NOT NULL DEFAULT '',
  `deny` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`bid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='词语过滤';


DROP TABLE IF EXISTS `aijiacms_buy_16`;
CREATE TABLE `aijiacms_buy_16` (
  `itemid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `typeid` smallint(2) unsigned NOT NULL DEFAULT '0',
  `areaid` int(10) unsigned NOT NULL DEFAULT '0',
  `level` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `style` varchar(50) NOT NULL DEFAULT '',
  `fee` float NOT NULL DEFAULT '0',
  `introduce` varchar(255) NOT NULL DEFAULT '',
  `n1` varchar(100) NOT NULL,
  `n2` varchar(100) NOT NULL,
  `n3` varchar(100) NOT NULL,
  `v1` varchar(100) NOT NULL,
  `v2` varchar(100) NOT NULL,
  `v3` varchar(100) NOT NULL,
  `amount` varchar(10) NOT NULL DEFAULT '',
  `price` varchar(10) NOT NULL DEFAULT '',
  `pack` varchar(20) NOT NULL DEFAULT '',
  `days` smallint(3) unsigned NOT NULL DEFAULT '0',
  `tag` varchar(100) NOT NULL DEFAULT '',
  `keyword` varchar(255) NOT NULL DEFAULT '',
  `pptword` varchar(255) NOT NULL DEFAULT '',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `thumb` varchar(255) NOT NULL DEFAULT '',
  `thumb1` varchar(255) NOT NULL DEFAULT '',
  `thumb2` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(30) NOT NULL DEFAULT '',
  `groupid` smallint(4) unsigned NOT NULL DEFAULT '0',
  `company` varchar(100) NOT NULL DEFAULT '',
  `vip` smallint(2) unsigned NOT NULL DEFAULT '0',
  `validated` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `truename` varchar(30) NOT NULL DEFAULT '',
  `telephone` varchar(50) NOT NULL DEFAULT '',
  `mobile` varchar(50) NOT NULL DEFAULT '',
  `address` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `msn` varchar(50) NOT NULL DEFAULT '',
  `qq` varchar(20) NOT NULL DEFAULT '',
  `ali` varchar(30) NOT NULL DEFAULT '',
  `skype` varchar(30) NOT NULL DEFAULT '',
  `totime` int(10) unsigned NOT NULL DEFAULT '0',
  `editor` varchar(30) NOT NULL DEFAULT '',
  `edittime` int(10) unsigned NOT NULL DEFAULT '0',
  `editdate` date NOT NULL DEFAULT '0000-00-00',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `adddate` date NOT NULL DEFAULT '0000-00-00',
  `ip` varchar(50) NOT NULL DEFAULT '',
  `template` varchar(30) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `linkurl` varchar(255) NOT NULL DEFAULT '',
  `filepath` varchar(255) NOT NULL DEFAULT '',
  `note` varchar(255) NOT NULL DEFAULT '',
  `room` varchar(50) NOT NULL DEFAULT '',
  `hall` varchar(50) NOT NULL,
  `toilet` varchar(50) NOT NULL DEFAULT '',
  `balcony` varchar(50) NOT NULL DEFAULT '',
  `houseearm` int(19) NOT NULL,
  PRIMARY KEY (`itemid`),
  KEY `username` (`username`),
  KEY `editdate` (`editdate`,`vip`,`edittime`),
  KEY `edittime` (`edittime`),
  KEY `catid` (`catid`),
  KEY `areaid` (`areaid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='求购';


DROP TABLE IF EXISTS `aijiacms_buy_data_16`;
CREATE TABLE `aijiacms_buy_data_16` (
  `itemid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `content` mediumtext NOT NULL,
  PRIMARY KEY (`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='求购内容';


DROP TABLE IF EXISTS `aijiacms_cache`;
CREATE TABLE `aijiacms_cache` (
  `cacheid` varchar(32) NOT NULL DEFAULT '',
  `totime` int(10) unsigned NOT NULL DEFAULT '0',
  UNIQUE KEY `cacheid` (`cacheid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文件缓存';


DROP TABLE IF EXISTS `aijiacms_category`;
CREATE TABLE `aijiacms_category` (
  `catid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `moduleid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `catname` varchar(50) NOT NULL DEFAULT '',
  `style` varchar(50) NOT NULL DEFAULT '',
  `catdir` varchar(255) NOT NULL DEFAULT '',
  `linkurl` varchar(255) NOT NULL DEFAULT '',
  `letter` varchar(4) NOT NULL DEFAULT '',
  `level` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `item` bigint(20) unsigned NOT NULL DEFAULT '0',
  `property` smallint(6) unsigned NOT NULL DEFAULT '0',
  `parentid` int(10) unsigned NOT NULL DEFAULT '0',
  `arrparentid` varchar(255) NOT NULL DEFAULT '',
  `child` tinyint(1) NOT NULL DEFAULT '0',
  `arrchildid` text NOT NULL,
  `listorder` smallint(4) unsigned NOT NULL DEFAULT '0',
  `template` varchar(30) NOT NULL DEFAULT '',
  `show_template` varchar(30) NOT NULL DEFAULT '',
  `seo_title` varchar(255) NOT NULL DEFAULT '',
  `seo_keywords` varchar(255) NOT NULL DEFAULT '',
  `seo_description` varchar(255) NOT NULL DEFAULT '',
  `group_list` varchar(255) NOT NULL DEFAULT '',
  `group_show` varchar(255) NOT NULL DEFAULT '',
  `group_add` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`catid`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=utf8 COMMENT='栏目分类';

INSERT INTO `aijiacms_category` VALUES('1','6','住宅','','zz','list.php/catid-1/','z','1','0','0','0','0','0','','1','','','','','','3,5,6,7,8','3,5,6,7,8','8');
INSERT INTO `aijiacms_category` VALUES('2','6','公寓','','gy','list.php/catid-2/','g','1','0','0','0','0','0','','2','','','','','','3,5,6,7,8','3,5,6,7,8','8');
INSERT INTO `aijiacms_category` VALUES('3','6','商铺','','sp','list.php/catid-3/','s','1','0','0','0','0','0','','3','','','','','','3,5,6,7,8','3,5,6,7,8','8');
INSERT INTO `aijiacms_category` VALUES('4','6','写字楼','','xzl','list.php/catid-4/','x','1','0','0','0','0','0','','4','','','','','','3,5,6,7,8','3,5,6,7,8','8');
INSERT INTO `aijiacms_category` VALUES('5','6','别墅','','bs','list.php/catid-5/','b','1','0','0','0','0','0','','5','','','','','','3,5,6,7,8','3,5,6,7,8','8');
INSERT INTO `aijiacms_category` VALUES('6','6','商住楼','','szl','list.php/catid-6/','s','1','0','0','0','0','0','','6','','','','','','3,5,6,7,8','3,5,6,7,8','8');
INSERT INTO `aijiacms_category` VALUES('7','6','其它','','qt','list.php/catid-7/','q','1','0','0','0','0','0','','7','','','','','','3,5,6,7,8','3,5,6,7,8','8');
INSERT INTO `aijiacms_category` VALUES('8','5','住宅','','zz','list.php?catid=8','z','1','2','0','0','0','0','8','8','','','','','','3,5,6,7,8','3,5,6,7,8','5,6,7,8');
INSERT INTO `aijiacms_category` VALUES('9','5','公寓','','gy','list.php?catid=9','g','1','0','0','0','0','0','9','9','','','','','','3,5,6,7,8','3,5,6,7,8','5,6,7,8');
INSERT INTO `aijiacms_category` VALUES('10','5','商铺','','sp','list.php?catid=10','s','1','0','0','0','0','0','10','10','','','','','','3,5,6,7,8','3,5,6,7,8','5,6,7,8');
INSERT INTO `aijiacms_category` VALUES('11','5','写字楼','','xzl','list.php?catid=11','x','1','0','0','0','0','0','11','11','','','','','','3,5,6,7,8','3,5,6,7,8','5,6,7,8');
INSERT INTO `aijiacms_category` VALUES('12','5','其它','','qt','list.php?catid=12','q','1','0','0','0','0','0','12','12','','','','','','3,5,6,7,8','3,5,6,7,8','5,6,7,8');
INSERT INTO `aijiacms_category` VALUES('13','7','住宅','','zz','list-13.html','z','1','0','0','0','0','0','','13','','','','','','3,5,6,7,8','3,5,6,7,8','5,6,7,8');
INSERT INTO `aijiacms_category` VALUES('14','7','公寓','','gy','list-14.html','g','1','0','0','0','0','0','','14','','','','','','3,5,6,7,8','3,5,6,7,8','5,6,7,8');
INSERT INTO `aijiacms_category` VALUES('15','7','商铺','','sp','list-15.html','s','1','0','0','0','0','0','','15','','','','','','3,5,6,7,8','3,5,6,7,8','5,6,7,8');
INSERT INTO `aijiacms_category` VALUES('16','7','写字楼','','xzl','list-16.html','x','1','0','0','0','0','0','','16','','','','','','3,5,6,7,8','3,5,6,7,8','5,6,7,8');
INSERT INTO `aijiacms_category` VALUES('17','7','其它','','qt','list-17.html','q','1','0','0','0','0','0','','17','','','','','','3,5,6,7,8','3,5,6,7,8','5,6,7,8');
INSERT INTO `aijiacms_category` VALUES('18','16','住宅','','Zz','list-18.html','z','1','0','0','0','0','0','','18','','','','','','3,5,6,7,8','3,5,6,7,8','3,5,6,7,8');
INSERT INTO `aijiacms_category` VALUES('19','16','商铺','','sp','list-19.html','e','1','0','0','0','0','0','','19','','','','','','3,5,6,7,8','3,5,6,7,8','3,5,6,7,8');
INSERT INTO `aijiacms_category` VALUES('20','4','经纪人','','jjr','list-20.html','j','1','0','0','0','0','0','','20','','','','','','3,5,6,7,8','3,5,6,7,8','6,7,8');
INSERT INTO `aijiacms_category` VALUES('21','4','中介','','zj','list-21.html','z','1','0','0','0','0','0','','21','','','','','','3,5,6,7,8','3,5,6,7,8','6,7,8');
INSERT INTO `aijiacms_category` VALUES('22','4','开发商','','kfs','list-22.html','k','1','0','0','0','0','0','','22','','','','','','3,5,6,7,8','3,5,6,7,8','6,7,8');
INSERT INTO `aijiacms_category` VALUES('23','12','效果图','','xgt','list.php?catid=23','x','1','1','0','0','0','0','23','23','','','','','','3,5,6,7,8','3,5,6,7,8','8');
INSERT INTO `aijiacms_category` VALUES('24','12','户型图','','hx','list.php?catid=24','h','1','2','0','0','0','0','24','24','','','','','','3,5,6,7,8','3,5,6,7,8','8');
INSERT INTO `aijiacms_category` VALUES('25','12','样板间','','yb','list.php?catid=25','y','1','1','0','0','0','0','25','25','','','','','','3,5,6,7,8','3,5,6,7,8','8');
INSERT INTO `aijiacms_category` VALUES('26','12','实景图','','sj','list.php?catid=26','s','1','1','0','0','0','0','26','26','','','','','','3,5,6,7,8','3,5,6,7,8','8');
INSERT INTO `aijiacms_category` VALUES('27','12','交通图','','jt','list.php?catid=27','j','1','1','0','0','0','0','27','27','','','','','','3,5,6,7,8','3,5,6,7,8','8');
INSERT INTO `aijiacms_category` VALUES('28','8','本地楼市','','bd','list-28.html','b','1','0','0','0','0','0','28','28','','','','','','3,5,6,7,8','3,5,6,7,8','6,7,8');
INSERT INTO `aijiacms_category` VALUES('29','8','国内楼市','','gn','list-29.html','g','1','0','0','0','0','0','29','29','','','','','','3,5,6,7,8','3,5,6,7,8','6,7,8');
INSERT INTO `aijiacms_category` VALUES('30','8','人物专访','','rw','list-30.html','r','1','0','0','0','0','0','30','30','','','','','','3,5,6,7,8','3,5,6,7,8','6,7,8');
INSERT INTO `aijiacms_category` VALUES('31','8','政策法规','','zc','list-31.html','z','1','0','0','0','0','0','31','31','','','','','','3,5,6,7,8','3,5,6,7,8','6,7,8');
INSERT INTO `aijiacms_category` VALUES('32','8','新房导购','','dg','list-32.html','d','1','0','0','0','0','0','32','32','','','','','','3,5,6,7,8','3,5,6,7,8','6,7,8');
INSERT INTO `aijiacms_category` VALUES('33','8','优惠信息','','yh','list-33.html','y','1','0','0','0','0','0','33','33','','','','','','3,5,6,7,8','3,5,6,7,8','6,7,8');
INSERT INTO `aijiacms_category` VALUES('34','8','看房日记','','kf','list-34.html','k','1','0','0','0','0','0','34','34','','','','','','3,5,6,7,8','3,5,6,7,8','6,7,8');
INSERT INTO `aijiacms_category` VALUES('35','8','项目动态','','dt','list-35.html','d','1','0','0','0','0','0','35','35','','','','','','3,5,6,7,8','3,5,6,7,8','6,7,8');
INSERT INTO `aijiacms_category` VALUES('36','8','二手房资讯','','esf','list-36.html','e','1','0','0','0','0','0','36','36','','','','','','3,5,6,7,8','3,5,6,7,8','6,7,8');
INSERT INTO `aijiacms_category` VALUES('37','8','购房手册','','gfsc','list-37.html','g','1','0','0','0','0','1','37,38,39,40,41,42,43,44,45,46,47,48,49,50,51','37','','','','','','3,5,6,7,8','3,5,6,7,8','3,5,6,7,8');
INSERT INTO `aijiacms_category` VALUES('38','8','购房前期准备','','38','list-38.html','','1','0','0','37','0,37','0','38','38','','','','','','3,5,6,7,8','3,5,6,7,8','3,5,6,7,8');
INSERT INTO `aijiacms_category` VALUES('39','8','网上选房','','39','list-39.html','','1','0','0','37','0,37','0','39','39','','','','','','3,5,6,7,8','3,5,6,7,8','3,5,6,7,8');
INSERT INTO `aijiacms_category` VALUES('40','8','实地看房','','40','list-40.html','','1','0','0','37','0,37','0','40','40','','','','','','3,5,6,7,8','3,5,6,7,8','3,5,6,7,8');
INSERT INTO `aijiacms_category` VALUES('41','8','楼盘比较','','41','list-41.html','','1','0','0','37','0,37','0','41','41','','','','','','3,5,6,7,8','3,5,6,7,8','3,5,6,7,8');
INSERT INTO `aijiacms_category` VALUES('42','8','认购','','42','list-42.html','','1','0','0','37','0,37','0','42','42','','','','','','3,5,6,7,8','3,5,6,7,8','3,5,6,7,8');
INSERT INTO `aijiacms_category` VALUES('43','8','购房合同','','43','list-43.html','','1','0','0','37','0,37','0','43','43','','','','','','3,5,6,7,8','3,5,6,7,8','3,5,6,7,8');
INSERT INTO `aijiacms_category` VALUES('44','8','购房贷款','','44','list-44.html','','1','0','0','37','0,37','0','44','44','','','','','','3,5,6,7,8','3,5,6,7,8','3,5,6,7,8');
INSERT INTO `aijiacms_category` VALUES('45','8','收房验房','','45','list-45.html','','1','0','0','37','0,37','0','45','45','','','','','','3,5,6,7,8','3,5,6,7,8','3,5,6,7,8');
INSERT INTO `aijiacms_category` VALUES('46','8','入住装修','','46','list-46.html','','1','0','0','37','0,37','0','46','46','','','','','','3,5,6,7,8','3,5,6,7,8','3,5,6,7,8');
INSERT INTO `aijiacms_category` VALUES('47','8','房产证','','47','list-47.html','','1','0','0','37','0,37','0','47','47','','','','','','3,5,6,7,8','3,5,6,7,8','3,5,6,7,8');
INSERT INTO `aijiacms_category` VALUES('48','8','物业','','48','list-48.html','','1','0','0','37','0,37','0','48','48','','','','','','3,5,6,7,8','3,5,6,7,8','3,5,6,7,8');
INSERT INTO `aijiacms_category` VALUES('49','8','退房','','49','list-49.html','','1','0','0','37','0,37','0','49','49','','','','','','3,5,6,7,8','3,5,6,7,8','3,5,6,7,8');
INSERT INTO `aijiacms_category` VALUES('50','8','二手房','','50','list-50.html','','1','0','0','37','0,37','0','50','50','','','','','','3,5,6,7,8','3,5,6,7,8','3,5,6,7,8');
INSERT INTO `aijiacms_category` VALUES('51','8','租房','','51','list-51.html','','1','0','0','37','0,37','0','51','51','','','','','','3,5,6,7,8','3,5,6,7,8','3,5,6,7,8');
INSERT INTO `aijiacms_category` VALUES('52','8','写字楼动态','','xzldt','list-52.html','x','1','0','0','0','0','0','52','52','','','','','','3,5,6,7,8','3,5,6,7,8','3,5,6,7,8');
INSERT INTO `aijiacms_category` VALUES('53','8','商铺动态','','spdt','list-53.html','s','1','0','0','0','0','0','53','53','','','','','','3,5,6,7,8','3,5,6,7,8','6,7,8');
INSERT INTO `aijiacms_category` VALUES('54','16','写字楼','','xiezilou','list-54.html','x','1','0','0','0','0','0','','54','','','','','','3,5,6,7,8','3,5,6,7,8','5,6,7,8');
INSERT INTO `aijiacms_category` VALUES('56','13','装修招标','','70','list.php?catid=56','','1','0','0','0','0','0','56','56','','','','','','','','');
INSERT INTO `aijiacms_category` VALUES('57','13','家装服务','','69','list.php?catid=57','','1','0','0','0','0','0','57','57','','','','','','','','');
INSERT INTO `aijiacms_category` VALUES('58','13','建材市场','','68','list.php?catid=58','','1','0','0','0','0','0','58','58','','','','','','','','');
INSERT INTO `aijiacms_category` VALUES('59','13','家居家具','','67','list.php?catid=59','','1','0','0','0','0','0','59','59','','','','','','','','');
INSERT INTO `aijiacms_category` VALUES('60','8','装修','','60','list-60.html','','1','3','0','0','0','1','60,61,62,63,64,65,66','60','','','','','','','','');
INSERT INTO `aijiacms_category` VALUES('61','8','促销导购','','61','list-61.html','','1','0','0','60','0,60','0','61','61','','','','','','','','');
INSERT INTO `aijiacms_category` VALUES('62','8','装修大学','','62','list-62.html','','1','0','0','60','0,60','0','62','62','','','','','','','','');
INSERT INTO `aijiacms_category` VALUES('63','8','品味潮流','','63','list-63.html','','1','0','0','60','0,60','0','63','63','','','','','','','','');
INSERT INTO `aijiacms_category` VALUES('64','8','设计指南','','64','list-64.html','','1','0','0','60','0,60','0','64','64','','','','','','','','');
INSERT INTO `aijiacms_category` VALUES('65','8','装修攻略','','65','list-65.html','','1','0','0','60','0,60','0','65','65','','','','','','','','');
INSERT INTO `aijiacms_category` VALUES('66','8','建材选购','','66','list-66.html','','1','0','0','60','0,60','0','66','66','','','','','','','','');

DROP TABLE IF EXISTS `aijiacms_category_option`;
CREATE TABLE `aijiacms_category_option` (
  `oid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `required` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `search` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `value` text NOT NULL,
  `extend` text NOT NULL,
  `listorder` smallint(4) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`oid`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='分类属性';


DROP TABLE IF EXISTS `aijiacms_category_value`;
CREATE TABLE `aijiacms_category_value` (
  `oid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `moduleid` smallint(6) NOT NULL DEFAULT '0',
  `itemid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `value` text NOT NULL,
  KEY `moduleid` (`moduleid`,`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='分类属性值';


DROP TABLE IF EXISTS `aijiacms_chat`;
CREATE TABLE `aijiacms_chat` (
  `chatid` char(32) NOT NULL DEFAULT '',
  `fromuser` char(50) NOT NULL DEFAULT '',
  `fgettime` int(10) unsigned NOT NULL DEFAULT '0',
  `freadtime` int(10) unsigned NOT NULL DEFAULT '0',
  `touser` char(50) NOT NULL DEFAULT '',
  `tgettime` int(10) unsigned NOT NULL DEFAULT '0',
  `treadtime` int(10) unsigned NOT NULL DEFAULT '0',
  `forward` char(255) NOT NULL DEFAULT '',
  UNIQUE KEY `chatid` (`chatid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='在线聊天';


DROP TABLE IF EXISTS `aijiacms_city`;
CREATE TABLE `aijiacms_city` (
  `areaid` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL DEFAULT '',
  `style` varchar(50) NOT NULL DEFAULT '',
  `iparea` text NOT NULL,
  `domain` varchar(255) NOT NULL DEFAULT '',
  `letter` varchar(4) NOT NULL DEFAULT '',
  `listorder` smallint(4) unsigned NOT NULL DEFAULT '0',
  `template` varchar(50) NOT NULL DEFAULT '',
  `seo_title` varchar(255) NOT NULL DEFAULT '',
  `seo_keywords` varchar(255) NOT NULL DEFAULT '',
  `seo_description` varchar(255) NOT NULL DEFAULT '',
  `hits` int(5) DEFAULT NULL,
  `map_mid` varchar(30) DEFAULT NULL,
  UNIQUE KEY `areaid` (`areaid`),
  KEY `domain` (`domain`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='城市分站';


DROP TABLE IF EXISTS `aijiacms_comment`;
CREATE TABLE `aijiacms_comment` (
  `itemid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `item_mid` smallint(6) NOT NULL DEFAULT '0',
  `item_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `item_title` varchar(255) NOT NULL DEFAULT '',
  `item_username` varchar(30) NOT NULL DEFAULT '',
  `star` tinyint(1) NOT NULL DEFAULT '0',
  `content` text NOT NULL,
  `qid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `quotation` text NOT NULL,
  `username` varchar(30) NOT NULL DEFAULT '',
  `hidden` tinyint(1) NOT NULL DEFAULT '0',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `reply` text NOT NULL,
  `editor` varchar(30) NOT NULL DEFAULT '',
  `replyer` varchar(30) NOT NULL DEFAULT '',
  `replytime` int(10) unsigned NOT NULL DEFAULT '0',
  `agree` int(10) unsigned NOT NULL DEFAULT '0',
  `against` int(10) unsigned NOT NULL DEFAULT '0',
  `quote` int(10) unsigned NOT NULL DEFAULT '0',
  `ip` varchar(50) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`itemid`),
  KEY `item_mid` (`item_mid`),
  KEY `item_id` (`item_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='评论';

INSERT INTO `aijiacms_comment` VALUES('1','6','7','歪歪分享论坛远航国际','admin','5','环境非常不错','0','','waiwaili','1','1442383839','','','','0','0','0','0','127.0.0.1','3');
INSERT INTO `aijiacms_comment` VALUES('2','6','5','威尼斯庄园','admin','5','环境非常不错','0','','waiwaili','1','1442383971','','','','0','0','0','0','127.0.0.1','3');
INSERT INTO `aijiacms_comment` VALUES('3','6','4','大同天下','admin','5','环境非常不错','0','','waiwaili','1','1442384009','','','','0','0','0','0','127.0.0.1','3');

DROP TABLE IF EXISTS `aijiacms_comment_ban`;
CREATE TABLE `aijiacms_comment_ban` (
  `bid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `moduleid` smallint(6) NOT NULL DEFAULT '0',
  `itemid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `editor` varchar(30) NOT NULL DEFAULT '',
  `edittime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`bid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='评论禁止';


DROP TABLE IF EXISTS `aijiacms_comment_stat`;
CREATE TABLE `aijiacms_comment_stat` (
  `sid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `moduleid` smallint(6) NOT NULL DEFAULT '0',
  `itemid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `comment` int(10) unsigned NOT NULL DEFAULT '0',
  `star1` int(10) unsigned NOT NULL DEFAULT '0',
  `star2` int(10) unsigned NOT NULL DEFAULT '0',
  `star3` int(10) unsigned NOT NULL DEFAULT '0',
  `star4` int(10) unsigned NOT NULL DEFAULT '0',
  `star5` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='评论统计';

INSERT INTO `aijiacms_comment_stat` VALUES('1','6','7','1','0','0','0','0','1');
INSERT INTO `aijiacms_comment_stat` VALUES('2','6','5','1','0','0','0','0','1');
INSERT INTO `aijiacms_comment_stat` VALUES('3','6','4','1','0','0','0','0','1');

DROP TABLE IF EXISTS `aijiacms_company`;
CREATE TABLE `aijiacms_company` (
  `userid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `username` varchar(30) NOT NULL DEFAULT '',
  `groupid` smallint(4) unsigned NOT NULL DEFAULT '0',
  `company` varchar(100) NOT NULL DEFAULT '',
  `level` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `validated` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `validator` varchar(100) NOT NULL DEFAULT '',
  `validtime` int(10) unsigned NOT NULL DEFAULT '0',
  `vip` smallint(2) unsigned NOT NULL DEFAULT '0',
  `vipt` smallint(2) unsigned NOT NULL DEFAULT '0',
  `vipr` smallint(2) NOT NULL DEFAULT '0',
  `type` varchar(100) NOT NULL DEFAULT '',
  `catid` varchar(100) NOT NULL DEFAULT '',
  `catids` varchar(100) NOT NULL DEFAULT '',
  `areaid` int(10) unsigned NOT NULL DEFAULT '0',
  `mode` varchar(100) NOT NULL DEFAULT '',
  `capital` float unsigned NOT NULL DEFAULT '0',
  `regunit` varchar(15) NOT NULL DEFAULT '',
  `size` varchar(100) NOT NULL DEFAULT '',
  `regyear` varchar(4) NOT NULL DEFAULT '',
  `regcity` varchar(30) NOT NULL DEFAULT '',
  `sell` varchar(255) NOT NULL DEFAULT '',
  `buy` varchar(255) NOT NULL DEFAULT '',
  `business` varchar(255) NOT NULL DEFAULT '',
  `telephone` varchar(50) NOT NULL DEFAULT '',
  `fax` varchar(50) NOT NULL DEFAULT '',
  `mail` varchar(50) NOT NULL DEFAULT '',
  `address` varchar(255) NOT NULL DEFAULT '',
  `postcode` varchar(20) NOT NULL DEFAULT '',
  `homepage` varchar(255) NOT NULL DEFAULT '',
  `fromtime` int(10) unsigned NOT NULL DEFAULT '0',
  `totime` int(10) unsigned NOT NULL DEFAULT '0',
  `styletime` int(10) unsigned NOT NULL DEFAULT '0',
  `thumb` varchar(255) NOT NULL DEFAULT '',
  `introduce` varchar(255) NOT NULL DEFAULT '',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `keyword` varchar(255) NOT NULL DEFAULT '',
  `template` varchar(30) NOT NULL DEFAULT '',
  `skin` varchar(30) NOT NULL DEFAULT '',
  `domain` varchar(100) NOT NULL DEFAULT '',
  `icp` varchar(100) NOT NULL DEFAULT '',
  `linkurl` varchar(255) NOT NULL DEFAULT '',
  `companyid` int(10) DEFAULT NULL,
  `letter` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`userid`),
  KEY `domain` (`domain`),
  KEY `vip` (`vip`),
  KEY `areaid` (`areaid`),
  KEY `groupid` (`groupid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='公司';

INSERT INTO `aijiacms_company` VALUES('1','admin','1','房产网站','0','0','','0','0','0','0','企业单位','','','1','','0','人民币','','','','','','','','','','','','','0','0','0','','','10','房产网站山东','','','','','http://yiti.15115.cn/com/admin/','0','fcwz');
INSERT INTO `aijiacms_company` VALUES('3','waiwaili','5','乞丐','0','0','','0','0','0','0','','','','1','','0','','','','','','','','','','','','','','0','0','0','','','0','乞丐山东','','','','','http://yiti.15115.cn/com/waiwaili/','','q');

DROP TABLE IF EXISTS `aijiacms_company_catid`;
CREATE TABLE `aijiacms_company_catid` (
  `userid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `areaid` int(10) unsigned NOT NULL DEFAULT '0',
  `groupid` smallint(4) unsigned NOT NULL DEFAULT '0',
  `vip` smallint(2) unsigned NOT NULL DEFAULT '0',
  KEY `userid` (`userid`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='公司分类';


DROP TABLE IF EXISTS `aijiacms_company_data`;
CREATE TABLE `aijiacms_company_data` (
  `userid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `content` text NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='公司内容';

INSERT INTO `aijiacms_company_data` VALUES('1','');
INSERT INTO `aijiacms_company_data` VALUES('3','');

DROP TABLE IF EXISTS `aijiacms_company_setting`;
CREATE TABLE `aijiacms_company_setting` (
  `userid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `item_key` varchar(100) NOT NULL DEFAULT '',
  `item_value` text NOT NULL,
  KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='公司设置';

INSERT INTO `aijiacms_company_setting` VALUES('3','video','');
INSERT INTO `aijiacms_company_setting` VALUES('3','banner5','');
INSERT INTO `aijiacms_company_setting` VALUES('3','banner4','');
INSERT INTO `aijiacms_company_setting` VALUES('3','banner3','');
INSERT INTO `aijiacms_company_setting` VALUES('3','banner2','');
INSERT INTO `aijiacms_company_setting` VALUES('3','banner1','');
INSERT INTO `aijiacms_company_setting` VALUES('3','bannerf','');
INSERT INTO `aijiacms_company_setting` VALUES('3','bannerh','200');
INSERT INTO `aijiacms_company_setting` VALUES('3','banner','');
INSERT INTO `aijiacms_company_setting` VALUES('3','bannerw','960');
INSERT INTO `aijiacms_company_setting` VALUES('3','bannert','0');
INSERT INTO `aijiacms_company_setting` VALUES('3','logo','');
INSERT INTO `aijiacms_company_setting` VALUES('3','intro_length','1000');
INSERT INTO `aijiacms_company_setting` VALUES('3','bgcolor','');
INSERT INTO `aijiacms_company_setting` VALUES('3','background','');
INSERT INTO `aijiacms_company_setting` VALUES('3','menu_show','0,1,1,1,1,0,0,1,0,0,0,1,1,1');
INSERT INTO `aijiacms_company_setting` VALUES('3','menu_order','0,10,20,30,40,50,60,70,80,90,100,110,120,130');
INSERT INTO `aijiacms_company_setting` VALUES('3','menu_name','新房,二手房,出租,经纪人,新闻中心,荣誉资质,人才招聘,联系方式,公司相册,户型,楼盘视频,友情链接,诚信档案,公司介绍');
INSERT INTO `aijiacms_company_setting` VALUES('3','side_pos','0');
INSERT INTO `aijiacms_company_setting` VALUES('3','show_stats','1');
INSERT INTO `aijiacms_company_setting` VALUES('3','side_width','200');
INSERT INTO `aijiacms_company_setting` VALUES('3','side_file','announce,news,type,contact,search,honor,link');
INSERT INTO `aijiacms_company_setting` VALUES('3','side_name','网站公告,新闻中心,售房分类,联系方式,站内搜索,荣誉资质,友情链接');
INSERT INTO `aijiacms_company_setting` VALUES('3','side_num','1,5,10,1,1,5,5');
INSERT INTO `aijiacms_company_setting` VALUES('3','side_order','0,10,20,30,40,50,60');
INSERT INTO `aijiacms_company_setting` VALUES('3','side_show','1,1,1,0,1,0,1');
INSERT INTO `aijiacms_company_setting` VALUES('3','menu_num','1,16,30,30,10,30,1,12,12,12,12,30,12,1');
INSERT INTO `aijiacms_company_setting` VALUES('3','menu_file','newhouse,sale,rent,agency,news,honor,job,contact,photo,info,video,link,credit,homepage');
INSERT INTO `aijiacms_company_setting` VALUES('3','main_show','1,0,1,0,1,0,0,1');
INSERT INTO `aijiacms_company_setting` VALUES('3','main_order','0,10,20,30,40,50,60,70');
INSERT INTO `aijiacms_company_setting` VALUES('3','main_name','推荐房源,新房,二手房,租房,经纪人,户型,公司相册,楼盘视频');
INSERT INTO `aijiacms_company_setting` VALUES('3','main_num','10,1,10,5,3,4,4,5');
INSERT INTO `aijiacms_company_setting` VALUES('3','main_file','elite,newhouse,sale,rent,agency,info,photo,video');
INSERT INTO `aijiacms_company_setting` VALUES('3','css','');
INSERT INTO `aijiacms_company_setting` VALUES('3','seo_title','');
INSERT INTO `aijiacms_company_setting` VALUES('3','seo_keywords','');
INSERT INTO `aijiacms_company_setting` VALUES('3','seo_description','');
INSERT INTO `aijiacms_company_setting` VALUES('3','stats','');
INSERT INTO `aijiacms_company_setting` VALUES('3','kf','');
INSERT INTO `aijiacms_company_setting` VALUES('3','announce','');
INSERT INTO `aijiacms_company_setting` VALUES('1','bgcolor','');
INSERT INTO `aijiacms_company_setting` VALUES('1','background','');
INSERT INTO `aijiacms_company_setting` VALUES('1','logo','');
INSERT INTO `aijiacms_company_setting` VALUES('1','css','');
INSERT INTO `aijiacms_company_setting` VALUES('1','bannerw','960');
INSERT INTO `aijiacms_company_setting` VALUES('1','bannerh','200');
INSERT INTO `aijiacms_company_setting` VALUES('1','bannert','0');
INSERT INTO `aijiacms_company_setting` VALUES('1','banner','');
INSERT INTO `aijiacms_company_setting` VALUES('1','bannerf','');
INSERT INTO `aijiacms_company_setting` VALUES('1','banner1','');
INSERT INTO `aijiacms_company_setting` VALUES('1','banner2','');
INSERT INTO `aijiacms_company_setting` VALUES('1','banner3','');
INSERT INTO `aijiacms_company_setting` VALUES('1','banner4','');
INSERT INTO `aijiacms_company_setting` VALUES('1','banner5','');
INSERT INTO `aijiacms_company_setting` VALUES('1','video','');
INSERT INTO `aijiacms_company_setting` VALUES('1','show_stats','1');
INSERT INTO `aijiacms_company_setting` VALUES('1','menu_show','1,1,1,1,0,0,0,0,0,0,0,0,0,0');
INSERT INTO `aijiacms_company_setting` VALUES('1','menu_order','0,10,20,30,40,50,60,70,80,90,100,110,120,130');
INSERT INTO `aijiacms_company_setting` VALUES('1','menu_name','新房,二手房,出租,经纪人,新闻中心,荣誉资质,人才招聘,联系方式,公司相册,楼盘视频,友情链接,诚信档案,公司介绍,');
INSERT INTO `aijiacms_company_setting` VALUES('1','menu_num','1,16,30,30,10,30,1,12,12,12,12,30,12,1');
INSERT INTO `aijiacms_company_setting` VALUES('1','menu_file','newhouse,sale,rent,agency,news,honor,job,contact,photo,video,link,credit,introduce,homepage');
INSERT INTO `aijiacms_company_setting` VALUES('1','side_width','200');
INSERT INTO `aijiacms_company_setting` VALUES('1','side_pos','0');
INSERT INTO `aijiacms_company_setting` VALUES('1','side_show','1,0,0,1,0,0,1');
INSERT INTO `aijiacms_company_setting` VALUES('1','side_order','0,10,20,30,40,50,60');
INSERT INTO `aijiacms_company_setting` VALUES('1','side_name','网站公告,新闻中心,售房分类,联系方式,站内搜索,荣誉资质,友情链接');
INSERT INTO `aijiacms_company_setting` VALUES('1','side_num','1,5,10,1,1,5,5');
INSERT INTO `aijiacms_company_setting` VALUES('1','side_file','announce,news,type,contact,search,honor,link');
INSERT INTO `aijiacms_company_setting` VALUES('1','main_show','0,1,0,0,0,1,0,0');
INSERT INTO `aijiacms_company_setting` VALUES('1','main_order','0,10,20,30,40,50,60,70');
INSERT INTO `aijiacms_company_setting` VALUES('1','main_name','推荐房源,新房,二手房,租房,经纪人,公司相册,楼盘视频,公司介绍');
INSERT INTO `aijiacms_company_setting` VALUES('1','main_num','10,1,10,5,3,4,4,5');
INSERT INTO `aijiacms_company_setting` VALUES('1','main_file','elite,newhouse,sale,rent,agency,photo,video,introduce');
INSERT INTO `aijiacms_company_setting` VALUES('1','intro_length','1000');
INSERT INTO `aijiacms_company_setting` VALUES('1','seo_title','');
INSERT INTO `aijiacms_company_setting` VALUES('1','seo_keywords','');
INSERT INTO `aijiacms_company_setting` VALUES('1','seo_description','');
INSERT INTO `aijiacms_company_setting` VALUES('1','stats','');
INSERT INTO `aijiacms_company_setting` VALUES('1','kf','');
INSERT INTO `aijiacms_company_setting` VALUES('1','announce','');

DROP TABLE IF EXISTS `aijiacms_favorite`;
CREATE TABLE `aijiacms_favorite` (
  `itemid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `listorder` smallint(4) unsigned NOT NULL DEFAULT '0',
  `userid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `typeid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `style` varchar(50) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `note` varchar(255) NOT NULL DEFAULT '',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`itemid`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商机收藏';


DROP TABLE IF EXISTS `aijiacms_fenxiao`;
CREATE TABLE `aijiacms_fenxiao` (
  `itemid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `listorder` smallint(4) unsigned NOT NULL DEFAULT '0',
  `userid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `typeid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `username` varchar(30) NOT NULL DEFAULT '',
  `truename` varchar(20) NOT NULL DEFAULT '',
  `style` varchar(50) NOT NULL DEFAULT '',
  `company` varchar(100) NOT NULL DEFAULT '',
  `career` varchar(20) NOT NULL DEFAULT '',
  `telephone` varchar(20) NOT NULL DEFAULT '',
  `mobile` varchar(20) NOT NULL DEFAULT '',
  `homepage` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `msn` varchar(50) NOT NULL DEFAULT '',
  `qq` varchar(20) NOT NULL DEFAULT '',
  `ali` varchar(30) NOT NULL DEFAULT '',
  `skype` varchar(30) NOT NULL DEFAULT '',
  `note` varchar(255) NOT NULL DEFAULT '',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `yxjg` varchar(255) NOT NULL,
  `areaid` varchar(20) NOT NULL,
  `house` varchar(100) NOT NULL,
  `hname` varchar(200) NOT NULL,
  `house2` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `tuijian` varchar(50) DEFAULT NULL,
  `cprice` varchar(20) DEFAULT NULL,
  `cmoney` varchar(20) DEFAULT NULL,
  `shouse` varchar(20) DEFAULT NULL,
  `edittime` int(10) DEFAULT NULL,
  `editor` varchar(30) NOT NULL,
  `snote` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `message` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`itemid`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='分销客户';


DROP TABLE IF EXISTS `aijiacms_fetch`;
CREATE TABLE `aijiacms_fetch` (
  `itemid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sitename` varchar(100) NOT NULL DEFAULT '',
  `domain` varchar(255) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `encode` varchar(30) NOT NULL DEFAULT '',
  `editor` varchar(30) NOT NULL DEFAULT '',
  `edittime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='单页采集';


DROP TABLE IF EXISTS `aijiacms_fields`;
CREATE TABLE `aijiacms_fields` (
  `itemid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tb` varchar(30) NOT NULL DEFAULT '',
  `name` varchar(50) NOT NULL DEFAULT '',
  `title` varchar(100) NOT NULL DEFAULT '',
  `note` varchar(255) NOT NULL DEFAULT '',
  `type` varchar(20) NOT NULL DEFAULT '',
  `length` smallint(4) unsigned NOT NULL DEFAULT '0',
  `html` varchar(30) NOT NULL DEFAULT '',
  `default_value` text NOT NULL,
  `option_value` text NOT NULL,
  `width` smallint(4) unsigned NOT NULL DEFAULT '0',
  `height` smallint(4) unsigned NOT NULL DEFAULT '0',
  `input_limit` varchar(255) NOT NULL DEFAULT '',
  `addition` varchar(255) NOT NULL DEFAULT '',
  `display` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `front` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `listorder` smallint(4) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`itemid`),
  KEY `tablename` (`tb`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COMMENT='自定义字段';

INSERT INTO `aijiacms_fields` VALUES('4','newhouse_6','buildtype','建筑类型','','varchar','255','checkbox','','1|多层*\r\n2|小高*\r\n3|高层*\r\n4|别墅*\r\n','120','90','','','1','1','0');
INSERT INTO `aijiacms_fields` VALUES('5','sale_5','peitao','配套设施','','varchar','255','checkbox','','水|水*\r\n电|电*\r\n天然气|天然气*\r\n供暖|供暖*\r\n空调|空调*\r\n有线电视|有线电视*\r\n宽带|宽带*\r\n电梯|电梯*\r\n车位|车位*\r\n储藏室|储藏室*\r\n','120','90','','','1','1','0');
INSERT INTO `aijiacms_fields` VALUES('6','sale_5','fyts','房源特色','','varchar','255','checkbox','         ','学区房|学区房*\r\n婚房|婚房*\r\n小户型|小户型*\r\n采光好|采光好*\r\n包物业费|包物业费*\r\n适合居住|适合居住*\r\n适合商住|适合商住*\r\n商场周边|商场周边*\r\n交通便利|交通便利*\r\n','120','90','','','1','1','0');
INSERT INTO `aijiacms_fields` VALUES('9','newhouse_6','kfs','开发商','','varchar','255','text','','','120','90','','size=\"30\"','1','1','0');
INSERT INTO `aijiacms_fields` VALUES('10','newhouse_6','fitment','装修','','varchar','255','checkbox','毛坯','1|毛坯*\r\n2|简装修*\r\n3|精装修*\r\n','120','90','','size=\"30\"','1','1','0');
INSERT INTO `aijiacms_fields` VALUES('18','sale_5','fix','装修','','varchar','255','checkbox','','1|毛坯*\r\n2|精装*\r\n3|简装*\r\n4|豪华装修*\r\n','120','90','','','1','1','0');
INSERT INTO `aijiacms_fields` VALUES('12','rent_7','zhuanxiu','装修','','varchar','255','checkbox','','1|毛坯*\r\n2|精装*\r\n3|简装*\r\n4|豪华装修*\r\n','120','90','','','1','1','0');
INSERT INTO `aijiacms_fields` VALUES('13','sale_5','toward','朝向','','varchar','255','radio','','1|东*\r\n2|南*\r\n3|西*\r\n4|北*\r\n5|东南*\r\n6|西南*\r\n7|东南*\r\n8|东北*\r\n9|西北*\r\n10|南北*\r\n11|东西*','120','90','','','1','1','0');
INSERT INTO `aijiacms_fields` VALUES('14','newhouse_6','bbsurl','相关论坛','','varchar','255','text','','','120','90','','size=\"30\"','1','1','0');
INSERT INTO `aijiacms_fields` VALUES('15','rent_7','toward','朝向','','varchar','255','radio','','1|东*\r\n2|南*\r\n3|西*\r\n4|北*\r\n5|东南*\r\n6|西南*\r\n7|东南*\r\n8|东北*\r\n9|西北*\r\n10|南北*\r\n11|东西*','120','90','','','1','1','0');
INSERT INTO `aijiacms_fields` VALUES('16','newhouse_6','lpts','楼盘特色','','varchar','255','checkbox','','2|小户型*\r\n3|公园地产*\r\n4|学区房*\r\n5|旅游地产*\r\n6|投资地产*\r\n7|海景地产*\r\n8|经济住宅*\r\n9|宜居生态地产','120','90','','','1','1','0');
INSERT INTO `aijiacms_fields` VALUES('17','newhouse_6','range','价格区间','','varchar','80','select','','1|4000以下*\r\n2|4000-5000元 *\r\n3|5000-6000元 *\r\n4|6000-8000元 *\r\n5|8000-10000元 *\r\n7|10000元以上*\r\n','120','90','','','0','0','0');
INSERT INTO `aijiacms_fields` VALUES('19','sale_5','range','价格区间','','varchar','255','select','','1|30万以下*\r\n2|30-40万*\r\n3|40-50万*\r\n4|50-60万*\r\n5|60-80万*\r\n6|80-100万*\r\n7|100-150万*\r\n8|150-200万*\r\n9|200万以上* ','120','90','','','0','0','0');
INSERT INTO `aijiacms_fields` VALUES('20','rent_7','range','价格区间','','varchar','255','select','','1|500元以下*\r\n2|600-700元*\r\n3|700-800元*\r\n4|800-1000元*\r\n5|1000-1200元*\r\n6|1200-1500元*\r\n7|1500-2000元*\r\n8|2000元以上*','0','0','','','0','0','0');
INSERT INTO `aijiacms_fields` VALUES('21','rent_7','peitaor','配套设施','','varchar','255','checkbox','水|水*\r\n电|电*\r\n天然气|天然气*\r\n供暖|供暖*\r\n空调|空调*\r\n有线电视|有线电视*\r\n宽带|宽带*\r\n电梯|电梯*\r\n车位|车位*\r\n储藏室|储藏室*','水|水*\r\n电|电*\r\n天然气|天然气*\r\n供暖|供暖*\r\n空调|空调*\r\n有线电视|有线电视*\r\n宽带|宽带*\r\n电梯|电梯*\r\n车位|车位*\r\n储藏室|储藏室*','120','90','','size=\"30\"','1','1','0');
INSERT INTO `aijiacms_fields` VALUES('22','rent_7','fytsr','房源特色','','varchar','255','checkbox','','学区房|学区房*\r\n婚房|婚房*\r\n小户型|小户型*\r\n采光好|采光好*\r\n包物业费|包物业费*\r\n适合居住|适合居住*\r\n适合商住|适合商住*\r\n商场周边|商场周边*\r\n交通便利|交通便利*','120','90','','','1','1','0');

DROP TABLE IF EXISTS `aijiacms_finance_amount`;
CREATE TABLE `aijiacms_finance_amount` (
  `itemid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL DEFAULT '',
  `kehu` varchar(30) NOT NULL DEFAULT '',
  `amount` decimal(10,0) NOT NULL DEFAULT '0',
  `balance` decimal(10,2) NOT NULL DEFAULT '0.00',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(2) NOT NULL DEFAULT '0',
  `note` varchar(255) NOT NULL DEFAULT '',
  `editor` varchar(30) NOT NULL DEFAULT '',
  `admintime` int(10) NOT NULL,
  `admin` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`itemid`),
  KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='佣金结算';


DROP TABLE IF EXISTS `aijiacms_finance_card`;
CREATE TABLE `aijiacms_finance_card` (
  `itemid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(30) NOT NULL DEFAULT '',
  `amount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `editor` varchar(30) NOT NULL DEFAULT '',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `totime` int(10) unsigned NOT NULL DEFAULT '0',
  `username` varchar(30) NOT NULL DEFAULT '',
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
  `ip` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`itemid`),
  UNIQUE KEY `number` (`number`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='充值卡';


DROP TABLE IF EXISTS `aijiacms_finance_cash`;
CREATE TABLE `aijiacms_finance_cash` (
  `itemid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL DEFAULT '',
  `bank` varchar(50) NOT NULL DEFAULT '',
  `account` varchar(30) NOT NULL DEFAULT '',
  `truename` varchar(30) NOT NULL DEFAULT '',
  `amount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `fee` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `ip` varchar(50) NOT NULL DEFAULT '',
  `editor` varchar(30) NOT NULL DEFAULT '',
  `edittime` int(10) unsigned NOT NULL DEFAULT '0',
  `note` varchar(255) NOT NULL DEFAULT '',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`itemid`),
  KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='申请提现';


DROP TABLE IF EXISTS `aijiacms_finance_charge`;
CREATE TABLE `aijiacms_finance_charge` (
  `itemid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL DEFAULT '',
  `bank` varchar(20) NOT NULL DEFAULT '',
  `amount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `fee` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `money` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `sendtime` int(10) unsigned NOT NULL DEFAULT '0',
  `receivetime` int(10) unsigned NOT NULL DEFAULT '0',
  `editor` varchar(30) NOT NULL DEFAULT '',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `note` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`itemid`),
  KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='在线充值';


DROP TABLE IF EXISTS `aijiacms_finance_credit`;
CREATE TABLE `aijiacms_finance_credit` (
  `itemid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL DEFAULT '',
  `amount` int(10) NOT NULL DEFAULT '0',
  `balance` int(10) NOT NULL DEFAULT '0',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `reason` varchar(255) NOT NULL DEFAULT '',
  `note` varchar(255) NOT NULL DEFAULT '',
  `editor` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`itemid`),
  KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COMMENT='积分流水';

INSERT INTO `aijiacms_finance_credit` VALUES('1','admin','1','1','1436102857','登录奖励','127.0.0.1','system');
INSERT INTO `aijiacms_finance_credit` VALUES('2','admin','1','2','1440768951','登录奖励','127.0.0.1','system');
INSERT INTO `aijiacms_finance_credit` VALUES('3','admin','2','4','1440769803','新房发布','ID:1','system');
INSERT INTO `aijiacms_finance_credit` VALUES('4','admin','-5','-1','1440775688','新房删除','ID:1','system');
INSERT INTO `aijiacms_finance_credit` VALUES('5','waiwaili','20','20','1442223973','注册奖励','127.0.0.1','system');
INSERT INTO `aijiacms_finance_credit` VALUES('6','admin','1','0','1442224022','登录奖励','127.0.0.1','system');
INSERT INTO `aijiacms_finance_credit` VALUES('7','admin','1','1','1442299669','登录奖励','127.0.0.1','system');
INSERT INTO `aijiacms_finance_credit` VALUES('8','歪歪分享论坛','2','0','1442330402','新房发布','ID:2','system');
INSERT INTO `aijiacms_finance_credit` VALUES('9','admin','2','3','1442331731','图库发布','ID:1','system');
INSERT INTO `aijiacms_finance_credit` VALUES('10','admin','2','5','1442331953','图库发布','ID:2','system');
INSERT INTO `aijiacms_finance_credit` VALUES('11','admin','2','7','1442334829','图库发布','ID:3','system');
INSERT INTO `aijiacms_finance_credit` VALUES('12','admin','2','9','1442334981','图库发布','ID:4','system');
INSERT INTO `aijiacms_finance_credit` VALUES('13','admin','2','11','1442335421','图库发布','ID:5','system');
INSERT INTO `aijiacms_finance_credit` VALUES('14','admin','2','13','1442335582','图库发布','ID:6','system');
INSERT INTO `aijiacms_finance_credit` VALUES('15','admin','2','15','1442337098','图库发布','ID:7','system');
INSERT INTO `aijiacms_finance_credit` VALUES('16','admin','2','17','1442376636','新房发布','ID:4','system');
INSERT INTO `aijiacms_finance_credit` VALUES('17','admin','2','19','1442382329','新房发布','ID:5','system');
INSERT INTO `aijiacms_finance_credit` VALUES('18','admin','2','21','1442382476','新房发布','ID:6','system');
INSERT INTO `aijiacms_finance_credit` VALUES('19','admin','2','23','1442382654','新房发布','ID:7','system');
INSERT INTO `aijiacms_finance_credit` VALUES('20','admin','2','25','1442382847','新房发布','ID:8','system');
INSERT INTO `aijiacms_finance_credit` VALUES('21','waiwaili','1','21','1442383165','登录奖励','127.0.0.1','system');
INSERT INTO `aijiacms_finance_credit` VALUES('22','admin','1','26','1442383313','登录奖励','127.0.0.1','system');
INSERT INTO `aijiacms_finance_credit` VALUES('23','waiwaili','2','23','1442383839','评论发布','ID:1','system');
INSERT INTO `aijiacms_finance_credit` VALUES('24','waiwaili','2','25','1442383971','评论发布','ID:2','system');
INSERT INTO `aijiacms_finance_credit` VALUES('25','waiwaili','2','27','1442384009','评论发布','ID:3','system');
INSERT INTO `aijiacms_finance_credit` VALUES('26','admin','2','28','1442385035','二手房发布','ID:1','system');
INSERT INTO `aijiacms_finance_credit` VALUES('27','admin','2','30','1442386905','二手房发布','ID:2','system');
INSERT INTO `aijiacms_finance_credit` VALUES('28','admin','2','32','1442387062','二手房发布','ID:3','system');
INSERT INTO `aijiacms_finance_credit` VALUES('29','admin','2','34','1442387725','二手房发布','ID:4','system');
INSERT INTO `aijiacms_finance_credit` VALUES('30','admin','2','36','1442387829','二手房发布','ID:5','system');
INSERT INTO `aijiacms_finance_credit` VALUES('31','admin','2','38','1442387866','二手房发布','ID:6','system');
INSERT INTO `aijiacms_finance_credit` VALUES('32','admin','2','40','1442410951','家装发布','ID:1','system');
INSERT INTO `aijiacms_finance_credit` VALUES('33','admin','2','42','1442411090','家装发布','ID:2','system');
INSERT INTO `aijiacms_finance_credit` VALUES('34','admin','-5','37','1442413668','图库删除','ID:7','system');
INSERT INTO `aijiacms_finance_credit` VALUES('35','admin','1','38','1443195069','登录奖励','127.0.0.1','system');
INSERT INTO `aijiacms_finance_credit` VALUES('36','admin','1','39','1446800152','登录奖励','120.195.42.31','system');
INSERT INTO `aijiacms_finance_credit` VALUES('37','waiwaili','1','28','1446800378','登录奖励','120.195.42.31','system');
INSERT INTO `aijiacms_finance_credit` VALUES('38','admin','1','40','1446968364','登录奖励','120.195.42.14','system');
INSERT INTO `aijiacms_finance_credit` VALUES('39','waiwaili','1','29','1447062475','登录奖励','120.195.42.24','system');
INSERT INTO `aijiacms_finance_credit` VALUES('40','admin','1','41','1447062490','登录奖励','120.195.42.24','system');
INSERT INTO `aijiacms_finance_credit` VALUES('41','admin','2','43','1447063012','图库发布','ID:8','system');
INSERT INTO `aijiacms_finance_credit` VALUES('42','admin','1','44','1447220597','登录奖励','120.195.42.40','system');
INSERT INTO `aijiacms_finance_credit` VALUES('43','admin','1','45','1447323201','登录奖励','223.245.110.158','system');
INSERT INTO `aijiacms_finance_credit` VALUES('44','admin','2','47','1447323355','二手房发布','ID:7','system');

DROP TABLE IF EXISTS `aijiacms_finance_pay`;
CREATE TABLE `aijiacms_finance_pay` (
  `pid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL DEFAULT '',
  `fee` float unsigned NOT NULL DEFAULT '0',
  `currency` varchar(20) NOT NULL DEFAULT '',
  `paytime` int(10) unsigned NOT NULL DEFAULT '0',
  `ip` varchar(50) NOT NULL DEFAULT '',
  `moduleid` smallint(6) NOT NULL DEFAULT '0',
  `itemid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`pid`),
  KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='支付记录';


DROP TABLE IF EXISTS `aijiacms_finance_promo`;
CREATE TABLE `aijiacms_finance_promo` (
  `itemid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(30) NOT NULL DEFAULT '',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `amount` float NOT NULL DEFAULT '0',
  `reuse` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `editor` varchar(30) NOT NULL DEFAULT '',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `totime` int(10) unsigned NOT NULL DEFAULT '0',
  `username` varchar(30) NOT NULL DEFAULT '',
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
  `ip` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`itemid`),
  UNIQUE KEY `number` (`number`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='优惠码';


DROP TABLE IF EXISTS `aijiacms_finance_record`;
CREATE TABLE `aijiacms_finance_record` (
  `itemid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL DEFAULT '',
  `bank` varchar(30) NOT NULL DEFAULT '',
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `balance` decimal(10,2) NOT NULL DEFAULT '0.00',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `reason` varchar(255) NOT NULL DEFAULT '',
  `note` varchar(255) NOT NULL DEFAULT '',
  `editor` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`itemid`),
  KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='财务流水';


DROP TABLE IF EXISTS `aijiacms_finance_sms`;
CREATE TABLE `aijiacms_finance_sms` (
  `itemid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL DEFAULT '',
  `amount` int(10) NOT NULL DEFAULT '0',
  `balance` int(10) NOT NULL DEFAULT '0',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `reason` varchar(255) NOT NULL DEFAULT '',
  `note` varchar(255) NOT NULL DEFAULT '',
  `editor` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`itemid`),
  KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='短信增减';


DROP TABLE IF EXISTS `aijiacms_friend`;
CREATE TABLE `aijiacms_friend` (
  `itemid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `listorder` smallint(4) unsigned NOT NULL DEFAULT '0',
  `userid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `typeid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `username` varchar(30) NOT NULL DEFAULT '',
  `truename` varchar(20) NOT NULL DEFAULT '',
  `style` varchar(50) NOT NULL DEFAULT '',
  `company` varchar(100) NOT NULL DEFAULT '',
  `career` varchar(20) NOT NULL DEFAULT '',
  `telephone` varchar(20) NOT NULL DEFAULT '',
  `mobile` varchar(20) NOT NULL DEFAULT '',
  `homepage` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `msn` varchar(50) NOT NULL DEFAULT '',
  `qq` varchar(20) NOT NULL DEFAULT '',
  `ali` varchar(30) NOT NULL DEFAULT '',
  `skype` varchar(30) NOT NULL DEFAULT '',
  `note` varchar(255) NOT NULL DEFAULT '',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`itemid`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='我的房友';


DROP TABLE IF EXISTS `aijiacms_gift`;
CREATE TABLE `aijiacms_gift` (
  `itemid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `typeid` int(10) unsigned NOT NULL DEFAULT '0',
  `areaid` int(10) unsigned NOT NULL DEFAULT '0',
  `level` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `style` varchar(50) NOT NULL DEFAULT '',
  `thumb` varchar(255) NOT NULL DEFAULT '',
  `credit` int(10) unsigned NOT NULL DEFAULT '0',
  `amount` int(10) unsigned NOT NULL DEFAULT '0',
  `groupid` varchar(255) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `orders` int(10) unsigned NOT NULL DEFAULT '0',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `fromtime` int(10) unsigned NOT NULL DEFAULT '0',
  `totime` int(10) unsigned NOT NULL DEFAULT '0',
  `editor` varchar(30) NOT NULL DEFAULT '',
  `edittime` int(10) unsigned NOT NULL DEFAULT '0',
  `linkurl` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='积分换礼';


DROP TABLE IF EXISTS `aijiacms_gift_order`;
CREATE TABLE `aijiacms_gift_order` (
  `oid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `itemid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `credit` int(10) unsigned NOT NULL DEFAULT '0',
  `username` varchar(30) NOT NULL DEFAULT '',
  `ip` varchar(50) NOT NULL DEFAULT '',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `status` varchar(255) NOT NULL DEFAULT '',
  `note` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`oid`),
  KEY `itemid` (`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='积分换礼订单';


DROP TABLE IF EXISTS `aijiacms_group`;
CREATE TABLE `aijiacms_group` (
  `itemid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `areaid` int(10) unsigned NOT NULL DEFAULT '0',
  `level` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `style` varchar(50) NOT NULL DEFAULT '',
  `fee` float NOT NULL DEFAULT '0',
  `introduce` varchar(255) NOT NULL DEFAULT '',
  `price` varchar(10) NOT NULL DEFAULT '0',
  `marketprice` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `savemoney` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `discount` float unsigned NOT NULL DEFAULT '0',
  `minamount` int(10) unsigned NOT NULL DEFAULT '0',
  `amount` int(10) unsigned NOT NULL DEFAULT '0',
  `logistic` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `tag` varchar(100) NOT NULL DEFAULT '',
  `keyword` varchar(255) NOT NULL DEFAULT '',
  `pptword` varchar(255) NOT NULL DEFAULT '',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `orders` int(10) unsigned NOT NULL DEFAULT '0',
  `sales` int(10) unsigned NOT NULL DEFAULT '0',
  `thumb` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(30) NOT NULL DEFAULT '',
  `groupid` smallint(4) unsigned NOT NULL DEFAULT '0',
  `company` varchar(100) NOT NULL DEFAULT '',
  `vip` smallint(2) unsigned NOT NULL DEFAULT '0',
  `validated` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `truename` varchar(30) NOT NULL DEFAULT '',
  `telephone` varchar(50) NOT NULL DEFAULT '',
  `mobile` varchar(50) NOT NULL DEFAULT '',
  `address` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `msn` varchar(50) NOT NULL DEFAULT '',
  `qq` varchar(20) NOT NULL DEFAULT '',
  `ali` varchar(30) NOT NULL DEFAULT '',
  `skype` varchar(30) NOT NULL DEFAULT '',
  `totime` int(10) unsigned NOT NULL DEFAULT '0',
  `endtime` int(10) unsigned NOT NULL DEFAULT '0',
  `editor` varchar(30) NOT NULL DEFAULT '',
  `edittime` int(10) unsigned NOT NULL DEFAULT '0',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `ip` varchar(50) NOT NULL DEFAULT '',
  `template` varchar(30) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `process` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `linkurl` varchar(255) NOT NULL DEFAULT '',
  `filepath` varchar(255) NOT NULL DEFAULT '',
  `note` varchar(255) NOT NULL DEFAULT '',
  `houseid` int(10) NOT NULL DEFAULT '0',
  `housename` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`itemid`),
  KEY `username` (`username`),
  KEY `addtime` (`addtime`),
  KEY `catid` (`catid`),
  KEY `areaid` (`areaid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='团购';


DROP TABLE IF EXISTS `aijiacms_group_data`;
CREATE TABLE `aijiacms_group_data` (
  `itemid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `content` mediumtext NOT NULL,
  PRIMARY KEY (`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='团购内容';


DROP TABLE IF EXISTS `aijiacms_group_order`;
CREATE TABLE `aijiacms_group_order` (
  `itemid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `gid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `buyer` varchar(30) NOT NULL DEFAULT '',
  `seller` varchar(30) NOT NULL DEFAULT '',
  `title` varchar(100) NOT NULL DEFAULT '',
  `thumb` varchar(255) NOT NULL DEFAULT '',
  `price` varchar(10) NOT NULL DEFAULT '0',
  `number` int(10) unsigned NOT NULL DEFAULT '0',
  `amount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `logistic` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `password` varchar(6) NOT NULL DEFAULT '',
  `buyer_name` varchar(30) NOT NULL DEFAULT '',
  `buyer_address` varchar(255) NOT NULL DEFAULT '',
  `buyer_postcode` varchar(10) NOT NULL DEFAULT '',
  `buyer_phone` varchar(30) NOT NULL DEFAULT '',
  `buyer_mobile` varchar(30) NOT NULL DEFAULT '',
  `buyer_receive` varchar(50) NOT NULL DEFAULT '',
  `send_type` varchar(50) NOT NULL DEFAULT '',
  `send_no` varchar(50) NOT NULL DEFAULT '',
  `send_time` varchar(20) NOT NULL DEFAULT '',
  `send_days` int(10) unsigned NOT NULL DEFAULT '0',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
  `editor` varchar(30) NOT NULL DEFAULT '',
  `note` varchar(255) NOT NULL DEFAULT '',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`itemid`),
  KEY `buyer` (`buyer`),
  KEY `seller` (`seller`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='团购订单';


DROP TABLE IF EXISTS `aijiacms_guestbook`;
CREATE TABLE `aijiacms_guestbook` (
  `itemid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `areaid` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `reply` text NOT NULL,
  `hidden` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `truename` varchar(30) NOT NULL DEFAULT '',
  `telephone` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `qq` varchar(30) NOT NULL DEFAULT '',
  `ali` varchar(30) NOT NULL DEFAULT '',
  `skype` varchar(30) NOT NULL DEFAULT '',
  `msn` varchar(50) NOT NULL DEFAULT '',
  `username` varchar(30) NOT NULL DEFAULT '',
  `ip` varchar(50) NOT NULL DEFAULT '',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `editor` varchar(30) NOT NULL DEFAULT '',
  `edittime` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `hids` int(10) NOT NULL,
  `lp` varchar(20) NOT NULL,
  PRIMARY KEY (`itemid`),
  KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='留言本';


DROP TABLE IF EXISTS `aijiacms_honor`;
CREATE TABLE `aijiacms_honor` (
  `itemid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '',
  `style` varchar(50) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `authority` varchar(100) NOT NULL DEFAULT '',
  `thumb` varchar(255) NOT NULL DEFAULT '',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `username` varchar(30) NOT NULL DEFAULT '',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `fromtime` int(10) unsigned NOT NULL DEFAULT '0',
  `totime` int(10) unsigned NOT NULL DEFAULT '0',
  `editor` varchar(30) NOT NULL DEFAULT '',
  `edittime` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `note` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`itemid`),
  KEY `username` (`username`),
  KEY `addtime` (`addtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='荣誉资质';


DROP TABLE IF EXISTS `aijiacms_house_pic`;
CREATE TABLE `aijiacms_house_pic` (
  `itemid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `item` bigint(20) unsigned NOT NULL DEFAULT '0',
  `introduce` text NOT NULL,
  `thumb` varchar(255) NOT NULL DEFAULT '',
  `mid` int(10) unsigned NOT NULL DEFAULT '0',
  `listorder` smallint(4) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`itemid`),
  KEY `listorder` (`listorder`),
  KEY `item` (`item`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COMMENT='房源图库';

INSERT INTO `aijiacms_house_pic` VALUES('1','1','','http://yiti.15115.cn/file/upload/201509/16/14-30-10-15-1.jpg','5','0');
INSERT INTO `aijiacms_house_pic` VALUES('2','1','','http://yiti.15115.cn/file/upload/201509/16/14-30-10-71-1.jpg','5','0');
INSERT INTO `aijiacms_house_pic` VALUES('3','1','','http://yiti.15115.cn/file/upload/201509/16/14-30-10-77-1.jpg','5','0');
INSERT INTO `aijiacms_house_pic` VALUES('4','1','','http://yiti.15115.cn/file/upload/201509/16/14-30-11-52-1.jpg','5','0');
INSERT INTO `aijiacms_house_pic` VALUES('5','2','','http://yiti.15115.cn/file/upload/201509/16/15-01-18-21-1.jpg','5','0');
INSERT INTO `aijiacms_house_pic` VALUES('6','2','','http://yiti.15115.cn/file/upload/201509/16/15-01-19-19-1.jpg','5','0');
INSERT INTO `aijiacms_house_pic` VALUES('7','2','','http://yiti.15115.cn/file/upload/201509/16/15-01-19-64-1.jpg','5','0');
INSERT INTO `aijiacms_house_pic` VALUES('8','3','','http://yiti.15115.cn/file/upload/201509/16/15-03-57-66-1.jpg','5','0');
INSERT INTO `aijiacms_house_pic` VALUES('9','3','','http://yiti.15115.cn/file/upload/201509/16/15-03-58-95-1.jpg','5','0');
INSERT INTO `aijiacms_house_pic` VALUES('10','3','','http://yiti.15115.cn/file/upload/201509/16/15-03-58-57-1.jpg','5','0');
INSERT INTO `aijiacms_house_pic` VALUES('11','3','','http://yiti.15115.cn/file/upload/201509/16/15-04-18-55-1.jpg','5','0');
INSERT INTO `aijiacms_house_pic` VALUES('12','4','','http://yiti.15115.cn/file/upload/201509/16/15-15-22-73-1.jpg','5','0');
INSERT INTO `aijiacms_house_pic` VALUES('13','4','','http://yiti.15115.cn/file/upload/201509/16/15-15-22-12-1.jpg','5','0');
INSERT INTO `aijiacms_house_pic` VALUES('14','4','','http://yiti.15115.cn/file/upload/201509/16/15-15-23-78-1.jpg','5','0');
INSERT INTO `aijiacms_house_pic` VALUES('15','5','','http://yiti.15115.cn/file/upload/201509/16/15-17-02-49-1.jpg','5','0');
INSERT INTO `aijiacms_house_pic` VALUES('16','5','','http://yiti.15115.cn/file/upload/201509/16/15-17-02-50-1.jpg','5','0');
INSERT INTO `aijiacms_house_pic` VALUES('17','5','','http://yiti.15115.cn/file/upload/201509/16/15-17-02-84-1.jpg','5','0');
INSERT INTO `aijiacms_house_pic` VALUES('18','6','','http://yiti.15115.cn/file/upload/201509/16/15-17-42-32-1.jpg','5','0');
INSERT INTO `aijiacms_house_pic` VALUES('19','6','','http://yiti.15115.cn/file/upload/201509/16/15-17-43-49-1.jpg','5','0');

DROP TABLE IF EXISTS `aijiacms_info_13`;
CREATE TABLE `aijiacms_info_13` (
  `itemid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `level` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `style` varchar(50) NOT NULL DEFAULT '',
  `fee` float NOT NULL DEFAULT '0',
  `keyword` varchar(255) NOT NULL DEFAULT '',
  `pptword` varchar(255) NOT NULL DEFAULT '',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `thumb` varchar(255) NOT NULL DEFAULT '',
  `thumb1` varchar(255) NOT NULL DEFAULT '',
  `thumb2` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(30) NOT NULL DEFAULT '',
  `groupid` smallint(4) unsigned NOT NULL DEFAULT '0',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `adddate` date NOT NULL DEFAULT '0000-00-00',
  `totime` int(10) unsigned NOT NULL DEFAULT '0',
  `areaid` int(10) unsigned NOT NULL DEFAULT '0',
  `company` varchar(100) NOT NULL DEFAULT '',
  `vip` smallint(2) unsigned NOT NULL DEFAULT '0',
  `validated` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `truename` varchar(30) NOT NULL DEFAULT '',
  `telephone` varchar(50) NOT NULL DEFAULT '',
  `fax` varchar(50) NOT NULL DEFAULT '',
  `mobile` varchar(50) NOT NULL DEFAULT '',
  `address` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `qq` varchar(20) NOT NULL DEFAULT '',
  `ali` varchar(30) NOT NULL DEFAULT '',
  `skype` varchar(30) NOT NULL DEFAULT '',
  `msn` varchar(50) NOT NULL DEFAULT '',
  `introduce` varchar(255) NOT NULL DEFAULT '',
  `n1` varchar(100) NOT NULL,
  `n2` varchar(100) NOT NULL,
  `n3` varchar(100) NOT NULL,
  `v1` varchar(100) NOT NULL,
  `v2` varchar(100) NOT NULL,
  `v3` varchar(100) NOT NULL,
  `editor` varchar(30) NOT NULL DEFAULT '',
  `edittime` int(10) unsigned NOT NULL DEFAULT '0',
  `editdate` date NOT NULL DEFAULT '0000-00-00',
  `ip` varchar(50) NOT NULL DEFAULT '',
  `template` varchar(30) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `listorder` smallint(4) unsigned NOT NULL DEFAULT '0',
  `islink` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `linkurl` varchar(255) NOT NULL DEFAULT '',
  `filepath` varchar(255) NOT NULL DEFAULT '',
  `note` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`itemid`),
  KEY `username` (`username`),
  KEY `edittime` (`edittime`),
  KEY `catid` (`catid`),
  KEY `areaid` (`areaid`),
  KEY `editdate` (`editdate`,`vip`,`edittime`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='装修';

INSERT INTO `aijiacms_info_13` VALUES('1','56','1','歪歪分享论坛装修招标测试','','0','歪歪分享论坛装修招标测试,装修招标山东','','0','http://yiti.15115.cn/file/upload/201509/16/21-42-07-69-1.jpg','http://yiti.15115.cn/file/upload/201509/16/21-42-18-19-1.jpg','http://yiti.15115.cn/file/upload/201509/16/21-42-27-96-1.jpg','admin','1','1442408942','2015-09-16','0','1','房产网站','0','0','爱家','','','','','','','','','admin@yourdomain.com','歪歪分享论坛装修招标测试歪歪分享论坛装修招标测试歪歪分享论坛装修招标测试歪歪分享论坛装修招标测试歪歪分享论坛装修招标测试歪歪分享论坛装修招标测试','','','','','','','admin','1442410951','2015-09-16','127.0.0.1','','3','0','0','show.php?itemid=1','','');
INSERT INTO `aijiacms_info_13` VALUES('2','57','1','歪歪分享论坛装修测试','','0','歪歪分享论坛装修测试,家装服务山东','','0','http://yiti.15115.cn/file/upload/201509/16/21-44-35-42-1.jpg','http://yiti.15115.cn/file/upload/201509/16/21-44-41-31-1.jpg','http://yiti.15115.cn/file/upload/201509/16/21-44-48-16-1.jpg','admin','1','1442411045','2015-09-16','0','1','房产网站','0','0','爱家','','','','','','','','','admin@yourdomain.com','海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月','','','','','','','admin','1442411090','2015-09-16','127.0.0.1','','3','0','0','show.php?itemid=2','','');

DROP TABLE IF EXISTS `aijiacms_info_data_13`;
CREATE TABLE `aijiacms_info_data_13` (
  `itemid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `content` mediumtext NOT NULL,
  PRIMARY KEY (`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='装修内容';

INSERT INTO `aijiacms_info_data_13` VALUES('1','歪歪分享论坛装修招标测试歪歪分享论坛装修招标测试歪歪分享论坛装修招标测试歪歪分享论坛装修招标测试歪歪分享论坛装修招标测试歪歪分享论坛装修招标测试歪歪分享论坛装修招标测试歪歪分享论坛装修招标测试歪歪分享论坛装修招标测试歪歪分享论坛装修招标测试歪歪分享论坛装修招标测试歪歪分享论坛装修招标测试歪歪分享论坛装修招标测试歪歪分享论坛装修招标测试歪歪分享论坛装修招标测试歪歪分享论坛装修招标测试');
INSERT INTO `aijiacms_info_data_13` VALUES('2','海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月');

DROP TABLE IF EXISTS `aijiacms_keylink`;
CREATE TABLE `aijiacms_keylink` (
  `itemid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `item` varchar(20) NOT NULL DEFAULT '',
  `listorder` smallint(4) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`itemid`),
  KEY `item` (`item`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='关联链接';


DROP TABLE IF EXISTS `aijiacms_keyword`;
CREATE TABLE `aijiacms_keyword` (
  `itemid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `moduleid` smallint(6) NOT NULL DEFAULT '0',
  `word` varchar(255) NOT NULL DEFAULT '',
  `keyword` varchar(255) NOT NULL DEFAULT '',
  `letter` varchar(255) NOT NULL DEFAULT '',
  `items` int(10) unsigned NOT NULL DEFAULT '0',
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
  `total_search` int(10) unsigned NOT NULL DEFAULT '0',
  `month_search` int(10) unsigned NOT NULL DEFAULT '0',
  `week_search` int(10) unsigned NOT NULL DEFAULT '0',
  `today_search` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '3',
  PRIMARY KEY (`itemid`),
  KEY `moduleid` (`moduleid`),
  KEY `word` (`word`),
  KEY `letter` (`letter`),
  KEY `keyword` (`keyword`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='关键词';


DROP TABLE IF EXISTS `aijiacms_link`;
CREATE TABLE `aijiacms_link` (
  `itemid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `typeid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `areaid` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `style` varchar(50) NOT NULL DEFAULT '',
  `thumb` varchar(255) NOT NULL DEFAULT '',
  `introduce` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(30) NOT NULL DEFAULT '',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `editor` varchar(30) NOT NULL DEFAULT '',
  `edittime` int(10) unsigned NOT NULL DEFAULT '0',
  `listorder` smallint(4) NOT NULL DEFAULT '0',
  `level` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `linkurl` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`itemid`),
  KEY `username` (`username`),
  KEY `listorder` (`listorder`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='友情链接';

INSERT INTO `aijiacms_link` VALUES('1','0','0','歪歪分享论坛','','','','admin','1442412772','admin','1442412772','0','0','3','http://bbs.waiwaili.com');
INSERT INTO `aijiacms_link` VALUES('2','0','0','站长圈','','','','admin','1442412785','admin','1442412785','0','0','3','http://www.waiwaili.com');
INSERT INTO `aijiacms_link` VALUES('3','0','0','站长任务网','','','','admin','1442412805','admin','1442412805','0','0','3','http://www.zzrww.com');

DROP TABLE IF EXISTS `aijiacms_login`;
CREATE TABLE `aijiacms_login` (
  `logid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `admin` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `loginip` varchar(50) NOT NULL DEFAULT '',
  `logintime` int(10) unsigned NOT NULL DEFAULT '0',
  `message` varchar(255) NOT NULL DEFAULT '',
  `agent` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`logid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='登录日志';


DROP TABLE IF EXISTS `aijiacms_mail`;
CREATE TABLE `aijiacms_mail` (
  `itemid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `typeid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `editor` varchar(30) NOT NULL DEFAULT '',
  `edittime` int(10) unsigned NOT NULL DEFAULT '0',
  `sendtime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='邮件订阅';


DROP TABLE IF EXISTS `aijiacms_mail_list`;
CREATE TABLE `aijiacms_mail_list` (
  `itemid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `typeids` varchar(255) NOT NULL DEFAULT '',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `edittime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`itemid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='订阅列表';


DROP TABLE IF EXISTS `aijiacms_mail_log`;
CREATE TABLE `aijiacms_mail_log` (
  `itemid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `editor` varchar(30) NOT NULL DEFAULT '',
  `edittime` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `note` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='邮件记录';


DROP TABLE IF EXISTS `aijiacms_mall_cart`;
CREATE TABLE `aijiacms_mall_cart` (
  `userid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `data` text NOT NULL,
  `edittime` int(10) unsigned NOT NULL DEFAULT '0',
  UNIQUE KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='购物车';


DROP TABLE IF EXISTS `aijiacms_mall_express`;
CREATE TABLE `aijiacms_mall_express` (
  `itemid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parentid` int(10) unsigned NOT NULL DEFAULT '0',
  `areaid` int(10) unsigned NOT NULL DEFAULT '0',
  `username` varchar(30) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL,
  `express` varchar(30) NOT NULL,
  `fee_start` decimal(10,2) unsigned NOT NULL,
  `fee_step` decimal(10,2) unsigned NOT NULL,
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `items` int(10) unsigned NOT NULL DEFAULT '0',
  `listorder` smallint(4) unsigned NOT NULL DEFAULT '0',
  `note` varchar(255) NOT NULL,
  PRIMARY KEY (`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='运费模板';


DROP TABLE IF EXISTS `aijiacms_member`;
CREATE TABLE `aijiacms_member` (
  `userid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL DEFAULT '',
  `passport` varchar(30) NOT NULL DEFAULT '',
  `company` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `payword` varchar(32) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `message` smallint(6) unsigned NOT NULL DEFAULT '0',
  `chat` smallint(6) unsigned NOT NULL DEFAULT '0',
  `sound` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `online` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `avatar` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `gender` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `truename` varchar(20) NOT NULL DEFAULT '',
  `mobile` varchar(50) NOT NULL DEFAULT '',
  `msn` varchar(50) NOT NULL DEFAULT '',
  `qq` varchar(20) NOT NULL DEFAULT '',
  `ali` varchar(30) NOT NULL DEFAULT '',
  `skype` varchar(30) NOT NULL DEFAULT '',
  `department` varchar(30) NOT NULL DEFAULT '',
  `career` varchar(30) NOT NULL DEFAULT '',
  `admin` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `role` varchar(255) NOT NULL DEFAULT '',
  `aid` int(10) unsigned NOT NULL DEFAULT '0',
  `groupid` smallint(4) unsigned NOT NULL DEFAULT '4',
  `regid` smallint(4) unsigned NOT NULL DEFAULT '0',
  `areaid` int(10) unsigned NOT NULL DEFAULT '0',
  `sms` int(10) NOT NULL DEFAULT '0',
  `credit` int(10) NOT NULL DEFAULT '0',
  `money` decimal(10,2) NOT NULL DEFAULT '0.00',
  `locking` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `bank` varchar(30) NOT NULL DEFAULT '',
  `account` varchar(30) NOT NULL DEFAULT '',
  `edittime` int(10) unsigned NOT NULL DEFAULT '0',
  `regip` varchar(50) NOT NULL DEFAULT '',
  `regtime` int(10) unsigned NOT NULL DEFAULT '0',
  `loginip` varchar(50) NOT NULL DEFAULT '',
  `logintime` int(10) unsigned NOT NULL DEFAULT '0',
  `logintimes` int(10) unsigned NOT NULL DEFAULT '1',
  `black` varchar(255) NOT NULL DEFAULT '',
  `send` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `auth` varchar(32) NOT NULL DEFAULT '',
  `authvalue` varchar(100) NOT NULL DEFAULT '',
  `authtime` int(10) unsigned NOT NULL DEFAULT '0',
  `vemail` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `vmobile` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `vtruename` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `vbank` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `vcompany` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `vtrade` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `trade` varchar(50) NOT NULL DEFAULT '',
  `support` varchar(50) NOT NULL DEFAULT '',
  `inviter` varchar(30) NOT NULL DEFAULT '',
  `companyid` int(10) DEFAULT NULL,
  `thumb` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`userid`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `passport` (`passport`),
  KEY `groupid` (`groupid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='会员';

INSERT INTO `aijiacms_member` VALUES('1','admin','歪歪分享论坛','房产网站','14e1b600b1fd579f47433b88e8d85291','7fef6171469e80d32c0559f88b377245','waiwaili@163.com','0','0','0','1','0','1','爱家','','admin@yourdomain.com','','','','','','1','','0','1','0','1','0','47','0.00','0.00','','','1443195247','127.0.0.1','1435899956','183.198.200.159','1447327198','30','','1','','','0','0','0','0','0','0','0','','','','0','');
INSERT INTO `aijiacms_member` VALUES('3','waiwaili','waiwaili','乞丐','14e1b600b1fd579f47433b88e8d85291','21232f297a57a5a743894a0e4a801fc3','waiwaili@waiwaili.com','1','0','1','1','0','1','乞丐','','','','','','','','1','','0','1','5','1','0','29','0.00','0.00','','','0','127.0.0.1','1442223973','120.195.42.24','1447062475','11','','1','','','0','0','0','0','0','0','0','','','','0','');

DROP TABLE IF EXISTS `aijiacms_member_group`;
CREATE TABLE `aijiacms_member_group` (
  `groupid` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `groupname` varchar(50) NOT NULL DEFAULT '',
  `vip` smallint(2) unsigned NOT NULL DEFAULT '0',
  `listorder` smallint(4) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`groupid`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='会员组';

INSERT INTO `aijiacms_member_group` VALUES('1','管理员','0','1');
INSERT INTO `aijiacms_member_group` VALUES('2','禁止访问','0','2');
INSERT INTO `aijiacms_member_group` VALUES('3','游客','0','3');
INSERT INTO `aijiacms_member_group` VALUES('4','待审核会员','0','4');
INSERT INTO `aijiacms_member_group` VALUES('5','个人会员','0','5');
INSERT INTO `aijiacms_member_group` VALUES('6','经纪人','0','6');
INSERT INTO `aijiacms_member_group` VALUES('7','中介','0','7');
INSERT INTO `aijiacms_member_group` VALUES('8','开发商','0','8');

DROP TABLE IF EXISTS `aijiacms_message`;
CREATE TABLE `aijiacms_message` (
  `itemid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '',
  `style` varchar(50) NOT NULL DEFAULT '',
  `typeid` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `content` text NOT NULL,
  `fromuser` varchar(30) NOT NULL DEFAULT '',
  `touser` varchar(30) NOT NULL DEFAULT '',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `ip` varchar(50) NOT NULL DEFAULT '',
  `isread` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `issend` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `feedback` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `groupids` varchar(20) NOT NULL DEFAULT '',
  `telephone` varchar(30) NOT NULL DEFAULT '',
  `truename` varchar(30) NOT NULL DEFAULT '',
  `sex` varchar(30) NOT NULL DEFAULT '',
  `email` varchar(50) DEFAULT NULL,
  `linkurl` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`itemid`),
  KEY `touser` (`touser`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='站内信件';

INSERT INTO `aijiacms_message` VALUES('1','欢迎加入AIJIACMS房产网站','','4','<table cellpadding=\"0\" cellspacing=\"0\" width=\"700\" align=\"center\" style=\"font-family:Verdana,Arial;\">\r\n<tr>\r\n<td style=\"background:#62B81B;line-height:30px;font-size:14px;font-weight:bold;color:#FFFFFF;\">&nbsp;&nbsp;欢迎加入AIJIACMS房产网站</td>\r\n</tr>\r\n<tr>\r\n<td style=\"border:#CCCCCC 1px solid;padding:20px 20px 20px 20px;line-height:180%;font-size:13px;\">\r\n<strong>尊敬的waiwaili</strong>：<br/>\r\n您好！<br/>\r\n欢迎您加入AIJIACMS房产网站，您的会员帐号为：<br/>\r\n<strong>户名：</strong>waiwaili<br/>\r\n<strong>密码：</strong>waiwaili 请您妥善保存，勿告诉他人。<br/>\r\n本站网址：<a href=\"http://yiti.15115.cn/\" target=\"_blank\">http://yiti.15115.cn/</a><br/>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td style=\"background:#333333;padding:10px;line-height:180%;font-size:12px;color:#FFFFFF;\">请注意：此邮件系 <a href=\"http://yiti.15115.cn/\" target=\"_blank\" style=\"color:#FFFFFF;\">AIJIACMS房产网站</a> 自动发送，请勿直接回复。<br/>如果此邮件不是您请求的，请忽略并删除！</td>\r\n</tr>\r\n</table>','','waiwaili','1442223973','127.0.0.1','0','0','0','3','','','','','','');

DROP TABLE IF EXISTS `aijiacms_module`;
CREATE TABLE `aijiacms_module` (
  `moduleid` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `module` varchar(20) NOT NULL DEFAULT '',
  `name` varchar(20) NOT NULL DEFAULT '',
  `moduledir` varchar(20) NOT NULL DEFAULT '',
  `domain` varchar(255) NOT NULL DEFAULT '',
  `linkurl` varchar(255) NOT NULL DEFAULT '',
  `style` varchar(50) NOT NULL DEFAULT '',
  `listorder` smallint(4) unsigned NOT NULL DEFAULT '0',
  `islink` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `ismenu` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `isblank` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `logo` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `disabled` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `installtime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`moduleid`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='模型';

INSERT INTO `aijiacms_module` VALUES('1','aijiacms','核心','','http://www.AIjiacms.com/','http://yiti.15115.cn/','','1','0','0','0','0','0','1435899956');
INSERT INTO `aijiacms_module` VALUES('2','member','会员','member','','http://yiti.15115.cn/member/','','9','0','0','0','0','0','1435899956');
INSERT INTO `aijiacms_module` VALUES('3','extend','扩展','extend','','http://yiti.15115.cn/extend/','','0','0','0','0','0','0','1435899956');
INSERT INTO `aijiacms_module` VALUES('4','company','公司','company','','http://yiti.15115.cn/company/','','7','0','1','0','0','0','1435899956');
INSERT INTO `aijiacms_module` VALUES('5','sale','二手房','sale','','http://yiti.15115.cn/sale/','','2','0','1','0','0','0','1435899956');
INSERT INTO `aijiacms_module` VALUES('16','buy','求购','buy','','http://yiti.15115.cn/buy/','','6','0','1','1','0','0','1435899956');
INSERT INTO `aijiacms_module` VALUES('11','special','专题','special','','http://yiti.15115.cn/special/','','16','0','0','0','0','0','1435899956');
INSERT INTO `aijiacms_module` VALUES('12','photo','图库','photo','','http://yiti.15115.cn/photo/','','13','0','0','0','0','0','1435899956');
INSERT INTO `aijiacms_module` VALUES('14','video','视频','video','','http://yiti.15115.cn/video/','','18','0','1','0','0','0','1435899956');
INSERT INTO `aijiacms_module` VALUES('15','group','团购','group','','http://yiti.15115.cn/group/','','8','0','1','0','0','0','1435899956');
INSERT INTO `aijiacms_module` VALUES('8','article','资讯','news','','http://yiti.15115.cn/news/','#FF0000','4','0','1','0','0','0','1435899956');
INSERT INTO `aijiacms_module` VALUES('6','newhouse','新房','house','','http://yiti.15115.cn/house/','','1','0','1','0','0','0','1435899956');
INSERT INTO `aijiacms_module` VALUES('7','rent','出租','rent','','http://yiti.15115.cn/rent/','','3','0','1','0','0','0','1435899956');
INSERT INTO `aijiacms_module` VALUES('18','community','小区','community','','http://yiti.15115.cn/community/','','17','0','1','0','0','0','1435899956');
INSERT INTO `aijiacms_module` VALUES('13','info','家装','home','','http://yiti.15115.cn/home/','','17','0','1','0','0','0','1435899956');

DROP TABLE IF EXISTS `aijiacms_newhouse_6`;
CREATE TABLE `aijiacms_newhouse_6` (
  `itemid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `catid` varchar(30) NOT NULL DEFAULT '0',
  `mycatid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `typeid` smallint(2) unsigned NOT NULL DEFAULT '0',
  `areaid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `level` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `elite` tinyint(1) NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `style` varchar(50) NOT NULL DEFAULT '',
  `fee` float NOT NULL DEFAULT '0',
  `introduce` varchar(255) NOT NULL DEFAULT '',
  `price` decimal(10,0) unsigned NOT NULL,
  `days` smallint(3) unsigned NOT NULL DEFAULT '0',
  `tag` varchar(100) NOT NULL DEFAULT '',
  `keyword` varchar(255) NOT NULL DEFAULT '',
  `pptword` varchar(255) NOT NULL DEFAULT '',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `thumb` varchar(255) NOT NULL DEFAULT '',
  `thumb1` varchar(255) NOT NULL DEFAULT '',
  `thumb2` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(30) NOT NULL DEFAULT '',
  `groupid` smallint(4) unsigned NOT NULL DEFAULT '0',
  `company` varchar(100) NOT NULL DEFAULT '',
  `vip` smallint(2) unsigned NOT NULL DEFAULT '0',
  `validated` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `truename` varchar(30) NOT NULL DEFAULT '',
  `telephone` varchar(50) NOT NULL DEFAULT '',
  `mobile` varchar(50) NOT NULL DEFAULT '',
  `address` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `msn` varchar(50) NOT NULL DEFAULT '',
  `qq` varchar(20) NOT NULL DEFAULT '',
  `ali` varchar(30) NOT NULL DEFAULT '',
  `skype` varchar(30) NOT NULL DEFAULT '',
  `totime` int(10) unsigned NOT NULL DEFAULT '0',
  `editor` varchar(30) NOT NULL DEFAULT '',
  `edittime` int(10) unsigned NOT NULL DEFAULT '0',
  `editdate` date NOT NULL DEFAULT '0000-00-00',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `adddate` date NOT NULL DEFAULT '0000-00-00',
  `ip` varchar(50) NOT NULL DEFAULT '',
  `template` varchar(30) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `linkurl` varchar(255) NOT NULL DEFAULT '',
  `filepath` varchar(255) NOT NULL DEFAULT '',
  `note` varchar(255) NOT NULL DEFAULT '',
  `letter` varchar(10) NOT NULL DEFAULT '' COMMENT '字母',
  `map` varchar(255) NOT NULL DEFAULT '' COMMENT '地图',
  `tedian` varchar(255) NOT NULL DEFAULT '' COMMENT '特点',
  `selltime` varchar(20) NOT NULL COMMENT '开盘时间',
  `completion` varchar(20) NOT NULL COMMENT '交房时间',
  `lp_type` varchar(20) NOT NULL DEFAULT '' COMMENT '物业类型',
  `lp_year` int(10) NOT NULL COMMENT '产权年限',
  `lp_company` varchar(30) NOT NULL DEFAULT '' COMMENT '物业公司',
  `lp_costs` float(10,2) NOT NULL COMMENT '物业费',
  `lp_totalarea` int(20) NOT NULL COMMENT '规划面积',
  `lp_area` int(10) DEFAULT NULL COMMENT '建筑面积',
  `lp_number` int(10) NOT NULL COMMENT '规划户数',
  `lp_car` int(10) DEFAULT NULL COMMENT '车位数',
  `lp_volume` float(10,2) DEFAULT NULL COMMENT '容积率',
  `lp_green` int(10) DEFAULT NULL COMMENT '绿化率',
  `lp_bus` varchar(50) DEFAULT '' COMMENT '公车',
  `lp_edu` varchar(50) DEFAULT '' COMMENT '教育',
  `lp_hospital` varchar(50) DEFAULT NULL COMMENT '医院',
  `lp_bank` varchar(50) DEFAULT '' COMMENT '银行',
  `lineprice` varchar(50) NOT NULL DEFAULT '' COMMENT '曲线价格',
  `linedate` varchar(100) NOT NULL DEFAULT '' COMMENT '曲线日期',
  `sell_address` varchar(50) DEFAULT NULL,
  `buildtype` varchar(255) NOT NULL,
  `kfs` varchar(255) NOT NULL,
  `lp_dianping` varchar(255) DEFAULT NULL,
  `isnew` int(4) DEFAULT '0',
  `fitment` varchar(255) NOT NULL,
  `bbsurl` varchar(255) NOT NULL,
  `lpts` varchar(255) NOT NULL,
  `range` varchar(80) NOT NULL,
  `pinyin` varchar(80) DEFAULT NULL,
  `isfx` int(4) DEFAULT '0',
  `yongjin` varchar(80) NOT NULL,
  PRIMARY KEY (`itemid`),
  KEY `username` (`username`),
  KEY `editdate` (`editdate`,`vip`,`edittime`),
  KEY `edittime` (`edittime`),
  KEY `catid` (`catid`),
  KEY `mycatid` (`mycatid`),
  KEY `areaid` (`areaid`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='新房';

INSERT INTO `aijiacms_newhouse_6` VALUES('2','1,2,3,4,5,6,7','0','2','1','2','1','海上明月','','0','山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛','4600','0','','海上明月,,尾盘楼盘,住宅','','35','http://yiti.15115.cn/file/upload/201509/15/23-37-39-59-1.jpg','','','歪歪分享论坛','0','','0','0','','028-88888888','','荆河岸边','','','','','','0','admin','1442382249','2015-09-16','1442329920','2015-09-15','127.0.0.1','','3','show.php/itemid-2/','','','hsmy','116.694053,40.107287','荆河两岸','2015-09-01','2023-09-01','','70','歪歪分享论坛','20.00','500','400','300','500','20.00','60','2路','小学 中学 高中','工人医院','工商','','','山东省青岛市歪歪分享论坛','1,2,3','歪歪分享论坛','','1','2','bbs.waiwaili.com','2,3,4,5,6,7,8,9','','haishangmingyue','1','1%');
INSERT INTO `aijiacms_newhouse_6` VALUES('3','1','0','0','1','0','0','歪歪分享论坛小区','','0','歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区','0','0','','歪歪分享论坛小区,,待售楼盘,住宅','','1','http://yiti.15115.cn/file/upload/201509/16/00-01-35-38-1.jpg','http://yiti.15115.cn/file/upload/201509/16/00-01-43-89-1.jpg','http://yiti.15115.cn/file/upload/201509/16/00-01-57-74-1.jpg','souho','0','','0','0','','','','荆河岸边','','','','','','0','admin','1442332964','2015-09-16','1442332840','2015-09-16','127.0.0.1','','3','show.php/itemid-3/','','','wwfxltq','119.803197,36.006945','','','','','70','歪歪分享论坛','20.00','500','400','300','500','20.00','60','2路','小学 中学 高中','工人医院','工商','','','','1,2','歪歪分享论坛','','0','1,2','bbs.waiwaili.com','2,3,4,5,6','','','0','');
INSERT INTO `aijiacms_newhouse_6` VALUES('4','1,2,3,4,5,6,7','0','2','1','2','0','大同天下','','0','大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下','4600','0','','大同天下,,尾盘楼盘,住宅','','4','http://yiti.15115.cn/file/upload/201509/16/12-10-33-44-1.jpg','','','admin','1','房产网站','0','0','','028-88888888','','山东省青岛市大同天下','','','','','','0','admin','1442376636','2015-09-16','1442376505','2015-09-16','127.0.0.1','','3','show.php/itemid-4/','','','dttx','120.430402,36.165049','大同天下','2015-09-01','2015-10-01','','70','歪歪分享论坛','20.00','500','400','300','500','20.00','60','2路','小学 中学 高中','工人医院','工商','','','山东省青岛市歪歪分享论坛','1,2,3,4','歪歪分享论坛','','1','1,2,3','bbs.waiwaili.com','2,3,4,5,6,7,8,9','','datongtianxia','0','');
INSERT INTO `aijiacms_newhouse_6` VALUES('5','1,2,3,4,5,6,7','0','2','1','2','0','威尼斯庄园','','0','威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园','4600','0','','威尼斯庄园,,尾盘楼盘,住宅','','1','http://yiti.15115.cn/file/upload/201509/16/13-45-27-44-1.jpg','','','admin','1','房产网站','0','0','','028-88888888','','山东省青岛市威尼斯庄园','','','','','','0','admin','1442382329','2015-09-16','1442382255','2015-09-16','127.0.0.1','','3','show.php/itemid-5/','','','wnszy','120.42379,36.166739','威尼斯庄园','2015-09-01','2015-11-01','','70','歪歪分享论坛','20.00','500','400','300','500','20.00','60','2路','小学 中学 高中','工人医院','工商','','','山东省青岛市歪歪分享论坛','1,2','歪歪分享论坛','','1','1,2','bbs.waiwaili.com','2,3,4,5,6','','weinisizhuangyuan','0','');
INSERT INTO `aijiacms_newhouse_6` VALUES('6','1,2,3,4,5,6,7','0','2','1','2','0','歪歪分享论坛中央公馆','','0','歪歪分享论坛中央公馆歪歪分享论坛中央公馆歪歪分享论坛中央公馆歪歪分享论坛中央公馆歪歪分享论坛中央公馆歪歪分享论坛中央公馆歪歪分享论坛中央公馆歪歪分享论坛','4600','0','','歪歪分享论坛中央公馆,,尾盘楼盘,住宅','','3','http://yiti.15115.cn/file/upload/201509/16/13-47-54-29-1.jpg','','','admin','1','房产网站','0','0','','028-88888888','','歪歪分享论坛中央公馆','','','','','','0','admin','1442382476','2015-09-16','1442382329','2015-09-16','127.0.0.1','','3','show.php/itemid-6/','','','wwfxltzygg','120.42609,36.168079','歪歪分享论坛中央公馆','2015-09-01','2016-03-01','','70','歪歪分享论坛','20.00','500','400','300','500','20.00','60','2路','小学 中学 高中','工人医院','工商','','','山东省青岛市歪歪分享论坛','1,2,3','歪歪分享论坛','','1','1,2','bbs.waiwaili.com','2,3,4,5,6,7,8,9','','jinshangzhongguozhongyanggongguan','0','');
INSERT INTO `aijiacms_newhouse_6` VALUES('7','1,2,3,4,5,6,7','0','2','1','2','0','歪歪分享论坛远航国际','','0','歪歪分享论坛远航国际歪歪分享论坛远航国际歪歪分享论坛远航国际歪歪分享论坛远航国际歪歪分享论坛远航国际歪歪分享论坛远航国际歪歪分享论坛远航国际歪歪分享论坛','4600','0','','歪歪分享论坛远航国际,,尾盘楼盘,住宅','','2','http://yiti.15115.cn/file/upload/201509/16/13-50-52-92-1.jpg','','','admin','1','房产网站','0','0','','028-88888888','','山东省青岛市歪歪分享论坛远航国际','','','','','','0','admin','1442382654','2015-09-16','1442382499','2015-09-16','127.0.0.1','','3','show.php/itemid-7/','','','wwfxltyhgj','120.388864,36.176353','歪歪分享论坛远航国际','2015-09-01','2019-02-01','','70','歪歪分享论坛','20.00','500','400','300','500','20.00','60','2路','小学 中学 高中','工人医院','工商','','','山东省青岛市歪歪分享论坛','1,2,3,4','歪歪分享论坛','','1','1,2,3','bbs.waiwaili.com','2,3,4,5,6,7,8,9','','jinshangzhongguoyuanhangguoji','0','');
INSERT INTO `aijiacms_newhouse_6` VALUES('8','1,2,3,4,5','0','2','1','2','0','歪歪分享论坛锦绣名城','','0','歪歪分享论坛锦绣名城歪歪分享论坛锦绣名城歪歪分享论坛锦绣名城歪歪分享论坛锦绣名城歪歪分享论坛锦绣名城歪歪分享论坛锦绣名城','4600','0','','歪歪分享论坛锦绣名城,,尾盘楼盘,住宅','','4','http://yiti.15115.cn/file/upload/201509/16/13-51-31-44-1.jpg','','','waiwaili','5','乞丐','0','0','','028-88888888','','山东省青岛市歪歪分享论坛锦绣名城','','','','','','0','admin','1447221038','2015-11-11','1442382654','2015-09-16','127.0.0.1','','3','show.php/itemid-8/','','','wwfxltjxmc','120.399788,36.178101','歪歪分享论坛锦绣名城','2015-09-01','2019-09-01','','70','歪歪分享论坛','20.00','500','400','300','500','20.00','60','2路','小学 中学 高中','工人医院','工商','','','山东省青岛市歪歪分享论坛','1,2,3','歪歪分享论坛','','1','1,2,3','bbs.waiwaili.com','2,3,5,6','','waiwaifenxiangluntanjinxiumingcheng','0','');
INSERT INTO `aijiacms_newhouse_6` VALUES('9','1','0','0','1','0','0','若需 要','','0','','0','0','','','','0','','','','admin','0','','0','0','','','','奇才','','','','','','0','admin','0','0000-00-00','1447323355','1970-01-01','','0','3','9/','','','rx y','','','','','','0','','0.00','0','','0','','','','','','','','','','','','','','0','','','','','','0','');

DROP TABLE IF EXISTS `aijiacms_newhouse_data_6`;
CREATE TABLE `aijiacms_newhouse_data_6` (
  `itemid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `content` mediumtext NOT NULL,
  PRIMARY KEY (`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='新房内容';

INSERT INTO `aijiacms_newhouse_data_6` VALUES('2','山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛山东省青岛市歪歪分享论坛');
INSERT INTO `aijiacms_newhouse_data_6` VALUES('3','歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区歪歪分享论坛小区');
INSERT INTO `aijiacms_newhouse_data_6` VALUES('4','大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下<br />\r\n<p>\r\n	大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下<br />\r\n大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下大同天下\r\n</p>');
INSERT INTO `aijiacms_newhouse_data_6` VALUES('5','威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园威尼斯庄园');
INSERT INTO `aijiacms_newhouse_data_6` VALUES('6','歪歪分享论坛中央公馆歪歪分享论坛中央公馆歪歪分享论坛中央公馆歪歪分享论坛中央公馆歪歪分享论坛中央公馆歪歪分享论坛中央公馆歪歪分享论坛中央公馆歪歪分享论坛中央公馆歪歪分享论坛中央公馆歪歪分享论坛中央公馆歪歪分享论坛中央公馆歪歪分享论坛中央公馆歪歪分享论坛中央公馆歪歪分享论坛中央公馆歪歪分享论坛中央公馆歪歪分享论坛中央公馆歪歪分享论坛中央公馆歪歪分享论坛中央公馆歪歪分享论坛中央公馆歪歪分享论坛中央公馆');
INSERT INTO `aijiacms_newhouse_data_6` VALUES('7','歪歪分享论坛远航国际歪歪分享论坛远航国际歪歪分享论坛远航国际歪歪分享论坛远航国际歪歪分享论坛远航国际歪歪分享论坛远航国际歪歪分享论坛远航国际歪歪分享论坛远航国际歪歪分享论坛远航国际歪歪分享论坛远航国际歪歪分享论坛远航国际歪歪分享论坛远航国际歪歪分享论坛远航国际歪歪分享论坛远航国际歪歪分享论坛远航国际歪歪分享论坛远航国际歪歪分享论坛远航国际歪歪分享论坛远航国际歪歪分享论坛远航国际歪歪分享论坛远航国际歪歪分享论坛远航国际歪歪分享论坛远航国际歪歪分享论坛远航国际歪歪分享论坛远航国际歪歪分享论坛远航国际歪歪分享论坛远航国际歪歪分享论坛远航国际歪歪分享论坛远航国际歪歪分享论坛远航国际歪歪分享论坛远航国际歪歪分享论坛远航国际歪歪分享论坛远航国际歪歪分享论坛远航国际歪歪分享论坛远航国际');
INSERT INTO `aijiacms_newhouse_data_6` VALUES('8','歪歪分享论坛锦绣名城歪歪分享论坛锦绣名城歪歪分享论坛锦绣名城歪歪分享论坛锦绣名城歪歪分享论坛锦绣名城歪歪分享论坛锦绣名城歪歪分享论坛锦绣名城歪歪分享论坛锦绣名城歪歪分享论坛锦绣名城歪歪分享论坛锦绣名城歪歪分享论坛锦绣名城歪歪分享论坛锦绣名城歪歪分享论坛锦绣名城歪歪分享论坛锦绣名城歪歪分享论坛锦绣名城歪歪分享论坛锦绣名城歪歪分享论坛锦绣名城歪歪分享论坛锦绣名城歪歪分享论坛锦绣名城歪歪分享论坛锦绣名城歪歪分享论坛锦绣名城歪歪分享论坛锦绣名城歪歪分享论坛锦绣名城歪歪分享论坛锦绣名城歪歪分享论坛锦绣名城歪歪分享论坛锦绣名城歪歪分享论坛锦绣名城歪歪分享论坛锦绣名城歪歪分享论坛锦绣名城歪歪分享论坛锦绣名城歪歪分享论坛锦绣名城歪歪分享论坛锦绣名城歪歪分享论坛锦绣名城歪歪分享论坛锦绣名城歪歪分享论坛锦绣名城歪歪分享论坛锦绣名城歪歪分享论坛锦绣名城歪歪分享论坛锦绣名城歪歪分享论坛锦绣名城歪歪分享论坛锦绣名城歪歪分享论坛锦绣名城');
INSERT INTO `aijiacms_newhouse_data_6` VALUES('9','');

DROP TABLE IF EXISTS `aijiacms_newhouse_price`;
CREATE TABLE `aijiacms_newhouse_price` (
  `itemid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `price` int(10) NOT NULL,
  `market` smallint(6) unsigned NOT NULL DEFAULT '0',
  `username` varchar(30) NOT NULL,
  `areaid` int(10) unsigned NOT NULL DEFAULT '0',
  `company` varchar(100) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `qq` varchar(20) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `editor` varchar(30) NOT NULL DEFAULT '',
  `edittime` int(10) unsigned NOT NULL DEFAULT '0',
  `note` varchar(255) NOT NULL,
  `title` varchar(50) NOT NULL,
  `trend` int(10) NOT NULL,
  PRIMARY KEY (`itemid`),
  KEY `addtime` (`addtime`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='新房报价';

INSERT INTO `aijiacms_newhouse_price` VALUES('1','2','4500','0','admin','0','房产网站','','','127.0.0.1','1442331494','3','souho','1442331504','','海上明月','0');
INSERT INTO `aijiacms_newhouse_price` VALUES('2','2','4600','0','admin','0','房产网站','','','127.0.0.1','1442331508','3','souho','1442331515','','','1');
INSERT INTO `aijiacms_newhouse_price` VALUES('3','2','4600','0','admin','0','房产网站','','','127.0.0.1','1442331529','3','souho','1442331534','','','0');
INSERT INTO `aijiacms_newhouse_price` VALUES('4','2','4200','0','admin','0','房产网站','','','127.0.0.1','1442331584','3','souho','1442331589','','海上明月','2');

DROP TABLE IF EXISTS `aijiacms_newhouse_search_6`;
CREATE TABLE `aijiacms_newhouse_search_6` (
  `itemid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `areaid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `content` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `sorttime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`itemid`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='新房搜索';

INSERT INTO `aijiacms_newhouse_search_6` VALUES('2','1','1','海上明月,,尾盘楼盘,住宅','3','1442333624');
INSERT INTO `aijiacms_newhouse_search_6` VALUES('3','1','1','歪歪分享论坛小区,,待售楼盘,住宅','3','1442332802');
INSERT INTO `aijiacms_newhouse_search_6` VALUES('4','1','1','大同天下,,尾盘楼盘,住宅','3','1442333530');
INSERT INTO `aijiacms_newhouse_search_6` VALUES('5','1','1','威尼斯庄园,,尾盘楼盘,住宅','3','1442333625');
INSERT INTO `aijiacms_newhouse_search_6` VALUES('6','1','1','歪歪分享论坛中央公馆,,尾盘楼盘,住宅','3','1442333627');
INSERT INTO `aijiacms_newhouse_search_6` VALUES('7','1','1','歪歪分享论坛远航国际,,尾盘楼盘,住宅','3','1442333630');
INSERT INTO `aijiacms_newhouse_search_6` VALUES('8','1','1','歪歪分享论坛锦绣名城,,尾盘楼盘,住宅','3','1447172030');

DROP TABLE IF EXISTS `aijiacms_news`;
CREATE TABLE `aijiacms_news` (
  `itemid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `typeid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `level` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `style` varchar(50) NOT NULL DEFAULT '',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `username` varchar(30) NOT NULL DEFAULT '',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `editor` varchar(30) NOT NULL DEFAULT '',
  `edittime` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `linkurl` varchar(255) NOT NULL DEFAULT '',
  `note` varchar(255) NOT NULL DEFAULT '',
  `houseid` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`itemid`),
  KEY `username` (`username`),
  KEY `addtime` (`addtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='公司新闻';


DROP TABLE IF EXISTS `aijiacms_news_data`;
CREATE TABLE `aijiacms_news_data` (
  `itemid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `content` mediumtext NOT NULL,
  PRIMARY KEY (`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='公司新闻内容';


DROP TABLE IF EXISTS `aijiacms_oauth`;
CREATE TABLE `aijiacms_oauth` (
  `itemid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL DEFAULT '',
  `site` varchar(30) NOT NULL DEFAULT '',
  `openid` varchar(255) NOT NULL DEFAULT '',
  `nickname` varchar(255) NOT NULL DEFAULT '',
  `avatar` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `logintimes` int(10) unsigned NOT NULL DEFAULT '0',
  `logintime` int(10) unsigned NOT NULL DEFAULT '0',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`itemid`),
  KEY `username` (`username`),
  KEY `site` (`site`,`openid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='一键登录';


DROP TABLE IF EXISTS `aijiacms_online`;
CREATE TABLE `aijiacms_online` (
  `userid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `username` varchar(30) NOT NULL DEFAULT '',
  `ip` varchar(50) NOT NULL DEFAULT '',
  `moduleid` int(10) unsigned NOT NULL DEFAULT '0',
  `online` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `lasttime` int(10) unsigned NOT NULL DEFAULT '0',
  UNIQUE KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='在线会员';

INSERT INTO `aijiacms_online` VALUES('1','admin','120.195.42.80','1','1','1447406935');

DROP TABLE IF EXISTS `aijiacms_page`;
CREATE TABLE `aijiacms_page` (
  `itemid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '',
  `style` varchar(50) NOT NULL DEFAULT '',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `username` varchar(30) NOT NULL DEFAULT '',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `editor` varchar(30) NOT NULL DEFAULT '',
  `edittime` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `linkurl` varchar(255) NOT NULL DEFAULT '',
  `listorder` smallint(4) unsigned NOT NULL DEFAULT '0',
  `note` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`itemid`),
  KEY `username` (`username`),
  KEY `addtime` (`addtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='公司单页';


DROP TABLE IF EXISTS `aijiacms_page_data`;
CREATE TABLE `aijiacms_page_data` (
  `itemid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `content` mediumtext NOT NULL,
  PRIMARY KEY (`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='公司单页内容';


DROP TABLE IF EXISTS `aijiacms_photo_12`;
CREATE TABLE `aijiacms_photo_12` (
  `itemid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `areaid` int(10) unsigned NOT NULL DEFAULT '0',
  `level` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `style` varchar(50) NOT NULL DEFAULT '',
  `fee` float NOT NULL DEFAULT '0',
  `introduce` varchar(255) NOT NULL DEFAULT '',
  `keyword` varchar(255) NOT NULL DEFAULT '',
  `pptword` varchar(255) NOT NULL DEFAULT '',
  `items` int(10) unsigned NOT NULL DEFAULT '0',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `thumb` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(30) NOT NULL DEFAULT '',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `editor` varchar(30) NOT NULL DEFAULT '',
  `edittime` int(10) unsigned NOT NULL DEFAULT '0',
  `ip` varchar(50) NOT NULL DEFAULT '',
  `template` varchar(30) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `open` tinyint(1) unsigned NOT NULL DEFAULT '3',
  `password` varchar(30) NOT NULL DEFAULT '',
  `question` varchar(30) NOT NULL DEFAULT '',
  `answer` varchar(30) NOT NULL DEFAULT '',
  `linkurl` varchar(255) NOT NULL DEFAULT '',
  `filepath` varchar(255) NOT NULL DEFAULT '',
  `note` varchar(255) NOT NULL DEFAULT '',
  `houseid` int(10) NOT NULL DEFAULT '0',
  `housename` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`itemid`),
  KEY `addtime` (`addtime`),
  KEY `catid` (`catid`),
  KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='图库';

INSERT INTO `aijiacms_photo_12` VALUES('1','23','0','5','海上明月歪歪分享论坛测试效果图','','0','海上明月歪歪分享论坛测试效果图','海上明月歪歪分享论坛测试效果图,效果图','','5','1','http://yiti.15115.cn/file/upload/201509/15/23-43-12-25-1.jpg','admin','1442331676','souho','1442331731','127.0.0.1','','3','3','','','','p1-h2.html','','','2','海上明月');
INSERT INTO `aijiacms_photo_12` VALUES('2','24','0','5','海上明月歪歪分享论坛测试户型图','','0','海上明月歪歪分享论坛测试户型图海上明月歪歪分享论坛测试户型图海上明月歪歪分享论坛测试户型图海上明月歪歪分享论坛测试户型图海上明月歪歪分享论坛','海上明月歪歪分享论坛测试户型图,户型图','','4','1','http://yiti.15115.cn/file/upload/201509/15/23-46-13-69-1.jpg','admin','1442331934','souho','1442332084','127.0.0.1','','3','3','','','','p2-h0.html','','','0','海上明月');
INSERT INTO `aijiacms_photo_12` VALUES('3','25','0','1','海上明月歪歪分享论坛测试样板间','','0','海上明月歪歪分享论坛测试样板间','海上明月歪歪分享论坛测试样板间,样板间','','4','1','http://yiti.15115.cn/file/upload/201509/16/00-34-03-95-1.jpg','admin','1442334803','admin','1442334829','127.0.0.1','','3','3','','','','p3-h2.html','','','2','海上明月');
INSERT INTO `aijiacms_photo_12` VALUES('4','24','0','1','海上明月','','0','海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月','海上明月,户型图','','4','0','http://yiti.15115.cn/file/upload/201509/16/00-36-31-83-1.jpg','admin','1442334965','admin','1442334981','127.0.0.1','','3','3','','','','p4-h2.html','','','2','海上明月');
INSERT INTO `aijiacms_photo_12` VALUES('5','26','0','0','海上明月歪歪分享论坛测试实景图','','0','海上明月歪歪分享论坛测试实景图','海上明月歪歪分享论坛测试实景图,实景图','','3','0','http://yiti.15115.cn/file/upload/201509/16/00-45-39-98-1.jpg','admin','1442335397','admin','1442335421','127.0.0.1','','3','3','','','','p5-h2.html','','','2','海上明月');
INSERT INTO `aijiacms_photo_12` VALUES('6','27','0','1','海上明月歪歪分享论坛测试交通图','','0','海上明月歪歪分享论坛测试交通图','海上明月歪歪分享论坛测试交通图,交通图','','2','1','http://yiti.15115.cn/file/upload/201509/16/00-47-23-99-1.jpg','admin','1442335563','admin','1447063156','127.0.0.1','','3','3','','','','p6-h2.html','','','2','海上明月');
INSERT INTO `aijiacms_photo_12` VALUES('8','23','0','0','gfdgdfgfd','','0','','gfdgdfgfd,效果图','','0','0','','admin','1447062996','admin','1447063012','120.195.42.24','','3','3','','','','p8-h0.html','','','0','歪歪分享论坛锦绣名城');

DROP TABLE IF EXISTS `aijiacms_photo_data_12`;
CREATE TABLE `aijiacms_photo_data_12` (
  `itemid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `content` longtext NOT NULL,
  PRIMARY KEY (`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='图库内容';

INSERT INTO `aijiacms_photo_data_12` VALUES('1','海上明月歪歪分享论坛测试效果图');
INSERT INTO `aijiacms_photo_data_12` VALUES('2','海上明月歪歪分享论坛测试户型图海上明月歪歪分享论坛测试户型图海上明月歪歪分享论坛测试户型图海上明月歪歪分享论坛测试户型图海上明月歪歪分享论坛测试户型图海上明月歪歪分享论坛测试户型图海上明月歪歪分享论坛测试户型图海上明月歪歪分享论坛测试户型图海上明月歪歪分享论坛测试户型图海上明月歪歪分享论坛测试户型图海上明月歪歪分享论坛测试户型图海上明月歪歪分享论坛测试户型图');
INSERT INTO `aijiacms_photo_data_12` VALUES('3','海上明月歪歪分享论坛测试样板间');
INSERT INTO `aijiacms_photo_data_12` VALUES('4','海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月');
INSERT INTO `aijiacms_photo_data_12` VALUES('5','海上明月歪歪分享论坛测试实景图');
INSERT INTO `aijiacms_photo_data_12` VALUES('6','海上明月歪歪分享论坛测试交通图');
INSERT INTO `aijiacms_photo_data_12` VALUES('8','');

DROP TABLE IF EXISTS `aijiacms_photo_item_12`;
CREATE TABLE `aijiacms_photo_item_12` (
  `itemid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `item` bigint(20) unsigned NOT NULL DEFAULT '0',
  `introduce` text NOT NULL,
  `thumb` varchar(255) NOT NULL DEFAULT '',
  `mianji` varchar(50) NOT NULL DEFAULT '',
  `listorder` smallint(4) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`itemid`),
  KEY `listorder` (`listorder`),
  KEY `item` (`item`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COMMENT='图库图片';

INSERT INTO `aijiacms_photo_item_12` VALUES('1','1','','http://yiti.15115.cn/file/upload/201509/15/23-43-11-38-1.jpg','','0');
INSERT INTO `aijiacms_photo_item_12` VALUES('2','1','','http://yiti.15115.cn/file/upload/201509/15/23-43-12-49-1.jpg','','0');
INSERT INTO `aijiacms_photo_item_12` VALUES('3','1','','http://yiti.15115.cn/file/upload/201509/15/23-43-12-55-1.jpg','','0');
INSERT INTO `aijiacms_photo_item_12` VALUES('4','1','','http://yiti.15115.cn/file/upload/201509/15/23-43-12-52-1.jpg','','0');
INSERT INTO `aijiacms_photo_item_12` VALUES('5','1','','http://yiti.15115.cn/file/upload/201509/15/23-43-12-25-1.jpg','','0');
INSERT INTO `aijiacms_photo_item_12` VALUES('6','2','','http://yiti.15115.cn/file/upload/201509/15/23-46-12-30-1.jpg','','0');
INSERT INTO `aijiacms_photo_item_12` VALUES('7','2','','http://yiti.15115.cn/file/upload/201509/15/23-46-12-56-1.jpg','','0');
INSERT INTO `aijiacms_photo_item_12` VALUES('8','2','','http://yiti.15115.cn/file/upload/201509/15/23-46-12-36-1.jpg','','0');
INSERT INTO `aijiacms_photo_item_12` VALUES('9','2','','http://yiti.15115.cn/file/upload/201509/15/23-46-13-69-1.jpg','','0');
INSERT INTO `aijiacms_photo_item_12` VALUES('10','3','','http://yiti.15115.cn/file/upload/201509/16/00-34-02-10-1.jpg','','0');
INSERT INTO `aijiacms_photo_item_12` VALUES('11','3','','http://yiti.15115.cn/file/upload/201509/16/00-34-02-29-1.jpg','','0');
INSERT INTO `aijiacms_photo_item_12` VALUES('12','3','','http://yiti.15115.cn/file/upload/201509/16/00-34-03-15-1.jpg','','0');
INSERT INTO `aijiacms_photo_item_12` VALUES('13','3','','http://yiti.15115.cn/file/upload/201509/16/00-34-03-95-1.jpg','','0');
INSERT INTO `aijiacms_photo_item_12` VALUES('14','4','','http://yiti.15115.cn/file/upload/201509/16/00-36-30-93-1.jpg','','0');
INSERT INTO `aijiacms_photo_item_12` VALUES('15','4','','http://yiti.15115.cn/file/upload/201509/16/00-36-31-83-1.jpg','','0');
INSERT INTO `aijiacms_photo_item_12` VALUES('16','4','','http://yiti.15115.cn/file/upload/201509/16/00-36-31-76-1.jpg','','0');
INSERT INTO `aijiacms_photo_item_12` VALUES('17','4','','http://yiti.15115.cn/file/upload/201509/16/00-36-31-47-1.jpg','','0');
INSERT INTO `aijiacms_photo_item_12` VALUES('18','5','','http://yiti.15115.cn/file/upload/201509/16/00-45-39-98-1.jpg','','0');
INSERT INTO `aijiacms_photo_item_12` VALUES('19','5','','http://yiti.15115.cn/file/upload/201509/16/00-45-39-42-1.jpg','','0');
INSERT INTO `aijiacms_photo_item_12` VALUES('20','5','','http://yiti.15115.cn/file/upload/201509/16/00-45-39-12-1.jpg','','0');
INSERT INTO `aijiacms_photo_item_12` VALUES('21','6','','http://yiti.15115.cn/file/upload/201509/16/00-47-23-99-1.jpg','','0');
INSERT INTO `aijiacms_photo_item_12` VALUES('22','6','','http://yiti.15115.cn/file/upload/201509/16/00-47-24-45-1.jpg','','0');

DROP TABLE IF EXISTS `aijiacms_poll`;
CREATE TABLE `aijiacms_poll` (
  `itemid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `typeid` int(10) unsigned NOT NULL DEFAULT '0',
  `areaid` int(10) unsigned NOT NULL DEFAULT '0',
  `level` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `style` varchar(50) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `seo_title` varchar(255) NOT NULL DEFAULT '',
  `seo_keywords` varchar(255) NOT NULL DEFAULT '',
  `seo_description` varchar(255) NOT NULL DEFAULT '',
  `thumb_width` smallint(6) unsigned NOT NULL DEFAULT '0',
  `thumb_height` smallint(6) unsigned NOT NULL DEFAULT '0',
  `poll_max` smallint(6) unsigned NOT NULL DEFAULT '0',
  `poll_page` smallint(6) unsigned NOT NULL DEFAULT '0',
  `poll_cols` smallint(6) unsigned NOT NULL DEFAULT '0',
  `poll_order` smallint(6) unsigned NOT NULL DEFAULT '0',
  `polls` int(10) unsigned NOT NULL DEFAULT '0',
  `items` int(10) unsigned NOT NULL DEFAULT '0',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `fromtime` int(10) unsigned NOT NULL DEFAULT '0',
  `totime` int(10) unsigned NOT NULL DEFAULT '0',
  `editor` varchar(30) NOT NULL DEFAULT '',
  `edittime` int(10) unsigned NOT NULL DEFAULT '0',
  `linkurl` varchar(255) NOT NULL DEFAULT '',
  `template_poll` varchar(30) NOT NULL DEFAULT '',
  `template` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`itemid`),
  KEY `addtime` (`addtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='票选';


DROP TABLE IF EXISTS `aijiacms_poll_item`;
CREATE TABLE `aijiacms_poll_item` (
  `itemid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pollid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `style` varchar(50) NOT NULL DEFAULT '',
  `introduce` varchar(255) NOT NULL DEFAULT '',
  `thumb` varchar(255) NOT NULL DEFAULT '',
  `linkurl` varchar(255) NOT NULL DEFAULT '',
  `polls` int(10) unsigned NOT NULL DEFAULT '0',
  `listorder` smallint(4) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`itemid`),
  KEY `pollid` (`pollid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='票选选项';


DROP TABLE IF EXISTS `aijiacms_poll_record`;
CREATE TABLE `aijiacms_poll_record` (
  `rid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `itemid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `pollid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `username` varchar(30) NOT NULL DEFAULT '',
  `ip` varchar(50) NOT NULL DEFAULT '',
  `polltime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='票选记录';


DROP TABLE IF EXISTS `aijiacms_question`;
CREATE TABLE `aijiacms_question` (
  `qid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL DEFAULT '',
  `answer` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`qid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='验证问题';

INSERT INTO `aijiacms_question` VALUES('1','5+6=?','11');
INSERT INTO `aijiacms_question` VALUES('2','7+8=?','15');
INSERT INTO `aijiacms_question` VALUES('3','11*11=?','121');
INSERT INTO `aijiacms_question` VALUES('4','12-5=?','7');
INSERT INTO `aijiacms_question` VALUES('5','21-9=?','12');

DROP TABLE IF EXISTS `aijiacms_rent_7`;
CREATE TABLE `aijiacms_rent_7` (
  `itemid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `mycatid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `typeid` smallint(2) unsigned NOT NULL DEFAULT '0',
  `areaid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `level` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `elite` tinyint(1) NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `style` varchar(50) NOT NULL DEFAULT '',
  `fee` float NOT NULL DEFAULT '0',
  `introduce` varchar(255) NOT NULL DEFAULT '',
  `unit` varchar(10) NOT NULL DEFAULT '',
  `price` int(10) unsigned NOT NULL DEFAULT '0',
  `days` smallint(3) unsigned NOT NULL DEFAULT '0',
  `tag` varchar(100) NOT NULL DEFAULT '',
  `keyword` varchar(255) NOT NULL DEFAULT '',
  `pptword` varchar(255) NOT NULL DEFAULT '',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `thumb` varchar(255) NOT NULL DEFAULT '',
  `thumb1` varchar(255) NOT NULL DEFAULT '',
  `thumb2` varchar(255) NOT NULL DEFAULT '',
  `thumb3` varchar(255) NOT NULL DEFAULT '',
  `thumb4` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(30) NOT NULL DEFAULT '',
  `groupid` smallint(4) unsigned NOT NULL DEFAULT '0',
  `company` varchar(100) NOT NULL DEFAULT '',
  `vip` smallint(2) unsigned NOT NULL DEFAULT '0',
  `validated` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `truename` varchar(30) NOT NULL DEFAULT '',
  `telephone` varchar(50) NOT NULL DEFAULT '',
  `mobile` varchar(50) NOT NULL DEFAULT '',
  `address` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `msn` varchar(50) NOT NULL DEFAULT '',
  `qq` varchar(20) NOT NULL DEFAULT '',
  `ali` varchar(30) NOT NULL DEFAULT '',
  `skype` varchar(30) NOT NULL DEFAULT '',
  `totime` int(10) unsigned NOT NULL DEFAULT '0',
  `editor` varchar(30) NOT NULL DEFAULT '',
  `edittime` int(10) unsigned NOT NULL DEFAULT '0',
  `editdate` date NOT NULL DEFAULT '0000-00-00',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `adddate` date NOT NULL DEFAULT '0000-00-00',
  `ip` varchar(50) NOT NULL DEFAULT '',
  `template` varchar(30) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `linkurl` varchar(255) NOT NULL DEFAULT '',
  `filepath` varchar(255) NOT NULL DEFAULT '',
  `note` varchar(255) NOT NULL DEFAULT '',
  `housename` varchar(50) NOT NULL DEFAULT 'e',
  `houseid` int(10) NOT NULL,
  `room` varchar(50) NOT NULL DEFAULT '',
  `hall` varchar(50) NOT NULL,
  `toilet` varchar(50) NOT NULL DEFAULT '',
  `balcony` varchar(50) NOT NULL DEFAULT '',
  `houseearm` int(19) NOT NULL,
  `floor1` int(10) NOT NULL,
  `floor2` int(10) NOT NULL,
  `cqxz` varchar(10) NOT NULL,
  `houseyear` varchar(10) NOT NULL,
  `toward` varchar(10) NOT NULL,
  `map` varchar(100) NOT NULL,
  `peitao` varchar(255) NOT NULL,
  `fyts` varchar(255) NOT NULL,
  `bus` varchar(50) NOT NULL,
  `renttype` varchar(20) DEFAULT NULL,
  `paytype` varchar(20) DEFAULT NULL,
  `paytype2` varchar(20) DEFAULT NULL,
  `zhuanxiu` varchar(255) NOT NULL,
  `range` varchar(255) NOT NULL,
  `peitaor` varchar(255) NOT NULL,
  `fytsr` varchar(255) NOT NULL,
  `istop` smallint(6) DEFAULT '0',
  `ishot` smallint(6) DEFAULT '0',
  `to_time` int(10) NOT NULL DEFAULT '0',
  `hot_time` int(10) DEFAULT '0',
  PRIMARY KEY (`itemid`),
  KEY `username` (`username`),
  KEY `editdate` (`editdate`,`vip`,`edittime`),
  KEY `edittime` (`edittime`),
  KEY `catid` (`catid`),
  KEY `mycatid` (`mycatid`),
  KEY `areaid` (`areaid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='租房';


DROP TABLE IF EXISTS `aijiacms_rent_data_7`;
CREATE TABLE `aijiacms_rent_data_7` (
  `itemid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `content` mediumtext NOT NULL,
  PRIMARY KEY (`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='租房内容';


DROP TABLE IF EXISTS `aijiacms_rent_search_7`;
CREATE TABLE `aijiacms_rent_search_7` (
  `itemid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `areaid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `content` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `sorttime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`itemid`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='租房搜索';


DROP TABLE IF EXISTS `aijiacms_sale_5`;
CREATE TABLE `aijiacms_sale_5` (
  `itemid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `mycatid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `typeid` smallint(2) unsigned NOT NULL DEFAULT '0',
  `areaid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `level` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `elite` tinyint(1) NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `style` varchar(50) NOT NULL DEFAULT '',
  `fee` float NOT NULL DEFAULT '0',
  `introduce` varchar(255) NOT NULL DEFAULT '',
  `unit` varchar(10) NOT NULL DEFAULT '',
  `price` varchar(50) NOT NULL DEFAULT '',
  `days` smallint(3) unsigned NOT NULL DEFAULT '0',
  `tag` varchar(100) NOT NULL DEFAULT '',
  `keyword` varchar(255) NOT NULL DEFAULT '',
  `pptword` varchar(255) NOT NULL DEFAULT '',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `thumb` varchar(255) NOT NULL DEFAULT '',
  `thumb1` varchar(255) NOT NULL DEFAULT '',
  `thumb2` varchar(255) NOT NULL DEFAULT '',
  `thumb3` varchar(255) NOT NULL DEFAULT '',
  `thumb4` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(30) NOT NULL DEFAULT '',
  `groupid` smallint(4) unsigned NOT NULL DEFAULT '0',
  `company` varchar(100) NOT NULL DEFAULT '',
  `vip` smallint(2) unsigned NOT NULL DEFAULT '0',
  `validated` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `truename` varchar(30) NOT NULL DEFAULT '',
  `telephone` varchar(50) NOT NULL DEFAULT '',
  `mobile` varchar(50) NOT NULL DEFAULT '',
  `address` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `msn` varchar(50) NOT NULL DEFAULT '',
  `qq` varchar(20) NOT NULL DEFAULT '',
  `ali` varchar(30) NOT NULL DEFAULT '',
  `skype` varchar(30) NOT NULL DEFAULT '',
  `totime` int(10) unsigned NOT NULL DEFAULT '0',
  `editor` varchar(30) NOT NULL DEFAULT '',
  `edittime` int(10) unsigned NOT NULL DEFAULT '0',
  `editdate` date NOT NULL DEFAULT '0000-00-00',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `adddate` date NOT NULL DEFAULT '0000-00-00',
  `ip` varchar(50) NOT NULL DEFAULT '',
  `template` varchar(30) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `linkurl` varchar(255) NOT NULL DEFAULT '',
  `filepath` varchar(255) NOT NULL DEFAULT '',
  `note` varchar(255) NOT NULL DEFAULT '',
  `housename` varchar(50) NOT NULL DEFAULT 'e',
  `houseid` int(10) NOT NULL,
  `room` varchar(50) NOT NULL DEFAULT '',
  `hall` varchar(50) NOT NULL,
  `toilet` varchar(50) NOT NULL DEFAULT '',
  `balcony` varchar(50) NOT NULL DEFAULT '',
  `houseearm` int(19) NOT NULL,
  `floor1` int(10) NOT NULL,
  `floor2` int(10) NOT NULL,
  `cqxz` varchar(10) NOT NULL,
  `houseyear` varchar(10) NOT NULL,
  `map` varchar(100) NOT NULL,
  `peitao` varchar(255) NOT NULL,
  `fyts` varchar(255) NOT NULL,
  `bus` varchar(50) NOT NULL,
  `zhuanxiu` varchar(255) NOT NULL,
  `toward` varchar(255) NOT NULL,
  `fix` varchar(255) NOT NULL,
  `range` varchar(255) NOT NULL,
  `istop` smallint(6) DEFAULT '0',
  `ishot` smallint(6) DEFAULT '0',
  `to_time` int(10) NOT NULL DEFAULT '0',
  `hot_time` int(10) DEFAULT '0',
  PRIMARY KEY (`itemid`),
  KEY `username` (`username`),
  KEY `editdate` (`editdate`,`vip`,`edittime`),
  KEY `edittime` (`edittime`),
  KEY `catid` (`catid`),
  KEY `mycatid` (`mycatid`),
  KEY `areaid` (`areaid`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='二手房';

INSERT INTO `aijiacms_sale_5` VALUES('1','8','0','0','1','1','0','歪歪分享论坛二手房资源测试','','0','歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二','','4600','0','','歪歪分享论坛二手房资源测试,,荆河岸边,海上明月,个人房源,住宅','','2','http://yiti.15115.cn/file/upload/201509/16/14-30-11-52-1.jpg','','','','','admin','1','房产网站','0','0','歪歪分享论坛二手房资源测试','15588888888','15588888888','荆河岸边','','','','','','0','admin','1442385035','2015-09-16','1442384874','2015-09-16','127.0.0.1','','3','show-1.html','','','海上明月','2','3','1','1','1','120','2','22','1','3','120.430258,36.167147','水,电,天然气,供暖,空调,有线电视,宽带,电梯,车位,储藏室','学区房,婚房,小户型,采光好,包物业费,适合居住,适合商住,商场周边','歪歪分享论坛二手房资源测试','','1','1,2,3,4','','0','0','0','0');
INSERT INTO `aijiacms_sale_5` VALUES('2','8','0','0','1','1','0','歪歪分享论坛二手房资源测试','','0','歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二','','4600','0','','歪歪分享论坛二手房资源测试,,山东省青岛市大同天下,海上明月,个人房源,住宅','','0','http://yiti.15115.cn/file/upload/201509/16/15-01-19-64-1.jpg','','','','','admin','1','房产网站','0','0','乞丐','15588888888','15588888888','山东省青岛市大同天下','','','','','','0','admin','1442386905','2015-09-16','1442385036','2015-09-16','127.0.0.1','','3','show-2.html','','','海上明月','2','1','1','1','1','120','2','22','1','3','120.428821,36.167729','水','学区房','歪歪分享论坛二手房资源测试','','1','1,3','','0','0','0','0');
INSERT INTO `aijiacms_sale_5` VALUES('3','8','0','0','1','1','0','歪歪分享论坛二手房资源测试','','0','歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二','','0','0','','歪歪分享论坛二手房资源测试,,荆河岸边,海上明月,个人房源,住宅','','1','http://yiti.15115.cn/file/upload/201509/16/15-04-18-55-1.jpg','','','','','admin','1','房产网站','0','0','乞丐','15588888888','15588888888','荆河岸边','','','','','','0','admin','1442387062','2015-09-16','1442386905','2015-09-16','127.0.0.1','','3','show-3.html','','','海上明月','2','2','1','1','1','0','0','0','1','','120.434714,36.169478','水','学区房','歪歪分享论坛二手房资源测试','','1','1,2','','0','0','0','0');
INSERT INTO `aijiacms_sale_5` VALUES('4','8','0','0','1','0','0','海上明月二手房','','0','海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月','','0','0','','海上明月二手房,,荆河岸边,海上明月,个人房源,住宅','','0','http://yiti.15115.cn/file/upload/201509/16/15-15-23-78-1.jpg','','','','','admin','1','房产网站','0','0','海上明月二手房','15588888888','15588888888','荆河岸边','','','','','','0','admin','1442387725','2015-09-16','1442387667','2015-09-16','127.0.0.1','','3','show-4.html','','','海上明月','2','1','1','1','1','0','0','0','1','','120.389367,36.168895','水','学区房','歪歪分享论坛二手房资源测试','','1','1','','0','0','0','0');
INSERT INTO `aijiacms_sale_5` VALUES('5','8','0','0','0','0','0','海上明月','','0','海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月','','0','0','','海上明月,,荆河岸边,海上明月,个人房源,住宅','','0','http://yiti.15115.cn/file/upload/201509/16/15-17-02-84-1.jpg','','','','','admin','1','房产网站','0','0','乞丐','15588888888','15588888888','荆河岸边','','','','','','0','admin','1442387829','2015-09-16','1442387725','2015-09-16','127.0.0.1','','3','show-5.html','','','海上明月','2','1','1','1','0','0','0','0','1','','','水','学区房','','','1','1','','0','0','0','0');
INSERT INTO `aijiacms_sale_5` VALUES('6','8','0','0','0','0','0','海上明月','','0','海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月','','0','0','','海上明月,,荆河岸边,海上明月,个人房源,住宅','','0','http://yiti.15115.cn/file/upload/201509/16/15-17-43-49-1.jpg','','','','','admin','1','房产网站','0','0','乞丐','海上明月','海上明月','荆河岸边','','','','','','0','admin','1442387866','2015-09-16','1442387829','2015-09-16','127.0.0.1','','3','show-6.html','','','海上明月','2','1','1','1','1','0','0','0','1','','','水','学区房','','','1','1','','0','0','0','0');
INSERT INTO `aijiacms_sale_5` VALUES('7','8','0','0','1','0','0','大厦大厦奇才','','0','夺要','','0','0','','大厦大厦奇才,,奇才,若需 要,个人房源,住宅','','0','','','','','','admin','1','房产网站','0','0','夺在','235435243','235435243','奇才','','','','','','0','admin','1447323355','2015-11-12','1447323267','2015-11-12','223.245.110.158','','3','show-7.html','','','若需 要','9','1','0','0','0','0','0','0','1','','','','','','','','','','0','0','0','0');

DROP TABLE IF EXISTS `aijiacms_sale_data_5`;
CREATE TABLE `aijiacms_sale_data_5` (
  `itemid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `content` mediumtext NOT NULL,
  PRIMARY KEY (`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='二手房内容';

INSERT INTO `aijiacms_sale_data_5` VALUES('1','歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试');
INSERT INTO `aijiacms_sale_data_5` VALUES('2','<span style=\"color:#666666;font-family:微软雅黑;line-height:22px;background-color:#FFFFFF;\">歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试</span>');
INSERT INTO `aijiacms_sale_data_5` VALUES('3','歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试歪歪分享论坛二手房资源测试');
INSERT INTO `aijiacms_sale_data_5` VALUES('4','海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月二手房海上明月二手房');
INSERT INTO `aijiacms_sale_data_5` VALUES('5','海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月');
INSERT INTO `aijiacms_sale_data_5` VALUES('6','海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月海上明月');
INSERT INTO `aijiacms_sale_data_5` VALUES('7','夺要');

DROP TABLE IF EXISTS `aijiacms_sale_search_5`;
CREATE TABLE `aijiacms_sale_search_5` (
  `itemid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `areaid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `content` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `sorttime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`itemid`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='二手房搜索';

INSERT INTO `aijiacms_sale_search_5` VALUES('1','8','1','歪歪分享论坛二手房资源测试,,荆河岸边,海上明月,个人房源,住宅','3','1442333670');
INSERT INTO `aijiacms_sale_search_5` VALUES('2','8','1','歪歪分享论坛二手房资源测试,,山东省青岛市大同天下,海上明月,个人房源,住宅','3','1442333701');
INSERT INTO `aijiacms_sale_search_5` VALUES('3','8','1','歪歪分享论坛二手房资源测试,,荆河岸边,海上明月,个人房源,住宅','3','1442333704');
INSERT INTO `aijiacms_sale_search_5` VALUES('4','8','1','海上明月二手房,,荆河岸边,海上明月,个人房源,住宅','3','1442333715');
INSERT INTO `aijiacms_sale_search_5` VALUES('5','8','0','海上明月,,荆河岸边,海上明月,个人房源,住宅','3','1442333717');
INSERT INTO `aijiacms_sale_search_5` VALUES('6','8','0','海上明月,,荆河岸边,海上明月,个人房源,住宅','3','1442333717');
INSERT INTO `aijiacms_sale_search_5` VALUES('7','8','1','大厦大厦奇才,,奇才,若需 要,个人房源,住宅','3','1447258695');

DROP TABLE IF EXISTS `aijiacms_session`;
CREATE TABLE `aijiacms_session` (
  `sessionid` varchar(32) NOT NULL DEFAULT '',
  `data` text NOT NULL,
  `lastvisit` int(10) unsigned NOT NULL DEFAULT '0',
  UNIQUE KEY `sessionid` (`sessionid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='SESSION';


DROP TABLE IF EXISTS `aijiacms_setting`;
CREATE TABLE `aijiacms_setting` (
  `item` varchar(30) NOT NULL DEFAULT '',
  `item_key` varchar(100) NOT NULL DEFAULT '',
  `item_value` text NOT NULL,
  KEY `item` (`item`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='网站设置';

INSERT INTO `aijiacms_setting` VALUES('18','sphinx_host','');
INSERT INTO `aijiacms_setting` VALUES('18','sphinx_port','');
INSERT INTO `aijiacms_setting` VALUES('3','wenfang_captcha_add','0');
INSERT INTO `aijiacms_setting` VALUES('pay-kq99bill','name','快钱支付');
INSERT INTO `aijiacms_setting` VALUES('3','wenfang_min','5');
INSERT INTO `aijiacms_setting` VALUES('3','wenfang_max','100');
INSERT INTO `aijiacms_setting` VALUES('3','wenfang_time','');
INSERT INTO `aijiacms_setting` VALUES('3','wenfang_pagesize','5');
INSERT INTO `aijiacms_setting` VALUES('3','wenfang_limit','');
INSERT INTO `aijiacms_setting` VALUES('3','credit_add_wenfang','');
INSERT INTO `aijiacms_setting` VALUES('3','credit_del_wenfang','');
INSERT INTO `aijiacms_setting` VALUES('3','wenfang_am','网友');
INSERT INTO `aijiacms_setting` VALUES('4','group_message','3,5,6,7,8');
INSERT INTO `aijiacms_setting` VALUES('4','group_search','3,5,6,7,8');
INSERT INTO `aijiacms_setting` VALUES('4','group_contact','3,5,6,7,8');
INSERT INTO `aijiacms_setting` VALUES('4','group_buy','3,5,6,7,8');
INSERT INTO `aijiacms_setting` VALUES('4','group_index','3,5,6,7,8');
INSERT INTO `aijiacms_setting` VALUES('4','group_list','3,5,6,7,8');
INSERT INTO `aijiacms_setting` VALUES('4','seo_keywords_show','');
INSERT INTO `aijiacms_setting` VALUES('4','seo_description_show','');
INSERT INTO `aijiacms_setting` VALUES('4','seo_title_show','{内容标题}{分隔符}{分类名称}{模块名称}{分隔符}{网站名称}');
INSERT INTO `aijiacms_setting` VALUES('18','sphinx_name','');
INSERT INTO `aijiacms_setting` VALUES('18','fulltext','0');
INSERT INTO `aijiacms_setting` VALUES('18','level','');
INSERT INTO `aijiacms_setting` VALUES('18','swfu','0');
INSERT INTO `aijiacms_setting` VALUES('18','upload_thumb','0');
INSERT INTO `aijiacms_setting` VALUES('18','pagesize','20');
INSERT INTO `aijiacms_setting` VALUES('18','max_width','');
INSERT INTO `aijiacms_setting` VALUES('18','page_subcat','');
INSERT INTO `aijiacms_setting` VALUES('18','index_html','0');
INSERT INTO `aijiacms_setting` VALUES('18','credit_elite','');
INSERT INTO `aijiacms_setting` VALUES('18','list_html','0');
INSERT INTO `aijiacms_setting` VALUES('18','credit_refresh','');
INSERT INTO `aijiacms_setting` VALUES('18','htm_list_prefix','');
INSERT INTO `aijiacms_setting` VALUES('18','htm_list_urlid','0');
INSERT INTO `aijiacms_setting` VALUES('8','page_icat','6');
INSERT INTO `aijiacms_setting` VALUES('8','show_icat','0');
INSERT INTO `aijiacms_setting` VALUES('8','page_irecimg','4');
INSERT INTO `aijiacms_setting` VALUES('8','level','推荐文章|幻灯图片|推荐图文|头条相关|头条推荐');
INSERT INTO `aijiacms_setting` VALUES('8','page_ihits','5');
INSERT INTO `aijiacms_setting` VALUES('8','pagesize','20');
INSERT INTO `aijiacms_setting` VALUES('8','page_child','4');
INSERT INTO `aijiacms_setting` VALUES('8','show_lcat','1');
INSERT INTO `aijiacms_setting` VALUES('18','php_list_urlid','0');
INSERT INTO `aijiacms_setting` VALUES('18','show_html','0');
INSERT INTO `aijiacms_setting` VALUES('18','htm_item_prefix','');
INSERT INTO `aijiacms_setting` VALUES('18','htm_item_urlid','0');
INSERT INTO `aijiacms_setting` VALUES('18','php_item_urlid','4');
INSERT INTO `aijiacms_setting` VALUES('18','seo_title_index','');
INSERT INTO `aijiacms_setting` VALUES('18','seo_keywords_index','');
INSERT INTO `aijiacms_setting` VALUES('18','seo_description_index','');
INSERT INTO `aijiacms_setting` VALUES('18','seo_title_list','');
INSERT INTO `aijiacms_setting` VALUES('18','seo_keywords_list','');
INSERT INTO `aijiacms_setting` VALUES('18','seo_description_list','');
INSERT INTO `aijiacms_setting` VALUES('18','seo_title_show','');
INSERT INTO `aijiacms_setting` VALUES('6','fee_view','0');
INSERT INTO `aijiacms_setting` VALUES('6','fee_currency','credit');
INSERT INTO `aijiacms_setting` VALUES('6','question_add','1');
INSERT INTO `aijiacms_setting` VALUES('group-6','discount','100');
INSERT INTO `aijiacms_setting` VALUES('18','seo_keywords_show','');
INSERT INTO `aijiacms_setting` VALUES('1','weixin_reply','歪歪分享论坛房产系统最新版商业源码，持续更新升级中');
INSERT INTO `aijiacms_setting` VALUES('11','title_show','{$seo_showtitle}{$seo_delimiter}{$seo_catname}{$seo_modulename}{$seo_delimiter}{$seo_sitename}');
INSERT INTO `aijiacms_setting` VALUES('11','title_list','{$seo_catname}{$seo_cattitle}{$seo_page}{$seo_modulename}{$seo_delimiter}{$seo_sitename}');
INSERT INTO `aijiacms_setting` VALUES('11','banner_height','200');
INSERT INTO `aijiacms_setting` VALUES('11','credit_del','5');
INSERT INTO `aijiacms_setting` VALUES('11','title_index','{$seo_modulename}{$seo_delimiter}{$seo_page}{$seo_sitename}');
INSERT INTO `aijiacms_setting` VALUES('11','thumb_height','90');
INSERT INTO `aijiacms_setting` VALUES('11','banner_width','980');
INSERT INTO `aijiacms_setting` VALUES('11','thumb_width','120');
INSERT INTO `aijiacms_setting` VALUES('11','introduce_length','120');
INSERT INTO `aijiacms_setting` VALUES('11','order','addtime desc');
INSERT INTO `aijiacms_setting` VALUES('11','editor','Aijiacms');
INSERT INTO `aijiacms_setting` VALUES('11','save_remotepic','0');
INSERT INTO `aijiacms_setting` VALUES('11','fields','itemid,title,thumb,linkurl,style,catid,introduce,addtime,edittime');
INSERT INTO `aijiacms_setting` VALUES('11','clear_link','0');
INSERT INTO `aijiacms_setting` VALUES('11','split','0');
INSERT INTO `aijiacms_setting` VALUES('11','cat_property','0');
INSERT INTO `aijiacms_setting` VALUES('11','fulltext','0');
INSERT INTO `aijiacms_setting` VALUES('11','level','推荐专题|暂未指定|推荐图文|头条相关|头条推荐');
INSERT INTO `aijiacms_setting` VALUES('11','level_item','推荐信息|幻灯图片|推荐图文|头条相关|头条推荐|视频报道');
INSERT INTO `aijiacms_setting` VALUES('11','htm_list_urlid','0');
INSERT INTO `aijiacms_setting` VALUES('11','php_list_urlid','0');
INSERT INTO `aijiacms_setting` VALUES('11','htm_list_prefix','');
INSERT INTO `aijiacms_setting` VALUES('11','index_html','0');
INSERT INTO `aijiacms_setting` VALUES('12','credit_color','100');
INSERT INTO `aijiacms_setting` VALUES('12','credit_del','5');
INSERT INTO `aijiacms_setting` VALUES('12','credit_add','2');
INSERT INTO `aijiacms_setting` VALUES('12','pre_view','500');
INSERT INTO `aijiacms_setting` VALUES('12','fee_back','0');
INSERT INTO `aijiacms_setting` VALUES('12','fee_period','0');
INSERT INTO `aijiacms_setting` VALUES('12','fee_view','0');
INSERT INTO `aijiacms_setting` VALUES('12','fee_add','0');
INSERT INTO `aijiacms_setting` VALUES('12','fee_currency','money');
INSERT INTO `aijiacms_setting` VALUES('12','fee_mode','1');
INSERT INTO `aijiacms_setting` VALUES('12','question_add','2');
INSERT INTO `aijiacms_setting` VALUES('12','group_search','3,5,6,7');
INSERT INTO `aijiacms_setting` VALUES('12','captcha_add','2');
INSERT INTO `aijiacms_setting` VALUES('12','group_color','7');
INSERT INTO `aijiacms_setting` VALUES('12','check_add','2');
INSERT INTO `aijiacms_setting` VALUES('12','group_show','3,5,6,7');
INSERT INTO `aijiacms_setting` VALUES('12','group_list','3,5,6,7');
INSERT INTO `aijiacms_setting` VALUES('group-7','buy_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-7','buy_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-8','down_free_limit','1');
INSERT INTO `aijiacms_setting` VALUES('group-8','down_limit','5');
INSERT INTO `aijiacms_setting` VALUES('group-8','video_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-8','video_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-8','photo_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-8','photo_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-8','brand_free_limit','1');
INSERT INTO `aijiacms_setting` VALUES('group-8','brand_limit','5');
INSERT INTO `aijiacms_setting` VALUES('1','weixin_token','waiwaili');
INSERT INTO `aijiacms_setting` VALUES('14','fee_view','0');
INSERT INTO `aijiacms_setting` VALUES('14','fee_currency','money');
INSERT INTO `aijiacms_setting` VALUES('14','fee_add','0');
INSERT INTO `aijiacms_setting` VALUES('14','fee_mode','1');
INSERT INTO `aijiacms_setting` VALUES('14','question_add','2');
INSERT INTO `aijiacms_setting` VALUES('14','captcha_add','2');
INSERT INTO `aijiacms_setting` VALUES('14','check_add','2');
INSERT INTO `aijiacms_setting` VALUES('14','captcha_message','2');
INSERT INTO `aijiacms_setting` VALUES('14','question_message','2');
INSERT INTO `aijiacms_setting` VALUES('14','group_upload','6,7');
INSERT INTO `aijiacms_setting` VALUES('14','group_color','7');
INSERT INTO `aijiacms_setting` VALUES('14','group_search','3,5,6,7');
INSERT INTO `aijiacms_setting` VALUES('14','group_show','3,5,6,7');
INSERT INTO `aijiacms_setting` VALUES('14','group_list','3,5,6,7');
INSERT INTO `aijiacms_setting` VALUES('14','group_index','3,5,6,7');
INSERT INTO `aijiacms_setting` VALUES('14','seo_description_show','');
INSERT INTO `aijiacms_setting` VALUES('14','seo_keywords_show','');
INSERT INTO `aijiacms_setting` VALUES('15','fee_period','');
INSERT INTO `aijiacms_setting` VALUES('15','fee_view','');
INSERT INTO `aijiacms_setting` VALUES('15','fee_add','');
INSERT INTO `aijiacms_setting` VALUES('15','group_color','6,7');
INSERT INTO `aijiacms_setting` VALUES('15','captcha_inquiry','0');
INSERT INTO `aijiacms_setting` VALUES('15','question_inquiry','0');
INSERT INTO `aijiacms_setting` VALUES('15','group_search','3,5,6,7');
INSERT INTO `aijiacms_setting` VALUES('15','group_contact','5,6,7');
INSERT INTO `aijiacms_setting` VALUES('15','group_show','3,5,6,7');
INSERT INTO `aijiacms_setting` VALUES('15','group_index','3,5,6,7');
INSERT INTO `aijiacms_setting` VALUES('15','group_list','3,5,6,7');
INSERT INTO `aijiacms_setting` VALUES('15','seo_description_show','');
INSERT INTO `aijiacms_setting` VALUES('group-6','grade','0');
INSERT INTO `aijiacms_setting` VALUES('group-6','editor','Default');
INSERT INTO `aijiacms_setting` VALUES('group-8','know_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-8','know_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-8','info_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-8','info_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-8','article_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-8','article_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-8','resume_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-8','fee_mode','0');
INSERT INTO `aijiacms_setting` VALUES('group-8','fee','0');
INSERT INTO `aijiacms_setting` VALUES('group-8','discount','100');
INSERT INTO `aijiacms_setting` VALUES('group-8','editor','Aijiacms');
INSERT INTO `aijiacms_setting` VALUES('group-8','grade','0');
INSERT INTO `aijiacms_setting` VALUES('group-8','upload','1');
INSERT INTO `aijiacms_setting` VALUES('3','comment_domain','');
INSERT INTO `aijiacms_setting` VALUES('3','comment_show','1');
INSERT INTO `aijiacms_setting` VALUES('3','comment_module','6,5,7,8,4,15,12,14');
INSERT INTO `aijiacms_setting` VALUES('3','comment_group','5,6,7');
INSERT INTO `aijiacms_setting` VALUES('3','comment_vote_group','5,6,7');
INSERT INTO `aijiacms_setting` VALUES('3','comment_check','2');
INSERT INTO `aijiacms_setting` VALUES('3','comment_captcha_add','2');
INSERT INTO `aijiacms_setting` VALUES('pay-tenpay','name','财付通');
INSERT INTO `aijiacms_setting` VALUES('oauth-qq','enable','0');
INSERT INTO `aijiacms_setting` VALUES('2','vbank','0');
INSERT INTO `aijiacms_setting` VALUES('2','login_remember','1');
INSERT INTO `aijiacms_setting` VALUES('2','login_goto','1');
INSERT INTO `aijiacms_setting` VALUES('2','com_type','企业单位|事业单位或社会团体|个体经营');
INSERT INTO `aijiacms_setting` VALUES('2','com_size','1-49人|50-99人|100-499人|500-999人|1000-3000人|3000-5000人|5000-10000人|10000人以上');
INSERT INTO `aijiacms_setting` VALUES('2','captcha_login','0');
INSERT INTO `aijiacms_setting` VALUES('2','show_menu','0');
INSERT INTO `aijiacms_setting` VALUES('2','editor','Basic');
INSERT INTO `aijiacms_setting` VALUES('2','vfax','010-88889999');
INSERT INTO `aijiacms_setting` VALUES('2','vcompany','1');
INSERT INTO `aijiacms_setting` VALUES('2','com_mode','直营|加盟');
INSERT INTO `aijiacms_setting` VALUES('2','money_unit','人民币|港元|台币|美元|欧元|英镑');
INSERT INTO `aijiacms_setting` VALUES('2','mode_max','2');
INSERT INTO `aijiacms_setting` VALUES('pay-chinapay','name','中国银联');
INSERT INTO `aijiacms_setting` VALUES('pay-chinapay','order','6');
INSERT INTO `aijiacms_setting` VALUES('pay-chinapay','partnerid','');
INSERT INTO `aijiacms_setting` VALUES('pay-chinapay','percent','1');
INSERT INTO `aijiacms_setting` VALUES('pay-chinabank','name','网银在线');
INSERT INTO `aijiacms_setting` VALUES('pay-chinabank','order','3');
INSERT INTO `aijiacms_setting` VALUES('pay-chinabank','partnerid','');
INSERT INTO `aijiacms_setting` VALUES('pay-chinabank','keycode','');
INSERT INTO `aijiacms_setting` VALUES('pay-chinabank','percent','1');
INSERT INTO `aijiacms_setting` VALUES('pay-alipay','name','支付宝');
INSERT INTO `aijiacms_setting` VALUES('pay-alipay','order','2');
INSERT INTO `aijiacms_setting` VALUES('pay-alipay','email','');
INSERT INTO `aijiacms_setting` VALUES('pay-alipay','partnerid','');
INSERT INTO `aijiacms_setting` VALUES('pay-alipay','keycode','');
INSERT INTO `aijiacms_setting` VALUES('pay-alipay','notify','');
INSERT INTO `aijiacms_setting` VALUES('pay-alipay','percent','1');
INSERT INTO `aijiacms_setting` VALUES('pay-tenpay','order','1');
INSERT INTO `aijiacms_setting` VALUES('pay-tenpay','partnerid','');
INSERT INTO `aijiacms_setting` VALUES('pay-tenpay','keycode','');
INSERT INTO `aijiacms_setting` VALUES('pay-yeepay','name','易宝支付');
INSERT INTO `aijiacms_setting` VALUES('pay-yeepay','order','4');
INSERT INTO `aijiacms_setting` VALUES('pay-yeepay','partnerid','');
INSERT INTO `aijiacms_setting` VALUES('pay-yeepay','keycode','');
INSERT INTO `aijiacms_setting` VALUES('pay-yeepay','percent','1');
INSERT INTO `aijiacms_setting` VALUES('pay-paypal','name','贝宝');
INSERT INTO `aijiacms_setting` VALUES('pay-paypal','order','7');
INSERT INTO `aijiacms_setting` VALUES('pay-paypal','partnerid','');
INSERT INTO `aijiacms_setting` VALUES('pay-paypal','currency','USD');
INSERT INTO `aijiacms_setting` VALUES('pay-paypal','percent','0');
INSERT INTO `aijiacms_setting` VALUES('oauth-qq','name','QQ登录');
INSERT INTO `aijiacms_setting` VALUES('oauth-qq','order','1');
INSERT INTO `aijiacms_setting` VALUES('oauth-qq','id','');
INSERT INTO `aijiacms_setting` VALUES('oauth-qq','key','');
INSERT INTO `aijiacms_setting` VALUES('oauth-sina','name','新浪微博');
INSERT INTO `aijiacms_setting` VALUES('oauth-sina','order','2');
INSERT INTO `aijiacms_setting` VALUES('oauth-sina','id','');
INSERT INTO `aijiacms_setting` VALUES('oauth-sina','key','');
INSERT INTO `aijiacms_setting` VALUES('oauth-baidu','name','百度');
INSERT INTO `aijiacms_setting` VALUES('oauth-baidu','order','3');
INSERT INTO `aijiacms_setting` VALUES('oauth-baidu','id','');
INSERT INTO `aijiacms_setting` VALUES('oauth-baidu','key','');
INSERT INTO `aijiacms_setting` VALUES('oauth-msn','name','MSN');
INSERT INTO `aijiacms_setting` VALUES('oauth-msn','order','5');
INSERT INTO `aijiacms_setting` VALUES('oauth-msn','id','');
INSERT INTO `aijiacms_setting` VALUES('oauth-msn','key','');
INSERT INTO `aijiacms_setting` VALUES('group-1','uploadlimit','');
INSERT INTO `aijiacms_setting` VALUES('group-1','uploadday','0');
INSERT INTO `aijiacms_setting` VALUES('group-1','maxitem','20');
INSERT INTO `aijiacms_setting` VALUES('group-1','swfu_max','10');
INSERT INTO `aijiacms_setting` VALUES('group-1','uploadpt','0');
INSERT INTO `aijiacms_setting` VALUES('group-1','check','0');
INSERT INTO `aijiacms_setting` VALUES('group-1','captcha','0');
INSERT INTO `aijiacms_setting` VALUES('group-1','question','0');
INSERT INTO `aijiacms_setting` VALUES('group-1','cash','1');
INSERT INTO `aijiacms_setting` VALUES('group-1','ask','1');
INSERT INTO `aijiacms_setting` VALUES('group-1','mail','1');
INSERT INTO `aijiacms_setting` VALUES('group-1','sendmail','1');
INSERT INTO `aijiacms_setting` VALUES('group-1','trade_pay','0');
INSERT INTO `aijiacms_setting` VALUES('group-1','trade_sell','1');
INSERT INTO `aijiacms_setting` VALUES('group-1','spread','1');
INSERT INTO `aijiacms_setting` VALUES('group-2','brand_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','brand_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-2','know_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','know_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-2','info_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','info_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-2','article_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','article_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-2','fee_mode','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','fee','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','discount','100');
INSERT INTO `aijiacms_setting` VALUES('group-2','grade','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','editor','Basic');
INSERT INTO `aijiacms_setting` VALUES('group-2','upload','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','uploadtype','');
INSERT INTO `aijiacms_setting` VALUES('group-2','uploadsize','');
INSERT INTO `aijiacms_setting` VALUES('group-2','uploadlimit','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','uploadday','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','uploadpt','1');
INSERT INTO `aijiacms_setting` VALUES('group-2','check','1');
INSERT INTO `aijiacms_setting` VALUES('group-2','captcha','1');
INSERT INTO `aijiacms_setting` VALUES('group-2','question','1');
INSERT INTO `aijiacms_setting` VALUES('group-2','cash','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','ask','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','mail','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','sendmail','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','sms','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','trade_pay','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','trade_sell','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','spread','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','ad','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','chat','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','inbox_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-2','friend_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-2','favorite_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-2','alert_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-2','address_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-2','express_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-2','message_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-2','inquiry_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-2','price_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-2','type_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-2','homepage','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','styleid','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','home','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','home_menu','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','menu_c','0');
INSERT INTO `aijiacms_setting` VALUES('group-3','upload','0');
INSERT INTO `aijiacms_setting` VALUES('group-3','uploadtype','');
INSERT INTO `aijiacms_setting` VALUES('group-3','uploadsize','0');
INSERT INTO `aijiacms_setting` VALUES('group-3','uploadlimit','0');
INSERT INTO `aijiacms_setting` VALUES('group-3','uploadday','0');
INSERT INTO `aijiacms_setting` VALUES('group-3','maxitem','5');
INSERT INTO `aijiacms_setting` VALUES('group-3','swfu_max','2');
INSERT INTO `aijiacms_setting` VALUES('group-3','uploadpt','1');
INSERT INTO `aijiacms_setting` VALUES('group-3','check','1');
INSERT INTO `aijiacms_setting` VALUES('group-3','captcha','1');
INSERT INTO `aijiacms_setting` VALUES('group-3','question','1');
INSERT INTO `aijiacms_setting` VALUES('group-3','cash','0');
INSERT INTO `aijiacms_setting` VALUES('group-3','ask','0');
INSERT INTO `aijiacms_setting` VALUES('group-3','mail','0');
INSERT INTO `aijiacms_setting` VALUES('group-3','sendmail','0');
INSERT INTO `aijiacms_setting` VALUES('group-3','trade_pay','0');
INSERT INTO `aijiacms_setting` VALUES('group-3','trade_sell','0');
INSERT INTO `aijiacms_setting` VALUES('group-3','spread','0');
INSERT INTO `aijiacms_setting` VALUES('group-3','ad','0');
INSERT INTO `aijiacms_setting` VALUES('group-3','chat','1');
INSERT INTO `aijiacms_setting` VALUES('group-3','inbox_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-3','friend_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-3','favorite_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-3','alert_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-3','addmember_limit','');
INSERT INTO `aijiacms_setting` VALUES('group-3','message_limit','30');
INSERT INTO `aijiacms_setting` VALUES('group-3','inquiry_limit','30');
INSERT INTO `aijiacms_setting` VALUES('group-3','type_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-3','homepage','0');
INSERT INTO `aijiacms_setting` VALUES('group-3','styleid','0');
INSERT INTO `aijiacms_setting` VALUES('group-3','home','0');
INSERT INTO `aijiacms_setting` VALUES('group-3','home_menu','0');
INSERT INTO `aijiacms_setting` VALUES('group-3','menu_c','0');
INSERT INTO `aijiacms_setting` VALUES('group-3','menu_d','0');
INSERT INTO `aijiacms_setting` VALUES('group-3','home_side','0');
INSERT INTO `aijiacms_setting` VALUES('group-3','side_c','0');
INSERT INTO `aijiacms_setting` VALUES('group-3','side_d','0');
INSERT INTO `aijiacms_setting` VALUES('group-3','home_main','0');
INSERT INTO `aijiacms_setting` VALUES('group-3','main_c','5');
INSERT INTO `aijiacms_setting` VALUES('group-3','main_d','5');
INSERT INTO `aijiacms_setting` VALUES('group-4','info_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-4','fee_mode','0');
INSERT INTO `aijiacms_setting` VALUES('group-4','fee','0');
INSERT INTO `aijiacms_setting` VALUES('group-4','discount','100');
INSERT INTO `aijiacms_setting` VALUES('group-4','grade','0');
INSERT INTO `aijiacms_setting` VALUES('group-4','editor','Basic');
INSERT INTO `aijiacms_setting` VALUES('group-4','upload','0');
INSERT INTO `aijiacms_setting` VALUES('group-4','uploadtype','');
INSERT INTO `aijiacms_setting` VALUES('group-4','uploadsize','500');
INSERT INTO `aijiacms_setting` VALUES('group-4','uploadlimit','5');
INSERT INTO `aijiacms_setting` VALUES('group-4','uploadday','10');
INSERT INTO `aijiacms_setting` VALUES('group-4','uploadpt','1');
INSERT INTO `aijiacms_setting` VALUES('group-4','check','1');
INSERT INTO `aijiacms_setting` VALUES('group-4','captcha','1');
INSERT INTO `aijiacms_setting` VALUES('group-4','question','1');
INSERT INTO `aijiacms_setting` VALUES('group-4','cash','0');
INSERT INTO `aijiacms_setting` VALUES('group-4','ask','0');
INSERT INTO `aijiacms_setting` VALUES('group-4','mail','0');
INSERT INTO `aijiacms_setting` VALUES('group-4','sms','0');
INSERT INTO `aijiacms_setting` VALUES('group-4','sendmail','0');
INSERT INTO `aijiacms_setting` VALUES('group-4','trade_pay','0');
INSERT INTO `aijiacms_setting` VALUES('group-4','trade_sell','0');
INSERT INTO `aijiacms_setting` VALUES('group-4','spread','0');
INSERT INTO `aijiacms_setting` VALUES('group-4','ad','0');
INSERT INTO `aijiacms_setting` VALUES('group-4','chat','1');
INSERT INTO `aijiacms_setting` VALUES('group-4','inbox_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-4','friend_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-4','favorite_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-4','alert_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-4','address_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-4','express_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-4','message_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-4','inquiry_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-4','price_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-4','type_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-4','homepage','0');
INSERT INTO `aijiacms_setting` VALUES('group-4','styleid','0');
INSERT INTO `aijiacms_setting` VALUES('group-4','home','0');
INSERT INTO `aijiacms_setting` VALUES('group-4','home_menu','0');
INSERT INTO `aijiacms_setting` VALUES('group-4','menu_c','0');
INSERT INTO `aijiacms_setting` VALUES('group-4','menu_d','0');
INSERT INTO `aijiacms_setting` VALUES('group-4','home_side','0');
INSERT INTO `aijiacms_setting` VALUES('group-4','side_c','0');
INSERT INTO `aijiacms_setting` VALUES('group-4','side_d','0');
INSERT INTO `aijiacms_setting` VALUES('group-6','fee_mode','0');
INSERT INTO `aijiacms_setting` VALUES('group-6','fee','0');
INSERT INTO `aijiacms_setting` VALUES('group-5','video_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-5','video_limit','3');
INSERT INTO `aijiacms_setting` VALUES('group-5','photo_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-5','photo_limit','3');
INSERT INTO `aijiacms_setting` VALUES('group-5','info_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-5','info_limit','3');
INSERT INTO `aijiacms_setting` VALUES('group-5','article_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-5','fee_mode','0');
INSERT INTO `aijiacms_setting` VALUES('group-5','fee','0');
INSERT INTO `aijiacms_setting` VALUES('group-5','discount','100');
INSERT INTO `aijiacms_setting` VALUES('group-5','grade','0');
INSERT INTO `aijiacms_setting` VALUES('group-5','editor','Simple');
INSERT INTO `aijiacms_setting` VALUES('group-5','upload','1');
INSERT INTO `aijiacms_setting` VALUES('group-5','uploadtype','');
INSERT INTO `aijiacms_setting` VALUES('group-5','uploadsize','');
INSERT INTO `aijiacms_setting` VALUES('group-5','uploadlimit','5');
INSERT INTO `aijiacms_setting` VALUES('group-5','uploadday','20');
INSERT INTO `aijiacms_setting` VALUES('group-5','maxitem','10');
INSERT INTO `aijiacms_setting` VALUES('group-5','swfu_max','5');
INSERT INTO `aijiacms_setting` VALUES('group-5','uploadpt','1');
INSERT INTO `aijiacms_setting` VALUES('group-5','check','1');
INSERT INTO `aijiacms_setting` VALUES('group-5','captcha','1');
INSERT INTO `aijiacms_setting` VALUES('group-5','question','1');
INSERT INTO `aijiacms_setting` VALUES('group-6','upload','1');
INSERT INTO `aijiacms_setting` VALUES('group-6','uploadtype','');
INSERT INTO `aijiacms_setting` VALUES('group-6','uploadsize','');
INSERT INTO `aijiacms_setting` VALUES('group-6','uploadlimit','10');
INSERT INTO `aijiacms_setting` VALUES('group-6','uploadday','100');
INSERT INTO `aijiacms_setting` VALUES('group-6','maxitem','15');
INSERT INTO `aijiacms_setting` VALUES('group-6','swfu_max','5');
INSERT INTO `aijiacms_setting` VALUES('group-6','uploadpt','0');
INSERT INTO `aijiacms_setting` VALUES('group-6','check','0');
INSERT INTO `aijiacms_setting` VALUES('group-6','captcha','0');
INSERT INTO `aijiacms_setting` VALUES('group-6','question','0');
INSERT INTO `aijiacms_setting` VALUES('group-6','cash','0');
INSERT INTO `aijiacms_setting` VALUES('group-7','fee_mode','0');
INSERT INTO `aijiacms_setting` VALUES('group-7','fee','0');
INSERT INTO `aijiacms_setting` VALUES('group-7','discount','100');
INSERT INTO `aijiacms_setting` VALUES('group-7','grade','0');
INSERT INTO `aijiacms_setting` VALUES('group-7','editor','Default');
INSERT INTO `aijiacms_setting` VALUES('group-7','upload','1');
INSERT INTO `aijiacms_setting` VALUES('group-7','uploadtype','');
INSERT INTO `aijiacms_setting` VALUES('group-7','uploadsize','3000');
INSERT INTO `aijiacms_setting` VALUES('group-7','uploadlimit','0');
INSERT INTO `aijiacms_setting` VALUES('group-7','uploadday','0');
INSERT INTO `aijiacms_setting` VALUES('group-7','maxitem','20');
INSERT INTO `aijiacms_setting` VALUES('group-7','swfu_max','8');
INSERT INTO `aijiacms_setting` VALUES('group-7','uploadpt','0');
INSERT INTO `aijiacms_setting` VALUES('group-7','check','0');
INSERT INTO `aijiacms_setting` VALUES('group-1','ad','1');
INSERT INTO `aijiacms_setting` VALUES('group-1','chat','1');
INSERT INTO `aijiacms_setting` VALUES('group-1','inbox_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-1','friend_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-1','favorite_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-1','alert_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-1','addmember_limit','');
INSERT INTO `aijiacms_setting` VALUES('group-5','cash','0');
INSERT INTO `aijiacms_setting` VALUES('group-5','ask','0');
INSERT INTO `aijiacms_setting` VALUES('group-5','mail','1');
INSERT INTO `aijiacms_setting` VALUES('group-5','sendmail','1');
INSERT INTO `aijiacms_setting` VALUES('group-5','trade_pay','0');
INSERT INTO `aijiacms_setting` VALUES('group-7','captcha','0');
INSERT INTO `aijiacms_setting` VALUES('group-7','question','0');
INSERT INTO `aijiacms_setting` VALUES('group-7','cash','0');
INSERT INTO `aijiacms_setting` VALUES('3','comment_user_del','4');
INSERT INTO `aijiacms_setting` VALUES('3','comment_admin_del','1');
INSERT INTO `aijiacms_setting` VALUES('3','comment_vote','1');
INSERT INTO `aijiacms_setting` VALUES('3','comment_min','5');
INSERT INTO `aijiacms_setting` VALUES('3','comment_time','1');
INSERT INTO `aijiacms_setting` VALUES('3','comment_max','500');
INSERT INTO `aijiacms_setting` VALUES('3','comment_pagesize','10');
INSERT INTO `aijiacms_setting` VALUES('3','comment_limit','30');
INSERT INTO `aijiacms_setting` VALUES('3','credit_add_comment','2');
INSERT INTO `aijiacms_setting` VALUES('3','credit_del_comment','5');
INSERT INTO `aijiacms_setting` VALUES('3','comment_am','网友');
INSERT INTO `aijiacms_setting` VALUES('3','guestbook_enable','1');
INSERT INTO `aijiacms_setting` VALUES('3','guestbook_domain','');
INSERT INTO `aijiacms_setting` VALUES('3','guestbook_captcha','1');
INSERT INTO `aijiacms_setting` VALUES('1','page_vote','');
INSERT INTO `aijiacms_setting` VALUES('group-6','ask','1');
INSERT INTO `aijiacms_setting` VALUES('group-6','mail','1');
INSERT INTO `aijiacms_setting` VALUES('18','seo_description_show','');
INSERT INTO `aijiacms_setting` VALUES('group-1','message_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-1','inquiry_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-1','type_limit','0');
INSERT INTO `aijiacms_setting` VALUES('pay-tenpay','notify','');
INSERT INTO `aijiacms_setting` VALUES('2','cate_max','6');
INSERT INTO `aijiacms_setting` VALUES('2','introduce_save','0');
INSERT INTO `aijiacms_setting` VALUES('2','thumb_width','180');
INSERT INTO `aijiacms_setting` VALUES('2','thumb_height','180');
INSERT INTO `aijiacms_setting` VALUES('2','introduce_length','0');
INSERT INTO `aijiacms_setting` VALUES('2','introduce_clear','0');
INSERT INTO `aijiacms_setting` VALUES('group-6','sendmail','1');
INSERT INTO `aijiacms_setting` VALUES('group-6','trade_pay','1');
INSERT INTO `aijiacms_setting` VALUES('group-6','trade_sell','1');
INSERT INTO `aijiacms_setting` VALUES('group-5','trade_sell','0');
INSERT INTO `aijiacms_setting` VALUES('group-5','spread','0');
INSERT INTO `aijiacms_setting` VALUES('group-5','ad','1');
INSERT INTO `aijiacms_setting` VALUES('group-5','chat','1');
INSERT INTO `aijiacms_setting` VALUES('group-5','inbox_limit','20');
INSERT INTO `aijiacms_setting` VALUES('group-5','friend_limit','10');
INSERT INTO `aijiacms_setting` VALUES('group-1','homepage','1');
INSERT INTO `aijiacms_setting` VALUES('group-1','styleid','0');
INSERT INTO `aijiacms_setting` VALUES('group-6','spread','1');
INSERT INTO `aijiacms_setting` VALUES('group-6','ad','1');
INSERT INTO `aijiacms_setting` VALUES('group-6','chat','1');
INSERT INTO `aijiacms_setting` VALUES('group-1','home','1');
INSERT INTO `aijiacms_setting` VALUES('group-6','inbox_limit','50');
INSERT INTO `aijiacms_setting` VALUES('group-6','friend_limit','50');
INSERT INTO `aijiacms_setting` VALUES('group-7','ask','1');
INSERT INTO `aijiacms_setting` VALUES('group-7','mail','1');
INSERT INTO `aijiacms_setting` VALUES('group-7','sendmail','1');
INSERT INTO `aijiacms_setting` VALUES('group-7','trade_pay','0');
INSERT INTO `aijiacms_setting` VALUES('group-7','trade_sell','1');
INSERT INTO `aijiacms_setting` VALUES('group-7','spread','1');
INSERT INTO `aijiacms_setting` VALUES('18','seo_title_search','');
INSERT INTO `aijiacms_setting` VALUES('18','seo_keywords_search','');
INSERT INTO `aijiacms_setting` VALUES('6','fee_mode','1');
INSERT INTO `aijiacms_setting` VALUES('1','message_type','0,1,2,3,4');
INSERT INTO `aijiacms_setting` VALUES('group-1','home_menu','1');
INSERT INTO `aijiacms_setting` VALUES('group-9','newhouse_free_limit','10');
INSERT INTO `aijiacms_setting` VALUES('group-9','newhouse_limit','50');
INSERT INTO `aijiacms_setting` VALUES('group-9','edit_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-9','refresh_limit','60');
INSERT INTO `aijiacms_setting` VALUES('group-9','day_limit','10');
INSERT INTO `aijiacms_setting` VALUES('group-9','add_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-9','copy','1');
INSERT INTO `aijiacms_setting` VALUES('group-9','delete','1');
INSERT INTO `aijiacms_setting` VALUES('group-9','vcompany','0');
INSERT INTO `aijiacms_setting` VALUES('group-9','vtruename','0');
INSERT INTO `aijiacms_setting` VALUES('group-9','vmobile','0');
INSERT INTO `aijiacms_setting` VALUES('group-9','vemail','0');
INSERT INTO `aijiacms_setting` VALUES('group-9','moduleids','6,5,7,8,16,15,13,9,-9,10,12,14');
INSERT INTO `aijiacms_setting` VALUES('group-9','link_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-9','honor_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-9','page_limit','5');
INSERT INTO `aijiacms_setting` VALUES('group-9','news_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-9','kf','1');
INSERT INTO `aijiacms_setting` VALUES('group-9','stats','1');
INSERT INTO `aijiacms_setting` VALUES('group-9','map','1');
INSERT INTO `aijiacms_setting` VALUES('group-9','style','1');
INSERT INTO `aijiacms_setting` VALUES('group-9','main_d','0,1,2,3,7');
INSERT INTO `aijiacms_setting` VALUES('group-9','main_c','0,1,2,3,4,5,7');
INSERT INTO `aijiacms_setting` VALUES('group-9','home_main','1');
INSERT INTO `aijiacms_setting` VALUES('group-9','side_d','0,1,2,4,6');
INSERT INTO `aijiacms_setting` VALUES('group-9','side_c','0,1,2,3,4,5,6');
INSERT INTO `aijiacms_setting` VALUES('group-9','home_side','1');
INSERT INTO `aijiacms_setting` VALUES('group-9','menu_d','0,1,2,3,4,5,6,7,8,9,10,11,12');
INSERT INTO `aijiacms_setting` VALUES('group-9','menu_c','0,1,2,3,4,5,6,7,8,9,10,11,12');
INSERT INTO `aijiacms_setting` VALUES('group-9','home_menu','1');
INSERT INTO `aijiacms_setting` VALUES('group-9','home','1');
INSERT INTO `aijiacms_setting` VALUES('group-9','styleid','2');
INSERT INTO `aijiacms_setting` VALUES('group-9','homepage','1');
INSERT INTO `aijiacms_setting` VALUES('group-9','type_limit','20');
INSERT INTO `aijiacms_setting` VALUES('group-9','price_limit','20');
INSERT INTO `aijiacms_setting` VALUES('group-9','inquiry_limit','50');
INSERT INTO `aijiacms_setting` VALUES('group-9','message_limit','100');
INSERT INTO `aijiacms_setting` VALUES('group-9','alert_limit','10');
INSERT INTO `aijiacms_setting` VALUES('group-9','favorite_limit','100');
INSERT INTO `aijiacms_setting` VALUES('group-9','friend_limit','200');
INSERT INTO `aijiacms_setting` VALUES('group-9','inbox_limit','500');
INSERT INTO `aijiacms_setting` VALUES('group-9','chat','1');
INSERT INTO `aijiacms_setting` VALUES('group-9','ad','1');
INSERT INTO `aijiacms_setting` VALUES('group-9','spread','1');
INSERT INTO `aijiacms_setting` VALUES('group-9','trade_sell','1');
INSERT INTO `aijiacms_setting` VALUES('group-9','trade_pay','1');
INSERT INTO `aijiacms_setting` VALUES('group-9','sendmail','1');
INSERT INTO `aijiacms_setting` VALUES('group-9','sms','1');
INSERT INTO `aijiacms_setting` VALUES('group-9','mail','1');
INSERT INTO `aijiacms_setting` VALUES('group-9','ask','1');
INSERT INTO `aijiacms_setting` VALUES('group-9','question','0');
INSERT INTO `aijiacms_setting` VALUES('group-9','captcha','0');
INSERT INTO `aijiacms_setting` VALUES('group-9','check','0');
INSERT INTO `aijiacms_setting` VALUES('group-9','uploadpt','0');
INSERT INTO `aijiacms_setting` VALUES('group-9','uploadday','');
INSERT INTO `aijiacms_setting` VALUES('group-9','uploadlimit','');
INSERT INTO `aijiacms_setting` VALUES('group-9','uploadsize','');
INSERT INTO `aijiacms_setting` VALUES('group-9','uploadtype','');
INSERT INTO `aijiacms_setting` VALUES('group-9','upload','1');
INSERT INTO `aijiacms_setting` VALUES('group-9','editor','Aijiacms');
INSERT INTO `aijiacms_setting` VALUES('group-9','reg','0');
INSERT INTO `aijiacms_setting` VALUES('group-9','grade','1');
INSERT INTO `aijiacms_setting` VALUES('group-9','discount','100');
INSERT INTO `aijiacms_setting` VALUES('group-9','fee','2000');
INSERT INTO `aijiacms_setting` VALUES('group-9','fee_mode','1');
INSERT INTO `aijiacms_setting` VALUES('18','seo_description_search','');
INSERT INTO `aijiacms_setting` VALUES('18','captcha_inquiry','0');
INSERT INTO `aijiacms_setting` VALUES('18','question_inquiry','0');
INSERT INTO `aijiacms_setting` VALUES('18','check_add','0');
INSERT INTO `aijiacms_setting` VALUES('group-1','menu_c','0,1,2,3,4,5,6,7,8,9,10,11');
INSERT INTO `aijiacms_setting` VALUES('group-1','menu_d','0,1,2,3,6,7,11,12');
INSERT INTO `aijiacms_setting` VALUES('group-1','home_side','1');
INSERT INTO `aijiacms_setting` VALUES('group-1','side_c','0,3,6');
INSERT INTO `aijiacms_setting` VALUES('group-1','side_d','0,3,6');
INSERT INTO `aijiacms_setting` VALUES('group-1','home_main','1');
INSERT INTO `aijiacms_setting` VALUES('15','seo_keywords_show','');
INSERT INTO `aijiacms_setting` VALUES('15','seo_title_show','');
INSERT INTO `aijiacms_setting` VALUES('15','seo_description_list','');
INSERT INTO `aijiacms_setting` VALUES('3','guestbook_type','业务合作|意见建议|使用问题|页面错误|不良信息|其他');
INSERT INTO `aijiacms_setting` VALUES('3','gift_enable','1');
INSERT INTO `aijiacms_setting` VALUES('3','gift_domain','');
INSERT INTO `aijiacms_setting` VALUES('3','vote_enable','1');
INSERT INTO `aijiacms_setting` VALUES('3','vote_domain','');
INSERT INTO `aijiacms_setting` VALUES('3','vote_group','3,5,6,7,8');
INSERT INTO `aijiacms_setting` VALUES('3','poll_enable','1');
INSERT INTO `aijiacms_setting` VALUES('3','poll_domain','');
INSERT INTO `aijiacms_setting` VALUES('3','poll_group','3,5,6,7');
INSERT INTO `aijiacms_setting` VALUES('group-5','favorite_limit','20');
INSERT INTO `aijiacms_setting` VALUES('group-5','alert_limit','3');
INSERT INTO `aijiacms_setting` VALUES('group-5','addmember_limit','');
INSERT INTO `aijiacms_setting` VALUES('group-8','uploadsize','');
INSERT INTO `aijiacms_setting` VALUES('group-7','ad','1');
INSERT INTO `aijiacms_setting` VALUES('group-7','chat','1');
INSERT INTO `aijiacms_setting` VALUES('pay-tenpay','percent','1');
INSERT INTO `aijiacms_setting` VALUES('2','page_save','0');
INSERT INTO `aijiacms_setting` VALUES('2','page_check','2');
INSERT INTO `aijiacms_setting` VALUES('2','news_clear','0');
INSERT INTO `aijiacms_setting` VALUES('2','news_save','0');
INSERT INTO `aijiacms_setting` VALUES('2','news_check','2');
INSERT INTO `aijiacms_setting` VALUES('2','credit_check','2');
INSERT INTO `aijiacms_setting` VALUES('2','page_clear','0');
INSERT INTO `aijiacms_setting` VALUES('2','credit_save','0');
INSERT INTO `aijiacms_setting` VALUES('2','credit_clear','0');
INSERT INTO `aijiacms_setting` VALUES('2','pay_url','http://www.aijiacms.com');
INSERT INTO `aijiacms_setting` VALUES('group-9','sell_limit','100');
INSERT INTO `aijiacms_setting` VALUES('group-9','sell_free_limit','50');
INSERT INTO `aijiacms_setting` VALUES('group-9','rent_limit','100');
INSERT INTO `aijiacms_setting` VALUES('group-9','rent_free_limit','10');
INSERT INTO `aijiacms_setting` VALUES('group-9','buy_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-9','buy_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-9','group_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-9','group_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-9','job_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-9','job_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-9','resume_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-9','resume_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-9','article_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-9','article_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-9','info_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-9','info_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-9','know_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-9','know_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-9','photo_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-9','photo_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-9','video_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-9','video_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('1','message_time','60');
INSERT INTO `aijiacms_setting` VALUES('5','inquiry_ask','我对贵公司的房源非常感兴趣，能否发一些详细资料给我参考？|请您发一份比较详细的房源规格说明，谢谢！|我有意购买此房源，希望登记现场看房？|我对该房源比较感兴趣,请电话联系我！');
INSERT INTO `aijiacms_setting` VALUES('5','sphinx','0');
INSERT INTO `aijiacms_setting` VALUES('5','sphinx_host','');
INSERT INTO `aijiacms_setting` VALUES('5','split','0');
INSERT INTO `aijiacms_setting` VALUES('5','keylink','0');
INSERT INTO `aijiacms_setting` VALUES('5','clear_link','0');
INSERT INTO `aijiacms_setting` VALUES('5','sphinx_port','');
INSERT INTO `aijiacms_setting` VALUES('6','check_add','2');
INSERT INTO `aijiacms_setting` VALUES('18','captcha_add','0');
INSERT INTO `aijiacms_setting` VALUES('7','type','个人|中介');
INSERT INTO `aijiacms_setting` VALUES('6','captcha_add','1');
INSERT INTO `aijiacms_setting` VALUES('4','seo_keywords_list','');
INSERT INTO `aijiacms_setting` VALUES('4','seo_description_list','');
INSERT INTO `aijiacms_setting` VALUES('group-8','uploadtype','');
INSERT INTO `aijiacms_setting` VALUES('group-8','uploadlimit','');
INSERT INTO `aijiacms_setting` VALUES('group-8','uploadday','');
INSERT INTO `aijiacms_setting` VALUES('group-8','uploadpt','0');
INSERT INTO `aijiacms_setting` VALUES('group-8','captcha','0');
INSERT INTO `aijiacms_setting` VALUES('group-8','check','0');
INSERT INTO `aijiacms_setting` VALUES('group-8','question','0');
INSERT INTO `aijiacms_setting` VALUES('group-8','cash','0');
INSERT INTO `aijiacms_setting` VALUES('1','message_group','6,7');
INSERT INTO `aijiacms_setting` VALUES('group-6','favorite_limit','50');
INSERT INTO `aijiacms_setting` VALUES('group-6','alert_limit','5');
INSERT INTO `aijiacms_setting` VALUES('group-6','addmember_limit','');
INSERT INTO `aijiacms_setting` VALUES('1','message_email','0');
INSERT INTO `aijiacms_setting` VALUES('4','seo_description_index','');
INSERT INTO `aijiacms_setting` VALUES('4','seo_title_list','{分类名称}{分类SEO标题}{页码}{模块名称}{分隔符}{网站名称}');
INSERT INTO `aijiacms_setting` VALUES('17','order','editdate desc,vip desc,edittime desc');
INSERT INTO `aijiacms_setting` VALUES('17','editor','Default');
INSERT INTO `aijiacms_setting` VALUES('17','introduce_length','');
INSERT INTO `aijiacms_setting` VALUES('17','thumb_height','');
INSERT INTO `aijiacms_setting` VALUES('17','thumb_width','');
INSERT INTO `aijiacms_setting` VALUES('2','mincharge','0');
INSERT INTO `aijiacms_setting` VALUES('2','link_check','2');
INSERT INTO `aijiacms_setting` VALUES('2','pay_online','1');
INSERT INTO `aijiacms_setting` VALUES('2','cash_banks','招商银行|中国工商银行|中国农业银行|中国建设银行|中国交通银行|中国银行|邮政储蓄|贝宝|支付宝|财付通');
INSERT INTO `aijiacms_setting` VALUES('2','cash_enable','0');
INSERT INTO `aijiacms_setting` VALUES('2','cash_times','3');
INSERT INTO `aijiacms_setting` VALUES('2','cash_min','50');
INSERT INTO `aijiacms_setting` VALUES('2','cash_max','10000');
INSERT INTO `aijiacms_setting` VALUES('2','cash_fee','1');
INSERT INTO `aijiacms_setting` VALUES('2','cash_fee_min','1');
INSERT INTO `aijiacms_setting` VALUES('2','cash_fee_max','50');
INSERT INTO `aijiacms_setting` VALUES('5','sphinx_name','aijiacms,delta');
INSERT INTO `aijiacms_setting` VALUES('5','fulltext','0');
INSERT INTO `aijiacms_setting` VALUES('5','level','推荐信息');
INSERT INTO `aijiacms_setting` VALUES('5','swfu','1');
INSERT INTO `aijiacms_setting` VALUES('6','group_refresh','3,5,6,7,8');
INSERT INTO `aijiacms_setting` VALUES('6','captcha_inquiry','0');
INSERT INTO `aijiacms_setting` VALUES('6','question_inquiry','0');
INSERT INTO `aijiacms_setting` VALUES('8','page_lrecimg','2');
INSERT INTO `aijiacms_setting` VALUES('5','upload_thumb','0');
INSERT INTO `aijiacms_setting` VALUES('5','pagesize','12');
INSERT INTO `aijiacms_setting` VALUES('5','max_width','900');
INSERT INTO `aijiacms_setting` VALUES('5','page_subcat','5');
INSERT INTO `aijiacms_setting` VALUES('5','index_html','0');
INSERT INTO `aijiacms_setting` VALUES('group-6','message_limit','20');
INSERT INTO `aijiacms_setting` VALUES('group-6','inquiry_limit','10');
INSERT INTO `aijiacms_setting` VALUES('group-6','type_limit','10');
INSERT INTO `aijiacms_setting` VALUES('group-6','homepage','1');
INSERT INTO `aijiacms_setting` VALUES('group-6','styleid','6');
INSERT INTO `aijiacms_setting` VALUES('group-7','inbox_limit','500');
INSERT INTO `aijiacms_setting` VALUES('group-7','friend_limit','200');
INSERT INTO `aijiacms_setting` VALUES('group-7','favorite_limit','100');
INSERT INTO `aijiacms_setting` VALUES('group-7','alert_limit','10');
INSERT INTO `aijiacms_setting` VALUES('group-7','addmember_limit','100');
INSERT INTO `aijiacms_setting` VALUES('group-7','message_limit','100');
INSERT INTO `aijiacms_setting` VALUES('group-7','inquiry_limit','50');
INSERT INTO `aijiacms_setting` VALUES('group-7','type_limit','20');
INSERT INTO `aijiacms_setting` VALUES('group-7','homepage','1');
INSERT INTO `aijiacms_setting` VALUES('group-7','styleid','5');
INSERT INTO `aijiacms_setting` VALUES('group-7','home','1');
INSERT INTO `aijiacms_setting` VALUES('group-7','home_menu','1');
INSERT INTO `aijiacms_setting` VALUES('group-8','ask','1');
INSERT INTO `aijiacms_setting` VALUES('group-8','mail','1');
INSERT INTO `aijiacms_setting` VALUES('group-8','sms','1');
INSERT INTO `aijiacms_setting` VALUES('group-8','sendmail','1');
INSERT INTO `aijiacms_setting` VALUES('group-8','trade_sell','1');
INSERT INTO `aijiacms_setting` VALUES('group-8','spread','1');
INSERT INTO `aijiacms_setting` VALUES('group-8','ad','1');
INSERT INTO `aijiacms_setting` VALUES('group-8','chat','1');
INSERT INTO `aijiacms_setting` VALUES('group-8','inbox_limit','500');
INSERT INTO `aijiacms_setting` VALUES('group-8','friend_limit','200');
INSERT INTO `aijiacms_setting` VALUES('group-8','favorite_limit','100');
INSERT INTO `aijiacms_setting` VALUES('group-8','inquiry_limit','50');
INSERT INTO `aijiacms_setting` VALUES('group-8','message_limit','100');
INSERT INTO `aijiacms_setting` VALUES('group-8','express_limit','5');
INSERT INTO `aijiacms_setting` VALUES('group-8','address_limit','10');
INSERT INTO `aijiacms_setting` VALUES('group-8','alert_limit','10');
INSERT INTO `aijiacms_setting` VALUES('group-8','price_limit','20');
INSERT INTO `aijiacms_setting` VALUES('group-8','type_limit','20');
INSERT INTO `aijiacms_setting` VALUES('group-6','home','0');
INSERT INTO `aijiacms_setting` VALUES('group-6','home_menu','0');
INSERT INTO `aijiacms_setting` VALUES('group-6','menu_c','1,2,11');
INSERT INTO `aijiacms_setting` VALUES('group-6','menu_d','1,2,11');
INSERT INTO `aijiacms_setting` VALUES('group-6','home_side','0');
INSERT INTO `aijiacms_setting` VALUES('group-6','side_c','0,6');
INSERT INTO `aijiacms_setting` VALUES('group-7','menu_c','1,2,3');
INSERT INTO `aijiacms_setting` VALUES('group-7','menu_d','1,2,3');
INSERT INTO `aijiacms_setting` VALUES('group-7','home_side','1');
INSERT INTO `aijiacms_setting` VALUES('group-7','side_c','0,3,6');
INSERT INTO `aijiacms_setting` VALUES('group-7','side_d','0,3,6');
INSERT INTO `aijiacms_setting` VALUES('group-8','homepage','1');
INSERT INTO `aijiacms_setting` VALUES('group-8','styleid','5');
INSERT INTO `aijiacms_setting` VALUES('group-8','home','1');
INSERT INTO `aijiacms_setting` VALUES('group-8','home_menu','1');
INSERT INTO `aijiacms_setting` VALUES('group-8','menu_c','0,4,5,6,7,10,11,12,13');
INSERT INTO `aijiacms_setting` VALUES('group-8','menu_d','0,4,5,6,7,8,10,11,12,13');
INSERT INTO `aijiacms_setting` VALUES('group-8','home_side','1');
INSERT INTO `aijiacms_setting` VALUES('group-8','side_c','0,1,2,3,4,5,6');
INSERT INTO `aijiacms_setting` VALUES('group-8','side_d','0,1,2,4,6');
INSERT INTO `aijiacms_setting` VALUES('group-8','home_main','1');
INSERT INTO `aijiacms_setting` VALUES('group-8','main_c','0,1,7');
INSERT INTO `aijiacms_setting` VALUES('group-8','main_d','0,1,7');
INSERT INTO `aijiacms_setting` VALUES('group-8','style','1');
INSERT INTO `aijiacms_setting` VALUES('group-8','map','1');
INSERT INTO `aijiacms_setting` VALUES('group-8','stats','1');
INSERT INTO `aijiacms_setting` VALUES('group-8','kf','1');
INSERT INTO `aijiacms_setting` VALUES('group-8','news_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-8','page_limit','5');
INSERT INTO `aijiacms_setting` VALUES('group-8','honor_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-8','moduleids','6,8,15,9,10,12,14');
INSERT INTO `aijiacms_setting` VALUES('1','mail_name','');
INSERT INTO `aijiacms_setting` VALUES('5','list_html','0');
INSERT INTO `aijiacms_setting` VALUES('5','htm_list_prefix','');
INSERT INTO `aijiacms_setting` VALUES('5','htm_list_urlid','2');
INSERT INTO `aijiacms_setting` VALUES('8','page_lrec','5');
INSERT INTO `aijiacms_setting` VALUES('8','page_lhits','5');
INSERT INTO `aijiacms_setting` VALUES('5','htm_item_prefix','');
INSERT INTO `aijiacms_setting` VALUES('5','show_html','0');
INSERT INTO `aijiacms_setting` VALUES('5','php_list_urlid','0');
INSERT INTO `aijiacms_setting` VALUES('5','htm_item_urlid','1');
INSERT INTO `aijiacms_setting` VALUES('5','php_item_urlid','3');
INSERT INTO `aijiacms_setting` VALUES('7','inquiry_ask','我对贵公司的房源非常感兴趣，能否发一些详细资料给我参考？|请您发一份比较详细的房源规格说明，谢谢！|我有意购买此房源，希望登记现场看房？|我对该房源比较感兴趣,请电话联系我！');
INSERT INTO `aijiacms_setting` VALUES('7','cat_property','0');
INSERT INTO `aijiacms_setting` VALUES('7','save_remotepic','0');
INSERT INTO `aijiacms_setting` VALUES('7','clear_link','0');
INSERT INTO `aijiacms_setting` VALUES('7','keylink','0');
INSERT INTO `aijiacms_setting` VALUES('7','split','0');
INSERT INTO `aijiacms_setting` VALUES('7','sphinx','0');
INSERT INTO `aijiacms_setting` VALUES('7','sphinx_host','');
INSERT INTO `aijiacms_setting` VALUES('7','sphinx_port','');
INSERT INTO `aijiacms_setting` VALUES('7','sphinx_name','');
INSERT INTO `aijiacms_setting` VALUES('7','fulltext','0');
INSERT INTO `aijiacms_setting` VALUES('7','pagesize','16');
INSERT INTO `aijiacms_setting` VALUES('7','upload_thumb','0');
INSERT INTO `aijiacms_setting` VALUES('4','seo_keywords_index','');
INSERT INTO `aijiacms_setting` VALUES('4','php_list_urlid','3');
INSERT INTO `aijiacms_setting` VALUES('4','seo_title_index','{模块名称}{分隔符}{页码}{网站名称}');
INSERT INTO `aijiacms_setting` VALUES('8','page_srelate','5');
INSERT INTO `aijiacms_setting` VALUES('8','page_srecimg','4');
INSERT INTO `aijiacms_setting` VALUES('8','page_srec','4');
INSERT INTO `aijiacms_setting` VALUES('1','mail_log','0');
INSERT INTO `aijiacms_setting` VALUES('4','htm_list_urlid','0');
INSERT INTO `aijiacms_setting` VALUES('group-8','link_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-8','vemail','0');
INSERT INTO `aijiacms_setting` VALUES('group-8','vtruename','0');
INSERT INTO `aijiacms_setting` VALUES('group-8','vmobile','0');
INSERT INTO `aijiacms_setting` VALUES('group-8','vcompany','0');
INSERT INTO `aijiacms_setting` VALUES('group-8','delete','1');
INSERT INTO `aijiacms_setting` VALUES('group-7','home_main','1');
INSERT INTO `aijiacms_setting` VALUES('group-7','main_c','2,3,4');
INSERT INTO `aijiacms_setting` VALUES('group-7','main_d','0,2,3,4');
INSERT INTO `aijiacms_setting` VALUES('group-7','style','1');
INSERT INTO `aijiacms_setting` VALUES('4','htm_list_prefix','');
INSERT INTO `aijiacms_setting` VALUES('4','list_html','0');
INSERT INTO `aijiacms_setting` VALUES('4','index_html','0');
INSERT INTO `aijiacms_setting` VALUES('4','page_irec','10');
INSERT INTO `aijiacms_setting` VALUES('4','page_ivip','10');
INSERT INTO `aijiacms_setting` VALUES('15','seo_title_index','');
INSERT INTO `aijiacms_setting` VALUES('15','seo_keywords_index','');
INSERT INTO `aijiacms_setting` VALUES('15','seo_description_index','');
INSERT INTO `aijiacms_setting` VALUES('15','seo_title_list','');
INSERT INTO `aijiacms_setting` VALUES('15','seo_keywords_list','');
INSERT INTO `aijiacms_setting` VALUES('15','php_item_urlid','3');
INSERT INTO `aijiacms_setting` VALUES('15','htm_item_urlid','0');
INSERT INTO `aijiacms_setting` VALUES('12','group_index','3,5,6,7');
INSERT INTO `aijiacms_setting` VALUES('12','seo_keywords_show','');
INSERT INTO `aijiacms_setting` VALUES('12','seo_description_show','');
INSERT INTO `aijiacms_setting` VALUES('12','seo_description_list','');
INSERT INTO `aijiacms_setting` VALUES('1','mail_sender','');
INSERT INTO `aijiacms_setting` VALUES('1','mail_sign','');
INSERT INTO `aijiacms_setting` VALUES('2','trade_day','10');
INSERT INTO `aijiacms_setting` VALUES('2','trade_send','10');
INSERT INTO `aijiacms_setting` VALUES('group-5','message_limit','10');
INSERT INTO `aijiacms_setting` VALUES('group-5','inquiry_limit','3');
INSERT INTO `aijiacms_setting` VALUES('group-5','type_limit','10');
INSERT INTO `aijiacms_setting` VALUES('group-5','homepage','0');
INSERT INTO `aijiacms_setting` VALUES('group-5','styleid','0');
INSERT INTO `aijiacms_setting` VALUES('group-5','home','0');
INSERT INTO `aijiacms_setting` VALUES('group-5','home_menu','0');
INSERT INTO `aijiacms_setting` VALUES('group-6','side_d','0,4,6');
INSERT INTO `aijiacms_setting` VALUES('group-6','home_main','0');
INSERT INTO `aijiacms_setting` VALUES('group-6','main_c','0,2,3');
INSERT INTO `aijiacms_setting` VALUES('group-7','map','1');
INSERT INTO `aijiacms_setting` VALUES('group-7','stats','1');
INSERT INTO `aijiacms_setting` VALUES('group-7','kf','1');
INSERT INTO `aijiacms_setting` VALUES('group-7','news_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-6','main_d','0,2,3');
INSERT INTO `aijiacms_setting` VALUES('group-6','style','0');
INSERT INTO `aijiacms_setting` VALUES('group-6','map','1');
INSERT INTO `aijiacms_setting` VALUES('group-6','stats','1');
INSERT INTO `aijiacms_setting` VALUES('group-6','kf','0');
INSERT INTO `aijiacms_setting` VALUES('group-6','news_limit','20');
INSERT INTO `aijiacms_setting` VALUES('group-6','page_limit','5');
INSERT INTO `aijiacms_setting` VALUES('group-7','page_limit','5');
INSERT INTO `aijiacms_setting` VALUES('group-7','honor_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-7','link_limit','6');
INSERT INTO `aijiacms_setting` VALUES('group-7','moduleids','5,7,16');
INSERT INTO `aijiacms_setting` VALUES('group-7','vemail','0');
INSERT INTO `aijiacms_setting` VALUES('group-7','vmobile','0');
INSERT INTO `aijiacms_setting` VALUES('1','smtp_pass','');
INSERT INTO `aijiacms_setting` VALUES('1','smtp_user','');
INSERT INTO `aijiacms_setting` VALUES('6','group_color','3,5,6,7,8');
INSERT INTO `aijiacms_setting` VALUES('6','group_search','3,5,6,7,8');
INSERT INTO `aijiacms_setting` VALUES('6','group_list','3,5,6,7,8');
INSERT INTO `aijiacms_setting` VALUES('6','group_show','3,5,6,7,8');
INSERT INTO `aijiacms_setting` VALUES('6','group_contact','3,5,6,7,8');
INSERT INTO `aijiacms_setting` VALUES('6','group_index','3,5,6,7,8');
INSERT INTO `aijiacms_setting` VALUES('6','seo_keywords_show','');
INSERT INTO `aijiacms_setting` VALUES('1','smtp_auth','1');
INSERT INTO `aijiacms_setting` VALUES('1','smtp_host','');
INSERT INTO `aijiacms_setting` VALUES('1','smtp_port','25');
INSERT INTO `aijiacms_setting` VALUES('1','mail_delimiter','1');
INSERT INTO `aijiacms_setting` VALUES('1','mail_type','close');
INSERT INTO `aijiacms_setting` VALUES('7','swfu','0');
INSERT INTO `aijiacms_setting` VALUES('7','level','推荐信息');
INSERT INTO `aijiacms_setting` VALUES('7','max_width','900');
INSERT INTO `aijiacms_setting` VALUES('7','page_subcat','');
INSERT INTO `aijiacms_setting` VALUES('7','index_html','0');
INSERT INTO `aijiacms_setting` VALUES('7','list_html','0');
INSERT INTO `aijiacms_setting` VALUES('7','htm_list_prefix','');
INSERT INTO `aijiacms_setting` VALUES('16','fee_add','');
INSERT INTO `aijiacms_setting` VALUES('16','fee_currency','money');
INSERT INTO `aijiacms_setting` VALUES('16','check_add','0');
INSERT INTO `aijiacms_setting` VALUES('16','captcha_add','0');
INSERT INTO `aijiacms_setting` VALUES('16','question_add','0');
INSERT INTO `aijiacms_setting` VALUES('16','fee_mode','0');
INSERT INTO `aijiacms_setting` VALUES('aijiacms','backtime','1368426674');
INSERT INTO `aijiacms_setting` VALUES('3','survey_enable','0');
INSERT INTO `aijiacms_setting` VALUES('1','max_image','800');
INSERT INTO `aijiacms_setting` VALUES('1','thumb_title','0');
INSERT INTO `aijiacms_setting` VALUES('1','thumb_album','0');
INSERT INTO `aijiacms_setting` VALUES('1','middle_h','180');
INSERT INTO `aijiacms_setting` VALUES('8','page_shits','4');
INSERT INTO `aijiacms_setting` VALUES('8','max_width','450');
INSERT INTO `aijiacms_setting` VALUES('8','show_np','1');
INSERT INTO `aijiacms_setting` VALUES('8','index_html','0');
INSERT INTO `aijiacms_setting` VALUES('8','list_html','0');
INSERT INTO `aijiacms_setting` VALUES('8','htm_list_prefix','');
INSERT INTO `aijiacms_setting` VALUES('8','htm_list_urlid','0');
INSERT INTO `aijiacms_setting` VALUES('8','php_list_urlid','3');
INSERT INTO `aijiacms_setting` VALUES('8','show_html','0');
INSERT INTO `aijiacms_setting` VALUES('8','htm_item_prefix','zixx');
INSERT INTO `aijiacms_setting` VALUES('8','htm_item_urlid','0');
INSERT INTO `aijiacms_setting` VALUES('8','php_item_urlid','3');
INSERT INTO `aijiacms_setting` VALUES('8','seo_title_index','');
INSERT INTO `aijiacms_setting` VALUES('8','seo_keywords_index','');
INSERT INTO `aijiacms_setting` VALUES('5','seo_title_index','{模块名称}{分隔符}{页码}{网站名称}');
INSERT INTO `aijiacms_setting` VALUES('5','seo_keywords_index','');
INSERT INTO `aijiacms_setting` VALUES('5','seo_description_index','');
INSERT INTO `aijiacms_setting` VALUES('5','seo_title_list','{分类名称}{分类SEO标题}{页码}{模块名称}{分隔符}{网站名称}');
INSERT INTO `aijiacms_setting` VALUES('5','seo_keywords_list','');
INSERT INTO `aijiacms_setting` VALUES('5','seo_description_list','');
INSERT INTO `aijiacms_setting` VALUES('group-8','copy','1');
INSERT INTO `aijiacms_setting` VALUES('group-8','add_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-8','day_limit','10');
INSERT INTO `aijiacms_setting` VALUES('group-8','refresh_limit','60');
INSERT INTO `aijiacms_setting` VALUES('group-8','edit_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-8','sell_limit','10');
INSERT INTO `aijiacms_setting` VALUES('group-8','sell_free_limit','5');
INSERT INTO `aijiacms_setting` VALUES('group-8','buy_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-8','buy_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-8','mall_limit','5');
INSERT INTO `aijiacms_setting` VALUES('group-8','mall_free_limit','1');
INSERT INTO `aijiacms_setting` VALUES('group-8','group_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-8','group_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-8','exhibit_limit','5');
INSERT INTO `aijiacms_setting` VALUES('group-8','exhibit_free_limit','1');
INSERT INTO `aijiacms_setting` VALUES('group-8','quote_limit','5');
INSERT INTO `aijiacms_setting` VALUES('group-8','quote_free_limit','1');
INSERT INTO `aijiacms_setting` VALUES('group-8','job_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-8','job_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-8','resume_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-8','reg','0');
INSERT INTO `aijiacms_setting` VALUES('group-8','listorder','6');
INSERT INTO `aijiacms_setting` VALUES('group-8','vip','0');
INSERT INTO `aijiacms_setting` VALUES('group-8','groupname','企业会员');
INSERT INTO `aijiacms_setting` VALUES('group-8','groupid','6');
INSERT INTO `aijiacms_setting` VALUES('group-7','vtruename','0');
INSERT INTO `aijiacms_setting` VALUES('group-7','vcompany','0');
INSERT INTO `aijiacms_setting` VALUES('group-7','delete','1');
INSERT INTO `aijiacms_setting` VALUES('group-7','copy','1');
INSERT INTO `aijiacms_setting` VALUES('group-7','add_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-7','day_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-7','refresh_limit','60');
INSERT INTO `aijiacms_setting` VALUES('group-7','edit_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-7','newhouse_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-7','newhouse_free_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-7','sell_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-7','sell_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-7','rent_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-7','rent_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-6','honor_limit','10');
INSERT INTO `aijiacms_setting` VALUES('group-6','link_limit','20');
INSERT INTO `aijiacms_setting` VALUES('group-6','moduleids','5,7,8');
INSERT INTO `aijiacms_setting` VALUES('group-6','vemail','0');
INSERT INTO `aijiacms_setting` VALUES('group-6','vmobile','0');
INSERT INTO `aijiacms_setting` VALUES('group-6','vtruename','0');
INSERT INTO `aijiacms_setting` VALUES('group-6','vcompany','0');
INSERT INTO `aijiacms_setting` VALUES('group-6','delete','1');
INSERT INTO `aijiacms_setting` VALUES('group-6','copy','1');
INSERT INTO `aijiacms_setting` VALUES('group-6','add_limit','60');
INSERT INTO `aijiacms_setting` VALUES('group-6','day_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-6','refresh_limit','600');
INSERT INTO `aijiacms_setting` VALUES('group-6','edit_limit','3');
INSERT INTO `aijiacms_setting` VALUES('group-6','newhouse_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-5','menu_c','0');
INSERT INTO `aijiacms_setting` VALUES('group-5','menu_d','0');
INSERT INTO `aijiacms_setting` VALUES('group-5','home_side','0');
INSERT INTO `aijiacms_setting` VALUES('group-5','side_c','0');
INSERT INTO `aijiacms_setting` VALUES('group-5','side_d','0');
INSERT INTO `aijiacms_setting` VALUES('group-5','home_main','0');
INSERT INTO `aijiacms_setting` VALUES('group-5','main_c','5');
INSERT INTO `aijiacms_setting` VALUES('group-5','main_d','5');
INSERT INTO `aijiacms_setting` VALUES('group-5','style','0');
INSERT INTO `aijiacms_setting` VALUES('group-5','map','0');
INSERT INTO `aijiacms_setting` VALUES('group-5','stats','0');
INSERT INTO `aijiacms_setting` VALUES('group-5','kf','0');
INSERT INTO `aijiacms_setting` VALUES('group-5','news_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-5','page_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-5','honor_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-5','link_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-5','moduleids','5,7,16,12');
INSERT INTO `aijiacms_setting` VALUES('group-5','vemail','0');
INSERT INTO `aijiacms_setting` VALUES('group-5','vmobile','0');
INSERT INTO `aijiacms_setting` VALUES('group-5','vtruename','0');
INSERT INTO `aijiacms_setting` VALUES('group-5','vcompany','0');
INSERT INTO `aijiacms_setting` VALUES('group-5','delete','1');
INSERT INTO `aijiacms_setting` VALUES('group-5','copy','1');
INSERT INTO `aijiacms_setting` VALUES('group-5','add_limit','30');
INSERT INTO `aijiacms_setting` VALUES('group-5','day_limit','3');
INSERT INTO `aijiacms_setting` VALUES('group-4','home_main','0');
INSERT INTO `aijiacms_setting` VALUES('group-4','main_c','5');
INSERT INTO `aijiacms_setting` VALUES('group-4','main_d','5');
INSERT INTO `aijiacms_setting` VALUES('group-4','style','0');
INSERT INTO `aijiacms_setting` VALUES('group-4','map','0');
INSERT INTO `aijiacms_setting` VALUES('group-4','stats','0');
INSERT INTO `aijiacms_setting` VALUES('group-4','kf','0');
INSERT INTO `aijiacms_setting` VALUES('group-4','news_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-4','page_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-4','honor_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-4','link_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-4','moduleids','6');
INSERT INTO `aijiacms_setting` VALUES('group-4','vemail','0');
INSERT INTO `aijiacms_setting` VALUES('group-4','vmobile','0');
INSERT INTO `aijiacms_setting` VALUES('group-4','vtruename','0');
INSERT INTO `aijiacms_setting` VALUES('group-4','vcompany','0');
INSERT INTO `aijiacms_setting` VALUES('group-3','style','0');
INSERT INTO `aijiacms_setting` VALUES('group-3','map','0');
INSERT INTO `aijiacms_setting` VALUES('group-3','stats','0');
INSERT INTO `aijiacms_setting` VALUES('group-3','kf','0');
INSERT INTO `aijiacms_setting` VALUES('group-3','news_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-3','page_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-3','honor_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-3','link_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-3','moduleids','5,7,16');
INSERT INTO `aijiacms_setting` VALUES('group-3','vemail','0');
INSERT INTO `aijiacms_setting` VALUES('group-3','vmobile','0');
INSERT INTO `aijiacms_setting` VALUES('group-3','vtruename','0');
INSERT INTO `aijiacms_setting` VALUES('group-3','vcompany','0');
INSERT INTO `aijiacms_setting` VALUES('group-3','delete','0');
INSERT INTO `aijiacms_setting` VALUES('group-3','copy','0');
INSERT INTO `aijiacms_setting` VALUES('group-3','add_limit','30');
INSERT INTO `aijiacms_setting` VALUES('group-3','day_limit','3');
INSERT INTO `aijiacms_setting` VALUES('group-3','refresh_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-2','menu_d','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','home_side','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','side_c','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','side_d','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','home_main','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','main_c','5');
INSERT INTO `aijiacms_setting` VALUES('group-2','main_d','5');
INSERT INTO `aijiacms_setting` VALUES('group-2','style','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','map','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','stats','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','kf','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','news_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-2','page_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-2','honor_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-2','link_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-2','moduleids','6');
INSERT INTO `aijiacms_setting` VALUES('group-1','main_c','0,1,2,3,5');
INSERT INTO `aijiacms_setting` VALUES('group-1','main_d','1,5');
INSERT INTO `aijiacms_setting` VALUES('group-1','style','1');
INSERT INTO `aijiacms_setting` VALUES('group-1','map','1');
INSERT INTO `aijiacms_setting` VALUES('group-1','stats','1');
INSERT INTO `aijiacms_setting` VALUES('group-1','kf','1');
INSERT INTO `aijiacms_setting` VALUES('group-1','news_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-1','page_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-1','honor_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-1','link_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-1','moduleids','6,5,7,8,16,15,12,14');
INSERT INTO `aijiacms_setting` VALUES('group-1','vemail','0');
INSERT INTO `aijiacms_setting` VALUES('group-1','vmobile','0');
INSERT INTO `aijiacms_setting` VALUES('group-1','vtruename','0');
INSERT INTO `aijiacms_setting` VALUES('group-1','vcompany','0');
INSERT INTO `aijiacms_setting` VALUES('1','middle_w','240');
INSERT INTO `aijiacms_setting` VALUES('1','water_com','0');
INSERT INTO `aijiacms_setting` VALUES('1','water_middle','0');
INSERT INTO `aijiacms_setting` VALUES('1','bmp_jpg','1');
INSERT INTO `aijiacms_setting` VALUES('1','water_pos','9');
INSERT INTO `aijiacms_setting` VALUES('1','water_min_wh','180');
INSERT INTO `aijiacms_setting` VALUES('2','pay_banks','现金|网银在线|贝宝|支付宝|财付通|招商银行|中国工商银行|中国农业银行|中国建设银行|中国交通银行|中国银行|邮政储蓄|邮政汇款');
INSERT INTO `aijiacms_setting` VALUES('2','send_types','不需要物流|平邮|EMS|顺丰快递|申通E物流|圆通速递|中通速递|宅急送|韵达快运|天天快递|联邦快递|汇通快运|华强物流|其它');
INSERT INTO `aijiacms_setting` VALUES('2','credit_edit','10');
INSERT INTO `aijiacms_setting` VALUES('2','credit_login','1');
INSERT INTO `aijiacms_setting` VALUES('2','credit_user','20');
INSERT INTO `aijiacms_setting` VALUES('2','credit_ip','2');
INSERT INTO `aijiacms_setting` VALUES('2','credit_maxip','50');
INSERT INTO `aijiacms_setting` VALUES('2','credit_charge','1');
INSERT INTO `aijiacms_setting` VALUES('2','credit_add_credit','2');
INSERT INTO `aijiacms_setting` VALUES('2','credit_del_credit','5');
INSERT INTO `aijiacms_setting` VALUES('2','credit_add_news','2');
INSERT INTO `aijiacms_setting` VALUES('2','credit_del_news','5');
INSERT INTO `aijiacms_setting` VALUES('2','credit_add_page','2');
INSERT INTO `aijiacms_setting` VALUES('3','survey_domain','');
INSERT INTO `aijiacms_setting` VALUES('3','wap_enable','1');
INSERT INTO `aijiacms_setting` VALUES('3','wap_domain','');
INSERT INTO `aijiacms_setting` VALUES('3','wap_charset','utf-8');
INSERT INTO `aijiacms_setting` VALUES('3','wap_pagesize','10');
INSERT INTO `aijiacms_setting` VALUES('3','wap_maxlength','500');
INSERT INTO `aijiacms_setting` VALUES('3','wap_goto','1');
INSERT INTO `aijiacms_setting` VALUES('3','feed_enable','2');
INSERT INTO `aijiacms_setting` VALUES('3','feed_domain','');
INSERT INTO `aijiacms_setting` VALUES('3','feed_pagesize','50');
INSERT INTO `aijiacms_setting` VALUES('3','archiver_enable','1');
INSERT INTO `aijiacms_setting` VALUES('3','archiver_robot','0');
INSERT INTO `aijiacms_setting` VALUES('3','archiver_domain','');
INSERT INTO `aijiacms_setting` VALUES('3','sitemaps','1');
INSERT INTO `aijiacms_setting` VALUES('4','page_inews','10');
INSERT INTO `aijiacms_setting` VALUES('4','page_inew','10');
INSERT INTO `aijiacms_setting` VALUES('4','pagesize','10');
INSERT INTO `aijiacms_setting` VALUES('4','page_subcat','6');
INSERT INTO `aijiacms_setting` VALUES('4','kf','53kf');
INSERT INTO `aijiacms_setting` VALUES('4','level','推荐公司');
INSERT INTO `aijiacms_setting` VALUES('4','stats','51la');
INSERT INTO `aijiacms_setting` VALUES('4','map','baidu');
INSERT INTO `aijiacms_setting` VALUES('4','vip_maxyear','5');
INSERT INTO `aijiacms_setting` VALUES('4','vip_honor','1');
INSERT INTO `aijiacms_setting` VALUES('4','openall','0');
INSERT INTO `aijiacms_setting` VALUES('4','delvip','1');
INSERT INTO `aijiacms_setting` VALUES('4','vip_cominfo','1');
INSERT INTO `aijiacms_setting` VALUES('4','vip_maxgroupvip','3');
INSERT INTO `aijiacms_setting` VALUES('4','vip_year','1');
INSERT INTO `aijiacms_setting` VALUES('4','split','0');
INSERT INTO `aijiacms_setting` VALUES('4','homeurl','0');
INSERT INTO `aijiacms_setting` VALUES('4','fields','userid,company,linkurl,thumb,catid,areaid,vip,groupid,validated,business,mode,telephone');
INSERT INTO `aijiacms_setting` VALUES('4','comment','0');
INSERT INTO `aijiacms_setting` VALUES('4','order','vip desc,userid desc');
INSERT INTO `aijiacms_setting` VALUES('4','title_index','{$seo_modulename}{$seo_delimiter}{$seo_page}{$seo_sitename}');
INSERT INTO `aijiacms_setting` VALUES('4','title_list','{$seo_catname}{$seo_cattitle}{$seo_page}{$seo_modulename}{$seo_delimiter}{$seo_sitename}');
INSERT INTO `aijiacms_setting` VALUES('5','seo_title_show','{内容标题}{分隔符}{分类名称}{模块名称}{分隔符}{网站名称}');
INSERT INTO `aijiacms_setting` VALUES('5','seo_description_show','');
INSERT INTO `aijiacms_setting` VALUES('5','group_index','3,5,6,7,8');
INSERT INTO `aijiacms_setting` VALUES('5','group_list','3,5,6,7,8');
INSERT INTO `aijiacms_setting` VALUES('5','group_search','3,5,6,7,8');
INSERT INTO `aijiacms_setting` VALUES('5','group_show','3,5,6,7,8');
INSERT INTO `aijiacms_setting` VALUES('5','group_contact','3,5,6,7,8');
INSERT INTO `aijiacms_setting` VALUES('5','seo_keywords_show','');
INSERT INTO `aijiacms_setting` VALUES('5','group_color','3,5,6,7,8');
INSERT INTO `aijiacms_setting` VALUES('5','group_elite','3,5,6,7,8');
INSERT INTO `aijiacms_setting` VALUES('5','group_refresh','3,5,6,7,8');
INSERT INTO `aijiacms_setting` VALUES('5','group_compare','3,5,6,7,8');
INSERT INTO `aijiacms_setting` VALUES('16','question_price','0');
INSERT INTO `aijiacms_setting` VALUES('16','captcha_price','0');
INSERT INTO `aijiacms_setting` VALUES('16','group_refresh','3,5,6,7');
INSERT INTO `aijiacms_setting` VALUES('16','group_color','6,7');
INSERT INTO `aijiacms_setting` VALUES('16','group_search','3,5,6,7');
INSERT INTO `aijiacms_setting` VALUES('16','group_contact','3,5,6,7');
INSERT INTO `aijiacms_setting` VALUES('16','group_show','3,5,6,7');
INSERT INTO `aijiacms_setting` VALUES('16','group_list','3,5,6,7');
INSERT INTO `aijiacms_setting` VALUES('16','group_index','3,5,6,7');
INSERT INTO `aijiacms_setting` VALUES('16','seo_description_show','');
INSERT INTO `aijiacms_setting` VALUES('16','seo_keywords_show','');
INSERT INTO `aijiacms_setting` VALUES('16','seo_title_show','');
INSERT INTO `aijiacms_setting` VALUES('16','seo_description_list','');
INSERT INTO `aijiacms_setting` VALUES('16','seo_keywords_list','');
INSERT INTO `aijiacms_setting` VALUES('16','seo_title_list','');
INSERT INTO `aijiacms_setting` VALUES('16','seo_description_index','');
INSERT INTO `aijiacms_setting` VALUES('16','seo_keywords_index','');
INSERT INTO `aijiacms_setting` VALUES('16','seo_title_index','');
INSERT INTO `aijiacms_setting` VALUES('16','php_item_urlid','3');
INSERT INTO `aijiacms_setting` VALUES('16','htm_item_urlid','0');
INSERT INTO `aijiacms_setting` VALUES('16','htm_item_prefix','');
INSERT INTO `aijiacms_setting` VALUES('16','show_html','0');
INSERT INTO `aijiacms_setting` VALUES('16','php_list_urlid','3');
INSERT INTO `aijiacms_setting` VALUES('16','htm_list_urlid','0');
INSERT INTO `aijiacms_setting` VALUES('16','htm_list_prefix','');
INSERT INTO `aijiacms_setting` VALUES('16','list_html','0');
INSERT INTO `aijiacms_setting` VALUES('16','index_html','0');
INSERT INTO `aijiacms_setting` VALUES('16','page_subcat','5');
INSERT INTO `aijiacms_setting` VALUES('16','max_width','100');
INSERT INTO `aijiacms_setting` VALUES('16','pagesize','20');
INSERT INTO `aijiacms_setting` VALUES('11','list_html','0');
INSERT INTO `aijiacms_setting` VALUES('11','show_html','0');
INSERT INTO `aijiacms_setting` VALUES('11','pagesize','20');
INSERT INTO `aijiacms_setting` VALUES('11','page_icat','8');
INSERT INTO `aijiacms_setting` VALUES('11','seo_keywords_index','');
INSERT INTO `aijiacms_setting` VALUES('11','htm_item_prefix','');
INSERT INTO `aijiacms_setting` VALUES('11','seo_description_index','');
INSERT INTO `aijiacms_setting` VALUES('11','htm_item_urlid','1');
INSERT INTO `aijiacms_setting` VALUES('11','php_item_urlid','0');
INSERT INTO `aijiacms_setting` VALUES('11','seo_title_index','{模块名称}{分隔符}{页码}{网站名称}');
INSERT INTO `aijiacms_setting` VALUES('11','seo_keywords_list','');
INSERT INTO `aijiacms_setting` VALUES('12','seo_title_show','{内容标题}{分隔符}{分类名称}{模块名称}{分隔符}{网站名称}');
INSERT INTO `aijiacms_setting` VALUES('12','seo_keywords_list','');
INSERT INTO `aijiacms_setting` VALUES('12','seo_title_list','{分类名称}{分类SEO标题}{页码}{模块名称}{分隔符}{网站名称}');
INSERT INTO `aijiacms_setting` VALUES('12','seo_keywords_index','');
INSERT INTO `aijiacms_setting` VALUES('12','seo_description_index','');
INSERT INTO `aijiacms_setting` VALUES('12','seo_title_index','{模块名称}{分隔符}{页码}{网站名称}');
INSERT INTO `aijiacms_setting` VALUES('12','htm_item_urlid','1');
INSERT INTO `aijiacms_setting` VALUES('12','php_item_urlid','5');
INSERT INTO `aijiacms_setting` VALUES('12','htm_item_prefix','');
INSERT INTO `aijiacms_setting` VALUES('12','show_html','0');
INSERT INTO `aijiacms_setting` VALUES('12','php_list_urlid','0');
INSERT INTO `aijiacms_setting` VALUES('14','video_height','400');
INSERT INTO `aijiacms_setting` VALUES('14','seo_title_show','{内容标题}{分隔符}{分类名称}{模块名称}{分隔符}{网站名称}');
INSERT INTO `aijiacms_setting` VALUES('14','introduce_length','120');
INSERT INTO `aijiacms_setting` VALUES('14','editor','Default');
INSERT INTO `aijiacms_setting` VALUES('14','order','addtime desc');
INSERT INTO `aijiacms_setting` VALUES('14','seo_keywords_list','');
INSERT INTO `aijiacms_setting` VALUES('14','seo_description_list','');
INSERT INTO `aijiacms_setting` VALUES('14','seo_title_list','{分类名称}{分类SEO标题}{页码}{模块名称}{分隔符}{网站名称}');
INSERT INTO `aijiacms_setting` VALUES('14','seo_description_index','');
INSERT INTO `aijiacms_setting` VALUES('14','seo_title_index','{模块名称}{分隔符}{页码}{网站名称}');
INSERT INTO `aijiacms_setting` VALUES('14','seo_keywords_index','');
INSERT INTO `aijiacms_setting` VALUES('15','htm_item_prefix','');
INSERT INTO `aijiacms_setting` VALUES('15','show_html','0');
INSERT INTO `aijiacms_setting` VALUES('15','php_list_urlid','3');
INSERT INTO `aijiacms_setting` VALUES('15','htm_list_urlid','0');
INSERT INTO `aijiacms_setting` VALUES('15','htm_list_prefix','');
INSERT INTO `aijiacms_setting` VALUES('15','list_html','0');
INSERT INTO `aijiacms_setting` VALUES('15','page_subcat','');
INSERT INTO `aijiacms_setting` VALUES('15','index_html','0');
INSERT INTO `aijiacms_setting` VALUES('15','max_width','500');
INSERT INTO `aijiacms_setting` VALUES('15','pagesize','20');
INSERT INTO `aijiacms_setting` VALUES('15','swfu','0');
INSERT INTO `aijiacms_setting` VALUES('15','level','推荐团购');
INSERT INTO `aijiacms_setting` VALUES('15','fulltext','0');
INSERT INTO `aijiacms_setting` VALUES('15','split','0');
INSERT INTO `aijiacms_setting` VALUES('15','keylink','0');
INSERT INTO `aijiacms_setting` VALUES('15','clear_link','0');
INSERT INTO `aijiacms_setting` VALUES('15','save_remotepic','0');
INSERT INTO `aijiacms_setting` VALUES('15','cat_property','0');
INSERT INTO `aijiacms_setting` VALUES('8','seo_description_index','');
INSERT INTO `aijiacms_setting` VALUES('8','seo_title_list','');
INSERT INTO `aijiacms_setting` VALUES('8','seo_keywords_list','');
INSERT INTO `aijiacms_setting` VALUES('8','seo_description_list','');
INSERT INTO `aijiacms_setting` VALUES('8','seo_title_show','');
INSERT INTO `aijiacms_setting` VALUES('8','seo_keywords_show','');
INSERT INTO `aijiacms_setting` VALUES('8','seo_description_show','');
INSERT INTO `aijiacms_setting` VALUES('8','group_index','3,5,6,7,8');
INSERT INTO `aijiacms_setting` VALUES('8','group_list','3,5,6,7,8');
INSERT INTO `aijiacms_setting` VALUES('8','group_show','3,5,6,7,8');
INSERT INTO `aijiacms_setting` VALUES('8','group_search','3,5,6,7,8');
INSERT INTO `aijiacms_setting` VALUES('6','seo_description_show','');
INSERT INTO `aijiacms_setting` VALUES('6','seo_title_show','{内容标题}{分隔符}{分类名称}{模块名称}{分隔符}{网站名称}');
INSERT INTO `aijiacms_setting` VALUES('6','seo_description_list','');
INSERT INTO `aijiacms_setting` VALUES('6','seo_keywords_list','');
INSERT INTO `aijiacms_setting` VALUES('6','seo_title_list','{分类名称}{分类SEO标题}{页码}{模块名称}{分隔符}{网站名称}');
INSERT INTO `aijiacms_setting` VALUES('6','seo_description_index','');
INSERT INTO `aijiacms_setting` VALUES('7','htm_list_urlid','1');
INSERT INTO `aijiacms_setting` VALUES('7','php_list_urlid','3');
INSERT INTO `aijiacms_setting` VALUES('7','show_html','0');
INSERT INTO `aijiacms_setting` VALUES('7','htm_item_prefix','');
INSERT INTO `aijiacms_setting` VALUES('7','htm_item_urlid','0');
INSERT INTO `aijiacms_setting` VALUES('7','php_item_urlid','3');
INSERT INTO `aijiacms_setting` VALUES('7','seo_title_index','');
INSERT INTO `aijiacms_setting` VALUES('7','seo_keywords_index','');
INSERT INTO `aijiacms_setting` VALUES('group-6','newhouse_free_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-6','sell_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-6','sell_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-5','refresh_limit','600');
INSERT INTO `aijiacms_setting` VALUES('group-5','edit_limit','3');
INSERT INTO `aijiacms_setting` VALUES('group-5','newhouse_limit','');
INSERT INTO `aijiacms_setting` VALUES('group-5','newhouse_free_limit','');
INSERT INTO `aijiacms_setting` VALUES('group-5','sell_limit','5');
INSERT INTO `aijiacms_setting` VALUES('group-5','sell_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-5','rent_limit','');
INSERT INTO `aijiacms_setting` VALUES('group-5','rent_free_limit','');
INSERT INTO `aijiacms_setting` VALUES('group-5','buy_limit','3');
INSERT INTO `aijiacms_setting` VALUES('group-5','buy_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-4','delete','0');
INSERT INTO `aijiacms_setting` VALUES('group-4','copy','0');
INSERT INTO `aijiacms_setting` VALUES('group-4','add_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-4','day_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-4','refresh_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-4','edit_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-4','sell_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-4','sell_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-4','buy_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-3','edit_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-3','newhouse_limit','');
INSERT INTO `aijiacms_setting` VALUES('group-3','newhouse_free_limit','');
INSERT INTO `aijiacms_setting` VALUES('group-3','sell_limit','3');
INSERT INTO `aijiacms_setting` VALUES('group-3','sell_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-3','rent_limit','');
INSERT INTO `aijiacms_setting` VALUES('group-3','rent_free_limit','');
INSERT INTO `aijiacms_setting` VALUES('group-3','buy_limit','3');
INSERT INTO `aijiacms_setting` VALUES('group-3','buy_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','vmobile','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','vemail','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','vtruename','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','vcompany','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','delete','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','copy','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','day_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-2','add_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-2','refresh_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-2','edit_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-1','delete','1');
INSERT INTO `aijiacms_setting` VALUES('group-1','copy','1');
INSERT INTO `aijiacms_setting` VALUES('group-1','add_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-1','day_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-1','refresh_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-1','edit_limit','0');
INSERT INTO `aijiacms_setting` VALUES('1','water_margin','10');
INSERT INTO `aijiacms_setting` VALUES('1','water_type','0');
INSERT INTO `aijiacms_setting` VALUES('2','credit_del_page','5');
INSERT INTO `aijiacms_setting` VALUES('2','credit_buy','30|100|500|1000');
INSERT INTO `aijiacms_setting` VALUES('2','credit_price','5|10|45|85');
INSERT INTO `aijiacms_setting` VALUES('2','credit_exchange','0');
INSERT INTO `aijiacms_setting` VALUES('2','ex_type','PW');
INSERT INTO `aijiacms_setting` VALUES('2','ex_host','localhost');
INSERT INTO `aijiacms_setting` VALUES('2','ex_user','root');
INSERT INTO `aijiacms_setting` VALUES('2','ex_pass','');
INSERT INTO `aijiacms_setting` VALUES('2','ex_data','');
INSERT INTO `aijiacms_setting` VALUES('2','ex_prex','');
INSERT INTO `aijiacms_setting` VALUES('2','ex_fdnm','');
INSERT INTO `aijiacms_setting` VALUES('2','ex_rate','');
INSERT INTO `aijiacms_setting` VALUES('3','sitemaps_changefreq','monthly');
INSERT INTO `aijiacms_setting` VALUES('3','sitemaps_module','6,5,7,8,16,4,15,12,14');
INSERT INTO `aijiacms_setting` VALUES('3','sitemaps_priority','0.8');
INSERT INTO `aijiacms_setting` VALUES('3','sitemaps_update','60');
INSERT INTO `aijiacms_setting` VALUES('3','sitemaps_items','10000');
INSERT INTO `aijiacms_setting` VALUES('3','baidunews','1');
INSERT INTO `aijiacms_setting` VALUES('4','title_show','{$seo_showtitle}{$seo_delimiter}{$seo_catname}{$seo_modulename}{$seo_delimiter}{$seo_sitename}');
INSERT INTO `aijiacms_setting` VALUES('4','keywords_list','');
INSERT INTO `aijiacms_setting` VALUES('4','keywords_index','');
INSERT INTO `aijiacms_setting` VALUES('5','fee_currency','money');
INSERT INTO `aijiacms_setting` VALUES('5','fee_mode','1');
INSERT INTO `aijiacms_setting` VALUES('5','question_add','1');
INSERT INTO `aijiacms_setting` VALUES('5','captcha_add','1');
INSERT INTO `aijiacms_setting` VALUES('5','check_add','0');
INSERT INTO `aijiacms_setting` VALUES('5','captcha_inquiry','2');
INSERT INTO `aijiacms_setting` VALUES('5','question_inquiry','2');
INSERT INTO `aijiacms_setting` VALUES('5','fee_view','0');
INSERT INTO `aijiacms_setting` VALUES('5','fee_add','0');
INSERT INTO `aijiacms_setting` VALUES('5','fee_period','0');
INSERT INTO `aijiacms_setting` VALUES('5','fee_back','0');
INSERT INTO `aijiacms_setting` VALUES('5','credit_add','2');
INSERT INTO `aijiacms_setting` VALUES('5','credit_del','5');
INSERT INTO `aijiacms_setting` VALUES('5','credit_color','100');
INSERT INTO `aijiacms_setting` VALUES('5','credit_elite','100');
INSERT INTO `aijiacms_setting` VALUES('16','level','推荐信息');
INSERT INTO `aijiacms_setting` VALUES('16','fulltext','0');
INSERT INTO `aijiacms_setting` VALUES('16','split','0');
INSERT INTO `aijiacms_setting` VALUES('16','cat_property','0');
INSERT INTO `aijiacms_setting` VALUES('16','save_remotepic','0');
INSERT INTO `aijiacms_setting` VALUES('16','keylink','0');
INSERT INTO `aijiacms_setting` VALUES('16','clear_link','0');
INSERT INTO `aijiacms_setting` VALUES('12','htm_list_urlid','0');
INSERT INTO `aijiacms_setting` VALUES('12','index_html','0');
INSERT INTO `aijiacms_setting` VALUES('12','htm_list_prefix','');
INSERT INTO `aijiacms_setting` VALUES('12','list_html','0');
INSERT INTO `aijiacms_setting` VALUES('12','max_width','800');
INSERT INTO `aijiacms_setting` VALUES('12','swfu_max','20');
INSERT INTO `aijiacms_setting` VALUES('12','pagesize','18');
INSERT INTO `aijiacms_setting` VALUES('14','php_item_urlid','0');
INSERT INTO `aijiacms_setting` VALUES('14','htm_item_urlid','1');
INSERT INTO `aijiacms_setting` VALUES('14','htm_item_prefix','');
INSERT INTO `aijiacms_setting` VALUES('14','php_list_urlid','0');
INSERT INTO `aijiacms_setting` VALUES('14','show_html','0');
INSERT INTO `aijiacms_setting` VALUES('14','htm_list_urlid','0');
INSERT INTO `aijiacms_setting` VALUES('14','htm_list_prefix','');
INSERT INTO `aijiacms_setting` VALUES('14','list_html','0');
INSERT INTO `aijiacms_setting` VALUES('15','fields','itemid,title,thumb,linkurl,style,catid,areaid,introduce,addtime,username,company,groupid,vip,qq,msn,ali,skype,validated,price,marketprice,savemoney,discount,sales,orders,minamount,amount');
INSERT INTO `aijiacms_setting` VALUES('15','order','itemid desc');
INSERT INTO `aijiacms_setting` VALUES('15','editor','Default');
INSERT INTO `aijiacms_setting` VALUES('15','introduce_length','50');
INSERT INTO `aijiacms_setting` VALUES('15','thumb_height','150');
INSERT INTO `aijiacms_setting` VALUES('15','thumb_width','150');
INSERT INTO `aijiacms_setting` VALUES('8','group_color','3,5,6,7,8');
INSERT INTO `aijiacms_setting` VALUES('8','check_add','0');
INSERT INTO `aijiacms_setting` VALUES('8','captcha_add','0');
INSERT INTO `aijiacms_setting` VALUES('8','fee_mode','0');
INSERT INTO `aijiacms_setting` VALUES('8','question_add','0');
INSERT INTO `aijiacms_setting` VALUES('8','fee_currency','money');
INSERT INTO `aijiacms_setting` VALUES('8','fee_add','');
INSERT INTO `aijiacms_setting` VALUES('6','seo_keywords_index','');
INSERT INTO `aijiacms_setting` VALUES('6','seo_title_index','{模块名称}{分隔符}{页码}{网站名称}');
INSERT INTO `aijiacms_setting` VALUES('6','php_item_urlid','1');
INSERT INTO `aijiacms_setting` VALUES('6','htm_item_urlid','4');
INSERT INTO `aijiacms_setting` VALUES('7','seo_description_index','');
INSERT INTO `aijiacms_setting` VALUES('7','group_index','3,5,6,7,8');
INSERT INTO `aijiacms_setting` VALUES('7','seo_description_show','');
INSERT INTO `aijiacms_setting` VALUES('7','seo_keywords_show','');
INSERT INTO `aijiacms_setting` VALUES('7','seo_title_show','');
INSERT INTO `aijiacms_setting` VALUES('7','seo_description_list','');
INSERT INTO `aijiacms_setting` VALUES('7','seo_keywords_list','');
INSERT INTO `aijiacms_setting` VALUES('7','seo_title_list','');
INSERT INTO `aijiacms_setting` VALUES('7','group_list','3,5,6,7,8');
INSERT INTO `aijiacms_setting` VALUES('7','group_show','3,5,6,7,8');
INSERT INTO `aijiacms_setting` VALUES('group-7','reg','0');
INSERT INTO `aijiacms_setting` VALUES('group-7','listorder','7');
INSERT INTO `aijiacms_setting` VALUES('group-6','rent_limit','100');
INSERT INTO `aijiacms_setting` VALUES('group-6','rent_free_limit','50');
INSERT INTO `aijiacms_setting` VALUES('group-6','buy_limit','10');
INSERT INTO `aijiacms_setting` VALUES('group-6','buy_free_limit','8');
INSERT INTO `aijiacms_setting` VALUES('group-6','reg','0');
INSERT INTO `aijiacms_setting` VALUES('group-6','listorder','6');
INSERT INTO `aijiacms_setting` VALUES('group-5','group_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-5','group_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-5','article_limit','3');
INSERT INTO `aijiacms_setting` VALUES('group-5','reg','1');
INSERT INTO `aijiacms_setting` VALUES('group-5','listorder','5');
INSERT INTO `aijiacms_setting` VALUES('group-4','buy_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-4','mall_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-4','mall_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-4','group_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-4','group_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-4','exhibit_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-4','exhibit_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-4','reg','0');
INSERT INTO `aijiacms_setting` VALUES('group-4','listorder','4');
INSERT INTO `aijiacms_setting` VALUES('group-3','group_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-3','group_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-3','article_limit','3');
INSERT INTO `aijiacms_setting` VALUES('group-3','article_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-3','info_limit','3');
INSERT INTO `aijiacms_setting` VALUES('group-3','info_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-3','reg','0');
INSERT INTO `aijiacms_setting` VALUES('group-3','listorder','3');
INSERT INTO `aijiacms_setting` VALUES('group-2','sell_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-2','sell_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','buy_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-2','buy_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','reg','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','listorder','2');
INSERT INTO `aijiacms_setting` VALUES('group-1','newhouse_limit','');
INSERT INTO `aijiacms_setting` VALUES('group-1','newhouse_free_limit','');
INSERT INTO `aijiacms_setting` VALUES('group-1','sell_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-1','sell_free_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-1','rent_limit','8');
INSERT INTO `aijiacms_setting` VALUES('1','water_fontcolor','#000000');
INSERT INTO `aijiacms_setting` VALUES('1','water_fontsize','20');
INSERT INTO `aijiacms_setting` VALUES('1','water_font','simhei.ttf');
INSERT INTO `aijiacms_setting` VALUES('2','uc_api','');
INSERT INTO `aijiacms_setting` VALUES('2','passport','0');
INSERT INTO `aijiacms_setting` VALUES('2','ex_name','');
INSERT INTO `aijiacms_setting` VALUES('2','passport_key','');
INSERT INTO `aijiacms_setting` VALUES('2','passport_url','');
INSERT INTO `aijiacms_setting` VALUES('2','passport_charset','gbk');
INSERT INTO `aijiacms_setting` VALUES('2','uc_ip','');
INSERT INTO `aijiacms_setting` VALUES('3','baidunews_email','web@aijiacms.com');
INSERT INTO `aijiacms_setting` VALUES('3','baidunews_update','60');
INSERT INTO `aijiacms_setting` VALUES('3','baidunews_items','90');
INSERT INTO `aijiacms_setting` VALUES('4','description_show','');
INSERT INTO `aijiacms_setting` VALUES('4','description_list','');
INSERT INTO `aijiacms_setting` VALUES('4','description_index','');
INSERT INTO `aijiacms_setting` VALUES('4','keywords_show','');
INSERT INTO `aijiacms_setting` VALUES('4','module','company');
INSERT INTO `aijiacms_setting` VALUES('5','credit_top','');
INSERT INTO `aijiacms_setting` VALUES('5','credit_hot','');
INSERT INTO `aijiacms_setting` VALUES('5','credit_refresh','1');
INSERT INTO `aijiacms_setting` VALUES('16','fields','itemid,title,thumb,linkurl,style,catid,areaid,introduce,addtime,edittime,username,company,groupid,vip,qq,msn,ali,skype,validated,price');
INSERT INTO `aijiacms_setting` VALUES('11','seo_title_list','{分类名称}{分类SEO标题}{页码}{模块名称}{分隔符}{网站名称}');
INSERT INTO `aijiacms_setting` VALUES('12','page_icat','2');
INSERT INTO `aijiacms_setting` VALUES('12','page_islide','3');
INSERT INTO `aijiacms_setting` VALUES('14','page_irec','8');
INSERT INTO `aijiacms_setting` VALUES('14','swfu','1');
INSERT INTO `aijiacms_setting` VALUES('14','index_html','0');
INSERT INTO `aijiacms_setting` VALUES('14','page_icat','4');
INSERT INTO `aijiacms_setting` VALUES('14','pagesize','20');
INSERT INTO `aijiacms_setting` VALUES('14','max_width','550');
INSERT INTO `aijiacms_setting` VALUES('14','flvend','');
INSERT INTO `aijiacms_setting` VALUES('14','upload','flv|swf|mp4|wmv');
INSERT INTO `aijiacms_setting` VALUES('14','flvstart','');
INSERT INTO `aijiacms_setting` VALUES('15','title_index','');
INSERT INTO `aijiacms_setting` VALUES('15','title_list','');
INSERT INTO `aijiacms_setting` VALUES('15','title_show','');
INSERT INTO `aijiacms_setting` VALUES('15','keywords_index','');
INSERT INTO `aijiacms_setting` VALUES('15','keywords_list','');
INSERT INTO `aijiacms_setting` VALUES('15','keywords_show','');
INSERT INTO `aijiacms_setting` VALUES('15','description_index','');
INSERT INTO `aijiacms_setting` VALUES('15','module','group');
INSERT INTO `aijiacms_setting` VALUES('15','description_show','');
INSERT INTO `aijiacms_setting` VALUES('15','description_list','');
INSERT INTO `aijiacms_setting` VALUES('8','fee_view','');
INSERT INTO `aijiacms_setting` VALUES('8','fee_period','');
INSERT INTO `aijiacms_setting` VALUES('8','fee_back','0');
INSERT INTO `aijiacms_setting` VALUES('8','pre_view','');
INSERT INTO `aijiacms_setting` VALUES('8','credit_add','');
INSERT INTO `aijiacms_setting` VALUES('8','credit_del','');
INSERT INTO `aijiacms_setting` VALUES('8','credit_color','');
INSERT INTO `aijiacms_setting` VALUES('6','htm_item_prefix','');
INSERT INTO `aijiacms_setting` VALUES('6','show_html','0');
INSERT INTO `aijiacms_setting` VALUES('7','group_search','3,5,6,7,8');
INSERT INTO `aijiacms_setting` VALUES('7','group_color','3,5,6,7,8');
INSERT INTO `aijiacms_setting` VALUES('7','captcha_inquiry','0');
INSERT INTO `aijiacms_setting` VALUES('7','question_inquiry','0');
INSERT INTO `aijiacms_setting` VALUES('18','question_add','0');
INSERT INTO `aijiacms_setting` VALUES('18','fee_mode','0');
INSERT INTO `aijiacms_setting` VALUES('18','fee_add','');
INSERT INTO `aijiacms_setting` VALUES('18','fee_view','');
INSERT INTO `aijiacms_setting` VALUES('18','fee_period','');
INSERT INTO `aijiacms_setting` VALUES('18','credit_add','');
INSERT INTO `aijiacms_setting` VALUES('18','credit_del','');
INSERT INTO `aijiacms_setting` VALUES('18','credit_color','');
INSERT INTO `aijiacms_setting` VALUES('pay-kq99bill','order','5');
INSERT INTO `aijiacms_setting` VALUES('pay-kq99bill','partnerid','');
INSERT INTO `aijiacms_setting` VALUES('pay-kq99bill','cert','');
INSERT INTO `aijiacms_setting` VALUES('pay-kq99bill','notify','');
INSERT INTO `aijiacms_setting` VALUES('pay-kq99bill','percent','1');
INSERT INTO `aijiacms_setting` VALUES('oauth-qq','sync','0');
INSERT INTO `aijiacms_setting` VALUES('oauth-sina','sync','0');
INSERT INTO `aijiacms_setting` VALUES('oauth-netease','name','网易通行证');
INSERT INTO `aijiacms_setting` VALUES('oauth-netease','enable','0');
INSERT INTO `aijiacms_setting` VALUES('2','uc_mysql','1');
INSERT INTO `aijiacms_setting` VALUES('2','uc_dbhost','');
INSERT INTO `aijiacms_setting` VALUES('2','uc_dbuser','');
INSERT INTO `aijiacms_setting` VALUES('2','uc_dbpwd','');
INSERT INTO `aijiacms_setting` VALUES('2','uc_dbname','');
INSERT INTO `aijiacms_setting` VALUES('2','uc_dbpre','');
INSERT INTO `aijiacms_setting` VALUES('group-1','rent_free_limit','6');
INSERT INTO `aijiacms_setting` VALUES('group-1','reg','0');
INSERT INTO `aijiacms_setting` VALUES('group-1','listorder','1');
INSERT INTO `aijiacms_setting` VALUES('12','level','推荐图库|幻灯图片|推荐图文|头条相关|头条推荐');
INSERT INTO `aijiacms_setting` VALUES('1','water_text','歪歪分享论坛');
INSERT INTO `aijiacms_setting` VALUES('1','water_jpeg_quality','90');
INSERT INTO `aijiacms_setting` VALUES('1','water_transition','60');
INSERT INTO `aijiacms_setting` VALUES('1','water_mark','watermark.png');
INSERT INTO `aijiacms_setting` VALUES('1','file_my','my.php');
INSERT INTO `aijiacms_setting` VALUES('1','defend_proxy','0');
INSERT INTO `aijiacms_setting` VALUES('1','file_register','register.php');
INSERT INTO `aijiacms_setting` VALUES('1','file_login','login.php');
INSERT INTO `aijiacms_setting` VALUES('1','defend_reload','0');
INSERT INTO `aijiacms_setting` VALUES('1','defend_cc','0');
INSERT INTO `aijiacms_setting` VALUES('1','safe_domain','');
INSERT INTO `aijiacms_setting` VALUES('1','jstag','0');
INSERT INTO `aijiacms_setting` VALUES('2','vtruename','1');
INSERT INTO `aijiacms_setting` VALUES('2','vmobile','0');
INSERT INTO `aijiacms_setting` VALUES('2','chat_ext','jpg|gif|rar|zip|doc|xls');
INSERT INTO `aijiacms_setting` VALUES('2','chat_url','1');
INSERT INTO `aijiacms_setting` VALUES('2','chat_img','1');
INSERT INTO `aijiacms_setting` VALUES('2','vmember','1');
INSERT INTO `aijiacms_setting` VALUES('2','vemail','1');
INSERT INTO `aijiacms_setting` VALUES('2','chat_maxlen','300');
INSERT INTO `aijiacms_setting` VALUES('2','chat_timeout','600');
INSERT INTO `aijiacms_setting` VALUES('2','chat_poll','3');
INSERT INTO `aijiacms_setting` VALUES('2','chat_mintime','3');
INSERT INTO `aijiacms_setting` VALUES('2','chat_file','1');
INSERT INTO `aijiacms_setting` VALUES('2','alert_check','2');
INSERT INTO `aijiacms_setting` VALUES('2','alertid','5|6|22');
INSERT INTO `aijiacms_setting` VALUES('2','auth_days','3');
INSERT INTO `aijiacms_setting` VALUES('2','lock_hour','1');
INSERT INTO `aijiacms_setting` VALUES('2','login_times','10');
INSERT INTO `aijiacms_setting` VALUES('2','captcha_sendmessage','2');
INSERT INTO `aijiacms_setting` VALUES('2','maxtouser','5');
INSERT INTO `aijiacms_setting` VALUES('2','usernote','');
INSERT INTO `aijiacms_setting` VALUES('2','iptimeout','0');
INSERT INTO `aijiacms_setting` VALUES('2','banagent','.NET CLR 1.0.3705');
INSERT INTO `aijiacms_setting` VALUES('2','defend_proxy','0');
INSERT INTO `aijiacms_setting` VALUES('2','sms_register','0');
INSERT INTO `aijiacms_setting` VALUES('2','credit_register','20');
INSERT INTO `aijiacms_setting` VALUES('2','money_register','0');
INSERT INTO `aijiacms_setting` VALUES('2','question_register','1');
INSERT INTO `aijiacms_setting` VALUES('2','captcha_register','1');
INSERT INTO `aijiacms_setting` VALUES('2','mobilecode_register','0');
INSERT INTO `aijiacms_setting` VALUES('2','emailcode_register','0');
INSERT INTO `aijiacms_setting` VALUES('2','welcome_sms','1');
INSERT INTO `aijiacms_setting` VALUES('2','welcome_email','0');
INSERT INTO `aijiacms_setting` VALUES('2','welcome_message','1');
INSERT INTO `aijiacms_setting` VALUES('2','checkuser','0');
INSERT INTO `aijiacms_setting` VALUES('2','banemail','');
INSERT INTO `aijiacms_setting` VALUES('2','banmodec','0');
INSERT INTO `aijiacms_setting` VALUES('2','bancompany','');
INSERT INTO `aijiacms_setting` VALUES('2','banmodeu','0');
INSERT INTO `aijiacms_setting` VALUES('2','banusername','admin|system|master|web|sale|buy|company|newhouse|job|article|info|page|bbs');
INSERT INTO `aijiacms_setting` VALUES('2','maxpassword','20');
INSERT INTO `aijiacms_setting` VALUES('2','minpassword','6');
INSERT INTO `aijiacms_setting` VALUES('2','maxusername','20');
INSERT INTO `aijiacms_setting` VALUES('2','minusername','4');
INSERT INTO `aijiacms_setting` VALUES('2','enable_register','1');
INSERT INTO `aijiacms_setting` VALUES('2','uc_charset','utf8');
INSERT INTO `aijiacms_setting` VALUES('2','uc_appid','');
INSERT INTO `aijiacms_setting` VALUES('2','uc_key','');
INSERT INTO `aijiacms_setting` VALUES('2','uc_bbs','0');
INSERT INTO `aijiacms_setting` VALUES('2','uc_bbspre','');
INSERT INTO `aijiacms_setting` VALUES('2','oauth','0');
INSERT INTO `aijiacms_setting` VALUES('2','module','member');
INSERT INTO `aijiacms_setting` VALUES('3','wenfang_check','0');
INSERT INTO `aijiacms_setting` VALUES('3','wenfang_group','3,5,6,7,8');
INSERT INTO `aijiacms_setting` VALUES('3','wenfang_module','6');
INSERT INTO `aijiacms_setting` VALUES('3','wenfang_show','1');
INSERT INTO `aijiacms_setting` VALUES('3','wenfang_domain','');
INSERT INTO `aijiacms_setting` VALUES('3','link_request','');
INSERT INTO `aijiacms_setting` VALUES('3','link_reg','1');
INSERT INTO `aijiacms_setting` VALUES('3','link_domain','');
INSERT INTO `aijiacms_setting` VALUES('3','link_enable','1');
INSERT INTO `aijiacms_setting` VALUES('3','announce_html','1');
INSERT INTO `aijiacms_setting` VALUES('3','announce_domain','');
INSERT INTO `aijiacms_setting` VALUES('3','announce_enable','1');
INSERT INTO `aijiacms_setting` VALUES('3','ad_currency','credit');
INSERT INTO `aijiacms_setting` VALUES('3','ad_buy','1');
INSERT INTO `aijiacms_setting` VALUES('3','ad_view','1');
INSERT INTO `aijiacms_setting` VALUES('3','ad_domain','');
INSERT INTO `aijiacms_setting` VALUES('3','ad_enable','1');
INSERT INTO `aijiacms_setting` VALUES('3','spread_currency','credit');
INSERT INTO `aijiacms_setting` VALUES('3','spread_list','1');
INSERT INTO `aijiacms_setting` VALUES('3','spread_check','1');
INSERT INTO `aijiacms_setting` VALUES('3','spread_max','10');
INSERT INTO `aijiacms_setting` VALUES('3','spread_month','6');
INSERT INTO `aijiacms_setting` VALUES('3','spread_step','100');
INSERT INTO `aijiacms_setting` VALUES('3','spread_company_price','500');
INSERT INTO `aijiacms_setting` VALUES('3','spread_buy_price','500');
INSERT INTO `aijiacms_setting` VALUES('3','spread_rent_price','');
INSERT INTO `aijiacms_setting` VALUES('3','spread_sell_price','500');
INSERT INTO `aijiacms_setting` VALUES('3','spread_newhouse_price','');
INSERT INTO `aijiacms_setting` VALUES('3','spread_domain','');
INSERT INTO `aijiacms_setting` VALUES('3','module','extend');
INSERT INTO `aijiacms_setting` VALUES('3','archiver_url','http://localhost/archiver/');
INSERT INTO `aijiacms_setting` VALUES('3','feed_url','http://localhost/feed/');
INSERT INTO `aijiacms_setting` VALUES('3','wap_url','http://localhost/wap/');
INSERT INTO `aijiacms_setting` VALUES('3','survey_url','http://localhost/survey/');
INSERT INTO `aijiacms_setting` VALUES('3','poll_url','http://localhost/poll/');
INSERT INTO `aijiacms_setting` VALUES('3','vote_url','http://localhost/vote/');
INSERT INTO `aijiacms_setting` VALUES('3','gift_url','http://localhost/gift/');
INSERT INTO `aijiacms_setting` VALUES('3','guestbook_url','http://localhost/guestbook/');
INSERT INTO `aijiacms_setting` VALUES('3','comment_url','http://localhost/comment/');
INSERT INTO `aijiacms_setting` VALUES('3','wenfang_url','http://localhost/wenfang/');
INSERT INTO `aijiacms_setting` VALUES('3','link_url','http://localhost/link/');
INSERT INTO `aijiacms_setting` VALUES('3','announce_url','http://localhost/announce/');
INSERT INTO `aijiacms_setting` VALUES('3','ad_url','http://localhost/ad/');
INSERT INTO `aijiacms_setting` VALUES('3','spread_url','http://localhost/spread/');
INSERT INTO `aijiacms_setting` VALUES('4','group_inquiry','3,5,6,7,8');
INSERT INTO `aijiacms_setting` VALUES('4','group_price','3,5,6,7,8');
INSERT INTO `aijiacms_setting` VALUES('5','cat_property','0');
INSERT INTO `aijiacms_setting` VALUES('5','save_remotepic','0');
INSERT INTO `aijiacms_setting` VALUES('5','type','个人房源|中介房源');
INSERT INTO `aijiacms_setting` VALUES('5','inquiry_type','房源起价|公摊面积|建筑容积率|房屋的产权|房产税|房屋结构|周边配套|公交信息');
INSERT INTO `aijiacms_setting` VALUES('5','fields','itemid,title,thumb,linkurl,style,catid,areaid,ishot,istop,addtime,edittime,username,company,groupid,vip,qq,msn,ali,skype,validated,price,room,hall,toilet,houseearm,typeid,totime,houseyear,balcony,floor1,floor2,address,housename,fyts,zhuanxiu,houseid,toward');
INSERT INTO `aijiacms_setting` VALUES('5','order','istop desc,ishot desc,vip desc,edittime desc');
INSERT INTO `aijiacms_setting` VALUES('5','editor','Basic');
INSERT INTO `aijiacms_setting` VALUES('5','introduce_length','120');
INSERT INTO `aijiacms_setting` VALUES('5','thumb_height','100');
INSERT INTO `aijiacms_setting` VALUES('5','thumb_width','100');
INSERT INTO `aijiacms_setting` VALUES('5','template_inquiry','');
INSERT INTO `aijiacms_setting` VALUES('5','template_compare','');
INSERT INTO `aijiacms_setting` VALUES('5','template_search','');
INSERT INTO `aijiacms_setting` VALUES('5','template_show','');
INSERT INTO `aijiacms_setting` VALUES('5','template_list','');
INSERT INTO `aijiacms_setting` VALUES('5','template_index','');
INSERT INTO `aijiacms_setting` VALUES('5','title_index','{$seo_modulename}{$seo_delimiter}{$seo_page}{$seo_sitename}');
INSERT INTO `aijiacms_setting` VALUES('5','title_list','{$seo_catname}{$seo_cattitle}{$seo_page}{$seo_modulename}{$seo_delimiter}{$seo_sitename}');
INSERT INTO `aijiacms_setting` VALUES('5','title_show','{$seo_showtitle}{$seo_delimiter}{$seo_catname}{$seo_modulename}{$seo_delimiter}{$seo_sitename}');
INSERT INTO `aijiacms_setting` VALUES('5','keywords_index','');
INSERT INTO `aijiacms_setting` VALUES('5','keywords_list','');
INSERT INTO `aijiacms_setting` VALUES('5','keywords_show','');
INSERT INTO `aijiacms_setting` VALUES('5','description_index','');
INSERT INTO `aijiacms_setting` VALUES('5','description_list','');
INSERT INTO `aijiacms_setting` VALUES('5','description_show','');
INSERT INTO `aijiacms_setting` VALUES('5','module','sale');
INSERT INTO `aijiacms_setting` VALUES('6','php_list_urlid','1');
INSERT INTO `aijiacms_setting` VALUES('6','swfu','2');
INSERT INTO `aijiacms_setting` VALUES('6','upload_thumb','0');
INSERT INTO `aijiacms_setting` VALUES('6','pagesize','12');
INSERT INTO `aijiacms_setting` VALUES('6','max_width','900');
INSERT INTO `aijiacms_setting` VALUES('6','page_subcat','6');
INSERT INTO `aijiacms_setting` VALUES('6','index_html','0');
INSERT INTO `aijiacms_setting` VALUES('6','list_html','0');
INSERT INTO `aijiacms_setting` VALUES('6','htm_list_prefix','');
INSERT INTO `aijiacms_setting` VALUES('6','htm_list_urlid','0');
INSERT INTO `aijiacms_setting` VALUES('6','sphinx','0');
INSERT INTO `aijiacms_setting` VALUES('6','sphinx_host','');
INSERT INTO `aijiacms_setting` VALUES('6','sphinx_port','');
INSERT INTO `aijiacms_setting` VALUES('6','sphinx_name','');
INSERT INTO `aijiacms_setting` VALUES('6','fulltext','0');
INSERT INTO `aijiacms_setting` VALUES('6','level','推荐|热销|优惠|打折');
INSERT INTO `aijiacms_setting` VALUES('6','cat_property','0');
INSERT INTO `aijiacms_setting` VALUES('6','save_remotepic','0');
INSERT INTO `aijiacms_setting` VALUES('6','clear_link','0');
INSERT INTO `aijiacms_setting` VALUES('6','keylink','0');
INSERT INTO `aijiacms_setting` VALUES('6','split','0');
INSERT INTO `aijiacms_setting` VALUES('6','inquiry_ask','我对贵公司的房源非常感兴趣，能否发一些详细资料给我参考？|请您发一份比较详细的房源规格说明，谢谢！|我有意购买此房源，希望登记现场看房？|我对该房源比较感兴趣,请电话联系我！');
INSERT INTO `aijiacms_setting` VALUES('6','inquiry_type','价格');
INSERT INTO `aijiacms_setting` VALUES('6','type','待售楼盘|在售楼盘|尾盘楼盘|售完楼盘');
INSERT INTO `aijiacms_setting` VALUES('7','inquiry_type','房源起价|公摊面积|建筑容积率|房屋的产权|房产税|房屋结构|周边配套|公交信息');
INSERT INTO `aijiacms_setting` VALUES('7','fields','itemid,title,thumb,linkurl,style,catid,areaid,ishot,istop,addtime,to_time,hot_time,edittime,username,company,groupid,vip,qq,msn,ali,skype,validated,price,room,hall,toilet,houseearm,typeid,totime,houseyear,balcony,floor1,floor2,address,housename,fytsr,zhuanxiu,houseid,toward');
INSERT INTO `aijiacms_setting` VALUES('7','order','istop desc,ishot desc,vip desc,edittime desc');
INSERT INTO `aijiacms_setting` VALUES('7','editor','Default');
INSERT INTO `aijiacms_setting` VALUES('7','introduce_length','150');
INSERT INTO `aijiacms_setting` VALUES('7','thumb_width','100');
INSERT INTO `aijiacms_setting` VALUES('7','thumb_height','100');
INSERT INTO `aijiacms_setting` VALUES('7','template_inquiry','');
INSERT INTO `aijiacms_setting` VALUES('7','template_compare','');
INSERT INTO `aijiacms_setting` VALUES('7','template_search','');
INSERT INTO `aijiacms_setting` VALUES('7','template_show','');
INSERT INTO `aijiacms_setting` VALUES('7','template_list','');
INSERT INTO `aijiacms_setting` VALUES('7','template_index','');
INSERT INTO `aijiacms_setting` VALUES('7','check_add','0');
INSERT INTO `aijiacms_setting` VALUES('7','captcha_add','0');
INSERT INTO `aijiacms_setting` VALUES('7','question_add','0');
INSERT INTO `aijiacms_setting` VALUES('7','fee_mode','0');
INSERT INTO `aijiacms_setting` VALUES('7','fee_currency','money');
INSERT INTO `aijiacms_setting` VALUES('7','fee_add','');
INSERT INTO `aijiacms_setting` VALUES('7','fee_view','');
INSERT INTO `aijiacms_setting` VALUES('7','fee_period','');
INSERT INTO `aijiacms_setting` VALUES('7','fee_back','0');
INSERT INTO `aijiacms_setting` VALUES('7','credit_add','');
INSERT INTO `aijiacms_setting` VALUES('7','credit_del','');
INSERT INTO `aijiacms_setting` VALUES('7','credit_color','');
INSERT INTO `aijiacms_setting` VALUES('7','credit_elite','');
INSERT INTO `aijiacms_setting` VALUES('7','credit_top','');
INSERT INTO `aijiacms_setting` VALUES('7','credit_hot','');
INSERT INTO `aijiacms_setting` VALUES('7','credit_refresh','');
INSERT INTO `aijiacms_setting` VALUES('7','title_index','');
INSERT INTO `aijiacms_setting` VALUES('7','title_list','');
INSERT INTO `aijiacms_setting` VALUES('7','title_show','');
INSERT INTO `aijiacms_setting` VALUES('7','keywords_index','');
INSERT INTO `aijiacms_setting` VALUES('7','keywords_list','');
INSERT INTO `aijiacms_setting` VALUES('7','keywords_show','');
INSERT INTO `aijiacms_setting` VALUES('7','description_index','');
INSERT INTO `aijiacms_setting` VALUES('7','description_list','');
INSERT INTO `aijiacms_setting` VALUES('7','description_show','');
INSERT INTO `aijiacms_setting` VALUES('7','module','rent');
INSERT INTO `aijiacms_setting` VALUES('8','swfu','0');
INSERT INTO `aijiacms_setting` VALUES('8','page_islide','3');
INSERT INTO `aijiacms_setting` VALUES('8','fulltext','0');
INSERT INTO `aijiacms_setting` VALUES('8','split','0');
INSERT INTO `aijiacms_setting` VALUES('8','keylink','0');
INSERT INTO `aijiacms_setting` VALUES('8','clear_link','0');
INSERT INTO `aijiacms_setting` VALUES('8','fields','itemid,title,thumb,linkurl,style,catid,introduce,addtime,edittime,username,islink');
INSERT INTO `aijiacms_setting` VALUES('8','save_remotepic','0');
INSERT INTO `aijiacms_setting` VALUES('8','cat_property','0');
INSERT INTO `aijiacms_setting` VALUES('8','order','addtime desc');
INSERT INTO `aijiacms_setting` VALUES('8','editor','Default');
INSERT INTO `aijiacms_setting` VALUES('8','introduce_length','40');
INSERT INTO `aijiacms_setting` VALUES('8','thumb_height','100');
INSERT INTO `aijiacms_setting` VALUES('8','thumb_width','100');
INSERT INTO `aijiacms_setting` VALUES('8','template_search','');
INSERT INTO `aijiacms_setting` VALUES('8','template_show','');
INSERT INTO `aijiacms_setting` VALUES('8','template_list','');
INSERT INTO `aijiacms_setting` VALUES('8','template_index','');
INSERT INTO `aijiacms_setting` VALUES('8','title_index','');
INSERT INTO `aijiacms_setting` VALUES('8','title_list','');
INSERT INTO `aijiacms_setting` VALUES('8','title_show','');
INSERT INTO `aijiacms_setting` VALUES('8','keywords_index','');
INSERT INTO `aijiacms_setting` VALUES('8','keywords_list','');
INSERT INTO `aijiacms_setting` VALUES('8','keywords_show','');
INSERT INTO `aijiacms_setting` VALUES('8','description_index','');
INSERT INTO `aijiacms_setting` VALUES('8','description_list','');
INSERT INTO `aijiacms_setting` VALUES('8','description_show','');
INSERT INTO `aijiacms_setting` VALUES('8','module','article');
INSERT INTO `aijiacms_setting` VALUES('11','keywords_show','');
INSERT INTO `aijiacms_setting` VALUES('11','keywords_list','');
INSERT INTO `aijiacms_setting` VALUES('11','keywords_index','');
INSERT INTO `aijiacms_setting` VALUES('11','description_show','');
INSERT INTO `aijiacms_setting` VALUES('11','description_list','');
INSERT INTO `aijiacms_setting` VALUES('11','description_index','');
INSERT INTO `aijiacms_setting` VALUES('11','module','special');
INSERT INTO `aijiacms_setting` VALUES('11','seo_description_list','');
INSERT INTO `aijiacms_setting` VALUES('11','seo_title_show','{内容标题}{分隔符}{分类名称}{模块名称}{分隔符}{网站名称}');
INSERT INTO `aijiacms_setting` VALUES('11','seo_keywords_show','');
INSERT INTO `aijiacms_setting` VALUES('11','seo_description_show','');
INSERT INTO `aijiacms_setting` VALUES('11','group_index','3,5,6,7');
INSERT INTO `aijiacms_setting` VALUES('11','group_list','3,5,6,7');
INSERT INTO `aijiacms_setting` VALUES('11','group_show','3,5,6,7');
INSERT INTO `aijiacms_setting` VALUES('11','group_search','3,5,6,7');
INSERT INTO `aijiacms_setting` VALUES('11','credit_add','2');
INSERT INTO `aijiacms_setting` VALUES('12','page_irec','4');
INSERT INTO `aijiacms_setting` VALUES('12','fulltext','0');
INSERT INTO `aijiacms_setting` VALUES('12','keylink','0');
INSERT INTO `aijiacms_setting` VALUES('12','split','0');
INSERT INTO `aijiacms_setting` VALUES('12','clear_link','0');
INSERT INTO `aijiacms_setting` VALUES('12','save_remotepic','0');
INSERT INTO `aijiacms_setting` VALUES('12','cat_property','1');
INSERT INTO `aijiacms_setting` VALUES('12','fields','itemid,title,thumb,linkurl,style,catid,introduce,addtime,edittime,username,items,open');
INSERT INTO `aijiacms_setting` VALUES('12','order','addtime desc');
INSERT INTO `aijiacms_setting` VALUES('12','editor','Simple');
INSERT INTO `aijiacms_setting` VALUES('12','introduce_length','120');
INSERT INTO `aijiacms_setting` VALUES('12','maxitem','30');
INSERT INTO `aijiacms_setting` VALUES('12','thumb_height','310');
INSERT INTO `aijiacms_setting` VALUES('12','thumb_width','412');
INSERT INTO `aijiacms_setting` VALUES('12','template_search','');
INSERT INTO `aijiacms_setting` VALUES('12','template_show','show-pic');
INSERT INTO `aijiacms_setting` VALUES('12','template_list','');
INSERT INTO `aijiacms_setting` VALUES('12','template_index','');
INSERT INTO `aijiacms_setting` VALUES('12','title_index','{$seo_modulename}{$seo_delimiter}{$seo_page}{$seo_sitename}');
INSERT INTO `aijiacms_setting` VALUES('12','title_list','{$seo_catname}{$seo_cattitle}{$seo_page}{$seo_modulename}{$seo_delimiter}{$seo_sitename}');
INSERT INTO `aijiacms_setting` VALUES('12','title_show','{$seo_showtitle}{$seo_delimiter}{$seo_catname}{$seo_modulename}{$seo_delimiter}{$seo_sitename}');
INSERT INTO `aijiacms_setting` VALUES('12','keywords_index','');
INSERT INTO `aijiacms_setting` VALUES('12','keywords_list','');
INSERT INTO `aijiacms_setting` VALUES('12','keywords_show','');
INSERT INTO `aijiacms_setting` VALUES('12','description_index','');
INSERT INTO `aijiacms_setting` VALUES('12','description_list','');
INSERT INTO `aijiacms_setting` VALUES('12','description_show','');
INSERT INTO `aijiacms_setting` VALUES('12','module','photo');
INSERT INTO `aijiacms_setting` VALUES('13','fee_back','0');
INSERT INTO `aijiacms_setting` VALUES('13','fee_period','0');
INSERT INTO `aijiacms_setting` VALUES('13','fee_view','0');
INSERT INTO `aijiacms_setting` VALUES('13','fee_add','0');
INSERT INTO `aijiacms_setting` VALUES('13','fee_currency','money');
INSERT INTO `aijiacms_setting` VALUES('13','fee_mode','1');
INSERT INTO `aijiacms_setting` VALUES('13','question_add','2');
INSERT INTO `aijiacms_setting` VALUES('13','captcha_add','2');
INSERT INTO `aijiacms_setting` VALUES('13','check_add','2');
INSERT INTO `aijiacms_setting` VALUES('13','question_message','2');
INSERT INTO `aijiacms_setting` VALUES('13','captcha_message','2');
INSERT INTO `aijiacms_setting` VALUES('13','group_refresh','7');
INSERT INTO `aijiacms_setting` VALUES('13','group_color','6,7');
INSERT INTO `aijiacms_setting` VALUES('13','group_search','3,5,6,7');
INSERT INTO `aijiacms_setting` VALUES('13','group_contact','6,7');
INSERT INTO `aijiacms_setting` VALUES('13','group_show','3,5,6,7');
INSERT INTO `aijiacms_setting` VALUES('13','group_list','3,5,6,7');
INSERT INTO `aijiacms_setting` VALUES('13','group_index','3,5,6,7');
INSERT INTO `aijiacms_setting` VALUES('13','seo_description_show','');
INSERT INTO `aijiacms_setting` VALUES('13','seo_keywords_show','');
INSERT INTO `aijiacms_setting` VALUES('13','seo_title_show','{内容标题}{分隔符}{分类名称}{模块名称}{分隔符}{网站名称}');
INSERT INTO `aijiacms_setting` VALUES('13','seo_description_list','');
INSERT INTO `aijiacms_setting` VALUES('13','seo_keywords_list','');
INSERT INTO `aijiacms_setting` VALUES('13','seo_title_list','{分类SEO标题}{页码}{模块名称}{分隔符}{网站名称}');
INSERT INTO `aijiacms_setting` VALUES('13','seo_description_index','');
INSERT INTO `aijiacms_setting` VALUES('13','seo_keywords_index','');
INSERT INTO `aijiacms_setting` VALUES('13','seo_title_index','{模块名称}{分隔符}{页码}{网站名称}');
INSERT INTO `aijiacms_setting` VALUES('13','php_item_urlid','0');
INSERT INTO `aijiacms_setting` VALUES('13','htm_item_urlid','1');
INSERT INTO `aijiacms_setting` VALUES('13','htm_item_prefix','');
INSERT INTO `aijiacms_setting` VALUES('13','show_html','0');
INSERT INTO `aijiacms_setting` VALUES('13','php_list_urlid','0');
INSERT INTO `aijiacms_setting` VALUES('13','htm_list_urlid','0');
INSERT INTO `aijiacms_setting` VALUES('13','htm_list_prefix','');
INSERT INTO `aijiacms_setting` VALUES('13','list_html','0');
INSERT INTO `aijiacms_setting` VALUES('13','index_html','0');
INSERT INTO `aijiacms_setting` VALUES('13','page_subcat','5');
INSERT INTO `aijiacms_setting` VALUES('13','max_width','550');
INSERT INTO `aijiacms_setting` VALUES('13','page_srelate','10');
INSERT INTO `aijiacms_setting` VALUES('13','show_message','1');
INSERT INTO `aijiacms_setting` VALUES('13','page_lkw','10');
INSERT INTO `aijiacms_setting` VALUES('13','show_larea','1');
INSERT INTO `aijiacms_setting` VALUES('13','show_lcat','1');
INSERT INTO `aijiacms_setting` VALUES('13','pagesize','20');
INSERT INTO `aijiacms_setting` VALUES('13','page_ihits','10');
INSERT INTO `aijiacms_setting` VALUES('13','show_iarea','1');
INSERT INTO `aijiacms_setting` VALUES('13','show_icat','1');
INSERT INTO `aijiacms_setting` VALUES('13','page_icat','8');
INSERT INTO `aijiacms_setting` VALUES('13','page_irec','8');
INSERT INTO `aijiacms_setting` VALUES('13','swfu','2');
INSERT INTO `aijiacms_setting` VALUES('13','clear_link','0');
INSERT INTO `aijiacms_setting` VALUES('13','keylink','0');
INSERT INTO `aijiacms_setting` VALUES('13','split','0');
INSERT INTO `aijiacms_setting` VALUES('13','fulltext','0');
INSERT INTO `aijiacms_setting` VALUES('13','level','推荐信息');
INSERT INTO `aijiacms_setting` VALUES('13','cat_property','0');
INSERT INTO `aijiacms_setting` VALUES('13','save_remotepic','0');
INSERT INTO `aijiacms_setting` VALUES('13','message_ask','请问我这个地方有加盟商了吗？|我想加盟，请来电话告诉我具体细节。|初步打算加盟贵公司，请寄资料。|请问贵公司哪里有样板店或直营店？|想了解加盟细节，请尽快寄一份资料。 ');
INSERT INTO `aijiacms_setting` VALUES('13','order','edittime desc');
INSERT INTO `aijiacms_setting` VALUES('13','fields','itemid,title,thumb,linkurl,style,catid,areaid,introduce,addtime,edittime,username,company,groupid,vip,qq,msn,ali,skype,validated,islink');
INSERT INTO `aijiacms_setting` VALUES('13','thumb_height','100');
INSERT INTO `aijiacms_setting` VALUES('13','introduce_length','120');
INSERT INTO `aijiacms_setting` VALUES('13','editor','Aijiacms');
INSERT INTO `aijiacms_setting` VALUES('13','thumb_width','100');
INSERT INTO `aijiacms_setting` VALUES('13','template_message','');
INSERT INTO `aijiacms_setting` VALUES('13','template_search','');
INSERT INTO `aijiacms_setting` VALUES('13','template_show','');
INSERT INTO `aijiacms_setting` VALUES('13','template_list','');
INSERT INTO `aijiacms_setting` VALUES('13','template_index','');
INSERT INTO `aijiacms_setting` VALUES('13','credit_add','2');
INSERT INTO `aijiacms_setting` VALUES('13','credit_del','5');
INSERT INTO `aijiacms_setting` VALUES('13','credit_color','100');
INSERT INTO `aijiacms_setting` VALUES('13','credit_refresh','1');
INSERT INTO `aijiacms_setting` VALUES('13','title_index','{$seo_modulename}{$seo_delimiter}{$seo_page}{$seo_sitename}');
INSERT INTO `aijiacms_setting` VALUES('13','title_list','{$seo_cattitle}{$seo_page}{$seo_modulename}{$seo_delimiter}{$seo_sitename}');
INSERT INTO `aijiacms_setting` VALUES('13','title_show','{$seo_showtitle}{$seo_delimiter}{$seo_catname}{$seo_modulename}{$seo_delimiter}{$seo_sitename}');
INSERT INTO `aijiacms_setting` VALUES('13','keywords_index','');
INSERT INTO `aijiacms_setting` VALUES('13','keywords_list','');
INSERT INTO `aijiacms_setting` VALUES('13','keywords_show','');
INSERT INTO `aijiacms_setting` VALUES('13','description_index','');
INSERT INTO `aijiacms_setting` VALUES('13','description_list','');
INSERT INTO `aijiacms_setting` VALUES('13','description_show','');
INSERT INTO `aijiacms_setting` VALUES('13','module','info');
INSERT INTO `aijiacms_setting` VALUES('14','fee_period','0');
INSERT INTO `aijiacms_setting` VALUES('14','fee_back','0');
INSERT INTO `aijiacms_setting` VALUES('14','credit_add','2');
INSERT INTO `aijiacms_setting` VALUES('14','credit_del','5');
INSERT INTO `aijiacms_setting` VALUES('14','credit_color','100');
INSERT INTO `aijiacms_setting` VALUES('14','flvlink','');
INSERT INTO `aijiacms_setting` VALUES('14','flvmargin','10 auto auto 10');
INSERT INTO `aijiacms_setting` VALUES('14','flvlogo','video.png');
INSERT INTO `aijiacms_setting` VALUES('14','autostart','1');
INSERT INTO `aijiacms_setting` VALUES('14','player','FlashPlayer|MediaPlayer|RealPlayer');
INSERT INTO `aijiacms_setting` VALUES('14','level','推荐视频');
INSERT INTO `aijiacms_setting` VALUES('14','fulltext','0');
INSERT INTO `aijiacms_setting` VALUES('14','save_remotepic','0');
INSERT INTO `aijiacms_setting` VALUES('14','clear_link','0');
INSERT INTO `aijiacms_setting` VALUES('14','keylink','0');
INSERT INTO `aijiacms_setting` VALUES('14','split','0');
INSERT INTO `aijiacms_setting` VALUES('14','cat_property','0');
INSERT INTO `aijiacms_setting` VALUES('14','fields','itemid,title,thumb,linkurl,style,catid,introduce,addtime,edittime,username,hits');
INSERT INTO `aijiacms_setting` VALUES('14','video_width','480');
INSERT INTO `aijiacms_setting` VALUES('14','thumb_height','90');
INSERT INTO `aijiacms_setting` VALUES('14','thumb_width','120');
INSERT INTO `aijiacms_setting` VALUES('14','template_search','');
INSERT INTO `aijiacms_setting` VALUES('14','template_show','');
INSERT INTO `aijiacms_setting` VALUES('14','template_list','');
INSERT INTO `aijiacms_setting` VALUES('14','template_index','');
INSERT INTO `aijiacms_setting` VALUES('14','title_index','{$seo_modulename}{$seo_delimiter}{$seo_page}{$seo_sitename}');
INSERT INTO `aijiacms_setting` VALUES('14','title_list','{$seo_catname}{$seo_cattitle}{$seo_page}{$seo_modulename}{$seo_delimiter}{$seo_sitename}');
INSERT INTO `aijiacms_setting` VALUES('14','title_show','{$seo_showtitle}{$seo_delimiter}{$seo_catname}{$seo_modulename}{$seo_delimiter}{$seo_sitename}');
INSERT INTO `aijiacms_setting` VALUES('14','keywords_index','');
INSERT INTO `aijiacms_setting` VALUES('14','keywords_list','');
INSERT INTO `aijiacms_setting` VALUES('14','keywords_show','');
INSERT INTO `aijiacms_setting` VALUES('14','description_index','');
INSERT INTO `aijiacms_setting` VALUES('14','description_list','');
INSERT INTO `aijiacms_setting` VALUES('14','description_show','');
INSERT INTO `aijiacms_setting` VALUES('14','module','video');
INSERT INTO `aijiacms_setting` VALUES('15','fee_currency','money');
INSERT INTO `aijiacms_setting` VALUES('15','fee_mode','0');
INSERT INTO `aijiacms_setting` VALUES('15','question_add','0');
INSERT INTO `aijiacms_setting` VALUES('15','fee_back','0');
INSERT INTO `aijiacms_setting` VALUES('15','credit_add','');
INSERT INTO `aijiacms_setting` VALUES('15','credit_del','');
INSERT INTO `aijiacms_setting` VALUES('15','credit_color','');
INSERT INTO `aijiacms_setting` VALUES('15','credit_refresh','');
INSERT INTO `aijiacms_setting` VALUES('15','captcha_add','0');
INSERT INTO `aijiacms_setting` VALUES('15','check_add','0');
INSERT INTO `aijiacms_setting` VALUES('16','fee_view','');
INSERT INTO `aijiacms_setting` VALUES('16','fee_period','');
INSERT INTO `aijiacms_setting` VALUES('16','fee_back','0');
INSERT INTO `aijiacms_setting` VALUES('16','credit_add','');
INSERT INTO `aijiacms_setting` VALUES('16','credit_del','');
INSERT INTO `aijiacms_setting` VALUES('16','credit_color','');
INSERT INTO `aijiacms_setting` VALUES('16','credit_refresh','');
INSERT INTO `aijiacms_setting` VALUES('16','type','求购|求租');
INSERT INTO `aijiacms_setting` VALUES('16','price_ask','联系方式');
INSERT INTO `aijiacms_setting` VALUES('16','order','editdate desc,vip desc,edittime desc');
INSERT INTO `aijiacms_setting` VALUES('16','editor','Default');
INSERT INTO `aijiacms_setting` VALUES('16','introduce_length','600');
INSERT INTO `aijiacms_setting` VALUES('16','thumb_height','150');
INSERT INTO `aijiacms_setting` VALUES('16','thumb_width','150');
INSERT INTO `aijiacms_setting` VALUES('16','template_price','');
INSERT INTO `aijiacms_setting` VALUES('16','template_search','');
INSERT INTO `aijiacms_setting` VALUES('16','template_show','');
INSERT INTO `aijiacms_setting` VALUES('16','template_list','');
INSERT INTO `aijiacms_setting` VALUES('16','template_index','');
INSERT INTO `aijiacms_setting` VALUES('16','title_index','');
INSERT INTO `aijiacms_setting` VALUES('16','title_list','');
INSERT INTO `aijiacms_setting` VALUES('16','title_show','');
INSERT INTO `aijiacms_setting` VALUES('16','keywords_index','');
INSERT INTO `aijiacms_setting` VALUES('16','keywords_list','');
INSERT INTO `aijiacms_setting` VALUES('16','keywords_show','');
INSERT INTO `aijiacms_setting` VALUES('16','description_index','');
INSERT INTO `aijiacms_setting` VALUES('16','description_list','');
INSERT INTO `aijiacms_setting` VALUES('16','description_show','');
INSERT INTO `aijiacms_setting` VALUES('16','module','buy');
INSERT INTO `aijiacms_setting` VALUES('18','sphinx','0');
INSERT INTO `aijiacms_setting` VALUES('18','split','0');
INSERT INTO `aijiacms_setting` VALUES('18','keylink','0');
INSERT INTO `aijiacms_setting` VALUES('18','clear_link','0');
INSERT INTO `aijiacms_setting` VALUES('18','save_remotepic','0');
INSERT INTO `aijiacms_setting` VALUES('18','cat_property','0');
INSERT INTO `aijiacms_setting` VALUES('18','inquiry_ask','');
INSERT INTO `aijiacms_setting` VALUES('18','inquiry_type','');
INSERT INTO `aijiacms_setting` VALUES('18','type','');
INSERT INTO `aijiacms_setting` VALUES('18','fields','*');
INSERT INTO `aijiacms_setting` VALUES('18','order','editdate desc,vip desc,edittime desc');
INSERT INTO `aijiacms_setting` VALUES('18','editor','Default');
INSERT INTO `aijiacms_setting` VALUES('18','thumb_height','200');
INSERT INTO `aijiacms_setting` VALUES('18','introduce_length','120');
INSERT INTO `aijiacms_setting` VALUES('18','thumb_width','200');
INSERT INTO `aijiacms_setting` VALUES('18','title_index','');
INSERT INTO `aijiacms_setting` VALUES('18','title_list','');
INSERT INTO `aijiacms_setting` VALUES('18','title_show','');
INSERT INTO `aijiacms_setting` VALUES('18','keywords_index','');
INSERT INTO `aijiacms_setting` VALUES('18','keywords_list','');
INSERT INTO `aijiacms_setting` VALUES('18','keywords_show','');
INSERT INTO `aijiacms_setting` VALUES('18','description_index','');
INSERT INTO `aijiacms_setting` VALUES('18','description_list','');
INSERT INTO `aijiacms_setting` VALUES('18','description_show','');
INSERT INTO `aijiacms_setting` VALUES('18','module','community');
INSERT INTO `aijiacms_setting` VALUES('pay-tenpay','enable','0');
INSERT INTO `aijiacms_setting` VALUES('pay-alipay','enable','0');
INSERT INTO `aijiacms_setting` VALUES('pay-chinabank','enable','0');
INSERT INTO `aijiacms_setting` VALUES('pay-yeepay','enable','0');
INSERT INTO `aijiacms_setting` VALUES('pay-kq99bill','enable','0');
INSERT INTO `aijiacms_setting` VALUES('pay-chinapay','enable','0');
INSERT INTO `aijiacms_setting` VALUES('pay-paypal','enable','0');
INSERT INTO `aijiacms_setting` VALUES('oauth-sina','enable','0');
INSERT INTO `aijiacms_setting` VALUES('oauth-baidu','enable','0');
INSERT INTO `aijiacms_setting` VALUES('oauth-netease','key','');
INSERT INTO `aijiacms_setting` VALUES('oauth-netease','id','');
INSERT INTO `aijiacms_setting` VALUES('oauth-netease','order','4');
INSERT INTO `aijiacms_setting` VALUES('oauth-msn','enable','0');
INSERT INTO `aijiacms_setting` VALUES('group-1','uploadsize','0');
INSERT INTO `aijiacms_setting` VALUES('group-1','uploadtype','');
INSERT INTO `aijiacms_setting` VALUES('group-1','upload','1');
INSERT INTO `aijiacms_setting` VALUES('group-1','editor','Default');
INSERT INTO `aijiacms_setting` VALUES('group-1','grade','0');
INSERT INTO `aijiacms_setting` VALUES('group-1','discount','100');
INSERT INTO `aijiacms_setting` VALUES('group-1','fee','0');
INSERT INTO `aijiacms_setting` VALUES('group-1','fee_mode','0');
INSERT INTO `aijiacms_setting` VALUES('group-1','buy_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-1','buy_free_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-1','group_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-1','group_free_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-1','article_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-1','article_free_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-1','info_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-1','info_free_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-1','photo_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-1','photo_free_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-1','video_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-1','video_free_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-2','mall_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-2','mall_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','group_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-2','group_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','exhibit_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-2','exhibit_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','quote_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-2','quote_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','job_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-2','job_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','resume_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-2','resume_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','photo_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-2','photo_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','video_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-2','video_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-2','down_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-2','down_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-3','editor','Basic');
INSERT INTO `aijiacms_setting` VALUES('group-3','grade','0');
INSERT INTO `aijiacms_setting` VALUES('group-3','discount','100');
INSERT INTO `aijiacms_setting` VALUES('group-3','fee','0');
INSERT INTO `aijiacms_setting` VALUES('group-3','fee_mode','0');
INSERT INTO `aijiacms_setting` VALUES('group-3','photo_limit','3');
INSERT INTO `aijiacms_setting` VALUES('group-3','photo_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-3','video_limit','3');
INSERT INTO `aijiacms_setting` VALUES('group-3','video_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-4','quote_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-4','quote_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-4','job_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-4','job_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-4','resume_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-4','resume_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-4','article_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-4','article_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-4','info_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-4','know_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-4','know_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-4','brand_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-4','brand_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-4','photo_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-4','photo_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-4','video_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-4','video_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-4','down_limit','-1');
INSERT INTO `aijiacms_setting` VALUES('group-4','down_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-6','group_limit','5');
INSERT INTO `aijiacms_setting` VALUES('group-6','group_free_limit','1');
INSERT INTO `aijiacms_setting` VALUES('group-6','article_limit','15');
INSERT INTO `aijiacms_setting` VALUES('group-6','article_free_limit','1');
INSERT INTO `aijiacms_setting` VALUES('group-6','info_limit','5');
INSERT INTO `aijiacms_setting` VALUES('group-6','info_free_limit','1');
INSERT INTO `aijiacms_setting` VALUES('group-6','photo_limit','5');
INSERT INTO `aijiacms_setting` VALUES('group-6','photo_free_limit','1');
INSERT INTO `aijiacms_setting` VALUES('group-6','video_limit','5');
INSERT INTO `aijiacms_setting` VALUES('group-6','video_free_limit','1');
INSERT INTO `aijiacms_setting` VALUES('group-7','group_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-7','group_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-7','article_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-7','article_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-7','info_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-7','info_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-7','photo_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-7','photo_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-7','video_limit','0');
INSERT INTO `aijiacms_setting` VALUES('group-7','video_free_limit','0');
INSERT INTO `aijiacms_setting` VALUES('aijiacms','backtime','1435899956');
INSERT INTO `aijiacms_setting` VALUES('1','check_referer','1');
INSERT INTO `aijiacms_setting` VALUES('1','authadmin','session');
INSERT INTO `aijiacms_setting` VALUES('1','uploaddir','Ym/d');
INSERT INTO `aijiacms_setting` VALUES('1','uploadsize','2048');
INSERT INTO `aijiacms_setting` VALUES('1','uploadtype','jpg|gif|png|rar|zip|doc|pdf|xls|ppt|flv|wmv|swf');
INSERT INTO `aijiacms_setting` VALUES('1','uploadlog','1');
INSERT INTO `aijiacms_setting` VALUES('1','anticopy','0');
INSERT INTO `aijiacms_setting` VALUES('1','ip_login','0');
INSERT INTO `aijiacms_setting` VALUES('1','login_log','0');
INSERT INTO `aijiacms_setting` VALUES('1','admin_log','0');
INSERT INTO `aijiacms_setting` VALUES('1','admin_online','0');
INSERT INTO `aijiacms_setting` VALUES('1','md5_pass','1');
INSERT INTO `aijiacms_setting` VALUES('1','captcha_admin','0');
INSERT INTO `aijiacms_setting` VALUES('1','captcha_cn','0');
INSERT INTO `aijiacms_setting` VALUES('1','captcha_chars','');
INSERT INTO `aijiacms_setting` VALUES('1','check_hour','');
INSERT INTO `aijiacms_setting` VALUES('1','admin_hour','');
INSERT INTO `aijiacms_setting` VALUES('1','admin_ip','');
INSERT INTO `aijiacms_setting` VALUES('1','admin_area','');
INSERT INTO `aijiacms_setting` VALUES('1','remote_url','');
INSERT INTO `aijiacms_setting` VALUES('1','ftp_path','');
INSERT INTO `aijiacms_setting` VALUES('1','ftp_pasv','0');
INSERT INTO `aijiacms_setting` VALUES('1','ftp_ssl','0');
INSERT INTO `aijiacms_setting` VALUES('1','ftp_pass','');
INSERT INTO `aijiacms_setting` VALUES('1','ftp_user','');
INSERT INTO `aijiacms_setting` VALUES('1','ftp_port','21');
INSERT INTO `aijiacms_setting` VALUES('1','ftp_host','');
INSERT INTO `aijiacms_setting` VALUES('1','ftp_remote','0');
INSERT INTO `aijiacms_setting` VALUES('1','schcate_limit','10');
INSERT INTO `aijiacms_setting` VALUES('1','pagesize','20');
INSERT INTO `aijiacms_setting` VALUES('1','pushtime','0');
INSERT INTO `aijiacms_setting` VALUES('1','online','1200');
INSERT INTO `aijiacms_setting` VALUES('1','search_limit','1');
INSERT INTO `aijiacms_setting` VALUES('1','max_kw','30');
INSERT INTO `aijiacms_setting` VALUES('1','min_kw','3');
INSERT INTO `aijiacms_setting` VALUES('1','search_check_kw','0');
INSERT INTO `aijiacms_setting` VALUES('1','search_kw','1');
INSERT INTO `aijiacms_setting` VALUES('1','save_draft','2');
INSERT INTO `aijiacms_setting` VALUES('1','search_tips','1');
INSERT INTO `aijiacms_setting` VALUES('1','anti_spam','1');
INSERT INTO `aijiacms_setting` VALUES('1','log_credit','1');
INSERT INTO `aijiacms_setting` VALUES('1','lazy','0');
INSERT INTO `aijiacms_setting` VALUES('1','pages_mode','0');
INSERT INTO `aijiacms_setting` VALUES('1','index_html','0');
INSERT INTO `aijiacms_setting` VALUES('1','rewrite','0');
INSERT INTO `aijiacms_setting` VALUES('1','com_www','0');
INSERT INTO `aijiacms_setting` VALUES('1','pcharset','0');
INSERT INTO `aijiacms_setting` VALUES('1','log_404','0');
INSERT INTO `aijiacms_setting` VALUES('1','task_index','600');
INSERT INTO `aijiacms_setting` VALUES('1','task_list','1800');
INSERT INTO `aijiacms_setting` VALUES('1','task_item','');
INSERT INTO `aijiacms_setting` VALUES('1','cache_search','0');
INSERT INTO `aijiacms_setting` VALUES('1','cache_hits','0');
INSERT INTO `aijiacms_setting` VALUES('1','cache_home','');
INSERT INTO `aijiacms_setting` VALUES('1','gzip_enable','0');
INSERT INTO `aijiacms_setting` VALUES('1','index','index');
INSERT INTO `aijiacms_setting` VALUES('1','file_ext','html');
INSERT INTO `aijiacms_setting` VALUES('1','seo_description','歪歪分享论坛房产网站是基于PHP+MySQL的房产行业门户解决方案');
INSERT INTO `aijiacms_setting` VALUES('1','seo_keywords','房产网站系统,房产行业门户系统,房产解决方案,歪歪分享论坛房产网站');
INSERT INTO `aijiacms_setting` VALUES('1','seo_title','无锡房产');
INSERT INTO `aijiacms_setting` VALUES('1','seo_delimiter','_');
INSERT INTO `aijiacms_setting` VALUES('1','trade_nu','notify.php');
INSERT INTO `aijiacms_setting` VALUES('1','trade_tp','0');
INSERT INTO `aijiacms_setting` VALUES('1','trade_ac','');
INSERT INTO `aijiacms_setting` VALUES('1','trade_pw','');
INSERT INTO `aijiacms_setting` VALUES('1','trade_id','');
INSERT INTO `aijiacms_setting` VALUES('1','trade_hm','http://www.alipay.com/');
INSERT INTO `aijiacms_setting` VALUES('1','trade_nm','支付宝');
INSERT INTO `aijiacms_setting` VALUES('1','trade','');
INSERT INTO `aijiacms_setting` VALUES('1','page_group','3');
INSERT INTO `aijiacms_setting` VALUES('1','page_text','18');
INSERT INTO `aijiacms_setting` VALUES('1','page_logo','18');
INSERT INTO `aijiacms_setting` VALUES('1','sms_ok','');
INSERT INTO `aijiacms_setting` VALUES('1','sms_len','');
INSERT INTO `aijiacms_setting` VALUES('1','sms_fee','');
INSERT INTO `aijiacms_setting` VALUES('1','sms_key','');
INSERT INTO `aijiacms_setting` VALUES('1','sms_sign','');
INSERT INTO `aijiacms_setting` VALUES('1','sms_uid','');
INSERT INTO `aijiacms_setting` VALUES('1','admin_left','188');
INSERT INTO `aijiacms_setting` VALUES('1','im_web','1');
INSERT INTO `aijiacms_setting` VALUES('1','im_qq','1');
INSERT INTO `aijiacms_setting` VALUES('1','sms','0');
INSERT INTO `aijiacms_setting` VALUES('1','credit_unit','点');
INSERT INTO `aijiacms_setting` VALUES('1','credit_name','积分');
INSERT INTO `aijiacms_setting` VALUES('1','money_unit','元');
INSERT INTO `aijiacms_setting` VALUES('1','map_mid','120.418616,36.166972');
INSERT INTO `aijiacms_setting` VALUES('1','city','0');
INSERT INTO `aijiacms_setting` VALUES('1','city_ip','0');
INSERT INTO `aijiacms_setting` VALUES('1','money_name','资金');
INSERT INTO `aijiacms_setting` VALUES('1','city_sitename','');
INSERT INTO `aijiacms_setting` VALUES('1','close','0');
INSERT INTO `aijiacms_setting` VALUES('1','close_reason','网站维护中，请稍候访问...');
INSERT INTO `aijiacms_setting` VALUES('1','icpno','备案申请中');
INSERT INTO `aijiacms_setting` VALUES('1','QQ','');
INSERT INTO `aijiacms_setting` VALUES('1','telephone','');
INSERT INTO `aijiacms_setting` VALUES('1','copyright','Copyright (c) 2010-2014 歪歪分享论坛房产网站 All Rights Reserved ');
INSERT INTO `aijiacms_setting` VALUES('1','waplogo','');
INSERT INTO `aijiacms_setting` VALUES('1','logo','');
INSERT INTO `aijiacms_setting` VALUES('1','sitename','歪歪分享论坛房产网站');
INSERT INTO `aijiacms_setting` VALUES('6','fee_add','10');
INSERT INTO `aijiacms_setting` VALUES('6','fields','itemid,title,thumb,linkurl,style,catid,areaid,introduce,addtime,edittime,username,company,groupid,vip,qq,msn,ali,skype,validated,price,tedian,telephone,level,address,lpts,typeid');
INSERT INTO `aijiacms_setting` VALUES('6','order','level desc,editdate desc,vip desc,edittime desc');
INSERT INTO `aijiacms_setting` VALUES('6','editor','Simple');
INSERT INTO `aijiacms_setting` VALUES('6','introduce_length','120');
INSERT INTO `aijiacms_setting` VALUES('6','thumb_height','200');
INSERT INTO `aijiacms_setting` VALUES('6','thumb_width','200');
INSERT INTO `aijiacms_setting` VALUES('6','template_inquiry','');
INSERT INTO `aijiacms_setting` VALUES('6','template_compare','');
INSERT INTO `aijiacms_setting` VALUES('6','template_my','');
INSERT INTO `aijiacms_setting` VALUES('6','template_search','');
INSERT INTO `aijiacms_setting` VALUES('6','template_show','');
INSERT INTO `aijiacms_setting` VALUES('6','template_list','');
INSERT INTO `aijiacms_setting` VALUES('6','template_index','');
INSERT INTO `aijiacms_setting` VALUES('1','admin_week','');
INSERT INTO `aijiacms_setting` VALUES('1','check_week','');
INSERT INTO `aijiacms_setting` VALUES('6','fee_period','0');
INSERT INTO `aijiacms_setting` VALUES('6','fee_back','0');
INSERT INTO `aijiacms_setting` VALUES('6','credit_add','2');
INSERT INTO `aijiacms_setting` VALUES('6','credit_del','5');
INSERT INTO `aijiacms_setting` VALUES('6','credit_color','100');
INSERT INTO `aijiacms_setting` VALUES('6','credit_elite','');
INSERT INTO `aijiacms_setting` VALUES('6','credit_refresh','1');

DROP TABLE IF EXISTS `aijiacms_sms`;
CREATE TABLE `aijiacms_sms` (
  `itemid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `mobile` varchar(30) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `word` int(10) unsigned NOT NULL DEFAULT '0',
  `editor` varchar(30) NOT NULL DEFAULT '',
  `sendtime` int(10) unsigned NOT NULL DEFAULT '0',
  `code` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='短信记录';


DROP TABLE IF EXISTS `aijiacms_special`;
CREATE TABLE `aijiacms_special` (
  `itemid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `areaid` int(10) unsigned NOT NULL DEFAULT '0',
  `level` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `style` varchar(50) NOT NULL DEFAULT '',
  `introduce` varchar(255) NOT NULL DEFAULT '',
  `tag` varchar(100) NOT NULL DEFAULT '',
  `keyword` varchar(255) NOT NULL DEFAULT '',
  `pptword` varchar(255) NOT NULL DEFAULT '',
  `items` int(10) unsigned NOT NULL DEFAULT '0',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `thumb` varchar(255) NOT NULL DEFAULT '',
  `banner` varchar(255) NOT NULL DEFAULT '',
  `cfg_photo` smallint(4) unsigned NOT NULL DEFAULT '0',
  `cfg_video` smallint(4) unsigned NOT NULL DEFAULT '0',
  `cfg_type` smallint(4) unsigned NOT NULL DEFAULT '0',
  `seo_title` varchar(255) NOT NULL DEFAULT '',
  `seo_keywords` varchar(255) NOT NULL DEFAULT '',
  `seo_description` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(30) NOT NULL DEFAULT '',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `editor` varchar(30) NOT NULL DEFAULT '',
  `edittime` int(10) unsigned NOT NULL DEFAULT '0',
  `ip` varchar(50) NOT NULL DEFAULT '',
  `template` varchar(30) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `islink` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `linkurl` varchar(255) NOT NULL DEFAULT '',
  `filepath` varchar(255) NOT NULL DEFAULT '',
  `domain` varchar(255) NOT NULL DEFAULT '',
  `note` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`itemid`),
  KEY `addtime` (`addtime`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='专题';


DROP TABLE IF EXISTS `aijiacms_special_data`;
CREATE TABLE `aijiacms_special_data` (
  `itemid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `content` longtext NOT NULL,
  PRIMARY KEY (`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='专题内容';


DROP TABLE IF EXISTS `aijiacms_special_item`;
CREATE TABLE `aijiacms_special_item` (
  `itemid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `specialid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `typeid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `level` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `style` varchar(50) NOT NULL DEFAULT '',
  `introduce` varchar(255) NOT NULL DEFAULT '',
  `thumb` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(30) NOT NULL DEFAULT '',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `editor` varchar(30) NOT NULL DEFAULT '',
  `edittime` int(10) unsigned NOT NULL DEFAULT '0',
  `ip` varchar(50) NOT NULL DEFAULT '',
  `linkurl` varchar(255) NOT NULL DEFAULT '',
  `note` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`itemid`),
  KEY `addtime` (`addtime`),
  KEY `specialid` (`specialid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='专题信息';


DROP TABLE IF EXISTS `aijiacms_sphinx`;
CREATE TABLE `aijiacms_sphinx` (
  `moduleid` int(10) unsigned NOT NULL DEFAULT '0',
  `maxid` bigint(20) unsigned NOT NULL DEFAULT '0',
  UNIQUE KEY `moduleid` (`moduleid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Sphinx';


DROP TABLE IF EXISTS `aijiacms_spread`;
CREATE TABLE `aijiacms_spread` (
  `itemid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `mid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `tid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `word` varchar(50) NOT NULL DEFAULT '',
  `price` float NOT NULL DEFAULT '0',
  `currency` varchar(30) NOT NULL DEFAULT '',
  `company` varchar(100) NOT NULL DEFAULT '',
  `username` varchar(30) NOT NULL DEFAULT '',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `fromtime` int(10) unsigned NOT NULL DEFAULT '0',
  `totime` int(10) unsigned NOT NULL DEFAULT '0',
  `editor` varchar(30) NOT NULL DEFAULT '',
  `edittime` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `note` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='排名推广';


DROP TABLE IF EXISTS `aijiacms_spread_price`;
CREATE TABLE `aijiacms_spread_price` (
  `itemid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `word` varchar(50) NOT NULL DEFAULT '',
  `sell_price` float NOT NULL DEFAULT '0',
  `buy_price` float NOT NULL DEFAULT '0',
  `company_price` float NOT NULL DEFAULT '0',
  `editor` varchar(30) NOT NULL DEFAULT '',
  `edittime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='排名起价';


DROP TABLE IF EXISTS `aijiacms_style`;
CREATE TABLE `aijiacms_style` (
  `itemid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `typeid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `skin` varchar(50) NOT NULL DEFAULT '',
  `template` varchar(50) NOT NULL DEFAULT '',
  `author` varchar(30) NOT NULL DEFAULT '',
  `groupid` varchar(30) NOT NULL DEFAULT '',
  `fee` float NOT NULL DEFAULT '0',
  `currency` varchar(20) NOT NULL DEFAULT '',
  `money` float NOT NULL DEFAULT '0',
  `credit` int(10) unsigned NOT NULL DEFAULT '0',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `editor` varchar(30) NOT NULL DEFAULT '',
  `edittime` int(10) unsigned NOT NULL DEFAULT '0',
  `listorder` smallint(4) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`itemid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='公司主页模板';

INSERT INTO `aijiacms_style` VALUES('1','0','深蓝模板','blue','homepage','AIjiacms.com',',6,7,','0','credit','0','0','2','1435899956','admin','1435899956','0');
INSERT INTO `aijiacms_style` VALUES('2','0','绿色模板','green','homepage','AIjiacms.com',',6,7,','0','credit','0','0','0','1435899956','admin','1435899956','0');
INSERT INTO `aijiacms_style` VALUES('3','0','紫色模板','purple','homepage','AIjiacms.com',',6,7,8,','0','credit','0','0','1','1435899956','admin','1435899956','0');
INSERT INTO `aijiacms_style` VALUES('4','0','橙色模板','orange','homepage','AIjiacms.com',',6,7,','0','credit','0','0','0','1435899956','admin','1435899956','0');
INSERT INTO `aijiacms_style` VALUES('5','0','中介模版','broker','broker','AIjiacms.com',',7,','0','credit','0','0','4294967292','1435899956','admin','1435899956','0');
INSERT INTO `aijiacms_style` VALUES('6','0','经纪人模版','agency','agency','',',6,','0','credit','0','0','0','1435899956','admin','1435899956','0');

DROP TABLE IF EXISTS `aijiacms_type`;
CREATE TABLE `aijiacms_type` (
  `typeid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `listorder` smallint(4) NOT NULL DEFAULT '0',
  `typename` varchar(255) NOT NULL DEFAULT '',
  `style` varchar(50) NOT NULL DEFAULT '',
  `item` varchar(20) NOT NULL DEFAULT '',
  `cache` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`typeid`),
  KEY `listorder` (`listorder`),
  KEY `item` (`item`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='分类';

INSERT INTO `aijiacms_type` VALUES('1','0','服务','','ask','1');
INSERT INTO `aijiacms_type` VALUES('2','0','本站公告','','announce','1');
INSERT INTO `aijiacms_type` VALUES('3','0','新房调查','','vote','1');
INSERT INTO `aijiacms_type` VALUES('4','0','房产','','link','1');
INSERT INTO `aijiacms_type` VALUES('5','0','新房','','mail','1');

DROP TABLE IF EXISTS `aijiacms_upgrade`;
CREATE TABLE `aijiacms_upgrade` (
  `itemid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `username` varchar(30) NOT NULL DEFAULT '',
  `groupid` smallint(4) unsigned NOT NULL DEFAULT '0',
  `amount` float NOT NULL DEFAULT '0',
  `message` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `company` varchar(100) NOT NULL DEFAULT '',
  `truename` varchar(30) NOT NULL DEFAULT '',
  `telephone` varchar(30) NOT NULL DEFAULT '',
  `mobile` varchar(30) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `msn` varchar(50) NOT NULL DEFAULT '',
  `qq` varchar(30) NOT NULL DEFAULT '',
  `ali` varchar(30) NOT NULL DEFAULT '',
  `skype` varchar(30) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `ip` varchar(50) NOT NULL DEFAULT '',
  `promo_code` varchar(30) NOT NULL DEFAULT '',
  `promo_type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `promo_amount` float NOT NULL DEFAULT '0',
  `editor` varchar(30) NOT NULL DEFAULT '',
  `edittime` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `note` text NOT NULL,
  PRIMARY KEY (`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='会员升级';


DROP TABLE IF EXISTS `aijiacms_upload_0`;
CREATE TABLE `aijiacms_upload_0` (
  `pid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item` varchar(32) NOT NULL DEFAULT '',
  `moduleid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `itemid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `fileurl` varchar(255) NOT NULL DEFAULT '',
  `filesize` int(10) unsigned NOT NULL DEFAULT '0',
  `fileext` varchar(10) NOT NULL DEFAULT '',
  `upfrom` varchar(10) NOT NULL DEFAULT '',
  `width` int(10) unsigned NOT NULL DEFAULT '0',
  `height` int(10) unsigned NOT NULL DEFAULT '0',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `username` varchar(30) NOT NULL DEFAULT '',
  `ip` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`pid`),
  KEY `item` (`item`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='上传记录0';


DROP TABLE IF EXISTS `aijiacms_upload_1`;
CREATE TABLE `aijiacms_upload_1` (
  `pid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item` varchar(32) NOT NULL DEFAULT '',
  `moduleid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `itemid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `fileurl` varchar(255) NOT NULL DEFAULT '',
  `filesize` int(10) unsigned NOT NULL DEFAULT '0',
  `fileext` varchar(10) NOT NULL DEFAULT '',
  `upfrom` varchar(10) NOT NULL DEFAULT '',
  `width` int(10) unsigned NOT NULL DEFAULT '0',
  `height` int(10) unsigned NOT NULL DEFAULT '0',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `username` varchar(30) NOT NULL DEFAULT '',
  `ip` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`pid`),
  KEY `item` (`item`)
) ENGINE=MyISAM AUTO_INCREMENT=81 DEFAULT CHARSET=utf8 COMMENT='上传记录1';

INSERT INTO `aijiacms_upload_1` VALUES('1','7b938633b570c9d58962e40c04a91b2c','3','0','http://yiti.15115.cn/file/upload/201509/15/20-03-19-28-1.jpg','21534','jpg','thumb','400','160','1442318599','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('2','11a2f6296ae1ffef6dce2e5984429e86','8','0','http://yiti.15115.cn/file/upload/201509/15/22-36-01-84-1.jpg','3683','jpg','thumb','100','100','1442327761','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('3','4ebac43dc80291a700f570de624dddff','8','0','http://yiti.15115.cn/file/upload/201509/15/22-51-52-89-1.jpg','67503','jpg','thumb','1024','336','1442328712','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('6','c59bb3b116a0875088de937f65bb31f2','1','0','http://yiti.15115.cn/file/upload/201509/15/23-43-11-38-1.jpg','370428','jpg','photo','800','550','1442331791','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('5','4d6be93e76e792c12d9d488064c36e9f','6','0','http://yiti.15115.cn/file/upload/201509/15/23-37-39-59-1.jpg','370428','jpg','album','800','550','1442331459','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('7','195a47f285930186eea98a8072a6f338','1','0','http://yiti.15115.cn/file/upload/201509/15/23-43-12-49-1.jpg','125398','jpg','photo','650','608','1442331792','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('8','75868716d946dc24e551f3e10724235f','1','0','http://yiti.15115.cn/file/upload/201509/15/23-43-12-55-1.jpg','184127','jpg','photo','800','471','1442331792','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('9','2b70cfa82eb6c3809f23071ee6918f4f','1','0','http://yiti.15115.cn/file/upload/201509/15/23-43-12-52-1.jpg','114537','jpg','photo','800','570','1442331792','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('10','44d57d637cb92766e58133c2142a19f3','1','0','http://yiti.15115.cn/file/upload/201509/15/23-43-12-25-1.jpg','105481','jpg','photo','650','488','1442331792','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('11','c54aad815756d4e9ca3679dac9cd6069','1','0','http://yiti.15115.cn/file/upload/201509/15/23-46-12-30-1.jpg','116015','jpg','photo','800','479','1442331972','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('12','400ac942b699a7c9cfbb8fa0361d4ae8','1','0','http://yiti.15115.cn/file/upload/201509/15/23-46-12-56-1.jpg','118865','jpg','photo','800','556','1442331972','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('13','dfff392d7da69fe6f118d55d05fc6321','1','0','http://yiti.15115.cn/file/upload/201509/15/23-46-12-36-1.jpg','168684','jpg','photo','768','1024','1442331972','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('15','ae9f1ebee523aa756d2f518427fa0a19','18','0','http://yiti.15115.cn/file/upload/201509/16/00-00-12-85-1.jpg','184127','jpg','album','800','471','1442332812','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('16','325ad71be92756339605f4e84b8a736a','18','0','http://yiti.15115.cn/file/upload/201509/16/00-00-21-46-1.jpg','114537','jpg','album','800','570','1442332821','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('17','54d0981bd46a732de43f42cddd758d3e','18','0','http://yiti.15115.cn/file/upload/201509/16/00-00-27-53-1.jpg','105481','jpg','album','650','488','1442332827','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('18','61901fc8c9f20b9ba1a2366cb7ef908b','18','0','http://yiti.15115.cn/file/upload/201509/16/00-01-35-38-1.jpg','184127','jpg','album','800','471','1442332895','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('19','2ab6c879c716bde43720e146524ab584','18','0','http://yiti.15115.cn/file/upload/201509/16/00-01-43-89-1.jpg','114537','jpg','album','800','570','1442332903','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('20','e8458d2cf5866a6d7e3ae093c87b6b03','18','0','http://yiti.15115.cn/file/upload/201509/16/00-01-57-74-1.jpg','105481','jpg','album','650','488','1442332917','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('21','92f934fde81e6f3250bd7ce47690f81d','1','0','http://yiti.15115.cn/file/upload/201509/16/00-34-02-10-1.jpg','96575','jpg','photo','800','593','1442334842','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('22','60dc7fc1951ad7578e283fbc9d211f22','1','0','http://yiti.15115.cn/file/upload/201509/16/00-34-02-29-1.jpg','116015','jpg','photo','800','479','1442334842','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('23','8caa17a897ce56d4b5a4ee6765797a72','1','0','http://yiti.15115.cn/file/upload/201509/16/00-34-03-15-1.jpg','118865','jpg','photo','800','556','1442334843','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('24','6135e515bcb7eb5822db1dc3361c14bc','1','0','http://yiti.15115.cn/file/upload/201509/16/00-34-03-95-1.jpg','168684','jpg','photo','768','1024','1442334843','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('25','1507bfe3f4d0a554a2f1446dcfef814a','1','0','http://yiti.15115.cn/file/upload/201509/16/00-36-30-93-1.jpg','96575','jpg','photo','800','593','1442334990','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('26','e72daab935f70778dcef1f6df3560fa7','1','0','http://yiti.15115.cn/file/upload/201509/16/00-36-31-83-1.jpg','116015','jpg','photo','800','479','1442334991','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('27','2dbcfa1592b7c5cd2356bf3bea1a3521','1','0','http://yiti.15115.cn/file/upload/201509/16/00-36-31-76-1.jpg','118865','jpg','photo','800','556','1442334991','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('28','38e12f72ef990623b5a59e455c649ab9','1','0','http://yiti.15115.cn/file/upload/201509/16/00-36-31-47-1.jpg','168684','jpg','photo','768','1024','1442334991','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('29','2ec87cd6ccb37e44f1ebd5d577b44ace','1','0','http://yiti.15115.cn/file/upload/201509/16/00-45-39-98-1.jpg','65093','jpg','photo','800','313','1442335539','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('30','60bc9509094e357522493aedee8b14ff','1','0','http://yiti.15115.cn/file/upload/201509/16/00-45-39-42-1.jpg','42123','jpg','photo','640','346','1442335539','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('31','90971819905c2d3cada32e3510c9f164','1','0','http://yiti.15115.cn/file/upload/201509/16/00-45-39-12-1.jpg','62837','jpg','photo','640','364','1442335539','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('32','c2cd5a850458d819d5253e4f20c5c2c8','1','0','http://yiti.15115.cn/file/upload/201509/16/00-47-23-99-1.jpg','155087','jpg','photo','800','601','1442335643','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('33','c9356c6453d24527702df03820fb78e6','1','0','http://yiti.15115.cn/file/upload/201509/16/00-47-24-45-1.jpg','142518','jpg','photo','790','550','1442335644','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('34','86c02af642935fc6712d3212ec033503','6','0','http://yiti.15115.cn/file/upload/201509/16/12-10-33-44-1.jpg','114537','jpg','album','800','570','1442376633','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('35','0024ac32551b82a5a5a3eaea3a8e41bd','6','0','http://yiti.15115.cn/file/upload/201509/16/13-45-27-44-1.jpg','105481','jpg','album','650','488','1442382327','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('36','6aaef8c23f013cfe800d1a16d663c80a','6','0','http://yiti.15115.cn/file/upload/201509/16/13-47-54-29-1.jpg','370428','jpg','album','800','550','1442382474','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('37','b7aae2d32f7feaf2d0e850c57aadb8a3','6','0','http://yiti.15115.cn/file/upload/201509/16/13-50-52-92-1.jpg','102163','jpg','album','800','600','1442382652','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('38','ba296e20c9dd9e59041f45b171314220','6','0','http://yiti.15115.cn/file/upload/201509/16/13-51-31-44-1.jpg','97250','jpg','album','800','548','1442382691','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('39','dd716f33762543011a8d6aa2a0954068','1','0','http://yiti.15115.cn/file/upload/201509/16/14-30-10-15-1.jpg','62837','jpg','photo','640','364','1442385010','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('40','44af15b54c178e6090a156173b2e703b','1','0','http://yiti.15115.cn/file/upload/201509/16/14-30-10-71-1.jpg','114537','jpg','photo','800','570','1442385010','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('41','4e574271c08b0f3851c13ff681dfcd5b','1','0','http://yiti.15115.cn/file/upload/201509/16/14-30-10-77-1.jpg','118865','jpg','photo','800','556','1442385010','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('42','bbd5146a959ee584503277113b43b561','1','0','http://yiti.15115.cn/file/upload/201509/16/14-30-11-52-1.jpg','42123','jpg','photo','640','346','1442385011','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('43','e3a54fab484c0863a95592636fd3c796','1','0','http://yiti.15115.cn/file/upload/201509/16/15-01-18-21-1.jpg','62837','jpg','photo','640','364','1442386878','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('44','294101259b9888c5850b578257270900','1','0','http://yiti.15115.cn/file/upload/201509/16/15-01-19-19-1.jpg','114537','jpg','photo','800','570','1442386879','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('45','8723dc5f2394d6dc45eb3a76b7fc737e','1','0','http://yiti.15115.cn/file/upload/201509/16/15-01-19-64-1.jpg','168684','jpg','photo','768','1024','1442386879','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('46','5ef70c4345e08cb7dbf2f911902e97a2','1','0','http://yiti.15115.cn/file/upload/201509/16/15-03-57-66-1.jpg','168684','jpg','photo','768','1024','1442387037','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('47','5d879426346804bb7304a226b85d0409','1','0','http://yiti.15115.cn/file/upload/201509/16/15-03-58-95-1.jpg','62837','jpg','photo','640','364','1442387038','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('48','ff6671a84ecf6a182dd9031a8a6c39df','1','0','http://yiti.15115.cn/file/upload/201509/16/15-03-58-57-1.jpg','97250','jpg','photo','800','548','1442387038','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('49','0c0bb35ab803f29de267e37de6607a93','1','0','http://yiti.15115.cn/file/upload/201509/16/15-04-18-55-1.jpg','62837','jpg','photo','640','364','1442387058','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('50','e2fc7765d0470c45124d79cf0e6b6d23','1','0','http://yiti.15115.cn/file/upload/201509/16/15-15-22-73-1.jpg','97250','jpg','photo','800','548','1442387722','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('51','7b023f1d45158f169d2fee0cabd6ea56','1','0','http://yiti.15115.cn/file/upload/201509/16/15-15-22-12-1.jpg','116015','jpg','photo','800','479','1442387722','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('52','a059af1801cae4cbca718a35c021454b','1','0','http://yiti.15115.cn/file/upload/201509/16/15-15-23-78-1.jpg','42123','jpg','photo','640','346','1442387723','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('53','bf592d3a0f801ef06e79a8714561d835','1','0','http://yiti.15115.cn/file/upload/201509/16/15-17-02-49-1.jpg','105481','jpg','photo','650','488','1442387822','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('54','15902cefed27a833d90f65db9e0d63b3','1','0','http://yiti.15115.cn/file/upload/201509/16/15-17-02-50-1.jpg','370428','jpg','photo','800','550','1442387822','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('55','6c9a25ad8dbf2760f52c5fc0e49a5986','1','0','http://yiti.15115.cn/file/upload/201509/16/15-17-02-84-1.jpg','118865','jpg','photo','800','556','1442387822','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('56','cb2893c36afe4e7804adbf024a6de719','1','0','http://yiti.15115.cn/file/upload/201509/16/15-17-42-32-1.jpg','118865','jpg','photo','800','556','1442387862','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('57','7a43f1fcebc68db067a25516f604d4e4','1','0','http://yiti.15115.cn/file/upload/201509/16/15-17-43-49-1.jpg','105481','jpg','photo','650','488','1442387863','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('58','b026697d714548e29e8923436fee7c3f','8','0','http://yiti.15115.cn/file/upload/201509/16/15-23-35-56-1.jpg','5269','jpg','thumb','100','100','1442388215','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('59','54a2a5572247a0d07de95cb29a3dc305','1','0','http://yiti.15115.cn/file/upload/201509/16/21-41-53-48-1.jpg','168684','jpg','photo','768','1024','1442410913','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('60','297759d53b93bdec5cc5be6e963faf35','1','0','http://yiti.15115.cn/file/upload/201509/16/21-41-55-16-1.jpg','42123','jpg','photo','640','346','1442410915','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('61','aa18b02f3d05b5e718a7bd23bd2c177d','1','0','http://yiti.15115.cn/file/upload/201509/16/21-41-55-54-1.jpg','62837','jpg','photo','640','364','1442410915','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('62','c6f2d52d6944927df42f171dfd6a7664','1','0','http://yiti.15115.cn/file/upload/201509/16/21-41-55-14-1.jpg','97250','jpg','photo','800','548','1442410915','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('63','3657e054d871848df7e562117f2d527f','13','0','http://yiti.15115.cn/file/upload/201509/16/21-42-07-69-1.jpg','65093','jpg','album','800','313','1442410927','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('64','2e54cfcf4fc465f81ee3ad253ab4f5fc','13','0','http://yiti.15115.cn/file/upload/201509/16/21-42-18-19-1.jpg','62837','jpg','album','640','364','1442410938','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('65','71f9e75653e8127aa933d9934ad9fd1a','13','0','http://yiti.15115.cn/file/upload/201509/16/21-42-27-96-1.jpg','96575','jpg','album','800','593','1442410947','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('66','633369f0cda88770ee89ec1152453b6e','13','0','http://yiti.15115.cn/file/upload/201509/16/21-44-35-42-1.jpg','62837','jpg','album','640','364','1442411075','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('67','97ecbdf516bcdc7948276557a893f5dd','13','0','http://yiti.15115.cn/file/upload/201509/16/21-44-41-31-1.jpg','65093','jpg','album','800','313','1442411081','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('68','9665e6da0f36576451cda09a84eeddc9','13','0','http://yiti.15115.cn/file/upload/201509/16/21-44-48-16-1.jpg','168684','jpg','album','768','1024','1442411088','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('69','f64694d634e0da94e3e7d4c434110c71','8','0','http://yiti.15115.cn/file/upload/201509/16/21-47-17-54-1.jpg','4823','jpg','thumb','100','100','1442411237','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('70','9bb69ebf8f15cfdf57e0f15a7d08c673','8','0','http://yiti.15115.cn/file/upload/201509/16/21-59-08-46-1.jpg','4226','jpg','thumb','100','100','1442411948','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('71','ef1be816c22e327976f51b8852b9a0ed','8','0','http://yiti.15115.cn/file/upload/201509/16/22-08-01-36-1.jpg','4152','jpg','thumb','100','100','1442412481','admin','127.0.0.1');
INSERT INTO `aijiacms_upload_1` VALUES('72','be64f321c956dd44c7fc7f4b382b28e1','6','0','http://yiti.15115.cn/file/upload/201511/11/13-43-39-89-1.jpg','1591650','jpg','album','800','450','1447220619','admin','120.195.42.40');
INSERT INTO `aijiacms_upload_1` VALUES('73','3b60bb7e955c50cef853722cf4912c0a','1','0','http://yiti.15115.cn/file/upload/201511/11/13-47-54-40-1.jpg','89554','jpg','photo','755','565','1447220874','admin','120.195.42.40');
INSERT INTO `aijiacms_upload_1` VALUES('74','bd63d4f431ec0b09fa21a252c245ebd6','1','0','http://yiti.15115.cn/file/upload/201511/11/13-47-55-79-1.jpg','105061','jpg','photo','624','415','1447220875','admin','120.195.42.40');
INSERT INTO `aijiacms_upload_1` VALUES('75','9dd44e6f8f8a75bbac6890feef672987','1','0','http://yiti.15115.cn/file/upload/201511/11/13-47-55-83-1.jpg','60181','jpg','photo','561','785','1447220875','admin','120.195.42.40');
INSERT INTO `aijiacms_upload_1` VALUES('76','617f6579e006bd67be750ad9f33d2031','1','0','http://yiti.15115.cn/file/upload/201511/11/13-47-57-15-1.jpg','345485','jpg','photo','800','502','1447220877','admin','120.195.42.40');
INSERT INTO `aijiacms_upload_1` VALUES('77','e80f686ab181e6b9169b07de43c22a8e','1','0','http://yiti.15115.cn/file/upload/201511/11/13-48-22-57-1.jpg','345485','jpg','photo','800','502','1447220902','admin','120.195.42.40');
INSERT INTO `aijiacms_upload_1` VALUES('78','9e271fa7ed67fac9b75f631590e2589a','1','0','http://yiti.15115.cn/file/upload/201511/11/13-48-49-79-1.jpg','129530','jpg','photo','800','595','1447220929','admin','120.195.42.40');
INSERT INTO `aijiacms_upload_1` VALUES('79','94b9d265b7eb1b844d09eae612adb1eb','1','0','http://yiti.15115.cn/file/upload/201511/11/13-48-51-47-1.jpg','29050','jpg','photo','360','380','1447220931','admin','120.195.42.40');
INSERT INTO `aijiacms_upload_1` VALUES('80','c8ee13645f71b0a3be801de60fe68266','1','0','http://yiti.15115.cn/file/upload/201511/11/13-50-26-22-1.jpg','41366','jpg','photo','280','50','1447221026','admin','120.195.42.40');

DROP TABLE IF EXISTS `aijiacms_upload_2`;
CREATE TABLE `aijiacms_upload_2` (
  `pid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item` varchar(32) NOT NULL DEFAULT '',
  `moduleid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `itemid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `fileurl` varchar(255) NOT NULL DEFAULT '',
  `filesize` int(10) unsigned NOT NULL DEFAULT '0',
  `fileext` varchar(10) NOT NULL DEFAULT '',
  `upfrom` varchar(10) NOT NULL DEFAULT '',
  `width` int(10) unsigned NOT NULL DEFAULT '0',
  `height` int(10) unsigned NOT NULL DEFAULT '0',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `username` varchar(30) NOT NULL DEFAULT '',
  `ip` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`pid`),
  KEY `item` (`item`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='上传记录2';


DROP TABLE IF EXISTS `aijiacms_upload_3`;
CREATE TABLE `aijiacms_upload_3` (
  `pid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item` varchar(32) NOT NULL DEFAULT '',
  `moduleid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `itemid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `fileurl` varchar(255) NOT NULL DEFAULT '',
  `filesize` int(10) unsigned NOT NULL DEFAULT '0',
  `fileext` varchar(10) NOT NULL DEFAULT '',
  `upfrom` varchar(10) NOT NULL DEFAULT '',
  `width` int(10) unsigned NOT NULL DEFAULT '0',
  `height` int(10) unsigned NOT NULL DEFAULT '0',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `username` varchar(30) NOT NULL DEFAULT '',
  `ip` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`pid`),
  KEY `item` (`item`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='上传记录3';


DROP TABLE IF EXISTS `aijiacms_upload_4`;
CREATE TABLE `aijiacms_upload_4` (
  `pid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item` varchar(32) NOT NULL DEFAULT '',
  `moduleid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `itemid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `fileurl` varchar(255) NOT NULL DEFAULT '',
  `filesize` int(10) unsigned NOT NULL DEFAULT '0',
  `fileext` varchar(10) NOT NULL DEFAULT '',
  `upfrom` varchar(10) NOT NULL DEFAULT '',
  `width` int(10) unsigned NOT NULL DEFAULT '0',
  `height` int(10) unsigned NOT NULL DEFAULT '0',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `username` varchar(30) NOT NULL DEFAULT '',
  `ip` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`pid`),
  KEY `item` (`item`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='上传记录4';


DROP TABLE IF EXISTS `aijiacms_upload_5`;
CREATE TABLE `aijiacms_upload_5` (
  `pid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item` varchar(32) NOT NULL DEFAULT '',
  `moduleid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `itemid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `fileurl` varchar(255) NOT NULL DEFAULT '',
  `filesize` int(10) unsigned NOT NULL DEFAULT '0',
  `fileext` varchar(10) NOT NULL DEFAULT '',
  `upfrom` varchar(10) NOT NULL DEFAULT '',
  `width` int(10) unsigned NOT NULL DEFAULT '0',
  `height` int(10) unsigned NOT NULL DEFAULT '0',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `username` varchar(30) NOT NULL DEFAULT '',
  `ip` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`pid`),
  KEY `item` (`item`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='上传记录5';


DROP TABLE IF EXISTS `aijiacms_upload_6`;
CREATE TABLE `aijiacms_upload_6` (
  `pid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item` varchar(32) NOT NULL DEFAULT '',
  `moduleid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `itemid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `fileurl` varchar(255) NOT NULL DEFAULT '',
  `filesize` int(10) unsigned NOT NULL DEFAULT '0',
  `fileext` varchar(10) NOT NULL DEFAULT '',
  `upfrom` varchar(10) NOT NULL DEFAULT '',
  `width` int(10) unsigned NOT NULL DEFAULT '0',
  `height` int(10) unsigned NOT NULL DEFAULT '0',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `username` varchar(30) NOT NULL DEFAULT '',
  `ip` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`pid`),
  KEY `item` (`item`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='上传记录6';


DROP TABLE IF EXISTS `aijiacms_upload_7`;
CREATE TABLE `aijiacms_upload_7` (
  `pid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item` varchar(32) NOT NULL DEFAULT '',
  `moduleid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `itemid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `fileurl` varchar(255) NOT NULL DEFAULT '',
  `filesize` int(10) unsigned NOT NULL DEFAULT '0',
  `fileext` varchar(10) NOT NULL DEFAULT '',
  `upfrom` varchar(10) NOT NULL DEFAULT '',
  `width` int(10) unsigned NOT NULL DEFAULT '0',
  `height` int(10) unsigned NOT NULL DEFAULT '0',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `username` varchar(30) NOT NULL DEFAULT '',
  `ip` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`pid`),
  KEY `item` (`item`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='上传记录7';


DROP TABLE IF EXISTS `aijiacms_upload_8`;
CREATE TABLE `aijiacms_upload_8` (
  `pid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item` varchar(32) NOT NULL DEFAULT '',
  `moduleid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `itemid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `fileurl` varchar(255) NOT NULL DEFAULT '',
  `filesize` int(10) unsigned NOT NULL DEFAULT '0',
  `fileext` varchar(10) NOT NULL DEFAULT '',
  `upfrom` varchar(10) NOT NULL DEFAULT '',
  `width` int(10) unsigned NOT NULL DEFAULT '0',
  `height` int(10) unsigned NOT NULL DEFAULT '0',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `username` varchar(30) NOT NULL DEFAULT '',
  `ip` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`pid`),
  KEY `item` (`item`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='上传记录8';


DROP TABLE IF EXISTS `aijiacms_upload_9`;
CREATE TABLE `aijiacms_upload_9` (
  `pid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item` varchar(32) NOT NULL DEFAULT '',
  `moduleid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `itemid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `fileurl` varchar(255) NOT NULL DEFAULT '',
  `filesize` int(10) unsigned NOT NULL DEFAULT '0',
  `fileext` varchar(10) NOT NULL DEFAULT '',
  `upfrom` varchar(10) NOT NULL DEFAULT '',
  `width` int(10) unsigned NOT NULL DEFAULT '0',
  `height` int(10) unsigned NOT NULL DEFAULT '0',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `username` varchar(30) NOT NULL DEFAULT '',
  `ip` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`pid`),
  KEY `item` (`item`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='上传记录9';


DROP TABLE IF EXISTS `aijiacms_validate`;
CREATE TABLE `aijiacms_validate` (
  `itemid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `type` varchar(30) NOT NULL DEFAULT '',
  `thumb` varchar(255) NOT NULL DEFAULT '',
  `thumb1` varchar(255) NOT NULL DEFAULT '',
  `thumb2` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(30) NOT NULL DEFAULT '',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `editor` varchar(30) NOT NULL DEFAULT '',
  `edittime` int(10) unsigned NOT NULL DEFAULT '0',
  `ip` varchar(50) NOT NULL DEFAULT '',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='资料认证';


DROP TABLE IF EXISTS `aijiacms_video_14`;
CREATE TABLE `aijiacms_video_14` (
  `itemid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `areaid` int(10) unsigned NOT NULL DEFAULT '0',
  `level` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `style` varchar(50) NOT NULL DEFAULT '',
  `fee` float NOT NULL DEFAULT '0',
  `tag` varchar(255) NOT NULL DEFAULT '',
  `keyword` varchar(255) NOT NULL DEFAULT '',
  `pptword` varchar(255) NOT NULL DEFAULT '',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `thumb` varchar(255) NOT NULL DEFAULT '',
  `video` varchar(255) NOT NULL DEFAULT '',
  `mobile` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `width` smallint(4) unsigned NOT NULL DEFAULT '0',
  `height` smallint(4) unsigned NOT NULL DEFAULT '0',
  `player` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `username` varchar(30) NOT NULL DEFAULT '',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `introduce` varchar(255) NOT NULL DEFAULT '',
  `editor` varchar(30) NOT NULL DEFAULT '',
  `edittime` int(10) unsigned NOT NULL DEFAULT '0',
  `ip` varchar(50) NOT NULL DEFAULT '',
  `template` varchar(30) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `linkurl` varchar(255) NOT NULL DEFAULT '',
  `filepath` varchar(255) NOT NULL DEFAULT '',
  `note` varchar(255) NOT NULL DEFAULT '',
  `houseid` int(10) DEFAULT NULL,
  `housename` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`itemid`),
  KEY `username` (`username`),
  KEY `addtime` (`addtime`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='视频';


DROP TABLE IF EXISTS `aijiacms_video_data_14`;
CREATE TABLE `aijiacms_video_data_14` (
  `itemid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `content` mediumtext NOT NULL,
  PRIMARY KEY (`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='视频内容';


DROP TABLE IF EXISTS `aijiacms_vote`;
CREATE TABLE `aijiacms_vote` (
  `itemid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `typeid` int(10) unsigned NOT NULL DEFAULT '0',
  `areaid` int(10) unsigned NOT NULL DEFAULT '0',
  `level` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `style` varchar(50) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `choose` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `vote_min` smallint(2) unsigned NOT NULL DEFAULT '0',
  `vote_max` smallint(2) unsigned NOT NULL DEFAULT '0',
  `votes` int(10) unsigned NOT NULL DEFAULT '0',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `fromtime` int(10) unsigned NOT NULL DEFAULT '0',
  `totime` int(10) unsigned NOT NULL DEFAULT '0',
  `editor` varchar(30) NOT NULL DEFAULT '',
  `edittime` int(10) unsigned NOT NULL DEFAULT '0',
  `linkto` varchar(255) NOT NULL DEFAULT '',
  `linkurl` varchar(255) NOT NULL DEFAULT '',
  `template_vote` varchar(30) NOT NULL DEFAULT '',
  `template` varchar(30) NOT NULL DEFAULT '',
  `s1` varchar(255) NOT NULL DEFAULT '',
  `s2` varchar(255) NOT NULL DEFAULT '',
  `s3` varchar(255) NOT NULL DEFAULT '',
  `s4` varchar(255) NOT NULL DEFAULT '',
  `s5` varchar(255) NOT NULL DEFAULT '',
  `s6` varchar(255) NOT NULL DEFAULT '',
  `s7` varchar(255) NOT NULL DEFAULT '',
  `s8` varchar(255) NOT NULL DEFAULT '',
  `s9` varchar(255) NOT NULL DEFAULT '',
  `s10` varchar(255) NOT NULL DEFAULT '',
  `v1` int(10) unsigned NOT NULL DEFAULT '0',
  `v2` int(10) unsigned NOT NULL DEFAULT '0',
  `v3` int(10) unsigned NOT NULL DEFAULT '0',
  `v4` int(10) unsigned NOT NULL DEFAULT '0',
  `v5` int(10) unsigned NOT NULL DEFAULT '0',
  `v6` int(10) unsigned NOT NULL DEFAULT '0',
  `v7` int(10) unsigned NOT NULL DEFAULT '0',
  `v8` int(10) unsigned NOT NULL DEFAULT '0',
  `v9` int(10) unsigned NOT NULL DEFAULT '0',
  `v10` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='投票';


DROP TABLE IF EXISTS `aijiacms_vote_record`;
CREATE TABLE `aijiacms_vote_record` (
  `rid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `itemid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `username` varchar(30) NOT NULL DEFAULT '',
  `ip` varchar(50) NOT NULL DEFAULT '',
  `votetime` int(10) unsigned NOT NULL DEFAULT '0',
  `votes` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`rid`),
  KEY `itemid` (`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='投票记录';


DROP TABLE IF EXISTS `aijiacms_webpage`;
CREATE TABLE `aijiacms_webpage` (
  `itemid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item` varchar(30) NOT NULL DEFAULT '',
  `areaid` int(10) unsigned NOT NULL DEFAULT '0',
  `level` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `style` varchar(50) NOT NULL DEFAULT '',
  `content` mediumtext NOT NULL,
  `seo_title` varchar(255) NOT NULL DEFAULT '',
  `seo_keywords` varchar(255) NOT NULL DEFAULT '',
  `seo_description` varchar(255) NOT NULL DEFAULT '',
  `editor` varchar(30) NOT NULL DEFAULT '',
  `edittime` int(10) unsigned NOT NULL DEFAULT '0',
  `listorder` smallint(4) NOT NULL DEFAULT '0',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `islink` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `linkurl` varchar(255) NOT NULL DEFAULT '',
  `domain` varchar(255) NOT NULL DEFAULT '',
  `template` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`itemid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='单网页';

INSERT INTO `aijiacms_webpage` VALUES('1','1','0','0','关于我们','','关于我们','','','','aijiacms','1319006891','4','0','0','about/index.html','','');
INSERT INTO `aijiacms_webpage` VALUES('2','1','0','0','联系方式','','联系方式','','','','aijiacms','1310696453','3','0','0','about/contact.html','','');
INSERT INTO `aijiacms_webpage` VALUES('3','1','0','0','使用协议','','使用协议','','','','aijiacms','1310696460','2','0','0','about/agreement.html','','');
INSERT INTO `aijiacms_webpage` VALUES('4','1','0','0','版权隐私','','版权隐私','','','','aijiacms','1310696468','1','0','0','about/copyright.html','','');

DROP TABLE IF EXISTS `aijiacms_wenfang`;
CREATE TABLE `aijiacms_wenfang` (
  `itemid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `item_mid` smallint(6) NOT NULL DEFAULT '0',
  `item_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `item_title` varchar(255) NOT NULL DEFAULT '',
  `item_linkurl` varchar(255) NOT NULL DEFAULT '',
  `item_username` varchar(30) NOT NULL DEFAULT '',
  `star` tinyint(1) NOT NULL DEFAULT '0',
  `content` text NOT NULL,
  `qid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `quotation` text NOT NULL,
  `username` varchar(30) NOT NULL DEFAULT '',
  `hidden` tinyint(1) NOT NULL DEFAULT '0',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `reply` text NOT NULL,
  `editor` varchar(30) NOT NULL DEFAULT '',
  `replyer` varchar(30) NOT NULL DEFAULT '',
  `replytime` int(10) unsigned NOT NULL DEFAULT '0',
  `agree` int(10) unsigned NOT NULL DEFAULT '0',
  `against` int(10) unsigned NOT NULL DEFAULT '0',
  `quote` int(10) unsigned NOT NULL DEFAULT '0',
  `ip` varchar(50) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`itemid`),
  KEY `item_mid` (`item_mid`),
  KEY `item_id` (`item_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='问房';

INSERT INTO `aijiacms_wenfang` VALUES('1','6','8','歪歪分享论坛锦绣名城','http://yiti.15115.cn/house/8/','admin','3','我想问一下 这个楼盘什么时候能开盘','0','','waiwaili','0','1442383241','已经在出售了','admin','','1442383783','0','0','0','127.0.0.1','3');
INSERT INTO `aijiacms_wenfang` VALUES('2','6','6','歪歪分享论坛中央公馆','http://yiti.15115.cn/house/6/','admin','3','歪歪分享论坛房产程序这个购买后有无搭建服务','0','','waiwaili','0','1442383285','您好 有免费搭建服务的','admin','','1442383603','0','0','0','127.0.0.1','3');

