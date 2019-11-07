-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 26, 2019 at 09:08 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopkh`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

DROP TABLE IF EXISTS `ads`;
CREATE TABLE IF NOT EXISTS `ads` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `image`, `name`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(6, '1570595367.jpg', 'Pi pay', '2019-10-09', '2019-11-08', '2019-10-08 21:29:27', '2019-10-08 21:29:27'),
(7, '1570623352.jpg', 'Free Wrist Strap', '2019-10-09', '2019-11-01', '2019-10-09 05:15:52', '2019-10-09 05:15:52'),
(8, '1571746750.gif', 'Free Delivery', '2019-10-06', '2019-11-15', '2019-10-09 05:16:09', '2019-10-22 05:19:10'),
(9, '1570623383.jpg', 'Mine', '2019-10-09', '2019-11-01', '2019-10-09 05:16:23', '2019-10-09 05:16:23'),
(10, '1570623398.gif', 'Paygo', '2019-10-09', '2019-11-01', '2019-10-09 05:16:38', '2019-10-09 05:16:38'),
(11, '1570623419.png', 'Wing', '2019-10-09', '2019-12-01', '2019-10-09 05:16:59', '2019-10-09 05:16:59');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `parent_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Men', NULL, 1, '2019-09-17 01:21:01', '2019-10-07 08:26:54'),
(3, 'Women', NULL, 1, '2019-09-17 01:22:28', '2019-09-17 01:22:28'),
(4, 'Shoes(M)', 1, 1, '2019-09-17 01:36:21', '2019-09-17 01:36:21'),
(5, 'Shoes(F)', 3, 1, '2019-09-17 01:43:50', '2019-09-17 01:43:50'),
(6, 'couple', NULL, 1, '2019-10-07 08:13:14', '2019-10-07 08:13:14'),
(7, 'Shoes(C)', 6, 1, '2019-10-07 08:13:31', '2019-10-07 08:20:59'),
(8, 'Shoes(Ex)', 4, 1, '2019-10-07 08:40:25', '2019-10-07 08:43:28'),
(9, 'Bag(M)', 1, 1, '2019-10-17 05:23:32', '2019-10-17 05:23:32'),
(10, 'Handbag(F)', 3, 1, '2019-10-22 03:24:51', '2019-10-22 03:24:51'),
(11, 'Wallet(M)', 1, 1, '2019-10-22 03:29:56', '2019-10-22 03:29:56'),
(12, 'Belt(F)', 3, 1, '2019-10-22 05:12:40', '2019-10-22 05:13:12');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

DROP TABLE IF EXISTS `color`;
CREATE TABLE IF NOT EXISTS `color` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image_order` int(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `color_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `image`, `color`, `product_id`, `image_order`, `created_at`, `updated_at`) VALUES
(1, '1568902124.O1CN01UCkKKI1L9I08UKtH5_!!2438071256.jpg_500x500.jpg', 'efgh', 5, NULL, '2019-09-19 07:08:44', '2019-09-19 07:08:44'),
(2, '1568902384.O1CN012k0LMe1quh5s6p2O9_!!322795556.jpg_500x500.jpg', 'Watch White', 6, NULL, '2019-09-19 07:13:04', '2019-09-19 07:13:04'),
(3, '1568902811.O1CN01uf1Sxq1kEezIRBLqU_!!1060944652.jpg_500x500.jpg', 'asdfasdffweeeeeadsf', 6, NULL, '2019-09-19 07:20:11', '2019-09-19 07:20:11'),
(4, '1568903333.O1CN01UCkKKI1L9I08UKtH5_!!2438071256.jpg_500x500.jpg', 'sdaasdf', 6, NULL, '2019-09-19 07:28:53', '2019-09-19 07:28:53'),
(5, '1568903333.TB2d8R6qBjTBKNjSZFNXXasFXXa_!!2081448891.jpg_500x500.jpg', 'asdfsdfsdfafd', 6, NULL, '2019-09-19 07:28:53', '2019-09-19 07:28:53'),
(6, '1568903333.O1CN0115cOcr2GVD46eCGUT_!!2931329020.jpg_500x500.jpg', 'ewweewewe', 6, NULL, '2019-09-19 07:28:53', '2019-09-19 07:28:53'),
(7, '1570529685.O1CN01poSf1l1myZzhdbBTx_!!2260625023.jpg_500x500.jpg', 'default', 8, 1, '2019-10-08 03:14:45', '2019-10-08 03:14:45'),
(8, '1570529685.O1CN013SyCjO1myZzg5aYAO_!!2260625023.jpg_500x500.jpg', 'white', 8, 2, '2019-10-08 03:14:46', '2019-10-08 03:14:46'),
(9, '1570529686.O1CN01GpfhHm1myZzhRK4qs_!!2260625023.jpg_500x500.jpg', 'black', 8, 3, '2019-10-08 03:14:46', '2019-10-08 03:14:46'),
(10, '1570532048.TB298KjFx9YBuNjy0FfXXXIsVXa_!!2260625023.jpg_500x500.jpg', 'default', 9, 1, '2019-10-08 03:54:08', '2019-10-08 03:54:08'),
(11, '1570532048.TB2OLR5FER1BeNjy0FmXXb0wVXa_!!2260625023.jpg_500x500.jpg', 'yellow', 9, 2, '2019-10-08 03:54:08', '2019-10-08 03:54:08'),
(12, '1570532048.TB2fmC4w5CYBuNkHFCcXXcHtVXa_!!2260625023.jpg_500x500.jpg', 'white', 9, 3, '2019-10-08 03:54:08', '2019-10-08 03:54:08'),
(13, '1570532048.TB298KjFx9YBuNjy0FfXXXIsVXa_!!2260625023.jpg_500x500.jpg', 'red', 9, 4, '2019-10-08 03:54:09', '2019-10-08 03:54:09'),
(14, '1570537877.O1CN01U8KrSi1h2nxOENWhI_!!808454220.jpg_500x500.jpg', 'default', 10, 1, '2019-10-08 05:31:17', '2019-10-08 05:31:17'),
(15, '1570537877.O1CN01NoY4Js1h2nxNm254v_!!808454220.jpg_500x500.jpg', 'green', 10, 2, '2019-10-08 05:31:17', '2019-10-08 05:31:17'),
(16, '1570537877.O1CN01W6k3aK1h2nxOghy3J_!!808454220.jpg_500x500.jpg', 'blue', 10, 3, '2019-10-08 05:31:17', '2019-10-08 05:31:17'),
(17, '1570537877.O1CN01vR2tMk1h2nxL5G5Tm_!!808454220.jpg_500x500.jpg', 'red', 10, 4, '2019-10-08 05:31:17', '2019-10-08 05:31:17'),
(18, '1570539842.O1CN01eExzNa1rapViHbvWZ_!!0-item_pic.jpg_500x500.jpg', 'default', 11, 1, '2019-10-08 06:04:03', '2019-10-08 06:04:03'),
(19, '1570539843.O1CN01s7IoOD1rapVl6OzJH_!!3547005648.jpg_500x500.jpg', 'blue', 11, 2, '2019-10-08 06:04:03', '2019-10-08 06:04:03'),
(20, '1570539843.O1CN01LkVtLz1rapVkELQnc_!!3547005648.jpg_500x500.jpg', 'black', 11, 3, '2019-10-08 06:04:03', '2019-10-08 06:04:03'),
(21, '1570539843.O1CN01j05sTn1rapVnJmp83_!!3547005648.jpg_500x500.jpg', 'white', 11, 4, '2019-10-08 06:04:03', '2019-10-08 06:04:03'),
(22, '1570539843.O1CN01eExzNa1rapViHbvWZ_!!0-item_pic.jpg_500x500.jpg', 'yellow', 11, 5, '2019-10-08 06:04:03', '2019-10-08 06:04:03'),
(31, '1570604559.O1CN017y9tpJ23ythqp7e0j_!!4099157325.jpg_500x500.jpg', 'default', 14, 1, '2019-10-08 23:31:50', '2019-10-09 00:02:39'),
(32, '1570604559.O1CN01MWhRfF23ythrDfFbY_!!4099157325.jpg_500x500.jpg', 'black', 14, 2, '2019-10-08 23:31:50', '2019-10-09 00:02:40'),
(33, '1570604560.O1CN01aWFkvy23ythr7AlLe_!!4099157325.jpg_500x500.jpg', 'blue', 14, 3, '2019-10-08 23:31:50', '2019-10-09 00:02:40'),
(34, '1570604560.O1CN017Ybqzn23ythqVy1u7_!!4099157325.jpg_500x500.jpg', 'yellow', 14, 4, '2019-10-08 23:31:50', '2019-10-09 00:02:40'),
(35, '1570626402.O1CN01vVXCve1h2nxFpadzo_!!808454220.jpg_500x500.jpg', 'default', 15, 1, '2019-10-09 06:06:42', '2019-10-09 06:06:42'),
(36, '1570626402.O1CN01DTcdDk1h2nxEaGyUc_!!808454220.jpg_500x500.jpg', 'black', 15, 2, '2019-10-09 06:06:42', '2019-10-09 06:06:42'),
(37, '1570626402.O1CN01Ybl5FO1h2nxAwHBkt_!!808454220.jpg_500x500.jpg', 'white', 15, 3, '2019-10-09 06:06:43', '2019-10-09 06:06:43'),
(38, '1571316135.O1CN01uf1Sxq1kEezIRBLqU_!!1060944652.jpg_500x500.jpg', 'default', 19, 1, '2019-10-17 05:42:15', '2019-10-17 05:42:15'),
(39, '1571316135.O1CN010pLs9b1kEezPygn8v_!!1060944652.jpg_500x500.jpg', 'red', 19, 2, '2019-10-17 05:42:16', '2019-10-17 05:42:16'),
(40, '1571316136.O1CN01fqmk2U1kEezPGogQM_!!1060944652.jpg_500x500.jpg', 'blue', 19, 3, '2019-10-17 05:42:16', '2019-10-17 05:42:16'),
(41, '1571316136.O1CN01uHokgX1kEezPGr6He_!!1060944652.jpg_500x500.jpg', 'yellow', 19, 4, '2019-10-17 05:42:16', '2019-10-17 05:42:16'),
(42, '1571316136.O1CN01nmQb4V1kEezOr6JiS_!!1060944652.jpg_500x500.jpg', 'black', 19, 5, '2019-10-17 05:42:16', '2019-10-17 05:42:16'),
(43, '1571739976.O1CN01cV34YR2Mb3pXyJXSS_!!732039845.jpg_500x500.jpg', 'default', 20, 1, '2019-10-22 03:26:17', '2019-10-22 03:26:17'),
(44, '1571739977.O1CN01eqIhdc2Mb3pYTNtcv_!!732039845.jpg_500x500.jpg', 'blue', 20, 2, '2019-10-22 03:26:17', '2019-10-22 03:26:17'),
(45, '1571739977.O1CN01ijH90S2Mb3pVCYOUA_!!732039845.jpg_500x500.jpg', 'red', 20, 3, '2019-10-22 03:26:17', '2019-10-22 03:26:17'),
(46, '1571739977.O1CN01NpR9qO2Mb3pUluoR4_!!732039845.jpg_500x500.jpg', 'black', 20, 4, '2019-10-22 03:26:17', '2019-10-22 03:26:17'),
(47, '1571739977.O1CN01FlTQvG2Mb3pVEmHo7_!!732039845.jpg_500x500.jpg', 'brown', 20, 5, '2019-10-22 03:26:17', '2019-10-22 03:26:17'),
(48, '1571740142.O1CN01oZf1E62Mb3pJrFFQx_!!732039845.jpg_500x500.jpg', 'default', 21, 1, '2019-10-22 03:29:02', '2019-10-22 03:29:02'),
(49, '1571740142.O1CN01m2qrtr2Mb3pQIqZV3_!!732039845.jpg_500x500.jpg', 'white', 21, 2, '2019-10-22 03:29:03', '2019-10-22 03:29:03'),
(50, '1571740143.O1CN01EEQrUM2Mb3pNoY2R9_!!732039845.jpg_500x500.jpg', 'black', 21, 3, '2019-10-22 03:29:03', '2019-10-22 03:29:03'),
(51, '1571740143.O1CN01F2wBnf2Mb3pN4QJLn_!!732039845.jpg_500x500.jpg', 'red', 21, 4, '2019-10-22 03:29:03', '2019-10-22 03:29:03'),
(52, '1571740280.Thefashion_20170101154528-840766.jpg', 'default', 22, 1, '2019-10-22 03:31:20', '2019-10-22 03:31:20'),
(53, '1571740280.Thefashion_20170101154523-253965.jpg', 'black', 22, 2, '2019-10-22 03:31:20', '2019-10-22 03:31:20'),
(54, '1571740280.Thefashion_20170101154513-135963.jpg', 'white', 22, 3, '2019-10-22 03:31:20', '2019-10-22 03:31:20'),
(55, '1571741016.Thefashion_20170101154717-334789 (1).jpg', 'default', 23, 1, '2019-10-22 03:43:36', '2019-10-22 03:43:36'),
(56, '1571741016.Thefashion_20170101154619-032961.jpg', 'gray', 23, 2, '2019-10-22 03:43:36', '2019-10-22 03:43:36'),
(57, '1571741016.Thefashion_20170101154626-767425.jpg', 'grayLong', 23, 3, '2019-10-22 03:43:36', '2019-10-22 03:43:36'),
(58, '1571741016.Thefashion_20170101154637-514591.jpg', 'brown', 23, 4, '2019-10-22 03:43:36', '2019-10-22 03:43:36'),
(59, '1571741016.Thefashion_20170101154642-866951.jpg', 'brownLong', 23, 5, '2019-10-22 03:43:36', '2019-10-22 03:43:36'),
(60, '1571741016.Thefashion_20170101154603-208912.jpg', 'milk', 23, 6, '2019-10-22 03:43:36', '2019-10-22 03:43:36'),
(61, '1571741016.Thefashion_20170101154609-276074.jpg', 'milkLong', 23, 7, '2019-10-22 03:43:36', '2019-10-22 03:43:36'),
(62, '1571741258.Thefashion_20190811151831-348703.jpg', 'default', 24, 1, '2019-10-22 03:47:38', '2019-10-22 03:47:38'),
(63, '1571741258.Thefashion_20190811151833-808479.jpg', 'black', 24, 2, '2019-10-22 03:47:38', '2019-10-22 03:47:38'),
(64, '1571741258.Thefashion_20190811151835-557333.png', 'red', 24, 3, '2019-10-22 03:47:38', '2019-10-22 03:47:38'),
(65, '1571741258.Thefashion_20190811151839-255377.png', 'blue', 24, 4, '2019-10-22 03:47:38', '2019-10-22 03:47:38'),
(66, '1571746269.O1CN01ANf2bZ23dN7hILNxI_!!0-item_pic.jpg_500x500.jpg', 'default', 25, 1, '2019-10-22 05:11:10', '2019-10-22 05:11:10'),
(67, '1571746270.O1CN01SJVg2W23dN7jyWa9w_!!3475007278.jpg_500x500.jpg', 'black', 25, 2, '2019-10-22 05:11:10', '2019-10-22 05:11:10'),
(68, '1571746270.O1CN01NM6QVD23dN7gadUio_!!3475007278.jpg_500x500.jpg', 'white', 25, 3, '2019-10-22 05:11:10', '2019-10-22 05:11:10');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2019_05_26_153245_edit_users_fields', 1),
(7, '2019_09_17_020352_create_products_table', 2),
(8, '2019_09_17_025041_add_role_column', 3),
(9, '2019_09_17_043031_add_status_column', 4),
(10, '2019_09_17_075732_create_categories_table', 5),
(11, '2019_09_17_085751_add_category_id_column', 6),
(12, '2019_09_17_090638_create_color_table', 7),
(13, '2019_09_17_121141_add_foreign_product_category_column', 8),
(14, '2019_10_08_044218_create_ads_table', 9),
(15, '2019_10_09_121848_add_image_order_table', 10),
(16, '2019_10_09_122020_create_size_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` longtext COLLATE utf8mb4_unicode_ci,
  `code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(9,2) NOT NULL,
  `size_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `category_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_code_unique` (`code`),
  UNIQUE KEY `products_name_unique` (`name`),
  UNIQUE KEY `products_size_id_unique` (`size_id`),
  UNIQUE KEY `products_color_id_unique` (`color_id`),
  KEY `products_category_id_foreign` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `image`, `code`, `name`, `price`, `size_id`, `brand`, `color_id`, `created_at`, `updated_at`, `status`, `category_id`) VALUES
(8, NULL, 'MS00005', 'Shoe Raichu', 14.00, NULL, 'The Fashion', NULL, '2019-10-08 03:14:45', '2019-10-22 05:05:24', 1, 4),
(9, NULL, 'MS00006', 'Shoes Up To Data', 19.00, NULL, 'The Fashion', NULL, '2019-10-08 03:54:08', '2019-10-08 22:21:12', 1, 4),
(10, NULL, 'WS00001', 'Martin boots female autumn', 17.00, NULL, 'The Fashion', NULL, '2019-10-08 05:31:17', '2019-10-08 05:31:17', 1, 5),
(11, NULL, 'MS00007', 'Mens shoes summer', 17.50, NULL, 'The Fashion', NULL, '2019-10-08 06:04:02', '2019-10-08 06:04:02', 1, 4),
(14, NULL, 'WS00002', 'Low cut canvas shoes female', 17.00, NULL, 'The Fashion', NULL, '2019-10-08 23:31:50', '2019-10-08 23:31:50', 1, 5),
(15, NULL, 'WS00003', 'Martin boots female', 17.00, NULL, 'The Fashion', NULL, '2019-10-09 06:06:42', '2019-10-09 06:06:42', 1, 5),
(19, NULL, 'MB00001', 'Schoolbags high school students', 17.50, NULL, 'The Fashion', NULL, '2019-10-17 05:42:15', '2019-10-17 05:42:15', 1, 9),
(20, NULL, 'WB00001', 'Foreign air small bag female', 11.00, NULL, 'The Fashion', NULL, '2019-10-22 03:26:16', '2019-10-22 03:26:16', 1, 10),
(21, NULL, 'WB00002', 'New womens bag small square bag', 11.50, NULL, 'The Fashion', NULL, '2019-10-22 03:29:02', '2019-10-22 03:29:02', 1, 10),
(22, NULL, 'MW000001', 'The new business casual wellet', 12.00, NULL, 'The Fashion', NULL, '2019-10-22 03:31:20', '2019-10-22 03:31:20', 1, 11),
(23, NULL, 'MW00002', 'Genuine multifunction card package wallet', 11.50, NULL, 'The Fashion', NULL, '2019-10-22 03:43:36', '2019-10-22 03:43:36', 1, 11),
(24, NULL, 'MB00002', 'Student bag street trend shoulder', 17.50, NULL, 'The Fashion', NULL, '2019-10-22 03:47:38', '2019-10-22 03:47:38', 1, 9),
(25, NULL, 'MS00034', 'Canvas shoes mens tide summer', 17.50, NULL, 'The Fashion', NULL, '2019-10-22 05:11:09', '2019-10-22 05:11:09', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

DROP TABLE IF EXISTS `size`;
CREATE TABLE IF NOT EXISTS `size` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `size` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `size_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `size`, `product_id`, `created_at`, `updated_at`) VALUES
(1, '35', 15, '2019-10-09 06:06:42', '2019-10-09 06:06:42'),
(2, '36', 15, '2019-10-09 06:06:42', '2019-10-09 06:06:42'),
(3, '37', 15, '2019-10-09 06:06:42', '2019-10-09 06:06:42'),
(4, '38', 15, '2019-10-09 06:06:42', '2019-10-09 06:06:42'),
(5, '39', 15, '2019-10-09 06:06:42', '2019-10-09 06:06:42'),
(6, '40', 15, '2019-10-09 06:06:42', '2019-10-09 06:06:42'),
(7, '39', 8, NULL, NULL),
(8, '40', 8, NULL, NULL),
(9, '41', 8, NULL, NULL),
(10, '42', 8, NULL, NULL),
(11, '43', 8, NULL, NULL),
(12, '44', 8, NULL, NULL),
(13, '39', 9, NULL, NULL),
(14, '40', 9, NULL, NULL),
(15, '41', 9, NULL, NULL),
(16, '42', 9, NULL, NULL),
(17, '43', 9, NULL, NULL),
(18, '44', 9, NULL, NULL),
(19, '35', 10, NULL, NULL),
(20, '36', 10, NULL, NULL),
(21, '37', 10, NULL, NULL),
(22, '38', 10, NULL, NULL),
(23, '39', 10, NULL, NULL),
(24, '40', 10, NULL, NULL),
(25, '39', 11, NULL, NULL),
(26, '40', 11, NULL, NULL),
(27, '41', 11, NULL, NULL),
(28, '42', 11, NULL, NULL),
(29, '43', 11, NULL, NULL),
(30, '44', 11, NULL, NULL),
(31, '35', 14, NULL, NULL),
(32, '36', 14, NULL, NULL),
(33, '37', 14, NULL, NULL),
(34, '38', 14, NULL, NULL),
(35, '39', 14, NULL, NULL),
(36, '40', 14, NULL, NULL),
(37, '39', 25, '2019-10-22 05:11:09', '2019-10-22 05:11:09'),
(38, '40', 25, '2019-10-22 05:11:09', '2019-10-22 05:11:09'),
(39, '41', 25, '2019-10-22 05:11:09', '2019-10-22 05:11:09'),
(40, '42', 25, '2019-10-22 05:11:09', '2019-10-22 05:11:09'),
(41, '43', 25, '2019-10-22 05:11:09', '2019-10-22 05:11:09'),
(42, '44', 25, '2019-10-22 05:11:09', '2019-10-22 05:11:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_photo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_type` smallint(6) NOT NULL DEFAULT '0',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `role` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `avatar` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `user_photo`, `user_type`, `user_status`, `role`, `avatar`) VALUES
(1, 'argon', 'admin@argon.com', '2019-09-16 18:52:44', '$2y$10$hU5XtBrwa4E5ojOIJeo5L.Ec.5NEtJPJcWHEWKf/RvsMEVdQx1Zgq', 'vDLO7kyXF2mK6AC6vYCrqFGOo5yOpvzgzNucqShTPELdRyjYmVXKPstsIOGW', '2019-09-16 18:52:44', '2019-09-17 04:18:58', '', 0, 0, 'admin', '1568719138.jpg'),
(2, 'lyheang', 'lyheang@gmail.com', NULL, '$2y$10$qsh3FyIAYuSXFws.if35I.S2vUqpJXBl8Tc3z1yA4KZLCsjcq8fOO', 'Y9ahHNSs3UnAEQPMC2LggujFnoeHNRFTkNkRKbXniUfOvYVYvbkfnllcwDZm', '2019-10-07 09:40:53', '2019-10-22 05:02:20', '', 0, 0, 'admin', '1571745739.png'),
(3, 'guest', 'guest@gmail.com', NULL, '$2y$10$94is9TL.I.TJkzESrfxZduLcEnEL.jNwRnDtKo8nu8784eaUWpDRm', 'ar14TfcXtja8IuADpxiUuKCY6h88wPrxR1Rts95P8JothRX0YVAVO811mFpD', '2019-10-07 09:43:36', '2019-10-07 09:43:36', '', 0, 0, 'user', 'default.png'),
(4, 'dara', 'dara@gmail.com', NULL, '$2y$10$Mkv7ofosOVvyRHXRDlpKY.ArjyKlPMU4H582UHp3oXS3MbN4YEqz6', NULL, '2019-10-22 03:50:47', '2019-10-22 03:50:47', '', 0, 0, 'user', 'default.png'),
(5, 'remy', 'remy@gmail.com', NULL, '$2y$10$KnDDAiQInBuFZR3L7JZZRe1cPICZT.tzQPiYe/MgJ7oAYti.xKB4O', NULL, '2019-10-22 03:54:43', '2019-10-22 03:54:43', '', 0, 0, 'user', 'default.png'),
(6, 'yahoo', 'yahoo@yahoo.com', NULL, '$2y$10$MdeWkgDaHlp7gQH8KLjxUOhXyVSx6e7XV1408Lc1t/PwIS6SWYy2e', NULL, '2019-10-22 05:04:07', '2019-10-22 05:04:07', '', 0, 0, 'admin', 'default.png'),
(7, 'google', 'google@gmail.com', NULL, '$2y$10$41BpC8Wqd6IHZn99Hb7Zqe.vnZYyyDgWmmq38TmGn.aTObaJyN.E6', NULL, '2019-10-22 05:27:04', '2019-10-22 05:27:04', '', 0, 0, 'user', 'default.png');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `size`
--
ALTER TABLE `size`
  ADD CONSTRAINT `size_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
