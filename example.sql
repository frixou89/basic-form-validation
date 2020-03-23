-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2017 at 02:22 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tickmill_test`
--
CREATE DATABASE IF NOT EXISTS `tickmill_test` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `tickmill_test`;

-- --------------------------------------------------------

--
-- Table structure for table `client_type`
--

CREATE TABLE `client_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Client Types';

--
-- Dumping data for table `client_type`
--

INSERT INTO `client_type` (`id`, `name`) VALUES
(1, 'Individual'),
(2, 'Company');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso_code_short` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country`, `iso_code_short`) VALUES
(1, 'Afghanistan', 'AF'),
(2, 'Albania', 'AL'),
(3, 'Algeria', 'DZ'),
(4, 'American Samoa', 'AS'),
(5, 'Andorra', 'AD'),
(6, 'Angola', 'AO'),
(7, 'Anguilla', 'AI'),
(8, 'Antarctica', 'AQ'),
(9, 'Antigua and Barbuda', 'AG'),
(10, 'Argentina', 'AR'),
(11, 'Armenia', 'AM'),
(12, 'Aruba', 'AW'),
(13, 'Australia', 'AU'),
(14, 'Austria', 'AT'),
(15, 'Azerbaijan', 'AZ'),
(16, 'Bahamas', 'BS'),
(17, 'Bahrain', 'BH'),
(18, 'Bangladesh', 'BD'),
(19, 'Barbados', 'BB'),
(20, 'Belarus', 'BY'),
(21, 'Belgium', 'BE'),
(22, 'Belize', 'BZ'),
(23, 'Benin', 'BJ'),
(24, 'Bermuda', 'BM'),
(25, 'Bhutan', 'BT'),
(26, 'Bolivia', 'BO'),
(27, 'Bosnia and Herzegovina', 'BA'),
(28, 'Botswana', 'BW'),
(29, 'Brazil', 'BR'),
(30, 'British Indian Ocean Territory', 'IO'),
(31, 'British Virgin Islands', 'VG'),
(32, 'Brunei', 'BN'),
(33, 'Bulgaria', 'BG'),
(34, 'Burkina Faso', 'BF'),
(35, 'Burma (Myanmar)', 'MM'),
(36, 'Burundi', 'BI'),
(37, 'Cambodia', 'KH'),
(38, 'Cameroon', 'CM'),
(39, 'Canada', 'CA'),
(40, 'Cape Verde', 'CV'),
(41, 'Cayman Islands', 'KY'),
(42, 'Central African Republic', 'CF'),
(43, 'Chad', 'TD'),
(44, 'Chile', 'CL'),
(45, 'China', 'CN'),
(46, 'Christmas Island', 'CX'),
(47, 'Cocos (Keeling) Islands', 'CC'),
(48, 'Colombia', 'CO'),
(49, 'Comoros', 'KM'),
(50, 'Cook Islands', 'CK'),
(51, 'Costa Rica', 'CR'),
(52, 'Croatia', 'HR'),
(53, 'Cuba', 'CU'),
(54, 'Cyprus', 'CY'),
(55, 'Czech Republic', 'CZ'),
(56, 'Democratic Republic of the Congo', 'CD'),
(57, 'Denmark', 'DK'),
(58, 'Djibouti', 'DJ'),
(59, 'Dominica', 'DM'),
(60, 'Dominican Republic', 'DO'),
(61, 'Ecuador', 'EC'),
(62, 'Egypt', 'EG'),
(63, 'El Salvador', 'SV'),
(64, 'Equatorial Guinea', 'GQ'),
(65, 'Eritrea', 'ER'),
(66, 'Estonia', 'EE'),
(67, 'Ethiopia', 'ET'),
(68, 'Falkland Islands', 'FK'),
(69, 'Faroe Islands', 'FO'),
(70, 'Fiji', 'FJ'),
(71, 'Finland', 'FI'),
(72, 'France', 'FR'),
(73, 'French Polynesia', 'PF'),
(74, 'Gabon', 'GA'),
(75, 'Gambia', 'GM'),
(76, 'Gaza Strip', ''),
(77, 'Georgia', 'GE'),
(78, 'Germany', 'DE'),
(79, 'Ghana', 'GH'),
(80, 'Gibraltar', 'GI'),
(81, 'Greece', 'GR'),
(82, 'Greenland', 'GL'),
(83, 'Grenada', 'GD'),
(84, 'Guam', 'GU'),
(85, 'Guatemala', 'GT'),
(86, 'Guinea', 'GN'),
(87, 'Guinea-Bissau', 'GW'),
(88, 'Guyana', 'GY'),
(89, 'Haiti', 'HT'),
(90, 'Holy See (Vatican City)', 'VA'),
(91, 'Honduras', 'HN'),
(92, 'Hong Kong', 'HK'),
(93, 'Hungary', 'HU'),
(94, 'Iceland', 'IS'),
(95, 'India', 'IN'),
(96, 'Indonesia', 'ID'),
(97, 'Iran', 'IR'),
(98, 'Iraq', 'IQ'),
(99, 'Ireland', 'IE'),
(100, 'Isle of Man', 'IM'),
(101, 'Israel', 'IL'),
(102, 'Italy', 'IT'),
(103, 'Ivory Coast', 'CI'),
(104, 'Jamaica', 'JM'),
(105, 'Japan', 'JP'),
(106, 'Jersey', 'JE'),
(107, 'Jordan', 'JO'),
(108, 'Kazakhstan', 'KZ'),
(109, 'Kenya', 'KE'),
(110, 'Kiribati', 'KI'),
(111, 'Kosovo', ''),
(112, 'Kuwait', 'KW'),
(113, 'Kyrgyzstan', 'KG'),
(114, 'Laos', 'LA'),
(115, 'Latvia', 'LV'),
(116, 'Lebanon', 'LB'),
(117, 'Lesotho', 'LS'),
(118, 'Liberia', 'LR'),
(119, 'Libya', 'LY'),
(120, 'Liechtenstein', 'LI'),
(121, 'Lithuania', 'LT'),
(122, 'Luxembourg', 'LU'),
(123, 'Macau', 'MO'),
(124, 'Macedonia', 'MK'),
(125, 'Madagascar', 'MG'),
(126, 'Malawi', 'MW'),
(127, 'Malaysia', 'MY'),
(128, 'Maldives', 'MV'),
(129, 'Mali', 'ML'),
(130, 'Malta', 'MT'),
(131, 'Marshall Islands', 'MH'),
(132, 'Mauritania', 'MR'),
(133, 'Mauritius', 'MU'),
(134, 'Mayotte', 'YT'),
(135, 'Mexico', 'MX'),
(136, 'Micronesia', 'FM'),
(137, 'Moldova', 'MD'),
(138, 'Monaco', 'MC'),
(139, 'Mongolia', 'MN'),
(140, 'Montenegro', 'ME'),
(141, 'Montserrat', 'MS'),
(142, 'Morocco', 'MA'),
(143, 'Mozambique', 'MZ'),
(144, 'Namibia', 'NA'),
(145, 'Nauru', 'NR'),
(146, 'Nepal', 'NP'),
(147, 'Netherlands', 'NL'),
(148, 'Netherlands Antilles', 'AN'),
(149, 'New Caledonia', 'NC'),
(150, 'New Zealand', 'NZ'),
(151, 'Nicaragua', 'NI'),
(152, 'Niger', 'NE'),
(153, 'Nigeria', 'NG'),
(154, 'Niue', 'NU'),
(155, 'Norfolk Island', ''),
(156, 'North Korea', 'KP'),
(157, 'Northern Mariana Islands', 'MP'),
(158, 'Norway', 'NO'),
(159, 'Oman', 'OM'),
(160, 'Pakistan', 'PK'),
(161, 'Palau', 'PW'),
(162, 'Panama', 'PA'),
(163, 'Papua New Guinea', 'PG'),
(164, 'Paraguay', 'PY'),
(165, 'Peru', 'PE'),
(166, 'Philippines', 'PH'),
(167, 'Pitcairn Islands', 'PN'),
(168, 'Poland', 'PL'),
(169, 'Portugal', 'PT'),
(170, 'Puerto Rico', 'PR'),
(171, 'Qatar', 'QA'),
(172, 'Republic of the Congo', 'CG'),
(173, 'Romania', 'RO'),
(174, 'Russia', 'RU'),
(175, 'Rwanda', 'RW'),
(176, 'Saint Barthelemy', 'BL'),
(177, 'Saint Helena', 'SH'),
(178, 'Saint Kitts and Nevis', 'KN'),
(179, 'Saint Lucia', 'LC'),
(180, 'Saint Martin', 'MF'),
(181, 'Saint Pierre and Miquelon', 'PM'),
(182, 'Saint Vincent and the Grenadines', 'VC'),
(183, 'Samoa', 'WS'),
(184, 'San Marino', 'SM'),
(185, 'Sao Tome and Principe', 'ST'),
(186, 'Saudi Arabia', 'SA'),
(187, 'Senegal', 'SN'),
(188, 'Serbia', 'RS'),
(189, 'Seychelles', 'SC'),
(190, 'Sierra Leone', 'SL'),
(191, 'Singapore', 'SG'),
(192, 'Slovakia', 'SK'),
(193, 'Slovenia', 'SI'),
(194, 'Solomon Islands', 'SB'),
(195, 'Somalia', 'SO'),
(196, 'South Africa', 'ZA'),
(197, 'South Korea', 'KR'),
(198, 'Spain', 'ES'),
(199, 'Sri Lanka', 'LK'),
(200, 'Sudan', 'SD'),
(201, 'Suriname', 'SR'),
(202, 'Svalbard', 'SJ'),
(203, 'Swaziland', 'SZ'),
(204, 'Sweden', 'SE'),
(205, 'Switzerland', 'CH'),
(206, 'Syria', 'SY'),
(207, 'Taiwan', 'TW'),
(208, 'Tajikistan', 'TJ'),
(209, 'Tanzania', 'TZ'),
(210, 'Thailand', 'TH'),
(211, 'Timor-Leste', 'TL'),
(212, 'Togo', 'TG'),
(213, 'Tokelau', 'TK'),
(214, 'Tonga', 'TO'),
(215, 'Trinidad and Tobago', 'TT'),
(216, 'Tunisia', 'TN'),
(217, 'Turkey', 'TR'),
(218, 'Turkmenistan', 'TM'),
(219, 'Turks and Caicos Islands', 'TC'),
(220, 'Tuvalu', 'TV'),
(221, 'Uganda', 'UG'),
(222, 'Ukraine', 'UA'),
(223, 'United Arab Emirates', 'AE'),
(224, 'United Kingdom', 'GB'),
(226, 'Uruguay', 'UY'),
(228, 'Uzbekistan', 'UZ'),
(229, 'Vanuatu', 'VU'),
(230, 'Venezuela', 'VE'),
(231, 'Vietnam', 'VN'),
(232, 'Wallis and Futuna', 'WF'),
(233, 'West Bank', ''),
(234, 'Western Sahara', 'EH'),
(235, 'Yemen', 'YE'),
(236, 'Zambia', 'ZM'),
(237, 'Zimbabwe', 'ZW'),
(238, 'State of Palestine', 'PS'),
(239, 'Guernsey', 'GG'),
(240, 'US Virgin Islands', ''),
(241, 'United States', '');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `title_id` int(11) NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `client_type` int(11) NOT NULL,
  `company_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int(11) NOT NULL,
  `phone` int(255) NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE `title` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `title`
--

INSERT INTO `title` (`id`, `name`) VALUES
(1, 'Mr.'),
(2, 'Mrs.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_type`
--
ALTER TABLE `client_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_client_type` (`client_type`) USING BTREE,
  ADD KEY `IDX_country_id` (`country_id`) USING BTREE,
  ADD KEY `IDX_title_id` (`title_id`) USING BTREE;

--
-- Indexes for table `title`
--
ALTER TABLE `title`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client_type`
--
ALTER TABLE `client_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `title`
--
ALTER TABLE `title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `FK_client_type` FOREIGN KEY (`title_id`) REFERENCES `client_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_country_id` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_title_id` FOREIGN KEY (`title_id`) REFERENCES `title` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
