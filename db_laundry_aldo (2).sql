-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Nov 2025 pada 14.35
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laundry_aldo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(18) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Akmal', '0821999', 'Karet Tengsin', '2025-11-24 06:39:21', NULL),
(2, 'bebas', '69669', 'Karet CItayama', '2025-11-24 07:49:13', '2025-11-24 07:49:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `levels`
--

CREATE TABLE `levels` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `levels`
--

INSERT INTO `levels` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', '2025-11-25 08:57:55', '2025-11-25 01:58:38'),
(2, 'Operator', '2025-11-25 08:58:01', '2025-11-25 01:58:41'),
(3, 'Pimpinan', '2025-11-25 08:58:09', '2025-11-25 01:58:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level_menus`
--

CREATE TABLE `level_menus` (
  `id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `level_menus`
--

INSERT INTO `level_menus` (`id`, `level_id`, `menu_id`, `created_at`, `updated_at`) VALUES
(42, 2, 8, '2025-11-30 07:05:44', NULL),
(43, 2, 6, '2025-11-30 07:05:44', NULL),
(44, 3, 7, '2025-11-30 07:05:50', NULL),
(45, 3, 6, '2025-11-30 07:05:50', NULL),
(72, 1, 8, '2025-11-30 07:33:21', NULL),
(73, 1, 7, '2025-11-30 07:33:21', NULL),
(74, 1, 6, '2025-11-30 07:33:21', NULL),
(75, 1, 5, '2025-11-30 07:33:21', NULL),
(76, 1, 4, '2025-11-30 07:33:21', NULL),
(77, 1, 3, '2025-11-30 07:33:21', NULL),
(78, 1, 2, '2025-11-30 07:33:21', NULL),
(79, 1, 1, '2025-11-30 07:33:21', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `link` varchar(30) NOT NULL,
  `orders` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`id`, `name`, `icon`, `link`, `orders`, `created_at`, `updated_at`) VALUES
(1, 'User', 'bi bi-person-fill', 'user', 6, '2025-11-25 01:47:45', '2025-11-25 07:42:30'),
(2, 'Menu', 'bi bi-menu-app-fill', 'menu', 4, '2025-11-25 02:31:32', '2025-11-25 07:42:21'),
(3, 'Service', 'bi bi-book-fill', 'service', 3, '2025-11-25 02:33:36', '2025-11-25 07:50:03'),
(4, 'Customer', 'bi bi-people-fill', 'customer', 2, '2025-11-25 03:47:48', '2025-11-25 07:41:43'),
(5, 'Level', 'bi bi-water', 'level', 5, '2025-11-25 03:48:26', '2025-11-25 07:41:38'),
(6, 'Dashboard', 'bi bi-database-fill', 'dashboard', 1, '2025-11-25 07:37:17', '2025-11-25 07:47:36'),
(7, 'Report', 'bi bi-envelope-fill', 'report', 8, '2025-11-29 07:45:45', '2025-11-29 08:11:22'),
(8, 'Order', 'bi bi-table', 'order', 7, '2025-11-29 08:09:52', '2025-11-29 08:10:58'),
(9, 'Add Role', 'bi bi-code', 'add-role-menu', 9, '2025-11-30 07:15:32', '2025-11-30 07:15:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `services`
--

INSERT INTO `services` (`id`, `name`, `price`, `description`, `created_at`, `updated_at`) VALUES
(4, 'Cuci dan Gosok', 5000, '            Cuci gosok dengan sepenuh hati          ', '2025-11-24 07:48:16', '2025-11-29 08:19:23'),
(5, 'Hanya Cuci', 4500, 'hanya cuci            ', '2025-11-29 08:20:08', NULL),
(6, 'Hanya Gosok', 5000, '                  hanya gosok    ', '2025-11-29 08:21:00', NULL),
(7, 'Selimut', 7000, 'Laundry Besar', '2025-11-29 08:23:58', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `taxs`
--

CREATE TABLE `taxs` (
  `id` int(11) NOT NULL,
  `percent` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `taxs`
--

INSERT INTO `taxs` (`id`, `percent`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 10, 1, '2025-11-26 03:02:54', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `trans_orders`
--

CREATE TABLE `trans_orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_code` varchar(20) NOT NULL,
  `order_end_date` date NOT NULL,
  `order_status` tinyint(1) NOT NULL DEFAULT 0,
  `order_pay` int(11) NOT NULL,
  `order_change` int(11) NOT NULL,
  `order_tax` int(11) NOT NULL,
  `order_total` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `trans_orders`
--

INSERT INTO `trans_orders` (`id`, `customer_id`, `order_code`, `order_end_date`, `order_status`, `order_pay`, `order_change`, `order_tax`, `order_total`, `created_at`, `updated_at`) VALUES
(2, 1, 'ORD-291120250001', '2025-11-04', 1, 27000, 600, 2400, 26400, '2025-11-29 07:43:31', NULL),
(3, 1, 'ORD-291120250003', '2025-11-29', 1, 11000, 550, 950, 10450, '2025-11-29 09:16:54', '2025-11-30 12:45:33'),
(4, 1, 'ORD-291120250004', '2025-11-29', 1, 14000, 800, 1200, 13200, '2025-11-29 10:55:39', '2025-11-29 11:30:54'),
(5, 2, 'ORD-291120250005', '2025-11-29', 1, 6000, 500, 500, 5500, '2025-11-29 12:24:34', '2025-11-30 12:45:53'),
(6, 0, 'ORD-301120250006', '0000-00-00', 0, 12000, 1550, 950, 10450, '2025-11-30 07:42:24', NULL),
(7, 0, 'ORD-301120250007', '0000-00-00', 0, 10000, 4500, 500, 5500, '2025-11-30 12:35:12', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `trans_order_details`
--

CREATE TABLE `trans_order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `trans_order_details`
--

INSERT INTO `trans_order_details` (`id`, `order_id`, `service_id`, `qty`, `price`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 1, 24000, 24000, '2025-11-29 07:21:21', NULL),
(2, 2, 4, 1, 24000, 24000, '2025-11-29 07:43:31', NULL),
(3, 3, 5, 1, 4500, 4500, '2025-11-29 09:16:54', NULL),
(4, 3, 6, 1, 5000, 5000, '2025-11-29 09:16:54', NULL),
(5, 4, 7, 1, 7000, 7000, '2025-11-29 10:55:39', NULL),
(6, 4, 6, 1, 5000, 5000, '2025-11-29 10:55:39', NULL),
(7, 5, 6, 1, 5000, 5000, '2025-11-29 12:24:34', NULL),
(8, 6, 6, 1, 5000, 5000, '2025-11-30 07:42:24', NULL),
(9, 6, 5, 1, 4500, 4500, '2025-11-30 07:42:24', NULL),
(10, 7, 6, 1, 5000, 5000, '2025-11-30 12:35:13', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `level_id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'admin@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2025-11-24 02:57:51', '2025-11-29 06:18:52'),
(2, 2, 'Operator', 'operator@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2025-11-25 06:43:40', NULL),
(3, 3, 'Pimpinan', 'pimpinan@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '2025-11-29 07:33:52', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `level_menus`
--
ALTER TABLE `level_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `taxs`
--
ALTER TABLE `taxs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `trans_orders`
--
ALTER TABLE `trans_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `trans_order_details`
--
ALTER TABLE `trans_order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `level_menus`
--
ALTER TABLE `level_menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT untuk tabel `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `taxs`
--
ALTER TABLE `taxs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `trans_orders`
--
ALTER TABLE `trans_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `trans_order_details`
--
ALTER TABLE `trans_order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
