-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Agu 2019 pada 13.34
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(10) NOT NULL,
  `nik` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `shift` enum('Non Shift','Shift 1','Shift 2','Shift 3') NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `ketepatan` enum('Tepat Waktu','Terlambat') NOT NULL,
  `pulang_awal` time DEFAULT NULL,
  `lembur` time DEFAULT NULL,
  `keterangan` enum('Masuk','Cuti','Sakit','Izin','Tanpa Keterangan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `nik`, `nama`, `tanggal`, `shift`, `jam_masuk`, `jam_keluar`, `ketepatan`, `pulang_awal`, `lembur`, `keterangan`) VALUES
(1, 12172531, 'Alan Prima Hidayat', '2019-05-01', 'Non Shift', '07:00:00', '15:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(2, 12172531, 'Alan Prima Hidayat', '2019-05-02', 'Non Shift', '07:00:00', '15:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(3, 12172531, 'Alan Prima Hidayat', '2019-05-03', 'Non Shift', '07:00:00', '15:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(4, 12172531, 'Alan Prima Hidayat', '2019-05-04', 'Non Shift', '07:00:00', '15:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(5, 12172531, 'Alan Prima Hidayat', '2019-05-05', 'Non Shift', '07:00:00', '15:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(6, 12172531, 'Alan Prima Hidayat', '2019-05-06', 'Non Shift', '07:00:00', '15:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(7, 12172531, 'Alan Prima Hidayat', '2019-05-07', 'Non Shift', '07:00:00', '15:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(8, 12172531, 'Alan Prima Hidayat', '2019-05-08', 'Non Shift', '07:00:00', '15:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(9, 12172531, 'Alan Prima Hidayat', '2019-05-09', 'Non Shift', '07:00:00', '15:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(10, 12172531, 'Alan Prima Hidayat', '2019-05-10', 'Non Shift', '07:00:00', '15:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(11, 12174251, 'Tedi Supriadi', '2019-05-01', 'Non Shift', '07:00:00', '15:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(12, 12174251, 'Tedi Supriadi', '2019-05-02', 'Non Shift', '07:00:00', '15:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(13, 12174251, 'Tedi Supriadi', '2019-05-03', 'Non Shift', '07:00:00', '15:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(14, 12174251, 'Tedi Supriadi', '2019-05-04', 'Non Shift', '07:00:00', '15:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(15, 12174251, 'Tedi Supriadi', '2019-05-05', 'Non Shift', '07:00:00', '15:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(16, 12174251, 'Tedi Supriadi', '2019-05-06', 'Non Shift', '07:00:00', '15:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(17, 12174251, 'Tedi Supriadi', '2019-05-07', 'Non Shift', '07:00:00', '15:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(18, 12174251, 'Tedi Supriadi', '2019-05-08', 'Non Shift', '07:00:00', '15:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(19, 12174251, 'Tedi Supriadi', '2019-05-09', 'Non Shift', '07:00:00', '15:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(20, 12174251, 'Tedi Supriadi', '2019-05-10', 'Non Shift', '07:00:00', '15:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(21, 12172834, 'Deni Saputra', '2019-05-10', 'Non Shift', '07:00:00', '00:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(22, 12172834, 'Deni Saputra', '2019-05-10', 'Non Shift', '07:00:00', '00:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(23, 12172834, 'Deni Saputra', '2019-05-10', 'Non Shift', '07:00:00', '00:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(24, 12172834, 'Deni Saputra', '2019-05-10', 'Non Shift', '07:00:00', '00:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(25, 12172834, 'Deni Saputra', '2019-05-10', 'Non Shift', '07:00:00', '00:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(26, 12172834, 'Deni Saputra', '2019-05-10', 'Non Shift', '07:00:00', '00:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(27, 12172834, 'Deni Saputra', '2019-05-10', 'Non Shift', '07:00:00', '00:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(28, 12172834, 'Deni Saputra', '2019-05-10', 'Non Shift', '07:00:00', '00:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(29, 12172834, 'Deni Saputra', '2019-05-10', 'Non Shift', '07:00:00', '00:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(30, 12172834, 'Deni Saputra', '2019-05-10', 'Non Shift', '07:00:00', '00:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(31, 12172460, 'Sumarni Angraeni', '2019-05-01', 'Non Shift', '07:00:00', '15:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(32, 12172460, 'Sumarni Angraeni', '2019-05-02', 'Non Shift', '07:00:00', '15:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(33, 12172460, 'Sumarni Angraeni', '2019-05-03', 'Non Shift', '07:00:00', '15:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(34, 12172460, 'Sumarni Angraeni', '2019-05-04', 'Non Shift', '07:00:00', '15:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(35, 12172460, 'Sumarni Angraeni', '2019-05-05', 'Non Shift', '07:00:00', '15:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(36, 12172460, 'Sumarni Angraeni', '2019-05-06', 'Non Shift', '07:00:00', '15:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(37, 12172460, 'Sumarni Angraeni', '2019-05-07', 'Non Shift', '07:00:00', '15:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(38, 12172460, 'Sumarni Angraeni', '2019-05-08', 'Non Shift', '07:00:00', '15:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(39, 12172460, 'Sumarni Angraeni', '2019-05-09', 'Non Shift', '07:00:00', '15:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(40, 12172460, 'Sumarni Angraeni', '2019-05-10', 'Non Shift', '07:00:00', '15:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(41, 12171868, 'Anita Lestari', '2019-05-01', 'Non Shift', '07:00:00', '15:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(42, 12171868, 'Anita Lestari', '2019-05-02', 'Non Shift', '07:00:00', '15:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(43, 12171868, 'Anita Lestari', '2019-05-03', 'Non Shift', '07:00:00', '15:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(44, 12171868, 'Anita Lestari', '2019-05-04', 'Non Shift', '07:00:00', '15:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(45, 12171868, 'Anita Lestari', '2019-05-05', 'Non Shift', '07:00:00', '15:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(46, 12171868, 'Anita Lestari', '2019-05-06', 'Non Shift', '07:00:00', '15:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(47, 12171868, 'Anita Lestari', '2019-05-07', 'Non Shift', '07:00:00', '15:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(48, 12171868, 'Anita Lestari', '2019-05-08', 'Non Shift', '07:00:00', '15:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(49, 12171868, 'Anita Lestari', '2019-05-09', 'Non Shift', '07:00:00', '15:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(50, 12171868, 'Anita Lestari', '2019-05-10', 'Non Shift', '07:00:00', '15:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk'),
(51, 0, '', '0000-00-00', 'Non Shift', '00:00:00', '00:00:00', 'Tepat Waktu', NULL, NULL, 'Masuk'),
(52, 0, '', '0000-00-00', 'Non Shift', '00:00:00', '00:00:00', 'Tepat Waktu', NULL, NULL, 'Masuk'),
(53, 0, '', '0000-00-00', 'Non Shift', '00:00:00', '00:00:00', 'Tepat Waktu', NULL, NULL, 'Masuk'),
(54, 0, '', '0000-00-00', 'Non Shift', '00:00:00', '00:00:00', 'Tepat Waktu', NULL, NULL, 'Masuk'),
(55, 0, '', '0000-00-00', 'Non Shift', '00:00:00', '00:00:00', 'Tepat Waktu', NULL, NULL, 'Masuk'),
(56, 0, '', '0000-00-00', 'Non Shift', '00:00:00', '00:00:00', 'Tepat Waktu', NULL, NULL, 'Masuk'),
(57, 0, '', '0000-00-00', 'Non Shift', '00:00:00', '00:00:00', 'Tepat Waktu', NULL, NULL, 'Masuk'),
(58, 0, '', '0000-00-00', 'Non Shift', '00:00:00', '00:00:00', 'Tepat Waktu', NULL, NULL, 'Masuk'),
(59, 0, '', '0000-00-00', 'Non Shift', '00:00:00', '00:00:00', 'Tepat Waktu', NULL, NULL, 'Masuk'),
(60, 0, '', '0000-00-00', 'Non Shift', '00:00:00', '00:00:00', 'Tepat Waktu', NULL, NULL, 'Masuk'),
(61, 12171868, 'Anita Lestari', '2019-05-01', 'Non Shift', '07:00:00', '15:00:00', 'Tepat Waktu', '00:00:00', '00:00:00', 'Masuk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(10) NOT NULL,
  `nama` varchar(125) NOT NULL,
  `nik` int(11) NOT NULL,
  `image` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `id_level` int(11) NOT NULL,
  `aktive` int(1) NOT NULL,
  `tanggal_buat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_akun`, `nama`, `nik`, `image`, `password`, `id_level`, `aktive`, `tanggal_buat`) VALUES
(1, 'Administrator', 12345678, 'default.jpg', '$2y$10$59NNJKa3x6HFBgzpjZQp0.KmzX8W1L5aQNkC9l7DaWsFJ7GmkA666', 1, 1, 1556462840),
(2, 'Alan Prima Hidayat', 12172531, 'a1.jpg', '$2y$10$9laqq8HouUDlMr8oqBYUheCyR3yq5dkB3efta6yYeZU4lqK08oLam', 2, 1, 1556464177),
(3, 'Tedi Supriadi', 12174251, 'default.jpg', '$2y$10$keAiRUSrHfznjs0r9DnyX.nU6UXr6QkOEsj.LPFPKSHKZoGgwxAim', 2, 1, 1556806199),
(4, 'Deni Saputra', 12172834, 'default.jpg', '$2y$10$7lE6rj/.GF6LxoZyIpvrWO/GlrfD7hRsXw78HR8nKFA95jvjQ66U.', 2, 1, 1557520929),
(5, 'Sumarni Angraeni', 12172460, 'default.jpg', '$2y$10$hUcUSdE6shRVL8NPDh8.CeCp165ZSk3D6TwM/rNjZ2FbPOxY2MV1K', 2, 1, 1557523010),
(6, 'Anita Lestari', 12171868, 'default.jpg', '$2y$10$RbatrYQr/xGgYJXWk6t24OtuHyD5sAP1F0U2/EF0GfqwQGhp7Dcrm', 2, 1, 1557523046),
(7, 'User', 11111111, 'default.jpg', '$2y$10$cqxYACVFn3pTw1h82CH4a.ijqv9YodJ0iBNQMK6iclXUMk11Pb/w.', 2, 1, 1561551739),
(8, 'Testing', 12175456, 'default.jpg', '$2y$10$5Y2NoXfN60Y6DnGUBLW1MunI/ylk77ofQ5FnsJe/lVgJ.XTQwXxpi', 2, 1, 1565347619);

-- --------------------------------------------------------

--
-- Struktur dari tabel `departemen`
--

CREATE TABLE `departemen` (
  `id_departemen` int(10) NOT NULL,
  `departemen` enum('divisi produksi 1','divisi produksi 2','quality control 1','quality control 2','raw materialing production') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `departemen`
--

INSERT INTO `departemen` (`id_departemen`, `departemen`) VALUES
(1, 'divisi produksi 1'),
(2, 'divisi produksi 2'),
(3, 'quality control 1'),
(4, 'quality control 2'),
(5, 'raw materialing production');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(10) NOT NULL,
  `jabatan` enum('supervisor','foreman','operator','helper') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan`) VALUES
(1, 'supervisor'),
(2, 'foreman'),
(3, 'operator'),
(4, 'helper');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(10) NOT NULL,
  `shift` enum('non shift','shift 1','shift 2','shift 3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `shift`) VALUES
(1, 'non shift'),
(2, 'shift 1'),
(3, 'shift 2'),
(4, 'shift 3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(10) NOT NULL,
  `nik` int(10) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `departemen` enum('Divisi Produksi 1','Divisi Produksi 2','Quality Control 1','Quality Control 2','Raw Materialing Production') NOT NULL,
  `jabatan` enum('Supervisor','Foreman','Operator','Helper') NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `status` enum('Karyawan Tetap','Karyawan Kontrak','Pensiun / Keluar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nik`, `nama`, `jenis_kelamin`, `tgl_lahir`, `departemen`, `jabatan`, `alamat`, `no_telp`, `tgl_masuk`, `tgl_keluar`, `status`) VALUES
(1, 12172531, 'Alan Prima Hidayat', 'Laki-laki', '1994-01-30', 'Quality Control 2', 'Supervisor', 'Jl. Cikarang No 01 - Kab. Bekasi', '089647634409', '2010-01-01', NULL, 'Karyawan Tetap'),
(2, 12174251, 'Tedi Supriadi', 'Laki-laki', '1990-01-01', 'Divisi Produksi 2', 'Supervisor', 'Jl. Cikarang No. 02 - Kab. Bekasi', '085085085', '2010-01-01', '0000-00-00', 'Karyawan Tetap'),
(3, 12172834, 'Deni Saputra', 'Laki-laki', '1990-01-01', 'Divisi Produksi 2', 'Supervisor', 'Jl. Cikarang No. 01 - Kab. Bekasi', '08502897411', '2010-01-01', NULL, 'Karyawan Tetap'),
(4, 12172460, 'Sumarni Angraeni', 'Perempuan', '1990-01-01', 'Raw Materialing Production', 'Supervisor', 'Jl. Cikarang No. 03 - Kab. Bekasi', '08598512620', '2011-01-01', NULL, 'Karyawan Tetap'),
(5, 12171868, 'Anita Lestari', 'Perempuan', '1990-01-01', 'Quality Control 2', 'Supervisor', 'Jl. Cikarang No. 05 - Kab. Bekasi', '0897562150', '2011-01-01', NULL, 'Karyawan Tetap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `level` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `level`) VALUES
(1, 'Administrator'),
(2, 'Karyawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `menu`) VALUES
(1, 'Administrator'),
(2, 'Karyawan'),
(3, 'Menu'),
(4, 'tes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_akses`
--

CREATE TABLE `menu_akses` (
  `id_menuakses` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu_akses`
--

INSERT INTO `menu_akses` (`id_menuakses`, `id_level`, `id_menu`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 1, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `submenu`
--

CREATE TABLE `submenu` (
  `id_submenu` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `aktive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `submenu`
--

INSERT INTO `submenu` (`id_submenu`, `id_menu`, `judul`, `url`, `icon`, `aktive`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(4, 3, 'Menu Manajemen', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Manajemen', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(6, 3, 'Level Akses', 'admin/level', 'fas fa-fw fa-user-tie', 1),
(7, 1, 'Profil Saya', 'admin/profil', 'fas fa-fw fa-user', 1),
(8, 1, 'Ganti Foto Profil', 'admin/editprofil', 'fas fa-fw fa-user-edit', 1),
(10, 1, 'Ganti Password', 'admin/gantipassword', 'fas fa-fw fa-key', 1),
(14, 2, 'Beranda', 'karyawan', 'fas fa-fw fa-home', 1),
(15, 2, 'Akun Saya', 'karyawan/akunsaya', 'fas fa-fw fa-user', 1),
(16, 2, 'Ganti Foto Profil', 'karyawan/editprofil', 'fas fa-fw fa-user-edit', 1),
(17, 2, 'Ganti Password', 'karyawan/gantipassword', 'fas fa-fw fa-key', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD KEY `id_level` (`id_level`);

--
-- Indeks untuk tabel `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id_departemen`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `menu_akses`
--
ALTER TABLE `menu_akses`
  ADD PRIMARY KEY (`id_menuakses`);

--
-- Indeks untuk tabel `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id_submenu`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id_departemen` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `menu_akses`
--
ALTER TABLE `menu_akses`
  MODIFY `id_menuakses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id_submenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD CONSTRAINT `akun_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
