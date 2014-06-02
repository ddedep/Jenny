/*
Navicat MySQL Data Transfer

Source Server         : upmath
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : capstone

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2014-06-02 20:43:53
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `categories`
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `categoryid` int(11) NOT NULL AUTO_INCREMENT,
  `categoryname` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`categoryid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('1', 'Motors');
INSERT INTO `categories` VALUES ('2', 'Fashion');
INSERT INTO `categories` VALUES ('3', 'Electronics');
INSERT INTO `categories` VALUES ('4', 'Collectibles & Art');
INSERT INTO `categories` VALUES ('5', 'Home & Garden');
INSERT INTO `categories` VALUES ('6', 'Sporting Goods');
INSERT INTO `categories` VALUES ('7', 'Toys & Hobbies');
INSERT INTO `categories` VALUES ('8', 'Deals & gifts');
INSERT INTO `categories` VALUES ('9', 'Others');
