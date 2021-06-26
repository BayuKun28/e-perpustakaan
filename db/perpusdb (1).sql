-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 19, 2020 at 05:57 PM
-- Server version: 5.7.28
-- PHP Version: 7.2.24-0ubuntu0.18.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpusdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `nama_supplier` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `ket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `nama_supplier`, `alamat`, `ket`) VALUES
(1, 'Bayu Prastyo', 'Tawangmangu', 'Sumbangan'),
(3, 'Esti Setyaningrum', 'Mojogedang', 'Pembelian'),
(5, 'Nabil', 'Mojogedang', 'Pembelian'),
(6, 'Isnan Wahyudi', 'Mojogedang', 'Sumbangan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `nama_buku` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tahun` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `ket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id`, `id_supplier`, `nama_buku`, `pengarang`, `penerbit`, `tahun`, `status`, `ket`) VALUES
(1, 1, 'Arah Langkah', 'Fiersa Besari', 'Gramedia', 2019, 'Ada', 'Sumbangan'),
(3, 1, 'Belok Kiri Jalan Terus', 'Unknown', 'Unknown', 1998, 'ada', 'Beli'),
(4, 1, 'Sebuah Seni Untuk Bersikap Bodo Amat', 'Gramedia', 'Gramedia', 2018, 'ada', 'Sumbangan'),
(6, 1, 'All About Sains', 'Newton', 'Gramedia', 222, 'Ada', 'Beli'),
(8, 5, 'Skenario Perang Dunia Ke 3', 'Isnan Wahyudi', 'Gramedia', 2020, 'Ada', 'Pembelian'),
(9, 1, 'Konspirasi WTC', 'Isnan Wahyudi', 'Gramedia', 2002, 'Ada', 'Sumbangan'),
(10, 1, 'Konspirasi Perang Timur Tengah', 'Isnan Wahyudi', 'Gramedia', 2019, 'Ada', 'Sumbangan'),
(11, 3, 'Globe Earth', 'Isnan Wahyudi', 'Gramedia', 2019, 'Ada', 'Sumbangan'),
(12, 1, 'Globe Earth or Flat Earth', 'Bayu Prastyo', 'Gramedia', 2019, 'Ada', 'Pembelian'),
(14, 1, 'Sejarah Keluarga Rotschild', 'Isnan Wahyudi', 'Gramedia', 2019, 'Ada', 'Pembelian'),
(15, 1, 'History of Persib', 'Bayu Prastyo', 'Gramedia', 2019, 'Ada', 'Pembelian'),
(17, 6, 'KKN Di Desa Penari', 'Isnan Wahyudi', 'Gramedia', 2019, 'Ada', 'Sumbangan'),
(18, 1, 'Corona Is Full Of Shit', 'Bayu Prastyo', 'Bayu Prastyo', 2020, 'Ada', 'Pembelian');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peminjaman`
--

CREATE TABLE `tb_peminjaman` (
  `id` int(11) NOT NULL,
  `id_peminjam` int(11) NOT NULL,
  `id_buku` varchar(255) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_harus_kembali` date NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_peminjaman`
--

INSERT INTO `tb_peminjaman` (`id`, `id_peminjam`, `id_buku`, `tanggal_pinjam`, `tanggal_harus_kembali`, `catatan`, `status`) VALUES
(1, 2, '1', '2020-01-15', '2020-01-22', 'Satu Minggu', 'Kembali'),
(4, 2, '6', '2020-01-29', '2020-01-21', '', 'Pinjam'),
(5, 3, '4', '2020-01-23', '2020-01-20', '', 'Pinjam'),
(6, 2, '3', '2020-01-30', '2020-01-28', 'Satu Bulan', 'Pinjam'),
(7, 1, '12', '2020-01-24', '2020-01-05', 'Ok', 'Pinjam'),
(8, 1, '14', '2020-01-28', '2020-01-31', 'Pinjam', 'Pinjam');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengembalian`
--

CREATE TABLE `tb_pengembalian` (
  `id` int(11) NOT NULL,
  `id_pinjam` int(11) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengembalian`
--

INSERT INTO `tb_pengembalian` (`id`, `id_pinjam`, `tgl_kembali`, `denda`) VALUES
(1, 1, '2020-11-12', 120000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Bayu Prastyo', 'bhayou.essega@gmail.com', 'default.jpg', '$2y$10$id3E1R/RCaGP6N0/i9MvSOZ2FAEZjafwabA8BBJugctYNG1wOrJIO', 1, 1, 1578716578),
(2, 'Esti Setyaningrum', 'Esti@gmail.com', 'default.jpg', '$2y$10$XnSz0vp67nljCUNzXZAQA.z3/zDe52fYtwDHzpsBH75OLNih0HUUy', 2, 1, 1578717058),
(3, 'Nabil', 'Nabil@gmail.com', 'default.jpg', '$2y$10$sDrqy7Og.EIiOn1u8hz8ruylRX8IlTvw.0jOGDduSU2aGjvvrrCWu', 3, 1, 1578717120),
(4, 'madi', 'madi@gmail.com', 'default.jpg', '$2y$10$pVI4QDnM4tjr0ArtUiiJ1u9RBo6WOtIyp9UlhqeSg1XRSrLQnlLS.', 1, 1, 1585305317);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3),
(5, 2, 1),
(6, 1, 4),
(7, 3, 5),
(8, 3, 2),
(9, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'Buku'),
(6, 'Pengunjung'),
(7, 'Transaksi');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member'),
(3, 'Pengunjung');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'dashboard', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(6, 3, 'Settings', 'dashboard', 'fas fa-fw fa-cog', 1),
(9, 4, 'Supplier', 'supplier', 'fas  fa-fw fa-address-card', 1),
(11, 6, 'Dashboard', 'dashboard/pengunjung', 'fas fa-fw fa-tachometer-alt', 1),
(12, 7, 'Peminjaman', 'transaksi/peminjaman', 'fas fa-fw fa-box', 1),
(13, 7, 'Pengembalian', 'transaksi/pengembalian', 'fas fa-fw fa-clipboard-check', 1),
(14, 4, 'Daftar Buku', 'buku', 'fas fa-fw fa-book', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
