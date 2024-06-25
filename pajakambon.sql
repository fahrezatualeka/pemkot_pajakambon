-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 24 Jun 2024 pada 15.11
-- Versi server: 10.11.7-MariaDB-cll-lve
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u767974373_pajakambon`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2024_05_09_030008_create_wp_tipe_table', 1),
(5, '2024_05_09_030019_create_pws_hiburan_table', 1),
(6, '2024_05_09_030024_create_pws_hotel_table', 1),
(7, '2024_05_09_030032_create_pws_restoran_table', 1),
(8, '2024_05_12_112749_create_payment_table', 1),
(9, '2024_05_15_132644_create_users_table', 1),
(10, '2024_05_29_092512_create_pgh_hiburan_pelunasan_table', 1),
(11, '2024_06_01_052834_create_pgh_hotel_table', 1),
(12, '2024_06_01_052948_create_pgh_restoran_table', 1),
(13, '2024_06_01_053244_create_pgh_restoran_pelunasan_table', 1),
(14, '2024_06_01_053251_create_pgh_hotel_pelunasan_table', 1),
(15, '2024_06_01_061014_create_prs_hiburan_table', 1),
(16, '2024_06_01_061201_create_prs_hotel_table', 1),
(17, '2024_06_01_061204_create_prs_restoran_table', 1),
(18, '2024_06_03_083355_create_wp_table', 1),
(19, '2024_06_04_032332_create_pgh_hiburan_table', 2),
(20, '2024_06_04_034555_create_pgh_hotel_table', 3),
(21, '2024_06_04_055936_create_pgh_hotel_pelunasan_table', 4),
(22, '2024_06_04_060239_create_pgh_hiburan_pelunasan_table', 5),
(23, '2024_06_04_060247_create_pgh_restoran_pelunasan_table', 5),
(24, '2024_06_04_070354_create_pgh_restoran_table', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pgh_hiburan`
--

CREATE TABLE `pgh_hiburan` (
  `id` varchar(255) NOT NULL,
  `npwpd` varchar(255) NOT NULL,
  `nama_pajak` varchar(255) NOT NULL,
  `no_telepon` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `omset` decimal(20,2) NOT NULL,
  `pajak` decimal(20,2) NOT NULL,
  `total` decimal(20,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pgh_hiburan`
--

INSERT INTO `pgh_hiburan` (`id`, `npwpd`, `nama_pajak`, `no_telepon`, `tanggal`, `omset`, `pajak`, `total`, `created_at`, `updated_at`) VALUES
('2101110559', '212311', 'rental ps', '0811470492', '2024-06-10', 750000000.00, 12.00, 90000000.00, '2024-06-24 07:50:01', '2024-06-24 07:50:01'),
('3052832825', '123456666', 'warnet', '082137153787', '2024-06-10', 1000000.00, 10.00, 100000.00, '2024-06-20 06:44:04', '2024-06-20 06:44:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pgh_hiburan_pelunasan`
--

CREATE TABLE `pgh_hiburan_pelunasan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `npwpd` varchar(255) NOT NULL,
  `nama_pajak` varchar(255) NOT NULL,
  `no_telepon` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `tanggal_pelunasan` date NOT NULL,
  `omset` decimal(20,2) NOT NULL,
  `pajak` decimal(20,2) NOT NULL,
  `total` decimal(20,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pgh_hiburan_pelunasan`
--

INSERT INTO `pgh_hiburan_pelunasan` (`id`, `npwpd`, `nama_pajak`, `no_telepon`, `tanggal`, `tanggal_pelunasan`, `omset`, `pajak`, `total`, `created_at`, `updated_at`) VALUES
(14, '112233', 'warnet', '082248302960', '2024-06-13', '2024-06-20', 10000000.00, 12.00, 1200000.00, '2024-06-20 06:53:23', '2024-06-20 06:53:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pgh_hotel`
--

CREATE TABLE `pgh_hotel` (
  `id` varchar(255) NOT NULL,
  `npwpd` varchar(255) NOT NULL,
  `nama_pajak` varchar(255) NOT NULL,
  `no_telepon` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `omset` decimal(20,2) NOT NULL,
  `pajak` decimal(20,2) NOT NULL,
  `total` decimal(20,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pgh_hotel_pelunasan`
--

CREATE TABLE `pgh_hotel_pelunasan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `npwpd` varchar(255) NOT NULL,
  `nama_pajak` varchar(255) NOT NULL,
  `no_telepon` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `tanggal_pelunasan` date NOT NULL,
  `omset` decimal(20,2) NOT NULL,
  `pajak` decimal(20,2) NOT NULL,
  `total` decimal(20,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pgh_restoran`
--

CREATE TABLE `pgh_restoran` (
  `id` varchar(255) NOT NULL,
  `npwpd` varchar(255) NOT NULL,
  `nama_pajak` varchar(255) NOT NULL,
  `no_telepon` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `omset` decimal(20,2) NOT NULL,
  `pajak` decimal(20,2) NOT NULL,
  `total` decimal(20,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pgh_restoran_pelunasan`
--

CREATE TABLE `pgh_restoran_pelunasan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `npwpd` varchar(255) NOT NULL,
  `nama_pajak` varchar(255) NOT NULL,
  `no_telepon` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `tanggal_pelunasan` date NOT NULL,
  `omset` decimal(20,2) NOT NULL,
  `pajak` decimal(20,2) NOT NULL,
  `total` decimal(20,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prs_hiburan`
--

CREATE TABLE `prs_hiburan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `npwpd` varchar(255) NOT NULL,
  `nama_wajib_pajak` varchar(255) NOT NULL,
  `no_pemeriksaan` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prs_hotel`
--

CREATE TABLE `prs_hotel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `npwpd` varchar(255) NOT NULL,
  `nama_wajib_pajak` varchar(255) NOT NULL,
  `no_pemeriksaan` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prs_restoran`
--

CREATE TABLE `prs_restoran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `npwpd` varchar(255) NOT NULL,
  `nama_wajib_pajak` varchar(255) NOT NULL,
  `no_pemeriksaan` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pws_hiburan`
--

CREATE TABLE `pws_hiburan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `npwpd` varchar(255) NOT NULL,
  `nama_pajak` varchar(255) NOT NULL,
  `no_pengawasan` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `sspd_path` varchar(255) NOT NULL,
  `sptpd_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pws_hotel`
--

CREATE TABLE `pws_hotel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `npwpd` varchar(255) NOT NULL,
  `nama_pajak` varchar(255) NOT NULL,
  `no_pengawasan` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `sspd_path` varchar(255) NOT NULL,
  `sptpd_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pws_restoran`
--

CREATE TABLE `pws_restoran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `npwpd` varchar(255) NOT NULL,
  `nama_pajak` varchar(255) NOT NULL,
  `no_pengawasan` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `sspd_path` varchar(255) NOT NULL,
  `sptpd_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_telepon` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `no_telepon`, `alamat`, `kode`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Fachreza Ardhani Husain Tualeka', 'fachrezatlk192@gmail.com', 'fahrezatualeka', '$2y$12$tKckKfR6EUkqTYn6SW21xejeQV2IxRFMcWFEqQ/Ytpajn0P.Zm94u', '082248302960', 'Jalan Durma No. 132, RT.10/RW.38, Sinduadi, Mlati, Sleman, Yogyakarta. 55284', 'Pajak Hotel dan Restoran', NULL, '2024-06-03 04:35:27', '2024-06-03 04:35:27'),
(3, 'Fachreza Ardhani Husain Tualeka', 'alakasemesta@gmail.com', 'tim_app', '$2y$12$/PoCyZyJ2ilsTyTocG56k.HXUAT.DFtcohGfFew.caEWFF977Eo9a', '0811470492', 'Kebun Cengkeh', '12345', NULL, '2024-06-11 01:06:00', '2024-06-11 01:06:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wp`
--

CREATE TABLE `wp` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `npwpd` varchar(255) NOT NULL,
  `nama_pajak` varchar(255) NOT NULL,
  `jenis` enum('hiburan','hotel','restoran') NOT NULL,
  `nama_kelola` varchar(255) NOT NULL,
  `no_telepon` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `omset` decimal(20,2) NOT NULL,
  `pajak` decimal(20,2) NOT NULL,
  `sptpd` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `wp`
--

INSERT INTO `wp` (`id`, `npwpd`, `nama_pajak`, `jenis`, `nama_kelola`, `no_telepon`, `alamat`, `omset`, `pajak`, `sptpd`, `created_at`, `updated_at`) VALUES
(30, '112233', 'warnet', 'hiburan', 'fahreza', '082248302960', 'jogja', 10000000.00, 12.00, 'uploads/kpudobbRscDRhh9tfLXqY2BrJufd4PSPMuPswxLg.png', '2024-06-07 08:28:31', '2024-06-07 08:28:31'),
(31, '212311', 'rental ps', 'hiburan', 'edi', '0811470492', 'kampung kisar', 750000000.00, 12.00, 'uploads/IdqqvErBHZP8tI0wLSoKFW0tkdcw9aYvja5i8y3A.png', '2024-06-08 12:06:12', '2024-06-08 12:06:12'),
(32, '123456666', 'warnet', 'hiburan', 'fahreza', '082137153787', 'ambon', 1000000.00, 10.00, 'uploads/fehLI6np7WE0v20wY1FfC7TBApGhHq3A2QGSOGqi.png', '2024-06-20 06:42:23', '2024-06-20 06:42:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wp_tipe`
--

CREATE TABLE `wp_tipe` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `npwpd` varchar(255) NOT NULL,
  `nama_pajak` varchar(255) NOT NULL,
  `jenis` enum('hiburan','hotel','restoran') NOT NULL,
  `tarif` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `pgh_hiburan`
--
ALTER TABLE `pgh_hiburan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pgh_hiburan_npwpd_unique` (`npwpd`);

--
-- Indeks untuk tabel `pgh_hiburan_pelunasan`
--
ALTER TABLE `pgh_hiburan_pelunasan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pgh_hiburan_pelunasan_npwpd_unique` (`npwpd`);

--
-- Indeks untuk tabel `pgh_hotel`
--
ALTER TABLE `pgh_hotel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pgh_hotel_npwpd_unique` (`npwpd`);

--
-- Indeks untuk tabel `pgh_hotel_pelunasan`
--
ALTER TABLE `pgh_hotel_pelunasan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pgh_hotel_pelunasan_npwpd_unique` (`npwpd`);

--
-- Indeks untuk tabel `pgh_restoran`
--
ALTER TABLE `pgh_restoran`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pgh_restoran_npwpd_unique` (`npwpd`);

--
-- Indeks untuk tabel `pgh_restoran_pelunasan`
--
ALTER TABLE `pgh_restoran_pelunasan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pgh_restoran_pelunasan_npwpd_unique` (`npwpd`);

--
-- Indeks untuk tabel `prs_hiburan`
--
ALTER TABLE `prs_hiburan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `prs_hiburan_npwpd_unique` (`npwpd`);

--
-- Indeks untuk tabel `prs_hotel`
--
ALTER TABLE `prs_hotel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `prs_hotel_npwpd_unique` (`npwpd`);

--
-- Indeks untuk tabel `prs_restoran`
--
ALTER TABLE `prs_restoran`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `prs_restoran_npwpd_unique` (`npwpd`);

--
-- Indeks untuk tabel `pws_hiburan`
--
ALTER TABLE `pws_hiburan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pws_hiburan_npwpd_unique` (`npwpd`);

--
-- Indeks untuk tabel `pws_hotel`
--
ALTER TABLE `pws_hotel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pws_hotel_npwpd_unique` (`npwpd`);

--
-- Indeks untuk tabel `pws_restoran`
--
ALTER TABLE `pws_restoran`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pws_restoran_npwpd_unique` (`npwpd`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_no_telepon_unique` (`no_telepon`);

--
-- Indeks untuk tabel `wp`
--
ALTER TABLE `wp`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `wp_npwpd_unique` (`npwpd`);

--
-- Indeks untuk tabel `wp_tipe`
--
ALTER TABLE `wp_tipe`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `wp_tipe_npwpd_unique` (`npwpd`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pgh_hiburan_pelunasan`
--
ALTER TABLE `pgh_hiburan_pelunasan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pgh_hotel_pelunasan`
--
ALTER TABLE `pgh_hotel_pelunasan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pgh_restoran_pelunasan`
--
ALTER TABLE `pgh_restoran_pelunasan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `prs_hiburan`
--
ALTER TABLE `prs_hiburan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `prs_hotel`
--
ALTER TABLE `prs_hotel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `prs_restoran`
--
ALTER TABLE `prs_restoran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pws_hiburan`
--
ALTER TABLE `pws_hiburan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pws_hotel`
--
ALTER TABLE `pws_hotel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pws_restoran`
--
ALTER TABLE `pws_restoran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `wp`
--
ALTER TABLE `wp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `wp_tipe`
--
ALTER TABLE `wp_tipe`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
