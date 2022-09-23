/*
 Navicat Premium Data Transfer

 Source Server         : mysql
 Source Server Type    : MySQL
 Source Server Version : 100424
 Source Host           : localhost:3306
 Source Schema         : tradebox

 Target Server Type    : MySQL
 Target Server Version : 100424
 File Encoding         : 65001

 Date: 25/08/2022 09:00:58
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for dbt_user
-- ----------------------------
DROP TABLE IF EXISTS `dbt_user`;
CREATE TABLE `dbt_user`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `first_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `last_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password_reset_token` varchar(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `googleauth` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `referral_id` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `referral_status` tinyint(1) NOT NULL DEFAULT 0,
  `language` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `country` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `city` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `address` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `bio` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `image` varchar(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL COMMENT '\"0=Deactivated account, 1=Activated account, 2=Pending account, 3=Suspend account\"',
  `verified` int NOT NULL DEFAULT 0 COMMENT '0= did not submit info, 1= verified, 2=Cancel, 3=processing',
  `created` timestamp NOT NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  `created_date` timestamp NULL DEFAULT NULL,
  `ip` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `xx_messenger` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `user_id`(`user_id` ASC) USING BTREE,
  UNIQUE INDEX `email`(`email` ASC) USING BTREE,
  UNIQUE INDEX `phone`(`phone` ASC) USING BTREE,
  UNIQUE INDEX `username`(`username` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dbt_user
-- ----------------------------
INSERT INTO `dbt_user` VALUES (1, 'test', 'user1', NULL, NULL, 'info@zerofees.exchange', '202cb962ac59075b964b07152d234b70', NULL, '2a44d074056cd22c13788f29d0cff64d', NULL, NULL, 0, 'english', NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-07-15 06:19:57', '2022-07-06 19:31:18', '188.43.136.42', NULL);
INSERT INTO `dbt_user` VALUES (2, 'DM30NW', 'Tester', '1', NULL, 'ico@atlas.cz', '1ffa4e1792b7727be29881c6042649e9', '722522733', NULL, NULL, '', 0, 'english', NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-07-07 23:18:19', '2022-07-07 10:18:19', '78.102.254.44', NULL);
INSERT INTO `dbt_user` VALUES (3, 'NMUF1X', 'Tester', '2', NULL, 'import@atlas.cz', '1ffa4e1792b7727be29881c6042649e9', '722333555', NULL, NULL, '', 0, 'english', NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-07-07 23:19:28', '2022-07-07 10:19:28', '78.102.254.44', NULL);
INSERT INTO `dbt_user` VALUES (4, 'M4LRTH', 'oook', '', NULL, 'jbertinetti8765@protonmail.hu', '9ad66ae2c7d1a63f562c7ca8c0185254', '555444888', 'ab390a405eb201202da8ed8fd24479c8', NULL, NULL, 0, 'english', NULL, NULL, NULL, NULL, NULL, 0, 0, '2022-07-21 05:49:21', '2022-07-15 00:06:27', '86.49.142.252', NULL);
INSERT INTO `dbt_user` VALUES (5, '0XUC2Z', 'ghovjnjv', '', NULL, 'sample@email.hu', '9ad66ae2c7d1a63f562c7ca8c0185254', '555888444', 'de7dff371d3cd7aab29002d78b4fc688', NULL, NULL, 0, 'english', NULL, NULL, NULL, NULL, NULL, 0, 0, '2022-07-21 05:49:51', '2022-07-19 04:05:51', '86.49.142.252', NULL);
INSERT INTO `dbt_user` VALUES (6, 'YZTR9N', 'test', NULL, NULL, 'koa06800@gmail.com', '67bc8f62d836d14a881a69c973b338bf', NULL, '63468455c683a0f3730d4f6d2094d0da', NULL, NULL, 0, 'english', NULL, NULL, NULL, NULL, NULL, 0, 0, '2022-07-31 12:26:09', '2022-07-31 12:26:09', '176.103.49.201', NULL);
INSERT INTO `dbt_user` VALUES (7, 'WYAIH5', 'NX Wang', NULL, NULL, 'nxwang00@gmail.com', 'e53aa6ec8b3bba0deb026f399d4f7134', NULL, 'f6110e85a18c38f38d41eee34ebe8857', NULL, NULL, 0, 'english', NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-08-24 01:40:36', '2022-08-24 03:39:00', '127.0.0.1', '');
INSERT INTO `dbt_user` VALUES (8, 'Q6F2EK', 'Nai', 'Xu', NULL, 'wang@gmail.com', 'e53aa6ec8b3bba0deb026f399d4f7134', NULL, NULL, NULL, '', 0, 'english', NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-08-24 07:47:10', '2022-08-24 09:47:10', '127.0.0.1', 'abcde');
INSERT INTO `dbt_user` VALUES (10, 'XZAABN', 'Jinting Wang', '', NULL, 'jinting@gmail.com', '5f5464cdc76e0945e752a8590bf735dd', NULL, 'ba5e8c7a273bc3691b771544015949f0', NULL, NULL, 0, 'english', NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-08-24 07:55:55', '2022-08-24 09:54:47', '127.0.0.1', 'qqqqq');

SET FOREIGN_KEY_CHECKS = 1;
