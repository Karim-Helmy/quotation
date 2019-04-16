-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2019 at 01:02 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quotation`
--

-- --------------------------------------------------------

--
-- Table structure for table `consultants`
--

CREATE TABLE `consultants` (
  `id` int(10) UNSIGNED NOT NULL,
  `consultant_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname_booking` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname_booking` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_booking` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `consultants__doctors`
--

CREATE TABLE `consultants__doctors` (
  `id` int(10) UNSIGNED NOT NULL,
  `consultant_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `consultants__doctors__replay`
--

CREATE TABLE `consultants__doctors__replay` (
  `id` int(10) UNSIGNED NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `consultant_id` int(11) NOT NULL,
  `replay` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `consultants__images`
--

CREATE TABLE `consultants__images` (
  `id` int(10) UNSIGNED NOT NULL,
  `consultant_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_prefix` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `disease_categories`
--

CREATE TABLE `disease_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prefix` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq_categories`
--

CREATE TABLE `faq_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `labels__keys`
--

CREATE TABLE `labels__keys` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `labels__keys`
--

INSERT INTO `labels__keys` (`id`, `key`, `created_at`, `updated_at`) VALUES
(10, 'Home', '2019-03-12 14:02:10', '2019-03-12 14:02:10'),
(11, 'Faq', '2019-03-12 14:02:18', '2019-03-12 14:02:18'),
(12, 'Login', '2019-03-12 14:02:23', '2019-03-12 14:02:23'),
(13, 'Register', '2019-03-12 14:02:30', '2019-03-12 14:02:30'),
(14, 'About', '2019-03-12 14:02:37', '2019-03-12 14:02:37'),
(15, 'FindADoctor', '2019-03-13 08:21:25', '2019-03-13 08:21:25'),
(16, 'Cure2Us', '2019-03-13 08:37:45', '2019-03-13 08:37:45'),
(17, 'Slogan', '2019-03-13 08:38:52', '2019-03-13 08:38:52'),
(18, 'English', '2019-03-13 08:41:36', '2019-03-13 08:41:36'),
(19, 'Arabic', '2019-03-13 08:41:41', '2019-03-13 08:41:41'),
(20, 'Logout', '2019-03-13 08:42:43', '2019-03-13 08:42:43'),
(23, 'Profile', '2019-03-13 08:44:01', '2019-03-13 08:44:01'),
(24, 'SelectNewProfileImage', '2019-03-13 08:50:35', '2019-03-13 08:50:35'),
(25, 'Upload', '2019-03-13 08:50:43', '2019-03-13 08:50:43'),
(26, 'AboutMe', '2019-03-13 08:50:49', '2019-03-13 08:50:49'),
(27, 'Views', '2019-03-13 08:51:03', '2019-03-13 08:51:03'),
(28, 'Address', '2019-03-13 08:51:17', '2019-03-13 08:51:17'),
(29, 'Phone', '2019-03-13 08:51:24', '2019-03-13 08:51:24'),
(30, 'SecurityAndPrivacy', '2019-03-13 08:51:31', '2019-03-13 08:51:31'),
(31, 'ChangePassword', '2019-03-13 08:51:42', '2019-03-13 08:51:42'),
(32, 'PasswordHelpDisk1', '2019-03-13 08:52:03', '2019-03-13 08:52:03'),
(33, 'PasswordHelpDisk2', '2019-03-13 08:52:09', '2019-03-13 08:52:09'),
(34, 'Update', '2019-03-13 08:52:23', '2019-03-13 08:52:23'),
(35, 'Password', '2019-03-13 09:03:56', '2019-03-13 09:03:56'),
(36, 'ConfirmPassword', '2019-03-13 09:04:04', '2019-03-13 09:04:04'),
(37, 'Email', '2019-03-13 09:45:41', '2019-03-13 09:45:41'),
(38, 'Consultant', '2019-03-13 10:07:16', '2019-03-13 10:07:16'),
(39, 'AskForConsultant', '2019-03-13 10:11:41', '2019-03-13 10:11:41'),
(40, 'ContactInfo', '2019-03-13 11:50:35', '2019-03-13 11:50:35'),
(41, 'ContactHelpDesk1', '2019-03-13 11:50:45', '2019-03-13 11:50:45'),
(42, 'FirstName', '2019-03-13 12:22:28', '2019-03-13 12:22:28'),
(43, 'LastName', '2019-03-13 12:22:33', '2019-03-13 12:22:33'),
(44, 'Details', '2019-03-13 12:22:41', '2019-03-13 12:22:41'),
(45, 'ConfirmEmail', '2019-03-14 09:46:01', '2019-03-14 09:46:01'),
(46, 'Message', '2019-03-14 09:53:46', '2019-03-14 09:53:46');

-- --------------------------------------------------------

--
-- Table structure for table `labels__values`
--

CREATE TABLE `labels__values` (
  `id` int(10) UNSIGNED NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `language_id` int(11) NOT NULL,
  `key_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `labels__values`
--

INSERT INTO `labels__values` (`id`, `value`, `language_id`, `key_id`, `created_at`, `updated_at`) VALUES
(6, 'Home', 1, 10, '2019-03-13 07:44:53', '2019-03-13 08:19:12'),
(7, 'FAQ', 1, 11, '2019-03-13 07:44:53', '2019-03-13 07:44:53'),
(8, 'Login', 1, 12, '2019-03-13 07:44:53', '2019-03-13 07:44:53'),
(9, 'Register', 1, 13, '2019-03-13 07:44:53', '2019-03-13 07:44:53'),
(10, 'About', 1, 14, '2019-03-13 07:44:53', '2019-03-13 07:44:53'),
(12, 'الرئيسية', 2, 10, '2019-03-13 07:49:00', '2019-03-13 07:49:00'),
(13, 'سؤال وجواب', 2, 11, '2019-03-13 07:49:00', '2019-03-13 07:49:00'),
(14, 'تسجيل دخول', 2, 12, '2019-03-13 07:49:00', '2019-03-13 07:49:00'),
(15, 'عضوية جديدة', 2, 13, '2019-03-13 07:49:00', '2019-03-13 07:49:00'),
(16, 'من نحن', 2, 14, '2019-03-13 07:49:00', '2019-03-13 07:49:00'),
(17, 'أبحث عن طبيب', 2, 15, '2019-03-13 08:21:45', '2019-03-13 08:28:33'),
(18, 'cure 2 us', 2, 16, '2019-03-13 08:38:18', '2019-03-13 08:38:18'),
(19, 'خدمات طبية متكاملة', 2, 17, '2019-03-13 08:39:14', '2019-03-13 08:39:14'),
(20, 'Find A Doctor', 1, 15, '2019-03-13 08:39:41', '2019-03-13 08:39:41'),
(21, 'Cure 2 Us', 1, 16, '2019-03-13 08:39:41', '2019-03-13 08:39:41'),
(22, 'Full Medical Services', 1, 17, '2019-03-13 08:39:41', '2019-03-13 08:39:41'),
(23, 'اللغة الأنجليزية', 2, 18, '2019-03-13 08:41:59', '2019-03-13 08:41:59'),
(24, 'اللغة العربية', 2, 19, '2019-03-13 08:41:59', '2019-03-13 08:41:59'),
(25, 'تسجيل خروج', 2, 20, '2019-03-13 08:43:15', '2019-03-13 08:43:15'),
(26, 'الملف الشخصى', 2, 23, '2019-03-13 08:44:13', '2019-03-13 08:44:13'),
(27, 'أختر صورة شخصية جديدة', 2, 24, '2019-03-13 08:58:11', '2019-03-13 08:58:11'),
(28, 'تحميل', 2, 25, '2019-03-13 08:58:11', '2019-03-13 08:58:11'),
(29, 'من انا', 2, 26, '2019-03-13 08:58:11', '2019-03-13 08:58:11'),
(30, 'مشاهدات', 2, 27, '2019-03-13 08:58:11', '2019-03-13 08:58:11'),
(31, 'العنوان', 2, 28, '2019-03-13 08:58:11', '2019-03-13 08:58:11'),
(32, 'الهاتف', 2, 29, '2019-03-13 08:58:11', '2019-03-13 08:58:11'),
(33, 'الحماية والخصوصية', 2, 30, '2019-03-13 08:58:11', '2019-03-13 08:58:11'),
(34, 'تغيير كلمة المرور الخاصة', 2, 31, '2019-03-13 08:58:11', '2019-03-13 08:58:11'),
(35, 'يجب أن تكون كلمة المرور الخاصة بك عبارة عن 8-20 حرفًا ، وتحتوي على أحرف وأرقام ، ويجب ألا تحتوي على مسافات أو أحرف خاصة أو رموز تعبيرية.', 2, 32, '2019-03-13 08:58:11', '2019-03-13 08:58:11'),
(36, 'لأغراض الأمان ، سوف تقوم بتسجيل الدخول بعد تحديث كلمة المرور', 2, 33, '2019-03-13 08:58:11', '2019-03-13 08:58:11'),
(37, 'تجديد', 2, 34, '2019-03-13 08:58:11', '2019-03-13 08:58:11'),
(38, 'كلمة المرور', 2, 35, '2019-03-13 09:04:37', '2019-03-13 09:04:37'),
(39, 'تأكيد كلمة المرور', 2, 36, '2019-03-13 09:04:37', '2019-03-13 09:04:37'),
(40, 'البريد الألكترونى', 2, 37, '2019-03-13 09:46:01', '2019-03-13 09:46:01'),
(41, 'طلب استشارة', 2, 38, '2019-03-13 10:07:35', '2019-03-13 10:07:35'),
(42, 'أطلب أستشارة', 2, 39, '2019-03-13 11:52:55', '2019-03-13 11:52:55'),
(43, 'بيانات التواصل', 2, 40, '2019-03-13 11:52:55', '2019-03-13 11:52:55'),
(44, 'نريد التاكد من بيانات التواصل الخاصة بكم , *سيتم التواصل معكم عن طريق هذه البيانات لذلك يلزم التاكد من صحتها', 2, 41, '2019-03-13 11:52:55', '2019-03-13 11:52:55'),
(45, 'الأسم الأول', 2, 42, '2019-03-13 12:27:25', '2019-03-13 12:27:25'),
(46, 'الأسم الأخير', 2, 43, '2019-03-13 12:27:25', '2019-03-13 12:27:25'),
(47, 'بيانات التواصل', 2, 44, '2019-03-13 12:27:25', '2019-03-13 12:27:25'),
(48, 'تأكيد البريد الألكترونى', 2, 45, '2019-03-14 09:46:29', '2019-03-14 09:46:29'),
(49, 'الرسالة', 2, 46, '2019-03-14 09:54:04', '2019-03-14 09:54:04'),
(50, NULL, 1, 18, '2019-03-31 11:07:06', '2019-03-31 11:07:06'),
(51, NULL, 1, 19, '2019-03-31 11:07:06', '2019-03-31 11:07:06'),
(52, NULL, 1, 20, '2019-03-31 11:07:06', '2019-03-31 11:07:06'),
(53, NULL, 1, 23, '2019-03-31 11:07:06', '2019-03-31 11:07:06'),
(54, NULL, 1, 24, '2019-03-31 11:07:06', '2019-03-31 11:07:06'),
(55, NULL, 1, 25, '2019-03-31 11:07:06', '2019-03-31 11:07:06'),
(56, NULL, 1, 26, '2019-03-31 11:07:06', '2019-03-31 11:07:06'),
(57, NULL, 1, 27, '2019-03-31 11:07:06', '2019-03-31 11:07:06'),
(58, NULL, 1, 28, '2019-03-31 11:07:07', '2019-03-31 11:07:07'),
(59, NULL, 1, 29, '2019-03-31 11:07:07', '2019-03-31 11:07:07'),
(60, NULL, 1, 30, '2019-03-31 11:07:07', '2019-03-31 11:07:07'),
(61, NULL, 1, 31, '2019-03-31 11:07:07', '2019-03-31 11:07:07'),
(62, 'Your password must be 8-20 characters, contain letters and numbers, and should not contain spaces, special characters, or emoji.', 1, 32, '2019-03-31 11:07:07', '2019-03-31 11:07:07'),
(63, NULL, 1, 33, '2019-03-31 11:07:07', '2019-03-31 11:07:07'),
(64, NULL, 1, 34, '2019-03-31 11:07:07', '2019-03-31 11:07:07'),
(65, NULL, 1, 35, '2019-03-31 11:07:07', '2019-03-31 11:07:07'),
(66, NULL, 1, 36, '2019-03-31 11:07:07', '2019-03-31 11:07:07'),
(67, NULL, 1, 37, '2019-03-31 11:07:07', '2019-03-31 11:07:07'),
(68, NULL, 1, 38, '2019-03-31 11:07:07', '2019-03-31 11:07:07'),
(69, NULL, 1, 39, '2019-03-31 11:07:07', '2019-03-31 11:07:07'),
(70, NULL, 1, 40, '2019-03-31 11:07:07', '2019-03-31 11:07:07'),
(71, NULL, 1, 41, '2019-03-31 11:07:07', '2019-03-31 11:07:07'),
(72, NULL, 1, 42, '2019-03-31 11:07:07', '2019-03-31 11:07:07'),
(73, NULL, 1, 43, '2019-03-31 11:07:07', '2019-03-31 11:07:07'),
(74, NULL, 1, 44, '2019-03-31 11:07:07', '2019-03-31 11:07:07'),
(75, NULL, 1, 45, '2019-03-31 11:07:07', '2019-03-31 11:07:07'),
(76, NULL, 1, 46, '2019-03-31 11:07:07', '2019-03-31 11:07:07');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `language` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prefix` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direction` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ltr',
  `favicon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `language`, `prefix`, `direction`, `favicon`, `status`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', 'ltr', '132977259_606231173_bda6ac6e5565b962161be4f66c8868ff-usa-flag-print-map-by-vexels.png', 1, NULL, '2019-03-11 08:37:39'),
(2, 'Arabic', 'ar', 'rtl', '241894286_1815047188_flag-waving-250.png', 1, NULL, '2019-03-11 08:37:38'),
(3, 'Spanish', 'sp', 'ltr', '749388767_914792125_Spain-flag-map-plus-ultra.png', 0, '2019-03-12 11:51:50', '2019-03-13 08:42:24');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2018_02_20_025034_create_product_attributes_table', 1),
(9, '2018_02_20_025034_create_products_faq_table', 1),
(10, '2019_02_20_025034_create_product_concentration_table', 1),
(11, '2019_02_20_025034_create_product_table', 1),
(12, '2019_02_27_141424_create_faq_categories_table', 1),
(13, '2019_02_27_200454_create_faq', 1),
(14, '2019_02_28_121718_create_countries_table', 1),
(15, '2019_02_28_145100_create_settings_table', 1),
(16, '2019_03_03_101006_create_languages_table', 1),
(17, '2019_03_05_114146_create_profil_images_row', 1),
(18, '2019_03_05_151355_create_labels__values_table', 1),
(19, '2019_03_05_151402_create_labels__keys_table', 1),
(20, '2019_03_11_110246_create_viewed_row_for_users', 1),
(21, '2019_03_11_111130_create_ratings_table', 1),
(22, '2019_03_12_103359_create_info_for_users', 1),
(23, '2019_03_17_122214_create_consultants_table', 1),
(24, '2019_03_17_122221_create_consultants__doctors_table', 1),
(25, '2019_03_17_122447_create_consultants__images_table', 1),
(26, '2019_03_17_145757_create_consultant_status_table', 1),
(27, '2019_03_24_135501_create_replay_consultants_table', 1),
(28, '2019_03_25_112416_create_vidoes_table', 1),
(29, '2019_03_25_112948_create_disease_categories_table', 1),
(30, '2019_03_25_113058_create_videos_categories_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products_faq`
--

CREATE TABLE `products_faq` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `language_id` int(11) NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `language_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medical_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_concentration`
--

CREATE TABLE `product_concentration` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `concentration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `rateable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rateable_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `sitename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `favicon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `sitename`, `logo`, `favicon`, `email`, `facebook`, `twitter`, `youtube`, `keywords`, `created_at`, `updated_at`) VALUES
(1, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prefix` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `level` enum('admin','company','pharmacy','doctor','user') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profile_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `viewed` int(11) DEFAULT '0',
  `about` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `prefix`, `phone`, `email`, `email_verified_at`, `password`, `api_token`, `birth_date`, `address`, `level`, `remember_token`, `created_at`, `updated_at`, `profile_image`, `viewed`, `about`) VALUES
(1, 'karim', 'karim', '01126878406', 'karim@admin.com', NULL, '$2y$10$P7fC.OlC.VpAYYuJvsGtQO879Kl0da87G5qIEf/PKK.ghZGULAQPG', NULL, NULL, NULL, 'admin', NULL, '2019-04-16 08:55:43', '2019-04-16 08:55:43', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `videos_categories`
--

CREATE TABLE `videos_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `vidoe_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vidoes`
--

CREATE TABLE `vidoes` (
  `id` int(10) UNSIGNED NOT NULL,
  `video` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consultants`
--
ALTER TABLE `consultants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consultants__doctors`
--
ALTER TABLE `consultants__doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consultants__doctors__replay`
--
ALTER TABLE `consultants__doctors__replay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consultants__images`
--
ALTER TABLE `consultants__images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `countries_country_prefix_unique` (`country_prefix`);

--
-- Indexes for table `disease_categories`
--
ALTER TABLE `disease_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `disease_categories_category_unique` (`category`),
  ADD UNIQUE KEY `disease_categories_prefix_unique` (`prefix`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_categories`
--
ALTER TABLE `faq_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `labels__keys`
--
ALTER TABLE `labels__keys`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `key` (`key`);

--
-- Indexes for table `labels__values`
--
ALTER TABLE `labels__values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `languages_prefix_unique` (`prefix`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_faq`
--
ALTER TABLE `products_faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_concentration`
--
ALTER TABLE `product_concentration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_rateable_type_rateable_id_index` (`rateable_type`,`rateable_id`),
  ADD KEY `ratings_rateable_id_index` (`rateable_id`),
  ADD KEY `ratings_rateable_type_index` (`rateable_type`),
  ADD KEY `ratings_user_id_index` (`user_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_prefix_unique` (`prefix`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos_categories`
--
ALTER TABLE `videos_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vidoes`
--
ALTER TABLE `vidoes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consultants`
--
ALTER TABLE `consultants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `consultants__doctors`
--
ALTER TABLE `consultants__doctors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `consultants__doctors__replay`
--
ALTER TABLE `consultants__doctors__replay`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `consultants__images`
--
ALTER TABLE `consultants__images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `disease_categories`
--
ALTER TABLE `disease_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq_categories`
--
ALTER TABLE `faq_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `labels__keys`
--
ALTER TABLE `labels__keys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `labels__values`
--
ALTER TABLE `labels__values`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products_faq`
--
ALTER TABLE `products_faq`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_concentration`
--
ALTER TABLE `product_concentration`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `videos_categories`
--
ALTER TABLE `videos_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vidoes`
--
ALTER TABLE `vidoes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
