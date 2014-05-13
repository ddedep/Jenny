/*
Navicat MySQL Data Transfer

Source Server         : upmath
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : capstone

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2014-05-13 12:12:28
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ads`
-- ----------------------------
DROP TABLE IF EXISTS `ads`;
CREATE TABLE `ads` (
  `adid` int(11) NOT NULL AUTO_INCREMENT,
  `title` text,
  `owner` int(11) NOT NULL,
  `isfeatured` tinyint(4) DEFAULT '0',
  `price` bigint(15) DEFAULT NULL,
  `duration` tinyint(4) NOT NULL DEFAULT '7',
  `videolink` text,
  `imagelink` tinytext,
  `body` tinytext,
  `categorid` int(11) NOT NULL,
  `cityid` int(11) NOT NULL,
  `insertedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`adid`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ads
-- ----------------------------
INSERT INTO `ads` VALUES ('5', 'hello', '4', '0', '127', '30', null, 'https://www.youtube.com/watch?v=qjHlgrGsLWQ', 'asdasf', '3', '3', '2014-04-28 11:15:00');
INSERT INTO `ads` VALUES ('6', 'New blouse for sale', '5', '0', '127', '7', null, 'bit.ly/something', 'buy it now ', '2', '1', '2014-04-28 15:45:55');
INSERT INTO `ads` VALUES ('7', '123', '2', '0', '127', '30', null, 'asdasd', '312312', '3', '3', '2014-05-12 22:38:53');
INSERT INTO `ads` VALUES ('8', '123123', '2', '0', '127', '30', null, 'asdas', '12312', '3', '3', '2014-05-12 22:42:06');
INSERT INTO `ads` VALUES ('9', '123123', '2', '0', '127', '30', null, 'asdas', '12312', '3', '3', '2014-05-12 22:44:01');
INSERT INTO `ads` VALUES ('10', '123123', '2', '0', '431', '30', null, 'asdas', '12312', '3', '3', '2014-05-12 22:44:59');
INSERT INTO `ads` VALUES ('11', 'asdasd', '2', '0', '1231231', '30', null, 'asdasdasd', 'asdasd', '3', '3', '2014-05-12 22:46:01');
INSERT INTO `ads` VALUES ('12', 'asd', '9', '0', '0', '30', 'asdasda', '', 'asdas', '3', '3', '2014-05-13 11:53:14');
INSERT INTO `ads` VALUES ('13', 'asdas', '9', '0', '0', '30', 'asdasdas', '', 'asdasd', '3', '3', '2014-05-13 11:54:04');
INSERT INTO `ads` VALUES ('14', 'asdas', '9', '0', '0', '30', 'asdasdas', '', 'asdasd', '3', '3', '2014-05-13 11:56:21');
INSERT INTO `ads` VALUES ('15', 'asdas', '9', '0', '0', '30', 'asdasd', 'ching.jpg', 'asdasd', '3', '3', '2014-05-13 11:56:55');

-- ----------------------------
-- Table structure for `categories`
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `categoryid` int(11) NOT NULL AUTO_INCREMENT,
  `categoryname` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`categoryid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('1', 'Men');
INSERT INTO `categories` VALUES ('2', 'Women');
INSERT INTO `categories` VALUES ('3', 'Children');
INSERT INTO `categories` VALUES ('4', null);

-- ----------------------------
-- Table structure for `cities`
-- ----------------------------
DROP TABLE IF EXISTS `cities`;
CREATE TABLE `cities` (
  `cityid` int(11) NOT NULL AUTO_INCREMENT,
  `cityname` varchar(32) DEFAULT NULL,
  `regionid` int(11) DEFAULT NULL,
  PRIMARY KEY (`cityid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cities
-- ----------------------------
INSERT INTO `cities` VALUES ('1', 'Makati', '1');
INSERT INTO `cities` VALUES ('2', 'Quezon City', '1');
INSERT INTO `cities` VALUES ('3', 'Manila', '1');
INSERT INTO `cities` VALUES ('4', null, null);

-- ----------------------------
-- Table structure for `favorites`
-- ----------------------------
DROP TABLE IF EXISTS `favorites`;
CREATE TABLE `favorites` (
  `favoriteid` int(11) NOT NULL AUTO_INCREMENT,
  `ownerid` int(11) NOT NULL,
  `favoriteAdid` int(11) NOT NULL,
  `insertedon` time NOT NULL,
  PRIMARY KEY (`favoriteid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of favorites
-- ----------------------------

-- ----------------------------
-- Table structure for `persons`
-- ----------------------------
DROP TABLE IF EXISTS `persons`;
CREATE TABLE `persons` (
  `personid` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(32) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `middlename` varchar(32) DEFAULT NULL,
  `phonenum` varchar(32) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `insertedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`personid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of persons
-- ----------------------------
INSERT INTO `persons` VALUES ('1', 'Dexter Enrick', 'asd', 'Edep', '09062321440', '', '2014-04-24 17:22:56');
INSERT INTO `persons` VALUES ('2', 'Dexter Enrick', 'asd', 'Edep', '09062321440', '', '2014-04-24 17:24:07');
INSERT INTO `persons` VALUES ('3', 'Juan', 'edep', 'delacruz', '09062321440', '', '2014-04-24 17:25:23');
INSERT INTO `persons` VALUES ('4', 'Juan', 'edep', 'delacruz', '09062321440', '', '2014-04-24 17:28:54');
INSERT INTO `persons` VALUES ('5', 'Peter', 'John', 'Thomas', '1234567', '', '2014-04-28 09:31:29');
INSERT INTO `persons` VALUES ('6', 'asd', 'Jenny', 'Miraflores', '095929529', '', '2014-04-28 15:42:58');
INSERT INTO `persons` VALUES ('7', 'dasd', 'dexter', 'asdasd', '123545', '', '2014-05-13 11:20:15');
INSERT INTO `persons` VALUES ('8', 'dasd', 'dexter', 'asdasd', '123545', '', '2014-05-13 11:22:50');
INSERT INTO `persons` VALUES ('9', 'asd', 'dexter', 'asd', 'asd123123', '', '2014-05-13 11:23:37');
INSERT INTO `persons` VALUES ('10', 'asd', 'dexter', 'asd', 'asd123123', 'qwe1.jpg', '2014-05-13 11:30:30');

-- ----------------------------
-- Table structure for `regions`
-- ----------------------------
DROP TABLE IF EXISTS `regions`;
CREATE TABLE `regions` (
  `regionid` int(11) NOT NULL AUTO_INCREMENT,
  `regionname` varchar(16) NOT NULL,
  PRIMARY KEY (`regionid`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of regions
-- ----------------------------
INSERT INTO `regions` VALUES ('0', '');
INSERT INTO `regions` VALUES ('1', 'NCR');
INSERT INTO `regions` VALUES ('2', 'CAR');
INSERT INTO `regions` VALUES ('3', 'Region I');
INSERT INTO `regions` VALUES ('4', 'Region II');
INSERT INTO `regions` VALUES ('5', 'Region III');
INSERT INTO `regions` VALUES ('6', 'Region IV-A');
INSERT INTO `regions` VALUES ('7', 'Region IV-B');
INSERT INTO `regions` VALUES ('8', 'Region V');
INSERT INTO `regions` VALUES ('9', 'Region VI');
INSERT INTO `regions` VALUES ('10', 'Region VII');
INSERT INTO `regions` VALUES ('11', 'Region VIII');
INSERT INTO `regions` VALUES ('12', 'Region IX');
INSERT INTO `regions` VALUES ('13', 'Region X');
INSERT INTO `regions` VALUES ('14', 'Region XI');
INSERT INTO `regions` VALUES ('15', 'Region XII');
INSERT INTO `regions` VALUES ('16', 'Region XIII');
INSERT INTO `regions` VALUES ('17', 'ARMM');

-- ----------------------------
-- Table structure for `subscriptions`
-- ----------------------------
DROP TABLE IF EXISTS `subscriptions`;
CREATE TABLE `subscriptions` (
  `subscriptionid` int(11) NOT NULL AUTO_INCREMENT,
  `subscriber` int(11) NOT NULL,
  `subscribedto` int(11) NOT NULL,
  `insertedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`subscriptionid`),
  KEY `owner` (`subscriber`),
  KEY `subscribee` (`subscribedto`),
  CONSTRAINT `owner` FOREIGN KEY (`subscriber`) REFERENCES `users` (`userid`),
  CONSTRAINT `subscribee` FOREIGN KEY (`subscribedto`) REFERENCES `users` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of subscriptions
-- ----------------------------

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `personid` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `points` int(11) DEFAULT '0',
  `address` int(11) DEFAULT NULL,
  `postalcode` int(11) NOT NULL,
  `insertedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`userid`),
  KEY `personRef` (`personid`),
  CONSTRAINT `personRef` FOREIGN KEY (`personid`) REFERENCES `persons` (`personid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '1', 'ddedep', 'asd', 'dexter_edep@yahoo.com', '0', '0', '5300', '2014-04-24 17:24:07');
INSERT INTO `users` VALUES ('2', '1', 'dexkcd', '123456', 'dexter_edep@yahoo.com', '0', '0', '5300', '2014-04-24 17:25:24');
INSERT INTO `users` VALUES ('3', '1', 'dexkcd', '123456', 'dexter_edep@yahoo.com', '0', '0', '5300', '2014-04-24 17:28:54');
INSERT INTO `users` VALUES ('4', '5', 'batman', '123456', 'dexter_edep@yahoo.com', '0', '0', '5300', '2014-04-28 09:31:29');
INSERT INTO `users` VALUES ('5', '6', 'jennymiraflores', '123456', 'something@yahoo.com', '0', '0', '5300', '2014-04-28 15:42:58');
INSERT INTO `users` VALUES ('6', '7', 'dededep', '123456', '123456', '0', '0', '1234', '2014-05-13 11:20:16');
INSERT INTO `users` VALUES ('7', '8', 'dededep', '123456', '123456', '0', '0', '1234', '2014-05-13 11:22:50');
INSERT INTO `users` VALUES ('8', '9', 'asdqwe', 'asdqwe', 'asdqwe', '0', '0', '123', '2014-05-13 11:23:37');
INSERT INTO `users` VALUES ('9', '10', 'asdqwe1', 'asdqwe', 'asdqwe', '0', '0', '123', '2014-05-13 11:30:30');

-- ----------------------------
-- Table structure for `wishes`
-- ----------------------------
DROP TABLE IF EXISTS `wishes`;
CREATE TABLE `wishes` (
  `wishid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `adid` int(11) NOT NULL,
  PRIMARY KEY (`wishid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of wishes
-- ----------------------------
