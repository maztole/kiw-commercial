-- =========================================================
-- Export Database MySQL untuk Aplikasi KIW Commercial
-- Tanggal: 2026-11-16 06:22:12
-- Target Server: MySQL 5.7+ / MySQL 8.0+ / MariaDB 10.3+
-- =========================================================

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------
-- Struktur tabel `users`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data untuk tabel `users`
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Marketing KIW', 'admin@kiw.co.id', NULL, '$2y$04$IBin.Aq4s3ZlhZMMM9r6UuP3jv2.hVepiOJ2U08/n/Bs8XCvCtbeC', 'fzj8C1Ljc7ZIIIdVZaO9XhwMfriYz8lyQPxTykHwCPmtIOi8ezWQMBqfiTcb', '2026-11-13 07:50:24', '2026-11-16 05:57:31');

-- --------------------------------------------------------
-- Struktur tabel `password_reset_tokens`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Struktur tabel `sessions`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data untuk tabel `sessions`
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('QkgwExAVvvUGqy59mYWDg5kHmbLfDEfTlOutT4om', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoieGh0c2J0Ung0SkkzY2V2UUlONmpST1N3Wm9mOERXNVJ5NW1qMUhFeSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi9zZXR0aW5ncyI7czo1OiJyb3V0ZSI7czoyMDoiYWRtaW4uc2V0dGluZ3MuaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjY0OiJjMjk3YTcyZjVkMzBiMDY4YjJkN2JjNjA5Zjc2YmYyNTNmNjlmMTg4ODEyYWJkMDBkZTRjM2M1ZWVlZmZhNGQzIjt9', 1794809971);

-- --------------------------------------------------------
-- Struktur tabel `cache`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Struktur tabel `cache_locks`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Struktur tabel `jobs`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Struktur tabel `job_batches`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Struktur tabel `failed_jobs`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Struktur tabel `migrations`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data untuk tabel `migrations`
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_11_13_051444_create_site_settings_table', 1),
(5, '2026_11_13_051445_create_slides_table', 1),
(6, '2026_11_13_051446_create_inquiries_table', 1),
(7, '2026_11_13_051446_create_slide_items_table', 1),
(8, '2026_11_15_041939_add_banner_to_slides_table', 2),
(9, '2026_11_16_035620_add_styling_columns_to_slides_table', 3);

-- --------------------------------------------------------
-- Struktur tabel `site_settings`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `site_settings`;
CREATE TABLE IF NOT EXISTS `site_settings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'general',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `site_settings_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data untuk tabel `site_settings`
INSERT INTO `site_settings` (`id`, `key`, `value`, `group`, `created_at`, `updated_at`) VALUES
(1, 'brand_name', 'PT Kawasan Industri Wijayakusuma', 'general', '2026-11-13 05:16:15', '2026-11-13 05:16:15'),
(2, 'brand_short', 'KIW COMMERCIAL', 'general', '2026-11-13 05:16:15', '2026-11-13 05:16:15'),
(3, 'brand_tagline', 'Integrated & Sustainable Industrial Estate', 'general', '2026-11-13 05:16:15', '2026-11-13 05:16:15'),
(4, 'phone', '+62 24 8662156', 'general', '2026-11-13 05:16:15', '2026-11-13 05:16:15'),
(5, 'whatsapp', 628112345678, 'general', '2026-11-13 05:16:15', '2026-11-16 06:17:27'),
(6, 'whatsapp_display', '+62 811-2345-678', 'general', '2026-11-13 05:16:15', '2026-11-16 06:17:27'),
(7, 'email', 'marketing@kiw.co.id', 'general', '2026-11-13 05:16:15', '2026-11-13 05:16:15'),
(8, 'address', 'Semarang, Jawa Tengah', 'general', '2026-11-13 05:16:15', '2026-11-16 04:03:44'),
(9, 'maps_url', 'https://maps.google.com/?q=PT+Kawasan+Industri+Wijayakusuma', 'general', '2026-11-13 05:16:15', '2026-11-13 05:16:15'),
(10, 'theme_bg', '#0b1120', 'general', '2026-11-13 05:16:15', '2026-11-16 06:17:27'),
(11, 'theme_accent', '#cda352', 'general', '2026-11-13 05:16:15', '2026-11-13 05:16:15'),
(12, 'badge_footer', 'Made with KIW Commercial Engine', 'general', '2026-11-13 05:16:15', '2026-11-13 05:16:15'),
(13, 'name', 'PT Kawasan Industri Wijayakusuma', 'general', '2026-11-13 07:50:24', '2026-11-15 04:23:25'),
(14, 'short', 'KIW COMMERCIAL', 'general', '2026-11-13 07:50:24', '2026-11-13 07:50:24'),
(15, 'tagline', 'Integrated & Sustainable Industrial Estate', 'general', '2026-11-13 07:50:24', '2026-11-13 07:50:24'),
(16, 'website', 'https://www.kiw.co.id', 'general', '2026-11-13 07:50:24', '2026-11-13 07:50:24'),
(17, 'logo', 'assets/logo kiw.png', 'general', '2026-11-13 07:50:24', '2026-11-13 07:50:24'),
(18, 'footer_badge', 'KIW COMMERCIAL TEST', 'general', '2026-11-13 07:50:24', '2026-11-16 04:03:44'),
(19, 'theme_style', 'corporate_navy', 'general', '2026-11-13 07:50:24', '2026-11-16 06:17:27'),
(20, 'theme_primary', '#0ea5e9', 'general', '2026-11-13 07:50:24', '2026-11-16 06:17:27'),
(21, 'theme_card_bg', '#0f172a', 'general', '2026-11-16 04:02:54', '2026-11-16 06:17:27'),
(22, 'theme_card_text', '#f1f5f9', 'general', '2026-11-16 04:02:54', '2026-11-16 06:17:27'),
(23, 'theme_card_border', '#1e293b', 'general', '2026-11-16 04:02:54', '2026-11-16 06:17:27'),
(24, 'theme_card_radius', 'rounded-[28px]', 'general', '2026-11-16 04:03:44', '2026-11-16 04:03:44'),
(25, 'theme_button_bg', '#1e293b', 'general', '2026-11-16 04:03:44', '2026-11-16 04:03:44'),
(26, 'theme_button_text', '#f8fafc', 'general', '2026-11-16 04:03:44', '2026-11-16 04:03:44'),
(27, 'theme_button_border', '#334155', 'general', '2026-11-16 04:03:44', '2026-11-16 06:17:27');

-- --------------------------------------------------------
-- Struktur tabel `slides`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `slides`;
CREATE TABLE IF NOT EXISTS `slides` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nav_label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_grad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_bg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data untuk tabel `slides`
INSERT INTO `slides` (`id`, `title`, `subtitle`, `nav_label`, `icon`, `order`, `is_active`, `created_at`, `updated_at`, `banner_image`, `banner_text`, `banner_grad`, `card_bg`, `card_text`) VALUES
(1, 'WEBSITE & PROFIL', 'Informasi Resmi Perseroan', 'Website & Profil', 'globe', 1, 1, '2026-11-16 04:02:54', '2026-11-16 04:02:54', NULL, 'PT KAWASAN INDUSTRI WIJAYAKUSUMA • Kawasan industri terintegrasi dan ramah lingkungan di Jawa Tengah', NULL, NULL, NULL),
(2, 'KONTAK & MEDIA SOSIAL', 'Hubungi & Terhubung dengan Kami', 'Kontak & Sosmed', 'message-circle', 2, 1, '2026-11-16 04:02:54', '2026-11-16 04:02:54', NULL, 'HUBUNGI KAMI • Layanan WhatsApp Marketing, Telepon, dan Akun Media Sosial Resmi', NULL, NULL, NULL);

-- --------------------------------------------------------
-- Struktur tabel `slide_items`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `slide_items`;
CREATE TABLE IF NOT EXISTS `slide_items` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `slide_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'link',
  `badge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `slide_items_slide_id_foreign` (`slide_id`),
  CONSTRAINT `slide_items_slide_id_foreign` FOREIGN KEY (`slide_id`) REFERENCES `slides` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data untuk tabel `slide_items`
INSERT INTO `slide_items` (`id`, `slide_id`, `title`, `subtitle`, `url`, `action_type`, `badge`, `icon`, `detail_content`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Website Resmi PT KIW', NULL, 'https://www.kiw.co.id', 'link', NULL, 'globe', NULL, 1, 1, '2026-11-16 04:02:54', '2026-11-16 04:02:54'),
(2, 1, 'Profil & Tentang Perusahaan', NULL, 'https://www.kiw.co.id/tentang-kami', 'link', NULL, 'building-2', NULL, 2, 1, '2026-11-16 04:02:54', '2026-11-16 04:02:54'),
(3, 1, 'Produk & Kawasan Industri', NULL, 'https://www.kiw.co.id/fasilitas', 'link', NULL, 'factory', NULL, 3, 1, '2026-11-16 04:02:54', '2026-11-16 04:02:54'),
(4, 1, 'Berita & Pengumuman Terbaru', NULL, 'https://www.kiw.co.id/berita', 'link', NULL, 'newspaper', NULL, 4, 1, '2026-11-16 04:02:54', '2026-11-16 04:02:54'),
(5, 2, 'WhatsApp Contact Person', NULL, 'https://wa.me/628112345678?text=Halo%20KIW,%20saya%20ingin%20konsultasi%20mengenai%20Kawasan%20Industri%20Wijayakusuma.', 'whatsapp', NULL, 'message-square', NULL, 1, 1, '2026-11-16 04:02:54', '2026-11-16 04:02:54'),
(6, 2, 'Instagram Resmi @kiw_industrial', NULL, 'https://www.instagram.com/kiw_industrial/', 'link', NULL, 'instagram', NULL, 2, 1, '2026-11-16 04:02:54', '2026-11-16 04:02:54'),
(7, 2, 'LinkedIn PT Kawasan Industri Wijayakusuma', NULL, 'https://www.linkedin.com/company/pt-kawasan-industri-wijayakusuma/', 'link', NULL, 'linkedin', NULL, 3, 1, '2026-11-16 04:02:54', '2026-11-16 04:02:54'),
(8, 2, 'Telepon Kantor (024) 8662156', NULL, 'tel:+62248662156', 'call', NULL, 'phone', NULL, 4, 1, '2026-11-16 04:02:54', '2026-11-16 04:02:54'),
(9, 2, 'Petunjuk Arah Google Maps', NULL, 'https://maps.google.com/?q=PT+Kawasan+Industri+Wijayakusuma', 'map', NULL, 'map-pin', NULL, 5, 1, '2026-11-16 04:02:54', '2026-11-16 04:02:54');

-- --------------------------------------------------------
-- Struktur tabel `inquiries`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `inquiries`;
CREATE TABLE IF NOT EXISTS `inquiries` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interest` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data untuk tabel `inquiries`
INSERT INTO `inquiries` (`id`, `name`, `company`, `phone`, `email`, `interest`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Investor Nusantara', 'PT Ekspor Sejahtera', '081299988877', 'investor@ekspor.com', 'Kavling Industri Siap Bangun', 'Butuh lahan 2 hektar dekat gerbang tol Krapyak.', 'new', '2026-11-13 05:19:17', '2026-11-13 05:19:17'),
(2, 'Budi Santoso', 'PT Manufaktur Maju', '08123456789', NULL, 'Sewa Bangunan Pabrik Siap Pakai (SFB)', 'Butuh 2500m2', 'new', '2026-11-13 07:55:39', '2026-11-13 07:55:39');

SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
