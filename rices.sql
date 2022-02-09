-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2022 at 03:43 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rices`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `kode` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `nama` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `telepon` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `foto` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `info` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `sales_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `kode`, `nama`, `alamat`, `telepon`, `foto`, `info`, `sales_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'CUS-1643215355', 'Toko IKA', 'JL. RE MARTADINATA, NO 99, TELUK BETUNG', '081278988765', 'cus-1643215392_1ef9deeb998985edb5f3.jpg', 'Toko Sembako IKA', 1, '2022-01-26 10:43:12', '2022-01-26 10:43:12', NULL),
(4, 'CUS-1644126381', 'TOKO IKEA I', 'JL. ARIF RAHMAN HAKIM', '082185607040', '', 'SAMPLE INFO', 4, '2022-02-06 12:46:50', '2022-02-06 12:47:35', NULL),
(5, 'CUS-1644142061', 'Sample Customer', 'Sample Alamat Customer', '0987654321', '', 'Sample Info', 5, '2022-02-06 17:08:00', '2022-02-06 17:08:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `do`
--

CREATE TABLE `do` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `so_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `kode` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `tanggal` date DEFAULT NULL,
  `customer` int(11) NOT NULL DEFAULT 0,
  `jumlah` double NOT NULL DEFAULT 0,
  `modal` double NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `diskon` double NOT NULL DEFAULT 0,
  `pajak` double NOT NULL DEFAULT 0,
  `service` double NOT NULL DEFAULT 0,
  `total` double NOT NULL DEFAULT 0,
  `due` date DEFAULT NULL,
  `bayar` double NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `do_bayar`
--

CREATE TABLE `do_bayar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `do_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `kode` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `tanggal` date DEFAULT NULL,
  `jumlah` double NOT NULL DEFAULT 0,
  `metode` enum('cash','transfer') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cash',
  `info` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `do_detail`
--

CREATE TABLE `do_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `do_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `product_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `qty` double NOT NULL DEFAULT 0,
  `harga` double NOT NULL DEFAULT 0,
  `modal` double NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `icon` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `parent_id`, `label`, `icon`, `url`, `order`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, 'Dashboard', 'command', 'sys/dashboard', 1, NULL, NULL, NULL),
(2, 0, 'Master', 'codesandbox', 'sys/master', 2, NULL, NULL, NULL),
(3, 2, 'Produk', 'home', 'sys/products', 0, NULL, NULL, NULL),
(4, 15, 'Sales', 'home', 'sys/sales', 0, NULL, NULL, NULL),
(5, 15, 'Customer', 'home', 'sys/customer', 0, NULL, NULL, NULL),
(6, 15, 'Suplier', 'home', 'sys/suplier', 0, NULL, NULL, NULL),
(7, 2, 'Satuan', 'home', 'sys/satuan', 0, NULL, NULL, NULL),
(8, 17, 'Persediaan', 'home', 'sys/persediaan', 0, NULL, NULL, NULL),
(9, 17, 'Hutang', 'home', 'sys/hutang', 0, NULL, NULL, NULL),
(10, 17, 'Piutang', 'home', 'sys/piutang', 0, NULL, NULL, NULL),
(11, 23, 'Pembelian (SO)', 'home', 'sys/so', 1, NULL, NULL, NULL),
(12, 23, 'Pengiriman (DO)', 'home', 'sys/do', 2, NULL, NULL, NULL),
(13, 16, 'Penerimaan (RO)', 'home', 'sys/ro', 2, NULL, NULL, NULL),
(14, 16, 'Pemesanan (PO)', 'home', 'sys/po', 1, NULL, NULL, NULL),
(15, 0, 'Contact', 'book', 'sys/contact', 3, NULL, NULL, NULL),
(16, 0, 'Goods In', 'log-in', 'sys/transaksi', 4, NULL, NULL, NULL),
(17, 0, 'Reports', 'printer', 'sys/laporan', 6, NULL, NULL, NULL),
(18, 17, 'Penjualan', '', 'sys/penjualan', 0, NULL, NULL, NULL),
(19, 17, 'Pembelian', '', 'sys/pembelian', 0, NULL, NULL, NULL),
(20, 2, 'Merk', '', 'sys/merk', 0, '2022-01-26 13:51:15', '2022-01-26 13:51:15', NULL),
(21, 2, 'Varian', '', 'sys/varian', 0, '2022-01-26 13:51:15', '2022-01-26 13:51:15', NULL),
(22, 0, 'System', 'cpu', '', 7, '2022-01-26 16:50:35', '2022-01-26 16:50:35', '2022-01-26 16:50:35'),
(23, 0, 'Goods Out', 'log-out', '', 5, '2022-01-26 16:50:35', '2022-01-26 16:50:35', '2022-01-26 16:50:35'),
(24, 22, 'Users', '', 'sys/users', 0, '2022-01-26 17:00:54', '2022-01-26 17:00:54', '2022-01-26 17:00:54'),
(25, 22, 'Roles', '', 'sys/roles', 0, '2022-01-26 17:00:54', '2022-01-26 17:00:54', '2022-01-26 17:00:54'),
(26, 22, 'Permision', '', 'sys/permision', 0, '2022-01-26 17:01:11', '2022-01-26 17:01:11', '2022-01-26 17:01:11'),
(27, 23, 'Pembayaran', 'home', 'sys/so/bayar', 3, NULL, NULL, NULL),
(28, 16, 'Pembayaran', 'home', 'sys/po/bayar', 3, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `merk`
--

CREATE TABLE `merk` (
  `id` int(10) UNSIGNED NOT NULL,
  `merk` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `info` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `merk`
--

INSERT INTO `merk` (`id`, `merk`, `info`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Autum', 'Beras Premium Autum', '2022-01-26 08:22:23', '2022-01-26 08:22:23', NULL),
(2, 'Hakuma', 'Beras Premium Hakuma', '2022-01-26 08:22:33', '2022-01-26 08:22:33', NULL),
(3, 'Raja Lampung', 'Beras Premium Raja Lampung', '2022-01-26 08:22:48', '2022-01-26 08:25:47', NULL),
(4, 'Curah', 'Beras Kwalitas Asalan', '2022-01-26 10:14:53', '2022-01-26 10:14:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `po`
--

CREATE TABLE `po` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `tanggal` date DEFAULT NULL,
  `suplier_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `jumlah` double NOT NULL DEFAULT 0,
  `potongan` double NOT NULL DEFAULT 0,
  `total` double NOT NULL DEFAULT 0,
  `bayar` double NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `info` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `po`
--

INSERT INTO `po` (`id`, `kode`, `tanggal`, `suplier_id`, `jumlah`, `potongan`, `total`, `bayar`, `status`, `info`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 'PO-1644154263', '2022-02-06', 7, 6225000, 100000, 6125000, 0, 0, 'Sample info', '2022-02-06 20:31:43', '2022-02-06 20:31:43', NULL),
(12, 'PO-1644338082', '2022-02-08', 0, 115000, -100000, 15000, 0, 0, '2121212', '2022-02-08 23:35:39', '2022-02-08 23:35:39', NULL),
(13, 'PO-1644338912', '2022-02-08', 7, 115000, -100000, 15000, 0, 0, 'asdasd', '2022-02-08 23:49:37', '2022-02-08 23:49:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `po_bayar`
--

CREATE TABLE `po_bayar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `po_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `kode` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `tanggal` date DEFAULT NULL,
  `jumlah` double NOT NULL DEFAULT 0,
  `metode` enum('cash','transfer') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cash',
  `info` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `po_detail`
--

CREATE TABLE `po_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `po_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `product_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `qty` double NOT NULL DEFAULT 0,
  `harga` double NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `po_detail`
--

INSERT INTO `po_detail` (`id`, `po_id`, `product_id`, `qty`, `harga`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 9, 1, 5, 62000, '2022-02-06 17:08:35', '2022-02-06 17:08:35', NULL),
(10, 9, 2, 5, 10000, '2022-02-06 17:08:35', '2022-02-06 17:08:35', NULL),
(11, 10, 1, 2, 62000, '2022-02-06 18:00:26', '2022-02-06 18:00:26', NULL),
(12, 11, 1, 100, 57500, '2022-02-06 20:31:43', '2022-02-06 20:31:43', NULL),
(13, 11, 2, 50, 9500, '2022-02-06 20:31:43', '2022-02-06 20:31:43', NULL),
(14, 12, 1, 2, 57500, '2022-02-08 23:35:39', '2022-02-08 23:35:39', NULL),
(15, 13, 1, 2, 57500, '2022-02-08 23:49:37', '2022-02-08 23:49:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `nama` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `merk_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `varian_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `satuan_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `beli` double NOT NULL DEFAULT 0,
  `jual` double NOT NULL DEFAULT 0,
  `min` double NOT NULL DEFAULT 0,
  `max` double NOT NULL DEFAULT 0,
  `stock` double NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `kode`, `nama`, `merk_id`, `varian_id`, `satuan_id`, `beli`, `jual`, `min`, `max`, `stock`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'PRD-1643213778', 'Beras Premium', 1, 2, 1, 57500, 62000, 10, 100, 50, 1, '2022-01-26 10:16:55', '2022-01-26 10:16:55', NULL),
(2, 'PRD-1643640054', 'Mewah', 1, 1, 1, 9500, 10000, 10, 10, 10, 1, '2022-01-31 08:41:30', '2022-01-31 08:41:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ro`
--

CREATE TABLE `ro` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `po_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `kode` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `tanggal` date DEFAULT NULL,
  `jumlah` double NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ro`
--

INSERT INTO `ro` (`id`, `po_id`, `kode`, `tanggal`, `jumlah`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 11, 'RO-1644333059', '2022-02-08', 6225000, 0, '2022-02-08 22:11:09', '2022-02-08 22:11:09', NULL),
(8, 13, 'RO-1644380795', '2022-02-09', 115000, 0, '2022-02-09 11:26:59', '2022-02-09 11:26:59', NULL),
(9, 13, 'RO-1644383173', '2022-02-09', 115000, 0, '2022-02-09 12:07:44', '2022-02-09 12:07:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `info` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `info`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'System Administrator', '2022-01-17 01:53:29', '2022-01-26 11:16:46', NULL),
(2, 'manager', 'Manager User Group', '2022-01-17 01:53:37', '2022-01-26 11:16:22', NULL),
(3, 'counter', 'Sales Counter User Group', '2022-01-17 01:53:44', '2022-01-26 11:16:37', NULL),
(4, 'salles', 'Sales User Group', '2022-01-17 01:53:51', '2022-01-26 11:18:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ro_detail`
--

CREATE TABLE `ro_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ro_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `product_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `qty` double NOT NULL DEFAULT 0,
  `harga` double NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ro_detail`
--

INSERT INTO `ro_detail` (`id`, `ro_id`, `product_id`, `qty`, `harga`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 6, 1, 100, 57500, '2022-02-08 22:11:09', '2022-02-08 22:11:09', NULL),
(12, 6, 2, 50, 9500, '2022-02-08 22:11:09', '2022-02-08 22:11:09', NULL),
(13, 7, 1, 2, 57500, '2022-02-09 11:15:55', '2022-02-09 11:15:55', NULL),
(14, 8, 1, 2, 57500, '2022-02-09 11:26:59', '2022-02-09 11:26:59', NULL),
(15, 9, 1, 2, 57500, '2022-02-09 12:07:44', '2022-02-09 12:07:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `kode` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `nama` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `telepon` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `foto` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `info` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `kode`, `nama`, `alamat`, `telepon`, `foto`, `info`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 'SLS-1644142040', 'Sample Sales', 'Sample Alamat Sales', '0987654321', '', 'Sample Info', '2022-02-06 17:07:37', '2022-02-06 17:07:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id` int(10) UNSIGNED NOT NULL,
  `satuan` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `info` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id`, `satuan`, `info`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Zak', 'Satuan Zak', '2022-01-26 20:12:25', '2022-01-26 07:33:26', NULL),
(2, 'KG', 'Kilogram', '2022-01-26 07:36:17', '2022-01-26 07:36:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `so`
--

CREATE TABLE `so` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `tanggal` date DEFAULT NULL,
  `jumlah` double NOT NULL DEFAULT 0,
  `seller_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `customer_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `so`
--

INSERT INTO `so` (`id`, `kode`, `tanggal`, `jumlah`, `seller_id`, `customer_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'SO-1644142761', '2022-02-06', 320000, 5, 5, 0, '2022-02-06 17:19:53', '2022-02-06 17:19:53', NULL),
(3, 'SO-1644145313', '2022-02-06', 124000, 5, 5, 0, '2022-02-06 18:03:12', '2022-02-06 18:03:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `so_detail`
--

CREATE TABLE `so_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `so_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `product_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `qty` double NOT NULL DEFAULT 0,
  `harga` double NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `so_detail`
--

INSERT INTO `so_detail` (`id`, `so_id`, `product_id`, `qty`, `harga`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 2, 1, 5, 62000, '2022-02-06 17:19:53', '2022-02-06 17:19:53', NULL),
(4, 2, 2, 1, 10000, '2022-02-06 17:19:53', '2022-02-06 17:19:53', NULL),
(5, 3, 1, 2, 62000, '2022-02-06 18:03:12', '2022-02-06 18:03:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supliers`
--

CREATE TABLE `supliers` (
  `id` int(11) NOT NULL,
  `kode` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `nama` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `telepon` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `foto` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `info` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supliers`
--

INSERT INTO `supliers` (`id`, `kode`, `nama`, `alamat`, `telepon`, `foto`, `info`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'SUP-1644141948', 'Sample Suplier', 'Alamat Suplier', '0987654321', '', 'Sample Info Suplier', '2022-02-06 17:06:10', '2022-02-06 17:06:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `role_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `realname` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `avatar` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `info` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role_id`, `realname`, `avatar`, `info`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', '$2y$10$1v3ulmTTTvxiyXb9K5ww6OV8iOcxXWFfv3w0u3fcUt0n5BM/.hwbO', 1, 'Administrator', 'usr-1643218191_7e6056fe206ec64bb8b6.jpg', 'Bukan Pakmin', '2022-01-26 11:29:51', '2022-01-26 11:29:51', NULL),
(2, 'SLS-1643218233', '$2y$10$NpuPgBEkSqNVoFe7sKPX5uJpvaLMo3cDxLIDR8tcYOViM9beilWcS', 4, 'Ari Juanda', '1643218264_1dab80c5c840cf78c2d5.jpg', '', '2022-01-26 11:31:04', '2022-01-26 11:31:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `varian`
--

CREATE TABLE `varian` (
  `id` int(10) UNSIGNED NOT NULL,
  `varian` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `info` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `varian`
--

INSERT INTO `varian` (`id`, `varian`, `info`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1 KG', 'Varian 1 KG', '2022-01-26 08:30:12', '2022-01-26 08:32:43', NULL),
(2, '5 KG', 'Varian 5 KG', '2022-01-26 08:32:37', '2022-01-26 08:32:37', NULL),
(3, '10 KG', 'Varian 10 KG', '2022-01-26 08:32:56', '2022-01-26 08:32:56', NULL),
(4, '15 KG', 'Varian 15 KG', '2022-01-26 08:33:10', '2022-01-26 08:33:10', NULL),
(5, '20 KG', 'Varian 20 KG', '2022-01-26 08:33:25', '2022-01-26 08:33:25', NULL),
(6, '50 KG', 'Varian 50 KG', '2022-01-26 08:33:57', '2022-01-26 08:33:57', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indexes for table `do`
--
ALTER TABLE `do`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `do_bayar`
--
ALTER TABLE `do_bayar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `do_detail`
--
ALTER TABLE `do_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `satuan` (`merk`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `po`
--
ALTER TABLE `po`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `po_bayar`
--
ALTER TABLE `po_bayar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `po_detail`
--
ALTER TABLE `po_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ro`
--
ALTER TABLE `ro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role` (`role`);

--
-- Indexes for table `ro_detail`
--
ALTER TABLE `ro_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `satuan` (`satuan`);

--
-- Indexes for table `so`
--
ALTER TABLE `so`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `so_detail`
--
ALTER TABLE `so_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supliers`
--
ALTER TABLE `supliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `varian`
--
ALTER TABLE `varian`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `satuan` (`varian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `do`
--
ALTER TABLE `do`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `do_bayar`
--
ALTER TABLE `do_bayar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `do_detail`
--
ALTER TABLE `do_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `merk`
--
ALTER TABLE `merk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `po`
--
ALTER TABLE `po`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `po_bayar`
--
ALTER TABLE `po_bayar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `po_detail`
--
ALTER TABLE `po_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ro`
--
ALTER TABLE `ro`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ro_detail`
--
ALTER TABLE `ro_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `so`
--
ALTER TABLE `so`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `so_detail`
--
ALTER TABLE `so_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `supliers`
--
ALTER TABLE `supliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `varian`
--
ALTER TABLE `varian`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
