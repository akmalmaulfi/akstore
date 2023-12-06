-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 06, 2023 at 01:23 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anjas_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(10) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'akmalmaulfi', 'akmal@gmail.com', '$2y$10$t2WKLREKDXPkslTw1iNCouQ7mLl4SSMQlplL3Onszp0imcOK8XxxS', 'admin', '2023-11-21', '2023-11-30'),
(3, 'mega', 'mega@gmail.com', '$2y$10$G1Ti3SE2TWR5I07vmAb8FOLU1/a3RnC77LyiDhBffE/h0SWVz5jRS', 'admin', '2023-11-21', '2023-12-03');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `nama`, `telp`, `email`, `password`, `role`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Akmal Maulfi', '08214123422', 'akmal@gmail.com', '$2y$10$IfWj7g4nUE7V9YcWG9mHMOB1pnW3eyOZisBU1BL6W90AENrWc8w4u', 'customer', 'KP RAWA BEBEK JL.DURIAN DALAM 5, RT.01/RW.08 KOTABARU/BEKASI BARAT', '2023-11-20', '2023-11-29'),
(2, 'Mega Septi', '081241242', 'mega@gmail.com', '$2y$10$jT7kfont/K7HRc7zCMkRW.h1hsGQQQ7bPQz0TJINn11ZQJR1FoMSW', 'customer', 'Jl Amilin 1', '2023-11-20', '2023-11-28'),
(5, 'Septi', '0812341286', 'septi@gmail.com', '$2y$10$A/yYCHkxpx51ORA4NLfcsec337/5j2F8Yt0TT2x9sbwAMPUaVZjFu', 'customer', 'Jl ABC No.20', '2023-11-21', '2023-11-29'),
(9, 'maulfi', '6282112965670', 'maulfi@gmail.com', '$2y$10$X6QA8hZGzQurrsqvN14yX.pF.PK83cfqFZY2WDgwkzPJQTIu/N9l6', 'customer', 'Jl. Kader 2 Kotabaru/Bekasi Barat', '2023-11-29', '2023-11-29'),
(11, 'testing', '6282152142', 'testing@gmail.com', '$2y$10$JpV/WnKqTf0DtQ/lBqKrReaMBZi3DcIPTkV1uA/WM6EBO5uUZihJi', 'customer', 'testing', '2023-12-02', '2023-12-02'),
(12, 'customer', '6281241242', 'customer@gmail.com', '$2y$10$At71FPkdWxBv1wol/eoPeeA8JmJ67wuV4jPZVF0HseT35eJUaLqCe', 'customer', 'kp rawe bebek', '2023-12-03', '2023-12-03');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'T-Shirt', '2023-11-02', '2023-11-22'),
(3, 'Celana', '2023-11-22', '2023-11-22'),
(4, 'Jaket', '2023-11-22', '2023-11-28'),
(5, 'Kemeja', '2023-11-22', '2023-11-22'),
(6, 'Seragam', '2023-11-29', '2023-11-29');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(4, '2023-11-20-015038', 'App\\Database\\Migrations\\Kategori', 'default', 'App', 1700445538, 1),
(5, '2023-11-20-015724', 'App\\Database\\Migrations\\Customer', 'default', 'App', 1700445538, 1),
(6, '2023-11-20-020014', 'App\\Database\\Migrations\\Produk', 'default', 'App', 1700446859, 2),
(7, '2023-11-20-051229', 'App\\Database\\Migrations\\Produk', 'default', 'App', 1700457178, 3),
(8, '2023-11-20-052003', 'App\\Database\\Migrations\\Produk', 'default', 'App', 1700457644, 4),
(9, '2023-11-20-052147', 'App\\Database\\Migrations\\AddForeignKeyProdukKategori', 'default', 'App', 1700457757, 5),
(12, '2023-11-20-054454', 'App\\Database\\Migrations\\Produk', 'default', 'App', 1700459637, 6),
(13, '2023-11-20-055649', 'App\\Database\\Migrations\\Rate', 'default', 'App', 1700461454, 7),
(14, '2023-11-20-062839', 'App\\Database\\Migrations\\Pembayaran', 'default', 'App', 1700462065, 8),
(15, '2023-11-20-063512', 'App\\Database\\Migrations\\Pesanan', 'default', 'App', 1700462406, 9),
(16, '2023-11-20-064106', 'App\\Database\\Migrations\\Admin', 'default', 'App', 1700462589, 10),
(17, '2023-11-20-064358', 'App\\Database\\Migrations\\Owner', 'default', 'App', 1700462681, 11),
(18, '2023-11-25-013437', 'App\\Database\\Migrations\\Ukuran', 'default', 'App', 1700876257, 12);

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'owner', 'owner@gmail.com', '$2y$10$.MwcTPrq9MPF.keXJzWtfuiEmeIeZTbhPwzroRNFrJvs7egk4cLLy', '2023-11-29', '2023-12-03'),
(7, 'owner3', 'owner3@gmail.com', '$2y$10$QeO9FECqqX5qRTNREac0ruHICX.yl6nQpjUvpAY4aYipihCtPv3Aa', '2023-11-29', '2023-11-29');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_customer` int(11) UNSIGNED NOT NULL,
  `bukti` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `id_customer`, `bukti`, `status`, `created_at`, `updated_at`) VALUES
(31, 1, '1701697683_316d2bfbd470f9fa8cd0.jpeg', 'Pesanan telah diterima', '2023-12-04', '2023-12-04');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_produk` int(11) UNSIGNED NOT NULL,
  `id_pembayaran` int(11) UNSIGNED NOT NULL,
  `jumlah` int(10) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `id_produk`, `id_pembayaran`, `jumlah`, `created_at`, `updated_at`) VALUES
(51, 34, 31, 1, '2023-12-04', '2023-12-04');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) UNSIGNED NOT NULL,
  `produk` varchar(20) NOT NULL,
  `stok` int(11) NOT NULL,
  `size` enum('S','M','L','XL','XXL') NOT NULL,
  `harga` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `id_kategori` int(11) UNSIGNED NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `produk`, `stok`, `size`, `harga`, `keterangan`, `foto`, `id_kategori`, `created_at`, `updated_at`, `deleted_at`) VALUES
(31, 'Jaket Trucker', 3, 'L', 200000, 'Sangat cocok digunakan saat musim dingin atau hujan.', '1701151147_9779b77a5aeecf98b799.jpg', 4, '2023-11-28', '2023-12-02', NULL),
(32, 'AJS Bomber XZ', 7, 'XL', 300000, 'Bahan nyaman dan tidak gerah saat dipakai lama.', '1701221898_ec5ac76351b7c1a48525.jpg', 4, '2023-11-29', '2023-12-03', NULL),
(33, 'Polo TShirt AK', 19, 'L', 300000, 'Kemeja Polo polos dengan bahan katun membuat anda sangat nyaman saat beraktifitas formal dan informal', '1701222055_c74751f5bfacc90415cd.jpg', 5, '2023-11-29', '2023-12-02', NULL),
(34, 'Seragam AJS', 5, 'XL', 250000, 'Seragam dengan sablon kualitas terbaik', '1701437328_b197ed473171efd6ea5c.jpg', 6, '2023-11-29', '2023-12-04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_produk` int(11) UNSIGNED NOT NULL,
  `id_customer` int(11) UNSIGNED NOT NULL,
  `rate` double NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`id`, `id_produk`, `id_customer`, `rate`, `created_at`, `updated_at`) VALUES
(160, 34, 1, 4, '2023-12-04', '2023-12-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembayaran_id_customer_foreign` (`id_customer`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesanan_id_produk_foreign` (`id_produk`),
  ADD KEY `pesanan_id_pembayaran_foreign` (`id_pembayaran`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produk_id_kategori_foreign` (`id_kategori`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rate_id_produk_foreign` (`id_produk`),
  ADD KEY `rate_id_customer_foreign` (`id_customer`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_id_customer_foreign` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_id_pembayaran_foreign` FOREIGN KEY (`id_pembayaran`) REFERENCES `pembayaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_id_produk_foreign` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rate`
--
ALTER TABLE `rate`
  ADD CONSTRAINT `rate_id_customer_foreign` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rate_id_produk_foreign` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
