/*
MySQL Data Transfer
Source Host: localhost
Source Database: mydb
Target Host: localhost
Target Database: mydb
Date: 2011/6/3 13:59:12
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for gps
-- ----------------------------
CREATE TABLE `gps` (
  `id` int(11) NOT NULL auto_increment,
  `date_and_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `latitude` varchar(30) default NULL,
  `longitude` varchar(30) default NULL,	

  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `gps` VALUES ('1', '', '23.89736624663214', '121.53498146742444');
INSERT INTO `gps` VALUES ('2', '', '23.89662856067416', '121.53407843293822');
