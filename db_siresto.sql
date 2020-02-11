-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Feb 2020 pada 03.18
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Struktur dari tabel `bahan_jadi`
--

CREATE TABLE `bahan_jadi` (
  `id` int(11) NOT NULL,
  `nama_masakan` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `porsi` varchar(100) NOT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bahan_jadi`
--

INSERT INTO `bahan_jadi` (`id`, `nama_masakan`, `jumlah`, `porsi`, `status`) VALUES
(1, 'Sambal Tomat', 8, 'mangkuk sambel 2MIli', 'off'),
(3, 'Ayam Geprek', 1, 'satu porsi', 'on');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan_mentah`
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
-- Dumping data untuk tabel `bahan_mentah`
--

INSERT INTO `bahan_mentah` (`id`, `id_resto`, `id_logistik`, `nama_bahan`, `satuan_besar`, `stok`, `status`) VALUES
(1, '1', 3, 'ayam kampung', 'ekor', 24, 1),
(2, '1', 3, 'tomat', 'kg', 9, 1),
(3, '1', 3, 'tepung', 'kg', 7, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan_mentah_masakan`
--

CREATE TABLE `bahan_mentah_masakan` (
  `id` int(11) NOT NULL,
  `id_produksi_masakan` int(11) NOT NULL,
  `id_bahan_mentah` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `bahan_mentah_masakan`
--

INSERT INTO `bahan_mentah_masakan` (`id`, `id_produksi_masakan`, `id_bahan_mentah`, `jumlah`) VALUES
(1, 1, 1, 1),
(2, 2, 3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan_olahan`
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
-- Dumping data untuk tabel `bahan_olahan`
--

INSERT INTO `bahan_olahan` (`id`, `id_logistik`, `nama_bahan`, `satuan_kecil`, `stok`, `status`) VALUES
(1, 3, 'ayam kampung paha', 'buah', 4, 1),
(3, 3, 'ayam kampung dada', 'buah', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan_olahan_masakan`
--

CREATE TABLE `bahan_olahan_masakan` (
  `id` int(11) NOT NULL,
  `id_produksi_masakan` int(11) NOT NULL,
  `id_bahan_olahan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `bahan_olahan_masakan`
--

INSERT INTO `bahan_olahan_masakan` (`id`, `id_produksi_masakan`, `id_bahan_olahan`, `jumlah`) VALUES
(4, 2, 1, 1),
(5, 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `biaya_lain`
--

CREATE TABLE `biaya_lain` (
  `id` int(11) NOT NULL,
  `id_resto` int(11) NOT NULL,
  `nama_biaya_lain` varchar(10) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `biaya_lain`
--

INSERT INTO `biaya_lain` (`id`, `id_resto`, `nama_biaya_lain`, `jumlah`) VALUES
(1, 1, 'brosur', 10000),
(2, 1, 'zakat', 11000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_masakan`
--

CREATE TABLE `daftar_masakan` (
  `id` int(11) NOT NULL,
  `id_bahan_oalahan` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `daftar_masakan`
--

INSERT INTO `daftar_masakan` (`id`, `id_bahan_oalahan`, `id_menu`, `jenis`, `jumlah`) VALUES
(6, 1, 1, '3', 1),
(7, 2, 1, '1', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_paket`
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
-- Dumping data untuk tabel `detail_paket`
--

INSERT INTO `detail_paket` (`id`, `id_paket`, `id_menu`, `jumlah`, `total_harga`, `diskon`) VALUES
(11, 4, 1, 1, '10000', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pembelian_alat`
--

CREATE TABLE `detail_pembelian_alat` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(255) DEFAULT NULL,
  `id_alat` varchar(255) DEFAULT NULL,
  `jumlah` varchar(255) DEFAULT NULL,
  `harga_beli` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `detail_pembelian_alat`
--

INSERT INTO `detail_pembelian_alat` (`id`, `id_transaksi`, `id_alat`, `jumlah`, `harga_beli`) VALUES
(12, '1', '1', '1', '8000'),
(13, '6', '1', '7', '7000'),
(14, '7', '1', '1', '9000'),
(15, '7', '1', '30', '5000'),
(16, '7', '1', '10', '5000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pembelian_bahan_mentah`
--

CREATE TABLE `detail_pembelian_bahan_mentah` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(255) DEFAULT NULL,
  `id_bahan_mentah` varchar(255) DEFAULT NULL,
  `jumlah` varchar(255) DEFAULT NULL,
  `harga_beli` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `detail_pembelian_bahan_mentah`
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
-- Struktur dari tabel `detil_bahan_mentah`
--

CREATE TABLE `detil_bahan_mentah` (
  `id` int(11) NOT NULL,
  `id_bahan_mentah` int(11) NOT NULL,
  `satuan_kecil` varchar(199) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detil_bahan_mentah`
--

INSERT INTO `detil_bahan_mentah` (`id`, `id_bahan_mentah`, `satuan_kecil`, `stok`) VALUES
(1, 1, 'paha', 2),
(2, 2, 'biji', 50),
(3, 1, 'dada', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gaji`
--

CREATE TABLE `gaji` (
  `id` int(11) NOT NULL,
  `id_resto` int(11) NOT NULL,
  `id_user_resto` int(11) NOT NULL,
  `tanggal_awal` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `jenis_gaji` enum('bulanan','THR','bonus','pesangon') NOT NULL,
  `nominal_gaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `gaji`
--

INSERT INTO `gaji` (`id`, `id_resto`, `id_user_resto`, `tanggal_awal`, `tanggal_akhir`, `jenis_gaji`, `nominal_gaji`) VALUES
(5, 4, 23, '2020-01-01', '2020-01-31', 'bulanan', 2006000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gaji_kanwil`
--

CREATE TABLE `gaji_kanwil` (
  `id_gaji_kanwil` int(11) NOT NULL,
  `id_user_kanwil` int(11) DEFAULT NULL,
  `nominal_gaji` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gaji_kanwil`
--

INSERT INTO `gaji_kanwil` (`id_gaji_kanwil`, `id_user_kanwil`, `nominal_gaji`) VALUES
(1, 1, 3000000),
(2, 2, 3000000),
(3, 3, 3000000),
(4, 17, 3000000),
(5, 18, 3000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `insentif`
--

CREATE TABLE `insentif` (
  `id` int(11) NOT NULL,
  `id_resto` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_orderan` int(11) NOT NULL,
  `jumlah_insentif` int(11) NOT NULL,
  `id_gaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `intensif_waiters`
--

CREATE TABLE `intensif_waiters` (
  `id` int(11) NOT NULL,
  `id_user_resto` varchar(100) NOT NULL,
  `tanggal` varchar(100) DEFAULT NULL,
  `jumlah_bonus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `intensif_waiters`
--

INSERT INTO `intensif_waiters` (`id`, `id_user_resto`, `tanggal`, `jumlah_bonus`) VALUES
(30, '23', '2020-01-30 21:35:00', '1000'),
(31, '23', '2020-01-30 21:35:25', '1000'),
(32, '23', '2020-01-30 21:49:42', '1000'),
(33, '23', '2020-02-01 22:53:18', '1000'),
(34, '23', '2020-02-01 22:53:42', '1000'),
(35, '23', '2020-02-11 07:35:19', '1000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `investasi_cabang`
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
  `status` enum('permintaan','disetujui','invest dikembalikan','invest belum kembali') DEFAULT 'permintaan'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `investasi_cabang`
--

INSERT INTO `investasi_cabang` (`id`, `id_resto`, `id_user_bendahara`, `nama_investasi`, `tanggal_mulai`, `tanggal_selesai`, `jumlah_pengeluaran`, `persen_penyusutan`, `status`) VALUES
(4, 1, 2, 'Dekorasi', '2019-10-01', '2019-10-31', 20000, 10, 'disetujui'),
(5, 1, 2, 'Renovasi', '2019-10-01', '2019-10-30', 5000, 20, 'invest dikembalikan'),
(6, 1, 2, 'Pembelian p', '2019-10-01', '2019-10-30', 500000, 20, 'invest dikembalikan'),
(7, 1, 2, 'Pengecetan', '2019-10-01', '2019-10-30', 80000, 20, 'permintaan'),
(8, 1, 2, 'pembelian alat', '2019-10-01', '2019-10-30', 700000, 10, 'permintaan'),
(9, 3, 2, 'sewa ruko', '2020-01-14', '2025-01-14', 200000000, 10, 'permintaan'),
(10, 3, 2, 'renovasi', '2020-02-01', '2020-05-01', 50000000, 10, 'permintaan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `investasi_kanwil`
--

CREATE TABLE `investasi_kanwil` (
  `id` int(11) NOT NULL,
  `id_super_admin` int(11) NOT NULL,
  `id_kanwil` int(11) NOT NULL,
  `id_investasi_owner` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nominal_investasi` int(11) NOT NULL,
  `penyusutan` int(11) NOT NULL,
  `nominal_saldo` int(11) NOT NULL,
  `status` enum('permintaan','diterima') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `investasi_kanwil`
--

INSERT INTO `investasi_kanwil` (`id`, `id_super_admin`, `id_kanwil`, `id_investasi_owner`, `tanggal`, `nominal_investasi`, `penyusutan`, `nominal_saldo`, `status`) VALUES
(1, 1, 1, 1, '2019-11-01', 3000000, 20, 1000, 'permintaan'),
(3, 1, 1, 1, '2019-10-01', 9000, 90, 0, 'diterima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `investasi_owner`
--

CREATE TABLE `investasi_owner` (
  `id` int(11) NOT NULL,
  `id_super_admin` int(11) NOT NULL,
  `id_owner` int(11) NOT NULL,
  `id_bendahara` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_investasi` int(11) NOT NULL,
  `jangka_waktu` varchar(11) NOT NULL,
  `persentase_omset` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `investasi_owner`
--

INSERT INTO `investasi_owner` (`id`, `id_super_admin`, `id_owner`, `id_bendahara`, `tanggal`, `jumlah_investasi`, `jangka_waktu`, `persentase_omset`) VALUES
(1, 1, 1, 2, '2019-11-30', 90000, '2 bulan', 20),
(2, 1, 1, 2, '2019-11-30', 9000, '3 bulan', 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_masakan`
--

CREATE TABLE `jenis_masakan` (
  `id` int(11) NOT NULL,
  `jenis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `jenis_masakan`
--

INSERT INTO `jenis_masakan` (`id`, `jenis`) VALUES
(1, 'makanan'),
(2, 'minuman'),
(3, 'pelegkap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kanwil`
--

CREATE TABLE `kanwil` (
  `id_kanwil` int(11) NOT NULL,
  `alamat_kantor` varchar(100) NOT NULL,
  `telp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `kanwil`
--

INSERT INTO `kanwil` (`id_kanwil`, `alamat_kantor`, `telp`) VALUES
(7, 'Jawa Timur', '085735144495'),
(8, 'Jawa Barat', '085735144879'),
(9, 'Jawa Tengah', '085735148165');

-- --------------------------------------------------------

--
-- Struktur dari tabel `logistik`
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
-- Struktur dari tabel `log_aktivitas`
--

CREATE TABLE `log_aktivitas` (
  `id_log` int(11) NOT NULL,
  `id_kanwil` int(11) NOT NULL,
  `id_resto` int(11) NOT NULL,
  `id_user_resto` int(11) NOT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `log_aktivitas`
--

INSERT INTO `log_aktivitas` (`id_log`, `id_kanwil`, `id_resto`, `id_user_resto`, `tgl_mulai`, `tgl_akhir`, `status`, `keterangan`) VALUES
(1, 1, 1, 1, '2020-01-01', '2020-01-31', 'Cuti', 'Cuti Kerja selama 1 Bulan'),
(2, 2, 2, 8, '2020-01-31', '2020-01-31', 'Lembur', 'Lembur karena Shit tidak masuk'),
(5, 2, 2, 8, '2020-02-02', '2020-02-19', 'Cuti', 'semangat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `meja`
--

CREATE TABLE `meja` (
  `id` int(11) NOT NULL,
  `panel` int(11) NOT NULL,
  `nomor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `meja`
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
-- Struktur dari tabel `menu`
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
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `id_resto`, `menu`, `foto`, `harga`, `status`, `stok`, `mode`) VALUES
(1, 1, 'Ayam Geprek', 'default.jpg', 10000, 'tersedia', 5, 'insert'),
(2, 1, 'Jamur Kripsi', 'default.jpg', 10000, 'tersedia', 0, 'insert'),
(3, 1, 'Es Teh Anget', 'default.jpg', 10000, 'tersedia', 10, 'insert'),
(4, 1, 'Kopi Susu', 'kopihitam.jpg', 3000, 'habis', 6, 'insert'),
(5, 1, 'Nasi Goreng', 'default.jpg', 3000, 'tersedia', 6, 'insert'),
(6, 1, 'Tahu Kripsi', 'default.jpg', 6000, 'tersedia', 1, 'insert'),
(7, 1, 'teh pucuk', 'default.jpg', 3000, 'tersedia', 1, 'insert');

-- --------------------------------------------------------

--
-- Struktur dari tabel `omset_investasi_owner`
--

CREATE TABLE `omset_investasi_owner` (
  `id` int(11) NOT NULL,
  `id_investasi_owner` int(11) NOT NULL,
  `id_super_admin` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `penyusutan_invest` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `omset_investasi_owner`
--

INSERT INTO `omset_investasi_owner` (`id`, `id_investasi_owner`, `id_super_admin`, `tanggal`, `penyusutan_invest`) VALUES
(1, 1, 1, '2019-10-30', 200000),
(2, 1, 1, '2019-10-31', 200000),
(3, 1, 1, '2019-11-01', 200000),
(9, 1, 0, '2019-12-01', 20000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `operasional`
--

CREATE TABLE `operasional` (
  `id` int(11) NOT NULL,
  `nama_pengeluaran` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `operasional`
--

INSERT INTO `operasional` (`id`, `nama_pengeluaran`) VALUES
(1, 'listrik'),
(2, 'internet'),
(3, 'komunikasi'),
(4, 'promosi'),
(5, 'transportas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `owner`
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
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `owner`
--

INSERT INTO `owner` (`id`, `id_super_admin`, `nama`, `user`, `pass`, `alamat`, `telp`, `email`, `saldo_rek`, `create_at`, `update_at`) VALUES
(1, 1, 'fauzin', 'fauzin', 'fauzin', 'sambirejo', '1234567', 'fauzin@gmail.com', '200000', '2019-05-08 00:37:00', '2019-05-08 00:37:00'),
(2, 1, 'dedy ardiansyah 1', 'sd', 'as', 'asadas', '94586845', 'dfs@gmail.com', '100000', '2019-12-09 14:04:05', '2019-12-09 14:04:05'),
(3, 1, 'owner c', 'cc', 'cc', 'mojoroto', '085288886666', '1@gmail.com', '100000000', '2019-12-29 23:05:54', '2019-12-29 23:05:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
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
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id`, `id_resto`, `nama_paket`, `jumlah`, `status`, `foto`, `harga`, `mode`) VALUES
(1, 1, 'Paket Bom', 10, 'tersedia', 'default.jpg', '8000', 'insert'),
(2, 1, 'Paket Granat', 10, 'tersedia', 'default.jpg', '20000', 'insert'),
(3, 1, 'Paket asoy', 5, 'habis', 'nasibebek.jpg', '30000', 'insert');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `id_user_kasir` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `status` enum('kredit','lunas') NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `id_user_kasir`, `id_pemesanan`, `nominal`, `diskon`, `status`, `tanggal`) VALUES
(34, 23, 2, 15000, 0, 'lunas', '2020-01-30 21:35:25'),
(35, 23, 1, 25000, 0, 'lunas', '2020-01-30 15:42:30'),
(36, 23, 3, 20000, 0, 'lunas', '2020-02-02 17:09:06'),
(38, 23, 4, 25000, 0, 'lunas', '2020-02-02 20:42:38'),
(39, 22, 5, 15000, 0, 'lunas', '2020-02-01 16:55:53'),
(41, 22, 7, 28000, 2800, 'lunas', '2020-02-11 02:58:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_alat`
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
-- Dumping data untuk tabel `pembelian_alat`
--

INSERT INTO `pembelian_alat` (`id`, `id_logistik`, `no_transaksi`, `nama_supplier`, `tanggal`, `total_harga_beli`, `dibayar`, `status`, `catatan`) VALUES
(5, 3, '1', 'fauzin', '2019-10-16', 8000, 8000, 'selesai', 'ok'),
(6, 3, '6', '', '2019-10-16', 49000, 49000, 'selesai', 'ok'),
(7, 3, '7', 'Tmart', '2020-01-14', 209000, 200000, 'selesai', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_bahan_mentah`
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
  `catatan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `pembelian_bahan_mentah`
--

INSERT INTO `pembelian_bahan_mentah` (`id`, `id_logistik`, `no_transaksi`, `nama_supplier`, `tanggal`, `total_harga_beli`, `dibayar`, `status`, `catatan`) VALUES
(4, 3, 1, 'fauzin', '2019-10-16', '57000', '57000', 'selesai', 'ok');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemberian_kaskeluar`
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
-- Dumping data untuk tabel `pemberian_kaskeluar`
--

INSERT INTO `pemberian_kaskeluar` (`id_pengeluaran`, `id_bendahara`, `id_resto`, `tanggal`, `nominal_kas_keluar`, `status`) VALUES
(1, 2, 1, '2019-06-26', 400000, 'pemberian'),
(6, 2, 1, '2019-10-19', 60000, 'pemberian'),
(7, 2, 1, '2019-10-20', 60000, 'pemberian'),
(8, 2, 3, '2020-01-14', 3000000, 'pengajuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL,
  `nama_pemesan` varchar(500) NOT NULL,
  `no_meja` int(11) NOT NULL,
  `keterangantambahan` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `total_harga` int(11) NOT NULL,
  `id_user_resto` int(11) NOT NULL,
  `status` enum('belum','kredit','lunas','produksi','siapsaji','selesai','siapsaji_lunas','produksi_lunas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `nama_pemesan`, `no_meja`, `keterangantambahan`, `tanggal`, `total_harga`, `id_user_resto`, `status`) VALUES
(1, 'coba1', 1, '', '2020-01-30 21:35:00', 24000, 23, 'lunas'),
(2, 'coba2', 2, '', '2020-01-30 21:35:25', 13000, 23, 'lunas'),
(3, 'coba3', 3, 'ini pembayaran dilakukan di kasir', '2020-02-02 21:49:42', 16000, 23, 'lunas'),
(4, 'coba4', 4, '', '2020-02-01 21:58:05', 13000, 23, 'lunas'),
(5, 'coba5', 5, '', '2020-02-01 22:53:18', 13000, 23, 'lunas'),
(6, 'coba5', 1, '', '2020-02-01 22:53:42', 0, 23, 'siapsaji'),
(7, 'fauzin', 1, 'tidak ada keterangan', '2020-02-11 07:35:19', 28000, 23, 'lunas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan_menu`
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
-- Dumping data untuk tabel `pemesanan_menu`
--

INSERT INTO `pemesanan_menu` (`id`, `id_pemesanan`, `id_menu`, `jumlah_pesan`, `subharga`, `status`) VALUES
(58, 1, 1, 1, 10000, ''),
(59, 1, 7, 2, 6000, ''),
(60, 2, 3, 1, 10000, ''),
(61, 2, 5, 1, 3000, ''),
(62, 3, 2, 1, 10000, ''),
(63, 3, 6, 1, 6000, ''),
(64, 5, 2, 1, 10000, ''),
(65, 5, 5, 1, 3000, ''),
(66, 7, 1, 1, 10000, ''),
(67, 7, 1, 1, 10000, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan_paket`
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
-- Dumping data untuk tabel `pemesanan_paket`
--

INSERT INTO `pemesanan_paket` (`id`, `id_pemesanan`, `id_paket`, `jumlah_pesan`, `subharga`, `status`) VALUES
(35, 1, 1, 1, 8000, ''),
(36, 7, 1, 1, 8000, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendapatan_kas_masuk`
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
-- Dumping data untuk tabel `pendapatan_kas_masuk`
--

INSERT INTO `pendapatan_kas_masuk` (`id`, `id_user_bendahara`, `id_user_kasir`, `jumlah_setoran`, `tanggal`, `tanggal_awal`, `tanggal_akhir`) VALUES
(10, 32, 22, '29000', '2020-02-02', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran_cabang`
--

CREATE TABLE `pengeluaran_cabang` (
  `id_pengeluaran_cabang` int(11) NOT NULL,
  `id_resto` int(11) NOT NULL,
  `id_investasi_cabang` int(11) NOT NULL,
  `id_alat` int(11) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `masa_pemanfatan` varchar(100) NOT NULL,
  `nominal` varchar(100) NOT NULL,
  `nominal_penyusutan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengeluaran_cabang`
--

INSERT INTO `pengeluaran_cabang` (`id_pengeluaran_cabang`, `id_resto`, `id_investasi_cabang`, `id_alat`, `jumlah`, `masa_pemanfatan`, `nominal`, `nominal_penyusutan`) VALUES
(1, 1, 1, 1, '2', '2 bulan', '10000', 2000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran_cabang_operasional`
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
-- Dumping data untuk tabel `pengeluaran_cabang_operasional`
--

INSERT INTO `pengeluaran_cabang_operasional` (`id`, `id_admin_resto`, `id_resto`, `id_kanwil`, `tanggal`, `id_operasional`, `masa_sewa`, `nominal`) VALUES
(1, 4, 1, 1, '2019-10-02', 1, '1 bulan', '5000'),
(2, 4, 1, 1, '2019-10-03', 1, '2 bulan', '90'),
(3, 4, 1, 1, '2019-10-19', 0, '2 hari', '10000'),
(5, 1, 1, 1, '2019-12-29', 2, '1 bulan', '70000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran_kanwil`
--

CREATE TABLE `pengeluaran_kanwil` (
  `id` int(11) NOT NULL,
  `id_kanwil` int(11) NOT NULL,
  `id_operasional` int(11) NOT NULL,
  `nominal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengeluaran_kanwil`
--

INSERT INTO `pengeluaran_kanwil` (`id`, `id_kanwil`, `id_operasional`, `nominal`) VALUES
(1, 1, 1, '5000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran_kanwil_operasional`
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
-- Dumping data untuk tabel `pengeluaran_kanwil_operasional`
--

INSERT INTO `pengeluaran_kanwil_operasional` (`id`, `id_kanwil`, `id_operasional`, `tanggal`, `masa_sewa`, `nominal`) VALUES
(1, 1, 1, '2019-10-02', '1 bulan', '5000'),
(3, 1, 1, '2019-10-03', '1 bulan', '100'),
(4, 1, 1, '2019-10-04', '1 bulan', '2000'),
(5, 1, 4, '0000-00-00', NULL, '2000000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengiriman_bahan_mentah`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `pengiriman_bahan_mentah`
--

INSERT INTO `pengiriman_bahan_mentah` (`id`, `id_permintaan`, `id_bahan_mentah`, `tanggal_pengiriman`, `jumlah_permintaan`, `jumlah_dikirim`, `jumlah_dikembalikan`, `status`) VALUES
(1, 3, 1, '2019-10-22', 2, 4, 2, 'tidak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengiriman_bahan_olahan`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `pengiriman_bahan_olahan`
--

INSERT INTO `pengiriman_bahan_olahan` (`id`, `id_permintaan`, `id_bahan_olahan`, `tanggal_pengiriman`, `jumlah_permintaan`, `jumlah_dikirim`, `jumlah_dikembalikan`, `status`) VALUES
(2, 2, 3, '2019-10-22', 4, 4, 0, 'diterima'),
(4, 1, 3, '2019-10-25', 1, 1, 0, 'sesuai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyusutan_investasi_cabang`
--

CREATE TABLE `penyusutan_investasi_cabang` (
  `id_penyusutan` int(11) NOT NULL,
  `id_investasi_cabang` int(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `nominal_penyusutan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `penyusutan_investasi_cabang`
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
-- Struktur dari tabel `peralatan`
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
-- Dumping data untuk tabel `peralatan`
--

INSERT INTO `peralatan` (`id`, `id_logistik`, `id_resto`, `nama_peralatan`, `satuan_besar`, `jumlah_stok`, `status`) VALUES
(1, 3, 1, 'sendok', 'pcs', 40, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `permintaan_alat`
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
-- Dumping data untuk tabel `permintaan_alat`
--

INSERT INTO `permintaan_alat` (`id_permintaan_alat`, `id_resto`, `id_kanwil`, `id_alat`, `tanggal`, `jumlah`, `masa_pemanfatan`, `status_permintaan`) VALUES
(8, 1, 1, 1, '0000-00-00', '1', '2 bulan', 'diterima'),
(9, 1, 1, 1, '0000-00-00', '50', '10 bulan', 'permintaan'),
(10, 1, 1, 1, '0000-00-00', '10', '3 bulan', 'permintaan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permintaan_bahan_mentah`
--

CREATE TABLE `permintaan_bahan_mentah` (
  `id` int(11) NOT NULL,
  `id_resto` int(11) NOT NULL,
  `id_user_produksi` int(11) NOT NULL,
  `nama_permintaan` varchar(500) NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('permintaan','pengiriman','diterima') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `permintaan_bahan_mentah`
--

INSERT INTO `permintaan_bahan_mentah` (`id`, `id_resto`, `id_user_produksi`, `nama_permintaan`, `tanggal`, `status`) VALUES
(3, 1, 3, 'permintaan 3', '2019-11-04', 'pengiriman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permintaan_bahan_olahan`
--

CREATE TABLE `permintaan_bahan_olahan` (
  `id` int(11) NOT NULL,
  `id_resto` int(11) NOT NULL,
  `id_user_produksi` int(11) NOT NULL,
  `nama_permintaan` varchar(500) NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('permintaan','pengiriman','diterima') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `permintaan_bahan_olahan`
--

INSERT INTO `permintaan_bahan_olahan` (`id`, `id_resto`, `id_user_produksi`, `nama_permintaan`, `tanggal`, `status`) VALUES
(1, 1, 3, 'Permintaan bahan olahan 1', '2019-10-22', 'diterima'),
(2, 1, 3, 'permintaan 2', '2019-10-24', 'diterima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produksi`
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
-- Struktur dari tabel `produksi_bahan_olahan`
--

CREATE TABLE `produksi_bahan_olahan` (
  `id` int(11) NOT NULL,
  `id_bahan_mentah` int(11) NOT NULL,
  `id_bahan_olahan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `produksi_bahan_olahan`
--

INSERT INTO `produksi_bahan_olahan` (`id`, `id_bahan_mentah`, `id_bahan_olahan`, `jumlah`, `tanggal`) VALUES
(2, 1, 1, 1, '2019-10-09'),
(3, 1, 1, 1, '2019-10-09'),
(4, 1, 1, 1, '2019-10-09'),
(5, 1, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produksi_masakan`
--

CREATE TABLE `produksi_masakan` (
  `id` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_masakan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `produksi_masakan`
--

INSERT INTO `produksi_masakan` (`id`, `id_menu`, `tanggal`, `jumlah_masakan`) VALUES
(1, 1, '2019-10-10', 10),
(2, 2, '2019-10-14', 1),
(3, 2, '2020-01-03', 1),
(4, 4, '2020-01-03', 1),
(5, 6, '2020-01-03', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `resto`
--

CREATE TABLE `resto` (
  `id` int(11) NOT NULL,
  `id_kanwil` int(11) NOT NULL,
  `nama_resto` varchar(11) NOT NULL,
  `alamat` varchar(11) NOT NULL,
  `no_telp` varchar(11) NOT NULL,
  `pajak` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `resto`
--

INSERT INTO `resto` (`id`, `id_kanwil`, `nama_resto`, `alamat`, `no_telp`, `pajak`) VALUES
(4, 7, 'Kediri', 'Jl. Veteran', '08573514449', 10),
(5, 7, 'Nganjuk', 'Jl. Candire', '08573514487', 5),
(6, 8, 'Jakarta', 'Jl. Jakarta', '08573514816', 30),
(7, 9, 'Kraton Agun', 'jogja', '08573514449', 10),
(8, 9, 'Sunda Empir', 'Bandung', '08573514487', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_bahan_mentah_produksi`
--

CREATE TABLE `stok_bahan_mentah_produksi` (
  `id` int(11) NOT NULL,
  `id_bahan_mentah` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `stok_bahan_mentah_produksi`
--

INSERT INTO `stok_bahan_mentah_produksi` (`id`, `id_bahan_mentah`, `stok`) VALUES
(1, 1, 21),
(2, 2, 51),
(3, 3, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_bahan_olahan_produksi`
--

CREATE TABLE `stok_bahan_olahan_produksi` (
  `id` int(11) NOT NULL,
  `id_bahan_olahan` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `stok_bahan_olahan_produksi`
--

INSERT INTO `stok_bahan_olahan_produksi` (`id`, `id_bahan_olahan`, `stok`) VALUES
(1, 1, 2),
(2, 3, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `superadmin`
--

CREATE TABLE `superadmin` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `user` varchar(12) NOT NULL,
  `pass` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `superadmin`
--

INSERT INTO `superadmin` (`id`, `nama`, `user`, `pass`, `alamat`, `telp`, `email`, `create_at`, `update_at`) VALUES
(1, 'dedy ardiansyah', 'dedi', 'dedi', 'blitar', '08546464664', 'dedi@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kinerja_karyawan`
--

CREATE TABLE `tbl_kinerja_karyawan` (
  `id` int(11) NOT NULL,
  `id_user_resto` int(11) NOT NULL,
  `pemesanan` int(11) NOT NULL,
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kinerja_karyawan`
--

INSERT INTO `tbl_kinerja_karyawan` (`id`, `id_user_resto`, `pemesanan`, `point`) VALUES
(16, 23, 2, 1),
(17, 23, 1, 1),
(18, 23, 3, 1),
(19, 23, 5, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_kanwil`
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
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tipe` enum('general manajer','bendahara','logistik') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `user_kanwil`
--

INSERT INTO `user_kanwil` (`id`, `id_super_admin`, `id_kanwil`, `nama`, `user`, `pass`, `alamat`, `telp`, `email`, `create_at`, `update_at`, `tipe`) VALUES
(30, 1, 7, 'irhassatu', 'irhassatu', 'irhassatu', 'sambirejo', '085735144495', 'irhaskarumaf@gmail.com', '2020-01-30 19:17:40', '2020-01-30 19:17:40', 'general manajer'),
(31, 1, 9, 'indahdua', 'indahdua', 'indahdua', 'jogjakarta', '085735144879', 'indah@gmail.com', '2020-01-30 19:18:18', '2020-01-30 19:18:18', 'general manajer'),
(32, 1, 7, 'fadilasatu', 'fadilasatu', 'fadilasatu', 'papar', '085735144495', 'fadila@gmail.com', '2020-01-30 19:49:51', '2020-01-30 19:49:51', 'bendahara'),
(33, 1, 9, 'wiwindua', 'wiwindua', 'wiwindua', 'jogjakarta', '085735144879', 'wiwin@gmial.com', '2020-01-30 19:50:29', '2020-01-30 19:50:29', 'bendahara'),
(34, 1, 7, 'risasatu', 'risasatu', 'risasatu', 'sambirejo', '085735144495', 'risa@gmail.com', '2020-01-30 19:51:55', '2020-01-30 19:51:55', 'logistik'),
(35, 1, 9, 'triadua', 'triadua', 'triadua', 'jogjakarta', '085735144879', 'tria@gmail.com', '2020-01-30 19:52:18', '2020-01-30 19:52:18', 'logistik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_resto`
--

CREATE TABLE `user_resto` (
  `id` int(11) NOT NULL,
  `id_kanwil` int(11) NOT NULL,
  `id_resto` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `user` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `telp` varchar(12) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `jenis` enum('admin resto','kasir','waiters','produksi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `user_resto`
--

INSERT INTO `user_resto` (`id`, `id_kanwil`, `id_resto`, `nama`, `user`, `pass`, `alamat`, `telp`, `create_at`, `update_at`, `jenis`) VALUES
(19, 7, 4, 'adminrestosatu', 'adminrestosatu', 'adminrestosatu', 'kediri', '085735144495', '2020-01-30 19:54:38', '2020-01-30 19:54:38', 'admin resto'),
(20, 7, 4, 'produksisatu', 'produksisatu', 'produksisatu', 'kediri', '085735144495', '2020-01-30 20:00:21', '2020-01-30 20:00:21', 'produksi'),
(22, 7, 4, 'kasirsatu', 'kasirsatu', 'kasirsatu', 'kediri', '085735144495', '2020-01-30 20:01:29', '2020-01-30 20:01:29', 'kasir'),
(23, 7, 4, 'waiterssatu', 'waiterssatu', 'waiterssatu', 'kediri', '085735144495', '2020-01-30 20:02:01', '2020-01-30 20:02:01', 'waiters'),
(24, 9, 7, 'adminrestodua', 'adminrestodua', 'adminrestodua', 'jogjakarta', '085735144879', '2020-01-30 20:07:05', '2020-01-30 20:07:05', 'admin resto'),
(25, 9, 7, 'produksidua', 'produksidua', 'produksidua', 'jogjakarta', '085735144879', '2020-01-30 20:07:54', '2020-01-30 20:07:54', 'produksi'),
(26, 9, 7, 'kasirdua', 'kasirdua', 'kasirdua', 'jogjakarta', '085735144879', '2020-01-30 20:08:25', '2020-01-30 20:08:25', 'kasir'),
(27, 9, 7, 'waitersdua', 'waitersdua', 'waitersdua', 'jogjakarta', '085735144879', '2020-01-30 20:08:47', '2020-01-30 20:08:47', 'waiters');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bahan_jadi`
--
ALTER TABLE `bahan_jadi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bahan_mentah`
--
ALTER TABLE `bahan_mentah`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `bahan_mentah_masakan`
--
ALTER TABLE `bahan_mentah_masakan`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `bahan_olahan`
--
ALTER TABLE `bahan_olahan`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `bahan_olahan_masakan`
--
ALTER TABLE `bahan_olahan_masakan`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `biaya_lain`
--
ALTER TABLE `biaya_lain`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `daftar_masakan`
--
ALTER TABLE `daftar_masakan`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `detail_paket`
--
ALTER TABLE `detail_paket`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `detail_pembelian_alat`
--
ALTER TABLE `detail_pembelian_alat`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `detail_pembelian_bahan_mentah`
--
ALTER TABLE `detail_pembelian_bahan_mentah`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `detil_bahan_mentah`
--
ALTER TABLE `detil_bahan_mentah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `gaji_kanwil`
--
ALTER TABLE `gaji_kanwil`
  ADD PRIMARY KEY (`id_gaji_kanwil`);

--
-- Indeks untuk tabel `insentif`
--
ALTER TABLE `insentif`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `intensif_waiters`
--
ALTER TABLE `intensif_waiters`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `investasi_cabang`
--
ALTER TABLE `investasi_cabang`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `investasi_kanwil`
--
ALTER TABLE `investasi_kanwil`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `investasi_owner`
--
ALTER TABLE `investasi_owner`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `jenis_masakan`
--
ALTER TABLE `jenis_masakan`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `kanwil`
--
ALTER TABLE `kanwil`
  ADD PRIMARY KEY (`id_kanwil`) USING BTREE;

--
-- Indeks untuk tabel `logistik`
--
ALTER TABLE `logistik`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD PRIMARY KEY (`id_log`);

--
-- Indeks untuk tabel `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `omset_investasi_owner`
--
ALTER TABLE `omset_investasi_owner`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `operasional`
--
ALTER TABLE `operasional`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `pembelian_alat`
--
ALTER TABLE `pembelian_alat`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `pembelian_bahan_mentah`
--
ALTER TABLE `pembelian_bahan_mentah`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `pemberian_kaskeluar`
--
ALTER TABLE `pemberian_kaskeluar`
  ADD PRIMARY KEY (`id_pengeluaran`) USING BTREE;

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `pemesanan_menu`
--
ALTER TABLE `pemesanan_menu`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `pemesanan_paket`
--
ALTER TABLE `pemesanan_paket`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `pendapatan_kas_masuk`
--
ALTER TABLE `pendapatan_kas_masuk`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `pengeluaran_cabang`
--
ALTER TABLE `pengeluaran_cabang`
  ADD PRIMARY KEY (`id_pengeluaran_cabang`);

--
-- Indeks untuk tabel `pengeluaran_cabang_operasional`
--
ALTER TABLE `pengeluaran_cabang_operasional`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `pengeluaran_kanwil`
--
ALTER TABLE `pengeluaran_kanwil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengeluaran_kanwil_operasional`
--
ALTER TABLE `pengeluaran_kanwil_operasional`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `pengiriman_bahan_mentah`
--
ALTER TABLE `pengiriman_bahan_mentah`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `pengiriman_bahan_olahan`
--
ALTER TABLE `pengiriman_bahan_olahan`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `penyusutan_investasi_cabang`
--
ALTER TABLE `penyusutan_investasi_cabang`
  ADD PRIMARY KEY (`id_penyusutan`) USING BTREE;

--
-- Indeks untuk tabel `peralatan`
--
ALTER TABLE `peralatan`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `permintaan_alat`
--
ALTER TABLE `permintaan_alat`
  ADD PRIMARY KEY (`id_permintaan_alat`) USING BTREE;

--
-- Indeks untuk tabel `permintaan_bahan_mentah`
--
ALTER TABLE `permintaan_bahan_mentah`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `permintaan_bahan_olahan`
--
ALTER TABLE `permintaan_bahan_olahan`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `produksi_bahan_olahan`
--
ALTER TABLE `produksi_bahan_olahan`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `produksi_masakan`
--
ALTER TABLE `produksi_masakan`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `resto`
--
ALTER TABLE `resto`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `stok_bahan_mentah_produksi`
--
ALTER TABLE `stok_bahan_mentah_produksi`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `stok_bahan_olahan_produksi`
--
ALTER TABLE `stok_bahan_olahan_produksi`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `tbl_kinerja_karyawan`
--
ALTER TABLE `tbl_kinerja_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_kanwil`
--
ALTER TABLE `user_kanwil`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `user_resto`
--
ALTER TABLE `user_resto`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bahan_jadi`
--
ALTER TABLE `bahan_jadi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `bahan_mentah`
--
ALTER TABLE `bahan_mentah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `bahan_mentah_masakan`
--
ALTER TABLE `bahan_mentah_masakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `bahan_olahan`
--
ALTER TABLE `bahan_olahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `bahan_olahan_masakan`
--
ALTER TABLE `bahan_olahan_masakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `biaya_lain`
--
ALTER TABLE `biaya_lain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `daftar_masakan`
--
ALTER TABLE `daftar_masakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `detail_paket`
--
ALTER TABLE `detail_paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `detail_pembelian_alat`
--
ALTER TABLE `detail_pembelian_alat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `detail_pembelian_bahan_mentah`
--
ALTER TABLE `detail_pembelian_bahan_mentah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `detil_bahan_mentah`
--
ALTER TABLE `detil_bahan_mentah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `gaji_kanwil`
--
ALTER TABLE `gaji_kanwil`
  MODIFY `id_gaji_kanwil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `insentif`
--
ALTER TABLE `insentif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `intensif_waiters`
--
ALTER TABLE `intensif_waiters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `investasi_cabang`
--
ALTER TABLE `investasi_cabang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `investasi_kanwil`
--
ALTER TABLE `investasi_kanwil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `investasi_owner`
--
ALTER TABLE `investasi_owner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jenis_masakan`
--
ALTER TABLE `jenis_masakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kanwil`
--
ALTER TABLE `kanwil`
  MODIFY `id_kanwil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `logistik`
--
ALTER TABLE `logistik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `meja`
--
ALTER TABLE `meja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `omset_investasi_owner`
--
ALTER TABLE `omset_investasi_owner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `operasional`
--
ALTER TABLE `operasional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `owner`
--
ALTER TABLE `owner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `paket`
--
ALTER TABLE `paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `pembelian_alat`
--
ALTER TABLE `pembelian_alat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pembelian_bahan_mentah`
--
ALTER TABLE `pembelian_bahan_mentah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pemberian_kaskeluar`
--
ALTER TABLE `pemberian_kaskeluar`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `pemesanan_menu`
--
ALTER TABLE `pemesanan_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT untuk tabel `pemesanan_paket`
--
ALTER TABLE `pemesanan_paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `pendapatan_kas_masuk`
--
ALTER TABLE `pendapatan_kas_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran_cabang`
--
ALTER TABLE `pengeluaran_cabang`
  MODIFY `id_pengeluaran_cabang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran_cabang_operasional`
--
ALTER TABLE `pengeluaran_cabang_operasional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran_kanwil`
--
ALTER TABLE `pengeluaran_kanwil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran_kanwil_operasional`
--
ALTER TABLE `pengeluaran_kanwil_operasional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pengiriman_bahan_olahan`
--
ALTER TABLE `pengiriman_bahan_olahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `penyusutan_investasi_cabang`
--
ALTER TABLE `penyusutan_investasi_cabang`
  MODIFY `id_penyusutan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `peralatan`
--
ALTER TABLE `peralatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `permintaan_alat`
--
ALTER TABLE `permintaan_alat`
  MODIFY `id_permintaan_alat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `permintaan_bahan_mentah`
--
ALTER TABLE `permintaan_bahan_mentah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `permintaan_bahan_olahan`
--
ALTER TABLE `permintaan_bahan_olahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `produksi`
--
ALTER TABLE `produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produksi_bahan_olahan`
--
ALTER TABLE `produksi_bahan_olahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `produksi_masakan`
--
ALTER TABLE `produksi_masakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `resto`
--
ALTER TABLE `resto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `stok_bahan_mentah_produksi`
--
ALTER TABLE `stok_bahan_mentah_produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `stok_bahan_olahan_produksi`
--
ALTER TABLE `stok_bahan_olahan_produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_kinerja_karyawan`
--
ALTER TABLE `tbl_kinerja_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `user_kanwil`
--
ALTER TABLE `user_kanwil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `user_resto`
--
ALTER TABLE `user_resto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
