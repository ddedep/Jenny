/*
Navicat MySQL Data Transfer

Source Server         : upmath
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : capstone

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2014-05-26 11:48:37
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `support`
-- ----------------------------
DROP TABLE IF EXISTS `support`;
CREATE TABLE `support` (
  `support_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text,
  `body` text,
  `owner` int(11) DEFAULT NULL,
  PRIMARY KEY (`support_id`),
  KEY `support_owner` (`owner`),
  CONSTRAINT `support_owner` FOREIGN KEY (`owner`) REFERENCES `users` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of support
-- ----------------------------
