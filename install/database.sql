-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 02, 2018 at 12:28 AM
-- Server version: 10.2.19-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ideal_datehook`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `phone`, `email`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'MR. Admin', '+8801689583182', 'admin@email.com', 'admin', '$2y$10$wBW5qkPFA9HiJ80wR2F19OsfLgZFZld5/h11s9r8jUzBuL9rAxdBO', 'YW7UnG00E9kdLGnjqFgJg3nUhzw3frXAX0NZ7ZageLTB22JW4cnJidF5pxHh', NULL, '2018-08-06 00:56:51'),
(2, 'Abir', NULL, 'abir', 'abir', '$2y$10$/FpQuDUXdC5mTo7G.QX4AuuMAh2GTSuzSiAX3B1cTMzcKwR1o2ibi', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `script` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(11) NOT NULL,
  `s_id` int(11) DEFAULT NULL,
  `r_id` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `gateway_id` int(11) DEFAULT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usd_amo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btc_amo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btc_wallet` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `try` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deposit_requests`
--

CREATE TABLE `deposit_requests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `gateway_id` int(11) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `usd_amo` varchar(255) DEFAULT NULL,
  `charge` varchar(255) DEFAULT NULL,
  `accepted` int(3) DEFAULT 0,
  `r_img` varchar(255) DEFAULT NULL,
  `sent` int(3) NOT NULL DEFAULT 0,
  `trx` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gateways`
--

CREATE TABLE `gateways` (
  `id` int(10) UNSIGNED NOT NULL,
  `main_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `minamo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maxamo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fixed_charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percent_charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gateways`
--

INSERT INTO `gateways` (`id`, `main_name`, `name`, `minamo`, `maxamo`, `fixed_charge`, `percent_charge`, `rate`, `val1`, `val2`, `val3`, `status`, `created_at`, `updated_at`) VALUES
(101, 'PayPal', 'PayPal', '5', '1000', '0.511', '2.52', '1', 'rexrifat636@gmail.com', NULL, NULL, 1, NULL, '2018-09-03 18:59:11'),
(102, 'PerfectMoney', 'Perfect Money', '20', '20000', '2', '1', '1', 'U5376900', 'G079qn4Q7XATZBqyoCkBteGRg', NULL, 1, NULL, '2018-07-01 01:22:11'),
(103, 'Stripe', 'Credit Card', '10', '50000', '3', '3', '1', 'sk_test_aat3tzBCCXXBkS4sxY3M8A1B', 'pk_test_AU3G7doZ1sbdpJLj0NaozPBu', NULL, 1, NULL, '2018-05-27 18:11:50'),
(104, 'Skrill', 'Skrill', '10', '50000', '3', '3', '1', 'merchant@skrill', 'TheSoftKing', NULL, 1, NULL, '2018-05-20 12:01:09'),
(501, 'Blockchain.info', 'BitCoin', '1', '20000', '1', '0.5', '1', '3965f52f-ec19-43af-90ed-d613dc60657eSSS', 'xpub6DREmHywjNizvs9b4hhNekcjFjvL4rshJjnrHHgtLNCSbhhx5jKFRgqdmXAecLAddEPudDZY4xoDbV1NVHSCeDp1S7NumPCNNjbxB7sGasY0000', NULL, 1, NULL, '2018-05-21 01:20:29'),
(502, 'block.io - BTC', 'BitCoin', '1', '99999', '1', '0.5', '1', '1658-8015-2e5e-9afb', '09876softk', NULL, 1, '2018-01-27 18:00:00', '2018-05-31 09:12:55'),
(503, 'block.io - LTC', 'LiteCoin', '100', '10000', '0.4', '1', '1', 'cb91-a5bc-69d7-1c27', '09876softk', NULL, 1, NULL, '2018-07-19 01:28:33'),
(504, 'block.io - DOGE', 'DogeCoin', '1', '50000', '0.51', '2.52', '1', '2daf-d165-2135-5951', '09876softk', NULL, 1, NULL, '2018-05-31 09:28:54'),
(505, 'CoinPayment - BTC', 'BitCoin', '1', '50000', '0.51', '2.52', '1', '596f0097ed9d1ab8cfed05eb59c70e9f066513dfe4df64a8fc3917d309328315', '7472928395208f70E3cE30B9e10dc882cBDD3e9967b7942AaE492106d9C7bE44', NULL, 1, NULL, '2018-05-31 09:38:33'),
(506, 'CoinPayment - ETH', 'Etherium', '1', '50000', '0.51', '2.52', '1', '596f0097ed9d1ab8cfed05eb59c70e9f066513dfe4df64a8fc3917d309328315', '7472928395208f70E3cE30B9e10dc882cBDD3e9967b7942AaE492106d9C7bE44', NULL, 1, NULL, '2018-07-16 03:42:22'),
(507, 'CoinPayment - BCH', 'Bitcoin Cash', '1', '50000', '0.51', '2.52', '1', '596f0097ed9d1ab8cfed05eb59c70e9f066513dfe4df64a8fc3917d309328315', '7472928395208f70E3cE30B9e10dc882cBDD3e9967b7942AaE492106d9C7bE44', NULL, 1, NULL, '2018-07-18 01:40:09'),
(508, 'CoinPayment - DASH', 'DASH', '1', '50000', '0.51', '2.52', '1', '596f0097ed9d1ab8cfed05eb59c70e9f066513dfe4df64a8fc3917d309328315', '7472928395208f70E3cE30B9e10dc882cBDD3e9967b7942AaE492106d9C7bE44', NULL, 1, NULL, '2018-05-31 09:39:04'),
(509, 'CoinPayment - DOGE', 'DOGE', '1', '50000', '0.51', '2.52', '1', '596f0097ed9d1ab8cfed05eb59c70e9f066513dfe4df64a8fc3917d309328315', '7472928395208f70E3cE30B9e10dc882cBDD3e9967b7942AaE492106d9C7bE44', NULL, 1, NULL, '2018-05-31 09:39:04'),
(510, 'CoinPayment - LTC', 'LTC', '1', '50000', '0.51', '2.52', '1', '596f0097ed9d1ab8cfed05eb59c70e9f066513dfe4df64a8fc3917d309328315', '7472928395208f70E3cE30B9e10dc882cBDD3e9967b7942AaE492106d9C7bE44', NULL, 1, NULL, '2018-05-31 09:39:04'),
(512, 'CoinGate', 'CoinGate', '10', '1000', '05', '5', '1', NULL, NULL, NULL, 1, '2018-07-08 18:00:00', '2018-09-03 18:59:30'),
(513, 'CoinPayment-ALL', 'Coin Payment', '10', '1000', '05', '5', '1', 'db1d9f12444e65c921604e289a281c56', NULL, NULL, 1, NULL, '2018-05-21 01:20:54'),
(900, '', 'Bank of America', '1000', '40000', '4', '3', '1', NULL, NULL, 'Account Name: Samiul Alim Pratik\r\nAccount Number: 201414011', 1, '2018-07-18 01:32:15', '2018-11-30 23:28:57'),
(901, '', 'HSBC Bank USA', '500', '50000', '4', '3', '1', NULL, NULL, 'Account Name: Samiul Alim Pratik\r\nAccount Number: 201414011', 1, '2018-07-19 01:24:13', '2018-11-30 23:33:58'),
(902, '', 'JPMorgan Chase', '1000', '60000', '10', '3', '1', NULL, NULL, 'Account Name: John Doe\r\nAccount Number: 201414011', 1, '2018-08-06 01:29:15', '2018-11-30 23:35:04'),
(903, 'Citigroup', 'Citigroup', '1000', '50000', '3', '2', '1', NULL, NULL, 'Account Name: Pratik\r\nAccount Details: 201414011', 1, '2018-11-30 23:42:18', '2018-11-30 23:42:18');

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` int(11) NOT NULL,
  `website_title` varchar(255) DEFAULT NULL,
  `base_color_code` varchar(20) DEFAULT NULL,
  `base_curr_text` varchar(20) DEFAULT NULL,
  `base_curr_symbol` blob DEFAULT NULL,
  `dec_pt` int(11) DEFAULT NULL,
  `registration` int(11) DEFAULT NULL,
  `email_verification` int(11) DEFAULT NULL,
  `sms_verification` int(11) DEFAULT NULL,
  `email_notification` int(11) DEFAULT NULL,
  `sms_notification` int(11) DEFAULT NULL,
  `email_sent_from` varchar(255) DEFAULT NULL,
  `email_template` blob DEFAULT NULL,
  `sms_api` text DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `comment_script` text DEFAULT NULL,
  `header_stext` varchar(255) DEFAULT NULL,
  `header_btext` varchar(255) DEFAULT NULL,
  `f_title` varchar(255) DEFAULT NULL,
  `fs_details` varchar(255) DEFAULT NULL,
  `l_title` varchar(255) DEFAULT NULL,
  `ls_details` varchar(255) DEFAULT NULL,
  `subsc_title` varchar(255) DEFAULT NULL,
  `subsc_details` varchar(255) DEFAULT NULL,
  `testm_title` varchar(255) DEFAULT NULL,
  `testm_details` text DEFAULT NULL,
  `con_title` varchar(255) DEFAULT NULL,
  `con_sdetails` varchar(255) DEFAULT NULL,
  `o_hours` varchar(255) DEFAULT NULL,
  `c_location` varchar(255) DEFAULT NULL,
  `story_title` varchar(255) DEFAULT NULL,
  `story_details` varchar(255) DEFAULT NULL,
  `footer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `website_title`, `base_color_code`, `base_curr_text`, `base_curr_symbol`, `dec_pt`, `registration`, `email_verification`, `sms_verification`, `email_notification`, `sms_notification`, `email_sent_from`, `email_template`, `sms_api`, `phone`, `email`, `comment_script`, `header_stext`, `header_btext`, `f_title`, `fs_details`, `l_title`, `ls_details`, `subsc_title`, `subsc_details`, `testm_title`, `testm_details`, `con_title`, `con_sdetails`, `o_hours`, `c_location`, `story_title`, `story_details`, `footer`) VALUES
(1, 'DateHook', 'f9026d', 'USD', 0x24, 2, 1, 1, 1, 0, 0, 'do-not-reply@thesofking.com', 0x3c703e266e6273703b3c2f703e3c64697620636c6173733d227772617070657222207374796c653d226261636b67726f756e642d636f6c6f723a20726762283234322c203234322c20323432293b223e3c7461626c6520616c69676e3d2263656e74657222207374796c653d227461626c652d6c61796f75743a2066697865643b20636f6c6f723a20726762283138342c203138342c20313834293b20666f6e742d66616d696c793a205562756e74752c2073616e732d73657269663b223e3c74626f64793e3c74723e3c746420636c6173733d227072656865616465725f5f736e697070657422207374796c653d2270616464696e672d746f703a20313070783b2070616464696e672d626f74746f6d3a203570783b20766572746963616c2d616c69676e3a20746f703b2077696474683a2032383070783b223e266e6273703b3c2f74643e3c746420636c6173733d227072656865616465725f5f77656276657273696f6e22207374796c653d2270616464696e672d746f703a20313070783b2070616464696e672d626f74746f6d3a203570783b20746578742d616c69676e3a2072696768743b20766572746963616c2d616c69676e3a20746f703b2077696474683a2032383070783b223e266e6273703b3c2f74643e3c2f74723e3c2f74626f64793e3c2f7461626c653e3c7461626c652069643d22656d622d656d61696c2d6865616465722d636f6e7461696e65722220636c6173733d226865616465722220616c69676e3d2263656e74657222207374796c653d227461626c652d6c61796f75743a2066697865643b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b223e3c74626f64793e3c74723e3c7464207374796c653d2277696474683a2036303070783b223e3c64697620636c6173733d226865616465725f5f6c6f676f20656d622d6c6f676f2d6d617267696e2d626f7822207374796c653d22666f6e742d73697a653a20323670783b206c696e652d6865696768743a20333270783b20636f6c6f723a20726762283139352c203230362c20323137293b20666f6e742d66616d696c793a20526f626f746f2c205461686f6d612c2073616e732d73657269663b206d617267696e3a20367078203230707820323070783b223e3c6469762069643d22656d622d656d61696c2d6865616465722220636c6173733d226c6f676f2d6c6566742220616c69676e3d226c65667422207374796c653d22666f6e742d73697a653a203070782021696d706f7274616e743b206c696e652d6865696768743a20302021696d706f7274616e743b223e3c696d67207372633d22687474703a2f2f692e696d6775722e636f6d2f6e4e434e505a542e706e672220616c743d22222077696474683d2233313222206865696768743d22343422207374796c653d226865696768743a206175746f3b2077696474683a2033313270783b206d61782d77696474683a2033313270783b223e3c2f6469763e3c2f6469763e3c2f74643e3c2f74723e3c2f74626f64793e3c2f7461626c653e3c7461626c6520636c6173733d226c61796f7574206c61796f75742d2d6e6f2d6775747465722220616c69676e3d2263656e74657222207374796c653d226261636b67726f756e642d636f6c6f723a20726762283235352c203235352c20323535293b207461626c652d6c61796f75743a2066697865643b206d617267696e2d6c6566743a206175746f3b206d617267696e2d72696768743a206175746f3b206f766572666c6f772d777261703a20627265616b2d776f72643b20776f72642d777261703a20627265616b2d776f72643b20776f72642d627265616b3a20627265616b2d776f72643b223e3c74626f64793e3c74723e3c746420636c6173733d22636f6c756d6e22207374796c653d22766572746963616c2d616c69676e3a20746f703b20636f6c6f723a207267622839362c203130322c20313039293b206c696e652d6865696768743a20323170783b20666f6e742d66616d696c793a2073616e732d73657269663b2077696474683a2036303070783b223e3c646976207374796c653d226d617267696e2d6c6566743a20323070783b206d617267696e2d72696768743a20323070783b206d617267696e2d746f703a20323470783b223e3c646976207374796c653d226c696e652d6865696768743a20313070783b20666f6e742d73697a653a203170783b223e266e6273703b3c2f6469763e3c2f6469763e3c646976207374796c653d226d617267696e2d6c6566743a20323070783b206d617267696e2d72696768743a20323070783b223e3c68323e4869207b7b6e616d657d7d2c3c2f68323e3c703e3c7370616e207374796c653d22666f6e742d7765696768743a203730303b223e7b7b6d6573736167657d7d3c2f7370616e3e3c2f703e3c2f6469763e3c646976207374796c653d226d617267696e2d6c6566743a20323070783b206d617267696e2d72696768743a20323070783b223e3c62723e3c2f6469763e3c646976207374796c653d226d617267696e2d6c6566743a20323070783b206d617267696e2d72696768743a20323070783b206d617267696e2d626f74746f6d3a20323470783b223e3c7020636c6173733d2273697a652d313422207374796c653d226d617267696e2d626f74746f6d3a203070783b206c696e652d6865696768743a20323170783b223e5468616e6b732c3c62723e3c7370616e207374796c653d22666f6e742d7765696768743a203730303b223e452057616c6c6574205465616d3c2f7370616e3e3c2f703e3c2f6469763e3c2f74643e3c2f74723e3c2f74626f64793e3c2f7461626c653e3c2f6469763e, 'https://api.infobip.com/api/v3/sendsms/plain?user=****&password=*****&sender=DateHook&SMSText={{message}}&GSM={{number}}&type=longSMS', '+880 123 456 7890', 'do-not-reply@thesoftking.com', '<div id=\"fb-root\"></div>\r\n<script>(function(d, s, id) {\r\n  var js, fjs = d.getElementsByTagName(s)[0];\r\n  if (d.getElementById(id)) return;\r\n  js = d.createElement(s); js.id = id;\r\n  js.src = \'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0&appId=446348272471579&autoLogAppEvents=1\';\r\n  fjs.parentNode.insertBefore(js, fjs);\r\n}(document, \'script\', \'facebook-jssdk\'));</script>', 'Find Your Best Match!', 'Open Community For Discussion On ICOs u', 'Featured Profiles', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. u', 'Latest Images u', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. update', 'Subscribe For Updates', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more update', 'Clients Testimonials u', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. update', 'Get In Touch', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. update', '10:00 Am - 07:00PM', 'Company Address. Country', 'Happy Stories', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'Copyright - DateHook 2018');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `preview_image` varchar(255) DEFAULT NULL,
  `original_preview` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `original_zip` varchar(255) DEFAULT NULL,
  `published` int(3) NOT NULL DEFAULT 0,
  `featured` int(3) NOT NULL DEFAULT 0,
  `u_hidden` int(3) NOT NULL DEFAULT 0,
  `a_hidden` int(3) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` int(11) NOT NULL,
  `r_id` int(11) DEFAULT NULL,
  `a_id` int(11) DEFAULT NULL,
  `matched` int(3) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `sdetails` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `body` blob DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `title`, `sdetails`, `slug`, `body`, `created_at`, `updated_at`) VALUES
(7, 'About', 'About US', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'about', 0x3c70207374796c653d22746578742d616c69676e3a2063656e7465723b206d617267696e2d72696768743a203070783b206d617267696e2d626f74746f6d3a20313570783b206d617267696e2d6c6566743a203070783b2070616464696e673a203070783b20636f6c6f723a2072676228302c20302c2030293b223e3c666f6e74207374796c653d22222073697a653d22362220666163653d22636f6d69632073616e73206d73223e3c62207374796c653d22223e41626f75742055733c2f623e3c2f666f6e743e3c2f703e3c70207374796c653d22746578742d616c69676e3a2063656e7465723b206d617267696e2d72696768743a203070783b206d617267696e2d626f74746f6d3a20313570783b206d617267696e2d6c6566743a203070783b2070616464696e673a203070783b20636f6c6f723a2072676228302c20302c2030293b223e3c666f6e742073697a653d223322207374796c653d222220666163653d2267656f72676961223e436f6e747261727920746f20706f70756c61722062656c6965662c204c6f72656d20497073756d206973206e6f742073696d706c792072616e646f6d20746578742e2049742068617320726f6f747320696e2061207069656365206f6620636c6173736963616c204c6174696e206c6974657261747572652066726f6d2034352042432c206d616b696e67206974206f7665722032303030207965617273206f6c642e2052696368617264204d63436c696e746f636b2c2061204c6174696e2070726f666573736f722061742048616d7064656e2d5379646e657920436f6c6c65676520696e2056697267696e69612c206c6f6f6b6564207570206f6e65206f6620746865206d6f7265206f627363757265204c6174696e20776f7264732c20636f6e73656374657475722c2066726f6d2061204c6f72656d20497073756d20706173736167652c20616e6420676f696e67207468726f75676820746865206369746573206f662074686520776f726420696e20636c6173736963616c206c6974657261747572652c20646973636f76657265642074686520756e646f75627461626c6520736f757263652e204c6f72656d20497073756d20636f6d65732066726f6d2073656374696f6e7320312e31302e333220616e6420312e31302e3333206f66202264652046696e6962757320426f6e6f72756d206574204d616c6f72756d2220285468652045787472656d6573206f6620476f6f6420616e64204576696c292062792043696365726f2c207772697474656e20696e2034352042432e205468697320626f6f6b2069732061207472656174697365206f6e20746865207468656f7279206f66206574686963732c207665727920706f70756c617220647572696e67207468652052656e61697373616e63652e20546865206669727374206c696e65206f66204c6f72656d20497073756d2c20224c6f72656d20697073756d20646f6c6f722073697420616d65742e2e222c20636f6d65732066726f6d2061206c696e6520696e2073656374696f6e20312e31302e33322e3c2f666f6e743e3c2f703e3c70207374796c653d22746578742d616c69676e3a2063656e7465723b206d617267696e2d72696768743a203070783b206d617267696e2d626f74746f6d3a20313570783b206d617267696e2d6c6566743a203070783b2070616464696e673a203070783b20636f6c6f723a2072676228302c20302c2030293b223e3c666f6e742073697a653d223322207374796c653d222220666163653d2267656f72676961223e546865207374616e64617264206368756e6b206f66204c6f72656d20497073756d20757365642073696e63652074686520313530307320697320726570726f64756365642062656c6f7720666f722074686f736520696e74657265737465642e2053656374696f6e7320312e31302e333220616e6420312e31302e33332066726f6d202264652046696e6962757320426f6e6f72756d206574204d616c6f72756d222062792043696365726f2061726520616c736f20726570726f647563656420696e207468656972206578616374206f726967696e616c20666f726d2c206163636f6d70616e69656420627920456e676c6973682076657273696f6e732066726f6d207468652031393134207472616e736c6174696f6e20627920482e205261636b68616d2e3c2f666f6e743e3c2f703e, '2018-08-06 01:43:03', '2018-08-06 06:57:05');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `s_desc` text DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `status` int(3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `r_id` int(11) DEFAULT NULL,
  `c_id` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int(11) NOT NULL,
  `fontawesome_code` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `fontawesome_code`, `url`, `created_at`, `updated_at`) VALUES
(1, 'facebook', 'https://www.facebook.com/', '2018-07-31 07:30:25', '2018-07-31 07:30:25'),
(3, 'linkedin', 'https://www.linkedin.com/', '2018-07-31 07:32:16', '2018-07-31 07:32:16'),
(5, 'twitter', 'https://twitter.com/', '2018-07-31 23:55:41', '2018-07-31 23:55:41');

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `id` int(11) NOT NULL,
  `couple_name` varchar(255) DEFAULT NULL,
  `story` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `trx_id` varchar(255) DEFAULT NULL,
  `after_balance` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `featured` int(3) NOT NULL DEFAULT 0,
  `highlighted` int(11) NOT NULL DEFAULT 0,
  `balance` varchar(255) DEFAULT NULL,
  `package` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(255) DEFAULT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'active',
  `email_verified` int(3) DEFAULT NULL,
  `sms_verified` int(3) DEFAULT NULL,
  `email_ver_code` int(11) DEFAULT NULL,
  `sms_ver_code` int(11) DEFAULT NULL,
  `email_sent` int(3) NOT NULL DEFAULT 0,
  `sms_sent` int(3) NOT NULL DEFAULT 0,
  `vsent` int(11) NOT NULL DEFAULT 0,
  `password` varchar(255) DEFAULT NULL,
  `compro` int(3) NOT NULL DEFAULT 0,
  `date_of_birth` date DEFAULT NULL,
  `mother_tongue` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `religion` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `marrital_status` varchar(20) DEFAULT NULL,
  `education_level` varchar(20) DEFAULT NULL,
  `work` varchar(20) DEFAULT NULL,
  `income` varchar(100) DEFAULT NULL,
  `education_field` varchar(20) DEFAULT NULL,
  `work_as` varchar(100) DEFAULT NULL,
  `diet` varchar(20) DEFAULT NULL,
  `drink` varchar(20) DEFAULT NULL,
  `body_type` varchar(20) DEFAULT NULL,
  `smoke` varchar(20) DEFAULT NULL,
  `height` varchar(100) DEFAULT NULL,
  `skin_tone` varchar(20) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `disability` varchar(20) DEFAULT NULL,
  `pro_pic` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposit_requests`
--
ALTER TABLE `deposit_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gateways`
--
ALTER TABLE `gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deposit_requests`
--
ALTER TABLE `deposit_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gateways`
--
ALTER TABLE `gateways`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=904;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
