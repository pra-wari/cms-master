-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2021 at 07:01 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clubmgtsys`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$ltED1rgGBN8C6r7QF9A3d.ASyQRarpVS9zAIk9s4kpZNZARfOwDWC', NULL, NULL, NULL),
(2, 'admin2', 'admin2@gmail.com', NULL, '$2y$10$yHz0S2Rf34eU1T7XGoWunuqseXQ6jaNrSKl.oUC8GQlM14f9cuEuG', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_settings`
--

CREATE TABLE `admin_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `system_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_light` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_dark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fav_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `smtp_details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_settings`
--

INSERT INTO `admin_settings` (`id`, `admin_id`, `system_name`, `title`, `description`, `footer`, `logo_light`, `logo_dark`, `fav_icon`, `smtp_details`) VALUES
(1, '1', 'Admin', 'I am Super Admin', 'We are provide pub management system to pub\'s owner to manage there pub details and stack.', 'Admin Footer', '1609323177.jpeg', '1609323177.png', '1609323177.png', 'smtp.gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` bigint(20) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `renewal_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `days` int(11) DEFAULT NULL,
  `expiring_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `company_name`, `first_name`, `last_name`, `address`, `country`, `state`, `city`, `postal_code`, `email`, `phone`, `mobile`, `slug`, `status`, `password`, `renewal_date`, `days`, `expiring_date`) VALUES
('CL-001', 'ABCD', 'ABC', 'PUB', 'Surat, Gujarat', 'India', 'Gujarat', 'Surat', 395002, 'shivlocho@gmail.com', '9712032312', 9099817715, 'abcd', 1, '$2y$10$V.ssRdYlU5/avgpybIbdQeQUG5e1olkMfDLN76AkwHUxFeMzFP38e', '2020-12-31', 101, '2021-04-11'),
('CL-002', 'EFG', 'Janak', 'Lochawala', 'Surat, Gujarat', 'India', 'Gujarat', 'Surat', 395002, 'janak8613@gmail.com', '9099817715', 7984389894, 'efg', 1, '$2y$10$n1NG8DQN4vT3IyXtoBCAdu2Y/GPA6M8JrGvRpcyets7Xw/TgKbShi', '2020-12-31', 181, '2021-06-30'),
('CL-003', 'Desai PUB', 'Dhruv', 'Desai', 'Surat, Gujarat', 'India', 'Gujarat', 'Surat', 395005, 'dhruvd@gmail.com', '9099817716', 9712032311, 'desai-pub', 1, '$2y$10$5fuGIc/P4i5QCuZId7NxdOiurLG23Fzhh6JrcPNa4QSboSVqbEceu', '2021-01-02', 30, '2021-02-01'),
('CL-004', '2BHK', 'Kaliyan', 'Joshi', 'Surat, Gujarat', 'India', 'Gujarat', 'Surat', 395006, 'kaliyan@gmail.com', '9099817715', 7984389894, '2bhk', 0, '$2y$10$NRp/379Jz7ftSVi4.rmNdeUac4LaM7MBMxw7kzApVNNtVCXa1tw7q', '2021-01-12', 120, '2021-05-12');

-- --------------------------------------------------------

--
-- Table structure for table `client_logs`
--

CREATE TABLE `client_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_logs`
--

INSERT INTO `client_logs` (`id`, `client_id`, `date`, `activity`) VALUES
(1, 'CL-001', '2020-12-29', 'Change Password'),
(2, 'CL-002', '2021-01-05', 'Change Password'),
(3, 'CL-002', '2021-01-06', 'Change Password'),
(4, 'CL-002', '2021-01-06', 'Add Manager'),
(6, 'CL-002', '2021-01-06', 'Edit Manager'),
(7, 'CL-002', '2021-01-07', 'Add Number of tables'),
(8, 'CL-002', '2021-01-07', 'Edit Number of tables'),
(9, 'CL-003', '2021-01-08', 'Add Manager'),
(10, 'CL-003', '2021-01-08', 'Add Number of tables'),
(11, 'CL-001', '2021-01-09', 'Add Number of tables'),
(12, 'CL-001', '2021-01-09', 'Add Manager'),
(13, 'CL-003', '2021-01-09', 'Edit Manager'),
(14, 'CL-003', '2021-01-09', 'Manager Change Password'),
(15, 'CL-002', '2021-01-09', 'Add Waiter'),
(16, 'CL-002', '2021-01-09', 'Edit Waiter'),
(17, 'CL-003', '2021-01-09', 'Add Waiter'),
(18, 'CL-003', '2021-01-09', 'Edit Waiter'),
(19, 'CL-002', '2021-01-14', 'Add Number of tables'),
(20, 'CL-002', '2021-01-14', 'Add Number of tables'),
(21, 'CL-002', '2021-01-14', 'Add Number of tables'),
(22, 'CL-003', '2021-01-14', 'Add Number of tables'),
(23, 'CL-002', '2021-01-14', 'Edit Number of tables'),
(24, 'CL-002', '2021-01-14', 'Edit Number of tables'),
(25, 'CL-002', '2021-01-14', 'Delete Section and Number of tables'),
(26, 'CL-002', '2021-01-14', 'Add Section and Number of tables'),
(27, 'CL-002', '2021-01-14', 'Delete Section and Number of tables'),
(28, 'CL-002', '2021-01-14', 'Add Section and Number of tables'),
(29, 'CL-002', '2021-01-14', 'Edit Section and Number of tables'),
(30, 'CL-002', '2021-01-14', 'Delete Section and Number of tables'),
(31, 'CL-002', '2021-01-14', 'Add Section and Number of tables'),
(32, 'CL-002', '2021-01-14', 'Add Section and Number of tables'),
(33, 'CL-004', '2021-01-15', 'Add Manager'),
(34, 'CL-004', '2021-01-15', 'Edit Manager'),
(35, 'CL-004', '2021-01-15', 'Add Waiter'),
(36, 'CL-004', '2021-01-15', 'Edit Waiter'),
(37, 'CL-004', '2021-01-15', 'Edit Waiter'),
(38, 'CL-004', '2021-01-15', 'Add Section and Number of tables'),
(39, 'CL-004', '2021-01-15', 'Edit Section and Number of tables'),
(40, 'CL-004', '2021-01-15', 'Delete Section and Number of tables'),
(41, 'CL-004', '2021-01-18', 'Add Waiter'),
(42, 'CL-004', '2021-01-18', 'Add Section and Number of tables'),
(43, 'CL-004', '2021-01-18', 'Add Section and Number of tables'),
(44, 'CL-004', '2021-01-18', 'Delete Section and Number of tables'),
(45, 'CL-004', '2021-01-18', 'Delete Waiter'),
(46, 'CL-004', '2021-01-18', 'Add Manager'),
(47, 'CL-004', '2021-01-18', 'Delete Manager'),
(48, 'CL-004', '2021-01-18', 'Add Manager'),
(49, 'CL-002', '2021-01-20', 'Edit Section and Number of tables'),
(50, 'CL-002', '2021-01-20', 'Edit Manager'),
(51, 'CL-002', '2021-01-20', 'Edit Waiter'),
(52, 'CL-002', '2021-01-20', 'Edit Section and Number of tables'),
(53, 'CL-002', '2021-01-20', 'Edit Manager');

-- --------------------------------------------------------

--
-- Table structure for table `client_payments`
--

CREATE TABLE `client_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_amount` bigint(20) NOT NULL,
  `payment_ref_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `renewal_duration` int(11) NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_payments`
--

INSERT INTO `client_payments` (`id`, `client_id`, `payment_method`, `invoice_amount`, `payment_ref_number`, `renewal_duration`, `date`) VALUES
(1, 'CL-001', 'Cash', 10000, 'CL0032sR', 90, '2020-12-31'),
(2, 'CL-002', 'Online', 20000, 'CL0032sR', 180, '2020-12-31'),
(3, 'CL-003', 'Cheque', 35000, 'CL0035rs', 30, '2021-01-02'),
(4, 'CL-004', 'Cheque', 12000, 'xvsdfsdf12000', 120, '2021-01-12');

-- --------------------------------------------------------

--
-- Table structure for table `client_pub_status`
--

CREATE TABLE `client_pub_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_pub_status`
--

INSERT INTO `client_pub_status` (`id`, `client_id`, `status`) VALUES
(1, 'CL-002', 1),
(2, 'CL-003', 1),
(3, 'CL-004', 1);

-- --------------------------------------------------------

--
-- Table structure for table `client_pub_tables`
--

CREATE TABLE `client_pub_tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `number_of_tables` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_pub_tables`
--

INSERT INTO `client_pub_tables` (`id`, `client_id`, `section_name`, `status`, `number_of_tables`) VALUES
(3, 'CL-003', 'Ground Floor', 1, 15),
(6, 'CL-002', 'Roof', 1, 10),
(7, 'CL-002', 'First Floor', 1, 6),
(9, 'CL-004', 'Foof', 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `client_settings`
--

CREATE TABLE `client_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `system_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_light` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_dark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fav_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `smtp_details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_settings`
--

INSERT INTO `client_settings` (`id`, `client_id`, `system_name`, `logo_light`, `logo_dark`, `fav_icon`, `smtp_details`) VALUES
(1, 'CL-002', 'CDF PUB', '1609222206.jpeg', '1609222206.png', '1609222206.png', NULL),
(3, 'CL-001', 'ABCDE PUB', '1609333146.png', '1609333147.png', '1609333147.png', 'smtp.gmail.com'),
(4, 'CL-003', 'DesaiPUB', '1609583567.png', '1609583569.png', '1609583569.png', 'smtp.hostinger.com');

-- --------------------------------------------------------

--
-- Table structure for table `client_supports`
--

CREATE TABLE `client_supports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `admin_subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_supports`
--

INSERT INTO `client_supports` (`id`, `client_id`, `client_subject`, `client_description`, `date`, `status`, `admin_subject`, `admin_description`) VALUES
(1, 'CL-001', 'Payment', 'Payment Failed', '2020-12-29', 1, 'Reply of Payment Failed', 'We are looking through your query and let you know where is problem and try to refund amount.'),
(3, 'CL-002', 'Not able to access', 'I am not able to login', '2021-01-01', 1, 'Response of your issue', 'We will check your issue and let you know where is problem.'),
(4, 'CL-003', 'Payment', 'Payment Failed', '2021-01-09', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`, `client_id`, `name`, `email`, `mobile`, `password`, `status`) VALUES
(1, 'CL-002', 'Jariwala Jayesh', 'jayesh@gmail.com', '9712032312', '$2y$10$TX1ffLDpLKsKmjHy6kMCterFVeqdOlKmDEmVfOMxVwLopmcNAsVWK', '1'),
(2, 'CL-003', 'Mahesh', 'mahesh@gmail.com', '9099817715', '$2y$10$dCcGh1U/LcPWBRpK/1HBzOG5bRsad0BrORb0ypN.zvBv26i6PLR1S', '1'),
(4, 'CL-001', 'Ganesh', 'ganesh@gmail.com', '9712032312', '$2y$10$iLlaEIB1n/fD4r0aN8NODO.dZOI.nQnsLlW/INjlX8LtP6vkPIn0K', '1'),
(6, 'CL-004', 'Dhruv Jariwala', 'dhruv@gmail.com', '9712032312', '$2y$10$tvSgCeJxxhRYoXmSOWyyH..pWQOIGblcHUw1upnehFN3mBQksy/2G', '1'),
(7, 'CL-004', 'Khemil Jariwala', 'khemil@gmail.com', '9712032312', '$2y$10$Ey0p7oyjYmFfE6nT0V7x5eoKNQ1.3yiE6bCo7l4fFhnS3yyzWwvl6', '1');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `waiter_id` int(11) NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_no` int(11) NOT NULL,
  `floor` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_12_24_102555_create_admins_table', 1),
(8, '2020_12_28_120557_create_client_payments_table', 3),
(10, '2020_12_29_041005_create_client_settings_table', 4),
(12, '2020_12_29_072220_create_client_logs_table', 5),
(14, '2020_12_29_111643_create_client_supports_table', 6),
(16, '2020_12_30_065250_create_admin_settings_table', 7),
(19, '2020_12_24_130337_create_clients_table', 8),
(20, '2021_01_06_121309_create_managers_table', 9),
(22, '2021_01_07_055656_create_client_pub_status_table', 11),
(23, '2021_01_08_072818_create_table_infos_table', 12),
(24, '2021_01_08_104444_create_members_table', 13),
(25, '2021_01_09_071350_create_waiters_table', 14),
(26, '2021_01_07_041110_create_client_pub_tables_table', 15),
(27, '2021_02_10_084428_orders', 16);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `client_id` varchar(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` varchar(10) NOT NULL,
  `product_qty` int(10) NOT NULL,
  `product_type` varchar(100) NOT NULL,
  `table_no` int(10) NOT NULL,
  `waiter_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `table_id` int(11) NOT NULL,
  `order_no` int(11) DEFAULT NULL,
  `total_price` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_infos`
--

CREATE TABLE `table_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_no` int(11) NOT NULL,
  `table_status` int(11) NOT NULL,
  `floor` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_time` datetime NOT NULL,
  `member_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `waiters`
--

CREATE TABLE `waiters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `waiters`
--

INSERT INTO `waiters` (`id`, `client_id`, `name`, `email`, `mobile`, `password`, `status`) VALUES
(1, 'CL-002', 'Jay Jari', 'jay@gmail.com', '9712032312', '$2y$10$o9obWm2.kJHdIEPYK3Ps2.p1A1C4Hq8vxN0OWISfOTRTtHlgN2shK', '0'),
(2, 'CL-003', 'Madhav Zaveri', 'madhav@gmail.com', '9099817715', '$2y$10$LBBx8rJWjR5kzELQtBetz.U5z8Jv44VuvA/cY2OZwuVcg85EcHiN2', '1'),
(4, 'CL-004', 'Jitesh Bharwad', 'jitesh@gmail.com', '9099817715', '$2y$10$p6zPF03TzN4.A5csB3VFlOTO71pDOchMzzt3wv1KxgVnL3vbn0pf.', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_settings`
--
ALTER TABLE `admin_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_email_unique` (`email`);

--
-- Indexes for table `client_logs`
--
ALTER TABLE `client_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_payments`
--
ALTER TABLE `client_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_pub_status`
--
ALTER TABLE `client_pub_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_pub_tables`
--
ALTER TABLE `client_pub_tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_settings`
--
ALTER TABLE `client_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_supports`
--
ALTER TABLE `client_supports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `table_infos`
--
ALTER TABLE `table_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `waiters`
--
ALTER TABLE `waiters`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_settings`
--
ALTER TABLE `admin_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `client_logs`
--
ALTER TABLE `client_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `client_payments`
--
ALTER TABLE `client_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `client_pub_status`
--
ALTER TABLE `client_pub_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `client_pub_tables`
--
ALTER TABLE `client_pub_tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `client_settings`
--
ALTER TABLE `client_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `client_supports`
--
ALTER TABLE `client_supports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `table_infos`
--
ALTER TABLE `table_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `waiters`
--
ALTER TABLE `waiters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
