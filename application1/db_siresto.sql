# Host: localhost  (Version 5.5.5-10.1.31-MariaDB)
# Date: 2019-09-23 22:00:54
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "bahan_jadi"
#

DROP TABLE IF EXISTS `bahan_jadi`;
CREATE TABLE `bahan_jadi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_masakan` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `porsi` varchar(100) NOT NULL,
  `status` enum('on','off') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "bahan_jadi"
#

INSERT INTO `bahan_jadi` VALUES (1,'Sambal Tomat',8,'mangkuk sambel 2MIli','off'),(3,'Ayam Geprek',1,'satu porsi','on');

#
# Structure for table "bahan_mentah"
#

DROP TABLE IF EXISTS `bahan_mentah`;
CREATE TABLE `bahan_mentah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_resto` varchar(12) NOT NULL,
  `id_logistik` int(11) NOT NULL,
  `nama_bahan` varchar(100) NOT NULL,
  `satuan_besar` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Data for table "bahan_mentah"
#

INSERT INTO `bahan_mentah` VALUES (1,'2',1,'ayam kampung','ekor'),(2,'1',1,'tomat','kg');

#
# Structure for table "biaya_lain"
#

DROP TABLE IF EXISTS `biaya_lain`;
CREATE TABLE `biaya_lain` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_resto` int(11) NOT NULL,
  `nama_biaya_lain` varchar(10) NOT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Data for table "biaya_lain"
#

INSERT INTO `biaya_lain` VALUES (1,1,'brosur',10000),(2,1,'zakat',11000);

#
# Structure for table "daftar_masakan"
#

DROP TABLE IF EXISTS `daftar_masakan`;
CREATE TABLE `daftar_masakan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_bahan_jadi` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

#
# Data for table "daftar_masakan"
#

INSERT INTO `daftar_masakan` VALUES (6,1,1,'3',1,9000),(7,2,1,'1',1,6000),(8,1,2,'3',1,800);

#
# Structure for table "detail_paket"
#

DROP TABLE IF EXISTS `detail_paket`;
CREATE TABLE `detail_paket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_paket` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` varchar(100) NOT NULL,
  `diskon` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

#
# Data for table "detail_paket"
#

INSERT INTO `detail_paket` VALUES (8,1,2,1,'80000','');

#
# Structure for table "detil_bahan_jadi"
#

DROP TABLE IF EXISTS `detil_bahan_jadi`;
CREATE TABLE `detil_bahan_jadi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_bahan_jadi` int(11) NOT NULL,
  `id_detil_bahan_mentah` int(199) NOT NULL,
  `jumlah_bahan_olahan` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Data for table "detil_bahan_jadi"
#

INSERT INTO `detil_bahan_jadi` VALUES (1,1,2,2),(2,3,1,2);

#
# Structure for table "detil_bahan_mentah"
#

DROP TABLE IF EXISTS `detil_bahan_mentah`;
CREATE TABLE `detil_bahan_mentah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_bahan_mentah` int(11) NOT NULL,
  `satuan_kecil` varchar(199) NOT NULL,
  `stok` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "detil_bahan_mentah"
#

INSERT INTO `detil_bahan_mentah` VALUES (1,1,'paha',2),(2,2,'biji',50),(3,1,'dada',2);

#
# Structure for table "gaji"
#

DROP TABLE IF EXISTS `gaji`;
CREATE TABLE `gaji` (
  `id` int(11) NOT NULL,
  `id_resto` int(11) NOT NULL,
  `id_user_resto` int(11) NOT NULL,
  `bulan_awal` datetime NOT NULL,
  `bulan_akhir` datetime NOT NULL,
  `jenis_gaji` enum('bulanan','THR','bonus','pesangon') NOT NULL,
  `jumlah_gaji` int(11) NOT NULL,
  `total_gaji` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "gaji"
#


#
# Structure for table "insentif"
#

DROP TABLE IF EXISTS `insentif`;
CREATE TABLE `insentif` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_resto` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_orderan` int(11) NOT NULL,
  `jumlah_insentif` int(11) NOT NULL,
  `id_gaji` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "insentif"
#


#
# Structure for table "investasi_kanwil"
#

DROP TABLE IF EXISTS `investasi_kanwil`;
CREATE TABLE `investasi_kanwil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_super_admin` int(11) NOT NULL,
  `id_kanwil` int(11) NOT NULL,
  `id_investasi_owner` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nominal_investasi` int(11) NOT NULL,
  `penyusutan` int(11) NOT NULL,
  `nominal_saldo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "investasi_kanwil"
#

INSERT INTO `investasi_kanwil` VALUES (1,1,1,1,'0000-00-00',3000000,20,1000);

#
# Structure for table "investasi_owner"
#

DROP TABLE IF EXISTS `investasi_owner`;
CREATE TABLE `investasi_owner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_super_admin` int(11) NOT NULL,
  `id_owner` int(11) NOT NULL,
  `id_bendahara` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_investasi` int(11) NOT NULL,
  `jangka_waktu` varchar(11) NOT NULL,
  `persentase_omset` int(11) NOT NULL,
  `jumlah_omset` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

#
# Data for table "investasi_owner"
#

INSERT INTO `investasi_owner` VALUES (1,1,1,2,'0000-00-00',1000000,'2 bulan',20,NULL);

#
# Structure for table "jenis_masakan"
#

DROP TABLE IF EXISTS `jenis_masakan`;
CREATE TABLE `jenis_masakan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "jenis_masakan"
#

INSERT INTO `jenis_masakan` VALUES (1,'makanan'),(2,'minuman'),(3,'pelegkap');

#
# Structure for table "kanwil"
#

DROP TABLE IF EXISTS `kanwil`;
CREATE TABLE `kanwil` (
  `id_kanwil` int(11) NOT NULL AUTO_INCREMENT,
  `alamat_kantor` varchar(100) NOT NULL,
  `telp` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kanwil`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "kanwil"
#

INSERT INTO `kanwil` VALUES (1,'ngronggo','0856464646');

#
# Structure for table "logistik"
#

DROP TABLE IF EXISTS `logistik`;
CREATE TABLE `logistik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_bahan` int(11) NOT NULL,
  `id_peralatan` int(11) NOT NULL,
  `id_user_kanwil` int(11) NOT NULL,
  `id_resto` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "logistik"
#


#
# Structure for table "meja"
#

DROP TABLE IF EXISTS `meja`;
CREATE TABLE `meja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `panel` int(11) NOT NULL,
  `nomor` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

#
# Data for table "meja"
#

INSERT INTO `meja` VALUES (1,1,1),(2,1,2),(3,2,3),(4,2,4),(5,3,5),(6,3,6),(7,4,7);

#
# Structure for table "menu"
#

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_resto` int(11) NOT NULL,
  `menu` varchar(500) NOT NULL,
  `foto` varchar(500) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` enum('tersedia','habis') NOT NULL,
  `stok` int(11) NOT NULL,
  `mode` enum('insert','draft') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Data for table "menu"
#

INSERT INTO `menu` VALUES (1,1,'Ayam Geprek','nasibebek.jpg',10000,'tersedia',-1,'insert'),(2,1,'Jamur Kripsi','gepreksai.jpg',8000,'tersedia',-1,'insert'),(3,1,'Es Teh Anget','',2000,'tersedia',-1,'insert'),(4,1,'Kopi Susu','',3000,'tersedia',6,'insert'),(5,1,'Nasi Goreng','',6000,'habis',5,'insert');

#
# Structure for table "omset_investasi"
#

DROP TABLE IF EXISTS `omset_investasi`;
CREATE TABLE `omset_investasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_investasi_owner` int(11) NOT NULL,
  `id_super_admin` int(11) NOT NULL,
  `id_pendapatan` int(11) NOT NULL,
  `jumlah_omset_pendapatan` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "omset_investasi"
#

INSERT INTO `omset_investasi` VALUES (1,1,1,1,200);

#
# Structure for table "operasional"
#

DROP TABLE IF EXISTS `operasional`;
CREATE TABLE `operasional` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pengeluaran` varchar(11) NOT NULL,
  `lama_sewa` varchar(11) NOT NULL,
  `harga_sewa` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Data for table "operasional"
#

INSERT INTO `operasional` VALUES (1,'listrik','1 bulan','50000'),(2,'kodomo','12','4');

#
# Structure for table "owner"
#

DROP TABLE IF EXISTS `owner`;
CREATE TABLE `owner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_super_admin` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `user` varchar(12) NOT NULL,
  `pass` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `saldo_rek` varchar(500) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "owner"
#

INSERT INTO `owner` VALUES (1,1,'fauzin','fauzin','fauzin','sambirejo','123456','fauzin@gmail.com','0','2019-05-08 00:37:00','2019-05-08 00:37:00');

#
# Structure for table "paket"
#

DROP TABLE IF EXISTS `paket`;
CREATE TABLE `paket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_resto` int(11) NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` enum('tersedia','habis') NOT NULL,
  `foto` varchar(500) NOT NULL,
  `harga` varchar(500) NOT NULL,
  `mode` enum('insert','draft') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "paket"
#

INSERT INTO `paket` VALUES (1,1,'Paket Bom',1,'tersedia','gepreksai3.jpg','8000','insert'),(2,1,'Paket Granat',-1,'tersedia','','20000','insert'),(3,1,'Paket Setan',-5,'tersedia','','30000','insert');

#
# Structure for table "pembayaran"
#

DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_kasir` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `status` enum('kredit','lunas') NOT NULL,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

#
# Data for table "pembayaran"
#

INSERT INTO `pembayaran` VALUES (12,1,1,100000,'kredit','2019-07-02 17:18:21'),(13,1,1,20000,'kredit','2019-07-03 15:20:33');

#
# Structure for table "pemberian_kaskeluar"
#

DROP TABLE IF EXISTS `pemberian_kaskeluar`;
CREATE TABLE `pemberian_kaskeluar` (
  `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT,
  `id_bendahara` int(11) NOT NULL,
  `id_resto` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `nominal_kas_keluar` int(100) NOT NULL,
  `status` enum('pengajuan','pemberian') NOT NULL,
  PRIMARY KEY (`id_pengeluaran`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "pemberian_kaskeluar"
#

INSERT INTO `pemberian_kaskeluar` VALUES (1,2,1,'2019-06-26 00:00:00',500000,'pemberian');

#
# Structure for table "pemesanan"
#

DROP TABLE IF EXISTS `pemesanan`;
CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pemesan` varchar(500) NOT NULL,
  `no_meja` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `total_harga` int(11) NOT NULL,
  `id_user_resto` int(11) NOT NULL,
  `status` enum('belum','kredit','lunas','produksi','siapsaji') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

#
# Data for table "pemesanan"
#

INSERT INTO `pemesanan` VALUES (1,'Jdjdj',1,'2019-08-05 21:07:18',33000,2,'produksi'),(2,'Hshsh',1,'2019-08-07 20:43:21',0,2,'produksi'),(3,'Ir',1,'2019-08-07 20:45:45',70000,2,'produksi'),(4,'',2,'2019-08-07 21:19:41',0,2,'produksi'),(5,'',1,'2019-08-07 21:19:44',0,2,'produksi'),(6,'',1,'2019-08-07 21:19:58',33000,2,'produksi');

#
# Structure for table "pemesanan_menu"
#

DROP TABLE IF EXISTS `pemesanan_menu`;
CREATE TABLE `pemesanan_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemesanan` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah_pesan` int(11) NOT NULL,
  `subharga` int(11) NOT NULL,
  `status` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

#
# Data for table "pemesanan_menu"
#

INSERT INTO `pemesanan_menu` VALUES (5,1,4,1,3000,'siap saji'),(6,3,1,1,10000,'siap saji'),(7,3,2,1,8000,'siap saji'),(8,3,3,1,2000,'siap saji'),(9,6,4,1,3000,'');

#
# Structure for table "pemesanan_paket"
#

DROP TABLE IF EXISTS `pemesanan_paket`;
CREATE TABLE `pemesanan_paket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemesanan` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `jumlah_pesan` int(11) NOT NULL,
  `subharga` int(11) NOT NULL,
  `status` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

#
# Data for table "pemesanan_paket"
#

INSERT INTO `pemesanan_paket` VALUES (5,1,3,1,30000,'siap saji'),(7,3,3,1,30000,''),(8,3,2,1,20000,'siap saji'),(9,6,3,1,30000,'');

#
# Structure for table "pendapatan_kas_masuk"
#

DROP TABLE IF EXISTS `pendapatan_kas_masuk`;
CREATE TABLE `pendapatan_kas_masuk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_bendahara` int(11) NOT NULL,
  `id_user_kasir` int(11) NOT NULL,
  `jumlah_setoran` varchar(100) NOT NULL,
  `tanggal` date NOT NULL DEFAULT '0000-00-00',
  `tanggal_awal` datetime NOT NULL,
  `tanggal_akhir` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Data for table "pendapatan_kas_masuk"
#

INSERT INTO `pendapatan_kas_masuk` VALUES (2,1,1,'120000','2019-08-02','2019-07-02 00:00:00','2019-07-31 00:00:00'),(3,1,1,'12000000','2019-08-02','2019-07-02 00:00:00','2019-07-31 00:00:00'),(4,2,1,'9000000','2019-08-22','0000-00-00 00:00:00','0000-00-00 00:00:00');

#
# Structure for table "pengeluaran_cabang_alat"
#

DROP TABLE IF EXISTS `pengeluaran_cabang_alat`;
CREATE TABLE `pengeluaran_cabang_alat` (
  `id_pengeluaran_cabang` int(11) NOT NULL AUTO_INCREMENT,
  `id_resto` int(11) NOT NULL,
  `id_kanwil` int(11) NOT NULL,
  `id_alat` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `masa_pemanfatan` varchar(100) NOT NULL,
  `nominal` varchar(100) NOT NULL,
  `nominal_penyusutan` int(11) NOT NULL,
  PRIMARY KEY (`id_pengeluaran_cabang`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

#
# Data for table "pengeluaran_cabang_alat"
#

INSERT INTO `pengeluaran_cabang_alat` VALUES (1,1,1,1,'2019-08-22','2','2 bulan','10000',10),(4,1,1,1,'2019-08-22','2','11 bulan','10000',10),(5,1,1,1,'2019-08-22','1','12 bulan','1000',10),(6,1,1,1,'2019-08-22','1','12 bulan','10',10),(7,1,1,1,'2019-08-22','1','11 bulan','1000',20);

#
# Structure for table "pengeluaran_cabang_operasional"
#

DROP TABLE IF EXISTS `pengeluaran_cabang_operasional`;
CREATE TABLE `pengeluaran_cabang_operasional` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_resto` int(11) NOT NULL,
  `id_kanwil` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_operasional` int(11) NOT NULL,
  `nominal` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Data for table "pengeluaran_cabang_operasional"
#

INSERT INTO `pengeluaran_cabang_operasional` VALUES (1,1,1,'2019-08-22',1,'5000'),(2,1,1,'2019-08-22',1,'90');

#
# Structure for table "pengeluaran_kanwil_operasional"
#

DROP TABLE IF EXISTS `pengeluaran_kanwil_operasional`;
CREATE TABLE `pengeluaran_kanwil_operasional` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kanwil` int(11) NOT NULL,
  `id_operasional` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nominal` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Data for table "pengeluaran_kanwil_operasional"
#

INSERT INTO `pengeluaran_kanwil_operasional` VALUES (1,1,1,'2019-08-22','5000'),(2,1,1,'2019-08-22','90'),(3,1,1,'2019-08-22','100'),(4,1,1,'2019-08-22','2000');

#
# Structure for table "peralatan"
#

DROP TABLE IF EXISTS `peralatan`;
CREATE TABLE `peralatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_resto` int(11) NOT NULL,
  `nama_peralatan` varchar(100) NOT NULL,
  `jumlah_stok` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "peralatan"
#

INSERT INTO `peralatan` VALUES (1,1,'sendok',10,5000);

#
# Structure for table "permintaan_bahan"
#

DROP TABLE IF EXISTS `permintaan_bahan`;
CREATE TABLE `permintaan_bahan` (
  `id_permintaan` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_resto_produksi` varchar(30) NOT NULL,
  `id_user_kanwil_logistik` varchar(20) NOT NULL,
  `nama_permintaan` varchar(20) NOT NULL,
  `tanggal_permintaan` varchar(20) NOT NULL,
  `tanggal_pengiriman` varchar(20) NOT NULL,
  `tanggal_penerimaan` varchar(20) NOT NULL,
  `status` varchar(25) NOT NULL,
  PRIMARY KEY (`id_permintaan`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=latin1;

#
# Data for table "permintaan_bahan"
#

INSERT INTO `permintaan_bahan` VALUES (105,'3','3','permintaan 1','2019-07-31 04:05:39','2019-07-31 04:06:20','2019-07-31 04:08:19','diterima'),(106,'3','3','permintaan 10','2019-07-31 19:52:43','2019-07-31 19:53:23','2019-07-31 20:36:02','diterima'),(107,'3','3','permintaan 2','2019-07-31 23:54:40','2019-07-31 23:55:19','0000-00-00 00:00:00','proses pengiriman'),(108,'3','3','permintaan 6','2019-08-03 21:09:10','2019-08-03 21:10:02','2019-08-03 21:10:59','diterima'),(109,'3','3','permintaan 5','2019-08-03 23:19:44','2019-08-03 23:21:43','2019-08-03 23:22:11','diterima'),(111,'3','3','permintaan 11','2019-08-08 22:14:38','2019-08-08 22:15:05','2019-08-08 22:19:26','diterima'),(121,'3','3','permintaan 22','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','draft'),(122,'3','3','','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','draft'),(123,'3','3','permintaan 25','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','draft');

#
# Structure for table "permintaan_bahan_detail"
#

DROP TABLE IF EXISTS `permintaan_bahan_detail`;
CREATE TABLE `permintaan_bahan_detail` (
  `id_detail_permintaan` int(15) NOT NULL AUTO_INCREMENT,
  `id_permintaan` varchar(15) NOT NULL,
  `id_bahan_mentah` varchar(15) NOT NULL,
  `jumlah_permintaan` varchar(15) NOT NULL,
  `satuan_harga_per_satuan_bahan` varchar(15) NOT NULL,
  `status_penerimaan` varchar(20) NOT NULL,
  PRIMARY KEY (`id_detail_permintaan`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

#
# Data for table "permintaan_bahan_detail"
#

INSERT INTO `permintaan_bahan_detail` VALUES (32,'105','1','19','20000','sesuai'),(33,'105','2','80','50000','tidak sesuai'),(34,'106','1','90','7000','tidak sesuai'),(35,'106','2','70','20000','sesuai'),(36,'107','1','80','20000','tidak sesuai'),(38,'107','2','20','1000','sesuai'),(39,'108','1','90','200','sesuai'),(40,'108','2','20','10000','tidak sesuai'),(41,'109','1','20','20000','sesuai'),(42,'109','2','50','1000','tidak sesuai');

#
# Structure for table "permintaan_bahan_tidak_sesuai"
#

DROP TABLE IF EXISTS `permintaan_bahan_tidak_sesuai`;
CREATE TABLE `permintaan_bahan_tidak_sesuai` (
  `id_permintaan_bahan_tidak_sesuai` int(50) NOT NULL AUTO_INCREMENT,
  `id_detail_permintaan` varchar(50) NOT NULL,
  `jumlah_bahan_terkirim` int(11) NOT NULL,
  `selisih_bahan` varchar(20) NOT NULL,
  PRIMARY KEY (`id_permintaan_bahan_tidak_sesuai`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

#
# Data for table "permintaan_bahan_tidak_sesuai"
#

INSERT INTO `permintaan_bahan_tidak_sesuai` VALUES (12,'33',70,'10'),(15,'34',80,'10'),(16,'36',70,'10'),(17,'40',10,'10'),(18,'42',90,'40');

#
# Structure for table "produksi"
#

DROP TABLE IF EXISTS `produksi`;
CREATE TABLE `produksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu_masakan` int(11) NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "produksi"
#


#
# Structure for table "resto"
#

DROP TABLE IF EXISTS `resto`;
CREATE TABLE `resto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kanwil` int(11) NOT NULL,
  `nama_resto` varchar(11) NOT NULL,
  `alamat` varchar(11) NOT NULL,
  `no_telp` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "resto"
#

INSERT INTO `resto` VALUES (1,1,'resto farma','blabak','085376372');

#
# Structure for table "superadmin"
#

DROP TABLE IF EXISTS `superadmin`;
CREATE TABLE `superadmin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `user` varchar(12) NOT NULL,
  `pass` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "superadmin"
#

INSERT INTO `superadmin` VALUES (1,'dedy ardiansyah','dedi','dedi','blitar','08546464664','dedi@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00');

#
# Structure for table "tbl_pengeluaran_kebutuhan"
#

DROP TABLE IF EXISTS `tbl_pengeluaran_kebutuhan`;
CREATE TABLE `tbl_pengeluaran_kebutuhan` (
  `id_pengeluaran_kebutuhan` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(300) DEFAULT NULL,
  `nominal_pengeluaran_kebutuhan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pengeluaran_kebutuhan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "tbl_pengeluaran_kebutuhan"
#

INSERT INTO `tbl_pengeluaran_kebutuhan` VALUES (2,'Bahan Bakar Masak',100000),(3,'Transportasi',200000);

#
# Structure for table "user_kanwil"
#

DROP TABLE IF EXISTS `user_kanwil`;
CREATE TABLE `user_kanwil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_super_admin` int(11) NOT NULL,
  `id_kanwil` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `user` varchar(12) NOT NULL,
  `pass` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tipe` enum('general manajer','bendahara','logistik') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "user_kanwil"
#

INSERT INTO `user_kanwil` VALUES (1,1,1,'indah','indah','indah','ngronggo','2222222','indah@gmail.com','2019-05-08 00:42:08','2019-05-08 00:42:08','general manajer'),(2,1,1,'tria','tria','tria','ngronggo','12121212','tria@gmail.com','2019-05-08 00:42:08','2019-05-08 00:42:08','bendahara'),(3,1,1,'wiwin','wiwin','wiwin','ngronggo','098336366363','wiwin@gmail.com','2019-05-08 00:42:08','2019-05-08 00:42:08','logistik');

#
# Structure for table "user_resto"
#

DROP TABLE IF EXISTS `user_resto`;
CREATE TABLE `user_resto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kanwil` int(11) NOT NULL,
  `id_resto` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `telp` varchar(12) NOT NULL,
  `jenis` enum('admin resto','kasir','waiters','produksi') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Data for table "user_resto"
#

INSERT INTO `user_resto` VALUES (1,1,1,'debi','debi','debi','nganjuk','085646898767','kasir'),(2,1,1,'wahyu','wahyu','wahyu','mojoroto','085646898767','waiters'),(3,1,1,'fauzin','fauzin','fauzin','gampengrejo','085646898767','produksi'),(4,1,1,'rifangi','rifangi','rifangi','nganjuk','085646898767','admin resto');
