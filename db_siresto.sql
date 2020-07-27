/*
 Navicat Premium Data Transfer

 Source Server         : konek
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : db_siresto

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 27/07/2020 08:12:50
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
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bahan_jadi
-- ----------------------------
INSERT INTO `bahan_jadi` VALUES (1, 'Sambal Tomat', 8, 'mangkuk sambel 2MIli', 'off');
INSERT INTO `bahan_jadi` VALUES (3, 'Ayam Geprek', 1, 'satu porsi', 'on');

-- ----------------------------
-- Table structure for bahan_mentah
-- ----------------------------
DROP TABLE IF EXISTS `bahan_mentah`;
CREATE TABLE `bahan_mentah`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_resto` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_logistik` int(11) NOT NULL,
  `nama_bahan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `satuan_besar` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `stok` int(11) NOT NULL,
  `status` int(255) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of bahan_mentah
-- ----------------------------
INSERT INTO `bahan_mentah` VALUES (1, '1', 34, 'ayam kampung', 'ekor', 21, 1);
INSERT INTO `bahan_mentah` VALUES (2, '1', 34, 'tomat', 'kg', 8, 1);
INSERT INTO `bahan_mentah` VALUES (3, '1', 34, 'tepung', 'kg', 6, 0);

-- ----------------------------
-- Table structure for bahan_mentah_masakan
-- ----------------------------
DROP TABLE IF EXISTS `bahan_mentah_masakan`;
CREATE TABLE `bahan_mentah_masakan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produksi_masakan` int(11) NOT NULL,
  `id_bahan_mentah` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of bahan_mentah_masakan
-- ----------------------------
INSERT INTO `bahan_mentah_masakan` VALUES (1, 1, 1, 1);
INSERT INTO `bahan_mentah_masakan` VALUES (2, 2, 3, 1);

-- ----------------------------
-- Table structure for bahan_olahan
-- ----------------------------
DROP TABLE IF EXISTS `bahan_olahan`;
CREATE TABLE `bahan_olahan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_logistik` int(11) NOT NULL,
  `nama_bahan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `satuan_kecil` varchar(199) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `stok` int(11) NOT NULL,
  `status` int(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of bahan_olahan
-- ----------------------------
INSERT INTO `bahan_olahan` VALUES (1, 34, 'ayam kampung paha', 'buah', 3, 1);
INSERT INTO `bahan_olahan` VALUES (3, 34, 'ayam kampung dada', 'buah', 0, 1);

-- ----------------------------
-- Table structure for bahan_olahan_masakan
-- ----------------------------
DROP TABLE IF EXISTS `bahan_olahan_masakan`;
CREATE TABLE `bahan_olahan_masakan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produksi_masakan` int(11) NOT NULL,
  `id_bahan_olahan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of bahan_olahan_masakan
-- ----------------------------
INSERT INTO `bahan_olahan_masakan` VALUES (4, 2, 1, 1);
INSERT INTO `bahan_olahan_masakan` VALUES (5, 1, 1, 1);

-- ----------------------------
-- Table structure for biaya_lain
-- ----------------------------
DROP TABLE IF EXISTS `biaya_lain`;
CREATE TABLE `biaya_lain`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_resto` int(11) NOT NULL,
  `nama_biaya_lain` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of biaya_lain
-- ----------------------------
INSERT INTO `biaya_lain` VALUES (1, 1, 'brosur', 10000);
INSERT INTO `biaya_lain` VALUES (2, 1, 'zakat', 11000);

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

-- ----------------------------
-- Table structure for detail_kas
-- ----------------------------
DROP TABLE IF EXISTS `detail_kas`;
CREATE TABLE `detail_kas`  (
  `id_kas` int(11) NOT NULL AUTO_INCREMENT,
  `id_ref_kas` int(11) NULL DEFAULT NULL,
  `jenis_kas` enum('kas induk','kas cabang','kas operasional') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tipe_kas` enum('Masuk','Keluar') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tanggal` date NULL DEFAULT NULL,
  `id_superadmin` int(11) NULL DEFAULT NULL,
  `id_user` int(11) NULL DEFAULT NULL,
  `id_resto` int(11) NULL DEFAULT NULL,
  `nominal` int(20) NULL DEFAULT NULL,
  `tipe_user` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_kas`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 133 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detail_kas
-- ----------------------------
INSERT INTO `detail_kas` VALUES (6, 1, 'kas induk', 'Masuk', NULL, 1, 32, 1, 10000000, NULL);
INSERT INTO `detail_kas` VALUES (7, 1, 'kas cabang', 'Masuk', NULL, 1, 32, 1, 2000000, NULL);
INSERT INTO `detail_kas` VALUES (8, 1, 'kas operasional', 'Masuk', NULL, 1, 32, 1, 1000000, NULL);
INSERT INTO `detail_kas` VALUES (9, 2, 'kas induk', 'Keluar', NULL, 1, 32, 1, 2000000, NULL);
INSERT INTO `detail_kas` VALUES (10, 2, 'kas cabang', 'Keluar', NULL, 1, 32, 1, 1000000, NULL);
INSERT INTO `detail_kas` VALUES (15, 15, 'kas induk', 'Keluar', NULL, 1, NULL, NULL, NULL, NULL);
INSERT INTO `detail_kas` VALUES (16, 16, 'kas induk', 'Keluar', NULL, 1, 34, NULL, 120000, 'Pemberlian Alat');
INSERT INTO `detail_kas` VALUES (17, 17, 'kas induk', 'Keluar', '2020-04-03', 1, 34, NULL, 30000, 'Pembelian Alat');
INSERT INTO `detail_kas` VALUES (18, 8, 'kas induk', 'Keluar', '2020-04-03', 1, 34, NULL, 1000000, 'Pembelian Bahan Mentah');
INSERT INTO `detail_kas` VALUES (19, 10, 'kas induk', 'Masuk', '0000-00-00', 1, 32, NULL, 0, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (20, 11, 'kas induk', 'Masuk', '2020-04-03', 1, 32, NULL, 10000, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (21, 9, 'kas induk', 'Keluar', '2020-04-03', 1, 22, 4, 900000, 'Gaji Karyawan');
INSERT INTO `detail_kas` VALUES (24, 18, 'kas induk', 'Masuk', '2020-04-03', 1, 32, 4, 50000, 'Pengembalian dari Cabang');
INSERT INTO `detail_kas` VALUES (26, 20, 'kas induk', 'Keluar', '0000-00-00', 1, 32, 4, 0, 'Mutasi Ke Cabang');
INSERT INTO `detail_kas` VALUES (27, 21, 'kas induk', 'Keluar', '2020-04-03', 1, 32, 4, 1000000, 'Mutasi Ke Cabang');
INSERT INTO `detail_kas` VALUES (28, 35, 'kas cabang', 'Masuk', '2020-04-03', 1, 22, NULL, 500000, 'Setor dari Cabang');
INSERT INTO `detail_kas` VALUES (29, 22, 'kas induk', 'Keluar', '2020-04-03', 1, 32, 4, 50000, 'Mutasi Ke Cabang');
INSERT INTO `detail_kas` VALUES (30, 22, 'kas induk', 'Masuk', '2020-04-03', 1, 32, 4, 50000, 'Mutasi Dari Induk');
INSERT INTO `detail_kas` VALUES (35, 25, 'kas induk', 'Keluar', '2020-04-03', 1, 32, 4, 50000, 'Mutasi Ke Cabang');
INSERT INTO `detail_kas` VALUES (36, 25, 'kas cabang', 'Masuk', '2020-04-03', 1, 32, 4, 50000, 'Mutasi Dari Induk');
INSERT INTO `detail_kas` VALUES (37, 36, 'kas induk', 'Masuk', '2020-04-03', 1, 22, NULL, 100000, 'Setoran dari Cabang');
INSERT INTO `detail_kas` VALUES (38, 36, 'kas cabang', 'Keluar', '2020-04-03', 1, 22, NULL, 100000, 'Setoran ke Induk');
INSERT INTO `detail_kas` VALUES (39, 6, 'kas cabang', 'Keluar', '2020-04-03', 1, 4, 1, 500000, 'Mutasi Ke Operasional');
INSERT INTO `detail_kas` VALUES (40, 6, 'kas operasional', 'Masuk', '2020-04-03', 1, 4, 1, 500000, 'Mutasi Dari Cabang');
INSERT INTO `detail_kas` VALUES (41, 8, 'kas cabang', 'Keluar', '0000-00-00', 1, 7, NULL, 0, 'Operasional Kanwil');
INSERT INTO `detail_kas` VALUES (42, 9, 'kas cabang', 'Keluar', '2020-04-03', 1, 7, NULL, 100000, 'Operasional Kanwil');
INSERT INTO `detail_kas` VALUES (43, 35, 'kas cabang', 'Masuk', '2020-04-03', 1, 25, NULL, 100000, 'Setoran dari Kasir');
INSERT INTO `detail_kas` VALUES (44, 36, 'kas cabang', 'Masuk', '2020-04-03', 1, 22, NULL, 147000, 'Setoran dari Kasir');
INSERT INTO `detail_kas` VALUES (45, 26, 'kas induk', 'Keluar', '0000-00-00', 1, 32, 0, 1000000, 'Mutasi Ke Cabang');
INSERT INTO `detail_kas` VALUES (46, 26, 'kas cabang', 'Masuk', '0000-00-00', 1, 32, 0, 1000000, 'Mutasi Dari Induk');
INSERT INTO `detail_kas` VALUES (47, 10, 'kas cabang', 'Keluar', '0000-00-00', 1, 0, NULL, 5000000, 'Operasional Kanwil');
INSERT INTO `detail_kas` VALUES (48, 12, 'kas induk', 'Masuk', '2020-04-01', 1, 32, NULL, 9000000, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (49, 10, 'kas induk', 'Keluar', '2020-04-03', 1, 22, 4, 900000, 'Gaji Karyawan');
INSERT INTO `detail_kas` VALUES (50, 13, 'kas induk', 'Masuk', '2020-04-01', 1, 32, NULL, 1000000, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (51, 14, 'kas induk', 'Masuk', '2020-04-01', 1, 32, NULL, 100000, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (52, 15, 'kas induk', 'Masuk', '2020-04-08', 1, 32, NULL, 100000000, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (53, 16, 'kas induk', 'Masuk', '2020-04-09', 1, 32, NULL, 50000000, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (54, 17, 'kas induk', 'Masuk', '2020-04-09', 1, 32, NULL, 50000000, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (55, 18, 'kas induk', 'Masuk', '0000-00-00', 1, 32, NULL, 123, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (56, 19, 'kas induk', 'Masuk', '2020-04-09', 1, 32, NULL, 12, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (57, 20, 'kas induk', 'Masuk', '2020-04-09', 1, 32, NULL, 10000000, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (58, 21, 'kas induk', 'Masuk', '2020-04-09', 1, 32, NULL, 50000000, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (59, 22, 'kas induk', 'Masuk', '2020-04-09', 1, 32, NULL, 50000000, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (60, 23, 'kas induk', 'Masuk', '2020-04-09', 1, 32, NULL, 50000000, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (61, 24, 'kas induk', 'Masuk', '2020-04-09', 1, 32, NULL, 50000000, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (62, 25, 'kas induk', 'Masuk', '2020-04-09', 1, 32, NULL, 50000000, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (63, 26, 'kas induk', 'Masuk', '2020-04-09', 1, 32, NULL, 50000000, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (64, 27, 'kas induk', 'Masuk', '2020-04-09', 1, 32, NULL, 50000000, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (65, 28, 'kas induk', 'Masuk', '2020-04-09', 1, 32, NULL, 50000000, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (66, 29, 'kas induk', 'Masuk', '2020-04-09', 1, 32, NULL, 50000000, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (67, 30, 'kas induk', 'Masuk', '2020-04-09', 1, 32, NULL, 50000000, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (68, 31, 'kas induk', 'Masuk', '2020-04-09', 1, 32, NULL, 50000000, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (69, 32, 'kas induk', 'Masuk', '2020-04-09', 1, 32, NULL, 50000000, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (70, 33, 'kas induk', 'Masuk', '2020-04-09', 1, 32, NULL, 50000000, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (71, 34, 'kas induk', 'Masuk', '2020-04-09', 1, 32, NULL, 50000000, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (72, 35, 'kas induk', 'Masuk', '2020-04-09', 1, 32, NULL, 50000000, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (73, 36, 'kas induk', 'Masuk', '2020-04-09', 1, 32, NULL, 50000000, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (74, 37, 'kas induk', 'Masuk', '2020-04-09', 1, 32, NULL, 50000000, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (75, 38, 'kas induk', 'Masuk', '2020-04-09', 1, 32, NULL, 50000000, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (76, 39, 'kas induk', 'Masuk', '2020-04-09', 1, 32, NULL, 123, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (77, 40, 'kas induk', 'Masuk', '2020-04-09', 1, 32, NULL, 50000, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (78, 41, 'kas induk', 'Masuk', '2020-04-09', 1, 32, NULL, 100000000, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (79, 42, 'kas induk', 'Masuk', '2020-04-09', 1, 32, NULL, 12312, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (80, 43, 'kas induk', 'Masuk', '2020-04-09', 1, 32, NULL, 12312, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (81, 44, 'kas induk', 'Masuk', '2020-04-09', 1, 32, NULL, 10000, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (82, 45, 'kas induk', 'Masuk', '2020-04-09', 1, 32, NULL, 10000, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (83, 46, 'kas induk', 'Masuk', '2020-04-09', 1, 32, NULL, 10000, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (84, 47, 'kas induk', 'Masuk', '2020-04-09', 1, 32, NULL, 10000, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (85, 48, 'kas induk', 'Masuk', '2020-04-09', 1, 32, NULL, 50000000, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (86, 49, 'kas induk', 'Masuk', '2020-04-09', 1, 32, NULL, 10, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (87, 50, 'kas induk', 'Masuk', '2020-04-09', 1, 32, NULL, 50000000, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (88, 51, 'kas induk', 'Masuk', '2020-04-09', 1, 32, NULL, 12, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (89, 52, 'kas induk', 'Masuk', '2020-04-09', 1, 32, NULL, 12, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (90, 53, 'kas induk', 'Masuk', '2020-04-09', 1, 32, NULL, 12, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (91, 54, 'kas induk', 'Masuk', '2020-04-09', 1, 32, NULL, 12, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (92, 55, 'kas induk', 'Masuk', '2020-04-09', 1, 32, NULL, 12, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (93, 56, 'kas induk', 'Masuk', '2020-04-09', 1, 32, NULL, 12, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (94, 57, 'kas induk', 'Masuk', '2020-04-09', 1, 32, NULL, 12, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (95, 58, 'kas induk', 'Masuk', '2020-04-09', 1, 32, NULL, 50000000, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (96, 59, 'kas induk', 'Masuk', '2020-04-09', 1, 32, NULL, 50000000, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (97, 60, 'kas induk', 'Masuk', '2020-04-09', 1, 32, NULL, 1, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (98, 61, 'kas induk', 'Masuk', '2020-04-09', 1, 32, NULL, 50000000, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (99, 62, 'kas induk', 'Masuk', '2020-04-09', 1, 32, NULL, 50000000, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (100, 63, 'kas induk', 'Masuk', '2020-04-09', 1, 32, NULL, 50000000, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (101, 64, 'kas induk', 'Masuk', '2020-04-09', 1, 32, NULL, 50000000, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (102, 27, 'kas induk', 'Keluar', '2020-04-11', 1, 32, 17, 0, 'Mutasi Ke Cabang');
INSERT INTO `detail_kas` VALUES (103, 27, 'kas cabang', 'Masuk', '2020-04-11', 1, 32, 17, 0, 'Mutasi Dari Induk');
INSERT INTO `detail_kas` VALUES (104, 28, 'kas induk', 'Keluar', '2020-04-11', 1, 32, 17, 100000, 'Mutasi Ke Cabang');
INSERT INTO `detail_kas` VALUES (105, 28, 'kas cabang', 'Masuk', '2020-04-11', 1, 32, 17, 100000, 'Mutasi Dari Induk');
INSERT INTO `detail_kas` VALUES (106, 29, 'kas induk', 'Keluar', '2020-04-11', 1, 32, 17, 3000, 'Mutasi Ke Cabang');
INSERT INTO `detail_kas` VALUES (107, 29, 'kas cabang', 'Masuk', '2020-04-11', 1, 32, 17, 3000, 'Mutasi Dari Induk');
INSERT INTO `detail_kas` VALUES (108, 30, 'kas induk', 'Keluar', '2020-04-11', 1, 32, 17, 10000, 'Mutasi Ke Cabang');
INSERT INTO `detail_kas` VALUES (109, 30, 'kas cabang', 'Masuk', '2020-04-11', 1, 32, 17, 10000, 'Mutasi Dari Induk');
INSERT INTO `detail_kas` VALUES (110, 31, 'kas induk', 'Keluar', '2020-04-11', 1, 32, 17, 100000000, 'Mutasi Ke Cabang');
INSERT INTO `detail_kas` VALUES (111, 31, 'kas cabang', 'Masuk', '2020-04-11', 1, 32, 17, 100000000, 'Mutasi Dari Induk');
INSERT INTO `detail_kas` VALUES (112, 32, 'kas induk', 'Keluar', '2020-04-11', 1, 32, 17, 10000000, 'Mutasi Ke Cabang');
INSERT INTO `detail_kas` VALUES (113, 32, 'kas cabang', 'Masuk', '2020-04-11', 1, 32, 17, 10000000, 'Mutasi Dari Induk');
INSERT INTO `detail_kas` VALUES (114, 33, 'kas induk', 'Keluar', '2020-04-11', 1, 32, 17, 15000000, 'Mutasi Ke Cabang');
INSERT INTO `detail_kas` VALUES (115, 33, 'kas cabang', 'Masuk', '2020-04-11', 1, 32, 17, 15000000, 'Mutasi Dari Induk');
INSERT INTO `detail_kas` VALUES (116, 34, 'kas induk', 'Keluar', '2020-04-11', 1, 32, 17, 10000000, 'Mutasi Ke Cabang');
INSERT INTO `detail_kas` VALUES (117, 34, 'kas cabang', 'Masuk', '2020-04-11', 1, 32, 17, 10000000, 'Mutasi Dari Induk');
INSERT INTO `detail_kas` VALUES (118, 35, 'kas induk', 'Keluar', '2020-04-11', 1, 32, 17, 15000000, 'Mutasi Ke Cabang');
INSERT INTO `detail_kas` VALUES (119, 35, 'kas cabang', 'Masuk', '2020-04-11', 1, 32, 17, 15000000, 'Mutasi Dari Induk');
INSERT INTO `detail_kas` VALUES (120, 36, 'kas induk', 'Keluar', '2020-04-11', 1, 32, 17, 50000000, 'Mutasi Ke Cabang');
INSERT INTO `detail_kas` VALUES (121, 36, 'kas cabang', 'Masuk', '2020-04-11', 1, 32, 17, 50000000, 'Mutasi Dari Induk');
INSERT INTO `detail_kas` VALUES (122, 37, 'kas induk', 'Keluar', '2020-04-12', 1, 32, 17, 1000000, 'Mutasi Ke Cabang');
INSERT INTO `detail_kas` VALUES (123, 37, 'kas cabang', 'Masuk', '2020-04-12', 1, 32, 17, 1000000, 'Mutasi Dari Induk');
INSERT INTO `detail_kas` VALUES (124, 65, 'kas induk', 'Masuk', '2020-04-12', 1, 32, NULL, 400000000, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (125, 66, 'kas induk', 'Masuk', '2020-04-12', 1, 32, NULL, 20000000, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (126, 67, 'kas induk', 'Masuk', '2020-04-12', 1, 32, NULL, 180000000, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (127, 38, 'kas induk', 'Keluar', '2020-04-12', 1, 32, 17, 30000000, 'Mutasi Ke Cabang');
INSERT INTO `detail_kas` VALUES (128, 38, 'kas cabang', 'Masuk', '2020-04-12', 1, 32, 17, 30000000, 'Mutasi Dari Induk');
INSERT INTO `detail_kas` VALUES (129, 68, 'kas induk', 'Masuk', '2020-04-12', 1, 32, NULL, 1000, 'Investasi Owner');
INSERT INTO `detail_kas` VALUES (131, 1, 'kas induk', 'Masuk', '2020-04-12', NULL, 32, NULL, 17987000, 'Sisa Investasi Buka Resto');
INSERT INTO `detail_kas` VALUES (132, 9, 'kas induk', 'Keluar', '2020-07-27', 1, 34, NULL, 1000, 'Pembelian Bahan Mentah');

-- ----------------------------
-- Table structure for detail_paket
-- ----------------------------
DROP TABLE IF EXISTS `detail_paket`;
CREATE TABLE `detail_paket`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_paket` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `diskon` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of detail_paket
-- ----------------------------
INSERT INTO `detail_paket` VALUES (11, 4, 1, 1, '10000', '');

-- ----------------------------
-- Table structure for detail_pembelian_alat
-- ----------------------------
DROP TABLE IF EXISTS `detail_pembelian_alat`;
CREATE TABLE `detail_pembelian_alat`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_alat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jumlah` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `harga_beli` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of detail_pembelian_alat
-- ----------------------------
INSERT INTO `detail_pembelian_alat` VALUES (12, '1', '1', '1', '8000');
INSERT INTO `detail_pembelian_alat` VALUES (13, '6', '1', '7', '7000');
INSERT INTO `detail_pembelian_alat` VALUES (14, '7', '1', '1', '9000');
INSERT INTO `detail_pembelian_alat` VALUES (15, '7', '1', '30', '5000');
INSERT INTO `detail_pembelian_alat` VALUES (16, '7', '1', '10', '5000');
INSERT INTO `detail_pembelian_alat` VALUES (17, '1', '1', '5', '2500');
INSERT INTO `detail_pembelian_alat` VALUES (18, '1', '1', '5', '2500');
INSERT INTO `detail_pembelian_alat` VALUES (19, '1', '1', '5', '2500');
INSERT INTO `detail_pembelian_alat` VALUES (21, '1', '1', '10', '9000');
INSERT INTO `detail_pembelian_alat` VALUES (22, '11', '1', '100', '12000');

-- ----------------------------
-- Table structure for detail_pembelian_bahan_mentah
-- ----------------------------
DROP TABLE IF EXISTS `detail_pembelian_bahan_mentah`;
CREATE TABLE `detail_pembelian_bahan_mentah`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_bahan_mentah` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jumlah` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `harga_beli` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of detail_pembelian_bahan_mentah
-- ----------------------------
INSERT INTO `detail_pembelian_bahan_mentah` VALUES (2, '1', '1', '2', '5000');
INSERT INTO `detail_pembelian_bahan_mentah` VALUES (3, '1', '2', '1', '5000');
INSERT INTO `detail_pembelian_bahan_mentah` VALUES (4, '1', '3', '2', '3000');
INSERT INTO `detail_pembelian_bahan_mentah` VALUES (5, '1', '3', '2', '3000');
INSERT INTO `detail_pembelian_bahan_mentah` VALUES (6, '1', '1', '1', '5000');
INSERT INTO `detail_pembelian_bahan_mentah` VALUES (7, '1', '2', '5', '5000');
INSERT INTO `detail_pembelian_bahan_mentah` VALUES (8, '2', '1', '1', '6000');
INSERT INTO `detail_pembelian_bahan_mentah` VALUES (9, '9', '1', '1', '1000');

-- ----------------------------
-- Table structure for detil_bahan_mentah
-- ----------------------------
DROP TABLE IF EXISTS `detil_bahan_mentah`;
CREATE TABLE `detil_bahan_mentah`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_bahan_mentah` int(11) NOT NULL,
  `satuan_kecil` varchar(199) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `stok` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detil_bahan_mentah
-- ----------------------------
INSERT INTO `detil_bahan_mentah` VALUES (1, 1, 'paha', 2);
INSERT INTO `detil_bahan_mentah` VALUES (2, 2, 'biji', 50);
INSERT INTO `detil_bahan_mentah` VALUES (3, 1, 'dada', 2);

-- ----------------------------
-- Table structure for gaji
-- ----------------------------
DROP TABLE IF EXISTS `gaji`;
CREATE TABLE `gaji`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_resto` int(11) NOT NULL,
  `id_user_resto` int(11) NOT NULL,
  `tanggal_awal` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `jenis_gaji` enum('bulanan','THR','bonus','pesangon') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nominal_gaji` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of gaji
-- ----------------------------
INSERT INTO `gaji` VALUES (5, 4, 23, '2020-01-01', '2020-01-31', 'bulanan', 2006000);
INSERT INTO `gaji` VALUES (6, 4, 20, '2020-03-01', '2020-03-31', 'bulanan', 900000);
INSERT INTO `gaji` VALUES (7, 7, 24, '2020-03-01', '2020-03-31', 'bulanan', 1000000);
INSERT INTO `gaji` VALUES (9, 4, 22, '2020-04-03', '2020-04-30', 'bulanan', 900000);
INSERT INTO `gaji` VALUES (10, 4, 22, '2020-04-03', '2020-04-03', 'bulanan', 900000);

-- ----------------------------
-- Table structure for gaji_kanwil
-- ----------------------------
DROP TABLE IF EXISTS `gaji_kanwil`;
CREATE TABLE `gaji_kanwil`  (
  `id_gaji_kanwil` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_kanwil` int(11) NULL DEFAULT NULL,
  `nominal_gaji` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_gaji_kanwil`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of gaji_kanwil
-- ----------------------------
INSERT INTO `gaji_kanwil` VALUES (1, 1, 3000000);
INSERT INTO `gaji_kanwil` VALUES (2, 2, 3000000);
INSERT INTO `gaji_kanwil` VALUES (3, 3, 3000000);
INSERT INTO `gaji_kanwil` VALUES (4, 17, 3000000);
INSERT INTO `gaji_kanwil` VALUES (5, 18, 3000000);

-- ----------------------------
-- Table structure for insentif
-- ----------------------------
DROP TABLE IF EXISTS `insentif`;
CREATE TABLE `insentif`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_resto` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_orderan` int(11) NOT NULL,
  `jumlah_insentif` int(11) NOT NULL,
  `id_gaji` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for intensif_waiters
-- ----------------------------
DROP TABLE IF EXISTS `intensif_waiters`;
CREATE TABLE `intensif_waiters`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_resto` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jumlah_bonus` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 36 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of intensif_waiters
-- ----------------------------
INSERT INTO `intensif_waiters` VALUES (30, '23', '2020-01-30 21:35:00', '1000');
INSERT INTO `intensif_waiters` VALUES (31, '23', '2020-01-30 21:35:25', '1000');
INSERT INTO `intensif_waiters` VALUES (32, '23', '2020-01-30 21:49:42', '1000');
INSERT INTO `intensif_waiters` VALUES (33, '23', '2020-02-01 22:53:18', '1000');
INSERT INTO `intensif_waiters` VALUES (34, '23', '2020-02-01 22:53:42', '1000');
INSERT INTO `intensif_waiters` VALUES (35, '23', '2020-07-26 21:34:47', '1000');

-- ----------------------------
-- Table structure for investasi_buka_resto
-- ----------------------------
DROP TABLE IF EXISTS `investasi_buka_resto`;
CREATE TABLE `investasi_buka_resto`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_resto` int(11) NULL DEFAULT NULL,
  `id_bendahara` int(11) NULL DEFAULT NULL,
  `id_kanwil` int(11) NULL DEFAULT NULL,
  `id_owner` int(11) NULL DEFAULT NULL,
  `nama_resto` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `perkiraan_dana` int(11) NULL DEFAULT NULL,
  `tanggal_setujui` date NULL DEFAULT NULL,
  `tanggal_pengerjaan` date NULL DEFAULT NULL,
  `status` enum('permintaan','menunggu investor','pengerjaan','selesai') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `keterangan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of investasi_buka_resto
-- ----------------------------
INSERT INTO `investasi_buka_resto` VALUES (1, 17, 32, 7, NULL, 'Buka Resto Baru', 'Malang', 250000000, '2020-04-09', '2020-04-09', 'selesai', '');
INSERT INTO `investasi_buka_resto` VALUES (5, 21, 32, 7, NULL, 'Buka Resto Baru', 'Tuban', 300000000, '2020-04-09', NULL, 'menunggu investor', NULL);
INSERT INTO `investasi_buka_resto` VALUES (7, 22, 32, 7, NULL, 'Resto 1 Kanwil 7', 'Bayuwangi', 500000000, '2020-04-12', '2020-04-12', 'pengerjaan', NULL);
INSERT INTO `investasi_buka_resto` VALUES (8, NULL, 32, 7, NULL, 'Resto 2 Kanwil 7', 'Sidoarjo', 500000000, NULL, NULL, 'permintaan', NULL);
INSERT INTO `investasi_buka_resto` VALUES (9, NULL, 32, 7, NULL, 'Resto 3 Kanwil 7', 'Madiun', 500000000, NULL, NULL, 'permintaan', NULL);

-- ----------------------------
-- Table structure for investasi_cabang
-- ----------------------------
DROP TABLE IF EXISTS `investasi_cabang`;
CREATE TABLE `investasi_cabang`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_resto` int(11) NOT NULL,
  `id_user_bendahara` int(11) NOT NULL,
  `nama_investasi` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `jumlah_pengeluaran` int(11) NOT NULL,
  `persen_penyusutan` int(11) NULL DEFAULT NULL,
  `status` enum('permintaan','disetujui','invest dikembalikan','invest belum kembali') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'permintaan',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 39 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of investasi_cabang
-- ----------------------------
INSERT INTO `investasi_cabang` VALUES (4, 1, 2, 'Dekorasi', '2019-10-01', '2019-10-31', 20000, 10, 'disetujui');
INSERT INTO `investasi_cabang` VALUES (5, 1, 2, 'Renovasi', '2019-10-01', '2019-10-30', 5000, 20, 'invest dikembalikan');
INSERT INTO `investasi_cabang` VALUES (6, 1, 2, 'Pembelian p', '2019-10-01', '2019-10-30', 500000, 20, 'invest dikembalikan');
INSERT INTO `investasi_cabang` VALUES (7, 1, 2, 'Pengecetan', '2019-10-01', '2019-10-30', 80000, 20, 'permintaan');
INSERT INTO `investasi_cabang` VALUES (8, 1, 2, 'pembelian alat', '2019-10-01', '2019-10-30', 700000, 10, 'permintaan');
INSERT INTO `investasi_cabang` VALUES (9, 4, 2, 'sewa ruko', '2020-01-14', '2025-01-14', 200000000, 10, 'disetujui');
INSERT INTO `investasi_cabang` VALUES (10, 4, 2, 'renovasi', '2020-02-01', '2020-05-01', 50000000, 10, 'permintaan');
INSERT INTO `investasi_cabang` VALUES (12, 4, 32, 'Dekorasi', '0000-00-00', '0000-00-00', 500000, 10, 'disetujui');
INSERT INTO `investasi_cabang` VALUES (15, 4, 32, 'Renovasi Taman', '0000-00-00', '0000-00-00', 1000000, 1, 'permintaan');
INSERT INTO `investasi_cabang` VALUES (18, 4, 32, 'Dekorasi', '2020-04-03', '2020-04-03', 50000, 1, 'invest dikembalikan');
INSERT INTO `investasi_cabang` VALUES (20, 4, 32, 'Op', '2020-04-03', '2020-04-03', 1000000, 1, 'permintaan');
INSERT INTO `investasi_cabang` VALUES (21, 4, 32, 'qp', '2020-04-03', '2020-04-03', 1000000, 1, 'permintaan');
INSERT INTO `investasi_cabang` VALUES (25, 4, 32, 'qw', '2020-04-03', '2020-04-03', 50000, 1, 'permintaan');
INSERT INTO `investasi_cabang` VALUES (26, 17, 32, 'Renovasi Taman', '0000-00-00', '0000-00-00', 1000000, 1, 'permintaan');
INSERT INTO `investasi_cabang` VALUES (29, 17, 32, 'Perizinan', '2020-04-11', '2020-04-11', 3000, NULL, 'permintaan');
INSERT INTO `investasi_cabang` VALUES (30, 17, 32, 'bahan', '2020-04-11', '2020-04-11', 10000, NULL, 'permintaan');
INSERT INTO `investasi_cabang` VALUES (31, 17, 32, 'sewa tempat', '2020-04-11', '2020-04-11', 100000000, NULL, 'permintaan');
INSERT INTO `investasi_cabang` VALUES (32, 17, 32, 'gaji pekerja', '2020-04-11', '2020-04-11', 10000000, NULL, 'permintaan');
INSERT INTO `investasi_cabang` VALUES (33, 17, 32, 'dekorasi taman', '2020-04-11', '2020-04-11', 15000000, NULL, 'permintaan');
INSERT INTO `investasi_cabang` VALUES (34, 17, 32, 'publikasi', '2020-04-11', '2020-10-12', 10000000, NULL, 'permintaan');
INSERT INTO `investasi_cabang` VALUES (35, 17, 32, 'biaya rekrutmen', '2020-04-11', '2020-04-11', 15000000, NULL, 'permintaan');
INSERT INTO `investasi_cabang` VALUES (36, 17, 32, 'bahan', '2020-04-11', '2020-04-11', 50000000, NULL, 'permintaan');
INSERT INTO `investasi_cabang` VALUES (37, 17, 32, 'Langganan Internet', '2020-04-12', '2020-10-12', 1000000, NULL, 'permintaan');
INSERT INTO `investasi_cabang` VALUES (38, 17, 32, 'Sewa', '2020-04-12', '2020-04-15', 30000000, NULL, 'permintaan');

-- ----------------------------
-- Table structure for investasi_kanwil
-- ----------------------------
DROP TABLE IF EXISTS `investasi_kanwil`;
CREATE TABLE `investasi_kanwil`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_super_admin` int(11) NOT NULL,
  `id_kanwil` int(11) NOT NULL,
  `id_investasi_owner` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nominal_investasi` int(11) NOT NULL,
  `penyusutan` int(11) NOT NULL,
  `nominal_saldo` int(11) NOT NULL,
  `status` enum('permintaan','diterima') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of investasi_kanwil
-- ----------------------------
INSERT INTO `investasi_kanwil` VALUES (1, 1, 1, 1, '2019-11-01', 3000000, 20, 1000, 'permintaan');
INSERT INTO `investasi_kanwil` VALUES (3, 1, 1, 1, '2019-10-01', 9000, 90, 0, 'diterima');
INSERT INTO `investasi_kanwil` VALUES (4, 1, 7, 0, '2020-03-24', 1000000, 12, 0, 'permintaan');
INSERT INTO `investasi_kanwil` VALUES (5, 1, 7, 0, '2020-03-27', 10000000, 5, 0, 'permintaan');
INSERT INTO `investasi_kanwil` VALUES (6, 1, 7, 0, '2020-04-01', 10000000, 5, 0, 'permintaan');

-- ----------------------------
-- Table structure for investasi_owner
-- ----------------------------
DROP TABLE IF EXISTS `investasi_owner`;
CREATE TABLE `investasi_owner`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_super_admin` int(11) NOT NULL,
  `id_owner` int(11) NOT NULL,
  `id_bendahara` int(11) NOT NULL,
  `id_ref_resto` int(11) NULL DEFAULT NULL,
  `tanggal` date NOT NULL,
  `jumlah_investasi` int(11) NOT NULL,
  `jangka_waktu` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `persentase_omset` int(11) NOT NULL,
  `keterangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 69 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of investasi_owner
-- ----------------------------
INSERT INTO `investasi_owner` VALUES (1, 1, 2, 2, NULL, '2019-11-30', 90000, '2 bulan', 20, NULL);
INSERT INTO `investasi_owner` VALUES (2, 1, 2, 2, NULL, '2019-11-30', 9000, '3 bulan', 20, NULL);
INSERT INTO `investasi_owner` VALUES (6, 1, 1, 32, NULL, '2020-03-08', 10000000, '12 bulan', 1, NULL);
INSERT INTO `investasi_owner` VALUES (7, 1, 1, 32, NULL, '2020-03-25', 10000000, '24 bulan', 1, NULL);
INSERT INTO `investasi_owner` VALUES (8, 1, 1, 32, NULL, '2020-03-27', 20000000, '48 bulan', 1, NULL);
INSERT INTO `investasi_owner` VALUES (9, 1, 1, 32, NULL, '2020-04-01', 10000000, '12 bulan', 1, NULL);
INSERT INTO `investasi_owner` VALUES (10, 1, 1, 32, NULL, '2020-04-03', 1000000, '12 bulan', 1, NULL);
INSERT INTO `investasi_owner` VALUES (11, 1, 1, 32, NULL, '2020-04-03', 10000, '6 bulan', 1, NULL);
INSERT INTO `investasi_owner` VALUES (12, 1, 1, 32, NULL, '2020-04-01', 9000000, '12 bulan', 1, NULL);
INSERT INTO `investasi_owner` VALUES (13, 1, 1, 32, NULL, '2020-04-01', 1000000, '12 bulan', 1, NULL);
INSERT INTO `investasi_owner` VALUES (14, 1, 1, 32, NULL, '2020-04-01', 100000, '12 bulan', 1, NULL);
INSERT INTO `investasi_owner` VALUES (15, 1, 1, 32, 17, '2020-04-08', 100000000, '60 bulan', 1, 'Modal Awal');
INSERT INTO `investasi_owner` VALUES (16, 1, 1, 32, 17, '2020-04-09', 50000000, '60 bulan', 1, 'Modal Awal');
INSERT INTO `investasi_owner` VALUES (17, 1, 2, 32, 17, '2020-04-09', 50000000, '60 bulan', 1, 'Modal Awal');
INSERT INTO `investasi_owner` VALUES (18, 1, 3, 32, 5, '0000-00-00', 123, '123', 123, 'Modal Tambahan');
INSERT INTO `investasi_owner` VALUES (20, 1, 3, 32, 4, '2020-04-09', 10000000, '24', 1, 'Modal Tambahan');
INSERT INTO `investasi_owner` VALUES (64, 1, 3, 32, 17, '2020-04-09', 50000000, '24', 1, 'Modal Awal');
INSERT INTO `investasi_owner` VALUES (65, 1, 3, 32, 22, '2020-04-12', 400000000, '60 bulan', 5, 'Modal Awal');
INSERT INTO `investasi_owner` VALUES (66, 1, 2, 32, 22, '2020-04-12', 20000000, '60', 5, 'Modal Awal');
INSERT INTO `investasi_owner` VALUES (67, 1, 2, 32, 22, '2020-04-12', 180000000, '60', 5, 'Modal Awal');
INSERT INTO `investasi_owner` VALUES (68, 1, 2, 32, 22, '2020-04-12', 1000, '60', 5, NULL);

-- ----------------------------
-- Table structure for jenis_masakan
-- ----------------------------
DROP TABLE IF EXISTS `jenis_masakan`;
CREATE TABLE `jenis_masakan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of jenis_masakan
-- ----------------------------
INSERT INTO `jenis_masakan` VALUES (1, 'makanan');
INSERT INTO `jenis_masakan` VALUES (2, 'minuman');
INSERT INTO `jenis_masakan` VALUES (3, 'pelegkap');

-- ----------------------------
-- Table structure for kanwil
-- ----------------------------
DROP TABLE IF EXISTS `kanwil`;
CREATE TABLE `kanwil`  (
  `id_kanwil` int(11) NOT NULL AUTO_INCREMENT,
  `alamat_kantor` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `telp` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_kanwil`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of kanwil
-- ----------------------------
INSERT INTO `kanwil` VALUES (7, 'Jawa Timur', '085735144495');
INSERT INTO `kanwil` VALUES (8, 'Jawa Barat', '085735144879');
INSERT INTO `kanwil` VALUES (9, 'Jawa Tengah', '085735148165');

-- ----------------------------
-- Table structure for kas_owner
-- ----------------------------
DROP TABLE IF EXISTS `kas_owner`;
CREATE TABLE `kas_owner`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kas_saldo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_owner` int(255) NULL DEFAULT NULL,
  `tgl` date NULL DEFAULT NULL,
  `nominal` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jenis` enum('pengeluaran','pemasukan') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of kas_owner
-- ----------------------------
INSERT INTO `kas_owner` VALUES (1, '1', 1, '2020-03-11', '100000', 'pengeluaran');
INSERT INTO `kas_owner` VALUES (2, '1', 2, '2020-03-11', '50000', 'pemasukan');
INSERT INTO `kas_owner` VALUES (3, '1', 1, '2020-03-11', '50000', 'pemasukan');
INSERT INTO `kas_owner` VALUES (4, '1', 1, '2020-03-11', '50000', 'pemasukan');

-- ----------------------------
-- Table structure for kas_saldo
-- ----------------------------
DROP TABLE IF EXISTS `kas_saldo`;
CREATE TABLE `kas_saldo`  (
  `id_saldo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_bendahara` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_admin_resto` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jenis_saldo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `last_balance` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of kas_saldo
-- ----------------------------
INSERT INTO `kas_saldo` VALUES ('1', '32', '', 'KAS INDUK', '50000');
INSERT INTO `kas_saldo` VALUES ('2', '', '19', 'KAS BESAR CABANG', '50000');
INSERT INTO `kas_saldo` VALUES ('3', '', '19', 'KAS OPERASIONAL', '50000');

-- ----------------------------
-- Table structure for log_aktivitas
-- ----------------------------
DROP TABLE IF EXISTS `log_aktivitas`;
CREATE TABLE `log_aktivitas`  (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `id_kanwil` int(11) NOT NULL,
  `id_resto` int(11) NOT NULL,
  `id_user_resto` int(11) NOT NULL,
  `tgl_mulai` date NULL DEFAULT NULL,
  `tgl_akhir` date NULL DEFAULT NULL,
  `status` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id_log`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of log_aktivitas
-- ----------------------------
INSERT INTO `log_aktivitas` VALUES (1, 1, 1, 1, '2020-01-01', '2020-01-31', 'Cuti', 'Cuti Kerja selama 1 Bulan');
INSERT INTO `log_aktivitas` VALUES (2, 2, 2, 8, '2020-01-31', '2020-01-31', 'Lembur', 'Lembur karena Shit tidak masuk');
INSERT INTO `log_aktivitas` VALUES (5, 2, 2, 8, '2020-02-02', '2020-02-19', 'Cuti', 'semangat');

-- ----------------------------
-- Table structure for logistik
-- ----------------------------
DROP TABLE IF EXISTS `logistik`;
CREATE TABLE `logistik`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_bahan` int(11) NOT NULL,
  `id_peralatan` int(11) NOT NULL,
  `id_user_kanwil` int(11) NOT NULL,
  `id_resto` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for meja
-- ----------------------------
DROP TABLE IF EXISTS `meja`;
CREATE TABLE `meja`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `panel` int(11) NOT NULL,
  `nomor` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of meja
-- ----------------------------
INSERT INTO `meja` VALUES (1, 1, 1);
INSERT INTO `meja` VALUES (2, 1, 2);
INSERT INTO `meja` VALUES (3, 2, 3);
INSERT INTO `meja` VALUES (4, 2, 4);
INSERT INTO `meja` VALUES (5, 3, 5);
INSERT INTO `meja` VALUES (6, 3, 6);
INSERT INTO `meja` VALUES (7, 4, 7);

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_resto` int(11) NOT NULL,
  `menu` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `foto` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `status` enum('tersedia','habis') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `stok` int(11) NOT NULL,
  `mode` enum('insert','draft') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES (1, 1, 'Ayam Geprek', 'default.jpg', 10000, 'tersedia', 4, 'insert');
INSERT INTO `menu` VALUES (2, 1, 'Jamur Kripsi', 'default.jpg', 10000, 'tersedia', 0, 'insert');
INSERT INTO `menu` VALUES (3, 1, 'Es Teh Anget', 'default.jpg', 10000, 'tersedia', 10, 'insert');
INSERT INTO `menu` VALUES (4, 1, 'Kopi Susu', 'kopihitam.jpg', 3000, 'habis', 6, 'insert');
INSERT INTO `menu` VALUES (5, 1, 'Nasi Goreng', 'default.jpg', 3000, 'tersedia', 6, 'insert');
INSERT INTO `menu` VALUES (6, 1, 'Tahu Kripsi', 'default.jpg', 6000, 'tersedia', 1, 'insert');
INSERT INTO `menu` VALUES (7, 1, 'teh pucuk', 'default.jpg', 3000, 'tersedia', 1, 'insert');

-- ----------------------------
-- Table structure for omset_investasi_owner
-- ----------------------------
DROP TABLE IF EXISTS `omset_investasi_owner`;
CREATE TABLE `omset_investasi_owner`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_investasi_owner` int(11) NOT NULL,
  `id_super_admin` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `penyusutan_invest` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of omset_investasi_owner
-- ----------------------------
INSERT INTO `omset_investasi_owner` VALUES (1, 1, 1, '2019-10-30', 200000);
INSERT INTO `omset_investasi_owner` VALUES (2, 1, 1, '2019-10-31', 200000);
INSERT INTO `omset_investasi_owner` VALUES (3, 1, 1, '2019-11-01', 200000);
INSERT INTO `omset_investasi_owner` VALUES (9, 1, 0, '2019-12-01', 20000);

-- ----------------------------
-- Table structure for operasional
-- ----------------------------
DROP TABLE IF EXISTS `operasional`;
CREATE TABLE `operasional`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pengeluaran` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of operasional
-- ----------------------------
INSERT INTO `operasional` VALUES (1, 'listrik');
INSERT INTO `operasional` VALUES (2, 'internet');
INSERT INTO `operasional` VALUES (3, 'komunikasi');
INSERT INTO `operasional` VALUES (4, 'promosi');
INSERT INTO `operasional` VALUES (5, 'transportas');

-- ----------------------------
-- Table structure for owner
-- ----------------------------
DROP TABLE IF EXISTS `owner`;
CREATE TABLE `owner`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_super_admin` int(11) NOT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `user` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pass` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `telp` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `saldo_rek` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `create_at` datetime(0) NOT NULL DEFAULT current_timestamp(0),
  `update_at` datetime(0) NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of owner
-- ----------------------------
INSERT INTO `owner` VALUES (1, 1, 'fauzin', 'fauzin', 'fauzin', 'sambirejo', '1234567', 'fauzin@gmail.com', '200000', '2019-05-08 00:37:00', '2019-05-08 00:37:00');
INSERT INTO `owner` VALUES (2, 1, 'dedy ardiansyah 1', 'sd', 'as', 'asadas', '94586845', 'dfs@gmail.com', '100000', '2019-12-09 14:04:05', '2019-12-09 14:04:05');
INSERT INTO `owner` VALUES (3, 1, 'owner c', 'cc', 'cc', 'mojoroto', '085288886666', '1@gmail.com', '100000000', '2019-12-29 23:05:54', '2019-12-29 23:05:54');

-- ----------------------------
-- Table structure for paket
-- ----------------------------
DROP TABLE IF EXISTS `paket`;
CREATE TABLE `paket`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_resto` int(11) NOT NULL,
  `nama_paket` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` enum('tersedia','habis') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `foto` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `harga` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `mode` enum('insert','draft') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of paket
-- ----------------------------
INSERT INTO `paket` VALUES (1, 1, 'Paket Bom', 10, 'tersedia', 'default.jpg', '8000', 'insert');
INSERT INTO `paket` VALUES (2, 1, 'Paket Granat', 10, 'tersedia', 'default.jpg', '20000', 'insert');
INSERT INTO `paket` VALUES (3, 1, 'Paket asoy', 5, 'habis', 'nasibebek.jpg', '30000', 'insert');

-- ----------------------------
-- Table structure for pembayaran
-- ----------------------------
DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE `pembayaran`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_kasir` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `status` enum('kredit','lunas') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal` datetime(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 41 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pembayaran
-- ----------------------------
INSERT INTO `pembayaran` VALUES (34, 23, 2, 15000, 'lunas', '2020-03-08 21:35:25');
INSERT INTO `pembayaran` VALUES (35, 23, 1, 25000, 'lunas', '2020-03-08 15:42:30');
INSERT INTO `pembayaran` VALUES (36, 23, 3, 20000, 'lunas', '2020-03-08 17:09:06');
INSERT INTO `pembayaran` VALUES (38, 23, 4, 25000, 'lunas', '2020-03-06 20:42:38');
INSERT INTO `pembayaran` VALUES (39, 22, 5, 15000, 'lunas', '2020-02-01 16:55:53');
INSERT INTO `pembayaran` VALUES (40, 23, 7, 100000, 'lunas', '2020-07-26 21:34:47');

-- ----------------------------
-- Table structure for pembelian_alat
-- ----------------------------
DROP TABLE IF EXISTS `pembelian_alat`;
CREATE TABLE `pembelian_alat`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_logistik` int(11) NOT NULL,
  `no_transaksi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_supplier` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tanggal` date NOT NULL,
  `total_harga_beli` int(100) NOT NULL,
  `dibayar` int(100) NOT NULL,
  `status` enum('draft','selesai') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `catatan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pembelian_alat
-- ----------------------------
INSERT INTO `pembelian_alat` VALUES (9, 34, '1', '', '2020-07-16', 5000, 5000, 'selesai', 'lunas');
INSERT INTO `pembelian_alat` VALUES (10, 34, '10', 'PT. sejahtera farma', '2020-07-16', 10000, 10000, 'selesai', 'lunas');

-- ----------------------------
-- Table structure for pembelian_bahan_mentah
-- ----------------------------
DROP TABLE IF EXISTS `pembelian_bahan_mentah`;
CREATE TABLE `pembelian_bahan_mentah`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_logistik` int(255) NULL DEFAULT NULL,
  `no_transaksi` int(255) NULL DEFAULT NULL,
  `nama_supplier` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tanggal` date NULL DEFAULT NULL,
  `total_harga_beli` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `dibayar` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` enum('draft','selesai') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `catatan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pembelian_bahan_mentah
-- ----------------------------
INSERT INTO `pembelian_bahan_mentah` VALUES (4, 3, 1, 'fauzin', '2019-10-16', '57000', '57000', 'selesai', 'ok');
INSERT INTO `pembelian_bahan_mentah` VALUES (5, 34, 1, 'man', NULL, '100000', '100000', 'selesai', 'ok');
INSERT INTO `pembelian_bahan_mentah` VALUES (6, 35, 1, 'ruu', NULL, '1000000', '1000000', 'selesai', NULL);
INSERT INTO `pembelian_bahan_mentah` VALUES (7, 34, 2, 'man', NULL, '1000000', '1000000', 'selesai', NULL);
INSERT INTO `pembelian_bahan_mentah` VALUES (8, 34, 2, 'lur', '2020-04-03', '1000000', '1000000', 'selesai', NULL);
INSERT INTO `pembelian_bahan_mentah` VALUES (9, 34, 9, 'cepung', '2020-07-27', '1000', '', 'selesai', ';lunas');

-- ----------------------------
-- Table structure for pemberian_kaskeluar
-- ----------------------------
DROP TABLE IF EXISTS `pemberian_kaskeluar`;
CREATE TABLE `pemberian_kaskeluar`  (
  `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT,
  `id_bendahara` int(255) NULL DEFAULT NULL,
  `id_resto` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nominal_kas_keluar` int(100) NOT NULL,
  `status` enum('pengajuan','pemberian') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_pengeluaran`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pemberian_kaskeluar
-- ----------------------------
INSERT INTO `pemberian_kaskeluar` VALUES (1, 2, 1, '2019-06-26', 400000, 'pemberian');
INSERT INTO `pemberian_kaskeluar` VALUES (6, 2, 1, '2019-10-19', 60000, 'pemberian');
INSERT INTO `pemberian_kaskeluar` VALUES (7, 2, 1, '2019-10-20', 60000, 'pemberian');
INSERT INTO `pemberian_kaskeluar` VALUES (8, 2, 3, '2020-01-14', 3000000, 'pengajuan');
INSERT INTO `pemberian_kaskeluar` VALUES (9, 32, 4, '2020-03-31', 1000000, 'pengajuan');
INSERT INTO `pemberian_kaskeluar` VALUES (10, 32, 4, '2020-04-03', 100000, 'pengajuan');
INSERT INTO `pemberian_kaskeluar` VALUES (11, 32, 4, '2020-04-03', 1000000, 'pengajuan');

-- ----------------------------
-- Table structure for pemesanan
-- ----------------------------
DROP TABLE IF EXISTS `pemesanan`;
CREATE TABLE `pemesanan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pemesan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_meja` int(11) NOT NULL,
  `keterangantambahan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal` datetime(0) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `id_user_resto` int(11) NOT NULL,
  `status` enum('belum','kredit','lunas','produksi','siapsaji','selesai','siapsaji_lunas','produksi_lunas') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pemesanan
-- ----------------------------
INSERT INTO `pemesanan` VALUES (1, 'coba1', 1, '', '2020-01-30 21:35:00', 24000, 23, 'lunas');
INSERT INTO `pemesanan` VALUES (2, 'coba2', 2, '', '2020-01-30 21:35:25', 13000, 23, 'lunas');
INSERT INTO `pemesanan` VALUES (3, 'coba3', 3, 'ini pembayaran dilakukan di kasir', '2020-02-02 21:49:42', 16000, 23, 'lunas');
INSERT INTO `pemesanan` VALUES (4, 'coba4', 4, '', '2020-02-01 21:58:05', 13000, 23, 'lunas');
INSERT INTO `pemesanan` VALUES (5, 'coba5', 5, '', '2020-02-01 22:53:18', 13000, 23, 'siapsaji_lunas');
INSERT INTO `pemesanan` VALUES (6, 'coba5', 1, '', '2020-02-01 22:53:42', 0, 23, 'produksi_lunas');

-- ----------------------------
-- Table structure for pemesanan_menu
-- ----------------------------
DROP TABLE IF EXISTS `pemesanan_menu`;
CREATE TABLE `pemesanan_menu`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemesanan` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah_pesan` int(11) NOT NULL,
  `subharga` int(11) NOT NULL,
  `status` enum('','diambil','dikembalikan') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 66 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pemesanan_menu
-- ----------------------------
INSERT INTO `pemesanan_menu` VALUES (58, 1, 1, 1, 10000, '');
INSERT INTO `pemesanan_menu` VALUES (59, 1, 7, 2, 6000, '');
INSERT INTO `pemesanan_menu` VALUES (60, 2, 3, 1, 10000, '');
INSERT INTO `pemesanan_menu` VALUES (61, 2, 5, 1, 3000, '');
INSERT INTO `pemesanan_menu` VALUES (62, 3, 2, 1, 10000, '');
INSERT INTO `pemesanan_menu` VALUES (63, 3, 6, 1, 6000, '');
INSERT INTO `pemesanan_menu` VALUES (64, 5, 2, 1, 10000, '');
INSERT INTO `pemesanan_menu` VALUES (65, 5, 5, 1, 3000, '');

-- ----------------------------
-- Table structure for pemesanan_paket
-- ----------------------------
DROP TABLE IF EXISTS `pemesanan_paket`;
CREATE TABLE `pemesanan_paket`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemesanan` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `jumlah_pesan` int(11) NOT NULL,
  `subharga` int(11) NOT NULL,
  `status` enum('','diambil','dikembalikan') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 36 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pemesanan_paket
-- ----------------------------
INSERT INTO `pemesanan_paket` VALUES (35, 1, 1, 1, 8000, 'diambil');

-- ----------------------------
-- Table structure for pendapatan_kas_masuk
-- ----------------------------
DROP TABLE IF EXISTS `pendapatan_kas_masuk`;
CREATE TABLE `pendapatan_kas_masuk`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_bendahara` int(11) NOT NULL,
  `id_user_kasir` int(11) NOT NULL,
  `id_pendapatankasmasuk_dari_kasir` int(11) NULL DEFAULT NULL,
  `jumlah_setoran` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal` datetime(0) NOT NULL,
  `tanggal_awal` datetime(0) NOT NULL,
  `tanggal_akhir` datetime(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 37 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pendapatan_kas_masuk
-- ----------------------------
INSERT INTO `pendapatan_kas_masuk` VALUES (34, 32, 22, 11, '200000', '2020-04-03 02:53:06', '2020-04-03 02:53:09', '2020-04-03 02:53:11');
INSERT INTO `pendapatan_kas_masuk` VALUES (35, 32, 22, 12, '500000', '2020-04-03 02:57:02', '2020-04-03 02:57:05', '2020-04-03 02:57:08');
INSERT INTO `pendapatan_kas_masuk` VALUES (36, 32, 22, 13, '100000', '2020-04-03 03:08:07', '2020-04-03 03:08:09', '2020-04-03 03:08:11');

-- ----------------------------
-- Table structure for pendapatan_kas_masuk_dari_kasir
-- ----------------------------
DROP TABLE IF EXISTS `pendapatan_kas_masuk_dari_kasir`;
CREATE TABLE `pendapatan_kas_masuk_dari_kasir`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_kasir` int(11) NOT NULL,
  `id_adminresto` int(11) NOT NULL,
  `jumlah_setoran` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal` datetime(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 37 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pendapatan_kas_masuk_dari_kasir
-- ----------------------------
INSERT INTO `pendapatan_kas_masuk_dari_kasir` VALUES (34, 22, 19, '53000', '2020-03-08 22:53:26');
INSERT INTO `pendapatan_kas_masuk_dari_kasir` VALUES (35, 25, 19, '100000', '2020-04-03 04:03:45');
INSERT INTO `pendapatan_kas_masuk_dari_kasir` VALUES (36, 22, 19, '147000', '2020-04-03 04:04:48');

-- ----------------------------
-- Table structure for pengeluaran_cabang
-- ----------------------------
DROP TABLE IF EXISTS `pengeluaran_cabang`;
CREATE TABLE `pengeluaran_cabang`  (
  `id_pengeluaran_cabang` int(11) NOT NULL AUTO_INCREMENT,
  `id_resto` int(11) NOT NULL,
  `id_investasi_cabang` int(11) NOT NULL,
  `id_alat` int(11) NOT NULL,
  `jumlah` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `masa_pemanfatan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nominal` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nominal_penyusutan` int(11) NOT NULL,
  PRIMARY KEY (`id_pengeluaran_cabang`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pengeluaran_cabang
-- ----------------------------
INSERT INTO `pengeluaran_cabang` VALUES (1, 1, 1, 1, '2', '2 bulan', '10000', 2000);

-- ----------------------------
-- Table structure for pengeluaran_cabang_operasional
-- ----------------------------
DROP TABLE IF EXISTS `pengeluaran_cabang_operasional`;
CREATE TABLE `pengeluaran_cabang_operasional`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_admin_resto` int(255) NULL DEFAULT NULL,
  `id_resto` int(11) NOT NULL,
  `id_kanwil` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_operasional` int(11) NOT NULL,
  `masa_sewa` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nominal` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pengeluaran_cabang_operasional
-- ----------------------------
INSERT INTO `pengeluaran_cabang_operasional` VALUES (1, 4, 1, 1, '2019-10-02', 1, '1 bulan', '5000');
INSERT INTO `pengeluaran_cabang_operasional` VALUES (2, 4, 1, 1, '2019-10-03', 1, '2 bulan', '90');
INSERT INTO `pengeluaran_cabang_operasional` VALUES (3, 4, 1, 1, '2019-10-19', 0, '2 hari', '10000');
INSERT INTO `pengeluaran_cabang_operasional` VALUES (5, 1, 1, 1, '2019-12-29', 2, '1 bulan', '70000');
INSERT INTO `pengeluaran_cabang_operasional` VALUES (6, 4, 1, 7, '2020-04-03', 3, '1 bulan', '500000');

-- ----------------------------
-- Table structure for pengeluaran_kanwil
-- ----------------------------
DROP TABLE IF EXISTS `pengeluaran_kanwil`;
CREATE TABLE `pengeluaran_kanwil`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kanwil` int(11) NOT NULL,
  `id_operasional` int(11) NOT NULL,
  `nominal` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pengeluaran_kanwil
-- ----------------------------
INSERT INTO `pengeluaran_kanwil` VALUES (1, 1, 1, '5000');

-- ----------------------------
-- Table structure for pengeluaran_kanwil_operasional
-- ----------------------------
DROP TABLE IF EXISTS `pengeluaran_kanwil_operasional`;
CREATE TABLE `pengeluaran_kanwil_operasional`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kanwil` int(11) NOT NULL,
  `id_operasional` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `masa_sewa` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nominal` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pengeluaran_kanwil_operasional
-- ----------------------------
INSERT INTO `pengeluaran_kanwil_operasional` VALUES (1, 1, 1, '2019-10-02', '1 bulan', '5000');
INSERT INTO `pengeluaran_kanwil_operasional` VALUES (3, 1, 1, '2019-10-03', '1 bulan', '100');
INSERT INTO `pengeluaran_kanwil_operasional` VALUES (4, 1, 1, '2019-10-04', '1 bulan', '2000');
INSERT INTO `pengeluaran_kanwil_operasional` VALUES (5, 1, 4, '0000-00-00', NULL, '2000000');
INSERT INTO `pengeluaran_kanwil_operasional` VALUES (6, 7, 2, '0000-00-00', NULL, '5000000');
INSERT INTO `pengeluaran_kanwil_operasional` VALUES (7, 7, 1, '0000-00-00', NULL, '5000000');
INSERT INTO `pengeluaran_kanwil_operasional` VALUES (8, 7, 2, '2020-04-03', '2 bulan', '1000000');
INSERT INTO `pengeluaran_kanwil_operasional` VALUES (9, 7, 3, '2020-04-03', '1 bulan', '100000');
INSERT INTO `pengeluaran_kanwil_operasional` VALUES (10, 0, 1, '0000-00-00', NULL, '5000000');

-- ----------------------------
-- Table structure for pengiriman_bahan_mentah
-- ----------------------------
DROP TABLE IF EXISTS `pengiriman_bahan_mentah`;
CREATE TABLE `pengiriman_bahan_mentah`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_permintaan` int(11) NOT NULL,
  `id_bahan_mentah` int(11) NOT NULL,
  `tanggal_pengiriman` date NOT NULL,
  `jumlah_permintaan` int(11) NOT NULL,
  `jumlah_dikirim` int(11) NOT NULL,
  `jumlah_dikembalikan` int(11) NOT NULL,
  `status` enum('sesuai','tidak') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status_bahan` enum('diterima','belum diterima') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pengiriman_bahan_mentah
-- ----------------------------
INSERT INTO `pengiriman_bahan_mentah` VALUES (0, 6, 1, '2020-07-27', 1, 1, 0, 'sesuai', 'belum diterima');
INSERT INTO `pengiriman_bahan_mentah` VALUES (1, 3, 1, '2019-10-22', 2, 4, 2, 'tidak', NULL);
INSERT INTO `pengiriman_bahan_mentah` VALUES (2, 4, 1, '2020-07-09', 1, 1, 0, 'sesuai', 'diterima');
INSERT INTO `pengiriman_bahan_mentah` VALUES (3, 5, 2, '2020-07-08', 1, 1, 0, 'sesuai', 'belum diterima');
INSERT INTO `pengiriman_bahan_mentah` VALUES (4, 6, 2, '2020-07-27', 1, 1, 0, 'sesuai', 'belum diterima');
INSERT INTO `pengiriman_bahan_mentah` VALUES (5, 7, 1, '2020-07-27', 1, 1, 0, 'sesuai', 'diterima');

-- ----------------------------
-- Table structure for pengiriman_bahan_olahan
-- ----------------------------
DROP TABLE IF EXISTS `pengiriman_bahan_olahan`;
CREATE TABLE `pengiriman_bahan_olahan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_permintaan` int(11) NOT NULL,
  `id_bahan_olahan` int(11) NOT NULL,
  `tanggal_pengiriman` date NOT NULL,
  `jumlah_permintaan` int(11) NOT NULL,
  `jumlah_dikirim` int(11) NOT NULL,
  `jumlah_dikembalikan` int(11) NOT NULL,
  `status` enum('sesuai','tidak','diterima') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status_bahan` enum('diterima','belum diterima') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pengiriman_bahan_olahan
-- ----------------------------
INSERT INTO `pengiriman_bahan_olahan` VALUES (2, 2, 3, '2019-10-22', 4, 4, 0, 'diterima', NULL);
INSERT INTO `pengiriman_bahan_olahan` VALUES (4, 1, 3, '2019-10-25', 1, 1, 0, 'sesuai', NULL);
INSERT INTO `pengiriman_bahan_olahan` VALUES (5, 3, 1, '2020-06-14', 1, 1, 1, 'sesuai', 'diterima');
INSERT INTO `pengiriman_bahan_olahan` VALUES (6, 3, 3, '2020-07-27', 1, 1, 0, 'sesuai', 'diterima');

-- ----------------------------
-- Table structure for penyusutan_investasi_cabang
-- ----------------------------
DROP TABLE IF EXISTS `penyusutan_investasi_cabang`;
CREATE TABLE `penyusutan_investasi_cabang`  (
  `id_penyusutan` int(11) NOT NULL AUTO_INCREMENT,
  `id_investasi_cabang` int(255) NULL DEFAULT NULL,
  `tanggal` date NULL DEFAULT NULL,
  `nominal_penyusutan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_penyusutan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of penyusutan_investasi_cabang
-- ----------------------------
INSERT INTO `penyusutan_investasi_cabang` VALUES (4, 6, '2019-10-20', '100000');
INSERT INTO `penyusutan_investasi_cabang` VALUES (5, 6, '2019-10-20', '100000');
INSERT INTO `penyusutan_investasi_cabang` VALUES (6, 6, '2019-10-20', '100000');
INSERT INTO `penyusutan_investasi_cabang` VALUES (7, 6, '2019-10-20', '100000');
INSERT INTO `penyusutan_investasi_cabang` VALUES (8, 6, '2019-10-20', '100000');
INSERT INTO `penyusutan_investasi_cabang` VALUES (9, 4, '2019-10-20', '2000');
INSERT INTO `penyusutan_investasi_cabang` VALUES (10, 4, '2019-10-20', '2000');
INSERT INTO `penyusutan_investasi_cabang` VALUES (11, 4, '2019-10-20', '2000');
INSERT INTO `penyusutan_investasi_cabang` VALUES (12, 4, '2019-10-20', '2000');
INSERT INTO `penyusutan_investasi_cabang` VALUES (13, 4, '2019-10-20', '2000');
INSERT INTO `penyusutan_investasi_cabang` VALUES (14, 4, '2019-10-20', '2000');
INSERT INTO `penyusutan_investasi_cabang` VALUES (15, 4, '2019-10-20', '2000');
INSERT INTO `penyusutan_investasi_cabang` VALUES (16, 4, '2019-10-20', '2000');
INSERT INTO `penyusutan_investasi_cabang` VALUES (17, 4, '2019-10-20', '2000');
INSERT INTO `penyusutan_investasi_cabang` VALUES (18, 4, '2019-10-20', '2000');

-- ----------------------------
-- Table structure for peralatan
-- ----------------------------
DROP TABLE IF EXISTS `peralatan`;
CREATE TABLE `peralatan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_logistik` int(255) NULL DEFAULT NULL,
  `id_resto` int(11) NOT NULL,
  `nama_peralatan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `satuan_besar` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jumlah_stok` int(11) NOT NULL,
  `status` int(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of peralatan
-- ----------------------------
INSERT INTO `peralatan` VALUES (1, 3, 1, 'sendok', 'pcs', 242, 1);

-- ----------------------------
-- Table structure for permintaan_alat
-- ----------------------------
DROP TABLE IF EXISTS `permintaan_alat`;
CREATE TABLE `permintaan_alat`  (
  `id_permintaan_alat` int(11) NOT NULL AUTO_INCREMENT,
  `id_resto` int(11) NOT NULL,
  `id_kanwil` int(11) NOT NULL,
  `id_alat` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `masa_pemanfatan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status_permintaan` enum('permintaan','dikirim','diterima','permintaan ditolak','dikembalikan') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_permintaan_alat`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of permintaan_alat
-- ----------------------------
INSERT INTO `permintaan_alat` VALUES (20, 4, 7, 1, '2020-07-17', '2', '3 bulan', 'permintaan');
INSERT INTO `permintaan_alat` VALUES (21, 5, 7, 1, '2020-07-17', '1', '3 bulan', 'dikembalikan');

-- ----------------------------
-- Table structure for permintaan_bahan_mentah
-- ----------------------------
DROP TABLE IF EXISTS `permintaan_bahan_mentah`;
CREATE TABLE `permintaan_bahan_mentah`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_resto` int(11) NOT NULL,
  `id_user_produksi` int(11) NOT NULL,
  `nama_permintaan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('permintaan','pengiriman','diterima') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of permintaan_bahan_mentah
-- ----------------------------
INSERT INTO `permintaan_bahan_mentah` VALUES (3, 1, 3, 'permintaan 3', '2019-11-04', 'pengiriman');
INSERT INTO `permintaan_bahan_mentah` VALUES (4, 4, 19, 'uzin', '2020-07-19', 'permintaan');
INSERT INTO `permintaan_bahan_mentah` VALUES (5, 4, 20, 'aku', '2020-07-20', 'permintaan');
INSERT INTO `permintaan_bahan_mentah` VALUES (6, 4, 20, 'permintaan 3', '2020-07-31', 'permintaan');
INSERT INTO `permintaan_bahan_mentah` VALUES (7, 4, 20, 'permintaan 4', '2020-07-31', 'permintaan');

-- ----------------------------
-- Table structure for permintaan_bahan_olahan
-- ----------------------------
DROP TABLE IF EXISTS `permintaan_bahan_olahan`;
CREATE TABLE `permintaan_bahan_olahan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_resto` int(11) NOT NULL,
  `id_user_produksi` int(11) NOT NULL,
  `nama_permintaan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('permintaan','pengiriman','diterima') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of permintaan_bahan_olahan
-- ----------------------------
INSERT INTO `permintaan_bahan_olahan` VALUES (1, 1, 3, 'Permintaan bahan olahan 1', '2019-10-22', 'diterima');
INSERT INTO `permintaan_bahan_olahan` VALUES (2, 1, 3, 'permintaan 2', '2019-10-24', 'diterima');
INSERT INTO `permintaan_bahan_olahan` VALUES (3, 4, 20, 'permintaan 1', '2020-07-17', 'permintaan');

-- ----------------------------
-- Table structure for produksi
-- ----------------------------
DROP TABLE IF EXISTS `produksi`;
CREATE TABLE `produksi`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu_masakan` int(11) NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for produksi_bahan_olahan
-- ----------------------------
DROP TABLE IF EXISTS `produksi_bahan_olahan`;
CREATE TABLE `produksi_bahan_olahan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_logistik` int(255) NULL DEFAULT NULL,
  `id_bahan_mentah` int(11) NOT NULL,
  `jumlah_bahan_mentah` int(11) NOT NULL,
  `tanggal` date NULL DEFAULT NULL,
  `status` enum('produksi','selesai produksi') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of produksi_bahan_olahan
-- ----------------------------
INSERT INTO `produksi_bahan_olahan` VALUES (2, 34, 1, 1, '2019-10-09', 'selesai produksi');
INSERT INTO `produksi_bahan_olahan` VALUES (8, 34, 3, 1, '2020-07-09', 'selesai produksi');
INSERT INTO `produksi_bahan_olahan` VALUES (10, 34, 1, 1, '2020-07-14', 'selesai produksi');
INSERT INTO `produksi_bahan_olahan` VALUES (11, 34, 1, 1, '2020-07-27', 'produksi');
INSERT INTO `produksi_bahan_olahan` VALUES (12, 34, 3, 1, '2020-07-27', 'produksi');

-- ----------------------------
-- Table structure for produksi_bahan_olahan_detail
-- ----------------------------
DROP TABLE IF EXISTS `produksi_bahan_olahan_detail`;
CREATE TABLE `produksi_bahan_olahan_detail`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_logistik` int(255) NULL DEFAULT NULL,
  `id_produksi_bahan_olahan` int(11) NOT NULL,
  `id_bahan_olahan` int(11) NOT NULL,
  `jumlah_bahan_olahan` int(255) NULL DEFAULT NULL,
  `tanggal` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of produksi_bahan_olahan_detail
-- ----------------------------
INSERT INTO `produksi_bahan_olahan_detail` VALUES (12, 34, 2, 1, 1, '2020-07-09');
INSERT INTO `produksi_bahan_olahan_detail` VALUES (13, 34, 8, 1, 1, '2020-07-14');
INSERT INTO `produksi_bahan_olahan_detail` VALUES (20, 34, 10, 1, 1, '2020-07-14');
INSERT INTO `produksi_bahan_olahan_detail` VALUES (21, 34, 10, 3, 1, '2020-07-14');

-- ----------------------------
-- Table structure for produksi_masakan
-- ----------------------------
DROP TABLE IF EXISTS `produksi_masakan`;
CREATE TABLE `produksi_masakan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_resto` int(11) NULL DEFAULT NULL,
  `id_menu` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_masakan` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of produksi_masakan
-- ----------------------------
INSERT INTO `produksi_masakan` VALUES (1, 4, 1, '2019-10-10', 10);
INSERT INTO `produksi_masakan` VALUES (2, 4, 2, '2019-10-14', 1);
INSERT INTO `produksi_masakan` VALUES (3, 4, 2, '2020-01-03', 1);
INSERT INTO `produksi_masakan` VALUES (4, 4, 4, '2020-01-03', 1);
INSERT INTO `produksi_masakan` VALUES (5, 4, 6, '2020-01-03', 1);
INSERT INTO `produksi_masakan` VALUES (6, 4, 8, '2020-07-08', 5);

-- ----------------------------
-- Table structure for resto
-- ----------------------------
DROP TABLE IF EXISTS `resto`;
CREATE TABLE `resto`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kanwil` int(11) NOT NULL,
  `nama_resto` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_telp` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pajak` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of resto
-- ----------------------------
INSERT INTO `resto` VALUES (4, 7, 'Kediri', 'Jl. Veteran', '08573514449', 10);
INSERT INTO `resto` VALUES (5, 7, 'Nganjuk', 'Jl. Candire', '08573514487', 5);
INSERT INTO `resto` VALUES (6, 8, 'Jakarta', 'Jl. Jakarta', '08573514816', 30);
INSERT INTO `resto` VALUES (7, 9, 'Kraton Agun', 'jogja', '08573514449', 10);
INSERT INTO `resto` VALUES (8, 9, 'Sunda Empir', 'Bandung', '08573514487', 10);
INSERT INTO `resto` VALUES (17, 7, 'Buka Resto Baru', 'Malang', '13', 13);
INSERT INTO `resto` VALUES (21, 7, 'Buka Resto Baru', 'Tuban', '08223453114', 15);
INSERT INTO `resto` VALUES (22, 7, 'Resto 1 Kanwil 7', 'Bayuwangi', '08223453112', 15);

-- ----------------------------
-- Table structure for stok_bahan_mentah_produksi
-- ----------------------------
DROP TABLE IF EXISTS `stok_bahan_mentah_produksi`;
CREATE TABLE `stok_bahan_mentah_produksi`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_bahan_mentah` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of stok_bahan_mentah_produksi
-- ----------------------------
INSERT INTO `stok_bahan_mentah_produksi` VALUES (1, 1, 22);
INSERT INTO `stok_bahan_mentah_produksi` VALUES (2, 2, 51);
INSERT INTO `stok_bahan_mentah_produksi` VALUES (3, 3, 9);

-- ----------------------------
-- Table structure for stok_bahan_olahan_produksi
-- ----------------------------
DROP TABLE IF EXISTS `stok_bahan_olahan_produksi`;
CREATE TABLE `stok_bahan_olahan_produksi`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_bahan_olahan` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of stok_bahan_olahan_produksi
-- ----------------------------
INSERT INTO `stok_bahan_olahan_produksi` VALUES (1, 1, 1);
INSERT INTO `stok_bahan_olahan_produksi` VALUES (2, 3, 6);

-- ----------------------------
-- Table structure for superadmin
-- ----------------------------
DROP TABLE IF EXISTS `superadmin`;
CREATE TABLE `superadmin`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `user` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pass` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `telp` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `create_at` datetime(0) NULL DEFAULT current_timestamp(0),
  `update_at` datetime(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of superadmin
-- ----------------------------
INSERT INTO `superadmin` VALUES (1, 'dedy ardiansyah', 'dedi', 'dedi', 'blitar', '08546464664', 'dedi@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for tbl_kinerja_karyawan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_kinerja_karyawan`;
CREATE TABLE `tbl_kinerja_karyawan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_resto` int(11) NOT NULL,
  `pemesanan` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_kinerja_karyawan
-- ----------------------------
INSERT INTO `tbl_kinerja_karyawan` VALUES (16, 23, 2, 1);
INSERT INTO `tbl_kinerja_karyawan` VALUES (17, 23, 1, 1);
INSERT INTO `tbl_kinerja_karyawan` VALUES (18, 23, 3, 1);
INSERT INTO `tbl_kinerja_karyawan` VALUES (19, 23, 5, 1);

-- ----------------------------
-- Table structure for user_kanwil
-- ----------------------------
DROP TABLE IF EXISTS `user_kanwil`;
CREATE TABLE `user_kanwil`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_super_admin` int(11) NOT NULL,
  `id_kanwil` int(11) NOT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `user` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pass` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `telp` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `create_at` datetime(0) NOT NULL DEFAULT current_timestamp(0),
  `update_at` datetime(0) NOT NULL DEFAULT current_timestamp(0),
  `tipe` enum('general manajer','bendahara','logistik') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 38 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user_kanwil
-- ----------------------------
INSERT INTO `user_kanwil` VALUES (30, 1, 7, 'irhassatu', 'irhassatu', 'irhassatu', 'sambirejo', '085735144495', 'irhaskarumaf@gmail.com', '2020-01-30 19:17:40', '2020-01-30 19:17:40', 'general manajer');
INSERT INTO `user_kanwil` VALUES (31, 1, 9, 'indahdua', 'indahdua', 'indahdua', 'jogjakarta', '085735144879', 'indah@gmail.com', '2020-01-30 19:18:18', '2020-01-30 19:18:18', 'general manajer');
INSERT INTO `user_kanwil` VALUES (32, 1, 7, 'fadilasatu', 'fadilasatu', 'fadilasatu', 'papar', '085735144495', 'fadila@gmail.com', '2020-01-30 19:49:51', '2020-01-30 19:49:51', 'bendahara');
INSERT INTO `user_kanwil` VALUES (33, 1, 9, 'wiwindua', 'wiwindua', 'wiwindua', 'jogjakarta', '085735144879', 'wiwin@gmial.com', '2020-01-30 19:50:29', '2020-01-30 19:50:29', 'bendahara');
INSERT INTO `user_kanwil` VALUES (34, 1, 7, 'risasatu', 'risasatu', 'risasatu', 'sambirejo', '085735144495', 'risa@gmail.com', '2020-01-30 19:51:55', '2020-01-30 19:51:55', 'logistik');
INSERT INTO `user_kanwil` VALUES (35, 1, 9, 'triadua', 'triadua', 'triadua', 'jogjakarta', '085735144879', 'tria@gmail.com', '2020-01-30 19:52:18', '2020-01-30 19:52:18', 'logistik');

-- ----------------------------
-- Table structure for user_resto
-- ----------------------------
DROP TABLE IF EXISTS `user_resto`;
CREATE TABLE `user_resto`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kanwil` int(11) NOT NULL,
  `id_resto` int(11) NOT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `user` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pass` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `telp` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `create_at` datetime(0) NOT NULL DEFAULT current_timestamp(0),
  `update_at` datetime(0) NOT NULL DEFAULT current_timestamp(0),
  `jenis` enum('admin resto','kasir','waiters','produksi') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user_resto
-- ----------------------------
INSERT INTO `user_resto` VALUES (19, 7, 4, 'adminrestosatu', 'adminrestosatu', 'adminrestosatu', 'kediri', '085735144495', '2020-01-30 19:54:38', '2020-01-30 19:54:38', 'admin resto');
INSERT INTO `user_resto` VALUES (20, 7, 4, 'produksisatu', 'produksisatu', 'produksisatu', 'kediri', '085735144495', '2020-01-30 20:00:21', '2020-01-30 20:00:21', 'produksi');
INSERT INTO `user_resto` VALUES (22, 7, 4, 'kasirsatu', 'kasirsatu', 'kasirsatu', 'kediri', '085735144495', '2020-01-30 20:01:29', '2020-01-30 20:01:29', 'kasir');
INSERT INTO `user_resto` VALUES (23, 7, 4, 'waiterssatu', 'waiterssatu', 'waiterssatu', 'kediri', '085735144495', '2020-01-30 20:02:01', '2020-01-30 20:02:01', 'waiters');
INSERT INTO `user_resto` VALUES (24, 9, 7, 'adminrestodua', 'adminrestodua', 'adminrestodua', 'jogjakarta', '085735144879', '2020-01-30 20:07:05', '2020-01-30 20:07:05', 'admin resto');
INSERT INTO `user_resto` VALUES (25, 9, 7, 'produksidua', 'produksidua', 'produksidua', 'jogjakarta', '085735144879', '2020-01-30 20:07:54', '2020-01-30 20:07:54', 'produksi');
INSERT INTO `user_resto` VALUES (26, 9, 7, 'kasirdua', 'kasirdua', 'kasirdua', 'jogjakarta', '085735144879', '2020-01-30 20:08:25', '2020-01-30 20:08:25', 'kasir');
INSERT INTO `user_resto` VALUES (27, 9, 7, 'waitersdua', 'waitersdua', 'waitersdua', 'jogjakarta', '085735144879', '2020-01-30 20:08:47', '2020-01-30 20:08:47', 'waiters');

-- ----------------------------
-- Function structure for saldo_investasi_cabang
-- ----------------------------
DROP FUNCTION IF EXISTS `saldo_investasi_cabang`;
delimiter ;;
CREATE FUNCTION `saldo_investasi_cabang`(`id_Rest` INT)
 RETURNS int(11)
BEGIN
          declare setorKasir int;
          declare setorInduk int;
          SELECT SUM(jumlah_setoran) into setorKasir FROM (SELECT id_resto,id FROM user_resto
		WHERE id=id_Rest) AS temp1
		LEFT JOIN `pendapatan_kas_masuk_dari_kasir` ON `pendapatan_kas_masuk_dari_kasir`.`id_user_kasir` = temp1.`id`;
	SELECT SUM(jumlah_pengeluaran) INTO setorInduk FROM (SELECT id_resto,id FROM user_resto
		WHERE id=id_Rest) AS temp1
		LEFT JOIN `investasi_cabang` ON `investasi_cabang`.`id_resto` = temp1.id_resto;
          
          return setorKasir + setorInduk;
      END
;;
delimiter ;

-- ----------------------------
-- Function structure for saldo_investasi_induk
-- ----------------------------
DROP FUNCTION IF EXISTS `saldo_investasi_induk`;
delimiter ;;
CREATE FUNCTION `saldo_investasi_induk`(`id_bend` INT)
 RETURNS int(11)
BEGIN
          DECLARE jumlah INT;
          DECLARE pengeluaran INT;
          DECLARE gaji_k INT;
          DECLARE bahan INT;
          DECLARE alat INT;
          DECLARE operasional INT;
          DECLARE idKan INT;
          SELECT temp1.id_kanwil INTO idKan FROM (SELECT id_kanwil FROM user_kanwil
		WHERE id="32") AS temp1
		LEFT JOIN user_kanwil ON user_kanwil.id_kanwil = temp1.id_kanwil
		WHERE tipe="logistik";
          SELECT SUM(jumlah_investasi) INTO jumlah FROM investasi_owner WHERE id_bendahara=id_bend;
          SELECT SUM(jumlah_pengeluaran) INTO pengeluaran FROM investasi_cabang WHERE id_user_bendahara=id_bend;
          SELECT SUM(nominal_gaji) INTO gaji_k FROM gaji
		JOIN user_resto ON gaji.`id_user_resto`=user_resto.id
		JOIN user_kanwil ON user_resto.`id_kanwil`=user_kanwil.`id_kanwil`
		WHERE user_kanwil.id=id_bend;
	  SELECT SUM(dibayar) INTO bahan FROM `pembelian_bahan_mentah`
		JOIN user_kanwil ON id_logistik=user_kanwil.id
		WHERE id_kanwil =idKan;
	  SELECT SUM(dibayar) INTO alat FROM `pembelian_alat`
		JOIN user_kanwil ON id_logistik=user_kanwil.id
		WHERE id_kanwil =idKan;
	  SELECT SUM(nominal) INTO operasional FROM `pengeluaran_kanwil_operasional` WHERE id_kanwil = idKan;
	  
          RETURN jumlah - pengeluaran - gaji_k - bahan - alat - operasional;
      END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table detail_pembelian_alat
-- ----------------------------
DROP TRIGGER IF EXISTS `stok_pembelian`;
delimiter ;;
CREATE TRIGGER `stok_pembelian` AFTER INSERT ON `detail_pembelian_alat` FOR EACH ROW BEGIN
	UPDATE peralatan SET jumlah_stok=jumlah_stok+NEW.jumlah
	WHERE id = NEW.id_alat;
    END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table gaji
-- ----------------------------
DROP TRIGGER IF EXISTS `detail_kas_gaji`;
delimiter ;;
CREATE TRIGGER `detail_kas_gaji` AFTER INSERT ON `gaji` FOR EACH ROW BEGIN
	INSERT INTO `detail_kas`
	SET id_ref_kas = NEW.id,
	jenis_kas="kas induk",
	tipe_kas="Keluar",
	tanggal=new.tanggal_awal,
	id_superadmin="1",
	id_user=new.id_user_resto,
	id_resto=new.id_resto,
	nominal = new.nominal_gaji,
	tipe_user="Gaji Karyawan";
    END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table investasi_cabang
-- ----------------------------
DROP TRIGGER IF EXISTS `detail_kas_mutasiCabang`;
delimiter ;;
CREATE TRIGGER `detail_kas_mutasiCabang` AFTER INSERT ON `investasi_cabang` FOR EACH ROW BEGIN
	IF new.status="invest dikembalikan" THEN
		INSERT INTO `detail_kas`
		SET id_ref_kas = NEW.id,
		jenis_kas="kas induk",
		tipe_kas="Masuk",
		tanggal=new.tanggal_mulai,
		id_superadmin="1",
		id_user=new.id_user_bendahara,
		id_resto=new.id_resto,
		nominal = new.jumlah_pengeluaran,
		tipe_user="Pengembalian dari Cabang";
	ELSE
		INSERT INTO `detail_kas`
		SET id_ref_kas = NEW.id,
		jenis_kas="kas induk",
		tipe_kas="Keluar",
		tanggal=new.tanggal_mulai,
		id_superadmin="1",
		id_user=new.id_user_bendahara,
		id_resto=new.id_resto,
		nominal = new.jumlah_pengeluaran,
		tipe_user="Mutasi Ke Cabang";
		
		INSERT INTO `detail_kas`
		SET id_ref_kas = NEW.id,
		jenis_kas="kas cabang",
		tipe_kas="Masuk",
		tanggal=new.tanggal_mulai,
		id_superadmin="1",
		id_user=new.id_user_bendahara,
		id_resto=new.id_resto,
		nominal = new.jumlah_pengeluaran,
		tipe_user="Mutasi Dari Induk";
	END IF;
     END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table pembelian_bahan_mentah
-- ----------------------------
DROP TRIGGER IF EXISTS `detail_kas_bahan`;
delimiter ;;
CREATE TRIGGER `detail_kas_bahan` AFTER INSERT ON `pembelian_bahan_mentah` FOR EACH ROW BEGIN
	INSERT INTO `detail_kas`
	SET id_ref_kas = NEW.id,
	jenis_kas="kas induk",
	tipe_kas="Keluar",
	tanggal=new.tanggal,
	id_superadmin="1",
	id_user=new.id_logistik,
	nominal = new.total_harga_beli,
	tipe_user="Pembelian Bahan Mentah";
    END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table pendapatan_kas_masuk
-- ----------------------------
DROP TRIGGER IF EXISTS `detail_kas_setorInduk`;
delimiter ;;
CREATE TRIGGER `detail_kas_setorInduk` AFTER INSERT ON `pendapatan_kas_masuk` FOR EACH ROW BEGIN
	INSERT INTO `detail_kas`
	SET id_ref_kas = NEW.id,
	jenis_kas="kas cabang",
	tipe_kas="Keluar",
	tanggal=new.tanggal,
	id_superadmin="1",
	id_user=new.id_user_kasir,
	nominal = new.jumlah_setoran,
	tipe_user="Setoran ke Induk";	
	
	INSERT INTO `detail_kas`
	SET id_ref_kas = NEW.id,
	jenis_kas="kas induk",
	tipe_kas="Masuk",
	tanggal=new.tanggal,
	id_superadmin="1",
	id_user=new.id_user_kasir,
	nominal = new.jumlah_setoran,
	tipe_user="Setoran dari Cabang";
	
	
    END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table pendapatan_kas_masuk_dari_kasir
-- ----------------------------
DROP TRIGGER IF EXISTS `detail_kas_setorKasir`;
delimiter ;;
CREATE TRIGGER `detail_kas_setorKasir` AFTER INSERT ON `pendapatan_kas_masuk_dari_kasir` FOR EACH ROW BEGIN
	INSERT INTO `detail_kas`
	SET id_ref_kas = NEW.id,
	jenis_kas="kas cabang",
	tipe_kas="Masuk",
	tanggal=new.tanggal,
	id_superadmin="1",
	id_user=new.id_user_kasir,
	nominal = new.jumlah_setoran,
	tipe_user="Setoran dari Kasir";
    END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table pengeluaran_cabang_operasional
-- ----------------------------
DROP TRIGGER IF EXISTS `detail_kas_operasional_cabang`;
delimiter ;;
CREATE TRIGGER `detail_kas_operasional_cabang` AFTER INSERT ON `pengeluaran_cabang_operasional` FOR EACH ROW BEGIN
		INSERT INTO `detail_kas`
		SET id_ref_kas = NEW.id,
		jenis_kas="kas cabang",
		tipe_kas="Keluar",
		tanggal=new.tanggal,
		id_superadmin="1",
		id_user=new.id_admin_resto,
		id_resto=new.id_resto,
		nominal = new.nominal,
		tipe_user="Mutasi Ke Operasional";
		
		INSERT INTO `detail_kas`
		SET id_ref_kas = NEW.id,
		jenis_kas="kas operasional",
		tipe_kas="Masuk",
		tanggal=new.tanggal,
		id_superadmin="1",
		id_user=new.id_admin_resto,
		id_resto=new.id_resto,
		nominal = new.nominal,
		tipe_user="Mutasi Dari Cabang";
    END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table pengeluaran_kanwil_operasional
-- ----------------------------
DROP TRIGGER IF EXISTS `detail_kas_operasional_kanwil`;
delimiter ;;
CREATE TRIGGER `detail_kas_operasional_kanwil` AFTER INSERT ON `pengeluaran_kanwil_operasional` FOR EACH ROW BEGIN
		INSERT INTO `detail_kas`
		SET id_ref_kas = NEW.id,
		jenis_kas="kas cabang",
		tipe_kas="Keluar",
		tanggal=new.tanggal,
		id_superadmin="1",
		id_user=new.id_kanwil,
		nominal = new.nominal,
		tipe_user="Operasional Kanwil";
    END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table resto
-- ----------------------------
DROP TRIGGER IF EXISTS `bukaResto`;
delimiter ;;
CREATE TRIGGER `bukaResto` AFTER INSERT ON `resto` FOR EACH ROW BEGIN
	UPDATE `investasi_buka_resto`SET id_resto = new.id , STATUS="menunggu investor", tanggal_setujui=DATE(NOW())
		WHERE id_kanwil=new.id_kanwil AND nama_resto=new.nama_resto AND alamat=new.alamat;
    END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
