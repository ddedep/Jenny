/*
Navicat MySQL Data Transfer

Source Server         : upmath
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : capstone

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2014-06-28 15:10:35
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `messages`
-- ----------------------------
DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `messageid` int(11) NOT NULL AUTO_INCREMENT,
  `body` varchar(255) DEFAULT NULL,
  `mfrom` int(11) DEFAULT NULL,
  `mto` int(11) DEFAULT NULL,
  PRIMARY KEY (`messageid`),
  KEY `mto` (`mto`),
  KEY `mfrom` (`mfrom`),
  CONSTRAINT `mfrom` FOREIGN KEY (`mfrom`) REFERENCES `users` (`userid`),
  CONSTRAINT `mto` FOREIGN KEY (`mto`) REFERENCES `users` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of messages
-- ----------------------------
