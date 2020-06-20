-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 23, 2019 at 11:03 PM
-- Server version: 10.3.18-MariaDB-1:10.3.18+maria~bionic-log
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
(1, '1', 3, 'ayam kampung', 'ekor', 28, 1),
(2, '1', 3, 'tomat', 'kg', 9, 1),
(3, '1', 3, 'tepung', 'kg', 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bahan_mentah_masakan`
--

CREATE TABLE `bahan_mentah_masakan` (
  `id` int(11) NOT NULL,
  `id_produksi_masakan` int(11) NOT NULL,
  `id_bahan_mentah` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `bahan_mentah_masakan`
--

INSERT INTO `bahan_mentah_masakan` (`id`, `id_produksi_masakan`, `id_bahan_mentah`, `jumlah`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
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
(1, 3, 'ayam kampung paha', 'buah', 4, 1),
(3, 3, 'ayam kampung dada', 'buah', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bahan_olahan_masakan`
--

CREATE TABLE `bahan_olahan_masakan` (
  `id` int(11) NOT NULL,
  `id_produksi_masakan` int(11) NOT NULL,
  `id_bahan_olahan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `bahan_olahan_masakan`
--

INSERT INTO `bahan_olahan_masakan` (`id`, `id_produksi_masakan`, `id_bahan_olahan`, `jumlah`) VALUES
(4, 2, 1, 1),
(5, 1, 1, 1);

-- --------------------------------------------------------

--
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
-- Table structure for table `detail_paket`
--

CREATE TABLE `detail_paket` (
  `id` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` varchar(100) NOT NULL,
  `diskon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `detail_paket`
--

INSERT INTO `detail_paket` (`id`, `id_paket`, `id_menu`, `jumlah`, `total_harga`, `diskon`) VALUES
(11, 4, 1, 1, '10000', '');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian_alat`
--

CREATE TABLE `detail_pembelian_alat` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(255) DEFAULT NULL,
  `id_alat` varchar(255) DEFAULT NULL,
  `jumlah` varchar(255) DEFAULT NULL,
  `harga_beli` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `detail_pembelian_alat`
--

INSERT INTO `detail_pembelian_alat` (`id`, `id_transaksi`, `id_alat`, `jumlah`, `harga_beli`) VALUES
(12, '1', '1', '1', '8000'),
(13, '6', '1', '7', '7000'),
(14, '7', '1', '1', '9000');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian_bahan_mentah`
--

CREATE TABLE `detail_pembelian_bahan_mentah` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(255) DEFAULT NULL,
  `id_bahan_mentah` varchar(255) DEFAULT NULL,
  `jumlah` varchar(255) DEFAULT NULL,
  `harga_beli` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `detail_pembelian_bahan_mentah`
--

INSERT INTO `detail_pembelian_bahan_mentah` (`id`, `id_transaksi`, `id_bahan_mentah`, `jumlah`, `harga_beli`) VALUES
(2, '1', '1', '2', '5000'),
(3, '1', '2', '1', '5000'),
(4, '1', '3', '2', '3000'),
(5, '1', '3', '2', '3000'),
(6, '1', '1', '1', '5000'),
(7, '1', '2', '5', '5000'),
(8, '2', '1', '1', '6000');

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
-- Table structure for table `investasi_cabang`
--

CREATE TABLE `investasi_cabang` (
  `id` int(11) NOT NULL,
  `id_resto` int(11) NOT NULL,
  `id_user_bendahara` int(11) NOT NULL,
  `nama_investasi` varchar(500) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `jumlah_pengeluaran` int(11) NOT NULL,
  `persen_penyusutan` int(11) DEFAULT NULL,
  `status` enum('invest dikembalikan','invest belum kembali') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `investasi_cabang`
--

INSERT INTO `investasi_cabang` (`id`, `id_resto`, `id_user_bendahara`, `nama_investasi`, `tanggal_mulai`, `tanggal_selesai`, `jumlah_pengeluaran`, `persen_penyusutan`, `status`) VALUES
(4, 1, 2, 'Dekorasi', '2019-10-01', '2019-10-31', 20000, 10, 'invest dikembalikan'),
(5, 1, 2, 'Renovasi', '2019-10-01', '2019-10-30', 5000, 20, 'invest dikembalikan'),
(6, 1, 2, 'Pembelian p', '2019-10-01', '2019-10-30', 500000, 20, 'invest dikembalikan');

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
(1, 1, 'Ayam Geprek', 'nasibebek.jpg', 10000, 'tersedia', 5, 'insert'),
(2, 1, 'Jamur Kripsi', '124789-mint-background-2560x1600-for-ios.jpg', 10000, 'tersedia', 1, 'insert'),
(3, 1, 'Es Teh Anget', '124789-mint-background-2560x1600-for-ios4.jpg', 10000, 'tersedia', 10, 'insert'),
(4, 1, 'Kopi Susu', 'start4.jpg', 3000, 'tersedia', 6, 'insert'),
(5, 1, 'Nasi Goreng', 'start2.png', 3000, 'tersedia', 6, 'insert'),
(6, 1, 'Tahu Kripsi', 'wp2754931.jpg', 6000, 'tersedia', 1, 'insert');

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
  `nama_pengeluaran` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `operasional`
--

INSERT INTO `operasional` (`id`, `nama_pengeluaran`) VALUES
(1, 'listrik'),
(2, 'internet'),
(3, 'komunikasi'),
(4, 'promosi'),
(5, 'transportas');

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
(1, 1, 'Paket Bom', 10, 'tersedia', 'gepreksai3.jpg', '8000', 'insert'),
(2, 1, 'Paket Granat', 10, 'tersedia', '', '20000', 'insert'),
(3, 1, 'Paket asoy', 5, 'tersedia', '', '30000', 'insert');

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
  `id_logistik` int(11) NOT NULL,
  `no_transaksi` varchar(255) DEFAULT NULL,
  `nama_supplier` varchar(255) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `total_harga_beli` int(100) NOT NULL,
  `dibayar` int(100) NOT NULL,
  `status` enum('draft','selesai') DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `pembelian_alat`
--

INSERT INTO `pembelian_alat` (`id`, `id_logistik`, `no_transaksi`, `nama_supplier`, `tanggal`, `total_harga_beli`, `dibayar`, `status`, `catatan`) VALUES
(5, 3, '1', 'fauzin', '2019-10-16', 8000, 8000, 'selesai', 'ok'),
(6, 3, '6', '', '2019-10-16', 49000, 49000, 'selesai', 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_bahan_mentah`
--

CREATE TABLE `pembelian_bahan_mentah` (
  `id` int(11) NOT NULL,
  `id_logistik` int(255) DEFAULT NULL,
  `no_transaksi` int(255) DEFAULT NULL,
  `nama_supplier` varchar(255) DEFAULT NULL,
  `tanggal` varchar(255) DEFAULT NULL,
  `total_harga_beli` varchar(255) DEFAULT NULL,
  `dibayar` varchar(255) DEFAULT NULL,
  `status` enum('draft','selesai') DEFAULT NULL,
  `catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `pembelian_bahan_mentah`
--

INSERT INTO `pembelian_bahan_mentah` (`id`, `id_logistik`, `no_transaksi`, `nama_supplier`, `tanggal`, `total_harga_beli`, `dibayar`, `status`, `catatan`) VALUES
(4, 3, 1, 'fauzin', '2019-10-16', '57000', '57000', 'selesai', 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `pemberian_kaskeluar`
--

CREATE TABLE `pemberian_kaskeluar` (
  `id_pengeluaran` int(11) NOT NULL,
  `id_bendahara` int(255) DEFAULT NULL,
  `id_resto` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nominal_kas_keluar` int(100) NOT NULL,
  `status` enum('pengajuan','pemberian') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `pemberian_kaskeluar`
--

INSERT INTO `pemberian_kaskeluar` (`id_pengeluaran`, `id_bendahara`, `id_resto`, `tanggal`, `nominal_kas_keluar`, `status`) VALUES
(1, 2, 1, '2019-06-26', 400000, 'pemberian'),
(6, 2, 1, '2019-10-19', 60000, 'pemberian'),
(7, 2, 1, '2019-10-20', 60000, 'pemberian');

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
(1, 'irhas', 4, 'sambel banyak tapi sedikit', '2019-10-02 10:34:01', 196000, 2, 'siapsaji'),
(2, 'fauzin', 3, 'bumbu sedikit', '2019-09-29 11:09:54', 52000, 2, 'siapsaji'),
(3, 'wahyu', 6, 'gelas besar', '2019-09-29 11:10:37', 3000, 2, 'siapsaji');

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
-- Table structure for table `pengeluaran_cabang_operasional`
--

CREATE TABLE `pengeluaran_cabang_operasional` (
  `id` int(11) NOT NULL,
  `id_admin_resto` int(255) DEFAULT NULL,
  `id_resto` int(11) NOT NULL,
  `id_kanwil` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_operasional` int(11) NOT NULL,
  `masa_sewa` varchar(11) DEFAULT NULL,
  `nominal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `pengeluaran_cabang_operasional`
--

INSERT INTO `pengeluaran_cabang_operasional` (`id`, `id_admin_resto`, `id_resto`, `id_kanwil`, `tanggal`, `id_operasional`, `masa_sewa`, `nominal`) VALUES
(1, 4, 1, 1, '2019-10-02', 1, '1 bulan', '5000'),
(2, 4, 1, 1, '2019-10-03', 1, '2 bulan', '90'),
(3, 4, 1, 1, '2019-10-19', 0, '2 hari', '10000');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran_kanwil_operasional`
--

CREATE TABLE `pengeluaran_kanwil_operasional` (
  `id` int(11) NOT NULL,
  `id_kanwil` int(11) NOT NULL,
  `id_operasional` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `masa_sewa` varchar(255) DEFAULT NULL,
  `nominal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `pengeluaran_kanwil_operasional`
--

INSERT INTO `pengeluaran_kanwil_operasional` (`id`, `id_kanwil`, `id_operasional`, `tanggal`, `masa_sewa`, `nominal`) VALUES
(1, 1, 1, '2019-10-02', '1 bulan', '5000'),
(3, 1, 1, '2019-10-03', '1 bulan', '100'),
(4, 1, 1, '2019-10-04', '1 bulan', '2000');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman_bahan_mentah`
--

CREATE TABLE `pengiriman_bahan_mentah` (
  `id` int(11) NOT NULL,
  `id_permintaan` int(11) NOT NULL,
  `id_bahan_mentah` int(11) NOT NULL,
  `tanggal_pengiriman` date NOT NULL,
  `jumlah_permintaan` int(11) NOT NULL,
  `jumlah_dikirim` int(11) NOT NULL,
  `jumlah_dikembalikan` int(11) NOT NULL,
  `status` enum('sesuai','tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengiriman_bahan_mentah`
--

INSERT INTO `pengiriman_bahan_mentah` (`id`, `id_permintaan`, `id_bahan_mentah`, `tanggal_pengiriman`, `jumlah_permintaan`, `jumlah_dikirim`, `jumlah_dikembalikan`, `status`) VALUES
(1, 3, 1, '2019-10-22', 2, 4, 2, 'tidak');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman_bahan_olahan`
--

CREATE TABLE `pengiriman_bahan_olahan` (
  `id` int(11) NOT NULL,
  `id_permintaan` int(11) NOT NULL,
  `id_bahan_olahan` int(11) NOT NULL,
  `tanggal_pengiriman` date NOT NULL,
  `jumlah_permintaan` int(11) NOT NULL,
  `jumlah_dikirim` int(11) NOT NULL,
  `jumlah_dikembalikan` int(11) NOT NULL,
  `status` enum('sesuai','tidak','diterima') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengiriman_bahan_olahan`
--

INSERT INTO `pengiriman_bahan_olahan` (`id`, `id_permintaan`, `id_bahan_olahan`, `tanggal_pengiriman`, `jumlah_permintaan`, `jumlah_dikirim`, `jumlah_dikembalikan`, `status`) VALUES
(2, 2, 3, '2019-10-22', 4, 4, 0, 'diterima'),
(4, 1, 3, '0000-00-00', 1, 0, 0, 'tidak');

-- --------------------------------------------------------

--
-- Table structure for table `penyusutan_investasi_cabang`
--

CREATE TABLE `penyusutan_investasi_cabang` (
  `id_penyusutan` int(11) NOT NULL,
  `id_investasi_cabang` int(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `nominal_penyusutan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `penyusutan_investasi_cabang`
--

INSERT INTO `penyusutan_investasi_cabang` (`id_penyusutan`, `id_investasi_cabang`, `tanggal`, `nominal_penyusutan`) VALUES
(4, 6, '2019-10-20', '100000'),
(5, 6, '2019-10-20', '100000'),
(6, 6, '2019-10-20', '100000'),
(7, 6, '2019-10-20', '100000'),
(8, 6, '2019-10-20', '100000'),
(9, 4, '2019-10-20', '2000'),
(10, 4, '2019-10-20', '2000'),
(11, 4, '2019-10-20', '2000'),
(12, 4, '2019-10-20', '2000'),
(13, 4, '2019-10-20', '2000'),
(14, 4, '2019-10-20', '2000'),
(15, 4, '2019-10-20', '2000'),
(16, 4, '2019-10-20', '2000'),
(17, 4, '2019-10-20', '2000'),
(18, 4, '2019-10-20', '2000');

-- --------------------------------------------------------

--
-- Table structure for table `peralatan`
--

CREATE TABLE `peralatan` (
  `id` int(11) NOT NULL,
  `id_logistik` int(255) DEFAULT NULL,
  `id_resto` int(11) NOT NULL,
  `nama_peralatan` varchar(100) NOT NULL,
  `satuan_besar` varchar(255) DEFAULT NULL,
  `jumlah_stok` int(11) NOT NULL,
  `status` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `peralatan`
--

INSERT INTO `peralatan` (`id`, `id_logistik`, `id_resto`, `nama_peralatan`, `satuan_besar`, `jumlah_stok`, `status`) VALUES
(1, 3, 1, 'sendok', 'pcs', 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `permintaan_alat`
--

CREATE TABLE `permintaan_alat` (
  `id_permintaan_alat` int(11) NOT NULL,
  `id_resto` int(11) NOT NULL,
  `id_kanwil` int(11) NOT NULL,
  `id_alat` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `masa_pemanfatan` varchar(100) NOT NULL,
  `status_permintaan` enum('permintaan','proses pengiriman','diterima') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `permintaan_alat`
--

INSERT INTO `permintaan_alat` (`id_permintaan_alat`, `id_resto`, `id_kanwil`, `id_alat`, `tanggal`, `jumlah`, `masa_pemanfatan`, `status_permintaan`) VALUES
(8, 1, 1, 1, '0000-00-00', '1', '2 bulan', 'diterima');

-- --------------------------------------------------------

--
-- Table structure for table `permintaan_bahan_mentah`
--

CREATE TABLE `permintaan_bahan_mentah` (
  `id` int(11) NOT NULL,
  `id_resto` int(11) NOT NULL,
  `id_user_produksi` int(11) NOT NULL,
  `nama_permintaan` varchar(500) NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('permintaan','pengiriman','diterima') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permintaan_bahan_mentah`
--

INSERT INTO `permintaan_bahan_mentah` (`id`, `id_resto`, `id_user_produksi`, `nama_permintaan`, `tanggal`, `status`) VALUES
(3, 1, 3, 'permintaan 3', '2019-11-04', 'permintaan');

-- --------------------------------------------------------

--
-- Table structure for table `permintaan_bahan_olahan`
--

CREATE TABLE `permintaan_bahan_olahan` (
  `id` int(11) NOT NULL,
  `id_resto` int(11) NOT NULL,
  `id_user_produksi` int(11) NOT NULL,
  `nama_permintaan` varchar(500) NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('permintaan','pengiriman','diterima') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permintaan_bahan_olahan`
--

INSERT INTO `permintaan_bahan_olahan` (`id`, `id_resto`, `id_user_produksi`, `nama_permintaan`, `tanggal`, `status`) VALUES
(1, 1, 3, 'Permintaan bahan olahan 1', '2019-10-22', 'permintaan'),
(2, 1, 3, 'permintaan 2', '2019-10-24', 'permintaan');

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
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `produksi_bahan_olahan`
--

INSERT INTO `produksi_bahan_olahan` (`id`, `id_bahan_mentah`, `id_bahan_olahan`, `jumlah`, `tanggal`) VALUES
(2, 1, 1, 1, '2019-10-09'),
(3, 1, 1, 1, '2019-10-09'),
(4, 1, 1, 1, '2019-10-09'),
(5, 1, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `produksi_masakan`
--

CREATE TABLE `produksi_masakan` (
  `id` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_masakan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `produksi_masakan`
--

INSERT INTO `produksi_masakan` (`id`, `id_menu`, `tanggal`, `jumlah_masakan`) VALUES
(1, 1, '2019-10-10', 10),
(2, 2, '2019-10-14', 1);

-- --------------------------------------------------------

--
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
-- Table structure for table `stok_bahan_mentah_produksi`
--

CREATE TABLE `stok_bahan_mentah_produksi` (
  `id` int(11) NOT NULL,
  `id_bahan_mentah` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `stok_bahan_mentah_produksi`
--

INSERT INTO `stok_bahan_mentah_produksi` (`id`, `id_bahan_mentah`, `stok`) VALUES
(1, 1, 21),
(2, 2, 51),
(3, 3, 10);

-- --------------------------------------------------------

--
-- Table structure for table `stok_bahan_olahan_produksi`
--

CREATE TABLE `stok_bahan_olahan_produksi` (
  `id` int(11) NOT NULL,
  `id_bahan_olahan` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `stok_bahan_olahan_produksi`
--

INSERT INTO `stok_bahan_olahan_produksi` (`id`, `id_bahan_olahan`, `stok`) VALUES
(1, 1, 2),
(2, 3, 5);

-- --------------------------------------------------------

--
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
-- Indexes for table `bahan_mentah_masakan`
--
ALTER TABLE `bahan_mentah_masakan`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `bahan_olahan`
--
ALTER TABLE `bahan_olahan`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `bahan_olahan_masakan`
--
ALTER TABLE `bahan_olahan_masakan`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
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
-- Indexes for table `detail_paket`
--
ALTER TABLE `detail_paket`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `detail_pembelian_alat`
--
ALTER TABLE `detail_pembelian_alat`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `detail_pembelian_bahan_mentah`
--
ALTER TABLE `detail_pembelian_bahan_mentah`
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
-- Indexes for table `investasi_cabang`
--
ALTER TABLE `investasi_cabang`
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
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `pembelian_bahan_mentah`
--
ALTER TABLE `pembelian_bahan_mentah`
  ADD PRIMARY KEY (`id`) USING BTREE;

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
-- Indexes for table `pengiriman_bahan_mentah`
--
ALTER TABLE `pengiriman_bahan_mentah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengiriman_bahan_olahan`
--
ALTER TABLE `pengiriman_bahan_olahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyusutan_investasi_cabang`
--
ALTER TABLE `penyusutan_investasi_cabang`
  ADD PRIMARY KEY (`id_penyusutan`) USING BTREE;

--
-- Indexes for table `peralatan`
--
ALTER TABLE `peralatan`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `permintaan_alat`
--
ALTER TABLE `permintaan_alat`
  ADD PRIMARY KEY (`id_permintaan_alat`) USING BTREE;

--
-- Indexes for table `permintaan_bahan_mentah`
--
ALTER TABLE `permintaan_bahan_mentah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permintaan_bahan_olahan`
--
ALTER TABLE `permintaan_bahan_olahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `produksi_bahan_olahan`
--
ALTER TABLE `produksi_bahan_olahan`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `produksi_masakan`
--
ALTER TABLE `produksi_masakan`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `resto`
--
ALTER TABLE `resto`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `stok_bahan_mentah_produksi`
--
ALTER TABLE `stok_bahan_mentah_produksi`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `stok_bahan_olahan_produksi`
--
ALTER TABLE `stok_bahan_olahan_produksi`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`id`) USING BTREE;

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
-- AUTO_INCREMENT for table `bahan_mentah_masakan`
--
ALTER TABLE `bahan_mentah_masakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bahan_olahan`
--
ALTER TABLE `bahan_olahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `bahan_olahan_masakan`
--
ALTER TABLE `bahan_olahan_masakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
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
-- AUTO_INCREMENT for table `detail_paket`
--
ALTER TABLE `detail_paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `detail_pembelian_alat`
--
ALTER TABLE `detail_pembelian_alat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `detail_pembelian_bahan_mentah`
--
ALTER TABLE `detail_pembelian_bahan_mentah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `insentif`
--
ALTER TABLE `insentif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `investasi_cabang`
--
ALTER TABLE `investasi_cabang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `omset_investasi`
--
ALTER TABLE `omset_investasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `operasional`
--
ALTER TABLE `operasional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pembelian_bahan_mentah`
--
ALTER TABLE `pembelian_bahan_mentah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pemberian_kaskeluar`
--
ALTER TABLE `pemberian_kaskeluar`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
-- AUTO_INCREMENT for table `pengeluaran_cabang_operasional`
--
ALTER TABLE `pengeluaran_cabang_operasional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pengeluaran_kanwil_operasional`
--
ALTER TABLE `pengeluaran_kanwil_operasional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pengiriman_bahan_olahan`
--
ALTER TABLE `pengiriman_bahan_olahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `penyusutan_investasi_cabang`
--
ALTER TABLE `penyusutan_investasi_cabang`
  MODIFY `id_penyusutan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `peralatan`
--
ALTER TABLE `peralatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `permintaan_alat`
--
ALTER TABLE `permintaan_alat`
  MODIFY `id_permintaan_alat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `permintaan_bahan_mentah`
--
ALTER TABLE `permintaan_bahan_mentah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `permintaan_bahan_olahan`
--
ALTER TABLE `permintaan_bahan_olahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `produksi`
--
ALTER TABLE `produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produksi_bahan_olahan`
--
ALTER TABLE `produksi_bahan_olahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `produksi_masakan`
--
ALTER TABLE `produksi_masakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `resto`
--
ALTER TABLE `resto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `stok_bahan_mentah_produksi`
--
ALTER TABLE `stok_bahan_mentah_produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `stok_bahan_olahan_produksi`
--
ALTER TABLE `stok_bahan_olahan_produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
