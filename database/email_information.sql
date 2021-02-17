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

 Date: 29/01/2021 14:06:19
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for email_information
-- ----------------------------
DROP TABLE IF EXISTS `email_information`;
CREATE TABLE `email_information`  (
  `email_id` int(10) NOT NULL AUTO_INCREMENT,
  `email_user` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email_password` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`email_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of email_information
-- ----------------------------
INSERT INTO `email_information` VALUES (1, 'wdf_system@saleecolour.com', 'WdfSystem*9999');

SET FOREIGN_KEY_CHECKS = 1;
