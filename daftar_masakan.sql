/*
 Navicat Premium Data Transfer

 Source Server         : koneksi
 Source Server Type    : MySQL
 Source Server Version : 100131
 Source Host           : localhost:3306
 Source Schema         : db_siresto

 Target Server Type    : MySQL
 Target Server Version : 100131
 File Encoding         : 65001

 Date: 14/06/2020 16:40:28
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for daftar_masakan
-- ----------------------------
DROP TABLE IF EXISTS `daftar_masakan`;
CREATE TABLE `daftar_masakan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_bahan_oalahan` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jenis` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of daftar_masakan
-- ----------------------------
INSERT INTO `daftar_masakan` VALUES (6, 1, 1, '3', 1);
INSERT INTO `daftar_masakan` VALUES (7, 2, 1, '1', 1);

SET FOREIGN_KEY_CHECKS = 1;
