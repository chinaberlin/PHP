/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50527
Source Host           : localhost:3306
Source Database       : zf2mvc

Target Server Type    : MYSQL
Target Server Version : 50527
File Encoding         : 65001

Date: 2014-06-04 15:34:44
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for album
-- ----------------------------
DROP TABLE IF EXISTS `album`;
CREATE TABLE `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artist` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of album
-- ----------------------------
INSERT INTO `album` VALUES ('1', 'The Military Wives', 'In My Dreams');
INSERT INTO `album` VALUES ('2', 'Adele', '21');
INSERT INTO `album` VALUES ('3', 'Bruce Springsteen', 'Wrecking Ball (Deluxe)');
INSERT INTO `album` VALUES ('4', 'Lana Del Rey', 'Born To Die');
INSERT INTO `album` VALUES ('5', 'Gotye', 'Making Mirrors');
