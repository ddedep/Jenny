/*
Navicat MySQL Data Transfer

Source Server         : upmath
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : capstone

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2014-09-01 16:28:59
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
  `imagelink` tinytext,
  `body` text,
  `categoryid` int(11) NOT NULL,
  `provinceid` int(11) NOT NULL,
  `adinsertedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `view` int(11) NOT NULL,
  `isexpired` int(11) NOT NULL,
  `issold` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`adid`),
  FULLTEXT KEY `search_index` (`title`,`body`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ads
-- ----------------------------
INSERT INTO `ads` VALUES ('1', 'asdasdasd', '1', '1', '123', '60', '', 'nophoto.jpg', 'asdasd', '4', '0', '2014-06-29 19:18:52', '57', '0', '0');
INSERT INTO `ads` VALUES ('2', 'Hello', '1', '1', '123456', '30', '', null, null, '0', '1', '2014-06-30 07:01:04', '5', '0', '0');
INSERT INTO `ads` VALUES ('3', 'Hello', '1', '1', '123456', '30', '', null, 'Wazzup!', '1', '1', '2014-06-30 07:01:41', '4', '0', '1');
INSERT INTO `ads` VALUES ('4', 'Hello', '1', '1', '123456', '30', '', null, 'Wazzup!', '1', '1', '2014-06-30 07:02:41', '2', '0', '0');
INSERT INTO `ads` VALUES ('5', 'wazzup', '1', '1', '1234', '30', '', null, null, '0', '1', '2014-06-30 07:08:09', '3', '0', '0');
INSERT INTO `ads` VALUES ('6', 'wazzup', '1', '0', '1234', '30', '', null, 'hello', '1', '0', '2014-06-30 07:08:36', '0', '0', '0');
INSERT INTO `ads` VALUES ('7', 'wazzup', '1', '0', '1234', '30', '', null, 'hello', '1', '0', '2014-06-30 07:09:09', '0', '0', '0');
INSERT INTO `ads` VALUES ('8', 'wazzup', '1', '1', '1234', '30', '', 'Abbey_Friends6.jpg', 'hello', '1', '0', '2014-08-31 23:54:10', '39', '0', '0');
INSERT INTO `ads` VALUES ('9', 'ako gpoge', '1', '0', '12345', '30', '', '0', 'hello po', '1', '0', '2014-06-30 07:10:46', '11', '0', '1');
INSERT INTO `ads` VALUES ('10', 'pooogay', '1', '0', '1234', '30', '', '0', 'pogi', '1', '0', '2014-06-30 16:27:17', '4', '0', '0');
INSERT INTO `ads` VALUES ('11', 'hallelujah', '1', '0', '12345', '30', '', 'string2.jpg', 'hallelujah', '1', '0', '2014-06-30 23:24:00', '0', '0', '0');
INSERT INTO `ads` VALUES ('12', 'hallelujah', '1', '0', '12345', '30', '', 'string3.jpg', 'hallelujah', '1', '0', '2014-06-30 23:25:36', '0', '0', '0');
INSERT INTO `ads` VALUES ('13', 'hallelujah', '1', '0', '12345', '30', '', 'string4.jpg', 'hallelujah', '1', '0', '2014-06-30 23:27:13', '0', '0', '0');
INSERT INTO `ads` VALUES ('14', 'bo hoo', '1', '0', '12345', '30', '', 'zxc5.jpg', 'asd', '1', '1', '2014-06-30 23:32:27', '0', '0', '0');
INSERT INTO `ads` VALUES ('15', 'asdasdasd', '1', '0', '12345', '30', '', 'zxc6.jpg', 'asdadasdasd', '1', '60', '2014-06-30 23:35:54', '0', '0', '0');
INSERT INTO `ads` VALUES ('16', 'hallelujah', '1', '0', '12345', '30', '', 'qwe2.jpg', 'hallelujah', '1', '63', '2014-06-30 23:36:49', '0', '0', '0');
INSERT INTO `ads` VALUES ('17', 'hallelujah', '1', '0', '12345', '30', '', 'qwe3.jpg', 'hallelujah', '1', '63', '2014-06-30 23:42:33', '0', '0', '0');
INSERT INTO `ads` VALUES ('18', 'boohhhooo', '4', '1', '123', '30', '', '', 'asd', '1', '0', '2014-07-01 06:53:46', '36', '0', '0');
INSERT INTO `ads` VALUES ('19', '*&*(&*', '0', '0', null, '7', null, null, '!@^#%^&@', '0', '0', '2014-07-28 00:24:49', '0', '1', '0');
INSERT INTO `ads` VALUES ('20', '*&*(&*', '0', '0', null, '7', null, null, '!@^#%^&@', '0', '0', '2014-07-28 00:24:51', '0', '1', '0');
INSERT INTO `ads` VALUES ('21', '*&*(&*', '0', '0', null, '7', null, null, '!@^#%^&@', '0', '0', '2014-07-28 00:24:51', '0', '1', '0');
INSERT INTO `ads` VALUES ('22', '*&*(&*', '0', '0', null, '7', null, null, '!@^#%^&@', '0', '0', '2014-07-28 00:24:52', '0', '1', '0');
INSERT INTO `ads` VALUES ('23', '*&*(&*', '0', '0', null, '7', null, null, '!@^#%^&@', '0', '0', '2014-07-28 00:24:52', '0', '1', '0');
INSERT INTO `ads` VALUES ('24', '*&*(&*', '0', '0', null, '7', null, null, '!@^#%^&@', '0', '0', '2014-07-28 00:24:52', '0', '1', '0');
INSERT INTO `ads` VALUES ('25', '*&*(&*', '0', '0', null, '7', null, null, '!@^#%^&@', '0', '0', '2014-07-28 00:24:52', '0', '1', '0');
INSERT INTO `ads` VALUES ('26', '*&*(&*', '0', '0', null, '7', null, null, '!@^#%^&@', '0', '0', '2014-07-28 00:24:52', '0', '1', '0');
INSERT INTO `ads` VALUES ('27', '*&*(&*', '0', '0', null, '7', null, null, '!@^#%^&@', '0', '0', '2014-07-28 00:24:53', '0', '1', '0');
INSERT INTO `ads` VALUES ('28', '*&*(&*', '0', '0', null, '7', null, null, '!@^#%^&@', '0', '0', '2014-07-28 00:24:53', '0', '1', '0');
INSERT INTO `ads` VALUES ('29', '*&*(&*', '0', '0', null, '7', null, null, '!@^#%^&@', '0', '0', '2014-07-28 00:24:53', '0', '1', '0');
INSERT INTO `ads` VALUES ('30', '*&*(&*', '0', '0', null, '7', null, null, '!@^#%^&@', '0', '0', '2014-07-28 00:24:53', '0', '1', '0');
INSERT INTO `ads` VALUES ('31', '*&*(&*', '0', '0', null, '7', null, null, '!@^#%^&@', '0', '0', '2014-07-28 00:24:53', '0', '1', '0');
INSERT INTO `ads` VALUES ('32', '*&*(&*', '0', '0', null, '7', null, null, '!@^#%^&@', '0', '0', '2014-07-28 00:24:54', '0', '1', '0');
INSERT INTO `ads` VALUES ('33', '*&*(&*', '0', '0', null, '7', null, null, '!@^#%^&@', '0', '0', '2014-07-28 00:24:54', '0', '1', '0');
INSERT INTO `ads` VALUES ('34', '*&*(&*', '0', '0', null, '7', null, null, '!@^#%^&@', '0', '0', '2014-07-28 00:24:54', '0', '1', '0');
INSERT INTO `ads` VALUES ('35', '*&*(&*', '0', '0', null, '7', null, null, '!@^#%^&@', '0', '0', '2014-07-28 00:24:54', '0', '1', '0');
INSERT INTO `ads` VALUES ('36', '*&*(&*', '0', '0', null, '7', null, null, '!@^#%^&@', '0', '0', '2014-07-28 00:24:54', '0', '1', '0');
INSERT INTO `ads` VALUES ('37', '*&*(&*', '0', '0', null, '7', null, null, '!@^#%^&@', '0', '0', '2014-07-28 00:24:55', '0', '1', '0');
INSERT INTO `ads` VALUES ('38', '*&*(&*', '0', '0', null, '7', null, null, '!@^#%^&@', '0', '0', '2014-07-28 00:24:55', '0', '1', '0');
INSERT INTO `ads` VALUES ('39', 'qwert', '1', '0', '1234', '30', '', '', 'asdasd', '1', '46', '2014-08-31 18:07:07', '0', '0', '0');
INSERT INTO `ads` VALUES ('40', 'qwert', '1', '0', '1234', '30', '', '', 'asdasd', '1', '46', '2014-08-31 18:07:32', '0', '0', '0');
INSERT INTO `ads` VALUES ('41', 'asdas', '1', '1', '1234', '30', '', 'nophoto.jpg', '1234', '4', '0', '2014-08-31 18:08:42', '10', '0', '0');
INSERT INTO `ads` VALUES ('42', 'asdasd', '1', '0', '1234', '30', '', '', 'asdasd', '8', '43', '2014-09-01 00:02:47', '5', '0', '0');
INSERT INTO `ads` VALUES ('43', 'asdas', '1', '0', '1234', '15', '', '', 'asdasd', '2', '59', '2014-08-31 19:53:54', '1', '0', '0');
INSERT INTO `ads` VALUES ('44', 'asdas', '1', '0', '1234', '15', '', '', 'asdasd', '2', '59', '2014-08-31 19:54:22', '5', '0', '1');
INSERT INTO `ads` VALUES ('45', 'Para kay Jenny', '1', '1', '1234', '30', '_GOR5gvQwDI', '', 'Boom panis', '5', '27', '2014-08-31 20:24:53', '4', '0', '1');
INSERT INTO `ads` VALUES ('46', 'lasdj apsodajkd j912oj w90ijqs;di 12ejs dams d-821iejdn asdjasdm12uiemdas,dajsndiojwo', '1', '0', '123454', '30', '', '', 'asdasd', '2', '43', '2014-09-01 04:00:12', '1', '0', '0');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of comments
-- ----------------------------
INSERT INTO `comments` VALUES ('1', 'oo nga eh. laaks ng trip sa buhay', '1', '1', '2014-06-29 19:55:13');
INSERT INTO `comments` VALUES ('2', 'asdasdasda', '1', '1', '2014-06-29 21:14:18');

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of favorites
-- ----------------------------
INSERT INTO `favorites` VALUES ('1', '2', '1', '00:00:00');
INSERT INTO `favorites` VALUES ('3', '1', '18', '00:00:00');

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
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

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
INSERT INTO `images` VALUES ('12', 'images.jpg', '10');
INSERT INTO `images` VALUES ('13', 'string2.jpg', '11');
INSERT INTO `images` VALUES ('14', 'string3.jpg', '12');
INSERT INTO `images` VALUES ('15', 'string4.jpg', '13');
INSERT INTO `images` VALUES ('16', 'zxc5.jpg', '14');
INSERT INTO `images` VALUES ('17', 'zxc6.jpg', '15');
INSERT INTO `images` VALUES ('18', 'qwe2.jpg', '16');
INSERT INTO `images` VALUES ('19', 'qwe3.jpg', '17');
INSERT INTO `images` VALUES ('20', 'ching1.jpg', '41');

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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of lookingfor
-- ----------------------------
INSERT INTO `lookingfor` VALUES ('2', 'panget', '1', '0', '2014-07-01 06:26:23');
INSERT INTO `lookingfor` VALUES ('4', 'w', '1', '0', '2014-08-31 22:33:56');
INSERT INTO `lookingfor` VALUES ('6', 'Jengjeng', '1', '0', '2014-09-01 03:05:40');
INSERT INTO `lookingfor` VALUES ('7', 'ajuajuajua', '1', '0', '2014-09-01 03:06:02');

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of messages
-- ----------------------------
INSERT INTO `messages` VALUES ('1', 'asdasdasdasdas', '2', '1', '0', '1', '0', '2014-06-29 21:22:21');
INSERT INTO `messages` VALUES ('2', 'wazzup bro!', '1', '2', '1', '0', '0', '2014-06-29 22:57:31');
INSERT INTO `messages` VALUES ('3', 'wazzzup', '1', '2', '0', '0', '0', '2014-06-30 00:23:21');
INSERT INTO `messages` VALUES ('4', 'hupia', '1', '2', '0', '0', '0', '2014-06-30 23:46:41');
INSERT INTO `messages` VALUES ('5', 'asdasdas', '1', '4', '0', '0', '0', '2014-08-31 23:12:46');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of payments
-- ----------------------------
INSERT INTO `payments` VALUES ('1', '1000000', '3', '2014-06-30 13:57:31');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of persons
-- ----------------------------
INSERT INTO `persons` VALUES ('1', 'Edep', 'Dexter', 'Delacruz', '1993-10-31', '+639062321440', 'abeey7.jpeg', '2014-06-29 19:17:54');
INSERT INTO `persons` VALUES ('2', 'asdasd', 'asdasd', 'asdasd', '2000-01-01', '+639062321440', 'Abbey_Friends12.jpg', '2014-06-29 21:20:31');
INSERT INTO `persons` VALUES ('3', 'asd', 'asd', 'asd', '1914-01-01', '639151973669', 'zxc4.jpg', '2014-06-30 22:32:02');
INSERT INTO `persons` VALUES ('4', 'Edep', 'Dexter', 'Delacruz', '1914-01-01', '+639062321440', 'default.jpg', '2014-07-01 04:09:24');

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
) ENGINE=MyISAM AUTO_INCREMENT=250 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of searches
-- ----------------------------
INSERT INTO `searches` VALUES ('1', 'asdasdasdasd', '1', '2014-06-30 01:43:07');
INSERT INTO `searches` VALUES ('2', 'asdasd', '1', '2014-06-30 01:43:32');
INSERT INTO `searches` VALUES ('3', 'asdasd', '1', '2014-06-30 01:48:54');
INSERT INTO `searches` VALUES ('4', 'asdasdasd ', '1', '2014-06-30 01:49:30');
INSERT INTO `searches` VALUES ('5', '', '1', '2014-06-30 21:25:39');
INSERT INTO `searches` VALUES ('6', '0', '1', '2014-06-30 21:26:04');
INSERT INTO `searches` VALUES ('7', 'hallelujah', '1', '2014-06-30 21:43:28');
INSERT INTO `searches` VALUES ('8', 'hallelujah', '1', '2014-06-30 21:44:26');
INSERT INTO `searches` VALUES ('9', 'hallelujah', '1', '2014-06-30 21:45:04');
INSERT INTO `searches` VALUES ('10', 'hallelujah', '1', '2014-06-30 21:45:15');
INSERT INTO `searches` VALUES ('11', 'hallelujah', '1', '2014-06-30 21:45:29');
INSERT INTO `searches` VALUES ('12', 'hallelujah', '1', '2014-06-30 21:45:49');
INSERT INTO `searches` VALUES ('13', 'hallelujah', '1', '2014-06-30 21:48:05');
INSERT INTO `searches` VALUES ('14', 'hallelujah', '1', '2014-06-30 21:49:34');
INSERT INTO `searches` VALUES ('15', 'hallelujah', '1', '2014-06-30 21:49:44');
INSERT INTO `searches` VALUES ('16', '0', '1', '2014-06-30 21:49:53');
INSERT INTO `searches` VALUES ('17', '0', '1', '2014-06-30 21:50:15');
INSERT INTO `searches` VALUES ('18', '0', '1', '2014-06-30 21:50:52');
INSERT INTO `searches` VALUES ('19', 'hallelujah', '1', '2014-06-30 21:50:58');
INSERT INTO `searches` VALUES ('20', '', '4', '2014-07-01 04:33:40');
INSERT INTO `searches` VALUES ('21', 'hello', '4', '2014-07-01 04:39:51');
INSERT INTO `searches` VALUES ('22', 'pooogay', '4', '2014-07-01 04:40:07');
INSERT INTO `searches` VALUES ('23', '0', '4', '2014-07-01 04:43:14');
INSERT INTO `searches` VALUES ('24', 'pooogay', '4', '2014-07-01 04:43:21');
INSERT INTO `searches` VALUES ('25', 'pooogay', '4', '2014-07-01 04:47:43');
INSERT INTO `searches` VALUES ('26', 'a', '4', '2014-07-01 04:48:34');
INSERT INTO `searches` VALUES ('27', 'w', '4', '2014-07-01 04:48:41');
INSERT INTO `searches` VALUES ('28', 'weeee', '4', '2014-07-01 04:51:29');
INSERT INTO `searches` VALUES ('29', 'asdasdasd', '1', '2014-07-01 06:26:13');
INSERT INTO `searches` VALUES ('30', 'panget', '1', '2014-07-01 06:26:20');
INSERT INTO `searches` VALUES ('31', 'wazzup', '1', '2014-07-01 12:46:35');
INSERT INTO `searches` VALUES ('32', 'hello', '1', '2014-07-27 00:23:49');
INSERT INTO `searches` VALUES ('33', 'Hello', '1', '2014-07-27 00:24:12');
INSERT INTO `searches` VALUES ('34', 'asdasdasd', '1', '2014-07-27 00:24:22');
INSERT INTO `searches` VALUES ('35', 'asdasdasd', '1', '2014-07-27 00:25:18');
INSERT INTO `searches` VALUES ('36', '0', '1', '2014-07-27 00:27:29');
INSERT INTO `searches` VALUES ('37', 'asdasdasd', '1', '2014-07-27 00:27:36');
INSERT INTO `searches` VALUES ('38', 'asdasdasd', '1', '2014-07-27 00:33:53');
INSERT INTO `searches` VALUES ('39', '0', '1', '2014-07-27 00:34:22');
INSERT INTO `searches` VALUES ('40', 'asdasdasd', '1', '2014-07-27 00:34:33');
INSERT INTO `searches` VALUES ('41', 'asdasdasd', '1', '2014-07-27 00:35:05');
INSERT INTO `searches` VALUES ('42', '0', '1', '2014-07-27 00:35:22');
INSERT INTO `searches` VALUES ('43', '0', '1', '2014-07-27 00:38:18');
INSERT INTO `searches` VALUES ('44', '0', '1', '2014-07-27 00:38:40');
INSERT INTO `searches` VALUES ('45', '0', '1', '2014-07-27 00:38:44');
INSERT INTO `searches` VALUES ('46', '0', '1', '2014-07-27 00:39:04');
INSERT INTO `searches` VALUES ('47', '0', '1', '2014-07-27 00:40:07');
INSERT INTO `searches` VALUES ('48', '0', '1', '2014-07-27 00:40:36');
INSERT INTO `searches` VALUES ('49', '0', '1', '2014-07-27 00:41:03');
INSERT INTO `searches` VALUES ('50', '0', '1', '2014-07-27 00:41:37');
INSERT INTO `searches` VALUES ('51', '0', '1', '2014-07-27 00:42:13');
INSERT INTO `searches` VALUES ('52', '0', '1', '2014-07-27 00:42:47');
INSERT INTO `searches` VALUES ('53', '0', '1', '2014-07-27 00:43:11');
INSERT INTO `searches` VALUES ('54', '0', '1', '2014-07-27 00:43:28');
INSERT INTO `searches` VALUES ('55', '0', '1', '2014-07-27 00:44:26');
INSERT INTO `searches` VALUES ('56', '0', '1', '2014-07-27 00:44:59');
INSERT INTO `searches` VALUES ('57', '0', '1', '2014-07-27 00:45:32');
INSERT INTO `searches` VALUES ('58', '0', '1', '2014-07-27 00:45:48');
INSERT INTO `searches` VALUES ('59', '0', '1', '2014-07-27 00:46:12');
INSERT INTO `searches` VALUES ('60', '0', '1', '2014-07-27 00:46:21');
INSERT INTO `searches` VALUES ('61', '0', '1', '2014-07-27 00:46:47');
INSERT INTO `searches` VALUES ('62', '0', '1', '2014-07-27 00:47:40');
INSERT INTO `searches` VALUES ('63', '0', '1', '2014-07-27 00:48:08');
INSERT INTO `searches` VALUES ('64', '0', '1', '2014-07-27 00:48:51');
INSERT INTO `searches` VALUES ('65', '0', '1', '2014-07-27 00:49:46');
INSERT INTO `searches` VALUES ('66', '0', '1', '2014-07-27 00:50:11');
INSERT INTO `searches` VALUES ('67', '0', '1', '2014-07-27 00:50:26');
INSERT INTO `searches` VALUES ('68', '0', '1', '2014-07-27 00:51:39');
INSERT INTO `searches` VALUES ('69', '0', '1', '2014-07-27 00:52:10');
INSERT INTO `searches` VALUES ('70', '0', '1', '2014-07-27 00:53:13');
INSERT INTO `searches` VALUES ('71', '0', '1', '2014-07-27 00:55:22');
INSERT INTO `searches` VALUES ('72', 'asdasdasd', '1', '2014-07-27 00:55:34');
INSERT INTO `searches` VALUES ('73', 'asd', '1', '2014-07-27 00:55:41');
INSERT INTO `searches` VALUES ('74', 'asdasd', '1', '2014-07-27 00:55:48');
INSERT INTO `searches` VALUES ('75', 'asd', '1', '2014-08-31 20:25:21');
INSERT INTO `searches` VALUES ('76', 'asd', '1', '2014-08-31 20:28:28');
INSERT INTO `searches` VALUES ('77', 'asd', '1', '2014-08-31 20:28:39');
INSERT INTO `searches` VALUES ('78', '0', '1', '2014-08-31 20:28:42');
INSERT INTO `searches` VALUES ('79', '0', '1', '2014-08-31 20:29:43');
INSERT INTO `searches` VALUES ('80', '0', '1', '2014-08-31 20:30:24');
INSERT INTO `searches` VALUES ('81', '0', '1', '2014-08-31 20:30:27');
INSERT INTO `searches` VALUES ('82', '0', '1', '2014-08-31 20:30:50');
INSERT INTO `searches` VALUES ('83', '0', '1', '2014-08-31 20:31:04');
INSERT INTO `searches` VALUES ('84', '0', '1', '2014-08-31 20:31:07');
INSERT INTO `searches` VALUES ('85', '0', '1', '2014-08-31 20:31:15');
INSERT INTO `searches` VALUES ('86', '0', '1', '2014-08-31 20:31:26');
INSERT INTO `searches` VALUES ('87', '0', '1', '2014-08-31 20:32:32');
INSERT INTO `searches` VALUES ('88', '0', '1', '2014-08-31 20:32:45');
INSERT INTO `searches` VALUES ('89', '0', '1', '2014-08-31 20:33:38');
INSERT INTO `searches` VALUES ('90', '0', '1', '2014-08-31 20:34:16');
INSERT INTO `searches` VALUES ('91', '0', '1', '2014-08-31 20:34:56');
INSERT INTO `searches` VALUES ('92', '0', '1', '2014-08-31 20:35:12');
INSERT INTO `searches` VALUES ('93', '0', '1', '2014-08-31 20:35:24');
INSERT INTO `searches` VALUES ('94', '0', '1', '2014-08-31 20:35:29');
INSERT INTO `searches` VALUES ('95', '0', '1', '2014-08-31 20:39:07');
INSERT INTO `searches` VALUES ('96', '0', '1', '2014-08-31 20:39:07');
INSERT INTO `searches` VALUES ('97', '0', '1', '2014-08-31 20:40:51');
INSERT INTO `searches` VALUES ('98', '0', '1', '2014-08-31 20:41:15');
INSERT INTO `searches` VALUES ('99', '0', '1', '2014-08-31 20:41:51');
INSERT INTO `searches` VALUES ('100', '0', '1', '2014-08-31 20:42:13');
INSERT INTO `searches` VALUES ('101', '0', '1', '2014-08-31 20:42:38');
INSERT INTO `searches` VALUES ('102', '0', '1', '2014-08-31 20:42:40');
INSERT INTO `searches` VALUES ('103', '0', '1', '2014-08-31 20:43:30');
INSERT INTO `searches` VALUES ('104', '0', '1', '2014-08-31 20:44:17');
INSERT INTO `searches` VALUES ('105', '0', '1', '2014-08-31 20:44:33');
INSERT INTO `searches` VALUES ('106', '0', '1', '2014-08-31 20:44:33');
INSERT INTO `searches` VALUES ('107', '0', '1', '2014-08-31 20:45:15');
INSERT INTO `searches` VALUES ('108', '0', '1', '2014-08-31 20:45:54');
INSERT INTO `searches` VALUES ('109', '0', '1', '2014-08-31 20:46:04');
INSERT INTO `searches` VALUES ('110', '0', '1', '2014-08-31 20:46:17');
INSERT INTO `searches` VALUES ('111', '0', '1', '2014-08-31 20:47:18');
INSERT INTO `searches` VALUES ('112', '0', '1', '2014-08-31 20:47:30');
INSERT INTO `searches` VALUES ('113', '0', '1', '2014-08-31 20:47:45');
INSERT INTO `searches` VALUES ('114', '0', '1', '2014-08-31 20:48:00');
INSERT INTO `searches` VALUES ('115', '0', '1', '2014-08-31 20:48:13');
INSERT INTO `searches` VALUES ('116', '0', '1', '2014-08-31 20:48:29');
INSERT INTO `searches` VALUES ('117', '0', '1', '2014-08-31 20:48:31');
INSERT INTO `searches` VALUES ('118', '0', '1', '2014-08-31 20:49:50');
INSERT INTO `searches` VALUES ('119', '0', '1', '2014-08-31 20:50:03');
INSERT INTO `searches` VALUES ('120', '0', '1', '2014-08-31 20:50:13');
INSERT INTO `searches` VALUES ('121', '0', '1', '2014-08-31 20:50:56');
INSERT INTO `searches` VALUES ('122', '0', '1', '2014-08-31 20:50:57');
INSERT INTO `searches` VALUES ('123', '0', '1', '2014-08-31 20:51:27');
INSERT INTO `searches` VALUES ('124', '0', '1', '2014-08-31 20:52:29');
INSERT INTO `searches` VALUES ('125', '0', '1', '2014-08-31 20:52:52');
INSERT INTO `searches` VALUES ('126', '0', '1', '2014-08-31 20:53:01');
INSERT INTO `searches` VALUES ('127', '0', '1', '2014-08-31 20:53:23');
INSERT INTO `searches` VALUES ('128', '0', '1', '2014-08-31 20:53:55');
INSERT INTO `searches` VALUES ('129', '0', '1', '2014-08-31 20:55:09');
INSERT INTO `searches` VALUES ('130', '0', '1', '2014-08-31 20:55:28');
INSERT INTO `searches` VALUES ('131', '0', '1', '2014-08-31 20:55:37');
INSERT INTO `searches` VALUES ('132', '0', '1', '2014-08-31 20:56:13');
INSERT INTO `searches` VALUES ('133', '0', '1', '2014-08-31 20:56:14');
INSERT INTO `searches` VALUES ('134', '0', '1', '2014-08-31 20:56:39');
INSERT INTO `searches` VALUES ('135', 'asd', '1', '2014-08-31 21:04:34');
INSERT INTO `searches` VALUES ('136', 'asd', '1', '2014-08-31 21:04:55');
INSERT INTO `searches` VALUES ('137', 'asd', '1', '2014-08-31 21:05:18');
INSERT INTO `searches` VALUES ('138', 'asd', '1', '2014-08-31 21:07:38');
INSERT INTO `searches` VALUES ('139', 'asd', '1', '2014-08-31 21:08:08');
INSERT INTO `searches` VALUES ('140', 'asd', '1', '2014-08-31 21:08:21');
INSERT INTO `searches` VALUES ('141', 'asd', '1', '2014-08-31 21:08:31');
INSERT INTO `searches` VALUES ('142', 'asd', '1', '2014-08-31 21:08:43');
INSERT INTO `searches` VALUES ('143', 'asd', '1', '2014-08-31 21:08:59');
INSERT INTO `searches` VALUES ('144', 'asd', '1', '2014-08-31 21:09:08');
INSERT INTO `searches` VALUES ('145', 'asd', '1', '2014-08-31 21:09:20');
INSERT INTO `searches` VALUES ('146', 'asd', '1', '2014-08-31 21:09:25');
INSERT INTO `searches` VALUES ('147', 'asd', '1', '2014-08-31 21:09:32');
INSERT INTO `searches` VALUES ('148', '0', '1', '2014-08-31 21:09:36');
INSERT INTO `searches` VALUES ('149', '0', '1', '2014-08-31 21:09:44');
INSERT INTO `searches` VALUES ('150', '0', '1', '2014-08-31 21:09:52');
INSERT INTO `searches` VALUES ('151', '0', '1', '2014-08-31 21:09:59');
INSERT INTO `searches` VALUES ('152', '0', '1', '2014-08-31 21:10:07');
INSERT INTO `searches` VALUES ('153', '0', '1', '2014-08-31 21:10:27');
INSERT INTO `searches` VALUES ('154', '0', '1', '2014-08-31 21:10:32');
INSERT INTO `searches` VALUES ('155', '0', '1', '2014-08-31 21:10:38');
INSERT INTO `searches` VALUES ('156', '0', '1', '2014-08-31 21:11:13');
INSERT INTO `searches` VALUES ('157', '0', '1', '2014-08-31 21:11:18');
INSERT INTO `searches` VALUES ('158', '0', '1', '2014-08-31 21:11:28');
INSERT INTO `searches` VALUES ('159', '0', '1', '2014-08-31 21:11:34');
INSERT INTO `searches` VALUES ('160', '0', '1', '2014-08-31 21:11:39');
INSERT INTO `searches` VALUES ('161', '0', '1', '2014-08-31 21:11:51');
INSERT INTO `searches` VALUES ('162', '0', '1', '2014-08-31 21:12:15');
INSERT INTO `searches` VALUES ('163', '0', '1', '2014-08-31 21:12:29');
INSERT INTO `searches` VALUES ('164', '0', '1', '2014-08-31 21:12:40');
INSERT INTO `searches` VALUES ('165', '0', '1', '2014-08-31 21:12:46');
INSERT INTO `searches` VALUES ('166', '0', '1', '2014-08-31 21:12:56');
INSERT INTO `searches` VALUES ('167', '0', '1', '2014-08-31 21:13:11');
INSERT INTO `searches` VALUES ('168', '0', '1', '2014-08-31 21:13:25');
INSERT INTO `searches` VALUES ('169', '0', '1', '2014-08-31 21:13:38');
INSERT INTO `searches` VALUES ('170', '0', '1', '2014-08-31 21:14:14');
INSERT INTO `searches` VALUES ('171', '0', '1', '2014-08-31 21:14:20');
INSERT INTO `searches` VALUES ('172', '0', '1', '2014-08-31 21:14:25');
INSERT INTO `searches` VALUES ('173', '0', '1', '2014-08-31 21:14:33');
INSERT INTO `searches` VALUES ('174', '0', '1', '2014-08-31 21:14:40');
INSERT INTO `searches` VALUES ('175', '0', '1', '2014-08-31 21:15:06');
INSERT INTO `searches` VALUES ('176', '0', '1', '2014-08-31 21:15:25');
INSERT INTO `searches` VALUES ('177', '0', '1', '2014-08-31 21:15:34');
INSERT INTO `searches` VALUES ('178', '0', '1', '2014-08-31 21:18:25');
INSERT INTO `searches` VALUES ('179', '0', '1', '2014-08-31 21:18:34');
INSERT INTO `searches` VALUES ('180', '0', '1', '2014-08-31 21:18:39');
INSERT INTO `searches` VALUES ('181', '0', '1', '2014-08-31 21:18:45');
INSERT INTO `searches` VALUES ('182', '0', '1', '2014-08-31 21:19:50');
INSERT INTO `searches` VALUES ('183', '0', '1', '2014-08-31 21:20:15');
INSERT INTO `searches` VALUES ('184', '0', '1', '2014-08-31 21:20:27');
INSERT INTO `searches` VALUES ('185', '0', '1', '2014-08-31 21:21:15');
INSERT INTO `searches` VALUES ('186', '0', '1', '2014-08-31 21:21:23');
INSERT INTO `searches` VALUES ('187', '0', '1', '2014-08-31 21:21:31');
INSERT INTO `searches` VALUES ('188', '0', '1', '2014-08-31 21:21:34');
INSERT INTO `searches` VALUES ('189', '0', '1', '2014-08-31 21:21:52');
INSERT INTO `searches` VALUES ('190', '0', '1', '2014-08-31 21:22:27');
INSERT INTO `searches` VALUES ('191', '0', '1', '2014-08-31 21:22:33');
INSERT INTO `searches` VALUES ('192', '0', '1', '2014-08-31 21:22:59');
INSERT INTO `searches` VALUES ('193', '0', '1', '2014-08-31 21:23:01');
INSERT INTO `searches` VALUES ('194', '0', '1', '2014-08-31 21:23:14');
INSERT INTO `searches` VALUES ('195', '0', '1', '2014-08-31 21:23:20');
INSERT INTO `searches` VALUES ('196', '0', '1', '2014-08-31 21:23:31');
INSERT INTO `searches` VALUES ('197', '0', '1', '2014-08-31 21:23:36');
INSERT INTO `searches` VALUES ('198', '0', '1', '2014-08-31 21:23:39');
INSERT INTO `searches` VALUES ('199', '0', '1', '2014-08-31 21:23:39');
INSERT INTO `searches` VALUES ('200', '0', '1', '2014-08-31 21:23:39');
INSERT INTO `searches` VALUES ('201', '0', '1', '2014-08-31 21:23:39');
INSERT INTO `searches` VALUES ('202', '0', '1', '2014-08-31 21:23:54');
INSERT INTO `searches` VALUES ('203', 'asd', '1', '2014-08-31 21:24:05');
INSERT INTO `searches` VALUES ('204', 'asd', '1', '2014-08-31 21:24:18');
INSERT INTO `searches` VALUES ('205', 'asd', '1', '2014-08-31 21:24:41');
INSERT INTO `searches` VALUES ('206', 'asd', '1', '2014-08-31 21:25:02');
INSERT INTO `searches` VALUES ('207', 'asd', '1', '2014-08-31 21:25:16');
INSERT INTO `searches` VALUES ('208', 'asd', '1', '2014-08-31 21:25:48');
INSERT INTO `searches` VALUES ('209', 'asd', '1', '2014-08-31 21:29:48');
INSERT INTO `searches` VALUES ('210', 'asd', '1', '2014-08-31 21:29:59');
INSERT INTO `searches` VALUES ('211', 'asd', '1', '2014-08-31 21:35:04');
INSERT INTO `searches` VALUES ('212', 'asd', '1', '2014-08-31 21:36:20');
INSERT INTO `searches` VALUES ('213', 'asd', '1', '2014-08-31 21:36:33');
INSERT INTO `searches` VALUES ('214', 'asd', '1', '2014-08-31 21:41:07');
INSERT INTO `searches` VALUES ('215', 'asd', '1', '2014-08-31 21:42:14');
INSERT INTO `searches` VALUES ('216', 'asd', '1', '2014-08-31 21:42:30');
INSERT INTO `searches` VALUES ('217', 'asd', '1', '2014-08-31 21:44:57');
INSERT INTO `searches` VALUES ('218', 'asd', '1', '2014-08-31 21:45:12');
INSERT INTO `searches` VALUES ('219', 'asd', '1', '2014-08-31 21:45:40');
INSERT INTO `searches` VALUES ('220', 'asd', '1', '2014-08-31 21:46:06');
INSERT INTO `searches` VALUES ('221', 'asd', '1', '2014-08-31 21:46:22');
INSERT INTO `searches` VALUES ('222', 'asd', '1', '2014-08-31 21:46:45');
INSERT INTO `searches` VALUES ('223', 'asd', '1', '2014-08-31 21:46:52');
INSERT INTO `searches` VALUES ('224', 'asd', '1', '2014-08-31 21:47:05');
INSERT INTO `searches` VALUES ('225', 'asd', '1', '2014-08-31 21:47:12');
INSERT INTO `searches` VALUES ('226', 'asd', '1', '2014-08-31 21:48:21');
INSERT INTO `searches` VALUES ('227', 'asd', '1', '2014-08-31 21:48:43');
INSERT INTO `searches` VALUES ('228', 'asd', '1', '2014-08-31 21:48:54');
INSERT INTO `searches` VALUES ('229', 'asd', '1', '2014-08-31 21:54:03');
INSERT INTO `searches` VALUES ('230', 'asd', '1', '2014-08-31 21:55:43');
INSERT INTO `searches` VALUES ('231', 'asd', '1', '2014-08-31 21:56:16');
INSERT INTO `searches` VALUES ('232', 'asd', '1', '2014-08-31 21:56:51');
INSERT INTO `searches` VALUES ('233', 'asd', '1', '2014-08-31 21:57:57');
INSERT INTO `searches` VALUES ('234', 'asd', '1', '2014-08-31 21:58:42');
INSERT INTO `searches` VALUES ('235', 'asd', '1', '2014-08-31 21:59:00');
INSERT INTO `searches` VALUES ('236', 'asd', '1', '2014-08-31 22:00:02');
INSERT INTO `searches` VALUES ('237', 'asd', '1', '2014-08-31 22:10:36');
INSERT INTO `searches` VALUES ('238', 'asd', '1', '2014-08-31 22:18:30');
INSERT INTO `searches` VALUES ('239', 'w', '1', '2014-08-31 22:24:53');
INSERT INTO `searches` VALUES ('240', 'w', '1', '2014-08-31 22:28:51');
INSERT INTO `searches` VALUES ('241', 'w', '1', '2014-08-31 22:29:05');
INSERT INTO `searches` VALUES ('242', 'asd', '1', '2014-08-31 23:19:51');
INSERT INTO `searches` VALUES ('243', 'asd', '1', '2014-08-31 23:24:20');
INSERT INTO `searches` VALUES ('244', 'asd', '1', '2014-08-31 23:25:16');
INSERT INTO `searches` VALUES ('245', 'w', '1', '2014-09-01 02:06:45');
INSERT INTO `searches` VALUES ('246', 'w', '1', '2014-09-01 02:07:08');
INSERT INTO `searches` VALUES ('247', 'panget', '1', '2014-09-01 02:07:17');
INSERT INTO `searches` VALUES ('248', 'panget', '1', '2014-09-01 02:11:42');
INSERT INTO `searches` VALUES ('249', 'Jenny', '1', '2014-09-01 02:13:09');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of subscriptions
-- ----------------------------
INSERT INTO `subscriptions` VALUES ('2', '4', '1', '2014-09-01 00:44:27');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of support
-- ----------------------------
INSERT INTO `support` VALUES ('1', 'Daming problema ni Jenny', 'whatttt', '1', '2014-07-26 23:42:18');
INSERT INTO `support` VALUES ('2', 'asdasd', 'asdasdas', '1', '2014-07-26 23:42:18');
INSERT INTO `support` VALUES ('3', 'Hallo palloasdasd', 'asdasda', '1', '2014-07-26 23:42:18');
INSERT INTO `support` VALUES ('4', 'una daw oh', 'una ka\r\n', '1', '2014-07-26 23:43:48');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '1', 'dexkcd', 'anette', 'dexter_edep@yahoo.com', '9131', 'UHA', '13', '3980', '1', '0', null, '2014-06-29 19:17:54');
INSERT INTO `users` VALUES ('2', '2', 'dexter', 'asdasd', 'dexteredep@gmail.com', '0', 'UHA', '34', '8198', '1', '0', null, '2014-06-29 21:20:31');
INSERT INTO `users` VALUES ('4', '4', 'angel123', 'asdasd', 'pogi@dexkcd.com', '700', 'uha', '17', '5921', '1', '0', null, '2014-07-01 04:09:24');

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
