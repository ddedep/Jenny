/*
Navicat MySQL Data Transfer

Source Server         : upmath
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : capstone

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2014-06-18 19:45:12
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of adcomment
-- ----------------------------
INSERT INTO `adcomment` VALUES ('1', 'asdadsasd', '3', null, '2014-06-08 11:36:48');
INSERT INTO `adcomment` VALUES ('2', 'asdasdas', '3', '23', '2014-06-08 11:36:48');
INSERT INTO `adcomment` VALUES ('3', 'essd', '3', '23', '2014-06-08 11:36:48');
INSERT INTO `adcomment` VALUES ('4', 'asdasdasd', '3', '23', '2014-06-08 11:36:48');
INSERT INTO `adcomment` VALUES ('5', 'wadsa', '3', '23', '0000-00-00 00:00:00');
INSERT INTO `adcomment` VALUES ('6', 'asdasdas', '3', '23', '2014-06-08 11:38:50');
INSERT INTO `adcomment` VALUES ('7', 'hello po!', '3', '23', '2014-06-08 11:39:06');
INSERT INTO `adcomment` VALUES ('8', 'wazzzup\n', '3', '23', '2014-06-08 11:39:37');

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
  `categoryid` int(11) NOT NULL,
  `provinceid` int(11) NOT NULL,
  `insertedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `view` int(11) NOT NULL,
  `isexpired` int(11) NOT NULL,
  PRIMARY KEY (`adid`),
  FULLTEXT KEY `search_index` (`title`,`body`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ads
-- ----------------------------
INSERT INTO `ads` VALUES ('5', 'hello', '4', '1', '127', '30', null, 'https://www.youtube.com/watch?v=qjHlgrGsLWQ', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat', '3', '3', '2014-06-08 12:02:15', '2', '1');
INSERT INTO `ads` VALUES ('6', 'New blouse for sale', '5', '1', '127', '7', null, 'bit.ly/something', 'buy it now ', '2', '1', '2014-04-28 15:45:55', '1', '1');
INSERT INTO `ads` VALUES ('7', '123', '2', '0', '127', '30', 'asd', 'asdasd', '312312', '3', '3', '2014-05-12 22:38:53', '1', '1');
INSERT INTO `ads` VALUES ('9', '123123', '2', '1', '127', '30', 'asd', 'asdas', '12312', '3', '3', '2014-05-12 22:44:01', '0', '1');
INSERT INTO `ads` VALUES ('10', '123123', '2', '0', '431', '30', 'asd', 'asdas', '12312', '3', '3', '2014-05-12 22:44:59', '0', '1');
INSERT INTO `ads` VALUES ('17', 'Wazzup', '2', '1', '123456', '7', 'watch?v=H7HmzwI67ec', '26985871.jpg', 'Nothing', '3', '3', '2014-05-15 08:23:53', '0', '1');
INSERT INTO `ads` VALUES ('18', 'asdqwe', '2', '0', '123456', '30', 'H7HmzwI67ec', '22.jpg', 'asdqwe', '2', '1', '2014-05-15 08:32:16', '0', '1');
INSERT INTO `ads` VALUES ('19', 'Something New', '7', '0', '123456', '7', 'g3Rf5qDuq7M', 'dra.jpg', 'asdasd', '2', '3', '2014-05-15 13:16:38', '0', '1');
INSERT INTO `ads` VALUES ('20', 'Car broom', '3', '1', '123456', '45', '', 'Abbey_Friends10.jpg', 'hello', '1', '16', '2014-06-16 16:17:07', '3', '0');
INSERT INTO `ads` VALUES ('21', 'Jenny boom', '3', '0', '123', '30', '', '', 'asdasd', '5', '16', '2014-06-16 16:30:13', '4', '0');

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

-- ----------------------------
-- Table structure for `cities`
-- ----------------------------
DROP TABLE IF EXISTS `cities`;
CREATE TABLE `cities` (
  `provinceid` int(11) NOT NULL AUTO_INCREMENT,
  `provincename` varchar(32) DEFAULT NULL,
  `regionid` int(11) DEFAULT NULL,
  PRIMARY KEY (`provinceid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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
  KEY `thread` (`threadid`),
  CONSTRAINT `commentowner` FOREIGN KEY (`owner`) REFERENCES `users` (`userid`),
  CONSTRAINT `thread` FOREIGN KEY (`threadid`) REFERENCES `support` (`support_id`)
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of comments
-- ----------------------------
INSERT INTO `comments` VALUES ('2', 'asdasdas', '3', '1', '2014-06-01 10:53:04');
INSERT INTO `comments` VALUES ('3', 'hello', '3', '1', '2014-06-01 11:32:41');
INSERT INTO `comments` VALUES ('4', 'hello', '3', '1', '2014-06-01 11:33:17');
INSERT INTO `comments` VALUES ('5', 'undefined', '3', '1', '2014-06-01 11:34:30');
INSERT INTO `comments` VALUES ('6', 'Hello world!', '3', '1', '2014-06-01 11:35:25');
INSERT INTO `comments` VALUES ('7', 'Hello world!', '3', '1', '2014-06-01 11:46:43');
INSERT INTO `comments` VALUES ('8', 'Hello world!', '3', '1', '2014-06-01 11:46:46');
INSERT INTO `comments` VALUES ('9', 'krishy', '3', '1', '2014-06-01 11:47:00');
INSERT INTO `comments` VALUES ('10', 'krishy', '3', '1', '2014-06-01 11:47:40');
INSERT INTO `comments` VALUES ('11', 'wazz', '3', '1', '2014-06-01 11:49:20');
INSERT INTO `comments` VALUES ('12', 'wazz', '3', '1', '2014-06-01 11:50:13');
INSERT INTO `comments` VALUES ('13', 'wazz', '3', '1', '2014-06-01 11:50:14');
INSERT INTO `comments` VALUES ('14', 'wazzp', '3', '1', '2014-06-01 11:50:18');
INSERT INTO `comments` VALUES ('15', 'wazzp', '3', '1', '2014-06-01 11:50:39');
INSERT INTO `comments` VALUES ('16', 'adsad', '3', '1', '2014-06-01 11:50:47');
INSERT INTO `comments` VALUES ('17', 'asdasdas', '3', '1', '2014-06-01 11:51:16');
INSERT INTO `comments` VALUES ('18', 'asdasdas', '3', '1', '2014-06-01 11:53:34');
INSERT INTO `comments` VALUES ('19', 'asdasdas', '3', '1', '2014-06-01 11:54:08');
INSERT INTO `comments` VALUES ('20', 'asdasdas', '3', '1', '2014-06-01 11:54:26');
INSERT INTO `comments` VALUES ('21', 'asdasdasdasd', '3', '1', '2014-06-01 14:40:06');
INSERT INTO `comments` VALUES ('22', 'Jenny!', '3', '1', '2014-06-01 14:43:38');
INSERT INTO `comments` VALUES ('23', 'Wazzup!', '3', '1', '2014-06-01 14:46:49');
INSERT INTO `comments` VALUES ('25', 'asdadasdasd', '3', '1', '2014-06-01 15:07:20');
INSERT INTO `comments` VALUES ('26', 'asdadss', '3', '1', '2014-06-01 15:08:04');
INSERT INTO `comments` VALUES ('27', 'asdasdas', '3', '1', '2014-06-01 15:09:53');
INSERT INTO `comments` VALUES ('28', 'asdasds', '3', '1', '2014-06-01 15:09:59');
INSERT INTO `comments` VALUES ('29', 'asdasdas', '3', '1', '2014-06-01 15:10:12');
INSERT INTO `comments` VALUES ('30', 'dexkcd', '3', '1', '2014-06-01 15:17:17');
INSERT INTO `comments` VALUES ('31', 'wakaka', '3', '1', '2014-06-01 15:18:59');
INSERT INTO `comments` VALUES ('32', 'hehehe', '3', '1', '2014-06-01 15:19:20');
INSERT INTO `comments` VALUES ('33', 'wazzuupp', '3', '1', '2014-06-01 15:19:55');
INSERT INTO `comments` VALUES ('34', 'asdadas', '3', '1', '2014-06-01 15:20:21');
INSERT INTO `comments` VALUES ('35', 'asdadas', '3', '1', '2014-06-01 15:20:21');
INSERT INTO `comments` VALUES ('36', 'sdasdas', '3', '1', '2014-06-01 15:21:00');
INSERT INTO `comments` VALUES ('37', 'sdasdasasda', '3', '1', '2014-06-01 15:24:20');
INSERT INTO `comments` VALUES ('38', 'asdadasdasdasdasd ajujuuju', '3', '1', '2014-06-01 15:24:56');
INSERT INTO `comments` VALUES ('39', 'asdasdasdas', '3', '1', '2014-06-01 15:26:50');
INSERT INTO `comments` VALUES ('40', 'asdadadas', '3', '1', '2014-06-01 15:27:18');
INSERT INTO `comments` VALUES ('41', 'wazzzupasda', '3', '1', '2014-06-01 15:27:26');
INSERT INTO `comments` VALUES ('42', 'Si jenny ay narito sa likod ko', '3', '1', '2014-06-01 15:28:07');
INSERT INTO `comments` VALUES ('43', 'gumana kaaaa', '3', '1', '2014-06-01 15:28:33');
INSERT INTO `comments` VALUES ('44', 'asdadasda', '3', '1', '2014-06-01 15:39:43');
INSERT INTO `comments` VALUES ('45', 'asdasda', '3', '2', '2014-06-01 15:49:32');
INSERT INTO `comments` VALUES ('46', 'May malaking teddy bear sa sofa', '3', '3', '2014-06-01 15:50:07');
INSERT INTO `comments` VALUES ('47', 'asdasdasdsa', '3', '1', '2014-06-01 17:51:12');
INSERT INTO `comments` VALUES ('48', 'poagay', '3', '1', '2014-06-01 17:51:17');
INSERT INTO `comments` VALUES ('49', 'asdasdas', '3', '1', '2014-06-01 17:51:43');
INSERT INTO `comments` VALUES ('128', 'apooogay', '3', '1', '2014-06-02 21:33:34');

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
  KEY `favid` (`favoriteAdid`),
  CONSTRAINT `favid` FOREIGN KEY (`favoriteAdid`) REFERENCES `ads` (`adid`),
  CONSTRAINT `fordid` FOREIGN KEY (`ownerid`) REFERENCES `users` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of favorites
-- ----------------------------
INSERT INTO `favorites` VALUES ('1', '3', '19', '00:00:00');
INSERT INTO `favorites` VALUES ('2', '3', '19', '00:00:00');
INSERT INTO `favorites` VALUES ('3', '3', '7', '00:00:00');
INSERT INTO `favorites` VALUES ('4', '3', '10', '00:00:00');
INSERT INTO `favorites` VALUES ('5', '3', '9', '00:00:00');

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
INSERT INTO `persons` VALUES ('1', 'Edep', 'dexter', 'Delacruz', '1993-10-31', '09261687667', 'WIN_20140526_2334329.JPG', '2014-04-24 17:22:56');
INSERT INTO `persons` VALUES ('2', 'Dexter Enrick', 'asd', 'Edep', null, '09062321440', '', '2014-04-24 17:24:07');
INSERT INTO `persons` VALUES ('3', 'Juan', 'edep', 'delacruz', null, '09062321440', '', '2014-04-24 17:25:23');
INSERT INTO `persons` VALUES ('4', 'Juan', 'edep', 'delacruz', null, '09062321440', '', '2014-04-24 17:28:54');
INSERT INTO `persons` VALUES ('5', 'Peter', 'John', 'Thomas', null, '1234567', '', '2014-04-28 09:31:29');
INSERT INTO `persons` VALUES ('6', 'asd', 'Jenny', 'Miraflores', null, '095929529', '', '2014-04-28 15:42:58');
INSERT INTO `persons` VALUES ('7', 'dasd', 'dexter', 'asdasd', null, '123545', '', '2014-05-13 11:20:15');
INSERT INTO `persons` VALUES ('8', 'dasd', 'dexter', 'asdasd', null, '123545', '', '2014-05-13 11:22:50');
INSERT INTO `persons` VALUES ('9', 'asd', 'dexter', 'asd', null, 'asd123123', '', '2014-05-13 11:23:37');
INSERT INTO `persons` VALUES ('10', 'asd', 'dexter', 'asd', null, 'asd123123', 'qwe1.jpg', '2014-05-13 11:30:30');
INSERT INTO `persons` VALUES ('11', 'dela cruz', 'Dexter Enrick', 'Edep', null, '09062321440', 'abs.jpg', '2014-05-15 08:58:56');
INSERT INTO `persons` VALUES ('12', 'dela cruz', 'Dexter Enrick', 'Edep', '2000-10-31', '09062321440', 'abs1.jpg', '2014-05-15 08:59:34');

-- ----------------------------
-- Table structure for `provinces`
-- ----------------------------
DROP TABLE IF EXISTS `provinces`;
CREATE TABLE `provinces` (
  `provinceid` int(11) NOT NULL AUTO_INCREMENT,
  `provincename` varchar(32) DEFAULT NULL,
  `regionid` int(11) DEFAULT NULL,
  PRIMARY KEY (`provinceid`),
  KEY `region` (`regionid`),
  CONSTRAINT `region` FOREIGN KEY (`regionid`) REFERENCES `regions` (`regionid`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
INSERT INTO `provinces` VALUES ('86', 'Valenzuela City', '1');
INSERT INTO `provinces` VALUES ('87', 'Taguig', '1');
INSERT INTO `provinces` VALUES ('88', 'San Juan', '1');
INSERT INTO `provinces` VALUES ('89', 'Quezon City', '1');
INSERT INTO `provinces` VALUES ('90', 'Pateros', '1');
INSERT INTO `provinces` VALUES ('91', 'Pasig City', '1');
INSERT INTO `provinces` VALUES ('92', 'Pasay City', '1');
INSERT INTO `provinces` VALUES ('93', 'Paranaque City', '1');
INSERT INTO `provinces` VALUES ('94', 'Navotas', '1');
INSERT INTO `provinces` VALUES ('95', 'Muntinlupa City', '1');
INSERT INTO `provinces` VALUES ('96', 'Marikina City', '1');
INSERT INTO `provinces` VALUES ('97', 'Manila', '1');
INSERT INTO `provinces` VALUES ('98', 'Mandaluyong City', '1');
INSERT INTO `provinces` VALUES ('99', 'Malabon City', '1');
INSERT INTO `provinces` VALUES ('100', 'Makati City', '1');
INSERT INTO `provinces` VALUES ('101', 'Las Pinas City', '1');
INSERT INTO `provinces` VALUES ('102', 'Caloocan City', null);

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
INSERT INTO `regions` VALUES ('0', 'Region');
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
  KEY `ownerid` (`owner`),
  CONSTRAINT `ownerid` FOREIGN KEY (`owner`) REFERENCES `users` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of searches
-- ----------------------------
INSERT INTO `searches` VALUES ('1', 'wazzup', '3', '2014-06-12 22:22:55');
INSERT INTO `searches` VALUES ('2', 'hello', '3', '2014-06-12 22:22:55');
INSERT INTO `searches` VALUES ('3', 'kupal mode on', '4', '2014-06-12 22:22:55');
INSERT INTO `searches` VALUES ('4', 'kamusta', '3', '2014-06-12 22:24:54');

-- ----------------------------
-- Table structure for `sold`
-- ----------------------------
DROP TABLE IF EXISTS `sold`;
CREATE TABLE `sold` (
  `soldid` int(11) NOT NULL AUTO_INCREMENT,
  `adid` int(11) DEFAULT NULL,
  `insertedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`soldid`),
  KEY `ad` (`adid`),
  CONSTRAINT `ad` FOREIGN KEY (`adid`) REFERENCES `ads` (`adid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sold
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
  KEY `subscribee` (`subscribedto`),
  CONSTRAINT `owner` FOREIGN KEY (`subscriber`) REFERENCES `users` (`userid`),
  CONSTRAINT `subscribee` FOREIGN KEY (`subscribedto`) REFERENCES `users` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of subscriptions
-- ----------------------------
INSERT INTO `subscriptions` VALUES ('2', '4', '3', '2014-05-15 12:46:04');
INSERT INTO `subscriptions` VALUES ('3', '4', '3', '2014-05-15 12:48:51');
INSERT INTO `subscriptions` VALUES ('4', '4', '3', '2014-05-15 13:46:08');
INSERT INTO `subscriptions` VALUES ('5', '4', '3', '2014-05-15 14:33:01');
INSERT INTO `subscriptions` VALUES ('6', '7', '3', '2014-05-22 14:46:11');
INSERT INTO `subscriptions` VALUES ('7', '7', '3', '2014-05-22 14:46:28');
INSERT INTO `subscriptions` VALUES ('9', '3', '7', '2014-05-22 15:14:55');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of support
-- ----------------------------
INSERT INTO `support` VALUES ('1', 'Ano itey?', 'ewan', '3');
INSERT INTO `support` VALUES ('2', 'Ano itey?', 'ewan', '3');
INSERT INTO `support` VALUES ('3', 'Bahay ni Jenny', 'So anong meron sa bahay ni Jenny?', '3');

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
INSERT INTO `users` VALUES ('3', '1', 'dexkcd', '123456', 'dexter_edep@yahoo.com', '430', 'wazzup', '5300', '2014-04-24 17:28:54');
INSERT INTO `users` VALUES ('4', '5', 'batman', '123456', 'dexter_edep@yahoo.com', '0', '0', '5300', '2014-04-28 09:31:29');
INSERT INTO `users` VALUES ('5', '6', 'jennymiraflores', '123456', 'something@yahoo.com', '0', '0', '5300', '2014-04-28 15:42:58');
INSERT INTO `users` VALUES ('7', '8', 'dededep', '123456', '123456', '0', '0', '1234', '2014-05-13 11:22:50');
INSERT INTO `users` VALUES ('8', '9', 'asdqwe', 'asdqwe', 'asdqwe', '0', '0', '123', '2014-05-13 11:23:37');
INSERT INTO `users` VALUES ('9', '10', 'asdqwe1', 'asdqwe', 'asdqwe', '0', '0', '123', '2014-05-13 11:30:30');
INSERT INTO `users` VALUES ('11', '12', 'asdqwerty', 'asdqwe', 'dexter_edep@yahoo.com', '0', '0', '5300', '2014-05-15 08:59:34');

-- ----------------------------
-- Table structure for `wishes`
-- ----------------------------
DROP TABLE IF EXISTS `wishes`;
CREATE TABLE `wishes` (
  `wishid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `adid` int(11) NOT NULL,
  PRIMARY KEY (`wishid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of wishes
-- ----------------------------
INSERT INTO `wishes` VALUES ('1', '3', '9');
INSERT INTO `wishes` VALUES ('2', '3', '5');

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
