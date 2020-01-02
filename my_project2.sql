-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2020 at 02:46 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_project2`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_description`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 'Anjans', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.', 1, '2019-05-19 22:46:58', '2020-01-02 06:59:36'),
(2, 'Rong', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.', 1, '2019-05-19 22:47:06', '2020-01-02 06:58:32'),
(3, 'Yellow', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.', 1, '2019-05-19 22:47:19', '2020-01-02 06:58:21');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_description`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 'Accessory', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.', 1, '2019-05-19 22:46:05', '2020-01-02 06:58:07'),
(2, 'Cosmetic', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.', 1, '2019-05-19 22:46:16', '2020-01-02 07:14:32'),
(3, 'Clothes', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.', 1, '2019-05-19 22:46:39', '2020-01-02 06:57:48'),
(4, 'Shoes', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.', 1, '2019-06-27 03:00:29', '2020-01-02 06:57:38');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activation_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `mobile`, `address`, `password`, `activation_status`, `created_at`, `updated_at`) VALUES
(44, 'Ami', 'Islam', 'cool@gmail.com', '01645555555', 'sfsdgf dfg', '$2y$10$k8m4226hus0Grm30jVxtRO3BeJkWepzjzE7jIiVJyWfcT/iI9DMCi', 1, '2019-07-21 22:20:48', '2019-12-16 07:43:07'),
(45, 'Aurny', 'K.', 'admin@project.com', '01500000000', 'xvxcbvcbc', '$2y$10$/uS1Mr3okJ9JhStz30UnWut6Mb2vk01TWOpAbhcukCHgSyv2jloYS', 1, '2019-09-18 07:29:12', '2019-12-18 06:35:11'),
(63, 'A.', 'R.', 'asiarahman275@gmail.com', '0111777777777', 'dgfhgjj', '$2y$10$Rv39qOFMN2n8Mc7Z6/w.IemcvIVQsoIvUPfJYbOj6b1q46cbSVwES', 1, '2019-12-09 23:39:13', '2019-12-09 23:39:13'),
(64, 'Its', 'Me', 'ohh@bd.bd', '01666666666', 'dfdgdg fg.', '$2y$10$QS0jMftbMQhYnJ0n.J0Myeic0LsUWX0kLHmh1UsOUT7KJjtBxLdhu', 1, '2019-12-19 10:36:35', '2019-12-19 10:36:35'),
(65, 'A.', 'R.', 'd@fd.kk', '01444444444', 'fdsgdggj', '$2y$10$ko6blYXATEF4NnaLe3TeI.XkCGVhdzimucFwfPi72CnVcZ4B39fxu', 1, '2019-12-19 10:37:45', '2019-12-19 10:37:45');

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
(3, '2019_05_14_055104_create_categories_table', 1),
(4, '2019_05_17_032031_create_brands_table', 1),
(5, '2019_05_19_051606_create_products_table', 1),
(6, '2019_05_22_061334_create_sliders_table', 2),
(7, '2019_07_01_102554_create_customers_table', 3),
(8, '2019_09_23_063742_create_shippings_table', 4),
(9, '2019_09_28_044258_create_orders_table', 5),
(10, '2019_09_28_044714_create_order_details_table', 5),
(11, '2019_09_28_045628_create_payments_table', 5),
(12, '2019_12_19_061055_create_reviews_table', 6),
(13, '2019_12_28_130541_create_offers_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `offer_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offer_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `offer_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `offer_title`, `offer_image`, `offer_description`, `publication_status`, `created_at`, `updated_at`) VALUES
(2, 'New offer', 'offer-images/new_offer_5e0df02e3436b.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.&nbsp;</p>', 0, '2019-12-28 08:30:14', '2020-01-02 07:41:45'),
(4, 'New year discount', 'offer-images/discount_5e083f8de05a1.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.&nbsp;</p>', 1, '2019-12-28 23:54:23', '2020-01-02 07:44:59'),
(5, 'Summer sale', 'offer-images/summer_sale_5e083fb252f83.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.&nbsp;</p>', 0, '2019-12-28 23:54:59', '2020-01-02 07:42:27'),
(6, 'Special deal', 'offer-images/special_deal_5e083fdb483da.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.&nbsp;</p>', 1, '2019-12-28 23:55:40', '2020-01-02 07:42:50'),
(7, 'Discount for limited period', 'offer-images/discount_2_5e083ff509896.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.&nbsp;</p>', 1, '2019-12-28 23:56:05', '2020-01-02 07:44:12');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `order_total` double(10,2) NOT NULL,
  `order_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `shipping_id`, `order_total`, `order_status`, `created_at`, `updated_at`) VALUES
(143, 44, 180, 1895.20, 'Delivered', '2019-12-07 07:47:09', '2019-12-13 23:04:19'),
(146, 44, 183, 1725.00, 'Delivered', '2019-12-07 23:00:02', '2019-12-14 00:13:46'),
(149, 63, 186, 3535.10, 'Cancelled', '2019-12-07 23:10:26', '2019-12-14 23:29:11'),
(150, 44, 187, 3535.10, 'Pending', '2019-12-07 23:12:55', '2019-12-29 07:41:57'),
(151, 44, 188, 1725.00, 'Pending', '2019-12-07 23:16:14', '2019-12-07 23:16:14'),
(152, 45, 189, 3141.80, 'Pending', '2019-12-07 23:17:08', '2019-12-07 23:17:08'),
(153, 63, 190, 2994.60, 'Pending', '2019-12-09 23:39:44', '2019-12-09 23:39:44'),
(154, 44, 191, 52564.20, 'Pending', '2019-12-31 09:50:09', '2019-12-31 09:50:09');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(10,2) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_quantity`, `created_at`, `updated_at`) VALUES
(171, 143, 11, 'Shoe', 1500.00, 1, '2019-12-07 07:47:09', '2019-12-07 07:47:09'),
(172, 143, 10, 'New Product-2', 74.00, 2, '2019-12-07 07:47:09', '2019-12-07 07:47:09'),
(177, 146, 11, 'Shoe', 1500.00, 1, '2019-12-07 23:00:02', '2019-12-07 23:00:02'),
(181, 149, 11, 'Shoe', 1500.00, 2, '2019-12-07 23:10:26', '2019-12-07 23:10:26'),
(182, 149, 10, 'New Product-2', 74.00, 1, '2019-12-07 23:10:26', '2019-12-07 23:10:26'),
(183, 150, 11, 'Shoe', 1500.00, 2, '2019-12-07 23:12:55', '2019-12-07 23:12:55'),
(184, 150, 10, 'New Product-2', 74.00, 1, '2019-12-07 23:12:55', '2019-12-07 23:12:55'),
(185, 151, 11, 'Shoe', 1500.00, 1, '2019-12-07 23:16:15', '2019-12-07 23:16:15'),
(186, 152, 10, 'New Product-2', 74.00, 2, '2019-12-07 23:17:08', '2019-12-07 23:17:08'),
(187, 152, 11, 'Shoe', 1500.00, 1, '2019-12-07 23:17:08', '2019-12-07 23:17:08'),
(188, 152, 9, 'New Product-2', 515.00, 2, '2019-12-07 23:17:08', '2019-12-07 23:17:08'),
(189, 152, 8, 'Kamiz', 54.00, 1, '2019-12-07 23:17:09', '2019-12-07 23:17:09'),
(190, 153, 10, 'New Product-2', 74.00, 1, '2019-12-09 23:39:45', '2019-12-09 23:39:45'),
(191, 153, 11, 'Shoe', 1500.00, 1, '2019-12-09 23:39:45', '2019-12-09 23:39:45'),
(192, 153, 9, 'New Product-2', 515.00, 2, '2019-12-09 23:39:45', '2019-12-09 23:39:45'),
(193, 154, 7, 'New Product-2', 45654.00, 1, '2019-12-31 09:50:09', '2019-12-31 09:50:09'),
(194, 154, 8, 'Kamiz', 54.00, 1, '2019-12-31 09:50:09', '2019-12-31 09:50:09');

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `payment_type`, `payment_status`, `created_at`, `updated_at`) VALUES
(128, 143, 'Card', 'Paid', '2019-12-07 07:47:09', '2019-12-13 00:44:38'),
(131, 146, 'Cash', 'Paid', '2019-12-07 23:00:02', '2019-12-14 00:13:46'),
(134, 149, 'Cash', 'Pending', '2019-12-07 23:10:26', '2019-12-07 23:10:26'),
(135, 150, 'Cash', 'Pending', '2019-12-07 23:12:55', '2019-12-07 23:12:55'),
(136, 151, 'Cash', 'Pending', '2019-12-07 23:16:15', '2019-12-07 23:16:15'),
(137, 152, 'Cash', 'Pending', '2019-12-07 23:17:09', '2019-12-07 23:17:09'),
(138, 153, 'Cash', 'Pending', '2019-12-09 23:39:46', '2019-12-09 23:39:46'),
(139, 154, 'Cash', 'Pending', '2019-12-31 09:50:09', '2019-12-31 09:50:09');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(10,2) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_long_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` tinyint(4) NOT NULL,
  `product_sales_quantity` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `product_name`, `product_price`, `product_quantity`, `product_short_description`, `product_long_description`, `product_image`, `publication_status`, `product_sales_quantity`, `created_at`, `updated_at`) VALUES
(4, 1, 2, 'Watch', 1180.00, 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'product-images/Watch_5e0dedc9f278c.jpg', 1, 10, '2019-05-19 23:44:00', '2020-01-02 07:19:06'),
(6, 1, 1, 'necklace set', 2500.00, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'product-images/Heels_5e0ded59dfe00.jpg', 0, 0, '2019-05-20 00:07:14', '2020-01-02 07:17:50'),
(7, 2, 2, 'Lipstick', 400.00, 64, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'product-images/Lipstick_5e0ded05f0166.jpg', 1, 6, '2019-05-20 21:37:09', '2020-01-02 07:15:50'),
(8, 1, 1, 'Jewelry', 2500.00, 198, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'product-images/Kamiz_5e0dec305611b.jpg', 1, 5, '2019-05-20 21:40:17', '2020-01-02 07:12:50'),
(9, 3, 2, 'Skirt', 515.00, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'product-images/Skirt_5e0debcebbdfb.jpg', 1, 8, '2019-05-20 21:42:41', '2020-01-02 07:10:38'),
(10, 3, 3, 'Ladies Clothes', 1250.00, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'product-images/New Product-2_5e0deaf8007a1.jpg', 1, 1, '2019-05-21 00:03:33', '2020-01-02 07:10:59'),
(11, 4, 1, 'Ladies Shoes', 1500.00, 10, 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'product-images/Shoe_5e0deac739b28.jpg', 1, 2, '2019-09-01 10:03:41', '2020-01-02 07:07:57');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `customer_id`, `review`, `publication_status`, `created_at`, `updated_at`) VALUES
(2, 11, 44, 'The price is high', 0, '2019-12-19 04:50:38', '2019-12-20 04:47:08'),
(3, 11, 45, 'Good', 1, '2019-12-19 04:51:58', '2019-12-19 04:51:58'),
(4, 10, 44, 'Nice', 1, '2019-12-19 05:01:11', '2019-12-19 05:01:11'),
(5, 8, 45, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '2019-12-19 09:57:09', '2019-12-19 09:57:09'),
(6, 8, 45, 'Where does it come from?', 1, '2019-12-19 10:03:59', '2019-12-19 10:03:59'),
(7, 9, 44, 'Where does it come from?', 1, '2019-12-19 10:07:52', '2019-12-19 10:07:52'),
(8, 9, 45, 'LOVE IT', 1, '2019-12-19 10:21:05', '2019-12-19 10:21:05'),
(9, 9, 63, 'wow', 1, '2019-12-19 10:24:32', '2019-12-19 10:24:32'),
(10, 10, 45, 'WOW', 1, '2019-12-19 10:26:17', '2019-12-19 10:26:17');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `name`, `mobile`, `address`, `created_at`, `updated_at`) VALUES
(180, 'A. T. C.', '0100000000', 'Deeeeeeeee', '2019-12-07 07:47:09', '2019-12-13 00:44:38'),
(183, 'A. Rahman', '01444444444', 'Dhaka, BD.', '2019-12-07 23:00:02', '2019-12-07 23:00:02'),
(186, 'A. Rahman', '01444444444', 'Dhaka, BD.', '2019-12-07 23:10:26', '2019-12-07 23:10:26'),
(187, 'A. Rahman', '01444444444', 'Dhaka, BD.', '2019-12-07 23:12:55', '2019-12-07 23:12:55'),
(188, 'A. Rahman', '01444444444', 'Dhaka, BD.', '2019-12-07 23:16:14', '2019-12-07 23:16:14'),
(189, 'A. Rahman', '01444444444', 'Dhaka, BD.', '2019-12-07 23:17:08', '2019-12-07 23:17:08'),
(190, 'A. R.', '0111777777777', 'dgfhgjj', '2019-12-09 23:39:44', '2019-12-09 23:39:44'),
(191, 'S. R.', '01666666666', 'fghfhghhfgh', '2019-12-31 09:50:07', '2019-12-31 09:50:07');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_title`, `slider_image`, `slider_description`, `publication_status`, `created_at`, `updated_at`) VALUES
(6, 'Lorem Ipsum 6', 'slider-images/Lorem Ipsum 6_5e0defaf44e72.jpg', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.', 1, '2019-05-24 21:32:40', '2020-01-02 07:27:52'),
(7, 'Lorem Ipsum 5', 'slider-images/Lorem Ipsum 5_5e0def7b9e8c6.jpg', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.', 0, '2019-05-24 21:32:40', '2020-01-02 07:26:20'),
(8, 'Lorem Ipsum 3', 'slider-images/Lorem Ipsum 3_5e0def4538fb6.jpg', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.', 1, '2019-05-24 21:37:11', '2020-01-02 07:25:25'),
(10, 'Lorem Ipsum', 'slider-images/Lorem Ipsum_5e0def1f9e124.jpg', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.', 1, '2019-05-24 22:25:26', '2020-01-02 07:24:48'),
(11, 'Lorem Ipsum 2', 'slider-images/Lorem Ipsum 2_5e0deeb127d0d.jpg', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.', 1, '2019-05-24 22:26:26', '2020-01-02 07:22:57'),
(14, 'Lorem Ipsum 1', 'slider-images/Lorem Ipsum 1_5e0deeebc3fae.jpg', 'HA ha ha is  no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain.', 0, '2019-05-24 23:32:01', '2020-01-02 07:23:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `designation`, `email`, `phone`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'ABC', 'Admin', 'ccc@gmail.com', '5123554', NULL, NULL, 'cool@gmail', NULL, '2019-06-27 03:29:21', '2019-12-22 00:19:43'),
(4, 'A. T. C.', 'CEO', 'admin@project.com', '01555', NULL, NULL, '$2y$10$wHGYeTKJN4MOZEIYKBEixexHnrFQaiYaaf5/XAxLRd1dxn58bEhG.', NULL, '2019-12-22 00:39:22', '2019-12-22 00:39:22'),
(5, 'MD. Cool', 'Admin', 'cool@gmail.com', '55855', NULL, NULL, '$2y$10$dFichL.MBDOOcYUDc9UFkO98YsDhlQ6qvKN.JAd7yEVkuln48cCpe', NULL, '2019-12-22 00:41:31', '2019-12-22 00:41:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
