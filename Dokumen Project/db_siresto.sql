-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jan 2020 pada 13.59
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

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
(12, 1, 1, 2, '5000', '');

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
(23, '2', '2020-01-19 19:55:25', '1000');

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_masakan`
--

CREATE TABLE `jenis_masakan` (
  `id` int(11) NOT NULL,
  `jenis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kanwil`
--

CREATE TABLE `kanwil` (
  `id_kanwil` int(11) NOT NULL,
  `alamat_kantor` varchar(100) NOT NULL,
  `telp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
(1, 1, 'Minuman Teh Jeruk', 'teh_jeruk2.jpg', 2500, 'tersedia', 8, 'insert'),
(2, 1, 'Minuman Teh Madu', 'tehmadu.jpg', 3000, 'tersedia', 0, 'insert'),
(3, 1, 'Minuman Buah Naga', 'jice_buah_naga.jpg', 4000, 'habis', 10, 'insert'),
(4, 1, 'Minuman Kopi Hitam', 'kopihitam.jpg', 2000, 'tersedia', 10, 'insert'),
(5, 1, 'Ayam Geprek', 'ayamgeprek.jpg', 6000, 'tersedia', 10, 'insert'),
(6, 1, 'Bebek Goreng', 'nasibebek.jpg', 10000, 'tersedia', 10, 'insert'),
(7, 1, 'Nasi Goreng Sepesial', 'nasigoreng.jpg', 8000, 'habis', 10, 'insert');

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
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
(1, 1, 'Paket Pasangan', 1, 'tersedia', 'paket_bom.jpg', '20000', 'insert'),
(2, 1, 'Paket Jomblo', 1, 'tersedia', 'ayamgoreng.jpg', '1000', 'insert');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
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
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `id_user_kasir`, `id_pemesanan`, `nominal`, `status`, `tanggal`) VALUES
(20, 2, 1, 50000, 'lunas', '2020-01-19 13:56:49');

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
  `catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
  `status` enum('belum','kredit','lunas','produksi','siapsaji','siapsaji_lunas','produksi_lunas','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `nama_pemesan`, `no_meja`, `keterangantambahan`, `tanggal`, `total_harga`, `id_user_resto`, `status`) VALUES
(1, 'irhas', 1, '', '2020-01-19 19:55:25', 31000, 2, 'lunas');

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
(42, 1, 1, 2, 5000, ''),
(43, 1, 5, 1, 6000, '');

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
(30, 1, 1, 1, 20000, '');

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_bahan_mentah_produksi`
--

CREATE TABLE `stok_bahan_mentah_produksi` (
  `id` int(11) NOT NULL,
  `id_bahan_mentah` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_bahan_olahan_produksi`
--

CREATE TABLE `stok_bahan_olahan_produksi` (
  `id` int(11) NOT NULL,
  `id_bahan_olahan` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
  `create_at` datetime DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp()
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
(12, 2, 1, 1);

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
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp(),
  `tipe` enum('general manajer','bendahara','logistik') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `user_kanwil`
--

INSERT INTO `user_kanwil` (`id`, `id_super_admin`, `id_kanwil`, `nama`, `user`, `pass`, `alamat`, `telp`, `email`, `create_at`, `update_at`, `tipe`) VALUES
(1, 1, 1, 'indah', 'indah', 'indah', 'ngronggo', '085855', 'indah@gmail.com', '2019-05-08 00:42:08', '2019-05-08 00:42:08', 'general manajer'),
(2, 1, 1, 'tria', 'tria', 'tria', 'ngronggo', '0858858585', 'tria@gmail.com', '2019-05-08 00:42:08', '2019-05-08 00:42:08', 'bendahara'),
(3, 1, 1, 'wiwin', 'wiwin', 'wiwin', 'ngronggo', '098336366363', 'wiwin@gmail.com', '2019-05-08 00:42:08', '2019-05-08 00:42:08', 'logistik'),
(17, 1, 1, 'dedy ardiansyah 1', 'sd', 'as', 'sddsd', '43334', 'dfs@gmail.com', '2019-12-09 13:45:32', '2019-12-09 13:45:32', 'general manajer'),
(18, 1, 1, 'dedy ardiansyah 1', 'sa', 'asa', 'asda', '32423', 'dfs@gmail.com', '2019-12-09 13:46:37', '2019-12-09 13:46:37', 'logistik');

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
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp(),
  `jenis` enum('admin resto','kasir','waiters','produksi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `user_resto`
--

INSERT INTO `user_resto` (`id`, `id_kanwil`, `id_resto`, `nama`, `user`, `pass`, `alamat`, `telp`, `create_at`, `update_at`, `jenis`) VALUES
(1, 1, 1, 'debi', 'debi', 'debi', 'nganjuk', '085646898767', '2019-12-09 13:48:51', '2019-12-09 13:48:51', 'kasir'),
(2, 1, 1, 'wahyu', 'wahyu', 'wahyu', 'mojoroto', '085646898767', '2019-12-09 13:48:51', '2019-12-09 13:48:51', 'waiters'),
(3, 1, 1, 'fauzin', 'fauzin', 'fauzin', 'gampengrejo', '085646898767', '2019-12-09 13:48:51', '2019-12-09 13:48:51', 'produksi'),
(4, 1, 1, 'rifangi', 'rifangi', 'rifangi', 'nganjuk', '085646898767', '2019-12-09 13:48:51', '2019-12-09 13:48:51', 'admin resto'),
(5, 1, 1, 'wedok', 'wedok', 'wedok', 'kediri', '0987654321', '2019-12-17 15:23:13', '2019-12-17 15:23:13', 'waiters');

--
-- Indexes for dumped tables
--

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
-- Indeks untuk tabel `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id`) USING BTREE;

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
-- Indeks untuk tabel `pengeluaran_cabang_operasional`
--
ALTER TABLE `pengeluaran_cabang_operasional`
  ADD PRIMARY KEY (`id`) USING BTREE;

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
-- AUTO_INCREMENT untuk tabel `bahan_mentah`
--
ALTER TABLE `bahan_mentah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `bahan_mentah_masakan`
--
ALTER TABLE `bahan_mentah_masakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `detail_pembelian_alat`
--
ALTER TABLE `detail_pembelian_alat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `detail_pembelian_bahan_mentah`
--
ALTER TABLE `detail_pembelian_bahan_mentah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `intensif_waiters`
--
ALTER TABLE `intensif_waiters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `investasi_cabang`
--
ALTER TABLE `investasi_cabang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `investasi_kanwil`
--
ALTER TABLE `investasi_kanwil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `investasi_owner`
--
ALTER TABLE `investasi_owner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jenis_masakan`
--
ALTER TABLE `jenis_masakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kanwil`
--
ALTER TABLE `kanwil`
  MODIFY `id_kanwil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `logistik`
--
ALTER TABLE `logistik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `operasional`
--
ALTER TABLE `operasional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `owner`
--
ALTER TABLE `owner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `paket`
--
ALTER TABLE `paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `pembelian_alat`
--
ALTER TABLE `pembelian_alat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pembelian_bahan_mentah`
--
ALTER TABLE `pembelian_bahan_mentah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pemberian_kaskeluar`
--
ALTER TABLE `pemberian_kaskeluar`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pemesanan_menu`
--
ALTER TABLE `pemesanan_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `pemesanan_paket`
--
ALTER TABLE `pemesanan_paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `pendapatan_kas_masuk`
--
ALTER TABLE `pendapatan_kas_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran_cabang_operasional`
--
ALTER TABLE `pengeluaran_cabang_operasional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran_kanwil_operasional`
--
ALTER TABLE `pengeluaran_kanwil_operasional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id_permintaan_alat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `resto`
--
ALTER TABLE `resto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_kinerja_karyawan`
--
ALTER TABLE `tbl_kinerja_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user_kanwil`
--
ALTER TABLE `user_kanwil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `user_resto`
--
ALTER TABLE `user_resto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
