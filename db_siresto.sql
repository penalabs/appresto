-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
<<<<<<< HEAD
-- Generation Time: Oct 12, 2019 at 10:46 PM
=======
-- Generation Time: Oct 10, 2019 at 12:12 AM
>>>>>>> 4c77bc07fbeb99c9c53e982b89438da17bc7c334
-- Server version: 10.3.18-MariaDB-1:10.3.18+maria~bionic
-- PHP Version: 7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_siresto`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan_mentah`
--

CREATE TABLE `bahan_mentah` (
  `id` int(11) NOT NULL,
  `id_resto` varchar(12) NOT NULL,
  `id_logistik` int(11) NOT NULL,
  `nama_bahan` varchar(100) NOT NULL,
  `satuan_besar` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL,
  `status` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `bahan_mentah`
--

INSERT INTO `bahan_mentah` (`id`, `id_resto`, `id_logistik`, `nama_bahan`, `satuan_besar`, `stok`, `status`) VALUES
(1, '1', 3, 'ayam kampung', 'ekor', 9, 1),
(2, '1', 3, 'tomat', 'kg', 10, 1),
(3, '1', 3, 'tepung', 'kg', 10, 0);

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- Table structure for table `bahan_mentah_masakan`
--

CREATE TABLE `bahan_mentah_masakan` (
  `id` int(11) NOT NULL,
  `id_produksi_masakan` int(11) NOT NULL,
  `id_bahan_mentah` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan_mentah_masakan`
--

INSERT INTO `bahan_mentah_masakan` (`id`, `id_produksi_masakan`, `id_bahan_mentah`, `jumlah`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
=======
>>>>>>> 4c77bc07fbeb99c9c53e982b89438da17bc7c334
-- Table structure for table `bahan_olahan`
--

CREATE TABLE `bahan_olahan` (
  `id` int(11) NOT NULL,
  `id_logistik` int(11) NOT NULL,
  `nama_bahan` varchar(100) NOT NULL,
  `satuan_kecil` varchar(199) NOT NULL,
  `stok` int(11) NOT NULL,
  `status` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `bahan_olahan`
--

INSERT INTO `bahan_olahan` (`id`, `id_logistik`, `nama_bahan`, `satuan_kecil`, `stok`, `status`) VALUES
(1, 3, 'ayam kampung paha', 'buah', 3, 1),
(3, 3, 'ayam kampung dada', 'buah', 2, 1);

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- Table structure for table `bahan_olahan_masakan`
--

CREATE TABLE `bahan_olahan_masakan` (
  `id` int(11) NOT NULL,
  `id_produksi_masakan` int(11) NOT NULL,
  `id_bahan_olahan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan_olahan_masakan`
--

INSERT INTO `bahan_olahan_masakan` (`id`, `id_produksi_masakan`, `id_bahan_olahan`, `jumlah`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
=======
>>>>>>> 4c77bc07fbeb99c9c53e982b89438da17bc7c334
-- Table structure for table `biaya_lain`
--

CREATE TABLE `biaya_lain` (
  `id` int(11) NOT NULL,
  `id_resto` int(11) NOT NULL,
  `nama_biaya_lain` varchar(10) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `biaya_lain`
--

INSERT INTO `biaya_lain` (`id`, `id_resto`, `nama_biaya_lain`, `jumlah`) VALUES
(1, 1, 'brosur', 10000),
(2, 1, 'zakat', 11000);

-- --------------------------------------------------------

--
-- Table structure for table `daftar_masakan`
--

CREATE TABLE `daftar_masakan` (
  `id` int(11) NOT NULL,
  `id_bahan_oalahan` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `daftar_masakan`
--

INSERT INTO `daftar_masakan` (`id`, `id_bahan_oalahan`, `id_menu`, `jenis`, `jumlah`) VALUES
(6, 1, 1, '3', 1),
(7, 2, 1, '1', 1);

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- Table structure for table `detail_paket`
--

CREATE TABLE `detail_paket` (
=======
-- Table structure for table `detil_paket`
--

CREATE TABLE `detil_paket` (
>>>>>>> 4c77bc07fbeb99c9c53e982b89438da17bc7c334
  `id` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` varchar(100) NOT NULL,
  `diskon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
<<<<<<< HEAD
-- Dumping data for table `detail_paket`
--

INSERT INTO `detail_paket` (`id`, `id_paket`, `id_menu`, `jumlah`, `total_harga`, `diskon`) VALUES
=======
-- Dumping data for table `detil_paket`
--

INSERT INTO `detil_paket` (`id`, `id_paket`, `id_menu`, `jumlah`, `total_harga`, `diskon`) VALUES
>>>>>>> 4c77bc07fbeb99c9c53e982b89438da17bc7c334
(8, 1, 2, 1, '80000', '');

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `id` int(11) NOT NULL,
  `id_resto` int(11) NOT NULL,
  `id_user_resto` int(11) NOT NULL,
  `bulan_awal` datetime NOT NULL,
  `bulan_akhir` datetime NOT NULL,
  `jenis_gaji` enum('bulanan','THR','bonus','pesangon') NOT NULL,
  `jumlah_gaji` int(11) NOT NULL,
  `total_gaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `insentif`
--

CREATE TABLE `insentif` (
  `id` int(11) NOT NULL,
  `id_resto` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_orderan` int(11) NOT NULL,
  `jumlah_insentif` int(11) NOT NULL,
  `id_gaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `investasi_kanwil`
--

CREATE TABLE `investasi_kanwil` (
  `id` int(11) NOT NULL,
  `id_super_admin` int(11) NOT NULL,
  `id_kanwil` int(11) NOT NULL,
  `id_investasi_owner` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nominal_investasi` int(11) NOT NULL,
  `penyusutan` int(11) NOT NULL,
  `nominal_saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `investasi_kanwil`
--

INSERT INTO `investasi_kanwil` (`id`, `id_super_admin`, `id_kanwil`, `id_investasi_owner`, `tanggal`, `nominal_investasi`, `penyusutan`, `nominal_saldo`) VALUES
(1, 1, 1, 1, '0000-00-00', 3000000, 20, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `investasi_owner`
--

CREATE TABLE `investasi_owner` (
  `id` int(11) NOT NULL,
  `id_super_admin` int(11) NOT NULL,
  `id_owner` int(11) NOT NULL,
  `id_bendahara` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_investasi` int(11) NOT NULL,
  `jangka_waktu` varchar(11) NOT NULL,
  `persentase_omset` int(11) NOT NULL,
  `jumlah_omset` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `investasi_owner`
--

INSERT INTO `investasi_owner` (`id`, `id_super_admin`, `id_owner`, `id_bendahara`, `tanggal`, `jumlah_investasi`, `jangka_waktu`, `persentase_omset`, `jumlah_omset`) VALUES
(1, 1, 1, 2, '0000-00-00', 1000000, '2 bulan', 20, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_masakan`
--

CREATE TABLE `jenis_masakan` (
  `id` int(11) NOT NULL,
  `jenis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `jenis_masakan`
--

INSERT INTO `jenis_masakan` (`id`, `jenis`) VALUES
(1, 'makanan'),
(2, 'minuman'),
(3, 'pelegkap');

-- --------------------------------------------------------

--
-- Table structure for table `kanwil`
--

CREATE TABLE `kanwil` (
  `id_kanwil` int(11) NOT NULL,
  `alamat_kantor` varchar(100) NOT NULL,
  `telp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `kanwil`
--

INSERT INTO `kanwil` (`id_kanwil`, `alamat_kantor`, `telp`) VALUES
(1, 'ngronggo', '0856464646');

-- --------------------------------------------------------

--
-- Table structure for table `logistik`
--

CREATE TABLE `logistik` (
  `id` int(11) NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `id_peralatan` int(11) NOT NULL,
  `id_user_kanwil` int(11) NOT NULL,
  `id_resto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

CREATE TABLE `meja` (
  `id` int(11) NOT NULL,
  `panel` int(11) NOT NULL,
  `nomor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`id`, `panel`, `nomor`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 3),
(4, 2, 4),
(5, 3, 5),
(6, 3, 6),
(7, 4, 7);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `id_resto` int(11) NOT NULL,
  `menu` varchar(500) NOT NULL,
  `foto` varchar(500) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` enum('tersedia','habis') NOT NULL,
  `stok` int(11) NOT NULL,
  `mode` enum('insert','draft') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `id_resto`, `menu`, `foto`, `harga`, `status`, `stok`, `mode`) VALUES
<<<<<<< HEAD
(1, 1, 'Ayam Geprek', 'nasibebek.jpg', 10000, 'tersedia', 10, 'insert'),
(2, 1, 'Jamur Kripsi', '124789-mint-background-2560x1600-for-ios.jpg', 10000, 'tersedia', 10, 'insert'),
(3, 1, 'Es Teh Anget', '124789-mint-background-2560x1600-for-ios4.jpg', 10000, 'tersedia', 10, 'insert'),
(4, 1, 'Kopi Susu', '', 3000, 'tersedia', 6, 'insert'),
(5, 1, 'Nasi Goreng', '', 6000, 'habis', 5, 'insert'),
(6, 1, 'Tahu Kripsi', 'wp2754931.jpg', 6000, 'tersedia', 1, 'insert');
=======
(1, 1, 'Ayam Geprek', 'nasibebek.jpg', 10000, 'tersedia', -1, 'insert'),
(2, 1, 'Jamur Kripsi', 'gepreksai.jpg', 8000, 'tersedia', -1, 'insert'),
(3, 1, 'Es Teh Anget', '', 2000, 'tersedia', -1, 'insert'),
(4, 1, 'Kopi Susu', '', 3000, 'tersedia', 6, 'insert'),
(5, 1, 'Nasi Goreng', '', 6000, 'habis', 5, 'insert');
>>>>>>> 4c77bc07fbeb99c9c53e982b89438da17bc7c334

-- --------------------------------------------------------

--
-- Table structure for table `omset_investasi`
--

CREATE TABLE `omset_investasi` (
  `id` int(11) NOT NULL,
  `id_investasi_owner` int(11) NOT NULL,
  `id_super_admin` int(11) NOT NULL,
  `id_pendapatan` int(11) NOT NULL,
  `jumlah_omset_pendapatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `omset_investasi`
--

INSERT INTO `omset_investasi` (`id`, `id_investasi_owner`, `id_super_admin`, `id_pendapatan`, `jumlah_omset_pendapatan`) VALUES
(1, 1, 1, 1, 200);

-- --------------------------------------------------------

--
-- Table structure for table `operasional`
--

CREATE TABLE `operasional` (
  `id` int(11) NOT NULL,
  `nama_pengeluaran` varchar(11) NOT NULL,
  `lama_sewa` varchar(11) NOT NULL,
  `harga_sewa` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `operasional`
--

INSERT INTO `operasional` (`id`, `nama_pengeluaran`, `lama_sewa`, `harga_sewa`) VALUES
(1, 'listrik', '1 bulan', '50000'),
(2, 'kodomo', '12', '4');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `id` int(11) NOT NULL,
  `id_super_admin` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `user` varchar(12) NOT NULL,
  `pass` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `saldo_rek` varchar(500) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`id`, `id_super_admin`, `nama`, `user`, `pass`, `alamat`, `telp`, `email`, `saldo_rek`, `create_at`, `update_at`) VALUES
(1, 1, 'fauzin', 'fauzin', 'fauzin', 'sambirejo', '123456', 'fauzin@gmail.com', '0', '2019-05-08 00:37:00', '2019-05-08 00:37:00');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id` int(11) NOT NULL,
  `id_resto` int(11) NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` enum('tersedia','habis') NOT NULL,
  `foto` varchar(500) NOT NULL,
  `harga` varchar(500) NOT NULL,
  `mode` enum('insert','draft') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id`, `id_resto`, `nama_paket`, `jumlah`, `status`, `foto`, `harga`, `mode`) VALUES
(1, 1, 'Paket Bom', 1, 'tersedia', 'gepreksai3.jpg', '8000', 'insert'),
(2, 1, 'Paket Granat', -1, 'tersedia', '', '20000', 'insert'),
(3, 1, 'Paket asoy', -5, 'tersedia', '', '30000', 'insert');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `id_user_kasir` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `status` enum('kredit','lunas') NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `id_user_kasir`, `id_pemesanan`, `nominal`, `status`, `tanggal`) VALUES
(12, 1, 1, 100000, 'lunas', '2019-10-02 17:18:21'),
(13, 1, 1, 20000, 'kredit', '2019-07-03 15:20:33'),
(14, 1, 1, 196000, 'lunas', '2019-10-08 01:58:06');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_alat`
--

CREATE TABLE `pembelian_alat` (
  `id` int(11) NOT NULL,
  `id_alat` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `harga_beli` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_alat`
--

INSERT INTO `pembelian_alat` (`id`, `id_alat`, `jumlah`, `tanggal`, `harga_beli`, `total`) VALUES
(1, 1, 10, '2019-10-10', '10000', '100000');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_bahan_mentah`
--

CREATE TABLE `pembelian_bahan_mentah` (
  `id` int(11) NOT NULL,
  `id_bahan_mentah` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `harga_beli` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_bahan_mentah`
--

INSERT INTO `pembelian_bahan_mentah` (`id`, `id_bahan_mentah`, `jumlah`, `tanggal`, `harga_beli`, `total`) VALUES
(1, 1, 10, '2019-10-10', '10000', '100000');

-- --------------------------------------------------------

--
-- Table structure for table `pemberian_kaskeluar`
--

CREATE TABLE `pemberian_kaskeluar` (
  `id_pengeluaran` int(11) NOT NULL,
  `id_bendahara` int(11) NOT NULL,
  `id_resto` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `nominal_kas_keluar` int(100) NOT NULL,
  `status` enum('pengajuan','pemberian') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `pemberian_kaskeluar`
--

INSERT INTO `pemberian_kaskeluar` (`id_pengeluaran`, `id_bendahara`, `id_resto`, `tanggal`, `nominal_kas_keluar`, `status`) VALUES
(1, 2, 1, '2019-06-26 00:00:00', 500000, 'pemberian');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL,
  `nama_pemesan` varchar(500) NOT NULL,
  `no_meja` int(11) NOT NULL,
  `keterangantambahan` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `total_harga` int(11) NOT NULL,
  `id_user_resto` int(11) NOT NULL,
  `status` enum('belum','kredit','lunas','produksi','siapsaji','selsai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `nama_pemesan`, `no_meja`, `keterangantambahan`, `tanggal`, `total_harga`, `id_user_resto`, `status`) VALUES
(1, 'irhas', 4, 'sambel banyak tapi sedikit', '2019-10-02 10:34:01', 196000, 2, 'kredit'),
(2, 'fauzin', 3, 'bumbu sedikit', '2019-09-29 11:09:54', 52000, 2, 'produksi'),
<<<<<<< HEAD
(3, 'wahyu', 6, 'gelas besar', '2019-09-29 11:10:37', 3000, 2, 'selsai');
=======
(3, 'wahyu', 6, 'gelas besar', '2019-09-29 11:10:37', 3000, 2, 'selsai'),
(4, 'debi', 7, '', '2019-09-29 11:12:09', 20000, 2, 'selsai');
>>>>>>> 4c77bc07fbeb99c9c53e982b89438da17bc7c334

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_menu`
--

CREATE TABLE `pemesanan_menu` (
  `id` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah_pesan` int(11) NOT NULL,
  `subharga` int(11) NOT NULL,
  `status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `pemesanan_menu`
--

INSERT INTO `pemesanan_menu` (`id`, `id_pemesanan`, `id_menu`, `jumlah_pesan`, `subharga`, `status`) VALUES
(11, 1, 1, 4, 40000, ''),
(12, 1, 4, 2, 6000, ''),
(13, 2, 2, 4, 32000, ''),
(14, 3, 4, 1, 3000, ''),
(16, 5, 1, 1, 10000, '');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_paket`
--

CREATE TABLE `pemesanan_paket` (
  `id` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `jumlah_pesan` int(11) NOT NULL,
  `subharga` int(11) NOT NULL,
  `status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `pemesanan_paket`
--

INSERT INTO `pemesanan_paket` (`id`, `id_pemesanan`, `id_paket`, `jumlah_pesan`, `subharga`, `status`) VALUES
(12, 1, 3, 5, 6000, ''),
(13, 2, 2, 1, 20000, ''),
(14, 4, 2, 1, 20000, ''),
(15, 5, 1, 1, 8000, '');

-- --------------------------------------------------------

--
-- Table structure for table `pendapatan_kas_masuk`
--

CREATE TABLE `pendapatan_kas_masuk` (
  `id` int(11) NOT NULL,
  `id_user_bendahara` int(11) NOT NULL,
  `id_user_kasir` int(11) NOT NULL,
  `jumlah_setoran` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `tanggal_awal` datetime NOT NULL,
  `tanggal_akhir` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `pendapatan_kas_masuk`
--

INSERT INTO `pendapatan_kas_masuk` (`id`, `id_user_bendahara`, `id_user_kasir`, `jumlah_setoran`, `tanggal`, `tanggal_awal`, `tanggal_akhir`) VALUES
(2, 1, 1, '120000', '2019-08-02', '2019-07-02 00:00:00', '2019-07-31 00:00:00'),
(3, 1, 1, '12000000', '2019-08-02', '2019-07-02 00:00:00', '2019-07-31 00:00:00'),
(4, 2, 1, '9000000', '2019-08-22', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran_cabang_alat`
--

CREATE TABLE `pengeluaran_cabang_alat` (
  `id_pengeluaran_cabang` int(11) NOT NULL,
  `id_resto` int(11) NOT NULL,
  `id_kanwil` int(11) NOT NULL,
  `id_alat` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `masa_pemanfatan` varchar(100) NOT NULL,
  `nominal` varchar(100) NOT NULL,
  `nominal_penyusutan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `pengeluaran_cabang_alat`
--

INSERT INTO `pengeluaran_cabang_alat` (`id_pengeluaran_cabang`, `id_resto`, `id_kanwil`, `id_alat`, `tanggal`, `jumlah`, `masa_pemanfatan`, `nominal`, `nominal_penyusutan`) VALUES
(1, 1, 1, 1, '2019-08-22', '2', '2 bulan', '10000', 10),
(4, 1, 1, 1, '2019-08-22', '2', '11 bulan', '10000', 10),
(5, 1, 1, 1, '2019-08-22', '1', '12 bulan', '1000', 10),
(6, 1, 1, 1, '2019-08-22', '1', '12 bulan', '10', 10),
(7, 1, 1, 1, '2019-08-22', '1', '11 bulan', '1000', 20);

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran_cabang_operasional`
--

CREATE TABLE `pengeluaran_cabang_operasional` (
  `id` int(11) NOT NULL,
  `id_resto` int(11) NOT NULL,
  `id_kanwil` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_operasional` int(11) NOT NULL,
  `nominal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `pengeluaran_cabang_operasional`
--

INSERT INTO `pengeluaran_cabang_operasional` (`id`, `id_resto`, `id_kanwil`, `tanggal`, `id_operasional`, `nominal`) VALUES
(1, 1, 1, '2019-08-22', 1, '5000'),
(2, 1, 1, '2019-08-22', 1, '90');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran_kanwil_operasional`
--

CREATE TABLE `pengeluaran_kanwil_operasional` (
  `id` int(11) NOT NULL,
  `id_kanwil` int(11) NOT NULL,
  `id_operasional` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nominal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `pengeluaran_kanwil_operasional`
--

INSERT INTO `pengeluaran_kanwil_operasional` (`id`, `id_kanwil`, `id_operasional`, `tanggal`, `nominal`) VALUES
(1, 1, 1, '2019-08-22', '5000'),
(2, 1, 1, '2019-08-22', '90'),
(3, 1, 1, '2019-08-22', '100'),
(4, 1, 1, '2019-08-22', '2000');

-- --------------------------------------------------------

--
-- Table structure for table `peralatan`
--

CREATE TABLE `peralatan` (
  `id` int(11) NOT NULL,
  `id_resto` int(11) NOT NULL,
  `nama_peralatan` varchar(100) NOT NULL,
  `jumlah_stok` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `peralatan`
--

INSERT INTO `peralatan` (`id`, `id_resto`, `nama_peralatan`, `jumlah_stok`, `harga_satuan`) VALUES
(1, 1, 'sendok', 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `permintaan_bahan`
--

CREATE TABLE `permintaan_bahan` (
  `id_permintaan` int(11) NOT NULL,
  `id_user_resto_produksi_adminresto` varchar(30) NOT NULL,
  `id_user_kanwil_logistik` varchar(20) NOT NULL,
  `nama_permintaan` varchar(20) NOT NULL,
  `tanggal_permintaan` varchar(20) NOT NULL,
  `tanggal_pengiriman` varchar(20) NOT NULL,
  `tanggal_penerimaan` varchar(20) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `permintaan_bahan`
--

INSERT INTO `permintaan_bahan` (`id_permintaan`, `id_user_resto_produksi_adminresto`, `id_user_kanwil_logistik`, `nama_permintaan`, `tanggal_permintaan`, `tanggal_pengiriman`, `tanggal_penerimaan`, `status`) VALUES
(105, '3', '3', 'permintaan 1', '2019-07-31 04:05:39', '2019-07-31 04:06:20', '2019-07-31 04:08:19', 'diterima'),
(106, '3', '3', 'permintaan 10', '2019-07-31 19:52:43', '2019-07-31 19:53:23', '2019-07-31 20:36:02', 'diterima'),
(107, '3', '3', 'permintaan 2', '2019-07-31 23:54:40', '2019-07-31 23:55:19', '0000-00-00 00:00:00', 'proses pengiriman'),
(108, '3', '3', 'permintaan 6', '2019-08-03 21:09:10', '2019-08-03 21:10:02', '2019-08-03 21:10:59', 'diterima'),
(109, '3', '3', 'permintaan 5', '2019-08-03 23:19:44', '2019-08-03 23:21:43', '2019-08-03 23:22:11', 'diterima'),
(111, '3', '3', 'permintaan 11', '2019-08-08 22:14:38', '2019-08-08 22:15:05', '2019-08-08 22:19:26', 'diterima'),
(121, '3', '3', 'permintaan 22', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'draft'),
<<<<<<< HEAD
=======
(122, '3', '3', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'draft'),
>>>>>>> 4c77bc07fbeb99c9c53e982b89438da17bc7c334
(123, '3', '3', 'permintaan 25', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'draft'),
(125, '4', '3', 'permintaan1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'draft'),
(126, '3', '3', 'permintaan 2', '2019-09-29 12:27:46', '2019-09-29 12:28:11', '2019-09-29 12:28:31', 'diterima');

-- --------------------------------------------------------

--
-- Table structure for table `permintaan_bahan_detail`
--

CREATE TABLE `permintaan_bahan_detail` (
  `id_detail_permintaan` int(15) NOT NULL,
  `id_permintaan` varchar(15) NOT NULL,
  `id_bahan_mentah` varchar(15) NOT NULL,
  `jumlah_permintaan` varchar(15) NOT NULL,
  `satuan_harga_per_satuan_bahan` varchar(15) NOT NULL,
  `status_penerimaan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `permintaan_bahan_detail`
--

INSERT INTO `permintaan_bahan_detail` (`id_detail_permintaan`, `id_permintaan`, `id_bahan_mentah`, `jumlah_permintaan`, `satuan_harga_per_satuan_bahan`, `status_penerimaan`) VALUES
(32, '105', '1', '19', '20000', 'sesuai'),
(33, '105', '2', '80', '50000', 'tidak sesuai'),
(34, '106', '1', '90', '7000', 'tidak sesuai'),
(35, '106', '2', '70', '20000', 'sesuai'),
(36, '107', '1', '80', '20000', 'tidak sesuai'),
(38, '107', '2', '20', '1000', 'sesuai'),
(39, '108', '1', '90', '200', 'sesuai'),
(40, '108', '2', '20', '10000', 'tidak sesuai'),
(41, '109', '1', '20', '20000', 'sesuai'),
(42, '109', '2', '50', '1000', 'tidak sesuai'),
(43, '126', '2', '2', '9000', 'tidak sesuai');

-- --------------------------------------------------------

--
-- Table structure for table `permintaan_bahan_tidak_sesuai`
--

CREATE TABLE `permintaan_bahan_tidak_sesuai` (
  `id_permintaan_bahan_tidak_sesuai` int(50) NOT NULL,
  `id_detail_permintaan` varchar(50) NOT NULL,
  `jumlah_bahan_terkirim` int(11) NOT NULL,
  `selisih_bahan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `permintaan_bahan_tidak_sesuai`
--

INSERT INTO `permintaan_bahan_tidak_sesuai` (`id_permintaan_bahan_tidak_sesuai`, `id_detail_permintaan`, `jumlah_bahan_terkirim`, `selisih_bahan`) VALUES
(12, '33', 70, '10'),
(15, '34', 80, '10'),
(16, '36', 70, '10'),
(17, '40', 10, '10'),
(18, '42', 90, '40'),
(19, '43', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `produksi`
--

CREATE TABLE `produksi` (
  `id` int(11) NOT NULL,
  `id_menu_masakan` int(11) NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `produksi_bahan_olahan`
--

CREATE TABLE `produksi_bahan_olahan` (
  `id` int(11) NOT NULL,
  `id_bahan_mentah` int(11) NOT NULL,
  `id_bahan_olahan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produksi_bahan_olahan`
--

INSERT INTO `produksi_bahan_olahan` (`id`, `id_bahan_mentah`, `id_bahan_olahan`, `jumlah`, `tanggal`) VALUES
(2, 1, 1, 1, '2019-10-09'),
(3, 1, 1, 1, '2019-10-09'),
(4, 1, 1, 1, '2019-10-09');

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- Table structure for table `produksi_masakan`
--

CREATE TABLE `produksi_masakan` (
  `id` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_masakan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produksi_masakan`
--

INSERT INTO `produksi_masakan` (`id`, `id_menu`, `tanggal`, `jumlah_masakan`) VALUES
(1, 1, '2019-10-10', 10);

-- --------------------------------------------------------

--
=======
>>>>>>> 4c77bc07fbeb99c9c53e982b89438da17bc7c334
-- Table structure for table `resto`
--

CREATE TABLE `resto` (
  `id` int(11) NOT NULL,
  `id_kanwil` int(11) NOT NULL,
  `nama_resto` varchar(11) NOT NULL,
  `alamat` varchar(11) NOT NULL,
  `no_telp` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `resto`
--

INSERT INTO `resto` (`id`, `id_kanwil`, `nama_resto`, `alamat`, `no_telp`) VALUES
(1, 1, 'resto farma', 'blabak', '085376372');

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- Table structure for table `stok_bahan_mentah_produksi`
--

CREATE TABLE `stok_bahan_mentah_produksi` (
  `id` int(11) NOT NULL,
  `id_bahan_mentah` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok_bahan_mentah_produksi`
--

INSERT INTO `stok_bahan_mentah_produksi` (`id`, `id_bahan_mentah`, `stok`) VALUES
(1, 1, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `stok_bahan_olahan_produksi`
--

CREATE TABLE `stok_bahan_olahan_produksi` (
  `id` int(11) NOT NULL,
  `id_bahan_olahan` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok_bahan_olahan_produksi`
--

INSERT INTO `stok_bahan_olahan_produksi` (`id`, `id_bahan_olahan`, `stok`) VALUES
(1, 1, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
=======
>>>>>>> 4c77bc07fbeb99c9c53e982b89438da17bc7c334
-- Table structure for table `superadmin`
--

CREATE TABLE `superadmin` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `user` varchar(12) NOT NULL,
  `pass` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `create_at` datetime DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`id`, `nama`, `user`, `pass`, `alamat`, `telp`, `email`, `create_at`, `update_at`) VALUES
(1, 'dedy ardiansyah', 'dedi', 'dedi', 'blitar', '08546464664', 'dedi@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengeluaran_kebutuhan`
--

CREATE TABLE `tbl_pengeluaran_kebutuhan` (
  `id_pengeluaran_kebutuhan` int(11) NOT NULL,
  `nama` varchar(300) DEFAULT NULL,
  `nominal_pengeluaran_kebutuhan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_pengeluaran_kebutuhan`
--

INSERT INTO `tbl_pengeluaran_kebutuhan` (`id_pengeluaran_kebutuhan`, `nama`, `nominal_pengeluaran_kebutuhan`) VALUES
(2, 'Bahan Bakar Masak', 100000),
(3, 'Transportasi', 200000);

-- --------------------------------------------------------

--
-- Table structure for table `user_kanwil`
--

CREATE TABLE `user_kanwil` (
  `id` int(11) NOT NULL,
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
  `tipe` enum('general manajer','bendahara','logistik') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `user_kanwil`
--

INSERT INTO `user_kanwil` (`id`, `id_super_admin`, `id_kanwil`, `nama`, `user`, `pass`, `alamat`, `telp`, `email`, `create_at`, `update_at`, `tipe`) VALUES
(1, 1, 1, 'indah', 'indah', 'indah', 'ngronggo', '2222222', 'indah@gmail.com', '2019-05-08 00:42:08', '2019-05-08 00:42:08', 'general manajer'),
(2, 1, 1, 'tria', 'tria', 'tria', 'ngronggo', '12121212', 'tria@gmail.com', '2019-05-08 00:42:08', '2019-05-08 00:42:08', 'bendahara'),
(3, 1, 1, 'wiwin', 'wiwin', 'wiwin', 'ngronggo', '098336366363', 'wiwin@gmail.com', '2019-05-08 00:42:08', '2019-05-08 00:42:08', 'logistik');

-- --------------------------------------------------------

--
-- Table structure for table `user_resto`
--

CREATE TABLE `user_resto` (
  `id` int(11) NOT NULL,
  `id_kanwil` int(11) NOT NULL,
  `id_resto` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `telp` varchar(12) NOT NULL,
  `jenis` enum('admin resto','kasir','waiters','produksi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `user_resto`
--

INSERT INTO `user_resto` (`id`, `id_kanwil`, `id_resto`, `user`, `pass`, `nama`, `alamat`, `telp`, `jenis`) VALUES
(1, 1, 1, 'debi', 'debi', 'debi', 'nganjuk', '085646898767', 'kasir'),
(2, 1, 1, 'wahyu', 'wahyu', 'wahyu', 'mojoroto', '085646898767', 'waiters'),
(3, 1, 1, 'fauzin', 'fauzin', 'fauzin', 'gampengrejo', '085646898767', 'produksi'),
(4, 1, 1, 'rifangi', 'rifangi', 'rifangi', 'nganjuk', '085646898767', 'admin resto');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan_mentah`
--
ALTER TABLE `bahan_mentah`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
<<<<<<< HEAD
-- Indexes for table `bahan_mentah_masakan`
--
ALTER TABLE `bahan_mentah_masakan`
  ADD PRIMARY KEY (`id`);

--
=======
>>>>>>> 4c77bc07fbeb99c9c53e982b89438da17bc7c334
-- Indexes for table `bahan_olahan`
--
ALTER TABLE `bahan_olahan`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
<<<<<<< HEAD
-- Indexes for table `bahan_olahan_masakan`
--
ALTER TABLE `bahan_olahan_masakan`
  ADD PRIMARY KEY (`id`);

--
=======
>>>>>>> 4c77bc07fbeb99c9c53e982b89438da17bc7c334
-- Indexes for table `biaya_lain`
--
ALTER TABLE `biaya_lain`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `daftar_masakan`
--
ALTER TABLE `daftar_masakan`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
<<<<<<< HEAD
-- Indexes for table `detail_paket`
--
ALTER TABLE `detail_paket`
=======
-- Indexes for table `detil_paket`
--
ALTER TABLE `detil_paket`
>>>>>>> 4c77bc07fbeb99c9c53e982b89438da17bc7c334
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `insentif`
--
ALTER TABLE `insentif`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `investasi_kanwil`
--
ALTER TABLE `investasi_kanwil`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `investasi_owner`
--
ALTER TABLE `investasi_owner`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `jenis_masakan`
--
ALTER TABLE `jenis_masakan`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `kanwil`
--
ALTER TABLE `kanwil`
  ADD PRIMARY KEY (`id_kanwil`) USING BTREE;

--
-- Indexes for table `logistik`
--
ALTER TABLE `logistik`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `omset_investasi`
--
ALTER TABLE `omset_investasi`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `operasional`
--
ALTER TABLE `operasional`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `pembelian_alat`
--
ALTER TABLE `pembelian_alat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelian_bahan_mentah`
--
ALTER TABLE `pembelian_bahan_mentah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemberian_kaskeluar`
--
ALTER TABLE `pemberian_kaskeluar`
  ADD PRIMARY KEY (`id_pengeluaran`) USING BTREE;

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `pemesanan_menu`
--
ALTER TABLE `pemesanan_menu`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `pemesanan_paket`
--
ALTER TABLE `pemesanan_paket`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `pendapatan_kas_masuk`
--
ALTER TABLE `pendapatan_kas_masuk`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `pengeluaran_cabang_alat`
--
ALTER TABLE `pengeluaran_cabang_alat`
  ADD PRIMARY KEY (`id_pengeluaran_cabang`) USING BTREE;

--
-- Indexes for table `pengeluaran_cabang_operasional`
--
ALTER TABLE `pengeluaran_cabang_operasional`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `pengeluaran_kanwil_operasional`
--
ALTER TABLE `pengeluaran_kanwil_operasional`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `peralatan`
--
ALTER TABLE `peralatan`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `permintaan_bahan`
--
ALTER TABLE `permintaan_bahan`
  ADD PRIMARY KEY (`id_permintaan`) USING BTREE;

--
-- Indexes for table `permintaan_bahan_detail`
--
ALTER TABLE `permintaan_bahan_detail`
  ADD PRIMARY KEY (`id_detail_permintaan`) USING BTREE;

--
-- Indexes for table `permintaan_bahan_tidak_sesuai`
--
ALTER TABLE `permintaan_bahan_tidak_sesuai`
  ADD PRIMARY KEY (`id_permintaan_bahan_tidak_sesuai`) USING BTREE;

--
-- Indexes for table `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `produksi_bahan_olahan`
--
ALTER TABLE `produksi_bahan_olahan`
  ADD PRIMARY KEY (`id`);

--
<<<<<<< HEAD
-- Indexes for table `produksi_masakan`
--
ALTER TABLE `produksi_masakan`
  ADD PRIMARY KEY (`id`);

--
=======
>>>>>>> 4c77bc07fbeb99c9c53e982b89438da17bc7c334
-- Indexes for table `resto`
--
ALTER TABLE `resto`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
<<<<<<< HEAD
-- Indexes for table `stok_bahan_mentah_produksi`
--
ALTER TABLE `stok_bahan_mentah_produksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stok_bahan_olahan_produksi`
--
ALTER TABLE `stok_bahan_olahan_produksi`
  ADD PRIMARY KEY (`id`);

--
=======
>>>>>>> 4c77bc07fbeb99c9c53e982b89438da17bc7c334
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_pengeluaran_kebutuhan`
--
ALTER TABLE `tbl_pengeluaran_kebutuhan`
  ADD PRIMARY KEY (`id_pengeluaran_kebutuhan`) USING BTREE;

--
-- Indexes for table `user_kanwil`
--
ALTER TABLE `user_kanwil`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `user_resto`
--
ALTER TABLE `user_resto`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahan_mentah`
--
ALTER TABLE `bahan_mentah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
<<<<<<< HEAD
-- AUTO_INCREMENT for table `bahan_mentah_masakan`
--
ALTER TABLE `bahan_mentah_masakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
=======
>>>>>>> 4c77bc07fbeb99c9c53e982b89438da17bc7c334
-- AUTO_INCREMENT for table `bahan_olahan`
--
ALTER TABLE `bahan_olahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
<<<<<<< HEAD
-- AUTO_INCREMENT for table `bahan_olahan_masakan`
--
ALTER TABLE `bahan_olahan_masakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
=======
>>>>>>> 4c77bc07fbeb99c9c53e982b89438da17bc7c334
-- AUTO_INCREMENT for table `biaya_lain`
--
ALTER TABLE `biaya_lain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `daftar_masakan`
--
ALTER TABLE `daftar_masakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
<<<<<<< HEAD
-- AUTO_INCREMENT for table `detail_paket`
--
ALTER TABLE `detail_paket`
=======
-- AUTO_INCREMENT for table `detil_paket`
--
ALTER TABLE `detil_paket`
>>>>>>> 4c77bc07fbeb99c9c53e982b89438da17bc7c334
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `insentif`
--
ALTER TABLE `insentif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `investasi_kanwil`
--
ALTER TABLE `investasi_kanwil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `investasi_owner`
--
ALTER TABLE `investasi_owner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `jenis_masakan`
--
ALTER TABLE `jenis_masakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kanwil`
--
ALTER TABLE `kanwil`
  MODIFY `id_kanwil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `logistik`
--
ALTER TABLE `logistik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `meja`
--
ALTER TABLE `meja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
>>>>>>> 4c77bc07fbeb99c9c53e982b89438da17bc7c334
--
-- AUTO_INCREMENT for table `omset_investasi`
--
ALTER TABLE `omset_investasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `operasional`
--
ALTER TABLE `operasional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `pembelian_alat`
--
ALTER TABLE `pembelian_alat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pembelian_bahan_mentah`
--
ALTER TABLE `pembelian_bahan_mentah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pemberian_kaskeluar`
--
ALTER TABLE `pemberian_kaskeluar`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pemesanan_menu`
--
ALTER TABLE `pemesanan_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `pemesanan_paket`
--
ALTER TABLE `pemesanan_paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `pendapatan_kas_masuk`
--
ALTER TABLE `pendapatan_kas_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pengeluaran_cabang_alat`
--
ALTER TABLE `pengeluaran_cabang_alat`
  MODIFY `id_pengeluaran_cabang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pengeluaran_cabang_operasional`
--
ALTER TABLE `pengeluaran_cabang_operasional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pengeluaran_kanwil_operasional`
--
ALTER TABLE `pengeluaran_kanwil_operasional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `peralatan`
--
ALTER TABLE `peralatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `permintaan_bahan`
--
ALTER TABLE `permintaan_bahan`
  MODIFY `id_permintaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
--
-- AUTO_INCREMENT for table `permintaan_bahan_detail`
--
ALTER TABLE `permintaan_bahan_detail`
  MODIFY `id_detail_permintaan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `permintaan_bahan_tidak_sesuai`
--
ALTER TABLE `permintaan_bahan_tidak_sesuai`
  MODIFY `id_permintaan_bahan_tidak_sesuai` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `produksi`
--
ALTER TABLE `produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produksi_bahan_olahan`
--
ALTER TABLE `produksi_bahan_olahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
<<<<<<< HEAD
-- AUTO_INCREMENT for table `produksi_masakan`
--
ALTER TABLE `produksi_masakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
=======
>>>>>>> 4c77bc07fbeb99c9c53e982b89438da17bc7c334
-- AUTO_INCREMENT for table `resto`
--
ALTER TABLE `resto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
<<<<<<< HEAD
-- AUTO_INCREMENT for table `stok_bahan_mentah_produksi`
--
ALTER TABLE `stok_bahan_mentah_produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `stok_bahan_olahan_produksi`
--
ALTER TABLE `stok_bahan_olahan_produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
=======
>>>>>>> 4c77bc07fbeb99c9c53e982b89438da17bc7c334
-- AUTO_INCREMENT for table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_pengeluaran_kebutuhan`
--
ALTER TABLE `tbl_pengeluaran_kebutuhan`
  MODIFY `id_pengeluaran_kebutuhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_kanwil`
--
ALTER TABLE `user_kanwil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_resto`
--
ALTER TABLE `user_resto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
