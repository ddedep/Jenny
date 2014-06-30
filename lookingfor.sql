/*
Navicat MySQL Data Transfer

Source Server         : upmath
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : capstone

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2014-07-01 00:09:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `lookingfor`
-- ----------------------------
DROP TABLE IF EXISTS `lookingfor`;
CREATE TABLE `lookingfor` (
  `lookingid` int(11) NOT NULL AUTO_INCREMENT,
  `body` varchar(255) NOT NULL,
  `owner` int(11) NOT NULL,
  `ischecked` int(11) NOT NULL,
  `insertedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`lookingid`),
  KEY `user` (`owner`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of lookingfor
-- ----------------------------
