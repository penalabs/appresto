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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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

insert  into `bahan_mentah`(`id`,`id_resto`,`id_logistik`,`nama_bahan`,`satuan_besar`,`stok`,`status`) values (1,'1',3,'ayam kampung','ekor',24,1),(2,'1',3,'tomat','kg',9,1),(3,'1',3,'tepung','kg',7,0);

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

insert  into `bahan_olahan`(`id`,`id_logistik`,`nama_bahan`,`satuan_kecil`,`stok`,`status`) values (1,3,'ayam kampung paha','buah',4,1),(3,3,'ayam kampung dada','buah',1,1);

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `detail_pembelian_alat` */

insert  into `detail_pembelian_alat`(`id`,`id_transaksi`,`id_alat`,`jumlah`,`harga_beli`) values (12,'1','1','1','8000'),(13,'6','1','7','7000'),(14,'7','1','1','9000'),(15,'7','1','30','5000'),(16,'7','1','10','5000'),(17,'1','1','5','2500'),(18,'1','1','5','2500'),(19,'1','1','5','2500');

/*Table structure for table `detail_pembelian_bahan_mentah` */

DROP TABLE IF EXISTS `detail_pembelian_bahan_mentah`;

CREATE TABLE `detail_pembelian_bahan_mentah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi` varchar(255) DEFAULT NULL,
  `id_bahan_mentah` varchar(255) DEFAULT NULL,
  `jumlah` varchar(255) DEFAULT NULL,
  `harga_beli` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `detail_pembelian_bahan_mentah` */

insert  into `detail_pembelian_bahan_mentah`(`id`,`id_transaksi`,`id_bahan_mentah`,`jumlah`,`harga_beli`) values (2,'1','1','2','5000'),(3,'1','2','1','5000'),(4,'1','3','2','3000'),(5,'1','3','2','3000'),(6,'1','1','1','5000'),(7,'1','2','5','5000'),(8,'2','1','1','6000');

/*Table structure for table `detil_bahan_mentah` */

DROP TABLE IF EXISTS `detil_bahan_mentah`;

CREATE TABLE `detil_bahan_mentah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_bahan_mentah` int(11) NOT NULL,
  `satuan_kecil` varchar(199) NOT NULL,
  `stok` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `gaji` */

insert  into `gaji`(`id`,`id_resto`,`id_user_resto`,`tanggal_awal`,`tanggal_akhir`,`jenis_gaji`,`nominal_gaji`) values (5,4,23,'2020-01-01','2020-01-31','bulanan',2005000);

/*Table structure for table `gaji_kanwil` */

DROP TABLE IF EXISTS `gaji_kanwil`;

CREATE TABLE `gaji_kanwil` (
  `id_gaji_kanwil` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_kanwil` int(11) DEFAULT NULL,
  `nominal_gaji` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_gaji_kanwil`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `insentif` */

/*Table structure for table `intensif_waiters` */

DROP TABLE IF EXISTS `intensif_waiters`;

CREATE TABLE `intensif_waiters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_resto` varchar(100) NOT NULL,
  `tanggal` varchar(100) DEFAULT NULL,
  `jumlah_bonus` varchar(100) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `intensif_waiters` */

insert  into `intensif_waiters`(`id`,`id_user_resto`,`tanggal`,`jumlah_bonus`) values (30,'23','2020-01-30 21:35:00','1000'),(31,'23','2020-01-30 21:35:25','1000'),(32,'23','2020-01-30 21:49:42','1000'),(33,'23','2020-02-01 22:53:18','1000'),(34,'23','2020-02-01 22:53:42','1000');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `investasi_cabang` */

insert  into `investasi_cabang`(`id`,`id_resto`,`id_user_bendahara`,`nama_investasi`,`tanggal_mulai`,`tanggal_selesai`,`jumlah_pengeluaran`,`persen_penyusutan`,`status`) values (4,1,2,'Dekorasi','2019-10-01','2019-10-31',20000,10,'disetujui'),(5,1,2,'Renovasi','2019-10-01','2019-10-30',5000,20,'invest dikembalikan'),(6,1,2,'Pembelian p','2019-10-01','2019-10-30',500000,20,'invest dikembalikan'),(7,1,2,'Pengecetan','2019-10-01','2019-10-30',80000,20,'permintaan'),(8,1,2,'pembelian alat','2019-10-01','2019-10-30',700000,10,'permintaan'),(9,3,2,'sewa ruko','2020-01-14','2025-01-14',200000000,10,'permintaan'),(10,3,2,'renovasi','2020-02-01','2020-05-01',50000000,10,'permintaan');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `investasi_kanwil` */

insert  into `investasi_kanwil`(`id`,`id_super_admin`,`id_kanwil`,`id_investasi_owner`,`tanggal`,`nominal_investasi`,`penyusutan`,`nominal_saldo`,`status`) values (1,1,1,1,'2019-11-01',3000000,20,1000,'permintaan'),(3,1,1,1,'2019-10-01',9000,90,0,'diterima');

/*Table structure for table `investasi_owner` */

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
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `investasi_owner` */

insert  into `investasi_owner`(`id`,`id_super_admin`,`id_owner`,`id_bendahara`,`tanggal`,`jumlah_investasi`,`jangka_waktu`,`persentase_omset`) values (1,1,1,2,'2019-11-30',90000,'2 bulan',20),(2,1,1,2,'2019-11-30',9000,'3 bulan',20);

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
  PRIMARY KEY (`id_log`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

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
  `menu` varchar(500) NOT NULL,
  `foto` varchar(500) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` enum('tersedia','habis') NOT NULL,
  `stok` int(11) NOT NULL,
  `mode` enum('insert','draft') NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `menu` */

insert  into `menu`(`id`,`id_resto`,`menu`,`foto`,`harga`,`status`,`stok`,`mode`) values (1,1,'Ayam Geprek','default.jpg',10000,'tersedia',5,'insert'),(2,1,'Jamur Kripsi','default.jpg',10000,'tersedia',0,'insert'),(3,1,'Es Teh Anget','default.jpg',10000,'tersedia',10,'insert'),(4,1,'Kopi Susu','kopihitam.jpg',3000,'habis',6,'insert'),(5,1,'Nasi Goreng','default.jpg',3000,'tersedia',6,'insert'),(6,1,'Tahu Kripsi','default.jpg',6000,'tersedia',1,'insert'),(7,1,'teh pucuk','default.jpg',3000,'tersedia',1,'insert');

/*Table structure for table `omset_investasi_owner` */

DROP TABLE IF EXISTS `omset_investasi_owner`;

CREATE TABLE `omset_investasi_owner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_investasi_owner` int(11) NOT NULL,
  `id_super_admin` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `penyusutan_invest` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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

insert  into `paket`(`id`,`id_resto`,`nama_paket`,`jumlah`,`status`,`foto`,`harga`,`mode`) values (1,1,'Paket Bom',10,'tersedia','default.jpg','8000','insert'),(2,1,'Paket Granat',10,'tersedia','default.jpg','20000','insert'),(3,1,'Paket asoy',5,'habis','nasibebek.jpg','30000','insert');

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
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `pembayaran` */

insert  into `pembayaran`(`id`,`id_user_kasir`,`id_pemesanan`,`nominal`,`status`,`tanggal`) values (34,23,2,15000,'lunas','2020-03-08 21:35:25'),(35,23,1,25000,'lunas','2020-03-08 15:42:30'),(36,23,3,20000,'lunas','2020-03-08 17:09:06'),(38,23,4,25000,'lunas','2020-03-06 20:42:38'),(39,22,5,15000,'lunas','2020-02-01 16:55:53');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `pembelian_alat` */

insert  into `pembelian_alat`(`id`,`id_logistik`,`no_transaksi`,`nama_supplier`,`tanggal`,`total_harga_beli`,`dibayar`,`status`,`catatan`) values (5,3,'1','fauzin','2019-10-16',8000,8000,'selesai','ok'),(6,3,'6','','2019-10-16',49000,49000,'selesai','ok'),(7,3,'7','Tmart','2020-01-14',209000,200000,'selesai',''),(8,30,'1','','2020-03-01',45500,0,'selesai','');

/*Table structure for table `pembelian_bahan_mentah` */

DROP TABLE IF EXISTS `pembelian_bahan_mentah`;

CREATE TABLE `pembelian_bahan_mentah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_logistik` int(255) DEFAULT NULL,
  `no_transaksi` int(255) DEFAULT NULL,
  `nama_supplier` varchar(255) DEFAULT NULL,
  `tanggal` varchar(255) DEFAULT NULL,
  `total_harga_beli` varchar(255) DEFAULT NULL,
  `dibayar` varchar(255) DEFAULT NULL,
  `status` enum('draft','selesai') DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `pembelian_bahan_mentah` */

insert  into `pembelian_bahan_mentah`(`id`,`id_logistik`,`no_transaksi`,`nama_supplier`,`tanggal`,`total_harga_beli`,`dibayar`,`status`,`catatan`) values (4,3,1,'fauzin','2019-10-16','57000','57000','selesai','ok');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `pemberian_kaskeluar` */

insert  into `pemberian_kaskeluar`(`id_pengeluaran`,`id_bendahara`,`id_resto`,`tanggal`,`nominal_kas_keluar`,`status`) values (1,2,1,'2019-06-26',400000,'pemberian'),(6,2,1,'2019-10-19',60000,'pemberian'),(7,2,1,'2019-10-20',60000,'pemberian'),(8,2,3,'2020-01-14',3000000,'pengajuan');

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `pemesanan` */

insert  into `pemesanan`(`id`,`nama_pemesan`,`no_meja`,`keterangantambahan`,`tanggal`,`total_harga`,`id_user_resto`,`status`) values (1,'coba1',1,'','2020-03-02 21:35:00',24000,23,'lunas'),(2,'coba2',2,'','2020-03-02 21:35:25',13000,23,'lunas'),(3,'coba3',3,'ini pembayaran dilakukan di kasir','2020-03-02 21:49:42',16000,23,'lunas'),(4,'coba4',4,'','2020-03-02 21:58:05',13000,23,'lunas'),(5,'coba5',5,'','2020-02-01 22:53:18',13000,23,'lunas'),(6,'coba5',1,'','2020-02-01 22:53:42',0,23,'siapsaji');

/*Table structure for table `pemesanan_menu` */

DROP TABLE IF EXISTS `pemesanan_menu`;

CREATE TABLE `pemesanan_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemesanan` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah_pesan` int(11) NOT NULL,
  `subharga` int(11) NOT NULL,
  `status` varchar(40) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `pemesanan_menu` */

insert  into `pemesanan_menu`(`id`,`id_pemesanan`,`id_menu`,`jumlah_pesan`,`subharga`,`status`) values (58,1,1,1,10000,''),(59,1,7,2,6000,''),(60,2,3,1,10000,''),(61,2,5,1,3000,''),(62,3,2,1,10000,''),(63,3,6,1,6000,''),(64,5,2,1,10000,''),(65,5,5,1,3000,'');

/*Table structure for table `pemesanan_paket` */

DROP TABLE IF EXISTS `pemesanan_paket`;

CREATE TABLE `pemesanan_paket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemesanan` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `jumlah_pesan` int(11) NOT NULL,
  `subharga` int(11) NOT NULL,
  `status` varchar(40) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `pemesanan_paket` */

insert  into `pemesanan_paket`(`id`,`id_pemesanan`,`id_paket`,`jumlah_pesan`,`subharga`,`status`) values (35,1,1,1,8000,'');

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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `pendapatan_kas_masuk` */

/*Table structure for table `pendapatan_kas_masuk_dari_kasir` */

DROP TABLE IF EXISTS `pendapatan_kas_masuk_dari_kasir`;

CREATE TABLE `pendapatan_kas_masuk_dari_kasir` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_kasir` int(11) NOT NULL,
  `id_adminresto` int(11) NOT NULL,
  `jumlah_setoran` varchar(100) NOT NULL,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `pendapatan_kas_masuk_dari_kasir` */

insert  into `pendapatan_kas_masuk_dari_kasir`(`id`,`id_user_kasir`,`id_adminresto`,`jumlah_setoran`,`tanggal`) values (34,22,19,'53000','2020-03-08 22:53:26');

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
  PRIMARY KEY (`id_pengeluaran_cabang`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `pengeluaran_cabang_operasional` */

insert  into `pengeluaran_cabang_operasional`(`id`,`id_admin_resto`,`id_resto`,`id_kanwil`,`tanggal`,`id_operasional`,`masa_sewa`,`nominal`) values (1,4,1,1,'2019-10-02',1,'1 bulan','5000'),(2,4,1,1,'2019-10-03',1,'2 bulan','90'),(3,4,1,1,'2019-10-19',0,'2 hari','10000'),(5,1,1,1,'2019-12-29',2,'1 bulan','70000');

/*Table structure for table `pengeluaran_kanwil` */

DROP TABLE IF EXISTS `pengeluaran_kanwil`;

CREATE TABLE `pengeluaran_kanwil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kanwil` int(11) NOT NULL,
  `id_operasional` int(11) NOT NULL,
  `nominal` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `pengeluaran_kanwil_operasional` */

insert  into `pengeluaran_kanwil_operasional`(`id`,`id_kanwil`,`id_operasional`,`tanggal`,`masa_sewa`,`nominal`) values (1,1,1,'2019-10-02','1 bulan','5000'),(3,1,1,'2019-10-03','1 bulan','100'),(4,1,1,'2019-10-04','1 bulan','2000'),(5,1,4,'0000-00-00',NULL,'2000000');

/*Table structure for table `pengiriman_bahan_mentah` */

DROP TABLE IF EXISTS `pengiriman_bahan_mentah`;

CREATE TABLE `pengiriman_bahan_mentah` (
  `id` int(11) NOT NULL,
  `id_permintaan` int(11) NOT NULL,
  `id_bahan_mentah` int(11) NOT NULL,
  `tanggal_pengiriman` date NOT NULL,
  `jumlah_permintaan` int(11) NOT NULL,
  `jumlah_dikirim` int(11) NOT NULL,
  `jumlah_dikembalikan` int(11) NOT NULL,
  `status` enum('sesuai','tidak') NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `pengiriman_bahan_mentah` */

insert  into `pengiriman_bahan_mentah`(`id`,`id_permintaan`,`id_bahan_mentah`,`tanggal_pengiriman`,`jumlah_permintaan`,`jumlah_dikirim`,`jumlah_dikembalikan`,`status`) values (1,3,1,'2019-10-22',2,4,2,'tidak');

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
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `pengiriman_bahan_olahan` */

insert  into `pengiriman_bahan_olahan`(`id`,`id_permintaan`,`id_bahan_olahan`,`tanggal_pengiriman`,`jumlah_permintaan`,`jumlah_dikirim`,`jumlah_dikembalikan`,`status`) values (2,2,3,'2019-10-22',4,4,0,'diterima'),(4,1,3,'2019-10-25',1,1,0,'sesuai');

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

insert  into `peralatan`(`id`,`id_logistik`,`id_resto`,`nama_peralatan`,`satuan_besar`,`jumlah_stok`,`status`) values (1,3,1,'sendok','pcs',55,1);

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
  `status_permintaan` enum('permintaan','proses pengiriman','diterima') DEFAULT NULL,
  PRIMARY KEY (`id_permintaan_alat`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `permintaan_alat` */

insert  into `permintaan_alat`(`id_permintaan_alat`,`id_resto`,`id_kanwil`,`id_alat`,`tanggal`,`jumlah`,`masa_pemanfatan`,`status_permintaan`) values (8,1,1,1,'0000-00-00','1','2 bulan','diterima'),(9,1,1,1,'0000-00-00','50','10 bulan','permintaan'),(10,1,1,1,'0000-00-00','10','3 bulan','permintaan');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `permintaan_bahan_mentah` */

insert  into `permintaan_bahan_mentah`(`id`,`id_resto`,`id_user_produksi`,`nama_permintaan`,`tanggal`,`status`) values (3,1,3,'permintaan 3','2019-11-04','pengiriman');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `permintaan_bahan_olahan` */

insert  into `permintaan_bahan_olahan`(`id`,`id_resto`,`id_user_produksi`,`nama_permintaan`,`tanggal`,`status`) values (1,1,3,'Permintaan bahan olahan 1','2019-10-22','diterima'),(2,1,3,'permintaan 2','2019-10-24','diterima');

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
  `id_bahan_mentah` int(11) NOT NULL,
  `id_bahan_olahan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `produksi_bahan_olahan` */

insert  into `produksi_bahan_olahan`(`id`,`id_bahan_mentah`,`id_bahan_olahan`,`jumlah`,`tanggal`) values (2,1,1,1,'2019-10-09'),(3,1,1,1,'2019-10-09'),(4,1,1,1,'2019-10-09'),(5,1,1,1,NULL);

/*Table structure for table `produksi_masakan` */

DROP TABLE IF EXISTS `produksi_masakan`;

CREATE TABLE `produksi_masakan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_masakan` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `produksi_masakan` */

insert  into `produksi_masakan`(`id`,`id_menu`,`tanggal`,`jumlah_masakan`) values (1,1,'2019-10-10',10),(2,2,'2019-10-14',1),(3,2,'2020-01-03',1),(4,4,'2020-01-03',1),(5,6,'2020-01-03',1);

/*Table structure for table `resto` */

DROP TABLE IF EXISTS `resto`;

CREATE TABLE `resto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kanwil` int(11) NOT NULL,
  `nama_resto` varchar(11) NOT NULL,
  `alamat` varchar(11) NOT NULL,
  `no_telp` varchar(11) NOT NULL,
  `pajak` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `resto` */

insert  into `resto`(`id`,`id_kanwil`,`nama_resto`,`alamat`,`no_telp`,`pajak`) values (4,7,'Kediri','Jl. Veteran','08573514449',10),(5,7,'Nganjuk','Jl. Candire','08573514487',5),(6,8,'Jakarta','Jl. Jakarta','08573514816',30),(7,9,'Kraton Agun','jogja','08573514449',10),(8,9,'Sunda Empir','Bandung','08573514487',10);

/*Table structure for table `stok_bahan_mentah_produksi` */

DROP TABLE IF EXISTS `stok_bahan_mentah_produksi`;

CREATE TABLE `stok_bahan_mentah_produksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_bahan_mentah` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `stok_bahan_mentah_produksi` */

insert  into `stok_bahan_mentah_produksi`(`id`,`id_bahan_mentah`,`stok`) values (1,1,21),(2,2,51),(3,3,9);

/*Table structure for table `stok_bahan_olahan_produksi` */

DROP TABLE IF EXISTS `stok_bahan_olahan_produksi`;

CREATE TABLE `stok_bahan_olahan_produksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_bahan_olahan` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `stok_bahan_olahan_produksi` */

insert  into `stok_bahan_olahan_produksi`(`id`,`id_bahan_olahan`,`stok`) values (1,1,2),(2,3,5);

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

/*Table structure for table `tbl_kinerja_karyawan` */

DROP TABLE IF EXISTS `tbl_kinerja_karyawan`;

CREATE TABLE `tbl_kinerja_karyawan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_resto` int(11) NOT NULL,
  `pemesanan` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

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

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
