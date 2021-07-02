-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2020 at 11:03 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `felken`
--

-- --------------------------------------------------------

--
-- Table structure for table `apps_countries`
--

CREATE TABLE `apps_countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `apps_countries`
--

INSERT INTO `apps_countries` (`id`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CD', 'Democratic Republic of the Congo'),
(50, 'CG', 'Republic of Congo'),
(51, 'CK', 'Cook Islands'),
(52, 'CR', 'Costa Rica'),
(53, 'HR', 'Croatia (Hrvatska)'),
(54, 'CU', 'Cuba'),
(55, 'CY', 'Cyprus'),
(56, 'CZ', 'Czech Republic'),
(57, 'DK', 'Denmark'),
(58, 'DJ', 'Djibouti'),
(59, 'DM', 'Dominica'),
(60, 'DO', 'Dominican Republic'),
(61, 'TP', 'East Timor'),
(62, 'EC', 'Ecuador'),
(63, 'EG', 'Egypt'),
(64, 'SV', 'El Salvador'),
(65, 'GQ', 'Equatorial Guinea'),
(66, 'ER', 'Eritrea'),
(67, 'EE', 'Estonia'),
(68, 'ET', 'Ethiopia'),
(69, 'FK', 'Falkland Islands (Malvinas)'),
(70, 'FO', 'Faroe Islands'),
(71, 'FJ', 'Fiji'),
(72, 'FI', 'Finland'),
(73, 'FR', 'France'),
(74, 'FX', 'France, Metropolitan'),
(75, 'GF', 'French Guiana'),
(76, 'PF', 'French Polynesia'),
(77, 'TF', 'French Southern Territories'),
(78, 'GA', 'Gabon'),
(79, 'GM', 'Gambia'),
(80, 'GE', 'Georgia'),
(81, 'DE', 'Germany'),
(82, 'GH', 'Ghana'),
(83, 'GI', 'Gibraltar'),
(84, 'GK', 'Guernsey'),
(85, 'GR', 'Greece'),
(86, 'GL', 'Greenland'),
(87, 'GD', 'Grenada'),
(88, 'GP', 'Guadeloupe'),
(89, 'GU', 'Guam'),
(90, 'GT', 'Guatemala'),
(91, 'GN', 'Guinea'),
(92, 'GW', 'Guinea-Bissau'),
(93, 'GY', 'Guyana'),
(94, 'HT', 'Haiti'),
(95, 'HM', 'Heard and Mc Donald Islands'),
(96, 'HN', 'Honduras'),
(97, 'HK', 'Hong Kong'),
(98, 'HU', 'Hungary'),
(99, 'IS', 'Iceland'),
(100, 'IN', 'India'),
(101, 'IM', 'Isle of Man'),
(102, 'ID', 'Indonesia'),
(103, 'IR', 'Iran (Islamic Republic of)'),
(104, 'IQ', 'Iraq'),
(105, 'IE', 'Ireland'),
(106, 'IL', 'Israel'),
(107, 'IT', 'Italy'),
(108, 'CI', 'Ivory Coast'),
(109, 'JE', 'Jersey'),
(110, 'JM', 'Jamaica'),
(111, 'JP', 'Japan'),
(112, 'JO', 'Jordan'),
(113, 'KZ', 'Kazakhstan'),
(114, 'KE', 'Kenya'),
(115, 'KI', 'Kiribati'),
(116, 'KP', 'Korea, Democratic People\'s Republic of'),
(117, 'KR', 'Korea, Republic of'),
(118, 'XK', 'Kosovo'),
(119, 'KW', 'Kuwait'),
(120, 'KG', 'Kyrgyzstan'),
(121, 'LA', 'Lao People\'s Democratic Republic'),
(122, 'LV', 'Latvia'),
(123, 'LB', 'Lebanon'),
(124, 'LS', 'Lesotho'),
(125, 'LR', 'Liberia'),
(126, 'LY', 'Libyan Arab Jamahiriya'),
(127, 'LI', 'Liechtenstein'),
(128, 'LT', 'Lithuania'),
(129, 'LU', 'Luxembourg'),
(130, 'MO', 'Macau'),
(131, 'MK', 'North Macedonia'),
(132, 'MG', 'Madagascar'),
(133, 'MW', 'Malawi'),
(134, 'MY', 'Malaysia'),
(135, 'MV', 'Maldives'),
(136, 'ML', 'Mali'),
(137, 'MT', 'Malta'),
(138, 'MH', 'Marshall Islands'),
(139, 'MQ', 'Martinique'),
(140, 'MR', 'Mauritania'),
(141, 'MU', 'Mauritius'),
(142, 'TY', 'Mayotte'),
(143, 'MX', 'Mexico'),
(144, 'FM', 'Micronesia, Federated States of'),
(145, 'MD', 'Moldova, Republic of'),
(146, 'MC', 'Monaco'),
(147, 'MN', 'Mongolia'),
(148, 'ME', 'Montenegro'),
(149, 'MS', 'Montserrat'),
(150, 'MA', 'Morocco'),
(151, 'MZ', 'Mozambique'),
(152, 'MM', 'Myanmar'),
(153, 'NA', 'Namibia'),
(154, 'NR', 'Nauru'),
(155, 'NP', 'Nepal'),
(156, 'NL', 'Netherlands'),
(157, 'AN', 'Netherlands Antilles'),
(158, 'NC', 'New Caledonia'),
(159, 'NZ', 'New Zealand'),
(160, 'NI', 'Nicaragua'),
(161, 'NE', 'Niger'),
(162, 'NG', 'Nigeria'),
(163, 'NU', 'Niue'),
(164, 'NF', 'Norfolk Island'),
(165, 'MP', 'Northern Mariana Islands'),
(166, 'NO', 'Norway'),
(167, 'OM', 'Oman'),
(168, 'PK', 'Pakistan'),
(169, 'PW', 'Palau'),
(170, 'PS', 'Palestine'),
(171, 'PA', 'Panama'),
(172, 'PG', 'Papua New Guinea'),
(173, 'PY', 'Paraguay'),
(174, 'PE', 'Peru'),
(175, 'PH', 'Philippines'),
(176, 'PN', 'Pitcairn'),
(177, 'PL', 'Poland'),
(178, 'PT', 'Portugal'),
(179, 'PR', 'Puerto Rico'),
(180, 'QA', 'Qatar'),
(181, 'RE', 'Reunion'),
(182, 'RO', 'Romania'),
(183, 'RU', 'Russian Federation'),
(184, 'RW', 'Rwanda'),
(185, 'KN', 'Saint Kitts and Nevis'),
(186, 'LC', 'Saint Lucia'),
(187, 'VC', 'Saint Vincent and the Grenadines'),
(188, 'WS', 'Samoa'),
(189, 'SM', 'San Marino'),
(190, 'ST', 'Sao Tome and Principe'),
(191, 'SA', 'Saudi Arabia'),
(192, 'SN', 'Senegal'),
(193, 'RS', 'Serbia'),
(194, 'SC', 'Seychelles'),
(195, 'SL', 'Sierra Leone'),
(196, 'SG', 'Singapore'),
(197, 'SK', 'Slovakia'),
(198, 'SI', 'Slovenia'),
(199, 'SB', 'Solomon Islands'),
(200, 'SO', 'Somalia'),
(201, 'ZA', 'South Africa'),
(202, 'GS', 'South Georgia South Sandwich Islands'),
(203, 'SS', 'South Sudan'),
(204, 'ES', 'Spain'),
(205, 'LK', 'Sri Lanka'),
(206, 'SH', 'St. Helena'),
(207, 'PM', 'St. Pierre and Miquelon'),
(208, 'SD', 'Sudan'),
(209, 'SR', 'Suriname'),
(210, 'SJ', 'Svalbard and Jan Mayen Islands'),
(211, 'SZ', 'Swaziland'),
(212, 'SE', 'Sweden'),
(213, 'CH', 'Switzerland'),
(214, 'SY', 'Syrian Arab Republic'),
(215, 'TW', 'Taiwan'),
(216, 'TJ', 'Tajikistan'),
(217, 'TZ', 'Tanzania, United Republic of'),
(218, 'TH', 'Thailand'),
(219, 'TG', 'Togo'),
(220, 'TK', 'Tokelau'),
(221, 'TO', 'Tonga'),
(222, 'TT', 'Trinidad and Tobago'),
(223, 'TN', 'Tunisia'),
(224, 'TR', 'Turkey'),
(225, 'TM', 'Turkmenistan'),
(226, 'TC', 'Turks and Caicos Islands'),
(227, 'TV', 'Tuvalu'),
(228, 'UG', 'Uganda'),
(229, 'UA', 'Ukraine'),
(230, 'AE', 'United Arab Emirates'),
(231, 'GB', 'United Kingdom'),
(232, 'US', 'United States'),
(233, 'UM', 'United States minor outlying islands'),
(234, 'UY', 'Uruguay'),
(235, 'UZ', 'Uzbekistan'),
(236, 'VU', 'Vanuatu'),
(237, 'VA', 'Vatican City State'),
(238, 'VE', 'Venezuela'),
(239, 'VN', 'Vietnam'),
(240, 'VG', 'Virgin Islands (British)'),
(241, 'VI', 'Virgin Islands (U.S.)'),
(242, 'WF', 'Wallis and Futuna Islands'),
(243, 'EH', 'Western Sahara'),
(244, 'YE', 'Yemen'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uni_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `fac_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `dept_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `course_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `course_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `level` smallint(5) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `uni_id`, `fac_id`, `dept_id`, `course_id`, `course_code`, `level`, `name`, `created_at`, `updated_at`) VALUES
(1, 'ZmNMZD7BekqVFY5OD2Yb', 'FJMbLP8zsvakTKpaLNDZ', 'XBmUV0RUWD6BeP92Kg7Y', 'HHtBdpRf3IjMFlK2dPux', 'EDU201', 0, 'Education Liget', '2019-12-20 20:05:39', '2019-12-20 20:05:39'),
(3, 'lsdfjsijdf', 'sdfwefadfwe', 'sdfwefwf', 'yZl4fa4Y7KIaaKzIuw4B', 'BSU201', 0, 'Dont Ask me nonsense', NULL, NULL),
(10, 'wEhmDj930JrNu83h3y2N', 'nhqPUboyiFJXtGwkxBfK', 'kJnUeyqh6ZkgecDDYiec', 'yl9Yjad3RR2IyJg8hIHV', 'NUR201', 2, 'Hypermatis', '2020-01-14 14:16:04', '2020-01-14 14:16:04'),
(11, 'wEhmDj930JrNu83h3y2N', 'nhqPUboyiFJXtGwkxBfK', 'kJnUeyqh6ZkgecDDYiec', 'Io88r71P7AnqNGeeZXss', 'NUR212', 2, 'Pathology', '2020-01-14 14:16:04', '2020-01-14 14:16:04'),
(12, 'wEhmDj930JrNu83h3y2N', 'nhqPUboyiFJXtGwkxBfK', 'kJnUeyqh6ZkgecDDYiec', 'S7L1egg22QoSJZ9iWlXH', 'NUR243', 2, 'Homology', '2020-01-14 14:16:04', '2020-01-14 14:16:04'),
(13, 'wEhmDj930JrNu83h3y2N', 'RFqOqO16F76AwekEJ24z', 'TPK9anB8BViPN9lGGsYf', 'jwwOgTUqkuOfPwxXB0fp', 'ME211', 2, 'Fluid Mechanics', '2020-01-16 10:29:18', '2020-01-16 10:29:18');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fac_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No faculty ID',
  `uni_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No department ID',
  `dept_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No ID',
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No Name',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `fac_id`, `uni_id`, `dept_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'KPFUg29Ax9FO79FE4Lge', 'SrAZqqHVWCP94GdxahXM', 'yjWTa7cm5vZGCjuJzCWT', 'PHYSICAL SCIENCES', '2019-11-13 19:42:52', '2019-11-13 19:42:52'),
(2, 'KPFUg29Ax9FO79FE4Lge', 'SrAZqqHVWCP94GdxahXM', 'hOxRXLUoaH8DzKe9gAdU', 'BIOCHEMISTRY', '2019-11-13 19:43:19', '2019-11-13 19:43:19'),
(3, 'KPFUg29Ax9FO79FE4Lge', 'SrAZqqHVWCP94GdxahXM', 'PV08TFEUPECRHAWTlI9z', 'COMPUTER STATISTICS', '2019-11-13 19:44:34', '2019-11-13 19:44:34'),
(4, 'CeRXY0Ex8RO34cZSrU7D', 'SrAZqqHVWCP94GdxahXM', 'qLJ8clcI5id7PTfR61on', 'AGRICULTURE', '2019-11-13 20:29:40', '2019-11-13 20:29:40'),
(5, 'gbZJgM9PCzQugKk0rD6h', 'Dq6hUWGStfNK2GT5cd4z', '2M34fu782gEft1LyQBX9', 'AGRICULTURE', '2019-11-13 20:29:54', '2019-11-13 20:29:54'),
(13, 'FJMbLP8zsvakTKpaLNDZ', 'ZmNMZD7BekqVFY5OD2Yb', 'p7yfg2XzlF9F2COHhSng', 'COMPUTER STATISTICS', '2019-11-15 21:06:23', '2019-11-15 21:06:23'),
(14, 'FJMbLP8zsvakTKpaLNDZ', 'ZmNMZD7BekqVFY5OD2Yb', 'XBmUV0RUWD6BeP92Kg7Y', 'EDUCATION SCIENCES', '2019-11-15 21:08:05', '2019-11-15 21:08:05'),
(15, 'Rb1ycXOixqUfFo9aWH9i', 'ZmNMZD7BekqVFY5OD2Yb', 'SE5hirVldsYOJ74ki67e', 'EDUCATION SCIENCES', '2019-11-15 21:08:57', '2019-11-15 21:08:57'),
(16, '7Xi3KNdMdby5L4BX9DSE', 'Rb1ycXOixqUfFo9aWH9i', 'r3LbXZJs6pEdXzKkH09S', 'VOCATIONAL EDUCATION', '2019-11-15 22:04:44', '2019-11-15 22:04:44'),
(17, '7Xi3KNdMdby5L4BX9DSE', 'Rb1ycXOixqUfFo9aWH9i', 'MtIm1g4Hb9k6VBhz5Niu', 'COMPUTER EDUCATION', '2019-11-15 22:05:06', '2019-11-15 22:05:06'),
(18, 'Nsx1jYlkKwrGnsLQAKwT', 'aQ6WWD2UX55VVlbkpdX8', 'Xx6oKDDYDjFfDvCbT0Hk', 'Biochemistry', '2019-11-21 14:35:23', '2019-11-21 14:35:23'),
(19, 'Xn1qCzYuVemjpm2UoN4R', 'jkFG9dsYwtPo96e6fqTx', 'JdCjE8LsHmEjf2uqA4Gp', 'COMPUTER STAT', '2019-12-10 12:41:13', '2019-12-10 12:41:13'),
(24, 'RFqOqO16F76AwekEJ24z', 'wEhmDj930JrNu83h3y2N', 'TPK9anB8BViPN9lGGsYf', 'Mechanical Engineering', '2020-01-14 10:36:11', '2020-01-14 10:36:11'),
(25, 'RFqOqO16F76AwekEJ24z', 'wEhmDj930JrNu83h3y2N', 'YUfue7IJ7lKWMk63v4iI', ' Electrical Engineerig', '2020-01-14 10:36:11', '2020-01-14 10:36:11'),
(26, 'RFqOqO16F76AwekEJ24z', 'wEhmDj930JrNu83h3y2N', 'wWxxQ3efWyxAOuQBThBT', ' Civil Engineering', '2020-01-14 10:36:11', '2020-01-14 10:36:11'),
(27, 'RFqOqO16F76AwekEJ24z', 'wEhmDj930JrNu83h3y2N', 'LSqy4glH1tx6odEjYY8j', ' Electronic Engineering', '2020-01-14 10:36:11', '2020-01-14 10:36:11'),
(28, 'RFqOqO16F76AwekEJ24z', 'wEhmDj930JrNu83h3y2N', '374k5FAwWhB4a3e9fHUl', 'Biology Engineering', '2020-01-14 11:24:57', '2020-01-14 11:24:57'),
(29, 'XCScwfNohFE89wmkVll3', 'wEhmDj930JrNu83h3y2N', 'XiFhFoq3sTx9sbUQn0U2', 'Computer Education', '2020-01-14 11:26:47', '2020-01-14 11:26:47'),
(30, 'XCScwfNohFE89wmkVll3', 'wEhmDj930JrNu83h3y2N', 'F56IjJkYvxrHLkELf9wU', 'Vocational Education', '2020-01-14 11:26:48', '2020-01-14 11:26:48'),
(31, 'XCScwfNohFE89wmkVll3', 'wEhmDj930JrNu83h3y2N', 'xihWY4p5LrPNyrmS8A8j', 'Physcial Education', '2020-01-14 11:27:36', '2020-01-14 11:27:36'),
(32, 'nhqPUboyiFJXtGwkxBfK', 'wEhmDj930JrNu83h3y2N', 'kJnUeyqh6ZkgecDDYiec', 'Nurse', '2020-01-14 13:45:06', '2020-01-14 13:45:06');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uni_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT 'No uni id',
  `fac_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT 'No ID',
  `name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT 'No Name',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `uni_id`, `fac_id`, `name`, `created_at`, `updated_at`) VALUES
(13, 'Rb1ycXOixqUfFo9aWH9i', '7Xi3KNdMdby5L4BX9DSE', 'EDUCATION SCIENCES', '2019-11-14 21:54:01', '2019-11-14 21:54:01'),
(14, 'ZmNMZD7BekqVFY5OD2Yb', 'FJMbLP8zsvakTKpaLNDZ', 'STATISTICS', '2019-11-14 21:54:42', '2019-11-14 21:54:42'),
(16, 'Rb1ycXOixqUfFo9aWH9i', 'VFzMQ1VKK6qoJ0oy9W0A', 'PHYSICAL SCIENCES', '2019-11-15 22:09:51', '2019-11-15 22:09:51'),
(17, 'aQ6WWD2UX55VVlbkpdX8', 'Nsx1jYlkKwrGnsLQAKwT', 'Biological Sciences', '2019-11-21 14:34:41', '2019-11-21 14:34:41'),
(18, 'jkFG9dsYwtPo96e6fqTx', 'Xn1qCzYuVemjpm2UoN4R', 'COMPUTER SCIENCE', '2019-12-10 12:40:19', '2019-12-10 12:40:19'),
(19, 'ZmNMZD7BekqVFY5OD2Yb', 'm8sq8kbacTWtzjsyf2p7', 'ify', '2020-01-14 09:41:59', '2020-01-14 09:41:59'),
(20, 'ZmNMZD7BekqVFY5OD2Yb', 'pAQaLpM8GVtLnEgoF4O5', 'cani', '2020-01-14 09:41:59', '2020-01-14 09:41:59'),
(21, 'ZmNMZD7BekqVFY5OD2Yb', '6ifIBAi1PH0WU9kP50d9', 'john', '2020-01-14 09:41:59', '2020-01-14 09:41:59'),
(22, 'ZmNMZD7BekqVFY5OD2Yb', '1CPP8PkUWqOIYW3uPxUY', 'ify', '2020-01-14 09:42:17', '2020-01-14 09:42:17'),
(23, 'ZmNMZD7BekqVFY5OD2Yb', '0RJhsuiarPWajPvI571E', 'cani', '2020-01-14 09:42:17', '2020-01-14 09:42:17'),
(24, 'ZmNMZD7BekqVFY5OD2Yb', 'QRdGdEMsmvvWVr3fwNVw', 'john', '2020-01-14 09:42:17', '2020-01-14 09:42:17'),
(25, 'aQ6WWD2UX55VVlbkpdX8', 'wAlepTDxmcfLA1GrYolk', 'Engineering', '2020-01-14 09:44:09', '2020-01-14 09:44:09'),
(26, 'aQ6WWD2UX55VVlbkpdX8', 'KrrOy8Qv7XiWNmxk5RR1', 'Education', '2020-01-14 09:44:09', '2020-01-14 09:44:09'),
(27, 'aQ6WWD2UX55VVlbkpdX8', '8UjtLZfMCbb7x5JmVwje', 'Physical Sciences', '2020-01-14 09:44:09', '2020-01-14 09:44:09'),
(28, 'wEhmDj930JrNu83h3y2N', 'RFqOqO16F76AwekEJ24z', 'Engineering', '2020-01-14 09:51:31', '2020-01-14 09:51:31'),
(29, 'wEhmDj930JrNu83h3y2N', 'XCScwfNohFE89wmkVll3', 'Education', '2020-01-14 09:51:31', '2020-01-14 09:51:31'),
(30, 'wEhmDj930JrNu83h3y2N', '2V6FZY5GDNmRJfsXQQd3', 'BiologicalSciences', '2020-01-14 09:51:31', '2020-01-14 09:51:31'),
(31, 'wEhmDj930JrNu83h3y2N', 'thZZsBn7E5w2cBbV5IqA', 'PhysicalSciences', '2020-01-14 09:51:31', '2020-01-14 09:51:31'),
(32, 'wEhmDj930JrNu83h3y2N', 'wiocKT3r6BBlhfNushqz', 'SocialSciences', '2020-01-14 09:51:31', '2020-01-14 09:51:31'),
(40, 'wEhmDj930JrNu83h3y2N', 'gGoF0crbLSehrvo6AJG8', 'Management', '2020-01-14 11:07:59', '2020-01-14 11:07:59'),
(41, 'wEhmDj930JrNu83h3y2N', 'nhqPUboyiFJXtGwkxBfK', 'Nursing', '2020-01-14 13:43:55', '2020-01-14 13:43:55');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_level`
--

CREATE TABLE `faculty_level` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fac_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT 'No Name',
  `level` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculty_level`
--

INSERT INTO `faculty_level` (`id`, `fac_id`, `level`, `created_at`, `updated_at`) VALUES
(1, 'X02DqjmfnoUrGYSCYFPD', 2, '2020-01-15 21:30:01', '2020-01-15 21:30:01'),
(2, 'jNiy1VFykVwZgTbRzQR3', 2, '2020-01-15 21:33:48', '2020-01-15 21:33:48'),
(3, 'sL4Gure40T2D4T0svC4A', 1, '2020-01-15 22:07:12', '2020-01-15 22:07:12'),
(4, 'YlX1HDYOave2LA3qpFAy', 2, '2020-01-16 10:37:14', '2020-01-16 10:37:14'),
(5, 'fcTUOkbb09UgYuBzeQV7', 1, '2020-01-16 10:50:24', '2020-01-16 10:50:24'),
(6, 'O2WxiNt67JDJfyu67auS', 1, '2020-01-16 10:54:45', '2020-01-16 10:54:45');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `institution_type`
--

CREATE TABLE `institution_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `institution_type_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No School ID',
  `institution_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No school type',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `institution_type`
--

INSERT INTO `institution_type` (`id`, `institution_type_id`, `institution_type`, `created_at`, `updated_at`) VALUES
(1, 'l9gVFAYQOelo3vSavTCL', 'Nursing School', '2020-01-15 21:33:48', '2020-01-15 21:33:48'),
(2, 'eBUgRJ08iQ2lQsGaYDJ1', 'Midwifery', '2020-01-15 22:07:12', '2020-01-15 22:07:12'),
(6, 'weF8z1fQKQzKiTOqqOOg', 'School of Engineering', '2020-01-16 10:54:45', '2020-01-16 10:54:45');

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No ID',
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `display_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `department` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `dept_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_pics` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`id`, `user_id`, `username`, `display_name`, `title`, `email`, `phone`, `first_name`, `last_name`, `department`, `dept_id`, `profile_pics`, `country`, `created_at`, `updated_at`) VALUES
(5, 'mJ9tiPbw4S1H58LVgPxm', 'Samse', 'Acazone Name', '', 'sam@sa.sa1', '08100141285332', 'Oshaba', 'Sam', 'Metallurgical And Materials Engineering', '', '', 'Nigeria', '2019-11-16 07:58:00', '2019-11-16 07:58:00'),
(6, 'FMmRXgApuo5AZe4zGqUl', 'Samsdfwe', 'Acazone Name', '', 'sam@sa.sa1', '08100141285332234', 'Oshaba', 'Sam', 'Metallurgical And Materials Engineering', '', '', 'Nigeria', '2019-11-16 08:01:58', '2019-11-16 08:01:58'),
(7, 'J0jcK7eUvadzSNaaoG2h', 'Samre', 'Oshabz', '', 'instructor', 'jnfkjnwef', 'samson', 'Okoye', 'Metallurgical And Materials Engineering', 'MtIm1g4Hb9k6VBhz5Niu', '', 'Nigeria', '2019-11-16 08:03:01', '2020-01-06 14:18:47'),
(8, 'dxqMQiYq3N00oUupsnmw', 'ify', 'Acazone Name', '', 'ify@ify.com', '0803654712541', 'Nwaokoye', 'ifeanyi', 'Metallurgical And Materials Engineering', '', '', 'Nigeria', '2019-11-20 04:00:31', '2019-11-20 04:00:31'),
(9, 'dxqMQiYq3N00oUupsnmw', 'ify1', 'Acazone Name', '', 'ify@ify.coms', '080365471254112', 'Nwaokoye', 'ifeanyi', 'Metallurgical And Materials Engineering', '', '', 'Nigeria', '2019-11-20 04:01:48', '2019-11-20 04:01:48'),
(10, '5rzsMw5WGCJmcdpb8uCu', NULL, '', '', NULL, NULL, NULL, NULL, 'p7yfg2XzlF9F2COHhSng', '', '', 'text', '2019-12-25 15:00:51', '2019-12-25 15:00:51'),
(11, 'WZgtxYLps5LqTUw2nJKZ', 'sdfwef', '', '', 'sdfwef', 'sdfwefwef', 'dsfwe', 'sdwef', 'p7yfg2XzlF9F2COHhSng', '', '', 'text', '2019-12-25 15:01:53', '2019-12-25 15:01:53'),
(12, 'rOxDbzwVGsjXeOHdZgG8', 'sdwef', '', '', 'sdfwef', 'sdfwefwefyiuy', 'dsfwe', 'sdwef', 'p7yfg2XzlF9F2COHhSng', '', '', 'text', '2019-12-25 15:03:59', '2019-12-25 15:03:59'),
(13, 'vrQEFThcLnQEOWGIWah6', 'sdwef', '', '', 'sdfweffgerg', 'sdfwefwefyiuyege', 'dsfwe', 'sdwef', 'p7yfg2XzlF9F2COHhSng', '', '', 'text', '2019-12-25 15:04:43', '2019-12-25 15:04:43'),
(14, 'QI1SFIKd9QhcoKxSyYyC', 'lksdoifjaef', '', '', 'lksdjfio@kloi.sdkjfo', '93839393939', 'aiksjfoi', 'ljsdfoij', 'r3LbXZJs6pEdXzKkH09S', '', '', 'text', '2019-12-26 05:27:19', '2019-12-26 05:27:19'),
(16, 'Hz7PqZ9wgfVocZxsUclI', 'ljsdfoijbjkasdfu', '', '', 'lksdjfio@kloi.sdkjfosdfef', 'kmsdofwef', 'aiksjfoi', 'ljsdfoij', 'r3LbXZJs6pEdXzKkH09S', '', '', 'text', '2019-12-26 05:30:35', '2019-12-26 05:30:35'),
(17, 'uNGpBkoD8F7QMck48oZz', 'ljsdfoij', '', '', 'lksdjfio@kloi.sdkjfosdfef', 'kmsdofwefsdf', 'aiksjfoi', 'ljsdfoij', 'r3LbXZJs6pEdXzKkH09S', '', '', 'text', '2019-12-26 05:34:06', '2019-12-26 05:34:06'),
(18, 'c55jidSITwQD6WjaXjoT', 'ljsdfoij', '', '', 'ksfjoiwe@KLjoi.dsfoi', 'kajoidfjwsdkf', 'aiksjfoi', 'ljsdfoij', 'text', 'r3LbXZJs6pEdXzKkH09S', '', 'text', '2019-12-26 05:37:20', '2019-12-26 05:37:20'),
(19, 'otf4aq45oKJYZx820bJp', 'kljaoijfwefksj', '', '', 'ksfjoiwe@KLjoi.dsfoi', 'kajoidfjwsfj', 'akljfiwef', 'lkfjiwefksjfoi', 'text', 'p7yfg2XzlF9F2COHhSng', '', 'text', '2019-12-26 05:40:37', '2019-12-26 05:40:37'),
(20, 'RveXvBwqR44OV6gcmOTu', 'lkfjiwefksjfoi', '', '', 'ksfjoiwe@KLjoi.dsfoi', 'kajoidfjwsfjlkdfjjnsfwe', 'akljfiwef', 'lkfjiwefksjfoi', 'text', 'r3LbXZJs6pEdXzKkH09S', '', 'text', '2019-12-26 06:58:57', '2019-12-26 06:58:57'),
(21, 'LBqcUWM1kFcMehtlGEQx', 'lkfjiwefksjfoi', '', '', 'ksfjoiwjwee@KLjoi.dsfoi', 'kajoidfjwsfjlkdfjjnsfwesjfouw', 'akljfiwef', 'lkfjiwefksjfoi', 'text', 'r3LbXZJs6pEdXzKkH09S', '', 'text', '2019-12-26 06:59:55', '2019-12-26 06:59:55'),
(22, 'KFDtVrmsSPtJDA6RaI2D', 'lkjsfoiwjefk', '', '', 'kjfoiwe@lkjoi.ksfjo', 'lkfjoiwefjoiwefjo', 'sfjowfe', 'lkjfoiwjef', 'text', 'r3LbXZJs6pEdXzKkH09S', '', 'text', '2019-12-26 09:03:30', '2019-12-26 09:03:30'),
(23, 'QGEqriaxVT5CPyGsXMo3', ';lkspfowef', '', '', 'l;kfpowef@lkp/sdop', '09393030', ';laskfk;l', 'lksfwoefk', 'text', 'p7yfg2XzlF9F2COHhSng', '', 'text', '2019-12-30 10:47:23', '2019-12-30 10:47:23'),
(24, 'xqk0D9FWvl8TPOb4HjNC', 'ifeoke', '', '', 'ife@gmail.com', '08032547451', 'ifeoma', 'Okoye', 'text', 'p7yfg2XzlF9F2COHhSng', '', 'text', '2019-12-30 10:48:41', '2019-12-30 10:48:41'),
(25, 'GVm5Mgt7ZZZYnsEYyHII', 'ifeokes', '', '', 'ife@gmail.com', '080325474513', 'ifeomas', 'Okoyes', 'text', 'p7yfg2XzlF9F2COHhSng', '', 'text', '2019-12-30 10:52:42', '2019-12-30 10:52:42'),
(26, 'zgVVgC7GBlWPdM6WNzB6', 'Okoyese', '', '', 'ife@gmail.coms', '08032547432', 'ifeomase', 'Okoyese', 'text', 'p7yfg2XzlF9F2COHhSng', '', 'text', '2019-12-30 10:54:02', '2019-12-30 10:54:02'),
(27, 'juCasQzKU6qKOlcM7Twy', 'wefawfe', '', '', 'afwefwfe@gmail.com', 'wefwefwf', 'sdfwe', 'wefawfe', 'text', 'XBmUV0RUWD6BeP92Kg7Y', '', 'text', '2019-12-30 11:14:52', '2019-12-30 11:14:52'),
(28, 'bKgrcwOrvRPy7NZeIRUt', 'Ikenna', '', '', 'Ikeoko@gmail.com', '+23481001412850', 'Okoye', 'Ikenna', 'text', 'XBmUV0RUWD6BeP92Kg7Y', '', 'text', '2019-12-30 11:18:51', '2019-12-30 11:18:51'),
(29, 'bPu6tTO4cTUTSLaU6afR', 'Nwajo', 'Nwa jo', '', 'Nwajo@gmail.com', '081001412857', 'Nwa', 'Jo', 'text', 'XBmUV0RUWD6BeP92Kg7Y', 'profile_pics//2019_12_01_15aea6a12b93ad73f498d95050357f51.png', 'text', '2019-12-30 11:31:20', '2019-12-30 11:50:52'),
(30, 'E5BJyXDup5y7h0qJB2BA', 'dfgerge', '', '', 'klfjl@kljoi.ljo', '123654785', 'sfwfwf', 'dfgerge', 'text', 'p7yfg2XzlF9F2COHhSng', '', 'text', '2019-12-31 16:27:24', '2019-12-31 16:27:24'),
(31, 'E8g4DYq5kKf8j1eMMUyD', 'matter', '', '', 'oshab@gmail.com', '254758', 'ohas', 'matter', NULL, '', '', 'text', '2020-01-17 21:26:20', '2020-01-17 21:26:20'),
(39, 'wuxQF5bp17cwOF4DgBV1', 'samo', '', 'Dr', 'chuksdsilent@gmail.com', '0812354785', 'condono', 'sam', NULL, '', '', 'text', '2020-02-28 21:41:41', '2020-02-28 21:41:41');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_11_07_103303_create_faculties_table', 1),
(7, '2019_11_11_105502_university', 1),
(8, '2019_11_11_110038_department', 1),
(9, '2019_11_11_110238_secondary_school', 1),
(10, '2019_11_11_110707_instructor', 1),
(13, '2019_11_08_211504_create_subjects_table', 3),
(25, '2019_11_26_102457_ceate_video_likes', 5),
(28, '2019_11_26_111058_ceate_subscription_table', 7),
(31, '2019_12_16_205506_create_topics_table', 9),
(40, '2019_12_19_184455_create_comment_table', 12),
(41, '2019_12_18_224203_create_video_views_likes', 13),
(42, '2019_11_20_054536_create_videos_table', 14),
(43, '2019_11_08_202913_create_courses_table', 15),
(45, '2020_01_07_093935_create_table_sec_videos', 16),
(46, '2020_01_07_124638_create_sec_video_views_thumbsup', 17),
(47, '2020_01_07_124854_create_sec_video_views_likes', 17),
(64, '2020_01_14_115350_create_faculty_level', 28),
(66, '2020_01_15_005654_create_other_schools_topics', 29),
(68, '2020_01_15_203326_create_other_institution_courses', 30),
(69, '2020_01_15_203405_create_other_institutions', 31),
(70, '2020_01_15_221601_create_institution_type', 31),
(72, '2020_01_15_203051_create_other_institution_topics', 32),
(76, '2020_01_16_212808_create_other_institution_videos', 33),
(78, '2020_01_17_143702_create_other_institution_students', 34),
(79, '2020_01_17_213559_create_students', 35),
(81, '2020_01_17_215625_create_sec_students', 36),
(82, '2020_01_18_200459_create_sec_topics', 37),
(83, '2020_01_18_232511_create_other_institution_views_likes', 38);

-- --------------------------------------------------------

--
-- Table structure for table `other_institutions`
--

CREATE TABLE `other_institutions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `institution_type_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No School ID',
  `institution_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No School ID',
  `institution_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No school type',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `other_institutions`
--

INSERT INTO `other_institutions` (`id`, `institution_type_id`, `institution_id`, `institution_name`, `created_at`, `updated_at`) VALUES
(1, 'l9gVFAYQOelo3vSavTCL', 'jNiy1VFykVwZgTbRzQR3', 'Bishop Shanahan', '2020-01-15 21:33:48', '2020-01-15 23:09:23'),
(2, 'eBUgRJ08iQ2lQsGaYDJ1', 'sL4Gure40T2D4T0svC4A', 'Obioma Midwifery', '2020-01-15 22:07:12', '2020-01-15 22:07:12'),
(4, 'l9gVFAYQOelo3vSavTCL', 'YlX1HDYOave2LA3qpFAy', 'Queens School', '2020-01-16 10:37:13', '2020-01-16 10:37:13'),
(5, 'uGNDBaxGXrt1OHe6Oc8c', 'fcTUOkbb09UgYuBzeQV7', 'Ada And Obi Midwifery', '2020-01-16 10:50:24', '2020-01-16 10:50:24'),
(6, 'weF8z1fQKQzKiTOqqOOg', 'O2WxiNt67JDJfyu67auS', 'Akwa Engineering School', '2020-01-16 10:54:45', '2020-01-16 10:54:45');

-- --------------------------------------------------------

--
-- Table structure for table `other_institution_courses`
--

CREATE TABLE `other_institution_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `institution_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No School type',
  `course_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No Course ID',
  `course_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No Course code',
  `course_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No course name',
  `level` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `other_institution_courses`
--

INSERT INTO `other_institution_courses` (`id`, `institution_id`, `course_id`, `course_code`, `course_name`, `level`, `created_at`, `updated_at`) VALUES
(1, 'jNiy1VFykVwZgTbRzQR3', 'pV7Lstc2GxkBcVlevM0U', 'NUR123', 'Nursing Culture', 1, '2020-01-15 21:33:48', '2020-01-15 21:33:48'),
(2, 'jNiy1VFykVwZgTbRzQR3', 'PkiEj5FMceja9LPJi332', 'NUR178', 'Nursing Values', 1, '2020-01-15 21:33:48', '2020-01-15 21:33:48'),
(3, 'jNiy1VFykVwZgTbRzQR3', 'dh9qeSzgUM5CD0MygSYQ', 'NUR184', 'Nursing Ethics', 1, '2020-01-15 21:33:48', '2020-01-15 21:33:48'),
(4, 'jNiy1VFykVwZgTbRzQR3', 'DgxYzS4FizB6JiBF6jdf', 'NUR223', 'Nursing Culture', 2, '2020-01-15 21:33:48', '2020-01-15 21:33:48'),
(5, 'jNiy1VFykVwZgTbRzQR3', 'HB5pYZeD0YIv9bI4UsW3', 'NUR278', 'Nursing Values', 2, '2020-01-15 21:33:48', '2020-01-15 21:33:48'),
(6, 'sL4Gure40T2D4T0svC4A', 'y5MhYehHxZ2qQeZDvQen', 'Mid157', 'Midwifery', 1, '2020-01-15 22:07:13', '2020-01-16 11:07:16'),
(7, 'sL4Gure40T2D4T0svC4A', '2CzpbrIexKEEgJ9WORBd', 'Mid175', 'Midwifery Norms', 1, '2020-01-15 22:07:13', '2020-01-15 23:06:42'),
(8, 'YlX1HDYOave2LA3qpFAy', 'D2eP4BcTfWkEpbIKb7AA', 'NUR123', 'Nursing Culture', 1, '2020-01-16 10:37:14', '2020-01-16 10:37:14'),
(9, 'YlX1HDYOave2LA3qpFAy', 'PgDEwy8RgyFEXtS1OI0C', 'NUR178', 'Nursing Values', 1, '2020-01-16 10:37:14', '2020-01-16 10:37:14'),
(10, 'YlX1HDYOave2LA3qpFAy', '9FFitLNObrHYCYNicPJk', 'NUR223', 'Nurse Values', 2, '2020-01-16 10:37:14', '2020-01-16 10:37:14'),
(11, 'YlX1HDYOave2LA3qpFAy', 'flAIoPkWKCDQTgio1oBG', 'NUR278', ' Nurse Norms', 2, '2020-01-16 10:37:14', '2020-01-16 10:37:14'),
(12, 'fcTUOkbb09UgYuBzeQV7', 'wNDGV4upP8pUAk75wQDk', 'Md124', 'Midwife Values', 1, '2020-01-16 10:50:24', '2020-01-16 10:50:24'),
(13, 'fcTUOkbb09UgYuBzeQV7', 'hEOIl2ZGQ4E9Zc5lGj4n', 'Md104', ' Midwife Norms', 1, '2020-01-16 10:50:24', '2020-01-16 10:50:24'),
(14, 'O2WxiNt67JDJfyu67auS', '2NeX9Vcn0F73b6o8Ky4G', 'Eng1102', 'Mechanics of Engineering', 1, '2020-01-16 10:54:46', '2020-01-16 10:54:46'),
(15, 'O2WxiNt67JDJfyu67auS', 'kobAcCrlJEHml7TSPJma', 'Eng152', 'Engineering fluid', 1, '2020-01-16 10:54:46', '2020-01-16 10:54:46');

-- --------------------------------------------------------

--
-- Table structure for table `other_institution_students`
--

CREATE TABLE `other_institution_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No username',
  `user_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No username',
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No username',
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No username',
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No username',
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No username',
  `profile_pics` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `institution_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No username',
  `institution_level` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No username',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `other_institution_students`
--

INSERT INTO `other_institution_students` (`id`, `username`, `user_id`, `email`, `first_name`, `last_name`, `phone`, `profile_pics`, `institution_id`, `institution_level`, `created_at`, `updated_at`) VALUES
(1, 'lkjsdiofwesd', 'poO45vYGUHI836db1jHT', 'No username', 'lsjdjfoiwef', 'lkjdsoifjwe', '5484984984798', 'No username', 'YlX1HDYOave2LA3qpFAy', '1', '2020-01-17 19:26:04', '2020-01-17 19:26:04'),
(2, 'lkjsdiofwesd', 'rGwru87icJga3Zlt20rC', 'No username', 'lsjdjfoiwef', 'lkjdsoifjwe', '5484984984798', 'No username', 'YlX1HDYOave2LA3qpFAy', '1', '2020-01-17 19:29:56', '2020-01-17 19:29:56'),
(3, 'samokye', 'Qm5zfesoNFfSCjPbKlWr', 'No username', 'Samson', 'Okoye', '08024578456', 'No username', 'jNiy1VFykVwZgTbRzQR3', '2', '2020-01-17 19:31:35', '2020-01-17 19:31:35'),
(4, 'Okoyesd', '2zRD4r4Oq6iHuSsjM8D7', 'sam@gmail.com', 'Samson', 'Okoye', '08024578456', 'No username', 'jNiy1VFykVwZgTbRzQR3', '2', '2020-01-17 19:38:19', '2020-01-17 19:38:19'),
(5, 'Okoyesd', 'yD0oRnvXRUCFCeE849cH', 'sam@gmail.com', 'Samson', 'Okoye', '08024578456', 'No username', 'jNiy1VFykVwZgTbRzQR3', '2', '2020-01-17 19:39:26', '2020-01-17 19:39:26'),
(9, 'siomene', 'DEVRU9YK6hoRxUQx5rFT', 'samio@gmail.com', 'samio', 'samson', '2314574', 'No username', 'jNiy1VFykVwZgTbRzQR3', '2', '2020-01-17 23:02:17', '2020-01-17 23:02:17'),
(11, 'samson', 'bd6rU9aZxvWV2ObBB020', 'samio@gmail.com', 'samio', 'samson', '231457478', 'No username', 'YlX1HDYOave2LA3qpFAy', '2', '2020-01-17 23:09:39', '2020-01-17 23:09:39'),
(12, 'girlfriend', 'ykHnPaIZOxZ8Xk60XadF', 'girl@gmail.com', 'girl', 'friend', '252155455', '', 'jNiy1VFykVwZgTbRzQR3', '2', '2020-01-17 23:27:16', '2020-01-17 23:27:16'),
(13, 'ijele', 'qHUMmKW5r4qcJUUThs8s', 'ijele@gmail.com', 'ijele', 'okoye', '25471866', 'No username', 'jNiy1VFykVwZgTbRzQR3', '2', '2020-01-18 11:06:24', '2020-01-18 11:06:24'),
(16, 'Samsonsse', 'nDjdAaCQmQydzoq3UiCe', 'chuksdsilent@gmail.com', 'Oshaba', 'Samson', '081001412851', '', 'jNiy1VFykVwZgTbRzQR3', '2', '2020-01-21 12:57:03', '2020-01-21 12:57:03'),
(17, 'Samsonsw', 'tgXfs3jIyQwLUJ4AnHyv', 'chuksdsilent@gmail.com', 'Oshaba', 'Samson', '0810014128512', '', 'jNiy1VFykVwZgTbRzQR3', '2', '2020-01-21 13:00:56', '2020-01-21 13:00:56'),
(18, 'samchuks', 'tVsK8SvydtMQNNrRK1rW', 'chuksdsilent@gmail.com', 'Oshaba', 'Samson', '08100141289', '', 'jNiy1VFykVwZgTbRzQR3', '2', '2020-01-21 13:05:33', '2020-01-21 13:05:33'),
(19, 'osha', 'sY6vUdqr79etDJk9FrLE', 'oshakab@gmail.com', 'Oshaba', 'Samson', '08024574586', '', 'sL4Gure40T2D4T0svC4A', '1', '2020-01-21 13:18:08', '2020-01-21 13:18:08');

-- --------------------------------------------------------

--
-- Table structure for table `other_institution_topics`
--

CREATE TABLE `other_institution_topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'No Course id',
  `topic_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'No Topic id',
  `level` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'No Name',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `other_institution_topics`
--

INSERT INTO `other_institution_topics` (`id`, `course_id`, `topic_id`, `level`, `name`, `created_at`, `updated_at`) VALUES
(3, 'DgxYzS4FizB6JiBF6jdf', '0htZjW9Znftai5gXQWPl', 2, 'Homozones', '2020-01-16 01:03:50', '2020-01-16 01:03:50'),
(4, 'DgxYzS4FizB6JiBF6jdf', 'G93f8rC0eV5hyv3Bmz78', 2, 'Calizones32', '2020-01-16 01:03:50', '2020-01-16 08:29:38'),
(5, 'DgxYzS4FizB6JiBF6jdf', 'OhEjxjhjbY6KJzBpjtbw', 2, 'Johnazones', '2020-01-16 01:03:50', '2020-01-16 08:29:17'),
(6, 'DgxYzS4FizB6JiBF6jdf', '2F6cMKsIQzSGU2LrX1yS', 2, 'Mocafines', '2020-01-16 01:03:50', '2020-01-16 08:25:53'),
(7, 'DgxYzS4FizB6JiBF6jdf', '4LfrLwhePNzt0NAfsT0w', 2, 'Hofazines', '2020-01-16 01:03:50', '2020-01-16 08:26:58'),
(8, 'DgxYzS4FizB6JiBF6jdf', 'aW3iahzOiF6z2U26gY9l', 2, 'Homozones', '2020-01-16 01:06:08', '2020-01-16 01:06:08'),
(9, 'DgxYzS4FizB6JiBF6jdf', 'S3GpQUOyRSTEwscnRZsN', 2, 'Calizones', '2020-01-16 01:06:08', '2020-01-16 01:06:08'),
(10, 'DgxYzS4FizB6JiBF6jdf', 'EEvmSFtgKTKtTCQBjdnB', 2, 'Johnazones', '2020-01-16 01:06:08', '2020-01-16 01:06:08'),
(11, 'DgxYzS4FizB6JiBF6jdf', 'YpuQh85JecPQZvOE18re', 2, 'Modazines', '2020-01-16 01:06:08', '2020-01-16 01:06:08'),
(12, 'DgxYzS4FizB6JiBF6jdf', 'CV8YYYzKEjqoB2OWkIpG', 2, 'Hofazines', '2020-01-16 01:06:08', '2020-01-16 01:06:08'),
(13, '2CzpbrIexKEEgJ9WORBd', '63R8UAfpIZAeF7o9lrrC', 1, 'Dozans', '2020-01-16 01:07:34', '2020-01-16 01:07:34'),
(14, '2CzpbrIexKEEgJ9WORBd', 'mXyxwTnI9PB8nm0rfgfg', 1, 'Chokopoloy', '2020-01-16 01:07:34', '2020-01-16 01:07:34'),
(15, '2CzpbrIexKEEgJ9WORBd', 'ZXsIlI1ziyA0whCma4R4', 1, 'Madiapin', '2020-01-16 01:07:34', '2020-01-16 01:07:34'),
(16, '2CzpbrIexKEEgJ9WORBd', 'k5PTDlrA7Y300RLwdl7X', 1, 'chozokpoli', '2020-01-16 01:07:34', '2020-01-16 01:07:34'),
(17, 'y5MhYehHxZ2qQeZDvQen', 'UD1IvsGf7GzXWDjdoSc5', 0, 'Motines', '2020-01-16 08:31:54', '2020-01-16 08:31:54'),
(18, 'y5MhYehHxZ2qQeZDvQen', 'YUIqdo87CpWPY1SKdbNs', 0, 'Jotifines', '2020-01-16 08:31:55', '2020-01-16 08:31:55'),
(19, '9FFitLNObrHYCYNicPJk', 'x9fif9vmIyW1kQTiVjEN', 2, 'Obidience', '2020-01-16 10:38:28', '2020-01-16 10:38:28'),
(20, '9FFitLNObrHYCYNicPJk', 'YZak01rfSpay5AZ15k78', 2, 'Smartness', '2020-01-16 10:38:28', '2020-01-16 10:38:28'),
(21, '9FFitLNObrHYCYNicPJk', 'C0VnreDaEi04H5r74xjG', 2, 'Working Hard', '2020-01-16 10:38:28', '2020-01-16 10:38:28'),
(22, '2NeX9Vcn0F73b6o8Ky4G', 'hOlg1pC7VPsR3JWAxPVl', 1, 'Water', '2020-01-16 10:56:41', '2020-01-16 10:57:27'),
(23, '2NeX9Vcn0F73b6o8Ky4G', 'cvteACiotKN6FvMH86DN', 1, 'Mechanics', '2020-01-16 10:56:41', '2020-01-16 10:56:41'),
(24, '2NeX9Vcn0F73b6o8Ky4G', 'ptnQy7IyjWePyfqPoK2f', 1, 'Rolls', '2020-01-16 10:56:41', '2020-01-16 10:56:41');

-- --------------------------------------------------------

--
-- Table structure for table `other_institution_videos`
--

CREATE TABLE `other_institution_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `institution_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No ID',
  `instructor_email` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT 'No Email',
  `vid_id` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT 'No ID',
  `level` int(11) NOT NULL,
  `course_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No Course ID',
  `semester` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No Semester',
  `topic_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No Topic',
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No Title',
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_photo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No Cover Photo',
  `video_path` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No Video File',
  `publish` int(2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `other_institution_videos`
--

INSERT INTO `other_institution_videos` (`id`, `institution_id`, `instructor_email`, `vid_id`, `level`, `course_id`, `semester`, `topic_id`, `title`, `description`, `cover_photo`, `video_path`, `publish`, `created_at`, `updated_at`) VALUES
(1, 'YlX1HDYOav', 'instructor', 'b5qCzirewH', 2, '9FFitLNObrHYCYNicPJk', '1', 'YZak01rfSpay5AZ15k78', 'sdnfowefoio', 'ajdnfowf ief', 'videos/', 'videos/', 0, '2020-01-17 06:12:01', '2020-01-17 06:12:01'),
(2, 'YlX1HDYOav', 'instructor', '2E8yBMl3fs', 2, '9FFitLNObrHYCYNicPJk', '1', 'YZak01rfSpay5AZ15k78', 'When I come wait', 'ajdnfowf ief', 'C:\\xampp\\htdocs\\felken\\myapp\\storage\\/videos//2020_01_17_FIhQvIrEuggt1ODr1i3B.png', 'C:\\xampp\\htdocs\\felken\\myapp\\storage\\/videos//2020_01_17_TDaVNLmvoLF1ENHYPhLO.mp4', 0, '2020-01-17 06:14:16', '2020-01-17 06:14:16'),
(3, 'YlX1HDYOav', 'instructor', 'BuCyuDgTHo', 2, '9FFitLNObrHYCYNicPJk', '1', 'YZak01rfSpay5AZ15k78', 'sdnfowefoio', 'ajdnfowf ief', 'videos//2020_01_17_G7kv8Jd7uXRaEHcP606m.png', 'videos//2020_01_17_AHmf59ST7pu1yBILbQka.mp4', 0, '2020-01-17 06:17:54', '2020-01-17 06:17:54'),
(4, 'jNiy1VFykV', 'instructor', 'LU3JKDb50l', 2, 'DgxYzS4FizB6JiBF6jdf', '2', 'OhEjxjhjbY6KJzBpjtbw', 'sdnfowefoio', 'sdfwef', 'videos//2020_01_17_rEuwuxjafbrjQB6APAEM.png', 'videos//2020_01_17_R4NLOdgui7zTQlbWQCf1.mp4', 0, '2020-01-17 06:27:52', '2020-01-17 06:27:52'),
(5, 'O2WxiNt67J', 'instructor', 'JwoAh1b1lR', 1, '2NeX9Vcn0F73b6o8Ky4G', '1', 'cvteACiotKN6FvMH86DN', 'sdnfowefoio', 'sdfwef', 'videos//2020_01_17_zZOqH4LzKD8ozEt98gcm.png', 'videos//2020_01_17_Nf51Z1nFfwMMjQLgqCKj.mp4', 0, '2020-01-17 06:30:23', '2020-01-17 06:30:23'),
(6, 'sL4Gure40T', 'instructor', 'JZbddmuoSy', 1, '2CzpbrIexKEEgJ9WORBd', '2', 'mXyxwTnI9PB8nm0rfgfg', 'jaldjfoi', 'lsjdfoiwef', 'videos//2020_01_17_frjSmXmgUrq4iGvEh2fV.png', 'videos//2020_01_17_g9aGVM13n8gVKSJ2x7zf.mp4', 0, '2020-01-17 08:45:04', '2020-01-17 08:45:04'),
(7, 'O2WxiNt67J', 'instructor', 'WWgX3UwyHH', 1, '2NeX9Vcn0F73b6o8Ky4G', '2', 'hOlg1pC7VPsR3JWAxPVl', 'jaldjfoi', 'lsjdfoiwef', 'videos//2020_01_17_3wKxBuMS0rEByhqwtXBn.png', 'videos//2020_01_17_b8Sa64T6pY8yYkoKTHKy.mp4', 0, '2020-01-17 09:13:04', '2020-01-17 09:13:04'),
(8, 'O2WxiNt67J', 'instructor', 'cN160eojLP', 1, '2NeX9Vcn0F73b6o8Ky4G', '2', 'hOlg1pC7VPsR3JWAxPVl', 'bhgyuuyubu', 'hfctyvvytgh', 'videos//2020_01_17_rrThxGVVvHECCqA3LTPi.png', 'videos//2020_01_17_rf6qIiK0WXGWRDsyhPp2.mp4', 0, '2020-01-17 09:19:31', '2020-01-17 09:19:31'),
(9, 'O2WxiNt67J', 'instructor', 'aoEFSAhNae', 1, '2NeX9Vcn0F73b6o8Ky4G', '2', 'hOlg1pC7VPsR3JWAxPVl', 'bhgyuuyubu', 'hfctyvvytgh', 'videos//2020_01_17_qOEAO2mWSl4k8WijrGsM.png', 'videos//2020_01_17_J53rfKbQIYKMokEIaxdW.mp4', 0, '2020-01-17 09:19:44', '2020-01-17 09:19:44'),
(10, 'jNiy1VFykV', 'instructor', 'RpngpbFgOf', 2, 'DgxYzS4FizB6JiBF6jdf', '1', 'G93f8rC0eV5hyv3Bmz78', 'bhgyuuyubu', 'hfctyvvytgh', 'videos//2020_01_17_ZvZz42Ez7pj9XaL6lFoX.png', 'videos//2020_01_17_qSSNkXI2ENmhNUvbC9Mm.mp4', 0, '2020-01-17 09:27:16', '2020-01-17 09:27:16'),
(11, 'O2WxiNt67J', 'instructor', 'tIqPKOGtN5', 1, '2NeX9Vcn0F73b6o8Ky4G', '2', 'cvteACiotKN6FvMH86DN', 'purchasing new product', 'hfctyvvytgh', 'videos//2020_01_17_S33OUbEi3RSEbow1m2js.png', 'videos//2020_01_17_0kmXowI3nxOyn2BBRVlI.mp4', 0, '2020-01-17 09:29:08', '2020-01-17 09:29:08'),
(12, 'jNiy1VFykV', 'instructor', '8pdMsEJiYJ', 2, 'DgxYzS4FizB6JiBF6jdf', '1', 'aW3iahzOiF6z2U26gY9l', 'new product welcomed', 'hfctyvvytgh', 'videos//2020_01_17_hAbqm5rw6qoysoY8hQJm.png', 'videos//2020_01_17_Ci2kuK57j2PkNPZRvIDT.mp4', 0, '2020-01-17 09:30:16', '2020-01-17 09:30:16'),
(13, 'YlX1HDYOav', 'instructor', 'x4WwOcP49g', 2, '9FFitLNObrHYCYNicPJk', '1', 'YZak01rfSpay5AZ15k78', 'new product on the way', 'ksdlfkwjeiof jweifj iowefnlandfoiw ofw flkadfjaisdufhw ufw iuef', 'videos//2020_01_17_i2z0WqlAOrWTzkm3tgoP.png', 'videos//2020_01_17_gWZ64Iwd9w15MoxmYX4Q.mp4', 0, '2020-01-17 09:31:40', '2020-01-17 09:31:40'),
(14, 'sL4Gure40T', 'instructor', '5Xp372yTYp', 1, 'y5MhYehHxZ2qQeZDvQen', '2', 'UD1IvsGf7GzXWDjdoSc5', 'new product for you', 'jkdsuifweifu', 'videos//2020_01_17_rFCrZA2pW2SIiGzFGRAg.png', 'videos//2020_01_17_JDJqwwp6jus2daZ2cBse.mp4', 0, '2020-01-17 09:38:21', '2020-01-17 09:38:21'),
(15, 'jNiy1VFykV', 'instructor', 'c74xNonzho', 2, 'DgxYzS4FizB6JiBF6jdf', '1', 'aW3iahzOiF6z2U26gY9l', 'title', 'jsdlkfjweoif', 'videos//2020_01_17_pjCAh93VZIsLAyrW9zlp.png', 'videos//2020_01_17_RsgYnQ6jeEoU5Z9Xyka4.mp4', 0, '2020-01-17 09:43:02', '2020-01-17 09:43:02'),
(16, 'sL4Gure40T', 'instructor', 'mIyx9IsazC', 1, 'y5MhYehHxZ2qQeZDvQen', '1', 'YUIqdo87CpWPY1SKdbNs', 'original in container', 'lksdjfoiwef', 'videos//2020_01_17_gwRq60IPezmQ0U6rImOb.png', 'videos//2020_01_17_vMybzdgJn3VJM6nrrJv3.mp4', 0, '2020-01-17 09:51:37', '2020-01-17 09:51:37'),
(17, 'sL4Gure40T', 'instructor', 'mdyf2NBQEb', 1, 'y5MhYehHxZ2qQeZDvQen', '1', 'UD1IvsGf7GzXWDjdoSc5', 'water', 'jksdiufhwief', 'videos//2020_01_17_G1r7WyDeuKfaFQSbOqbc.jpg', 'videos//2020_01_17_C3lBwZfP6LbZF5Rkr0Dv.mp4', 0, '2020-01-17 09:58:35', '2020-01-17 09:58:35'),
(18, 'sL4Gure40T2D4T0svC4A', 'instructor', 'Qoc6nLeoeU', 1, 'y5MhYehHxZ2qQeZDvQen', '1', 'UD1IvsGf7GzXWDjdoSc5', 'New title for our web', 'Coming soon to have you. thanks', 'videos//2020_01_18_O7NulFBSFXICn2XIo6qK.jpg', 'videos//2020_01_18_WuJeReJVzDRq93dHd8A4.mp4', 0, '2020-01-18 12:39:20', '2020-01-18 12:39:20'),
(19, 'sL4Gure40T2D4T0svC4A', 'instructor', 'IQezXoD8Lr', 1, 'y5MhYehHxZ2qQeZDvQen', '1', 'UD1IvsGf7GzXWDjdoSc5', 'New Products from uuloh', 'No as if I am comign sha', 'videos//2020_01_18_Jfof7858ll8WXlY3Gl2P.png', 'videos//2020_01_18_pSx2Gaqn1Ug3oDRip9LT.mp4', 0, '2020-01-18 12:44:42', '2020-01-18 12:44:42'),
(20, 'O2WxiNt67JDJfyu67auS', 'instructor', 'JIS3vLWm41', 1, '2NeX9Vcn0F73b6o8Ky4G', '2', 'cvteACiotKN6FvMH86DN', 'Water in the bath', 'To show Us the way forward will make life better in this base. Thanks.', 'videos//2020_01_19_1y24midqk1JnpJL1KUhE.jpg', 'videos//2020_01_19_4swCuZID5eoBlWETVEbl.mp4', 0, '2020-01-19 05:47:49', '2020-01-19 05:47:49'),
(21, 'O2WxiNt67JDJfyu67auS', 'instructor', 'U817mLcuVK', 1, '2NeX9Vcn0F73b6o8Ky4G', '2', 'cvteACiotKN6FvMH86DN', 'Original', 'To show Us the way forward will make life better in this base. Thanks.', 'videos//2020_01_19_700vUiAAyUbLDI5XDVtY.jpg', 'videos//2020_01_19_ET8r6tlTztcQwJpzOsv6.mp4', 0, '2020-01-19 06:53:53', '2020-01-19 06:53:53');

-- --------------------------------------------------------

--
-- Table structure for table `other_institution_views_likes`
--

CREATE TABLE `other_institution_views_likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `thumbs_down` int(10) UNSIGNED DEFAULT NULL,
  `thumbs_up` int(10) UNSIGNED DEFAULT NULL,
  `views` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `vid_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `other_institution_views_likes`
--

INSERT INTO `other_institution_views_likes` (`id`, `thumbs_down`, `thumbs_up`, `views`, `user_email`, `vid_id`, `created_at`, `updated_at`) VALUES
(2, 0, 1, '1', 'b@b.b', 'IQezXoD8Lr', '2020-01-19 05:18:10', '2020-01-19 05:25:44'),
(3, 0, 1, '0', 'b@b.b', 'U817mLcuVK', '2020-01-19 06:56:00', '2020-01-19 06:56:19');

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
-- Table structure for table `secondary_schools`
--

CREATE TABLE `secondary_schools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No ID',
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No Name',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `secondary_schools`
--

INSERT INTO `secondary_schools` (`id`, `school_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'EJFUMdkb7gKbag0sodOf', 'sdfweffwef', '2019-11-16 05:55:18', '2019-11-16 05:55:18');

-- --------------------------------------------------------

--
-- Table structure for table `sec_students`
--

CREATE TABLE `sec_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `school_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `student_Class` int(11) NOT NULL,
  `profile_pics` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sec_students`
--

INSERT INTO `sec_students` (`id`, `user_id`, `username`, `email`, `phone`, `first_name`, `last_name`, `school_name`, `student_Class`, `profile_pics`, `created_at`, `updated_at`) VALUES
(1, 'p2GReG36bQyybApZWKLd', 'matter', 'oshab@gmail.com', '254758234', 'ohas', 'matter', 'sjdjhfwef', 5, '', '2020-01-17 21:34:55', '2020-01-17 21:34:55'),
(2, 'rKBHt0E3heXOphzlJrSp', 'sam', 'sims@gmail.com', '52474585', 'sima', 'sa', 'siam', 1, '', '2020-01-17 21:58:38', '2020-01-17 21:58:38'),
(3, 'a0DaBavs9HkvljSI9XFQ', 'sam', 'sims@gmail.com', '52474585', 'sima', 'sa', 'siam', 1, '', '2020-01-17 21:58:57', '2020-01-17 21:58:57'),
(4, 'Vpyhs9txodFOtWeGDN4Z', 'sam', 'sims@gmail.com', '52474585', 'sima', 'sa', 'siam', 1, '', '2020-01-17 22:00:18', '2020-01-17 22:00:18'),
(5, 'F8VsK4pXhCQHlmeZ3y4F', 'sasd', 'sims@gmail.com', '52474585', 'sima', 'sa', 'sima', 5, '', '2020-01-17 22:02:52', '2020-01-17 22:02:52'),
(6, 'FG5pIq3w8xZpRmuhjJAV', 'sasd', 'sims@gmail.com', '52474585', 'sima', 'sa', 'sima', 5, '', '2020-01-17 22:03:42', '2020-01-17 22:03:42'),
(7, '8TXApEcfQJxZNSVTKQ6x', 'sasd', 'sims@gmail.com', '52474585', 'sima', 'sa', 'sima', 5, '', '2020-01-17 22:04:24', '2020-01-17 22:04:24'),
(8, 'rHjUus1Z6yLq2xqiq1HH', 'sasd', 'sims@gmail.com', '52474585', 'sima', 'sa', 'sima', 5, '', '2020-01-17 22:05:35', '2020-01-17 22:05:35'),
(9, 'nvih3lnTvs5t8UfqhbrZ', 'sasd', 'sims@gmail.com', '52474585', 'sima', 'sa', 'sima', 5, '', '2020-01-17 22:06:14', '2020-01-17 22:06:14'),
(10, 'LxpPdjpUWNCthRVrhd3B', 'sam', 'sac@gmail.com', '123456', 'sac', 'some', 'sac school', 5, '', '2020-01-17 22:08:56', '2020-01-17 22:08:56'),
(11, 'Dq9rVkh202u6KTu2sB2T', 'monse', 'mon@gmail.com', '124563', 'mon', 'key', 'mon', 5, '', '2020-01-17 22:11:20', '2020-01-17 22:11:20'),
(12, '92dPwmQ0GXcqJIMV9tFD', 'bucket', 'geg@gmail.com', '25474585', 'greg', 'gig', 'bucket school', 5, '', '2020-01-17 22:16:13', '2020-01-17 22:16:13'),
(13, 'bafkO84onhRHjW6ec02V', 'somi', 'somi@gmail.com', '2475874', 'somi', 'somister', 'somi School', 5, '', '2020-01-17 22:19:57', '2020-01-17 22:19:57'),
(14, 'bbiqIvxRkiqQ15lVJwiq', 'showisa', 'somis@gmail.com', '547845', 'somise', 'itea', 'sdfe', 4, '', '2020-01-17 22:22:13', '2020-01-17 22:22:13'),
(15, 'SVV70QYLf1Ua73hc7Qhi', 'mykosb', 'myka@gmail.com', '54745854', 'myka', 'oshoba', 'samon', 5, '', '2020-01-17 22:24:14', '2020-01-17 22:24:14'),
(16, '1yAJDDkHJwsufXc8EAej', 'samify', 'ify@ify.coms', '447477777', 'ify', 'sam', 'my school', 4, '', '2020-01-17 23:24:35', '2020-01-17 23:24:35'),
(17, 'qtLfFjTrIccIeW6Salfz', 'c', 'c@c.c', '57455', 'c', 'c', 'Dozie', 1, 'profile_pics//2020_01_04_7f6ad72bf80a513d01c339cb8d79c422.png', '2020-01-18 18:44:43', '2020-01-20 17:11:17'),
(18, 'CCm1c4v3EnSpBlSHxrBM', 'same', 'oshakab@gmail.com', '08125475896', 'Oshaba', 'Samson', 'Oshabz School', 4, '', '2020-01-21 20:44:17', '2020-01-21 20:44:17'),
(19, '96Cm5RhpzarDqpmMmJ9y', 'oshabzse', 'd@d.d', '2145784563', 'skkdf', 'lsdmfoie', 'Oshabz School', 4, '', '2020-01-21 20:58:34', '2020-01-21 20:58:34'),
(22, 'QnESNb25I5Xi6EvVI6bG', 'samoooo', 'chuksdsilent@gmail.com', '08035478452', 'oshaba', 'samson', 'samson', 5, '', '2020-02-08 15:03:10', '2020-02-08 15:03:10'),
(23, '6rkJ3nVjEZjhplnXP1RJ', 'samoooo', 'chuksdsilent@gmail.com', '08035478452', 'oshaba', 'samson', 'samson', 5, '', '2020-02-08 15:03:29', '2020-02-08 15:03:29'),
(24, 'qa0n06lcHUBEtvqtoSvV', 'samoooo', 'chuksdsilent@gmail.com', '08035478452', 'oshaba', 'samson', 'samson', 5, '', '2020-02-08 15:04:40', '2020-02-08 15:04:40'),
(25, 'zhtIuwRTsJIrIhpm6VNp', 'samoooo', 'chuksdsilent@gmail.com', '08035478452', 'oshaba', 'samson', 'samson', 5, '', '2020-02-08 15:09:48', '2020-02-08 15:09:48'),
(26, 'XtWaViz3hvulf61IYa3E', 'samx', 'chuksdsilent@gmail.com', '0803254785', 'sam', 'chuks', 'sima', 3, '', '2020-02-08 15:18:20', '2020-02-08 15:18:20');

-- --------------------------------------------------------

--
-- Table structure for table `sec_topics`
--

CREATE TABLE `sec_topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `topic_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `topic_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sec_topics`
--

INSERT INTO `sec_topics` (`id`, `sub_id`, `topic_id`, `topic_name`, `created_at`, `updated_at`) VALUES
(1, 'rfnz6zS4MSN83L3IhOlP', 'Jq7pvbU2YxO3WUFErslq', 'Pronoun', '2020-01-18 19:43:04', '2020-01-18 19:59:26');

-- --------------------------------------------------------

--
-- Table structure for table `sec_videos`
--

CREATE TABLE `sec_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `instructor_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vid_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No ID',
  `class_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No ID',
  `subject_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No ID',
  `topic_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No ID',
  `description` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No ID',
  `coverPhoto` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No ID',
  `secVideos` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No ID',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `publish` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sec_videos`
--

INSERT INTO `sec_videos` (`id`, `instructor_email`, `vid_id`, `class_id`, `subject_id`, `topic_id`, `title`, `description`, `coverPhoto`, `secVideos`, `created_at`, `updated_at`, `publish`) VALUES
(1, 'instructor', 'MoDRdA56V3ZiITN13l4Z9AHs0e9t2r9GA2KoZnbqzMNSu4jwqj', '5', 'rfnz6zS4MSN83L3IhOlP', 'undefined', 'When is it happen', 'To show my honesty is found', 'videos/2020_01_18_Obg59PxbdDBS6wtyD7zg.png', 'videos/2020_01_18_qvuu3aOKjHLMhga8lzyW.mp4', '2020-01-18 20:27:53', '2020-01-18 20:27:53', 0),
(2, 'instructor', 'tH63TQj7VdgIn6Z6bo1qGmWdizeV5m2rPxM6dgRNtOTUqg81X9', '5', 'rfnz6zS4MSN83L3IhOlP', 'undefined', 'Rehab', 'Is like to show me rehab', 'videos/2020_01_18_kfKE9SZxrPfRAPXEBvk2.png', 'videos/2020_01_18_uEFloLHTqjBYMVTTEPTW.mp4', '2020-01-18 20:29:27', '2020-01-18 20:29:27', 0),
(3, 'instructor', 'qs2rBxozkj1SO9cXhnTuVlCK1BIAIaZ6ZIXEj4aXTYwWm8DPSP', '5', 'rfnz6zS4MSN83L3IhOlP', 'undefined', 'Learn to say good by', 'I yearn to say good bye', 'videos/2020_01_18_VmqNHwwix6l2skk2fw6y.png', 'videos/2020_01_18_AVtj2tbfh61qRILcaMtZ.mp4', '2020-01-18 20:41:37', '2020-01-18 20:41:37', 0),
(4, 'instructor', 'QyG0ZjJDPgKrjF7vrLh4Julh7GVh5ILrIo6W1OXuLdFFOdxIEG', '5', 'rfnz6zS4MSN83L3IhOlP', 'undefined', 'Learn to say good by', 'I yearn to say good bye', 'videos/2020_01_18_xGuA4JwXb6HVO7zWwrTM.png', 'videos/2020_01_18_pdAQEDtZUghDSxJVD9Pt.mp4', '2020-01-18 20:42:11', '2020-01-18 20:42:11', 1),
(5, 'instructor', 'UvCTjwnKpKxGfsrHyXjKRkDJXKWkdVP3NcnxnmSQpgjDNzfVDx', '5', 'rfnz6zS4MSN83L3IhOlP', 'undefined', 'lakdfoiwef', 'klsdmfioweof weio fiwoejfaoijefoi', 'videos/2020_01_18_t5L8UaHYMm2HmBKKTUQN.png', 'videos/2020_01_18_rxMJTrWbzZ122ZGfhFPd.mp4', '2020-01-18 20:45:59', '2020-01-18 20:45:59', 0),
(6, 'instructor', 'uXJVlnXktZVclwfsrPmVUWO8GW4VmiVCSLDnbIFIgvuBVdvMR1', '5', 'rfnz6zS4MSN83L3IhOlP', 'undefined', 'lakdfoiwef', 'klsdmfioweof weio fiwoejfaoijefoi', 'videos/2020_01_18_MDCErdXo0SaBAeriZBLK.png', 'videos/2020_01_18_MP5NW3kHRL2r49jBBz0l.mp4', '2020-01-18 20:46:37', '2020-01-18 20:46:37', 0),
(7, 'instructor', 'jL19PO5FZfhuKuYVw4Sm1jqA2R7oYDWYn2CBbtQyOwliFQYDf2', '5', 'rfnz6zS4MSN83L3IhOlP', 'undefined', 'lakdfoiwef', 'klsdmfioweof weio fiwoejfaoijefoi', 'videos/2020_01_18_SCH2EFK530mlFc8bTsH4.png', 'videos/2020_01_18_s4f84rJiWz6K4tdvNUGJ.mp4', '2020-01-18 20:49:12', '2020-01-18 20:49:12', 0),
(8, 'instructor', 'Vs2YuFBi7CAHdHXrXDTrusiWG8qO69Dut64gq1npkNK9p0hxkE', '5', 'rfnz6zS4MSN83L3IhOlP', 'undefined', 'lakdfoiwef', 'klsdmfioweof weio fiwoejfaoijefoi', 'videos/2020_01_18_f7BK2WbsOd0VnvT99c4p.png', 'videos/2020_01_18_8WlPwIBAknKNaFAMnHoj.mp4', '2020-01-18 20:50:24', '2020-01-18 20:50:24', 0),
(9, 'instructor', 'aop3x1CfIC7AVpVilRf8Eg84SdYDK43miCWDXfNfDcKhtHpDVQ', '5', 'rfnz6zS4MSN83L3IhOlP', 'undefined', 'lakdfoiwef', 'klsdmfioweof weio fiwoejfaoijefoi', 'videos/2020_01_18_PFpI6NJZNBoNDa4hijvq.png', 'videos/2020_01_18_JZ6figDb4YZyBnMTVkkA.mp4', '2020-01-18 20:51:39', '2020-01-18 20:51:39', 0),
(10, 'instructor', '4twdNp2IUYaYuiYKXq3godfkXG8TZ0hGHTFxO386TxBnL0VTI4', '4', 'rfnz6zS4MSN83L3IhOlP', 'undefined', 'lakdfoiwef', 'klsdmfioweof weio fiwoejfaoijefoi', 'videos/2020_01_18_TfdooKNiuUAkvfbRrtM6.png', 'videos/2020_01_18_b6rDSm0FI4kx1Pj9uAod.mp4', '2020-01-18 20:55:36', '2020-01-18 20:55:36', 0),
(11, 'instructor', 's3uerxC2WGgSXSBllk8h6b4HpzhCXNtJTEkKKIP0CmU6vzlStJ', '4', 'rfnz6zS4MSN83L3IhOlP', 'skdfjoiwe', 'lakdfoiwef', 'klsdmfioweof weio fiwoejfaoijefoi', 'videos/2020_01_18_4dScdnnQHq6FrChZdepD.png', 'videos/2020_01_18_fomlLlvxiK4od62WbaC6.mp4', '2020-01-18 20:56:53', '2020-01-18 20:56:53', 0),
(12, 'instructor', 'pFvZrffNo1rNNQy8Rk0DRICjRJXDzu58auNwpza6mOlqzGBwfd', '4', 'rfnz6zS4MSN83L3IhOlP', 'skdfjoiwe', 'lakdfoiwef', 'klsdmfioweof weio fiwoejfaoijefoi', 'videos/2020_01_18_iplgyJEbVNR4ZMGQDd17.png', 'videos/2020_01_18_Sr7Cvqybi1h7WAzLcXaU.mp4', '2020-01-18 20:58:20', '2020-01-18 20:58:20', 0),
(13, 'instructor', 'WbENpQGdb64ZGqUgcFLjgQcPvwepIYzlJXdEKvSiiZJBVaASYq', '4', 'rfnz6zS4MSN83L3IhOlP', 'Jq7pvbU2YxO3WUFErslq', 'lakdfoiwef', 'klsdmfioweof weio fiwoejfaoijefoi', 'videos/2020_01_18_RC0e5NVXZzxLsnZBoSz4.png', 'videos/2020_01_18_z0QAYQK3ORvB2ZIMWDpZ.mp4', '2020-01-18 20:58:42', '2020-01-18 20:58:42', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sec_video_views_likes`
--

CREATE TABLE `sec_video_views_likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `thumbs_down` int(10) UNSIGNED DEFAULT NULL,
  `thumbs_up` int(10) UNSIGNED DEFAULT NULL,
  `views` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `vid_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sec_video_views_likes`
--

INSERT INTO `sec_video_views_likes` (`id`, `thumbs_down`, `thumbs_up`, `views`, `user_email`, `vid_id`, `created_at`, `updated_at`) VALUES
(1, 0, 1, '0', 'student', 'EQh1JzdO1KP2uhTG9IXuZhyZQZKrkOafoHwTk3Z2xx03Mmc3aL', '2020-01-07 19:37:40', '2020-01-07 19:41:33'),
(2, 0, 1, '0', 'c@c.c', 'QyG0ZjJDPgKrjF7vrLh4Julh7GVh5ILrIo6W1OXuLdFFOdxIEG', '2020-01-18 22:33:33', '2020-01-19 07:41:16');

-- --------------------------------------------------------

--
-- Table structure for table `sec_video_views_thumbsup`
--

CREATE TABLE `sec_video_views_thumbsup` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Abia State', '2020-02-08 17:20:26', '2020-02-08 17:20:26'),
(2, 'Adamawa State', '2020-02-08 17:20:26', '2020-02-08 17:20:26'),
(3, 'Akwa Ibom State', '2020-02-08 17:20:26', '2020-02-08 17:20:26'),
(4, 'Anambra State', '2020-02-08 17:20:26', '2020-02-08 17:20:26'),
(5, 'Bauchi State', '2020-02-08 17:20:26', '2020-02-08 17:20:26'),
(6, 'Bayelsa State', '2020-02-08 17:20:26', '2020-02-08 17:20:26'),
(7, 'Benue State', '2020-02-08 17:20:26', '2020-02-08 17:20:26'),
(8, 'Borno State', '2020-02-08 17:20:26', '2020-02-08 17:20:26'),
(9, 'Cross River State', '2020-02-08 17:20:26', '2020-02-08 17:20:26'),
(10, 'Delta State', '2020-02-08 17:20:26', '2020-02-08 17:20:26'),
(11, 'Ebonyi State', '2020-02-08 17:20:26', '2020-02-08 17:20:26'),
(12, 'Edo State', '2020-02-08 17:20:26', '2020-02-08 17:20:26'),
(13, 'Ekiti State', '2020-02-08 17:20:26', '2020-02-08 17:20:26'),
(14, 'Enugu State', '2020-02-08 17:20:26', '2020-02-08 17:20:26'),
(15, 'FCT', '2020-02-08 17:20:26', '2020-02-08 17:20:26'),
(16, 'Gombe State', '2020-02-08 17:20:26', '2020-02-08 17:20:26'),
(17, 'Imo State', '2020-02-08 17:20:26', '2020-02-08 17:20:26'),
(18, 'Jigawa State', '2020-02-08 17:20:26', '2020-02-08 17:20:26'),
(19, 'Kaduna State', '2020-02-08 17:20:26', '2020-02-08 17:20:26'),
(20, 'Kano State', '2020-02-08 17:20:26', '2020-02-08 17:20:26'),
(21, 'Katsina State', '2020-02-08 17:20:26', '2020-02-08 17:20:26'),
(22, 'Kebbi State', '2020-02-08 17:20:26', '2020-02-08 17:20:26'),
(23, 'Kogi State', '2020-02-08 17:20:26', '2020-02-08 17:20:26'),
(24, 'Kwara State', '2020-02-08 17:20:26', '2020-02-08 17:20:26'),
(25, 'Lagos State', '2020-02-08 17:20:26', '2020-02-08 17:20:26'),
(26, 'Nasarawa State', '2020-02-08 17:20:26', '2020-02-08 17:20:26'),
(27, 'Niger State', '2020-02-08 17:20:26', '2020-02-08 17:20:26'),
(28, 'Ogun State', '2020-02-08 17:20:26', '2020-02-08 17:20:26'),
(29, 'Ondo State', '2020-02-08 17:20:26', '2020-02-08 17:20:26'),
(30, 'Osun State', '2020-02-08 17:20:26', '2020-02-08 17:20:26'),
(31, 'Oyo State', '2020-02-08 17:20:26', '2020-02-08 17:20:26'),
(32, 'Plateau State', '2020-02-08 17:20:26', '2020-02-08 17:20:26'),
(33, 'Rivers State', '2020-02-08 17:20:26', '2020-02-08 17:20:26'),
(34, 'Sokoto State', '2020-02-08 17:20:26', '2020-02-08 17:20:26'),
(35, 'Taraba State', '2020-02-08 17:20:26', '2020-02-08 17:20:26'),
(36, 'Yobe State', '2020-02-08 17:20:26', '2020-02-08 17:20:26'),
(37, 'Zamfara State', '2020-02-08 17:20:26', '2020-02-08 17:20:26');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No ID',
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `university` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No University',
  `faculty` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No Faculty',
  `department` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `level` int(1) NOT NULL,
  `profile_pics` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `username`, `email`, `phone`, `first_name`, `last_name`, `university`, `faculty`, `department`, `level`, `profile_pics`, `created_at`, `updated_at`) VALUES
(3, 'h5VhuOEjFRxt6GiCISZS', 'okofo', 'sam@gmail.com', '5474585985', 'Nwaokoy', 'okoro', 'ZmNMZD7BekqVFY5OD2Yb', 'FJMbLP8zsvakTKpaLNDZ', 'XBmUV0RUWD6BeP92Kg7Y', 2, '', '2020-01-17 20:45:14', '2020-01-17 20:45:14'),
(4, 'F1HHNL0KTHI23z3Uqwve', 'minka', 'viba@gmail.com', '2577458', 'myway', 'shoe', 'ZmNMZD7BekqVFY5OD2Yb', 'FJMbLP8zsvakTKpaLNDZ', 'p7yfg2XzlF9F2COHhSng', 2, '', '2020-01-17 22:26:50', '2020-01-17 22:26:50'),
(5, 'KmaY8T1f5v8zM8YcAbdC', 'shoe', 'viba@gmail.com', '257745823', 'myway', 'shoe', 'ZmNMZD7BekqVFY5OD2Yb', 'FJMbLP8zsvakTKpaLNDZ', 'p7yfg2XzlF9F2COHhSng', 2, '', '2020-01-17 22:39:58', '2020-01-17 22:39:58'),
(6, 'ykDkbhEHkJQH48HesPXw', 'shoesd', 'viba@gmail.com', '25774582332', 'myway', 'shoe', 'ZmNMZD7BekqVFY5OD2Yb', 'FJMbLP8zsvakTKpaLNDZ', 'XBmUV0RUWD6BeP92Kg7Y', 2, '', '2020-01-17 22:48:30', '2020-01-17 22:48:30'),
(7, 'DsVUTnpTV47WZsyCjaKt', 'shoes', 'viba@gmail.com', '257745823323', 'myway', 'shoe', 'ZmNMZD7BekqVFY5OD2Yb', 'FJMbLP8zsvakTKpaLNDZ', 'XBmUV0RUWD6BeP92Kg7Y', 2, '', '2020-01-17 22:53:55', '2020-01-17 22:53:55'),
(8, '3pN1NYx1V0mhuVJs1AXn', 'shoe', 'viba@gmail.com', '25774582332231', 'myway', 'shoe', 'ZmNMZD7BekqVFY5OD2Yb', 'FJMbLP8zsvakTKpaLNDZ', 'XBmUV0RUWD6BeP92Kg7Y', 2, '', '2020-01-17 22:59:15', '2020-01-17 22:59:15'),
(9, 'XUwWZ49j7yLvUdoho2RZ', 'shoe', 'viba@gmail.com', '3325774582332231', 'myway', 'shoe', 'ZmNMZD7BekqVFY5OD2Yb', 'FJMbLP8zsvakTKpaLNDZ', 'XBmUV0RUWD6BeP92Kg7Y', 2, '', '2020-01-17 23:00:30', '2020-01-17 23:00:30'),
(10, 'VcqG0pH9ogc9SM7peWNb', 'mojon', 'mola@gmail.com', '5478755', 'mola', 'john', 'ZmNMZD7BekqVFY5OD2Yb', 'FJMbLP8zsvakTKpaLNDZ', 'p7yfg2XzlF9F2COHhSng', 2, '', '2020-01-17 23:26:09', '2020-01-17 23:26:09'),
(11, 'jCAE8TTcbXDleX95v5r8', 'a', 'a@a.a', '25474585', 'a', 'a', 'wEhmDj930JrNu83h3y2N', 'RFqOqO16F76AwekEJ24z', 'TPK9anB8BViPN9lGGsYf', 5, 'profile_pics//2020_01_04_0326e0485931de25e8864b629b75f1fd.png', '2020-01-18 11:30:58', '2020-01-20 18:28:23'),
(12, '3jNGcx5wu8Gn7lEyuXYi', 'money', 'oshakab@gmail.com', '08032547845', 'Oshaba', 'Samson', 'wEhmDj930JrNu83h3y2N', 'RFqOqO16F76AwekEJ24z', 'TPK9anB8BViPN9lGGsYf', 3, '', '2020-01-21 14:34:54', '2020-01-21 14:34:54');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `sub_id`, `name`, `created_at`, `updated_at`) VALUES
(8, 'NCELsQxpP2FP1GUd1cdq', 'MATHEMATIC', '2019-11-16 05:52:09', '2020-01-18 19:09:04'),
(9, 'rfnz6zS4MSN83L3IhOlP', 'ENGLISH', '2019-11-16 05:52:17', '2019-11-16 05:52:17'),
(10, 'qZEEqiQfVbMrCtcLEevo', 'BIOLOGY', '2019-11-16 05:52:26', '2019-11-16 05:52:26'),
(11, 'zwP1CTYLJmfUpNdpLJTe', 'AGRIC SCIENCE', '2019-11-16 05:52:47', '2019-11-16 05:52:47');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `instructor_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `student_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uni_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `fac_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `dept_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `course_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `topic_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `uni_id`, `fac_id`, `dept_id`, `course_id`, `topic_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'text', 'text', 'text', 'HHtBdpRf3IjMFlK2dPux', 'yZl4fa4Y7ks8aaKzIuw4B', 'my topics', NULL, NULL),
(2, 'ZmNMZD7BekqVFY5OD2Yb', 'FJMbLP8zsvakTKpaLNDZ', 'XBmUV0RUWD6BeP92Kg7Y', 'HHtBdpRf3IjMFlK2dPux', 'J8WzOxpwruuWirAyifHe', 'sdfwef', '2019-12-16 21:12:58', '2019-12-16 21:12:58'),
(3, 'ZmNMZD7BekqVFY5OD2Yb', 'FJMbLP8zsvakTKpaLNDZ', 'XBmUV0RUWD6BeP92Kg7Y', 'yZl4fa4Y7KIaaKzIuw4B', 'C03y3eoo7R81OoG0RCRZ', 'dfgerg', '2019-12-16 21:17:32', '2019-12-16 21:17:32'),
(4, 'ZmNMZD7BekqVFY5OD2Yb', 'FJMbLP8zsvakTKpaLNDZ', 'XBmUV0RUWD6BeP92Kg7Y', 'HHtBdpRf3IjMFlK2dPux', 'GXP604cQvZIdPxZn0TTC', 'dfwefaf', '2019-12-16 21:24:12', '2019-12-16 21:24:12'),
(5, 'ZmNMZD7BekqVFY5OD2Yb', 'FJMbLP8zsvakTKpaLNDZ', 'p7yfg2XzlF9F2COHhSng', 'HHtBdpRf3IjMFlK2dPux', 'ebaBF7MuLIkTh8YmXT8j', 'New Topic for test', '2019-12-18 12:58:59', '2019-12-18 12:58:59'),
(12, 'wEhmDj930JrNu83h3y2N', 'nhqPUboyiFJXtGwkxBfK', 'kJnUeyqh6ZkgecDDYiec', 'yl9Yjad3RR2IyJg8hIHV', 'YExrhTbxn9jJJjjSmW5Q', 'Homozones', '2020-01-14 14:28:59', '2020-01-14 14:28:59'),
(13, 'wEhmDj930JrNu83h3y2N', 'nhqPUboyiFJXtGwkxBfK', 'kJnUeyqh6ZkgecDDYiec', 'yl9Yjad3RR2IyJg8hIHV', 'GMK5eWhKxUlVIih8dNiM', 'Calizones', '2020-01-14 14:28:59', '2020-01-14 14:28:59'),
(14, 'wEhmDj930JrNu83h3y2N', 'nhqPUboyiFJXtGwkxBfK', 'kJnUeyqh6ZkgecDDYiec', 'yl9Yjad3RR2IyJg8hIHV', 'xgyPStipZdg5vZG36LzE', 'Johnazones', '2020-01-14 14:28:59', '2020-01-14 14:28:59'),
(15, 'wEhmDj930JrNu83h3y2N', 'nhqPUboyiFJXtGwkxBfK', 'kJnUeyqh6ZkgecDDYiec', 'Io88r71P7AnqNGeeZXss', 'mOxrcgAZe83rcOVVlwev', 'Homozones', '2020-01-14 14:30:04', '2020-01-14 14:30:04'),
(16, 'wEhmDj930JrNu83h3y2N', 'nhqPUboyiFJXtGwkxBfK', 'kJnUeyqh6ZkgecDDYiec', 'Io88r71P7AnqNGeeZXss', 'xN1u3Wz63GF1LazNdbtV', 'Calizones', '2020-01-14 14:30:04', '2020-01-14 14:30:04'),
(17, 'wEhmDj930JrNu83h3y2N', 'nhqPUboyiFJXtGwkxBfK', 'kJnUeyqh6ZkgecDDYiec', 'Io88r71P7AnqNGeeZXss', 'HwuPIRnO7RV4oe5AZStc', 'Johnazones', '2020-01-14 14:30:04', '2020-01-14 14:30:04'),
(18, 'wEhmDj930JrNu83h3y2N', 'nhqPUboyiFJXtGwkxBfK', 'kJnUeyqh6ZkgecDDYiec', 'Io88r71P7AnqNGeeZXss', 'O7a9La3VGbZYCgG1xfls', 'Modazines', '2020-01-14 14:30:04', '2020-01-14 14:30:04'),
(19, 'wEhmDj930JrNu83h3y2N', 'nhqPUboyiFJXtGwkxBfK', 'kJnUeyqh6ZkgecDDYiec', 'Io88r71P7AnqNGeeZXss', 'eRWxL5oce9ptjGBtHskF', 'Hofazines', '2020-01-14 14:30:04', '2020-01-14 14:30:04'),
(20, 'wEhmDj930JrNu83h3y2N', 'nhqPUboyiFJXtGwkxBfK', 'kJnUeyqh6ZkgecDDYiec', 'S7L1egg22QoSJZ9iWlXH', 'VLgflyneaio4l3cKtOI6', 'contikos', '2020-01-14 15:03:21', '2020-01-14 15:03:21'),
(21, 'wEhmDj930JrNu83h3y2N', 'nhqPUboyiFJXtGwkxBfK', 'kJnUeyqh6ZkgecDDYiec', 'S7L1egg22QoSJZ9iWlXH', '3pgzWy2ttsetx1qNp8jP', 'Equators', '2020-01-14 15:03:21', '2020-01-14 15:03:21'),
(22, 'wEhmDj930JrNu83h3y2N', 'RFqOqO16F76AwekEJ24z', 'TPK9anB8BViPN9lGGsYf', 'jwwOgTUqkuOfPwxXB0fp', 'mkHjM2K8XvrCJxxpIMWi', 'Pipe Connection', '2020-01-16 10:31:41', '2020-01-16 10:31:41'),
(23, 'wEhmDj930JrNu83h3y2N', 'RFqOqO16F76AwekEJ24z', 'TPK9anB8BViPN9lGGsYf', 'jwwOgTUqkuOfPwxXB0fp', 'ej1EM03W9JxdN93vUjrf', 'Water Waves', '2020-01-16 10:31:41', '2020-01-16 10:31:41');

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE `universities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uni_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No ID',
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No Name',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`id`, `uni_id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'iYJxXPGYemgxzrZ6f38H', 'NNAMDI', '2019-11-14 05:34:24', '2020-01-15 22:20:12'),
(8, 'ZmNMZD7BekqVFY5OD2Yb', 'UNIJOS', '2019-11-14 21:27:13', '2019-11-16 20:07:33'),
(9, '8EKA7soQQgXT23z7ez4B', 'FUTO', '2019-11-14 21:27:36', '2019-11-16 20:14:01'),
(10, 'aQ6WWD2UX55VVlbkpdX8', 'FUTA', '2019-11-14 21:29:01', '2019-11-14 21:29:01'),
(11, 'ZOzYdjXNXibT0DtH9WrG', 'ANSU', '2019-11-14 21:29:42', '2019-11-14 21:29:42'),
(12, 'vvk7y8EHPm', 'Lemke PLC', '2019-11-23 09:16:22', '2019-11-23 09:16:22'),
(13, '8sB8aDc6qZ', 'Torphy LLC', '2019-11-23 09:16:22', '2019-11-23 09:16:22'),
(14, 'nOd3qKShOz', 'Homenick Group', '2019-11-23 09:16:22', '2019-11-23 09:16:22'),
(15, 'ujfrQJTNdc', 'Gibson, Harris and Cartwright', '2019-11-23 09:16:22', '2019-11-23 09:16:22'),
(16, '5DBtLzI5iC', 'Wehner-Littel', '2019-11-23 09:16:22', '2019-11-23 09:16:22'),
(17, 'jkFG9dsYwtPo96e6fqTx', 'UNIPORT', '2019-12-10 12:39:08', '2019-12-10 12:39:08'),
(18, 'wEhmDj930JrNu83h3y2N', 'UNN', '2020-01-14 09:47:30', '2020-01-14 09:47:30'),
(19, 'hkN5Xb8Xz9TKtzwTn1aQ', 'UNN', '2020-01-14 09:47:53', '2020-01-14 09:47:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blocked` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT 'N',
  `profile_updated` int(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institution` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `title`, `username`, `email`, `token`, `email_verified_at`, `password`, `role`, `blocked`, `profile_updated`, `remember_token`, `institution`, `created_at`, `updated_at`) VALUES
(12, 'dxqMQiYq3N00oUupsnmw', '', 'ify1', 'instructor', 'pe8BrmvYdkvyS2N66lHPmGgQyjpcj7gS6T24V7JAhrDshLSI22vEuwPWuDpS', NULL, '$2y$10$KO/CcjXOqLVsUzpCkezoxeACQspZbZXbOCo/0kslj8v.YPcWBlVw2', 'I', 'N', 1, NULL, '', '2019-11-20 04:01:49', '2020-03-26 08:20:40'),
(13, 'BTpAuDKD28dcLdmqWdqm', '', 'seac', 'student2', 'l2j5f6vPbgVAc2g3EmAVpYikJi9eVgHIXKWuzTvOOmVFBATy7ThCVJGxpy3R', '2020-01-21 20:57:57', '$2y$10$oiL3Ow6DyyJt447ujO/mpuldGUUaVvv/ALS4xbkKmuRuL.cRhVqGG', 'S', 'N', 1, NULL, 'uni', '2019-12-10 11:08:08', '2020-01-18 11:28:11'),
(66, '90qv4XyNJXneH9wNYkPg', '', 'JPTGF3yUDH6iFu62lMDk', 'lsdfi@kljid.kckj', NULL, NULL, '$2y$10$O0rFRG5Ql/HzbGMoWOx7RO/1JScfRsVT2615p/V3P3/igVzom/4fG', 'S', 'N', 0, NULL, 'uni', '2020-01-17 13:12:53', '2020-01-17 13:12:53'),
(67, 'pVceBL3QfEYdAV0e605C', '', 'ZOJlCkhxLzgXadakeC7I', 'lsdfi@kljid.kck', NULL, NULL, '$2y$10$Nlw5wk/jw0urEbHCRVCoi.zBr8xEL09S55fqEL3bY6Nlr4AwvLFky', NULL, 'N', 0, NULL, '', '2020-01-17 13:13:27', '2020-01-17 13:13:27'),
(68, 'w2saZ7S5FQBJPCnM4FWw', '', 'c18aULt1MHkZqdYwXHYd', 'lsdfi@kljid.kckjj', NULL, NULL, '$2y$10$9KV2gpw3PxZn/p1HF80EL.BZ8bCmlTbSodqKhNwQ6/Bx.P6Ps0m4C', NULL, 'N', 0, NULL, '', '2020-01-17 13:13:57', '2020-01-17 13:13:57'),
(79, '$2y$10$XY6kqDiEjlhRYjn44z1lRu1SmEKrWuAG28MJpJD3Sf5h11zUZqrte', '', 'okofo', 'sam@gmail.com', NULL, NULL, '', NULL, 'N', 0, NULL, '', '2020-01-17 20:45:14', '2020-01-17 20:45:14'),
(88, '9uPa3GX7RMhMJ5xN4wBk', '', 'sasd', 'sims@gmail.com', NULL, NULL, '', 'S', 'N', 0, NULL, '', '2020-01-17 22:06:14', '2020-01-17 22:06:14'),
(89, 'HCnuRnoP0OVUWU24nehc', '', 'sam', 'sac@gmail.com', NULL, NULL, '', 'S', 'N', 0, NULL, '', '2020-01-17 22:08:56', '2020-01-17 22:08:56'),
(90, 'VUFTi39SpMQjNotP7BGU', '', 'monse', 'mon@gmail.com', NULL, NULL, '$2y$10$yKoC1dy6KJCWkZoKhsZO9eGt3nM7M3J8Rb3HNe0WeTl2U4q9nIWKi', 'S', 'N', 0, NULL, '', '2020-01-17 22:11:20', '2020-01-17 22:11:20'),
(91, 'piCxKutb2ByOI7ACj9yv', '', 'bucket', 'geg@gmail.com', 'huImsxqyP1rqcsAcE48NSwcXzJHaq5APOSDeOzRIZZeOtF9gTHaSjss5tozj', NULL, '$2y$10$xt02.D4FxFvdTlPGwnLIx.0DI3ix0hb.ngqrVG.0o04KddkH0VFEO', 'S', 'N', 0, NULL, '', '2020-01-17 22:16:13', '2020-01-17 22:16:54'),
(92, 'KiL8ha2WMSadmLotTbmB', '', 'somi', 'somi@gmail.com', 'Z1jvxRFppLXODmcFehEtmWNlbILeuh2oQg48itlVTvItrkVoqwoc4m3VlIWh', NULL, '$2y$10$tWbcvFNEhzSsyeVyt5hLBeHbGTLGwd6e8jUYO6jAgTwjUeutwbj2e', 'S', 'N', 0, NULL, '', '2020-01-17 22:19:57', '2020-01-17 22:20:47'),
(103, 'WoDfF0Seuu33nIguT9GD', '', 'shoe', 'viba@gmail.com', NULL, NULL, '$2y$10$biVdc0yz5LoL405Xz5knMe4.p8FP/C87WL9oRt3xohUNBI7vrEM6.', 'S', 'N', 0, NULL, '', '2020-01-17 23:00:30', '2020-01-17 23:00:30'),
(107, 'bd6rU9aZxvWV2ObBB020', '', 'samson', 'samio@gmail.com', NULL, NULL, '$2y$10$fKbTP7GDoSnJLgWnRRmJpuy0LW6CB66srCe4WNZsv5HTWC6P90Dey', 'S', 'N', 0, NULL, '', '2020-01-17 23:09:39', '2020-01-17 23:09:39'),
(108, 'AF7u9o2AgRdzd1YjRRhM', '', 'samify', 'ify@ify.coms', NULL, NULL, '$2y$10$dgUj4Ks19kHtc45CddbNK.kxfxpnIuM1w5v1vrBNc0pTpNLMeJqMS', 'S', 'N', 0, NULL, 'sec', '2020-01-17 23:24:34', '2020-01-17 23:24:34'),
(109, 'mnheYMCpfrI8dtT4KAod', '', 'mojon', 'student', 'Nj0BlBpbyKu238TI1nd2PCAgV7Z8FvAsFLAsesjHPI2xnhYaOChDE9r6i1qq', NULL, '$2y$10$UXWRfVlYPzwgxrWTm30KJuFAA8l4JTASjmn4cIC7TdYHfgOu98k0m', 'S', 'N', 0, NULL, 'uni', '2020-01-17 23:26:09', '2020-03-25 08:29:29'),
(110, 'ykHnPaIZOxZ8Xk60XadF', '', 'girlfriend', 'girl@gmail.com', NULL, NULL, '$2y$10$MX13UguYwKQjdf.04qB9DuEk3I/.lzCRC/HLV6rS3aE6LhPgBfIOi', 'S', 'N', 0, NULL, 'others', '2020-01-17 23:27:16', '2020-01-17 23:27:16'),
(111, 'qHUMmKW5r4qcJUUThs8s', '', 'ijel', 'admin', 'KVz6RN2SSK8vR2Cd32KpZmUxvffnAjCpBxvxvexCCiLHOChNDP6TZUrnqLIm', NULL, '$2y$10$Ca9XP0iPF3Qo2B22g7q40uS8aQ1EJnssjffG0Prwu/qjZ877.sJxS', 'A', 'N', 0, NULL, 'others', '2020-01-18 11:06:24', '2020-03-11 10:46:39'),
(112, '2W1PoJeOJDcUq7NH7he1', '', 'a', 'a@a.a', 'bmKw02fiPyGcj8YTIYkp14tU7tV1s8gRui9ZhO4PwinrmZN3QqlvnyNTnQbC', '2020-01-21 20:57:57', '$2y$10$pzd9MgLfmM5WOpOCHVQNGe9s2WoTi/brHpGYdksz64gI5GJmm5kEq', 'S', 'N', 1, NULL, 'uni', '2020-01-18 11:30:58', '2020-01-22 10:36:30'),
(113, 'xKG7jbhWFj34YhaxQ2Xo', '', 'b', 'b@b.b', 'JQuZLWGUw4b4lAT1f3MJBiYKbhzaAmezxQlsmJZ9PnpyaAws6f4Iybl03bbs', '2020-01-21 20:57:57', '$2y$10$pnXJ5bYA4V8WaNzseaDQneieqhs8OMHILO6nfd7WlOFL5sBn/BEWq', 'S', 'N', 1, NULL, 'others', '2020-01-18 12:40:27', '2020-01-21 06:41:24'),
(114, 'VREBx7gD7g2cX2BEIlwV', '', 'c', 'c@c.c', 'XIbq2HDnbFFq0puAuJgPOiBtuKF04wGuxYViqPZom6rpECec4g5P8jSyl2PW', '2020-01-21 20:57:57', '$2y$10$sfLyvz26jC4SsftGUN.mw.DoNismlBfdEMSQWXiUvi3VgdwnmNGK.', 'S', 'N', 1, NULL, 'sec', '2020-01-18 18:44:43', '2020-01-20 16:39:47'),
(126, 'nalxBaEQu4tRkc2gE0Vo', '', 'oshabzse', 'd@d.d', 'LEyInPEymRvi3JcdQcJNG5cV2PyaPEl4gDyGHZ9AYFjlxKhO5Vy2ashSpma9', '2020-01-21 20:57:57', '$2y$10$nBQ4iKttZK91i9Q8vtPr3.UAYThUd7gJefnW6EPWa8758uxjGZlA2', 'S', 'N', 0, NULL, 'sec', '2020-01-21 20:57:26', '2020-01-21 22:40:52'),
(151, '', '', NULL, 'chuksdsilent@gmail.com', 'AEQDjlwKV3Oy8cUto3a7dJ2ldauBXaHBpThrjvetVf0iJwCK0nV06DKuFB77', '2020-03-05 01:23:17', '$2y$10$CEaXB.jjqP/HC0Z74qjFs.fRTUklOUUxbIx0yhavDvD6cPpIMLah6', 'S', 'N', 0, NULL, 'uni', '2020-03-05 01:23:17', '2020-03-22 09:55:53'),
(152, '', '', NULL, 'sam@gmailx.om', 'dhuRXkmXMm5EoMlJkzPiWyLvmsliCsnbe9E4P7pxTijciXk2RJU2W5iM8NSi', NULL, '$2y$10$GJb2CQ722ALb3.oYu9.x.e13jxk7zFUBV3PWc5GbVSpxC9uq0IlsK', 'I', 'N', 0, NULL, '', '2020-03-31 08:07:29', '2020-03-31 12:04:38');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uni_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No Uni ID',
  `instructor_email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No User ID',
  `fac_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No Faculty ID',
  `dept_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No Department ID',
  `course_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No Course ID',
  `topic_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No Level',
  `semester` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No semester',
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No Title',
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vid_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No Vid ID',
  `vid_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'No Vid Path',
  `course_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish` int(1) DEFAULT 0,
  `cover_photo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `uni_id`, `instructor_email`, `fac_id`, `dept_id`, `course_id`, `topic_id`, `level`, `semester`, `title`, `description`, `vid_id`, `vid_path`, `course_code`, `publish`, `cover_photo`, `created_at`, `updated_at`) VALUES
(1, 'wEhmDj930JrNu83h3y2N', 'instructor', 'RFqOqO16F76AwekEJ24z', 'TPK9anB8BViPN9lGGsYf', 'jwwOgTUqkuOfPwxXB0fp', 'mkHjM2K8XvrCJxxpIMWi', '2', '1', 'Pipe generation', 'Dure to insurgence in our community. I will relay to your later', 'KOmyjsPU41XY1LRPtoiFMaJSglnmB0MYTyDkix6urvhPDUeC6p', 'videos/2020_01_18_aMdRH8w3ex2KuU4pmNwF.mp4', '', 1, 'videos/2020_01_18_FfWKL2e9JGFmDmJ87zCa.png', '2020-01-18 12:31:01', '2020-01-18 12:31:01'),
(2, 'No Uni ID', 'No User ID', 'No Faculty ID', 'No Department ID', 'No Course ID', '', 'No Level', 'No semester', 'When I come wait', NULL, 'No Vid ID', 'No Vid Path', '', 0, NULL, NULL, NULL),
(3, 'wEhmDj930JrNu83h3y2N', 'instructor', 'RFqOqO16F76AwekEJ24z', 'TPK9anB8BViPN9lGGsYf', 'jwwOgTUqkuOfPwxXB0fp', 'mkHjM2K8XvrCJxxpIMWi', '2', '1', 'ladlsdfsdf', 'wjfjnwioiejfwjef wkfnwuenfw fkwjenfjwf', '2N7CHvq0kfbUCp6ablmQsROSQVDdXS2XOvztkv3ppkjMgO7RyC', 'videos/2020_03_11_2NDs4dHYToqva4iuBeJ8.mp4', '', 0, 'videos/2020_03_11_gOi3RJ8oyViiDWjhRWYp.jpg', '2020-03-11 12:23:17', '2020-03-11 12:23:17'),
(4, 'wEhmDj930JrNu83h3y2N', 'instructor', 'RFqOqO16F76AwekEJ24z', 'TPK9anB8BViPN9lGGsYf', 'jwwOgTUqkuOfPwxXB0fp', 'mkHjM2K8XvrCJxxpIMWi', '5', '1', 'jjkl jjsdifwkef', 'slkdjfiewf iwoejf iow jfeiowf', 'jnxsBsPuWRd6Isqti6MY6gYJhcw3ReByDhVTcMI7iWJDJtB5rO', 'videos/2020_03_11_2f4A5vvAVQhKQ4sbQYqd.mp4', '', 0, 'videos/2020_03_11_0i9pHuHJmnNaKjN3A6iz.jpg', '2020-03-11 13:33:24', '2020-03-11 13:33:24');

-- --------------------------------------------------------

--
-- Table structure for table `video_comments`
--

CREATE TABLE `video_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No Comment',
  `vid_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No Video',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'No User',
  `comment` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video_comments`
--

INSERT INTO `video_comments` (`id`, `comment_id`, `vid_id`, `user_email`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'No Comment', 'Yz0EIyCIsy1t54KFY2AoR2pa0IV6znXafnFDbk95S04FWut7c0', 'chuks', 'undefined', '2019-12-19 18:19:34', '2019-12-19 18:19:34'),
(2, 'No Comment', 'Yz0EIyCIsy1t54KFY2AoR2pa0IV6znXafnFDbk95S04FWut7c0', 'chuks', 'solo today', '2019-12-19 18:20:31', '2019-12-19 18:20:31'),
(3, 'No Comment', 'Yz0EIyCIsy1t54KFY2AoR2pa0IV6znXafnFDbk95S04FWut7c0', 'chuks', 'solo today', '2019-12-19 18:21:14', '2019-12-19 18:21:14'),
(4, 'Yxfym0LtAC9VBuTdB2Toc4nLEOzHubaR4YEusqc7TmqJ2MVNPr', 'Yz0EIyCIsy1t54KFY2AoR2pa0IV6znXafnFDbk95S04FWut7c0', 'chuks', 'solo today', '2019-12-19 18:23:35', '2019-12-19 18:23:35'),
(5, 'JYV9ME549N1zEWoAl2H9XaQuTyGM0ukd9EPhftvlOPj8I2ndrV', 'Yz0EIyCIsy1t54KFY2AoR2pa0IV6znXafnFDbk95S04FWut7c0', 'chuks', 'solo today', '2019-12-19 18:25:50', '2019-12-19 18:25:50'),
(6, 'L6RJ8GyAgq98848Yt7LXSS57PyidXoXItzDMySDtI6vDpYXiyy', 'Yz0EIyCIsy1t54KFY2AoR2pa0IV6znXafnFDbk95S04FWut7c0', 'chuks', 'solo today', '2019-12-19 18:26:57', '2019-12-19 18:26:57'),
(7, 'qI3DEp15PjcpLHzzMLLXKneJLBYicWhwcIc5qfP1MqBhox6FZz', 'Yz0EIyCIsy1t54KFY2AoR2pa0IV6znXafnFDbk95S04FWut7c0', 'chuks', 'solo today', '2019-12-19 18:27:21', '2019-12-19 18:27:21'),
(8, 'EG5dDUPp01tpT885VtFG1X3UVQNeVF8UmOSRq4ZAPIeb1PIaNl', 'Yz0EIyCIsy1t54KFY2AoR2pa0IV6znXafnFDbk95S04FWut7c0', 'chuks', 'solo today', '2019-12-19 18:27:38', '2019-12-19 18:27:38'),
(9, 'dVzmfPnxJojkGUMwG9b4tbd9KctnFEY9iOJzh1kEzi8e32nKLY', 'Yz0EIyCIsy1t54KFY2AoR2pa0IV6znXafnFDbk95S04FWut7c0', 'chuks', 'solo today', '2019-12-19 18:27:41', '2019-12-19 18:27:41'),
(10, '2hH9FI2czEOtRnvoHEzi0VU5251hajpGxtuQ2cuJGX4g7D39Kl', 'Yz0EIyCIsy1t54KFY2AoR2pa0IV6znXafnFDbk95S04FWut7c0', 'chuks', 'solo today', '2019-12-19 18:28:10', '2019-12-19 18:28:10'),
(11, '7P8VnZii47sPRPcC8sAvIi8VvT6jbhzmAmPPxb8Mvf11Z6j4Kz', 'Yz0EIyCIsy1t54KFY2AoR2pa0IV6znXafnFDbk95S04FWut7c0', 'chuks', 'solo today', '2019-12-19 18:28:24', '2019-12-19 18:28:24'),
(12, 'ANCZmESmB2iLddPScE7fiq276UjE8EEzsoE1OeQ9QIjLpincUA', 'Yz0EIyCIsy1t54KFY2AoR2pa0IV6znXafnFDbk95S04FWut7c0', 'chuks', 'solo today', '2019-12-19 18:35:39', '2019-12-19 18:35:39'),
(13, 'zxBxyWydvGoOnFLrkiNmo3ZDBkne74JH2uc82f0IkX1mK5HNb0', 'Yz0EIyCIsy1t54KFY2AoR2pa0IV6znXafnFDbk95S04FWut7c0', 'chuks', 'solo today', '2019-12-19 18:36:02', '2019-12-19 18:36:02'),
(14, '1rtoIc7Mx29CqN3EXKu9gjFzgQtxxSr3zTkIzB1yMmh5p392QS', 'Yz0EIyCIsy1t54KFY2AoR2pa0IV6znXafnFDbk95S04FWut7c0', 'chuks', 'solo today', '2019-12-19 18:36:03', '2019-12-19 18:36:03'),
(15, 'Rb2nKLEINwop6y4FyMx3o0yKQExX1cPM6LCrxmpf3ce5waudgv', 'Yz0EIyCIsy1t54KFY2AoR2pa0IV6znXafnFDbk95S04FWut7c0', 'chuks', 'solo today', '2019-12-19 18:36:12', '2019-12-19 18:36:12'),
(16, 'Rc44ej7YHaa7lJEpvNI9HzRbqMMWD4pncySFlpIkFEVrdYJrCV', 'Yz0EIyCIsy1t54KFY2AoR2pa0IV6znXafnFDbk95S04FWut7c0', 'chuks', 'solo today', '2019-12-19 18:36:14', '2019-12-19 18:36:14'),
(17, '2p2aQclJ0ijyJGsZpyvtckJcB94IJtBMgQnsTbLqEeI78LMktg', 'Yz0EIyCIsy1t54KFY2AoR2pa0IV6znXafnFDbk95S04FWut7c0', 'chuks', 'solo today', '2019-12-19 18:47:55', '2019-12-19 18:47:55'),
(18, 'ZrT0bNGANnDYIbSbs4HRBqvSjW7iPwdfn7qBABGd7mxd65P71l', 'Yz0EIyCIsy1t54KFY2AoR2pa0IV6znXafnFDbk95S04FWut7c0', 'chuks', 'solo today', '2019-12-19 18:56:25', '2019-12-19 18:56:25'),
(19, 'JvAcv8pJITwo4zPYcFkF78oJfYdYU0hslNYiLaEqOZz3e3aIGL', 'Yz0EIyCIsy1t54KFY2AoR2pa0IV6znXafnFDbk95S04FWut7c0', 'chuks', 'solo today', '2019-12-19 18:56:57', '2019-12-19 18:56:57'),
(20, 'Ux0gnHLEJHxdhYoHYNfHL0rCDgNTuamzB356g3Fr9TBrJZRDaH', 'Yz0EIyCIsy1t54KFY2AoR2pa0IV6znXafnFDbk95S04FWut7c0', 'chuks', 'solo today', '2019-12-19 18:58:08', '2019-12-19 18:58:08'),
(21, 'yeVinxhTuGUaDXWNeGB098pAKiNBgRDL2zkrHLQ7GhJYLXnBvV', 'Yz0EIyCIsy1t54KFY2AoR2pa0IV6znXafnFDbk95S04FWut7c0', 'chuks', 'solo today', '2019-12-19 18:58:27', '2019-12-19 18:58:27'),
(22, 'wNJ5dfN6Rnsbm1kgWsm3y64cVDsJXsWzoDIZ5utWvQZTGpR17e', 'Yz0EIyCIsy1t54KFY2AoR2pa0IV6znXafnFDbk95S04FWut7c0', 'chuks', 'solo today', '2019-12-19 18:59:03', '2019-12-19 18:59:03'),
(23, 'be3dm9GENKxthwrsXmhsiaIaM5h02Us3SedNfqzHFJbuPt1JtZ', 'Yz0EIyCIsy1t54KFY2AoR2pa0IV6znXafnFDbk95S04FWut7c0', 'chuks', 'solo today', '2019-12-19 18:59:52', '2019-12-19 18:59:52'),
(24, 'ySXRWjAYS9CoieXftAYMDD2CvwEYpLjyDCYjleaH2uHZnAVbNp', 'Yz0EIyCIsy1t54KFY2AoR2pa0IV6znXafnFDbk95S04FWut7c0', 'chuks', 'solo today', '2019-12-19 19:03:01', '2019-12-19 19:03:01'),
(25, 'JZln9DXeMX0xt9KcheTBfcTpv5YIRXLpzAEofbCi5KvT7JuQoS', 'Yz0EIyCIsy1t54KFY2AoR2pa0IV6znXafnFDbk95S04FWut7c0', 'chuks', 'solo today', '2019-12-19 19:03:29', '2019-12-19 19:03:29'),
(26, 'R6JxvObOzzldyvCpOu0BCBRP9xdZEP1Pdexn9GzZgY3ngkVA4L', 'Yz0EIyCIsy1t54KFY2AoR2pa0IV6znXafnFDbk95S04FWut7c0', 'chuks', 'solo today', '2019-12-19 19:04:16', '2019-12-19 19:04:16'),
(27, 'fXbMqFattmypkhqznAlm7bnJWAUFnUH876CtrTPJT7meBAzS5L', 'Yz0EIyCIsy1t54KFY2AoR2pa0IV6znXafnFDbk95S04FWut7c0', 'chuks', 'solo today', '2019-12-19 19:04:52', '2019-12-19 19:04:52'),
(28, 's9QbPWZ5TRi3rCdLQH9sWJW2eYsCx1FYfGochWNNxEajNx9xj9', 'Yz0EIyCIsy1t54KFY2AoR2pa0IV6znXafnFDbk95S04FWut7c0', 'chuks', 'Coming soon...', '2019-12-19 19:06:56', '2019-12-19 19:06:56'),
(29, 'kRPaXRXBK0x5ANLrJ6CvP1qF33cFXb8sH7kNjeHaMsjUX3svEi', 'Yz0EIyCIsy1t54KFY2AoR2pa0IV6znXafnFDbk95S04FWut7c0', 'chuks', 'Coming soon...', '2019-12-19 19:07:38', '2019-12-19 19:07:38'),
(30, 'mSQnQ5natS7Evm9ZMyYB3zOCzr6P6FtIo3mA74lb6eAAn8YOxd', 'Yz0EIyCIsy1t54KFY2AoR2pa0IV6znXafnFDbk95S04FWut7c0', 'chuks', 'Coming soon...', '2019-12-19 19:07:54', '2019-12-19 19:07:54'),
(31, 'RbcCbnksx6iYCVlrvcrrxqVRiPQOvEOjXtSdhpbA9NxMRpee8J', 'Yz0EIyCIsy1t54KFY2AoR2pa0IV6znXafnFDbk95S04FWut7c0', 'chuks', 'show some love joor', '2019-12-19 19:08:12', '2019-12-19 19:08:12'),
(32, 'aeR2s6dtj6Y2mK2BobRdpmx9DABoh7YLzV9qFlzAqEM766HBe1', 'Yz0EIyCIsy1t54KFY2AoR2pa0IV6znXafnFDbk95S04FWut7c0', 'chuks', 'show some love joor', '2019-12-19 19:08:53', '2019-12-19 19:08:53'),
(33, 'ePaCqL1YvFJfiAkgeleVgXX5IKsqyQ4FuJZghRUKBYpawToOHR', 'Yz0EIyCIsy1t54KFY2AoR2pa0IV6znXafnFDbk95S04FWut7c0', 'chuks', 'Dangerous Seed', '2019-12-19 19:09:08', '2019-12-19 19:09:08'),
(34, 'u9CrK1N4nM8yen5PpwAg2yTcpkgJsnGbkZsw4ffq2jOUJfaVnj', 'Yz0EIyCIsy1t54KFY2AoR2pa0IV6znXafnFDbk95S04FWut7c0', 'chuks', 'Ikoto fam', '2019-12-19 19:09:35', '2019-12-19 19:09:35'),
(35, '3rhSP7jC36eJacHSANCR5NRohsMcNFIXmwzKvsgYyh3QrRxiuh', 'Yz0EIyCIsy1t54KFY2AoR2pa0IV6znXafnFDbk95S04FWut7c0', 'chuks', 'Josanko Of all People', '2019-12-19 19:10:01', '2019-12-19 19:10:01'),
(36, 'iKZqfJW6iaRwKvQLVU31OeVcYuBfelFKkvcCiJ3eywmMiki3ZN', 'Yz0EIyCIsy1t54KFY2AoR2pa0IV6znXafnFDbk95S04FWut7c0', 'chuks', 'waiting for the lord sheep', '2019-12-19 19:10:15', '2019-12-19 19:10:15'),
(37, 'wkKvsTPlbhzKuE8RarLztN7rUzPibKvihSnlsoJ6nPups2R9fI', 'Yz0EIyCIsy1t54KFY2AoR2pa0IV6znXafnFDbk95S04FWut7c0', 'chuks', 'waiting for the lord sheep', '2019-12-19 19:11:49', '2019-12-19 19:11:49'),
(38, 'pPvf1705H3oVCLyYU6zD56UJHz0GSCVZvpGlR22JfDZSzYInG9', 'Yz0EIyCIsy1t54KFY2AoR2pa0IV6znXafnFDbk95S04FWut7c0', 'chuks', 'temple of the lord', '2019-12-19 19:11:59', '2019-12-19 19:11:59'),
(39, 'F3i7vWWFpwQp2i2vgzJ62ammtBXEf7uPiBjqVXXDyIbGDWJPw7', 'bL0icgZaQRMJsZU87ZTkkMnEVI4vGR4YcRcr0gaiTmYEsRCD5g', 'chuks', 'If I comment now dem go talk', '2019-12-19 19:12:30', '2019-12-19 19:12:30'),
(40, '2CGViODyrT9OBAeQ6a4DDIXVyilJPVOmoQ6KxoF06PkUfndrsq', 'bL0icgZaQRMJsZU87ZTkkMnEVI4vGR4YcRcr0gaiTmYEsRCD5g', 'chuks', 'Show us the way nah', '2019-12-19 19:28:06', '2019-12-19 19:28:06'),
(41, 'YeXKnaTysP9aSEGnpzQumH2kCHngsyR8s9daPdzdiznFim1EFI', 'bL0icgZaQRMJsZU87ZTkkMnEVI4vGR4YcRcr0gaiTmYEsRCD5g', 'chuks', 'Show us the way nah', '2019-12-19 19:31:33', '2019-12-19 19:31:33'),
(42, 'zoPgSBbhzHtvBt0US30FkwxFBkn8yc5Ot2HKG4BphezrWHdoP3', 'bL0icgZaQRMJsZU87ZTkkMnEVI4vGR4YcRcr0gaiTmYEsRCD5g', 'chuks', 'Show us the way nah', '2019-12-19 19:31:33', '2019-12-19 19:31:33'),
(43, 'yTMyDlgk2iwpfpNsNMYSn7WG24dqrRCWEMRATeJiPaYNiwEOCP', 'bL0icgZaQRMJsZU87ZTkkMnEVI4vGR4YcRcr0gaiTmYEsRCD5g', 'chuks', 'Show us the way nah', '2019-12-19 19:34:10', '2019-12-19 19:34:10'),
(44, 'TCRi48ELog3mgmJdCmqSGOYqSVS0OPDK0LFDyq7bnNqZPhXD2R', 'bL0icgZaQRMJsZU87ZTkkMnEVI4vGR4YcRcr0gaiTmYEsRCD5g', 'chuks', 'Show us the way nah', '2019-12-19 19:34:10', '2019-12-19 19:34:10'),
(45, '9Eqc3QtHV5PtEWrw5vHKa4TSCDAXQ0f6zamVrtMLVLje5uZFvE', 'bL0icgZaQRMJsZU87ZTkkMnEVI4vGR4YcRcr0gaiTmYEsRCD5g', 'chuks', 'Show us the way nah', '2019-12-19 19:36:26', '2019-12-19 19:36:26'),
(46, '4Wt72OfpN0KRH48QCJVwhL5mLgnSras073wD5yFHJM24d2150f', 'bL0icgZaQRMJsZU87ZTkkMnEVI4vGR4YcRcr0gaiTmYEsRCD5g', 'chuks', 'Show us the way nah', '2019-12-19 19:36:26', '2019-12-19 19:36:26'),
(47, 'uNy8mpm0NOCHFya5j4aOgvGWCb378ajJp3gXBj6CYNyGmY18BY', 'bL0icgZaQRMJsZU87ZTkkMnEVI4vGR4YcRcr0gaiTmYEsRCD5g', 'chuks', 'Show us the way nah', '2019-12-19 19:37:13', '2019-12-19 19:37:13'),
(48, 'lcv2QlIIH433ACV1sGnuyPCVUWIqq3svQ5mv19m3ej7E57NtS1', 'bL0icgZaQRMJsZU87ZTkkMnEVI4vGR4YcRcr0gaiTmYEsRCD5g', 'chuks', 'Show us the way nah', '2019-12-19 19:37:14', '2019-12-19 19:37:14'),
(49, 'wSJkWNm8CZg3A6j8iktTEbfqugbS3EwYfam0oIkMzKmDCbR0cu', 'bL0icgZaQRMJsZU87ZTkkMnEVI4vGR4YcRcr0gaiTmYEsRCD5g', 'chuks', 'Show us the way nah', '2019-12-19 19:42:32', '2019-12-19 19:42:32'),
(50, 'EcD1FGC6W36Bsl9tg8HYJ8musUMnfFX3kbDrH6mLXTLW3rOMjF', 'bL0icgZaQRMJsZU87ZTkkMnEVI4vGR4YcRcr0gaiTmYEsRCD5g', 'chuks', 'Show us the way nah', '2019-12-19 19:42:58', '2019-12-19 19:42:58'),
(51, 'rz4GcVEIeofhVmviFEM3HK0Hf4W3piR8PAdmMtfi3gSSnjnwEk', 'bL0icgZaQRMJsZU87ZTkkMnEVI4vGR4YcRcr0gaiTmYEsRCD5g', 'chuks', 'Show us the way nah', '2019-12-19 19:42:58', '2019-12-19 19:42:58'),
(52, 'b7Z0BybRCix009bnoETq4I4jeOkuId4at1dufR7BqeUh3d33ju', 'bL0icgZaQRMJsZU87ZTkkMnEVI4vGR4YcRcr0gaiTmYEsRCD5g', 'chuks', 'Show us the way nah', '2019-12-19 20:20:16', '2019-12-19 20:20:16'),
(53, 'CU1wPbPqz64oR0zUP242g52vmADSh6AYuYqgS2FC0MjW9GdnpL', 'bL0icgZaQRMJsZU87ZTkkMnEVI4vGR4YcRcr0gaiTmYEsRCD5g', 'chuks', 'Show us the way nah', '2019-12-19 20:21:40', '2019-12-19 20:21:40'),
(54, 'clDBcigmMA04FxMhe9VFjdI7DdPy2B1wx0wn5ikbHJVaKdNAuN', 'bL0icgZaQRMJsZU87ZTkkMnEVI4vGR4YcRcr0gaiTmYEsRCD5g', 'chuks', 'Show us the way nah', '2019-12-19 20:24:20', '2019-12-19 20:24:20'),
(55, 'yatwyMd3R2maC37AGmsSAtEmqa7eznqX7GpHO9xZexMaZdqLci', 'bL0icgZaQRMJsZU87ZTkkMnEVI4vGR4YcRcr0gaiTmYEsRCD5g', 'chuks', 'Show us the way nah', '2019-12-19 20:24:59', '2019-12-19 20:24:59'),
(56, '3hxNFAuDAC9rmY7huf0xL1zhP1X7ef3hUEPgUC5fsTZXKRgIF2', 'bL0icgZaQRMJsZU87ZTkkMnEVI4vGR4YcRcr0gaiTmYEsRCD5g', 'chuks', 'Show us the way nah', '2019-12-19 20:25:28', '2019-12-19 20:25:28'),
(57, 'W34LdtdC3hXuPNPqxupaPM8ePBkRSKLtmahXollpEGyzGuoVUN', 'bL0icgZaQRMJsZU87ZTkkMnEVI4vGR4YcRcr0gaiTmYEsRCD5g', 'chuks', 'Show us the way nah', '2019-12-19 20:26:09', '2019-12-19 20:26:09'),
(58, '5urwD4bdS46rSeHHVsKitLv1mlI1Ek0fK2gu3HCJGxYazWfT0R', 'bL0icgZaQRMJsZU87ZTkkMnEVI4vGR4YcRcr0gaiTmYEsRCD5g', 'chuks', 'Show us the way nah', '2019-12-19 20:26:46', '2019-12-19 20:26:46'),
(59, 'TKHiMtQ73nQWKIPKnpw5swmVJJqtAoTdVdTglYpya5MR9bG3pR', 'bL0icgZaQRMJsZU87ZTkkMnEVI4vGR4YcRcr0gaiTmYEsRCD5g', 'chuks', 'Show us the way nah', '2019-12-19 20:28:06', '2019-12-19 20:28:06'),
(60, '6hokwn28l320Ovejrs6aOG9XvJCCMm7shoMxs7qE9gW0gdxf6c', 'bL0icgZaQRMJsZU87ZTkkMnEVI4vGR4YcRcr0gaiTmYEsRCD5g', 'chuks', 'Show us the way nah', '2019-12-19 20:29:22', '2019-12-19 20:29:22'),
(61, 'u2zPhVlc4UH9alckRykoBgCi8r3DjPpf9FvZ3SOCncDrSc5jKf', 'bL0icgZaQRMJsZU87ZTkkMnEVI4vGR4YcRcr0gaiTmYEsRCD5g', 'chuks', 'Show us the way nah', '2019-12-19 20:29:37', '2019-12-19 20:29:37'),
(62, 'sQeI4Tffw0SYa2TFEZttCUoDbjp10F0eKmF2YYJoZQkrBun7fS', 'bL0icgZaQRMJsZU87ZTkkMnEVI4vGR4YcRcr0gaiTmYEsRCD5g', 'chuks', 'common in jare', '2019-12-19 20:29:51', '2019-12-19 20:29:51'),
(63, 'APewPGhaBXHBSF82xMeiljyyV9GtY0bYUd74GgA8aZPU5kQ7Vc', 'bL0icgZaQRMJsZU87ZTkkMnEVI4vGR4YcRcr0gaiTmYEsRCD5g', 'chuks', 'common in jare', '2019-12-19 20:29:55', '2019-12-19 20:29:55'),
(64, 'phuhsQ3rt0tq3GDgAdaNN6SRconHM4Xitw794yWmqpmg0kL4p8', 'bL0icgZaQRMJsZU87ZTkkMnEVI4vGR4YcRcr0gaiTmYEsRCD5g', 'chuks', 'common in jare', '2019-12-19 20:30:35', '2019-12-19 20:30:35'),
(65, 'yXPmp0euh4xAlF68IHxNJua49CsOlBhYAjxbK15AOGhqfugr2d', 'bL0icgZaQRMJsZU87ZTkkMnEVI4vGR4YcRcr0gaiTmYEsRCD5g', 'chuks', 'common in jare', '2019-12-19 20:30:38', '2019-12-19 20:30:38'),
(66, 'iOOzZTwoqAItKvq3BRM2XoAHSeOq4MPposlDdVQSW9KhZ3feNe', 'bL0icgZaQRMJsZU87ZTkkMnEVI4vGR4YcRcr0gaiTmYEsRCD5g', 'chuks', 'common in jare', '2019-12-19 20:31:06', '2019-12-19 20:31:06'),
(67, 'tBLP4ycrpmZjNw4YCzqLtBFGpbEt6j5Dax34tz7kSVkkhbynSq', 'bL0icgZaQRMJsZU87ZTkkMnEVI4vGR4YcRcr0gaiTmYEsRCD5g', 'chuks', 'common in jare', '2019-12-19 20:31:10', '2019-12-19 20:31:10'),
(68, 'EkimhO4VsxqddsaqHkBOSroz8ziQwDDdExlu4XlN0aVZgTgfjt', 'bL0icgZaQRMJsZU87ZTkkMnEVI4vGR4YcRcr0gaiTmYEsRCD5g', 'chuks', 'common in jare hhh', '2019-12-19 20:31:15', '2019-12-19 20:31:15'),
(69, '57K2ilnPfE93IIaFRBQ3qDkhoyeFZUF8IIZWF7h1ijruOWTjOj', 'bL0icgZaQRMJsZU87ZTkkMnEVI4vGR4YcRcr0gaiTmYEsRCD5g', 'chuks', 'common in jare hhh', '2019-12-19 20:32:03', '2019-12-19 20:32:03'),
(70, 'TQLh7BXBT2qvNu6G0UYJIJGDoVp5bI5h5CLxpowiIRs3XdNpKV', 'bL0icgZaQRMJsZU87ZTkkMnEVI4vGR4YcRcr0gaiTmYEsRCD5g', 'chuks', 'common in jare hhh', '2019-12-19 20:33:11', '2019-12-19 20:33:11'),
(71, 'IyoQw0jhikhfqVcbPecXAAmETHQKdCm91hRUD6j0Kd3RReRj2M', 'bL0icgZaQRMJsZU87ZTkkMnEVI4vGR4YcRcr0gaiTmYEsRCD5g', 'chuks', 'common in jare hhh', '2019-12-19 20:33:28', '2019-12-19 20:33:28'),
(72, 'BdtMWWerWzHJ4qS4FFj2SZtuhTyjMUXJBeMe30Bya13bZJc6L6', 'bL0icgZaQRMJsZU87ZTkkMnEVI4vGR4YcRcr0gaiTmYEsRCD5g', 'chuks', 'prisoner for you', '2019-12-19 20:34:52', '2019-12-19 20:34:52'),
(73, 'jtnS7wm0FlwwucJ07SiiuwV9rFDw6EnA0adugZOMJcpsMVQOQx', 'Yz0EIyCIsy1t54KFY2AoR2pa0IV6znXafnFDbk95S04FWut7c0', 'chuks', 'sam', '2019-12-19 20:54:01', '2019-12-19 20:54:01'),
(74, 'R1jtP3DqJGpgAdfFGVkBmHRUGEbD4k1DC7H1tDD9eS5IxG9hQQ', 'Yz0EIyCIsy1t54KFY2AoR2pa0IV6znXafnFDbk95S04FWut7c0', 'chuks', 'dgrfd', '2019-12-19 20:54:10', '2019-12-19 20:54:10');

-- --------------------------------------------------------

--
-- Table structure for table `video_views_likes`
--

CREATE TABLE `video_views_likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `thumbs_down` int(10) UNSIGNED DEFAULT NULL,
  `thumbs_up` int(10) UNSIGNED DEFAULT NULL,
  `views` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `vid_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video_views_likes`
--

INSERT INTO `video_views_likes` (`id`, `thumbs_down`, `thumbs_up`, `views`, `user_email`, `vid_id`, `created_at`, `updated_at`) VALUES
(1, 1, 0, '0', 'b@b.b', 'IQezXoD8Lr', '2020-01-19 05:12:44', '2020-01-19 05:18:40'),
(2, 0, 1, '0', 'student', 'jnxsBsPuWRd6Isqti6MY6gYJhcw3ReByDhVTcMI7iWJDJtB5rO', '2020-03-11 14:27:20', '2020-03-11 14:27:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apps_countries`
--
ALTER TABLE `apps_countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courses_course_id_unique` (`course_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty_level`
--
ALTER TABLE `faculty_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `institution_type`
--
ALTER TABLE `institution_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_institutions`
--
ALTER TABLE `other_institutions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_institution_courses`
--
ALTER TABLE `other_institution_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_institution_students`
--
ALTER TABLE `other_institution_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_institution_topics`
--
ALTER TABLE `other_institution_topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_institution_videos`
--
ALTER TABLE `other_institution_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_institution_views_likes`
--
ALTER TABLE `other_institution_views_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `secondary_schools`
--
ALTER TABLE `secondary_schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sec_students`
--
ALTER TABLE `sec_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sec_topics`
--
ALTER TABLE `sec_topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sec_videos`
--
ALTER TABLE `sec_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sec_video_views_likes`
--
ALTER TABLE `sec_video_views_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sec_video_views_thumbsup`
--
ALTER TABLE `sec_video_views_thumbsup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_token_unique` (`token`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `videos_vid_id_unique` (`vid_id`);

--
-- Indexes for table `video_comments`
--
ALTER TABLE `video_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_views_likes`
--
ALTER TABLE `video_views_likes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apps_countries`
--
ALTER TABLE `apps_countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `faculty_level`
--
ALTER TABLE `faculty_level`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `institution_type`
--
ALTER TABLE `institution_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `other_institutions`
--
ALTER TABLE `other_institutions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `other_institution_courses`
--
ALTER TABLE `other_institution_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `other_institution_students`
--
ALTER TABLE `other_institution_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `other_institution_topics`
--
ALTER TABLE `other_institution_topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `other_institution_videos`
--
ALTER TABLE `other_institution_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `other_institution_views_likes`
--
ALTER TABLE `other_institution_views_likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `secondary_schools`
--
ALTER TABLE `secondary_schools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sec_students`
--
ALTER TABLE `sec_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `sec_topics`
--
ALTER TABLE `sec_topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sec_videos`
--
ALTER TABLE `sec_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sec_video_views_likes`
--
ALTER TABLE `sec_video_views_likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sec_video_views_thumbsup`
--
ALTER TABLE `sec_video_views_thumbsup`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `universities`
--
ALTER TABLE `universities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `video_comments`
--
ALTER TABLE `video_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `video_views_likes`
--
ALTER TABLE `video_views_likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
