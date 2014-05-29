/*
Navicat MySQL Data Transfer

Source Server         : upmath
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : capstone

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2014-05-29 13:28:27
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
  `body` text,
  `categorid` int(11) NOT NULL,
  `cityid` int(11) NOT NULL,
  `insertedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isexpired` int(11) NOT NULL,
  PRIMARY KEY (`adid`),
  FULLTEXT KEY `search_index` (`title`,`body`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ads
-- ----------------------------

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
  `birthdate` date DEFAULT NULL,
  `phonenum` varchar(32) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `insertedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`personid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of persons
-- ----------------------------
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of subscriptions
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of support
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
  `address` varchar(255) DEFAULT NULL,
  `postalcode` int(11) NOT NULL,
  `insertedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`userid`),
  KEY `personRef` (`personid`),
  CONSTRAINT `personRef` FOREIGN KEY (`personid`) REFERENCES `persons` (`personid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------

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

-- ----------------------------
-- Procedure structure for `expiration`
-- ----------------------------
DROP PROCEDURE IF EXISTS `expiration`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `expiration`()
BEGIN
	#Routine body goes here...
	 UPDATE ads
   SET isexpired = 1
    WHERE  TIMESTAMPDIFF(DAY, `insertedon`, NOW()) >  `duration`; 
END
;;
DELIMITER ;

-- ----------------------------
-- Event structure for `exec`
-- ----------------------------
DROP EVENT IF EXISTS `exec`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` EVENT `exec` ON SCHEDULE EVERY 5 SECOND STARTS '2013-02-10 00:00:00' ENDS '2016-02-28 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO call expiration()
;;
DELIMITER ;
