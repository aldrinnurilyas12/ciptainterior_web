-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 02, 2024 at 01:39 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ciptainterior`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `user` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(225) NOT NULL,
  `kategori_status` varchar(225) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`user`, `password`, `kategori_status`, `create_at`) VALUES
('kurir_ciptainterior', '202cb962ac59075b964b07152d234b70', 'kurir', '2024-05-22 02:35:30'),
('ciptainterior_admin', '202cb962ac59075b964b07152d234b70', 'admin', '2024-05-22 01:54:52');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int NOT NULL,
  `title` varchar(225) NOT NULL,
  `foto` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `title`, `foto`, `created_at`) VALUES
(3, 'ketiga', '2ef4aa9df0150a1bf47c5715bfaf7e14.png', '2024-01-26 15:16:14'),
(4, 'banner 2', '7bf63f6a2a1232f793d01e7c804cc6b4.png', '2024-05-04 03:26:43'),
(5, 'banner baru', '5ca93c33183c79563e8e76b7f5075685.png', '2024-05-04 03:31:23');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int NOT NULL,
  `nama_artikel` varchar(225) NOT NULL,
  `isi_artikel` text NOT NULL,
  `foto` varchar(250) NOT NULL,
  `article_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `nama_artikel`, `isi_artikel`, `foto`, `article_date`) VALUES
(1, 'Tips untuk membeli sofa ', 'Anda sebaiknya tidak membeli sofa yang terlihat bagus tetapi tidak nyaman. Sangat penting untuk mengetahui terbuat dari apa sofa dan apa yang ada di balik kain pelapisnya. Busa poliuretan adalah bahan yang paling umum digunakan di sofa, dan kerapatan busa berkisar antara 28 hingga 52. Sofa nyaman yang tidak terlalu tenggelam atau terlalu keras biasanya memiliki ketebalan antara 32 hingga 45.\r\n', '799fbed00d13543ee5060f497eec4824.jpeg', '2024-04-10 12:08:40'),
(2, 'Bagaimana cara merawat Gordyn? Simak yuk..', 'Metode ini cocok untuk gorden yang tidak berlapis dan tipis yang terbuat dari bahan seperti katun, nilon, dan poliester. Gorden renda juga bisa dicuci dengan mesin jika dilindungi dalam kantong jaring. Gorden berlapis sintetis biasanya aman untuk dicuci mesin, tetapi selalu periksa label perawatan terlebih dahulu.\r\n\r\n\r\n', 'e85ef2f3182eafce25d16eaf1e2286aa.jpg', '2024-04-10 12:54:37'),
(3, 'Tips untuk merawat Vinyl kayu', 'Walaupun tahan air, lantai dengan vinyl sticker juga bisa timbul jamur. Ini terjadi karena sambungan vinyl bisa menembuskan air ke bagian bawah vinyl yang empuk. Selain itu, semakin sering dipel, lapisan atas vinyl yakni wear layer juga bisa terkikis.', '038514117b9aa9eb1776e1d91974849a.jpeg', '2024-04-10 13:06:17'),
(4, 'Tips & Trik untuk design interior ', 'Pertimbangkan pencahayaan alami yang cukup dan penempatan furnitur ergonomis untuk meningkatkan kenyamanan orang-orang yang sedang bekerja.\r\n\r\nKemudian, pilih palet warna yang menenangkan dengan sentuhan warna-warna yang memberikan semangat.\r\n\r\nSertakan ruang pertemuan yang fungsional dan tempat istirahat untuk menjaga keseimbangan antara produktivitas dan relaksasi.', '3a6935b50bfb69fa4990c82cff526450.png', '2024-04-10 13:10:44'),
(5, 'Bingung memilih sofa yang bagus? lihat disini untuk tipsnya!', 'Pertimbangkan pencahayaan alami yang cukup dan penempatan furnitur ergonomis untuk meningkatkan kenyamanan orang-orang yang sedang bekerja.\r\n\r\nKemudian, pilih palet warna yang menenangkan dengan sentuhan warna-warna yang memberikan semangat.\r\n\r\nSertakan ruang pertemuan yang fungsional dan tempat istirahat untuk menjaga keseimbangan antara produktivitas dan relaksasi.\r\nSofa nyaman yang tidak terlalu tenggelam atau terlalu keras biasanya memiliki ketebalan antara 32 hingga 45.', '613d4c09645d2e2132283d20e08d3fa7.png', '2024-04-10 13:12:53'),
(6, 'Cara merawat sofa agar bagus setiap saat', ' Anda sebaiknya tidak membeli sofa yang terlihat bagus tetapi tidak nyaman. Sangat penting untuk mengetahui terbuat dari apa sofa dan apa yang ada di balik kain pelapisnya. Busa poliuretan adalah bahan yang paling umum digunakan di sofa, dan kerapatan busa berkisar antara 28 hingga 52. Sofa ', '07f74f420416bb8dbf899394ebf2d5f4.jpeg', '2024-04-10 13:14:36');

-- --------------------------------------------------------

--
-- Table structure for table `category_status`
--

CREATE TABLE `category_status` (
  `id` int NOT NULL,
  `status_category_name` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category_status`
--

INSERT INTO `category_status` (`id`, `status_category_name`) VALUES
(1, 'Sudah dikonfirmasi'),
(2, 'Selesai'),
(3, 'Sudah diterima');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `register_id` int NOT NULL,
  `id_customer` varchar(225) NOT NULL,
  `nama_lengkap` varchar(30) DEFAULT NULL,
  `alamat` text,
  `email` varchar(30) DEFAULT NULL,
  `telepon` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `image` varchar(225) DEFAULT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`register_id`, `id_customer`, `nama_lengkap`, `alamat`, `email`, `telepon`, `username`, `image`, `register_date`, `update_at`) VALUES
(1, '0b44e26c-0ba5-4372-a051-affb3dd0500b', 'Aldrin Nur', 'Jl Kembangan Raya, No.109, Kel Kembangan, Kec.Meruya. Jakarta Barat', 'aldrinnurilyas10@gmail.com', '089673010102', 'aldrinnryas', '3ee4acb78d5fc1d8fae036f5600339ce.jpg', '2024-05-11 11:27:21', '2024-05-29 08:15:54'),
(2, '144675f0-fa23-4697-8e62-5d808c793884', 'Samara Andini Widjaja', 'Jl. Menteng Atas No. 109 Rt 07/09, Keb.Baru, Jakarta Selatan', 'samarakandini@yahoo.com', '089674829394', 'samaraa', '08ec617fd7d4700506b6a7762a9dd6aa.jpg', '2024-05-08 13:48:02', '2024-05-15 01:16:25'),
(3, 'a53d5d05-57c1-4a7e-a6d9-53b5dfc5b887', 'Kania Larasati Widjaja', 'Jl. Meruya Selatan, No.90, Jakarta Barat', 'kaniaa@gmail.com', '089578399405', 'kanialaras', 'a694c49699c2b5859619fa60a490ed34.png', '2024-05-09 09:25:36', '2024-05-15 01:16:25'),
(4, '56c7b86e-06cd-452d-b02b-dc58a80fe7b7', 'Kamila Kusuma Putri', 'Jl. Angke Raya No.101, Jakarta Utara, Indonesia', 'kamila@gmail.com', '089756828949', 'kamilaa', '1ca2e4bb5447445f2a30903abf2967a9.png', '2024-05-09 09:25:36', '2024-05-15 01:16:25'),
(5, 'a47462ec-e735-42ee-a699-05a28a2daa98', 'John James', 'Jl kenanga', 'johnjames@gmail.com', '089675493094', 'johnjames', 'fd083167ba0c6454dd825989e2b01ba6.jpg', '2024-05-18 09:25:41', '2024-05-18 09:25:41'),
(6, 'ebb3be4f-8c08-436e-8769-13eea6a1ef7e', 'Aldrin', 'Omnis nostrum ex vol', 'podir@mailinator.com', 'Culpa porro aut', 'xaligu', '00f05d082c4552e01c5af2b3c984cbe4.jpg', '2024-05-18 09:26:25', '2024-05-18 09:26:25'),
(7, '68f6fc65-3ee4-4ae7-a17a-9b81f6c2b5a6', 'Aut dolor Nam illum', 'Consequuntur reprehe', 'leceviro@mailinator.com', '01341414141411', 'telicetiru', '7004d9361ca0eeb7a3390e924d5dd29e.jpg', '2024-05-19 02:22:02', '2024-05-19 02:22:02'),
(9, '1057fa65-93d2-40be-9a51-3600e48674d9', 'Alexsandro Danillo', 'Jl Permata Hijau, Kebayoran Lama, Jakarta Selatan.', 'alexsandro@yahoo.com', '08967980803', 'alexsandrodanilloo', '67e84c6f7823a9db30892ee4f5903c35.jpg', '2024-05-19 02:28:01', '2024-05-19 02:30:13'),
(10, 'f529151a-9dd6-4c9b-b10d-77309060ad7b', 'James Kome', 'jl asem', 'aldrinnurilyas12@gmail.com', '08999898080', 'jameskol_', '2972fa4cac9c4feea92cf35ff4836329.jpg', '2024-05-22 02:09:51', '2024-05-22 02:09:51'),
(11, '602e695a-3d5c-4313-8721-a9b6fdb48669', 'Vitae eum adipisicin', 'Omnis doloremque lor', 'sibujunuho@mailinator.com', 'Quasi eligendi ', 'aldrin12', 'fe23e2ed03dba5e1cabde99d900eeedb.jpg', '2024-05-29 08:09:30', '2024-05-29 08:09:30'),
(12, 'cd167373-889a-4d5f-889b-a781b2d1d95d', 'Quia dicta voluptas ', 'Cumque nemo molestia', 'jyvomyv@mailinator.com', 'Error do quod i', 'aldrinaja', '6ed5420fbc4563befb483988f8798e0e.jpg', '2024-05-30 14:23:12', '2024-05-30 14:23:12');

-- --------------------------------------------------------

--
-- Table structure for table `customers_password`
--

CREATE TABLE `customers_password` (
  `register_id` int NOT NULL,
  `password` varchar(250) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customers_password`
--

INSERT INTO `customers_password` (`register_id`, `password`, `create_at`) VALUES
(1, '$2y$10$lTgdcor8Bb8p9QoiJCT2UerabwfKdkC6CC1NwF37L.pN.Kq6SbLsS', '2024-05-29 08:16:05'),
(2, '$2y$10$oGnN.jJ0GR6iDRtZMYurp.SV5I0eYUNLo2.a489813r9o0MsiOevi', '2024-05-14 06:46:07'),
(3, '$2y$10$OFXWENlYmj.2d.6MCVenLu4q80mnTSxq6GhLlmlj6XHrrpxBiPWmS', '2024-05-09 09:35:54'),
(4, '$2y$10$hqigVSjiynvZ3AlzoH48Cu9HOHA9GjX.BgHO7/OjN/iK31eZv5B3C', '2024-05-09 09:41:48'),
(5, '$2y$10$.9/2EvLGoEHAlpUTBses9uSeAyQte6ro2wvKfHuWQcSYflZly.QpS', '2024-05-18 09:25:42'),
(6, '$2y$10$cEO5ttyoaYhCubFZw5LYHeHyFiKQpTDex3FazXaM7nKbOwuY4oY.i', '2024-05-18 09:26:25'),
(7, '$2y$10$wTKKX5Cdz6bBPIU9Dqf6Q.XfFR3s6xbS4wMFNQ8hf5VYtCejDg89u', '2024-05-19 02:22:02'),
(9, '$2y$10$8jWLGxuzejJf5WkNj2mMLe.Tl3bXmrlgvwqV0k.jlNwVKzf21W7du', '2024-05-19 02:28:01'),
(10, '$2y$10$FQmi7q6hQsbEm3ROZEhrBu9/vxZ1PPckdhoC9TTZoybL7ULLSswlq', '2024-05-22 02:09:51'),
(11, '$2y$10$U4EY7aCC4NNzfCrxjFWldeCWaFgstr7ZQnQZmo.GkKiOlgSlT33Hm', '2024-05-29 08:09:30'),
(12, '$2y$10$dCA89Pe1OIOSK0xI8lxMgOuVoYfF3qkJ036lwmcgTWt0O39PsFzWC', '2024-05-30 14:23:12');

-- --------------------------------------------------------

--
-- Table structure for table `kritik_saran`
--

CREATE TABLE `kritik_saran` (
  `id_kritiksaran` int NOT NULL,
  `id_customer` varchar(11) NOT NULL,
  `nm_customer` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `tgl_kritiksaran` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kritik_saran`
--

INSERT INTO `kritik_saran` (`id_kritiksaran`, `id_customer`, `nm_customer`, `deskripsi`, `tgl_kritiksaran`) VALUES
(1, 'CUST002', 'Aldrin Nur Ilyas', 'Lahan parkir sangat terbatas', '2024-01-10 13:19:48');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_pemesanan` varchar(225) NOT NULL,
  `id_customer` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_produk` varchar(225) NOT NULL,
  `status_id` varchar(225) NOT NULL,
  `material` varchar(225) NOT NULL,
  `quantity` int NOT NULL,
  `grand_total` bigint DEFAULT NULL,
  `tgl_pesan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_pemesanan`, `id_customer`, `id_produk`, `status_id`, `material`, `quantity`, `grand_total`, `tgl_pesan`) VALUES
('INV-200524-000001', '0b44e26c-0ba5-4372-a051-affb3dd0500b', '059e55db-52cc-47ff-bad9-dcd798d632d2', 'STS200524-000001', '', 2, 1520000, '2024-05-20 00:20:43'),
('INV-200524-000002', '0b44e26c-0ba5-4372-a051-affb3dd0500b', '583a5e68-c5b5-44cb-9e84-979d80767244', 'STS200524-000002', '', 1, 270000, '2024-05-20 00:20:53'),
('INV-200524-000003', '0b44e26c-0ba5-4372-a051-affb3dd0500b', 'f53af17f-4eb8-449c-8875-e262e7491404', 'STS200524-000003', '', 20, 9500000, '2024-05-20 00:21:18'),
('INV-200524-000003', '0b44e26c-0ba5-4372-a051-affb3dd0500b', '20add5dd-6ac6-4462-957f-3ab36b8685f7', 'STS200524-000003', '', 10, 6000000, '2024-05-20 00:21:18'),
('INV-210524-000004', '0b44e26c-0ba5-4372-a051-affb3dd0500b', '29741c1b-92d3-4d1a-844a-c1f92911ea33', 'STS210524-000004', '', 1, 1100000, '2024-05-21 07:40:18'),
('INV-210524-000004', '0b44e26c-0ba5-4372-a051-affb3dd0500b', '583a5e68-c5b5-44cb-9e84-979d80767244', 'STS210524-000004', '', 5, 1350000, '2024-05-21 07:40:18'),
('INV-210524-000005', '0b44e26c-0ba5-4372-a051-affb3dd0500b', '29741c1b-92d3-4d1a-844a-c1f92911ea33', 'STS210524-000005', '', 4, 4400000, '2024-05-21 19:23:04'),
('INV-210524-000005', '0b44e26c-0ba5-4372-a051-affb3dd0500b', '059e55db-52cc-47ff-bad9-dcd798d632d2', 'STS210524-000005', '', 2, 1520000, '2024-05-21 19:23:04'),
('INV-230524-000006', '0b44e26c-0ba5-4372-a051-affb3dd0500b', '20add5dd-6ac6-4462-957f-3ab36b8685f7', 'STS230524-000006', '', 3, 1800000, '2024-05-23 15:30:32'),
('INV-230524-000007', '0b44e26c-0ba5-4372-a051-affb3dd0500b', '059e55db-52cc-47ff-bad9-dcd798d632d2', 'STS230524-000007', '', 4, 3040000, '2024-05-23 16:38:59'),
('INV-240524-000008', '0b44e26c-0ba5-4372-a051-affb3dd0500b', '059e55db-52cc-47ff-bad9-dcd798d632d2', 'STS240524-000008', '', 3, 2280000, '2024-05-24 03:50:58'),
('INV-240524-000008', '0b44e26c-0ba5-4372-a051-affb3dd0500b', '583a5e68-c5b5-44cb-9e84-979d80767244', 'STS240524-000008', '', 3, 810000, '2024-05-24 03:50:58'),
('INV-290524-000009', '602e695a-3d5c-4313-8721-a9b6fdb48669', '29741c1b-92d3-4d1a-844a-c1f92911ea33', 'STS290524-000009', '', 3, 3300000, '2024-05-29 08:11:30'),
('INV-290524-000009', '602e695a-3d5c-4313-8721-a9b6fdb48669', '583a5e68-c5b5-44cb-9e84-979d80767244', 'STS290524-000009', '', 2, 540000, '2024-05-29 08:11:30');

--
-- Triggers `orders`
--
DELIMITER $$
CREATE TRIGGER `delete_order_status` AFTER DELETE ON `orders` FOR EACH ROW DELETE FROM orders_status as ord_sts
WHERE ord_sts.status_id = OLD.status_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `orders_status`
--

CREATE TABLE `orders_status` (
  `status_id` varchar(225) NOT NULL,
  `status_code` int NOT NULL,
  `confirm_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders_status`
--

INSERT INTO `orders_status` (`status_id`, `status_code`, `confirm_date`) VALUES
('STS200524-000001', 0, '2024-05-28 10:49:51'),
('STS200524-000002', 1, '2024-05-28 10:51:25'),
('STS200524-000003', 3, '2024-05-27 14:48:06'),
('STS210524-000004', 3, '2024-05-27 14:31:31'),
('STS210524-000005', 0, '2024-05-29 08:15:15'),
('STS230524-000006', 0, '2024-05-28 10:49:42'),
('STS230524-000007', 0, '2024-05-28 10:51:06'),
('STS240524-000008', 1, '2024-05-28 10:52:14'),
('STS290524-000009', 0, '2024-05-29 08:14:10');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_payment` varchar(225) NOT NULL,
  `id_pemesanan` varchar(50) DEFAULT NULL,
  `id_customer` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `bank` varchar(20) NOT NULL,
  `grand_total` bigint NOT NULL,
  `bukti_bayar` varchar(350) NOT NULL,
  `payment_status` text NOT NULL,
  `status` int DEFAULT NULL,
  `tgl_bayar` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_payment`, `id_pemesanan`, `id_customer`, `bank`, `grand_total`, `bukti_bayar`, `payment_status`, `status`, `tgl_bayar`) VALUES
('039dce8b-a8a7-4322-8cfc-8b9c930384be', 'INV-240524-000008', '0b44e26c-0ba5-4372-a051-affb3dd0500b', 'Bank BRI', 3090000, '7650f072716f68713babac55a36f7cbe.jpg', 'Sudah Bayar', 1, '2024-05-24 03:51:47'),
('220c0cbb-7799-4662-b67f-646457e01f0d', 'INV-230524-000007', '0b44e26c-0ba5-4372-a051-affb3dd0500b', 'Bank BRI', 3040000, 'f4ee8f436d496fef70d2bc11b57963ef.jpg', 'Sudah Bayar', 1, '2024-05-28 10:50:44'),
('22ee4e5d-bb1d-40b1-a788-7dc2d0300716', 'INV-290524-000009', '602e695a-3d5c-4313-8721-a9b6fdb48669', 'Bank Mandiri', 3840000, 'b4426c513fd4dc11ebc69dc099cfcafd.jpg', 'Sudah Bayar', 1, '2024-05-29 08:13:44'),
('43d98d04-2b62-4fcc-be73-4af142c7b6bd', 'INV-200524-000003', '0b44e26c-0ba5-4372-a051-affb3dd0500b', 'Bank BCA', 15500000, '28e8440840c4615e151d7614a6cf8d7b.jpg', 'Sudah Bayar', 1, '2024-05-21 07:21:18'),
('9373780c-9e9e-4b08-966a-b97750b2875b', 'INV-230524-000006', '0b44e26c-0ba5-4372-a051-affb3dd0500b', 'Gopay', 1800000, '3013356ce3813b8fc48de8a0819825f8.jpg', 'Sudah Bayar', 1, '2024-05-23 16:12:16'),
('c48272a3-380f-4bdf-b47f-b8f63fa864c1', 'INV-210524-000005', '0b44e26c-0ba5-4372-a051-affb3dd0500b', 'Bank BRI', 5920000, '42a55aaec0620a04a08d30fc18dc75be.jpg', 'Sudah Bayar', 1, '2024-05-21 19:24:32'),
('c5a354bf-fb74-44ed-8659-6f25659acb62', 'INV-200524-000001', '0b44e26c-0ba5-4372-a051-affb3dd0500b', 'Bank BNI', 1520000, 'f364551af9cc7b120828a96c5cf8290b.jpg', 'Sudah Bayar', 1, '2024-05-21 07:43:31'),
('d253207e-6f0b-45c7-bb59-ea15af52e34c', 'INV-200524-000002', '0b44e26c-0ba5-4372-a051-affb3dd0500b', 'Bank Mandiri', 270000, '82df4cb7b842449293f6e9f3a337f76f.jpg', 'Sudah Bayar', 1, '2024-05-21 07:43:22'),
('e752eaad-9252-4724-8fc5-6f5881eab2c6', 'INV-210524-000004', '0b44e26c-0ba5-4372-a051-affb3dd0500b', 'Bank Mandiri', 2450000, 'de12fd461552fc61eb34b4b865e12b39.jpg', 'Sudah Bayar', 1, '2024-05-21 07:41:58');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_detail`
--

CREATE TABLE `pemesanan_detail` (
  `id_pemesanan` varchar(225) NOT NULL,
  `id_customer` varchar(225) NOT NULL,
  `id_produk` varchar(225) NOT NULL,
  `grand_total` int NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_produk` varchar(225) NOT NULL,
  `nama_produk` varchar(200) NOT NULL,
  `harga` int NOT NULL,
  `diskon` varchar(20) NOT NULL,
  `harga_diskon` int NOT NULL,
  `total_harga` int NOT NULL,
  `foto` varchar(255) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `waktu_pengerjaan` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status_produk` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `category_id` int NOT NULL,
  `min_order` varchar(225) DEFAULT NULL,
  `dimensional` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `size_height` int DEFAULT NULL,
  `tanggal_masuk` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_produk`, `nama_produk`, `harga`, `diskon`, `harga_diskon`, `total_harga`, `foto`, `deskripsi`, `waktu_pengerjaan`, `status_produk`, `category_id`, `min_order`, `dimensional`, `size_height`, `tanggal_masuk`) VALUES
('059e55db-52cc-47ff-bad9-dcd798d632d2', 'Rak Dinding Kayu', 760000, '0', 0, 760000, '1d442f18361428012fc3feb78ebe3ee7.jpg', 'baguss untuk inteerior', '4 Hari ', 'Pre Order', 5, '1 ', '70cmX70cm', 500, '2024-05-18 04:22:12'),
('20add5dd-6ac6-4462-957f-3ab36b8685f7', 'Roller Vertical Blind', 600000, '0', 0, 600000, 'a096268fd6fa8d1487b8327b0473db88.jpeg', 'bagus untuk jendela rumah anda', '', 'Ready/Ada', 4, '1', '120cmX200cm', 1000, '2024-05-18 02:27:29'),
('29741c1b-92d3-4d1a-844a-c1f92911ea33', 'Rak Besi Kayu ', 1250000, '12', 150000, 1100000, '6af6241799c4ec57691e53267b33c5a7.jpg', 'goood', '10 Hari', 'Pre Order', 5, '1', '200cmX300cm', 5000, '2024-05-18 04:24:04'),
('3e115636-4306-4362-9ce9-091ad460255d', 'Sofa Seater Lea', 12000000, '0', 0, 12000000, '9de30dd663ead2eeff9dc1e9db24a0b0.jpeg', '\r\nSofa Seater Lea\r\nDikenal memiliki konsep yang mewah dan elegan, nuansa ruang tamu minimalis bisa anda wujudkan sebagai inspirasi rumah dengan kesan minimalis. bisa dijadikan sofa di ruang tamu atau di ruang kerja. Sofa Seater Lea yang menggunakan material bahan linen yang berkualitas, dudukan dan batal empuk dan tidak mudah berubah bentuk. cocok dipadukan dengan ragam tema dekorasi pada ruangan keluarga Anda atau ruang tamu. Dengan model jahitan kancing di bagian sandaran yang membuat sofa menjadi cantik.\r\nKeunggulan :\r\n- Sofa Seater ini memiliki bahan High Quality dan ukuran lebar dan nyaman untuk bersantai dengan keluarga.\r\n- Mudah dibersihkan hanya dengan penyedot debu\r\n- Mendapatkan bantal kecil yang mudah untuk di lepas pasang agar mudah di bersihkan.', '', 'Ready/Ada', 1, '', '300cmX90cm', 0, '2024-05-16 01:46:04'),
('583a5e68-c5b5-44cb-9e84-979d80767244', 'Wallpaper Kembang', 300000, '10', 30000, 270000, '0ead1f72b8a9bb30ced34dfdeb58f943.png', 'bagus untuk tembok', '', 'Pre Order', 5, '2', '300cmX200cm', 100, '2024-05-15 05:32:38'),
('f53af17f-4eb8-449c-8875-e262e7491404', 'China Floor Wooden', 500000, '5', 25000, 475000, '7f1438262249193c8da88dfc251d341e.jpg', 'sangat bagus untuk lantai', '10 Hari', 'Pre Order', 2, '1', '100cmX50cm', 200, '2024-05-15 05:31:26');

--
-- Triggers `products`
--
DELIMITER $$
CREATE TRIGGER `delete_product_material` AFTER DELETE ON `products` FOR EACH ROW DELETE FROM product_material
WHERE product_material.nama_produk = OLD.nama_produk
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `category_id` int NOT NULL,
  `category_name` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`category_id`, `category_name`) VALUES
(1, 'Sofa'),
(2, 'Vinyl'),
(3, 'Gordyn'),
(4, 'Blind'),
(5, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `product_material`
--

CREATE TABLE `product_material` (
  `material_id` int NOT NULL,
  `nama_produk` varchar(225) NOT NULL,
  `material_satu` varchar(225) DEFAULT NULL,
  `material_dua` varchar(225) DEFAULT NULL,
  `material_tiga` varchar(225) DEFAULT NULL,
  `material_empat` varchar(225) DEFAULT NULL,
  `material_lima` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_material`
--

INSERT INTO `product_material` (`material_id`, `nama_produk`, `material_satu`, `material_dua`, `material_tiga`, `material_empat`, `material_lima`) VALUES
(1, 'China Floor Wooden', '', '', '', '', ''),
(2, 'Wallpaper Kembang', '', '', '', '', ''),
(3, 'Sofa Seater Lea', 'Kulit', 'Katun', '', '', ''),
(4, 'Roller Vertical Blind', '', '', '', '', ''),
(5, 'Rak Dinding Kayu', '', '', '', '', ''),
(6, 'Rak Besi Kayu ', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviews_id` int NOT NULL,
  `id_produk` varchar(225) NOT NULL,
  `id_customer` varchar(225) NOT NULL,
  `rating` int DEFAULT NULL,
  `review` text,
  `review_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviews_id`, `id_produk`, `id_customer`, `rating`, `review`, `review_date`) VALUES
(1, '99498efb-3272-4eec-bafd-c6e68dd6a637', '0b44e26c-0ba5-4372-a051-affb3dd0500b', 4, 'Good products', '2024-04-30 06:54:32'),
(2, '3e115636-4306-4362-9ce9-091ad460255d', '0b44e26c-0ba5-4372-a051-affb3dd0500b', 5, 'Sofanya sangat bagus bahannya bagus sangat nyaman diduduki', '2024-05-19 23:16:29');

-- --------------------------------------------------------

--
-- Table structure for table `shopping_list`
--

CREATE TABLE `shopping_list` (
  `id_list` int NOT NULL,
  `id_customer` varchar(225) NOT NULL,
  `id_produk` varchar(225) NOT NULL,
  `list_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `shopping_list`
--

INSERT INTO `shopping_list` (`id_list`, `id_customer`, `id_produk`, `list_date`) VALUES
(17, '144675f0-fa23-4697-8e62-5d808c793884', '99498efb-3272-4eec-bafd-c6e68dd6a637', '2024-05-14 06:48:23');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial_customer`
--

CREATE TABLE `testimonial_customer` (
  `id_testimonial` int NOT NULL,
  `id_customer` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `id_payment` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama_produk` varchar(200) NOT NULL,
  `nm_customer` varchar(30) NOT NULL,
  `rating` int NOT NULL,
  `pesan_testimonial` text NOT NULL,
  `balasan` text NOT NULL,
  `tgl_testimonial` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `testimonial_customer`
--

INSERT INTO `testimonial_customer` (`id_testimonial`, `id_customer`, `id_payment`, `nama_produk`, `nm_customer`, `rating`, `pesan_testimonial`, `balasan`, `tgl_testimonial`) VALUES
(0, 'CUST002', '1', 'Vertical Blind Grey ', 'Jake Wilson', 5, 'Bagus banget pelayanannya sangat memuaskan belanja disini ', '', '2024-01-09 18:47:50'),
(2, '054ed196-b329-483d-9373-38cb82cde3df', '25acc75d-6fa5-4583-B5cf-C7e084782d72', 'sofa', 'alexkeihl', 5, 'aku sangat suka belanja disini bagus banget pelayanannya sangat rekomended deh untuk kebutuhan interior kamu', '', '2024-01-24 10:56:56'),
(0, 'e3d6d181-24e5-497e-8d72-5065e228da18', 'baa53f3c-2acf-4519-a082-fd19b1a07050', 'Paket Bundling Sofa & Meja', 'Kanaya Michiels', 4, 'Awalnya saya ragu untuk membeli produk interior disini, tapi ternyata keraguan itu terbayar dengan memuaskan dengan produk yang diberikan.', '', '2024-01-24 16:38:11'),
(0, 'e3d6d181-24e5-497e-8d72-5065e228da18', '20c95a66-c6f0-41b4-b182-0f0195b1c1c5', 'Sofa Classic ', 'Alex Keihl', 4, 'bagus bangett produknya saya sudah beli 2 kali di toko ini', '', '2024-01-24 16:39:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_status`
--
ALTER TABLE `category_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`register_id`);

--
-- Indexes for table `customers_password`
--
ALTER TABLE `customers_password`
  ADD PRIMARY KEY (`register_id`);

--
-- Indexes for table `kritik_saran`
--
ALTER TABLE `kritik_saran`
  ADD PRIMARY KEY (`id_kritiksaran`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_payment`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `product_material`
--
ALTER TABLE `product_material`
  ADD PRIMARY KEY (`material_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviews_id`);

--
-- Indexes for table `shopping_list`
--
ALTER TABLE `shopping_list`
  ADD PRIMARY KEY (`id_list`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category_status`
--
ALTER TABLE `category_status`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `register_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customers_password`
--
ALTER TABLE `customers_password`
  MODIFY `register_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kritik_saran`
--
ALTER TABLE `kritik_saran`
  MODIFY `id_kritiksaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_material`
--
ALTER TABLE `product_material`
  MODIFY `material_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviews_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shopping_list`
--
ALTER TABLE `shopping_list`
  MODIFY `id_list` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `product_category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
