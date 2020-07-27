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

 Date: 27/07/2020 18:52:15
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

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
INSERT INTO `bahan_mentah` VALUES (1, '1', 34, 'ayam kampung', 'ekor', 26, 1);
INSERT INTO `bahan_mentah` VALUES (2, '1', 34, 'tomat', 'kg', 26, 0);
INSERT INTO `bahan_mentah` VALUES (3, '1', 34, 'tepung', 'kg', 25, 0);

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
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of bahan_mentah_masakan
-- ----------------------------
INSERT INTO `bahan_mentah_masakan` VALUES (4, 1, 1, 1);
INSERT INTO `bahan_mentah_masakan` VALUES (6, 6, 2, 1);

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
INSERT INTO `bahan_olahan` VALUES (1, 34, 'ayam kampung paha', 'potong', 25, 1);
INSERT INTO `bahan_olahan` VALUES (3, 34, 'ayam kampung dada', 'potong', 25, 1);

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
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of bahan_olahan_masakan
-- ----------------------------
INSERT INTO `bahan_olahan_masakan` VALUES (1, 1, 1, 1);
INSERT INTO `bahan_olahan_masakan` VALUES (2, 6, 1, 1);

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
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of detail_paket
-- ----------------------------
INSERT INTO `detail_paket` VALUES (12, 1, 1, 1, '10000', '');
INSERT INTO `detail_paket` VALUES (13, 1, 3, 1, '10000', '');
INSERT INTO `detail_paket` VALUES (15, 4, 8, 1, '1000', '');
INSERT INTO `detail_paket` VALUES (22, 5, 1, 1, '15000', '');

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
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of detail_pembelian_alat
-- ----------------------------
INSERT INTO `detail_pembelian_alat` VALUES (21, '1', '1', '5', '1000');
INSERT INTO `detail_pembelian_alat` VALUES (22, '10', '1', '5', '2000');

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
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of detail_pembelian_bahan_mentah
-- ----------------------------
INSERT INTO `detail_pembelian_bahan_mentah` VALUES (10, '6', '1', '1', '5000');
INSERT INTO `detail_pembelian_bahan_mentah` VALUES (11, '6', '2', '1', '2000');

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
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of gaji
-- ----------------------------
INSERT INTO `gaji` VALUES (5, 4, 23, '2020-01-01', '2020-01-31', 'bulanan', 2005000);

-- ----------------------------
-- Table structure for gaji_kanwil
-- ----------------------------
DROP TABLE IF EXISTS `gaji_kanwil`;
CREATE TABLE `gaji_kanwil`  (
  `id_gaji_kanwil` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_kanwil` int(11) NULL DEFAULT NULL,
  `nominal_gaji` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_gaji_kanwil`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

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
) ENGINE = InnoDB AUTO_INCREMENT = 35 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of intensif_waiters
-- ----------------------------
INSERT INTO `intensif_waiters` VALUES (30, '23', '2020-01-30 21:35:00', '1000');
INSERT INTO `intensif_waiters` VALUES (31, '23', '2020-01-30 21:35:25', '1000');
INSERT INTO `intensif_waiters` VALUES (32, '23', '2020-01-30 21:49:42', '1000');
INSERT INTO `intensif_waiters` VALUES (33, '23', '2020-02-01 22:53:18', '1000');
INSERT INTO `intensif_waiters` VALUES (34, '23', '2020-02-01 22:53:42', '1000');

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
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

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
  `id_kas` int(11) NOT NULL,
  `nama_investasi` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `jumlah_pengeluaran` int(11) NOT NULL,
  `persen_penyusutan` int(11) NULL DEFAULT NULL,
  `status` enum('permintaan','disetujui','invest dikembalikan','invest belum kembali') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'permintaan',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of investasi_cabang
-- ----------------------------
INSERT INTO `investasi_cabang` VALUES (4, 2, 'Dekorasi', '2019-10-01', '2019-10-31', 20000, 10, 'disetujui');
INSERT INTO `investasi_cabang` VALUES (5, 2, 'Renovasi', '2019-10-01', '2019-10-30', 5000, 20, 'invest dikembalikan');
INSERT INTO `investasi_cabang` VALUES (6, 2, 'Pembelian p', '2019-10-01', '2019-10-30', 500000, 20, 'invest dikembalikan');
INSERT INTO `investasi_cabang` VALUES (7, 2, 'Pengecetan', '2019-10-01', '2019-10-30', 80000, 20, 'permintaan');
INSERT INTO `investasi_cabang` VALUES (8, 2, 'pembelian alat', '2019-10-01', '2019-10-30', 700000, 10, 'permintaan');
INSERT INTO `investasi_cabang` VALUES (9, 2, 'sewa ruko', '2020-01-14', '2025-01-14', 200000000, 10, 'permintaan');
INSERT INTO `investasi_cabang` VALUES (10, 2, 'renovasi', '2020-02-01', '2020-05-01', 50000000, 10, 'permintaan');

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
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of investasi_kanwil
-- ----------------------------
INSERT INTO `investasi_kanwil` VALUES (1, 1, 1, 1, '2019-11-01', 3000000, 20, 1000, 'permintaan');
INSERT INTO `investasi_kanwil` VALUES (3, 1, 1, 1, '2019-10-01', 9000, 90, 0, 'diterima');

-- ----------------------------
-- Table structure for investasi_owner
-- ----------------------------
DROP TABLE IF EXISTS `investasi_owner`;
CREATE TABLE `investasi_owner`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_super_admin` int(11) NOT NULL,
  `id_owner` int(11) NOT NULL,
  `id_bendahara` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_investasi` int(11) NOT NULL,
  `jangka_waktu` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `persentase_omset` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of investasi_owner
-- ----------------------------
INSERT INTO `investasi_owner` VALUES (1, 1, 1, 2, '2019-11-30', 90000, '2 bulan', 20);
INSERT INTO `investasi_owner` VALUES (2, 1, 1, 2, '2019-11-30', 9000, '3 bulan', 20);
INSERT INTO `investasi_owner` VALUES (3, 1, 1, 32, '2020-03-07', 500000, '2 bulan', 20);

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
-- Table structure for kas
-- ----------------------------
DROP TABLE IF EXISTS `kas`;
CREATE TABLE `kas`  (
  `id_kas` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_kas` enum('kas induk','kas cabang','kas operasional') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tipe_kas` enum('Masuk','Keluar') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tanggal` date NULL DEFAULT NULL,
  `nominal` int(20) NULL DEFAULT NULL,
  `tipe_user` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_kas`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 132 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of kas
-- ----------------------------
INSERT INTO `kas` VALUES (17, 'kas induk', 'Keluar', '2020-04-03', 30000, 'Pembelian Alat');
INSERT INTO `kas` VALUES (18, 'kas induk', 'Keluar', '2020-04-03', 1000000, 'Pembelian Bahan Mentah');
INSERT INTO `kas` VALUES (20, 'kas induk', 'Masuk', '2020-04-03', 10000, 'Investasi Owner');
INSERT INTO `kas` VALUES (21, 'kas induk', 'Keluar', '2020-04-03', 900000, 'Gaji Karyawan');
INSERT INTO `kas` VALUES (24, 'kas induk', 'Masuk', '2020-04-03', 50000, 'Pengembalian dari Cabang');
INSERT INTO `kas` VALUES (27, 'kas induk', 'Keluar', '2020-04-03', 1000000, 'Mutasi Ke Cabang');
INSERT INTO `kas` VALUES (28, 'kas cabang', 'Masuk', '2020-04-03', 500000, 'Setor dari Cabang');
INSERT INTO `kas` VALUES (29, 'kas induk', 'Keluar', '2020-04-03', 50000, 'Mutasi Ke Cabang');
INSERT INTO `kas` VALUES (30, 'kas induk', 'Masuk', '2020-04-03', 50000, 'Mutasi Dari Induk');
INSERT INTO `kas` VALUES (35, 'kas induk', 'Keluar', '2020-04-03', 50000, 'Mutasi Ke Cabang');
INSERT INTO `kas` VALUES (36, 'kas cabang', 'Masuk', '2020-04-03', 50000, 'Mutasi Dari Induk');
INSERT INTO `kas` VALUES (37, 'kas induk', 'Masuk', '2020-04-03', 100000, 'Setoran dari Cabang');
INSERT INTO `kas` VALUES (38, 'kas cabang', 'Keluar', '2020-04-03', 100000, 'Setoran ke Induk');
INSERT INTO `kas` VALUES (39, 'kas cabang', 'Keluar', '2020-04-03', 500000, 'Mutasi Ke Operasional');
INSERT INTO `kas` VALUES (40, 'kas operasional', 'Masuk', '2020-04-03', 500000, 'Mutasi Dari Cabang');
INSERT INTO `kas` VALUES (42, 'kas cabang', 'Keluar', '2020-04-03', 100000, 'Operasional Kanwil');
INSERT INTO `kas` VALUES (43, 'kas cabang', 'Masuk', '2020-04-03', 100000, 'Setoran dari Kasir');
INSERT INTO `kas` VALUES (44, 'kas cabang', 'Masuk', '2020-04-03', 147000, 'Setoran dari Kasir');
INSERT INTO `kas` VALUES (45, 'kas induk', 'Keluar', '0000-00-00', 1000000, 'Mutasi Ke Cabang');
INSERT INTO `kas` VALUES (46, 'kas cabang', 'Masuk', '0000-00-00', 1000000, 'Mutasi Dari Induk');
INSERT INTO `kas` VALUES (47, 'kas cabang', 'Keluar', '0000-00-00', 5000000, 'Operasional Kanwil');
INSERT INTO `kas` VALUES (48, 'kas induk', 'Masuk', '2020-04-01', 9000000, 'Investasi Owner');
INSERT INTO `kas` VALUES (49, 'kas induk', 'Keluar', '2020-04-03', 900000, 'Gaji Karyawan');
INSERT INTO `kas` VALUES (50, 'kas induk', 'Masuk', '2020-04-01', 1000000, 'Investasi Owner');
INSERT INTO `kas` VALUES (51, 'kas induk', 'Masuk', '2020-04-01', 100000, 'Investasi Owner');
INSERT INTO `kas` VALUES (52, 'kas induk', 'Masuk', '2020-04-08', 100000000, 'Investasi Owner');
INSERT INTO `kas` VALUES (53, 'kas induk', 'Masuk', '2020-04-09', 50000000, 'Investasi Owner');
INSERT INTO `kas` VALUES (54, 'kas induk', 'Masuk', '2020-04-09', 50000000, 'Investasi Owner');
INSERT INTO `kas` VALUES (57, 'kas induk', 'Masuk', '2020-04-09', 10000000, 'Investasi Owner');
INSERT INTO `kas` VALUES (58, 'kas induk', 'Masuk', '2020-04-09', 50000000, 'Investasi Owner');
INSERT INTO `kas` VALUES (59, 'kas induk', 'Masuk', '2020-04-09', 50000000, 'Investasi Owner');
INSERT INTO `kas` VALUES (60, 'kas induk', 'Masuk', '2020-04-09', 50000000, 'Investasi Owner');
INSERT INTO `kas` VALUES (61, 'kas induk', 'Masuk', '2020-04-09', 50000000, 'Investasi Owner');
INSERT INTO `kas` VALUES (62, 'kas induk', 'Masuk', '2020-04-09', 50000000, 'Investasi Owner');
INSERT INTO `kas` VALUES (63, 'kas induk', 'Masuk', '2020-04-09', 50000000, 'Investasi Owner');
INSERT INTO `kas` VALUES (64, 'kas induk', 'Masuk', '2020-04-09', 50000000, 'Investasi Owner');
INSERT INTO `kas` VALUES (65, 'kas induk', 'Masuk', '2020-04-09', 50000000, 'Investasi Owner');
INSERT INTO `kas` VALUES (66, 'kas induk', 'Masuk', '2020-04-09', 50000000, 'Investasi Owner');
INSERT INTO `kas` VALUES (67, 'kas induk', 'Masuk', '2020-04-09', 50000000, 'Investasi Owner');
INSERT INTO `kas` VALUES (68, 'kas induk', 'Masuk', '2020-04-09', 50000000, 'Investasi Owner');
INSERT INTO `kas` VALUES (69, 'kas induk', 'Masuk', '2020-04-09', 50000000, 'Investasi Owner');
INSERT INTO `kas` VALUES (70, 'kas induk', 'Masuk', '2020-04-09', 50000000, 'Investasi Owner');
INSERT INTO `kas` VALUES (71, 'kas induk', 'Masuk', '2020-04-09', 50000000, 'Investasi Owner');
INSERT INTO `kas` VALUES (72, 'kas induk', 'Masuk', '2020-04-09', 50000000, 'Investasi Owner');
INSERT INTO `kas` VALUES (73, 'kas induk', 'Masuk', '2020-04-09', 50000000, 'Investasi Owner');
INSERT INTO `kas` VALUES (74, 'kas induk', 'Masuk', '2020-04-09', 50000000, 'Investasi Owner');
INSERT INTO `kas` VALUES (75, 'kas induk', 'Masuk', '2020-04-09', 50000000, 'Investasi Owner');
INSERT INTO `kas` VALUES (76, 'kas induk', 'Masuk', '2020-04-09', 123, 'Investasi Owner');
INSERT INTO `kas` VALUES (77, 'kas induk', 'Masuk', '2020-04-09', 50000, 'Investasi Owner');
INSERT INTO `kas` VALUES (78, 'kas induk', 'Masuk', '2020-04-09', 100000000, 'Investasi Owner');
INSERT INTO `kas` VALUES (79, 'kas induk', 'Masuk', '2020-04-09', 12312, 'Investasi Owner');
INSERT INTO `kas` VALUES (80, 'kas induk', 'Masuk', '2020-04-09', 12312, 'Investasi Owner');
INSERT INTO `kas` VALUES (81, 'kas induk', 'Masuk', '2020-04-09', 10000, 'Investasi Owner');
INSERT INTO `kas` VALUES (82, 'kas induk', 'Masuk', '2020-04-09', 10000, 'Investasi Owner');
INSERT INTO `kas` VALUES (83, 'kas induk', 'Masuk', '2020-04-09', 10000, 'Investasi Owner');
INSERT INTO `kas` VALUES (84, 'kas induk', 'Masuk', '2020-04-09', 10000, 'Investasi Owner');
INSERT INTO `kas` VALUES (85, 'kas induk', 'Masuk', '2020-04-09', 50000000, 'Investasi Owner');
INSERT INTO `kas` VALUES (87, 'kas induk', 'Masuk', '2020-04-09', 50000000, 'Investasi Owner');
INSERT INTO `kas` VALUES (95, 'kas induk', 'Masuk', '2020-04-09', 50000000, 'Investasi Owner');
INSERT INTO `kas` VALUES (96, 'kas induk', 'Masuk', '2020-04-09', 50000000, 'Investasi Owner');
INSERT INTO `kas` VALUES (98, 'kas induk', 'Masuk', '2020-04-09', 50000000, 'Investasi Owner');
INSERT INTO `kas` VALUES (99, 'kas induk', 'Masuk', '2020-04-09', 50000000, 'Investasi Owner');
INSERT INTO `kas` VALUES (100, 'kas induk', 'Masuk', '2020-04-09', 50000000, 'Investasi Owner');
INSERT INTO `kas` VALUES (101, 'kas induk', 'Masuk', '2020-04-09', 50000000, 'Investasi Owner');
INSERT INTO `kas` VALUES (104, 'kas induk', 'Keluar', '2020-04-11', 100000, 'Mutasi Ke Cabang');
INSERT INTO `kas` VALUES (105, 'kas cabang', 'Masuk', '2020-04-11', 100000, 'Mutasi Dari Induk');
INSERT INTO `kas` VALUES (106, 'kas induk', 'Keluar', '2020-04-11', 3000, 'Mutasi Ke Cabang');
INSERT INTO `kas` VALUES (107, 'kas cabang', 'Masuk', '2020-04-11', 3000, 'Mutasi Dari Induk');
INSERT INTO `kas` VALUES (108, 'kas induk', 'Keluar', '2020-04-11', 10000, 'Mutasi Ke Cabang');
INSERT INTO `kas` VALUES (109, 'kas cabang', 'Masuk', '2020-04-11', 10000, 'Mutasi Dari Induk');
INSERT INTO `kas` VALUES (110, 'kas induk', 'Keluar', '2020-04-11', 100000000, 'Mutasi Ke Cabang');
INSERT INTO `kas` VALUES (111, 'kas cabang', 'Masuk', '2020-04-11', 100000000, 'Mutasi Dari Induk');
INSERT INTO `kas` VALUES (112, 'kas induk', 'Keluar', '2020-04-11', 10000000, 'Mutasi Ke Cabang');
INSERT INTO `kas` VALUES (113, 'kas cabang', 'Masuk', '2020-04-11', 10000000, 'Mutasi Dari Induk');
INSERT INTO `kas` VALUES (114, 'kas induk', 'Keluar', '2020-04-11', 15000000, 'Mutasi Ke Cabang');
INSERT INTO `kas` VALUES (115, 'kas cabang', 'Masuk', '2020-04-11', 15000000, 'Mutasi Dari Induk');
INSERT INTO `kas` VALUES (116, 'kas induk', 'Keluar', '2020-04-11', 10000000, 'Mutasi Ke Cabang');
INSERT INTO `kas` VALUES (117, 'kas cabang', 'Masuk', '2020-04-11', 10000000, 'Mutasi Dari Induk');
INSERT INTO `kas` VALUES (118, 'kas induk', 'Keluar', '2020-04-11', 15000000, 'Mutasi Ke Cabang');
INSERT INTO `kas` VALUES (119, 'kas cabang', 'Masuk', '2020-04-11', 15000000, 'Mutasi Dari Induk');
INSERT INTO `kas` VALUES (120, 'kas induk', 'Keluar', '2020-04-11', 50000000, 'Mutasi Ke Cabang');
INSERT INTO `kas` VALUES (121, 'kas cabang', 'Masuk', '2020-04-11', 50000000, 'Mutasi Dari Induk');
INSERT INTO `kas` VALUES (122, 'kas induk', 'Keluar', '2020-04-12', 1000000, 'Mutasi Ke Cabang');
INSERT INTO `kas` VALUES (123, 'kas cabang', 'Masuk', '2020-04-12', 1000000, 'Mutasi Dari Induk');
INSERT INTO `kas` VALUES (124, 'kas induk', 'Masuk', '2020-04-12', 400000000, 'Investasi Owner');
INSERT INTO `kas` VALUES (125, 'kas induk', 'Masuk', '2020-04-12', 20000000, 'Investasi Owner');
INSERT INTO `kas` VALUES (126, 'kas induk', 'Masuk', '2020-04-12', 180000000, 'Investasi Owner');
INSERT INTO `kas` VALUES (127, 'kas induk', 'Keluar', '2020-04-12', 30000000, 'Mutasi Ke Cabang');
INSERT INTO `kas` VALUES (128, 'kas cabang', 'Masuk', '2020-04-12', 30000000, 'Mutasi Dari Induk');
INSERT INTO `kas` VALUES (129, 'kas induk', 'Masuk', '2020-04-12', 1000, 'Investasi Owner');
INSERT INTO `kas` VALUES (131, 'kas induk', 'Masuk', '2020-04-12', 17987000, 'Sisa Investasi Buka Resto');

-- ----------------------------
-- Table structure for kas_cabang
-- ----------------------------
DROP TABLE IF EXISTS `kas_cabang`;
CREATE TABLE `kas_cabang`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_resto` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tanggal` date NULL DEFAULT NULL,
  `saldo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of kas_cabang
-- ----------------------------
INSERT INTO `kas_cabang` VALUES (1, '4', '2020-07-18', '1000000');
INSERT INTO `kas_cabang` VALUES (2, '5', '2020-07-18', '1000000');
INSERT INTO `kas_cabang` VALUES (3, '6', '2020-07-18', '1000000');
INSERT INTO `kas_cabang` VALUES (4, '7', '2020-07-18', '1000000');
INSERT INTO `kas_cabang` VALUES (5, '8', '2020-07-18', '1000000');

-- ----------------------------
-- Table structure for kas_kanwil
-- ----------------------------
DROP TABLE IF EXISTS `kas_kanwil`;
CREATE TABLE `kas_kanwil`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kanwil` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tanggal` date NULL DEFAULT NULL,
  `saldo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of kas_kanwil
-- ----------------------------
INSERT INTO `kas_kanwil` VALUES (1, '4', '2020-07-18', '1000000');
INSERT INTO `kas_kanwil` VALUES (2, '5', '2020-07-18', '1000000');
INSERT INTO `kas_kanwil` VALUES (3, '6', '2020-07-18', '1000000');
INSERT INTO `kas_kanwil` VALUES (4, '7', '2020-07-18', '1000000');
INSERT INTO `kas_kanwil` VALUES (5, '8', '2020-07-18', '1000000');

-- ----------------------------
-- Table structure for kas_owner
-- ----------------------------
DROP TABLE IF EXISTS `kas_owner`;
CREATE TABLE `kas_owner`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_owner` int(255) NULL DEFAULT NULL,
  `tgl` date NULL DEFAULT NULL,
  `nominal` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of kas_owner
-- ----------------------------
INSERT INTO `kas_owner` VALUES (1, 1, '2020-03-11', '100000');
INSERT INTO `kas_owner` VALUES (2, 2, '2020-03-11', '50000');
INSERT INTO `kas_owner` VALUES (3, 1, '2020-03-11', '50000');
INSERT INTO `kas_owner` VALUES (4, 1, '2020-03-11', '50000');

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
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

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
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

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
INSERT INTO `meja` VALUES (8, 4, 8);

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
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES (1, 4, 'Ayam Geprek', 'ss2.PNG', 15000, 'tersedia', 3, 'insert');
INSERT INTO `menu` VALUES (2, 4, 'Jamur Kripsi', 'ss5.PNG', 10000, 'tersedia', 0, 'insert');
INSERT INTO `menu` VALUES (3, 4, 'Es Teh Anget', 'woodz.PNG', 10000, 'tersedia', 9, 'insert');
INSERT INTO `menu` VALUES (4, 4, 'Kopi Susu', 'kopihitam.jpg', 3000, 'habis', 6, 'insert');
INSERT INTO `menu` VALUES (5, 4, 'Nasi Goreng', 'proyek.PNG', 3000, 'tersedia', 6, 'insert');
INSERT INTO `menu` VALUES (6, 4, 'Tahu Kripsi', 'ss7.PNG', 6000, 'tersedia', 1, 'insert');
INSERT INTO `menu` VALUES (7, 1, 'teh pucuk', 'default.jpg', 3000, 'tersedia', 1, 'insert');
INSERT INTO `menu` VALUES (8, 4, 'es degan', 'ss4.PNG', 1000, 'tersedia', 3, 'insert');

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
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

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
  `create_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  `update_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
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
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of paket
-- ----------------------------
INSERT INTO `paket` VALUES (1, 4, 'Paket Bom', 55, 'tersedia', 'images1.jpg', '8000', 'insert');
INSERT INTO `paket` VALUES (2, 4, 'Paket Granat', 10, 'tersedia', 'ss.PNG', '20000', 'insert');
INSERT INTO `paket` VALUES (3, 4, 'Paket asoy', 5, 'habis', 'nasibebek.jpg', '30000', 'insert');
INSERT INTO `paket` VALUES (4, 4, 'PAKET ROKET', 1, 'tersedia', 'Captureerte.PNG', '80000', 'insert');
INSERT INTO `paket` VALUES (5, 4, 'Paket Ayam Gejoh', 1, 'tersedia', 'ss1.PNG', '1000', 'insert');

-- ----------------------------
-- Table structure for pembayaran
-- ----------------------------
DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE `pembayaran`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_kasir` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `diskon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` enum('kredit','lunas') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal` datetime(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 40 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pembayaran
-- ----------------------------
INSERT INTO `pembayaran` VALUES (34, 23, 2, 15000, NULL, 'lunas', '2020-01-30 21:35:25');
INSERT INTO `pembayaran` VALUES (35, 23, 1, 25000, NULL, 'lunas', '2020-01-30 15:42:30');
INSERT INTO `pembayaran` VALUES (36, 23, 3, 20000, NULL, 'lunas', '2020-02-02 17:09:06');
INSERT INTO `pembayaran` VALUES (38, 23, 4, 25000, NULL, 'lunas', '2020-02-02 20:42:38');
INSERT INTO `pembayaran` VALUES (39, 22, 5, 15000, NULL, 'lunas', '2020-02-01 16:55:53');

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
  `tanggal` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `total_harga_beli` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `dibayar` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` enum('draft','selesai') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `catatan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pembelian_bahan_mentah
-- ----------------------------
INSERT INTO `pembelian_bahan_mentah` VALUES (9, 34, 6, 'anton', '2020-07-14', '7000', '7000', 'selesai', 'lunas');

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
  `status` enum('pengajuan','pemberian','diterima') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_pengeluaran`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pemberian_kaskeluar
-- ----------------------------
INSERT INTO `pemberian_kaskeluar` VALUES (10, 32, 4, '2020-07-17', 500000, 'pemberian');
INSERT INTO `pemberian_kaskeluar` VALUES (12, 32, 4, '2020-07-17', 5000, 'diterima');
INSERT INTO `pemberian_kaskeluar` VALUES (13, 32, 4, '2020-07-17', 1000, 'pengajuan');

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
  `jumlah_setoran` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal` date NOT NULL,
  `tanggal_awal` datetime(0) NOT NULL,
  `tanggal_akhir` datetime(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pendapatan_kas_masuk
-- ----------------------------
INSERT INTO `pendapatan_kas_masuk` VALUES (10, 32, 22, '29000', '2020-02-02', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for pendapatan_kas_masuk_dari_kasir
-- ----------------------------
DROP TABLE IF EXISTS `pendapatan_kas_masuk_dari_kasir`;
CREATE TABLE `pendapatan_kas_masuk_dari_kasir`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_resto` int(11) NULL DEFAULT NULL,
  `id_user_kasir` int(11) NOT NULL,
  `id_adminresto` int(11) NOT NULL,
  `jumlah_setoran` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 44 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pendapatan_kas_masuk_dari_kasir
-- ----------------------------
INSERT INTO `pendapatan_kas_masuk_dari_kasir` VALUES (36, 4, 22, 19, '800000', '2020-04-08');
INSERT INTO `pendapatan_kas_masuk_dari_kasir` VALUES (37, 4, 22, 19, '200000', '2020-04-09');
INSERT INTO `pendapatan_kas_masuk_dari_kasir` VALUES (38, 4, 22, 19, '800000', '2020-04-10');
INSERT INTO `pendapatan_kas_masuk_dari_kasir` VALUES (39, 4, 22, 19, '700000', '2020-04-11');
INSERT INTO `pendapatan_kas_masuk_dari_kasir` VALUES (40, 3, 22, 19, '42000', '2020-04-12');
INSERT INTO `pendapatan_kas_masuk_dari_kasir` VALUES (43, 4, 22, 19, '50000', '2020-04-13');

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
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

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
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pengeluaran_cabang_operasional
-- ----------------------------
INSERT INTO `pengeluaran_cabang_operasional` VALUES (1, 4, 1, 1, '2019-10-02', 1, '1 bulan', '5000');
INSERT INTO `pengeluaran_cabang_operasional` VALUES (2, 4, 1, 1, '2019-10-03', 1, '2 bulan', '90');
INSERT INTO `pengeluaran_cabang_operasional` VALUES (3, 4, 1, 1, '2019-10-19', 0, '2 hari', '10000');
INSERT INTO `pengeluaran_cabang_operasional` VALUES (5, 1, 1, 1, '2019-12-29', 2, '1 bulan', '70000');

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
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

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
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pengeluaran_kanwil_operasional
-- ----------------------------
INSERT INTO `pengeluaran_kanwil_operasional` VALUES (1, 1, 1, '2019-10-02', '1 bulan', '5000');
INSERT INTO `pengeluaran_kanwil_operasional` VALUES (3, 1, 1, '2019-10-03', '1 bulan', '100');
INSERT INTO `pengeluaran_kanwil_operasional` VALUES (4, 1, 1, '2019-10-04', '1 bulan', '2000');

-- ----------------------------
-- Table structure for pengiriman_bahan_mentah
-- ----------------------------
DROP TABLE IF EXISTS `pengiriman_bahan_mentah`;
CREATE TABLE `pengiriman_bahan_mentah`  (
  `id` int(11) NOT NULL,
  `id_permintaan` int(11) NOT NULL,
  `id_bahan_mentah` int(11) NOT NULL,
  `tanggal_pengiriman` date NOT NULL,
  `jumlah_permintaan` int(11) NOT NULL,
  `jumlah_dikirim` int(11) NOT NULL,
  `jumlah_dikembalikan` int(11) NOT NULL,
  `status` enum('sesuai','tidak') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status_bahan` enum('diterima','belum diterima') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pengiriman_bahan_mentah
-- ----------------------------
INSERT INTO `pengiriman_bahan_mentah` VALUES (0, 5, 2, '2020-07-08', 1, 1, 0, 'sesuai', 'belum diterima');
INSERT INTO `pengiriman_bahan_mentah` VALUES (1, 3, 1, '2019-10-22', 2, 4, 2, 'tidak', NULL);
INSERT INTO `pengiriman_bahan_mentah` VALUES (2, 4, 1, '2020-07-09', 1, 1, 0, 'sesuai', 'diterima');

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
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pengiriman_bahan_olahan
-- ----------------------------
INSERT INTO `pengiriman_bahan_olahan` VALUES (2, 2, 3, '2019-10-22', 4, 4, 0, 'diterima', NULL);
INSERT INTO `pengiriman_bahan_olahan` VALUES (4, 1, 3, '2019-10-25', 1, 1, 0, 'sesuai', NULL);
INSERT INTO `pengiriman_bahan_olahan` VALUES (5, 3, 1, '2020-06-14', 1, 1, 0, 'sesuai', 'diterima');

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
INSERT INTO `peralatan` VALUES (1, 3, 1, 'sendok', 'pcs', 10, 1);

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
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of permintaan_bahan_mentah
-- ----------------------------
INSERT INTO `permintaan_bahan_mentah` VALUES (3, 1, 3, 'permintaan 3', '2019-11-04', 'pengiriman');
INSERT INTO `permintaan_bahan_mentah` VALUES (4, 4, 20, 'permintaan 1', '2020-06-30', 'pengiriman');
INSERT INTO `permintaan_bahan_mentah` VALUES (5, 4, 20, 'permintaan 2', '2020-07-01', 'permintaan');

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
INSERT INTO `permintaan_bahan_olahan` VALUES (3, 4, 20, 'permintaan 1', '2020-06-30', 'permintaan');

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
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of produksi_bahan_olahan
-- ----------------------------
INSERT INTO `produksi_bahan_olahan` VALUES (2, 34, 1, 1, '2019-10-09', 'selesai produksi');
INSERT INTO `produksi_bahan_olahan` VALUES (8, 34, 3, 1, '2020-07-09', 'selesai produksi');
INSERT INTO `produksi_bahan_olahan` VALUES (10, 34, 1, 1, '2020-07-14', 'selesai produksi');

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
  `nama_resto` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_telp` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pajak` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of resto
-- ----------------------------
INSERT INTO `resto` VALUES (4, 7, 'Kediri', 'Jl. Veteran', '08573514449', 10);
INSERT INTO `resto` VALUES (5, 7, 'Nganjuk', 'Jl. Candire', '08573514487', 5);
INSERT INTO `resto` VALUES (6, 8, 'Jakarta', 'Jl. Jakarta', '08573514816', 30);
INSERT INTO `resto` VALUES (7, 9, 'Kraton Agun', 'jogja', '08573514449', 10);
INSERT INTO `resto` VALUES (8, 9, 'Sunda Empir', 'Bandung', '08573514487', 10);

-- ----------------------------
-- Table structure for stok_bahan_mentah_produksi
-- ----------------------------
DROP TABLE IF EXISTS `stok_bahan_mentah_produksi`;
CREATE TABLE `stok_bahan_mentah_produksi`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_bahan_mentah` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of stok_bahan_mentah_produksi
-- ----------------------------
INSERT INTO `stok_bahan_mentah_produksi` VALUES (1, 1, 27);
INSERT INTO `stok_bahan_mentah_produksi` VALUES (2, 2, 59);

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
INSERT INTO `stok_bahan_olahan_produksi` VALUES (1, 1, 39);
INSERT INTO `stok_bahan_olahan_produksi` VALUES (2, 3, 50);

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
  `create_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `update_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

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
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

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
  `create_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  `update_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  `tipe` enum('general manajer','bendahara','logistik') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 36 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

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
  `create_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  `update_at` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
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
CREATE FUNCTION `saldo_investasi_cabang`(id_Rest int)
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
CREATE FUNCTION `saldo_investasi_induk`(id_bend int)
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

SET FOREIGN_KEY_CHECKS = 1;
