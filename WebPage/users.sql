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
-- Table structure for users
-- ----------------------------
CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `date` varchar(30) default NULL,
  `rmd` varchar(300) default NULL,

  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `users` VALUES ('3', '20201210', '寫程式囉!');
INSERT INTO `users` VALUES ('4', '20201212', '要demo');
INSERT INTO `users` VALUES ('5', '20201213', '區塊鏈要報論文');
INSERT INTO `users` VALUES ('7', '20201215', '要考試了!');
INSERT INTO `users` VALUES ('8', '20201221', '記得拿票');

