/*
Navicat MySQL Data Transfer

Source Server         : imamalang.com
Source Server Version : 50645
Source Host           : imamalang.com:3306
Source Database       : k9170490_ima

Target Server Type    : MYSQL
Target Server Version : 50645
File Encoding         : 65001

Date: 2020-03-16 13:58:45
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `admin_nama` varchar(50) DEFAULT NULL,
  `admin_username` varchar(100) DEFAULT NULL,
  `admin_password` varchar(32) DEFAULT NULL,
  `admin_view_password` varchar(32) DEFAULT NULL,
  `admin_level` char(2) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', 'admin', 'e00cf25ad42683b3df678c61f42c6bda', 'admin1', '1');
