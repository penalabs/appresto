/*
 Navicat Premium Data Transfer

 Source Server         : konek
 Source Server Type    : MySQL
 Source Server Version : 100131
 Source Host           : localhost:3306
 Source Schema         : db_siresto

 Target Server Type    : MySQL
 Target Server Version : 100131
 File Encoding         : 65001

 Date: 16/10/2019 23:46:18
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
INSERT INTO `bahan_mentah` VALUES (1, '1', 3, 'ayam kampung', 'ekor', 8, 1);
INSERT INTO `bahan_mentah` VALUES (2, '1', 3, 'tomat', 'kg', 8, 1);
INSERT INTO `bahan_mentah` VALUES (3, '1', 3, 'tepung', 'kg', 10, 0);

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
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of bahan_mentah_masakan
-- ----------------------------
INSERT INTO `bahan_mentah_masakan` VALUES (1, 1, 1, 1);

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
INSERT INTO `bahan_olahan` VALUES (1, 3, 'ayam kampung paha', 'buah', 4, 1);
INSERT INTO `bahan_olahan` VALUES (3, 3, 'ayam kampung dada', 'buah', 2, 1);

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
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of detail_pembelian_alat
-- ----------------------------
INSERT INTO `detail_pembelian_alat` VALUES (12, '1', '1', '1', '8000');
INSERT INTO `detail_pembelian_alat` VALUES (13, '6', '1', '7', '7000');
INSERT INTO `detail_pembelian_alat` VALUES (14, '7', '1', '1', '9000');

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
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

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

-- ----------------------------
-- Table structure for gaji
-- ----------------------------
DROP TABLE IF EXISTS `gaji`;
CREATE TABLE `gaji`  (
  `id` int(11) NOT NULL,
  `id_resto` int(11) NOT NULL,
  `id_user_resto` int(11) NOT NULL,
  `bulan_awal` datetime(0) NOT NULL,
  `bulan_akhir` datetime(0) NOT NULL,
  `jenis_gaji` enum('bulanan','THR','bonus','pesangon') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jumlah_gaji` int(11) NOT NULL,
  `total_gaji` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

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
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of investasi_kanwil
-- ----------------------------
INSERT INTO `investasi_kanwil` VALUES (1, 1, 1, 1, '0000-00-00', 3000000, 20, 1000);

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
  `jumlah_omset` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of investasi_owner
-- ----------------------------
INSERT INTO `investasi_owner` VALUES (1, 1, 1, 2, '0000-00-00', 1000000, '2 bulan', 20, NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of kanwil
-- ----------------------------
INSERT INTO `kanwil` VALUES (1, 'ngronggo', '0856464646');

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
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES (1, 1, 'Ayam Geprek', 'nasibebek.jpg', 10000, 'tersedia', 5, 'insert');
INSERT INTO `menu` VALUES (2, 1, 'Jamur Kripsi', '124789-mint-background-2560x1600-for-ios.jpg', 10000, 'tersedia', 1, 'insert');
INSERT INTO `menu` VALUES (3, 1, 'Es Teh Anget', '124789-mint-background-2560x1600-for-ios4.jpg', 10000, 'tersedia', 10, 'insert');
INSERT INTO `menu` VALUES (4, 1, 'Kopi Susu', 'start4.jpg', 3000, 'tersedia', 6, 'insert');
INSERT INTO `menu` VALUES (5, 1, 'Nasi Goreng', 'start2.png', 3000, 'tersedia', 6, 'insert');
INSERT INTO `menu` VALUES (6, 1, 'Tahu Kripsi', 'wp2754931.jpg', 6000, 'tersedia', 1, 'insert');

-- ----------------------------
-- Table structure for omset_investasi
-- ----------------------------
DROP TABLE IF EXISTS `omset_investasi`;
CREATE TABLE `omset_investasi`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_investasi_owner` int(11) NOT NULL,
  `id_super_admin` int(11) NOT NULL,
  `id_pendapatan` int(11) NOT NULL,
  `jumlah_omset_pendapatan` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of omset_investasi
-- ----------------------------
INSERT INTO `omset_investasi` VALUES (1, 1, 1, 1, 200);

-- ----------------------------
-- Table structure for operasional
-- ----------------------------
DROP TABLE IF EXISTS `operasional`;
CREATE TABLE `operasional`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pengeluaran` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of operasional
-- ----------------------------
INSERT INTO `operasional` VALUES (1, 'listrik');
INSERT INTO `operasional` VALUES (2, 'internet');

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
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of owner
-- ----------------------------
INSERT INTO `owner` VALUES (1, 1, 'fauzin', 'fauzin', 'fauzin', 'sambirejo', '123456', 'fauzin@gmail.com', '0', '2019-05-08 00:37:00', '2019-05-08 00:37:00');

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
INSERT INTO `paket` VALUES (1, 1, 'Paket Bom', 10, 'tersedia', 'gepreksai3.jpg', '8000', 'insert');
INSERT INTO `paket` VALUES (2, 1, 'Paket Granat', 10, 'tersedia', '', '20000', 'insert');
INSERT INTO `paket` VALUES (3, 1, 'Paket asoy', 5, 'tersedia', '', '30000', 'insert');

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
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pembayaran
-- ----------------------------
INSERT INTO `pembayaran` VALUES (12, 1, 1, 100000, 'lunas', '2019-10-02 17:18:21');
INSERT INTO `pembayaran` VALUES (13, 1, 1, 20000, 'kredit', '2019-07-03 15:20:33');
INSERT INTO `pembayaran` VALUES (14, 1, 1, 196000, 'lunas', '2019-10-08 01:58:06');

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
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pembelian_alat
-- ----------------------------
INSERT INTO `pembelian_alat` VALUES (5, 3, '1', 'fauzin', '2019-10-16', 8000, 8000, 'selesai', 'ok');
INSERT INTO `pembelian_alat` VALUES (6, 3, '6', '', '2019-10-16', 49000, 49000, 'selesai', 'ok');

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
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pembelian_bahan_mentah
-- ----------------------------
INSERT INTO `pembelian_bahan_mentah` VALUES (4, 3, 1, 'fauzin', '2019-10-16', '57000', '57000', 'selesai', 'ok');

-- ----------------------------
-- Table structure for pemberian_kaskeluar
-- ----------------------------
DROP TABLE IF EXISTS `pemberian_kaskeluar`;
CREATE TABLE `pemberian_kaskeluar`  (
  `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT,
  `id_bendahara` int(11) NOT NULL,
  `id_resto` int(11) NOT NULL,
  `tanggal` datetime(0) NOT NULL,
  `nominal_kas_keluar` int(100) NOT NULL,
  `status` enum('pengajuan','pemberian') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_pengeluaran`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pemberian_kaskeluar
-- ----------------------------
INSERT INTO `pemberian_kaskeluar` VALUES (1, 2, 1, '2019-06-26 00:00:00', 500000, 'pemberian');

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
  `status` enum('belum','kredit','lunas','produksi','siapsaji','selsai') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pemesanan
-- ----------------------------
INSERT INTO `pemesanan` VALUES (1, 'irhas', 4, 'sambel banyak tapi sedikit', '2019-10-02 10:34:01', 196000, 2, 'siapsaji');
INSERT INTO `pemesanan` VALUES (2, 'fauzin', 3, 'bumbu sedikit', '2019-09-29 11:09:54', 52000, 2, 'siapsaji');
INSERT INTO `pemesanan` VALUES (3, 'wahyu', 6, 'gelas besar', '2019-09-29 11:10:37', 3000, 2, 'siapsaji');

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
  `status` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pemesanan_menu
-- ----------------------------
INSERT INTO `pemesanan_menu` VALUES (11, 1, 1, 4, 40000, '');
INSERT INTO `pemesanan_menu` VALUES (12, 1, 4, 2, 6000, '');
INSERT INTO `pemesanan_menu` VALUES (13, 2, 2, 4, 32000, '');
INSERT INTO `pemesanan_menu` VALUES (14, 3, 4, 1, 3000, '');
INSERT INTO `pemesanan_menu` VALUES (16, 5, 1, 1, 10000, '');

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
  `status` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pemesanan_paket
-- ----------------------------
INSERT INTO `pemesanan_paket` VALUES (12, 1, 3, 5, 6000, '');
INSERT INTO `pemesanan_paket` VALUES (13, 2, 2, 1, 20000, '');
INSERT INTO `pemesanan_paket` VALUES (14, 4, 2, 1, 20000, '');
INSERT INTO `pemesanan_paket` VALUES (15, 5, 1, 1, 8000, '');

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
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pendapatan_kas_masuk
-- ----------------------------
INSERT INTO `pendapatan_kas_masuk` VALUES (2, 1, 1, '120000', '2019-08-02', '2019-07-02 00:00:00', '2019-07-31 00:00:00');
INSERT INTO `pendapatan_kas_masuk` VALUES (3, 1, 1, '12000000', '2019-08-02', '2019-07-02 00:00:00', '2019-07-31 00:00:00');
INSERT INTO `pendapatan_kas_masuk` VALUES (4, 2, 1, '9000000', '2019-08-22', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for pengeluaran_cabang_alat
-- ----------------------------
DROP TABLE IF EXISTS `pengeluaran_cabang_alat`;
CREATE TABLE `pengeluaran_cabang_alat`  (
  `id_pengeluaran_cabang` int(11) NOT NULL AUTO_INCREMENT,
  `id_resto` int(11) NOT NULL,
  `id_kanwil` int(11) NOT NULL,
  `id_alat` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `masa_pemanfatan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nominal` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nominal_penyusutan` int(11) NOT NULL,
  PRIMARY KEY (`id_pengeluaran_cabang`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pengeluaran_cabang_alat
-- ----------------------------
INSERT INTO `pengeluaran_cabang_alat` VALUES (1, 1, 1, 1, '2019-08-22', '2', '2 bulan', '10000', 10);
INSERT INTO `pengeluaran_cabang_alat` VALUES (4, 1, 1, 1, '2019-08-22', '2', '11 bulan', '10000', 10);
INSERT INTO `pengeluaran_cabang_alat` VALUES (5, 1, 1, 1, '2019-08-22', '1', '12 bulan', '1000', 10);
INSERT INTO `pengeluaran_cabang_alat` VALUES (6, 1, 1, 1, '2019-08-22', '1', '12 bulan', '10', 10);
INSERT INTO `pengeluaran_cabang_alat` VALUES (7, 1, 1, 1, '2019-08-22', '1', '11 bulan', '1000', 20);

-- ----------------------------
-- Table structure for pengeluaran_cabang_operasional
-- ----------------------------
DROP TABLE IF EXISTS `pengeluaran_cabang_operasional`;
CREATE TABLE `pengeluaran_cabang_operasional`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_resto` int(11) NOT NULL,
  `id_kanwil` int(11) NOT NULL,
  `id_kas` int(255) NULL DEFAULT NULL,
  `tanggal` date NOT NULL,
  `id_operasional` int(11) NOT NULL,
  `masa_sewa` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nominal` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pengeluaran_cabang_operasional
-- ----------------------------
INSERT INTO `pengeluaran_cabang_operasional` VALUES (1, 1, 1, 1, '2019-08-22', 1, '1 bulan', '5000');
INSERT INTO `pengeluaran_cabang_operasional` VALUES (2, 1, 1, 1, '2019-08-22', 1, '2 bulan', '90');

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
INSERT INTO `pengeluaran_kanwil_operasional` VALUES (1, 1, 1, '2019-08-22', '1 bulan', '5000');
INSERT INTO `pengeluaran_kanwil_operasional` VALUES (2, 1, 1, '2019-08-22', '1 bulan', '90');
INSERT INTO `pengeluaran_kanwil_operasional` VALUES (3, 1, 1, '2019-08-22', '1 bulan', '100');
INSERT INTO `pengeluaran_kanwil_operasional` VALUES (4, 1, 1, '2019-08-22', '1 bulan', '2000');

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
INSERT INTO `peralatan` VALUES (1, 3, 1, 'sendok', 'pcs', 29, 1);

-- ----------------------------
-- Table structure for permintaan_bahan
-- ----------------------------
DROP TABLE IF EXISTS `permintaan_bahan`;
CREATE TABLE `permintaan_bahan`  (
  `id_permintaan` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_resto_produksi_adminresto` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_user_kanwil_logistik` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_permintaan` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_permintaan` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_pengiriman` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_penerimaan` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_permintaan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 127 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of permintaan_bahan
-- ----------------------------
INSERT INTO `permintaan_bahan` VALUES (105, '3', '3', 'permintaan 1', '2019-07-31 04:05:39', '2019-07-31 04:06:20', '2019-07-31 04:08:19', 'diterima');
INSERT INTO `permintaan_bahan` VALUES (106, '3', '3', 'permintaan 10', '2019-07-31 19:52:43', '2019-07-31 19:53:23', '2019-07-31 20:36:02', 'diterima');
INSERT INTO `permintaan_bahan` VALUES (107, '3', '3', 'permintaan 2', '2019-07-31 23:54:40', '2019-07-31 23:55:19', '0000-00-00 00:00:00', 'proses pengiriman');
INSERT INTO `permintaan_bahan` VALUES (108, '3', '3', 'permintaan 6', '2019-08-03 21:09:10', '2019-08-03 21:10:02', '2019-08-03 21:10:59', 'diterima');
INSERT INTO `permintaan_bahan` VALUES (109, '3', '3', 'permintaan 5', '2019-08-03 23:19:44', '2019-08-03 23:21:43', '2019-08-03 23:22:11', 'diterima');
INSERT INTO `permintaan_bahan` VALUES (111, '3', '3', 'permintaan 11', '2019-08-08 22:14:38', '2019-08-08 22:15:05', '2019-08-08 22:19:26', 'diterima');
INSERT INTO `permintaan_bahan` VALUES (121, '3', '3', 'permintaan 22', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'draft');
INSERT INTO `permintaan_bahan` VALUES (123, '3', '3', 'permintaan 25', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'draft');
INSERT INTO `permintaan_bahan` VALUES (125, '4', '3', 'permintaan1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'draft');
INSERT INTO `permintaan_bahan` VALUES (126, '3', '3', 'permintaan 2', '2019-09-29 12:27:46', '2019-09-29 12:28:11', '2019-09-29 12:28:31', 'diterima');

-- ----------------------------
-- Table structure for permintaan_bahan_detail
-- ----------------------------
DROP TABLE IF EXISTS `permintaan_bahan_detail`;
CREATE TABLE `permintaan_bahan_detail`  (
  `id_detail_permintaan` int(15) NOT NULL AUTO_INCREMENT,
  `id_permintaan` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_bahan_mentah` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jumlah_permintaan` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `satuan_harga_per_satuan_bahan` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status_penerimaan` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_detail_permintaan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 44 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of permintaan_bahan_detail
-- ----------------------------
INSERT INTO `permintaan_bahan_detail` VALUES (32, '105', '1', '19', '20000', 'sesuai');
INSERT INTO `permintaan_bahan_detail` VALUES (33, '105', '2', '80', '50000', 'tidak sesuai');
INSERT INTO `permintaan_bahan_detail` VALUES (34, '106', '1', '90', '7000', 'tidak sesuai');
INSERT INTO `permintaan_bahan_detail` VALUES (35, '106', '2', '70', '20000', 'sesuai');
INSERT INTO `permintaan_bahan_detail` VALUES (36, '107', '1', '80', '20000', 'tidak sesuai');
INSERT INTO `permintaan_bahan_detail` VALUES (38, '107', '2', '20', '1000', 'sesuai');
INSERT INTO `permintaan_bahan_detail` VALUES (39, '108', '1', '90', '200', 'sesuai');
INSERT INTO `permintaan_bahan_detail` VALUES (40, '108', '2', '20', '10000', 'tidak sesuai');
INSERT INTO `permintaan_bahan_detail` VALUES (41, '109', '1', '20', '20000', 'sesuai');
INSERT INTO `permintaan_bahan_detail` VALUES (42, '109', '2', '50', '1000', 'tidak sesuai');
INSERT INTO `permintaan_bahan_detail` VALUES (43, '126', '2', '2', '9000', 'tidak sesuai');

-- ----------------------------
-- Table structure for permintaan_bahan_tidak_sesuai
-- ----------------------------
DROP TABLE IF EXISTS `permintaan_bahan_tidak_sesuai`;
CREATE TABLE `permintaan_bahan_tidak_sesuai`  (
  `id_permintaan_bahan_tidak_sesuai` int(50) NOT NULL AUTO_INCREMENT,
  `id_detail_permintaan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jumlah_bahan_terkirim` int(11) NOT NULL,
  `selisih_bahan` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_permintaan_bahan_tidak_sesuai`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of permintaan_bahan_tidak_sesuai
-- ----------------------------
INSERT INTO `permintaan_bahan_tidak_sesuai` VALUES (12, '33', 70, '10');
INSERT INTO `permintaan_bahan_tidak_sesuai` VALUES (15, '34', 80, '10');
INSERT INTO `permintaan_bahan_tidak_sesuai` VALUES (16, '36', 70, '10');
INSERT INTO `permintaan_bahan_tidak_sesuai` VALUES (17, '40', 10, '10');
INSERT INTO `permintaan_bahan_tidak_sesuai` VALUES (18, '42', 90, '40');
INSERT INTO `permintaan_bahan_tidak_sesuai` VALUES (19, '43', 1, '1');

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
  `id_bahan_mentah` int(11) NOT NULL,
  `id_bahan_olahan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of produksi_bahan_olahan
-- ----------------------------
INSERT INTO `produksi_bahan_olahan` VALUES (2, 1, 1, 1, '2019-10-09');
INSERT INTO `produksi_bahan_olahan` VALUES (3, 1, 1, 1, '2019-10-09');
INSERT INTO `produksi_bahan_olahan` VALUES (4, 1, 1, 1, '2019-10-09');
INSERT INTO `produksi_bahan_olahan` VALUES (5, 1, 1, 1, NULL);

-- ----------------------------
-- Table structure for produksi_masakan
-- ----------------------------
DROP TABLE IF EXISTS `produksi_masakan`;
CREATE TABLE `produksi_masakan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_masakan` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of produksi_masakan
-- ----------------------------
INSERT INTO `produksi_masakan` VALUES (1, 1, '2019-10-10', 10);
INSERT INTO `produksi_masakan` VALUES (2, 2, '2019-10-14', 1);

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
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of resto
-- ----------------------------
INSERT INTO `resto` VALUES (1, 1, 'resto farma', 'blabak', '085376372');

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
INSERT INTO `stok_bahan_mentah_produksi` VALUES (1, 1, 1);
INSERT INTO `stok_bahan_mentah_produksi` VALUES (2, 2, 1);
INSERT INTO `stok_bahan_mentah_produksi` VALUES (3, 3, 10);

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
INSERT INTO `stok_bahan_olahan_produksi` VALUES (1, 1, 2);
INSERT INTO `stok_bahan_olahan_produksi` VALUES (2, 2, 1);

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
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user_kanwil
-- ----------------------------
INSERT INTO `user_kanwil` VALUES (1, 1, 1, 'indah', 'indah', 'indah', 'ngronggo', '2222222', 'indah@gmail.com', '2019-05-08 00:42:08', '2019-05-08 00:42:08', 'general manajer');
INSERT INTO `user_kanwil` VALUES (2, 1, 1, 'tria', 'tria', 'tria', 'ngronggo', '12121212', 'tria@gmail.com', '2019-05-08 00:42:08', '2019-05-08 00:42:08', 'bendahara');
INSERT INTO `user_kanwil` VALUES (3, 1, 1, 'wiwin', 'wiwin', 'wiwin', 'ngronggo', '098336366363', 'wiwin@gmail.com', '2019-05-08 00:42:08', '2019-05-08 00:42:08', 'logistik');

-- ----------------------------
-- Table structure for user_resto
-- ----------------------------
DROP TABLE IF EXISTS `user_resto`;
CREATE TABLE `user_resto`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kanwil` int(11) NOT NULL,
  `id_resto` int(11) NOT NULL,
  `user` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pass` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `telp` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jenis` enum('admin resto','kasir','waiters','produksi') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user_resto
-- ----------------------------
INSERT INTO `user_resto` VALUES (1, 1, 1, 'debi', 'debi', 'debi', 'nganjuk', '085646898767', 'kasir');
INSERT INTO `user_resto` VALUES (2, 1, 1, 'wahyu', 'wahyu', 'wahyu', 'mojoroto', '085646898767', 'waiters');
INSERT INTO `user_resto` VALUES (3, 1, 1, 'fauzin', 'fauzin', 'fauzin', 'gampengrejo', '085646898767', 'produksi');
INSERT INTO `user_resto` VALUES (4, 1, 1, 'rifangi', 'rifangi', 'rifangi', 'nganjuk', '085646898767', 'admin resto');

SET FOREIGN_KEY_CHECKS = 1;
