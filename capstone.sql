/*
Navicat MySQL Data Transfer

Source Server         : upmath
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : capstone

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2014-09-06 15:18:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `adcomment`
-- ----------------------------
DROP TABLE IF EXISTS `adcomment`;
CREATE TABLE `adcomment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `body` varchar(255) DEFAULT NULL,
  `owner` int(11) DEFAULT NULL,
  `adid` int(11) DEFAULT NULL,
  `cominsertedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of adcomment
-- ----------------------------

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
  `imagelink1` tinytext,
  `imagelink2` tinytext,
  `imagelink3` tinytext,
  `imagelink4` tinytext,
  `imagelink5` tinytext,
  `imagelink6` tinytext,
  `body` text,
  `categoryid` int(11) NOT NULL,
  `provinceid` int(11) NOT NULL,
  `adinsertedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `view` int(11) NOT NULL,
  `isexpired` int(11) NOT NULL,
  `issold` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`adid`),
  FULLTEXT KEY `search_index` (`title`,`body`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

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

-- ----------------------------
-- Table structure for `cities`
-- ----------------------------
DROP TABLE IF EXISTS `cities`;
CREATE TABLE `cities` (
  `provinceid` int(11) NOT NULL AUTO_INCREMENT,
  `provincename` varchar(32) DEFAULT NULL,
  `regionid` int(11) DEFAULT NULL,
  PRIMARY KEY (`provinceid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cities
-- ----------------------------
INSERT INTO `cities` VALUES ('1', 'Makati', '1');
INSERT INTO `cities` VALUES ('2', 'Quezon City', '1');
INSERT INTO `cities` VALUES ('3', 'Manila', '1');
INSERT INTO `cities` VALUES ('4', null, null);

-- ----------------------------
-- Table structure for `comments`
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `commentid` int(11) NOT NULL AUTO_INCREMENT,
  `body` varchar(255) DEFAULT NULL,
  `owner` int(11) DEFAULT NULL,
  `threadid` int(11) DEFAULT NULL,
  `cominsertedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`commentid`),
  KEY `commentowner` (`owner`),
  KEY `thread` (`threadid`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of comments
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
  PRIMARY KEY (`favoriteid`),
  KEY `fordid` (`ownerid`),
  KEY `favid` (`favoriteAdid`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of favorites
-- ----------------------------

-- ----------------------------
-- Table structure for `images`
-- ----------------------------
DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `imageid` int(11) NOT NULL AUTO_INCREMENT,
  `imagelink` varchar(255) DEFAULT NULL,
  `ad` int(11) DEFAULT NULL,
  PRIMARY KEY (`imageid`),
  KEY `adref` (`ad`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of images
-- ----------------------------


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

-- ----------------------------
-- Table structure for `messages`
-- ----------------------------
DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `messageid` int(11) NOT NULL AUTO_INCREMENT,
  `body` varchar(255) DEFAULT NULL,
  `mfrom` int(11) DEFAULT NULL,
  `mto` int(11) DEFAULT NULL,
  `inboxdeleted` int(11) NOT NULL,
  `sentdeleted` int(11) NOT NULL,
  `opened` int(11) NOT NULL,
  `senton` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`messageid`),
  KEY `mto` (`mto`),
  KEY `mfrom` (`mfrom`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of messages
-- ----------------------------

-- ----------------------------
-- Table structure for `payments`
-- ----------------------------
DROP TABLE IF EXISTS `payments`;
CREATE TABLE `payments` (
  `transactionid` int(11) NOT NULL AUTO_INCREMENT,
  `transactionCode` bigint(20) DEFAULT NULL,
  `userid` int(11) NOT NULL,
  `insertedon` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`transactionid`),
  KEY `payer` (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of payments
-- ----------------------------
INSERT INTO `payments` VALUES ('3', '1000003', '3', '2014-06-30 13:57:31');

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
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of persons
-- ----------------------------

-- ----------------------------
-- Table structure for `provinces`
-- ----------------------------
DROP TABLE IF EXISTS `provinces`;
CREATE TABLE `provinces` (
  `provinceid` int(11) NOT NULL AUTO_INCREMENT,
  `provincename` varchar(32) DEFAULT NULL,
  `regionid` int(11) DEFAULT NULL,
  PRIMARY KEY (`provinceid`),
  KEY `region` (`regionid`)
) ENGINE=MyISAM AUTO_INCREMENT=124 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of provinces
-- ----------------------------
INSERT INTO `provinces` VALUES ('5', 'Abra', '2');
INSERT INTO `provinces` VALUES ('6', 'Agusan del Norte', '16');
INSERT INTO `provinces` VALUES ('7', 'Agusan del Sur', '16');
INSERT INTO `provinces` VALUES ('8', 'Aklan', '9');
INSERT INTO `provinces` VALUES ('9', 'Albay', '8');
INSERT INTO `provinces` VALUES ('10', 'Antique', '9');
INSERT INTO `provinces` VALUES ('11', 'Apayao', '2');
INSERT INTO `provinces` VALUES ('12', 'Aurora', '5');
INSERT INTO `provinces` VALUES ('13', 'Basilan', '17');
INSERT INTO `provinces` VALUES ('14', 'Bataan', '5');
INSERT INTO `provinces` VALUES ('15', 'Batanes', '4');
INSERT INTO `provinces` VALUES ('16', 'Batangas', '6');
INSERT INTO `provinces` VALUES ('17', 'Benguet', '2');
INSERT INTO `provinces` VALUES ('18', 'Biliran', '11');
INSERT INTO `provinces` VALUES ('19', 'Bohol', '10');
INSERT INTO `provinces` VALUES ('20', 'Bukidnon', '13');
INSERT INTO `provinces` VALUES ('21', 'Bulacan', '5');
INSERT INTO `provinces` VALUES ('22', 'Cagayan', '4');
INSERT INTO `provinces` VALUES ('23', 'Camarines Norte', '8');
INSERT INTO `provinces` VALUES ('24', 'Camarines Sur', '8');
INSERT INTO `provinces` VALUES ('25', 'Camiguin', '13');
INSERT INTO `provinces` VALUES ('26', 'Capiz', '9');
INSERT INTO `provinces` VALUES ('27', 'Catanduanes', '8');
INSERT INTO `provinces` VALUES ('28', 'Cavite', '6');
INSERT INTO `provinces` VALUES ('29', 'Cebu', '10');
INSERT INTO `provinces` VALUES ('30', 'Compostela Valley', '14');
INSERT INTO `provinces` VALUES ('31', 'Cotabato', '15');
INSERT INTO `provinces` VALUES ('32', 'Davao del Norte', '14');
INSERT INTO `provinces` VALUES ('33', 'Davao del Sur', '14');
INSERT INTO `provinces` VALUES ('34', 'Davao Occidental', '14');
INSERT INTO `provinces` VALUES ('35', 'Davao Oriental', '14');
INSERT INTO `provinces` VALUES ('36', 'Dinagat Islands', '16');
INSERT INTO `provinces` VALUES ('37', 'Eastern Samar', '11');
INSERT INTO `provinces` VALUES ('38', 'Guimaras', '9');
INSERT INTO `provinces` VALUES ('39', 'Ifugao', '2');
INSERT INTO `provinces` VALUES ('40', 'Ilocos Norte', '3');
INSERT INTO `provinces` VALUES ('41', 'Ilocos Sur', '3');
INSERT INTO `provinces` VALUES ('42', 'Iloilo', '9');
INSERT INTO `provinces` VALUES ('43', 'Isabela', '4');
INSERT INTO `provinces` VALUES ('44', 'Kalinga', '2');
INSERT INTO `provinces` VALUES ('45', 'La Union', '3');
INSERT INTO `provinces` VALUES ('46', 'Laguna', '6');
INSERT INTO `provinces` VALUES ('47', 'Lanao del Norte', '13');
INSERT INTO `provinces` VALUES ('48', 'Lanao del Sur', '17');
INSERT INTO `provinces` VALUES ('49', 'Leyte', '11');
INSERT INTO `provinces` VALUES ('50', 'Maguindanao', '17');
INSERT INTO `provinces` VALUES ('51', 'Marinduque', '7');
INSERT INTO `provinces` VALUES ('52', 'Masbate', '8');
INSERT INTO `provinces` VALUES ('53', 'Misamis Occidental', '13');
INSERT INTO `provinces` VALUES ('54', 'Misamis Oriental', '13');
INSERT INTO `provinces` VALUES ('55', 'Mountain Province', '2');
INSERT INTO `provinces` VALUES ('56', 'Negros Occidental', '9');
INSERT INTO `provinces` VALUES ('57', 'Negros Oriental', '9');
INSERT INTO `provinces` VALUES ('58', 'Northern Samar', '11');
INSERT INTO `provinces` VALUES ('59', 'Nueva Ecija', '5');
INSERT INTO `provinces` VALUES ('60', 'Nueva Vizcaya', '4');
INSERT INTO `provinces` VALUES ('61', 'Occidental Mindoro', '7');
INSERT INTO `provinces` VALUES ('62', 'Oriental Mindoro', '7');
INSERT INTO `provinces` VALUES ('63', 'Palawan', '7');
INSERT INTO `provinces` VALUES ('64', 'Pampanga', '5');
INSERT INTO `provinces` VALUES ('65', 'Pangasinan', '3');
INSERT INTO `provinces` VALUES ('66', 'Quezon', '6');
INSERT INTO `provinces` VALUES ('67', 'Quirino', '4');
INSERT INTO `provinces` VALUES ('68', 'Rizal', '6');
INSERT INTO `provinces` VALUES ('69', 'Romblon', '7');
INSERT INTO `provinces` VALUES ('70', 'Samar', '9');
INSERT INTO `provinces` VALUES ('71', 'Sarangani', '15');
INSERT INTO `provinces` VALUES ('72', 'Siquijor', '10');
INSERT INTO `provinces` VALUES ('73', 'Sorsogon', '8');
INSERT INTO `provinces` VALUES ('74', 'South Cotabato', '15');
INSERT INTO `provinces` VALUES ('75', 'Southern Leyte', '11');
INSERT INTO `provinces` VALUES ('76', 'Sultan Kudarat', '15');
INSERT INTO `provinces` VALUES ('77', 'Sulu', '17');
INSERT INTO `provinces` VALUES ('78', 'Surigao del Norte', '16');
INSERT INTO `provinces` VALUES ('79', 'Surigao del Sur', '16');
INSERT INTO `provinces` VALUES ('80', 'Tarlac', '5');
INSERT INTO `provinces` VALUES ('81', 'Tawi-Tawi', '17');
INSERT INTO `provinces` VALUES ('82', 'Zambales', '5');
INSERT INTO `provinces` VALUES ('83', 'Zamboanga del Norte', '12');
INSERT INTO `provinces` VALUES ('84', 'Zamboanga del Sur', '12');
INSERT INTO `provinces` VALUES ('85', 'Zamboanga Sibugay', '12');
INSERT INTO `provinces` VALUES ('102', 'Valenzuela City', '1');
INSERT INTO `provinces` VALUES ('101', 'Taguig', '1');
INSERT INTO `provinces` VALUES ('100', 'San Juan', '1');
INSERT INTO `provinces` VALUES ('99', 'Quezon City', '1');
INSERT INTO `provinces` VALUES ('98', 'Pateros', '1');
INSERT INTO `provinces` VALUES ('97', 'Pasig City', '1');
INSERT INTO `provinces` VALUES ('96', 'Pasay City', '1');
INSERT INTO `provinces` VALUES ('95', 'Paranaque City', '1');
INSERT INTO `provinces` VALUES ('94', 'Navotas', '1');
INSERT INTO `provinces` VALUES ('93', 'Muntinlupa City', '1');
INSERT INTO `provinces` VALUES ('92', 'Marikina City', '1');
INSERT INTO `provinces` VALUES ('91', 'Manila', '1');
INSERT INTO `provinces` VALUES ('90', 'Mandaluyong City', '1');
INSERT INTO `provinces` VALUES ('89', 'Malabon City', '1');
INSERT INTO `provinces` VALUES ('88', 'Makati City', '1');
INSERT INTO `provinces` VALUES ('87', 'Las Pinas City', '1');
INSERT INTO `provinces` VALUES ('86', 'Caloocan City', '1');

-- ----------------------------
-- Table structure for `regions`
-- ----------------------------
DROP TABLE IF EXISTS `regions`;
CREATE TABLE `regions` (
  `regionid` int(11) NOT NULL AUTO_INCREMENT,
  `regionname` varchar(16) NOT NULL,
  PRIMARY KEY (`regionid`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of regions
-- ----------------------------
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
-- Table structure for `searches`
-- ----------------------------
DROP TABLE IF EXISTS `searches`;
CREATE TABLE `searches` (
  `searchid` int(11) NOT NULL AUTO_INCREMENT,
  `searchbody` varchar(255) DEFAULT NULL,
  `owner` int(11) DEFAULT NULL,
  `insertedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`searchid`),
  KEY `ownerid` (`owner`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of searches
-- ----------------------------

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
  KEY `subscribee` (`subscribedto`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

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
  `supportinsertedon` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`support_id`),
  KEY `support_owner` (`owner`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

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
  `views` int(11) NOT NULL,
  `verification` int(11) NOT NULL,
  `isVerified` int(11) NOT NULL,
  `postalcode` int(11) NOT NULL,
  `access_token` varchar(255) DEFAULT NULL,
  `insertedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`userid`),
  KEY `personRef` (`personid`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
