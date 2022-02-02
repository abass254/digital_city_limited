-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2022 at 05:33 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dcl_erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `cash_sales`
--

CREATE TABLE `cash_sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trans_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gross_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `net_tax` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount_paid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `returning_change` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cash_sales`
--

INSERT INTO `cash_sales` (`id`, `trans_id`, `code`, `gross_amount`, `net_tax`, `amount_paid`, `returning_change`, `created_at`, `updated_at`) VALUES
(1, '165', 'CS-0001', '54600', '10400', '60000', '5400', '2021-12-18 06:38:05', '2022-01-18 06:38:05'),
(2, '167', 'CS-0002', '47880', '9120', '48000', '120', '2022-01-18 06:44:41', '2022-01-18 06:44:41'),
(3, '175', 'CS-0003', '45528', '8672', '46000', '472', '2022-01-19 05:53:16', '2022-01-19 05:53:16'),
(4, '178', 'CS-0004', '27888', '5312', '28000', '112', '2022-01-19 05:56:17', '2022-01-19 05:56:17'),
(5, '179', 'CS-0005', '62160', '11840', '63500', '1340', '2022-01-19 07:07:18', '2022-01-19 07:07:18'),
(6, '180', 'CS-0006', '29064', '5536', '29500', '436', '2022-01-19 08:08:02', '2022-01-19 08:08:02'),
(7, '181', 'CS-0007', '56280', '10720', '57000', '720', '2022-01-19 10:06:28', '2022-01-19 10:06:28'),
(8, '209', 'CS-0008', '477120', '90880', '478000', '880', '2022-01-23 09:30:26', '2022-01-23 09:30:26'),
(9, '213', 'CS-0009', '337680', '64320', '338000', '320', '2022-12-24 06:43:16', '2022-01-24 06:43:16'),
(10, '215', 'CS-0010', '1365840', '260160', '1366000', '160', '2022-01-24 07:15:48', '2022-01-24 07:15:48'),
(11, '231', 'CS-0011', '130200', '24800', '130500', '300', '2022-01-25 09:44:56', '2022-01-25 09:44:56'),
(12, '232', 'CS-0012', '159600', '30400', '160000', '400', '2022-01-25 09:45:44', '2022-01-25 09:45:44'),
(13, '239', 'CS-0013', '273840', '52160', '275000', '1160', '2022-01-27 06:20:43', '2022-01-27 06:20:43'),
(14, '242', 'CS-0014', '65520', '12480', '66000', '480', '2022-02-01 06:49:37', '2022-02-01 06:49:37'),
(15, '243', 'CS-0015', '70560', '13440', '71000', '440', '2022-02-02 03:45:45', '2022-02-02 03:45:45');

-- --------------------------------------------------------

--
-- Table structure for table `cash_sale_details`
--

CREATE TABLE `cash_sale_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cash_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cash_sale_details`
--

INSERT INTO `cash_sale_details` (`id`, `cash_id`, `prod_id`, `price`, `qty`, `tax`, `total_amount`, `created_at`, `updated_at`) VALUES
(1, '1', '3', '15000', '3', '7200', '37800', '2022-01-18 06:38:05', '2022-01-18 06:38:05'),
(2, '1', '1', '10000', '2', '3200', '16800', '2022-01-18 06:38:05', '2022-01-18 06:38:05'),
(3, '2', '5', '5000', '3', '2400', '12600', '2022-01-18 06:44:41', '2022-01-18 06:44:41'),
(4, '2', '2', '14000', '3', '6720', '35280', '2022-01-18 06:44:41', '2022-01-18 06:44:41'),
(5, '3', '3', '15000', '1', '2400', '12600', '2022-01-19 05:53:16', '2022-01-19 05:53:16'),
(6, '3', '7', '2200', '1', '352', '1848', '2022-01-19 05:53:16', '2022-01-19 05:53:16'),
(7, '3', '5', '5000', '1', '800', '4200', '2022-01-19 05:53:16', '2022-01-19 05:53:16'),
(8, '3', '1', '10000', '1', '1600', '8400', '2022-01-19 05:53:16', '2022-01-19 05:53:16'),
(9, '3', '2', '14000', '1', '2240', '11760', '2022-01-19 05:53:16', '2022-01-19 05:53:16'),
(10, '3', '4', '8000', '1', '1280', '6720', '2022-01-19 05:53:16', '2022-01-19 05:53:16'),
(11, '4', '3', '15000', '1', '2400', '12600', '2022-01-19 05:56:17', '2022-01-19 05:56:17'),
(12, '4', '7', '2200', '1', '352', '1848', '2022-01-19 05:56:17', '2022-01-19 05:56:17'),
(13, '4', '4', '8000', '2', '2560', '13440', '2022-01-19 05:56:17', '2022-01-19 05:56:17'),
(14, '5', '3', '15000', '2', '4800', '25200', '2022-01-19 07:07:18', '2022-01-19 07:07:18'),
(15, '5', '1', '10000', '3', '4800', '25200', '2022-01-19 07:07:18', '2022-01-19 07:07:18'),
(16, '5', '2', '14000', '1', '2240', '11760', '2022-01-19 07:07:18', '2022-01-19 07:07:18'),
(17, '6', '7', '2200', '3', '1056', '5544', '2022-01-19 08:08:02', '2022-01-19 08:08:02'),
(18, '6', '2', '14000', '2', '4480', '23520', '2022-01-19 08:08:02', '2022-01-19 08:08:02'),
(19, '7', '3', '15000', '1', '2400', '12600', '2022-01-19 10:06:28', '2022-01-19 10:06:28'),
(20, '7', '5', '5000', '2', '1600', '8400', '2022-01-19 10:06:28', '2022-01-19 10:06:28'),
(21, '7', '2', '14000', '3', '6720', '35280', '2022-01-19 10:06:28', '2022-01-19 10:06:28'),
(22, '8', '7', '2200', '10', '3520', '18480', '2022-01-23 09:30:26', '2022-01-23 09:30:26'),
(23, '8', '2', '14000', '12', '26880', '141120', '2022-01-23 09:30:26', '2022-01-23 09:30:26'),
(24, '8', '2', '14000', '14', '31360', '164640', '2022-01-23 09:30:26', '2022-01-23 09:30:26'),
(25, '8', '2', '14000', '13', '29120', '152880', '2022-01-23 09:30:26', '2022-01-23 09:30:26'),
(26, '9', '3', '15000', '10', '24000', '126000', '2022-01-24 06:43:16', '2022-01-24 06:43:16'),
(27, '9', '7', '2200', '10', '3520', '18480', '2022-01-24 06:43:16', '2022-01-24 06:43:16'),
(28, '9', '5', '5000', '10', '8000', '42000', '2022-01-24 06:43:16', '2022-01-24 06:43:16'),
(29, '9', '1', '10000', '10', '16000', '84000', '2022-01-24 06:43:16', '2022-01-24 06:43:16'),
(30, '9', '4', '8000', '10', '12800', '67200', '2022-01-24 06:43:16', '2022-01-24 06:43:16'),
(31, '10', '3', '15000', '30', '72000', '378000', '2022-01-24 07:15:48', '2022-01-24 07:15:48'),
(32, '10', '7', '2200', '30', '10560', '55440', '2022-01-24 07:15:48', '2022-01-24 07:15:48'),
(33, '10', '5', '5000', '30', '24000', '126000', '2022-01-24 07:15:48', '2022-01-24 07:15:48'),
(34, '10', '1', '10000', '30', '48000', '252000', '2022-01-24 07:15:48', '2022-01-24 07:15:48'),
(35, '10', '2', '14000', '30', '67200', '352800', '2022-01-24 07:15:48', '2022-01-24 07:15:48'),
(36, '10', '4', '8000', '30', '38400', '201600', '2022-01-24 07:15:48', '2022-01-24 07:15:48'),
(37, '11', '4', '8000', '10', '12800', '67200', '2022-01-25 09:44:56', '2022-01-25 09:44:56'),
(38, '11', '5', '5000', '15', '12000', '63000', '2022-01-25 09:44:56', '2022-01-25 09:44:56'),
(39, '12', '1', '10000', '3', '4800', '25200', '2022-01-25 09:45:44', '2022-01-25 09:45:44'),
(40, '12', '4', '8000', '20', '25600', '134400', '2022-01-25 09:45:44', '2022-01-25 09:45:44'),
(41, '13', '3', '15000', '4', '9600', '50400', '2022-01-27 06:20:43', '2022-01-27 06:20:43'),
(42, '13', '2', '14000', '14', '31360', '164640', '2022-01-27 06:20:43', '2022-01-27 06:20:43'),
(43, '13', '2', '14000', '5', '11200', '58800', '2022-01-27 06:20:43', '2022-01-27 06:20:43'),
(44, '14', '1', '10000', '2', '3200', '16800', '2022-02-01 06:49:37', '2022-02-01 06:49:37'),
(45, '14', '2', '14000', '3', '6720', '35280', '2022-02-01 06:49:37', '2022-02-01 06:49:37'),
(46, '14', '4', '8000', '2', '2560', '13440', '2022-02-01 06:49:37', '2022-02-01 06:49:37'),
(47, '15', '2', '14000', '6', '13440', '70560', '2022-02-02 03:45:45', '2022-02-02 03:45:45');

-- --------------------------------------------------------

--
-- Table structure for table `cash_transactions`
--

CREATE TABLE `cash_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `t_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `t_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `t_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `t_debit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `t_credit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `t_balance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cash_transactions`
--

INSERT INTO `cash_transactions` (`id`, `t_no`, `t_date`, `t_description`, `t_debit`, `t_credit`, `t_balance`, `created_at`, `updated_at`) VALUES
(1, 'TRS-CS-0014', '01/02/2022', 'Cash Sale', '65520', '0', '65520', '2022-02-01 06:49:37', '2022-02-01 06:49:37'),
(2, 'TRS-CS-0015', '02/02/2022', 'Cash Sale', '70560', '0', '70560', '2022-02-02 03:45:45', '2022-02-02 03:45:45'),
(3, 'TRS-INV-0003', '02/02/2022', 'Invoice Released', '0', '185600', '-185600', '2022-02-02 04:06:01', '2022-02-02 04:06:01'),
(4, 'TRS-INV-0003-P-1', '02/02/2022', 'Invoice Paid', '180000', '0', '180000', '2022-02-02 04:07:12', '2022-02-02 04:07:12'),
(5, 'TRS-INV-0003-P-2', '02/02/2022', 'Invoice Paid', '5600', '0', '5600', '2022-02-02 04:21:36', '2022-02-02 04:21:36'),
(6, '-P-1', '02/02/2022', 'Invoice Paid', '24000', '0', '24000', '2022-02-02 04:24:25', '2022-02-02 04:24:25'),
(7, '-P-1', '02/02/2022', 'Invoice Paid', '10000', '0', '10000', '2022-02-02 05:00:09', '2022-02-02 05:00:09');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_permit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `client_name`, `email`, `location`, `contact`, `work_permit`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Client Name', 'client@dcl.com', 'Nairobi', '0987654321', '', '1', '2022-01-13 09:11:17', '2022-01-13 09:11:17'),
(2, 'Client', 'client@dcl.com', 'Nairobi', '81205690', 'Client.pptx', '1', '2022-01-13 09:30:21', '2022-01-13 09:30:21'),
(3, 'Name', 'name@dcl.com', 'Nairobi', '9193991939', 'Name.pdf', '1', '2022-01-13 09:54:38', '2022-01-13 09:54:38');

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
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trans_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `net_tax` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount_paid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `process_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `trans_id`, `code`, `sub_total`, `net_tax`, `total_amount`, `amount_paid`, `client_id`, `process_status`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, '240', 'INV-0001', '360000', '57600', '417600', '0', '1', '1', '0', '2022-01-27 07:04:03', '2022-01-27 07:04:38'),
(2, '241', 'INV-0002', '120000', '19200', '139200', '0', '2', '1', '0', '2022-01-27 09:02:00', '2022-01-27 09:02:31'),
(3, '244', 'INV-0003', '160000', '25600', '185600', '0', '2', '1', '0', '2022-02-02 04:05:35', '2022-02-02 04:06:01');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inv_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `inv_id`, `prod_id`, `price`, `quantity`, `total_amount`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', '2', '14000', '10', '140000', '1', '2022-01-27 07:04:03', '2022-01-27 07:04:28'),
(2, '1', '4', '8000', '10', '80000', '1', '2022-01-27 07:04:03', '2022-01-27 07:04:30'),
(3, '1', '2', '14000', '10', '140000', '1', '2022-01-27 07:04:03', '2022-01-27 07:04:32'),
(4, '2', '5', '5000', '3', '15000', '1', '2022-01-27 09:02:00', '2022-01-27 09:02:27'),
(5, '2', '3', '15000', '7', '105000', '1', '2022-01-27 09:02:00', '2022-01-27 09:02:29'),
(6, '3', '4', '8000', '20', '160000', '1', '2022-02-02 04:05:36', '2022-02-02 04:05:58');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_payments`
--

CREATE TABLE `invoice_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inv_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount_paid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_payments`
--

INSERT INTO `invoice_payments` (`id`, `inv_id`, `amount_paid`, `created_at`, `updated_at`) VALUES
(1, '1', '400000', '2022-01-27 07:14:12', '2022-01-27 07:14:12'),
(2, '2', '30000', '2022-01-27 09:54:16', '2022-01-27 09:54:16'),
(3, '2', '10000', '2022-01-27 09:55:04', '2022-01-27 09:55:04'),
(4, '1', '10000', '2022-01-27 09:56:25', '2022-01-27 09:56:25'),
(5, '1', '4000', '2022-01-27 09:57:01', '2022-01-27 09:57:01'),
(6, '1', '2000', '2022-01-27 09:58:27', '2022-01-27 09:58:27'),
(7, '1', '2000', '2022-01-27 10:00:02', '2022-01-27 10:00:02'),
(8, '1', '1000', '2022-01-27 10:06:04', '2022-01-27 10:06:04'),
(9, '1', '1000', '2022-01-27 12:12:13', '2022-01-27 12:12:13'),
(10, '1', '1000', '2022-01-27 12:12:51', '2022-01-27 12:12:51'),
(11, '3', '180000', '2022-02-02 04:07:11', '2022-02-02 04:07:11'),
(12, '3', '5600', '2022-02-02 04:21:36', '2022-02-02 04:21:36'),
(13, '2', '24000', '2022-02-02 04:24:25', '2022-02-02 04:24:25'),
(14, '2', '10000', '2022-02-02 05:00:09', '2022-02-02 05:00:09');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2021_12_30_123153_create_product_details_table', 2),
(8, '2022_01_07_085235_create_stocks_table', 3),
(9, '2022_01_07_085355_create_transactions_table', 3),
(10, '2022_01_10_195343_create_stores_table', 4),
(11, '2022_01_11_201946_create_clients_table', 5),
(12, '2022_01_11_205946_create_quotations_table', 5),
(13, '2022_01_16_040815_create_cash_sales_table', 6),
(14, '2022_01_16_040832_create_cash_sale_details_table', 6),
(15, '2022_01_19_081810_create_cash_transactions_table', 7),
(16, '2022_01_19_153445_create_purchases_table', 8),
(17, '2022_01_19_153951_create_purchase_details_table', 8),
(18, '2022_01_24_124439_create_quotation_details_table', 9),
(27, '2022_01_25_135346_create_invoices_table', 10),
(28, '2022_01_25_135410_create_invoice_details_table', 10),
(29, '2022_01_27_092543_create_invoice_payments_table', 10);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `description` varchar(2550) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buying_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offer_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offer_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wholesale_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`id`, `name`, `category`, `code`, `image`, `description`, `buying_price`, `selling_price`, `offer_quantity`, `offer_price`, `status`, `wholesale_price`, `created_at`, `updated_at`) VALUES
(1, 'Gasoline engine', 'Generators', 'GEN1682', 'GEN1682.png', 'Max.output:6.5HP\r\nCamshaft diameter:19mm,Q TYPE\r\nMax.torque:12.4Nm\r\nEngine type:4 stroke,OHV\r\nDisplacement(ml):196\r\nBorexStroke:68X54mm\r\nCooling System:Air-cooled\r\nIgnition system:T.C.I\r\nStarting system:Recoil\r\nFuel tank(L):3.6L\r\nOil capacity:0.6L\r\nFuel consumption:290g/HP.hr\r\nOil alert function\r\nWork as driving motor for water pump,compressor and other belt driving products\r\nPacked by carton box', '10000', '12000', '5', '10000', '1', '11000', '2021-12-30 14:03:49', '2022-01-14 09:03:34'),
(2, 'Gasoline engine', 'Generators', 'GEN1882', 'GEN1882.png', 'Max.output:13.0HP\r\nCamshaft diameter:25.4mm,Q TYPE\r\nMax.torque:29Nm\r\nEngine type:4 stroke,OHV\r\nDisplacement(ml):389\r\nBorexStroke:88X64mm\r\nCooling System:Air-cooled\r\nIgnition system:T.C.I\r\nStarting system:Recoil\r\nFuel tank(L):6.5L\r\nOil capacity:1.1L\r\nFuel consumption:280g/HP.hr\r\nOil alert function\r\nWork as driving motor for water pump,compressor and other belt driving products\r\nPacked by carton box', '12000', '20000', '3', '14000', '1', '16000', '2021-12-30 16:28:57', '2021-12-30 16:28:57'),
(3, 'Auto air compressor', 'Air Tools', 'AAC1601', 'AAC1601.png', 'Voltage:12V\r\nMax Pressure：160PSI/11 Bar/1100Kpa\r\nMax.air flow:35L/min\r\nWith 1PCS LED light\r\nWith 3M cord with cigarette lighter\r\nWith 1Pcs Ball adaptor\r\nWith 1pcs Tire vale adapters\r\nWith 1pcs Air bed adapters\r\nPacked by color box', '10000', '25000', '12', '15000', '1', '20000', '2021-12-30 16:32:02', '2021-12-30 16:32:02'),
(4, 'Water pump', 'Water Pumps', 'VPM37018', 'VPM37018.png', 'Peripheral Pump\r\nVoltage:220-240V~50Hz\r\nOutput power:370W(0.5HP)\r\nMax.head:30M\r\nMax.flow:30L/min\r\nMax.suction:8M\r\nPipe diameter:1\"x1\"\r\nAlumium wire motor\r\nBrass impeller\r\n0.15m length cable', '7000', '10000', '4', '8000', '1', '9000', '2021-12-30 16:42:04', '2021-12-30 16:42:04'),
(5, 'Water pump', 'Water Pumps', 'CPM7508', '1640893819_CPM7508.png', 'Centrifugal pump\r\nVoltage:220-240V~50Hz\r\nOutput power:750W(1HP)\r\nMax.head:30M\r\nMax.flow:110L/min\r\nMax.suction:8M\r\nPipe diameter:1\"x1\"\r\nCopper wire motor\r\nStainless steel impeller\r\n0.15m length cable\r\nPacked by carton box', '5500', '9000', '7', '5000', '1', '6000', '2021-12-30 16:50:19', '2022-01-07 04:44:43'),
(7, 'Lithium-ion cordless drill', 'Power Tools', 'CDLI2002', '1642513368_CDLI2002.png', 'Voltage:20V\r\nNo-load speed:0-400/0-1500/min\r\nMax.torque:45NM\r\nChuck capacity:0.8-10mm\r\nTorque settings:15+1\r\nAuto-lock keyless chuck\r\nMechanical 2-speed gear\r\nSpindle lock function\r\n20V Lithium-Ion 2.0Ah batteries\r\nWith 2pcs battery pack\r\nWith 1pcs fast charger\r\nCharge volts：220V-240V~50/60Hz\r\nIntegrated work light\r\nLED battery power indicator\r\nWith 47pcs accessories\r\nPacked by canvas bag', '2000', '2700', '9', '2200', '1', '2500', '2022-01-18 10:42:48', '2022-01-18 10:42:48');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expected_arrival_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipped_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trans_id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `p_code`, `supplier`, `expected_arrival_date`, `shipped_to`, `trans_id`, `status`, `sub_total`, `tax`, `total_amount`, `created_at`, `updated_at`) VALUES
(1, 'PO-0001', 'Hello World', '2022-01-03', 'DC Main WareHouse', 194, '1', '20002', '3200.32', '23202.32', '2022-01-21 08:57:05', '2022-01-22 01:15:46'),
(2, 'PO-0002', 'Hello World', '2022-01-15', 'DC Main WareHouse', 195, '1', '100010', '16001.6', '116011.6', '2022-01-21 08:57:28', '2022-01-22 01:27:54'),
(3, 'PO-0003', 'Hello World', '2022-01-20', 'DC Main WareHouse', 197, '1', '70005', '11200.800000000001', '81205.8', '2022-01-21 09:01:32', '2022-01-22 01:42:50'),
(4, 'PO-0004', 'Hello World', '2022-01-03', 'DC Main WareHouse', 198, '1', '330003', '52800.48', '382803.48', '2022-01-21 09:14:02', '2022-01-23 07:33:52'),
(5, 'PO-0005', 'Hello World', '2022-01-20', 'DC Main WareHouse', 199, '1', '40004', '6400.64', '46404.64', '2022-01-21 09:17:08', '2022-01-22 01:49:04'),
(6, 'PO-0006', 'Hello World', '2022-01-13', 'DC Main WareHouse', 200, '1', '80008', '12801.28', '92809.28', '2022-01-21 09:29:30', '2022-01-23 07:42:17'),
(7, 'PO-0007', 'Hello World', '2022-01-12', 'DC Main WareHouse', 202, '1', '1000100', '160016', '1160116', '2022-01-21 09:33:00', '2022-01-23 07:42:44'),
(8, 'PO-0008', 'Hello World', '2022-01-11', 'DC Main WareHouse', 203, '1', '352032', '56325.12', '408357.12', '2022-01-21 09:37:15', '2022-01-23 07:36:29'),
(9, 'PO-0009', 'Hello World', '2022-01-18', 'DC Main WareHouse', 204, '1', '100010', '16001.6', '116011.6', '2022-01-21 09:42:36', '2022-01-22 01:46:37'),
(10, 'PO-0010', 'Hey There', '2022-01-12', 'DC Main WareHouse', 205, '1', '2416237', '386597.92', '2802834.92', '2022-01-21 10:04:54', '2022-01-23 07:36:50'),
(11, 'PO-0011', 'Ingco China', '2022-01-26', 'DC Main WareHouse', 207, '1', '309027', '49444.32', '358471.32', '2022-01-23 07:45:12', '2022-01-23 09:24:59'),
(12, 'PO-0012', 'Ingco China', '2022-01-10', 'DC Main WareHouse', 210, '1', '1156000', '184960', '1340960', '2022-01-23 09:45:01', '2022-01-23 09:45:59'),
(13, 'PO-0013', 'Ingco China', '2022-01-19', 'DC Main WareHouse', 212, '1', '1200000', '192000', '1392000', '2022-01-23 17:12:14', '2022-01-23 17:17:56');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_details`
--

CREATE TABLE `purchase_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_details`
--

INSERT INTO `purchase_details` (`id`, `purchase_id`, `item_id`, `quantity`, `unit_price`, `total_amount`, `created_at`, `updated_at`) VALUES
(1, '1', '4', '2', '1000', '20002', '2022-01-21 08:57:05', '2022-01-21 08:57:05'),
(2, '2', '1', '10', '1000', '100010', '2022-01-21 08:57:28', '2022-01-21 08:57:28'),
(3, '3', '4', '3', '1000', '30003', '2022-01-21 09:01:32', '2022-01-21 09:01:32'),
(4, '3', '4', '2', '2000', '40002', '2022-01-21 09:01:32', '2022-01-21 09:01:32'),
(5, '4', '4', '3', '11000', '330003', '2022-01-21 09:14:02', '2022-01-21 09:14:02'),
(6, '5', '4', '4', '1000', '40004', '2022-01-21 09:17:08', '2022-01-21 09:17:08'),
(7, '6', '2', '4', '1000', '40004', '2022-01-21 09:29:30', '2022-01-21 09:29:30'),
(8, '6', '4', '4', '1000', '40004', '2022-01-21 09:29:30', '2022-01-21 09:29:30'),
(9, '7', '1', '100', '1000', '1000100', '2022-01-21 09:33:00', '2022-01-21 09:33:00'),
(10, '8', '1', '32', '1100', '352032', '2022-01-21 09:37:15', '2022-01-21 09:37:15'),
(11, '9', '1', '10', '1000', '100010', '2022-01-21 09:42:36', '2022-01-21 09:42:36'),
(12, '10', '7', '20', '1200', '240020', '2022-01-21 10:04:54', '2022-01-21 10:04:54'),
(13, '10', '1', '23', '1900', '437023', '2022-01-21 10:04:54', '2022-01-21 10:04:54'),
(14, '10', '4', '53', '1400', '742053', '2022-01-21 10:04:54', '2022-01-21 10:04:54'),
(15, '10', '2', '83', '1120', '929683', '2022-01-21 10:04:55', '2022-01-21 10:04:55'),
(16, '10', '5', '54', '110', '59454', '2022-01-21 10:04:55', '2022-01-21 10:04:55'),
(17, '10', '3', '4', '200', '8004', '2022-01-21 10:04:55', '2022-01-21 10:04:55'),
(18, '11', '3', '12', '1200', '144012', '2022-01-23 07:45:12', '2022-01-23 07:45:12'),
(19, '11', '2', '15', '1100', '165015', '2022-01-23 07:45:12', '2022-01-23 07:45:12'),
(20, '12', '3', '200', '1000', '200000', '2022-01-23 09:45:01', '2022-01-23 09:45:01'),
(21, '12', '7', '200', '900', '180000', '2022-01-23 09:45:01', '2022-01-23 09:45:01'),
(22, '12', '5', '200', '1000', '200000', '2022-01-23 09:45:01', '2022-01-23 09:45:01'),
(23, '12', '1', '200', '1100', '220000', '2022-01-23 09:45:01', '2022-01-23 09:45:01'),
(24, '12', '2', '200', '890', '178000', '2022-01-23 09:45:01', '2022-01-23 09:45:01'),
(25, '12', '4', '200', '890', '178000', '2022-01-23 09:45:01', '2022-01-23 09:45:01'),
(26, '13', '4', '100', '12000', '1200000', '2022-01-23 17:12:14', '2022-01-23 17:12:14');

-- --------------------------------------------------------

--
-- Table structure for table `quotations`
--

CREATE TABLE `quotations` (
  `id` int(11) NOT NULL,
  `trans_id` varchar(200) NOT NULL,
  `code` varchar(100) NOT NULL,
  `sub_total` varchar(100) NOT NULL,
  `net_tax` varchar(100) NOT NULL,
  `total_amount` varchar(100) NOT NULL,
  `client_id` varchar(100) NOT NULL,
  `status` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quotations`
--

INSERT INTO `quotations` (`id`, `trans_id`, `code`, `sub_total`, `net_tax`, `total_amount`, `client_id`, `status`, `created_at`, `updated_at`) VALUES
(2, '226', 'QUOT-0001', '102000', '16320', '118320', '1', '1', '2022-01-25 04:40:09', '2022-01-25 09:02:22'),
(3, '227', 'QUOT-0003', '542000', '86720', '628720', '3', '1', '2022-01-25 04:52:04', '2022-01-25 09:03:46'),
(4, '228', 'QUOT-0004', '260000', '41600', '301600', '3', '1', '2022-01-25 04:53:38', '2022-01-25 09:07:37'),
(5, '229', 'QUOT-0005', '1311000', '209760', '1520760', '1', '1', '2022-01-25 08:37:47', '2022-01-25 09:07:26'),
(6, '230', 'QUOT-0006', '598000', '95680', '693680', '2', '1', '2022-01-25 09:26:13', '2022-01-25 09:42:52'),
(7, '236', 'QUOT-0007', '142000', '22720', '164720', '1', '1', '2022-01-26 09:36:44', '2022-01-26 09:41:12'),
(8, '237', 'QUOT-0008', '330000', '52800', '382800', '2', '1', '2022-01-27 05:10:12', '2022-01-27 05:11:20');

-- --------------------------------------------------------

--
-- Table structure for table `quotation_details`
--

CREATE TABLE `quotation_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quot_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quotation_details`
--

INSERT INTO `quotation_details` (`id`, `quot_id`, `prod_id`, `price`, `quantity`, `total_amount`, `status`, `created_at`, `updated_at`) VALUES
(1, '2', '3', '15000', '4', '60000', 1, '2022-01-25 04:40:09', '2022-01-26 11:23:06'),
(2, '2', '2', '14000', '3', '42000', 1, '2022-01-25 04:40:09', '2022-01-27 04:56:07'),
(3, '3', '3', '15000', '10', '150000', 1, '2022-01-25 04:52:04', '2022-01-25 10:10:09'),
(4, '3', '4', '8000', '10', '80000', 1, '2022-01-25 04:52:04', '2022-01-25 10:10:12'),
(5, '3', '7', '2200', '10', '22000', 1, '2022-01-25 04:52:04', '2022-01-25 10:10:14'),
(6, '3', '1', '10000', '10', '100000', 1, '2022-01-25 04:52:04', '2022-01-25 10:10:17'),
(7, '3', '2', '14000', '10', '140000', 1, '2022-01-25 04:52:04', '2022-01-25 08:19:53'),
(8, '3', '5', '5000', '10', '50000', 1, '2022-01-25 04:52:04', '2022-01-25 08:50:07'),
(9, '4', '1', '10000', '12', '120000', 1, '2022-01-25 04:53:38', '2022-01-25 10:09:35'),
(10, '4', '2', '14000', '10', '140000', 1, '2022-01-25 04:53:38', '2022-01-25 09:07:34'),
(11, '5', '5', '5000', '51', '255000', 0, '2022-01-25 08:37:47', '2022-01-27 05:00:29'),
(12, '5', '4', '8000', '61', '488000', 1, '2022-01-25 08:37:47', '2022-01-25 09:07:20'),
(13, '5', '4', '8000', '71', '568000', 1, '2022-01-25 08:37:47', '2022-01-25 09:07:18'),
(14, '6', '1', '10000', '23', '230000', 1, '2022-01-25 09:26:13', '2022-01-25 09:42:41'),
(15, '6', '4', '8000', '21', '168000', 0, '2022-01-25 09:26:13', '2022-01-26 11:23:29'),
(16, '6', '1', '10000', '20', '200000', 1, '2022-01-25 09:26:13', '2022-01-25 09:42:49'),
(17, '7', '1', '10000', '4', '40000', 1, '2022-01-26 09:36:44', '2022-01-26 09:51:18'),
(18, '7', '2', '14000', '5', '70000', 1, '2022-01-26 09:36:44', '2022-01-26 09:41:10'),
(19, '7', '4', '8000', '4', '32000', 0, '2022-01-26 09:36:44', '2022-01-26 09:36:44'),
(20, '8', '3', '15000', '10', '150000', 1, '2022-01-27 05:10:12', '2022-01-27 05:51:04'),
(21, '8', '4', '8000', '10', '80000', 1, '2022-01-27 05:10:12', '2022-01-27 05:11:15'),
(22, '8', '1', '10000', '10', '100000', 1, '2022-01-27 05:10:12', '2022-01-27 05:51:07');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prod_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trans_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `prod_id`, `store_id`, `qty`, `trans_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '3', '1', '56', '2', 1, '2022-01-07 13:50:07', '2022-01-07 13:50:07'),
(2, '2', '1', '5', '2', 1, '2022-01-07 13:50:07', '2022-01-07 13:50:07'),
(3, '5', '1', '67', '3', 1, '2022-01-07 13:52:09', '2022-01-07 13:52:09'),
(4, '2', '1', '34', '3', 1, '2022-01-07 13:52:09', '2022-01-07 13:52:09'),
(5, '4', '1', '76', '3', 1, '2022-01-07 13:52:09', '2022-01-07 13:52:09'),
(6, '1', '1', '65', '3', 1, '2022-01-07 13:52:09', '2022-01-07 13:52:09'),
(8, '3', '2', '40', '5', 1, '2022-01-07 13:59:26', '2022-01-07 13:59:26'),
(9, '5', '2', '32', '5', 1, '2022-01-07 13:59:26', '2022-01-07 13:59:26'),
(10, '1', '2', '27', '5', 1, '2022-01-07 13:59:26', '2022-01-07 13:59:26'),
(11, '2', '2', '16', '5', 1, '2022-01-07 13:59:26', '2022-01-07 13:59:26'),
(12, '4', '2', '9', '5', 1, '2022-01-07 13:59:26', '2022-01-07 13:59:26'),
(13, '5', '2', '-45', '6', 1, '2022-01-07 14:02:02', '2022-01-07 14:02:02'),
(14, '3', '2', '-45', '6', 1, '2022-01-07 14:02:02', '2022-01-07 14:02:02'),
(15, '1', '2', '-10', '6', 1, '2022-01-07 14:02:02', '2022-01-07 14:02:02'),
(16, '2', '2', '-56', '6', 1, '2022-01-07 14:02:02', '2022-01-07 14:02:02'),
(17, '4', '2', '-35', '6', 1, '2022-01-07 14:02:02', '2022-01-07 14:02:02'),
(18, '5', '2', '-45', '7', 1, '2022-01-07 14:02:07', '2022-01-07 14:02:07'),
(19, '3', '2', '-45', '7', 1, '2022-01-07 14:02:07', '2022-01-07 14:02:07'),
(20, '1', '2', '-10', '7', 1, '2022-01-07 14:02:07', '2022-01-07 14:02:07'),
(21, '2', '2', '-56', '7', 1, '2022-01-07 14:02:07', '2022-01-07 14:02:07'),
(22, '4', '2', '-35', '7', 1, '2022-01-07 14:02:07', '2022-01-07 14:02:07'),
(23, '2', '1', '-123', '8', 1, '2022-01-08 17:54:50', '2022-01-08 17:54:50'),
(24, '2', '1', '200', '9', 1, '2022-01-08 17:55:52', '2022-01-08 17:55:52'),
(25, '5', '1', '+23', '10', 1, '2022-01-08 17:58:27', '2022-01-08 17:58:27'),
(26, '2', '1', '+56', '10', 1, '2022-01-08 17:58:27', '2022-01-08 17:58:27'),
(27, '1', '1', '+40', '10', 1, '2022-01-08 17:58:27', '2022-01-08 17:58:27'),
(28, '4', '1', '+34', '10', 1, '2022-01-08 17:58:27', '2022-01-08 17:58:27'),
(29, '3', '1', '+56', '10', 1, '2022-01-08 17:58:27', '2022-01-08 17:58:27'),
(30, '3', '1', '+34', '11', 1, '2022-01-08 17:59:32', '2022-01-08 17:59:32'),
(31, '2', '1', '+56', '11', 1, '2022-01-08 17:59:32', '2022-01-08 17:59:32'),
(32, '2', '1', '+45', '12', 1, '2022-01-08 18:00:30', '2022-01-08 18:00:30'),
(33, '3', '2', '+20', '13', 1, '2022-01-10 17:17:02', '2022-01-11 16:14:26'),
(34, '3', '1', '-20', '13', 1, '2022-01-10 17:17:02', '2022-01-10 17:17:02'),
(35, '3', '2', '+20', '14', 1, '2022-01-10 17:18:29', '2022-01-11 16:14:38'),
(36, '3', '1', '-20', '14', 1, '2022-01-10 17:18:29', '2022-01-10 17:18:29'),
(37, '3', '2', '+10', '15', 1, '2022-01-10 17:18:58', '2022-01-11 16:14:49'),
(38, '3', '1', '-10', '15', 1, '2022-01-10 17:18:58', '2022-01-10 17:18:58'),
(39, '3', '2', '+10', '16', 1, '2022-01-10 17:21:22', '2022-01-11 16:14:44'),
(40, '3', '1', '-10', '16', 1, '2022-01-10 17:21:22', '2022-01-10 17:21:22'),
(41, '1', '2', '+40', '17', 1, '2022-01-10 18:11:35', '2022-01-11 16:14:53'),
(42, '1', '1', '-40', '17', 1, '2022-01-10 18:11:35', '2022-01-10 18:11:35'),
(43, '4', '2', '+70', '18', 1, '2022-01-10 18:13:30', '2022-01-11 16:15:00'),
(44, '4', '1', '-70', '18', 1, '2022-01-10 18:13:30', '2022-01-10 18:13:30'),
(45, '2', '2', '+100', '19', 1, '2022-01-10 18:15:48', '2022-01-11 16:15:04'),
(46, '2', '1', '-100', '19', 1, '2022-01-10 18:15:48', '2022-01-10 18:15:48'),
(47, '5', '2', '+60', '20', 1, '2022-01-10 18:16:29', '2022-01-11 16:15:07'),
(48, '5', '1', '-60', '20', 1, '2022-01-10 18:16:29', '2022-01-10 18:16:29'),
(49, '2', '3', '+20', '21', 1, '2022-01-10 18:18:58', '2022-01-18 07:17:36'),
(50, '2', '1', '-20', '21', 1, '2022-01-10 18:18:58', '2022-01-10 18:18:58'),
(51, '2', '2', '+60', '22', 1, '2022-01-10 18:22:22', '2022-01-11 16:15:11'),
(52, '2', '1', '-60', '22', 1, '2022-01-10 18:22:22', '2022-01-10 18:22:22'),
(53, '1', '2', '+10', '23', 1, '2022-01-11 16:18:58', '2022-01-11 16:19:34'),
(54, '1', '1', '-10', '23', 1, '2022-01-11 16:18:58', '2022-01-11 16:18:58'),
(55, '5', '2', '-5', '36', 1, '2022-01-16 14:46:30', '2022-01-16 14:46:30'),
(56, '1', '2', '-5', '36', 1, '2022-01-16 14:46:31', '2022-01-16 14:46:31'),
(57, '3', '2', '-4', '37', 1, '2022-01-16 14:48:15', '2022-01-16 14:48:15'),
(58, '2', '2', '-2', '37', 1, '2022-01-16 14:48:15', '2022-01-16 14:48:15'),
(59, '3', '2', '-4', '38', 1, '2022-01-16 14:48:22', '2022-01-16 14:48:22'),
(60, '2', '2', '-2', '38', 1, '2022-01-16 14:48:22', '2022-01-16 14:48:22'),
(61, '2', '2', '-4', '39', 1, '2022-01-16 14:48:52', '2022-01-16 14:48:52'),
(62, '2', '2', '-2', '40', 1, '2022-01-16 14:51:34', '2022-01-16 14:51:34'),
(63, '4', '2', '-4', '41', 1, '2022-01-16 14:54:52', '2022-01-16 14:54:52'),
(64, '1', '2', '-3', '41', 1, '2022-01-16 14:54:52', '2022-01-16 14:54:52'),
(65, '5', '2', '-1', '42', 1, '2022-01-16 14:55:37', '2022-01-16 14:55:37'),
(66, '5', '2', '-1', '43', 1, '2022-01-16 14:59:44', '2022-01-16 14:59:44'),
(67, '1', '2', '-3', '43', 1, '2022-01-16 14:59:44', '2022-01-16 14:59:44'),
(68, '2', '2', '-2', '44', 1, '2022-01-16 15:00:19', '2022-01-16 15:00:19'),
(69, '5', '2', '-4', '45', 1, '2022-01-16 15:01:35', '2022-01-16 15:01:35'),
(70, '5', '2', '+10', '46', 1, '2022-01-16 15:04:06', '2022-01-16 15:04:06'),
(71, '3', '2', '+10', '46', 1, '2022-01-16 15:04:06', '2022-01-16 15:04:06'),
(72, '1', '2', '+10', '46', 1, '2022-01-16 15:04:06', '2022-01-16 15:04:06'),
(73, '2', '2', '+10', '46', 1, '2022-01-16 15:04:06', '2022-01-16 15:04:06'),
(74, '4', '2', '+10', '46', 1, '2022-01-16 15:04:06', '2022-01-16 15:04:06'),
(75, '3', '2', '+22', '47', 1, '2022-01-16 15:05:18', '2022-01-16 15:05:18'),
(76, '5', '2', '+2', '47', 1, '2022-01-16 15:05:18', '2022-01-16 15:05:18'),
(77, '5', '1', '10', '48', 1, '2022-01-16 15:08:43', '2022-01-16 15:51:14'),
(78, '5', '2', '-10', '48', 1, '2022-01-16 15:08:43', '2022-01-16 15:08:43'),
(79, '5', '2', '10', '49', 1, '2022-01-16 15:09:05', '2022-01-16 15:50:40'),
(80, '5', '1', '-10', '49', 1, '2022-01-16 15:09:05', '2022-01-16 15:09:05'),
(81, '5', '2', '12', '50', 1, '2022-01-16 15:09:25', '2022-01-16 15:50:44'),
(82, '5', '1', '-12', '50', 1, '2022-01-16 15:09:25', '2022-01-16 15:09:25'),
(83, '5', '2', '+10', '51', 1, '2022-01-16 15:48:48', '2022-01-16 15:48:48'),
(84, '5', '2', '+20', '52', 1, '2022-01-16 15:49:12', '2022-01-16 15:49:12'),
(85, '5', '1', '10', '53', 1, '2022-01-16 15:49:53', '2022-01-16 15:51:18'),
(86, '5', '2', '-10', '53', 1, '2022-01-16 15:49:53', '2022-01-16 15:49:53'),
(87, '3', '1', '-2', '54', 1, '2022-01-16 17:25:51', '2022-01-16 17:25:51'),
(88, '2', '1', '-3', '54', 1, '2022-01-16 17:25:51', '2022-01-16 17:25:51'),
(89, '3', '1', '-2', '55', 1, '2022-01-16 17:28:29', '2022-01-16 17:28:29'),
(90, '2', '1', '-3', '55', 1, '2022-01-16 17:28:29', '2022-01-16 17:28:29'),
(91, '3', '1', '-2', '56', 1, '2022-01-16 17:32:29', '2022-01-16 17:32:29'),
(92, '2', '1', '-3', '56', 1, '2022-01-16 17:32:29', '2022-01-16 17:32:29'),
(93, '3', '1', '-2', '57', 1, '2022-01-16 17:34:43', '2022-01-16 17:34:43'),
(94, '2', '1', '-3', '57', 1, '2022-01-16 17:34:43', '2022-01-16 17:34:43'),
(95, '3', '1', '-2', '58', 1, '2022-01-16 17:37:20', '2022-01-16 17:37:20'),
(96, '2', '1', '-3', '58', 1, '2022-01-16 17:37:20', '2022-01-16 17:37:20'),
(97, '3', '1', '-2', '59', 1, '2022-01-16 17:37:44', '2022-01-16 17:37:44'),
(98, '2', '1', '-3', '59', 1, '2022-01-16 17:37:44', '2022-01-16 17:37:44'),
(99, '3', '1', '-2', '60', 1, '2022-01-16 17:39:33', '2022-01-16 17:39:33'),
(100, '2', '1', '-3', '60', 1, '2022-01-16 17:39:33', '2022-01-16 17:39:33'),
(101, '3', '1', '-2', '61', 1, '2022-01-16 17:40:47', '2022-01-16 17:40:47'),
(102, '2', '1', '-3', '61', 1, '2022-01-16 17:40:47', '2022-01-16 17:40:47'),
(103, '3', '1', '-2', '62', 1, '2022-01-16 17:41:13', '2022-01-16 17:41:13'),
(104, '2', '1', '-3', '62', 1, '2022-01-16 17:41:13', '2022-01-16 17:41:13'),
(105, '3', '1', '-2', '63', 1, '2022-01-16 17:41:33', '2022-01-16 17:41:33'),
(106, '2', '1', '-3', '63', 1, '2022-01-16 17:41:33', '2022-01-16 17:41:33'),
(107, '3', '1', '-2', '64', 1, '2022-01-16 17:42:05', '2022-01-16 17:42:05'),
(108, '2', '1', '-3', '64', 1, '2022-01-16 17:42:05', '2022-01-16 17:42:05'),
(109, '3', '1', '-2', '65', 1, '2022-01-16 17:42:18', '2022-01-16 17:42:18'),
(110, '2', '1', '-3', '65', 1, '2022-01-16 17:42:18', '2022-01-16 17:42:18'),
(111, '3', '1', '-2', '66', 1, '2022-01-16 17:42:31', '2022-01-16 17:42:31'),
(112, '2', '1', '-3', '66', 1, '2022-01-16 17:42:31', '2022-01-16 17:42:31'),
(113, '3', '1', '-2', '67', 1, '2022-01-16 17:42:41', '2022-01-16 17:42:41'),
(114, '2', '1', '-3', '67', 1, '2022-01-16 17:42:41', '2022-01-16 17:42:41'),
(115, '3', '1', '-2', '68', 1, '2022-01-16 17:43:23', '2022-01-16 17:43:23'),
(116, '2', '1', '-3', '68', 1, '2022-01-16 17:43:23', '2022-01-16 17:43:23'),
(117, '3', '1', '-2', '69', 1, '2022-01-16 17:43:43', '2022-01-16 17:43:43'),
(118, '2', '1', '-3', '69', 1, '2022-01-16 17:43:43', '2022-01-16 17:43:43'),
(119, '3', '1', '-2', '70', 1, '2022-01-16 17:43:57', '2022-01-16 17:43:57'),
(120, '2', '1', '-3', '70', 1, '2022-01-16 17:43:57', '2022-01-16 17:43:57'),
(121, '3', '1', '-2', '71', 1, '2022-01-16 17:48:56', '2022-01-16 17:48:56'),
(122, '2', '1', '-3', '71', 1, '2022-01-16 17:48:56', '2022-01-16 17:48:56'),
(123, '3', '1', '-2', '72', 1, '2022-01-16 17:50:23', '2022-01-16 17:50:23'),
(124, '2', '1', '-3', '72', 1, '2022-01-16 17:50:23', '2022-01-16 17:50:23'),
(125, '3', '1', '-2', '73', 1, '2022-01-16 17:50:39', '2022-01-16 17:50:39'),
(126, '2', '1', '-3', '73', 1, '2022-01-16 17:50:39', '2022-01-16 17:50:39'),
(127, '3', '1', '-2', '74', 1, '2022-01-16 17:52:10', '2022-01-16 17:52:10'),
(128, '2', '1', '-3', '74', 1, '2022-01-16 17:52:10', '2022-01-16 17:52:10'),
(129, '3', '1', '-2', '75', 1, '2022-01-16 17:52:29', '2022-01-16 17:52:29'),
(130, '2', '1', '-3', '75', 1, '2022-01-16 17:52:29', '2022-01-16 17:52:29'),
(131, '3', '1', '-2', '76', 1, '2022-01-16 17:53:09', '2022-01-16 17:53:09'),
(132, '2', '1', '-3', '76', 1, '2022-01-16 17:53:09', '2022-01-16 17:53:09'),
(133, '3', '1', '-2', '77', 1, '2022-01-16 17:53:44', '2022-01-16 17:53:44'),
(134, '2', '1', '-3', '77', 1, '2022-01-16 17:53:44', '2022-01-16 17:53:44'),
(135, '3', '1', '-2', '78', 1, '2022-01-16 17:56:43', '2022-01-16 17:56:43'),
(136, '2', '1', '-3', '78', 1, '2022-01-16 17:56:43', '2022-01-16 17:56:43'),
(137, '3', '1', '-2', '79', 1, '2022-01-16 17:57:29', '2022-01-16 17:57:29'),
(138, '2', '1', '-3', '79', 1, '2022-01-16 17:57:29', '2022-01-16 17:57:29'),
(139, '3', '1', '-2', '82', 1, '2022-01-16 18:09:17', '2022-01-16 18:09:17'),
(140, '2', '1', '-3', '82', 1, '2022-01-16 18:09:17', '2022-01-16 18:09:17'),
(141, '3', '1', '-2', '83', 1, '2022-01-16 18:10:03', '2022-01-16 18:10:03'),
(142, '2', '1', '-3', '83', 1, '2022-01-16 18:10:03', '2022-01-16 18:10:03'),
(143, '3', '1', '-2', '84', 1, '2022-01-16 18:11:07', '2022-01-16 18:11:07'),
(144, '2', '1', '-3', '84', 1, '2022-01-16 18:11:07', '2022-01-16 18:11:07'),
(145, '3', '1', '-2', '85', 1, '2022-01-16 18:11:28', '2022-01-16 18:11:28'),
(146, '2', '1', '-3', '85', 1, '2022-01-16 18:11:28', '2022-01-16 18:11:28'),
(147, '3', '1', '-2', '86', 1, '2022-01-16 18:12:24', '2022-01-16 18:12:24'),
(148, '2', '1', '-3', '86', 1, '2022-01-16 18:12:24', '2022-01-16 18:12:24'),
(149, '3', '1', '-2', '87', 1, '2022-01-16 18:13:06', '2022-01-16 18:13:06'),
(150, '2', '1', '-3', '87', 1, '2022-01-16 18:13:06', '2022-01-16 18:13:06'),
(151, '3', '1', '-2', '88', 1, '2022-01-16 18:13:40', '2022-01-16 18:13:40'),
(152, '2', '1', '-3', '88', 1, '2022-01-16 18:13:40', '2022-01-16 18:13:40'),
(153, '3', '1', '-2', '89', 1, '2022-01-16 18:14:00', '2022-01-16 18:14:00'),
(154, '2', '1', '-3', '89', 1, '2022-01-16 18:14:00', '2022-01-16 18:14:00'),
(155, '3', '1', '-2', '90', 1, '2022-01-16 18:14:38', '2022-01-16 18:14:38'),
(156, '2', '1', '-3', '90', 1, '2022-01-16 18:14:38', '2022-01-16 18:14:38'),
(157, '3', '1', '-2', '91', 1, '2022-01-16 18:15:07', '2022-01-16 18:15:07'),
(158, '2', '1', '-3', '91', 1, '2022-01-16 18:15:07', '2022-01-16 18:15:07'),
(159, '3', '1', '-2', '92', 1, '2022-01-16 18:15:40', '2022-01-16 18:15:40'),
(160, '2', '1', '-3', '92', 1, '2022-01-16 18:15:40', '2022-01-16 18:15:40'),
(161, '3', '1', '-2', '93', 1, '2022-01-16 18:16:16', '2022-01-16 18:16:16'),
(162, '2', '1', '-3', '93', 1, '2022-01-16 18:16:16', '2022-01-16 18:16:16'),
(163, '3', '1', '-2', '94', 1, '2022-01-16 18:16:32', '2022-01-16 18:16:32'),
(164, '2', '1', '-3', '94', 1, '2022-01-16 18:16:32', '2022-01-16 18:16:32'),
(165, '3', '1', '-2', '95', 1, '2022-01-16 18:18:34', '2022-01-16 18:18:34'),
(166, '2', '1', '-3', '95', 1, '2022-01-16 18:18:34', '2022-01-16 18:18:34'),
(167, '3', '1', '-2', '96', 1, '2022-01-16 18:18:48', '2022-01-16 18:18:48'),
(168, '2', '1', '-3', '96', 1, '2022-01-16 18:18:48', '2022-01-16 18:18:48'),
(169, '3', '1', '-2', '97', 1, '2022-01-16 18:18:58', '2022-01-16 18:18:58'),
(170, '2', '1', '-3', '97', 1, '2022-01-16 18:18:58', '2022-01-16 18:18:58'),
(171, '3', '1', '-2', '98', 1, '2022-01-16 18:23:21', '2022-01-16 18:23:21'),
(172, '2', '1', '-3', '98', 1, '2022-01-16 18:23:21', '2022-01-16 18:23:21'),
(173, '3', '1', '-2', '99', 1, '2022-01-16 18:23:41', '2022-01-16 18:23:41'),
(174, '2', '1', '-3', '99', 1, '2022-01-16 18:23:41', '2022-01-16 18:23:41'),
(175, '3', '1', '-2', '100', 1, '2022-01-16 18:24:14', '2022-01-16 18:24:14'),
(176, '2', '1', '-3', '100', 1, '2022-01-16 18:24:14', '2022-01-16 18:24:14'),
(177, '3', '1', '-2', '101', 1, '2022-01-16 18:26:10', '2022-01-16 18:26:10'),
(178, '2', '1', '-3', '101', 1, '2022-01-16 18:26:10', '2022-01-16 18:26:10'),
(179, '3', '1', '-2', '102', 1, '2022-01-16 18:26:26', '2022-01-16 18:26:26'),
(180, '2', '1', '-3', '102', 1, '2022-01-16 18:26:26', '2022-01-16 18:26:26'),
(181, '3', '1', '-2', '103', 1, '2022-01-16 18:27:00', '2022-01-16 18:27:00'),
(182, '2', '1', '-3', '103', 1, '2022-01-16 18:27:00', '2022-01-16 18:27:00'),
(183, '3', '1', '-2', '104', 1, '2022-01-16 18:45:13', '2022-01-16 18:45:13'),
(184, '2', '1', '-3', '104', 1, '2022-01-16 18:45:13', '2022-01-16 18:45:13'),
(185, '3', '1', '-2', '105', 1, '2022-01-16 18:45:43', '2022-01-16 18:45:43'),
(186, '2', '1', '-3', '105', 1, '2022-01-16 18:45:43', '2022-01-16 18:45:43'),
(187, '3', '1', '-2', '106', 1, '2022-01-16 18:46:01', '2022-01-16 18:46:01'),
(188, '2', '1', '-3', '106', 1, '2022-01-16 18:46:01', '2022-01-16 18:46:01'),
(189, '3', '1', '-2', '107', 1, '2022-01-16 18:47:21', '2022-01-16 18:47:21'),
(190, '2', '1', '-3', '107', 1, '2022-01-16 18:47:21', '2022-01-16 18:47:21'),
(191, '3', '1', '-2', '108', 1, '2022-01-16 18:47:36', '2022-01-16 18:47:36'),
(192, '2', '1', '-3', '108', 1, '2022-01-16 18:47:36', '2022-01-16 18:47:36'),
(193, '3', '1', '-2', '109', 1, '2022-01-16 18:47:56', '2022-01-16 18:47:56'),
(194, '2', '1', '-3', '109', 1, '2022-01-16 18:47:56', '2022-01-16 18:47:56'),
(195, '3', '1', '-2', '110', 1, '2022-01-16 18:50:11', '2022-01-16 18:50:11'),
(196, '2', '1', '-3', '110', 1, '2022-01-16 18:50:11', '2022-01-16 18:50:11'),
(197, '3', '1', '-2', '111', 1, '2022-01-16 18:50:45', '2022-01-16 18:50:45'),
(198, '2', '1', '-3', '111', 1, '2022-01-16 18:50:45', '2022-01-16 18:50:45'),
(199, '3', '1', '-2', '112', 1, '2022-01-16 18:52:43', '2022-01-16 18:52:43'),
(200, '2', '1', '-3', '112', 1, '2022-01-16 18:52:43', '2022-01-16 18:52:43'),
(201, '3', '1', '-2', '113', 1, '2022-01-16 18:53:03', '2022-01-16 18:53:03'),
(202, '2', '1', '-3', '113', 1, '2022-01-16 18:53:03', '2022-01-16 18:53:03'),
(203, '3', '1', '-2', '114', 1, '2022-01-16 18:56:19', '2022-01-16 18:56:19'),
(204, '2', '1', '-3', '114', 1, '2022-01-16 18:56:19', '2022-01-16 18:56:19'),
(205, '3', '1', '-2', '115', 1, '2022-01-16 18:57:03', '2022-01-16 18:57:03'),
(206, '2', '1', '-3', '115', 1, '2022-01-16 18:57:03', '2022-01-16 18:57:03'),
(207, '3', '1', '-2', '116', 1, '2022-01-16 18:57:29', '2022-01-16 18:57:29'),
(208, '2', '1', '-3', '116', 1, '2022-01-16 18:57:29', '2022-01-16 18:57:29'),
(209, '3', '1', '-2', '117', 1, '2022-01-16 18:58:30', '2022-01-16 18:58:30'),
(210, '2', '1', '-3', '117', 1, '2022-01-16 18:58:30', '2022-01-16 18:58:30'),
(211, '3', '1', '-2', '119', 1, '2022-01-17 09:24:52', '2022-01-17 09:24:52'),
(212, '3', '1', '-2', '120', 1, '2022-01-17 09:25:33', '2022-01-17 09:25:33'),
(213, '3', '1', '-2', '121', 1, '2022-01-17 09:26:03', '2022-01-17 09:26:03'),
(214, '3', '1', '-2', '122', 1, '2022-01-17 09:26:31', '2022-01-17 09:26:31'),
(215, '3', '1', '-2', '123', 1, '2022-01-17 09:26:56', '2022-01-17 09:26:56'),
(216, '3', '1', '-2', '124', 1, '2022-01-17 09:27:46', '2022-01-17 09:27:46'),
(217, '1', '1', '-2', '124', 1, '2022-01-17 09:27:46', '2022-01-17 09:27:46'),
(218, '5', '1', '-3', '125', 1, '2022-01-17 09:28:21', '2022-01-17 09:28:21'),
(219, '1', '1', '-2', '125', 1, '2022-01-17 09:28:21', '2022-01-17 09:28:21'),
(220, '5', '1', '-2', '126', 1, '2022-01-17 09:33:25', '2022-01-17 09:33:25'),
(221, '5', '1', '-3', '126', 1, '2022-01-17 09:33:25', '2022-01-17 09:33:25'),
(222, '5', '1', '-2', '127', 1, '2022-01-17 09:36:01', '2022-01-17 09:36:01'),
(223, '5', '1', '-3', '127', 1, '2022-01-17 09:36:01', '2022-01-17 09:36:01'),
(224, '5', '1', '-2', '128', 1, '2022-01-17 09:38:30', '2022-01-17 09:38:30'),
(225, '5', '1', '-3', '128', 1, '2022-01-17 09:38:30', '2022-01-17 09:38:30'),
(226, '5', '1', '-1', '129', 1, '2022-01-17 09:39:05', '2022-01-17 09:39:05'),
(227, '1', '1', '-1', '129', 1, '2022-01-17 09:39:05', '2022-01-17 09:39:05'),
(228, '5', '1', '-1', '130', 1, '2022-01-17 09:39:41', '2022-01-17 09:39:41'),
(229, '1', '1', '-1', '130', 1, '2022-01-17 09:39:41', '2022-01-17 09:39:41'),
(230, '5', '1', '-1', '131', 1, '2022-01-17 09:40:03', '2022-01-17 09:40:03'),
(231, '1', '1', '-1', '131', 1, '2022-01-17 09:40:03', '2022-01-17 09:40:03'),
(232, '5', '1', '-1', '132', 1, '2022-01-17 09:40:22', '2022-01-17 09:40:22'),
(233, '1', '1', '-1', '132', 1, '2022-01-17 09:40:22', '2022-01-17 09:40:22'),
(234, '5', '1', '-1', '133', 1, '2022-01-17 09:40:50', '2022-01-17 09:40:50'),
(235, '1', '1', '-1', '133', 1, '2022-01-17 09:40:50', '2022-01-17 09:40:50'),
(236, '5', '1', '-1', '134', 1, '2022-01-17 09:41:16', '2022-01-17 09:41:16'),
(237, '1', '1', '-1', '134', 1, '2022-01-17 09:41:16', '2022-01-17 09:41:16'),
(238, '5', '1', '-1', '135', 1, '2022-01-17 09:41:41', '2022-01-17 09:41:41'),
(239, '1', '1', '-1', '135', 1, '2022-01-17 09:41:41', '2022-01-17 09:41:41'),
(240, '5', '1', '-1', '136', 1, '2022-01-17 09:43:19', '2022-01-17 09:43:19'),
(241, '1', '1', '-1', '136', 1, '2022-01-17 09:43:19', '2022-01-17 09:43:19'),
(242, '5', '1', '-1', '137', 1, '2022-01-17 09:44:01', '2022-01-17 09:44:01'),
(243, '1', '1', '-1', '137', 1, '2022-01-17 09:44:01', '2022-01-17 09:44:01'),
(244, '5', '1', '-1', '138', 1, '2022-01-17 09:44:44', '2022-01-17 09:44:44'),
(245, '1', '1', '-1', '138', 1, '2022-01-17 09:44:44', '2022-01-17 09:44:44'),
(246, '5', '1', '-1', '139', 1, '2022-01-17 09:45:40', '2022-01-17 09:45:40'),
(247, '1', '1', '-1', '139', 1, '2022-01-17 09:45:40', '2022-01-17 09:45:40'),
(248, '5', '1', '-1', '140', 1, '2022-01-17 09:45:54', '2022-01-17 09:45:54'),
(249, '1', '1', '-1', '140', 1, '2022-01-17 09:45:54', '2022-01-17 09:45:54'),
(250, '5', '1', '-1', '141', 1, '2022-01-17 09:46:38', '2022-01-17 09:46:38'),
(251, '1', '1', '-1', '141', 1, '2022-01-17 09:46:38', '2022-01-17 09:46:38'),
(252, '5', '1', '-1', '142', 1, '2022-01-17 09:51:02', '2022-01-17 09:51:02'),
(253, '1', '1', '-1', '142', 1, '2022-01-17 09:51:02', '2022-01-17 09:51:02'),
(254, '5', '1', '-1', '143', 1, '2022-01-17 09:51:30', '2022-01-17 09:51:30'),
(255, '1', '1', '-1', '143', 1, '2022-01-17 09:51:30', '2022-01-17 09:51:30'),
(256, '5', '1', '-1', '144', 1, '2022-01-17 09:55:39', '2022-01-17 09:55:39'),
(257, '1', '1', '-1', '144', 1, '2022-01-17 09:55:39', '2022-01-17 09:55:39'),
(258, '5', '1', '-1', '145', 1, '2022-01-17 09:55:57', '2022-01-17 09:55:57'),
(259, '1', '1', '-1', '145', 1, '2022-01-17 09:55:57', '2022-01-17 09:55:57'),
(260, '5', '1', '-1', '146', 1, '2022-01-17 09:56:32', '2022-01-17 09:56:32'),
(261, '1', '1', '-1', '146', 1, '2022-01-17 09:56:32', '2022-01-17 09:56:32'),
(262, '5', '1', '-1', '147', 1, '2022-01-17 10:10:20', '2022-01-17 10:10:20'),
(263, '1', '1', '-1', '147', 1, '2022-01-17 10:10:20', '2022-01-17 10:10:20'),
(264, '3', '1', '-1', '148', 1, '2022-01-17 10:11:11', '2022-01-17 10:11:11'),
(265, '5', '1', '-1', '148', 1, '2022-01-17 10:11:11', '2022-01-17 10:11:11'),
(266, '1', '1', '-1', '148', 1, '2022-01-17 10:11:11', '2022-01-17 10:11:11'),
(267, '2', '1', '-1', '148', 1, '2022-01-17 10:11:11', '2022-01-17 10:11:11'),
(268, '4', '1', '-1', '148', 1, '2022-01-17 10:11:11', '2022-01-17 10:11:11'),
(269, '5', '1', '-2', '149', 1, '2022-01-17 10:12:48', '2022-01-17 10:12:48'),
(270, '3', '1', '-2', '149', 1, '2022-01-17 10:12:48', '2022-01-17 10:12:48'),
(271, '1', '1', '-4', '149', 1, '2022-01-17 10:12:48', '2022-01-17 10:12:48'),
(272, '2', '1', '-5', '149', 1, '2022-01-17 10:12:48', '2022-01-17 10:12:48'),
(273, '4', '1', '-2', '149', 1, '2022-01-17 10:12:48', '2022-01-17 10:12:48'),
(274, '5', '1', '-2', '150', 1, '2022-01-17 10:13:26', '2022-01-17 10:13:26'),
(275, '3', '1', '-2', '150', 1, '2022-01-17 10:13:26', '2022-01-17 10:13:26'),
(276, '1', '1', '-4', '150', 1, '2022-01-17 10:13:26', '2022-01-17 10:13:26'),
(277, '2', '1', '-5', '150', 1, '2022-01-17 10:13:26', '2022-01-17 10:13:26'),
(278, '4', '1', '-2', '150', 1, '2022-01-17 10:13:26', '2022-01-17 10:13:26'),
(279, '5', '1', '-2', '151', 1, '2022-01-17 10:13:58', '2022-01-17 10:13:58'),
(280, '3', '1', '-2', '151', 1, '2022-01-17 10:13:58', '2022-01-17 10:13:58'),
(281, '1', '1', '-4', '151', 1, '2022-01-17 10:13:58', '2022-01-17 10:13:58'),
(282, '2', '1', '-5', '151', 1, '2022-01-17 10:13:58', '2022-01-17 10:13:58'),
(283, '4', '1', '-2', '151', 1, '2022-01-17 10:13:58', '2022-01-17 10:13:58'),
(284, '5', '1', '-2', '152', 1, '2022-01-17 10:14:31', '2022-01-17 10:14:31'),
(285, '3', '1', '-2', '152', 1, '2022-01-17 10:14:31', '2022-01-17 10:14:31'),
(286, '1', '1', '-4', '152', 1, '2022-01-17 10:14:31', '2022-01-17 10:14:31'),
(287, '2', '1', '-5', '152', 1, '2022-01-17 10:14:31', '2022-01-17 10:14:31'),
(288, '4', '1', '-2', '152', 1, '2022-01-17 10:14:31', '2022-01-17 10:14:31'),
(289, '5', '1', '-2', '153', 1, '2022-01-17 10:14:53', '2022-01-17 10:14:53'),
(290, '3', '1', '-2', '153', 1, '2022-01-17 10:14:53', '2022-01-17 10:14:53'),
(291, '1', '1', '-4', '153', 1, '2022-01-17 10:14:53', '2022-01-17 10:14:53'),
(292, '2', '1', '-5', '153', 1, '2022-01-17 10:14:53', '2022-01-17 10:14:53'),
(293, '4', '1', '-2', '153', 1, '2022-01-17 10:14:53', '2022-01-17 10:14:53'),
(294, '5', '1', '-2', '154', 1, '2022-01-17 10:15:18', '2022-01-17 10:15:18'),
(295, '3', '1', '-2', '154', 1, '2022-01-17 10:15:18', '2022-01-17 10:15:18'),
(296, '1', '1', '-4', '154', 1, '2022-01-17 10:15:18', '2022-01-17 10:15:18'),
(297, '2', '1', '-5', '154', 1, '2022-01-17 10:15:18', '2022-01-17 10:15:18'),
(298, '4', '1', '-2', '154', 1, '2022-01-17 10:15:18', '2022-01-17 10:15:18'),
(299, '5', '1', '-2', '155', 1, '2022-01-17 10:17:16', '2022-01-17 10:17:16'),
(300, '3', '1', '-2', '155', 1, '2022-01-17 10:17:16', '2022-01-17 10:17:16'),
(301, '1', '1', '-4', '155', 1, '2022-01-17 10:17:16', '2022-01-17 10:17:16'),
(302, '2', '1', '-5', '155', 1, '2022-01-17 10:17:16', '2022-01-17 10:17:16'),
(303, '4', '1', '-2', '155', 1, '2022-01-17 10:17:16', '2022-01-17 10:17:16'),
(304, '5', '1', '-2', '156', 1, '2022-01-17 10:17:38', '2022-01-17 10:17:38'),
(305, '3', '1', '-2', '156', 1, '2022-01-17 10:17:38', '2022-01-17 10:17:38'),
(306, '1', '1', '-4', '156', 1, '2022-01-17 10:17:38', '2022-01-17 10:17:38'),
(307, '2', '1', '-5', '156', 1, '2022-01-17 10:17:38', '2022-01-17 10:17:38'),
(308, '4', '1', '-2', '156', 1, '2022-01-17 10:17:38', '2022-01-17 10:17:38'),
(309, '5', '1', '-2', '157', 1, '2022-01-17 10:17:57', '2022-01-17 10:17:57'),
(310, '3', '1', '-2', '157', 1, '2022-01-17 10:17:57', '2022-01-17 10:17:57'),
(311, '1', '1', '-4', '157', 1, '2022-01-17 10:17:57', '2022-01-17 10:17:57'),
(312, '2', '1', '-5', '157', 1, '2022-01-17 10:17:57', '2022-01-17 10:17:57'),
(313, '4', '1', '-2', '157', 1, '2022-01-17 10:17:57', '2022-01-17 10:17:57'),
(314, '5', '1', '-2', '158', 1, '2022-01-17 10:18:10', '2022-01-17 10:18:10'),
(315, '3', '1', '-2', '158', 1, '2022-01-17 10:18:10', '2022-01-17 10:18:10'),
(316, '1', '1', '-4', '158', 1, '2022-01-17 10:18:10', '2022-01-17 10:18:10'),
(317, '2', '1', '-5', '158', 1, '2022-01-17 10:18:10', '2022-01-17 10:18:10'),
(318, '4', '1', '-2', '158', 1, '2022-01-17 10:18:10', '2022-01-17 10:18:10'),
(319, '5', '1', '-2', '159', 1, '2022-01-17 10:18:31', '2022-01-17 10:18:31'),
(320, '5', '1', '-2', '160', 1, '2022-01-17 10:21:03', '2022-01-17 10:21:03'),
(321, '5', '1', '-2', '161', 1, '2022-01-17 10:22:07', '2022-01-17 10:22:07'),
(322, '5', '1', '-2', '162', 1, '2022-01-17 10:22:22', '2022-01-17 10:22:22'),
(323, '5', '1', '-2', '163', 1, '2022-01-17 10:23:03', '2022-01-17 10:23:03'),
(324, '5', '1', '-2', '164', 1, '2022-01-17 10:27:06', '2022-01-17 10:27:06'),
(325, '3', '1', '-3', '165', 1, '2022-01-18 06:38:05', '2022-01-18 06:38:05'),
(326, '1', '1', '-2', '165', 1, '2022-01-18 06:38:05', '2022-01-18 06:38:05'),
(327, '5', '1', '-3', '167', 1, '2022-01-18 06:44:41', '2022-01-18 06:44:41'),
(328, '2', '1', '-3', '167', 1, '2022-01-18 06:44:41', '2022-01-18 06:44:41'),
(329, '1', '1', '+200', '168', 1, '2022-01-18 06:49:01', '2022-01-18 06:49:01'),
(330, '2', '1', '+200', '168', 1, '2022-01-18 06:49:02', '2022-01-18 06:49:02'),
(331, '3', '1', '+200', '168', 1, '2022-01-18 06:49:02', '2022-01-18 06:49:02'),
(332, '5', '1', '+200', '168', 1, '2022-01-18 06:49:02', '2022-01-18 06:49:02'),
(333, '2', '1', '+10', '169', 1, '2022-01-18 07:16:32', '2022-01-18 07:16:32'),
(334, '1', '2', '10', '170', 1, '2022-01-18 08:19:18', '2022-01-18 08:29:57'),
(335, '1', '1', '-10', '170', 1, '2022-01-18 08:19:18', '2022-01-18 08:19:18'),
(336, '1', '2', '34', '171', 1, '2022-01-18 08:22:09', '2022-01-18 08:30:06'),
(337, '1', '1', '-34', '171', 1, '2022-01-18 08:22:09', '2022-01-18 08:22:09'),
(338, '7', '2', '+121', '172', 1, '2022-01-18 10:43:24', '2022-01-18 10:43:24'),
(339, '7', '1', '50', '173', 1, '2022-01-18 10:44:02', '2022-01-18 10:45:12'),
(340, '7', '2', '-50', '173', 1, '2022-01-18 10:44:02', '2022-01-18 10:44:02'),
(341, '7', '3', '20', '174', 1, '2022-01-18 10:46:35', '2022-01-18 10:47:52'),
(342, '7', '2', '-20', '174', 1, '2022-01-18 10:46:35', '2022-01-18 10:46:35'),
(343, '3', '3', '-1', '175', 1, '2022-01-19 05:53:16', '2022-01-19 05:53:16'),
(344, '7', '3', '-1', '175', 1, '2022-01-19 05:53:16', '2022-01-19 05:53:16'),
(345, '5', '3', '-1', '175', 1, '2022-01-19 05:53:16', '2022-01-19 05:53:16'),
(346, '1', '3', '-1', '175', 1, '2022-01-19 05:53:16', '2022-01-19 05:53:16'),
(347, '2', '3', '-1', '175', 1, '2022-01-19 05:53:16', '2022-01-19 05:53:16'),
(348, '4', '3', '-1', '175', 1, '2022-01-19 05:53:16', '2022-01-19 05:53:16'),
(349, '3', '3', '-1', '178', 1, '2022-01-19 05:56:17', '2022-01-19 05:56:17'),
(350, '7', '3', '-1', '178', 1, '2022-01-19 05:56:17', '2022-01-19 05:56:17'),
(351, '4', '3', '-2', '178', 1, '2022-01-19 05:56:17', '2022-01-19 05:56:17'),
(352, '3', '3', '-2', '179', 1, '2022-01-19 07:07:18', '2022-01-19 07:07:18'),
(353, '1', '3', '-3', '179', 1, '2022-01-19 07:07:18', '2022-01-19 07:07:18'),
(354, '2', '3', '-1', '179', 1, '2022-01-19 07:07:18', '2022-01-19 07:07:18'),
(355, '7', '3', '-3', '180', 1, '2022-01-19 08:08:02', '2022-01-19 08:08:02'),
(356, '2', '3', '-2', '180', 1, '2022-01-19 08:08:02', '2022-01-19 08:08:02'),
(357, '3', '3', '-1', '181', 1, '2022-01-19 10:06:28', '2022-01-19 10:06:28'),
(358, '5', '3', '-2', '181', 1, '2022-01-19 10:06:28', '2022-01-19 10:06:28'),
(359, '2', '3', '-3', '181', 1, '2022-01-19 10:06:28', '2022-01-19 10:06:28'),
(360, '4', '0', '3', '197', 1, '2022-01-21 09:01:32', '2022-01-21 09:01:32'),
(361, '4', '0', '2', '197', 1, '2022-01-21 09:01:32', '2022-01-21 09:01:32'),
(362, '4', '0', '3', '198', 1, '2022-01-21 09:14:02', '2022-01-21 09:14:02'),
(363, '4', '0', '4', '199', 1, '2022-01-21 09:17:08', '2022-01-21 09:17:08'),
(364, '2', '0', '4', '200', 1, '2022-01-21 09:29:30', '2022-01-21 09:29:30'),
(365, '4', '0', '4', '200', 1, '2022-01-21 09:29:30', '2022-01-21 09:29:30'),
(366, '1', '0', '100', '202', 1, '2022-01-21 09:33:00', '2022-01-21 09:33:00'),
(367, '1', '0', '32', '203', 1, '2022-01-21 09:37:15', '2022-01-23 06:52:03'),
(368, '1', '0', '10', '204', 1, '2022-01-21 09:42:36', '2022-01-23 06:52:18'),
(369, '7', '0', '20', '205', 1, '2022-01-21 10:04:55', '2022-01-23 07:43:27'),
(370, '1', '0', '23', '205', 1, '2022-01-21 10:04:55', '2022-01-23 06:54:03'),
(371, '4', '0', '53', '205', 1, '2022-01-21 10:04:55', '2022-01-23 07:43:22'),
(372, '2', '0', '83', '205', 1, '2022-01-21 10:04:55', '2022-01-23 06:54:08'),
(373, '5', '0', '54', '205', 1, '2022-01-21 10:04:55', '2022-01-23 06:54:13'),
(374, '3', '0', '4', '205', 1, '2022-01-21 10:04:55', '2022-01-23 06:54:11'),
(375, '1', '3', '30', '206', 1, '2022-01-23 06:55:03', '2022-01-23 06:55:42'),
(376, '1', '0', '-30', '206', 1, '2022-01-23 06:55:03', '2022-01-23 06:55:03'),
(377, '3', '0', '12', '207', 1, '2022-01-23 07:45:12', '2022-01-23 09:27:08'),
(378, '2', '0', '15', '207', 1, '2022-01-23 07:45:12', '2022-01-23 09:27:13'),
(379, '5', '3', '50', '208', 1, '2022-01-23 08:04:05', '2022-01-23 08:05:38'),
(380, '5', '1', '-50', '208', 1, '2022-01-23 08:04:05', '2022-01-23 08:04:05'),
(381, '7', '3', '-10', '209', 1, '2022-01-23 09:30:26', '2022-01-23 09:30:26'),
(382, '2', '3', '-12', '209', 1, '2022-01-23 09:30:26', '2022-01-23 09:30:26'),
(383, '2', '3', '-14', '209', 1, '2022-01-23 09:30:26', '2022-01-23 09:30:26'),
(384, '2', '3', '-13', '209', 1, '2022-01-23 09:30:26', '2022-01-23 09:30:26'),
(385, '3', '0', '200', '210', 1, '2022-01-23 09:45:02', '2022-01-23 09:46:12'),
(386, '7', '0', '200', '210', 1, '2022-01-23 09:45:02', '2022-01-23 09:46:16'),
(387, '5', '0', '200', '210', 1, '2022-01-23 09:45:02', '2022-01-23 09:46:19'),
(388, '1', '0', '200', '210', 1, '2022-01-23 09:45:02', '2022-01-23 09:46:23'),
(389, '2', '0', '200', '210', 1, '2022-01-23 09:45:02', '2022-01-23 09:46:26'),
(390, '4', '0', '200', '210', 1, '2022-01-23 09:45:02', '2022-01-23 09:46:30'),
(391, '3', '3', '50', '211', 1, '2022-01-23 09:47:55', '2022-01-23 09:48:36'),
(392, '3', '0', '-50', '211', 1, '2022-01-23 09:47:55', '2022-01-23 09:47:55'),
(393, '7', '3', '50', '211', 1, '2022-01-23 09:47:55', '2022-01-23 09:49:42'),
(394, '7', '0', '-50', '211', 1, '2022-01-23 09:47:55', '2022-01-23 09:47:55'),
(395, '5', '3', '50', '211', 1, '2022-01-23 09:47:55', '2022-01-23 09:50:01'),
(396, '5', '0', '-50', '211', 1, '2022-01-23 09:47:55', '2022-01-23 09:47:55'),
(397, '1', '3', '50', '211', 1, '2022-01-23 09:47:55', '2022-01-23 09:50:10'),
(398, '1', '0', '-50', '211', 1, '2022-01-23 09:47:55', '2022-01-23 09:47:55'),
(399, '2', '3', '50', '211', 1, '2022-01-23 09:47:55', '2022-01-23 09:50:04'),
(400, '2', '0', '-50', '211', 1, '2022-01-23 09:47:55', '2022-01-23 09:47:55'),
(401, '4', '3', '50', '211', 1, '2022-01-23 09:47:55', '2022-01-23 09:50:07'),
(402, '4', '0', '-50', '211', 1, '2022-01-23 09:47:55', '2022-01-23 09:47:55'),
(403, '4', '0', '100', '212', 1, '2022-01-23 17:12:14', '2022-01-23 17:18:06'),
(404, '3', '3', '-10', '213', 1, '2022-01-24 06:43:16', '2022-01-24 06:43:16'),
(405, '7', '3', '-10', '213', 1, '2022-01-24 06:43:16', '2022-01-24 06:43:16'),
(406, '5', '3', '-10', '213', 1, '2022-01-24 06:43:16', '2022-01-24 06:43:16'),
(407, '1', '3', '-10', '213', 1, '2022-01-24 06:43:16', '2022-01-24 06:43:16'),
(408, '4', '3', '-10', '213', 1, '2022-01-24 06:43:16', '2022-01-24 06:43:16'),
(409, '4', '1', '30', '214', 1, '2022-01-24 07:11:44', '2022-01-24 07:12:06'),
(410, '4', '0', '-30', '214', 1, '2022-01-24 07:11:44', '2022-01-24 07:11:44'),
(411, '3', '1', '-30', '215', 1, '2022-01-24 07:15:48', '2022-01-24 07:15:48'),
(412, '7', '1', '-30', '215', 1, '2022-01-24 07:15:48', '2022-01-24 07:15:48'),
(413, '5', '1', '-30', '215', 1, '2022-01-24 07:15:48', '2022-01-24 07:15:48'),
(414, '1', '1', '-30', '215', 1, '2022-01-24 07:15:48', '2022-01-24 07:15:48'),
(415, '2', '1', '-30', '215', 1, '2022-01-24 07:15:48', '2022-01-24 07:15:48'),
(416, '4', '1', '-30', '215', 1, '2022-01-24 07:15:48', '2022-01-24 07:15:48'),
(417, '3', '2', '-4', '226', 1, '2022-01-25 04:40:09', '2022-01-25 04:40:09'),
(418, '2', '2', '-3', '226', 1, '2022-01-25 04:40:09', '2022-01-25 04:40:09'),
(419, '3', '2', '-10', '227', 1, '2022-01-25 04:52:04', '2022-01-25 04:52:04'),
(420, '4', '2', '-10', '227', 1, '2022-01-25 04:52:04', '2022-01-25 04:52:04'),
(421, '7', '2', '-10', '227', 1, '2022-01-25 04:52:04', '2022-01-25 04:52:04'),
(422, '1', '2', '-10', '227', 1, '2022-01-25 04:52:04', '2022-01-25 04:52:04'),
(423, '2', '2', '-10', '227', 1, '2022-01-25 04:52:04', '2022-01-25 04:52:04'),
(424, '5', '2', '-10', '227', 1, '2022-01-25 04:52:04', '2022-01-25 04:52:04'),
(425, '1', '2', '-12', '228', 0, '2022-01-25 04:53:38', '2022-01-25 04:53:38'),
(426, '2', '2', '-10', '228', 0, '2022-01-25 04:53:38', '2022-01-25 04:53:38'),
(427, '5', '2', '-51', '229', 0, '2022-01-25 08:37:47', '2022-01-25 08:37:47'),
(428, '4', '2', '-61', '229', 0, '2022-01-25 08:37:47', '2022-01-25 08:37:47'),
(429, '4', '2', '-71', '229', 0, '2022-01-25 08:37:47', '2022-01-25 08:37:47'),
(430, '1', '2', '-23', '230', 0, '2022-01-25 09:26:13', '2022-01-25 09:26:13'),
(431, '4', '2', '-21', '230', 0, '2022-01-25 09:26:13', '2022-01-25 09:26:13'),
(432, '1', '2', '-20', '230', 0, '2022-01-25 09:26:13', '2022-01-25 09:26:13'),
(433, '4', '2', '-10', '231', 1, '2022-01-25 09:44:56', '2022-01-25 09:44:56'),
(434, '5', '2', '-15', '231', 1, '2022-01-25 09:44:56', '2022-01-25 09:44:56'),
(435, '1', '2', '-3', '232', 1, '2022-01-25 09:45:44', '2022-01-25 09:45:44'),
(436, '4', '2', '-20', '232', 1, '2022-01-25 09:45:44', '2022-01-25 09:45:44'),
(437, '3', '1', '-3', '233', 1, '2022-01-26 04:49:44', '2022-01-26 04:49:44'),
(438, '5', '1', '-3', '233', 1, '2022-01-26 04:49:44', '2022-01-26 04:49:44'),
(439, '1', '1', '-10', '234', 1, '2022-01-26 05:10:16', '2022-01-26 05:10:16'),
(440, '7', '1', '-15', '234', 1, '2022-01-26 05:10:16', '2022-01-26 05:10:16'),
(441, '2', '1', '-1', '235', 1, '2022-01-26 08:40:54', '2022-01-26 08:40:54'),
(442, '1', '1', '-4', '236', 0, '2022-01-26 09:36:45', '2022-01-26 09:36:45'),
(443, '2', '1', '-5', '236', 0, '2022-01-26 09:36:45', '2022-01-26 09:36:45'),
(444, '4', '1', '-4', '236', 0, '2022-01-26 09:36:45', '2022-01-26 09:36:45'),
(445, '3', '1', '-10', '237', 0, '2022-01-27 05:10:12', '2022-01-27 05:10:12'),
(446, '4', '1', '-10', '237', 0, '2022-01-27 05:10:12', '2022-01-27 05:10:12'),
(447, '1', '1', '-10', '237', 0, '2022-01-27 05:10:12', '2022-01-27 05:10:12'),
(448, '4', '1', '-2', '238', 1, '2022-01-27 06:12:49', '2022-01-27 06:12:49'),
(449, '2', '1', '-3', '238', 1, '2022-01-27 06:12:49', '2022-01-27 06:12:49'),
(450, '3', '1', '-3', '238', 1, '2022-01-27 06:12:49', '2022-01-27 06:12:49'),
(451, '3', '1', '-4', '239', 1, '2022-01-27 06:20:43', '2022-01-27 06:20:43'),
(452, '2', '1', '-14', '239', 1, '2022-01-27 06:20:43', '2022-01-27 06:20:43'),
(453, '2', '1', '-5', '239', 1, '2022-01-27 06:20:43', '2022-01-27 06:20:43'),
(454, '2', '1', '-10', '240', 1, '2022-01-27 07:04:03', '2022-01-27 07:04:03'),
(455, '4', '1', '-10', '240', 1, '2022-01-27 07:04:03', '2022-01-27 07:04:03'),
(456, '2', '1', '-10', '240', 1, '2022-01-27 07:04:03', '2022-01-27 07:04:03'),
(457, '5', '1', '-3', '241', 1, '2022-01-27 09:02:00', '2022-01-27 09:02:00'),
(458, '3', '1', '-7', '241', 1, '2022-01-27 09:02:00', '2022-01-27 09:02:00'),
(459, '1', '1', '-2', '242', 1, '2022-02-01 06:49:37', '2022-02-01 06:49:37'),
(460, '2', '1', '-3', '242', 1, '2022-02-01 06:49:37', '2022-02-01 06:49:37'),
(461, '4', '1', '-2', '242', 1, '2022-02-01 06:49:37', '2022-02-01 06:49:37'),
(462, '2', '1', '-6', '243', 1, '2022-02-02 03:45:45', '2022-02-02 03:45:45'),
(463, '4', '1', '-20', '244', 1, '2022-02-02 04:05:36', '2022-02-02 04:05:36');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `store_name`, `created_at`, `updated_at`) VALUES
(0, 'DC Main Warehouse', '2022-01-21 12:31:00', '2022-01-21 12:31:00'),
(1, 'Mombasa', '2022-01-10 19:54:57', '2022-01-10 19:54:57'),
(2, 'Nairobi', '2022-01-10 19:54:57', '2022-01-10 19:54:57'),
(3, 'Kisumu', '2022-01-10 19:55:59', '2022-01-10 19:55:59'),
(4, 'Nakuru', '2022-01-10 19:55:59', '2022-01-10 19:55:59');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trans_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trans_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trans_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `trans_desc`, `trans_by`, `trans_date`, `created_at`, `updated_at`) VALUES
(2, 'Stock Items', 'Abass Ahmed', '2022-01-07', '2022-01-07 13:50:07', '2022-01-07 13:50:07'),
(3, 'Stock Items', 'Abass Ahmed', '2022-01-07', '2022-01-07 13:52:09', '2022-01-07 13:52:09'),
(5, 'Stock Items', 'Ahmed Abdi', '2022-01-07', '2022-01-07 13:59:26', '2022-01-07 13:59:26'),
(6, 'Stock Items', 'Ahmed Abdi', '2022-01-07', '2022-01-07 14:02:02', '2022-01-07 14:02:02'),
(7, 'Stock Items', 'Ahmed Abdi', '2022-01-07', '2022-01-07 14:02:07', '2022-01-07 14:02:07'),
(8, 'Stock Items', 'Abass Ahmed', '2022-01-08', '2022-01-08 17:54:50', '2022-01-08 17:54:50'),
(9, 'Stock Items', 'Abass Ahmed', '2022-01-08', '2022-01-08 17:55:52', '2022-01-08 17:55:52'),
(10, 'Stock Items', 'Abass Ahmed', '2022-01-08', '2022-01-08 17:58:27', '2022-01-08 17:58:27'),
(11, 'Stock Items', 'Abass Ahmed', '2022-01-08', '2022-01-08 17:59:32', '2022-01-08 17:59:32'),
(12, 'Stock Items', 'Abass Ahmed', '2022-01-08', '2022-01-08 18:00:30', '2022-01-08 18:00:30'),
(13, 'Dispatch', 'Abass Ahmed', '2022-01-10', '2022-01-10 17:17:02', '2022-01-10 17:17:02'),
(14, 'Dispatch', 'Abass Ahmed', '2022-01-10', '2022-01-10 17:18:29', '2022-01-10 17:18:29'),
(15, 'Dispatch', 'Abass Ahmed', '2022-01-10', '2022-01-10 17:18:58', '2022-01-10 17:18:58'),
(16, 'Dispatch', 'Abass Ahmed', '2022-01-10', '2022-01-10 17:21:22', '2022-01-10 17:21:22'),
(17, 'Dispatch', 'Abass Ahmed', '2022-01-10', '2022-01-10 18:11:35', '2022-01-10 18:11:35'),
(18, 'Dispatch', 'Abass Ahmed', '2022-01-10', '2022-01-10 18:13:30', '2022-01-10 18:13:30'),
(19, 'Dispatch', 'Abass Ahmed', '2022-01-10', '2022-01-10 18:15:48', '2022-01-10 18:15:48'),
(20, 'Dispatch', 'Abass Ahmed', '2022-01-10', '2022-01-10 18:16:29', '2022-01-10 18:16:29'),
(21, 'Dispatch', 'Abass Ahmed', '2022-01-10', '2022-01-10 18:18:58', '2022-01-10 18:18:58'),
(22, 'Dispatch', 'Abass Ahmed', '2022-01-10', '2022-01-10 18:22:22', '2022-01-10 18:22:22'),
(23, 'Dispatch', 'Ahmed Abdi', '2022-01-11', '2022-01-11 16:18:58', '2022-01-11 16:18:58'),
(46, 'Stock Items', 'Ahmed Abdi', '2022-01-16', '2022-01-16 15:04:06', '2022-01-16 15:04:06'),
(47, 'Stock Items', 'Ahmed Abdi', '2022-01-16', '2022-01-16 15:05:18', '2022-01-16 15:05:18'),
(48, 'Dispatch', 'Ahmed Abdi', '2022-01-16', '2022-01-16 15:08:43', '2022-01-16 15:08:43'),
(49, 'Dispatch', 'Ahmed Abdi', '2022-01-16', '2022-01-16 15:09:05', '2022-01-16 15:09:05'),
(50, 'Dispatch', 'Ahmed Abdi', '2022-01-16', '2022-01-16 15:09:25', '2022-01-16 15:09:25'),
(51, 'Stock Items', 'Ahmed Abdi', '2022-01-16', '2022-01-16 15:48:48', '2022-01-16 15:48:48'),
(52, 'Stock Items', 'Ahmed Abdi', '2022-01-16', '2022-01-16 15:49:12', '2022-01-16 15:49:12'),
(53, 'Dispatch', 'Ahmed Abdi', '2022-01-16', '2022-01-16 15:49:53', '2022-01-16 15:49:53'),
(165, 'Cash Sale', 'Abass Ahmed', '2022-01-18', '2022-01-18 06:38:04', '2022-01-18 06:38:04'),
(167, 'Cash Sale', 'Abass Ahmed', '2022-01-18', '2022-01-18 06:44:41', '2022-01-18 06:44:41'),
(168, 'Stock Items', 'Abass Ahmed', '2022-01-18', '2022-01-18 06:49:01', '2022-01-18 06:49:01'),
(169, 'Stock Items', 'Abass Ahmed', '2022-01-18', '2022-01-18 07:16:32', '2022-01-18 07:16:32'),
(170, 'Dispatch', 'Hamid Fynest', '2022-01-18', '2022-01-18 08:19:18', '2022-01-18 08:19:18'),
(171, 'Dispatch', 'Hamid Fynest', '2022-01-18', '2022-01-18 08:22:09', '2022-01-18 08:22:09'),
(172, 'Stock Items', 'Ahmed Abdi', '2022-01-18', '2022-01-18 10:43:24', '2022-01-18 10:43:24'),
(173, 'Dispatch', 'Ahmed Abdi', '2022-01-18', '2022-01-18 10:44:02', '2022-01-18 10:44:02'),
(174, 'Dispatch', 'Ahmed Abdi', '2022-01-18', '2022-01-18 10:46:35', '2022-01-18 10:46:35'),
(175, 'Cash Sale', 'Hamid Fynest', '2022-01-19', '2022-01-19 05:53:16', '2022-01-19 05:53:16'),
(178, 'Cash Sale', 'Hamid Fynest', '2022-01-19', '2022-01-19 05:56:17', '2022-01-19 05:56:17'),
(179, 'Cash Sale', 'Hamid Fynest', '2022-01-19', '2022-01-19 07:07:17', '2022-01-19 07:07:17'),
(180, 'Cash Sale', 'Hamid Fynest', '2022-01-19', '2022-01-19 08:08:01', '2022-01-19 08:08:01'),
(181, 'Cash Sale', 'Hamid Fynest', '2022-01-19', '2022-01-19 10:06:28', '2022-01-19 10:06:28'),
(183, 'Purchases', 'Hamid Fynest', '2022-01-21', '2022-01-21 08:27:44', '2022-01-21 08:27:44'),
(184, 'Purchases', 'Hamid Fynest', '2022-01-21', '2022-01-21 08:30:18', '2022-01-21 08:30:18'),
(185, 'Purchases', 'Hamid Fynest', '2022-01-21', '2022-01-21 08:37:42', '2022-01-21 08:37:42'),
(186, 'Purchases', 'Hamid Fynest', '2022-01-21', '2022-01-21 08:42:22', '2022-01-21 08:42:22'),
(187, 'Purchases', 'Hamid Fynest', '2022-01-21', '2022-01-21 08:49:23', '2022-01-21 08:49:23'),
(188, 'Purchases', 'Hamid Fynest', '2022-01-21', '2022-01-21 08:50:19', '2022-01-21 08:50:19'),
(189, 'Purchases', 'Hamid Fynest', '2022-01-21', '2022-01-21 08:52:13', '2022-01-21 08:52:13'),
(190, 'Purchases', 'Hamid Fynest', '2022-01-21', '2022-01-21 08:53:12', '2022-01-21 08:53:12'),
(191, 'Purchases', 'Hamid Fynest', '2022-01-21', '2022-01-21 08:53:53', '2022-01-21 08:53:53'),
(192, 'Purchases', 'Hamid Fynest', '2022-01-21', '2022-01-21 08:55:17', '2022-01-21 08:55:17'),
(193, 'Purchases', 'Hamid Fynest', '2022-01-21', '2022-01-21 08:56:26', '2022-01-21 08:56:26'),
(194, 'Purchases', 'Hamid Fynest', '2022-01-21', '2022-01-21 08:57:05', '2022-01-21 08:57:05'),
(195, 'Purchases', 'Hamid Fynest', '2022-01-21', '2022-01-21 08:57:28', '2022-01-21 08:57:28'),
(196, 'Purchases', 'Hamid Fynest', '2022-01-21', '2022-01-21 08:59:26', '2022-01-21 08:59:26'),
(197, 'Purchases', 'Hamid Fynest', '2022-01-21', '2022-01-21 09:01:32', '2022-01-21 09:01:32'),
(198, 'Purchases', 'Hamid Fynest', '2022-01-21', '2022-01-21 09:14:01', '2022-01-21 09:14:01'),
(199, 'Purchases', 'Hamid Fynest', '2022-01-21', '2022-01-21 09:17:08', '2022-01-21 09:17:08'),
(200, 'Purchases', 'Hamid Fynest', '2022-01-21', '2022-01-21 09:29:30', '2022-01-21 09:29:30'),
(201, 'Purchases', 'Hamid Fynest', '2022-01-21', '2022-01-21 09:29:40', '2022-01-21 09:29:40'),
(202, 'Purchases', 'Hamid Fynest', '2022-01-21', '2022-01-21 09:33:00', '2022-01-21 09:33:00'),
(203, 'Purchases', 'Hamid Fynest', '2022-01-21', '2022-01-21 09:37:15', '2022-01-21 09:37:15'),
(204, 'Purchases', 'Hamid Fynest', '2022-01-21', '2022-01-21 09:42:36', '2022-01-21 09:42:36'),
(205, 'Purchases', 'Hamid Fynest', '2022-01-21', '2022-01-21 10:04:54', '2022-01-21 10:04:54'),
(206, 'Dispatch', 'Hamid Fynest', '2022-01-23', '2022-01-23 06:55:03', '2022-01-23 06:55:03'),
(207, 'Purchases', 'Hamid Fynest', '2022-01-23', '2022-01-23 07:45:12', '2022-01-23 07:45:12'),
(208, 'Dispatch', 'Hamid Fynest', '2022-01-23', '2022-01-23 08:04:05', '2022-01-23 08:04:05'),
(209, 'Cash Sale', 'Hamid Fynest', '2022-01-23', '2022-01-23 09:30:25', '2022-01-23 09:30:25'),
(210, 'Purchases', 'Hamid Fynest', '2022-01-23', '2022-01-23 09:45:01', '2022-01-23 09:45:01'),
(211, 'Dispatch', 'Hamid Fynest', '2022-01-23', '2022-01-23 09:47:55', '2022-01-23 09:47:55'),
(212, 'Purchases', 'Hamid Fynest', '2022-01-23', '2022-01-23 17:12:14', '2022-01-23 17:12:14'),
(213, 'Cash Sale', 'Hamid Fynest', '2022-01-24', '2022-01-24 06:43:15', '2022-01-24 06:43:15'),
(214, 'Dispatch', 'Abass Ahmed', '2022-01-24', '2022-01-24 07:11:44', '2022-01-24 07:11:44'),
(215, 'Cash Sale', 'Abass Ahmed', '2022-01-24', '2022-01-24 07:15:48', '2022-01-24 07:15:48'),
(226, 'Quotations', 'Ahmed Abdi', '2022-01-25', '2022-01-25 04:40:09', '2022-01-25 04:40:09'),
(227, 'Quotations', 'Ahmed Abdi', '2022-01-25', '2022-01-25 04:52:04', '2022-01-25 04:52:04'),
(228, 'Quotations', 'Ahmed Abdi', '2022-01-25', '2022-01-25 04:53:38', '2022-01-25 04:53:38'),
(229, 'Quotations', 'Ahmed Abdi', '2022-01-25', '2022-01-25 08:37:47', '2022-01-25 08:37:47'),
(230, 'Quotations', 'Ahmed Abdi', '2022-01-25', '2022-01-25 09:26:12', '2022-01-25 09:26:12'),
(231, 'Cash Sale', 'Ahmed Abdi', '2022-01-25', '2022-01-25 09:44:55', '2022-01-25 09:44:55'),
(232, 'Cash Sale', 'Ahmed Abdi', '2022-01-25', '2022-01-25 09:45:44', '2022-01-25 09:45:44'),
(233, 'Invoices', 'Abass Ahmed', '2022-01-26', '2022-01-26 04:49:43', '2022-01-26 04:49:43'),
(234, 'Invoices', 'Abass Ahmed', '2022-01-26', '2022-01-26 05:10:16', '2022-01-26 05:10:16'),
(235, 'Invoices', 'Abass Ahmed', '2022-01-26', '2022-01-26 08:40:53', '2022-01-26 08:40:53'),
(236, 'Quotations', 'Abass Ahmed', '2022-01-26', '2022-01-26 09:36:43', '2022-01-26 09:36:43'),
(237, 'Quotations', 'Abass Ahmed', '2022-01-27', '2022-01-27 05:10:12', '2022-01-27 05:10:12'),
(238, 'Invoices', 'Abass Ahmed', '2022-01-27', '2022-01-27 06:12:48', '2022-01-27 06:12:48'),
(239, 'Cash Sale', 'Abass Ahmed', '2022-01-27', '2022-01-27 06:20:43', '2022-01-27 06:20:43'),
(240, 'Invoices', 'Abass Ahmed', '2022-01-27', '2022-01-27 07:04:03', '2022-01-27 07:04:03'),
(241, 'Invoices', 'Abass Ahmed', '2022-01-27', '2022-01-27 09:01:59', '2022-01-27 09:01:59'),
(242, 'Cash Sale', 'Abass Ahmed', '2022-02-01', '2022-02-01 06:49:37', '2022-02-01 06:49:37'),
(243, 'Cash Sale', 'Abass Ahmed', '2022-02-02', '2022-02-02 03:45:45', '2022-02-02 03:45:45'),
(244, 'Invoices', 'Abass Ahmed', '2022-02-02', '2022-02-02 04:05:35', '2022-02-02 04:05:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nhif_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nssf_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_assigned` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_special` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `contact`, `nhif_no`, `nssf_no`, `photo`, `email`, `id_number`, `role`, `branch`, `date_assigned`, `email_verified_at`, `password`, `is_special`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '0712345678', '##########', '##########', NULL, 'admin@dcl.com', '########', NULL, NULL, NULL, NULL, '$2y$10$1skgWGDQmkVZj0RgW6WXq.5krxOpGHyonRAd.C6pDWyKsSn/J381C', 1, 1, NULL, NULL, NULL),
(3, 'Abass Ahmed', '0798278006', '12345678', '12345678', NULL, 'abass@dcl.com', '12345678', 'Manager', '1', '30/12/21', NULL, '$2y$10$6.3o6b0rH.6EuVs5y.OkMuNljwT5WaxARqWJ0piq80budJYCOotCm', 0, 1, NULL, '2021-12-29 18:30:23', '2021-12-30 08:55:33'),
(4, 'Ahmed Abdi', '0707486096', '87654321', '87654321', NULL, 'ahmed@dcl.com', '87654321', 'Accountant', '2', '30/12/21', NULL, '$2y$10$v4BufoqJJUk9pOHHv9i.E.2PBmwMKfAnSVeIVcodZzst06B..svP6', 0, 1, 'F8pHJhvK4rc5OoJFRxQldPmsLPETIppQM6tMoNoT3MIQRk5aF7241ImwgGI3', '2021-12-29 18:31:13', '2021-12-30 08:57:36'),
(5, 'Hamid Fynest', '0705404042', '35489657', '35489657', NULL, 'hamid@dcl.com', '35489657', 'Human Resource', '3', '30/12/21', NULL, '$2y$10$0G1R0HNByQODJe/wCk9L6O4WbBNmQNcxmCbXeVZnaSdw.ZOu6sahK', 0, 1, '8muhLFYe6MYAfWJUF6j0SMR93FsrChOFnMh7hMratW4GJzMbeh3R0v2cOYLD', '2021-12-29 18:53:08', '2021-12-30 08:57:51'),
(6, 'John Doe', '12121212', '12121212', '12121212', NULL, 'johndoe@dcl.com', '12121212', 'Salesperson', '4', '30/12/21', NULL, '$2y$10$uWUAwVIcHOI5/PleX9dlxOa13Y.xigQgrDnbarv4c61R1lKNOJnq2', 0, 1, NULL, '2021-12-30 06:35:15', '2021-12-30 08:58:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cash_sales`
--
ALTER TABLE `cash_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cash_sale_details`
--
ALTER TABLE `cash_sale_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cash_transactions`
--
ALTER TABLE `cash_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_payments`
--
ALTER TABLE `invoice_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotations`
--
ALTER TABLE `quotations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotation_details`
--
ALTER TABLE `quotation_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_contact_unique` (`contact`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_id_number_unique` (`id_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cash_sales`
--
ALTER TABLE `cash_sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cash_sale_details`
--
ALTER TABLE `cash_sale_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `cash_transactions`
--
ALTER TABLE `cash_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `invoice_payments`
--
ALTER TABLE `invoice_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `purchase_details`
--
ALTER TABLE `purchase_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `quotations`
--
ALTER TABLE `quotations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `quotation_details`
--
ALTER TABLE `quotation_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=464;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
