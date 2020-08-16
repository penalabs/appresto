/*
SQLyog Ultimate v10.42 
MySQL - 5.5.5-10.4.11-MariaDB : Database - db_siresto
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_siresto` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_siresto`;

/*Table structure for table `bahan_jadi` */

DROP TABLE IF EXISTS `bahan_jadi`;

CREATE TABLE `bahan_jadi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_masakan` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `porsi` varchar(100) NOT NULL,
  `status` enum('on','off') NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*Data for the table `bahan_jadi` */

insert  into `bahan_jadi`(`id`,`nama_masakan`,`jumlah`,`porsi`,`status`) values (1,'Sambal Tomat',8,'mangkuk sambel 2MIli','off'),(3,'Ayam Geprek',1,'satu porsi','on');

/*Table structure for table `bahan_mentah` */

DROP TABLE IF EXISTS `bahan_mentah`;

CREATE TABLE `bahan_mentah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_resto` varchar(12) NOT NULL,
  `id_logistik` int(11) NOT NULL,
  `nama_bahan` varchar(100) NOT NULL,
  `satuan_besar` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL,
  `status` int(255) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `bahan_mentah` */

insert  into `bahan_mentah`(`id`,`id_resto`,`id_logistik`,`nama_bahan`,`satuan_besar`,`stok`,`status`) values (1,'1',34,'ayam kampung','ekor',21,1),(2,'1',34,'tomat','kg',8,1),(3,'1',34,'tepung','kg',6,0);

/*Table structure for table `bahan_mentah_masakan` */

DROP TABLE IF EXISTS `bahan_mentah_masakan`;

CREATE TABLE `bahan_mentah_masakan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produksi_masakan` int(11) NOT NULL,
  `id_bahan_mentah` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `bahan_mentah_masakan` */

insert  into `bahan_mentah_masakan`(`id`,`id_produksi_masakan`,`id_bahan_mentah`,`jumlah`) values (1,1,1,1),(2,2,3,1);

/*Table structure for table `bahan_olahan` */

DROP TABLE IF EXISTS `bahan_olahan`;

CREATE TABLE `bahan_olahan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_logistik` int(11) NOT NULL,
  `nama_bahan` varchar(100) NOT NULL,
  `satuan_kecil` varchar(199) NOT NULL,
  `stok` int(11) NOT NULL,
  `status` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `bahan_olahan` */

insert  into `bahan_olahan`(`id`,`id_logistik`,`nama_bahan`,`satuan_kecil`,`stok`,`status`) values (1,34,'ayam kampung paha','buah',3,1),(3,34,'ayam kampung dada','buah',0,1);

/*Table structure for table `bahan_olahan_masakan` */

DROP TABLE IF EXISTS `bahan_olahan_masakan`;

CREATE TABLE `bahan_olahan_masakan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produksi_masakan` int(11) NOT NULL,
  `id_bahan_olahan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `bahan_olahan_masakan` */

insert  into `bahan_olahan_masakan`(`id`,`id_produksi_masakan`,`id_bahan_olahan`,`jumlah`) values (4,2,1,1),(5,1,1,1);

/*Table structure for table `biaya_lain` */

DROP TABLE IF EXISTS `biaya_lain`;

CREATE TABLE `biaya_lain` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_resto` int(11) NOT NULL,
  `nama_biaya_lain` varchar(10) NOT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `biaya_lain` */

insert  into `biaya_lain`(`id`,`id_resto`,`nama_biaya_lain`,`jumlah`) values (1,1,'brosur',10000),(2,1,'zakat',11000);

/*Table structure for table `daftar_masakan` */

DROP TABLE IF EXISTS `daftar_masakan`;

CREATE TABLE `daftar_masakan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_bahan_oalahan` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `daftar_masakan` */

insert  into `daftar_masakan`(`id`,`id_bahan_oalahan`,`id_menu`,`jenis`,`jumlah`) values (6,1,1,'3',1),(7,2,1,'1',1);

/*Table structure for table `detail_kas` */

DROP TABLE IF EXISTS `detail_kas`;

CREATE TABLE `detail_kas` (
  `id_kas` int(11) NOT NULL AUTO_INCREMENT,
  `id_ref_kas` int(11) DEFAULT NULL,
  `jenis_kas` enum('kas induk','kas cabang','kas operasional') DEFAULT NULL,
  `tipe_kas` enum('Masuk','Keluar') DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_superadmin` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_resto` int(11) DEFAULT NULL,
  `nominal` int(20) DEFAULT NULL,
  `tipe_user` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_kas`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*Data for the table `detail_kas` */

insert  into `detail_kas`(`id_kas`,`id_ref_kas`,`jenis_kas`,`tipe_kas`,`tanggal`,`id_superadmin`,`id_user`,`id_resto`,`nominal`,`tipe_user`) values (6,1,'kas induk','Masuk',NULL,1,32,1,10000000,NULL),(7,1,'kas cabang','Masuk',NULL,1,32,1,2000000,NULL),(8,1,'kas operasional','Masuk',NULL,1,32,1,1000000,NULL),(9,2,'kas induk','Keluar',NULL,1,32,1,2000000,NULL),(10,2,'kas cabang','Keluar',NULL,1,32,1,1000000,NULL),(15,15,'kas induk','Keluar',NULL,1,NULL,NULL,NULL,NULL),(16,16,'kas induk','Keluar',NULL,1,34,NULL,120000,'Pemberlian Alat'),(17,17,'kas induk','Keluar','2020-04-03',1,34,NULL,30000,'Pembelian Alat'),(18,8,'kas induk','Keluar','2020-04-03',1,34,NULL,1000000,'Pembelian Bahan Mentah'),(19,10,'kas induk','Masuk','0000-00-00',1,32,NULL,0,'Investasi Owner'),(20,11,'kas induk','Masuk','2020-04-03',1,32,NULL,10000,'Investasi Owner'),(21,9,'kas induk','Keluar','2020-04-03',1,22,4,900000,'Gaji Karyawan'),(24,18,'kas induk','Masuk','2020-04-03',1,32,4,50000,'Pengembalian dari Cabang'),(26,20,'kas induk','Keluar','0000-00-00',1,32,4,0,'Mutasi Ke Cabang'),(27,21,'kas induk','Keluar','2020-04-03',1,32,4,1000000,'Mutasi Ke Cabang'),(28,35,'kas cabang','Masuk','2020-04-03',1,22,NULL,500000,'Setor dari Cabang'),(29,22,'kas induk','Keluar','2020-04-03',1,32,4,50000,'Mutasi Ke Cabang'),(30,22,'kas induk','Masuk','2020-04-03',1,32,4,50000,'Mutasi Dari Induk'),(35,25,'kas induk','Keluar','2020-04-03',1,32,4,50000,'Mutasi Ke Cabang'),(36,25,'kas cabang','Masuk','2020-04-03',1,32,4,50000,'Mutasi Dari Induk'),(37,36,'kas induk','Masuk','2020-04-03',1,22,NULL,100000,'Setoran dari Cabang'),(38,36,'kas cabang','Keluar','2020-04-03',1,22,NULL,100000,'Setoran ke Induk'),(39,6,'kas cabang','Keluar','2020-04-03',1,4,1,500000,'Mutasi Ke Operasional'),(40,6,'kas operasional','Masuk','2020-04-03',1,4,1,500000,'Mutasi Dari Cabang'),(41,8,'kas cabang','Keluar','0000-00-00',1,7,NULL,0,'Operasional Kanwil'),(42,9,'kas cabang','Keluar','2020-04-03',1,7,NULL,100000,'Operasional Kanwil'),(43,35,'kas cabang','Masuk','2020-04-03',1,25,NULL,100000,'Setoran dari Kasir'),(44,36,'kas cabang','Masuk','2020-04-03',1,22,NULL,147000,'Setoran dari Kasir'),(45,26,'kas induk','Keluar','0000-00-00',1,32,0,1000000,'Mutasi Ke Cabang'),(46,26,'kas cabang','Masuk','0000-00-00',1,32,0,1000000,'Mutasi Dari Induk'),(47,10,'kas cabang','Keluar','0000-00-00',1,0,NULL,5000000,'Operasional Kanwil'),(48,12,'kas induk','Masuk','2020-04-01',1,32,NULL,9000000,'Investasi Owner'),(49,10,'kas induk','Keluar','2020-04-03',1,22,4,900000,'Gaji Karyawan'),(50,13,'kas induk','Masuk','2020-04-01',1,32,NULL,1000000,'Investasi Owner'),(51,14,'kas induk','Masuk','2020-04-01',1,32,NULL,100000,'Investasi Owner'),(52,15,'kas induk','Masuk','2020-04-08',1,32,NULL,100000000,'Investasi Owner'),(53,16,'kas induk','Masuk','2020-04-09',1,32,NULL,50000000,'Investasi Owner'),(54,17,'kas induk','Masuk','2020-04-09',1,32,NULL,50000000,'Investasi Owner'),(55,18,'kas induk','Masuk','0000-00-00',1,32,NULL,123,'Investasi Owner'),(56,19,'kas induk','Masuk','2020-04-09',1,32,NULL,12,'Investasi Owner'),(57,20,'kas induk','Masuk','2020-04-09',1,32,NULL,10000000,'Investasi Owner'),(58,21,'kas induk','Masuk','2020-04-09',1,32,NULL,50000000,'Investasi Owner'),(59,22,'kas induk','Masuk','2020-04-09',1,32,NULL,50000000,'Investasi Owner'),(60,23,'kas induk','Masuk','2020-04-09',1,32,NULL,50000000,'Investasi Owner'),(61,24,'kas induk','Masuk','2020-04-09',1,32,NULL,50000000,'Investasi Owner'),(62,25,'kas induk','Masuk','2020-04-09',1,32,NULL,50000000,'Investasi Owner'),(63,26,'kas induk','Masuk','2020-04-09',1,32,NULL,50000000,'Investasi Owner'),(64,27,'kas induk','Masuk','2020-04-09',1,32,NULL,50000000,'Investasi Owner'),(65,28,'kas induk','Masuk','2020-04-09',1,32,NULL,50000000,'Investasi Owner'),(66,29,'kas induk','Masuk','2020-04-09',1,32,NULL,50000000,'Investasi Owner'),(67,30,'kas induk','Masuk','2020-04-09',1,32,NULL,50000000,'Investasi Owner'),(68,31,'kas induk','Masuk','2020-04-09',1,32,NULL,50000000,'Investasi Owner'),(69,32,'kas induk','Masuk','2020-04-09',1,32,NULL,50000000,'Investasi Owner'),(70,33,'kas induk','Masuk','2020-04-09',1,32,NULL,50000000,'Investasi Owner'),(71,34,'kas induk','Masuk','2020-04-09',1,32,NULL,50000000,'Investasi Owner'),(72,35,'kas induk','Masuk','2020-04-09',1,32,NULL,50000000,'Investasi Owner'),(73,36,'kas induk','Masuk','2020-04-09',1,32,NULL,50000000,'Investasi Owner'),(74,37,'kas induk','Masuk','2020-04-09',1,32,NULL,50000000,'Investasi Owner'),(75,38,'kas induk','Masuk','2020-04-09',1,32,NULL,50000000,'Investasi Owner'),(76,39,'kas induk','Masuk','2020-04-09',1,32,NULL,123,'Investasi Owner'),(77,40,'kas induk','Masuk','2020-04-09',1,32,NULL,50000,'Investasi Owner'),(78,41,'kas induk','Masuk','2020-04-09',1,32,NULL,100000000,'Investasi Owner'),(79,42,'kas induk','Masuk','2020-04-09',1,32,NULL,12312,'Investasi Owner'),(80,43,'kas induk','Masuk','2020-04-09',1,32,NULL,12312,'Investasi Owner'),(81,44,'kas induk','Masuk','2020-04-09',1,32,NULL,10000,'Investasi Owner'),(82,45,'kas induk','Masuk','2020-04-09',1,32,NULL,10000,'Investasi Owner'),(83,46,'kas induk','Masuk','2020-04-09',1,32,NULL,10000,'Investasi Owner'),(84,47,'kas induk','Masuk','2020-04-09',1,32,NULL,10000,'Investasi Owner'),(85,48,'kas induk','Masuk','2020-04-09',1,32,NULL,50000000,'Investasi Owner'),(86,49,'kas induk','Masuk','2020-04-09',1,32,NULL,10,'Investasi Owner'),(87,50,'kas induk','Masuk','2020-04-09',1,32,NULL,50000000,'Investasi Owner'),(88,51,'kas induk','Masuk','2020-04-09',1,32,NULL,12,'Investasi Owner'),(89,52,'kas induk','Masuk','2020-04-09',1,32,NULL,12,'Investasi Owner'),(90,53,'kas induk','Masuk','2020-04-09',1,32,NULL,12,'Investasi Owner'),(91,54,'kas induk','Masuk','2020-04-09',1,32,NULL,12,'Investasi Owner'),(92,55,'kas induk','Masuk','2020-04-09',1,32,NULL,12,'Investasi Owner'),(93,56,'kas induk','Masuk','2020-04-09',1,32,NULL,12,'Investasi Owner'),(94,57,'kas induk','Masuk','2020-04-09',1,32,NULL,12,'Investasi Owner'),(95,58,'kas induk','Masuk','2020-04-09',1,32,NULL,50000000,'Investasi Owner'),(96,59,'kas induk','Masuk','2020-04-09',1,32,NULL,50000000,'Investasi Owner'),(97,60,'kas induk','Masuk','2020-04-09',1,32,NULL,1,'Investasi Owner'),(98,61,'kas induk','Masuk','2020-04-09',1,32,NULL,50000000,'Investasi Owner'),(99,62,'kas induk','Masuk','2020-04-09',1,32,NULL,50000000,'Investasi Owner'),(100,63,'kas induk','Masuk','2020-04-09',1,32,NULL,50000000,'Investasi Owner'),(101,64,'kas induk','Masuk','2020-04-09',1,32,NULL,50000000,'Investasi Owner'),(102,27,'kas induk','Keluar','2020-04-11',1,32,17,0,'Mutasi Ke Cabang'),(103,27,'kas cabang','Masuk','2020-04-11',1,32,17,0,'Mutasi Dari Induk'),(104,28,'kas induk','Keluar','2020-04-11',1,32,17,100000,'Mutasi Ke Cabang'),(105,28,'kas cabang','Masuk','2020-04-11',1,32,17,100000,'Mutasi Dari Induk'),(106,29,'kas induk','Keluar','2020-04-11',1,32,17,3000,'Mutasi Ke Cabang'),(107,29,'kas cabang','Masuk','2020-04-11',1,32,17,3000,'Mutasi Dari Induk'),(108,30,'kas induk','Keluar','2020-04-11',1,32,17,10000,'Mutasi Ke Cabang'),(109,30,'kas cabang','Masuk','2020-04-11',1,32,17,10000,'Mutasi Dari Induk'),(110,31,'kas induk','Keluar','2020-04-11',1,32,17,100000000,'Mutasi Ke Cabang'),(111,31,'kas cabang','Masuk','2020-04-11',1,32,17,100000000,'Mutasi Dari Induk'),(112,32,'kas induk','Keluar','2020-04-11',1,32,17,10000000,'Mutasi Ke Cabang'),(113,32,'kas cabang','Masuk','2020-04-11',1,32,17,10000000,'Mutasi Dari Induk'),(114,33,'kas induk','Keluar','2020-04-11',1,32,17,15000000,'Mutasi Ke Cabang'),(115,33,'kas cabang','Masuk','2020-04-11',1,32,17,15000000,'Mutasi Dari Induk'),(116,34,'kas induk','Keluar','2020-04-11',1,32,17,10000000,'Mutasi Ke Cabang'),(117,34,'kas cabang','Masuk','2020-04-11',1,32,17,10000000,'Mutasi Dari Induk'),(118,35,'kas induk','Keluar','2020-04-11',1,32,17,15000000,'Mutasi Ke Cabang'),(119,35,'kas cabang','Masuk','2020-04-11',1,32,17,15000000,'Mutasi Dari Induk'),(120,36,'kas induk','Keluar','2020-04-11',1,32,17,50000000,'Mutasi Ke Cabang'),(121,36,'kas cabang','Masuk','2020-04-11',1,32,17,50000000,'Mutasi Dari Induk'),(122,37,'kas induk','Keluar','2020-04-12',1,32,17,1000000,'Mutasi Ke Cabang'),(123,37,'kas cabang','Masuk','2020-04-12',1,32,17,1000000,'Mutasi Dari Induk'),(124,65,'kas induk','Masuk','2020-04-12',1,32,NULL,400000000,'Investasi Owner'),(125,66,'kas induk','Masuk','2020-04-12',1,32,NULL,20000000,'Investasi Owner'),(126,67,'kas induk','Masuk','2020-04-12',1,32,NULL,180000000,'Investasi Owner'),(127,38,'kas induk','Keluar','2020-04-12',1,32,17,30000000,'Mutasi Ke Cabang'),(128,38,'kas cabang','Masuk','2020-04-12',1,32,17,30000000,'Mutasi Dari Induk'),(129,68,'kas induk','Masuk','2020-04-12',1,32,NULL,1000,'Investasi Owner'),(131,1,'kas induk','Masuk','2020-04-12',NULL,32,NULL,17987000,'Sisa Investasi Buka Resto'),(132,9,'kas induk','Keluar','2020-07-27',1,34,NULL,1000,'Pembelian Bahan Mentah');

/*Table structure for table `detail_paket` */

DROP TABLE IF EXISTS `detail_paket`;

CREATE TABLE `detail_paket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_paket` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` varchar(100) NOT NULL,
  `diskon` varchar(100) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `detail_paket` */

insert  into `detail_paket`(`id`,`id_paket`,`id_menu`,`jumlah`,`total_harga`,`diskon`) values (11,4,1,1,'10000','');

/*Table structure for table `detail_pembelian_alat` */

DROP TABLE IF EXISTS `detail_pembelian_alat`;

CREATE TABLE `detail_pembelian_alat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi` varchar(255) DEFAULT NULL,
  `id_alat` varchar(255) DEFAULT NULL,
  `jumlah` varchar(255) DEFAULT NULL,
  `harga_beli` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `detail_pembelian_alat` */

insert  into `detail_pembelian_alat`(`id`,`id_transaksi`,`id_alat`,`jumlah`,`harga_beli`) values (12,'1','1','1','8000'),(13,'6','1','7','7000'),(14,'7','1','1','9000'),(15,'7','1','30','5000'),(16,'7','1','10','5000'),(17,'1','1','5','2500'),(18,'1','1','5','2500'),(19,'1','1','5','2500'),(21,'1','1','10','9000'),(22,'11','1','100','12000');

/*Table structure for table `detail_pembelian_bahan_mentah` */

DROP TABLE IF EXISTS `detail_pembelian_bahan_mentah`;

CREATE TABLE `detail_pembelian_bahan_mentah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi` varchar(255) DEFAULT NULL,
  `id_bahan_mentah` varchar(255) DEFAULT NULL,
  `jumlah` varchar(255) DEFAULT NULL,
  `harga_beli` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `detail_pembelian_bahan_mentah` */

insert  into `detail_pembelian_bahan_mentah`(`id`,`id_transaksi`,`id_bahan_mentah`,`jumlah`,`harga_beli`) values (2,'1','1','2','5000'),(3,'1','2','1','5000'),(4,'1','3','2','3000'),(5,'1','3','2','3000'),(6,'1','1','1','5000'),(7,'1','2','5','5000'),(8,'2','1','1','6000'),(9,'9','1','1','1000');

/*Table structure for table `detil_bahan_mentah` */

DROP TABLE IF EXISTS `detil_bahan_mentah`;

CREATE TABLE `detil_bahan_mentah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_bahan_mentah` int(11) NOT NULL,
  `satuan_kecil` varchar(199) NOT NULL,
  `stok` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*Data for the table `detil_bahan_mentah` */

insert  into `detil_bahan_mentah`(`id`,`id_bahan_mentah`,`satuan_kecil`,`stok`) values (1,1,'paha',2),(2,2,'biji',50),(3,1,'dada',2);

/*Table structure for table `gaji` */

DROP TABLE IF EXISTS `gaji`;

CREATE TABLE `gaji` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_resto` int(11) NOT NULL,
  `id_user_resto` int(11) NOT NULL,
  `tanggal_awal` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `jenis_gaji` enum('bulanan','THR','bonus','pesangon') NOT NULL,
  `nominal_gaji` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `gaji` */

insert  into `gaji`(`id`,`id_resto`,`id_user_resto`,`tanggal_awal`,`tanggal_akhir`,`jenis_gaji`,`nominal_gaji`) values (5,4,23,'2020-01-01','2020-01-31','bulanan',2006000),(6,4,20,'2020-03-01','2020-03-31','bulanan',900000),(7,7,24,'2020-03-01','2020-03-31','bulanan',1000000),(9,4,22,'2020-04-03','2020-04-30','bulanan',900000),(10,4,22,'2020-04-03','2020-04-03','bulanan',900000);

/*Table structure for table `gaji_kanwil` */

DROP TABLE IF EXISTS `gaji_kanwil`;

CREATE TABLE `gaji_kanwil` (
  `id_gaji_kanwil` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_kanwil` int(11) DEFAULT NULL,
  `nominal_gaji` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_gaji_kanwil`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*Data for the table `gaji_kanwil` */

insert  into `gaji_kanwil`(`id_gaji_kanwil`,`id_user_kanwil`,`nominal_gaji`) values (1,1,3000000),(2,2,3000000),(3,3,3000000),(4,17,3000000),(5,18,3000000);

/*Table structure for table `insentif` */

DROP TABLE IF EXISTS `insentif`;

CREATE TABLE `insentif` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_resto` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_orderan` int(11) NOT NULL,
  `jumlah_insentif` int(11) NOT NULL,
  `id_gaji` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*Data for the table `insentif` */

/*Table structure for table `intensif_waiters` */

DROP TABLE IF EXISTS `intensif_waiters`;

CREATE TABLE `intensif_waiters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_resto` varchar(100) NOT NULL,
  `tanggal` varchar(100) DEFAULT NULL,
  `jumlah_bonus` varchar(100) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `intensif_waiters` */

insert  into `intensif_waiters`(`id`,`id_user_resto`,`tanggal`,`jumlah_bonus`) values (30,'23','2020-01-30 21:35:00','1000'),(31,'23','2020-01-30 21:35:25','1000'),(32,'23','2020-01-30 21:49:42','1000'),(33,'23','2020-02-01 22:53:18','1000'),(34,'23','2020-02-01 22:53:42','1000'),(35,'23','2020-07-26 21:34:47','1000');

/*Table structure for table `investasi_buka_resto` */

DROP TABLE IF EXISTS `investasi_buka_resto`;

CREATE TABLE `investasi_buka_resto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_resto` int(11) DEFAULT NULL,
  `id_bendahara` int(11) DEFAULT NULL,
  `id_kanwil` int(11) DEFAULT NULL,
  `id_owner` int(11) DEFAULT NULL,
  `nama_resto` varchar(25) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `perkiraan_dana` int(11) DEFAULT NULL,
  `tanggal_setujui` date DEFAULT NULL,
  `tanggal_pengerjaan` date DEFAULT NULL,
  `status` enum('permintaan','menunggu investor','pengerjaan','selesai') DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*Data for the table `investasi_buka_resto` */

insert  into `investasi_buka_resto`(`id`,`id_resto`,`id_bendahara`,`id_kanwil`,`id_owner`,`nama_resto`,`alamat`,`perkiraan_dana`,`tanggal_setujui`,`tanggal_pengerjaan`,`status`,`keterangan`) values (1,17,32,7,NULL,'Buka Resto Baru','Malang',250000000,'2020-04-09','2020-04-09','selesai',''),(5,21,32,7,NULL,'Buka Resto Baru','Tuban',300000000,'2020-04-09',NULL,'menunggu investor',NULL),(7,22,32,7,NULL,'Resto 1 Kanwil 7','Bayuwangi',500000000,'2020-04-12','2020-04-12','pengerjaan',NULL),(8,NULL,32,7,NULL,'Resto 2 Kanwil 7','Sidoarjo',500000000,NULL,NULL,'permintaan',NULL),(9,NULL,32,7,NULL,'Resto 3 Kanwil 7','Madiun',500000000,NULL,NULL,'permintaan',NULL);

/*Table structure for table `investasi_cabang` */

DROP TABLE IF EXISTS `investasi_cabang`;

CREATE TABLE `investasi_cabang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_resto` int(11) NOT NULL,
  `id_user_bendahara` int(11) NOT NULL,
  `nama_investasi` varchar(500) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `jumlah_pengeluaran` int(11) NOT NULL,
  `persen_penyusutan` int(11) DEFAULT NULL,
  `status` enum('permintaan','disetujui','invest dikembalikan','invest belum kembali') DEFAULT 'permintaan',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `investasi_cabang` */

insert  into `investasi_cabang`(`id`,`id_resto`,`id_user_bendahara`,`nama_investasi`,`tanggal_mulai`,`tanggal_selesai`,`jumlah_pengeluaran`,`persen_penyusutan`,`status`) values (4,1,2,'Dekorasi','2019-10-01','2019-10-31',20000,10,'disetujui'),(5,1,2,'Renovasi','2019-10-01','2019-10-30',5000,20,'invest dikembalikan'),(6,1,2,'Pembelian p','2019-10-01','2019-10-30',500000,20,'invest dikembalikan'),(7,1,2,'Pengecetan','2019-10-01','2019-10-30',80000,20,'permintaan'),(8,1,2,'pembelian alat','2019-10-01','2019-10-30',700000,10,'permintaan'),(9,4,2,'sewa ruko','2020-01-14','2025-01-14',200000000,10,'disetujui'),(10,4,2,'renovasi','2020-02-01','2020-05-01',50000000,10,'permintaan'),(12,4,32,'Dekorasi','0000-00-00','0000-00-00',500000,10,'disetujui'),(15,4,32,'Renovasi Taman','0000-00-00','0000-00-00',1000000,1,'permintaan'),(18,4,32,'Dekorasi','2020-04-03','2020-04-03',50000,1,'invest dikembalikan'),(20,4,32,'Op','2020-04-03','2020-04-03',1000000,1,'permintaan'),(21,4,32,'qp','2020-04-03','2020-04-03',1000000,1,'permintaan'),(25,4,32,'qw','2020-04-03','2020-04-03',50000,1,'permintaan'),(26,17,32,'Renovasi Taman','0000-00-00','0000-00-00',1000000,1,'permintaan'),(29,17,32,'Perizinan','2020-04-11','2020-04-11',3000,NULL,'permintaan'),(30,17,32,'bahan','2020-04-11','2020-04-11',10000,NULL,'permintaan'),(31,17,32,'sewa tempat','2020-04-11','2020-04-11',100000000,NULL,'permintaan'),(32,17,32,'gaji pekerja','2020-04-11','2020-04-11',10000000,NULL,'permintaan'),(33,17,32,'dekorasi taman','2020-04-11','2020-04-11',15000000,NULL,'permintaan'),(34,17,32,'publikasi','2020-04-11','2020-10-12',10000000,NULL,'permintaan'),(35,17,32,'biaya rekrutmen','2020-04-11','2020-04-11',15000000,NULL,'permintaan'),(36,17,32,'bahan','2020-04-11','2020-04-11',50000000,NULL,'permintaan'),(37,17,32,'Langganan Internet','2020-04-12','2020-10-12',1000000,NULL,'permintaan'),(38,17,32,'Sewa','2020-04-12','2020-04-15',30000000,NULL,'permintaan');

/*Table structure for table `investasi_kanwil` */

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
  `status` enum('permintaan','diterima') DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `investasi_kanwil` */

insert  into `investasi_kanwil`(`id`,`id_super_admin`,`id_kanwil`,`id_investasi_owner`,`tanggal`,`nominal_investasi`,`penyusutan`,`nominal_saldo`,`status`) values (1,1,1,1,'2019-11-01',3000000,20,1000,'permintaan'),(3,1,1,1,'2019-10-01',9000,90,0,'diterima'),(4,1,7,0,'2020-03-24',1000000,12,0,'permintaan'),(5,1,7,0,'2020-03-27',10000000,5,0,'permintaan'),(6,1,7,0,'2020-04-01',10000000,5,0,'permintaan');

/*Table structure for table `investasi_owner` */

DROP TABLE IF EXISTS `investasi_owner`;

CREATE TABLE `investasi_owner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_super_admin` int(11) NOT NULL,
  `id_owner` int(11) NOT NULL,
  `id_bendahara` int(11) NOT NULL,
  `id_ref_resto` int(11) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `jumlah_investasi` int(11) NOT NULL,
  `jangka_waktu` varchar(11) NOT NULL,
  `persentase_omset` int(11) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `investasi_owner` */

insert  into `investasi_owner`(`id`,`id_super_admin`,`id_owner`,`id_bendahara`,`id_ref_resto`,`tanggal`,`jumlah_investasi`,`jangka_waktu`,`persentase_omset`,`keterangan`) values (1,1,2,2,NULL,'2019-11-30',90000,'2 bulan',20,NULL),(2,1,2,2,NULL,'2019-11-30',9000,'3 bulan',20,NULL),(6,1,1,32,NULL,'2020-03-08',10000000,'12 bulan',1,NULL),(7,1,1,32,NULL,'2020-03-25',10000000,'24 bulan',1,NULL),(8,1,1,32,NULL,'2020-03-27',20000000,'48 bulan',1,NULL),(9,1,1,32,NULL,'2020-04-01',10000000,'12 bulan',1,NULL),(10,1,1,32,NULL,'2020-04-03',1000000,'12 bulan',1,NULL),(11,1,1,32,NULL,'2020-04-03',10000,'6 bulan',1,NULL),(12,1,1,32,NULL,'2020-04-01',9000000,'12 bulan',1,NULL),(13,1,1,32,NULL,'2020-04-01',1000000,'12 bulan',1,NULL),(14,1,1,32,NULL,'2020-04-01',100000,'12 bulan',1,NULL),(15,1,1,32,17,'2020-04-08',100000000,'60 bulan',1,'Modal Awal'),(16,1,1,32,17,'2020-04-09',50000000,'60 bulan',1,'Modal Awal'),(17,1,2,32,17,'2020-04-09',50000000,'60 bulan',1,'Modal Awal'),(18,1,3,32,5,'0000-00-00',123,'123',123,'Modal Tambahan'),(20,1,3,32,4,'2020-04-09',10000000,'24',1,'Modal Tambahan'),(64,1,3,32,17,'2020-04-09',50000000,'24',1,'Modal Awal'),(65,1,3,32,22,'2020-04-12',400000000,'60 bulan',5,'Modal Awal'),(66,1,2,32,22,'2020-04-12',20000000,'60',5,'Modal Awal'),(67,1,2,32,22,'2020-04-12',180000000,'60',5,'Modal Awal'),(68,1,2,32,22,'2020-04-12',1000,'60',5,NULL);

/*Table structure for table `jenis_masakan` */

DROP TABLE IF EXISTS `jenis_masakan`;

CREATE TABLE `jenis_masakan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(100) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `jenis_masakan` */

insert  into `jenis_masakan`(`id`,`jenis`) values (1,'makanan'),(2,'minuman'),(3,'pelegkap');

/*Table structure for table `kanwil` */

DROP TABLE IF EXISTS `kanwil`;

CREATE TABLE `kanwil` (
  `id_kanwil` int(11) NOT NULL AUTO_INCREMENT,
  `alamat_kantor` varchar(100) NOT NULL,
  `telp` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kanwil`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `kanwil` */

insert  into `kanwil`(`id_kanwil`,`alamat_kantor`,`telp`) values (7,'Jawa Timur','085735144495'),(8,'Jawa Barat','085735144879'),(9,'Jawa Tengah','085735148165');

/*Table structure for table `kas_owner` */

DROP TABLE IF EXISTS `kas_owner`;

CREATE TABLE `kas_owner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kas_saldo` varchar(255) DEFAULT NULL,
  `id_owner` int(255) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `nominal` varchar(255) DEFAULT NULL,
  `jenis` enum('pengeluaran','pemasukan') DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `kas_owner` */

insert  into `kas_owner`(`id`,`id_kas_saldo`,`id_owner`,`tgl`,`nominal`,`jenis`) values (1,'1',1,'2020-03-11','100000','pengeluaran'),(2,'1',2,'2020-03-11','50000','pemasukan'),(3,'1',1,'2020-03-11','50000','pemasukan'),(4,'1',1,'2020-03-11','50000','pemasukan');

/*Table structure for table `kas_saldo` */

DROP TABLE IF EXISTS `kas_saldo`;

CREATE TABLE `kas_saldo` (
  `id_saldo` varchar(255) DEFAULT NULL,
  `id_bendahara` varchar(255) DEFAULT NULL,
  `id_admin_resto` varchar(255) DEFAULT NULL,
  `jenis_saldo` varchar(255) DEFAULT NULL,
  `last_balance` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `kas_saldo` */

insert  into `kas_saldo`(`id_saldo`,`id_bendahara`,`id_admin_resto`,`jenis_saldo`,`last_balance`) values ('1','32','','KAS INDUK','50000'),('2','','19','KAS BESAR CABANG','50000'),('3','','19','KAS OPERASIONAL','50000');

/*Table structure for table `log_aktivitas` */

DROP TABLE IF EXISTS `log_aktivitas`;

CREATE TABLE `log_aktivitas` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `id_kanwil` int(11) NOT NULL,
  `id_resto` int(11) NOT NULL,
  `id_user_resto` int(11) NOT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  PRIMARY KEY (`id_log`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*Data for the table `log_aktivitas` */

insert  into `log_aktivitas`(`id_log`,`id_kanwil`,`id_resto`,`id_user_resto`,`tgl_mulai`,`tgl_akhir`,`status`,`keterangan`) values (1,1,1,1,'2020-01-01','2020-01-31','Cuti','Cuti Kerja selama 1 Bulan'),(2,2,2,8,'2020-01-31','2020-01-31','Lembur','Lembur karena Shit tidak masuk'),(5,2,2,8,'2020-02-02','2020-02-19','Cuti','semangat');

/*Table structure for table `logistik` */

DROP TABLE IF EXISTS `logistik`;

CREATE TABLE `logistik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_bahan` int(11) NOT NULL,
  `id_peralatan` int(11) NOT NULL,
  `id_user_kanwil` int(11) NOT NULL,
  `id_resto` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `logistik` */

/*Table structure for table `meja` */

DROP TABLE IF EXISTS `meja`;

CREATE TABLE `meja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `panel` int(11) NOT NULL,
  `nomor` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `meja` */

insert  into `meja`(`id`,`panel`,`nomor`) values (1,1,1),(2,1,2),(3,2,3),(4,2,4),(5,3,5),(6,3,6),(7,4,7);

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_resto` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `menu` varchar(500) NOT NULL,
  `foto` varchar(500) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` enum('tersedia','habis') NOT NULL,
  `stok` int(11) NOT NULL,
  `mode` enum('insert','draft') NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `id_kategori` (`id_kategori`),
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tbl_kategori_menu` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `menu` */

insert  into `menu`(`id`,`id_resto`,`id_kategori`,`menu`,`foto`,`harga`,`status`,`stok`,`mode`) values (1,1,5,'Ayam Geprek','default.jpg',10000,'tersedia',2,'insert'),(2,1,11,'Jamur Kripsi','default.jpg',10000,'tersedia',2,'insert'),(3,1,9,'Es Teh Anget','default.jpg',10000,'tersedia',11,'insert'),(4,1,10,'Kopi Susu','kopihitam.jpg',3000,'habis',6,'insert'),(5,1,5,'Nasi Goreng','default.jpg',3000,'tersedia',8,'insert'),(6,1,4,'Tahu Kripsi','default.jpg',6000,'tersedia',2,'insert'),(7,1,9,'teh pucuk','default.jpg',3000,'tersedia',3,'insert'),(8,1,5,'Nasi Kuning','default.jpg',50000,'habis',0,'insert'),(9,1,7,'Mie Instan','default.jpg',25000,'tersedia',5,'insert'),(10,1,7,'Mie Sedap','default.jpg',25000,'tersedia',5,'insert'),(11,1,7,'Mie Setan','default.jpg',25000,'tersedia',5,'draft');

/*Table structure for table `omset_investasi_owner` */

DROP TABLE IF EXISTS `omset_investasi_owner`;

CREATE TABLE `omset_investasi_owner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_investasi_owner` int(11) NOT NULL,
  `id_super_admin` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `penyusutan_invest` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `omset_investasi_owner` */

insert  into `omset_investasi_owner`(`id`,`id_investasi_owner`,`id_super_admin`,`tanggal`,`penyusutan_invest`) values (1,1,1,'2019-10-30',200000),(2,1,1,'2019-10-31',200000),(3,1,1,'2019-11-01',200000),(9,1,0,'2019-12-01',20000);

/*Table structure for table `operasional` */

DROP TABLE IF EXISTS `operasional`;

CREATE TABLE `operasional` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pengeluaran` varchar(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `operasional` */

insert  into `operasional`(`id`,`nama_pengeluaran`) values (1,'listrik'),(2,'internet'),(3,'komunikasi'),(4,'promosi'),(5,'transportas');

/*Table structure for table `owner` */

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
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `owner` */

insert  into `owner`(`id`,`id_super_admin`,`nama`,`user`,`pass`,`alamat`,`telp`,`email`,`saldo_rek`,`create_at`,`update_at`) values (1,1,'fauzin','fauzin','fauzin','sambirejo','1234567','fauzin@gmail.com','200000','2019-05-08 00:37:00','2019-05-08 00:37:00'),(2,1,'dedy ardiansyah 1','sd','as','asadas','94586845','dfs@gmail.com','100000','2019-12-09 14:04:05','2019-12-09 14:04:05'),(3,1,'owner c','cc','cc','mojoroto','085288886666','1@gmail.com','100000000','2019-12-29 23:05:54','2019-12-29 23:05:54');

/*Table structure for table `paket` */

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
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `paket` */

insert  into `paket`(`id`,`id_resto`,`nama_paket`,`jumlah`,`status`,`foto`,`harga`,`mode`) values (1,1,'Paket Bom',10,'tersedia','default.jpg','8000','insert'),(2,1,'Paket Granat',7,'tersedia','default.jpg','20000','insert'),(3,1,'Paket asoy',5,'habis','nasibebek.jpg','30000','insert');

/*Table structure for table `pembayaran` */

DROP TABLE IF EXISTS `pembayaran`;

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_kasir` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `status` enum('kredit','lunas') NOT NULL,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `pembayaran` */

insert  into `pembayaran`(`id`,`id_user_kasir`,`id_pemesanan`,`nominal`,`status`,`tanggal`) values (34,23,2,15000,'lunas','2020-03-08 21:35:25'),(35,23,1,25000,'lunas','2020-03-08 15:42:30'),(36,23,3,20000,'lunas','2020-03-08 17:09:06'),(38,23,4,25000,'lunas','2020-03-06 20:42:38'),(39,22,5,15000,'lunas','2020-02-01 16:55:53'),(40,23,7,100000,'lunas','2020-07-26 21:34:47');

/*Table structure for table `pembelian_alat` */

DROP TABLE IF EXISTS `pembelian_alat`;

CREATE TABLE `pembelian_alat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_logistik` int(11) NOT NULL,
  `no_transaksi` varchar(255) DEFAULT NULL,
  `nama_supplier` varchar(255) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `total_harga_beli` int(100) NOT NULL,
  `dibayar` int(100) NOT NULL,
  `status` enum('draft','selesai') DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `pembelian_alat` */

insert  into `pembelian_alat`(`id`,`id_logistik`,`no_transaksi`,`nama_supplier`,`tanggal`,`total_harga_beli`,`dibayar`,`status`,`catatan`) values (9,34,'1','','2020-07-16',5000,5000,'selesai','lunas'),(10,34,'10','PT. sejahtera farma','2020-07-16',10000,10000,'selesai','lunas');

/*Table structure for table `pembelian_bahan_mentah` */

DROP TABLE IF EXISTS `pembelian_bahan_mentah`;

CREATE TABLE `pembelian_bahan_mentah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_logistik` int(255) DEFAULT NULL,
  `no_transaksi` int(255) DEFAULT NULL,
  `nama_supplier` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `total_harga_beli` varchar(255) DEFAULT NULL,
  `dibayar` varchar(255) DEFAULT NULL,
  `status` enum('draft','selesai') DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `pembelian_bahan_mentah` */

insert  into `pembelian_bahan_mentah`(`id`,`id_logistik`,`no_transaksi`,`nama_supplier`,`tanggal`,`total_harga_beli`,`dibayar`,`status`,`catatan`) values (4,3,1,'fauzin','2019-10-16','57000','57000','selesai','ok'),(5,34,1,'man',NULL,'100000','100000','selesai','ok'),(6,35,1,'ruu',NULL,'1000000','1000000','selesai',NULL),(7,34,2,'man',NULL,'1000000','1000000','selesai',NULL),(8,34,2,'lur','2020-04-03','1000000','1000000','selesai',NULL),(9,34,9,'cepung','2020-07-27','1000','','selesai',';lunas');

/*Table structure for table `pemberian_kaskeluar` */

DROP TABLE IF EXISTS `pemberian_kaskeluar`;

CREATE TABLE `pemberian_kaskeluar` (
  `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT,
  `id_bendahara` int(255) DEFAULT NULL,
  `id_resto` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nominal_kas_keluar` int(100) NOT NULL,
  `status` enum('pengajuan','pemberian') NOT NULL,
  PRIMARY KEY (`id_pengeluaran`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `pemberian_kaskeluar` */

insert  into `pemberian_kaskeluar`(`id_pengeluaran`,`id_bendahara`,`id_resto`,`tanggal`,`nominal_kas_keluar`,`status`) values (1,2,1,'2019-06-26',400000,'pemberian'),(6,2,1,'2019-10-19',60000,'pemberian'),(7,2,1,'2019-10-20',60000,'pemberian'),(8,2,3,'2020-01-14',3000000,'pengajuan'),(9,32,4,'2020-03-31',1000000,'pengajuan'),(10,32,4,'2020-04-03',100000,'pengajuan'),(11,32,4,'2020-04-03',1000000,'pemberian');

/*Table structure for table `pemesanan` */

DROP TABLE IF EXISTS `pemesanan`;

CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pemesan` varchar(500) NOT NULL,
  `no_meja` int(11) NOT NULL,
  `keterangantambahan` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `total_harga` int(11) NOT NULL,
  `id_user_resto` int(11) NOT NULL,
  `status` enum('belum','kredit','lunas','produksi','siapsaji','selesai','siapsaji_lunas','produksi_lunas') NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `pemesanan` */

insert  into `pemesanan`(`id`,`nama_pemesan`,`no_meja`,`keterangantambahan`,`tanggal`,`total_harga`,`id_user_resto`,`status`) values (1,'coba1',1,'','2020-01-30 21:35:00',24000,23,'lunas'),(2,'coba2',2,'','2020-01-30 21:35:25',13000,23,'lunas'),(3,'coba3',3,'ini pembayaran dilakukan di kasir','2020-02-02 21:49:42',16000,23,'lunas'),(4,'coba4',4,'','2020-02-01 21:58:05',13000,23,'lunas'),(5,'coba5',5,'','2020-02-01 22:53:18',13000,23,'siapsaji_lunas'),(6,'coba5',1,'','2020-02-01 22:53:42',0,23,'produksi_lunas');

/*Table structure for table `pemesanan_menu` */

DROP TABLE IF EXISTS `pemesanan_menu`;

CREATE TABLE `pemesanan_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemesanan` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah_pesan` int(11) NOT NULL,
  `subharga` int(11) NOT NULL,
  `status` enum('','diambil','dikembalikan') NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `pemesanan_menu` */

/*Table structure for table `pemesanan_paket` */

DROP TABLE IF EXISTS `pemesanan_paket`;

CREATE TABLE `pemesanan_paket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemesanan` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `jumlah_pesan` int(11) NOT NULL,
  `subharga` int(11) NOT NULL,
  `status` enum('','diambil','dikembalikan') NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `pemesanan_paket` */

insert  into `pemesanan_paket`(`id`,`id_pemesanan`,`id_paket`,`jumlah_pesan`,`subharga`,`status`) values (35,1,1,1,8000,'diambil');

/*Table structure for table `pendapatan_kas_masuk` */

DROP TABLE IF EXISTS `pendapatan_kas_masuk`;

CREATE TABLE `pendapatan_kas_masuk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_bendahara` int(11) NOT NULL,
  `id_user_kasir` int(11) NOT NULL,
  `id_pendapatankasmasuk_dari_kasir` int(11) DEFAULT NULL,
  `jumlah_setoran` varchar(100) NOT NULL,
  `tanggal` datetime NOT NULL,
  `tanggal_awal` datetime NOT NULL,
  `tanggal_akhir` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `pendapatan_kas_masuk` */

insert  into `pendapatan_kas_masuk`(`id`,`id_user_bendahara`,`id_user_kasir`,`id_pendapatankasmasuk_dari_kasir`,`jumlah_setoran`,`tanggal`,`tanggal_awal`,`tanggal_akhir`) values (34,32,22,11,'200000','2020-04-03 02:53:06','2020-04-03 02:53:09','2020-04-03 02:53:11'),(35,32,22,12,'500000','2020-04-03 02:57:02','2020-04-03 02:57:05','2020-04-03 02:57:08'),(36,32,22,13,'100000','2020-04-03 03:08:07','2020-04-03 03:08:09','2020-04-03 03:08:11');

/*Table structure for table `pendapatan_kas_masuk_dari_kasir` */

DROP TABLE IF EXISTS `pendapatan_kas_masuk_dari_kasir`;

CREATE TABLE `pendapatan_kas_masuk_dari_kasir` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_kasir` int(11) NOT NULL,
  `id_resto` int(11) DEFAULT NULL,
  `id_adminresto` int(11) NOT NULL,
  `jumlah_setoran` varchar(100) NOT NULL,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `pendapatan_kas_masuk_dari_kasir` */

insert  into `pendapatan_kas_masuk_dari_kasir`(`id`,`id_user_kasir`,`id_resto`,`id_adminresto`,`jumlah_setoran`,`tanggal`) values (34,22,4,19,'53000','2020-03-08 22:53:26'),(35,25,4,19,'100000','2020-04-03 04:03:45'),(36,22,4,19,'147000','2020-04-03 04:04:48');

/*Table structure for table `pengeluaran_cabang` */

DROP TABLE IF EXISTS `pengeluaran_cabang`;

CREATE TABLE `pengeluaran_cabang` (
  `id_pengeluaran_cabang` int(11) NOT NULL AUTO_INCREMENT,
  `id_resto` int(11) NOT NULL,
  `id_investasi_cabang` int(11) NOT NULL,
  `id_alat` int(11) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `masa_pemanfatan` varchar(100) NOT NULL,
  `nominal` varchar(100) NOT NULL,
  `nominal_penyusutan` int(11) NOT NULL,
  PRIMARY KEY (`id_pengeluaran_cabang`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*Data for the table `pengeluaran_cabang` */

insert  into `pengeluaran_cabang`(`id_pengeluaran_cabang`,`id_resto`,`id_investasi_cabang`,`id_alat`,`jumlah`,`masa_pemanfatan`,`nominal`,`nominal_penyusutan`) values (1,1,1,1,'2','2 bulan','10000',2000);

/*Table structure for table `pengeluaran_cabang_operasional` */

DROP TABLE IF EXISTS `pengeluaran_cabang_operasional`;

CREATE TABLE `pengeluaran_cabang_operasional` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_admin_resto` int(255) DEFAULT NULL,
  `id_resto` int(11) NOT NULL,
  `id_kanwil` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_operasional` int(11) NOT NULL,
  `masa_sewa` varchar(11) DEFAULT NULL,
  `nominal` varchar(100) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `pengeluaran_cabang_operasional` */

insert  into `pengeluaran_cabang_operasional`(`id`,`id_admin_resto`,`id_resto`,`id_kanwil`,`tanggal`,`id_operasional`,`masa_sewa`,`nominal`) values (1,4,1,1,'2019-10-02',1,'1 bulan','5000'),(2,4,1,1,'2019-10-03',1,'2 bulan','90'),(3,4,1,1,'2019-10-19',0,'2 hari','10000'),(5,1,1,1,'2019-12-29',2,'1 bulan','70000'),(6,4,1,7,'2020-04-03',3,'1 bulan','500000');

/*Table structure for table `pengeluaran_kanwil` */

DROP TABLE IF EXISTS `pengeluaran_kanwil`;

CREATE TABLE `pengeluaran_kanwil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kanwil` int(11) NOT NULL,
  `id_operasional` int(11) NOT NULL,
  `nominal` varchar(100) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*Data for the table `pengeluaran_kanwil` */

insert  into `pengeluaran_kanwil`(`id`,`id_kanwil`,`id_operasional`,`nominal`) values (1,1,1,'5000');

/*Table structure for table `pengeluaran_kanwil_operasional` */

DROP TABLE IF EXISTS `pengeluaran_kanwil_operasional`;

CREATE TABLE `pengeluaran_kanwil_operasional` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kanwil` int(11) NOT NULL,
  `id_operasional` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `masa_sewa` varchar(255) DEFAULT NULL,
  `nominal` varchar(100) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `pengeluaran_kanwil_operasional` */

insert  into `pengeluaran_kanwil_operasional`(`id`,`id_kanwil`,`id_operasional`,`tanggal`,`masa_sewa`,`nominal`) values (1,1,1,'2019-10-02','1 bulan','5000'),(3,1,1,'2019-10-03','1 bulan','100'),(4,1,1,'2019-10-04','1 bulan','2000'),(5,1,4,'0000-00-00',NULL,'2000000'),(6,7,2,'0000-00-00',NULL,'5000000'),(7,7,1,'0000-00-00',NULL,'5000000'),(8,7,2,'2020-04-03','2 bulan','1000000'),(9,7,3,'2020-04-03','1 bulan','100000'),(10,0,1,'0000-00-00',NULL,'5000000');

/*Table structure for table `pengiriman_bahan_mentah` */

DROP TABLE IF EXISTS `pengiriman_bahan_mentah`;

CREATE TABLE `pengiriman_bahan_mentah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_permintaan` int(11) NOT NULL,
  `id_bahan_mentah` int(11) NOT NULL,
  `tanggal_pengiriman` date NOT NULL,
  `jumlah_permintaan` int(11) NOT NULL,
  `jumlah_dikirim` int(11) NOT NULL,
  `jumlah_dikembalikan` int(11) NOT NULL,
  `status` enum('sesuai','tidak') NOT NULL,
  `status_bahan` enum('diterima','belum diterima') DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `pengiriman_bahan_mentah` */

insert  into `pengiriman_bahan_mentah`(`id`,`id_permintaan`,`id_bahan_mentah`,`tanggal_pengiriman`,`jumlah_permintaan`,`jumlah_dikirim`,`jumlah_dikembalikan`,`status`,`status_bahan`) values (1,3,1,'2019-10-22',2,4,2,'tidak',NULL),(2,4,1,'2020-07-09',1,1,0,'sesuai','diterima'),(3,5,2,'2020-07-08',1,1,0,'sesuai','belum diterima'),(4,6,2,'2020-07-27',1,1,0,'sesuai','belum diterima'),(5,7,1,'2020-07-27',1,1,0,'sesuai','diterima'),(6,6,1,'2020-07-27',1,1,0,'sesuai','belum diterima');

/*Table structure for table `pengiriman_bahan_olahan` */

DROP TABLE IF EXISTS `pengiriman_bahan_olahan`;

CREATE TABLE `pengiriman_bahan_olahan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_permintaan` int(11) NOT NULL,
  `id_bahan_olahan` int(11) NOT NULL,
  `tanggal_pengiriman` date NOT NULL,
  `jumlah_permintaan` int(11) NOT NULL,
  `jumlah_dikirim` int(11) NOT NULL,
  `jumlah_dikembalikan` int(11) NOT NULL,
  `status` enum('sesuai','tidak','diterima') NOT NULL,
  `status_bahan` enum('diterima','belum diterima') DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `pengiriman_bahan_olahan` */

insert  into `pengiriman_bahan_olahan`(`id`,`id_permintaan`,`id_bahan_olahan`,`tanggal_pengiriman`,`jumlah_permintaan`,`jumlah_dikirim`,`jumlah_dikembalikan`,`status`,`status_bahan`) values (2,2,3,'2019-10-22',4,4,0,'diterima',NULL),(4,1,3,'2019-10-25',1,1,0,'sesuai',NULL),(5,3,1,'2020-06-14',1,1,1,'sesuai','diterima'),(6,3,3,'2020-07-27',1,1,0,'sesuai','diterima');

/*Table structure for table `penyusutan_investasi_cabang` */

DROP TABLE IF EXISTS `penyusutan_investasi_cabang`;

CREATE TABLE `penyusutan_investasi_cabang` (
  `id_penyusutan` int(11) NOT NULL AUTO_INCREMENT,
  `id_investasi_cabang` int(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `nominal_penyusutan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_penyusutan`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `penyusutan_investasi_cabang` */

insert  into `penyusutan_investasi_cabang`(`id_penyusutan`,`id_investasi_cabang`,`tanggal`,`nominal_penyusutan`) values (4,6,'2019-10-20','100000'),(5,6,'2019-10-20','100000'),(6,6,'2019-10-20','100000'),(7,6,'2019-10-20','100000'),(8,6,'2019-10-20','100000'),(9,4,'2019-10-20','2000'),(10,4,'2019-10-20','2000'),(11,4,'2019-10-20','2000'),(12,4,'2019-10-20','2000'),(13,4,'2019-10-20','2000'),(14,4,'2019-10-20','2000'),(15,4,'2019-10-20','2000'),(16,4,'2019-10-20','2000'),(17,4,'2019-10-20','2000'),(18,4,'2019-10-20','2000');

/*Table structure for table `peralatan` */

DROP TABLE IF EXISTS `peralatan`;

CREATE TABLE `peralatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_logistik` int(255) DEFAULT NULL,
  `id_resto` int(11) NOT NULL,
  `nama_peralatan` varchar(100) NOT NULL,
  `satuan_besar` varchar(255) DEFAULT NULL,
  `jumlah_stok` int(11) NOT NULL,
  `status` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `peralatan` */

insert  into `peralatan`(`id`,`id_logistik`,`id_resto`,`nama_peralatan`,`satuan_besar`,`jumlah_stok`,`status`) values (1,3,1,'sendok','pcs',242,1);

/*Table structure for table `permintaan_alat` */

DROP TABLE IF EXISTS `permintaan_alat`;

CREATE TABLE `permintaan_alat` (
  `id_permintaan_alat` int(11) NOT NULL AUTO_INCREMENT,
  `id_resto` int(11) NOT NULL,
  `id_kanwil` int(11) NOT NULL,
  `id_alat` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `masa_pemanfatan` varchar(100) NOT NULL,
  `status_permintaan` enum('permintaan','dikirim','diterima','permintaan ditolak','dikembalikan') DEFAULT NULL,
  PRIMARY KEY (`id_permintaan_alat`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `permintaan_alat` */

insert  into `permintaan_alat`(`id_permintaan_alat`,`id_resto`,`id_kanwil`,`id_alat`,`tanggal`,`jumlah`,`masa_pemanfatan`,`status_permintaan`) values (20,4,7,1,'2020-07-17','2','3 bulan','permintaan'),(21,5,7,1,'2020-07-17','1','3 bulan','dikembalikan');

/*Table structure for table `permintaan_bahan_mentah` */

DROP TABLE IF EXISTS `permintaan_bahan_mentah`;

CREATE TABLE `permintaan_bahan_mentah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_resto` int(11) NOT NULL,
  `id_user_produksi` int(11) NOT NULL,
  `nama_permintaan` varchar(500) NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('permintaan','pengiriman','diterima') NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `permintaan_bahan_mentah` */

insert  into `permintaan_bahan_mentah`(`id`,`id_resto`,`id_user_produksi`,`nama_permintaan`,`tanggal`,`status`) values (3,1,3,'permintaan 3','2019-11-04','pengiriman'),(4,4,19,'uzin','2020-07-19','permintaan'),(5,4,20,'aku','2020-07-20','permintaan'),(6,4,20,'permintaan 3','2020-07-31','permintaan'),(7,4,20,'permintaan 4','2020-07-31','permintaan');

/*Table structure for table `permintaan_bahan_olahan` */

DROP TABLE IF EXISTS `permintaan_bahan_olahan`;

CREATE TABLE `permintaan_bahan_olahan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_resto` int(11) NOT NULL,
  `id_user_produksi` int(11) NOT NULL,
  `nama_permintaan` varchar(500) NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('permintaan','pengiriman','diterima') NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `permintaan_bahan_olahan` */

insert  into `permintaan_bahan_olahan`(`id`,`id_resto`,`id_user_produksi`,`nama_permintaan`,`tanggal`,`status`) values (1,1,3,'Permintaan bahan olahan 1','2019-10-22','diterima'),(2,1,3,'permintaan 2','2019-10-24','diterima'),(3,4,20,'permintaan 1','2020-07-17','permintaan');

/*Table structure for table `produksi` */

DROP TABLE IF EXISTS `produksi`;

CREATE TABLE `produksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu_masakan` int(11) NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `produksi` */

/*Table structure for table `produksi_bahan_olahan` */

DROP TABLE IF EXISTS `produksi_bahan_olahan`;

CREATE TABLE `produksi_bahan_olahan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_logistik` int(255) DEFAULT NULL,
  `id_bahan_mentah` int(11) NOT NULL,
  `jumlah_bahan_mentah` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `status` enum('produksi','selesai produksi') DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `produksi_bahan_olahan` */

insert  into `produksi_bahan_olahan`(`id`,`id_logistik`,`id_bahan_mentah`,`jumlah_bahan_mentah`,`tanggal`,`status`) values (2,34,1,1,'2019-10-09','selesai produksi'),(8,34,3,1,'2020-07-09','selesai produksi'),(10,34,1,1,'2020-07-14','selesai produksi'),(11,34,1,1,'2020-07-27','produksi'),(12,34,3,1,'2020-07-27','produksi');

/*Table structure for table `produksi_bahan_olahan_detail` */

DROP TABLE IF EXISTS `produksi_bahan_olahan_detail`;

CREATE TABLE `produksi_bahan_olahan_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_logistik` int(255) DEFAULT NULL,
  `id_produksi_bahan_olahan` int(11) NOT NULL,
  `id_bahan_olahan` int(11) NOT NULL,
  `jumlah_bahan_olahan` int(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `produksi_bahan_olahan_detail` */

insert  into `produksi_bahan_olahan_detail`(`id`,`id_logistik`,`id_produksi_bahan_olahan`,`id_bahan_olahan`,`jumlah_bahan_olahan`,`tanggal`) values (12,34,2,1,1,'2020-07-09'),(13,34,8,1,1,'2020-07-14'),(20,34,10,1,1,'2020-07-14'),(21,34,10,3,1,'2020-07-14');

/*Table structure for table `produksi_masakan` */

DROP TABLE IF EXISTS `produksi_masakan`;

CREATE TABLE `produksi_masakan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_resto` int(11) DEFAULT NULL,
  `id_menu` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_masakan` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `produksi_masakan` */

insert  into `produksi_masakan`(`id`,`id_resto`,`id_menu`,`tanggal`,`jumlah_masakan`) values (1,4,1,'2019-10-10',10),(2,4,2,'2019-10-14',1),(3,4,2,'2020-01-03',1),(4,4,4,'2020-01-03',1),(5,4,6,'2020-01-03',1),(6,4,8,'2020-07-08',5);

/*Table structure for table `resto` */

DROP TABLE IF EXISTS `resto`;

CREATE TABLE `resto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kanwil` int(11) NOT NULL,
  `nama_resto` varchar(50) NOT NULL,
  `alamat` varchar(11) NOT NULL,
  `no_telp` varchar(11) NOT NULL,
  `pajak` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `resto` */

insert  into `resto`(`id`,`id_kanwil`,`nama_resto`,`alamat`,`no_telp`,`pajak`) values (4,7,'Kediri','Jl. Veteran','08573514449',10),(5,7,'Nganjuk','Jl. Candire','08573514487',5),(6,8,'Jakarta','Jl. Jakarta','08573514816',30),(7,9,'Kraton Agun','jogja','08573514449',10),(8,9,'Sunda Empir','Bandung','08573514487',10),(17,7,'Buka Resto Baru','Malang','13',13),(21,7,'Buka Resto Baru','Tuban','08223453114',15),(22,7,'Resto 1 Kanwil 7','Bayuwangi','08223453112',15);

/*Table structure for table `stok_bahan_mentah_produksi` */

DROP TABLE IF EXISTS `stok_bahan_mentah_produksi`;

CREATE TABLE `stok_bahan_mentah_produksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_bahan_mentah` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `stok_bahan_mentah_produksi` */

insert  into `stok_bahan_mentah_produksi`(`id`,`id_bahan_mentah`,`stok`) values (1,1,22),(2,2,51),(3,3,9);

/*Table structure for table `stok_bahan_olahan_produksi` */

DROP TABLE IF EXISTS `stok_bahan_olahan_produksi`;

CREATE TABLE `stok_bahan_olahan_produksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_bahan_olahan` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `stok_bahan_olahan_produksi` */

insert  into `stok_bahan_olahan_produksi`(`id`,`id_bahan_olahan`,`stok`) values (1,1,1),(2,3,6);

/*Table structure for table `superadmin` */

DROP TABLE IF EXISTS `superadmin`;

CREATE TABLE `superadmin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `user` varchar(12) NOT NULL,
  `pass` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `create_at` datetime DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `superadmin` */

insert  into `superadmin`(`id`,`nama`,`user`,`pass`,`alamat`,`telp`,`email`,`create_at`,`update_at`) values (1,'dedy ardiansyah','dedi','dedi','blitar','08546464664','dedi@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00');

/*Table structure for table `tbl_kategori_menu` */

DROP TABLE IF EXISTS `tbl_kategori_menu`;

CREATE TABLE `tbl_kategori_menu` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `parent_id` int(11) DEFAULT 0,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_kategori_menu` */

insert  into `tbl_kategori_menu`(`id_kategori`,`nama`,`parent_id`) values (1,'Makanan',0),(2,'Minuman',0),(4,'Snack',0),(5,'Nasi',1),(7,'Mie',1),(8,'Rujak',1),(9,'Panas',2),(10,'Dingin',2),(11,'Kering',4),(12,'Basah',4);

/*Table structure for table `tbl_kinerja_karyawan` */

DROP TABLE IF EXISTS `tbl_kinerja_karyawan`;

CREATE TABLE `tbl_kinerja_karyawan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_resto` int(11) NOT NULL,
  `pemesanan` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

/*Data for the table `tbl_kinerja_karyawan` */

insert  into `tbl_kinerja_karyawan`(`id`,`id_user_resto`,`pemesanan`,`point`) values (16,23,2,1),(17,23,1,1),(18,23,3,1),(19,23,5,1);

/*Table structure for table `user_kanwil` */

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
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp(),
  `tipe` enum('general manajer','bendahara','logistik') NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `user_kanwil` */

insert  into `user_kanwil`(`id`,`id_super_admin`,`id_kanwil`,`nama`,`user`,`pass`,`alamat`,`telp`,`email`,`create_at`,`update_at`,`tipe`) values (30,1,7,'irhassatu','irhassatu','irhassatu','sambirejo','085735144495','irhaskarumaf@gmail.com','2020-01-30 19:17:40','2020-01-30 19:17:40','general manajer'),(31,1,9,'indahdua','indahdua','indahdua','jogjakarta','085735144879','indah@gmail.com','2020-01-30 19:18:18','2020-01-30 19:18:18','general manajer'),(32,1,7,'fadilasatu','fadilasatu','fadilasatu','papar','085735144495','fadila@gmail.com','2020-01-30 19:49:51','2020-01-30 19:49:51','bendahara'),(33,1,9,'wiwindua','wiwindua','wiwindua','jogjakarta','085735144879','wiwin@gmial.com','2020-01-30 19:50:29','2020-01-30 19:50:29','bendahara'),(34,1,7,'risasatu','risasatu','risasatu','sambirejo','085735144495','risa@gmail.com','2020-01-30 19:51:55','2020-01-30 19:51:55','logistik'),(35,1,9,'triadua','triadua','triadua','jogjakarta','085735144879','tria@gmail.com','2020-01-30 19:52:18','2020-01-30 19:52:18','logistik');

/*Table structure for table `user_resto` */

DROP TABLE IF EXISTS `user_resto`;

CREATE TABLE `user_resto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kanwil` int(11) NOT NULL,
  `id_resto` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `user` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `telp` varchar(12) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp(),
  `jenis` enum('admin resto','kasir','waiters','produksi') NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `user_resto` */

insert  into `user_resto`(`id`,`id_kanwil`,`id_resto`,`nama`,`user`,`pass`,`alamat`,`telp`,`create_at`,`update_at`,`jenis`) values (19,7,4,'adminrestosatu','adminrestosatu','adminrestosatu','kediri','085735144495','2020-01-30 19:54:38','2020-01-30 19:54:38','admin resto'),(20,7,4,'produksisatu','produksisatu','produksisatu','kediri','085735144495','2020-01-30 20:00:21','2020-01-30 20:00:21','produksi'),(22,7,4,'kasirsatu','kasirsatu','kasirsatu','kediri','085735144495','2020-01-30 20:01:29','2020-01-30 20:01:29','kasir'),(23,7,4,'waiterssatu','waiterssatu','waiterssatu','kediri','085735144495','2020-01-30 20:02:01','2020-01-30 20:02:01','waiters'),(24,9,7,'adminrestodua','adminrestodua','adminrestodua','jogjakarta','085735144879','2020-01-30 20:07:05','2020-01-30 20:07:05','admin resto'),(25,9,7,'produksidua','produksidua','produksidua','jogjakarta','085735144879','2020-01-30 20:07:54','2020-01-30 20:07:54','produksi'),(26,9,7,'kasirdua','kasirdua','kasirdua','jogjakarta','085735144879','2020-01-30 20:08:25','2020-01-30 20:08:25','kasir'),(27,9,7,'waitersdua','waitersdua','waitersdua','jogjakarta','085735144879','2020-01-30 20:08:47','2020-01-30 20:08:47','waiters');

/* Trigger structure for table `detail_pembelian_alat` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `stok_pembelian` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `stok_pembelian` AFTER INSERT ON `detail_pembelian_alat` FOR EACH ROW BEGIN
	UPDATE peralatan SET jumlah_stok=jumlah_stok+NEW.jumlah
	WHERE id = NEW.id_alat;
    END */$$


DELIMITER ;

/* Trigger structure for table `gaji` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `detail_kas_gaji` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `detail_kas_gaji` AFTER INSERT ON `gaji` FOR EACH ROW BEGIN
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
    END */$$


DELIMITER ;

/* Trigger structure for table `investasi_cabang` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `detail_kas_mutasiCabang` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `detail_kas_mutasiCabang` AFTER INSERT ON `investasi_cabang` FOR EACH ROW BEGIN
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
     END */$$


DELIMITER ;

/* Trigger structure for table `pembelian_bahan_mentah` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `detail_kas_bahan` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `detail_kas_bahan` AFTER INSERT ON `pembelian_bahan_mentah` FOR EACH ROW BEGIN
	INSERT INTO `detail_kas`
	SET id_ref_kas = NEW.id,
	jenis_kas="kas induk",
	tipe_kas="Keluar",
	tanggal=new.tanggal,
	id_superadmin="1",
	id_user=new.id_logistik,
	nominal = new.total_harga_beli,
	tipe_user="Pembelian Bahan Mentah";
    END */$$


DELIMITER ;

/* Trigger structure for table `pemesanan_menu` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `stok_menu` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `stok_menu` AFTER INSERT ON `pemesanan_menu` FOR EACH ROW BEGIN
	UPDATE menu SET stok=stok-NEW.jumlah_pesan
	WHERE id = NEW.id_menu;
    END */$$


DELIMITER ;

/* Trigger structure for table `pemesanan_menu` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `stok_update_menu` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `stok_update_menu` AFTER UPDATE ON `pemesanan_menu` FOR EACH ROW BEGIN
	UPDATE menu SET stok=stok-NEW.jumlah_pesan
	WHERE id = NEW.id_menu;
    END */$$


DELIMITER ;

/* Trigger structure for table `pemesanan_menu` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `stok_return_menu` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `stok_return_menu` BEFORE DELETE ON `pemesanan_menu` FOR EACH ROW BEGIN
	UPDATE menu SET stok=stok+OLD.jumlah_pesan
	WHERE id = OLD.id_menu;
    END */$$


DELIMITER ;

/* Trigger structure for table `pemesanan_paket` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `stok_paket` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `stok_paket` AFTER INSERT ON `pemesanan_paket` FOR EACH ROW BEGIN
	UPDATE paket SET jumlah=jumlah-NEW.jumlah_pesan
	WHERE id = NEW.id_paket;
    END */$$


DELIMITER ;

/* Trigger structure for table `pemesanan_paket` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `stok_update_paket` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `stok_update_paket` AFTER UPDATE ON `pemesanan_paket` FOR EACH ROW BEGIN
	UPDATE paket SET jumlah=jumlah-NEW.jumlah_pesan
	WHERE id = NEW.id_paket;
    END */$$


DELIMITER ;

/* Trigger structure for table `pemesanan_paket` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `stok_return_paket` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `stok_return_paket` BEFORE DELETE ON `pemesanan_paket` FOR EACH ROW BEGIN
	UPDATE paket SET jumlah=jumlah+OLD.jumlah_pesan
	WHERE id = OLD.id_paket;
    END */$$


DELIMITER ;

/* Trigger structure for table `pendapatan_kas_masuk` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `detail_kas_setorInduk` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `detail_kas_setorInduk` AFTER INSERT ON `pendapatan_kas_masuk` FOR EACH ROW BEGIN
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
	
	
    END */$$


DELIMITER ;

/* Trigger structure for table `pendapatan_kas_masuk_dari_kasir` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `detail_kas_setorKasir` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `detail_kas_setorKasir` AFTER INSERT ON `pendapatan_kas_masuk_dari_kasir` FOR EACH ROW BEGIN
	INSERT INTO `detail_kas`
	SET id_ref_kas = NEW.id,
	jenis_kas="kas cabang",
	tipe_kas="Masuk",
	tanggal=new.tanggal,
	id_superadmin="1",
	id_user=new.id_user_kasir,
	nominal = new.jumlah_setoran,
	tipe_user="Setoran dari Kasir";
    END */$$


DELIMITER ;

/* Trigger structure for table `pengeluaran_cabang_operasional` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `detail_kas_operasional_cabang` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `detail_kas_operasional_cabang` AFTER INSERT ON `pengeluaran_cabang_operasional` FOR EACH ROW BEGIN
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
    END */$$


DELIMITER ;

/* Trigger structure for table `pengeluaran_kanwil_operasional` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `detail_kas_operasional_kanwil` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `detail_kas_operasional_kanwil` AFTER INSERT ON `pengeluaran_kanwil_operasional` FOR EACH ROW BEGIN
		INSERT INTO `detail_kas`
		SET id_ref_kas = NEW.id,
		jenis_kas="kas cabang",
		tipe_kas="Keluar",
		tanggal=new.tanggal,
		id_superadmin="1",
		id_user=new.id_kanwil,
		nominal = new.nominal,
		tipe_user="Operasional Kanwil";
    END */$$


DELIMITER ;

/* Trigger structure for table `resto` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `bukaResto` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `bukaResto` AFTER INSERT ON `resto` FOR EACH ROW BEGIN
	UPDATE `investasi_buka_resto`SET id_resto = new.id , STATUS="menunggu investor", tanggal_setujui=DATE(NOW())
		WHERE id_kanwil=new.id_kanwil AND nama_resto=new.nama_resto AND alamat=new.alamat;
    END */$$


DELIMITER ;

/* Function  structure for function  `saldo_investasi_cabang` */

/*!50003 DROP FUNCTION IF EXISTS `saldo_investasi_cabang` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `saldo_investasi_cabang`(`id_Rest` INT) RETURNS int(11)
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
      END */$$
DELIMITER ;

/* Function  structure for function  `saldo_investasi_induk` */

/*!50003 DROP FUNCTION IF EXISTS `saldo_investasi_induk` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `saldo_investasi_induk`(`id_bend` INT) RETURNS int(11)
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
      END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
