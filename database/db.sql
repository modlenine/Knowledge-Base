/*
 Navicat MySQL Data Transfer

 Source Server         : saleecolour
 Source Server Type    : MySQL
 Source Server Version : 50538
 Source Host           : 192.190.2.3:3306
 Source Schema         : wdf

 Target Server Type    : MySQL
 Target Server Version : 50538
 File Encoding         : 65001

 Date: 29/01/2021 14:06:10
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for db
-- ----------------------------
DROP TABLE IF EXISTS `db`;
CREATE TABLE `db`  (
  `db_autoid` int(11) NOT NULL AUTO_INCREMENT,
  `db_username` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `db_password` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `db_databasename` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `db_host` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `db_active` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`db_autoid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of db
-- ----------------------------
INSERT INTO `db` VALUES (2, 'chainarong', 'Admin1234', 'wdf', '192.190.2.3', 'active');

SET FOREIGN_KEY_CHECKS = 1;
