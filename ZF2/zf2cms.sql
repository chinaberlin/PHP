/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50527
Source Host           : localhost:3306
Source Database       : zf2cms

Target Server Type    : MYSQL
Target Server Version : 50527
File Encoding         : 65001

Date: 2014-07-07 16:04:12
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for kp-cms-user
-- ----------------------------
DROP TABLE IF EXISTS `kp-cms-user`;
CREATE TABLE `kp-cms-user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `reg_date` datetime DEFAULT NULL,
  `reg_ip` varchar(15) DEFAULT NULL,
  `old_password` varchar(32) DEFAULT NULL,
  `is_validator_email` tinyint(4) DEFAULT NULL,
  `email_validator_key` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kp-cms-user
-- ----------------------------
INSERT INTO `kp-cms-user` VALUES ('1', '1', '', '123@qq.com', '2014-06-30 13:40:14', '11', null, null, null);
INSERT INTO `kp-cms-user` VALUES ('3', 'chinaberlin', '123456', '234@qq.com', null, null, null, null, null);
INSERT INTO `kp-cms-user` VALUES ('4', 'chinaberlin', '', '', null, null, null, null, null);
INSERT INTO `kp-cms-user` VALUES ('5', '222222', '1', '1111@qq.com', null, null, null, null, null);
INSERT INTO `kp-cms-user` VALUES ('6', '444444444', '4', '1111@qq.com', null, null, null, null, null);
INSERT INTO `kp-cms-user` VALUES ('7', 'blueblack', '1', '111111111111@qq.com', '2014-07-02 11:07:12', '127.0.0.1', null, null, null);
INSERT INTO `kp-cms-user` VALUES ('8', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@qq.com', '2014-07-02 15:07:17', '127.0.0.1', null, null, null);

-- ----------------------------
-- Table structure for kp-cms-user-login-info
-- ----------------------------
DROP TABLE IF EXISTS `kp-cms-user-login-info`;
CREATE TABLE `kp-cms-user-login-info` (
  `uid` bigint(20) NOT NULL,
  `login_ip` varchar(15) DEFAULT NULL,
  `login_date` datetime DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kp-cms-user-login-info
-- ----------------------------

-- ----------------------------
-- Table structure for kp-cms-user-meta
-- ----------------------------
DROP TABLE IF EXISTS `kp-cms-user-meta`;
CREATE TABLE `kp-cms-user-meta` (
  `user_id` bigint(20) NOT NULL,
  `sex` tinyint(4) DEFAULT NULL,
  `qq` varchar(11) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kp-cms-user-meta
-- ----------------------------

-- ----------------------------
-- Table structure for kp-csm-nested
-- ----------------------------
DROP TABLE IF EXISTS `kp-csm-nested`;
CREATE TABLE `kp-csm-nested` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `l` int(11) DEFAULT NULL,
  `r` int(11) DEFAULT NULL,
  `depth` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kp-csm-nested
-- ----------------------------
INSERT INTO `kp-csm-nested` VALUES ('1', 'blog', '1', '6', '1');
INSERT INTO `kp-csm-nested` VALUES ('2', 'php', '2', '3', '2');
INSERT INTO `kp-csm-nested` VALUES ('3', 'tp', '4', '5', '2');

-- ----------------------------
-- Table structure for kp-tree-path-enum
-- ----------------------------
DROP TABLE IF EXISTS `kp-tree-path-enum`;
CREATE TABLE `kp-tree-path-enum` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `depth` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kp-tree-path-enum
-- ----------------------------
INSERT INTO `kp-tree-path-enum` VALUES ('1', 'blog', '1/', '1');
INSERT INTO `kp-tree-path-enum` VALUES ('2', 'php', '1/2/', '2');
INSERT INTO `kp-tree-path-enum` VALUES ('3', 'javascript', '1/3/', '2');
INSERT INTO `kp-tree-path-enum` VALUES ('4', 'zf2', '1/2/4/', '3');
INSERT INTO `kp-tree-path-enum` VALUES ('5', 'tp', '1/2/5/', '3');
INSERT INTO `kp-tree-path-enum` VALUES ('6', 'jquery', '1/3/6/', '3');
INSERT INTO `kp-tree-path-enum` VALUES ('7', 'jquery-ui', '1/3/6/7/', '4');
INSERT INTO `kp-tree-path-enum` VALUES ('8', 'tp-2', '1/2/5/8/', '4');
