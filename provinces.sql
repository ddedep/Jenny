/*
Navicat MySQL Data Transfer

Source Server         : upmath
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : capstone

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2014-09-01 23:24:32
*/

SET FOREIGN_KEY_CHECKS=0;

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
