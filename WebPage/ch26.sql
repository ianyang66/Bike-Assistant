-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主機: localhost
-- 建立日期: Jun 05, 2010, 02:22 PM
-- 伺服器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 資料庫: `mydb`
-- 

-- --------------------------------------------------------

-- 
-- 資料表格式： `member`
-- 

CREATE TABLE `member` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(12) collate utf8_unicode_ci NOT NULL,
  `password` varchar(12) collate utf8_unicode_ci NOT NULL,
  `name` varchar(40) collate utf8_unicode_ci NOT NULL,
  `sex` char(2) collate utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(40) collate utf8_unicode_ci NOT NULL,
  `phone` varchar(15) collate utf8_unicode_ci NOT NULL,
  `address` varchar(120) collate utf8_unicode_ci NOT NULL,
  `uniform` varchar(20) collate utf8_unicode_ci default NULL,
  `unititle` varchar(40) collate utf8_unicode_ci default NULL,
  `userlevel` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

-- 
-- 列出以下資料庫的數據： `member`
-- 

INSERT INTO `member` VALUES (1, 'daniel', '123456', '管理員', '男', '1999-01-01', 'daniel@derek.com', '02-11112222', '德瑞工作室', NULL, NULL, 99);
INSERT INTO `member` VALUES (2, 'andy', 'a123456', '李大華', '男', '1997-03-07', 'andy@example.com', '02-12345678', '台北市忠孝東路100號', NULL, NULL, 0);
INSERT INTO `member` VALUES (3, 'bob', 'b123456', '陳小明', '男', '1997-02-01', 'bob@example.com', '02-23456789', '台北市信義路23號', NULL, NULL, 0);
INSERT INTO `member` VALUES (4, 'cindy', 'c123456', '劉小珍', '女', '1997-08-03', 'cindy@example.com', '02-34567890', '台北市仁愛路332號', NULL, NULL, 0);
INSERT INTO `member` VALUES (5, 'mary', 'm123456', '廖小敏', '女', '1997-10-21', 'mary@example.com', '02-45678901', '台北市和平路194號', NULL, NULL, 0);
INSERT INTO `member` VALUES (6, 'david', 'd123456', '吳大龍', '男', '1997-05-17', 'david@example.com', '02-56789012', '台北市萬華路90號', NULL, NULL, 0);
INSERT INTO `member` VALUES (7, 'jane', 'j123456', '辛小君', '女', '1997-06-22', 'jane@example.com', '02-67890123', '台北市辛亥路4號', NULL, NULL, 0);
INSERT INTO `member` VALUES (8, 'kim', 'k123456', '趙大志', '男', '1997-09-13', 'kim@example.com', '02-78901234', '台北市基隆路211號', NULL, NULL, 0);
INSERT INTO `member` VALUES (9, 'sam', 's123456', '賴大平', '男', '1997-04-30', 'sam@example.com', '02-89012345', '台北市松平路112號', NULL, NULL, 0);

-- --------------------------------------------------------

-- 
-- 資料表格式： `member_md5`
-- 

CREATE TABLE `member_md5` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(32) collate utf8_unicode_ci NOT NULL,
  `password` varchar(32) collate utf8_unicode_ci NOT NULL,
  `name` varchar(40) collate utf8_unicode_ci NOT NULL,
  `sex` char(2) collate utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(40) collate utf8_unicode_ci NOT NULL,
  `phone` varchar(15) collate utf8_unicode_ci NOT NULL,
  `address` varchar(120) collate utf8_unicode_ci NOT NULL,
  `uniform` varchar(20) collate utf8_unicode_ci default NULL,
  `unititle` varchar(40) collate utf8_unicode_ci default NULL,
  `userlevel` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- 
-- 列出以下資料庫的數據： `member_md5`
-- 

INSERT INTO `member_md5` VALUES (1, '210dc1fd8cb4e4e43cb4961b28fac275', '59f2443a4317918ce29ad28a14e1bdb7', '方小萍', '女', '1997-05-30', 'tiffany@example.com', '02-90123456', '台北市重慶東路233號', NULL, NULL, 0);

INSERT INTO `member_md5` VALUES (2, 'fae0b27c451c728867a567e8c1bb4e53', 'f379eaf3c831b04de153469d1bec345e', '電機金城武', '男', '1998-05-30', 'tiffany@example.com', '02-90123456', '台北市重慶東路233號', NULL, NULL, 0);
