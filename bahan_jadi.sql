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

 Date: 14/06/2020 16:41:58
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for bahan_jadi
-- ----------------------------
DROP TABLE IF EXISTS `bahan_jadi`;
CREATE TABLE `bahan_jadi`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_masakan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `porsi` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` enum('on','off') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of bahan_jadi
-- ----------------------------
INSERT INTO `bahan_jadi` VALUES (1, 'Sambal Tomat', 8, 'mangkuk sambel 2MIli', 'off');
INSERT INTO `bahan_jadi` VALUES (3, 'Ayam Geprek', 1, 'satu porsi', 'on');

SET FOREIGN_KEY_CHECKS = 1;
