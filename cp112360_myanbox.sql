-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 26, 2023 at 04:27 PM
-- Server version: 5.6.51
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cp112360_myanbox`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `title` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `btn_text` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('join','target') COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `title`, `image`, `description`, `btn_text`, `type`, `updated_at`) VALUES
(68, 'We serve the public interest', '1607312311.png', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     We provide assurance and offer solutions that advance business, reduce time, costs and encourage use of digital media.\nWe work with governments to develop sustainable approaches to urban area development.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       ', '', 'target', '2021-10-29 05:32:01'),
(69, 'We promote ethical  ,  inclusive practices ', '1607311233.png', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     We seek to level the playing field by removing barriers for the disadvantaged and mitigating the actions of bad actors.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       ', '', 'target', '2021-10-29 05:32:01'),
(66, 'We cultivate careers', '1607311406.png', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     We are committed to helping clients, our people and society adapt to technology-driven change and prepare for the industrial revolution.\nWe champion communities and create opportunity                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       ', '', 'target', '2021-10-29 05:32:01'),
(67, 'We influence action', '1607311482.png', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     Myanbox is leading industry and clients into up to date trends by showing them how to merge the digital and physical worlds.\nMyanbox develops and shares valuable information that others can use to be more responsive and responsible. ( others include individuals and businesses)\nWe help clients manage the business and environmental impacts of natural resources consumption, energy, waste and emissions by translating analytical insights into actionable cost savings and economic value                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      ', '', 'target', '2021-10-29 05:32:01'),
(64, 'Discover', '1608261137.png', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <p><span style=\"font-weight: 400;\">how anyone can create a dream home out of their limited budget for construction and decoration.</span></p><ul><ul></ul></ul><p><br></p><p></p><p style=\"font-weight: 400;\"><span style=\"font-weight: 400;\">how you \ncan find the best architectural and interior design Company in Myanmar \nthat suits your lifestyle, design style and budget and</span></p><p style=\"font-weight: 400;\"><span style=\"font-weight: 400;\">how Myanbox can actually help you save some hassle you might get for your construction and renovation project.</span></p><p style=\"font-weight: 400;\">\n</p><p><span style=\"font-weight: 400;\">Save your trouble to visit dozens of \ncompanies, get free consultation and quotations from various service \ncompanies and design firms.</span></p><p style=\"font-weight: 400;\"><span style=\"font-weight: 400;\"><br></span></p><p><span style=\"font-weight: 400;\">We will also be sending you a Free E-magazine and Free Reno Checklist!</span></p><p style=\"font-weight: 400;\"><span style=\"font-weight: 400;\"><br></span></p>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ', 'join as professional', 'join', '2021-10-29 05:32:01'),
(65, 'We ignite innovation', '1607077895.png', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     We are part of an ecosystem that is using technology and innovative business and talents models to create a better future for Myanmar.\nMyanbox technologies continue to open up massive opportunities yet to be fully tapped.We bring together capabilities across disciplines and ecosystems to help shape the future in numerous areas including construction, engineering and architecture.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       ', '', 'target', '2021-10-29 05:32:01'),
(62, 'Join Our Network', '1608219229.png', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           As Myanmar’s no.1 leading construction, interior design, inspiration and Renovation Portal, MYANBOX is the clear choice for businesses who wish to profile their companies and showcase their services to homeowners. Our visitors are house-proud, quality-conscious consumers who are willing to spend if the price is right and quality is good. If you have a product or service that would appeal to this discerning and savvy set of people, MYANBOX is the ideal advertising platform for you.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         ', 'join as client', 'join', '2021-10-29 05:32:01'),
(61, 'Professionals', '1622521412.png', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <p>Update your resume, set your current job status such as finding a job, \nlooking for freelance project, or internship. Contact various others \nprofessional in your field. <br></p>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ', 'join as client', 'join', '2021-10-29 05:32:01');

-- --------------------------------------------------------

--
-- Table structure for table `advertise_with_us`
--

CREATE TABLE `advertise_with_us` (
  `id` int(11) NOT NULL,
  `title` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `btn_text` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('Sponsor','Benefit') COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertise_with_us`
--

INSERT INTO `advertise_with_us` (`id`, `title`, `img`, `description`, `btn_text`, `type`, `updated_at`) VALUES
(410, 'Content Sponsorship', '1608260757.png', '                                                                                                                                                                                                                                                                                                                                                                                                 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       ', 'contact us to advertise', 'Sponsor', '2021-07-26 09:55:26'),
(409, ' Premium Listing', '1608260770.png', '                                                                                                                                                                                                                                                                                                                                                                                                 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.                                                                                                                                                                                                                                                                                                                                                                                   ', 'contact us to advertise', 'Sponsor', '2021-07-26 09:55:26'),
(417, 'More online presence', '1608260847.png', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus id felis odio. Vestibulum id ligula vitae enim.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      ', '', 'Benefit', '2021-07-26 09:55:26'),
(418, 'Verified Process', '1607053999.png', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus id felis odio. Vestibulum id ligula vitae enim.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       ', '', 'Benefit', '2021-07-26 09:55:26'),
(419, 'Event Planning', '1607054012.png', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus id felis odio. Vestibulum id ligula vitae enim.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ', '', 'Benefit', '2021-07-26 09:55:26'),
(407, 'Content Sponsorship', '1607058418.png', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      ', 'contact us to advertise', 'Sponsor', '2021-07-26 09:55:26'),
(408, ' Premium Listing', '1607058473.png', '                                                                                                                                                                                                                                                                                                                                                                                                 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.                                                                                                                                                                                                                                                                                                                                                                                   ', 'contact us to advertise', 'Sponsor', '2021-07-26 09:55:26'),
(414, 'Direct to client', '1607053813.png', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus id felis odio. Vestibulum id ligula vitae enim.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               ', '', 'Benefit', '2021-07-26 09:55:26'),
(415, 'Project Management', '1607053869.png', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus id felis odio. Vestibulum id ligula vitae enim.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               ', '', 'Benefit', '2021-07-26 09:55:26'),
(416, 'Benefits from suppliers', '1607053914.png', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus id felis odio. Vestibulum id ligula vitae enim.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  ', '', 'Benefit', '2021-07-26 09:55:26'),
(413, 'Community Management', '1606495790.png', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus id felis odio. Vestibulum id ligula vitae enim.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 ', '', 'Benefit', '2021-07-26 09:55:26'),
(411, 'Target Audience ', '1607053670.png', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus id felis odio. Vestibulum id ligula vitae enim.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ', '', 'Benefit', '2021-07-26 09:55:26'),
(412, 'Data Analytics', '1607053720.png', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus id felis odio. Vestibulum id ligula vitae enim.m.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               ', '', 'Benefit', '2021-07-26 09:55:26');

-- --------------------------------------------------------

--
-- Table structure for table `advertisings`
--

CREATE TABLE `advertisings` (
  `id` int(10) UNSIGNED NOT NULL,
  `advertising_plan_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisings`
--

INSERT INTO `advertisings` (`id`, `advertising_plan_id`, `user_id`, `photo`, `link`, `start_date`, `end_date`, `is_active`, `created_by`, `updated_by`, `company_name`, `address`, `phone`, `email`, `priority`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '1643617467.png', NULL, '2022-01-31', '2022-05-11', '1', 1, 1, 'M-SQUARE Construction & Decoration Co., Ltd', NULL, '09256999918', 'admin@msquaremyanmar.com', 1, '2022-01-31 07:55:51', '2022-01-31 07:55:51'),
(2, 1, 1, '1643617763.png', NULL, '2022-01-31', '2022-05-11', '1', 1, 1, 'Handcraft Myanmar Co., Ltd', NULL, '09426999918', 'sale@handcraftmyanmar.com', 2, '2022-01-31 07:59:27', '2022-01-31 07:59:27'),
(3, 1, 1, '1643618228.png', NULL, '2022-01-31', '2022-05-11', '1', 1, 1, 'Proart Construction & Decoration Co., Ltd', NULL, '09978 606262', NULL, 3, '2022-01-31 08:07:10', '2022-01-31 08:07:10');

-- --------------------------------------------------------

--
-- Table structure for table `advertising_plans`
--

CREATE TABLE `advertising_plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `currency_unit_id` int(11) NOT NULL,
  `plan_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `periods` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `update_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertising_plans`
--

INSERT INTO `advertising_plans` (`id`, `price`, `currency_unit_id`, `plan_name`, `is_active`, `periods`, `created_by`, `update_by`, `created_at`, `updated_at`) VALUES
(1, '200000.00', 1, 'Home Slider Bar', '1', 100, 1, 1, '2020-09-30 22:21:22', '2020-10-21 14:01:10'),
(2, '100000.00', 1, 'List Page Advertising', '1', 20, 1, 1, '2020-11-15 22:21:22', '2020-12-10 06:21:20'),
(3, '50000.00', 2, 'Detail Page Advertising', '1', 35, 1, 1, '2020-09-30 22:21:22', '2021-11-02 02:51:08');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_user_id` int(11) NOT NULL,
  `approved_user_id` int(11) DEFAULT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_url` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_category_id` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `post_user_id`, `approved_user_id`, `is_active`, `title`, `blog_url`, `image`, `blog_category_id`, `description`, `deleted`, `created_at`, `updated_at`) VALUES
(2, 1, 1, '1', 'ယူကရိန်းအရေးနှင့်စပ်လျဉ်း၍ အမေရိကန်နှင့် တရုတ်တို့ ကုလသမဂ္ဂလုံခြုံရေးကောင်စီတွင် သဘောထားကွဲလွဲ', 'ယူကရိန်းအရေးနှင့်စပ်လျဉ်း၍-အမေရိကန်နှင့်-တရုတ်တို့-ကုလသမဂ္ဂလုံခြုံရေးကောင်စီတွင်-သဘောထားကွဲလွဲ', '1644586013.png', '4', '<p>The Daily Eleven Newspaper - Cartoon of the Day (24 - Feb - 2020)</p>\n', '0', '2022-02-11 12:56:56', '2022-04-29 04:15:44'),
(3, 1, 1, '1', 'Sniffers များအကြောင်း', 'sniffers-များအကြောင်း', '1651207401.png', '65', '<p>&aacute;&#128;&#128;&aacute;&#128;&raquo;&aacute;&#128;&#148;&aacute;&#128;&plusmn;&aacute;&#128;&not;&aacute;&#128;&ordm; Steel Structure &aacute;&#128;&#148;&aacute;&#128;&sup2;&aacute;&#128;&middot;&aacute;&#128;&#134;&aacute;&#128;&plusmn;&aacute;&#128;&not;&aacute;&#128;&#128;&aacute;&#128;&ordm;&aacute;&#128;&#145;&aacute;&#128;&not;&aacute;&#128;&cedil;&aacute;&#128;&#144;&aacute;&#128;&sup2;&aacute;&#128;&middot;&aacute;&#128;&iexcl;&aacute;&#128;&#134;&aacute;&#128;&plusmn;&aacute;&#128;&not;&aacute;&#128;&#128;&aacute;&#128;&ordm;&aacute;&#128;&iexcl;&aacute;&#128;&yen;&aacute;&#128;&reg;&aacute;&#128;&cedil;&aacute;&#128;&#144;&aacute;&#128;&frac12;&aacute;&#128;&plusmn;&aacute;&#128;&#155;&aacute;&#128;&plusmn;&aacute;&#128;&not;&aacute;&#128;&#128;&aacute;&#128;&ordm;&aacute;&#128;&#155;&aacute;&#128;&#132;&aacute;&#128;&ordm; &aacute;&#128;&#158;&aacute;&#128;&#144;&aacute;&#128;&shy;&aacute;&#128;&#145;&aacute;&#128;&not;&aacute;&#128;&cedil;&aacute;&#128;&#153;&aacute;&#128;&shy;&aacute;&#128;&#144;&aacute;&#128;&not;&aacute;&#128;&#144;&aacute;&#128;&#133;&aacute;&#128;&ordm;&aacute;&#128;&#129;&aacute;&#128;&macr;&aacute;&#128;&#155;&aacute;&#128;&frac34;&aacute;&#128;&shy;&aacute;&#128;&#149;&aacute;&#128;&laquo;&aacute;&#128;&#144;&aacute;&#128;&#154;&aacute;&#128;&ordm;&aacute;&#129;&#139; Beam &aacute;&#128;&#144;&aacute;&#128;&frac12;&aacute;&#128;&plusmn; &aacute;&#129;&#138; Girder &aacute;&#128;&#144;&aacute;&#128;&frac12;&aacute;&#128;&plusmn;&aacute;&#128;&#153;&aacute;&#128;&frac34;&aacute;&#128;&not;&aacute;&#128;&iexcl;&aacute;&#128;&#153;&aacute;&#128;&frac14;&aacute;&#128;&sup2;&aacute;&#128;&#144;&aacute;&#128;&#153;&aacute;&#128;&ordm;&aacute;&#128;&cedil;&aacute;&#128;&#156;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&#156;&aacute;&#128;&shy;&aacute;&#128;&macr; Traverse Stiffener &aacute;&#128;&#156;&aacute;&#128;&plusmn;&aacute;&#128;&cedil;&aacute;&#128;&#144;&aacute;&#128;&frac12;&aacute;&#128;&plusmn;&aacute;&#128;&#149;&aacute;&#128;&laquo;&aacute;&#128;&#144;&aacute;&#128;&#144;&aacute;&#128;&ordm;&aacute;&#128;&#144;&aacute;&#128;&not;&aacute;&#128;&#128;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&#149;&aacute;&#128;&laquo;&aacute;&#129;&#139;\r<p>Stiffeners &aacute;&#128;&#134;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&#144;&aacute;&#128;&not;&aacute;&#128;&#128; Beam &aacute;&#128;&#128;&aacute;&#128;&shy;&aacute;&#128;&macr; &aacute;&#128;&iexcl;&aacute;&#128;&#156;&aacute;&#128;&raquo;&aacute;&#128;&not;&aacute;&#128;&cedil;&aacute;&#128;&#156;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&#128;&aacute;&#128;&ordm;&aacute;&#128;&#150;&aacute;&#128;&frac14;&aacute;&#128;&#133;&aacute;&#128;&ordm;&aacute;&#128;&#133;&aacute;&#128;&plusmn; &aacute;&#129;&#138;&aacute;&#128;&#146;&aacute;&#128;&plusmn;&aacute;&#128;&laquo;&aacute;&#128;&#132;&aacute;&#128;&ordm;&aacute;&#128;&#156;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&#128;&aacute;&#128;&ordm;&aacute;&#128;&#150;&aacute;&#128;&frac14;&aacute;&#128;&#133;&aacute;&#128;&ordm;&aacute;&#128;&#133;&aacute;&#128;&plusmn; Steel Plate &aacute;&#128;&#156;&aacute;&#128;&plusmn;&aacute;&#128;&cedil;&aacute;&#128;&#144;&aacute;&#128;&frac12;&aacute;&#128;&plusmn;&aacute;&#128;&#128;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&#150;&aacute;&#128;&frac14;&aacute;&#128;&#144;&aacute;&#128;&ordm;&aacute;&#128;&#149;&aacute;&#128;&frac14;&aacute;&#128;&reg;&aacute;&#128;&cedil; Welding &aacute;&#128;&#134;&aacute;&#128;&plusmn;&aacute;&#128;&not;&aacute;&#128;&ordm;&aacute;&#128;&#149;&aacute;&#128;&plusmn;&aacute;&#128;&cedil;&aacute;&#128;&#144;&aacute;&#128;&not;&aacute;&#128;&#149;&aacute;&#128;&laquo;&aacute;&#128;&#149;&aacute;&#128;&sup2;&aacute;&#129;&#139; &aacute;&#128;&#146;&aacute;&#128;&plusmn;&aacute;&#128;&laquo;&aacute;&#128;&#132;&aacute;&#128;&ordm;&aacute;&#128;&#156;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&#128;&aacute;&#128;&ordm;&aacute;&#128;&#145;&aacute;&#128;&#138;&aacute;&#128;&ordm;&aacute;&#128;&middot;&aacute;&#128;&#155;&aacute;&#128;&#132;&aacute;&#128;&ordm; Traverse Stiffeners &aacute;&#128;&#156;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&middot;&aacute;&#128;&#129;&aacute;&#128;&plusmn;&aacute;&#128;&laquo;&aacute;&#128;&ordm;&aacute;&#128;&#149;&aacute;&#128;&frac14;&aacute;&#128;&reg;&aacute;&#128;&cedil; &aacute;&#128;&iexcl;&aacute;&#128;&#156;&aacute;&#128;&raquo;&aacute;&#128;&not;&aacute;&#128;&cedil;&aacute;&#128;&#156;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&#128;&aacute;&#128;&ordm;&aacute;&#128;&#145;&aacute;&#128;&#138;&aacute;&#128;&ordm;&aacute;&#128;&middot;&aacute;&#128;&#155;&aacute;&#128;&#132;&aacute;&#128;&ordm;&aacute;&#128;&#144;&aacute;&#128;&plusmn;&aacute;&#128;&not;&aacute;&#128;&middot; Longitudinal Stiffeners &aacute;&#128;&#156;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&middot;&aacute;&#128;&#129;&aacute;&#128;&plusmn;&aacute;&#128;&laquo;&aacute;&#128;&ordm;&aacute;&#128;&#149;&aacute;&#128;&laquo;&aacute;&#128;&#144;&aacute;&#128;&#154;&aacute;&#128;&ordm;&aacute;&#129;&#139; \r</p><p>&aacute;&#128;&#146;&aacute;&#128;&laquo;&aacute;&#128;&#149;&aacute;&#128;&plusmn;&aacute;&#128;&#153;&aacute;&#128;&#154;&aacute;&#128;&ordm;&aacute;&#128;&middot; &aacute;&#128;&#144;&aacute;&#128;&frac12;&aacute;&#128;&plusmn;&aacute;&#128;&middot;&aacute;&#128;&#158;&aacute;&#128;&#153;&aacute;&#128;&raquo;&aacute;&#128;&frac34; Beam Girder &aacute;&#128;&#144;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&#132;&aacute;&#128;&ordm;&aacute;&#128;&cedil;&aacute;&#128;&#128;&aacute;&#128;&shy;&aacute;&#128;&macr; Stiffeners &aacute;&#128;&#144;&aacute;&#128;&frac12;&aacute;&#128;&plusmn;&aacute;&#128;&#145;&aacute;&#128;&#138;&aacute;&#128;&ordm;&aacute;&#128;&middot;&aacute;&#128;&#133;&aacute;&#128;&#155;&aacute;&#128;&not;&aacute;&#128;&#153;&aacute;&#128;&#156;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&#149;&aacute;&#128;&laquo;&aacute;&#128;&#150;&aacute;&#128;&deg;&aacute;&#128;&cedil;... &aacute;&#128;&#149;&aacute;&#128;&macr;&aacute;&#128;&para;&aacute;&#128;&#153;&aacute;&#128;&frac34;&aacute;&#128;&#148;&aacute;&#128;&ordm;&aacute;&#128;&#145;&aacute;&#128;&#138;&aacute;&#128;&ordm;&aacute;&#128;&middot;&aacute;&#128;&#148;&aacute;&#128;&plusmn;&aacute;&#128;&#128;&aacute;&#128;&raquo;&aacute;&#128;&#128;&aacute;&#128;&#144;&aacute;&#128;&plusmn;&aacute;&#128;&not;&aacute;&#128;&middot; \r</p><p>1. Connection\r</p><p>2. Concentrated Load \r</p><p>3. Build Up Member &aacute;&#128;&#144;&aacute;&#128;&frac12;&aacute;&#128;&plusmn; (&aacute;&#128;&#158;&aacute;&#128;&para;&aacute;&#128;&#149;&aacute;&#128;&frac14;&aacute;&#128;&not;&aacute;&#128;&cedil;&aacute;&#128;&#128;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&#134;&aacute;&#128;&#128;&aacute;&#128;&ordm;&aacute;&#128;&#149;&aacute;&#128;&frac14;&aacute;&#128;&reg;&aacute;&#128;&cedil; I &aacute;&#128;&#149;&aacute;&#128;&macr;&aacute;&#128;&para;&aacute;&#128;&#133;&aacute;&#128;&para;&aacute;&#128;&#150;&aacute;&#128;&frac14;&aacute;&#128;&#133;&aacute;&#128;&ordm;&aacute;&#128;&iexcl;&aacute;&#128;&plusmn;&aacute;&#128;&not;&aacute;&#128;&#132;&aacute;&#128;&ordm;&aacute;&#128;&#156;&aacute;&#128;&macr;&aacute;&#128;&#149;&aacute;&#128;&ordm;&aacute;&#128;&#144;&aacute;&#128;&sup2;&aacute;&#128;&middot; Member)  &aacute;&#128;&#153;&aacute;&#128;&frac34;&aacute;&#128;&not;&aacute;&#128;&#145;&aacute;&#128;&#138;&aacute;&#128;&ordm;&aacute;&#128;&middot;&aacute;&#128;&#128;&aacute;&#128;&frac14;&aacute;&#128;&#149;&aacute;&#128;&laquo;&aacute;&#128;&#144;&aacute;&#128;&#154;&aacute;&#128;&ordm;&aacute;&#129;&#139; \r</p><p>&aacute;&#128;&iexcl;&aacute;&#128;&#129;&aacute;&#128;&macr;&aacute;&#128;&#128;&aacute;&#128;&#144;&aacute;&#128;&plusmn;&aacute;&#128;&not;&aacute;&#128;&middot; &aacute;&#128;&#155;&aacute;&#128;&frac34;&aacute;&#128;&shy;&aacute;&#128;&#158;&aacute;&#128;&#153;&aacute;&#128;&raquo;&aacute;&#128;&frac34; Girder &aacute;&#129;&#138; Beam &aacute;&#128;&#144;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&#132;&aacute;&#128;&ordm;&aacute;&#128;&cedil;&aacute;&#128;&#128;&aacute;&#128;&shy;&aacute;&#128;&macr; &aacute;&#128;&#145;&aacute;&#128;&#138;&aacute;&#128;&ordm;&aacute;&#128;&middot;&aacute;&#128;&#148;&aacute;&#128;&plusmn;&aacute;&#128;&#144;&aacute;&#128;&not;&aacute;&#128;&#144;&aacute;&#128;&frac12;&aacute;&#128;&plusmn;&aacute;&#128;&middot;&aacute;&#128;&#155;&aacute;&#128;&#149;&aacute;&#128;&laquo;&aacute;&#128;&#144;&aacute;&#128;&#154;&aacute;&#128;&ordm;&aacute;&#129;&#139; &aacute;&#128;&#159;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&iexcl;&aacute;&#128;&#155;&aacute;&#128;&#132;&aacute;&#128;&ordm;&aacute;&#128;&#128;&aacute;&#128;&#144;&aacute;&#128;&#138;&aacute;&#128;&ordm;&aacute;&#128;&cedil;&aacute;&#128;&#128; &aacute;&#128;&#146;&aacute;&#128;&reg;&aacute;&#128;&iexcl;&aacute;&#128;&#128;&aacute;&#128;&frac14;&aacute;&#128;&plusmn;&aacute;&#128;&not;&aacute;&#128;&#132;&aacute;&#128;&ordm;&aacute;&#128;&cedil;&aacute;&#128;&#149;&aacute;&#128;&frac14;&aacute;&#128;&plusmn;&aacute;&#128;&not;&aacute;&#128;&#129;&aacute;&#128;&raquo;&aacute;&#128;&#132;&aacute;&#128;&ordm;&aacute;&#128;&#149;&aacute;&#128;&plusmn;&aacute;&#128;&#153;&aacute;&#128;&#154;&aacute;&#128;&ordm;&aacute;&#128;&middot;&aacute;&#128;&#156;&aacute;&#128;&sup2; &aacute;&#128;&#145;&aacute;&#128;&#138;&aacute;&#128;&ordm;&aacute;&#128;&middot;&aacute;&#128;&#156;&aacute;&#128;&#138;&aacute;&#128;&ordm;&aacute;&#128;&cedil;&aacute;&#128;&#128;&aacute;&#128;&raquo;&aacute;&#128;&#148;&aacute;&#128;&plusmn;&aacute;&#128;&not;&aacute;&#128;&ordm; Structure &aacute;&#128;&#153;&aacute;&#128;&frac34;&aacute;&#128;&not;&aacute;&#128;&#145;&aacute;&#128;&shy;&aacute;&#128;&#129;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&#128;&aacute;&#128;&ordm;&aacute;&#128;&#153;&aacute;&#128;&frac34;&aacute;&#128;&macr;&aacute;&#128;&#153;&aacute;&#128;&#155;&aacute;&#128;&frac34;&aacute;&#128;&shy;&aacute;&#128;&#144;&aacute;&#128;&not;&aacute;&#128;&#153;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&middot; &aacute;&#128;&#128;&aacute;&#128;&raquo;&aacute;&#128;&#148;&aacute;&#128;&plusmn;&aacute;&#128;&not;&aacute;&#128;&ordm;&aacute;&#128;&#153;&aacute;&#128;&#149;&aacute;&#128;&frac14;&aacute;&#128;&plusmn;&aacute;&#128;&not;&aacute;&#128;&#129;&aacute;&#128;&sup2;&aacute;&#128;&middot;&aacute;&#128;&#144;&aacute;&#128;&not;&aacute;&#128;&#149;&aacute;&#128;&laquo;&aacute;&#129;&#139; &aacute;&#128;&#146;&aacute;&#128;&laquo;&aacute;&#128;&#149;&aacute;&#128;&plusmn;&aacute;&#128;&#153;&aacute;&#128;&#154;&aacute;&#128;&ordm;&aacute;&#128;&middot; &aacute;&#128;&#144;&aacute;&#128;&#150;&aacute;&#128;&#128;&aacute;&#128;&ordm;&aacute;&#128;&#128;&aacute;&#128;&#149;&aacute;&#128;&frac14;&aacute;&#128;&#148;&aacute;&#128;&ordm;&aacute;&#128;&#133;&aacute;&#128;&yen;&aacute;&#128;&ordm;&aacute;&#128;&cedil;&aacute;&#128;&#133;&aacute;&#128;&not;&aacute;&#128;&cedil;&aacute;&#128;&#144;&aacute;&#128;&plusmn;&aacute;&#128;&not;&aacute;&#128;&middot; &aacute;&#128;&#153;&aacute;&#128;&#156;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&iexcl;&aacute;&#128;&#149;&aacute;&#128;&ordm;&aacute;&#128;&#149;&aacute;&#128;&sup2; &aacute;&#128;&iexcl;&aacute;&#128;&#149;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&#158;&aacute;&#128;&macr;&aacute;&#128;&para;&aacute;&#128;&cedil;&aacute;&#128;&#158;&aacute;&#128;&#156;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&#150;&aacute;&#128;&frac14;&aacute;&#128;&#133;&aacute;&#128;&ordm;&aacute;&#128;&#148;&aacute;&#128;&plusmn;&aacute;&#128;&#144;&aacute;&#128;&not;&aacute;&#128;&#149;&aacute;&#128;&laquo;&aacute;&#129;&#139; &aacute;&#128;&#156;&aacute;&#128;&plusmn;&aacute;&#128;&cedil;&aacute;&#128;&#156;&aacute;&#128;&plusmn;&aacute;&#128;&cedil;&aacute;&#128;&#148;&aacute;&#128;&#128;&aacute;&#128;&ordm;&aacute;&#128;&#148;&aacute;&#128;&#128;&aacute;&#128;&ordm;&aacute;&#128;&#145;&aacute;&#128;&#149;&aacute;&#128;&ordm;&aacute;&#128;&#144;&aacute;&#128;&frac12;&aacute;&#128;&plusmn;&aacute;&#128;&cedil;&aacute;&#128;&#155;&aacute;&#128;&#132;&aacute;&#128;&ordm; &aacute;&#128;&#144;&aacute;&#128;&#133;&aacute;&#128;&ordm;&aacute;&#128;&#148;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&#132;&aacute;&#128;&ordm;&aacute;&#128;&#132;&aacute;&#128;&para;&aacute;&#128;&#156;&aacute;&#128;&macr;&aacute;&#128;&para;&aacute;&#128;&cedil;&aacute;&#128;&#133;&aacute;&#128;&not; &aacute;&#128;&#152;&aacute;&#128;&#154;&aacute;&#128;&ordm;&aacute;&#128;&#156;&aacute;&#128;&plusmn;&aacute;&#128;&not;&aacute;&#128;&#128;&aacute;&#128;&ordm;&aacute;&#128;&#128;&aacute;&#128;&macr;&aacute;&#128;&#148;&aacute;&#128;&ordm;&aacute;&#128;&#158;&aacute;&#128;&frac12;&aacute;&#128;&not;&aacute;&#128;&cedil;&aacute;&#128;&#153;&aacute;&#128;&#156;&aacute;&#128;&sup2;...  &aacute;&#128;&#146;&aacute;&#128;&laquo;&aacute;&#128;&#159;&aacute;&#128;&not;&aacute;&#128;&#128;&aacute;&#128;&raquo;&aacute;&#128;&#148;&aacute;&#128;&plusmn;&aacute;&#128;&not;&aacute;&#128;&ordm;&aacute;&#128;&#144;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&middot;&aacute;&#128;&#148;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&#132;&aacute;&#128;&ordm;&aacute;&#128;&#132;&aacute;&#128;&para;&aacute;&#128;&iexcl;&aacute;&#128;&#144;&aacute;&#128;&frac12;&aacute;&#128;&#128;&aacute;&#128;&ordm; &aacute;&#128;&iexcl;&aacute;&#128;&#149;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&#128;&aacute;&#128;&macr;&aacute;&#128;&#148;&aacute;&#128;&ordm;&aacute;&#128;&#128;&aacute;&#128;&raquo;&aacute;&#128;&#133;&aacute;&#128;&#155;&aacute;&#128;&shy;&aacute;&#128;&#144;&aacute;&#128;&ordm;&aacute;&#128;&#128;&aacute;&#128;&frac14;&aacute;&#128;&reg;&aacute;&#128;&cedil;&aacute;&#128;&#150;&aacute;&#128;&frac14;&aacute;&#128;&#133;&aacute;&#128;&ordm;&aacute;&#128;&#158;&aacute;&#128;&frac12;&aacute;&#128;&not;&aacute;&#128;&cedil;&aacute;&#128;&#149;&aacute;&#128;&laquo;&aacute;&#128;&#153;&aacute;&#128;&#154;&aacute;&#128;&ordm;&aacute;&#129;&#139;\r</p><p>AISC-LRFD &aacute;&#128;&#153;&aacute;&#128;&frac34;&aacute;&#128;&not;&aacute;&#128;&#144;&aacute;&#128;&plusmn;&aacute;&#128;&not;&aacute;&#128;&middot; Traverse stiffeners &aacute;&#128;&#145;&aacute;&#128;&#138;&aacute;&#128;&ordm;&aacute;&#128;&middot;&aacute;&#128;&#150;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&middot;&aacute;&#128;&#128;&aacute;&#128;&shy;&aacute;&#128;&macr; Beam Height (h) &aacute;&#128;&#148;&aacute;&#128;&sup2;&aacute;&#128;&middot; Thickness of Web (tw) &aacute;&#128;&#155;&aacute;&#128;&sup2;&aacute;&#128;&middot;&aacute;&#128;&iexcl;&aacute;&#128;&#129;&aacute;&#128;&raquo;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&cedil;&aacute;&#128;&#156;&aacute;&#128;&plusmn;&aacute;&#128;&cedil;&aacute;&#128;&#148;&aacute;&#128;&sup2;&aacute;&#128;&middot;&aacute;&#128;&#149;&aacute;&#128;&plusmn;&aacute;&#128;&cedil;&aacute;&#128;&#149;&aacute;&#128;&laquo;&aacute;&#128;&#144;&aacute;&#128;&#154;&aacute;&#128;&ordm;&aacute;&#129;&#139; Beam &aacute;&#128;&#155;&aacute;&#128;&sup2;&aacute;&#128;&middot; Height &aacute;&#128;&#128;&aacute;&#128;&shy;&aacute;&#128;&macr; Web (I beam &aacute;&#128;&#155;&aacute;&#128;&sup2;&aacute;&#128;&middot; &aacute;&#128;&#146;&aacute;&#128;&plusmn;&aacute;&#128;&laquo;&aacute;&#128;&#132;&aacute;&#128;&ordm;&aacute;&#128;&#156;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&#128;&aacute;&#128;&ordm;&aacute;&#128;&#155;&aacute;&#128;&frac34;&aacute;&#128;&shy;&aacute;&#128;&#144;&aacute;&#128;&sup2;&aacute;&#128;&middot;&aacute;&#128;&iexcl;&aacute;&#128;&#149;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&#132;&aacute;&#128;&ordm;&aacute;&#128;&cedil;) &aacute;&#128;&#155;&aacute;&#128;&sup2;&aacute;&#128;&middot;&aacute;&#128;&iexcl;&aacute;&#128;&#145;&aacute;&#128;&deg;&aacute;&#128;&#148;&aacute;&#128;&sup2;&aacute;&#128;&middot;&aacute;&#128;&#133;&aacute;&#128;&not;&aacute;&#128;&cedil;&aacute;&#128;&#156;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&#128;&aacute;&#128;&ordm;&aacute;&#128;&#156;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&middot; 260 &aacute;&#128;&#153;&aacute;&#128;&#128;&aacute;&#128;&raquo;&aacute;&#128;&plusmn;&aacute;&#128;&not;&aacute;&#128;&ordm;&aacute;&#128;&#158;&aacute;&#128;&#132;&aacute;&#128;&ordm;&aacute;&#128;&middot;&aacute;&#128;&#150;&aacute;&#128;&deg;&aacute;&#128;&cedil;&aacute;&#128;&#156;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&middot;&aacute;&#128;&#149;&aacute;&#128;&frac14;&aacute;&#128;&plusmn;&aacute;&#128;&not;&aacute;&#128;&#149;&aacute;&#128;&laquo;&aacute;&#128;&#144;&aacute;&#128;&#154;&aacute;&#128;&ordm;&aacute;&#129;&#139;\r</p><p>&aacute;&#128;&#156;&aacute;&#128;&frac12;&aacute;&#128;&#154;&aacute;&#128;&ordm;&aacute;&#128;&#156;&aacute;&#128;&frac12;&aacute;&#128;&#154;&aacute;&#128;&ordm;&aacute;&#128;&#149;&aacute;&#128;&frac14;&aacute;&#128;&plusmn;&aacute;&#128;&not;&aacute;&#128;&#155;&aacute;&#128;&#155;&aacute;&#128;&#132;&aacute;&#128;&ordm; Thickness of Web &aacute;&#128;&#159;&aacute;&#128;&not; 5 mm &aacute;&#128;&#156;&aacute;&#128;&plusmn;&aacute;&#128;&not;&aacute;&#128;&#128;&aacute;&#128;&ordm;&aacute;&#128;&iexcl;&aacute;&#128;&#148;&aacute;&#128;&#138;&aacute;&#128;&ordm;&aacute;&#128;&cedil;&aacute;&#128;&#134;&aacute;&#128;&macr;&aacute;&#128;&para;&aacute;&#128;&cedil;&aacute;&#128;&#156;&aacute;&#128;&not;&aacute;&#128;&#144;&aacute;&#128;&#144;&aacute;&#128;&ordm;&aacute;&#128;&#149;&aacute;&#128;&laquo;&aacute;&#128;&#144;&aacute;&#128;&#154;&aacute;&#128;&ordm;&aacute;&#129;&#139; &aacute;&#128;&#146;&aacute;&#128;&reg;&aacute;&#128;&#144;&aacute;&#128;&plusmn;&aacute;&#128;&not;&aacute;&#128;&middot; 260x5 =1300 mm &aacute;&#128;&#155;&aacute;&#128;&frac34;&aacute;&#128;&shy;&aacute;&#128;&#144;&aacute;&#128;&sup2;&aacute;&#128;&middot; Beam Depth &aacute;&#128;&#145;&aacute;&#128;&#128;&aacute;&#128;&ordm;&aacute;&#128;&#128;&aacute;&#128;&raquo;&aacute;&#128;&plusmn;&aacute;&#128;&not;&aacute;&#128;&ordm;&aacute;&#128;&#153;&aacute;&#128;&frac34;&aacute;&#128;&#158;&aacute;&#128;&not; Traverse Stiffeners &aacute;&#128;&#156;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&iexcl;&aacute;&#128;&#149;&aacute;&#128;&ordm;&aacute;&#128;&#153;&aacute;&#128;&#154;&aacute;&#128;&ordm;&aacute;&#128;&#156;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&middot; &aacute;&#128;&#153;&aacute;&#128;&frac14;&aacute;&#128;&#148;&aacute;&#128;&ordm;&aacute;&#128;&#153;&aacute;&#128;&frac14;&aacute;&#128;&#148;&aacute;&#128;&ordm;&aacute;&#128;&#144;&aacute;&#128;&frac12;&aacute;&#128;&#128;&aacute;&#128;&ordm;&aacute;&#128;&#156;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&#128;&aacute;&#128;&ordm;&aacute;&#128;&#156;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&middot;&aacute;&#128;&#155;&aacute;&#128;&#149;&aacute;&#128;&laquo;&aacute;&#128;&#144;&aacute;&#128;&#154;&aacute;&#128;&ordm;&aacute;&#129;&#139; &aacute;&#128;&#146;&aacute;&#128;&reg;&aacute;&#128;&#144;&aacute;&#128;&plusmn;&aacute;&#128;&not;&aacute;&#128;&middot; Build up&aacute;&#128;&#156;&aacute;&#128;&macr;&aacute;&#128;&#149;&aacute;&#128;&ordm;&aacute;&#128;&#144;&aacute;&#128;&sup2;&aacute;&#128;&middot; Girder &aacute;&#128;&#144;&aacute;&#128;&frac12;&aacute;&#128;&plusmn;&aacute;&#128;&#153;&aacute;&#128;&frac34;&aacute;&#128;&not;&aacute;&#128;&#144;&aacute;&#128;&plusmn;&aacute;&#128;&not;&aacute;&#128;&middot;&aacute;&#128;&#156;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&iexcl;&aacute;&#128;&#149;&aacute;&#128;&ordm;&aacute;&#128;&#148;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&#132;&aacute;&#128;&ordm;&aacute;&#128;&#149;&aacute;&#128;&laquo;&aacute;&#128;&#144;&aacute;&#128;&#154;&aacute;&#128;&ordm;&aacute;&#129;&#139;\r</p><p>&aacute;&#128;&#128;&aacute;&#128;&raquo;&aacute;&#128;&#148;&aacute;&#128;&plusmn;&aacute;&#128;&not;&aacute;&#128;&ordm;&aacute;&#128;&#144;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&middot; Steel Structure Design &aacute;&#128;&#144;&aacute;&#128;&frac12;&aacute;&#128;&plusmn;&aacute;&#128;&#153;&aacute;&#128;&frac34;&aacute;&#128;&not;&aacute;&#128;&#144;&aacute;&#128;&plusmn;&aacute;&#128;&not;&aacute;&#128;&middot; Beam Traverse Stiffener &aacute;&#128;&#156;&aacute;&#128;&plusmn;&aacute;&#128;&cedil;&aacute;&#128;&#144;&aacute;&#128;&frac12;&aacute;&#128;&plusmn;&aacute;&#128;&#153;&aacute;&#128;&#156;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&#155;&aacute;&#128;&#132;&aacute;&#128;&ordm;&aacute;&#128;&#153;&aacute;&#128;&#145;&aacute;&#128;&#138;&aacute;&#128;&ordm;&aacute;&#128;&middot;&aacute;&#128;&#149;&aacute;&#128;&plusmn;&aacute;&#128;&cedil;&aacute;&#128;&#149;&aacute;&#128;&laquo;&aacute;&#128;&#129;&aacute;&#128;&#132;&aacute;&#128;&ordm;&aacute;&#128;&#151;&aacute;&#128;&raquo;&aacute;&#128;&not;...(&aacute;&#128;&#144;&aacute;&#128;&#129;&aacute;&#128;&raquo;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&middot;&aacute;&#128;&#128; &aacute;&#128;&#153;&aacute;&#128;&#149;&aacute;&#128;&laquo;&aacute;&#128;&#150;&aacute;&#128;&deg;&aacute;&#128;&cedil;&aacute;&#128;&#156;&aacute;&#128;&not;&aacute;&#128;&cedil;&aacute;&#128;&#153;&aacute;&#128;&plusmn;&aacute;&#128;&cedil;&aacute;&#128;&#144;&aacute;&#128;&#144;&aacute;&#128;&ordm;&aacute;&#128;&#156;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&middot;) .&aacute;&#128;&iexcl;&aacute;&#128;&#129;&aacute;&#128;&macr;&aacute;&#128;&#156;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&#128;&aacute;&#128;&not;&aacute;&#128;&#156;&aacute;&#128;&#153;&aacute;&#128;&frac34;&aacute;&#128;&not;&aacute;&#128;&#144;&aacute;&#128;&#144;&aacute;&#128;&ordm;&aacute;&#128;&#148;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&#132;&aacute;&#128;&ordm;&aacute;&#128;&#158;&aacute;&#128;&#156;&aacute;&#128;&plusmn;&aacute;&#128;&not;&aacute;&#128;&#128;&aacute;&#128;&ordm; &aacute;&#128;&#129;&aacute;&#128;&raquo;&aacute;&#128;&frac12;&aacute;&#128;&plusmn;&aacute;&#128;&#144;&aacute;&#128;&not;&aacute;&#128;&#149;&aacute;&#128;&laquo;&aacute;&#128;&#144;&aacute;&#128;&#154;&aacute;&#128;&ordm;&aacute;&#129;&#139; &aacute;&#128;&#153;&aacute;&#128;&#156;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&iexcl;&aacute;&#128;&#149;&aacute;&#128;&ordm;&aacute;&#128;&#149;&aacute;&#128;&sup2; &aacute;&#128;&#128;&aacute;&#128;&raquo;&aacute;&#128;&#148;&aacute;&#128;&plusmn;&aacute;&#128;&not;&aacute;&#128;&ordm;&aacute;&#128;&#144;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&middot;&aacute;&#128;&#152;&aacute;&#128;&#154;&aacute;&#128;&ordm;&aacute;&#128;&#156;&aacute;&#128;&plusmn;&aacute;&#128;&not;&aacute;&#128;&#128;&aacute;&#128;&ordm;&aacute;&#128;&#128;&aacute;&#128;&macr;&aacute;&#128;&#148;&aacute;&#128;&ordm;&aacute;&#128;&#128;&aacute;&#128;&raquo;&aacute;&#128;&#149;&aacute;&#128;&frac14;&aacute;&#128;&reg;&aacute;&#128;&cedil;&aacute;&#128;&#149;&aacute;&#128;&frac14;&aacute;&#128;&reg;&aacute;&#128;&cedil;&aacute;&#128;&#156;&aacute;&#128;&sup2;.\r</p><p>Crd - engr Kyaw Thu Naing\r</p><p>#stiffener #structure\r</p><p>#engineering #knowledge\r</p><p>#myanbox_knowledge</p></p>\n', '0', '2022-04-29 04:13:35', '2022-04-29 04:23:07'),
(4, 1, 1, '1', 'Edinburgh Castle', 'edinburgh-castle', '1651208092.png', '66', '<div>Edinburgh castle &aacute;&#128;&#128;&aacute;&#128;&#144;&aacute;&#128;&plusmn;&aacute;&#128;&not;&aacute;&#128;&middot; Scotland &aacute;&#128;&#155;&aacute;&#128;&sup2;&aacute;&#128;&middot;&aacute;&#128;&#145;&aacute;&#128;&#132;&aacute;&#128;&ordm;&aacute;&#128;&#155;&aacute;&#128;&frac34;&aacute;&#128;&not;&aacute;&#128;&cedil;&aacute;&#128;&#144;&aacute;&#128;&sup2;&aacute;&#128;&middot; landmark &aacute;&#128;&#144;&aacute;&#128;&#133;&aacute;&#128;&ordm;&aacute;&#128;&#129;&aacute;&#128;&macr;&aacute;&#128;&#150;&aacute;&#128;&frac14;&aacute;&#128;&#133;&aacute;&#128;&ordm;&aacute;&#128;&#149;&aacute;&#128;&frac14;&aacute;&#128;&reg;&aacute;&#128;&cedil; &aacute;&#128;&#153;&aacute;&#128;&frac14;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&middot;&aacute;&#128;&#144;&aacute;&#128;&plusmn;&aacute;&#128;&not;&aacute;&#128;&ordm; Edinburgh &aacute;&#128;&#153;&aacute;&#128;&frac34;&aacute;&#128;&not; &aacute;&#128;&#144;&aacute;&#128;&#138;&aacute;&#128;&ordm;&aacute;&#128;&#155;&aacute;&#128;&frac34;&aacute;&#128;&shy;&aacute;&#128;&#144;&aacute;&#128;&not;&aacute;&#128;&#150;&aacute;&#128;&frac14;&aacute;&#128;&#133;&aacute;&#128;&ordm;&aacute;&#128;&#149;&aacute;&#128;&laquo;&aacute;&#128;&#144;&aacute;&#128;&#154;&aacute;&#128;&ordm;&aacute;&#129;&#139; \r<div>&eth;&#159;&#143;&deg; &aacute;&#128;&#156;&aacute;&#128;&frac12;&aacute;&#128;&#148;&aacute;&#128;&ordm;&aacute;&#128;&#129;&aacute;&#128;&sup2;&aacute;&#128;&middot;&aacute;&#128;&#144;&aacute;&#128;&sup2;&aacute;&#128;&middot; &aacute;&#128;&#148;&aacute;&#128;&frac34;&aacute;&#128;&#133;&aacute;&#128;&ordm;&aacute;&#128;&#149;&aacute;&#128;&plusmn;&aacute;&#128;&laquo;&aacute;&#128;&#132;&aacute;&#128;&ordm;&aacute;&#128;&cedil;&aacute;&#128;&#153;&aacute;&#128;&raquo;&aacute;&#128;&not;&aacute;&#128;&cedil;&aacute;&#128;&#133;&aacute;&#128;&frac12;&aacute;&#128;&not;&aacute;&#128;&#144;&aacute;&#128;&macr;&aacute;&#128;&#148;&aacute;&#128;&ordm;&aacute;&#128;&cedil;&aacute;&#128;&#128; &aacute;&#128;&#153;&aacute;&#128;&reg;&aacute;&#128;&cedil;&aacute;&#128;&#144;&aacute;&#128;&plusmn;&aacute;&#128;&not;&aacute;&#128;&#132;&aacute;&#128;&ordm;&aacute;&#128;&#149;&aacute;&#128;&plusmn;&aacute;&#128;&laquo;&aacute;&#128;&#128;&aacute;&#128;&ordm;&aacute;&#128;&#128;&aacute;&#128;&frac12;&aacute;&#128;&sup2;&aacute;&#128;&#144;&aacute;&#128;&not;&aacute;&#128;&#128;&aacute;&#128;&frac14;&aacute;&#128;&plusmn;&aacute;&#128;&not;&aacute;&#128;&#132;&aacute;&#128;&ordm;&aacute;&#128;&middot; &aacute;&#128;&#150;&aacute;&#128;&frac14;&aacute;&#128;&#133;&aacute;&#128;&ordm;&aacute;&#128;&#149;&aacute;&#128;&plusmn;&aacute;&#128;&laquo;&aacute;&#128;&ordm;&aacute;&#128;&#156;&aacute;&#128;&not;&aacute;&#128;&#129;&aacute;&#128;&sup2;&aacute;&#128;&middot;&aacute;&#128;&#144;&aacute;&#128;&sup2;&aacute;&#128;&middot; castle rock (volcanic rock) &aacute;&#128;&#149;&aacute;&#128;&plusmn;&aacute;&#128;&laquo;&aacute;&#128;&ordm;&aacute;&#128;&#153;&aacute;&#128;&frac34;&aacute;&#128;&not; &aacute;&#128;&#144;&aacute;&#128;&#138;&aacute;&#128;&ordm;&aacute;&#128;&#134;&aacute;&#128;&plusmn;&aacute;&#128;&not;&aacute;&#128;&#128;&aacute;&#128;&ordm;&aacute;&#128;&#145;&aacute;&#128;&not;&aacute;&#128;&cedil;&aacute;&#128;&#144;&aacute;&#128;&not;&aacute;&#128;&#150;&aacute;&#128;&frac14;&aacute;&#128;&#133;&aacute;&#128;&ordm;&aacute;&#128;&#149;&aacute;&#128;&frac14;&aacute;&#128;&reg;&aacute;&#128;&cedil; &aacute;&#128;&#148;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&#132;&aacute;&#128;&ordm;&aacute;&#128;&#132;&aacute;&#128;&para;&aacute;&#128;&#128;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&#144;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&#128;&aacute;&#128;&ordm;&aacute;&#128;&#129;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&#128;&aacute;&#128;&ordm;&aacute;&#128;&#150;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&middot;&aacute;&#128;&iexcl;&aacute;&#128;&#144;&aacute;&#128;&frac12;&aacute;&#128;&#128;&aacute;&#128;&ordm; &aacute;&#128;&#156;&aacute;&#128;&not;&aacute;&#128;&#155;&aacute;&#128;&plusmn;&aacute;&#128;&not;&aacute;&#128;&#128;&aacute;&#128;&ordm;&aacute;&#128;&#144;&aacute;&#128;&sup2;&aacute;&#128;&middot;&aacute;&#128;&#155;&aacute;&#128;&#148;&aacute;&#128;&ordm;&aacute;&#128;&#158;&aacute;&#128;&deg;&aacute;&#128;&#144;&aacute;&#128;&frac12;&aacute;&#128;&plusmn;&aacute;&#128;&#128;&aacute;&#128;&shy;&aacute;&#128;&macr; &aacute;&#128;&iexcl;&aacute;&#128;&#149;&aacute;&#128;&plusmn;&aacute;&#128;&laquo;&aacute;&#128;&ordm;&aacute;&#128;&#133;&aacute;&#128;&reg;&aacute;&#128;&cedil;&aacute;&#128;&#128;&aacute;&#128;&#149;&aacute;&#128;&#133;&aacute;&#128;&ordm;&aacute;&#128;&#129;&aacute;&#128;&raquo;&aacute;&#128;&#155;&aacute;&#128;&#148;&aacute;&#128;&ordm; military base &aacute;&#128;&iexcl;&aacute;&#128;&#150;&aacute;&#128;&frac14;&aacute;&#128;&#133;&aacute;&#128;&ordm;&aacute;&#128;&iexcl;&aacute;&#128;&#158;&aacute;&#128;&macr;&aacute;&#128;&para;&aacute;&#128;&cedil;&aacute;&#128;&#149;&aacute;&#128;&frac14;&aacute;&#128;&macr;&aacute;&#128;&#129;&aacute;&#128;&sup2;&aacute;&#128;&middot;&aacute;&#128;&#149;&aacute;&#128;&laquo;&aacute;&#128;&#144;&aacute;&#128;&#154;&aacute;&#128;&ordm;&aacute;&#129;&#139; \r</div><div>&eth;&#159;&#143;&deg; &aacute;&#128;&#146;&aacute;&#128;&reg; castle &aacute;&#128;&#128;&aacute;&#128;&shy;&aacute;&#128;&macr; 12th Century &aacute;&#128;&#153;&aacute;&#128;&frac34;&aacute;&#128;&not; David I &aacute;&#128;&#149;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&#132;&aacute;&#128;&ordm;&aacute;&#128;&#134;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&#132;&aacute;&#128;&ordm;&aacute;&#128;&#129;&aacute;&#128;&sup2;&aacute;&#128;&middot;&aacute;&#128;&#144;&aacute;&#128;&not;&aacute;&#128;&#150;&aacute;&#128;&frac14;&aacute;&#128;&#133;&aacute;&#128;&ordm;&aacute;&#128;&#149;&aacute;&#128;&frac14;&aacute;&#128;&reg;&aacute;&#128;&cedil; 17th Century &aacute;&#128;&#153;&aacute;&#128;&#144;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&#132;&aacute;&#128;&ordm;&aacute;&#128;&#129;&aacute;&#128;&#132;&aacute;&#128;&ordm;&aacute;&#128;&iexcl;&aacute;&#128;&#145;&aacute;&#128;&shy; royal residence &aacute;&#128;&iexcl;&aacute;&#128;&#150;&aacute;&#128;&frac14;&aacute;&#128;&#133;&aacute;&#128;&ordm;&aacute;&#128;&iexcl;&aacute;&#128;&#158;&aacute;&#128;&macr;&aacute;&#128;&para;&aacute;&#128;&cedil;&aacute;&#128;&#149;&aacute;&#128;&frac14;&aacute;&#128;&macr;&aacute;&#128;&#129;&aacute;&#128;&sup2;&aacute;&#128;&middot;&aacute;&#128;&#149;&aacute;&#128;&laquo;&aacute;&#128;&#158;&aacute;&#128;&plusmn;&aacute;&#128;&cedil;&aacute;&#128;&#144;&aacute;&#128;&#154;&aacute;&#128;&ordm;&aacute;&#129;&#139; \r</div><div>&eth;&#159;&#143;&deg; &aacute;&#128;&#155;&aacute;&#128;&sup2;&aacute;&#128;&#144;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&#128;&aacute;&#128;&ordm;&aacute;&#128;&iexcl;&aacute;&#128;&#144;&aacute;&#128;&frac12;&aacute;&#128;&#132;&aacute;&#128;&ordm;&aacute;&#128;&cedil;&aacute;&#128;&#153;&aacute;&#128;&frac34;&aacute;&#128;&not;&aacute;&#128;&#144;&aacute;&#128;&plusmn;&aacute;&#128;&not;&aacute;&#128;&middot; &aacute;&#128;&#156;&aacute;&#128;&frac12;&aacute;&#128;&#148;&aacute;&#128;&ordm;&aacute;&#128;&#129;&aacute;&#128;&sup2;&aacute;&#128;&middot;&aacute;&#128;&#144;&aacute;&#128;&sup2;&aacute;&#128;&middot;&aacute;&#128;&#148;&aacute;&#128;&frac34;&aacute;&#128;&#133;&aacute;&#128;&ordm;&aacute;&#128;&#149;&aacute;&#128;&plusmn;&aacute;&#128;&laquo;&aacute;&#128;&#132;&aacute;&#128;&ordm;&aacute;&#128;&cedil;&aacute;&#128;&#153;&aacute;&#128;&raquo;&aacute;&#128;&not;&aacute;&#128;&cedil;&aacute;&#128;&#133;&aacute;&#128;&frac12;&aacute;&#128;&not;&aacute;&#128;&#128; &aacute;&#128;&#152;&aacute;&#128;&macr;&aacute;&#128;&#155;&aacute;&#128;&#132;&aacute;&#128;&ordm;&aacute;&#129;&#138; &aacute;&#128;&#153;&aacute;&#128;&#132;&aacute;&#128;&ordm;&aacute;&#128;&cedil;&aacute;&#128;&#138;&aacute;&#128;&reg;&aacute;&#128;&#153;&aacute;&#128;&#132;&aacute;&#128;&ordm;&aacute;&#128;&cedil;&aacute;&#128;&#158;&aacute;&#128;&not;&aacute;&#128;&cedil;&aacute;&#128;&#144;&aacute;&#128;&frac12;&aacute;&#128;&plusmn;&aacute;&#128;&#148;&aacute;&#128;&sup2;&aacute;&#128;&middot; &aacute;&#128;&#133;&aacute;&#128;&#133;&aacute;&#128;&ordm;&aacute;&#128;&#153;&aacute;&#128;&frac34;&aacute;&#128;&macr;&aacute;&#128;&#145;&aacute;&#128;&#153;&aacute;&#128;&ordm;&aacute;&#128;&cedil;&aacute;&#128;&#144;&aacute;&#128;&frac12;&aacute;&#128;&plusmn;&aacute;&#128;&#155;&aacute;&#128;&sup2;&aacute;&#128;&middot; &aacute;&#128;&#129;&aacute;&#128;&frac12;&aacute;&#128;&plusmn;&aacute;&#128;&cedil;&aacute;&#128;&#156;&aacute;&#128;&plusmn;&aacute;&#128;&cedil;&aacute;&#128;&#144;&aacute;&#128;&frac12;&aacute;&#128;&plusmn;&aacute;&#128;&iexcl;&aacute;&#128;&#144;&aacute;&#128;&frac12;&aacute;&#128;&#128;&aacute;&#128;&ordm; &aacute;&#128;&#158;&aacute;&#128;&#129;&aacute;&#128;&raquo;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&#132;&aacute;&#128;&ordm;&aacute;&#128;&cedil;&aacute;&#128;&#144;&aacute;&#128;&frac12;&aacute;&#128;&plusmn;&aacute;&#128;&#156;&aacute;&#128;&#138;&aacute;&#128;&ordm;&aacute;&#128;&cedil;&aacute;&#128;&#149;&aacute;&#128;&frac14;&aacute;&#128;&macr;&aacute;&#128;&#156;&aacute;&#128;&macr;&aacute;&#128;&#149;&aacute;&#128;&ordm;&aacute;&#128;&#149;&aacute;&#128;&plusmn;&aacute;&#128;&cedil;&aacute;&#128;&#145;&aacute;&#128;&not;&aacute;&#128;&cedil;&aacute;&#128;&#149;&aacute;&#128;&laquo;&aacute;&#128;&#144;&aacute;&#128;&#154;&aacute;&#128;&ordm;&aacute;&#129;&#139; \r</div><div>&eth;&#159;&#143;&deg; Scotland &aacute;&#128;&#155;&aacute;&#128;&sup2;&aacute;&#128;&middot; &aacute;&#128;&#158;&aacute;&#128;&#155;&aacute;&#128;&sup2;&aacute;&#128;&iexcl;&aacute;&#128;&#129;&aacute;&#128;&frac14;&aacute;&#128;&plusmn;&aacute;&#128;&not;&aacute;&#128;&#128;&aacute;&#128;&ordm;&aacute;&#128;&#134;&aacute;&#128;&macr;&aacute;&#128;&para;&aacute;&#128;&cedil;&aacute;&#128;&#148;&aacute;&#128;&plusmn;&aacute;&#128;&#155;&aacute;&#128;&not;&aacute;&#128;&#144;&aacute;&#128;&frac12;&aacute;&#128;&plusmn;&aacute;&#128;&#145;&aacute;&#128;&sup2;&aacute;&#128;&#128; &aacute;&#128;&#144;&aacute;&#128;&#133;&aacute;&#128;&ordm;&aacute;&#128;&#129;&aacute;&#128;&macr;&aacute;&#128;&#150;&aacute;&#128;&frac14;&aacute;&#128;&#133;&aacute;&#128;&ordm;&aacute;&#128;&#149;&aacute;&#128;&frac14;&aacute;&#128;&reg;&aacute;&#128;&cedil; &aacute;&#128;&iexcl;&aacute;&#128;&sup2;&aacute;&#128;&middot;&aacute;&#128;&#146;&aacute;&#128;&reg;&aacute;&#128;&#153;&aacute;&#128;&frac34;&aacute;&#128;&not;&aacute;&#128;&#155;&aacute;&#128;&frac34;&aacute;&#128;&shy;&aacute;&#128;&#144;&aacute;&#128;&sup2;&aacute;&#128;&middot; &aacute;&#128;&#158;&aacute;&#128;&#155;&aacute;&#128;&sup2;&aacute;&#128;&#144;&aacute;&#128;&frac12;&aacute;&#128;&plusmn;&aacute;&#128;&#128;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&#144;&aacute;&#128;&plusmn;&aacute;&#128;&not;&aacute;&#128;&middot; &aacute;&#128;&#158;&aacute;&#128;&deg;&aacute;&#128;&#144;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&middot;&aacute;&#128;&iexcl;&aacute;&#128;&#158;&aacute;&#128;&#128;&aacute;&#128;&ordm;&aacute;&#128;&#155;&aacute;&#128;&frac34;&aacute;&#128;&#132;&aacute;&#128;&ordm;&aacute;&#128;&#133;&aacute;&#128;&#137;&aacute;&#128;&ordm;&aacute;&#128;&#128; &aacute;&#128;&#148;&aacute;&#128;&plusmn;&aacute;&#128;&not;&aacute;&#128;&#128;&aacute;&#128;&ordm;&aacute;&#128;&#134;&aacute;&#128;&macr;&aacute;&#128;&para;&aacute;&#128;&cedil;&aacute;&#128;&#149;&aacute;&#128;&frac14;&aacute;&#128;&macr;&aacute;&#128;&#156;&aacute;&#128;&macr;&aacute;&#128;&#149;&aacute;&#128;&ordm;&aacute;&#128;&#129;&aacute;&#128;&sup2;&aacute;&#128;&middot;&aacute;&#128;&#144;&aacute;&#128;&not;&aacute;&#128;&#144;&aacute;&#128;&frac12;&aacute;&#128;&plusmn;&aacute;&#128;&#149;&aacute;&#128;&plusmn;&aacute;&#128;&laquo;&aacute;&#128;&ordm;&aacute;&#128;&#153;&aacute;&#128;&deg;&aacute;&#128;&#144;&aacute;&#128;&#138;&aacute;&#128;&ordm;&aacute;&#128;&#149;&aacute;&#128;&frac14;&aacute;&#128;&reg;&aacute;&#128;&cedil; &aacute;&#128;&#148;&aacute;&#128;&not;&aacute;&#128;&#153;&aacute;&#128;&#138;&aacute;&#128;&ordm;&aacute;&#128;&#144;&aacute;&#128;&frac12;&aacute;&#128;&plusmn;&aacute;&#128;&#149;&aacute;&#128;&plusmn;&aacute;&#128;&cedil;&aacute;&#128;&#145;&aacute;&#128;&not;&aacute;&#128;&cedil;&aacute;&#128;&#149;&aacute;&#128;&laquo;&aacute;&#128;&#144;&aacute;&#128;&#154;&aacute;&#128;&ordm;&aacute;&#129;&#139; &aacute;&#128;&#158;&aacute;&#128;&frac12;&aacute;&#128;&not;&aacute;&#128;&cedil;&aacute;&#128;&#155;&aacute;&#128;&plusmn;&aacute;&#128;&not;&aacute;&#128;&#128;&aacute;&#128;&ordm;&aacute;&#128;&#156;&aacute;&#128;&#138;&aacute;&#128;&ordm;&aacute;&#128;&#149;&aacute;&#128;&#144;&aacute;&#128;&ordm;&aacute;&#128;&#144;&aacute;&#128;&sup2;&aacute;&#128;&middot; &aacute;&#128;&#128;&aacute;&#128;&#153;&aacute;&#128;&sup1;&aacute;&#128;&#152;&aacute;&#128;&not;&aacute;&#128;&#156;&aacute;&#128;&frac34;&aacute;&#128;&#138;&aacute;&#128;&ordm;&aacute;&#128;&middot;&aacute;&#128;&#129;&aacute;&#128;&#155;&aacute;&#128;&reg;&aacute;&#128;&cedil;&aacute;&#128;&#158;&aacute;&#128;&frac12;&aacute;&#128;&not;&aacute;&#128;&cedil;&aacute;&#128;&#144;&aacute;&#128;&frac12;&aacute;&#128;&plusmn;&aacute;&#128;&#128; &aacute;&#128;&#155;&aacute;&#128;&sup2;&aacute;&#128;&#144;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&#128;&aacute;&#128;&ordm;&aacute;&#128;&iexcl;&aacute;&#128;&#144;&aacute;&#128;&frac12;&aacute;&#128;&#132;&aacute;&#128;&ordm;&aacute;&#128;&cedil;&aacute;&#128;&#153;&aacute;&#128;&frac34;&aacute;&#128;&not; &aacute;&#128;&iexcl;&aacute;&#128;&#155;&aacute;&#128;&shy;&aacute;&#128;&#149;&aacute;&#128;&ordm;(shadow figure)&aacute;&#128;&#144;&aacute;&#128;&frac12;&aacute;&#128;&plusmn; &aacute;&#128;&#144;&aacute;&#128;&frac12;&aacute;&#128;&plusmn;&aacute;&#128;&middot;&aacute;&#128;&#155;&aacute;&#128;&frac34;&aacute;&#128;&shy;&aacute;&#128;&#144;&aacute;&#128;&sup2;&aacute;&#128;&middot;&aacute;&#128;&iexcl;&aacute;&#128;&#149;&aacute;&#128;&frac14;&aacute;&#128;&#132;&aacute;&#128;&ordm; &aacute;&#128;&#155;&aacute;&#128;&macr;&aacute;&#128;&#144;&aacute;&#128;&ordm;&aacute;&#128;&#144;&aacute;&#128;&#155;&aacute;&#128;&#128;&aacute;&#128;&ordm;&aacute;&#128;&iexcl;&aacute;&#128;&#149;&aacute;&#128;&deg;&aacute;&#128;&#129;&aacute;&#128;&raquo;&aacute;&#128;&shy;&aacute;&#128;&#148;&aacute;&#128;&ordm;&aacute;&#128;&#149;&aacute;&#128;&frac14;&aacute;&#128;&plusmn;&aacute;&#128;&not;&aacute;&#128;&#132;&aacute;&#128;&ordm;&aacute;&#128;&cedil;&aacute;&#128;&#156;&aacute;&#128;&sup2;&aacute;&#128;&#144;&aacute;&#128;&not;&aacute;&#128;&#153;&aacute;&#128;&raquo;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&cedil;&aacute;&#128;&#144;&aacute;&#128;&frac12;&aacute;&#128;&plusmn;&aacute;&#128;&#148;&aacute;&#128;&sup2;&aacute;&#128;&middot; &aacute;&#128;&#144;&aacute;&#128;&#129;&aacute;&#128;&frac14;&aacute;&#128;&not;&aacute;&#128;&cedil;&aacute;&#128;&#149;&aacute;&#128;&macr;&aacute;&#128;&para;&aacute;&#128;&#153;&aacute;&#128;&frac34;&aacute;&#128;&#148;&aacute;&#128;&ordm;&aacute;&#128;&#153;&aacute;&#128;&#159;&aacute;&#128;&macr;&aacute;&#128;&#144;&aacute;&#128;&ordm;&aacute;&#128;&#144;&aacute;&#128;&sup2;&aacute;&#128;&middot; &aacute;&#128;&#129;&aacute;&#128;&para;&aacute;&#128;&#133;&aacute;&#128;&not;&aacute;&#128;&cedil;&aacute;&#128;&#129;&aacute;&#128;&raquo;&aacute;&#128;&#128;&aacute;&#128;&ordm;&aacute;&#128;&#144;&aacute;&#128;&frac12;&aacute;&#128;&plusmn;&aacute;&#128;&#155;&aacute;&#128;&#155;&aacute;&#128;&frac34;&aacute;&#128;&shy;&aacute;&#128;&#128;&aacute;&#128;&frac14;&aacute;&#128;&#149;&aacute;&#128;&laquo;&aacute;&#128;&#144;&aacute;&#128;&#154;&aacute;&#128;&ordm;&aacute;&#129;&#139;\r</div><div>&eth;&#159;&#143;&deg; &aacute;&#128;&#133;&aacute;&#128;&not;&aacute;&#128;&#155;&aacute;&#128;&plusmn;&aacute;&#128;&cedil;&aacute;&#128;&#134;&aacute;&#128;&#155;&aacute;&#128;&not;&aacute;&#128;&#153; J.K. Rowlings &aacute;&#128;&#159;&aacute;&#128;&not;&aacute;&#128;&#134;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&#155;&aacute;&#128;&#132;&aacute;&#128;&ordm; &aacute;&#128;&#146;&aacute;&#128;&reg; Edinburgh &aacute;&#128;&#155;&aacute;&#128;&sup2;&aacute;&#128;&#144;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&#128;&aacute;&#128;&ordm;&aacute;&#128;&#128;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&#128;&aacute;&#128;&plusmn;&aacute;&#128;&not;&aacute;&#128;&#132;&aacute;&#128;&ordm;&aacute;&#128;&cedil;&aacute;&#128;&#133;&aacute;&#128;&frac12;&aacute;&#128;&not;&aacute;&#128;&#153;&aacute;&#128;&frac14;&aacute;&#128;&#132;&aacute;&#128;&ordm;&aacute;&#128;&#155;&aacute;&#128;&#144;&aacute;&#128;&sup2;&aacute;&#128;&middot; The Elephant House Cafe &aacute;&#128;&#153;&aacute;&#128;&frac34;&aacute;&#128;&not;&aacute;&#128;&#145;&aacute;&#128;&shy;&aacute;&#128;&macr;&aacute;&#128;&#132;&aacute;&#128;&ordm;&aacute;&#128;&#149;&aacute;&#128;&frac14;&aacute;&#128;&reg;&aacute;&#128;&cedil; Harry Potter\r</div><div>Film series &aacute;&#128;&#128;&aacute;&#128;&shy;&aacute;&#128;&macr; sketch &aacute;&#128;&iexcl;&aacute;&#128;&#128;&aacute;&#128;&frac14;&aacute;&#128;&#153;&aacute;&#128;&ordm;&aacute;&#128;&cedil;&aacute;&#128;&#129;&aacute;&#128;&raquo;&aacute;&#128;&#129;&aacute;&#128;&sup2;&aacute;&#128;&middot;&aacute;&#128;&#149;&aacute;&#128;&laquo;&aacute;&#128;&#144;&aacute;&#128;&#154;&aacute;&#128;&ordm;&aacute;&#129;&#139;</div><div><img src=\"42a0e188f5033bc65bf8d78622277c4e.jpg\"> \r</div><div>#landmark #knowledge\r</div><div>#edinburgh #castle\r</div><div>#myanboxknowledge</div></div>\n', '0', '2022-04-29 04:25:05', '2022-04-29 04:25:11');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_url` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `category_name`, `category_url`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'World News', 'world-news', '1', '2020-09-26 03:56:02', '2021-01-28 04:25:54'),
(2, 'Entertainment News', 'entertainment-news', '0', '2020-09-26 03:56:02', '2021-07-13 03:58:04'),
(3, 'Governments News', 'governments-news', '0', '2020-09-26 03:56:02', '2021-02-10 02:13:56'),
(4, 'Global New', 'global-new', '0', '2020-09-26 03:56:02', '2022-04-29 04:21:47'),
(5, 'Sport News', 'sport-news', '0', '2020-09-30 03:58:48', '2022-04-29 04:18:33'),
(6, 'Korea News', 'korea-news', '0', '2020-09-30 03:58:56', '2022-04-29 04:21:42'),
(7, 'Foods and Health News', 'foods-and-health-news', '0', '2020-10-28 00:02:27', '2022-04-29 04:18:24'),
(62, 'Tourism News', 'tourism-news', '1', '2020-12-28 09:12:33', '2021-01-28 04:26:38'),
(63, 'mayoones', 'mayoones', '0', '2021-01-08 05:50:17', '2021-07-27 03:30:42'),
(64, 'my news', 'my-news', '0', '2021-01-08 05:50:25', '2021-01-28 04:11:02'),
(65, 'Engineering Knowledge', 'engineering-knowledge', '1', '2021-07-31 10:31:02', '2022-04-29 04:19:29'),
(66, 'Buildings', 'buildings', '1', '2021-07-31 10:32:16', '2022-04-29 04:18:39'),
(67, 'General Knowledge', 'general-knowledge', '1', '2022-04-29 04:19:18', '2022-04-29 04:19:18');

-- --------------------------------------------------------

--
-- Table structure for table `business_days`
--

CREATE TABLE `business_days` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_days`
--

INSERT INTO `business_days` (`id`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Monday', 1, 1, '2021-11-20 12:51:31', '2021-11-20 12:51:31'),
(2, 'Tuesday', 1, 1, '2021-11-20 12:51:31', '2021-11-20 12:51:31'),
(3, 'Wednesday', 1, 1, '2021-11-20 12:51:31', '2021-11-20 12:51:31'),
(4, 'Thusday', 1, 1, '2021-11-20 12:51:31', '2021-11-20 12:51:31'),
(5, 'Friday', 1, 1, '2021-11-20 12:51:31', '2021-11-20 12:51:31'),
(6, 'Saturday', 1, 1, '2021-11-20 12:51:31', '2021-11-20 12:51:31'),
(7, 'Sunday', 1, 1, '2021-11-20 12:51:31', '2021-11-20 12:51:31');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_url` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `category_url`, `parent_id`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Service', 'service', 0, '1', 1, 1, '2020-09-26 03:56:02', '2020-09-26 03:56:02'),
(2, 'Supplier', 'supplier', 0, '1', 1, 1, '2020-09-26 03:56:02', '2020-09-26 03:56:02'),
(3, 'Reno Business', 'reno-business', 0, '1', 1, 1, '2020-09-26 03:56:02', '2020-09-26 03:56:02'),
(4, 'Freelancer', 'freelancer', 0, '1', 1, 1, '2020-09-26 03:56:02', '2020-09-26 03:56:02'),
(5, 'Architecture & Design Firm', 'architecture-design-firm', 1, '1', 1, 1, '2020-09-26 03:56:02', '2022-01-31 08:46:09'),
(6, 'Residential Construction', 'residential-construction', 1, '1', 1, 1, '2020-09-26 03:56:02', '2022-01-31 08:44:46'),
(7, 'Industrial Construction', 'industrial-construction', 1, '1', 1, 1, '2020-09-26 03:56:02', '2020-11-12 02:35:15'),
(8, 'Renovation & Decoration', 'renovation-decoration', 3, '1', 1, 1, '2020-09-26 03:56:02', '2020-12-01 03:51:56'),
(9, 'Structural Design', 'structural-design', 1, '1', 1, 1, '2020-09-26 03:56:02', '2020-12-01 03:40:31'),
(10, 'MEP Services', 'mep-services', 1, '1', 1, 1, '2020-09-26 03:56:02', '2020-12-06 20:31:04'),
(11, 'Engineering Services', 'engineering-services', 1, '1', 1, 1, '2020-09-26 03:56:02', '2020-11-11 14:38:48'),
(12, 'Lab & Geo Engineering', 'lab-geo-engineering', 1, '1', 1, 1, '2020-09-26 03:56:02', '2020-11-12 02:37:49'),
(13, '3rd Party Inspection', '3rd-party-inspection', 2, '0', 1, 1, '2020-09-26 03:56:02', '2021-08-23 12:55:40'),
(14, 'Cleaning & Others', 'cleaning-others', 1, '1', 1, 1, '2020-09-26 03:56:02', '2020-11-11 14:39:05'),
(15, 'Aluminium & Glass', 'aluminium-glass', 3, '1', 1, 1, '2020-09-26 03:56:02', '2021-05-31 09:55:59'),
(16, 'Beaching Plants', 'beaching-plants', 2, '0', 1, 1, '2020-09-26 03:56:02', '2021-02-10 02:54:21'),
(17, 'Ceiling & Partition Materials', 'ceiling-partition-materials', 2, '1', 1, 1, '2020-09-26 03:56:02', '2020-12-01 03:48:30'),
(18, 'Construction Chemicals', 'construcation-chemicals', 2, '1', 1, 1, '2020-09-26 03:56:02', '2020-11-13 01:11:21'),
(19, 'Construction Materials', 'construcation-materials', 2, '1', 1, 1, '2020-09-26 03:56:02', '2020-11-13 01:11:44'),
(20, 'Curtains & Blinds', 'curtains-blinds', 2, '1', 1, 1, '2020-09-26 03:56:02', '2020-12-06 20:35:52'),
(21, 'Decorative Accessories', 'decorative-accessories', 1, '1', 1, 1, '2020-09-26 03:56:02', '2021-01-10 16:49:45'),
(22, 'Doors & Shutters', 'doors-shutters', 2, '1', 1, 1, '2020-09-26 03:56:02', '2020-11-13 01:12:40'),
(23, 'Electronics & Lighting', 'electronics-lighting', 2, '1', 1, 1, '2020-09-26 03:56:02', '2020-11-13 01:13:25'),
(24, 'Flooring & Wall Decorative', 'flooring-wall-decorative', 2, '1', 1, 1, '2020-09-26 03:56:02', '2020-11-13 01:14:25'),
(25, 'Furniture Supply', 'fucniture-supply', 2, '1', 1, 1, '2020-09-26 03:56:02', '2020-11-13 01:15:09'),
(26, 'Garden & Landscaping', 'garden-landscaping', 2, '1', 1, 1, '2020-09-26 03:56:02', '2020-11-13 01:15:31'),
(27, 'Hardwood/ Engineered Wood', 'hardwooding-engineering-wood', 2, '1', 1, 1, '2020-09-26 03:56:02', '2020-11-13 01:15:54'),
(28, 'Iron & Steel Materials', 'iron-steel-materials', 2, '1', 1, 1, '2020-09-26 03:56:02', '2020-11-13 01:16:39'),
(29, 'Kitchen & Sanitary wares', 'kitchen-sanitary-wares', 2, '1', 1, 1, '2020-09-26 03:56:02', '2020-11-13 01:17:03'),
(30, 'Lifts & Escalators', 'lifts-escalators', 2, '1', 1, 1, '2020-09-26 03:56:02', '2020-12-01 03:51:19'),
(31, 'Paints Supply', 'paints-supply', 2, '1', 1, 1, '2020-09-26 03:56:02', '2020-11-13 01:17:54'),
(32, 'Piling work', 'piling-work', 2, '1', 1, 1, '2020-09-26 03:56:02', '2020-11-13 01:18:16'),
(33, 'Plumbing Accessories', 'plumbing-accessories', 2, '1', 1, 1, '2020-09-26 03:56:02', '2020-11-13 01:18:31'),
(34, 'Site Engineer (Civil)', 'site-engineer-civil', 4, '0', 1, 1, '2020-09-26 03:56:02', '2021-08-02 03:53:07'),
(35, 'Designer', 'designer', 4, '1', 1, 1, '2020-09-26 03:56:02', '2021-02-10 03:42:15'),
(36, 'Business Analyst', 'business-analyst', 4, '1', 1, 1, '2020-09-26 03:56:02', '2021-07-26 07:57:45'),
(37, 'DB Administrator', 'db-administrator', 4, '1', 1, 1, '2020-09-26 03:56:02', '2020-11-23 01:12:56'),
(39, 'IT Technician', 'it-technician', 4, '1', 1, 1, '2020-09-26 03:56:02', '2020-12-07 01:38:53'),
(40, 'PVC Products', 'pvc-product', 2, '1', 1, 1, '2020-10-20 19:44:55', '2020-12-01 03:52:00'),
(41, 'Roofing & Accessories', 'roofing-accessories', 2, '0', 1, 1, '2020-10-21 13:44:30', '2020-12-01 03:51:49'),
(42, 'Safety & Security', 'safety-security', 2, '1', 1, 1, '2020-10-21 13:50:23', '2020-11-12 13:20:46'),
(43, 'Sign Boards & Neon', 'sign-boards-neon', 2, '1', 1, 1, '2020-10-23 15:33:07', '2020-11-12 13:21:59'),
(45, 'Electronic Engineer', 'electronic-engineer', 4, '1', 1, 1, '2020-10-28 18:09:42', '2021-07-27 03:32:00'),
(46, 'Developer', 'developer', 4, '1', 1, 1, '2020-10-28 18:13:49', '2021-02-16 04:50:29'),
(47, 'Stainless Steel wares', 'stainless-steel-wares', 2, '1', 1, 1, '2020-11-13 01:22:23', '2020-11-13 01:22:23'),
(48, 'Swimming Pools', 'swimming-pools', 2, '1', 1, 1, '2020-11-13 01:22:44', '2020-11-13 01:22:44'),
(49, 'Tiles & accessories', 'tiles-accessories', 2, '1', 1, 1, '2020-11-13 01:23:04', '2020-11-13 01:23:04'),
(50, 'Tools & Machinery', 'tools-machinery', 2, '1', 1, 1, '2020-11-13 01:23:16', '2020-11-13 01:23:16'),
(51, 'Advertising Services', 'advertising-services', 3, '0', 1, 1, '2020-11-13 01:24:02', '2021-02-10 03:02:02'),
(52, 'Branding & Design', 'branding-design', 3, '0', 1, 1, '2020-11-13 01:24:21', '2021-02-10 02:54:19'),
(53, 'Business Consultants', 'business-consultants', 3, '1', 1, 1, '2020-11-13 01:24:35', '2020-11-13 01:24:35'),
(54, 'Catering Services', 'catering-services', 3, '1', 1, 1, '2020-11-13 01:24:56', '2020-12-06 20:35:38'),
(55, 'Finance Solutions', 'finance-solutions', 3, '1', 1, 1, '2020-11-13 01:25:50', '2021-02-10 13:23:55'),
(56, 'Legal Consultants', 'legal-consultants', 3, '1', 1, 1, '2020-11-13 01:26:03', '2020-12-01 03:51:20'),
(57, 'Moving Services', 'moving-services', 3, '1', 1, 1, '2020-11-13 01:26:18', '2020-11-13 01:26:18'),
(58, 'Printing Services', 'printing-services', 3, '1', 1, 1, '2020-11-13 01:26:28', '2020-11-12 14:02:22'),
(59, 'Real Estate', 'real-estate', 3, '1', 1, 1, '2020-11-13 01:26:42', '2020-12-01 03:51:59'),
(60, 'Transportation Services', 'transporting-service', 3, '1', 1, 1, '2020-11-13 01:26:58', '2021-01-10 04:51:51'),
(71, 'Architects', 'architects', 4, '1', 1, 1, '2021-07-31 10:35:52', '2021-07-31 10:35:52'),
(87, 'Construction & Decoration', 'construction-decoration', 1, '1', 1, 1, '2022-01-31 08:41:49', '2022-01-31 08:41:49'),
(70, 'Handcraft Myanmar Furniture', 'handcraft-myanmar-furniture', 1, '0', 1, 1, '2021-07-31 09:16:38', '2021-08-02 03:59:44'),
(72, 'Accountant', 'accountant', 4, '0', 1, 1, '2021-07-31 10:36:07', '2021-11-02 04:26:47'),
(73, 'Interior Designer', 'interior-designer', 4, '1', 1, 1, '2021-07-31 10:36:35', '2021-07-31 10:36:35'),
(74, 'Contractor', 'contractor', 4, '1', 1, 1, '2021-08-02 03:51:11', '2021-08-02 03:51:11'),
(75, 'Consultant', 'consultant', 4, '1', 1, 1, '2021-08-02 03:52:28', '2021-08-02 03:52:28');

-- --------------------------------------------------------

--
-- Table structure for table `category_company`
--

CREATE TABLE `category_company` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_company`
--

INSERT INTO `category_company` (`id`, `category_id`, `company_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, 3, '2022-01-31 08:15:01', '2022-01-31 08:15:01'),
(2, 1, 2, 4, 4, '2022-01-31 08:22:05', '2022-01-31 08:22:05'),
(14, 21, 1, 0, 0, '2022-01-31 08:01:42', '2022-01-31 08:01:42'),
(13, 11, 1, 0, 0, '2022-01-31 08:01:42', '2022-01-31 08:01:42'),
(12, 10, 1, 0, 0, '2022-01-31 08:01:42', '2022-01-31 08:01:42'),
(11, 9, 1, 0, 0, '2022-01-31 08:01:42', '2022-01-31 08:01:42'),
(15, 87, 1, 0, 0, '2022-01-31 08:01:42', '2022-01-31 08:01:42'),
(16, 1, 3, 11, 11, '2022-02-11 16:29:49', '2022-02-11 16:29:49'),
(17, 2, 4, 13, 13, '2022-02-11 16:39:04', '2022-02-11 16:39:04'),
(18, 17, 4, 4, 4, '2022-02-11 16:02:38', '2022-02-11 16:02:38'),
(19, 18, 4, 4, 4, '2022-02-11 16:02:38', '2022-02-11 16:02:38'),
(20, 19, 4, 4, 4, '2022-02-11 16:02:38', '2022-02-11 16:02:38'),
(21, 20, 4, 4, 4, '2022-02-11 16:02:38', '2022-02-11 16:02:38'),
(22, 22, 4, 4, 4, '2022-02-11 16:02:38', '2022-02-11 16:02:38'),
(23, 23, 4, 4, 4, '2022-02-11 16:02:38', '2022-02-11 16:02:38'),
(24, 24, 4, 4, 4, '2022-02-11 16:02:38', '2022-02-11 16:02:38'),
(25, 25, 4, 4, 4, '2022-02-11 16:02:38', '2022-02-11 16:02:38'),
(26, 26, 4, 4, 4, '2022-02-11 16:02:38', '2022-02-11 16:02:38'),
(27, 1, 5, 14, 14, '2022-02-12 03:46:39', '2022-02-12 03:46:39'),
(88, 1, 6, 17, 17, '2022-02-21 02:55:26', '2022-02-21 02:55:26'),
(87, 87, 5, 5, 5, '2022-02-12 03:02:19', '2022-02-12 03:02:19'),
(86, 21, 5, 5, 5, '2022-02-12 03:02:19', '2022-02-12 03:02:19'),
(85, 14, 5, 5, 5, '2022-02-12 03:02:19', '2022-02-12 03:02:19'),
(84, 12, 5, 5, 5, '2022-02-12 03:02:19', '2022-02-12 03:02:19'),
(83, 11, 5, 5, 5, '2022-02-12 03:02:19', '2022-02-12 03:02:19'),
(82, 10, 5, 5, 5, '2022-02-12 03:02:19', '2022-02-12 03:02:19'),
(81, 9, 5, 5, 5, '2022-02-12 03:02:19', '2022-02-12 03:02:19'),
(80, 7, 5, 5, 5, '2022-02-12 03:02:19', '2022-02-12 03:02:19'),
(79, 6, 5, 5, 5, '2022-02-12 03:02:19', '2022-02-12 03:02:19'),
(78, 5, 5, 5, 5, '2022-02-12 03:02:19', '2022-02-12 03:02:19');

-- --------------------------------------------------------

--
-- Table structure for table `category_freelancers`
--

CREATE TABLE `category_freelancers` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coin_plans`
--

CREATE TABLE `coin_plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `coin_count` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `currency_unit_id` int(11) NOT NULL,
  `is_active` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coin_plans`
--

INSERT INTO `coin_plans` (`id`, `coin_count`, `price`, `currency_unit_id`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 10000, 200000, 1, '1', 1, 1, '2020-09-26 03:56:02', '2020-11-23 01:02:22'),
(2, 3000, 3000, 1, '0', 1, 1, '2020-09-26 03:56:02', '2020-10-22 13:37:09'),
(3, 3000, 30000, 1, '1', 1, 1, '2020-09-26 03:56:02', '2020-10-22 17:13:13'),
(4, 4000, 40000, 1, '1', 1, 1, '2020-09-26 03:56:02', '2020-10-22 17:13:07'),
(5, 5000, 50000, 1, '1', 1, 1, '2020-09-26 03:56:02', '2020-09-26 03:56:02'),
(6, 6000, 60000, 1, '1', 1, 1, '2020-09-26 03:56:02', '2020-09-26 03:56:02'),
(9, 260, 270, 1, '0', 1, 1, '2020-11-03 20:58:56', '2021-01-26 22:30:51'),
(8, 100, 100, 1, '1', 1, 1, '2020-10-24 11:59:07', '2020-10-24 11:59:07'),
(10, 10, 10, 1, '1', 1, 1, '2020-11-19 02:12:56', '2020-12-10 23:04:34'),
(11, 1, 2, 2, '0', 1, 1, '2020-12-10 06:25:13', '2021-11-02 02:28:40'),
(12, 12, 6, 1, '1', 1, 1, '2021-07-31 10:29:21', '2021-07-31 10:29:21'),
(13, 100, 10000, 2, '1', 1, 1, '2021-11-01 11:27:40', '2021-11-01 11:28:27'),
(14, 10, 13, 2, '1', 1, 1, '2021-11-25 04:37:01', '2021-11-25 04:37:01');

-- --------------------------------------------------------

--
-- Table structure for table `coin_plan_user`
--

CREATE TABLE `coin_plan_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `coin_plan_id` int(11) NOT NULL,
  `status` enum('Pending','Approved','Rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coin_plan_user`
--

INSERT INTO `coin_plan_user` (`id`, `user_id`, `coin_plan_id`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 13, 1, 'Rejected', 13, 1, '2022-02-11 16:02:45', '2022-02-11 04:53:07'),
(2, 13, 3, 'Approved', 13, 1, '2022-02-11 16:02:49', '2022-02-11 04:51:36'),
(3, 15, 10, 'Pending', 15, 15, '2022-02-12 07:02:33', '2022-02-12 07:02:33');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_id` int(11) DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `googleplus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `service` text COLLATE utf8mb4_unicode_ci,
  `vission` text COLLATE utf8mb4_unicode_ci,
  `mission` text COLLATE utf8mb4_unicode_ci,
  `address` text COLLATE utf8mb4_unicode_ci,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `view_count` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `active_package_plan_id` int(11) DEFAULT NULL,
  `business_opening_hours` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_closing_hours` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_days` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `renobusiness_slide` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `active_quotation` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `user_id`, `company_url`, `location_id`, `facebook`, `email`, `website`, `googleplus`, `twitter`, `instagram`, `linkedin`, `description`, `service`, `vission`, `mission`, `address`, `phone`, `cover_photo`, `is_active`, `view_count`, `created_by`, `updated_by`, `active_package_plan_id`, `business_opening_hours`, `business_closing_hours`, `business_days`, `renobusiness_slide`, `active_quotation`, `created_at`, `updated_at`) VALUES
(1, 3, 'msquareconstructiondecorationcoltd', 39, '', 'admin@msquaremyanmar.com', 'http://www.msquaremyanmar.com/', '', '', NULL, '', 'M-SQUARE is a tight knit team of excellent designers, developers and strategists.', NULL, NULL, NULL, 'No.252, Khayae Myaing Street, Ward 30, VIP3, Thuwunna Township Yangon, Myanmar, 11072', '09256999918', '1643620087.png', '1', NULL, 3, 3, 3, '', '', '[{&quot;business_day_id&quot;:&quot;1&quot;,&quot;opening_hour&quot;:&quot;09:30:00&quot;,&quot;clos', '0', '0', '2022-01-31 07:45:01', '2022-01-31 09:23:32'),
(2, 4, 'handcraftmyanmarcoltd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, 4, 4, 1, NULL, NULL, NULL, '0', '0', '2022-01-31 07:52:05', '2022-01-31 07:52:05'),
(3, 11, 'servicecompany', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, 11, 11, 1, NULL, NULL, NULL, '0', '0', '2022-02-11 15:59:49', '2022-02-11 15:59:49'),
(4, 13, 'royalgrowcoltd', 253, 'https://facebook.com', 'mayoozin.mayoo@gmail.com', 'https://facebook.com', 'https://facebook.com', 'https://facebook.com', NULL, 'https://facebook.com', 'Now for the easy part! Once you\'ve applied heading styles, you can insert your table of contents in just a few clicks. Navigate to the References tab on the Ribbon, then click the Table of Contents command. Select a built-in table from the menu that appears, and the table of contents will appear in your document.', 'Now for the easy part! Once you\'ve applied heading styles, you can insert your table of contents in just a few clicks. Navigate to the References tab on the Ribbon, then click the Table of Contents command. Select a built-in table from the menu that appears, and the table of contents will appear in your document.', 'Now for the easy part! Once you\'ve applied heading styles, you can insert your table of contents in just a few clicks. Navigate to the References tab on the Ribbon, then click the Table of Contents command. Select a built-in table from the menu that appears, and the table of contents will appear in your document.', 'Now for the easy part! Once you\'ve applied heading styles, you can insert your table of contents in just a few clicks. Navigate to the References tab on the Ribbon, then click the Table of Contents command. Select a built-in table from the menu that appears, and the table of contents will appear in your document.', 'de', '09952009800', NULL, '1', NULL, 13, 13, 3, '', '', '[{&quot;business_day_id&quot;:&quot;1&quot;,&quot;opening_hour&quot;:&quot;09:10&quot;,&quot;closing', '0', '0', '2022-02-11 16:09:04', '2022-02-11 17:01:44'),
(5, 14, 'elizaskin', 79, 'https://facebook.com', 'mayoozinse25@gmail.com', 'https://facebook.com', 'https://facebook.com', 'https://facebook.com', NULL, 'https://facebook.com', 'Test', 'TEst', 'TEstTestT', 'TEst', 'Yangon', '09952009800', NULL, '1', NULL, 14, 14, 1, '', '', '[{&quot;business_day_id&quot;:&quot;1&quot;,&quot;opening_hour&quot;:&quot;10:18&quot;,&quot;closing', '0', '0', '2022-02-12 03:16:39', '2022-02-12 03:19:15'),
(6, 17, 'controldata', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, 17, 17, 1, NULL, NULL, NULL, '0', '0', '2022-02-21 02:25:26', '2022-02-21 02:25:26');

-- --------------------------------------------------------

--
-- Table structure for table `company_advertisements`
--

CREATE TABLE `company_advertisements` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(11) NOT NULL,
  `company_advertising_plan_id` int(11) NOT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_advertising_plans`
--

CREATE TABLE `company_advertising_plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `plan_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `periods` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `currency_unit_id` int(11) NOT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_advertising_plans`
--

INSERT INTO `company_advertising_plans` (`id`, `plan_name`, `periods`, `price`, `currency_unit_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Home Slider', 30, 100000, 2, '1', '2020-09-26 04:06:58', '2021-11-02 02:42:32'),
(2, 'Top Company Slider', 30, 80000, 1, '1', '2020-09-26 04:06:58', '2020-11-03 09:13:34'),
(3, 'Top Company & Freelancer', 30, 50000, 1, '1', '2020-09-26 04:06:58', '2020-09-26 04:06:58'),
(4, 'Logo Advertising', 30, 30000, 1, '1', '2020-09-26 04:06:58', '2020-09-26 04:06:58'),
(5, 'Company Logo Slider', 30, 30000, 2, '1', '2020-09-26 04:06:58', '2021-11-02 02:42:17');

-- --------------------------------------------------------

--
-- Table structure for table `company_business_days`
--

CREATE TABLE `company_business_days` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(11) NOT NULL,
  `business_day_id` int(11) NOT NULL,
  `opening_hour` time NOT NULL,
  `closing_hour` time NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_business_days`
--

INSERT INTO `company_business_days` (`id`, `company_id`, `business_day_id`, `opening_hour`, `closing_hour`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '09:30:00', '17:30:00', 1, 1, NULL, NULL),
(2, 1, 2, '09:30:00', '17:30:00', 1, 1, NULL, NULL),
(3, 1, 3, '09:30:00', '17:30:00', 1, 1, NULL, NULL),
(4, 1, 4, '09:30:00', '17:30:00', 1, 1, NULL, NULL),
(5, 1, 5, '09:30:00', '17:30:00', 1, 1, NULL, NULL),
(6, 1, 6, '09:30:00', '17:30:00', 1, 1, NULL, NULL),
(7, 4, 1, '09:10:00', '17:42:00', 13, 13, NULL, NULL),
(8, 5, 1, '10:18:00', '18:00:00', 14, 14, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company_company_advertising_plan`
--

CREATE TABLE `company_company_advertising_plan` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(11) NOT NULL,
  `company_advertising_plan_id` int(11) NOT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_company_advertising_plan`
--

INSERT INTO `company_company_advertising_plan` (`id`, `company_id`, `company_advertising_plan_id`, `is_active`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(4, 1, 3, '1', '2022-01-31', '2022-03-02', '2022-01-31 10:01:55', '2022-01-31 10:01:55');

-- --------------------------------------------------------

--
-- Table structure for table `company_package_plan`
--

CREATE TABLE `company_package_plan` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(11) NOT NULL,
  `package_plan_id` int(11) NOT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `approve` enum('Pending','Cancel','Success') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_package_plan`
--

INSERT INTO `company_package_plan` (`id`, `company_id`, `package_plan_id`, `is_active`, `created_by`, `updated_by`, `start_date`, `end_date`, `approve`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '0', 1, 1, NULL, NULL, 'Cancel', '2022-01-31 09:01:23', '2022-01-31 09:53:02'),
(2, 1, 3, '1', 1, 1, '2022-01-31', '2022-05-01', 'Success', '2022-01-31 09:01:51', '2022-01-31 09:53:37'),
(3, 4, 3, '1', 4, 1, '2022-02-12', '2022-05-13', 'Success', '2022-02-11 16:02:58', '2022-02-11 17:01:44'),
(4, 4, 2, '0', 4, 4, NULL, NULL, 'Pending', '2022-02-11 17:02:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company_products`
--

CREATE TABLE `company_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` int(11) NOT NULL,
  `photo` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` text COLLATE utf8mb4_unicode_ci,
  `price` decimal(8,2) NOT NULL,
  `code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_stock` enum('Instock','Out Of Stock','Preorder') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_products`
--

INSERT INTO `company_products` (`id`, `product_name`, `company_id`, `photo`, `product_description`, `price`, `code`, `size`, `current_stock`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Laptop', 4, '1644602026.png', 'Discover Product Manager Course. Find Quick Results from Multiple Sources. Get Product Manager Course. Get Instant Quality Results at iZito Now! Explore the Best Info Now. Powerful and Easy to Use. 100  Qualitative Results. Discover Quality Results.', '200000.00', 'C0002', '3 inches', 'Instock', 13, 13, '2022-02-11 17:02:24', '2022-02-11 17:02:24'),
(2, 'Table Accessoires', 4, '1644602122.png', 'Discover Product Manager Course. Find Quick Results from Multiple Sources. Get Product Manager Course. Get Instant Quality Results at iZito Now! Explore the Best Info Now. Powerful and Easy to Use. 100  Qualitative Results. Discover Quality Results.', '30000.00', 'C0004', '5', 'Instock', 13, 13, '2022-02-11 17:02:25', '2022-02-11 17:02:25');

-- --------------------------------------------------------

--
-- Table structure for table `company_projects`
--

CREATE TABLE `company_projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_type_id` int(11) NOT NULL,
  `project_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_url` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` int(11) NOT NULL,
  `project_description` text COLLATE utf8mb4_unicode_ci,
  `range_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_projects`
--

INSERT INTO `company_projects` (`id`, `project_type_id`, `project_name`, `project_url`, `company_id`, `project_description`, `range_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'TEst', 'test', 1, 'This is description', 12, 1, 1, '2022-02-11 14:02:29', '2022-02-11 14:02:29'),
(2, 2, 'Building', 'building', 4, '<p>Easily assign tasks and prioritize what\'s most important to your team. Set project timeline, milestones and dependencies, and manage your team’s entire workload all in one place.</p>', 12, 13, 13, '2022-02-11 17:02:17', '2022-02-11 17:02:17'),
(3, 3, 'Royal Grow Co.Ltd', 'royal-grow-co-ltd', 4, '<p>Over 3,000,000 People Have Tried Smartsheet. It\'s Easy. Try it Free! Make Collaboration Work. Enterprise Ready. 100% Cloud-Base</p>', 12, 13, 13, '2022-02-11 17:02:18', '2022-02-11 17:02:18');

-- --------------------------------------------------------

--
-- Table structure for table `company_services`
--

CREATE TABLE `company_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `service_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` int(11) NOT NULL,
  `service_detail` text COLLATE utf8mb4_unicode_ci,
  `image_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currency_units`
--

CREATE TABLE `currency_units` (
  `id` int(10) UNSIGNED NOT NULL,
  `currency_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currency_units`
--

INSERT INTO `currency_units` (`id`, `currency_name`, `unit`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Myanmar Kyat', 'MMK', '1', 1, 1, '2021-11-01 09:18:33', '2021-11-01 10:28:02'),
(2, 'US Dollar', '$', '1', 1, 1, '2021-11-01 10:17:23', '2021-11-01 10:17:23');

-- --------------------------------------------------------

--
-- Table structure for table `daily_product_prices`
--

CREATE TABLE `daily_product_prices` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `currency_unit_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `freelancers`
--

CREATE TABLE `freelancers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `googleplus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `freelancer_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `nrc` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `location_id` int(11) DEFAULT NULL,
  `current_work_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `total_experiences` int(11) DEFAULT NULL,
  `freelancer_status_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `freelancer_company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `freelancers`
--

INSERT INTO `freelancers` (`id`, `user_id`, `facebook`, `email`, `website`, `googleplus`, `twitter`, `linkedin`, `freelancer_url`, `date_of_birth`, `nrc`, `address`, `location_id`, `current_work_status`, `description`, `total_experiences`, `freelancer_status_id`, `company_id`, `freelancer_company`, `category_id`, `created_at`, `updated_at`) VALUES
(5, 20, NULL, NULL, NULL, NULL, NULL, NULL, 'snow-white-0817202220.htm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2022-08-17 02:06:08', '2022-08-17 02:06:08'),
(4, 16, NULL, NULL, NULL, NULL, NULL, NULL, 'mayoo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2022-02-13 04:16:24', '2022-02-13 04:16:24');

-- --------------------------------------------------------

--
-- Table structure for table `freelancer_comments`
--

CREATE TABLE `freelancer_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `freelancer_id` int(11) NOT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `freelancer_educations`
--

CREATE TABLE `freelancer_educations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `education_level` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `university` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `freelancer_id` int(11) NOT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `freelancer_educations`
--

INSERT INTO `freelancer_educations` (`id`, `name`, `education_level`, `from_date`, `to_date`, `university`, `freelancer_id`, `country`, `created_at`, `updated_at`) VALUES
(1, 'Computer University', 'B.C.S.C', '2019-05', '2022-06', 'Yangon University', 4, 'England', '2022-02-16 13:17:23', '2022-02-16 13:17:23');

-- --------------------------------------------------------

--
-- Table structure for table `freelancer_experiences`
--

CREATE TABLE `freelancer_experiences` (
  `id` int(10) UNSIGNED NOT NULL,
  `position` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `freelancer_id` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `from_date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `freelancer_experiences`
--

INSERT INTO `freelancer_experiences` (`id`, `position`, `company`, `freelancer_id`, `description`, `from_date`, `to_date`, `created_at`, `updated_at`) VALUES
(1, 'Senior', 'M square', 4, 'Work experience is also when you are a student in school and you spend a week or two working for a company just for the experience. You usually don’t get paid for this role.', '2019-06', '2022-02', '2022-02-16 13:15:03', '2022-02-16 13:15:43');

-- --------------------------------------------------------

--
-- Table structure for table `freelancer_projects`
--

CREATE TABLE `freelancer_projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_detail` text COLLATE utf8mb4_unicode_ci,
  `project_start_date` date DEFAULT NULL,
  `project_end_date` date DEFAULT NULL,
  `project_link` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `freelancer_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `freelancer_projects`
--

INSERT INTO `freelancer_projects` (`id`, `project_name`, `company_name`, `project_detail`, `project_start_date`, `project_end_date`, `project_link`, `freelancer_id`, `created_at`, `updated_at`) VALUES
(1, 'Telegram Project', 'Royal gold company', '<div><span style=\"background-color: rgb(255, 255, 255); color: rgb(0, 0, 0); font-size: 16px;\">I started One Minute English because I realized that despite the fact there are many resources online, students weren’t making the most of them. There is so much information that it can be hard for students to find the best resources.</span><br></div>', '2022-01-04', '2022-03-11', NULL, 4, '2022-02-16 13:23:12', '2022-02-16 13:23:12');

-- --------------------------------------------------------

--
-- Table structure for table `freelancer_rates`
--

CREATE TABLE `freelancer_rates` (
  `id` int(10) UNSIGNED NOT NULL,
  `rate` int(11) NOT NULL,
  `freelancer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `freelancer_skills`
--

CREATE TABLE `freelancer_skills` (
  `id` int(10) UNSIGNED NOT NULL,
  `freelancer_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `freelancer_skills`
--

INSERT INTO `freelancer_skills` (`id`, `freelancer_id`, `skill_id`, `created_at`, `updated_at`) VALUES
(1, 4, 1, '2022-02-16 13:13:04', '2022-02-16 13:13:04');

-- --------------------------------------------------------

--
-- Table structure for table `freelancer_statuses`
--

CREATE TABLE `freelancer_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `freelancer_status_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `freelancer_statuses`
--

INSERT INTO `freelancer_statuses` (`id`, `freelancer_status_name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Working', '1', '2020-09-26 03:56:02', '2020-11-04 19:29:34'),
(3, 'Finding Part Time Job', '0', '2020-09-26 03:56:02', '2021-11-02 04:29:20'),
(4, 'Internship Available', '1', '2020-09-26 03:56:02', '2021-07-27 03:29:55'),
(5, 'Finding Project', '1', '2020-09-26 03:56:02', '2021-07-13 03:50:25');

-- --------------------------------------------------------

--
-- Table structure for table `functions`
--

CREATE TABLE `functions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `functions`
--

INSERT INTO `functions` (`id`, `name`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Company Management', '1', 76, 76, '2020-10-10 09:38:03', '2020-10-10 09:38:03'),
(2, 'Freelancer Management', '1', 76, 76, '2020-10-10 09:38:03', '2020-10-10 09:38:03'),
(3, 'Member Management', '1', 76, 76, '2020-10-10 09:38:03', '2020-10-10 09:38:03'),
(4, 'Advertising Management', '1', 76, 76, '2020-10-10 09:38:03', '2020-10-10 09:38:03'),
(5, 'Blog Management', '1', 76, 76, '2020-10-10 09:38:03', '2020-10-10 09:38:03'),
(6, 'Setting Management', '1', 76, 76, '2020-10-10 09:38:03', '2020-10-10 09:38:03'),
(7, 'Daily Product Price Management', '1', 76, 76, '2020-10-10 09:38:03', '2020-10-10 09:38:03'),
(8, 'Myanboxtube Management', '1', 76, 76, '2020-10-10 09:38:03', '2020-10-10 09:38:03'),
(9, 'Admin Management', '1', 76, 76, '2020-10-25 02:12:52', '2020-10-25 02:12:58'),
(10, 'News Management', '1', 76, 76, '2020-10-25 02:13:03', '2020-10-25 02:13:10');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `is_active` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `parent_id`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Yangon', 0, '1', 76, 76, '2020-12-07 09:09:19', '2020-12-07 10:21:50'),
(2, 'Mandalay', 0, '1', 5, 5, '2020-12-07 09:09:19', '2020-12-07 09:09:19'),
(3, 'Magway', 0, '1', 5, 5, '2020-12-07 09:09:19', '2020-12-07 09:09:19'),
(4, 'Sagaing', 0, '1', 76, 76, '2020-12-07 09:09:19', '2020-12-07 09:36:45'),
(5, 'Bago', 0, '1', 5, 5, '2020-12-07 09:09:19', '2020-12-07 09:09:19'),
(6, 'Ayeyarwady', 0, '1', 5, 5, '2020-12-07 09:09:19', '2020-12-07 09:09:19'),
(7, 'Taninthayi', 0, '1', 5, 5, '2020-12-07 09:09:19', '2020-12-07 09:09:19'),
(8, 'Kachin', 0, '1', 5, 5, '2020-12-07 09:09:19', '2020-12-07 09:09:19'),
(9, 'kayah', 0, '1', 5, 5, '2020-12-07 09:09:19', '2020-12-07 09:09:19'),
(10, 'Kayin', 0, '1', 5, 5, '2020-12-07 09:09:19', '2020-12-07 09:09:19'),
(11, 'Chin', 0, '1', 5, 76, '2020-12-07 09:09:19', '2021-02-10 13:20:29'),
(12, 'Mon', 0, '1', 5, 5, '2020-12-07 09:09:19', '2020-12-07 09:09:19'),
(13, 'Rakhine', 0, '1', 5, 5, '2020-12-07 09:09:19', '2020-12-07 09:09:19'),
(14, 'Shan', 0, '1', 76, 76, '2020-12-07 09:09:19', '2020-12-06 22:14:10'),
(15, 'Ahlon', 1, '1', 1, 1, '2020-12-07 09:09:19', '2022-02-10 11:18:14'),
(16, 'Bahan', 1, '1', 5, 76, '2020-12-07 09:09:19', '2020-12-06 21:34:22'),
(17, 'Dagon', 1, '1', 76, 76, '2020-12-07 09:09:19', '2020-12-07 10:08:33'),
(18, 'Hlaing', 1, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(19, 'Kamayut', 1, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(20, 'Kyauktada', 1, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(21, 'Kyimyindaing', 1, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(22, 'Lanmadaw', 1, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(23, 'Latha', 1, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(24, 'Mayangon', 1, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(25, 'Pabedan', 1, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(26, 'Sanchaung', 1, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(27, 'Bothaung', 1, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(28, 'Dagon Seikkan', 1, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(29, 'Dawbon', 1, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(30, 'Mingala Taungunyunt', 1, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(31, 'East Dagon', 1, '1', 1, 1, '2020-12-07 09:09:20', '2021-10-29 06:35:06'),
(32, 'North Dagon', 1, '1', 1, 1, '2020-12-07 09:09:20', '2021-10-29 06:35:28'),
(33, 'South Dagon', 1, '1', 1, 1, '2020-12-07 09:09:20', '2021-10-29 06:35:44'),
(34, 'North Okkalapa', 1, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(35, 'Pazaundaung', 1, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(36, 'South Okkalapa', 1, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(37, 'Tamwe', 1, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(38, 'Thaketa', 1, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(39, 'Thingangyun', 1, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(40, 'Yankin', 1, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(41, 'Cocokyun', 1, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(42, 'Dala', 1, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(43, 'Kawhmu', 1, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(44, 'Khayan', 1, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(45, 'Kungyangon', 1, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(46, 'Kyauktan', 1, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(47, 'Seikkyi Kanaungto', 1, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(48, 'Thanlyin', 1, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(49, 'Thongwa', 1, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(50, 'Twante', 1, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(51, 'Hlaingthaya East', 1, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(52, 'Hlaingthaya West', 1, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(53, 'Hlegu', 1, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(54, 'Hmawbi', 1, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(55, 'Htantabin', 1, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(56, 'Insein', 1, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(57, 'Mingaladon', 1, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(58, 'Shwepyitha', 1, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(59, 'Taikkyi', 1, '1', 76, 76, '2020-12-07 09:09:20', '2020-12-07 09:41:02'),
(60, 'Kyaukse', 2, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(61, 'Myittha', 2, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(62, 'Sintgaing', 2, '1', 5, 76, '2020-12-07 09:09:20', '2020-12-06 21:41:52'),
(63, 'Tada-U', 2, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(64, 'Amarapura', 2, '0', 5, 76, '2020-12-07 09:09:20', '2021-02-10 04:22:30'),
(65, 'Aungmyethazan', 2, '1', 76, 76, '2020-12-07 09:09:20', '2021-07-27 03:28:35'),
(66, 'Chanayethazan', 2, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(67, 'Chanmyathazi', 2, '1', 76, 76, '2020-12-07 09:09:20', '2020-12-07 09:39:23'),
(68, 'Maha Aungmye', 2, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(69, 'Patheingyi', 2, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(70, 'Mahlaing', 2, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(71, 'Meiktila', 2, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(72, 'Thazi', 2, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(73, 'Wundwin', 2, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(74, 'Myingyan', 2, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(75, 'Natogyi', 2, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(76, 'Ngazun', 2, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(77, 'Taungtha', 2, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(78, 'Tada-U', 2, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(79, 'Kyaukpadaung', 2, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(80, 'Nyaung-U', 2, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(81, 'Ngathayuk', 2, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(82, 'Madaya', 2, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(83, 'Mogok', 2, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(84, 'Pyinoolwin', 2, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(85, 'Singu', 2, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(86, 'thabeikkyin', 2, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(87, 'Pyawbwe', 2, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(88, 'Yamiethin', 2, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(89, 'Nyaung-U', 2, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(90, 'Bagan', 2, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(91, 'Aunglan', 3, '1', 76, 76, '2020-12-07 09:09:20', '2020-12-07 09:39:11'),
(92, 'Chauk', 3, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(93, 'Gangaw', 3, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(94, 'Htilin', 3, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(95, 'Kamma', 3, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(96, 'Minbu', 3, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(97, 'Mindon', 3, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(98, 'Minhla', 3, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(99, 'Myaing', 3, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(100, 'Myothit', 3, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(101, 'Natmauk', 3, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(102, 'Ngape', 3, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(103, 'Pakokku', 3, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(104, 'Pauk', 3, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(105, 'Pwintbyu', 3, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(106, 'Sagu', 3, '1', 5, 76, '2020-12-07 09:09:20', '2020-12-06 21:45:41'),
(107, 'Salin', 3, '1', 76, 76, '2020-12-07 09:09:20', '2020-12-07 09:45:52'),
(108, 'Saw', 3, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(109, 'Seikpyu', 3, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(110, 'Sidoktaya', 3, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(111, 'tqungdwingyi', 3, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(112, 'Thayet', 3, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(113, 'Yenangyaung', 3, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(114, 'Yesagyo', 3, '1', 5, 76, '2020-12-07 09:09:20', '2020-12-06 22:14:22'),
(115, 'Hkamti', 4, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(116, 'Homalin', 4, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(117, 'Kanbalu', 4, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(118, 'Kyunhla', 4, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(119, 'Taze Township', 4, '1', 5, 76, '2020-12-07 09:09:20', '2021-06-16 14:33:46'),
(120, 'Ye-U', 4, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(121, 'Kale', 4, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(122, 'Kalewa', 4, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(123, 'Mingin', 4, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(124, 'Banmauk', 4, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(125, 'Indaw', 4, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(126, 'Katha', 4, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(127, 'Kawlin', 4, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(128, 'Pinlebu', 4, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(129, 'Htigyaing', 4, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(130, 'Wuntho', 4, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(131, 'Mawlaik', 4, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(132, 'Paungbyin', 4, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(133, 'Ayadaw', 4, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(134, 'Budalin', 4, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(135, 'Chaung-U', 4, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(136, 'Monywa', 4, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(137, 'Myaung', 4, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(138, 'Myinmu', 4, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(139, 'Sagaing', 4, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(140, 'Khiin-U', 4, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(141, 'Shwebo', 4, '1', 76, 76, '2020-12-07 09:09:20', '2020-12-07 10:12:36'),
(142, 'Wetlet', 4, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(143, 'Tabayin', 4, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(144, 'Tamu', 4, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(145, 'Kani', 4, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(146, 'Pale', 4, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(147, 'Salingyi', 4, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(148, 'Yinmabin', 4, '1', 76, 76, '2020-12-07 09:09:20', '2020-12-07 10:14:41'),
(149, 'Lahe', 4, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(150, 'Leshi', 4, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(151, 'Nanyun', 4, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(152, 'Bago', 5, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(153, 'Daik-U', 5, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(154, 'Kawa', 5, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(155, 'Nyaunglebin', 5, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(156, 'Shwegyin', 5, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(157, 'Thanatpin', 5, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(158, 'Waw', 5, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(159, 'Kyauktaga', 5, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(160, 'Kyaukkyi', 5, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(161, 'Oktwin', 5, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(162, 'Pyu', 5, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(163, 'Tantabin', 5, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(164, 'Taungoo', 5, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(165, 'Yedashe', 5, '1', 76, 76, '2020-12-07 09:09:20', '2020-12-07 10:21:58'),
(166, 'Pandaung', 5, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(167, 'Paukkaung', 5, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(168, 'Paungde', 5, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(169, 'Pyay', 5, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(170, 'Shwedaung', 5, '1', 76, 76, '2020-12-07 09:09:20', '2020-12-07 10:22:10'),
(171, 'Thegon', 5, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(172, 'Gyobingauk', 5, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(173, 'Letpadan', 5, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(174, 'Minhla', 5, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(175, 'Monyo', 5, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(176, 'Okpho', 5, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(177, 'Tharrawaddy', 5, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(178, 'Nattalin', 5, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(179, 'Zigon', 5, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(180, 'Pathein', 6, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(181, 'Ahmar', 6, '1', 5, 76, '2020-12-07 09:09:20', '2021-02-10 13:19:41'),
(182, 'Ahtaung', 6, '0', 5, 76, '2020-12-07 09:09:20', '2021-02-10 04:22:49'),
(183, 'Bogale', 6, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(184, 'Chaungtha', 6, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(185, 'Danubyu', 6, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(186, 'AhmDedayear', 6, '0', 76, 76, '2020-12-07 09:09:20', '2021-02-16 04:24:36'),
(187, 'Einme', 6, '1', 5, 76, '2020-12-07 09:09:20', '2020-12-06 21:23:18'),
(188, 'Haihyi Island', 6, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(189, 'Hinthada', 6, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(190, 'Ingapu', 6, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(191, 'Ithapyu', 6, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(192, 'Kanaung', 6, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(193, 'Kangyidaut', 6, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(194, 'Kyaiklat', 6, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(195, 'Kyangin', 6, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(196, 'Kyaunggon', 6, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(197, 'Kyonmanage', 6, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(198, 'Kyonpyaw', 6, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(199, 'Labutta', 6, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(200, 'Lemyethna', 6, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(201, 'Maubin', 6, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(202, 'Mawlamyinegyn', 6, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(203, 'Myan Aung', 6, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(204, 'Myaungmya', 6, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(205, 'Ngapudaw', 6, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(206, 'Ngathaingchaung', 6, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(207, 'Ngayokekaung', 6, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(208, 'Ngwesaung', 6, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(209, 'Nyaungdon', 6, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(210, 'Pantanaw', 6, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(211, 'Pyapon', 6, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(212, 'Pyinsalu', 6, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(213, 'Shwelaung', 6, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(214, 'Thabaung', 6, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(215, 'Wakema', 6, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(216, 'Yekyi', 6, '1', 76, 76, '2020-12-07 09:09:20', '2020-12-07 10:12:01'),
(217, 'Zalun', 6, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(218, 'Dawei', 7, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(219, 'Bokpyin', 7, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(220, 'Kawthaung', 7, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(221, 'Kyunsu', 7, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(222, 'Launglon', 7, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(223, 'Myeik', 7, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(224, 'Palaw', 7, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(225, 'Tanintharyi', 7, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(226, 'Thayetchaung', 7, '1', 76, 76, '2020-12-07 09:09:20', '2020-12-07 10:22:38'),
(227, 'Yebyu', 7, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(228, 'Bhamo', 8, '1', 76, 76, '2020-12-07 09:09:20', '2020-12-07 10:07:28'),
(229, 'Chipwi', 8, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(230, 'Hsawlaw', 8, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(231, 'Hsinbo', 8, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(232, 'Hopin', 8, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(233, 'Hpakant', 8, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(234, 'Injaungyang', 8, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(235, 'Kamaing', 8, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(236, 'Kawnglanghpu', 8, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(237, 'Lweje', 8, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(238, 'Machanbaw', 8, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(239, 'Mansi', 8, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(240, 'Mogaung', 8, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(241, 'Mohnyin', 8, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(242, 'Momuk', 8, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(243, 'Myikyina', 8, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(244, 'Putao', 8, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(245, 'Shwegu', 8, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(246, 'Sumprabum', 8, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(247, 'Tanai', 8, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(248, 'Nogmung', 8, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(249, 'Waingmaw', 8, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(250, 'Ywathit', 8, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(251, 'Bawlakhe', 9, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(252, 'Demoso', 9, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(253, 'Hpasawng', 9, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(254, 'Hpruso', 9, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(255, 'Kyephogyi', 9, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(256, 'Loikaw', 9, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(257, 'Mese', 9, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(258, 'Shadaw', 9, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(259, 'Bawgali', 10, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(260, 'Hlaingbwe', 10, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(261, 'Hpa-an', 10, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(262, 'Hpapun', 10, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(263, 'Kamamaung', 10, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(264, 'Kawkareik', 10, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(265, 'Kyain Seikgyi', 10, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(266, 'Kyeikdon', 10, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(267, 'Kyondoe', 10, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(268, 'Leiktho', 10, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(269, 'Myawaddy', 10, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(270, 'Paingkyon', 10, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(271, 'Paingkyon', 10, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(272, 'Payathonzu', 10, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(273, 'Shanywathit', 10, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(274, 'Sukali', 10, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(275, 'Thandang', 10, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(276, 'Thandanggyi', 10, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(277, 'Wawlay', 10, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(278, 'Cikha', 11, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(279, 'Falam', 11, '1', 76, 76, '2020-12-07 09:09:20', '2020-12-07 09:43:27'),
(280, 'Hakua', 11, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(281, 'Hnaring', 11, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(282, 'Htantlang', 11, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(283, 'Kanpetlet', 11, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(284, 'Lalengpi', 11, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(285, 'Matupi', 11, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(286, 'Mindat', 11, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(287, 'Paletwa', 11, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(288, 'Phunom', 11, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(289, 'Rezua', 11, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(290, 'Rihkhawdar', 11, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(291, 'Sami', 11, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(292, 'Tiddim', 11, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(293, 'Ton Zaung', 11, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(294, 'Bilin', 12, '0', 5, 76, '2020-12-07 09:09:20', '2021-07-25 14:12:56'),
(295, 'Chaungzon', 12, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(296, 'Kamarwet', 12, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(297, 'Kyaikhami', 12, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(298, 'Kyaikmaraw', 12, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(299, 'Kyaikto', 12, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(300, 'Mawlamyine', 12, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(301, 'Mudon', 12, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(302, 'Paung', 12, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(303, 'Zin Kyaik', 12, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(304, 'Sittung', 12, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(305, 'Thanbyuzayat', 12, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(306, 'Thaton', 12, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(307, 'Thuwanawaddy', 12, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(308, 'Ye', 12, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(309, 'Khaw Za', 12, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(310, 'Sittwe', 13, '1', 76, 76, '2020-12-07 09:09:20', '2020-12-07 10:22:20'),
(311, 'Ann', 13, '1', 5, 76, '2020-12-07 09:09:20', '2021-02-10 13:19:59'),
(312, 'Buthidaung', 13, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(313, 'Gwa', 13, '1', 5, 76, '2020-12-07 09:09:20', '2020-12-06 21:42:22'),
(314, 'Kyaukphyu', 13, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(315, 'Kyauktaw', 13, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(316, 'Kyeintali', 13, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(317, 'Manaung', 13, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(318, 'Maungdaw', 13, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(319, 'Minbya', 13, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(320, 'Mrauk U', 13, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(321, 'Myebon', 13, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(322, 'Pauktaw', 13, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(323, 'Ponnagyun', 13, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(324, 'Ramree', 13, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(325, 'Rathedaung', 13, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(326, 'Thandwe', 13, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(327, 'Toungup', 13, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(328, 'Taunggyi', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(329, 'Aungba', 14, '1', 5, 76, '2020-12-07 09:09:20', '2020-12-06 21:23:04'),
(330, 'Ayetharyar', 14, '0', 5, 76, '2020-12-07 09:09:20', '2021-07-25 14:11:41'),
(331, 'Chinshwehaw', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(332, 'Hong Pai', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(333, 'Hopang', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(334, 'Hopong', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(335, 'Hseni', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(336, 'Hsi Hseng', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(337, 'Kalaw', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(338, 'Kengtung', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(339, 'Kunhing', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(340, 'Kunlon', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(341, 'Kutkai', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(342, 'Kyaukme', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(343, 'Kyethi', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(344, 'Lai-Hka', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(345, 'Langkho', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(346, 'Lashio', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(347, 'Laukkaing', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(348, 'Lawksawk', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(349, 'Loilen', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(350, 'Mabein', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(351, 'Mantong', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(352, 'Mawkmai', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(353, 'Mong Hpayak', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(354, 'Mong Hsat', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(355, 'Mong Hsu', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(356, 'Mong Khet', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(357, 'Mong Kung', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(358, 'Mong Nai', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(359, 'Mong Pan', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(360, 'Mong Ping', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(361, 'Mong Ton', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(362, 'Mong Yang', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(363, 'Mong Yawng', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(364, 'Mongko', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(365, 'Mongmit', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(366, 'Mongyai', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(367, 'Muse', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(368, 'Nankhan', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(369, 'Nambsan', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(370, 'Namtu', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(371, 'Nansang', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(372, 'Nanghkio', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(373, 'Kyaungshwe', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(374, 'Panglong', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(375, 'Pekon', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(376, 'Pinlaung', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(377, 'Tachileik', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(378, 'Tangyan', 14, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(379, 'Naypyidaw', 0, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(380, 'Ottarathiri', 379, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(381, 'Pobbathiri', 379, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(382, 'Tatkon', 379, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(383, 'Zeyarthiri', 379, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(384, 'Dekhinathiri', 379, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(385, 'Lewe', 379, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(386, 'Pyinmana', 379, '1', 76, 76, '2020-12-07 09:09:20', '2020-12-07 09:37:29'),
(387, 'Zabuthiri', 379, '1', 5, 5, '2020-12-07 09:09:20', '2020-12-07 09:09:20'),
(388, 'nnnnnnnn', 379, '1', 76, 76, '2021-08-23 03:29:08', '2021-08-23 03:29:08'),
(389, 'Bahan', 16, '1', 76, 76, '2021-08-26 04:52:03', '2021-08-26 04:52:03'),
(390, 'Bahan', 16, '1', 76, 76, '2021-08-26 04:52:03', '2021-08-26 04:52:03'),
(391, 'Kyaukse', 60, '1', 76, 76, '2021-08-26 04:56:10', '2021-08-26 04:56:10'),
(392, 'Kyaukse', 60, '1', 1, 1, '2022-01-31 03:43:52', '2022-01-31 03:43:52'),
(393, 'Bahan', 16, '1', 1, 1, '2022-01-31 03:43:52', '2022-01-31 03:43:52'),
(394, 'Bahan', 16, '1', 1, 1, '2022-01-31 03:43:52', '2022-01-31 03:43:52');

-- --------------------------------------------------------

--
-- Table structure for table `main_about_us`
--

CREATE TABLE `main_about_us` (
  `id` int(11) NOT NULL,
  `header` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_us_image` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ready_to_get_start` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sign_up_today` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header_background_color` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header_font_color` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_background_color` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_font_color` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_about_us`
--

INSERT INTO `main_about_us` (`id`, `header`, `about_us_image`, `header_description`, `video`, `ready_to_get_start`, `sign_up_today`, `header_background_color`, `header_font_color`, `footer_background_color`, `footer_font_color`, `updated_at`) VALUES
(1, 'How it Works', '1612314571.png', 'Myanbox is an online portal that help to find inspirations, solutions, tips, ideas and the best interior design company and the best construction company in Myanmar for their home or new home.                        \n                          Myanbox is an online portal that help to find inspirations, solutions, tips, ideas and the best interior design company and the best construction company in Myanmar for their home or new home.                        \n                          Myanbox is an online portal that help to find inspirations, solutions, tips, ideas and the best interior design company and the best construction company in Myanmar for their home or new home.                        \n                          Myanbox is an online portal that help to find inspirations, solutions, tips, ideas and the best interior design company and the best construction company in Myanmar for their home or new home.', 'https://www.youtube.com/watch?v=2AcS1As-dLc', 'Ready To Get Started?', 'Sign Up Today at 10:53AM', '#fc5841', '#ffffff', '#ffd30f', '#000000', '2021-10-29 05:32:01');

-- --------------------------------------------------------

--
-- Table structure for table `main_advertise_with_us`
--

CREATE TABLE `main_advertise_with_us` (
  `id` int(11) NOT NULL,
  `header_image` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_header` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `breadcrump` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `why_myanbox` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `myanbox_dec` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `analyse_customer_data_header` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `analyse_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `analyse_image` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `btn_text` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `benefit_header` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `benefit_breadcrumb` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `advertise_with_us` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `call_now` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `call_now_phone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `call_now_background_color` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `call_now_font_color` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_advertise_with_us`
--

INSERT INTO `main_advertise_with_us` (`id`, `header_image`, `text_header`, `breadcrump`, `why_myanbox`, `myanbox_dec`, `analyse_customer_data_header`, `analyse_description`, `analyse_image`, `btn_text`, `benefit_header`, `benefit_breadcrumb`, `images`, `advertise_with_us`, `call_now`, `call_now_phone`, `call_now_background_color`, `call_now_font_color`, `updated_at`) VALUES
(1, '1608264742.png', 'No.1  PLATFORM as a SERVICE', 'for Construction, Decoration IN MYANMAR', 'Why Myanbox ?', 'As Myanmar’s no.1 leading construction, interior design, inspiration and Renovation Portal, MYANBOX is the clear choice for businesses who wish to profile their companies and showcase their services to homeowners. Our visitors are house-proud, quality-conscious consumers who are willing to spend if the price is right and quality is good. If you have a product or service that would appeal to this discerning and savvy set of people, MYANBOX is the ideal advertising platform for you.', 'Analyze Customer Data', 'Lorem ipsm dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '1607015490.png', 'Know More', 'Benefits of your presence on Myanbox?', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna.', '123.jpg', 'Advertise with us?', 'Call Now', '0934 343 343', '#ffcc32', '#f0f0f0', '2021-07-26 09:55:26');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(781, '2020_09_01_033159_create_project_types_table', 2),
(743, '2014_10_12_000000_create_users_table', 2),
(744, '2014_10_12_100000_create_password_resets_table', 2),
(745, '2020_07_28_020048_create_coin_plans_table', 2),
(746, '2020_07_28_032131_create_user_coins_table', 2),
(747, '2020_07_28_033236_create_freelancer_status_table', 2),
(748, '2020_07_28_033457_create_skill_for_freelancer_table', 2),
(749, '2020_07_28_033514_create_freelancer_comment_table', 2),
(750, '2020_07_28_033529_create_freelancer_project_table', 2),
(751, '2020_07_28_033549_create_daily_product_price_table', 2),
(752, '2020_07_28_033608_create_blog_category_table', 2),
(753, '2020_07_28_033711_create_user_functions_table', 2),
(754, '2020_07_28_033940_create_functions_table', 2),
(755, '2020_07_28_034345_create_freelancers_table', 2),
(756, '2020_07_28_034933_create_company_advertising_table', 2),
(757, '2020_07_28_035425_create_company_advertising_plans_table', 2),
(758, '2020_07_28_035449_create_company_services_table', 2),
(759, '2020_07_28_035510_create_company_package_plan_table', 2),
(760, '2020_07_28_035530_create_package_plan_table', 2),
(761, '2020_07_28_035553_create_project_photo_table', 2),
(787, '2020_07_28_035606_create_project_setting_table', 6),
(763, '2020_07_28_035653_create_contacts_table', 2),
(764, '2020_07_28_035738_create_freelancer_educations_table', 2),
(765, '2020_07_28_040817_create_freelancer_comments_table', 2),
(766, '2020_07_28_041145_create_freelancer_experiences_table', 2),
(767, '2020_07_28_042404_create_locations_table', 2),
(768, '2020_07_28_042744_create_freelancer_skills_table', 2),
(769, '2020_07_28_043449_create_advertising_plans_table', 2),
(770, '2020_07_28_043530_create_advertising_table', 2),
(771, '2020_07_28_043543_create_companies_table', 2),
(785, '2020_07_28_043732_create_quotation_table', 5),
(773, '2020_07_28_043747_create_range_table', 2),
(774, '2020_07_28_043805_create_company_categories_table', 2),
(775, '2020_07_28_043822_create_company_products_table', 2),
(776, '2020_07_28_043836_create_company_projects_table', 2),
(777, '2020_07_28_043851_create_blogs_table', 2),
(193, '2020_08_24_024121_create_add_column_blog_table', 1),
(782, '2020_09_02_083941_create_myanboxtubes_table', 2),
(778, '2020_07_28_043906_create_categories_table', 2),
(779, '2020_08_25_085216_create_freelancer_rates_table', 2),
(780, '2020_08_27_084156_create_freelancer_categories_table', 2),
(788, '2020_09_17_085322_create_quotation_received_user_table', 7),
(789, '2020_10_15_065004_create_news_table', 8),
(790, '2021_10_29_151333_create_currency_units_table', 9),
(791, '2021_11_20_185327_create_business_days_table', 9),
(793, '2021_11_20_192230_create_company_business_days_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `myanboxtubes`
--

CREATE TABLE `myanboxtubes` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package_plans`
--

CREATE TABLE `package_plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `currency_unit_id` int(11) NOT NULL,
  `periods` int(11) NOT NULL COMMENT '0 is unlimited',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_plans`
--

INSERT INTO `package_plans` (`id`, `name`, `price`, `currency_unit_id`, `periods`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Free', '0.00', 1, 0, 1, 1, '2020-09-26 03:56:02', '2020-12-16 18:53:23'),
(2, 'Gold', '100000.00', 1, 45, 1, 1, '2020-09-26 03:56:02', '2022-01-31 09:20:08'),
(3, 'Platinum', '200000.00', 1, 90, 1, 1, '2020-09-26 03:56:02', '2022-01-31 09:19:38');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `privacy`
--

CREATE TABLE `privacy` (
  `id` int(11) NOT NULL,
  `privacy_header` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header_image` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `privacy` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `privacy`
--

INSERT INTO `privacy` (`id`, `privacy_header`, `header_image`, `privacy`, `updated_at`) VALUES
(1, 'Privacy Policy', '1608199740.png', '<div class=\"et_pb_module et_pb_text et_pb_text_1  et_pb_text_align_left et_pb_bg_layout_light\">\r\n				\r\n				\r\n				<div class=\"et_pb_text_inner\"><p><br></p><p>This Privacy Policy (the “Policy”) \r\napplies  to the collection, use and disclosure of an individual \r\ncustomer’s Personal Data (hereinafter defined) arising from goods and/or\r\n services offered by MyanBox Company Limited and/or its affiliates \r\n(collectively referred to as “MyanBox”).</p>\r\n<p>1.General</p>\r\n<p>1.1 This Policy statement provides information on the obligations and\r\n policies of MyanBox in respect of an individual customer’s Personal \r\nData. MyanBox undertakes to use reasonable efforts in applying, where \r\npracticable, those principles and the processes set out herein to its \r\noperations.</p>\r\n<p>1.2 MyanBox’s officers, management, and members of staff shall use \r\nreasonable endeavours to respect the confidentiality of and keep safe \r\nany and all Personal Data collected and/or stored and/or disclosed \r\nand/or used for, or on behalf of, MyanBox. MyanBox shall use reasonable \r\nendeavours to ensure that all collection and/or storage and/or \r\ndisclosure and/or usage of Personal Data by MyanBox shall be done in an \r\nappropriate manner and in accordance with the Act and this Policy. 1.3 \r\nBy interacting with us, submitting information to us, or signing up for \r\nany products or services offered by us, you agree and consent to MyanBox\r\n as well as to our respective representatives and/or agents \r\n(“Representatives”) (collectively referred to herein as “MyanBox”, “us”,\r\n “we” or “our”) collecting, using, disclosing and sharing amongst \r\nthemselves your Personal Data, and disclosing such Personal Data to our \r\nauthorised service providers and relevant third parties in the manner \r\nset forth in this Privacy Statement. 1.4 This Policy supplements but \r\ndoes not supersede nor replace any other consents you may have \r\npreviously provided to us in respect of your Personal Data, and your \r\nconsents herein are additional to any rights which we may have at law to\r\n collect, use or disclose your Personal Data. 1.5 For the purposes of \r\nthis Policy, we ensure that the processing of your personal data \r\ncomplies with this privacy policy and applicable laws in Myanmar, the \r\nlaw protecting Privacy and Security of citizens (Union Parliament law \r\n5/2017)8 March 2017. Such Personal Data shall also refer to that which \r\nis already in the possession of MyanBox or that which shall be collected\r\n by MyanBox in future.</p>\r\n<p>2. Contacting the Data Protection Officer</p>\r\n<p>2.1 Where you legitimately request access to and/or correction of \r\nPersonal Data relating to you, such Personal Data which is in the \r\npossession and control of MyanBox, MyanBox shall provide and/or correct \r\nthat data within thirty (30) days and in a manner in accordance with its\r\n standard procedures as stated hereinafter. 2.2 In accordance with the \r\nAct, MyanBox has established a process for receiving and responding to \r\nany query or complaint that may arise with respect to the application of\r\n this Act. To ensure that MyanBox receives your complaints and \r\nenquiries, please send the same via email to the Data Protection Officer\r\n (the “DPO”) of MyanBox at the following email address: \r\ndpo@myanbox.com.mm<br>2.3 Please note that if your personal data has \r\nbeen provided to us by a third party (e.g. a past or present customer \r\nvia a referral process), you should contact that individual to make such\r\n queries, complaints, and access and correction requests to MyanBox on \r\nyour behalf. 2.4 Should you not wish MyanBox to use your Personal Data \r\nfor any of the purposes listed in Clauses 3.2 to 3.4, or not to receive \r\npromotional materials from MyanBox, you may opt out by sending a clearly\r\n worded email to the DPO via the email address provided in Clause 2.2. \r\nYour request shall be processed within thirty (30) days. Please note \r\nhowever that this may affect our ability to attend to your needs in the \r\nevent where there is already an existing business relationship.</p>\r\n<p>3. Statement of Practices</p>\r\n<p>Types of Personal Data Collected:</p>\r\n<p>3.1 As part of our day-to-day activity, MyanBox may collect from you,\r\n through various means, including via our websites, smart phone \r\napplications, marketing events (e.g. road shows, wholesales, clearance \r\nsales) and any documents and/or forms used by MyanBox from time to time,\r\n some or all of the following Personal Data: • Name (first and surname);\r\n • Postal Address; • Phone number (including mobile); • Office number; •\r\n Email address; • Bank account details; • Passport details (For \r\nNon-Nationality of Myanmar); • Gender; • Personal Data of your emergency\r\n contacts; • Previous and present employment; • Education; • Dietary \r\nrequirements; • Health records and issues; • IP addresses; and • \r\nPhotographs and images;</p>\r\n<p>Cookies</p>\r\n<p>We use cookies on our websites to track website visitorship and \r\nexperience. Most web browsers are designed to accept cookies. If you do \r\nnot wish to receive any cookies, you may set your browser to refuse it.</p>\r\n<p>Purpose of Collection of Personal Data</p>\r\n<p>3.2 The above Personal Data mentioned in Clause 3.1 is collected for \r\nthe purposes of processing your requests for being matched to certain \r\nservice providers, to conduct internal job training; to conduct market \r\nresearch and client surveys to enhance the provision of our services; to\r\n contact you directly regarding services which may be of interest \r\nthrough voice calls; text messages; e-mail; direct mail and/or facsimile\r\n messages; to respond to queries and feedback; for identification \r\npurposes; maintaining and updating your particulars; and informing you \r\nof new developments and services of MyanBox and other third parties \r\nwhich we are associated with.</p>\r\n<p>Disclosure of Personal Data</p>\r\n<p>3.3 In order to carry out the functions described above, MyanBox may,\r\n from time to time, disclose your Personal Data between MyanBox’s \r\ncompanies.</p>\r\n<p>3.4 Without derogating from any of the above, MyanBox may also disclose your Personal Data to the following third parties:</p>\r\n<p>• Regulators and law enforcement officials;</p>\r\n<p>• Lawyers;</p>\r\n<p>• Auditors;</p>\r\n<p>• Third party service providers and consultants;</p>\r\n<p>• Credit, debit and charge card companies, banks and other entities processing payment;</p>\r\n<p>• Potential buyers or investors of MyanBox or any of MyanBox’s companies; and</p>\r\n<p>• Any agent or sub-contractor acting on MyanBox’s behalf for the provision of MyanBox’s services.</p>\r\n<p>3.5 MyanBox may disclose your Personal Data to the above mentioned \r\nparties also in the occurrence of any of the following events:</p>\r\n<p>• To the extent that MyanBox is required to do so by the law;</p>\r\n<p>• In connection with any legal proceedings or prospective legal proceedings;</p>\r\n<p>• To establish, exercise or defend MyanBox’s legal rights;</p>\r\n<p>• To the purchaser (or prospective purchaser) of any business or asset which MyanBox is (or is contemplating) selling;</p>\r\n<p>• To any person and/or entity for the purpose of processing such information on MyanBox’s behalf;</p>\r\n<p>• To third parties who provide services to MyanBox or on its behalf;</p>\r\n<p>• To third parties who MyanBox provides services to;</p>\r\n<p>• To any third party that purchases MyanBox or MyanBox’s business or any part of MyanBox or MyanBox’s business;</p>\r\n<p>• With your consent; and</p>\r\n<p>• For the purposes of disaster recovery.</p>\r\n<p>Optional Provision of Personal Data</p>\r\n<p>3.5 In some instances, you may also be requested to provide certain \r\nPersonal Data that may be used to further improve MyanBox’s services \r\nand/or better tailor the type of information presented to you. In most \r\ncases, this type of data is optional although, where the requested \r\nservice is a personalised service dependent on your providing all \r\nrequested data, failure to provide the requested data may prevent \r\nMyanBox from providing the service to you. This type of data includes, \r\nbut is not limited to:</p>\r\n<p>• Your age;</p>\r\n<p>• Your gender;</p>\r\n<p>• Your race;</p>\r\n<p>• Other related products and services subscribed to; and</p>\r\n<p>• Family and household demographics.</p>\r\n<p>3.7 Under certain circumstances, telephone calls made to any of \r\nMyanBox’s companies to order and/or service hotlines and/or inquiry \r\ntelephone numbers are recorded for the purposes of quality control, \r\nappraisal, as well as staff management and development. In such an \r\nevent, by agreeing to this Policy, you hereby give your consent for the \r\ncollection, use and disclosure of such Personal Data for the purposes of\r\n our records, following up with your enquiry and/or transaction, and for\r\n quality control and training purposes.</p>\r\n<p>4. Transfer of Personal Data Overseas</p>\r\n<p>Your Personal Data may be processed by MyanBox, its affiliates, \r\nagents and third parties providing services to MyanBox, in jurisdictions\r\n outside of Singapore. In this event, MyanBox will comply with the terms\r\n of the Act.</p>\r\n<p>5. Accuracy of Personal Data</p>\r\n<p>Where possible, MyanBox will validate data provided using generally \r\naccepted practices and guidelines. This includes the use of checksum \r\nverification on some numeric fields such as account numbers or credit \r\ncard numbers. In some instances, MyanBox is able to validate the data \r\nprovided against pre-existing data held by MyanBox. In some cases, \r\nMyanBox is required to see original documentation before we may use the \r\nPersonal Data such as with Personal Identifiers and/or proof of address.\r\n To assist in ensuring the accuracy of your Personal Data in the \r\npossession of MyanBox, please inform us of any updates of any parts of \r\nyour Personal Data by sending a clearly worded email to the DPO at the \r\nemail address provided at Section 2.2.</p>\r\n<p>6. Protection of Personal Data</p>\r\n<p>MyanBox uses commercially reasonable physical, managerial, and \r\ntechnical safeguards to preserve the integrity and security of your \r\nPersonal Data and will not knowingly allow access to this data to anyone\r\n outside MyanBox, other than to you or as described in this Policy. \r\nHowever, MyanBox cannot ensure or warrant the security of any \r\ninformation you transmit to MyanBox and you do so entirely at your own \r\nrisk. In particular, MyanBox does not warrant that such information may \r\nnot be accessed, altered, collected, copied, destroyed, disposed of, \r\ndisclosed or modified by breach of any of MyanBox’s physical, technical,\r\n or managerial safeguards.</p>\r\n<p>7. Access and Correction of Personal Data</p>\r\n<p>7.1 In accordance with Clause 2.1 of this Policy, you have the right to:</p>\r\n<p>a) check whether MyanBox holds any Personal Data relating to you and, if so, obtain copies of such data; and</p>\r\n<p>b) require MyanBox to correct any Personal Data relating to you which is inaccurate for the purpose for which it is being used.</p>\r\n<p>7.2 MyanBox reserves the right to charge a reasonable administrative \r\nfee in order to meet your requests under Clause 7.1(a). Upon payment of \r\nthe requisite fee under Clause 7.1(a) and/or receipt of your request \r\nunder Clause 7.1(b), your request shall be processed within thirty (30) \r\ndays.</p>\r\n<p>7.3 If you wish to verify the details you have submitted to MyanBox \r\nor if you wish to check on the manner in which MyanBox uses and \r\nprocesses your personal data, MyanBox’s security procedures mean that \r\nMyanBox may request proof of identity before we reveal information. This\r\n proof of identity will take the form of full details of name, NRIC or \r\nPassport or Fin number. You must therefore keep this information safe as\r\n you will be responsible for any action which MyanBox takes in response \r\nto a request from someone using the aforesaid details.</p>\r\n<p>8. Storage and Retention of Personal Data</p>\r\n<p>MyanBox will delete, as reasonably possible, or otherwise anonymise \r\nany Personal Data in the event that the Personal Data is not required \r\nfor any reasonable business or legal purposes of MyanBox and where the \r\nPersonal Data is deleted from MyanBox’s electronic, manual, and other \r\nfiling systems in accordance with MyanBox’s internal procedures and/or \r\nother agreements.</p>\r\n<p>9. Contacting you</p>\r\n<p>To the extent that any of the communication means which you have \r\nprovided MyanBox with (which may include, your telephone number and fax \r\nnumber) is/will be listed on the Do Not Call Registry (the “DNC”), by \r\nchecking the box on the Consent Form, or by any other means of \r\nindication, you hereby grant MyanBox your clear and unambiguous consent \r\nto contact you using all of your communication means you have provided \r\nto MyanBox including using via voice calls, SMS, WhatsApp, MMS, fax or \r\nother similar communications applications or methods, for the purposes \r\nas stated above in Paragraph 3.2. This will ensure your continued \r\nenjoyment of MyanBox’s services.</p>\r\n<p>10. Change Policy</p>\r\n<p>MyanBox reserves the right to alter any of the clauses contained \r\nherein in compliance with local legislation, and for any other purpose \r\ndeemed reasonably necessary by MyanBox. You should look at these terms \r\nregularly. If you do not agree to the modified terms, you should inform \r\nus as soon as possible of the terms to which you do not consent. Pending\r\n such notice, if there is any inconsistency between these terms and the \r\nadditional terms, the additional terms will prevail to the extent of the\r\n inconsistency.</p>\r\n<p>11. Governing Law</p>\r\n<p>This Policy is governed by and shall be construed in accordance with \r\nthe laws of Myanmar. You hereby submit to the non-exclusive jurisdiction\r\n of the Myanmar courts.</p>\r\n<p>12. Miscellaneous</p>\r\n<p> </p>\r\n<p>12.1 This Policy only applies to the collection and use of Personal \r\nData by MyanBox. It does not cover third party sites to which we provide\r\n links, even if such sites are co-branded with our logo. MyanBox does \r\nnot share your Personal Data with third party websites. MyanBox is not \r\nresponsible for the privacy and conduct practices of these third party \r\nwebsites, so you should read their own privacy policies before \r\ndisclosure of any Personal Data to these websites.</p>\r\n<p>12.2 MyanBox will not sell your personal information to any third \r\nparty without your permission, but we cannot be responsible or held \r\nliable for the actions of third party sites which you may have linked or\r\n been directed to MyanBox’s website.</p>\r\n<p>12.3 MyanBox’s websites do not target and are not intended to attract\r\n children under the age of 18 years old. MyanBox does not knowingly \r\nsolicit personal information from children under the age of eighteen \r\n(18) years old or send them requests for personal data.</p></div></div>\">\r\n                                                                <div class=\"et_pb_column et_pb_column_4_4 et_pb_column_1  et_pb_css_mix_blend_mode_passthrough et-last-child\">\r\n				\r\n				\r\n				<div class=\"et_pb_module et_pb_text et_pb_text_1  et_pb_text_align_left et_pb_bg_layout_light\">\r\n				\r\n				\r\n				<div class=\"et_pb_text_inner\"><p>This Privacy Policy (the “Policy”) \r\napplies to the collection, use and disclosure of an individual \r\ncustomer’s Personal Data (hereinafter defined) arising from goods and/or\r\n services offered by MyanBox Company Limited and/or its affiliates \r\n(collectively referred to as “MyanBox”).</p>\r\n<p>1.General</p>\r\n<p>1.1 This Policy statement provides information on the obligations and\r\n policies of MyanBox in respect of an individual customer’s Personal \r\nData. MyanBox undertakes to use reasonable efforts in applying, where \r\npracticable, those principles and the processes set out herein to its \r\noperations.</p>\r\n<p>1.2 MyanBox’s officers, management, and members of staff shall use \r\nreasonable endeavours to respect the confidentiality of and keep safe \r\nany and all Personal Data collected and/or stored and/or disclosed \r\nand/or used for, or on behalf of, MyanBox. MyanBox shall use reasonable \r\nendeavours to ensure that all collection and/or storage and/or \r\ndisclosure and/or usage of Personal Data by MyanBox shall be done in an \r\nappropriate manner and in accordance with the Act and this Policy. 1.3 \r\nBy interacting with us, submitting information to us, or signing up for \r\nany products or services offered by us, you agree and consent to MyanBox\r\n as well as to our respective representatives and/or agents \r\n(“Representatives”) (collectively referred to herein as “MyanBox”, “us”,\r\n “we” or “our”) collecting, using, disclosing and sharing amongst \r\nthemselves your Personal Data, and disclosing such Personal Data to our \r\nauthorised service providers and relevant third parties in the manner \r\nset forth in this Privacy Statement. 1.4 This Policy supplements but \r\ndoes not supersede nor replace any other consents you may have \r\npreviously provided to us in respect of your Personal Data, and your \r\nconsents herein are additional to any rights which we may have at law to\r\n collect, use or disclose your Personal Data. 1.5 For the purposes of \r\nthis Policy, we ensure that the processing of your personal data \r\ncomplies with this privacy policy and applicable laws in Myanmar, the \r\nlaw protecting Privacy and Security of citizens (Union Parliament law \r\n5/2017)8 March 2017. Such Personal Data shall also refer to that which \r\nis already in the possession of MyanBox or that which shall be collected\r\n by MyanBox in future.</p>\r\n<p>2. Contacting the Data Protection Officer</p>\r\n<p>2.1 Where you legitimately request access to and/or correction of \r\nPersonal Data relating to you, such Personal Data which is in the \r\npossession and control of MyanBox, MyanBox shall provide and/or correct \r\nthat data within thirty (30) days and in a manner in accordance with its\r\n standard procedures as stated hereinafter. 2.2 In accordance with the \r\nAct, MyanBox has established a process for receiving and responding to \r\nany query or complaint that may arise with respect to the application of\r\n this Act. To ensure that MyanBox receives your complaints and \r\nenquiries, please send the same via email to the Data Protection Officer\r\n (the “DPO”) of MyanBox at the following email address: \r\ndpo@myanbox.com.mm<br>2.3 Please note that if your personal data has \r\nbeen provided to us by a third party (e.g. a past or present customer \r\nvia a referral process), you should contact that individual to make such\r\n queries, complaints, and access and correction requests to MyanBox on \r\nyour behalf. 2.4 Should you not wish MyanBox to use your Personal Data \r\nfor any of the purposes listed in Clauses 3.2 to 3.4, or not to receive \r\npromotional materials from MyanBox, you may opt out by sending a clearly\r\n worded email to the DPO via the email address provided in Clause 2.2. \r\nYour request shall be processed within thirty (30) days. Please note \r\nhowever that this may affect our ability to attend to your needs in the \r\nevent where there is already an existing business relationship.</p>\r\n<p>3. Statement of Practices</p>\r\n<p>Types of Personal Data Collected:</p>\r\n<p>3.1 As part of our day-to-day activity, MyanBox may collect from you,\r\n through various means, including via our websites, smart phone \r\napplications, marketing events (e.g. road shows, wholesales, clearance \r\nsales) and any documents and/or forms used by MyanBox from time to time,\r\n some or all of the following Personal Data: • Name (first and surname);\r\n • Postal Address; • Phone number (including mobile); • Office number; •\r\n Email address; • Bank account details; • Passport details (For \r\nNon-Nationality of Myanmar); • Gender; • Personal Data of your emergency\r\n contacts; • Previous and present employment; • Education; • Dietary \r\nrequirements; • Health records and issues; • IP addresses; and • \r\nPhotographs and images;</p>\r\n<p>Cookies</p>\r\n<p>We use cookies on our websites to track website visitorship and \r\nexperience. Most web browsers are designed to accept cookies. If you do \r\nnot wish to receive any cookies, you may set your browser to refuse it.</p>\r\n<p>Purpose of Collection of Personal Data</p>\r\n<p>3.2 The above Personal Data mentioned in Clause 3.1 is collected for \r\nthe purposes of processing your requests for being matched to certain \r\nservice providers, to conduct internal job training; to conduct market \r\nresearch and client surveys to enhance the provision of our services; to\r\n contact you directly regarding services which may be of interest \r\nthrough voice calls; text messages; e-mail; direct mail and/or facsimile\r\n messages; to respond to queries and feedback; for identification \r\npurposes; maintaining and updating your particulars; and informing you \r\nof new developments and services of MyanBox and other third parties \r\nwhich we are associated with.</p>\r\n<p>Disclosure of Personal Data</p>\r\n<p>3.3 In order to carry out the functions described above, MyanBox may,\r\n from time to time, disclose your Personal Data between MyanBox’s \r\ncompanies.</p>\r\n<p>3.4 Without derogating from any of the above, MyanBox may also disclose your Personal Data to the following third parties:</p>\r\n<p>• Regulators and law enforcement officials;</p>\r\n<p>• Lawyers;</p>\r\n<p>• Auditors;</p>\r\n<p>• Third party service providers and consultants;</p>\r\n<p>• Credit, debit and charge card companies, banks and other entities processing payment;</p>\r\n<p>• Potential buyers or investors of MyanBox or any of MyanBox’s companies; and</p>\r\n<p>• Any agent or sub-contractor acting on MyanBox’s behalf for the provision of MyanBox’s services.</p>\r\n<p>3.5 MyanBox may disclose your Personal Data to the above mentioned \r\nparties also in the occurrence of any of the following events:</p>\r\n<p>• To the extent that MyanBox is required to do so by the law;</p>\r\n<p>• In connection with any legal proceedings or prospective legal proceedings;</p>\r\n<p>• To establish, exercise or defend MyanBox’s legal rights;</p>\r\n<p>• To the purchaser (or prospective purchaser) of any business or asset which MyanBox is (or is contemplating) selling;</p>\r\n<p>• To any person and/or entity for the purpose of processing such information on MyanBox’s behalf;</p>\r\n<p>• To third parties who provide services to MyanBox or on its behalf;</p>\r\n<p>• To third parties who MyanBox provides services to;</p>\r\n<p>• To any third party that purchases MyanBox or MyanBox’s business or any part of MyanBox or MyanBox’s business;</p>\r\n<p>• With your consent; and</p>\r\n<p>• For the purposes of disaster recovery.</p>\r\n<p>Optional Provision of Personal Data</p>\r\n<p>3.5 In some instances, you may also be requested to provide certain \r\nPersonal Data that may be used to further improve MyanBox’s services \r\nand/or better tailor the type of information presented to you. In most \r\ncases, this type of data is optional although, where the requested \r\nservice is a personalised service dependent on your providing all \r\nrequested data, failure to provide the requested data may prevent \r\nMyanBox from providing the service to you. This type of data includes, \r\nbut is not limited to:</p>\r\n<p>• Your age;</p>\r\n<p>• Your gender;</p>\r\n<p>• Your race;</p>\r\n<p>• Other related products and services subscribed to; and</p>\r\n<p>• Family and household demographics.</p>\r\n<p>3.7 Under certain circumstances, telephone calls made to any of \r\nMyanBox’s companies to order and/or service hotlines and/or inquiry \r\ntelephone numbers are recorded for the purposes of quality control, \r\nappraisal, as well as staff management and development. In such an \r\nevent, by agreeing to this Policy, you hereby give your consent for the \r\ncollection, use and disclosure of such Personal Data for the purposes of\r\n our records, following up with your enquiry and/or transaction, and for\r\n quality control and training purposes.</p>\r\n<p>4. Transfer of Personal Data Overseas</p>\r\n<p>Your Personal Data may be processed by MyanBox, its affiliates, \r\nagents and third parties providing services to MyanBox, in jurisdictions\r\n outside of Singapore. In this event, MyanBox will comply with the terms\r\n of the Act.</p>\r\n<p>5. Accuracy of Personal Data</p>\r\n<p>Where possible, MyanBox will validate data provided using generally \r\naccepted practices and guidelines. This includes the use of checksum \r\nverification on some numeric fields such as account numbers or credit \r\ncard numbers. In some instances, MyanBox is able to validate the data \r\nprovided against pre-existing data held by MyanBox. In some cases, \r\nMyanBox is required to see original documentation before we may use the \r\nPersonal Data such as with Personal Identifiers and/or proof of address.\r\n To assist in ensuring the accuracy of your Personal Data in the \r\npossession of MyanBox, please inform us of any updates of any parts of \r\nyour Personal Data by sending a clearly worded email to the DPO at the \r\nemail address provided at Section 2.2.</p>\r\n<p>6. Protection of Personal Data</p>\r\n<p>MyanBox uses commercially reasonable physical, managerial, and \r\ntechnical safeguards to preserve the integrity and security of your \r\nPersonal Data and will not knowingly allow access to this data to anyone\r\n outside MyanBox, other than to you or as described in this Policy. \r\nHowever, MyanBox cannot ensure or warrant the security of any \r\ninformation you transmit to MyanBox and you do so entirely at your own \r\nrisk. In particular, MyanBox does not warrant that such information may \r\nnot be accessed, altered, collected, copied, destroyed, disposed of, \r\ndisclosed or modified by breach of any of MyanBox’s physical, technical,\r\n or managerial safeguards.</p>\r\n<p>7. Access and Correction of Personal Data</p>\r\n<p>7.1 In accordance with Clause 2.1 of this Policy, you have the right to:</p>\r\n<p>a) check whether MyanBox holds any Personal Data relating to you and, if so, obtain copies of such data; and</p>\r\n<p>b) require MyanBox to correct any Personal Data relating to you which is inaccurate for the purpose for which it is being used.</p>\r\n<p>7.2 MyanBox reserves the right to charge a reasonable administrative \r\nfee in order to meet your requests under Clause 7.1(a). Upon payment of \r\nthe requisite fee under Clause 7.1(a) and/or receipt of your request \r\nunder Clause 7.1(b), your request shall be processed within thirty (30) \r\ndays.</p>\r\n<p>7.3 If you wish to verify the details you have submitted to MyanBox \r\nor if you wish to check on the manner in which MyanBox uses and \r\nprocesses your personal data, MyanBox’s security procedures mean that \r\nMyanBox may request proof of identity before we reveal information. This\r\n proof of identity will take the form of full details of name, NRIC or \r\nPassport or Fin number. You must therefore keep this information safe as\r\n you will be responsible for any action which MyanBox takes in response \r\nto a request from someone using the aforesaid details.</p>\r\n<p>8. Storage and Retention of Personal Data</p>\r\n<p>MyanBox will delete, as reasonably possible, or otherwise anonymise \r\nany Personal Data in the event that the Personal Data is not required \r\nfor any reasonable business or legal purposes of MyanBox and where the \r\nPersonal Data is deleted from MyanBox’s electronic, manual, and other \r\nfiling systems in accordance with MyanBox’s internal procedures and/or \r\nother agreements.</p>\r\n<p>9. Contacting you</p>\r\n<p>To the extent that any of the communication means which you have \r\nprovided MyanBox with (which may include, your telephone number and fax \r\nnumber) is/will be listed on the Do Not Call Registry (the “DNC”), by \r\nchecking the box on the Consent Form, or by any other means of \r\nindication, you hereby grant MyanBox your clear and unambiguous consent \r\nto contact you using all of your communication means you have provided \r\nto MyanBox including using via voice calls, SMS, WhatsApp, MMS, fax or \r\nother similar communications applications or methods, for the purposes \r\nas stated above in Paragraph 3.2. This will ensure your continued \r\nenjoyment of MyanBox’s services.</p>\r\n<p>10. Change Policy</p>\r\n<p>MyanBox reserves the right to alter any of the clauses contained \r\nherein in compliance with local legislation, and for any other purpose \r\ndeemed reasonably necessary by MyanBox. You should look at these terms \r\nregularly. If you do not agree to the modified terms, you should inform \r\nus as soon as possible of the terms to which you do not consent. Pending\r\n such notice, if there is any inconsistency between these terms and the \r\nadditional terms, the additional terms will prevail to the extent of the\r\n inconsistency.</p>\r\n<p>11. Governing Law</p>\r\n<p>This Policy is governed by and shall be construed in accordance with \r\nthe laws of Myanmar. You hereby submit to the non-exclusive jurisdiction\r\n of the Myanmar courts.</p>\r\n<p>12. Miscellaneous</p>\r\n<p> </p>\r\n<p>12.1 This Policy only applies to the collection and use of Personal \r\nData by MyanBox. It does not cover third party sites to which we provide\r\n links, even if such sites are co-branded with our logo. MyanBox does \r\nnot share your Personal Data with third party websites. MyanBox is not \r\nresponsible for the privacy and conduct practices of these third party \r\nwebsites, so you should read their own privacy policies before \r\ndisclosure of any Personal Data to these websites.</p>\r\n<p>12.2 MyanBox will not sell your personal information to any third \r\nparty without your permission, but we cannot be responsible or held \r\nliable for the actions of third party sites which you may have linked or\r\n been directed to MyanBox’s website.</p>\r\n<p>12.3 MyanBox’s websites do not target and are not intended to attract\r\n children under the age of 18 years old. MyanBox does not knowingly \r\nsolicit personal information from children under the age of eighteen \r\n(18) years old or send them requests for personal data.</p></div></div></div>', '2022-03-22 03:27:23');

-- --------------------------------------------------------

--
-- Table structure for table `project_photos`
--

CREATE TABLE `project_photos` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_project_id` int(11) NOT NULL,
  `photo` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_photos`
--

INSERT INTO `project_photos` (`id`, `company_project_id`, `photo`, `image_title`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, '1644591553.png', 'test', 1, 1, '2022-02-11 14:02:29', '2022-02-11 14:02:29'),
(2, 2, '1644601493.png', 'My Par', 13, 13, '2022-02-11 17:02:17', '2022-02-11 17:02:17'),
(3, 3, '1644601699.png', 'Po Po', 13, 13, '2022-02-11 17:02:18', '2022-02-11 17:02:18');

-- --------------------------------------------------------

--
-- Table structure for table `project_settings`
--

CREATE TABLE `project_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `home_nav_first_background` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_nav_second_background` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_nav_font_color` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_nav_first_background_and_icon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_nav_second_background` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_nav_font_color` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_nav_first_background_and_icon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_nav_second_background` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_nav_font_color` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reno_nav_first_background_and_icon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reno_nav_second_background` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reno_nav_font_color` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `freelancer_nav_first_background_and_icon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `freelancer_nav_second` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `freelancer_nav_font_color` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_background` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_font_color` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `copyright_background` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `copyright_font_color` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pinterest_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkedin_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website_mail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_mail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_login_coin` int(11) NOT NULL,
  `user_register_coin` int(11) NOT NULL,
  `company_register_coin` int(11) NOT NULL,
  `quotation_coin` int(11) NOT NULL,
  `company_login_coin` int(11) NOT NULL,
  `member_default_logo` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `freelancer_default_logo` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_default_logo` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_default_logo` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reno_default_logo` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_default_logo` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_default_background_image` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_us` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `freelancer_detail_image` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_default_background_image` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reno_default_background_image` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_background_image` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_nav_first_background_and_icon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_nav_second_background` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_nav_font_color` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_category_default_color` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_list_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_list_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reno_list_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `freelancer_list_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_list_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `myanboxtube_list_image` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `myanboxtube_default_image` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `privacy` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `terms_and_condition` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_settings`
--

INSERT INTO `project_settings` (`id`, `home_nav_first_background`, `home_nav_second_background`, `home_nav_font_color`, `supplier_nav_first_background_and_icon`, `supplier_nav_second_background`, `supplier_nav_font_color`, `service_nav_first_background_and_icon`, `service_nav_second_background`, `service_nav_font_color`, `reno_nav_first_background_and_icon`, `reno_nav_second_background`, `reno_nav_font_color`, `freelancer_nav_first_background_and_icon`, `freelancer_nav_second`, `freelancer_nav_font_color`, `footer_background`, `footer_font_color`, `copyright_background`, `copyright_font_color`, `facebook_link`, `instagram_link`, `youtube_link`, `pinterest_link`, `linkedin_link`, `website_mail`, `website_name`, `other_mail`, `phone`, `address`, `user_login_coin`, `user_register_coin`, `company_register_coin`, `quotation_coin`, `company_login_coin`, `member_default_logo`, `freelancer_default_logo`, `service_default_logo`, `supplier_default_logo`, `reno_default_logo`, `admin_default_logo`, `service_default_background_image`, `about_us`, `created_at`, `updated_at`, `freelancer_detail_image`, `supplier_default_background_image`, `reno_default_background_image`, `member_background_image`, `blog_nav_first_background_and_icon`, `blog_nav_second_background`, `blog_nav_font_color`, `home_category_default_color`, `service_list_image`, `supplier_list_image`, `reno_list_image`, `freelancer_list_image`, `blog_list_image`, `myanboxtube_list_image`, `myanboxtube_default_image`, `privacy`, `terms_and_condition`) VALUES
(1, '#ffcc46', '#ffcc46', '#ffffff', '#44d8fd', '#33bbff', '#ffffff', '#d0b52f', '#fdc90d', '#ffffff', '#e18d0e', '#cba415', '#ffffff', '#fcb80b', '#fcb80b', '#ffffff', '#ffcc00', '#a33333', '', '#ffffff', 'https://web.facebook.com/', 'https://www.instagram.com/?hl=en', 'https://www.facebook.com/', 'https://www.pinterest.com/', 'https://www.linkedin.com/', 'admin@myanbox.com.mm', 'https://www.facebook.com/', 'dop@myanbox.com.mm', '+959 453320,099789356', 'No.3 Hospital Street, Yankin Township', 100, 1000, 10000, 200, 200, '1635312560.png', '1635312628.png', '1635313060.png', '1623340664.png', '1623340714.png', '1635312376.png', '1608269145.png', '<span id=\"docs-internal-guid-d97f2b3f-7fff-37db-495a-a6d46e5ed223\"><p style=\"line-height: 1.8; margin-top: 0pt; margin-bottom: 0pt; padding: 0pt 0pt 26pt;\"><font face=\"Arial\"><span style=\"font-size: 14px; white-space: pre-wrap;\">Myanbox is an online portal for Myanmar homeowners and homeowners to find inspirations, solutions, tips, ideas and the best interior design company and the best construction company in Myanmar for their home or new home.\n\n<b>Discover:</b>\n\nhow anyone can create a dream home out of their limited budget for construction                </span></font></p></span>', '2020-10-08 22:40:03', '2021-10-28 05:40:49', '1608270864.png', '1608269822.png', '1608267022.png', '1615808387.png', '#000000', '#000000', '#ffffff', '', '1608267007.png', '1604490958.png', '1608267829.png', '1608270373.png', '1635401396.png', '1623821313.png', '1635401424.png', '<p><br></p><h1 dir=\"ltr\" style=\"line-height:1.366668;text-align: center;margin-top:0pt;margin-bottom:0pt;\" id=\"docs-internal-guid-d6184fbe-7fff-f2aa-2590-2e9165740548\"><span style=\"font-size:19pt;font-family:Roboto,sans-serif;color:#000000;background-color:#ffffff;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\"><br></span></h1><h1 dir=\"ltr\" style=\"line-height:1.366668;text-align: center;margin-top:0pt;margin-bottom:0pt;\" id=\"docs-internal-guid-d6184fbe-7fff-f2aa-2590-2e9165740548\"><span style=\"font-size:19pt;font-family:Roboto,sans-serif;color:#000000;background-color:#ffffff;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Privacy Policy</span> <br></h1><p><br></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">This Privacy Policy (the “Policy”) applies to the collection, use and disclosure of an individual customer’s Personal Data (hereinafter defined) arising from goods and/or services offered by MyanBox Company Limited and/or its affiliates (collectively referred to as “MyanBox”).</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">1.General</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">1.1 This Policy statement provides information on the obligations and policies of MyanBox in respect of an individual customer’s Personal Data. MyanBox undertakes to use reasonable efforts in applying, where practicable, those principles and the processes set out herein to its operations.                                                                                                                                                                                                      </span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">1.2 MyanBox’s officers, management, and members of staff shall use reasonable endeavours to respect the confidentiality of and keep safe any and all Personal Data collected and/or stored and/or disclosed and/or used for, or on behalf of, MyanBox. MyanBox shall use reasonable endeavours to ensure that all collection and/or storage and/or disclosure and/or usage of Personal Data by MyanBox shall be done in an appropriate manner and in accordance with the Act and this Policy.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         1.3 By interacting with us, submitting information to us, or signing up for any products or services offered by us, you agree and consent to MyanBox as well as to our respective representatives and/or agents (“Representatives”) (collectively referred to herein as “MyanBox”, “us”, “we” or “our”) collecting, using, disclosing and sharing amongst themselves your Personal Data, and disclosing such Personal Data to our authorised service providers and relevant third parties in the manner set forth in this Privacy Statement.                                                                                                                                                                                                                                                                                    1.4 This Policy supplements but does not supersede nor replace any other consents you may have previously provided to us in respect of your Personal Data, and your consents herein are additional to any rights which we may have at law to collect, use or disclose your Personal Data.                                                  1.5 For the purposes of this Policy, we </span><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#333333;background-color:#ffffff;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">ensure that the processing of your personal data complies with this privacy policy and applicable laws in Myanmar, the law protecting Privacy and Security of citizens (Union Parliament law 5/2017)8 March 2017</span><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">. Such Personal Data shall also refer to that which is already in the possession of MyanBox or that which shall be collected by MyanBox in future.</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">2. Contacting the Data Protection Officer</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">2.1 Where you legitimately request access to and/or correction of Personal Data relating to you, such Personal Data which is in the possession and control of MyanBox, MyanBox shall provide and/or correct that data within thirty (30) days and in a manner in accordance with its standard procedures as stated hereinafter.                                                                                                                                                                                          2.2 In accordance with the Act, MyanBox has established a process for receiving and responding to any query or complaint that may arise with respect to the application of this Act. To ensure that MyanBox receives your complaints and enquiries, please send the same via email to the Data Protection Officer (the “DPO”) of MyanBox at the following email address: </span><a href=\"mailto:dpo@myanbox.com.mm\" style=\"text-decoration:none;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#1155cc;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:underline;-webkit-text-decoration-skip:none;text-decoration-skip-ink:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">dpo@myanbox.com.mm<br></span></a><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">2.3 Please note that if your personal data has been provided to us by a third party (e.g. a past or present customer via a referral process), you should contact that individual to make such queries, complaints, and access and correction requests to MyanBox on your behalf.                                            2.4 Should you not wish MyanBox to use your Personal Data for any of the purposes listed in Clauses 3.2 to 3.4, or not to receive promotional materials from MyanBox, you may opt out by sending a clearly worded email to the DPO via the email address provided in Clause 2.2. Your request shall be processed within thirty (30) days. Please note however that this may affect our ability to attend to your needs in the event where there is already an existing business relationship.</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">3. Statement of Practices</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Types of Personal Data Collected:</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">3.1 As part of our day-to-day activity, MyanBox may collect from you, through various means, including via our websites, smart phone applications, marketing events (e.g. road shows, wholesales, clearance sales) and any documents and/or forms used by MyanBox from time to time, some or all of the following Personal Data:                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         • Name (first and surname);                                                                                                                                                                                                                                                                                                                                                                                                                                                                         • Postal Address;                                                                                                                                                                                                                                                                                                                                                                                                                                                   • Phone number (including mobile);                                                                                                                                                                                                                                                                                                                                                                                                     • Office number;                                                                                                                                                                                                                                                                                                                                                                                                                                                                             • Email address;                                                                                                                                                                                                                                                                                                                                                                                                                                                                 • Bank account details;                                                                                                                                                                                                                                                                                                                                                                                                                          • Passport details (For Non-Nationality of Myanmar);                                                                                                                                                                                                                                                                                                                                          • Gender;                                                                                                                                                                                                                                                                                                                                                                                                                                  • Personal Data of your emergency contacts;                                                                                                                                                                                                                                                                                                                                                                                     • Previous and present employment;                                                                                                                                                                                                                                                                                                                                                                                                                             • Education;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                • Dietary requirements;                                                                                                                                                                                                                                                                                                                                                                                                                                                                         • Health records and issues;                                                                                                                                                                                                                                                                                                                                                                                                                                                                 • IP addresses; and                                                                                                                                                                                                                                                                                                                                                                                                                                                                   • Photographs and images;                                                                                                                                                                                                                   </span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Cookies</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">We use cookies on our websites to track website visitorship and experience. Most web browsers are designed to accept cookies. If you do not wish to receive any cookies, you may set your browser to refuse it.</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Purpose of Collection of Personal Data</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">3.2 The above Personal Data mentioned in Clause 3.1 is collected for the purposes of processing your requests for being matched to certain service providers, to conduct internal job training; to conduct market research and client surveys to enhance the provision of our services; to contact you directly regarding services which may be of interest through voice calls; text messages; e-mail; direct mail and/or facsimile messages; to respond to queries and feedback; for identification purposes; maintaining and updating your particulars; and informing you of new developments and services of MyanBox and other third parties which we are associated with.</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Disclosure of Personal Data</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">3.3 In order to carry out the functions described above, MyanBox may, from time to time, disclose your Personal Data between MyanBox’s companies.</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">3.4 Without derogating from any of the above, MyanBox may also disclose your Personal Data to the following third parties:</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">• Regulators and law enforcement officials;</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">• Lawyers;</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">• Auditors;</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">• Third party service providers and consultants;</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">• Credit, debit and charge card companies, banks and other entities processing payment;</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">• Potential buyers or investors of MyanBox or any of MyanBox’s companies; and</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">• Any agent or sub-contractor acting on MyanBox’s behalf for the provision of MyanBox’s services.</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">3.5 MyanBox may disclose your Personal Data to the above mentioned parties also in the occurrence of any of the following events:</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">• To the extent that MyanBox is required to do so by the law;</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">• In connection with any legal proceedings or prospective legal proceedings;</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">• To establish, exercise or defend MyanBox’s legal rights;</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">• To the purchaser (or prospective purchaser) of any business or asset which MyanBox is (or is contemplating) selling;</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">• To any person and/or entity for the purpose of processing such information on MyanBox’s behalf;</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">• To third parties who provide services to MyanBox or on its behalf;</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">• To third parties who MyanBox provides services to;</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">• To any third party that purchases MyanBox or MyanBox’s business or any part of MyanBox or MyanBox’s business;</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">• With your consent; and</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">• For the purposes of disaster recovery.</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Optional Provision of Personal Data</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">3.5 In some instances, you may also be requested to provide certain Personal Data that may be used to further improve MyanBox’s services and/or better tailor the type of information presented to you. In most cases, this type of data is optional although, where the requested service is a personalised service dependent on your providing all requested data, failure to provide the requested data may prevent MyanBox from providing the service to you. This type of data includes, but is not limited to:</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">• Your age;</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">• Your gender;</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">• Your race;</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">• Other related products and services subscribed to; and</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">• Family and household demographics.</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">3.7 Under certain circumstances, telephone calls made to any of MyanBox’s companies to order and/or service hotlines and/or inquiry telephone numbers are recorded for the purposes of quality control, appraisal, as well as staff management and development. In such an event, by agreeing to this Policy, you hereby give your consent for the collection, use and disclosure of such Personal Data for the purposes of our records, following up with your enquiry and/or transaction, and for quality control and training purposes.</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">4. Transfer of Personal Data Overseas</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Your Personal Data may be processed by MyanBox, its affiliates, agents and third parties providing services to MyanBox, in jurisdictions outside of Singapore. In this event, MyanBox will comply with the terms of the Act.</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">5. Accuracy of Personal Data</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Where possible, MyanBox will validate data provided using generally accepted practices and guidelines. This includes the use of checksum verification on some numeric fields such as account numbers or credit card numbers. In some instances, MyanBox is able to validate the data provided against pre-existing data held by MyanBox. In some cases, MyanBox is required to see original documentation before we may use the Personal Data such as with Personal Identifiers and/or proof of address. To assist in ensuring the accuracy of your Personal Data in the possession of MyanBox, please inform us of any updates of any parts of your Personal Data by sending a clearly worded email to the DPO at the email address provided at Section 2.2.</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">6. Protection of Personal Data</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">MyanBox uses commercially reasonable physical, managerial, and technical safeguards to preserve the integrity and security of your Personal Data and will not knowingly allow access to this data to anyone outside MyanBox, other than to you or as described in this Policy. However, MyanBox cannot ensure or warrant the security of any information you transmit to MyanBox and you do so entirely at your own risk. In particular, MyanBox does not warrant that such information may not be accessed, altered, collected, copied, destroyed, disposed of, disclosed or modified by breach of any of MyanBox’s physical, technical, or managerial safeguards.</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">7. Access and Correction of Personal Data</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">7.1 In accordance with Clause 2.1 of this Policy, you have the right to:</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">a) check whether MyanBox holds any Personal Data relating to you and, if so, obtain copies of such data; and</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">b) require MyanBox to correct any Personal Data relating to you which is inaccurate for the purpose for which it is being used.</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">7.2 MyanBox reserves the right to charge a reasonable administrative fee in order to meet your requests under Clause 7.1(a). Upon payment of the requisite fee under Clause 7.1(a) and/or receipt of your request under Clause 7.1(b), your request shall be processed within thirty (30) days.</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">7.3 If you wish to verify the details you have submitted to MyanBox or if you wish to check on the manner in which MyanBox uses and processes your personal data, MyanBox’s security procedures mean that MyanBox may request proof of identity before we reveal information. This proof of identity will take the form of full details of name, NRIC or Passport or Fin number. You must therefore keep this information safe as you will be responsible for any action which MyanBox takes in response to a request from someone using the aforesaid details.</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">8. Storage and Retention of Personal Data</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">MyanBox will delete, as reasonably possible, or otherwise anonymise any Personal Data in the event that the Personal Data is not required for any reasonable business or legal purposes of MyanBox and where the Personal Data is deleted from MyanBox’s electronic, manual, and other filing systems in accordance with MyanBox’s internal procedures and/or other agreements.</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">9. Contacting you</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">To the extent that any of the communication means which you have provided MyanBox with (which may include, your telephone number and fax number) is/will be listed on the Do Not Call Registry (the “DNC”), by checking the box on the Consent Form, or by any other means of indication, you hereby grant MyanBox your clear and unambiguous consent to contact you using all of your communication means you have provided to MyanBox including using via voice calls, SMS, WhatsApp, MMS, fax or other similar communications applications or methods, for the purposes as stated above in Paragraph 3.2. This will ensure your continued enjoyment of MyanBox’s services.</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">10. Change Policy</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">MyanBox reserves the right to alter any of the clauses contained herein in compliance with local legislation, and for any other purpose deemed reasonably necessary by MyanBox. You should look at these terms regularly. If you do not agree to the modified terms, you should inform us as soon as possible of the terms to which you do not consent. Pending such notice, if there is any inconsistency between these terms and the additional terms, the additional terms will prevail to the extent of the inconsistency.</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">11. Governing Law</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 32pt 0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">This Policy is governed by and shall be construed in accordance with the laws of Myanmar. You hereby submit to the non-exclusive jurisdiction of the Myanmar courts.</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">12. Miscellaneous</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\"><br></span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">12.1 This Policy only applies to the collection and use of Personal Data by MyanBox. It does not cover third party sites to which we provide links, even if such sites are co-branded with our logo. MyanBox does not share your Personal Data with third party websites. MyanBox is not responsible for the privacy and conduct practices of these third party websites, so you should read their own privacy policies before disclosure of any Personal Data to these websites.</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">12.2 MyanBox will not sell your personal information to any third party without your permission, but we cannot be responsible or held liable for the actions of third party sites which you may have linked or been directed to MyanBox’s website.</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">12.3 MyanBox’s websites do not target and are not intended to attract children under the age of 18 years old. MyanBox does not knowingly solicit personal information from children under the age of eighteen (18) years old or send them requests for personal data.</span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\"><br></span></p><p dir=\"ltr\" style=\"line-height:1.7711999999999999;margin-left: 24pt;margin-right: 24pt;background-color:#ffffff;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size:12pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\"><br></span></p>', '<div style=\"text-align: center;\"><div style=\"text-align: left; \"><br></div>\n            </div>');

-- --------------------------------------------------------

--
-- Table structure for table `project_types`
--

CREATE TABLE `project_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_type_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_types`
--

INSERT INTO `project_types` (`id`, `project_type_name`, `created_at`, `updated_at`) VALUES
(1, 'test type', '2022-02-11 14:02:29', '2022-02-11 14:02:29'),
(2, 'DD', '2022-02-11 17:02:17', '2022-02-11 17:02:17'),
(3, 'ad', '2022-02-11 17:02:18', '2022-02-11 17:02:18');

-- --------------------------------------------------------

--
-- Table structure for table `quotations`
--

CREATE TABLE `quotations` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `building_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_id` int(11) NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_information` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_expected_start_date` timestamp NULL DEFAULT NULL,
  `range_id` int(11) NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_allow` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `prefer_contact_way` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `best_contact_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `send_user_id` int(11) NOT NULL,
  `used_coin` int(11) NOT NULL,
  `mail_send_date` timestamp NULL DEFAULT NULL,
  `mail_status` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quotations`
--

INSERT INTO `quotations` (`id`, `category_id`, `building_type`, `location_id`, `address`, `project_information`, `project_expected_start_date`, `range_id`, `file`, `contact_email`, `contact_phone`, `contact_person_name`, `contact_allow`, `prefer_contact_way`, `best_contact_time`, `send_user_id`, `used_coin`, `mail_send_date`, `mail_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'RC', 199, 'No.12345', 'Test', '2022-02-10 17:00:00', 12, 'a:0:{}', '', '09123456,', '', '1', 'a:1:{i:0;s:5:\"phone\";}', 'a:1:{i:0;s:8:\"12pm-5pm\";}', 13, 200, NULL, NULL, 13, 13, '2022-02-11 16:02:45', '2022-02-11 16:02:45'),
(2, 2, 'Test', 101, 'Test', 'Test', '2022-02-11 17:00:00', 12, 'a:0:{}', 'mayoozin.mayoo@gmail.com,', '09952009800,', 'TEst', '1', 'a:2:{i:0;s:5:\"email\";i:1;s:5:\"phone\";}', 'a:1:{i:0;s:8:\"12pm-5pm\";}', 14, 200, NULL, NULL, 14, 14, '2022-02-12 03:02:21', '2022-02-12 03:02:21'),
(3, 1, 'ိd', 238, 'de', 'd', '2022-02-23 17:00:00', 12, 'a:0:{}', 'mayoozin.mayoo@gmail.com,', '09952009800,', 'de', '1', 'a:1:{i:0;s:5:\"email\";}', 'a:1:{i:0;s:8:\"8am-12pm\";}', 15, 200, NULL, NULL, 15, 15, '2022-02-12 07:02:56', '2022-02-12 07:02:56'),
(4, 1, 'RC', 200, 'No.1234', 'TEst', '2022-03-21 17:00:00', 12, 'a:0:{}', '', '0912345678,', '', '1', 'a:1:{i:0;s:5:\"phone\";}', 'a:1:{i:0;s:8:\"12pm-5pm\";}', 11, 200, NULL, NULL, 11, 11, '2022-03-22 03:03:36', '2022-03-22 03:03:36'),
(5, 1, 'RC', 225, 'No.1234', 'test', '2022-03-22 17:00:00', 12, 'a:0:{}', '', '0912345678,', '', '1', 'a:1:{i:0;s:5:\"phone\";}', 'a:1:{i:0;s:8:\"12pm-5pm\";}', 11, 200, NULL, NULL, 11, 11, '2022-03-22 17:03:43', '2022-03-22 17:03:43'),
(6, 1, 'RC', 83, 'No.1234', 'Project Info', '2022-03-22 17:00:00', 12, 'a:0:{}', '', '0912345678,', '', '1', 'a:1:{i:0;s:5:\"phone\";}', 'a:1:{i:0;s:8:\"12pm-5pm\";}', 11, 200, NULL, NULL, 11, 11, '2022-03-23 10:03:55', '2022-03-23 10:03:55');

-- --------------------------------------------------------

--
-- Table structure for table `quotation_received_companys`
--

CREATE TABLE `quotation_received_companys` (
  `id` int(10) UNSIGNED NOT NULL,
  `quotation_id` int(11) NOT NULL,
  `received_status` enum('Pending','Received') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `requested_status` enum('Pending','Received') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `company_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quotation_received_companys`
--

INSERT INTO `quotation_received_companys` (`id`, `quotation_id`, `received_status`, `requested_status`, `company_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pending', 'Pending', 1, '2022-02-11 16:02:45', '2022-02-11 16:02:45'),
(2, 2, 'Pending', 'Pending', 4, '2022-02-12 03:02:21', '2022-02-12 03:02:21'),
(3, 3, 'Pending', 'Pending', 1, '2022-02-12 07:02:56', '2022-02-12 07:02:56'),
(4, 4, 'Pending', 'Pending', 5, '2022-03-22 03:03:36', '2022-03-22 03:03:36'),
(5, 5, 'Pending', 'Pending', 1, '2022-03-22 17:03:43', '2022-03-22 17:03:43'),
(6, 6, 'Pending', 'Pending', 5, '2022-03-23 10:03:55', '2022-03-23 10:03:55');

-- --------------------------------------------------------

--
-- Table structure for table `ranges`
--

CREATE TABLE `ranges` (
  `id` int(10) UNSIGNED NOT NULL,
  `minimum_price` decimal(8,2) NOT NULL,
  `maximum_price` decimal(8,2) NOT NULL,
  `currency_unit_id` int(11) NOT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ranges`
--

INSERT INTO `ranges` (`id`, `minimum_price`, `maximum_price`, `currency_unit_id`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(12, '100000.00', '200000.00', 1, '1', 1, 1, '2021-10-28 05:39:03', '2021-10-28 05:39:03'),
(11, '50000.00', '100000.00', 1, '1', 1, 1, '2021-10-28 05:14:54', '2021-10-28 05:14:54'),
(10, '30000.00', '10000.00', 1, '1', 482, 482, '2021-10-11 06:18:12', '2021-10-11 06:18:12'),
(13, '1.00', '100000.00', 2, '0', 1, 1, '2021-11-01 10:50:23', '2021-11-01 11:10:45'),
(14, '1000.00', '900000.00', 1, '1', 1, 1, '2021-11-01 10:50:55', '2021-11-01 10:50:55');

-- --------------------------------------------------------

--
-- Table structure for table `skill_for_freelancers`
--

CREATE TABLE `skill_for_freelancers` (
  `id` int(10) UNSIGNED NOT NULL,
  `skill_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skill_for_freelancers`
--

INSERT INTO `skill_for_freelancers` (`id`, `skill_name`, `created_at`, `updated_at`) VALUES
(1, 'Programming', '2022-02-16 13:02:13', '2022-02-16 13:02:13');

-- --------------------------------------------------------

--
-- Table structure for table `termsofservice`
--

CREATE TABLE `termsofservice` (
  `id` int(11) NOT NULL,
  `header` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header_image` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `termsOfService` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `termsofservice`
--

INSERT INTO `termsofservice` (`id`, `header`, `header_image`, `termsOfService`, `updated_at`) VALUES
(1, 'Terms Of Service', '1608202380.png', '<p>                                                                \r\n				\r\n				\r\n				\r\n				</p><div class=\"et_pb_module et_pb_text et_pb_text_1  et_pb_text_align_left et_pb_bg_layout_light\">\r\n				\r\n				\r\n				<div class=\"et_pb_text_inner\"><p><span style=\"font-weight: 400;\"><br></span></p><p><span style=\"font-weight: 400;\">The\r\n advertising client and/or other client representative (collectively, \r\n“Advertiser”) and Myanbox Company Ltd its subsidiaries and affiliates \r\n(collectively, “Myanbox”) hereby agree that the insertion order, \r\nagreement, or other contract (the “Agreement’) by which Myanbox creates,\r\n displays and/or listing content or material for Advertiser (the \r\n“Advertisement”) is expressly subject to the following Terms and \r\nConditions except to the extent that Advertiser and Myanbox otherwise \r\nagree in writing.&nbsp;</span></p>\r\n<ol><li><span style=\"font-weight: 400;\"> Non-Discrimination: Myanbox does \r\nnot discriminate in its advertising contracts, and it will not accept \r\nadvertising intended to discriminate on the basis of race or ethnicity. \r\nAdvertiser hereto affirms that nothing in this Agreement is intended to \r\ndiscriminate on the basis of race or ethnicity.&nbsp;</span></li><li><span style=\"font-weight: 400;\"> Invoices and Payment:&nbsp; Payment by \r\nAdvertiser is due within 30 days after Advertiser’s receipt of invoice. \r\nIf any amount is not paid when due, such amount shall bear interest at \r\nthe maximum amount permitted by law. Advertiser agrees to pay all \r\ncollection agency fees and expenses, and other costs of collection \r\nincluding reasonable attorneys’ fees and court costs, as well any taxes \r\nthat are imposed on Advertiser’s Advertisements under this Agreement.&nbsp;</span></li><li><span style=\"font-weight: 400;\"> Listing:&nbsp; Myanbox is not required \r\nto display or broadcast any Advertisement for the benefit of any person \r\nor entity other than Advertiser. Unless otherwise set forth in the \r\nAgreement, the positioning and scheduling of Advertisements shall be at \r\nMyanbox’s discretion.&nbsp;</span></li><li><span style=\"font-weight: 400;\"> Display Advertisements: Advertiser,\r\n at its expense, will provide all materials (including scheduling \r\ninstructions) necessary for Advertisements at least 48 hours in advance \r\nof start of the campaign (exclusive of weekends and holidays) and in \r\naccordance with Myanbox’s then-current policies and procedures. Myanbox \r\nmay dispose of any such materials delivered to it 30 days following the \r\nend of the term of Advertiser’s campaign, unless acceptable prepaid \r\nreturn arrangements have previously been made by Advertiser. Myanbox \r\nwill not be responsible for any materials that are not properly \r\ndisplayed or that cannot be accessed or viewed because the materials \r\nwere not received by Myanbox in the proper form, in a timely manner, or \r\nin an acceptable technical quality for distribution. Myanbox will not be\r\n responsible for typographical errors, incorrect insertions or omissions\r\n in any Advertisement.&nbsp;</span></li><li><span style=\"font-weight: 400;\"> Ownership and Rights: Myanbox owns \r\nall right, title and interest (including, without limitation, copyright \r\nrights) in and to all advertising material and other content that is \r\nfurnished and/or produced by Myanbox hereunder. Myanbox owns all right, \r\ntitle and interest in and to any user or usage data or information \r\ncollected via or related to any of the Advertisements or Myanbox’s web \r\nchannels. In providing content to Myanbox for advertising, Advertiser \r\nirrevocably grants Myanbox a non-exclusive, royalty-free license to use,\r\n distribute, and sublicense such content on its platform, web channels, \r\nor other platforms owned and/or operated by Myanbox, as selected by \r\nAdvertiser, including the right to authorize the distribution on web \r\nplatform and for Myanbox to stream content over the Internet and via \r\nmobile apps and technology. Advertiser represents and warrants that it \r\ncontrols all necessary reproduction, performance and/or synchronization \r\nrights to the content furnished by Advertiser to Myanbox and Myanbox’s \r\nuse of the content does not violate any third party’s rights.&nbsp;</span></li><li><span style=\"font-weight: 400;\"> Termination; Disputes. Myanbox may \r\nterminate this Agreement at any time upon notice to Advertiser if \r\nAdvertiser breaches any provision of this Agreement. Any such \r\ntermination will not release the Advertiser from its obligation to pay \r\namounts owed hereunder, which amounts will become immediately due. This \r\nAgreement is not cancelable by Advertiser, unless otherwise specified on\r\n the face hereof. Any dispute by Advertiser with any service or invoice \r\nprovided by Myanbox shall be reported to Myanbox in writing within 30 \r\ndays from the date of invoice relating to the same time being of the \r\nessence (but any such dispute shall not affect Advertiser’s obligation \r\nto make payment within 30 days). Failure to report any such dispute \r\nwithin such time shall constitute a waiver of any claim by Advertiser \r\nwith respect to such dispute. A waiver by Myanbox of any term, condition\r\n or agreements to be performed by Advertiser or any breach thereof shall\r\n not be construed to be a waiver of any succeeding breach thereof or of \r\nany other term, condition or agreement herein contained. No change, \r\nwaiver, or discharge hereof shall be valid unless signed by an \r\nauthorized representative of Myanbox. This Agreement shall be governed \r\nby and construed in accordance with the laws of the republic of union of\r\n Myanmar.</span></li><li><span style=\"font-weight: 400;\"> Indemnification. Advertiser agrees \r\nto indemnify and hold harmless Myanbox and its officers, directors, \r\nshareholders, employees, licensees and assigns against all liability \r\nresulting from or relating to the use or broadcast of content furnished \r\nby Advertiser or otherwise incurred in connection with any breach of \r\nthis Agreement by Advertiser.&nbsp;</span></li></ol>\r\n<p><b>DISCLAIMER OF WARRANTIES</b></p>\r\n<p><span style=\"font-weight: 400;\">Limitation of liability. Mayandecor \r\nmakes no warranties, express or implied, including any implied warranty \r\nof merchantability or fitness for a particular purpose or any warranty \r\nthat any advertisement will be advertised without error or technical \r\nfaults. in no event will mayandecor be liable to advertiser for any \r\nloss, damage, or expense directly or indirectly caused by or arising out\r\n of any actual or alleged breach by mayandecor of this agreement, \r\nmayandecor’s handling of any material.</span></p>\r\n<p><span style=\"font-weight: 400;\">&nbsp;All Advertisements are subject to \r\nMyanbox’s approval. Myanbox reserves the right to edit, reject or cancel\r\n any Advertisement, space or time reservation, or position commitment at\r\n any time. All Advertisements are at all times subordinate to applicable\r\n law and the terms, conditions and restrictions contained in agreements \r\nbetween Myanbox and (i) its applicable program suppliers (including \r\nnetworks, leagues, and teams), and (ii) other advertisers that \r\ncontracted for product and/or category exclusivity or other applicable \r\nrestrictions. Myanbox may cancel any Advertisement or portion(s) thereof\r\n to advertise any program that Myanbox, in its sole discretion. Myanbox \r\nwill notify Advertiser if an Advertisement is not displayed pursuant to \r\nthis paragraph, and the parties will negotiate in good faith to agree, \r\nas Advertiser’s sole remedy therefore, on a satisfactory “make good” \r\nthat Myanbox would provide.&nbsp;</span></p>\r\n<p><b>Miscellaneous:</b><span style=\"font-weight: 400;\"> This Agreement \r\nis subject to all applicable laws and regulations now in force or \r\nhereafter enacted. Advertisers may not assign or transfer any of its \r\nrights or obligations. The parties intend this Agreement to be the \r\ncomplete statement of the terms of their agreement. This Agreement may \r\nnot be changed, modified, or amended except in writing signed by both \r\nAdvertiser and Myanbox. No course of prior dealing or usage of trade \r\nshall be relevant to amend or interpret this Agreement. Neither party \r\nwill be responsible for delays or failures of performance resulting from\r\n acts beyond the reasonable control of such party. The warranties, \r\nindemnification obligations, limitations of liability and ownership \r\nrights set forth herein will survive the termination or expiration of \r\nthis Agreement.</span></p><p><span style=\"font-weight: 400;\"><br></span></p><p><span style=\"font-weight: 400;\"><br></span></p></div>\r\n			</div><p><br></p>', '2021-10-28 05:42:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('1','2','3','4','5') COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `logo` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coin` int(11) DEFAULT NULL,
  `left_coin` int(11) DEFAULT NULL,
  `last_login_date` date DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_flag` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `role`, `is_active`, `logo`, `coin`, `left_coin`, `last_login_date`, `password`, `remember_token`, `email_verified_flag`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'superadmin@gmail.com', '09123456789', '5', '1', '1635399523.png', 1000, 1000, '2022-01-31', '$2y$10$XuD5c5GLOIJktHk2yGFKR.6AqyywnSBTuOGVvTsDqhG/d1pdST2ei', 'D6qAol7NGMdQELgAZ3A1yKrhaGRlq9ilQX22W7ycZOFOEzaZQaFWuuSRZhYC', 1, '2022-01-31 06:49:42', '2022-01-31 06:49:42'),
(3, 'M-SQUARE Construction & Decoration Co., Ltd', 'admin@msquaremyanmar.com', '09256999918', '2', '1', '1643619399.png', 10000, 10000, '2022-01-31', '$2y$10$jm.udGpQK9NQr3ND5C.b4ORlvaSPgoponEKil9mncYO10pvIITNqq', 'ccOAoxj1iJTrhd98oMVhsOA61JoHuvXqAtsnVpdMTfhiP36N7ssyVR7kpa8Q', 1, '2022-01-31 07:45:01', '2022-01-31 08:26:39'),
(4, 'Handcraft Myanmar Co., Ltd', 'sale@handcraftmyanmar.com', '09426999918', '2', '1', NULL, 10000, 10000, '2022-01-31', '$2y$10$ja0Xe8AI2Iq.J9h5wxCC7u9zTAhQ.JPrJ69Go6jUI1CMXUwraEWGW', NULL, 0, '2022-01-31 07:52:04', '2022-01-31 07:52:04'),
(19, 'Hlaing Bwar Aung', 'hlaingbwaraung001@gmail.com', '09456985990', '4', '1', NULL, NULL, NULL, NULL, '$2y$10$IFQqOpk2nUQFoQc3UY52ruzqD7qkHJMlS41G1B68DEsYvfHii9el.', 'YvGhh3jwKL6gQSrex9VFwA5fJQPEGmuHC4K2XfNSAUaC5ksR4sq376JOHMnQ', 1, '2022-04-29 04:04:30', '2022-04-29 04:04:30'),
(17, 'Control Data', 'myomin313@gmail.com', '0912345678', '2', '1', NULL, 10000, 10000, '2022-02-21', '$2y$10$8lKnR3mR12kIP57jW.PMiuNrasYZ4eM3sE1qMKtbYxVa8NPRxjqY.', 'mej70b3m1sTqqUDkRVkjsUvW92rBAcRCDCZU8oq2uxSE1jWQBKBNZvjmvP12', 1, '2022-02-21 02:25:26', '2022-02-21 02:29:08'),
(16, 'mayoo', 'mayoozin.mayoo@gmail.com', '09952009800', '3', '1', NULL, 0, 0, '2022-02-16', '$2y$10$b9f12oesWl3CN6BVVGN4beJS3GDHBFbe6YsNyDBkmaGqPpqYhj3mC', NULL, 1, '2022-02-13 04:16:24', '2022-02-16 13:12:11'),
(15, 'May Oo', 'mayoozin.mayoo@gmail.com', '09952009800', '1', '1', NULL, 1000, 800, '2022-02-12', '$2y$10$1H5xePe8jgsmSRbM1luwl.dwuzH5WBhAiiXULEJf5nFPxlTsuPrSm', NULL, 1, '2022-02-12 06:46:18', '2022-02-12 07:56:55'),
(14, 'Eliza Skin', 'mayoozinse25@gmail.com', '09952009800', '2', '1', NULL, 10000, 9800, '2022-02-12', '$2y$10$tFuBnReqeJE7sNf57Od.de0IIQHuWq4EAGkUwItzaJx4ZZwcppGvK', 'WzmZ0XZumTtBE0MXk286tpD57j5RHxZDHMvdAb7H6hpUOCj8HGAo5yyweFnx', 1, '2022-02-12 03:16:39', '2022-02-12 03:21:06'),
(11, 'Service Company', 'phyu@gmail.com', '0912345678', '1', '1', NULL, 10200, 9600, '2022-03-23', '$2y$10$XuD5c5GLOIJktHk2yGFKR.6AqyywnSBTuOGVvTsDqhG/d1pdST2ei', 'uctMT8iFDIzaXRt58FmFnWj17iilvK67CLKhul1ciyYyOM20WtfrWJXesBJc', 1, '2022-02-11 15:59:49', '2022-03-23 10:55:34'),
(18, 'Admin', 'admin@gmail.com', '09123456789', '4', '1', NULL, NULL, NULL, NULL, '$2y$10$ogvmCBcA2LzVivWnTDJ1I.yrQ7UmqvIr.feIW5XvD3kYlrSH8Jk56', 'i9ML9jJ53hXD4FIp8hOSzxmXjpPrpSOgi9BNrU18IrHyvIwLjMskaCzW8nr6', 1, '2022-03-22 03:03:20', '2022-03-22 03:03:20'),
(13, 'Royal Grow Co.Ltd', 'mayoozin.mayoo@gmail.com', '09952009800', '2', '1', NULL, 13200, 13000, '2022-02-12', '$2y$10$gkYbsfAf8.Oh2WycgkjwCOtdP/Dn7S/kYWXMZjYAKCZwBaXDpm1iW', 'iiy7xg8tU9zCrSO1xBUAYbmv2b2VIWNUlwqiWICADKMLri5hySLzHlLua8Qt', 1, '2022-02-11 16:09:04', '2022-02-12 03:05:50'),
(20, 'Snow White', 'mhpmhp02@gmail.com', '', '3', '1', NULL, NULL, NULL, '2022-08-17', '', 'toC0sJNqE8KT2rVoJtNhPFb7PZapJYHUs9udkPjsPAdqqRIkfRW7j2GbiUJ5', 1, '2022-08-17 02:06:08', '2022-08-17 02:06:08'),
(21, 'Test', 'mhp241096@gmail.com', '0191234566', '1', '1', NULL, 1000, 1000, '2022-08-17', '$2y$10$4FIDZQZFXRlaUTrAm7el9ew.Tq0Gk/IwDbAeRDq5inTfKADBKMT62', NULL, 1, '2022-08-17 06:34:40', '2022-08-17 06:35:51');

-- --------------------------------------------------------

--
-- Table structure for table `user_coins`
--

CREATE TABLE `user_coins` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `coin_plan_id` int(11) NOT NULL,
  `status` enum('Pending','Approved','Rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_functions`
--

CREATE TABLE `user_functions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `function_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_functions`
--

INSERT INTO `user_functions` (`id`, `user_id`, `function_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(8, 18, 1, 1, 1, NULL, NULL),
(7, 10, 3, 1, 1, NULL, NULL),
(6, 10, 2, 1, 1, NULL, NULL),
(5, 10, 1, 1, 1, NULL, NULL),
(9, 18, 3, 1, 1, NULL, NULL),
(10, 19, 1, 1, 1, NULL, NULL),
(11, 19, 2, 1, 1, NULL, NULL),
(12, 19, 3, 1, 1, NULL, NULL),
(13, 19, 5, 1, 1, NULL, NULL),
(14, 19, 7, 1, 1, NULL, NULL),
(15, 19, 8, 1, 1, NULL, NULL),
(16, 19, 10, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `verify_user`
--

CREATE TABLE `verify_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `verify_user`
--

INSERT INTO `verify_user` (`id`, `user_id`, `token`, `created_at`, `updated_at`) VALUES
(1, 3, 'U7N0rnyw8j1A26DZYLb3YevEycYuGKW4Z1CYkzK0', '2022-01-31 14:45:01', '2022-01-31 15:15:01'),
(2, 4, 'DmPDf5dVctV1F5xnUoH6GflflO0M5lHY4TlSoMxc', '2022-01-31 14:52:05', '2022-01-31 15:22:05'),
(3, 5, 'E5BdArhTLXb4Jt1iJRT8IjzK0n6aJKDFBbDaR5p1', '2022-02-10 17:14:26', '2022-02-10 17:44:26'),
(4, 6, 'YwLR95dAK6H6HotLH7iCP3lEjOkpG0b6C1BVxT3p', '2022-02-10 17:14:52', '2022-02-10 17:44:52'),
(5, 7, 'd98A0yK51EM5ZwGzuM6CGZhxWvCeVYwcOcYL5bdF', '2022-02-10 17:17:43', '2022-02-10 17:47:43'),
(6, 8, 'YEBAGoZ3OtakPwGh2nIStVqebBAnF91JCMgJdwl9', '2022-02-11 15:28:11', '2022-02-11 15:58:11'),
(7, 9, 'OIR1AT2AXZA2opdxKVoXh8BDtBiMihxzDvC5ZIsj', '2022-02-11 15:31:32', '2022-02-11 16:01:32'),
(8, 11, 'dKhAz41bXWLE7EEerUQWMKGJ6j09VcQYbMoDNryg', '2022-02-11 22:59:49', '2022-02-11 23:29:49'),
(9, 13, '6hMMi37AOMQzxqZNh7rTZSv65jGGBpYo7oc5aiWi', '2022-02-11 23:09:04', '2022-02-11 23:39:04'),
(10, 14, 'wO0wXGT83FPGkBuCeWq0MRO4DXmX0FsVD0FXbm31', '2022-02-12 10:16:39', '2022-02-12 10:46:39'),
(11, 15, 'mxBbkan7ndE76ApaxqUnWnvQhnfq7mmulM9325Qx', '2022-02-12 13:46:18', '2022-02-12 14:16:18'),
(12, 16, '7EnjO9ZVUfUXK0T4e2k4maIhNqrBcV8Z2AiBgC07', '2022-02-13 11:16:24', '2022-02-13 11:46:24'),
(13, 17, '47qNgwBmmF5ZC6QJH70eXlH2hT7JHIxNKQ7VsjhN', '2022-02-21 09:25:26', '2022-02-21 09:55:26'),
(14, 21, '4eBUPJEVrkCNK1uhAlJ23MKb9SHWUbdMute6E4xO', '2022-08-17 13:34:41', '2022-08-17 14:04:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertise_with_us`
--
ALTER TABLE `advertise_with_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertisings`
--
ALTER TABLE `advertisings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertising_plans`
--
ALTER TABLE `advertising_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_days`
--
ALTER TABLE `business_days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_company`
--
ALTER TABLE `category_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_freelancers`
--
ALTER TABLE `category_freelancers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coin_plans`
--
ALTER TABLE `coin_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coin_plan_user`
--
ALTER TABLE `coin_plan_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_advertisements`
--
ALTER TABLE `company_advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_advertising_plans`
--
ALTER TABLE `company_advertising_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_business_days`
--
ALTER TABLE `company_business_days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_company_advertising_plan`
--
ALTER TABLE `company_company_advertising_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_package_plan`
--
ALTER TABLE `company_package_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_products`
--
ALTER TABLE `company_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_projects`
--
ALTER TABLE `company_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_services`
--
ALTER TABLE `company_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency_units`
--
ALTER TABLE `currency_units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_product_prices`
--
ALTER TABLE `daily_product_prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `freelancers`
--
ALTER TABLE `freelancers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `freelancer_comments`
--
ALTER TABLE `freelancer_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `freelancer_educations`
--
ALTER TABLE `freelancer_educations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `freelancer_experiences`
--
ALTER TABLE `freelancer_experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `freelancer_projects`
--
ALTER TABLE `freelancer_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `freelancer_rates`
--
ALTER TABLE `freelancer_rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `freelancer_skills`
--
ALTER TABLE `freelancer_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `freelancer_statuses`
--
ALTER TABLE `freelancer_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `functions`
--
ALTER TABLE `functions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_about_us`
--
ALTER TABLE `main_about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_advertise_with_us`
--
ALTER TABLE `main_advertise_with_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `myanboxtubes`
--
ALTER TABLE `myanboxtubes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_plans`
--
ALTER TABLE `package_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `privacy`
--
ALTER TABLE `privacy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_photos`
--
ALTER TABLE `project_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_settings`
--
ALTER TABLE `project_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_types`
--
ALTER TABLE `project_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotations`
--
ALTER TABLE `quotations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotation_received_companys`
--
ALTER TABLE `quotation_received_companys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ranges`
--
ALTER TABLE `ranges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skill_for_freelancers`
--
ALTER TABLE `skill_for_freelancers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `termsofservice`
--
ALTER TABLE `termsofservice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_coins`
--
ALTER TABLE `user_coins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_functions`
--
ALTER TABLE `user_functions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verify_user`
--
ALTER TABLE `verify_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `advertise_with_us`
--
ALTER TABLE `advertise_with_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=420;

--
-- AUTO_INCREMENT for table `advertisings`
--
ALTER TABLE `advertisings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `advertising_plans`
--
ALTER TABLE `advertising_plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `business_days`
--
ALTER TABLE `business_days`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `category_company`
--
ALTER TABLE `category_company`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `category_freelancers`
--
ALTER TABLE `category_freelancers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coin_plans`
--
ALTER TABLE `coin_plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `coin_plan_user`
--
ALTER TABLE `coin_plan_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `company_advertisements`
--
ALTER TABLE `company_advertisements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_advertising_plans`
--
ALTER TABLE `company_advertising_plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `company_business_days`
--
ALTER TABLE `company_business_days`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `company_company_advertising_plan`
--
ALTER TABLE `company_company_advertising_plan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `company_package_plan`
--
ALTER TABLE `company_package_plan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `company_products`
--
ALTER TABLE `company_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `company_projects`
--
ALTER TABLE `company_projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `company_services`
--
ALTER TABLE `company_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `currency_units`
--
ALTER TABLE `currency_units`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `daily_product_prices`
--
ALTER TABLE `daily_product_prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `freelancers`
--
ALTER TABLE `freelancers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `freelancer_comments`
--
ALTER TABLE `freelancer_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `freelancer_educations`
--
ALTER TABLE `freelancer_educations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `freelancer_experiences`
--
ALTER TABLE `freelancer_experiences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `freelancer_projects`
--
ALTER TABLE `freelancer_projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `freelancer_rates`
--
ALTER TABLE `freelancer_rates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `freelancer_skills`
--
ALTER TABLE `freelancer_skills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `freelancer_statuses`
--
ALTER TABLE `freelancer_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `functions`
--
ALTER TABLE `functions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=395;

--
-- AUTO_INCREMENT for table `main_about_us`
--
ALTER TABLE `main_about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `main_advertise_with_us`
--
ALTER TABLE `main_advertise_with_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=794;

--
-- AUTO_INCREMENT for table `myanboxtubes`
--
ALTER TABLE `myanboxtubes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package_plans`
--
ALTER TABLE `package_plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `privacy`
--
ALTER TABLE `privacy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project_photos`
--
ALTER TABLE `project_photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project_settings`
--
ALTER TABLE `project_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project_types`
--
ALTER TABLE `project_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quotations`
--
ALTER TABLE `quotations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `quotation_received_companys`
--
ALTER TABLE `quotation_received_companys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ranges`
--
ALTER TABLE `ranges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `skill_for_freelancers`
--
ALTER TABLE `skill_for_freelancers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `termsofservice`
--
ALTER TABLE `termsofservice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_coins`
--
ALTER TABLE `user_coins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_functions`
--
ALTER TABLE `user_functions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `verify_user`
--
ALTER TABLE `verify_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
