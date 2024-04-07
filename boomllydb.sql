-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 10, 2024 at 11:52 AM
-- Server version: 11.2.2-MariaDB
-- PHP Version: 8.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boomllydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `addcoins`
--

CREATE TABLE `addcoins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `playerid` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `coin` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `trans_date` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addcoins`
--

INSERT INTO `addcoins` (`id`, `playerid`, `image`, `name`, `email`, `coin`, `status`, `trans_date`, `created_at`, `updated_at`) VALUES
(2, '3528169300', '16cf9fd3fdb0cc5935864375574bcf6f.jpg', 'chandan', 'raggen@gmail.com', '500', '2', 'Friday 25th February 2022 09:29:45 AM', '2022-02-24 22:29:45', '2022-02-25 06:48:20');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(200) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `role` varchar(200) DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `bio` varchar(200) DEFAULT NULL,
  `birthdate` varchar(200) DEFAULT NULL,
  `website` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `company` varchar(200) DEFAULT NULL,
  `profile_img` varchar(200) DEFAULT NULL,
  `work` varchar(200) DEFAULT NULL,
  `publish_year` varchar(200) DEFAULT NULL,
  `facebook` varchar(200) DEFAULT NULL,
  `instagram` varchar(200) DEFAULT NULL,
  `twitter` varchar(200) DEFAULT NULL,
  `linkedin` varchar(200) DEFAULT NULL,
  `youtube` varchar(200) DEFAULT NULL,
  `whatsapp` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `role`, `password`, `bio`, `birthdate`, `website`, `phone`, `country`, `company`, `profile_img`, `work`, `publish_year`, `facebook`, `instagram`, `twitter`, `linkedin`, `youtube`, `whatsapp`, `created_at`, `updated_at`) VALUES
(1, 'Firehawks', 'Firehawks', 'admin@gmail.com', 'Admin', '$2y$10$ZHIe9VD/tS5p4kYHqXb.uuyMGXLIXDQ/.L17rDNT5nwdz9ZQBDnKa', 'retete', '2021-07-01', 'ramo.co.in', '9977696444', 'India', 'Firehawks 24X7 Games Pvt. Ltd.', 'logo.png', NULL, NULL, '#', '#', '#', '#', '#', '#', NULL, '2023-12-18 09:15:52');

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `ID` int(11) NOT NULL,
  `unique_index` int(11) DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `updated_at` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`ID`, `unique_index`, `url`, `updated_at`, `created_at`) VALUES
(1, 1, 'https://res.cloudinary.com/df6mzmw3v/image/upload/v1703834453/kjtkrm7um23ugr3eteqe.jpg', '2023-12-28 03:55:39', '2023-12-28 03:55:39'),
(2, 2, 'https://res.cloudinary.com/df6mzmw3v/image/upload/v1704004966/zcrdbgguxpbpyegjjcsc.jpg', '2023-12-28 03:58:19', '2023-12-28 03:58:19'),
(3, 3, 'https://res.cloudinary.com/df6mzmw3v/image/upload/v1704005032/fougegkse5eczzaevj8e.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bid_value` varchar(200) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`id`, `bid_value`, `updated_at`, `created_at`) VALUES
(22, '20', '2023-12-30 06:27:05', '2023-12-15 03:37:46'),
(17, '0', '2023-12-12 10:10:35', '2023-12-12 10:10:35'),
(21, '10', '2023-12-15 02:28:35', '2023-12-15 02:28:35'),
(19, '434', '2023-12-12 13:10:33', '2023-12-12 13:10:33'),
(20, '5000', '2023-12-13 13:39:34', '2023-12-13 13:39:34'),
(18, '1000', '2023-12-12 12:57:33', '2023-12-12 12:57:33');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `message` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `created_at`, `updated_at`, `name`, `email`, `phone`, `subject`, `message`) VALUES
(19, '2022-04-10 23:09:33', '2022-04-10 23:09:33', 'Chandan Kumar', 'webplustechsolutions@gmail.com', NULL, 'Customize Header & footer in elementor', 'Customize Header & footer in elementor'),
(21, '2024-02-08 21:20:45', '2024-02-08 21:20:45', 'Theodore', 'jNPXNF.qpqjhwq@sabletree.foundation', NULL, 'Angelina Cabrera', 'Angelina Cabrera');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `shortname` varchar(2) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `phonecode` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `shortname`, `name`, `phonecode`) VALUES
(1, 'AF', 'Afghanistan', 93),
(2, 'AL', 'Albania', 355),
(3, 'DZ', 'Algeria', 213),
(4, 'AS', 'American Samoa', 1684),
(5, 'AD', 'Andorra', 376),
(6, 'AO', 'Angola', 244),
(7, 'AI', 'Anguilla', 1264),
(8, 'AQ', 'Antarctica', 0),
(9, 'AG', 'Antigua And Barbuda', 1268),
(10, 'AR', 'Argentina', 54),
(11, 'AM', 'Armenia', 374),
(12, 'AW', 'Aruba', 297),
(13, 'AU', 'Australia', 61),
(14, 'AT', 'Austria', 43),
(15, 'AZ', 'Azerbaijan', 994),
(16, 'BS', 'Bahamas The', 1242),
(17, 'BH', 'Bahrain', 973),
(18, 'BD', 'Bangladesh', 880),
(19, 'BB', 'Barbados', 1246),
(20, 'BY', 'Belarus', 375),
(21, 'BE', 'Belgium', 32),
(22, 'BZ', 'Belize', 501),
(23, 'BJ', 'Benin', 229),
(24, 'BM', 'Bermuda', 1441),
(25, 'BT', 'Bhutan', 975),
(26, 'BO', 'Bolivia', 591),
(27, 'BA', 'Bosnia and Herzegovina', 387),
(28, 'BW', 'Botswana', 267),
(29, 'BV', 'Bouvet Island', 0),
(30, 'BR', 'Brazil', 55),
(31, 'IO', 'British Indian Ocean Territory', 246),
(32, 'BN', 'Brunei', 673),
(33, 'BG', 'Bulgaria', 359),
(34, 'BF', 'Burkina Faso', 226),
(35, 'BI', 'Burundi', 257),
(36, 'KH', 'Cambodia', 855),
(37, 'CM', 'Cameroon', 237),
(38, 'CA', 'Canada', 1),
(39, 'CV', 'Cape Verde', 238),
(40, 'KY', 'Cayman Islands', 1345),
(41, 'CF', 'Central African Republic', 236),
(42, 'TD', 'Chad', 235),
(43, 'CL', 'Chile', 56),
(44, 'CN', 'China', 86),
(45, 'CX', 'Christmas Island', 61),
(46, 'CC', 'Cocos insert into countries (id, shortname, name, phonecode) values (Keeling) Islands', 672),
(47, 'CO', 'Colombia', 57),
(48, 'KM', 'Comoros', 269),
(49, 'CG', 'Congo', 242),
(50, 'CD', 'Congo The Democratic Republic Of The', 242),
(51, 'CK', 'Cook Islands', 682),
(52, 'CR', 'Costa Rica', 506),
(53, 'CI', 'Cote D\'Ivoire insert into countries (id, shortname, name, phonecode) values (Ivory Coast)', 225),
(54, 'HR', 'Croatia insert into countries (id, shortname, name, phonecode) values (Hrvatska)', 385),
(55, 'CU', 'Cuba', 53),
(56, 'CY', 'Cyprus', 357),
(57, 'CZ', 'Czech Republic', 420),
(58, 'DK', 'Denmark', 45),
(59, 'DJ', 'Djibouti', 253),
(60, 'DM', 'Dominica', 1767),
(61, 'DO', 'Dominican Republic', 1809),
(62, 'TP', 'East Timor', 670),
(63, 'EC', 'Ecuador', 593),
(64, 'EG', 'Egypt', 20),
(65, 'SV', 'El Salvador', 503),
(66, 'GQ', 'Equatorial Guinea', 240),
(67, 'ER', 'Eritrea', 291),
(68, 'EE', 'Estonia', 372),
(69, 'ET', 'Ethiopia', 251),
(70, 'XA', 'External Territories of Australia', 61),
(71, 'FK', 'Falkland Islands', 500),
(72, 'FO', 'Faroe Islands', 298),
(73, 'FJ', 'Fiji Islands', 679),
(74, 'FI', 'Finland', 358),
(75, 'FR', 'France', 33),
(76, 'GF', 'French Guiana', 594),
(77, 'PF', 'French Polynesia', 689),
(78, 'TF', 'French Southern Territories', 0),
(79, 'GA', 'Gabon', 241),
(80, 'GM', 'Gambia The', 220),
(81, 'GE', 'Georgia', 995),
(82, 'DE', 'Germany', 49),
(83, 'GH', 'Ghana', 233),
(84, 'GI', 'Gibraltar', 350),
(85, 'GR', 'Greece', 30),
(86, 'GL', 'Greenland', 299),
(87, 'GD', 'Grenada', 1473),
(88, 'GP', 'Guadeloupe', 590),
(89, 'GU', 'Guam', 1671),
(90, 'GT', 'Guatemala', 502),
(91, 'XU', 'Guernsey and Alderney', 44),
(92, 'GN', 'Guinea', 224),
(93, 'GW', 'Guinea-Bissau', 245),
(94, 'GY', 'Guyana', 592),
(95, 'HT', 'Haiti', 509),
(96, 'HM', 'Heard and McDonald Islands', 0),
(97, 'HN', 'Honduras', 504),
(98, 'HK', 'Hong Kong S.A.R.', 852),
(99, 'HU', 'Hungary', 36),
(100, 'IS', 'Iceland', 354),
(101, 'IN', 'India', 91),
(102, 'ID', 'Indonesia', 62),
(103, 'IR', 'Iran', 98),
(104, 'IQ', 'Iraq', 964),
(105, 'IE', 'Ireland', 353),
(106, 'IL', 'Israel', 972),
(107, 'IT', 'Italy', 39),
(108, 'JM', 'Jamaica', 1876),
(109, 'JP', 'Japan', 81),
(110, 'XJ', 'Jersey', 44),
(111, 'JO', 'Jordan', 962),
(112, 'KZ', 'Kazakhstan', 7),
(113, 'KE', 'Kenya', 254),
(114, 'KI', 'Kiribati', 686),
(115, 'KP', 'Korea North', 850),
(116, 'KR', 'Korea South', 82),
(117, 'KW', 'Kuwait', 965),
(118, 'KG', 'Kyrgyzstan', 996),
(119, 'LA', 'Laos', 856),
(120, 'LV', 'Latvia', 371),
(121, 'LB', 'Lebanon', 961),
(122, 'LS', 'Lesotho', 266),
(123, 'LR', 'Liberia', 231),
(124, 'LY', 'Libya', 218),
(125, 'LI', 'Liechtenstein', 423),
(126, 'LT', 'Lithuania', 370),
(127, 'LU', 'Luxembourg', 352),
(128, 'MO', 'Macau S.A.R.', 853),
(129, 'MK', 'Macedonia', 389),
(130, 'MG', 'Madagascar', 261),
(131, 'MW', 'Malawi', 265),
(132, 'MY', 'Malaysia', 60),
(133, 'MV', 'Maldives', 960),
(134, 'ML', 'Mali', 223),
(135, 'MT', 'Malta', 356),
(136, 'XM', 'Man insert into countries (id, shortname, name, phonecode) values (Isle of)', 44),
(137, 'MH', 'Marshall Islands', 692),
(138, 'MQ', 'Martinique', 596),
(139, 'MR', 'Mauritania', 222),
(140, 'MU', 'Mauritius', 230),
(141, 'YT', 'Mayotte', 269),
(142, 'MX', 'Mexico', 52),
(143, 'FM', 'Micronesia', 691),
(144, 'MD', 'Moldova', 373),
(145, 'MC', 'Monaco', 377),
(146, 'MN', 'Mongolia', 976),
(147, 'MS', 'Montserrat', 1664),
(148, 'MA', 'Morocco', 212),
(149, 'MZ', 'Mozambique', 258),
(150, 'MM', 'Myanmar', 95),
(151, 'NA', 'Namibia', 264),
(152, 'NR', 'Nauru', 674),
(153, 'NP', 'Nepal', 977),
(154, 'AN', 'Netherlands Antilles', 599),
(155, 'NL', 'Netherlands The', 31),
(156, 'NC', 'New Caledonia', 687),
(157, 'NZ', 'New Zealand', 64),
(158, 'NI', 'Nicaragua', 505),
(159, 'NE', 'Niger', 227),
(160, 'NG', 'Nigeria', 234),
(161, 'NU', 'Niue', 683),
(162, 'NF', 'Norfolk Island', 672),
(163, 'MP', 'Northern Mariana Islands', 1670),
(164, 'NO', 'Norway', 47),
(165, 'OM', 'Oman', 968),
(166, 'PK', 'Pakistan', 92),
(167, 'PW', 'Palau', 680),
(168, 'PS', 'Palestinian Territory Occupied', 970),
(169, 'PA', 'Panama', 507),
(170, 'PG', 'Papua new Guinea', 675),
(171, 'PY', 'Paraguay', 595),
(172, 'PE', 'Peru', 51),
(173, 'PH', 'Philippines', 63),
(174, 'PN', 'Pitcairn Island', 0),
(175, 'PL', 'Poland', 48),
(176, 'PT', 'Portugal', 351),
(177, 'PR', 'Puerto Rico', 1787),
(178, 'QA', 'Qatar', 974),
(179, 'RE', 'Reunion', 262),
(180, 'RO', 'Romania', 40),
(181, 'RU', 'Russia', 70),
(182, 'RW', 'Rwanda', 250),
(183, 'SH', 'Saint Helena', 290),
(184, 'KN', 'Saint Kitts And Nevis', 1869),
(185, 'LC', 'Saint Lucia', 1758),
(186, 'PM', 'Saint Pierre and Miquelon', 508),
(187, 'VC', 'Saint Vincent And The Grenadines', 1784),
(188, 'WS', 'Samoa', 684),
(189, 'SM', 'San Marino', 378),
(190, 'ST', 'Sao Tome and Principe', 239),
(191, 'SA', 'Saudi Arabia', 966),
(192, 'SN', 'Senegal', 221),
(193, 'RS', 'Serbia', 381),
(194, 'SC', 'Seychelles', 248),
(195, 'SL', 'Sierra Leone', 232),
(196, 'SG', 'Singapore', 65),
(197, 'SK', 'Slovakia', 421),
(198, 'SI', 'Slovenia', 386),
(199, 'XG', 'Smaller Territories of the UK', 44),
(200, 'SB', 'Solomon Islands', 677),
(201, 'SO', 'Somalia', 252),
(202, 'ZA', 'South Africa', 27),
(203, 'GS', 'South Georgia', 0),
(204, 'SS', 'South Sudan', 211),
(205, 'ES', 'Spain', 34),
(206, 'LK', 'Sri Lanka', 94),
(207, 'SD', 'Sudan', 249),
(208, 'SR', 'Suriname', 597),
(209, 'SJ', 'Svalbard And Jan Mayen Islands', 47),
(210, 'SZ', 'Swaziland', 268),
(211, 'SE', 'Sweden', 46),
(212, 'CH', 'Switzerland', 41),
(213, 'SY', 'Syria', 963),
(214, 'TW', 'Taiwan', 886),
(215, 'TJ', 'Tajikistan', 992),
(216, 'TZ', 'Tanzania', 255),
(217, 'TH', 'Thailand', 66),
(218, 'TG', 'Togo', 228),
(219, 'TK', 'Tokelau', 690),
(220, 'TO', 'Tonga', 676),
(221, 'TT', 'Trinidad And Tobago', 1868),
(222, 'TN', 'Tunisia', 216),
(223, 'TR', 'Turkey', 90),
(224, 'TM', 'Turkmenistan', 7370),
(225, 'TC', 'Turks And Caicos Islands', 1649),
(226, 'TV', 'Tuvalu', 688),
(227, 'UG', 'Uganda', 256),
(228, 'UA', 'Ukraine', 380),
(229, 'AE', 'United Arab Emirates', 971),
(230, 'GB', 'United Kingdom', 44),
(231, 'US', 'United States', 1),
(232, 'UM', 'United States Minor Outlying Islands', 1),
(233, 'UY', 'Uruguay', 598),
(234, 'UZ', 'Uzbekistan', 998),
(235, 'VU', 'Vanuatu', 678),
(236, 'VA', 'Vatican City State insert into countries (id, shortname, name, phonecode) values (Holy See)', 39),
(237, 'VE', 'Venezuela', 58),
(238, 'VN', 'Vietnam', 84),
(239, 'VG', 'Virgin Islands insert into countries (id, shortname, name, phonecode) values (British)', 1284),
(240, 'VI', 'Virgin Islands insert into countries (id, shortname, name, phonecode) values (US)', 1340),
(241, 'WF', 'Wallis And Futuna Islands', 681),
(242, 'EH', 'Western Sahara', 212),
(243, 'YE', 'Yemen', 967),
(244, 'YU', 'Yugoslavia', 38),
(245, 'ZM', 'Zambia', 260),
(246, 'ZW', 'Zimbabwe', 263);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(200) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `faq_title` varchar(200) NOT NULL,
  `faq_desc` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `created_at`, `updated_at`, `faq_title`, `faq_desc`) VALUES
(4, '2022-04-10 06:15:07', '2022-04-10 06:15:07', 'Login Related', 'Can I login with multiple accounts on my phone?\r\nNo, you can only login with one account on your device.\r\nI’m unable to login even after providing my email address.\r\nThat shouldn’t be happening. Please send us an email about the issue at support@eliteludo.com\r\nHow to Install?\r\nClick on the download app button. The installation doesn’t take a lot of time and is simple. Once you open the apk file, your phone will ask for permission. Click ‘allow’ on all permission requests and install the app on to your phone. We promise you our game is safe and secure!'),
(5, '2022-04-10 06:15:55', '2022-04-10 06:15:55', 'Game Related', 'I am from Andhra Pradesh / Assam / Odisha / Sikkim / Meghalaya / Nagaland / Arunachal Pradesh / Telangana and am unable to play paid games. Why am I only allowed to play free games?\r\nThe laws pertaining to skill games in these states differ from the rest of India where any person above 18 years can play paid games on our app.'),
(6, '2022-04-10 06:16:26', '2022-04-10 06:16:26', 'Payments & Withdrawal Related', 'What is a ‘Wallet’?\r\nWallet is the icon you see below your name along with an amount. Clicking on it will take you to the ‘My Wallet’ page which has details like your Added Amount, Winnings, Bonus and Transaction History.\r\nIs it safe to add money to the wallet?\r\nYes, adding money to your wallet is absolutely safe. We have partnerships with the best in the industry who ensure the money transactions are smooth and safe. You can add money using UPI, net banking, wallets, credit cards and debit cards.\r\nI am not able to withdraw my Bonus Cash. Why?\r\nBonus Cash is not withdrawable. A portion of your bonus cash along with your deposits is used for tournament registrations.'),
(7, '2022-04-10 06:16:48', '2022-04-10 06:16:48', 'Referral Related', 'How long does it take to receive the referral amount?\r\nIt’s done instantly as soon as your friend joins and performs the actions mentioned in the referral policy at the time of being referred by you. In case your referral is delayed by more than a few minutes, email us here support@ludosupreme.com\r\nWhat are your referral terms and policy?\r\nCheck our referral policy from Settings > Refer & Earn.'),
(8, '2022-04-10 06:17:05', '2022-04-10 06:17:05', 'Profile Related', 'Can I add a display picture?\r\nYes, you can add a display picture by going to the ‘My Profile’ section and clicking on the icon above your name. Now, you can either add a photo from your phone gallery or even take a picture. To edit an existing photo, follow the same steps and add a different picture.');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `playerid` varchar(200) DEFAULT NULL,
  `friendsid` varchar(200) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `coin` varchar(200) DEFAULT NULL,
  `status` varchar(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gamehistories`
--

CREATE TABLE `gamehistories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `playerid` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `bid_amount` varchar(200) DEFAULT NULL,
  `Win_amount` varchar(200) DEFAULT NULL,
  `loss_amount` varchar(200) DEFAULT NULL,
  `seat_limit` varchar(200) DEFAULT NULL,
  `oppo1` varchar(200) DEFAULT NULL,
  `oppo2` varchar(200) DEFAULT NULL,
  `oppo3` varchar(200) DEFAULT NULL,
  `playername` varchar(200) DEFAULT NULL,
  `finalamount` varchar(200) DEFAULT NULL,
  `playtime` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gamehistories`
--

INSERT INTO `gamehistories` (`id`, `created_at`, `updated_at`, `playerid`, `status`, `bid_amount`, `Win_amount`, `loss_amount`, `seat_limit`, `oppo1`, `oppo2`, `oppo3`, `playername`, `finalamount`, `playtime`) VALUES
(1, NULL, NULL, 'LUDO249188', 'loss', '0', '0', '0', '2', 'Saumit', NULL, NULL, 'Jhonny Bro', '5000', 'Tuesday 12th December 2023 09:12:51 PM'),
(2, NULL, NULL, 'LUDO1103822', 'loss', '0', '0', '0', '2', 'Rudransh', NULL, NULL, 'ASAEA', '500', 'Tuesday 12th December 2023 11:22:17 PM'),
(3, NULL, NULL, 'LUDO8700019', 'loss', '0', '0', '0', '2', 'Zubair', NULL, NULL, 'fihruvh', '500', 'Tuesday 12th December 2023 11:22:30 PM'),
(4, NULL, NULL, 'LUDO1103822', 'loss', '0', '0', '0', NULL, 'fihruvh', 'fihruvh', 'fihruvh', 'ASAEA', '500', 'Tuesday 12th December 2023 11:24:00 PM'),
(5, NULL, NULL, 'LUDO5321427', 'loss', '0', '0', '0', NULL, 'JhonnyTest', 'JhonnyTest', 'JhonnyTest', 'fuvrhch', '500', 'Tuesday 12th December 2023 11:49:12 PM'),
(6, NULL, NULL, 'LUDO5652922', 'win', '0', '0', '0', NULL, 'JhonnyTest', 'JhonnyTest', 'JhonnyTest', 'hdgdg', '500', 'Tuesday 12th December 2023 11:49:13 PM'),
(7, NULL, NULL, 'LUDO5321427', 'loss', '0', '0', '0', '4', 'Zubair', 'Rihaan', 'Hridhaan', 'fuvrhch', '500', 'Tuesday 12th December 2023 11:56:10 PM'),
(8, NULL, NULL, 'LUDO5158600', 'loss', '0', '0', '0', '2', 'Mohan Kumar', NULL, NULL, 'sumit', '500', 'Wednesday 13th December 2023 12:09:54 AM'),
(9, NULL, NULL, 'LUDO2974272', 'loss', '0', '0', '0', '2', NULL, NULL, NULL, 'Ajeet', '500', 'Wednesday 13th December 2023 12:26:17 AM'),
(10, NULL, NULL, 'LUDO2974272', 'loss', '0', '0', '0', '2', 'Jiyaan', NULL, NULL, 'Ajeet', '500', 'Wednesday 13th December 2023 12:29:50 AM'),
(11, NULL, NULL, 'LUDO4215715', 'loss', '434', '0', '434', '2', 'Rudransh', NULL, NULL, 'rdfgddxc', '66', 'Wednesday 13th December 2023 04:38:05 PM'),
(12, NULL, NULL, 'LUDO6844722', 'loss', '0', '0', '0', '4', 'Nivaan', 'Vijay Murli', 'Prasanth V', 'Sunil', '500', 'Thursday 14th December 2023 01:07:14 AM'),
(13, NULL, NULL, 'LUDO5310353', 'loss', '0', '0', '0', '2', 'Saumit', NULL, NULL, 'nikita', '500', 'Thursday 14th December 2023 09:43:26 AM'),
(14, NULL, NULL, 'LUDO8156494', 'loss', '0', '0', '0', '2', NULL, NULL, NULL, 'abhay34214', '500', 'Thursday 14th December 2023 11:17:35 AM'),
(15, NULL, NULL, 'LUDO2224145', 'loss', '0', '0', '0', NULL, 'Nirved', NULL, NULL, 'sdsdwww', '500', 'Friday 15th December 2023 01:44:25 PM'),
(16, NULL, NULL, 'LUDO6129542', 'loss', '0', '0', '0', NULL, 'rtyuo', 'rtyuo', 'rtyuo', 'azsdfg', '500', 'Friday 15th December 2023 06:07:36 PM'),
(17, NULL, NULL, 'LUDO3841494', 'win', '0', '0', '0', NULL, 'azsdfg', 'azsdfg', 'azsdfg', 'fig chi', '500', 'Friday 15th December 2023 06:07:36 PM'),
(18, NULL, NULL, 'LUDO8594197', 'loss', '20', '0', '20', NULL, 'fig chi', 'fig chi', 'fig chi', 'xfdhj', '480', 'Sunday 17th December 2023 05:51:08 PM'),
(19, NULL, NULL, 'LUDO8096687', 'win', '20', '32', '20', NULL, 'sdfghd', 'sdfghd', 'sdfghd', 'hsiebd', '512', 'Sunday 17th December 2023 05:51:10 PM'),
(20, NULL, NULL, 'LUDO5552822', 'win', '0', '32', '0', NULL, 'hiijuu', 'hiijuu', 'hiijuu', 'ysishjx', '500', 'Sunday 17th December 2023 06:35:29 PM');

-- --------------------------------------------------------

--
-- Table structure for table `homedetails`
--

CREATE TABLE `homedetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `heading` longtext DEFAULT NULL,
  `subheading` longtext DEFAULT NULL,
  `bannerimg` longtext DEFAULT NULL,
  `about_title` longtext DEFAULT NULL,
  `about_desc` longtext DEFAULT NULL,
  `about_setp1` longtext DEFAULT NULL,
  `about_step2` longtext DEFAULT NULL,
  `about_step3` longtext DEFAULT NULL,
  `about_img` longtext DEFAULT NULL,
  `fe_title` longtext DEFAULT NULL,
  `fe_desc` longtext DEFAULT NULL,
  `fetitle1` varchar(200) DEFAULT NULL,
  `fedesc1` varchar(200) DEFAULT NULL,
  `feicon1` varchar(200) DEFAULT NULL,
  `fetitle2` varchar(200) DEFAULT NULL,
  `fedesc2` varchar(200) DEFAULT NULL,
  `feicon2` varchar(200) DEFAULT NULL,
  `fetitle3` varchar(200) DEFAULT NULL,
  `fedesc3` varchar(200) DEFAULT NULL,
  `feicon3` varchar(200) DEFAULT NULL,
  `fetitle4` varchar(200) DEFAULT NULL,
  `fedesc4` varchar(200) DEFAULT NULL,
  `feicon4` varchar(200) DEFAULT NULL,
  `fetitle5` varchar(200) DEFAULT NULL,
  `fedesc5` varchar(200) DEFAULT NULL,
  `feicon5` varchar(200) DEFAULT NULL,
  `fetitle6` varchar(200) DEFAULT NULL,
  `fedesc6` varchar(200) DEFAULT NULL,
  `feicon6` varchar(200) DEFAULT NULL,
  `download_title` longtext DEFAULT NULL,
  `download_desc` longtext DEFAULT NULL,
  `download_image` longtext DEFAULT NULL,
  `download_link` longtext DEFAULT NULL,
  `screenshot_title` longtext DEFAULT NULL,
  `screenshot_desc` longtext DEFAULT NULL,
  `contact_image` longtext DEFAULT NULL,
  `contact_video` longtext DEFAULT NULL,
  `totalinstall` varchar(200) DEFAULT NULL,
  `totaldownload` varchar(200) DEFAULT NULL,
  `activeuser` varchar(200) DEFAULT NULL,
  `satisfieduser` varchar(200) DEFAULT NULL,
  `cardtitle1` varchar(200) DEFAULT NULL,
  `carddescr1` varchar(200) DEFAULT NULL,
  `cardicon1` varchar(200) DEFAULT NULL,
  `cardtitle2` varchar(200) DEFAULT NULL,
  `carddescr2` varchar(200) DEFAULT NULL,
  `cardicon2` varchar(200) DEFAULT NULL,
  `cardtitle3` varchar(200) DEFAULT NULL,
  `carddescr3` varchar(200) DEFAULT NULL,
  `cardicon3` varchar(200) DEFAULT NULL,
  `cardtitle4` varchar(200) DEFAULT NULL,
  `carddescr4` varchar(200) DEFAULT NULL,
  `cardicon4` varchar(200) DEFAULT NULL,
  `testimonial_title` mediumtext DEFAULT NULL,
  `testimonial_desc` mediumtext DEFAULT NULL,
  `contact_title` mediumtext DEFAULT NULL,
  `contact_desc` mediumtext DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homedetails`
--

INSERT INTO `homedetails` (`id`, `created_at`, `updated_at`, `heading`, `subheading`, `bannerimg`, `about_title`, `about_desc`, `about_setp1`, `about_step2`, `about_step3`, `about_img`, `fe_title`, `fe_desc`, `fetitle1`, `fedesc1`, `feicon1`, `fetitle2`, `fedesc2`, `feicon2`, `fetitle3`, `fedesc3`, `feicon3`, `fetitle4`, `fedesc4`, `feicon4`, `fetitle5`, `fedesc5`, `feicon5`, `fetitle6`, `fedesc6`, `feicon6`, `download_title`, `download_desc`, `download_image`, `download_link`, `screenshot_title`, `screenshot_desc`, `contact_image`, `contact_video`, `totalinstall`, `totaldownload`, `activeuser`, `satisfieduser`, `cardtitle1`, `carddescr1`, `cardicon1`, `cardtitle2`, `carddescr2`, `cardicon2`, `cardtitle3`, `carddescr3`, `cardicon3`, `cardtitle4`, `carddescr4`, `cardicon4`, `testimonial_title`, `testimonial_desc`, `contact_title`, `contact_desc`) VALUES
(1, NULL, '2023-12-15 10:07:34', 'Online Real Money Ludo Game', 'Boomlly is a classic board game played online. Play the dice game! Recall your childhood! In some places.\r\n\r\nBeing one of the top games played worldwide, Boomlly has been rated as the best casual game in the board games genre. Boomlly is a cross-platform multiplayer game available on Android and IOS. The modes available are Online Multiplayer and Computer Mode.\r\n\r\nWe took your love for mobile gaming and gave it an interesting spin!\r\n\r\nWe keep your gaming experience fun by offering you a variety of tournaments and battles around the clock.\r\n\r\nSimply participate, compete and win cash prizes all day! Once the results are announced for a tournament, winners can cash-out immediately with Paytm, UPI or bank transfer.\r\n\r\nThere is more than one way to earn on Boomlly. Refer the app to your friends and family and earn cash every time they join the app. So what are you waiting for? Download the app NOW and start winning!', 'logo.png', 'Boomlly', 'Ludo game is one of the most popular board games in India. The game has its roots related to the bygone game of \'Pachisi,\' which was a bit more tricky and the present-day Ludo game is a simplified version of it. We know you have a lot of childhood memories associated with the Ludo game, and it has managed to keep you entertained up to this point.', '', '', '', 'logo.png', 'Boomly Ludo Features', 'Objectively deliver professional value with diverse web-readiness. Collaboratively transition wireless customer service without goal-oriented catalysts for change. Collaboratively.', 'Responsive web design', 'Modular and monetize an componente between layouts monetize array. Core competencies for testing.', '<i class=\"las la-desktop\"></i>', 'Loaded with features', 'Holisticly aggregate client centered the manufactured products transparent. Organic sources content.', '<i class=\"las la-swatchbook\"></i>', 'Friendly online support', 'Monotonectally recaptiualize client the centric customize clicks niche markets for this meta-services via.', '<i class=\"las la-headset\"></i>', 'Free updates forever', 'Compellingly formulate installed base imperatives high standards in benefits for highly efficient client.', '<i class=\"lab la-buromobelexperte\"></i>', 'Built with Sass', 'Energistically initiate client-centric the maximize market positioning synergy rather client-based data.', '<i class=\"lab la-sass\"></i>', 'Infinite colors', 'Energistically initiate client-centric e-tailers rather than-based data. Morph business technology before.', '<i class=\"las la-palette\"></i>', 'Download The Latest Version', 'Earn Real Cash While Having Fun Playing Ludo Games. Take Part In Ludo Leagues. Real Players And Fast Withdrawals Only On Boomly. Download App And Play Right Now.', 'New Screen (18).png', 'Boomly.apk', 'Apps Screenshots', 'Proactively impact value-added channels via backend leadership skills. Efficiently revolutionize worldwide networks whereas strategic catalysts for change.', 'rtyrt.png', 'https://www.youtube.com/watch?v=80y2FxcAUhY', '45644', '45644', '5453', '4547', 'Bots Certified', 'All components are built to be used in combination.', '<i class=\"bi bi-robot\"></i>', '100% Secured', 'Quick is optimized to work for most devices.', '<i class=\"bi bi-shield-shaded\"></i>', ' Universal Languages', 'Remain consistent while developing new features.', '<i class=\"bi bi-globe\"></i>', '24x7 Support', 'Change a few variables and the whole theme adapts.', '<i class=\"bi bi-watch\"></i>', 'Winner Review', 'Collaboratively actualize excellent schemas without effective models. Synergistically engineer functionalized applications rather than backend e-commerce.', 'Looking for a excellent Business idea?', 'Give us a call or drop by anytime, we endeavour to answer all enquiries within 24 hours on business days.');

-- --------------------------------------------------------

--
-- Table structure for table `jackpots`
--

CREATE TABLE `jackpots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jackpot_entry` varchar(200) DEFAULT NULL,
  `number_of_game` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jackpots`
--

INSERT INTO `jackpots` (`id`, `jackpot_entry`, `number_of_game`) VALUES
(1, '100', '2');

-- --------------------------------------------------------

--
-- Table structure for table `kycdetails`
--

CREATE TABLE `kycdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `document_number` varchar(200) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `dob` varchar(200) NOT NULL,
  `document_image` varchar(200) NOT NULL,
  `document_type` varchar(200) NOT NULL,
  `verification_status` varchar(200) NOT NULL DEFAULT '0',
  `userid` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(200) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_03_09_074813_create_admins_table', 1),
(5, '2021_06_09_035535_create_faqs_table', 1),
(6, '2021_06_14_040322_create_specials_table', 1),
(7, '2021_06_14_051935_create_kycdetails_table', 1),
(21, '2021_06_14_070353_create_shopcoins_table', 5),
(9, '2021_06_14_100930_create_bids_table', 1),
(10, '2021_06_14_105032_create_transactions_table', 1),
(11, '2021_06_14_125839_create_withdraws_table', 1),
(12, '2021_06_16_021015_create_websettings_table', 1),
(13, '2021_07_21_120338_create_tournaments_table', 1),
(14, '2021_07_23_143916_create_jackpots_table', 1),
(18, '2021_07_25_153224_create_roomdatas_table', 2),
(36, '2021_07_25_145706_create_userdatas_table', 14),
(20, '2021_08_31_104232_create_friends_table', 4),
(38, '2021_11_12_155952_create_homedetails_table', 16),
(24, '2021_11_12_160643_create_screenshots_table', 8),
(30, '2021_11_14_172611_create_contacts_table', 10),
(40, '2022_02_20_200941_create_testimonials_table', 18),
(35, '2022_02_24_204025_create_addcoins_table', 13),
(39, '2022_04_10_083037_create_gamehistories_table', 17),
(41, '2019_12_14_000001_create_personal_access_tokens_table', 19),
(42, '2023_12_16_032607_tournament', 19),
(43, '2023_12_16_032623_tournament_table', 19),
(44, '2023_12_16_032637_tournament_tablemulti', 19);

-- --------------------------------------------------------

--
-- Table structure for table `otps`
--

CREATE TABLE `otps` (
  `ID` int(11) NOT NULL,
  `OTPCode` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(200) NOT NULL,
  `token` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(200) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roomdatas`
--

CREATE TABLE `roomdatas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `roomID` varchar(200) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `creator` varchar(200) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `seat_limit` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `game_mode` varchar(200) DEFAULT NULL,
  `stake_money` varchar(200) DEFAULT NULL,
  `win_money` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `screenshots`
--

CREATE TABLE `screenshots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `screenshot` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `screenshots`
--

INSERT INTO `screenshots` (`id`, `created_at`, `updated_at`, `screenshot`) VALUES
(25, '2023-12-15 10:02:32', '2023-12-15 10:02:32', 'https://i.ibb.co/SXSqv54/ss1.png'),
(26, '2023-12-15 10:02:55', '2023-12-15 10:02:55', 'https://i.ibb.co/DK7LH4p/ss2.png'),
(27, '2023-12-15 10:03:57', '2023-12-15 10:03:57', 'https://i.ibb.co/PjPm7Wn/ss3.png'),
(28, '2023-12-15 10:03:58', '2023-12-15 10:03:58', 'https://i.ibb.co/y6HSF69/ss4.png'),
(29, '2023-12-15 10:04:32', '2023-12-15 10:04:32', 'https://i.ibb.co/XxKCPnz/ss5.png'),
(30, '2023-12-15 10:04:37', '2023-12-15 10:04:37', 'https://i.ibb.co/gZrFGqG/ss6.png'),
(31, '2023-12-15 10:04:47', '2023-12-15 10:04:47', 'https://i.ibb.co/Sv2dc0Q/ss7.png'),
(32, '2023-12-15 10:04:53', '2023-12-15 10:04:53', 'https://i.ibb.co/G0FJPqM/ss8.png'),
(33, '2023-12-15 10:04:59', '2023-12-15 10:04:59', 'https://i.ibb.co/YZv2J6v/ss9.png'),
(34, '2023-12-15 10:05:06', '2023-12-15 10:05:06', 'https://i.ibb.co/1Zf70WG/ss10.png'),
(35, '2023-12-15 10:05:23', '2023-12-15 10:05:23', 'https://i.ibb.co/v46tcrn/ss11.png'),
(37, '2023-12-15 10:19:02', '2023-12-15 10:19:02', 'https://i.ibb.co/thPX6jL/ss12.png'),
(38, '2023-12-15 10:19:03', '2023-12-15 10:19:03', 'https://i.ibb.co/X5mjBxV/ss13.png');

-- --------------------------------------------------------

--
-- Table structure for table `shopcoins`
--

CREATE TABLE `shopcoins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shop_coin` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shopcoins`
--

INSERT INTO `shopcoins` (`id`, `created_at`, `updated_at`, `shop_coin`) VALUES
(12, '2021-10-20 19:56:05', '2021-10-20 19:56:05', '400'),
(14, '2021-10-20 19:56:12', '2021-10-20 19:56:12', '250'),
(15, '2021-10-20 19:56:18', '2021-10-20 19:56:18', '200'),
(16, '2021-10-20 19:56:24', '2021-10-20 19:56:24', '150'),
(17, '2021-10-20 19:56:24', '2021-10-20 19:56:24', '150'),
(18, '2021-10-20 19:56:29', '2021-10-20 19:56:29', '100'),
(19, '2021-10-20 19:56:34', '2021-10-20 19:56:34', '80'),
(20, '2021-10-20 19:56:38', '2021-10-20 19:56:38', '50'),
(26, '2023-12-30 06:30:18', '2023-12-30 06:30:18', '100');

-- --------------------------------------------------------

--
-- Table structure for table `specials`
--

CREATE TABLE `specials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `offer_title` varchar(200) NOT NULL,
  `add_offer_coin` varchar(200) NOT NULL,
  `user_received_coin` varchar(200) NOT NULL,
  `offerimage` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `profile_image` varchar(200) DEFAULT NULL,
  `Designation` varchar(200) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `usermail` varchar(200) DEFAULT NULL,
  `Star` varchar(200) DEFAULT NULL,
  `Review` longtext DEFAULT NULL,
  `submit_date` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `profile_image`, `Designation`, `username`, `usermail`, `Star`, `Review`, `submit_date`, `created_at`, `updated_at`) VALUES
(1, '', 'Active User', 'Rohan', 'rmgroupmp@gmail.com', '5', 'I\'ve been a passionate Ludo player for years, and this site has taken my gaming experience to a whole new level! The interface is intuitive, the gameplay is smooth, and the variety of game modes keeps me hooked for hours. Highly recommended for anyone looking for some fun and competitive Ludo action!', 'Sunday 10th April 2022 05:22:47 PM', '2022-04-10 06:23:05', '2022-04-10 06:23:05'),
(2, '', 'Active User', 'Vikram', 'rmgroupmp@gmail.com', '5', 'As a parent, finding a safe and enjoyable online gaming platform for my kids is crucial. This Ludo site has been a lifesaver! Not only is it easy for my children to navigate, but the built-in chat filters and strict moderation ensure a wholesome and secure gaming environment. It\'s fantastic to see them having a blast while staying safe online', 'Sunday 10th April 2022 05:22:47 PM', '2022-04-10 06:23:05', '2022-04-10 06:23:05'),
(3, '', 'Active User', 'Aryan', 'rmgroupmp@gmail.com', '5', 'I\'ve tried various Ludo platforms, but none compare to the excitement and engagement I\'ve found on this site. The tournaments and leaderboards add a competitive edge, making every move and strategy count. Plus, the community here is incredibly friendly, creating a fantastic social aspect that keeps me coming back for more', 'Sunday 10th April 2022 05:22:47 PM', '2022-04-10 06:23:05', '2022-04-10 06:23:05'),
(4, '', 'Active User', 'Devendra', 'rmgroupmp@gmail.com', '5', 'I stumbled upon this Ludo site recently, and it\'s become my go-to destresser after a long day. The calming graphics and seamless gameplay help me unwind, and the option to play with friends or strangers makes it a versatile choice for anyone seeking relaxation or a bit of friendly competition. Kudos to the developers for creating such an addictive and enjoyable gaming platform!', 'Sunday 10th April 2022 05:22:47 PM', '2022-04-10 06:23:05', '2022-04-10 06:23:05');

-- --------------------------------------------------------

--
-- Table structure for table `tournaments`
--

CREATE TABLE `tournaments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tournament_id` varchar(255) NOT NULL,
  `tournament_name` varchar(200) DEFAULT NULL,
  `prize_pool` bigint(20) DEFAULT NULL,
  `player_type` varchar(200) DEFAULT NULL,
  `winner` varchar(200) DEFAULT NULL,
  `time_start` timestamp(6) NULL DEFAULT NULL,
  `game_type` varchar(200) DEFAULT NULL,
  `entry_fee` bigint(20) DEFAULT NULL,
  `nooftables` varchar(200) DEFAULT NULL,
  `t_status` varchar(200) DEFAULT NULL,
  `rewards` varchar(50) DEFAULT NULL,
  `perroundamount` int(15) DEFAULT NULL,
  `roundprize` int(15) DEFAULT NULL,
  `updated_at` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tournaments`
--

INSERT INTO `tournaments` (`id`, `tournament_id`, `tournament_name`, `prize_pool`, `player_type`, `winner`, `time_start`, `game_type`, `entry_fee`, `nooftables`, `t_status`, `rewards`, `perroundamount`, `roundprize`, `updated_at`, `created_at`) VALUES
(128, '7dWElAnhPl9XiTQ', 'Sample Tournament', 10000, '1v1', 'LUDO6025367', '2023-12-31 02:30:00.000000', 'timeattack', 50, '4', 'completed', '400', 3333, 3333, '2024-02-05 23:48:18', '2024-02-05 18:18:19'),
(130, '53Hx9Ge966M86c3', 'ssdsdd', 1000, '1v1', NULL, '2024-02-06 03:08:00.000000', 'timeattack', 10, '4', 'ongoing', NULL, 333, 83, '2024-02-06 15:00:25', '2024-02-06 08:39:15');

-- --------------------------------------------------------

--
-- Table structure for table `tournament_tablemultis`
--

CREATE TABLE `tournament_tablemultis` (
  `id` int(11) NOT NULL,
  `tournament_id` varchar(255) NOT NULL,
  `table_id` varchar(255) NOT NULL,
  `game_name` varchar(255) NOT NULL,
  `player_id1` varchar(255) DEFAULT NULL,
  `player_id2` varchar(255) DEFAULT NULL,
  `player_id3` varchar(255) DEFAULT NULL,
  `player_id4` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `player_type` varchar(255) DEFAULT NULL,
  `winner` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tournament_tablemultis`
--

INSERT INTO `tournament_tablemultis` (`id`, `tournament_id`, `table_id`, `game_name`, `player_id1`, `player_id2`, `player_id3`, `player_id4`, `status`, `player_type`, `winner`, `updated_at`, `created_at`) VALUES
(1128, '53Hx9Ge966M86c3', '1', 'ssdsdd 1', NULL, NULL, NULL, NULL, '0/2', '1v1', NULL, '2024-02-06 08:39:15', '2024-02-06 08:39:15'),
(1129, '53Hx9Ge966M86c3', '2', 'ssdsdd 2', NULL, NULL, NULL, NULL, '0/2', '1v1', NULL, '2024-02-06 08:39:15', '2024-02-06 08:39:15'),
(1130, '53Hx9Ge966M86c3', '3', 'ssdsdd 3', NULL, NULL, NULL, NULL, '0/2', '1v1', NULL, '2024-02-06 08:39:15', '2024-02-06 08:39:15'),
(1131, '53Hx9Ge966M86c3', '4', 'ssdsdd 4', NULL, NULL, NULL, NULL, '0/2', '1v1', NULL, '2024-02-06 08:39:15', '2024-02-06 08:39:15');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` varchar(200) NOT NULL,
  `order_id` varchar(200) NOT NULL,
  `txn_id` varchar(200) DEFAULT NULL,
  `amount` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `trans_date` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `userid`, `order_id`, `txn_id`, `amount`, `status`, `trans_date`, `created_at`, `updated_at`) VALUES
(11, 'LUDO100005', 'order_NV7poCAm0zmokJ', NULL, '500', 'Pending', '2024-01-31 12:15:25', '2024-01-31 06:45:25', '2024-01-31 06:45:25'),
(12, '234334', 'order_NVXUO2XQdXsxkm', 'pay_NVXVWElqIEugjA', '1', 'Success', 'Thursday 1st February 2024 01:22:23 PM', '2024-02-01 07:52:23', NULL),
(13, '234334', 'order_NVXUO2XQdXsxkm', 'pay_NVXVWElqIEugjA', '1', 'Success', '2024-02-01 13:23:53', '2024-02-01 07:53:53', NULL),
(14, 'LUDO7798417', 'order_NVXZu7PYsoPdZJ', 'pay_NVXaByRM8eBQzR', '1', 'Success', '2024-02-01 13:26:48', '2024-02-01 07:56:48', NULL),
(15, '4851774', 'order_NWpDPWDGD8SisY', 'pay_NWpEvF60EokOsS', '1', 'Success', '2024-02-04 19:22:14', '2024-02-04 13:52:14', NULL),
(16, '4851774', 'order_NWpIBlULeBfROC', 'pay_NWpIs4f1pac4DQ', '1', 'Success', '2024-02-04 19:25:58', '2024-02-04 13:55:58', NULL),
(17, '4851774', 'order_NWtD3e0cpnmHGz', 'pay_NWtDCq7lttJVDA', '1', 'Success', '2024-02-04 23:15:22', '2024-02-04 17:45:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userdatas`
--

CREATE TABLE `userdatas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `userid` varchar(200) DEFAULT NULL,
  `playerid` varchar(200) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `userphone` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `OTPCode` varchar(200) DEFAULT NULL,
  `useremail` varchar(200) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `refer_code` varchar(200) DEFAULT NULL,
  `used_refer_code` varchar(200) DEFAULT NULL,
  `totalgem` varchar(200) DEFAULT NULL,
  `totalcoin` varchar(200) DEFAULT NULL,
  `playcoin` varchar(200) DEFAULT NULL,
  `wincoin` int(11) DEFAULT NULL,
  `device_token` varchar(200) DEFAULT NULL,
  `registerDate` varchar(200) DEFAULT NULL,
  `refrelCoin` varchar(200) DEFAULT NULL,
  `GamePlayed` varchar(200) NOT NULL DEFAULT '0',
  `twoPlayWin` varchar(200) NOT NULL DEFAULT '0',
  `FourPlayWin` varchar(200) NOT NULL DEFAULT '0',
  `twoPlayloss` varchar(200) NOT NULL DEFAULT '0',
  `FourPlayloss` varchar(200) NOT NULL DEFAULT '0',
  `status` varchar(200) DEFAULT NULL,
  `banned` varchar(200) DEFAULT NULL,
  `accountHolder` varchar(200) DEFAULT NULL,
  `accountNumber` varchar(200) DEFAULT NULL,
  `ifsc` varchar(200) DEFAULT NULL,
  `uniquebankid` varchar(200) DEFAULT NULL,
  `in_game_status` varchar(255) DEFAULT NULL,
  `uniqueupiid` varchar(200) DEFAULT NULL,
  `upi_id` varchar(200) DEFAULT NULL,
  `upi_name` varchar(200) DEFAULT NULL,
  `acc_holder` varchar(200) DEFAULT NULL,
  `tournament_id` varchar(255) DEFAULT NULL,
  `table_id` varchar(255) DEFAULT NULL,
  `bid_pay_status` varchar(255) DEFAULT NULL,
  `kyc_completed` varchar(50) DEFAULT NULL,
  `isbot` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userdatas`
--

INSERT INTO `userdatas` (`id`, `created_at`, `updated_at`, `userid`, `playerid`, `username`, `userphone`, `password`, `OTPCode`, `useremail`, `photo`, `refer_code`, `used_refer_code`, `totalgem`, `totalcoin`, `playcoin`, `wincoin`, `device_token`, `registerDate`, `refrelCoin`, `GamePlayed`, `twoPlayWin`, `FourPlayWin`, `twoPlayloss`, `FourPlayloss`, `status`, `banned`, `accountHolder`, `accountNumber`, `ifsc`, `uniquebankid`, `in_game_status`, `uniqueupiid`, `upi_id`, `upi_name`, `acc_holder`, `tournament_id`, `table_id`, `bid_pay_status`, `kyc_completed`, `isbot`) VALUES
(1, NULL, '2024-02-08 14:44:03', NULL, '1546023', 'Lapi', '6265233750', '$2y$10$6iyi3oxePc.2.2lTMo62oughDSMVdYwgODD5o4sCS1W1l5D5nq3bO', NULL, NULL, NULL, '8738601', NULL, NULL, '100', '100', 0, '123457556', '2024-02-06 08:46:57', '0', '0', '0', '0', '0', '0', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(2, NULL, '2024-02-08 10:58:54', NULL, '1432560', 'Sunil', '8114426363', '$2y$10$17xuRt5pjVoswZTv.JRsJuEqE01sEJYfRM.JmONO9g35oHArZEdY.', NULL, NULL, NULL, '5551640', NULL, NULL, '100', '100', 0, '123458883', '2024-02-06 19:45:24', '0', '0', '0', '0', '0', '0', '1', '1', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 0),
(3, NULL, '2024-02-08 07:21:40', NULL, '6112280', 'payal', '7297838658', '$2y$10$tKUNIVDPrPVk/4YJU3Tm/Od65CK2xiw15dX8WlcCxyaEyKg8q9/56', NULL, NULL, NULL, '4067421', NULL, NULL, '100', '100', 0, '123453274', '2024-02-08 12:51:14', '0', '0', '0', '0', '0', '0', '1', '1', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 0),
(4, NULL, '2024-02-08 10:56:46', NULL, '8901444', 'nikki', '9982690732', '$2y$10$nel.qdKLvQWU.cFdb6fjnufTVtMkSnBusnSuDLKeZ9itFxie4Gklq', NULL, NULL, NULL, '6855730', NULL, NULL, '100', '100', 0, '123451165', '2024-02-08 16:16:30', '0', '0', '0', '0', '0', '0', '1', '1', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `websettings`
--

CREATE TABLE `websettings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `website_name` varchar(200) DEFAULT NULL,
  `website_url` varchar(200) DEFAULT NULL,
  `website_tagline` varchar(200) DEFAULT NULL,
  `website_keyword` varchar(200) DEFAULT NULL,
  `website_desc` text DEFAULT NULL,
  `copyright` varchar(200) DEFAULT NULL,
  `skin_mode` varchar(200) DEFAULT NULL,
  `sideskin_mode` varchar(200) DEFAULT NULL,
  `head_logo` varchar(200) DEFAULT NULL,
  `footer_logo` varchar(200) DEFAULT NULL,
  `favicon` varchar(200) DEFAULT NULL,
  `facebook` varchar(200) DEFAULT NULL,
  `youtube` varchar(200) DEFAULT NULL,
  `twitter` varchar(200) DEFAULT NULL,
  `whatsapp` varchar(200) DEFAULT NULL,
  `linkedin` varchar(200) DEFAULT NULL,
  `pinterest` varchar(200) DEFAULT NULL,
  `instagram` varchar(200) DEFAULT NULL,
  `github` varchar(200) DEFAULT NULL,
  `pnum` varchar(200) DEFAULT NULL,
  `secnum` varchar(200) DEFAULT NULL,
  `pemail` varchar(200) DEFAULT NULL,
  `secemail` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `about_title` varchar(200) DEFAULT NULL,
  `about_slug` varchar(200) DEFAULT NULL,
  `about_desc` longtext DEFAULT NULL,
  `classic_rule` varchar(200) DEFAULT NULL,
  `quick_rule` varchar(200) DEFAULT NULL,
  `arrow_rule` varchar(200) DEFAULT NULL,
  `commission` varchar(200) DEFAULT NULL,
  `signup_bonus` varchar(200) DEFAULT NULL,
  `bot_status` varchar(200) DEFAULT NULL,
  `server_key` varchar(200) DEFAULT NULL,
  `refer_bonus` varchar(200) DEFAULT NULL,
  `min_withdraw` varchar(200) DEFAULT NULL,
  `support_mail` varchar(200) DEFAULT NULL,
  `payment_apikey` varchar(200) DEFAULT NULL,
  `payment_secret` varchar(200) DEFAULT NULL,
  `terms_title` varchar(200) DEFAULT NULL,
  `terms_slug` varchar(200) DEFAULT NULL,
  `terms_desc` longtext DEFAULT NULL,
  `privacy_title` varchar(200) DEFAULT NULL,
  `privacy_slug` varchar(200) DEFAULT NULL,
  `privacy_desc` longtext DEFAULT NULL,
  `whatsapp_link` varchar(200) DEFAULT NULL,
  `youtube_link` varchar(200) DEFAULT NULL,
  `purchase_link` varchar(200) DEFAULT NULL,
  `app_version` varchar(200) DEFAULT NULL,
  `telegram_link` varchar(200) NOT NULL,
  `notification` longtext DEFAULT NULL,
  `paytm_midid` varchar(200) DEFAULT NULL,
  `paytm_secret` varchar(200) DEFAULT NULL,
  `cashfree_apikey` varchar(200) DEFAULT NULL,
  `cashfree_secret` varchar(200) DEFAULT NULL,
  `razorpay_status` varchar(5) DEFAULT NULL,
  `paytm_status` varchar(5) DEFAULT NULL,
  `cashfree_status` varchar(5) DEFAULT NULL,
  `refund_title` varchar(2000) DEFAULT NULL,
  `refund_slug` varchar(2000) DEFAULT NULL,
  `refund_desc` longtext DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `websettings`
--

INSERT INTO `websettings` (`id`, `created_at`, `updated_at`, `website_name`, `website_url`, `website_tagline`, `website_keyword`, `website_desc`, `copyright`, `skin_mode`, `sideskin_mode`, `head_logo`, `footer_logo`, `favicon`, `facebook`, `youtube`, `twitter`, `whatsapp`, `linkedin`, `pinterest`, `instagram`, `github`, `pnum`, `secnum`, `pemail`, `secemail`, `address`, `about_title`, `about_slug`, `about_desc`, `classic_rule`, `quick_rule`, `arrow_rule`, `commission`, `signup_bonus`, `bot_status`, `server_key`, `refer_bonus`, `min_withdraw`, `support_mail`, `payment_apikey`, `payment_secret`, `terms_title`, `terms_slug`, `terms_desc`, `privacy_title`, `privacy_slug`, `privacy_desc`, `whatsapp_link`, `youtube_link`, `purchase_link`, `app_version`, `telegram_link`, `notification`, `paytm_midid`, `paytm_secret`, `cashfree_apikey`, `cashfree_secret`, `razorpay_status`, `paytm_status`, `cashfree_status`, `refund_title`, `refund_slug`, `refund_desc`) VALUES
(1, '2021-07-25 04:14:32', '2024-01-11 08:11:56', 'Boomlly', 'https://boomlly.com/', 'Boomlly Real Money Online Game', 'Ludo,realmoney,earning app,Boomlly', 'Boomlly Is Strategic Board Game Where You Can Challenge Your Opponent With Real Money. Boomlly Is A Best Ludo Online Game Tournament App', 'Copyright @ 2023 Ramo Pvt Ltd', 'dark-layout', 'menu-light', 'loho.png', 'loho.png', 'logo.jpg', '#', '#', '#', '#https://whatsapp.com/channel/0029Va4ydTgAojYnH5E1VQ3U', '#', '#', '#https://www.instagram.com/boomlly.com_?igshid=OGQ5ZDc2ODk2ZA==', '#', '9977696444', '9977696444', 'Boomlly24x7@gmail.com', 'Boomlly24x7@gmail.com', 'Indore', 'About US', 'about-us', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et sagittis elit. Aliquam commodo nisl quam, ac pellentesque justo dictum ac. Etiam ut purus turpis. Curabitur tristique massa ut urna pretium molestie. Phasellus ut massa nulla. Praesent commodo nulla leo, in consequat arcu tincidunt sit amet. Cras at purus felis. Phasellus aliquet ac erat ac pharetra.</p>\r\n<p>Nunc posuere massa ac mollis molestie. Praesent placerat vitae risus imperdiet pellentesque. Morbi mattis at orci at tempor. Aenean sit amet condimentum arcu, sed interdum nunc. Curabitur mattis enim at purus venenatis maximus. Aenean magna elit, gravida sed mi in, cursus varius lectus. Nulla tristique lorem eu tincidunt pharetra. Nullam pretium sem sed ex dignissim, eu vestibulum ex laoreet. Maecenas felis nulla, semper at dolor et, auctor condimentum sem. Nulla dolor nunc, sollicitudin at leo vestibulum, aliquet tempus ex. Donec fringilla consectetur neque non vehicula.</p>\r\n<p>Aenean nec consequat urna, ut molestie enim. Curabitur eu volutpat risus. Donec ultricies massa sit amet hendrerit cursus. Aenean eget molestie metus. Ut diam lectus, cursus quis diam sed, posuere hendrerit dolor. Quisque orci augue, dictum a commodo at, tincidunt eget tortor. Aenean sapien augue, molestie quis est a, vestibulum hendrerit dolor. Maecenas sit amet sodales purus, vel convallis magna. Phasellus aliquam at ex sit amet laoreet. Pellentesque et augue feugiat, accumsan nisl sed, hendrerit tellus. Aliquam ut congue velit.</p>\r\n<p>Integer ut tortor ante. Sed id magna quis felis egestas ullamcorper eget quis dolor. In hendrerit magna ac lacus luctus, quis facilisis diam consectetur. Maecenas sodales placerat nisi, id lacinia purus malesuada eget. Phasellus venenatis laoreet faucibus. Donec et est at ipsum porta feugiat non ut lacus. Mauris sit amet vulputate ligula, a convallis sem. Nullam eget dolor tellus. Suspendisse potenti. Integer tellus magna, feugiat sit amet posuere quis, finibus a tortor. Aenean a volutpat libero. Fusce vehicula ultrices augue non suscipit. Mauris in nunc rhoncus justo scelerisque auctor. Aliquam varius pulvinar nisl eu porta. Duis mollis id nisl id tempus.</p>\r\n<p>Phasellus id ligula eu lacus molestie porta eu in arcu. Phasellus ut scelerisque quam. Integer eu nulla metus. Donec ultricies nisi in gravida ultrices. Donec tincidunt lorem in iaculis hendrerit. Nulla et lectus in erat porta pellentesque in a dui. Fusce posuere sem quis turpis suscipit mollis. Praesent eu turpis leo.</p>', 'kundan sah change erter', NULL, NULL, '20', '100', '1', NULL, '50', '50', 'Boomlly24x7@gmail.com', 'rzp_live_FKEjHmNB9F69hs', 'VGeHkCo8vsLxZ3sGCh5h6iKM', 'Terms & Condition', 'terms-&-condition', 'Boomlly is an online platform offered by Firehawks 24x7 games Private Limited (hereinafter referred to as “Company”, “We”, “Us”, or “Our”) that enables any person (“You” or “Your” or “User”) to play the game of ludo online. These terms and conditions of use (“Terms”) along with Privacy Policy (“Privacy Policy”), Fair Play Policy (“Fair Play Policy”) and the cumulative set of Game Rules (defined below) (together, “Platform Policies”) form a legally binding agreement between You and the Company and forms the basis on which You may visit, access, or use our website (www.boomlly.com), the Boomlly mobile applications, including any subdomains of the website, APIs, widgets and/or any data, information, text, graphics, video, sound, pictures, and any other materials appearing, sent, uploaded, communicated, transmitted, or otherwise made available via the Platform (jointly referred to as the “Content”) for participating in various contests and games hosted on the Platform (“Services”).\r\n\r\nYour use of the Platform and the Services indicates Your acceptance of the Platform Policies and hence You are advised to read the Platform Policies carefully before using Our Services. You acknowledge that We provide use and access to our Platform and Services to You, subject to these Terms. You agree and acknowledge that you have completely read and understood the Platform Policies incorporated herein by reference, as amended from time to time. You agree, covenant, and undertake to be bound by the specific rules and regulations of each of the various formats of the Game as applicable. If You do not accept any part of the Platform Policies or any subsequent modification therein, You must stop accessing or using Our Services.\r\n\r\nWe reserve the right to periodically review, update, or otherwise modify any part of the Platform Policies at Our sole and absolute discretion, and accordingly, You are advised to keep Yourself updated on the latest versions of the Platform Policies. We will provide You with notice of any material modification to the Platform Policies, and Your continued access and use of the Services after such notification shall constitute consent to the modified Platform Policies.\r\n\r\nIn the event where one or more of the terms hereunder are determined to be invalid or unlawful for any reason, by a competent judicial or quasi-judicial authority in India, the validity or enforceability of the remaining terms will not be affected and the same will be valid and binding on You.\r\n\r\n1. Definitions:\r\n\r\n 1.1. “Applicable Law (s)” means all applicable statutes, enactments, laws, ordinances, treaties, conventions, protocols, bye-laws, rules, regulations, guidelines, notifications, notices, and/ or judgments, decrees, injunctions, writs or orders, instructions, decisions of any court or any awards or other requirements or official directives of any governmental authority, in any jurisdiction, as may be applicable to the relevant person.\r\n\r\n 1.2. “Bank Account” means a financial account maintained with a Banking Company or a financial institution and shall include a wallet maintained with an entity authorized by Reserve Bank of India.\r\n\r\n 1.3. “Banking Company” means a banking company as defined under section 5(c) of the Banking Regulation Act, 1949.\r\n\r\n 1.4. “Barred States” means any state in the territory of India where online gaming has been prohibited under Applicable Laws.\r\n\r\n 1.5. “Cash Games” mean Games involving a financial stake, as determined by the participants of that Game, in accordance with the Game Rules.\r\n\r\n 1.6. “Communication Feature” means the in-game feature that enables users to interact with each other during a Game.\r\n\r\n  1.7. “Deposit Segment” means the segment of the User account to which the money deposited by a User is credited.\r\n\r\n 1.8. “Discounts” shall include any Game Cash, Free Cash/ LS Cash, Rakeback, variable discounts, prizes or any other incentives (such as bonus, instant cash, Leaderboard) that may be provided by the Company, at its discretion, as a part of a promotional measure that shall be adjusted against the Service Fee chargeable from the User in such manner as may be prescribed under these Terms.\r\n\r\n 1.9. “FreeCash/LS Cash” is an incentive provided by the Company at its discretion, as a part of a promotional measure that is first attributable against the Service Fee charged by the Company in respect of a particular Cash Game.\r\n\r\n 1.10. “Game(s)” means the game of ludo offered on Boomlly and shall include the various formats and variations of ludo available on the Platform.\r\n\r\n 1.11. “Game Rules”, for each Game, means the rules and regulations applicable to a Game which are accessible on the Platform.\r\n\r\n 1.12. “Platform” means the Ludo Select website and related mobile applications on which Games are made available to users in different formats and variations.\r\n\r\n 1.13. “Platform Policies” mean the Terms, Privacy Policy, and Fair Play Policy of Ludo Select and the cumulative set of Game Rules for each Game.\r\n\r\n 1.14. “Rakeback” means an incentive provided by the Company at its discretion, as a part of the promotional measure vide which a certain percentage of Service Fee collected from the User in a particular gameplay or multiple gameplays, as determined by the Company, shall be credited back to the User\'s Deposit Segment at the time of gameplay settlement.\r\n\r\n 1.15. “Refund” means the reversal of the amounts (such as Service Fee, buy-in, or any other amount, as the case may be) paid by a User to play a Cash Game, to such User\'s account.\r\n\r\n 1.16. “Service Fee” means the fee charged by the Company from each user on every gameplay. The term “Commission” or “Platform Fee” can be used interchangeably with “Service Fee” and shall have the same meaning as assigned to “Service Fee”.\r\n\r\n 1.17. “Terms” mean the Terms of Service of Boomlly.\r\n\r\n 1.18. “Withdrawable Balance” means the amount in the Winning Segment and Deposit Segment.\r\n\r\n 1.19. “Withdrawal/Withdraw” means the transfer of all or part of the Withdrawable Balance to a designated Bank Account of a user, upon specific instructions by that user to the Company to initiate such transfer.\r\n\r\n 1.20. “Withdrawal Request” means a request by the user on the Platform to initiate Withdrawal.\r\n\r\n 1.21. “Winning Segment” means the segment of the User account to which the winnings of users from the Cash Games are credited, less the applicable Service Fees and other levies/deductions.\r\n\r\n2. Who may use Our Services:\r\n\r\n 2.1. Our Services are not intended for or offered to any person below the age of eighteen (18) years, or persons who are resident in or access the Platform from, any of the Barred States. We, at all times have the right to control access to Our Services, in any State in India, and reserve the right to update the list of Barred States.\r\n\r\n 2.2. If You are below the age of eighteen (18) years or a resident or located in any of the Barred States, You may not access and use Our Services. In case You do, You shall be solely responsible for any legal actions that may ensue from such use of Our Services. We reserve the right to request proof of age and geolocation at any stage of Your access and use of Our Services to verify that persons below the age of eighteen (18) years or residing or located in any Barred States are not using the Service. We may exclude a person from using Our Services where We suspect that such person using the Service is under-age and he/she fails to provide Us with a valid proof of age or is located in a Barred State.\r\n\r\n 2.3. If You are not legally competent to individually enter into Indian Rupee transactions through banking channels in India and/or are accessing the Services from a Barred State, You are prohibited from participating in Cash Games on Our Services. In the event of such violation, Your participation in Cash Games will be deemed to be in breach of the Platform Policies and You will not be entitled to receive any prize that You might win in such Cash Games.\r\n\r\n 2.4. We may terminate Your access and use of the Services when We become aware of or are of the opinion, at Our sole discretion, that Your use and access of Our Service is in violation of the Platform Policies.\r\n\r\n3. Usage of Our Services:\r\n\r\n 3.1. The Game(s) offered on the Platform is a game of skill and the Company does not support, endorse, or offer to Users any game of chance. A game is considered to be a game of skill where the impact of a player\'s effort and skill on the outcome of a game is higher than the impact of luck on the outcome of a game. Game(s) hosted on the Platform is a game of skill, as the outcome/success in the game is directly dependent on the Users\' effort, performance and skill.\r\n\r\n4. User Registration and Account Creation:\r\n\r\n 4.1. In order to access the Platform and the Services, You will be required to create an account and register yourself on the Platform by providing a valid phone number or such other information as may be required (“Account”). You agree to provide true, accurate, current and complete information at the time of registration and at all other times (as required by the Company). You are prohibited from creating or using multiple accounts on the Platform. If we detect multiple accounts for a single user, we may take penal action, including cancellation of all amounts in relation to Discounts on linked accounts, and suspension of the linked accounts.\r\n\r\n 4.2. When You create an Account with Us, a default username is generated for You, You may amend or change your display name which shall be your identity (“User ID”) on the Platform. Your chosen display name is confirmed subject to it being in compliance with these Terms. User IDs must not be indecent, objectionable, offensive, or unlawful. User IDs that are found to violate the intellectual property of any entity, reveal personal information, or be suggestive of an advertising or promotional activity, may be rejected. Your User ID will remain active on the Platform unless We terminate or suspend Your access to the Platform for a violation of the Platform Policies in accordance with these Terms, or Your Account becomes inactive in accordance with Clause 11.\r\n\r\n 4.3. When You register with Us, You agree to receive promotional messages, administrative messages and advertisements from the Company and/or its affiliates, through SMS, email, call and push notifications. You may withdraw Your consent to receive such notifications by sending an email to boomlly24x7com.\r\n\r\n 4.4. You acknowledge and agree that any instruction or communication transmitted by You or on Your behalf through the Platform is made at your own risk. You authorize the Company to rely and act on, and treat as fully authorized and binding upon You, any instruction given to us through Your Account. You acknowledge and agree that We shall be entitled to rely upon your username to identify You and You represent and warrant to Us that, throughout the course of your usage of our Platform, you will not permit other persons to access or use your Account. If you permit other persons to access or use your Account, you do so at your own sole risk as to any consequences. You further agree and accept that you shall not access or use the Platform through the Account of another User.\r\n\r\n 4.5. You agree and give your consent to the Company to disclose your personal information provided to us to a third-party agency to assist in verifying your identity. The third-party agency may prepare and provide the Company with such an assessment and may use your personal information including the name, dates of birth, financial information etc. for the purposes of preparing such assessment. Please refer to our Privacy Policy in this regard.\r\n\r\n 4.6. You acknowledge that your participation in any Game(s) available on the Platform is purely voluntary and at your sole discretion and risk.\r\n\r\n5. Game Formats and Rules:\r\n\r\n 5.1. The Platform provides the game of ludo in various formats and variations, including Cash Games and non-cash Games. We may increase or reduce the number of Game formats and variations offered on the Platform, at Our sole discretion.\r\n\r\n 5.2. You agree to abide by the applicable Game Rules when playing Games on the Platform. You are required to ensure that You have read and understood the applicable Game Rules before playing any Game. The Game Rules form part of the Platform Policies and can be found by clicking “i” next to the heading of the type of game selected by You on the Platform.\r\n\r\n 5.3. We may, from time to time, make additional Games available on the Platform. The Platform Policies will govern all aspects of such newly introduced Games, and the relevant Game Rules for such new Game(s) will be made available to You.\r\n\r\n 5.4. The results and winners of each of the Games are determined in accordance with the applicable Game Rules. By registering and/or participating in any Game You agree to these determinations, which shall not be open to challenge. We will post lists of winners on Our Platform following each Game.\r\n\r\n 5.5. In case anything provided in the game rules/FAQ (suggestive or otherwise) as appearing over the Platform are contrary to these Terms, these Terms shall prevail over to the extent they are contrary to the games rules/FAQs.\r\n\r\n6. Restrictions on the use of Our Services:\r\n\r\n 6.1. You shall not upload, distribute, transmit, publish, share, display, or post any content through Our Services or through any service or facility, including any Communication Feature, provided by Us which:\r\n\r\n  a. belongs to another person and to which You do not have any right;\r\n  b. is defamatory, obscene, pornographic, pedophilic, invasive of another\'s privacy, including bodily privacy, insulting or harassing on the basis of gender, libelous, racially or ethnically objectionable, relating or encouraging money laundering or gambling, or otherwise inconsistent with or contrary to the Applicable Laws;\r\n  c. is harmful to a child;\r\n  d. infringes any patent, trademark, copyright or other proprietary rights;\r\n  e. deceives or misleads the addressee about the origin of the message or knowingly and intentionally communicates any information which is patently false or misleading in nature but may reasonably be perceived as a fact;\r\n  f. impersonates another person;\r\n  g. threatens the unity, integrity, defence, security or sovereignty of India, friendly relations with foreign states, or public order, or causes incitement to the commission of any cognizable offence or prevents investigation of any offence or is insulting other nation;\r\n  h. contains a software virus or any other computer code, file or program designed to interrupt, destroy or limit the functionality of any computer resource;\r\n  i. is patently false and untrue, and is written or published in any form, with the intent to mislead or harass a person, entity or agency for financial gain or to cause any injury to any person;\r\n  j. is otherwise objectionable or undesirable (whether or not unlawful);\r\n  k. is aimed at soliciting donations, chips or other forms of help;\r\n  l. disparages the Company or any of its parent company, subsidiaries, affiliates, licensors, associates, partners, sponsors, products, services, or websites, in any manner;\r\n  m. promotes a competing service or product; or\r\n  n. violates any Applicable Law(s).\r\n\r\n 6.2. The Communication Feature for a User may be immediately suspended without any warning where We are of the opinion that such User is indulging in any activity prohibited under Clause 6.1. above, or elsewhere in the Platform Policies. This may also lead to suspension of the Account of such a User. You may report any abusive or malicious behaviour by any other User to us by following the complaints procedure provided in Clause 16 below.\r\n\r\n 6.3. You shall not host, intercept, emulate, or redirect proprietary communication protocols, used by Us, if any, regardless of the method used, including protocol emulation, reverse engineering, or modification of Our Services or any files that are part of it.\r\n\r\n 6.4. You shall not frame Our Services, impose editorial comments, commercial material or any information on Our Services, alter or modify any content, or remove, obliterate or obstruct any proprietary notices or labels.\r\n\r\n 6.5. You shall not use Our Services for commercial purposes, including but not limited to use in a cyber cafe as a computer gaming centre, network play over the Internet, or through gaming networks, or connection to an unauthorized server that copies the gaming experience offered by Us.\r\n\r\n 6.6. You shall not purchase, sell, trade, rent, lease, license, grant a security interest in, or transfer Your Account, content, money, in-app currency, standings, rankings, ratings, or any other attributes appearing in, originating from, or associated with Our Services.\r\n\r\n 6.7. Any form of fraudulent activity, including attempting to use or using any other person\'s credit card(s), debit cards, net-banking usernames, passwords, authorization codes, prepaid cash cards, mobile phones for adding cash to the Deposit Segment, accessing or attempting to access the Services through someone else\'s Account, is strictly prohibited. Where We become aware of or are of the opinion, at Our sole discretion, that You are indulging in such fraudulent activity, We may terminate Your Account and notify the appropriate authorities, where relevant.\r\n\r\n 6.8. If You are an officer, director, employee, consultant, or agent of the Company, or a relative of such persons, You are not permitted to play either directly or indirectly, any Cash Games which entitle You to any prize, in the course of your engagement with the Company. For the purposes of these Terms, ‘relative\' shall have the meaning ascribed to it in Section 2(77) of the Companies Act, 2013.\r\n\r\n 6.9. You undertake that You will not permit any other person to access or use Your Account and You will not use any form of external assistance to play the Games or indulge in any activity which violates the Platform Policies.\r\n\r\n 6.10. You are prohibited from utilizing Our Services for any restricted or unlawful purpose including, attempting to launder funds available in Your Account or deliberately losing money to a certain player(s).\r\n\r\n 6.11. You shall not send spam emails to any other user on the Platform, or any other form of unsolicited communication for any other purpose.\r\n\r\n7. Deposit, Payment, Refund, and Cancellation:\r\n\r\n 7.1. All payments on the Platform will have to be made through your Account on the Platform, by following the process indicated therein. Deposits made by You are credited to the Deposit Segment, and Your winnings are credited to the Withdrawable Segment . Your Account also provides a record of all transactions made by You on the Platform. You should routinely check the various segments of your Account to ensure that there has been no unauthorized use of your Account. If you suspect any unauthorized activity, you may contact the Grievance Officer at boomlly24x7@gmail.com\r\n\r\n 7.2. All transactions You make with Us shall be in Indian Rupees (INR). You are free to deposit funds in the Deposit Segment for the purpose of participating in Cash Games, subject to the following conditions:\r\n\r\n  a. You can only deposit up to INR 50,000 (Indian Rupees Fifty Thousand only) to the Deposit Segment in a single transaction; and\r\n\r\n  b. the monthly deposit limit set by Us with undertakings, indemnity, waiver, and verification conditions as We deem appropriate in Our sole discretion. We will notify You of any changes in the deposit limits on the Platform.\r\n\r\n 7.3. The deposits made by You in the Deposit Segment are purely for the purpose of enabling Your participation in the Cash Games and do not carry or generate any interest or return.\r\n\r\n 7.4. You cannot transfer any funds from Your Account to the Account of another user, except as may be permitted by the Company.\r\n\r\n 7.5. You hereby represent and warrant that the payment instrument/mode used for adding cash to Your Account, belongs to You.\r\n\r\n 7.6. Credit cards, debit cards, prepaid cash cards, and internet banking payments are processed through third-party payment gateways. Similarly, other payment modes also require authorization by the entity which processes such payments. You understand and agree that We are not responsible for delays or denials in processing payments at such third party\'s end. The processing of payments will be solely in terms of the applicable policies and procedures of the relevant third parties, without any responsibility or risk at Our end.\r\n\r\n 7.7. If there are any issues in connection with adding cash/depositing funds on the Platform, You may send a complaint to Us by following the complaints procedure provided in Clause 16 below.\r\n\r\n 7.8. Once a payment/transaction is authorized and confirmed, and the funds are received by Us, the amount is credited to the Deposit Segment and is available for You to play Cash Games. You understand and agree that we are not liable in the event of Your credit being delayed or eventually declined, and You are required to follow up with the providers of the payment instrument You used to initiate the transaction.\r\n\r\n 7.9. We have the right to cancel a transaction at any time and at Our sole discretion, and if the relevant payment is successfully realized in such an event, the transaction will be reversed, and the money credited back to the original source of payment.\r\n\r\n 7.10. Where any of the fixtures within a Game are canceled or abandoned without an official result, all game entries are considered void and the Contribution shall be duly refunded to User. There are no prize/winnings pay-outs and platform fee charges for these voided Games.\r\n\r\n 7.11. By participating in Cash Games You hereby authorize the Company to appoint a third party/ Trustee/Escrow Agent to manage funds deposited by You on your behalf. Subject to these Terms and Conditions, amounts collected from You are held in a separate non-interest earning bank account. The said accounts are operated by a third party appointed by the Company. From these bank accounts, the payouts can be made to (a) the users (towards their withdrawals), (b) Company (towards its Service Fee) and (c) to governmental authorities (towards TDS on winnings).\r\n\r\n 7.12. You may Withdraw all or any part of the Withdrawable Balance to Your Bank Account, which will be processed by means of an electronic bank-to-bank transfer or such other mode as per your stated preferences and in accordance with Applicable Law.\r\n\r\n 7.13. At the time of initiating a Withdrawal Request, You are required to provide Us with the details of the Bank Account to which the funds are to be credited, and such Bank Account must belong to You.\r\n\r\n 7.14. A Withdrawal Request will be accepted by Us subject to adequate KYC verifications, alignment with the deposit method, Discount terms/restrictions, and/or security reviews by Our automated systems and risk management team. You agree that all Withdrawals You make are governed by the following conditions:\r\n\r\n  a. You can Withdraw all or any part of Your Withdrawable Balance, subject to the levy of applicable processing fee (depending on the Withdrawal method), and applicable taxes.\r\n\r\n vb. You may Withdraw a minimum of INR 50.00 (Indian Rupees Fifty only) and a maximum of INR 50,0000.00 (Indian Rupees Fifty lakh ) per transaction. When Withdrawing funds, payment will be made to You either by electronic wire transfer, or any other manner in accordance with Your stated preferences and Applicable Law. We also reserve the right to disburse the amount to the financial instrument/mode used to add cash to Your Deposit Segment. The foregoing limits on withdrawal may be changed or modified by Us from time to time.\r\n  c. Withdrawal Requests shall, subject to Withdrawal restrictions specified in these Terms and the Platform, be processed post Your KYC verification. We may ask You for Your KYC documents at any stage to verify Your address and identity.\r\n  d. Discount and promotional winnings are not directly Withdrawable and are subject to the terms and conditions applicable to their grant.\r\n\r\n 7.15. We will attempt to process Your Withdrawal Request in a timely manner, but there may be delays due to the time required for the KYC verification, security checks, and other processes involved in completing the Withdrawal transaction. We shall not be liable to pay any form of compensation to You for the reason of such delays in processing Withdrawal Requests and remitting payments.\r\n\r\n 7.16. You may request a Refund in the following instances:\r\n  a. where a Cash Game is canceled on account of a technical issue or Service defect solely attributable to the Company;\r\n  b. where You discover a violation of the Platform Policies. Please note that in such a case, a Refund will be issued only when the Company risk management team, upon due investigation, discovers a violation of the Platform Policies by the players of a particular Cash Game that unduly prejudiced the user entitled to the Refund; or\r\n  c. any other reason as may be determined by the Company in its sole discretion, from time to time\r\n\r\n 7.17. Upon receipt of a Refund request from You, Your Refund request will be verified and where accepted, the Refund will be processed within two (2) weeks from the date of receipt of such Refund request and the requisite Refund amount will be added to Your Account.\r\n\r\n 7.18. When You request for cancellation of any ‘add cash\' transaction on Our Platform, we may process such cancellation request within two (2) weeks, subject to the cancellation request being made within two (2) hours of the ‘add cash\' transaction, additional checks and verifications being conducted where necessary, and there being no utilization of the added funds in the interim. Upon successful cancellation, the fund shall be credited to the original source used to add such funds.\r\n\r\n 7.19. Your winnings may be disclosed to the relevant authorities, and requisite amounts may be withheld from payouts, in order to ensure compliance with Applicable Law(s) and lawful requests from the government, regulatory bodies, or an order of any court of competent jurisdiction. It is solely Your responsibility to ensure due remittance of all the applicable taxes.\r\n\r\n8. KYC Verification:\r\n\r\n 8.1. We require users to undergo an additional online document verification (“KYC”) in the following scenarios:\r\n  a. where You place a Withdrawal Request of an amount exceeding the applicable limit or exceed the number of Withdrawal Request as specified on the Platform;\r\n  b. where We suspect or have been notified that You have violated any of the Platform Policies; where You have been identified to be in breach of the applicable add cash thresholds;\r\n  c. as may be required under Applicable Law(s); or\r\n  d. as may be determined by the Company in its sole discretion from time to time.\r\n\r\n 8.2. As part of the KYC process, our automated system enables a mandatory process for Users to upload documents pertaining to their Permanent Account Number (PAN) and Bank Account details.\r\n\r\n 8.3. The KYC documents must be uploaded on the Platform, and We do not accept submissions in any other form or manner.\r\n\r\n 8.4. At the time of uploading the document on Our Platform, You must ensure the following:\r\n  a. documents are valid;\r\n  b. the document is clear and legible, and shared in a jpg, jpeg, or pdf format; and\r\n  c. documents are not password protected.\r\n\r\n 8.5. The validation of KYC documents may take up to three (3) working days from the date of submission of the documents. We reserve the right to validate and/or reject the KYC documents at our sole discretion. You will be notified of the status of KYC verification on Your registered mobile number/email address and on the Platform.\r\n\r\n9. Discount and Prize:\r\n\r\n 9.1. To be eligible for Discounts or to win a prize on the Platform, a User must not access the Services from any of the Barred States. If You are not a citizen of India and are accessing the Services from within a permitted location in India, You will be able to use Our Services and win prizes or be eligible to receive Discounts, and We will process Your Withdrawal Requests in INR to any Indian Bank Account in Your name (subject to KYC verification).\r\n\r\n 9.2. When You add cash to the Deposit Segment, You may be allotted certain Discounts depending on the existence of ongoing promotional offers. Such Discounts may be dependent on certain conditions, such as Your continued usage of Our Services or participation in Cash Games, and accordingly, a part of the Discounts may be released before or at the time of gameplay settlement. An amount net of such Discounts will be considered to have been collected from You in cash for the purpose of buy-in (including Service Fee). You understand that the Discounts must be utilized within the stipulated claim period, which may differ based on the ongoing offers. Discounts are issued at Our sole discretion and cannot be claimed by You as a matter of right. The release percentage/rate may vary depending on the offer, and the user. The Discounts shall have such limited validity as may be communicated to You at the time of its issuance. Please review “How does Discounts work?” section on the Platform for further details on how the Discounts works on the Platform.\r\n\r\n 9.3. You agree that where the Platform decides to provide Rakeback to Your Deposit Segment, such amount of Rakeback shall be adjusted first against the Service Fee collected from You and subsequently against the prize pool.\r\n\r\n 9.4. You agree that in case the amount of Rakeback credited to Your Deposit Segment is determined on the basis the total Service Fee collected from You in the prior and active gameplays, such amount of Rakeback shall be adjusted first against the Service Fee collected from You and subsequently against the prize pool.\r\n\r\n 9.5. At its discretion, the Platform, basis the applicable promotional scheme may credit GameCash to the User at the time of settlement of a prior gameplay. You agree that such amount of GameCash shall not be eligible to be adjusted against the Service Fee collected from You in the prior Gameplay. Such GameCash may be released in a subsequent gameplay, subject to a release rate or applicable promotional scheme, and in such case, You agree that the GameCash released shall be adjusted against the Service Fee collected in the said Gameplay.\r\n\r\n 9.6. You agree that any Discounts offered by the Company on the Platform would be first adjusted against the Service Fee and subsequently against prize pool\r\n\r\n 9.7. In the event, Your Account is terminated by You voluntarily, or by Us in accordance with these Terms, all GameCash issued to You shall be forfeited and You shall have no further right or interest in such GameCash.\r\n\r\n 9.8. Any violation of the Platform Policies at any stage may result in disqualification from receiving the Discounts or promotional winnings.\r\n\r\n 9.9. You may win prizes while playing Games on the Platform. Such prizes are subject to the specific terms and conditions communicated at the time of issuance of the prize.\r\n\r\n\r\n10. Service Fees and Taxes:\r\n\r\n 10.1. The Company charges a Service Fee on each Cash Game played on the Platform by a User, which may vary depending on the nature of the Cash Game and is subject to change from time to time, as indicated in Clause 10.2 below. The Company reserves the right to levy different Service Fees for different Cash Games at its sole discretion.\r\n\r\n 10.2. Users who fulfill certain specific criteria may, at the sole discretion of the Company, adjust the Discounts received against the Service Fee charged for a particular Game or a set of Games in line with the market conditions, business practices and trade parlance, even after the conclusion of the Game(s). Accordingly, such post-facto Discounts by the Company will reduce and reverse a part of the Service Fee applicable to a Game.\r\n\r\n 10.3. Discounts may be granted to users based on a number of parameters pertaining to usage of the Platform by the user, including the frequency of Games played, participation in tournaments or special Game types, overall winnings, conduct on the Platform, players referred to the Platform, etc.\r\n\r\n 10.4. It is clarified that all forms of Discounts and other GameCash, promotional winnings and rebates offered by the Company to a user shall be first applied to the Service Fee chargeable to such User, and the Company has the right to reduce and vary Discounts and promotions accordingly. Further, such Discounts and promotions may be subject to specific conditions, such as usage only in specific types of Games, or restricted usage only after the expiry of a predetermined time period, etc.\r\n\r\n 10.5. Details pertaining to each Game transaction, including the applicable Service Fee for that Game, will be accessible by You on an information panel made available to You before You initiate a Cash Game. The Service Fee charged shall be inclusive of the Goods and Services Taxes, at the rates mandated under Applicable Law(s). Variations to Service Fees in the manner set out in this Clause 10, may impact the overall transaction details of a Cash Game, including the taxes applicable thereon, and hence You are advised to periodically check the information panel. If You require any further information on any aspect of the Service Fee, including the tax components thereof, You may write to us at boomlly24x7@gmail.com.\r\n\r\n 10.6. TDS at the rate prescribed under applicable laws shall be levied on all the Net Winnings (i.e., the difference between Total Withdrawals in a financial year and Total Deposits in the same financial year. Financial year is counted from 1 April to 31st March of a particular year). TDS at the rate of thirty (30) per cent shall be levied on Net Winnings at the time of Withdrawal and at the end of a Financial Year on the remaining balance of your Net Winnings. Please refer to the TDS policy here for more details. The TDS policy, limits and rates are subject to change as per the applicable laws and We reserve the right to modify/amend the same as per applicable laws. Our obligation in this regard is limited to deducting TDS as required by applicable law and providing You with an appropriate tax deduction certificate. We reserve the right to verify Your PAN from time to time and to cancel any prize should Your PAN be found inconsistent in Our KYC verification process. We shall have no liability or responsibility in connection with Your personal taxation matters.\r\n\r\n\r\n 10.7. Tax invoice and credit note: In case a User wishes to obtain his copy of tax invoice and/or credit note containing the prescribed particulars as per Goods and Services Tax Act and the rules provided thereunder, in respect of a particular gameplay, such tax invoice / credit note shall be provided to the said User on receipt of a specific request raised with us.\r\n\r\n11. Termination, Suspension, and Opt-out:\r\n\r\n 11.1. We may change, suspend or discontinue any aspect of the Platform at any time, including the availability of any Platform\'s feature, Services, database, or Content. We may also impose limits on certain features and Services or restrict your access to parts or the Platform, without notice or liability at any time in our exclusive discretion, without prejudice to any legal or equitable remedies available to us, for any reason or purpose. However, under normal circumstances, we will only do so where there has been conduct that we believe violates these Terms or other rules and regulations or guidelines posted on the Platform or conduct which we believe is harmful to other Users, to our businesses, or other information providers.\r\n\r\n 11.2. If You do not log in to Your Account at least once in a twelve (12) month period, Your Account shall be considered inactive and a maintenance fee of INR 250 per year may be chargeable against any funds remaining therein (“Inactive Account Fee”).\r\n\r\n 11.3. We reserve the right to suspend or terminate Your Account if We find that You are violating any of our Platform Policies, or breaching/attempting to breach the security of Our Services in any manner, Your Account may be terminated immediately and any prize, GameCash, promotional winnings, or funds therein may be forfeited.\r\n\r\n 11.4. In the event Your Account is terminated by Us in accordance with Clause 11.3, You will:\r\n  a. not be permitted to use Our Services, thereafter, from the mobile number, PAN, and Bank Account linked to the terminated Account; and\r\n  b. be permitted to Withdraw the Withdrawable Balance, subject to applicable restrictions in the Platform Policies.\r\n\r\n11.5. Further, if We find that a user is breaching/attempting to breach Our security or privacy protocols, We may, following an internal investigation, decide to undertake a range of remedial actions, depending upon the severity of the detected breach, which may include the following:\r\n\r\n  a. stop access and usage of Our Services, indefinitely, by such user;\r\n  b. permanently terminate such User\'s Account;\r\n  c. restrict Withdrawals for such User;\r\n  d. demand compensation for the damages to Our Services that occurred because of the breach and prosecute a user for any violation of the law and the Platform Policies if need be; and\r\n  e. prohibit the user from registering with Us in the future.\r\n\r\n 11.6. In the event, We believe or suspect that You have been engaged in Fair Play Violation:\r\n\r\n  a. we will notify You such breach/attempt to breach; and\r\n\r\n  b. We shall have the right to investigate and monitor Your Account and Your gameplay for such period of time as in Our reasonable opinion may be needed to investigate such breach. The balance funds of Users guilty of Fair Play Violations will be frozen for a period of one hundred and eighty (180) days. Such investigation will cover all the games that the concerned User has played since the time of registering on the Platform.\r\n\r\n  c. In the event, We, upon investigation are of the view that Your Account is or has been engaged in Fair Play Violations, then to the extent of the amount which is involved in such Fair Play Violations, We may:\r\n\r\n    a. forfeit the fund in Your Account;\r\n    b. repatriate the amount to the User or individuals who have been affected by the Fair Play Violation; and\r\n    c. levy a Fair Play violation fee of an amount up to an amount of INR 10,000 per instance of such Fair Play Violation. You agree that such fee is not in the form of a penalty but is a reasonable and justifiable cost, manpower, technology, loss of reputation that We as a Platform may suffer due to Your violation of the Fair Play Policy. The fair play violation fee may be debited from the funds in Your Account or in the event the balance in Your Account is not sufficient to cover the fee, we may raise a claim for such fee against You in accordance with Applicable Laws.\r\n\r\nFor the purpose of these Terms, “Fair Play Violation” means any activity of a User that violates the Platform Policies and includes without limitation:\r\n\r\n    a. activity that uses unfair means to manipulate the outcome of a game on the Platform, irrespective of whether this in favour of the user adopting such means;\r\n    b. activity that is fraudulent, illegal, or unfair activity, as determined by the Company in its sole discretion;\r\n    c. activity that is intended solely to transfer funds from one person to another person, or between distinct sources, thereby amounting to money transferring;\r\n    d. activity that involves collusion between two or more players to achieve a result during a game, thereby amounting to syndicate playing; and\r\n    e. such other activities may be determined by the Company, from time to time.\r\n\r\n 11.7. If We have been instructed or made aware of a cyber fraud or any other fraudulent activity related to a User\'s Account by a governmental, police or any law enforcement authority or agency, then We reserve the right to (a) suspend Your Account; and (b) transfer any funds lying in Your Account to such Bank Account as may be instructed by the governmental, police or any law enforcement authority or agency. We also reserve the right to block any and all Withdrawals from Your Account upon instructions from the governmental, police or any law enforcement authority or agency.\r\n\r\n 11.8. We may attempt to validate Your Account via call or email. In the event that We are not able to get in touch with You on the first occasion, We will make subsequent attempts to establish contact with You. In cases where the phone number and email address provided by You is incorrect, We bear no responsibility for Your access and use of the Services being interrupted. In case We are unable to reach You or if the validation is unsuccessful, We reserve the right to disallow You from logging onto Our Services or reducing Your play limits and/or add cash limits till such time We are able to satisfactorily validate Your Account. In such an event, We will notify You via push notifications or SMS of the next steps regarding Your Account validation. We may also ask You for proof of identification and proof of address from time to time. Where Your access to Your Account is limited or access to Our Services is restricted as a result of unsuccessful Account validation, We may take seven (7) working days to reinstate complete access to Your Account and Our Services upon successful validation. In the event that We have made several unsuccessful attempts to reach out to You, We reserve the right to terminate Your Account and refund Withdrawable Balance, if any. We will not be liable for any claim, damage or loss accruing to You from such termination or restriction.\r\n\r\n 11.9. You are free to discontinue using Our Services at any time by sending Us an email indicating such intention at boomlly24x7@gmail.com (“Discontinuation Request”). If at such time, there is a positive Withdrawable Balance and/or funds in Your Deposit Segment, We will disburse the same to You by electronic transfer in accordance with these Terms, subject to any applicable charges, including an account closure fee of INR 1,000.00 (Indian Rupees One Thousand Only) or ten (10) percent of the total funds to be transferred, whichever is higher.\r\n\r\n12. Your Representations and Warranties:\r\n\r\n 12.1. You represent that:\r\n\r\n  (a) You are of eighteen (18) years of age and are eligible and competent to enter into transactions with other users and the Company.\r\n  (b) Any information You provide to Us at any time during the access and use of Our Services, whether at the stage of registration or any time thereafter is correct, complete, up-to-date, and accurate. We shall not be liable against any claim relating to the accuracy, completeness, and correctness of any information You provide Us. We may, at any time and at Our sole discretion, require You to verify the correctness, completeness, and accuracy of such information, and to that extent require You to produce additional documentary proof. Where You fail to provide Us with valid documentary proof, We reserve the right to limit Your access and use of Our Services.\r\n  (c) You will protect the information You provide Us, including the one-time password (OTP) shared with you when you log in to the Platform to avail of Our Services. We will never require You to enter or disclose the OTP, except at the time of logging on to Our Services. You must never share Your Account login information with anyone, including any other User of the Platform or any representative of the Company. You specifically understand and agree that We will not incur any liability for information provided by You to anyone which may result in Your Account being exposed or misused by any other person.\r\n  (d) You have the required legal rights in relation to any content that You may transmit, upload, or otherwise make available on the Platform, and such action of Yours shall not violate the intellectual property rights of a third party.\r\n  (e) You shall use Your Account solely for the purpose of playing the Games offered through Our Services, and not to launder funds or commit any other unlawful or prohibited activity.\r\n  (f) Prior to adding cash to the Deposit Segment or participating in Cash Games, You shall be responsible to satisfy Yourself about the legality of playing Cash Games in the jurisdiction from where You are accessing Cash Games.\r\n  (g) You have the experience and the requisite skills required to play Games on the Platform, and that You are not aware of any physical or mental condition that would impair Your capability to fully participate in such activity.\r\n  (h) You are aware that playing Cash Games may result in financial loss to You. With full knowledge of the facts and circumstances surrounding this activity, by using the Platform, You are voluntarily choosing to play Games and accordingly assume all responsibility for and risk resulting from Your participation in any Cash Game or other activity on the Platform, including any financial loss. You understand that the Company shall not be liable for any financial loss that You may sustain as a result of your use of the Platform. You agree to indemnify and hold the Company, its employees, directors, officers, and agents harmless with respect to any and all claims and costs associated with Your use of the Platform.\r\n  (i) You understand and accept that Your participation in a Game does not create any obligation on Us to give You a prize. Your winning a prize is entirely dependent on the outcome of the Game, and Your skill as a player vis-à-vis other players in the Game and is further subject to the Platform Policies.\r\n  (j) The Company is not responsible for Your inability to access or play any Game or event in which You may be eligible to participate, irrespective of the cause of such event. This includes situations where You are unable to log into Your Account or the same may be pending validation or You may be in suspected or established violation of any of the Platform Policies.\r\n\r\n13. Content and Advertisements:\r\n\r\n 13.1. You are solely responsible for any content that You transmit, upload, or otherwise make available on Our Services. By publishing any content on Our Platform, You agree to grant Us a royalty-free, worldwide, non-exclusive, perpetual, and assignable right to use, copy, reproduce, modify, adapt, publish, edit, translate, create derivative works from, transmit, distribute, and publicly display Your content, and to use such content in any related marketing materials produced by Us or Our affiliates. Such content may include, without limitation, Your name, username, profile picture and other information provided on the Platform.\r\n\r\n 13.2. By accessing or using or availing any part of Our Services, including the Communication Feature, You may be exposed to content posted by other users, over which the Company has no control. If You find any aspect of such content offensive or unlawful, You may bring such content to Our notice, and We shall take appropriate remedial actions in accordance with Applicable Law(s).\r\n\r\n 13.3. We may place certain promoted or sponsored content on Our Platform (directly or via links to other sites or resources) in conjunction with third parties. We make no warranties with respect to such content and neither do we endorse any information contained therein. We shall not be liable to You for such promoted or sponsored content, and Your interaction with such content or third-party resources shall be solely at Your own risk.\r\n\r\n 13.4. We may use any content in relation to the Games played on the Platform, including recordings of the gameplay, for Our corporate and marketing purposes, and accordingly, You acknowledge, agree, and consent to our right in this regard.\r\n\r\n14. Disclaimer, Indemnity, and Limitation of Liability:\r\n\r\n 14.1. The Company is not liable for any claim, loss, injury, damages, expenses, or lost profits or earnings, incurred by You in connection with Your use of the Platform and the Services.\r\n\r\n 14.2. Notwithstanding anything to the contrary contained in the Terms, You agree that Our maximum aggregate liability for all Your Claims against Us, in all circumstances other than for a valid Withdrawal, is limited to the Service Fee less GameCash and other promotional amounts, paid to Us over the preceding three (3) months.\r\n\r\n 14.3. You are solely responsible for any consequence resulting from Your use of the Platform, and You understand that We assume no liability or responsibility for any financial loss that You may sustain in this regard.\r\n\r\n 14.4. You agree to indemnify and hold harmless the Company, its employees, directors, officers, and agents against any claims, actions, suits, damages, penalties, or awards brought against Us by any entity or individual in connection with or in respect of (a) breach of these Terms, in tort (including negligence) third party claims or liabilities arising against Company out of such a breach, based in contract, tort, statute, fraud, misrepresentation, or any other legal theory, and regardless of whether a claim arises during or after the termination of these Terms; (b) your use of the Platform in any matter that is contrary to Applicable Laws, with an intent to deceive , defraud cheat, mislead or solicit any business, monetary or non-monetary consideration or information from another User; (c) your breach of any Applicable Laws; (d) your use of the Platform, including but not limited to your posting, use of, modification or interaction with any content on the Platform; (e) any unauthorized, improper, illegal or wrongful use of your Account by any person, including a third party, whether or not authorized or permitted by you; (f) your User Content; (g) use by any other person accessing the Platform using your username or OTP, whether or not with your authorization, (h)the use by us of information provided by you through our Platform; (i) from any income tax demand raised (including and not limited to tax, interest, penalty, withholding tax or any other amount payable under the Indian Income-tax Act, 1961) arising on account of your misrepresentation and/ or your non-compliance of the terms and conditions mentioned therein. You agree that any income tax demand (including and not limited to tax, interest, penalty, withholding tax or any other amount payable under the Indian Income-tax Act, 1961) which is paid/ payable by us in this regard, will be recovered by us and debited from your Account.\r\n\r\n 14.5. The Platform is offered by the Company on an as-is basis and to the fullest extent permitted by law, the Company makes no implied warranties, with respect to the Service. All implied warranties of merchantability and fitness for a particular purpose or use, are disclaimed. No one is authorized to make any warranty on Our behalf, and users may not rely on any other statement of warranty. However, where we receive adequate notice of an error in Our Services, We shall take prompt steps to rectify the same.\r\n\r\n 14.6. To the maximum extent permissible by law, the Company expressly disclaims all responsibility and liability for any harm, damages, or loss resulting from Your participation in, or cancellation of, any Game, any activity or transactions with third parties whom You may have connected to through Our Services, and any user-generated content, including any violation of intellectual property rights with respect to such user-generated content.\r\n\r\n 14.7. A failure by Us, to insist upon strict performance of any of the provisions herein or to exercise any option, right or remedy contained herein, shall not be construed as waiver or relinquishment of such provisions, option, right or remedy. No waiver of any provision hereof shall be deemed to have been made unless expressed in writing and signed.\r\n\r\n 14.8. In case of any technical failures, server crashes, breakdowns, software defects, disruption or malfunction of service at our end, as a policy, we will cancel the Game(s) and refund the participation amounts after proper verification and no Service Fee will be charged for such Games and you accept that we are not responsible to you in all such cases. For any game, we have the right to cancel and refund the participation amount. In no case, other than a server crash, are we accountable for any of the User\'s disconnections from the server. We are also not liable for any prospective Winnings from any incomplete game.\r\n\r\n 14.9. We are not liable for any disconnection, lag, freeze or interference in the network on the User\'s computer or any other external networks.\r\n\r\n 14.10. The latest versions of the Platform Policies, as published on the Platform, contain the entire agreement between You and Us regarding the access to and use of Our Services and supersedes all prior agreements, including prior versions of the Platform Policies. You understand and acknowledge that once a game has commenced, not being able to play due to slow internet connections, faulty hardware, technical failure due to customer\'s hardware, internet connection failure, low computer configuration or for any other reason not attributable to us does not require us to issue a refund of the participation amount you may have paid for participation.\r\n\r\n15. Intellectual Property Rights:\r\n\r\n 15.1. The Company and/or its affiliates (as the case may be) exclusively owns all rights and intellectual property of any type throughout the world, including but not limited to patents, trademarks, domain names, trade names, service marks, copyrights, software, trade secrets, industrial designs, and know-how in the Platform and Services, and the underlying technology and documentation therein (“Company Intellectual Property”).\r\n\r\n 15.2. Upon validly registering on the Platform, You are granted a limited right to use Our Services in accordance with the Platform Policies, and You have no right, ownership, title, or interest in the Company Intellectual Property.\r\n\r\n16. Complaints and Disputes:\r\n\r\n 16.1. If You have any complaint or grievance relating to any aspect of the Services, You may approach Our customer care and grievance redressal team for the resolution of such issues by writing to boomlly24x7@gmail.com.\r\n\r\n 16.2. You agree that all complaints and disputes at the Company are to be kept confidential. We will endeavour to resolve all grievances within a reasonable period, as mandated under Applicable Law. Any decision taken by Us relating to any complaint will be binding on the user.\r\n\r\n 16.3. The following are the details of Our grievance officer:\r\n   Name: sunil kumar beniwal\r\n   Designation: Grievance Officer\r\n   Email address: sunilbeniwalofficial@gmail.com\r\n\r\n17. Governing Law, Dispute Resolution, and Jurisdiction:\r\n\r\n 17.1. The Platform Policies are governed by and shall be interpreted in accordance with the laws of India.\r\n\r\n 17.2. Subject to Clause 17.3, any dispute, controversy, or claim against the Us or arising out of these Platform Policies shall be subject to the exclusive jurisdiction of the civil courts at Bengaluru, Karnataka.\r\n\r\n 17.3. In the event of any legal dispute arising in relation to any aspect of the Platform Policies, or the use of our Services by You, You must provide written notification to Us of the dispute and relevant details. We shall attempt to resolve the dispute through discussions with You, and where such resolution fails to be concluded within thirty (30) days, the dispute may be referred to arbitration. The arbitration shall be conducted before a tribunal of three (3) arbitrators wherein both the Company and You shall be entitled to appoint one (1) arbitrator each and the two (2) arbitrators shall jointly appoint the third arbitrator. The place of arbitration shall be Bangalore, Karnataka, and the arbitration proceedings shall be conducted, in English, in accordance with the provisions of the Arbitration and Conciliation Act, 1996. The award arising from such arbitration proceedings will be final and binding on the parties, and each party will bear its own costs of arbitration and equally share the fees of the arbitrator unless the arbitral tribunal decides otherwise.\r\n\r\n 17.4. Notwithstanding anything in Clause 17.3, the Company shall be entitled to seek and obtain from a court of competent jurisdiction, an interim or permanent equitable or injunctive relief, or any other relief available under Applicable Law(s), to safeguard its interest, at any time during the pendency of a dispute with You or any other person, and such pursuit of relief shall not constitute a waiver of the arbitration process mandated herein.\r\n\r\n18. Privacy\r\n\r\n 18.1. By using the Platform and providing any of your personal information to the Platform, You affirmatively consent and agree to comply with our Privacy Policy, guidelines and statements as may be applicable from time to time, which are incorporated into and forms an integral part of these Terms. If you do not agree to the terms of the Privacy Policy in its entirety or have objections to the use of your information, you may not access or otherwise use the Platform or its Services.\r\n\r\n19. Responsible Gaming\r\n\r\nThe Company is concerned about Your health and well-being, and we constantly take measures to improve the well-being of our users. You are advised to follow Our Responsible Gaming Policy to maximize Your health and safety while engaging in online gaming.', 'Privacy Policy', 'privacy-policy', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et sagittis elit. Aliquam commodo nisl quam, ac pellentesque justo dictum ac. Etiam ut purus turpis. Curabitur tristique massa ut urna pretium molestie. Phasellus ut massa nulla. Praesent commodo nulla leo, in consequat arcu tincidunt sit amet. Cras at purus felis. Phasellus aliquet ac erat ac pharetra.\r\n\r\nNunc posuere massa ac mollis molestie. Praesent placerat vitae risus imperdiet pellentesque. Morbi mattis at orci at tempor. Aenean sit amet condimentum arcu, sed interdum nunc. Curabitur mattis enim at purus venenatis maximus. Aenean magna elit, gravida sed mi in, cursus varius lectus. Nulla tristique lorem eu tincidunt pharetra. Nullam pretium sem sed ex dignissim, eu vestibulum ex laoreet. Maecenas felis nulla, semper at dolor et, auctor condimentum sem. Nulla dolor nunc, sollicitudin at leo vestibulum, aliquet tempus ex. Donec fringilla consectetur neque non vehicula.\r\n\r\nAenean nec consequat urna, ut molestie enim. Curabitur eu volutpat risus. Donec ultricies massa sit amet hendrerit cursus. Aenean eget molestie metus. Ut diam lectus, cursus quis diam sed, posuere hendrerit dolor. Quisque orci augue, dictum a commodo at, tincidunt eget tortor. Aenean sapien augue, molestie quis est a, vestibulum hendrerit dolor. Maecenas sit amet sodales purus, vel convallis magna. Phasellus aliquam at ex sit amet laoreet. Pellentesque et augue feugiat, accumsan nisl sed, hendrerit tellus. Aliquam ut congue velit.\r\n\r\nInteger ut tortor ante. Sed id magna quis felis egestas ullamcorper eget quis dolor. In hendrerit magna ac lacus luctus, quis facilisis diam consectetur. Maecenas sodales placerat nisi, id lacinia purus malesuada eget. Phasellus venenatis laoreet faucibus. Donec et est at ipsum porta feugiat non ut lacus. Mauris sit amet vulputate ligula, a convallis sem. Nullam eget dolor tellus. Suspendisse potenti. Integer tellus magna, feugiat sit amet posuere quis, finibus a tortor. Aenean a volutpat libero. Fusce vehicula ultrices augue non suscipit. Mauris in nunc rhoncus justo scelerisque auctor. Aliquam varius pulvinar nisl eu porta. Duis mollis id nisl id tempus.\r\n\r\nPhasellus id ligula eu lacus molestie porta eu in arcu. Phasellus ut scelerisque quam. Integer eu nulla metus. Donec ultricies nisi in gravida ultrices. Donec tincidunt lorem in iaculis hendrerit. Nulla et lectus in erat porta pellentesque in a dui. Fusce posuere sem quis turpis suscipit mollis. Praesent eu turpis leo.', '9977696444', 'https://youtube.com', 'https://boomlly.com/razorpay/payment', '1.0', 'https://telegram.com', 'This Is New Version All Issues Fixed & New Look Added', NULL, NULL, '780644e1d1bd830caab64511046087', '8fd70b23c74162347d0fdf00a7b9cdac25fd1224', '0', '1', '0', 'Refund Policy', 'refund-policy', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et sagittis elit. Aliquam commodo nisl quam, ac pellentesque justo dictum ac. Etiam ut purus turpis. Curabitur tristique massa ut urna pretium molestie. Phasellus ut massa nulla. Praesent commodo nulla leo, in consequat arcu tincidunt sit amet. Cras at purus felis. Phasellus aliquet ac erat ac pharetra.\r\n\r\nNunc posuere massa ac mollis molestie. Praesent placerat vitae risus imperdiet pellentesque. Morbi mattis at orci at tempor. Aenean sit amet condimentum arcu, sed interdum nunc. Curabitur mattis enim at purus venenatis maximus. Aenean magna elit, gravida sed mi in, cursus varius lectus. Nulla tristique lorem eu tincidunt pharetra. Nullam pretium sem sed ex dignissim, eu vestibulum ex laoreet. Maecenas felis nulla, semper at dolor et, auctor condimentum sem. Nulla dolor nunc, sollicitudin at leo vestibulum, aliquet tempus ex. Donec fringilla consectetur neque non vehicula.\r\n\r\nAenean nec consequat urna, ut molestie enim. Curabitur eu volutpat risus. Donec ultricies massa sit amet hendrerit cursus. Aenean eget molestie metus. Ut diam lectus, cursus quis diam sed, posuere hendrerit dolor. Quisque orci augue, dictum a commodo at, tincidunt eget tortor. Aenean sapien augue, molestie quis est a, vestibulum hendrerit dolor. Maecenas sit amet sodales purus, vel convallis magna. Phasellus aliquam at ex sit amet laoreet. Pellentesque et augue feugiat, accumsan nisl sed, hendrerit tellus. Aliquam ut congue velit.\r\n\r\nInteger ut tortor ante. Sed id magna quis felis egestas ullamcorper eget quis dolor. In hendrerit magna ac lacus luctus, quis facilisis diam consectetur. Maecenas sodales placerat nisi, id lacinia purus malesuada eget. Phasellus venenatis laoreet faucibus. Donec et est at ipsum porta feugiat non ut lacus. Mauris sit amet vulputate ligula, a convallis sem. Nullam eget dolor tellus. Suspendisse potenti. Integer tellus magna, feugiat sit amet posuere quis, finibus a tortor. Aenean a volutpat libero. Fusce vehicula ultrices augue non suscipit. Mauris in nunc rhoncus justo scelerisque auctor. Aliquam varius pulvinar nisl eu porta. Duis mollis id nisl id tempus.\r\n\r\nPhasellus id ligula eu lacus molestie porta eu in arcu. Phasellus ut scelerisque quam. Integer eu nulla metus. Donec ultricies nisi in gravida ultrices. Donec tincidunt lorem in iaculis hendrerit. Nulla et lectus in erat porta pellentesque in a dui. Fusce posuere sem quis turpis suscipit mollis. Praesent eu turpis leo.');

-- --------------------------------------------------------

--
-- Table structure for table `withdraws`
--

CREATE TABLE `withdraws` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` varchar(200) NOT NULL,
  `amount` varchar(200) DEFAULT NULL,
  `payment_method` varchar(200) DEFAULT NULL,
  `wallet_number` varchar(200) DEFAULT NULL,
  `bank_name` varchar(200) DEFAULT NULL,
  `account_number` varchar(200) DEFAULT NULL,
  `ifsc_code` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT '0',
  `transaction_id` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `withdraws`
--

INSERT INTO `withdraws` (`id`, `userid`, `amount`, `payment_method`, `wallet_number`, `bank_name`, `account_number`, `ifsc_code`, `status`, `transaction_id`, `created_at`, `updated_at`) VALUES
(14, 'LUDO100002', '100', 'Credit Card', '1234567890', 'ABC Bank', '123456789', 'ABCD12345', '1', '54730913', '2024-01-31 06:45:05', '2024-02-01 12:28:41'),
(15, '694660', '1', 'UPI', NULL, '..', 'example_upi_id', '..', '0', NULL, NULL, NULL),
(16, '3646104', '100', NULL, NULL, NULL, NULL, NULL, '0', '46574609', '2024-02-04 15:59:49', '2024-02-04 15:59:49'),
(17, '3646104', '100', 'UPI', NULL, NULL, NULL, NULL, '1', '65116301', '2024-02-04 16:01:48', '2024-02-04 16:02:01'),
(18, '694660', '100', 'UPI', NULL, NULL, NULL, NULL, '1', '80587318', '2024-02-04 16:05:41', '2024-02-04 16:06:11'),
(19, '694660', '100', 'UPI', NULL, NULL, NULL, NULL, '1', '37349386', '2024-02-04 16:07:03', '2024-02-04 16:07:12'),
(20, '694660', '100', 'UPI', NULL, NULL, NULL, NULL, '0', '03244800', '2024-02-05 11:49:20', '2024-02-05 11:49:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addcoins`
--
ALTER TABLE `addcoins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `unique_index` (`unique_index`);

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gamehistories`
--
ALTER TABLE `gamehistories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homedetails`
--
ALTER TABLE `homedetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jackpots`
--
ALTER TABLE `jackpots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kycdetails`
--
ALTER TABLE `kycdetails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kycdetails_document_number_unique` (`document_number`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otps`
--
ALTER TABLE `otps`
  ADD PRIMARY KEY (`ID`);

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
-- Indexes for table `roomdatas`
--
ALTER TABLE `roomdatas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `screenshots`
--
ALTER TABLE `screenshots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopcoins`
--
ALTER TABLE `shopcoins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specials`
--
ALTER TABLE `specials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `specials_offer_title_unique` (`offer_title`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tournaments`
--
ALTER TABLE `tournaments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `tournament_tablemultis`
--
ALTER TABLE `tournament_tablemultis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdatas`
--
ALTER TABLE `userdatas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `websettings`
--
ALTER TABLE `websettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraws`
--
ALTER TABLE `withdraws`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transaction_id` (`transaction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addcoins`
--
ALTER TABLE `addcoins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gamehistories`
--
ALTER TABLE `gamehistories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `homedetails`
--
ALTER TABLE `homedetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jackpots`
--
ALTER TABLE `jackpots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kycdetails`
--
ALTER TABLE `kycdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `otps`
--
ALTER TABLE `otps`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roomdatas`
--
ALTER TABLE `roomdatas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `screenshots`
--
ALTER TABLE `screenshots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `shopcoins`
--
ALTER TABLE `shopcoins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `specials`
--
ALTER TABLE `specials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `tournament_tablemultis`
--
ALTER TABLE `tournament_tablemultis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1132;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `userdatas`
--
ALTER TABLE `userdatas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `websettings`
--
ALTER TABLE `websettings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `withdraws`
--
ALTER TABLE `withdraws`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
