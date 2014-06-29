/*
Navicat MySQL Data Transfer

Source Server         : upmath
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : capstone

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2014-06-30 07:19:34
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `images`
-- ----------------------------
DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `imageid` int(11) NOT NULL AUTO_INCREMENT,
  `imagelink` varchar(255) NOT NULL,
  `ad` int(11) NOT NULL,
  PRIMARY KEY (`imageid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of images
-- ----------------------------
INSERT INTO `images` VALUES ('1', 'Abbey_Friends2.jpg', '4');
INSERT INTO `images` VALUES ('2', 'abeey2.jpeg', '4');
INSERT INTO `images` VALUES ('3', 'Abbey_Friends3.jpg', '5');
INSERT INTO `images` VALUES ('4', 'abeey3.jpeg', '5');
INSERT INTO `images` VALUES ('5', 'Abbey_Friends4.jpg', '6');
INSERT INTO `images` VALUES ('6', 'abeey4.jpeg', '6');
INSERT INTO `images` VALUES ('7', 'Abbey_Friends5.jpg', '7');
INSERT INTO `images` VALUES ('8', 'abeey5.jpeg', '7');
INSERT INTO `images` VALUES ('9', 'Abbey_Friends6.jpg', '8');
INSERT INTO `images` VALUES ('10', 'abeey6.jpeg', '8');
INSERT INTO `images` VALUES ('11', 'Abbey_Friends7.jpg', '9');
